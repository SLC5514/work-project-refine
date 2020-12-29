<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\UserOperationLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class NewsController extends Controller
{

    //列表
    public function index(Request $request)
    {
        $rules = [
            'type' => 'in:0,1,2',
            'status' => 'in:0,1,2',//状态 1：已上线 2：已下线 0：全部
            'start_time' => 'date|nullable',//操作时间
            'end_time' => 'date|nullable',
        ];
        $message = [
            'type.*' => '选择的分类无效',
            'status.*' => '选择的状态无效',
            'start_time.*' => '操作时间格式不正确',
            'end_time.*' => '操作时间格式不正确',
        ];

        try {
            Validator::make($request->all(), $rules, $message)->validated();

            $params = $request->all();
            $limit = $request->input('pagesize', 30);
            $page = $request->input('page', 1);
            $params['pagesize'] = $limit;
            $params['page'] = $page;

            $query = News::query();
            if ($type = $request->input('type')) {
                $query->where('type', '=', $type);
            }
            $status = $request->input('status');
            // 有效
            if ($status == 1) {
                $query->where(function ($query) {
                    $query->where('down_line_at', '>', Carbon::now())->orWhereNull('down_line_at');
                });
            }
            // 无效
            if ($status == 2) {
                $query->where('down_line_at', '<', Carbon::now());
            }
            $start_time = $request->input('start_time');
            $end_time = $request->input('end_time');
            // 创建时间查询范围
            if ($start_time && $end_time) {
                $query->whereBetween('created_at', [$start_time, $end_time]);
            }

            $count = $query->count();
            $offset = ($page - 1) * $limit;
            $news = $query->orderByDesc('created_at')->offset($offset)->limit($limit)->get();

            return view('admin.news_list', ['news' => $news, 'total' => $count])->with('params', $params);
        } catch (ValidationException $exception) {
            $errors = $exception->errors();
            $first_key = key($errors);
            $message = isset($errors[$first_key][0]) ? $errors[$first_key][0] : $exception->getMessage();
            return response()->json(['code' => 100, 'msg' => $message]);
        }
    }

    //页面
    public function create()
    {
        return view('admin.mod_news_page');
    }

    //保存或更新
    public function store(Request $request)
    {
        $type = $request->input('type');
        $rules = $this->rules($type);

        try {
            Validator::make($request->all(), $rules)->validated();

            $id = $request->input('id', 0);

            $data = array_filter($request->only([
                'type', 'title', 'activity_type', 'design_world',
                'venue', 'begin_at', 'end_at', 'up_line_at', 'down_line_at',
                'img_src', 'qr_code_title', 'qr_code_images', 'description'
            ]));
            $data['type'] = $request->input('type');
            $data['title'] = $request->input('title');
            $data['activity_type'] = $request->input('activity_type') ?: 0;
            $data['design_world'] = $request->input('design_world') ?: 0;
            $data['venue'] = $request->input('venue') ?: '';
            $data['begin_at'] = $request->input('begin_at');
            $data['end_at'] = $request->input('end_at');
            $data['up_line_at'] = $request->input('up_line_at') ?: '';
            $data['down_line_at'] = $request->input('down_line_at');
            $data['img_src'] = $request->input('img_src') ?: '';
            $data['qr_code_title'] = $request->input('qr_code_title') ?: '';
            $data['qr_code_images'] = $request->input('qr_code_images') ?: '';
            $data['description'] = $request->input('description') ?: '';

            $content = $request->input('content') ?: '';

            DB::beginTransaction();
            if ($id) {
                $news = News::findOrFail($id);
                $news->update($data);
                $res = $news->content()->updateOrInsert(['news_id' => $id], ['content' => $content]);
                $operate = '编辑资讯';
            }
            else {
                $res = News::create($data)->content()->create(['content' => $content]);
                $operate = '新增资讯';
            }
            if ($res) {
                //操作日志记录
                UserOperationLog::setOperateLog(Auth::id(),'admin.news.store',$operate,$request->all());
                DB::commit();
                return response()->json(['code' => 0, 'msg' => '操作成功']);
            }
            else {
                DB::rollBack();
                return response()->json(['code' => 0, 'msg' => '操作失败']);
            }
        } catch (ValidationException $exception) {
            $errors = $exception->errors();
            $first_key = key($errors);
            $message = isset($errors[$first_key][0]) ? $errors[$first_key][0] : $exception->getMessage();
            return response()->json(['code' => 100, 'msg' => $message]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['code' => 101, 'msg' => $e->getMessage(), 'info' => $e->getTrace()]);
        }
    }


    public function show(News $news)
    {
        $data = array_filter($news->toArray());

        $data['content'] = $news->content['content'];
        return response()->json(['code' => 0, 'msg' => 'ok', 'data' => $data]);
    }


    //删除
    public function destroy(News $news)
    {
        try {
            $id = $news->id;
            if ($news->delete()) {
                //操作日志记录
                UserOperationLog::setOperateLog(Auth::id(),'admin.news.delete','删除资讯',$id);
                return response()->json(['code' => 0, 'msg' => '删除成功']);
            }
            else {
                return response()->json(['code' => 0, 'msg' => '删除失败']);
            }
        } catch (\Exception $e) {
            return response()->json(['code' => 111, 'msg' => $e->getMessage()]);
        }
    }

    /**
     * @param integer $type
     * @return array
     */
    public function rules($type): array
    {
        $rules1 = [
            'type' => 'required|integer|in:1,2',
            'title' => 'required|string',
            'up_line_at' => 'required|date',
            'down_line_at' => 'date|nullable',
            'img_src' => 'required|string',
            'qr_code_title' => 'string|max:10|nullable',
            'qr_code_images' => 'string|nullable',
            'content' => 'required|string',
        ];

        if ($type === 1) {//活动
            $rules2 = [
                'activity_type' => 'integer|in:1,2|nullable',
                'design_world' => 'required|integer|in:1,2,3,4,5,6,7,8',
                'venue' => 'required|string',
                'begin_at' => 'required|date',
                'end_at' => 'required|date',
            ];

        }
        elseif ($type === 2) {//资讯
            $rules2 = [
                'description' => 'required|string',
            ];
        }
        else {
            $rules2 = [];
        }

        return array_merge($rules1, $rules2);
    }
}

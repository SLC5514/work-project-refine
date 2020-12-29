<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\UserOperationLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AdController extends Controller
{

    //列表
    public function index(Request $request)
    {
        $rules = [
            'position' => 'in:0,1,2,3,4',
            // 0:全部 1：有效 2：失效
            'ad_status' => 'in:0,1,2',
            'start_time' => 'date|nullable',
            'end_time' => 'date|nullable',
        ];
        $message = [
            'ad_status.*' => '参数错误',
            'start_time.*' => '日期格式不正确',
            'end_time.*' => '日期格式不正确',
        ];

        try {
            Validator::make($request->all(), $rules, $message)->validated();

            $position = $request->input('position');
            $status = $request->input('ad_status');
            $start_time = $request->input('start_time');
            $end_time = $request->input('end_time');
            $limit = $request->input('pagesize', 30);
            $page = $request->input('page', 1);

            $query = Ad::query();
            if ($position) {
                $query->where('position', '=', $position);
            }
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
            // 创建时间查询范围
            if ($start_time && $end_time) {
                $query->whereBetween('created_at', [$start_time, $end_time]);
            }

            $count = $query->count();
            $offset = ($page - 1) * $limit;
            $ads = $query->orderByDesc('created_at')->offset($offset)->limit($limit)->get();

            $params = $request->all();
            $params['pagesize'] = $limit;
            $params['page'] = $page;

            return view('admin.ad_list', ['ads' => $ads, 'total' => $count])->with('params', $params);
        } catch (ValidationException $exception) {
            $errors = $exception->errors();
            $first_key = key($errors);
            $message = isset($errors[$first_key][0]) ? $errors[$first_key][0] : $exception->getMessage();
            return response()->json(['code' => 100, 'msg' => $message]);
        }
    }


    //新增或编辑
    public function store(Request $request)
    {
        $rules = $this->rules();
        try {
            Validator::make($request->all(), $rules)->validated();

            $id = $request->input('id', 0);

            // 如果模型已存在则更新，否则创建新模型
            $data = [];
            $data['position'] = $request->input('position');
            $data['weight'] = $request->input('weight');
            $data['title'] = $request->input('title') ?: '';
            $data['subtitle'] = $request->input('subtitle') ?: '';
            $data['description'] = $request->input('description') ?: '';
            $data['link'] = $request->input('link') ?: '';
            $data['up_line_at'] = $request->input('up_line_at');
            $data['down_line_at'] = $request->input('down_line_at');
            $data['img_src'] = $request->input('img_src');

            $ad = Ad::updateOrCreate(['id' => $id], $data);
            if ($ad->id) {
                //操作日志记录
                UserOperationLog::setOperateLog(Auth::id(),'admin.ad.store','新增|编辑广告',$request->all());
                return response()->json(['code' => 0, 'msg' => '编辑成功']);
            }

            return response()->json(['code' => 0, 'msg' => '编辑失败']);
        } catch (ValidationException $exception) {
            $errors = $exception->errors();
            $first_key = key($errors);
            $message = isset($errors[$first_key][0]) ? $errors[$first_key][0] : $exception->getMessage();
            return response()->json(['code' => 100, 'msg' => $message]);
        }
    }

    //获取模型信息
    public function show(Ad $ad)
    {
        return response()->json(['code' => 0, 'msg' => 'ok', 'data' => $ad]);
    }

    //表单页面
    public function create()
    {
        return view('admin.mod_ad_page');
    }

    //删除
    public function destroy(Ad $ad)
    {
        try {
            $id = $ad->id;
            if ($ad->delete()) {
                //操作日志记录
                UserOperationLog::setOperateLog(Auth::id(),'admin.ad.delete','删除广告',$id);
                return response()->json(['code' => 0, 'msg' => '删除成功']);
            }
        } catch (\Exception $e) {
            return response()->json(['code' => 100, 'msg' => $e->getMessage()]);
        }

        return response()->json(['code' => 0, 'msg' => '删除失败']);
    }

    //广告验证规则
    public function rules()
    {
        return [
            'position' => 'required|integer|in:1,2,3,4',
            'weight' => 'required|numeric',
            'title' => 'string|nullable',
            'subtitle' => 'string|nullable',
            'description' => 'string|nullable',
            'link' => 'url|nullable',
            'up_line_at' => 'required|date',
            'down_line_at' => 'date|nullable',
            'img_src' => 'required|string',
        ];
    }


}

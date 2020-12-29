<?php
/**
 * Created by PhpStorm.
 * User: jiangwei
 * Date: 2020/7/14
 * Time: 16:33
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserOperationLog;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class UploadController extends Controller
{
    //上传图片
    public function uploadImage(Request $request)
    {
        try {
            $this->validate($request, ['img' => 'image|max:5120'], ['img.max' => '图片大小最大限制5M']);

            $image = $request->file('img');
            if ($image->isValid()) {
                $path = Storage::putFile('public/images/' . date('Ym'), $image);

                if (Storage::exists($path)) {
                    //操作日志记录
                    UserOperationLog::setOperateLog(Auth::id(),'admin.upload.uploadImage','上传图片',Storage::url($path));
                    return response()->json(['code' => 0, 'msg' => '上传成功', 'data' => ['path' => Storage::url($path)]]);
                }

                return response()->json(['code' => 100, 'msg' => '上传失败']);
            }
        } catch (PostTooLargeException $exception) {
            return response()->json(['code' => 102, 'msg' => '文件大小超出请求最大限制10M']);
        } catch (ValidationException $exception) {
            $arr = [];
            foreach ($exception->errors() as $k=>$error){
                $arr[] = $error[0];
            }
            $str = implode(' ', $arr);
            return response()->json(['code' => 101, 'msg' => $str]);
        }
    }
}

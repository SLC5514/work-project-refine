<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserOperationLog;
use Illuminate\Http\Request;

class OperateLogController extends Controller
{
    public function index(Request $request)
    {
        $params = $request->all();
        $limit = $request->input('pagesize', 30);
        $page = $request->input('page', 1);
        $params['pagesize'] = $limit;
        $params['page'] = $page;
        $offset = ($page - 1) * $limit;

        $con = UserOperationLog::select(['user_operation_logs.id','users.name','user_operation_logs.operate','user_operation_logs.created_at'])
            ->leftJoin('users','user_operation_logs.user_id','=','users.id')
            ->orderby('user_operation_logs.id', 'desc');
        if ($request->name) {
            $con = $con->where('users.name','like', $request->name.'%');
        }
        $start_time = $request->input('start_time','');
        $end_time = $request->input('end_time','');
        // 创建时间查询范围
        if ($start_time && $end_time) {
            $con = $con->whereBetween('user_operation_logs.created_at', [$start_time, $end_time]);
        }
        $count = $con->count();
        $operateLogs = $con->offset($offset)->limit($limit)->get();
//        $roles = Role::all();// 获取所有角色

        $params['name'] = $request->input('name', '');
        return view('admin.operatelog_list', ['operateLogs' => $operateLogs, 'total' => $count])->with('params', $params);
    }
}

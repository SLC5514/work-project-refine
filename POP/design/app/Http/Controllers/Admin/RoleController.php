<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoleHasPermission;
use App\Models\UserOperationLog;
use App\User;
use Illuminate\Http\Request;
// 引入 laravel-permission 模型
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Role;
use mysql_xdevapi\Exception;
use Spatie\Permission\Models\Permission;
use Session;

class RoleController extends Controller {

    /**
     * 显示角色列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $params = $request->all();
        $limit = $request->input('pagesize', 30);
        $page = $request->input('page', 1);
        $params['name'] = $request->input('name','');
        $params['is_able'] = $request->input('is_able','');
        $params['pagesize'] = $limit;
        $params['page'] = $page;
        $offset = ($page - 1) * $limit;
        $where = array();
        if($params['name']){
            $where[] = ['name', 'like', $params['name'].'%'];
        }
        if($params['is_able']){
            $where[] = ['is_able', '=', $params['is_able']];
        }
        $con = Role::where('is_delete',0)->where($where)->orderBy('id','desc');
        $roles = $con->offset($offset)->limit($limit)->get();// 获取所有角色
        $count = $con->count();// 获取所有角色数量
        foreach ($roles as $role){
            $role->createdName = empty($role->createdBy->name) ? '' : $role->createdBy->name;
            $role->updatedName = empty($role->updatedBy->name) ? '' : $role->updatedBy->name;
            $role->role_able = $role->is_able==1 ? true : false;
        }

        return view('admin.roles_list', ['roles' => $roles, 'total' => $count])->with('params', $params);
    }

    /**
     * 显示创建角色表单
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $permissions = Permission::all();// 获取所有权限
        $permissions = tree($permissions->toArray(), 'id', 'parent_id', 'children');

        return view('admin.role_mod_page', ['permissions'=>json_encode($permissions)]);
    }

    /**
     * 保存新创建的角色
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
//        print_r($request->all());
        //验证 name 和 permissions 字段
        $this->validate($request, [
//                'name'=>'required|unique:roles|max:255',
//                'permissions' =>'required',
            ]
        );
        $name = $request->input('name');
        $display_name = $request->input('display_name','');
        $p_all = Permission::all();//获取所有权限
        $p_arr = array();
        foreach ($p_all as $p) {
            $p_arr[$p->id] = $p;
        }
        DB::beginTransaction();
        try {
            if ($request->id) {     //存在id，则为编辑
                $role = Role::findById($request->id);

                foreach ($p_all as $p) {
                    $role->revokePermissionTo($p); // 移除与角色关联的所有权限
                }
                $operate = '编辑角色'.$name;
            }else{          //不存在，则为新增
                $role = new Role();
                $role->created_by = Auth::id();
                $operate = '创建角色'.$name;
            }
            $role->updated_by = Auth::id();
            $role->name = $name;
            $role->display_name = $display_name;

            $permissions = $request->input('permissions', array());
            $permissions = (new \App\Models\Permission())->getLinkByIds($permissions);

            $role->save();
            // 遍历选择的权限
            foreach ($permissions as $permission) {
                if(!empty($p_arr[$permission])){
                    $p = $p_arr[$permission];
                }else{
                    throw new \Exception('权限不存在');
                }
                // 获取新创建的角色并分配权限
                $role = Role::where('name', '=', $name)->first();
                $role->givePermissionTo($p);
            }
            //操作日志记录
            UserOperationLog::setOperateLog(Auth::id(),'admin.roles.store',$operate,$request->input());
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error($exception);
            return response()->json(['code' => 0, 'msg' => '操作失败']);
        }

        return response()->json(['code' => 0, 'msg' => '操作成功']);
    }

    /**
     * 显示指定角色
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $role_permissions = RoleHasPermission::where('role_id',$role->id)->pluck('permission_id')->toArray();
        $permissions = (new \App\Models\Permission())->delPids($role_permissions);
        return response()->json(['code' => 0, 'msg' => 'ok', 'data' => $role, 'permission_ids' => $permissions]);
    }

    /**
     * 删除指定角色
     *
     * @param  Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        try {
            $id = $role->id;
            $operate = '删除角色'.$role->name;
            if ($role->delete()) {
                UserOperationLog::setOperateLog(Auth::id(),'admin.roles.delete',$operate,$id);
                return response()->json(['code' => 0, 'msg' => 'ok']);
            }
        } catch (\Exception $e) {
        }
        return response()->json(['code' => 100, 'msg' => 'fail']);

    }

    /**
     * Notes: 启用|禁用角色
     * User: HuFei
     * Name: ableDisable
     * DateTime: 2020/10/16 17:06
     * @return \Illuminate\Http\JsonResponse
     */
    public function ableDisable(Request $request)
    {
        $id = $request->input('id',0);
        if(!$id){
            return response()->json(['code' => 1, 'msg' => '操作异常']);
        }
        $role = Role::findOrFail($id);
        if($role->is_able == 2){
            $operate = '启用角色'.$role->name;
            $role->is_able = 1;
        }else{
            $operate = '禁用角色'.$role->name;
            $role->is_able = 2;
        }
        $role->updated_by = Auth::id();
        $role->save();
        //日志记录
        UserOperationLog::setOperateLog(Auth::id(),'admin.roles.ableDisable',$operate,['role.id'=>$id,'role.is_able'=>$role->is_able]);

        return response()->json(['code' => 0, 'msg' => '操作成功']);
    }

}
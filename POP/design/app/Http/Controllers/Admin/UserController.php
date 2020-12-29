<?php
/**
 * Created by PhpStorm.
 * User: jiangwei
 * Date: 2020/7/14
 * Time: 16:33
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ModelHasRole;
use App\Models\Role;
use App\Models\UserOperationLog;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use mysql_xdevapi\Exception;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $params = $request->all();
        $limit = $request->input('pagesize', 30);
        $page = $request->input('page', 1);
        $params['pagesize'] = $limit;
        $params['page'] = $page;
        $offset = ($page - 1) * $limit;

        $con = User::orderby('users.id', 'desc');
        if ($request->name) {
            $con = $con->where('users.name', $request->name);
        }
        if($request->is_able){
            $con = $con->where('users.is_able',$request->is_able);
        }
        if($request->role_id){
            $con = $con->leftJoin('model_has_roles','users.id','=','model_has_roles.model_id')
                ->where('model_has_roles.role_id',$request->role_id)
                ->select('users.*')
                ->groupBy('users.id');
        }
        if($request->phone){
            $con = $con->where('users.phone','like',$request->phone.'%');
        }
        $count = $con->count();
        $users = $con->offset($offset)->limit($limit)->get();
        foreach ($users as $user){
            $user->createdName = empty($user->createdBy->name) ? '' : $user->createdBy->name;
            $user->updatedName = empty($user->updatedBy->name) ? '' : $user->updatedBy->name;
            $user->user_able = $user->is_able==1 ? true : false;
            $roles = $user->getRoleNames();
            $roles = json_encode($roles);
            if(strpos($roles,'[')!==false){
                $roles = trim($roles,'[]');
            }
            if(strpos($roles,'"')!==false){
                $roles = str_replace('"','',$roles);
            }
            $user->role_data = unicodeDecode($roles);
        }
        $roles = Role::where('is_able',1)->where('is_delete',0)->get();// 获取所有角色

        $params['name'] = $request->input('name', '');
        $params['is_able'] = $request->input('is_able', '');
        return view('admin.user_list', ['users' => $users, 'total' => $count, 'role_list'=>$roles])->with('params', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('is_able',1)->where('is_delete',0)->get();// 获取所有角色
        return view('admin.user_mod_page', ['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $data = $request->input();
        DB::beginTransaction();
        try {
            $exist = User::where('name',$data['name'])->first();
            if ($request->id) {
                if($exist && $request->id != $exist->id){
                    throw new \Exception('用户名已存在', 1);
                }
                $user = User::find($request->id);
                $user->update([
                    'name' => $data['name'],
                    'phone' => $data['phone'] ?: '',
                    'password' => Hash::make($data['password']),
                    'updated_by' => Auth::id(),
                ]);
                $operate = '修改用户'.$data['name'];
            } else {
                if($exist){
                    throw new \Exception('用户名已存在', 1);
                }
                $user = User::create([
                    'name' => $data['name'],
                    'phone' => $data['phone'] ?: '',
                    'password' => Hash::make($data['password']),
                    'created_by' => Auth::id(),
                    'updated_by' => Auth::id(),
                ]);
                $operate = '创建用户'.$data['name'];
            }
            if (isset($request->role_data)) {
                $user->syncRoles($request->role_data);  // 如果有角色选中与用户关联则更新用户角色
            } else {
                $user->syncRoles([]); // 如果没有选择任何与用户关联的角色则将之前关联角色解除
            }
            //操作日志记录
            UserOperationLog::setOperateLog(Auth::id(),'admin.users.store',$operate,$data);
            DB::commit();
            return response()->json(['code' => 0, 'msg' => 'ok']);
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error($exception);
            return response()->json(['code' => 100, 'msg' => $exception->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(User $user)
    {
        $role_ids = ModelHasRole::where('model_id',$user->id)->pluck('role_id');
        return response()->json(['code' => 0, 'msg' => 'ok', 'data' => $user, 'role_ids' => $role_ids]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(User $user)
    {
        try {
            $id = $user->id;
            $operate = '删除用户'.$user->name;
            if ($user->delete()) {
                UserOperationLog::setOperateLog(Auth::id(),'admin.users.destroy',$operate,$id);
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
        $user = User::findOrFail($id);
        if($user->is_able == 2){
            $operate = '启用用户'.$user->name;
            $user->is_able = 1;
        }else{
            $operate = '禁用用户'.$user->name;
            $user->is_able = 2;
        }
        $user->updated_by = Auth::id();
        $user->save();
        //日志记录
        UserOperationLog::setOperateLog(Auth::id(),'admin.users.ableDisable',$operate,['user.id'=>$id,'user.is_able'=>$user->is_able]);

        return response()->json(['code' => 0, 'msg' => '操作成功']);
    }


}

<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RbacSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();
        try {
            $user = User::where('name', 'root')->first();
            if (!$user) {
                $user = User::create([
                    'name' => 'root',
                    'email' => 'root@163.com',
                    'password' => Hash::make('123456'),
                ]);
            } else {
                $user->update([
                    'email' => 'root@163.com',
                    'password' => Hash::make('123456'),
                ]);
            }

            $role = \App\Models\Role::create([
                'name' => 'root',
                'display_name' => '超级管理员',
                'guard_name' => 'web',
            ]);

            \App\Models\ModelHasRole::create([
                'role_id' => $role->id,
                'model_type' => 'App\User',
                'model_id' => $user->id,
            ]);

            \App\Models\RoleHasPermission::insert([
                ['permission_id' => 1, 'role_id' => $role->id],
                ['permission_id' => 2, 'role_id' => $role->id],
                ['permission_id' => 3, 'role_id' => $role->id],
                ['permission_id' => 4, 'role_id' => $role->id],
                ['permission_id' => 5, 'role_id' => $role->id],
            ]);
            DB::commit();
            echo '执行成功';
        }catch (Exception $exception){
            DB::rollBack();
            echo '执行失败，已回滚';
        }
    }
}

@extends('layouts.back')

@section('content')
    <div class="content">
        <el-form :model="rolesDetailForm" :rules="rolesDetailFormRules" ref="rolesDetailForm" label-width="100px" class="role-detail-form">
            <el-form-item label="角色名" prop="name">
                <el-input v-model="rolesDetailForm.name" placeholder="请输入角色名" autocomplete="off" maxlength="20"></el-input>
            </el-form-item>
            <el-form-item label="描述" prop="display_name">
                <el-input v-model="rolesDetailForm.display_name" placeholder="请输入角色描述" autocomplete="off" maxlength="50"></el-input>
            </el-form-item>
            <el-form-item label="权限">
                <el-tree
                        ref="tree"
                        :check-strictly="checkStrictly"
                        :data="{{$permissions}}"
                        :props="defaultProps"
                        show-checkbox
                        node-key="id"
                        class="permission-tree"
                        @check="checkTree"
                />
            </el-form-item>
            <el-form-item>
                <el-button @click="onBack">返回</el-button>
                <el-button type="primary" @click="onConfirm('rolesDetailForm')" :loading="rolesDetailForm.loading">确认</el-button>
            </el-form-item>
        </el-form>
    </div>
@endsection

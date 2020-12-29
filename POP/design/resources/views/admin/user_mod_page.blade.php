@extends('layouts.back')

@section('content')
<div class="content">
    <el-form :model="usersDetailForm" :rules="usersDetailFormRules" ref="usersDetailForm" label-width="100px" class="ad-detail-form">
        <el-form-item label="用户名" prop="name">
            <el-input v-model="usersDetailForm.name" placeholder="请输入用户名" autocomplete="off" maxlength="20"></el-input>
        </el-form-item>
        <el-form-item label="联系方式" prop="phone">
            <el-input v-model="usersDetailForm.phone" placeholder="请输入联系方式" autocomplete="off"></el-input>
        </el-form-item>
        <el-form-item label="密码" prop="password">
            <input type="hide" style="display:none;">
            <el-input type="password" v-model="usersDetailForm.password" placeholder="请输入密码" autocomplete="off" minlength="6"></el-input>
        </el-form-item>
        <el-form-item>
            <p>密码至少6位，是由 数字 字母 _-.^*$+<>=%#@& 等特殊字符构成</p>
        </el-form-item>
        <el-form-item label="确认密码" prop="repassword">
            <el-input type="password" v-model="usersDetailForm.repassword" placeholder="请确认密码" autocomplete="off" minlength="6"></el-input>
        </el-form-item>
        <el-form-item label="角色">
            <el-tree
                    ref="tree"
                    :check-strictly="checkStrictly"
                    :data="{{$roles}}"
                    :props="roleProps"
                    show-checkbox
                    node-key="id"
                    class="permission-tree"
                    @check="checkRoleTree"
            />
        </el-form-item>
        <el-form-item>
            <el-button @click="onBack">返回</el-button>
            <el-button type="primary" @click="onConfirm('usersDetailForm')" :loading="usersDetailForm.loading">确认</el-button>
        </el-form-item>
    </el-form>
</div>
@endsection

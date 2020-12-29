@extends('layouts.back')

@section('content')
    <div class="content">
        <el-form :inline="true" :model="rolesListForm" class="roles-list-form">
            <el-form-item label="角色名称">
                <el-input v-model="rolesListForm.name" placeholder="请输入" clearable></el-input>
            </el-form-item>
{{--            <el-form-item label="启用状态">--}}
{{--                <el-select v-model="rolesListForm.is_able" placeholder="请选择" clearable>--}}
{{--                    <el-option v-for="(v, i) in IsAbleList" :key="v.id" :label="v.name" :value="v.id"></el-option>--}}
{{--                </el-select>--}}
{{--            </el-form-item>--}}
            <el-form-item>
                <el-button type="primary" icon="el-icon-search" @click="onSearch(rolesListForm)">查询</el-button>
                <el-button type="primary" @click="onAdd">新增</el-button>
            </el-form-item>
        </el-form>

        <el-table
                class="ad-table"
                :data="{{$roles}}"
                border>
            <el-table-column
                    fixed
                    prop="id"
                    label="序号"
                    width="100"
                    align="center">
            </el-table-column>
            <el-table-column
                    prop="name"
                    label="角色名"
                    min-width="150"
                    align="center">
            </el-table-column>
            <el-table-column
                    prop="display_name"
                    label="描述"
                    min-width="200"
                    align="center">
            </el-table-column>
            <el-table-column
                    prop="createdName"
                    label="创建人"
                    min-width="150"
                    align="center">
            </el-table-column>
            <el-table-column
                    prop="created_at"
                    label="创建时间"
                    min-width="200"
                    align="center">
            </el-table-column>
            <el-table-column
                    prop="updatedName"
                    label="修改人"
                    min-width="150"
                    align="center">
            </el-table-column>
            <el-table-column
                    prop="updated_at"
                    label="修改时间"
                    min-width="200"
                    align="center">
            </el-table-column>
{{--            <el-table-column--}}
{{--                    fixed="right"--}}
{{--                    label="启用/禁用"--}}
{{--                    min-width="100"--}}
{{--                    align="center">--}}
{{--                <template scope="scope">--}}
{{--                    <el-switch--}}
{{--                        on-text ="√"--}}
{{--                        off-text = "×"--}}
{{--                        on-color="#5B7BFA"--}}
{{--                        off-color="#dadde5"--}}
{{--                        v-model="scope.row.role_able"--}}
{{--                        @change=onAbleDisable(scope.$index,scope.row)--}}
{{--                    >--}}
{{--                    </el-switch>--}}
{{--                </template>--}}
{{--            </el-table-column>--}}
            <el-table-column
                    fixed="right"
                    label="操作"
                    width="100"
                    align="center">
                <template slot-scope="scope">
                    <el-button type="text" size="small" @click="onDel(scope.$index, scope.row)">删除</el-button>
                    <el-button type="text" size="small" @click="onEdit(scope.$index, scope.row)">编辑</el-button>
                </template>
            </el-table-column>
        </el-table>

        <el-pagination
                @current-change="handleCurrentChange(rolesListForm, $event)"
                :current-page="{{@$params['page']}}"
                :page-sizes="[{{@$params['pagesize']}}]"
                :page-size="{{@$params['pagesize']}}"
                layout="total, sizes, prev, pager, next, jumper"
                :total="{{@$total}}"
                style="text-align:center;padding:2rem 0 1rem;">
        </el-pagination>
    </div>
@endsection

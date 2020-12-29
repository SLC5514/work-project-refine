@extends('layouts.back')

@section('content')
    <div class="content">
        <el-form :inline="true" :model="operatelogListForm" class="roles-list-form">
            <el-form-item label="操作者名称">
                <el-input v-model="operatelogListForm.name" placeholder="请输入" clearable></el-input>
            </el-form-item>
            <el-form-item label="操作时间">
                <el-date-picker
                        v-model="operatelogListForm.start_end_at"
                        type="datetimerange"
                        :unlink-panels="true"
                        start-placeholder="开始日期"
                        range-separator="至"
                        end-placeholder="结束日期"
                        value-format="yyyy-MM-dd HH:mm:ss"
                        :default-time="['00:00:00', '23:59:59']">
                </el-date-picker>
            </el-form-item>
            <el-form-item>
                <el-button type="primary" icon="el-icon-search" @click="onSearch(operatelogListForm)">查询</el-button>
            </el-form-item>
        </el-form>

        <el-table
                class="ad-table"
                :data="{{$operateLogs}}"
                border>
            <el-table-column
                    fixed
                    prop="id"
                    label="ID"
                    width="100"
                    align="center">
            </el-table-column>
            <el-table-column
                    prop="name"
                    label="操作人"
                    min-width="150"
                    align="center">
            </el-table-column>
            <el-table-column
                    prop="operate"
                    label="操作功能"
                    min-width="200"
                    align="center">
            </el-table-column>
            <el-table-column
                    prop="created_at"
                    label="操作时间"
                    min-width="200"
                    align="center">
            </el-table-column>
        </el-table>

        <el-pagination
                @current-change="handleCurrentChange(operatelogListForm, $event)"
                :current-page="{{@$params['page']}}"
                :page-sizes="[{{@$params['pagesize']}}]"
                :page-size="{{@$params['pagesize']}}"
                layout="total, sizes, prev, pager, next, jumper"
                :total="{{@$total}}"
                style="text-align:center;padding:2rem 0 1rem;">
        </el-pagination>
    </div>
@endsection

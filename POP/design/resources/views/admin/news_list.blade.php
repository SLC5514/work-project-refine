@extends('layouts.back')

@section('content')
<div class="content">
    <el-form :inline="true" :model="newsListForm" class="news-list-form">
        <el-form-item label="分类">
            <el-select v-model="newsListForm.type" placeholder="分类" clearable>
                <el-option v-for="(v, i) in newsTypeList" :key="v.id" :label="v.name" :value="v.id"></el-option>
            </el-select>
        </el-form-item>
        <el-form-item label="状态">
            <el-select v-model="newsListForm.status" placeholder="状态" clearable>
                <el-option v-for="(v, i) in newsStatusList" :key="v.id" :label="v.name" :value="v.id"></el-option>
            </el-select>
        </el-form-item>
        <el-form-item label="时间">
            <el-date-picker
                v-model="newsListForm.start_end_at"
                type="datetimerange"
                :unlink-panels="true"
                start-placeholder="开始日期"
                range-separator="至"
                end-placeholder="结束日期"
                value-format="yyyy-MM-dd HH:mm:ss"
                :default-time="['23:59:59', '23:59:59']">
            </el-date-picker>
        </el-form-item>
        <el-form-item>
            <el-button type="primary" icon="el-icon-search" @click="onSearch(newsListForm)">查询</el-button>
            <el-button type="primary" @click="onAdd">新增</el-button>
        </el-form-item>
    </el-form>

    <el-table
        class="news-table"
        :data="{{$news}}"
        border>
        <el-table-column
            fixed
            prop="id"
            label="ID"
            width="100"
            align="center">
        </el-table-column>
        <el-table-column
            prop="title"
            label="标题"
            min-width="300"
            align="center">
        </el-table-column>
        <el-table-column
            prop="type"
            label="分类"
            width="110"
            :formatter="formatterType"
            align="center">
        </el-table-column>
        <el-table-column
            prop="img_src"
            label="封面图"
            width="122"
            align="center">
            <template slot-scope="scope">
                <img :src="scope.row.img_src" alt="">
            </template>
        </el-table-column>
        <el-table-column
            prop="created_at"
            label="创建时间"
            width="110"
            align="center">
        </el-table-column>
        <el-table-column
            label="有效期"
            width="200"
            align="center">
            <template slot-scope="scope">
                <div>@{{scope.row.begin_at}}</div>
                <div>-</div>
                <div>@{{scope.row.end_at}}</div>
            </template>
        </el-table-column>
        <el-table-column
            prop="up_line_at"
            label="上线时间"
            width="110"
            align="center">
        </el-table-column>
        <el-table-column
            prop="down_line_at"
            label="下线时间"
            width="110"
            align="center">
        </el-table-column>
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
        @current-change="handleCurrentChange(newsListForm, $event)"
        :current-page="{{@$params['page']}}"
        :page-sizes="[{{@$params['pagesize']}}]"
        :page-size="{{@$params['pagesize']}}"
        layout="total, sizes, prev, pager, next, jumper"
        :total="{{@$total}}"
        style="text-align:center;padding:2rem 0 1rem;">
    </el-pagination>
</div>
@endsection

@extends('layouts.back')

@section('content')
<div class="content">
    <el-form :model="adDetailForm" :rules="adDetailFormRules" ref="adDetailForm" label-width="100px" class="ad-detail-form">
        <el-form-item label="广告位置" prop="position">
            <el-select v-model="adDetailForm.position" placeholder="请选择广告位置">
                <el-option v-for="(v, i) in adPositionList" :key="v.id" :label="v.name" :value="v.id"></el-option>
            </el-select>
        </el-form-item>
        <el-form-item label="广告权重" prop="weight">
            <el-input v-model="adDetailForm.weight" placeholder="请输入广告权重"></el-input>
        </el-form-item>
        <el-form-item label="广告标题">
            <el-input v-model="adDetailForm.title" placeholder="请输入广告标题"></el-input>
        </el-form-item>
        <el-form-item label="广告副标题">
            <el-input v-model="adDetailForm.subtitle" placeholder="请输入广告副标题"></el-input>
        </el-form-item>
        <el-form-item label="广告描述">
            <el-input
                type="textarea"
                :rows="5"
                placeholder="请输入广告描述"
                v-model="adDetailForm.description">
            </el-input>
        </el-form-item>
        <el-form-item label="广告链接">
            <el-input v-model="adDetailForm.link" placeholder="请输入广告链接"></el-input>
        </el-form-item>
        <el-form-item label="上线时间" prop="up_line_at">
            <el-date-picker
                v-model="adDetailForm.up_line_at"
                type="datetime"
                value-format="yyyy-MM-dd HH:mm:ss"
                default-time="23:59:59"
                placeholder="请选择上线时间">
            </el-date-picker>
        </el-form-item>
        <el-form-item label="下线时间">
            <el-date-picker
                v-model="adDetailForm.down_line_at"
                type="datetime"
                value-format="yyyy-MM-dd HH:mm:ss"
                default-time="23:59:59"
                placeholder="请选择下线时间">
            </el-date-picker>
        </el-form-item>
        <el-form-item label="图片上传" prop="img_src">
            <el-upload
                class="uploader"
                action="/upload"
                name="img"
                :headers="{'X-CSRF-TOKEN': '{{ csrf_token() }}' }"
                :show-file-list="false"
                :on-success="adUploaderSuccess">
                    <img v-if="adDetailForm.img_src" :src="adDetailForm.img_src" class="uploader-img">
                    <i v-else class="el-icon-plus uploader-icon"></i>
            </el-upload>
        </el-form-item>
        <el-form-item>
            <p>首页顶部广告位图片尺寸为：2560*635</p>
            <p>品牌活动顶部广告位尺寸为：2560*350</p>
            <p>官方资讯顶部广告位尺寸为：2560*350</p>
            <p>关于设界顶部广告位尺寸为：2560*350</p>
        </el-form-item>
        <el-form-item>
            <el-button @click="onBack">返回</el-button>
            <el-button type="primary" @click="onConfirm('adDetailForm')" :loading="adDetailForm.loading">确认</el-button>
        </el-form-item>
    </el-form>
</div>
@endsection

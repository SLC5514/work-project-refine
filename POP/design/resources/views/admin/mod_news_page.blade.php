@extends('layouts.back')

@section('content')
<div class="content">
    <el-form :model="newsDetailForm" :rules="newsDetailFormRules" :validate-on-rule-change="false" ref="newsDetailForm" label-width="100px" class="news-detail-form">
        <el-form-item label="分类" prop="type">
            <el-select v-model="newsDetailForm.type" placeholder="请选择分类" @change="typeChange">
                <el-option v-for="(v, i) in newsTypeList" :key="v.id" :label="v.name" :value="v.id"></el-option>
            </el-select>
        </el-form-item>
        <el-form-item label="标题" prop="title">
            <el-input v-model="newsDetailForm.title" placeholder="请输入标题"></el-input>
        </el-form-item>
        <el-form-item label="描述" prop="description" v-show="newsDetailForm.type == 2">
            <el-input v-model="newsDetailForm.description" placeholder="请输入描述"></el-input>
        </el-form-item>
        <el-form-item label="活动标签" v-show="newsDetailForm.type == 1">
            <el-select v-model="newsDetailForm.activity_type" placeholder="请选择活动标签">
                <el-option v-for="(v, i) in newsTitleList" :key="v.id" :label="v.name" :value="v.id"></el-option>
            </el-select>
        </el-form-item>
        <el-form-item label="所属设界" prop="design_world" v-show="newsDetailForm.type == 1">
            <el-select v-model="newsDetailForm.design_world" placeholder="请选择所属设界">
                <el-option v-for="(v, i) in newsDesignList" :key="v.id" :label="v.name" :value="v.id"></el-option>
            </el-select>
        </el-form-item>
        <el-form-item label="活动地点" prop="venue" v-show="newsDetailForm.type == 1">
            <el-input v-model="newsDetailForm.venue" placeholder="请输入活动地点"></el-input>
        </el-form-item>
        <el-form-item label="活动有效期" prop="begin_end_at" v-show="newsDetailForm.type == 1">
            <el-date-picker
                v-model="newsDetailForm.begin_end_at"
                type="datetimerange"
                :unlink-panels="true"
                start-placeholder="开始日期"
                end-placeholder="结束日期"
                value-format="yyyy-MM-dd HH:mm:ss"
                :default-time="['23:59:59', '23:59:59']">
            </el-date-picker>
        </el-form-item>
        <el-form-item label="上线时间" prop="up_line_at">
            <el-date-picker
                v-model="newsDetailForm.up_line_at"
                type="datetime"
                value-format="yyyy-MM-dd HH:mm:ss"
                default-time="23:59:59"
                placeholder="请选择上线时间">
            </el-date-picker>
        </el-form-item>
        <el-form-item label="下线时间">
            <el-date-picker
                v-model="newsDetailForm.down_line_at"
                type="datetime"
                value-format="yyyy-MM-dd HH:mm:ss"
                default-time="23:59:59"
                placeholder="请选择下线时间">
            </el-date-picker>
        </el-form-item>
        <el-form-item label="封面图" prop="img_src">
            <el-upload
                class="uploader"
                action="/upload"
                name="img"
                :headers="{'X-CSRF-TOKEN': '{{ csrf_token() }}' }"
                :show-file-list="false"
                :on-success="newsUploaderSuccess">
                    <img v-if="newsDetailForm.img_src" :src="newsDetailForm.img_src" class="uploader-img">
                    <i v-else class="el-icon-plus uploader-icon"></i>
            </el-upload>
        </el-form-item>
        <el-form-item>
            <p>封面图尺寸为：@{{newsDetailForm.type == 1 && '384x216' || '270x203'}}</p>
        </el-form-item>
        <el-form-item label="二维码">
            <el-input v-model="newsDetailForm.qr_code_title" maxlength="10" placeholder="请输入二维码标题，最多输入10个字符" style="margin-bottom:22px;"></el-input>
            <el-upload
                class="uploader"
                action="/upload"
                name="img"
                :headers="{'X-CSRF-TOKEN': '{{ csrf_token() }}' }"
                :show-file-list="false"
                :on-success="qrcodeUploaderSuccess">
                    <img v-if="newsDetailForm.qr_code_images" :src="newsDetailForm.qr_code_images" class="uploader-img">
                    <i v-else class="el-icon-plus uploader-icon"></i>
            </el-upload>
        </el-form-item>
        <el-form-item label="正文" prop="content">
            <tinymce-editor v-model="newsDetailForm.content" :init="tinymceConfig" :tinymce-script-src="tinymceConfig.tinymceScriptSrc"></tinymce-editor>
        </el-form-item>
        <el-form-item>
            <el-button @click="onBack">返回</el-button>
            <el-button type="primary" @click="onConfirm('newsDetailForm')" :loading="newsDetailForm.loading">确认</el-button>
        </el-form-item>
    </el-form>
</div>
@endsection

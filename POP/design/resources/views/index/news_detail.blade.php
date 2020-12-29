@extends('layouts.index')

@section('title', $tdk['t'])
@section('keywords', $tdk['k'])
@section('description', $tdk['d'])

@section('styles')
<link href="{{ asset('css/views/news_detail.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <header-com></header-com>

    <div class="content" el-container>
        <div class="title-box">
            <div class="title">{{$info->title}}</div>
            <div class="info"><span>设界运营团队</span> / {{\Carbon\Carbon::parse($info->created_at)->format('Y年m月d日')}}</div>
        </div>
        <div class="detail-box">
            {!! $info->content->content !!}
        </div>
        @if ($info->qr_code_images)
        <div class="qrcode-title" sm-and-up>
            {{$info->qr_code_title}}<span>（长按或点击二维码保存到相册）</span>
        </div>
        <div class="qrcode-box js-qrcode-box">
            <img src="{{$info->qr_code_images}}" alt="" xs-only>
            <a href="{{$info->qr_code_images}}" download sm-and-up>
                <img src="{{$info->qr_code_images}}" alt="">
            </a>
            <p class="ellipsis" xs-only>{{$info->qr_code_title}}</p>
        </div>
        @endif
    </div>

    <footer-com></footer-com>
@endsection

@section('scripts')
<script src="{{ asset('js/views/news_detail.js') }}" defer></script>
@endsection

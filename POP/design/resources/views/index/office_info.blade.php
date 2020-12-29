@extends('layouts.index')

@section('title', $tdk['t'])
@section('keywords', $tdk['k'])
@section('description', $tdk['d'])

@section('styles')
<link href="{{ asset('css/views/office_info.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <header-com></header-com>

    <ad-banner-com :ads='@json($ads, JSON_UNESCAPED_UNICODE)' :is-active="true"></ad-banner-com>

    <div class="content" el-container>
        <ul class="news-list js-news-list">
            <!-- <li>
                <a href="javascript:;" target="_blank">
                    <img class="blur" src="http://www.popshejie.com/images/aboutus/aboutus_advantages1.png" alt="20/21秋冬男装主题趋势发布会">
                    <img src="http://www.popshejie.com/images/aboutus/aboutus_advantages1.png" alt="20/21秋冬男装主题趋势发布会">
                </a>
                <div>
                    <a class="title ellipsis" href="javascript:;" target="_blank">20/21秋冬男装主题趋势发布会</a>
                    <p>2020春夏巴黎高定时装周在上月刚刚落下帷幕，盘点本次高定周，代表精致女性的蕾丝，网纱等轻薄的女性化材质被频繁运用。花卉元素，精致的镶钻短项链以及吊灯耳坠等凸显女性特征的饰品也被各大品牌挑选作为饰品为饰…</p>
                    <div class="time">2019-11-12</div>
                </div>
            </li> -->
            <li class="loading">加载中...</li>
        </ul>
    </div>

    <footer-com></footer-com>
@endsection

@section('scripts')
<script src="{{ asset('js/views/office_info.js') }}" defer></script>
@endsection

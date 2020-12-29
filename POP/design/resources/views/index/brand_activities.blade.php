@extends('layouts.index')

@section('title', $tdk['t'])
@section('keywords', $tdk['k'])
@section('description', $tdk['d'])

@section('styles')
<link href="{{ asset('css/views/brand_activities.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <header-com></header-com>

    <ad-banner-com :ads='@json($ads, JSON_UNESCAPED_UNICODE)' :is-active="true"></ad-banner-com>

    <div class="content" el-container>
        <ul class="tab-box js-tab-box" row gutter-48>
            <li col>
                <a class="underline-btn noafter" href="/activity/recent/" data-t="recent">即将开始</a>
            </li>
            <li col>
                <a class="underline-btn noafter" href="/activity/review/" data-t="review">活动回顾</a>
            </li>
        </ul>
        <div class="tab-content">
            <ul class="activity-list js-activity-list" md-gutter-16 lg-gutter-24>
                <!-- <li col xs-11 sm-11 md-8>
                    <a target="_blank" href="javascript:;">
                        <i>非设界官方</i>
                        <img class="blur" src="http://www.popshejie.com/images/aboutus/aboutus_advantages1.png" alt="20/21秋冬男装主题趋势发布会">
                        <img src="http://www.popshejie.com/images/aboutus/aboutus_advantages1.png" alt="20/21秋冬男装主题趋势发布会">
                        <span class="msg">
                            <span class="title ellipsis">20/21秋冬男装主题趋势发布会</span>
                            <span class="info ellipsis">2019.11.20 · 浙江省湖州市吴兴区蜀山路26…</span>
                            <span class="underline-btn">更多详情</span>
                        </span>
                    </a>
                </li> -->
                <li class="loading">加载中...</li>
            </ul>
        </div>
    </div>

    <footer-com></footer-com>
@endsection

@section('scripts')
<script src="{{ asset('js/views/brand_activities.js') }}" defer></script>
@endsection

@extends('layouts.index')

@section('title', $tdk['t'])
@section('keywords', $tdk['k'])
@section('description', $tdk['d'])

@section('styles')
<link href="{{ asset('css/views/design_world_distribution.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <header-com></header-com>

    <div class="content" el-container>
        <ul class="design-list" lg-gutter-24 md-gutter-72 sm-gutter-64 xs-gutter-32>
            <li col lg-6 md-8 sm-12 xs-12>
                <a target="_blank" href="/design/shengze/">
                    <div class="img-box">
                        <img src="{{ asset('images/design_world_distribution/ds1.png') }}" alt="">
                        <i class="icon"></i>
                    </div>
                    <div class="info">
                        <div class="title ellipsis">盛泽镇市场东路699号4楼</div>
                        <div>
                            <span class="underline-btn">更多详情</span>
                        </div>
                    </div>
                </a>
            </li>
            <li col lg-6 md-8 sm-12 xs-12>
                <a target="_blank" href="/design/tongxiang/">
                    <div class="img-box">
                        <img src="{{ asset('images/design_world_distribution/ds2.png') }}" alt="">
                        <i class="icon"></i>
                    </div>
                    <div class="info">
                        <div class="title ellipsis">桐乡市工贸大道369号</div>
                        <div>
                            <span class="underline-btn">更多详情</span>
                        </div>
                    </div>
                </a>
            </li>
            <li col lg-6 md-8 sm-12 xs-12>
                <a target="_blank" href="/design/nantong/">
                    <div class="img-box">
                        <img src="{{ asset('images/design_world_distribution/ds3.png') }}" alt="">
                    </div>
                    <div class="info">
                        <div class="title ellipsis">南通市通州区志浩家纺城4楼</div>
                        <div>
                            <span class="underline-btn">更多详情</span>
                        </div>
                    </div>
                </a>
            </li>
            <li col lg-6 md-8 sm-12 xs-12>
                <a target="_blank" href="/design/guangzhou/">
                    <div class="img-box">
                        <img src="{{ asset('images/design_world_distribution/ds4.png') }}" alt="">
                    </div>
                    <div class="info">
                        <div class="title ellipsis">广州轻纺交易园D区2楼</div>
                        <div>
                            <span class="underline-btn">更多详情</span>
                        </div>
                    </div>
                </a>
            </li>
            <li col lg-6 md-8 sm-12 xs-12>
                <a target="_blank" href="/design/shaoxing/">
                    <div class="img-box">
                        <img src="{{ asset('images/design_world_distribution/ds5.png') }}" alt="">
                    </div>
                    <div class="info">
                        <div class="title ellipsis">绍兴市柯桥区国际面料采购中心</div>
                        <div>
                            <span class="underline-btn">更多详情</span>
                        </div>
                    </div>
                </a>
            </li>
            <li col lg-6 md-8 sm-12 xs-12>
                <a href="javascript:;">
                    <div class="img-box">
                        <img src="{{ asset('images/design_world_distribution/ds6.png') }}" alt="">
                    </div>
                    <div class="info">
                        <div class="title ellipsis">上海市青浦区双联路<br sm-ang-up>158号3楼</div>
                    </div>
                </a>
            </li>
            <li col lg-6 md-8 sm-12 xs-12>
                <a href="javascript:;">
                    <div class="img-box">
                        <img src="{{ asset('images/design_world_distribution/ds7.png') }}" alt="">
                    </div>
                    <div class="info">
                        <div class="title ellipsis">杭州市杰丰集团3号楼6楼</div>
                    </div>
                </a>
            </li>
            <li col lg-6 md-8 sm-12 xs-12>
                <a href="javascript:;">
                    <div class="img-box">
                        <img src="{{ asset('images/design_world_distribution/ds8.png') }}" alt="">
                    </div>
                    <div class="info">
                        <div class="title ellipsis">嘉善县西塘镇兴舜路16号</div>
                    </div>
                </a>
            </li>
        </ul>
    </div>

    <footer-com></footer-com>
@endsection

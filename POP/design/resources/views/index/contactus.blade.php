@extends('layouts.index')

@section('title', $tdk['t'])
@section('keywords', $tdk['k'])
@section('description', $tdk['d'])

@section('styles')
<link href="{{ asset('css/views/contactus.css') }}" rel="stylesheet" />
@endsection

@section('content')
<header-com></header-com>

<div class="content">
    <div class="banner">
        <div el-container>
            <i class="avatar"></i>
            <div>
                <div class="title">商务、场地等多种合作方式</div>
                <div class="info">可致电我们：4008-210-500，各地设界联系方式分别如下</div>
            </div>
        </div>
    </div>
    <section el-container>
        <div class="bg-title">盛泽设界</div>
        <ul row >
            <li col sm-15>
                <img src="{{ asset('images/contactus/cnt_sj1.png') }}" alt="" />
                <ul>
                    <li>
                        <div class="tit">联系地址：</div>
                        <p>江苏省苏州市吴江区盛泽镇市场东路699号东方纺织城4楼C/D区</p>
                    </li>
                    <li>
                        <div class="tit">服务电话：</div>
                        <p>15301717652</p>
                    </li>
                </ul>
            </li>
            <li class="code-info" col sm-9 xs-only>
                <img src="{{ asset('images/common/qrcode1.png') }}" alt="" />
                <p>微信扫一扫<br>获取人工咨询服务</p>
            </li>
        </ul>
    </section>
    <section el-container>
        <div class="bg-title">桐乡设界</div>
        <ul row >
            <li col sm-15>
                <img src="{{ asset('images/contactus/cnt_sj2.png') }}" alt="" />
                <ul>
                    <li>
                        <div class="tit">联系地址：</div>
                        <p>浙江省桐乡市濮院镇工贸大道369号B座（320创意广场）</p>
                    </li>
                    <li>
                        <div class="tit">服务电话：</div>
                        <p>13916490949</p>
                    </li>
                </ul>
            </li>
            <li class="code-info" col sm-9 xs-only>
                <img src="{{ asset('images/common/qrcode2.png') }}" alt="" />
                <p>微信扫一扫<br>获取人工咨询服务</p>
            </li>
        </ul>
    </section>
    <section el-container>
        <div class="bg-title">绍兴设界</div>
        <ul row >
            <li col sm-15>
                <img src="{{ asset('images/contactus/cnt_sj3.png') }}" alt="" />
                <ul>
                    <li>
                        <div class="tit">联系地址：</div>
                        <p>绍兴市柯桥区国际面料采购中心3区4楼</p>
                    </li>
                    <li>
                        <div class="tit">服务电话：</div>
                        <p>18801737531</p>
                    </li>
                </ul>
            </li>
            <li class="code-info" col sm-9 xs-only>
                <img src="{{ asset('images/common/qrcode3.png') }}" alt="" />
                <p>微信扫一扫<br>获取人工咨询服务</p>
            </li>
        </ul>
    </section>
    <section el-container>
        <div class="bg-title">广州设界</div>
        <ul row >
            <li col sm-15>
                <img src="{{ asset('images/contactus/cnt_sj4.png') }}" alt="" />
                <ul>
                    <li>
                        <div class="tit">联系地址：</div>
                        <p>广州市珠海区轻纺交易园D区国际时尚发布中心2楼设界</p>
                    </li>
                    <li>
                        <div class="tit">服务电话：</div>
                        <p>15018490019</p>
                    </li>
                </ul>
            </li>
            <li class="code-info" col sm-9 xs-only>
                <img src="{{ asset('images/common/qrcode4.png') }}" alt="" />
                <p>微信扫一扫<br>获取人工咨询服务</p>
            </li>
        </ul>
    </section>
    <section el-container>
        <div class="bg-title">南通设界</div>
        <ul row >
            <li col sm-15>
                <img src="{{ asset('images/contactus/cnt_sj5.png') }}" alt="" />
                <ul>
                    <li>
                        <div class="tit">联系地址：</div>
                        <p>南通市通州区志浩家纺城微供大楼4楼</p>
                    </li>
                    <li>
                        <div class="tit">服务电话：</div>
                        <p>13641757216</p>
                    </li>
                </ul>
            </li>
            <li class="code-info" col sm-9 xs-only>
                <img src="{{ asset('images/common/qrcode5.png') }}" alt="" />
                <p>微信扫一扫<br>获取人工咨询服务</p>
            </li>
        </ul>
    </section>
</div>

<footer-com :no-contact-us="true"></footer-com>
@endsection

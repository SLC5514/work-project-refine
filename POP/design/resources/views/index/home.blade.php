@extends('layouts.index')

@section('title', $tdk['t'])
@section('keywords', $tdk['k'])
@section('description', $tdk['d'])

@section('styles')
    <link href="{{ asset('css/views/home.css') }}" rel="stylesheet"/>
@endsection

@section('content')
    <header-com></header-com>

    <ad-banner-com :ads='@json($ads, JSON_UNESCAPED_UNICODE)'></ad-banner-com>

    <div class="content" el-container>
        <section class="s1">
            <div class="bg-title">设界介绍</div>
            <div class="info">
                设界是逸尚创展从线上走到线下的众创互联空间项目。该项目孵化于2016年，成立于2017年，是面向时尚产业创造者们的联合办公+联合展示空间，是以服务设计为切入口的时尚产业链接器及创研孵化加速器。该项目以园区服务赋能+精英人才游牧办公+产业孵化培育的创意创业深度服务特色，促活升级各地园区有招商无运营的现状，并且形成以“设计”为杠杆聚合撬动当地产业资源能量的新型模式。
            </div>
            <div class="box1">
                <img src="{{ asset('images/home/jsbg1.png') }}" alt="" md-and-down xs-only/>
                <img src="{{ asset('images/home/jsbg2.png') }}" alt="" lg-and-up sm-and-down xs-only/>
                <img src="{{ asset('images/home/jsbg3.png') }}" alt="" md-and-up xs-only/>
                <img src="{{ asset('images/home/jsbg4.png') }}" alt="" sm-and-up/>
            </div>
            <div class="more-btn">
                <a class="underline-btn" href="/about/" target="_blank">查看更多详情</a>
            </div>
        </section>
        <section class="s2">
            <div class="bg-title">设界典型案例</div>
            <div class="info">
                截止到2018年，设界已先后在全国10个产业地建立了8个不同主题内容的设界众创互联综合服务空间，（上海、南通、广州、杭州、常熟、绍兴柯桥、西塘、桐乡濮院、吴江盛泽等地）；其中空间占地面积超过5万方；运营载体面积超过10万方；常驻会员企业100多家，社群服务会员超过1000家，累计产业活动200余次，覆盖超万人次。各地设界在发展中帮助当地实现租赁型园区向服务型园区的转型和提升产业地创新转变能力。
            </div>
            <div class="box2 nav-box js-nav-box">
                <ul class="pager-box js-pager-box" el-container row gutter-48>
                    <li col>
                        <a class="on underline-btn noafter" href="javascript:;">盛泽设界</a>
                    </li>
                    <li col>
                        <a class="underline-btn noafter" href="javascript:;">桐乡设界</a>
                    </li>
                    <li col>
                        <a class="underline-btn noafter" href="javascript:;">广州设界</a>
                    </li>
                    <li col>
                        <a class="underline-btn noafter" href="javascript:;">南通设界</a>
                    </li>
                    <li col>
                        <a class="underline-btn noafter" href="javascript:;">绍兴设界</a>
                    </li>
                </ul>
                <div row>
                    <ul class="img-box js-img-box" col md-15 sm-14 xs-24>
                        <li class="on">
                            <a href="/design/shengze/" target="_blank">
                                <img src="{{ asset('images/home/sj_i1.png') }}" alt="盛泽设界"/>
                                <span class="black-btn" sm-and-up>查看详情</span>
                            </a>
                        </li>
                        <li>
                            <a href="/design/tongxiang/" target="_blank">
                                <img src="{{ asset('images/home/sj_i2.png') }}" alt="桐乡设界"/>
                                <span class="black-btn" sm-and-up>查看详情</span>
                            </a>
                        </li>
                        <li>
                            <a href="/design/guangzhou/" target="_blank">
                                <img src="{{ asset('images/home/sj_i3.png') }}" alt="广州设界"/>
                                <span class="black-btn" sm-and-up>查看详情</span>
                            </a>
                        </li>
                        <li>
                            <a href="/design/nantong/" target="_blank">
                                <img src="{{ asset('images/home/sj_i4.png') }}" alt="南通设界"/>
                                <span class="black-btn" sm-and-up>查看详情</span>
                            </a>
                        </li>
                        <li>
                            <a href="/design/shaoxing/" target="_blank">
                                <img src="{{ asset('images/home/sj_i5.png') }}" alt="绍兴设界"/>
                                <span class="black-btn" sm-and-up>查看详情</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="msg-box js-msg-box" col md-9 sm-10 xs-24>
                        <li class="on">
                            <p class="mb"><span>占地面积：</span>1.2万方</p>
                            <p><span>项目定位：</span>中国高端面料专业市场与服饰设计集群高地</p>
                            <p><span>合作伙伴：</span>中国东方丝绸市场、江苏盛泽东方纺织城发展有限公司</p>
                            <p><span>项目特点：</span>依托盛泽产地优势，设计赋能孵化及吸引设计师人才</p>
                            <a class="black-btn" href="/design/shengze/" target="_blank" xs-only>查看详情</a>
                        </li>
                        <li>
                            <p class="mb"><span>占地面积：</span>1.6万方</p>
                            <p><span>项目定位：</span>浙江省毛衫产业创新服务综合体</p>
                            <p><span>合作伙伴：</span>桐乡濮院政府</p>
                            <p><span>项目特点：</span>荣获首批浙江省省级产业创新服务综合体</p>
                            <a class="black-btn" href="/design/tongxiang/" target="_blank" xs-only>查看详情</a>
                        </li>
                        <li>
                            <p class="mb"><span>占地面积：</span>1500平米</p>
                            <p><span>项目定位：</span>时尚纺织产业界唯一以“服务设计”为切入口的时尚产业链接器和创研孵化加速器</p>
                            <p><span>合作伙伴：</span>广州轻纺交易</p>
                            <p class="min-info js-min-info" md-and-up xs-only><span>项目特点：</span>以“设计+面料+教育”为模式撬动当地产业资源能量的公共… <a class="move-open js-move-open" href="javascript:;">展开</a></p>
                            <p class="max-info js-max-info" sm-and-up><span>项目特点：</span>以“设计+面料+教育”为模式撬动当地产业资源能量的公共服务平台体系 <a class="move-close js-move-close" href="javascript:;" md-and-up xs-only>收起</a></p>
                            <a class="black-btn" href="/design/guangzhou/" target="_blank" xs-only>查看详情</a>
                        </li>
                        <li>
                            <p class="mb"><span>占地面积：</span>4400平米</p>
                            <p><span>项目定位：</span>全国首家家纺 lifestyle 概念的综合服务中心</p>
                            <p><span>合作伙伴：</span>南通川姜镇政府</p>
                            <p class="min-info js-min-info" md-and-up><span>项目特点：</span>和政府联合打造从家纺设计链接整个产业服务的综合服务中心，整合内外部产业链优质资源聚焦家纺特… <a class="move-open js-move-open" href="javascript:;">展开</a></p>
                            <p class="max-info js-max-info" sm-and-down><span>项目特点：</span>和政府联合打造从家纺设计链接整个产业服务的综合服务中心，整合内外部产业链优质资源聚焦家纺特色从生活方式链接家具、家居服、面料等多方面外部资源，形成整体生活方式的资源共同体系。 <a class="move-close js-move-close" href="javascript:;" md-and-up>收起</a></p>
                            <a class="black-btn" href="/design/nantong/" target="_blank" xs-only>查看详情</a>
                        </li>
                        <li>
                            <p class="mb"><span>占地面积：</span>40000平米</p>
                            <p><span>项目定位：</span>“赋布成衣”的综合一体化时尚设计创研中心</p>
                            <p><span>合作伙伴：</span>柯桥长发商业广场</p>
                            <p class="min-info js-min-info" md-and-up><span>项目特点：</span>帮助合作伙伴从项目定位策划到载体运营，一个集趋势灵感-面料图书馆供应链-中样板房-能力培训… <a class="move-open js-move-open" href="javascript:;">展开</a></p>
                            <p class="max-info js-max-info" sm-and-down><span>项目特点：</span>帮助合作伙伴从项目定位策划到载体运营，一个集趋势灵感-面料图书馆供应链-中样板房-能力培训-发布展示-展贸对接等，线下云端互联一体化智慧产业服务空间体系打造。 <a class="move-close js-move-close" href="javascript:;" md-and-up>收起</a></p>
                            <a class="black-btn" href="/design/shaoxing/" target="_blank" xs-only>查看详情</a>
                        </li>
                    </ul>
                    <ul class="m-pager-box js-m-pager" xs-only>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
            </div>
            <div class="more-btn">
                <a class="underline-btn" href="/design/" target="_blank">查看全部案例</a>
            </div>
        </section>

        @if($activities->count())
        <section class="s3">
            <div class="bg-title">设界最新活动</div>
            <div class="info center">
                全年举办200+活动：业内顶级大咖坐镇、行业干货分享、时尚资讯交流、国际设计师巡回show展。
            </div>
            <ul class="box3 activity-list hidescroll" md-gutter-16 lg-gutter-24>
                @foreach ($activities as $item)
                    <li col md-8 xs-11 sm-10>
                        <a target="_blank" href="{{$item->detail_link}}">
                            @if($item->activity_type_text)
                            <i>{{$item->activity_type_text}}</i>
                            @endif
                            <img class="blur" src="{{$item->img_src}}" alt="{{$item->title}}">
                            <img src="{{$item->img_src}}" alt="{{$item->title}}">
                            <span class="msg">
                                <span class="title ellipsis">{{$item->title}}</span>
                                <span class="info ellipsis">{{date('Y.m.d', strtotime($item->begin_at))}} · {{$item->venue}}</span>
                                <span class="underline-btn">更多详情</span>
                            </span>
                        </a>
                    </li>
                @endforeach
            </ul>
            <div class="more-btn">
                <a class="underline-btn" href="/activity/" target="_blank">查看全部活动</a>
            </div>
        </section>
        @endif

        <section class="s4">
            <div class="bg-title">设界获得的荣誉</div>
            <div class="box4 ry-container swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide" xs-gutter-8 sm-gutter-32 md-gutter-16 lg-gutter-24>
                        <img src="{{ asset('images/home/ry1.png') }}" alt="" col xs-8 sm-8 md-6/>
                        <img src="{{ asset('images/home/ry2.png') }}" alt="" col xs-8 sm-8 md-6/>
                        <img src="{{ asset('images/home/ry3.png') }}" alt="" col xs-8 sm-8 md-6/>
                        <img src="{{ asset('images/home/ry4.png') }}" alt="" col xs-8 sm-8 md-6/>
                        <img src="{{ asset('images/home/ry5.png') }}" alt="" col xs-8 sm-8 md-6/>
                        <img src="{{ asset('images/home/ry6.png') }}" alt="" col xs-8 sm-8 md-6/>
                        <img src="{{ asset('images/home/ry7.png') }}" alt="" col xs-8 sm-8 md-6 sm-and-down/>
                        <img src="{{ asset('images/home/ry8.png') }}" alt="" col xs-8 sm-8 md-6 sm-and-down/>
                    </div>
                    <div class="swiper-slide" xs-gutter-8 sm-gutter-32 md-gutter-16 lg-gutter-24>
                        <img src="{{ asset('images/home/ry9.png') }}" alt="" col xs-8 sm-8 md-6/>
                        <img src="{{ asset('images/home/ry10.png') }}" alt="" col xs-8 sm-8 md-6/>
                        <img src="{{ asset('images/home/ry11.png') }}" alt="" col xs-8 sm-8 md-6/>
                        <img src="{{ asset('images/home/ry12.png') }}" alt="" col xs-8 sm-8 md-6/>
                        <img src="{{ asset('images/home/ry13.png') }}" alt="" col xs-8 sm-8 md-6/>
                        <img src="{{ asset('images/home/ry14.png') }}" alt="" col xs-8 sm-8 md-6/>
                        <img src="{{ asset('images/home/ry15.png') }}" alt="" col xs-8 sm-8 md-6 sm-and-down/>
                        <img src="{{ asset('images/home/ry16.png') }}" alt="" col xs-8 sm-8 md-6 sm-and-down/>
                    </div>
                    <div class="swiper-slide" xs-gutter-8 sm-gutter-32 md-gutter-16 lg-gutter-24>
                        <img src="{{ asset('images/home/ry17.png') }}" alt="" col xs-8 sm-8 md-6/>
                        <img src="{{ asset('images/home/ry18.png') }}" alt="" col xs-8 sm-8 md-6/>
                        <img src="{{ asset('images/home/ry19.png') }}" alt="" col xs-8 sm-8 md-6/>
                    </div>
                </div>
                <div class="ry-pagination swiper-pagination"></div>
                <div class="ry-button-prev swiper-button-prev" xs-only></div>
                <div class="ry-button-next swiper-button-next" xs-only></div>
            </div>
        </section>
        <section class="s5">
            <div class="bg-title">精英联盟</div>
            <div class="box5 nav-box js-nav-box">
                <ul class="pager-box js-pager-box" el-container row gutter-48>
                    <li col>
                        <a class="on underline-btn noafter" href="javascript:;">园区市场</a>
                    </li>
                    <li col>
                        <a class="underline-btn noafter" href="javascript:;">企业协会</a>
                    </li>
                    <li col>
                        <a class="underline-btn noafter" href="javascript:;">平台机构</a>
                    </li>
                </ul>
                <div row>
                    <ul class="msg-box js-msg-box" col md-9 sm-10 xs-24>
                        <li class="on">
                            <p><span>广州轻纺交易园：</span>位于新港西路82号，雄踞中大纺织商圈核心地段，总占地面积15万平方米，总建筑面积达30万平方米，是目前中大纺织商圈首个汇聚纺织展贸、服装设计、服装打版、服装电商、时尚买手体验、时尚发布、行业交流平台以及国际纺织服装办学培训等相关业态的国际化纺织服装产业园区。
                            </p>
                        </li>
                        <li>
                            <p><span>广东省服装服饰行业协会：</span>成立于1990年，为广东服装业自律性、非营利性、全省性的行业中介组织。广东省服装服饰行业协会以推动广东服装产业发展为服务宗旨，为政府、行业、社会提供与服装行业相关的各种服务。
                            </p>
                        </li>
                        <li>
                            <p><span>蘑菇街：</span>是专注于时尚女性消费者的电子商务网站，是时尚和生活方式目的地，通过形式多样的时尚内容等时尚商品，让人们在分享和发现流行趋势的同时，享受购物体验
                                。旗下包括：蘑菇街、美丽说、uni等产品与服务。</p>
                        </li>
                    </ul>
                    <ul class="img-box js-img-box" col md-15 sm-14 xs-24>
                        <li class="on"><img src="{{ asset('images/home/sj_j1.png') }}" alt="广州轻纺交易园"/></li>
                        <li><img src="{{ asset('images/home/sj_j2.png') }}" alt="广东省服装服饰行业协会"/></li>
                        <li><img src="{{ asset('images/home/sj_j3.png') }}" alt="蘑菇街"/></li>
                    </ul>
                    <ul class="m-pager-box js-m-pager" xs-only>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
            </div>
            <div class="more-btn">
                <a class="underline-btn" href="/talent/" target="_blank">查看全部联盟</a>
            </div>
        </section>
        <div class="inquiry hide js-inquiry">
            <span>想合作咨询或申请入驻？</span>
            <a href="/contact/" target="_blank">立即咨询</a>
            <i class="inquiry-close js-inquiry-close"></i>
        </div>
    </div>

    <footer-com></footer-com>
@endsection

@section('scripts')
    <script src="{{ asset('js/views/home.js') }}" defer></script>
@endsection

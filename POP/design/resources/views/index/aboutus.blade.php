@extends('layouts.index')

@section('title', $tdk['t'])
@section('keywords', $tdk['k'])
@section('description', $tdk['d'])

@section('styles')
<link href="{{ asset('css/views/aboutus.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <header-com></header-com>

    <ad-banner-com :ads='@json($ads, JSON_UNESCAPED_UNICODE)' :is-active="true"></ad-banner-com>

    <div class="content">
        <div class="anchor" id="1"></div>
        <section class="introduction" el-container>
            <ul>
                <li row>
                    <div class="bg-title" col md-5>公司简介</div>
                    <div class="info min-info js-min-info" col md-19 sm-and-up>
                        作为创办于2004年的国内首家专业的全球时尚趋势网站——“POP-fashion.com”，致力于解决国内设计师对全球最新时尚资讯的需求，开拓信息眼界，启发设计灵感。在网站创办之初便获得了服饰企业和设计师的青睐…
                        <a class="move-open js-move-open" href="javascript:;">查看更多</a>
                    </div>
                    <div class="info max-info js-max-info" col md-19 xs-only>
                        作为创办于2004年的国内首家专业的全球时尚趋势网站——“POP-fashion.com”，致力于解决国内设计师对全球最新时尚资讯的需求，开拓信息眼界，启发设计灵感。在网站创办之初便获得了服饰企业和设计师的青睐，于2006年成立逸尚创展（上海）科技有限公司开始步入高速发展期。依托“POP全球趋势”网站集聚的百万级的用户群，先后拓展了“优料宝”面辅料供应链交易B2B平台、时创商学院、“设界”众创空间，完整实现了设计环节的服务闭环，满足了从开拓设计师信息眼界（时尚资讯）到设计作品的落地（面辅料采购），从人才能力提升（培训）到创业孵化环境（“设界”）再到时尚产业基金的时尚创意综合服务体系，为创意设计赋能，提升了时尚设计的效能。
                        <a href="https://www.pop136.com/aboutpop.php?sn=1" target="_blank" xs-only>更多内容</a>
                        <a class="move-close js-move-close" href="javascript:;" sm-and-up>收起内容</a>
                    </div>
                </li>
                <li row>
                    <div class="bg-title" col md-5>设界介绍</div>
                    <div class="info min-info js-min-info" col md-19 sm-and-up>
                        设界是以服务设计为切入口的时尚产业链接器及创研孵化加速器。该项目以园区服务赋能+精英人才游牧办公+产业孵化培育的创意创业深度服务为特色，促活升级各地园区有招商无运营的现状，并且形成以“设计”为杠杆聚合撬动当地产业资源能量的新型模式…
                        <a class="move-open js-move-open" href="javascript:;">查看更多</a>
                    </div>
                    <div class="info max-info js-max-info" col md-19 xs-only>
                        设界是以服务设计为切入口的时尚产业链接器及创研孵化加速器。该项目以园区服务赋能+精英人才游牧办公+产业孵化培育的创意创业深度服务为特色，促活升级各地园区有招商无运营的现状，并且形成以“设计”为杠杆聚合撬动当地产业资源能量的新型模式。<br>
                        <span>2018上海最具投资潜力50佳创业企业：</span>作为行业内的独角兽。设界项目通过共享研发、共享供应链、共享数据、共享办公，整合时尚资讯、面料交易、共创空间、时尚教育等各个环节，打造一个设计服务共享枢纽，以产业服务驱动产业发展。<br>
                        <span>纺织服装创意设计试点平台：</span><br>“设界”开创的新游牧共享服务模式助力原创设计，加快时尚产业迭代升级，成为工信部授予“纺织服装创意设计试点平台”的产业服务平台创新模式代表。<br>
                        <span>发展使命：</span>“为设计赋能、让设计无界”；<br>
                        <span>核心理念：</span>“创新共享、赋能并建”；<br>
                        <span>核心竞争力：</span>“用好互联网与人工智能技术实现行业服务的模式创新”；
                        <a class="move-close js-move-close" href="javascript:;" sm-and-up>收起内容</a>
                    </div>
                </li>
            </ul>
        </section>
        <div class="anchor" id="2"></div>
        <section class="core-advantages">
            <div el-container>
                <div class="bg-title">设界核心优势</div>
                <div class="hidescroll">
                    <ul row md-gutter-24 sm-gutter-72>
                        <li col md-8 sm-12>
                            <img src="{{ asset('images/aboutus/aboutus_advantages1.png') }}" alt="">
                            <div>
                                <div class="title">专注时尚产业</div>
                                <p>唯一一家14年服务时尚产业的产业互联网平台，聚焦时尚产业链联动，形成更好的上中下游的环环递进。</p>
                            </div>
                        </li>
                        <li col md-8 sm-12>
                            <img src="{{ asset('images/aboutus/aboutus_advantages2.png') }}" alt="">
                            <div>
                                <div class="title">全生命周期服务</div>
                                <p>从创意灵感、智能设计到智造样品，再到市场营销⼀站式服务，帮助创意产品全体系得以实现和快速市场化。</p>
                            </div>
                        </li>
                        <li col md-8 sm-12>
                            <img src="{{ asset('images/aboutus/aboutus_advantages3.png') }}" alt="">
                            <div>
                                <div class="title">云端产业互联</div>
                                <p>可实现会员智能系统，产业链内会员形成多渠道多通路联动效益，共享平台60万企业客户资源。</p>
                            </div>
                        </li>
                        <li col md-8 sm-12>
                            <img src="{{ asset('images/aboutus/aboutus_advantages4.png') }}" alt="">
                            <div>
                                <div class="title">数据趋势+产业展示</div>
                                <p>定期根据数据趋势形成沉浸式展示，共享1.8亿趋势素材资料；为企业提供从灵感到形象展示的优化升级；未来定向形成当地产业趋势指数研究成果发布。</p>
                            </div>
                        </li>
                        <li col md-8 sm-12>
                            <img src="{{ asset('images/aboutus/aboutus_advantages5.png') }}" alt="">
                            <div>
                                <div class="title">线上线下互动</div>
                                <p>线下⼊驻企业，可通过设界、POP、优料宝等多个⾃有线上服务平台，以及整合当地线上互联⽹平台进⾏从推⼴到获客到销售的全过程，轻松实现O2O经营互动。</p>
                            </div>
                        </li>
                        <li col md-8 sm-12>
                            <img src="{{ asset('images/aboutus/aboutus_advantages6.png') }}" alt="">
                            <div>
                                <div class="title">1+N多地联合溢出</div>
                                <p>设界产业地多地联网共享体系；从当地到外地； 帮助产业地优势产品形成常态化聚合展示。</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <div class="anchor" id="3"></div>
        <section class="system" el-container>
            <div class="bg-title">设界体系</div>
            <ul row md-gutter-64>
                <li col lg-14 lg-offset-0 md-offset-4>
                    <img src="{{ asset('images/aboutus/aboutus_system1.png') }}" alt="" />
                </li>
                <li col lg-10 md-12 sm-15 xs-15 sm-and-down>
                    <img src="{{ asset('images/aboutus/aboutus_system2.png') }}" alt="" />
                </li>
                <li col lg-10 md-12 sm-15 xs-15>
                    <img src="{{ asset('images/aboutus/aboutus_system3.png') }}" alt="" />
                </li>
                <li col lg-10 md-12 sm-15 xs-15 md-and-up>
                    <img src="{{ asset('images/aboutus/aboutus_system2.png') }}" alt="" />
                </li>
                <li col lg-14>
                    <img src="{{ asset('images/aboutus/aboutus_system4.png') }}" alt="" />
                </li>
            </ul>
        </section>
        <div class="anchor" id="4"></div>
        <section class="resources">
            <div el-container>
                <div class="bg-title">设界资源</div>
                <ul class="img-box" row>
                    <li col lg-18 md-22>
                        <img src="{{ asset('images/aboutus/aboutus_resources2.png') }}" alt="" sm-and-down />
                        <img src="{{ asset('images/aboutus/aboutus_resources3.png') }}" alt="" md-and-up />
                    </li>
                    <li class="logo-img" col lg-4 md-5 lg-push-2>
                        <img src="{{ asset('images/aboutus/aboutus_resources1.png') }}" alt="" />
                    </li>
                </ul>
                <ul class="txt-box" row gutter-40>
                    <li col xs-24>
                        <div class="title">深耕时尚产业</div>
                        <p>
                            <span>15载，</span><br>
                            立足自身能力、整合多方资源；<br>
                            服务平台上<span>60万</span>企业客户，<br>
                            <span>116万</span>设计师用户，90%的品牌；<br>
                            涉及服装、鞋、包、家纺、首饰、面辅料<br>
                            多个行业。
                        </p>
                    </li>
                    <li col xs-24>
                        <div class="title">设界定位</div>
                        <p class="subtitle">Design Infinity Positioning</p>
                        <p>
                            设计无界/产业互联。<br>
                            中国时尚行业涉及服务创新者。<br>
                            工信部纺织服装创意设计试点平台。<br>
                            以服务设计为切入口的时尚产业链<br>
                            接器&创研孵化加速器。
                        </p>
                    </li>
                </ul>
            </div>
        </section>
        <div class="anchor" id="5"></div>
        <section class="business" el-container>
            <div class="bg-title">设界业务</div>
            <ul row lg-gutter-40 md-gutter-16>
                <li col md-10 sm-12>
                    <div class="title">载体建设</div>
                    <img src="{{ asset('images/aboutus/aboutus_business1.png') }}" alt="" />
                </li>
                <li class="icon-add" col></li>
                <li col md-10 sm-12>
                    <div class="title">载体运营</div>
                    <img src="{{ asset('images/aboutus/aboutus_business2.png') }}" alt="" />
                </li>
            </ul>
        </section>
        <div class="anchor" id="6"></div>
        <section class="distributed">
            <div el-container>
                <div class="bg-title">设界分布</div>
                <div class="design-container swiper-container">
                    <ul class="design-list swiper-wrapper">
                        <div class="swiper-slide">
                            <li>
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
                            <li>
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
                        </div>
                        <div class="swiper-slide">
                            <li>
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
                            <li>
                                <a href="javascript:;">
                                    <div class="img-box">
                                        <img src="{{ asset('images/design_world_distribution/ds6.png') }}" alt="">
                                    </div>
                                    <div class="info">
                                        <div class="title ellipsis">上海市青浦区双联路158号3楼</div>
                                    </div>
                                </a>
                            </li>
                        </div>
                        <div class="swiper-slide">
                            <li>
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
                            <li>
                                <a href="javascript:;">
                                    <div class="img-box">
                                        <img src="{{ asset('images/design_world_distribution/ds7.png') }}" alt="">
                                    </div>
                                    <div class="info">
                                        <div class="title ellipsis">杭州市杰丰集团3号楼6楼</div>
                                    </div>
                                </a>
                            </li>
                        </div>
                        <div class="swiper-slide">
                            <li>
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
                            <li>
                                <a href="javascript:;">
                                    <div class="img-box">
                                        <img src="{{ asset('images/design_world_distribution/ds8.png') }}" alt="">
                                    </div>
                                    <div class="info">
                                        <div class="title ellipsis">嘉善县西塘镇兴舜路16号</div>
                                    </div>
                                </a>
                            </li>
                        </div>
                    </ul>
                    <div class="design-pagination swiper-pagination" lg-and-up></div>
                    <div class="design-button-prev swiper-button-prev" xs-only lg-and-up></div>
                    <div class="design-button-next swiper-button-next" xs-only lg-and-up></div>
                </div>
            </div>
        </section>
        <div class="anchor" id="7"></div>
        <section class="core-team" el-container>
            <div class="bg-title">核心团队</div>
            <ul>
                <li class="clear">
                    <img src="{{ asset('images/aboutus/aboutus_core_team_1.png') }}" alt="" sm-and-up>
                    <div>
                        <div class="title">流行资讯<br xs-only>事业部</div>
                        <p>团队超100位，均有服饰设计相关工作经验，负责时尚分析、趋势预测及成果研究，并进行设计创作。</p>
                    </div>
                </li>
                <li class="clear">
                    <div>
                        <div class="title title-add">客户价值<br xs-only>事业部</div>
                        <p>团队约100余名,服务于60万企业客户、116万设计师、3万多面料供应商等,实现设计服务有效落地。</p>
                    </div>
                    <img src="{{ asset('images/aboutus/aboutus_core_team_2.png') }}" alt="" sm-and-up>
                </li>
                <li class="clear">
                    <img src="{{ asset('images/aboutus/aboutus_core_team_3.png') }}" alt="" sm-and-up>
                    <div>
                        <div class="title">供应链事业部</div>
                        <p>团队约30余名,用原料买手人才实现供应链筛选与高效对接。</p>
                    </div>
                </li>
                <li class="clear">
                    <div>
                        <div class="title">互联网解决方案<br xs-only>事业部</div>
                        <p>团队约60余名，集中互联网人才，实现流行资讯的互联网化、设计的人工智能化（3D虚拟成衣等）致力于互联网科技到产业的应用。</p>
                    </div>
                    <img src="{{ asset('images/aboutus/aboutus_core_team_4.png') }}" alt="" sm-and-up>
                </li>
                <li class="clear">
                    <img src="{{ asset('images/aboutus/aboutus_core_team_5.png') }}" alt="" sm-and-up>
                    <div>
                        <div class="title">设界<br xs-only>事业部</div>
                        <p>团队约15名，重点于园区运营,有效协同总部资源与各产业集群地的合作方一起运营设计师众创园区。</p>
                    </div>
                </li>
            </ul>
        </section>
        <div class="anchor" id="8"></div>
        <section class="infrastructure">
            <div el-container>
                <div class="bg-title">基础设施</div>
                <div class="title">硬件配套服务</div>
                <p>多功能会议室、多功能发布厅、企业静态展示厅、 网红直播棚、康健中心、共享会议室、共享咖啡厅、 共享休息厅、服装图书馆、面辅料超市。</p>
                <div class="box">
                    <div class="infrastructure-container swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><img src="{{ asset('images/aboutus/aboutus_infrastructure1.png') }}" alt="" /></div>
                            <div class="swiper-slide"><img src="{{ asset('images/aboutus/aboutus_infrastructure2.png') }}" alt="" /></div>
                            <div class="swiper-slide"><img src="{{ asset('images/aboutus/aboutus_infrastructure3.png') }}" alt="" /></div>
                            <div class="swiper-slide"><img src="{{ asset('images/aboutus/aboutus_infrastructure4.png') }}" alt="" /></div>
                            <div class="swiper-slide"><img src="{{ asset('images/aboutus/aboutus_infrastructure5.png') }}" alt="" /></div>
                            <div class="swiper-slide"><img src="{{ asset('images/aboutus/aboutus_infrastructure6.png') }}" alt="" /></div>
                            <div class="swiper-slide"><img src="{{ asset('images/aboutus/aboutus_infrastructure7.png') }}" alt="" /></div>
                        </div>
                        <div class="swiper-button-next infrastructure-button-next" xs-only></div>
                    </div>
                </div>
            </div>
        </section>
        <div class="anchor" id="9"></div>
        <section class="service" el-container>
            <div class="title">软件配套服务</div>
            <ul row lg-gutter-24 md-gutter-16>
                <li col md-12 sm-24>
                    <div class="title">办公服务</div>
                    <ul row lg-gutter-24 md-gutter-16 sm-gutter-48 xs-gutter-8>
                        <li col col-6><div><i class="i1"></i>打印机服务</div></li>
                        <li col col-6><div><i class="i2"></i>网络使用</div></li>
                        <li col col-6><div><i class="i3"></i>共享会议室</div></li>
                        <li col col-6><div><i class="i4"></i>影音室使用</div></li>
                    </ul>
                </li>
                <li col md-12 sm-24>
                    <div class="title">政务服务</div>
                    <ul row lg-gutter-24 md-gutter-16 sm-gutter-48 xs-gutter-8>
                        <li col col-6><div><i class="i5"></i>工商注册</div></li>
                        <li col col-6><div><i class="i6"></i>工商变更</div></li>
                        <li col col-6><div><i class="i7"></i>科技项目咨询</div></li>
                        <li col col-6><div><i class="i8"></i>人才项目咨询</div></li>
                    </ul>
                </li>
                <li col md-12 sm-24>
                    <div class="title">法律服务</div>
                    <ul row lg-gutter-24 md-gutter-16 sm-gutter-48 xs-gutter-8>
                        <li col col-6><div><i class="i9"></i>法律咨询</div></li>
                        <li col col-6><div><i class="i10"></i>合同审核</div></li>
                        <li col col-6><div><i class="i11"></i>版权协议</div></li>
                        <li col col-6><div><i class="i12"></i>法律维权</div></li>
                    </ul>
                </li>
                <li col md-12 sm-24>
                    <div class="title">生活服务</div>
                    <ul row lg-gutter-24 md-gutter-16 sm-gutter-48 xs-gutter-8>
                        <li col col-8><div><i class="i13"></i>人才公寓申请</div></li>
                        <li col col-8><div><i class="i14"></i>暂住登记代办</div></li>
                        <li col col-8><div><i class="i15"></i>子女就学申请</div></li>
                    </ul>
                </li>
                <li col md-12 sm-24>
                    <div class="title">活动服务</div>
                    <ul row lg-gutter-24 md-gutter-16 sm-gutter-48 xs-gutter-8>
                        <li col col-8><div><i class="i16"></i>创客健身中心使用</div></li>
                        <li col col-8><div><i class="i17"></i>瑜伽房使用</div></li>
                        <li col col-8><div><i class="i18"></i>足球场使用</div></li>
                    </ul>
                </li>
                <li col md-12 sm-24>
                    <div class="title">创业服务</div>
                    <ul row lg-gutter-24 md-gutter-16 sm-gutter-48 xs-gutter-8>
                        <li col col-8><div><i class="i19"></i>融资对接</div></li>
                        <li col col-8><div><i class="i20"></i>企业咨询管理</div></li>
                        <li col col-8><div><i class="i21"></i>BR/PPT优化撰写</div></li>
                    </ul>
                </li>
                <li col md-12 sm-24>
                    <div class="title">人事管理服务</div>
                    <ul row lg-gutter-24 md-gutter-16 sm-gutter-48 xs-gutter-8>
                        <li col col-8><div><i class="i22"></i>代缴社保</div></li>
                        <li col col-8><div><i class="i23"></i>猎头服务</div></li>
                        <li col col-8><div><i class="i24"></i>职工体检</div></li>
                    </ul>
                </li>
                <li col md-12 sm-24>
                    <div class="title">财会服务</div>
                    <ul row lg-gutter-24 md-gutter-16 sm-gutter-48 xs-gutter-8>
                        <li col col-8><div><i class="i25"></i>代理记账</div></li>
                        <li col col-8><div><i class="i26"></i>年度审计</div></li>
                        <li col col-8><div><i class="i27"></i>税务审计</div></li>
                    </ul>
                </li>
                <li col md-12 sm-24>
                    <div class="title">知识产权</div>
                    <ul row lg-gutter-24 md-gutter-16 sm-gutter-48 xs-gutter-8>
                        <li col col-8><div><i class="i28"></i>商标注册</div></li>
                        <li col col-8><div><i class="i29"></i>专利申请</div></li>
                        <li col col-8><div><i class="i30"></i>软件著作权申请</div></li>
                    </ul>
                </li>
                <li col md-12 sm-24>
                    <div class="title">设计宣传</div>
                    <ul row lg-gutter-24 md-gutter-16 sm-gutter-48 xs-gutter-8>
                        <li col col-8><div><i class="i31"></i>LOGO设计</div></li>
                        <li col col-8><div><i class="i32"></i>包装设计</div></li>
                        <li col col-8><div><i class="i33"></i>海报设计</div></li>
                    </ul>
                </li>
                <li col md-12 sm-24>
                    <div class="title">技术支持</div>
                    <ul row lg-gutter-24 md-gutter-16 sm-gutter-48 xs-gutter-8>
                        <li col col-8><div><i class="i34"></i>网站开发</div></li>
                        <li col col-8><div><i class="i35"></i>APP开发</div></li>
                        <li col col-8><div><i class="i36"></i>微信平台开发</div></li>
                    </ul>
                </li>
                <li col md-12 sm-24>
                    <div class="title">运营推广</div>
                    <ul row lg-gutter-24 md-gutter-16 sm-gutter-48 xs-gutter-8>
                        <li col col-8><div><i class="i37"></i>稿件撰稿发布</div></li>
                        <li col col-8><div><i class="i38"></i>微信.微博转发</div></li>
                        <li col col-8><div><i class="i39"></i>线下推广策划</div></li>
                    </ul>
                </li>
            </ul>
        </section>
    </div>

    <footer-com></footer-com>
@endsection

@section('scripts')
<script src="{{ asset('js/views/aboutus.js') }}" defer></script>
@endsection

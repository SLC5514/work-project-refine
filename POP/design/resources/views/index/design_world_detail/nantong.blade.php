<div class="content" el-container>
    <h1>南通设界</h1>
    <address>南通市通州区志浩家纺城微供大楼4楼</address>
    <div class="ctn" row gutter-24>
        <section col col-24 md-16>
            <div class="banner-box">
                <div class="swiper-container swiper-gallery">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/nantong/nantong_d1.png') }}" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/nantong/nantong_d2.png') }}" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/nantong/nantong_d3.png') }}" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/nantong/nantong_d4.png') }}" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/nantong/nantong_d5.png') }}" alt=""></div>
                    </div>
                    <div class="swiper-pagination gallery-pagination" sm-and-up></div>
                    <div class="swiper-button-next gallery-button-next" xs-only></div>
                </div>
                <div class="swiper-container swiper-thumbs">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/nantong/nantong_d1.png') }}" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/nantong/nantong_d2.png') }}" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/nantong/nantong_d3.png') }}" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/nantong/nantong_d4.png') }}" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/nantong/nantong_d5.png') }}" alt=""></div>
                    </div>
                </div>
            </div>
            <div class="introduction">
                <div class="title">南通设界介绍</div>
                <p>作为全国第一家坐落于南通家纺城的家纺产业全链条“助力加速器”，南通设界同时具备联合办公空间、共享会客厅、立体趋势展馆、资讯信息站、赋能教室等功能，为当地家纺企业及人才提供资源对接、产品展示、创业孵化、趋势灵感资讯、智能设计工具、赋能培训等供应链全套解决方案。</p>
            </div>
        </section>
        <div class="aside js-aside" col col-24 md-8>
            <div class="merchants">
                <div class="title">联系我们</div>
                <span>合作咨询，请联系</span>
                <p><i class="weixin"></i>微信号：ykw1048173091</p>
                <p><i class="phone"></i>联系电话：136 4175 7216</p>
            </div>
            @component('index.design_world_detail.activities_component', ['activities' => $activities])
            @endcomponent
        </div>
        <section col col-24 md-16>
            <div class="services-resources">
                <div class="title">服务及资源</div>
                <p>联合办公空间、共享会客空间、立体趋势图书馆、资讯信息站、赋能教室、精品设计工作室、培训会议接待室、网络直播间等多种服务设施，满足您的多种办公需求。</p>
                <div class="swiper-container swiper-resources">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/nantong/nantong_img1.png') }}" alt=""><span>面料展示区-1</span></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/nantong/nantong_img2.png') }}" alt=""><span>面料展示区-2</span></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/nantong/nantong_img3.png') }}" alt=""><span>面料展示区-3</span></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/nantong/nantong_img4.png') }}" alt=""><span>面料展示区-4</span></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/nantong/nantong_img5.png') }}" alt=""><span>面料展示区-5</span></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/nantong/nantong_img6.png') }}" alt=""><span>主题陈列区-1</span></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/nantong/nantong_img7.png') }}" alt=""><span>主题陈列区-2</span></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/nantong/nantong_img8.png') }}" alt=""><span>主题陈列区-3</span></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/nantong/nantong_img9.png') }}" alt=""><span>主题陈列区-4</span></div>
                    </div>
                    <div class="swiper-button-next services-button-next" xs-only></div>
                </div>
            </div>
            <div class="infrastructure no-mb">
                <div class="title">基础设施</div>
                <ul row>
                    <li class="i1" col col-8>打印机服务</li>
                    <li class="i2" col col-8>融资对接</li>
                    <li class="i3" col col-8>人才公寓申请</li>
                    <li class="i4" col col-8>工商注册</li>
                    <li class="i5" col col-8>人事管理</li>
                    <li class="i6" col col-8>财会服务</li>
                    <li class="i7" col col-8>财务管理</li>
                    <li class="i8" col col-8>法律服务</li>
                    <li class="i9" col col-8>运营推广</li>
                </ul>
                <div class="more-btn">
                    <a class="underline-btn" href="/about/#8" target="_blank">更多设施服务详情</a>
                </div>
            </div>
        </section>
    </div>
</div>

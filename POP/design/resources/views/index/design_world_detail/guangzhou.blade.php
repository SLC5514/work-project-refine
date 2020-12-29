<div class="content" el-container>
    <h1>广州设界</h1>
    <address>广州市珠海区轻纺交易园D区国际时尚发布中心2楼设界</address>
    <div class="ctn" row gutter-24>
        <section col col-24 md-16>
            <div class="banner-box">
                <div class="swiper-container swiper-gallery">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/guangzhou/guangzhou_d1.png') }}" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/guangzhou/guangzhou_d2.png') }}" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/guangzhou/guangzhou_d3.png') }}" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/guangzhou/guangzhou_d4.png') }}" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/guangzhou/guangzhou_d5.png') }}" alt=""></div>
                    </div>
                    <div class="swiper-pagination gallery-pagination" sm-and-up></div>
                    <div class="swiper-button-next gallery-button-next" xs-only></div>
                </div>
                <div class="swiper-container swiper-thumbs">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/guangzhou/guangzhou_d1.png') }}" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/guangzhou/guangzhou_d2.png') }}" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/guangzhou/guangzhou_d3.png') }}" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/guangzhou/guangzhou_d4.png') }}" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/guangzhou/guangzhou_d5.png') }}" alt=""></div>
                    </div>
                </div>
            </div>
            <div class="introduction">
                <div class="title">广州设界介绍</div>
                <p>国家级纺织服装创意设计试点平台，时尚纺织产业界唯一以“服务设计”为切入口的时尚产业链接器和创研孵化加速器，带着POP15年时尚产业设计服务互联网平台的经验与资源，开创了一个以产业创意资源产业公共服务为核心的全新产业园区模式，并形成以“设计+面料+教育”为模式撬动当地产业资源能量的公共服务平台体系，覆盖国内9个时尚产业园区,运营面积超过10万方,服务全球9个国家，平台拥有全球116万设计师，60万服装品牌,3万面料商，广州设界设立华南唯一趋势图书馆，拥有趋势图书4000多册。</p>
            </div>
        </section>
        <div class="aside js-aside" col col-24 md-8>
            <div class="merchants">
                <div class="title">联系我们</div>
                <span>合作咨询，请联系</span>
                <p><i class="weixin"></i>微信号：fengyongqiang</p>
                <p><i class="phone"></i>联系电话：150 1849 0019</p>
            </div>
            @component('index.design_world_detail.activities_component', ['activities' => $activities])
            @endcomponent
        </div>
        <section col col-24 md-16>
            <div class="services-resources">
                <div class="title">服务及资源</div>
                <p>提供时尚趋势发布会、服装发布会订货会、高校校外教育拓展基地、时尚设计师读书会、买手设计师培训会、会议场地使用以及国内唯一趋势图书馆：首个时尚趋势设计图书馆，拥有4000多册时尚图书和3万多种面料，覆盖华南3万设计师社群。</p>
                <div class="swiper-container swiper-resources">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/guangzhou/guangzhou_img1.png') }}" alt=""><span>会议室</span></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/guangzhou/guangzhou_img2.png') }}" alt=""><span>趋势区</span></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/guangzhou/guangzhou_img3.png') }}" alt=""><span>趋势区</span></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/guangzhou/guangzhou_img4.png') }}" alt=""><span>趋势区</span></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/guangzhou/guangzhou_img5.png') }}" alt=""><span>趋势区</span></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/guangzhou/guangzhou_img6.png') }}" alt=""><span>面料区</span></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/guangzhou/guangzhou_img7.png') }}" alt=""><span>面料区</span></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/guangzhou/guangzhou_img8.png') }}" alt=""><span>面料区</span></div>
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

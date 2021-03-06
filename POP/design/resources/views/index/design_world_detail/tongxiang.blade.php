<div class="content" el-container>
    <h1>桐乡设界</h1>
    <address>浙江省桐乡市濮院镇工贸大道369号B座（320创意广场）</address>
    <div class="ctn" row gutter-24>
        <section col col-24 md-16>
            <div class="banner-box">
                <div class="swiper-container swiper-gallery">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/tongxiang/tongxiang_d1.png') }}" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/tongxiang/tongxiang_d2.png') }}" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/tongxiang/tongxiang_d3.png') }}" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/tongxiang/tongxiang_d4.png') }}" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/tongxiang/tongxiang_d5.png') }}" alt=""></div>
                    </div>
                    <div class="swiper-pagination gallery-pagination" sm-and-up></div>
                    <div class="swiper-button-next gallery-button-next" xs-only></div>
                </div>
                <div class="swiper-container swiper-thumbs">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/tongxiang/tongxiang_d1.png') }}" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/tongxiang/tongxiang_d2.png') }}" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/tongxiang/tongxiang_d3.png') }}" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/tongxiang/tongxiang_d4.png') }}" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/tongxiang/tongxiang_d5.png') }}" alt=""></div>
                    </div>
                </div>
            </div>
            <div class="introduction">
                <div class="title">嘉兴设界介绍</div>
                <p>以濮院设计地标320创意广场为载体，汇聚创新资源要素，创建产业创新服务综合体，实现从项目研发到产业孵化的全链式服务体系。</p>
                <p>综合体设计援引“凤栖梧桐”的典故，以“凤仪濮川 织造吴桐”为主题概念，凤代表人才，濮川即濮院，织造呼应产业，吴桐代表由吴越文化发展而来的桐乡，意为优质人才被濮院的产业优势吸引而来，编织出中国时尚毛衫产业的新未来。</p>
            </div>
            <div class="position-introduction">
                <div class="title">地理位置介绍</div>
                <p>30分钟即可抵达桐乡高铁站，60分钟即可抵达嘉兴港，1.5小时即可抵达虹桥/萧山机场，且多条高速公路连接长三角经济圈。</p>
                <img src="{{ asset('images/design_world_detail/tongxiang/tongxiang_map.png') }}" alt="">
            </div>
        </section>
        <div class="aside js-aside" col col-24 md-8>
            <div class="merchants">
                <div class="title">招商入驻</div>
                <span>入驻政策</span>
                <ul row md-gutter-16 xs-gutter-40>
                    <li col col-11 md-12 xs-11><div>人才政策</div></li>
                    <li col col-11 md-12 xs-11><div>科技政策</div></li>
                    <li col col-11 md-12 xs-11><div>税收政策</div></li>
                    <li col col-11 md-12 xs-11><div>项目运营政策</div></li>
                </ul>
                <div class="subtitle">更多政策，请咨询项目招商负责人</div>
                <p><i class="weixin"></i>微信号：zhiqiang887</p>
                <p><i class="phone"></i>联系电话：139 1649 0949</p>
            </div>
            <div class="review">
                <div class="title">大事件回顾</div>
                <div
                    id="review-player"
                    class="video-box"
                    data-id="XNDcwNjU0Mjc5Mg=="
                ></div>
            </div>
            @component('index.design_world_detail.activities_component', ['activities' => $activities])
            @endcomponent
        </div>
        <section col col-24 md-16>
            <div class="services-resources">
                <div class="title">服务及资源</div>
                <p>精品设计工作室、培训会议接待室、图书馆、网络直播间、共享会议室等多种服务设施，满足您的多种办公需求。</p>
                <div class="swiper-container swiper-resources">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/tongxiang/tongxiang_img1.png') }}" alt=""><span>时尚长廊</span></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/tongxiang/tongxiang_img2.png') }}" alt=""><span>共享会议室</span></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/tongxiang/tongxiang_img3.png') }}" alt=""><span>共享游牧办公区</span></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/tongxiang/tongxiang_img4.png') }}" alt=""><span>共享教研室</span></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/tongxiang/tongxiang_img5.png') }}" alt=""><span>孵化平台 </span></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/tongxiang/tongxiang_img6.png') }}" alt=""><span>孵化峡谷</span></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/tongxiang/tongxiang_img7.png') }}" alt=""><span>面辅料馆</span></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/tongxiang/tongxiang_img8.png') }}" alt=""><span>面辅料馆</span></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/tongxiang/tongxiang_img9.png') }}" alt=""><span>新锐创意展厅</span></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/tongxiang/tongxiang_img10.png') }}" alt=""><span>培强基地</span></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/tongxiang/tongxiang_img11.png') }}" alt=""><span>趋势图书馆</span></div>
                        <div class="swiper-slide"><img src="{{ asset('images/design_world_detail/tongxiang/tongxiang_img12.png') }}" alt=""><span>众乐谷</span></div>
                    </div>
                    <div class="swiper-button-next services-button-next" xs-only></div>
                </div>
            </div>
            <div class="infrastructure">
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
        <section col col-24>
            <div class="supporting-services js-supporting-services">
                <div class="title">特色配套服务</div>
                <ul row gutter-72>
                    <li class="fr" col col-24 md-12>
                        <img src="{{ asset('images/design_world_detail/detail_s1.png') }}" alt="" xs-only>
                        <img src="{{ asset('images/design_world_detail/detail_s1_h5.png') }}" alt="" sm-and-up>
                    </li>
                    <li col col-24 md-12>
                        <div class="tit tit1"></div>
                        <div class="tp i-content">内容构成</div>
                        <div class="bt">书籍阅读室：</div>
                        <p>涵盖：美国Pantone、德国Mode Information、英国ITBD、意大利SASS、日本Kaigai、POP趋势 mostrend等500余种。</p>
                        <div class="bt">数据查询室：</div>
                        <p>涵盖：POP全球趋势、WGSN趋势（英国）、Pantone（美国）、蝶讯、热点（中国）等。</p>
                        <div class="tp i-value">价值</div>
                        <p>从信息端进行整合共享，提高中小微企业的信息来源格局； 提高创新设计开发准度效率，降低企业开发成本，并且从而形成聚合探索研究濮院特色的数据化趋势风。</p>
                    </li>
                    <li col col-24 md-12>
                        <img src="{{ asset('images/design_world_detail/detail_s2.png') }}" alt="">
                    </li>
                    <li col col-24 md-12>
                        <div class="tit tit2"></div>
                        <div class="tp i-content">内容构成</div>
                        <div class="bt">面料图书馆：</div>
                        <p>精选3000SKU(种类)； 预计10年累计更新近4万余种</p>
                        <div class="bt">辅料图书馆：</div>
                        <p>精选5000SKU(种类)； 预计10年累计更新近4万余种</p>
                        <div class="bt">纱线图书馆：</div>
                        <p>精选500SKU（种类）；预计10年累计更新近万余种（美国狮王、Red Heart、Bernat，Caron、扬子、康赛尼、新澳、康宝莱）</p>
                        <div class="tp i-value">价值</div>
                        <p>提高企业采购效率，从新材料端进行整合共享提高中小微企业的供应链来源。提高创新设计研发质量标准帮助中小微企业建立多元的自身原料技术壁垒。</p>
                    </li>
                    <li class="fr" col col-24 md-12>
                        <img src="{{ asset('images/design_world_detail/detail_s3.png') }}" alt="">
                    </li>
                    <li col col-24 md-12>
                        <div class="tit tit3"></div>
                        <div class="tp i-content">内容构成</div>
                        <div class="bt">工艺实验区：</div>
                        <p>涵盖：3D打印机、电脑绣花机、数码印花、装饰烫片、扎染、热烫覆合、镭射切割等装饰工具设备设施预计10-20台设备品种及对应要素材料，建设“自助式”开发实验设施。</p>
                        <div class="bt">智造示范线：</div>
                        <p>涵盖：德国STOLL、Brothers、日本重工、岛津、美国TG3D、韩国CLO 3D、金龙、宏华等国内外一线先锋软硬件设备设施。</p>
                        <div class="tp i-value">价值</div>
                        <p>提供创新工艺实践及智能智造开发设备使用的服务。提供定期“创新智造交流日”和不定期新设备新技术发布会、设备采购订购对接以及4.0智造专题游学深度走访等多元专业交流活动。</p>
                    </li>
                    <li col col-24 md-12>
                        <img src="{{ asset('images/design_world_detail/detail_s4.png') }}" alt="">
                    </li>
                    <li class="v-align" col col-24 md-12>
                        <div class="tit tit4"></div>
                        <div class="tp i-value">价值</div>
                        <p>从设计人才、优质买家到优质传播形成闭环对接体系的时尚发布体系，为当地孕育孵化国家级乃至世界级品牌打造提供 强有力的支持；同时对应“趋势研究院”的数据趋势研究成果发布为打造国家级“创新创意”平台体系建立的对内赋能对外发声的线索式串联创意设计循环生态体系。</p>
                    </li>
                    <li class="fr" col col-24 md-12>
                        <img src="{{ asset('images/design_world_detail/detail_s5.png') }}" alt="">
                    </li>
                    <li class="v-align" col col-24 md-12>
                        <div class="tit tit5"></div>
                        <div class="tp i-positioning">定位</div>
                        <div class="bt">孵化：<p>实习生实训基地。</p></div>
                        <div class="bt">培育：<p>新兴设计师游牧办公培养。</p></div>
                        <div class="bt">传帮带：<p>大师传帮带。</p></div>
                    </li>
                    <li col col-24 md-12>
                        <img src="{{ asset('images/design_world_detail/detail_s6.png') }}" alt="">
                    </li>
                    <li col col-24 md-12>
                        <div class="tit tit6"></div>
                        <div class="tp i-plan">产学研产业应用培育计划</div>
                        <div class="bt"><span>定位：</span><p>职业人才专业化、专业人才职业化。</p></div>
                        <div class="bt"><span>构成：</span><p>高校课程专业体系+外部培训机构经验体系。</p></div>
                        <div class="bt"><span>特色：</span><p>3步职业人才阶梯培养。</p></div>
                        <div class="tp">职业人才教育内容构成：</div>
                        <p>● 根据当地产业情况联合外部院校及培训机构开设公开课程；预计单次规模：100-300人。</p>
                        <p>● 根据当地中小性企业特性定制企业职业人才能力梯队建设实操性workshop训练营课程；预计单次规模30-50</p>
                        <p>● 聚焦当地重点企业决策人才进行决策人才综合素质培养或推荐对接MBA或海外留学对接。</p>
                        <div class="tp">课程类目：</div>
                        <p>设计、高新技术、营销、制造、品牌等专业课程体系+新媒体、新营销、新制造、新企业等新思维课程体系。</p>
                    </li>
                    <li class="fr" col col-24 md-12>
                        <img src="{{ asset('images/design_world_detail/detail_s7.png') }}" alt="">
                    </li>
                    <li class="v-align" col col-24 md-12>
                        <div class="tit tit7"></div>
                        <div class="tp i-activity">系列产业活动</div>
                        <div class="bt"><span>定位：</span><p> 聚焦产业链系统系列主题活动进行产业活力激发。</p></div>
                        <div class="bt"><span>构成：</span><p>专题系列趋势发布、专题系列展贸活动、专题系列论坛、专题大赛（时尚产业独角兽养成计划）。</p></div>
                        <div class="bt"><span>特色：</span><p>形成不断发声赋能的产业链闭环协作体系互动，与全球资源联动带进来走出去计划。</p></div>
                    </li>
                </ul>
            </div>
        </section>
    </div>
</div>

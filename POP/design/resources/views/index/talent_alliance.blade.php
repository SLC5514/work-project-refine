@extends('layouts.index')

@section('title', $tdk['t'])
@section('keywords', $tdk['k'])
@section('description', $tdk['d'])

@section('styles')
<link href="{{ asset('css/views/talent_alliance.css') }}" rel="stylesheet" />
@endsection

@section('content')
<header-com></header-com>

<div class="content" el-container>
    <ul class="tab-box js-tab-box" row gutter-48>
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
    <ul class="tab-content js-tab-content">
        <li class="on">
            <div class="item" sm-11>
                <img src="{{ asset('images/talent_alliance/ta_yq1.png') }}" alt="" />
                <div>
                    <p>广州轻纺交易园位于新港西路82号，雄踞中大纺织商圈核心地段，总占地面积15万平方米，总建筑面积达30万平方米，是目前中大纺织商圈首个汇聚纺织展贸、服装设计、服装打版、服装电商、时尚买手体验、时尚发布、行业交流平台以及国际纺织服装办学培训等相关业态的国际化纺织服装产业园区。</p>
                </div>
            </div>
            <div class="item" sm-11>
                <img src="{{ asset('images/talent_alliance/ta_yq2.png') }}" alt="" />
                <div>
                    <p>南通家纺城（川姜镇）位于南通市通州区南部，区域面积为49.86平方公里，是南部地区经济发展重镇。经过多年的发展，已经形成全国最大的家纺产业集聚区，集聚家纺企业3000多家、各类经营户10000多家，其中全镇规模以上企业88家，销售超亿元企业24家。家纺产业的市场份额已经占到全国家纺60%（通州、海门）。2018年南通家纺城（川姜镇）荣获商务部认定的国家级外贸转型升级基地，中国纺织工业联合会授予的中国纺织行业创新产业集群，成交额近100亿元，开辟了基于新消费、新零售的全新B2B渠道，入选省电子商务特色产业园区。</p>
                </div>
            </div>
            <div class="item mt1" sm-11>
                <img src="{{ asset('images/talent_alliance/ta_yq3.png') }}" alt="" />
                <div>
                    <p>320创意广场，取名于320国道，是省级科技孵化器项目，以培育创新、创意，推动时尚产业发展为重任，现以入驻40余家时尚企业，并于2019年成功培育出全国十佳设计师。</p>
                </div>
            </div>
            <div class="item" sm-11>
                <img src="{{ asset('images/talent_alliance/ta_yq4.png') }}" alt="" />
                <div>
                    <p>浙江省毛衫产业创新服务综合体，作为浙江省纺织领域的综合体项目，自2019年启用一来，荣获多项好评，整个项目1万5千方，涵盖40多项时尚领域的企业服务，从设计到营销，提供全产业链服务。</p>
                </div>
            </div>
        </li>
        <li>
            <div class="item" sm-11>
                <img src="{{ asset('images/talent_alliance/ta_qy1.png') }}" alt="" />
                <div>
                    <p>广东省服装服饰行业协会成立于 1990 年，为广东服装业自律性、非营利性、全省性的行业中介组织。广东省服装服饰行业协会以推动广东服装产业发展为服务宗旨，为政府、行业、社会提供与服装行业相关的各种服务。</p>
                </div>
            </div>
            <div class="item" sm-11>
                <img src="{{ asset('images/talent_alliance/ta_qy2.png') }}" alt="" />
                <div>
                    <p>是由从事服装设计、研究、教学、品牌管理和织造、针织、印染设计的专业人士及时尚界的专业机构的单位和个人自愿组成。面向市场，面向世界，面向未来，加强横向联合，开展服饰文化艺术交流，规范职业标准，推动设计转化，促进广东服装和时尚产业的持续发展。接受广东省经济贸易委员会和广东省民政厅的业务指导和监督管理。</p>
                </div>
            </div>
            <div class="item mt2" sm-11>
                <img src="{{ asset('images/talent_alliance/ta_qy3.png') }}" alt="" />
                <div>
                    <p>2002年12月成立，至今16年之久，到目前为止协会共有会员企业140多家，会员企业主要以生产和销售牛仔服装、布匹辅料、纺织品、针织品等为主。协会的办会宗旨是在遵守国家的法律、法规和社会道德风尚的前提下，团结纺织服装企业，联络友谊，交流信息，协调市场策略，促进政企沟通，推进技术进步，提高企业产品质量，规范行业管理，维护会员合法权益。提升顺德区纺织服装行业的综合竟争力，以促进顺德区纺织服装行业健康有序发展。</p>
                </div>
            </div>
            <div class="item" sm-11>
                <img src="{{ asset('images/talent_alliance/ta_qy4.png') }}" alt="" />
                <div>
                    <p>组织服装.服饰行业 等各大板块的产业供应链特邀品牌对接交流，举办供应链展会，高峰论坛，供应链贴牌展，原辅材料面料展，打造产业城市IP，商学院培训，人才孵化输出就业，海外游学，以及定向设计开发，商品整合，供应链管理等企业改造升级服务</p>
                </div>
            </div>
            <div class="item" sm-11>
                <img src="{{ asset('images/talent_alliance/ta_qy5.png') }}" alt="" />
                <div>
                    <p>大商品联盟深度致力于时尚企业大商品领域的公益培训，解决方案落地等模块的技术研究；推动时尚企业进入数字化、智能化商品赋能的专业通道，帮助时尚企业打造核心商品力，成为时尚企业背后的大商品运营专家。</p>
                </div>
            </div>
        </li>
        <li>
            <div class="item" sm-11>
                <img src="{{ asset('images/talent_alliance/ta_pt1.png') }}" alt="" />
                <div>
                    <p>蘑菇街是专注于时尚女性消费者的电子商务网站，是时尚和生活方式目的地，通过形式多样的时尚内容等时尚商品，让人们在分享和发现流行趋势的同时，享受购物体验 。旗下包括：蘑菇街、美丽说、uni等产品与服务。</p>
                </div>
            </div>
        </li>
    </ul>
</div>

<footer-com></footer-com>
@endsection

@section('scripts')
<script src="{{ asset('js/views/talent_alliance.js') }}" defer></script>
@endsection

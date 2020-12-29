<template>
    <div class="footer">
        <div class="contact-us" el-container xs-only v-if="!noContactUs">
            <div class="title">
                <div class="logo">
                    <img src="/images/common/logo.png" alt="" />
                </div>
                联系我们
            </div>
            <ul sm-gutter-48 md-gutter-0>
                <li col lg-4 md-4 sm-8>
                    <div>
                        <div class="title">盛泽设界</div>
                        <div class="subtitle icon-position">联系地址：</div>
                        <div>
                            江苏省苏州市吴江区盛泽镇市场东路699号东方纺织城4楼C/D区
                        </div>
                        <div class="subtitle icon-phone">服务电话：</div>
                        <div>15301717652</div>
                        <div class="code">
                            <img src="/images/common/qrcode1.png" alt="" />
                            <div>微信扫一扫,<br />获取人工咨询服务</div>
                        </div>
                    </div>
                </li>
                <li col lg-4 md-4 sm-8>
                    <div>
                        <div class="title">桐乡设界 </div>
                        <div class="subtitle icon-position">联系地址：</div>
                        <div>
                            浙江省桐乡市濮院镇工贸大道369号B座（320创意广场）
                        </div>
                        <div class="subtitle icon-phone">服务电话：</div>
                        <div>13916490949</div>
                        <div class="code">
                            <img src="/images/common/qrcode2.png" alt="" />
                            <div>微信扫一扫,<br />获取人工咨询服务</div>
                        </div>
                    </div>
                </li>
                <li col lg-4 md-4 sm-8>
                    <div>
                        <div class="title">绍兴设界</div>
                        <div class="subtitle icon-position">联系地址：</div>
                        <div>
                            绍兴市柯桥区国际面料采购中心3区4楼
                        </div>
                        <div class="subtitle icon-phone">服务电话：</div>
                        <div>18801737531</div>
                        <div class="code">
                            <img src="/images/common/qrcode3.png" alt="" />
                            <div>微信扫一扫,<br />获取人工咨询服务</div>
                        </div>
                    </div>
                </li>
                <li col lg-4 md-4 sm-8>
                    <div>
                        <div class="title">广州设界</div>
                        <div class="subtitle icon-position">联系地址：</div>
                        <div>
                            广州市珠海区轻纺交易园D区国际时尚发布中心2楼设界
                        </div>
                        <div class="subtitle icon-phone">服务电话：</div>
                        <div>15018490019</div>
                        <div class="code">
                            <img src="/images/common/qrcode4.png" alt="" />
                            <div>微信扫一扫,<br />获取人工咨询服务</div>
                        </div>
                    </div>
                </li>
                <li col lg-4 md-4 sm-8>
                    <div>
                        <div class="title">南通设界</div>
                        <div class="subtitle icon-position">联系地址：</div>
                        <div>
                            南通市通州区志浩家纺城微供大楼4楼
                        </div>
                        <div class="subtitle icon-phone">服务电话：</div>
                        <div>13641757216</div>
                        <div class="code">
                            <img src="/images/common/qrcode5.png" alt="" />
                            <div>微信扫一扫,<br />获取人工咨询服务</div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="info" el-container>
            <span>上海设界商务信息咨询有限公司 © 2004-2020</span>
            <div sm-and-up></div>
            <span>法律顾问：北京中银（上海）律师事务所 沪ICP备2020027691号</span>
            <div sm-and-up></div>
            <a
                target="_blank"
                href="http://wap.scjgj.sh.gov.cn/businessCheck/verifKey.do?showType=extShow&amp;serial=9031000020160526093630000000851495-SAIC_SHOW_310000-20120428141018720124&amp;signData=MEUCIQDZWDSUQE195cBFzEmHGyMfx92RgQ9hs6ZMwm3ePnH6kAIgMh9DQQ9W3S+fDej1PTh5x9PdFq9QKDSvtOGWbRJfWZU="
            >
                <img src="/images/common/safty1.png" class="fl" alt="" />
            </a>
            <a
                target="_blank"
                href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=31010402000973"
            >
                <img src="/images/common/safty2.png" class="fl" alt="" />
                <p class="fl">沪公网安备 31010402000973号</p>
            </a>
        </div>
        <div
            class="back-to-top"
            v-if="isToTop"
            @click="scrollToTop"
            xs-only
        >
            返回顶部
        </div>
    </div>
</template>

<script>
export default {
    name: "Footer",
    data() {
        return {
            isToTop: false
        };
    },
    props: {
        noContactUs: Boolean
    },
    mounted() {
        $(window).on("scroll", () => {
            const c =
                document.documentElement.scrollTop || document.body.scrollTop;
            if (c > $(window).height() / 2) {
                this.isToTop = true;
            } else {
                this.isToTop = false;
            }
        });
    },
    methods: {
        scrollToTop() {
            const c =
                document.documentElement.scrollTop || document.body.scrollTop;
            if (c > 0) {
                window.requestAnimationFrame(this.scrollToTop);
                window.scrollTo(0, c - c / 8);
            }
        }
    }
};
</script>

<style lang="scss" scoped>
.footer {
    position: relative;
    background: #f9f9f9;
    z-index: 20;
    .contact-us {
        & > .title {
            font-size: 0.3rem;
            font-weight: bold;
            padding: 0.4rem 0;
            display: flex;
            align-items: center;
            .logo {
                width: 0.4rem;
                height: 0.4rem;
                border-radius: 50%;
                display: flex;
                justify-content: center;
                align-items: center;
                background: #fff;
                margin-right: 0.16rem;
                img {
                    height: 0.36rem;
                }
            }
        }
        ul {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-top: -0.3rem;
            li {
                margin-top: 0.3rem;
                & > div {
                    height: 100%;
                    padding: 0.16rem;
                    background: #fff;
                    font-size: 0.12rem;
                    line-height: 0.2rem;
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                }
                .title {
                    font-size: 0.18rem;
                    font-weight: bold;
                    margin-bottom: 0.2rem;
                }
                .subtitle {
                    margin-bottom: 0.08rem;
                    & + div {
                        margin-bottom: 0.16rem;
                    }
                    &:nth-child(2) + div {
                        height: 0.6rem;
                    }
                }
                .code {
                    display: flex;
                    align-items: center;
                    img {
                        width: 0.78rem;
                        height: 0.78rem;
                        margin-right: 0.16rem;
                    }
                }
                .icon-position:before {
                    content: '';
                    display: inline-block;
                    width: 9px;
                    height: 12px;
                    margin-right: 8px;
                    background: url(/images/design_world_detail/icon_position_black.png) no-repeat center / contain;
                    vertical-align: middle;
                    margin-top: -0.02rem;
                }
                .icon-phone:before {
                    content: '';
                    display: inline-block;
                    width: 12px;
                    height: 12px;
                    margin-right: 8px;
                    background: url(/images/design_world_detail/icon_phone_black.png) no-repeat center / contain;
                    vertical-align: middle;
                    margin-top: -0.02rem;
                }
            }
        }
    }
    .info {
        height: 1rem;
        font-size: 0.12rem;
        color: #acacac;
        display: flex;
        justify-content: center;
        align-items: center;
        white-space: nowrap;
        & > div {
            width: 100%;
            margin-bottom: 0.2rem;
        }
        a {
            display: flex;
            align-items: center;
            margin-left: 0.08rem;
            margin-right: 0.08rem;
            & + a {
                margin-right: 0;
            }
            &:last-child {
                img {
                    margin-right: 0.08rem;
                }
            }
            img {
                max-width: none;
                height: 0.25rem;
            }
        }
    }
    .back-to-top {
        position: fixed;
        right: 0.3rem;
        bottom: 1rem;
        width: 0.9rem;
        height: 0.34rem;
        line-height: 0.34rem;
        text-align: center;
        background: #fff;
        border: 0.01rem solid #E6E6E6;
        font-size: 0.12rem;
        z-index: 30;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        &:after {
            content: "";
            display: inline-block;
            width: 0.14rem;
            height: 0.08rem;
            margin-left: 0.07rem;
            vertical-align: middle;
            background: url(/images/common/icon_to_top.png) no-repeat
                center / contain;
        }
        &:hover {
            background: #E6E6E6;
        }
    }
}

@media only screen and (max-width: 1199px) {
    .footer .contact-us ul li > div {
        padding: 0.08rem;
        .code img {
            margin-right: 0.08rem;
        }
    }
}

@media only screen and (max-width: 991px) {
    .footer .contact-us ul {
        justify-content: start;
    }
    .footer .contact-us ul li .subtitle:nth-child(2) + div {
        height: 0.4rem;
    }
}

@media only screen and (max-width: 767px) {
    .footer .info {
        font-size: 0.24rem;
        height: 3rem;
        padding: 0.6rem 0;
        display: block;
        text-align: center;
        & > div:last-of-type {
            margin-bottom: 0.5rem;
        }
        a {
            display: inline-block;
            line-height: 1;
            img {
                vertical-align: middle;
            }
        }
    }
}
</style>

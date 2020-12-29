<template>
    <div class="header">
        <div :class="'affix' + (showLine && ' border-b' || '')">
            <div class="ctn" el-container>
                <a class="logo" href="/">
                    <img src="/images/common/logo.png" alt="" />
                </a>
                <ul class="unfold-nav" row gutter-40 lg-gutter-48 v-if="show">
                    <li col>
                        <a
                            :class="{
                                on: ispage('', 'talent'),
                                'underline-btn noafter': true
                            }"
                            href="/"
                            >首页</a
                        >
                    </li>
                    <li col>
                        <a
                            :class="{
                                on: ispage('about'),
                                'underline-btn noafter': true
                            }"
                            href="/about/"
                            >关于设界</a
                        >
                    </li>
                    <li col>
                        <a
                            :class="{
                                on: ispage('design'),
                                'underline-btn noafter': true
                            }"
                            href="/design/"
                            >设界分布</a
                        >
                    </li>
                    <li col xs-only>
                        <a
                            :class="{
                                on: ispage('activity', 'info'),
                                'underline-btn noafter': true,
                                dynamic: true
                            }"
                            href="javascript:;"
                            >设界动态</a
                        >
                    </li>
                    <li col sm-and-up>
                        <a
                            :class="{
                                on: ispage('activity'),
                                'underline-btn noafter': true,
                                dynamic: true
                            }"
                            href="/activity/"
                            >品牌活动</a
                        >
                    </li>
                    <li col sm-and-up>
                        <a
                            :class="{
                                on: ispage('info'),
                                'underline-btn noafter': true,
                                dynamic: true
                            }"
                            href="/info/"
                            >官方资讯</a
                        >
                    </li>
                    <li col>
                        <a
                            :class="{
                                on: ispage('contact'),
                                'underline-btn noafter': true
                            }"
                            href="/contact/"
                            >联系我们</a
                        >
                    </li>
                </ul>
                <a
                    :class="{ 'hamburger-nav ': true, on: hamburgerType }"
                    href="javascript:;"
                    sm-and-up
                    @click="hamburgerToggle"
                    v-if="show"
                >
                </a>
            </div>
            <div class="nav-dropdown" xs-only v-if="show">
                <div el-container>
                    <ul row gutter-40 lg-gutter-48>
                        <li col>
                            <a :class="{
                                on: ispage('activity'),
                                'underline-btn noafter': true
                            }" href="/activity/">品牌活动</a>
                        </li>
                        <li col>
                            <a :class="{
                                on: ispage('info'),
                                'underline-btn noafter': true
                            }" href="/info/">官方资讯</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Header",
    data() {
        return {
            hamburgerType: false
        };
    },
    props: {
        show: {
            type: Boolean,
            default: true
        },
        showLine: {
            type: Boolean,
            default: true
        }
    },
    mounted() {
        window.onload = () => {
            this.initNavDropdownW();
        };
        window.addEventListener(
            "onorientationchange" in window ? "orientationchange" : "resize",
            this.initNavDropdownW,
            false
        );

        // 设界动态 二级导航
        if (!(document.documentElement.offsetWidth < 768)) {
            $(".dynamic").on("mousemove", function() {
                $(".nav-dropdown").slideDown(200);
            });
            $(".unfold-nav a").on("mousemove", function() {
                if ($(this).hasClass("dynamic")) {
                    return;
                }
                $(".nav-dropdown").slideUp(200);
            });
            $(".header").on("mouseleave", function() {
                $(".nav-dropdown").slideUp(200);
            });
        }
    },
    methods: {
        ispage() {
            const pathnames = location.pathname.replace(/(^\/*|\/*$)/g, '').split('/');
            let status = false;
            for (let i = 0; i < arguments.length; i++) {
                if (!status && pathnames.indexOf(arguments[i]) != -1) {
                    status = true;
                }
            }
            return status;
        },
        // 初始化 设界动态 二级导航 宽度
        initNavDropdownW() {
            $(".nav-dropdown li").css("width", $(".unfold-nav").width() / 2 + "px");
        },
        // H5 汉堡导航点击
        hamburgerToggle() {
            this.hamburgerType = !this.hamburgerType;
            $(".unfold-nav").slideToggle(200);
            $("body").toggleClass("ofhide");
        }
    }
};
</script>

<style lang="scss" scoped>
.header {
    height: 0.8rem;
    & > .affix {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        background: #fff;
        transform: translateZ(0);
        perspective: 1000;
        z-index: 21;
        &.border-b {
            border-bottom: 0.01rem solid #e3e3e3;
        }
        & > .ctn {
            height: 0.8rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo {
            display: inline-block;
            margin-top: 0.05rem\9\0;
            img {
                width: 0.33rem;
                height: 0.7rem;
                object-fit: contain;
            }
        }
        .unfold-nav {
            a {
                color: #646464;
                &:before {
                    bottom: -0.12rem;
                    height: 0.04rem;
                }
                &:hover, &.on {
                    color: #2b2b2b;
                }
            }
        }
        .hamburger-nav {
            width: 0.4rem;
            height: 0.4rem;
            background: url(/images/common/icon_hamburger_nav.png)
                no-repeat center / 100%;
            &.on {
                background: url(/images/common/icon_nav_close.png)
                    no-repeat center / 100%;
            }
        }
    }
    .nav-dropdown {
        display: none;
        position: absolute;
        top: 0.81rem;
        left: 0;
        right: 0;
        z-index: 20;
        height: 0.88rem;
        background: #fff;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.2);
        & > div {
            height: 100%;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            ul li a {
                font-size: 0.16rem;
                font-weight: bold;
                color: #646464;
                &:before {
                    bottom: -0.12rem;
                    height: 0.04rem;
                }
                &:hover, &.on {
                    color: #2b2b2b;
                }
            }
        }
    }
}

@media screen and (-ms-high-contrast: active), (-ms-high-contrast: none) {
    .header > .affix .logo {
        margin-top: 0;
    }
}

@media only screen and (max-width: 767px) {
    .header {
        & > .affix > .ctn {
            .unfold-nav {
                display: none;
                position: fixed;
                left: 0;
                right: 0;
                bottom: 0;
                top: 0.8rem;
                height: calc(100vh - 0.8rem);
                margin: 0;
                z-index: 20;
                padding-top: 0.2rem;
                background: #fff;
                border-top: 0.01rem solid #e3e3e3;
                li {
                    width: 100%;
                    padding: 0.2rem 0.3rem;
                    a {
                        font-size: 0.32rem;
                        font-weight: normal;
                        color: #333;
                        &:after {
                            display: none;
                        }
                        &.on {
                            color: #333;
                        }
                    }
                }
            }
            .hamburger-nav {
                width: 0.36rem;
                height: 0.36rem;
            }
        }
    }
}
</style>

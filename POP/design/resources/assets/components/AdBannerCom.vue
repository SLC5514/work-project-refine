<template>
    <div :class="{'ad-banner':true, 'active-ad-banner': isActive}" v-if="ads.length">
        <div class="ad-banner-container swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide" v-for="v in ads" :key="v.id">
                    <a :href="v.link || 'javascript:;'" :target="v.link && '_blank' || ''" :style="!v.link && 'cursor:default;'">
                        <img :src="v.img_src" alt="" />
                        <div class="ctn" el-container>
                            <img class="bg-line" src="/images/common/icon_text_bg_white.png" alt="" />
                            <div class="title ellipsis" :title="v.title" v-if="v.title">
                                {{ v.title }}
                            </div>
                            <div class="subtitle ellipsis" :title="v.subtitle" v-if="v.subtitle">
                                {{ v.subtitle }}
                            </div>
                            <div class="info" v-if="v.description">
                                {{ v.description }}
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="swiper-mask" el-container>
                <div class="ad-banner-pagination swiper-pagination"></div>
                <div class="ad-banner-button-next swiper-button-next" xs-only></div>
            </div>
        </div>
    </div>
</template>

<script>
// import AOS from "aos";
// import "aos/dist/aos.css";

export default {
    name: "AdBanner",
    data() {
        return {
            mySwiper: null
        };
    },
    props: {
        ads: Array,
        isActive: Boolean
    },
    mounted() {
        // var myAos = AOS.init({
        //     easing: "ease-in-sine",
        //     duration: 600,
        //     delay: 200
        // });

        if (!this.ads.length) { return; }
        const swiperLen = $(".ad-banner-container .swiper-slide").length;
        if (swiperLen <= 1) {
            $(".ad-banner-container .ad-banner-pagination").hide();
            $(".ad-banner-container .ad-banner-button-next").hide();
        }
        this.mySwiper && this.mySwiper.destroy();
        this.mySwiper = new Swiper(".ad-banner-container", {
            observer: true,
            observeParents: true,
            slidesPerView: "auto",
            speed: 1000,
            autoplay: swiperLen > 1 ? {
                delay: 3000,
                stopOnLastSlide: false,
                disableOnInteraction: false
            } : false,
            loop: swiperLen > 1 ? true : false,
            pagination: {
                el: ".ad-banner-pagination",
                // clickable: true
            },
            navigation: {
                nextEl: ".ad-banner-button-next"
            }
        });
        $(this.mySwiper.$el[0]).hover(
            () => {
                this.mySwiper.autoplay.stop();
            },
            () => {
                this.mySwiper.autoplay.start();
            }
        );
    },
    destroyed() {
        this.mySwiper && this.mySwiper.destroy();
    }
};
</script>

<style lang="scss" scoped>
.ad-banner {
    height: 6.35rem;
    .swiper-container,
    .swiper-wrapper {
        height: 100%;
    }
    .swiper-slide {
        width: 100% !important;
        height: 100%;
        overflow: hidden;
        background: #eee;
        & > a > img {
            max-width: none;
            height: 100%;
            margin-left: 50%;
            transform: translateX(-50%);
            object-fit: cover;
        }
        .ctn {
            color: #fff;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 1.4rem 0;
            .bg-line {
                position: absolute;
                left: 1.1rem;
                top: 50%;
                transform: translateY(-50%);
                // height: 4.21rem;
                height: 100%;
            }
            // &:before {
            //     content: "";
            //     position: absolute;
            //     left: 1.1rem;
            //     top: 50%;
            //     transform: translateY(-50%);
            //     width: 4.09rem;
            //     height: 4.21rem;
            //     background: url(/images/common/icon_text_bg_white.png)
            //         no-repeat center / 100%;
            // }
            & > div {
                width: 84%;
                max-width: 9.18rem;
                transform: translateY(100%);
                opacity: 0;
                transition: transform 1s ease 1s, opacity 1s ease 1s;
            }
            .title {
                font-size: 0.6rem;
                font-weight: bold;
            }
            .subtitle {
                font-size: 0.36rem;
            }
            .info {
                font-size: 0.21rem;
                margin-top: 0.32rem;
            }
            // &>div:last-child {
            //     margin-bottom: 0.1rem;
            // }
        }
        &.swiper-slide-active .ctn > div {
            transform: translateY(0);
            opacity: 1;
        }
    }
    .swiper-mask {
        position: relative;
        z-index: 1;
    }
    .ad-banner-pagination {
        width: 100%;
        line-height: 0.04rem;
        bottom: 0.24rem;
    }
    .swiper-button-next {
        width: 0.56rem;
        height: 0.56rem;
        right: 0.5rem;
        margin-top: calc(-1 * 0.56rem / 2);
        top: calc(-1 * 6.35rem / 2);
        outline: none;
        border-radius: 50%;
        box-shadow: 0 0.04rem 0.08rem rgba(0,0,0,0.15);
        background: url(/images/common/icon_ad_right.png) no-repeat center /
            100%;
        opacity: 0.9;
        &:after {
            content: "";
        }
        &:hover {
            opacity: 1;
        }
    }
    &.active-ad-banner {
        height: 3.5rem;
        // .swiper-slide .ctn:before {
        //     left: 0;
        //     width: 2.88rem;
        //     height: 2.85rem;
        // }
        .swiper-button-next {
            top: calc(-1 * 3.5rem / 2);
        }
        // .swiper-slide .ctn .bg-line {
        //     height: 2.82rem;
        // }
        // .swiper-slide .ctn {
        //     padding: 0.2rem 0;
        // }
    }
}

@media only screen and (max-width: 767px) {
    .ad-banner {
        height: 3.2rem;
        .swiper-slide {
            .ctn {
                width: 100%;
                padding: 0.4rem 0 0.4rem 0.36rem;
                box-sizing: border-box;
                // &:before {
                //     left: 0.8rem;
                //     width: 2.17rem;
                //     height: 2.24rem;
                // }
                // .bg-line {
                //     height: 2.24rem;
                // }
                .title {
                    font-size: 0.4rem;
                }
                .subtitle {
                    font-size: 0.24rem;
                }
                .info {
                    max-height: 0.7rem;
                    overflow: hidden;
                    text-overflow: ellipsis;
                    display: -webkit-box;
                    -webkit-line-clamp: 2;
                    -webkit-box-orient: vertical;
                }
            }
        }
        .swiper-button-next {
            width: 0.32rem;
            height: 0.32rem;
            right: 0.36rem;
            top: calc(-1 * 3.2rem / 2);
        }
        &.active-ad-banner {
            height: 2.45rem;
            .swiper-button-next {
                top: calc(-1 * 2.45rem / 2);
            }
            // .swiper-slide .ctn {
            //     padding: 0.2rem 0 0.2rem 0.36rem;
            // }
            // .swiper-slide .ctn .bg-line {
            //     height: 1.97rem;
            // }
        }
    }
}
</style>

<style lang="scss">
.ad-banner .swiper-container {
    .swiper-pagination-bullet {
        width: 0.24rem;
        height: 0.02rem;
        margin: 0 0.04rem;
        border-radius: 0;
        background: #fff;
        transition: all 0.3s ease;
    }
    .swiper-pagination-bullet-active {
        height: 0.04rem;
        background: #fff;
    }
}
</style>

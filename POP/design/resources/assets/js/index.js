window.promise = require("es6-promise");

window.Swiper = require("swiper/swiper-bundle.min.js");

window.$ = require("jquery");

window.Vue = require("vue");

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});

const app = new Vue({
    el: "#app",
    components: {
        HeaderCom: require('@assets/components/HeaderCom.vue').default,
        FooterCom: require('@assets/components/FooterCom.vue').default,
        AdBannerCom: require('@assets/components/AdBannerCom.vue').default,
        // HeaderCom: (resolve) =>
        //     require(["./components/HeaderCom.vue"], resolve).default,
    },
});

promise.polyfill();

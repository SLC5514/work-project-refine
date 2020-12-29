$(function() {
    var def = {
        mySwiper: null,
        inquiryClose: false
    };

    $(".js-move-open").on("click", function() {
        $(this)
            .parent()
            .hide()
            .siblings(".js-max-info")
            .show();
    });
    $(".js-move-close").on("click", function() {
        $(this)
            .parent()
            .hide()
            .siblings(".js-min-info")
            .show();
    });


    /* ================== 设界案例效果 ================== */
    var intervalObj = {};
    $(".js-nav-box").each(function(i, v) {
        var mPager = $(v).find(".js-m-pager");
        var count = mPager.children().length;
        mPager.children().eq(0).addClass("on");
        intervalObj[i] = setInterval(function() {
            initInterval(i, count);
        }, 3000);
        $(v).hover(
            function() {
                clearInterval(intervalObj[i]);
            },
            function() {
                intervalObj[i] = setInterval(function() {
                    initInterval(i, count);
                }, 3000);
            }
        );
    });
    function initInterval(i, l) {
        var navTxtBox = $($(".js-nav-box")[i]);
        var navTxtPager = navTxtBox.find(".js-pager-box");
        var idx = navTxtPager.find(".on").parent().index();
        idx++;
        if (idx > l - 1) {
            idx = 0;
        }
        navTxtPager.children().eq(idx).children().addClass("on").parent().siblings().children().removeClass("on");
        navTxtBox.find(".js-img-box").children().eq(idx).addClass("on").siblings().removeClass("on");
        navTxtBox.find(".js-msg-box").children().eq(idx).addClass("on").siblings().removeClass("on");
        navTxtBox.find(".js-m-pager").children().eq(idx).addClass("on").siblings().removeClass("on");
    }
    $(".js-pager-box").on("click", "a", function() {
        var idx = $(this).parent().index();
        var navTxtBox = $(this).parents(".js-nav-box");
        $(this).addClass("on").parent().siblings().children().removeClass("on");
        navTxtBox.find(".js-img-box").children().eq(idx).addClass("on").siblings().removeClass("on");
        navTxtBox.find(".js-msg-box").children().eq(idx).addClass("on").siblings().removeClass("on");
        navTxtBox.find(".js-m-pager").children().eq(idx).addClass("on").siblings().removeClass("on");
    });

    /* ================== 荣誉 ================== */
    def.mySwiper && def.mySwiper.destroy();
    def.mySwiper = new Swiper(".ry-container", {
        observer: true,
        observeParents: true,
        slidesPerView: "auto",
        autoplay: {
            delay: 2000,
            stopOnLastSlide: false,
            disableOnInteraction: false
        },
        loop: true,
        pagination: {
            el: ".ry-pagination",
            type: "fraction",
            clickable: true
        },
        navigation: {
            prevEl: ".ry-button-prev",
            nextEl: ".ry-button-next"
        }
    });
    $(def.mySwiper.$el[0]).hover(
        () => {
            def.mySwiper.autoplay.stop();
        },
        () => {
            def.mySwiper.autoplay.start();
        }
    );

    /* ================== 咨询条 ================== */
    $('.js-inquiry-close').on('click', function() {
        def.inquiryClose = true;
        $('.js-inquiry').hide();
    });

    var catchTop = document.documentElement.scrollTop || document.body.scrollTop;
    $(window).on("scroll", function() {
        var c = document.documentElement.scrollTop || document.body.scrollTop;
        if (c > catchTop && !def.inquiryClose) {
            $('.js-inquiry').show();
        } else {
            $('.js-inquiry').hide();
        }
        catchTop = c;
    });
});

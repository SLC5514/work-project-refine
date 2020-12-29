$(function() {
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

    var mySwiper = new Swiper(".infrastructure-container", {
        observer: true,
        observeParents: true,
        loop: true,
        autoplay: {
            delay: 2000,
            stopOnLastSlide: false,
            disableOnInteraction: false
        },
        slidesPerView: "auto",
        spaceBetween: generalDef.fn.remToPx(0.2),
        navigation: {
            nextEl: ".infrastructure-button-next"
        },
        breakpoints: {
            320: {
                spaceBetween: generalDef.fn.remToPx(0.3)
            },
            768: {
                spaceBetween: generalDef.fn.remToPx(0.32)
            },
            992: {
                spaceBetween: generalDef.fn.remToPx(0.15)
            },
            1200: {
                spaceBetween: generalDef.fn.remToPx(0.24)
            }
        }
    });
    $(mySwiper.$el[0]).hover(
        () => {
            mySwiper.autoplay.stop();
        },
        () => {
            mySwiper.autoplay.start();
        }
    );

    var designSwiper = new Swiper(".design-container", {
        observer: true,
        observeParents: true,
        loop: generalDef.isMD ? true : false,
        autoplay: generalDef.isMD ? {
            delay: 2000,
            stopOnLastSlide: false,
            disableOnInteraction: false
        } : false,
        slidesPerView: "auto",
        // slidesPerColumn: 2,
        spaceBetween: generalDef.fn.remToPx(0.24),
        pagination: {
            el: ".design-pagination",
            type: "custom",
            clickable: true,
            renderCustom: function (swiper, current, total) {
                return current + ' / ' + total;
            }
        },
        navigation: {
            prevEl: ".design-button-prev",
            nextEl: ".design-button-next"
        },
        breakpoints: {
            320: {
                spaceBetween: generalDef.fn.remToPx(0.3)
            },
            768: {
                spaceBetween: generalDef.fn.remToPx(0.64)
            },
            992: {
                spaceBetween: generalDef.fn.remToPx(0.72)
            },
            1200: {
                spaceBetween: generalDef.fn.remToPx(0.24)
            }
        }
    });
    if (generalDef.isMD) {
        $(designSwiper.$el[0]).hover(
            () => {
                designSwiper.autoplay.stop();
            },
            () => {
                designSwiper.autoplay.start();
            }
        );
    }
});

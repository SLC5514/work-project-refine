$(function() {
    if (!generalDef.isH5 && !generalDef.isSM) {
        var winW = $(window).width();
        var asideEl = $('.js-aside');
        var supportingEl = $('.js-supporting-services');
        var ht = $('.header').height();
        var offsetTop = asideEl.offset().top;
        var offsetLeft = asideEl.offset().left;
        var asideW = asideEl.outerWidth();
        var asideH = asideEl.outerHeight();
        if (!supportingEl.length) {
            supportingEl = $('.footer');
        }
        var supportingTop = supportingEl.offset().top;

        autoAsideTop();
        $(window).on('scroll', function() {
            // generalDef.fn.throttle(autoAsideTop,this,[], 20);
            autoAsideTop();
        })

        function autoAsideTop() {
            var scrollT = $(window).scrollTop();
            if (offsetTop <= ht + scrollT) {
                if (scrollT < supportingTop - asideH - ht) {
                    asideEl.css({
                        position: 'fixed',
                        width: asideW + 'px',
                        top: ht + 'px',
                        right: winW - offsetLeft - asideW + 'px'
                    });
                } else {
                    asideEl.css({
                        position: '',
                        width: '',
                        top: supportingTop - asideH - offsetTop,
                        right: ''
                    });
                }
            } else {
                asideEl.css({
                    position: '',
                    width: '',
                    top: '',
                    right: ''
                });
            }
        }
    }

    var gallerySwiper = new Swiper(".swiper-gallery", {
        observer: true,
        observeParents: true,
        slidesPerView: "auto",
        spaceBetween: generalDef.fn.remToPx(0.20),
        loop: true,
        loopedSlides: 5,
        autoplay: {
            delay: 2000,
            stopOnLastSlide: false,
            disableOnInteraction: false
        },
        pagination: {
            el: '.gallery-pagination',
            type: 'fraction',
        },
        navigation: {
            nextEl: ".gallery-button-next"
        },
        breakpoints: {
            768: {
                spaceBetween: generalDef.fn.remToPx(0.20)
            },
            992: {
                spaceBetween: generalDef.fn.remToPx(0.15)
            },
            1200: {
                spaceBetween: generalDef.fn.remToPx(0.24)
            }
        },
        thumbs: {
            swiper: {
                el: ".swiper-thumbs",
                observer: true,
                observeParents: true,
                slidesPerView: 5,
                spaceBetween: generalDef.fn.remToPx(0.20),
                loop: true,
                loopedSlides: 5,
                watchSlidesVisibility: true, /* 避免出现bug */
                breakpoints: {
                    768: {
                        spaceBetween: generalDef.fn.remToPx(0.20)
                    },
                    992: {
                        spaceBetween: generalDef.fn.remToPx(0.15)
                    },
                    1200: {
                        spaceBetween: generalDef.fn.remToPx(0.24)
                    }
                },
            }
        }
    });
    $(gallerySwiper.$el[0]).hover(
        () => {
            gallerySwiper.autoplay.stop();
        },
        () => {
            gallerySwiper.autoplay.start();
        }
    );


    var mySwiper = new Swiper(".swiper-resources", {
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
            nextEl: ".services-button-next"
        },
        breakpoints: {
            320: {
                spaceBetween: generalDef.fn.remToPx(0.3)
            },
            768: {
                spaceBetween: generalDef.fn.remToPx(0.3)
            },
            992: {
                spaceBetween: generalDef.fn.remToPx(0.16)
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

    videoPlayer("review-player", $("#review-player").attr("data-id"));

    function videoPlayer(player_id, vid) {
        if (!vid) { return null; }
        var params = {
            styleid: "0",
            client_id: "6304acd0252780d2",
            vid: vid,
            newPlayer: true,
            autoplay: false,
            show_related: false
        };
        return new YKU.Player(player_id, params);
    }
});

$(function() {
    if ($('.js-qrcode-box').length) {
        var ht = $('.header').height();
        var top = $('.js-qrcode-box').offset().top;
        $(window).on("scroll", function () {
            // generalDef.fn.throttle(initQT, this, [], 20);
            initQT();
        });
        function initQT() {
            const c = document.documentElement.scrollTop || document.body.scrollTop;
            if (top <= ht + c) {
                $('.js-qrcode-box').css({
                    position: 'fixed',
                    top: ht + 'px'
                });
            } else {
                $('.js-qrcode-box').css({
                    position: '',
                    top: ''
                });
            }
        }
    }
})

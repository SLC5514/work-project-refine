$(function() {
    $('.js-tab-box').on('click', 'a', function() {
        var idx = $(this).parent().index();
        $(this).addClass('on').parent().siblings().children().removeClass('on');
        $('.js-tab-content').children().eq(idx).addClass('on').siblings().removeClass('on');
    })
})

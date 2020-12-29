$(function() {
    var pname = location.pathname.split('/')[2];
    var tArr = ['recent', 'review'];
    var def = {
        t: tArr.indexOf(pname) != -1 ? pname : 'recent',
        list: {
            page: 0,
            pageSize: 15,
            isLoad: false,
            isEnd: false,
        }
    }

    // 初始化tab
    $('.js-tab-box').children().find('[data-t="' + def.t + '"]').addClass('on').parent().siblings().children().removeClass('on');

    // 获取列表数据
    getList();
    function getList() {
        if (def.list.isLoad || def.list.isEnd) {
            return;
        }
        def.list.page++;
        def.list.isLoad = true;
        $.ajax({
            url: '/activity/' + def.t,
            dataType: 'json',
            data: {
                page: def.list.page,
                pageSize: def.list.pageSize
            },
            success: function(res) {
                if (res.code === 0) {
                    var data = res.data || [];
                    var _html = '';
                    for (var i = 0; i < data.length; i++) {
                        _html += `<li col xs-11 sm-11 md-8>
                            <a target="_blank" href="${data[i].detail_link}">
                                ${data[i].activity_type_text && `<i>${data[i].activity_type_text}</i>`}
                                <img class="blur" src="${data[i].img_src}" alt="${data[i].title}">
                                <img src="${data[i].img_src}" alt="${data[i].title}">
                                <span class="msg">
                                    <span class="title ellipsis">${data[i].title}</span>
                                    <span class="info ellipsis">${generalDef.fn.formatDate(data[i].begin_at.split(' ')[0], 'yyyy.MM.dd')} · ${data[i].venue}</span>
                                    <span class="underline-btn">更多详情</span>
                                </span>
                            </a>
                        </li>`;
                    }
                    if (data.length < def.list.pageSize) {
                        def.list.isEnd = true;
                    } else if (data.length) {
                        _html += '<li class="loading">加载中...</li>';
                    } else {
                        _html += '<li class="center" style="width:100%;">无数据</li>';
                    }
                    $('.js-activity-list .loading').remove();
                    $('.js-activity-list').append(_html);
                }
                def.list.isLoad = false;
            },
            error: function() {
                def.list.page--;
                def.list.isLoad = false;
            }
        })
    }

    $(window).on('scroll', function() {
        var offset = $('.js-activity-list').children().last().offset();
        if ($(window).scrollTop() > (offset ? offset.top : 0) - $(window).height()) {
            getList();
        }
    })
})

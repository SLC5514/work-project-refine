$(function() {
    var def = {
        list: {
            page: 0,
            pageSize: 15,
            isLoad: false,
            isEnd: false,
        }
    }

    // 获取列表数据
    getList();
    function getList() {
        if (def.list.isLoad || def.list.isEnd) {
            return;
        }
        def.list.page++;
        def.list.isLoad = true;
        $.ajax({
            url: '/info/',
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
                        _html += `<li>
                            <a href="${data[i].detail_link}" target="_blank">
                                <img class="blur" src="${data[i].img_src}" alt="${data[i].title}">
                                <img src="${data[i].img_src}" alt="${data[i].title}">
                            </a>
                            <div>
                                <a class="title ellipsis" href="${data[i].detail_link}" target="_blank">${data[i].title}</a>
                                <p>${data[i].description}</p>
                                <div class="time">${generalDef.fn.formatDate(data[i].up_line_at.split(' ')[0])}</div>
                            </div>
                        </li>`;
                    }
                    if (data.length < def.list.pageSize) {
                        def.list.isEnd = true;
                    } else if (data.length) {
                        _html += '<li class="loading">加载中...</li>';
                    }
                    $('.js-news-list .loading').remove();
                    $('.js-news-list').append(_html);
                    $(".js-news-list p").each(function(i, v) {
                        $(v).text(generalDef.fn.cutByWidth($(v).text(), $(v).width() * 3, parseFloat($(v).css('font-size'))));
                    });
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
        var offset = $('.js-news-list').children().last().offset();
        if ($(window).scrollTop() > (offset ? offset.top : 0) - $(window).height()) {
            getList();
        }
    })
});

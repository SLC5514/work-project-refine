window.generalDef = {
    isH5: document.documentElement.offsetWidth < 768,
    isSM: document.documentElement.offsetWidth < 992,
    isMD: document.documentElement.offsetWidth < 1200,
    fn: {
        formatDate: function(timestamp, fmt) {
            var _date = new Date(timestamp);
            var o = {
                "M+": _date.getMonth() + 1,                 //月份
                "d+": _date.getDate(),                    //日
                "h+": _date.getHours(),                   //小时
                "m+": _date.getMinutes(),                 //分
                "s+": _date.getSeconds(),                 //秒
                "q+": Math.floor((_date.getMonth() + 3) / 3), //季度
                "S": _date.getMilliseconds()             //毫秒
            };
            if (!fmt) { fmt = 'yyyy-MM-dd'; }
            if (/(y+)/.test(fmt)) {
                fmt = fmt.replace(RegExp.$1, (_date.getFullYear() + "").substr(4 - RegExp.$1.length));
            }
            for (var k in o) {
                if (new RegExp("(" + k + ")").test(fmt)) {
                    fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
                }
            }
            return fmt;
        },
        remToPx: function(num) {
            return num * parseFloat(document.documentElement.style.fontSize);
        },
        stopBubble: function(ev) {
            // 阻止事件冒泡
            var e = ev || window.event;
            if (e && e.stopPropagation) {
                e.stopPropagation();
            } else {
                window.event.cancelBubble = true;
            }
            return false;
        },
        cutStr: function(str, len) {
            //截取字符串
            if (typeof str === "string" && len > 0) {
                if (str.length > len) {
                    str = str.substr(0, len) + "...";
                }
            }
            return str;
        },
        cutByWidth: function(str, wid, fontSize) {
            //通过宽度截取字符串
            var a = this,
                nstr = "";
            if (typeof str === "string" && wid > 0) {
                var nfs = fontSize !== undefined ? fontSize : 14,
                    nstr = str,
                    limit_val = wid,
                    is_length = false;
                nstr = recursionFunc(nstr);
                function recursionFunc(keys) {
                    var nw = a.textSize(
                        {
                            fontSize: nfs
                        },
                        keys
                    );
                    if (nw > limit_val - 100) {
                        is_length = true;
                        var nkey = keys.substr(0, keys.length - 1);
                        return recursionFunc(nkey);
                    } else {
                        if (is_length === true) {
                            return keys + "...";
                        } else {
                            return keys;
                        }
                    }
                }
            }
            return nstr;
        },
        textSize: function(cssList, text) {
            // 通过元素获取文字宽高
            var a = this;
            var span = document.createElement("span");
            var result = {};
            result.width = span.offsetWidth;
            result.height = span.offsetWidth;
            span.style.visibility = "hidden";
            span.style.cssText =
                "font-size:14px;line-height:1em;display:inline;padding:0;margin:0;border:none;letter-spacing:0px;white-space:nowrap;";
            span.style.fontSize =
                cssList["fontSize"] !== undefined
                    ? cssList["fontSize"] + "px"
                    : "14px";
            span.style.lineHeight =
                cssList["lineheight"] !== undefined
                    ? cssList["lineheight"]
                    : "1em";
            document.body.appendChild(span);
            if (typeof span.textContent != "undefined") {
                span.textContent = text;
            } else {
                span.innerText = text;
            }
            result.width = span.offsetWidth - result.width;
            result.height = span.offsetHeight - result.height;
            span.parentNode.removeChild(span);
            return result.width;
        },
        getCharacterLen: function(str) {
            //检测字符长度
            if (typeof str != "string") {
                throw Error("the type of parameter is not string!");
            }
            var re = /[\u4E00-\u9FA5\uF900-\uFA2D]/g,
                word_arr = str.match(re);
            var len1 = word_arr != null ? word_arr.length : 0;
            return str.length + len1;
        },
        isCharacterOver: function(str, max_len) {
            //检测字符长度
            if (typeof str != "string") {
                throw Error("the type of parameter is not string!");
            }
            var re = /[\u4E00-\u9FA5\uF900-\uFA2D]/g,
                word_arr = str.match(re);
            var len1 = word_arr != null ? word_arr.length : 0,
                len2 = str.length - len1;
            var ml = max_len || 20;
            if (len1 * 2 + len2 > ml) {
                return false;
            }
            return true;
        },
        getLocationParameter: function(origin_str) {
            // 获取浏览器参数
            var url = origin_str ? origin_str : location.search; //获取url中"?"符后的字串
            var theRequest = {};
            if (url.indexOf("?") != -1) {
                var str = url.substr(1);
                strs = str.split("&");
                for (var i = 0; i < strs.length; i++) {
                    theRequest[strs[i].split("=")[0]] = unescape(
                        strs[i].split("=")[1]
                    );
                }
            }
            return theRequest;
        },
        getBrowser: function() {
            var userAgent = navigator.userAgent; // 取得浏览器的userAgent字符串
            var isOpera = userAgent.indexOf("Opera") > -1; // 判断是否Opera浏览器
            var isIE = userAgent.indexOf("compatible") > -1
                && userAgent.indexOf("MSIE") > -1 && !isOpera; // 判断是否IE浏览器
            var isEdge = userAgent.indexOf("Edge") > -1; // 判断是否IE的Edge浏览器
            var isFF = userAgent.indexOf("Firefox") > -1; // 判断是否Firefox浏览器
            var isSafari = userAgent.indexOf("Safari") > -1
                && userAgent.indexOf("Chrome") == -1; // 判断是否Safari浏览器
            var isChrome = userAgent.indexOf("Chrome") > -1
                && userAgent.indexOf("Safari") > -1; // 判断Chrome浏览器
            if (isIE) {
                var reIE = new RegExp("MSIE (\\d+\\.\\d+);");
                reIE.test(userAgent);
                var fIEVersion = parseFloat(RegExp["$1"]);
                if (fIEVersion == 7) {
                    return "IE7";
                } else if (fIEVersion == 8) {
                    return "IE8";
                } else if (fIEVersion == 9) {
                    return "IE9";
                } else if (fIEVersion == 10) {
                    return "IE10";
                } else if (fIEVersion == 11) {
                    return "IE11";
                } else {
                    return "IE";
                } // IE版本过低
            }
            if (isOpera) {
                return "Opera";
            }
            if (isEdge) {
                return "Edge";
            }
            if (isFF) {
                return "FF";
            }
            if (isSafari) {
                return "Safari";
            }
            if (isChrome) {
                return "Chrome";
            }
            return '';
        },
        /*----------------浏览器存储-----------------*/
        getSession: function(session_name) {
            //获取本地存储
            var a = this;
            if (window.sessionStorage) {
                // 支持sessionStorage
                var val = sessionStorage.getItem(session_name);
                if (val === "undefined") {
                    return "undefined";
                } else if (typeof val === "number") {
                    return val;
                } else if (val) {
                    return JSON.parse(val) ? JSON.parse(val) : "";
                }
            } else {
                // 用cookie
                return JSON.parse(a.getCookie(session_name))
                    ? JSON.parse(a.getCookie(session_name))
                    : "";
            }
        },
        setSession: function(session_name, data) {
            // 存储本地
            var a = this;
            if (window.sessionStorage) {
                sessionStorage.setItem(session_name, JSON.stringify(data));
            } else {
                a.setCookie(session_name, JSON.stringify(data), 10000);
            }
        },
        delSession: function(session_name) {
            // 删除本地存储
            var a = this;
            if (window.sessionStorage) {
                if (sessionStorage.getItem(session_name)) {
                    sessionStorage.removeItem(session_name);
                }
            } else {
                if (a.getCookie(session_name)) {
                    a.setCookie(session_name, "", -1);
                }
            }
        },
        getLocalSto: function(sto_name) {
            //获取本地存储
            var a = this;
            if (window.localStorage) {
                // 支持localStorage
                var val = localStorage.getItem(sto_name);
                if (val === "undefined") {
                    return "undefined";
                } else if (typeof val === "number") {
                    return val;
                } else if (val) {
                    return JSON.parse(val) ? JSON.parse(val) : "";
                }
            } else {
                // 用cookie
                return JSON.parse(a.getCookie(sto_name))
                    ? JSON.parse(a.getCookie(sto_name))
                    : "";
            }
        },
        setLocalSto: function(sto_name, data) {
            // 存储本地
            var a = this;
            if (window.localStorage) {
                localStorage.setItem(sto_name, JSON.stringify(data));
            } else {
                a.setCookie(sto_name, JSON.stringify(data), 10000);
            }
        },
        delLocalSto: function(sto_name) {
            // 删除本地存储
            var a = this;
            if (window.localStorage) {
                if (localStorage.getItem(sto_name)) {
                    localStorage.removeItem(sto_name);
                }
            } else {
                if (a.getCookie(sto_name)) {
                    a.setCookie(sto_name, "", -1);
                }
            }
        },
        setCookie: function(name, value, Days) {
            // 设置cookie
            var exp = new Date();
            exp.setTime(exp.getTime() + Days * 24 * 60 * 60 * 1000); //设置过期时间
            document.cookie =
                name +
                "=" +
                escape(value) +
                ";expires=" +
                exp.toGMTString() +
                ";path=/";
        },
        getCookie: function(name) {
            //获取cookie
            var arr = document.cookie.match(
                new RegExp("(^| )" + name + "=([^;]*)(;|$)")
            );
            if (arr != null) {
                return unescape(arr[2]);
            } else {
                return null;
            }
        },
        throttle: function(method, context, arr, times) {
            //函数节流
            clearTimeout(method.tid);
            method.tid = setTimeout(
                function() {
                    method.apply(context, arr);
                },
                times != undefined ? times : 50
            );
        }
    }
};

if (!Number.isNaN) {
    Number.isNaN = window.isNaN;
}

if (location.pathname.indexOf('version_prompt') === -1) {
    var isContinue = generalDef.fn.getSession('isContinue');
    var browser = generalDef.fn.getBrowser();
    var version = browser.match(/\d+/) || 0;
    version && (version = version[0]);
    if (browser.indexOf('IE') != -1 && version <= 10 && isContinue != 1) {
        location.href = '/version_prompt/';
    }
}

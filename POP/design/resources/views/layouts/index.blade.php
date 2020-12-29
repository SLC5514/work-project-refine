<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="content-language" content="zh-CN">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta http-equiv="cache-control" content="no-cache">
        <meta http-equiv="pragma" content="no-cache">
        <meta http-equiv="Window-target" content="_top">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="renderer" content="webkit|ie-comp|ie-stand">
        <meta name="author" content="POP(全球)时尚网络机构 | pop136.com">
        <meta name="copyright" content="pop136.com">
        <meta name="applicable-device" content="pc,mobile">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="format-detection" content="telphone=no,email=no">
        <meta name="msapplication-tap-highlight" content="no">
        <meta name="robots" content="all">
        <meta name="keywords" content="@yield('keywords')">
        <meta name="description" content="@yield('description')">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" />

        <!-- Styles -->
        <!-- <link href="https://cdn.bootcdn.net/ajax/libs/element-ui/2.13.2/theme-chalk/index.css" rel="stylesheet"> -->
        <link href="{{ asset('css/index.css') }}" rel="stylesheet" />
        @yield('styles')

        <!-- Scripts -->
        <!-- <script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.bootcdn.net/ajax/libs/vue/2.6.11/vue.min.js"></script>
        <script src="https://cdn.bootcdn.net/ajax/libs/element-ui/2.13.2/index.js"></script> -->
        <script defer>
            (function () {
                function autoRootFontSize() {
                    document.documentElement.style.fontSize = (Math.min(screen.width, document.documentElement.getBoundingClientRect().width, 750) / 750) * 100 + 'px';
                }
                window.addEventListener('onorientationchange' in window ? 'orientationchange' : 'resize', autoRootFontSize, false);
                autoRootFontSize();
            })();
        </script>
        <script src="{{ asset('js/utils.js') }}"></script>
        <script src="{{ asset('js/index.js') }}" defer></script>

        <!-- GrowingIO Analytics code version 2.1 -->
        <!-- Copyright 2015-2018 GrowingIO, Inc. More info available at http://www.growingio.com -->
        <script type='text/javascript'>
            !function(e,t,n,g,i){e[i]=e[i]||function(){(e[i].q=e[i].q||[]).push(arguments)},n=t.createElement("script"),tag=t.getElementsByTagName("script")[0],n.async=1,n.src=('https:'==document.location.protocol?'https://':'http://')+g,tag.parentNode.insertBefore(n,tag)}(window,document,"script","assets.giocdn.com/2.1/gio.js","gio");
            gio('init','9c64e0c609bd85e3', {});
            //custom page code begin here
            //custom page code end here
            gio('send');
        </script>
        <!-- End GrowingIO Analytics code version: 2.1 -->

        @yield('scripts')
    </head>
    <body>
        <div id="app" v-cloak>
            @yield('content')
        </div>
    </body>
</html>

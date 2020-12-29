<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
        <!-- <link href="https://cdn.bootcdn.net/ajax/libs/element-ui/2.13.2/theme-chalk/index.css" rel="stylesheet"> -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <!-- <script src="https://cdn.bootcdn.net/ajax/libs/tinymce/5.4.1/tinymce.min.js"></script> -->
    <!-- <script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/vue/2.6.11/vue.min.js"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/element-ui/2.13.2/index.js"></script> -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('scripts')
</head>
<body>
    <div id="app" v-cloak>
        <el-container>
            <el-aside width="auto" v-if="pathNames[0] != 'login'">
                <el-menu class="el-menu-aside" ref="menu-aside" :default-active="pathNames[0] + '-1'" :collapse="isCollapse">
                    <a href="/">
                        <el-menu-item class="logo-box">
                            <i class="logo"></i>
                            <span slot="title">设界后台管理系统</span>
                        </el-menu-item>
                    </a>
                    @can('admin.ad')
                    <el-submenu index="ad">
                        <template slot="title">
                            <i class="el-icon-tickets"></i>
                            <span slot="title">广告管理</span>
                        </template>
                        <a href="/ad">
                            <el-menu-item index="ad-1">广告管理</el-menu-item>
                        </a>
                    </el-submenu>
                    @endcan
                    @can('admin.news')
                    <el-submenu index="news">
                        <template slot="title">
                            <i class="el-icon-tickets"></i>
                            <span slot="title">活动/资讯管理</span>
                        </template>
                        <a href="/news">
                            <el-menu-item index="news-1">活动/资讯管理</el-menu-item>
                        </a>
                    </el-submenu>
                    @endcan
                    @can('admin.users')
                    <el-submenu index="users">
                        <template slot="title">
                            <i class="el-icon-tickets"></i>
                            <span slot="title">用户管理</span>
                        </template>
                        <a href="/users">
                            <el-menu-item index="users-1">用户管理</el-menu-item>
                        </a>
                        @can('admin.roles')
                        <a href="/roles">
                            <el-menu-item index="roles-1">角色管理</el-menu-item>
                        </a>
                        @endcan
                        @can('admin.operateLog')
                        <a href="/operateLog">
                            <el-menu-item index="operateLog-1">操作日志</el-menu-item>
                        </a>
                        @endcan
                    </el-submenu>
                    @endcan
                </el-menu>
            </el-aside>
            <el-container style="height:100vh;">
                <el-header style="display:flex;align-items:center;line-height:60px;border-bottom:1px solid #eee;color:#666;">
                    <el-button type="text" :icon="isCollapse ? 'el-icon-s-unfold' : 'el-icon-s-fold'" @click="isCollapse = !isCollapse" style="color:#666;" v-if="pathNames[0] != 'login'"></el-button>
                    <a href="{{ url('/') }}" v-if="pathNames[0] == 'login'" style="font-weight:bold;font-size:16px;">后台管理系统</a>
                    @guest
                        <a href="{{ route('login') }}" style="margin-left:auto;">{{ __('登陆') }}</a>
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" style="margin-left:auto;">{{ __('注册') }}</a>
                        @endif
                    @else
                        <el-dropdown style="margin-left:auto;">
                            <span class="el-dropdown-link">
                                <a href="#" role="button" style="color:inherit;" v-pre>
                                    {{ Auth::user()->name }}
                                    <i class="el-icon-arrow-down el-icon--right"></i>
                                </a>
                            </span>
                            <el-dropdown-menu slot="dropdown">
                                <el-dropdown-item style="padding:0;">
                                    <a href="{{ route('logout') }}" style="padding:0 20px;"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('登出') }}
                                    </a>
                                </el-dropdown-item>
                            </el-dropdown-menu>
                        </el-dropdown>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endguest
                </el-header>
                <el-main id="home" v-cloak>@yield('content')</el-main>
            </el-container>
        </el-container>
    </div>
</body>
</html>

<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes 前台路由组 控制器在 "App\Http\Controllers\Index" 命名空间下
|--------------------------------------------------------------------------
*/
Route::group(['domain' => 'www.popshejie.com', 'namespace' => 'Index'], function () {
    // 首页
    Route::get('/', 'HomeController@index')->name('home');

    // 品牌活动
    Route::get('/activity/{tab?}', 'NewsController@brandActivities')
        ->where('tab', 'recent|review')
        ->name('activity.index');
    Route::get('/activity/{hashId}', 'NewsController@show')
        ->where('hashId', '[0-9a-zA-Z]+')
        ->name('activity.show');

    // 官方资讯
    Route::get('/info', 'NewsController@officialInformation')->name('info.index');
    Route::get('/info/{hashId}', 'NewsController@show')
        ->where('hashId', '[0-9a-zA-Z]+')
        ->name('info.show');

    // 设界分布列表页
    Route::get('/design', 'DistributionController@index')->name('design');
    // 设界详情
    Route::get('/design/{name}', 'DistributionController@show')
        ->where('name', 'shengze|tongxiang|guangzhou|nantong|shaoxing')
        ->name('design');

    // 关于我们
    Route::get('/about', 'AboutUsController')->name('about_us');
    // 联系我们
    Route::get('/contact', 'ContactUsController')->name('contact_us');
    // 精英联盟
    Route::get('/talent', 'TalentAllianceController')->name('talent_alliance');

    // 低版本提示
    Route::get('/version_prompt', 'VersionPromptController')->name('version_prompt');
});

/*
|--------------------------------------------------------------------------
| Web Routes 后台路由组 控制器在 "App\Http\Controllers\Admin" 命名空间下
|--------------------------------------------------------------------------
*/
Route::group(['domain' => 'admin.popshejie.com', 'namespace' => 'Admin'], function () {
    // 验证
    Route::group(['namespace' => 'Auth'], function () {
        // 登录
        Route::get('login', 'LoginController@showLoginForm')->name('login');
        Route::post('login', 'LoginController@login')->name('admin.login');
        // 登出
        Route::post('logout', 'LoginController@logout')->name('logout');
    });

    Route::middleware(['auth'])->group(function () {
        // 首页
        Route::get('/', 'HomeController@index')->name('home');
        // 上传图片
        Route::post('/upload', 'UploadController@uploadImage')->name('upload');

        Route::middleware(['permission:admin.ad'])->group(function () {
            // 广告管理
            Route::get('/ad', 'AdController@index')->name('ad.index');
            Route::get('/ad/create', 'AdController@create')->name('ad.create');
//                ->middleware('permission:admin.ad.create');
            Route::get('/ad/{ad}', 'AdController@show')->name('ad.show');
//                ->middleware('permission:admin.ad.show');
            Route::post('/ad', 'AdController@store')->name('ad.store');
//                ->middleware('permission:admin.ad.store');
            Route::delete('/ad/{ad}', 'AdController@destroy')->name('ad.destroy');
//                ->middleware('permission:admin.ad.delete');
        });

        // 活动、资讯管理
        Route::middleware(['permission:admin.news'])->group(function () {
            Route::get('/news', 'NewsController@index')->name('news.index');
            Route::get('/news/create', 'NewsController@create')->name('news.create');
//                ->middleware('permission:admin.news.create');
            Route::get('/news/{news}', 'NewsController@show')->name('news.show');
//                ->middleware('permission:admin.news.show');
            Route::post('/news', 'NewsController@store')->name('news.store');
//                ->middleware('permission:admin.news.store');
            Route::delete('/news/{news}', 'NewsController@destroy')->name('news.destroy');
//                ->middleware('permission:admin.news.delete');
        });

        // 用户管理
        Route::middleware(['permission:admin.users'])->group(function () {
            Route::get('/users', 'UserController@index')->name('users.index');
            Route::get('/users/create', 'UserController@create')->name('users.create');
//                ->middleware('permission:admin.users.create');
            Route::get('/users/{user}', 'UserController@show')->name('users.show');
//                ->middleware('permission:admin.users.show');
            Route::post('/users', 'UserController@store')->name('users.store');
//                ->middleware('permission:admin.users.store');
            Route::delete('/users/{user}', 'UserController@destroy')->name('users.destroy');
//                ->middleware('permission:admin.users.delete');
            Route::post('/users/ableDisable', 'UserController@ableDisable')->name('users.ableDisable');
//                ->middleware('permission:admin.users.ableDisable');
        });

        //角色管理
//        Route::get('/roles/test', 'RoleController@test')->name('roles.test');
        Route::middleware(['permission:admin.roles'])->group(function () {
            Route::get('/roles', 'RoleController@index')->name('roles.index');
            Route::get('/roles/create', 'RoleController@create')->name('roles.create');
//                ->middleware('permission:admin.roles.create');
            Route::get('/roles/{role}', 'RoleController@show')->name('roles.show');
//                ->middleware('permission:admin.roles.show');
            Route::post('/roles', 'RoleController@store')->name('roles.store');
//                ->middleware('permission:admin.roles.store');
            Route::delete('/roles/{role}', 'RoleController@destroy')->name('roles.destroy');
//                ->middleware('permission:admin.roles.delete');
            Route::post('/roles/ableDisable', 'RoleController@ableDisable')->name('roles.ableDisable');
//                ->middleware('permission:admin.roles.ableDisable');
        });

        //操作日志
        Route::middleware(['permission:admin.operateLog'])->group(function () {
            Route::get('/operateLog', 'OperateLogController@index')->name('operateLog.index');
        });


    });
});


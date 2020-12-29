const mix = require("laravel-mix");
const path = require("path");

function resolve(dir) {
    return path.join(__dirname, dir);
}

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.webpackConfig({
    resolve: {
        alias: {
            "@assets": resolve("resources/assets")
        }
    },
    // externals: { // 配置不打包的选项
    //     'element-ui': 'Element',
    //     'bootstrap': 'bootstrap',
    //     'vue': 'Vue',
    // }
})
.js(["node_modules/babel-polyfill/lib/index.js", "resources/assets/js/index.js"], "public/js")
.js("resources/assets/js/utils.js", "public/js")
.js("resources/admin/js/app.js", "public/js")
// page scripts
.js("resources/assets/js/views/home.js", "public/js/views")
.js("resources/assets/js/views/aboutus.js", "public/js/views") // 关于我们
.js("resources/assets/js/views/design_world_detail.js", "public/js/views") // 设界详情
.js("resources/assets/js/views/brand_activities.js", "public/js/views") // 品牌活动
.js("resources/assets/js/views/office_info.js", "public/js/views") // 官方资讯
.js("resources/assets/js/views/news_detail.js", "public/js/views") // 活动资讯详情
.js("resources/assets/js/views/talent_alliance.js", "public/js/views") // 精英联盟
// app styles
.sass("resources/assets/css/index.scss", "public/css")
.sass("resources/admin/css/app.scss", "public/css")
// page styles
.sass("resources/assets/css/views/home.scss", "public/css/views") // 首页
.sass("resources/assets/css/views/aboutus.scss", "public/css/views") // 关于我们
.sass("resources/assets/css/views/design_world_distribution.scss", "public/css/views") // 设界分布
.sass("resources/assets/css/views/design_world_detail.scss", "public/css/views") // 设界详情
.sass("resources/assets/css/views/brand_activities.scss", "public/css/views") // 品牌活动
.sass("resources/assets/css/views/office_info.scss", "public/css/views") // 官方资讯
.sass("resources/assets/css/views/news_detail.scss", "public/css/views") // 活动资讯详情
.sass("resources/assets/css/views/contactus.scss", "public/css/views") // 联系我们
.sass("resources/assets/css/views/talent_alliance.scss", "public/css/views") // 精英联盟
.sass("resources/assets/css/views/version_prompt.scss", "public/css/views") // 低版本提示
// postcss
.options({
    processCssUrls: false,
    postCss: [require("postcss-css-variables")()]
})
.copyDirectory('resources/assets/images', 'public/images')
.copyDirectory('node_modules/element-ui/lib/theme-chalk/fonts', 'public/css/fonts');

// if (!mix.inProduction()) {
//     mix.sourceMaps();
// }

if (mix.inProduction()) {
    mix.version();
}

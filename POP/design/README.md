# 项目初始操作
    
    php依赖包安装
    composer install
    
    前端框架依赖包安装
    npm install
    
    生成项目存储文件的软连接
    php artisan storage:link
    修改访问权限
    sudo chmod -R 777 storage
    
    生成项目的key
    php artisan key:generate
    
    迁移数据
    php artisan migrate
    
    编译运行前端资源
    npm run production
    
# 数据迁移

> 重建数据库并填充数据

    php artisan migrate:refresh --seed

v2
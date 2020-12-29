<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->integerIncrements('id');

            $table->tinyInteger('type')->default(0)->comment('分类： 1、活动，2、资讯');
            $table->string('title',500)->default('')->comment('活动标题');
            $table->timestamp('up_line_at')->nullable(false)->comment('上线时间');
            $table->timestamp('down_line_at')->nullable(true)->comment('下线时间');

            $table->string('img_src',500)->nullable(false)->comment('封面图');

            $table->string('qr_code_title',50)->default('')->comment('二维码标题');
            $table->string('qr_code_images',500)->default('')->comment('二维码图片地址');

            // 资讯描述
            $table->text('description')->nullable(true)->comment('资讯描述');

            // 活动标签
            $table->tinyInteger('activity_type')->default(0)->comment('活动标签： 1、设界官方，2、非设界官方');
            $table->tinyInteger('design_world')->default(0)->comment('所属设界： 1、盛泽，2、桐乡，3、广州，4、南通，5、绍兴，6、上海，7、杭州，8、西塘');
            $table->string('venue',500)->nullable(false)->default('')->comment('活动地点');
            $table->timestamp('begin_at')->nullable(true)->comment('生效时间');
            $table->timestamp('end_at')->nullable(true)->comment('过期时间');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE `news` comment '活动资讯表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}

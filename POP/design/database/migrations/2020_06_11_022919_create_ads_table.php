<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->tinyInteger('position')->default(0)->comment('广告位置:1.首页顶部广告 2.品牌活动顶部广告 3.官方资讯顶部广告 4.关于设界顶部广告');
            $table->integer('weight')->default(0)->comment('广告权重');
            $table->string('title',500)->default('')->comment('标题');
            $table->string('subtitle',500)->default('')->comment('副标题');
            $table->text('description')->comment('描述')->nullable(true);
            $table->string('link',2000)->default('')->comment('链接');
            $table->timestamp('up_line_at')->comment('上线时间');
            $table->timestamp('down_line_at')->nullable(true)->comment('下线时间');
            $table->string('img_src',2000)->nullable(false)->comment('广告图上传地址');
            $table->timestamps();
            $table->softDeletes();
            $table->index('position');
        });

        DB::statement("ALTER TABLE `ads` comment '广告表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
}

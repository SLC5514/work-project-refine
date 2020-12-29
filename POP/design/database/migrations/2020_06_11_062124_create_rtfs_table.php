<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateRtfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rtfs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('news_id')->nullable(false)->comment('关联表主键ID');
            $table->text('content')->nullable(false);
            $table->timestamps();
            $table->index('news_id');
        });
        DB::statement("ALTER TABLE `rtfs` comment '活动资讯/内容关联表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rtfs');
    }
}

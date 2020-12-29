<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('is_able')->default(1)->comment('1-启用，2-禁用')->after('remember_token');
            $table->tinyInteger('is_delete')->default(1)->comment('0-已删除，1-正常')->after('remember_token');
            $table->integer('updated_by')->unsigned()->default(0)->comment('修改人id')->after('remember_token');
            $table->integer('created_by')->unsigned()->default(0)->comment('创建人id')->after('remember_token');
            $table->string('phone',20)->default('')->comment('联系方式')->after('remember_token');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['is_able', 'is_delete', 'updated_by','created_by','phone']);
        });
    }
}

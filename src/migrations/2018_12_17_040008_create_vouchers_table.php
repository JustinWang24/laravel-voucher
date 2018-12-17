<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->increments('id');

            $table->string('code',200);                      // Voucher的代码，最多200个字符长度
            $table->unsignedSmallInteger('type')->default(1);       // Voucher的类型，可自定义: 比如学生专用， 中介专用，通用类型
            $table->integer('discount_value')->default(0);          // 折扣值 百分比或数字
            $table->boolean('is_percent')->default(false);          // 折扣值是百分比吗
            $table->boolean('used')->default(false);                // 是否已经使用过了
            $table->unsignedInteger('used_by_user_id')->default(0); // 被哪个用户使用了
            $table->date('commence')->nullable();                   // 有效使用的开始日期， null表示可以随时开始
            $table->date('expired_at')->nullable();                 // 使用的截止日期, null表示可以无限制

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vouchers');
    }
}

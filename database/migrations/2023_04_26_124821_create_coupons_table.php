<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->integer('coupon_category_id')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_tc')->nullable();
            $table->string('name_sc')->nullable();
            $table->longText('content_en')->nullable();
            $table->longText('content_tc')->nullable();
            $table->longText('content_sc')->nullable();
            $table->string('coupon_value_type')->nullable();
            $table->string('discount_type')->nullable();
            $table->integer('coupon_amount')->nullable();
            $table->string('minimum_spend')->nullable();
            $table->string('maximum_spend')->nullable();
            $table->string('banner_img')->nullable();
            $table->datetime('start_date')->nullable();
            $table->datetime('end_date')->nullable();
            $table->integer('usage_time')->nullable();
            $table->integer('usage_limit_per_coupon')->nullable();
            $table->string('product_limit_type')->nullable();
            $table->integer('usage_limit_per_member')->nullable();
            $table->integer('total_used_member')->nullable();
            $table->string('member_type')->nullable();
            $table->boolean('is_checked_product')->default(0)->nullable();
            $table->boolean('is_checked_exproduct')->default(0)->nullable();
            $table->tinyInteger('is_published')->default(1)->nullable();
            $table->boolean('is_translate')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('coupons');
    }
}

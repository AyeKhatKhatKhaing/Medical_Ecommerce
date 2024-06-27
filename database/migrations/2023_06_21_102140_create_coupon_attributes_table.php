<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon_attributes', function (Blueprint $table) {
            $table->id();
            $table->string('is_include_exclude')->nullable();
            $table->integer('coupon_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('sub_category_id')->nullable();
            $table->integer('ex_sub_category_id')->nullable();
            $table->integer('merchant_id')->nullable();
            $table->integer('ex_merchant_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->integer('ex_product_id')->nullable();
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
        Schema::dropIfExists('coupon_attributes');
    }
};

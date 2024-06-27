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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_no')->nullable();

            $table->unsignedBigInteger('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers');

            $table->unsignedBigInteger('promo_code_id')->nullable();
            $table->foreign('promo_code_id')->references('id')->on('promo_codes')->onDelete('cascade');

            $table->unsignedBigInteger('coupon_id')->nullable();
            $table->foreign('coupon_id')->references('id')->on('coupons')->onDelete('cascade');

            $table->unsignedBigInteger('territorie_id')->nullable();
            $table->foreign('territorie_id')->references('id')->on('territories')->onDelete('cascade');

            $table->unsignedBigInteger('district_id')->nullable();
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');

            $table->unsignedBigInteger('area_id')->nullable();
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');

            $table->string('first_name',200)->nullable();
            $table->string('last_name',200)->nullable();
            $table->string('email',100)->nullable();
            $table->string('phone',100)->nullable();
            $table->string('country',200)->nullable();
            $table->string('coupon_code',100)->nullable();
            $table->string('discount_percent',10)->nullable();
            $table->string('discount_amount', 10, 2)->nullable();
            $table->string('coupon_amount', 10, 2)->nullable();
            $table->string('promo_code_amount',10)->nullable();
            $table->string('promotion_discount',10)->nullable();
            $table->string('onsale_discount',10)->nullable();
            $table->decimal('sub_total', 10, 2)->nullable();
            $table->decimal('grand_total', 10, 2)->nullable();
            $table->tinyInteger('status')->nullable();
            $table->tinyInteger('payment_status')->nullable();
            $table->text('order_note')->nullable();
            $table->text('message')->nullable();
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
        Schema::dropIfExists('orders');
    }
};

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
        Schema::create('blog_details_coupon_product', function (Blueprint $table) {
            $table->id();
            $table->integer('blog_details_id');
            $table->tinyInteger('type')->default(1);
            $table->integer('product_id')->nullable();
            $table->integer('coupon_id')->nullable();
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
        Schema::dropIfExists('blog_details_coupon_product');
    }
};

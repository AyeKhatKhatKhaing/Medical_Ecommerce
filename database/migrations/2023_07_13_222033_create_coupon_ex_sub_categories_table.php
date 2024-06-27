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
        Schema::create('coupon_ex_sub_categories', function (Blueprint $table) {
            $table->id();
            $table->integer('coupon_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('ex_sub_category_id')->nullable();
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
        Schema::dropIfExists('coupon_ex_sub_categories');
    }
};

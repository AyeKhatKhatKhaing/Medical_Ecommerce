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
        Schema::create('product_variations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id');
            $table->string('sku')->nullable();
            $table->string('original_price')->nullable();
            $table->string('discount_price')->nullable();
            $table->string('promotion_price')->nullable();
            $table->string('avg_price')->nullable();
            $table->string('stock')->nullable();
            $table->integer('number_of_dose')->nullable();
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
        Schema::dropIfExists('product_variations');
    }
};

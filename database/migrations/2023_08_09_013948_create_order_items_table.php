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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('orders_id')->unsigned();
            $table->foreign('orders_id')->references('id')->on('orders');

            $table->unsignedBigInteger('recipient_id')->nullable();
            $table->foreign('recipient_id')->references('id')->on('recipients')->onDelete('cascade');

            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            $table->unsignedBigInteger('variable_id')->nullable();
            $table->foreign('variable_id')->references('id')->on('product_variations')->onDelete('cascade');

            $table->string('sku',200)->nullable();
            $table->string('product_type',200)->nullable();
            $table->string('qty_ordered',200)->nullable();
            $table->string('discount_percent',10)->nullable();
            $table->decimal('discount_amount', 10, 2)->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->decimal('total', 10, 2)->nullable();
            $table->text('item_description')->nullable();
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
        Schema::dropIfExists('order_items');
    }
};

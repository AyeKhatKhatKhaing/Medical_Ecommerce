<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOnSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('on_sales', function (Blueprint $table) {
            $table->id();
            $table->integer('sale_category_id')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_tc')->nullable();
            $table->string('name_sc')->nullable();
            $table->longText('content_en')->nullable();
            $table->longText('content_tc')->nullable();
            $table->longText('content_sc')->nullable();
            $table->string('discount_type')->nullable();
            $table->string('amount')->nullable();
            $table->string('sale_qty')->nullable();
            $table->string('minimum_spend')->nullable();
            $table->string('maximum_spend')->nullable();
            $table->datetime('start_date')->nullable();
            $table->datetime('end_date')->nullable();
            $table->integer('usage_time')->nullable();
            $table->integer('usage_limit_per_sale')->nullable();
            $table->string('product_limit_type')->nullable();
            $table->integer('usage_limit_per_member')->nullable();
            $table->integer('total_used_member')->nullable();
            $table->string('member_type')->nullable();
            $table->string('product_ids')->nullable();
            $table->string('exclude_products')->nullable();
            $table->string('merchant_id')->nullable();
            $table->string('exclude_merchant_id')->nullable();
            $table->string('product_categories')->nullable();
            $table->string('exclude_product_categories')->nullable();
            $table->string('product_sub_categories')->nullable();
            $table->string('exclude_sub_categories')->nullable();
            $table->string('recommend_products')->nullable();
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
        Schema::drop('on_sales');
    }
}

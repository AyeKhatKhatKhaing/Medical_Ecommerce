<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            // $table->unsignedBigInteger('key_item_tag_id')->nullable();
            // $table->foreign('key_item_tag_id')->references('id')->on('key_item_tags')->onDelete('cascade');

            $table->unsignedBigInteger('free_gift_id')->nullable();
            $table->foreign('free_gift_id')->references('id')->on('free_gifts')->onDelete('cascade');

            $table->unsignedBigInteger('qdollar_rebate_id')->nullable();
            $table->foreign('qdollar_rebate_id')->references('id')->on('q_dollor_rebates')->onDelete('cascade');

            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('sub_category_id')->nullable();

            // $table->unsignedBigInteger('supplymentary_id')->nullable();
            // $table->foreign('supplymentary_id')->references('id')->on('supplementaries')->onDelete('cascade');
            
            $table->unsignedBigInteger('plan_description_id')->nullable();
            $table->foreign('plan_description_id')->references('id')->on('plan_descriptions')->onDelete('cascade');
            
            $table->unsignedBigInteger('plan_process_id')->nullable();
            $table->foreign('plan_process_id')->references('id')->on('plan_processes')->onDelete('cascade');

            $table->unsignedBigInteger('merchant_id')->nullable();
            $table->foreign('merchant_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->string('name_en')->nullable();
            $table->string('name_tc')->nullable();
            $table->string('name_sc')->nullable();
            $table->string('slug_en')->nullable();
            $table->string('slug_tc')->nullable();
            $table->string('slug_sc')->nullable();
            $table->string('sku')->nullable();
            $table->string('original_price')->nullable();
            $table->string('discount_price')->nullable();
            $table->string('promotion_price')->nullable();
            $table->string('product_code')->nullable();
            $table->longText('for_tag_en')->nullable();
            $table->longText('for_tag_tc')->nullable();
            $table->longText('for_tag_sc')->nullable();
            $table->string('stock')->nullable();
            $table->integer('number_of_dose')->nullable();
            $table->string('featured_img')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('meta_img')->nullable();
            $table->string('meta_title_en')->nullable();
            $table->string('meta_title_tc')->nullable();
            $table->string('meta_title_sc')->nullable();
            $table->string('meta_description_en')->nullable();
            $table->string('meta_description_tc')->nullable();
            $table->string('meta_description_sc')->nullable();
            $table->boolean('is_published')->default(1)->nullable();
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
        Schema::drop('products');
    }
}

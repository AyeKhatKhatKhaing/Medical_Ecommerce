<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePromoCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo_codes', function (Blueprint $table) {
            $table->id('id');
            $table->string('code')->nullable();
            $table->longText('description_en')->nullable();
            $table->longText('description_tc')->nullable();
            $table->longText('description_sc')->nullable();
            $table->integer('product_category_id')->nullable();
            $table->integer('amount')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('user_limit')->nullable();
            $table->integer('use_limit')->nullable();
            $table->string('icon')->nullable();
            $table->tinyInteger('is_published')->default(1)->nullable();
            $table->tinyInteger('is_translate')->default(0)->nullable();
            $table->string('updated_by')->nullable();
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
        Schema::drop('promo_codes');
    }
}

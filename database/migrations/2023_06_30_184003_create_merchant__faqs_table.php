<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMerchantFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant_faqs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->bigInteger('merchant_id')->nullable();
            $table->string('question_en')->nullable();
            $table->string('question_sc')->nullable();
            $table->string('question_tc')->nullable();
            $table->string('answer_en')->nullable();
            $table->string('answer_sc')->nullable();
            $table->string('answer_tc')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('merchant_faqs');
    }
}

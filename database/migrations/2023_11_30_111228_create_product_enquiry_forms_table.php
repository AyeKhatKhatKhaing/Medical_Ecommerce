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
        Schema::create('product_enquiry_forms', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');

            $table->unsignedBigInteger('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers');

            $table->tinyInteger('age_check')->default(0)->nullable();
            $table->tinyInteger('have_referral')->default(0)->nullable();
            $table->tinyInteger('id_card')->default(0)->nullable();
            $table->tinyInteger('disease_check')->default(0)->nullable();
            $table->tinyInteger('blood_test')->default(0)->nullable();
            $table->tinyInteger('had_colonoscopy')->default(0)->nullable();
            $table->tinyInteger('medical_insurance')->default(0)->nullable();
            $table->tinyInteger('ehealth_registered')->default(0)->nullable();
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
        Schema::dropIfExists('product_enquiry_forms');
    }
};

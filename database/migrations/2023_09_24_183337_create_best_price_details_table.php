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
        Schema::create('best_price_details', function (Blueprint $table) {
            $table->id();
            $table->string('best_price_img')->nullable();
            $table->string('best_price_title_en')->nullable();
            $table->string('best_price_title_tc')->nullable();
            $table->string('best_price_title_sc')->nullable();
            $table->string('best_price_text_en')->nullable();
            $table->string('best_price_text_tc')->nullable();
            $table->string('best_price_text_sc')->nullable();
            $table->longText('best_price_description_en')->nullable();
            $table->longText('best_price_description_tc')->nullable();
            $table->longText('best_price_description_sc')->nullable();
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
        Schema::dropIfExists('best_price_details');
    }
};

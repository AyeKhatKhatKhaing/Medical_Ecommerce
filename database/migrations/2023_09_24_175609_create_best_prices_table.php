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
        Schema::create('best_prices', function (Blueprint $table) {
            $table->id();
            $table->string('banner_img')->nullable();
            $table->string('banner_title_en')->nullable();
            $table->string('banner_title_tc')->nullable();
            $table->string('banner_title_sc')->nullable();
            $table->longText('banner_description_en')->nullable();
            $table->longText('banner_description_tc')->nullable();
            $table->longText('banner_description_sc')->nullable();


            $table->string('service_img')->nullable();
            $table->string('service_title_en')->nullable();
            $table->string('service_title_tc')->nullable();
            $table->string('service_title_sc')->nullable();
            $table->string('service_subtitle_en')->nullable();
            $table->string('service_subtitle_tc')->nullable();
            $table->string('service_subtitle_sc')->nullable();
            $table->longText('service_description_en')->nullable();
            $table->longText('service_description_tc')->nullable();
            $table->longText('service_description_sc')->nullable();
            $table->longText('service_link_text_en')->nullable();
            $table->longText('service_link_text_tc')->nullable();
            $table->longText('service_link_text_sc')->nullable();


            $table->string('awesome_booking_title_en')->nullable();
            $table->string('awesome_booking_title_tc')->nullable();
            $table->string('awesome_booking_title_sc')->nullable();

            $table->string('meta_title_en')->nullable();
            $table->string('meta_title_tc')->nullable();
            $table->string('meta_title_sc')->nullable();
            $table->longText('meta_description_en')->nullable();
            $table->longText('meta_description_tc')->nullable();
            $table->longText('meta_description_sc')->nullable();
            $table->string('meta_img')->nullable();
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
        Schema::dropIfExists('best_prices');
    }
};

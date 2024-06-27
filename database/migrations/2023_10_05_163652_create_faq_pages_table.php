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
        Schema::create('faq_pages', function (Blueprint $table) {
            $table->id();
            $table->string('banner_img')->nullable();
            $table->string('banner_title_en')->nullable();
            $table->string('banner_title_tc')->nullable();
            $table->string('banner_title_sc')->nullable();
    
            $table->string('button1_img')->nullable();
            $table->string('button1_title_en')->nullable();
            $table->string('button1_title_tc')->nullable();
            $table->string('button1_title_sc')->nullable();
            $table->string('button2_img')->nullable();
            $table->string('button2_title_en')->nullable();
            $table->string('button2_title_tc')->nullable();
            $table->string('button2_title_sc')->nullable();
            $table->string('button3_img')->nullable();
            $table->string('button3_title_en')->nullable();
            $table->string('button3_title_tc')->nullable();
            $table->string('button3_title_sc')->nullable();
            $table->string('title1_en')->nullable();
            $table->string('title1_tc')->nullable();
            $table->string('title1_sc')->nullable();
            
            $table->string('title2_en')->nullable();
            $table->string('title2_tc')->nullable();
            $table->string('title2_sc')->nullable();
    
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
        Schema::dropIfExists('faq_pages');
    }
};

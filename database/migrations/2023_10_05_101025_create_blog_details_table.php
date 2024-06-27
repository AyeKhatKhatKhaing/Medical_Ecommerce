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
        Schema::create('blog_details', function (Blueprint $table) {
            $table->id();
            $table->integer('blog_id');
            $table->string('title_no_en')->nullable();
            $table->string('title_no_sc')->nullable();
            $table->string('title_no_tc')->nullable();
            $table->string('title_en')->nullable();
            $table->string('title_sc')->nullable();
            $table->string('title_tc')->nullable();
            $table->string('video_url')->nullable();
            $table->integer('image_gallery_id')->nullable();
            $table->string('desc_en')->nullable();
            $table->string('desc_sc')->nullable();
            $table->string('desc_tc')->nullable();
            $table->string('download1_name_en')->nullable();
            $table->string('download1_name_sc')->nullable();
            $table->string('download1_name_tc')->nullable();
            $table->string('download1_link')->nullable();
            $table->string('download2_name_en')->nullable();
            $table->string('download2_name_sc')->nullable();
            $table->string('download2_name_tc')->nullable();
            $table->string('download2_link')->nullable();
            $table->string('form_title_en')->nullable();
            $table->string('form_title_sc')->nullable();
            $table->string('form_title_tc')->nullable();
            $table->string('merchant_banner_img_en')->nullable();
            $table->string('merchant_banner_img_sc')->nullable();
            $table->string('merchant_banner_img_tc')->nullable();
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
        Schema::dropIfExists('blog_details');
    }
};

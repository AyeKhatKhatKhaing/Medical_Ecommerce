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
        Schema::create('blog_section_features', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blog_id');
            $table->foreign('blog_id')->references('id')->on('blogs')->onDelete('cascade');
            $table->unsignedBigInteger('section_id');
            $table->foreign('section_id')->references('id')->on('blog_sections')->onDelete('cascade');
            $table->bigInteger('array_no');
            $table->string('type');
            $table->integer('sort_no');
            $table->text('desc_en')->nullable();
            $table->text('desc_sc')->nullable();
            $table->text('desc_tc')->nullable();
            $table->text('product_ids')->nullable();
            $table->text('download_name_en')->nullable();
            $table->text('download_name_sc')->nullable();
            $table->text('download_name_tc')->nullable();
            $table->text('sample_download_file')->nullable();
            $table->text('coupon_ids')->nullable();
            $table->string('merchant_banner_img')->nullable();
            $table->text('further_name_en')->nullable();
            $table->text('further_name_sc')->nullable();
            $table->text('further_name_tc')->nullable();
            $table->text('further_url')->nullable();
            $table->text('key_item_ids')->nullable();
            $table->text('highlight_tag_ids')->nullable();
            $table->string('sub_category_id')->nullable();
            $table->string('video_url')->nullable();
            $table->string('image_url')->nullable();
            $table->text('image_gallery_path')->nullable();
            $table->text('image_gallery_alt_text')->nullable();
            $table->string('button_title_en')->nullable();
            $table->string('button_title_sc')->nullable();
            $table->string('button_title_tc')->nullable();
            $table->string('button_url_en')->nullable();
            $table->string('button_url_sc')->nullable();
            $table->string('button_url_tc')->nullable();
            $table->text('faq_question_en')->nullable();
            $table->text('faq_question_sc')->nullable();
            $table->text('faq_question_tc')->nullable();
            $table->text('faq_answer_en')->nullable();
            $table->text('faq_answer_sc')->nullable();
            $table->text('faq_answer_tc')->nullable();
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
        Schema::dropIfExists('blog_section_features');
    }
};

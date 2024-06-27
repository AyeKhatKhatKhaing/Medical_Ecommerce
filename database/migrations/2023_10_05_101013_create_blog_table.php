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
        Schema::create('blog', function (Blueprint $table) {
            $table->id();
            $table->integer('author_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('tag_id')->nullable();
            $table->string('related_keywords')->nullable();
            $table->tinyInteger('is_home_featured')->default(0)->nullable();
            $table->string('slug_en')->nullable();
            $table->string('slug_sc')->nullable();
            $table->string('slug_tc')->nullable();
            $table->string('title_en')->nullable();
            $table->string('title_sc')->nullable();
            $table->string('title_tc')->nullable();
            $table->string('desc_en')->nullable();
            $table->string('desc_sc')->nullable();
            $table->string('desc_tc')->nullable();
            $table->string('main_image_url')->nullable();
            $table->tinyInteger('is_popular')->default(0)->nullable();
            $table->integer('should_lookat_product_category_id')->nullable();
            $table->string('recommended_blog_id')->nullable();
            $table->string('t_&_c_content_en')->nullable();
            $table->string('t_&_c_content_sc')->nullable();
            $table->string('t_&_c_content_tc')->nullable();
            $table->integer('related_products_sub_category_id')->nullable();
            $table->tinyInteger('is_published')->default(1)->nullable();
            $table->integer('created_person')->nullable();
            $table->integer('updated_person')->nullable();
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
        Schema::dropIfExists('blog');
    }
};

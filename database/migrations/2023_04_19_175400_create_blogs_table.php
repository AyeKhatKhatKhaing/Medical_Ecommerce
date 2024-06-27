<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('name_en')->nullable();
            $table->string('name_sc')->nullable();
            $table->string('name_tc')->nullable();
            $table->string('slug_en')->nullable();
            $table->string('slug_sc')->nullable();
            $table->string('slug_tc')->nullable();
            $table->longText('content_en')->nullable();
            $table->longText('content_sc')->nullable();
            $table->longText('content_tc')->nullable();
            $table->string('img')->nullable();
            $table->integer('category_id')->nullable();
            $table->longText('message')->nullable();
            $table->integer('view_count')->nullable();
            $table->tinyInteger('is_highlight')->default(0)->nullable();
            $table->tinyInteger('is_home')->default(0)->nullable();
            $table->tinyInteger('is_published')->default(1)->nullable();
            $table->date('release_date')->nullable();
            $table->string('updated_by')->nullable();
            $table->tinyInteger('is_translate')->default(0)->nullable();
            $table->integer('order_by')->nullable();
            $table->string('meta_title_en')->nullable();
            $table->string('meta_title_sc')->nullable();
            $table->string('meta_title_tc')->nullable();
            $table->text('meta_description_en')->nullable();
            $table->text('meta_description_sc')->nullable();
            $table->text('meta_description_tc')->nullable();
            $table->string('meta_image')->nullable();
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
        Schema::drop('blogs');
    }
}

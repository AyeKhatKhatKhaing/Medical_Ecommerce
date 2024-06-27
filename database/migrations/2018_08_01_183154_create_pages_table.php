<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_en')->nullable();
            $table->string('name_tc')->nullable();
            $table->string('name_sc')->nullable();
            $table->longText('content_en')->nullable();
            $table->longText('content_tc')->nullable();
            $table->longText('content_sc')->nullable();
            $table->string('img')->nullable();
            $table->string('user_name')->nullable();
            $table->tinyInteger('is_published')->default(1)->nullable();
            $table->boolean('is_translate')->default(0)->nullable();
            $table->string('meta_title_en')->nullable();
            $table->string('meta_title_sc')->nullable();
            $table->string('meta_title_tc')->nullable();
            $table->text('meta_description_en')->nullable();
            $table->text('meta_description_sc')->nullable();
            $table->text('meta_description_tc')->nullable();
            $table->string('meta_image')->nullable();
            $table->softDeletes();
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
        Schema::drop('pages');
    }
}

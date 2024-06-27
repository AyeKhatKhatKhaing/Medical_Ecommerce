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
        Schema::create('blog_cms', function (Blueprint $table) {
            $table->id();
            $table->text('desc_en')->nullable();
            $table->text('desc_sc')->nullable();
            $table->text('desc_tc')->nullable();
            $table->string('subscribe_image')->nullable();
            $table->string('banner_image_1')->nullable();
            $table->string('banner_image_2')->nullable();
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
        Schema::dropIfExists('blog_cms');
    }
};

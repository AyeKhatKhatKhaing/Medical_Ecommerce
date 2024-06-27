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
        Schema::create('carrier_pages', function (Blueprint $table) {
            $table->id();
            $table->string('img');
            $table->string('title_en');
            $table->string('title_tc');
            $table->string('title_sc');
            $table->string('sub_title_en');
            $table->string('sub_title_tc');
            $table->string('sub_title_sc');
            $table->string('text_en');
            $table->string('text_tc');
            $table->string('text_sc');
            $table->string('email');
            $table->string('meta_img')->nullable();
            $table->string('meta_title_en')->nullable();
            $table->string('meta_title_tc')->nullable();
            $table->string('meta_title_sc')->nullable();
            $table->string('meta_description_en')->nullable();
            $table->string('meta_description_tc')->nullable();
            $table->string('meta_description_sc')->nullable();
            $table->boolean('is_translate')->default(0)->nullable();
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
        Schema::dropIfExists('carrier_pages');
    }
};

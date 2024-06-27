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
        Schema::create('partnership_details', function (Blueprint $table) {
            $table->id();
            $table->string('title_en')->nullable();
            $table->string('title_tc')->nullable();
            $table->string('title_sc')->nullable();
            $table->string('title1_en')->nullable();
            $table->string('title1_tc')->nullable();
            $table->string('title1_sc')->nullable();
            $table->string('description_en')->nullable();
            $table->string('description_tc')->nullable();
            $table->string('description_sc')->nullable();
            $table->string('link_text_en')->nullable();
            $table->string('link_text_tc')->nullable();
            $table->string('link_text_sc')->nullable();
            $table->string('link')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('partnership_details');
    }
};

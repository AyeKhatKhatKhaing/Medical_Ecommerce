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
        Schema::create('partnership_helps', function (Blueprint $table) {
            $table->id();
            $table->string('help_subtitle_en')->nullable();
            $table->string('help_subtitle_tc')->nullable();
            $table->string('help_subtitle_sc')->nullable();
            $table->string('help_description_en')->nullable();
            $table->string('help_description_tc')->nullable();
            $table->string('help_description_sc')->nullable();
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
        Schema::dropIfExists('partnership_helps');
    }
};

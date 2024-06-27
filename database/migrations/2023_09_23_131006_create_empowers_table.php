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
        Schema::create('empowers', function (Blueprint $table) {
            $table->id();
            $table->string('empower_title_en')->nullable();
            $table->string('empower_title_tc')->nullable();
            $table->string('empower_title_sc')->nullable();
            $table->string('empower_sub_title1_en')->nullable();
            $table->string('empower_sub_title1_tc')->nullable();
            $table->string('empower_sub_title1_sc')->nullable();
            $table->string('empower_text1_en')->nullable();
            $table->string('empower_text1_tc')->nullable();
            $table->string('empower_text1_sc')->nullable();
            $table->string('empower_logo1')->nullable();
            $table->string('empower_sub_title2_en')->nullable();
            $table->string('empower_sub_title2_tc')->nullable();
            $table->string('empower_sub_title2_sc')->nullable();
            $table->string('empower_text2_en')->nullable();
            $table->string('empower_text2_tc')->nullable();
            $table->string('empower_text2_sc')->nullable();
            $table->string('empower_logo2')->nullable();
            $table->string('empower_sub_title3_en')->nullable();
            $table->string('empower_sub_title3_tc')->nullable();
            $table->string('empower_sub_title3_sc')->nullable();
            $table->string('empower_text3_en')->nullable();
            $table->string('empower_text3_tc')->nullable();
            $table->string('empower_text3_sc')->nullable();
            $table->string('empower_logo3')->nullable();
            $table->string('empower_sub_title4_en')->nullable();
            $table->string('empower_sub_title4_tc')->nullable();
            $table->string('empower_sub_title4_sc')->nullable();
            $table->string('empower_text4_en')->nullable();
            $table->string('empower_text4_tc')->nullable();
            $table->string('empower_text4_sc')->nullable();
            $table->string('empower_logo4')->nullable();
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
        Schema::dropIfExists('empowers');
    }
};

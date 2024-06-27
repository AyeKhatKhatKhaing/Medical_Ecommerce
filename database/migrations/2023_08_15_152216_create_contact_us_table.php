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
        Schema::create('contact_us', function (Blueprint $table) {
            $table->id();
            $table->string('email_title_en')->nullable();
            $table->string('email_title_tc')->nullable();
            $table->string('email_title_sc')->nullable();
            $table->string('email')->nullable();
            $table->longText('email_logo')->nullable();
            $table->string('hotline_title_en')->nullable();
            $table->string('hotline_title_tc')->nullable();
            $table->string('hotline_title_sc')->nullable();
            $table->string('hotline')->nullable();
            $table->longText('hotline_logo')->nullable();
            $table->string('whats_up_title_en')->nullable();
            $table->string('whats_up_title_tc')->nullable();
            $table->string('whats_up_title_sc')->nullable();
            $table->string('whats_up')->nullable();
            $table->longText('whats_up_logo')->nullable();
            $table->string('time')->nullable();
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
        Schema::dropIfExists('contact_us');
    }
};

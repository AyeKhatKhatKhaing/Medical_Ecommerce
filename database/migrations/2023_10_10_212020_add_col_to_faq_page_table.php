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
        Schema::table('faq_pages', function (Blueprint $table) {
            //
            $table->string('contact1_en')->nullable();
            $table->string('contact1_tc')->nullable();
            $table->string('contact1_sc')->nullable();

            $table->string('contact2_en')->nullable();
            $table->string('contact2_tc')->nullable();
            $table->string('contact2_sc')->nullable();

            $table->string('contact3_en')->nullable();
            $table->string('contact3_tc')->nullable();
            $table->string('contact3_sc')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('faq_pages', function (Blueprint $table) {
            //
        });
    }
};

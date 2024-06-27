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
        Schema::table('contact_us', function (Blueprint $table) {
            //
            $table->string('meta_title_en')->nullable();
            $table->string('meta_title_tc')->nullable();
            $table->string('meta_title_sc')->nullable();
            $table->longText('meta_description_en')->nullable();
            $table->longText('meta_description_tc')->nullable();
            $table->longText('meta_description_sc')->nullable();
            $table->string('meta_img')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contact_us', function (Blueprint $table) {
            //
        });
    }
};
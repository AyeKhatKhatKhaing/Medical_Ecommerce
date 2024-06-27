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
        Schema::create('merchant_locations', function (Blueprint $table) {
            $table->id();
            $table->integer('area_id')->nullable();
            $table->string('station_name_en')->nullable();
            $table->string('station_name_tc')->nullable();
            $table->string('station_name_sc')->nullable();
            $table->string('full_address_en')->nullable();
            $table->string('full_address_tc')->nullable();
            $table->string('full_address_sc')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->integer('merchant_id')->nullable();
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
        Schema::dropIfExists('merchant_locations');
    }
};

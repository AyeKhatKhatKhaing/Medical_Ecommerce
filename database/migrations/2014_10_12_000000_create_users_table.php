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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name_en')->nullable();
            $table->string('name_sc')->nullable();
            $table->string('name_tc')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->boolean('is_merchant')->default(0)->nullable();
            $table->string('banner_img')->nullable();
            $table->longtext('introduction_en')->nullable();
            $table->longtext('introduction_sc')->nullable();
            $table->longtext('introduction_tc')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('icon')->nullable();
            $table->json('gallery')->nullable();
            $table->string('mrt_station_name_en')->nullable();
            $table->string('mrt_station_name_sc')->nullable();
            $table->string('mrt_station_name_tc')->nullable();
            $table->string('mrt_station_exit_en')->nullable();
            $table->string('mrt_station_exit_sc')->nullable();
            $table->string('mrt_station_exit_tc')->nullable();
            $table->string('opening_hour')->nullable();
            $table->longtext('announcement_en')->nullable();
            $table->longtext('announcement_sc')->nullable();
            $table->longtext('announcement_tc')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};

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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('profile_img')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('dob')->nullable();
            $table->enum('gender',['0','1','2'])->comment('0=>male,1=>female,2=>other')->nullable();
            $table->string('password')->nullable();
            $table->string('referral_code')->nullable();
            $table->string('country')->nullable();
            $table->bigInteger('territory_id')->nullable();
            $table->bigInteger('district_id')->nullable();
            $table->bigInteger('area_id')->nullable();
            $table->bigInteger('total_balance')->nullable();
            $table->tinyInteger('is_blocked')->default(0)->nullable();
            $table->string('activation_code')->nullable();
            $table->tinyInteger('is_verified')->default(0)->nullable();
            $table->string('google_id')->nullable();
            $table->string('facebook_id')->nullable();
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
        Schema::dropIfExists('customers');
    }
};

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
        Schema::create('author', function (Blueprint $table) {
            $table->id();
            $table->string('name_en')->nullable();
            $table->string('name_sc')->nullable();
            $table->string('name_tc')->nullable();
            $table->string('position_en')->nullable();
            $table->string('position_sc')->nullable();
            $table->string('position_tc')->nullable();
            $table->string('desc_en')->nullable();
            $table->string('desc_sc')->nullable();
            $table->string('desc_tc')->nullable();
            $table->string('profile_img')->nullable();
            $table->string('fb_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->tinyInteger('is_published')->default(1)->nullable();
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
        Schema::dropIfExists('author');
    }
};

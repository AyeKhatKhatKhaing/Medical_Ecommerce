<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();

            $table->string('banner_img')->nullable();
            $table->string('banner_title_en')->nullable();
            $table->string('banner_title_tc')->nullable();
            $table->string('banner_title_sc')->nullable();
            $table->longText('banner_description_en')->nullable();
            $table->longText('banner_description_tc')->nullable();
            $table->longText('banner_description_sc')->nullable();

            $table->string('cooperation_img')->nullable();
            $table->string('cooperation_title_en')->nullable();
            $table->string('cooperation_title_tc')->nullable();
            $table->string('cooperation_title_sc')->nullable();
            $table->longText('cooperation_description_en')->nullable();
            $table->longText('cooperation_description_tc')->nullable();
            $table->longText('cooperation_description_sc')->nullable();

            $table->string('group_img')->nullable();
            $table->string('group_title_en')->nullable();
            $table->string('group_title_tc')->nullable();
            $table->string('group_title_sc')->nullable();
            $table->longText('group_description_en')->nullable();
            $table->longText('group_description_tc')->nullable();
            $table->longText('group_description_sc')->nullable();

            $table->longText('mission_and_vision_description_en')->nullable();
            $table->longText('mission_and_vision_description_tc')->nullable();
            $table->longText('mission_and_vision_description_sc')->nullable();

            $table->string('updated_by')->nullable();

            $table->string('meta_title_en')->nullable();
            $table->string('meta_title_tc')->nullable();
            $table->string('meta_title_sc')->nullable();
            $table->longText('meta_description_en')->nullable();
            $table->longText('meta_description_tc')->nullable();
            $table->longText('meta_description_sc')->nullable();
            $table->string('meta_img')->nullable();

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
        Schema::drop('abouts');
    }
}

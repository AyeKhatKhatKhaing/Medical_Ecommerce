<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('onsale_banner_title_en')->nullable();
            $table->string('onsale_banner_title_tc')->nullable();
            $table->string('onsale_banner_title_sc')->nullable();
            $table->string('onsale_banner_img')->nullable();
            $table->string('banner_title_en')->nullable();
            $table->string('banner_title_tc')->nullable();
            $table->string('banner_title_sc')->nullable();
            $table->string('banner_img')->nullable();
            $table->string('banner_img_url')->nullable();
            $table->string('promotion_title_en')->nullable();
            $table->string('promotion_title_tc')->nullable();
            $table->string('promotion_title_sc')->nullable();
            $table->string('promotion_img')->nullable();
            $table->string('member_reward_title_en')->nullable();
            $table->string('member_reward_title_tc')->nullable();
            $table->string('member_reward_title_sc')->nullable();
            $table->json('member_reward_img_en')->nullable();
            $table->json('member_reward_img_tc')->nullable();
            $table->json('member_reward_img_sc')->nullable();
            $table->tinyInteger('is_published')->default(1)->nullable();
            $table->boolean('is_translate')->default(0)->nullable();
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
        Schema::drop('homes');
    }
}

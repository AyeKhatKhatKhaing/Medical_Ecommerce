<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChooseMediqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('choose_mediqs', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('main_title_en')->nullable();
            $table->string('main_title_tc')->nullable();
            $table->string('main_title_sc')->nullable();
            $table->longText('main_content_en')->nullable();
            $table->longText('main_content_tc')->nullable();
            $table->longText('main_content_sc')->nullable();
            $table->string('main_img')->nullable();
            $table->string('main_link')->nullable();
            $table->string('shopping_guide_title_en')->nullable();
            $table->string('shopping_guide_title_tc')->nullable();
            $table->string('shopping_guide_title_sc')->nullable();
            $table->string('shopping_guide_img')->nullable();
            $table->string('quick_start_guide_icon')->nullable();
            $table->string('quick_start_guide_title_en')->nullable();
            $table->string('quick_start_guide_title_tc')->nullable();
            $table->string('quick_start_guide_title_sc')->nullable();
            $table->longText('quick_start_guide_content_en')->nullable();
            $table->longText('quick_start_guide_content_tc')->nullable();
            $table->longText('quick_start_guide_content_sc')->nullable();
            $table->string('quick_start_guide_link')->nullable();
            $table->string('booking_icon')->nullable();
            $table->string('booking_title_en')->nullable();
            $table->string('booking_title_tc')->nullable();
            $table->string('booking_title_sc')->nullable();
            $table->longText('booking_content_en')->nullable();
            $table->longText('booking_content_tc')->nullable();
            $table->longText('booking_content_sc')->nullable();
            $table->string('booking_link')->nullable();
            $table->boolean('is_translate')->default(false);
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
        Schema::drop('choose_mediqs');
    }
}

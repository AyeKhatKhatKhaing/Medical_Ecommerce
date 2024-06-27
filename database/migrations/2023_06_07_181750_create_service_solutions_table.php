<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServiceSolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_solutions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('main_title_en')->nullable();
            $table->string('main_title_tc')->nullable();
            $table->string('main_title_sc')->nullable();
            $table->string('main_sub_title_en')->nullable();
            $table->string('main_sub_title_tc')->nullable();
            $table->string('main_sub_title_sc')->nullable();
            $table->string('img')->nullable();
            $table->string('title_img')->nullable();
            $table->string('title_en')->nullable();
            $table->string('title_tc')->nullable();
            $table->string('title_sc')->nullable();
            $table->string('sub_title_en')->nullable();
            $table->string('sub_title_tc')->nullable();
            $table->string('sub_title_sc')->nullable();
            $table->longText('description_en')->nullable();
            $table->longText('description_tc')->nullable();
            $table->longText('description_sc')->nullable();
            $table->tinyInteger('is_published')->default(1)->nullable();
            $table->boolean('is_translate')->default(false);
            $table->string('updated_by')->nullable();
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
        Schema::drop('service_solutions');
    }
}

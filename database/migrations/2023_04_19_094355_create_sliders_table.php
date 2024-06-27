<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('img')->nullable();
            $table->integer('sort_order')->nullable();
            $table->string('time_setup')->nullable();
            $table->string('video')->nullable();
            $table->enum('slider_type',[0,1])->default(0)->comment('o=>image,i=>video');
            $table->string('page_type')->nullable();
            $table->bigInteger('user_name')->nullable();
            $table->string('link')->nullable();
            $table->boolean('is_published')->default(1)->nullable();
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
        Schema::drop('sliders');
    }
}

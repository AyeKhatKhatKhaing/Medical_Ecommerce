<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMilestoneDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('milestone_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('milestone_id')->nullable();
            $table->string('month_en')->nullable();
            $table->string('month_tc')->nullable();
            $table->string('month_sc')->nullable();
            $table->string('title_en')->nullable();
            $table->string('title_tc')->nullable();
            $table->string('title_sc')->nullable();
            $table->longText('description_en')->nullable();
            $table->longText('description_tc')->nullable();
            $table->longText('description_sc')->nullable();
            $table->string('link')->nullable();
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
        Schema::drop('milestone_details');
    }
}

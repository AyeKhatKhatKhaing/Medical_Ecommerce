<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCarriersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carriers', function (Blueprint $table) {
            $table->id();
            $table->string('name_en')->nullable();
            $table->string('name_sc')->nullable();
            $table->string('name_tc')->nullable();
            $table->string('slug_en')->nullable();
            $table->string('slug_sc')->nullable();
            $table->string('slug_tc')->nullable();
            $table->longText('content_en')->nullable();
            $table->longText('content_sc')->nullable();
            $table->longText('content_tc')->nullable();
            $table->string('img')->nullable();
            $table->integer('department_id')->nullable();
            $table->string('location_en')->nullable();
            $table->string('location_sc')->nullable();
            $table->string('location_tc')->nullable();
            $table->integer('employment_type')->nullable();
            $table->integer('minimum_experience')->nullable();
            $table->integer('sort_by')->nullable();
            $table->tinyInteger('is_published')->default(1)->nullable();
            $table->tinyInteger('is_translate')->default(0)->nullable();
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
        Schema::drop('carriers');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRecommendTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recommend_tags', function (Blueprint $table) {
            $table->id();
            $table->string('name_en')->nullable();
            $table->string('name_tc')->nullable();
            $table->string('name_sc')->nullable();
            $table->string('img')->nullable();
            $table->string('content_en')->nullable();
            $table->string('content_tc')->nullable();
            $table->string('content_sc')->nullable();
            $table->string('updated_by')->nullable();
            $table->softDeletes();
            $table->boolean('is_translate')->default(0)->nullable();
            $table->boolean('is_published')->default(1)->nullable();
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
        Schema::drop('recommend_tags');
    }
}

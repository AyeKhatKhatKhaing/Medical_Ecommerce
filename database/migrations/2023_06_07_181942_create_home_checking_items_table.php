<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHomeCheckingItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_checking_items', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('service_solution_id')->nullable();
            $table->longText('tags')->nullable();
            $table->longText('content_en')->nullable();
            $table->longText('content_tc')->nullable();
            $table->longText('content_sc')->nullable();
            $table->longText('dose_tag')->nullable();
            $table->longText('recommend_tag')->nullable();
            $table->longText('vaccine_factory_tag')->nullable();
            $table->longText('key_item_tag')->nullable();
            $table->longText('highlight_tag')->nullable();
            $table->string('url')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('home_checking_items');
    }
}

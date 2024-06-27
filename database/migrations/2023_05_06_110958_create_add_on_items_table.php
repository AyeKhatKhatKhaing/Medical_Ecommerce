<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAddOnItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_on_items', function (Blueprint $table) {
            $table->id();
            $table->string('name_en')->nullable();
            $table->string('name_tc')->nullable();
            $table->string('name_sc')->nullable();
            $table->integer('merchant')->nullable();
            $table->enum('gender',['0','1','2'])->comment('0=>male,1=>female,2=>other');
            $table->decimal('original_price')->nullable();
            $table->decimal('discount_price')->nullable();
            $table->enum('recommend_item',['0','1'])->comment('0=>Most Popular,1=>Hot');
            $table->longText('description_en')->nullable();
            $table->longText('description_sc')->nullable();
            $table->longText('description_tc')->nullable();
            $table->string('img')->nullable();
            $table->string('updated_by')->nullable();
            $table->tinyInteger('is_published')->default(1)->nullable();
            $table->tinyInteger('is_translate')->default(0)->nullable();
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
        Schema::drop('add_on_items');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRecipientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipients', function (Blueprint $table) {
                $table->id();
                $table->string('location')->nullable();
                $table->date('date')->nullable();
                $table->time('time')->nullable();
                $table->unsignedBigInteger('product_id')->nullable();
                $table->string('is_optional_decide_later')->nullable();
                $table->string('is_add_on_decide_later')->nullable();
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
        Schema::drop('recipients');
    }
}

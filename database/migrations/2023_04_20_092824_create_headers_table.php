<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('headers', function (Blueprint $table) {
            $table->id();
            $table->longText('message_en')->nullable();
            $table->longText('message_tc')->nullable();
            $table->longText('message_sc')->nullable();
            $table->json('slide_text_en')->nullable();
            $table->json('slide_text_tc')->nullable();
            $table->json('slide_text_sc')->nullable();
            $table->longText('content_en');
            $table->longText('content_tc');
            $table->longText('content_sc');
            $table->boolean('is_translate')->default(0)->nullable();
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
        Schema::drop('headers');
    }
}

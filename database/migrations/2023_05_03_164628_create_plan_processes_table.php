<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_processes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('merchant_id')->nullable();
            $table->foreign('merchant_id') ->references('id')->on('users')->onDelete('cascade');
            $table->string('name_en')->nullable();
            $table->string('name_sc')->nullable();
            $table->string('name_tc')->nullable();
            $table->longText('content_en')->nullable();
            $table->longText('content_sc')->nullable();
            $table->longText('content_tc')->nullable();
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
        Schema::dropIfExists('plan_processes');
    }
};

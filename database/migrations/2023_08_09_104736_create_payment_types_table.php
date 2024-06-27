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
        Schema::create('payment_types', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->nullable();
            $table->string('image', 200)->nullable();
            $table->string('description', 400)->nullable();
            $table->tinyInteger('test_mode')->nullable();
            $table->string('publishable_key', 400)->nullable();
            $table->string('secret_key', 400)->nullable();
            $table->string('api_signature', 400)->nullable();
            $table->string('status', 200)->nullable();
            $table->string('developer_status', 200)->nullable();
            $table->integer('weight')->nullable();
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
        Schema::dropIfExists('payment_types');
    }
};

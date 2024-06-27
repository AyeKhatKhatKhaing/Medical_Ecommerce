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
        Schema::create('check_table_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('check_up_table_type_id')->nullable();
            $table->unsignedBigInteger('check_up_type_id')->nullable();
            $table->unsignedBigInteger('check_up_group_id')->nullable();
            $table->unsignedBigInteger('check_up_item_id')->nullable();
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
        Schema::dropIfExists('check_table_items');
    }
};

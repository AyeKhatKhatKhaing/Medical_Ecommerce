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
        Schema::create('check_up_table_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('check_up_table_id')->nullable();
            $table->unsignedBigInteger('check_up_type_id')->nullable();
            $table->unsignedBigInteger('check_up_group_id')->nullable();
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
        Schema::dropIfExists('check_up_table_types');
    }
};

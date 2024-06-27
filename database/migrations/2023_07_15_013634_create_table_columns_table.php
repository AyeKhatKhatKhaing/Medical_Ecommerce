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
        Schema::create('table_columns', function (Blueprint $table) {
            $table->id();
            $table->integer('package_id')->nullable();
            $table->integer('table_title_id')->nullable();
            $table->string('col_name_en')->nullable();
            $table->string('col_name_sc')->nullable();
            $table->string('col_name_tc')->nullable();
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
        Schema::dropIfExists('table_columns');
    }
};

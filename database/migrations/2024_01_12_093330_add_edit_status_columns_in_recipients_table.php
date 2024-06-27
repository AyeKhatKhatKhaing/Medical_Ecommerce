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
        Schema::table('recipients', function (Blueprint $table) {
            $table->tinyInteger('edit_location')->default(0)->nullable();
            $table->tinyInteger('edit_date')->default(0)->nullable();
            $table->tinyInteger('edit_time')->default(0)->nullable();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recipients', function (Blueprint $table) {
            $table->dropColumn('edit_location');
            $table->dropColumn('edit_date');
            $table->dropColumn('edit_time');
        });
    }
};

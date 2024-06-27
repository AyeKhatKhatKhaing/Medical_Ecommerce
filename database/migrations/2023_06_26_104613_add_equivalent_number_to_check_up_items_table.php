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
        Schema::table('check_up_items', function (Blueprint $table) {
            $table->integer('equivalent_number')->nullable()->after('number_of_item');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('check_up_items', function (Blueprint $table) {
             $table->dropColumn('equivalent_number');
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('maritial_status', function (Blueprint $table) {
            $table->renameColumn('name', 'name_en');
            $table->string('name_sc')->nullable();
            $table->string('name_tc')->nullable();
            // DB::statement("UPDATE `maritial_status` SET name_tc='單身的',name_sc='单身的' WHERE id=1;");
            // DB::statement("UPDATE `maritial_status` SET name_tc='已婚',name_sc='已婚' WHERE id=2;");
            // DB::statement("UPDATE `maritial_status` SET name_tc='其他',name_sc='其他' WHERE id=3;");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('maritial_status', function (Blueprint $table) {
            $table->dropColumn('name_sc');
            $table->dropColumn('name_tc');
        });
    }
};

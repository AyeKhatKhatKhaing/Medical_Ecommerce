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
        Schema::table('blood_type', function (Blueprint $table) {
            $table->renameColumn('name', 'name_en');
            $table->string('name_sc')->nullable();
            $table->string('name_tc')->nullable();
            // DB::statement("UPDATE `blood_type` SET name_tc='A型',name_sc='A型' WHERE id=1;");
            // DB::statement("UPDATE `blood_type` SET name_tc='B型',name_sc='B型' WHERE id=2;");
            // DB::statement("UPDATE `blood_type` SET name_tc='AB型',name_sc='AB型' WHERE id=3;");
            // DB::statement("UPDATE `blood_type` SET name_tc='O型',name_sc='O型' WHERE id=4;");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blood_type', function (Blueprint $table) {
            $table->dropColumn('name_sc');
            $table->dropColumn('name_tc');
        });
    }
};

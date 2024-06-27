<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            //
            DB::statement("ALTER TABLE `contacts` CHANGE `contact_description_en` `contact_description_en`  LONGTEXT DEFAULT NULL;");
            DB::statement("ALTER TABLE `contacts` CHANGE `contact_description_tc` `contact_description_tc`  LONGTEXT DEFAULT NULL;");
            DB::statement("ALTER TABLE `contacts` CHANGE `contact_description_sc` `contact_description_sc`  LONGTEXT DEFAULT NULL;");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            //
        });
    }
};

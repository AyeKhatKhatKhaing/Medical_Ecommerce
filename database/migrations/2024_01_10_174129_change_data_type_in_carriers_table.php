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
        Schema::table('carriers', function (Blueprint $table) {
            //
            DB::statement("ALTER TABLE `carriers` CHANGE `minimum_experience_en` `minimum_experience_en`  TEXT DEFAULT NULL;");
            DB::statement("ALTER TABLE `carriers` CHANGE `minimum_experience_tc` `minimum_experience_tc`  TEXT DEFAULT NULL;");
            DB::statement("ALTER TABLE `carriers` CHANGE `minimum_experience_sc` `minimum_experience_sc`  TEXT DEFAULT NULL;");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('carriers', function (Blueprint $table) {
            //
        });
    }
};

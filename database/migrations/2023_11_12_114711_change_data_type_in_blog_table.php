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
        Schema::table('blog', function (Blueprint $table) {
            DB::statement("ALTER TABLE `blog` CHANGE `t_&_c_content_en` `t_and_c_content_en`  LONGTEXT DEFAULT NULL;");
            DB::statement("ALTER TABLE `blog` CHANGE `t_&_c_content_sc` `t_and_c_content_sc`  LONGTEXT DEFAULT NULL;");
            DB::statement("ALTER TABLE `blog` CHANGE `t_&_c_content_tc` `t_and_c_content_tc`  LONGTEXT DEFAULT NULL;");
            // $table->longText("t_and_c_content_en")->change();
            // $table->longText("t_and_c_content_sc")->change();
            // $table->longText("t_and_c_content_tc")->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blog', function (Blueprint $table) {
            //
        });
    }
};

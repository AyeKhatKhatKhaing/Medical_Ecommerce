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
        Schema::table('check_up_groups', function (Blueprint $table) {
            //
            $table->longText('description_en')->nullable()->after('name_tc');
            $table->longText('description_tc')->nullable()->after('name_tc');
            $table->longText('description_sc')->nullable()->after('name_tc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('check_up_groups', function (Blueprint $table) {
            //
            $table->dropColumn('description_en');
            $table->dropColumn('description_tc');
            $table->dropColumn('description_sc');
        });
    }
};

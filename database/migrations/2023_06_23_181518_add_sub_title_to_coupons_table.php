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
        Schema::table('coupons', function (Blueprint $table) {
            $table->string('sub_title_en')->nullable()->after('name_sc');
            $table->string('sub_title_tc')->nullable()->after('sub_title_en');
            $table->string('sub_title_sc')->nullable()->after('sub_title_tc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coupons', function (Blueprint $table) {
            $table->dropColumn('sub_title_en');
            $table->dropColumn('sub_title_tc');
            $table->dropColumn('sub_title_sc');
        });
    }
};

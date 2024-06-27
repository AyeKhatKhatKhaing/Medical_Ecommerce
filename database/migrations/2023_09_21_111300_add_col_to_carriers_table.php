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
        Schema::table('carriers', function (Blueprint $table) {
            //
            $table->renameColumn('location_en', 'location');
            $table->integer('exp_level')->detault(0)->after('location_tc');
            $table->string('minimum_experience_en')->nullable()->after('location_sc');
            $table->string('minimum_experience_tc')->nullable()->after('location_tc');
            $table->string('minimum_experience_sc')->nullable()->after('minimum_experience_tc');
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
            $table->renameColumn('location', 'location_en');
            $table->dropColumn('exp_level');
            $table->dropColumn('minimum_experience_en');
            $table->dropColumn('minimum_experience_tc');
            $table->dropColumn('minimum_experience_sc');
        });
    }
};

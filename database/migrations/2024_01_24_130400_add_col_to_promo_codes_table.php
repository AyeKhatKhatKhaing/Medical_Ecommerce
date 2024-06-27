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
        Schema::table('promo_codes', function (Blueprint $table) {
            $table->string('name_en')->nullable();
            $table->string('name_tc')->nullable();
            $table->string('name_sc')->nullable();
            $table->string('terms_en')->nullable();
            $table->string('terms_tc')->nullable();
            $table->string('terms_sc')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('promo_codes', function (Blueprint $table) {
            $table->dropColumn('name_en');
            $table->dropColumn('name_tc');
            $table->dropColumn('name_sc');
            $table->dropColumn('terms_en');
            $table->dropColumn('terms_tc');
            $table->dropColumn('terms_sc');
        });
    }
};

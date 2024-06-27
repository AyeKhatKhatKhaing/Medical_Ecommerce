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
        Schema::table('merchant_faqs', function (Blueprint $table) {
            $table->longtext('answer_en')->nullable()->change();
            $table->longtext('answer_sc')->nullable()->change();
            $table->longtext('answer_tc')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('merchant_faqs', function (Blueprint $table) {
            $table->dropColumn('answer_en');
            $table->dropColumn('answer_sc');
            $table->dropColumn('answer_sc');
        });
    }
};

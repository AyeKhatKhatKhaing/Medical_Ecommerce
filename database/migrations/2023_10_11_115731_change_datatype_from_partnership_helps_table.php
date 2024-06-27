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
        Schema::table('partnership_helps', function (Blueprint $table) {
            //
            $table->longtext('help_description_en')->nullable()->change();
            $table->longtext('help_description_sc')->nullable()->change();
            $table->longtext('help_description_tc')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('partnership_helps', function (Blueprint $table) {
            //
        });
    }
};

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
        Schema::table('partnership_details', function (Blueprint $table) {
            //
            $table->renameColumn('link', 'link_en');
            $table->string('link_tc')->nullable()->after('link_text_sc');
            $table->string('link_sc')->nullable()->after('link_tc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('partnership_details', function (Blueprint $table) {
            //
        });
    }
};

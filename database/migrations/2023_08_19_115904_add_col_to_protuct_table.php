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
        Schema::table('products', function (Blueprint $table) {
            //
            $table->longText('add_on_reminder_en')->nullable()->after('for_tag_sc');
            $table->longText('add_on_reminder_tc')->nullable()->after('add_on_reminder_en');
            $table->longText('add_on_reminder_sc')->nullable()->after('add_on_reminder_tc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};

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
        Schema::table('office_infos', function (Blueprint $table) {
            //
            $table->renameColumn('address', 'address_en');
            $table->string('address_tc')->nullable()->after('office_name_sc');
            $table->string('address_sc')->nullable()->after('address_tc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('office_infos', function (Blueprint $table) {
            //
        });
    }
};

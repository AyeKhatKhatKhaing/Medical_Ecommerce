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
        Schema::table('relationship_type', function (Blueprint $table) {
            $table->renameColumn('name', 'name_en');
            $table->string('name_tc')->nullable();
            $table->string('name_sc')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('relationship_type', function (Blueprint $table) {
            $table->renameColumn('name_en', 'name');
            $table->dropColumn('name_tc');
            $table->dropColumn('name_sc');
        });
    }
};

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
        Schema::table('blog', function (Blueprint $table) {
            $table->string('source_title_en')->nullable();
            $table->string('source_title_tc')->nullable();
            $table->string('source_title_sc')->nullable();
            $table->string('source_title_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blog', function (Blueprint $table) {
            $table->dropColumn('source_title_en');
            $table->dropColumn('source_title_tc');
            $table->dropColumn('source_title_sc');
            $table->dropColumn('source_title_link');
        });
    }
};

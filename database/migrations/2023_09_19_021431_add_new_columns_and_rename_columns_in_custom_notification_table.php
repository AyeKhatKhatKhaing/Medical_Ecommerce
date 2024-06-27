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
        Schema::table('custom_notification', function (Blueprint $table) {
            $table->renameColumn('title', 'title_en');
            $table->renameColumn('description', 'description_en');
            $table->string('title_tc')->nullable();
            $table->string('title_sc')->nullable();
            $table->string('description_tc')->nullable();
            $table->string('description_sc')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('custom_notification', function (Blueprint $table) {
            $table->renameColumn('title_en', 'title');
            $table->renameColumn('description_en', 'description');
            $table->dropColumn('title_tc');
            $table->dropColumn('title_sc');
            $table->dropColumn('description_tc');
            $table->dropColumn('description_sc');
        });
    }
};

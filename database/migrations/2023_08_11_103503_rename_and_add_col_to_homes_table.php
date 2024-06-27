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
        Schema::table('homes', function (Blueprint $table) {
            //
            $table->renameColumn('banner_img', 'banner_img_en');
            $table->string('banner_img_tc')->nullable()->after('banner_title_sc');
            $table->string('banner_img_sc')->nullable()->after('banner_img_tc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('homes', function (Blueprint $table) {
            //
            // $table->string('banner_img_tc');
            // $table->string('banner_img_sc');
        });
    }
};

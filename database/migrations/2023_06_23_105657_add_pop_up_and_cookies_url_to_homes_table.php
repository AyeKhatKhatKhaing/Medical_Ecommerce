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
            $table->string('popup_img_en')->nullable()->after('member_reward_img_sc');
            $table->string('popup_img_tc')->nullable()->after('popup_img_en');
            $table->string('popup_img_sc')->nullable()->after('popup_img_tc');
            $table->string('popup_img_url')->nullable()->after('popup_img_sc');
            $table->longText('cookies_text_en')->nullable()->after('popup_img_url');
            $table->longText('cookies_text_tc')->nullable()->after('cookies_text_en');
            $table->longText('cookies_text_sc')->nullable()->after('cookies_text_tc');

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
            $table->dropColumn('popup_img_en');
            $table->dropColumn('popup_img_tc');
            $table->dropColumn('popup_img_sc');
            $table->dropColumn('popup_img_url');
            $table->dropColumn('cookies_text_en');
            $table->dropColumn('cookies_text_tc');
            $table->dropColumn('cookies_text_sc');
        });
    }
};

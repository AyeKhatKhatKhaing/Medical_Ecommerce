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
        Schema::table('abouts', function (Blueprint $table) {
            //
            $table->string('cooperation_link_text1_en')->nullable();
            $table->string('cooperation_link_text1_tc')->nullable();
            $table->string('cooperation_link_text1_sc')->nullable();
            $table->string('cooperation_link1')->nullable();
            $table->string('cooperation_link_text2_en')->nullable();
            $table->string('cooperation_link_text2_tc')->nullable();
            $table->string('cooperation_link_text2_sc')->nullable();
            $table->string('cooperation_link2')->nullable();
            $table->string('group_link_text1_en')->nullable();
            $table->string('group_link_text1_tc')->nullable();
            $table->string('group_link_text1_sc')->nullable();
            $table->string('group_link1')->nullable();
            $table->string('rewards_title_en')->nullable();
            $table->string('rewards_title_tc')->nullable();
            $table->string('rewards_title_sc')->nullable();
            $table->json('rewords_img')->nullable();
            $table->string('footer_img1')->nullable();
            $table->string('footer_img2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('abouts', function (Blueprint $table) {
            //
            $table->dropColumn('cooperation_link_text1_en');
            $table->dropColumn('cooperation_link_text1_tc');
            $table->dropColumn('cooperation_link_text1_sc');
            $table->dropColumn('cooperation_link1');
            $table->dropColumn('cooperation_link_text2_en');
            $table->dropColumn('cooperation_link_text2_tc');
            $table->dropColumn('cooperation_link_text2_sc');
            $table->dropColumn('cooperation_link2');
            $table->dropColumn('group_link_text1_en');
            $table->dropColumn('group_link_text1_tc');
            $table->dropColumn('group_link_text1_sc');
            $table->dropColumn('group_link1');
            $table->dropColumn('rewards_title_en');
            $table->dropColumn('rewards_title_tc');
            $table->dropColumn('rewards_title_sc');
            $table->dropColumn('rewords_img');
            $table->dropColumn('footer_img1');
            $table->dropColumn('footer_img2');
        });
    }
};

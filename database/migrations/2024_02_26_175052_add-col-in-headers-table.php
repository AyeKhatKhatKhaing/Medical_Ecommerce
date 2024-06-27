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
        Schema::table('headers', function (Blueprint $table) {
            //
            $table->string('quick_start_gudie_text_en')->nullable()->after('content_en');
            $table->string('quick_start_gudie_text_tc')->nullable()->after('quick_start_gudie_text_en');
            $table->string('quick_start_gudie_text_sc')->nullable()->after('quick_start_gudie_text_tc');
            $table->string('quick_start_gudie_link_en')->nullable()->after('quick_start_gudie_text_sc');
            $table->string('quick_start_gudie_link_tc')->nullable()->after('quick_start_gudie_link_en');
            $table->string('quick_start_gudie_link_sc')->nullable()->after('quick_start_gudie_link_tc');

            $table->string('help_center_text_en')->nullable()->after('quick_start_gudie_link_sc');
            $table->string('help_center_text_tc')->nullable()->after('help_center_text_en');
            $table->string('help_center_text_sc')->nullable()->after('help_center_text_tc');
            $table->string('help_center_link_en')->nullable()->after('help_center_text_sc');
            $table->string('help_center_link_tc')->nullable()->after('help_center_link_en');
            $table->string('help_center_link_sc')->nullable()->after('help_center_link_tc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('headers', function (Blueprint $table) {
            //
        });
    }
};

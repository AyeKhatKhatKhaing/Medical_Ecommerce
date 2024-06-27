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
        Schema::table('choose_mediqs', function (Blueprint $table) {
            //
            $table->renameColumn('main_link', 'main_link_en');
            $table->string('main_link_tc')->nullable()->after('main_img');
            $table->string('main_link_sc')->nullable()->after('main_link_tc');

            $table->renameColumn('quick_start_guide_link', 'quick_start_guide_link_en');
            $table->string('quick_start_guide_link_tc')->nullable()->after('quick_start_guide_icon');
            $table->string('quick_start_guide_link_sc')->nullable()->after('quick_start_guide_link_tc');

            $table->renameColumn('booking_link', 'booking_link_en');
            $table->string('booking_link_tc')->nullable()->after('booking_icon');
            $table->string('booking_link_sc')->nullable()->after('booking_link_tc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('choose_mediqs', function (Blueprint $table) {
            //
        });
    }
};

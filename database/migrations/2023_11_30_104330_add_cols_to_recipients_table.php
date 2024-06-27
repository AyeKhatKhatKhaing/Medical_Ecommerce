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
        Schema::table('recipients', function (Blueprint $table) {
            $table->tinyInteger('have_referral')->nullable()->after('confirm_booking_time');
            $table->string('file_upload')->nullable()->after('have_referral');
            $table->longText('message')->nullable()->after('file_upload');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recipients', function (Blueprint $table) {
            $table->dropColumn('have_referral');
            $table->dropColumn('file_upload');
            $table->dropColumn('message');
        });
    }
};

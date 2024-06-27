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
        Schema::table('products', function (Blueprint $table) {
            $table->longText('recipient_content_en')->nullable()->after('add_on_reminder_sc');
            $table->longText('recipient_content_tc')->nullable()->after('recipient_content_en');
            $table->longText('recipient_content_sc')->nullable()->after('recipient_content_tc');
            $table->longText('package_reminder_en')->nullable()->after('recipient_content_sc');
            $table->longText('package_reminder_tc')->nullable()->after('package_reminder_en');
            $table->longText('package_reminder_sc')->nullable()->after('package_reminder_tc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('recipient_content_en');
            $table->dropColumn('recipient_content_tc');
            $table->dropColumn('recipient_content_sc');
            $table->dropColumn('package_reminder_en');
            $table->dropColumn('package_reminder_tc');
            $table->dropColumn('package_reminder_sc');
        });
    }
};

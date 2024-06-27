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
        Schema::table('coupon_banner', function (Blueprint $table) {
            $table->string('birthday_img')->nullable()->after('img');
            $table->string('welcome_img')->nullable()->after('birthday_img');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coupon_banner', function (Blueprint $table) {
            $table->dropColumn('birthday_img');
            $table->dropColumn('welcome_img');
        });
    }
};

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
        Schema::table('coupon_collects', function (Blueprint $table) {
            $table->integer('limit_pickup_day')->nullable()->after('bundle_coupon_id');
            $table->integer('limit_per_member')->nullable()->after('limit_pickup_day');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coupon_collects', function (Blueprint $table) {
            // $table->dropColumn('limit_pickup_day');
            // $table->dropColumn('limit_per_member');
        });
    }
};

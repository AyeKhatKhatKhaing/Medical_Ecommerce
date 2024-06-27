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
        Schema::table('coupons', function (Blueprint $table) {
            Schema::table('coupons', function (Blueprint $table) {
                $table->renameColumn('coupon_value_type', 'is_new_or_limited');
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coupons', function (Blueprint $table) {
            Schema::table('coupons', function (Blueprint $table) {
                $table->renameColumn('is_new_or_limited', 'coupon_value_type');
            });
        });
    }
};

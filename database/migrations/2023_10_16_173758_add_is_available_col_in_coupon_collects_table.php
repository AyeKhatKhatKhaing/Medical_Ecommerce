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
            $table->boolean('is_available')->default(1)->nullable()->after('limit_per_member');
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
            $table->dropColumn('is_available');
        });
    }
};

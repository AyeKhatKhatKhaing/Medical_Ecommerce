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
        Schema::table('customers', function (Blueprint $table) {
            $table->string('user_name')->nullable()->after('last_name');
            $table->string('title_full_name')->nullable()->after('user_name');
            $table->string('full_name')->nullable()->after('title_full_name');
            $table->string('address')->nullable()->after('phone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn('user_name');
            $table->dropColumn('title_full_name');
            $table->dropColumn('full_name');
            $table->dropColumn('address');
        });
    }
};

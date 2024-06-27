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
        Schema::table('packages', function (Blueprint $table) {
            $table->unsignedBigInteger('merchant_id')->nullable()->after('content_sc');
            $table->string('sku')->nullable()->after('merchant_id');
            $table->integer('number_of_item')->nullable()->after('sku');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->dropColumn('merchant_id');
            $table->dropColumn('sku');
            $table->dropColumn('number_of_item');

        });
    }
};

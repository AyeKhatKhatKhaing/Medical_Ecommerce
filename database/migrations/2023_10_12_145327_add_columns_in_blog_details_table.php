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
        Schema::table('blog_details', function (Blueprint $table) {
            $table->renameColumn('merchant_banner_img_en', 'merchant_banner_img');
            $table->string('product_ids')->nullable();
            $table->string('coupon_ids')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blog_details', function (Blueprint $table) {
            $table->renameColumn('merchant_banner_img', 'merchant_banner_img_en');
            $table->dropColumn('product_ids');
            $table->dropColumn('coupon_ids');
        });
    }
};

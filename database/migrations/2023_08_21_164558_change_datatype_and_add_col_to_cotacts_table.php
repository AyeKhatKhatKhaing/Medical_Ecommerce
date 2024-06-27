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
        Schema::table('contacts', function (Blueprint $table) {
            //
            $table->longText('contact_us_footer_img1')->nullable()->after('payment_method2_description_sc');
            $table->longText('contact_us_footer_img2')->nullable()->after('contact_us_footer_img1');
            $table->longText('contact_us_footer_img3')->nullable()->after('contact_us_footer_img2');
            $table->longText('contact_us_header_img')->nullable()->after('contact_us_footer_img3');
            $table->longText('online_payment')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            //
        });
    }
};

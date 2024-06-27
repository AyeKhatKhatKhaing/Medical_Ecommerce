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
        Schema::table('footers', function (Blueprint $table) {
            //
            $table->longText('about_content_mobile_en')->nullable()->after('about_content_sc');
            $table->longText('about_content_mobile_tc')->nullable()->after('about_content_mobile_en');
            $table->longText('about_content_mobile_sc')->nullable()->after('about_content_mobile_tc');

            $table->longText('service_content_mobile_en')->nullable()->after('service_content_sc');
            $table->longText('service_content_mobile_tc')->nullable()->after('service_content_mobile_en');
            $table->longText('service_content_mobile_sc')->nullable()->after('service_content_mobile_tc');

            $table->longText('membership_content_mobile_en')->nullable()->after('membership_content_sc');
            $table->longText('membership_content_mobile_tc')->nullable()->after('membership_content_mobile_en');
            $table->longText('membership_content_mobile_sc')->nullable()->after('membership_content_mobile_tc');

            $table->longText('payment_content_mobile_en')->nullable()->after('payment_content_sc');
            $table->longText('payment_content_mobile_tc')->nullable()->after('payment_content_mobile_en');
            $table->longText('payment_content_mobile_sc')->nullable()->after('payment_content_mobile_tc');

        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('footers', function (Blueprint $table) {
            //
        });
    }
};

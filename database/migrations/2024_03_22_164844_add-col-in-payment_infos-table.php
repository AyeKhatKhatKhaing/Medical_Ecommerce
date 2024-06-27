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
        Schema::table('payment_infos', function (Blueprint $table) {
            //

            $table->string('bank4_logo')->nullable()->after('bank3_info_sc');
            $table->longText('bank4_name_en')->nullable()->after('bank4_logo');
            $table->longText('bank4_name_tc')->nullable()->after('bank4_name_en');;
            $table->longText('bank4_name_sc')->nullable()->after('bank4_name_tc');;
            $table->longText('bank4_info_en')->nullable()->after('bank4_name_sc');;
            $table->longText('bank4_info_tc')->nullable()->after('bank4_info_en');;
            $table->longText('bank4_info_sc')->nullable()->after('bank4_info_tc');;
            $table->string('checkout_3_title_en')->nullable()->after('bank4_info_sc');
            $table->string('checkout_3_title_tc')->nullable()->after('checkout_3_title_en');
            $table->string('checkout_3_title_sc')->nullable()->after('checkout_3_title_tc');
            $table->longText('checkout_3_desc_en')->nullable()->after('checkout_3_title_sc');
            $table->longText('checkout_3_desc_tc')->nullable()->after('checkout_3_desc_en');
            $table->longText('checkout_3_desc_sc')->nullable()->after('checkout_3_desc_tc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payment_infos', function (Blueprint $table) {
            //
        });
    }
};

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
            $table->json('online_payment_img')->nullable()->after('online_payment');
            $table->string('contact_title_en')->nullable()->after('online_payment_img');
            $table->string('contact_title_tc')->nullable()->after('contact_title_en');
            $table->string('contact_title_sc')->nullable()->after('contact_title_tc');
            $table->string('contact_img')->nullable()->after('contact_title_sc');
            $table->string('contact_description_en')->nullable()->after('contact_img');
            $table->string('contact_description_tc')->nullable()->after('contact_description_en');
            $table->string('contact_description_sc')->nullable()->after('contact_description_tc');

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

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
        Schema::table('product_enquiry_forms', function (Blueprint $table) {
            
            $table->unsignedBigInteger('product_enquiry_id')->unsigned()->after('id');
            //$table->foreign('product_enquiry_id')->references('id')->on('product_enquiries');

            $table->string('booking_id')->nullable()->after('customer_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_enquiry_forms', function (Blueprint $table) {
            $table->dropColumn('product_enquiry_id');
            $table->dropColumn('booking_id');
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('help1_icon')->nullable();
            $table->string('help1_name_en')->nullable();
            $table->string('help1_name_tc')->nullable();
            $table->string('help1_name_sc')->nullable();
            $table->longText('help1_description_en')->nullable();
            $table->longText('help1_description_tc')->nullable();
            $table->longText('help1_description_sc')->nullable();
            $table->string('help1_link')->nullable();
            $table->string('help1_link_text')->nullable();
            $table->string('help2_icon')->nullable();
            $table->string('help2_name_en')->nullable();
            $table->string('help2_name_tc')->nullable();
            $table->string('help2_name_sc')->nullable();
            $table->longText('help2_description_en')->nullable();
            $table->longText('help2_description_tc')->nullable();
            $table->longText('help2_description_sc')->nullable();
            $table->string('help2_link')->nullable();
            $table->string('help2_link_text')->nullable();
            $table->string('help3_icon')->nullable();
            $table->string('help3_name_en')->nullable();
            $table->string('help3_name_tc')->nullable();
            $table->string('help3_name_sc')->nullable();
            $table->longText('help3_description_en')->nullable();
            $table->longText('help3_description_tc')->nullable();
            $table->longText('help3_description_sc')->nullable();
            $table->string('help3_link')->nullable();
            $table->string('help3_link_text')->nullable();
            $table->string('online_payment')->nullable();
            $table->string('office_photo')->nullable();
            $table->string('payment_method1_icon')->nullable();
            $table->string('payment_method1_name_en')->nullable();
            $table->string('payment_method1_name_tc')->nullable();
            $table->string('payment_method1_name_sc')->nullable();
            $table->longText('payment_method1_description_en')->nullable();
            $table->longText('payment_method1_description_tc')->nullable();
            $table->longText('payment_method1_description_sc')->nullable();
            $table->string('payment_method2_icon')->nullable();
            $table->string('payment_method2_name_en')->nullable();
            $table->string('payment_method2_name_tc')->nullable();
            $table->string('payment_method2_name_sc')->nullable();
            $table->longText('payment_method2_description_en')->nullable();
            $table->longText('payment_method2_description_tc')->nullable();
            $table->longText('payment_method2_description_sc')->nullable();
            $table->timestamps();
            $table->softDeletes();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contacts');
    }
}

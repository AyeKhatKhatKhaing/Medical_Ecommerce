<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFootersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->longText('about_content_en')->nullable();
            $table->longText('about_content_tc')->nullable();
            $table->longText('about_content_sc')->nullable();

            $table->longText('service_content_en')->nullable();
            $table->longText('service_content_tc')->nullable();
            $table->longText('service_content_sc')->nullable();

            $table->longText('membership_content_en')->nullable();
            $table->longText('membership_content_tc')->nullable();
            $table->longText('membership_content_sc')->nullable();

            $table->longText('payment_content_en')->nullable();
            $table->longText('payment_content_tc')->nullable();
            $table->longText('payment_content_sc')->nullable();

            $table->longText('transaction_content_en')->nullable();
            $table->longText('transaction_content_tc')->nullable();
            $table->longText('transaction_content_sc')->nullable();

            $table->longText('content_en')->nullable();
            $table->longText('content_tc')->nullable();
            $table->longText('content_sc')->nullable();
            $table->json('img_gallery')->nullable();
            $table->boolean('is_translate')->default(0)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('footers');
    }
}

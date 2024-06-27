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
        Schema::create('payment_infos', function (Blueprint $table) {
            $table->id();
            $table->string('bank1_logo')->nullable();
            $table->longText('bank1_name_en')->nullable();
            $table->longText('bank1_name_tc')->nullable();
            $table->longText('bank1_name_sc')->nullable();
            $table->longText('bank1_info_en')->nullable();
            $table->longText('bank1_info_tc')->nullable();
            $table->longText('bank1_info_sc')->nullable();
            $table->string('bank2_logo')->nullable();
            $table->longText('bank2_name_en')->nullable();
            $table->longText('bank2_name_tc')->nullable();
            $table->longText('bank2_name_sc')->nullable();
            $table->longText('bank2_info_en')->nullable();
            $table->longText('bank2_info_tc')->nullable();
            $table->longText('bank2_info_sc')->nullable();
            $table->string('bank3_logo')->nullable();
            $table->longText('bank3_name_en')->nullable();
            $table->longText('bank3_name_tc')->nullable();
            $table->longText('bank3_name_sc')->nullable();
            $table->longText('bank3_info_en')->nullable();
            $table->longText('bank3_info_tc')->nullable();
            $table->longText('bank3_info_sc')->nullable();
            $table->boolean('is_translate')->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_infos');
    }
};

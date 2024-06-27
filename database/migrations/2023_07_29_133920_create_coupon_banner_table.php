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
        Schema::create('coupon_banner', function (Blueprint $table) {
            $table->id();
            $table->string('name_en')->nullable();
            $table->string('name_tc')->nullable();
            $table->string('name_sc')->nullable();
            $table->longText('description_en')->nullable();
            $table->longText('description_sc')->nullable();
            $table->longText('description_tc')->nullable();
            $table->string('img')->nullable();
            $table->string('updated_by')->nullable();
            $table->tinyInteger('is_published')->default(1)->nullable();
            $table->tinyInteger('is_translate')->default(0)->nullable();
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
        Schema::dropIfExists('coupon_banner');
    }
};

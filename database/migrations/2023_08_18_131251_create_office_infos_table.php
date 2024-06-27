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
        Schema::create('office_infos', function (Blueprint $table) {
            $table->id();
            $table->string('office_name_en')->nullable();
            $table->string('office_name_tc')->nullable();
            $table->string('office_name_sc')->nullable();
            $table->longText('address')->nullable();
            $table->json('image')->nullable();
            $table->longText('location')->nullable();
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
        Schema::dropIfExists('office_infos');
    }
};

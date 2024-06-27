<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCarrierDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrier_departments', function (Blueprint $table) {
                $table->id();
                $table->string('name_en')->nullable();
                $table->string('name_sc')->nullable();
                $table->string('name_tc')->nullable();
                $table->tinyInteger('is_published')->default(1)->nullable();
                $table->tinyInteger('is_translate')->default(0)->nullable();
                $table->string('updated_by')->nullable();
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
        Schema::drop('carrier_departments');
    }
}

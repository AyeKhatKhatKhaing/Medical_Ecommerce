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
        Schema::create('health_record', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('family_member_id')->nullable();
            $table->unsignedBigInteger('blood_type_id')->nullable();
            $table->unsignedBigInteger('maritial_status_id')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->tinyInteger('drinking')->default(0)->nullable();
            $table->unsignedBigInteger('main_type_of_alcohol_id')->nullable();
            $table->unsignedBigInteger('amount_of_alcohol_drinking_id')->nullable();
            $table->string('drinking_age')->nullable();
            $table->tinyInteger('smoking')->default(0)->nullable();
            $table->string('smoking_age')->nullable();
            $table->string('no_of_cigarettes_per_day_stick')->default(0)->nullable();
            $table->tinyInteger('liver_function')->default(0)->nullable();
            $table->string('input_abnormal_liver_function_index')->default(0)->nullable();
            $table->tinyInteger('renal_function')->default(0)->nullable();
            $table->string('input_abnormal_renal_function_index')->default(0)->nullable();
            $table->tinyInteger('personal_medicial_history')->default(0)->nullable();
            $table->string('personal_medicial_history_list')->nullable();
            $table->tinyInteger('family_medicial_history')->default(0)->nullable();
            $table->string('family_medicial_history_list')->nullable();
            $table->tinyInteger('allergic_history')->default(0)->nullable();
            $table->string('allergic_history_list')->nullable();
            $table->tinyInteger('is_published')->default(1)->nullable();
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
        Schema::dropIfExists('health_record');
    }
};

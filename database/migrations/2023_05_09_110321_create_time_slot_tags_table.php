<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTimeSlotTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_slot_tags', function (Blueprint $table) {
            $table->id();
            $table->string('name_en')->nullable();
            $table->string('name_tc')->nullable();
            $table->string('name_sc')->nullable();
            $table->longText('content_en')->nullable();
            $table->longText('content_tc')->nullable();
            $table->longText('content_sc')->nullable();
            $table->longText('remind_notice_en')->nullable();
            $table->longText('remind_notice_tc')->nullable();
            $table->longText('remind_notice_sc')->nullable();
            $table->string('img')->nullable();
            $table->string('updated_by')->nullable();
            $table->boolean('is_translate')->default(0)->nullable();
            $table->boolean('is_published')->default(1)->nullable();
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
        Schema::drop('time_slot_tags');
    }
}

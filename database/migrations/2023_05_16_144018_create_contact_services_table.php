<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_services', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_tc')->nullable();
            $table->string('name_sc')->nullable();
            $table->longText('description_en')->nullable();
            $table->longText('description_tc')->nullable();
            $table->longText('description_sc')->nullable();
            $table->string('link')->nullable();
            $table->string('link_text')->nullable();
            $table->boolean('is_published')->default(1)->nullable();
            $table->boolean('is_translate')->default(0)->nullable();
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
        Schema::drop('contact_services');
    }
}

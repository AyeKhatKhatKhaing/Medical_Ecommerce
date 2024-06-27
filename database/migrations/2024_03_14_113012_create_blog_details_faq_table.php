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
        Schema::create('blog_details_faq', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('blog_details_id');
            $table->string('question_en')->nullable();
            $table->string('question_tc')->nullable();
            $table->string('question_sc')->nullable();
            $table->longText('answer_en')->nullable();
            $table->longText('answer_tc')->nullable();
            $table->longText('answer_sc')->nullable();
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
        Schema::dropIfExists('blog_details_faq');
    }
};

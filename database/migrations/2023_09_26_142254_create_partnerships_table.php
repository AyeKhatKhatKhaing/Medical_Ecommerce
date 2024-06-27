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
        Schema::create('partnerships', function (Blueprint $table) {
            $table->id();
            $table->string('banner_img')->nullable();
            $table->string('banner_title_en')->nullable();
            $table->string('banner_title_tc')->nullable();
            $table->string('banner_title_sc')->nullable();
            $table->text('banner_description_en')->nullable();
            $table->text('banner_description_tc')->nullable();
            $table->text('banner_description_sc')->nullable();

            $table->string('benefit_title_en')->nullable();
            $table->string('benefit_title_tc')->nullable();
            $table->string('benefit_title_sc')->nullable();

            $table->string('benefit1_img')->nullable();
            $table->string('benefit_text1_en')->nullable();
            $table->string('benefit_text1_tc')->nullable();
            $table->string('benefit_text1_sc')->nullable();

            $table->string('benefit2_img')->nullable();
            $table->string('benefit_text2_en')->nullable();
            $table->string('benefit_text2_tc')->nullable();
            $table->string('benefit_text2_sc')->nullable();

            $table->string('benefit3_img')->nullable();
            $table->string('benefit_text3_en')->nullable();
            $table->string('benefit_text3_tc')->nullable();
            $table->string('benefit_text3_sc')->nullable();

          
            $table->string('help_title_en')->nullable();
            $table->string('help_title_tc')->nullable();
            $table->string('help_title_sc')->nullable();

            $table->string('three_step_title_en')->nullable();
            $table->string('three_step_title_tc')->nullable();
            $table->string('three_step_title_sc')->nullable();
            
            $table->string('three_step_text_en')->nullable();
            $table->string('three_step_text_tc')->nullable();
            $table->string('three_step_text_sc')->nullable();


            $table->string('step1_title_en')->nullable();
            $table->string('step1_title_tc')->nullable();
            $table->string('step1_title_sc')->nullable();
            $table->string('step1_description_en')->nullable();
            $table->string('step1_description_tc')->nullable();
            $table->string('step1_description_sc')->nullable();
            $table->string('step1_img')->nullable();
        
            $table->string('step2_title_en')->nullable();
            $table->string('step2_title_tc')->nullable();
            $table->string('step2_title_sc')->nullable();
            $table->string('step2_description_en')->nullable();
            $table->string('step2_description_tc')->nullable();
            $table->string('step2_description_sc')->nullable();
            $table->string('step2_img')->nullable();

            $table->string('step3_title_en')->nullable();
            $table->string('step3_title_tc')->nullable();
            $table->string('step3_title_sc')->nullable();
            $table->string('step3_description_en')->nullable();
            $table->string('step3_description_tc')->nullable();
            $table->string('step3_description_sc')->nullable();
            $table->string('step3_img')->nullable();
        
            $table->string('contact_us_text1_en')->nullable();
            $table->string('contact_us_text1_tc')->nullable();
            $table->string('contact_us_text1_sc')->nullable();
            $table->string('contact_us_text2_en')->nullable();
            $table->string('contact_us_text2_tc')->nullable();
            $table->string('contact_us_text2_sc')->nullable();
            $table->string('contact_us_img')->nullable();

            $table->integer('percent')->nullable()->default(0);
            $table->string('percent_text_en')->nullable();
            $table->string('percent_text_tc')->nullable();
            $table->string('percent_text_sc')->nullable();

            $table->boolean('is_translate')->default(0)->nullable();
    
            $table->string('meta_title_en')->nullable();
            $table->string('meta_title_tc')->nullable();
            $table->string('meta_title_sc')->nullable();
            $table->text('meta_description_en')->nullable();
            $table->text('meta_description_tc')->nullable();
            $table->text('meta_description_sc')->nullable();
            $table->string('meta_img')->nullable();
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
        Schema::dropIfExists('partnerships');
    }
};

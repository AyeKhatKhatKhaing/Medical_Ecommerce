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
        Schema::table('home_checking_items', function (Blueprint $table) {
            // 
            $table->string('title_en')->nullable()->after("service_solution_id");
            $table->string('title_tc')->nullable()->after("title_en");
            $table->string('title_sc')->nullable()->after("title_tc");
            $table->longText('sub_category')->nullable()->after("key_item_tag");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('home_checking_items', function (Blueprint $table) {
            //
        });
    }
};

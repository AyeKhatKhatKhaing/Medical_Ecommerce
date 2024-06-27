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
        Schema::table('blog_details', function (Blueprint $table) {
            $table->longText('desc_en')->change();
            $table->longText('desc_sc')->change();
            $table->longText('desc_tc')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blog_details', function (Blueprint $table) {
            //
        });
    }
};
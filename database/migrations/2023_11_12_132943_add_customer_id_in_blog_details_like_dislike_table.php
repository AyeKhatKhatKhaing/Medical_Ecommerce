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
        Schema::table('blog_details_like_dislike', function (Blueprint $table) {
            $table->integer('customer_id');
            $table->renameColumn("yes_count","like");
            $table->renameColumn("no_count","dislike");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blog_details_like_dislike', function (Blueprint $table) {
            //
        });
    }
};

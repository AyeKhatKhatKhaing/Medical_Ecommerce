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
        Schema::table('blog_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('blog_category_id')->after('name_tc')->nullable();
            $table->foreign('blog_category_id')->references('id')->on('blog_category')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blog_tag', function (Blueprint $table) {
            $table->dropColumn('blog_category_id');
        });
    }
};

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
            $table->string('key_item_ids')->nullable();
            $table->string('highlight_tag_ids')->nullable();
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
            $table->dropColumn('key_item_ids');
            $table->dropColumn('highlight_tag_ids');
        });
    }
};

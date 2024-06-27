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
        Schema::table('recipient_items', function (Blueprint $table) {
            $table->renameColumn('main_optional_item_id', 'check_up_group_id');
            $table->renameColumn('optional_item_id', 'check_up_item_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recipient_items', function (Blueprint $table) {
            $table->renameColumn('check_up_group_id', 'main_optional_item_id');
            $table->renameColumn('check_up_item_id', 'optional_item_id');
        });
    }
};

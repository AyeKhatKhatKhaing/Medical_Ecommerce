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
        Schema::table('family_members', function (Blueprint $table) {
            $table->unsignedBigInteger('relationship_type_id');
            $table->string('id_type')->nullable();
            $table->string('id_number')->nullable();
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
        Schema::table('family_members', function (Blueprint $table) {
            $table->dropColumn('relationship_type_id');
            $table->dropColumn('id_type');
            $table->dropColumn('id_number');
            $table->dropSoftDeletes();
        });
    }
};

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
        Schema::table('product_images', function (Blueprint $table) {
            $table->renameColumn('product_id', 'type_id');
            $table->string('image_type')->nullable()->after('id');
            $table->json('common_area')->nullable()->after('img');
            $table->json('video')->nullable()->after('common_area');
            $table->json('services_facilities')->nullable()->after('video');
            $table->json('other')->nullable()->after('services_facilities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_images', function (Blueprint $table) {
            $table->dropColumn('image_type');
            $table->dropColumn('common_area');
            $table->dropColumn('video');
            $table->dropColumn('services_facilities');
            $table->dropColumn('other');
        });
    }
};

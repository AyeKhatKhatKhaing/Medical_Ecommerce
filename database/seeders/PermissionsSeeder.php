<?php

namespace Database\Seeders;
use Carbon\Carbon;

use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Permission::create([
            'id'=>1,
            'label'=>'create',
            'name' => 'create',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        \App\Models\Permission::create([
            'id'=>2,
            'label'=>'edit',
            'name' => 'edit',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        \App\Models\Permission::create([
            'id'=>3,
            'label'=>'delete',
            'name' => 'delete',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}

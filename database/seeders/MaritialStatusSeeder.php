<?php

namespace Database\Seeders;

use App\Models\MaritialStatus;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MaritialStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        MaritialStatus::create([
            'name' => 'Single'
        ]);
        MaritialStatus::create([
            'name' => 'Married'
        ]);
        MaritialStatus::create([
            'name' => 'Other'
        ]);
    }
}

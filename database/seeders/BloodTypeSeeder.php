<?php

namespace Database\Seeders;

use App\Models\BloodType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BloodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        BloodType::create([
            'name' => 'Type A'
        ]);
        BloodType::create([
            'name' => 'Type B'
        ]);
        BloodType::create([
            'name' => 'Type AB'
        ]);
        BloodType::create([
            'name' => 'Type O'
        ]);
    }
}

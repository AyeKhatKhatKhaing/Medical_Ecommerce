<?php

namespace Database\Seeders;

use App\Models\AllergicDisease;
use App\Models\Disease;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AllergicDiseaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        AllergicDisease::create([
            'name' => 'Animal dander'
        ]);
        AllergicDisease::create([
            'name' => 'Dust mites'
        ]);
        AllergicDisease::create([
            'name' => 'Eggs'
        ]);
        AllergicDisease::create([
            'name' => 'Seafood'
        ]);
        AllergicDisease::create([
            'name' => 'Antibotics'
        ]);
        AllergicDisease::create([
            'name' => 'Other'
        ]);
    }
}

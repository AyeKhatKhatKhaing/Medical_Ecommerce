<?php

namespace Database\Seeders;

use App\Models\Disease;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DiseaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Disease::create([
            'name' => 'Hypertension'
        ]);
        Disease::create([
            'name' => 'Diabets'
        ]);
        Disease::create([
            'name' => 'Heart Disease'
        ]);
        Disease::create([
            'name' => 'Allergies'
        ]);
        Disease::create([
            'name' => 'Asthma'
        ]);
        Disease::create([
            'name' => 'Tumor'
        ]);
        Disease::create([
            'name' => 'Cerebrovascular Disease'
        ]);
        Disease::create([
            'name' => 'Other'
        ]);
    }
}

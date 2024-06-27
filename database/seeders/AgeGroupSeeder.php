<?php

namespace Database\Seeders;

use App\Models\AgeGroup;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AgeGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        AgeGroup::create([
            'name' => 'Neonates or newborns (birth to 1 month)'
        ]);
        AgeGroup::create([
            'name' => 'Infants (1 month to 1 year)'
        ]);
        AgeGroup::create([
            'name' => 'Children (1 year through 12 years)'
        ]);
        AgeGroup::create([
            'name' => 'Adolescents (13 years through 17 years)'
        ]);
        AgeGroup::create([
            'name' => 'Adults (18 years or older)'
        ]);
        AgeGroup::create([
            'name' => 'Older adults (65 and older)*'
        ]);
    }
}

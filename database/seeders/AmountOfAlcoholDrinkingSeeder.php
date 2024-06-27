<?php

namespace Database\Seeders;

use App\Models\AmountOfAlcoholDrinking;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AmountOfAlcoholDrinkingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        AmountOfAlcoholDrinking::create([
            'name_en' => 'Small', 'name_sc' => '小量', 'name_tc' => '小量'
        ]);
        AmountOfAlcoholDrinking::create([
            'name_en' => 'Moderate', 'name_sc' => '一般', 'name_tc' => '一般'
        ]);
        AmountOfAlcoholDrinking::create([
            'name_en' => 'Large',  'name_sc' => '大量', 'name_tc' => '大量'
        ]);
    }
}

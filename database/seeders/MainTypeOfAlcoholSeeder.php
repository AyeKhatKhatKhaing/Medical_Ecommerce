<?php

namespace Database\Seeders;

use App\Models\MainTypeAlcohol;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MainTypeOfAlcoholSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        MainTypeAlcohol::create([
            'name_en' => 'Liquor','name_tc' => '酒','name_sc' => '酒'
        ]);
        MainTypeAlcohol::create([
            'name_en' => 'Red Wine', 'name_tc' => '紅酒', 'name_sc' => '紅酒'
        ]);
        MainTypeAlcohol::create([
            'name_en' => 'Beer',  'name_tc' => '啤酒',  'name_sc' => '啤酒'
        ]);
    }
}

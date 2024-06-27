<?php

namespace Database\Seeders;

use App\Models\RelationshipType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RelationshipTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        RelationshipType::create([
            'name_en' => 'Myself',
            'name_tc' => '本人',
            'name_sc' => '我',
        ]);
        RelationshipType::create([
            'name_en' => 'Son / Daughter',
            'name_tc' => '兒子／女兒',
            'name_sc' => '儿子 / 女儿',
        ]);
        RelationshipType::create([
            'name_en' => 'Parents',
            'name_tc' => '父母',
            'name_sc' => '父母',
        ]);
        RelationshipType::create([
            'name_en' => 'Spouse',
            'name_tc' => '配偶',
            'name_sc' => '配偶',
        ]);
        RelationshipType::create([
            'name_en' => 'Other',
            'name_tc' => '其他',
            'name_sc' => '其他',
        ]);
    }
}

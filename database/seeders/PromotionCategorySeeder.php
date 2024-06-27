<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PromotionCategory;

class PromotionCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Fash Deal','Double 10'];

        foreach ($categories as $cat) {

            $category = new PromotionCategory();
            $category->name_en = $cat;
            $category->save();

        }

    }
}

<?php

namespace Database\Seeders;
use App\Models\Category;
use App\Models\SubCategory;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sub_categories = ['HPV Vaccine','Child Vaccine','Pneumococcal 13','Prenatal DNA Test','Maternity DNA Test','Child DNA Test','Cancer Screening DNA Test','COVID-19 Check','Allergy Test','Elderly'];
        foreach ($sub_categories as $sc) {

            $sub_category = new SubCategory();
            $sub_category->category_id =Category::all()->random()->id;
            $sub_category->name_en = $sc;
            $sub_category->save();

        }
    }
}

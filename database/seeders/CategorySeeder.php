<?php

namespace Database\Seeders;
use App\Models\Category;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Body Check','Vaccine','DNA Test'];

        foreach ($categories as $cat) {

            $category = new Category();
            $category->name_en = $cat;
            $category->save();

        }
    }
}

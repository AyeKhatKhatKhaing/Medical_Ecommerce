<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       Page::create([
            'id' => 2,
            'name_en' => 'Banner Title En',
            'name_sc' => 'Banner Title Sc',
            'name_tc' => 'Banner Title Tc',
            'content_en' => 'Banner Content En',
            'content_tc' => 'Banner Content Tc',
            'content_sc' => 'Banner Content Sc',
            'img' => 'https://p238dev.visibleone.io/storage/files/1/gift-box.png',
            'links' => 'https://p238dev.visibleone.io/'
        ]);
    }
}

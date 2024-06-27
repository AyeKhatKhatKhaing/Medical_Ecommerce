<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PrivacyTermsSeeder extends Seeder
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
            'id' => 3,
            'name_en' => 'Privacy Policy Statement',
            'name_sc' => 'Privacy Policy Statement',
            'name_tc' => 'Privacy Policy Statement',
            'content_en' => 'Privacy Policy Content En',
            'content_tc' => 'Privacy Policy Content Tc',
            'content_sc' => 'Privacy Policy Content Sc',
            'img' => 'https://p238dev.visibleone.io/storage/files/1/privacy-policy-banner.png',
        ]);
        Page::create([
            'id' => 4,
            'name_en' => 'Terms of Use Statement',
            'name_sc' => 'Terms of Use Statement',
            'name_tc' => 'Terms of Use Statement',
            'content_en' => 'Terms of Use Content En',
            'content_tc' => 'Terms of Use Content Tc',
            'content_sc' => 'Terms of Use Content Sc',
            'img' => 'https://p238dev.visibleone.io/storage/files/1/term-of-use-banner.png',
        ]);
    }
}

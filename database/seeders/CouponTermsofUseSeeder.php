<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CouponTermsofUseSeeder extends Seeder
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
            'id' => 5,
            'name_en' => 'Privacy Policy Coupon',
            'name_sc' => 'Privacy Policy Coupon',
            'name_tc' => 'Privacy Policy Coupon',
            'content_en' => 'Coupon Privacy Policy Content En',
            'content_tc' => 'Coupon Privacy Policy Content Tc',
            'content_sc' => 'Coupon Privacy Policy Content Sc',
            'img' => 'https://p238dev.visibleone.io/storage/files/1/privacy-policy-banner.png',
        ]);
    }
}

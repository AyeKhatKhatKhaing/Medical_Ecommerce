<?php

namespace Database\Seeders;

use App\Models\OfficeInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfficeInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        OfficeInfo::create([
            'office_name_en' => 'Kwun Tong Office',
            'office_name_tc' => 'Kwun Tong Office',
            'office_name_sc' => 'Kwun Tong Office',
            'address_en' => '<p>Unit 1602, 16/F Gravity, 29 Hing Yip Street, Kwun Tong, Kowloon</p>',
            'address_tc' => '<p>Unit 1602, 16/F Gravity, 29 Hing Yip Street, Kwun Tong, Kowloon</p>',
            'address_sc' => '<p>Unit 1602, 16/F Gravity, 29 Hing Yip Street, Kwun Tong, Kowloon</p>',
            'location' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14764.740561284974!2d114.20738328006156!3d22.30883680846241!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34040175af3715f9%3A0x696c7baa1a90b8de!2sMEDIQ%20Hong%20Kong!5e0!3m2!1sen!2smm!4v1693487757262!5m2!1sen!2smm',
        ]);
        OfficeInfo::create([
            'office_name_en' => 'Central Office',
            'office_name_tc' => 'Central Office',
            'office_name_sc' => 'Central Office',
            'address_en' => '<p>New World Tower, Queens Road Central, Central, Hong Kong</p>',
            'address_tc' => '<p>New World Tower, Queens Road Central, Central, Hong Kong</p>',
            'address_sc' => '<p>New World Tower, Queens Road Central, Central, Hong Kong</p>',
            'location' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14764.740561284974!2d114.20738328006156!3d22.30883680846241!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34040175af3715f9%3A0x696c7baa1a90b8de!2sMEDIQ%20Hong%20Kong!5e0!3m2!1sen!2smm!4v1693487757262!5m2!1sen!2smm',
        ]);
    }
}

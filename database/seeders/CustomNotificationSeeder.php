<?php

namespace Database\Seeders;
use App\Models\CustomNotification;
use App\Models\NotificationType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomNotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customNotificationList = [
            [
                'title'=>'Updates and Promotions',
                'description'=>'Know our latest campaigns, promo codes, discounts and new features first.',
                'enable_selection'=>1
            ],
            [
                'title'=>'Reminders',
                'description'=>'Get reminders about your cart, payments, reviews and referring friends.',
                'enable_selection'=>1
            ],
            [
                'title'=>'Account notifications',
                'description'=>'For important notifications on booking summaries, vouchers and cancellations.',
                'enable_selection'=>0
            ],
        ];
        foreach ($customNotificationList as $data) {

            $customNotification = new CustomNotification();
            $customNotification->title_en = $data['title'];
            $customNotification->description_en = $data['description'];
            $customNotification->title_tc = $data['title'];
            $customNotification->description_tc = $data['description'];
            $customNotification->title_sc = $data['title'];
            $customNotification->description_sc = $data['description'];
            $customNotification->enable_selection = $data['enable_selection'];
            $customNotification->save();

        }

        $notificationTypeList = ['SMS','EMAIL'];
        foreach ($notificationTypeList as $data) {
            $notificationType = new NotificationType();
            $notificationType->name = $data;
            $notificationType->save();
        }
    }
}

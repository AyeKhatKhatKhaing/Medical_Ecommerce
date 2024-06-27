<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Coupon;
use App\Models\Customer;
use App\Mail\GeneralMail;
use App\Models\CouponBanner;
use App\Models\CouponCollect;
use Illuminate\Console\Command;
use App\Models\NotificationType;
use App\Models\CustomerNotification;
use Illuminate\Support\Facades\Mail;

class BirthdayCouponCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'birthday:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $month = Carbon::now()->month;
        $customers = Customer::whereMonth('dob',$month)->get();
        $coupons = Coupon::whereIsPublished(true)->where('coupon_type',0)->get();
        $customerNotificationLang = CustomerNotification::where("customer_id",$customer->id)->where("custom_notification_id",4)->first();
        $defaultLang = "zh-hk";
        if($customerNotificationLang) {
            $defaultLang = NotificationType::where("id",$customerNotificationLang->notification_type_id)->first()->name_en;
        }
        $couponBanner = CouponBanner::first();
        if(count($customers) > 0){
            foreach($customers as $customer){
                if(count($coupons) > 0){
                    foreach($coupons as $coupon){
                        CouponCollect::create([
                            'customer_id' => $customer->id,
                            'coupon_id' => $coupon->id,
                        ]);
                    }
                }
                $data = [
                    'email' => $customer->email,
                    'name' => $customer->first_name,
                    'created_at' => $customer->created_at,
                    'coupons' => $coupons,
                    'birthday_coupon' => '',
                    'birthday_img' => $couponBanner->birthday_img,
                ];
                Mail::to($data['email'])->locale($defaultLang)->send(new GeneralMail($data));
            }
        }
        \Log::info('test Birthday coupons'); 
        return Command::SUCCESS;
    }
}

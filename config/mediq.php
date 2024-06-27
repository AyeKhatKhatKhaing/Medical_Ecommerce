<?php


return [

    "coupon_discount_types" => [
        "percent"       => "Percent Discount (-X%)",
        "fixed_product" => 'Fixed Amount Discount (-$X)',
        // "get_or_buy" =>"Get / Buy",
    ],

    "coupon_value_types" => [
        "single" => "Single",
        "bundle" => "Bundle"
    ],

    "product_limit_types" => [
        "same"          => "Same Product",
        "multi_product" => "Multiple Product",
        // "nothing"       => "Nothing",
    ],

    "coupon_status" => [
        "new"      => "New",
        "limited"  => "Limited",
    ],

    "member_types" => [
        "basic" => "Basic",
        "vip" => "VIP",
        "vvip" => "VVIP",
        "elite" => "ELITE",
    ],

    "gender" => [
        0 => "Male",
        1 => "Female",
        2 => "nil",
    ],

    "owner_type" => [
        0 => "Mediq",
        1 => "Merchant",
    ],

    "coupon_type" => [
        0 => "birthday",
        1 => "welcome",
    ],
    
    // "number_of_dose" => [
    //     "1" => "Instock",
    //     "2" => "Outstock",
    //     "3" => "Limited Stock",
    // ],

    // "employment_type" => [
    //     "0" => "Full Time",
    //     "1" => "Part Time",
    // ],

    // "minimum_experience" => [
    //     "0" => "Junior",
    //     "1" => "Mid-Level",
    //     "2" => "Senior",
    // ],

    "month_en"=>[
        '1'=>'January',
        '2'=>'February',
        '3'=>'March',
        '4'=>'April',
        '5'=>'May',
        '6'=>'June',
        '7'=>'July',
        '8'=>'August',
        '9'=>'September',
        '10'=>'October',
        '11'=>'November',
        '12'=>'December',
    ],
    "month_zh-hk"=>[
        '1'=>'一月',
        '2'=>'二月',
        '3'=>'三月',
        '4'=>'四月',
        '5'=>'五月',
        '6'=>'六月',
        '7'=>'七月',
        '8'=>'八月',
        '9'=>'九月',
        '10'=>'十月',
        '11'=>'十一月',
        '12'=>'十二月',
    ],
    "month_zh-cn"=>[
        '1'=>'一月',
        '2'=>'二月',
        '3'=>'三月',
        '4'=>'四月',
        '5'=>'五月',
        '6'=>'六月',
        '7'=>'七月',
        '8'=>'八月',
        '9'=>'九月',
        '10'=>'十月',
        '11'=>'十一月',
        '12'=>'十二月',
    ],
    "booking_status_en"=>[
        '1' => 'Pending (waiting for payment)',
        '2' => 'Pending (waiting for confirmation)',
        '3' => 'Booking Confirmed',
        '4' => 'Completed',
        '5' => 'Expired',
        '6' => 'Cancelled',
        '7' => 'Refunded',
    ],
    "booking_status_zh-hk"=>[
        '1' => '待处理（等待付款)',
        '2' => '待處理（等待確認)',
        '3' => '预订已确认',
        '4' => '完成',
        '5' => '已过期',
        '6' => '取消',
        '7' => '已退款',
    ],
    "booking_status_zh-cn"=>[
        '1' => '待处理（等待付款)',
        '2' => '待处理（等待确认)',
        '3' => '预订已确认',
        '4' => '完成',
        '5' => '已过期',
        '6' => '取消',
        '7' => '已退款',
    ],
    "payment_status_en"=>[
        '1' => 'Success (online payment)',
        '2' => 'Pending (other payment/ offline)',
        '3' => 'Processing (other payment/ offline)',
        '4' => 'Reject (other payment/ offline)',
        '5' => 'Success (other payment/ offline)',
        '6' => 'Cancel',
    ],
    "payment_status_zh-hk"=>[
        '1' => '成功（在线支付)',
        '2' => '待处理（其他付款/离线)',
        '3' => '正在处理（其他支付/离线)',
        '4' => '拒绝（其他付款/离线)',
        '5' => '成功（其他支付/离线)',
        '6' => '取消',
    ],
    "payment_status_zh-cn"=>[
        '1' => '成功（在线支付)',
        '2' => '待处理（其他付款/离线)',
        '3' => '正在处理（其他支付/离线)',
        '4' => '拒绝（其他付款/离线)',
        '5' => '成功（其他支付/离线)',
        '6' => '取消',
    ],
    "employment_types_en"=>[
        '1' => 'Full Time',
        '2' => 'Part Time',
    ],
    "employment_types_zh-hk"=>[
        '1' => '全職',
        '2' => '全職',
    ],
    "employment_types_zh-cn"=>[
        '1' => '全职',
        '2' => '全职',
    ],
    "exp_level_en"=>[
        '0' => 'Junior Level',
        '1' => 'Mid-Level',
        '2' => 'Senior Level',
    ],
    "exp_level_zh-hk"=>[
        '0' => '初級',
        '1' => '中級',
        '2' => '資深',
    ],
    "exp_level_zh-cn"=>[
        '0' => '初级',
        '1' => '中级',
        '2' => '资深',
    ],
    "cancelation_reason_en" => [
        '1' => "Booking date is too long",
        '2' => "No one confirmed with me",
        '3' => "Decided on alternative product", 
        '4' => "Placed the wrong order",
        '5' => "Duplicated the order",
        '6' => "Don’t use the promo code",
        '7' => "Don’t use the coupon",
        '8' => "Don’t use Q-Dollar points",
        '9' => "I no longer need it",
    ],
    "cancelation_reason_zh-cn" => [
        '1' => "預約日期過長",
        '2' => "未有人與我確認預約", 
        '3' => "選擇了不同產品", 
        '4' => "落錯訂單", 
        '5' => "重複購買", 
        '6' => "未使用推廣碼", 
        '7' => "未使用優惠券", 
        '8' => "未使用Q-Dollar積分", 
        '9' => "我不再需要", 
    ],
    "cancelation_reason_zh-hk" => [
        '1' => "預約日期過長",
        '2' => "未有人與我確認預約", 
        '3' => "選擇了不同產品", 
        '4' => "落錯訂單", 
        '5' => "重複購買", 
        '6' => "未使用推廣碼", 
        '7' => "未使用優惠券", 
        '8' => "未使用Q-Dollar積分", 
        '9' => "我不再需要", 
    ],

    "service_option_en" => [
        '1' => "Open Merchant Account for FREE",
        '2' => "Market Insights", 
        '3' => "Advertising", 
        '4' => "Reporting / Feedback", 
        '5' => "Others", 
    ],
    "service_option_zh-hk" => [
        '1' => "免費開設商家帳戶",
        '2' => "市場洞察", 
        '3' => "廣告", 
        '4' => "報錯／意見回饋", 
        '5' => "其他",  
    ],
    "service_option_zh-cn" => [
        '1' => "免费开设商家帐户",
        '2' => "市场洞察", 
        '3' => "广告", 
        '4' => "报错／意见回馈", 
        '5' => "其他",  
    ],

    "page_title" => [
        'four04_page' => "404 Page",
        'home_page' => "Home Page",
        'coupon_list' => "Coupon List",
        'product_list' => "Product List",
        'product_compare_list' => "Product Compare List",
        'blog_list' => "Blog List",
        'blog_category_list' => "Blog Category List",
        'blog_filter_keywords_list' => "Blog Filter Keywords List",
        'blog_details' => "Blog Details",
        'overview' => "Overview",
        'my_booking' => "My Booking",
        'my_booking_details' => "My Booking Details",
        'my_favourite' => "My Favourite",
        'my_coupon' => "My Coupon",
        'setting' => "My Setting",
        'account_information' => "Account Information",
        'health_record' => "Health Record",

        'checkout_selected_item' => "Checkout selected item",
        'checkout_enter_information' => "Checkout enter information",
        'order_checkout' => "Order checkout",
        'checkout_thank_you' => "Thank You (Order Success)",
        'checkout_pending' => "Order Pending",
        
    ],
];

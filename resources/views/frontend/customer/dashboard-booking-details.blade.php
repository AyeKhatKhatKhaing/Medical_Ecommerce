@extends('frontend.layouts.master')
@include('frontend.seo', ['seo' => isset($seo) ? $seo : ''])
@section('content')
    <main>
        <section class="dash-banner-section">
            <div component-name="me-dashboard-banner">
                <div class="relative">
                    <img src="{{ asset('frontend/img/Rectangle 2645.png') }}" alt="background image" class="h-[180px]">
                    <h1
                        class="me-body32 text-whitez helvetica-normal font-bold text-center absolute top-1/2 left-1/2 dashboard-title">
                        @lang('labels.booking_details.booking_details')
                    </h1>
                </div>
            </div>
        </section>
        <section class="user-dashboard-section dashboard-list">
            <div class="flex justify-between relative helvetica-normal user-dashboard-layer">
                @include('frontend.customer.leftmenu')
                <div class="udl-right">
                    <div component-name="me-member-order-detail-content" class="me-member-dashboard-content">
                        <div class="me-member-dashboard-content-container">
                            <div>
                                <div>
                                    <div class="flex lg:flex-row flex-col-reverse">
                                        <div class="mt-9 7xl:mr-[35px] lg:mr-6 w-full">
                                            <div class="items-center flex">
                                                <div class="mr-5">
                                                    <a href="#" onclick="history.back()">
                                                        <svg xmlns="http://www.w3.org/2000/svg')}}" width="15"
                                                            height="25" viewBox="0 0 15 25" fill="none">
                                                            <path
                                                                d="M12 24.5L0 12.5L12 0.5L14.13 2.63L4.26 12.5L14.13 22.37L12 24.5Z"
                                                                fill="#333333"></path>
                                                        </svg>
                                                    </a>
                                                </div>
                                                <h2 class="me-body-32 font-bold text-darkgray sm:text-left text-center">
                                                    @lang('labels.order_details.order_details')</h2>
                                            </div>

                                            <div component-name="me-member-order-detail-card"
                                                class="me-member-dashboard-booking-card mt-5 mb-[45px]">
                                                <div class="flex items-center mt-8 mb-5">
                                                    <p class="mt-1 me-body-16 font-normal text-lightgray mr-5"> @lang('labels.order_details.order')
                                                        #{{ $data->invoice_no }}</p>
                                                    <p class="mt-1 me-body-16 font-normal text-lightgray">@lang('labels.member_dashboard.booking_on')
                                                        {{ date('d F Y', strtotime($data->created_at)) }}</p>
                                                </div>

                                                <div>
                                                    @if($data->payment_status == 1)
                                                    <div component-name="me-member-order-payment-info"
                                                        class="me-member-order-payment-info mb-5">
                                                        <div class="rounded-xl border-1 border-mee4 xl:px-8 px-5 py-5">
                                                            <h3 class="font-bold me-body-23 text-darkgray mb-5">@lang('labels.order_details.payment_info')
                                                            </h3>
                                                            <div class="flex flex-wrap items-center">
                                                                <div class="min-w-[200px] mr-5 my-1">
                                                                    @php
                                                                    // $cardInfo = CardInfo::where("customer_id",auth()->guard('customer')->user()->id)->orderBy("id","DESC")->first();
                                                                    @endphp
                                                                    <div class="inline-block border-1 border-s-darkgray rounded-[4px] order-payment-info-img">
                                                                        {{-- <svg xmlns="http://www.w3.org/2000/svg')}}"
                                                                            width="64" height="32"
                                                                            viewBox="0 0 64 32" fill="none">
                                                                            <rect x="0.5" y="0.5"
                                                                                width="63" height="31" rx="3.5"
                                                                                fill="white"></rect>
                                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                                d="M25.4807 7.36402L22.6513 24.6474H27.1781L30.0079 7.36402H25.4807ZM18.8425 7.36402L14.5265 19.2514L14.016 16.6916L14.0163 16.6924L13.9038 16.1187C13.3815 14.9998 12.1717 12.8732 9.88733 11.0583C9.21196 10.5218 8.53117 10.064 7.87305 9.67294L11.7956 24.6474H16.5122L23.7148 7.36402H18.8425ZM36.51 12.1622C36.51 10.2082 40.9188 10.4593 42.856 11.5203L43.5019 7.8083C43.5019 7.8083 41.5083 7.05469 39.4302 7.05469C37.1836 7.05469 31.8488 8.03123 31.8488 12.7762C31.8488 17.2418 38.1102 17.2973 38.1102 19.6418C38.1102 21.9863 32.4943 21.5673 30.641 20.0884L29.9675 23.9683C29.9675 23.9683 31.9887 24.9448 35.0779 24.9448C38.1667 24.9448 42.8278 23.3543 42.8278 19.0278C42.8278 14.5343 36.51 14.1158 36.51 12.1622ZM54.9828 7.36402H51.3431C49.6625 7.36402 49.2532 8.65205 49.2532 8.65205L42.5022 24.6474H47.2206L48.1645 22.0803H53.9195L54.4505 24.6474H58.6071L54.9828 7.36402ZM49.4691 18.5336L51.8479 12.0657L53.1861 18.5336H49.4691Z"
                                                                                fill="#005BAC"></path>
                                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                                d="M12.5563 8.99149C12.5563 8.99149 12.3689 7.43164 10.3685 7.43164H3.10075L3.01562 7.72479C3.01562 7.72479 6.50906 8.43263 9.86057 11.0846C13.0634 13.6191 14.1082 16.7786 14.1082 16.7786L12.5563 8.99149Z"
                                                                                fill="#F6AC1D"></path>
                                                                            <rect x="0.5" y="0.5"
                                                                                width="63" height="31" rx="3.5"
                                                                                stroke="#E4E4E4"></rect>
                                                                        </svg> --}}
                                                                        @if($data->payment_type=='a_pay')
                                                                            <img src="{{ asset('frontend/img/apple-payment.svg') }}"   alt="order-jcb">
                                                                        @else
                                                                            @if($data->card_name == 'Visa') 
                                                                            <img src="{{ asset('frontend/img/visa-payment-update.png') }}"
                                                                                alt="order-visa">
                                                                            @elseif($data->card_name == 'MasterCard')
                                                                                <img src="{{ asset('frontend/img/master-payment.svg') }}"
                                                                                alt="order-mastercard">
                                                                            @elseif($data->card_name == "American Express")
                                                                                <img src="{{ asset('frontend/img/express-payment.svg') }}"
                                                                                alt="order-american-express">
                                                                            @elseif($data->card_name == 'UnionPay')
                                                                                <img src="{{ asset('frontend/img/unionpay-payment.svg') }}"
                                                                                alt="order-jcb">
                                                                            @else
                                                                                <img src="{{ asset('frontend/img/jcb-payment-update.png') }}"
                                                                                alt="order-jcb">
                                                                            @endif
                                                                        @endif
                                                                    </div>
                                                                    <p class="font-normal me-body-18 text-darkgray mt-2">
                                                                        {{-- 8765 - @lang('labels.order_details.exp') 12/2024 --}}
                                                                    </p>
                                                                </div>
                                                                <div class=" my-1">
                                                                    <p class="font-bold me-body-16 text-darkgray">
                                                                        @lang('labels.order_details.total_amount') </p>
                                                                    <div class="flex items-center">
                                                                        <p
                                                                            class="font-bold me-body-18 text-darkgray mr-[14px]">
                                                                            HK$ {{$data->grand_total}}</p>
                                                                        <div class="mr-1">
                                                                            <svg xmlns="http://www.w3.org/2000/svg')}}"
                                                                                width="20" height="20"
                                                                                viewBox="0 0 20 20" fill="none">
                                                                                <path
                                                                                    d="M13.4563 7.79375C13.544 7.88164 13.5933 8.00078 13.5933 8.125C13.5933 8.24922 13.544 8.36836 13.4563 8.45625L9.08125 12.8313C8.99336 12.919 8.87422 12.9683 8.75 12.9683C8.62578 12.9683 8.50664 12.919 8.41875 12.8313L6.54375 10.9563C6.46095 10.8674 6.41588 10.7499 6.41802 10.6284C6.42016 10.507 6.46936 10.3911 6.55524 10.3052C6.64112 10.2194 6.75699 10.1702 6.87843 10.168C6.99987 10.1659 7.11739 10.2109 7.20625 10.2937L8.75 11.8367L12.7938 7.79375C12.8816 7.70597 13.0008 7.65666 13.125 7.65666C13.2492 7.65666 13.3684 7.70597 13.4563 7.79375ZM17.9688 10C17.9688 11.5761 17.5014 13.1167 16.6258 14.4272C15.7502 15.7377 14.5056 16.759 13.0495 17.3622C11.5934 17.9653 9.99116 18.1231 8.44538 17.8156C6.89959 17.5082 5.4797 16.7492 4.36525 15.6348C3.2508 14.5203 2.49185 13.1004 2.18437 11.5546C1.87689 10.0088 2.0347 8.40659 2.63784 6.95049C3.24097 5.49439 4.26235 4.24984 5.5728 3.37423C6.88326 2.49861 8.42393 2.03125 10 2.03125C12.1127 2.03373 14.1381 2.87409 15.632 4.36798C17.1259 5.86188 17.9663 7.88732 17.9688 10ZM17.0313 10C17.0313 8.60935 16.6189 7.24993 15.8463 6.09365C15.0737 4.93736 13.9755 4.03615 12.6907 3.50397C11.406 2.97179 9.9922 2.83255 8.62827 3.10385C7.26435 3.37516 6.0115 4.04482 5.02816 5.02816C4.04482 6.01149 3.37516 7.26434 3.10386 8.62827C2.83255 9.9922 2.9718 11.406 3.50398 12.6907C4.03615 13.9755 4.93737 15.0737 6.09365 15.8463C7.24993 16.6189 8.60935 17.0312 10 17.0312C11.8642 17.0292 13.6514 16.2877 14.9696 14.9696C16.2877 13.6514 17.0292 11.8642 17.0313 10Z"
                                                                                    fill="#32A923"></path>
                                                                            </svg>
                                                                        </div>
                                                                        <p class="font-normal me-body-14 text-darkgray">@lang('labels.order_details.Paid')
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    @if($data->payment_status == 2)
                                                    <div component-name="me-member-order-notyet-paid-info" class="me-member-order-notyet-paid-info mb-5">
                                                        <div class="rounded-xl border-1 border-mee4 xl:px-8 px-5 py-5">
                                                            <div class="">
                                                                <div class="payment-types-tab flex items-center">
                                                                    <p data-id="online-payment" class="payment-tab font-bold me-body-24 text-meA3 cursor-pointer mr-8 active">
                                                                        @lang('labels.order_details.online_payment')</p>
                                                                    <p data-id="other-payment" class="payment-tab font-bold me-body-24 text-meA3 cursor-pointer "> @lang('labels.order_details.other_payment')</p>
                                                                </div>
                                                                <div id="online-payment" class="my-5">
                                                                    <div class="mb-5 flex flex-wrap items-center">
                                                                        <img src="{{ asset('frontend/img/order-visa.svg') }}"
                                                                            alt="order-visa">
                                                                        <img src="{{ asset('frontend/img/order-mastercard.svg') }}"
                                                                            alt="order-mastercard">
                                                                        <img src="{{ asset('frontend/img/wechat-payment-update.png') }}"
                                                                            alt="order-american-express">
                                                                        <img src="{{ asset('frontend/img/order-jcb.png') }}"
                                                                            alt="order-jcb">
                                                                        <img src="{{ asset('frontend/img/order-googlePay.svg') }}"
                                                                            alt="order-googlePay">
                                                                        <img src="{{ asset('frontend/img/order-applelog.svg') }}"
                                                                            alt="order-applelog">
                                                                        <img src="{{ asset('frontend/img/unionpay-payment.svg') }}" class="union-pay"
                                                                            alt="order-wechatpay">
                                                                        <img src="{{ asset('frontend/img/order-alipay.svg') }}"
                                                                            alt="order-alipay">
                                                                    </div>
                                                                    <div class="flex md:flex-row flex-col justify-between items-end">
                                                                        <div class="max-w-[500px]">
                                                                            <p class="font-bold me-body-16 text-darkgray">@lang('labels.order_details.total_amount')</p>
                                                                            <p class="font-bold me-body-18 text-mered mt-1">HK$ {{$data->grand_total}}</p>
                                                                            <p class="font-normal me-body-16 text-mered mt-1 leading-[normal] mb-1"> @lang('labels.order_details.please_click_text1') {{ date('d F Y', strtotime($data->created_at->addDays(3))) }}
                                                                                23:59:59 @lang('labels.order_details.please_click_text2')</p>
                                                                        </div>
                                                                        <div class="flex items-center text-center mb-1">
                                                                            <a href="#" id="btn_paynow"class="min-w-[135px] font-bold me-body-16 text-whitez px-5 py-[9px] bg-orangeMediq rounded-md hover:bg-brightOrangeMediq">@lang('labels.check_out.pay_now')</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="other-payment" class="my-5 hidden">
                                                                    <div class="">
                                                                        <div class="flex flex-wrap items-center mb-5">
                                                                            @php
                                                                                $paymentInfo = \App\Models\PaymentInfo::first();
                                                                            @endphp
                                                                            @if(app()->getLocale() == 'en')
                                                                                <img src="{{ $paymentInfo->bank1_logo }}" alt="order-hsbc" class="cursor-pointer mr-2 bank-type" data-bankname="{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank1_info_en))[1]}}" data-bankno="{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank1_info_en))[2]}}" data-account="{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank1_info_en))[3]}}" data-id="1">
                                                                                <img src="{{ $paymentInfo->bank2_logo }}" alt="order-hsbc" class="cursor-pointer mr-2 bank-type" data-bankname="{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank2_info_en))[1]}}" data-bankno="{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank2_info_en))[2]}}" data-account="{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank2_info_en))[3]}}" data-id="2">
                                                                                <img src="{{ $paymentInfo->bank3_logo }}" alt="order-hsbc" class="cursor-pointer mr-2 bank-type" data-bankname="{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank3_info_en))[1]}}" data-bankno="{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank3_info_en))[2]}}" data-account="{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank3_info_en))[3]}}" data-id="3">
                                                                                <img src="{{ $paymentInfo->bank4_logo }}" alt="order-hsbc" class="cursor-pointer mr-2 bank-type" data-bankname="{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank4_info_en))[1]}}" data-bankno="{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank4_info_en))[2]}}" data-account="{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank4_info_en))[3]}}" data-id="4">
                                                                            @elseif(app()->getLocale() == 'zh-hk')
                                                                                <img src="{{ $paymentInfo->bank1_logo }}" alt="order-hsbc" class="cursor-pointer mr-2 bank-type" data-bankname="{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank1_info_tc))[1]}}" data-bankno="{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank1_info_tc))[2]}}" data-account="{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank1_info_tc))[3]}}" data-id="1">
                                                                                <img src="{{ $paymentInfo->bank2_logo }}" alt="order-hsbc" class="cursor-pointer mr-2 bank-type" data-bankname="{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank2_info_tc))[1]}}" data-bankno="{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank2_info_tc))[2]}}" data-account="{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank2_info_tc))[3]}}" data-id="2">
                                                                                <img src="{{ $paymentInfo->bank3_logo }}" alt="order-hsbc" class="cursor-pointer mr-2 bank-type" data-bankname="{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank3_info_tc))[1]}}" data-bankno="{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank3_info_tc))[2]}}" data-account="{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank3_info_tc))[3]}}" data-id="3">
                                                                                <img src="{{ $paymentInfo->bank4_logo }}" alt="order-hsbc" class="cursor-pointer mr-2 bank-type" data-bankname="{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank4_info_tc))[1]}}" data-bankno="{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank4_info_tc))[2]}}" data-account="{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank4_info_tc))[3]}}" data-id="4">
                                                                            @else
                                                                                <img src="{{ $paymentInfo->bank1_logo }}" alt="order-hsbc" class="cursor-pointer mr-2 bank-type" data-bankname="{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank1_info_sc))[1]}}" data-bankno="{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank1_info_sc))[2]}}" data-account="{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank1_info_sc))[3]}}" data-id="1">
                                                                                <img src="{{ $paymentInfo->bank2_logo }}" alt="order-hsbc" class="cursor-pointer mr-2 bank-type" data-bankname="{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank2_info_sc))[1]}}" data-bankno="{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank2_info_sc))[2]}}" data-account="{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank2_info_sc))[3]}}" data-id="2">
                                                                                <img src="{{ $paymentInfo->bank3_logo }}" alt="order-hsbc" class="cursor-pointer mr-2 bank-type" data-bankname="{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank3_info_sc))[1]}}" data-bankno="{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank3_info_sc))[2]}}" data-account="{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank3_info_sc))[3]}}" data-id="3">
                                                                                <img src="{{ $paymentInfo->bank4_logo }}" alt="order-hsbc" class="cursor-pointer mr-2 bank-type" data-bankname="{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank4_info_sc))[1]}}" data-bankno="{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank4_info_sc))[2]}}" data-account="{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank4_info_sc))[3]}}" data-id="4">
                                                                            @endif 
                                                                        </div>
                                                                        <div class="p-3 bg-far mb-5">
                                                                            @if(app()->getLocale() == 'en')
                                                                                <p class="font-bold me-body-16 text-darkgray bankname">{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank1_info_en))[1]}}</p>
                                                                                <p class="font-normal me-body-16 text-darkgray mt-[2px] bankno cursor-pointer" onclick="openQRDetails()">{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank1_info_en))[2]}}</p>
                                                                                <p class="font-normal me-body-16 text-darkgray account">{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank1_info_en))[3]}}</p>
                                                                            @elseif(app()->getLocale() == 'zh-hk')
                                                                                <p class="font-bold me-body-16 text-darkgray bankname">{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank1_info_tc))[1]}}</p>
                                                                                <p class="font-normal me-body-16 text-darkgray mt-[2px] bankno cursor-pointer" onclick="openQRDetails()">{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank1_info_tc))[2]}}</p>
                                                                                <p class="font-normal me-body-16 text-darkgray account">{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank1_info_tc))[3]}}</p>
                                                                            @else
                                                                            <p class="font-bold me-body-16 text-darkgray bankname">{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank1_info_sc))[1]}}</p>
                                                                            <p class="font-normal me-body-16 text-darkgray mt-[2px] bankno cursor-pointer" onclick="openQRDetails()">{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank1_info_sc))[2]}}</p>
                                                                            <p class="font-normal me-body-16 text-darkgray account">{{preg_split('#<p([^>])*>#',str_replace("</p>","",$paymentInfo->bank1_info_sc))[3]}}</p>
                                                                            @endif
                                                                           
                                                                        </div>
                                                                        <div class="flex flex-wrap justify-between items-end">
                                                                            <div class="mr-2">
                                                                                <p class="font-bold me-body-16 text-darkgray">@lang('labels.order_details.total_amount')</p>
                                                                                <p class="font-bold me-body-18 text-mered mt-1">HK$ {{$data->grand_total}}</p>
                                                                                <p class="font-normal me-body-16 text-darkgray mt-[2px]">@lang('labels.order_details.evidence')</p>
                                                                            </div>
                                                                            <div class="flex">
                                                                                <button class="upload-receipt-btn min-w-[157px] font-bold me-body-16 px-5 py-[9px] bg-orangeMediq hover:bg-brightOrangeMediq text-whitez rounded-md">@lang('labels.order_details.upload_receipt')</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    @if($data->payment_status == 4)
                                                    <div component-name="me-member-order-offline-notyet-paid-info"
                                                        class="me-member-order-offline-notyet-paid-info mb-5">
                                                        <div class="rounded-xl border-1 border-mee4 xl:px-8 px-5 py-5">
                                                            <div class="">
                                                                <div class="flex flex-wrap items-center mb-5">
                                                                    <img src="{{ asset('frontend/img/order-hsbc.svg')}}"  alt="order-hsbc" class="cursor-pointer mr-2 bank-type" data-bankname="HSBC Bank" data-bankno="741-159396-838" data-account="MediQ Health Service (Asia) Limited"/>
                                                                    <img src="{{ asset('frontend/img/order-fps.svg')}}" alt="order-fps" class="cursor-pointer mr-2 bank-type" data-bankname="FPS" data-bankno="741-159396-123" data-account="MediQ Health Service (Asia) Limited FPS"/>
                                                                    <img src="{{ asset('frontend/img/order-inc.svg')}}" alt="order-inc" class="cursor-pointer mr-2 bank-type" data-bankname="INC" data-bankno="741-159396-456" data-account="MediQ Health Service (Asia) Limited INC"/>
                                                                    </div>
                                                                    <div class="p-3 bg-far mb-5">
                                                                    <p class="font-bold me-body-16 text-darkgray bankname">@lang('labels.order_details.HSBC_bank')</p>
                                                                    <p class="font-normal me-body-16 text-darkgray mt-[2px] bankno">@lang('labels.order_details.account_no') 741-159396-838</p>
                                                                    <p class="font-normal me-body-16 text-darkgray account">@lang('labels.order_details.account_name') MediQ Health Service (Asia) Limited</p>
                                                                    </div>
                                                                <div class="flex flex-wrap justify-between items-end">
                                                                    <div class="mr-2">
                                                                        <p class="font-bold me-body-16 text-darkgray">@lang('labels.order_details.total_amount')</p>
                                                                        <p class="font-bold me-body-18 text-mered mt-1">HK$
                                                                            {{$data->grand_total}}</p>
                                                                        <p
                                                                            class="font-normal me-body-16 text-mered mt-[2px]">
                                                                            Your receipt is rejected. Please reupload it
                                                                            before {{ date('d F Y', strtotime($data->created_at->addDays(3))) }} 23:59:59.</p>
                                                                    </div>
                                                                    <div class="flex">
                                                                        <button
                                                                            class="upload-receipt-btn min-w-[157px] font-bold me-body-16 px-5 py-[9px] hover:bg-brightOrangeMediq bg-orangeMediq text-whitez rounded-md">
                                                                            @lang('labels.order_details.reupload')</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    @if($data->payment_status == 3)
                                                    <div component-name="me-member-order-payment-info-processing"
                                                        class="me-member-order-payment-info-processing mb-5">
                                                        <div class="rounded-xl border-1 border-mee4 xl:px-8 px-5 py-5">
                                                            <h3 class="font-bold me-body-23 text-darkgray mb-5">
                                                                @lang('labels.order_details.payment_info')</h3>
                                                            <div class="flex flex-wrap items-center">
                                                                <div class="min-w-[200px] mr-5 my-1">
                                                                    <p class="font-bold me-body-16 text-darkgray">@lang('labels.order_details.payment')
                                                                    </p>
                                                                    <p class="font-normal me-body-18 text-darkgray mt-2">
                                                                        {{-- 8765 - @lang('labels.order_details.exp') 12/2024 --}}
                                                                        <a href="{{asset('storage/orders/'.$data->payslip)}}"  target="_blank"
                                                                            class="font-normal me-body-18 text-darkgray mt-2 underline">@lang('labels.order_details.record')</a>
                                                                    </p>
                                                                </div>
                                                                <div class=" my-1">
                                                                    <p class="font-bold me-body-16 text-darkgray">
                                                                        @lang('labels.order_details.total_amount')</p>
                                                                    <div class="flex items-center">
                                                                        <p
                                                                            class="font-bold me-body-18 text-darkgray mr-[14px]">
                                                                            HK$ {{$data->grand_total}}</p>
                                                                        <div class="mr-1">
                                                                            <svg xmlns="http://www.w3.org/2000/svg')}}"
                                                                                width="20" height="21"
                                                                                viewBox="0 0 20 21" fill="none">
                                                                                <path opacity="0.5"
                                                                                    d="M10 2.16406V5.4974"
                                                                                    stroke="#FF8201" stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"></path>
                                                                                <path opacity="0.9" d="M10 15.5V18.8333"
                                                                                    stroke="#FF8201" stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"></path>
                                                                                <path opacity="0.6"
                                                                                    d="M4.10742 4.60938L6.46576 6.96771"
                                                                                    stroke="#FF8201" stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"></path>
                                                                                <path d="M13.5332 14.0352L15.8915 16.3935"
                                                                                    stroke="#FF8201" stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"></path>
                                                                                <path opacity="0.7"
                                                                                    d="M1.66602 10.5H4.99935"
                                                                                    stroke="#FF8201" stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"></path>
                                                                                <path d="M15 10.5H18.3333"
                                                                                    stroke="#FF8201" stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"></path>
                                                                                <path opacity="0.8"
                                                                                    d="M4.10742 16.3896L6.46576 14.0312"
                                                                                    stroke="#FF8201" stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"></path>
                                                                                <path d="M13.5332 6.96771L15.8915 4.60938"
                                                                                    stroke="#FF8201" stroke-width="2"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"></path>
                                                                            </svg>
                                                                        </div>
                                                                        <p class="font-normal me-body-14 text-darkgray">
                                                                            @lang('labels.order_details.processing')</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    @if($data->payment_status == 5)
                                                    <div component-name="me-member-order-payment-info-hsbc"
                                                        class="me-member-order-payment-info-hsbc mb-5">
                                                        <div class="rounded-xl border-1 border-mee4 xl:px-8 px-5 py-5">
                                                            <h3 class="font-bold me-body-23 text-darkgray mb-5">@lang('labels.order_details.payment_info')
                                                                </h3>
                                                            <div class="flex flex-wrap items-center">
                                                                <div class="min-w-[200px] mr-5 my-1">
                                                                    @if($data->payment_type=='HSBC Bank')
                                                                    <img src="{{ asset('frontend/img/order-hsbc.png') }}"
                                                                        alt="order-hsbc">
                                                                    @elseif($data->payment_type=='FPS')
                                                                    <img src="{{ asset('frontend/img/order-fps.png') }}"
                                                                    alt="order-hsbc">
                                                                    @else
                                                                    <img src="{{ asset('frontend/img/order-inc.svg') }}"
                                                                    alt="order-hsbc">
                                                                    @endif
                                                                    <a href="{{asset('orders/'.$data->payslip)}}"  target="_blank"
                                                                        class="font-normal me-body-18 text-darkgray mt-2 underline">@lang('labels.order_details.record')</a>
                                                                </div>
                                                                <div class=" my-1">
                                                                    <p class="font-bold me-body-16 text-darkgray">
                                                                        @lang('labels.order_details.total_amount')</p>
                                                                    <div class="flex items-center">
                                                                        <p
                                                                            class="font-bold me-body-18 text-darkgray mr-[14px]">
                                                                            HK$ {{$data->grand_total}}</p>
                                                                        <div class="mr-1">
                                                                            <svg xmlns="http://www.w3.org/2000/svg')}}"
                                                                                width="20" height="21"
                                                                                viewBox="0 0 20 21" fill="none">
                                                                                <path
                                                                                    d="M13.4563 8.29375C13.544 8.38164 13.5933 8.50078 13.5933 8.625C13.5933 8.74922 13.544 8.86836 13.4563 8.95625L9.08125 13.3313C8.99336 13.419 8.87422 13.4683 8.75 13.4683C8.62578 13.4683 8.50664 13.419 8.41875 13.3313L6.54375 11.4563C6.46095 11.3674 6.41588 11.2499 6.41802 11.1284C6.42016 11.007 6.46936 10.8911 6.55524 10.8052C6.64112 10.7194 6.75699 10.6702 6.87843 10.668C6.99987 10.6659 7.11739 10.7109 7.20625 10.7937L8.75 12.3367L12.7938 8.29375C12.8816 8.20597 13.0008 8.15666 13.125 8.15666C13.2492 8.15666 13.3684 8.20597 13.4563 8.29375ZM17.9688 10.5C17.9688 12.0761 17.5014 13.6167 16.6258 14.9272C15.7502 16.2377 14.5056 17.259 13.0495 17.8622C11.5934 18.4653 9.99116 18.6231 8.44538 18.3156C6.89959 18.0082 5.4797 17.2492 4.36525 16.1348C3.2508 15.0203 2.49185 13.6004 2.18437 12.0546C1.87689 10.5088 2.0347 8.90659 2.63784 7.45049C3.24097 5.99439 4.26235 4.74984 5.5728 3.87423C6.88326 2.99861 8.42393 2.53125 10 2.53125C12.1127 2.53373 14.1381 3.37409 15.632 4.86798C17.1259 6.36188 17.9663 8.38732 17.9688 10.5ZM17.0313 10.5C17.0313 9.10935 16.6189 7.74993 15.8463 6.59365C15.0737 5.43736 13.9755 4.53615 12.6907 4.00397C11.406 3.47179 9.9922 3.33255 8.62827 3.60385C7.26435 3.87516 6.0115 4.54482 5.02816 5.52816C4.04482 6.51149 3.37516 7.76434 3.10386 9.12827C2.83255 10.4922 2.9718 11.906 3.50398 13.1907C4.03615 14.4755 4.93737 15.5737 6.09365 16.3463C7.24993 17.1189 8.60935 17.5312 10 17.5312C11.8642 17.5292 13.6514 16.7877 14.9696 15.4696C16.2877 14.1514 17.0292 12.3642 17.0313 10.5Z"
                                                                                    fill="#32A923"></path>
                                                                            </svg>
                                                                        </div>
                                                                        <p class="font-normal me-body-14 text-darkgray">
                                                                            @lang('labels.order_details.Paid')</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>

                                                <div
                                                    class="xl:px-8 px-5 py-5 rounded-xl member-card-boxshadow bg-whitez mt-3 relative">
                                                    @php
                                                        $itemList =  App\Models\OrderItems::select("order_items.*","products.id as product_id","products.name_en","products.name_tc","products.name_sc",
                                                        "products.slug_en","products.is_two_recipient","recipients.location","recipients.confirm_location","products.featured_img","recipients.remark","recipients.id as recipient_id",
                                                        "recipients.confirm_booking_date","recipients.confirm_booking_time","recipients.date","recipients.time","categories.name_en as category_name_en")
                                                                                ->where("orders_id",$data->id)
                                                                                ->join("products","products.id","order_items.product_id")
                                                                                ->join("recipients","recipients.id","order_items.recipient_id")
                                                                                ->join("categories","categories.id","products.category_id")
                                                                                ->get();
                                                        $twoPersonCouponHaveShowList = [];
                                                    @endphp
                                                    @php $i=1 @endphp
                                                    @foreach($itemList as $itemDetails)
                                                    @if($itemDetails->is_two_recipient ==1 && in_array($itemDetails->recipient_id,$twoPersonCouponHaveShowList)==false)
                                                    @php
                                                        $recipientsIds =[];
                                                        $recipientsIds = App\Models\OrderItems::select("recipient_id")
                                                                                            ->where("orders_id",$data->id)
                                                                                            ->where("product_id",$itemDetails->product_id)
                                                                                            ->pluck("recipient_id")->toArray();
                                                        $index = array_search($itemDetails->recipient_id, $recipientsIds);
                                                        if($index==0){
                                                            $twopersondataId =  $recipientsIds[$index+1];
                                                        }else if($index % 2 == 0){
                                                        $twopersondataId =  $recipientsIds[$index+1];
                                                        }else{
                                                            $twopersondataId =  $recipientsIds[$index+1];
                                                        }
                                                        $twopersondata=DB::select("
                                                            select recipients.*,products.id as product_id,products.slug_en,
                                                            products.name_en,products.name_tc,products.name_sc,products.is_two_recipient,products.featured_img,
                                                            order_items.booking_id,order_items.order_status,order_items.orders_id,order_items.id as order_items_id,
                                                            order_items.recipient_id,order_items.total,order_items.updated_at
                                                            from recipients
                                                            join order_items on recipients.id=order_items.recipient_id
                                                            join products on products.id=recipients.product_id
                                                            where recipients.id=?
                                                            limit 1
                                                        ",[$twopersondataId]);
                                                        array_push($twoPersonCouponHaveShowList,$twopersondataId);
                                                    @endphp
                                                    <div
                                                        class="flex sm:flex-row flex-col mb-5 pb-5 last:border-b last:border-b-mee4">
                                                        <div class="mr-[10px]">
                                                            <img src="{{ $itemDetails->featured_img }}"
                                                                alt="booking-logo"
                                                                class="2xl:max-w-[96px] 2xl:max-h-[96px] sm:max-w-[50px] sm:max-h-[50px] max-w-[96px] max-h-[96px] object-cover rounded-xl sm:mx-0 mx-auto">
                                                        </div>
                                                        <div class="w-full">

                                                            <p class="me-body-20 font-bold text-darkgray"><a href="{{ route('product-detail', ['category'=>$itemDetails->category_name_en,'slug'=>isset($itemDetails->slug_en) ? $itemDetails->slug_en : '']) }}">{{@langbind($itemDetails,"name")}}</a></p>
                                                            <div component-name="me-member-order-detail-card-content"
                                                                class="me-member-dashboard-booking-card-content">

                                                                <div>
                                                                    <div
                                                                        class="mt-2 bg-blueMediq px-3 py-2 flex flex-wrap justify-between items-center">
                                                                        <p class="font-bold me-body-16 text-whitez">@lang('labels.order_details.booking_id') {{$itemDetails->booking_id}}</p>
                                                                        {{-- //@if($itemDetails->order_status==1 || $itemDetails->order_status==2) --}}
                                                                        @if($itemDetails->confirm_booking_date!=null)
                                                                            @php
                                                                                $now = \Carbon\Carbon::now()->startOfDay();
                                                                                $bookingDate = \Carbon\Carbon::parse($itemDetails->confirm_booking_date)->startOfDay();
                                                                                $diff= 0;
                                                                                if($bookingDate> $now) {
                                                                                $diff = $bookingDate->diffInDays($now);
                                                                                }
                                                                            @endphp
                                                                            @if($diff >= 3)
                                                                            <div data-id="{{$itemDetails->recipient_id}}"
                                                                                class="flex items-center edit-booking-btn cursor-pointer ">
                                                                                <img src="{{ asset('frontend/img/edit-booking-btn.svg') }}"
                                                                                    alt="edit-booking-btn">
                                                                                <p
                                                                                    class="font-normal me-body-14 text-whitez mt-1">
                                                                                    @lang('labels.order_details.edit_booking')</p>
                                                                            </div>
                                                                            @endif
                                                                        @else
                                                                            <div data-id="{{$itemDetails->recipient_id}}"
                                                                                class="flex items-center edit-booking-btn cursor-pointer ">
                                                                                <img src="{{ asset('frontend/img/edit-booking-btn.svg') }}"
                                                                                    alt="edit-booking-btn">
                                                                                <p
                                                                                    class="font-normal me-body-14 text-whitez mt-1">
                                                                                    @lang('labels.order_details.edit_booking')</p>
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    <div class="mt-[10px]">
                                                                        <div class="booking-confirmed-div ">
                                                                            <div
                                                                                class="flex flex-wrap-reverse items-center justify-between">
                                                                                <div>
                                                                                    <div class="flex items-start">
                                                                                        <div class="mr-[10px] mt-[2px]">
                                                                                            @if($itemDetails->order_status == 4)
                                                                                                <img src="{{asset('frontend/img/member-clapping.svg')}}"
                                                                                                    alt="statusIcon">
                                                                                            @elseif($itemDetails->order_status ==3)
                                                                                                <img src="{{asset('frontend/img/member-check-circle.svg')}}"
                                                                                                alt="statusIcon">
                                                                                            @elseif($itemDetails->order_status ==6 or $itemDetails->order_status ==7)
                                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                                                                                                    <path d="M9.10156 1.90966C7.59766 2.062 6.08203 2.65185 4.83594 3.57372C4.33203 3.94872 3.46484 4.812 3.09766 5.30419C1.39063 7.60888 0.91797 10.519 1.82031 13.23C2.82813 16.2651 5.42578 18.4604 8.65234 19.0034C9.25 19.1011 10.7813 19.1011 11.3477 18.9995C13.2148 18.6714 14.7891 17.8628 16.0742 16.5737C17.4883 15.1597 18.3398 13.3706 18.5586 11.3667C18.6211 10.7573 18.5859 9.64013 18.4805 9.03466C18.2344 7.64404 17.7031 6.41357 16.8516 5.28075C16.5664 4.90185 15.8633 4.16747 15.4609 3.83154C13.7383 2.39404 11.3789 1.6831 9.10156 1.90966ZM10.5859 3.27294C12.3086 3.42529 13.8711 4.14794 15.0742 5.35107C17.6719 7.94091 17.9492 11.9448 15.7266 14.894C15.4258 15.2964 14.7969 15.9253 14.3945 16.2261C12.8945 17.355 11.0664 17.8745 9.26172 17.687C6.73438 17.4214 4.55078 15.8901 3.46094 13.6245C2.50781 11.644 2.51172 9.3081 3.46875 7.32763C4.44141 5.31591 6.37109 3.82372 8.55469 3.39013C9.28906 3.2456 9.87891 3.21044 10.5859 3.27294Z" fill="#333333"></path>
                                                                                                    <path d="M6.77734 6.94011C6.58984 7.02604 6.50781 7.11198 6.42578 7.30729C6.35156 7.48698 6.35156 7.65104 6.42578 7.83464C6.46875 7.92839 6.91406 8.40495 7.74609 9.23698L9.00391 10.4987L7.74609 11.7604C6.47656 13.03 6.36719 13.1628 6.36719 13.4245C6.36719 13.9167 6.93359 14.2487 7.375 14.0182C7.45312 13.9753 8.07422 13.3854 8.75 12.7096L9.98047 11.4753L11.2305 12.7214C11.918 13.405 12.5352 13.9948 12.6055 14.03C12.9961 14.2253 13.5117 13.9635 13.582 13.5339C13.6367 13.1823 13.6523 13.1979 12.2539 11.7995L10.9609 10.4987L12.2344 9.22136C13.5977 7.84636 13.6211 7.81511 13.582 7.46745C13.5469 7.15495 13.2266 6.86589 12.9102 6.86589C12.6562 6.86589 12.4883 7.00651 11.25 8.2487C10.5742 8.92839 10.0039 9.48308 9.98047 9.48308C9.95703 9.48308 9.38672 8.92839 8.71094 8.2487C7.26953 6.80339 7.19141 6.7487 6.77734 6.94011Z" fill="#333333"></path>
                                                                                                </svg>
                                                                                            @else
                                                                                                <img src="{{asset('frontend/img/member-ast.svg')}}"
                                                                                                alt="statusIcon">
                                                                                            @endif
                                                                                        </div>
                                                                                        @php
                                                                                        $textColor = "";
                                                                                        if($itemDetails->order_status == 3) {
                                                                                            $textColor = "text-meGreen";
                                                                                        }else if($itemDetails->order_status == 2) {
                                                                                            $textColor = "text-darkgray";
                                                                                        }else if($itemDetails->order_status == 1) {
                                                                                            $textColor = "text-mered";
                                                                                        }
                                                                                        @endphp
                                                                                        <p
                                                                                            class="font-bold me-body-18 {{ $textColor }}">
                                                                                            {{config("mediq.booking_status_".app()->getLocale())[$itemDetails->order_status]}}</p>
                                                                                    </div>
                                                                                    <div
                                                                                        class="flex items-center mt-[10px]">
                                                                                        <div class="mr-[10px]">
                                                                                            <img src="{{ asset('frontend/img/member-user.svg') }}"
                                                                                                alt="member-user">
                                                                                        </div>
                                                                                        <p
                                                                                            class="font-normal me-body-18 text-darkgray">
                                                                                            {{$itemDetails->recipient->last_name}} {{$itemDetails->recipient->first_name}}</p>
                                                                                    </div>
                                                                                </div>
                                                                                @if($itemDetails->order_status==7)
                                                                                    <div class="flex items-center mt-3">
                                                                                        <button data-id="{{$itemDetails->id}}" class="refund-detail-btn-content rounded-md min-w-[135px] py-[9px] px-5 me-body-16 font-normal text-darkgray border-1 border-darkgray hover:border-orangeMediq hover:text-orangeMediq">@lang('labels.order_details.refund_details')</button>
                                                                                    </div>
                                                                                    <div id="me-checkout-refund-complete-popup{{$itemDetails->id}}" class="hidden me-checkout-refund-complete-popup">
                                                                                        <div
                                                                                            class="max-h-[80%] me-checkout-refund-complete-popup-content overflow-visible xl:p-10 p-5 rounded-[12px] sm:max-w-[438px] sm:min-w-[unset] min-w-[95%]">
                                                                                            <div class="relative w-full overflow-y-auto custom-cancellation-scrollbar">
                                                                                                <button
                                                                                                    class="z-[1] absolute top-0 right-0 focus-visible:outline-none focus:outline-none p-1"
                                                                                                    id="me-checkout-refund-complete-popup-close-btn"><img
                                                                                                        class=" w-auto h-auto align-middle"
                                                                                                        src="{{ asset('frontend/img/close-btn.png') }}" alt=""></button>
                                                                                                <div class="flex items-center">
                                                                                                    <img src="{{ asset('frontend/img/member-check-circle.svg') }}"
                                                                                                        alt="statusIcon" class="mr-2">
                                                                                                    <h1 class="me-body-23 font-bold text-meGreen">
                                                                                                        @lang('labels.order_details.refunded')</h1>
                                                                                                </div>
                                                                                                <hr class="my-5 bg-mee4">
                                                                                                <div>
                                                                                                    <p class="font-bold me-body-18 text-darkgray"> @lang('labels.order_details.refunded_on') {{date('d F Y H:i A', strtotime($itemDetails->updated_at))}}</p>
                                                                                                    <p class="font-normal me-body-18 text-darkgray mt-1">@lang('labels.order_details.refunded_successfully')
                                                                                                    </p>
                                                                                                </div>
                                                                                                <hr class="my-5 bg-mee4">
                                                                                                <div class="flex justify-between">
                                                                                                    <p class="font-bold me-body-18 text-darkgray">@lang('labels.order_details.refunded_amount')</p>
                                                                                                    <p class="font-bold me-body-18 text-darkgray">HK$ {{$itemDetails->total}}</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                @else
                                                                                    <div class="flex items-center my-1">
                                                                                        <div class="flex items-center pr-3">
                                                                                            <p
                                                                                                class="font-bold me-body-45 text-darkgray leading-[normal] booking-selected-dayno booking-selected-dayno-1">
                                                                                                {{$itemDetails->confirm_booking_date!=null?date('j', strtotime($itemDetails->confirm_booking_date)):''}}</p>
                                                                                            <p
                                                                                                class="font-bold me-body-16 text-darkgray max-w-[30px] leading-[normal] booking-selected-month-day booking-selected-month-day-1">
                                                                                                {{$itemDetails->confirm_booking_date!=null?date('M', strtotime($itemDetails->confirm_booking_date)):''}}
                                                                                                {{$itemDetails->confirm_booking_date!=null?date('D', strtotime($itemDetails->confirm_booking_date)):''}}</p>
                                                                                        </div>
                                                                                        <div
                                                                                            class="border-l-1 border-l-mee4 pl-3">
                                                                                            <p
                                                                                                class="font-bold me-body-28 text-darkgray leading-[normal] booking-selected-time booking-selected-time-1">
                                                                                                {{$itemDetails->confirm_booking_time!==null?$itemDetails->confirm_booking_time:''}}</p>
                                                                                        </div>
                                                                                    </div>
                                                                                @endif
                                                                                
                                                                            </div>
                                                                        </div>
                                                                        @php
                                                                        $recipient = App\Models\Recipient::select('recipients.*')
                                                                                    ->join('products','recipients.product_id','=','products.id')
                                                                                    ->where('recipients.id',$itemDetails->recipient_id)
                                                                                    ->first();
                                                                        $recipient->order_details_edit = 1;
                                                                        //$product_merchant = $recipient->product->merchant()->with(['merchantLocations','merchantLocations.area','merchantLocations.weekDays','merchantLocations.events'])->first();
                                                                        $product_merchant = $recipient->product->product_location_data;
                                                                        @endphp
                                                                        @if($itemDetails->date != null && $itemDetails->confirm_booking_date != null)
                                                                        <div class="flex mt-1">
                                                                            <div class="flex w-full justify-between preferredTime-detail3 flex">
                                                                                <div class="flex items-center">
                                                                                    <div class="mr-2 max-w-[24px] w-[24px]">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                                                                                            <path
                                                                                                d="M14.1667 12.1667C14.3877 12.1667 14.5996 12.0789 14.7559 11.9226C14.9122 11.7663 15 11.5543 15 11.3333C15 11.1123 14.9122 10.9004 14.7559 10.7441C14.5996 10.5878 14.3877 10.5 14.1667 10.5C13.9457 10.5 13.7337 10.5878 13.5774 10.7441C13.4211 10.9004 13.3333 11.1123 13.3333 11.3333C13.3333 11.5543 13.4211 11.7663 13.5774 11.9226C13.7337 12.0789 13.9457 12.1667 14.1667 12.1667ZM14.1667 15.5C14.3877 15.5 14.5996 15.4122 14.7559 15.2559C14.9122 15.0996 15 14.8877 15 14.6667C15 14.4457 14.9122 14.2337 14.7559 14.0774C14.5996 13.9211 14.3877 13.8333 14.1667 13.8333C13.9457 13.8333 13.7337 13.9211 13.5774 14.0774C13.4211 14.2337 13.3333 14.4457 13.3333 14.6667C13.3333 14.8877 13.4211 15.0996 13.5774 15.2559C13.7337 15.4122 13.9457 15.5 14.1667 15.5ZM10.8333 11.3333C10.8333 11.5543 10.7455 11.7663 10.5893 11.9226C10.433 12.0789 10.221 12.1667 10 12.1667C9.77899 12.1667 9.56702 12.0789 9.41074 11.9226C9.25446 11.7663 9.16667 11.5543 9.16667 11.3333C9.16667 11.1123 9.25446 10.9004 9.41074 10.7441C9.56702 10.5878 9.77899 10.5 10 10.5C10.221 10.5 10.433 10.5878 10.5893 10.7441C10.7455 10.9004 10.8333 11.1123 10.8333 11.3333ZM10.8333 14.6667C10.8333 14.8877 10.7455 15.0996 10.5893 15.2559C10.433 15.4122 10.221 15.5 10 15.5C9.77899 15.5 9.56702 15.4122 9.41074 15.2559C9.25446 15.0996 9.16667 14.8877 9.16667 14.6667C9.16667 14.4457 9.25446 14.2337 9.41074 14.0774C9.56702 13.9211 9.77899 13.8333 10 13.8333C10.221 13.8333 10.433 13.9211 10.5893 14.0774C10.7455 14.2337 10.8333 14.4457 10.8333 14.6667ZM5.83333 12.1667C6.05435 12.1667 6.26631 12.0789 6.42259 11.9226C6.57887 11.7663 6.66667 11.5543 6.66667 11.3333C6.66667 11.1123 6.57887 10.9004 6.42259 10.7441C6.26631 10.5878 6.05435 10.5 5.83333 10.5C5.61232 10.5 5.40036 10.5878 5.24408 10.7441C5.0878 10.9004 5 11.1123 5 11.3333C5 11.5543 5.0878 11.7663 5.24408 11.9226C5.40036 12.0789 5.61232 12.1667 5.83333 12.1667ZM5.83333 15.5C6.05435 15.5 6.26631 15.4122 6.42259 15.2559C6.57887 15.0996 6.66667 14.8877 6.66667 14.6667C6.66667 14.4457 6.57887 14.2337 6.42259 14.0774C6.26631 13.9211 6.05435 13.8333 5.83333 13.8333C5.61232 13.8333 5.40036 13.9211 5.24408 14.0774C5.0878 14.2337 5 14.4457 5 14.6667C5 14.8877 5.0878 15.0996 5.24408 15.2559C5.40036 15.4122 5.61232 15.5 5.83333 15.5Z"
                                                                                                fill="#333333"></path>
                                                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                                                d="M5.83268 1.95801C5.99844 1.95801 6.15741 2.02386 6.27462 2.14107C6.39183 2.25828 6.45768 2.41725 6.45768 2.58301V3.21884C7.00935 3.20801 7.61685 3.20801 8.28518 3.20801H11.7127C12.3818 3.20801 12.9893 3.20801 13.541 3.21884V2.58301C13.541 2.41725 13.6069 2.25828 13.7241 2.14107C13.8413 2.02386 14.0003 1.95801 14.166 1.95801C14.3318 1.95801 14.4907 2.02386 14.608 2.14107C14.7252 2.25828 14.791 2.41725 14.791 2.58301V3.27217C15.0077 3.28884 15.2127 3.30967 15.4068 3.33551C16.3835 3.46717 17.1743 3.74384 17.7985 4.36717C18.4218 4.99134 18.6985 5.78217 18.8302 6.75884C18.9577 7.70884 18.9577 8.92134 18.9577 10.453V12.213C18.9577 13.7447 18.9577 14.958 18.8302 15.9072C18.6985 16.8838 18.4218 17.6747 17.7985 18.2988C17.1743 18.9222 16.3835 19.1988 15.4068 19.3305C14.4568 19.458 13.2443 19.458 11.7127 19.458H8.28601C6.75435 19.458 5.54102 19.458 4.59185 19.3305C3.61518 19.1988 2.82435 18.9222 2.20018 18.2988C1.57685 17.6747 1.30018 16.8838 1.16852 15.9072C1.04102 14.9572 1.04102 13.7447 1.04102 12.213V10.453C1.04102 8.92134 1.04102 7.70801 1.16852 6.75884C1.30018 5.78217 1.57685 4.99134 2.20018 4.36717C2.82435 3.74384 3.61518 3.46717 4.59185 3.33551C4.78602 3.30967 4.99185 3.28884 5.20768 3.27217V2.58301C5.20768 2.41725 5.27353 2.25828 5.39074 2.14107C5.50795 2.02386 5.66692 1.95801 5.83268 1.95801ZM4.75768 4.57467C3.92018 4.68717 3.43685 4.89884 3.08435 5.25134C2.73185 5.60384 2.52018 6.08717 2.40768 6.92551C2.38852 7.06717 2.37268 7.21717 2.35935 7.37467H17.6393C17.626 7.21634 17.6102 7.06717 17.591 6.92467C17.4785 6.08717 17.2668 5.60384 16.9143 5.25134C16.5618 4.89884 16.0785 4.68717 15.2402 4.57467C14.3843 4.45967 13.2552 4.45801 11.666 4.45801H8.33268C6.74351 4.45801 5.61518 4.45967 4.75768 4.57467ZM2.29102 10.4997C2.29102 9.78801 2.29102 9.16884 2.30185 8.62467H17.6968C17.7077 9.16884 17.7077 9.78801 17.7077 10.4997V12.1663C17.7077 13.7555 17.706 14.8847 17.591 15.7413C17.4785 16.5788 17.2668 17.0622 16.9143 17.4147C16.5618 17.7672 16.0785 17.9788 15.2402 18.0913C14.3843 18.2063 13.2552 18.208 11.666 18.208H8.33268C6.74351 18.208 5.61518 18.2063 4.75768 18.0913C3.92018 17.9788 3.43685 17.7672 3.08435 17.4147C2.73185 17.0622 2.52018 16.5788 2.40768 15.7405C2.29268 14.8847 2.29102 13.7555 2.29102 12.1663V10.4997Z"
                                                                                                fill="#333333"></path>
                                                                                        </svg>
                                                                                    </div>
                                                                                    <p class="font-normal me-body-18 text-darkgray flex items-center preferredTime">
                                                                                        <span class="preferred-name-3 hidden"></span>
                                                                                        <span class="preferred-date-3 hidden"></span>
                                                                                        <span class="preferred-date-custom-3 ">{{date('d F Y', strtotime($itemDetails->date))}} </span>
                                                                                        <span class="preferred-timeDesc-3 ml-[10px]">{{$itemDetails->time}}</span>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @endif
                                                                        @if($recipient->variable_id != NULL)
                                                                        @php $vairableProductName = \App\Models\ProductVariation::find($recipient->variable_id); @endphp
                                                                        <div class="flex w-full justify-between my-1">
                                                                            <div class="flex items-center">
                                                                                <div class="mr-2 max-w-[24px] w-[24px]">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17" fill="none">
                                                                                        <path d="M2.26253 9.27684H1.08814H1.08799V9.12684L2.26253 9.27684ZM2.26253 9.27684L2.26253 15.5893L2.26253 15.5895C2.26286 15.8717 2.37512 16.1423 2.57469 16.3419C2.77425 16.5414 3.04481 16.6537 3.32703 16.654H3.32721H16.6725H16.6727C16.9549 16.6537 17.2255 16.5414 17.4251 16.3419C17.6246 16.1423 17.7369 15.8717 17.7372 15.5895V15.5893V9.27684H18.9116H18.9117V9.12684L2.26253 9.27684ZM8.78542 9.03306L8.78539 9.03313C8.75124 9.10602 8.69701 9.16766 8.62908 9.21083L8.54864 9.08422L8.62907 9.21083C8.56113 9.25399 8.48229 9.27689 8.4018 9.27684M8.78542 9.03306L8.4018 9.27684M8.78542 9.03306L9.57643 7.34247V15.8071H3.32799H3.32787C3.26999 15.8072 3.21447 15.7843 3.1735 15.7434C3.13256 15.7025 3.10951 15.6471 3.1094 15.5893C3.1094 15.5892 3.1094 15.5892 3.1094 15.5891L3.1094 15.2525H7.22081C7.33311 15.2525 7.44081 15.2078 7.52022 15.1284C7.59963 15.049 7.64425 14.9413 7.64425 14.829C7.64425 14.7167 7.59963 14.609 7.52022 14.5296C7.44081 14.4502 7.33311 14.4056 7.22081 14.4056H3.1094V9.27684M8.78542 9.03306L3.1094 9.27684M8.4018 9.27684H3.1094M8.4018 9.27684H3.1094M9.56331 4.84103L9.5633 4.84103L7.74516 3.11999C7.53434 2.90837 7.41595 2.62179 7.41599 2.32302C7.41603 2.02358 7.53502 1.73642 7.74678 1.52471C7.95854 1.31301 8.24573 1.19409 8.54517 1.19413C8.84461 1.19417 9.13177 1.31316 9.34348 1.52492L9.7005 1.8821L9.70056 1.88216C9.77996 1.9615 9.88762 2.00608 9.99987 2.00608C10.1121 2.00608 10.2198 1.9615 10.2992 1.88216L10.2992 1.88212L10.6187 1.56259L10.6188 1.56261L10.6208 1.56052C10.8243 1.34893 11.1006 1.22244 11.3938 1.2066C11.6865 1.19078 11.9742 1.28638 12.1992 1.47412C12.3147 1.57531 12.4084 1.699 12.4744 1.83763C12.5407 1.97673 12.5778 2.12793 12.5834 2.28191C12.589 2.43589 12.563 2.58939 12.5071 2.73296C12.4514 2.87578 12.3673 3.00575 12.2597 3.11497L10.4364 4.84103L10.5396 4.94996L10.4364 4.84103C10.3185 4.95269 10.1623 5.01491 9.99987 5.01491C9.83747 5.01491 9.68124 4.95269 9.56331 4.84103ZM1.75364 8.42996L2.95544 5.86168H9.33424L8.13257 8.42996H1.75364ZM16.8903 15.5891C16.8903 15.6469 16.8673 15.7023 16.8264 15.7432C16.7855 15.7841 16.7301 15.8071 16.6723 15.8071H10.4233V7.34247L11.2143 9.03304C11.2143 9.03305 11.2143 9.03306 11.2143 9.03306C11.2484 9.10599 11.3026 9.16768 11.3706 9.21088C11.4385 9.25408 11.5173 9.27701 11.5978 9.27699C11.5979 9.27699 11.5979 9.27699 11.5979 9.27699H16.8903V15.5891ZM18.2469 8.42996H11.8672L10.6655 5.86168H17.0451L18.2469 8.42996Z" fill="#333333" stroke="#333333" stroke-width="0.3"></path>
                                                                                        </svg>
                                                                                </div>
                                                                                <p class="font-normal me-body-18 text-darkgray flex items-center packages_item leading-[normal]">
                                                                                    {{-- //Whole Body Screening (Plain + Contrast) --}}
                                                                                    {{ langbind($vairableProductName, 'name') }}</p>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        @endif
                                                                        <input type="hidden" class="hidden location-json-data location-json-data-receipientData{{$recipient->id}}" value="{{ json_encode($product_merchant)}}">
                                                                        <div class="mt-[5px] flex items-center ">
                                                                            @php
                                                                            $product = App\Models\Product::find($itemDetails->product_id);
                                                                            $location = App\Models\MerchantLocation::where("area_id", $itemDetails->confirm_location)
                                                                                                        ->where("merchant_id",$product->merchant->id)->first();
    
                                                                            @endphp
                                                                            @if($itemDetails->confirm_booking_date!=null)
                                                                            <div class="mr-[10px]">
                                                                                <img src="{{ asset('frontend/img/member-location.png') }}"
                                                                                    alt="member-location"
                                                                                    class="min-w-[20px]">
                                                                            </div>
                                                                            <p
                                                                                class="font-normal me-body-18 text-darkgray leading-[normal] preferred-name-1">
                                                                                {{@langbind($location,'full_address')}}
                                                                            </p>
                                                                            @endif
                                                                        </div>
                                                                        @if(count($recipient->group_data) > 0)
                                                                        @foreach($recipient->group_data as $group)
                                                                            @php
                                                                                $checkUpTable = $recipient->product->package->checkupTable;
                                                                                $tablePriIds =
                                                                                App\Models\CheckUpTableType::where('check_up_type_id',2)->where('check_up_table_id',$checkUpTable->id)->pluck('id')->toArray();
                                                                                $optionGroupIds=
                                                                                App\Models\CheckTableItem::where('check_up_group_id',$group->id)->whereIn('check_up_table_type_id',$tablePriIds)->distinct()->pluck('check_up_item_id')->toArray();
                                                                                $countEquivalentNumber = App\Models\CheckUpItem::whereIn('id',$optionGroupIds)->sum('equivalent_number');
                                                                            @endphp
                                                                            <div component-name="me-checkout-merchant-recipient-cancerMarker-detail"
                                                                                class="mt-1">
                                                                                <div class="flex sm:flex-row flex-col">

                                                                                    <div
                                                                                        class="flex w-full justify-between cancer-markers-detail-data1-receipientData111">
                                                                                        <div class="flex items-center w-full">
                                                                                            <div class="mr-2 max-w-[24px] w-[24px]">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                                                    height="25" viewBox="0 0 24 25" fill="none">
                                                                                                    <path
                                                                                                        d="M9.4979 3.00898C8.94263 3.08328 8.22312 3.3531 7.73824 3.66984C7.3824 3.90446 6.83104 4.44409 6.60815 4.77647C6.38525 5.10885 6.15845 5.58982 6.02941 6.01605C5.93165 6.34452 5.92383 6.41882 5.91992 7.0914C5.91992 7.72097 5.92774 7.83437 5.99422 7.96341C6.20929 8.39746 6.8193 8.40919 7.03046 7.98296C7.09694 7.8461 7.10085 7.7718 7.08521 7.28692C7.05784 6.66126 7.11258 6.36407 7.32765 5.89092C7.49189 5.53508 7.65221 5.30046 7.91812 5.03846C8.81359 4.13908 10.1431 3.91228 11.2849 4.45582C12.0475 4.81948 12.6497 5.55072 12.8647 6.38363C12.9273 6.61043 12.9429 6.78639 12.939 7.1305C12.9234 7.90476 12.9273 7.91649 13.0055 8.02207C13.2088 8.29188 13.4786 8.36227 13.7563 8.21758C13.9909 8.09636 14.0652 7.93995 14.1082 7.47853C14.1786 6.72774 14.0457 6.00823 13.7015 5.31219C13.4552 4.80775 13.2049 4.46755 12.8178 4.10389C12.0748 3.40002 11.1794 3.03245 10.1431 3.00507C9.86548 2.99725 9.5722 3.00116 9.4979 3.00898Z"
                                                                                                        fill="#333333" />
                                                                                                    <path
                                                                                                        d="M9.54314 5.43202C9.05825 5.56106 8.62029 5.93645 8.39349 6.41352L8.26836 6.67942L8.25663 11.3992C8.25272 14.07 8.23316 16.1229 8.21361 16.1229C8.19406 16.1229 8.03374 15.9626 7.85386 15.7632C7.2282 15.0789 6.84499 14.8873 6.14503 14.9186C5.81656 14.9303 5.73053 14.9498 5.49982 15.0632C4.48704 15.552 4.17812 16.862 4.87807 17.7184C4.97583 17.8435 5.97689 18.9189 7.09525 20.1115C9.18338 22.3326 9.35544 22.4968 9.85988 22.7315C10.4191 22.9934 10.2978 22.9817 13.3284 22.9974C15.6237 23.0052 16.1321 22.9974 16.3863 22.9504C16.9885 22.837 17.4577 22.5868 17.9113 22.1449C18.4157 21.6483 18.6895 21.0656 18.7716 20.3188C18.7951 20.0685 18.8068 18.8328 18.799 16.7877L18.7833 13.6399L18.6973 13.4052C18.5096 12.9047 18.1303 12.5176 17.6415 12.326C17.3404 12.2087 16.7734 12.1969 16.4645 12.3064C16.2572 12.3768 16.2494 12.3768 16.2025 12.3064C15.9209 11.8998 15.6785 11.6925 15.2914 11.54C14.9942 11.4266 14.4233 11.4188 14.1183 11.5244C13.911 11.5947 13.9032 11.5947 13.8563 11.5244C13.5747 11.1177 13.3284 10.9104 12.9451 10.7618C12.7105 10.668 12.1983 10.6406 11.9167 10.6993L11.7681 10.7306V8.87313C11.7681 7.67265 11.7525 6.94142 11.7251 6.80846C11.5179 5.81132 10.5051 5.17393 9.54314 5.43202ZM10.3135 6.64814C10.3682 6.69115 10.4503 6.77327 10.4934 6.83193C10.5755 6.93751 10.5755 6.97661 10.595 10.668C10.6146 14.3633 10.6146 14.3985 10.6967 14.508C10.8727 14.7504 11.2246 14.8247 11.4553 14.6644C11.7486 14.4649 11.7447 14.4806 11.7681 13.2684C11.7877 12.2439 11.7916 12.1735 11.8698 12.0679C12.124 11.7238 12.6206 11.759 12.8435 12.1383C12.9139 12.2595 12.9217 12.3612 12.9412 13.3349C12.9608 14.332 12.9647 14.4024 13.0429 14.508C13.2971 14.8521 13.7937 14.8169 14.0166 14.4376C14.0831 14.3242 14.0987 14.2108 14.1143 13.632C14.13 13.0338 14.1417 12.9477 14.216 12.85C14.4702 12.5059 14.9668 12.5411 15.1897 12.9204C15.2562 13.0338 15.2718 13.1472 15.2875 13.7259C15.3031 14.3242 15.3148 14.4102 15.3891 14.508C15.5103 14.6722 15.7059 14.7621 15.9092 14.7426C16.2416 14.7074 16.4136 14.4845 16.4567 14.0309C16.4762 13.8315 16.5075 13.7024 16.5622 13.632C16.8164 13.2879 17.313 13.3231 17.5359 13.7024C17.6141 13.8315 17.6141 13.9058 17.6141 17.1005C17.6141 20.1975 17.6102 20.3774 17.5398 20.5808C17.3248 21.2103 16.8281 21.6639 16.2103 21.793C16.0695 21.8203 15.1662 21.8321 13.3479 21.8242C10.6928 21.8125 10.6928 21.8125 10.4738 21.7226C10.3526 21.6757 10.1727 21.5779 10.0749 21.5075C9.8325 21.3355 5.7931 17.038 5.72271 16.8776C5.60931 16.6156 5.69143 16.3419 5.9456 16.1542C6.059 16.0682 6.32882 16.0486 6.49305 16.1151C6.5478 16.1386 7.00531 16.5844 7.50584 17.1084C8.01027 17.6284 8.46388 18.0899 8.51862 18.125C8.65939 18.2228 8.97613 18.2189 9.13646 18.1172C9.20684 18.0781 9.29287 17.9843 9.33198 17.9139C9.39845 17.7927 9.40236 17.4877 9.42191 12.3416C9.44147 6.91404 9.44147 6.8984 9.52358 6.78891C9.70346 6.54256 10.0828 6.47608 10.3135 6.64814Z"
                                                                                                        fill="#333333" />
                                                                                                </svg>
                                                                                            </div>
                                                                                            <p
                                                                                                class="mr-2 font-normal me-body-18 text-darkgray underline  cancer-markers-label-1-receipientData{{$group->id}}{{$recipient->id}} ">
                                                                                                {{langbind($group,'name')}} (<span
                                                                                                    class="selected-cancermarkers-count-1-receipientData111">{{$group->itemDatas($group->id,$recipient->id,$recipient->product->id)->sum('equivalent_number')}}</span>
                                                                                                    @lang('labels.check_out.selected'))</p>
                                                                                            <div class="showDropdown-btn active">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                                                    height="7" viewBox="0 0 12 7" fill="none">
                                                                                                    <path
                                                                                                        d="M0.042841 6.46313C0.14831 6.69047 0.413154 6.7936 0.649873 6.6975C0.713154 6.67172 1.46315 5.93344 3.36628 4.02094L5.99831 1.37719L8.628 4.02094C10.5358 5.93579 11.2835 6.67172 11.3467 6.6975C11.396 6.71625 11.478 6.73266 11.5296 6.73266C11.8671 6.73266 12.0944 6.39047 11.9538 6.08813C11.8905 5.95454 6.32878 0.367034 6.19753 0.308441C6.078 0.252191 5.91862 0.252191 5.79909 0.308441C5.66784 0.367034 0.106123 5.95453 0.042841 6.08813C-0.0134086 6.20766 -0.0134086 6.3436 0.042841 6.46313Z"
                                                                                                        fill="#333333" />
                                                                                                </svg>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="hidden detail-data-list1-receipientData111">
                                                                                    <div component-name="me-checkout-merchant-recipient-cancerMarkers-detail-list"
                                                                                        class="pl-8 mt-1">
                                                                                        <ul
                                                                                            class="custom-list-style bg-far px-5 py-[10px] rounded-[12px] cancerMarkers-detail-data1-receipientData111">
                                                                                            @if(count($group->itemDatas($group->id,$recipient->id,$recipient->product->id)) > 0)
                                                                                                @foreach($group->itemDatas($group->id,$recipient->id,$recipient->product->id) as $item)
                                                                                                <li class="flex items-center mt-2">
                                                                                                    <span class="mr-4 font-normal me-body-18 text-darkgray">{{langbind($item,'name')}}</span>
                                                                                                </li>
                                                                                                @endforeach
                                                                                            @else 
                                                                                            <li class="flex items-center mt-2">
                                                                                                <span class="mr-4 font-normal me-body-18 text-darkgray">@lang('labels.product_detail.decide_later')</span>
                                                                                            </li>
                                                                                            @endif
                                                                                        </ul>
                                                                                    </div>
                                                                                       
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                        @endif
                                                                        @if(count($recipient->add_on_data) > 0)
                                                                        <div component-name="me-checkout-merchant-recipient-preferredTime-detail"
                                                                            class="mt-1">
                                                                            <div>
                                                                                <div class="flex w-full justify-between addson-show-detail-receipientData111"
                                                                                    style="display:block">
                                                                                    <div class="flex items-center w-full">
                                                                                        <div class="mr-2 max-w-[24px] w-[24px]">
                                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                                                height="25" viewBox="0 0 24 25" fill="none">
                                                                                                <path
                                                                                                    d="M12.5 21C17.1944 21 21 17.1944 21 12.5C21 7.80558 17.1944 4 12.5 4C7.80558 4 4 7.80558 4 12.5C4 17.1944 7.80558 21 12.5 21Z"
                                                                                                    stroke="#333333" stroke-linecap="round"
                                                                                                    stroke-linejoin="round" />
                                                                                                <path
                                                                                                    d="M12.4992 8.57715V16.4233M8.57617 12.5002H16.4223"
                                                                                                    stroke="#333333" stroke-linecap="round"
                                                                                                    stroke-linejoin="round" />
                                                                                            </svg>
                                                                                        </div>
                                                                                        <p data-id="receipientData111"
                                                                                            class="mr-2 font-normal me-body-18 text-darkgray underline">
                                                                                            @lang('labels.check_out.add_on')</p>
                                                                                        <div class="showDropdown-btn active">
                                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                                                height="7" viewBox="0 0 12 7" fill="none">
                                                                                                <path
                                                                                                    d="M0.042841 6.46313C0.14831 6.69047 0.413154 6.7936 0.649873 6.6975C0.713154 6.67172 1.46315 5.93344 3.36628 4.02094L5.99831 1.37719L8.628 4.02094C10.5358 5.93579 11.2835 6.67172 11.3467 6.6975C11.396 6.71625 11.478 6.73266 11.5296 6.73266C11.8671 6.73266 12.0944 6.39047 11.9538 6.08813C11.8905 5.95454 6.32878 0.367034 6.19753 0.308441C6.078 0.252191 5.91862 0.252191 5.79909 0.308441C5.66784 0.367034 0.106123 5.95453 0.042841 6.08813C-0.0134086 6.20766 -0.0134086 6.3436 0.042841 6.46313Z"
                                                                                                    fill="#333333" />
                                                                                            </svg>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class=" addson-detail-list-receipientData111">
                                                                                <div component-name="me-checkout-merchant-recipient-addonItems-detail-list"
                                                                                    class="pl-8 mt-1">
                                                                                    <ul
                                                                                        class="custom-list-style bg-far px-5 py-[10px] rounded-[12px] adds-on-checklist-detailreceipientData111">
                                                                                        @foreach($recipient->add_on_data as $item)
                                                                                        <li data-text="Upper Abdomen Ultrasound"
                                                                                            data-price="{{$item->discount_price ? $item->discount_price :$item->original_price}}"
                                                                                            class="flex items-center mt-2">
                                                                                            <span
                                                                                                class="mr-4 font-normal me-body-18 text-darkgray">{{langbind($item,'name')}}</span>
                                                                                            <span
                                                                                                class="font-normal me-body-18 text-darkgray">${{$item->discount_price ? $item->discount_price :$item->original_price}}</span>
                                                                                        </li>
                                                                                        @endforeach
                                                                                    </ul>
                                                                                </div>
                                                                            </div>


                                                                            <div class="hidden">
                                                                                <input data-id="receipientData111" value="" type="hidden"
                                                                                    class="addson-checklist addson-checklist-undefined addson-checklist-receipientData111" />
                                                                            </div>
                                                                        </div>
                                                                        @endif
                                                                        @if($recipient->have_referral!=NULL)
                                                                        <div component-name="me-checkout-order-referral-letter" class="w-full justify-between referral-detail mt-2">
                                                                            <div class="flex items-center w-full">        
                                                                                <p class="mr-2 font-normal me-body-18 text-darkgray">@lang('labels.order_details.referral_letter'): <span class="selected-addson">@lang('labels.compare.yes')</span></p>       
                                                                            </div>
                                                                            <div class="mt-4">
                                                                                <div class="inline-block hover:border-orangeMediq hover:text-orangeMediq relative min-h-[40px] py-2 px-5 border-1 border-darkgray text-center me-body16 rounded-[6px] min-w-[135px] leading-[22.4px]">
                                                                                    <a href="{{$recipient->file_upload}}" class="absolute top-[48%] left-1/2 -translate-x-1/2 -translate-y-1/2">@lang('labels.order_details.view')</a>
                                                                                </div>
                                                                            </div>
                                                                            @if($recipient->message!=NULL)
                                                                            <p
                                                                                class="mt-2 font-normal me-body-18 text-darkgray">
                                                                                @lang('labels.partnership.message'): {{$recipient->message}}
                                                                            </p>
                                                                            @endif
                                                                        </div>
                                                                        @endif
                                                                        @if($itemDetails->remark!="")
                                                                        <p
                                                                            class="font-normal me-body-18 text-darkgray mt-[10px] ">
                                                                            @lang('labels.check_out.special_requests'): {{$itemDetails->remark}}
                                                                        </p>
                                                                        @endif
                                                                        @if($itemDetails->order_status==1)
                                                                            @if($itemDetails->confirm_booking_date!=null)
                                                                            <p class="font-normal me-body-16 text-orangeMediq">@lang('labels.order_details.booking_comfirmed_text_1') {{\Carbon\Carbon::parse($itemDetails->created_at)->addDays(3)->format('d F Y')}} @lang('labels.order_details.booking_comfirmed_text_2')</p>
                                                                            @else
                                                                            <p class="font-normal me-body-16 text-orangeMediq">@lang('labels.order_details.please_click_text3') {{ \Carbon\Carbon::parse($itemDetails->created_at)->addDays(3)->format('d F Y')}} @lang('labels.order_details.please_click_text4')</p>
                                                                            @endif
                                                                        @endif
                                                                        @if($itemDetails->order_status==2)
                                                                        <p class="font-normal me-body-18 text-darkgray">@lang('labels.order_details.2_working_days_text1') <a href="https://api.whatsapp.com/send?phone=85295194000" target="_blank" class="underline underline-offset-2">@lang('labels.order_details.2_working_days_text2') </a></p>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div id="me-member-order-edit-booking-popup" class="hidden me-member-order-edit-booking-popup me-member-order-edit-booking-popup-{{$itemDetails->recipient_id}}">
                                                                    <div
                                                                        class="me-member-order-edit-booking-popup-content overflow-visible px-5 rounded-[12px] xl:min-w-[1060px] max-w-[1000px] min-w-[90%] max-h-[80%]">
                                                                        <div
                                                                            class="w-full h-full overflow-y-auto py-5 lg:py-10">
                                                                            <button data-id="{{$itemDetails->recipient_id}}"
                                                                                class="z-[1] absolute top-5 right-5 focus-visible:outline-none focus:outline-none p-1"
                                                                                id="me-member-order-edit-booking-popup-closebtn"><img
                                                                                    class=" w-auto h-auto align-middle"
                                                                                    src="{{ asset('frontend/img/close-btn.png') }}"
                                                                                    alt=""></button>
                                                                            <div>
                                                                                <div class="flex justify-between">
                                                                                    <h3
                                                                                        class="font-bold me-body-23 text-darkgray text-left">
                                                                                        @lang('labels.order_details.edit_booking')</h3>
                                                                                </div>
                                                                                <hr class="my-5 bg-mee4">
                                                                                <div>
                                                                                    <div component-name="me-checkout-merchant-recipient-data"
                                                                                        class="">
                                                                                        <div
                                                                                            class="me-checkout-merchant-content-card-container">
                                                                
                                                                                            <div data-id="1"
                                                                                                data-parentid="1"
                                                                                                class="mt-7 data-card-items data-card-items-1">
                                                                                                <p
                                                                                                    class="hidden font-bold me-body-20 text-white px-5 py-[10px] bg-blueMediq">
                                                                                                </p>
                                                                                                <div class="mt-4">
                                                                                                    <div component-name="me-checkout-merchant-recipient-preferredTime-detail"
                                                                                                        class="mt-1 @@refundCard">
                                                                
                                                                                                        <div
                                                                                                            class="flex">
                                                                                                            <div
                                                                                                                class="flex preferredTime-placeholder1 hidden">
                                                                                                                <div
                                                                                                                    class="mr-2 max-w-[24px] w-[24px]">
                                                                                                                    <svg xmlns="http://www.w3.org/2000/svg')}}"
                                                                                                                        width="20"
                                                                                                                        height="21"
                                                                                                                        viewBox="0 0 20 21"
                                                                                                                        fill="none">
                                                                                                                        <path
                                                                                                                            d="M14.1667 12.1667C14.3877 12.1667 14.5996 12.0789 14.7559 11.9226C14.9122 11.7663 15 11.5543 15 11.3333C15 11.1123 14.9122 10.9004 14.7559 10.7441C14.5996 10.5878 14.3877 10.5 14.1667 10.5C13.9457 10.5 13.7337 10.5878 13.5774 10.7441C13.4211 10.9004 13.3333 11.1123 13.3333 11.3333C13.3333 11.5543 13.4211 11.7663 13.5774 11.9226C13.7337 12.0789 13.9457 12.1667 14.1667 12.1667ZM14.1667 15.5C14.3877 15.5 14.5996 15.4122 14.7559 15.2559C14.9122 15.0996 15 14.8877 15 14.6667C15 14.4457 14.9122 14.2337 14.7559 14.0774C14.5996 13.9211 14.3877 13.8333 14.1667 13.8333C13.9457 13.8333 13.7337 13.9211 13.5774 14.0774C13.4211 14.2337 13.3333 14.4457 13.3333 14.6667C13.3333 14.8877 13.4211 15.0996 13.5774 15.2559C13.7337 15.4122 13.9457 15.5 14.1667 15.5ZM10.8333 11.3333C10.8333 11.5543 10.7455 11.7663 10.5893 11.9226C10.433 12.0789 10.221 12.1667 10 12.1667C9.77899 12.1667 9.56702 12.0789 9.41074 11.9226C9.25446 11.7663 9.16667 11.5543 9.16667 11.3333C9.16667 11.1123 9.25446 10.9004 9.41074 10.7441C9.56702 10.5878 9.77899 10.5 10 10.5C10.221 10.5 10.433 10.5878 10.5893 10.7441C10.7455 10.9004 10.8333 11.1123 10.8333 11.3333ZM10.8333 14.6667C10.8333 14.8877 10.7455 15.0996 10.5893 15.2559C10.433 15.4122 10.221 15.5 10 15.5C9.77899 15.5 9.56702 15.4122 9.41074 15.2559C9.25446 15.0996 9.16667 14.8877 9.16667 14.6667C9.16667 14.4457 9.25446 14.2337 9.41074 14.0774C9.56702 13.9211 9.77899 13.8333 10 13.8333C10.221 13.8333 10.433 13.9211 10.5893 14.0774C10.7455 14.2337 10.8333 14.4457 10.8333 14.6667ZM5.83333 12.1667C6.05435 12.1667 6.26631 12.0789 6.42259 11.9226C6.57887 11.7663 6.66667 11.5543 6.66667 11.3333C6.66667 11.1123 6.57887 10.9004 6.42259 10.7441C6.26631 10.5878 6.05435 10.5 5.83333 10.5C5.61232 10.5 5.40036 10.5878 5.24408 10.7441C5.0878 10.9004 5 11.1123 5 11.3333C5 11.5543 5.0878 11.7663 5.24408 11.9226C5.40036 12.0789 5.61232 12.1667 5.83333 12.1667ZM5.83333 15.5C6.05435 15.5 6.26631 15.4122 6.42259 15.2559C6.57887 15.0996 6.66667 14.8877 6.66667 14.6667C6.66667 14.4457 6.57887 14.2337 6.42259 14.0774C6.26631 13.9211 6.05435 13.8333 5.83333 13.8333C5.61232 13.8333 5.40036 13.9211 5.24408 14.0774C5.0878 14.2337 5 14.4457 5 14.6667C5 14.8877 5.0878 15.0996 5.24408 15.2559C5.40036 15.4122 5.61232 15.5 5.83333 15.5Z"
                                                                                                                            fill="#333333">
                                                                                                                        </path>
                                                                                                                        <path
                                                                                                                            fill-rule="evenodd"
                                                                                                                            clip-rule="evenodd"
                                                                                                                            d="M5.83268 1.95801C5.99844 1.95801 6.15741 2.02386 6.27462 2.14107C6.39183 2.25828 6.45768 2.41725 6.45768 2.58301V3.21884C7.00935 3.20801 7.61685 3.20801 8.28518 3.20801H11.7127C12.3818 3.20801 12.9893 3.20801 13.541 3.21884V2.58301C13.541 2.41725 13.6069 2.25828 13.7241 2.14107C13.8413 2.02386 14.0003 1.95801 14.166 1.95801C14.3318 1.95801 14.4907 2.02386 14.608 2.14107C14.7252 2.25828 14.791 2.41725 14.791 2.58301V3.27217C15.0077 3.28884 15.2127 3.30967 15.4068 3.33551C16.3835 3.46717 17.1743 3.74384 17.7985 4.36717C18.4218 4.99134 18.6985 5.78217 18.8302 6.75884C18.9577 7.70884 18.9577 8.92134 18.9577 10.453V12.213C18.9577 13.7447 18.9577 14.958 18.8302 15.9072C18.6985 16.8838 18.4218 17.6747 17.7985 18.2988C17.1743 18.9222 16.3835 19.1988 15.4068 19.3305C14.4568 19.458 13.2443 19.458 11.7127 19.458H8.28601C6.75435 19.458 5.54102 19.458 4.59185 19.3305C3.61518 19.1988 2.82435 18.9222 2.20018 18.2988C1.57685 17.6747 1.30018 16.8838 1.16852 15.9072C1.04102 14.9572 1.04102 13.7447 1.04102 12.213V10.453C1.04102 8.92134 1.04102 7.70801 1.16852 6.75884C1.30018 5.78217 1.57685 4.99134 2.20018 4.36717C2.82435 3.74384 3.61518 3.46717 4.59185 3.33551C4.78602 3.30967 4.99185 3.28884 5.20768 3.27217V2.58301C5.20768 2.41725 5.27353 2.25828 5.39074 2.14107C5.50795 2.02386 5.66692 1.95801 5.83268 1.95801ZM4.75768 4.57467C3.92018 4.68717 3.43685 4.89884 3.08435 5.25134C2.73185 5.60384 2.52018 6.08717 2.40768 6.92551C2.38852 7.06717 2.37268 7.21717 2.35935 7.37467H17.6393C17.626 7.21634 17.6102 7.06717 17.591 6.92467C17.4785 6.08717 17.2668 5.60384 16.9143 5.25134C16.5618 4.89884 16.0785 4.68717 15.2402 4.57467C14.3843 4.45967 13.2552 4.45801 11.666 4.45801H8.33268C6.74351 4.45801 5.61518 4.45967 4.75768 4.57467ZM2.29102 10.4997C2.29102 9.78801 2.29102 9.16884 2.30185 8.62467H17.6968C17.7077 9.16884 17.7077 9.78801 17.7077 10.4997V12.1663C17.7077 13.7555 17.706 14.8847 17.591 15.7413C17.4785 16.5788 17.2668 17.0622 16.9143 17.4147C16.5618 17.7672 16.0785 17.9788 15.2402 18.0913C14.3843 18.2063 13.2552 18.208 11.666 18.208H8.33268C6.74351 18.208 5.61518 18.2063 4.75768 18.0913C3.92018 17.9788 3.43685 17.7672 3.08435 17.4147C2.73185 17.0622 2.52018 16.5788 2.40768 15.7405C2.29268 14.8847 2.29102 13.7555 2.29102 12.1663V10.4997Z"
                                                                                                                            fill="#333333">
                                                                                                                        </path>
                                                                                                                    </svg>
                                                                                                                </div>
                                                                                                                <p data-id="receipientData{{$recipient->id}}"
                                                                                                                    data-recipient_area_id="{{$recipient->location}}"
                                                                                                                    class="flex custom-remark-title cursor-pointer font-normal me-body-18 text-darkgray underline">
                                                                                                                    Select
                                                                                                                    your
                                                                                                                    preferred
                                                                                                                    time</p>
                                                                                                            </div>
                                                                                                            @include('frontend.checkouts.init-popup.preferred-time-popup')
                                                                                                            @include('frontend.checkouts.calendar_js')
                                                                                                            <div
                                                                                                                class="flex w-full justify-between preferredTime-detail1 flex">
                                                                                                                <div
                                                                                                                    class="flex items-center">
                                                                                                                    <div
                                                                                                                        class="mr-2 max-w-[24px] w-[24px]">
                                                                                                                        <svg xmlns="http://www.w3.org/2000/svg')}}"
                                                                                                                            width="20"
                                                                                                                            height="21"
                                                                                                                            viewBox="0 0 20 21"
                                                                                                                            fill="none">
                                                                                                                            <path
                                                                                                                                d="M14.1667 12.1667C14.3877 12.1667 14.5996 12.0789 14.7559 11.9226C14.9122 11.7663 15 11.5543 15 11.3333C15 11.1123 14.9122 10.9004 14.7559 10.7441C14.5996 10.5878 14.3877 10.5 14.1667 10.5C13.9457 10.5 13.7337 10.5878 13.5774 10.7441C13.4211 10.9004 13.3333 11.1123 13.3333 11.3333C13.3333 11.5543 13.4211 11.7663 13.5774 11.9226C13.7337 12.0789 13.9457 12.1667 14.1667 12.1667ZM14.1667 15.5C14.3877 15.5 14.5996 15.4122 14.7559 15.2559C14.9122 15.0996 15 14.8877 15 14.6667C15 14.4457 14.9122 14.2337 14.7559 14.0774C14.5996 13.9211 14.3877 13.8333 14.1667 13.8333C13.9457 13.8333 13.7337 13.9211 13.5774 14.0774C13.4211 14.2337 13.3333 14.4457 13.3333 14.6667C13.3333 14.8877 13.4211 15.0996 13.5774 15.2559C13.7337 15.4122 13.9457 15.5 14.1667 15.5ZM10.8333 11.3333C10.8333 11.5543 10.7455 11.7663 10.5893 11.9226C10.433 12.0789 10.221 12.1667 10 12.1667C9.77899 12.1667 9.56702 12.0789 9.41074 11.9226C9.25446 11.7663 9.16667 11.5543 9.16667 11.3333C9.16667 11.1123 9.25446 10.9004 9.41074 10.7441C9.56702 10.5878 9.77899 10.5 10 10.5C10.221 10.5 10.433 10.5878 10.5893 10.7441C10.7455 10.9004 10.8333 11.1123 10.8333 11.3333ZM10.8333 14.6667C10.8333 14.8877 10.7455 15.0996 10.5893 15.2559C10.433 15.4122 10.221 15.5 10 15.5C9.77899 15.5 9.56702 15.4122 9.41074 15.2559C9.25446 15.0996 9.16667 14.8877 9.16667 14.6667C9.16667 14.4457 9.25446 14.2337 9.41074 14.0774C9.56702 13.9211 9.77899 13.8333 10 13.8333C10.221 13.8333 10.433 13.9211 10.5893 14.0774C10.7455 14.2337 10.8333 14.4457 10.8333 14.6667ZM5.83333 12.1667C6.05435 12.1667 6.26631 12.0789 6.42259 11.9226C6.57887 11.7663 6.66667 11.5543 6.66667 11.3333C6.66667 11.1123 6.57887 10.9004 6.42259 10.7441C6.26631 10.5878 6.05435 10.5 5.83333 10.5C5.61232 10.5 5.40036 10.5878 5.24408 10.7441C5.0878 10.9004 5 11.1123 5 11.3333C5 11.5543 5.0878 11.7663 5.24408 11.9226C5.40036 12.0789 5.61232 12.1667 5.83333 12.1667ZM5.83333 15.5C6.05435 15.5 6.26631 15.4122 6.42259 15.2559C6.57887 15.0996 6.66667 14.8877 6.66667 14.6667C6.66667 14.4457 6.57887 14.2337 6.42259 14.0774C6.26631 13.9211 6.05435 13.8333 5.83333 13.8333C5.61232 13.8333 5.40036 13.9211 5.24408 14.0774C5.0878 14.2337 5 14.4457 5 14.6667C5 14.8877 5.0878 15.0996 5.24408 15.2559C5.40036 15.4122 5.61232 15.5 5.83333 15.5Z"
                                                                                                                                fill="#333333">
                                                                                                                            </path>
                                                                                                                            <path
                                                                                                                                fill-rule="evenodd"
                                                                                                                                clip-rule="evenodd"
                                                                                                                                d="M5.83268 1.95801C5.99844 1.95801 6.15741 2.02386 6.27462 2.14107C6.39183 2.25828 6.45768 2.41725 6.45768 2.58301V3.21884C7.00935 3.20801 7.61685 3.20801 8.28518 3.20801H11.7127C12.3818 3.20801 12.9893 3.20801 13.541 3.21884V2.58301C13.541 2.41725 13.6069 2.25828 13.7241 2.14107C13.8413 2.02386 14.0003 1.95801 14.166 1.95801C14.3318 1.95801 14.4907 2.02386 14.608 2.14107C14.7252 2.25828 14.791 2.41725 14.791 2.58301V3.27217C15.0077 3.28884 15.2127 3.30967 15.4068 3.33551C16.3835 3.46717 17.1743 3.74384 17.7985 4.36717C18.4218 4.99134 18.6985 5.78217 18.8302 6.75884C18.9577 7.70884 18.9577 8.92134 18.9577 10.453V12.213C18.9577 13.7447 18.9577 14.958 18.8302 15.9072C18.6985 16.8838 18.4218 17.6747 17.7985 18.2988C17.1743 18.9222 16.3835 19.1988 15.4068 19.3305C14.4568 19.458 13.2443 19.458 11.7127 19.458H8.28601C6.75435 19.458 5.54102 19.458 4.59185 19.3305C3.61518 19.1988 2.82435 18.9222 2.20018 18.2988C1.57685 17.6747 1.30018 16.8838 1.16852 15.9072C1.04102 14.9572 1.04102 13.7447 1.04102 12.213V10.453C1.04102 8.92134 1.04102 7.70801 1.16852 6.75884C1.30018 5.78217 1.57685 4.99134 2.20018 4.36717C2.82435 3.74384 3.61518 3.46717 4.59185 3.33551C4.78602 3.30967 4.99185 3.28884 5.20768 3.27217V2.58301C5.20768 2.41725 5.27353 2.25828 5.39074 2.14107C5.50795 2.02386 5.66692 1.95801 5.83268 1.95801ZM4.75768 4.57467C3.92018 4.68717 3.43685 4.89884 3.08435 5.25134C2.73185 5.60384 2.52018 6.08717 2.40768 6.92551C2.38852 7.06717 2.37268 7.21717 2.35935 7.37467H17.6393C17.626 7.21634 17.6102 7.06717 17.591 6.92467C17.4785 6.08717 17.2668 5.60384 16.9143 5.25134C16.5618 4.89884 16.0785 4.68717 15.2402 4.57467C14.3843 4.45967 13.2552 4.45801 11.666 4.45801H8.33268C6.74351 4.45801 5.61518 4.45967 4.75768 4.57467ZM2.29102 10.4997C2.29102 9.78801 2.29102 9.16884 2.30185 8.62467H17.6968C17.7077 9.16884 17.7077 9.78801 17.7077 10.4997V12.1663C17.7077 13.7555 17.706 14.8847 17.591 15.7413C17.4785 16.5788 17.2668 17.0622 16.9143 17.4147C16.5618 17.7672 16.0785 17.9788 15.2402 18.0913C14.3843 18.2063 13.2552 18.208 11.666 18.208H8.33268C6.74351 18.208 5.61518 18.2063 4.75768 18.0913C3.92018 17.9788 3.43685 17.7672 3.08435 17.4147C2.73185 17.0622 2.52018 16.5788 2.40768 15.7405C2.29268 14.8847 2.29102 13.7555 2.29102 12.1663V10.4997Z"
                                                                                                                                fill="#333333">
                                                                                                                            </path>
                                                                                                                        </svg>
                                                                                                                    </div>
                                                                                                                    <p
                                                                                                                    class="font-normal me-body-18 text-darkgray flex items-center preferredTime">
                                                                                                                    <span
                                                                                                                        class="preferred-name-receipientData{{$recipient->id}}"></span>
                                                                                                                    <span
                                                                                                                        class="preferred-date-receipientData{{$recipient->id}}"></span>
                                                                                                                    <span
                                                                                                                        class="preferred-timeDesc-receipientData{{$recipient->id}}"></span>
                                                                                                                </p>
                                                                                                            </div>
                                                                                                            <div data-id="receipientData{{$recipient->id}}" class="edit-btn  undefined"
                                                                                                                data-recipient_area_id="{{$recipient->location}}">
                                                                                                                <p
                                                                                                                    class="cursor-pointer flex font-normal me-body-16 text-darkgray underline hover:text-orangeMediq">
                                                                                                                @lang('labels.check_out.edit')</p>
                                                                                                            </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                
                                                                                                    </div>
                                                                                                    <hr class="my-5 bg-mee4 ">
                                                                                                    @if(count($recipient->group_data) > 0)
                                                                                                        @foreach($recipient->group_data as $group)
                                                                                                            @php
                                                                                                            $checkUpTable = $recipient->product->package->checkupTable;
                                                                                                            $tablePriIds =
                                                                                                            App\Models\CheckUpTableType::where('check_up_type_id',2)->where('check_up_table_id',$checkUpTable->id)->pluck('id')->toArray();
                                                                                                            $optionGroupIds=
                                                                                                            App\Models\CheckTableItem::where('check_up_group_id',$group->id)->whereIn('check_up_table_type_id',$tablePriIds)->distinct()->pluck('check_up_item_id')->toArray();
                                                                                                            $countEquivalentNumber = App\Models\CheckUpItem::whereIn('id',$optionGroupIds)->sum('equivalent_number');
                                                                                                            @endphp
                                                                                                            <div component-name="me-checkout-merchant-recipient-cancerMarker-detail"
                                                                                                                class="mt-1 @@refundCard">
                                                                                                                <div
                                                                                                                    class="flex sm:flex-row flex-col">
                                                                                                                    <div
                                                                                                                        class="flex hidden cancer-markers-placeholder1-1">
                                                                                                                        <div
                                                                                                                            class="mr-2 max-w-[24px] w-[24px]">
                                                                                                                            <svg xmlns="http://www.w3.org/2000/svg')}}"
                                                                                                                                width="24"
                                                                                                                                height="25"
                                                                                                                                viewBox="0 0 24 25"
                                                                                                                                fill="none">
                                                                                                                                <path
                                                                                                                                    d="M9.4979 3.00898C8.94263 3.08328 8.22312 3.3531 7.73824 3.66984C7.3824 3.90446 6.83104 4.44409 6.60815 4.77647C6.38525 5.10885 6.15845 5.58982 6.02941 6.01605C5.93165 6.34452 5.92383 6.41882 5.91992 7.0914C5.91992 7.72097 5.92774 7.83437 5.99422 7.96341C6.20929 8.39746 6.8193 8.40919 7.03046 7.98296C7.09694 7.8461 7.10085 7.7718 7.08521 7.28692C7.05784 6.66126 7.11258 6.36407 7.32765 5.89092C7.49189 5.53508 7.65221 5.30046 7.91812 5.03846C8.81359 4.13908 10.1431 3.91228 11.2849 4.45582C12.0475 4.81948 12.6497 5.55072 12.8647 6.38363C12.9273 6.61043 12.9429 6.78639 12.939 7.1305C12.9234 7.90476 12.9273 7.91649 13.0055 8.02207C13.2088 8.29188 13.4786 8.36227 13.7563 8.21758C13.9909 8.09636 14.0652 7.93995 14.1082 7.47853C14.1786 6.72774 14.0457 6.00823 13.7015 5.31219C13.4552 4.80775 13.2049 4.46755 12.8178 4.10389C12.0748 3.40002 11.1794 3.03245 10.1431 3.00507C9.86548 2.99725 9.5722 3.00116 9.4979 3.00898Z"
                                                                                                                                    fill="#333333">
                                                                                                                                </path>
                                                                                                                                <path
                                                                                                                                    d="M9.54314 5.43202C9.05825 5.56106 8.62029 5.93645 8.39349 6.41352L8.26836 6.67942L8.25663 11.3992C8.25272 14.07 8.23316 16.1229 8.21361 16.1229C8.19406 16.1229 8.03374 15.9626 7.85386 15.7632C7.2282 15.0789 6.84499 14.8873 6.14503 14.9186C5.81656 14.9303 5.73053 14.9498 5.49982 15.0632C4.48704 15.552 4.17812 16.862 4.87807 17.7184C4.97583 17.8435 5.97689 18.9189 7.09525 20.1115C9.18338 22.3326 9.35544 22.4968 9.85988 22.7315C10.4191 22.9934 10.2978 22.9817 13.3284 22.9974C15.6237 23.0052 16.1321 22.9974 16.3863 22.9504C16.9885 22.837 17.4577 22.5868 17.9113 22.1449C18.4157 21.6483 18.6895 21.0656 18.7716 20.3188C18.7951 20.0685 18.8068 18.8328 18.799 16.7877L18.7833 13.6399L18.6973 13.4052C18.5096 12.9047 18.1303 12.5176 17.6415 12.326C17.3404 12.2087 16.7734 12.1969 16.4645 12.3064C16.2572 12.3768 16.2494 12.3768 16.2025 12.3064C15.9209 11.8998 15.6785 11.6925 15.2914 11.54C14.9942 11.4266 14.4233 11.4188 14.1183 11.5244C13.911 11.5947 13.9032 11.5947 13.8563 11.5244C13.5747 11.1177 13.3284 10.9104 12.9451 10.7618C12.7105 10.668 12.1983 10.6406 11.9167 10.6993L11.7681 10.7306V8.87313C11.7681 7.67265 11.7525 6.94142 11.7251 6.80846C11.5179 5.81132 10.5051 5.17393 9.54314 5.43202ZM10.3135 6.64814C10.3682 6.69115 10.4503 6.77327 10.4934 6.83193C10.5755 6.93751 10.5755 6.97661 10.595 10.668C10.6146 14.3633 10.6146 14.3985 10.6967 14.508C10.8727 14.7504 11.2246 14.8247 11.4553 14.6644C11.7486 14.4649 11.7447 14.4806 11.7681 13.2684C11.7877 12.2439 11.7916 12.1735 11.8698 12.0679C12.124 11.7238 12.6206 11.759 12.8435 12.1383C12.9139 12.2595 12.9217 12.3612 12.9412 13.3349C12.9608 14.332 12.9647 14.4024 13.0429 14.508C13.2971 14.8521 13.7937 14.8169 14.0166 14.4376C14.0831 14.3242 14.0987 14.2108 14.1143 13.632C14.13 13.0338 14.1417 12.9477 14.216 12.85C14.4702 12.5059 14.9668 12.5411 15.1897 12.9204C15.2562 13.0338 15.2718 13.1472 15.2875 13.7259C15.3031 14.3242 15.3148 14.4102 15.3891 14.508C15.5103 14.6722 15.7059 14.7621 15.9092 14.7426C16.2416 14.7074 16.4136 14.4845 16.4567 14.0309C16.4762 13.8315 16.5075 13.7024 16.5622 13.632C16.8164 13.2879 17.313 13.3231 17.5359 13.7024C17.6141 13.8315 17.6141 13.9058 17.6141 17.1005C17.6141 20.1975 17.6102 20.3774 17.5398 20.5808C17.3248 21.2103 16.8281 21.6639 16.2103 21.793C16.0695 21.8203 15.1662 21.8321 13.3479 21.8242C10.6928 21.8125 10.6928 21.8125 10.4738 21.7226C10.3526 21.6757 10.1727 21.5779 10.0749 21.5075C9.8325 21.3355 5.7931 17.038 5.72271 16.8776C5.60931 16.6156 5.69143 16.3419 5.9456 16.1542C6.059 16.0682 6.32882 16.0486 6.49305 16.1151C6.5478 16.1386 7.00531 16.5844 7.50584 17.1084C8.01027 17.6284 8.46388 18.0899 8.51862 18.125C8.65939 18.2228 8.97613 18.2189 9.13646 18.1172C9.20684 18.0781 9.29287 17.9843 9.33198 17.9139C9.39845 17.7927 9.40236 17.4877 9.42191 12.3416C9.44147 6.91404 9.44147 6.8984 9.52358 6.78891C9.70346 6.54256 10.0828 6.47608 10.3135 6.64814Z"
                                                                                                                                    fill="#333333">
                                                                                                                                </path>
                                                                                                                            </svg>
                                                                                                                        </div>
                                                                                                                        <p data-id="1-1"
                                                                                                                            class="custom-cancer-markers-remark-title cursor-pointer flex flex-wrap font-normal me-body-18 text-darkgray underline">
                                                                                                                            Select
                                                                                                                            Cancer
                                                                                                                            Markers
                                                                                                                            (0/7
                                                                                                                            @lang('labels.check_out.selected'))
                                                                                                                        </p>
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="flex w-full justify-between flex cancer-markers-detail-data1-1">
                                                                                                                        <div
                                                                                                                            class="flex items-center w-full">
                                                                                                                            <div
                                                                                                                                class="mr-2 max-w-[24px] w-[24px]">
                                                                                                                                <svg xmlns="http://www.w3.org/2000/svg')}}"
                                                                                                                                    width="24"
                                                                                                                                    height="25"
                                                                                                                                    viewBox="0 0 24 25"
                                                                                                                                    fill="none">
                                                                                                                                    <path
                                                                                                                                        d="M9.4979 3.00898C8.94263 3.08328 8.22312 3.3531 7.73824 3.66984C7.3824 3.90446 6.83104 4.44409 6.60815 4.77647C6.38525 5.10885 6.15845 5.58982 6.02941 6.01605C5.93165 6.34452 5.92383 6.41882 5.91992 7.0914C5.91992 7.72097 5.92774 7.83437 5.99422 7.96341C6.20929 8.39746 6.8193 8.40919 7.03046 7.98296C7.09694 7.8461 7.10085 7.7718 7.08521 7.28692C7.05784 6.66126 7.11258 6.36407 7.32765 5.89092C7.49189 5.53508 7.65221 5.30046 7.91812 5.03846C8.81359 4.13908 10.1431 3.91228 11.2849 4.45582C12.0475 4.81948 12.6497 5.55072 12.8647 6.38363C12.9273 6.61043 12.9429 6.78639 12.939 7.1305C12.9234 7.90476 12.9273 7.91649 13.0055 8.02207C13.2088 8.29188 13.4786 8.36227 13.7563 8.21758C13.9909 8.09636 14.0652 7.93995 14.1082 7.47853C14.1786 6.72774 14.0457 6.00823 13.7015 5.31219C13.4552 4.80775 13.2049 4.46755 12.8178 4.10389C12.0748 3.40002 11.1794 3.03245 10.1431 3.00507C9.86548 2.99725 9.5722 3.00116 9.4979 3.00898Z"
                                                                                                                                        fill="#333333">
                                                                                                                                    </path>
                                                                                                                                    <path
                                                                                                                                        d="M9.54314 5.43202C9.05825 5.56106 8.62029 5.93645 8.39349 6.41352L8.26836 6.67942L8.25663 11.3992C8.25272 14.07 8.23316 16.1229 8.21361 16.1229C8.19406 16.1229 8.03374 15.9626 7.85386 15.7632C7.2282 15.0789 6.84499 14.8873 6.14503 14.9186C5.81656 14.9303 5.73053 14.9498 5.49982 15.0632C4.48704 15.552 4.17812 16.862 4.87807 17.7184C4.97583 17.8435 5.97689 18.9189 7.09525 20.1115C9.18338 22.3326 9.35544 22.4968 9.85988 22.7315C10.4191 22.9934 10.2978 22.9817 13.3284 22.9974C15.6237 23.0052 16.1321 22.9974 16.3863 22.9504C16.9885 22.837 17.4577 22.5868 17.9113 22.1449C18.4157 21.6483 18.6895 21.0656 18.7716 20.3188C18.7951 20.0685 18.8068 18.8328 18.799 16.7877L18.7833 13.6399L18.6973 13.4052C18.5096 12.9047 18.1303 12.5176 17.6415 12.326C17.3404 12.2087 16.7734 12.1969 16.4645 12.3064C16.2572 12.3768 16.2494 12.3768 16.2025 12.3064C15.9209 11.8998 15.6785 11.6925 15.2914 11.54C14.9942 11.4266 14.4233 11.4188 14.1183 11.5244C13.911 11.5947 13.9032 11.5947 13.8563 11.5244C13.5747 11.1177 13.3284 10.9104 12.9451 10.7618C12.7105 10.668 12.1983 10.6406 11.9167 10.6993L11.7681 10.7306V8.87313C11.7681 7.67265 11.7525 6.94142 11.7251 6.80846C11.5179 5.81132 10.5051 5.17393 9.54314 5.43202ZM10.3135 6.64814C10.3682 6.69115 10.4503 6.77327 10.4934 6.83193C10.5755 6.93751 10.5755 6.97661 10.595 10.668C10.6146 14.3633 10.6146 14.3985 10.6967 14.508C10.8727 14.7504 11.2246 14.8247 11.4553 14.6644C11.7486 14.4649 11.7447 14.4806 11.7681 13.2684C11.7877 12.2439 11.7916 12.1735 11.8698 12.0679C12.124 11.7238 12.6206 11.759 12.8435 12.1383C12.9139 12.2595 12.9217 12.3612 12.9412 13.3349C12.9608 14.332 12.9647 14.4024 13.0429 14.508C13.2971 14.8521 13.7937 14.8169 14.0166 14.4376C14.0831 14.3242 14.0987 14.2108 14.1143 13.632C14.13 13.0338 14.1417 12.9477 14.216 12.85C14.4702 12.5059 14.9668 12.5411 15.1897 12.9204C15.2562 13.0338 15.2718 13.1472 15.2875 13.7259C15.3031 14.3242 15.3148 14.4102 15.3891 14.508C15.5103 14.6722 15.7059 14.7621 15.9092 14.7426C16.2416 14.7074 16.4136 14.4845 16.4567 14.0309C16.4762 13.8315 16.5075 13.7024 16.5622 13.632C16.8164 13.2879 17.313 13.3231 17.5359 13.7024C17.6141 13.8315 17.6141 13.9058 17.6141 17.1005C17.6141 20.1975 17.6102 20.3774 17.5398 20.5808C17.3248 21.2103 16.8281 21.6639 16.2103 21.793C16.0695 21.8203 15.1662 21.8321 13.3479 21.8242C10.6928 21.8125 10.6928 21.8125 10.4738 21.7226C10.3526 21.6757 10.1727 21.5779 10.0749 21.5075C9.8325 21.3355 5.7931 17.038 5.72271 16.8776C5.60931 16.6156 5.69143 16.3419 5.9456 16.1542C6.059 16.0682 6.32882 16.0486 6.49305 16.1151C6.5478 16.1386 7.00531 16.5844 7.50584 17.1084C8.01027 17.6284 8.46388 18.0899 8.51862 18.125C8.65939 18.2228 8.97613 18.2189 9.13646 18.1172C9.20684 18.0781 9.29287 17.9843 9.33198 17.9139C9.39845 17.7927 9.40236 17.4877 9.42191 12.3416C9.44147 6.91404 9.44147 6.8984 9.52358 6.78891C9.70346 6.54256 10.0828 6.47608 10.3135 6.64814Z"
                                                                                                                                        fill="#333333">
                                                                                                                                    </path>
                                                                                                                                </svg>
                                                                                                                            </div>
                                                                                                                            <p data-id="1-1"
                                                                                                                                class="mr-2 font-normal me-body-18 text-darkgray underline  cancer-markers-label-1-receipientData{{$group->id}}{{$recipient->id}} ">
                                                                                                                                {{langbind($group,'name')}} (<span
                                                                                                                                    class="selected-cancermarkers-count-1-receipientData111">{{$group->itemDatas($group->id,$recipient->id,$recipient->product->id)->sum('equivalent_number')}}</span>
                                                                                                                                    @lang('labels.check_out.selected'))</span>
                                                                                                                            </p>
                                                                                                                            <div
                                                                                                                                class="showDropdown-btn active" data-id={{$group->id.$recipient->id}}>
                                                                                                                                <svg xmlns="http://www.w3.org/2000/svg')}}"
                                                                                                                                    width="12"
                                                                                                                                    height="7"
                                                                                                                                    viewBox="0 0 12 7"
                                                                                                                                    fill="none">
                                                                                                                                    <path
                                                                                                                                        d="M0.042841 6.46313C0.14831 6.69047 0.413154 6.7936 0.649873 6.6975C0.713154 6.67172 1.46315 5.93344 3.36628 4.02094L5.99831 1.37719L8.628 4.02094C10.5358 5.93579 11.2835 6.67172 11.3467 6.6975C11.396 6.71625 11.478 6.73266 11.5296 6.73266C11.8671 6.73266 12.0944 6.39047 11.9538 6.08813C11.8905 5.95454 6.32878 0.367034 6.19753 0.308441C6.078 0.252191 5.91862 0.252191 5.79909 0.308441C5.66784 0.367034 0.106123 5.95453 0.042841 6.08813C-0.0134086 6.20766 -0.0134086 6.3436 0.042841 6.46313Z"
                                                                                                                                        fill="#333333">
                                                                                                                                    </path>
                                                                                                                                </svg>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div data-parentid="{{$itemDetails->recipient_id}}"
                                                                                                                            data-id="receipientData{{$group->id}}{{$recipient->id}}"
                                                                                                                            class="cancer-markers-edit-btn ">
                                                                                                                            <p
                                                                                                                                class="cursor-pointer font-normal me-body-16 text-darkgray underline hover:text-orangeMediq">
                                                                                                                                @lang('labels.check_out.edit')
                                                                                                                            </p>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="hidden detail-data-list1-receipientData111">
                                                                                                                    <div component-name="me-checkout-merchant-recipient-cancerMarkers-detail-list"
                                                                                                                        class="pl-8 mt-1">
                                                                                                                        <ul
                                                                                                                            class="custom-list-style bg-far px-5 py-[10px] rounded-[12px] cancerMarkers-detail-data1-receipientData111">
                                                                                                                            @if(count($group->itemDatas($group->id,$recipient->id,$recipient->product->id)) > 0)
                                                                                                                                @foreach($group->itemDatas($group->id,$recipient->id,$recipient->product->id) as $item)
                                                                                                                                <li class="flex items-center mt-2">
                                                                                                                                    <span class="mr-4 font-normal me-body-18 text-darkgray">{{langbind($item,'name')}}</span>
                                                                                                                                </li>
                                                                                                                                @endforeach
                                                                                                                            @else 
                                                                                                                            <li class="flex items-center mt-2">
                                                                                                                                <span class="mr-4 font-normal me-body-18 text-darkgray">@lang('labels.product_detail.decide_later')</span>
                                                                                                                            </li>
                                                                                                                            @endif
                                                                                                                        </ul>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        @endforeach
                                                                                                    @endif
                                                                                                </div>
                                                                                            </div>
                                                                
                                                                                        </div>
                                                                
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @if(count($recipient->group_data) > 0)
                                                                @foreach($recipient->group_data as $group)
                                                                    @php
                                                                        $checkUpTable = $recipient->product->package->checkupTable; 
                                                                        $tablePriIds = App\Models\CheckUpTableType::where('check_up_type_id',2)->where('check_up_table_id',$checkUpTable->id)->pluck('id')->toArray();
                                                                        $optionGroupIds= App\Models\CheckTableItem::where('check_up_group_id',$group->id)->whereIn('check_up_table_type_id',$tablePriIds)->distinct()->pluck('check_up_item_id')->toArray();
                                                                        $recItems = [];
                                                                        $tableItem = [];
                                                                        $tableItemIds = [];
                                                                        if(count($recipient->recipient_items) > 0 ){
                                                                        $titems = App\Models\CheckTableItem::where('check_up_group_id',$group->id)
                                                                        ->whereIn('check_up_table_type_id',$tablePriIds)->distinct()->pluck('check_up_item_id')->toArray();
                                                                        $recItems =
                                                                        $recipient->recipient_items()->whereIn('check_up_item_id',$titems)->pluck('check_up_item_id')->toArray();
                                                                        $tableItem = App\Models\CheckUpItem::whereIn('id',$recItems)->pluck('name_en')->toArray();
                                                                        $tableItemIds = App\Models\CheckUpItem::whereIn('id',$recItems)->pluck('id')->toArray();
                                                                        }
                                                                        $tableItems = implode(',',$tableItem);
                                                                        $recItem = implode(',',$tableItemIds);
                                                                        
                                                                        $countEquivalentNumber =  App\Models\CheckUpItem::whereIn('id',$optionGroupIds)->sum('equivalent_number');
                                                                        $decideLater = App\Models\OptionDecideLater::where('recipient_id',$recipient->id)->where('group_id',$group->id)->first();
                                                                    @endphp
                                                                    <div id="me-checkout-cancer-markers-popup"
                                                                        class="hidden me-checkout-cancer-markers-popup me-checkout-cancer-markers-popup-receipientData{{$group->id.$recipient->id}}">
                                                                        <div
                                                                            class="me-checkout-cancer-markers-popup-content px-5 lg:py-10 py-5 rounded-[12px] xl:min-w-[1060px] max-w-[1060px] min-w-[90%] overflow-y-auto">
                                                                            <div class="relative w-full">
                                                                                <div
                                                                                    class="flex justify-between items-center pb-3 bg-whitez">
                                                                                    <div data-parentid="{{$itemDetails->recipient_id}}" data-id="{{$group->id.$recipient->id}}"
                                                                                        class="popup-back-btn">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg')}}"
                                                                                            width="10" height="17"
                                                                                            viewBox="0 0 10 17"
                                                                                            fill="none">
                                                                                            <path
                                                                                                d="M8.94823 16.9181C9.25136 16.7775 9.38886 16.4244 9.26073 16.1088C9.22636 16.0244 8.24198 15.0244 5.69198 12.4869L2.16698 8.97751L5.69198 5.47126C8.24511 2.92751 9.22636 1.93064 9.26073 1.84626C9.28573 1.78064 9.30761 1.67126 9.30761 1.60251C9.30761 1.15251 8.85136 0.849388 8.44823 1.03689C8.27011 1.12126 0.820108 8.53689 0.741983 8.71189C0.666983 8.87126 0.666983 9.08376 0.741983 9.24314C0.820108 9.41814 8.27011 16.8338 8.44823 16.9181C8.60761 16.9931 8.78886 16.9931 8.94823 16.9181Z"
                                                                                                fill="#333333"></path>
                                                                                        </svg>
                                                                                    </div>
                                                                                    <button data-parentid="{{$itemDetails->recipient_id}}" data-id="receipientData{{$group->id.$recipient->id}}"
                                                                                        data-items="{{$recItem}}" data-optional_decide_later="{{isset($decideLater) && $decideLater->is_decide_later == true ? 1 : 0}}"
                                                                                        class="z-[1] absolute top-0 right-0 focus-visible:outline-none focus:outline-none p-1"
                                                                                        id="me-checkout-cancer-markers-popup-close-btn"><img
                                                                                            class=" w-auto h-auto align-middle"
                                                                                            src="{{ asset('frontend/img/close-btn.png') }}"
                                                                                            alt="">
                                                                                    </button>
                                                                                </div>
                                                                                <button data-parentid="{{$itemDetails->recipient_id}}" data-id="receipientData{{$group->id.$recipient->id}}"
                                                                                    data-items="{{$recItem}}" data-optional_decide_later="{{isset($decideLater) && $decideLater->is_decide_later == true ? 1 : 0}}"
                                                                                    class="hidden z-[1] absolute top-0 right-0 focus-visible:outline-none focus:outline-none p-1"
                                                                                    id="me-checkout-cancer-markers-popup-close-btn"><img
                                                                                        class=" w-auto h-auto align-middle"
                                                                                        src="{{ asset('frontend/img/close-btn.png') }}"
                                                                                        alt=""></button>
                                                                                <input type="hidden"
                                                                                    class="cancer-markers-selected-id">
                                                                                <div>
                                                                                    <div class="flex flex-wrap items-center">
                                                                                        <h3 class="font-bold me-body-20 text-darkgray text-left">
                                                                                            @lang('labels.check_out.select_free') {{langbind($group,'name')}}</h3>
                                                                                        <span class="me-body18 font-normal text-darkgray text-left">(<span
                                                                                                class="cancer-markers-selected-value-receipientData{{$group->id}}{{$recipient->id}}"></span>
                                                                                                @lang('labels.check_out.selected'))</span>
                                                                                    </div>
                                                                                    <div class="mr-6 flex items-center mt-4 ">
                                                                                        <p
                                                                                            class="font-normal me-body-16 text-darkgray">
                                                                                            @lang('labels.check_out.how_to_choose') {{langbind($group,'name')}}?</p>
                                                                                            <button type="button" role="button" class="plan-tooltip-btn">
                                                                                                <img src="{{ asset('frontend/img/info-circle.png') }}" alt="info icon" class="w-auto h-auto align-middle">
                                                                                                <div class="plan-tooltip">
                                                                                                    <p class="me-body16">
                                                                                                        {{__('labels.basic_info.please_select')}} {{$group->minimum_item}} {{__('labels.check_out.items')}}
                                                                                                    </p>
                                                                                                </div>
                                                                                            </button>
                                                                                    </div>
                                                                                    <div class="mt-3">
                                                                                        <input type="hidden" value="{{$group->minimum_item}}"
                                                                                        class="cancer-markers-min-selected-receipientData{{$group->id}}{{$recipient->id}}" />
                                                                                        <ul class="flex flex-wrap">
                                                                                        @if(count($optionGroupIds) > 0)
                                                                                        @foreach($optionGroupIds as $titem)
                                                                                        @php
                                                                                        $tableItem = App\Models\CheckUpItem::where('id',$titem)->first();
                                                                                        @endphp
                                                                                            <li data-total="{{$countEquivalentNumber}}"
                                                                                                data-count="{{$tableItem->equivalent_number == null ? 1 : $tableItem->equivalent_number }}"
                                                                                                data-text="{{langbind($tableItem,'name')}}" data-value="{{$tableItem->id}}"
                                                                                                class="me-body-16 flex items-center markers-tags cursor-pointer hover:border-orangeMediq hover:text-orangeMediq mr-[10px] mb-[10px] px-4 py-[10px] border-1 border-darkgray rounded-[4px] me-body-16 font-normal text-darkgray">
                                                                                                {{langbind($tableItem,'name')}}
                                                                                                <div class="ml-1 hidden">
                                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                                                                                        fill="none">
                                                                                                        <path
                                                                                                            d="M16.25 7.49992C16.25 6.29044 15.899 5.10695 15.2397 4.09297C14.5804 3.07899 13.641 2.2781 12.5356 1.78743C11.4301 1.29676 10.206 1.13738 9.0117 1.32864C7.81743 1.51989 6.70432 2.05355 5.80734 2.86491C4.91037 3.67626 4.26808 4.73044 3.95838 5.8996C3.64867 7.06875 3.68485 8.30266 4.06253 9.45166C4.44021 10.6007 5.14316 11.6154 6.08613 12.3728C7.0291 13.1302 8.17158 13.5977 9.375 13.7187V15.6249H6.875C6.70924 15.6249 6.55027 15.6908 6.43306 15.808C6.31585 15.9252 6.25 16.0842 6.25 16.2499C6.25 16.4157 6.31585 16.5747 6.43306 16.6919C6.55027 16.8091 6.70924 16.8749 6.875 16.8749H9.375V18.7499C9.375 18.9157 9.44085 19.0747 9.55806 19.1919C9.67527 19.3091 9.83424 19.3749 10 19.3749C10.1658 19.3749 10.3247 19.3091 10.4419 19.1919C10.5592 19.0747 10.625 18.9157 10.625 18.7499V16.8749H13.125C13.2908 16.8749 13.4497 16.8091 13.5669 16.6919C13.6842 16.5747 13.75 16.4157 13.75 16.2499C13.75 16.0842 13.6842 15.9252 13.5669 15.808C13.4497 15.6908 13.2908 15.6249 13.125 15.6249H10.625V13.7187C12.1659 13.5619 13.5939 12.8393 14.6329 11.6906C15.6719 10.5419 16.2481 9.04879 16.25 7.49992ZM5 7.49992C5 6.51102 5.29324 5.54432 5.84265 4.72207C6.39206 3.89983 7.17295 3.25897 8.08658 2.88053C9.00021 2.50209 10.0055 2.40307 10.9755 2.596C11.9454 2.78892 12.8363 3.26513 13.5355 3.96439C14.2348 4.66365 14.711 5.55457 14.9039 6.52447C15.0969 7.49438 14.9978 8.49971 14.6194 9.41334C14.241 10.327 13.6001 11.1079 12.7779 11.6573C11.9556 12.2067 10.9889 12.4999 10 12.4999C8.67436 12.4985 7.40343 11.9712 6.46607 11.0339C5.5287 10.0965 5.00145 8.82556 5 7.49992Z"
                                                                                                            fill="#FF87B2" />
                                                                                                    </svg>
                                                                                                </div>
                                                                                            </li>
                                                                                        @endforeach
                                                                                        @endif
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                                @php 
                                                                                    $decideLater = App\Models\OptionDecideLater::where('recipient_id',$recipient->id)->where('group_id',$group->id)->first();
                                                                                    // \Log::debug($decideLater);
                                                                                    // \Log::debug("xxx");
                                                                                @endphp
                                                                                <div class="flex xs:flex-row flex-col justify-between xs:items-center mt-3 lg:mt-5">
                                                                                    <div class="form-group me-body18 text-left">
                                                                                        <label for="cancer-markers-decideLater-receipientData{{$group->id}}{{$recipient->id}}"
                                                                                            class="custom-radio-container inline-block relative">
                                                                                            <input type="checkbox" name="decide-laterreceipientData{{$group->id}}{{$recipient->id}}"
                                                                                                id="cancer-markers-decideLater-receipientData{{$group->id}}{{$recipient->id}}"
                                                                                                class="opacity-0 absolute" value="{{isset($decideLater) && $decideLater->is_decide_later == true ? true : false}}">
                                                                                            <span class="custom-radio-orange"></span>
                                                                                            <span class="ml-[30px]">@lang('labels.product_detail.decide_later')</span>
                                                                                        </label>
                                                                                    </div>
                                                                                    <form action="" id="updateCheckUpItemForm{{$group->id}}{{$recipient->id}}">
                                                                                        <div class="hidden">
                                                                                            <input type="hidden" name="edit_status" value="1">
                                                                                            <input type="hidden" name="recipient_id" value="{{$recipient->id}}">
                                                                                            <input type="hidden" name="group_id" value="{{$group->id}}">
                                                                                            <input type="hidden" name="product_id" value="{{$recipient->product_id}}">
                                                                                            <input name="check_up_items-{{$group->id}}{{$recipient->id}}"
                                                                                                data-id="receipientData{{$group->id}}{{$recipient->id}}" type="hidden"
                                                                                                value="{{ $recItem }}"
                                                                                                class="cancerMarkers-selected-tags-ids cancerMarkers-selected-tags-ids-receipientData{{$group->id}}{{$recipient->id}}" />
                                                                                            <input data-id="receipientData{{$group->id}}{{$recipient->id}}" type="hidden"
                                                                                                value="{{ $tableItems }}"
                                                                                                class="cancerMarkers-selected-tags cancerMarkers-selected-tagsreceipientData{{$group->id}}{{$recipient->id}}" />
                                                                                           {{-- <input type="checkbox" name="decide_laterreceipientData{{$group->id}}{{$recipient->id}}"
                                                                                                id="cancer-markers-decideLaterreceipientData{{$group->id}}{{$recipient->id}}"
                                                                                                class="opacity-0 absolute"> --}}
                                                                                                <input name="check_up_items_decide_later_{{$group->id}}{{$recipient->id}}" data-text="" data-id="receipientData{{$group->id}}{{$recipient->id}}" type="hidden" value="true"
                                                                                                class="cancerMarkers-decidelater cancerMarkers-decidelater-receipientData{{$group->id}}{{$recipient->id}}"/>
                                                                                        </div>
                                                                                        {{-- <p data-text="" class="cancer-markers-required-message-receipientData{{$group->id}}{{$recipient->id}}"></p> --}}
                                                                                        <button type="button" role="button" onclick="submitItem({{$group->id}},{{$recipient->id}})"
                                                                                            data-id="receipientData{{$group->id}}{{$recipient->id}}"
                                                                                            class="me-body-18 xs:mt-0 mt-2 checkout-cancer-markers-confirm text-light bg-orangeMediq rounded-md font-bold py-2 px-10 sm:py-[10px] max-w-[300px] xl:px-0 xl:w-[300px] hover:bg-brightOrangeMediq transition-colors duration-300">
                                                                                            @lang('labels.log_in_register.confirm')
                                                                                        </button>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                                @endif
                                                                <!-- ********************************** 2 Person Coupon ********************************-->
                                                                <div>
                                                                    <div
                                                                        class="mt-2 bg-blueMediq px-3 py-2 flex flex-wrap justify-between items-center">
                                                                        <p class="font-bold me-body-16 text-whitez">
                                                                            @lang('labels.order_details.booking_id')  {{$twopersondata[0]->booking_id}}</p>
                                                                            {{-- @if($twopersondata[0]->order_status==1 || $twopersondata[0]->order_status==2) --}}
                                                                            @if($twopersondata[0]->confirm_booking_date!=null)
                                                                                @php
                                                                                    $now = \Carbon\Carbon::now()->startOfDay();
                                                                                    $bookingDate = \Carbon\Carbon::parse($twopersondata[0]->confirm_booking_date)->startOfDay();
                                                                                    $diff= 0;
                                                                                    if($bookingDate> $now) {
                                                                                    $diff = $bookingDate->diffInDays($now);
                                                                                    }
                                                                                @endphp
                                                                                @if($diff >= 3)
                                                                                <div data-id="{{$twopersondata[0]->recipient_id}}"
                                                                                    class="flex items-center edit-booking-btn cursor-pointer ">
                                                                                    <img src="{{ asset('frontend/img/edit-booking-btn.svg') }}"
                                                                                        alt="edit-booking-btn">
                                                                                    <p
                                                                                        class="font-normal me-body-14 text-whitez mt-1">
                                                                                        @lang('labels.order_details.edit_booking')</p>
                                                                                </div>
                                                                                @endif
                                                                            @else
                                                                                <div data-id="{{$twopersondata[0]->recipient_id}}"
                                                                                    class="flex items-center edit-booking-btn cursor-pointer ">
                                                                                    <img src="{{ asset('frontend/img/edit-booking-btn.svg') }}"
                                                                                        alt="edit-booking-btn">
                                                                                    <p
                                                                                        class="font-normal me-body-14 text-whitez mt-1">
                                                                                        @lang('labels.order_details.edit_booking')</p>
                                                                                </div>
                                                                            @endif
                                                                    </div>
                                                                    <div class="mt-[10px]">
                                                                        <div class="booking-confirmed-div ">
                                                                            <div
                                                                                class="flex flex-wrap-reverse items-center justify-between">
                                                                                <div>
                                                                                    <div class="flex items-start">
                                                                                        <div class="mr-[10px] mt-[2px]">
                                                                                            @if($twopersondata[0]->order_status == 4)
                                                                                                <img src="{{asset('frontend/img/member-clapping.svg')}}"
                                                                                                    alt="statusIcon">
                                                                                            @elseif($twopersondata[0]->order_status ==3)
                                                                                                <img src="{{asset('frontend/img/member-check-circle.svg')}}"
                                                                                                alt="statusIcon">
                                                                                            @elseif($itemDetails->order_status ==6 or $itemDetails->order_status ==7)
                                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                                                                                                    <path d="M9.10156 1.90966C7.59766 2.062 6.08203 2.65185 4.83594 3.57372C4.33203 3.94872 3.46484 4.812 3.09766 5.30419C1.39063 7.60888 0.91797 10.519 1.82031 13.23C2.82813 16.2651 5.42578 18.4604 8.65234 19.0034C9.25 19.1011 10.7813 19.1011 11.3477 18.9995C13.2148 18.6714 14.7891 17.8628 16.0742 16.5737C17.4883 15.1597 18.3398 13.3706 18.5586 11.3667C18.6211 10.7573 18.5859 9.64013 18.4805 9.03466C18.2344 7.64404 17.7031 6.41357 16.8516 5.28075C16.5664 4.90185 15.8633 4.16747 15.4609 3.83154C13.7383 2.39404 11.3789 1.6831 9.10156 1.90966ZM10.5859 3.27294C12.3086 3.42529 13.8711 4.14794 15.0742 5.35107C17.6719 7.94091 17.9492 11.9448 15.7266 14.894C15.4258 15.2964 14.7969 15.9253 14.3945 16.2261C12.8945 17.355 11.0664 17.8745 9.26172 17.687C6.73438 17.4214 4.55078 15.8901 3.46094 13.6245C2.50781 11.644 2.51172 9.3081 3.46875 7.32763C4.44141 5.31591 6.37109 3.82372 8.55469 3.39013C9.28906 3.2456 9.87891 3.21044 10.5859 3.27294Z" fill="#333333"></path>
                                                                                                    <path d="M6.77734 6.94011C6.58984 7.02604 6.50781 7.11198 6.42578 7.30729C6.35156 7.48698 6.35156 7.65104 6.42578 7.83464C6.46875 7.92839 6.91406 8.40495 7.74609 9.23698L9.00391 10.4987L7.74609 11.7604C6.47656 13.03 6.36719 13.1628 6.36719 13.4245C6.36719 13.9167 6.93359 14.2487 7.375 14.0182C7.45312 13.9753 8.07422 13.3854 8.75 12.7096L9.98047 11.4753L11.2305 12.7214C11.918 13.405 12.5352 13.9948 12.6055 14.03C12.9961 14.2253 13.5117 13.9635 13.582 13.5339C13.6367 13.1823 13.6523 13.1979 12.2539 11.7995L10.9609 10.4987L12.2344 9.22136C13.5977 7.84636 13.6211 7.81511 13.582 7.46745C13.5469 7.15495 13.2266 6.86589 12.9102 6.86589C12.6562 6.86589 12.4883 7.00651 11.25 8.2487C10.5742 8.92839 10.0039 9.48308 9.98047 9.48308C9.95703 9.48308 9.38672 8.92839 8.71094 8.2487C7.26953 6.80339 7.19141 6.7487 6.77734 6.94011Z" fill="#333333"></path>
                                                                                                </svg>
                                                                                            @else
                                                                                                <img src="{{asset('frontend/img/member-ast.svg')}}"
                                                                                                alt="statusIcon">
                                                                                            @endif
                                                                                        </div>
                                                                                        @php
                                                                                        $textColor = "";
                                                                                        if($twopersondata[0]->order_status == 3) {
                                                                                            $textColor = "text-meGreen";
                                                                                        }else if($twopersondata[0]->order_status == 2) {
                                                                                            $textColor = "text-darkgray";
                                                                                        }else if($twopersondata[0]->order_status == 1) {
                                                                                            $textColor = "text-mered";
                                                                                        }
                                                                                        @endphp
                                                                                        <p
                                                                                            class="font-bold me-body-18 {{$textColor}}">
                                                                                            {{config("mediq.booking_status_".app()->getLocale())[$twopersondata[0]->order_status]}}</p>
                                                                                    </div>
                                                                                    <div
                                                                                        class="flex items-center mt-[10px]">
                                                                                        <div class="mr-[10px]">
                                                                                            <img src="{{ asset('frontend/img/member-user.svg') }}"
                                                                                                alt="member-user">
                                                                                        </div>
                                                                                        <p
                                                                                            class="font-normal me-body-18 text-darkgray">
                                                                                            {{$twopersondata[0]->last_name}} {{$twopersondata[0]->first_name}}</p>
                                                                                    </div>
                                                                                </div>
                                                                                @if($twopersondata[0]->order_status==7)
                                                                                    <div class="flex items-center mt-3">
                                                                                        <button data-id="{{$twopersondata[0]->id}}" class="refund-detail-btn-content rounded-md min-w-[135px] py-[9px] px-5 me-body-16 font-normal text-darkgray border-1 border-darkgray hover:border-orangeMediq hover:text-orangeMediq">@lang('labels.order_details.refund_details')</button>
                                                                                    </div>
                                                                                    <div id="me-checkout-refund-complete-popup{{$twopersondata[0]->id}}" class="hidden me-checkout-refund-complete-popup">
                                                                                        <div
                                                                                            class="max-h-[80%] me-checkout-refund-complete-popup-content overflow-visible xl:p-10 p-5 rounded-[12px] sm:max-w-[438px] sm:min-w-[unset] min-w-[95%]">
                                                                                            <div class="relative w-full overflow-y-auto custom-cancellation-scrollbar">
                                                                                                <button
                                                                                                    class="z-[1] absolute top-0 right-0 focus-visible:outline-none focus:outline-none p-1"
                                                                                                    id="me-checkout-refund-complete-popup-close-btn"><img
                                                                                                        class=" w-auto h-auto align-middle"
                                                                                                        src="{{ asset('frontend/img/close-btn.png') }}" alt=""></button>
                                                                                                <div class="flex items-center">
                                                                                                    <img src="{{ asset('frontend/img/member-check-circle.svg') }}"
                                                                                                        alt="statusIcon" class="mr-2">
                                                                                                    <h1 class="me-body-23 font-bold text-meGreen">
                                                                                                        @lang('labels.order_details.refunded')</h1>
                                                                                                </div>
                                                                                                <hr class="my-5 bg-mee4">
                                                                                                <div>
                                                                                                    <p class="font-bold me-body-18 text-darkgray"> @lang('labels.order_details.refunded_on') {{date('d F Y H:i A', strtotime($twopersondata[0]->updated_at))}}</p>
                                                                                                    <p class="font-normal me-body-18 text-darkgray mt-1">@lang('labels.order_details.refunded_successfully')
                                                                                                    </p>
                                                                                                </div>
                                                                                                <hr class="my-5 bg-mee4">
                                                                                                <div class="flex justify-between">
                                                                                                    <p class="font-bold me-body-18 text-darkgray">@lang('labels.order_details.refunded_amount')</p>
                                                                                                    <p class="font-bold me-body-18 text-darkgray">HK$ {{$twopersondata[0]->total}}</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                @else
                                                                                    <div class="flex items-center my-1">
                                                                                        <div class="flex items-center pr-3">
                                                                                            <p
                                                                                                class="font-bold me-body-45 text-darkgray leading-[normal] booking-selected-dayno booking-selected-dayno-2">
                                                                                                {{$twopersondata[0]->confirm_booking_date!=null?date('j', strtotime($twopersondata[0]->confirm_booking_date)):''}}
                                                                                                </p>
                                                                                            <p
                                                                                                class="font-bold me-body-16 text-darkgray max-w-[30px] leading-[normal] booking-selected-month-day booking-selected-month-day-2">
                                                                                                {{$twopersondata[0]->confirm_booking_date!=null?date('M', strtotime($twopersondata[0]->confirm_booking_date)):''}}
                                                                                                {{$twopersondata[0]->confirm_booking_date!=null?date('D', strtotime($twopersondata[0]->confirm_booking_date)):''}}</p>
                                                                                        </div>
                                                                                        <div
                                                                                            class="border-l-1 border-l-mee4 pl-3">
                                                                                            <p
                                                                                                class="font-bold me-body-28 text-darkgray leading-[normal] booking-selected-time booking-selected-time-2">
                                                                                                {{$twopersondata[0]->confirm_booking_time!==null?$twopersondata[0]->confirm_booking_time:''}}</p>
                                                                                        </div>
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                        @php
                                                                        $recipient = App\Models\Recipient::select('recipients.*')
                                                                                    ->join('products','recipients.product_id','=','products.id')
                                                                                    ->where('recipients.id',$twopersondata[0]->id)
                                                                                    ->first();
                                                                        //$product_merchant = $recipient->product->merchant()->with(['merchantLocations','merchantLocations.area','merchantLocations.weekDays','merchantLocations.events'])->first();
                                                                        $product_merchant = $recipient->product->product_location_data;
                                                                        $recipient->order_details_edit = 1;
                                                                        @endphp
                                                                        <input type="hidden" class="hidden location-json-data location-json-data-receipientData{{$recipient->id}}" value="{{ json_encode($product_merchant)}}">
                                                                        @if($twopersondata[0]->date != null)
                                                                            <div class="flex mt-1">
                                                                                <div class="flex w-full justify-between preferredTime-detail3 flex">
                                                                                    <div class="flex items-center">
                                                                                        <div class="mr-2 max-w-[24px] w-[24px]">
                                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                                                                                                <path
                                                                                                    d="M14.1667 12.1667C14.3877 12.1667 14.5996 12.0789 14.7559 11.9226C14.9122 11.7663 15 11.5543 15 11.3333C15 11.1123 14.9122 10.9004 14.7559 10.7441C14.5996 10.5878 14.3877 10.5 14.1667 10.5C13.9457 10.5 13.7337 10.5878 13.5774 10.7441C13.4211 10.9004 13.3333 11.1123 13.3333 11.3333C13.3333 11.5543 13.4211 11.7663 13.5774 11.9226C13.7337 12.0789 13.9457 12.1667 14.1667 12.1667ZM14.1667 15.5C14.3877 15.5 14.5996 15.4122 14.7559 15.2559C14.9122 15.0996 15 14.8877 15 14.6667C15 14.4457 14.9122 14.2337 14.7559 14.0774C14.5996 13.9211 14.3877 13.8333 14.1667 13.8333C13.9457 13.8333 13.7337 13.9211 13.5774 14.0774C13.4211 14.2337 13.3333 14.4457 13.3333 14.6667C13.3333 14.8877 13.4211 15.0996 13.5774 15.2559C13.7337 15.4122 13.9457 15.5 14.1667 15.5ZM10.8333 11.3333C10.8333 11.5543 10.7455 11.7663 10.5893 11.9226C10.433 12.0789 10.221 12.1667 10 12.1667C9.77899 12.1667 9.56702 12.0789 9.41074 11.9226C9.25446 11.7663 9.16667 11.5543 9.16667 11.3333C9.16667 11.1123 9.25446 10.9004 9.41074 10.7441C9.56702 10.5878 9.77899 10.5 10 10.5C10.221 10.5 10.433 10.5878 10.5893 10.7441C10.7455 10.9004 10.8333 11.1123 10.8333 11.3333ZM10.8333 14.6667C10.8333 14.8877 10.7455 15.0996 10.5893 15.2559C10.433 15.4122 10.221 15.5 10 15.5C9.77899 15.5 9.56702 15.4122 9.41074 15.2559C9.25446 15.0996 9.16667 14.8877 9.16667 14.6667C9.16667 14.4457 9.25446 14.2337 9.41074 14.0774C9.56702 13.9211 9.77899 13.8333 10 13.8333C10.221 13.8333 10.433 13.9211 10.5893 14.0774C10.7455 14.2337 10.8333 14.4457 10.8333 14.6667ZM5.83333 12.1667C6.05435 12.1667 6.26631 12.0789 6.42259 11.9226C6.57887 11.7663 6.66667 11.5543 6.66667 11.3333C6.66667 11.1123 6.57887 10.9004 6.42259 10.7441C6.26631 10.5878 6.05435 10.5 5.83333 10.5C5.61232 10.5 5.40036 10.5878 5.24408 10.7441C5.0878 10.9004 5 11.1123 5 11.3333C5 11.5543 5.0878 11.7663 5.24408 11.9226C5.40036 12.0789 5.61232 12.1667 5.83333 12.1667ZM5.83333 15.5C6.05435 15.5 6.26631 15.4122 6.42259 15.2559C6.57887 15.0996 6.66667 14.8877 6.66667 14.6667C6.66667 14.4457 6.57887 14.2337 6.42259 14.0774C6.26631 13.9211 6.05435 13.8333 5.83333 13.8333C5.61232 13.8333 5.40036 13.9211 5.24408 14.0774C5.0878 14.2337 5 14.4457 5 14.6667C5 14.8877 5.0878 15.0996 5.24408 15.2559C5.40036 15.4122 5.61232 15.5 5.83333 15.5Z"
                                                                                                    fill="#333333"></path>
                                                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                                                    d="M5.83268 1.95801C5.99844 1.95801 6.15741 2.02386 6.27462 2.14107C6.39183 2.25828 6.45768 2.41725 6.45768 2.58301V3.21884C7.00935 3.20801 7.61685 3.20801 8.28518 3.20801H11.7127C12.3818 3.20801 12.9893 3.20801 13.541 3.21884V2.58301C13.541 2.41725 13.6069 2.25828 13.7241 2.14107C13.8413 2.02386 14.0003 1.95801 14.166 1.95801C14.3318 1.95801 14.4907 2.02386 14.608 2.14107C14.7252 2.25828 14.791 2.41725 14.791 2.58301V3.27217C15.0077 3.28884 15.2127 3.30967 15.4068 3.33551C16.3835 3.46717 17.1743 3.74384 17.7985 4.36717C18.4218 4.99134 18.6985 5.78217 18.8302 6.75884C18.9577 7.70884 18.9577 8.92134 18.9577 10.453V12.213C18.9577 13.7447 18.9577 14.958 18.8302 15.9072C18.6985 16.8838 18.4218 17.6747 17.7985 18.2988C17.1743 18.9222 16.3835 19.1988 15.4068 19.3305C14.4568 19.458 13.2443 19.458 11.7127 19.458H8.28601C6.75435 19.458 5.54102 19.458 4.59185 19.3305C3.61518 19.1988 2.82435 18.9222 2.20018 18.2988C1.57685 17.6747 1.30018 16.8838 1.16852 15.9072C1.04102 14.9572 1.04102 13.7447 1.04102 12.213V10.453C1.04102 8.92134 1.04102 7.70801 1.16852 6.75884C1.30018 5.78217 1.57685 4.99134 2.20018 4.36717C2.82435 3.74384 3.61518 3.46717 4.59185 3.33551C4.78602 3.30967 4.99185 3.28884 5.20768 3.27217V2.58301C5.20768 2.41725 5.27353 2.25828 5.39074 2.14107C5.50795 2.02386 5.66692 1.95801 5.83268 1.95801ZM4.75768 4.57467C3.92018 4.68717 3.43685 4.89884 3.08435 5.25134C2.73185 5.60384 2.52018 6.08717 2.40768 6.92551C2.38852 7.06717 2.37268 7.21717 2.35935 7.37467H17.6393C17.626 7.21634 17.6102 7.06717 17.591 6.92467C17.4785 6.08717 17.2668 5.60384 16.9143 5.25134C16.5618 4.89884 16.0785 4.68717 15.2402 4.57467C14.3843 4.45967 13.2552 4.45801 11.666 4.45801H8.33268C6.74351 4.45801 5.61518 4.45967 4.75768 4.57467ZM2.29102 10.4997C2.29102 9.78801 2.29102 9.16884 2.30185 8.62467H17.6968C17.7077 9.16884 17.7077 9.78801 17.7077 10.4997V12.1663C17.7077 13.7555 17.706 14.8847 17.591 15.7413C17.4785 16.5788 17.2668 17.0622 16.9143 17.4147C16.5618 17.7672 16.0785 17.9788 15.2402 18.0913C14.3843 18.2063 13.2552 18.208 11.666 18.208H8.33268C6.74351 18.208 5.61518 18.2063 4.75768 18.0913C3.92018 17.9788 3.43685 17.7672 3.08435 17.4147C2.73185 17.0622 2.52018 16.5788 2.40768 15.7405C2.29268 14.8847 2.29102 13.7555 2.29102 12.1663V10.4997Z"
                                                                                                    fill="#333333"></path>
                                                                                            </svg>
                                                                                        </div>
                                                                                        <p class="font-normal me-body-18 text-darkgray flex items-center preferredTime">
                                                                                            <span class="preferred-name-3 hidden"></span>
                                                                                            <span class="preferred-date-3 hidden"></span>
                                                                                            <span class="preferred-date-custom-3 ">{{date('d F Y', strtotime($twopersondata[0]->date))}}</span>
                                                                                            <span class="preferred-timeDesc-3 ml-[10px]">{{$twopersondata[0]->time}}</span>
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            @endif
                                                                            @if($recipient->variable_id != NULL)
                                                                            @php $vairableProductName = \App\Models\ProductVariation::find($recipient->variable_id); @endphp
                                                                            <div class="flex w-full justify-between my-1">
                                                                                <div class="flex items-center">
                                                                                    <div class="mr-2 max-w-[24px] w-[24px]">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17" fill="none">
                                                                                            <path d="M2.26253 9.27684H1.08814H1.08799V9.12684L2.26253 9.27684ZM2.26253 9.27684L2.26253 15.5893L2.26253 15.5895C2.26286 15.8717 2.37512 16.1423 2.57469 16.3419C2.77425 16.5414 3.04481 16.6537 3.32703 16.654H3.32721H16.6725H16.6727C16.9549 16.6537 17.2255 16.5414 17.4251 16.3419C17.6246 16.1423 17.7369 15.8717 17.7372 15.5895V15.5893V9.27684H18.9116H18.9117V9.12684L2.26253 9.27684ZM8.78542 9.03306L8.78539 9.03313C8.75124 9.10602 8.69701 9.16766 8.62908 9.21083L8.54864 9.08422L8.62907 9.21083C8.56113 9.25399 8.48229 9.27689 8.4018 9.27684M8.78542 9.03306L8.4018 9.27684M8.78542 9.03306L9.57643 7.34247V15.8071H3.32799H3.32787C3.26999 15.8072 3.21447 15.7843 3.1735 15.7434C3.13256 15.7025 3.10951 15.6471 3.1094 15.5893C3.1094 15.5892 3.1094 15.5892 3.1094 15.5891L3.1094 15.2525H7.22081C7.33311 15.2525 7.44081 15.2078 7.52022 15.1284C7.59963 15.049 7.64425 14.9413 7.64425 14.829C7.64425 14.7167 7.59963 14.609 7.52022 14.5296C7.44081 14.4502 7.33311 14.4056 7.22081 14.4056H3.1094V9.27684M8.78542 9.03306L3.1094 9.27684M8.4018 9.27684H3.1094M8.4018 9.27684H3.1094M9.56331 4.84103L9.5633 4.84103L7.74516 3.11999C7.53434 2.90837 7.41595 2.62179 7.41599 2.32302C7.41603 2.02358 7.53502 1.73642 7.74678 1.52471C7.95854 1.31301 8.24573 1.19409 8.54517 1.19413C8.84461 1.19417 9.13177 1.31316 9.34348 1.52492L9.7005 1.8821L9.70056 1.88216C9.77996 1.9615 9.88762 2.00608 9.99987 2.00608C10.1121 2.00608 10.2198 1.9615 10.2992 1.88216L10.2992 1.88212L10.6187 1.56259L10.6188 1.56261L10.6208 1.56052C10.8243 1.34893 11.1006 1.22244 11.3938 1.2066C11.6865 1.19078 11.9742 1.28638 12.1992 1.47412C12.3147 1.57531 12.4084 1.699 12.4744 1.83763C12.5407 1.97673 12.5778 2.12793 12.5834 2.28191C12.589 2.43589 12.563 2.58939 12.5071 2.73296C12.4514 2.87578 12.3673 3.00575 12.2597 3.11497L10.4364 4.84103L10.5396 4.94996L10.4364 4.84103C10.3185 4.95269 10.1623 5.01491 9.99987 5.01491C9.83747 5.01491 9.68124 4.95269 9.56331 4.84103ZM1.75364 8.42996L2.95544 5.86168H9.33424L8.13257 8.42996H1.75364ZM16.8903 15.5891C16.8903 15.6469 16.8673 15.7023 16.8264 15.7432C16.7855 15.7841 16.7301 15.8071 16.6723 15.8071H10.4233V7.34247L11.2143 9.03304C11.2143 9.03305 11.2143 9.03306 11.2143 9.03306C11.2484 9.10599 11.3026 9.16768 11.3706 9.21088C11.4385 9.25408 11.5173 9.27701 11.5978 9.27699C11.5979 9.27699 11.5979 9.27699 11.5979 9.27699H16.8903V15.5891ZM18.2469 8.42996H11.8672L10.6655 5.86168H17.0451L18.2469 8.42996Z" fill="#333333" stroke="#333333" stroke-width="0.3"></path>
                                                                                            </svg>
                                                                                    </div>
                                                                                    <p class="font-normal me-body-18 text-darkgray flex items-center packages_item leading-[normal]">
                                                                                        {{-- //Whole Body Screening (Plain + Contrast) --}}
                                                                                        {{ langbind($vairableProductName, 'name') }}</p>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                            @endif
                                                                        <div class="mt-[5px] flex items-center ">
                                                                            @php
                                                                            $product = App\Models\Product::find($twopersondata[0]->product_id);
                                                                            $location = App\Models\MerchantLocation::where("area_id", $twopersondata[0]->confirm_location)
                                                                                                        ->where("merchant_id",$product->merchant->id)->first();
                                                                            @endphp
                                                                            @if($twopersondata[0]->confirm_booking_date!=null)
                                                                            <div class="mr-[10px]">
                                                                                <img src="{{ asset('frontend/img/member-location.png') }}"
                                                                                    alt="member-location"
                                                                                    class="min-w-[20px]">
                                                                            </div>
                                                                            <p
                                                                                class="font-normal me-body-18 text-darkgray leading-[normal] preferred-name-1">
                                                                                {{@langbind($location,'full_address')}}
                                                                            </p>
                                                                            @endif
                                                                        </div>
                                                                        @if(count($recipient->group_data) > 0)
                                                                        @foreach($recipient->group_data as $group)
                                                                            @php
                                                                                $checkUpTable = $recipient->product->package->checkupTable;
                                                                                $tablePriIds =
                                                                                App\Models\CheckUpTableType::where('check_up_type_id',2)->where('check_up_table_id',$checkUpTable->id)->pluck('id')->toArray();
                                                                                $optionGroupIds=
                                                                                App\Models\CheckTableItem::where('check_up_group_id',$group->id)->whereIn('check_up_table_type_id',$tablePriIds)->distinct()->pluck('check_up_item_id')->toArray();
                                                                                $countEquivalentNumber = App\Models\CheckUpItem::whereIn('id',$optionGroupIds)->sum('equivalent_number');
                                                                            @endphp
                                                                            <div component-name="me-checkout-merchant-recipient-cancerMarker-detail"
                                                                                class="mt-1">
                                                                                <div class="flex sm:flex-row flex-col">

                                                                                    <div
                                                                                        class="flex w-full justify-between cancer-markers-detail-data1-receipientData111">
                                                                                        <div class="flex items-center w-full">
                                                                                            <div class="mr-2 max-w-[24px] w-[24px]">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                                                    height="25" viewBox="0 0 24 25" fill="none">
                                                                                                    <path
                                                                                                        d="M9.4979 3.00898C8.94263 3.08328 8.22312 3.3531 7.73824 3.66984C7.3824 3.90446 6.83104 4.44409 6.60815 4.77647C6.38525 5.10885 6.15845 5.58982 6.02941 6.01605C5.93165 6.34452 5.92383 6.41882 5.91992 7.0914C5.91992 7.72097 5.92774 7.83437 5.99422 7.96341C6.20929 8.39746 6.8193 8.40919 7.03046 7.98296C7.09694 7.8461 7.10085 7.7718 7.08521 7.28692C7.05784 6.66126 7.11258 6.36407 7.32765 5.89092C7.49189 5.53508 7.65221 5.30046 7.91812 5.03846C8.81359 4.13908 10.1431 3.91228 11.2849 4.45582C12.0475 4.81948 12.6497 5.55072 12.8647 6.38363C12.9273 6.61043 12.9429 6.78639 12.939 7.1305C12.9234 7.90476 12.9273 7.91649 13.0055 8.02207C13.2088 8.29188 13.4786 8.36227 13.7563 8.21758C13.9909 8.09636 14.0652 7.93995 14.1082 7.47853C14.1786 6.72774 14.0457 6.00823 13.7015 5.31219C13.4552 4.80775 13.2049 4.46755 12.8178 4.10389C12.0748 3.40002 11.1794 3.03245 10.1431 3.00507C9.86548 2.99725 9.5722 3.00116 9.4979 3.00898Z"
                                                                                                        fill="#333333" />
                                                                                                    <path
                                                                                                        d="M9.54314 5.43202C9.05825 5.56106 8.62029 5.93645 8.39349 6.41352L8.26836 6.67942L8.25663 11.3992C8.25272 14.07 8.23316 16.1229 8.21361 16.1229C8.19406 16.1229 8.03374 15.9626 7.85386 15.7632C7.2282 15.0789 6.84499 14.8873 6.14503 14.9186C5.81656 14.9303 5.73053 14.9498 5.49982 15.0632C4.48704 15.552 4.17812 16.862 4.87807 17.7184C4.97583 17.8435 5.97689 18.9189 7.09525 20.1115C9.18338 22.3326 9.35544 22.4968 9.85988 22.7315C10.4191 22.9934 10.2978 22.9817 13.3284 22.9974C15.6237 23.0052 16.1321 22.9974 16.3863 22.9504C16.9885 22.837 17.4577 22.5868 17.9113 22.1449C18.4157 21.6483 18.6895 21.0656 18.7716 20.3188C18.7951 20.0685 18.8068 18.8328 18.799 16.7877L18.7833 13.6399L18.6973 13.4052C18.5096 12.9047 18.1303 12.5176 17.6415 12.326C17.3404 12.2087 16.7734 12.1969 16.4645 12.3064C16.2572 12.3768 16.2494 12.3768 16.2025 12.3064C15.9209 11.8998 15.6785 11.6925 15.2914 11.54C14.9942 11.4266 14.4233 11.4188 14.1183 11.5244C13.911 11.5947 13.9032 11.5947 13.8563 11.5244C13.5747 11.1177 13.3284 10.9104 12.9451 10.7618C12.7105 10.668 12.1983 10.6406 11.9167 10.6993L11.7681 10.7306V8.87313C11.7681 7.67265 11.7525 6.94142 11.7251 6.80846C11.5179 5.81132 10.5051 5.17393 9.54314 5.43202ZM10.3135 6.64814C10.3682 6.69115 10.4503 6.77327 10.4934 6.83193C10.5755 6.93751 10.5755 6.97661 10.595 10.668C10.6146 14.3633 10.6146 14.3985 10.6967 14.508C10.8727 14.7504 11.2246 14.8247 11.4553 14.6644C11.7486 14.4649 11.7447 14.4806 11.7681 13.2684C11.7877 12.2439 11.7916 12.1735 11.8698 12.0679C12.124 11.7238 12.6206 11.759 12.8435 12.1383C12.9139 12.2595 12.9217 12.3612 12.9412 13.3349C12.9608 14.332 12.9647 14.4024 13.0429 14.508C13.2971 14.8521 13.7937 14.8169 14.0166 14.4376C14.0831 14.3242 14.0987 14.2108 14.1143 13.632C14.13 13.0338 14.1417 12.9477 14.216 12.85C14.4702 12.5059 14.9668 12.5411 15.1897 12.9204C15.2562 13.0338 15.2718 13.1472 15.2875 13.7259C15.3031 14.3242 15.3148 14.4102 15.3891 14.508C15.5103 14.6722 15.7059 14.7621 15.9092 14.7426C16.2416 14.7074 16.4136 14.4845 16.4567 14.0309C16.4762 13.8315 16.5075 13.7024 16.5622 13.632C16.8164 13.2879 17.313 13.3231 17.5359 13.7024C17.6141 13.8315 17.6141 13.9058 17.6141 17.1005C17.6141 20.1975 17.6102 20.3774 17.5398 20.5808C17.3248 21.2103 16.8281 21.6639 16.2103 21.793C16.0695 21.8203 15.1662 21.8321 13.3479 21.8242C10.6928 21.8125 10.6928 21.8125 10.4738 21.7226C10.3526 21.6757 10.1727 21.5779 10.0749 21.5075C9.8325 21.3355 5.7931 17.038 5.72271 16.8776C5.60931 16.6156 5.69143 16.3419 5.9456 16.1542C6.059 16.0682 6.32882 16.0486 6.49305 16.1151C6.5478 16.1386 7.00531 16.5844 7.50584 17.1084C8.01027 17.6284 8.46388 18.0899 8.51862 18.125C8.65939 18.2228 8.97613 18.2189 9.13646 18.1172C9.20684 18.0781 9.29287 17.9843 9.33198 17.9139C9.39845 17.7927 9.40236 17.4877 9.42191 12.3416C9.44147 6.91404 9.44147 6.8984 9.52358 6.78891C9.70346 6.54256 10.0828 6.47608 10.3135 6.64814Z"
                                                                                                        fill="#333333" />
                                                                                                </svg>
                                                                                            </div>
                                                                                            <p
                                                                                                class="mr-2 font-normal me-body-18 text-darkgray underline  cancer-markers-label-1-receipientData{{$group->id}}{{$recipient->id}} ">
                                                                                                {{langbind($group,'name')}} (<span
                                                                                                    class="selected-cancermarkers-count-1-receipientData111">{{$group->itemDatas($group->id,$recipient->id,$recipient->product->id)->sum('equivalent_number')}}</span>
                                                                                                    @lang('labels.check_out.selected'))</p>
                                                                                            <div class="showDropdown-btn active">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                                                    height="7" viewBox="0 0 12 7" fill="none">
                                                                                                    <path
                                                                                                        d="M0.042841 6.46313C0.14831 6.69047 0.413154 6.7936 0.649873 6.6975C0.713154 6.67172 1.46315 5.93344 3.36628 4.02094L5.99831 1.37719L8.628 4.02094C10.5358 5.93579 11.2835 6.67172 11.3467 6.6975C11.396 6.71625 11.478 6.73266 11.5296 6.73266C11.8671 6.73266 12.0944 6.39047 11.9538 6.08813C11.8905 5.95454 6.32878 0.367034 6.19753 0.308441C6.078 0.252191 5.91862 0.252191 5.79909 0.308441C5.66784 0.367034 0.106123 5.95453 0.042841 6.08813C-0.0134086 6.20766 -0.0134086 6.3436 0.042841 6.46313Z"
                                                                                                        fill="#333333" />
                                                                                                </svg>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="hidden detail-data-list1-receipientData111">
                                                                                    <div component-name="me-checkout-merchant-recipient-cancerMarkers-detail-list"
                                                                                        class="pl-8 mt-1">
                                                                                        <ul class="custom-list-style bg-far px-5 py-[10px] rounded-[12px] cancerMarkers-detail-data1-receipientData111">
                                                                                            @if(count($group->itemDatas($group->id,$recipient->id,$recipient->product->id)) > 0)
                                                                                                @foreach($group->itemDatas($group->id,$recipient->id,$recipient->product->id) as $item)
                                                                                                <li class="flex items-center mt-2">
                                                                                                    <span class="mr-4 font-normal me-body-18 text-darkgray">{{langbind($item,'name')}}</span>
                                                                                                </li>
                                                                                                @endforeach
                                                                                            @else 
                                                                                            <li class="flex items-center mt-2">
                                                                                                <span class="mr-4 font-normal me-body-18 text-darkgray">@lang('labels.product_detail.decide_later')</span>
                                                                                            </li>
                                                                                            @endif
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                        @endif
                                                                        @if(count($recipient->add_on_data) > 0)
                                                                        <div component-name="me-checkout-merchant-recipient-preferredTime-detail"
                                                                            class="mt-1">
                                                                            <div>
                                                                                <div class="flex w-full justify-between addson-show-detail-receipientData111"
                                                                                    style="display:block">
                                                                                    <div class="flex items-center w-full">
                                                                                        <div class="mr-2 max-w-[24px] w-[24px]">
                                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                                                height="25" viewBox="0 0 24 25" fill="none">
                                                                                                <path
                                                                                                    d="M12.5 21C17.1944 21 21 17.1944 21 12.5C21 7.80558 17.1944 4 12.5 4C7.80558 4 4 7.80558 4 12.5C4 17.1944 7.80558 21 12.5 21Z"
                                                                                                    stroke="#333333" stroke-linecap="round"
                                                                                                    stroke-linejoin="round" />
                                                                                                <path
                                                                                                    d="M12.4992 8.57715V16.4233M8.57617 12.5002H16.4223"
                                                                                                    stroke="#333333" stroke-linecap="round"
                                                                                                    stroke-linejoin="round" />
                                                                                            </svg>
                                                                                        </div>
                                                                                        <p data-id="receipientData111"
                                                                                            class="mr-2 font-normal me-body-18 text-darkgray underline">
                                                                                            @lang('labels.check_out.add_on')</p>
                                                                                        <div class="showDropdown-btn active">
                                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                                                height="7" viewBox="0 0 12 7" fill="none">
                                                                                                <path
                                                                                                    d="M0.042841 6.46313C0.14831 6.69047 0.413154 6.7936 0.649873 6.6975C0.713154 6.67172 1.46315 5.93344 3.36628 4.02094L5.99831 1.37719L8.628 4.02094C10.5358 5.93579 11.2835 6.67172 11.3467 6.6975C11.396 6.71625 11.478 6.73266 11.5296 6.73266C11.8671 6.73266 12.0944 6.39047 11.9538 6.08813C11.8905 5.95454 6.32878 0.367034 6.19753 0.308441C6.078 0.252191 5.91862 0.252191 5.79909 0.308441C5.66784 0.367034 0.106123 5.95453 0.042841 6.08813C-0.0134086 6.20766 -0.0134086 6.3436 0.042841 6.46313Z"
                                                                                                    fill="#333333" />
                                                                                            </svg>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class=" addson-detail-list-receipientData111">
                                                                                <div component-name="me-checkout-merchant-recipient-addonItems-detail-list"
                                                                                    class="pl-8 mt-1">
                                                                                    <ul
                                                                                        class="custom-list-style bg-far px-5 py-[10px] rounded-[12px] adds-on-checklist-detailreceipientData111">
                                                                                        @foreach($recipient->add_on_data as $item)
                                                                                        <li data-text="Upper Abdomen Ultrasound"
                                                                                            data-price="{{$item->discount_price ? $item->discount_price :$item->original_price}}"
                                                                                            class="flex items-center mt-2">
                                                                                            <span
                                                                                                class="mr-4 font-normal me-body-18 text-darkgray">{{langbind($item,'name')}}</span>
                                                                                            <span
                                                                                                class="font-normal me-body-18 text-darkgray">${{$item->discount_price ? $item->discount_price :$item->original_price}}</span>
                                                                                        </li>
                                                                                        @endforeach
                                                                                    </ul>
                                                                                </div>
                                                                            </div>


                                                                            <div class="hidden">
                                                                                <input data-id="receipientData111" value="" type="hidden"
                                                                                    class="addson-checklist addson-checklist-undefined addson-checklist-receipientData111" />
                                                                            </div>
                                                                        </div>
                                                                        @endif
                                                                        @if($recipient->have_referral!=NULL)
                                                                            <div component-name="me-checkout-order-referral-letter" class="w-full justify-between referral-detail mt-2">
                                                                                <div class="flex items-center w-full">        
                                                                                    <p class="mr-2 font-normal me-body-18 text-darkgray">@lang('labels.order_details.referral_letter'): <span class="selected-addson">@lang('labels.compare.yes')</span></p>       
                                                                                </div>
                                                                                <div class="mt-4">
                                                                                    <div class="inline-block hover:border-orangeMediq hover:text-orangeMediq relative min-h-[40px] py-2 px-5 border-1 border-darkgray text-center me-body16 rounded-[6px] min-w-[135px] leading-[22.4px]">
                                                                                        <a href="{{$recipient->file_upload}}" class="absolute top-[48%] left-1/2 -translate-x-1/2 -translate-y-1/2">@lang('labels.order_details.view')</a>
                                                                                    </div>
                                                                                </div>
                                                                                @if($recipient->message!=NULL)
                                                                                <p
                                                                                    class="mt-2 font-normal me-body-18 text-darkgray">
                                                                                    @lang('labels.partnership.message'): {{$recipient->message}}
                                                                                </p>
                                                                                @endif
                                                                            </div>
                                                                            @endif
                                                                        @if($twopersondata[0]->remark!="")
                                                                        <p
                                                                            class="font-normal me-body-18 text-darkgray mt-[10px] ">
                                                                            @lang('labels.check_out.special_requests'): {{$twopersondata[0]->remark}}
                                                                        </p>
                                                                        @endif
                                                                        @if($twopersondata[0]->order_status==1)
                                                                        @if($twopersondata[0]->confirm_booking_date!=null)
                                                                        <p class="font-normal me-body-16 text-orangeMediq">@lang('labels.order_details.booking_comfirmed_text_1') {{\Carbon\Carbon::parse($twopersondata[0]->created_at)->addDays(3)->format('d F Y')}} @lang('labels.order_details.booking_comfirmed_text_2')</p>
                                                                        @else
                                                                        <p class="font-normal me-body-16 text-orangeMediq">@lang('labels.order_details.please_click_text3') {{ \Carbon\Carbon::parse($twopersondata[0]->created_at)->addDays(3)->format('d F Y')}} @lang('labels.order_details.please_click_text4')</p>
                                                                        @endif
                                                                        @endif
                                                                        @if($twopersondata[0]->order_status==2)
                                                                        <p class="font-normal me-body-18 text-darkgray">@lang('labels.order_details.2_working_days_text1') <a href="https://api.whatsapp.com/send?phone=85295194000" target="_blank" class="underline underline-offset-2">@lang('labels.order_details.2_working_days_text2') </a></p>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div id="me-member-order-edit-booking-popup" class="hidden me-member-order-edit-booking-popup me-member-order-edit-booking-popup-{{$twopersondata[0]->recipient_id}}">
                                                                    <div
                                                                        class="me-member-order-edit-booking-popup-content overflow-visible px-5 rounded-[12px] xl:min-w-[1060px] max-w-[1000px] min-w-[90%] max-h-[80%]">
                                                                        <div
                                                                            class="w-full h-full overflow-y-auto py-5 lg:py-10">
                                                                            <button data-id="{{$twopersondata[0]->recipient_id}}"
                                                                                class="z-[1] absolute top-5 right-5 focus-visible:outline-none focus:outline-none p-1"
                                                                                id="me-member-order-edit-booking-popup-closebtn"><img
                                                                                    class=" w-auto h-auto align-middle"
                                                                                    src="{{ asset('frontend/img/close-btn.png') }}"
                                                                                    alt=""></button>
                                                                            <div>
                                                                                <div class="flex justify-between">
                                                                                    <h3
                                                                                        class="font-bold me-body-23 text-darkgray text-left">
                                                                                        @lang('labels.order_details.edit_booking')</h3>
                                                                                </div>
                                                                                <hr class="my-5 bg-mee4">
                                                                                <div>
                                                                                    <div component-name="me-checkout-merchant-recipient-data"
                                                                                        class="">
                                                                                        <div
                                                                                            class="me-checkout-merchant-content-card-container">
                                                                
                                                                                            <div data-id="1"
                                                                                                data-parentid="1"
                                                                                                class="mt-7 data-card-items data-card-items-1">
                                                                                                <p
                                                                                                    class="hidden font-bold me-body-20 text-white px-5 py-[10px] bg-blueMediq">
                                                                                                </p>
                                                                                                <div class="mt-4">
                                                                                                    <div component-name="me-checkout-merchant-recipient-preferredTime-detail"
                                                                                                        class="mt-1 @@refundCard">
                                                                
                                                                                                        <div
                                                                                                            class="flex">
                                                                                                            <div
                                                                                                                class="flex preferredTime-placeholder1 hidden">
                                                                                                                <div
                                                                                                                    class="mr-2 max-w-[24px] w-[24px]">
                                                                                                                    <svg xmlns="http://www.w3.org/2000/svg')}}"
                                                                                                                        width="20"
                                                                                                                        height="21"
                                                                                                                        viewBox="0 0 20 21"
                                                                                                                        fill="none">
                                                                                                                        <path
                                                                                                                            d="M14.1667 12.1667C14.3877 12.1667 14.5996 12.0789 14.7559 11.9226C14.9122 11.7663 15 11.5543 15 11.3333C15 11.1123 14.9122 10.9004 14.7559 10.7441C14.5996 10.5878 14.3877 10.5 14.1667 10.5C13.9457 10.5 13.7337 10.5878 13.5774 10.7441C13.4211 10.9004 13.3333 11.1123 13.3333 11.3333C13.3333 11.5543 13.4211 11.7663 13.5774 11.9226C13.7337 12.0789 13.9457 12.1667 14.1667 12.1667ZM14.1667 15.5C14.3877 15.5 14.5996 15.4122 14.7559 15.2559C14.9122 15.0996 15 14.8877 15 14.6667C15 14.4457 14.9122 14.2337 14.7559 14.0774C14.5996 13.9211 14.3877 13.8333 14.1667 13.8333C13.9457 13.8333 13.7337 13.9211 13.5774 14.0774C13.4211 14.2337 13.3333 14.4457 13.3333 14.6667C13.3333 14.8877 13.4211 15.0996 13.5774 15.2559C13.7337 15.4122 13.9457 15.5 14.1667 15.5ZM10.8333 11.3333C10.8333 11.5543 10.7455 11.7663 10.5893 11.9226C10.433 12.0789 10.221 12.1667 10 12.1667C9.77899 12.1667 9.56702 12.0789 9.41074 11.9226C9.25446 11.7663 9.16667 11.5543 9.16667 11.3333C9.16667 11.1123 9.25446 10.9004 9.41074 10.7441C9.56702 10.5878 9.77899 10.5 10 10.5C10.221 10.5 10.433 10.5878 10.5893 10.7441C10.7455 10.9004 10.8333 11.1123 10.8333 11.3333ZM10.8333 14.6667C10.8333 14.8877 10.7455 15.0996 10.5893 15.2559C10.433 15.4122 10.221 15.5 10 15.5C9.77899 15.5 9.56702 15.4122 9.41074 15.2559C9.25446 15.0996 9.16667 14.8877 9.16667 14.6667C9.16667 14.4457 9.25446 14.2337 9.41074 14.0774C9.56702 13.9211 9.77899 13.8333 10 13.8333C10.221 13.8333 10.433 13.9211 10.5893 14.0774C10.7455 14.2337 10.8333 14.4457 10.8333 14.6667ZM5.83333 12.1667C6.05435 12.1667 6.26631 12.0789 6.42259 11.9226C6.57887 11.7663 6.66667 11.5543 6.66667 11.3333C6.66667 11.1123 6.57887 10.9004 6.42259 10.7441C6.26631 10.5878 6.05435 10.5 5.83333 10.5C5.61232 10.5 5.40036 10.5878 5.24408 10.7441C5.0878 10.9004 5 11.1123 5 11.3333C5 11.5543 5.0878 11.7663 5.24408 11.9226C5.40036 12.0789 5.61232 12.1667 5.83333 12.1667ZM5.83333 15.5C6.05435 15.5 6.26631 15.4122 6.42259 15.2559C6.57887 15.0996 6.66667 14.8877 6.66667 14.6667C6.66667 14.4457 6.57887 14.2337 6.42259 14.0774C6.26631 13.9211 6.05435 13.8333 5.83333 13.8333C5.61232 13.8333 5.40036 13.9211 5.24408 14.0774C5.0878 14.2337 5 14.4457 5 14.6667C5 14.8877 5.0878 15.0996 5.24408 15.2559C5.40036 15.4122 5.61232 15.5 5.83333 15.5Z"
                                                                                                                            fill="#333333">
                                                                                                                        </path>
                                                                                                                        <path
                                                                                                                            fill-rule="evenodd"
                                                                                                                            clip-rule="evenodd"
                                                                                                                            d="M5.83268 1.95801C5.99844 1.95801 6.15741 2.02386 6.27462 2.14107C6.39183 2.25828 6.45768 2.41725 6.45768 2.58301V3.21884C7.00935 3.20801 7.61685 3.20801 8.28518 3.20801H11.7127C12.3818 3.20801 12.9893 3.20801 13.541 3.21884V2.58301C13.541 2.41725 13.6069 2.25828 13.7241 2.14107C13.8413 2.02386 14.0003 1.95801 14.166 1.95801C14.3318 1.95801 14.4907 2.02386 14.608 2.14107C14.7252 2.25828 14.791 2.41725 14.791 2.58301V3.27217C15.0077 3.28884 15.2127 3.30967 15.4068 3.33551C16.3835 3.46717 17.1743 3.74384 17.7985 4.36717C18.4218 4.99134 18.6985 5.78217 18.8302 6.75884C18.9577 7.70884 18.9577 8.92134 18.9577 10.453V12.213C18.9577 13.7447 18.9577 14.958 18.8302 15.9072C18.6985 16.8838 18.4218 17.6747 17.7985 18.2988C17.1743 18.9222 16.3835 19.1988 15.4068 19.3305C14.4568 19.458 13.2443 19.458 11.7127 19.458H8.28601C6.75435 19.458 5.54102 19.458 4.59185 19.3305C3.61518 19.1988 2.82435 18.9222 2.20018 18.2988C1.57685 17.6747 1.30018 16.8838 1.16852 15.9072C1.04102 14.9572 1.04102 13.7447 1.04102 12.213V10.453C1.04102 8.92134 1.04102 7.70801 1.16852 6.75884C1.30018 5.78217 1.57685 4.99134 2.20018 4.36717C2.82435 3.74384 3.61518 3.46717 4.59185 3.33551C4.78602 3.30967 4.99185 3.28884 5.20768 3.27217V2.58301C5.20768 2.41725 5.27353 2.25828 5.39074 2.14107C5.50795 2.02386 5.66692 1.95801 5.83268 1.95801ZM4.75768 4.57467C3.92018 4.68717 3.43685 4.89884 3.08435 5.25134C2.73185 5.60384 2.52018 6.08717 2.40768 6.92551C2.38852 7.06717 2.37268 7.21717 2.35935 7.37467H17.6393C17.626 7.21634 17.6102 7.06717 17.591 6.92467C17.4785 6.08717 17.2668 5.60384 16.9143 5.25134C16.5618 4.89884 16.0785 4.68717 15.2402 4.57467C14.3843 4.45967 13.2552 4.45801 11.666 4.45801H8.33268C6.74351 4.45801 5.61518 4.45967 4.75768 4.57467ZM2.29102 10.4997C2.29102 9.78801 2.29102 9.16884 2.30185 8.62467H17.6968C17.7077 9.16884 17.7077 9.78801 17.7077 10.4997V12.1663C17.7077 13.7555 17.706 14.8847 17.591 15.7413C17.4785 16.5788 17.2668 17.0622 16.9143 17.4147C16.5618 17.7672 16.0785 17.9788 15.2402 18.0913C14.3843 18.2063 13.2552 18.208 11.666 18.208H8.33268C6.74351 18.208 5.61518 18.2063 4.75768 18.0913C3.92018 17.9788 3.43685 17.7672 3.08435 17.4147C2.73185 17.0622 2.52018 16.5788 2.40768 15.7405C2.29268 14.8847 2.29102 13.7555 2.29102 12.1663V10.4997Z"
                                                                                                                            fill="#333333">
                                                                                                                        </path>
                                                                                                                    </svg>
                                                                                                                </div>
                                                                                                                <p data-id="receipientData{{$recipient->id}}"
                                                                                                                    data-recipient_area_id="{{$recipient->location}}"
                                                                                                                    class="flex custom-remark-title cursor-pointer font-normal me-body-18 text-darkgray underline">
                                                                                                                    Select
                                                                                                                    your
                                                                                                                    preferred
                                                                                                                    time</p>
                                                                                                            </div>
                                                                                                            @include('frontend.checkouts.init-popup.preferred-time-popup')
                                                                                                            @include('frontend.checkouts.calendar_js')
                                                                                                            <div
                                                                                                                class="flex w-full justify-between preferredTime-detail1 flex">
                                                                                                                <div
                                                                                                                    class="flex items-center">
                                                                                                                    <div
                                                                                                                        class="mr-2 max-w-[24px] w-[24px]">
                                                                                                                        <svg xmlns="http://www.w3.org/2000/svg')}}"
                                                                                                                            width="20"
                                                                                                                            height="21"
                                                                                                                            viewBox="0 0 20 21"
                                                                                                                            fill="none">
                                                                                                                            <path
                                                                                                                                d="M14.1667 12.1667C14.3877 12.1667 14.5996 12.0789 14.7559 11.9226C14.9122 11.7663 15 11.5543 15 11.3333C15 11.1123 14.9122 10.9004 14.7559 10.7441C14.5996 10.5878 14.3877 10.5 14.1667 10.5C13.9457 10.5 13.7337 10.5878 13.5774 10.7441C13.4211 10.9004 13.3333 11.1123 13.3333 11.3333C13.3333 11.5543 13.4211 11.7663 13.5774 11.9226C13.7337 12.0789 13.9457 12.1667 14.1667 12.1667ZM14.1667 15.5C14.3877 15.5 14.5996 15.4122 14.7559 15.2559C14.9122 15.0996 15 14.8877 15 14.6667C15 14.4457 14.9122 14.2337 14.7559 14.0774C14.5996 13.9211 14.3877 13.8333 14.1667 13.8333C13.9457 13.8333 13.7337 13.9211 13.5774 14.0774C13.4211 14.2337 13.3333 14.4457 13.3333 14.6667C13.3333 14.8877 13.4211 15.0996 13.5774 15.2559C13.7337 15.4122 13.9457 15.5 14.1667 15.5ZM10.8333 11.3333C10.8333 11.5543 10.7455 11.7663 10.5893 11.9226C10.433 12.0789 10.221 12.1667 10 12.1667C9.77899 12.1667 9.56702 12.0789 9.41074 11.9226C9.25446 11.7663 9.16667 11.5543 9.16667 11.3333C9.16667 11.1123 9.25446 10.9004 9.41074 10.7441C9.56702 10.5878 9.77899 10.5 10 10.5C10.221 10.5 10.433 10.5878 10.5893 10.7441C10.7455 10.9004 10.8333 11.1123 10.8333 11.3333ZM10.8333 14.6667C10.8333 14.8877 10.7455 15.0996 10.5893 15.2559C10.433 15.4122 10.221 15.5 10 15.5C9.77899 15.5 9.56702 15.4122 9.41074 15.2559C9.25446 15.0996 9.16667 14.8877 9.16667 14.6667C9.16667 14.4457 9.25446 14.2337 9.41074 14.0774C9.56702 13.9211 9.77899 13.8333 10 13.8333C10.221 13.8333 10.433 13.9211 10.5893 14.0774C10.7455 14.2337 10.8333 14.4457 10.8333 14.6667ZM5.83333 12.1667C6.05435 12.1667 6.26631 12.0789 6.42259 11.9226C6.57887 11.7663 6.66667 11.5543 6.66667 11.3333C6.66667 11.1123 6.57887 10.9004 6.42259 10.7441C6.26631 10.5878 6.05435 10.5 5.83333 10.5C5.61232 10.5 5.40036 10.5878 5.24408 10.7441C5.0878 10.9004 5 11.1123 5 11.3333C5 11.5543 5.0878 11.7663 5.24408 11.9226C5.40036 12.0789 5.61232 12.1667 5.83333 12.1667ZM5.83333 15.5C6.05435 15.5 6.26631 15.4122 6.42259 15.2559C6.57887 15.0996 6.66667 14.8877 6.66667 14.6667C6.66667 14.4457 6.57887 14.2337 6.42259 14.0774C6.26631 13.9211 6.05435 13.8333 5.83333 13.8333C5.61232 13.8333 5.40036 13.9211 5.24408 14.0774C5.0878 14.2337 5 14.4457 5 14.6667C5 14.8877 5.0878 15.0996 5.24408 15.2559C5.40036 15.4122 5.61232 15.5 5.83333 15.5Z"
                                                                                                                                fill="#333333">
                                                                                                                            </path>
                                                                                                                            <path
                                                                                                                                fill-rule="evenodd"
                                                                                                                                clip-rule="evenodd"
                                                                                                                                d="M5.83268 1.95801C5.99844 1.95801 6.15741 2.02386 6.27462 2.14107C6.39183 2.25828 6.45768 2.41725 6.45768 2.58301V3.21884C7.00935 3.20801 7.61685 3.20801 8.28518 3.20801H11.7127C12.3818 3.20801 12.9893 3.20801 13.541 3.21884V2.58301C13.541 2.41725 13.6069 2.25828 13.7241 2.14107C13.8413 2.02386 14.0003 1.95801 14.166 1.95801C14.3318 1.95801 14.4907 2.02386 14.608 2.14107C14.7252 2.25828 14.791 2.41725 14.791 2.58301V3.27217C15.0077 3.28884 15.2127 3.30967 15.4068 3.33551C16.3835 3.46717 17.1743 3.74384 17.7985 4.36717C18.4218 4.99134 18.6985 5.78217 18.8302 6.75884C18.9577 7.70884 18.9577 8.92134 18.9577 10.453V12.213C18.9577 13.7447 18.9577 14.958 18.8302 15.9072C18.6985 16.8838 18.4218 17.6747 17.7985 18.2988C17.1743 18.9222 16.3835 19.1988 15.4068 19.3305C14.4568 19.458 13.2443 19.458 11.7127 19.458H8.28601C6.75435 19.458 5.54102 19.458 4.59185 19.3305C3.61518 19.1988 2.82435 18.9222 2.20018 18.2988C1.57685 17.6747 1.30018 16.8838 1.16852 15.9072C1.04102 14.9572 1.04102 13.7447 1.04102 12.213V10.453C1.04102 8.92134 1.04102 7.70801 1.16852 6.75884C1.30018 5.78217 1.57685 4.99134 2.20018 4.36717C2.82435 3.74384 3.61518 3.46717 4.59185 3.33551C4.78602 3.30967 4.99185 3.28884 5.20768 3.27217V2.58301C5.20768 2.41725 5.27353 2.25828 5.39074 2.14107C5.50795 2.02386 5.66692 1.95801 5.83268 1.95801ZM4.75768 4.57467C3.92018 4.68717 3.43685 4.89884 3.08435 5.25134C2.73185 5.60384 2.52018 6.08717 2.40768 6.92551C2.38852 7.06717 2.37268 7.21717 2.35935 7.37467H17.6393C17.626 7.21634 17.6102 7.06717 17.591 6.92467C17.4785 6.08717 17.2668 5.60384 16.9143 5.25134C16.5618 4.89884 16.0785 4.68717 15.2402 4.57467C14.3843 4.45967 13.2552 4.45801 11.666 4.45801H8.33268C6.74351 4.45801 5.61518 4.45967 4.75768 4.57467ZM2.29102 10.4997C2.29102 9.78801 2.29102 9.16884 2.30185 8.62467H17.6968C17.7077 9.16884 17.7077 9.78801 17.7077 10.4997V12.1663C17.7077 13.7555 17.706 14.8847 17.591 15.7413C17.4785 16.5788 17.2668 17.0622 16.9143 17.4147C16.5618 17.7672 16.0785 17.9788 15.2402 18.0913C14.3843 18.2063 13.2552 18.208 11.666 18.208H8.33268C6.74351 18.208 5.61518 18.2063 4.75768 18.0913C3.92018 17.9788 3.43685 17.7672 3.08435 17.4147C2.73185 17.0622 2.52018 16.5788 2.40768 15.7405C2.29268 14.8847 2.29102 13.7555 2.29102 12.1663V10.4997Z"
                                                                                                                                fill="#333333">
                                                                                                                            </path>
                                                                                                                        </svg>
                                                                                                                    </div>
                                                                                                                    <p
                                                                                                                    class="font-normal me-body-18 text-darkgray flex items-center preferredTime">
                                                                                                                    <span
                                                                                                                        class="preferred-name-receipientData{{$recipient->id}}"></span>
                                                                                                                    <span
                                                                                                                        class="preferred-date-receipientData{{$recipient->id}}"></span>
                                                                                                                    <span
                                                                                                                        class="preferred-timeDesc-receipientData{{$recipient->id}}"></span>
                                                                                                                </p>
                                                                                                            </div>
                                                                                                            <div data-id="receipientData{{$recipient->id}}" class="edit-btn  undefined"
                                                                                                                data-recipient_area_id="{{$recipient->location}}">
                                                                                                                <p
                                                                                                                    class="cursor-pointer flex font-normal me-body-16 text-darkgray underline hover:text-orangeMediq">
                                                                                                                @lang('labels.check_out.edit')</p>
                                                                                                            </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                
                                                                                                    </div>
                                                                                                    <hr class="my-5 bg-mee4 ">
                                                                                                    @if(count($recipient->group_data) > 0)
                                                                                                    @foreach($recipient->group_data as $group)
                                                                                                        @php
                                                                                                        $checkUpTable = $recipient->product->package->checkupTable;
                                                                                                        $tablePriIds =
                                                                                                        App\Models\CheckUpTableType::where('check_up_type_id',2)->where('check_up_table_id',$checkUpTable->id)->pluck('id')->toArray();
                                                                                                        $optionGroupIds=
                                                                                                        App\Models\CheckTableItem::where('check_up_group_id',$group->id)->whereIn('check_up_table_type_id',$tablePriIds)->distinct()->pluck('check_up_item_id')->toArray();
                                                                                                        $countEquivalentNumber = App\Models\CheckUpItem::whereIn('id',$optionGroupIds)->sum('equivalent_number');
                                                                                                        @endphp
                                                                                                        <div component-name="me-checkout-merchant-recipient-cancerMarker-detail"
                                                                                                            class="mt-1 @@refundCard">
                                                                                                            <div
                                                                                                                class="flex sm:flex-row flex-col">
                                                                                                                <div
                                                                                                                    class="flex hidden cancer-markers-placeholder1-1">
                                                                                                                    <div
                                                                                                                        class="mr-2 max-w-[24px] w-[24px]">
                                                                                                                        <svg xmlns="http://www.w3.org/2000/svg')}}"
                                                                                                                            width="24"
                                                                                                                            height="25"
                                                                                                                            viewBox="0 0 24 25"
                                                                                                                            fill="none">
                                                                                                                            <path
                                                                                                                                d="M9.4979 3.00898C8.94263 3.08328 8.22312 3.3531 7.73824 3.66984C7.3824 3.90446 6.83104 4.44409 6.60815 4.77647C6.38525 5.10885 6.15845 5.58982 6.02941 6.01605C5.93165 6.34452 5.92383 6.41882 5.91992 7.0914C5.91992 7.72097 5.92774 7.83437 5.99422 7.96341C6.20929 8.39746 6.8193 8.40919 7.03046 7.98296C7.09694 7.8461 7.10085 7.7718 7.08521 7.28692C7.05784 6.66126 7.11258 6.36407 7.32765 5.89092C7.49189 5.53508 7.65221 5.30046 7.91812 5.03846C8.81359 4.13908 10.1431 3.91228 11.2849 4.45582C12.0475 4.81948 12.6497 5.55072 12.8647 6.38363C12.9273 6.61043 12.9429 6.78639 12.939 7.1305C12.9234 7.90476 12.9273 7.91649 13.0055 8.02207C13.2088 8.29188 13.4786 8.36227 13.7563 8.21758C13.9909 8.09636 14.0652 7.93995 14.1082 7.47853C14.1786 6.72774 14.0457 6.00823 13.7015 5.31219C13.4552 4.80775 13.2049 4.46755 12.8178 4.10389C12.0748 3.40002 11.1794 3.03245 10.1431 3.00507C9.86548 2.99725 9.5722 3.00116 9.4979 3.00898Z"
                                                                                                                                fill="#333333">
                                                                                                                            </path>
                                                                                                                            <path
                                                                                                                                d="M9.54314 5.43202C9.05825 5.56106 8.62029 5.93645 8.39349 6.41352L8.26836 6.67942L8.25663 11.3992C8.25272 14.07 8.23316 16.1229 8.21361 16.1229C8.19406 16.1229 8.03374 15.9626 7.85386 15.7632C7.2282 15.0789 6.84499 14.8873 6.14503 14.9186C5.81656 14.9303 5.73053 14.9498 5.49982 15.0632C4.48704 15.552 4.17812 16.862 4.87807 17.7184C4.97583 17.8435 5.97689 18.9189 7.09525 20.1115C9.18338 22.3326 9.35544 22.4968 9.85988 22.7315C10.4191 22.9934 10.2978 22.9817 13.3284 22.9974C15.6237 23.0052 16.1321 22.9974 16.3863 22.9504C16.9885 22.837 17.4577 22.5868 17.9113 22.1449C18.4157 21.6483 18.6895 21.0656 18.7716 20.3188C18.7951 20.0685 18.8068 18.8328 18.799 16.7877L18.7833 13.6399L18.6973 13.4052C18.5096 12.9047 18.1303 12.5176 17.6415 12.326C17.3404 12.2087 16.7734 12.1969 16.4645 12.3064C16.2572 12.3768 16.2494 12.3768 16.2025 12.3064C15.9209 11.8998 15.6785 11.6925 15.2914 11.54C14.9942 11.4266 14.4233 11.4188 14.1183 11.5244C13.911 11.5947 13.9032 11.5947 13.8563 11.5244C13.5747 11.1177 13.3284 10.9104 12.9451 10.7618C12.7105 10.668 12.1983 10.6406 11.9167 10.6993L11.7681 10.7306V8.87313C11.7681 7.67265 11.7525 6.94142 11.7251 6.80846C11.5179 5.81132 10.5051 5.17393 9.54314 5.43202ZM10.3135 6.64814C10.3682 6.69115 10.4503 6.77327 10.4934 6.83193C10.5755 6.93751 10.5755 6.97661 10.595 10.668C10.6146 14.3633 10.6146 14.3985 10.6967 14.508C10.8727 14.7504 11.2246 14.8247 11.4553 14.6644C11.7486 14.4649 11.7447 14.4806 11.7681 13.2684C11.7877 12.2439 11.7916 12.1735 11.8698 12.0679C12.124 11.7238 12.6206 11.759 12.8435 12.1383C12.9139 12.2595 12.9217 12.3612 12.9412 13.3349C12.9608 14.332 12.9647 14.4024 13.0429 14.508C13.2971 14.8521 13.7937 14.8169 14.0166 14.4376C14.0831 14.3242 14.0987 14.2108 14.1143 13.632C14.13 13.0338 14.1417 12.9477 14.216 12.85C14.4702 12.5059 14.9668 12.5411 15.1897 12.9204C15.2562 13.0338 15.2718 13.1472 15.2875 13.7259C15.3031 14.3242 15.3148 14.4102 15.3891 14.508C15.5103 14.6722 15.7059 14.7621 15.9092 14.7426C16.2416 14.7074 16.4136 14.4845 16.4567 14.0309C16.4762 13.8315 16.5075 13.7024 16.5622 13.632C16.8164 13.2879 17.313 13.3231 17.5359 13.7024C17.6141 13.8315 17.6141 13.9058 17.6141 17.1005C17.6141 20.1975 17.6102 20.3774 17.5398 20.5808C17.3248 21.2103 16.8281 21.6639 16.2103 21.793C16.0695 21.8203 15.1662 21.8321 13.3479 21.8242C10.6928 21.8125 10.6928 21.8125 10.4738 21.7226C10.3526 21.6757 10.1727 21.5779 10.0749 21.5075C9.8325 21.3355 5.7931 17.038 5.72271 16.8776C5.60931 16.6156 5.69143 16.3419 5.9456 16.1542C6.059 16.0682 6.32882 16.0486 6.49305 16.1151C6.5478 16.1386 7.00531 16.5844 7.50584 17.1084C8.01027 17.6284 8.46388 18.0899 8.51862 18.125C8.65939 18.2228 8.97613 18.2189 9.13646 18.1172C9.20684 18.0781 9.29287 17.9843 9.33198 17.9139C9.39845 17.7927 9.40236 17.4877 9.42191 12.3416C9.44147 6.91404 9.44147 6.8984 9.52358 6.78891C9.70346 6.54256 10.0828 6.47608 10.3135 6.64814Z"
                                                                                                                                fill="#333333">
                                                                                                                            </path>
                                                                                                                        </svg>
                                                                                                                    </div>
                                                                                                                    <p data-id="1-1"
                                                                                                                        class="custom-cancer-markers-remark-title cursor-pointer flex flex-wrap font-normal me-body-18 text-darkgray underline">
                                                                                                                        Select
                                                                                                                        Cancer
                                                                                                                        Markers
                                                                                                                        (0/7
                                                                                                                        @lang('labels.check_out.selected'))
                                                                                                                    </p>
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="flex w-full justify-between flex cancer-markers-detail-data1-1">
                                                                                                                    <div
                                                                                                                        class="flex items-center w-full">
                                                                                                                        <div
                                                                                                                            class="mr-2 max-w-[24px] w-[24px]">
                                                                                                                            <svg xmlns="http://www.w3.org/2000/svg')}}"
                                                                                                                                width="24"
                                                                                                                                height="25"
                                                                                                                                viewBox="0 0 24 25"
                                                                                                                                fill="none">
                                                                                                                                <path
                                                                                                                                    d="M9.4979 3.00898C8.94263 3.08328 8.22312 3.3531 7.73824 3.66984C7.3824 3.90446 6.83104 4.44409 6.60815 4.77647C6.38525 5.10885 6.15845 5.58982 6.02941 6.01605C5.93165 6.34452 5.92383 6.41882 5.91992 7.0914C5.91992 7.72097 5.92774 7.83437 5.99422 7.96341C6.20929 8.39746 6.8193 8.40919 7.03046 7.98296C7.09694 7.8461 7.10085 7.7718 7.08521 7.28692C7.05784 6.66126 7.11258 6.36407 7.32765 5.89092C7.49189 5.53508 7.65221 5.30046 7.91812 5.03846C8.81359 4.13908 10.1431 3.91228 11.2849 4.45582C12.0475 4.81948 12.6497 5.55072 12.8647 6.38363C12.9273 6.61043 12.9429 6.78639 12.939 7.1305C12.9234 7.90476 12.9273 7.91649 13.0055 8.02207C13.2088 8.29188 13.4786 8.36227 13.7563 8.21758C13.9909 8.09636 14.0652 7.93995 14.1082 7.47853C14.1786 6.72774 14.0457 6.00823 13.7015 5.31219C13.4552 4.80775 13.2049 4.46755 12.8178 4.10389C12.0748 3.40002 11.1794 3.03245 10.1431 3.00507C9.86548 2.99725 9.5722 3.00116 9.4979 3.00898Z"
                                                                                                                                    fill="#333333">
                                                                                                                                </path>
                                                                                                                                <path
                                                                                                                                    d="M9.54314 5.43202C9.05825 5.56106 8.62029 5.93645 8.39349 6.41352L8.26836 6.67942L8.25663 11.3992C8.25272 14.07 8.23316 16.1229 8.21361 16.1229C8.19406 16.1229 8.03374 15.9626 7.85386 15.7632C7.2282 15.0789 6.84499 14.8873 6.14503 14.9186C5.81656 14.9303 5.73053 14.9498 5.49982 15.0632C4.48704 15.552 4.17812 16.862 4.87807 17.7184C4.97583 17.8435 5.97689 18.9189 7.09525 20.1115C9.18338 22.3326 9.35544 22.4968 9.85988 22.7315C10.4191 22.9934 10.2978 22.9817 13.3284 22.9974C15.6237 23.0052 16.1321 22.9974 16.3863 22.9504C16.9885 22.837 17.4577 22.5868 17.9113 22.1449C18.4157 21.6483 18.6895 21.0656 18.7716 20.3188C18.7951 20.0685 18.8068 18.8328 18.799 16.7877L18.7833 13.6399L18.6973 13.4052C18.5096 12.9047 18.1303 12.5176 17.6415 12.326C17.3404 12.2087 16.7734 12.1969 16.4645 12.3064C16.2572 12.3768 16.2494 12.3768 16.2025 12.3064C15.9209 11.8998 15.6785 11.6925 15.2914 11.54C14.9942 11.4266 14.4233 11.4188 14.1183 11.5244C13.911 11.5947 13.9032 11.5947 13.8563 11.5244C13.5747 11.1177 13.3284 10.9104 12.9451 10.7618C12.7105 10.668 12.1983 10.6406 11.9167 10.6993L11.7681 10.7306V8.87313C11.7681 7.67265 11.7525 6.94142 11.7251 6.80846C11.5179 5.81132 10.5051 5.17393 9.54314 5.43202ZM10.3135 6.64814C10.3682 6.69115 10.4503 6.77327 10.4934 6.83193C10.5755 6.93751 10.5755 6.97661 10.595 10.668C10.6146 14.3633 10.6146 14.3985 10.6967 14.508C10.8727 14.7504 11.2246 14.8247 11.4553 14.6644C11.7486 14.4649 11.7447 14.4806 11.7681 13.2684C11.7877 12.2439 11.7916 12.1735 11.8698 12.0679C12.124 11.7238 12.6206 11.759 12.8435 12.1383C12.9139 12.2595 12.9217 12.3612 12.9412 13.3349C12.9608 14.332 12.9647 14.4024 13.0429 14.508C13.2971 14.8521 13.7937 14.8169 14.0166 14.4376C14.0831 14.3242 14.0987 14.2108 14.1143 13.632C14.13 13.0338 14.1417 12.9477 14.216 12.85C14.4702 12.5059 14.9668 12.5411 15.1897 12.9204C15.2562 13.0338 15.2718 13.1472 15.2875 13.7259C15.3031 14.3242 15.3148 14.4102 15.3891 14.508C15.5103 14.6722 15.7059 14.7621 15.9092 14.7426C16.2416 14.7074 16.4136 14.4845 16.4567 14.0309C16.4762 13.8315 16.5075 13.7024 16.5622 13.632C16.8164 13.2879 17.313 13.3231 17.5359 13.7024C17.6141 13.8315 17.6141 13.9058 17.6141 17.1005C17.6141 20.1975 17.6102 20.3774 17.5398 20.5808C17.3248 21.2103 16.8281 21.6639 16.2103 21.793C16.0695 21.8203 15.1662 21.8321 13.3479 21.8242C10.6928 21.8125 10.6928 21.8125 10.4738 21.7226C10.3526 21.6757 10.1727 21.5779 10.0749 21.5075C9.8325 21.3355 5.7931 17.038 5.72271 16.8776C5.60931 16.6156 5.69143 16.3419 5.9456 16.1542C6.059 16.0682 6.32882 16.0486 6.49305 16.1151C6.5478 16.1386 7.00531 16.5844 7.50584 17.1084C8.01027 17.6284 8.46388 18.0899 8.51862 18.125C8.65939 18.2228 8.97613 18.2189 9.13646 18.1172C9.20684 18.0781 9.29287 17.9843 9.33198 17.9139C9.39845 17.7927 9.40236 17.4877 9.42191 12.3416C9.44147 6.91404 9.44147 6.8984 9.52358 6.78891C9.70346 6.54256 10.0828 6.47608 10.3135 6.64814Z"
                                                                                                                                    fill="#333333">
                                                                                                                                </path>
                                                                                                                            </svg>
                                                                                                                        </div>
                                                                                                                        <p data-id="1-1"
                                                                                                                            class="mr-2 font-normal me-body-18 text-darkgray underline  cancer-markers-label-1-receipientData{{$group->id}}{{$recipient->id}} ">
                                                                                                                            {{langbind($group,'name')}} (<span
                                                                                                                                class="selected-cancermarkers-count-1-receipientData111">{{$group->itemDatas($group->id,$recipient->id,$recipient->product->id)->sum('equivalent_number')}}</span>
                                                                                                                                @lang('labels.check_out.selected'))</span>
                                                                                                                        </p>
                                                                                                                        <div
                                                                                                                            class="showDropdown-btn active" data-id={{$group->id.$recipient->id}}>
                                                                                                                            <svg xmlns="http://www.w3.org/2000/svg')}}"
                                                                                                                                width="12"
                                                                                                                                height="7"
                                                                                                                                viewBox="0 0 12 7"
                                                                                                                                fill="none">
                                                                                                                                <path
                                                                                                                                    d="M0.042841 6.46313C0.14831 6.69047 0.413154 6.7936 0.649873 6.6975C0.713154 6.67172 1.46315 5.93344 3.36628 4.02094L5.99831 1.37719L8.628 4.02094C10.5358 5.93579 11.2835 6.67172 11.3467 6.6975C11.396 6.71625 11.478 6.73266 11.5296 6.73266C11.8671 6.73266 12.0944 6.39047 11.9538 6.08813C11.8905 5.95454 6.32878 0.367034 6.19753 0.308441C6.078 0.252191 5.91862 0.252191 5.79909 0.308441C5.66784 0.367034 0.106123 5.95453 0.042841 6.08813C-0.0134086 6.20766 -0.0134086 6.3436 0.042841 6.46313Z"
                                                                                                                                    fill="#333333">
                                                                                                                                </path>
                                                                                                                            </svg>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div data-parentid="{{$itemDetails->recipient_id}}"
                                                                                                                        data-id="receipientData{{$group->id}}{{$recipient->id}}"
                                                                                                                        class="cancer-markers-edit-btn ">
                                                                                                                        <p
                                                                                                                            class="cursor-pointer font-normal me-body-16 text-darkgray underline hover:text-orangeMediq">
                                                                                                                            @lang('labels.check_out.edit')
                                                                                                                        </p>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="hidden detail-data-list1-receipientData111">
                                                                                                                <div component-name="me-checkout-merchant-recipient-cancerMarkers-detail-list"
                                                                                                                    class="pl-8 mt-1">
                                                                                                                    <ul class="custom-list-style bg-far px-5 py-[10px] rounded-[12px] cancerMarkers-detail-data1-receipientData111">
                                                                                                                        @if(count($group->itemDatas($group->id,$recipient->id,$recipient->product->id)) > 0)
                                                                                                                            @foreach($group->itemDatas($group->id,$recipient->id,$recipient->product->id) as $item)
                                                                                                                            <li class="flex items-center mt-2">
                                                                                                                                <span class="mr-4 font-normal me-body-18 text-darkgray">{{langbind($item,'name')}}</span>
                                                                                                                            </li>
                                                                                                                            @endforeach
                                                                                                                        @else 
                                                                                                                        <li class="flex items-center mt-2">
                                                                                                                            <span class="mr-4 font-normal me-body-18 text-darkgray">@lang('labels.product_detail.decide_later')</span>
                                                                                                                        </li>
                                                                                                                        @endif
                                                                                                                    </ul>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    @endforeach
                                                                                                    @endif
                                                                
                                                                                                </div>
                                                                                            </div>
                                                                
                                                                                        </div>
                                                                
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @if(count($recipient->group_data) > 0)
                                                                @foreach($recipient->group_data as $group)
                                                                    @php
                                                                        $checkUpTable = $recipient->product->package->checkupTable; 
                                                                        $tablePriIds = App\Models\CheckUpTableType::where('check_up_type_id',2)->where('check_up_table_id',$checkUpTable->id)->pluck('id')->toArray();
                                                                        $optionGroupIds= App\Models\CheckTableItem::where('check_up_group_id',$group->id)->whereIn('check_up_table_type_id',$tablePriIds)->distinct()->pluck('check_up_item_id')->toArray();
                                                                        $recItems = [];
                                                                        $tableItem = [];
                                                                        $tableItemIds = [];
                                                                        if(count($recipient->recipient_items) > 0 ){
                                                                        $titems = App\Models\CheckTableItem::where('check_up_group_id',$group->id)
                                                                        ->whereIn('check_up_table_type_id',$tablePriIds)->distinct()->pluck('check_up_item_id')->toArray();
                                                                        $recItems =
                                                                        $recipient->recipient_items()->whereIn('check_up_item_id',$titems)->pluck('check_up_item_id')->toArray();
                                                                        $tableItem = App\Models\CheckUpItem::whereIn('id',$recItems)->pluck('name_en')->toArray();
                                                                        $tableItemIds = App\Models\CheckUpItem::whereIn('id',$recItems)->pluck('id')->toArray();
                                                                        }
                                                                        $tableItems = implode(',',$tableItem);
                                                                        $recItem = implode(',',$tableItemIds);
                                                                        
                                                                        $countEquivalentNumber =  App\Models\CheckUpItem::whereIn('id',$optionGroupIds)->sum('equivalent_number');
                                                                        $decideLater = App\Models\OptionDecideLater::where('recipient_id',$recipient->id)->where('group_id',$group->id)->first();
                                                                    @endphp
                                                                <div id="me-checkout-cancer-markers-popup"
                                                                    class="hidden me-checkout-cancer-markers-popup me-checkout-cancer-markers-popup-receipientData{{$group->id.$recipient->id}}">
                                                                    <div
                                                                        class="me-checkout-cancer-markers-popup-content px-5 lg:py-10 py-5 rounded-[12px] xl:min-w-[1060px] max-w-[1060px] min-w-[90%] overflow-y-auto">
                                                                        <div class="relative w-full">
                                                                            <div
                                                                                class="flex justify-between items-center pb-3 bg-whitez">
                                                                                <div data-parentid="{{$itemDetails->recipient_id}}" data-id="{{$group->id.$recipient->id}}"
                                                                                    class="popup-back-btn">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg')}}"
                                                                                        width="10" height="17"
                                                                                        viewBox="0 0 10 17"
                                                                                        fill="none">
                                                                                        <path
                                                                                            d="M8.94823 16.9181C9.25136 16.7775 9.38886 16.4244 9.26073 16.1088C9.22636 16.0244 8.24198 15.0244 5.69198 12.4869L2.16698 8.97751L5.69198 5.47126C8.24511 2.92751 9.22636 1.93064 9.26073 1.84626C9.28573 1.78064 9.30761 1.67126 9.30761 1.60251C9.30761 1.15251 8.85136 0.849388 8.44823 1.03689C8.27011 1.12126 0.820108 8.53689 0.741983 8.71189C0.666983 8.87126 0.666983 9.08376 0.741983 9.24314C0.820108 9.41814 8.27011 16.8338 8.44823 16.9181C8.60761 16.9931 8.78886 16.9931 8.94823 16.9181Z"
                                                                                            fill="#333333"></path>
                                                                                    </svg>
                                                                                </div>
                                                                                @php
                                                                                
                                                                                @endphp
                                                                                <button data-parentid="{{$itemDetails->recipient_id}}" data-id="receipientData{{$group->id.$recipient->id}}"
                                                                                    data-items="{{$recItem}}" data-optional_decide_later="{{isset($decideLater) && $decideLater->is_decide_later == true ? 1 : 0}}"
                                                                                    class="z-[1] absolute top-0 right-0 focus-visible:outline-none focus:outline-none p-1"
                                                                                    id="me-checkout-cancer-markers-popup-close-btn"><img
                                                                                        class=" w-auto h-auto align-middle"
                                                                                        src="{{ asset('frontend/img/close-btn.png') }}"
                                                                                        alt="">
                                                                                </button>
                                                                            </div>
                                                                            <button data-parentid="{{$itemDetails->recipient_id}}" data-id="receipientData{{$group->id.$recipient->id}}"
                                                                                data-items="{{$recItem}}" data-optional_decide_later="{{isset($decideLater) && $decideLater->is_decide_later == true ? 1 : 0}}"
                                                                                class="hidden z-[1] absolute top-0 right-0 focus-visible:outline-none focus:outline-none p-1"
                                                                                id="me-checkout-cancer-markers-popup-close-btn"><img
                                                                                    class=" w-auto h-auto align-middle"
                                                                                    src="{{ asset('frontend/img/close-btn.png') }}"
                                                                                    alt=""></button>
                                                                            <input type="hidden"
                                                                                class="cancer-markers-selected-id">
                                                                            <div>
                                                                                <div class="flex flex-wrap items-center">
                                                                                      <h3 class="font-bold me-body-20 text-darkgray text-left">
                                                                                        @lang('labels.check_out.select_free') {{langbind($group,'name')}}</h3>
                                                                                    <span class="me-body18 font-normal text-darkgray text-left">(<span
                                                                                            class="cancer-markers-selected-value-receipientData{{$group->id}}{{$recipient->id}}"></span>
                                                                                            @lang('labels.check_out.selected'))</span>
                                                                                </div>
                                                                                <div class="mr-6 flex items-center mt-4 ">
                                                                                    <p class="font-normal me-body-16 text-darkgray">
                                                                                        @lang('labels.check_out.how_to_choose') {{langbind($group,'name')}}?</p>
                                                                                        <button type="button" role="button" class="plan-tooltip-btn">
                                                                                            <img src="{{ asset('frontend/img/info-circle.png') }}" alt="info icon" class="w-auto h-auto align-middle">
                                                                                            <div class="plan-tooltip">
                                                                                                <p class="me-body16">
                                                                                                    {{__('labels.basic_info.please_select')}} {{$group->minimum_item}} {{__('labels.check_out.items')}}
                                                                                                </p>
                                                                                            </div>
                                                                                        </button>
                                                                                </div>
                                                                                <div class="mt-3">
                                                                                    <input type="hidden" value="{{$group->minimum_item}}"
                                                                                    class="cancer-markers-min-selected-receipientData{{$group->id}}{{$recipient->id}}" />
                                                                                    <ul class="flex flex-wrap">
                                                                                    @if(count($optionGroupIds) > 0)
                                                                                    @foreach($optionGroupIds as $titem)
                                                                                    @php
                                                                                    $tableItem = App\Models\CheckUpItem::where('id',$titem)->first();
                                                                                    @endphp
                                                                                        <li data-total="{{$countEquivalentNumber}}"
                                                                                            data-count="{{$tableItem->equivalent_number == null ? 1 : $tableItem->equivalent_number }}"
                                                                                            data-text="{{langbind($tableItem,'name')}}" data-value="{{$tableItem->id}}"
                                                                                            class="me-body-16 flex items-center markers-tags cursor-pointer hover:border-orangeMediq hover:text-orangeMediq mr-[10px] mb-[10px] px-4 py-[10px] border-1 border-darkgray rounded-[4px] me-body-16 font-normal text-darkgray">
                                                                                            {{langbind($tableItem,'name')}}
                                                                                            <div class="ml-1 hidden">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                                                                                    fill="none">
                                                                                                    <path
                                                                                                        d="M16.25 7.49992C16.25 6.29044 15.899 5.10695 15.2397 4.09297C14.5804 3.07899 13.641 2.2781 12.5356 1.78743C11.4301 1.29676 10.206 1.13738 9.0117 1.32864C7.81743 1.51989 6.70432 2.05355 5.80734 2.86491C4.91037 3.67626 4.26808 4.73044 3.95838 5.8996C3.64867 7.06875 3.68485 8.30266 4.06253 9.45166C4.44021 10.6007 5.14316 11.6154 6.08613 12.3728C7.0291 13.1302 8.17158 13.5977 9.375 13.7187V15.6249H6.875C6.70924 15.6249 6.55027 15.6908 6.43306 15.808C6.31585 15.9252 6.25 16.0842 6.25 16.2499C6.25 16.4157 6.31585 16.5747 6.43306 16.6919C6.55027 16.8091 6.70924 16.8749 6.875 16.8749H9.375V18.7499C9.375 18.9157 9.44085 19.0747 9.55806 19.1919C9.67527 19.3091 9.83424 19.3749 10 19.3749C10.1658 19.3749 10.3247 19.3091 10.4419 19.1919C10.5592 19.0747 10.625 18.9157 10.625 18.7499V16.8749H13.125C13.2908 16.8749 13.4497 16.8091 13.5669 16.6919C13.6842 16.5747 13.75 16.4157 13.75 16.2499C13.75 16.0842 13.6842 15.9252 13.5669 15.808C13.4497 15.6908 13.2908 15.6249 13.125 15.6249H10.625V13.7187C12.1659 13.5619 13.5939 12.8393 14.6329 11.6906C15.6719 10.5419 16.2481 9.04879 16.25 7.49992ZM5 7.49992C5 6.51102 5.29324 5.54432 5.84265 4.72207C6.39206 3.89983 7.17295 3.25897 8.08658 2.88053C9.00021 2.50209 10.0055 2.40307 10.9755 2.596C11.9454 2.78892 12.8363 3.26513 13.5355 3.96439C14.2348 4.66365 14.711 5.55457 14.9039 6.52447C15.0969 7.49438 14.9978 8.49971 14.6194 9.41334C14.241 10.327 13.6001 11.1079 12.7779 11.6573C11.9556 12.2067 10.9889 12.4999 10 12.4999C8.67436 12.4985 7.40343 11.9712 6.46607 11.0339C5.5287 10.0965 5.00145 8.82556 5 7.49992Z"
                                                                                                        fill="#FF87B2" />
                                                                                                </svg>
                                                                                            </div>
                                                                                        </li>
                                                                                    @endforeach
                                                                                    @endif
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                            @php 
                                                                            $decideLater = App\Models\OptionDecideLater::where('recipient_id',$recipient->id)->where('group_id',$group->id)->first();
                                                                            // \Log::debug($decideLater);
                                                                            // \Log::debug("xxx11");
                                                                            @endphp
                                                                            <div class="flex xs:flex-row flex-col justify-between xs:items-center mt-3 lg:mt-5">
                                                                                <div class="form-group me-body18 text-left">
                                                                                    <label for="cancer-markers-decideLater-receipientData{{$group->id}}{{$recipient->id}}"
                                                                                        class="custom-radio-container inline-block relative">
                                                                                        <input type="checkbox" name="decide-laterreceipientData{{$group->id}}{{$recipient->id}}"
                                                                                            id="cancer-markers-decideLater-receipientData{{$group->id}}{{$recipient->id}}"
                                                                                            class="opacity-0 absolute" value="{{isset($decideLater) && $decideLater->is_decide_later == true ? true : false}}">
                                                                                        <span class="custom-radio-orange"></span>
                                                                                        <span class="ml-[30px]">@lang('labels.product_detail.decide_later')</span>
                                                                                    </label>
                                                                                </div>
                                                                                <form action="" id="updateCheckUpItemForm{{$group->id}}{{$recipient->id}}">
                                                                                    <div class="hidden">
                                                                                        <input type="hidden" name="edit_status" value="1">
                                                                                        <input type="hidden" name="recipient_id" value="{{$recipient->id}}">
                                                                                        <input type="hidden" name="group_id" value="{{$group->id}}">
                                                                                        <input type="hidden" name="product_id" value="{{$recipient->product_id}}">
                                                                                        <input name="check_up_items-{{$group->id}}{{$recipient->id}}"
                                                                                            data-id="receipientData{{$group->id}}{{$recipient->id}}" type="hidden"
                                                                                            value="{{ $recItem }}"
                                                                                            class="cancerMarkers-selected-tags-ids cancerMarkers-selected-tags-ids-receipientData{{$group->id}}{{$recipient->id}}" />
                                                                                        <input data-id="receipientData{{$group->id}}{{$recipient->id}}" type="hidden"
                                                                                            value="{{ $tableItems }}"
                                                                                            class="cancerMarkers-selected-tags cancerMarkers-selected-tagsreceipientData{{$group->id}}{{$recipient->id}}" />
                                                                                       {{-- <input type="checkbox" name="decide_laterreceipientData{{$group->id}}{{$recipient->id}}"
                                                                                            id="cancer-markers-decideLaterreceipientData{{$group->id}}{{$recipient->id}}"
                                                                                            class="opacity-0 absolute"> --}}
                                                                                            <input name="check_up_items_decide_later_{{$group->id}}{{$recipient->id}}" data-text="" data-id="receipientData{{$group->id}}{{$recipient->id}}" type="hidden" value="true"
                                                                                            class="cancerMarkers-decidelater cancerMarkers-decidelater-receipientData{{$group->id}}{{$recipient->id}}"/>
                                                                                    </div>
                                                                                    {{-- <p data-text="null" class="cancer-markers-required-message-receipientData{{$group->id}}{{$recipient->id}}"></p> --}}
                                                                                    <button type="button" role="button" onclick="submitItem({{$group->id}},{{$recipient->id}})"
                                                                                        data-id="receipientData{{$group->id}}{{$recipient->id}}"
                                                                                        class="me-body-18 xs:mt-0 mt-2 checkout-cancer-markers-confirm text-light bg-orangeMediq rounded-md font-bold py-2 px-10 sm:py-[10px] max-w-[300px] xl:px-0 xl:w-[300px] hover:bg-brightOrangeMediq transition-colors duration-300">
                                                                                        @lang('labels.log_in_register.confirm')
                                                                                    </button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @else
                                                        @if($itemDetails->is_two_recipient !=1)
                                                        <div class="flex sm:flex-row flex-col mb-5 pb-5 last:border-b last:border-b-mee4">
                                                            <div class="mr-[10px]">
                                                                <img src="{{ $itemDetails->featured_img }}"
                                                                    alt="booking-logo"
                                                                    class="2xl:max-w-[96px] 2xl:max-h-[96px] sm:max-w-[50px] sm:max-h-[50px] max-w-[96px] max-h-[96px] object-cover rounded-xl sm:mx-0 mx-auto">
                                                            </div>
                                                            <div class="w-full">
                                                                <p class="me-body-20 font-bold text-darkgray"> <a href="{{ route('product-detail', ['category'=>$itemDetails->category_name_en,'slug'=>isset($itemDetails->slug_en) ? $itemDetails->slug_en : '']) }}">{{@langbind($itemDetails,"name")}}</a></p>
                                                                <div component-name="me-member-order-detail-card-content"
                                                                    class="me-member-dashboard-booking-card-content">

                                                                    <div>
                                                                        <div
                                                                            class="mt-2 bg-blueMediq px-3 py-2 flex flex-wrap justify-between items-center">
                                                                            {{-- <p class="font-bold me-body-16 text-whitez">@lang('labels.order_details.booking_id') {{$itemDetails->booking_id}}</p> --}}
                                                                            <p class="font-bold me-body-16 text-whitez"> @lang('labels.order_details.booking_id') {{$itemDetails->booking_id}}</p>
                                                                            {{-- @if($itemDetails->order_status==1 || $itemDetails->order_status==2) --}}
                                                                            @if($itemDetails->confirm_booking_date!=null)
                                                                                @php
                                                                                    $now = \Carbon\Carbon::now()->startOfDay();
                                                                                    $bookingDate = \Carbon\Carbon::parse($itemDetails->confirm_booking_date)->startOfDay();
                                                                                    $diff= 0;
                                                                                    if($bookingDate> $now) {
                                                                                    $diff = $bookingDate->diffInDays($now);
                                                                                    }
                                                                                @endphp
                                                                                @if($diff >= 3)
                                                                                <div data-id="{{$itemDetails->recipient_id}}"
                                                                                    class="flex items-center edit-booking-btn cursor-pointer ">
                                                                                    <img src="{{ asset('frontend/img/edit-booking-btn.svg') }}"
                                                                                        alt="edit-booking-btn">
                                                                                    <p
                                                                                        class="font-normal me-body-14 text-whitez mt-1">
                                                                                        @lang('labels.order_details.edit_booking')</p>
                                                                                </div>
                                                                                @endif
                                                                            @else
                                                                                <div data-id="{{$itemDetails->recipient_id}}"
                                                                                    class="flex items-center edit-booking-btn cursor-pointer ">
                                                                                    <img src="{{ asset('frontend/img/edit-booking-btn.svg') }}"
                                                                                        alt="edit-booking-btn">
                                                                                    <p
                                                                                        class="font-normal me-body-14 text-whitez mt-1">
                                                                                        @lang('labels.order_details.edit_booking')</p>
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                        <div class="mt-[10px]">
                                                                            <div class="booking-confirmed-div ">
                                                                                <div
                                                                                    class="flex flex-wrap-reverse items-center justify-between">
                                                                                    <div>
                                                                                        <div class="flex items-start">
                                                                                            <div class="mr-[10px] mt-[2px]">
                                                                                                @if($itemDetails->order_status == 4)
                                                                                                <img src="{{asset('frontend/img/member-clapping.svg')}}"
                                                                                                    alt="statusIcon">
                                                                                                @elseif($itemDetails->order_status ==3)
                                                                                                    <img src="{{asset('frontend/img/member-check-circle.svg')}}"
                                                                                                    alt="statusIcon">
                                                                                                @elseif($itemDetails->order_status ==6 or $itemDetails->order_status ==7)
                                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                                                                                                        <path d="M9.10156 1.90966C7.59766 2.062 6.08203 2.65185 4.83594 3.57372C4.33203 3.94872 3.46484 4.812 3.09766 5.30419C1.39063 7.60888 0.91797 10.519 1.82031 13.23C2.82813 16.2651 5.42578 18.4604 8.65234 19.0034C9.25 19.1011 10.7813 19.1011 11.3477 18.9995C13.2148 18.6714 14.7891 17.8628 16.0742 16.5737C17.4883 15.1597 18.3398 13.3706 18.5586 11.3667C18.6211 10.7573 18.5859 9.64013 18.4805 9.03466C18.2344 7.64404 17.7031 6.41357 16.8516 5.28075C16.5664 4.90185 15.8633 4.16747 15.4609 3.83154C13.7383 2.39404 11.3789 1.6831 9.10156 1.90966ZM10.5859 3.27294C12.3086 3.42529 13.8711 4.14794 15.0742 5.35107C17.6719 7.94091 17.9492 11.9448 15.7266 14.894C15.4258 15.2964 14.7969 15.9253 14.3945 16.2261C12.8945 17.355 11.0664 17.8745 9.26172 17.687C6.73438 17.4214 4.55078 15.8901 3.46094 13.6245C2.50781 11.644 2.51172 9.3081 3.46875 7.32763C4.44141 5.31591 6.37109 3.82372 8.55469 3.39013C9.28906 3.2456 9.87891 3.21044 10.5859 3.27294Z" fill="#333333"></path>
                                                                                                        <path d="M6.77734 6.94011C6.58984 7.02604 6.50781 7.11198 6.42578 7.30729C6.35156 7.48698 6.35156 7.65104 6.42578 7.83464C6.46875 7.92839 6.91406 8.40495 7.74609 9.23698L9.00391 10.4987L7.74609 11.7604C6.47656 13.03 6.36719 13.1628 6.36719 13.4245C6.36719 13.9167 6.93359 14.2487 7.375 14.0182C7.45312 13.9753 8.07422 13.3854 8.75 12.7096L9.98047 11.4753L11.2305 12.7214C11.918 13.405 12.5352 13.9948 12.6055 14.03C12.9961 14.2253 13.5117 13.9635 13.582 13.5339C13.6367 13.1823 13.6523 13.1979 12.2539 11.7995L10.9609 10.4987L12.2344 9.22136C13.5977 7.84636 13.6211 7.81511 13.582 7.46745C13.5469 7.15495 13.2266 6.86589 12.9102 6.86589C12.6562 6.86589 12.4883 7.00651 11.25 8.2487C10.5742 8.92839 10.0039 9.48308 9.98047 9.48308C9.95703 9.48308 9.38672 8.92839 8.71094 8.2487C7.26953 6.80339 7.19141 6.7487 6.77734 6.94011Z" fill="#333333"></path>
                                                                                                    </svg>
                                                                                                @else
                                                                                                    <img src="{{asset('frontend/img/member-ast.svg')}}"
                                                                                                    alt="statusIcon">
                                                                                                @endif
                                                                                            </div>
                                                                                            @php
                                                                                            $textColor = "";
                                                                                            if($itemDetails->order_status == 3) {
                                                                                                $textColor = "text-meGreen";
                                                                                            }else if($itemDetails->order_status == 2) {
                                                                                                $textColor = "text-darkgray";
                                                                                            }else if($itemDetails->order_status == 1) {
                                                                                                $textColor = "text-mered";
                                                                                            }
                                                                                            @endphp
                                                                                            <p
                                                                                                class="font-bold me-body-18 {{$textColor}}">
                                                                                                {{config("mediq.booking_status_".app()->getLocale())[$itemDetails->order_status]}}</p>
                                                                                        </div>
                                                                                        <div
                                                                                            class="flex items-center mt-[10px]">
                                                                                            <div class="mr-[10px]">
                                                                                                <img src="{{ asset('frontend/img/member-user.svg') }}"
                                                                                                    alt="member-user">
                                                                                            </div>
                                                                                            <p
                                                                                                class="font-normal me-body-18 text-darkgray">
                                                                                                {{$itemDetails->recipient->last_name}} {{$itemDetails->recipient->first_name}}</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    @if($itemDetails->order_status==7)
                                                                                    <div class="flex items-center mt-3">
                                                                                        <button data-id="{{$itemDetails->id}}" class="refund-detail-btn-content rounded-md min-w-[135px] py-[9px] px-5 me-body-16 font-normal text-darkgray border-1 border-darkgray hover:border-orangeMediq hover:text-orangeMediq">@lang('labels.order_details.refund_details')</button>
                                                                                    </div>
                                                                                    <div id="me-checkout-refund-complete-popup{{$itemDetails->id}}" class="hidden me-checkout-refund-complete-popup">
                                                                                        <div
                                                                                            class="max-h-[80%] me-checkout-refund-complete-popup-content overflow-visible xl:p-10 p-5 rounded-[12px] sm:max-w-[438px] sm:min-w-[unset] min-w-[95%]">
                                                                                            <div class="relative w-full overflow-y-auto custom-cancellation-scrollbar">
                                                                                                <button
                                                                                                    class="z-[1] absolute top-0 right-0 focus-visible:outline-none focus:outline-none p-1"
                                                                                                    id="me-checkout-refund-complete-popup-close-btn"><img
                                                                                                        class=" w-auto h-auto align-middle"
                                                                                                        src="{{ asset('frontend/img/close-btn.png') }}" alt=""></button>
                                                                                                <div class="flex items-center">
                                                                                                    <img src="{{ asset('frontend/img/member-check-circle.svg') }}"
                                                                                                        alt="statusIcon" class="mr-2">
                                                                                                    <h1 class="me-body-23 font-bold text-meGreen">
                                                                                                        @lang('labels.order_details.refunded')</h1>
                                                                                                </div>
                                                                                                <hr class="my-5 bg-mee4">
                                                                                                <div>
                                                                                                    <p class="font-bold me-body-18 text-darkgray"> @lang('labels.order_details.refunded_on') {{date('d F Y H:i A', strtotime($itemDetails->updated_at))}}</p>
                                                                                                    <p class="font-normal me-body-18 text-darkgray mt-1">@lang('labels.order_details.refunded_successfully')
                                                                                                    </p>
                                                                                                </div>
                                                                                                <hr class="my-5 bg-mee4">
                                                                                                <div class="flex justify-between">
                                                                                                    <p class="font-bold me-body-18 text-darkgray">@lang('labels.order_details.refunded_amount')</p>
                                                                                                    <p class="font-bold me-body-18 text-darkgray">HK$ {{$itemDetails->total}}</p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                @else
                                                                                    <div class="flex items-center my-1">
                                                                                        <div class="flex items-center pr-3">
                                                                                            <p
                                                                                                class="font-bold me-body-45 text-darkgray leading-[normal] booking-selected-dayno booking-selected-dayno-1">
                                                                                                {{$itemDetails->confirm_booking_date!=null?date('j', strtotime($itemDetails->confirm_booking_date)):''}}</p>
                                                                                            <p
                                                                                                class="font-bold me-body-16 text-darkgray max-w-[30px] leading-[normal] booking-selected-month-day booking-selected-month-day-1">
                                                                                                {{$itemDetails->confirm_booking_date!=null?date('M', strtotime($itemDetails->confirm_booking_date)):''}}
                                                                                                {{$itemDetails->confirm_booking_date!=null?date('D', strtotime($itemDetails->confirm_booking_date)):''}}</p>
                                                                                        </div>
                                                                                        <div
                                                                                            class="border-l-1 border-l-mee4 pl-3">
                                                                                            <p
                                                                                                class="font-bold me-body-28 text-darkgray leading-[normal] booking-selected-time booking-selected-time-1">
                                                                                                {{$itemDetails->confirm_booking_time!==null?$itemDetails->confirm_booking_time:''}}</p>
                                                                                        </div>
                                                                                    </div>
                                                                                @endif
                                                                                </div>
                                                                            </div>
                                                                            @php
                                                                            $recipient = App\Models\Recipient::select('recipients.*')
                                                                                        ->join('products','recipients.product_id','=','products.id')
                                                                                        ->where('recipients.id',$itemDetails->recipient_id)
                                                                                        ->first();
                                                                            //$product_merchant = $recipient->product->merchant()->with(['merchantLocations','merchantLocations.area','merchantLocations.weekDays','merchantLocations.events'])->first();
                                                                            $product_merchant = $recipient->product->product_location_data;
                                                                            $recipient->order_details_edit = 1;
                                                                            @endphp
                                                                            <input type="hidden" class="hidden location-json-data location-json-data-receipientData{{$recipient->id}}"
                                                                            value="{{ json_encode($product_merchant)}}">
                                                                            @if($itemDetails->date != null && $itemDetails->confirm_booking_date != null)
                                                                            <div class="flex mt-1">
                                                                                <div class="flex w-full justify-between preferredTime-detail3 flex">
                                                                                    <div class="flex items-center">
                                                                                        <div class="mr-2 max-w-[24px] w-[24px]">
                                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                                                                                                <path
                                                                                                    d="M14.1667 12.1667C14.3877 12.1667 14.5996 12.0789 14.7559 11.9226C14.9122 11.7663 15 11.5543 15 11.3333C15 11.1123 14.9122 10.9004 14.7559 10.7441C14.5996 10.5878 14.3877 10.5 14.1667 10.5C13.9457 10.5 13.7337 10.5878 13.5774 10.7441C13.4211 10.9004 13.3333 11.1123 13.3333 11.3333C13.3333 11.5543 13.4211 11.7663 13.5774 11.9226C13.7337 12.0789 13.9457 12.1667 14.1667 12.1667ZM14.1667 15.5C14.3877 15.5 14.5996 15.4122 14.7559 15.2559C14.9122 15.0996 15 14.8877 15 14.6667C15 14.4457 14.9122 14.2337 14.7559 14.0774C14.5996 13.9211 14.3877 13.8333 14.1667 13.8333C13.9457 13.8333 13.7337 13.9211 13.5774 14.0774C13.4211 14.2337 13.3333 14.4457 13.3333 14.6667C13.3333 14.8877 13.4211 15.0996 13.5774 15.2559C13.7337 15.4122 13.9457 15.5 14.1667 15.5ZM10.8333 11.3333C10.8333 11.5543 10.7455 11.7663 10.5893 11.9226C10.433 12.0789 10.221 12.1667 10 12.1667C9.77899 12.1667 9.56702 12.0789 9.41074 11.9226C9.25446 11.7663 9.16667 11.5543 9.16667 11.3333C9.16667 11.1123 9.25446 10.9004 9.41074 10.7441C9.56702 10.5878 9.77899 10.5 10 10.5C10.221 10.5 10.433 10.5878 10.5893 10.7441C10.7455 10.9004 10.8333 11.1123 10.8333 11.3333ZM10.8333 14.6667C10.8333 14.8877 10.7455 15.0996 10.5893 15.2559C10.433 15.4122 10.221 15.5 10 15.5C9.77899 15.5 9.56702 15.4122 9.41074 15.2559C9.25446 15.0996 9.16667 14.8877 9.16667 14.6667C9.16667 14.4457 9.25446 14.2337 9.41074 14.0774C9.56702 13.9211 9.77899 13.8333 10 13.8333C10.221 13.8333 10.433 13.9211 10.5893 14.0774C10.7455 14.2337 10.8333 14.4457 10.8333 14.6667ZM5.83333 12.1667C6.05435 12.1667 6.26631 12.0789 6.42259 11.9226C6.57887 11.7663 6.66667 11.5543 6.66667 11.3333C6.66667 11.1123 6.57887 10.9004 6.42259 10.7441C6.26631 10.5878 6.05435 10.5 5.83333 10.5C5.61232 10.5 5.40036 10.5878 5.24408 10.7441C5.0878 10.9004 5 11.1123 5 11.3333C5 11.5543 5.0878 11.7663 5.24408 11.9226C5.40036 12.0789 5.61232 12.1667 5.83333 12.1667ZM5.83333 15.5C6.05435 15.5 6.26631 15.4122 6.42259 15.2559C6.57887 15.0996 6.66667 14.8877 6.66667 14.6667C6.66667 14.4457 6.57887 14.2337 6.42259 14.0774C6.26631 13.9211 6.05435 13.8333 5.83333 13.8333C5.61232 13.8333 5.40036 13.9211 5.24408 14.0774C5.0878 14.2337 5 14.4457 5 14.6667C5 14.8877 5.0878 15.0996 5.24408 15.2559C5.40036 15.4122 5.61232 15.5 5.83333 15.5Z"
                                                                                                    fill="#333333"></path>
                                                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                                                    d="M5.83268 1.95801C5.99844 1.95801 6.15741 2.02386 6.27462 2.14107C6.39183 2.25828 6.45768 2.41725 6.45768 2.58301V3.21884C7.00935 3.20801 7.61685 3.20801 8.28518 3.20801H11.7127C12.3818 3.20801 12.9893 3.20801 13.541 3.21884V2.58301C13.541 2.41725 13.6069 2.25828 13.7241 2.14107C13.8413 2.02386 14.0003 1.95801 14.166 1.95801C14.3318 1.95801 14.4907 2.02386 14.608 2.14107C14.7252 2.25828 14.791 2.41725 14.791 2.58301V3.27217C15.0077 3.28884 15.2127 3.30967 15.4068 3.33551C16.3835 3.46717 17.1743 3.74384 17.7985 4.36717C18.4218 4.99134 18.6985 5.78217 18.8302 6.75884C18.9577 7.70884 18.9577 8.92134 18.9577 10.453V12.213C18.9577 13.7447 18.9577 14.958 18.8302 15.9072C18.6985 16.8838 18.4218 17.6747 17.7985 18.2988C17.1743 18.9222 16.3835 19.1988 15.4068 19.3305C14.4568 19.458 13.2443 19.458 11.7127 19.458H8.28601C6.75435 19.458 5.54102 19.458 4.59185 19.3305C3.61518 19.1988 2.82435 18.9222 2.20018 18.2988C1.57685 17.6747 1.30018 16.8838 1.16852 15.9072C1.04102 14.9572 1.04102 13.7447 1.04102 12.213V10.453C1.04102 8.92134 1.04102 7.70801 1.16852 6.75884C1.30018 5.78217 1.57685 4.99134 2.20018 4.36717C2.82435 3.74384 3.61518 3.46717 4.59185 3.33551C4.78602 3.30967 4.99185 3.28884 5.20768 3.27217V2.58301C5.20768 2.41725 5.27353 2.25828 5.39074 2.14107C5.50795 2.02386 5.66692 1.95801 5.83268 1.95801ZM4.75768 4.57467C3.92018 4.68717 3.43685 4.89884 3.08435 5.25134C2.73185 5.60384 2.52018 6.08717 2.40768 6.92551C2.38852 7.06717 2.37268 7.21717 2.35935 7.37467H17.6393C17.626 7.21634 17.6102 7.06717 17.591 6.92467C17.4785 6.08717 17.2668 5.60384 16.9143 5.25134C16.5618 4.89884 16.0785 4.68717 15.2402 4.57467C14.3843 4.45967 13.2552 4.45801 11.666 4.45801H8.33268C6.74351 4.45801 5.61518 4.45967 4.75768 4.57467ZM2.29102 10.4997C2.29102 9.78801 2.29102 9.16884 2.30185 8.62467H17.6968C17.7077 9.16884 17.7077 9.78801 17.7077 10.4997V12.1663C17.7077 13.7555 17.706 14.8847 17.591 15.7413C17.4785 16.5788 17.2668 17.0622 16.9143 17.4147C16.5618 17.7672 16.0785 17.9788 15.2402 18.0913C14.3843 18.2063 13.2552 18.208 11.666 18.208H8.33268C6.74351 18.208 5.61518 18.2063 4.75768 18.0913C3.92018 17.9788 3.43685 17.7672 3.08435 17.4147C2.73185 17.0622 2.52018 16.5788 2.40768 15.7405C2.29268 14.8847 2.29102 13.7555 2.29102 12.1663V10.4997Z"
                                                                                                    fill="#333333"></path>
                                                                                            </svg>
                                                                                        </div>
                                                                                        <p class="font-normal me-body-18 text-darkgray flex items-center preferredTime">
                                                                                            <span class="preferred-name-3 hidden"></span>
                                                                                            <span class="preferred-date-3 hidden"></span>
                                                                                            <span class="preferred-date-custom-3 ">{{date('d F Y', strtotime($itemDetails->date))}}</span>
                                                                                            <span class="preferred-timeDesc-3 ml-[10px]">{{$itemDetails->time}}</span>
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            @endif
                                                                            @if($recipient->variable_id != NULL)
                                                                            @php $vairableProductName = \App\Models\ProductVariation::find($recipient->variable_id); @endphp
                                                                            <div class="flex w-full justify-between my-1">
                                                                                <div class="flex items-center">
                                                                                    <div class="mr-2 max-w-[24px] w-[24px]">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17" fill="none">
                                                                                            <path d="M2.26253 9.27684H1.08814H1.08799V9.12684L2.26253 9.27684ZM2.26253 9.27684L2.26253 15.5893L2.26253 15.5895C2.26286 15.8717 2.37512 16.1423 2.57469 16.3419C2.77425 16.5414 3.04481 16.6537 3.32703 16.654H3.32721H16.6725H16.6727C16.9549 16.6537 17.2255 16.5414 17.4251 16.3419C17.6246 16.1423 17.7369 15.8717 17.7372 15.5895V15.5893V9.27684H18.9116H18.9117V9.12684L2.26253 9.27684ZM8.78542 9.03306L8.78539 9.03313C8.75124 9.10602 8.69701 9.16766 8.62908 9.21083L8.54864 9.08422L8.62907 9.21083C8.56113 9.25399 8.48229 9.27689 8.4018 9.27684M8.78542 9.03306L8.4018 9.27684M8.78542 9.03306L9.57643 7.34247V15.8071H3.32799H3.32787C3.26999 15.8072 3.21447 15.7843 3.1735 15.7434C3.13256 15.7025 3.10951 15.6471 3.1094 15.5893C3.1094 15.5892 3.1094 15.5892 3.1094 15.5891L3.1094 15.2525H7.22081C7.33311 15.2525 7.44081 15.2078 7.52022 15.1284C7.59963 15.049 7.64425 14.9413 7.64425 14.829C7.64425 14.7167 7.59963 14.609 7.52022 14.5296C7.44081 14.4502 7.33311 14.4056 7.22081 14.4056H3.1094V9.27684M8.78542 9.03306L3.1094 9.27684M8.4018 9.27684H3.1094M8.4018 9.27684H3.1094M9.56331 4.84103L9.5633 4.84103L7.74516 3.11999C7.53434 2.90837 7.41595 2.62179 7.41599 2.32302C7.41603 2.02358 7.53502 1.73642 7.74678 1.52471C7.95854 1.31301 8.24573 1.19409 8.54517 1.19413C8.84461 1.19417 9.13177 1.31316 9.34348 1.52492L9.7005 1.8821L9.70056 1.88216C9.77996 1.9615 9.88762 2.00608 9.99987 2.00608C10.1121 2.00608 10.2198 1.9615 10.2992 1.88216L10.2992 1.88212L10.6187 1.56259L10.6188 1.56261L10.6208 1.56052C10.8243 1.34893 11.1006 1.22244 11.3938 1.2066C11.6865 1.19078 11.9742 1.28638 12.1992 1.47412C12.3147 1.57531 12.4084 1.699 12.4744 1.83763C12.5407 1.97673 12.5778 2.12793 12.5834 2.28191C12.589 2.43589 12.563 2.58939 12.5071 2.73296C12.4514 2.87578 12.3673 3.00575 12.2597 3.11497L10.4364 4.84103L10.5396 4.94996L10.4364 4.84103C10.3185 4.95269 10.1623 5.01491 9.99987 5.01491C9.83747 5.01491 9.68124 4.95269 9.56331 4.84103ZM1.75364 8.42996L2.95544 5.86168H9.33424L8.13257 8.42996H1.75364ZM16.8903 15.5891C16.8903 15.6469 16.8673 15.7023 16.8264 15.7432C16.7855 15.7841 16.7301 15.8071 16.6723 15.8071H10.4233V7.34247L11.2143 9.03304C11.2143 9.03305 11.2143 9.03306 11.2143 9.03306C11.2484 9.10599 11.3026 9.16768 11.3706 9.21088C11.4385 9.25408 11.5173 9.27701 11.5978 9.27699C11.5979 9.27699 11.5979 9.27699 11.5979 9.27699H16.8903V15.5891ZM18.2469 8.42996H11.8672L10.6655 5.86168H17.0451L18.2469 8.42996Z" fill="#333333" stroke="#333333" stroke-width="0.3"></path>
                                                                                            </svg>
                                                                                    </div>
                                                                                    <p class="font-normal me-body-18 text-darkgray flex items-center packages_item leading-[normal]">
                                                                                        {{-- //Whole Body Screening (Plain + Contrast) --}}
                                                                                        {{ langbind($vairableProductName, 'name') }}</p>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                            @endif
                                                                            <div class="mt-[5px] flex items-center ">
                                                                                @php
                                                                                    $product = App\Models\Product::find($itemDetails->product_id);
                                                                                    $location = App\Models\MerchantLocation::where("area_id", $itemDetails->confirm_location)
                                                                                                        ->where("merchant_id",$product->merchant->id)->first();
                                                                                @endphp
                                                                                @if($itemDetails->confirm_booking_date!=null)
                                                                                <div class="mr-[10px]">
                                                                                    <img src="{{ asset('frontend/img/member-location.png') }}"
                                                                                        alt="member-location"
                                                                                        class="min-w-[20px]">
                                                                                </div>
                                                                                <p
                                                                                    class="font-normal me-body-18 text-darkgray leading-[normal] preferred-name-1">
                                                                                    {{@langbind($location,'full_address')}}
                                                                                </p>
                                                                                @endif
                                                                            </div>
                                                                            @if(count($recipient->group_data) > 0)
                                                                            @foreach($recipient->group_data as $group)
                                                                                @php
                                                                                $checkUpTable = $recipient->product->package->checkupTable;
                                                                                $tablePriIds =
                                                                                App\Models\CheckUpTableType::where('check_up_type_id',2)->where('check_up_table_id',$checkUpTable->id)->pluck('id')->toArray();
                                                                                $optionGroupIds=
                                                                                App\Models\CheckTableItem::where('check_up_group_id',$group->id)->whereIn('check_up_table_type_id',$tablePriIds)->distinct()->pluck('check_up_item_id')->toArray();
                                                                                $countEquivalentNumber = App\Models\CheckUpItem::whereIn('id',$optionGroupIds)->sum('equivalent_number');
                                                                                @endphp
                                                                                <div component-name="me-checkout-merchant-recipient-cancerMarker-detail"
                                                                                    class="mt-1">
                                                                                    <div class="flex sm:flex-row flex-col">

                                                                                        <div
                                                                                            class="flex w-full justify-between cancer-markers-detail-data1-receipientData111">
                                                                                            <div class="flex items-center w-full">
                                                                                                <div class="mr-2 max-w-[24px] w-[24px]">
                                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                                                        height="25" viewBox="0 0 24 25" fill="none">
                                                                                                        <path
                                                                                                            d="M9.4979 3.00898C8.94263 3.08328 8.22312 3.3531 7.73824 3.66984C7.3824 3.90446 6.83104 4.44409 6.60815 4.77647C6.38525 5.10885 6.15845 5.58982 6.02941 6.01605C5.93165 6.34452 5.92383 6.41882 5.91992 7.0914C5.91992 7.72097 5.92774 7.83437 5.99422 7.96341C6.20929 8.39746 6.8193 8.40919 7.03046 7.98296C7.09694 7.8461 7.10085 7.7718 7.08521 7.28692C7.05784 6.66126 7.11258 6.36407 7.32765 5.89092C7.49189 5.53508 7.65221 5.30046 7.91812 5.03846C8.81359 4.13908 10.1431 3.91228 11.2849 4.45582C12.0475 4.81948 12.6497 5.55072 12.8647 6.38363C12.9273 6.61043 12.9429 6.78639 12.939 7.1305C12.9234 7.90476 12.9273 7.91649 13.0055 8.02207C13.2088 8.29188 13.4786 8.36227 13.7563 8.21758C13.9909 8.09636 14.0652 7.93995 14.1082 7.47853C14.1786 6.72774 14.0457 6.00823 13.7015 5.31219C13.4552 4.80775 13.2049 4.46755 12.8178 4.10389C12.0748 3.40002 11.1794 3.03245 10.1431 3.00507C9.86548 2.99725 9.5722 3.00116 9.4979 3.00898Z"
                                                                                                            fill="#333333" />
                                                                                                        <path
                                                                                                            d="M9.54314 5.43202C9.05825 5.56106 8.62029 5.93645 8.39349 6.41352L8.26836 6.67942L8.25663 11.3992C8.25272 14.07 8.23316 16.1229 8.21361 16.1229C8.19406 16.1229 8.03374 15.9626 7.85386 15.7632C7.2282 15.0789 6.84499 14.8873 6.14503 14.9186C5.81656 14.9303 5.73053 14.9498 5.49982 15.0632C4.48704 15.552 4.17812 16.862 4.87807 17.7184C4.97583 17.8435 5.97689 18.9189 7.09525 20.1115C9.18338 22.3326 9.35544 22.4968 9.85988 22.7315C10.4191 22.9934 10.2978 22.9817 13.3284 22.9974C15.6237 23.0052 16.1321 22.9974 16.3863 22.9504C16.9885 22.837 17.4577 22.5868 17.9113 22.1449C18.4157 21.6483 18.6895 21.0656 18.7716 20.3188C18.7951 20.0685 18.8068 18.8328 18.799 16.7877L18.7833 13.6399L18.6973 13.4052C18.5096 12.9047 18.1303 12.5176 17.6415 12.326C17.3404 12.2087 16.7734 12.1969 16.4645 12.3064C16.2572 12.3768 16.2494 12.3768 16.2025 12.3064C15.9209 11.8998 15.6785 11.6925 15.2914 11.54C14.9942 11.4266 14.4233 11.4188 14.1183 11.5244C13.911 11.5947 13.9032 11.5947 13.8563 11.5244C13.5747 11.1177 13.3284 10.9104 12.9451 10.7618C12.7105 10.668 12.1983 10.6406 11.9167 10.6993L11.7681 10.7306V8.87313C11.7681 7.67265 11.7525 6.94142 11.7251 6.80846C11.5179 5.81132 10.5051 5.17393 9.54314 5.43202ZM10.3135 6.64814C10.3682 6.69115 10.4503 6.77327 10.4934 6.83193C10.5755 6.93751 10.5755 6.97661 10.595 10.668C10.6146 14.3633 10.6146 14.3985 10.6967 14.508C10.8727 14.7504 11.2246 14.8247 11.4553 14.6644C11.7486 14.4649 11.7447 14.4806 11.7681 13.2684C11.7877 12.2439 11.7916 12.1735 11.8698 12.0679C12.124 11.7238 12.6206 11.759 12.8435 12.1383C12.9139 12.2595 12.9217 12.3612 12.9412 13.3349C12.9608 14.332 12.9647 14.4024 13.0429 14.508C13.2971 14.8521 13.7937 14.8169 14.0166 14.4376C14.0831 14.3242 14.0987 14.2108 14.1143 13.632C14.13 13.0338 14.1417 12.9477 14.216 12.85C14.4702 12.5059 14.9668 12.5411 15.1897 12.9204C15.2562 13.0338 15.2718 13.1472 15.2875 13.7259C15.3031 14.3242 15.3148 14.4102 15.3891 14.508C15.5103 14.6722 15.7059 14.7621 15.9092 14.7426C16.2416 14.7074 16.4136 14.4845 16.4567 14.0309C16.4762 13.8315 16.5075 13.7024 16.5622 13.632C16.8164 13.2879 17.313 13.3231 17.5359 13.7024C17.6141 13.8315 17.6141 13.9058 17.6141 17.1005C17.6141 20.1975 17.6102 20.3774 17.5398 20.5808C17.3248 21.2103 16.8281 21.6639 16.2103 21.793C16.0695 21.8203 15.1662 21.8321 13.3479 21.8242C10.6928 21.8125 10.6928 21.8125 10.4738 21.7226C10.3526 21.6757 10.1727 21.5779 10.0749 21.5075C9.8325 21.3355 5.7931 17.038 5.72271 16.8776C5.60931 16.6156 5.69143 16.3419 5.9456 16.1542C6.059 16.0682 6.32882 16.0486 6.49305 16.1151C6.5478 16.1386 7.00531 16.5844 7.50584 17.1084C8.01027 17.6284 8.46388 18.0899 8.51862 18.125C8.65939 18.2228 8.97613 18.2189 9.13646 18.1172C9.20684 18.0781 9.29287 17.9843 9.33198 17.9139C9.39845 17.7927 9.40236 17.4877 9.42191 12.3416C9.44147 6.91404 9.44147 6.8984 9.52358 6.78891C9.70346 6.54256 10.0828 6.47608 10.3135 6.64814Z"
                                                                                                            fill="#333333" />
                                                                                                    </svg>
                                                                                                </div>
                                                                                                <p
                                                                                                    class="mr-2 font-normal me-body-18 text-darkgray underline  cancer-markers-label-1-receipientData{{$group->id}}{{$recipient->id}} ">
                                                                                                    {{langbind($group,'name')}} (<span
                                                                                                        class="selected-cancermarkers-count-1-receipientData111">{{$group->itemDatas($group->id,$recipient->id,$recipient->product->id)->sum('equivalent_number')}}</span>
                                                                                                        @lang('labels.check_out.selected'))</p>
                                                                                                <div class="showDropdown-btn active">
                                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                                                        height="7" viewBox="0 0 12 7" fill="none">
                                                                                                        <path
                                                                                                            d="M0.042841 6.46313C0.14831 6.69047 0.413154 6.7936 0.649873 6.6975C0.713154 6.67172 1.46315 5.93344 3.36628 4.02094L5.99831 1.37719L8.628 4.02094C10.5358 5.93579 11.2835 6.67172 11.3467 6.6975C11.396 6.71625 11.478 6.73266 11.5296 6.73266C11.8671 6.73266 12.0944 6.39047 11.9538 6.08813C11.8905 5.95454 6.32878 0.367034 6.19753 0.308441C6.078 0.252191 5.91862 0.252191 5.79909 0.308441C5.66784 0.367034 0.106123 5.95453 0.042841 6.08813C-0.0134086 6.20766 -0.0134086 6.3436 0.042841 6.46313Z"
                                                                                                            fill="#333333" />
                                                                                                    </svg>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="hidden detail-data-list1-receipientData111">
                                                                                        <div component-name="me-checkout-merchant-recipient-cancerMarkers-detail-list"
                                                                                            class="pl-8 mt-1">
                                                                                            <ul class="custom-list-style bg-far px-5 py-[10px] rounded-[12px] cancerMarkers-detail-data1-receipientData111">
                                                                                                @if(count($group->itemDatas($group->id,$recipient->id,$recipient->product->id)) > 0)
                                                                                                    @foreach($group->itemDatas($group->id,$recipient->id,$recipient->product->id) as $item)
                                                                                                    <li class="flex items-center mt-2">
                                                                                                        <span class="mr-4 font-normal me-body-18 text-darkgray">{{langbind($item,'name')}}</span>
                                                                                                    </li>
                                                                                                    @endforeach
                                                                                                @else 
                                                                                                <li class="flex items-center mt-2">
                                                                                                    <span class="mr-4 font-normal me-body-18 text-darkgray">@lang('labels.product_detail.decide_later')</span>
                                                                                                </li>
                                                                                                @endif
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                            @endif
                                                                            @if(count($recipient->add_on_data) > 0)
                                                                            <div component-name="me-checkout-merchant-recipient-preferredTime-detail"
                                                                                class="mt-1">
                                                                                <div>
                                                                                    <div class="flex w-full justify-between addson-show-detail-receipientData111"
                                                                                        style="display:block">
                                                                                        <div class="flex items-center w-full">
                                                                                            <div class="mr-2 max-w-[24px] w-[24px]">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                                                    height="25" viewBox="0 0 24 25" fill="none">
                                                                                                    <path
                                                                                                        d="M12.5 21C17.1944 21 21 17.1944 21 12.5C21 7.80558 17.1944 4 12.5 4C7.80558 4 4 7.80558 4 12.5C4 17.1944 7.80558 21 12.5 21Z"
                                                                                                        stroke="#333333" stroke-linecap="round"
                                                                                                        stroke-linejoin="round" />
                                                                                                    <path
                                                                                                        d="M12.4992 8.57715V16.4233M8.57617 12.5002H16.4223"
                                                                                                        stroke="#333333" stroke-linecap="round"
                                                                                                        stroke-linejoin="round" />
                                                                                                </svg>
                                                                                            </div>
                                                                                            <p data-id="receipientData111"
                                                                                                class="mr-2 font-normal me-body-18 text-darkgray underline">
                                                                                                @lang('labels.check_out.add_on')</p>
                                                                                            <div class="showDropdown-btn active">
                                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                                                    height="7" viewBox="0 0 12 7" fill="none">
                                                                                                    <path
                                                                                                        d="M0.042841 6.46313C0.14831 6.69047 0.413154 6.7936 0.649873 6.6975C0.713154 6.67172 1.46315 5.93344 3.36628 4.02094L5.99831 1.37719L8.628 4.02094C10.5358 5.93579 11.2835 6.67172 11.3467 6.6975C11.396 6.71625 11.478 6.73266 11.5296 6.73266C11.8671 6.73266 12.0944 6.39047 11.9538 6.08813C11.8905 5.95454 6.32878 0.367034 6.19753 0.308441C6.078 0.252191 5.91862 0.252191 5.79909 0.308441C5.66784 0.367034 0.106123 5.95453 0.042841 6.08813C-0.0134086 6.20766 -0.0134086 6.3436 0.042841 6.46313Z"
                                                                                                        fill="#333333" />
                                                                                                </svg>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class=" addson-detail-list-receipientData111">
                                                                                    <div component-name="me-checkout-merchant-recipient-addonItems-detail-list"
                                                                                        class="pl-8 mt-1">
                                                                                        <ul
                                                                                            class="custom-list-style bg-far px-5 py-[10px] rounded-[12px] adds-on-checklist-detailreceipientData111">
                                                                                            @foreach($recipient->add_on_data as $item)
                                                                                            <li data-text="Upper Abdomen Ultrasound"
                                                                                                data-price="{{$item->discount_price ? $item->discount_price :$item->original_price}}"
                                                                                                class="flex items-center mt-2">
                                                                                                <span
                                                                                                    class="mr-4 font-normal me-body-18 text-darkgray">{{langbind($item,'name')}}</span>
                                                                                                <span
                                                                                                    class="font-normal me-body-18 text-darkgray">${{$item->discount_price ? $item->discount_price :$item->original_price}}</span>
                                                                                            </li>
                                                                                            @endforeach
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>


                                                                                <div class="hidden">
                                                                                    <input data-id="receipientData111" value="" type="hidden"
                                                                                        class="addson-checklist addson-checklist-undefined addson-checklist-receipientData111" />
                                                                                </div>
                                                                            </div>
                                                                            @endif
                                                                            @if($recipient->have_referral!=NULL)
                                                                            <div component-name="me-checkout-order-referral-letter" class="w-full justify-between referral-detail mt-2">
                                                                                <div class="flex items-center w-full">        
                                                                                    <p class="mr-2 font-normal me-body-18 text-darkgray">@lang('labels.order_details.referral_letter'): <span class="selected-addson">@lang('labels.compare.yes')</span></p>       
                                                                                </div>
                                                                                <div class="mt-4">
                                                                                    <div class="inline-block hover:border-orangeMediq hover:text-orangeMediq relative min-h-[40px] py-2 px-5 border-1 border-darkgray text-center me-body16 rounded-[6px] min-w-[135px] leading-[22.4px]">
                                                                                        <a href="{{$recipient->file_upload}}" class="absolute top-[48%] left-1/2 -translate-x-1/2 -translate-y-1/2">@lang('labels.order_details.view')</a>
                                                                                    </div>
                                                                                </div>
                                                                                @if($recipient->message!=NULL)
                                                                                <p
                                                                                    class="mt-2 font-normal me-body-18 text-darkgray">
                                                                                    @lang('labels.partnership.message'): {{$recipient->message}}
                                                                                </p>
                                                                                @endif
                                                                            </div>
                                                                            @endif
                                                                            @if($itemDetails->remark!="")
                                                                            <p
                                                                                class="font-normal me-body-18 text-darkgray mt-[10px] ">
                                                                                @lang('labels.check_out.special_requests'): {{$itemDetails->remark}}
                                                                            </p>
                                                                            @endif
                                                                            @if($itemDetails->order_status==1)
                                                                            @if($itemDetails->confirm_booking_date!=null)
                                                                            <p class="font-normal me-body-16 text-orangeMediq">@lang('labels.order_details.booking_comfirmed_text_1') {{\Carbon\Carbon::parse($itemDetails->created_at)->addDays(3)->format('d F Y')}} @lang('labels.order_details.booking_comfirmed_text_2')</p>
                                                                            @else
                                                                            <p class="font-normal me-body-16 text-orangeMediq">@lang('labels.order_details.please_click_text3') {{ \Carbon\Carbon::parse($itemDetails->created_at)->addDays(3)->format('d F Y')}} @lang('labels.order_details.please_click_text4')</p>
                                                                            @endif
                                                                            @endif
                                                                            @if($itemDetails->order_status==2)
                                                                            <p class="font-normal me-body-18 text-darkgray">@lang('labels.order_details.2_working_days_text1') <a href="https://api.whatsapp.com/send?phone=85295194000" target="_blank" class="underline underline-offset-2">@lang('labels.order_details.2_working_days_text2') </a></p>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div id="me-member-order-edit-booking-popup"
                                                                        class="hidden me-member-order-edit-booking-popup me-member-order-edit-booking-popup-{{$itemDetails->recipient_id}}">
                                                                        <div
                                                                            class="me-member-order-edit-booking-popup-content overflow-visible px-5 rounded-[12px] xl:min-w-[1060px] max-w-[1000px] min-w-[90%] max-h-[80%]">
                                                                            <div
                                                                                class="w-full h-full overflow-y-auto py-5 lg:py-10">
                                                                                <button data-id="{{$itemDetails->recipient_id}}"
                                                                                    class="z-[1] absolute top-5 right-5 focus-visible:outline-none focus:outline-none p-1"
                                                                                    id="me-member-order-edit-booking-popup-closebtn"><img
                                                                                        class=" w-auto h-auto align-middle"
                                                                                        src="{{ asset('frontend/img/close-btn.png') }}"
                                                                                        alt=""></button>
                                                                                <div>
                                                                                    <div class="flex justify-between">
                                                                                        <h3
                                                                                            class="font-bold me-body-23 text-darkgray text-left">
                                                                                            @lang('labels.order_details.edit_booking')</h3>
                                                                                    </div>
                                                                                    <hr class="my-5 bg-mee4">
                                                                                    <div>
                                                                                        <div component-name="me-checkout-merchant-recipient-data"
                                                                                            class="">
                                                                                            <div
                                                                                                class="me-checkout-merchant-content-card-container">

                                                                                                <div data-id="1"
                                                                                                    data-parentid="1"
                                                                                                    class="mt-7 data-card-items data-card-items-1">
                                                                                                    <p
                                                                                                        class="hidden font-bold me-body-20 text-white px-5 py-[10px] bg-blueMediq">
                                                                                                    </p>
                                                                                                    <div class="mt-4">
                                                                                                        <div component-name="me-checkout-merchant-recipient-preferredTime-detail"
                                                                                                            class="mt-1 @@refundCard">

                                                                                                            <div
                                                                                                                class="flex">
                                                                                                                <div
                                                                                                                    class="flex preferredTime-placeholder1 hidden">
                                                                                                                    <div
                                                                                                                        class="mr-2 max-w-[24px] w-[24px]">
                                                                                                                        <svg xmlns="http://www.w3.org/2000/svg')}}"
                                                                                                                            width="20"
                                                                                                                            height="21"
                                                                                                                            viewBox="0 0 20 21"
                                                                                                                            fill="none">
                                                                                                                            <path
                                                                                                                                d="M14.1667 12.1667C14.3877 12.1667 14.5996 12.0789 14.7559 11.9226C14.9122 11.7663 15 11.5543 15 11.3333C15 11.1123 14.9122 10.9004 14.7559 10.7441C14.5996 10.5878 14.3877 10.5 14.1667 10.5C13.9457 10.5 13.7337 10.5878 13.5774 10.7441C13.4211 10.9004 13.3333 11.1123 13.3333 11.3333C13.3333 11.5543 13.4211 11.7663 13.5774 11.9226C13.7337 12.0789 13.9457 12.1667 14.1667 12.1667ZM14.1667 15.5C14.3877 15.5 14.5996 15.4122 14.7559 15.2559C14.9122 15.0996 15 14.8877 15 14.6667C15 14.4457 14.9122 14.2337 14.7559 14.0774C14.5996 13.9211 14.3877 13.8333 14.1667 13.8333C13.9457 13.8333 13.7337 13.9211 13.5774 14.0774C13.4211 14.2337 13.3333 14.4457 13.3333 14.6667C13.3333 14.8877 13.4211 15.0996 13.5774 15.2559C13.7337 15.4122 13.9457 15.5 14.1667 15.5ZM10.8333 11.3333C10.8333 11.5543 10.7455 11.7663 10.5893 11.9226C10.433 12.0789 10.221 12.1667 10 12.1667C9.77899 12.1667 9.56702 12.0789 9.41074 11.9226C9.25446 11.7663 9.16667 11.5543 9.16667 11.3333C9.16667 11.1123 9.25446 10.9004 9.41074 10.7441C9.56702 10.5878 9.77899 10.5 10 10.5C10.221 10.5 10.433 10.5878 10.5893 10.7441C10.7455 10.9004 10.8333 11.1123 10.8333 11.3333ZM10.8333 14.6667C10.8333 14.8877 10.7455 15.0996 10.5893 15.2559C10.433 15.4122 10.221 15.5 10 15.5C9.77899 15.5 9.56702 15.4122 9.41074 15.2559C9.25446 15.0996 9.16667 14.8877 9.16667 14.6667C9.16667 14.4457 9.25446 14.2337 9.41074 14.0774C9.56702 13.9211 9.77899 13.8333 10 13.8333C10.221 13.8333 10.433 13.9211 10.5893 14.0774C10.7455 14.2337 10.8333 14.4457 10.8333 14.6667ZM5.83333 12.1667C6.05435 12.1667 6.26631 12.0789 6.42259 11.9226C6.57887 11.7663 6.66667 11.5543 6.66667 11.3333C6.66667 11.1123 6.57887 10.9004 6.42259 10.7441C6.26631 10.5878 6.05435 10.5 5.83333 10.5C5.61232 10.5 5.40036 10.5878 5.24408 10.7441C5.0878 10.9004 5 11.1123 5 11.3333C5 11.5543 5.0878 11.7663 5.24408 11.9226C5.40036 12.0789 5.61232 12.1667 5.83333 12.1667ZM5.83333 15.5C6.05435 15.5 6.26631 15.4122 6.42259 15.2559C6.57887 15.0996 6.66667 14.8877 6.66667 14.6667C6.66667 14.4457 6.57887 14.2337 6.42259 14.0774C6.26631 13.9211 6.05435 13.8333 5.83333 13.8333C5.61232 13.8333 5.40036 13.9211 5.24408 14.0774C5.0878 14.2337 5 14.4457 5 14.6667C5 14.8877 5.0878 15.0996 5.24408 15.2559C5.40036 15.4122 5.61232 15.5 5.83333 15.5Z"
                                                                                                                                fill="#333333">
                                                                                                                            </path>
                                                                                                                            <path
                                                                                                                                fill-rule="evenodd"
                                                                                                                                clip-rule="evenodd"
                                                                                                                                d="M5.83268 1.95801C5.99844 1.95801 6.15741 2.02386 6.27462 2.14107C6.39183 2.25828 6.45768 2.41725 6.45768 2.58301V3.21884C7.00935 3.20801 7.61685 3.20801 8.28518 3.20801H11.7127C12.3818 3.20801 12.9893 3.20801 13.541 3.21884V2.58301C13.541 2.41725 13.6069 2.25828 13.7241 2.14107C13.8413 2.02386 14.0003 1.95801 14.166 1.95801C14.3318 1.95801 14.4907 2.02386 14.608 2.14107C14.7252 2.25828 14.791 2.41725 14.791 2.58301V3.27217C15.0077 3.28884 15.2127 3.30967 15.4068 3.33551C16.3835 3.46717 17.1743 3.74384 17.7985 4.36717C18.4218 4.99134 18.6985 5.78217 18.8302 6.75884C18.9577 7.70884 18.9577 8.92134 18.9577 10.453V12.213C18.9577 13.7447 18.9577 14.958 18.8302 15.9072C18.6985 16.8838 18.4218 17.6747 17.7985 18.2988C17.1743 18.9222 16.3835 19.1988 15.4068 19.3305C14.4568 19.458 13.2443 19.458 11.7127 19.458H8.28601C6.75435 19.458 5.54102 19.458 4.59185 19.3305C3.61518 19.1988 2.82435 18.9222 2.20018 18.2988C1.57685 17.6747 1.30018 16.8838 1.16852 15.9072C1.04102 14.9572 1.04102 13.7447 1.04102 12.213V10.453C1.04102 8.92134 1.04102 7.70801 1.16852 6.75884C1.30018 5.78217 1.57685 4.99134 2.20018 4.36717C2.82435 3.74384 3.61518 3.46717 4.59185 3.33551C4.78602 3.30967 4.99185 3.28884 5.20768 3.27217V2.58301C5.20768 2.41725 5.27353 2.25828 5.39074 2.14107C5.50795 2.02386 5.66692 1.95801 5.83268 1.95801ZM4.75768 4.57467C3.92018 4.68717 3.43685 4.89884 3.08435 5.25134C2.73185 5.60384 2.52018 6.08717 2.40768 6.92551C2.38852 7.06717 2.37268 7.21717 2.35935 7.37467H17.6393C17.626 7.21634 17.6102 7.06717 17.591 6.92467C17.4785 6.08717 17.2668 5.60384 16.9143 5.25134C16.5618 4.89884 16.0785 4.68717 15.2402 4.57467C14.3843 4.45967 13.2552 4.45801 11.666 4.45801H8.33268C6.74351 4.45801 5.61518 4.45967 4.75768 4.57467ZM2.29102 10.4997C2.29102 9.78801 2.29102 9.16884 2.30185 8.62467H17.6968C17.7077 9.16884 17.7077 9.78801 17.7077 10.4997V12.1663C17.7077 13.7555 17.706 14.8847 17.591 15.7413C17.4785 16.5788 17.2668 17.0622 16.9143 17.4147C16.5618 17.7672 16.0785 17.9788 15.2402 18.0913C14.3843 18.2063 13.2552 18.208 11.666 18.208H8.33268C6.74351 18.208 5.61518 18.2063 4.75768 18.0913C3.92018 17.9788 3.43685 17.7672 3.08435 17.4147C2.73185 17.0622 2.52018 16.5788 2.40768 15.7405C2.29268 14.8847 2.29102 13.7555 2.29102 12.1663V10.4997Z"
                                                                                                                                fill="#333333">
                                                                                                                            </path>
                                                                                                                        </svg>
                                                                                                                    </div>
                                                                                                                    <p data-id="receipientData{{$recipient->id}}"
                                                                                                                        data-recipient_area_id="{{$recipient->location}}"
                                                                                                                        class="flex custom-remark-title cursor-pointer font-normal me-body-18 text-darkgray underline">
                                                                                                                        Select
                                                                                                                        your
                                                                                                                        preferred
                                                                                                                        time</p>
                                                                                                                </div>
                                                                                                                @include('frontend.checkouts.init-popup.preferred-time-popup')
                                                                                                                @include('frontend.checkouts.calendar_js')
                                                                                                                <div
                                                                                                                    class="flex w-full justify-between preferredTime-detail1 flex">
                                                                                                                    <div
                                                                                                                        class="flex items-center">
                                                                                                                        <div
                                                                                                                            class="mr-2 max-w-[24px] w-[24px]">
                                                                                                                            <svg xmlns="http://www.w3.org/2000/svg')}}"
                                                                                                                                width="20"
                                                                                                                                height="21"
                                                                                                                                viewBox="0 0 20 21"
                                                                                                                                fill="none">
                                                                                                                                <path
                                                                                                                                    d="M14.1667 12.1667C14.3877 12.1667 14.5996 12.0789 14.7559 11.9226C14.9122 11.7663 15 11.5543 15 11.3333C15 11.1123 14.9122 10.9004 14.7559 10.7441C14.5996 10.5878 14.3877 10.5 14.1667 10.5C13.9457 10.5 13.7337 10.5878 13.5774 10.7441C13.4211 10.9004 13.3333 11.1123 13.3333 11.3333C13.3333 11.5543 13.4211 11.7663 13.5774 11.9226C13.7337 12.0789 13.9457 12.1667 14.1667 12.1667ZM14.1667 15.5C14.3877 15.5 14.5996 15.4122 14.7559 15.2559C14.9122 15.0996 15 14.8877 15 14.6667C15 14.4457 14.9122 14.2337 14.7559 14.0774C14.5996 13.9211 14.3877 13.8333 14.1667 13.8333C13.9457 13.8333 13.7337 13.9211 13.5774 14.0774C13.4211 14.2337 13.3333 14.4457 13.3333 14.6667C13.3333 14.8877 13.4211 15.0996 13.5774 15.2559C13.7337 15.4122 13.9457 15.5 14.1667 15.5ZM10.8333 11.3333C10.8333 11.5543 10.7455 11.7663 10.5893 11.9226C10.433 12.0789 10.221 12.1667 10 12.1667C9.77899 12.1667 9.56702 12.0789 9.41074 11.9226C9.25446 11.7663 9.16667 11.5543 9.16667 11.3333C9.16667 11.1123 9.25446 10.9004 9.41074 10.7441C9.56702 10.5878 9.77899 10.5 10 10.5C10.221 10.5 10.433 10.5878 10.5893 10.7441C10.7455 10.9004 10.8333 11.1123 10.8333 11.3333ZM10.8333 14.6667C10.8333 14.8877 10.7455 15.0996 10.5893 15.2559C10.433 15.4122 10.221 15.5 10 15.5C9.77899 15.5 9.56702 15.4122 9.41074 15.2559C9.25446 15.0996 9.16667 14.8877 9.16667 14.6667C9.16667 14.4457 9.25446 14.2337 9.41074 14.0774C9.56702 13.9211 9.77899 13.8333 10 13.8333C10.221 13.8333 10.433 13.9211 10.5893 14.0774C10.7455 14.2337 10.8333 14.4457 10.8333 14.6667ZM5.83333 12.1667C6.05435 12.1667 6.26631 12.0789 6.42259 11.9226C6.57887 11.7663 6.66667 11.5543 6.66667 11.3333C6.66667 11.1123 6.57887 10.9004 6.42259 10.7441C6.26631 10.5878 6.05435 10.5 5.83333 10.5C5.61232 10.5 5.40036 10.5878 5.24408 10.7441C5.0878 10.9004 5 11.1123 5 11.3333C5 11.5543 5.0878 11.7663 5.24408 11.9226C5.40036 12.0789 5.61232 12.1667 5.83333 12.1667ZM5.83333 15.5C6.05435 15.5 6.26631 15.4122 6.42259 15.2559C6.57887 15.0996 6.66667 14.8877 6.66667 14.6667C6.66667 14.4457 6.57887 14.2337 6.42259 14.0774C6.26631 13.9211 6.05435 13.8333 5.83333 13.8333C5.61232 13.8333 5.40036 13.9211 5.24408 14.0774C5.0878 14.2337 5 14.4457 5 14.6667C5 14.8877 5.0878 15.0996 5.24408 15.2559C5.40036 15.4122 5.61232 15.5 5.83333 15.5Z"
                                                                                                                                    fill="#333333">
                                                                                                                                </path>
                                                                                                                                <path
                                                                                                                                    fill-rule="evenodd"
                                                                                                                                    clip-rule="evenodd"
                                                                                                                                    d="M5.83268 1.95801C5.99844 1.95801 6.15741 2.02386 6.27462 2.14107C6.39183 2.25828 6.45768 2.41725 6.45768 2.58301V3.21884C7.00935 3.20801 7.61685 3.20801 8.28518 3.20801H11.7127C12.3818 3.20801 12.9893 3.20801 13.541 3.21884V2.58301C13.541 2.41725 13.6069 2.25828 13.7241 2.14107C13.8413 2.02386 14.0003 1.95801 14.166 1.95801C14.3318 1.95801 14.4907 2.02386 14.608 2.14107C14.7252 2.25828 14.791 2.41725 14.791 2.58301V3.27217C15.0077 3.28884 15.2127 3.30967 15.4068 3.33551C16.3835 3.46717 17.1743 3.74384 17.7985 4.36717C18.4218 4.99134 18.6985 5.78217 18.8302 6.75884C18.9577 7.70884 18.9577 8.92134 18.9577 10.453V12.213C18.9577 13.7447 18.9577 14.958 18.8302 15.9072C18.6985 16.8838 18.4218 17.6747 17.7985 18.2988C17.1743 18.9222 16.3835 19.1988 15.4068 19.3305C14.4568 19.458 13.2443 19.458 11.7127 19.458H8.28601C6.75435 19.458 5.54102 19.458 4.59185 19.3305C3.61518 19.1988 2.82435 18.9222 2.20018 18.2988C1.57685 17.6747 1.30018 16.8838 1.16852 15.9072C1.04102 14.9572 1.04102 13.7447 1.04102 12.213V10.453C1.04102 8.92134 1.04102 7.70801 1.16852 6.75884C1.30018 5.78217 1.57685 4.99134 2.20018 4.36717C2.82435 3.74384 3.61518 3.46717 4.59185 3.33551C4.78602 3.30967 4.99185 3.28884 5.20768 3.27217V2.58301C5.20768 2.41725 5.27353 2.25828 5.39074 2.14107C5.50795 2.02386 5.66692 1.95801 5.83268 1.95801ZM4.75768 4.57467C3.92018 4.68717 3.43685 4.89884 3.08435 5.25134C2.73185 5.60384 2.52018 6.08717 2.40768 6.92551C2.38852 7.06717 2.37268 7.21717 2.35935 7.37467H17.6393C17.626 7.21634 17.6102 7.06717 17.591 6.92467C17.4785 6.08717 17.2668 5.60384 16.9143 5.25134C16.5618 4.89884 16.0785 4.68717 15.2402 4.57467C14.3843 4.45967 13.2552 4.45801 11.666 4.45801H8.33268C6.74351 4.45801 5.61518 4.45967 4.75768 4.57467ZM2.29102 10.4997C2.29102 9.78801 2.29102 9.16884 2.30185 8.62467H17.6968C17.7077 9.16884 17.7077 9.78801 17.7077 10.4997V12.1663C17.7077 13.7555 17.706 14.8847 17.591 15.7413C17.4785 16.5788 17.2668 17.0622 16.9143 17.4147C16.5618 17.7672 16.0785 17.9788 15.2402 18.0913C14.3843 18.2063 13.2552 18.208 11.666 18.208H8.33268C6.74351 18.208 5.61518 18.2063 4.75768 18.0913C3.92018 17.9788 3.43685 17.7672 3.08435 17.4147C2.73185 17.0622 2.52018 16.5788 2.40768 15.7405C2.29268 14.8847 2.29102 13.7555 2.29102 12.1663V10.4997Z"
                                                                                                                                    fill="#333333">
                                                                                                                                </path>
                                                                                                                            </svg>
                                                                                                                        </div>
                                                                                                                        <p
                                                                                                                        class="font-normal me-body-18 text-darkgray flex items-center preferredTime">
                                                                                                                        <span
                                                                                                                            class="preferred-name-receipientData{{$recipient->id}}"></span>
                                                                                                                        <span
                                                                                                                            class="preferred-date-receipientData{{$recipient->id}}"></span>
                                                                                                                        <span
                                                                                                                            class="preferred-timeDesc-receipientData{{$recipient->id}}"></span>
                                                                                                                    </p>
                                                                                                                </div>
                                                                                                                <div data-id="receipientData{{$recipient->id}}" class="edit-btn  undefined"
                                                                                                                    data-recipient_area_id="{{$recipient->location}}">
                                                                                                                    <p
                                                                                                                        class="cursor-pointer flex font-normal me-body-16 text-darkgray underline hover:text-orangeMediq">
                                                                                                                       @lang('labels.check_out.edit')</p>
                                                                                                                </div>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                        </div>
                                                                                                        <hr class="my-5 bg-mee4 ">
                                                                                                        @if(count($recipient->group_data) > 0)
                                                                                                        @foreach($recipient->group_data as $group)
                                                                                                            @php
                                                                                                            $checkUpTable = $recipient->product->package->checkupTable;
                                                                                                            $tablePriIds =
                                                                                                            App\Models\CheckUpTableType::where('check_up_type_id',2)->where('check_up_table_id',$checkUpTable->id)->pluck('id')->toArray();
                                                                                                            $optionGroupIds=
                                                                                                            App\Models\CheckTableItem::where('check_up_group_id',$group->id)->whereIn('check_up_table_type_id',$tablePriIds)->distinct()->pluck('check_up_item_id')->toArray();
                                                                                                            $countEquivalentNumber = App\Models\CheckUpItem::whereIn('id',$optionGroupIds)->sum('equivalent_number');
                                                                                                            @endphp
                                                                                                            <div component-name="me-checkout-merchant-recipient-cancerMarker-detail"
                                                                                                                class="mt-1 @@refundCard">
                                                                                                                <div
                                                                                                                    class="flex sm:flex-row flex-col">
                                                                                                                    <div
                                                                                                                        class="flex hidden cancer-markers-placeholder1-1">
                                                                                                                        <div
                                                                                                                            class="mr-2 max-w-[24px] w-[24px]">
                                                                                                                            <svg xmlns="http://www.w3.org/2000/svg')}}"
                                                                                                                                width="24"
                                                                                                                                height="25"
                                                                                                                                viewBox="0 0 24 25"
                                                                                                                                fill="none">
                                                                                                                                <path
                                                                                                                                    d="M9.4979 3.00898C8.94263 3.08328 8.22312 3.3531 7.73824 3.66984C7.3824 3.90446 6.83104 4.44409 6.60815 4.77647C6.38525 5.10885 6.15845 5.58982 6.02941 6.01605C5.93165 6.34452 5.92383 6.41882 5.91992 7.0914C5.91992 7.72097 5.92774 7.83437 5.99422 7.96341C6.20929 8.39746 6.8193 8.40919 7.03046 7.98296C7.09694 7.8461 7.10085 7.7718 7.08521 7.28692C7.05784 6.66126 7.11258 6.36407 7.32765 5.89092C7.49189 5.53508 7.65221 5.30046 7.91812 5.03846C8.81359 4.13908 10.1431 3.91228 11.2849 4.45582C12.0475 4.81948 12.6497 5.55072 12.8647 6.38363C12.9273 6.61043 12.9429 6.78639 12.939 7.1305C12.9234 7.90476 12.9273 7.91649 13.0055 8.02207C13.2088 8.29188 13.4786 8.36227 13.7563 8.21758C13.9909 8.09636 14.0652 7.93995 14.1082 7.47853C14.1786 6.72774 14.0457 6.00823 13.7015 5.31219C13.4552 4.80775 13.2049 4.46755 12.8178 4.10389C12.0748 3.40002 11.1794 3.03245 10.1431 3.00507C9.86548 2.99725 9.5722 3.00116 9.4979 3.00898Z"
                                                                                                                                    fill="#333333">
                                                                                                                                </path>
                                                                                                                                <path
                                                                                                                                    d="M9.54314 5.43202C9.05825 5.56106 8.62029 5.93645 8.39349 6.41352L8.26836 6.67942L8.25663 11.3992C8.25272 14.07 8.23316 16.1229 8.21361 16.1229C8.19406 16.1229 8.03374 15.9626 7.85386 15.7632C7.2282 15.0789 6.84499 14.8873 6.14503 14.9186C5.81656 14.9303 5.73053 14.9498 5.49982 15.0632C4.48704 15.552 4.17812 16.862 4.87807 17.7184C4.97583 17.8435 5.97689 18.9189 7.09525 20.1115C9.18338 22.3326 9.35544 22.4968 9.85988 22.7315C10.4191 22.9934 10.2978 22.9817 13.3284 22.9974C15.6237 23.0052 16.1321 22.9974 16.3863 22.9504C16.9885 22.837 17.4577 22.5868 17.9113 22.1449C18.4157 21.6483 18.6895 21.0656 18.7716 20.3188C18.7951 20.0685 18.8068 18.8328 18.799 16.7877L18.7833 13.6399L18.6973 13.4052C18.5096 12.9047 18.1303 12.5176 17.6415 12.326C17.3404 12.2087 16.7734 12.1969 16.4645 12.3064C16.2572 12.3768 16.2494 12.3768 16.2025 12.3064C15.9209 11.8998 15.6785 11.6925 15.2914 11.54C14.9942 11.4266 14.4233 11.4188 14.1183 11.5244C13.911 11.5947 13.9032 11.5947 13.8563 11.5244C13.5747 11.1177 13.3284 10.9104 12.9451 10.7618C12.7105 10.668 12.1983 10.6406 11.9167 10.6993L11.7681 10.7306V8.87313C11.7681 7.67265 11.7525 6.94142 11.7251 6.80846C11.5179 5.81132 10.5051 5.17393 9.54314 5.43202ZM10.3135 6.64814C10.3682 6.69115 10.4503 6.77327 10.4934 6.83193C10.5755 6.93751 10.5755 6.97661 10.595 10.668C10.6146 14.3633 10.6146 14.3985 10.6967 14.508C10.8727 14.7504 11.2246 14.8247 11.4553 14.6644C11.7486 14.4649 11.7447 14.4806 11.7681 13.2684C11.7877 12.2439 11.7916 12.1735 11.8698 12.0679C12.124 11.7238 12.6206 11.759 12.8435 12.1383C12.9139 12.2595 12.9217 12.3612 12.9412 13.3349C12.9608 14.332 12.9647 14.4024 13.0429 14.508C13.2971 14.8521 13.7937 14.8169 14.0166 14.4376C14.0831 14.3242 14.0987 14.2108 14.1143 13.632C14.13 13.0338 14.1417 12.9477 14.216 12.85C14.4702 12.5059 14.9668 12.5411 15.1897 12.9204C15.2562 13.0338 15.2718 13.1472 15.2875 13.7259C15.3031 14.3242 15.3148 14.4102 15.3891 14.508C15.5103 14.6722 15.7059 14.7621 15.9092 14.7426C16.2416 14.7074 16.4136 14.4845 16.4567 14.0309C16.4762 13.8315 16.5075 13.7024 16.5622 13.632C16.8164 13.2879 17.313 13.3231 17.5359 13.7024C17.6141 13.8315 17.6141 13.9058 17.6141 17.1005C17.6141 20.1975 17.6102 20.3774 17.5398 20.5808C17.3248 21.2103 16.8281 21.6639 16.2103 21.793C16.0695 21.8203 15.1662 21.8321 13.3479 21.8242C10.6928 21.8125 10.6928 21.8125 10.4738 21.7226C10.3526 21.6757 10.1727 21.5779 10.0749 21.5075C9.8325 21.3355 5.7931 17.038 5.72271 16.8776C5.60931 16.6156 5.69143 16.3419 5.9456 16.1542C6.059 16.0682 6.32882 16.0486 6.49305 16.1151C6.5478 16.1386 7.00531 16.5844 7.50584 17.1084C8.01027 17.6284 8.46388 18.0899 8.51862 18.125C8.65939 18.2228 8.97613 18.2189 9.13646 18.1172C9.20684 18.0781 9.29287 17.9843 9.33198 17.9139C9.39845 17.7927 9.40236 17.4877 9.42191 12.3416C9.44147 6.91404 9.44147 6.8984 9.52358 6.78891C9.70346 6.54256 10.0828 6.47608 10.3135 6.64814Z"
                                                                                                                                    fill="#333333">
                                                                                                                                </path>
                                                                                                                            </svg>
                                                                                                                        </div>
                                                                                                                        <p data-id="1-1"
                                                                                                                            class="custom-cancer-markers-remark-title cursor-pointer flex flex-wrap font-normal me-body-18 text-darkgray underline">
                                                                                                                            Select
                                                                                                                            Cancer
                                                                                                                            Markers
                                                                                                                            (0/7
                                                                                                                            @lang('labels.check_out.selected'))
                                                                                                                        </p>
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="flex w-full justify-between flex cancer-markers-detail-data1-1">
                                                                                                                        <div
                                                                                                                            class="flex items-center w-full">
                                                                                                                            <div
                                                                                                                                class="mr-2 max-w-[24px] w-[24px]">
                                                                                                                                <svg xmlns="http://www.w3.org/2000/svg')}}"
                                                                                                                                    width="24"
                                                                                                                                    height="25"
                                                                                                                                    viewBox="0 0 24 25"
                                                                                                                                    fill="none">
                                                                                                                                    <path
                                                                                                                                        d="M9.4979 3.00898C8.94263 3.08328 8.22312 3.3531 7.73824 3.66984C7.3824 3.90446 6.83104 4.44409 6.60815 4.77647C6.38525 5.10885 6.15845 5.58982 6.02941 6.01605C5.93165 6.34452 5.92383 6.41882 5.91992 7.0914C5.91992 7.72097 5.92774 7.83437 5.99422 7.96341C6.20929 8.39746 6.8193 8.40919 7.03046 7.98296C7.09694 7.8461 7.10085 7.7718 7.08521 7.28692C7.05784 6.66126 7.11258 6.36407 7.32765 5.89092C7.49189 5.53508 7.65221 5.30046 7.91812 5.03846C8.81359 4.13908 10.1431 3.91228 11.2849 4.45582C12.0475 4.81948 12.6497 5.55072 12.8647 6.38363C12.9273 6.61043 12.9429 6.78639 12.939 7.1305C12.9234 7.90476 12.9273 7.91649 13.0055 8.02207C13.2088 8.29188 13.4786 8.36227 13.7563 8.21758C13.9909 8.09636 14.0652 7.93995 14.1082 7.47853C14.1786 6.72774 14.0457 6.00823 13.7015 5.31219C13.4552 4.80775 13.2049 4.46755 12.8178 4.10389C12.0748 3.40002 11.1794 3.03245 10.1431 3.00507C9.86548 2.99725 9.5722 3.00116 9.4979 3.00898Z"
                                                                                                                                        fill="#333333">
                                                                                                                                    </path>
                                                                                                                                    <path
                                                                                                                                        d="M9.54314 5.43202C9.05825 5.56106 8.62029 5.93645 8.39349 6.41352L8.26836 6.67942L8.25663 11.3992C8.25272 14.07 8.23316 16.1229 8.21361 16.1229C8.19406 16.1229 8.03374 15.9626 7.85386 15.7632C7.2282 15.0789 6.84499 14.8873 6.14503 14.9186C5.81656 14.9303 5.73053 14.9498 5.49982 15.0632C4.48704 15.552 4.17812 16.862 4.87807 17.7184C4.97583 17.8435 5.97689 18.9189 7.09525 20.1115C9.18338 22.3326 9.35544 22.4968 9.85988 22.7315C10.4191 22.9934 10.2978 22.9817 13.3284 22.9974C15.6237 23.0052 16.1321 22.9974 16.3863 22.9504C16.9885 22.837 17.4577 22.5868 17.9113 22.1449C18.4157 21.6483 18.6895 21.0656 18.7716 20.3188C18.7951 20.0685 18.8068 18.8328 18.799 16.7877L18.7833 13.6399L18.6973 13.4052C18.5096 12.9047 18.1303 12.5176 17.6415 12.326C17.3404 12.2087 16.7734 12.1969 16.4645 12.3064C16.2572 12.3768 16.2494 12.3768 16.2025 12.3064C15.9209 11.8998 15.6785 11.6925 15.2914 11.54C14.9942 11.4266 14.4233 11.4188 14.1183 11.5244C13.911 11.5947 13.9032 11.5947 13.8563 11.5244C13.5747 11.1177 13.3284 10.9104 12.9451 10.7618C12.7105 10.668 12.1983 10.6406 11.9167 10.6993L11.7681 10.7306V8.87313C11.7681 7.67265 11.7525 6.94142 11.7251 6.80846C11.5179 5.81132 10.5051 5.17393 9.54314 5.43202ZM10.3135 6.64814C10.3682 6.69115 10.4503 6.77327 10.4934 6.83193C10.5755 6.93751 10.5755 6.97661 10.595 10.668C10.6146 14.3633 10.6146 14.3985 10.6967 14.508C10.8727 14.7504 11.2246 14.8247 11.4553 14.6644C11.7486 14.4649 11.7447 14.4806 11.7681 13.2684C11.7877 12.2439 11.7916 12.1735 11.8698 12.0679C12.124 11.7238 12.6206 11.759 12.8435 12.1383C12.9139 12.2595 12.9217 12.3612 12.9412 13.3349C12.9608 14.332 12.9647 14.4024 13.0429 14.508C13.2971 14.8521 13.7937 14.8169 14.0166 14.4376C14.0831 14.3242 14.0987 14.2108 14.1143 13.632C14.13 13.0338 14.1417 12.9477 14.216 12.85C14.4702 12.5059 14.9668 12.5411 15.1897 12.9204C15.2562 13.0338 15.2718 13.1472 15.2875 13.7259C15.3031 14.3242 15.3148 14.4102 15.3891 14.508C15.5103 14.6722 15.7059 14.7621 15.9092 14.7426C16.2416 14.7074 16.4136 14.4845 16.4567 14.0309C16.4762 13.8315 16.5075 13.7024 16.5622 13.632C16.8164 13.2879 17.313 13.3231 17.5359 13.7024C17.6141 13.8315 17.6141 13.9058 17.6141 17.1005C17.6141 20.1975 17.6102 20.3774 17.5398 20.5808C17.3248 21.2103 16.8281 21.6639 16.2103 21.793C16.0695 21.8203 15.1662 21.8321 13.3479 21.8242C10.6928 21.8125 10.6928 21.8125 10.4738 21.7226C10.3526 21.6757 10.1727 21.5779 10.0749 21.5075C9.8325 21.3355 5.7931 17.038 5.72271 16.8776C5.60931 16.6156 5.69143 16.3419 5.9456 16.1542C6.059 16.0682 6.32882 16.0486 6.49305 16.1151C6.5478 16.1386 7.00531 16.5844 7.50584 17.1084C8.01027 17.6284 8.46388 18.0899 8.51862 18.125C8.65939 18.2228 8.97613 18.2189 9.13646 18.1172C9.20684 18.0781 9.29287 17.9843 9.33198 17.9139C9.39845 17.7927 9.40236 17.4877 9.42191 12.3416C9.44147 6.91404 9.44147 6.8984 9.52358 6.78891C9.70346 6.54256 10.0828 6.47608 10.3135 6.64814Z"
                                                                                                                                        fill="#333333">
                                                                                                                                    </path>
                                                                                                                                </svg>
                                                                                                                            </div>
                                                                                                                            <p data-id="1-1"
                                                                                                                                class="mr-2 font-normal me-body-18 text-darkgray underline  cancer-markers-label-1-receipientData{{$group->id}}{{$recipient->id}} ">
                                                                                                                                {{langbind($group,'name')}} (<span
                                                                                                                                    class="selected-cancermarkers-count-1-receipientData111">{{$group->itemDatas($group->id,$recipient->id,$recipient->product->id)->sum('equivalent_number')}}</span>
                                                                                                                                    @lang('labels.check_out.selected'))</span>
                                                                                                                            </p>
                                                                                                                            <div
                                                                                                                                class="showDropdown-btn active" data-id={{$group->id.$recipient->id}}>
                                                                                                                                <svg xmlns="http://www.w3.org/2000/svg')}}"
                                                                                                                                    width="12"
                                                                                                                                    height="7"
                                                                                                                                    viewBox="0 0 12 7"
                                                                                                                                    fill="none">
                                                                                                                                    <path
                                                                                                                                        d="M0.042841 6.46313C0.14831 6.69047 0.413154 6.7936 0.649873 6.6975C0.713154 6.67172 1.46315 5.93344 3.36628 4.02094L5.99831 1.37719L8.628 4.02094C10.5358 5.93579 11.2835 6.67172 11.3467 6.6975C11.396 6.71625 11.478 6.73266 11.5296 6.73266C11.8671 6.73266 12.0944 6.39047 11.9538 6.08813C11.8905 5.95454 6.32878 0.367034 6.19753 0.308441C6.078 0.252191 5.91862 0.252191 5.79909 0.308441C5.66784 0.367034 0.106123 5.95453 0.042841 6.08813C-0.0134086 6.20766 -0.0134086 6.3436 0.042841 6.46313Z"
                                                                                                                                        fill="#333333">
                                                                                                                                    </path>
                                                                                                                                </svg>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div data-parentid="{{$itemDetails->recipient_id}}"
                                                                                                                            data-id="receipientData{{$group->id}}{{$recipient->id}}"
                                                                                                                            class="cancer-markers-edit-btn ">
                                                                                                                            <p
                                                                                                                                class="cursor-pointer font-normal me-body-16 text-darkgray underline hover:text-orangeMediq">
                                                                                                                                @lang('labels.check_out.edit')
                                                                                                                            </p>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="hidden detail-data-list1-receipientData111">
                                                                                                                    <div component-name="me-checkout-merchant-recipient-cancerMarkers-detail-list"
                                                                                                                        class="pl-8 mt-1">
                                                                                                                        <ul class="custom-list-style bg-far px-5 py-[10px] rounded-[12px] cancerMarkers-detail-data1-receipientData111">
                                                                                                                            @if(count($group->itemDatas($group->id,$recipient->id,$recipient->product->id)) > 0)
                                                                                                                                @foreach($group->itemDatas($group->id,$recipient->id,$recipient->product->id) as $item)
                                                                                                                                <li class="flex items-center mt-2">
                                                                                                                                    <span class="mr-4 font-normal me-body-18 text-darkgray">{{langbind($item,'name')}}</span>
                                                                                                                                </li>
                                                                                                                                @endforeach
                                                                                                                            @else 
                                                                                                                            <li class="flex items-center mt-2">
                                                                                                                                <span class="mr-4 font-normal me-body-18 text-darkgray">@lang('labels.product_detail.decide_later')</span>
                                                                                                                            </li>
                                                                                                                            @endif
                                                                                                                        </ul>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        @endforeach
                                                                                                        @endif
                                                                                                    </div>
                                                                                                </div>

                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    @if(count($recipient->group_data) > 0)
                                                                    @foreach($recipient->group_data as $group)
                                                                    @php
                                                                    $checkUpTable = $recipient->product->package->checkupTable; 
                                                                    $tablePriIds = App\Models\CheckUpTableType::where('check_up_type_id',2)->where('check_up_table_id',$checkUpTable->id)->pluck('id')->toArray();
                                                                    $optionGroupIds= App\Models\CheckTableItem::where('check_up_group_id',$group->id)->whereIn('check_up_table_type_id',$tablePriIds)->distinct()->pluck('check_up_item_id')->toArray();
                                                                    $recItems = [];
                                                                    $tableItem = [];
                                                                    $tableItemIds = [];
                                                                    if(count($recipient->recipient_items) > 0 ){
                                                                    $titems = App\Models\CheckTableItem::where('check_up_group_id',$group->id)
                                                                    ->whereIn('check_up_table_type_id',$tablePriIds)->distinct()->pluck('check_up_item_id')->toArray();
                                                                    $recItems =
                                                                    $recipient->recipient_items()->whereIn('check_up_item_id',$titems)->pluck('check_up_item_id')->toArray();
                                                                    $tableItem = App\Models\CheckUpItem::whereIn('id',$recItems)->pluck('name_en')->toArray();
                                                                    $tableItemIds = App\Models\CheckUpItem::whereIn('id',$recItems)->pluck('id')->toArray();
                                                                    }
                                                                    $tableItems = implode(',',$tableItem);
                                                                    $recItem = implode(',',$tableItemIds);

                                                                    $countEquivalentNumber =  App\Models\CheckUpItem::whereIn('id',$optionGroupIds)->sum('equivalent_number');
                                                                    $decideLater = App\Models\OptionDecideLater::where('recipient_id',$recipient->id)->where('group_id',$group->id)->first();
                                                                    @endphp
                                                                    <div id="me-checkout-cancer-markers-popup"
                                                                        class="hidden me-checkout-cancer-markers-popup me-checkout-cancer-markers-popup-receipientData{{$group->id.$recipient->id}}">
                                                                        <div
                                                                            class="me-checkout-cancer-markers-popup-content px-5 lg:py-10 py-5 rounded-[12px] xl:min-w-[1060px] max-w-[1060px] min-w-[90%] overflow-y-auto">
                                                                            <div class="relative w-full">
                                                                                <div
                                                                                    class="flex justify-between items-center pb-3 bg-whitez">
                                                                                    <div data-parentid="{{$itemDetails->recipient_id}}" data-id="{{$group->id.$recipient->id}}"
                                                                                        class="popup-back-btn">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg')}}"
                                                                                            width="10" height="17"
                                                                                            viewBox="0 0 10 17"
                                                                                            fill="none">
                                                                                            <path
                                                                                                d="M8.94823 16.9181C9.25136 16.7775 9.38886 16.4244 9.26073 16.1088C9.22636 16.0244 8.24198 15.0244 5.69198 12.4869L2.16698 8.97751L5.69198 5.47126C8.24511 2.92751 9.22636 1.93064 9.26073 1.84626C9.28573 1.78064 9.30761 1.67126 9.30761 1.60251C9.30761 1.15251 8.85136 0.849388 8.44823 1.03689C8.27011 1.12126 0.820108 8.53689 0.741983 8.71189C0.666983 8.87126 0.666983 9.08376 0.741983 9.24314C0.820108 9.41814 8.27011 16.8338 8.44823 16.9181C8.60761 16.9931 8.78886 16.9931 8.94823 16.9181Z"
                                                                                                fill="#333333"></path>
                                                                                        </svg>
                                                                                    </div>
                                                                                    <button data-parentid="{{$itemDetails->recipient_id}}" data-id="receipientData{{$group->id.$recipient->id}}"
                                                                                        data-items="{{$recItem}}" data-optional_decide_later="{{isset($decideLater) && $decideLater->is_decide_later == true ? 1 : 0}}"
                                                                                        class="z-[1] absolute top-0 right-0 focus-visible:outline-none focus:outline-none p-1"
                                                                                        id="me-checkout-cancer-markers-popup-close-btn"><img
                                                                                            class=" w-auto h-auto align-middle"
                                                                                            src="{{ asset('frontend/img/custom-close.svg') }}"
                                                                                            alt="">
                                                                                    </button>
                                                                                </div>
                                                                                <button data-parentid="{{$itemDetails->recipient_id}}" data-id="receipientData{{$group->id.$recipient->id}}"
                                                                                    data-items="{{$recItem}}" data-optional_decide_later="{{isset($decideLater) && $decideLater->is_decide_later == true ? 1 : 0}}"
                                                                                    class="hidden z-[1] absolute top-0 right-0 focus-visible:outline-none focus:outline-none p-1"
                                                                                    id="me-checkout-cancer-markers-popup-close-btn"><img
                                                                                        class=" w-auto h-auto align-middle"
                                                                                        src="{{ asset('frontend/img/close-btn.png') }}"
                                                                                        alt=""></button>
                                                                                <input type="hidden"
                                                                                    class="cancer-markers-selected-id">
                                                                                <div>
                                                                                    <div class="flex flex-wrap items-center">
                                                                                         <h3 class="font-bold me-body-20 text-darkgray text-left">
                                                                                            @lang('labels.check_out.select_free') {{langbind($group,'name')}}</h3>
                                                                                        <span class="me-body18 font-normal text-darkgray text-left">(<span
                                                                                                class="cancer-markers-selected-value-receipientData{{$group->id}}{{$recipient->id}}"></span>
                                                                                                @lang('labels.check_out.selected'))</span>
                                                                                    </div>
                                                                                    <div class="mr-6 flex items-center mt-4 ">
                                                                                        <p
                                                                                            class="font-normal me-body-16 text-darkgray">
                                                                                            @lang('labels.check_out.how_to_choose') {{langbind($group,'name')}}?</p>
                                                                                            <button type="button" role="button" class="plan-tooltip-btn">
                                                                                                <img src="{{ asset('frontend/img/info-circle.png') }}" alt="info icon" class="w-auto h-auto align-middle">
                                                                                                <div class="plan-tooltip">
                                                                                                    <p class="me-body16">
                                                                                                        {{__('labels.basic_info.please_select')}} {{$group->minimum_item}} {{__('labels.check_out.items')}}
                                                                                                    </p>
                                                                                                </div>
                                                                                            </button>
                                                                                    </div>
                                                                                    <div class="mt-3">
                                                                                        <input type="hidden" value="{{$group->minimum_item}}"
                                                                                        class="cancer-markers-min-selected-receipientData{{$group->id}}{{$recipient->id}}" />
                                                                                        {{-- <ul class="flex flex-wrap">
                                                                                            <li data-total="7" data-count="2"
                                                                                                data-value="0"
                                                                                                data-text="Liver (AFP)1111"
                                                                                                class="me-body-16 flex items-center markers-tags cursor-pointer hover:border-orangeMediq hover:text-orangeMediq mr-[10px] mb-[10px] px-4 py-[10px] border-1 border-darkgray rounded-[4px] me-body-16 font-normal text-darkgray">
                                                                                                Liver1111 (AFP)
                                                                                                <div class="ml-1 hidden">
                                                                                                    <svg xmlns="http://www.w3.org/2000/svg')}}"
                                                                                                        width="20"
                                                                                                        height="20"
                                                                                                        viewBox="0 0 20 20"
                                                                                                        fill="none">
                                                                                                        <path
                                                                                                            d="M16.25 7.49992C16.25 6.29044 15.899 5.10695 15.2397 4.09297C14.5804 3.07899 13.641 2.2781 12.5356 1.78743C11.4301 1.29676 10.206 1.13738 9.0117 1.32864C7.81743 1.51989 6.70432 2.05355 5.80734 2.86491C4.91037 3.67626 4.26808 4.73044 3.95838 5.8996C3.64867 7.06875 3.68485 8.30266 4.06253 9.45166C4.44021 10.6007 5.14316 11.6154 6.08613 12.3728C7.0291 13.1302 8.17158 13.5977 9.375 13.7187V15.6249H6.875C6.70924 15.6249 6.55027 15.6908 6.43306 15.808C6.31585 15.9252 6.25 16.0842 6.25 16.2499C6.25 16.4157 6.31585 16.5747 6.43306 16.6919C6.55027 16.8091 6.70924 16.8749 6.875 16.8749H9.375V18.7499C9.375 18.9157 9.44085 19.0747 9.55806 19.1919C9.67527 19.3091 9.83424 19.3749 10 19.3749C10.1658 19.3749 10.3247 19.3091 10.4419 19.1919C10.5592 19.0747 10.625 18.9157 10.625 18.7499V16.8749H13.125C13.2908 16.8749 13.4497 16.8091 13.5669 16.6919C13.6842 16.5747 13.75 16.4157 13.75 16.2499C13.75 16.0842 13.6842 15.9252 13.5669 15.808C13.4497 15.6908 13.2908 15.6249 13.125 15.6249H10.625V13.7187C12.1659 13.5619 13.5939 12.8393 14.6329 11.6906C15.6719 10.5419 16.2481 9.04879 16.25 7.49992ZM5 7.49992C5 6.51102 5.29324 5.54432 5.84265 4.72207C6.39206 3.89983 7.17295 3.25897 8.08658 2.88053C9.00021 2.50209 10.0055 2.40307 10.9755 2.596C11.9454 2.78892 12.8363 3.26513 13.5355 3.96439C14.2348 4.66365 14.711 5.55457 14.9039 6.52447C15.0969 7.49438 14.9978 8.49971 14.6194 9.41334C14.241 10.327 13.6001 11.1079 12.7779 11.6573C11.9556 12.2067 10.9889 12.4999 10 12.4999C8.67436 12.4985 7.40343 11.9712 6.46607 11.0339C5.5287 10.0965 5.00145 8.82556 5 7.49992Z"
                                                                                                            fill="#FF87B2">
                                                                                                        </path>
                                                                                                    </svg>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li data-total="7" data-count="2"
                                                                                                data-value="1"
                                                                                                data-text="Colon (CEA)"
                                                                                                class="me-body-16 flex items-center markers-tags cursor-pointer hover:border-orangeMediq hover:text-orangeMediq mr-[10px] mb-[10px] px-4 py-[10px] border-1 border-darkgray rounded-[4px] me-body-16 font-normal text-darkgray">
                                                                                                Colon (CEA)
                                                                                                <div class="ml-1 hidden">
                                                                                                    <svg xmlns="http://www.w3.org/2000/svg')}}"
                                                                                                        width="20"
                                                                                                        height="20"
                                                                                                        viewBox="0 0 20 20"
                                                                                                        fill="none">
                                                                                                        <path
                                                                                                            d="M16.25 7.49992C16.25 6.29044 15.899 5.10695 15.2397 4.09297C14.5804 3.07899 13.641 2.2781 12.5356 1.78743C11.4301 1.29676 10.206 1.13738 9.0117 1.32864C7.81743 1.51989 6.70432 2.05355 5.80734 2.86491C4.91037 3.67626 4.26808 4.73044 3.95838 5.8996C3.64867 7.06875 3.68485 8.30266 4.06253 9.45166C4.44021 10.6007 5.14316 11.6154 6.08613 12.3728C7.0291 13.1302 8.17158 13.5977 9.375 13.7187V15.6249H6.875C6.70924 15.6249 6.55027 15.6908 6.43306 15.808C6.31585 15.9252 6.25 16.0842 6.25 16.2499C6.25 16.4157 6.31585 16.5747 6.43306 16.6919C6.55027 16.8091 6.70924 16.8749 6.875 16.8749H9.375V18.7499C9.375 18.9157 9.44085 19.0747 9.55806 19.1919C9.67527 19.3091 9.83424 19.3749 10 19.3749C10.1658 19.3749 10.3247 19.3091 10.4419 19.1919C10.5592 19.0747 10.625 18.9157 10.625 18.7499V16.8749H13.125C13.2908 16.8749 13.4497 16.8091 13.5669 16.6919C13.6842 16.5747 13.75 16.4157 13.75 16.2499C13.75 16.0842 13.6842 15.9252 13.5669 15.808C13.4497 15.6908 13.2908 15.6249 13.125 15.6249H10.625V13.7187C12.1659 13.5619 13.5939 12.8393 14.6329 11.6906C15.6719 10.5419 16.2481 9.04879 16.25 7.49992ZM5 7.49992C5 6.51102 5.29324 5.54432 5.84265 4.72207C6.39206 3.89983 7.17295 3.25897 8.08658 2.88053C9.00021 2.50209 10.0055 2.40307 10.9755 2.596C11.9454 2.78892 12.8363 3.26513 13.5355 3.96439C14.2348 4.66365 14.711 5.55457 14.9039 6.52447C15.0969 7.49438 14.9978 8.49971 14.6194 9.41334C14.241 10.327 13.6001 11.1079 12.7779 11.6573C11.9556 12.2067 10.9889 12.4999 10 12.4999C8.67436 12.4985 7.40343 11.9712 6.46607 11.0339C5.5287 10.0965 5.00145 8.82556 5 7.49992Z"
                                                                                                            fill="#FF87B2">
                                                                                                        </path>
                                                                                                    </svg>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li data-total="7" data-count="2"
                                                                                                data-value="2"
                                                                                                data-text="Ovary (CA125) **Represents 2 items"
                                                                                                class="me-body-16 flex items-center markers-tags cursor-pointer hover:border-orangeMediq hover:text-orangeMediq mr-[10px] mb-[10px] px-4 py-[10px] border-1 border-darkgray rounded-[4px] me-body-16 font-normal text-darkgray">
                                                                                                Ovary (CA125) **Represents 2
                                                                                                items
                                                                                                <div class="ml-1 hidden">
                                                                                                    <svg xmlns="http://www.w3.org/2000/svg')}}"
                                                                                                        width="20"
                                                                                                        height="20"
                                                                                                        viewBox="0 0 20 20"
                                                                                                        fill="none">
                                                                                                        <path
                                                                                                            d="M16.25 7.49992C16.25 6.29044 15.899 5.10695 15.2397 4.09297C14.5804 3.07899 13.641 2.2781 12.5356 1.78743C11.4301 1.29676 10.206 1.13738 9.0117 1.32864C7.81743 1.51989 6.70432 2.05355 5.80734 2.86491C4.91037 3.67626 4.26808 4.73044 3.95838 5.8996C3.64867 7.06875 3.68485 8.30266 4.06253 9.45166C4.44021 10.6007 5.14316 11.6154 6.08613 12.3728C7.0291 13.1302 8.17158 13.5977 9.375 13.7187V15.6249H6.875C6.70924 15.6249 6.55027 15.6908 6.43306 15.808C6.31585 15.9252 6.25 16.0842 6.25 16.2499C6.25 16.4157 6.31585 16.5747 6.43306 16.6919C6.55027 16.8091 6.70924 16.8749 6.875 16.8749H9.375V18.7499C9.375 18.9157 9.44085 19.0747 9.55806 19.1919C9.67527 19.3091 9.83424 19.3749 10 19.3749C10.1658 19.3749 10.3247 19.3091 10.4419 19.1919C10.5592 19.0747 10.625 18.9157 10.625 18.7499V16.8749H13.125C13.2908 16.8749 13.4497 16.8091 13.5669 16.6919C13.6842 16.5747 13.75 16.4157 13.75 16.2499C13.75 16.0842 13.6842 15.9252 13.5669 15.808C13.4497 15.6908 13.2908 15.6249 13.125 15.6249H10.625V13.7187C12.1659 13.5619 13.5939 12.8393 14.6329 11.6906C15.6719 10.5419 16.2481 9.04879 16.25 7.49992ZM5 7.49992C5 6.51102 5.29324 5.54432 5.84265 4.72207C6.39206 3.89983 7.17295 3.25897 8.08658 2.88053C9.00021 2.50209 10.0055 2.40307 10.9755 2.596C11.9454 2.78892 12.8363 3.26513 13.5355 3.96439C14.2348 4.66365 14.711 5.55457 14.9039 6.52447C15.0969 7.49438 14.9978 8.49971 14.6194 9.41334C14.241 10.327 13.6001 11.1079 12.7779 11.6573C11.9556 12.2067 10.9889 12.4999 10 12.4999C8.67436 12.4985 7.40343 11.9712 6.46607 11.0339C5.5287 10.0965 5.00145 8.82556 5 7.49992Z"
                                                                                                            fill="#FF87B2">
                                                                                                        </path>
                                                                                                    </svg>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li data-total="7"
                                                                                                data-count="2"
                                                                                                data-value="3"
                                                                                                data-text="Prostate **Represents 2 items"
                                                                                                class="me-body-16 flex items-center markers-tags cursor-pointer hover:border-orangeMediq hover:text-orangeMediq mr-[10px] mb-[10px] px-4 py-[10px] border-1 border-darkgray rounded-[4px] me-body-16 font-normal text-darkgray">
                                                                                                Prostate **Represents 2 items
                                                                                                <div class="ml-1 hidden">
                                                                                                    <svg xmlns="http://www.w3.org/2000/svg')}}"
                                                                                                        width="20"
                                                                                                        height="20"
                                                                                                        viewBox="0 0 20 20"
                                                                                                        fill="none">
                                                                                                        <path
                                                                                                            d="M16.25 7.49992C16.25 6.29044 15.899 5.10695 15.2397 4.09297C14.5804 3.07899 13.641 2.2781 12.5356 1.78743C11.4301 1.29676 10.206 1.13738 9.0117 1.32864C7.81743 1.51989 6.70432 2.05355 5.80734 2.86491C4.91037 3.67626 4.26808 4.73044 3.95838 5.8996C3.64867 7.06875 3.68485 8.30266 4.06253 9.45166C4.44021 10.6007 5.14316 11.6154 6.08613 12.3728C7.0291 13.1302 8.17158 13.5977 9.375 13.7187V15.6249H6.875C6.70924 15.6249 6.55027 15.6908 6.43306 15.808C6.31585 15.9252 6.25 16.0842 6.25 16.2499C6.25 16.4157 6.31585 16.5747 6.43306 16.6919C6.55027 16.8091 6.70924 16.8749 6.875 16.8749H9.375V18.7499C9.375 18.9157 9.44085 19.0747 9.55806 19.1919C9.67527 19.3091 9.83424 19.3749 10 19.3749C10.1658 19.3749 10.3247 19.3091 10.4419 19.1919C10.5592 19.0747 10.625 18.9157 10.625 18.7499V16.8749H13.125C13.2908 16.8749 13.4497 16.8091 13.5669 16.6919C13.6842 16.5747 13.75 16.4157 13.75 16.2499C13.75 16.0842 13.6842 15.9252 13.5669 15.808C13.4497 15.6908 13.2908 15.6249 13.125 15.6249H10.625V13.7187C12.1659 13.5619 13.5939 12.8393 14.6329 11.6906C15.6719 10.5419 16.2481 9.04879 16.25 7.49992ZM5 7.49992C5 6.51102 5.29324 5.54432 5.84265 4.72207C6.39206 3.89983 7.17295 3.25897 8.08658 2.88053C9.00021 2.50209 10.0055 2.40307 10.9755 2.596C11.9454 2.78892 12.8363 3.26513 13.5355 3.96439C14.2348 4.66365 14.711 5.55457 14.9039 6.52447C15.0969 7.49438 14.9978 8.49971 14.6194 9.41334C14.241 10.327 13.6001 11.1079 12.7779 11.6573C11.9556 12.2067 10.9889 12.4999 10 12.4999C8.67436 12.4985 7.40343 11.9712 6.46607 11.0339C5.5287 10.0965 5.00145 8.82556 5 7.49992Z"
                                                                                                            fill="#FF87B2">
                                                                                                        </path>
                                                                                                    </svg>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li data-total="7"
                                                                                                data-count="2"
                                                                                                data-value="4"
                                                                                                data-text="Pancreas (CA199)"
                                                                                                class="me-body-16 flex items-center markers-tags cursor-pointer hover:border-orangeMediq hover:text-orangeMediq mr-[10px] mb-[10px] px-4 py-[10px] border-1 border-darkgray rounded-[4px] me-body-16 font-normal text-darkgray">
                                                                                                Pancreas (CA199)
                                                                                                <div class="ml-1 hidden">
                                                                                                    <svg xmlns="http://www.w3.org/2000/svg')}}"
                                                                                                        width="20"
                                                                                                        height="20"
                                                                                                        viewBox="0 0 20 20"
                                                                                                        fill="none">
                                                                                                        <path
                                                                                                            d="M16.25 7.49992C16.25 6.29044 15.899 5.10695 15.2397 4.09297C14.5804 3.07899 13.641 2.2781 12.5356 1.78743C11.4301 1.29676 10.206 1.13738 9.0117 1.32864C7.81743 1.51989 6.70432 2.05355 5.80734 2.86491C4.91037 3.67626 4.26808 4.73044 3.95838 5.8996C3.64867 7.06875 3.68485 8.30266 4.06253 9.45166C4.44021 10.6007 5.14316 11.6154 6.08613 12.3728C7.0291 13.1302 8.17158 13.5977 9.375 13.7187V15.6249H6.875C6.70924 15.6249 6.55027 15.6908 6.43306 15.808C6.31585 15.9252 6.25 16.0842 6.25 16.2499C6.25 16.4157 6.31585 16.5747 6.43306 16.6919C6.55027 16.8091 6.70924 16.8749 6.875 16.8749H9.375V18.7499C9.375 18.9157 9.44085 19.0747 9.55806 19.1919C9.67527 19.3091 9.83424 19.3749 10 19.3749C10.1658 19.3749 10.3247 19.3091 10.4419 19.1919C10.5592 19.0747 10.625 18.9157 10.625 18.7499V16.8749H13.125C13.2908 16.8749 13.4497 16.8091 13.5669 16.6919C13.6842 16.5747 13.75 16.4157 13.75 16.2499C13.75 16.0842 13.6842 15.9252 13.5669 15.808C13.4497 15.6908 13.2908 15.6249 13.125 15.6249H10.625V13.7187C12.1659 13.5619 13.5939 12.8393 14.6329 11.6906C15.6719 10.5419 16.2481 9.04879 16.25 7.49992ZM5 7.49992C5 6.51102 5.29324 5.54432 5.84265 4.72207C6.39206 3.89983 7.17295 3.25897 8.08658 2.88053C9.00021 2.50209 10.0055 2.40307 10.9755 2.596C11.9454 2.78892 12.8363 3.26513 13.5355 3.96439C14.2348 4.66365 14.711 5.55457 14.9039 6.52447C15.0969 7.49438 14.9978 8.49971 14.6194 9.41334C14.241 10.327 13.6001 11.1079 12.7779 11.6573C11.9556 12.2067 10.9889 12.4999 10 12.4999C8.67436 12.4985 7.40343 11.9712 6.46607 11.0339C5.5287 10.0965 5.00145 8.82556 5 7.49992Z"
                                                                                                            fill="#FF87B2">
                                                                                                        </path>
                                                                                                    </svg>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li data-total="7"
                                                                                                data-count="2"
                                                                                                data-value="5"
                                                                                                data-text="Breast (CA153)"
                                                                                                class="me-body-16 flex items-center markers-tags cursor-pointer hover:border-orangeMediq hover:text-orangeMediq mr-[10px] mb-[10px] px-4 py-[10px] border-1 border-darkgray rounded-[4px] me-body-16 font-normal text-darkgray">
                                                                                                Breast (CA153)
                                                                                                <div class="ml-1 ">
                                                                                                    <svg xmlns="http://www.w3.org/2000/svg')}}"
                                                                                                        width="20"
                                                                                                        height="20"
                                                                                                        viewBox="0 0 20 20"
                                                                                                        fill="none">
                                                                                                        <path
                                                                                                            d="M16.25 7.49992C16.25 6.29044 15.899 5.10695 15.2397 4.09297C14.5804 3.07899 13.641 2.2781 12.5356 1.78743C11.4301 1.29676 10.206 1.13738 9.0117 1.32864C7.81743 1.51989 6.70432 2.05355 5.80734 2.86491C4.91037 3.67626 4.26808 4.73044 3.95838 5.8996C3.64867 7.06875 3.68485 8.30266 4.06253 9.45166C4.44021 10.6007 5.14316 11.6154 6.08613 12.3728C7.0291 13.1302 8.17158 13.5977 9.375 13.7187V15.6249H6.875C6.70924 15.6249 6.55027 15.6908 6.43306 15.808C6.31585 15.9252 6.25 16.0842 6.25 16.2499C6.25 16.4157 6.31585 16.5747 6.43306 16.6919C6.55027 16.8091 6.70924 16.8749 6.875 16.8749H9.375V18.7499C9.375 18.9157 9.44085 19.0747 9.55806 19.1919C9.67527 19.3091 9.83424 19.3749 10 19.3749C10.1658 19.3749 10.3247 19.3091 10.4419 19.1919C10.5592 19.0747 10.625 18.9157 10.625 18.7499V16.8749H13.125C13.2908 16.8749 13.4497 16.8091 13.5669 16.6919C13.6842 16.5747 13.75 16.4157 13.75 16.2499C13.75 16.0842 13.6842 15.9252 13.5669 15.808C13.4497 15.6908 13.2908 15.6249 13.125 15.6249H10.625V13.7187C12.1659 13.5619 13.5939 12.8393 14.6329 11.6906C15.6719 10.5419 16.2481 9.04879 16.25 7.49992ZM5 7.49992C5 6.51102 5.29324 5.54432 5.84265 4.72207C6.39206 3.89983 7.17295 3.25897 8.08658 2.88053C9.00021 2.50209 10.0055 2.40307 10.9755 2.596C11.9454 2.78892 12.8363 3.26513 13.5355 3.96439C14.2348 4.66365 14.711 5.55457 14.9039 6.52447C15.0969 7.49438 14.9978 8.49971 14.6194 9.41334C14.241 10.327 13.6001 11.1079 12.7779 11.6573C11.9556 12.2067 10.9889 12.4999 10 12.4999C8.67436 12.4985 7.40343 11.9712 6.46607 11.0339C5.5287 10.0965 5.00145 8.82556 5 7.49992Z"
                                                                                                            fill="#FF87B2">
                                                                                                        </path>
                                                                                                    </svg>
                                                                                                </div>
                                                                                            </li>

                                                                                        </ul> --}}
                                                                                        <ul class="flex flex-wrap">
                                                                                        @if(count($optionGroupIds) > 0)
                                                                                        @foreach($optionGroupIds as $titem)
                                                                                        @php
                                                                                        $tableItem = App\Models\CheckUpItem::where('id',$titem)->first();
                                                                                        @endphp
                                                                                            <li data-total="{{$countEquivalentNumber}}"
                                                                                                data-count="{{$tableItem->equivalent_number == null ? 1 : $tableItem->equivalent_number }}"
                                                                                                data-text="{{langbind($tableItem,'name')}}" data-value="{{$tableItem->id}}"
                                                                                                class="me-body-16 flex items-center markers-tags cursor-pointer hover:border-orangeMediq hover:text-orangeMediq mr-[10px] mb-[10px] px-4 py-[10px] border-1 border-darkgray rounded-[4px] me-body-16 font-normal text-darkgray">
                                                                                                {{langbind($tableItem,'name')}}
                                                                                                <div class="ml-1 hidden">
                                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                                                                                        fill="none">
                                                                                                        <path
                                                                                                            d="M16.25 7.49992C16.25 6.29044 15.899 5.10695 15.2397 4.09297C14.5804 3.07899 13.641 2.2781 12.5356 1.78743C11.4301 1.29676 10.206 1.13738 9.0117 1.32864C7.81743 1.51989 6.70432 2.05355 5.80734 2.86491C4.91037 3.67626 4.26808 4.73044 3.95838 5.8996C3.64867 7.06875 3.68485 8.30266 4.06253 9.45166C4.44021 10.6007 5.14316 11.6154 6.08613 12.3728C7.0291 13.1302 8.17158 13.5977 9.375 13.7187V15.6249H6.875C6.70924 15.6249 6.55027 15.6908 6.43306 15.808C6.31585 15.9252 6.25 16.0842 6.25 16.2499C6.25 16.4157 6.31585 16.5747 6.43306 16.6919C6.55027 16.8091 6.70924 16.8749 6.875 16.8749H9.375V18.7499C9.375 18.9157 9.44085 19.0747 9.55806 19.1919C9.67527 19.3091 9.83424 19.3749 10 19.3749C10.1658 19.3749 10.3247 19.3091 10.4419 19.1919C10.5592 19.0747 10.625 18.9157 10.625 18.7499V16.8749H13.125C13.2908 16.8749 13.4497 16.8091 13.5669 16.6919C13.6842 16.5747 13.75 16.4157 13.75 16.2499C13.75 16.0842 13.6842 15.9252 13.5669 15.808C13.4497 15.6908 13.2908 15.6249 13.125 15.6249H10.625V13.7187C12.1659 13.5619 13.5939 12.8393 14.6329 11.6906C15.6719 10.5419 16.2481 9.04879 16.25 7.49992ZM5 7.49992C5 6.51102 5.29324 5.54432 5.84265 4.72207C6.39206 3.89983 7.17295 3.25897 8.08658 2.88053C9.00021 2.50209 10.0055 2.40307 10.9755 2.596C11.9454 2.78892 12.8363 3.26513 13.5355 3.96439C14.2348 4.66365 14.711 5.55457 14.9039 6.52447C15.0969 7.49438 14.9978 8.49971 14.6194 9.41334C14.241 10.327 13.6001 11.1079 12.7779 11.6573C11.9556 12.2067 10.9889 12.4999 10 12.4999C8.67436 12.4985 7.40343 11.9712 6.46607 11.0339C5.5287 10.0965 5.00145 8.82556 5 7.49992Z"
                                                                                                            fill="#FF87B2" />
                                                                                                    </svg>
                                                                                                </div>
                                                                                            </li>
                                                                                        @endforeach
                                                                                        @endif
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                                @php 
                                                                                    $decideLater = App\Models\OptionDecideLater::where('recipient_id',$recipient->id)->where('group_id',$group->id)->first();
                                                                                    // \Log::debug($decideLater);
                                                                                    // \Log::debug("xxx22");
                                                                                @endphp
                                                                                <div class="flex xs:flex-row flex-col justify-between xs:items-center mt-3 lg:mt-5">
                                                                                    <div class="form-group me-body18 text-left">
                                                                                        <label for="cancer-markers-decideLater-receipientData{{$group->id}}{{$recipient->id}}"
                                                                                            class="custom-radio-container inline-block relative">
                                                                                            <input type="checkbox" name="decide-laterreceipientData{{$group->id}}{{$recipient->id}}"
                                                                                                id="cancer-markers-decideLater-receipientData{{$group->id}}{{$recipient->id}}"
                                                                                                class="opacity-0 absolute" value="{{isset($decideLater) && $decideLater->is_decide_later == 1 ? true : false}}" >
                                                                                            <span class="custom-radio-orange"></span>
                                                                                            <span class="ml-[30px]">@lang('labels.product_detail.decide_later')</span>
                                                                                        </label>
                                                                                    </div>
                                                                                    <form action="" id="updateCheckUpItemForm{{$group->id}}{{$recipient->id}}">
                                                                                        <div class="hidden">
                                                                                            <input type="hidden" name="edit_status" value="1">
                                                                                            <input type="hidden" name="recipient_id" value="{{$recipient->id}}">
                                                                                            <input type="hidden" name="group_id" value="{{$group->id}}">
                                                                                            <input type="hidden" name="product_id" value="{{$recipient->product_id}}">
                                                                                            <input name="check_up_items-{{$group->id}}{{$recipient->id}}"
                                                                                                data-id="receipientData{{$group->id}}{{$recipient->id}}" type="hidden"
                                                                                                value="{{ $recItem }}"
                                                                                                class="cancerMarkers-selected-tags-ids cancerMarkers-selected-tags-ids-receipientData{{$group->id}}{{$recipient->id}}" />
                                                                                            <input data-id="receipientData{{$group->id}}{{$recipient->id}}" type="hidden"
                                                                                                value="{{ $tableItems }}"
                                                                                                class="cancerMarkers-selected-tags cancerMarkers-selected-tagsreceipientData{{$group->id}}{{$recipient->id}}" />
                                                                                           {{-- <input type="checkbox" name="decide_laterreceipientData{{$group->id}}{{$recipient->id}}"
                                                                                                id="cancer-markers-decideLaterreceipientData{{$group->id}}{{$recipient->id}}"
                                                                                                class="opacity-0 absolute"> --}}
                                                                                                <input name="check_up_items_decide_later_{{$group->id}}{{$recipient->id}}" data-text="" data-id="receipientData{{$group->id}}{{$recipient->id}}" type="hidden" value="true"
                                                                                                class="cancerMarkers-decidelater cancerMarkers-decidelater-receipientData{{$group->id}}{{$recipient->id}}"/>
                                                                                        </div>
                                                                                        {{-- <p data-text="" class="cancer-markers-required-message-receipientData{{$group->id}}{{$recipient->id}}"></p> --}}
                                                                                        <button type="button" role="button" onclick="submitItem({{$group->id}},{{$recipient->id}})"
                                                                                            data-id="receipientData{{$group->id}}{{$recipient->id}}"
                                                                                            class="me-body-18 xs:mt-0 mt-2 checkout-cancer-markers-confirm text-light bg-orangeMediq rounded-md font-bold py-2 px-10 sm:py-[10px] max-w-[300px] xl:px-0 xl:w-[300px] hover:bg-brightOrangeMediq transition-colors duration-300">
                                                                                            @lang('labels.log_in_register.confirm')
                                                                                        </button>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @endforeach
                                                                    @endif
                                                                    <div id="me-checkout-addson-popup"
                                                                        class="hidden me-checkout-addson-popup me-checkout-addson-popup-1">
                                                                        <div
                                                                            class="me-checkout-addson-popup-content px-5 lg:py-10 py-5 rounded-[12px] xl:min-w-[1060px] max-w-[1060px] min-w-[90%] max-h-[80%] overflow-y-auto">
                                                                            <div class="relative w-full">
                                                                                <div
                                                                                    class="flex justify-between items-center pb-3 bg-whitez">
                                                                                    <div data-id="1"
                                                                                        class="popup-back-btn">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg')}}"
                                                                                            width="10" height="17"
                                                                                            viewBox="0 0 10 17"
                                                                                            fill="none">
                                                                                            <path
                                                                                                d="M8.94823 16.9181C9.25136 16.7775 9.38886 16.4244 9.26073 16.1088C9.22636 16.0244 8.24198 15.0244 5.69198 12.4869L2.16698 8.97751L5.69198 5.47126C8.24511 2.92751 9.22636 1.93064 9.26073 1.84626C9.28573 1.78064 9.30761 1.67126 9.30761 1.60251C9.30761 1.15251 8.85136 0.849388 8.44823 1.03689C8.27011 1.12126 0.820108 8.53689 0.741983 8.71189C0.666983 8.87126 0.666983 9.08376 0.741983 9.24314C0.820108 9.41814 8.27011 16.8338 8.44823 16.9181C8.60761 16.9931 8.78886 16.9931 8.94823 16.9181Z"
                                                                                                fill="#333333"></path>
                                                                                        </svg>
                                                                                    </div>
                                                                                    <button data-id="1"
                                                                                        class="focus-visible:outline-none focus:outline-none p-1"
                                                                                        id="me-checkout-addson-popup-close-btn"><img
                                                                                            class=" w-auto h-auto align-middle"
                                                                                            src="{{ asset('frontend/img/close-btn.png') }}"
                                                                                            alt=""></button>
                                                                                </div>
                                                                                <button data-id="1"
                                                                                    class="z-[1] absolute top-0 right-0 focus-visible:outline-none focus:outline-none p-1"
                                                                                    id="me-checkout-addson-popup-close-btn"><img
                                                                                        class=" w-auto h-auto align-middle"
                                                                                        src="{{ asset('frontend/img/close-btn.png') }}"
                                                                                        alt=""></button>
                                                                                <input type="hidden" class="addson-selected-id">
                                                                                <div>
                                                                                    <div class="flex items-center">
                                                                                        <h3
                                                                                            class="font-bold me-body-20 text-darkgray">
                                                                                            @lang('labels.product_detail.select_addon')</h3>
                                                                                    </div>
                                                                                    <div class="mr-6 flex items-center">
                                                                                        <p
                                                                                            class="mt-4 font-normal me-body-16 text-darkgray text-left">
                                                                                            If the fatal ultrasound report is
                                                                                            not
                                                                                            provided, it
                                                                                            is necessary to purchase the [Fetal
                                                                                            Ultrasound (no report) + $600] item,
                                                                                            and cooperate with the
                                                                                            ultrasound technician on duty on the
                                                                                            day for inspection.</p>
                                                                                    </div>
                                                                                    <div class="mt-3">
                                                                                        <ul class="px-5 py-5 bg-far">
                                                                                            <input type="hidden"
                                                                                                value="2"
                                                                                                class="adds-on-min-selected-1">
                                                                                            <input
                                                                                                class="hidden adds-on-total-count-1"
                                                                                                value="4">
                                                                                            <li data-value="0"
                                                                                                data-discount="$1,300"
                                                                                                data-price="+$1,170"
                                                                                                data-text="Mammogram (Only for female age 40 or above)"
                                                                                                class="flex items-start justify-between mb-1 last:mb-0 lg:mb-2 lg:last:mb-0">
                                                                                                <div class="flex items-start">
                                                                                                    <label
                                                                                                        for="addson-checklist-1-0"
                                                                                                        class="flex-wrap custom-checkbox-label flex items-start mr-1 last:mr-0 lg:mr-2 lg:last:mr-0">
                                                                                                        <input type="checkbox"
                                                                                                            name="addson-checklist-1"
                                                                                                            id="addson-checklist-1-0"
                                                                                                            value=""
                                                                                                            class="mt-[2px]">
                                                                                                        <span
                                                                                                            class="custom-checkbox-orange mt-[2px]"></span>
                                                                                                        <span
                                                                                                            class="me-body-18 text-left ml-6 4xl:ml-[30px] flex items-center flex-wrap font-normal mr-2 leading-[normal]">
                                                                                                            Mammogram (Only for
                                                                                                            female age 40 or
                                                                                                            above)
                                                                                                        </span>
                                                                                                        <span
                                                                                                            class="line-through mr-3 me-body-16">$1,300</span>
                                                                                                        <span
                                                                                                            class="text-orangeMediq bg-orangeLight px-2 font-bold text-left"></span>
                                                                                                    </label>
                                                                                                    <div class="ml-1 hidden">
                                                                                                        <svg xmlns="http://www.w3.org/2000/svg')}}"
                                                                                                            width="16"
                                                                                                            height="19"
                                                                                                            viewBox="0 0 16 19"
                                                                                                            fill="none">
                                                                                                            <g
                                                                                                                clip-path="url(#clip0_5330_58533)">
                                                                                                                <path
                                                                                                                    d="M-4 8.00016H-1C-0.734784 8.00016 -0.48043 8.10551 -0.292893 8.29305C-0.105357 8.48059 0 8.73494 0 9.00016V13.5002V18.0002C0 18.2654 -0.105357 18.5197 -0.292893 18.7073C-0.48043 18.8948 -0.734784 19.0002 -1 19.0002H-4C-4.26522 19.0002 -4.51957 18.8948 -4.70711 18.7073C-4.89464 18.5197 -5 18.2654 -5 18.0002V9.00016C-5 8.73494 -4.89464 8.48059 -4.70711 8.29305C-4.51957 8.10551 -4.26522 8.00016 -4 8.00016ZM-4 9.00016V18.0002H-1V9.00016H-4ZM11.72 17.0302L14.72 12.0302C14.9 11.7302 15 11.3702 15 11.0002V10.0002C15 9.46972 14.7893 8.96102 14.4142 8.58594C14.0391 8.21087 13.5304 8.00016 13 8.00016H7.39L8.85 2.56016V2.54016C8.89735 2.37157 8.89818 2.19332 8.8524 2.0243C8.80663 1.85528 8.71595 1.7018 8.59 1.58016L2.59 7.59016C2.22 7.95016 2 8.45016 2 9.00016V16.0002C2 16.5306 2.21071 17.0393 2.58579 17.4144C2.96086 17.7894 3.46957 18.0002 4 18.0002H10C10.73 18.0002 11.37 17.6102 11.72 17.0302ZM16 11.0002C16 11.5902 15.83 12.1502 15.53 12.6102L12.62 17.4502C12.11 18.3802 11.13 19.0002 10 19.0002H4C3.20435 19.0002 2.44129 18.6841 1.87868 18.1215C1.31607 17.5589 1 16.7958 1 16.0002V9.00016C1 8.17016 1.34 7.42016 1.88 6.88016L8.59 0.160156L9.3 0.870156C9.83 1.40016 10 2.16016 9.81 2.84016L8.69 7.00016H13C13.7956 7.00016 14.5587 7.31623 15.1213 7.87884C15.6839 8.44144 16 9.20451 16 10.0002V11.0002Z"
                                                                                                                    fill="#FF8201">
                                                                                                                </path>
                                                                                                                <path
                                                                                                                    d="M11.72 17.0302L14.72 12.0302C14.9 11.7302 15 11.3702 15 11.0002V10.0002C15 9.46972 14.7893 8.96102 14.4142 8.58594C14.0391 8.21087 13.5304 8.00016 13 8.00016H7.39L8.85 2.56016V2.54016C8.89735 2.37157 8.89818 2.19332 8.8524 2.0243C8.80663 1.85528 8.71595 1.7018 8.59 1.58016L2.59 7.59016C2.22 7.95016 2 8.45016 2 9.00016V16.0002C2 16.5306 2.21071 17.0393 2.58579 17.4144C2.96086 17.7894 3.46957 18.0002 4 18.0002H10C10.73 18.0002 11.37 17.6102 11.72 17.0302Z"
                                                                                                                    fill="#FF8201">
                                                                                                                </path>
                                                                                                            </g>
                                                                                                            <defs>
                                                                                                                <clipPath
                                                                                                                    id="clip0_5330_58533">
                                                                                                                    <rect
                                                                                                                        width="16"
                                                                                                                        height="19"
                                                                                                                        fill="white">
                                                                                                                    </rect>
                                                                                                                </clipPath>
                                                                                                            </defs>
                                                                                                        </svg>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <span
                                                                                                    class="service-price text-orangeMediq font-bold me-body-18">+$1,170</span>
                                                                                            </li>
                                                                                            <li data-value="1"
                                                                                                data-discount="$1,800"
                                                                                                data-price="+$1,620"
                                                                                                data-text="Upper Abdomen Ultrasound"
                                                                                                class="flex items-start justify-between mb-1 last:mb-0 lg:mb-2 lg:last:mb-0">
                                                                                                <div class="flex items-start">
                                                                                                    <label
                                                                                                        for="addson-checklist-1-1"
                                                                                                        class="flex-wrap custom-checkbox-label flex items-start mr-1 last:mr-0 lg:mr-2 lg:last:mr-0">
                                                                                                        <input type="checkbox"
                                                                                                            name="addson-checklist-1"
                                                                                                            id="addson-checklist-1-1"
                                                                                                            value=""
                                                                                                            class="mt-[2px]">
                                                                                                        <span
                                                                                                            class="custom-checkbox-orange mt-[2px]"></span>
                                                                                                        <span
                                                                                                            class="me-body-18 text-left ml-6 4xl:ml-[30px] flex items-center flex-wrap font-normal mr-2 leading-[normal]">
                                                                                                            <span
                                                                                                                class="font-bold">Upper
                                                                                                                Abdomen
                                                                                                                Ultrasound</span>
                                                                                                        </span>
                                                                                                        <span
                                                                                                            class="line-through mr-3 me-body-16">$1,800</span>
                                                                                                        <span
                                                                                                            class="text-orangeMediq bg-orangeLight px-2 font-bold text-left">最受歡迎</span>
                                                                                                    </label>
                                                                                                    <div class="ml-1 ">
                                                                                                        <svg xmlns="http://www.w3.org/2000/svg')}}"
                                                                                                            width="16"
                                                                                                            height="19"
                                                                                                            viewBox="0 0 16 19"
                                                                                                            fill="none">
                                                                                                            <g
                                                                                                                clip-path="url(#clip0_5330_58533)">
                                                                                                                <path
                                                                                                                    d="M-4 8.00016H-1C-0.734784 8.00016 -0.48043 8.10551 -0.292893 8.29305C-0.105357 8.48059 0 8.73494 0 9.00016V13.5002V18.0002C0 18.2654 -0.105357 18.5197 -0.292893 18.7073C-0.48043 18.8948 -0.734784 19.0002 -1 19.0002H-4C-4.26522 19.0002 -4.51957 18.8948 -4.70711 18.7073C-4.89464 18.5197 -5 18.2654 -5 18.0002V9.00016C-5 8.73494 -4.89464 8.48059 -4.70711 8.29305C-4.51957 8.10551 -4.26522 8.00016 -4 8.00016ZM-4 9.00016V18.0002H-1V9.00016H-4ZM11.72 17.0302L14.72 12.0302C14.9 11.7302 15 11.3702 15 11.0002V10.0002C15 9.46972 14.7893 8.96102 14.4142 8.58594C14.0391 8.21087 13.5304 8.00016 13 8.00016H7.39L8.85 2.56016V2.54016C8.89735 2.37157 8.89818 2.19332 8.8524 2.0243C8.80663 1.85528 8.71595 1.7018 8.59 1.58016L2.59 7.59016C2.22 7.95016 2 8.45016 2 9.00016V16.0002C2 16.5306 2.21071 17.0393 2.58579 17.4144C2.96086 17.7894 3.46957 18.0002 4 18.0002H10C10.73 18.0002 11.37 17.6102 11.72 17.0302ZM16 11.0002C16 11.5902 15.83 12.1502 15.53 12.6102L12.62 17.4502C12.11 18.3802 11.13 19.0002 10 19.0002H4C3.20435 19.0002 2.44129 18.6841 1.87868 18.1215C1.31607 17.5589 1 16.7958 1 16.0002V9.00016C1 8.17016 1.34 7.42016 1.88 6.88016L8.59 0.160156L9.3 0.870156C9.83 1.40016 10 2.16016 9.81 2.84016L8.69 7.00016H13C13.7956 7.00016 14.5587 7.31623 15.1213 7.87884C15.6839 8.44144 16 9.20451 16 10.0002V11.0002Z"
                                                                                                                    fill="#FF8201">
                                                                                                                </path>
                                                                                                                <path
                                                                                                                    d="M11.72 17.0302L14.72 12.0302C14.9 11.7302 15 11.3702 15 11.0002V10.0002C15 9.46972 14.7893 8.96102 14.4142 8.58594C14.0391 8.21087 13.5304 8.00016 13 8.00016H7.39L8.85 2.56016V2.54016C8.89735 2.37157 8.89818 2.19332 8.8524 2.0243C8.80663 1.85528 8.71595 1.7018 8.59 1.58016L2.59 7.59016C2.22 7.95016 2 8.45016 2 9.00016V16.0002C2 16.5306 2.21071 17.0393 2.58579 17.4144C2.96086 17.7894 3.46957 18.0002 4 18.0002H10C10.73 18.0002 11.37 17.6102 11.72 17.0302Z"
                                                                                                                    fill="#FF8201">
                                                                                                                </path>
                                                                                                            </g>
                                                                                                            <defs>
                                                                                                                <clipPath
                                                                                                                    id="clip0_5330_58533">
                                                                                                                    <rect
                                                                                                                        width="16"
                                                                                                                        height="19"
                                                                                                                        fill="white">
                                                                                                                    </rect>
                                                                                                                </clipPath>
                                                                                                            </defs>
                                                                                                        </svg>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <span
                                                                                                    class="service-price text-orangeMediq font-bold me-body-18">+$1,620</span>
                                                                                            </li>
                                                                                            <li data-value="2"
                                                                                                data-discount="$2,400"
                                                                                                data-price="+$1,200"
                                                                                                data-text="Gastrointestinal Cancer Screening"
                                                                                                class="flex items-start justify-between mb-1 last:mb-0 lg:mb-2 lg:last:mb-0">
                                                                                                <div class="flex items-start">
                                                                                                    <label
                                                                                                        for="addson-checklist-1-2"
                                                                                                        class="flex-wrap custom-checkbox-label flex items-start mr-1 last:mr-0 lg:mr-2 lg:last:mr-0">
                                                                                                        <input type="checkbox"
                                                                                                            name="addson-checklist-1"
                                                                                                            id="addson-checklist-1-2"
                                                                                                            value=""
                                                                                                            class="mt-[2px]">
                                                                                                        <span
                                                                                                            class="custom-checkbox-orange mt-[2px]"></span>
                                                                                                        <span
                                                                                                            class="me-body-18 text-left ml-6 4xl:ml-[30px] flex items-center flex-wrap font-normal mr-2 leading-[normal]">
                                                                                                            Gastrointestinal
                                                                                                            Cancer Screening
                                                                                                        </span>
                                                                                                        <span
                                                                                                            class="line-through mr-3 me-body-16">$2,400</span>
                                                                                                        <span
                                                                                                            class="text-orangeMediq bg-orangeLight px-2 font-bold text-left"></span>
                                                                                                    </label>
                                                                                                    <div class="ml-1 hidden">
                                                                                                        <svg xmlns="http://www.w3.org/2000/svg')}}"
                                                                                                            width="16"
                                                                                                            height="19"
                                                                                                            viewBox="0 0 16 19"
                                                                                                            fill="none">
                                                                                                            <g
                                                                                                                clip-path="url(#clip0_5330_58533)">
                                                                                                                <path
                                                                                                                    d="M-4 8.00016H-1C-0.734784 8.00016 -0.48043 8.10551 -0.292893 8.29305C-0.105357 8.48059 0 8.73494 0 9.00016V13.5002V18.0002C0 18.2654 -0.105357 18.5197 -0.292893 18.7073C-0.48043 18.8948 -0.734784 19.0002 -1 19.0002H-4C-4.26522 19.0002 -4.51957 18.8948 -4.70711 18.7073C-4.89464 18.5197 -5 18.2654 -5 18.0002V9.00016C-5 8.73494 -4.89464 8.48059 -4.70711 8.29305C-4.51957 8.10551 -4.26522 8.00016 -4 8.00016ZM-4 9.00016V18.0002H-1V9.00016H-4ZM11.72 17.0302L14.72 12.0302C14.9 11.7302 15 11.3702 15 11.0002V10.0002C15 9.46972 14.7893 8.96102 14.4142 8.58594C14.0391 8.21087 13.5304 8.00016 13 8.00016H7.39L8.85 2.56016V2.54016C8.89735 2.37157 8.89818 2.19332 8.8524 2.0243C8.80663 1.85528 8.71595 1.7018 8.59 1.58016L2.59 7.59016C2.22 7.95016 2 8.45016 2 9.00016V16.0002C2 16.5306 2.21071 17.0393 2.58579 17.4144C2.96086 17.7894 3.46957 18.0002 4 18.0002H10C10.73 18.0002 11.37 17.6102 11.72 17.0302ZM16 11.0002C16 11.5902 15.83 12.1502 15.53 12.6102L12.62 17.4502C12.11 18.3802 11.13 19.0002 10 19.0002H4C3.20435 19.0002 2.44129 18.6841 1.87868 18.1215C1.31607 17.5589 1 16.7958 1 16.0002V9.00016C1 8.17016 1.34 7.42016 1.88 6.88016L8.59 0.160156L9.3 0.870156C9.83 1.40016 10 2.16016 9.81 2.84016L8.69 7.00016H13C13.7956 7.00016 14.5587 7.31623 15.1213 7.87884C15.6839 8.44144 16 9.20451 16 10.0002V11.0002Z"
                                                                                                                    fill="#FF8201">
                                                                                                                </path>
                                                                                                                <path
                                                                                                                    d="M11.72 17.0302L14.72 12.0302C14.9 11.7302 15 11.3702 15 11.0002V10.0002C15 9.46972 14.7893 8.96102 14.4142 8.58594C14.0391 8.21087 13.5304 8.00016 13 8.00016H7.39L8.85 2.56016V2.54016C8.89735 2.37157 8.89818 2.19332 8.8524 2.0243C8.80663 1.85528 8.71595 1.7018 8.59 1.58016L2.59 7.59016C2.22 7.95016 2 8.45016 2 9.00016V16.0002C2 16.5306 2.21071 17.0393 2.58579 17.4144C2.96086 17.7894 3.46957 18.0002 4 18.0002H10C10.73 18.0002 11.37 17.6102 11.72 17.0302Z"
                                                                                                                    fill="#FF8201">
                                                                                                                </path>
                                                                                                            </g>
                                                                                                            <defs>
                                                                                                                <clipPath
                                                                                                                    id="clip0_5330_58533">
                                                                                                                    <rect
                                                                                                                        width="16"
                                                                                                                        height="19"
                                                                                                                        fill="white">
                                                                                                                    </rect>
                                                                                                                </clipPath>
                                                                                                            </defs>
                                                                                                        </svg>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <span
                                                                                                    class="service-price text-orangeMediq font-bold me-body-18">+$1,200</span>
                                                                                            </li>
                                                                                            <li data-value="3"
                                                                                                data-discount="$880"
                                                                                                data-price="+$600"
                                                                                                data-text="Fetal Ultrasound (No Report Provided)"
                                                                                                class="flex items-start justify-between mb-1 last:mb-0 lg:mb-2 lg:last:mb-0">
                                                                                                <div class="flex items-start">
                                                                                                    <label
                                                                                                        for="addson-checklist-1-3"
                                                                                                        class="flex-wrap custom-checkbox-label flex items-start mr-1 last:mr-0 lg:mr-2 lg:last:mr-0">
                                                                                                        <input type="checkbox"
                                                                                                            name="addson-checklist-1"
                                                                                                            id="addson-checklist-1-3"
                                                                                                            value=""
                                                                                                            class="mt-[2px]">
                                                                                                        <span
                                                                                                            class="custom-checkbox-orange mt-[2px]"></span>
                                                                                                        <span
                                                                                                            class="me-body-18 text-left ml-6 4xl:ml-[30px] flex items-center flex-wrap font-normal mr-2 leading-[normal]">
                                                                                                            Fetal Ultrasound (No
                                                                                                            Report Provided)
                                                                                                        </span>
                                                                                                        <span
                                                                                                            class="line-through mr-3 me-body-16">$880</span>
                                                                                                        <span
                                                                                                            class="text-orangeMediq bg-orangeLight px-2 font-bold text-left"></span>
                                                                                                    </label>
                                                                                                    <div class="ml-1 hidden">
                                                                                                        <svg xmlns="http://www.w3.org/2000/svg')}}"
                                                                                                            width="16"
                                                                                                            height="19"
                                                                                                            viewBox="0 0 16 19"
                                                                                                            fill="none">
                                                                                                            <g
                                                                                                                clip-path="url(#clip0_5330_58533)">
                                                                                                                <path
                                                                                                                    d="M-4 8.00016H-1C-0.734784 8.00016 -0.48043 8.10551 -0.292893 8.29305C-0.105357 8.48059 0 8.73494 0 9.00016V13.5002V18.0002C0 18.2654 -0.105357 18.5197 -0.292893 18.7073C-0.48043 18.8948 -0.734784 19.0002 -1 19.0002H-4C-4.26522 19.0002 -4.51957 18.8948 -4.70711 18.7073C-4.89464 18.5197 -5 18.2654 -5 18.0002V9.00016C-5 8.73494 -4.89464 8.48059 -4.70711 8.29305C-4.51957 8.10551 -4.26522 8.00016 -4 8.00016ZM-4 9.00016V18.0002H-1V9.00016H-4ZM11.72 17.0302L14.72 12.0302C14.9 11.7302 15 11.3702 15 11.0002V10.0002C15 9.46972 14.7893 8.96102 14.4142 8.58594C14.0391 8.21087 13.5304 8.00016 13 8.00016H7.39L8.85 2.56016V2.54016C8.89735 2.37157 8.89818 2.19332 8.8524 2.0243C8.80663 1.85528 8.71595 1.7018 8.59 1.58016L2.59 7.59016C2.22 7.95016 2 8.45016 2 9.00016V16.0002C2 16.5306 2.21071 17.0393 2.58579 17.4144C2.96086 17.7894 3.46957 18.0002 4 18.0002H10C10.73 18.0002 11.37 17.6102 11.72 17.0302ZM16 11.0002C16 11.5902 15.83 12.1502 15.53 12.6102L12.62 17.4502C12.11 18.3802 11.13 19.0002 10 19.0002H4C3.20435 19.0002 2.44129 18.6841 1.87868 18.1215C1.31607 17.5589 1 16.7958 1 16.0002V9.00016C1 8.17016 1.34 7.42016 1.88 6.88016L8.59 0.160156L9.3 0.870156C9.83 1.40016 10 2.16016 9.81 2.84016L8.69 7.00016H13C13.7956 7.00016 14.5587 7.31623 15.1213 7.87884C15.6839 8.44144 16 9.20451 16 10.0002V11.0002Z"
                                                                                                                    fill="#FF8201">
                                                                                                                </path>
                                                                                                                <path
                                                                                                                    d="M11.72 17.0302L14.72 12.0302C14.9 11.7302 15 11.3702 15 11.0002V10.0002C15 9.46972 14.7893 8.96102 14.4142 8.58594C14.0391 8.21087 13.5304 8.00016 13 8.00016H7.39L8.85 2.56016V2.54016C8.89735 2.37157 8.89818 2.19332 8.8524 2.0243C8.80663 1.85528 8.71595 1.7018 8.59 1.58016L2.59 7.59016C2.22 7.95016 2 8.45016 2 9.00016V16.0002C2 16.5306 2.21071 17.0393 2.58579 17.4144C2.96086 17.7894 3.46957 18.0002 4 18.0002H10C10.73 18.0002 11.37 17.6102 11.72 17.0302Z"
                                                                                                                    fill="#FF8201">
                                                                                                                </path>
                                                                                                            </g>
                                                                                                            <defs>
                                                                                                                <clipPath
                                                                                                                    id="clip0_5330_58533">
                                                                                                                    <rect
                                                                                                                        width="16"
                                                                                                                        height="19"
                                                                                                                        fill="white">
                                                                                                                    </rect>
                                                                                                                </clipPath>
                                                                                                            </defs>
                                                                                                        </svg>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <span
                                                                                                    class="service-price text-orangeMediq font-bold me-body-18">+$600</span>
                                                                                            </li>

                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="flex xs:flex-row flex-col justify-end xs:items-center mt-3 lg:mt-5">
                                                                                    <div class="hidden">
                                                                                        <input data-id="1"
                                                                                            value="[{&quot;name_en&quot;:&quot;Gastrointestinal Cancer Screening&quot;,&quot;original_price&quot;:&quot;+$1,200&quot;,&quot;discount_price&quot;:&quot;+$1,200&quot;,&quot;id&quot;:&quot;2&quot;},{&quot;name_en&quot;:&quot;Fetal Ultrasound (No Report Provided)&quot;,&quot;original_price&quot;:&quot;+$600&quot;,&quot;discount_price&quot;:&quot;+$600&quot;,&quot;id&quot;:&quot;3&quot;}]"
                                                                                            type="hidden"
                                                                                            class="addson-checklist addson-checklist-`+receipientData[i].parentID+` addson-checklist-1">
                                                                                        <input data-id="1" value="true"
                                                                                            type="hidden"
                                                                                            class="addson-checklist-decideLater addson-checklist-decideLater-1">
                                                                                    </div>
                                                                                    <button data-id="1"
                                                                                        data-parentid="@@parentID"
                                                                                        type="button" role="button"
                                                                                        class="me-body-18 xs:mt-0 mt-2 checkout-addson-confirm text-light bg-orangeMediq rounded-md font-bold py-2 px-10 sm:py-[10px] xs:max-w-[300px] max-w-full xl:px-0 xl:w-[300px] hover:bg-brightOrangeMediq transition-colors duration-300">
                                                                                        Confirm
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endif
                                                    @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div id="me-member-order-receipt-popup"
                                                class="hidden me-member-order-receipt-popup">
                                                <div
                                                    class="me-member-order-receipt-popup-content overflow-visible px-5 rounded-[12px] max-w-[650px] md:min-w-[650px] min-w-[90%] max-h-[80%]">
                                                    <div class="w-full h-full overflow-y-auto py-5 lg:py-10">
                                                        <form action="{{ route('dashboard.myacc.basicinfo.fileupload') }}" method="POST" id="file-upload" enctype="multipart/form-data">
                                                        <button type="button"
                                                            class="z-[1] absolute top-5 right-5 focus-visible:outline-none focus:outline-none p-1"
                                                            id="me-member-order-receipt-popup-closebtn"><img
                                                                class=" w-auto h-auto align-middle"
                                                                src="{{ asset('frontend/img/close-btn.png') }}"
                                                                alt=""></button>
                                                        <div>
                                                            <div>
                                                                <h3 class="font-bold me-body-23 text-darkgray text-left">
                                                                    @lang('labels.order_details.upload_receipt')</h3>
                                                                <p class="mt-5 me-body-16 font-normal text-darkgray">
                                                                    @lang('labels.order_details.max_upload')</p>
                                                                <div class="mt-5">
                                                                    <input type="file"  name="file"
                                                                        class="hidden image-drag-drop-area-input">
                                                                    <input type="hidden" id="order_id" name="order_id" value="{{$data->id}}"
                                                                        class="hidden image-drag-drop-area-input">
                                                                    <div
                                                                        class="bg-[#F7F7F7] p-8 cursor-pointer image-drag-drop-area rounded-lg before-upload">
                                                                        <div>
                                                                            <div class="mx-auto">
                                                                                <svg class="mx-auto"
                                                                                    xmlns="http://www.w3.org/2000/svg')}}"
                                                                                    width="48" height="48"
                                                                                    viewBox="0 0 48 48" fill="none">
                                                                                    <path
                                                                                        d="M11.678 20.271C7.275 21.318 4 25.277 4 30C4 35.523 8.477 40 14 40C14.947 40 15.864 39.868 16.733 39.622M36.055 20.271C40.458 21.318 43.732 25.277 43.732 30C43.732 35.523 39.255 40 33.732 40C32.785 40 31.868 39.868 31 39.622M36 20C36 13.373 30.627 8 24 8C17.373 8 12 13.373 12 20M17.065 27.881L24 20.924L31.132 28M24 38V24.462"
                                                                                        stroke="#9C9C9C"
                                                                                        stroke-width="4"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round"></path>
                                                                                </svg>
                                                                            </div>
                                                                            <div class="mt-3">
                                                                                <p
                                                                                    class="text-center font-normal me-body-16 text-[#52524D]">
                                                                                    @lang('labels.order_details.drag') <span
                                                                                        class="browse-btn text-[#218BE2]">@lang('labels.order_details.browse')</span>
                                                                                        @lang('labels.order_details.browse')</p>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="bg-[#F7F7F7] p-8 after-upload hidden rounded-lg">
                                                                        <div class="flex justify-between items-center">
                                                                            <p
                                                                                class="filename font-bold me-body-16 text-darkgray mr-2">
                                                                            </p>
                                                                            <a
                                                                                class="cursor-pointer remove-selected-file underline font-normal me-body-16 text-darkgray">Remove</a>
                                                                        </div>
                                                                    </div>
                                                                    <span class="text-mered me-body16 helvetica-normal mt-[12px] hidden" id="file_error"></span>
                                                                </div>
                                                                <div class="mt-5 flex items-center justify-end">
                                                                    <button onclick="closeReceiptPopup()" type="button"
                                                                        class="rounded-md sm:min-w-[135px] min-w-[100px] font-normal me-body-16 text-darkgray px-5 py-[8px] border-1 border-darkgray hover:border-orangeMediq hover:text-orangeMediq mr-2">@lang('labels.order_details.cancel')</button>
                                                                    <button onclick="uploadPayslip()" type="button"
                                                                        class="rounded-md sm:min-w-[135px] min-w-[100px] font-normal me-body-16 text-whitez px-5 py-[8px] border-1 border-orangeMediq bg-orangeMediq hover:bg-brightOrangeMediq">@lang('labels.order_details.upload')</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-9">
                                            <div class="items-center hidden mb-4">
                                                <div class="mr-5">
                                                    <svg xmlns="http://www.w3.org/2000/svg')}}" width="15"
                                                        height="25" viewBox="0 0 15 25" fill="none">
                                                        <path
                                                            d="M12 24.5L0 12.5L12 0.5L14.13 2.63L4.26 12.5L14.13 22.37L12 24.5Z"
                                                            fill="#333333"></path>
                                                    </svg>
                                                </div>
                                                <h2 class="me-body-32 font-bold text-darkgray sm:text-left text-center">
                                                    @lang('labels.order_details.order_details')</h2>
                                            </div>
                                            <div>
                                                @if($data->payment_status == 1 || $data->payment_status== 5)
                                                <div component-name="me-member-order-detail-buttons"
                                                    class="me-member-order-detail-buttons mb-3 7xl:min-w-[438px] xl:min-w-[250px] min-w-[150px] max-w-[440px]">
                                                    <a href="{{ route('dashboard.booking.details',['id'=>$data->id,'download'=>'pdf']) }}" download
                                                        class="block text-center e-receipt-btn w-full hover:border-orangeMediq hover:text-orangeMediq me-body-18 font-normal text-darkgray border-1 border-darkgray rounded-md py-[9px] px-5">@lang('labels.order_details.download_e_receipt')</a>
                                                </div>
                                                @if(config('app.env') != 'production')
                                                <div component-name="me-member-order-detail-buttons"
                                                    class="me-member-order-detail-buttons mb-3 7xl:min-w-[438px] xl:min-w-[250px] min-w-[150px] max-w-[440px]">
                                                    <button
                                                        class="e-receipt-send-email-btn w-full hover:border-orangeMediq hover:text-orangeMediq me-body-18 font-normal text-darkgray border-1 border-darkgray rounded-md py-[9px] px-5">@lang('labels.order_details.e_receipt_email')</button>
                                                </div>
                                                @endif
                                                <div component-name="me-member-order-detail-buttons"
                                                    class="me-member-order-detail-buttons mb-3 7xl:min-w-[438px] xl:min-w-[250px] min-w-[150px] max-w-[440px]">
                                                    <button
                                                        class="cancel-refund-btn w-full hover:border-orangeMediq hover:text-orangeMediq me-body-18 font-normal text-darkgray border-1 border-darkgray rounded-md py-[9px] px-5">
                                                        @lang('labels.order_details.refund')</button>
                                                </div>
                                                @endif
                                                <div component-name="me-member-order-detail-summary-box"
                                                    class="me-checkout-order-summary-box w-full">
                                                    <div class="">
                                                        <div class="p-5 me-checkout-order-summary mt-10">
                                                            <h1 class="font-bold me-body-23 text-darkgray">@lang('labels.check_out.order')
                                                            </h1>
                                                            <div class="mt-3">
                                                                <div class="@@checkoutStepSummary">
                                                                    <div class="flex justify-between">
                                                                        <div
                                                                            class="flex items-center checkout-summary-collpase cursor-pointer">
                                                                            <h3
                                                                                class="font-bold text-darkgray me-body-18">
                                                                                @lang('labels.check_out.item_total') </h3>
                                                                            <div>
                                                                                <svg xmlns="http://www.w3.org/2000/svg')}}"
                                                                                    width="20" height="20"
                                                                                    viewBox="0 0 20 20" fill="none">
                                                                                    <path
                                                                                        d="M15.5743 12.472C15.4864 12.6615 15.2657 12.7474 15.0685 12.6674C15.0157 12.6459 14.3907 12.0306 12.8048 10.4369L10.6114 8.23376L8.42003 10.4369C6.83018 12.0326 6.20714 12.6459 6.1544 12.6674C6.11339 12.683 6.04503 12.6967 6.00206 12.6967C5.72081 12.6967 5.53136 12.4115 5.64854 12.1595C5.70128 12.0482 10.336 7.39196 10.4454 7.34313C10.545 7.29626 10.6778 7.29626 10.7774 7.34313C10.8868 7.39196 15.5216 12.0482 15.5743 12.1595C15.6212 12.2592 15.6212 12.3724 15.5743 12.472Z"
                                                                                        fill="#333333"></path>
                                                                                </svg>
                                                                            </div>
                                                                        </div>
                                                                        @php
                                                                                $itemList =  App\Models\OrderItems::select("order_items.*","products.name_en","products.name_tc","products.name_sc",
                                                                                "products.is_two_recipient","recipients.location","recipients.confirm_location","products.featured_img")
                                                                                                        ->where("orders_id",$data->id)
                                                                                                        ->join("products","products.id","order_items.product_id")
                                                                                                        ->join("recipients","recipients.id","order_items.recipient_id")
                                                                                                        ->get();
                                                                                $twoPersonCouponHaveShowList = []
                                                                        @endphp
                                                                        <h3
                                                                            class="font-bold text-darkgray me-body-18">
                                                                            ${{collect($itemList)->sum('total')}}</h3>
                                                                    </div>
                                                                    <div
                                                                        class="mt-5 flex justify-between checkout-summary-collpase-content">
                                                                        <div component-name="me-checkout-selected-items"
                                                                            class="max-h-[300px] overflow-y-auto pb-5 me-checkout-order-selected-items">
                                                                            <div class="me-checkout-selected-items">

                                                                                @foreach($itemList as $data1)
                                                                                @if($data1->is_two_recipient ==1 && in_array($data1->recipient_id,$twoPersonCouponHaveShowList)==false)
                                                                                @php
                                                                                    $recipientsIds =[];
                                                                                    $recipientsIds = App\Models\OrderItems::select("recipient_id")
                                                                                                                        ->where("orders_id",$data1->orders_id)
                                                                                                                        ->where("product_id",$data1->product_id)
                                                                                                                        ->whereIn("order_status",[1,2,3,5,6,7])
                                                                                                                        ->pluck("recipient_id")->toArray();
                                                                                    $index = array_search($data1->recipient_id, $recipientsIds);
                                                                                 
                                                                                    $twopersondataId =  $recipientsIds[$index+1];

                                                                                    array_push($twoPersonCouponHaveShowList,$twopersondataId);
                                                                                @endphp
                                                                                <div
                                                                                    class="border-b-1 border-mee4 pb-5 mb-5 last:mb-0 last:border-b-0">
                                                                                    <div class="flex">
                                                                                        <img src="{{ $data1->featured_img }}"
                                                                                            class=" mr-3 max-w-[40px] max-h-[40px] member-order-detail-img"
                                                                                            alt="logo-0">
                                                                                        <p class="font-bold me-body-16 text-darkgray member-order-detail-title">
                                                                                            {{@langbind($data1,'name')}}
                                                                                        </p>
                                                                                    </div>
                                                                                    <div class="mt-2">
                                                                                        <p
                                                                                            class="font-bold me-body-16 text-darkgray text-right">
                                                                                            ${{$data1->total}}</p>
                                                                                    </div>
                                                                                </div>
                                                                                @else
                                                                                    @if($data1->is_two_recipient !=1)
                                                                                    <div class="border-b-1 border-mee4 pb-5 mb-5 last:mb-0 last:border-b-0">
                                                                                        <div class="flex">
                                                                                            <img src="{{ $data1->featured_img }}"
                                                                                                class=" mr-3 max-w-[40px] max-h-[40px] member-order-detail-img"
                                                                                                alt="logo-0">
                                                                                            <p class="font-bold me-body-16 text-darkgray member-order-detail-title">
                                                                                                {{@langbind($data1,'name')}}
                                                                                            </p>
                                                                                        </div>
                                                                                        <div class="mt-2">
                                                                                            <p
                                                                                                class="font-bold me-body-16 text-darkgray text-right">
                                                                                                ${{$data1->total}}</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    @endif
                                                                                @endif
                                                                                @endforeach

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @if((int)$data->coupon_amount !=0 || (int)$data->promo_code_amount !=0)
                                                                <div>
                                                                    <div class="flex items-center justify-between">
                                                                        <p class="font-bold text-darkgray me-body-16">
                                                                            @lang('labels.check_out.order_discount') </p>
                                                                        <p class="font-bold me-body-16 text-darkgray">-
                                                                            @if($data->promo_code_id)
                                                                            ${{number_format((int)$data->promo_code_amount,2)}}
                                                                            @endif
                                                                            @if($data->coupon_id)
                                                                                @if($data->coupon->discount_type == 'percent')
                                                                                {{$data->coupon_amount}}%
                                                                                @else
                                                                                ${{number_format((int)$data->coupon_amount,2)}}
                                                                                @endif
                                                                            @endif
                                                                        </p>
                                                                    </div>
                                                                    <div class="mt-3">
                                                                        <div class="mt-2 bg-far p-[10px] rounded-[4px]">
                                                                            <div class="flex justify-between">
                                                                                <p
                                                                                    class="font-normal me-body-14 text-darkgray">
                                                                                    @lang('labels.check_out.my_discount')</p>
                                                                                <p
                                                                                    class="font-normal me-body-14 text-darkgray">
                                                                                    -  @if($data->promo_code_id)
                                                                                        ${{number_format((int)$data->promo_code_amount,2)}}
                                                                                        @endif
                                                                                        @if($data->coupon_id)
                                                                                            @if($data->coupon->discount_type == 'percent')
                                                                                            {{$data->coupon_amount}}%
                                                                                            @else
                                                                                            ${{number_format((int)$data->coupon_amount,2)}}
                                                                                            @endif
                                                                                        @endif
                                                                                    </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                <hr class="bg-mee4 my-5">
                                                                <div>
                                                                    <div class="mt-1 flex justify-between">
                                                                        <p class="font-bold text-darkgray me-body-18">
                                                                            @lang('labels.check_out.total')</p>
                                                                        <p
                                                                            class="font-bold text-darkgray me-body-18">
                                                                            HK${{$data->grand_total}}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div component-name="me-need-help-section"
                                            class="me-need-help-section bg-paleblue sm:min-h-[152px] rounded-[20px] xl:px-12 sm:px-6 px-5 sm:py-9 py-3 mb-[30px]">
                                            <div>
                                                <div class="flex sm:items-center items-start my-1">
                                                    <img src="{{ asset('frontend/img/mdi_customer-service.svg') }}"
                                                        alt="customer-service" class="mr-6 sm:block hidden">
                                                    <img src="{{ asset('frontend/img/mdi_customer-service-mb.svg') }}"
                                                        alt="customer-service-mb" class="mr-6 sm:hidden block">
                                                    <div class="flex flex-wrap justify-between items-center w-full">
                                                        <div class=" my-1">
                                                            <h2 class="font-bold me-body-29 text-darkgray">@lang('labels.booking.need_help')</h2>
                                                            <p class="font-normal me-body-18 text-darkgray">@lang('labels.booking.contact_mediQ')</p>
                                                        </div>
                                                        <div class=" my-1">
                                                            <a href="{{route('contact')}}"
                                                                class="rounded-[50px] bg-whitez hover:border-blueMediq hover:bg-blueMediq hover:text-whitez me-body-16 font-bold text-darkgray min-w-[138px] px-5 py-[10px] border-1 border-darkgray">@lang('labels.booking.contact_now')</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="me-checkout-send-email-popup" class="hidden me-checkout-send-email-popup">
                            <div
                                class="me-checkout-send-email-popup-content overflow-visible xl:py-10 py-5 xl:px-10 px-5 rounded-[12px] sm:max-w-[650px] sm:min-w-[unset] min-w-[95%]">
                                <div class="relative w-full">
                                    <button data-id="@@id"
                                        class="z-[1] absolute top-0 right-0 focus-visible:outline-none focus:outline-none p-1"
                                        id="me-checkout-send-email-popup-close-btn"><img
                                            class=" w-auto h-auto align-middle"
                                            src="{{ asset('frontend/img/close-btn.png') }}" alt=""></button>
                                    <h1 class="me-body-23 font-bold text-darkgray">@lang('labels.order_details.e_receipt_email')</h1>
                                    <hr class="my-5 bg-mee4">
                                    <div>
                                        <div>
                                            <p class="me-body-16 font-normal text-darkgray mb-2">@lang('labels.order_details.name_e_receipt')</p>
                                            <input value="" id="e-receipt-name"
                                                class="rounded-[4px] w-full py-2 px-5 font-normal me-body-18 bg-whitez border-1 border-meA3 focus-within:outline-none focus:outline-none">
                                        </div>
                                        <div class="mt-5">
                                            <p class="me-body-16 font-normal text-darkgray mb-2">@lang('labels.order_details.email_e_receipt')
                                            </p>
                                            <input value="" id="e-receipt-email"
                                                class="rounded-[4px] w-full py-2 px-5 font-normal me-body-18 bg-whitez border-1 border-meA3 focus-within:outline-none focus:outline-none">
                                        </div>
                                        <div class="mt-5">
                                            <p class="me-body-16 font-normal text-darkgray mb-2">@lang('labels.order_details.postal_address')</p>
                                            <input placeholder="@lang('labels.order_details.please_specify')" id="e-receipt-postal-address"
                                                class="rounded-[4px] w-full py-2 px-5 font-normal me-body-18 bg-whitez border-1 border-meA3 focus-within:outline-none focus:outline-none">
                                        </div>
                                        <hr class="mt-5 mb-4 bg-mee4">
                                        <div>
                                            <div class="flex flex-wrap items-center justify-end">
                                                <button onclick="hideSendEmailPopup()"
                                                    class="close-email-popup-btn my-1 xs:min-w-[135px] min-w-[120px] rounded-md font-bold me-body-16 text-darkgray px-5 py-[9px] mr-2 border-1 border-darkgray hover:border-orangeMediq hover:text-orangeMediq">@lang('labels.order_details.cancel')</button>
                                                <button onclick="sendEReceiptEmail()"
                                                    class="send-email-btn my-1 xs:min-w-[135px] min-w-[120px] rounded-md font-bold me-body-16 text-whitez px-5 py-[9px] bg-orangeMediq hover:bg-brightOrangeMediq">@lang('labels.order_details.send')</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="me-checkout-cancellation-popup" class="hidden me-checkout-cancellation-popup">
                            <form action="" id="frmCancelRefund">
                                <input type="hidden" name="order_id" value="{{$data->id}}">
                                <div
                                    class="max-h-[76%] me-checkout-cancellation-popup-content overflow-visible xl:py-10 py-5 xl:pl-10 pl-5 xl:pr-10 sm:pr-5 pr-2  rounded-[12px] 4xl:max-w-[1160px] lg:max-w-[800px] max-w-[95%] sm:min-w-[unset] min-w-[95%]">
                                    <div class="relative w-full overflow-y-auto custom-cancellation-scrollbar">
                                        <div class="fixed sm:w-[95%] w-[90%] bg-whitez z-[2] py-5 top-0">
                                            <div>
                                                <button type="button"
                                                    class="z-[1] absolute top-5 right-0 focus-visible:outline-none focus:outline-none p-1"
                                                    id="me-checkout-cancellation-popup-close-btn"><img
                                                        class=" w-auto h-auto align-middle"
                                                        src="{{ asset('frontend/img/close-btn.png') }}"
                                                        alt=""></button>
                                                <h1 class="me-body-23 font-bold text-darkgray">@lang('labels.booking_details.cancel_refund')
                                                </h1>
                                                <hr class="my-5 bg-mee4">
                                            </div>
                                            <div>
                                                <label class="cursor-pointer inline-block relative" id="cancellation-selectall"
                                                    for="cancellation-selectall">
                                                    <input type="checkbox"
                                                        class="cursor-pointer opacity-0 absolute w-full h-full"
                                                        name="cancellation-selectall" id="cancellation-selectall">
                                                    <span class="custom-checkbox-orange absolute left-0 w-6 h-6"></span>
                                                    <span class="ml-[44px]">@lang('labels.booking_details.select_all')</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="pt-[80px]">
                                            <div>
                                                <div component-name="me-checkout-cancellation-card"
                                                    class="me-member-dashboard-booking-card mt-5 mb-[50px]">
                                                    <div class="py-5 rounded-xl bg-whitez mt-3">
                                                        @php
                                                            $itemList =  App\Models\OrderItems::select("order_items.*","products.id as product_id","products.name_en","products.name_tc","products.name_sc",
                                                            "products.is_two_recipient","recipients.location","recipients.confirm_location","products.featured_img","recipients.remark","recipients.id as recipient_id",
                                                            "recipients.confirm_booking_date","categories.name_en as category_name_en","products.slug_en","products.slug_tc","products.slug_sc")
                                                                                    ->where("orders_id",$data->id)
                                                                                    ->join("products","products.id","order_items.product_id")
                                                                                    ->join("recipients","recipients.id","order_items.recipient_id")
                                                                                    ->join("categories","categories.id","products.category_id")
                                                                                    ->whereIn("order_items.order_status",[1,2,3])
                                                                                    ->get();
                                                            $twoPersonCouponHaveShowList =[];
                                                        @endphp
                                                        @foreach($itemList as $itemDetails)
                                                        @php
                                                            $productTag = \App\Models\ProductPriceTag::where("product_id",$itemDetails->product_id)
                                                                                                ->where("price_tag_id",2)
                                                                                                ->get();
                                                        @endphp
                                                        @if(count($productTag) >=1)
                                                        @if($data->payment_status==1 || $data->payment_status==5)
                                                            @if ($itemDetails->confirm_booking_date != null)
                                                                    @php
                                                                        $now = \Carbon\Carbon::now()->startOfDay();
                                                                        $bookingDate = \Carbon\Carbon::parse($itemDetails->confirm_booking_date)->startOfDay();
                                                                        $diff= 0;
                                                                        if($bookingDate> $now) {
                                                                        $diff = $bookingDate->diffInDays($now);
                                                                        }
                                                                    @endphp
                                                                    @if ($diff >= 3)
                                                                        @if ($itemDetails->is_two_recipient == 1 && in_array($itemDetails->recipient_id, $twoPersonCouponHaveShowList) == false)
                                                                            @php
                                                                                $recipientsIds = [];
                                                                                $recipientsIds = App\Models\OrderItems::select('recipient_id')
                                                                                    ->where('orders_id', $itemDetails->orders_id)
                                                                                    ->where('product_id', $itemDetails->product_id)
                                                                                    ->whereIn('order_status', [1, 2, 3])
                                                                                    ->pluck('recipient_id')
                                                                                    ->toArray();
                                                                                $index = array_search($itemDetails->recipient_id, $recipientsIds);
                                                                                $twopersondataId = $recipientsIds[$index + 1];
                                                                                
                                                                                array_push($twoPersonCouponHaveShowList, $twopersondataId);
                                                                            @endphp
                                                                            <div
                                                                                class="py-5 xl:px-5 flex sm:flex-nowrap flex-wrap items-center sm:mb-5 mb-10 pb-5 last:border-b last:sm:mb-10 last:mb-36 last:border-b-mee4 rounded-[4px] custom-order-boxshadow">
                                                                                <div>
                                                                                    <label class="cursor-pointer inline-block relative mr-5 w-6 h-6"
                                                                                        for="cancellation-select-{{ $itemDetails->id }}">
                                                                                        <input type="checkbox" class="cursor-pointer opacity-0 absolute w-full h-full cancellation-select"
                                                                                            name="cancellation_selectsingle[]" value={{ $itemDetails->id }}
                                                                                            id="cancellation-select-{{ $itemDetails->id }}">
                                                                                        <span class="custom-checkbox-orange absolute left-0 w-6 h-6"></span>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="mr-[10px]">
                                                                                    <img src="{{ $itemDetails->featured_img }}" alt="booking-logo"
                                                                                        class="2xl:max-w-[96px] 2xl:max-h-[96px] max-w-[50px] max-h-[50px] object-cover rounded-xl">
                                                                                </div>
                                                                                <div class="w-full">
                                                                                    <p class="me-body-20 font-bold text-darkgray"><a href="{{ route('product-detail', ['category'=>$itemDetails->category_name_en,'slug'=>isset($itemDetails->slug_en) ? $itemDetails->slug_en : '']) }}">{{ @langbind($itemDetails, 'name') }}</a>
                                                                                    </p>
                                                                                    <div component-name="me-checkout-cancellation-card-content"
                                                                                        class="me-member-dashboard-booking-card-content">
                                                                
                                                                                        <div>
                                                                                            <div class="mt-2 bg-blueMediq px-3 py-2">
                                                                                                <p class="font-bold me-body-16 text-whitez">
                                                                                                    @lang('labels.order_details.booking_id') {{ $itemDetails->booking_id }}</p>
                                                                                            </div>
                                                                                            <div class="mt-[10px]">
                                                                                                <div class="payment-pending-div ">
                                                                                                    <div class="flex flex-wrap-reverse items-center justify-between">
                                                                                                        <div>
                                                                                                            <div class="flex items-start">
                                                                                                                <div class="mr-[10px] mt-[2px]">
                                                                                                                    @if ($itemDetails->order_status == 4)
                                                                                                                        <img src="{{ asset('frontend/img/member-clapping.svg') }}"
                                                                                                                            alt="statusIcon" class="min-w-[16px]">
                                                                                                                    @elseif($itemDetails->order_status == 3)
                                                                                                                        <img src="{{ asset('frontend/img/member-check-circle.svg') }}"
                                                                                                                            alt="statusIcon" class="min-w-[16px]">
                                                                                                                    @elseif($itemDetails->order_status == 6)
                                                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                                                                            height="21" viewBox="0 0 20 21" fill="none">
                                                                                                                            <path
                                                                                                                                d="M9.10156 1.90966C7.59766 2.062 6.08203 2.65185 4.83594 3.57372C4.33203 3.94872 3.46484 4.812 3.09766 5.30419C1.39063 7.60888 0.91797 10.519 1.82031 13.23C2.82813 16.2651 5.42578 18.4604 8.65234 19.0034C9.25 19.1011 10.7813 19.1011 11.3477 18.9995C13.2148 18.6714 14.7891 17.8628 16.0742 16.5737C17.4883 15.1597 18.3398 13.3706 18.5586 11.3667C18.6211 10.7573 18.5859 9.64013 18.4805 9.03466C18.2344 7.64404 17.7031 6.41357 16.8516 5.28075C16.5664 4.90185 15.8633 4.16747 15.4609 3.83154C13.7383 2.39404 11.3789 1.6831 9.10156 1.90966ZM10.5859 3.27294C12.3086 3.42529 13.8711 4.14794 15.0742 5.35107C17.6719 7.94091 17.9492 11.9448 15.7266 14.894C15.4258 15.2964 14.7969 15.9253 14.3945 16.2261C12.8945 17.355 11.0664 17.8745 9.26172 17.687C6.73438 17.4214 4.55078 15.8901 3.46094 13.6245C2.50781 11.644 2.51172 9.3081 3.46875 7.32763C4.44141 5.31591 6.37109 3.82372 8.55469 3.39013C9.28906 3.2456 9.87891 3.21044 10.5859 3.27294Z"
                                                                                                                                fill="#333333"></path>
                                                                                                                            <path
                                                                                                                                d="M6.77734 6.94011C6.58984 7.02604 6.50781 7.11198 6.42578 7.30729C6.35156 7.48698 6.35156 7.65104 6.42578 7.83464C6.46875 7.92839 6.91406 8.40495 7.74609 9.23698L9.00391 10.4987L7.74609 11.7604C6.47656 13.03 6.36719 13.1628 6.36719 13.4245C6.36719 13.9167 6.93359 14.2487 7.375 14.0182C7.45312 13.9753 8.07422 13.3854 8.75 12.7096L9.98047 11.4753L11.2305 12.7214C11.918 13.405 12.5352 13.9948 12.6055 14.03C12.9961 14.2253 13.5117 13.9635 13.582 13.5339C13.6367 13.1823 13.6523 13.1979 12.2539 11.7995L10.9609 10.4987L12.2344 9.22136C13.5977 7.84636 13.6211 7.81511 13.582 7.46745C13.5469 7.15495 13.2266 6.86589 12.9102 6.86589C12.6562 6.86589 12.4883 7.00651 11.25 8.2487C10.5742 8.92839 10.0039 9.48308 9.98047 9.48308C9.95703 9.48308 9.38672 8.92839 8.71094 8.2487C7.26953 6.80339 7.19141 6.7487 6.77734 6.94011Z"
                                                                                                                                fill="#333333"></path>
                                                                                                                        </svg>
                                                                                                                    @else
                                                                                                                        <img src="{{ asset('frontend/img/member-ast.svg') }}"
                                                                                                                            alt="statusIcon" class="min-w-[16px]">
                                                                                                                    @endif
                                                                                                                </div>
                                                                                                                @php
                                                                                                                    $textColor = '';
                                                                                                                    if ($itemDetails->order_status == 3) {
                                                                                                                        $textColor = 'text-meGreen';
                                                                                                                    } elseif ($itemDetails->order_status == 2) {
                                                                                                                        $textColor = 'text-darkgray';
                                                                                                                    } elseif ($itemDetails->order_status == 1) {
                                                                                                                        $textColor = 'text-mered';
                                                                                                                    }
                                                                                                                @endphp
                                                                                                                <p class="font-bold me-body-18 {{ $textColor }}">
                                                                                                                    {{ config('mediq.booking_status_' . app()->getLocale())[$itemDetails->order_status] }}
                                                                                                                </p>
                                                                                                            </div>
                                                                                                            <div class="flex items-center mt-[10px]">
                                                                                                                <div class="mr-[10px]">
                                                                                                                    <img src="{{ asset('frontend/img/member-user.svg') }}"
                                                                                                                        alt="member-user">
                                                                                                                </div>
                                                                                                                <p class="font-normal me-body-18 text-darkgray">
                                                                                                                    {{ $itemDetails->recipient->last_name }}
                                                                                                                    {{ $itemDetails->recipient->first_name }}
                                                                                                                </p>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="flex items-center my-1">
                                                                                                            <div class="flex items-center pr-3">
                                                                                                                <p
                                                                                                                    class="font-bold me-body-45 text-darkgray leading-[normal] booking-selected-dayno">
                                                                                                                    {{ $itemDetails->confirm_booking_date != null ? date('j', strtotime($itemDetails->confirm_booking_date)) : '' }}
                                                                                                                </p>
                                                                                                                <p
                                                                                                                    class="font-bold me-body-16 text-darkgray max-w-[30px] leading-[normal] booking-selected-month-day">
                                                                                                                    {{ $itemDetails->confirm_booking_date != null ? date('M', strtotime($itemDetails->confirm_booking_date)) : '' }}
                                                                                                                    {{ $itemDetails->confirm_booking_date != null ? date('D', strtotime($itemDetails->confirm_booking_date)) : '' }}
                                                                                                                </p>
                                                                                                            </div>
                                                                                                            <div class="border-l-1 border-l-mee4 pl-3">
                                                                                                                <p
                                                                                                                    class="font-bold me-body-28 text-darkgray leading-[normal] booking-selected-time">
                                                                                                                    {{ $itemDetails->confirm_booking_time !== null ? $itemDetails->confirm_booking_time : '' }}
                                                                                                                </p>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                
                                                                                                @php
                                                                                                    $recipient = App\Models\Recipient::select('recipients.*', 'order_items.total')
                                                                                                        ->join('products', 'recipients.product_id', '=', 'products.id')
                                                                                                        ->join('order_items', 'order_items.recipient_id', 'recipients.id')
                                                                                                        ->where('recipients.id', $itemDetails->recipient_id)
                                                                                                        ->first();
                                                                                                    $product = App\Models\Product::find($itemDetails->product_id);
                                                                                                    $location = App\Models\MerchantLocation::where('area_id', $itemDetails->confirm_location)
                                                                                                        ->where('merchant_id', $product->merchant->id)
                                                                                                        ->first();
                                                                                                    
                                                                                                @endphp
                                                                                                @if ($itemDetails->confirm_booking_date!=null)
                                                                                                    <div class="mt-[5px] flex items-center ">
                                                                                                        <div class="mr-[10px]">
                                                                                                            <img src="{{ asset('frontend/img/member-location.png') }}"
                                                                                                                alt="member-location" class="min-w-[20px]">
                                                                                                        </div>
                                                                                                        <p
                                                                                                            class="font-normal me-body-18 text-darkgray leading-[normal] @@classname">
                                                                                                            {{ @langbind($location, 'full_address') }}
                                                                                                        </p>
                                                                                                    </div>
                                                                
                                                                
                                                                                                    <div class="mt-[5px] flex items-center ">
                                                                                                        <div class="mr-[10px]">
                                                                                                            <img src="{{ asset('frontend/img/member-other.svg') }}" alt="member-other"
                                                                                                                class="min-w-[20px]">
                                                                                                        </div>
                                                                                                        <p
                                                                                                            class="font-normal me-body-18 text-darkgray leading-[normal] @@classname">
                                                                                                            {{ @langbind($location, 'station') }}</p>
                                                                                                    </div>
                                                                                                @endif
                                                                                                @foreach ($recipient->group_data as $group)
                                                                                                    @php
                                                                                                        $checkUpTable = $recipient->product->package->checkupTable;
                                                                                                        $tablePriIds = App\Models\CheckUpTableType::where('check_up_type_id', 2)
                                                                                                            ->where('check_up_table_id', $checkUpTable->id)
                                                                                                            ->pluck('id')
                                                                                                            ->toArray();
                                                                                                        $optionGroupIds = App\Models\CheckTableItem::where('check_up_group_id', $group->id)
                                                                                                            ->whereIn('check_up_table_type_id', $tablePriIds)
                                                                                                            ->distinct()
                                                                                                            ->pluck('check_up_item_id')
                                                                                                            ->toArray();
                                                                                                        $countEquivalentNumber = App\Models\CheckUpItem::whereIn('id', $optionGroupIds)->sum('equivalent_number');
                                                                                                    @endphp
                                                                                                    <div component-name="me-checkout-merchant-recipient-cancerMarker-detail"
                                                                                                        class="mt-1">
                                                                                                        <div class="flex sm:flex-row flex-col">
                                                                
                                                                                                            <div
                                                                                                                class="flex w-full justify-between cancer-markers-detail-data1-receipientData111">
                                                                                                                <div class="flex items-center w-full">
                                                                                                                    <div class="mr-2 max-w-[24px] w-[24px]">
                                                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                                                                            height="25" viewBox="0 0 24 25" fill="none">
                                                                                                                            <path
                                                                                                                                d="M9.4979 3.00898C8.94263 3.08328 8.22312 3.3531 7.73824 3.66984C7.3824 3.90446 6.83104 4.44409 6.60815 4.77647C6.38525 5.10885 6.15845 5.58982 6.02941 6.01605C5.93165 6.34452 5.92383 6.41882 5.91992 7.0914C5.91992 7.72097 5.92774 7.83437 5.99422 7.96341C6.20929 8.39746 6.8193 8.40919 7.03046 7.98296C7.09694 7.8461 7.10085 7.7718 7.08521 7.28692C7.05784 6.66126 7.11258 6.36407 7.32765 5.89092C7.49189 5.53508 7.65221 5.30046 7.91812 5.03846C8.81359 4.13908 10.1431 3.91228 11.2849 4.45582C12.0475 4.81948 12.6497 5.55072 12.8647 6.38363C12.9273 6.61043 12.9429 6.78639 12.939 7.1305C12.9234 7.90476 12.9273 7.91649 13.0055 8.02207C13.2088 8.29188 13.4786 8.36227 13.7563 8.21758C13.9909 8.09636 14.0652 7.93995 14.1082 7.47853C14.1786 6.72774 14.0457 6.00823 13.7015 5.31219C13.4552 4.80775 13.2049 4.46755 12.8178 4.10389C12.0748 3.40002 11.1794 3.03245 10.1431 3.00507C9.86548 2.99725 9.5722 3.00116 9.4979 3.00898Z"
                                                                                                                                fill="#333333" />
                                                                                                                            <path
                                                                                                                                d="M9.54314 5.43202C9.05825 5.56106 8.62029 5.93645 8.39349 6.41352L8.26836 6.67942L8.25663 11.3992C8.25272 14.07 8.23316 16.1229 8.21361 16.1229C8.19406 16.1229 8.03374 15.9626 7.85386 15.7632C7.2282 15.0789 6.84499 14.8873 6.14503 14.9186C5.81656 14.9303 5.73053 14.9498 5.49982 15.0632C4.48704 15.552 4.17812 16.862 4.87807 17.7184C4.97583 17.8435 5.97689 18.9189 7.09525 20.1115C9.18338 22.3326 9.35544 22.4968 9.85988 22.7315C10.4191 22.9934 10.2978 22.9817 13.3284 22.9974C15.6237 23.0052 16.1321 22.9974 16.3863 22.9504C16.9885 22.837 17.4577 22.5868 17.9113 22.1449C18.4157 21.6483 18.6895 21.0656 18.7716 20.3188C18.7951 20.0685 18.8068 18.8328 18.799 16.7877L18.7833 13.6399L18.6973 13.4052C18.5096 12.9047 18.1303 12.5176 17.6415 12.326C17.3404 12.2087 16.7734 12.1969 16.4645 12.3064C16.2572 12.3768 16.2494 12.3768 16.2025 12.3064C15.9209 11.8998 15.6785 11.6925 15.2914 11.54C14.9942 11.4266 14.4233 11.4188 14.1183 11.5244C13.911 11.5947 13.9032 11.5947 13.8563 11.5244C13.5747 11.1177 13.3284 10.9104 12.9451 10.7618C12.7105 10.668 12.1983 10.6406 11.9167 10.6993L11.7681 10.7306V8.87313C11.7681 7.67265 11.7525 6.94142 11.7251 6.80846C11.5179 5.81132 10.5051 5.17393 9.54314 5.43202ZM10.3135 6.64814C10.3682 6.69115 10.4503 6.77327 10.4934 6.83193C10.5755 6.93751 10.5755 6.97661 10.595 10.668C10.6146 14.3633 10.6146 14.3985 10.6967 14.508C10.8727 14.7504 11.2246 14.8247 11.4553 14.6644C11.7486 14.4649 11.7447 14.4806 11.7681 13.2684C11.7877 12.2439 11.7916 12.1735 11.8698 12.0679C12.124 11.7238 12.6206 11.759 12.8435 12.1383C12.9139 12.2595 12.9217 12.3612 12.9412 13.3349C12.9608 14.332 12.9647 14.4024 13.0429 14.508C13.2971 14.8521 13.7937 14.8169 14.0166 14.4376C14.0831 14.3242 14.0987 14.2108 14.1143 13.632C14.13 13.0338 14.1417 12.9477 14.216 12.85C14.4702 12.5059 14.9668 12.5411 15.1897 12.9204C15.2562 13.0338 15.2718 13.1472 15.2875 13.7259C15.3031 14.3242 15.3148 14.4102 15.3891 14.508C15.5103 14.6722 15.7059 14.7621 15.9092 14.7426C16.2416 14.7074 16.4136 14.4845 16.4567 14.0309C16.4762 13.8315 16.5075 13.7024 16.5622 13.632C16.8164 13.2879 17.313 13.3231 17.5359 13.7024C17.6141 13.8315 17.6141 13.9058 17.6141 17.1005C17.6141 20.1975 17.6102 20.3774 17.5398 20.5808C17.3248 21.2103 16.8281 21.6639 16.2103 21.793C16.0695 21.8203 15.1662 21.8321 13.3479 21.8242C10.6928 21.8125 10.6928 21.8125 10.4738 21.7226C10.3526 21.6757 10.1727 21.5779 10.0749 21.5075C9.8325 21.3355 5.7931 17.038 5.72271 16.8776C5.60931 16.6156 5.69143 16.3419 5.9456 16.1542C6.059 16.0682 6.32882 16.0486 6.49305 16.1151C6.5478 16.1386 7.00531 16.5844 7.50584 17.1084C8.01027 17.6284 8.46388 18.0899 8.51862 18.125C8.65939 18.2228 8.97613 18.2189 9.13646 18.1172C9.20684 18.0781 9.29287 17.9843 9.33198 17.9139C9.39845 17.7927 9.40236 17.4877 9.42191 12.3416C9.44147 6.91404 9.44147 6.8984 9.52358 6.78891C9.70346 6.54256 10.0828 6.47608 10.3135 6.64814Z"
                                                                                                                                fill="#333333" />
                                                                                                                        </svg>
                                                                                                                    </div>
                                                                                                                    <p
                                                                                                                        class="mr-2 font-normal me-body-18 text-darkgray underline  cancer-markers-label-1-receipientData{{ $group->id }}{{ $recipient->id }} ">
                                                                                                                        {{ langbind($group, 'name') }} (<span
                                                                                                                            class="selected-cancermarkers-count-1-receipientData111">{{ $group->itemDatas($group->id, $recipient->id, $recipient->product->id)->sum('equivalent_number') }}</span>
                                                                                                                        @lang('labels.check_out.selected'))</p>
                                                                                                                    <div class="showDropdown-btn active">
                                                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                                                                            height="7" viewBox="0 0 12 7" fill="none">
                                                                                                                            <path
                                                                                                                                d="M0.042841 6.46313C0.14831 6.69047 0.413154 6.7936 0.649873 6.6975C0.713154 6.67172 1.46315 5.93344 3.36628 4.02094L5.99831 1.37719L8.628 4.02094C10.5358 5.93579 11.2835 6.67172 11.3467 6.6975C11.396 6.71625 11.478 6.73266 11.5296 6.73266C11.8671 6.73266 12.0944 6.39047 11.9538 6.08813C11.8905 5.95454 6.32878 0.367034 6.19753 0.308441C6.078 0.252191 5.91862 0.252191 5.79909 0.308441C5.66784 0.367034 0.106123 5.95453 0.042841 6.08813C-0.0134086 6.20766 -0.0134086 6.3436 0.042841 6.46313Z"
                                                                                                                                fill="#333333" />
                                                                                                                        </svg>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="hidden detail-data-list1-receipientData111">
                                                                                                            @foreach ($group->itemDatas($group->id, $recipient->id, $recipient->product->id) as $item)
                                                                                                                <div component-name="me-checkout-merchant-recipient-cancerMarkers-detail-list"
                                                                                                                    class="pl-8 mt-1">
                                                                                                                    <ul
                                                                                                                        class="custom-list-style bg-far px-5 py-[10px] rounded-[12px] cancerMarkers-detail-data1-receipientData111">
                                                                
                                                                                                                        <li class="flex items-center mt-2">
                                                                                                                            <span
                                                                                                                                class="mr-4 font-normal me-body-18 text-darkgray">{{ langbind($item, 'name') }}</span>
                                                                                                                            <!-- <span
                                                                                                                                                                                        class="font-normal me-body-18 text-darkgray">$600</span> -->
                                                                                                                        </li>
                                                                
                                                                
                                                                                                                    </ul>
                                                                                                                </div>
                                                                                                            @endforeach
                                                                                                        </div>
                                                                                                    </div>
                                                                                                @endforeach
                                                                                                @if (count($recipient->add_on_data) > 0)
                                                                                                    <div component-name="me-checkout-merchant-recipient-preferredTime-detail"
                                                                                                        class="mt-1">
                                                                                                        <div>
                                                                                                            <div class="flex w-full justify-between addson-show-detail-receipientData111"
                                                                                                                style="display:block">
                                                                                                                <div class="flex items-center w-full">
                                                                                                                    <div class="mr-2 max-w-[24px] w-[24px]">
                                                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                                                                            height="25" viewBox="0 0 24 25" fill="none">
                                                                                                                            <path
                                                                                                                                d="M12.5 21C17.1944 21 21 17.1944 21 12.5C21 7.80558 17.1944 4 12.5 4C7.80558 4 4 7.80558 4 12.5C4 17.1944 7.80558 21 12.5 21Z"
                                                                                                                                stroke="#333333" stroke-linecap="round"
                                                                                                                                stroke-linejoin="round" />
                                                                                                                            <path d="M12.4992 8.57715V16.4233M8.57617 12.5002H16.4223"
                                                                                                                                stroke="#333333" stroke-linecap="round"
                                                                                                                                stroke-linejoin="round" />
                                                                                                                        </svg>
                                                                                                                    </div>
                                                                                                                    <p data-id="receipientData111"
                                                                                                                        class="mr-2 font-normal me-body-18 text-darkgray underline">
                                                                                                                        @lang('labels.check_out.add_on') ({{count($recipient->add_on_data)}})</p>
                                                                                                                    <div class="showDropdown-btn active">
                                                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                                                                            height="7" viewBox="0 0 12 7" fill="none">
                                                                                                                            <path
                                                                                                                                d="M0.042841 6.46313C0.14831 6.69047 0.413154 6.7936 0.649873 6.6975C0.713154 6.67172 1.46315 5.93344 3.36628 4.02094L5.99831 1.37719L8.628 4.02094C10.5358 5.93579 11.2835 6.67172 11.3467 6.6975C11.396 6.71625 11.478 6.73266 11.5296 6.73266C11.8671 6.73266 12.0944 6.39047 11.9538 6.08813C11.8905 5.95454 6.32878 0.367034 6.19753 0.308441C6.078 0.252191 5.91862 0.252191 5.79909 0.308441C5.66784 0.367034 0.106123 5.95453 0.042841 6.08813C-0.0134086 6.20766 -0.0134086 6.3436 0.042841 6.46313Z"
                                                                                                                                fill="#333333" />
                                                                                                                        </svg>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                
                                                                                                        <div class=" addson-detail-list-receipientData111">
                                                                                                            <div component-name="me-checkout-merchant-recipient-addonItems-detail-list"
                                                                                                                class="pl-8 mt-1">
                                                                                                                <ul
                                                                                                                    class="custom-list-style bg-far px-5 py-[10px] rounded-[12px] adds-on-checklist-detailreceipientData111">
                                                                                                                    @foreach ($recipient->add_on_data as $item)
                                                                                                                        <li data-text="Upper Abdomen Ultrasound"
                                                                                                                            data-price="{{ $item->discount_price ? $item->discount_price : $item->original_price }}"
                                                                                                                            class="flex items-center mt-2">
                                                                                                                            <span
                                                                                                                                class="mr-4 font-normal me-body-18 text-darkgray">{{ langbind($item, 'name') }}</span>
                                                                                                                            <span
                                                                                                                                class="font-normal me-body-18 text-darkgray">${{ $item->discount_price ? $item->discount_price : $item->original_price }}</span>
                                                                                                                        </li>
                                                                                                                    @endforeach
                                                                                                                </ul>
                                                                                                            </div>
                                                                                                        </div>
                                                                
                                                                
                                                                                                        <div class="hidden">
                                                                                                            <input data-id="receipientData111" value="" type="hidden"
                                                                                                                class="addson-checklist addson-checklist-undefined addson-checklist-receipientData111" />
                                                                                                        </div>
                                                                                                    </div>
                                                                                                @endif
                                                                                                <div class="flex flex-wrap justify-between">
                                                                                                    @if($itemDetails->remark!="")
                                                                                                    <p class="my-1 font-normal me-body-18 text-darkgray mt-[10px] ">
                                                                                                        @lang('labels.check_out.special_requests'): {{ $itemDetails->remark }}</p>
                                                                                                    @endif
                                                                                                    <p class="my-1 font-bold me-body-18 text-darkgray mt-[10px] ">
                                                                                                        @lang('labels.booking_details.total'): ${{ $recipient->total }}</p>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div>
                                                                                                <div component-name="me-checkout-cancellation-reason"
                                                                                                    class="me-checkout-cancellation-reason mt-5">
                                                                                                    <p class="font-bold me-body-18 text-darkgray">
                                                                                                        @lang('labels.booking_details.reason')</p>
                                                                                                    <div class="mt-2 relative">
                                                                                                        <input type="hidden" class="cancellation-reason-1"
                                                                                                            name="reasons_cancelled{{ $itemDetails->id }}" value="">
                                                                                                        <p id="cancellation-reason-box"
                                                                                                            class="rounded-[4px] py-[0.6rem] px-5 me-body-18 text-lightgray font-normal border-1 border-meA3 cursor-pointer w-full cancellation-reason-box">
                                                                                                            <span class="pointer-events-none">@lang('labels.basic_info.please_select')</span>
                                                                                                        </p>
                                                                                                        <ul class="absolute top-[105%] cancellation-reason-box-list w-full z-[1]">
                                                                                                            @foreach (config('mediq.cancelation_reason_' . app()->getLocale()) as $k => $value)
                                                                                                                <li
                                                                                                                    class="font-normal me-body-18 text-darkgray px-5 py-[10px] cursor-pointer">
                                                                                                                    {{ $value }}</li>
                                                                                                            @endforeach
                                                                                                        </ul>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @else
                                                                            @if ($itemDetails->is_two_recipient != 1)
                                                                                <div
                                                                                    class="py-5 xl:px-5 flex sm:flex-nowrap flex-wrap items-center sm:mb-5 mb-10 pb-5 last:border-b last:sm:mb-10 last:mb-36 last:border-b-mee4 rounded-[4px] custom-order-boxshadow">
                                                                                    <div>
                                                                                        <label class="cursor-pointer inline-block relative mr-5 w-6 h-6"
                                                                                            for="cancellation-select-{{ $itemDetails->id }}">
                                                                                            <input type="checkbox"
                                                                                                class="cursor-pointer opacity-0 absolute w-full h-full cancellation-select"
                                                                                                name="cancellation_selectsingle[]" value={{ $itemDetails->id }}
                                                                                                id="cancellation-select-{{ $itemDetails->id }}">
                                                                                            <span class="custom-checkbox-orange absolute left-0 w-6 h-6"></span>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="mr-[10px]">
                                                                                        <img src="{{ $itemDetails->featured_img }}" alt="booking-logo"
                                                                                            class="2xl:max-w-[96px] 2xl:max-h-[96px] max-w-[50px] max-h-[50px] object-cover rounded-xl">
                                                                                    </div>
                                                                                    <div class="w-full">
                                                                                        <p class="me-body-20 font-bold text-darkgray"> <a href="{{ route('product-detail', ['category'=>$itemDetails->category_name_en,'slug'=>isset($itemDetails->slug_en) ? $itemDetails->slug_en : '']) }}">{{ @langbind($itemDetails, 'name') }}</a>
                                                                                        </p>
                                                                                        <div component-name="me-checkout-cancellation-card-content"
                                                                                            class="me-member-dashboard-booking-card-content">
                                                                
                                                                                            <div>
                                                                                                <div class="mt-2 bg-blueMediq px-3 py-2">
                                                                                                    <p class="font-bold me-body-16 text-whitez">
                                                                                                        @lang('labels.order_details.booking_id') {{ $itemDetails->booking_id }}</p>
                                                                                                </div>
                                                                                                <div class="mt-[10px]">
                                                                                                    <div class="payment-pending-div ">
                                                                                                        <div class="flex flex-wrap-reverse items-center justify-between">
                                                                                                            <div>
                                                                                                                <div class="flex items-start">
                                                                                                                    <div class="mr-[10px] mt-[2px]">
                                                                                                                        @if ($itemDetails->order_status == 4)
                                                                                                                            <img src="{{ asset('frontend/img/member-clapping.svg') }}"
                                                                                                                                alt="statusIcon" class="min-w-[16px]">
                                                                                                                        @elseif($itemDetails->order_status == 3)
                                                                                                                            <img src="{{ asset('frontend/img/member-check-circle.svg') }}"
                                                                                                                                alt="statusIcon" class="min-w-[16px]">
                                                                                                                        @elseif($itemDetails->order_status == 6)
                                                                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                                                                                height="21" viewBox="0 0 20 21" fill="none">
                                                                                                                                <path
                                                                                                                                    d="M9.10156 1.90966C7.59766 2.062 6.08203 2.65185 4.83594 3.57372C4.33203 3.94872 3.46484 4.812 3.09766 5.30419C1.39063 7.60888 0.91797 10.519 1.82031 13.23C2.82813 16.2651 5.42578 18.4604 8.65234 19.0034C9.25 19.1011 10.7813 19.1011 11.3477 18.9995C13.2148 18.6714 14.7891 17.8628 16.0742 16.5737C17.4883 15.1597 18.3398 13.3706 18.5586 11.3667C18.6211 10.7573 18.5859 9.64013 18.4805 9.03466C18.2344 7.64404 17.7031 6.41357 16.8516 5.28075C16.5664 4.90185 15.8633 4.16747 15.4609 3.83154C13.7383 2.39404 11.3789 1.6831 9.10156 1.90966ZM10.5859 3.27294C12.3086 3.42529 13.8711 4.14794 15.0742 5.35107C17.6719 7.94091 17.9492 11.9448 15.7266 14.894C15.4258 15.2964 14.7969 15.9253 14.3945 16.2261C12.8945 17.355 11.0664 17.8745 9.26172 17.687C6.73438 17.4214 4.55078 15.8901 3.46094 13.6245C2.50781 11.644 2.51172 9.3081 3.46875 7.32763C4.44141 5.31591 6.37109 3.82372 8.55469 3.39013C9.28906 3.2456 9.87891 3.21044 10.5859 3.27294Z"
                                                                                                                                    fill="#333333"></path>
                                                                                                                                <path
                                                                                                                                    d="M6.77734 6.94011C6.58984 7.02604 6.50781 7.11198 6.42578 7.30729C6.35156 7.48698 6.35156 7.65104 6.42578 7.83464C6.46875 7.92839 6.91406 8.40495 7.74609 9.23698L9.00391 10.4987L7.74609 11.7604C6.47656 13.03 6.36719 13.1628 6.36719 13.4245C6.36719 13.9167 6.93359 14.2487 7.375 14.0182C7.45312 13.9753 8.07422 13.3854 8.75 12.7096L9.98047 11.4753L11.2305 12.7214C11.918 13.405 12.5352 13.9948 12.6055 14.03C12.9961 14.2253 13.5117 13.9635 13.582 13.5339C13.6367 13.1823 13.6523 13.1979 12.2539 11.7995L10.9609 10.4987L12.2344 9.22136C13.5977 7.84636 13.6211 7.81511 13.582 7.46745C13.5469 7.15495 13.2266 6.86589 12.9102 6.86589C12.6562 6.86589 12.4883 7.00651 11.25 8.2487C10.5742 8.92839 10.0039 9.48308 9.98047 9.48308C9.95703 9.48308 9.38672 8.92839 8.71094 8.2487C7.26953 6.80339 7.19141 6.7487 6.77734 6.94011Z"
                                                                                                                                    fill="#333333"></path>
                                                                                                                            </svg>
                                                                                                                        @else
                                                                                                                            <img src="{{ asset('frontend/img/member-ast.svg') }}"
                                                                                                                                alt="statusIcon" class="min-w-[16px]">
                                                                                                                        @endif
                                                                                                                    </div>
                                                                                                                    @php
                                                                                                                        $textColor = '';
                                                                                                                        if ($itemDetails->order_status == 3) {
                                                                                                                            $textColor = 'text-meGreen';
                                                                                                                        } elseif ($itemDetails->order_status == 2) {
                                                                                                                            $textColor = 'text-darkgray';
                                                                                                                        } elseif ($itemDetails->order_status == 1) {
                                                                                                                            $textColor = 'text-mered';
                                                                                                                        }
                                                                                                                    @endphp
                                                                                                                    <p class="font-bold me-body-18 {{ $textColor }}">
                                                                                                                        {{ config('mediq.booking_status_' . app()->getLocale())[$itemDetails->order_status] }}
                                                                                                                    </p>
                                                                                                                </div>
                                                                                                                <div class="flex items-center mt-[10px]">
                                                                                                                    <div class="mr-[10px]">
                                                                                                                        <img src="{{ asset('frontend/img/member-user.svg') }}"
                                                                                                                            alt="member-user">
                                                                                                                    </div>
                                                                                                                    <p class="font-normal me-body-18 text-darkgray">
                                                                                                                        {{ $itemDetails->recipient->last_name }}
                                                                                                                        {{ $itemDetails->recipient->first_name }}
                                                                                                                    </p>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="flex items-center my-1">
                                                                                                                <div class="flex items-center pr-3">
                                                                                                                    <p
                                                                                                                        class="font-bold me-body-45 text-darkgray leading-[normal] booking-selected-dayno">
                                                                                                                        {{ $itemDetails->confirm_booking_date != null ? date('j', strtotime($itemDetails->confirm_booking_date)) : '' }}
                                                                                                                    </p>
                                                                                                                    <p
                                                                                                                        class="font-bold me-body-16 text-darkgray max-w-[30px] leading-[normal] booking-selected-month-day">
                                                                                                                        {{ $itemDetails->confirm_booking_date != null ? date('M', strtotime($itemDetails->confirm_booking_date)) : '' }}
                                                                                                                        {{ $itemDetails->confirm_booking_date != null ? date('D', strtotime($itemDetails->confirm_booking_date)) : '' }}
                                                                                                                    </p>
                                                                                                                </div>
                                                                                                                <div class="border-l-1 border-l-mee4 pl-3">
                                                                                                                    <p
                                                                                                                        class="font-bold me-body-28 text-darkgray leading-[normal] booking-selected-time">
                                                                                                                        {{ $itemDetails->confirm_booking_time !== null ? $itemDetails->confirm_booking_time : '' }}
                                                                                                                    </p>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                
                                                                                                    @php
                                                                                                        $recipient = App\Models\Recipient::select('recipients.*', 'order_items.total')
                                                                                                            ->join('products', 'recipients.product_id', '=', 'products.id')
                                                                                                            ->join('order_items', 'order_items.recipient_id', 'recipients.id')
                                                                                                            ->where('recipients.id', $itemDetails->recipient_id)
                                                                                                            ->first();
                                                                                                        $product = App\Models\Product::find($itemDetails->product_id);
                                                                                                        $location = App\Models\MerchantLocation::where('area_id', $itemDetails->confirm_location)
                                                                                                            ->where('merchant_id', $product->merchant->id)
                                                                                                            ->first();
                                                                                                        
                                                                                                    @endphp
                                                                                                    @if ($itemDetails->confirm_booking_date!=null)
                                                                                                        <div class="mt-[5px] flex items-center ">
                                                                                                            <div class="mr-[10px]">
                                                                                                                <img src="{{ asset('frontend/img/member-location.png') }}"
                                                                                                                    alt="member-location" class="min-w-[20px]">
                                                                                                            </div>
                                                                                                            <p
                                                                                                                class="font-normal me-body-18 text-darkgray leading-[normal] @@classname">
                                                                                                                {{ @langbind($location, 'full_address') }}
                                                                                                            </p>
                                                                                                        </div>
                                                                
                                                                
                                                                                                        <div class="mt-[5px] flex items-center ">
                                                                                                            <div class="mr-[10px]">
                                                                                                                <img src="{{ asset('frontend/img/member-other.svg') }}"
                                                                                                                    alt="member-other" class="min-w-[20px]">
                                                                                                            </div>
                                                                                                            <p
                                                                                                                class="font-normal me-body-18 text-darkgray leading-[normal] @@classname">
                                                                                                                {{ @langbind($location, 'station') }}</p>
                                                                                                        </div>
                                                                                                    @endif
                                                                                                    @foreach ($recipient->group_data as $group)
                                                                                                        @php
                                                                                                            $checkUpTable = $recipient->product->package->checkupTable;
                                                                                                            $tablePriIds = App\Models\CheckUpTableType::where('check_up_type_id', 2)
                                                                                                                ->where('check_up_table_id', $checkUpTable->id)
                                                                                                                ->pluck('id')
                                                                                                                ->toArray();
                                                                                                            $optionGroupIds = App\Models\CheckTableItem::where('check_up_group_id', $group->id)
                                                                                                                ->whereIn('check_up_table_type_id', $tablePriIds)
                                                                                                                ->distinct()
                                                                                                                ->pluck('check_up_item_id')
                                                                                                                ->toArray();
                                                                                                            $countEquivalentNumber = App\Models\CheckUpItem::whereIn('id', $optionGroupIds)->sum('equivalent_number');
                                                                                                        @endphp
                                                                                                        <div component-name="me-checkout-merchant-recipient-cancerMarker-detail"
                                                                                                            class="mt-1">
                                                                                                            <div class="flex sm:flex-row flex-col">
                                                                
                                                                                                                <div
                                                                                                                    class="flex w-full justify-between cancer-markers-detail-data1-receipientData111">
                                                                                                                    <div class="flex items-center w-full">
                                                                                                                        <div class="mr-2 max-w-[24px] w-[24px]">
                                                                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                                                                                height="25" viewBox="0 0 24 25" fill="none">
                                                                                                                                <path
                                                                                                                                    d="M9.4979 3.00898C8.94263 3.08328 8.22312 3.3531 7.73824 3.66984C7.3824 3.90446 6.83104 4.44409 6.60815 4.77647C6.38525 5.10885 6.15845 5.58982 6.02941 6.01605C5.93165 6.34452 5.92383 6.41882 5.91992 7.0914C5.91992 7.72097 5.92774 7.83437 5.99422 7.96341C6.20929 8.39746 6.8193 8.40919 7.03046 7.98296C7.09694 7.8461 7.10085 7.7718 7.08521 7.28692C7.05784 6.66126 7.11258 6.36407 7.32765 5.89092C7.49189 5.53508 7.65221 5.30046 7.91812 5.03846C8.81359 4.13908 10.1431 3.91228 11.2849 4.45582C12.0475 4.81948 12.6497 5.55072 12.8647 6.38363C12.9273 6.61043 12.9429 6.78639 12.939 7.1305C12.9234 7.90476 12.9273 7.91649 13.0055 8.02207C13.2088 8.29188 13.4786 8.36227 13.7563 8.21758C13.9909 8.09636 14.0652 7.93995 14.1082 7.47853C14.1786 6.72774 14.0457 6.00823 13.7015 5.31219C13.4552 4.80775 13.2049 4.46755 12.8178 4.10389C12.0748 3.40002 11.1794 3.03245 10.1431 3.00507C9.86548 2.99725 9.5722 3.00116 9.4979 3.00898Z"
                                                                                                                                    fill="#333333" />
                                                                                                                                <path
                                                                                                                                    d="M9.54314 5.43202C9.05825 5.56106 8.62029 5.93645 8.39349 6.41352L8.26836 6.67942L8.25663 11.3992C8.25272 14.07 8.23316 16.1229 8.21361 16.1229C8.19406 16.1229 8.03374 15.9626 7.85386 15.7632C7.2282 15.0789 6.84499 14.8873 6.14503 14.9186C5.81656 14.9303 5.73053 14.9498 5.49982 15.0632C4.48704 15.552 4.17812 16.862 4.87807 17.7184C4.97583 17.8435 5.97689 18.9189 7.09525 20.1115C9.18338 22.3326 9.35544 22.4968 9.85988 22.7315C10.4191 22.9934 10.2978 22.9817 13.3284 22.9974C15.6237 23.0052 16.1321 22.9974 16.3863 22.9504C16.9885 22.837 17.4577 22.5868 17.9113 22.1449C18.4157 21.6483 18.6895 21.0656 18.7716 20.3188C18.7951 20.0685 18.8068 18.8328 18.799 16.7877L18.7833 13.6399L18.6973 13.4052C18.5096 12.9047 18.1303 12.5176 17.6415 12.326C17.3404 12.2087 16.7734 12.1969 16.4645 12.3064C16.2572 12.3768 16.2494 12.3768 16.2025 12.3064C15.9209 11.8998 15.6785 11.6925 15.2914 11.54C14.9942 11.4266 14.4233 11.4188 14.1183 11.5244C13.911 11.5947 13.9032 11.5947 13.8563 11.5244C13.5747 11.1177 13.3284 10.9104 12.9451 10.7618C12.7105 10.668 12.1983 10.6406 11.9167 10.6993L11.7681 10.7306V8.87313C11.7681 7.67265 11.7525 6.94142 11.7251 6.80846C11.5179 5.81132 10.5051 5.17393 9.54314 5.43202ZM10.3135 6.64814C10.3682 6.69115 10.4503 6.77327 10.4934 6.83193C10.5755 6.93751 10.5755 6.97661 10.595 10.668C10.6146 14.3633 10.6146 14.3985 10.6967 14.508C10.8727 14.7504 11.2246 14.8247 11.4553 14.6644C11.7486 14.4649 11.7447 14.4806 11.7681 13.2684C11.7877 12.2439 11.7916 12.1735 11.8698 12.0679C12.124 11.7238 12.6206 11.759 12.8435 12.1383C12.9139 12.2595 12.9217 12.3612 12.9412 13.3349C12.9608 14.332 12.9647 14.4024 13.0429 14.508C13.2971 14.8521 13.7937 14.8169 14.0166 14.4376C14.0831 14.3242 14.0987 14.2108 14.1143 13.632C14.13 13.0338 14.1417 12.9477 14.216 12.85C14.4702 12.5059 14.9668 12.5411 15.1897 12.9204C15.2562 13.0338 15.2718 13.1472 15.2875 13.7259C15.3031 14.3242 15.3148 14.4102 15.3891 14.508C15.5103 14.6722 15.7059 14.7621 15.9092 14.7426C16.2416 14.7074 16.4136 14.4845 16.4567 14.0309C16.4762 13.8315 16.5075 13.7024 16.5622 13.632C16.8164 13.2879 17.313 13.3231 17.5359 13.7024C17.6141 13.8315 17.6141 13.9058 17.6141 17.1005C17.6141 20.1975 17.6102 20.3774 17.5398 20.5808C17.3248 21.2103 16.8281 21.6639 16.2103 21.793C16.0695 21.8203 15.1662 21.8321 13.3479 21.8242C10.6928 21.8125 10.6928 21.8125 10.4738 21.7226C10.3526 21.6757 10.1727 21.5779 10.0749 21.5075C9.8325 21.3355 5.7931 17.038 5.72271 16.8776C5.60931 16.6156 5.69143 16.3419 5.9456 16.1542C6.059 16.0682 6.32882 16.0486 6.49305 16.1151C6.5478 16.1386 7.00531 16.5844 7.50584 17.1084C8.01027 17.6284 8.46388 18.0899 8.51862 18.125C8.65939 18.2228 8.97613 18.2189 9.13646 18.1172C9.20684 18.0781 9.29287 17.9843 9.33198 17.9139C9.39845 17.7927 9.40236 17.4877 9.42191 12.3416C9.44147 6.91404 9.44147 6.8984 9.52358 6.78891C9.70346 6.54256 10.0828 6.47608 10.3135 6.64814Z"
                                                                                                                                    fill="#333333" />
                                                                                                                            </svg>
                                                                                                                        </div>
                                                                                                                        <p
                                                                                                                            class="mr-2 font-normal me-body-18 text-darkgray underline  cancer-markers-label-1-receipientData{{ $group->id }}{{ $recipient->id }} ">
                                                                                                                            {{ langbind($group, 'name') }} (<span
                                                                                                                                class="selected-cancermarkers-count-1-receipientData111">{{ $group->itemDatas($group->id, $recipient->id, $recipient->product->id)->sum('equivalent_number') }}</span>
                                                                                                                            @lang('labels.check_out.selected'))</p>
                                                                                                                        <div class="showDropdown-btn active">
                                                                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                                                                                height="7" viewBox="0 0 12 7" fill="none">
                                                                                                                                <path
                                                                                                                                    d="M0.042841 6.46313C0.14831 6.69047 0.413154 6.7936 0.649873 6.6975C0.713154 6.67172 1.46315 5.93344 3.36628 4.02094L5.99831 1.37719L8.628 4.02094C10.5358 5.93579 11.2835 6.67172 11.3467 6.6975C11.396 6.71625 11.478 6.73266 11.5296 6.73266C11.8671 6.73266 12.0944 6.39047 11.9538 6.08813C11.8905 5.95454 6.32878 0.367034 6.19753 0.308441C6.078 0.252191 5.91862 0.252191 5.79909 0.308441C5.66784 0.367034 0.106123 5.95453 0.042841 6.08813C-0.0134086 6.20766 -0.0134086 6.3436 0.042841 6.46313Z"
                                                                                                                                    fill="#333333" />
                                                                                                                            </svg>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="hidden detail-data-list1-receipientData111">
                                                                                                                @foreach ($group->itemDatas($group->id, $recipient->id, $recipient->product->id) as $item)
                                                                                                                    <div component-name="me-checkout-merchant-recipient-cancerMarkers-detail-list"
                                                                                                                        class="pl-8 mt-1">
                                                                                                                        <ul
                                                                                                                            class="custom-list-style bg-far px-5 py-[10px] rounded-[12px] cancerMarkers-detail-data1-receipientData111">
                                                                
                                                                                                                            <li class="flex items-center mt-2">
                                                                                                                                <span
                                                                                                                                    class="mr-4 font-normal me-body-18 text-darkgray">{{ langbind($item, 'name') }}</span>
                                                                                                                                <!-- <span
                                                                                                                                                                                        class="font-normal me-body-18 text-darkgray">$600</span> -->
                                                                                                                            </li>
                                                                
                                                                
                                                                                                                        </ul>
                                                                                                                    </div>
                                                                                                                @endforeach
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    @endforeach
                                                                                                    @if (count($recipient->add_on_data) > 0)
                                                                                                        <div component-name="me-checkout-merchant-recipient-preferredTime-detail"
                                                                                                            class="mt-1">
                                                                                                            <div>
                                                                                                                <div class="flex w-full justify-between addson-show-detail-receipientData111"
                                                                                                                    style="display:block">
                                                                                                                    <div class="flex items-center w-full">
                                                                                                                        <div class="mr-2 max-w-[24px] w-[24px]">
                                                                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                                                                                height="25" viewBox="0 0 24 25" fill="none">
                                                                                                                                <path
                                                                                                                                    d="M12.5 21C17.1944 21 21 17.1944 21 12.5C21 7.80558 17.1944 4 12.5 4C7.80558 4 4 7.80558 4 12.5C4 17.1944 7.80558 21 12.5 21Z"
                                                                                                                                    stroke="#333333" stroke-linecap="round"
                                                                                                                                    stroke-linejoin="round" />
                                                                                                                                <path
                                                                                                                                    d="M12.4992 8.57715V16.4233M8.57617 12.5002H16.4223"
                                                                                                                                    stroke="#333333" stroke-linecap="round"
                                                                                                                                    stroke-linejoin="round" />
                                                                                                                            </svg>
                                                                                                                        </div>
                                                                                                                        <p data-id="receipientData111"
                                                                                                                            class="mr-2 font-normal me-body-18 text-darkgray underline">
                                                                                                                            @lang('labels.check_out.add_on') ({{count($recipient->add_on_data)}})</p>
                                                                                                                        <div class="showDropdown-btn active">
                                                                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                                                                                height="7" viewBox="0 0 12 7" fill="none">
                                                                                                                                <path
                                                                                                                                    d="M0.042841 6.46313C0.14831 6.69047 0.413154 6.7936 0.649873 6.6975C0.713154 6.67172 1.46315 5.93344 3.36628 4.02094L5.99831 1.37719L8.628 4.02094C10.5358 5.93579 11.2835 6.67172 11.3467 6.6975C11.396 6.71625 11.478 6.73266 11.5296 6.73266C11.8671 6.73266 12.0944 6.39047 11.9538 6.08813C11.8905 5.95454 6.32878 0.367034 6.19753 0.308441C6.078 0.252191 5.91862 0.252191 5.79909 0.308441C5.66784 0.367034 0.106123 5.95453 0.042841 6.08813C-0.0134086 6.20766 -0.0134086 6.3436 0.042841 6.46313Z"
                                                                                                                                    fill="#333333" />
                                                                                                                            </svg>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                
                                                                                                            <div class=" addson-detail-list-receipientData111">
                                                                                                                <div component-name="me-checkout-merchant-recipient-addonItems-detail-list"
                                                                                                                    class="pl-8 mt-1">
                                                                                                                    <ul
                                                                                                                        class="custom-list-style bg-far px-5 py-[10px] rounded-[12px] adds-on-checklist-detailreceipientData111">
                                                                                                                        @foreach ($recipient->add_on_data as $item)
                                                                                                                            <li data-text="Upper Abdomen Ultrasound"
                                                                                                                                data-price="{{ $item->discount_price ? $item->discount_price : $item->original_price }}"
                                                                                                                                class="flex items-center mt-2">
                                                                                                                                <span
                                                                                                                                    class="mr-4 font-normal me-body-18 text-darkgray">{{ langbind($item, 'name') }}</span>
                                                                                                                                <span
                                                                                                                                    class="font-normal me-body-18 text-darkgray">${{ $item->discount_price ? $item->discount_price : $item->original_price }}</span>
                                                                                                                            </li>
                                                                                                                        @endforeach
                                                                                                                    </ul>
                                                                                                                </div>
                                                                                                            </div>
                                                                
                                                                
                                                                                                            <div class="hidden">
                                                                                                                <input data-id="receipientData111" value="" type="hidden"
                                                                                                                    class="addson-checklist addson-checklist-undefined addson-checklist-receipientData111" />
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    @endif
                                                                                                    <div class="flex flex-wrap justify-between">
                                                                                                        @if($itemDetails->remark!="")
                                                                                                        <p class="my-1 font-normal me-body-18 text-darkgray mt-[10px] ">
                                                                                                            @lang('labels.check_out.special_requests'): {{ $itemDetails->remark }}</p>
                                                                                                        @endif
                                                                                                        <p class="my-1 font-bold me-body-18 text-darkgray mt-[10px] ">
                                                                                                            @lang('labels.booking_details.total'): ${{ $recipient->total }}</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div>
                                                                                                    <div component-name="me-checkout-cancellation-reason"
                                                                                                        class="me-checkout-cancellation-reason mt-5">
                                                                                                        <p class="font-bold me-body-18 text-darkgray">
                                                                                                            @lang('labels.booking_details.reason')</p>
                                                                                                        <div class="mt-2 relative">
                                                                                                            <input type="hidden" class="cancellation-reason-1"
                                                                                                                name="reasons_cancelled{{ $itemDetails->id }}" value="">
                                                                                                            <p id="cancellation-reason-box"
                                                                                                                class="rounded-[4px] py-[0.6rem] px-5 me-body-18 text-lightgray font-normal border-1 border-meA3 cursor-pointer w-full cancellation-reason-box">
                                                                                                                <span class="pointer-events-none">@lang('labels.basic_info.please_select')</span>
                                                                                                            </p>
                                                                                                            <ul class="absolute top-[105%] cancellation-reason-box-list w-full z-[1]">
                                                                                                                @foreach (config('mediq.cancelation_reason_' . app()->getLocale()) as $k => $value)
                                                                                                                    <li
                                                                                                                        class="font-normal me-body-18 text-darkgray px-5 py-[10px] cursor-pointer">
                                                                                                                        {{ $value }}</li>
                                                                                                                @endforeach
                                                                                                            </ul>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @endif
                                                                        @endif
                                                                    @endif
                                                            @else
                                                                    @if ($itemDetails->is_two_recipient == 1 && in_array($itemDetails->recipient_id, $twoPersonCouponHaveShowList) == false)
                                                                        @php
                                                                            $recipientsIds = [];
                                                                            $recipientsIds = App\Models\OrderItems::select('recipient_id')
                                                                                ->where('orders_id', $itemDetails->orders_id)
                                                                                ->where('product_id', $itemDetails->product_id)
                                                                                ->whereIn('order_status', [1, 2, 3])
                                                                                ->pluck('recipient_id')
                                                                                ->toArray();
                                                                            $index = array_search($itemDetails->recipient_id, $recipientsIds);
                                                                            $twopersondataId = $recipientsIds[$index + 1];
                                                                            
                                                                            array_push($twoPersonCouponHaveShowList, $twopersondataId);
                                                                        @endphp
                                                                        <div
                                                                            class="py-5 xl:px-5 flex sm:flex-nowrap flex-wrap items-center sm:mb-5 mb-10 pb-5 last:border-b last:sm:mb-10 last:mb-36 last:border-b-mee4 rounded-[4px] custom-order-boxshadow">
                                                                            <div>
                                                                                <label class="cursor-pointer inline-block relative mr-5 w-6 h-6"
                                                                                    for="cancellation-select-{{ $itemDetails->id }}">
                                                                                    <input type="checkbox" class="cursor-pointer opacity-0 absolute w-full h-full cancellation-select"
                                                                                        name="cancellation_selectsingle[]" value={{ $itemDetails->id }}
                                                                                        id="cancellation-select-{{ $itemDetails->id }}">
                                                                                    <span class="custom-checkbox-orange absolute left-0 w-6 h-6"></span>
                                                                                </label>
                                                                            </div>
                                                                            <div class="mr-[10px]">
                                                                                <img src="{{ $itemDetails->featured_img }}" alt="booking-logo"
                                                                                    class="2xl:max-w-[96px] 2xl:max-h-[96px] max-w-[50px] max-h-[50px] object-cover rounded-xl">
                                                                            </div>
                                                                            <div class="w-full">
                                                                                <p class="me-body-20 font-bold text-darkgray"> <a href="{{ route('product-detail', ['category'=>$itemDetails->category_name_en,'slug'=>isset($itemDetails->slug_en) ? $itemDetails->slug_en : '']) }}">{{ @langbind($itemDetails, 'name') }}</a>
                                                                                </p>
                                                                                <div component-name="me-checkout-cancellation-card-content"
                                                                                    class="me-member-dashboard-booking-card-content">
                                                                
                                                                                    <div>
                                                                                        <div class="mt-2 bg-blueMediq px-3 py-2">
                                                                                            <p class="font-bold me-body-16 text-whitez">
                                                                                                @lang('labels.order_details.booking_id') {{ $itemDetails->booking_id }}</p>
                                                                                        </div>
                                                                                        <div class="mt-[10px]">
                                                                                            <div class="payment-pending-div ">
                                                                                                <div class="flex flex-wrap-reverse items-center justify-between">
                                                                                                    <div>
                                                                                                        <div class="flex items-start">
                                                                                                            <div class="mr-[10px] mt-[2px]">
                                                                                                                @if ($itemDetails->order_status == 4)
                                                                                                                    <img src="{{ asset('frontend/img/member-clapping.svg') }}"
                                                                                                                        alt="statusIcon" class="min-w-[16px]">
                                                                                                                @elseif($itemDetails->order_status == 3)
                                                                                                                    <img src="{{ asset('frontend/img/member-check-circle.svg') }}"
                                                                                                                        alt="statusIcon" class="min-w-[16px]">
                                                                                                                @elseif($itemDetails->order_status == 6)
                                                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                                                                        height="21" viewBox="0 0 20 21" fill="none">
                                                                                                                        <path
                                                                                                                            d="M9.10156 1.90966C7.59766 2.062 6.08203 2.65185 4.83594 3.57372C4.33203 3.94872 3.46484 4.812 3.09766 5.30419C1.39063 7.60888 0.91797 10.519 1.82031 13.23C2.82813 16.2651 5.42578 18.4604 8.65234 19.0034C9.25 19.1011 10.7813 19.1011 11.3477 18.9995C13.2148 18.6714 14.7891 17.8628 16.0742 16.5737C17.4883 15.1597 18.3398 13.3706 18.5586 11.3667C18.6211 10.7573 18.5859 9.64013 18.4805 9.03466C18.2344 7.64404 17.7031 6.41357 16.8516 5.28075C16.5664 4.90185 15.8633 4.16747 15.4609 3.83154C13.7383 2.39404 11.3789 1.6831 9.10156 1.90966ZM10.5859 3.27294C12.3086 3.42529 13.8711 4.14794 15.0742 5.35107C17.6719 7.94091 17.9492 11.9448 15.7266 14.894C15.4258 15.2964 14.7969 15.9253 14.3945 16.2261C12.8945 17.355 11.0664 17.8745 9.26172 17.687C6.73438 17.4214 4.55078 15.8901 3.46094 13.6245C2.50781 11.644 2.51172 9.3081 3.46875 7.32763C4.44141 5.31591 6.37109 3.82372 8.55469 3.39013C9.28906 3.2456 9.87891 3.21044 10.5859 3.27294Z"
                                                                                                                            fill="#333333"></path>
                                                                                                                        <path
                                                                                                                            d="M6.77734 6.94011C6.58984 7.02604 6.50781 7.11198 6.42578 7.30729C6.35156 7.48698 6.35156 7.65104 6.42578 7.83464C6.46875 7.92839 6.91406 8.40495 7.74609 9.23698L9.00391 10.4987L7.74609 11.7604C6.47656 13.03 6.36719 13.1628 6.36719 13.4245C6.36719 13.9167 6.93359 14.2487 7.375 14.0182C7.45312 13.9753 8.07422 13.3854 8.75 12.7096L9.98047 11.4753L11.2305 12.7214C11.918 13.405 12.5352 13.9948 12.6055 14.03C12.9961 14.2253 13.5117 13.9635 13.582 13.5339C13.6367 13.1823 13.6523 13.1979 12.2539 11.7995L10.9609 10.4987L12.2344 9.22136C13.5977 7.84636 13.6211 7.81511 13.582 7.46745C13.5469 7.15495 13.2266 6.86589 12.9102 6.86589C12.6562 6.86589 12.4883 7.00651 11.25 8.2487C10.5742 8.92839 10.0039 9.48308 9.98047 9.48308C9.95703 9.48308 9.38672 8.92839 8.71094 8.2487C7.26953 6.80339 7.19141 6.7487 6.77734 6.94011Z"
                                                                                                                            fill="#333333"></path>
                                                                                                                    </svg>
                                                                                                                @else
                                                                                                                    <img src="{{ asset('frontend/img/member-ast.svg') }}"
                                                                                                                        alt="statusIcon" class="min-w-[16px]">
                                                                                                                @endif
                                                                                                            </div>
                                                                                                            @php
                                                                                                                $textColor = '';
                                                                                                                if ($itemDetails->order_status == 3) {
                                                                                                                    $textColor = 'text-meGreen';
                                                                                                                } elseif ($itemDetails->order_status == 2) {
                                                                                                                    $textColor = 'text-darkgray';
                                                                                                                } elseif ($itemDetails->order_status == 1) {
                                                                                                                    $textColor = 'text-mered';
                                                                                                                }
                                                                                                            @endphp
                                                                                                            <p class="font-bold me-body-18 {{ $textColor }}">
                                                                                                                {{ config('mediq.booking_status_' . app()->getLocale())[$itemDetails->order_status] }}
                                                                                                            </p>
                                                                                                        </div>
                                                                                                        <div class="flex items-center mt-[10px]">
                                                                                                            <div class="mr-[10px]">
                                                                                                                <img src="{{ asset('frontend/img/member-user.svg') }}"
                                                                                                                    alt="member-user">
                                                                                                            </div>
                                                                                                            <p class="font-normal me-body-18 text-darkgray">
                                                                                                                {{ $itemDetails->recipient->last_name }}
                                                                                                                {{ $itemDetails->recipient->first_name }}
                                                                                                            </p>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="flex items-center my-1">
                                                                                                        <div class="flex items-center pr-3">
                                                                                                            <p
                                                                                                                class="font-bold me-body-45 text-darkgray leading-[normal] booking-selected-dayno">
                                                                                                                {{ $itemDetails->confirm_booking_date != null ? date('j', strtotime($itemDetails->confirm_booking_date)) : '' }}
                                                                                                            </p>
                                                                                                            <p
                                                                                                                class="font-bold me-body-16 text-darkgray max-w-[30px] leading-[normal] booking-selected-month-day">
                                                                                                                {{ $itemDetails->confirm_booking_date != null ? date('M', strtotime($itemDetails->confirm_booking_date)) : '' }}
                                                                                                                {{ $itemDetails->confirm_booking_date != null ? date('D', strtotime($itemDetails->confirm_booking_date)) : '' }}
                                                                                                            </p>
                                                                                                        </div>
                                                                                                        <div class="border-l-1 border-l-mee4 pl-3">
                                                                                                            <p
                                                                                                                class="font-bold me-body-28 text-darkgray leading-[normal] booking-selected-time">
                                                                                                                {{ $itemDetails->confirm_booking_time !== null ? $itemDetails->confirm_booking_time : '' }}
                                                                                                            </p>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                
                                                                                            @php
                                                                                                $recipient = App\Models\Recipient::select('recipients.*', 'order_items.total')
                                                                                                    ->join('products', 'recipients.product_id', '=', 'products.id')
                                                                                                    ->join('order_items', 'order_items.recipient_id', 'recipients.id')
                                                                                                    ->where('recipients.id', $itemDetails->recipient_id)
                                                                                                    ->first();
                                                                                                $product = App\Models\Product::find($itemDetails->product_id);
                                                                                                $location = App\Models\MerchantLocation::where('area_id', $itemDetails->confirm_location)
                                                                                                    ->where('merchant_id', $product->merchant->id)
                                                                                                    ->first();
                                                                                                
                                                                                            @endphp
                                                                                            @if ($itemDetails->confirm_booking_date!=null)
                                                                                                <div class="mt-[5px] flex items-center ">
                                                                                                    <div class="mr-[10px]">
                                                                                                        <img src="{{ asset('frontend/img/member-location.png') }}"
                                                                                                            alt="member-location" class="min-w-[20px]">
                                                                                                    </div>
                                                                                                    <p
                                                                                                        class="font-normal me-body-18 text-darkgray leading-[normal] @@classname">
                                                                                                        {{ @langbind($location, 'full_address') }}
                                                                                                    </p>
                                                                                                </div>
                                                                
                                                                
                                                                                                <div class="mt-[5px] flex items-center ">
                                                                                                    <div class="mr-[10px]">
                                                                                                        <img src="{{ asset('frontend/img/member-other.svg') }}" alt="member-other"
                                                                                                            class="min-w-[20px]">
                                                                                                    </div>
                                                                                                    <p
                                                                                                        class="font-normal me-body-18 text-darkgray leading-[normal] @@classname">
                                                                                                        {{ @langbind($location, 'station') }}</p>
                                                                                                </div>
                                                                                            @endif
                                                                                            @foreach ($recipient->group_data as $group)
                                                                                                @php
                                                                                                    $checkUpTable = $recipient->product->package->checkupTable;
                                                                                                    $tablePriIds = App\Models\CheckUpTableType::where('check_up_type_id', 2)
                                                                                                        ->where('check_up_table_id', $checkUpTable->id)
                                                                                                        ->pluck('id')
                                                                                                        ->toArray();
                                                                                                    $optionGroupIds = App\Models\CheckTableItem::where('check_up_group_id', $group->id)
                                                                                                        ->whereIn('check_up_table_type_id', $tablePriIds)
                                                                                                        ->distinct()
                                                                                                        ->pluck('check_up_item_id')
                                                                                                        ->toArray();
                                                                                                    $countEquivalentNumber = App\Models\CheckUpItem::whereIn('id', $optionGroupIds)->sum('equivalent_number');
                                                                                                @endphp
                                                                                                <div component-name="me-checkout-merchant-recipient-cancerMarker-detail"
                                                                                                    class="mt-1">
                                                                                                    <div class="flex sm:flex-row flex-col">
                                                                
                                                                                                        <div
                                                                                                            class="flex w-full justify-between cancer-markers-detail-data1-receipientData111">
                                                                                                            <div class="flex items-center w-full">
                                                                                                                <div class="mr-2 max-w-[24px] w-[24px]">
                                                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                                                                        height="25" viewBox="0 0 24 25" fill="none">
                                                                                                                        <path
                                                                                                                            d="M9.4979 3.00898C8.94263 3.08328 8.22312 3.3531 7.73824 3.66984C7.3824 3.90446 6.83104 4.44409 6.60815 4.77647C6.38525 5.10885 6.15845 5.58982 6.02941 6.01605C5.93165 6.34452 5.92383 6.41882 5.91992 7.0914C5.91992 7.72097 5.92774 7.83437 5.99422 7.96341C6.20929 8.39746 6.8193 8.40919 7.03046 7.98296C7.09694 7.8461 7.10085 7.7718 7.08521 7.28692C7.05784 6.66126 7.11258 6.36407 7.32765 5.89092C7.49189 5.53508 7.65221 5.30046 7.91812 5.03846C8.81359 4.13908 10.1431 3.91228 11.2849 4.45582C12.0475 4.81948 12.6497 5.55072 12.8647 6.38363C12.9273 6.61043 12.9429 6.78639 12.939 7.1305C12.9234 7.90476 12.9273 7.91649 13.0055 8.02207C13.2088 8.29188 13.4786 8.36227 13.7563 8.21758C13.9909 8.09636 14.0652 7.93995 14.1082 7.47853C14.1786 6.72774 14.0457 6.00823 13.7015 5.31219C13.4552 4.80775 13.2049 4.46755 12.8178 4.10389C12.0748 3.40002 11.1794 3.03245 10.1431 3.00507C9.86548 2.99725 9.5722 3.00116 9.4979 3.00898Z"
                                                                                                                            fill="#333333" />
                                                                                                                        <path
                                                                                                                            d="M9.54314 5.43202C9.05825 5.56106 8.62029 5.93645 8.39349 6.41352L8.26836 6.67942L8.25663 11.3992C8.25272 14.07 8.23316 16.1229 8.21361 16.1229C8.19406 16.1229 8.03374 15.9626 7.85386 15.7632C7.2282 15.0789 6.84499 14.8873 6.14503 14.9186C5.81656 14.9303 5.73053 14.9498 5.49982 15.0632C4.48704 15.552 4.17812 16.862 4.87807 17.7184C4.97583 17.8435 5.97689 18.9189 7.09525 20.1115C9.18338 22.3326 9.35544 22.4968 9.85988 22.7315C10.4191 22.9934 10.2978 22.9817 13.3284 22.9974C15.6237 23.0052 16.1321 22.9974 16.3863 22.9504C16.9885 22.837 17.4577 22.5868 17.9113 22.1449C18.4157 21.6483 18.6895 21.0656 18.7716 20.3188C18.7951 20.0685 18.8068 18.8328 18.799 16.7877L18.7833 13.6399L18.6973 13.4052C18.5096 12.9047 18.1303 12.5176 17.6415 12.326C17.3404 12.2087 16.7734 12.1969 16.4645 12.3064C16.2572 12.3768 16.2494 12.3768 16.2025 12.3064C15.9209 11.8998 15.6785 11.6925 15.2914 11.54C14.9942 11.4266 14.4233 11.4188 14.1183 11.5244C13.911 11.5947 13.9032 11.5947 13.8563 11.5244C13.5747 11.1177 13.3284 10.9104 12.9451 10.7618C12.7105 10.668 12.1983 10.6406 11.9167 10.6993L11.7681 10.7306V8.87313C11.7681 7.67265 11.7525 6.94142 11.7251 6.80846C11.5179 5.81132 10.5051 5.17393 9.54314 5.43202ZM10.3135 6.64814C10.3682 6.69115 10.4503 6.77327 10.4934 6.83193C10.5755 6.93751 10.5755 6.97661 10.595 10.668C10.6146 14.3633 10.6146 14.3985 10.6967 14.508C10.8727 14.7504 11.2246 14.8247 11.4553 14.6644C11.7486 14.4649 11.7447 14.4806 11.7681 13.2684C11.7877 12.2439 11.7916 12.1735 11.8698 12.0679C12.124 11.7238 12.6206 11.759 12.8435 12.1383C12.9139 12.2595 12.9217 12.3612 12.9412 13.3349C12.9608 14.332 12.9647 14.4024 13.0429 14.508C13.2971 14.8521 13.7937 14.8169 14.0166 14.4376C14.0831 14.3242 14.0987 14.2108 14.1143 13.632C14.13 13.0338 14.1417 12.9477 14.216 12.85C14.4702 12.5059 14.9668 12.5411 15.1897 12.9204C15.2562 13.0338 15.2718 13.1472 15.2875 13.7259C15.3031 14.3242 15.3148 14.4102 15.3891 14.508C15.5103 14.6722 15.7059 14.7621 15.9092 14.7426C16.2416 14.7074 16.4136 14.4845 16.4567 14.0309C16.4762 13.8315 16.5075 13.7024 16.5622 13.632C16.8164 13.2879 17.313 13.3231 17.5359 13.7024C17.6141 13.8315 17.6141 13.9058 17.6141 17.1005C17.6141 20.1975 17.6102 20.3774 17.5398 20.5808C17.3248 21.2103 16.8281 21.6639 16.2103 21.793C16.0695 21.8203 15.1662 21.8321 13.3479 21.8242C10.6928 21.8125 10.6928 21.8125 10.4738 21.7226C10.3526 21.6757 10.1727 21.5779 10.0749 21.5075C9.8325 21.3355 5.7931 17.038 5.72271 16.8776C5.60931 16.6156 5.69143 16.3419 5.9456 16.1542C6.059 16.0682 6.32882 16.0486 6.49305 16.1151C6.5478 16.1386 7.00531 16.5844 7.50584 17.1084C8.01027 17.6284 8.46388 18.0899 8.51862 18.125C8.65939 18.2228 8.97613 18.2189 9.13646 18.1172C9.20684 18.0781 9.29287 17.9843 9.33198 17.9139C9.39845 17.7927 9.40236 17.4877 9.42191 12.3416C9.44147 6.91404 9.44147 6.8984 9.52358 6.78891C9.70346 6.54256 10.0828 6.47608 10.3135 6.64814Z"
                                                                                                                            fill="#333333" />
                                                                                                                    </svg>
                                                                                                                </div>
                                                                                                                <p
                                                                                                                    class="mr-2 font-normal me-body-18 text-darkgray underline  cancer-markers-label-1-receipientData{{ $group->id }}{{ $recipient->id }} ">
                                                                                                                    {{ langbind($group, 'name') }} (<span
                                                                                                                        class="selected-cancermarkers-count-1-receipientData111">{{ $group->itemDatas($group->id, $recipient->id, $recipient->product->id)->sum('equivalent_number') }}</span>
                                                                                                                    @lang('labels.check_out.selected'))</p>
                                                                                                                <div class="showDropdown-btn active">
                                                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                                                                        height="7" viewBox="0 0 12 7" fill="none">
                                                                                                                        <path
                                                                                                                            d="M0.042841 6.46313C0.14831 6.69047 0.413154 6.7936 0.649873 6.6975C0.713154 6.67172 1.46315 5.93344 3.36628 4.02094L5.99831 1.37719L8.628 4.02094C10.5358 5.93579 11.2835 6.67172 11.3467 6.6975C11.396 6.71625 11.478 6.73266 11.5296 6.73266C11.8671 6.73266 12.0944 6.39047 11.9538 6.08813C11.8905 5.95454 6.32878 0.367034 6.19753 0.308441C6.078 0.252191 5.91862 0.252191 5.79909 0.308441C5.66784 0.367034 0.106123 5.95453 0.042841 6.08813C-0.0134086 6.20766 -0.0134086 6.3436 0.042841 6.46313Z"
                                                                                                                            fill="#333333" />
                                                                                                                    </svg>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="hidden detail-data-list1-receipientData111">
                                                                                                        @foreach ($group->itemDatas($group->id, $recipient->id, $recipient->product->id) as $item)
                                                                                                            <div component-name="me-checkout-merchant-recipient-cancerMarkers-detail-list"
                                                                                                                class="pl-8 mt-1">
                                                                                                                <ul
                                                                                                                    class="custom-list-style bg-far px-5 py-[10px] rounded-[12px] cancerMarkers-detail-data1-receipientData111">
                                                                
                                                                                                                    <li class="flex items-center mt-2">
                                                                                                                        <span
                                                                                                                            class="mr-4 font-normal me-body-18 text-darkgray">{{ langbind($item, 'name') }}</span>
                                                                                                                        <!-- <span
                                                                                                                                                                                    class="font-normal me-body-18 text-darkgray">$600</span> -->
                                                                                                                    </li>
                                                                
                                                                
                                                                                                                </ul>
                                                                                                            </div>
                                                                                                        @endforeach
                                                                                                    </div>
                                                                                                </div>
                                                                                            @endforeach
                                                                                            @if (count($recipient->add_on_data) > 0)
                                                                                                <div component-name="me-checkout-merchant-recipient-preferredTime-detail"
                                                                                                    class="mt-1">
                                                                                                    <div>
                                                                                                        <div class="flex w-full justify-between addson-show-detail-receipientData111"
                                                                                                            style="display:block">
                                                                                                            <div class="flex items-center w-full">
                                                                                                                <div class="mr-2 max-w-[24px] w-[24px]">
                                                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                                                                        height="25" viewBox="0 0 24 25" fill="none">
                                                                                                                        <path
                                                                                                                            d="M12.5 21C17.1944 21 21 17.1944 21 12.5C21 7.80558 17.1944 4 12.5 4C7.80558 4 4 7.80558 4 12.5C4 17.1944 7.80558 21 12.5 21Z"
                                                                                                                            stroke="#333333" stroke-linecap="round"
                                                                                                                            stroke-linejoin="round" />
                                                                                                                        <path d="M12.4992 8.57715V16.4233M8.57617 12.5002H16.4223"
                                                                                                                            stroke="#333333" stroke-linecap="round"
                                                                                                                            stroke-linejoin="round" />
                                                                                                                    </svg>
                                                                                                                </div>
                                                                                                                <p data-id="receipientData111"
                                                                                                                    class="mr-2 font-normal me-body-18 text-darkgray underline">
                                                                                                                    @lang('labels.check_out.add_on') ({{count($recipient->add_on_data)}})</p>
                                                                                                                <div class="showDropdown-btn active">
                                                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                                                                        height="7" viewBox="0 0 12 7" fill="none">
                                                                                                                        <path
                                                                                                                            d="M0.042841 6.46313C0.14831 6.69047 0.413154 6.7936 0.649873 6.6975C0.713154 6.67172 1.46315 5.93344 3.36628 4.02094L5.99831 1.37719L8.628 4.02094C10.5358 5.93579 11.2835 6.67172 11.3467 6.6975C11.396 6.71625 11.478 6.73266 11.5296 6.73266C11.8671 6.73266 12.0944 6.39047 11.9538 6.08813C11.8905 5.95454 6.32878 0.367034 6.19753 0.308441C6.078 0.252191 5.91862 0.252191 5.79909 0.308441C5.66784 0.367034 0.106123 5.95453 0.042841 6.08813C-0.0134086 6.20766 -0.0134086 6.3436 0.042841 6.46313Z"
                                                                                                                            fill="#333333" />
                                                                                                                    </svg>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                
                                                                                                    <div class=" addson-detail-list-receipientData111">
                                                                                                        <div component-name="me-checkout-merchant-recipient-addonItems-detail-list"
                                                                                                            class="pl-8 mt-1">
                                                                                                            <ul
                                                                                                                class="custom-list-style bg-far px-5 py-[10px] rounded-[12px] adds-on-checklist-detailreceipientData111">
                                                                                                                @foreach ($recipient->add_on_data as $item)
                                                                                                                    <li data-text="Upper Abdomen Ultrasound"
                                                                                                                        data-price="{{ $item->discount_price ? $item->discount_price : $item->original_price }}"
                                                                                                                        class="flex items-center mt-2">
                                                                                                                        <span
                                                                                                                            class="mr-4 font-normal me-body-18 text-darkgray">{{ langbind($item, 'name') }}</span>
                                                                                                                        <span
                                                                                                                            class="font-normal me-body-18 text-darkgray">${{ $item->discount_price ? $item->discount_price : $item->original_price }}</span>
                                                                                                                    </li>
                                                                                                                @endforeach
                                                                                                            </ul>
                                                                                                        </div>
                                                                                                    </div>
                                                                
                                                                
                                                                                                    <div class="hidden">
                                                                                                        <input data-id="receipientData111" value="" type="hidden"
                                                                                                            class="addson-checklist addson-checklist-undefined addson-checklist-receipientData111" />
                                                                                                    </div>
                                                                                                </div>
                                                                                            @endif
                                                                                            <div class="flex flex-wrap justify-between">
                                                                                                @if($itemDetails->remark!="")
                                                                                                <p class="my-1 font-normal me-body-18 text-darkgray mt-[10px] ">
                                                                                                    @lang('labels.check_out.special_requests'): {{ $itemDetails->remark }}</p>
                                                                                                @endif
                                                                                                <p class="my-1 font-bold me-body-18 text-darkgray mt-[10px] ">
                                                                                                    @lang('labels.booking_details.total'): ${{ $recipient->total }}</p>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                            <div component-name="me-checkout-cancellation-reason"
                                                                                                class="me-checkout-cancellation-reason mt-5">
                                                                                                <p class="font-bold me-body-18 text-darkgray">
                                                                                                    @lang('labels.booking_details.reason')</p>
                                                                                                <div class="mt-2 relative">
                                                                                                    <input type="hidden" class="cancellation-reason-1"
                                                                                                        name="reasons_cancelled{{ $itemDetails->id }}" value="">
                                                                                                    <p id="cancellation-reason-box"
                                                                                                        class="rounded-[4px] py-[0.6rem] px-5 me-body-18 text-lightgray font-normal border-1 border-meA3 cursor-pointer w-full cancellation-reason-box">
                                                                                                        <span class="pointer-events-none">@lang('labels.basic_info.please_select')</span>
                                                                                                    </p>
                                                                                                    <ul class="absolute top-[105%] cancellation-reason-box-list w-full z-[1]">
                                                                                                        @foreach (config('mediq.cancelation_reason_' . app()->getLocale()) as $k => $value)
                                                                                                            <li
                                                                                                                class="font-normal me-body-18 text-darkgray px-5 py-[10px] cursor-pointer">
                                                                                                                {{ $value }}</li>
                                                                                                        @endforeach
                                                                                                    </ul>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                        @if ($itemDetails->is_two_recipient != 1)
                                                                            <div
                                                                                class="py-5 xl:px-5 flex sm:flex-nowrap flex-wrap items-center sm:mb-5 mb-10 pb-5 last:border-b last:sm:mb-10 last:mb-36 last:border-b-mee4 rounded-[4px] custom-order-boxshadow">
                                                                                <div>
                                                                                    <label class="cursor-pointer inline-block relative mr-5 w-6 h-6"
                                                                                        for="cancellation-select-{{ $itemDetails->id }}">
                                                                                        <input type="checkbox"
                                                                                            class="cursor-pointer opacity-0 absolute w-full h-full cancellation-select"
                                                                                            name="cancellation_selectsingle[]" value={{ $itemDetails->id }}
                                                                                            id="cancellation-select-{{ $itemDetails->id }}">
                                                                                        <span class="custom-checkbox-orange absolute left-0 w-6 h-6"></span>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="mr-[10px]">
                                                                                    <img src="{{ $itemDetails->featured_img }}" alt="booking-logo"
                                                                                        class="2xl:max-w-[96px] 2xl:max-h-[96px] max-w-[50px] max-h-[50px] object-cover rounded-xl">
                                                                                </div>
                                                                                <div class="w-full">
                                                                                    <p class="me-body-20 font-bold text-darkgray"> <a href="{{ route('product-detail', ['category'=>$itemDetails->category_name_en,'slug'=>isset($itemDetails->slug_en) ? $itemDetails->slug_en : '']) }}">{{ @langbind($itemDetails, 'name') }}</a>
                                                                                    </p>
                                                                                    <div component-name="me-checkout-cancellation-card-content"
                                                                                        class="me-member-dashboard-booking-card-content">
                                                                
                                                                                        <div>
                                                                                            <div class="mt-2 bg-blueMediq px-3 py-2">
                                                                                                <p class="font-bold me-body-16 text-whitez">
                                                                                                    @lang('labels.order_details.booking_id') {{ $itemDetails->booking_id }}</p>
                                                                                            </div>
                                                                                            <div class="mt-[10px]">
                                                                                                <div class="payment-pending-div ">
                                                                                                    <div class="flex flex-wrap-reverse items-center justify-between">
                                                                                                        <div>
                                                                                                            <div class="flex items-start">
                                                                                                                <div class="mr-[10px] mt-[2px]">
                                                                                                                    @if ($itemDetails->order_status == 4)
                                                                                                                        <img src="{{ asset('frontend/img/member-clapping.svg') }}"
                                                                                                                            alt="statusIcon" class="min-w-[16px]">
                                                                                                                    @elseif($itemDetails->order_status == 3)
                                                                                                                        <img src="{{ asset('frontend/img/member-check-circle.svg') }}"
                                                                                                                            alt="statusIcon" class="min-w-[16px]">
                                                                                                                    @elseif($itemDetails->order_status == 6)
                                                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                                                                            height="21" viewBox="0 0 20 21" fill="none">
                                                                                                                            <path
                                                                                                                                d="M9.10156 1.90966C7.59766 2.062 6.08203 2.65185 4.83594 3.57372C4.33203 3.94872 3.46484 4.812 3.09766 5.30419C1.39063 7.60888 0.91797 10.519 1.82031 13.23C2.82813 16.2651 5.42578 18.4604 8.65234 19.0034C9.25 19.1011 10.7813 19.1011 11.3477 18.9995C13.2148 18.6714 14.7891 17.8628 16.0742 16.5737C17.4883 15.1597 18.3398 13.3706 18.5586 11.3667C18.6211 10.7573 18.5859 9.64013 18.4805 9.03466C18.2344 7.64404 17.7031 6.41357 16.8516 5.28075C16.5664 4.90185 15.8633 4.16747 15.4609 3.83154C13.7383 2.39404 11.3789 1.6831 9.10156 1.90966ZM10.5859 3.27294C12.3086 3.42529 13.8711 4.14794 15.0742 5.35107C17.6719 7.94091 17.9492 11.9448 15.7266 14.894C15.4258 15.2964 14.7969 15.9253 14.3945 16.2261C12.8945 17.355 11.0664 17.8745 9.26172 17.687C6.73438 17.4214 4.55078 15.8901 3.46094 13.6245C2.50781 11.644 2.51172 9.3081 3.46875 7.32763C4.44141 5.31591 6.37109 3.82372 8.55469 3.39013C9.28906 3.2456 9.87891 3.21044 10.5859 3.27294Z"
                                                                                                                                fill="#333333"></path>
                                                                                                                            <path
                                                                                                                                d="M6.77734 6.94011C6.58984 7.02604 6.50781 7.11198 6.42578 7.30729C6.35156 7.48698 6.35156 7.65104 6.42578 7.83464C6.46875 7.92839 6.91406 8.40495 7.74609 9.23698L9.00391 10.4987L7.74609 11.7604C6.47656 13.03 6.36719 13.1628 6.36719 13.4245C6.36719 13.9167 6.93359 14.2487 7.375 14.0182C7.45312 13.9753 8.07422 13.3854 8.75 12.7096L9.98047 11.4753L11.2305 12.7214C11.918 13.405 12.5352 13.9948 12.6055 14.03C12.9961 14.2253 13.5117 13.9635 13.582 13.5339C13.6367 13.1823 13.6523 13.1979 12.2539 11.7995L10.9609 10.4987L12.2344 9.22136C13.5977 7.84636 13.6211 7.81511 13.582 7.46745C13.5469 7.15495 13.2266 6.86589 12.9102 6.86589C12.6562 6.86589 12.4883 7.00651 11.25 8.2487C10.5742 8.92839 10.0039 9.48308 9.98047 9.48308C9.95703 9.48308 9.38672 8.92839 8.71094 8.2487C7.26953 6.80339 7.19141 6.7487 6.77734 6.94011Z"
                                                                                                                                fill="#333333"></path>
                                                                                                                        </svg>
                                                                                                                    @else
                                                                                                                        <img src="{{ asset('frontend/img/member-ast.svg') }}"
                                                                                                                            alt="statusIcon" class="min-w-[16px]">
                                                                                                                    @endif
                                                                                                                </div>
                                                                                                                @php
                                                                                                                    $textColor = '';
                                                                                                                    if ($itemDetails->order_status == 3) {
                                                                                                                        $textColor = 'text-meGreen';
                                                                                                                    } elseif ($itemDetails->order_status == 2) {
                                                                                                                        $textColor = 'text-darkgray';
                                                                                                                    } elseif ($itemDetails->order_status == 1) {
                                                                                                                        $textColor = 'text-mered';
                                                                                                                    }
                                                                                                                @endphp
                                                                                                                <p class="font-bold me-body-18 {{ $textColor }}">
                                                                                                                    {{ config('mediq.booking_status_' . app()->getLocale())[$itemDetails->order_status] }}
                                                                                                                </p>
                                                                                                            </div>
                                                                                                            <div class="flex items-center mt-[10px]">
                                                                                                                <div class="mr-[10px]">
                                                                                                                    <img src="{{ asset('frontend/img/member-user.svg') }}"
                                                                                                                        alt="member-user">
                                                                                                                </div>
                                                                                                                <p class="font-normal me-body-18 text-darkgray">
                                                                                                                    {{ $itemDetails->recipient->last_name }}
                                                                                                                    {{ $itemDetails->recipient->first_name }}
                                                                                                                </p>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="flex items-center my-1">
                                                                                                            <div class="flex items-center pr-3">
                                                                                                                <p
                                                                                                                    class="font-bold me-body-45 text-darkgray leading-[normal] booking-selected-dayno">
                                                                                                                    {{ $itemDetails->confirm_booking_date != null ? date('j', strtotime($itemDetails->confirm_booking_date)) : '' }}
                                                                                                                </p>
                                                                                                                <p
                                                                                                                    class="font-bold me-body-16 text-darkgray max-w-[30px] leading-[normal] booking-selected-month-day">
                                                                                                                    {{ $itemDetails->confirm_booking_date != null ? date('M', strtotime($itemDetails->confirm_booking_date)) : '' }}
                                                                                                                    {{ $itemDetails->confirm_booking_date != null ? date('D', strtotime($itemDetails->confirm_booking_date)) : '' }}
                                                                                                                </p>
                                                                                                            </div>
                                                                                                            <div class="border-l-1 border-l-mee4 pl-3">
                                                                                                                <p
                                                                                                                    class="font-bold me-body-28 text-darkgray leading-[normal] booking-selected-time">
                                                                                                                    {{ $itemDetails->confirm_booking_time !== null ? $itemDetails->confirm_booking_time : '' }}
                                                                                                                </p>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                
                                                                                                @php
                                                                                                    $recipient = App\Models\Recipient::select('recipients.*', 'order_items.total')
                                                                                                        ->join('products', 'recipients.product_id', '=', 'products.id')
                                                                                                        ->join('order_items', 'order_items.recipient_id', 'recipients.id')
                                                                                                        ->where('recipients.id', $itemDetails->recipient_id)
                                                                                                        ->first();
                                                                                                    $product = App\Models\Product::find($itemDetails->product_id);
                                                                                                    $location = App\Models\MerchantLocation::where('area_id', $itemDetails->confirm_location)
                                                                                                        ->where('merchant_id', $product->merchant->id)
                                                                                                        ->first();
                                                                                                    
                                                                                                @endphp
                                                                                                @if ($itemDetails->confirm_booking_date!=null)
                                                                                                    <div class="mt-[5px] flex items-center ">
                                                                                                        <div class="mr-[10px]">
                                                                                                            <img src="{{ asset('frontend/img/member-location.png') }}"
                                                                                                                alt="member-location" class="min-w-[20px]">
                                                                                                        </div>
                                                                                                        <p
                                                                                                            class="font-normal me-body-18 text-darkgray leading-[normal] @@classname">
                                                                                                            {{ @langbind($location, 'full_address') }}
                                                                                                        </p>
                                                                                                    </div>
                                                                
                                                                
                                                                                                    <div class="mt-[5px] flex items-center ">
                                                                                                        <div class="mr-[10px]">
                                                                                                            <img src="{{ asset('frontend/img/member-other.svg') }}"
                                                                                                                alt="member-other" class="min-w-[20px]">
                                                                                                        </div>
                                                                                                        <p
                                                                                                            class="font-normal me-body-18 text-darkgray leading-[normal] @@classname">
                                                                                                            {{ @langbind($location, 'station') }}</p>
                                                                                                    </div>
                                                                                                @endif
                                                                                                @foreach ($recipient->group_data as $group)
                                                                                                    @php
                                                                                                        $checkUpTable = $recipient->product->package->checkupTable;
                                                                                                        $tablePriIds = App\Models\CheckUpTableType::where('check_up_type_id', 2)
                                                                                                            ->where('check_up_table_id', $checkUpTable->id)
                                                                                                            ->pluck('id')
                                                                                                            ->toArray();
                                                                                                        $optionGroupIds = App\Models\CheckTableItem::where('check_up_group_id', $group->id)
                                                                                                            ->whereIn('check_up_table_type_id', $tablePriIds)
                                                                                                            ->distinct()
                                                                                                            ->pluck('check_up_item_id')
                                                                                                            ->toArray();
                                                                                                        $countEquivalentNumber = App\Models\CheckUpItem::whereIn('id', $optionGroupIds)->sum('equivalent_number');
                                                                                                    @endphp
                                                                                                    <div component-name="me-checkout-merchant-recipient-cancerMarker-detail"
                                                                                                        class="mt-1">
                                                                                                        <div class="flex sm:flex-row flex-col">
                                                                                                            <div
                                                                                                                class="flex w-full justify-between cancer-markers-detail-data1-receipientData111">
                                                                                                                <div class="flex items-center w-full">
                                                                                                                    <div class="mr-2 max-w-[24px] w-[24px]">
                                                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                                                                            height="25" viewBox="0 0 24 25" fill="none">
                                                                                                                            <path
                                                                                                                                d="M9.4979 3.00898C8.94263 3.08328 8.22312 3.3531 7.73824 3.66984C7.3824 3.90446 6.83104 4.44409 6.60815 4.77647C6.38525 5.10885 6.15845 5.58982 6.02941 6.01605C5.93165 6.34452 5.92383 6.41882 5.91992 7.0914C5.91992 7.72097 5.92774 7.83437 5.99422 7.96341C6.20929 8.39746 6.8193 8.40919 7.03046 7.98296C7.09694 7.8461 7.10085 7.7718 7.08521 7.28692C7.05784 6.66126 7.11258 6.36407 7.32765 5.89092C7.49189 5.53508 7.65221 5.30046 7.91812 5.03846C8.81359 4.13908 10.1431 3.91228 11.2849 4.45582C12.0475 4.81948 12.6497 5.55072 12.8647 6.38363C12.9273 6.61043 12.9429 6.78639 12.939 7.1305C12.9234 7.90476 12.9273 7.91649 13.0055 8.02207C13.2088 8.29188 13.4786 8.36227 13.7563 8.21758C13.9909 8.09636 14.0652 7.93995 14.1082 7.47853C14.1786 6.72774 14.0457 6.00823 13.7015 5.31219C13.4552 4.80775 13.2049 4.46755 12.8178 4.10389C12.0748 3.40002 11.1794 3.03245 10.1431 3.00507C9.86548 2.99725 9.5722 3.00116 9.4979 3.00898Z"
                                                                                                                                fill="#333333" />
                                                                                                                            <path
                                                                                                                                d="M9.54314 5.43202C9.05825 5.56106 8.62029 5.93645 8.39349 6.41352L8.26836 6.67942L8.25663 11.3992C8.25272 14.07 8.23316 16.1229 8.21361 16.1229C8.19406 16.1229 8.03374 15.9626 7.85386 15.7632C7.2282 15.0789 6.84499 14.8873 6.14503 14.9186C5.81656 14.9303 5.73053 14.9498 5.49982 15.0632C4.48704 15.552 4.17812 16.862 4.87807 17.7184C4.97583 17.8435 5.97689 18.9189 7.09525 20.1115C9.18338 22.3326 9.35544 22.4968 9.85988 22.7315C10.4191 22.9934 10.2978 22.9817 13.3284 22.9974C15.6237 23.0052 16.1321 22.9974 16.3863 22.9504C16.9885 22.837 17.4577 22.5868 17.9113 22.1449C18.4157 21.6483 18.6895 21.0656 18.7716 20.3188C18.7951 20.0685 18.8068 18.8328 18.799 16.7877L18.7833 13.6399L18.6973 13.4052C18.5096 12.9047 18.1303 12.5176 17.6415 12.326C17.3404 12.2087 16.7734 12.1969 16.4645 12.3064C16.2572 12.3768 16.2494 12.3768 16.2025 12.3064C15.9209 11.8998 15.6785 11.6925 15.2914 11.54C14.9942 11.4266 14.4233 11.4188 14.1183 11.5244C13.911 11.5947 13.9032 11.5947 13.8563 11.5244C13.5747 11.1177 13.3284 10.9104 12.9451 10.7618C12.7105 10.668 12.1983 10.6406 11.9167 10.6993L11.7681 10.7306V8.87313C11.7681 7.67265 11.7525 6.94142 11.7251 6.80846C11.5179 5.81132 10.5051 5.17393 9.54314 5.43202ZM10.3135 6.64814C10.3682 6.69115 10.4503 6.77327 10.4934 6.83193C10.5755 6.93751 10.5755 6.97661 10.595 10.668C10.6146 14.3633 10.6146 14.3985 10.6967 14.508C10.8727 14.7504 11.2246 14.8247 11.4553 14.6644C11.7486 14.4649 11.7447 14.4806 11.7681 13.2684C11.7877 12.2439 11.7916 12.1735 11.8698 12.0679C12.124 11.7238 12.6206 11.759 12.8435 12.1383C12.9139 12.2595 12.9217 12.3612 12.9412 13.3349C12.9608 14.332 12.9647 14.4024 13.0429 14.508C13.2971 14.8521 13.7937 14.8169 14.0166 14.4376C14.0831 14.3242 14.0987 14.2108 14.1143 13.632C14.13 13.0338 14.1417 12.9477 14.216 12.85C14.4702 12.5059 14.9668 12.5411 15.1897 12.9204C15.2562 13.0338 15.2718 13.1472 15.2875 13.7259C15.3031 14.3242 15.3148 14.4102 15.3891 14.508C15.5103 14.6722 15.7059 14.7621 15.9092 14.7426C16.2416 14.7074 16.4136 14.4845 16.4567 14.0309C16.4762 13.8315 16.5075 13.7024 16.5622 13.632C16.8164 13.2879 17.313 13.3231 17.5359 13.7024C17.6141 13.8315 17.6141 13.9058 17.6141 17.1005C17.6141 20.1975 17.6102 20.3774 17.5398 20.5808C17.3248 21.2103 16.8281 21.6639 16.2103 21.793C16.0695 21.8203 15.1662 21.8321 13.3479 21.8242C10.6928 21.8125 10.6928 21.8125 10.4738 21.7226C10.3526 21.6757 10.1727 21.5779 10.0749 21.5075C9.8325 21.3355 5.7931 17.038 5.72271 16.8776C5.60931 16.6156 5.69143 16.3419 5.9456 16.1542C6.059 16.0682 6.32882 16.0486 6.49305 16.1151C6.5478 16.1386 7.00531 16.5844 7.50584 17.1084C8.01027 17.6284 8.46388 18.0899 8.51862 18.125C8.65939 18.2228 8.97613 18.2189 9.13646 18.1172C9.20684 18.0781 9.29287 17.9843 9.33198 17.9139C9.39845 17.7927 9.40236 17.4877 9.42191 12.3416C9.44147 6.91404 9.44147 6.8984 9.52358 6.78891C9.70346 6.54256 10.0828 6.47608 10.3135 6.64814Z"
                                                                                                                                fill="#333333" />
                                                                                                                        </svg>
                                                                                                                    </div>
                                                                                                                    <p
                                                                                                                        class="mr-2 font-normal me-body-18 text-darkgray underline  cancer-markers-label-1-receipientData{{ $group->id }}{{ $recipient->id }} ">
                                                                                                                        {{ langbind($group, 'name') }} (<span
                                                                                                                            class="selected-cancermarkers-count-1-receipientData111">{{ $group->itemDatas($group->id, $recipient->id, $recipient->product->id)->sum('equivalent_number') }}</span>
                                                                                                                        @lang('labels.check_out.selected'))</p>
                                                                                                                    <div class="showDropdown-btn active">
                                                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                                                                            height="7" viewBox="0 0 12 7" fill="none">
                                                                                                                            <path
                                                                                                                                d="M0.042841 6.46313C0.14831 6.69047 0.413154 6.7936 0.649873 6.6975C0.713154 6.67172 1.46315 5.93344 3.36628 4.02094L5.99831 1.37719L8.628 4.02094C10.5358 5.93579 11.2835 6.67172 11.3467 6.6975C11.396 6.71625 11.478 6.73266 11.5296 6.73266C11.8671 6.73266 12.0944 6.39047 11.9538 6.08813C11.8905 5.95454 6.32878 0.367034 6.19753 0.308441C6.078 0.252191 5.91862 0.252191 5.79909 0.308441C5.66784 0.367034 0.106123 5.95453 0.042841 6.08813C-0.0134086 6.20766 -0.0134086 6.3436 0.042841 6.46313Z"
                                                                                                                                fill="#333333" />
                                                                                                                        </svg>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="hidden detail-data-list1-receipientData111">
                                                                                                            @foreach ($group->itemDatas($group->id, $recipient->id, $recipient->product->id) as $item)
                                                                                                                <div component-name="me-checkout-merchant-recipient-cancerMarkers-detail-list"
                                                                                                                    class="pl-8 mt-1">
                                                                                                                    <ul
                                                                                                                        class="custom-list-style bg-far px-5 py-[10px] rounded-[12px] cancerMarkers-detail-data1-receipientData111">
                                                                
                                                                                                                        <li class="flex items-center mt-2">
                                                                                                                            <span
                                                                                                                                class="mr-4 font-normal me-body-18 text-darkgray">{{ langbind($item, 'name') }}</span>
                                                                                                                            <!-- <span
                                                                                                                                                                                        class="font-normal me-body-18 text-darkgray">$600</span> -->
                                                                                                                        </li>
                                                                
                                                                
                                                                                                                    </ul>
                                                                                                                </div>
                                                                                                            @endforeach
                                                                                                        </div>
                                                                                                    </div>
                                                                                                @endforeach
                                                                                                @if (count($recipient->add_on_data) > 0)
                                                                                                    <div component-name="me-checkout-merchant-recipient-preferredTime-detail"
                                                                                                        class="mt-1">
                                                                                                        <div>
                                                                                                            <div class="flex w-full justify-between addson-show-detail-receipientData111"
                                                                                                                style="display:block">
                                                                                                                <div class="flex items-center w-full">
                                                                                                                    <div class="mr-2 max-w-[24px] w-[24px]">
                                                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                                                                            height="25" viewBox="0 0 24 25" fill="none">
                                                                                                                            <path
                                                                                                                                d="M12.5 21C17.1944 21 21 17.1944 21 12.5C21 7.80558 17.1944 4 12.5 4C7.80558 4 4 7.80558 4 12.5C4 17.1944 7.80558 21 12.5 21Z"
                                                                                                                                stroke="#333333" stroke-linecap="round"
                                                                                                                                stroke-linejoin="round" />
                                                                                                                            <path d="M12.4992 8.57715V16.4233M8.57617 12.5002H16.4223"
                                                                                                                                stroke="#333333" stroke-linecap="round"
                                                                                                                                stroke-linejoin="round" />
                                                                                                                        </svg>
                                                                                                                    </div>
                                                                                                                    <p data-id="receipientData111"
                                                                                                                        class="mr-2 font-normal me-body-18 text-darkgray underline">
                                                                                                                        @lang('labels.check_out.add_on') ({{count($recipient->add_on_data)}})</p>
                                                                                                                    <div class="showDropdown-btn active">
                                                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                                                                            height="7" viewBox="0 0 12 7" fill="none">
                                                                                                                            <path
                                                                                                                                d="M0.042841 6.46313C0.14831 6.69047 0.413154 6.7936 0.649873 6.6975C0.713154 6.67172 1.46315 5.93344 3.36628 4.02094L5.99831 1.37719L8.628 4.02094C10.5358 5.93579 11.2835 6.67172 11.3467 6.6975C11.396 6.71625 11.478 6.73266 11.5296 6.73266C11.8671 6.73266 12.0944 6.39047 11.9538 6.08813C11.8905 5.95454 6.32878 0.367034 6.19753 0.308441C6.078 0.252191 5.91862 0.252191 5.79909 0.308441C5.66784 0.367034 0.106123 5.95453 0.042841 6.08813C-0.0134086 6.20766 -0.0134086 6.3436 0.042841 6.46313Z"
                                                                                                                                fill="#333333" />
                                                                                                                        </svg>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                
                                                                                                        <div class=" addson-detail-list-receipientData111">
                                                                                                            <div component-name="me-checkout-merchant-recipient-addonItems-detail-list"
                                                                                                                class="pl-8 mt-1">
                                                                                                                <ul
                                                                                                                    class="custom-list-style bg-far px-5 py-[10px] rounded-[12px] adds-on-checklist-detailreceipientData111">
                                                                                                                    @foreach ($recipient->add_on_data as $item)
                                                                                                                        <li data-text="Upper Abdomen Ultrasound"
                                                                                                                            data-price="{{ $item->discount_price ? $item->discount_price : $item->original_price }}"
                                                                                                                            class="flex items-center mt-2">
                                                                                                                            <span
                                                                                                                                class="mr-4 font-normal me-body-18 text-darkgray">{{ langbind($item, 'name') }}</span>
                                                                                                                            <span
                                                                                                                                class="font-normal me-body-18 text-darkgray">${{ $item->discount_price ? $item->discount_price : $item->original_price }}</span>
                                                                                                                        </li>
                                                                                                                    @endforeach
                                                                                                                </ul>
                                                                                                            </div>
                                                                                                        </div>
                                                                
                                                                
                                                                                                        <div class="hidden">
                                                                                                            <input data-id="receipientData111" value="" type="hidden"
                                                                                                                class="addson-checklist addson-checklist-undefined addson-checklist-receipientData111" />
                                                                                                        </div>
                                                                                                    </div>
                                                                                                @endif
                                                                                                <div class="flex flex-wrap justify-between">
                                                                                                    @if($itemDetails->remark!="")
                                                                                                    <p class="my-1 font-normal me-body-18 text-darkgray mt-[10px] ">
                                                                                                        @lang('labels.check_out.special_requests'): {{ $itemDetails->remark }}</p>
                                                                                                    @endif
                                                                                                    <p class="my-1 font-bold me-body-18 text-darkgray mt-[10px] ">
                                                                                                        @lang('labels.booking_details.total'): ${{ $recipient->total }}</p>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div>
                                                                                                <div component-name="me-checkout-cancellation-reason"
                                                                                                    class="me-checkout-cancellation-reason mt-5">
                                                                                                    <p class="font-bold me-body-18 text-darkgray">
                                                                                                        @lang('labels.booking_details.reason')</p>
                                                                                                    <div class="mt-2 relative">
                                                                                                        <input type="hidden" class="cancellation-reason-1"
                                                                                                            name="reasons_cancelled{{ $itemDetails->id }}" value="">
                                                                                                        <p id="cancellation-reason-box"
                                                                                                            class="rounded-[4px] py-[0.6rem] px-5 me-body-18 text-lightgray font-normal border-1 border-meA3 cursor-pointer w-full cancellation-reason-box">
                                                                                                            <span class="pointer-events-none">@lang('labels.basic_info.please_select')</span>
                                                                                                        </p>
                                                                                                        <ul class="absolute top-[105%] cancellation-reason-box-list w-full z-[1]">
                                                                                                            @foreach (config('mediq.cancelation_reason_' . app()->getLocale()) as $k => $value)
                                                                                                                <li
                                                                                                                    class="font-normal me-body-18 text-darkgray px-5 py-[10px] cursor-pointer">
                                                                                                                    {{ $value }}</li>
                                                                                                            @endforeach
                                                                                                        </ul>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                    @endif
                                                            @endif
                                                        @endif
                                                        @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="w-full fixed bottom-0 bg-whitez xl:px-10 px-5 pb-10 rounded-bl-xl rounded-br-xl left-0 order-bottom-fixed">
                                        <hr class="my-4 bg-mee4">
                                        <div class="flex flex-wrap justify-between">
                                            <p class="my-1 flex flex-wrap font-normal me-body-18 text-darkgray">
                                                <span class="mr-2">@lang('labels.booking_details.no_reason')</span>
                                                <a href="{{ route('contact') }}"
                                                    class="font-bold underline text-darkgray hover:text-orangeMediq">@lang('labels.booking_details.get_help')</a>
                                            </p>
                                            <button type="button" id="btn_cancel_orders_item"
                                                class="my-1 rounded-md 2xl:min-w-[280px] min-w-[180px] px-5 py-[9px] bg-orangeMediq me-body-18 font-bold text-whitez hover:bg-brightOrangeMediq">@lang('labels.log_in_register.submit')</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                       

                    </div>

                </div>
            </div>
        </section>
        @include('frontend.include.product-compare-box')
    </main>
    <dialog id="successfully-upload-payslip-message" component-name="me-compare-status-popup"
    class="csp-container hidden flex items-center justify-center fixed z-[1001] left-0 top-0 w-full h-full bg-transparent overflow-hidden">
        <div class="bg-darkgray rounded-[4px] p-4">
            <p class="me-body16 helvetica-normal text-white">@lang('labels.successfully_uploaded')</p>
        </div>
    </dialog>
    <dialog id="successfully-sent-payslip-message" component-name="me-compare-status-popup"
    class="csp-container hidden flex items-center justify-center fixed z-[1001] left-0 top-0 w-full h-full bg-transparent overflow-hidden">
        <div class="bg-darkgray rounded-[4px] p-4">
            <p class="me-body16 helvetica-normal text-white">@lang('labels.successfully_send')</p>
        </div>
    </dialog>
    <dialog id="successfully-upload-cancel-refund-message" component-name="me-compare-status-popup"
    class="csp-container hidden flex items-center justify-center fixed z-[1001] left-0 top-0 w-full h-full bg-transparent overflow-hidden">
        <div class="bg-darkgray rounded-[4px] p-4">
            <p class="me-body16 helvetica-normal text-white">@lang('labels.cancel_refund_info')</p>
        </div>
    </dialog>
    <dialog id="failed1-upload-cancel-refund-message" component-name="me-compare-status-popup"
    class="csp-container hidden flex items-center justify-center fixed z-[1001] left-0 top-0 w-full h-full bg-transparent overflow-hidden">
        <div class="bg-darkgray rounded-[4px] p-4">
            <p class="me-body16 helvetica-normal text-white">@lang('labels.plese_choose_one_item_for_cancel')</p>
        </div>
    </dialog>
    <dialog id="failed2-upload-cancel-refund-message" component-name="me-compare-status-popup"
    class="csp-container hidden flex items-center justify-center fixed z-[1001] left-0 top-0 w-full h-full bg-transparent overflow-hidden">
        <div class="bg-darkgray rounded-[4px] p-4">
            <p class="me-body16 helvetica-normal text-white">@lang('labels.cancel_refund_reason')</p>
        </div>
    </dialog>
    <dialog id="successfully-update-basic-item-message" component-name="me-compare-status-popup"
    class="csp-container hidden flex items-center justify-center fixed z-[1001] left-0 top-0 w-full h-full bg-transparent overflow-hidden">
        <div class="bg-darkgray rounded-[4px] p-4">
            <p class="me-body16 helvetica-normal text-white">@lang('labels.success_update_info')</p>
        </div>
    </dialog>
    <dialog id="successfully-update-booking-message" component-name="me-compare-status-popup"
    class="csp-container hidden flex items-center justify-center fixed z-[1001] left-0 top-0 w-full h-full bg-transparent overflow-hidden">
        <div class="bg-darkgray rounded-[4px] p-4">
            <p class="me-body16 helvetica-normal text-white">@lang('labels.booking_date_updated')</p>
        </div>
    </dialog>
    <div component-name="qr-popup" id="qr-popup" class="hidden qr-popup">
        <div class="md:max-w-[560px] max-w-[80%] qr-popup-content max-h-[85vh]">
            <div class="relative w-full overflow-y-auto">
                <div class="md:px-10 px-4 md:py-10 py-5">
                    <div>
                        <button onclick="closeQR()"
                          class="z-[1] absolute top-5 md:right-8 right-4 focus-visible:outline-none focus:outline-none p-1"
                          id="me-checkout-cancellation-popup-close-btn">
                          <div class=" w-auto h-auto align-middle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                              <path d="M17.3998 0.613387C17.2765 0.489783 17.1299 0.391719 16.9686 0.324811C16.8073 0.257902 16.6344 0.223462 16.4598 0.223462C16.2852 0.223462 16.1123 0.257902 15.951 0.324811C15.7897 0.391719 15.6432 0.489783 15.5198 0.613387L8.99981 7.12005L2.47981 0.600054C2.35637 0.476611 2.20982 0.378691 2.04853 0.311885C1.88725 0.245078 1.71438 0.210693 1.53981 0.210693C1.36524 0.210693 1.19237 0.245078 1.03109 0.311885C0.8698 0.378691 0.723252 0.476611 0.59981 0.600054C0.476367 0.723496 0.378447 0.870044 0.31164 1.03133C0.244834 1.19261 0.210449 1.36548 0.210449 1.54005C0.210449 1.71463 0.244834 1.88749 0.31164 2.04878C0.378447 2.21006 0.476367 2.35661 0.59981 2.48005L7.11981 9.00005L0.59981 15.5201C0.476367 15.6435 0.378447 15.79 0.31164 15.9513C0.244834 16.1126 0.210449 16.2855 0.210449 16.4601C0.210449 16.6346 0.244834 16.8075 0.31164 16.9688C0.378447 17.1301 0.476367 17.2766 0.59981 17.4001C0.723252 17.5235 0.8698 17.6214 1.03109 17.6882C1.19237 17.755 1.36524 17.7894 1.53981 17.7894C1.71438 17.7894 1.88725 17.755 2.04853 17.6882C2.20982 17.6214 2.35637 17.5235 2.47981 17.4001L8.99981 10.8801L15.5198 17.4001C15.6433 17.5235 15.7898 17.6214 15.9511 17.6882C16.1124 17.755 16.2852 17.7894 16.4598 17.7894C16.6344 17.7894 16.8072 17.755 16.9685 17.6882C17.1298 17.6214 17.2764 17.5235 17.3998 17.4001C17.5233 17.2766 17.6212 17.1301 17.688 16.9688C17.7548 16.8075 17.7892 16.6346 17.7892 16.4601C17.7892 16.2855 17.7548 16.1126 17.688 15.9513C17.6212 15.79 17.5233 15.6435 17.3998 15.5201L10.8798 9.00005L17.3998 2.48005C17.9065 1.97339 17.9065 1.12005 17.3998 0.613387Z" fill="#333333"></path>
                          </svg>
                          </div>
                          </button>
                        <h1 class="me-body-23 font-bold text-darkgray payme-qr-content hidden">PayMe QR Code</h1>
                        <h1 class="me-body-23 font-bold text-darkgray wechat-pay-qr-content hidden">WeChat Pay QR Code</h1>
                        <hr class="my-5 bg-mee4"/>
                      </div>
                      <div>
                        <img src="{{asset('frontend/img/payme_qrcode.png')}}" alt="qr code" class="payme-qr-content hidden">
                        <img src="{{asset('frontend/img/wechatpay_qrcode.png')}}" alt="qr code" class="wechat-pay-qr-content hidden">
                      </div>
                </div>                 
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(function() {
            initialCancerMarkers();
            initialAddsonItems();
            initializePreferredTimeData();
            let payment_status = {{$data->payment_status}}
            if(payment_status == 2) {
                {!! session()->put('is_payment',uniqid()) !!}
                url = "{!!route('checkout.payment',['is_payment'=>json_encode(session()->get('is_payment'))])!!}";
                $("#btn_paynow").attr('href', url.replaceAll('%22', ''))
            }
        });
        function uploadPayslip(){
            let formData = new FormData(document.getElementById('file-upload'));
            formData.append('payment_type', $(".bank-type.active").attr("data-bankname"));
            $(".text-mered").addClass("hidden")
            $(".text-mered").html("")

            $.ajax({
                type: 'POST',
                url: "{{ route('dashboard.booking.details.payslipupload') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: (response) => {
                    if(response.status =='success') {
                        $("#successfully-upload-payslip-message").removeClass("hidden");
                        compareStatusAutoClose();
                        setTimeout(() => { document.location.reload(); }, 4000);
                    }
                },error:function(data){
                        $.each(data.responseJSON.errors,function(k,v){
                            if(k=="file")
                            {
                                let errorTxt = v[0];
                                $("#file_error").html(errorTxt);
                                $("#file_error").removeClass("hidden");
                            }
                        });
                }
            });
        }

        function sendEReceiptEmail(){
            hideSendEmailPopup();
            $.ajax({
                type: 'POST',
                url: "{{ route('dashboard.booking.details.send.ereceipt') }}",
                dataType: "json",
                data: {
                    name: $("#e-receipt-name").val(),
                    email: $("#e-receipt-email").val(),
                    postal_address: $("#e-receipt-postal-address").val(),
                    order_id: $("#order_id").val(),
                },
                success: (response) => {
                    // console.log(response)
                    if(response.status =='success') {
                        $("#e-receipt-name").val("");
                        $("#e-receipt-email").val("");
                        $("#e-receipt-postal-address").val("");
                       
                        $("#successfully-sent-payslip-message").removeClass("hidden");
                        compareStatusAutoClose();
                        $("#me-checkout-send-email-popup-close-btn").click();
                        //setTimeout(() => { document.location.reload(); }, 4000);
                    }
                }
            });

        }

        function downloadEReceipt(){
            //hideSendEmailPopup();
            $.ajax({
                type: 'get',
                url: "{{ route('dashboard.booking.details.download.ereceipt') }}",
                dataType: "json",
                data: {
                    order_id: $("#order_id").val(),
                },
                xhrFields: {
                responseType: 'blob'
                },
                success: function(response){
                    var blob = new Blob([response]);
                    var link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = "ecreceipt.pdf";
                    link.click();
                },
                error: function(blob){
                    //console.log(blob);
                }
            });

        }
        $("body").on("click",".cancel-refund-btn",function(){
            if($('.me-checkout-cancellation-popup input:checkbox').length== 1) {
                $("#btn_cancel_orders_item").addClass("hidden");
                $("#cancellation-selectall").addClass("hidden");
            }
        });
        $("body").on("click","#btn_cancel_orders_item",function(){
            const formData = new FormData($("#frmCancelRefund")[0]);
            $.ajax({
                type: 'POST',
                url: "{{ route('dashboard.booking.details.upload.cancel.refund') }}",
                method: "POST",
                data: formData,
                dataType: "JSON",
                processData: false,
                contentType: false,
                success: (response) => {
                    if(response.status =='success') {
                        $("#me-checkout-cancellation-popup-close-btn").click();
                        $("#successfully-upload-cancel-refund-message").removeClass("hidden");
                        compareStatusAutoClose();
                        setTimeout(() => { document.location.reload(); }, 4000);
                    }else if(response.status =='failed1') {
                        $("#failed1-upload-cancel-refund-message").removeClass("hidden");
                        compareStatusAutoClose();
                    }else{
                        $("#failed2-upload-cancel-refund-message").removeClass("hidden");
                        compareStatusAutoClose();
                    }
                }
            });

        });

        $("body").on("click",".showDropdown-btn-content",function(){
           // alert($(this).attr("data-id"))
            // $(this).parent().parent().parent().next().toggleClass("hidden");
            id = $(this).attr("data-id");
            $(".detail-data-list[data-id='"+id+"']").toggleClass("hidden");
            $(this).toggleClass("active")
            return false;
        });

        function submitItem(group_id, recipient_id) {
            confirmCancerMakers('receipientData' + group_id + recipient_id);
            let formData = $("#updateCheckUpItemForm" + group_id + recipient_id).serialize();
            saveCheckUpData("{{route('checkout.saveCheckUpItems')}}", formData,'item');
        }

        function submitLocation(recipient_id) {
            //checkoutDateConfirm('receipientData'+recipient_id);
            let formData = $("#updateCheckUpLocation" + recipient_id).serialize();
            saveCheckUpData("{{route('checkout.saveCheckUpLocations')}}", formData,'location');
        }

        function saveCheckUpData(url, formData, action = null) {
            $.ajax({
                type: 'POST',
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: formData,
                async: false, // open new tab
                success: function(response) {
                    console.log(response)
                    if(response.status==200) {
                        if(action=='item') {
                            $("#successfully-update-basic-item-message").removeClass("hidden");
                        }else{
                            $("#successfully-update-booking-message").removeClass("hidden");
                        }
                        compareStatusAutoClose();
                        setTimeout(() => { document.location.reload(); }, 3000);
                       
                       
                    }
                }
            });
        }
        $("body").on("click",".refund-detail-btn-content",function(){
            $("#me-checkout-refund-complete-popup"+$(this).attr("data-id")).removeClass("hidden");
        });

        let paymentMethod = 1;
        $("body").on("click", ".bank-type", function () {
            paymentMethod = $(this).attr("data-id");
        });
        
        function openQRDetails() {
            if(paymentMethod==3) {
                $(".qr-popup").removeClass("hidden");
                $(".payme-qr-content").removeClass("hidden");
                $(".wechat-pay-qr-content").addClass("hidden");
            }
            if(paymentMethod==4) {
                $(".qr-popup").removeClass("hidden");
                $(".wechat-pay-qr-content").removeClass("hidden");
                $(".payme-qr-content").addClass("hidden");
            }
            return false;

        }
        
    </script>
    <script src="{{ asset('frontend/custom/product-compare.js') }}"></script>
@endpush

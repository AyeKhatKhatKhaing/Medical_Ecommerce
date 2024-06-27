@extends('frontend.layouts.master')
@include('frontend.seo', ['seo' => isset($seo) ? $seo : ''])
@section('content')
<div component-name="me-checkout-complete" class="me-checkout-complete-container mt-[70px] mb-[60px]">
    <div class="me-checkout-complete-content mx-auto">
        <div>
            <img src="{{asset('frontend/img/complete-checked.png')}}" alt="complete-checked"
                class="mx-auto sm:max-w-[100px] sm:max-h-[100px] max-w-[80px] max-h-[80px]" />
        </div>
        <div class="my-10">
            <h3 class="font-bold text-darkgray me-body-29 text-center">@lang('labels.check_out.thank_order')</h3>
            <p class="font-normal text-darkgray me-body-20 mt-2 text-center max-w-[677px] mx-auto">@lang('labels.check_out.thank_order_text1') {{$customer->email}}@lang('labels.check_out.thank_order_text2')</p>
            @if($itemsAmount != 0)
            <div class="mt-3 flex justify-center">
                <span
                    class="px-5 py-[10px] bg-orangeMediq hover:bg-orange text-center sm:min-w-[315px] rounded-[50px] text-whitez me-body-20">
                    @lang('labels.check_out.you_save_text1') ${{number_format($itemsAmount,2)}} @lang('labels.check_out.you_save_text2')
                </span>
            </div>
            @endif
        </div>
        <div class="order-infomation-card p-5 bg-whitez max-w-[323px] mx-auto">
            <p class="font-normal me-body-20 text-darkgray mb-[10px] text-center">@lang('labels.check_out.order_information')</p>
            <div class="border-t-1 border-t-mee4">
                <div class="mt-4">
                    <p class="font-normal me-body-16 text-darkgray text-center">@lang('labels.check_out.order_number')</p>
                    <p class="font-bold me-body-18 text-darkgray text-center">{{$order->invoice_no}}</p>
                    {{-- <div class="mt-[10px]">
                        <p class="font-normal me-body-16 text-darkgray text-center">@lang('labels.check_out.payment_method')</p>
                        <div class="flex items-center justify-center">
                            <div class="mr-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="46" height="30" viewBox="0 0 46 30"
                                    fill="none">
                                    <mask id="mask0_3656_46828" style="mask-type:luminance" maskUnits="userSpaceOnUse"
                                        x="5" y="9" width="36" height="12">
                                        <path
                                            d="M23.5956 12.9843C23.5759 14.5414 24.9833 15.4104 26.0435 15.927C27.1328 16.4571 27.4987 16.797 27.4946 17.271C27.4862 17.9965 26.6256 18.3167 25.82 18.3291C24.4147 18.351 23.5977 17.9497 22.9481 17.6462L22.4418 20.0151C23.0936 20.3155 24.3004 20.5774 25.5519 20.5889C28.4893 20.5889 30.4112 19.1388 30.4216 16.8905C30.4331 14.0373 26.4749 13.8793 26.5019 12.6039C26.5113 12.2172 26.8803 11.8046 27.6889 11.6996C28.0891 11.6466 29.1941 11.606 30.4466 12.1829L30.9382 9.89096C30.2647 9.64565 29.3988 9.41073 28.3209 9.41073C25.556 9.41073 23.6112 10.8805 23.5956 12.9843ZM35.6625 9.60823C35.1261 9.60823 34.674 9.9211 34.4723 10.4013L30.2761 20.4205H33.2115L33.7956 18.8062H37.3828L37.7216 20.4205H40.3088L38.0511 9.60823H35.6625ZM36.0731 12.5291L36.9202 16.5891H34.6002L36.0731 12.5291ZM20.0366 9.60823L17.7228 20.4205H20.5199L22.8327 9.60823H20.0366ZM15.8986 9.60823L12.9871 16.9675L11.8094 10.71C11.6712 10.0115 11.1255 9.60823 10.5195 9.60823H5.75989L5.69336 9.92214C6.67043 10.1342 7.78055 10.4762 8.45307 10.842C8.86469 11.0655 8.98214 11.2609 9.11727 11.7921L11.3479 20.4205H14.3041L18.836 9.60823H15.8986Z"
                                            fill="white" />
                                    </mask>
                                    <g mask="url(#mask0_3656_46828)">
                                        <path d="M2.06836 10.7454L36.1748 -1.81522L43.9339 19.2539L9.82777 31.8145"
                                            fill="url(#paint0_linear_3656_46828)" />
                                    </g>
                                    <defs>
                                        <linearGradient id="paint0_linear_3656_46828" x1="8.82885" y1="20.2488"
                                            x2="38.0022" y2="9.50465" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#222357" />
                                            <stop offset="1" stop-color="#254AA5" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </div>
                            
                            <p class="font-bold me-body-18 text-darkgray">
                                    @php
                                    $number = session()->get('card_no');
                                    if($number != null || $number != ''){
                                        $number = str_split($number, strlen($number)/4);
                                    }
                                    @endphp
                                    {{isset($number) && $number != ''? $number[0] : '4242'}}********{{isset($number)  && $number != '' ? $number[3] : '4242'}}
                            </p>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="what-to-do-next-card xl:mt-[56px] mt-8">
            <h3 class="font-bold text-darkgray me-body-29 text-center">@lang('labels.check_out.do_next')</h3>
            <div class="flex 2xs:flex-row flex-col mt-8 items-center">
                <div class="2xs:w-1/2 w-full sm:pr-5 pr-2">
                    <div class="flex items-center">
                        <img src="{{asset('frontend/img/checkout-contact-us.svg')}}" alt="checkout-contact-us"
                            class="mr-2" />
                        <p class="font-normal me-body-18 text-darkgray">@lang('labels.check_out.cs_confirmation')</p>
                    </div>
                    <div class="flex items-center sm:mt-2 mt-4">
                        <img src="{{asset('frontend/img/checkout-vehicle.svg')}}" alt="checkout-vehicle" class="mr-2" />
                        <p class="font-normal me-body-18 text-darkgray"> @lang('labels.check_out.enjoy_service')</p>
                    </div>
                </div>
                <div class="2xs:w-1/2 w-full 2xs:border-l-2 2xs:border-l-mee4 sm:pl-5 pl-2 2xs:mt-0 mt-4">
                    <div>
                        <img src="{{asset('frontend/img/checkout-booking-svg.svg')}}" alt="checkout-booking-svg"
                            class="mx-auto" />
                    </div>
                    <p class="my-5 me-body-18 font-normal text-darkgray text-center mx-auto max-w-[80%] booking-description">@lang('labels.check_out.can_manage_booking')</p>
                    <div class="flex justify-center">
                        <a href="{{route('dashboard.booking')}}"
                            class="block text-center mt-3 hover:bg-blueMediq hover:border-blueMediq hover:text-whitez rounded-[50px] border-1 border-darkgray font-bold me-body-16 text-darkgray min-w-[169px] px-5 py-[10px]">@lang('labels.check_out.manage_booking')</a>
                    </div>
                </div>
            </div>
            <div class="xl:mt-20 mt-10">
                <h4 class="font-bold me-body29 text-darkgray text-center">@lang('labels.check_out.any_question')</h4>
                <div class="mt-1 font-normal me-body-18 text-darkgray text-center flex flex-wrap justify-center">
                    <span class="mr-1">@lang('labels.check_out.call_text_1')</span>
                    <span class="mr-1">@lang('labels.check_out.call_text_4')</span>
                    <a href="https://api.whatsapp.com/send?phone=85298124646" target="_blank" class="underline">(852) 9812 4646</a> <span class="mx-1">@lang('labels.check_out.call_text_2')
                    </span>
                    <a href="tel:+(852) 2111 2201" class="underline">(852) 2111 2201</a> <span class="ml-1">@lang('labels.check_out.call_text_3')</span>
                </div>
            </div>
        </div>
    </div>
    <div class="flex items-center xl:mt-[104px] mt-10">
        <a href="{{route('mediq')}}"
            class="me-body-18 font-normal text-darkgray back-to-home-page-btn flex items-center">@lang('labels.check_out.back_homepage')</a>
    </div>

</div>
@endsection
@push('scripts')
<script>
</script>
@endpush

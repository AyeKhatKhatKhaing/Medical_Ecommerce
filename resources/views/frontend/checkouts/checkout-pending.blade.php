@extends('frontend.layouts.master')
@include('frontend.seo', ['seo' => isset($seo) ? $seo : ''])
@section('content')
<div component-name="me-checkout-complete" class="me-checkout-complete-container mt-[70px] mb-[60px]">
    <div class="me-checkout-complete-content mx-auto">
    <div class="">
        <div>
        <img src="{{asset('frontend/img/payment-pending.svg')}}" alt="complete-checked"
            class="mx-auto sm:max-w-[100px] sm:max-h-[100px] max-w-[80px] max-h-[80px]" />
        </div>
        <div class="my-10">
        <h3 class="font-bold text-darkgray me-body-29 text-center">@lang('labels.payment.pending')</h3>
        <p class="font-normal text-darkgray me-body-20 mt-2 text-center max-w-[677px] mx-auto">@lang('labels.payment.pending_p')</p>
        <div class="mt-3 flex justify-center">
            <a href="{{route('dashboard.booking')}}"
            class="px-5 py-[10px] text-center sm:min-w-[131px] rounded-[50px] text-darkgray border-1 border-darkgray hover:border-orangeMediq hover:text-orangeMediq me-body-16">
            @lang('labels.payment.my_order')
            </a>
        </div>
        </div>
    </div>
    <div component-name="me-checkout-what-to-do-next" class="what-to-do-next-card xl:mt-[56px] mt-8">
        <h3 class="font-bold text-darkgray me-body-29 text-center">@lang('labels.payment.what_next')
        </h3>
        <div class="flex 2xs:flex-row flex-col mt-8 items-center">
        <div class="2xs:w-1/2 w-full sm:pr-5 pr-2">
            <div class="flex items-center">
            <img src="{{asset('frontend/img/complete-payment.svg')}}" alt="checkout-contact-us" class="mr-2" />
            <p class="font-normal me-body-18 text-darkgray">@lang('labels.payment.complete')</p>
            </div>
            <div class="flex items-center">
                <img src="{{asset('frontend/img/checkout-contact-us.svg')}}" alt="checkout-contact-us" class="mr-2" />
                <p class="font-normal me-body-18 text-darkgray">@lang('labels.payment.waiting')</p>
            </div>
            <div class="flex items-center sm:mt-2 mt-4">
            <img src="{{asset('frontend/img/checkout-vehicle.svg')}}" alt="checkout-vehicle" class="mr-2" />
            <p class="font-normal me-body-18 text-darkgray">@lang('labels.payment.enjoy')</p>
            </div>
            
        </div>
        <div class="2xs:w-1/2 w-full 2xs:border-l-2 2xs:border-l-mee4 sm:pl-5 pl-2 2xs:mt-0 mt-4">
            <div>
            <img src="{{asset('frontend/img/checkout-booking-svg.svg')}}" alt="checkout-booking-svg" class="mx-auto" />
            </div>
            <p class="my-5 me-body-18 font-normal text-darkgray text-center">@lang('labels.payment.change_cancel')</p>
            <div class="flex justify-center">
            <a href="{{route('dashboard.booking')}}"
                class="text-center hover:bg-blueMediq hover:border-blueMediq hover:text-whitez rounded-[50px] border-1 border-darkgray font-bold me-body-16 text-darkgray min-w-[169px] px-5 py-[10px]">
                @lang('labels.payment.view_booking')
            </a>
            </div>
        </div>
        </div>
        <div class="xl:mt-20 mt-10">
        <h4 class="font-bold me-body-20 text-darkgray text-center"> @lang('labels.payment.any_question')</h4>
        <div class="mt-1 font-normal me-body-18 text-darkgray text-center flex flex-wrap justify-center">
            @if (app()->getLocale() == 'en')
            {{-- <span class="mr-1">You can contact our customer</span>
            <span class="mr-1">service on WhatsApp at </span>
            <a href="https://api.whatsapp.com/send?phone=+85295194000" target="_blank" class="underline">(852) 9519 400</a> <span class="mx-1">or call
            </span>
            <a href="tel:+(852) 2111 2201" class="underline">(852) 2111 2201</a> <span class="ml-1">for
            assistance.</span> --}}
                <span>
                {{-- You can contact our customer service team on <a href="https://api.whatsapp.com/send?phone=85295194000" class = "underline" target="_blank">WhatsApp </a> at or call (852) 2111 2201 for assistance. --}}
                You can contact our customer service on WhatsApp at <a href="https://api.whatsapp.com/send?phone=85298124646">(852) 9812 4646</a> or call (852) 2111 2201 for assistance.
                </span>
            @elseif (app()->getLocale() == 'zh-cn')
                <span>
                {{-- 您可以透过  <a href="https://api.whatsapp.com/send?phone=85295194000" class = "underline" target="_blank">WhatsApp </a> 或致电 (852) 2111 2201 联络我们的客服团队。 --}}
                您可以透过 WhatsApp <a href="https://api.whatsapp.com/send?phone=85298124646">(852) 9812 4646</a> 或致电 (852) 2111 2201 与我们的客户服务联络。
                </span>
            @else
                {{-- 您可以透過  <a href="https://api.whatsapp.com/send?phone=85295194000" class = "underline" target="_blank">WhatsApp </a> 或致電 (852) 2111 2201 聯絡我們的客服團隊。 --}}
                您可以透過 WhatsApp <a href="https://api.whatsapp.com/send?phone=85298124646">(852) 9812 4646 </a> 或致電 (852) 2111 2201 與我們的客戶服務聯絡。
            @endif
        </div>
        </div>
    </div>
    </div>
    <div class="flex items-center xl:mt-[104px] mt-10">
    <a href="{{ route('mediq') }}"
        class="me-body-18 font-normal text-darkgray back-to-home-page-btn flex items-center hover:text-blueMediq">
        @lang('labels.check_out.back_homepage')
    </a>
    </div>

</div>
@endsection
@push('scripts')
<script>
</script>
@endpush
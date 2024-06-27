@php
    $footer = App\Models\Footer::first();
    $home = App\Models\Home::first();
    $about = langbind($footer, 'about_content');
    $about_mobile = langbind($footer, 'about_content_mobile');
    $service_content = langbind($footer, 'service_content');
    $service_content_mobile = langbind($footer, 'service_content_mobile');
    $membership_content = langbind($footer, 'membership_content');
    $membership_content_mobile = langbind($footer, 'membership_content_mobile');
    $payment_content = langbind($footer, 'payment_content');
    $payment_content_mobile = langbind($footer, 'payment_content_mobile');
    $transaction_content = langbind($footer, 'transaction_content');
    $cookies_text = langbind($home, 'cookies_text');
    $popup_img = langbind($home, 'popup_img');
    $best_price1 = App\Models\BestPriceDetail::where('best_price_title_en','Best Price Guarantee')->first();
    $best_price2 = App\Models\BestPriceDetail::where('best_price_title_en','Money Back Guarantee')->first();
@endphp
<div component-name="me-footer" class="me-footer bg-[#33333399]">
    
    @if (Route::currentRouteName() != null && Route::currentRouteName() == 'mediq')
        @php
        $closedCookie = \Illuminate\Support\Facades\Cookie::get('footer_closed');
        @endphp
        @if($closedCookie != 'footer_closed')
        <div id="cookie-popup"
            class="@@showFooterPopup  w-full py-[10px] me-footer-container flex justify-between items-start">
            {!! $cookies_text !!}
            <span class="text-whitez cursor-pointer cookie-closed" data-cookie="footer-cookie" id="cookie-close">&times;</span>
        </div>
        @endif
    @endif
</div>
<div component-name="me-footer" class="me-footer-blue-container">
    <div class="me-footer-container me-footer-blue-container py-10">
        <div class="icons-bar flex items-center justify-evenly">
            <div class="w-1/4 flex items-center justify-start me-footer-icons">
                <a href="@isset($best_price1){{ route('best') }}#{{ Str::slug($best_price1->best_price_title_en, '-') }}@else{{ route('best') }}@endisset" class="flex items-center justify-start">
                    <div class="footer-icons">
                        <img src="{{ asset('frontend/img/money.svg') }}" />
                    </div>
                    <div class="pl-[20px] footer-icons-p">
                        <p class="font-secondary font-medium text-white">@lang('labels.footer.text_1')</p>
                    </div>
                </a>
            </div>
            <div class="w-1/4 flex items-center justify-center me-footer-icons">
                <a href="@isset($best_price2){{ route('best') }}#{{ Str::slug($best_price2->best_price_title_en, '-') }}@else{{ route('best') }}@endisset" class="flex items-center justify-start">
                    <div class="footer-icons">
                        <img src="{{ asset('frontend/img/money-hand.svg') }}" />
                    </div>
                    <div class="pl-[20px] footer-icons-p">
                        <p class="font-secondary font-medium text-white">@lang('labels.footer.text_2')</p>
                    </div>
                </a>
            </div>
            <div class="w-1/4 flex items-center justify-center me-footer-icons">
                <a href="{{ route('best') }}" class="flex items-center justify-start">
                    <div class="footer-icons">
                        <img src="{{ asset('frontend/img/vaccine.svg') }}" />
                    </div>
                    <div class="pl-[20px] footer-icons-p">
                        <p class="font-secondary font-medium text-white">@lang('labels.footer.text_3')</p>
                    </div>
                </a>
            </div>
            <div class="w-1/4 flex items-center justify-end me-footer-icons">
                <a href="{{ route('best') }}" class="flex items-center justify-start">
                    <div class="footer-icons">
                        <img src="{{ asset('frontend/img/timetable.svg') }}" />
                    </div>
                    <div class="pl-[20px] footer-icons-p">
                        <p class="font-secondary font-medium text-white">@lang('labels.footer.text_4')</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
{{-- <div component-name="me-footer" class="me-footer-blue-container">
    <div class="me-footer-container me-footer-blue-container py-10 @@showFooterBlue">
        <div class="icons-bar flex items-center justify-evenly">
            <div class="w-1/4 flex items-center justify-start me-footer-icons">
                <a href="@isset($best_price1){{ route('best') }}#{{ Str::slug($best_price1->best_price_title_en, '-') }}@else{{ route('best') }}@endisset"
                class="flex items-center justify-start">
                    <div class="footer-icons">
                        <img src="{{ asset('frontend/img/money.svg') }}" />
                    </div>
                    <div class="pl-[20px] footer-icons-p">
                        <p class="font-secondary font-medium text-white">@lang('labels.footer.text_1')</p>
                    </div>
                </a>
            </div>
            <div class="w-1/4 flex items-center justify-center me-footer-icons">
                <a href=" @isset($best_price2){{ route('best') }}#{{ Str::slug($best_price2->best_price_title_en, '-') }}@else{{ route('best') }}@endisset " class="flex items-center justify-start">
                    <div class="footer-icons">
                        <img src="{{ asset('frontend/img/money-hand.svg') }}" />
                    </div>
                    <div class="pl-[20px] footer-icons-p">
                        <p class="font-secondary font-medium text-white">@lang('labels.footer.text_2')</p>
                    </div>
                </a>
            </div>
            <div class="w-1/4 flex items-center justify-center me-footer-icons">
                <a href="{{ route('best') }}" class="flex items-center justify-start">
                    <div class="footer-icons">
                        <img src="{{ asset('frontend/img/vaccine.svg') }}" />
                    </div>
                    <div class="pl-[20px] footer-icons-p">
                        <p class="font-secondary font-medium text-white">@lang('labels.footer.text_3')</p>
                    </div>
                </a>
            </div>
            <div class="w-1/4 flex items-center justify-end me-footer-icons">
                <a href="{{ route('best') }}" class="flex items-center justify-start">
                    <div class="footer-icons">
                        <img src="{{ asset('frontend/img/timetable.svg') }}" />
                    </div>
                    <div class="pl-[20px] footer-icons-p">
                        <p class="font-secondary font-medium text-white">@lang('labels.footer.text_4')</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div> --}}
<div component-name="me-footer" class="me-footer bg-far">
    <div class="me-footer-container bg-far pt-2.5 md:pt-10 pb-5">
        <div class="lg:flex lg:justify-between sm:pb-[46px]">
            <div class="footer-desktop flex flex-wrap 5xs:flex-nowrap xl:gap-20 7xl:gap-[145px] justify-between pb-8 lg:pb-0">

                @if (isset($footer) && $about != null)
                    <div class="pr-10 xl:pr-0 last-of-type:pr-0 pt-5 5xs:pt-0 first:pt-0">
                        {!! $about !!}
                    </div>
                @endif

                @if (isset($footer) && $service_content != null)
                    <div class="pr-10 xl:pr-0 last-of-type:pr-0 pt-5 5xs:pt-0 first:pt-0">
                        {!! $service_content !!}
                    </div>
                @endif

                @if (isset($footer) && $membership_content != null)
                    <div class="pr-10 xl:pr-0 last-of-type:pr-0 pt-5 5xs:pt-0 first:pt-0 ">
                        {!! $membership_content !!}
                    </div>
                @endif


            </div>
            <div class="footer-mobile">
                <div class="flangm flex items-center justify-start">
                 @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                  <div class="lang-item mr-[15px] last:mr-0 ml-2.5 py-[5px] text-d1 cursor-pointer {{ LaravelLocalization::getCurrentLocaleNative() == $properties['native'] ? 'selected' : '' }}" data-id="繁體">
                    <a href = "{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['native'] }}
                    </a>
                  </div>
                 @endforeach
                </div>
                <div class="me-mediq-help-you-collpase-container pr-3">
                  <div class="me-mediq-help-you-collpase-content">
                    <div>
                      @if (isset($footer) && $about_mobile != null)
                        {{-- <div class="border-b border-b-mee4"> --}}
                                {{-- footer --}}
                            {!! $about_mobile !!}
                        {{-- </div> --}}
                      @endif
                      @if (isset($footer) && $service_content_mobile != null)
                      {{-- <div class="border-b border-b-mee4"> --}}
                        {!! $service_content_mobile !!}
                      {{-- </div> --}}
                      @endif
                      @if (isset($footer) && $membership_content_mobile != null)
                      {{-- <div class="border-b border-b-mee4"> --}}
                        {!! $membership_content_mobile !!}
                      {{-- </div> --}}
                      @endif
      
      
                    </div>
                  </div>
                </div>
      
              </div>
            <div class="lg:pl-10 xl:pl-0">

                @if (isset($footer) && $payment_content != null)
                    <div class="md:pb-[60px]">
                        {!! $payment_content !!}
                    </div>
                @endif
                {{-- @if (isset($footer) && $transaction_content != null) --}}
                    {{-- <div class="flex flex-wrap htzxs:flex-nowrap xl:gap-3">
                        <div class="bg-white rounded-[20px] pt-[10px] pb-7 px-12 relative max-w-[452px]">
                            <span class="absolute left-[18px] top-[15px] text-[90px] text-blueMediq font-secondary">
                                <svg width="28" height="21" viewBox="0 0 28 21" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6.69211 8.349C6.39354 8.349 6.10702 8.39442 5.82185 8.43584C5.91423 8.12588 6.00929 7.81059 6.16192 7.52735C6.31455 7.11587 6.55287 6.75915 6.78985 6.39977C6.988 6.01099 7.33745 5.7478 7.59451 5.41513C7.86363 5.09182 8.23048 4.87672 8.52101 4.60818C8.80619 4.32762 9.17974 4.18734 9.47697 3.98961C9.78758 3.81192 10.058 3.61553 10.3472 3.52201L11.0689 3.22542L11.7035 2.96222L11.0542 0.373047L10.2549 0.565431C9.99913 0.629559 9.68717 0.704376 9.33237 0.793888C8.96953 0.860688 8.5826 1.04372 8.15148 1.21072C7.72572 1.40043 7.23302 1.52869 6.77512 1.8333C6.31455 2.12455 5.78302 2.3677 5.31441 2.75782C4.86054 3.15995 4.31294 3.50865 3.9086 4.02034C3.46677 4.49863 3.0303 5.00097 2.69156 5.57278C2.29927 6.11787 2.03284 6.7164 1.75167 7.30825C1.49729 7.9001 1.29244 8.50531 1.12508 9.09315C0.80777 10.2715 0.665849 11.3911 0.610956 12.349C0.565434 13.3083 0.592212 14.1058 0.648444 14.683C0.668527 14.9555 0.706016 15.2201 0.732793 15.4031L0.766265 15.6276L0.801075 15.6195C1.03921 16.7295 1.5874 17.7496 2.38223 18.5617C3.17707 19.3738 4.18607 19.9447 5.29251 20.2085C6.39895 20.4723 7.55762 20.4181 8.63449 20.0522C9.71135 19.6863 10.6624 19.0237 11.3776 18.141C12.0929 17.2582 12.543 16.1915 12.6761 15.0642C12.8091 13.9368 12.6196 12.7949 12.1294 11.7705C11.6393 10.7462 10.8685 9.88121 9.90628 9.27572C8.94405 8.67022 7.82969 8.34892 6.69211 8.349ZM21.4197 8.349C21.1211 8.349 20.8346 8.39442 20.5494 8.43584C20.6418 8.12588 20.7369 7.81059 20.8895 7.52735C21.0421 7.11587 21.2805 6.75915 21.5174 6.39977C21.7156 6.01099 22.065 5.7478 22.3221 5.41513C22.5912 5.09182 22.9581 4.87672 23.2486 4.60818C23.5338 4.32762 23.9073 4.18734 24.2046 3.98961C24.5152 3.81192 24.7856 3.61553 25.0748 3.52201L25.7965 3.22542L26.4311 2.96222L25.7817 0.373047L24.9824 0.565431C24.7267 0.629559 24.4148 0.704376 24.06 0.793888C23.6971 0.860688 23.3102 1.04372 22.8791 1.21072C22.4547 1.40177 21.9606 1.52869 21.5027 1.83464C21.0421 2.12589 20.5106 2.36904 20.042 2.75915C19.5881 3.16129 19.0405 3.50999 18.6362 4.02034C18.1944 4.49863 17.7579 5.00097 17.4192 5.57278C17.0269 6.11787 16.7604 6.7164 16.4793 7.30825C16.2249 7.9001 16.02 8.50531 15.8527 9.09315C15.5354 10.2715 15.3934 11.3911 15.3385 12.349C15.293 13.3083 15.3198 14.1058 15.376 14.683C15.3961 14.9555 15.4336 15.2201 15.4604 15.4031L15.4939 15.6276L15.5287 15.6195C15.7668 16.7295 16.315 17.7496 17.1098 18.5617C17.9047 19.3738 18.9137 19.9447 20.0201 20.2085C21.1265 20.4723 22.2852 20.4181 23.3621 20.0522C24.4389 19.6863 25.39 19.0237 26.1052 18.141C26.8205 17.2582 27.2706 16.1915 27.4037 15.0642C27.5367 13.9368 27.3472 12.7949 26.857 11.7705C26.3669 10.7462 25.5961 9.88121 24.6339 9.27572C23.6716 8.67022 22.5573 8.34892 21.4197 8.349Z"
                                        fill="#2FA9B5" />
                                </svg>
                            </span>

                            <div class="text-center pt-5">
                                {!! $transaction_content !!}
                            </div>

                        </div> --}}
                {{-- @endif
                
            </div> --}}
        </div>
    </div>
    <div class="flex flex-wrap sm:flex-nowrap justify-between items-end custom-footer-content">
        <div>
            <div class="flex xl:gap-3 items-center desktop-social-icons">
                <a href="https://www.facebook.com/mediqhongkong" class="mr-3 last-of-type:mr-0 xl:mr-0 me-social-link"
                target="_blank"><img src="{{ asset('frontend/img/me-fb.svg') }}" alt="social icon"></a>

                <a href="https://instagram.com/mediqhongkong" class="mr-3 last-of-type:mr-0 xl:mr-0 me-social-link"
                    target="_blank"><img src="{{ asset('frontend/img/me-ig.svg') }}" alt="social icon"></a>

                <a href="https://www.youtube.com/@mediqhongkong" class="mr-3 last-of-type:mr-0 xl:mr-0 me-social-link"
                    target="_blank"><img src="{{ asset('frontend/img/me-yt.svg') }}" alt="social icon"></a>

            {{-- <a href="https://www.linkedin.com/company/mediqhongkong" class="mr-3 last-of-type:mr-0 xl:mr-0 me-social-link" target="_blank"><img src="{{asset('frontend/img/me-linkedin.svg')}}"
                        alt="social icon"></a> --}}
                
                    
                    
            </div>

            <p class="copy-title pt-3 font-secondary font-medium me-body16 text-lightgray">
                Copyright © 2023 mediQ. All Rights Reserved.
            </p>
        </div>
        <div class="policy-link">
                <a href="{{route('termofuse')}}"
                class="text-lightgray font-secondary font-medium me-body16 mr-6 last-of-type:mr-0 underline">@lang('labels.footer.terms')</a>
                <a href="{{route('privacy.policy')}}"
                class="text-lightgray font-secondary font-medium me-body16 mr-6 last-of-type:mr-0 underline">@lang('labels.footer.policy')</a>

        </div>
    </div>
    <div class="flex xl:gap-3 items-center mobile-social-icons">
        <a href="https://www.facebook.com/mediqhongkong" class="mr-3 last-of-type:mr-0 xl:mr-0 me-social-link"
        target="_blank"><img src="{{ asset('frontend/img/me-fb.svg') }}" alt="social icon"></a>

        <a href="https://instagram.com/mediqhongkong" class="mr-3 last-of-type:mr-0 xl:mr-0 me-social-link"
            target="_blank"><img src="{{ asset('frontend/img/me-ig.svg') }}" alt="social icon"></a>

        <a href="https://www.youtube.com/@mediqhongkong" class="mr-3 last-of-type:mr-0 xl:mr-0 me-social-link"
            target="_blank"><img src="{{ asset('frontend/img/me-yt.svg') }}" alt="social icon"></a> 
    </div>

    {{-- <div class="flex flex-wrap xs:flex-nowrap justify-between items-end">
        <div>
            <div class="flex xl:gap-3 items-center">

                <a href="https://www.facebook.com/mediqhongkong" class="mr-3 last-of-type:mr-0 xl:mr-0 me-social-link"
                    target="_blank"><img src="{{ asset('frontend/img/me-fb.svg') }}" alt="social icon"></a>

                <a href="https://instagram.com/mediqhongkong" class="mr-3 last-of-type:mr-0 xl:mr-0 me-social-link"
                    target="_blank"><img src="{{ asset('frontend/img/me-ig.svg') }}" alt="social icon"></a>

                <a href="https://www.youtube.com/@mediqhongkong" class="mr-3 last-of-type:mr-0 xl:mr-0 me-social-link"
                    target="_blank"><img src="{{ asset('frontend/img/me-yt.svg') }}" alt="social icon"></a>
            </div>

            <p class="pt-3 font-secondary font-medium me-body16 text-me8f9">
                Copyright © 2023 MediQ Health Service (Asia) Limited. All rights reserved.
            </p>
        </div>

        <div>
            <a href="{{route('termofuse')}}"
                class="font-secondary font-medium me-body16 text-me8f9 mr-6 last-of-type:mr-0">@lang('labels.footer.terms')</a>
            <a href="{{route('privacy.policy')}}"
                class="font-secondary font-medium me-body16 text-me8f9 mr-6 last-of-type:mr-0">@lang('labels.footer.policy')</a>

        </div>
    </div> --}}
</div>
</div>
@if(Route::current() != null)
{{-- @php
if (Auth::guard('customer')->check() == true){
    $subscriber = App\Models\Subscriber::where('customer_id',Auth::guard('customer')->user()->id)->first();
}
@endphp --}}
@if(Auth::guard('customer')->check() == true)
<div id="coupon-popup"
    class="coupon-popup fixed bottom-0 w-full z-[4]  {{Route::current()->getName() != 'coupon.list' || Auth::guard('customer')->user()->subscriber() ? 'hidden' : '' }} ">
    <div
        class="coupon-popup-container bg-orangeLight text-darkgray p-5 lg:py-6 xl:py-8 lg:px-10 xl:px-24 lg:flex items-center justify-between rounded-[20px] relative">
        <div class="coupon-popup-desc">
            <h2 class="font-bold me-body26">@lang('labels.coupon.coupon_popup_header')</h2>
            <p class="me-body20">@lang('labels.coupon.coupon_popup_text')</p>
        </div>

        <button type="button" id="noti-on-btn"
            class="bg-orangeMediq text-light font-bold me-body16 py-3 px-5 rounded-md hover:bg-brightOrangeMediq mt-3 lg:mt-0">
            @lang('labels.coupon.coupon_popup_noti')  
        </button>

        <button type="button" id="coupon-popup-close-btn" class="absolute top-4 right-4 object-cover object-center">
            <img src="{{ asset('frontend/img/custom-close.svg') }}" alt="" class="w-3 h-auto align-middle 5xl:w-4">
        </button>
    </div>
</div>
@else
<div id="coupon-popup"
    class="coupon-popup fixed bottom-0 w-full z-[4] {{Route::current()->getName() != 'coupon.list' ? 'hidden' : '' }} ">
    <div
        class="coupon-popup-container bg-orangeLight text-darkgray p-5 lg:py-6 xl:py-8 lg:px-10 xl:px-24 lg:flex items-center justify-between rounded-[20px] relative">
        <div class="coupon-popup-desc">
            <h2 class="font-bold me-body26">@lang('labels.coupon.coupon_popup_header')</h2>
            <p class="me-body20">@lang('labels.coupon.coupon_popup_text')</p>
        </div>

        <button type="button"
            class="register-btn bg-orangeMediq text-light font-bold me-body16 py-3 px-5 rounded-md hover:bg-brightOrangeMediq mt-3 lg:mt-0">
            @lang('labels.coupon.coupon_popup_noti')  
        </button>

        <button type="button" id="coupon-popup-close-btn" class="absolute top-4 right-4 object-cover object-center">
            <img src="{{ asset('frontend/img/custom-close.svg') }}" alt="" class="w-3 h-auto align-middle 5xl:w-4">
        </button>
    </div>
</div>
@endif
@endif
<dialog class="hidden noti-on text-center text-darkgray rounded-xl p-6 xs:max-w-[468px] lg:p-10 lg:max-w-[500px]">
    <div class="noti-on-container relative">
        <img src="{{ asset('frontend/img/check-mark.svg') }}" alt="" class="mx-auto">
        <h2 class="me-body26 font-bold mt-2 lg:mt-4">@lang('labels.coupon.noti_on')</h2>
        <p class="me-body18 mt-1 lg:mt-2">
            @lang('labels.coupon.noti_on_p')
        </p>

        <button type="button" id="modalButton"
            class="bg-orangeMediq text-light font-bold me-body16 py-3 px-5 rounded-md border border-solid border-orangeMediq hover:text-orangeMediq hover:bg-light mt-3 lg:mt-5 w-full outline-0">
            @lang('labels.coupon.ok')
        </button>

        <button type="button" id="noti-on-close-btn"
            class="absolute -top-1 -right-1 object-cover object-center lg:-top-2 lg:-right-2 outline-0">
            <img src="{{ asset('frontend/img/close.svg') }}" alt="" class="w-3 h-auto align-middle lg:w-4">
        </button>
    </div>
</dialog>
<dialog id="successfully-updated-message" component-name="me-compare-status-popup" class="csp-container hidden flex items-center justify-center fixed z-[1001] left-0 top-0 w-full h-full bg-transparent overflow-hidden">
    <div class="bg-darkgray rounded-[4px] p-4">
        <p class="me-body16 helvetica-normal text-white">@lang('labels.basic_info.success_update')</p>
    </div>
</dialog>
@if (Route::currentRouteName() != null && Route::currentRouteName() == 'mediq')
@if(langbind($home, 'popup_img'))
<div component-name="me-home-banner-popup" class="home-popup w-full h-100vh fixed inset-0 cursor-pointer" id="home-popup">
    <img src="{{asset(langbind($home, 'popup_img'))}}" alt="popup banner" class="hp-image">
</div>
@endif
@endif
<div component-name="me-whatsapp-bar" class="me-whatsapp-bar-container fixed bottom-0 right-[20px] md:right-[40px]">
    <div class="flex flex-col items-center">
        <a href="https://api.whatsapp.com/send?phone=85298124646&text=@lang('labels.whats_app_text')&type=phone_number&app_absent=0" target="_blank">
            <div
                class="bg-[#60D669]  w-[50px] h-[50px] 5xl:w-[60px] 5xl:h-[60px] rounded-full flex items-center rapp-icon justify-center mb-[18px]">
                <img src="{{ asset('frontend/img/icon2.svg') }}" alt="ïcon2" class="second-icon" />
            </div>
        </a>
        @if (Route::current() != null && Route::current()->getName() != 'product.compare')
            <div
                class="bg-white w-[50px] h-[50px] 5xl:w-[60px] 5xl:h-[60px] rounded-full flex items-center justify-center mb-[18px] rcom-icon {{session()->has('compareProductItems') && count(session()->get('compareProductItems'))>0 ? 'active':''}}">
                <img src="{{ asset('frontend/img/icon1.svg') }}" alt="icon1" class="first-icon" />
            </div>
        @endif
        <button
            class="bg-white w-[60px] h-[30px] 5xl:w-[60px] 5xl:h-[30px] me-go-top flex items-center justify-center">
            <p>Top</p>
        </button>
    </div>
</div>

<div id="add-compare-modal0-quick-preview"
    class="modal hidden fixed z-[1001] left-0 top-0 w-full h-full bg-black/[.75]  overflow-auto">
    <!-- Modal content -->
    <div class="modal-content max-w-[80%] lg:max-w-[700px] shadow-shadow02 my-[15%] mx-auto">
        <div class="relative rounded-[12px] bg-white">
            <div class="flex ml-auto mr-6 w-5 h-5 absolute right-0 top-4">
                <span data-id="add-compare-modal0-quick-preview"
                    class="pb-[4px] absolute left-1/2 top-1/2 -translate-y-1/2 -translate-x-1/2 close-add-compare-modal  flex items-center justify-center text-[32px] w-full cursor-pointer text-[#1A1818] focus:no-underline">&times;</span>
            </div>
            <div class="modal-content-plan">
                <div class="preview-bgradient p-10 pb-5 rounded-t-[40px]">
                    <h2 class="font-secondary font-bold text-darkgray me-title29 text-center">@lang('labels.footer.compare_products')</h2>
                </div>
            </div>
        </div>
    </div>
</div>
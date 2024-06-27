@extends('frontend.layouts.master')
@include('frontend.seo', ['seo' => isset($seo) ? $seo : ''])
@section('content')
@include('frontend.checkouts.empty_card')
<div component-name="me-checkout-merchant-list"
    class="mt-[70px] relative flex lg:flex-row flex-col me-checkout-merchant-list-main-container hidden">
    <div class="me-checkout-merchant-list-container mr-10">
        <input type="number" class="hidden recipient_area_id">
        @if(count($recipients) > 0)
        @include('frontend.checkouts.cards.recipient-list')
        @endif

        @if(count($isTwoRecipients) > 1)
        @include('frontend.checkouts.cards.two_person_reci_list')
        @endif

        @if(count($recipients) > 0)
        @include('frontend.checkouts.cards.expired-recipient',['is_two_person_plan' => false])
        @endif

        @if(count($isTwoRecipients) > 1)
        @include('frontend.checkouts.cards.expired-recipient',['is_two_person_plan' => true])
        @endif  

        @if(count($recipients) > 0)
        @foreach($recipients as $recipient)
        @include('frontend.checkouts.cards.unavailable-recipient', ['is_two_person_plan' => false])
        @endforeach
        @endif

        @if(count($isTwoRecipients) > 1)
        @foreach($isTwoRecipients->split($isTwoRecipients->count()/2) as $key => $row)
        @if(count($row) == 2)
        @php
            if($key == 0){
                $keyVal = $row[0];
            }else{
                $keyVal = $row[1];
            }
        @endphp
        @include('frontend.checkouts.cards.unavailable-recipient', ['is_two_person_plan' => true])
        @endif
        @endforeach
        @endif

        <div class="mt-10 flex sm:flex-row flex-col justify-between mb-[48px] items-center bottom-navigation">
            <div class="w-full lg:block hidden">
                <p class="me-body-16 font-normal text-lightgray flex flex-wrap">@lang('labels.check_out.protected')
                    <a href="{{route('best')}}" target="_blank" class="me-body-16 font-normal text-lightgray underline ml-1">@lang('labels.check_out.awesome_booking')</a>
                </p>
                <div class="flex items-center sm:mt-5 mt-2">
                    <div class="back_to_home_page">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                            <path
                                d="M12.7961 19.4533C13.0235 19.3478 13.1266 19.0829 13.0305 18.8462C13.0047 18.7829 12.2664 18.0329 10.3539 16.1298L7.7102 13.4978L10.3539 10.8681C12.2688 8.96028 13.0047 8.21263 13.0305 8.14935C13.0493 8.10013 13.0657 8.0181 13.0657 7.96653C13.0657 7.62903 12.7235 7.40169 12.4211 7.54231C12.2875 7.6056 6.70004 13.1673 6.64145 13.2986C6.5852 13.4181 6.5852 13.5775 6.64145 13.697C6.70004 13.8283 12.2875 19.39 12.4211 19.4533C12.5407 19.5095 12.6766 19.5095 12.7961 19.4533Z"
                                fill="#333333" />
                        </svg>
                    </div>
                    <a href="{{route('mediq')}}" class="me-body-18 font-normal text-darkgray">@lang('labels.check_out.save_and_continue')
                    </a>
                </div>
            </div>
            <div class="sm:w-auto w-full sm:mt-0 mt-2">
                <button
                    class="book-now-btn rounded-md px-5 py-[9px] me-body-20 font-bold bg-orangeMediq text-whitez hover:bg-brightOrangeMediq xl:min-w-400px min-w-[250px] sm:w-auto w-full">@lang('labels.book_now')</button>
            </div>
        </div>
    </div>
    <div>
        <div component-name="me-checkout-order-summary"
            class=" lg:fixed lg:mb-0 mb-7 me-checkout-order-summary-container">
            <div class="">
                <div class="checkout-page3-selected-list hidden">
                    <div>
                        <div class="flex justify-between items-center selected-list-collpase active py-5 px-5">
                            <p class="font-bold me-body-23 text-darkgray">Selected Items (2)</p>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path
                                        d="M5.04675 12.7961C5.15222 13.0235 5.41706 13.1266 5.65378 13.0305C5.71706 13.0047 6.46706 12.2664 8.37019 10.3539L11.0022 7.7102L13.6319 10.3539C15.5397 12.2688 16.2874 13.0047 16.3507 13.0305C16.3999 13.0493 16.4819 13.0657 16.5335 13.0657C16.871 13.0657 17.0983 12.7235 16.9577 12.4211C16.8944 12.2875 11.3327 6.70004 11.2014 6.64145C11.0819 6.5852 10.9225 6.5852 10.803 6.64145C10.6717 6.70004 5.11003 12.2875 5.04675 12.4211C4.9905 12.5407 4.9905 12.6766 5.04675 12.7961Z"
                                        fill="#333333" />
                                </svg>
                            </div>
                        </div>
                        <div class="selected-list-collpase-content">
                            <div component-name="me-checkout-selected-items"
                                class="w-[360px] max-h-[300px] overflow-y-auto px-5 pb-5 me-checkout-selected-items-container lg:fixed lg:mb-10 mb-7">
                                <div class="me-checkout-selected-items">

                                    <div class="border-b-1 border-mee4 pb-5 mb-5 last:mb-0 last:border-b-0">
                                        <div class="flex">
                                            <img src="{{asset('frontend/img/logo1-small.png')}}"
                                                class=" mr-3 max-w-[40px] max-h-[40px]" alt="logo-0" />
                                            <p class="font-bold me-body-16 text-darkgray">Medtimes Premier
                                                Health Check Care</p>
                                        </div>
                                        <div class="mt-2">
                                            <p class="font-bold me-body-16 text-darkgray text-right">$9,600.00
                                            </p>
                                        </div>
                                    </div>

                                    <div class="border-b-1 border-mee4 pb-5 mb-5 last:mb-0 last:border-b-0">
                                        <div class="flex">
                                            <img src="{{asset('frontend/img/logo2-small.png')}}"
                                                class=" mr-3 max-w-[40px] max-h-[40px]" alt="logo-1" />
                                            <p class="font-bold me-body-16 text-darkgray">Mobile Medical 2
                                                Person Plan Annual Female Health Check (Excel Plan)</p>
                                        </div>
                                        <div class="mt-2">
                                            <p class="font-bold me-body-16 text-darkgray text-right">$14,000.00
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                $totalRecipient = count($recipients) + (count($isTwoRecipients)/2);
                @endphp
                <div class="p-5 me-checkout-order-summary mt-10">
                    <h1 class="font-bold me-body-23 text-darkgray">@lang('labels.check_out.order')</h1>
                    <div class="mt-3">
                        <div class="">
                            <div class="flex justify-between">
                                <div class="flex items-center checkout-summary-collpase cursor-pointer">
                                    <h3 class="font-bold text-darkgray me-body-18">@lang('labels.check_out.sub_total') (<span class="count_product">{{$totalRecipient}}</span>)</h3>
                                    {{-- <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20" fill="none">
                                            <path
                                                d="M15.5743 12.472C15.4864 12.6615 15.2657 12.7474 15.0685 12.6674C15.0157 12.6459 14.3907 12.0306 12.8048 10.4369L10.6114 8.23376L8.42003 10.4369C6.83018 12.0326 6.20714 12.6459 6.1544 12.6674C6.11339 12.683 6.04503 12.6967 6.00206 12.6967C5.72081 12.6967 5.53136 12.4115 5.64854 12.1595C5.70128 12.0482 10.336 7.39196 10.4454 7.34313C10.545 7.29626 10.6778 7.29626 10.7774 7.34313C10.8868 7.39196 15.5216 12.0482 15.5743 12.1595C15.6212 12.2592 15.6212 12.3724 15.5743 12.472Z"
                                                fill="#333333" />
                                        </svg>
                                    </div> --}}
                                </div>
                                <input class="hidden font-bold text-darkgray me-body-18 summary-card-total-price">
                                <h3 class="font-bold text-darkgray me-body-18 summary-card-total-price"></h3>
                            </div>
                            {{-- <div class="mt-2 checkout-summary-collpase-content">
                                <div class="flex justify-between items-center">
                                    <p class="font-normal text-darkgray me-body-16">@lang('labels.product_detail.item_total')</p>
                                    <p class="font-normal text-darkgray me-body-16 summary-card-item-total">$29,188.00</p>
                                </div>
                                <div class="flex justify-between items-center">
                                    <p class="font-normal text-darkgray me-body-16">@lang('labels.check_out.discount')</p>
                                    <p class="font-normal text-darkgray me-body-16 summary-card-discount">$29,188.00</p>
                                </div>
                            </div> --}}
                            {{-- <div class="mt-2 flex justify-between checkout-summary-collpase-content">
                                <p class="font-normal text-darkgray me-body-16">@lang('labels.check_out.item_total')</p>
                                <p class="font-normal text-darkgray me-body-16 summary-card-total-price"></p>
                            </div> --}}
                            <!-- <div class="mt-2 hidden justify-between">
                                <p class="font-normal text-darkgray me-body-16">On Sale Offer</p>
                                <p class="font-normal text-darkgray me-body-16">- $1,010.00</p>
                            </div> -->
                        </div>
                        <div class="summary-item-total hidden">
                            <div class="mt-2 flex justify-between">
                                <p class="font-bold text-darkgray me-body-16">@lang('labels.check_out.item_total')</p>
                                <p class="font-bold text-darkgray me-body-18 summary-card-total-price">$29,188.00</p>
                            </div>
                            <div class="mt-2 flex justify-between">
                                <p class="font-bold text-darkgray me-body-16">Order Discount</p>
                                <p class="font-bold text-darkgray me-body-16">- $1,140.00</p>
                            </div>
                        </div>
                        <hr class="bg-mee4 my-5" />
                        <div>
                            <div class="flex items-center justify-between ">
                                <p class="font-bold text-darkgray me-body-18">@lang('labels.check_out.my_discount')</p>
                                <p class="font-bold me-body-16 text-darkgray my_discount hidden"></p>
                            </div>
                            <div class="mt-3">
                                <div class="mt-2 hidden bg-far p-[10px] rounded-[4px]">
                                    <div class="flex justify-between">
                                        <p class="font-normal me-body-14 text-darkgray">@lang('labels.check_out.my_discount')</p>
                                        <p class="font-normal me-body-14 text-darkgray">- $30.00</p>
                                    </div>
                                </div>
                                <div>
                                    <div class="bg-far py-3 px-[10px] flex justify-between before-choose-coupon ">
                                    <form><input
                                            class="promo-code bg-transparent focus:outline-none focus-visible:outline-none w-[90%] font-normal text-meA3 placeholder:text-meA3 me-body-16"
                                            placeholder="@lang('labels.check_out.enter_promo')" /></form>
                                        <span
                                            class="font-normal text-orangeMediq me-body-16 cursor-pointer use-promo-code-btn hidden">@lang('labels.check_out.use')</span>
                                        <span
                                            class="font-normal text-orangeMediq me-body-16 cursor-pointer use-promo-code-btn-input-text">@lang('labels.check_out.use')</span>
                                    </div>
                                    <div class="mt-2 before-choose-coupon hidden">
                                        <p
                                            class="select-coupon-btn underline font-normal text-darkgray me-body-16 cursor-pointer">
                                            @lang('labels.check_out.select_coupon') (<span class="count_available_coupon">{{count($availableCoupons)}}</span>)</p>
                                    </div>
                                    <div class="promo-code-error hidden">
                                        <div class="promo-code-error-msg flex items-center bg-far py-3 px-[10px]">
                                            <p class="mr-4 text-[#EE220C] font-normal me-body-14 text-">{{__('labels.check_out.promo_validate')}}</p>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M12.5908 10.6904C12.5641 10.5429 12.4831 10.4107 12.3638 10.3199C12.2445 10.2291 12.0955 10.1862 11.9462 10.1998C11.7969 10.2133 11.658 10.2823 11.557 10.3931C11.456 10.5039 11.4001 10.6485 11.4004 10.7984V16.2008L11.41 16.3088C11.4367 16.4564 11.5177 16.5886 11.637 16.6794C11.7563 16.7702 11.9053 16.813 12.0546 16.7995C12.2039 16.7859 12.3428 16.717 12.4438 16.6062C12.5448 16.4954 12.6007 16.3508 12.6004 16.2008V10.7984L12.5908 10.6904ZM12.9592 8.09844C12.9592 7.85974 12.8644 7.63082 12.6956 7.46204C12.5268 7.29326 12.2979 7.19844 12.0592 7.19844C11.8205 7.19844 11.5916 7.29326 11.4228 7.46204C11.254 7.63082 11.1592 7.85974 11.1592 8.09844C11.1592 8.33713 11.254 8.56605 11.4228 8.73483C11.5916 8.90362 11.8205 8.99844 12.0592 8.99844C12.2979 8.99844 12.5268 8.90362 12.6956 8.73483C12.8644 8.56605 12.9592 8.33713 12.9592 8.09844ZM21.6004 11.9984C21.6004 9.45236 20.589 7.01056 18.7886 5.21021C16.9883 3.40986 14.5465 2.39844 12.0004 2.39844C9.45431 2.39844 7.01251 3.40986 5.21217 5.21021C3.41182 7.01056 2.40039 9.45236 2.40039 11.9984C2.40039 14.5445 3.41182 16.9863 5.21217 18.7867C7.01251 20.587 9.45431 21.5984 12.0004 21.5984C14.5465 21.5984 16.9883 20.587 18.7886 18.7867C20.589 16.9863 21.6004 14.5445 21.6004 11.9984ZM3.60039 11.9984C3.60039 10.8953 3.81766 9.80303 4.2398 8.7839C4.66194 7.76476 5.28068 6.83875 6.06069 6.05874C6.8407 5.27873 7.76671 4.65999 8.78585 4.23785C9.80498 3.81571 10.8973 3.59844 12.0004 3.59844C13.1035 3.59844 14.1958 3.81571 15.2149 4.23785C16.2341 4.65999 17.1601 5.27873 17.9401 6.05874C18.7201 6.83875 19.3388 7.76476 19.761 8.7839C20.1831 9.80303 20.4004 10.8953 20.4004 11.9984C20.4004 14.2263 19.5154 16.3628 17.9401 17.9381C16.3648 19.5134 14.2282 20.3984 12.0004 20.3984C9.77257 20.3984 7.636 19.5134 6.06069 17.9381C4.48539 16.3628 3.60039 14.2263 3.60039 11.9984Z"
                                                    fill="#EE220C" />
                                            </svg>
                                        </div>
                                        <div class="mt-2">
                                            <p
                                                class="select-coupon-btn underline font-normal text-darkgray me-body-16 cursor-pointer">
                                                @lang('labels.check_out.select_a_coupon') (<span class="count_available_coupon">{{count($availableCoupons)}}</span>)</p>
                                        </div>
                                    </div>
                                    <div class="added-promo-code after-choose-coupon hidden">
                                        <div class="flex items-center">
                                            <p class="mr-[10px] font-normal me-body-16 text-darkgray coupon-promo-code">Promo Code
                                            </p>
                                            <div class="relative inline-block promo_background">
                                                <!-- <div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="110" height="28"
                                                        viewBox="0 0 110 28" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M0 2C0 0.895431 0.89543 0 2 0H108C109.105 0 110 0.895431 110 2V7C106.134 7 103 10.134 103 14C103 17.866 106.134 21 110 21V26C110 27.1046 109.105 28 108 28H2C0.895429 28 0 27.1046 0 26V21C3.86599 21 7 17.866 7 14C7 10.134 3.86599 7 0 7V2Z"
                                                            fill="#FFF2E5" />
                                                    </svg>
                                                </div> -->
                                                <p
                                                    class="promo-code-text whitespace-nowrap text-ellipsis max-w-[62px] overflow-hidden font-normal me-body-14 text-darkgray absolute left-3 top-1/2 -translate-y-1/2">
                                                    ZB0CC30</p>
                                                <div
                                                    class="cursor-pointer remove-promo-code absolute right-3 top-1/2 -translate-y-1/2" onclick="remove_promo_code()">
                                                    <div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17"
                                                            viewBox="0 0 16 17" fill="none">
                                                            <path
                                                                d="M12.2001 4.30682C12.1385 4.24501 12.0652 4.19598 11.9846 4.16253C11.9039 4.12907 11.8175 4.11185 11.7301 4.11185C11.6428 4.11185 11.5564 4.12907 11.4757 4.16253C11.3951 4.19598 11.3218 4.24501 11.2601 4.30682L8.00015 7.56015L4.74015 4.30015C4.67843 4.23843 4.60515 4.18947 4.52451 4.15606C4.44387 4.12266 4.35744 4.10547 4.27015 4.10547C4.18286 4.10547 4.09643 4.12266 4.01579 4.15606C3.93514 4.18947 3.86187 4.23843 3.80015 4.30015C3.73843 4.36187 3.68947 4.43514 3.65606 4.51579C3.62266 4.59643 3.60547 4.68286 3.60547 4.77015C3.60547 4.85744 3.62266 4.94387 3.65606 5.02451C3.68947 5.10515 3.73843 5.17843 3.80015 5.24015L7.06015 8.50015L3.80015 11.7601C3.73843 11.8219 3.68947 11.8951 3.65606 11.9758C3.62266 12.0564 3.60547 12.1429 3.60547 12.2301C3.60547 12.3174 3.62266 12.4039 3.65606 12.4845C3.68947 12.5652 3.73843 12.6384 3.80015 12.7001C3.86187 12.7619 3.93514 12.8108 4.01579 12.8442C4.09643 12.8776 4.18286 12.8948 4.27015 12.8948C4.35744 12.8948 4.44387 12.8776 4.52451 12.8442C4.60515 12.8108 4.67843 12.7619 4.74015 12.7001L8.00015 9.44015L11.2601 12.7001C11.3219 12.7619 11.3951 12.8108 11.4758 12.8442C11.5564 12.8776 11.6429 12.8948 11.7301 12.8948C11.8174 12.8948 11.9039 12.8776 11.9845 12.8442C12.0652 12.8108 12.1384 12.7619 12.2001 12.7001C12.2619 12.6384 12.3108 12.5652 12.3442 12.4845C12.3776 12.4039 12.3948 12.3174 12.3948 12.2301C12.3948 12.1429 12.3776 12.0564 12.3442 11.9758C12.3108 11.8951 12.2619 11.8219 12.2001 11.7601L8.94015 8.50015L12.2001 5.24015C12.4535 4.98682 12.4535 4.56015 12.2001 4.30682Z"
                                                                fill="#333333" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="bg-mee4 my-5" />
                        <div class="hidden">
                            <input type="number" class="code_price" value="0">
                            <input type="hidden" class="code_id" value="0">
                            <input type="hidden" class="code_type">
                            <input type="hidden" class="discount_type">
                            <input type="hidden" class="minimum_amount" value="0">
                        </div>
                        <div>
                            <div class="mt-1 flex justify-between">
                                <p class="font-bold text-darkgray me-body-18"> @lang('labels.check_out.total')</p>
                                <p class="font-bold text-darkgray me-body-18 summary-last-total"></p>
                            </div>
                        </div>
                        <div class="mt-5">
                            <button
                                class="book-now-btn rounded-md px-5 py-[9px] me-body-20 font-bold bg-orangeMediq text-whitez hover:bg-brightOrangeMediq w-full">@lang('labels.book_now')</button>
                        </div>
                    </div>
                </div>
                <div class="w-full  mt-3 lg:hidden block">
                    <p class="me-body-16 font-normal text-lightgray flex flex-wrap">@lang('labels.check_out.protected')
                        <a href="{{route('best')}}" target="_blank" class="me-body-16 font-normal text-lightgray underline ml-1">@lang('labels.check_out.awesome_booking')</a>
                    </p>
                    <div class="flex items-center sm:mt-5 mt-2">
                        <div class="back_to_home_page">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                <path
                                    d="M12.7961 19.4533C13.0235 19.3478 13.1266 19.0829 13.0305 18.8462C13.0047 18.7829 12.2664 18.0329 10.3539 16.1298L7.7102 13.4978L10.3539 10.8681C12.2688 8.96028 13.0047 8.21263 13.0305 8.14935C13.0493 8.10013 13.0657 8.0181 13.0657 7.96653C13.0657 7.62903 12.7235 7.40169 12.4211 7.54231C12.2875 7.6056 6.70004 13.1673 6.64145 13.2986C6.5852 13.4181 6.5852 13.5775 6.64145 13.697C6.70004 13.8283 12.2875 19.39 12.4211 19.4533C12.5407 19.5095 12.6766 19.5095 12.7961 19.4533Z"
                                    fill="#333333" />
                            </svg>
                        </div>
                        <a href="{{route('mediq')}}" class="me-body-18 font-normal text-darkgray">@lang('labels.check_out.save_and_continue')
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="me-coupon-popup" class="me-coupon-popup hidden">
</div>
@if (count($availableCoupons) > 0)
        @foreach ($availableCoupons as $key => $coupon)
            @include('frontend.home.coupon_model', ['coupon_type' => 'single_coupon'])
        @endforeach
@endif
@if (count($notAvailableCoupons) > 0)
        @foreach ($notAvailableCoupons as $key => $coupon)
            @include('frontend.home.coupon_model', ['coupon_type' => 'single_coupon'])
        @endforeach
@endif
@endsection
@push('scripts')
<script>
$(function() {
    // let expired = $('.is_expired').val();
    // if(expired != undefined || expired == 'yes'){
    //     var expired_text=$('.expired_text').text();
    //     var expired_text2=$('.expired_text2').text();

    //     if(expired_text == '' || expired_text2 != ''){
    //         $('.expired_text2').text('Expired');
    //     }
    //     if(expired_text != '' || expired_text2 == ''){
    //         $('.expired_text').text('Expired');
    //     }
    //     if(expired_text != '' || expired_text2 != ''){
    //         $('.expired_text').text('Expired');
    //     }
    // }

    initialCancerMarkers();
    initialAddsonItems();
    initializePreferredTimeData();
    console.log('is_info',{!! json_encode(session()->get('is_info'))!!},Object.keys({!!json_encode(config('mediq.coupon_status'))!!}))
})

function clearPreferredData(currentDataID){
    $('.checkout-location' + currentDataID).val(null);
    $('.checkout-time' + currentDataID).val('');
    $('.checkout-date' + currentDataID).val('');
    $('input[name="decide-later-' + currentDataID + '"]').prop('checked',false);
    $('input[name="decide-later-' + currentDataID + '"]').val(false);
    $('.checkout-decidelater' + id).val('false')
}

function clearCancerMarkersData(id) {
    $('.cancerMarkers-selected-tags-ids-' + id).val('');
    $('.cancerMarkers-selected-tags' + id).val('');
    $('#cancer-markers-decideLater-' + id).val(false);
    $('#cancer-markers-decideLater-' + id).prop('checked', false);
    $('.selected-cancermarkers-count-' +id).text(0)
    console.log($('.selected-cancermarkers-count-'+id).text(),'test',$('#cancer-markers-decideLater-' + id).prop(':checked'),'ischeck',$('#cancer-markers-decideLater-' + id).is(':checked'))
}

$(document).on('click', '#me-checkout-cancer-markers-popup-close-btn', function () {
    var id = $(this).attr('data-id');
    var items = $(this).attr('data-items');
    var optional_decide_later = $(this).attr('data-optional_decide_later');
    if((items == null || items == "") && (optional_decide_later==false || optional_decide_later == 0 || optional_decide_later == '0')){
    clearCancerMarkersData(id);
    }
    else if((items!=null || items!="") && (optional_decide_later==false || optional_decide_later == 0 || optional_decide_later == '0')){
    $('.cancerMarkers-selected-tags-ids-' + id).val(items);
    $('#cancer-markers-decideLater-' + id).prop('checked', false);
    initialCancerMarkers()
    }
    else if((items==null || items=="") && (optional_decide_later==true || optional_decide_later == 1 || optional_decide_later == '1')){
    $('#cancer-markers-decideLater-' + id).prop('checked', true);
    initialCancerMarkers()
    }
    else{
    var isChecked=(optional_decide_later=="true" || optional_decide_later=="0" || optional_decide_later==0 || optional_decide_later==true)?true:false;
    $('.cancerMarkers-selected-tags-ids-' + id).val(items);
    if(items==null || items==""){
    $('#cancer-markers-decideLater-' + id).val(isChecked);
    $('#cancer-markers-decideLater-' + id).prop('checked', isChecked);
    }
    $('#cancer-markers-decideLater-' + id).val(isChecked);
    $('#cancer-markers-decideLater-' + id).prop('checked', isChecked);
    initialCancerMarkers()
    }
})

$(document).on('click','#checkout-time-popup',function(){
    var id=$(this).attr('data-id');
    var date=$(this).attr('data-date');
    var decide_later=$(this).attr('data-decide_later');
     console.log('date',date,'decide_later',decide_later)
    if((data == null  || date == '') && (decide_later == false || decide_later == 0 || decide_later == "0" || decide_later == "false")){
        clearPreferredData(id)
        renderCheckoutCalendar(id)
         $('.preferred-time-popup preferred-time-popup-'+id+' .choose-time-container').css('opacity',1);
         $('.preferred-time-popup preferred-time-popup-'+id+' .choose-time-container').css('pointer-events','all')
    }else{
        if(decide_later == false || decide_later == 0 || decide_later == "0" || decide_later == "false"){
            renderCheckoutCalendar(id)
         $('input[name="decide-later-' + id + '"]').prop('checked',false);
         $('input[name="decide-later-' + id + '"]').val(false);
         $('.preferred-time-popup preferred-time-popup-'+id+' .choose-time-container').css('opacity',1);
         $('.preferred-time-popup preferred-time-popup-'+id+' .choose-time-container').css('pointer-events','all');
         $('.checkout-decidelater' + id).val('false')
        }else{
            $('.checkout-decidelater' + id).val('true');
            $('input[name="decide-later-' + id + '"]').prop('checked',true);
         $('input[name="decide-later-' + id + '"]').val(true);
        }
    }
    disabledCalendar(id)

})

$(document).on('click', '.book-now-btn', function(e) {
    let bookNowBtn = bookNowBtnEvent()
    // console.log('bookNowBtnEvent',bookNowBtn)
    let is_expired = $('.is_expired').val();
    if(is_expired == undefined || is_expired == 'no'){
        $('.expired_text').text();
        if (bookNowBtn.isValid == true) {
            let my_discount_price = $('.code_price').val()
            let code_type = $('.code_type').val()
            let code_type_id = $('.code_id').val()
            let discount_type = $('.discount_type').val()
            // console.log('my_discount_price',my_discount_price)
            $.ajax({
                type: 'POST',
                url: "{{route('checkout.bookNow')}}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'my_discount_price': my_discount_price,
                    'discount_type': discount_type,
                    'code_type': code_type,
                    'code_type_id': code_type_id,
                },
                async: false, // open new tab
                success: function(response) {
                    if (response.status == 200) {
                        {!! session()->put('is_info',uniqid()) !!} 
                        let getCode = {!! json_encode(session()->get('is_info'))!!} 
                        window.location.href = "{{langlink('checkout/enter-information?is_info=')}}"+ getCode;
                    }
                }
            })
        } else {
            // console.log('bookNowBtn',bookNowBtn.errorMessage)
            toastr.success(bookNowBtn.errorMessage);
        }
    }else{
        // toastr.success('Please update recipient date');
    }
});

function submitItem(group_id, recipient_id) {
    confirmCancerMakers('receipientData' + group_id + recipient_id);
    let formData = $("#updateCheckUpItemForm" + group_id + recipient_id).serialize();
    saveCheckUpData("{{route('checkout.saveCheckUpItems')}}", formData,'location');
}

function submitLocation(recipient_id) {
    var confirmChekout = checkoutDateConfirm('receipientData'+recipient_id);
    let formData = $("#updateCheckUpLocation" + recipient_id).serialize();
    if(confirmChekout == false){
        saveCheckUpData("{{route('checkout.saveCheckUpLocations')}}", formData,'location');
    }
}

function submitPackage(recipient_id) {
    checkoutPackageConfirm('receipientData'+recipient_id)
    $('input[name="variable_id"]').val($('.packages-items-id-receipientData'+recipient_id).val())
    let formData = $("#updatePackageForm" + recipient_id).serialize();
    saveCheckUpData("{{route('checkout.savePackages')}}", formData);
}

function submitAddOn(recipient_id) {
    confirmAddsonItems('receipientData' + recipient_id)
    let formData = $("#updateAddOnForm" + recipient_id).serialize();
    let str_total = $('.summary-card-total-price').val()
    // console.log('str_total',str_total)
    let price = $('.code_price').val();
    let t_item = changeCurrencyToInt(str_total)
    let alltotal = parseInt(t_item) - parseInt(price);
    // console.log('alltotal',t_item)
    disCalculate(t_item)
    // $('.summary-last-total').html('HK'+floatToCurrency(alltotal))
    saveCheckUpData("{{route('checkout.saveAddOnItems')}}", formData);
}

function removeRecipient(recipient_id) {
    // console.log('recipient_id',recipient_id);
    var remove_product = `${window.translations.remove_product}`;
    removeCardData(recipient_id)
    let formData = $("#removeRecipient" + recipient_id).serialize();
    saveCheckUpData("{{route('checkout.removeRecipient')}}", formData, 'remove');
    toastr.success(remove_product);
}
$(function(){
    $('.me-checkout-merchant-list-main-container').removeClass('hidden')
    saveCheckUpData("{{route('checkout.removeRecipient')}}", null, 'remove');
})
function disCalculate(alltotal){
    var cprice = $('.code_price').val();
    var dtype =$('.discount_type').val();
    // console.log('subprice',alltotal,cprice,dtype)
    if( cprice != null){
        if(dtype == 'percent'){
            var subtotal =  (parseInt(alltotal) / 100)* parseInt(cprice);
            var totalPrice = parseInt(alltotal) - subtotal;
            var gtotal =  Math.round(totalPrice)
        }else{
            var gtotal = parseInt(alltotal) - parseInt(cprice);
        }
        $('.summary-last-total').html('HK'+floatToCurrency(gtotal));
    }
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
        success: function(res) {
            if(res.is_old_date !== undefined && res.is_old_date != null && res.is_old_date !== '' &&  res.is_old_date == true){
                    location.reload();
                }
            if(res.is_variable != null && res.is_variable == true){
                $('.checkout-price-summary-'+res.recipient_id).html(floatToCurrency(res.total_price));
                $('.summary-card-total-price').val(res.total_amount)
                $('.summary-card-total-price').html('HK'+floatToCurrency(res.total_amount));
                disCalculate(parseInt(res.total_amount))
                // $('.summary-last-total').html('HK'+floatToCurrency(res.total_amount));
            }

            console.log('location',action,res.allReicipients)
            if(action == 'location' && res.allReicipients !== undefined && res.allReicipients == 0){
                $('.is_expired').val('no')
            }

            if (action == 'remove') {
                // console.log('reponses',res.recipients.length,res.total_amount,res.availableCoupons)
                let minimum_amount = $('.minimum_amount').val();
                // console.log(res.cart);
                $('#add_cart_val').text(res.cart)
                $('.count_available_coupon').html(res.availableCoupons.length)
                $('.count_product').html(res.recipients.length)
                $('input.summary-card-total-price').val(res.total_amount);
                $('.summary-card-total-price').html(floatToCurrency(res.total_amount));
                var cprice = $('.code_price').val();
                var dtype =$('.discount_type').val();
                // console.log('subprice',res.total_amount,cprice,dtype)
                if( cprice != null){
                    if(dtype == 'percent'){
                        var subtotal =  (parseInt(res.total_amount) / 100)* parseInt(cprice);
                        var totalPrice = parseInt(res.total_amount) - subtotal;
                        var gtotal =  Math.round(totalPrice)
                    }else{
                        var gtotal = parseInt(res.total_amount) - parseInt(cprice);
                    }
                    $('.summary-last-total').html('HK'+floatToCurrency(gtotal));
                }else{
                    $('.summary-last-total').html('HK'+floatToCurrency(gtotal));
                }
                if(res.recipients.length == 0){
                    $('.me-checkout-merchant-list-main-container').addClass('hidden')
                    $('.is_empty').removeClass('hidden')
                }else{
                    $('.me-checkout-merchant-list-main-container').removeClass('hidden')
                    $('.is_empty').addClass('hidden')
                    // console.log('minimun',res.total_amount,$('.minimum_amount').val());
                    if(res.total_amount < minimum_amount){
                        remove_promo_code();
                        location.reload();
                    }
                }
                console.log('test',res.old_date)
                if(res.old_date !== undefined && res.old_date != null && res.old_date !== '' &&  res.old_date == true){
                    location.reload();
                }

                var coupon_status= Object.keys({!!json_encode(config('mediq.coupon_status'))!!})
                var avaCoupons= {!!json_encode($availableCoupons)!!}
                let available_coupons =res.availableCoupons
                // console.log('available_coupons',available_coupons)
                var clng = {!! json_encode(lang())!!};
                if(clng == 'zh-hk'){
                   var tlng = 'tc'
                }else if(clng == 'zh-cn'){
                   var tlng = 'sc'
                }else{
                   var tlng = 'en'
                }
                let coupon_name = `name_${tlng}`;
                let coupon_sub_title = `sub_title_${tlng}`;
                var couponContent = "";
                let originUrl = window.location.origin;
                // console.log('availableCoupons',res.availableCoupons,res.notAvailableCoupons,Array.isArray(res.availableCoupons),Array.isArray(res.notAvailableCoupons),res.availableCoupons.length)
                couponContent +=`<div
                        class="me-coupon-popup-content absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 pl-5 pt-10 pb-10 sm:pr-5 pr-3 text-center text-darkgray rounded-xl w-full max-h-[90%] max-w-[90%] sm:max-w-max lg:min-h-[650px] lg:min-w-[530px] xl:max-w-[530px] bg-whitez shadow-[0px_4px_15px_2px_rgba(0,0,0,0.1)]">
                        <div class="relative w-full">
                            <button class="absolute top-[-1rem] right-0 focus-visible:outline-none focus:outline-none p-1"
                                id="me-coupon-popup-close"><img class=" w-auto h-auto align-middle"
                                    src="{{asset('frontend/img/close-btn.png')}}" alt=""></button>
                            <div class="me-body18">
                                <div>
                                    <h3 class="font-bold me-body-23 text-darkgray text-left">@lang('labels.check_out.select_coupon')</h3>
                                </div>
                                <div class="mt-5">
                                    <div class="flex">
                                        <p data-id="availableList"
                                            class="coupon-tabs-list cursor-pointer font-normal me-body-18 text-darkgray active mr-8">
                                            @lang('labels.check_out.avaliable') (`+res.availableCoupons.length+`)</p>
                                        <p data-id="unavailableList"
                                            class="coupon-tabs-list cursor-pointer font-normal me-body-18 text-darkgray ">
                                            @lang('labels.check_out.not_avaliable') (`+res.notAvailableCoupons.length+`)</p>
                                    </div>
                                </div>
                                <div class="availableList lg:max-h-[500px] max-h-[450px] overflow-y-auto sm:pl-5 sm:pr-5 pr-2 pb-5">`;
                                // console.log('code check',$('.code_id').val(),originUrl)    
                                if(available_coupons.length > 0){
                                        // console.log('coupon code_id',parseInt($('.code_id').val()))
                                        if($('.code_id').val() !== "0"){
                                            avaCoupons.filter(function(obj,key) {
                                                // console.log('code_id_',obj.id)
                                                if(parseInt(obj.id) == parseInt($('.code_id').val())){
                                                    // console.log('key',obj)
                                                    remove_promo_code();
                                                }
                                            });
                                        }
                                        available_coupons.forEach(function(coupon,key){
                                            if(coupon.merchant){
                                                var icon = coupon.merchant.icon;
                                            }else if(coupon.icon){
                                                var icon = coupon.icon;
                                            }else{
                                                var icon = originUrl+'/img/quantity-logo.png'
                                            }
                                            couponContent += `<div data-id='collect-detail-modal`+coupon.id+`' component-name="me-coupon-popup-listcontent" class="me-coupon-popup-listcontent mt-5 py-2 open-coupon-popup not_v_bundle">
                                                <div class="flex justify-between">
                                                    <div class="flex items-center px-[10px] w-full">
                                                        <div class="relative mr-4 mt-4">`;
                                                            if(coupon.is_new_or_limited){
                                                                coupon_status.forEach(function(type,key){
                                                                if(key == coupon.is_new_or_limited){
                                                                        
                                                                couponContent +=`<div class="px-[10px] py-[6px] bg-[#F0F9F0] rounded-[4px] absolute top-[-20px] w-full flex justify-center">
                                                                    <span class="me-body-14 font-bold text-[#2FAF32]">`+type+`</span>
                                                                    </div>`;
                                                                }
                                                                })
                                                            }
                                                            couponContent += `<img src="`+icon+`" class="max-w-[81px] max-h-[81px] rounded-full checkout-quantity-logo" alt="quantity-logo" />
                                                        </div>
                                                        <div>
                                                            <p class="text-left font-bold text-darkgray me-body-20 leading-[normal]">`+coupon[coupon_name] +`</p>
                                                            <p class="text-left pl-2 font-bold text-lightgray me-body-14 mt-[10px]">`+coupon[coupon_sub_title]+ `</p>
                                                        </div>
                                                    </div>
                                                    <div class="button-area flex justify-center items-center px-[10px]">
                                                        <p data-text="`+coupon[coupon_name]+`" onclick="coupon_apply(`+coupon.id+`,`+coupon.coupon_amount+`,'`+coupon.discount_type+`',`+coupon.minimum_spend+`)" 
                                                        data-price="`+coupon.coupon_amount+`" data-discount_type="`+coupon.discount_type+`" data-id="`+coupon.id+`" 
                                                        class="coupon-applied-btn font-bold me-body-16 text-blueMediq cursor-pointer">@lang('labels.check_out.apply')</p>
                                                    </div>
                                                </div>
                                            </div>`;
                                        });
                                        
                                    }else{
                                        couponContent +=`
                                        <img src="{{asset('frontend/img/health check 1.svg')}}" alt="health check" class="mx-auto w-auto max-w-[200px] mt-6"/>
                                        <div class="mt-[22px]">
                                            <p class="font-bold me-body-26 text-darkgray text-center">
                                            @lang("labels.coupon_list.no_coupon_found")
                                            </p>
                                            <p class="font-normal me-body-16 text-darkgray mt-3 text-center">
                                            @lang("labels.coupon_list.there_is_no_coupon_found")
                                            </p>
                                        </div>`;
                                    }
                                    
                                    couponContent += `</div>
                                <div
                                    class="unavailableList hidden lg:max-h-[500px] max-h-[450px] overflow-y-auto sm:pl-5 sm:pr-5 pr-2 pb-5">`;
                                    // console.log('notAvailableCoupons',res.notAvailableCoupons)
                                    if(res.notAvailableCoupons.length > 0){
                                    res.notAvailableCoupons.forEach(function(coupon,key){
                                        if(coupon.merchant){
                                            var icon = coupon.merchant.icon;
                                        }else if(coupon.icon){
                                            var icon = coupon.icon;
                                        }else{
                                            var icon = originUrl+'/img/quantity-logo.png'
                                        }
                                        couponContent +=`<div data-id='collect-detail-modal`+coupon.id+`' component-name="me-coupon-popup-listcontent" class="me-coupon-popup-listcontent mt-5 py-2 open-coupon-popup not_v_bundle">
                                        <div class="flex justify-between">
                                            <div class="flex items-center px-[10px] w-full">
                                                <div class="relative mr-4 mt-4">`
                                                    if(coupon.is_new_or_limited){
                                                        coupon_status.forEach(function(type,key){
                                                        if(key == coupon.is_new_or_limited){
                                                                
                                                        couponContent +=`<div class="px-[10px] py-[6px] bg-[#F0F9F0] rounded-[4px] absolute top-[-20px] w-full flex justify-center">
                                                            <span class="me-body-14 font-bold text-[#2FAF32]">`+type+`</span>
                                                            </div>`;
                                                        }
                                                        })
                                                    }
                                                    couponContent +=`<img src="`+icon+`"
                                                    class="max-w-[81px] max-h-[81px] rounded-full checkout-quantity-logo"
                                                    alt="quantity-logo" />
                                                </div>
                                                <div>
                                                    <p class="text-left font-bold text-darkgray me-body-20 leading-[normal]">`+coupon[coupon_name] +`</p>
                                                    <p class="text-left pl-2 font-bold text-lightgray me-body-14 mt-[10px]">`
                                                        +coupon[coupon_sub_title]+ `</p>
                                                </div>
                                            </div>
                                            <div class="button-area flex justify-center items-center px-[10px]">
                                                <p
                                                    class="coupon-applied-btn font-bold me-body-16 text-blueMediq cursor-pointer">
                                                    @lang('labels.check_out.apply')</p>
                                            </div>
                                        </div>
                                    </div>`
                                        })
                                        
                                    }else{
                                        couponContent +=`
                                        <img src="{{asset('frontend/img/health check 1.svg')}}" alt="health check" class="mx-auto w-auto max-w-[200px] mt-6"/>
                                        <div class="mt-[22px]">
                                            <p class="font-bold me-body-26 text-darkgray text-center">
                                            @lang("labels.coupon_list.no_coupon_found")
                                            </p>
                                            <p class="font-normal me-body-16 text-darkgray mt-3 text-center">
                                            @lang("labels.coupon_list.there_is_no_coupon_found")
                                            </p>
                                        </div>`;
                                    }
                                    couponContent +=`</div>
                            </div>
                        </div>
                </div>`;
                $('#me-coupon-popup').html(couponContent)
            }
        }
    })
}
</script>
@include('frontend.checkouts.coupon_js')
@endpush
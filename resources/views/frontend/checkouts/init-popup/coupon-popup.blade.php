<div id="me-coupon-popup" class="me-coupon-popup hidden">
    <div
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
                            @lang('labels.check_out.avaliable') ({{count($availableCoupons)}})</p>
                        <p data-id="unavailableList"
                            class="coupon-tabs-list cursor-pointer font-normal me-body-18 text-darkgray ">
                            @lang('labels.check_out.not_avaliable') ({{count($notAvailableCoupons)}})</p>
                    </div>
                </div>
                <div class="availableList lg:max-h-[500px] max-h-[450px] overflow-y-auto sm:pl-5 sm:pr-5 pr-2 pb-5">
                    @if(count($availableCoupons) > 0)
                    @foreach($availableCoupons as $coupon)
                    <div data-id="collect-detail-modal{{$coupon->id}}" component-name="me-coupon-popup-listcontent" class="me-coupon-popup-listcontent mt-5 py-2 open-coupon-popup not_v_bundle">
                        <div class="flex justify-between">
                            <div class="flex items-center px-[10px] w-full">
                                <div class="relative mr-4 mt-4">
                                    @isset($coupon->is_new_or_limited)
                                    <div
                                        class="px-[10px] py-[6px] bg-[#F0F9F0] rounded-[4px] absolute top-[-20px] w-full flex justify-center">
                                        <span class="me-body-14 font-bold text-[#2FAF32]">
                                            @foreach (config('mediq.coupon_status') as $key => $type)
                                            @if ($key == $coupon->is_new_or_limited)
                                            {{ $type }}
                                            @endif
                                            @endforeach
                                        </span>
                                    </div>
                                    @endisset
                                    <img src="{{isset($coupon->merchant) ? $coupon->merchant->icon : $coupon->icon}}"
                                        class="max-w-[81px] max-h-[81px] rounded-full checkout-quantity-logo"
                                        alt="quantity-logo" />
                                </div>
                                <div>
                                    <p class="text-left font-bold text-darkgray me-body-20 leading-[normal]">
                                        {{langbind($coupon,'name')}}</p>
                                    <p class="text-left pl-2 font-bold text-lightgray me-body-14 mt-[10px]">
                                        {{langbind($coupon,'sub_title')}}</p>
                                </div>
                            </div>
                            <div class="button-area flex justify-center items-center px-[10px]">
                                <p data-text="{{langbind($coupon,'name')}}"
                                    onclick="coupon_apply({{$coupon->id}},{{$coupon->coupon_amount}},'{{$coupon->discount_type}}',{{$coupon->minimum_spend}})"
                                    data-price="{{$coupon->coupon_amount}}" data-discount_type="{{$coupon->discount_type}}" data-id="{{$coupon->id}}"
                                    class="coupon-applied-btn font-bold me-body-16 text-blueMediq cursor-pointer">
                                    @lang('labels.check_out.apply')</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                        <img src="{{asset('frontend/img/health check 1.svg')}}" alt="health check" class="mx-auto w-auto max-w-[200px] mt-6"/>
                        <div class="mt-[22px]">
                            <p class="font-bold me-body-26 text-darkgray text-center">
                            @lang("labels.coupon_list.no_coupon_found")
                            </p>
                            <p class="font-normal me-body-16 text-darkgray mt-3 text-center">
                            @lang("labels.coupon_list.there_is_no_coupon_found")
                            </p>
                        </div>
                    @endif
                </div>
                <div
                    class="unavailableList hidden lg:max-h-[500px] max-h-[450px] overflow-y-auto sm:pl-5 sm:pr-5 pr-2 pb-5">
                    @if(count($notAvailableCoupons) > 0)
                        @foreach($notAvailableCoupons as $coupon)
                        <div data-id="collect-detail-modal{{$coupon->id}}" component-name="me-coupon-popup-listcontent" class="me-coupon-popup-listcontent mt-5 py-2 open-coupon-popup not_v_bundle">
                            <div class="flex justify-between">
                                <div class="flex items-center px-[10px] w-full">
                                    <div class="relative mr-4 mt-4">
                                        @isset($coupon->is_new_or_limited)
                                        <div
                                            class="px-[10px] py-[6px] bg-[#F0F9F0] rounded-[4px] absolute top-[-20px] w-full flex justify-center">
                                            <span class="me-body-14 font-bold text-[#2FAF32]">
                                                @foreach (config('mediq.coupon_status') as $key => $type)
                                                @if ($key == $coupon->is_new_or_limited)
                                                {{ $type }}
                                                @endif
                                                @endforeach</span>
                                        </div>
                                        @endisset
                                        <img src="{{isset($coupon->merchant) ? $coupon->merchant->icon : $coupon->icon}}"
                                            class="max-w-[81px] max-h-[81px] rounded-full checkout-quantity-logo"
                                            alt="quantity-logo" />
                                    </div>
                                    <div>
                                        <p class="text-left font-bold text-darkgray me-body-20 leading-[normal]">
                                            {{langbind($coupon,'name')}}</p>
                                        <p class="text-left pl-2 font-bold text-lightgray me-body-14 mt-[10px]">
                                            {{langbind($coupon,'sub_title')}}</p>
                                    </div>
                                </div>
                                <div class="button-area flex justify-center items-center px-[10px]">
                                    <p data-text="{{langbind($coupon,'name')}}" data-price="{{$coupon->coupon_amount}}"
                                        class="coupon-applied-btn font-bold me-body-16 text-blueMediq cursor-pointer">
                                        @lang('labels.check_out.apply')
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                    <img src="{{asset('frontend/img/health check 1.svg')}}" alt="health check" class="mx-auto w-auto max-w-[200px] mt-6"/>
                    <div class="mt-[22px]">
                        <p class="font-bold me-body-26 text-darkgray text-center">
                        @lang("labels.coupon_list.no_coupon_found")
                        </p>
                        <p class="font-normal me-body-16 text-darkgray mt-3 text-center">
                        @lang("labels.coupon_list.there_is_no_coupon_found")
                        </p>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

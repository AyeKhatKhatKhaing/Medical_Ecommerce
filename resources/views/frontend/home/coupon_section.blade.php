<!-- <div class="home-coupon-list"> -->
<div class="home-coupon-slider">
    <div component-name="me-coupon-slider" class="me-container180px me-coupon-slider bg-white pt-5 pb-[20px]">
        <div class="pb-8 flex items-center justify-between">
            <h3 class="me-couppon-title font-secondary font-bold text-darkgray">@lang('labels.coupon.get_coupon')</h3>
            <a href="{{ route('coupon.list') }}"
                class="capitalize font-secondary font-bold me-body16 inline-block py-[10px] px-5 border border-darkgray text-center hover:bg-blueMediq hover:border-0 hover:text-whitez rounded-full">@lang('labels.see_more')</a>
        </div>
        <div class="gctab-container">
            <div class="coupon-slider">
                @php
                 $fromDate = Carbon\Carbon::now();
                @endphp
                @if (count($unique_merchant) > 0)
                    @foreach ($unique_merchant as $key => $item)
                        @php
                            $getCoupons = App\Models\Coupon::where('is_bundle', true)
                            ->where('merchant_id', $item)
                            ->whereDate('coupons.start_date', '<=', $fromDate->format('Y-m-d H:i:s'))
                            ->whereDate('coupons.end_date', '>=', $fromDate->format('Y-m-d H:i:s'))
                            ->get();
                            $bundle = count($unique_merchant) > 0 ? true : false;
                            $countCoupon = App\Models\Coupon::where('is_bundle', true)
                                ->where('merchant_id', $item)
                                ->whereDate('coupons.start_date', '<=', $fromDate->format('Y-m-d H:i:s'))
                                ->whereDate('coupons.end_date', '>=', $fromDate->format('Y-m-d H:i:s'))
                                ->get();
                            
                            $item = App\Models\Coupon::where('is_bundle', true)
                                ->where('merchant_id', $item)
                                ->whereDate('coupons.start_date', '<=', $fromDate->format('Y-m-d H:i:s'))
                                ->whereDate('coupons.end_date', '>=', $fromDate->format('Y-m-d H:i:s'))
                                ->first();
                            
                            $uniqueType = $countCoupon
                                ->where('discount_type', 'percent')
                                ->pluck('discount_type')
                                ->toArray();
                            
                            if (count($uniqueType) != count($countCoupon)) {
                                $max_amount = $countCoupon->max('coupon_amount');
                                $dis_type = 'fixed_product';
                            } else {
                                $max_amount = $countCoupon->max('coupon_amount');
                                $dis_type = 'percent';
                            }

                        @endphp
                        <div class="py-5">
                            <div class="relative coupon-shape {{ isset($item->merchant_id) ? 'bundle' : 'collect' }}">
                                <img src="{{ asset('frontend/img/voucher-shape.png') }}"
                                    class="voucher-shape object-cover" />
                                <div
                                    class="custom-voucher-shape gccard rounded-[20px] {{ isset($item->merchant_id) ? 'bundle' : 'collect' }} pb-2">
                                    <div class="gccard-top bg-no-repeat h-[100px] relative bg-cover v_bundle">
                                        <div class="gccard-top-image">
                                            <img src="{{ isset($item->merchant) && $item->merchant->is_merchant == true ? $item->merchant->banner_img  : $item->banner_img }}"
                                                class="gccard-top-image--item" />
                                        </div>
                                        <div
                                            class="check-coupon-quantity absolute top-2.5 right-[9px] w-[105px] rounded-[50px] py-[6px] px-[16px] flex justify-around bundle">
                                            @if ($bundle == true)
                                                <img src="{{ asset('frontend/img/pcs.svg') }}" />
                                            @endif
                                            
                                                <p>{{ $bundle == true ? count($getCoupons) : '' }}</p>
                                            
                                        </div>
                                        <div
                                            class="check-coupon-quantity absolute top-2.5 right-[9px] w-max rounded-[50px] py-[6px] px-[16px] flex justify-around collect">
                                            
                                                <p>{{ $bundle == true ? count($getCoupons) : '' }}</p>
                                            
                                        </div>
                                        <div
                                            class="check-coupon-quantity absolute top-2.5 right-[9px] w-max rounded-[50px] py-[6px] px-[16px] flex justify-around collected">
                                            
                                                <p>{{ $bundle == true ? count($getCoupons) : '' }}</p>
                                            
                                        </div>
                                    </div>

                                    <div class="gccard-content text-center">
                                        <div class="open-coupon-popup px-[28px] v_bundle"
                                            data-id="collect-detail-modal{{ $item->id }}">
                                            <div class="cclogo-container p-[4px] bg-white rounded-full w-max">
                                                <img class="cclogo border-mee4 rounded-full w-[72px] h-[72px]"
                                                    src="{{ isset($item->merchant) && $item->merchant->is_merchant == true ? $item->merchant->icon : $item->icon }}" />
                                            </div>
                                            <div class="gccard-content-body pb-5">
                                                <a href="javascript:void(0);"
                                                    data-id="collect-detail-modal{{ $item->id }}"
                                                    class="gccard-content-body-btn v_bundle">
                                                    <p class="company-name mb-5 text-lightgray">
                                                        {{ $bundle == true && isset($item->merchant) ? langbind($item->merchant, 'name') : '-' }}
                                                    </p>
                                                    <p class="coupon-price text-darkgray">Max. Coupon Value
                                                        {{ $dis_type == 'percent' ? $max_amount . '% Off' : '$' . $max_amount }}
                                                    </p>
                                                    {{-- <p class="coupon-name text-darkgray">Bundle Coupon</p> --}}
                                                </a>
                                            </div>
                                        </div>
                                        <div class=" px-[28px]">
                                            <div class="gccard-content-bottom pt-[17px]">
                                                <button data-id="viewbundle{{ $item->id }}"
                                                    class="viewbundle-btn text-blueMediq flex justify-center ml-auto mr-auto bundle"><img
                                                        class="gift-box"
                                                        src="{{ asset('frontend/img/coupon-giftbox.svg') }}" />@lang('labels.coupon.view_details')</button>
                                                <button
                                                    class="viewbundle-btn text-blueMediq flex justify-center ml-auto mr-auto collect"
                                                    onclick="collect({{ $item->id }},{{ $bundle == true ? 'bundle_coupon' : '' }})">@lang('labels.coupon.collect')</button>
                                                <button
                                                    class="viewbundle-btn text-me8f9 flex justify-center ml-auto mr-auto collected">@lang('labels.coupon.collected')</button>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                <!-- <div class="coupon-slider"> -->
                @if (count($coupons) > 0)
                    @foreach ($coupons as $key => $item)
                        @php
                            $customer_id =
                                auth()
                                    ->guard('customer')
                                    ->user() != null
                                    ? auth()
                                        ->guard('customer')
                                        ->user()->id
                                    : '';
                            $coupon = App\Models\CouponCollect::where('coupon_id', $item->id)
                                                            ->where('customer_id', $customer_id)
                                                            ->orderBy("id","DESC")
                                                            ->first();
                            $collectId = isset($coupon->coupon_id) ? 'collected' : 'collect';
                            $checkUsedExpired = false;
                            if($coupon!=null) {
                                $checkUsedExpired = checkUsedExpiredCoupon($coupon);
                            }else{
                                $checkUsedExpired = checkCouponStartAndEndDateExpired($item);
                            }
                        @endphp
                        <div class="py-5">
                            <div class="relative coupon-shape collect_coupon{{ $item->id }} {{ $collectId }}">
                                <img src="{{ asset('frontend/img/home-coupon-slider-bg.png') }}"
                                    class="voucher-shape object-cover" />
                                <div
                                    class="custom-voucher-shape gccard rounded-[20px] collect_coupon{{ $item->id }} {{ $collectId }} pb-2">
                                    <div class="gccard-top bg-no-repeat h-[100px] relative bg-cover not_v_bundle" data-id="collect-detail-modal{{ $item->id }}">
                                        <div class="gccard-top-image">
                                            <img src="{{ isset($item->merchant) && $item->merchant->is_merchant == true ? $item->merchant->banner_img : $item->banner_img }}"
                                                class="gccard-top-image--item" />
                                        </div>
                                        @if ($item->is_new_or_limited != null)
                                            <div class="limited-text absolute top-0 left-0 bg-orangeMediq text-white">
                                                @foreach (config('mediq.coupon_status') as $key => $type)
                                                    @if ($key == $item->is_new_or_limited)
                                                        {{ $type }}
                                                    @endif
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                    <div class="gccard-content text-center">
                                        <div class="open-coupon-popup px-[28px] not_v_bundle" data-id="collect-detail-modal{{ $item->id }}" >
                                            <div class="cclogo-container p-[4px] bg-white rounded-full w-max">
                                                <img class="cclogo border-mee4 rounded-full w-[72px] h-[72px]"
                                                    src="{{ isset($item->merchant) && $item->merchant->is_merchant == true ? $item->merchant->icon : ($item->icon ? $item->icon : asset('frontend/img/quantity-logo.png')) }}" />
                                            </div>
                                            <div class="gccard-content-body pb-5">
                                                <a href="javascript:void(0);"
                                                    data-id="collect-detail-modal{{ $item->id }}"
                                                    class="gccard-content-body-btn not_v_bundle">
                                                    <p class="company-name mb-5 text-lightgray">
                                                        {{ isset($item->merchant) ? $item->merchant->name : '' }}</p>
                                                    {{-- <p class="coupon-price text-darkgray">$ {{isset($item->coupon_amount) ? $item->coupon_amount : $item->price}}</p> --}}
                                                    <p class="coupon-price text-darkgray">{{ langbind($item, 'name') }}
                                                    </p>
                                                </a>
                                            </div>
                                        </div>
                                        <div class=" px-[28px]">
                                            @if (auth()->guard('customer')->check())
                                                <div class="gccard-content-bottom pt-[17px]">
                                                    <button data-id="viewbundle{{ $item->id }}"
                                                        class="{{$checkUsedExpired==true?'click-disable text-d1':''}} viewbundle-btn text-blueMediq flex items-center justify-center ml-auto mr-auto bundle"><img
                                                            class="gift-box"
                                                            src="{{ asset('frontend/img/coupon-giftbox.svg') }}" />@lang('labels.coupon.view_details')</button>
                                                    <button type="button"
                                                        class="{{$checkUsedExpired==true?'click-disable text-d1':''}} viewbundle-btn text-blueMediq flex items-center justify-center ml-auto mr-auto collect"
                                                        onclick="collect({{ $item->id }})">@lang('labels.coupon.collect')</button>
                                                    <button
                                                        class="{{$checkUsedExpired==true?'click-disable text-d1':''}} viewbundle-btn text-d1 flex items-center justify-center ml-auto mr-auto collected">@lang('labels.coupon.collected')</button>
                                                </div>
                                            @else
                                                <div class="gccard-content-bottom pt-[17px] login">
                                                    <button
                                                        class="{{$item->end_date < date("Y-m-d")?'click-disable':''}} viewbundle-btn text-blueMediq flex items-center justify-center ml-auto mr-auto collect-login">@lang('labels.coupon.collect')</button>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                <!-- </div> -->
            </div>
        </div>
    </div>
    {{-- </div> --}}
    <!-- </div> -->

    @if (count($unique_merchant) > 0)
        @foreach ($unique_merchant as $key => $merchant)
            @php
                $items = App\Models\Coupon::where('is_bundle', true)
                    ->where('merchant_id', $merchant)
                    ->whereDate('coupons.start_date', '<=', $fromDate->format('Y-m-d H:i:s'))
                    ->whereDate('coupons.end_date', '>=', $fromDate->format('Y-m-d H:i:s'))
                    ->get();
                $getCoupons = App\Models\Coupon::where('is_bundle', true)
                    ->where('merchant_id', $merchant)
                    ->whereDate('coupons.start_date', '<=', $fromDate->format('Y-m-d H:i:s'))
                    ->whereDate('coupons.end_date', '>=', $fromDate->format('Y-m-d H:i:s'))
                    ->get();
            @endphp
            @include('frontend.home.bundle_coupon_model')
        @endforeach
    @endif
    @if (count($coupons) > 0)
        @foreach ($coupons as $key => $coupon)
            @include('frontend.home.coupon_model', ['coupon_type' => 'single_coupon'])
        @endforeach
    @endif

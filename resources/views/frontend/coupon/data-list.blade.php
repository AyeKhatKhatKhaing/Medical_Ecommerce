<div component-name="me-coupon-category-tabs" class="me-coupon-category-tabs">
    <div class="flex mcategory-tab-container items-center justify-between mt-[20px] sm:mt-[80px]">
        <ul class="main-filter flex justify-start items-center clmaintabs">
            <li class="clmaintabs-item text-darkgray mr-[20px] last:mr-0 helvetica-normal me-body20 p-[10px] text-center cursor-pointer {{ $selectedCategory == 'all' ? 'active' : '' }}"
                data-id=".all" data-value="all">
                <span>@lang('labels.product.all')</span>
            </li>
            @foreach ($mainCategories as $value)
                <li class="clmaintabs-item text-darkgray mr-[20px] last:mr-0 helvetica-normal me-body20 p-[10px] text-center cursor-pointer {{ $selectedCategory == $value->name_en ? 'active' : '' }}"
                    data-id=".{{ str_replace(' ', '', $value->name_en) }}" data-value="{{ $value->name_en }}">
                    <span> {{ langbind($value, 'name') }}</span>
                </li>
            @endforeach
        </ul>
        @if(Auth::guard('customer')->user())
        <a href="{{route('dashboard.coupon')}}" class="underline text-darkgray me-body20 helvetica-normal atag-go-btn">@lang('labels.coupon.go_to_my_coupon')</a>
        @else
        <a href="#" class="register-btn underline text-darkgray me-body20 helvetica-normal atag-go-btn">@lang('labels.coupon.go_to_my_coupon')</a>
        @endif
    </div>
    <div class="clmaintabs-content">
        <div class="cc-views all {{ $selectedCategory != 'all' ? 'hidden' : '' }}">
            <ul class="flex justify-center items-center my-10 clinnertabs">

                <li class="clinnertabs-item w-1/3 text-darkgray helvetica-normal me-body18 text-center cursor-pointer relative {{ $selectedSubCategory == 'most-recently-added' ? 'active' : '' }}"
                    data-id=".most-recently-added" data-value="most-recently-added">
                    @lang('labels.coupon.most_recently_added')
                </li>

                <li class="clinnertabs-item w-1/3 text-darkgray helvetica-normal me-body18 text-center cursor-pointer relative {{ $selectedSubCategory == 'expiring-first' ? 'active' : '' }}"
                    data-id=".expiring-first" data-value="expiring-first">
                    @lang('labels.coupon.expiring_first')
                </li>

                <li class="clinnertabs-item w-1/3 text-darkgray helvetica-normal me-body18 text-center cursor-pointer relative {{ $selectedSubCategory == 'lowest-minimum-order-value' ? 'active' : '' }}"
                    data-id=".lowest-minimum-order-value" data-value="lowest-minimum-order-value">
                    @lang('labels.coupon.lowest_minimum_order_value')
                </li>

                <li class="clinnertabs-item w-1/3 text-darkgray helvetica-normal me-body18 text-center cursor-pointer relative {{ $selectedSubCategory == 'by-merchant' ? 'active' : '' }}"
                    data-id=".by-merchant" data-value="by-merchant">
                    @lang('labels.coupon.by_merchant')
                </li>

            </ul>

            <div class="flex justify-start main-box">
                <div class="max-w-[620px] w-full left-side">
                    <div class="clinnertabs-content">
                        <div
                            class="inner-views most-recently-added {{ $selectedSubCategory != 'most-recently-added' ? 'hidden' : '' }}">
                            <div class="coupon-results mb-5">
                                <p class="helvetica-normal me-body26 font-bold text-darkgray">
                                    @if ( Config::get('app.locale') == 'en')
                                    {{ count($couponList) }} Coupons Found</p>
                                    @elseif ( Config::get('app.locale') == 'zh-hk')
                                    找到 {{ count($couponList) }} 張優惠券</p>
                                    @else
                                    找到 {{ count($couponList) }} 张优惠券</p>
                                    @endif
                            </div>
                            <div class="inner-views-items custom-scrollbar-rounded-gray">
                                @foreach ($couponList as $key => $coupondetails)
                                    @php
                                        $customer_id = Auth::guard('customer')->user() != null ? Auth::guard('customer')->user()->id : '';
                                        $item = App\Models\CouponCollect::where('coupon_id', $coupondetails->id)
                                            ->where('customer_id', $customer_id)
                                            ->orderBy("id","DESC")
                                            ->first();
                                        $collectId = isset($item->coupon_id) ? 'collected' : '';
                                        $checkUsedExpired = false;
                                        if($item!=null) {
                                            $checkUsedExpired = checkUsedExpiredCoupon($item);
                                        }else{
                                            $checkUsedExpired = checkCouponStartAndEndDateExpired($coupondetails);
                                        }
                                    @endphp
                                    <div component-name="me-coupon-small-card"
                                        class="small-coupon new-small-coupon show {{$loop->index==0?'selected':''}}"
                                        id="new-small-coupon{{ $coupondetails->id }}"
                                        data-id="#detail-section{{ $coupondetails->id }}">
                                        <div class="w-full small-coupon--container">
                                            <div class="relative collect">
                                                <img src="{{ asset('frontend/img/product-detail-coupon-small.png') }} "
                                                    class="voucher-shape">
                                                <div class="gccard rounded-[20px] collect">
                                                    <div
                                                        class="gccard-top bg-no-repeat h-[100px] relative bg-cover gccard-home ">
                                                            @foreach (config('mediq.coupon_status') as $key => $type)
                                                                @if ($key == $coupondetails->is_new_or_limited)
                                                                <div class="label-tag rounded-[4px] absolute top-0 left-0 {{$coupondetails->is_new_or_limited=="new"?'new':'new-limit'}}">{{ lang() == "en"?$type:($type=="New"?'新上架':(lang()=="zh-hk"?"限量領取":"限量领取")) }}</div>
                                                                @endif
                                                            @endforeach
                                                    </div>
                                                    <div
                                                        class="gccard-top bg-no-repeat h-[100px] relative bg-cover gccard-detail hidden">
                                                        <div
                                                            class="detail-coupon absolute top-[8px] left-[10px] rounded-[4px] py-[5px] px-[10px] bg-[#F0F9F0] me-green-color {{$coupondetails->is_new_or_limited=="new"?'new':'new-limit'}}">
                                                            @foreach (config('mediq.coupon_status') as $key => $type)
                                                                @if ($key == $coupondetails->is_new_or_limited)
                                                                    {{ lang() == "en"?$type:($type=="New"?'新上架':(lang()=="zh-hk"?"限量領取":"限量领取")) }}
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="gccard-content text-center">
                                                        <div class="cclogo-container rounded-full">
                                                            <img class="cclogo border-mee4 rounded-full w-[72px] h-[72px]"
                                                                src="{{ isset($coupondetails->merchant)?$coupondetails->merchant->icon:'' }}">
                                                        </div>
                                                        <div class="gccard-content-body">
                                                            <a href="javascript:void(0)"
                                                                data-id="#detail-section{{ $coupondetails->id }}"
                                                                class="coupon-see-detail">
                                                                <p class="company-name text-darkgray cursor-pointer">
                                                                    {{ langbind($coupondetails, 'name') }}</p>
                                                                <p class="ctitle text-darkgray">
                                                                    {{ langbind($coupondetails, 'sub_title') }}</p>
                                                            </a>
                                                            <div class="flex justify-start items-center flex-wrap">
                                                                <p class="ccategory text-lightgray new-ccategory">
                                                                    <svg width="24" height="24"
                                                                        viewBox="0 0 24 24" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M12.492 11.41C12.4697 11.2871 12.4023 11.1769 12.3028 11.1012C12.2034 11.0255 12.0793 10.9898 11.9548 11.0011C11.8304 11.0124 11.7147 11.0699 11.6305 11.1622C11.5463 11.2545 11.4998 11.3751 11.5 11.5V16.002L11.508 16.092C11.5303 16.2149 11.5977 16.3251 11.6972 16.4008C11.7966 16.4765 11.9207 16.5122 12.0452 16.5009C12.1696 16.4896 12.2853 16.4321 12.3695 16.3398C12.4537 16.2475 12.5002 16.1269 12.5 16.002V11.5L12.492 11.41ZM12.799 9.25C12.799 9.05109 12.72 8.86032 12.5793 8.71967C12.4387 8.57902 12.2479 8.5 12.049 8.5C11.8501 8.5 11.6593 8.57902 11.5187 8.71967C11.378 8.86032 11.299 9.05109 11.299 9.25C11.299 9.44891 11.378 9.63968 11.5187 9.78033C11.6593 9.92098 11.8501 10 12.049 10C12.2479 10 12.4387 9.92098 12.5793 9.78033C12.72 9.63968 12.799 9.44891 12.799 9.25ZM20 12.5C20 10.3783 19.1571 8.34344 17.6569 6.84315C16.1566 5.34285 14.1217 4.5 12 4.5C9.87827 4.5 7.84344 5.34285 6.34315 6.84315C4.84285 8.34344 4 10.3783 4 12.5C4 14.6217 4.84285 16.6566 6.34315 18.1569C7.84344 19.6571 9.87827 20.5 12 20.5C14.1217 20.5 16.1566 19.6571 17.6569 18.1569C19.1571 16.6566 20 14.6217 20 12.5ZM5 12.5C5 11.5807 5.18106 10.6705 5.53284 9.82122C5.88463 8.97194 6.40024 8.20026 7.05025 7.55025C7.70026 6.90024 8.47194 6.38463 9.32122 6.03284C10.1705 5.68106 11.0807 5.5 12 5.5C12.9193 5.5 13.8295 5.68106 14.6788 6.03284C15.5281 6.38463 16.2997 6.90024 16.9497 7.55025C17.5998 8.20026 18.1154 8.97194 18.4672 9.82122C18.8189 10.6705 19 11.5807 19 12.5C19 14.3565 18.2625 16.137 16.9497 17.4497C15.637 18.7625 13.8565 19.5 12 19.5C10.1435 19.5 8.36301 18.7625 7.05025 17.4497C5.7375 16.137 5 14.3565 5 12.5Z"
                                                                            fill="#7C7C7C"></path>
                                                                    </svg>
                                                                    @if ($coupondetails->usage_time)
                                                                        {{lang() == "en"?'Once collected, valid for':'領券後需於'}}
                                                                        {{ $coupondetails->usage_time }} {{lang() == "en"?($coupondetails->usage_time==1?'day':'days'):'日內使用'}}
                                                                    @else
                                                                    @lang('labels.coupon.offer_expires')
                                                                        {{ lang() == "en"?date('d M Y', strtotime($coupondetails->end_date)):date('Y年m月d日',strtotime($coupondetails->end_date))}}
                                                                    @endif
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="gccard-content-bottom">
                                                            @if (Auth::guard('customer')->check())
                                                                <button id="popup_coupon{{ $coupondetails->id }}"
                                                                    onclick="collect({{ $coupondetails->id }})"
                                                                    data-id={{ $coupondetails->id }}
                                                                    class="{{$checkUsedExpired==true?'text-d1':''}} collect-view-btn text-blueMediq flex justify-center ml-auto mr-auto collect {{ $collectId != null ? 'text-d1 pointer-events-none' : '' }}">
                                                                    {{-- {{ $collectId != null ? 'Collected' : 'Collect' }} --}}
                                                                    @if ($collectId != null)
                                                                        @lang('labels.coupon.collected')
                                                                    @else
                                                                        @lang('labels.coupon.collect')
                                                                    @endif
                                                                </button>
                                                            @else
                                                                <button
                                                                    class="register-btn collect-view-btn text-blueMediq flex justify-center ml-auto mr-auto collect">
                                                                    @lang('labels.coupon.collect')</button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div
                            class="inner-views expiring-first {{ $selectedSubCategory != 'expiring-first' ? 'hidden' : '' }}">
                            <div class="coupon-results mb-5">
                                <p class="helvetica-normal me-body26 font-bold text-darkgray">
                                    {{ count($couponList) }} @lang('labels.coupon.coupons')</p>
                            </div>
                            <div class="inner-views-items custom-scrollbar-rounded-gray">
                                @foreach ($couponList as $key => $coupondetails)
                                    @php
                                        $customer_id = Auth::guard('customer')->user() != null ? Auth::guard('customer')->user()->id : '';
                                        $item = App\Models\CouponCollect::where('coupon_id', $coupondetails->id)
                                            ->where('customer_id', $customer_id)
                                            ->first();
                                        $collectId = isset($item->coupon_id) ? 'collected' : '';
                                        $checkUsedExpired = false;
                                        if($item!=null) {
                                            $checkUsedExpired = checkUsedExpiredCoupon($item);
                                        }else{
                                            $checkUsedExpired = checkCouponStartAndEndDateExpired($coupondetails);
                                        }
                                    @endphp
                                    <div component-name="me-coupon-small-card"
                                        class="small-coupon new-small-coupon show {{$loop->index==0?'selected':''}}" id="new-small-coupon0"
                                        data-id="#detail-section0">
                                        <div class="w-full small-coupon--container">
                                            <div class="relative collect">
                                                <img src="{{ asset('frontend/img/product-detail-coupon-small.png') }} "
                                                    class="voucher-shape">
                                                <div class="gccard rounded-[20px] collect">
                                                    <div
                                                        class="gccard-top bg-no-repeat h-[100px] relative bg-cover gccard-home ">
                                                            @foreach (config('mediq.coupon_status') as $key => $type)
                                                                @if ($key == $coupondetails->is_new_or_limited)
                                                                    <div class="label-tag rounded-[4px] absolute top-0 left-0 {{$coupondetails->is_new_or_limited=="new"?'new':'new-limit'}}">{{ lang() == "en"?$type:($type=="New"?'新上架':(lang()=="zh-hk"?"限量領取":"限量领取")) }}</div>
                                                                @endif
                                                            @endforeach
                                                    </div>
                                                    <div
                                                        class="gccard-top bg-no-repeat h-[100px] relative bg-cover gccard-detail hidden">
                                                        <div
                                                            class="detail-coupon absolute top-[8px] left-[10px] rounded-[4px] py-[5px] px-[10px] bg-[#F0F9F0] me-green-color {{$coupondetails->is_new_or_limited=="new"?'new':'new-limit'}}">
                                                            @foreach (config('mediq.coupon_status') as $key => $type)
                                                                @if ($key == $coupondetails->is_new_or_limited)
                                                                {{ lang() == "en"?$type:($type=="New"?'新上架':(lang()=="zh-hk"?"限量領取":"限量领取")) }}
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="gccard-content text-center">
                                                        <div class="cclogo-container rounded-full">
                                                            <img class="cclogo border-mee4 rounded-full w-[72px] h-[72px]"
                                                                src="{{ isset($coupondetails->merchant)?$coupondetails->merchant->icon:'' }}">
                                                        </div>
                                                        <div class="gccard-content-body">
                                                            <a href="javascript:void(0)"
                                                                data-id="#detail-section{{ $coupondetails->id }}"
                                                                class="coupon-see-detail">
                                                                <p class="company-name text-darkgray cursor-pointer">
                                                                    {{ langbind($coupondetails, 'name') }}</p>
                                                                <p class="ctitle text-darkgray">
                                                                    {{ langbind($coupondetails, 'sub_title') }}</p>
                                                            </a>
                                                            <div class="flex justify-start items-center flex-wrap">
                                                                <p class="ccategory text-lightgray new-ccategory">
                                                                    <svg width="24" height="24"
                                                                        viewBox="0 0 24 24" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M12.492 11.41C12.4697 11.2871 12.4023 11.1769 12.3028 11.1012C12.2034 11.0255 12.0793 10.9898 11.9548 11.0011C11.8304 11.0124 11.7147 11.0699 11.6305 11.1622C11.5463 11.2545 11.4998 11.3751 11.5 11.5V16.002L11.508 16.092C11.5303 16.2149 11.5977 16.3251 11.6972 16.4008C11.7966 16.4765 11.9207 16.5122 12.0452 16.5009C12.1696 16.4896 12.2853 16.4321 12.3695 16.3398C12.4537 16.2475 12.5002 16.1269 12.5 16.002V11.5L12.492 11.41ZM12.799 9.25C12.799 9.05109 12.72 8.86032 12.5793 8.71967C12.4387 8.57902 12.2479 8.5 12.049 8.5C11.8501 8.5 11.6593 8.57902 11.5187 8.71967C11.378 8.86032 11.299 9.05109 11.299 9.25C11.299 9.44891 11.378 9.63968 11.5187 9.78033C11.6593 9.92098 11.8501 10 12.049 10C12.2479 10 12.4387 9.92098 12.5793 9.78033C12.72 9.63968 12.799 9.44891 12.799 9.25ZM20 12.5C20 10.3783 19.1571 8.34344 17.6569 6.84315C16.1566 5.34285 14.1217 4.5 12 4.5C9.87827 4.5 7.84344 5.34285 6.34315 6.84315C4.84285 8.34344 4 10.3783 4 12.5C4 14.6217 4.84285 16.6566 6.34315 18.1569C7.84344 19.6571 9.87827 20.5 12 20.5C14.1217 20.5 16.1566 19.6571 17.6569 18.1569C19.1571 16.6566 20 14.6217 20 12.5ZM5 12.5C5 11.5807 5.18106 10.6705 5.53284 9.82122C5.88463 8.97194 6.40024 8.20026 7.05025 7.55025C7.70026 6.90024 8.47194 6.38463 9.32122 6.03284C10.1705 5.68106 11.0807 5.5 12 5.5C12.9193 5.5 13.8295 5.68106 14.6788 6.03284C15.5281 6.38463 16.2997 6.90024 16.9497 7.55025C17.5998 8.20026 18.1154 8.97194 18.4672 9.82122C18.8189 10.6705 19 11.5807 19 12.5C19 14.3565 18.2625 16.137 16.9497 17.4497C15.637 18.7625 13.8565 19.5 12 19.5C10.1435 19.5 8.36301 18.7625 7.05025 17.4497C5.7375 16.137 5 14.3565 5 12.5Z"
                                                                            fill="#7C7C7C"></path>
                                                                    </svg>
                                                                    @if ($coupondetails->usage_time)
                                                                    {{lang() == "en"?'Once collected, valid for':'領券後需於'}}
                                                                    {{ $coupondetails->usage_time }} {{lang() == "en"?($coupondetails->usage_time==1?'day':'days'):'日內使用'}}
                                                                    @else
                                                                    @lang('labels.coupon.offer_expires')
                                                                        {{ lang() == "en"?date('d M Y', strtotime($coupondetails->end_date)):date('Y年m月d日',strtotime($coupondetails->end_date))}}
                                                                    @endif
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="gccard-content-bottom">
                                                            @if (Auth::guard('customer')->check())
                                                                <button id="popup_coupon{{ $coupondetails->id }}"
                                                                    onclick="collect({{ $coupondetails->id }})"
                                                                    data-id={{ $coupondetails->id }}
                                                                    class="{{$checkUsedExpired==true?'text-d1':''}} collect-view-btn text-blueMediq flex justify-center ml-auto mr-auto collect {{ $collectId != null ? 'text-d1 pointer-events-none' : '' }}">
                                                                    {{-- {{ $collectId != null ? 'Collected' : 'Collect' }} --}}
                                                                    @if ($collectId != null)
                                                                        @lang('labels.coupon.collected')
                                                                    @else
                                                                        @lang('labels.coupon.collect')
                                                                    @endif
                                                                </button>
                                                            @else
                                                                <button
                                                                    class="register-btn collect-view-btn text-blueMediq flex justify-center ml-auto mr-auto collect">@lang('labels.coupon.collect')</button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div
                            class="inner-views lowest-minimum-order-value {{ $selectedSubCategory != 'lowest-minimum-order-value' ? 'hidden' : '' }}">
                            <div class="coupon-results mb-5">
                                <p class="helvetica-normal me-body26 font-bold text-darkgray">
                                    {{ count($couponList) }} @lang('labels.coupon.coupons')</p>
                            </div>
                            <div class="inner-views-items custom-scrollbar-rounded-gray">
                                @foreach ($couponList as $key => $coupondetails)
                                    @php
                                        $customer_id = Auth::guard('customer')->user() != null ? Auth::guard('customer')->user()->id : '';
                                        $item = App\Models\CouponCollect::where('coupon_id', $coupondetails->id)
                                            ->where('customer_id', $customer_id)
                                            ->first();
                                        $collectId = isset($item->coupon_id) ? 'collected' : '';
                                        $checkUsedExpired = false;
                                        if($item!=null) {
                                            $checkUsedExpired = checkUsedExpiredCoupon($item);
                                        }else{
                                            $checkUsedExpired = checkCouponStartAndEndDateExpired($coupondetails);
                                        }
                                    @endphp
                                    <div component-name="me-coupon-small-card"
                                        class="small-coupon new-small-coupon show {{$loop->index==0?'selected':''}}" id="new-small-coupon0"
                                        data-id="#detail-section0">
                                        <div class="w-full small-coupon--container">
                                            <div class="relative collect">
                                                <img src="{{ asset('frontend/img/product-detail-coupon-small.png') }} "
                                                    class="voucher-shape">
                                                <div class="gccard rounded-[20px] collect">
                                                    <div
                                                        class="gccard-top bg-no-repeat h-[100px] relative bg-cover gccard-home ">
                                                            @foreach (config('mediq.coupon_status') as $key => $type)
                                                            @if ($key == $coupondetails->is_new_or_limited)
                                                                <div class="label-tag rounded-[4px] absolute top-0 left-0 {{$coupondetails->is_new_or_limited=="new"?'new':'new-limit'}}">{{ lang() == "en"?$type:($type=="New"?'新上架':(lang()=="zh-hk"?"限量領取":"限量领取")) }}</div>
                                                            @endif
                                                            @endforeach
                                                    </div>
                                                    <div
                                                        class="gccard-top bg-no-repeat h-[100px] relative bg-cover gccard-detail hidden">
                                                        <div
                                                            class="detail-coupon absolute top-[8px] left-[10px] rounded-[4px] py-[5px] px-[10px] bg-[#F0F9F0] me-green-color {{$coupondetails->is_new_or_limited=="new"?'new':'new-limit'}}">
                                                            @foreach (config('mediq.coupon_status') as $key => $type)
                                                                @if ($key == $coupondetails->is_new_or_limited)
                                                                {{ lang() == "en"?$type:($type=="New"?'新上架':(lang()=="zh-hk"?"限量領取":"限量领取")) }}
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="gccard-content text-center">
                                                        <div class="cclogo-container rounded-full">
                                                            <img class="cclogo border-mee4 rounded-full w-[72px] h-[72px]"
                                                                src="{{ isset($coupondetails->merchant)?$coupondetails->merchant->icon:'' }}">
                                                        </div>
                                                        <div class="gccard-content-body">
                                                            <a href="javascript:void(0)"
                                                                data-id="#detail-section{{ $coupondetails->id }}"
                                                                class="coupon-see-detail">
                                                                <p class="company-name text-darkgray cursor-pointer">
                                                                    {{ langbind($coupondetails, 'name') }}</p>
                                                                <p class="ctitle text-darkgray">
                                                                    {{ langbind($coupondetails, 'sub_title') }}</p>
                                                            </a>
                                                            <div class="flex justify-start items-center flex-wrap">
                                                                <p class="ccategory text-lightgray new-ccategory">
                                                                    <svg width="24" height="24"
                                                                        viewBox="0 0 24 24" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M12.492 11.41C12.4697 11.2871 12.4023 11.1769 12.3028 11.1012C12.2034 11.0255 12.0793 10.9898 11.9548 11.0011C11.8304 11.0124 11.7147 11.0699 11.6305 11.1622C11.5463 11.2545 11.4998 11.3751 11.5 11.5V16.002L11.508 16.092C11.5303 16.2149 11.5977 16.3251 11.6972 16.4008C11.7966 16.4765 11.9207 16.5122 12.0452 16.5009C12.1696 16.4896 12.2853 16.4321 12.3695 16.3398C12.4537 16.2475 12.5002 16.1269 12.5 16.002V11.5L12.492 11.41ZM12.799 9.25C12.799 9.05109 12.72 8.86032 12.5793 8.71967C12.4387 8.57902 12.2479 8.5 12.049 8.5C11.8501 8.5 11.6593 8.57902 11.5187 8.71967C11.378 8.86032 11.299 9.05109 11.299 9.25C11.299 9.44891 11.378 9.63968 11.5187 9.78033C11.6593 9.92098 11.8501 10 12.049 10C12.2479 10 12.4387 9.92098 12.5793 9.78033C12.72 9.63968 12.799 9.44891 12.799 9.25ZM20 12.5C20 10.3783 19.1571 8.34344 17.6569 6.84315C16.1566 5.34285 14.1217 4.5 12 4.5C9.87827 4.5 7.84344 5.34285 6.34315 6.84315C4.84285 8.34344 4 10.3783 4 12.5C4 14.6217 4.84285 16.6566 6.34315 18.1569C7.84344 19.6571 9.87827 20.5 12 20.5C14.1217 20.5 16.1566 19.6571 17.6569 18.1569C19.1571 16.6566 20 14.6217 20 12.5ZM5 12.5C5 11.5807 5.18106 10.6705 5.53284 9.82122C5.88463 8.97194 6.40024 8.20026 7.05025 7.55025C7.70026 6.90024 8.47194 6.38463 9.32122 6.03284C10.1705 5.68106 11.0807 5.5 12 5.5C12.9193 5.5 13.8295 5.68106 14.6788 6.03284C15.5281 6.38463 16.2997 6.90024 16.9497 7.55025C17.5998 8.20026 18.1154 8.97194 18.4672 9.82122C18.8189 10.6705 19 11.5807 19 12.5C19 14.3565 18.2625 16.137 16.9497 17.4497C15.637 18.7625 13.8565 19.5 12 19.5C10.1435 19.5 8.36301 18.7625 7.05025 17.4497C5.7375 16.137 5 14.3565 5 12.5Z"
                                                                            fill="#7C7C7C"></path>
                                                                    </svg>
                                                                    @if ($coupondetails->usage_time)
                                                                        {{lang() == "en"?'Once collected, valid for':'領券後需於'}}
                                                                        {{ $coupondetails->usage_time }} {{lang() == "en"?($coupondetails->usage_time==1?'day':'days'):'日內使用'}}
                                                                    @else
                                                                        @lang('labels.coupon.offer_expires')
                                                                        {{ lang() == "en"?date('d M Y', strtotime($coupondetails->end_date)):date('Y年m月d日',strtotime($coupondetails->end_date))}}
                                                                    @endif
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="gccard-content-bottom">
                                                            @if (Auth::guard('customer')->check())
                                                                <button id="popup_coupon{{ $coupondetails->id }}"
                                                                    onclick="collect({{ $coupondetails->id }})"
                                                                    data-id={{ $coupondetails->id }}
                                                                    class="{{$checkUsedExpired==true?'text-d1':''}} collect-view-btn text-blueMediq flex justify-center ml-auto mr-auto collect {{ $collectId != null ? 'text-d1 pointer-events-none' : '' }}">
                                                                    {{-- {{ $collectId != null ? 'Collected' : 'Collect' }} --}}
                                                                    @if ($collectId != null)
                                                                        @lang('labels.coupon.collected')
                                                                    @else
                                                                        @lang('labels.coupon.collect')
                                                                    @endif
                                                                </button>
                                                            @else
                                                                <button
                                                                    class="register-btn collect-view-btn text-blueMediq flex justify-center ml-auto mr-auto collect">
                                                                    @lang('labels.coupon.collect')
                                                                </button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div
                            class="inner-views by-merchant {{ $selectedSubCategory != 'by-merchant' ? 'hidden' : '' }}">
                            <div class="coupon-results mb-5">
                                <p class="helvetica-normal me-body26 font-bold text-darkgray">
                                    {{ $merchantTotalCoupon }} @lang('labels.coupon.merchant_coupons')</p>
                            </div>
                            <div class="inner-views-items custom-scrollbar-rounded-gray">
                                @foreach ($couponList as $key => $value)
                                    <div class="group-merchant custom-scrollbar-rounded-gray">
                                        <div class="for-merchant flex items-center justify-start mb-2 mr-3.5">
                                            <img src="{{ $value->icon }}" alt="medicine"
                                                class="w-[40px] h-[40px] rounded-[50%] mr-[20px]">
                                            <span
                                                class="title helvetica-normal me-body20 text-darkgray">{{ $value->name_en }}</span>
                                            <span
                                                class="coupon-number flex items-center justify-start ml-auto me-body16 text-darkgray">
                                                <img src="{{ asset('frontend/img/pcs.svg') }}" alt="pcs icon"
                                                    class="w-[20px] h-[24px] mr-2">
                                                {{ isset($value->coupons) ? count($value->coupons) : '0' }} @lang('labels.compare.coupon')
                                            </span>
                                        </div>
                                        @foreach (isset($value->coupons) ? $value->coupons : [] as $key => $coupondetails)
                                            @php
                                                $customer_id = Auth::guard('customer')->user() != null ? Auth::guard('customer')->user()->id : '';
                                                $item = App\Models\CouponCollect::where('coupon_id', $coupondetails->id)
                                                    ->where('customer_id', $customer_id)
                                                    ->first();
                                                $collectId = isset($item->coupon_id) ? 'collected' : '';
                                                $checkUsedExpired = false;
                                                if($item!=null) {
                                                    $checkUsedExpired = checkUsedExpiredCoupon($item);
                                                }else{
                                                    $checkUsedExpired = checkCouponStartAndEndDateExpired($coupondetails);
                                                }
                                            @endphp
                                            <div component-name="me-coupon-small-card"
                                                class="small-coupon new-small-coupon" id="new-small-coupon0"
                                                data-id="#detail-section0">
                                                <div class="w-full small-coupon--container">
                                                    <div class="relative collect">
                                                        <img src="{{ asset('frontend/img/product-detail-coupon-small.png') }}"
                                                            class="voucher-shape">
                                                        <div class="gccard rounded-[20px] collect">
                                                            <div
                                                                class="gccard-top bg-no-repeat h-[100px] relative bg-cover gccard-home ">
                                                                    @foreach (config('mediq.coupon_status') as $key => $type)
                                                                        @if ($key == $coupondetails->is_new_or_limited)
                                                                            <div class="label-tag rounded-[4px] absolute top-0 left-0 {{$coupondetails->is_new_or_limited=="new"?'new':'new-limit'}}">{{ lang() == "en"?$type:($type=="New"?'新上架':(lang()=="zh-hk"?"限量領取":"限量领取")) }}</div>
                                                                        @endif
                                                                    @endforeach
                                                            </div>
                                                            <div
                                                                class="gccard-top bg-no-repeat h-[100px] relative bg-cover gccard-detail hidden">
                                                                <div
                                                                    class="detail-coupon absolute top-[8px] left-[10px] rounded-[4px] py-[5px] px-[10px] bg-[#F0F9F0] me-green-color {{$coupondetails->is_new_or_limited=="new"?'new':'new-limit'}}">
                                                                    @foreach (config('mediq.coupon_status') as $key => $type)
                                                                        @if ($key == $coupondetails->is_new_or_limited)
                                                                            {{ lang() == "en"?$type:($type=="New"?'新上架':(lang()=="zh-hk"?"限量領取":"限量领取")) }}
                                                                        @endif
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <div class="gccard-content text-center">
                                                                <div class="cclogo-container rounded-full">
                                                                    <img class="cclogo border-mee4 rounded-full w-[72px] h-[72px]"
                                                                        src="{{ isset($coupondetails->merchant)?$coupondetails->merchant->icon:'' }}">
                                                                </div>
                                                                <div class="gccard-content-body">
                                                                    <a href="javascript:void(0)"
                                                                        data-id="#detail-section{{ $coupondetails->id }}"
                                                                        class="coupon-see-detail">
                                                                        <p
                                                                            class="company-name text-darkgray cursor-pointer">
                                                                            {{ langbind($coupondetails, 'name') }}</p>
                                                                        </p>
                                                                        <p class="ctitle text-darkgray">
                                                                            {{ langbind($coupondetails, 'sub_title') }}
                                                                        </p>
                                                                        </p>
                                                                    </a>
                                                                    <div
                                                                        class="flex justify-start items-center flex-wrap">
                                                                        <p
                                                                            class="ccategory text-lightgray new-ccategory">
                                                                            <svg width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M12.492 11.41C12.4697 11.2871 12.4023 11.1769 12.3028 11.1012C12.2034 11.0255 12.0793 10.9898 11.9548 11.0011C11.8304 11.0124 11.7147 11.0699 11.6305 11.1622C11.5463 11.2545 11.4998 11.3751 11.5 11.5V16.002L11.508 16.092C11.5303 16.2149 11.5977 16.3251 11.6972 16.4008C11.7966 16.4765 11.9207 16.5122 12.0452 16.5009C12.1696 16.4896 12.2853 16.4321 12.3695 16.3398C12.4537 16.2475 12.5002 16.1269 12.5 16.002V11.5L12.492 11.41ZM12.799 9.25C12.799 9.05109 12.72 8.86032 12.5793 8.71967C12.4387 8.57902 12.2479 8.5 12.049 8.5C11.8501 8.5 11.6593 8.57902 11.5187 8.71967C11.378 8.86032 11.299 9.05109 11.299 9.25C11.299 9.44891 11.378 9.63968 11.5187 9.78033C11.6593 9.92098 11.8501 10 12.049 10C12.2479 10 12.4387 9.92098 12.5793 9.78033C12.72 9.63968 12.799 9.44891 12.799 9.25ZM20 12.5C20 10.3783 19.1571 8.34344 17.6569 6.84315C16.1566 5.34285 14.1217 4.5 12 4.5C9.87827 4.5 7.84344 5.34285 6.34315 6.84315C4.84285 8.34344 4 10.3783 4 12.5C4 14.6217 4.84285 16.6566 6.34315 18.1569C7.84344 19.6571 9.87827 20.5 12 20.5C14.1217 20.5 16.1566 19.6571 17.6569 18.1569C19.1571 16.6566 20 14.6217 20 12.5ZM5 12.5C5 11.5807 5.18106 10.6705 5.53284 9.82122C5.88463 8.97194 6.40024 8.20026 7.05025 7.55025C7.70026 6.90024 8.47194 6.38463 9.32122 6.03284C10.1705 5.68106 11.0807 5.5 12 5.5C12.9193 5.5 13.8295 5.68106 14.6788 6.03284C15.5281 6.38463 16.2997 6.90024 16.9497 7.55025C17.5998 8.20026 18.1154 8.97194 18.4672 9.82122C18.8189 10.6705 19 11.5807 19 12.5C19 14.3565 18.2625 16.137 16.9497 17.4497C15.637 18.7625 13.8565 19.5 12 19.5C10.1435 19.5 8.36301 18.7625 7.05025 17.4497C5.7375 16.137 5 14.3565 5 12.5Z"
                                                                                    fill="#7C7C7C"></path>
                                                                            </svg>
                                                                            @if ($coupondetails->usage_time)
                                                                                {{lang() == "en"?'Once collected, valid for':'領券後需於'}}
                                                                                {{ $coupondetails->usage_time }} {{lang() == "en"?($coupondetails->usage_time==1?'day':'days'):'日內使用'}}
                                                                            @else
                                                                                @lang('labels.coupon.offer_expires')
                                                                                {{ lang() == "en"?date('d M Y', strtotime($coupondetails->end_date)):date('Y年m月d日',strtotime($coupondetails->end_date))}}
                                                                            @endif
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="gccard-content-bottom">
                                                                    @if (Auth::guard('customer')->check())
                                                                        <button
                                                                            id="popup_coupon{{ $coupondetails->id }}"
                                                                            onclick="collect({{ $coupondetails->id }})"
                                                                            data-id={{ $coupondetails->id }}
                                                                            class="{{$checkUsedExpired==true?'text-d1':''}} collect-view-btn text-blueMediq flex justify-center ml-auto mr-auto collect {{ $collectId != null ? 'text-d1 pointer-events-none' : '' }}">
                                                                            {{-- {{ $collectId != null ? 'Collected' : 'Collect' }} --}}
                                                                            @if ($collectId != null)
                                                                                @lang('labels.coupon.collected')
                                                                            @else
                                                                                @lang('labels.coupon.collect')
                                                                            @endif
                                                                        </button>
                                                                    @else
                                                                        <button
                                                                            class="register-btn collect-view-btn text-blueMediq flex justify-center ml-auto mr-auto collect">@lang('labels.coupon.collect')</button>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="group-divider"></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-[200px] relative mx-auto">
                    <div class="detail-arrow notshow">
                        <svg width="12" height="21" viewBox="0 0 12 21" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1.28346 0.577913C0.904551 0.753695 0.732676 1.1951 0.892832 1.58963C0.935801 1.6951 2.16627 2.9451 5.35377 6.11698L9.76002 10.5037L5.35377 14.8865C2.16236 18.0662 0.935801 19.3123 0.892832 19.4178C0.861582 19.4998 0.834238 19.6365 0.834238 19.7224C0.834238 20.2849 1.40455 20.6639 1.90846 20.4295C2.13111 20.324 11.4436 11.0545 11.5413 10.8357C11.635 10.6365 11.635 10.3709 11.5413 10.1717C11.4436 9.95291 2.13111 0.683382 1.90846 0.577913C1.70924 0.484163 1.48268 0.484163 1.28346 0.577913Z"
                                fill="#333333"></path>
                        </svg>
                    </div>
                </div>
                <div class="w-full right-side">
                    @if ($selectedSubCategory != 'by-merchant')
                        @foreach ($couponList as $key => $coupondetails)
                            @php
                                $customer_id = Auth::guard('customer')->user() != null ? Auth::guard('customer')->user()->id : '';
                                $item = App\Models\CouponCollect::where('coupon_id', $coupondetails->id)
                                    ->where('customer_id', $customer_id)
                                    ->first();
                                $collectId = isset($item->coupon_id) ? 'collected' : '';
                                $checkUsedExpired = false;
                                $end_date = "";
                                if($item!=null) {
                                    $checkUsedExpired = checkUsedExpiredCoupon($item);
                                    if($coupondetails->usage_time!=null) {
                                        if(lang() == "en")
                                        {
                                            $end_date = \Carbon\Carbon::parse($item->created_at)->addDays($coupondetails->usage_time)->format('d M Y');
                                        }else{
                                            $end_date = \Carbon\Carbon::parse($item->created_at)->addDays($coupondetails->usage_time)->format('Y年m月d日');
                                        }
                                    }
                                }else{
                                    $checkUsedExpired = checkCouponStartAndEndDateExpired($coupondetails);
                                }
                            @endphp
                            <div class="detail-item bg-whitez py-5 rounded-[20px] go-detail-item hidden"
                                id="detail-section{{ $coupondetails->id }}">
                                <div class="bg-image mx-auto pb-5 relative">
                                    <div class="">
                                        {{-- <h6 class="coupon-detail-title">@lang('labels.coupon.coupon_details')</h6> --}}
                                    </div>
                                    <div
                                        class="flex flex-wrap xl:flex-nowrap items-center justify-between pt-5 qucollectd">
                                        <div class="relative bg-title flex justify-start items-center">
                                            <div class="quantity-logo-container mr-[12px] relative">
                                                <img src="{{ isset($coupondetails->merchant)?$coupondetails->merchant->icon:'' }}"
                                                    alt="logo" class="quantity-logo w-[100px] h-[100px]">
                                                    @foreach (config('mediq.coupon_status') as $key => $type)
                                                        @if ($key == $coupondetails->is_new_or_limited)
                                                            <div class="label-tag me-body14 helvetica-normal text-darkgray absolute -top-[10px] left-0 {{$coupondetails->is_new_or_limited=="new"?'new':'new-limit'}} px-[10px] py-[4px] rounded-[4px]">{{ lang() == "en"?$type:($type=="New"?'新上架':(lang()=="zh-hk"?"限量領取":"限量领取")) }}</div>
                                                        @endif
                                                    @endforeach
                                            </div>
                                            <div>
                                                @if (isset($coupondetails->merchant_id))
                                                    <p
                                                        class="text-left me-body16 text-darkgray helvetica-normal quatitle underline">
                                                        {{ langbind($coupondetails->merchant, 'name') }}</p>
                                                @endif
                                                <p
                                                    class="company-name me-body23 font-bold helvetica-normal text-darkgray cursor-pointer">
                                                    {{ langbind($coupondetails, 'name') }}</p>
                                                {{-- <p class="ctitle text-darkgray helvetica-normal me-body16">
                                                    {{ langbind($coupondetails, 'sub_title') }}</p>
                                                <div class="flex justify-start items-center flex-wrap">
                                                    <p
                                                        class="ccategory text-lightgray new-ccategory me-body16 helvetica-normal">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M12.492 11.41C12.4697 11.2871 12.4023 11.1769 12.3028 11.1012C12.2034 11.0255 12.0793 10.9898 11.9548 11.0011C11.8304 11.0124 11.7147 11.0699 11.6305 11.1622C11.5463 11.2545 11.4998 11.3751 11.5 11.5V16.002L11.508 16.092C11.5303 16.2149 11.5977 16.3251 11.6972 16.4008C11.7966 16.4765 11.9207 16.5122 12.0452 16.5009C12.1696 16.4896 12.2853 16.4321 12.3695 16.3398C12.4537 16.2475 12.5002 16.1269 12.5 16.002V11.5L12.492 11.41ZM12.799 9.25C12.799 9.05109 12.72 8.86032 12.5793 8.71967C12.4387 8.57902 12.2479 8.5 12.049 8.5C11.8501 8.5 11.6593 8.57902 11.5187 8.71967C11.378 8.86032 11.299 9.05109 11.299 9.25C11.299 9.44891 11.378 9.63968 11.5187 9.78033C11.6593 9.92098 11.8501 10 12.049 10C12.2479 10 12.4387 9.92098 12.5793 9.78033C12.72 9.63968 12.799 9.44891 12.799 9.25ZM20 12.5C20 10.3783 19.1571 8.34344 17.6569 6.84315C16.1566 5.34285 14.1217 4.5 12 4.5C9.87827 4.5 7.84344 5.34285 6.34315 6.84315C4.84285 8.34344 4 10.3783 4 12.5C4 14.6217 4.84285 16.6566 6.34315 18.1569C7.84344 19.6571 9.87827 20.5 12 20.5C14.1217 20.5 16.1566 19.6571 17.6569 18.1569C19.1571 16.6566 20 14.6217 20 12.5ZM5 12.5C5 11.5807 5.18106 10.6705 5.53284 9.82122C5.88463 8.97194 6.40024 8.20026 7.05025 7.55025C7.70026 6.90024 8.47194 6.38463 9.32122 6.03284C10.1705 5.68106 11.0807 5.5 12 5.5C12.9193 5.5 13.8295 5.68106 14.6788 6.03284C15.5281 6.38463 16.2997 6.90024 16.9497 7.55025C17.5998 8.20026 18.1154 8.97194 18.4672 9.82122C18.8189 10.6705 19 11.5807 19 12.5C19 14.3565 18.2625 16.137 16.9497 17.4497C15.637 18.7625 13.8565 19.5 12 19.5C10.1435 19.5 8.36301 18.7625 7.05025 17.4497C5.7375 16.137 5 14.3565 5 12.5Z"
                                                                fill="#7C7C7C"></path>
                                                        </svg>
                                                        @if ($coupondetails->usage_time)
                                                            Once collected, valid for {{ $coupondetails->usage_time }}
                                                            days
                                                        @else
                                                        @lang('labels.coupon.offer_expires')
                                                            {{ date('d M Y', strtotime($coupondetails->end_date)) }}
                                                        @endif
                                                    </p>
                                                </div> --}}
                                            </div>
                                        </div>
                                        @if (Auth::guard('customer')->check())
                                            <button onclick="collect({{ $coupondetails->id }})"
                                                class="{{$checkUsedExpired==true?'text-d1':''}} details-collect-coupon{{ $coupondetails->id }} cp-detail-collect-btn w-[131px] font-secondary font-bold me-body16 inline-block py-[10px] px-5 border border-darkgray text-center hover:bg-blueMediq hover:border-blueMediq hover:text-whitez rounded-full {{ $collectId != null ? 'pointer-events-none' : '' }}">
                                                {{-- {{ $collectId != null ? 'Collected' : 'Collect' }} --}}
                                                @if ($collectId != null)
                                                    @lang('labels.coupon.collected')
                                                @else
                                                    @lang('labels.coupon.collect')
                                                @endif
                                            </button>
                                        @else
                                            <button data-id="new-small-coupon0"
                                                class="details-collect-coupon{{ $coupondetails->id }} register-btn w-[131px] font-secondary font-bold me-body16 inline-block py-[10px] px-5 border border-darkgray text-center hover:bg-blueMediq hover:border-blueMediq hover:text-whitez rounded-full">
                                                @lang('labels.coupon.collect')</button>
                                        @endif

                                    </div>
                                </div>
                                <div class="mx-auto custom-divider">
                                </div>
                                <div class="mx-auto detail-bottom">
                                    <div class="mb-[27px] last:mb-0">
                                        <h6 class="text-darkgray contitle mb-[10px]">@lang('labels.promotion_period')</h6>
                                        <div class="condes text-darkgray">
                                            @if(lang() == "en"){{ date('d M Y', strtotime($coupondetails->start_date)) }}@else {{ date('Y年m月d日', strtotime($coupondetails->start_date))}} @endif - @if(lang() == "en"){{ $end_date!=""?$end_date:date('d M Y', strtotime($coupondetails->end_date)) }}@else {{ $end_date!=""?$end_date:date('Y年m月d日', strtotime($coupondetails->end_date))}}@endif
                                        </div>
                                    </div>
                                    <div class="mb-[27px] last:mb-0">
                                        {{-- <h6 class="text-darkgray contitle mb-[10px]">@lang('labels.coupon.terms_and_conditions')</h6> --}}
                                        <div class="condes text-darkgray">
                                            {!! langbind($coupondetails, 'content') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        @foreach ($couponList as $key => $value)
                            @foreach ($value->coupons as $coupondetails)
                                @php
                                    $customer_id = Auth::guard('customer')->user() != null ? Auth::guard('customer')->user()->id : '';
                                    $item = App\Models\CouponCollect::where('coupon_id', $coupondetails->id)
                                        ->where('customer_id', $customer_id)
                                        ->first();
                                    $collectId = isset($item->coupon_id) ? 'collected' : '';
                                    $checkUsedExpired = false;
                                    $end_date ="";
                                    if($item!=null) {
                                        $checkUsedExpired = checkUsedExpiredCoupon($item);
                                        if($coupondetails->usage_time!=null) {
                                        if(lang() == "en")
                                        {
                                            $end_date = \Carbon\Carbon::parse($item->created_at)->addDays($coupondetails->usage_time)->format('d M Y');
                                        }else{
                                            $end_date = \Carbon\Carbon::parse($item->created_at)->addDays($coupondetails->usage_time)->format('Y年m月d日');
                                        }
                                    }
                                    }else{
                                        $checkUsedExpired = checkCouponStartAndEndDateExpired($coupondetails);
                                    }
                                @endphp
                                <div class="detail-item bg-whitez py-5 rounded-[20px] go-detail-item hidden"
                                    id="detail-section{{ $coupondetails->id }}">
                                    <div class="bg-image mx-auto pb-5 relative">
                                        <div class="">
                                            {{-- <h6 class="coupon-detail-title">@lang('labels.coupon.coupon_details')</h6> --}}
                                        </div>
                                        <div
                                            class="flex flex-wrap xl:flex-nowrap items-center justify-between pt-5 qucollectd">
                                            <div class="relative bg-title flex justify-start items-center">
                                                <div class="quantity-logo-container mr-[12px] relative">
                                                    <img src="{{ isset($coupondetails->merchant)?$coupondetails->merchant->icon:'' }}"
                                                        alt="logo" class="quantity-logo w-[100px] h-[100px]">
                                                        @foreach (config('mediq.coupon_status') as $key => $type)
                                                        @if ($key == $coupondetails->is_new_or_limited)
                                                            <div class="label-tag me-body14 helvetica-normal text-darkgray absolute -top-[10px] left-0 {{$coupondetails->is_new_or_limited=="new"?'new':'new-limit'}} px-[10px] py-[4px] rounded-[4px]">{{ lang() == "en"?$type:($type=="New"?'新上架':(lang()=="zh-hk"?"限量領取":"限量领取")) }}</div>
                                                        @endif
                                                        @endforeach
                                                </div>
                                                <div>
                                                    @if (isset($coupondetails->merchant_id))
                                                        <p
                                                            class="text-left me-body16 text-darkgray helvetica-normal quatitle underline">
                                                            {{ langbind($coupondetails->merchant, 'name') }}</p>
                                                    @endif
                                                    <p
                                                        class="company-name me-body23 font-bold helvetica-normal text-darkgray cursor-pointer">
                                                        {{ langbind($coupondetails, 'name') }}</p>
                                                    <p class="ctitle text-darkgray helvetica-normal me-body16">
                                                        {{ langbind($coupondetails, 'sub_title') }}</p>
                                                    <div class="flex justify-start items-center flex-wrap">
                                                        <p
                                                            class="ccategory text-lightgray new-ccategory me-body16 helvetica-normal">
                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M12.492 11.41C12.4697 11.2871 12.4023 11.1769 12.3028 11.1012C12.2034 11.0255 12.0793 10.9898 11.9548 11.0011C11.8304 11.0124 11.7147 11.0699 11.6305 11.1622C11.5463 11.2545 11.4998 11.3751 11.5 11.5V16.002L11.508 16.092C11.5303 16.2149 11.5977 16.3251 11.6972 16.4008C11.7966 16.4765 11.9207 16.5122 12.0452 16.5009C12.1696 16.4896 12.2853 16.4321 12.3695 16.3398C12.4537 16.2475 12.5002 16.1269 12.5 16.002V11.5L12.492 11.41ZM12.799 9.25C12.799 9.05109 12.72 8.86032 12.5793 8.71967C12.4387 8.57902 12.2479 8.5 12.049 8.5C11.8501 8.5 11.6593 8.57902 11.5187 8.71967C11.378 8.86032 11.299 9.05109 11.299 9.25C11.299 9.44891 11.378 9.63968 11.5187 9.78033C11.6593 9.92098 11.8501 10 12.049 10C12.2479 10 12.4387 9.92098 12.5793 9.78033C12.72 9.63968 12.799 9.44891 12.799 9.25ZM20 12.5C20 10.3783 19.1571 8.34344 17.6569 6.84315C16.1566 5.34285 14.1217 4.5 12 4.5C9.87827 4.5 7.84344 5.34285 6.34315 6.84315C4.84285 8.34344 4 10.3783 4 12.5C4 14.6217 4.84285 16.6566 6.34315 18.1569C7.84344 19.6571 9.87827 20.5 12 20.5C14.1217 20.5 16.1566 19.6571 17.6569 18.1569C19.1571 16.6566 20 14.6217 20 12.5ZM5 12.5C5 11.5807 5.18106 10.6705 5.53284 9.82122C5.88463 8.97194 6.40024 8.20026 7.05025 7.55025C7.70026 6.90024 8.47194 6.38463 9.32122 6.03284C10.1705 5.68106 11.0807 5.5 12 5.5C12.9193 5.5 13.8295 5.68106 14.6788 6.03284C15.5281 6.38463 16.2997 6.90024 16.9497 7.55025C17.5998 8.20026 18.1154 8.97194 18.4672 9.82122C18.8189 10.6705 19 11.5807 19 12.5C19 14.3565 18.2625 16.137 16.9497 17.4497C15.637 18.7625 13.8565 19.5 12 19.5C10.1435 19.5 8.36301 18.7625 7.05025 17.4497C5.7375 16.137 5 14.3565 5 12.5Z"
                                                                    fill="#7C7C7C"></path>
                                                            </svg>
                                                            @if ($coupondetails->usage_time)
                                                                {{lang() == "en"?'Once collected, valid for':'領券後需於'}}
                                                                {{ $coupondetails->usage_time }} {{lang() == "en"?($coupondetails->usage_time==1?'day':'days'):'日內使用'}}
                                                            @else
                                                            @lang('labels.coupon.offer_expires')
                                                                {{ lang() == "en"?date('d M Y', strtotime($coupondetails->end_date)):date('Y年m月d日',strtotime($coupondetails->end_date))}}
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            @if (Auth::guard('customer')->check())
                                                <button onclick="collect({{ $coupondetails->id }})"
                                                    class="{{$checkUsedExpired==true?'text-d1':''}} details-collect-coupon{{ $coupondetails->id }} cp-detail-collect-btn w-[131px] font-secondary font-bold me-body16 inline-block py-[10px] px-5 border border-darkgray text-center hover:bg-blueMediq hover:border-blueMediq hover:text-whitez rounded-full {{ $collectId != null ? 'pointer-events-none' : '' }}">
                                                    {{-- {{ $collectId != null ? 'Collected' : 'Collect' }} --}}
                                                    @if ($collectId != null)
                                                        @lang('labels.coupon.collected')
                                                    @else
                                                        @lang('labels.coupon.collect')
                                                    @endif
                                                </button>
                                            @else
                                                <button data-id="new-small-coupon0"
                                                    class="details-collect-coupon{{ $coupondetails->id }} register-btn w-[131px] font-secondary font-bold me-body16 inline-block py-[10px] px-5 border border-darkgray text-center hover:bg-blueMediq hover:border-blueMediq hover:text-whitez rounded-full">@lang('labels.coupon.collect')</button>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mx-auto custom-divider">
                                    </div>
                                    <div class="mx-auto detail-bottom">
                                        <div class="mb-[27px] last:mb-0">
                                            <h6 class="text-darkgray contitle mb-[10px]">@lang('labels.promotion_period')</h6>
                                            <div class="condes text-darkgray">
                                                @if(lang() == "en"){{ date('d M Y', strtotime($coupondetails->start_date)) }}@else {{ date('Y年m月d日', strtotime($coupondetails->start_date))}} @endif - @if(lang() == "en"){{ $end_date!=""?$end_date:date('d M Y', strtotime($coupondetails->end_date)) }}@else {{ $end_date!=""?$end_date:date('Y年m月d日', strtotime($coupondetails->end_date))}}@endif
                                            </div>
                                        </div>
                                        <div class="mb-[27px] last:mb-0">
                                            {{-- <h6 class="text-darkgray contitle mb-[10px]">@lang('labels.coupon.terms_and_conditions')</h6> --}}
                                            <div class="condes text-darkgray">
                                                {!! langbind($coupondetails, 'content') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        @foreach ($mainCategories as $value)
            <div
                class="cc-views {{ str_replace(' ', '', $value->name_en) }} {{ $selectedCategory != $value->name_en ? 'hidden' : '' }}">
                <ul class="flex justify-center items-center my-10 clinnertabs">
                    <li class="clinnertabs-item w-1/3 text-darkgray helvetica-normal me-body18 text-center cursor-pointer relative {{ $selectedSubCategory == 'most-recently-added' ? 'active' : '' }}"
                        data-id=".most-recently-added" data-value="most-recently-added">
                        @lang('labels.coupon.most_recently_added')
                    </li>

                    <li class="clinnertabs-item w-1/3 text-darkgray helvetica-normal me-body18 text-center cursor-pointer relative {{ $selectedSubCategory == 'expiring-first' ? 'active' : '' }}"
                        data-id=".expiring-first" data-value="expiring-first">
                        @lang('labels.coupon.expiring_first')
                    </li>

                    <li class="clinnertabs-item w-1/3 text-darkgray helvetica-normal me-body18 text-center cursor-pointer relative {{ $selectedSubCategory == 'lowest-minimum-order-value' ? 'active' : '' }}"
                        data-id=".lowest-minimum-order-value" data-value="lowest-minimum-order-value">
                        @lang('labels.coupon.lowest_minimum_order_value')
                    </li>

                    <li class="clinnertabs-item w-1/3 text-darkgray helvetica-normal me-body18 text-center cursor-pointer relative {{ $selectedSubCategory == 'by-merchant' ? 'active' : '' }}"
                        data-id=".by-merchant" data-value="by-merchant">
                        @lang('labels.coupon.by_merchant')
                    </li>

                </ul>

                <div class="flex justify-start main-box">
                    <div class="max-w-[620px] w-full left-side">
                        <div class="clinnertabs-content">
                            <div
                                class="inner-views most-recently-added {{ $selectedSubCategory != 'most-recently-added' ? 'hidden' : '' }}">
                                <div class="coupon-results mb-5">
                                    <p class="helvetica-normal me-body26 font-bold text-darkgray">
                                        {{ count($couponList) }} @lang('labels.coupon.coupons')</p>
                                </div>
                                <div class="inner-views-items custom-scrollbar-rounded-gray">
                                    @foreach ($couponList as $key => $coupondetails)
                                        @php
                                            $customer_id = Auth::guard('customer')->user() != null ? Auth::guard('customer')->user()->id : '';
                                            $item = App\Models\CouponCollect::where('coupon_id', $coupondetails->id)
                                                ->where('customer_id', $customer_id)
                                                ->first();
                                            $collectId = isset($item->coupon_id) ? 'collected' : '';
                                            $checkUsedExpired = false;
                                            if($item!=null) {
                                                $checkUsedExpired = checkUsedExpiredCoupon($item);
                                            }else{
                                                $checkUsedExpired = checkCouponStartAndEndDateExpired($coupondetails);
                                            }
                                        @endphp
                                        <div component-name="me-coupon-small-card"
                                            class="small-coupon new-small-coupon show {{$loop->index==0?'selected':''}}" id="new-small-coupon0"
                                            data-id="#detail-section0">
                                            <div class="w-full small-coupon--container">
                                                <div class="relative collect">
                                                    <img src="{{ asset('frontend/img/product-detail-coupon-small.png') }} "
                                                        class="voucher-shape">
                                                    <div class="gccard rounded-[20px] collect">
                                                        <div
                                                            class="gccard-top bg-no-repeat h-[100px] relative bg-cover gccard-home ">
                                                                @foreach (config('mediq.coupon_status') as $key => $type)
                                                                @if ($key == $coupondetails->is_new_or_limited)
                                                                    <div class="label-tag me-body14 helvetica-normal text-darkgray absolute -top-[10px] left-0 {{$coupondetails->is_new_or_limited=="new"?'new':'new-limit'}} px-[10px] py-[4px] rounded-[4px]">{{ lang() == "en"?$type:($type=="New"?'新上架':(lang()=="zh-hk"?"限量領取":"限量领取")) }}</div>
                                                                @endif
                                                                @endforeach
                                                        </div>
                                                        <div
                                                            class="gccard-top bg-no-repeat h-[100px] relative bg-cover gccard-detail hidden">
                                                            <div
                                                                class="detail-coupon absolute top-[8px] left-[10px] rounded-[4px] py-[5px] px-[10px] bg-[#F0F9F0] me-green-color {{$coupondetails->is_new_or_limited=="new"?'new':'new-limit'}}">
                                                                @foreach (config('mediq.coupon_status') as $key => $type)
                                                                    @if ($key == $coupondetails->is_new_or_limited)
                                                                        {{ lang() == "en"?$type:($type=="New"?'新上架':(lang()=="zh-hk"?"限量領取":"限量领取")) }}
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="gccard-content text-center">
                                                            <div class="cclogo-container rounded-full">
                                                                <img class="cclogo border-mee4 rounded-full w-[72px] h-[72px]"
                                                                    src="{{ isset($coupondetails->merchant)?$coupondetails->merchant->icon:'' }}">
                                                            </div>
                                                            <div class="gccard-content-body">
                                                                <a href="javascript:void(0)"
                                                                    data-id="#detail-section{{ $coupondetails->id }}"
                                                                    class="coupon-see-detail">
                                                                    <p
                                                                        class="company-name text-darkgray cursor-pointer">
                                                                        {{ langbind($coupondetails, 'name') }}</p>
                                                                    <p class="ctitle text-darkgray">
                                                                        {{ langbind($coupondetails, 'sub_title') }}
                                                                    </p>
                                                                </a>
                                                                <div class="flex justify-start items-center flex-wrap">
                                                                    <p class="ccategory text-lightgray new-ccategory">
                                                                        <svg width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M12.492 11.41C12.4697 11.2871 12.4023 11.1769 12.3028 11.1012C12.2034 11.0255 12.0793 10.9898 11.9548 11.0011C11.8304 11.0124 11.7147 11.0699 11.6305 11.1622C11.5463 11.2545 11.4998 11.3751 11.5 11.5V16.002L11.508 16.092C11.5303 16.2149 11.5977 16.3251 11.6972 16.4008C11.7966 16.4765 11.9207 16.5122 12.0452 16.5009C12.1696 16.4896 12.2853 16.4321 12.3695 16.3398C12.4537 16.2475 12.5002 16.1269 12.5 16.002V11.5L12.492 11.41ZM12.799 9.25C12.799 9.05109 12.72 8.86032 12.5793 8.71967C12.4387 8.57902 12.2479 8.5 12.049 8.5C11.8501 8.5 11.6593 8.57902 11.5187 8.71967C11.378 8.86032 11.299 9.05109 11.299 9.25C11.299 9.44891 11.378 9.63968 11.5187 9.78033C11.6593 9.92098 11.8501 10 12.049 10C12.2479 10 12.4387 9.92098 12.5793 9.78033C12.72 9.63968 12.799 9.44891 12.799 9.25ZM20 12.5C20 10.3783 19.1571 8.34344 17.6569 6.84315C16.1566 5.34285 14.1217 4.5 12 4.5C9.87827 4.5 7.84344 5.34285 6.34315 6.84315C4.84285 8.34344 4 10.3783 4 12.5C4 14.6217 4.84285 16.6566 6.34315 18.1569C7.84344 19.6571 9.87827 20.5 12 20.5C14.1217 20.5 16.1566 19.6571 17.6569 18.1569C19.1571 16.6566 20 14.6217 20 12.5ZM5 12.5C5 11.5807 5.18106 10.6705 5.53284 9.82122C5.88463 8.97194 6.40024 8.20026 7.05025 7.55025C7.70026 6.90024 8.47194 6.38463 9.32122 6.03284C10.1705 5.68106 11.0807 5.5 12 5.5C12.9193 5.5 13.8295 5.68106 14.6788 6.03284C15.5281 6.38463 16.2997 6.90024 16.9497 7.55025C17.5998 8.20026 18.1154 8.97194 18.4672 9.82122C18.8189 10.6705 19 11.5807 19 12.5C19 14.3565 18.2625 16.137 16.9497 17.4497C15.637 18.7625 13.8565 19.5 12 19.5C10.1435 19.5 8.36301 18.7625 7.05025 17.4497C5.7375 16.137 5 14.3565 5 12.5Z"
                                                                                fill="#7C7C7C"></path>
                                                                        </svg>
                                                                        @if ($coupondetails->usage_time)
                                                                            {{lang() == "en"?'Once collected, valid for':'領券後需於'}}
                                                                            {{ $coupondetails->usage_time }} {{lang() == "en"?($coupondetails->usage_time==1?'day':'days'):'日內使用'}}
                                                                        @else
                                                                        @lang('labels.coupon.offer_expires')
                                                                            {{ lang() == "en"?date('d M Y', strtotime($coupondetails->end_date)):date('Y年m月d日',strtotime($coupondetails->end_date))}}
                                                                        @endif
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="gccard-content-bottom">
                                                                @if (Auth::guard('customer')->check())
                                                                    <button id="popup_coupon{{ $coupondetails->id }}"
                                                                        onclick="collect({{ $coupondetails->id }})"
                                                                        data-id={{ $coupondetails->id }}
                                                                        class="{{$checkUsedExpired==true?'text-d1':''}} collect-view-btn text-blueMediq flex justify-center ml-auto mr-auto collect {{ $collectId != null ? 'text-d1 pointer-events-none' : '' }}">
                                                                        {{-- {{ $collectId != null ? 'Collected' : 'Collect' }} --}}
                                                                        @if ($collectId != null)
                                                                            @lang('labels.coupon.collected')
                                                                        @else
                                                                            @lang('labels.coupon.collect')
                                                                        @endif
                                                                    </button>
                                                                @else
                                                                    <button
                                                                        class="register-btn collect-view-btn text-blueMediq flex justify-center ml-auto mr-auto collect">
                                                                        @lang('labels.coupon.collect')
                                                                    </button>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <div
                                class="inner-views expiring-first {{ $selectedSubCategory != 'expiring-first' ? 'hidden' : '' }}">
                                <div class="coupon-results mb-5">
                                    <p class="helvetica-normal me-body26 font-bold text-darkgray">
                                        {{ count($couponList) }} @lang('labels.coupon.coupons')</p>
                                </div>
                                <div class="inner-views-items custom-scrollbar-rounded-gray">
                                    @foreach ($couponList as $key => $coupondetails)
                                        @php
                                            $customer_id = Auth::guard('customer')->user() != null ? Auth::guard('customer')->user()->id : '';
                                            $item = App\Models\CouponCollect::where('coupon_id', $coupondetails->id)
                                                ->where('customer_id', $customer_id)
                                                ->first();
                                            $collectId = isset($item->coupon_id) ? 'collected' : '';
                                            $checkUsedExpired = false;
                                            if($item!=null) {
                                                $checkUsedExpired = checkUsedExpiredCoupon($item);
                                            }else{
                                                $checkUsedExpired = checkCouponStartAndEndDateExpired($coupondetails);
                                            }
                                        @endphp
                                        <div component-name="me-coupon-small-card"
                                            class="small-coupon new-small-coupon show {{$loop->index==0?'selected':''}}" id="new-small-coupon0"
                                            data-id="#detail-section0">
                                            <div class="w-full small-coupon--container">
                                                <div class="relative collect">
                                                    <img src="{{ asset('frontend/img/product-detail-coupon-small.png') }} "
                                                        class="voucher-shape">
                                                    <div class="gccard rounded-[20px] collect">
                                                        <div
                                                            class="gccard-top bg-no-repeat h-[100px] relative bg-cover gccard-home ">

                                                                @foreach (config('mediq.coupon_status') as $key => $type)
                                                                @if ($key == $coupondetails->is_new_or_limited)
                                                                    <div class="label-tag me-body14 helvetica-normal text-darkgray absolute -top-[10px] left-0 {{$coupondetails->is_new_or_limited=="new"?'new':'new-limit'}} px-[10px] py-[4px] rounded-[4px]">{{ lang() == "en"?$type:($type=="New"?'新上架':(lang()=="zh-hk"?"限量領取":"限量领取")) }}</div>
                                                                @endif
                                                                @endforeach

                                                        </div>
                                                        <div
                                                            class="gccard-top bg-no-repeat h-[100px] relative bg-cover gccard-detail hidden">
                                                            <div
                                                                class="detail-coupon absolute top-[8px] left-[10px] rounded-[4px] py-[5px] px-[10px] bg-[#F0F9F0] me-green-color {{$coupondetails->is_new_or_limited=="new"?'new':'new-limit'}}">
                                                                @foreach (config('mediq.coupon_status') as $key => $type)
                                                                    @if ($key == $coupondetails->is_new_or_limited)
                                                                        {{ lang() == "en"?$type:($type=="New"?'新上架':(lang()=="zh-hk"?"限量領取":"限量领取")) }}
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="gccard-content text-center">
                                                            <div class="cclogo-container rounded-full">
                                                                <img class="cclogo border-mee4 rounded-full w-[72px] h-[72px]"
                                                                    src="{{ isset($coupondetails->merchant)?$coupondetails->merchant->icon:'' }}">
                                                            </div>
                                                            <div class="gccard-content-body">
                                                                <a href="javascript:void(0)"
                                                                    data-id="#detail-section{{ $coupondetails->id }}"
                                                                    class="coupon-see-detail">
                                                                    <p
                                                                        class="company-name text-darkgray cursor-pointer">
                                                                        {{ langbind($coupondetails, 'name') }}</p>
                                                                    <p class="ctitle text-darkgray">
                                                                        {{ langbind($coupondetails, 'sub_title') }}
                                                                    </p>
                                                                </a>
                                                                <div class="flex justify-start items-center flex-wrap">
                                                                    <p class="ccategory text-lightgray new-ccategory">
                                                                        <svg width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M12.492 11.41C12.4697 11.2871 12.4023 11.1769 12.3028 11.1012C12.2034 11.0255 12.0793 10.9898 11.9548 11.0011C11.8304 11.0124 11.7147 11.0699 11.6305 11.1622C11.5463 11.2545 11.4998 11.3751 11.5 11.5V16.002L11.508 16.092C11.5303 16.2149 11.5977 16.3251 11.6972 16.4008C11.7966 16.4765 11.9207 16.5122 12.0452 16.5009C12.1696 16.4896 12.2853 16.4321 12.3695 16.3398C12.4537 16.2475 12.5002 16.1269 12.5 16.002V11.5L12.492 11.41ZM12.799 9.25C12.799 9.05109 12.72 8.86032 12.5793 8.71967C12.4387 8.57902 12.2479 8.5 12.049 8.5C11.8501 8.5 11.6593 8.57902 11.5187 8.71967C11.378 8.86032 11.299 9.05109 11.299 9.25C11.299 9.44891 11.378 9.63968 11.5187 9.78033C11.6593 9.92098 11.8501 10 12.049 10C12.2479 10 12.4387 9.92098 12.5793 9.78033C12.72 9.63968 12.799 9.44891 12.799 9.25ZM20 12.5C20 10.3783 19.1571 8.34344 17.6569 6.84315C16.1566 5.34285 14.1217 4.5 12 4.5C9.87827 4.5 7.84344 5.34285 6.34315 6.84315C4.84285 8.34344 4 10.3783 4 12.5C4 14.6217 4.84285 16.6566 6.34315 18.1569C7.84344 19.6571 9.87827 20.5 12 20.5C14.1217 20.5 16.1566 19.6571 17.6569 18.1569C19.1571 16.6566 20 14.6217 20 12.5ZM5 12.5C5 11.5807 5.18106 10.6705 5.53284 9.82122C5.88463 8.97194 6.40024 8.20026 7.05025 7.55025C7.70026 6.90024 8.47194 6.38463 9.32122 6.03284C10.1705 5.68106 11.0807 5.5 12 5.5C12.9193 5.5 13.8295 5.68106 14.6788 6.03284C15.5281 6.38463 16.2997 6.90024 16.9497 7.55025C17.5998 8.20026 18.1154 8.97194 18.4672 9.82122C18.8189 10.6705 19 11.5807 19 12.5C19 14.3565 18.2625 16.137 16.9497 17.4497C15.637 18.7625 13.8565 19.5 12 19.5C10.1435 19.5 8.36301 18.7625 7.05025 17.4497C5.7375 16.137 5 14.3565 5 12.5Z"
                                                                                fill="#7C7C7C"></path>
                                                                        </svg>
                                                                        @if ($coupondetails->usage_time)
                                                                            {{lang() == "en"?'Once collected, valid for':'領券後需於'}}
                                                                            {{ $coupondetails->usage_time }} {{lang() == "en"?($coupondetails->usage_time==1?'day':'days'):'日內使用'}}
                                                                        @else
                                                                            @lang('labels.coupon.offer_expires')
                                                                            {{ lang() == "en"?date('d M Y', strtotime($coupondetails->end_date)):date('Y年m月d日',strtotime($coupondetails->end_date))}}
                                                                        @endif
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="gccard-content-bottom">
                                                                @if (Auth::guard('customer')->check())
                                                                    <button id="popup_coupon{{ $coupondetails->id }}"
                                                                        onclick="collect({{ $coupondetails->id }})"
                                                                        data-id={{ $coupondetails->id }}
                                                                        class="{{$checkUsedExpired==true?'text-d1':''}} collect-view-btn text-blueMediq flex justify-center ml-auto mr-auto collect {{ $collectId != null ? 'text-d1 pointer-events-none' : '' }}">
                                                                        {{-- {{ $collectId != null ? 'Collected' : 'Collect' }} --}}
                                                                        @if ($collectId != null)
                                                                            @lang('labels.coupon.collected')
                                                                        @else
                                                                            @lang('labels.coupon.collect')
                                                                        @endif
                                                                    </button>
                                                                @else
                                                                    <button
                                                                        class="register-btn collect-view-btn text-blueMediq flex justify-center ml-auto mr-auto collect">
                                                                        @lang('labels.coupon.collect')
                                                                    </button>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div
                                class="inner-views lowest-minimum-order-value {{ $selectedSubCategory != 'lowest-minimum-order-value' ? 'hidden' : '' }}">
                                <div class="coupon-results mb-5">
                                    <p class="helvetica-normal me-body26 font-bold text-darkgray">
                                        {{ count($couponList) }} @lang('labels.coupon.coupons')</p>
                                </div>
                                <div class="inner-views-items custom-scrollbar-rounded-gray">
                                    @foreach ($couponList as $key => $coupondetails)
                                        @php
                                            $customer_id = Auth::guard('customer')->user() != null ? Auth::guard('customer')->user()->id : '';
                                            $item = App\Models\CouponCollect::where('coupon_id', $coupondetails->id)
                                                ->where('customer_id', $customer_id)
                                                ->first();
                                            $collectId = isset($item->coupon_id) ? 'collected' : '';
                                            $checkUsedExpired = false;
                                            if($item!=null) {
                                                $checkUsedExpired = checkUsedExpiredCoupon($item);
                                            }else{
                                                $checkUsedExpired = checkCouponStartAndEndDateExpired($coupondetails);
                                            }
                                        @endphp
                                        <div component-name="me-coupon-small-card"
                                            class="small-coupon new-small-coupon show {{$loop->index==0?'selected':''}}" id="new-small-coupon0"
                                            data-id="#detail-section0">
                                            <div class="w-full small-coupon--container">
                                                <div class="relative collect">
                                                    <img src="{{ asset('frontend/img/product-detail-coupon-small.png') }} "
                                                        class="voucher-shape">
                                                    <div class="gccard rounded-[20px] collect">
                                                        <div
                                                            class="gccard-top bg-no-repeat h-[100px] relative bg-cover gccard-home ">
                                                                @foreach (config('mediq.coupon_status') as $key => $type)
                                                                @if ($key == $coupondetails->is_new_or_limited)
                                                                    <div class="label-tag me-body14 helvetica-normal text-darkgray absolute -top-[10px] left-0 {{$coupondetails->is_new_or_limited=="new"?'new':'new-limit'}} px-[10px] py-[4px] rounded-[4px]">{{ lang() == "en"?$type:($type=="New"?'新上架':(lang()=="zh-hk"?"限量領取":"限量领取")) }}</div>
                                                                @endif
                                                                @endforeach
                                                        </div>
                                                        <div
                                                            class="gccard-top bg-no-repeat h-[100px] relative bg-cover gccard-detail hidden">
                                                            <div
                                                                class="detail-coupon absolute top-[8px] left-[10px] rounded-[4px] py-[5px] px-[10px] bg-[#F0F9F0] me-green-color {{$coupondetails->is_new_or_limited=="new"?'new':'new-limit'}}">
                                                                @foreach (config('mediq.coupon_status') as $key => $type)
                                                                    @if ($key == $coupondetails->is_new_or_limited)
                                                                        {{ lang() == "en"?$type:($type=="New"?'新上架':(lang()=="zh-hk"?"限量領取":"限量领取")) }}
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="gccard-content text-center">
                                                            <div class="cclogo-container rounded-full">
                                                                <img class="cclogo border-mee4 rounded-full w-[72px] h-[72px]"
                                                                    src="{{ isset($coupondetails->merchant)?$coupondetails->merchant->icon:'' }}">
                                                            </div>
                                                            <div class="gccard-content-body">
                                                                <a href="javascript:void(0)"
                                                                    data-id="#detail-section{{ $coupondetails->id }}"
                                                                    class="coupon-see-detail">
                                                                    <p
                                                                        class="company-name text-darkgray cursor-pointer">
                                                                        {{ langbind($coupondetails, 'name') }}</p>
                                                                    <p class="ctitle text-darkgray">
                                                                        {{ langbind($coupondetails, 'sub_title') }}
                                                                    </p>
                                                                </a>
                                                                <div class="flex justify-start items-center flex-wrap">
                                                                    <p class="ccategory text-lightgray new-ccategory">
                                                                        <svg width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M12.492 11.41C12.4697 11.2871 12.4023 11.1769 12.3028 11.1012C12.2034 11.0255 12.0793 10.9898 11.9548 11.0011C11.8304 11.0124 11.7147 11.0699 11.6305 11.1622C11.5463 11.2545 11.4998 11.3751 11.5 11.5V16.002L11.508 16.092C11.5303 16.2149 11.5977 16.3251 11.6972 16.4008C11.7966 16.4765 11.9207 16.5122 12.0452 16.5009C12.1696 16.4896 12.2853 16.4321 12.3695 16.3398C12.4537 16.2475 12.5002 16.1269 12.5 16.002V11.5L12.492 11.41ZM12.799 9.25C12.799 9.05109 12.72 8.86032 12.5793 8.71967C12.4387 8.57902 12.2479 8.5 12.049 8.5C11.8501 8.5 11.6593 8.57902 11.5187 8.71967C11.378 8.86032 11.299 9.05109 11.299 9.25C11.299 9.44891 11.378 9.63968 11.5187 9.78033C11.6593 9.92098 11.8501 10 12.049 10C12.2479 10 12.4387 9.92098 12.5793 9.78033C12.72 9.63968 12.799 9.44891 12.799 9.25ZM20 12.5C20 10.3783 19.1571 8.34344 17.6569 6.84315C16.1566 5.34285 14.1217 4.5 12 4.5C9.87827 4.5 7.84344 5.34285 6.34315 6.84315C4.84285 8.34344 4 10.3783 4 12.5C4 14.6217 4.84285 16.6566 6.34315 18.1569C7.84344 19.6571 9.87827 20.5 12 20.5C14.1217 20.5 16.1566 19.6571 17.6569 18.1569C19.1571 16.6566 20 14.6217 20 12.5ZM5 12.5C5 11.5807 5.18106 10.6705 5.53284 9.82122C5.88463 8.97194 6.40024 8.20026 7.05025 7.55025C7.70026 6.90024 8.47194 6.38463 9.32122 6.03284C10.1705 5.68106 11.0807 5.5 12 5.5C12.9193 5.5 13.8295 5.68106 14.6788 6.03284C15.5281 6.38463 16.2997 6.90024 16.9497 7.55025C17.5998 8.20026 18.1154 8.97194 18.4672 9.82122C18.8189 10.6705 19 11.5807 19 12.5C19 14.3565 18.2625 16.137 16.9497 17.4497C15.637 18.7625 13.8565 19.5 12 19.5C10.1435 19.5 8.36301 18.7625 7.05025 17.4497C5.7375 16.137 5 14.3565 5 12.5Z"
                                                                                fill="#7C7C7C"></path>
                                                                        </svg>
                                                                        @if ($coupondetails->usage_time)
                                                                            {{lang() == "en"?'Once collected, valid for':'領券後需於'}}
                                                                            {{ $coupondetails->usage_time }} {{lang() == "en"?($coupondetails->usage_time==1?'day':'days'):'日內使用'}}
                                                                        @else
                                                                            @lang('labels.coupon.offer_expires')
                                                                            {{ lang() == "en"?date('d M Y', strtotime($coupondetails->end_date)):date('Y年m月d日',strtotime($coupondetails->end_date))}}
                                                                        @endif
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="gccard-content-bottom">
                                                                @if (Auth::guard('customer')->check())
                                                                    <button id="popup_coupon{{ $coupondetails->id }}"
                                                                        onclick="collect({{ $coupondetails->id }})"
                                                                        data-id={{ $coupondetails->id }}
                                                                        class="{{$checkUsedExpired==true?'text-d1':''}} collect-view-btn text-blueMediq flex justify-center ml-auto mr-auto collect {{ $collectId != null ? 'text-d1 pointer-events-none' : '' }}">
                                                                        @if ($collectId != null)
                                                                            @lang('labels.coupon.collected')
                                                                        @else
                                                                            @lang('labels.coupon.collect')
                                                                        @endif
                                                                    </button>
                                                                @else
                                                                    <button
                                                                        class="register-btn collect-view-btn text-blueMediq flex justify-center ml-auto mr-auto collect">
                                                                        @lang('labels.coupon.collect')
                                                                    </button>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div
                                class="inner-views by-merchant {{ $selectedSubCategory != 'by-merchant' ? 'hidden' : '' }}">
                                <div class="coupon-results mb-5">
                                    <p class="helvetica-normal me-body26 font-bold text-darkgray">
                                        {{ $merchantTotalCoupon }} @lang('labels.coupon.merchant_coupons')</p>
                                </div>
                                <div class="inner-views-items custom-scrollbar-rounded-gray">
                                    @foreach ($couponList as $key => $value)
                                        <div class="group-merchant custom-scrollbar-rounded-gray">
                                            <div class="for-merchant flex items-center justify-start mb-2 mr-3.5">
                                                <img src="{{ $value->icon }}"
                                                    alt="medicine" class="w-[40px] h-[40px] rounded-[50%] mr-[20px]">
                                                <span
                                                    class="title helvetica-normal me-body20 text-darkgray">{{ $value->name_en }}</span>
                                                <span
                                                    class="coupon-number flex items-center justify-start ml-auto me-body16 text-darkgray">
                                                    <img src="{{ asset('frontend/img/pcs.svg') }}" alt="pcs icon"
                                                        class="w-[20px] h-[24px] mr-2">
                                                    {{ isset($value->coupons) ? count($value->coupons) : '0' }}
                                                    @lang('labels.compare.coupon')
                                                </span>
                                            </div>
                                            @foreach (isset($value->coupons) ? $value->coupons : [] as $key => $coupondetails)
                                                @php
                                                    $customer_id = Auth::guard('customer')->user() != null ? Auth::guard('customer')->user()->id : '';
                                                    $item = App\Models\CouponCollect::where('coupon_id', $coupondetails->id)
                                                        ->where('customer_id', $customer_id)
                                                        ->first();
                                                    $collectId = isset($item->coupon_id) ? 'collected' : '';
                                                    $checkUsedExpired = false;
                                                    if($item!=null) {
                                                        $checkUsedExpired = checkUsedExpiredCoupon($item);
                                                    }else{
                                                        $checkUsedExpired = checkCouponStartAndEndDateExpired($coupondetails);
                                                    }
                                                @endphp
                                                <div component-name="me-coupon-small-card"
                                                    class="small-coupon new-small-coupon" id="new-small-coupon0"
                                                    data-id="#detail-section0">
                                                    <div class="w-full small-coupon--container">
                                                        <div class="relative collect">
                                                            <img src="{{ asset('frontend/img/product-detail-coupon-small.png') }}"
                                                                class="voucher-shape">
                                                            <div class="gccard rounded-[20px] collect">
                                                                <div
                                                                    class="gccard-top bg-no-repeat h-[100px] relative bg-cover gccard-home ">
                                                                        @foreach (config('mediq.coupon_status') as $key => $type)
                                                                            @if ($key == $coupondetails->is_new_or_limited)
                                                                                <div class="label-tag me-body14 helvetica-normal text-darkgray absolute -top-[10px] left-0 {{$coupondetails->is_new_or_limited=="new"?'new':'new-limit'}} px-[10px] py-[4px] rounded-[4px]">{{ lang() == "en"?$type:($type=="New"?'新上架':(lang()=="zh-hk"?"限量領取":"限量领取")) }}</div>
                                                                            @endif
                                                                        @endforeach
                                                                </div>
                                                                <div
                                                                    class="gccard-top bg-no-repeat h-[100px] relative bg-cover gccard-detail hidden">
                                                                    <div
                                                                        class="detail-coupon absolute top-[8px] left-[10px] rounded-[4px] py-[5px] px-[10px] bg-[#F0F9F0] me-green-color {{$coupondetails->is_new_or_limited=="new"?'new':'new-limit'}}">
                                                                        @foreach (config('mediq.coupon_status') as $key => $type)
                                                                            @if ($key == $coupondetails->is_new_or_limited)
                                                                                {{ lang() == "en"?$type:($type=="New"?'新上架':(lang()=="zh-hk"?"限量領取":"限量领取")) }}
                                                                            @endif
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                                <div class="gccard-content text-center">
                                                                    <div class="cclogo-container rounded-full">
                                                                        <img class="cclogo border-mee4 rounded-full w-[72px] h-[72px]"
                                                                            src="{{ isset($coupondetails->merchant)?$coupondetails->merchant->icon:'' }}">
                                                                    </div>
                                                                    <div class="gccard-content-body">
                                                                        <a href="javascript:void(0)"
                                                                            data-id="#detail-section{{ $coupondetails->id }}"
                                                                            class="coupon-see-detail">
                                                                            <p
                                                                                class="company-name text-darkgray cursor-pointer">
                                                                                {{ langbind($coupondetails, 'name') }}
                                                                            </p>
                                                                            </p>
                                                                            <p class="ctitle text-darkgray">
                                                                                {{ langbind($coupondetails, 'sub_title') }}
                                                                            </p>
                                                                            </p>
                                                                        </a>
                                                                        <div
                                                                            class="flex justify-start items-center flex-wrap">
                                                                            <p
                                                                                class="ccategory text-lightgray new-ccategory">
                                                                                <svg width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <path
                                                                                        d="M12.492 11.41C12.4697 11.2871 12.4023 11.1769 12.3028 11.1012C12.2034 11.0255 12.0793 10.9898 11.9548 11.0011C11.8304 11.0124 11.7147 11.0699 11.6305 11.1622C11.5463 11.2545 11.4998 11.3751 11.5 11.5V16.002L11.508 16.092C11.5303 16.2149 11.5977 16.3251 11.6972 16.4008C11.7966 16.4765 11.9207 16.5122 12.0452 16.5009C12.1696 16.4896 12.2853 16.4321 12.3695 16.3398C12.4537 16.2475 12.5002 16.1269 12.5 16.002V11.5L12.492 11.41ZM12.799 9.25C12.799 9.05109 12.72 8.86032 12.5793 8.71967C12.4387 8.57902 12.2479 8.5 12.049 8.5C11.8501 8.5 11.6593 8.57902 11.5187 8.71967C11.378 8.86032 11.299 9.05109 11.299 9.25C11.299 9.44891 11.378 9.63968 11.5187 9.78033C11.6593 9.92098 11.8501 10 12.049 10C12.2479 10 12.4387 9.92098 12.5793 9.78033C12.72 9.63968 12.799 9.44891 12.799 9.25ZM20 12.5C20 10.3783 19.1571 8.34344 17.6569 6.84315C16.1566 5.34285 14.1217 4.5 12 4.5C9.87827 4.5 7.84344 5.34285 6.34315 6.84315C4.84285 8.34344 4 10.3783 4 12.5C4 14.6217 4.84285 16.6566 6.34315 18.1569C7.84344 19.6571 9.87827 20.5 12 20.5C14.1217 20.5 16.1566 19.6571 17.6569 18.1569C19.1571 16.6566 20 14.6217 20 12.5ZM5 12.5C5 11.5807 5.18106 10.6705 5.53284 9.82122C5.88463 8.97194 6.40024 8.20026 7.05025 7.55025C7.70026 6.90024 8.47194 6.38463 9.32122 6.03284C10.1705 5.68106 11.0807 5.5 12 5.5C12.9193 5.5 13.8295 5.68106 14.6788 6.03284C15.5281 6.38463 16.2997 6.90024 16.9497 7.55025C17.5998 8.20026 18.1154 8.97194 18.4672 9.82122C18.8189 10.6705 19 11.5807 19 12.5C19 14.3565 18.2625 16.137 16.9497 17.4497C15.637 18.7625 13.8565 19.5 12 19.5C10.1435 19.5 8.36301 18.7625 7.05025 17.4497C5.7375 16.137 5 14.3565 5 12.5Z"
                                                                                        fill="#7C7C7C"></path>
                                                                                </svg>
                                                                                @if ($coupondetails->usage_time)
                                                                                    {{lang() == "en"?'Once collected, valid for':'領券後需於'}}
                                                                                    {{ $coupondetails->usage_time }} {{lang() == "en"?($coupondetails->usage_time==1?'day':'days'):'日內使用'}}
                                                                                @else
                                                                                    @lang('labels.coupon.offer_expires')
                                                                                    {{ lang() == "en"?date('d M Y', strtotime($coupondetails->end_date)):date('Y年m月d日',strtotime($coupondetails->end_date))}}
                                                                                @endif
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="gccard-content-bottom">
                                                                        @if (Auth::guard('customer')->check())
                                                                            <button
                                                                                id="popup_coupon{{ $coupondetails->id }}"
                                                                                onclick="collect({{ $coupondetails->id }})"
                                                                                data-id={{ $coupondetails->id }}
                                                                                class="{{$checkUsedExpired==true?'text-d1':''}} collect-view-btn text-blueMediq flex justify-center ml-auto mr-auto collect {{ $collectId != null ? 'text-d1 pointer-events-none' : '' }}">
                                                                                {{-- {{ $collectId != null ? 'Collected' : 'Collect' }} --}}
                                                                                @if ($collectId != null)
                                                                                    @lang('labels.coupon.collected')
                                                                                @else
                                                                                    @lang('labels.coupon.collect')
                                                                                @endif
                                                                            </button>
                                                                        @else
                                                                            <button
                                                                                class="register-btn collect-view-btn text-blueMediq flex justify-center ml-auto mr-auto collect">
                                                                                @lang('labels.coupon.collect')
                                                                            </button>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="group-divider"></div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-[200px] relative mx-auto">
                        <div class="detail-arrow notshow">
                            <svg width="12" height="21" viewBox="0 0 12 21" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1.28346 0.577913C0.904551 0.753695 0.732676 1.1951 0.892832 1.58963C0.935801 1.6951 2.16627 2.9451 5.35377 6.11698L9.76002 10.5037L5.35377 14.8865C2.16236 18.0662 0.935801 19.3123 0.892832 19.4178C0.861582 19.4998 0.834238 19.6365 0.834238 19.7224C0.834238 20.2849 1.40455 20.6639 1.90846 20.4295C2.13111 20.324 11.4436 11.0545 11.5413 10.8357C11.635 10.6365 11.635 10.3709 11.5413 10.1717C11.4436 9.95291 2.13111 0.683382 1.90846 0.577913C1.70924 0.484163 1.48268 0.484163 1.28346 0.577913Z"
                                    fill="#333333"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="w-full right-side">
                        @if ($selectedSubCategory != 'by-merchant')
                            @foreach ($couponList as $key => $coupondetails)
                                @php
                                    $customer_id = Auth::guard('customer')->user() != null ? Auth::guard('customer')->user()->id : '';
                                    $item = App\Models\CouponCollect::where('coupon_id', $coupondetails->id)
                                        ->where('customer_id', $customer_id)
                                        ->first();
                                    $collectId = isset($item->coupon_id) ? 'collected' : '';
                                    $checkUsedExpired = false;
                                    $end_date = "";
                                    if($item!=null) {
                                        $checkUsedExpired = checkUsedExpiredCoupon($item);
                                        if($coupondetails->usage_time!=null) {
                                            if(lang() == "en")
                                            {
                                                $end_date = \Carbon\Carbon::parse($item->created_at)->addDays($coupondetails->usage_time)->format('d M Y');
                                            }else{
                                                $end_date = \Carbon\Carbon::parse($item->created_at)->addDays($coupondetails->usage_time)->format('Y年m月d日');
                                            }
                                        }
                                    }else{
                                        $checkUsedExpired = checkCouponStartAndEndDateExpired($coupondetails);
                                    }
                                @endphp
                                <div class="detail-item bg-whitez py-5 rounded-[20px] go-detail-item hidden"
                                    id="detail-section{{ $coupondetails->id }}">
                                    <div class="bg-image mx-auto pb-5 relative">
                                        <div class="">
                                            {{-- <h6 class="coupon-detail-title">@lang('labels.coupon.coupon_details')</h6> --}}
                                        </div>
                                        <div
                                            class="flex flex-wrap xl:flex-nowrap items-center justify-between pt-5 qucollectd">
                                            <div class="relative bg-title flex justify-start items-center">
                                                <div class="quantity-logo-container mr-[12px] relative">
                                                    <img src="{{ isset($coupondetails->merchant)?$coupondetails->merchant->icon:'' }}"
                                                        alt="logo" class="quantity-logo w-[100px] h-[100px]">

                                                        @foreach (config('mediq.coupon_status') as $key => $type)
                                                            @if ($key == $coupondetails->is_new_or_limited)
                                                                <div class="label-tag me-body14 helvetica-normal text-darkgray absolute -top-[10px] left-0 {{$coupondetails->is_new_or_limited=="new"?'new':'new-limit'}} px-[10px] py-[4px] rounded-[4px]">{{ lang() == "en"?$type:($type=="New"?'新上架':(lang()=="zh-hk"?"限量領取":"限量领取")) }}</div>
                                                            @endif
                                                        @endforeach

                                                </div>
                                                <div>
                                                    @if (isset($coupondetails->merchant_id))
                                                        <p
                                                            class="text-left me-body16 text-darkgray helvetica-normal quatitle underline">
                                                            {{ langbind($coupondetails->merchant, 'name') }}</p>
                                                    @endif
                                                    <p
                                                        class="company-name me-body23 font-bold helvetica-normal text-darkgray cursor-pointer">
                                                        {{ langbind($coupondetails, 'name') }}</p>
                                                    <p class="ctitle text-darkgray helvetica-normal me-body16">
                                                        {{ langbind($coupondetails, 'sub_title') }}</p>
                                                    <div class="flex justify-start items-center flex-wrap">
                                                        <p
                                                            class="ccategory text-lightgray new-ccategory me-body16 helvetica-normal">
                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M12.492 11.41C12.4697 11.2871 12.4023 11.1769 12.3028 11.1012C12.2034 11.0255 12.0793 10.9898 11.9548 11.0011C11.8304 11.0124 11.7147 11.0699 11.6305 11.1622C11.5463 11.2545 11.4998 11.3751 11.5 11.5V16.002L11.508 16.092C11.5303 16.2149 11.5977 16.3251 11.6972 16.4008C11.7966 16.4765 11.9207 16.5122 12.0452 16.5009C12.1696 16.4896 12.2853 16.4321 12.3695 16.3398C12.4537 16.2475 12.5002 16.1269 12.5 16.002V11.5L12.492 11.41ZM12.799 9.25C12.799 9.05109 12.72 8.86032 12.5793 8.71967C12.4387 8.57902 12.2479 8.5 12.049 8.5C11.8501 8.5 11.6593 8.57902 11.5187 8.71967C11.378 8.86032 11.299 9.05109 11.299 9.25C11.299 9.44891 11.378 9.63968 11.5187 9.78033C11.6593 9.92098 11.8501 10 12.049 10C12.2479 10 12.4387 9.92098 12.5793 9.78033C12.72 9.63968 12.799 9.44891 12.799 9.25ZM20 12.5C20 10.3783 19.1571 8.34344 17.6569 6.84315C16.1566 5.34285 14.1217 4.5 12 4.5C9.87827 4.5 7.84344 5.34285 6.34315 6.84315C4.84285 8.34344 4 10.3783 4 12.5C4 14.6217 4.84285 16.6566 6.34315 18.1569C7.84344 19.6571 9.87827 20.5 12 20.5C14.1217 20.5 16.1566 19.6571 17.6569 18.1569C19.1571 16.6566 20 14.6217 20 12.5ZM5 12.5C5 11.5807 5.18106 10.6705 5.53284 9.82122C5.88463 8.97194 6.40024 8.20026 7.05025 7.55025C7.70026 6.90024 8.47194 6.38463 9.32122 6.03284C10.1705 5.68106 11.0807 5.5 12 5.5C12.9193 5.5 13.8295 5.68106 14.6788 6.03284C15.5281 6.38463 16.2997 6.90024 16.9497 7.55025C17.5998 8.20026 18.1154 8.97194 18.4672 9.82122C18.8189 10.6705 19 11.5807 19 12.5C19 14.3565 18.2625 16.137 16.9497 17.4497C15.637 18.7625 13.8565 19.5 12 19.5C10.1435 19.5 8.36301 18.7625 7.05025 17.4497C5.7375 16.137 5 14.3565 5 12.5Z"
                                                                    fill="#7C7C7C"></path>
                                                            </svg>
                                                            @if ($coupondetails->usage_time)
                                                                {{lang() == "en"?'Once collected, valid for':'領券後需於'}}
                                                                {{ $coupondetails->usage_time }} {{lang() == "en"?($coupondetails->usage_time==1?'day':'days'):'日內使用'}}
                                                            @else
                                                                @lang('labels.coupon.offer_expires')
                                                                {{ lang() == "en"?date('d M Y', strtotime($coupondetails->end_date)):date('Y年m月d日',strtotime($coupondetails->end_date))}}
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            @if (Auth::guard('customer')->check())
                                                <button id="popup_coupon{{ $coupondetails->id }}"
                                                    onclick="collect({{ $coupondetails->id }})"
                                                    class="{{$checkUsedExpired==true?'text-d1':''}} details-collect-coupon{{ $coupondetails->id }} cp-detail-collect-btn w-[131px] font-secondary font-bold me-body16 inline-block py-[10px] px-5 border border-darkgray text-center hover:bg-blueMediq hover:border-blueMediq hover:text-whitez rounded-full {{ $collectId != null ? 'pointer-events-none' : '' }}">
                                                    {{-- {{ $collectId != null ? 'Collected' : 'Collect' }} --}}
                                                    @if ($collectId != null)
                                                        @lang('labels.coupon.collected')
                                                    @else
                                                        @lang('labels.coupon.collect')
                                                    @endif
                                                </button>
                                            @else
                                                <button id="new-small-coupon0"
                                                    class="details-collect-coupon{{ $coupondetails->id }} register-btn w-[131px] font-secondary font-bold me-body16 inline-block py-[10px] px-5 border border-darkgray text-center hover:bg-blueMediq hover:border-blueMediq hover:text-whitez rounded-full">
                                                    @lang('labels.coupon.collect')
                                                </button>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="mx-auto custom-divider">
                                    </div>
                                    <div class="mx-auto detail-bottom">
                                        <div class="mb-[27px] last:mb-0">
                                            <h6 class="text-darkgray contitle mb-[10px]">@lang('labels.promotion_period')</h6>
                                            <div class="condes text-darkgray">
                                                @if(lang() == "en"){{ date('d M Y', strtotime($coupondetails->start_date)) }}@else {{ date('Y年m月d日', strtotime($coupondetails->start_date))}} @endif - @if(lang() == "en"){{ $end_date!=""?$end_date:date('d M Y', strtotime($coupondetails->end_date)) }}@else {{ $end_date!=""?$end_date:date('Y年m月d日', strtotime($coupondetails->end_date))}}@endif
                                            </div>
                                        </div>
                                        <div class="mb-[27px] last:mb-0">
                                            {{-- <h6 class="text-darkgray contitle mb-[10px]">@lang('labels.coupon.terms_and_conditions')</h6> --}}
                                            <div class="condes text-darkgray">
                                                {!! langbind($coupondetails, 'content') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            @foreach ($couponList as $key => $value)
                                @foreach ($value->coupons as $coupondetails)
                                    @php
                                        $customer_id = Auth::guard('customer')->user() != null ? Auth::guard('customer')->user()->id : '';
                                        $item = App\Models\CouponCollect::where('coupon_id', $coupondetails->id)
                                            ->where('customer_id', $customer_id)
                                            ->first();
                                        $collectId = isset($item->coupon_id) ? 'collected' : '';
                                        $checkUsedExpired = false;
                                        $end_date = "";
                                        if($item!=null) {
                                            $checkUsedExpired = checkUsedExpiredCoupon($item);
                                            if($coupondetails->usage_time!=null) {
                                                if(lang() == "en")
                                                {
                                                    $end_date = \Carbon\Carbon::parse($item->created_at)->addDays($coupondetails->usage_time)->format('d M Y');
                                                }else{
                                                    $end_date = \Carbon\Carbon::parse($item->created_at)->addDays($coupondetails->usage_time)->format('Y年m月d日');
                                                }
                                            }
                                        }else{
                                            $checkUsedExpired = checkCouponStartAndEndDateExpired($coupondetails);
                                        }
                                    @endphp
                                    <div class="detail-item bg-whitez py-5 rounded-[20px] go-detail-item hidden"
                                        id="detail-section{{ $coupondetails->id }}">
                                        <div class="bg-image mx-auto pb-5 relative">
                                            <div class="">
                                                {{-- <h6 class="coupon-detail-title">@lang('labels.coupon.coupon_details')</h6> --}}
                                            </div>
                                            <div
                                                class="flex flex-wrap xl:flex-nowrap items-center justify-between pt-5 qucollectd">
                                                <div class="relative bg-title flex justify-start items-center">
                                                    <div class="quantity-logo-container mr-[12px] relative">
                                                        <img src="{{ isset($coupondetails->merchant)?$coupondetails->merchant->icon:'' }}"
                                                            alt="logo" class="quantity-logo w-[100px] h-[100px]">
                                                            @foreach (config('mediq.coupon_status') as $key => $type)
                                                            @if ($key == $coupondetails->is_new_or_limited)
                                                                <div class="label-tag me-body14 helvetica-normal text-darkgray absolute -top-[10px] left-0 {{$coupondetails->is_new_or_limited=="new"?'new':'new-limit'}} px-[10px] py-[4px] rounded-[4px]">{{ lang() == "en"?$type:($type=="New"?'新上架':(lang()=="zh-hk"?"限量領取":"限量领取")) }}</div>
                                                            @endif
                                                            @endforeach
                                                    </div>
                                                    <div>
                                                        @if (isset($coupondetails->merchant_id))
                                                            <p
                                                                class="text-left me-body16 text-darkgray helvetica-normal quatitle underline">
                                                                {{ langbind($coupondetails->merchant, 'name') }}</p>
                                                        @endif
                                                        <p
                                                            class="company-name me-body23 font-bold helvetica-normal text-darkgray cursor-pointer">
                                                            {{ langbind($coupondetails, 'name') }}</p>
                                                        <p class="ctitle text-darkgray helvetica-normal me-body16">
                                                            {{ langbind($coupondetails, 'sub_title') }}</p>
                                                        <div class="flex justify-start items-center flex-wrap">
                                                            <p
                                                                class="ccategory text-lightgray new-ccategory me-body16 helvetica-normal">
                                                                <svg width="24" height="24"
                                                                    viewBox="0 0 24 24" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M12.492 11.41C12.4697 11.2871 12.4023 11.1769 12.3028 11.1012C12.2034 11.0255 12.0793 10.9898 11.9548 11.0011C11.8304 11.0124 11.7147 11.0699 11.6305 11.1622C11.5463 11.2545 11.4998 11.3751 11.5 11.5V16.002L11.508 16.092C11.5303 16.2149 11.5977 16.3251 11.6972 16.4008C11.7966 16.4765 11.9207 16.5122 12.0452 16.5009C12.1696 16.4896 12.2853 16.4321 12.3695 16.3398C12.4537 16.2475 12.5002 16.1269 12.5 16.002V11.5L12.492 11.41ZM12.799 9.25C12.799 9.05109 12.72 8.86032 12.5793 8.71967C12.4387 8.57902 12.2479 8.5 12.049 8.5C11.8501 8.5 11.6593 8.57902 11.5187 8.71967C11.378 8.86032 11.299 9.05109 11.299 9.25C11.299 9.44891 11.378 9.63968 11.5187 9.78033C11.6593 9.92098 11.8501 10 12.049 10C12.2479 10 12.4387 9.92098 12.5793 9.78033C12.72 9.63968 12.799 9.44891 12.799 9.25ZM20 12.5C20 10.3783 19.1571 8.34344 17.6569 6.84315C16.1566 5.34285 14.1217 4.5 12 4.5C9.87827 4.5 7.84344 5.34285 6.34315 6.84315C4.84285 8.34344 4 10.3783 4 12.5C4 14.6217 4.84285 16.6566 6.34315 18.1569C7.84344 19.6571 9.87827 20.5 12 20.5C14.1217 20.5 16.1566 19.6571 17.6569 18.1569C19.1571 16.6566 20 14.6217 20 12.5ZM5 12.5C5 11.5807 5.18106 10.6705 5.53284 9.82122C5.88463 8.97194 6.40024 8.20026 7.05025 7.55025C7.70026 6.90024 8.47194 6.38463 9.32122 6.03284C10.1705 5.68106 11.0807 5.5 12 5.5C12.9193 5.5 13.8295 5.68106 14.6788 6.03284C15.5281 6.38463 16.2997 6.90024 16.9497 7.55025C17.5998 8.20026 18.1154 8.97194 18.4672 9.82122C18.8189 10.6705 19 11.5807 19 12.5C19 14.3565 18.2625 16.137 16.9497 17.4497C15.637 18.7625 13.8565 19.5 12 19.5C10.1435 19.5 8.36301 18.7625 7.05025 17.4497C5.7375 16.137 5 14.3565 5 12.5Z"
                                                                        fill="#7C7C7C"></path>
                                                                </svg>
                                                                @if ($coupondetails->usage_time)
                                                                    {{lang() == "en"?'Once collected, valid for':'領券後需於'}}
                                                                    {{ $coupondetails->usage_time }} {{lang() == "en"?($coupondetails->usage_time==1?'day':'days'):'日內使用'}}
                                                                @else
                                                                    @lang('labels.coupon.offer_expires')
                                                                    {{ lang() == "en"?date('d M Y', strtotime($coupondetails->end_date)):date('Y年m月d日',strtotime($coupondetails->end_date))}}
                                                                @endif
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if (Auth::guard('customer')->check())
                                                    <button id="popup_coupon{{ $coupondetails->id }}"
                                                        onclick="collect({{ $coupondetails->id }})"
                                                        class="{{$checkUsedExpired==true?'text-d1':''}} details-collect-coupon{{ $coupondetails->id }} cp-detail-collect-btn w-[131px] font-secondary font-bold me-body16 inline-block py-[10px] px-5 border border-darkgray text-center hover:bg-blueMediq hover:border-blueMediq hover:text-whitez rounded-full {{ $collectId != null ? 'pointer-events-none' : '' }}">
                                                        @if ($collectId != null)
                                                            @lang('labels.coupon.collected')
                                                        @else
                                                            @lang('labels.coupon.collect')
                                                        @endif
                                                    </button>
                                                @else
                                                    <button data-id="new-small-coupon0"
                                                        class="details-collect-coupon{{ $coupondetails->id }} register-btn w-[131px] font-secondary font-bold me-body16 inline-block py-[10px] px-5 border border-darkgray text-center hover:bg-blueMediq hover:border-blueMediq hover:text-whitez rounded-full">
                                                        @lang('labels.coupon.collect')
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="mx-auto custom-divider">
                                        </div>
                                        <div class="mx-auto detail-bottom">
                                            <div class="mb-[27px] last:mb-0">
                                                <h6 class="text-darkgray contitle mb-[10px]">@lang('labels.promotion_period')</h6>
                                                <div class="condes text-darkgray">
                                                    @if(lang() == "en"){{ date('d M Y', strtotime($coupondetails->start_date)) }}@else {{ date('Y年m月d日', strtotime($coupondetails->start_date))}} @endif - @if(lang() == "en"){{ $end_date!=""?$end_date:date('d M Y', strtotime($coupondetails->end_date)) }}@else {{ $end_date!=""?$end_date:date('Y年m月d日', strtotime($coupondetails->end_date))}}@endif
                                                </div>
                                            </div>
                                            <div class="mb-[27px] last:mb-0">
                                                {{-- <h6 class="text-darkgray contitle mb-[10px]">@lang('labels.coupon.terms_and_conditions')</h6> --}}
                                                <div class="condes text-darkgray">
                                                    {!! langbind($coupondetails, 'content') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@if (count($couponList) > 0)
        @foreach ($couponList as $key => $coupon)
            @include('frontend.home.coupon_model', ['coupon_type' => 'single_coupon', 'coupon_data_list'=> "true"])
        @endforeach
@endif
<style>
    .inner-views.by-merchant .inner-views-items {
        height: auto;
    }

    .inner-views.by-merchant .group-merchant {
        height: 469px;
        overflow-y: auto;
    }

    .inner-views.by-merchant .group-merchant .for-merchant .title {
        width: 60%;
    }
</style>

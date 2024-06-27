@if (isset($getCoupons) && count($getCoupons) > 0)
    @php
        $customer_id =
            auth()
                ->guard('customer')
                ->user() != null
                ? auth()
                    ->guard('customer')
                    ->user()->id
                : '';
        $collectCoupon = App\Models\CouponCollect::where('customer_id', $customer_id)
            ->whereIn('coupon_id', $getCoupons->pluck('id')->toArray())
            ->count();
        $is_collected = $collectCoupon == $getCoupons->count();
    @endphp
@foreach ($items as $item)
    <div component-name="me-coupon-view-bundle" class="view-bundle-modal {{ $item }}" id="viewbundle{{ $item->id }}">
        <div class="rounded-[20px] view-bundle-modal--container">

            <div class="bg-image w-full">
                <img src="{{ isset($item->merchant) ? $item->merchant->banner_img : asset('frontend/img/getcoupon-bg.png') }}"
                    alt="background image" class="gcbg">
                <button class="white-close-btn absolute top-[25px] right-[45px]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                        <path d="M17.3998 0.613387C17.2765 0.489783 17.1299 0.391719 16.9686 0.324811C16.8073 0.257902 16.6344 0.223462 16.4598 0.223462C16.2852 0.223462 16.1123 0.257902 15.951 0.324811C15.7897 0.391719 15.6432 0.489783 15.5198 0.613387L8.99981 7.12005L2.47981 0.600054C2.35637 0.476611 2.20982 0.378691 2.04853 0.311885C1.88725 0.245078 1.71438 0.210693 1.53981 0.210693C1.36524 0.210693 1.19237 0.245078 1.03109 0.311885C0.8698 0.378691 0.723252 0.476611 0.59981 0.600054C0.476367 0.723496 0.378447 0.870044 0.31164 1.03133C0.244834 1.19261 0.210449 1.36548 0.210449 1.54005C0.210449 1.71463 0.244834 1.88749 0.31164 2.04878C0.378447 2.21006 0.476367 2.35661 0.59981 2.48005L7.11981 9.00005L0.59981 15.5201C0.476367 15.6435 0.378447 15.79 0.31164 15.9513C0.244834 16.1126 0.210449 16.2855 0.210449 16.4601C0.210449 16.6346 0.244834 16.8075 0.31164 16.9688C0.378447 17.1301 0.476367 17.2766 0.59981 17.4001C0.723252 17.5235 0.8698 17.6214 1.03109 17.6882C1.19237 17.755 1.36524 17.7894 1.53981 17.7894C1.71438 17.7894 1.88725 17.755 2.04853 17.6882C2.20982 17.6214 2.35637 17.5235 2.47981 17.4001L8.99981 10.8801L15.5198 17.4001C15.6433 17.5235 15.7898 17.6214 15.9511 17.6882C16.1124 17.755 16.2852 17.7894 16.4598 17.7894C16.6344 17.7894 16.8072 17.755 16.9685 17.6882C17.1298 17.6214 17.2764 17.5235 17.3998 17.4001C17.5233 17.2766 17.6212 17.1301 17.688 16.9688C17.7548 16.8075 17.7892 16.6346 17.7892 16.4601C17.7892 16.2855 17.7548 16.1126 17.688 15.9513C17.6212 15.79 17.5233 15.6435 17.3998 15.5201L10.8798 9.00005L17.3998 2.48005C17.9065 1.97339 17.9065 1.12005 17.3998 0.613387Z" fill="#333333"></path>
                    </svg>
                </button>
                <div class="bg-whitez pt-[70px] relative bg-title px-[40px]">
                    <div class="quantity-logo-container">
                        <img src="{{ isset($item->merchant) ? $item->merchant->icon : asset('frontend/img/quantity-logo.png') }}"
                            alt="logo" class="quantity-logo w-[100px] h-[100px]" />
                    </div>
                    <!-- <p class="text-center quatitle">Medtimes Medical Group</p> -->
                    @php
                        $url = "";
                        if(isset($item)) {
                            $url = app()->getLocale()."/products?pb=".$item->merchant->id."&tf=recommend&view=list-view&page=1";
                        }
                    @endphp
                    <a class="quatitle" href="{{url($url)}}">{{ isset($item->merchant) ? langbind($item->merchant, 'name') : '' }}</a>
                    <div class="flex items-center justify-between py-[20px] quhealth">
                        <p class="flex items-center justify-start quades">
                            <img src="{{ asset('frontend/img/pcs.svg') }}" alt="pcs" class="black-gift mr-[12px]">
                            @if(app()->getLocale()!='en')共 @endif{{ count($getCoupons) }} @if(count($getCoupons)>1)@lang('labels.compare.coupons')@else @lang('labels.compare.coupon') @endif
                        </p>
                        <button data-id="viewbundle{{ $item->id }}" {{ $is_collected == true ? 'disabled' : '' }}
                            class="{{ $is_collected == true ? 'pointer-events-none' : '' }} {{ !auth()->guard('customer')->check()? 'collect-login': 'qua-collect-all-btn' }} font-secondary font-bold me-body16 inline-block py-[10px] px-5 border border-darkgray text-center hover:bg-blueMediq hover:border-blueMediq hover:text-whitez rounded-full"
                            onclick="collect({{ $item->id }},{{ isset($item->id) ? $item->merchant_id : '' }}, 'all_check')">
                            @lang('labels.coupon.collect_all')
                        </button>
                        <!-- for login -->
                        <!-- <button
                class="collect-login font-secondary font-bold me-body16 inline-block py-[10px] px-5 border border-darkgray text-center hover:bg-blueMediq hover:border-blueMediq hover:text-whitez rounded-full hidden">Collect
                All</button> -->
                        <!-- end for login -->
                    </div>
                </div>
            </div>
            <div class="custom-divider">
            </div>
            <div class="cscard-container">
                @foreach ($getCoupons as $key => $coupon)
                    @php
                        $couponId = App\Models\CouponCollect::where('coupon_id', $coupon->id)
                            ->where('customer_id', $customer_id)
                            ->orderBy("id","DESC")
                            ->first();
                        $collectId = isset($couponId->coupon_id) ? 'collected' : 'collect';
                        $checkUsedExpired = false;
                        if($couponId!=null) {
                            $checkUsedExpired = checkUsedExpiredCoupon($couponId);
                        }else{
                            $checkUsedExpired = checkCouponStartAndEndDateExpired($coupon);
                        }
                    @endphp
                    <div component-name="me-coupon-new-small-card" class="small-coupon new-small-coupon {{$checkUsedExpired==true?' text-d1':''}}"
                        id="new-small-coupon{{ $coupon->id }}">
                        <div class="w-full small-coupon--container">
                            <div class="relative collect_coupon{{ $coupon->id }} {{ $collectId }}">
                                <!-- <img src="{{ asset('frontend/img/coupon-small.png') }}" class="voucher-shape" /> -->
                                <div
                                    class="custom-voucher-shape gccard rounded-[20px] collect_coupon{{ $coupon->id }} {{ $collectId }}">
                                    <div class="gccard-top bg-no-repeat h-[100px] relative bg-cover gccard-home ">
                                        @if ($coupon->is_new_or_limited != null)
                                            <div class="label-tag rounded-[4px] absolute top-0 left-0 new">
                                                @foreach (config('mediq.coupon_status') as $key => $type)
                                                    @if ($key == $coupon->is_new_or_limited)
                                                        {{ $type }}
                                                    @endif
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                    <div
                                        class="gccard-top bg-no-repeat h-[100px] relative bg-cover gccard-detail hidden">
                                        @if ($coupon->is_new_or_limited != null)
                                            <div
                                                class="detail-coupon absolute top-[8px] left-[10px] rounded-[4px] py-[5px] px-[10px] bg-[#F0F9F0] me-green-color new">
                                                @foreach (config('mediq.coupon_status') as $key => $type)
                                                    @if ($key == $coupon->is_new_or_limited)
                                                        {{ $type }}
                                                    @endif
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                    <div class="gccard-content text-center">
                                        <div data-mainid="{{ $item->id }}"
                                            data-id="collect-detail-modal-back{{ $coupon->id }}"
                                            class="cclogo-container show-detail-popup">
                                            <div class="rounded-full">
                                                <img class="cclogo border-mee4 rounded-full w-[72px] h-[72px]"
                                                    src="{{ isset($item->merchant) ? $item->merchant->icon : asset('frontend/img/quantity-logo.png') }}" />
                                            </div>
                                        </div>
                                        <div data-mainid="{{ $item->id }}"
                                            data-id="collect-detail-modal-back{{ $coupon->id }}"
                                            class="gccard-content-body {{ !auth()->guard('customer')->check()? 'is_login': '' }} show-detail-popup">
                                            <p data-mainid="{{ $item->id }}"
                                                data-id="collect-detail-modal-back{{ $coupon->id }}"
                                                class="company-name text-darkgray cursor-pointer">
                                                {{ langbind($coupon, 'name') }}</p>
                                            <p class="ctitle text-darkgray">{{ langbind($coupon, 'sub_title') }}</p>
                                            <div class="flex justify-start items-center flex-wrap">
                                                <p class="ccategory text-lightgray new-ccategory"><svg width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M12.492 11.41C12.4697 11.2871 12.4023 11.1769 12.3028 11.1012C12.2034 11.0255 12.0793 10.9898 11.9548 11.0011C11.8304 11.0124 11.7147 11.0699 11.6305 11.1622C11.5463 11.2545 11.4998 11.3751 11.5 11.5V16.002L11.508 16.092C11.5303 16.2149 11.5977 16.3251 11.6972 16.4008C11.7966 16.4765 11.9207 16.5122 12.0452 16.5009C12.1696 16.4896 12.2853 16.4321 12.3695 16.3398C12.4537 16.2475 12.5002 16.1269 12.5 16.002V11.5L12.492 11.41ZM12.799 9.25C12.799 9.05109 12.72 8.86032 12.5793 8.71967C12.4387 8.57902 12.2479 8.5 12.049 8.5C11.8501 8.5 11.6593 8.57902 11.5187 8.71967C11.378 8.86032 11.299 9.05109 11.299 9.25C11.299 9.44891 11.378 9.63968 11.5187 9.78033C11.6593 9.92098 11.8501 10 12.049 10C12.2479 10 12.4387 9.92098 12.5793 9.78033C12.72 9.63968 12.799 9.44891 12.799 9.25ZM20 12.5C20 10.3783 19.1571 8.34344 17.6569 6.84315C16.1566 5.34285 14.1217 4.5 12 4.5C9.87827 4.5 7.84344 5.34285 6.34315 6.84315C4.84285 8.34344 4 10.3783 4 12.5C4 14.6217 4.84285 16.6566 6.34315 18.1569C7.84344 19.6571 9.87827 20.5 12 20.5C14.1217 20.5 16.1566 19.6571 17.6569 18.1569C19.1571 16.6566 20 14.6217 20 12.5ZM5 12.5C5 11.5807 5.18106 10.6705 5.53284 9.82122C5.88463 8.97194 6.40024 8.20026 7.05025 7.55025C7.70026 6.90024 8.47194 6.38463 9.32122 6.03284C10.1705 5.68106 11.0807 5.5 12 5.5C12.9193 5.5 13.8295 5.68106 14.6788 6.03284C15.5281 6.38463 16.2997 6.90024 16.9497 7.55025C17.5998 8.20026 18.1154 8.97194 18.4672 9.82122C18.8189 10.6705 19 11.5807 19 12.5C19 14.3565 18.2625 16.137 16.9497 17.4497C15.637 18.7625 13.8565 19.5 12 19.5C10.1435 19.5 8.36301 18.7625 7.05025 17.4497C5.7375 16.137 5 14.3565 5 12.5Z"
                                                            fill="#7C7C7C" />
                                                    </svg>
                                                    @if ($coupon->usage_time)
                                                        Once collected, valid for {{ $coupon->usage_time }} days
                                                    @else
                                                        @lang('labels.coupon.offer_expires')
                                                        {{ date('d M Y', strtotime($coupon->end_date)) }}
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                        @if (auth()->guard('customer')->check())
                                            <div data-mainid="{{ $item->id }}"
                                                data-id="collect-detail-modal-back{{ $coupon->id }}"
                                                class="gccard-content-bottom show-detail-popup">
                                                <div class="gccard-content-bottom-content relative h-[90%] w-full">
                                                    <button data-id="small-coupon{{ $coupon->id }}"
                                                        class="clt-button absolute top-1/2 w-full text-center -translate-y-1/2 collect-view-btn text-blueMediq flex justify-center ml-auto mr-auto collect
                                                        {{$checkUsedExpired==true?' click-disable text-d1':''}}"
                                                        onclick="collect({{ $coupon->id }})">@lang('labels.coupon.collect')</button>
                                                    <button
                                                        class="clt-button absolute top-1/2 w-full text-center -translate-y-1/2 collect-view-btn text-d1 flex justify-center ml-auto mr-auto collected">@lang('labels.coupon.collected')</button>
                                                </div>
                                            </div>
                                        @else
                                            <!-- add condition for login popup -->
                                            <div class="gccard-content-bottom-content login">
                                                <button
                                                    class="collect-view-btn text-blueMediq flex justify-center ml-auto mr-auto collect-login">@lang('labels.coupon.collect')</button>
                                            </div>
                                            <!-- end add condition for login popup -->
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endforeach
    @foreach ($getCoupons as $key => $coupon)
        @php $mcId = $item->id; @endphp
        @include('frontend.home.coupon_model', ['coupon_type' => 'bundle_coupon'])
    @endforeach
@endif

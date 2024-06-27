@php
    $c_type = $coupon_type == 'bundle_coupon' ? true : false;
    $customer_id =
        auth()
            ->guard('customer')
            ->user() != null
            ? auth()
                ->guard('customer')
                ->user()->id
            : '';
    $item = App\Models\CouponCollect::where('coupon_id', $coupon->id)
        ->where('customer_id', $customer_id)
        ->first();
    $collectId = isset($item->coupon_id) ? 'collected' : '';
@endphp

@if ($c_type == true)
    <div component-name="me-coupon-collect-detail-back" class="collect-detail-modal collect-detail-modal-back"
        id="collect-detail-modal-back{{ $coupon->id }}">
    @else
    <div component-name="me-coupon-collect-detail" class="collect-detail-modal {{isset($coupon_data_list)?'mobile-coupon-list':''}}"
            id="{{isset($coupon_data_list)?"detail-section".$coupon->id:"collect-detail-modal".$coupon->id }}">
@endif
<div class="rounded-[20px] view-bundle-modal--container">
    <div class="bg-image w-full px-[40px] pt-[30px] pb-[20px] relative">
        <div class="flex justify-between">
        @if ($c_type == true)
            <button data-id="{{ $mcId }}" class="detail-back-btn">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 8L12 16L20 24" stroke="#333333" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
            @else
            {{-- <button data-id="{{ $coupon->id }}" class="detail-back-btn">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 8L12 16L20 24" stroke="#333333" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button> --}}
        @endif
        <div class="">
            {{-- <h6 class="coupon-detail-title">@lang('labels.coupon.coupon_details')</h6> --}}
        </div>
        <button class="cdmodal-close cursor-pointer"> 
            <img src="{{asset('frontend/img/custom-close.svg')}}" alt="close image"/>
        </button>

        
        </div>
        <div class="flex flex-wrap sm:flex-nowrap items-center justify-between py-[10px] qucollectd">
            <div class="relative bg-title flex justify-start items-center">
                <div class="quantity-logo-container mr-[12px] relative rounded-full">

                    <img src="{{ isset($coupon->merchant) ? $coupon->merchant->icon : (isset($coupon->icon) ? $coupon->icon : asset('frontend/img/quantity-logo.png')) }}"
                        alt="logo" class="rounded-full quantity-logo w-[100px] h-[100px]" />
                    @if ($coupon->is_new_or_limited != null)
                        @foreach (config('mediq.coupon_status') as $key => $type)
                        @if ($key == $coupon->is_new_or_limited)
                        <div class="label-tag absolute top-0 left-0 {{$coupon->is_new_or_limited=="new"?'new':'new-limit'}} px-[10px] py-[4px] rounded-[4px]">
                                    {{ $type }}
                        </div>
                        @endif
                        @endforeach
                    @endif
                </div>
                <div>
                    @if (isset($coupon->merchant_id))
                        @php
                            $url = "";
                            if(isset($coupon->merchant_id)) {
                                $url = app()->getLocale()."/products?pb=".$coupon->merchant->id."&tf=recommend&view=list-view&page=1";
                            }
                        @endphp
                        <a href="{{$url}}" class="text-center quatitle underline">{{ langbind($coupon->merchant, 'name') }}</a>
                    @endif
                    <p data-id="collect-detail-modal`+i+`" class="company-name text-darkgray cursor-pointer">
                        {{ langbind($coupon, 'name') }}
                    </p>
                    {{-- <p class="ctitle text-darkgray"> {{ langbind($coupon, 'sub_title') }}</p>
                    <div class="flex justify-start items-center flex-wrap">
                        <p class="ccategory text-lightgray new-ccategory flex items-center">
                            <div class="mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
                                <path d="M8.492 7.41C8.46974 7.28705 8.40225 7.1769 8.30283 7.10122C8.20341 7.02554 8.07926 6.98983 7.95482 7.00112C7.83039 7.01241 7.71469 7.06988 7.63051 7.16222C7.54633 7.25455 7.49977 7.37505 7.5 7.5V12.002L7.508 12.092C7.53026 12.2149 7.59775 12.3251 7.69717 12.4008C7.79659 12.4765 7.92074 12.5122 8.04518 12.5009C8.16961 12.4896 8.28531 12.4321 8.36949 12.3398C8.45367 12.2475 8.50023 12.1269 8.5 12.002V7.5L8.492 7.41ZM8.799 5.25C8.799 5.05109 8.71998 4.86032 8.57933 4.71967C8.43868 4.57902 8.24791 4.5 8.049 4.5C7.85009 4.5 7.65932 4.57902 7.51867 4.71967C7.37802 4.86032 7.299 5.05109 7.299 5.25C7.299 5.44891 7.37802 5.63968 7.51867 5.78033C7.65932 5.92098 7.85009 6 8.049 6C8.24791 6 8.43868 5.92098 8.57933 5.78033C8.71998 5.63968 8.799 5.44891 8.799 5.25ZM16 8.5C16 6.37827 15.1571 4.34344 13.6569 2.84315C12.1566 1.34285 10.1217 0.5 8 0.5C5.87827 0.5 3.84344 1.34285 2.34315 2.84315C0.842855 4.34344 0 6.37827 0 8.5C0 10.6217 0.842855 12.6566 2.34315 14.1569C3.84344 15.6571 5.87827 16.5 8 16.5C10.1217 16.5 12.1566 15.6571 13.6569 14.1569C15.1571 12.6566 16 10.6217 16 8.5ZM1 8.5C1 7.58075 1.18106 6.6705 1.53284 5.82122C1.88463 4.97194 2.40024 4.20026 3.05025 3.55025C3.70026 2.90024 4.47194 2.38463 5.32122 2.03284C6.1705 1.68106 7.08075 1.5 8 1.5C8.91925 1.5 9.8295 1.68106 10.6788 2.03284C11.5281 2.38463 12.2997 2.90024 12.9497 3.55025C13.5998 4.20026 14.1154 4.97194 14.4672 5.82122C14.8189 6.6705 15 7.58075 15 8.5C15 10.3565 14.2625 12.137 12.9497 13.4497C11.637 14.7625 9.85652 15.5 8 15.5C6.14348 15.5 4.36301 14.7625 3.05025 13.4497C1.7375 12.137 1 10.3565 1 8.5Z" fill="#7C7C7C"/>
                            </svg>
                            </div>
                            @if ($coupon->usage_time)
                                Once collected, valid for {{ $coupon->usage_time }} days
                            @else
                                @lang('labels.coupon.offer_expires') {{ date('d M Y', strtotime($coupon->end_date)) }}
                            @endif
                        </p>
                    </div> --}}
                </div>
            </div>
            @if (auth()->guard('customer')->check())
                <button id="popup_coupon{{ $coupon->id }}" onclick="collect({{ $coupon->id }})"
                    class="{{$coupon->end_date < date("Y-m-d")?'click-disable':''}} qua-collect-btn w-[131px] font-secondary font-bold me-body16 inline-block py-[10px] px-5 border border-darkgray text-center hover:bg-blueMediq hover:border-blueMediq hover:text-whitez rounded-full {{ $collectId != null ? 'pointer-events-none' : '' }}">
                    {{-- {{ $collectId != null ? 'Collected' : 'Collect' }} --}}
                    @if ($collectId != null)
                        @lang('labels.coupon.collected')
                    @else
                        @lang('labels.coupon.collect')
                    @endif
                </button>
            @else
                <button
                    class="register-btn w-[131px] font-secondary font-bold me-body16 inline-block py-[10px] px-5 border border-darkgray text-center hover:bg-blueMediq hover:border-blueMediq hover:text-whitez rounded-full">
                    @lang('labels.coupon.collect')</button>
            @endif
        </div>
    </div>
    <div class="custom-divider">
    </div>
    <div class="cscard-container">
        <div class="mb-[27px] last:mb-0">
            <h6 class="text-darkgray contitle mb-[10px]">@lang('labels.promotion_period')</h6>
            <div class="condes text-darkgray">
                @php
                $customer_id = Auth::guard('customer')->user() != null ? Auth::guard('customer')->user()->id : '';
                $item = App\Models\CouponCollect::where('coupon_id', $coupon->id)
                    ->where('customer_id', $customer_id)
                    ->first();
                $end_date = "";
                if($item!=null) {
                    if($coupon->usage_time!=null) {
                        if(lang() == "en")
                        {
                            $end_date = \Carbon\Carbon::parse($item->created_at)->addDays($coupon->usage_time)->format('d M Y');
                        }else{
                            $end_date = \Carbon\Carbon::parse($item->created_at)->addDays($coupon->usage_time)->format('Y年m月d日');
                        }
                    }
                }
            @endphp
            @if(lang() == "en"){{ date('d M Y', strtotime($coupon->start_date)) }}@else {{ date('Y年m月d日', strtotime($coupon->start_date))}} @endif - @if(lang() == "en"){{ $end_date!=""?$end_date:date('d M Y', strtotime($coupon->end_date)) }}@else {{ $end_date!=""?$end_date:date('Y年m月d日', strtotime($coupon->end_date))}}@endif
            </div>
        </div>
        <div class="mb-[27px] last:mb-0">
            {{-- <h6 class="text-darkgray contitle mb-[10px]">@lang('labels.coupon.terms_and_conditions')</h6> --}}
            <div class="condes text-darkgray">
                {!! langbind($coupon, 'content') !!}
            </div>
        </div>
    </div>
</div>
</div>

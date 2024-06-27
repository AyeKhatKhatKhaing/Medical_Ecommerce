@extends('frontend.layouts.master')
@include('frontend.seo',['seo' => isset($product) ? $product : ''])
@section('content')
    <main>
        <section class="overview" id="overview">
            <div component-name="me-product-detail-menu-tab" class="me-product-detail-menu-tab w-full z-[4] hidden">
                <ul class="pd-menu-tab-container flex justify-start items-center bg-white">
                    <li class="active"><button data-id="overview"
                            class="pd-menu-tab--item py-[14px] px-[20px] helvetica-normal me-body18 text-darkgray">@lang('labels.product_detail.overview')</button>
                    </li>
                    <li><button data-id="plan-option"
                            class="pd-menu-tab--item py-[14px] px-[20px] helvetica-normal me-body18 text-darkgray">@lang('labels.product_detail.plan_option')</button>
                    </li>
                    <li><button data-id="plan-detail"
                            class="pd-menu-tab--item py-[14px] px-[20px] helvetica-normal me-body18 text-darkgray">@lang('labels.product_detail.plan_detail')</button>
                    </li>
                    <li><button data-id="location"
                            class="pd-menu-tab--item py-[14px] px-[20px] helvetica-normal me-body18 text-darkgray">@lang('labels.product_detail.location')</button>
                    </li>
                    <!-- <li><button data-id="reviews" class="pd-menu-tab--item py-[14px] px-[20px] helvetica-normal me-body18 text-darkgray">Reviews</button></li> -->
                    <li><button data-id="faq"
                            class="pd-menu-tab--item py-[14px] px-[20px] helvetica-normal me-body18 text-darkgray">@lang('labels.product_detail.faq')</button>
                    </li>
                </ul>
            </div>
            <div component-name="me-product-detail-breadcrumb"
                class="me-product-detail-breadcrumb whole-container py-[28px]">
                <ul class="flex flex-wrap justify-start items-center mpd-breadcrumb">

                    <li class="helvetica-normal font-normal me-body14 text-darkgray"><a href="{{route('mediq')}}">@lang('labels.home')</a></li>
                    @php
                    $cate = [];
                    foreach($product->category->subCategory as $key => $subCate){
                        $zkey = $key == 0 ? '?pc=' : '';
                        $cate[$key] = $zkey.$subCate->id.'%2C';
                    }
                    @endphp
                    <li class="helvetica-normal font-normal me-body14 text-darkgray">
                    <a href="{{langlink('products'.implode('',$cate))}}"> {{ $product->category != null ? langbind($product->category, 'name') : '' }} </a></li>

                    <li class="helvetica-normal font-normal me-body14 text-darkgray">
                        <a href="{{langlink('products?pc='. $product->subCategory->id)}}">{{ $product->subCategory != null ? langbind($product->subCategory, 'name') : '' }}</a></li>

                    <li class="helvetica-normal font-normal me-body14 text-darkgray">{{ langbind($product, 'name') }}</li>

                </ul>
            </div>
            <div component-name="me-overview" class="me-overview">
                <div class="plan-option-container text-darkgray pt-3.5 pb-8 md:flex justify-between">
                    <div
                        class="plan-option-content w-full mr-4 md:max-w-[64%] 2xl:max-w-[50rem] 3xl:max-w-[53rem] 4xl:max-w-[58.25rem] 7xl:max-w-[71.25rem] 4xl:mr-10">


                        <div component-name="me-overview-header">
                            @php
                                $merchant_name = explode(' ', $product->merchant->name_en);
                            @endphp
                            <a href="{{langlink('products?pb='.$product->merchant->id)}}" class="helvetica-normal me-body16 underline text-darkgray merchant-name">
                                @if (lang() == 'en')
                                    {{ count($merchant_name) > 1 ? $merchant_name[0] . ' ' . $merchant_name[1] : $merchant_name[0] }}
                                @else
                                    {{ langbind($product->merchant, 'name') }}
                                @endif
                            </a>
                            <h2 class="helvetica-normal me-head32 font-bold text-darkgray leading-[1.25] merchant-title">{{ langbind($product, 'name') }}
                            </h2>
                            @php 
                            if(count($product->productsVariations) > 0 && $product->productsVariations[0]->sku != null){
                                $pro = getLowestPrice($product);
                            }else{
                                $pro = $product;
                            }
                            @endphp 
                            @if (isset($pro->number_of_dose))
                                <p class="me-body18 font-bold text-darkgray helvetica-normal mb-[6px] items-number">
                                    {{ $pro->number_of_dose }} {{ $pro->number_of_dose == 1 ? __('labels.product_detail.item') : __('labels.product_detail.items') }}
                                </p>
                            @endif
                            <div class="flex flex-wrap lg:flex-nowrap justify-start items-center star-location">
                                {{-- <a href="#"
                                    class="helvetica-normal me-body16 underline text-darkgray ml-[8px] mr-[23px]">See all 52
                                    reviews</a> --}}
                                <div class="flex items-center locations">
                                    <img src="{{ asset('frontend/img/me-hlocation-icon.svg') }}" alt="location icon" />
                                    <p class="helvetica-normal text-darkgray me-body16 pl-1">
                                        @if (isset($product->merchant) && count($product->merchant->merchantLocations) > 0)
                                            @foreach ($product->merchant->merchantLocations as $location)
                                                {{ langbind($location->area, 'name') }} {{ !$loop->last ? '|' : '' }}
                                            @endforeach
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="image-gallery">
                            @include('frontend.product_details.gallery')
                        </div>

                        <div component-name="me-overview-footer" class="me-overview-footer">
                            <ul>
                                @if(count(productTagVal($product)) > 0)

                                <li class="flex items-start justify-between mb-5 md:mb-[40px] of-items ">
                                    <div class="w-[15%] helvetica-normal me-body20 font-bold text-darkgray of-items-title">
                                        @lang('labels.product_detail.tag')
                                    </div>
                                    <div class="w-[85%] of-items-content ">
                                        <div class="flex items-center justify-start flex-wrap">

                                            @if (isset($product->number_of_dose))
                                                <p
                                                    class="label-item bg-tagbg py-1 px-[10px] rounded-[50px] text-darkgray font-normal helvetica-normal me-body16 text-center">
                                                    {{ $product->number_of_dose }}
                                                    {{ $product->number_of_dose == 1 ? __('labels.product_detail.item') : __('labels.product_detail.items') }}</p>
                                            @endif
                                            @if (count(productTagVal($product)) > 0)
                                                @foreach (productTagVal($product) as $key => $tag)
                                                    <p
                                                        class="label-item bg-tagbg py-1 px-[10px] rounded-[50px] text-darkgray font-normal helvetica-normal me-body16 text-center">
                                                        {{ langbind($tag, 'name') }}</p>
                                                @endforeach
                                            @endif

                                        </div>
                                    </div>
                                    <div class="w-[85%] of-items-content hidden">


                                    </div>
                                    <div class="w-[85%] of-items-content hidden">
                                        <div class="flex items-center justify-start flex-wrap">

                                        </div>
                                    </div>
                                    <div class="relative w-[85%] of-items-content hidden">
                                        <div class="product-detail-coupon max-w-[940px]">

                                        </div>
                                    </div>
                                </li>
                                @endif
                                
                                @if(isset($product->for_tag_en))
                                <li class="flex items-start justify-between mb-5 md:mb-[40px] of-items ">
                                    <div class="w-[15%] helvetica-normal me-body20 font-bold text-darkgray of-items-title">
                                        @lang('labels.product_detail.for')
                                    </div>
                                    <div class="w-[85%] of-items-content hidden">
                                        <div class="flex items-center justify-start flex-wrap">


                                        </div>
                                    </div>
                                    <div class="w-[85%] of-items-content pl-[0.5rem] ">
                                        {!! langbind($product, 'for_tag') !!}
                                    </div>
                                    <div class="w-[85%] of-items-content hidden">
                                        <div class="flex items-center justify-start flex-wrap">

                                        </div>
                                    </div>
                                    <div class="relative w-[85%] of-items-content hidden">
                                        <div class="product-detail-coupon max-w-[940px]">

                                        </div>
                                    </div>
                                </li>
                                @endif
                                @if(count($product->key_item_tag_data_arr) > 0)
                                <li class="flex items-start justify-between mb-5 md:mb-[40px] of-items ">
                                    <div class="w-[15%] helvetica-normal me-body20 font-bold text-darkgray of-items-title">
                                        @lang('labels.product_detail.key_items')
                                    </div>
                                    <div class="w-[85%] of-items-content hidden">
                                        <div class="flex items-center justify-start flex-wrap">


                                        </div>
                                    </div>
                                    <div class="w-[85%] of-items-content ">

                                        <div class="flex items-baseline relative ">
                                            <p class="helvetica-normal me-body18 text-darkgray">
                                                @foreach ($product->key_item_tag_data_arr as $group)
                                                    {{ langbind($group, 'name') }}{{ !$loop->last ? ',' : '' }}
                                                @endforeach
                                            </p>
                                        </div>


                                    </div>
                                    <div class="w-[85%] of-items-content hidden">
                                        <div class="flex items-center justify-start flex-wrap">

                                        </div>
                                    </div>
                                    <div class="relative w-[85%] of-items-content hidden">
                                        <div class="product-detail-coupon max-w-[940px]">

                                        </div>
                                    </div>
                                </li>
                                @endif
                                @if (count(getTotalCoupon($product->id, $product->category_id, $product->sub_category_id)) > 0)
                                <li class="flex items-start justify-between mb-5 md:mb-[40px] of-items ">
                                    <div class="w-[15%] helvetica-normal me-body20 font-bold text-darkgray of-items-title">
                                        @lang('labels.menu.coupon')
                                    </div>
                                    <div class="w-[85%] of-items-content hidden">
                                        <div class="flex items-center justify-start flex-wrap">


                                        </div>
                                    </div>
                                    <div class="w-[85%] of-items-content hidden">


                                    </div>
                                    <div class="w-[85%] of-items-content pl-[0.5rem] hidden">
                                        <div class="flex items-center justify-start flex-wrap">

                                        </div>
                                    </div>
                                    <div class="relative w-[85%] of-items-content ">
                                        <div class="product-detail-coupon max-w-[900px] lg:max-w-[880px] 6xl:max-w-[900px]">
                                        @foreach (getTotalCoupon($product->id, $product->category_id, $product->sub_category_id) as $coupon)
                                            @php
                                                $customer_id = Auth::guard('customer')->user() != null ? Auth::guard('customer')->user()->id : '';
                                                $couponCollect = App\Models\CouponCollect::where('customer_id', $customer_id)
                                                                ->where('coupon_id', $coupon->id)
                                                                ->orderBy("id","DESC")
                                                                ->first();
                                                $collectId = isset($couponCollect->coupon_id) ? 'collected' : 'collect';
                                                $checkUsedExpired = false;
                                                if($couponCollect!=null) {
                                                    $checkUsedExpired = checkUsedExpiredCoupon($couponCollect);
                                                }else{
                                                    $checkUsedExpired = checkCouponStartAndEndDateExpired($coupon);
                                                }
                                            @endphp
                                            <div component-name="me-coupon-new-small-card"
                                                class="small-coupon new-small-coupon"
                                                id="new-small-coupon{{ $coupon->id }}">
                                                <div class="w-full small-coupon--container">
                                                    <div class="relative collect_coupon{{ $coupon->id }} {{ $collectId }}">
                                                        <div
                                                            class="custom-voucher-shape gccard rounded-[20px] collect_coupon{{ $coupon->id }} {{ $collectId }}">
                                                            <div
                                                                class="gccard-top bg-no-repeat h-[100px] relative bg-cover gccard-home ">
                                                                @if ($coupon->is_new_or_limited != null)
                                                                    @foreach (config('mediq.coupon_status') as $key => $type)
                                                                    @if ($key == $coupon->is_new_or_limited)
                                                                    <div
                                                                        class="label-tag rounded-[4px] absolute top-0 left-0 new">
                                                                                {{ $type }}      
                                                                    </div>
                                                                    @endif
                                                                    @endforeach
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
                                                                <div data-mainid="{{ $coupon->id }}"
                                                                    data-id="collect-detail-modal{{ $coupon->id }}"
                                                                    class="cclogo-container show-detail-popup">
                                                                    <div class="rounded-full">
                                                                        <img class="cclogo border-mee4 rounded-full w-[72px] h-[72px]"
                                                                            src="{{ isset($coupon->merchant) ? $coupon->merchant->icon : $coupon->icon }}" />
                                                                    </div>
                                                                </div>
                                                                <div data-mainid="{{ $coupon->id }}"
                                                                    data-id="collect-detail-modal{{ $coupon->id }}"
                                                                    class="gccard-content-body show-detail-popup">
                                                                    <p data-mainid="{{ $coupon->id }}"
                                                                        data-id="collect-detail-modal{{ $coupon->id }}"
                                                                        class="company-name text-darkgray cursor-pointer">
                                                                        {{ langbind($coupon, 'name') }}</p>
                                                                    <p class="ctitle text-darkgray">
                                                                        {{ langbind($coupon, 'sub_title') }}</p>
                                                                    <div
                                                                        class="flex justify-start items-center flex-wrap">
                                                                        <p
                                                                            class="ccategory text-lightgray new-ccategory">
                                                                            <svg width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M12.492 11.41C12.4697 11.2871 12.4023 11.1769 12.3028 11.1012C12.2034 11.0255 12.0793 10.9898 11.9548 11.0011C11.8304 11.0124 11.7147 11.0699 11.6305 11.1622C11.5463 11.2545 11.4998 11.3751 11.5 11.5V16.002L11.508 16.092C11.5303 16.2149 11.5977 16.3251 11.6972 16.4008C11.7966 16.4765 11.9207 16.5122 12.0452 16.5009C12.1696 16.4896 12.2853 16.4321 12.3695 16.3398C12.4537 16.2475 12.5002 16.1269 12.5 16.002V11.5L12.492 11.41ZM12.799 9.25C12.799 9.05109 12.72 8.86032 12.5793 8.71967C12.4387 8.57902 12.2479 8.5 12.049 8.5C11.8501 8.5 11.6593 8.57902 11.5187 8.71967C11.378 8.86032 11.299 9.05109 11.299 9.25C11.299 9.44891 11.378 9.63968 11.5187 9.78033C11.6593 9.92098 11.8501 10 12.049 10C12.2479 10 12.4387 9.92098 12.5793 9.78033C12.72 9.63968 12.799 9.44891 12.799 9.25ZM20 12.5C20 10.3783 19.1571 8.34344 17.6569 6.84315C16.1566 5.34285 14.1217 4.5 12 4.5C9.87827 4.5 7.84344 5.34285 6.34315 6.84315C4.84285 8.34344 4 10.3783 4 12.5C4 14.6217 4.84285 16.6566 6.34315 18.1569C7.84344 19.6571 9.87827 20.5 12 20.5C14.1217 20.5 16.1566 19.6571 17.6569 18.1569C19.1571 16.6566 20 14.6217 20 12.5ZM5 12.5C5 11.5807 5.18106 10.6705 5.53284 9.82122C5.88463 8.97194 6.40024 8.20026 7.05025 7.55025C7.70026 6.90024 8.47194 6.38463 9.32122 6.03284C10.1705 5.68106 11.0807 5.5 12 5.5C12.9193 5.5 13.8295 5.68106 14.6788 6.03284C15.5281 6.38463 16.2997 6.90024 16.9497 7.55025C17.5998 8.20026 18.1154 8.97194 18.4672 9.82122C18.8189 10.6705 19 11.5807 19 12.5C19 14.3565 18.2625 16.137 16.9497 17.4497C15.637 18.7625 13.8565 19.5 12 19.5C10.1435 19.5 8.36301 18.7625 7.05025 17.4497C5.7375 16.137 5 14.3565 5 12.5Z"
                                                                                    fill="#7C7C7C" />
                                                                            </svg>
                                                                            @if ($coupon->usage_time)
                                                                                Once collected, valid for
                                                                                {{ $coupon->usage_time }} days
                                                                            @else
                                                                                {{ date('M d Y', strtotime($coupon->end_date)) }}
                                                                            @endif
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div data-mainid="{{ $coupon->id }}"
                                                                    data-id="collect-detail-modal{{ $coupon->id }}"
                                                                    class="gccard-content-bottom show-detail-popup {{$customer_id == null ? 'login notshow' : ''}} login_collect">
                                                                    <div
                                                                        class="gccard-content-bottom-content relative h-[90%] w-full">
                                                                        <button
                                                                            data-id="small-coupon{{ $coupon->id }}"
                                                                            class="{{$checkUsedExpired==true?'text-d1':''}} clt-button absolute top-1/2 w-full text-center -translate-y-1/2 collect-view-btn text-blueMediq flex justify-center ml-auto mr-auto collect"
                                                                            onclick="collect({{ $coupon->id }},{{ isset($coupon->coupon_ids) ? 'bundle_coupon' : '' }})">@lang('labels.coupon.collect')</button>
                                                                        <button
                                                                            class="clt-button absolute top-1/2 w-full text-center -translate-y-1/2 collect-view-btn text-d1 flex justify-center ml-auto mr-auto collected">@lang('labels.coupon.collected')</button>

                                                                    </div>
                                                                </div>
                                                                <!-- add condition for login popup -->
                                                                <div class="gccard-content-bottom {{$customer_id == null ? 'login' : 'login notshow'}} login_not_collect">
                                                                    <button
                                                                        class="collect-view-btn text-blueMediq flex justify-center ml-auto mr-auto collect-login">@lang('labels.coupon.collect')</button>
                                                                </div>
                                                                <!-- end add condition for login popup -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                        </div>
                                    </div>

                                </li>
                                @endif

                            </ul>
                        </div>


                    </div>
                    @if (count(getTotalCoupon($product->id, $product->category_id, $product->sub_category_id)) > 0)
                        @foreach (getTotalCoupon($product->id, $product->category_id, $product->sub_category_id) as $coupon)
                            @php
                                $couponCollect = App\Models\CouponCollect::where('coupon_id', $coupon->id)->first();
                                $collectId = isset($couponCollect->coupon_id) ? 'collected' : 'collect';
                            @endphp
                            @include('frontend.home.coupon_model', ['coupon_type' => 'single_coupon'])
                        @endforeach
                    @endif
                    <aside
                        class="plan-option-sidebar block w-full md:w-[30%] lg:w-[44%] xl:w-[44.5%] 2xl:w-[42%] 3xl:w-[39.5%] 5xl:w-[40%] 7xl:w-[30%]">
                        <div class="right-panel">
                            <div class="flex items-center justify-center md:justify-end cfs-icons-section">
                                @if(isset($product->merchant))
                                <button
                                class="w-[50px] h-[50px] bg-whitez rounded-full mr-[10px] last:mr-0 flex items-center justify-center compare_icon"
                                data-id="compare-modal" data-product-id="{{ $product->id }}"
                                data-product-name="{{ langbind($product, 'name') }}"
                                data-product-category-id="{{ $product->category_id }}"
                                data-product-featured-img="{{ isset($product->merchant->icon) ? $product->merchant->icon : asset('frontend/img/quality-healthcare.png') }}"><img
                                    src="{{ asset('frontend/img/icon1.svg') }}" alt="icon1" /></button>
                                @else
                                <button
                                class="w-[50px] h-[50px] bg-whitez rounded-full mr-[10px] last:mr-0 flex items-center justify-center compare_icon"
                                data-id="compare-modal" data-product-id="{{ $product->id }}"
                                data-product-name="{{ langbind($product, 'name') }}"
                                data-product-category-id="{{ $product->category_id }}"
                                data-product-featured-img="{{ isset($product->featured_img) ? $product->featured_img : asset('frontend/img/quality-healthcare.png') }}"><img
                                    src="{{ asset('frontend/img/icon1.svg') }}" alt="icon1" /></button>
                                @endif
                                <button
                                    class="{{Auth::guard('customer')->check()?'':'register-btn'}} w-[50px] h-[50px] bg-whitez rounded-full mr-[10px] last:mr-0 flex items-center justify-center fav-btn">
                                    <img src="{{ asset('frontend/img/Default.svg') }}" alt="heart icon"
                                        class="healthcare-heart {{ Auth::guard('customer')->user() == null ? 'click-disable' : (count($product->favourite) > 0 ? 'hidden' : '') }}"
                                        data-product-id="{{ $product->id }}" />

                                    <img src="{{ asset('frontend/img/Selected.svg') }}" alt="heart icon"
                                        class="healthcare-heart-selected {{ Auth::guard('customer')->user() == null ? 'click-disable hidden' : (count($product->favourite) <= 0 ? 'hidden' : '') }}"
                                        data-product-id="{{ $product->id }}" />
                                </button>
                                <button
                                    class="w-[50px] h-[50px] bg-whitez rounded-full mr-[10px] last:mr-0 flex items-center justify-center me-share-btn"><img
                                        src="{{ asset('frontend/img/bold-share.svg') }}"
                                        alt="share icon" /></button>
                            </div>
                            <p class="helvetica-normal me-body16 text-lightgray mt-[8px] text-center md:text-right">
                                @lang('labels.product_detail.product_code')
                                <span class="text-darkgray inline-block ml-[10px]">{{ $product->product_code }}</span>
                            </p>
                        </div>
                        <div class="deal-fixed-position">
                            @php
                            if(count($product->productsVariations) > 0 && $product->productsVariations[0]->sku != null){
                                $productPrice = getLowestPrice($product);
                                $prodDis = isset($productPrice->promotion_price) ? $productPrice->promotion_price : (isset($productPrice->discount_price) ? $productPrice->discount_price : '');
                            }else{
                                $prodDis = isset($product->promotion_price) ? $product->promotion_price : (isset($product->discount_price) ? $product->discount_price : '');
                                $productPrice = $product;
                            }
                            @endphp
                            <div component-name="me-deal-fixed-card" class="me-deal-fixed-card mt-[25px]">
                                <div
                                    class="md:ml-auto w-full md:max-w-[100%] lg-custom:max-w-[100%] lg:max-w-[275px] xlhtz:max-w-[23.75rem] 4xl:max-w-[320px] 4xl:max-w-[380px] relative">
                                    <!-- <div
                                        class="flex justify-between items-center bg-[#FFBC00] yellow-bar px-[20px] pt-[8px] pb-[13px] ">
                                        <div class="flex justify-start items-center ">
                                        <img src="./img/me-stopwatch.svg" alt="watch image" class="watch-image mr-[9px]">
                                        <p class="me-body16 font-bold helvetica-normal text-darkgray">Flash Deal</p>
                                        </div>
                                        <div class="">
                                        <p class="me-body16 font-bold helvetica-normal text-darkgray">Ends in <span id="watch"
                                            data-time="Jun 30, 2023 15:37:25">14:12:26</span></p>
                                        </div>
                                    </div> -->
                                    <div class="bg-whitez rounded-[12px] p-[20px] main-card">
                                        <!-- <p class="vip helvetica-normal font-bold hidden">VIP login to enjoy the offers</p> -->
                                        <p class="helvetica-normal font-bold text-darkgray me-header36 flex items-baseline"><span class="total_amount">${{ $prodDis != null ? number_format($prodDis) : number_format($productPrice->original_price) }}</span>
                                            @if(count($product->productsVariations) > 0 && $product->productsVariations[0]->sku != null)
                                            <span class="linethrough text-lightgray me-body16 ml-[10px] up-text">up</span>
                                            @endif
                                            @if ($prodDis != null)<span
                                                    class="linethrough text-lightgray me-body16 ml-[10px] original-price">${{ number_format($productPrice->original_price) }}</span>@endif</p>
                                        <ul class="flex flex-wrap items-center justify-start pt-[10px] badges-container">


                                            @if ($prodDis != null)
                                                <li
                                                    class="helvetica-normal me-body16 font-bold px-[10px] py-[4px] rounded-[4px] mr-[10px] last:mr-0 mered-bg">
                                                   <span>@lang('labels.product_detail.save')</span><span class="save_amount">${{ number_format($productPrice->original_price - $prodDis) }}</span></li>
                                                <li
                                                    class="helvetica-normal me-body16 font-bold px-[10px] py-[4px] rounded-[4px] mr-[10px] last:mr-0 mered-bg">
                                                    <span class="dis_percent">–{{ round((($productPrice->original_price - $prodDis) / $productPrice->original_price) * 100, 0) }}%</span>
                                                </li>
                                            @endif

                                            <!-- <li
                                                    class="helvetica-normal me-body16 font-bold px-[10px] py-[4px] rounded-[4px] mr-[10px] last:mr-0 deal-bg1">
                                                ONLY 3 LEFT</li> -->

                                        </ul>
                                        <button id="selected-opt-txt"
                                            class="w-full md:max-w-[340px] h-[50px] cart_btn text-white rounded-[6px] helvetica-normal font-bold me-body18">
                                            @lang('labels.product_detail.select_options')</button>
                                            {{-- @if(count($product->order_items) > 0 && $product->is_book_count == true)
                                            <p class="text-center text-darkgray me-body16 font-bold helvetica-normal mt-[10px]">{{count($product->order_items)}}+ 
                                                @lang('labels.product_detail.people_booked')
                                            </p>
                                            @endif --}}
                                            @if($product->book_count > 0 && $product->is_book_count == true)
                                            <p class="text-center text-darkgray me-body16 font-bold helvetica-normal mt-[10px]">{{$product->book_count}}+ 
                                                @lang('labels.product_detail.people_booked')
                                            </p>
                                            @endif
                                    </div>
                                </div>
                            </div>

                            <div component-name="me-deal-fixed-card-mobile" class="me-deal-fixed-card-mobile">
                                <div class="mdeal-container md:ml-auto w-full md:max-w-[100%] lg-custom:max-w-[100%] lg:max-w-[275px] xlhtz:max-w-[23.75rem] 4xl:max-w-[320px] 4xl:max-w-[380px] relative">
                                    <div class="bg-whitez rounded-[12px] p-[20px] main-card" style="margin-top: -10px;">
                                        <div class="promotion-price helvetica-normal font-bold text-darkgray me-header36 flex items-baseline flex-wrap gap-x-[10px]"><span class="total_amount">${{ $prodDis != null ? number_format($prodDis) : number_format($productPrice->original_price) }}</span>
                                            @if(count($product->productsVariations) > 0 && $product->productsVariations[0]->sku != null)
                                            <span class="linethrough text-lightgray me-body16">up</span>
                                            @endif
                                            @if ($prodDis != null)<span
                                            class="linethrough text-lightgray me-body16 ml-[10px] original-price">${{ number_format($productPrice->original_price) }}</span>@endif</p>
                                        </div>
                                        <ul class="flex flex-wrap items-center justify-start pt-[10px] badges-container">
                                            
                                                {{-- <li class="helvetica-normal me-body16 font-bold px-[10px] py-[4px] rounded-[4px] mr-[10px] last:mr-0 mered-bg">Save $6,100</li>
                                            
                                                <li class="helvetica-normal me-body16 font-bold px-[10px] py-[4px] rounded-[4px] mr-[10px] last:mr-0 mered-bg">-53%</li>
                                            
                                                <li class="helvetica-normal me-body16 font-bold px-[10px] py-[4px] rounded-[4px] mr-[10px] last:mr-0 deal-bg1">ONLY 3 LEFT</li> --}}
                                                @if ($prodDis != null)
                                                    <li
                                                        class="helvetica-normal me-body16 font-bold px-[10px] py-[4px] rounded-[4px] mr-[10px] last:mr-0 mered-bg">
                                                        @lang('labels.product_detail.save') ${{ number_format($productPrice->original_price - $prodDis) }}</li>
                                                    <li
                                                        class="helvetica-normal me-body16 font-bold px-[10px] py-[4px] rounded-[4px] mr-[10px] last:mr-0 mered-bg">
                                                        –{{ round((($productPrice->original_price - $prodDis) / $productPrice->original_price) * 100, 0) }}%
                                                    </li>
                                                @endif
                                            
                                        </ul>
                                        <button id="selected-opt-txt-mobile" data-see="See Selected Option" data-origin="Select Options"
                                            class="w-full md:max-w-[340px] h-[50px] cart_btn text-white rounded-[6px] helvetica-normal font-bold me-body18">
                                            @lang('labels.product_detail.select_options')</button>
                                            @if($product->book_count > 0 && $product->is_book_count == true)
                                            <p class="text-center text-darkgray me-body16 font-bold helvetica-normal mt-[10px] people-text">{{$product->book_count}}+ 
                                                @lang('labels.product_detail.people_booked')
                                            </p>
                                            @endif
                                    </div>
                                </div>
                            </div>


                        </div>
                    </aside>
                </div>
            </div>


            @include('frontend.include.product-compare-box')

        </section>
        {{-- @include('frontend.include.product-modal-compare') --}}

        @include('frontend.product_details.plan_option')

        @include('frontend.product_details.plan_detail')

        @include('frontend.product_details.location')

        @include('frontend.product_details.faq')

        <div component-name="me-share-popup" id="me-share-modal"
            class="modal hidden fixed z-[1001] left-0 top-0 w-full h-full bg-black/[.75] flex items-center justify-center">
            <!-- Modal content -->
            <div
                class="modal-content my-[15%] mx-auto max-w-[90%] xs:max-w-[460px] bg-[#ECF7FF] rounded-[15px] shadow-shadow02 font-primary">
                <div class="relative rounded-[12px] bg-white">
                    <div class="flex ml-auto w-5 h-5 absolute right-[35px] top-[15px] 7xl:top-[29px] close-item close-section-share">
                        <span data-id="me-share-modal"
                            class="pb-[4px] absolute left-1/2 top-1/2 -translate-y-1/2 -translate-x-1/2 flex items-center justify-center w-[32px] h-[32px] text-[32px] w-full cursor-pointer text-[#1A1818] focus:no-underline close-share">
                            <img src="{{ asset('frontend/img/ic_round-close.svg') }}" alt="close" />
                        </span>
                    </div>
                    <div class="p-[40px]">
                        <h3 class="font-semibold text-center me-body20 text-darkgray pb-5 helvetica-normal">
                            @lang('labels.product_detail.share')
                        </h3>
                        <div class="share-icons flex justify-center flex-wrap items-center">
                            <a href="https://wa.me/?text={{ route('product-detail',['category' => isset($product->category) ? str_replace(' ','-',$product->category->name_en) : '', 'slug' => isset($product->slug_en) ? $product->slug_en : '']) }}">
                                <img src="{{ asset('frontend/img/ic_baseline-whatsapp.svg') }}" alt="whatsapp">
                            </a>
                            <a
                                href="https://www.facebook.com/sharer/sharer.php?u={{ route('product-detail',['category' => isset($product->category) ? str_replace(' ','-',$product->category->name_en) : '', 'slug' => isset($product->slug_en) ? $product->slug_en : '']) }}">
                                <img src="{{ asset('frontend/img/me-facebook.svg') }}" alt="facebook">
                            </a>
                            <a
                                href="https://t.me/share/url?url={{ route('product-detail',['category' => isset($product->category) ? str_replace(' ','-',$product->category->name_en) : '', 'slug' => isset($product->slug_en) ? $product->slug_en : '']) }}&text=test">
                                <img src="{{ asset('frontend/img/telegram.svg') }}" alt="telegram">
                            </a>
                            <a
                                href="https://api.qrserver.com/v1/create-qr-code/?size=154x154&data={{ route('product-detail',['category' => isset($product->category) ? str_replace(' ','-',$product->category->name_en) : '', 'slug' => isset($product->slug_en) ? $product->slug_en : '']) }}">
                                <img src="{{ asset('frontend/img/me-wechat.svg') }}" alt="wechat">
                            </a>
                            <a
                                href="https://social-plugins.line.me/lineit/share?url={{ route('product-detail',['category' => isset($product->category) ? str_replace(' ','-',$product->category->name_en) : '', 'slug' => isset($product->slug_en) ? $product->slug_en : '']) }}">
                                <img src="{{ asset('frontend/img/line.svg') }}" alt="line">
                            </a>
                            <a href="#" onclick="copyUrl()">
                                <img src="{{ asset('frontend/img/getlink.svg') }}" alt="getlink">
                            </a>
                            <input type="text" id="copytext"
                                value="{{ route('product-detail',['category' => isset($product->category) ? str_replace(' ','-',$product->category->name_en) : '', 'slug' => isset($product->slug_en) ? $product->slug_en : '']) }}" hidden>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="you-may-also-like">
            <div component-name="me-you-may-also-like" class="me-you-may-also-like me-container180px py-[24px]">
                <div class="you-may-also-like-section mt-[24px] mb-[32px]">
                    <h3 class="helvetica-normal text-darkgray font-bold me-body28"> @lang('labels.product_detail.you_like')</h3>
                </div>
                <div component-name="mediq-quality-healthcare">
                    <div class="me-healthcare flex flex-wrap">
                        @if(count($relatedProducts) > 0)
                            @foreach ($relatedProducts as $key => $product)
                                @include('frontend.product-vertical-card')
                            @endforeach
                        @endif
                    </div>
                </div>
                @if(count($relatedProducts) > 0)
                    @foreach ($relatedProducts as $key => $product)
                        <div class="custom-product-modal"></div>
                        {{-- @include('frontend.product-modal') --}}
                        {{-- @include('frontend.include.product-compare') --}}
                    @endforeach
                @endif
            </div>
        </section>

        {{-- <section class="product-detail-cupon-popup">
            <div component-name="me-cupon-popup" class="fixed bottom-[21px] z-[5] left-6 me-cupon-popup hidden">
                @if (count($promoCodes) > 0)
                    @foreach ($promoCodes as $key => $code)
                        <div class="cupon-image-container relative group" id="gift-voucher{{ $key }}">
                            <button type="button" class="coupon-open-btn" data-toggle="modal"
                                data-target="#sampleCopy-gift-voucher_{{ $key }}">
                                <img src="{{ isset($code->icon) ? $code->icon : asset('frontend/img/gift-coupon.svg') }}"
                                    alt="coupon" class="coupon-icon cursor-pointer" />
                            </button>
                            <button class="cupon-pop-close-btn bg-transparent">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                <path d="M15.9998 29.3337C23.3638 29.3337 29.3332 23.3643 29.3332 16.0003C29.3332 8.63633 23.3638 2.66699 15.9998 2.66699C8.63584 2.66699 2.6665 8.63633 2.6665 16.0003C2.6665 23.3643 8.63584 29.3337 15.9998 29.3337Z" fill="#A3A3A3"/>
                                <path d="M19.7712 12.2285L12.2285 19.7712L19.7712 12.2285ZM12.2285 12.2285L19.7712 19.7712L12.2285 12.2285Z" fill="#333333"/>
                                <path d="M19.7712 12.2285L12.2285 19.7712M12.2285 12.2285L19.7712 19.7712" stroke="white" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>       
                            </button>
                            <!-- Modal -->
                            <div class="modal hidden fixed z-[15] inset-0 w-full h-full bg-black/[.75] flex items-center justify-center sampleCopy"
                                id="sampleCopy-gift-voucher_{{ $key }}" tabindex="-1" role="dialog"
                                aria-labelledby="sampleCopyLabelgift-voucher" aria-hidden="true">
                                <div class="rounded-[20px] view-bundle-modal--container">
                                    <div class="bg-image  w-full p-[20px] sm:p-[40px] pb-[20px] relative">
                                        <button data-dismiss="#sampleCopy-gift-voucher_{{ $key }}" class="sample-close-btn absolute top-[25px] right-[45px] cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                        <path d="M17.3998 0.613632C17.2765 0.490027 17.1299 0.391963 16.9686 0.325055C16.8073 0.258146 16.6344 0.223706 16.4598 0.223706C16.2852 0.223706 16.1123 0.258146 15.951 0.325055C15.7897 0.391963 15.6432 0.490027 15.5198 0.613632L8.99981 7.1203L2.47981 0.600298C2.35637 0.476855 2.20982 0.378935 2.04853 0.312129C1.88725 0.245322 1.71438 0.210938 1.53981 0.210938C1.36524 0.210937 1.19237 0.245322 1.03109 0.312129C0.8698 0.378935 0.723252 0.476855 0.59981 0.600298C0.476367 0.723741 0.378447 0.870288 0.31164 1.03157C0.244834 1.19286 0.210449 1.36572 0.210449 1.5403C0.210449 1.71487 0.244834 1.88774 0.31164 2.04902C0.378447 2.21031 0.476367 2.35686 0.59981 2.4803L7.11981 9.0003L0.59981 15.5203C0.476367 15.6437 0.378447 15.7903 0.31164 15.9516C0.244834 16.1129 0.210449 16.2857 0.210449 16.4603C0.210449 16.6349 0.244834 16.8077 0.31164 16.969C0.378447 17.1303 0.476367 17.2769 0.59981 17.4003C0.723252 17.5237 0.8698 17.6217 1.03109 17.6885C1.19237 17.7553 1.36524 17.7897 1.53981 17.7897C1.71438 17.7897 1.88725 17.7553 2.04853 17.6885C2.20982 17.6217 2.35637 17.5237 2.47981 17.4003L8.99981 10.8803L15.5198 17.4003C15.6433 17.5237 15.7898 17.6217 15.9511 17.6885C16.1124 17.7553 16.2852 17.7897 16.4598 17.7897C16.6344 17.7897 16.8072 17.7553 16.9685 17.6885C17.1298 17.6217 17.2764 17.5237 17.3998 17.4003C17.5233 17.2769 17.6212 17.1303 17.688 16.969C17.7548 16.8077 17.7892 16.6349 17.7892 16.4603C17.7892 16.2857 17.7548 16.1129 17.688 15.9516C17.6212 15.7903 17.5233 15.6437 17.3998 15.5203L10.8798 9.0003L17.3998 2.4803C17.9065 1.97363 17.9065 1.1203 17.3998 0.613632Z" fill="#333333"></path>
                                        </svg>
                                        </button>
                                        <div class="flex items-center justify-between py-[10px] qucollectd after-copy">
                                            <div>
                                            <h1 class="text-darkgray text-[23px] font-bold">{{langbind($code,'name')}}</h1>
                                            <p class="flex items-center justify-start quades text-blueMediq">
                                                {{ $code->code }}
                                            </p>
                                            </div>
                                            <button data-id=""
                                                class="coupon-copy-btn w-[131px] font-secondary font-bold me-body16 inline-block py-[10px] px-5 border border-darkgray text-center hover:bg-blueMediq hover:border-blueMediq hover:text-whitez rounded-full">@lang('labels.header.copy')
                                            </button>

                                        </div>
                                    </div>
                                    <div class="custom-divider">
                                    </div>
                                    <div class="cscard-container" style="width: calc(100% - 80px)">
                                        <div class="mb-[27px] last:mb-0 pb-[27px] border-b border-b-mee4">
                                            <h6 class="text-darkgray contitle mb-[10px]">{{__('labels.promotion_period')}}</h6>
                                            <div class="condes text-darkgray">
                                            @if(lang() == "en")
                                                {{ date('d M Y', strtotime($code->start_date)) }} -
                                                {{ date('d M Y', strtotime($code->end_date)) }}
                                            @else 
                                                {{ date('Y年m月d日', strtotime($code->start_date)) }} -
                                                {{ date('Y年m月d日', strtotime($code->end_date)) }}
                                            @endif
                                            </div>
                                        </div>

                                        <div class="pb-[27px] mb-[27px] border-b border-b-mee4">
                                            <h6 class="text-darkgray contitle mb-[10px]">{{__('labels.coupon_list.detail')}}</h6>
                                            <div class="condes text-darkgray">
                                            {!! langbind($code, 'description') !!}
                                            </div>
                                        </div>   
                                        <div class="pb-[27px] mb-[27px]">
                                            <h6 class="text-darkgray contitle mb-[10px]">{{__('labels.product_detail.termsAndCondition')}}</h6>
                                            <div class="text-16 text-darkgray">
                                            {!! langbind($code, 'terms') !!}
                                            </div>
                                        </div> 

                                    </div>
                                </div>
                            </div>
                            <!-- end Modal -->
                        </div>
                    @endforeach
                @endif
            </div>
        </section> --}}
    </main>
@endsection
@push('scripts')
@include('frontend.product_details.plan_option_js')
<script src="{{ asset('frontend/custom/product-compare.js') }}"></script>
<script>
    $('#submitAddtocart').click(function(e){
        $('.is_add_to_cart_btn').val('yes')
        let formData = $("#submitAddBtn").serialize();
        saveBookNow("{{ route('bookNow') }}", formData);
    })
    $('#submitBookNow').click(function(e){
        $('.is_add_to_cart_btn').val('no')
        let formData = $("#submitAddBtn").serializeArray();
        console.log(formData);
        saveBookNow("{{ route('bookNow') }}", formData);
    })
    $(document).on('click', '#hasLetter', function (e) {
        let isValidatePassed = true ;
        console.log('isAuth',isAuth)
        if (!isAuth) {
            $('.lr-register-popup').removeClass('hidden').addClass('flex');
            $('body').addClass('overflow-hidden');
            e.preventDefault();
        } else {
            const hasLetterInputs = $(".has-letter");
            const checkedInputs = hasLetterInputs.filter(":checked");
            const isCheckedAll = hasLetterInputs.length / 2;
            if (checkedInputs.length !== isCheckedAll) {
                showReminderPopup("#plan-opt-question-err-msg");
                isValidatePassed = false;
            } else {
            checkedInputs.each(function () {
                console.log('values',$(this).val())
                if ($(this).val() == 0) {
                    isValidatePassed = false;
                    const inputName = $(this).attr("name");
                    console.log('inputName',inputName)
                    $(`[data-question-group="${inputName}"]`).find(".err-message").removeClass("hidden");
                }
                });
            }
            // !isValidatePassed && e.preventDefault();
        }
        $('.is_add_to_cart_btn').val('no')
        let formData = $("#submitAddBtn").serializeArray();
        console.log(formData);
        if(isValidatePassed != false){
            saveBookNow("{{ route('bookNow') }}", formData);
        }
    });
    function saveBookNow(url, formData, action = null) {
        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            enctype: 'multipart/form-data',
            dataType: 'json',
            async: false, // open new tab
            success: function(res) {
                console.log(res,res.is_add_to_cart_btn);
                addToCartRes(res,'add')
                if(res.product_type == true){
                    location.reload()
                }else{
                    if(res.is_add_to_cart_btn != 'yes'){
                        window.location.href = "{{route('checkout.init')}}";
                    }
                }
            }
        })
    }
    function copyUrl() {

        var copyText = document.getElementById("copytext");

        copyText.select();

        copyText.setSelectionRange(0, 99999); // For mobile devices

        navigator.clipboard.writeText(copyText.value);

        toastr.success(copied);
    }


    function initMap() {
        const myLatLng = {
            lat: 22.302711,
            lng: 114.177216
        };
        const map = new google.maps.Map(document.getElementById("gmap"), {
            zoom: 10.5,
            center: myLatLng,
        });

        var locations = {!! json_encode($merchantLocations) !!};
        var infowindow = new google.maps.InfoWindow();

        var markers = [];
        var marker, i;
        if (locations.length > 0) {
            locations.forEach(function(value, key) {
                console.log('value', value.merchant.name_en, key)
                let lng_locale = {!! json_encode(lang())!!};
                let inputlng = lng_locale === "en" ? "en" : (lng_locale == 'zh-hk' ? 'tc' : 'sc');
                let stationName = `station_name_${inputlng}`;
                let merchantName = `name_${inputlng}`;
                if (value.area != null) {

                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(Number(value.latitude), Number(value.longitude)),
                        map: map,
                        // draggable: true,
                        // animation: google.maps.Animation.DROP,
                    });
                    markers.push(marker);
                    if (key == 0) {
                        // var areaName = "";
                        // var currenUrlOrigin = window.location.origin;
                        // areaName += `<div class="triangle flex justify-start items-center relative bg-whitez z-[1]">
                        //         <img src="${value.merchant.icon ?? ''}" alt="image" class="sm:w-[80px] sm:h-[80px] w-[40px] h-[40px] name-image mr-[12px]" />
                        //         <div class="name-section py-[10px]">
                        //             <h6 class="title w-full max-w-[258px] helvetica-normal me-body16 text-darkgray pding-tight">
                        //             ${value.merchant[merchantName] ?? ''}</h6>
                        //             <p class="title2 helvetica-normal me-body16">

                        //                 <span class="text-[#9D2034]">${value[stationName] ?? ''}</span>
                        //             </p>
                        //         </div>
                        //     </div>`;
                        // infowindow.setContent(areaName);
                        // infowindow.open(map, marker);
                        var areaName = "";
                        $('.jordan-exit').html(areaName)
                        if(value.station_name_tc != null){
                            var currenUrlOrigin = window.location.origin+'/frontend/img/code-icon.svg';
                            areaName += `<p class="title2 helvetica-normal me-body16">
                                <img src="${currenUrlOrigin}"
                                alt="marker icon" class="w-[16px] inline-block mr-[8px]"><span
                                class="text-[#9D2034]">${value[stationName] ?? ''}</span>
                            </p>`;
                            $('.jordan-exit').html(areaName)
                        }
                        marker.setAnimation(google.maps.Animation.BOUNCE);
                    }

                    $('#click_map' + key).click(function() {

                    var areaName = "";
                    $('.jordan-exit').html(areaName)
                    if(value.station_name_tc != null){
                        var currenUrlOrigin = window.location.origin+'/frontend/img/code-icon.svg';
                        areaName += `<p class="title2 helvetica-normal me-body16">
                            <img src="${currenUrlOrigin}"
                            alt="marker icon" class="w-[16px] inline-block mr-[8px]"><span
                            class="text-[#9D2034]">${value[stationName] ?? ''}</span>
                        </p>`;
                        $('.jordan-exit').html(areaName)
                    }
                    // infowindow.setContent(areaName);
                    // infowindow.open(map, marker);
                    var lat = $(this).data('lat')
                    var long = $(this).data('long')
                    if(Number(lat) == Number(value.latitude) && Number(long) == Number(value.longitude)){
                    for (var i = 0; i < markers.length; i++) {
                        markers[i].setAnimation(null);
                        }
                        toggleBounce(marker);
                        map.setZoom(10);
                        map.setCenter(marker.getPosition());
                    
                    
                            // marker.setAnimation(google.maps.Animation.BOUNCE);
                    }
                    })



                }

            })
        }


    }
    function toggleBounce(ele) {
        if (ele.getAnimation() !== null) {
            ele.setAnimation(null);
        } else {
            ele.setAnimation(google.maps.Animation.BOUNCE);
        }
    }
    window.initMap = initMap;
</script>
<script type="text/javascript"
    src="https://maps.google.com/maps/api/js?key={{config('app.google_map_key')}}&callback=initMap"></script>
@endpush

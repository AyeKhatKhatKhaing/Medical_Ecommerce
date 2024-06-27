@extends('frontend.layouts.master')
@include('frontend.seo',['seo' => isset($seo) ? $seo : ''])
@section('content')
    <style>
      .me-healthcare .me-season-card:hover .healthcare-heart
      {
         display: inline-block;
      }
    </style>
    <div component-name="me-banner-slider" class="me-banner-slider py-[40px]"
        style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), #2FA9B5;">
        <input type="hidden" name="" id="duration" value="{{ isset($sliders) && $sliders[0]->time_setup ? $sliders[0]->time_setup : 5 }}">
        <div class="me-banner-slider-container desktop-view hidden 5xs:block">
            @if (count($sliders) > 0)
                @foreach ($sliders as $slide)
                    <div class="mx-[10px]">
                        <div class="image-banner-container">
                           @if(isset($slide->img))
                            <img src="{{ asset($slide->img) }}"
                                alt="banner1 desktop" class="image-banner" />
                           @endif
                            <div class="bg-overlay"></div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="me-banner-slider-container mobile-view block 5xs:hidden">
         @if (count($sliders) > 0)
         @foreach ($sliders as $slide)
            <div class="mx-[10px]">
               <div class="image-banner-container">
                  @if(isset($slide->mobile_img))
                  <img src="{{ asset($slide->mobile_img) }}" alt="mobile" class="image-banner"/>
                  @endif
                  <div class="bg-overlay"></div>
               </div>
            </div>
            @endforeach
         @endif
      </div> 
    </div>
    {{-- <div component-name="me-icard-slider" class="icard-slider-container" style="padding-bottom:0px !important">
        @if (count($subCategories) > 0)
            @foreach ($subCategories as $item)
                <div class="icard-slider-item">
                    <a href="{{ url('/products?pc=' . $item->id) }}">
                        <div class="icard-slider-div group h-[148px]">
                            <img src="{{ asset($item->img) }}" alt="icard1" class="icard-image" />
                            <p class="icard-title group-hover:text-orangeMediq text-darkgray text-center">
                                {{ langbind($item, 'name') }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        @endif
    </div> --}}

    <div component-name="me-icard-slider" class="w-full bg-whitez">
        <div class="icard-slider-container">
            @if (count($subCategories) > 0)
                @foreach ($subCategories as $item)
                    <div class="icard-slider-item">
                        <a href="{{ langlink('products?pc=' . $item->id) }}">
                            <div class="icard-slider-div group h-auto">
                                <img src="{{ asset($item->img) }}" alt="icard1" class="icard-image" />
                                <p class="icard-title group-hover:text-orangeMediq text-darkgray text-center">
                                    {{ langbind($item, 'name') }}
                                </p>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
            <div class="icard-slider-item mobile-view">
               <button class="mobile-detected-btn">
                   <div class="icard-slider-div group h-auto">
                       <svg class="icard-image" width="41" height="40" viewBox="0 0 41 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <g filter="url(#filter0_ii_7771_75054)">
                           <rect x="10" y="9" width="10" height="10" rx="1.31148" fill="#97D4DA"/>
                           </g>
                           <g filter="url(#filter1_ii_7771_75054)">
                           <rect x="21" y="9" width="10" height="10" rx="1.31148" fill="#97D4DA"/>
                           </g>
                           <g filter="url(#filter2_ii_7771_75054)">
                           <rect x="21" y="20" width="10" height="10" rx="1.31148" fill="#97D4DA"/>
                           </g>
                           <g filter="url(#filter3_ii_7771_75054)">
                           <rect x="10" y="20" width="10" height="10" rx="1.31148" fill="#97D4DA"/>
                           </g>
                           <defs>
                           <filter id="filter0_ii_7771_75054" x="8.75003" y="8.37501" width="12.4999" height="10.625" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                           <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                           <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                           <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                           <feOffset dx="-1.24997" dy="-0.624986"/>
                           <feGaussianBlur stdDeviation="0.937478"/>
                           <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"/>
                           <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0.47451 0 0 0 0 0.521569 0 0 0 1 0"/>
                           <feBlend mode="normal" in2="shape" result="effect1_innerShadow_7771_75054"/>
                           <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                           <feOffset dx="1.24997"/>
                           <feGaussianBlur stdDeviation="1.24997"/>
                           <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"/>
                           <feColorMatrix type="matrix" values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 0.25 0"/>
                           <feBlend mode="normal" in2="effect1_innerShadow_7771_75054" result="effect2_innerShadow_7771_75054"/>
                           </filter>
                           <filter id="filter1_ii_7771_75054" x="19.75" y="8.37501" width="12.4999" height="10.625" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                           <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                           <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                           <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                           <feOffset dx="-1.24997" dy="-0.624986"/>
                           <feGaussianBlur stdDeviation="0.937478"/>
                           <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"/>
                           <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0.47451 0 0 0 0 0.521569 0 0 0 1 0"/>
                           <feBlend mode="normal" in2="shape" result="effect1_innerShadow_7771_75054"/>
                           <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                           <feOffset dx="1.24997"/>
                           <feGaussianBlur stdDeviation="1.24997"/>
                           <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"/>
                           <feColorMatrix type="matrix" values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 0.25 0"/>
                           <feBlend mode="normal" in2="effect1_innerShadow_7771_75054" result="effect2_innerShadow_7771_75054"/>
                           </filter>
                           <filter id="filter2_ii_7771_75054" x="19.75" y="19.375" width="12.4999" height="10.625" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                           <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                           <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                           <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                           <feOffset dx="-1.24997" dy="-0.624986"/>
                           <feGaussianBlur stdDeviation="0.937478"/>
                           <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"/>
                           <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0.47451 0 0 0 0 0.521569 0 0 0 1 0"/>
                           <feBlend mode="normal" in2="shape" result="effect1_innerShadow_7771_75054"/>
                           <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                           <feOffset dx="1.24997"/>
                           <feGaussianBlur stdDeviation="1.24997"/>
                           <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"/>
                           <feColorMatrix type="matrix" values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 0.25 0"/>
                           <feBlend mode="normal" in2="effect1_innerShadow_7771_75054" result="effect2_innerShadow_7771_75054"/>
                           </filter>
                           <filter id="filter3_ii_7771_75054" x="8.75003" y="19.375" width="12.4999" height="10.625" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                           <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                           <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                           <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                           <feOffset dx="-1.24997" dy="-0.624986"/>
                           <feGaussianBlur stdDeviation="0.937478"/>
                           <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"/>
                           <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0.47451 0 0 0 0 0.521569 0 0 0 1 0"/>
                           <feBlend mode="normal" in2="shape" result="effect1_innerShadow_7771_75054"/>
                           <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                           <feOffset dx="1.24997"/>
                           <feGaussianBlur stdDeviation="1.24997"/>
                           <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"/>
                           <feColorMatrix type="matrix" values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 0.25 0"/>
                           <feBlend mode="normal" in2="effect1_innerShadow_7771_75054" result="effect2_innerShadow_7771_75054"/>
                           </filter>
                           </defs>
                           </svg>
                       <p class="icard-title group-hover:text-orangeMediq text-darkgray text-center">@lang('labels.product.more')</p>
                   </div>        
               </button>
           </div>
        </div>
    </div>


    {{-- <div component-name="me-countdown-clock" class="countdown-container bg-far relative">
   <img src="{{asset('frontend/img/frame-clock.png')}}" alt="frame-bg" class="frame-bg mx-auto"/>
   <div class="clock-container absolute inset-0 top-[32px]">
      <p class="text-center start-text">START IN</p>
      <div id="demo" class="flex items-baseline justify-center">
         <div id="day" class="flex flex-col justify-center items-center"></div>
         <div class="full-col">:</div>
         <div id="hours" class="flex flex-col justify-center items-center"></div>
         <div class="full-col">:</div>
         <div id="mins" class="flex flex-col justify-center items-center"></div>
         <div class="full-col">:</div>
         <div id="sec" class="flex flex-col justify-center items-center"></div>
      </div>
   </div>
</div>
 <div component-name="mediq-flashdeal" class="bg-white pt-8 lg:pb-5 mediq-flashdeal-container">
   <div class="pb-10 flex items-center justify-between mediq-flashdeal-top">
      <h1 class="font-secondary font-bold text-darkgray me-title50">Flash Deal</h1>
      <a href="" class="capitalize font-secondary font-bold me-body16 inline-block py-[10px] px-5 border border-darkgray text-center hover:bg-blueMediq hover:border-0 hover:text-whitez rounded-full">view all</a>
   </div>
   <div component-name="mediq-quality-healthcare">
      <div class="me-healthcare">

        @if (count($promoProducts) > 0)
        @foreach ($promoProducts as $key => $product)
         @include('frontend.product-vertical-card')
        @endforeach
        @endif

      </div>
   </div>
  @if (count($promoProducts) > 0)
    @foreach ($promoProducts as $key => $product)
      @include('frontend.product-modal')
    @endforeach
  @endif
   <div id="compare-modal" class="w-full bg-orangeLight rounded-tl-[200px] pl-[100px] lg:pl-[80px] xl:pl-[100px] 5xl:pl-[180px] 7xl:pl-[280px] pr-[45px] p-5 fixed left-0 -bottom-12 z-[5] hidden compare-modal">
      <div class="flex justify-between items-center compare-two-col">
         <div class="flex gap-[24px] xl:gap-[35px] selected-items">
            <div class="flex items-start selected-items-box relative w-1/4">
               <div class="flex items-center selected-items-box--top pr-[24px]">
                  <p class="selected-items-box--top--img"><img src="{{asset('frontend/img/vaccine-injection.png')}}" alt="" class="rounded-[12px]"></p>
                  <p class="font-secondary font-medium me-body16 pl-[10px] selected-items-box--top--title">Hepatitis B Vaccine Injection</p>
               </div>
               <button class="w-6 h-6 rounded-full bg-meA3 text-white flex items-center justify-center selected-items-box-delete absolute top-0 right-0"><img src="{{asset('frontend/img/white-close.svg')}}" alt="close image" class="w-[10px]"/></button>
            </div>
            <div class="flex items-start selected-items-box relative w-1/4">
               <div class="flex items-center selected-items-box--top pr-[24px]">
                  <p class="selected-items-box--top--img"><img src="{{asset('frontend/img/annual_health_check.png')}}" alt="" class="rounded-[12px]"></p>
                  <p class="font-secondary font-medium me-body16 pl-[10px] selected-items-box--top--title">Annual Health Check Plan</p>
               </div>
               <button class="w-6 h-6 rounded-full bg-meA3 text-white flex items-center justify-center selected-items-box-delete absolute top-0 right-0"><img src="{{asset('frontend/img/white-close.svg')}}" alt="close image" class="w-[10px]"/></button>
            </div>
            <div class="flex items-start selected-items-box relative w-1/4">
               <div class="flex items-center selected-items-box--top pr-[24px]">
                  <p class="selected-items-box--top--img"><img src="{{asset('frontend/img/y-dna-check.png')}}" alt="" class="rounded-[12px]"></p>
                  <p class="font-secondary font-medium me-body16 pl-[10px] selected-items-box--top--title">Y-Chromosome DNA Test</p>
               </div>
               <button class="w-6 h-6 rounded-full bg-meA3 text-white flex items-center justify-center selected-items-box-delete absolute top-0 right-0"><img src="{{asset('frontend/img/white-close.svg')}}" alt="close image" class="w-[10px]"/></button>
            </div>
            <div class="bg-[#0000001a] w-20 h-20 rounded-[10px] flex items-center justify-center me-plus-icon cursor-pointer">
               <img src="{{asset('frontend/img/me-plus.svg')}}" alt="plus">
            </div>
         </div>
         <div class="flex justify-between xl:gap-[50px] compare-textbox">
            <div class="text-center">
               <button type="button" class="border border-darkgray py-[10px] px-5 rounded-full text-darkgray bg-whitez font-bold font-secondary me-body16 hover:border-blueMediq hover:bg-blueMediq hover:text-whitez">Compare</button>
               <p class="pt-1 font-bold font-secondary me-body15 text-darkgray">You can compare up to 4 products.</p>
            </div>
            <p class="text-darkgray text-24 close-compare cursor-pointer"><img src="{{asset('frontend/img/white-close.svg')}}" alt="close image" class="invert"/></p>
         </div>
      </div>
   </div>
   <!-- The Modal -->
   <div id="add-compare-modal" class="modal hidden fixed z-[15] left-0 top-0 w-full h-full bg-black/[.75]  overflow-auto">
      <!-- Modal content -->
      <div class="modal-content max-w-[80%] lg:max-w-[700px] shadow-shadow02 my-[15%] mx-auto">
         <div class="relative rounded-[12px] bg-white">
            <div class="flex ml-auto mr-6 w-5 h-5 absolute right-0 top-4">
               <span class="pb-[4px] absolute left-1/2 top-1/2 -translate-y-1/2 -translate-x-1/2 close-add-compare-modal  flex items-center justify-center text-[24px] w-full cursor-pointer text-[#1A1818] focus:no-underline">&times;</span>
            </div>
            <div class="modal-content-plan">
               <div class="preview-bgradient p-10 pb-5 rounded-t-[40px]">
                  <h2 class="font-secondary font-bold text-darkgray me-title29">Add to Comparison Table</h2>
               </div>
               <div class="bg-white p-10 pt-5 rounded-b-[40px]">
                  <p class="font-secondary font-medium text-lightgray me-body16 pb-5">You recently viewed...</p>
                  <div class="flex">
                     <div class="relative mr-3 last-of-type:pr-0 compare-img-container">
                        <img src="{{asset('frontend/img/vaccine-injection.png')}}" alt="image" class="w-[146px]">
                        <button type="button" class="border border-darkgray py-[10px] px-5 rounded-full text-darkgray bg-whitez font-bold font-secondary me-body16 hover:border-blueMediq hover:bg-blueMediq hover:text-whitez absolute left-2/4 top-2/4 -translate-x-2/4 -translate-y-2/4 hidden">Compare</button>
                     </div>
                     <div class="relative mr-3 last-of-type:pr-0 compare-img-container">
                        <img src="{{asset('frontend/img/vaccine-injection.png')}}" alt="image" class="w-[146px]">
                        <button type="button" class="border border-darkgray py-[10px] px-5 rounded-full text-darkgray bg-whitez font-bold font-secondary me-body16 hover:border-blueMediq hover:bg-blueMediq hover:text-whitez absolute left-2/4 top-2/4 -translate-x-2/4 -translate-y-2/4 hidden">Compare</button>
                     </div>
                     <div class="relative mr-3 last-of-type:pr-0 compare-img-container">
                        <img src="{{asset('frontend/img/vaccine-injection.png')}}" alt="image" class="w-[146px]">
                        <button type="button" class="border border-darkgray py-[10px] px-5 rounded-full text-darkgray bg-whitez font-bold font-secondary me-body16 hover:border-blueMediq hover:bg-blueMediq hover:text-whitez absolute left-2/4 top-2/4 -translate-x-2/4 -translate-y-2/4 hidden">Compare</button>
                     </div>
                     <div class="relative mr-3 last-of-type:pr-0 compare-img-container">
                        <img src="{{asset('frontend/img/vaccine-injection.png')}}" alt="image" class="w-[146px]">
                        <button type="button" class="border border-darkgray py-[10px] px-5 rounded-full text-darkgray bg-whitez font-bold font-secondary me-body16 hover:border-blueMediq hover:bg-blueMediq hover:text-whitez absolute left-2/4 top-2/4 -translate-x-2/4 -translate-y-2/4 hidden">Compare</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div> --}}
    {{-- @include('frontend.home.onsale_section') --}}
    <div component="me-popular-service" class="popular-service">
        {{--  <div class="popular-service-header bg-white pb-[60px]">
      <h3>Popular Service</h3>
   </div> --}}
        @php
            $subCates = App\Models\SubCategory::where('category_id', 1)
                ->limit(3)
                ->get();
        @endphp
        @if (count($subCates) > 0)
            @foreach ($subCates as $key => $category)
                {{-- <div
                    class="{{ $key % 2 == 0 ? 'female' : 'comprehensive' }}-container pt-[48px] pb-[20px] 2xl:pb-[80px] bg-white"> --}}
                    @if($category->name_en == 'Female')
                     <div
                    class="female-container py-5 bg-white">
                       @elseif ($category->name_en == 'Male')
                       <div
                       class="male-container py-5 bg-white">
                       @else 
                       <div
                       class="comprehensive-container py-5 bg-white">
                    @endif
                    <div class="comprehensive">
                        <div class="pb-[20px] flex items-center justify-between sectiondes">
                            <h3 class="font-secondary font-bold text-darkgray title me-title32 mx-3">
                                {{ langbind($category, 'name') }}</h3>
                            <a href="{{ langlink('products?pc=' . $category->id) }}"
                                class="shop-btn capitalize font-secondary font-bold me-body16 inline-block py-[10px] px-5 border border-darkgray text-center hover:bg-blueMediq hover:border-0 hover:text-whitez rounded-full">@lang('labels.product.view_all')</a>
                        </div>

                        <div component-name="mediq-quality-healthcare">
                            <div class="me-healthcare">
                                @php
                                    $categoryProducts = App\Models\Product::where('is_published', true)
                                        ->where('sub_category_id', $category->id)->where('is_show_home',1)->orderByRaw('-sort_by_for_home DESC')
                                        ->get();
                                @endphp
                                @foreach ($categoryProducts as $key => $product)
                                    @include('frontend.product-vertical-card')
                                @endforeach
                            </div>
                        </div>
                        @if (count($categoryProducts) > 0)
                            @foreach ($categoryProducts as $key => $product)
                                {{-- @include('frontend.include.product-compare') --}}
                                {{-- @include('frontend.product-modal') --}}
                            @endforeach
                        @endif
                    </div>
                </div>
    {{-- </div> --}}
    @endforeach
    @endif
    {{-- <div class="female-container pt-[48px] pb-[20px] 2xl:pb-[80px] bg-white">
      <div class="pb-[20px] flex items-center justify-between sectiondes">
         <h3 class="font-secondary font-bold text-darkgray title">Female</h3>
         <a href="" class="shop-btn capitalize font-secondary font-bold me-body16 inline-block py-[10px] px-5 border border-darkgray text-center hover:bg-blueMediq hover:border-0 hover:text-whitez rounded-full">Shop Now</a>
      </div>
      <div class="comprehensive">
         <div component-name="mediq-quality-healthcare">
            <div class="me-healthcare">
               <div class="me-season-card py-5">
                  <div class="bg-whitez rounded-[20px] hover:bg-whitez hover:shadow-cardshadow pt-[1px]">
                     <!-- <div class="sm:max-w-[9.5%] xl:max-w-[240px] 2xl:max-w-[260px] 3xl:max-w-[270px] 4xl:max-w-[300px] 7xl:max-w-[350px] bg-whitez rounded-[20px] hover:bg-far"> -->
                     <div class="relative m-[10px]">
                        <img src="{{asset('frontend/img/quality-healthcare.png')}}" alt="quality healthcare" class="w-full rounded-t-[12px]">
                        <div class="absolute bottom-0 left-0 w-full bg-meBg">
                           <p class="me-enjoy flex items-center justify-center w-full py-2 me-healthcare-status">
                              2 To Enjoy
                           </p>
                        </div>
                        <p class="w-[45px] h-[45px] rounded-full text-whitez bg-meeb5 absolute top-0 left-0 flex items-center justify-center me-body13">-35%</p>
                        <img src="{{asset('frontend/img/me-healthcareheart.svg')}}" alt="heart" class="absolute top-[14px] right-[12px] healthcare-heart">
                     </div>
                     <div>
                        <div class="p-4 font-secondary">
                           <div class="flex flex-wrap xl:gap-[4px] quality-items">
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center me-seapromo">Seasonal Promotion</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">72 Items</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">Pfizer</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">Report Explained By Doctor</p>
                           </div>
                           <p class="py-2 font-secondary font-bold text-darkgray me-body17">Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)</p>
                           <div class="flex items-center pb-2">
                              <p class="font-bold text-meeb5 me-title23">$3,185</p>
                              <p class="font-medium text-lightgray me-body13 pl-[10px]">$4,900</p>
                           </div>
                           <div class="flex pb-2 items-center font-secondary">
                              <div class="flex items-center after:content-[''] after:inline-block after:w-[4px] after:h-[4px] after:bg-lightgray after:rounded-full after:mx-1">
                                 <p><img src="{{asset('frontend/img/me-star.svg')}}" alt=""></p>
                                 <p class="font-bold text-mef4b me-body15 pl-1">4.8 <span class="text-lightgray">(50)</span></p>
                              </div>
                              <p class="font-medium text-lightgray me-body15">120+ booked</p>
                           </div>
                           <div class="flex justify-between xl:gap-[6px] pt-1 hc-two-btn">
                              <button type="button" class="font-secondary font-medium me-body16 text-darkgray bg-white shadow-btnshadow py-[7px] w-full rounded-full text-center border hover:border-blueMediq hover:text-blueMediq preview_btn">Preview</button>
                              <button type="button" class="bg-white w-[64px] shadow-btnshadow rounded-full text-center border hover:border-blueMediq compare_icon"><img src="{{asset('frontend/img/me-compare.svg')}}" alt="compare icon" class="mx-auto"></button>
                           </div>
                           <button type="button" class="text-whitez font-bold font-secondary me-body16 text-center mt-[10px] w-full rounded-[6px] py-3 status_btn cart_btn">Add to Cart</button>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="me-season-card py-5">
                  <div class="bg-whitez rounded-[20px] hover:bg-whitez hover:shadow-cardshadow pt-[1px]">
                     <!-- <div class="sm:max-w-[9.5%] xl:max-w-[240px] 2xl:max-w-[260px] 3xl:max-w-[270px] 4xl:max-w-[300px] 7xl:max-w-[350px] bg-whitez rounded-[20px] hover:bg-far"> -->
                     <div class="relative m-[10px]">
                        <img src="{{asset('frontend/img/quality-healthcare.png')}}" alt="quality healthcare" class="w-full rounded-t-[12px]">
                        <div class="absolute bottom-0 left-0 w-full bg-meBg">
                           <p class="me-enjoy flex items-center justify-center w-full py-2 me-healthcare-status">
                              2 To Enjoy
                           </p>
                        </div>
                        <p class="w-[45px] h-[45px] rounded-full text-whitez bg-meeb5 absolute top-0 left-0 flex items-center justify-center me-body13">-35%</p>
                        <img src="{{asset('frontend/img/me-healthcareheart.svg')}}" alt="heart" class="absolute top-[14px] right-[12px] healthcare-heart">
                     </div>
                     <div>
                        <div class="p-4 font-secondary">
                           <div class="flex flex-wrap xl:gap-[4px] quality-items">
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center me-seapromo">Seasonal Promotion</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">72 Items</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">Pfizer</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">Report Explained By Doctor</p>
                           </div>
                           <p class="py-2 font-secondary font-bold text-darkgray me-body17">Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)</p>
                           <div class="flex items-center pb-2">
                              <p class="font-bold text-meeb5 me-title23">$3,185</p>
                              <p class="font-medium text-lightgray me-body13 pl-[10px]">$4,900</p>
                           </div>
                           <div class="flex pb-2 items-center font-secondary">
                              <div class="flex items-center after:content-[''] after:inline-block after:w-[4px] after:h-[4px] after:bg-lightgray after:rounded-full after:mx-1">
                                 <p><img src="{{asset('frontend/img/me-star.svg')}}" alt=""></p>
                                 <p class="font-bold text-mef4b me-body15 pl-1">4.8 <span class="text-lightgray">(50)</span></p>
                              </div>
                              <p class="font-medium text-lightgray me-body15">120+ booked</p>
                           </div>
                           <div class="flex justify-between xl:gap-[6px] pt-1 hc-two-btn">
                              <button type="button" class="font-secondary font-medium me-body16 text-darkgray bg-white shadow-btnshadow py-[7px] w-full rounded-full text-center border hover:border-blueMediq hover:text-blueMediq preview_btn">Preview</button>
                              <button type="button" class="bg-white w-[64px] shadow-btnshadow rounded-full text-center border hover:border-blueMediq compare_icon"><img src="{{asset('frontend/img/me-compare.svg')}}" alt="compare icon" class="mx-auto"></button>
                           </div>
                           <button type="button" class="text-whitez font-bold font-secondary me-body16 text-center mt-[10px] w-full rounded-[6px] py-3 status_btn cart_btn">Add to Cart</button>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="me-season-card py-5">
                  <div class="bg-whitez rounded-[20px] hover:bg-whitez hover:shadow-cardshadow pt-[1px]">
                     <!-- <div class="sm:max-w-[9.5%] xl:max-w-[240px] 2xl:max-w-[260px] 3xl:max-w-[270px] 4xl:max-w-[300px] 7xl:max-w-[350px] bg-whitez rounded-[20px] hover:bg-far"> -->
                     <div class="relative m-[10px]">
                        <img src="{{asset('frontend/img/quality-healthcare.png')}}" alt="quality healthcare" class="w-full rounded-t-[12px]">
                        <div class="absolute bottom-0 left-0 w-full bg-meBg">
                           <p class="me-enjoy flex items-center justify-center w-full py-2 me-healthcare-status">
                              2 To Enjoy
                           </p>
                        </div>
                        <p class="w-[45px] h-[45px] rounded-full text-whitez bg-meeb5 absolute top-0 left-0 flex items-center justify-center me-body13">-35%</p>
                        <img src="{{asset('frontend/img/me-healthcareheart.svg')}}" alt="heart" class="absolute top-[14px] right-[12px] healthcare-heart">
                     </div>
                     <div>
                        <div class="p-4 font-secondary">
                           <div class="flex flex-wrap xl:gap-[4px] quality-items">
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center me-seapromo">Seasonal Promotion</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">72 Items</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">Pfizer</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">Report Explained By Doctor</p>
                           </div>
                           <p class="py-2 font-secondary font-bold text-darkgray me-body17">Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)</p>
                           <div class="flex items-center pb-2">
                              <p class="font-bold text-meeb5 me-title23">$3,185</p>
                              <p class="font-medium text-lightgray me-body13 pl-[10px]">$4,900</p>
                           </div>
                           <div class="flex pb-2 items-center font-secondary">
                              <div class="flex items-center after:content-[''] after:inline-block after:w-[4px] after:h-[4px] after:bg-lightgray after:rounded-full after:mx-1">
                                 <p><img src="{{asset('frontend/img/me-star.svg')}}" alt=""></p>
                                 <p class="font-bold text-mef4b me-body15 pl-1">4.8 <span class="text-lightgray">(50)</span></p>
                              </div>
                              <p class="font-medium text-lightgray me-body15">120+ booked</p>
                           </div>
                           <div class="flex justify-between xl:gap-[6px] pt-1 hc-two-btn">
                              <button type="button" class="font-secondary font-medium me-body16 text-darkgray bg-white shadow-btnshadow py-[7px] w-full rounded-full text-center border hover:border-blueMediq hover:text-blueMediq preview_btn">Preview</button>
                              <button type="button" class="bg-white w-[64px] shadow-btnshadow rounded-full text-center border hover:border-blueMediq compare_icon"><img src="{{asset('frontend/img/me-compare.svg')}}" alt="compare icon" class="mx-auto"></button>
                           </div>
                           <button type="button" class="text-whitez font-bold font-secondary me-body16 text-center mt-[10px] w-full rounded-[6px] py-3 status_btn cart_btn">Add to Cart</button>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="me-season-card py-5">
                  <div class="bg-whitez rounded-[20px] hover:bg-whitez hover:shadow-cardshadow pt-[1px]">
                     <!-- <div class="sm:max-w-[9.5%] xl:max-w-[240px] 2xl:max-w-[260px] 3xl:max-w-[270px] 4xl:max-w-[300px] 7xl:max-w-[350px] bg-whitez rounded-[20px] hover:bg-far"> -->
                     <div class="relative m-[10px]">
                        <img src="{{asset('frontend/img/quality-healthcare.png')}}" alt="quality healthcare" class="w-full rounded-t-[12px]">
                        <div class="absolute bottom-0 left-0 w-full bg-meBg">
                           <p class="me-enjoy flex items-center justify-center w-full py-2 me-healthcare-status">
                              2 To Enjoy
                           </p>
                        </div>
                        <p class="w-[45px] h-[45px] rounded-full text-whitez bg-meeb5 absolute top-0 left-0 flex items-center justify-center me-body13">-35%</p>
                        <img src="{{asset('frontend/img/me-healthcareheart.svg')}}" alt="heart" class="absolute top-[14px] right-[12px] healthcare-heart">
                     </div>
                     <div>
                        <div class="p-4 font-secondary">
                           <div class="flex flex-wrap xl:gap-[4px] quality-items">
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center me-seapromo">Seasonal Promotion</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">72 Items</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">Pfizer</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">Report Explained By Doctor</p>
                           </div>
                           <p class="py-2 font-secondary font-bold text-darkgray me-body17">Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)</p>
                           <div class="flex items-center pb-2">
                              <p class="font-bold text-meeb5 me-title23">$3,185</p>
                              <p class="font-medium text-lightgray me-body13 pl-[10px]">$4,900</p>
                           </div>
                           <div class="flex pb-2 items-center font-secondary">
                              <div class="flex items-center after:content-[''] after:inline-block after:w-[4px] after:h-[4px] after:bg-lightgray after:rounded-full after:mx-1">
                                 <p><img src="{{asset('frontend/img/me-star.svg')}}" alt=""></p>
                                 <p class="font-bold text-mef4b me-body15 pl-1">4.8 <span class="text-lightgray">(50)</span></p>
                              </div>
                              <p class="font-medium text-lightgray me-body15">120+ booked</p>
                           </div>
                           <div class="flex justify-between xl:gap-[6px] pt-1 hc-two-btn">
                              <button type="button" class="font-secondary font-medium me-body16 text-darkgray bg-white shadow-btnshadow py-[7px] w-full rounded-full text-center border hover:border-blueMediq hover:text-blueMediq preview_btn">Preview</button>
                              <button type="button" class="bg-white w-[64px] shadow-btnshadow rounded-full text-center border hover:border-blueMediq compare_icon"><img src="{{asset('frontend/img/me-compare.svg')}}" alt="compare icon" class="mx-auto"></button>
                           </div>
                           <button type="button" class="text-whitez font-bold font-secondary me-body16 text-center mt-[10px] w-full rounded-[6px] py-3 status_btn cart_btn">Add to Cart</button>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="me-season-card py-5">
                  <div class="bg-whitez rounded-[20px] hover:bg-whitez hover:shadow-cardshadow pt-[1px]">
                     <!-- <div class="sm:max-w-[9.5%] xl:max-w-[240px] 2xl:max-w-[260px] 3xl:max-w-[270px] 4xl:max-w-[300px] 7xl:max-w-[350px] bg-whitez rounded-[20px] hover:bg-far"> -->
                     <div class="relative m-[10px]">
                        <img src="{{asset('frontend/img/quality-healthcare.png')}}" alt="quality healthcare" class="w-full rounded-t-[12px]">
                        <div class="absolute bottom-0 left-0 w-full bg-meBg">
                           <p class="me-enjoy flex items-center justify-center w-full py-2 me-healthcare-status">
                              2 To Enjoy
                           </p>
                        </div>
                        <p class="w-[45px] h-[45px] rounded-full text-whitez bg-meeb5 absolute top-0 left-0 flex items-center justify-center me-body13">-35%</p>
                        <img src="{{asset('frontend/img/me-healthcareheart.svg')}}" alt="heart" class="absolute top-[14px] right-[12px] healthcare-heart">
                     </div>
                     <div>
                        <div class="p-4 font-secondary">
                           <div class="flex flex-wrap xl:gap-[4px] quality-items">
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center me-seapromo">Seasonal Promotion</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">72 Items</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">Pfizer</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">Report Explained By Doctor</p>
                           </div>
                           <p class="py-2 font-secondary font-bold text-darkgray me-body17">Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)</p>
                           <div class="flex items-center pb-2">
                              <p class="font-bold text-meeb5 me-title23">$3,185</p>
                              <p class="font-medium text-lightgray me-body13 pl-[10px]">$4,900</p>
                           </div>
                           <div class="flex pb-2 items-center font-secondary">
                              <div class="flex items-center after:content-[''] after:inline-block after:w-[4px] after:h-[4px] after:bg-lightgray after:rounded-full after:mx-1">
                                 <p><img src="{{asset('frontend/img/me-star.svg')}}" alt=""></p>
                                 <p class="font-bold text-mef4b me-body15 pl-1">4.8 <span class="text-lightgray">(50)</span></p>
                              </div>
                              <p class="font-medium text-lightgray me-body15">120+ booked</p>
                           </div>
                           <div class="flex justify-between xl:gap-[6px] pt-1 hc-two-btn">
                              <button type="button" class="font-secondary font-medium me-body16 text-darkgray bg-white shadow-btnshadow py-[7px] w-full rounded-full text-center border hover:border-blueMediq hover:text-blueMediq preview_btn">Preview</button>
                              <button type="button" class="bg-white w-[64px] shadow-btnshadow rounded-full text-center border hover:border-blueMediq compare_icon"><img src="{{asset('frontend/img/me-compare.svg')}}" alt="compare icon" class="mx-auto"></button>
                           </div>
                           <button type="button" class="text-whitez font-bold font-secondary me-body16 text-center mt-[10px] w-full rounded-[6px] py-3 status_btn cart_btn">Add to Cart</button>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="me-season-card py-5">
                  <div class="bg-whitez rounded-[20px] hover:bg-whitez hover:shadow-cardshadow pt-[1px]">
                     <!-- <div class="sm:max-w-[9.5%] xl:max-w-[240px] 2xl:max-w-[260px] 3xl:max-w-[270px] 4xl:max-w-[300px] 7xl:max-w-[350px] bg-whitez rounded-[20px] hover:bg-far"> -->
                     <div class="relative m-[10px]">
                        <img src="{{asset('frontend/img/quality-healthcare.png')}}" alt="quality healthcare" class="w-full rounded-t-[12px]">
                        <div class="absolute bottom-0 left-0 w-full bg-meBg">
                           <p class="me-enjoy flex items-center justify-center w-full py-2 me-healthcare-status">
                              2 To Enjoy
                           </p>
                        </div>
                        <p class="w-[45px] h-[45px] rounded-full text-whitez bg-meeb5 absolute top-0 left-0 flex items-center justify-center me-body13">-35%</p>
                        <img src="{{asset('frontend/img/me-healthcareheart.svg')}}" alt="heart" class="absolute top-[14px] right-[12px] healthcare-heart">
                     </div>
                     <div>
                        <div class="p-4 font-secondary">
                           <div class="flex flex-wrap xl:gap-[4px] quality-items">
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center me-seapromo">Seasonal Promotion</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">72 Items</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">Pfizer</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">Report Explained By Doctor</p>
                           </div>
                           <p class="py-2 font-secondary font-bold text-darkgray me-body17">Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)</p>
                           <div class="flex items-center pb-2">
                              <p class="font-bold text-meeb5 me-title23">$3,185</p>
                              <p class="font-medium text-lightgray me-body13 pl-[10px]">$4,900</p>
                           </div>
                           <div class="flex pb-2 items-center font-secondary">
                              <div class="flex items-center after:content-[''] after:inline-block after:w-[4px] after:h-[4px] after:bg-lightgray after:rounded-full after:mx-1">
                                 <p><img src="{{asset('frontend/img/me-star.svg')}}" alt=""></p>
                                 <p class="font-bold text-mef4b me-body15 pl-1">4.8 <span class="text-lightgray">(50)</span></p>
                              </div>
                              <p class="font-medium text-lightgray me-body15">120+ booked</p>
                           </div>
                           <div class="flex justify-between xl:gap-[6px] pt-1 hc-two-btn">
                              <button type="button" class="font-secondary font-medium me-body16 text-darkgray bg-white shadow-btnshadow py-[7px] w-full rounded-full text-center border hover:border-blueMediq hover:text-blueMediq preview_btn">Preview</button>
                              <button type="button" class="bg-white w-[64px] shadow-btnshadow rounded-full text-center border hover:border-blueMediq compare_icon"><img src="{{asset('frontend/img/me-compare.svg')}}" alt="compare icon" class="mx-auto"></button>
                           </div>
                           <button type="button" class="text-whitez font-bold font-secondary me-body16 text-center mt-[10px] w-full rounded-[6px] py-3 status_btn cart_btn">Add to Cart</button>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="me-season-card py-5">
                  <div class="bg-whitez rounded-[20px] hover:bg-whitez hover:shadow-cardshadow pt-[1px]">
                     <!-- <div class="sm:max-w-[9.5%] xl:max-w-[240px] 2xl:max-w-[260px] 3xl:max-w-[270px] 4xl:max-w-[300px] 7xl:max-w-[350px] bg-whitez rounded-[20px] hover:bg-far"> -->
                     <div class="relative m-[10px]">
                        <img src="{{asset('frontend/img/quality-healthcare.png')}}" alt="quality healthcare" class="w-full rounded-t-[12px]">
                        <div class="absolute bottom-0 left-0 w-full bg-meBg">
                           <p class="me-enjoy flex items-center justify-center w-full py-2 me-healthcare-status">
                              2 To Enjoy
                           </p>
                        </div>
                        <p class="w-[45px] h-[45px] rounded-full text-whitez bg-meeb5 absolute top-0 left-0 flex items-center justify-center me-body13">-35%</p>
                        <img src="{{asset('frontend/img/me-healthcareheart.svg')}}" alt="heart" class="absolute top-[14px] right-[12px] healthcare-heart">
                     </div>
                     <div>
                        <div class="p-4 font-secondary">
                           <div class="flex flex-wrap xl:gap-[4px] quality-items">
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center me-seapromo">Seasonal Promotion</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">72 Items</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">Pfizer</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">Report Explained By Doctor</p>
                           </div>
                           <p class="py-2 font-secondary font-bold text-darkgray me-body17">Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)</p>
                           <div class="flex items-center pb-2">
                              <p class="font-bold text-meeb5 me-title23">$3,185</p>
                              <p class="font-medium text-lightgray me-body13 pl-[10px]">$4,900</p>
                           </div>
                           <div class="flex pb-2 items-center font-secondary">
                              <div class="flex items-center after:content-[''] after:inline-block after:w-[4px] after:h-[4px] after:bg-lightgray after:rounded-full after:mx-1">
                                 <p><img src="{{asset('frontend/img/me-star.svg')}}" alt=""></p>
                                 <p class="font-bold text-mef4b me-body15 pl-1">4.8 <span class="text-lightgray">(50)</span></p>
                              </div>
                              <p class="font-medium text-lightgray me-body15">120+ booked</p>
                           </div>
                           <div class="flex justify-between xl:gap-[6px] pt-1 hc-two-btn">
                              <button type="button" class="font-secondary font-medium me-body16 text-darkgray bg-white shadow-btnshadow py-[7px] w-full rounded-full text-center border hover:border-blueMediq hover:text-blueMediq preview_btn">Preview</button>
                              <button type="button" class="bg-white w-[64px] shadow-btnshadow rounded-full text-center border hover:border-blueMediq compare_icon"><img src="{{asset('frontend/img/me-compare.svg')}}" alt="compare icon" class="mx-auto"></button>
                           </div>
                           <button type="button" class="text-whitez font-bold font-secondary me-body16 text-center mt-[10px] w-full rounded-[6px] py-3 status_btn cart_btn">Add to Cart</button>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="me-season-card py-5">
                  <div class="bg-whitez rounded-[20px] hover:bg-whitez hover:shadow-cardshadow pt-[1px]">
                     <!-- <div class="sm:max-w-[9.5%] xl:max-w-[240px] 2xl:max-w-[260px] 3xl:max-w-[270px] 4xl:max-w-[300px] 7xl:max-w-[350px] bg-whitez rounded-[20px] hover:bg-far"> -->
                     <div class="relative m-[10px]">
                        <img src="{{asset('frontend/img/quality-healthcare.png')}}" alt="quality healthcare" class="w-full rounded-t-[12px]">
                        <div class="absolute bottom-0 left-0 w-full bg-meBg">
                           <p class="me-enjoy flex items-center justify-center w-full py-2 me-healthcare-status">
                              2 To Enjoy
                           </p>
                        </div>
                        <p class="w-[45px] h-[45px] rounded-full text-whitez bg-meeb5 absolute top-0 left-0 flex items-center justify-center me-body13">-35%</p>
                        <img src="{{asset('frontend/img/me-healthcareheart.svg')}}" alt="heart" class="absolute top-[14px] right-[12px] healthcare-heart">
                     </div>
                     <div>
                        <div class="p-4 font-secondary">
                           <div class="flex flex-wrap xl:gap-[4px] quality-items">
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center me-seapromo">Seasonal Promotion</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">72 Items</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">Pfizer</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">Report Explained By Doctor</p>
                           </div>
                           <p class="py-2 font-secondary font-bold text-darkgray me-body17">Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)</p>
                           <div class="flex items-center pb-2">
                              <p class="font-bold text-meeb5 me-title23">$3,185</p>
                              <p class="font-medium text-lightgray me-body13 pl-[10px]">$4,900</p>
                           </div>
                           <div class="flex pb-2 items-center font-secondary">
                              <div class="flex items-center after:content-[''] after:inline-block after:w-[4px] after:h-[4px] after:bg-lightgray after:rounded-full after:mx-1">
                                 <p><img src="{{asset('frontend/img/me-star.svg')}}" alt=""></p>
                                 <p class="font-bold text-mef4b me-body15 pl-1">4.8 <span class="text-lightgray">(50)</span></p>
                              </div>
                              <p class="font-medium text-lightgray me-body15">120+ booked</p>
                           </div>
                           <div class="flex justify-between xl:gap-[6px] pt-1 hc-two-btn">
                              <button type="button" class="font-secondary font-medium me-body16 text-darkgray bg-white shadow-btnshadow py-[7px] w-full rounded-full text-center border hover:border-blueMediq hover:text-blueMediq preview_btn">Preview</button>
                              <button type="button" class="bg-white w-[64px] shadow-btnshadow rounded-full text-center border hover:border-blueMediq compare_icon"><img src="{{asset('frontend/img/me-compare.svg')}}" alt="compare icon" class="mx-auto"></button>
                           </div>
                           <button type="button" class="text-whitez font-bold font-secondary me-body16 text-center mt-[10px] w-full rounded-[6px] py-3 status_btn cart_btn">Add to Cart</button>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="me-season-card py-5">
                  <div class="bg-whitez rounded-[20px] hover:bg-whitez hover:shadow-cardshadow pt-[1px]">
                     <!-- <div class="sm:max-w-[9.5%] xl:max-w-[240px] 2xl:max-w-[260px] 3xl:max-w-[270px] 4xl:max-w-[300px] 7xl:max-w-[350px] bg-whitez rounded-[20px] hover:bg-far"> -->
                     <div class="relative m-[10px]">
                        <img src="{{asset('frontend/img/quality-healthcare.png')}}" alt="quality healthcare" class="w-full rounded-t-[12px]">
                        <div class="absolute bottom-0 left-0 w-full bg-meBg">
                           <p class="me-enjoy flex items-center justify-center w-full py-2 me-healthcare-status">
                              2 To Enjoy
                           </p>
                        </div>
                        <p class="w-[45px] h-[45px] rounded-full text-whitez bg-meeb5 absolute top-0 left-0 flex items-center justify-center me-body13">-35%</p>
                        <img src="{{asset('frontend/img/me-healthcareheart.svg')}}" alt="heart" class="absolute top-[14px] right-[12px] healthcare-heart">
                     </div>
                     <div>
                        <div class="p-4 font-secondary">
                           <div class="flex flex-wrap xl:gap-[4px] quality-items">
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center me-seapromo">Seasonal Promotion</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">72 Items</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">Pfizer</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">Report Explained By Doctor</p>
                           </div>
                           <p class="py-2 font-secondary font-bold text-darkgray me-body17">Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)</p>
                           <div class="flex items-center pb-2">
                              <p class="font-bold text-meeb5 me-title23">$3,185</p>
                              <p class="font-medium text-lightgray me-body13 pl-[10px]">$4,900</p>
                           </div>
                           <div class="flex pb-2 items-center font-secondary">
                              <div class="flex items-center after:content-[''] after:inline-block after:w-[4px] after:h-[4px] after:bg-lightgray after:rounded-full after:mx-1">
                                 <p><img src="{{asset('frontend/img/me-star.svg')}}" alt=""></p>
                                 <p class="font-bold text-mef4b me-body15 pl-1">4.8 <span class="text-lightgray">(50)</span></p>
                              </div>
                              <p class="font-medium text-lightgray me-body15">120+ booked</p>
                           </div>
                           <div class="">
                              <button type="button" class="font-secondary font-medium me-body16 text-darkgray bg-white shadow-btnshadow py-[7px] w-full rounded-full text-center border hover:border-blueMediq hover:text-blueMediq preview_btn">Preview</button>
                              <button type="button" class="bg-white w-[64px] shadow-btnshadow rounded-full text-center border hover:border-blueMediq compare_icon"><img src="{{asset('frontend/img/me-compare.svg')}}" alt="compare icon" class="mx-auto"></button>
                           </div>
                           <button type="button" class="text-whitez font-bold font-secondary me-body16 text-center mt-[10px] w-full rounded-[6px] py-3 status_btn cart_btn">Add to Cart</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <div id="compare-modal" class="w-full bg-orangeLight rounded-tl-[200px] pl-[100px] lg:pl-[80px] xl:pl-[100px] 5xl:pl-[180px] 7xl:pl-[280px] pr-[45px] p-5 fixed left-0 -bottom-12 z-[5] hidden compare-modal">
            <div class="flex justify-between items-center compare-two-col">
               <div class="flex gap-[24px] xl:gap-[35px] selected-items">
                  <div class="flex items-start selected-items-box relative w-1/4">
                     <div class="flex items-center selected-items-box--top pr-[24px]">
                        <p class="selected-items-box--top--img"><img src="{{asset('frontend/img/vaccine-injection.png')}}" alt="" class="rounded-[12px]"></p>
                        <p class="font-secondary font-medium me-body16 pl-[10px] selected-items-box--top--title">Hepatitis B Vaccine Injection</p>
                     </div>
                     <button class="w-6 h-6 rounded-full bg-meA3 text-white flex items-center justify-center selected-items-box-delete absolute top-0 right-0"><img src="{{asset('frontend/img/white-close.svg')}}" alt="close image" class="w-[10px]"/></button>
                  </div>
                  <div class="flex items-start selected-items-box relative w-1/4">
                     <div class="flex items-center selected-items-box--top pr-[24px]">
                        <p class="selected-items-box--top--img"><img src="{{asset('frontend/img/annual_health_check.png')}}" alt="" class="rounded-[12px]"></p>
                        <p class="font-secondary font-medium me-body16 pl-[10px] selected-items-box--top--title">Annual Health Check Plan</p>
                     </div>
                     <button class="w-6 h-6 rounded-full bg-meA3 text-white flex items-center justify-center selected-items-box-delete absolute top-0 right-0"><img src="{{asset('frontend/img/white-close.svg')}}" alt="close image" class="w-[10px]"/></button>
                  </div>
                  <div class="flex items-start selected-items-box relative w-1/4">
                     <div class="flex items-center selected-items-box--top pr-[24px]">
                        <p class="selected-items-box--top--img"><img src="{{asset('frontend/img/y-dna-check.png')}}" alt="" class="rounded-[12px]"></p>
                        <p class="font-secondary font-medium me-body16 pl-[10px] selected-items-box--top--title">Y-Chromosome DNA Test</p>
                     </div>
                     <button class="w-6 h-6 rounded-full bg-meA3 text-white flex items-center justify-center selected-items-box-delete absolute top-0 right-0"><img src="{{asset('frontend/img/white-close.svg')}}" alt="close image" class="w-[10px]"/></button>
                  </div>
                  <div class="bg-[#0000001a] w-20 h-20 rounded-[10px] flex items-center justify-center me-plus-icon cursor-pointer">
                     <img src="{{asset('frontend/img/me-plus.svg')}}" alt="plus">
                  </div>
               </div>
               <div class="flex justify-between xl:gap-[50px] compare-textbox">
                  <div class="text-center">
                     <button type="button" class="border border-darkgray py-[10px] px-5 rounded-full text-darkgray bg-whitez font-bold font-secondary me-body16 hover:border-blueMediq hover:bg-blueMediq hover:text-whitez">Compare</button>
                     <p class="pt-1 font-bold font-secondary me-body15 text-darkgray">You can compare up to 4 products.</p>
                  </div>
                  <p class="text-darkgray text-24 close-compare cursor-pointer"><img src="{{asset('frontend/img/white-close.svg')}}" alt="close image" class="invert"/></p>
               </div>
            </div>
         </div>
         <!-- The Modal -->
         <div id="add-compare-modal" class="modal hidden fixed z-[15] left-0 top-0 w-full h-full bg-black/[.75]  overflow-auto">
            <!-- Modal content -->
            <div class="modal-content max-w-[80%] lg:max-w-[700px] shadow-shadow02 my-[15%] mx-auto">
               <div class="relative rounded-[12px] bg-white">
                  <div class="flex ml-auto mr-6 w-5 h-5 absolute right-0 top-4">
                     <span class="pb-[4px] absolute left-1/2 top-1/2 -translate-y-1/2 -translate-x-1/2 close-add-compare-modal  flex items-center justify-center text-[24px] w-full cursor-pointer text-[#1A1818] focus:no-underline">&times;</span>
                  </div>
                  <div class="modal-content-plan">
                     <div class="preview-bgradient p-10 pb-5 rounded-t-[40px]">
                        <h2 class="font-secondary font-bold text-darkgray me-title29">Add to Comparison Table</h2>
                     </div>
                     <div class="bg-white p-10 pt-5 rounded-b-[40px]">
                        <p class="font-secondary font-medium text-lightgray me-body16 pb-5">You recently viewed...</p>
                        <div class="flex">
                           <div class="relative mr-3 last-of-type:pr-0 compare-img-container">
                              <img src="{{asset('frontend/img/vaccine-injection.png')}}" alt="image" class="w-[146px]">
                              <button type="button" class="border border-darkgray py-[10px] px-5 rounded-full text-darkgray bg-whitez font-bold font-secondary me-body16 hover:border-blueMediq hover:bg-blueMediq hover:text-whitez absolute left-2/4 top-2/4 -translate-x-2/4 -translate-y-2/4 hidden">Compare</button>
                           </div>
                           <div class="relative mr-3 last-of-type:pr-0 compare-img-container">
                              <img src="{{asset('frontend/img/vaccine-injection.png')}}" alt="image" class="w-[146px]">
                              <button type="button" class="border border-darkgray py-[10px] px-5 rounded-full text-darkgray bg-whitez font-bold font-secondary me-body16 hover:border-blueMediq hover:bg-blueMediq hover:text-whitez absolute left-2/4 top-2/4 -translate-x-2/4 -translate-y-2/4 hidden">Compare</button>
                           </div>
                           <div class="relative mr-3 last-of-type:pr-0 compare-img-container">
                              <img src="{{asset('frontend/img/vaccine-injection.png')}}" alt="image" class="w-[146px]">
                              <button type="button" class="border border-darkgray py-[10px] px-5 rounded-full text-darkgray bg-whitez font-bold font-secondary me-body16 hover:border-blueMediq hover:bg-blueMediq hover:text-whitez absolute left-2/4 top-2/4 -translate-x-2/4 -translate-y-2/4 hidden">Compare</button>
                           </div>
                           <div class="relative mr-3 last-of-type:pr-0 compare-img-container">
                              <img src="{{asset('frontend/img/vaccine-injection.png')}}" alt="image" class="w-[146px]">
                              <button type="button" class="border border-darkgray py-[10px] px-5 rounded-full text-darkgray bg-whitez font-bold font-secondary me-body16 hover:border-blueMediq hover:bg-blueMediq hover:text-whitez absolute left-2/4 top-2/4 -translate-x-2/4 -translate-y-2/4 hidden">Compare</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="male-container pt-[48px] pb-[20px] 2xl:pb-[80px]">
      <div class="pb-[20px] flex items-center justify-between sectiondes">
         <h3 class="font-secondary font-bold text-darkgray title">Male</h3>
         <a href="" class="shop-btn capitalize font-secondary font-bold me-body16 inline-block py-[10px] px-5 border border-darkgray text-center hover:bg-blueMediq hover:border-0 hover:text-whitez rounded-full">Shop Now</a>
      </div>
      <div class="comprehensive">
         <div component-name="mediq-quality-healthcare">
            <div class="me-healthcare">
               <div class="me-season-card py-5">
                  <div class="bg-whitez rounded-[20px] hover:bg-whitez hover:shadow-cardshadow pt-[1px]">
                     <!-- <div class="sm:max-w-[9.5%] xl:max-w-[240px] 2xl:max-w-[260px] 3xl:max-w-[270px] 4xl:max-w-[300px] 7xl:max-w-[350px] bg-whitez rounded-[20px] hover:bg-far"> -->
                     <div class="relative m-[10px]">
                        <img src="{{asset('frontend/img/quality-healthcare.png')}}" alt="quality healthcare" class="w-full rounded-t-[12px]">
                        <div class="absolute bottom-0 left-0 w-full bg-meBg">
                           <p class="me-enjoy flex items-center justify-center w-full py-2 me-healthcare-status">
                              2 To Enjoy
                           </p>
                        </div>
                        <p class="w-[45px] h-[45px] rounded-full text-whitez bg-meeb5 absolute top-0 left-0 flex items-center justify-center me-body13">-35%</p>
                        <img src="{{asset('frontend/img/me-healthcareheart.svg')}}" alt="heart" class="absolute top-[14px] right-[12px] healthcare-heart">
                     </div>
                     <div>
                        <div class="p-4 font-secondary">
                           <div class="flex flex-wrap xl:gap-[4px] quality-items">
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center me-seapromo">Seasonal Promotion</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">72 Items</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">Pfizer</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">Report Explained By Doctor</p>
                           </div>
                           <p class="py-2 font-secondary font-bold text-darkgray me-body17">Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)</p>
                           <div class="flex items-center pb-2">
                              <p class="font-bold text-meeb5 me-title23">$3,185</p>
                              <p class="font-medium text-lightgray me-body13 pl-[10px]">$4,900</p>
                           </div>
                           <div class="flex pb-2 items-center font-secondary">
                              <div class="flex items-center after:content-[''] after:inline-block after:w-[4px] after:h-[4px] after:bg-lightgray after:rounded-full after:mx-1">
                                 <p><img src="{{asset('frontend/img/me-star.svg')}}" alt=""></p>
                                 <p class="font-bold text-mef4b me-body15 pl-1">4.8 <span class="text-lightgray">(50)</span></p>
                              </div>
                              <p class="font-medium text-lightgray me-body15">120+ booked</p>
                           </div>
                           <div class="flex justify-between xl:gap-[6px] pt-1 hc-two-btn">
                              <button type="button" class="font-secondary font-medium me-body16 text-darkgray bg-white shadow-btnshadow py-[7px] w-full rounded-full text-center border hover:border-blueMediq hover:text-blueMediq preview_btn">Preview</button>
                              <button type="button" class="bg-white w-[64px] shadow-btnshadow rounded-full text-center border hover:border-blueMediq compare_icon"><img src="{{asset('frontend/img/me-compare.svg')}}" alt="compare icon" class="mx-auto"></button>
                           </div>
                           <button type="button" class="text-whitez font-bold font-secondary me-body16 text-center mt-[10px] w-full rounded-[6px] py-3 status_btn cart_btn">Add to Cart</button>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="me-season-card py-5">
                  <div class="bg-whitez rounded-[20px] hover:bg-whitez hover:shadow-cardshadow pt-[1px]">
                     <!-- <div class="sm:max-w-[9.5%] xl:max-w-[240px] 2xl:max-w-[260px] 3xl:max-w-[270px] 4xl:max-w-[300px] 7xl:max-w-[350px] bg-whitez rounded-[20px] hover:bg-far"> -->
                     <div class="relative m-[10px]">
                        <img src="{{asset('frontend/img/quality-healthcare.png')}}" alt="quality healthcare" class="w-full rounded-t-[12px]">
                        <div class="absolute bottom-0 left-0 w-full bg-meBg">
                           <p class="me-enjoy flex items-center justify-center w-full py-2 me-healthcare-status">
                              2 To Enjoy
                           </p>
                        </div>
                        <p class="w-[45px] h-[45px] rounded-full text-whitez bg-meeb5 absolute top-0 left-0 flex items-center justify-center me-body13">-35%</p>
                        <img src="{{asset('frontend/img/me-healthcareheart.svg')}}" alt="heart" class="absolute top-[14px] right-[12px] healthcare-heart">
                     </div>
                     <div>
                        <div class="p-4 font-secondary">
                           <div class="flex flex-wrap xl:gap-[4px] quality-items">
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center me-seapromo">Seasonal Promotion</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">72 Items</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">Pfizer</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">Report Explained By Doctor</p>
                           </div>
                           <p class="py-2 font-secondary font-bold text-darkgray me-body17">Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)</p>
                           <div class="flex items-center pb-2">
                              <p class="font-bold text-meeb5 me-title23">$3,185</p>
                              <p class="font-medium text-lightgray me-body13 pl-[10px]">$4,900</p>
                           </div>
                           <div class="flex pb-2 items-center font-secondary">
                              <div class="flex items-center after:content-[''] after:inline-block after:w-[4px] after:h-[4px] after:bg-lightgray after:rounded-full after:mx-1">
                                 <p><img src="{{asset('frontend/img/me-star.svg')}}" alt=""></p>
                                 <p class="font-bold text-mef4b me-body15 pl-1">4.8 <span class="text-lightgray">(50)</span></p>
                              </div>
                              <p class="font-medium text-lightgray me-body15">120+ booked</p>
                           </div>
                           <div class="flex justify-between xl:gap-[6px] pt-1 hc-two-btn">
                              <button type="button" class="font-secondary font-medium me-body16 text-darkgray bg-white shadow-btnshadow py-[7px] w-full rounded-full text-center border hover:border-blueMediq hover:text-blueMediq preview_btn">Preview</button>
                              <button type="button" class="bg-white w-[64px] shadow-btnshadow rounded-full text-center border hover:border-blueMediq compare_icon"><img src="{{asset('frontend/img/me-compare.svg')}}" alt="compare icon" class="mx-auto"></button>
                           </div>
                           <button type="button" class="text-whitez font-bold font-secondary me-body16 text-center mt-[10px] w-full rounded-[6px] py-3 status_btn cart_btn">Add to Cart</button>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="me-season-card py-5">
                  <div class="bg-whitez rounded-[20px] hover:bg-whitez hover:shadow-cardshadow pt-[1px]">
                     <!-- <div class="sm:max-w-[9.5%] xl:max-w-[240px] 2xl:max-w-[260px] 3xl:max-w-[270px] 4xl:max-w-[300px] 7xl:max-w-[350px] bg-whitez rounded-[20px] hover:bg-far"> -->
                     <div class="relative m-[10px]">
                        <img src="{{asset('frontend/img/quality-healthcare.png')}}" alt="quality healthcare" class="w-full rounded-t-[12px]">
                        <div class="absolute bottom-0 left-0 w-full bg-meBg">
                           <p class="me-enjoy flex items-center justify-center w-full py-2 me-healthcare-status">
                              2 To Enjoy
                           </p>
                        </div>
                        <p class="w-[45px] h-[45px] rounded-full text-whitez bg-meeb5 absolute top-0 left-0 flex items-center justify-center me-body13">-35%</p>
                        <img src="{{asset('frontend/img/me-healthcareheart.svg')}}" alt="heart" class="absolute top-[14px] right-[12px] healthcare-heart">
                     </div>
                     <div>
                        <div class="p-4 font-secondary">
                           <div class="flex flex-wrap xl:gap-[4px] quality-items">
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center me-seapromo">Seasonal Promotion</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">72 Items</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">Pfizer</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">Report Explained By Doctor</p>
                           </div>
                           <p class="py-2 font-secondary font-bold text-darkgray me-body17">Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)</p>
                           <div class="flex items-center pb-2">
                              <p class="font-bold text-meeb5 me-title23">$3,185</p>
                              <p class="font-medium text-lightgray me-body13 pl-[10px]">$4,900</p>
                           </div>
                           <div class="flex pb-2 items-center font-secondary">
                              <div class="flex items-center after:content-[''] after:inline-block after:w-[4px] after:h-[4px] after:bg-lightgray after:rounded-full after:mx-1">
                                 <p><img src="{{asset('frontend/img/me-star.svg')}}" alt=""></p>
                                 <p class="font-bold text-mef4b me-body15 pl-1">4.8 <span class="text-lightgray">(50)</span></p>
                              </div>
                              <p class="font-medium text-lightgray me-body15">120+ booked</p>
                           </div>
                           <div class="flex justify-between xl:gap-[6px] pt-1 hc-two-btn">
                              <button type="button" class="font-secondary font-medium me-body16 text-darkgray bg-white shadow-btnshadow py-[7px] w-full rounded-full text-center border hover:border-blueMediq hover:text-blueMediq preview_btn">Preview</button>
                              <button type="button" class="bg-white w-[64px] shadow-btnshadow rounded-full text-center border hover:border-blueMediq compare_icon"><img src="{{asset('frontend/img/me-compare.svg')}}" alt="compare icon" class="mx-auto"></button>
                           </div>
                           <button type="button" class="text-whitez font-bold font-secondary me-body16 text-center mt-[10px] w-full rounded-[6px] py-3 status_btn cart_btn">Add to Cart</button>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="me-season-card py-5">
                  <div class="bg-whitez rounded-[20px] hover:bg-whitez hover:shadow-cardshadow pt-[1px]">
                     <!-- <div class="sm:max-w-[9.5%] xl:max-w-[240px] 2xl:max-w-[260px] 3xl:max-w-[270px] 4xl:max-w-[300px] 7xl:max-w-[350px] bg-whitez rounded-[20px] hover:bg-far"> -->
                     <div class="relative m-[10px]">
                        <img src="{{asset('frontend/img/quality-healthcare.png')}}" alt="quality healthcare" class="w-full rounded-t-[12px]">
                        <div class="absolute bottom-0 left-0 w-full bg-meBg">
                           <p class="me-enjoy flex items-center justify-center w-full py-2 me-healthcare-status">
                              2 To Enjoy
                           </p>
                        </div>
                        <p class="w-[45px] h-[45px] rounded-full text-whitez bg-meeb5 absolute top-0 left-0 flex items-center justify-center me-body13">-35%</p>
                        <img src="{{asset('frontend/img/me-healthcareheart.svg')}}" alt="heart" class="absolute top-[14px] right-[12px] healthcare-heart">
                     </div>
                     <div>
                        <div class="p-4 font-secondary">
                           <div class="flex flex-wrap xl:gap-[4px] quality-items">
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center me-seapromo">Seasonal Promotion</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">72 Items</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">Pfizer</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">Report Explained By Doctor</p>
                           </div>
                           <p class="py-2 font-secondary font-bold text-darkgray me-body17">Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)</p>
                           <div class="flex items-center pb-2">
                              <p class="font-bold text-meeb5 me-title23">$3,185</p>
                              <p class="font-medium text-lightgray me-body13 pl-[10px]">$4,900</p>
                           </div>
                           <div class="flex pb-2 items-center font-secondary">
                              <div class="flex items-center after:content-[''] after:inline-block after:w-[4px] after:h-[4px] after:bg-lightgray after:rounded-full after:mx-1">
                                 <p><img src="{{asset('frontend/img/me-star.svg')}}" alt=""></p>
                                 <p class="font-bold text-mef4b me-body15 pl-1">4.8 <span class="text-lightgray">(50)</span></p>
                              </div>
                              <p class="font-medium text-lightgray me-body15">120+ booked</p>
                           </div>
                           <div class="flex justify-between xl:gap-[6px] pt-1 hc-two-btn">
                              <button type="button" class="font-secondary font-medium me-body16 text-darkgray bg-white shadow-btnshadow py-[7px] w-full rounded-full text-center border hover:border-blueMediq hover:text-blueMediq preview_btn">Preview</button>
                              <button type="button" class="bg-white w-[64px] shadow-btnshadow rounded-full text-center border hover:border-blueMediq compare_icon"><img src="{{asset('frontend/img/me-compare.svg')}}" alt="compare icon" class="mx-auto"></button>
                           </div>
                           <button type="button" class="text-whitez font-bold font-secondary me-body16 text-center mt-[10px] w-full rounded-[6px] py-3 status_btn cart_btn">Add to Cart</button>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="me-season-card py-5">
                  <div class="bg-whitez rounded-[20px] hover:bg-whitez hover:shadow-cardshadow pt-[1px]">
                     <!-- <div class="sm:max-w-[9.5%] xl:max-w-[240px] 2xl:max-w-[260px] 3xl:max-w-[270px] 4xl:max-w-[300px] 7xl:max-w-[350px] bg-whitez rounded-[20px] hover:bg-far"> -->
                     <div class="relative m-[10px]">
                        <img src="{{asset('frontend/img/quality-healthcare.png')}}" alt="quality healthcare" class="w-full rounded-t-[12px]">
                        <div class="absolute bottom-0 left-0 w-full bg-meBg">
                           <p class="me-enjoy flex items-center justify-center w-full py-2 me-healthcare-status">
                              2 To Enjoy
                           </p>
                        </div>
                        <p class="w-[45px] h-[45px] rounded-full text-whitez bg-meeb5 absolute top-0 left-0 flex items-center justify-center me-body13">-35%</p>
                        <img src="{{asset('frontend/img/me-healthcareheart.svg')}}" alt="heart" class="absolute top-[14px] right-[12px] healthcare-heart">
                     </div>
                     <div>
                        <div class="p-4 font-secondary">
                           <div class="flex flex-wrap xl:gap-[4px] quality-items">
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center me-seapromo">Seasonal Promotion</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">72 Items</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">Pfizer</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">Report Explained By Doctor</p>
                           </div>
                           <p class="py-2 font-secondary font-bold text-darkgray me-body17">Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)</p>
                           <div class="flex items-center pb-2">
                              <p class="font-bold text-meeb5 me-title23">$3,185</p>
                              <p class="font-medium text-lightgray me-body13 pl-[10px]">$4,900</p>
                           </div>
                           <div class="flex pb-2 items-center font-secondary">
                              <div class="flex items-center after:content-[''] after:inline-block after:w-[4px] after:h-[4px] after:bg-lightgray after:rounded-full after:mx-1">
                                 <p><img src="{{asset('frontend/img/me-star.svg')}}" alt=""></p>
                                 <p class="font-bold text-mef4b me-body15 pl-1">4.8 <span class="text-lightgray">(50)</span></p>
                              </div>
                              <p class="font-medium text-lightgray me-body15">120+ booked</p>
                           </div>
                           <div class="flex justify-between xl:gap-[6px] pt-1 hc-two-btn">
                              <button type="button" class="font-secondary font-medium me-body16 text-darkgray bg-white shadow-btnshadow py-[7px] w-full rounded-full text-center border hover:border-blueMediq hover:text-blueMediq preview_btn">Preview</button>
                              <button type="button" class="bg-white w-[64px] shadow-btnshadow rounded-full text-center border hover:border-blueMediq compare_icon"><img src="{{asset('frontend/img/me-compare.svg')}}" alt="compare icon" class="mx-auto"></button>
                           </div>
                           <button type="button" class="text-whitez font-bold font-secondary me-body16 text-center mt-[10px] w-full rounded-[6px] py-3 status_btn cart_btn">Add to Cart</button>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="me-season-card py-5">
                  <div class="bg-whitez rounded-[20px] hover:bg-whitez hover:shadow-cardshadow pt-[1px]">
                     <!-- <div class="sm:max-w-[9.5%] xl:max-w-[240px] 2xl:max-w-[260px] 3xl:max-w-[270px] 4xl:max-w-[300px] 7xl:max-w-[350px] bg-whitez rounded-[20px] hover:bg-far"> -->
                     <div class="relative m-[10px]">
                        <img src="{{asset('frontend/img/quality-healthcare.png')}}" alt="quality healthcare" class="w-full rounded-t-[12px]">
                        <div class="absolute bottom-0 left-0 w-full bg-meBg">
                           <p class="me-enjoy flex items-center justify-center w-full py-2 me-healthcare-status">
                              2 To Enjoy
                           </p>
                        </div>
                        <p class="w-[45px] h-[45px] rounded-full text-whitez bg-meeb5 absolute top-0 left-0 flex items-center justify-center me-body13">-35%</p>
                        <img src="{{asset('frontend/img/me-healthcareheart.svg')}}" alt="heart" class="absolute top-[14px] right-[12px] healthcare-heart">
                     </div>
                     <div>
                        <div class="p-4 font-secondary">
                           <div class="flex flex-wrap xl:gap-[4px] quality-items">
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center me-seapromo">Seasonal Promotion</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">72 Items</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">Pfizer</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">Report Explained By Doctor</p>
                           </div>
                           <p class="py-2 font-secondary font-bold text-darkgray me-body17">Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)</p>
                           <div class="flex items-center pb-2">
                              <p class="font-bold text-meeb5 me-title23">$3,185</p>
                              <p class="font-medium text-lightgray me-body13 pl-[10px]">$4,900</p>
                           </div>
                           <div class="flex pb-2 items-center font-secondary">
                              <div class="flex items-center after:content-[''] after:inline-block after:w-[4px] after:h-[4px] after:bg-lightgray after:rounded-full after:mx-1">
                                 <p><img src="{{asset('frontend/img/me-star.svg')}}" alt=""></p>
                                 <p class="font-bold text-mef4b me-body15 pl-1">4.8 <span class="text-lightgray">(50)</span></p>
                              </div>
                              <p class="font-medium text-lightgray me-body15">120+ booked</p>
                           </div>
                           <div class="flex justify-between xl:gap-[6px] pt-1 hc-two-btn">
                              <button type="button" class="font-secondary font-medium me-body16 text-darkgray bg-white shadow-btnshadow py-[7px] w-full rounded-full text-center border hover:border-blueMediq hover:text-blueMediq preview_btn">Preview</button>
                              <button type="button" class="bg-white w-[64px] shadow-btnshadow rounded-full text-center border hover:border-blueMediq compare_icon"><img src="{{asset('frontend/img/me-compare.svg')}}" alt="compare icon" class="mx-auto"></button>
                           </div>
                           <button type="button" class="text-whitez font-bold font-secondary me-body16 text-center mt-[10px] w-full rounded-[6px] py-3 status_btn cart_btn">Add to Cart</button>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="me-season-card py-5">
                  <div class="bg-whitez rounded-[20px] hover:bg-whitez hover:shadow-cardshadow pt-[1px]">
                     <!-- <div class="sm:max-w-[9.5%] xl:max-w-[240px] 2xl:max-w-[260px] 3xl:max-w-[270px] 4xl:max-w-[300px] 7xl:max-w-[350px] bg-whitez rounded-[20px] hover:bg-far"> -->
                     <div class="relative m-[10px]">
                        <img src="{{asset('frontend/img/quality-healthcare.png')}}" alt="quality healthcare" class="w-full rounded-t-[12px]">
                        <div class="absolute bottom-0 left-0 w-full bg-meBg">
                           <p class="me-enjoy flex items-center justify-center w-full py-2 me-healthcare-status">
                              2 To Enjoy
                           </p>
                        </div>
                        <p class="w-[45px] h-[45px] rounded-full text-whitez bg-meeb5 absolute top-0 left-0 flex items-center justify-center me-body13">-35%</p>
                        <img src="{{asset('frontend/img/me-healthcareheart.svg')}}" alt="heart" class="absolute top-[14px] right-[12px] healthcare-heart">
                     </div>
                     <div>
                        <div class="p-4 font-secondary">
                           <div class="flex flex-wrap xl:gap-[4px] quality-items">
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center me-seapromo">Seasonal Promotion</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">72 Items</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">Pfizer</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">Report Explained By Doctor</p>
                           </div>
                           <p class="py-2 font-secondary font-bold text-darkgray me-body17">Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)</p>
                           <div class="flex items-center pb-2">
                              <p class="font-bold text-meeb5 me-title23">$3,185</p>
                              <p class="font-medium text-lightgray me-body13 pl-[10px]">$4,900</p>
                           </div>
                           <div class="flex pb-2 items-center font-secondary">
                              <div class="flex items-center after:content-[''] after:inline-block after:w-[4px] after:h-[4px] after:bg-lightgray after:rounded-full after:mx-1">
                                 <p><img src="{{asset('frontend/img/me-star.svg')}}" alt=""></p>
                                 <p class="font-bold text-mef4b me-body15 pl-1">4.8 <span class="text-lightgray">(50)</span></p>
                              </div>
                              <p class="font-medium text-lightgray me-body15">120+ booked</p>
                           </div>
                           <div class="flex justify-between xl:gap-[6px] pt-1 hc-two-btn">
                              <button type="button" class="font-secondary font-medium me-body16 text-darkgray bg-white shadow-btnshadow py-[7px] w-full rounded-full text-center border hover:border-blueMediq hover:text-blueMediq preview_btn">Preview</button>
                              <button type="button" class="bg-white w-[64px] shadow-btnshadow rounded-full text-center border hover:border-blueMediq compare_icon"><img src="{{asset('frontend/img/me-compare.svg')}}" alt="compare icon" class="mx-auto"></button>
                           </div>
                           <button type="button" class="text-whitez font-bold font-secondary me-body16 text-center mt-[10px] w-full rounded-[6px] py-3 status_btn cart_btn">Add to Cart</button>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="me-season-card py-5">
                  <div class="bg-whitez rounded-[20px] hover:bg-whitez hover:shadow-cardshadow pt-[1px]">
                     <!-- <div class="sm:max-w-[9.5%] xl:max-w-[240px] 2xl:max-w-[260px] 3xl:max-w-[270px] 4xl:max-w-[300px] 7xl:max-w-[350px] bg-whitez rounded-[20px] hover:bg-far"> -->
                     <div class="relative m-[10px]">
                        <img src="{{asset('frontend/img/quality-healthcare.png')}}" alt="quality healthcare" class="w-full rounded-t-[12px]">
                        <div class="absolute bottom-0 left-0 w-full bg-meBg">
                           <p class="me-enjoy flex items-center justify-center w-full py-2 me-healthcare-status">
                              2 To Enjoy
                           </p>
                        </div>
                        <p class="w-[45px] h-[45px] rounded-full text-whitez bg-meeb5 absolute top-0 left-0 flex items-center justify-center me-body13">-35%</p>
                        <img src="{{asset('frontend/img/me-healthcareheart.svg')}}" alt="heart" class="absolute top-[14px] right-[12px] healthcare-heart">
                     </div>
                     <div>
                        <div class="p-4 font-secondary">
                           <div class="flex flex-wrap xl:gap-[4px] quality-items">
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center me-seapromo">Seasonal Promotion</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">72 Items</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">Pfizer</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">Report Explained By Doctor</p>
                           </div>
                           <p class="py-2 font-secondary font-bold text-darkgray me-body17">Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)</p>
                           <div class="flex items-center pb-2">
                              <p class="font-bold text-meeb5 me-title23">$3,185</p>
                              <p class="font-medium text-lightgray me-body13 pl-[10px]">$4,900</p>
                           </div>
                           <div class="flex pb-2 items-center font-secondary">
                              <div class="flex items-center after:content-[''] after:inline-block after:w-[4px] after:h-[4px] after:bg-lightgray after:rounded-full after:mx-1">
                                 <p><img src="{{asset('frontend/img/me-star.svg')}}" alt=""></p>
                                 <p class="font-bold text-mef4b me-body15 pl-1">4.8 <span class="text-lightgray">(50)</span></p>
                              </div>
                              <p class="font-medium text-lightgray me-body15">120+ booked</p>
                           </div>
                           <div class="flex justify-between xl:gap-[6px] pt-1 hc-two-btn">
                              <button type="button" class="font-secondary font-medium me-body16 text-darkgray bg-white shadow-btnshadow py-[7px] w-full rounded-full text-center border hover:border-blueMediq hover:text-blueMediq preview_btn">Preview</button>
                              <button type="button" class="bg-white w-[64px] shadow-btnshadow rounded-full text-center border hover:border-blueMediq compare_icon"><img src="{{asset('frontend/img/me-compare.svg')}}" alt="compare icon" class="mx-auto"></button>
                           </div>
                           <button type="button" class="text-whitez font-bold font-secondary me-body16 text-center mt-[10px] w-full rounded-[6px] py-3 status_btn cart_btn">Add to Cart</button>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="me-season-card py-5">
                  <div class="bg-whitez rounded-[20px] hover:bg-whitez hover:shadow-cardshadow pt-[1px]">
                     <!-- <div class="sm:max-w-[9.5%] xl:max-w-[240px] 2xl:max-w-[260px] 3xl:max-w-[270px] 4xl:max-w-[300px] 7xl:max-w-[350px] bg-whitez rounded-[20px] hover:bg-far"> -->
                     <div class="relative m-[10px]">
                        <img src="{{asset('frontend/img/quality-healthcare.png')}}" alt="quality healthcare" class="w-full rounded-t-[12px]">
                        <div class="absolute bottom-0 left-0 w-full bg-meBg">
                           <p class="me-enjoy flex items-center justify-center w-full py-2 me-healthcare-status">
                              2 To Enjoy
                           </p>
                        </div>
                        <p class="w-[45px] h-[45px] rounded-full text-whitez bg-meeb5 absolute top-0 left-0 flex items-center justify-center me-body13">-35%</p>
                        <img src="{{asset('frontend/img/me-healthcareheart.svg')}}" alt="heart" class="absolute top-[14px] right-[12px] healthcare-heart">
                     </div>
                     <div>
                        <div class="p-4 font-secondary">
                           <div class="flex flex-wrap xl:gap-[4px] quality-items">
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center me-seapromo">Seasonal Promotion</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">72 Items</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">Pfizer</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">Report Explained By Doctor</p>
                           </div>
                           <p class="py-2 font-secondary font-bold text-darkgray me-body17">Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)</p>
                           <div class="flex items-center pb-2">
                              <p class="font-bold text-meeb5 me-title23">$3,185</p>
                              <p class="font-medium text-lightgray me-body13 pl-[10px]">$4,900</p>
                           </div>
                           <div class="flex pb-2 items-center font-secondary">
                              <div class="flex items-center after:content-[''] after:inline-block after:w-[4px] after:h-[4px] after:bg-lightgray after:rounded-full after:mx-1">
                                 <p><img src="{{asset('frontend/img/me-star.svg')}}" alt=""></p>
                                 <p class="font-bold text-mef4b me-body15 pl-1">4.8 <span class="text-lightgray">(50)</span></p>
                              </div>
                              <p class="font-medium text-lightgray me-body15">120+ booked</p>
                           </div>
                           <div class="flex justify-between xl:gap-[6px] pt-1 hc-two-btn">
                              <button type="button" class="font-secondary font-medium me-body16 text-darkgray bg-white shadow-btnshadow py-[7px] w-full rounded-full text-center border hover:border-blueMediq hover:text-blueMediq preview_btn">Preview</button>
                              <button type="button" class="bg-white w-[64px] shadow-btnshadow rounded-full text-center border hover:border-blueMediq compare_icon"><img src="{{asset('frontend/img/me-compare.svg')}}" alt="compare icon" class="mx-auto"></button>
                           </div>
                           <button type="button" class="text-whitez font-bold font-secondary me-body16 text-center mt-[10px] w-full rounded-[6px] py-3 status_btn cart_btn">Add to Cart</button>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="me-season-card py-5">
                  <div class="bg-whitez rounded-[20px] hover:bg-whitez hover:shadow-cardshadow pt-[1px]">
                     <!-- <div class="sm:max-w-[9.5%] xl:max-w-[240px] 2xl:max-w-[260px] 3xl:max-w-[270px] 4xl:max-w-[300px] 7xl:max-w-[350px] bg-whitez rounded-[20px] hover:bg-far"> -->
                     <div class="relative m-[10px]">
                        <img src="{{asset('frontend/img/quality-healthcare.png')}}" alt="quality healthcare" class="w-full rounded-t-[12px]">
                        <div class="absolute bottom-0 left-0 w-full bg-meBg">
                           <p class="me-enjoy flex items-center justify-center w-full py-2 me-healthcare-status">
                              2 To Enjoy
                           </p>
                        </div>
                        <p class="w-[45px] h-[45px] rounded-full text-whitez bg-meeb5 absolute top-0 left-0 flex items-center justify-center me-body13">-35%</p>
                        <img src="{{asset('frontend/img/me-healthcareheart.svg')}}" alt="heart" class="absolute top-[14px] right-[12px] healthcare-heart">
                     </div>
                     <div>
                        <div class="p-4 font-secondary">
                           <div class="flex flex-wrap xl:gap-[4px] quality-items">
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center me-seapromo">Seasonal Promotion</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">72 Items</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">Pfizer</p>
                              <p class="quality-title bg-far py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">Report Explained By Doctor</p>
                           </div>
                           <p class="py-2 font-secondary font-bold text-darkgray me-body17">Medtimes Women Ultrasound Health Check Plan (Thin Pap・STM)</p>
                           <div class="flex items-center pb-2">
                              <p class="font-bold text-meeb5 me-title23">$3,185</p>
                              <p class="font-medium text-lightgray me-body13 pl-[10px]">$4,900</p>
                           </div>
                           <div class="flex pb-2 items-center font-secondary">
                              <div class="flex items-center after:content-[''] after:inline-block after:w-[4px] after:h-[4px] after:bg-lightgray after:rounded-full after:mx-1">
                                 <p><img src="{{asset('frontend/img/me-star.svg')}}" alt=""></p>
                                 <p class="font-bold text-mef4b me-body15 pl-1">4.8 <span class="text-lightgray">(50)</span></p>
                              </div>
                              <p class="font-medium text-lightgray me-body15">120+ booked</p>
                           </div>
                           <div class="flex justify-between xl:gap-[6px] pt-1 hc-two-btn">
                              <button type="button" class="font-secondary font-medium me-body16 text-darkgray bg-white shadow-btnshadow py-[7px] w-full rounded-full text-center border hover:border-blueMediq hover:text-blueMediq preview_btn">Preview</button>
                              <button type="button" class="bg-white w-[64px] shadow-btnshadow rounded-full text-center border hover:border-blueMediq compare_icon"><img src="{{asset('frontend/img/me-compare.svg')}}" alt="compare icon" class="mx-auto"></button>
                           </div>
                           <button type="button" class="text-whitez font-bold font-secondary me-body16 text-center mt-[10px] w-full rounded-[6px] py-3 status_btn cart_btn">Add to Cart</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <div id="compare-modal" class="w-full bg-orangeLight rounded-tl-[200px] pl-[100px] lg:pl-[80px] xl:pl-[100px] 5xl:pl-[180px] 7xl:pl-[280px] pr-[45px] p-5 fixed left-0 -bottom-12 z-[5] hidden compare-modal">
            <div class="flex justify-between items-center compare-two-col">
               <div class="flex gap-[24px] xl:gap-[35px] selected-items">
                  <div class="flex items-start selected-items-box relative w-1/4">
                     <div class="flex items-center selected-items-box--top pr-[24px]">
                        <p class="selected-items-box--top--img"><img src="{{asset('frontend/img/vaccine-injection.png')}}" alt="" class="rounded-[12px]"></p>
                        <p class="font-secondary font-medium me-body16 pl-[10px] selected-items-box--top--title">Hepatitis B Vaccine Injection</p>
                     </div>
                     <button class="w-6 h-6 rounded-full bg-meA3 text-white flex items-center justify-center selected-items-box-delete absolute top-0 right-0"><img src="{{asset('frontend/img/white-close.svg')}}" alt="close image" class="w-[10px]"/></button>
                  </div>
                  <div class="flex items-start selected-items-box relative w-1/4">
                     <div class="flex items-center selected-items-box--top pr-[24px]">
                        <p class="selected-items-box--top--img"><img src="{{asset('frontend/img/annual_health_check.png')}}" alt="" class="rounded-[12px]"></p>
                        <p class="font-secondary font-medium me-body16 pl-[10px] selected-items-box--top--title">Annual Health Check Plan</p>
                     </div>
                     <button class="w-6 h-6 rounded-full bg-meA3 text-white flex items-center justify-center selected-items-box-delete absolute top-0 right-0"><img src="{{asset('frontend/img/white-close.svg')}}" alt="close image" class="w-[10px]"/></button>
                  </div>
                  <div class="flex items-start selected-items-box relative w-1/4">
                     <div class="flex items-center selected-items-box--top pr-[24px]">
                        <p class="selected-items-box--top--img"><img src="{{asset('frontend/img/y-dna-check.png')}}" alt="" class="rounded-[12px]"></p>
                        <p class="font-secondary font-medium me-body16 pl-[10px] selected-items-box--top--title">Y-Chromosome DNA Test</p>
                     </div>
                     <button class="w-6 h-6 rounded-full bg-meA3 text-white flex items-center justify-center selected-items-box-delete absolute top-0 right-0"><img src="{{asset('frontend/img/white-close.svg')}}" alt="close image" class="w-[10px]"/></button>
                  </div>
                  <div class="bg-[#0000001a] w-20 h-20 rounded-[10px] flex items-center justify-center me-plus-icon cursor-pointer">
                     <img src="{{asset('frontend/img/me-plus.svg')}}" alt="plus">
                  </div>
               </div>
               <div class="flex justify-between xl:gap-[50px] compare-textbox">
                  <div class="text-center">
                     <button type="button" class="border border-darkgray py-[10px] px-5 rounded-full text-darkgray bg-whitez font-bold font-secondary me-body16 hover:border-blueMediq hover:bg-blueMediq hover:text-whitez">Compare</button>
                     <p class="pt-1 font-bold font-secondary me-body15 text-darkgray">You can compare up to 4 products.</p>
                  </div>
                  <p class="text-darkgray text-24 close-compare cursor-pointer"><img src="{{asset('frontend/img/white-close.svg')}}" alt="close image" class="invert"/></p>
               </div>
            </div>
         </div>
         <!-- The Modal -->
         <div id="add-compare-modal" class="modal hidden fixed z-[15] left-0 top-0 w-full h-full bg-black/[.75]  overflow-auto">
            <!-- Modal content -->
            <div class="modal-content max-w-[80%] lg:max-w-[700px] shadow-shadow02 my-[15%] mx-auto">
               <div class="relative rounded-[12px] bg-white">
                  <div class="flex ml-auto mr-6 w-5 h-5 absolute right-0 top-4">
                     <span class="pb-[4px] absolute left-1/2 top-1/2 -translate-y-1/2 -translate-x-1/2 close-add-compare-modal  flex items-center justify-center text-[24px] w-full cursor-pointer text-[#1A1818] focus:no-underline">&times;</span>
                  </div>
                  <div class="modal-content-plan">
                     <div class="preview-bgradient p-10 pb-5 rounded-t-[40px]">
                        <h2 class="font-secondary font-bold text-darkgray me-title29">Add to Comparison Table</h2>
                     </div>
                     <div class="bg-white p-10 pt-5 rounded-b-[40px]">
                        <p class="font-secondary font-medium text-lightgray me-body16 pb-5">You recently viewed...</p>
                        <div class="flex">
                           <div class="relative mr-3 last-of-type:pr-0 compare-img-container">
                              <img src="{{asset('frontend/img/vaccine-injection.png')}}" alt="image" class="w-[146px]">
                              <button type="button" class="border border-darkgray py-[10px] px-5 rounded-full text-darkgray bg-whitez font-bold font-secondary me-body16 hover:border-blueMediq hover:bg-blueMediq hover:text-whitez absolute left-2/4 top-2/4 -translate-x-2/4 -translate-y-2/4 hidden">Compare</button>
                           </div>
                           <div class="relative mr-3 last-of-type:pr-0 compare-img-container">
                              <img src="{{asset('frontend/img/vaccine-injection.png')}}" alt="image" class="w-[146px]">
                              <button type="button" class="border border-darkgray py-[10px] px-5 rounded-full text-darkgray bg-whitez font-bold font-secondary me-body16 hover:border-blueMediq hover:bg-blueMediq hover:text-whitez absolute left-2/4 top-2/4 -translate-x-2/4 -translate-y-2/4 hidden">Compare</button>
                           </div>
                           <div class="relative mr-3 last-of-type:pr-0 compare-img-container">
                              <img src="{{asset('frontend/img/vaccine-injection.png')}}" alt="image" class="w-[146px]">
                              <button type="button" class="border border-darkgray py-[10px] px-5 rounded-full text-darkgray bg-whitez font-bold font-secondary me-body16 hover:border-blueMediq hover:bg-blueMediq hover:text-whitez absolute left-2/4 top-2/4 -translate-x-2/4 -translate-y-2/4 hidden">Compare</button>
                           </div>
                           <div class="relative mr-3 last-of-type:pr-0 compare-img-container">
                              <img src="{{asset('frontend/img/vaccine-injection.png')}}" alt="image" class="w-[146px]">
                              <button type="button" class="border border-darkgray py-[10px] px-5 rounded-full text-darkgray bg-whitez font-bold font-secondary me-body16 hover:border-blueMediq hover:bg-blueMediq hover:text-whitez absolute left-2/4 top-2/4 -translate-x-2/4 -translate-y-2/4 hidden">Compare</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div> --}}
    </div>

    @if (count($subCates) > 0)
        @foreach ($subCates as $category)
            @php
                $categoryProducts = App\Models\Product::where('category_id', $category->category_id)->where('is_show_home',1)->orderByRaw('-sort_by_for_home DESC')->get();
            @endphp
            @foreach ($categoryProducts as $key => $product)
                {{-- @include('frontend.product-modal') --}}
                <div class="custom-product-modal"></div>
            @endforeach
        @endforeach
    @endif

    @include('frontend.home.service_solution')

    @include('frontend.home.coupon_section')

    <div component-name="me-coupon-view-bundle" class="view-bundle-modal">
        <div class="rounded-[20px] view-bundle-modal--container">
            <div class="bg-image w-full">
                <img src="{{ asset('frontend/img/getcoupon-bg.png') }}" alt="background image" class="gcbg">
                <button class="white-close-btn absolute top-[25px] right-[45px]"><img
                        src="{{ asset('frontend/img/white-close.svg') }}" alt="white close image" /></button>
                <div class="bg-whitez pt-[70px] relative bg-title px-[40px]">
                    <div class="quantity-logo-container">
                        <img src="{{ asset('frontend/img/quantity-logo.png') }}" alt="logo"
                            class="quantity-logo w-[100px] h-[100px]" />
                    </div>
                    <p class="text-center quatitle">Mobile Medical and Health Check Centre Limited</p>
                    <div class="flex items-center justify-between py-[20px] quhealth">
                        <p class="flex items-center justify-start quades">
                            <img src="{{ asset('frontend/img/gift-black.svg') }}" alt="gift-black"
                                class="black-gift mr-[12px]">
                            $150 off Min. Spend $2,200
                        </p>
                        <button
                            class="qua-collect-all-btn font-secondary font-bold me-body16 inline-block py-[10px] px-5 border border-darkgray text-center hover:bg-blueMediq hover:border-blueMediq hover:text-whitez rounded-full">Collect
                            All</button>
                    </div>
                </div>
            </div>
            <div class="custom-divider">
            </div>
            <div class="cscard-container">
                <div component-name="me-coupon-small-card" class="small-coupon">
                    <div class="w-full small-coupon--container">
                        <div class="relative collect">
                            <img src="{{ asset('frontend/img/coupon-small.png') }}" class="voucher-shape" />
                            <div class="gccard rounded-[20px] collect">
                                <div class="gccard-top bg-no-repeat h-[100px] relative bg-cover">
                                    <div class="limited-text absolute top-0 left-0 bg-orangeMediq text-white ">
                                        Limited
                                    </div>
                                </div>
                                <div class="gccard-content text-center">
                                    <div class="cclogo-container rounded-full">
                                        <img class="cclogo border-mee4 rounded-full w-[72px] h-[72px]"
                                            src="{{ asset('frontend/img/quantity-logo.png') }}" />
                                    </div>
                                    <div class="gccard-content-body">
                                        <p class="company-name mb-5 text-darkgray">$150 off Min. Spend $2,200 Spending</p>
                                        <div class="flex justify-start items-center flex-wrap">
                                            <p class="ccategory text-lightgray">Body Check </p>
                                        </div>
                                    </div>
                                    <div class="gccard-content-bottom">
                                        <button
                                            class="collect-view-btn text-blueMediq flex justify-center ml-auto mr-auto collect"> @lang('labels.coupon.collect')</button>
                                        <button
                                            class="collect-view-btn text-me8f9 flex justify-center ml-auto mr-auto collected"> @lang('labels.coupon.collected')</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div component-name="me-coupon-small-card" class="small-coupon">
                    <div class="w-full small-coupon--container">
                        <div class="relative collected">
                            <img src="{{ asset('frontend/img/coupon-small.png') }}" class="voucher-shape" />
                            <div class="gccard rounded-[20px] collected">
                                <div class="gccard-top bg-no-repeat h-[100px] relative bg-cover">
                                    <div class="limited-text absolute top-0 left-0 bg-orangeMediq text-white hidden">
                                        Limited
                                    </div>
                                </div>
                                <div class="gccard-content text-center">
                                    <div class="cclogo-container rounded-full">
                                        <img class="cclogo border-mee4 rounded-full w-[72px] h-[72px]"
                                            src="{{ asset('frontend/img/quantity-logo.png') }}" />
                                    </div>
                                    <div class="gccard-content-body">
                                        <p class="company-name mb-5 text-darkgray">$150 off Min. Spend $2,200 Spending</p>
                                        <div class="flex justify-start items-center flex-wrap">
                                            <p class="ccategory text-lightgray">Body Check</p>
                                        </div>
                                    </div>
                                    <div class="gccard-content-bottom">
                                        <button
                                            class="collect-view-btn text-blueMediq flex justify-center ml-auto mr-auto collect"> @lang('labels.coupon.collect')</button>
                                        <button
                                            class="collect-view-btn text-me8f9 flex justify-center ml-auto mr-auto collected"> @lang('labels.coupon.collected')</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div component-name="me-coupon-small-card" class="small-coupon">
                    <div class="w-full small-coupon--container">
                        <div class="relative collect">
                            <img src="{{ asset('frontend/img/coupon-small.png') }}" class="voucher-shape" />
                            <div class="gccard rounded-[20px] collect">
                                <div class="gccard-top bg-no-repeat h-[100px] relative bg-cover">
                                    <div class="limited-text absolute top-0 left-0 bg-orangeMediq text-white hidden">
                                        Limited
                                    </div>
                                </div>
                                <div class="gccard-content text-center">
                                    <div class="cclogo-container rounded-full">
                                        <img class="cclogo border-mee4 rounded-full w-[72px] h-[72px]"
                                            src="{{ asset('frontend/img/quantity-logo.png') }}" />
                                    </div>
                                    <div class="gccard-content-body">
                                        <p class="company-name mb-5 text-darkgray">$150 off Min. Spend $2,200 Spending</p>
                                        <div class="flex justify-start items-center flex-wrap">
                                            <p class="ccategory text-lightgray">Body Check</p>
                                        </div>
                                    </div>
                                    <div class="gccard-content-bottom">
                                        <button
                                            class="collect-view-btn text-blueMediq flex justify-center ml-auto mr-auto collect"> @lang('labels.coupon.collect')</button>
                                        <button
                                            class="collect-view-btn text-me8f9 flex justify-center ml-auto mr-auto collected"> @lang('labels.coupon.collected')</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div component-name="me-coupon-small-card" class="small-coupon">
                    <div class="w-full small-coupon--container">
                        <div class="relative collect">
                            <img src="{{ asset('frontend/img/coupon-small.png') }}" class="voucher-shape" />
                            <div class="gccard rounded-[20px] collect">
                                <div class="gccard-top bg-no-repeat h-[100px] relative bg-cover">
                                    <div class="limited-text absolute top-0 left-0 bg-orangeMediq text-white hidden">
                                        Limited
                                    </div>
                                </div>
                                <div class="gccard-content text-center">
                                    <div class="cclogo-container rounded-full">
                                        <img class="cclogo border-mee4 rounded-full w-[72px] h-[72px]"
                                            src="{{ asset('frontend/img/quantity-logo.png') }}" />
                                    </div>
                                    <div class="gccard-content-body">
                                        <p class="company-name mb-5 text-darkgray">$150 off Min. Spend $2,200 Spending</p>
                                        <div class="flex justify-start items-center flex-wrap">
                                            <p class="ccategory text-lightgray">Body Check</p>
                                        </div>
                                    </div>
                                    <div class="gccard-content-bottom">
                                        <button
                                            class="collect-view-btn text-blueMediq flex justify-center ml-auto mr-auto collect"> @lang('labels.coupon.collect')</button>
                                        <button
                                            class="collect-view-btn text-me8f9 flex justify-center ml-auto mr-auto collected"> @lang('labels.coupon.collected')</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div component-name="me-coupon-small-card" class="small-coupon">
                    <div class="w-full small-coupon--container">
                        <div class="relative collect">
                            <img src="{{ asset('frontend/img/coupon-small.png') }}" class="voucher-shape" />
                            <div class="gccard rounded-[20px] collect">
                                <div class="gccard-top bg-no-repeat h-[100px] relative bg-cover">
                                    <div class="limited-text absolute top-0 left-0 bg-orangeMediq text-white hidden">
                                        Limited
                                    </div>
                                </div>
                                <div class="gccard-content text-center">
                                    <div class="cclogo-container rounded-full">
                                        <img class="cclogo border-mee4 rounded-full w-[72px] h-[72px]"
                                            src="{{ asset('frontend/img/quantity-logo.png') }}" />
                                    </div>
                                    <div class="gccard-content-body">
                                        <p class="company-name mb-5 text-darkgray">$150 off Min. Spend $2,200 Spending</p>
                                        <div class="flex justify-start items-center flex-wrap">
                                            <p class="ccategory text-lightgray">Body Check</p>
                                        </div>
                                    </div>
                                    <div class="gccard-content-bottom">
                                        <button
                                            class="collect-view-btn text-blueMediq flex justify-center ml-auto mr-auto collect"> @lang('labels.coupon.collect')</button>
                                        <button
                                            class="collect-view-btn text-me8f9 flex justify-center ml-auto mr-auto collected"> @lang('labels.coupon.collected')</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div component-name="me-coupon-collect-detail" class="collect-detail-modal">
        <div class="rounded-[20px] view-bundle-modal--container">
            <div class="bg-image w-full p-[40px] pb-[20px] relative">
                <button class="cdmodal-close absolute top-[25px] right-[45px] cursor-pointer"><img
                        src="{{ asset('frontend/img/white-close.svg') }}" alt="close image" /></button>
                <div class="relative bg-title flex justify-start items-center">
                    <div class="quantity-logo-container mr-[12px]">
                        <img src="{{ asset('frontend/img/quantity-logo.png') }}" alt="logo"
                            class="quantity-logo w-[50px] h-[50px]" />
                    </div>
                    <p class="text-center quatitle">Mobile Medical and Health Check Centre Limited</p>
                </div>
                <div class="flex items-center justify-between py-[10px] qucollectd">
                    <p class="flex items-center justify-start quades text-blueMediq">
                        $150 off Min. Spend $2,200
                    </p>
                    <button
                        class="qua-collect-btn w-[131px] font-secondary font-bold me-body16 inline-block py-[10px] px-5 border border-darkgray text-center hover:bg-blueMediq hover:border-blueMediq hover:text-whitez rounded-full">Collect</button>
                </div>
                <div class="limited-badge flex justify-start items-center">
                    <p class="limited-badge--item bg-orangeMediq text-white">Limited</p>
                    <p class="limited-badge--item bg-badge-grey text-lightgray">Body Check</p>
                </div>
                <div class="apply-des">
                    <p>Applicable to Mobile Medical Body Check Products</p>
                </div>
            </div>
            <div class="custom-divider">
            </div>
            <div class="cscard-container">
                <div class="mb-[27px] last:mb-0">
                    <h6 class="text-darkgray contitle mb-[10px]">Valid Period</h6>
                    <div class="condes text-darkgray">
                        Applicable to Mobile Medical Body Check Products
                    </div>
                </div>
                <div class="mb-[27px] last:mb-0">
                    <h6 class="text-darkgray contitle mb-[10px]">Conditions of Use</h6>
                    <div class="condes text-darkgray">
                        <ol>
                            <li>Corem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                            <li>Corem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                            <li>Corem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                            <li>Corem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                            <li>Corem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                            <li>Corem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                            <li>Corem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                            <li>Corem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                            <li>Corem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                            <li>Corem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                            <li>Corem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                            <li>Corem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                            <li>Corem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                            <li>Corem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                            <li>Corem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                            <li>Corem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                            <li>Corem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                            <li>Corem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @include('frontend.home.promotion') --}}
    <div component-name="mediq-why-choose" class="bg-white me-container180px py-9 md:py-[60px] mediq-why-choose">
        <div class="lg:flex justify-between xl:gap-[100px]">
            <div class="lg:pr-5 xl:pr-0 pb-5 lg:pb-0 font-secondary">
                <h1 class="font-bold pb-8 text-darkgray me-title32">{{ langbind($chooseMedia, 'main_title') }}</h1>
                <div class="mwchoose-des font-medium lg:pb-10 text-darkgray me-body16">{!! langbind($chooseMedia,'main_content') !!}</div>
                {{-- {!! langbind($chooseMedia, 'main_content') !!} --}}
                <a href="{!! langbind($chooseMedia, 'main_link') !== null ? url(langbind($chooseMedia, 'main_link')) : '#' !!}"
                    class="mwchoose-link font-secondary font-bold me-body16 inline-block py-[10px] px-5 border border-darkgray text-center hover:bg-blueMediq hover:border-0 hover:text-whitez rounded-full">
                    {{-- @lang('labels.discover_more') --}}
                    @lang('labels.contact.about_mediq')
               </a>
            </div>
            <p><img src="{{ isset($chooseMedia->main_img) ? asset($chooseMedia->main_img) : asset('frontend/img/why-choose.png') }}"
                    alt="why choose mediq" class="rounded-[20px] rounded-bl-[100px] lg:max-w-[490px]"></p>
        </div>
    </div>
    <div component-name="mediq-shopping-guide" class="bg-white me-shopping-guide">
      <div class="me-container180px  py-9 md:py-[60px]">
        <div class="lg:flex gap-[25px] 2xl:gap-[100px] font-secondary rounded-[20px] rounded-br-[100px] shopping-guide-boxshadow">
            <div class="relative me-shopping-guide--img">
                <img src="{{ isset($chooseMedia->shopping_guide_img) ? asset($chooseMedia->shopping_guide_img) : asset('frontend/img/why-choose2.png') }}"
                    alt="shopping guide" class="w-full h-full object-cover sgimg">
                <h2 class="font-bold text-darkgray absolute left-10 bottom-5 max-w-[208px]">
                    {{ langbind($chooseMedia, 'shopping_guide_title') }}</h2>
            </div>
            <div class="py-5 pr-4 md:pr-20 7xl:pr-[200px] pl-5 lg:pl-0 me-shopping-guide--card">
                <div class="py-5 2xl:py-10 flex items-center justify-between sg-card">
                    <div class="flex items-center sg-card--first">
                        <p><img src="{{ isset($chooseMedia->quick_start_guide_icon) ? asset($chooseMedia->quick_start_guide_icon) : asset('frontend/img/me-booking.svg') }}"
                                alt="icon" class="guide-icon"></p>
                        <div class="px-5">
                            <h3 class="guide-list-title font-bold text-darkgray pb-2">
                                {{ langbind($chooseMedia, 'quick_start_guide_title') }}</h3>
                            <p class="guide-list-des font-medium text-darkgray me-body18">{!! langbind($chooseMedia, 'quick_start_guide_content') !!}</p>
                        </div>
                    </div>
                    <div class="capitalize font-secondary font-normal me-body16 inline-block py-[10px] whitespace-nowrap xl:px-5 px-3 text-darkgray border border-darkgray text-center hover:bg-blueMediq hover:border-blueMediq hover:text-whitez rounded-full learn-btn">
                     <a href="{!! langbind($chooseMedia, 'quick_start_guide_link') !== null ? url(langbind($chooseMedia, 'quick_start_guide_link')) : '#' !!}">@lang('labels.learn_more')</a>
                    </div>

                </div>
                <div class="py-5 2xl:py-10 flex items-center justify-between sg-card">
                    <div class="flex items-center sg-card--first">
                        <p><img src="{{ isset($chooseMedia->booking_icon) ? asset($chooseMedia->booking_icon) : asset('frontend/img/me-choice.svg') }}"
                                alt="icon" class="guide-icon"></p>
                        <div class="px-5">
                            <h3 class="guide-list-title font-bold text-darkgray pb-2">
                                {{ langbind($chooseMedia, 'booking_title') }}</h3>
                            <p class="guide-list-des font-medium text-darkgray me-body16">{!! langbind($chooseMedia, 'booking_content') !!}</p>
                        </div>
                    </div>
                    <div class="capitalize font-secondary font-normal me-body16 inline-block py-[10px] whitespace-nowrap xl:px-5 px-3 text-darkgray border border-darkgray text-center hover:bg-blueMediq hover:border-blueMediq hover:text-whitez rounded-full learn-btn">
                     <a href="{!! langbind($chooseMedia, 'booking_link') !== null ? url(langbind($chooseMedia, 'booking_link')) : '#' !!}">@lang('labels.learn_more')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
   </div>

    @include('frontend.include.product-compare-box')

    {{-- <div component-name="mediq-member-reward" class="bg-white me-container180px py-9 md:py-[64px] leaderboard-container">
   <div class="flex justify-between items-center pb-5 md:pb-10">
      <h1 class="capitalize font-secondary font-bold text-darkgray me-title32">Member Rewards</h1>
      <a href="" class="capitalize font-secondary font-bold me-body16 inline-block py-[10px] px-5 border border-darkgray text-center hover:bg-blueMediq hover:border-0 hover:text-whitez rounded-full">@lang('labels.learn_more')</a>
   </div>
   <div class="grid grid-cols-2 sm:grid-cols-4 xl:gap-4 me-member-reward-items">
      @if (isset($home->member_reward_img_en))
      @foreach (json_decode($home->member_reward_img_en) as $img)
      <img src="{{isset($img) ? $img :asset('frontend/img/m_reward.png')}}" alt="mediq reward" class="p-2 xl:px-0 sm:py-0">
      @endforeach
      @endif
      <!-- <img src="{{asset('frontend/img/m_reward.png')}}" alt="mediq reward2" class="p-2 xl:px-0 sm:py-0">
      <img src="{{asset('frontend/img/m_reward.png')}}" alt="mediq reward3" class="p-2 xl:px-0 sm:py-0">
      <img src="{{asset('frontend/img/m_reward.png')}}" alt="mediq reward4" class="p-2 xl:px-0 sm:py-0"> -->
   </div>
</div> --}}
   {{-- blog hide --}}
    {{-- <div component-name="mediq-home-blog"
        class="me-container180px py-9 md:pt-[64px] md:pb-[120px] bg-far leaderboard-container">
        <div class="flex justify-between items-center pb-5 md:pb-8">
            <h1 class="capitalize font-secondary font-bold text-darkgray me-title32">@lang('labels.blog')</h1>
            <a href=""
                class="capitalize font-secondary font-bold me-body16 inline-block py-[10px] px-5 border border-darkgray text-center hover:bg-blueMediq hover:border-0 hover:text-whitez rounded-full">@lang('labels.more_content')</a>
        </div>
        <div class="lg:flex xl:gap-8 font-secondary">
            @if (count($blogs) > 0)
                @foreach ($blogs as $key => $blog)
                    @if ($key == 0)
                        <div
                            class="rounded-[20px] bg-white shadow-me10 hover:shadow-me24 mb-[10px] lg:mb-0 h-full 6xl:h-auto">
                            <img src="{{ isset($blog->img) ? $blog->img : asset('frontend/img/m_blog.png') }}"
                                alt="blog" class="w-full rounded-t-[20px] h-[300px]">
                            <div class="py-8 px-5">
                                <p class="font-medium pb-1 me-body14">June, 2020</p>
                                <h3 class="font-bold pb-5 text-blueMediq me-title26">{{ langbind($blog, 'name') }}</h3>
                                <p class="font-medium me-body16">{!! Str::limit(langbind($blog, 'content'), 100) !!}</p>
                            </div>
                        </div>
                    @endif
                @endforeach

                <div class="lg:ml-4 xl:ml-0">
                    @foreach ($blogs as $key => $blog)
                        @if ($key != 0 && $key <= 3)
                            <div
                                class="rounded-[20px] bg-white mb-[10px] last-of-type:mb-0 sm:flex shadow-me10 hover:shadow-me24">
                                <img src="{{ isset($blog->img) ? $blog->img : asset('frontend/img/m_blog2.png') }}"
                                    alt="blog"
                                    class="w-full sm:w-[50%] 3xl:w-auto rounded-t-[20px] md:rounded-tr-[0]">
                                <div class="py-8 px-5">
                                    <p class="font-medium pb-1 me-body14">
                                        {{ date('M Y', strtotime($blog->release_date)) }}</p>
                                    <h5 class="font-medium pb-[10px] text-blueMediq me-body20">
                                        {{ langbind($blog, 'name') }}</h5>
                                    <p class="font-medium me-body14">{!! Str::limit(langbind($blog, 'content'), 100) !!}</p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    </div> --}}
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
                                 <div class="flex items-center justify-between py-[10px] qucollectd">
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

    </div>
@endsection
@push('scripts')
    <script>
        //   let comparePageSession = "{{ Session::get('comparepage_session') }}"
        $(document).ready(function(){
         $(".me-season-card").mouseenter(function(){
            if($(this).attr("data-id")==1){
               // $(this).find('.healthcare-heart-selected').removeClass("hidden");
            }else{
               $(this).find('.healthcare-heart').removeClass("hidden");
            }
         });
         $(".me-season-card").mouseleave(function(){
            // $(this).find('.healthcare-heart-selected').addClass('hidden');
            $(this).find('.healthcare-heart').addClass('hidden');
         });
        });
    </script>
    <script src="{{ asset('frontend/custom/product-compare.js') }}"></script>
@endpush

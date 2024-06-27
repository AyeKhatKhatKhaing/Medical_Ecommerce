 <!-- start:product card-->
 @foreach ($products as $key => $product)
 @php
    if(count($product->productsVariations) > 0 && $product->productsVariations[0]->sku != null){
        $isVariable = true;
        $productPrice = getLowestPrice($product);
        $prodDis = isset($productPrice->promotion_price) ? $productPrice->promotion_price : (isset($productPrice->discount_price) ? $productPrice->discount_price : '');
    }else{
        $isVariable = false;
        $prodDis = isset($product->promotion_price) ? $product->promotion_price : (isset($product->discount_price) ? $product->discount_price : '');
        $productPrice = $product;
    }
 @endphp
 <div class="me-season-card">
     <div
         class="h-full flex flex-col justify-between sm:max-w-[9.5%] md:max-w-[224px] lg:max-w-[216px] 2xl:max-w-[232px] 3xl:max-w-[245px] 4xl:max-w-[257px] 7xl:max-w-[293px] bg-whitez rounded-[20px] hover:bg-whitez hover:shadow-cardshadow season-card pt-[1px]">
         <div>
             <div class="relative mt-[10px] mx-[10px]">
                 {{-- <a href="{{ route('product-detail',['category' => isset($product->category) ? str_replace(' ','-',$product->category->name_en) : '', 'slug' => isset($product->slug_en) ? $product->slug_en : '']) }}"> --}}
                     {{-- <img src="{{ isset($product->featured_img) ? $product->featured_img : asset('frontend/img/quality-healthcare.png') }}"
                         alt="quality healthcare" class="w-full rounded-t-[12px] qhealth-img"> --}}
                    @if(isset($product->merchant))
                    <img src="{{ isset($product->merchant->icon) ? $product->merchant->icon : asset('frontend/img/quality-healthcare.png') }}"
                        alt="quality healthcare" class="w-full rounded-t-[12px] qhealth-img {{ Auth::guard('customer')->user() == null ? 'register-btn':''}}" style="min-width:auto;">
                    @else
                    <img src="{{ isset($product->featured_img) ? $product->featured_img : asset('frontend/img/quality-healthcare.png') }}"
                        alt="quality healthcare--" class="w-full rounded-t-[12px] qhealth-img {{ Auth::guard('customer')->user() == null ? 'register-btn':''}}" style="min-width:auto;">
                    @endif
                 {{-- </a> --}}
                 <div class="absolute bottom-0 left-0 w-full">
                     <p class="me-enjoy flex items-center justify-center w-full py-2 max-h-[33px] me-healthcare-status">

                         2 To Enjoy
                     </p>
                 </div>
                 @if ($prodDis != null)
                 <p
                     class="dis-circle w-[50px] h-[50px] rounded-full text-whitez bg-mered absolute top-0 left-0 flex items-center justify-center me-body14 font-bold">
                     -{{ round((($productPrice->original_price - $prodDis) / $productPrice->original_price) * 100, 0) }}%

                 </p>
                 @endif
                {{-- <div class="absolute top-[14px] right-[12px] healthcare-heart">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="heart-hole mx-auto">
                    <g id="ph:heart-bold">
                    <path id="Vector" d="M16.6875 2.625C14.8041 2.625 13.1325 3.36844 12 4.64625C10.8675 3.36844 9.19594 2.625 7.3125 2.625C5.67208 2.62698 4.09942 3.27952 2.93947 4.43947C1.77952 5.59942 1.12698 7.17208 1.125 8.8125C1.125 15.5944 11.0447 21.0131 11.4666 21.2409C11.6305 21.3292 11.8138 21.3754 12 21.3754C12.1862 21.3754 12.3695 21.3292 12.5334 21.2409C12.9553 21.0131 22.875 15.5944 22.875 8.8125C22.873 7.17208 22.2205 5.59942 21.0605 4.43947C19.9006 3.27952 18.3279 2.62698 16.6875 2.625ZM16.1728 15.9713C14.8671 17.0792 13.4714 18.0764 12 18.9525C10.5286 18.0764 9.13287 17.0792 7.82719 15.9713C5.79562 14.2284 3.375 11.5706 3.375 8.8125C3.375 7.76821 3.78984 6.76669 4.52827 6.02827C5.26669 5.28984 6.26821 4.875 7.3125 4.875C8.98125 4.875 10.3781 5.75625 10.9584 7.17562C11.0429 7.38254 11.1871 7.55961 11.3726 7.68425C11.5581 7.80889 11.7765 7.87545 12 7.87545C12.2235 7.87545 12.4419 7.80889 12.6274 7.68425C12.8129 7.55961 12.9571 7.38254 13.0416 7.17562C13.6219 5.75625 15.0188 4.875 16.6875 4.875C17.7318 4.875 18.7333 5.28984 19.4717 6.02827C20.2102 6.76669 20.625 7.76821 20.625 8.8125C20.625 11.5706 18.2044 14.2284 16.1728 15.9713Z" fill="#333333"></path>
                    </g>
                    </svg>
                </div>
                <div class="absolute top-[14px] right-[12px] hidden healthcare-heart-selected">
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" class="heart-full mx-auto">
                    <path d="M27.5376 17.0627L17.4126 27.1877C17.2278 27.3744 17.0078 27.5226 16.7654 27.6238C16.5229 27.7249 16.2628 27.777 16.0001 27.777C15.7374 27.777 15.4773 27.7249 15.2349 27.6238C14.9924 27.5226 14.7724 27.3744 14.5876 27.1877L4.2001 16.8002C3.47912 16.0811 2.91238 15.2226 2.53454 14.277C2.1567 13.3314 1.9757 12.3187 2.00262 11.3008C2.02953 10.2829 2.26378 9.28117 2.69105 8.35688C3.11832 7.43259 3.72963 6.60517 4.4876 5.9252C7.4001 3.2877 12.1501 3.5377 15.0626 6.4627L16.0001 7.3877L17.2001 6.2002C17.9197 5.48318 18.7767 4.91876 19.7196 4.54074C20.6625 4.16272 21.672 3.97887 22.6876 4.0002C23.7079 4.02509 24.7122 4.25863 25.6388 4.68644C26.5653 5.11425 27.3945 5.72726 28.0751 6.4877C30.7001 9.4002 30.4626 14.1502 27.5376 17.0627Z" fill="#FF6F6F"></path>
                    </svg>
                </div> --}}
                 <img src="{{ asset('frontend/img/Default.svg') }}" data-product-id="{{ $product->id }}"
                     alt="heart"
                     class="absolute top-[14px] right-[12px] healthcare-heart {{ Auth::guard('customer')->user() == null ?'click-disable ':(count($product->favourite) > 0 ? 'hidden' : '') }}">
                 <img src="{{ asset('frontend/img/Selected.svg') }}" data-product-id="{{ $product->id }}"
                     alt="heart selected"
                     class="absolute top-[14px] right-[12px] healthcare-heart-selected {{ Auth::guard('customer')->user() == null ? 'click-disable hidden': (count($product->favourite) <= 0 ? 'hidden' : '') }}">
             </div>
             <div>
                 <div class="pt-4 pb-2 px-4 font-secondary">
                     <a href="{{ route('product-detail',['category' => isset($product->category) ? str_replace(' ','-',$product->category->name_en) : '', 'slug' => isset($product->slug_en) ? $product->slug_en : '']) }}">
                         <p
                             class="pt-[4px] pb-2 font-secondary font-bold text-darkgray me-body17 leading-[1.25] mqh-title">
                             {{ langbind($product, 'name') }}</p>
                     </a>
                     <div class="flex flex-wrap xl:gap-[4px] quality-items">
                         {{-- @php $takeNum = isset($product->number_of_dose) ? 2 : 3; @endphp --}}
                         @if (isset($product->number_of_dose))
                         <p
                             class="quality-title bg-tagbg py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">
                             {{ $product->number_of_dose }} {{ $product->number_of_dose == 1 ? __('labels.product_detail.item') : __('labels.product_detail.items') }}
                         </p>
                         @endif
                         @if (count(productTagVal($product)) > 0)
                         @foreach (productTagVal($product)->take(10) as $key => $tag)
                         <p
                             class="quality-title bg-tagbg py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-center ">
                             {{ langbind($tag, 'name') }}</p>
                         @endforeach
                         @endif

                     </div>

                     <div class="flex items-center pb-2">
                         <p class="font-bold text-mered me-title23">
                             ${{ $prodDis != null ? number_format($prodDis) : number_format($productPrice->original_price) }}@if($isVariable == true)<span class="linethrough text-lightgray me-body16 ml-[10px] up-text">up</span>@endif</p>
                         @if ($prodDis != null)
                         <p class="font-bold text-lightgray me-body14 pl-[10px]"><span
                                 class="linethrough">${{ number_format($productPrice->original_price) }}</span></p>
                         @endif
                     </div>
                     <div class="flex pb-2 items-center font-secondary booked-div">
                        @if($product->book_count > 0 && $product->is_book_count == true)
                        <p class="font-normal text-darkgray me-body16">{{$product->book_count}}
                            + 
                            @lang('labels.product.booked')
                        </p>
                        @endif
                     </div>

                     <div class="flex pb-2 items-center font-secondary pt-4">
                         {{-- <div class="flex items-center after:content-[''] after:inline-block after:w-[4px] after:h-[4px] after:bg-meA3 after:rounded-full after:mx-1">
                            <p><img src="{{asset('frontend/img/me-star.svg')}}" alt=""></p>
                         <p class="font-bold text-darkgray me-body16 pl-1">4.8 <span
                                 class="text-darkgray font-normal">(50)</span></p>
                     </div>
                     <p class="font-normal text-darkgray me-body16">120+ booked</p> --}}
                    </div>

             </div>
         </div>
     </div>
     <div>
         <div class="pb-4 px-4 font-secondary">

             <div class="flex justify-between xl:gap-[6px] pt-[0.5] hc-two-btn">
                 <button type="button" data-preview="quick-preview-modal{{ $product->id }}" data-id="{{ $product->id }}"
                     class="font-secondary font-medium me-body15 text-darkgray bg-white shadow-btnshadow py-[7px] w-full max-w-[215px] rounded-full text-center border border-whitez hover:border-blueMediq hover:text-blueMediq btn-quickview">@lang('labels.product.preview')</button>
                 @if(isset($product->merchant))
                 <button data-id="compare-modal" data-product-id="{{ $product->id }}"
                     data-product-name="{{ langbind($product, 'name') }}"
                     data-product-category-id="{{ $product->category_id }}"
                     data-product-featured-img="{{ isset($product->merchant->icon) ? $product->merchant->icon : asset('frontend/img/quality-healthcare.png') }}" type="button"
                     class="bg-white w-[40px] h-[40px] shadow-btnshadow rounded-full text-center border border-whitez hover:border-blueMediq compare_icon"><img
                         src="{{ asset('frontend/img/me-compare.svg') }}" alt="compare icon" class="mx-auto">
                 </button>
                 @else
                 <button data-id="compare-modal" data-product-id="{{ $product->id }}"
                    data-product-name="{{ langbind($product, 'name') }}"
                    data-product-category-id="{{ $product->category_id }}"
                    data-product-featured-img="{{ isset($product->featured_img) ? $product->featured_img : asset('frontend/img/quality-healthcare.png') }}" type="button"
                    class="bg-white w-[40px] h-[40px] shadow-btnshadow rounded-full text-center border border-whitez hover:border-blueMediq compare_icon"><img
                        src="{{ asset('frontend/img/me-compare.svg') }}" alt="compare icon" class="mx-auto">
                </button>
                 @endif
                 <button type="button"
                     class="price-tooltip-wrapper bg-white w-[40px] h-[40px] shadow-btnshadow rounded-full text-center border border-white hover:border-blueMediq hidden">
                     <img src="{{ asset('frontend/img/me-compare.svg') }}" alt="compare icon" class="mx-auto">
                     <div class="price-tooltip me-body16 font-normal w-fit">@lang('labels.footer.compare_products')
                     </div>
                 </button>
             </div>
             <button type="button" onclick="addToCart({{ $product }},'/add-to-cart','add')"
                 class="{{!Auth::guard('customer')->check() ? 'register-btn' : ''}} text-whitez font-bold font-secondary me-body16 text-center mt-[10px] w-full max-h-[40px] flex items-center justify-center rounded-[6px] py-3 status_btn cart_btn">
                 @lang('labels.add_to_cart')</button>
         </div>
     </div>
 </div>
 </div>
 <div class="custom-product-modal"></div>
 @endforeach
 <!-- end:product card-->

 {{-- <div id="compare-modal{{ $product->id }}" class="w-full bg-orangeLight rounded-tl-[200px] pl-[100px] lg:pl-[80px]
 xl:pl-[100px] 5xl:pl-[180px] 7xl:pl-[280px] pr-[45px] p-5 fixed left-0 -bottom-12 z-[5] hidden compare-modal">
 <div class="flex justify-between items-center compare-two-col">
     <div class="flex gap-[24px] xl:gap-[35px] w-full max-w-[90%] xl:max-w-[65%] selected-items">

         <div id="selected-item0" class="flex items-start selected-items-box relative w-1/4">
             <div class="flex items-center selected-items-box--top pr-[24px]">
                 <p class="selected-items-box--top--img"><img src="{{asset('frontend/img//vaccine-injection.png')}}"
                         alt="" class="rounded-[12px]"></p>
                 <p class="font-secondary font-medium me-body16 pl-[10px] selected-items-box--top--title">Hepatitis B
                     Vaccine Injection</p>
             </div>
             <button data-id="selected-item0"
                 class="w-6 h-6 rounded-full bg-meA3 text-white flex items-center justify-center selected-items-box-delete compare-modal absolute top-0 right-0"><img
                     src="{{asset('frontend/img//white-close.svg')}}" alt="close image"
                     class="w-[10px] compare-modal" /></button>
         </div>

         <div id="selected-item1" class="flex items-start selected-items-box relative w-1/4">
             <div class="flex items-center selected-items-box--top pr-[24px]">
                 <p class="selected-items-box--top--img"><img src="{{asset('frontend/img//annual_health_check.png')}}"
                         alt="" class="rounded-[12px]"></p>
                 <p class="font-secondary font-medium me-body16 pl-[10px] selected-items-box--top--title">Annual Health
                     Check Plan</p>
             </div>
             <button data-id="selected-item1"
                 class="w-6 h-6 rounded-full bg-meA3 text-white flex items-center justify-center selected-items-box-delete compare-modal absolute top-0 right-0"><img
                     src="{{asset('frontend/img//white-close.svg')}}" alt="close image"
                     class="w-[10px] compare-modal" /></button>
         </div>

         <div id="selected-item2" class="flex items-start selected-items-box relative w-1/4">
             <div class="flex items-center selected-items-box--top pr-[24px]">
                 <p class="selected-items-box--top--img"><img src="{{asset('frontend/img//y-dna-check.png')}}" alt=""
                         class="rounded-[12px]"></p>
                 <p class="font-secondary font-medium me-body16 pl-[10px] selected-items-box--top--title">Y-Chromosome
                     DNA Test</p>
             </div>
             <button data-id="selected-item2"
                 class="w-6 h-6 rounded-full bg-meA3 text-white flex items-center justify-center selected-items-box-delete compare-modal absolute top-0 right-0"><img
                     src="{{asset('frontend/img//white-close.svg')}}" alt="close image"
                     class="w-[10px] compare-modal" /></button>
         </div>


         <div data-id="add-compare-modal{{ $product->id }}"
             class="bg-[#0000001a] w-20 h-20 rounded-[10px] flex items-center justify-center me-plus-icon cursor-pointer">
             <img src="{{asset('frontend/img//me-plus.svg')}}" alt="plus">
         </div>
     </div>

     <div class="w-fit flex justify-between xl:gap-[50px] compare-textbox">
         <div class="compare-text-section text-center">
             <button type="button"
                 class="border border-darkgray py-[10px] px-5 rounded-full text-darkgray bg-whitez font-bold font-secondary me-body16 hover:border-blueMediq hover:bg-blueMediq hover:text-whitez">Compare</button>
             <p class="pt-1 font-bold font-secondary me-body15 text-darkgray">You can compare up to 4 products.</p>
         </div>

         <p data-id="compare-modal{{ $product->id }}" class="text-darkgray text-24 close-compare cursor-pointer"><img
                 src="{{asset('frontend/img//white-close.svg')}}" alt="close image" class="invert" /></p>
     </div>
 </div>
 </div> --}}

 <!-- The Modal -->
 {{-- <div id="add-compare-modal{{ $product->id }}" class="modal hidden fixed z-[1001] left-0 top-0 w-full h-full
 bg-black/[.75] overflow-auto">
 <!-- Modal content -->
 <div class="modal-content max-w-[80%] lg:max-w-[700px] shadow-shadow02 my-[15%] mx-auto">
     <div class="relative rounded-[12px] bg-white">
         <div class="flex ml-auto mr-6 w-5 h-5 absolute right-0 top-4">
             <span data-id="add-compare-modal{{ $product->id }}"
                 class="pb-[4px] absolute left-1/2 top-1/2 -translate-y-1/2 -translate-x-1/2 close-add-compare-modal  flex items-center justify-center text-[32px] w-full cursor-pointer text-[#1A1818] focus:no-underline">&times;</span>
         </div>
         <div class="modal-content-plan">
             <div class="preview-bgradient p-10 pb-5 rounded-t-[40px]">
                 <h2 class="font-secondary font-bold text-darkgray me-title29">Add to Comparison Table</h2>
             </div>

             <div class="bg-white p-10 pt-5 rounded-b-[40px]">
                 <p class="font-secondary font-medium text-lightgray me-body16 pb-5">You recently viewed...</p>
                 <div class="flex">

                     <div class="relative mr-3 last-of-type:pr-0 compare-img-container">
                         <img src="{{asset('frontend/img//vaccine-injection.png')}}" alt="image" class="w-[146px]">
                         <button type="button"
                             class="border border-darkgray py-[10px] px-5 rounded-full text-darkgray bg-whitez font-bold font-secondary me-body16 hover:border-blueMediq hover:bg-blueMediq hover:text-whitez absolute left-2/4 top-2/4 -translate-x-2/4 -translate-y-2/4 hidden">Compare</button>
                     </div>

                     <div class="relative mr-3 last-of-type:pr-0 compare-img-container">
                         <img src="{{asset('frontend/img//vaccine-injection.png')}}" alt="image" class="w-[146px]">
                         <button type="button"
                             class="border border-darkgray py-[10px] px-5 rounded-full text-darkgray bg-whitez font-bold font-secondary me-body16 hover:border-blueMediq hover:bg-blueMediq hover:text-whitez absolute left-2/4 top-2/4 -translate-x-2/4 -translate-y-2/4 hidden">Compare</button>
                     </div>

                     <div class="relative mr-3 last-of-type:pr-0 compare-img-container">
                         <img src="{{asset('frontend/img//vaccine-injection.png')}}" alt="image" class="w-[146px]">
                         <button type="button"
                             class="border border-darkgray py-[10px] px-5 rounded-full text-darkgray bg-whitez font-bold font-secondary me-body16 hover:border-blueMediq hover:bg-blueMediq hover:text-whitez absolute left-2/4 top-2/4 -translate-x-2/4 -translate-y-2/4 hidden">Compare</button>
                     </div>

                     <div class="relative mr-3 last-of-type:pr-0 compare-img-container">
                         <img src="{{asset('frontend/img//vaccine-injection.png')}}" alt="image" class="w-[146px]">
                         <button type="button"
                             class="border border-darkgray py-[10px] px-5 rounded-full text-darkgray bg-whitez font-bold font-secondary me-body16 hover:border-blueMediq hover:bg-blueMediq hover:text-whitez absolute left-2/4 top-2/4 -translate-x-2/4 -translate-y-2/4 hidden">Compare</button>
                     </div>

                 </div>
             </div>
         </div>
     </div>
 </div>

 </div> --}}

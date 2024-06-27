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
<div class="me-season-card py-5" data-id={{Auth::guard('customer')->user() !=null && count($product->favourite) > 0 ? '1': '0'}}>
    <div class="h-full bg-whitez rounded-[20px] hover:bg-whitez hover:shadow-cardshadow pt-[1px]">
        <div class="flex flex-col justify-between h-full">
            <!-- <a href=""> -->
            <div>
                <div class="relative ml-[10px] mt-[10px] mr-[10px]">
                    {{-- <a href="{{ route('product-detail',['category' => isset($product->category) ? str_replace(' ','-',$product->category->name_en) : '', 'slug' => isset($product->slug_en) ? $product->slug_en : '']) }}"> --}}
                    @if(isset($product->merchant))
                    <img src="{{ isset($product->merchant->icon) ? $product->merchant->icon : asset('frontend/img/quality-healthcare.png') }}"
                        alt="quality healthcare" class="w-full rounded-t-[12px] qhealth-img" onclick="window.open('{{ route('product-detail',['category' => isset($product->category) ? str_replace(' ','-',$product->category->name_en) : '', 'slug' => isset($product->slug_en) ? $product->slug_en : '']) }}')">
                    @else
                    <img src="{{ isset($product->featured_img) ? $product->featured_img : asset('frontend/img/quality-healthcare.png') }}"
                         alt="quality healthcare" class="w-full rounded-t-[12px] qhealth-img" onclick="window.open('{{ route('product-detail',['category' => isset($product->category) ? str_replace(' ','-',$product->category->name_en) : '', 'slug' => isset($product->slug_en) ? $product->slug_en : '']) }}')">
                    @endif
                    {{-- </a> --}}
                    <div class="absolute bottom-0 left-0 w-full bg-meBg">
                        <!-- <p class="me-enjoy flex items-center justify-center w-full py-2 me-healthcare-status">

                            2 To Enjoy
                        </p> -->
                    </div>
                    @if ($prodDis != null)
                    <p
                        class="dis-circle w-[50px] h-[50px] rounded-full text-whitez bg-mered absolute top-0 left-0 flex items-center justify-center me-body14 font-bold">
                        -{{ round((($productPrice->original_price - $prodDis) / $productPrice->original_price) * 100, 0) }}%
                    </p>
                    @endif

                   
                    <img src="{{ asset('frontend/img/Default.svg') }}" data-product-id="{{ $product->id }}"
                       data-register-id="{{ Auth::guard('customer')->user() ==null?1:0}}"
                        alt="heart"
                        class="absolute top-[14px] right-[12px] healthcare-heart {{ Auth::guard('customer')->user() == null ? 'register-btn' : (count($product->favourite) > 0 ? 'hidden' : '') }}">
                    <img src="{{ asset('frontend/img/Selected.svg') }}" data-product-id="{{ $product->id }}"
                    alt="heart selected"
                        class="absolute top-[14px] right-[13px] healthcare-heart-selected {{ Auth::guard('customer')->user() == null ? 'click-disable hidden' : (count($product->favourite) <= 0 ? 'hidden' : '') }}">
                </div>
                <div class="pt-4 pb-2 px-4 font-secondary quality-items-section">
                    <a href="{{ route('product-detail',['category' => isset($product->category) ? str_replace(' ','-',$product->category->name_en) : '', 'slug' => isset($product->slug_en) ? $product->slug_en : '']) }}">
                        <p class="py-2 font-secondary font-bold text-darkgray me-body17 mqh-title">
                            {{ langbind($product, 'name') }}</p>

                        <div class="flex flex-wrap xl:gap-[4px] quality-items">
                            {{-- @php $takeNum = isset($product->number_of_dose) ? 2 : 3; @endphp --}}
                            @if (isset($product->number_of_dose))
                            <p
                                class="quality-title bg-tagbg py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-centerr ">
                                {{ $product->number_of_dose }}
                                {{ $product->number_of_dose == 1 ? __('labels.product_detail.item') : __('labels.product_detail.items') }}</p>
                            @endif
                            @if (count(productTagVal($product)) > 0)
                            @foreach (productTagVal($product)->take(10) as $key => $tag)
                            <p
                                class="quality-title bg-tagbg py-1 px-[10px] rounded-[50px] text-darkgray font-normal font-secondary me-body14 text-centerr ">
                                {{ langbind($tag, 'name') }}</p>
                            @endforeach
                            @endif
                        </div>
                        <div class="flex items-center pb-2">
                            @if ($prodDis != null)
                            <p class="font-bold text-mered me-title23">${{ number_format($prodDis) }}@if($isVariable == true)<span class="linethrough text-lightgray me-body16 ml-[10px] up-text">up</span>@endif</p>
                            <p class="font-bold text-lightgray me-body14 pl-[10px]"><span
                                    class="linethrough font-normal">${{ number_format($productPrice->original_price) }}</span></p>
                            @else
                            <p class="font-bold text-mered me-title23">${{ number_format($productPrice->original_price) }}@if($isVariable == true)<span class="linethrough text-lightgray me-body16 ml-[10px] up-text">up</span>@endif</p>
                            @endif
                        </div>
                        <div class="flex pb-2 items-center font-secondary booked-div">
                            {{-- @php
                                 $order_count = DB::table('order_items')->where('product_id', $product->id)->count();
                            @endphp --}}
                            @if($product->book_count > 0 && $product->is_book_count == true)
                            {{-- <p class="text-center text-darkgray me-body16 font-bold helvetica-normal mt-[10px]">{{$product->book_count)}}+ people booked</p> --}}
                            <p class="font-normal text-darkgray me-body16">{{$product->book_count}}+ 
                                @lang('labels.product_detail.people_booked')
                            </p>
                            @endif
                            
                        </div> 
                    <div class="flex pb-2 items-center font-secondary">
      
                </div>
                </a>
            </div>
        </div>
        <!-- </a> -->
        <div>
            <div class="px-4 pb-4 font-secondary">
                <div class="flex justify-between xl:gap-[6px] pt-1 hc-two-btn">
                    <button type="button" data-id="{{ $product->id }}"
                        class="font-secondary font-medium me-body15 text-darkgray bg-white shadow-btnshadow py-[7px] max-w-[215px] w-full rounded-full text-center border border-white hover:border-blueMediq hover:text-blueMediq quick-preview-btn btn-quickview"
                        data-preview="quick-preview-modal{{ $product->id }}">@lang('labels.product.preview')</button>
                    @if(isset($product->merchant))
                    <button data-id="compare-modal" data-product-id="{{ $product->id }}"
                        data-product-name="{{ langbind($product, 'name') }}"
                        data-product-category-id="{{ $product->category_id }}"
                        data-product-featured-img="{{ isset($product->merchant->icon) ? $product->merchant->icon : asset('frontend/img/quality-healthcare.png') }}" type="button"
                        class="bg-white w-[40px] h-[40px] shadow-btnshadow rounded-full text-center border border-white hover:border-blueMediq compare_icon"><img
                            src="{{ asset('frontend/img/me-compare.svg') }}" alt="compare icon" class="mx-auto">
                    @else
                    <button data-id="compare-modal" data-product-id="{{ $product->id }}"
                        data-product-name="{{ langbind($product, 'name') }}"
                        data-product-category-id="{{ $product->category_id }}"
                        data-product-featured-img="{{ isset($product->featured_img) ? $product->featured_img : asset('frontend/img/quality-healthcare.png') }}" type="button"
                        class="bg-white w-[40px] h-[40px] shadow-btnshadow rounded-full text-center border border-white hover:border-blueMediq compare_icon"><img
                            src="{{ asset('frontend/img/me-compare.svg') }}" alt="compare icon" class="mx-auto">
                    @endif
                    
                    </button>
                    <button type="button"
                        class="price-tooltip-wrapper bg-white w-[40px] h-[40px] shadow-btnshadow rounded-full text-center border border-white hover:border-blueMediq hidden">
                        <img src="{{ asset('frontend/img/me-compare.svg') }}" alt="compare icon" class="mx-auto">
                        <div class="price-tooltip me-body16 font-normal w-fit">@lang('labels.footer.compare_products')
                        </div>
                    </button>
                </div>
                <button type="button" onclick="addToCart({{ $product }},'/add-to-cart','add')"
                class="{{!Auth::guard('customer')->check() ? 'register-btn' : ''}} text-whitez font-bold font-secondary me-body16 text-center mt-[10px] w-full rounded-[6px] py-3 status_btn cart_btn">@lang('labels.add_to_cart')</button>
                {{-- @if($productPrice->stock != 0)
                    <button type="button" onclick="addToCart({{ $product }},'/add-to-cart','add')"
                    class="{{!Auth::guard('customer')->check() ? 'register-btn' : ''}} text-whitez font-bold font-secondary me-body16 text-center mt-[10px] w-full rounded-[6px] py-3 status_btn cart_btn">@lang('labels.add_to_cart')</button>
                @else 
                    <p class="out-of-stock bg-mee4 text-lightgray font-bold font-secondary me-body18 text-center mt-[10px] w-full rounded-[6px] py-3">Out of Stock</p>
                @endif --}}
            </div>
        </div>
    </div>
</div>
</div>

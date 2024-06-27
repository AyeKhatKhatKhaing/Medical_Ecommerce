
@foreach ($products as $key => $product)
@php
    $count_tag = 0;
    $galleries = [];
    $allImages = [];
    $countImgs = null;
    if(isset($product->productGallery)){
    $productImages = $product->productGallery;
    if (count($productImages) > 0) {
    $common_area = collect($productImages[0]['common_area']);
    $services_facilities = collect($productImages[0]['services_facilities']);
    $other = collect($productImages[0]['other']);
    $countImgs = count($common_area) + count($services_facilities) + count($other);
    $allImages_products = $common_area->toBase()->merge($other, $services_facilities, $other);
    }
    } 
    if (isset($product->merchant)) {
        $galleries = $product->merchant->galleries;
        if (count($galleries) > 0) {
            $common_area = collect($galleries[0]['common_area']);
            $services_facilities = collect($galleries[0]['services_facilities']);
            $other = collect($galleries[0]['other']);
            $countImgs = count($common_area) + count($services_facilities) + count($other);
            $allImages = $common_area->toBase()->merge($other, $services_facilities, $other);
        }
    }
    if(count($product->productsVariations) > 0 && $product->productsVariations[0]->sku != null){
        $isVariable = true ;
        $productPrice = getLowestPrice($product);
        $prodDis = isset($productPrice->promotion_price) ? $productPrice->promotion_price : (isset($productPrice->discount_price) ? $productPrice->discount_price : '');
    }else{
        $isVariable = false ;
        $prodDis = isset($product->promotion_price) ? $product->promotion_price : (isset($product->discount_price) ? $product->discount_price : '');
        $productPrice = $product;
    }
@endphp
<article
    class="product-grid-card p-3 sm:p-4 xl:p-5 bg-white flex rounded-xl shadow-[0px_4px_15px_2px_rgba(0,0,0,0.10)] mb-5 ">
    <div class="grid-card-img-wrapper flex-1 sm:max-w-[12.5rem] lg:max-w-[17.5rem] sm:mr-2 lg:mr-4 xl:mr-5">
        <div class="banner-img">
            {{-- <a href="{{ route('product-detail',['category' => isset($product->category) ? str_replace(' ','-',$product->category->name_en) : '', 'slug' => isset($product->slug_en) ? $product->slug_en : '']) }}">
                <img src="{{ isset($product->featured_img) ? $product->featured_img : asset('frontend/img/card-banner.png') }}"
                    alt="baner image" class="w-auto h-auto align-middle object-center object-cover">
            </a> --}}
            {{-- @if (isset($allImages) && count($allImages) > 0)
            @foreach ($allImages->take(1) as $img)
            <a href="{{ route('product-detail',['category' => isset($product->category) ? str_replace(' ','-',$product->category->name_en) : '', 'slug' => isset($product->slug_en) ? $product->slug_en : '']) }}">
                <img src="{{ $img }}"
                    alt="baner image" class="w-auto h-auto align-middle object-center object-cover">
            </a> 
            @endforeach
            @elseif(isset($allImages_products) && count($allImages_products) > 0)
                @foreach ($allImages_products->take(1) as $img)

                <a href="{{ route('product-detail',['category' => isset($product->category) ? str_replace(' ','-',$product->category->name_en) : '', 'slug' => isset($product->slug_en) ? $product->slug_en : '']) }}">
                    <img src="{{ $img }}"
                        alt="baner image" class="w-auto h-auto align-middle object-center object-cover">
                </a> 
                @endforeach
            @endif --}}
            <a href="{{ route('product-detail',['category' => isset($product->category) ? str_replace(' ','-',$product->category->name_en) : '', 'slug' => isset($product->slug_en) ? $product->slug_en : '']) }}">
                <img src="{{ isset($product->merchant) ?  $product->merchant->icon : asset('frontend/img/card-banner.png') }}"
                    alt="baner image" class="w-auto h-auto align-middle object-center object-cover">
            </a> 
        </div>
        <div class="slider-img ">
            <ul class="flex items-center justify-center">
                {{-- @if (count($allImages) > 0)
                    @foreach ($allImages->take(3) as $img)
                        <li class="mr-2 last:mr-0">
                            <img src="{{ $img }}" alt=""
                                class="w-auto h-auto align-middle object-center object-cover rounded" data-image = "{{ $img }}">
                        </li>
                    @endforeach
                @endif --}}
                {{-- @if(isset($allImages_products)) --}}
                        @if (isset($allImages) && count($allImages) > 0)
                        @foreach ($allImages->take(3) as $key => $img)
                        <li class="mr-2 last:mr-0">
                        <img src="{{ $img }}" alt="small1"
                            class="w-auto h-auto align-middle object-center object-cover" data-id="{{ $key }}" data-image="{{ $img }}">
                        </li>
                        @endforeach
                        {{-- @endif                        --}}
                        {{-- @elseif (isset($allImages) && count($allImages) > 0)
                            @foreach ($allImages->take(3) as $key => $img) --}}
                            @elseif (isset($allImages_products) && count($allImages_products) > 0)
                            @foreach ($allImages_products->take(3) as $key => $img)
                            <li class="mr-2 last:mr-0">                        
                            <img src="{{ $img }}" alt="small1"
                                class="cursor-pointer w-auto h-auto align-middle object-center object-cover rounded" data-id="{{ $key }}" data-image="{{ $img }}">
                            </li>
                            @endforeach
                        @endif
            </ul>
        </div>

        <div class="grid-card-icon-wrapper mobile-wrapper relative flex items-center justify-end">
            @if(isset($product->merchant))
            <button type="button" data-id="compare-modal" data-product-id="{{ $product->id }}"
                data-product-name="{{ langbind($product, 'name') }}"
                data-product-category-id="{{ $product->category_id }}"
                data-product-featured-img="{{ isset($product->merchant->icon) ? $product->merchant->icon : asset('frontend/img/quality-healthcare.png') }}"
              class="bg-white w-[40px] h-[40px] hover:shadow-[0px_4px_15px_2px_rgba(0,0,0,0.10)] rounded-full text-center border border-white hover:border-blueMediq compare_icon mr-2"
              tabindex="0">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                class="mx-auto">
                <g id="Icon">
                  <path id="Vector"
                    d="M15.7942 14.0653L11.9251 10.1962C11.8176 10.0887 11.7417 9.97227 11.6972 9.84688C11.6528 9.72149 11.6302 9.58715 11.6295 9.44385C11.6295 9.30055 11.6521 9.1662 11.6972 9.04082C11.7424 8.91543 11.8183 8.799 11.9251 8.69152L15.7942 4.82242C16.0091 4.60747 16.2599 4.5 16.5465 4.5C16.8331 4.5 17.0839 4.60747 17.2988 4.82242C17.5138 5.03737 17.6212 5.29281 17.6212 5.58872C17.6212 5.88464 17.5138 6.13971 17.2988 6.35394L15.2837 8.3691H21.9202C22.2248 8.3691 22.4802 8.47227 22.6865 8.67863C22.8929 8.88498 22.9957 9.14005 22.995 9.44385C22.995 9.74836 22.8918 10.0038 22.6855 10.2101C22.4791 10.4165 22.224 10.5193 21.9202 10.5186H15.2837L17.2988 12.5338C17.5138 12.7487 17.6212 12.9995 17.6212 13.2861C17.6212 13.5727 17.5138 13.8235 17.2988 14.0384C17.0839 14.2534 16.8378 14.3698 16.5605 14.3877C16.2832 14.4056 16.0278 14.2981 15.7942 14.0653ZM7.19618 20.4869C7.41113 20.7019 7.6619 20.814 7.9485 20.8233C8.2351 20.8326 8.48588 20.7294 8.70083 20.5138L12.5699 16.6447C12.6774 16.5372 12.7533 16.4208 12.7978 16.2954C12.8422 16.17 12.8648 16.0356 12.8655 15.8923C12.8655 15.749 12.8429 15.6147 12.7978 15.4893C12.7526 15.3639 12.6767 15.2475 12.5699 15.14L8.70083 11.2709C8.48588 11.056 8.2351 10.9485 7.9485 10.9485C7.6619 10.9485 7.41113 11.056 7.19618 11.2709C6.98123 11.4859 6.87375 11.7413 6.87375 12.0372C6.87375 12.3331 6.98123 12.5882 7.19618 12.8024L9.21133 14.8176H2.57475C2.27024 14.8176 2.01481 14.9208 1.80846 15.1271C1.6021 15.3335 1.49929 15.5886 1.5 15.8923C1.5 16.1969 1.60318 16.4523 1.80953 16.6586C2.01588 16.865 2.27096 16.9678 2.57475 16.9671H9.21133L7.19618 18.9823C6.98123 19.1972 6.87375 19.448 6.87375 19.7346C6.87375 20.0212 6.98123 20.2719 7.19618 20.4869Z"
                    fill="#333333" />
                </g>
              </svg>
            </button>
            @else
            <button type="button" data-id="compare-modal" data-product-id="{{ $product->id }}"
                data-product-name="{{ langbind($product, 'name') }}"
                data-product-category-id="{{ $product->category_id }}"
                data-product-featured-img="{{ isset($product->featured_img) ? $product->featured_img : asset('frontend/img/quality-healthcare.png') }}"
              class="bg-white w-[40px] h-[40px] hover:shadow-[0px_4px_15px_2px_rgba(0,0,0,0.10)] rounded-full text-center border border-white hover:border-blueMediq compare_icon mr-2"
              tabindex="0">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                class="mx-auto">
                <g id="Icon">
                  <path id="Vector"
                    d="M15.7942 14.0653L11.9251 10.1962C11.8176 10.0887 11.7417 9.97227 11.6972 9.84688C11.6528 9.72149 11.6302 9.58715 11.6295 9.44385C11.6295 9.30055 11.6521 9.1662 11.6972 9.04082C11.7424 8.91543 11.8183 8.799 11.9251 8.69152L15.7942 4.82242C16.0091 4.60747 16.2599 4.5 16.5465 4.5C16.8331 4.5 17.0839 4.60747 17.2988 4.82242C17.5138 5.03737 17.6212 5.29281 17.6212 5.58872C17.6212 5.88464 17.5138 6.13971 17.2988 6.35394L15.2837 8.3691H21.9202C22.2248 8.3691 22.4802 8.47227 22.6865 8.67863C22.8929 8.88498 22.9957 9.14005 22.995 9.44385C22.995 9.74836 22.8918 10.0038 22.6855 10.2101C22.4791 10.4165 22.224 10.5193 21.9202 10.5186H15.2837L17.2988 12.5338C17.5138 12.7487 17.6212 12.9995 17.6212 13.2861C17.6212 13.5727 17.5138 13.8235 17.2988 14.0384C17.0839 14.2534 16.8378 14.3698 16.5605 14.3877C16.2832 14.4056 16.0278 14.2981 15.7942 14.0653ZM7.19618 20.4869C7.41113 20.7019 7.6619 20.814 7.9485 20.8233C8.2351 20.8326 8.48588 20.7294 8.70083 20.5138L12.5699 16.6447C12.6774 16.5372 12.7533 16.4208 12.7978 16.2954C12.8422 16.17 12.8648 16.0356 12.8655 15.8923C12.8655 15.749 12.8429 15.6147 12.7978 15.4893C12.7526 15.3639 12.6767 15.2475 12.5699 15.14L8.70083 11.2709C8.48588 11.056 8.2351 10.9485 7.9485 10.9485C7.6619 10.9485 7.41113 11.056 7.19618 11.2709C6.98123 11.4859 6.87375 11.7413 6.87375 12.0372C6.87375 12.3331 6.98123 12.5882 7.19618 12.8024L9.21133 14.8176H2.57475C2.27024 14.8176 2.01481 14.9208 1.80846 15.1271C1.6021 15.3335 1.49929 15.5886 1.5 15.8923C1.5 16.1969 1.60318 16.4523 1.80953 16.6586C2.01588 16.865 2.27096 16.9678 2.57475 16.9671H9.21133L7.19618 18.9823C6.98123 19.1972 6.87375 19.448 6.87375 19.7346C6.87375 20.0212 6.98123 20.2719 7.19618 20.4869Z"
                    fill="#333333" />
                </g>
              </svg>
            </button>
            @endif
            <button type="button" data-product-id="{{ $product->id }}"
              class="{{ Auth::guard('customer')->user() == null ? 'register-btn no-login' : '' }} bg-white w-[40px] h-[40px] shadow-[0px_4px_15px_2px_rgba(0,0,0,0.10)] rounded-full text-center border border-white flex items-center justify-center wishlist_icon"
              tabindex="0">
              {{-- <svg width="24" height="24" viewBox="0 0 24 24" fill="none" data-product-id="{{ $product->id }}" xmlns="http://www.w3.org/2000/svg"
                class="mx-auto heart-hole {{ Auth::guard('customer')->user() == null ? '':(count($product->favourite) > 0 ? 'hidden' : '') }}">
                <g id="ph:heart-bold">
                  <path id="Vector"
                    d="M16.6875 2.625C14.8041 2.625 13.1325 3.36844 12 4.64625C10.8675 3.36844 9.19594 2.625 7.3125 2.625C5.67208 2.62698 4.09942 3.27952 2.93947 4.43947C1.77952 5.59942 1.12698 7.17208 1.125 8.8125C1.125 15.5944 11.0447 21.0131 11.4666 21.2409C11.6305 21.3292 11.8138 21.3754 12 21.3754C12.1862 21.3754 12.3695 21.3292 12.5334 21.2409C12.9553 21.0131 22.875 15.5944 22.875 8.8125C22.873 7.17208 22.2205 5.59942 21.0605 4.43947C19.9006 3.27952 18.3279 2.62698 16.6875 2.625ZM16.1728 15.9713C14.8671 17.0792 13.4714 18.0764 12 18.9525C10.5286 18.0764 9.13287 17.0792 7.82719 15.9713C5.79562 14.2284 3.375 11.5706 3.375 8.8125C3.375 7.76821 3.78984 6.76669 4.52827 6.02827C5.26669 5.28984 6.26821 4.875 7.3125 4.875C8.98125 4.875 10.3781 5.75625 10.9584 7.17562C11.0429 7.38254 11.1871 7.55961 11.3726 7.68425C11.5581 7.80889 11.7765 7.87545 12 7.87545C12.2235 7.87545 12.4419 7.80889 12.6274 7.68425C12.8129 7.55961 12.9571 7.38254 13.0416 7.17562C13.6219 5.75625 15.0188 4.875 16.6875 4.875C17.7318 4.875 18.7333 5.28984 19.4717 6.02827C20.2102 6.76669 20.625 7.76821 20.625 8.8125C20.625 11.5706 18.2044 14.2284 16.1728 15.9713Z"
                    fill="#333333" />
                </g>
              </svg>
              <svg width="32" height="32" viewBox="0 0 32 32" fill="none" data-product-id="{{ $product->id }}" xmlns="http://www.w3.org/2000/svg"
                class="heart-full mx-auto {{ Auth::guard('customer')->user() == null ? 'hidden':( count($product->favourite) <= 0 ? 'hidden' : '') }}">
                <path
                  d="M27.5376 17.0627L17.4126 27.1877C17.2278 27.3744 17.0078 27.5226 16.7654 27.6238C16.5229 27.7249 16.2628 27.777 16.0001 27.777C15.7374 27.777 15.4773 27.7249 15.2349 27.6238C14.9924 27.5226 14.7724 27.3744 14.5876 27.1877L4.2001 16.8002C3.47912 16.0811 2.91238 15.2226 2.53454 14.277C2.1567 13.3314 1.9757 12.3187 2.00262 11.3008C2.02953 10.2829 2.26378 9.28117 2.69105 8.35688C3.11832 7.43259 3.72963 6.60517 4.4876 5.9252C7.4001 3.2877 12.1501 3.5377 15.0626 6.4627L16.0001 7.3877L17.2001 6.2002C17.9197 5.48318 18.7767 4.91876 19.7196 4.54074C20.6625 4.16272 21.672 3.97887 22.6876 4.0002C23.7079 4.02509 24.7122 4.25863 25.6388 4.68644C26.5653 5.11425 27.3945 5.72726 28.0751 6.4877C30.7001 9.4002 30.4626 14.1502 27.5376 17.0627Z"
                  fill="#FF6F6F" />
              </svg> --}}
              <img src="{{ asset('frontend/img/Default.svg') }}" data-product-id="{{ $product->id }}"
                     alt="heart" style="width:25px; height:25px;"
                     class="mx-auto heart-hole {{ Auth::guard('customer')->user() == null ? '':(count($product->favourite) > 0 ? 'hidden' : '') }}">
              <img src="{{ asset('frontend/img/Selected.svg') }}" data-product-id="{{ $product->id }}"
                     alt="heart selected"  style="width:25px; height:25px;"
                     class="heart-full mx-auto {{ Auth::guard('customer')->user() == null ? 'hidden':( count($product->favourite) <= 0 ? 'hidden' : '') }}">
            </button>
          </div>

    </div>

    <div class="grid-card-text-wrapper mt-5 lg:mt-0 flex-1">

        <div class="grid-card-header sm:flex sm:flex-row-reverse sm:items-start sm:justify-between">
            <div class="grid-card-icon-wrapper desktop-wrapper relative flex items-center justify-end">
                @if(isset($product->merchant))
                <button type="button" data-id="compare-modal" data-product-id="{{ $product->id }}"
                    data-product-name="{{ langbind($product, 'name') }}"
                    data-product-category-id="{{ $product->category_id }}"
                    data-product-featured-img="{{ isset($product->merchant->icon) ? $product->merchant->icon : asset('frontend/img/quality-healthcare.png') }}"
                    class="bg-white w-[40px] h-[40px] hover:shadow-[0px_4px_15px_2px_rgba(0,0,0,0.10)] rounded-full text-center border border-white hover:border-blueMediq compare_icon mr-2"
                    tabindex="0">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg" class="mx-auto">
                        <g id="Icon">
                            <path id="Vector"
                                d="M15.7942 14.0653L11.9251 10.1962C11.8176 10.0887 11.7417 9.97227 11.6972 9.84688C11.6528 9.72149 11.6302 9.58715 11.6295 9.44385C11.6295 9.30055 11.6521 9.1662 11.6972 9.04082C11.7424 8.91543 11.8183 8.799 11.9251 8.69152L15.7942 4.82242C16.0091 4.60747 16.2599 4.5 16.5465 4.5C16.8331 4.5 17.0839 4.60747 17.2988 4.82242C17.5138 5.03737 17.6212 5.29281 17.6212 5.58872C17.6212 5.88464 17.5138 6.13971 17.2988 6.35394L15.2837 8.3691H21.9202C22.2248 8.3691 22.4802 8.47227 22.6865 8.67863C22.8929 8.88498 22.9957 9.14005 22.995 9.44385C22.995 9.74836 22.8918 10.0038 22.6855 10.2101C22.4791 10.4165 22.224 10.5193 21.9202 10.5186H15.2837L17.2988 12.5338C17.5138 12.7487 17.6212 12.9995 17.6212 13.2861C17.6212 13.5727 17.5138 13.8235 17.2988 14.0384C17.0839 14.2534 16.8378 14.3698 16.5605 14.3877C16.2832 14.4056 16.0278 14.2981 15.7942 14.0653ZM7.19618 20.4869C7.41113 20.7019 7.6619 20.814 7.9485 20.8233C8.2351 20.8326 8.48588 20.7294 8.70083 20.5138L12.5699 16.6447C12.6774 16.5372 12.7533 16.4208 12.7978 16.2954C12.8422 16.17 12.8648 16.0356 12.8655 15.8923C12.8655 15.749 12.8429 15.6147 12.7978 15.4893C12.7526 15.3639 12.6767 15.2475 12.5699 15.14L8.70083 11.2709C8.48588 11.056 8.2351 10.9485 7.9485 10.9485C7.6619 10.9485 7.41113 11.056 7.19618 11.2709C6.98123 11.4859 6.87375 11.7413 6.87375 12.0372C6.87375 12.3331 6.98123 12.5882 7.19618 12.8024L9.21133 14.8176H2.57475C2.27024 14.8176 2.01481 14.9208 1.80846 15.1271C1.6021 15.3335 1.49929 15.5886 1.5 15.8923C1.5 16.1969 1.60318 16.4523 1.80953 16.6586C2.01588 16.865 2.27096 16.9678 2.57475 16.9671H9.21133L7.19618 18.9823C6.98123 19.1972 6.87375 19.448 6.87375 19.7346C6.87375 20.0212 6.98123 20.2719 7.19618 20.4869Z"
                                fill="#333333" />
                        </g>
                    </svg>
                </button>
                @else
                <button type="button" data-id="compare-modal" data-product-id="{{ $product->id }}"
                    data-product-name="{{ langbind($product, 'name') }}"
                    data-product-category-id="{{ $product->category_id }}"
                    data-product-featured-img="{{ isset($product->featured_img) ? $product->featured_img : asset('frontend/img/quality-healthcare.png') }}"
                    class="bg-white w-[40px] h-[40px] hover:shadow-[0px_4px_15px_2px_rgba(0,0,0,0.10)] rounded-full text-center border border-white hover:border-blueMediq compare_icon mr-2"
                    tabindex="0">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg" class="mx-auto">
                        <g id="Icon">
                            <path id="Vector"
                                d="M15.7942 14.0653L11.9251 10.1962C11.8176 10.0887 11.7417 9.97227 11.6972 9.84688C11.6528 9.72149 11.6302 9.58715 11.6295 9.44385C11.6295 9.30055 11.6521 9.1662 11.6972 9.04082C11.7424 8.91543 11.8183 8.799 11.9251 8.69152L15.7942 4.82242C16.0091 4.60747 16.2599 4.5 16.5465 4.5C16.8331 4.5 17.0839 4.60747 17.2988 4.82242C17.5138 5.03737 17.6212 5.29281 17.6212 5.58872C17.6212 5.88464 17.5138 6.13971 17.2988 6.35394L15.2837 8.3691H21.9202C22.2248 8.3691 22.4802 8.47227 22.6865 8.67863C22.8929 8.88498 22.9957 9.14005 22.995 9.44385C22.995 9.74836 22.8918 10.0038 22.6855 10.2101C22.4791 10.4165 22.224 10.5193 21.9202 10.5186H15.2837L17.2988 12.5338C17.5138 12.7487 17.6212 12.9995 17.6212 13.2861C17.6212 13.5727 17.5138 13.8235 17.2988 14.0384C17.0839 14.2534 16.8378 14.3698 16.5605 14.3877C16.2832 14.4056 16.0278 14.2981 15.7942 14.0653ZM7.19618 20.4869C7.41113 20.7019 7.6619 20.814 7.9485 20.8233C8.2351 20.8326 8.48588 20.7294 8.70083 20.5138L12.5699 16.6447C12.6774 16.5372 12.7533 16.4208 12.7978 16.2954C12.8422 16.17 12.8648 16.0356 12.8655 15.8923C12.8655 15.749 12.8429 15.6147 12.7978 15.4893C12.7526 15.3639 12.6767 15.2475 12.5699 15.14L8.70083 11.2709C8.48588 11.056 8.2351 10.9485 7.9485 10.9485C7.6619 10.9485 7.41113 11.056 7.19618 11.2709C6.98123 11.4859 6.87375 11.7413 6.87375 12.0372C6.87375 12.3331 6.98123 12.5882 7.19618 12.8024L9.21133 14.8176H2.57475C2.27024 14.8176 2.01481 14.9208 1.80846 15.1271C1.6021 15.3335 1.49929 15.5886 1.5 15.8923C1.5 16.1969 1.60318 16.4523 1.80953 16.6586C2.01588 16.865 2.27096 16.9678 2.57475 16.9671H9.21133L7.19618 18.9823C6.98123 19.1972 6.87375 19.448 6.87375 19.7346C6.87375 20.0212 6.98123 20.2719 7.19618 20.4869Z"
                                fill="#333333" />
                        </g>
                    </svg>
                </button>
                @endif
                <button type="button" data-product-id="{{ $product->id }}"
                    class="{{ Auth::guard('customer')->user() == null ? 'register-btn no-login' : '' }} wishlist_icon bg-white w-[40px] h-[40px] shadow-[0px_4px_15px_2px_rgba(0,0,0,0.10)] rounded-full text-center border border-white flex items-center justify-center"
                    tabindex="0">
                    {{-- <svg width="24" height="24" viewBox="0 0 24 24" fill="none" data-product-id="{{ $product->id }}"
                        xmlns="http://www.w3.org/2000/svg" class="mx-auto heart-hole {{ Auth::guard('customer')->user() == null ? '':(count($product->favourite) > 0 ? 'hidden' : '') }}">
                        <g id="ph:heart-bold">
                            <path id="Vector"
                                d="M16.6875 2.625C14.8041 2.625 13.1325 3.36844 12 4.64625C10.8675 3.36844 9.19594 2.625 7.3125 2.625C5.67208 2.62698 4.09942 3.27952 2.93947 4.43947C1.77952 5.59942 1.12698 7.17208 1.125 8.8125C1.125 15.5944 11.0447 21.0131 11.4666 21.2409C11.6305 21.3292 11.8138 21.3754 12 21.3754C12.1862 21.3754 12.3695 21.3292 12.5334 21.2409C12.9553 21.0131 22.875 15.5944 22.875 8.8125C22.873 7.17208 22.2205 5.59942 21.0605 4.43947C19.9006 3.27952 18.3279 2.62698 16.6875 2.625ZM16.1728 15.9713C14.8671 17.0792 13.4714 18.0764 12 18.9525C10.5286 18.0764 9.13287 17.0792 7.82719 15.9713C5.79562 14.2284 3.375 11.5706 3.375 8.8125C3.375 7.76821 3.78984 6.76669 4.52827 6.02827C5.26669 5.28984 6.26821 4.875 7.3125 4.875C8.98125 4.875 10.3781 5.75625 10.9584 7.17562C11.0429 7.38254 11.1871 7.55961 11.3726 7.68425C11.5581 7.80889 11.7765 7.87545 12 7.87545C12.2235 7.87545 12.4419 7.80889 12.6274 7.68425C12.8129 7.55961 12.9571 7.38254 13.0416 7.17562C13.6219 5.75625 15.0188 4.875 16.6875 4.875C17.7318 4.875 18.7333 5.28984 19.4717 6.02827C20.2102 6.76669 20.625 7.76821 20.625 8.8125C20.625 11.5706 18.2044 14.2284 16.1728 15.9713Z"
                                fill="#333333" />
                        </g>
                    </svg>
                    
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" data-product-id="{{ $product->id }}"
                        xmlns="http://www.w3.org/2000/svg" class="heart-full mx-auto {{ Auth::guard('customer')->user() == null ? 'hidden':( count($product->favourite) <= 0 ? 'hidden' : '') }}">
                        <path
                            d="M27.5376 17.0627L17.4126 27.1877C17.2278 27.3744 17.0078 27.5226 16.7654 27.6238C16.5229 27.7249 16.2628 27.777 16.0001 27.777C15.7374 27.777 15.4773 27.7249 15.2349 27.6238C14.9924 27.5226 14.7724 27.3744 14.5876 27.1877L4.2001 16.8002C3.47912 16.0811 2.91238 15.2226 2.53454 14.277C2.1567 13.3314 1.9757 12.3187 2.00262 11.3008C2.02953 10.2829 2.26378 9.28117 2.69105 8.35688C3.11832 7.43259 3.72963 6.60517 4.4876 5.9252C7.4001 3.2877 12.1501 3.5377 15.0626 6.4627L16.0001 7.3877L17.2001 6.2002C17.9197 5.48318 18.7767 4.91876 19.7196 4.54074C20.6625 4.16272 21.672 3.97887 22.6876 4.0002C23.7079 4.02509 24.7122 4.25863 25.6388 4.68644C26.5653 5.11425 27.3945 5.72726 28.0751 6.4877C30.7001 9.4002 30.4626 14.1502 27.5376 17.0627Z"
                            fill="#FF6F6F" />
                    </svg> --}}
                    <img src="{{ asset('frontend/img/Default.svg') }}" data-product-id="{{ $product->id }}" class="mx-auto heart-hole {{ Auth::guard('customer')->user() == null ? '':(count($product->favourite) > 0 ? 'hidden' : '') }}">
                    <img src="{{ asset('frontend/img/Selected.svg') }}" data-product-id="{{ $product->id }}" class="heart-full mx-auto {{ Auth::guard('customer')->user() == null ? 'hidden':( count($product->favourite) <= 0 ? 'hidden' : '') }}">
                </button>
             </div>

            <div class="grid-card-infos mt-3 sm:mt-0 basis-[36.25rem]">
                <a href="{{ route('product-detail',['category' => isset($product->category) ? str_replace(' ','-',$product->category->name_en) : '', 'slug' => isset($product->slug_en) ? $product->slug_en : '']) }}">
                    <h2 class="font-bold me-body23">{{ langbind($product, 'name') }}</h2>
                </a>
                <div class="xsm:flex items-center justify-between font-secondary me-body16 mt-3">
                    {{-- <div class="rating-text flex items-center"> --}}
                        {{-- <p><img src="{{asset('frontend/img/health-rating-star.svg')}}" alt="star icon" class="w-auto h-auto align-middle object-cover object-center"></p>
                        <p class="font-bold text-darkgray me-body16 pl-1">4.8 <span class="font-normal">(52 reviews)</span></p> --}}
                    {{-- </div> --}}

                    {{-- fordesktop --}}
                    <ul class="branch-list relative items-center flex-wrap mt-1 xsm:mt-0 lg:flex hidden">
                        @if (isset($product->merchant) && count($product->merchant->merchantLocations) > 0)
                            <li class="w-auto h-auto mr-1">
                                <img src="{{ asset('frontend/img/ph_map-pin-light.svg') }}" alt=""
                                    class="w-auto h-auto align-middle object-cover object-center">
                            </li>

                            @foreach ($product->merchant->merchantLocations->take(5) as $location)
                                <li class="mr-1">
                                    {{ langbind($location->area, 'name') }}<span
                                        class=" text-meA3 ml-1">{{ !$loop->last ? '|' : '' }}</span>
                                </li>
                            @endforeach
                        @endif

                        @if (isset($product->merchant) && count($product->merchant->merchantLocations) > 3)
                            <li class="w-auto h-auto">
                                <button type="button" class="plan-tooltip-btn w-auto h-fit align-middle">
                                    <img src="{{ asset('frontend/img/dots.svg') }}" alt="see more"
                                        class="w-auto h-auto align-middle object-cover object-center">

                                    <div class="plan-tooltip tooltip-more me-body16 text-darkgray">
                                        <div class="plan-tooltip-header font-bold p-2 lg:p-[10px] bg-far rounded">
                                            @lang('labels.product_detail.location')
                                        </div>

                                        <div class="plan-tooltip-body mt-2">
                                            <ul class="columns-2 list-disc ">

                                                @foreach ($product->merchant->merchantLocations as $location)
                                                    <li class="ml-[26px] mt-1 first:mt-0">
                                                        {{ langbind($location->area, 'name') }}
                                                    </li>
                                                @endforeach


                                            </ul>
                                        </div>
                                    </div>
                                </button>
                            </li>
                        @endif
                    </ul>
                    {{-- formobile --}}
                    <ul class="branch-list relative items-center flex-wrap mt-1 xsm:mt-0 lg:hidden flex">
                        @if (isset($product->merchant) && count($product->merchant->merchantLocations) > 0)
                        <li class="w-auto h-auto mr-1">
                          <img src="{{ asset('frontend/img/ph_map-pin-light.svg') }}" alt=""
                            class="w-auto h-auto align-middle object-cover object-center">
                        </li>

                        @foreach ($product->merchant->merchantLocations->take(3) as $location)
                        <li class="mr-1">
                            {{ langbind($location->area, 'name') }}<span class=" text-meA3 ml-1">{{ !$loop->last ? '|' : '' }}</span>
                        </li>
                        @endforeach

                   

                        <li class="w-auto h-auto">
                          <button type="button" class="plan-tooltip-btn w-auto h-fit align-middle">
                            <img src="{{ asset('frontend/img/dots.svg') }}" alt="see more"
                              class="w-auto h-auto align-middle object-cover object-center">

                            <div class="plan-tooltip tooltip-more me-body16 text-darkgray">
                              <div class="plan-tooltip-header font-bold p-2 lg:p-[10px] bg-far rounded">
                                @lang('labels.product_detail.location')
                              </div>

                              <div class="plan-tooltip-body mt-2">
                                <ul class="columns-2 list-disc ">
                                @foreach ($product->merchant->merchantLocations as $location)
                                  <li class="ml-[26px] mt-1 first:mt-0">{{ langbind($location->area, 'name') }}</li>
                                @endforeach
                                </ul>
                              </div>
                            </div>
                          </button>
                        </li>
                        @endif
                      </ul>

                </div>

                <div class="">
                    <a href="{{ route('product-detail',['category' => isset($product->category) ? str_replace(' ','-',$product->category->name_en) : '', 'slug' => isset($product->slug_en) ? $product->slug_en : '']) }}">
                        <ul class="flex flex-wrap mt-3 status-container me-body14">

                            @php $takeNum = isset($product->number_of_dose) ?  1 : 0; @endphp
                            @if (isset($product->number_of_dose))
                                <li
                                    class="status-container--item px-[16px] py-[6px] rounded-[50px] mr-1 last:mr-0 mb-1 lg:mr-2 lg:last:mr-0 lg:mb-2 helvetica-normal font-medium text-darkgray me-body14 bg-tagbg">
                                    {{ $product->number_of_dose }} {{ $product->number_of_dose == 1 ? __('labels.product_detail.item') : __('labels.product_detail.items') }}
                                </li>
                            @endif
                            @if (count(productTagVal($product)) > 0)
                                @foreach (productTagVal($product)->take(8 - $takeNum) as $key => $tag)
                                    <li
                                        class="status-container--item px-[16px] py-[6px] rounded-[50px] mr-1 last:mr-0 mb-1 lg:mr-2 lg:last:mr-0 lg:mb-2 helvetica-normal font-medium text-darkgray me-body14 bg-tagbg">
                                        {{ langbind($tag, 'name') }}

                                    </li>
                                @endforeach
                            @endif

                        </ul>
                    </a>
                </div>
            </div>
        </div>

        <div class="quick-preview-offer-container sm:flex justify-between ">
            <a href="{{ route('product-detail',['category' => isset($product->category) ? str_replace(' ','-',$product->category->name_en) : '', 'slug' => isset($product->slug_en) ? $product->slug_en : '']) }}">
            <div class="quick-preview-offer me-body16">
                <ul class="offer-services mt-5 sm:mt-6">

                    {{-- <li class="flex items-center mt-1 first:mt-0 lg:mt-2 first:lg:mt-0">
                        <span class="mr-1"><img src="{{asset('frontend/img/circum_calendar.svg')}}" alt="" class="w-auto h-auto align-middle object-cover object-center"></span>
                        <span>
                        Available in 7-Day
                        </span>
                    </li>

                    <li class="flex items-center mt-1 first:mt-0 lg:mt-2 first:lg:mt-0">
                        <span class="mr-1"><img src="{{asset('frontend/img/24-hours-support 2.svg')}}" alt="" class="w-auto h-auto align-middle object-cover object-center"></span>
                        <span>
                        24-Hour Confirmation
                        </span>
                    </li> --}}
                    @if (count($product->timeSlotTags) > 0)
                        @foreach ($product->timeSlotTags as $time)
                            @php $timeSlot = App\Models\TimeSlotTag::where('id',$time->time_slot_tag_id)->first(); @endphp
                            <li class="flex items-center mt-1 last:mt-0 lg:mt-2 last:lg:mt-0">
                                <span class="mr-1"><img
                                        src="{{ isset($timeSlot->img) ? $timeSlot->img : asset('frontend/img/circum_calendar.svg') }}"
                                        alt=""
                                        class="w-auto h-auto align-middle object-cover object-center"></span>
                                <span>
                                    {{ langbind($timeSlot, 'name') }}
                                </span>
                            </li>
                        @endforeach
                    @endif

                    {{-- <li class="flex items-center mt-1 first:mt-0 lg:mt-2 first:lg:mt-0">
                        <span class="mr-1"><img src="{{asset('frontend/img/Q-dollar.svg')}}" alt="" class="w-auto h-auto align-middle object-cover object-center"></span>
                        <span>
                        3% Rebate
                        </span>
                    </li> --}}

                    {{-- <li class="flex items-center mt-1 first:mt-0 lg:mt-2 first:lg:mt-0">
                        <span class="mr-1"><img src="{{asset('frontend/img/mdi_coupon.svg')}}" alt="" class="w-auto h-auto align-middle object-cover object-center"></span>
                        <span>
                        3 @lang('labels.compare.coupon')
                        </span>
                    </li> --}}
                    @if(getTotalCoupon($product->id, $product->category_id, $product->sub_category_id)->count() > 0)
                    <li class="flex items-center mt-1 last:mt-0 lg:mt-2 last:lg:mt-0">
                        <span class="mr-1"><img src="{{ asset('frontend/img/mdi_coupon.svg') }}" alt=""
                                class="w-auto h-auto align-middle object-cover object-center"></span>
                       
                        <span>
                            {{ getTotalCoupon($product->id, $product->category_id, $product->sub_category_id)->count() }}
                            @lang('labels.compare.coupon')
                        </span>
                    </li>
                    @endif

                </ul>
            </div>
            </a>
            <div class="quick-preview-price me-body16 mt-5 sm:mt-0 sm:max-w-[15.813rem] 4xl:basis-[15.813rem]">
                {{-- <div class="font-bold mt-2 sm:mt-0">
                <span class="me-body36 mr-1 sm:mr-2">$3,185</span>
                <span class="text-lightgray line-through">$4,900</span>
                </div> --}}
                <div class="font-bold mt-2 sm:mt-0 price-sec">
                    @if ($prodDis != null)
                        <span class="me-body36 mr-1 sm:mr-2">${{ number_format($prodDis) }}@if($isVariable == true)<span class="linethrough text-lightgray me-body16 ml-[10px] up-text">up</span>@endif</span>
                        <span class="text-lightgray line-through">${{ number_format($productPrice->original_price) }}</span>
                    @else
                        <span class="me-body36 mr-1 sm:mr-2">${{ number_format($productPrice->original_price) }}@if($isVariable == true)<span class="linethrough text-lightgray me-body16 ml-[10px] up-text">up</span>@endif</span>
                    @endif
                </div>

                {{-- <ul class="tag-group overflow-x-auto whitespace-nowrap scrollbar-hide flex items-center cursor-grabbing">

                    <li class="discount rounded py-1 px-2 sm:py-[6px] sm:px-[10px] mr-1 lg:mr-2 last:lg:mr-0">
                        -60%
                    </li>

                    <li class="discount rounded py-1 px-2 sm:py-[6px] sm:px-[10px] mr-1 lg:mr-2 last:lg:mr-0">
                        Save $6,100
                    </li>

                </ul> --}}
                <ul
                    class="tag-group overflow-x-auto whitespace-nowrap scrollbar-hide flex items-center">
                    @if ($prodDis != null)
                        <li class="discount rounded py-1 px-2 sm:py-[6px] sm:px-[10px] mr-1 lg:mr-2 last:lg:mr-0">
                            -{{ round((($productPrice->original_price - $prodDis) / $productPrice->original_price) * 100, 0) }}%
                        </li>
                        <li class="discount rounded py-1 px-2 sm:py-[6px] sm:px-[10px] mr-1 lg:mr-2 last:lg:mr-0">
                            @lang('labels.product_detail.save') ${{ number_format($productPrice->original_price - $prodDis) }}
                        </li>
                    @endif
                    {{-- <li class="stock rounded py-1 px-2 sm:py-[6px] sm:px-[10px] mr-1 lg:mr-2 last:lg:mr-0">
                        ONLY 3 LEFT
                     </li> --}}
                    {{-- @if (count($product->vaccineStockTags) > 0)
                    @foreach ($product->vaccineStockTags as $stock)
                      @php  $vaccineStock = App\Models\VaccineFactoryTag::where('id',$stock->vaccine_factory_tag_id)->first(); @endphp
                      <li class="stock rounded py-1 px-2 sm:py-[6px] sm:px-[10px] mr-1 lg:mr-2 last:lg:mr-0">
                          {{langbind($vaccineStock,'name')}}
                      </span>
                    @endforeach
                    @endif --}}

                </ul>


                <div class="mt-2">
                    <button type="button" onclick="addToCart({{ $product }},'/add-to-cart','add')"
                        class="{{!Auth::guard('customer')->check() ? 'register-btn' : ''}} add-to-card-btn text-light me-body18 font-bold bg-orangeMediq border border-solid border-orangeMediq rounded-md w-36 sm:w-full py-2 4xl:py-3 hover:bg-brightOrangeMediq transition-colors duration-300">
                        @lang('labels.add_to_cart')
                    </button>

                    <!-- <p class="mt-2 sm:text-center">
                        120+ people booking
                    </p> -->
                </div>
            </div>
        </div>
    </div>

    <div id="compare-modal-grid-recommend{{ $product->id }}"
        class="w-full bg-orangeLight rounded-tl-[200px] pl-[100px] lg:pl-[80px] xl:pl-[100px] 5xl:pl-[180px] 7xl:pl-[280px] pr-[45px] p-5 fixed left-0 -bottom-12 z-[5] hidden compare-modal">
        <div class="flex justify-between items-center compare-two-col">
            <div class="flex gap-[24px] xl:gap-[35px] w-full max-w-[90%] xl:max-w-[65%] selected-items">

                <div id="selected-item0" class="flex items-start selected-items-box relative w-1/4">
                    <div class="flex items-center selected-items-box--top pr-[24px]">
                        <p class="selected-items-box--top--img"><img
                                src="{{ asset('frontend/img/vaccine-injection.png') }}" alt=""
                                class="rounded-[12px]"></p>
                        <p class="font-secondary font-medium me-body16 pl-[10px] selected-items-box--top--title">
                            Hepatitis B Vaccine Injection</p>
                    </div>
                    <button data-id="selected-item0"
                        class="w-6 h-6 rounded-full bg-meA3 text-white flex items-center justify-center selected-items-box-delete absolute top-0 right-0"><img
                            src="{{ asset('frontend/img/white-close.svg') }}" alt="close image"
                            class="w-[10px]" /></button>
                </div>

                <div id="selected-item1" class="flex items-start selected-items-box relative w-1/4">
                    <div class="flex items-center selected-items-box--top pr-[24px]">
                        <p class="selected-items-box--top--img"><img
                                src="{{ asset('frontend/img/annual_health_check.png') }}" alt=""
                                class="rounded-[12px]"></p>
                        <p class="font-secondary font-medium me-body16 pl-[10px] selected-items-box--top--title">Annual
                            Health Check Plan</p>
                    </div>
                    <button data-id="selected-item1"
                        class="w-6 h-6 rounded-full bg-meA3 text-white flex items-center justify-center selected-items-box-delete absolute top-0 right-0"><img
                            src="{{ asset('frontend/img/white-close.svg') }}" alt="close image"
                            class="w-[10px]" /></button>
                </div>

                <div id="selected-item2" class="flex items-start selected-items-box relative w-1/4">
                    <div class="flex items-center selected-items-box--top pr-[24px]">
                        <p class="selected-items-box--top--img"><img
                                src="{{ asset('frontend/img/y-dna-check.png') }}" alt=""
                                class="rounded-[12px]"></p>
                        <p class="font-secondary font-medium me-body16 pl-[10px] selected-items-box--top--title">
                            Y-Chromosome DNA Test</p>
                    </div>
                    <button data-id="selected-item2"
                        class="w-6 h-6 rounded-full bg-meA3 text-white flex items-center justify-center selected-items-box-delete absolute top-0 right-0"><img
                            src="{{ asset('frontend/img/white-close.svg') }}" alt="close image"
                            class="w-[10px]" /></button>
                </div>


                <div data-id="add-compare-modal-grid-recommend{{ $product->id }}"
                    class="bg-[#0000001a] w-20 h-20 rounded-[10px] flex items-center justify-center me-plus-icon cursor-pointer">
                    <img src="{{ asset('frontend/img/me-plus.svg') }}" alt="plus">
                </div>
            </div>

            <div class="w-fit flex justify-between xl:gap-[50px] compare-textbox">
                <div class="compare-text-section text-center">
                    <button type="button"
                        class="border border-darkgray py-[10px] px-5 rounded-full text-darkgray bg-whitez font-bold font-secondary me-body16 hover:border-blueMediq hover:bg-blueMediq hover:text-whitez">@lang('labels.footer.compare')</button>
                    <p class="pt-1 font-bold font-secondary me-body15 text-darkgray">@lang('labels.footer.compare_products')</p>
                </div>

                <p data-id="compare-modal-grid-recommend{{ $product->id }}"
                    class="text-darkgray text-24 close-compare cursor-pointer"><img
                        src="{{ asset('frontend/img/white-close.svg') }}" alt="close image" class="invert" /></p>
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div id="add-compare-modal-grid-recommend{{ $product->id }}"
        class="modal hidden fixed z-[1001] left-0 top-0 w-full h-full bg-black/[.75]  overflow-auto">
        <!-- Modal content -->
        <div class="modal-content max-w-[80%] lg:max-w-[700px] shadow-shadow02 my-[15%] mx-auto">
            <div class="relative rounded-[12px] bg-white">
                <div class="flex ml-auto mr-6 w-5 h-5 absolute right-0 top-4">
                    <span data-id="add-compare-modal-grid-recommend{{ $product->id }}"
                        class="pb-[4px] absolute left-1/2 top-1/2 -translate-y-1/2 -translate-x-1/2 close-add-compare-modal  flex items-center justify-center text-[32px] w-full cursor-pointer text-[#1A1818] focus:no-underline">&times;</span>
                </div>
                <div class="modal-content-plan">
                    <div class="preview-bgradient p-10 pb-5 rounded-t-[40px]">
                        <h2 class="font-secondary font-bold text-darkgray me-title29">@lang('labels.compare.add_compare')</h2>
                    </div>

                    <div class="bg-white p-10 pt-5 rounded-b-[40px]">
                        <p class="font-secondary font-medium text-lightgray me-body16 pb-5">@lang('labels.product.recent_view')</p>
                        <div class="flex">

                            <div class="relative mr-3 last-of-type:pr-0 compare-img-container">
                                <img src="{{ asset('frontend/img/vaccine-injection.png') }}" alt="image"
                                    class="w-[146px]">
                                <button type="button"
                                    class="border border-darkgray py-[10px] px-5 rounded-full text-darkgray bg-whitez font-bold font-secondary me-body16 hover:border-blueMediq hover:bg-blueMediq hover:text-whitez absolute left-2/4 top-2/4 -translate-x-2/4 -translate-y-2/4 hidden">Compare</button>
                            </div>

                            <div class="relative mr-3 last-of-type:pr-0 compare-img-container">
                                <img src="{{ asset('frontend/img/vaccine-injection.png') }}" alt="image"
                                    class="w-[146px]">
                                <button type="button"
                                    class="border border-darkgray py-[10px] px-5 rounded-full text-darkgray bg-whitez font-bold font-secondary me-body16 hover:border-blueMediq hover:bg-blueMediq hover:text-whitez absolute left-2/4 top-2/4 -translate-x-2/4 -translate-y-2/4 hidden">Compare</button>
                            </div>

                            <div class="relative mr-3 last-of-type:pr-0 compare-img-container">
                                <img src="{{ asset('frontend/img/vaccine-injection.png') }}" alt="image"
                                    class="w-[146px]">
                                <button type="button"
                                    class="border border-darkgray py-[10px] px-5 rounded-full text-darkgray bg-whitez font-bold font-secondary me-body16 hover:border-blueMediq hover:bg-blueMediq hover:text-whitez absolute left-2/4 top-2/4 -translate-x-2/4 -translate-y-2/4 hidden">Compare</button>
                            </div>

                            <div class="relative mr-3 last-of-type:pr-0 compare-img-container">
                                <img src="{{ asset('frontend/img/vaccine-injection.png') }}" alt="image"
                                    class="w-[146px]">
                                <button type="button"
                                    class="border border-darkgray py-[10px] px-5 rounded-full text-darkgray bg-whitez font-bold font-secondary me-body16 hover:border-blueMediq hover:bg-blueMediq hover:text-whitez absolute left-2/4 top-2/4 -translate-x-2/4 -translate-y-2/4 hidden">Compare</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</article>
@endforeach

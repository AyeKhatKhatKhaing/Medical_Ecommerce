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
    $isVariable = true;
    $productPrice = getLowestPrice($product);
    $prodDis = isset($productPrice->promotion_price) ? $productPrice->promotion_price : (isset($productPrice->discount_price) ? $productPrice->discount_price : '');
}else{
    $isVariable = false;
    $prodDis = isset($product->promotion_price) ? $product->promotion_price : (isset($product->discount_price) ? $product->discount_price : '');
    $productPrice = $product;
}
@endphp


<dialog id="quick-preview-modal{{ $product->id }}" data-unique-id="{{ $product->id }}"
    class="quick-preview-modal fixed z-[1001] left-0 top-0 w-full h-full overflow-hidden bg-linear-black items-center justify-center text-darkgray scrollbar-hide flex-col hidden">
    <!-- <div class="bg-white"> -->
        <div
            class="bg-white rounded-xl relative quick-preview-body py-4 px-4 relative md:px-7 md:py-7 xl:px-8 xl:py-8 4xl:px-10 4xl:py-10 max-w-[900px] mx-auto w-full">
            <button
                class="quick-preview-close absolute top-3 md:top-[38px] right-4 2xs:right-[32px] h-fit md:right-7 xl:right-8 4xl:right-10"
                onclick="closeQuickPreviewModal(event)" data-previewId="quick-preview-modal{{ $product->id }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                    <path
                        d="M17.3998 0.613387C17.2765 0.489783 17.1299 0.391719 16.9686 0.324811C16.8073 0.257902 16.6344 0.223462 16.4598 0.223462C16.2852 0.223462 16.1123 0.257902 15.951 0.324811C15.7897 0.391719 15.6432 0.489783 15.5198 0.613387L8.99981 7.12005L2.47981 0.600054C2.35637 0.476611 2.20982 0.378691 2.04853 0.311885C1.88725 0.245078 1.71438 0.210693 1.53981 0.210693C1.36524 0.210693 1.19237 0.245078 1.03109 0.311885C0.8698 0.378691 0.723252 0.476611 0.59981 0.600054C0.476367 0.723496 0.378447 0.870044 0.31164 1.03133C0.244834 1.19261 0.210449 1.36548 0.210449 1.54005C0.210449 1.71463 0.244834 1.88749 0.31164 2.04878C0.378447 2.21006 0.476367 2.35661 0.59981 2.48005L7.11981 9.00005L0.59981 15.5201C0.476367 15.6435 0.378447 15.79 0.31164 15.9513C0.244834 16.1126 0.210449 16.2855 0.210449 16.4601C0.210449 16.6346 0.244834 16.8075 0.31164 16.9688C0.378447 17.1301 0.476367 17.2766 0.59981 17.4001C0.723252 17.5235 0.8698 17.6214 1.03109 17.6882C1.19237 17.755 1.36524 17.7894 1.53981 17.7894C1.71438 17.7894 1.88725 17.755 2.04853 17.6882C2.20982 17.6214 2.35637 17.5235 2.47981 17.4001L8.99981 10.8801L15.5198 17.4001C15.6433 17.5235 15.7898 17.6214 15.9511 17.6882C16.1124 17.755 16.2852 17.7894 16.4598 17.7894C16.6344 17.7894 16.8072 17.755 16.9685 17.6882C17.1298 17.6214 17.2764 17.5235 17.3998 17.4001C17.5233 17.2766 17.6212 17.1301 17.688 16.9688C17.7548 16.8075 17.7892 16.6346 17.7892 16.4601C17.7892 16.2855 17.7548 16.1126 17.688 15.9513C17.6212 15.79 17.5233 15.6435 17.3998 15.5201L10.8798 9.00005L17.3998 2.48005C17.9065 1.97339 17.9065 1.12005 17.3998 0.613387Z"
                        fill="#333333" />
                </svg>
            </button>
            <div class="mt-3">
                <div class="flex md:flex-row flex-col justify-between items-start">
                    <div class="sm:min-w-[288px] md:w-auto w-full mr-5">
                        {{-- {{ $product->productGallery }} --}}
                        {{-- <img src="{{isset($product->featured_img) ? $product->featured_img :asset('frontend/img/detail-img.png')}}"
                        alt="detail-img" />
                        <div class="flex flex-wrap">
                            @if (count($allImages) > 0)
                            @foreach ($allImages->take(3) as $img)
                            <img src="{{$img}}" alt="small1" class="mr-2 my-1" />
                            @endforeach
                            @endif

                        </div> --}}
                        <div class="main-image-slider w-full md:w-[281px] w-[281px]">
                            <div class="me-medical-main">
                                {{-- @if(isset($allImages_products)) --}}
                                {{-- @if (isset($allImages_products) && count($allImages_products) > 0)
                                    @foreach ($allImages_products->take(1) as $img)
                                    <img src="{{ $img }}" alt="main image" class="w-[281px] h-[257px] object-cover">
                                    @endforeach
                                @elseif (isset($allImages) && count($allImages) > 0)
                                    @foreach ($allImages->take(1) as $img)
                                    <img src="{{ $img }}" alt="main image" class="w-[281px] h-[257px] object-cover">
                                    @endforeach
                                @endif --}}
                                {{-- <img src="{{ isset($product->merchant) ?  $product->merchant->icon : asset('frontend/img/card-banner.png') }}" alt="main image" class="w-[281px] h-[257px] object-cover"> --}}
                                @if(isset($product->merchant))
                                <img src="{{ isset($product->merchant->icon) ? $product->merchant->icon : asset('frontend/img/quality-healthcare.png') }}"
                                    alt="quality healthcare" class="w-[281px] h-[257px] object-cover" style="min-width:auto;">
                                @else
                                <img src="{{ isset($product->featured_img) ? $product->featured_img : asset('frontend/img/quality-healthcare.png') }}"
                                    alt="quality healthcare--" class="w-[281px] h-[257px] object-cover" style="min-width:auto;">
                                @endif
                            </div>

                            <div class="me-medical-sub pt-2 flex w-[246px]">
                                @if (isset($allImages_products) && count($allImages_products) > 0)
                                @foreach ($allImages_products->take(3) as $key => $img)
                                <img src="{{ $img }}" alt="small1"
                                    class="mr-2 my-1 w-[88px] h-[60px] object-cover rounded-[4px]" data-id="{{ $key }}" data-image="{{ $img }}">
                                @endforeach                       
                                @elseif (isset($allImages) && count($allImages) > 0)
                                @foreach ($allImages->take(3) as $key => $img)
                                <img src="{{ $img }}" alt="small1"
                                    class="mr-2 my-1 w-[88px] h-[60px] object-cover rounded-[4px]" data-id="{{ $key }}" data-image="{{ $img }}">
                                @endforeach
                                @endif

                            </div>
                        </div>
                        <div class="relative flex items-center justify-center md:justify-start mt-[10px] md:mt-8">
                            @if(isset($product->merchant))
                            <button type="button" data-id="compare-modal" data-product-id="{{ $product->id }}"
                                data-product-name="{{ langbind($product, 'name') }}"
                                data-product-category-id="{{ $product->category_id }}"
                                data-product-featured-img="{{ isset($product->merchant->icon) ? $product->merchant->icon : asset('frontend/img/quality-healthcare.png') }}"
                                class="bg-white w-[50px] h-[50px] shadow-[0px_4px_15px_2px_rgba(0,0,0,0.10)] rounded-full text-center border border-white hover:border-blueMediq compare_icon mr-2"
                                tabindex="0">
                                <!-- <img src="{{ asset('frontend/img/compare-icon.svg') }}" alt="compare icon" class="w-auto h-auto align-middle object-cover object-center mx-auto"> -->
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="mx-auto">
                                    <g id="Icon">
                                        <path id="Vector"
                                            d="M15.7942 14.0653L11.9251 10.1962C11.8176 10.0887 11.7417 9.97227 11.6972 9.84688C11.6528 9.72149 11.6302 9.58715 11.6295 9.44385C11.6295 9.30055 11.6521 9.1662 11.6972 9.04082C11.7424 8.91543 11.8183 8.799 11.9251 8.69152L15.7942 4.82242C16.0091 4.60747 16.2599 4.5 16.5465 4.5C16.8331 4.5 17.0839 4.60747 17.2988 4.82242C17.5138 5.03737 17.6212 5.29281 17.6212 5.58872C17.6212 5.88464 17.5138 6.13971 17.2988 6.35394L15.2837 8.3691H21.9202C22.2248 8.3691 22.4802 8.47227 22.6865 8.67863C22.8929 8.88498 22.9957 9.14005 22.995 9.44385C22.995 9.74836 22.8918 10.0038 22.6855 10.2101C22.4791 10.4165 22.224 10.5193 21.9202 10.5186H15.2837L17.2988 12.5338C17.5138 12.7487 17.6212 12.9995 17.6212 13.2861C17.6212 13.5727 17.5138 13.8235 17.2988 14.0384C17.0839 14.2534 16.8378 14.3698 16.5605 14.3877C16.2832 14.4056 16.0278 14.2981 15.7942 14.0653ZM7.19618 20.4869C7.41113 20.7019 7.6619 20.814 7.9485 20.8233C8.2351 20.8326 8.48588 20.7294 8.70083 20.5138L12.5699 16.6447C12.6774 16.5372 12.7533 16.4208 12.7978 16.2954C12.8422 16.17 12.8648 16.0356 12.8655 15.8923C12.8655 15.749 12.8429 15.6147 12.7978 15.4893C12.7526 15.3639 12.6767 15.2475 12.5699 15.14L8.70083 11.2709C8.48588 11.056 8.2351 10.9485 7.9485 10.9485C7.6619 10.9485 7.41113 11.056 7.19618 11.2709C6.98123 11.4859 6.87375 11.7413 6.87375 12.0372C6.87375 12.3331 6.98123 12.5882 7.19618 12.8024L9.21133 14.8176H2.57475C2.27024 14.8176 2.01481 14.9208 1.80846 15.1271C1.6021 15.3335 1.49929 15.5886 1.5 15.8923C1.5 16.1969 1.60318 16.4523 1.80953 16.6586C2.01588 16.865 2.27096 16.9678 2.57475 16.9671H9.21133L7.19618 18.9823C6.98123 19.1972 6.87375 19.448 6.87375 19.7346C6.87375 20.0212 6.98123 20.2719 7.19618 20.4869Z"
                                            fill="#333333" />
                                    </g>
                                </svg>
                                {{-- <div class="compare-warning-box absolute top-[-75px] left-0 w-full px-3 py-2 rounded-md bg-whitez">
                                    <span class="font-normal me-body16 text-darkgray text-left">You can compare up
                                        to 4 products.</span>
                                </div> --}}

                            </button>
                            @else
                            <button type="button" data-id="compare-modal" data-product-id="{{ $product->id }}"
                                data-product-name="{{ langbind($product, 'name') }}"
                                data-product-category-id="{{ $product->category_id }}"
                                data-product-featured-img="{{ isset($product->featured_img) ? $product->featured_img : asset('frontend/img/quality-healthcare.png') }}"
                                class="bg-white w-[50px] h-[50px] shadow-[0px_4px_15px_2px_rgba(0,0,0,0.10)] rounded-full text-center border border-white hover:border-blueMediq compare_icon mr-2"
                                tabindex="0">
                                <!-- <img src="{{ asset('frontend/img/compare-icon.svg') }}" alt="compare icon" class="w-auto h-auto align-middle object-cover object-center mx-auto"> -->
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="mx-auto">
                                    <g id="Icon">
                                        <path id="Vector"
                                            d="M15.7942 14.0653L11.9251 10.1962C11.8176 10.0887 11.7417 9.97227 11.6972 9.84688C11.6528 9.72149 11.6302 9.58715 11.6295 9.44385C11.6295 9.30055 11.6521 9.1662 11.6972 9.04082C11.7424 8.91543 11.8183 8.799 11.9251 8.69152L15.7942 4.82242C16.0091 4.60747 16.2599 4.5 16.5465 4.5C16.8331 4.5 17.0839 4.60747 17.2988 4.82242C17.5138 5.03737 17.6212 5.29281 17.6212 5.58872C17.6212 5.88464 17.5138 6.13971 17.2988 6.35394L15.2837 8.3691H21.9202C22.2248 8.3691 22.4802 8.47227 22.6865 8.67863C22.8929 8.88498 22.9957 9.14005 22.995 9.44385C22.995 9.74836 22.8918 10.0038 22.6855 10.2101C22.4791 10.4165 22.224 10.5193 21.9202 10.5186H15.2837L17.2988 12.5338C17.5138 12.7487 17.6212 12.9995 17.6212 13.2861C17.6212 13.5727 17.5138 13.8235 17.2988 14.0384C17.0839 14.2534 16.8378 14.3698 16.5605 14.3877C16.2832 14.4056 16.0278 14.2981 15.7942 14.0653ZM7.19618 20.4869C7.41113 20.7019 7.6619 20.814 7.9485 20.8233C8.2351 20.8326 8.48588 20.7294 8.70083 20.5138L12.5699 16.6447C12.6774 16.5372 12.7533 16.4208 12.7978 16.2954C12.8422 16.17 12.8648 16.0356 12.8655 15.8923C12.8655 15.749 12.8429 15.6147 12.7978 15.4893C12.7526 15.3639 12.6767 15.2475 12.5699 15.14L8.70083 11.2709C8.48588 11.056 8.2351 10.9485 7.9485 10.9485C7.6619 10.9485 7.41113 11.056 7.19618 11.2709C6.98123 11.4859 6.87375 11.7413 6.87375 12.0372C6.87375 12.3331 6.98123 12.5882 7.19618 12.8024L9.21133 14.8176H2.57475C2.27024 14.8176 2.01481 14.9208 1.80846 15.1271C1.6021 15.3335 1.49929 15.5886 1.5 15.8923C1.5 16.1969 1.60318 16.4523 1.80953 16.6586C2.01588 16.865 2.27096 16.9678 2.57475 16.9671H9.21133L7.19618 18.9823C6.98123 19.1972 6.87375 19.448 6.87375 19.7346C6.87375 20.0212 6.98123 20.2719 7.19618 20.4869Z"
                                            fill="#333333" />
                                    </g>
                                </svg>
                                {{-- <div class="compare-warning-box absolute top-[-75px] left-0 w-full px-3 py-2 rounded-md bg-whitez">
                                    <span class="font-normal me-body16 text-darkgray text-left">You can compare up
                                        to 4 products.</span>
                                </div> --}}

                            </button>
                            @endif
                            <button type="button" data-product-id="{{ $product->id }}" data-register-id="{{ Auth::guard('customer')->user() == null ? '1' : '0' }}" data-previewId="quick-preview-modal{{ $product->id }}"
                                class="{{ Auth::guard('customer')->user() == null ? 'register-btn' : '' }} bg-white w-[50px] h-[50px] shadow-[0px_4px_15px_2px_rgba(0,0,0,0.10)] rounded-full text-center border border-white wishlist_icon"
                                tabindex="0">
                                {{-- <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="{{ Auth::guard('customer')->user() == null ? 'click-disable' : (count($product->favourite) > 0 ? 'heart-hole hidden' : 'heart-hole') }} mx-auto">
                                    <g id="ph:heart-bold">
                                        <path id="Vector"
                                            d="M16.6875 2.625C14.8041 2.625 13.1325 3.36844 12 4.64625C10.8675 3.36844 9.19594 2.625 7.3125 2.625C5.67208 2.62698 4.09942 3.27952 2.93947 4.43947C1.77952 5.59942 1.12698 7.17208 1.125 8.8125C1.125 15.5944 11.0447 21.0131 11.4666 21.2409C11.6305 21.3292 11.8138 21.3754 12 21.3754C12.1862 21.3754 12.3695 21.3292 12.5334 21.2409C12.9553 21.0131 22.875 15.5944 22.875 8.8125C22.873 7.17208 22.2205 5.59942 21.0605 4.43947C19.9006 3.27952 18.3279 2.62698 16.6875 2.625ZM16.1728 15.9713C14.8671 17.0792 13.4714 18.0764 12 18.9525C10.5286 18.0764 9.13287 17.0792 7.82719 15.9713C5.79562 14.2284 3.375 11.5706 3.375 8.8125C3.375 7.76821 3.78984 6.76669 4.52827 6.02827C5.26669 5.28984 6.26821 4.875 7.3125 4.875C8.98125 4.875 10.3781 5.75625 10.9584 7.17562C11.0429 7.38254 11.1871 7.55961 11.3726 7.68425C11.5581 7.80889 11.7765 7.87545 12 7.87545C12.2235 7.87545 12.4419 7.80889 12.6274 7.68425C12.8129 7.55961 12.9571 7.38254 13.0416 7.17562C13.6219 5.75625 15.0188 4.875 16.6875 4.875C17.7318 4.875 18.7333 5.28984 19.4717 6.02827C20.2102 6.76669 20.625 7.76821 20.625 8.8125C20.625 11.5706 18.2044 14.2284 16.1728 15.9713Z"
                                            fill="#333333" />
                                    </g>
                                </svg> --}}
                                {{-- <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="{{ Auth::guard('customer')->user() == null ? 'click-disable hidden' :  (count($product->favourite) <= 0 ? 'heart-full hidden' : 'heart-full') }}  mx-auto">
                                    <path
                                        d="M27.5376 17.0627L17.4126 27.1877C17.2278 27.3744 17.0078 27.5226 16.7654 27.6238C16.5229 27.7249 16.2628 27.777 16.0001 27.777C15.7374 27.777 15.4773 27.7249 15.2349 27.6238C14.9924 27.5226 14.7724 27.3744 14.5876 27.1877L4.2001 16.8002C3.47912 16.0811 2.91238 15.2226 2.53454 14.277C2.1567 13.3314 1.9757 12.3187 2.00262 11.3008C2.02953 10.2829 2.26378 9.28117 2.69105 8.35688C3.11832 7.43259 3.72963 6.60517 4.4876 5.9252C7.4001 3.2877 12.1501 3.5377 15.0626 6.4627L16.0001 7.3877L17.2001 6.2002C17.9197 5.48318 18.7767 4.91876 19.7196 4.54074C20.6625 4.16272 21.672 3.97887 22.6876 4.0002C23.7079 4.02509 24.7122 4.25863 25.6388 4.68644C26.5653 5.11425 27.3945 5.72726 28.0751 6.4877C30.7001 9.4002 30.4626 14.1502 27.5376 17.0627Z"
                                        fill="#FF6F6F" />
                                </svg> --}}
                                <img src="{{ asset('frontend/img/Default.svg') }}" 
                                    alt="heart"
                                    class="{{ Auth::guard('customer')->user() == null ? 'click-disable' : (count($product->favourite) > 0 ? 'heart-hole hidden' : 'heart-hole') }} mx-auto">
                                <img src="{{ asset('frontend/img/Selected.svg') }}" data-product-id="{{ $product->id }}"
                                alt="heart selected"
                                class="{{ Auth::guard('customer')->user() == null ? 'click-disable hidden' :  (count($product->favourite) <= 0 ? 'heart-full hidden' : 'heart-full') }}  mx-auto">
                            </button>
                        </div>
                    </div>
                    <div class="con-section md:max-w-[63%] max-w-full w-full md:mt-0 mt-3">
                        <a href="{{ route('product-detail',['category' => isset($product->category) ? str_replace(' ','-',$product->category->name_en) : '', 'slug' => isset($product->slug_en) ? $product->slug_en : '']) }}"
                            class="cursor-pointer">
                            <h2 class="font-bold me-body29  hover:underline">{{ langbind($product, 'name') }}</h2>
                        </a>
                        <div class="flex flex-wrap items-center font-secondary me-body16 mt-3">
                            {{-- <div
                                class="rating-text flex items-center custom-vertical-line sm:min-w-[170px] min-w-[145px]">
                                <p><img src="{{asset('frontend/img/health-rating-star.svg')}}" alt="star icon"
                            class="w-auto h-auto align-middle object-cover object-center"></p>
                            <p class="font-bold text-darkgray me-body16 pl-1">4.8 <span class="font-normal">(52
                                    reviews)</span></p>
                        </div>
                        <p
                            class="font-normal text-darkgray me-body16 pl-1 custom-vertical-line sm:min-w-[130px] min-w-[100px]">
                            120
                            booked</p> --}}

                        <ul class="branch-list flex items-center flex-wrap mt-1 xsm:mt-0">

                            @if (isset($product->merchant) && count($product->merchant->merchantLocations) > 0)
                            <li class="w-auto h-auto mr-1">
                                <img src="{{ asset('frontend/img/ph_map-pin-light.svg') }}" alt=""
                                    class="w-auto h-auto align-middle object-cover object-center">
                            </li>

                            @foreach ($product->merchant->merchantLocations->take(3) as $location)
                            <li class="mr-1">
                                {{ langbind($location->area, 'name') }}<span
                                    class=" text-meA3 ml-1">{{ !$loop->last ? '|' : '' }}</span>
                            </li>
                            @endforeach
                            @endif
                        </ul>


                    </div>

                    <div class="">

                        {{-- <ul class="flex flex-wrap mt-3 status-container me-body14">
                                 <li
                                    class="status-container--item px-[16px] py-[6px] rounded-[50px] mr-1 last:mr-0 mb-1 lg:mr-2 lg:last:mr-0 lg:mb-2 helvetica-normal font-medium text-darkgray me-body14 bg-tagbg">
                                    72 Items</li>
                                     <li
                                    class="status-container--item px-[16px] py-[6px] rounded-[50px] mr-1 last:mr-0 mb-1 lg:mr-2 lg:last:mr-0 lg:mb-2 helvetica-normal font-medium text-darkgray me-body14 bg-tagbg">
                                    Aged > 18</li>
                                     <li
                                    class="status-container--item px-[16px] py-[6px] rounded-[50px] mr-1 last:mr-0 mb-1 lg:mr-2 lg:last:mr-0 lg:mb-2 helvetica-normal font-medium text-darkgray me-body14 bg-tagbg">
                                    By Specialist</li>
                                     <li
                                    class="status-container--item px-[16px] py-[6px] rounded-[50px] mr-1 last:mr-0 mb-1 lg:mr-2 lg:last:mr-0 lg:mb-2 helvetica-normal font-medium text-darkgray me-body14 bg-tagbg">
                                    Prostate</li>
                                     <li
                                    class="status-container--item px-[16px] py-[6px] rounded-[50px] mr-1 last:mr-0 mb-1 lg:mr-2 lg:last:mr-0 lg:mb-2 helvetica-normal font-medium text-darkgray me-body14 bg-tagbg">
                                    Cancer Marker</li>
                                     <li
                                    class="status-container--item px-[16px] py-[6px] rounded-[50px] mr-1 last:mr-0 mb-1 lg:mr-2 lg:last:mr-0 lg:mb-2 helvetica-normal font-medium text-darkgray me-body14 bg-tagbg">
                                    Liver Function</li>
                                     <li
                                    class="status-container--item px-[16px] py-[6px] rounded-[50px] mr-1 last:mr-0 mb-1 lg:mr-2 lg:last:mr-0 lg:mb-2 helvetica-normal font-medium text-darkgray me-body14 bg-tagbg">
                                    Abdomen Ultrasound</li>
                                     <li
                                    class="status-container--item px-[16px] py-[6px] rounded-[50px] mr-1 last:mr-0 mb-1 lg:mr-2 lg:last:mr-0 lg:mb-2 helvetica-normal font-medium text-darkgray me-body14 bg-tagbg">
                                    Breast Ultrasound</li>
                                     <li
                                    class="status-container--item px-[16px] py-[6px] rounded-[50px] mr-1 last:mr-0 mb-1 lg:mr-2 lg:last:mr-0 lg:mb-2 helvetica-normal font-medium text-darkgray me-body14 bg-tagbg">
                                    Progesterone</li>
                                     <li
                                    class="status-container--item px-[16px] py-[6px] rounded-[50px] mr-1 last:mr-0 mb-1 lg:mr-2 lg:last:mr-0 lg:mb-2 helvetica-normal font-medium text-darkgray me-body14 bg-tagbg">
                                    Cardiac Checkup & ECG</li>

                            </ul> --}}
                        <ul class="flex flex-wrap mt-3 status-container me-body14">
                            {{-- <li class="status-container--item px-[16px] py-[6px] rounded-[50px] mr-1 last:mr-0 mb-1 lg:mr-2 lg:last:mr-0 lg:mb-2 helvetica-normal font-medium text-darkgray me-body16 bg-tagbg">Cardiac Checkup & ECG</li> --}}
                            @php $takeNum = isset($product->number_of_dose) ? 1 : 0; @endphp
                            @if (isset($product->number_of_dose))
                            <li
                                class="status-container--item px-[16px] py-[6px] rounded-[50px] mr-1 last:mr-0 mb-1 lg:mr-2 lg:last:mr-0 lg:mb-2 helvetica-normal font-medium text-darkgray me-body14 bg-tagbg">
                                {{ $product->number_of_dose }} {{ $product->number_of_dose == 1 ? __('labels.product_detail.item') : __('labels.product_detail.items') }}</li>
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

                    </div>

                    <div class="quick-preview-offer-container sm:flex justify-between mt-5">

                        <ul class="offer-services">
                            @if (count($product->timeSlotTags) > 0)
                            @foreach ($product->timeSlotTags as $time)
                            @php $timeSlot = App\Models\TimeSlotTag::where('id',$time->time_slot_tag_id)->first();
                            @endphp
                            <li class="flex items-center mt-1 lg:mt-2">
                                <span class="mr-1"><img
                                        src="{{ isset($timeSlot->img) ? $timeSlot->img : asset('frontend/img/circum_calendar.svg') }}"
                                        alt="" class="w-auto h-auto align-middle object-cover object-center"></span>
                                <span>
                                    {{ langbind($timeSlot, 'name') }}
                                </span>
                            </li>
                            @endforeach
                            @endif
                            {{-- <li
                                    class="flex items-center mt-1 lg:mt-2">
                                    <span class="mr-1"><img src="{{asset('frontend/img/circum_calendar.svg')}}" alt=""
                            class="w-auto h-auto align-middle object-cover object-center"></span>
                            <span>
                                Available in 7-Day
                            </span>
                            </li>
                            <li class="flex items-center mt-1 lg:mt-2">
                                <span class="mr-1"><img src="{{asset('frontend/img/24-hours-support 2.svg')}}" alt=""
                                        class="w-auto h-auto align-middle object-cover object-center"></span>
                                <span>
                                    24-Hour Confirmation
                                </span>
                            </li> --}}
                            {{-- <li
                                    class="flex items-center mt-1 lg:mt-2">
                                    <span class="mr-1"><img src="{{asset('frontend/img/Q-dollar.svg')}}" alt=""
                            class="w-auto h-auto align-middle object-cover object-center"></span>
                            <span>
                                3% Rebate
                            </span>
                            </li> --}}
                            <li class="flex items-center mt-1 lg:mt-2">
                            @if(getTotalCoupon($product->id, $product->category_id, $product->sub_category_id)->count() > 0)

                                <span class="mr-1"><img src="{{ asset('frontend/img/mdi_coupon.svg') }}" alt=""
                                        class="w-auto h-auto align-middle object-cover object-center"></span>
                                <span>
                                    {{ getTotalCoupon($product->id, $product->category_id, $product->sub_category_id)->count() }}
                                    @lang('labels.compare.coupon')
                                </span>
                            @endif
                            </li>
                        </ul>

                    </div>

                    <div class="quick-preview-price me-body16 mt-5 sm:mt-0">
                        <div class="mt-7">
                            @if ($prodDis != null)
                            <span class="me-body36 mr-1 sm:mr-2 font-bold">${{ number_format($prodDis) }}@if($isVariable == true)<span class="linethrough text-lightgray me-body16 ml-[10px] up-text">up</span>@endif</span>
                            <span class="text-lightgray line-through font-normal">${{ number_format($productPrice->original_price) }}</span>
                            @else
                            <span class="me-body36 mr-1 sm:mr-2 font-bold">${{ number_format($productPrice->original_price) }}@if($isVariable == true)<span class="linethrough text-lightgray me-body16 ml-[10px] up-text">up</span>@endif</span>
                            @endif
                        </div>
                        {{-- <div class="mt-7">
                                <span class="me-body36 mr-1 sm:mr-2 font-bold">$3,185</span>
                                <span class="text-lightgray line-through font-normal">$4,900</span>
                            </div> --}}
                        <div class="mt-2 flex flex-wrap">
                            <a href="{{ route('product-detail',['category' => isset($product->category) ? str_replace(' ','-',$product->category->name_en) : '', 'slug' => isset($product->slug_en) ? $product->slug_en : '']) }}"
                                class="flex items-center justify-center my-1 hover:bg-orangeLight bg-whitez border-1 border-orangeMediq text-orangeMediq htzxs:mr-5 add-to-card-btn text-light me-body18 font-bold bg-orangeMediq border border-solid border-orangeMediq rounded-md w-full htzxs:w-[48%] md:w-[47.5%] lg:w-[48%] py-2 4xl:py-3 hover:bg-brightOrangeMediq transition-colors duration-300">
                                @lang('labels.product_detail.plan_detail')
                            </a>
                            <button onclick="addToCart({{ $product }},'/add-to-cart','add')" data-id="quick-preview-modal{{ $product->id }}"
                                class="{{!Auth::guard('customer')->check() ? 'register-btn-product-modal' : ''}} my-1 add-to-card-btn text-light me-body18 font-bold bg-orangeMediq border border-solid border-orangeMediq rounded-md w-full htzxs:w-[48%] md:w-[47.5%] lg:w-[48%] py-2 4xl:py-3 hover:bg-brightOrangeMediq transition-colors duration-300">
                                @lang('labels.add_to_cart')
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- </div> -->
    <div class="preview-reminder-popup bg-darkgray text-light me-body16 font-bold fixed top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 rounded-lg w-fit py-2 px-5">
        {{-- Added to cart successfully --}}
        @lang('labels.wishlist.success_message')
    </div>
    </div>
    {{-- @include('frontend.include.product-modal-compare') --}}
</dialog>
@push('scripts')
<script>
    $(document).on("click",".register-btn-product-modal",(function(){
        document.querySelector("#"+$(this).attr("data-id")).close();
        document.body.style.overflowY="auto";
        $(".lr-register-popup").addClass("flex");
        $("body").addClass("overflow-hidden");
        $(".lr-register-popup").removeClass("hidden");
    }));
</script>
@endpush

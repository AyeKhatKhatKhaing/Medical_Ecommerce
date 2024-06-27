<div component-name="me-user-dashboard">
    <div component-name="me-dashboard-title">
        <p class="helvetica-normal text-darkgray me-body32 font-bold">@lang('labels.coupon.wish_list')</p>
    </div>

    <div class="hidden coupon-redem">
        <div class="flex items-center justify-center pt-10 redeem-coupon-layer">
            <div class="relative">
                <input type="text"
                    class="w-[350px] mr-[8px] rounded-[4px] border border-lightgray helvetica-normal text-darkgray px-[10px] h-[48px] focus:outline-none me-body16"
                    placeholder="Enter discount code">
                <div class="absolute top-[25%] left-[12px] bg-whitez flex items-center error-icon hidden">
                    <p class="mr-4 text-[#EE220C] font-normal me-body16 helvetica-normal">Please Enter Valid Redeem Code
                    </p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <path
                            d="M12.5908 10.6904C12.5641 10.5429 12.4831 10.4107 12.3638 10.3199C12.2445 10.2291 12.0955 10.1862 11.9462 10.1998C11.7969 10.2133 11.658 10.2823 11.557 10.3931C11.456 10.5039 11.4001 10.6485 11.4004 10.7984V16.2008L11.41 16.3088C11.4367 16.4564 11.5177 16.5886 11.637 16.6794C11.7563 16.7702 11.9053 16.813 12.0546 16.7995C12.2039 16.7859 12.3428 16.717 12.4438 16.6062C12.5448 16.4954 12.6007 16.3508 12.6004 16.2008V10.7984L12.5908 10.6904ZM12.9592 8.09844C12.9592 7.85974 12.8644 7.63082 12.6956 7.46204C12.5268 7.29326 12.2979 7.19844 12.0592 7.19844C11.8205 7.19844 11.5916 7.29326 11.4228 7.46204C11.254 7.63082 11.1592 7.85974 11.1592 8.09844C11.1592 8.33713 11.254 8.56605 11.4228 8.73483C11.5916 8.90362 11.8205 8.99844 12.0592 8.99844C12.2979 8.99844 12.5268 8.90362 12.6956 8.73483C12.8644 8.56605 12.9592 8.33713 12.9592 8.09844ZM21.6004 11.9984C21.6004 9.45236 20.589 7.01056 18.7886 5.21021C16.9883 3.40986 14.5465 2.39844 12.0004 2.39844C9.45431 2.39844 7.01251 3.40986 5.21217 5.21021C3.41182 7.01056 2.40039 9.45236 2.40039 11.9984C2.40039 14.5445 3.41182 16.9863 5.21217 18.7867C7.01251 20.587 9.45431 21.5984 12.0004 21.5984C14.5465 21.5984 16.9883 20.587 18.7886 18.7867C20.589 16.9863 21.6004 14.5445 21.6004 11.9984ZM3.60039 11.9984C3.60039 10.8953 3.81766 9.80303 4.2398 8.7839C4.66194 7.76476 5.28068 6.83875 6.06069 6.05874C6.8407 5.27873 7.76671 4.65999 8.78585 4.23785C9.80498 3.81571 10.8973 3.59844 12.0004 3.59844C13.1035 3.59844 14.1958 3.81571 15.2149 4.23785C16.2341 4.65999 17.1601 5.27873 17.9401 6.05874C18.7201 6.83875 19.3388 7.76476 19.761 8.7839C20.1831 9.80303 20.4004 10.8953 20.4004 11.9984C20.4004 14.2263 19.5154 16.3628 17.9401 17.9381C16.3648 19.5134 14.2282 20.3984 12.0004 20.3984C9.77257 20.3984 7.636 19.5134 6.06069 17.9381C4.48539 16.3628 3.60039 14.2263 3.60039 11.9984Z"
                            fill="#EE220C"></path>
                    </svg>
                </div>
            </div>
            <button
                class="w-[141px] border-1 border-orangeMediq hover:bg-whitez hover:text-orangeMediq bg-orangeMediq rounded-[6px] text-whitez helvetica-normal me-body16 flex items-center justify-center h-[48px]"
                onclick="changePlaceholder()">Redeem</button>
        </div>
    </div>

    <div component-name="me-dashboard-wishlist-tabs" class="wishlist-tabs">
        <div class="dc-container flex items-center justify-between pt-[36px]">
            <ul class="flex justify-start items-center">

                <li class="list-item cursor-pointer px-[10px] mr-[20px] lg:mr-[32px] me-body20 helvetica-normal font-bold text-darkgray {{ $mainTag == 'favourite' ? 'active' : '' }}"
                    data-id="#wish-fav"><span class="pb-[2px]">@lang('labels.wishlist.favourite')</span></li>

                <li class="list-item cursor-pointer px-[10px] mr-[20px] lg:mr-[32px] me-body20 helvetica-normal font-bold text-darkgray hidden"
                    data-id="#wish-follow"><span class="pb-[2px]">Follow</span></li>

                <li class="list-item cursor-pointer px-[10px] mr-[20px] lg:mr-[32px] me-body20 helvetica-normal font-bold text-darkgray {{ $mainTag == 'recently-viewed' ? 'active' : '' }}"
                    data-id="#wish-view"><span class="pb-[2px]">@lang('labels.wishlist.recently_viewed')</span></li>

                <li class="list-item cursor-pointer px-[10px] mr-[20px] lg:mr-[32px] me-body20 helvetica-normal font-bold text-darkgray {{ $mainTag == 'recently-compared' ? 'active' : '' }}"
                    data-id="#wish-compare"><span class="pb-[2px]">@lang('labels.wishlist.recently_compared')</span></li>

            </ul>
            <a href="./coupon-list.html" class="underline text-darkgray me-body20 helvetica-normal hidden">Go to coupon
                zone</a>
        </div>
    </div>

</div>

<div class="me-dashboard-content mt-[32px]">
    <div component-name="me-dashboard-wishlist-content"
        class="wishlist-content {{ $mainTag == 'favourite' ? '' : 'hidden' }}" id="wish-fav">
        <div>
            @if (count($productList) > 0 && $mainTag == 'favourite')
                @foreach ($productList as $product)
                    @php
                        $prodDis = isset($product->promotion_price) ? $product->promotion_price : (isset($product->discount_price) ? $product->discount_price : '');
                        $count_tag = 0;
                        $galleries = [];
                        $allImages = [];
                        $countImgs = null;
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
                    @endphp
                    <article
                        class="product-grid-card p-3 sm:p-4 xl:p-5 bg-white md:flex rounded-xl shadow-[0px_4px_15px_2px_rgba(0,0,0,0.10)] mb-5 ">
                        <div class="grid-card-img-wrapper flex-1 sm:max-w-[12.5rem] lg:max-w-[17.5rem] sm:mr-2 lg:mr-4 xl:mr-5">
                            <div class="banner-img">
                                {{-- @if (count($allImages) > 0)
                                    @foreach ($allImages->take(1) as $img)
                                        <a
                                            href={{ route('product-detail',['category' => isset($product->category) ? str_replace(' ','-',$product->category->name_en) : '', 'slug' => isset($product->slug_en) ? $product->slug_en : '']) }}>
                                            <img src="{{ $img }}" alt="main image"
                                                class="w-auto h-auto align-middle object-center object-cover">
                                        </a>
                                    @endforeach
                                @endif --}}
                                <a href={{ route('product-detail',['category' => isset($product->category) ? str_replace(' ','-',$product->category->name_en) : '', 'slug' => isset($product->slug_en) ? $product->slug_en : '']) }}>
                                            <img src="{{ isset($product->merchant) ?  $product->merchant->icon : asset('frontend/img/card-banner.png') }}" alt="main image"
                                                class="w-auto h-auto align-middle object-center object-cover">
                                </a>
                            </div>
                            <div class="slider-img ">
                                <ul class="flex items-center justify-center">
                                    @if (count($allImages) > 0)
                                        @foreach ($allImages->take(3) as $key => $img)
                                            <li class="mr-2 last:mr-0">
                                                <!-- <a href="/product-detail.html"> -->
                                                <img src="{{ $img }}" alt=""
                                                    class="cursor-pointer w-auto h-auto align-middle object-center object-cover rounded"
                                                    data-image="{{ $img }}">
                                                <!-- </a> -->
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="grid-card-text-wrapper mt-5 lg:mt-0 flex-1">
                            <div class="grid-card-header sm:flex sm:flex-row-reverse sm:items-start sm:justify-between">
                                <div class="grid-card-icon-wrapper relative flex items-center justify-end">
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
                                                    fill="#333333"></path>
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
                                                    fill="#333333"></path>
                                            </g>
                                        </svg>
                                    </button>
                                    @endif
                                    <button type="button" data-product-id="{{ $product->id }}"
                                        class="bg-white w-[40px] h-[40px] shadow-[0px_4px_15px_2px_rgba(0,0,0,0.10)] rounded-full text-center border border-white flex items-center justify-center wishlist_icon_current no-login no-login"
                                        tabindex="0">
                                        {{-- <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="hidden mx-auto heart-hole">
                                            <g id="ph:heart-bold">
                                                <path id="Vector"
                                                    d="M16.6875 2.625C14.8041 2.625 13.1325 3.36844 12 4.64625C10.8675 3.36844 9.19594 2.625 7.3125 2.625C5.67208 2.62698 4.09942 3.27952 2.93947 4.43947C1.77952 5.59942 1.12698 7.17208 1.125 8.8125C1.125 15.5944 11.0447 21.0131 11.4666 21.2409C11.6305 21.3292 11.8138 21.3754 12 21.3754C12.1862 21.3754 12.3695 21.3292 12.5334 21.2409C12.9553 21.0131 22.875 15.5944 22.875 8.8125C22.873 7.17208 22.2205 5.59942 21.0605 4.43947C19.9006 3.27952 18.3279 2.62698 16.6875 2.625ZM16.1728 15.9713C14.8671 17.0792 13.4714 18.0764 12 18.9525C10.5286 18.0764 9.13287 17.0792 7.82719 15.9713C5.79562 14.2284 3.375 11.5706 3.375 8.8125C3.375 7.76821 3.78984 6.76669 4.52827 6.02827C5.26669 5.28984 6.26821 4.875 7.3125 4.875C8.98125 4.875 10.3781 5.75625 10.9584 7.17562C11.0429 7.38254 11.1871 7.55961 11.3726 7.68425C11.5581 7.80889 11.7765 7.87545 12 7.87545C12.2235 7.87545 12.4419 7.80889 12.6274 7.68425C12.8129 7.55961 12.9571 7.38254 13.0416 7.17562C13.6219 5.75625 15.0188 4.875 16.6875 4.875C17.7318 4.875 18.7333 5.28984 19.4717 6.02827C20.2102 6.76669 20.625 7.76821 20.625 8.8125C20.625 11.5706 18.2044 14.2284 16.1728 15.9713Z"
                                                    fill="#333333"></path>
                                            </g>
                                        </svg>
                                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="heart-full mx-auto">
                                            <path
                                                d="M27.5376 17.0627L17.4126 27.1877C17.2278 27.3744 17.0078 27.5226 16.7654 27.6238C16.5229 27.7249 16.2628 27.777 16.0001 27.777C15.7374 27.777 15.4773 27.7249 15.2349 27.6238C14.9924 27.5226 14.7724 27.3744 14.5876 27.1877L4.2001 16.8002C3.47912 16.0811 2.91238 15.2226 2.53454 14.277C2.1567 13.3314 1.9757 12.3187 2.00262 11.3008C2.02953 10.2829 2.26378 9.28117 2.69105 8.35688C3.11832 7.43259 3.72963 6.60517 4.4876 5.9252C7.4001 3.2877 12.1501 3.5377 15.0626 6.4627L16.0001 7.3877L17.2001 6.2002C17.9197 5.48318 18.7767 4.91876 19.7196 4.54074C20.6625 4.16272 21.672 3.97887 22.6876 4.0002C23.7079 4.02509 24.7122 4.25863 25.6388 4.68644C26.5653 5.11425 27.3945 5.72726 28.0751 6.4877C30.7001 9.4002 30.4626 14.1502 27.5376 17.0627Z"
                                                fill="#FF6F6F"></path>
                                        </svg> --}}
                                        <img src="{{ asset('frontend/img/Default.svg') }}"
                                                alt="heart"
                                                class="mx-auto heart-hole hidden">
                                        <img src="{{ asset('frontend/img/Selected.svg') }}"
                                                alt="heart selected"
                                                class="heart-full mx-auto">
                                    </button>
                                </div>
                                <div class="grid-card-infos mt-3 sm:mt-0 basis-[36.25rem]">
                                    <a
                                        href="{{ route('product-detail',['category' => isset($product->category) ? str_replace(' ','-',$product->category->name_en) : '', 'slug' => isset($product->slug_en) ? $product->slug_en : '']) }}">
                                        <h2 class="font-bold me-body23">{{ langbind($product, 'name') }}</h2>
                                    </a>
                                    <div class="xsm:flex items-center justify-between font-secondary me-body16 mt-3">
                                        {{-- <div class="rating-text flex items-center">
                                        <p><img src="./img/health-rating-star.svg" alt="star icon"
                                                class="w-auto h-auto align-middle object-cover object-center"></p>
                                        <p class="font-bold text-darkgray me-body16 pl-1">4.8 <span
                                                class="font-normal">(52 reviews)</span></p>
                                    </div> --}}
                                        <ul class="branch-list relative flex items-center flex-wrap mt-1 xsm:mt-0">
                                            @if (isset($product->merchant) && count($product->merchant->merchantLocations) > 0)
                                                <li class="w-auto h-auto mr-1">
                                                    <img src="{{ asset('frontend/img/ph_map-pin-light.svg') }}"
                                                        alt=""
                                                        class="w-auto h-auto align-middle object-cover object-center">
                                                </li>
                                                @foreach ($product->merchant->merchantLocations->take(3) as $location)
                                                    <li class="mr-1">
                                                        {{ langbind($location->area, 'name') }}<span
                                                            class=" text-meA3 ml-1">{{ !$loop->last ? '|' : '' }}</span>
                                                    </li>
                                                @endforeach
                                            @endif

                                            @if (isset($product->merchant) && count($product->merchant->merchantLocations) > 3)
                                                <li class="w-auto h-auto">
                                                    <button type="button"
                                                        class="plan-tooltip-btn w-auto h-fit align-middle">
                                                        <img src="{{ asset('frontend/img/dots.svg') }}"
                                                            alt="see more"
                                                            class="w-auto h-auto align-middle object-cover object-center">

                                                        <div class="plan-tooltip tooltip-more me-body16 text-darkgray">
                                                            <div
                                                                class="plan-tooltip-header font-bold p-2 lg:p-[10px] bg-far rounded">
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
                                    </div>

                                    <div class="">
                                        <ul class="flex flex-wrap mt-3 status-container me-body14">
                                            @php $takeNum = isset($product->number_of_dose) ?  1 : 0; @endphp
                                            @if (isset($product->number_of_dose))
                                                <li
                                                    class="status-container--item px-[16px] py-[6px] rounded-[50px] mr-1 last:mr-0 mb-1 lg:mr-2 lg:last:mr-0 lg:mb-2 helvetica-normal font-medium text-darkgray me-body14 bg-tagbg">
                                                    {{ $product->number_of_dose }}
                                                    {{ $product->number_of_dose == 1 ? __('labels.product_detail.item') : __('labels.product_detail.items') }} </li>
                                            @endif
                                            @if (count(productTagVal($product)) > 0)
                                                @foreach (productTagVal($product)->take(8 - $takeNum) as $key => $tag)
                                                    <li
                                                        class="status-container--item px-[16px] py-[6px] rounded-[50px] mr-1 last:mr-0 mb-1 lg:mr-2 lg:last:mr-0 lg:mb-2 helvetica-normal font-medium text-darkgray me-body14 bg-tagbg">
                                                        {{ langbind($tag, 'name') }}
                                                    </li>
                                                @endforeach
                                            @endif

                                            {{-- <li class="w-auto h-auto">
                                            <button type="button" class="plan-tooltip-btn w-auto h-fit align-middle">
                                                <img src="./img/dots.svg" alt="see more" class="w-auto h-auto align-middle object-cover object-center">

                                                <div class="plan-tooltip tooltip-more tooltip-tags me-body16 text-darkgray xl:w-[400px]">
                                                    <div class="plan-tooltip-header font-bold p-2 lg:p-[10px] bg-far rounded">
                                                    Tag
                                                    </div>
                                                    <div class="plan-tooltip-body mt-2">
                                                    <ul class="flex flex-wrap">

                                                    </ul>
                                                    </div>
                                                </div>
                                            </button>
                                        </li> --}}
                                        </ul>

                                    </div>
                                </div>
                            </div>

                            <div class="quick-preview-offer-container sm:flex justify-between">
                                <div class="quick-preview-offer me-body16">
                                    <ul class="offer-services mt-5 sm:mt-6">
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
                                        <li class="flex items-center mt-1 first:mt-0 lg:mt-2 first:lg:mt-0">
                                            <span class="mr-1"><img
                                                    src="{{ asset('frontend/img/mdi_coupon.svg') }}" alt=""
                                                    class="w-auto h-auto align-middle object-cover object-center"></span>
                                            <span>{{ getTotalCoupon($product->id, $product->category_id, $product->sub_category_id)->count() }}
                                                @lang('labels.compare.coupon')</span>
                                        </li>
                                    </ul>
                                </div>

                                <div
                                    class="quick-preview-price me-body16 mt-5 sm:mt-0 sm:max-w-[15.813rem] 4xl:basis-[15.813rem]">
                                    <div class="font-bold mt-2 sm:mt-0">
                                        @if ($prodDis != null)
                                            <span class="me-body36 mr-1 sm:mr-2">${{ number_format($prodDis) }}</span>
                                            <span
                                                class="text-lightgray line-through">${{ number_format($product->original_price) }}</span>
                                        @else
                                            <span
                                                class="me-body36 mr-1 sm:mr-2">${{ number_format($product->original_price) }}</span>
                                        @endif

                                    </div>


                                    <ul
                                        class="tag-group overflow-x-auto whitespace-nowrap scrollbar-hide flex items-center">
                                        @if ($prodDis != null)
                                            <li
                                                class="discount rounded py-1 px-2 sm:py-[6px] sm:px-[10px] mr-1 lg:mr-2 last:lg:mr-0">
                                                –{{ round((($product->original_price - $prodDis) / $product->original_price) * 100, 0) }}%
                                            </li>
                                            <li
                                                class="discount rounded py-1 px-2 sm:py-[6px] sm:px-[10px] mr-1 lg:mr-2 last:lg:mr-0">
                                                @lang('labels.product_detail.save') ${{ number_format($product->original_price - $prodDis) }}
                                                {{-- Save ${{ number_format($product->original_price - $prodDis) }} --}}
                                            </li>
                                        @endif
                                    </ul>

                                    <div class="mt-2">
                                        <button type="button" onclick="addToCart({{ $product }})"
                                            class="preview-cartbtn text-light me-body18 font-bold bg-orangeMediq border border-solid border-orangeMediq rounded-md w-36 sm:w-full py-2 4xl:py-3 hover:bg-brightOrangeMediq transition-colors duration-300">
                                            @lang('labels.add_to_cart')
                                        </button>
                                        {{-- <p class="mt-2 sm:text-center">120+ people booking</p> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            @else
            @include('frontend.customer.empty-wishlist',['title'=>'favourite'])
            @endif
        </div>
    </div>
    <div component-name="me-dashboard-wishlist-content"
        class="wishlist-content {{ $mainTag == 'recently-viewed' ? '' : 'hidden' }}" id="wish-view">
        <div>
            @if (count($productList) > 0 && $mainTag == 'recently-viewed')
                @foreach ($productList as $product)
                    @php
                        $prodDis = isset($product->promotion_price) ? $product->promotion_price : (isset($product->discount_price) ? $product->discount_price : '');
                        $count_tag = 0;
                        $galleries = [];
                        $allImages = [];
                        $countImgs = null;
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
                    @endphp
                    <article class="product-grid-card p-3 sm:p-4 xl:p-5 bg-white md:flex rounded-xl shadow-[0px_4px_15px_2px_rgba(0,0,0,0.10)] mb-5 ">
                        <div class="grid-card-img-wrapper flex-1 sm:max-w-[12.5rem] lg:max-w-[17.5rem] sm:mr-2 lg:mr-4 xl:mr-5">
                            <div class="banner-img">
                                {{-- @if (count($allImages) > 0)
                                @foreach ($allImages->take(1) as $img)
                                <a href="{{ route('product-detail',['category' => isset($product->category) ? str_replace(' ','-',$product->category->name_en) : '', 'slug' => isset($product->slug_en) ? $product->slug_en : '']) }}">
                                    <img src="{{ $img }}" alt="baner image"
                                        class="w-auto h-auto align-middle object-center object-cover">
                                </a>
                                @endforeach
                                @endif --}}
                                <a href={{ route('product-detail',['category' => isset($product->category) ? str_replace(' ','-',$product->category->name_en) : '', 'slug' => isset($product->slug_en) ? $product->slug_en : '']) }}>
                                    <img src="{{ isset($product->merchant) ?  $product->merchant->icon : asset('frontend/img/card-banner.png') }}" alt="main image"
                                        class="w-auto h-auto align-middle object-center object-cover">
                                </a>
                            </div>
                            <div class="slider-img">
                                <ul class="flex items-center justify-center">
                                    @if (count($allImages) > 0)
                                    @foreach ($allImages->take(3) as $key => $img)
                                    <li class="mr-2 last:mr-0">
                                        <!-- <a href="/product-detail.html"> -->
                                        <img src="{{ $img }}" alt=""
                                            class="cursor-pointer w-auto h-auto align-middle object-center object-cover rounded"
                                            data-image="{{ $img }}">
                                        <!-- </a> -->
                                    </li>

                                   @endforeach
                                   @endif

                                </ul>
                            </div>
                        </div>
                        <div class="grid-card-text-wrapper mt-5 lg:mt-0 flex-1">
                            <div
                                class="grid-card-header sm:flex sm:flex-row-reverse sm:items-start sm:justify-between">
                                <div class="grid-card-icon-wrapper relative flex items-center justify-end">
                                    @if(isset($product->merchant))
                                    <button type="button" data-id="compare-modal"
                                        data-product-id="{{ $product->id }}"
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
                                                    fill="#333333"></path>
                                            </g>
                                        </svg>
                                    </button>
                                    @else
                                    <button type="button" data-id="compare-modal"
                                        data-product-id="{{ $product->id }}"
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
                                                    fill="#333333"></path>
                                            </g>
                                        </svg>
                                    </button>
                                    @endif
                                    <button type="button" data-product-id="{{ $product->id }}"
                                        class="bg-white w-[40px] h-[40px] shadow-[0px_4px_15px_2px_rgba(0,0,0,0.10)] rounded-full text-center border border-white flex items-center justify-center wishlist_icon_current no-login"
                                        tabindex="0">
                                        {{-- <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="{{ count($product->favourite) > 0 ? 'hidden' : '' }} mx-auto heart-hole">
                                            <g id="ph:heart-bold">
                                                <path id="Vector"
                                                    d="M16.6875 2.625C14.8041 2.625 13.1325 3.36844 12 4.64625C10.8675 3.36844 9.19594 2.625 7.3125 2.625C5.67208 2.62698 4.09942 3.27952 2.93947 4.43947C1.77952 5.59942 1.12698 7.17208 1.125 8.8125C1.125 15.5944 11.0447 21.0131 11.4666 21.2409C11.6305 21.3292 11.8138 21.3754 12 21.3754C12.1862 21.3754 12.3695 21.3292 12.5334 21.2409C12.9553 21.0131 22.875 15.5944 22.875 8.8125C22.873 7.17208 22.2205 5.59942 21.0605 4.43947C19.9006 3.27952 18.3279 2.62698 16.6875 2.625ZM16.1728 15.9713C14.8671 17.0792 13.4714 18.0764 12 18.9525C10.5286 18.0764 9.13287 17.0792 7.82719 15.9713C5.79562 14.2284 3.375 11.5706 3.375 8.8125C3.375 7.76821 3.78984 6.76669 4.52827 6.02827C5.26669 5.28984 6.26821 4.875 7.3125 4.875C8.98125 4.875 10.3781 5.75625 10.9584 7.17562C11.0429 7.38254 11.1871 7.55961 11.3726 7.68425C11.5581 7.80889 11.7765 7.87545 12 7.87545C12.2235 7.87545 12.4419 7.80889 12.6274 7.68425C12.8129 7.55961 12.9571 7.38254 13.0416 7.17562C13.6219 5.75625 15.0188 4.875 16.6875 4.875C17.7318 4.875 18.7333 5.28984 19.4717 6.02827C20.2102 6.76669 20.625 7.76821 20.625 8.8125C20.625 11.5706 18.2044 14.2284 16.1728 15.9713Z"
                                                    fill="#333333"></path>
                                            </g>
                                        </svg>
                                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="{{ count($product->favourite) <= 0 ? 'hidden' : '' }} heart-full mx-auto">
                                            <path
                                                d="M27.5376 17.0627L17.4126 27.1877C17.2278 27.3744 17.0078 27.5226 16.7654 27.6238C16.5229 27.7249 16.2628 27.777 16.0001 27.777C15.7374 27.777 15.4773 27.7249 15.2349 27.6238C14.9924 27.5226 14.7724 27.3744 14.5876 27.1877L4.2001 16.8002C3.47912 16.0811 2.91238 15.2226 2.53454 14.277C2.1567 13.3314 1.9757 12.3187 2.00262 11.3008C2.02953 10.2829 2.26378 9.28117 2.69105 8.35688C3.11832 7.43259 3.72963 6.60517 4.4876 5.9252C7.4001 3.2877 12.1501 3.5377 15.0626 6.4627L16.0001 7.3877L17.2001 6.2002C17.9197 5.48318 18.7767 4.91876 19.7196 4.54074C20.6625 4.16272 21.672 3.97887 22.6876 4.0002C23.7079 4.02509 24.7122 4.25863 25.6388 4.68644C26.5653 5.11425 27.3945 5.72726 28.0751 6.4877C30.7001 9.4002 30.4626 14.1502 27.5376 17.0627Z"
                                                fill="#FF6F6F"></path>
                                        </svg> --}}
                                        <img src="{{ asset('frontend/img/Default.svg') }}" data-product-id="{{ $product->id }}"
                                        alt="heart"
                                        class="mx-auto heart-hole {{ Auth::guard('customer')->user() == null ? '':(count($product->favourite) > 0 ? 'hidden' : '') }}">
                                 <img src="{{ asset('frontend/img/Selected.svg') }}" data-product-id="{{ $product->id }}"
                                        alt="heart selected"
                                        class="heart-full mx-auto {{ Auth::guard('customer')->user() == null ? 'hidden':( count($product->favourite) <= 0 ? 'hidden' : '') }}">
                                    </button>
                                </div>
                                <div class="grid-card-infos mt-3 sm:mt-0 basis-[36.25rem]">
                                    <a
                                        href="{{ route('product-detail',['category' => isset($product->category) ? str_replace(' ','-',$product->category->name_en) : '', 'slug' => isset($product->slug_en) ? $product->slug_en : '']) }}">
                                        <h2 class="font-bold me-body23">{{ langbind($product, 'name') }}</h2>
                                    </a>
                                    <div class="xsm:flex items-center justify-between font-secondary me-body16 mt-3">
                                        {{-- <div class="rating-text flex items-center">
                                        <p><img src="./img/health-rating-star.svg" alt="star icon" class="w-auto h-auto align-middle object-cover object-center"></p>
                                        <p class="font-bold text-darkgray me-body16 pl-1">4.8 <span class="font-normal">(52 reviews)</span></p>
                                    </div> --}}
                                        <ul class="branch-list relative flex items-center flex-wrap mt-1 xsm:mt-0">
                                            @if (isset($product->merchant) && count($product->merchant->merchantLocations) > 0)
                                                <li class="w-auto h-auto mr-1">
                                                    <img src="{{ asset('frontend/img/ph_map-pin-light.svg') }}"
                                                        alt=""
                                                        class="w-auto h-auto align-middle object-cover object-center">
                                                </li>
                                                @foreach ($product->merchant->merchantLocations->take(3) as $location)
                                                    <li class="mr-1">
                                                        {{ langbind($location->area, 'name') }}<span
                                                            class=" text-meA3 ml-1">{{ !$loop->last ? '|' : '' }}</span>
                                                    </li>
                                                @endforeach
                                            @endif

                                            @if (isset($product->merchant) && count($product->merchant->merchantLocations) > 3)
                                                <li class="w-auto h-auto">
                                                    <button type="button"
                                                        class="plan-tooltip-btn w-auto h-fit align-middle">
                                                        <img src="{{ asset('frontend/img/dots.svg') }}"
                                                            alt="see more"
                                                            class="w-auto h-auto align-middle object-cover object-center">

                                                        <div class="plan-tooltip tooltip-more me-body16 text-darkgray">
                                                            <div
                                                                class="plan-tooltip-header font-bold p-2 lg:p-[10px] bg-far rounded">
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
                                    </div>

                                    <div class="">
                                        <ul class="flex flex-wrap mt-3 status-container me-body14">
                                            @php $takeNum = isset($product->number_of_dose) ?  1 : 0; @endphp
                                            @if (isset($product->number_of_dose))
                                                <li
                                                    class="status-container--item px-[16px] py-[6px] rounded-[50px] mr-1 last:mr-0 mb-1 lg:mr-2 lg:last:mr-0 lg:mb-2 helvetica-normal font-medium text-darkgray me-body14 bg-tagbg">
                                                    {{ $product->number_of_dose }}
                                                    {{ $product->number_of_dose == 1 ? __('labels.product_detail.item') : __('labels.product_detail.items') }} </li>
                                            @endif
                                            @if (count(productTagVal($product)) > 0)
                                                @foreach (productTagVal($product)->take(8 - $takeNum) as $key => $tag)
                                                    <li
                                                        class="status-container--item px-[16px] py-[6px] rounded-[50px] mr-1 last:mr-0 mb-1 lg:mr-2 lg:last:mr-0 lg:mb-2 helvetica-normal font-medium text-darkgray me-body14 bg-tagbg">
                                                        {{ langbind($tag, 'name') }}
                                                    </li>
                                                @endforeach
                                            @endif

                                            {{-- <li class="w-auto h-auto">
                                            <button type="button" class="plan-tooltip-btn w-auto h-fit align-middle">
                                                <img src="./img/dots.svg" alt="see more" class="w-auto h-auto align-middle object-cover object-center">

                                                <div class="plan-tooltip tooltip-more tooltip-tags me-body16 text-darkgray xl:w-[400px]">
                                                    <div class="plan-tooltip-header font-bold p-2 lg:p-[10px] bg-far rounded">
                                                    Tag
                                                    </div>
                                                    <div class="plan-tooltip-body mt-2">
                                                    <ul class="flex flex-wrap">

                                                    </ul>
                                                    </div>
                                                </div>
                                            </button>
                                        </li> --}}
                                        </ul>

                                    </div>
                                </div>
                            </div>

                            <div class="quick-preview-offer-container sm:flex justify-between">
                                <div class="quick-preview-offer me-body16">
                                    <ul class="offer-services mt-5 sm:mt-6">
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
                                        <li class="flex items-center mt-1 first:mt-0 lg:mt-2 first:lg:mt-0">
                                            <span class="mr-1"><img
                                                    src="{{ asset('frontend/img/mdi_coupon.svg') }}" alt=""
                                                    class="w-auto h-auto align-middle object-cover object-center"></span>
                                            <span>{{ getTotalCoupon($product->id, $product->category_id, $product->sub_category_id)->count() }}
                                                @lang('labels.compare.coupon')</span>
                                        </li>
                                    </ul>
                                </div>

                                <div
                                    class="quick-preview-price me-body16 mt-5 sm:mt-0 sm:max-w-[15.813rem] 4xl:basis-[15.813rem]">
                                    <div class="font-bold mt-2 sm:mt-0">
                                        @if ($prodDis != null)
                                            <span class="me-body36 mr-1 sm:mr-2">${{ number_format($prodDis) }}</span>
                                            <span
                                                class="text-lightgray line-through">${{ number_format($product->original_price) }}</span>
                                        @else
                                            <span
                                                class="me-body36 mr-1 sm:mr-2">${{ number_format($product->original_price) }}</span>
                                        @endif

                                    </div>


                                    <ul
                                        class="tag-group overflow-x-auto whitespace-nowrap scrollbar-hide flex items-center">
                                        @if ($prodDis != null)
                                            <li
                                                class="discount rounded py-1 px-2 sm:py-[6px] sm:px-[10px] mr-1 lg:mr-2 last:lg:mr-0">
                                                –{{ round((($product->original_price - $prodDis) / $product->original_price) * 100, 0) }}%
                                            </li>
                                            <li
                                                class="discount rounded py-1 px-2 sm:py-[6px] sm:px-[10px] mr-1 lg:mr-2 last:lg:mr-0">
                                                @lang('labels.product_detail.save') ${{ number_format($product->original_price - $prodDis) }}
                                                {{-- Save ${{ number_format($product->original_price - $prodDis) }} --}}
                                            </li>
                                        @endif
                                    </ul>

                                    <div class="mt-2">
                                        <button type="button" onclick="addToCart({{ $product }})"
                                            class="preview-cartbtn text-light me-body18 font-bold bg-orangeMediq border border-solid border-orangeMediq rounded-md w-36 sm:w-full py-2 4xl:py-3 hover:bg-brightOrangeMediq transition-colors duration-300">
                                            @lang('labels.add_to_cart')
                                        </button>
                                        {{-- <p class="mt-2 sm:text-center">120+ people booking</p> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            @else
                @include('frontend.customer.empty-wishlist',['title'=>'recently-viewed'])
            @endif
        </div>
    </div>
    <div component-name="me-dashboard-wishlist-compare"
        class="wishlist-content {{ $mainTag == 'recently-compared' ? '' : 'hidden' }}" id="wish-compare">
        @if (count($productList) > 0 && $mainTag == 'recently-compared')
            {{-- @include('frontend.customer.empty-wishlist',['title'=>'recently-compared']) --}}
            @foreach ($productList as $data)
                <div>
                    <div class="flex items-center justify-between helvetica-normal me-body16 pb-[16px]">
                        @php
                            if ($data->created_at == $data->updated_at) {
                                $dateTitle = __('labels.wishlist.created_on') . date('d M Y', strtotime($data->created_at));
                            } else {
                                $dateTitle =  __('labels.wishlist.modified_on') . date('d M Y', strtotime($data->updated_at));
                            }
                        @endphp
                        <p class="text-meA3">{{ $dateTitle }}</p>
                        <button class="text-darkgray underline compare-remove-btn"
                            data-id={{ $data->id }}>@lang('labels.wishlist.remove')</button>
                    </div>
                    <div
                        class="p-3 sm:p-4 xl:p-5 bg-white rounded-xl shadow-[0px_4px_15px_2px_rgba(0,0,0,0.10)] mb-5 lg:mb-10 ">
                        @php
                            $productItemList = unserialize($data->product_id);
                            $product = \App\Models\Product::find($productItemList[0]);
                        @endphp
                        <h2 class="font-bold me-body23">{{ langbind($product->category,'name') }} @lang('labels.wishlist.comparison')</h2>
                        <div class="flex flex-wrap compare-box-container wcompare-box inner-content1"
                            data-id="{{ $data->id }}">
                            @foreach ($productItemList as $pid)
                                @php $productDetails = \App\Models\Product::find($pid); @endphp
                                <div component-name="me-dashboard-wishlist-compare-card"
                                    class="relative flex items-center compare-img-container wimg-container">
                                    <div class="bcc-img mr-[12px]">
                                        @if(isset($productDetails->merchant))
                                        <img src="{{ isset($productDetails->merchant->icon) ? $productDetails->merchant->icon : asset('frontend/img/quality-healthcare.png') }}"
                                            alt="image" class="w-[80px] h-[80px] rounded-[12px]">
                                        @else
                                        <img src="{{ isset($productDetails->featured_img) ? $productDetails->featured_img : asset('frontend/img/quality-healthcare.png') }}"
                                             alt="image" class="w-[80px] h-[80px] rounded-[12px]">
                                        @endif
                                        {{-- <img src="{{ asset('frontend/img/vaccine-injection.png') }}" alt="image"
                                            class="w-[80px] h-[80px] rounded-[12px]"> --}}
                                    </div>
                                    <div class="bcc-des"><a
                                            href="{{ route('product-detail',['category' => isset($product->category) ? str_replace(' ','-',$product->category->name_en) : '', 'slug' => isset($product->slug_en) ? $product->slug_en : '']) }}">
                                            <p
                                                class="w-[307px] leading-tight helvetica-normal text-darkgray font-bold me-body18 title hover:underline">
                                                {{-- {{ $productDetails->name_en }} --}}
                                                {{ langbind($productDetails,'name') }}
                                            </p>
                                        </a>
                                        <div class="flex items-center">
                                            <p class="font-bold text-mered me-body20">
                                                @if($productDetails->promotion_price!=null)
                                                ${{ $productDetails->promotion_price }}
                                                    @else
                                                @if($productDetails->discount_price!=null)
                                                ${{ $productDetails->discount_price }}
                                                @endif
                                                @endif
                                                @if($productDetails->promotion_price==null&& $productDetails->discount_price==null)
                                                ${{ $productDetails->original_price }}
                                                @endif
                                            </p>
                                            @if($productDetails->promotion_price!=null || $productDetails->discount_price!=null)
                                            <p
                                                class="font-bold text-lightgray me-body14 pl-[10px]">
                                                $
                                                <span class="linethrough">{{ $productDetails->original_price }}</span>
                                            </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="bcc-close absolute top-0 right-0">
                                        <button type="button" data-id={{ $productDetails->id }}
                                            data-parent-id={{ $data->id }}
                                            class="mx-auto text-darkgray bg-whitez font-bold font-secondary me-body16 w-[24px] h-[24px] flex justify-center items-center wishlist-delete-btn">x</button>
                                    </div>
                                </div>
                            @endforeach
                            <button
                                class="w-[80px] h-[80px] flex items-center justify-center complus-btn bg-far rounded-[8px] mb-5 {{ count($productItemList) == 4 ? 'hidden' : '' }}"
                                data-compare-id="add-compare-modal{{ $data->id }}"
                                data-id="{{ $data->id }}">
                                <img src="{{ asset('frontend/img/me-plus.svg') }}" alt="plus icon"
                                    class="w-[30px] complus-icon" data-id="{{ $data->id }}"
                                    data-category-id="{{ $product->category->id }}"
                                    data-id-list="{{ json_encode($productItemList) }}">
                            </button>
                        </div>
                        <div class="custom-divider"></div>
                        <div class="flex items-center justify-end mt-5">
                            <p class="helvetica-normal text-darkgray me-body16 mr-10">@lang('labels.wishlist.body_check_compare_t1')
                                {{ langbind($product->category, 'name')}}
                                @lang('labels.wishlist.body_check_compare_t2')</p>
                            <a href="#" data-id="{{ $data->id }}"
                                class="btn-compare-inner bg-white text-darkgray me-body16 helvetica-normal flex items-center justify-center w-[145px] h-[40px] border border-darkgray rounded-[6px] hover:border-orangeMediq hover:text-orangeMediq">@lang('labels.footer.compare')</a>
                        </div>
                    </div>
                </div>
                <!-- The Modal -->
                <div id="add-compare-modal{{ $data->id }}"
                    class="modal flex hidden items-center justify-center fixed z-[1001] left-0 top-0 w-full h-full bg-black/[.75] overflow-hidden main-add-compare-container">
                    <!-- Modal content -->
                    <div class="modal-content w-full max-w-[80%] lg:max-w-[578px] shadow-shadow02 my-[15%] mx-auto">
                        <div class="relative rounded-[12px] bg-white">
                            <div class="flex ml-auto mr-6 w-5 h-5 absolute right-0 top-4">
                                <span data-id="add-compare-modal{{ $data->id }}"
                                    class="pb-[4px] absolute left-1/2 top-1/2 -translate-y-1/2 -translate-x-1/2 close-add-compare-modal  flex items-center justify-center text-[32px] w-full cursor-pointer text-[#1A1818] focus:no-underline">×</span>
                            </div>
                            <div class="modal-content-plan">
                                <div class="preview-bgradient p-10 rounded-t-[12px]">
                                    <h2 class="font-secondary font-bold text-darkgray me-body23">@lang('labels.wishlist.add_to_compare')</h2>
                                </div>

                                <div class="bg-white p-10 pt-5 pr-[24px] rounded-b-[12px]">
                                    <p
                                        class="helvetica-normal text-darkgray me-body16 recently-or-recommended-text-content">
                                    </p>
                                    <div class="flex flex-col compare-box-container suggestion-product-list-content">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            @endforeach
        @else
            @include('frontend.customer.empty-wishlist',['title'=>'recently-compared']);
        @endif
    </div>
</div>
{!! $productList->appends([])->links('frontend.pagination')->render() !!}

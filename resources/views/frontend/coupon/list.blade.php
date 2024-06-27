@extends('frontend.layouts.master')
@include('frontend.seo', ['seo' => isset($seo) ? $seo : ''])
@section('content')
    <section class="cl-banner-section">
        <div component-name="me-coupon-list-banner" class="coupon-list-container">
            <div class="relative mt-[10px]">
                @php $couponBanner = \App\Models\CouponBanner::whereIsPublished(true)->first(); @endphp
                @if($couponBanner)
                    <img src="{{ $couponBanner->img }}" alt="banner" class="w-full object-cover best-discount-img desktop-img" />
                    <img src="{{ $couponBanner->img }}" alt="banner" class="w-full object-cover best-discount-img mobile-img" />
                    <div class="coupon-banner-list-section max-w-[59.938rem]">
                        <h1 class="helevitca-normal">
                            <img src="{{ asset('frontend/img/asset-group.svg')}}" alt="asset-group" class="inline" />
                            <span>{{ langbind($couponBanner,'name') }}</span>
                            <img src="{{ asset('frontend/img/asset-group.svg')}}" alt="asset-group" class="inline" />
                        </h1>
                        <p class="subtitle helevitca-normal me-body16">{{ strip_tags(langbind($couponBanner,'description')) }}</p>
                    </div>
                @else
                    <img src="{{ asset('frontend/img/best-discount.png')}}" alt="banner" class="w-full object-cover best-discount-img desktop-img" />
                    <img src="{{ asset('frontend/img/best-discount.png')}}" alt="banner" class="w-full object-cover best-discount-img mobile-img" />
                    <div class="coupon-banner-list-section max-w-[59.938rem]">
                        <h1 class="helevitca-normal">
                            <img src="{{ asset('frontend/img/asset-group.svg')}}" alt="asset-group" class="inline" />
                            <span>Best Discount</span>
                            <img src="{{ asset('frontend/img/asset-group.svg')}}" alt="asset-group" class="inline" />
                        </h1>
                        <p class="subtitle helevitca-normal me-body16">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Nunc volutpat eros mauris, non lobortis quam tincidunt in. Aenean malesuada lorem nec sapien finibus
                            condimentum. Nullam quis </p>
                    </div>
                @endif
            </div>
        </div>
    </section>
    {{-- <section class="cl-banner-section">
        <div component-name="me-coupon-list-banner" class="coupon-list-container">
                <div class="relative mt-[10px]">
                <img src="./img/best-discount.png" alt="banner" class="w-full object-cover best-discount-img desktop-img"/>
                <img src="./img/best-discount.png" alt="banner" class="w-full object-cover best-discount-img mobile-img"/>
                <div class="coupon-banner-list-section max-w-[59.938rem]">
                    <h1 class="helevitca-normal">
                        <img src="./img/asset-group.svg" alt="asset-group" class="inline"/>
                        <span>Best Discount</span>
                        <img src="./img/asset-group.svg" alt="asset-group" class="inline"/>
                    </h1>
                    <p class="subtitle helevitca-normal me-body16">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc volutpat eros mauris, non lobortis quam tincidunt in. Aenean malesuada lorem nec sapien finibus condimentum. Nullam quis </p>
                </div>
                </div>
                </div>
    </section> --}}
    <section class="cl-main-tab coupon-list">
        @include('frontend.coupon.data-list')
        @include('frontend.include.product-compare-box')
    </section>
@endsection
@push('scripts')
    <script src="{{ asset('frontend/custom/product-compare.js') }}"></script>
    <script src="{{ asset('frontend/custom/coupon-list-filter.js') }}"></script>
@endpush

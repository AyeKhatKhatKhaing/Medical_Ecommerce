@extends('frontend.layouts.master')
@include('frontend.seo', ['seo' => isset($seo) ? $seo : ''])
@section('content')
    <main>
        <section class="dash-banner-section">
            <div component-name="me-dashboard-banner">
                <div class="relative">
                    <img src="{{ asset('frontend/img/Rectangle 2645.png') }}" alt="background image" class="h-[180px]">
                    <h1
                        class="me-body32 text-whitez helvetica-normal font-bold text-center absolute top-1/2 left-1/2 dashboard-title">
                        @lang("labels.overview")
                    </h1>
                </div>
            </div>
        </section>
        <section class="user-dashboard-section dashboard-list">
            <div class="flex justify-between relative helvetica-normal user-dashboard-layer">
                @include('frontend.customer.leftmenu')
                <div class="udl-right">
                     @include('frontend.customer.dashboard-booking-data-list')
                 
                </div>
            </div>
        </section>
        @include('frontend.include.product-compare-box')
    </main>
@endsection
@push('scripts')
    <script src="{{ asset('frontend/custom/product-compare.js') }}"></script>
    <script>
        $(".btnPayNow").on("click",function() {
            window.location = '../../../mybooking/details/'+$(this).closest('p').attr('data-order-id');
        });
    </script>
@endpush

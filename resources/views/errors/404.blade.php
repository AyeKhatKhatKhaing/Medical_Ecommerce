@extends('frontend.layouts.master')
@php
    $seo = App\Models\SeoPage::where('title', 'four04_page')->first();                              
@endphp
@include('frontend.seo', ['seo' => isset($seo) ? $seo : ''])
@section('content')
<main>
    <section class="custom-error">
        <div class="best-price-container py-16 lg:py-20">
            <div class="custom-error-container sm:flex sm:items-center sm:justify-center max-w-[64.125rem] mx-auto ">
            <div class="custom-error-img sm:mr-5 md:mr-8 lg:mr-10 xl:mr-16 6xl:mr-24">
                <img src="{{asset('frontend/img/404-mediQ.png')}}" alt="Page Not Found"
                class="w-auto h-auto object-cover object-center align-middle mx-auto">
            </div>

            <div
                class="custom-error-content me-body16 text-center max-w-[25.813rem] mx-auto sm:mx-0 mt-8 sm:mt-0 sm:text-left">
                <h1 class="custom-error-title text-blueMediq me-head32 font-bold">@lang('labels.page_not_found.not_found')</h1>

                <p class="text-darkgray mt-2 xl:mt-3">
                @lang('labels.page_not_found.not_found_p')
                </p>

                <a href="{{route('mediq')}}"
                class="inline-block text-light bg-orangeMediq rounded-md py-3 xl:py-4 px-5 mt-4 xl:mt-8 6xl:mt-9 hover:bg-brightOrangeMediq transition-colors duration-300">
                @lang('labels.page_not_found.go_home')
                </a>
            </div>
            </div>
        </div>
    </section>
</main>
@endsection
@push('scripts')
<script>
</script>
@endpush
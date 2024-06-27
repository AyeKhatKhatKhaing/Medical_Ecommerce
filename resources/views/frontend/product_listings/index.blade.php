@extends('frontend.layouts.master')
@include('frontend.seo', ['seo' => isset($seo) ? $seo : ''])
@section('content')
    {{-- <form action="" method="GET" id="filter-form"> --}}
    <nav class="three-col-search-bar bg-lightblue">
        <div class="search-bar-container font-medium py-6">
            <div class="search-bar flex justify-between items-center rounded-lg lg:rounded-xl bg-light">
                <div class="flex-1 relative py-[3px] 4xl:py-[5px]">
                    <button data-open-dropdown="#categoryDropdown"
                        class="search-field cursor-pointer py-[2px] sm:py-1 px-3 lg:px-4 4xl:px-6 w-full text-left rounded-lg lg:rounded-xl bg-whitez hover:bg-far search-field-category">
                        <h2 class="search-field-label text-12 lg:text-14 text-lightgray 4xl:text-16">@lang('labels.product.category')
                        </h2>
                        <span id="category"
                            class="search-field-data text-14 lg:text-16 text-darkgray 4xl:text-18">@lang('labels.product.all')
                        </span>
                    </button>

                    <div id="categoryDropdown" data-dropdown=""
                        class="dropdown-with-sidebar absolute top-14 left-0 z-10 sm:w-96 lg:w-[32.5rem] hidden lg:top-[68px] 4xl:w-[33.75rem] 4xl:top-[74px]">
                        <div
                            class="dropdown-with-sidebar-container p-1 5xs:p-2 sm:p-[10px] bg-light rounded-xl shadow-[0px_4px_10px_2px_rgba(0,0,0,0.1)] text-14 lg:text-16 4xl:text-18 max-h-72 lg:max-h-[25.625rem] flex">
                            <div class="sidebar overflow-y-auto scrollbar-hide">
                                <ul class="text-darkgray">
                                    @if (count($main_categories) > 0)
                                        @foreach ($main_categories as $category)
                                            <li>
                                                <button role="button" data-group-target="#bodyCheck{{ $category->id }}"
                                                    class="sidebar-tab sidebar-tab-active flex justify-between items-center w-[7.5rem] sm:w-44 capitalize p-3 sm:px-[14px] lg:w-48 4xl:w-[12.5rem]">
                                                    <span>{{ langbind($category, 'name') }}</span>
                                                </button>
                                            </li>
                                        @endforeach
                                    @endif

                                    {{-- <li>
                                        <button role="button" data-group-target="#vaccine" class="sidebar-tab  flex justify-between items-center w-[7.5rem] sm:w-44 capitalize p-3 sm:px-[14px] lg:w-48 4xl:w-[12.5rem]">
                                        <span>Vaccine</span>
                                        <img src="{{asset('frontend/img/right-arrow-round.svg')}}" alt="">
                                        </button>
                                    </li>

                                    <li>
                                        <button role="button" data-group-target="#dnaTest" class="sidebar-tab  flex justify-between items-center w-[7.5rem] sm:w-44 capitalize p-3 sm:px-[14px] lg:w-48 4xl:w-[12.5rem]">
                                        <span>DNA Test</span>
                                        <img src="{{asset('frontend/img/right-arrow-round.svg')}}" alt="">
                                        </button>
                                    </li> --}}

                                </ul>
                            </div>

                            <div class="content text-countcolor flex-1 overflow-y-auto scrollbar-hide categories-filter">
                                @if (count($main_categories) > 0)
                                    @foreach ($main_categories as $category)
                                        <div id="bodyCheck{{ $category->id }}" role="group" aria-labelledby="Body Check"
                                            data-dropdown-group="" class="content-group content-group-active">
                                            <ul>

                                                @if (isset($category->subCategory) && count($category->subCategory) > 0)
                                                    <li class="w-40 5xs:w-48 sm:w-auto p-3 sm:px-[14px]">
                                                        <label for="Category-{{ $category->id }}-sub-category-0"
                                                            class="flex items-center justify-between custom-checkbox-label capitalize">
                                                            <span class="label-text">@lang('labels.product.all')
                                                                {{ langbind($category, 'name') }}
                                                                <span class="quantity-label">
                                                                    ({{ count($category->products) }})
                                                                </span>
                                                            </span>
                                                            <input type="checkbox" class="category-all-checkbox"
                                                                name="category-all-checkbox"
                                                                id="Category-{{ $category->id }}-sub-category-0"
                                                                value="all">
                                                            <span class="custom-checkbox"></span>
                                                        </label>
                                                    </li>
                                                    @foreach ($category->subCategory as $key => $sub_category)
                                                        <li class="w-40 5xs:w-48 sm:w-auto p-3 sm:px-[14px]">
                                                            <label for="sub-category-{{ $sub_category->id }}"
                                                                class="flex items-center justify-between custom-checkbox-label capitalize">
                                                                <span
                                                                    class="label-text">{{ langbind($sub_category, 'name') }}
                                                                    <span class="quantity-label">
                                                                        ({{ count($sub_category->products) }})
                                                                    </span>
                                                                </span>
                                                                <input class="sub-category-checkbox"type="checkbox"
                                                                    name="sub-category"
                                                                    id="sub-category-{{ $sub_category->id }}"
                                                                    value="{{ $sub_category->id }}"
                                                                    data-value="{{ langbind($sub_category, 'name') }}"
                                                                    {{ in_array($sub_category->id, $selected_categories) ? 'checked' : '' }}>
                                                                <span class="custom-checkbox"></span>
                                                            </label>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                    @endforeach
                                @endif


                            </div>
                        </div>
                    </div>
                </div>

                <div class="divider bg-mee4 w-1 h-9"></div>

                <div class="flex-1 relative py-[3px] 4xl:py-[5px] categories-filter">
                    <button data-open-dropdown="#brandDropdown"
                        class="search-field cursor-pointer py-[2px] sm:py-1 px-3 lg:px-4 4xl:px-6 w-full text-left rounded-lg lg:rounded-xl bg-whitez hover:bg-far">
                        <h2 class="search-field-label text-12 lg:text-14 text-lightgray 4xl:text-16">@lang('labels.product.brand')
                        </h2>
                        <span id="brand"
                            class="search-field-data text-14 lg:text-16 text-darkgray 4xl:text-18">@lang('labels.product.all')
                        </span>
                    </button>

                    <div id="brandDropdown" data-dropdown=""
                        class="absolute top-14 left-1/2 -translate-x-1/2 sm:translate-x-0 sm:left-0 z-10 w-72 2xs:w-96 lg:w-[32.5rem] hidden lg:top-[68px] 4xl:w-[33.75rem] 4xl:top-[74px]">
                        <div
                            class="dropdown-menu-container p-1 5xs:p-2 sm:p-[10px] bg-light rounded-xl shadow-[0px_4px_10px_2px_rgba(0,0,0,0.1)] text-14 lg:text-16 4xl:text-18 max-h-72 lg:max-h-[25.625rem] overflow-y-auto scrollbar-hide">
                            <div class="dropdown-menu-content text-countcolor overflow-y-auto scrollbar-hide rounded-lg">
                                <div role="group" aria-labelledby="" data-dropdown-group="" class="brand-group">
                                    <ul>
                                        @if (count($brands) > 0)
                                            @php
                                                $brand_count = App\Models\Product::whereNotNull('merchant_id')
                                                    ->whereIsPublished(true)
                                                    ->whereNull('deleted_at')
                                                    ->count();
                                            @endphp
                                            <li class="w-40 5xs:w-48 sm:w-auto p-3 sm:px-[14px]">
                                                <label for="merchant-0"
                                                    class="flex items-center justify-between custom-checkbox-label capitalize">
                                                    <span class="mr-1 4xl:mr-2 max-w-[21.25rem]">
                                                        @if(lang() == 'en')@lang('labels.product.all') @lang('labels.product.brand')
                                                        @else
                                                        @lang('labels.product.all')@lang('labels.product.brand')
                                                        @endif
                                                        <span class="mr-6 lg:mr-9 4xl:mr-12">({{ $brand_count }})</span>
                                                    </span>
                                                    
                                                    <input type="checkbox" class="merchant-all-checkbox"
                                                        name="merchant-all-checkbox" id="merchant-0" value="all">
                                                    <span class="custom-checkbox"></span>
                                                </label>
                                            </li>
                                            @foreach ($brands as $key => $brand)
                                                {{-- {{ dd($brand->products) }} --}}
                                                @if (count($brand->products) > 0)
                                                    <li class="p-3 sm:px-[14px] flex items-center">
                                                        <img src=" {{ isset($brand->icon) ? $brand->icon : asset('frontend/img/dropdown-item-img.png') }}"
                                                            alt="" class="mr-2 w-auto h-auto">
                                                        <label for="merchant-{{ $brand->id }}"
                                                            class="flex items-center justify-between custom-checkbox-label capitalize flex-1">
                                                            <span
                                                                class="mr-1 4xl:mr-2 max-w-[21.25rem]">{{ langbind($brand, 'name') }}
                                                                <span
                                                                class="mr-6 lg:mr-9 4xl:mr-12">({{ count($brand->products) }})</span>
                                                            </span>
                                                            <input class="merchant-checkbox" type="checkbox" name="merchant"
                                                                id="merchant-{{ $brand->id }}"
                                                                value="{{ $brand->id }}"
                                                                data-value="{{ langbind($brand, 'name') }}"
                                                                {{ in_array($brand->id, $selected_merchants) ? 'checked' : '' }}>
                                                            <span class="custom-checkbox"></span>
                                                        </label>
                                                    </li>
                                                @endif
                                            @endforeach
                                        @endif


                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-[3px] 4xl:p-[5px] hidden">
                    <button role="button" type="button"
                        class="hidden search-btn bg-orangeMediq text-light me-body16 font-bold py-3 sm:py-[14px] 4xl:py-[18px] px-5 w-auto sm:w-[9.5rem] 4xl:w-[12rem] rounded-lg">
                        @lang('labels.product.search')
                    </button>
                </div>

            </div>
        </div>
    </nav>
    <div class="product-container flex xl:flex-row flex-col pt-6 lg:pt-14 4xl:pt-16 product_sidebar_container">
        @include('frontend.product_listings.product-filter')
    </div>
    {{-- <div class="productproduct-container flex xl:flex-row flex-col pt-6 lg:pt-14 4xl:pt-16">
        <aside class="product-sidebar xl:max-w-[18.75rem] w-full mr-5 text-darkgray">
            <div component-name="product-listing-tab-mobile" class="product-listing-tab-mobile mt-5 xl:hidden block mb-2">
                <div class="mr-5 filter-icon hidden md:flex items-center desktop-view">
                  <img src="{{asset('frontend/img/m-filter-icon.svg')}}" alt="filter-product-icon" class="mr-2"/>
                  <p class="font-normal me-body12 text-darkgray">Filter</p>
                </div>
            </div>
            <div class="pltmobile-filter-section flex md:hidden items-center justify-start mobile-view">
                <div class="result-panel">
                  <p class="helvetica results">25 products found</p>
                </div>
                <div class="ml-auto flex items-center justify-center filter-right-icon">
                  <div class="mr-5 last:mr-0 filter-icon flex flex-col justify-center items-center">
                    <img src="{{ asset('frontend/img/m-filter-icon.svg') }}" alt="filter-product-icon" />
                    <p class="font-normal me-body12 text-darkgray">Filter</p>
                  </div>
                  <div class="mr-5 sort-btn last:mr-0 flex flex-col justify-center items-center">
                    <img src="{{ asset('frontend/img/m-sort-icon.svg') }}" alt="sort icon" />
                    <p class="font-normal me-body12 text-darkgray">Sort</p>
                  </div>
                  <div class="mr-5 last:mr-0 flex flex-col justify-center items-center">
                    <div class="product-lists-view flex items-center justify-center">
                      <div data-id="#grid-view" class="cursor-pointer view-icon selected grid-icon">
                        <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path
                            d="M2.33228 2.8C2.33228 2.63431 2.46659 2.5 2.63228 2.5H14.3656C14.5313 2.5 14.6656 2.63431 14.6656 2.8V3.86667C14.6656 4.03235 14.5313 4.16667 14.3656 4.16667H2.63227C2.46659 4.16667 2.33228 4.03235 2.33228 3.86667V2.8ZM2.33228 7.46667C2.33228 7.30098 2.46659 7.16667 2.63228 7.16667H14.3656C14.5313 7.16667 14.6656 7.30098 14.6656 7.46667V8.53333C14.6656 8.69902 14.5313 8.83333 14.3656 8.83333H2.63227C2.46659 8.83333 2.33228 8.69902 2.33228 8.53333V7.46667ZM2.33228 12.1333C2.33228 11.9676 2.46659 11.8333 2.63228 11.8333H14.3656C14.5313 11.8333 14.6656 11.9676 14.6656 12.1333V13.2C14.6656 13.3657 14.5313 13.5 14.3656 13.5H2.63227C2.46659 13.5 2.33228 13.3657 2.33228 13.2V12.1333Z"
                            stroke="#333333" />
                        </svg>
                        <p class="font-normal me-body12 text-darkgray">List</p>
                      </div>
                      <div data-id="#list-view" class="cursor-pointer view-icon list-icon">
                        <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path
                            d="M3.3 2.5H7.03333C7.19902 2.5 7.33333 2.63431 7.33333 2.8V6.53333C7.33333 6.69902 7.19902 6.83333 7.03333 6.83333H3.3C3.13431 6.83333 3 6.69902 3 6.53333V2.8C3 2.63431 3.13431 2.5 3.3 2.5ZM3.3 1.9C2.80294 1.9 2.4 2.30294 2.4 2.8V6.53333C2.4 7.03039 2.80294 7.43333 3.3 7.43333H7.03333C7.53039 7.43333 7.93333 7.03039 7.93333 6.53333V2.8C7.93333 2.30294 7.53039 1.9 7.03333 1.9H3.3Z"
                            fill="#333333" stroke="#333333" stroke-width="0.2" />
                          <path
                            d="M3.3 9.16675H7.03333C7.19902 9.16675 7.33333 9.30106 7.33333 9.46675V13.2001C7.33333 13.3658 7.19902 13.5001 7.03333 13.5001H3.3C3.13431 13.5001 3 13.3658 3 13.2001V9.46675C3 9.30106 3.13431 9.16675 3.3 9.16675ZM3.3 8.56675C2.80294 8.56675 2.4 8.96969 2.4 9.46675V13.2001C2.4 13.6971 2.80294 14.1001 3.3 14.1001H7.03333C7.53039 14.1001 7.93333 13.6971 7.93333 13.2001V9.46675C7.93333 8.96969 7.53039 8.56675 7.03333 8.56675H3.3Z"
                            fill="#333333" stroke="#333333" stroke-width="0.2" />
                          <path
                            d="M9.96675 2.5H13.7001C13.8658 2.5 14.0001 2.63431 14.0001 2.8V6.53333C14.0001 6.69902 13.8658 6.83333 13.7001 6.83333H9.96675C9.80106 6.83333 9.66675 6.69902 9.66675 6.53333V2.8C9.66675 2.63431 9.80106 2.5 9.96675 2.5ZM9.96675 1.9C9.46969 1.9 9.06675 2.30294 9.06675 2.8V6.53333C9.06675 7.03039 9.46969 7.43333 9.96675 7.43333H13.7001C14.1971 7.43333 14.6001 7.03039 14.6001 6.53333V2.8C14.6001 2.30294 14.1971 1.9 13.7001 1.9H9.96675Z"
                            fill="#333333" stroke="#333333" stroke-width="0.2" />
                          <path
                            d="M9.96675 9.16675H13.7001C13.8658 9.16675 14.0001 9.30106 14.0001 9.46675V13.2001C14.0001 13.3658 13.8658 13.5001 13.7001 13.5001H9.96675C9.80106 13.5001 9.66675 13.3658 9.66675 13.2001V9.46675C9.66675 9.30106 9.80106 9.16675 9.96675 9.16675ZM9.96675 8.56675C9.46969 8.56675 9.06675 8.96969 9.06675 9.46675V13.2001C9.06675 13.6971 9.46969 14.1001 9.96675 14.1001H13.7001C14.1971 14.1001 14.6001 13.6971 14.6001 13.2001V9.46675C14.6001 8.96969 14.1971 8.56675 13.7001 8.56675H9.96675Z"
                            fill="#333333" stroke="#333333" stroke-width="0.2" />
                        </svg>
                        <p class="font-normal me-body12 text-darkgray">Grid</p>
                      </div>
                    </div>
      
                  </div>
                </div>
              </div>
        </aside>
        <main class="product-content flex-1 overflow-x-hidden product-list">
            @include('frontend.product_listings.product-list')
        </main>
    </div> --}}
    <div class="product-container flex pb-6 lg:pb-14 4xl:pb-16">
        <aside class="product-sidebar hidden xl:block max-w-[18.75rem] w-full mr-5 text-darkgray">
        </aside>
        <main class="product-content flex-1 overflow-x-hidden">
            {{-- {!! $products->links('frontend.pagination') !!} --}}
            {{-- product-see-more --}}
            {{-- <section class="see-more-section">
                <div component-name="product-see-more"
                    class="product-see-more-section bg-paleblue px-[50px] py-[25px] rounded-[12px]">
                    <div class="flex flex-wrap xs:flex-nowarp items-center justify-center xs:justify-between">
                        <div class="flex items-center justify-start">
                            <img src="{{ isset($banner->img) ? $banner->img : asset('frontend/img/gift-box.png') }}
                            " alt="gift-box" class="mr-[50px]" />

                            <div class="">
                                <h3 class="font-secondary me-body20 text-darkgray font-bold">@if (isset($banner)){{ langbind($banner, 'name') }} @endif</h3>
                                <p class="font-secondary me-body16 text-darkgray">@if (isset($banner)) {!! langbind($banner, 'content') !!} @endif</p>
                            </div>
                        </div>
                        <a href="@if (isset($banner)) {{ $banner->links }} @endif">
                            <button
                            class="mt-4 xs:mt-0 font-secondary font-bold me-body16 inline-block py-[10px] px-5 border border-darkgray text-center hover:bg-blueMediq hover:border-0 hover:text-whitez rounded-full view-more-btn">
                            @lang('labels.view_more')
                            </button>
                        </a>
                    </div>
                </div>
            </section> --}}
            {{-- <section class="see-more-section">
                    <div component-name="product-see-more" class="product-see-more-section px-[50px] py-[25px] rounded-[12px] bg-no-repeat bg-left-top"
                         style="background-image: url('{{ isset($banner->bg_img) ? asset($banner->bg_img) : '' }}');">
                    <div class="flex flex-wrap xs:flex-nowarp items-center justify-center xs:justify-between">
                        <div class="flex items-center justify-start">
                            <img src="{{ isset($banner->img) ? $banner->img : asset('frontend/img/gift-box.png') }}
                            " alt="gift-box" class="mr-[50px]" />
                            <div class="">
                                <h3 class="font-secondary me-body20 text-darkgray font-bold">@if (isset($banner)){{ langbind($banner, 'name') }} @endif</h3>
                                <p class="font-secondary me-body16 text-darkgray">@if (isset($banner)) {!! langbind($banner, 'content') !!} @endif</p>
                            </div>
                        </div>
                        <a href="@if (isset($banner)) {{ $banner->links }} @endif">
                            <button
                            class="mt-4 xs:mt-0 font-secondary font-bold me-body16 inline-block py-[10px] px-5 border border-darkgray text-center hover:bg-blueMediq hover:border-0 hover:text-whitez rounded-full view-more-btn">
                            @lang('labels.view_more')
                            </button>
                        </a>
                    </div>
                </div>
            </section>  --}}
        </main>
    </div>
    @include('frontend.include.product-compare-box')
    {{-- </form> --}}
@endsection
@push('scripts')
    <script>
    let plurl = "{{route('product.list')}}";
    </script>
    <script src="{{ asset('frontend/custom/product-filter.js') }}"></script>
    <script src="{{ asset('frontend/custom/product-compare.js') }}"></script>
    <script>
        $(document).ready(function() {
            filterLoading();
            $(window).on('load', function() {
                setTimeout(function () {
                    filterHideLoading();
                }, 3000);
            });
        })
    </script>
@endpush

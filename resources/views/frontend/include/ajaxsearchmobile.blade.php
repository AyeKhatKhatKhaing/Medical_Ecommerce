<div class="recent-search-type_mobile">
    @if (count($recentSearchKeywords) > 0)
        <div class="recent-search-container">
            {{-- <h6 class="mb-[4px] helvetica-normal me-body18 font-medium text-lightgray">Recent Search</h6> --}}
            <div class="flex flex-wrap items-center justify-start">
                @foreach ($recentSearchKeywords as $key => $recentSearchKeyword)
                   
            <div class="bg-far px-[20px] py-[8px] mr-[8px] rounded-[50px] helvetica-normal font-medium me-body18 text-darkgray mb-4 border border-far hover:border-blueMediq hover:text-blueMediq">
                <input type="hidden" name="" id="mobile-search-keywoard" value="{{ $recentSearchKeyword }}">
                <span 
                class="recent-search-keywords-mobile ">
                {{ $recentSearchKeyword }}
            </span>
            <span class="rsi-close remove-search-keywords-mobile ml-3" style="font-size: 20px;" data-value="{{ $recentSearchKeyword }}">×</span>
            </div>
                   
                @endforeach
            </div>
        </div>
    @endif
    @if (count($categories) > 0)
        <div class="recent-search-category mt-[12px]">
            <h6 class="mb-[4px] helvetica-normal me-body18 font-medium text-lightgray">@lang('labels.product.category')</h6>
            <div class="flex flex-wrap items-center justify-start recent-search-items pl-[20px]">
                @foreach ($categories as $key => $category)
                    <p
                        class="flex items-center justify-between w-full mb-[16px] helvetica-normal font-medium me-body18 text-darkgray">
                        <a class="flex items-center justify-between w-full"
                            href="{{ route('products.listings', ['tf' => 'recommend', 'view' => 'list-view', 'page' => 1, 'pc' => $category->id]) }}">
                            {{ langbind($category, 'name') }}
                            <img src="{{ asset('frontend/img/cross-arrow.svg') }}" alt="cross-arrow img"
                                class="cross-arrow-img">
                        </a>

                    </p>
                @endforeach
            </div>
        </div>
    @endif
    @if (count($merchants) > 0)
        <div class="recent-search-brand mt-[2px]">
            <h6 class="mb-[4px] helvetica-normal me-body18 font-medium text-lightgray">@lang('labels.product.brand')</h6>
            <div class="flex flex-wrap items-center justify-start recent-search-items pl-[20px]">
                @foreach ($merchants as $key => $merchant)
                    <p
                        class="flex items-center justify-between w-full mb-[16px] helvetica-normal font-medium me-body18 text-darkgray">
                        <a class="flex items-center justify-between w-full"
                            href="{{ route('products.listings', ['tf' => 'recommend', 'view' => 'list-view', 'page' => 1, 'pb' => $merchant->id]) }}">
                            {{ langbind($merchant, 'name') }}
                            <img src="{{ asset('frontend/img/cross-arrow.svg') }}" alt="cross-arrow img"
                                class="cross-arrow-img">
                        </a>
                    </p>
                @endforeach
            </div>
        </div>
    @endif
    @if (count($products) > 0)
        <div class="recent-search-brand mt-[2px]">
            <h6 class="mb-[4px] helvetica-normal me-body18 font-medium text-lightgray">@lang('labels.product.product')</h6>
            <div class="flex flex-wrap items-center justify-start recent-search-items pl-[20px]">
                @foreach ($products as $key => $product)
                    <p
                        class="flex items-center justify-between w-full mb-[16px] helvetica-normal font-medium me-body18 text-darkgray">
                        <a class="flex items-center justify-between w-full"
                            href="{{ route('product-detail', ['category' => $product->category_name_en, 'slug' => $product->slug_en]) }}">
                            {{ langbind($product, 'name') }}
                            <img src="{{ asset('frontend/img/cross-arrow.svg') }}" alt="cross-arrow img"
                                class="cross-arrow-img">
                        </a>

                    </p>
                @endforeach
            </div>
        </div>
    @endif
</div>

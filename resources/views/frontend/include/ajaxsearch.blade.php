<div class="recent-search-type">
    @if (count($recentSearchKeywords) > 0)
    <div class="recent-search-container">
      {{-- <h6 class="mb-[4px] helvetica-normal me-body18 font-medium text-lightgray">Recent Search</h6> --}}
      <div class="flex flex-wrap items-center justify-start recent-search-items">
        @foreach ($recentSearchKeywords as $key => $recentSearchKeyword)
        <button class="recent-search-keywords bg-far px-[20px] py-[8px] mr-[8px] rounded-[50px] helvetica-normal font-medium me-body18 text-darkgray mb-4 border border-far hover:bg-blueMediq hover:border-blueMediq hover:text-whitez">
            {{$recentSearchKeyword}}
         <span class="rsi-close remove-search-keywords" data-value="{{$recentSearchKeyword}}">×</span></button>
        @endforeach
      </div>
    </div>
    @endif
    @if (count($categories) > 0)
    <div class="recent-search-category mt-[12px]">
      <h6 class="mb-[4px] helvetica-normal me-body18 font-medium text-lightgray">@lang("labels.product.category")</h6>
      <div class="flex flex-wrap items-center justify-start recent-search-items">
        @foreach ($categories as $key => $category)
        <a href="{{route('products.listings',['tf' => 'recommend','view' => 'list-view', 'page'=>1, 'pc'=>$category->id])}}" class="pl-[20px] hover:text-blueMediq hover:bg-meBg flex items-center justify-between w-full py-1 mb-1 helvetica-normal font-medium me-body18 text-darkgray">
            {{ langbind($category, 'name') }}
            <img src="{{ asset('frontend/img/cross-arrow.svg') }}" alt="cross-arrow img" class="cross-arrow-img">
        </a><br/>
        @endforeach
      </div>
    </div>
    @endif
    @if (count($merchants) > 0)
    <div class="recent-search-brand mt-[2px]">
        <h6 class="mb-[4px] helvetica-normal me-body18 font-medium text-lightgray">@lang("labels.product.brand")</h6>
        <div class="flex flex-wrap items-center justify-start recent-search-items">
            @foreach ($merchants as $key => $merchant)
            <a href="{{route('products.listings',['tf' => 'recommend','view' => 'list-view', 'page'=>1, 'pb'=>$merchant->id])}}" class="pl-[20px] hover:text-blueMediq hover:bg-meBg flex items-center justify-between w-full py-1 mb-1 helvetica-normal font-medium me-body18 text-darkgray">
                  {{ langbind($merchant, 'name') }}
                  <img src="{{ asset('frontend/img/cross-arrow.svg') }}" alt="cross-arrow img" class="cross-arrow-img">
            </a><br/>
            @endforeach
        </div>
    </div>
    @endif
    </div>
    @if (count($products) > 0)
    <div class="recent-search-brand mt-[2px]">
        <h6 class="mb-[4px] helvetica-normal me-body18 font-medium text-lightgray">@lang("labels.product.product")</h6>
        <div class="flex flex-wrap items-center justify-start recent-search-items">
            @foreach ($products as $key => $product)
            <a href="{{route('product-detail',['category'=>$product->category_name_en,'slug' => $product->slug_en])}}" class="pl-[20px] hover:text-blueMediq hover:bg-meBg flex items-center justify-between w-full py-1 mb-1 helvetica-normal font-medium me-body18 text-darkgray">
                {{ langbind($product, 'name') }}
                <img src="{{ asset('frontend/img/cross-arrow.svg') }}" alt="cross-arrow img" class="cross-arrow-img">  
            </a><br/>
            @endforeach
        </div>
    </div>
    @endif
</div>
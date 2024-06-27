<div class="search-lists desktop-search py-[20px] @if (!isset($is_searched)) hidden @endif">
    <div class="recent-search-type">
      <div class="recent-search-container">
        <h6 class="mb-[4px] helvetica-normal me-body18 font-medium text-lightgray">Recent Search</h6>
        <div class="flex flex-wrap items-center justify-start recent-search-items">
          <span class="bg-far px-[20px] py-[8px] mr-[8px] rounded-[50px] helvetica-normal font-medium me-body18 text-darkgray mb-4 border border-far hover:border-blueMediq hover:text-blueMediq">vaccine <span class="rsi-close">&times;</span></span>
          <span class="bg-far px-[20px] py-[8px] mr-[8px] rounded-[50px] helvetica-normal font-medium me-body18 text-darkgray mb-4 border border-far hover:border-blueMediq hover:text-blueMediq">female <span class="rsi-close">&times;</span></span>
          <span class="bg-far px-[20px] py-[8px] mr-[8px] rounded-[50px] helvetica-normal font-medium me-body18 text-darkgray mb-4 border border-far hover:border-blueMediq hover:text-blueMediq">sick <span class="rsi-close">&times;</span></span>
          <span class="bg-far px-[20px] py-[8px] mr-[8px] rounded-[50px] helvetica-normal font-medium me-body18 text-darkgray mb-4 border border-far hover:border-blueMediq hover:text-blueMediq">health plan <span class="rsi-close">&times;</span></span>
          <span class="bg-far px-[20px] py-[8px] mr-[8px] rounded-[50px] helvetica-normal font-medium me-body18 text-darkgray mb-4 border border-far hover:border-blueMediq hover:text-blueMediq">travel vaccine <span class="rsi-close">&times;</span></span>
        </div>
      </div>
      @if (isset($searched_products) && count($searched_products)>0)
      <div class="recent-search-category mt-[12px]">
        <h6 class="mb-[4px] helvetica-normal me-body18 font-medium text-lightgray">Product</h6>
        <div class="flex flex-wrap items-center justify-start recent-search-items pl-[20px]">
            @foreach ( $searched_products as $product )
                <p class="flex items-center justify-between w-full mb-[16px] helvetica-normal font-medium me-body18 text-darkgray">{{ $product->name_en }} <img src="{{asset('frontend/img/cross-arrow.svg')}}" alt="cross-arrow img" class="cross-arrow-img" /></p>
            @endforeach

        </div>
      </div>
      @endif
      @if (isset($searched_categories) && count($searched_categories)>0)
      <div class="recent-search-category mt-[12px]">
        <h6 class="mb-[4px] helvetica-normal me-body18 font-medium text-lightgray">Category</h6>
        <div class="flex flex-wrap items-center justify-start recent-search-items pl-[20px]">
            @foreach ( $searched_categories as $category )
                <p class="flex items-center justify-between w-full mb-[16px] helvetica-normal font-medium me-body18 text-darkgray">{{ $category->name_en }}<img src="{{asset('frontend/img/cross-arrow.svg')}}" alt="cross-arrow img" class="cross-arrow-img" /></p>
            @endforeach

        </div>
      </div>
      @endif
      @if (isset($searched_brands) && count($searched_brands)>0)
      <div class="recent-search-brand mt-[2px]">
        <h6 class="mb-[4px] helvetica-normal me-body18 font-medium text-lightgray">Brand</h6>
        <div class="flex flex-wrap items-center justify-start recent-search-items pl-[20px]">
            @foreach ( $searched_brands as $brand )
                <p class="flex items-center justify-between w-full mb-[16px] helvetica-normal font-medium me-body18 text-darkgray">{{ $brand->name }}<img src="{{asset('frontend/img/cross-arrow.svg')}}" alt="cross-arrow img" class="cross-arrow-img" /></p>
            @endforeach
        </div>
      </div>
    @endif
    </div>
  </div>

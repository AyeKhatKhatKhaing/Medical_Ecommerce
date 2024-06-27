<section class="product-deal-slider overflow-x-hidden">
    <div class="result-panel">
        @if (app()->getLocale() == 'en')
            <p class="helvetica results">
                @if($products->total() != 0)
                {{ $products->total() }} 
                {{ $products->total() <= 1 ? 'Product' : 'Products' }}
                Found
                @else
                    No product found
                @endif
                
            </p>
        @elseif (app()->getLocale() == 'zh-hk')
            <p class="helvetica results">
                @if($products->total() != 0)
                 找到 {{ $products->total() }}
                {{ $products->total() == 1 ? '產品' : '個產品' }}
                @else
                未找到相關產品 
                @endif
            </p>
        @elseif (app()->getLocale() == 'zh-cn')
            <p class="helvetica results">
                @if($products->total() != 0)
                找到 {{ $products->total() }}
                {{ $products->total() == 1 ? '產品' : '个产品' }}
                @else
                未找到相关产品
                @endif
            </p>
        @endif

    </div>
    @php
        // var_dump($selected_key_items);
        // var_dump($selected_price_tags);
    @endphp
    <div class="tabs">

        <div component-name="product-listing-tab" class="product-listing-tab mt-5">
            <ul class="flex justify-center items-center pltabs pltabs-d">
                <li class="pltabs-list pltabs-list-d helvetica-normal me-body18 p-[10px] text-center cursor-pointer rpl-d {{ $selected_tab_filter == 'recommend' ? 'active' : '' }}"
                    data-id=".recommend" data-value="recommend">@lang('labels.product.recommended')</li>
                <li class="pltabs-list pltabs-list-d helvetica-normal me-body18 p-[10px] text-center cursor-pointer rpl-d {{ $selected_tab_filter == 'popular' ? 'active' : '' }}"
                    data-id=".popular" data-value="popular">@lang('labels.product.most_popular')</li>
                {{-- <li class="pltabs-list pltabs-list-d helvetica-normal me-body18 p-[10px] text-center cursor-pointer" data-id=".best-review">Best Reviewed</li> --}}
                <li class="pltabs-list pltabs-list-d helvetica-normal me-body18 p-[10px] text-center cursor-pointer rpl-d {{ $selected_tab_filter == 'low-price' ? 'active' : '' }}"
                    data-id=".low-price" data-value="low-price">@lang('labels.product.lowest_price')</li>
                {{-- <li class="mx-auto">
                    <div class="product-lists-view flex items-center justify-center">
                        <img src="{{asset('frontend/img/grid-icon.svg')}}" alt="grid icon" data-id="#grid-view"  data-value="list-view" class="cursor-pointer view-icon {{  Request::get('view') == 'list-view' ? 'selected' : ( array_key_exists('view', $_GET) ?  '' : 'selected' )}}" />
                        <img src="{{asset('frontend/img/list-icon.svg')}}" alt="list icon" data-id="#list-view"   data-value="grid-view" class="cursor-pointer view-icon {{  Request::get('view') == 'grid-view' ? 'selected' : '' }}" />
                    </div>
                </li> --}}
                <li class="mx-auto">
                    {{-- <div class="product-lists-view flex items-center justify-center">
                        <div data-id="#grid-view" data-value="list-view"
                            class="cursor-pointer view view-icon grid-icon {{ Request::get('view') == 'list-view' ? 'selected' : (array_key_exists('view', $_GET) ? '' : 'selected') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none">
                                <path
                                    d="M3.165 5.6a1.1 1.1 0 011.1-1.1H27.73a1.1 1.1 0 011.1 1.1v2.133a1.1 1.1 0 01-1.1 1.1H4.265a1.1 1.1 0 01-1.1-1.1V5.6zm0 9.333a1.1 1.1 0 011.1-1.1H27.73a1.1 1.1 0 011.1 1.1v2.134a1.1 1.1 0 01-1.1 1.1H4.265a1.1 1.1 0 01-1.1-1.1v-2.134zm0 9.334a1.1 1.1 0 011.1-1.1H27.73a1.1 1.1 0 011.1 1.1V26.4a1.1 1.1 0 01-1.1 1.1H4.265a1.1 1.1 0 01-1.1-1.1v-2.133z"
                                    stroke="#333" />
                            </svg>
                        </div>
                        <div data-id="#list-view" data-value="grid-view"
                            class="cursor-pointer view view-icon list-icon {{ Request::get('view') == 'grid-view' ? 'selected' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M13.067 4.8H5.6a.8.8 0 00-.8.8v7.467a.8.8 0 00.8.8h7.467a.8.8 0 00.8-.8V5.6a.8.8 0 00-.8-.8zM5.6 4A1.6 1.6 0 004 5.6v7.467a1.6 1.6 0 001.6 1.6h7.467a1.6 1.6 0 001.6-1.6V5.6a1.6 1.6 0 00-1.6-1.6H5.6zm7.467 14.133H5.6a.8.8 0 00-.8.8V26.4a.8.8 0 00.8.8h7.467a.8.8 0 00.8-.8v-7.467a.8.8 0 00-.8-.8zm-7.467-.8a1.6 1.6 0 00-1.6 1.6V26.4A1.6 1.6 0 005.6 28h7.467a1.6 1.6 0 001.6-1.6v-7.467a1.6 1.6 0 00-1.6-1.6H5.6zM26.4 4.8h-7.466a.8.8 0 00-.8.8v7.467a.8.8 0 00.8.8H26.4a.8.8 0 00.8-.8V5.6a.8.8 0 00-.8-.8zM18.934 4a1.6 1.6 0 00-1.6 1.6v7.467a1.6 1.6 0 001.6 1.6H26.4a1.6 1.6 0 001.6-1.6V5.6A1.6 1.6 0 0026.4 4h-7.466zM26.4 18.133h-7.466a.8.8 0 00-.8.8V26.4a.8.8 0 00.8.8H26.4a.8.8 0 00.8-.8v-7.467a.8.8 0 00-.8-.8zm-7.466-.8a1.6 1.6 0 00-1.6 1.6V26.4a1.6 1.6 0 001.6 1.6H26.4a1.6 1.6 0 001.6-1.6v-7.467a1.6 1.6 0 00-1.6-1.6h-7.466z"
                                    fill="#333" />
                            </svg>
                        </div>
                    </div> --}}
                    @php
                        $view = 'list-view';
                        if(Request::get('view') == 'grid-view'){
                            $view = 'grid-view';
                        } 
                    @endphp
                    <div class="product-lists-view flex items-center justify-center">
                        <div data-id="#list-view" data-value="grid-view" class="cursor-pointer view view-icon grid-icon  
                        {{ $view == 'grid-view' ? 'selected' : '' }}" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M13.067 4.8H5.6a.8.8 0 00-.8.8v7.467a.8.8 0 00.8.8h7.467a.8.8 0 00.8-.8V5.6a.8.8 0 00-.8-.8zM5.6 4A1.6 1.6 0 004 5.6v7.467a1.6 1.6 0 001.6 1.6h7.467a1.6 1.6 0 001.6-1.6V5.6a1.6 1.6 0 00-1.6-1.6H5.6zm7.467 14.133H5.6a.8.8 0 00-.8.8V26.4a.8.8 0 00.8.8h7.467a.8.8 0 00.8-.8v-7.467a.8.8 0 00-.8-.8zm-7.467-.8a1.6 1.6 0 00-1.6 1.6V26.4A1.6 1.6 0 005.6 28h7.467a1.6 1.6 0 001.6-1.6v-7.467a1.6 1.6 0 00-1.6-1.6H5.6zM26.4 4.8h-7.466a.8.8 0 00-.8.8v7.467a.8.8 0 00.8.8H26.4a.8.8 0 00.8-.8V5.6a.8.8 0 00-.8-.8zM18.934 4a1.6 1.6 0 00-1.6 1.6v7.467a1.6 1.6 0 001.6 1.6H26.4a1.6 1.6 0 001.6-1.6V5.6A1.6 1.6 0 0026.4 4h-7.466zM26.4 18.133h-7.466a.8.8 0 00-.8.8V26.4a.8.8 0 00.8.8H26.4a.8.8 0 00.8-.8v-7.467a.8.8 0 00-.8-.8zm-7.466-.8a1.6 1.6 0 00-1.6 1.6V26.4a1.6 1.6 0 001.6 1.6H26.4a1.6 1.6 0 001.6-1.6v-7.467a1.6 1.6 0 00-1.6-1.6h-7.466z" fill="#333"/></svg>
                        </div>
                        {{-- <div data-id="#list-view" data-value="list-view" class="cursor-pointer view view-icon list-icon {{ Request::get('view') == 'grid-view' ? 'selected' : (array_key_exists('view', $_GET) ? '' : 'selected') }}"> --}}
                         <div data-id="#grid-view" data-value="list-view" class="cursor-pointer view view-icon list-icon 
                         {{ $view == 'list-view' ? 'selected' : '' }}"> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none">
                                <path
                                  d="M3.165 5.6a1.1 1.1 0 011.1-1.1H27.73a1.1 1.1 0 011.1 1.1v2.133a1.1 1.1 0 01-1.1 1.1H4.265a1.1 1.1 0 01-1.1-1.1V5.6zm0 9.333a1.1 1.1 0 011.1-1.1H27.73a1.1 1.1 0 011.1 1.1v2.134a1.1 1.1 0 01-1.1 1.1H4.265a1.1 1.1 0 01-1.1-1.1v-2.134zm0 9.334a1.1 1.1 0 011.1-1.1H27.73a1.1 1.1 0 011.1 1.1V26.4a1.1 1.1 0 01-1.1 1.1H4.265a1.1 1.1 0 01-1.1-1.1v-2.133z"
                                  stroke="#333" />
                              </svg>
                          
                        </div>
                    </div>
                </li>
            </ul>
            <div>
                <div component-name="product-listing-search-title"
                    class="flex items-center flex-start flex-wrap mt-5">
                    <ul class="flex items-center justify-start w-fit plst-lists flex-wrap">
                        {{-- @if (count($selected_categories) > 0)
                            @foreach ($selected_categories as $selected_sub_category)
                                @php
                                    $selected_sub = App\Models\SubCategory::where('id', $selected_sub_category)
                                        ->where('is_published', true)
                                        ->first();
                                @endphp
                                <li
                                    class="flex items-center justify-start px-5 py-2 mb-2 mr-5 plst-list-item me-body18">
                                    {{ langbind($selected_sub, 'name') }}
                                    <button class="plst-close-btn ml-3 custom-close"
                                        data-checkbox="sub-category-{{ $selected_sub_category }}"><svg width="18"
                                            height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.7257 4.2812C13.6563 4.21168 13.5739 4.15651 13.4831 4.11888C13.3924 4.08124 13.2951 4.06187 13.1969 4.06187C13.0987 4.06187 13.0014 4.08124 12.9107 4.11888C12.82 4.15651 12.7375 4.21168 12.6682 4.2812L9.00066 7.9412L5.33316 4.2737C5.26372 4.20427 5.18129 4.14919 5.09056 4.11161C4.99984 4.07403 4.9026 4.05469 4.80441 4.05469C4.70621 4.05469 4.60897 4.07403 4.51825 4.11161C4.42753 4.14919 4.34509 4.20427 4.27566 4.2737C4.20622 4.34314 4.15114 4.42557 4.11356 4.5163C4.07598 4.60702 4.05664 4.70426 4.05664 4.80245C4.05664 4.90065 4.07598 4.99789 4.11356 5.08861C4.15114 5.17933 4.20622 5.26177 4.27566 5.3312L7.94316 8.9987L4.27566 12.6662C4.20622 12.7356 4.15114 12.8181 4.11356 12.9088C4.07598 12.9995 4.05664 13.0968 4.05664 13.195C4.05664 13.2931 4.07598 13.3904 4.11356 13.4811C4.15114 13.5718 4.20622 13.6543 4.27566 13.7237C4.34509 13.7931 4.42753 13.8482 4.51825 13.8858C4.60897 13.9234 4.70621 13.9427 4.80441 13.9427C4.9026 13.9427 4.99984 13.9234 5.09056 13.8858C5.18129 13.8482 5.26372 13.7931 5.33316 13.7237L9.00066 10.0562L12.6682 13.7237C12.7376 13.7931 12.82 13.8482 12.9107 13.8858C13.0015 13.9234 13.0987 13.9427 13.1969 13.9427C13.2951 13.9427 13.3923 13.9234 13.4831 13.8858C13.5738 13.8482 13.6562 13.7931 13.7257 13.7237C13.7951 13.6543 13.8502 13.5718 13.8878 13.4811C13.9253 13.3904 13.9447 13.2931 13.9447 13.195C13.9447 13.0968 13.9253 12.9995 13.8878 12.9088C13.8502 12.8181 13.7951 12.7356 13.7257 12.6662L10.0582 8.9987L13.7257 5.3312C14.0107 5.0462 14.0107 4.5662 13.7257 4.2812Z"
                                                fill="#333333" />
                                        </svg>
                                    </button>
                                </li>
                            @endforeach

                        @endif --}}
                        {{-- @if (count($selected_merchants) > 0)
                            @foreach ($selected_merchants as $selected_merchant)
                                @php
                                    $selected_brand = App\Models\User::where('id', $selected_merchant)
                                        ->where('is_merchant', true)
                                        ->first();
                                @endphp
                                <li
                                    class="flex items-center justify-start px-5 py-2 mb-2 mr-5 plst-list-item me-body18">
                                    {{ langbind($selected_brand, 'name') }}
                                    <button class="plst-close-btn ml-3 custom-close"
                                        data-checkbox="merchant-{{ $selected_merchant }}"><svg width="18"
                                            height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.7257 4.2812C13.6563 4.21168 13.5739 4.15651 13.4831 4.11888C13.3924 4.08124 13.2951 4.06187 13.1969 4.06187C13.0987 4.06187 13.0014 4.08124 12.9107 4.11888C12.82 4.15651 12.7375 4.21168 12.6682 4.2812L9.00066 7.9412L5.33316 4.2737C5.26372 4.20427 5.18129 4.14919 5.09056 4.11161C4.99984 4.07403 4.9026 4.05469 4.80441 4.05469C4.70621 4.05469 4.60897 4.07403 4.51825 4.11161C4.42753 4.14919 4.34509 4.20427 4.27566 4.2737C4.20622 4.34314 4.15114 4.42557 4.11356 4.5163C4.07598 4.60702 4.05664 4.70426 4.05664 4.80245C4.05664 4.90065 4.07598 4.99789 4.11356 5.08861C4.15114 5.17933 4.20622 5.26177 4.27566 5.3312L7.94316 8.9987L4.27566 12.6662C4.20622 12.7356 4.15114 12.8181 4.11356 12.9088C4.07598 12.9995 4.05664 13.0968 4.05664 13.195C4.05664 13.2931 4.07598 13.3904 4.11356 13.4811C4.15114 13.5718 4.20622 13.6543 4.27566 13.7237C4.34509 13.7931 4.42753 13.8482 4.51825 13.8858C4.60897 13.9234 4.70621 13.9427 4.80441 13.9427C4.9026 13.9427 4.99984 13.9234 5.09056 13.8858C5.18129 13.8482 5.26372 13.7931 5.33316 13.7237L9.00066 10.0562L12.6682 13.7237C12.7376 13.7931 12.82 13.8482 12.9107 13.8858C13.0015 13.9234 13.0987 13.9427 13.1969 13.9427C13.2951 13.9427 13.3923 13.9234 13.4831 13.8858C13.5738 13.8482 13.6562 13.7931 13.7257 13.7237C13.7951 13.6543 13.8502 13.5718 13.8878 13.4811C13.9253 13.3904 13.9447 13.2931 13.9447 13.195C13.9447 13.0968 13.9253 12.9995 13.8878 12.9088C13.8502 12.8181 13.7951 12.7356 13.7257 12.6662L10.0582 8.9987L13.7257 5.3312C14.0107 5.0462 14.0107 4.5662 13.7257 4.2812Z"
                                                fill="#333333" />
                                        </svg>
                                    </button>
                                </li>
                            @endforeach

                        @endif --}}
                        @if (count($selected_price_tags) > 0)
                            @foreach ($selected_price_tags as $selected_price_tag)
                                @php
                                    $selected_price = App\Models\PriceTag::where('id', $selected_price_tag)
                                        ->where('is_published', true)
                                        ->first();
                                @endphp
                                <li
                                    class="flex items-center justify-start px-5 py-2 mb-2 mr-5 plst-list-item me-body18">
                                    {{ langbind($selected_price, 'name') }}
                                    <button class="plst-close-btn ml-3 price-tag-btn custom-close"
                                        data-checkbox="price-tag-{{ $selected_price_tag }}"><svg width="18"
                                            height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.7257 4.2812C13.6563 4.21168 13.5739 4.15651 13.4831 4.11888C13.3924 4.08124 13.2951 4.06187 13.1969 4.06187C13.0987 4.06187 13.0014 4.08124 12.9107 4.11888C12.82 4.15651 12.7375 4.21168 12.6682 4.2812L9.00066 7.9412L5.33316 4.2737C5.26372 4.20427 5.18129 4.14919 5.09056 4.11161C4.99984 4.07403 4.9026 4.05469 4.80441 4.05469C4.70621 4.05469 4.60897 4.07403 4.51825 4.11161C4.42753 4.14919 4.34509 4.20427 4.27566 4.2737C4.20622 4.34314 4.15114 4.42557 4.11356 4.5163C4.07598 4.60702 4.05664 4.70426 4.05664 4.80245C4.05664 4.90065 4.07598 4.99789 4.11356 5.08861C4.15114 5.17933 4.20622 5.26177 4.27566 5.3312L7.94316 8.9987L4.27566 12.6662C4.20622 12.7356 4.15114 12.8181 4.11356 12.9088C4.07598 12.9995 4.05664 13.0968 4.05664 13.195C4.05664 13.2931 4.07598 13.3904 4.11356 13.4811C4.15114 13.5718 4.20622 13.6543 4.27566 13.7237C4.34509 13.7931 4.42753 13.8482 4.51825 13.8858C4.60897 13.9234 4.70621 13.9427 4.80441 13.9427C4.9026 13.9427 4.99984 13.9234 5.09056 13.8858C5.18129 13.8482 5.26372 13.7931 5.33316 13.7237L9.00066 10.0562L12.6682 13.7237C12.7376 13.7931 12.82 13.8482 12.9107 13.8858C13.0015 13.9234 13.0987 13.9427 13.1969 13.9427C13.2951 13.9427 13.3923 13.9234 13.4831 13.8858C13.5738 13.8482 13.6562 13.7931 13.7257 13.7237C13.7951 13.6543 13.8502 13.5718 13.8878 13.4811C13.9253 13.3904 13.9447 13.2931 13.9447 13.195C13.9447 13.0968 13.9253 12.9995 13.8878 12.9088C13.8502 12.8181 13.7951 12.7356 13.7257 12.6662L10.0582 8.9987L13.7257 5.3312C14.0107 5.0462 14.0107 4.5662 13.7257 4.2812Z"
                                                fill="#333333" />
                                        </svg>
                                    </button>
                                </li>
                            @endforeach

                        @endif
                        @if (count($selected_time_slot_tags) > 0)
                            @foreach ($selected_time_slot_tags as $selected_time_slot_tag)
                                @php
                                    $selected_time_slot = App\Models\TimeSlotTag::where('id', $selected_time_slot_tag)
                                        ->where('is_published', true)
                                        ->first();
                                @endphp
                                <li
                                    class="flex items-center justify-start px-5 py-2 mb-2 mr-5 plst-list-item me-body18">
                                    {{ langbind($selected_time_slot, 'name') }}
                                    <button class="plst-close-btn ml-3 custom-close"
                                        data-checkbox="time-slot-tag-{{ $selected_time_slot_tag }}"><svg width="18"
                                            height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.7257 4.2812C13.6563 4.21168 13.5739 4.15651 13.4831 4.11888C13.3924 4.08124 13.2951 4.06187 13.1969 4.06187C13.0987 4.06187 13.0014 4.08124 12.9107 4.11888C12.82 4.15651 12.7375 4.21168 12.6682 4.2812L9.00066 7.9412L5.33316 4.2737C5.26372 4.20427 5.18129 4.14919 5.09056 4.11161C4.99984 4.07403 4.9026 4.05469 4.80441 4.05469C4.70621 4.05469 4.60897 4.07403 4.51825 4.11161C4.42753 4.14919 4.34509 4.20427 4.27566 4.2737C4.20622 4.34314 4.15114 4.42557 4.11356 4.5163C4.07598 4.60702 4.05664 4.70426 4.05664 4.80245C4.05664 4.90065 4.07598 4.99789 4.11356 5.08861C4.15114 5.17933 4.20622 5.26177 4.27566 5.3312L7.94316 8.9987L4.27566 12.6662C4.20622 12.7356 4.15114 12.8181 4.11356 12.9088C4.07598 12.9995 4.05664 13.0968 4.05664 13.195C4.05664 13.2931 4.07598 13.3904 4.11356 13.4811C4.15114 13.5718 4.20622 13.6543 4.27566 13.7237C4.34509 13.7931 4.42753 13.8482 4.51825 13.8858C4.60897 13.9234 4.70621 13.9427 4.80441 13.9427C4.9026 13.9427 4.99984 13.9234 5.09056 13.8858C5.18129 13.8482 5.26372 13.7931 5.33316 13.7237L9.00066 10.0562L12.6682 13.7237C12.7376 13.7931 12.82 13.8482 12.9107 13.8858C13.0015 13.9234 13.0987 13.9427 13.1969 13.9427C13.2951 13.9427 13.3923 13.9234 13.4831 13.8858C13.5738 13.8482 13.6562 13.7931 13.7257 13.7237C13.7951 13.6543 13.8502 13.5718 13.8878 13.4811C13.9253 13.3904 13.9447 13.2931 13.9447 13.195C13.9447 13.0968 13.9253 12.9995 13.8878 12.9088C13.8502 12.8181 13.7951 12.7356 13.7257 12.6662L10.0582 8.9987L13.7257 5.3312C14.0107 5.0462 14.0107 4.5662 13.7257 4.2812Z"
                                                fill="#333333" />
                                        </svg>
                                    </button>
                                </li>
                            @endforeach

                        @endif

                        {{-- @if (count($selected_key_items) > 0)
                            @foreach ($selected_key_items as $selected_key_item)
                                @php
                                    $selected_item = App\Models\CheckUpGroup::where('id', $selected_key_item)
                                        ->where('is_published', true)
                                        ->first();
                                @endphp
                                <li
                                    class="flex items-center justify-start px-5 py-2 mb-2 mr-5 plst-list-item me-body18">
                                    {{ langbind($selected_item, 'name') }}
                                    <button class="plst-close-btn ml-3 custom-close"
                                        data-checkbox="key-item-{{ $selected_key_item }}"><svg width="18"
                                            height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.7257 4.2812C13.6563 4.21168 13.5739 4.15651 13.4831 4.11888C13.3924 4.08124 13.2951 4.06187 13.1969 4.06187C13.0987 4.06187 13.0014 4.08124 12.9107 4.11888C12.82 4.15651 12.7375 4.21168 12.6682 4.2812L9.00066 7.9412L5.33316 4.2737C5.26372 4.20427 5.18129 4.14919 5.09056 4.11161C4.99984 4.07403 4.9026 4.05469 4.80441 4.05469C4.70621 4.05469 4.60897 4.07403 4.51825 4.11161C4.42753 4.14919 4.34509 4.20427 4.27566 4.2737C4.20622 4.34314 4.15114 4.42557 4.11356 4.5163C4.07598 4.60702 4.05664 4.70426 4.05664 4.80245C4.05664 4.90065 4.07598 4.99789 4.11356 5.08861C4.15114 5.17933 4.20622 5.26177 4.27566 5.3312L7.94316 8.9987L4.27566 12.6662C4.20622 12.7356 4.15114 12.8181 4.11356 12.9088C4.07598 12.9995 4.05664 13.0968 4.05664 13.195C4.05664 13.2931 4.07598 13.3904 4.11356 13.4811C4.15114 13.5718 4.20622 13.6543 4.27566 13.7237C4.34509 13.7931 4.42753 13.8482 4.51825 13.8858C4.60897 13.9234 4.70621 13.9427 4.80441 13.9427C4.9026 13.9427 4.99984 13.9234 5.09056 13.8858C5.18129 13.8482 5.26372 13.7931 5.33316 13.7237L9.00066 10.0562L12.6682 13.7237C12.7376 13.7931 12.82 13.8482 12.9107 13.8858C13.0015 13.9234 13.0987 13.9427 13.1969 13.9427C13.2951 13.9427 13.3923 13.9234 13.4831 13.8858C13.5738 13.8482 13.6562 13.7931 13.7257 13.7237C13.7951 13.6543 13.8502 13.5718 13.8878 13.4811C13.9253 13.3904 13.9447 13.2931 13.9447 13.195C13.9447 13.0968 13.9253 12.9995 13.8878 12.9088C13.8502 12.8181 13.7951 12.7356 13.7257 12.6662L10.0582 8.9987L13.7257 5.3312C14.0107 5.0462 14.0107 4.5662 13.7257 4.2812Z"
                                                fill="#333333" />
                                        </svg>
                                    </button>
                                </li>
                            @endforeach

                        @endif --}}
                        @if (count($selected_key_items) > 0)
                        @foreach ($selected_key_items as $selected_key_item)
                            @php
                                $selected_key_item = App\Models\KeyItemTag::where('id', $selected_key_item)
                                    ->where('is_published', true)
                                    ->first();
                            @endphp
                            <li
                                class="flex items-center justify-start px-5 py-2 mb-2 mr-5 plst-list-item me-body18">
                                {{ langbind($selected_key_item, 'name') }}
                                <button class="plst-close-btn ml-3 custom-close"
                                    data-checkbox="product-highlight-tag-{{ $selected_key_item }}"><svg
                                        width="18" height="18" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.7257 4.2812C13.6563 4.21168 13.5739 4.15651 13.4831 4.11888C13.3924 4.08124 13.2951 4.06187 13.1969 4.06187C13.0987 4.06187 13.0014 4.08124 12.9107 4.11888C12.82 4.15651 12.7375 4.21168 12.6682 4.2812L9.00066 7.9412L5.33316 4.2737C5.26372 4.20427 5.18129 4.14919 5.09056 4.11161C4.99984 4.07403 4.9026 4.05469 4.80441 4.05469C4.70621 4.05469 4.60897 4.07403 4.51825 4.11161C4.42753 4.14919 4.34509 4.20427 4.27566 4.2737C4.20622 4.34314 4.15114 4.42557 4.11356 4.5163C4.07598 4.60702 4.05664 4.70426 4.05664 4.80245C4.05664 4.90065 4.07598 4.99789 4.11356 5.08861C4.15114 5.17933 4.20622 5.26177 4.27566 5.3312L7.94316 8.9987L4.27566 12.6662C4.20622 12.7356 4.15114 12.8181 4.11356 12.9088C4.07598 12.9995 4.05664 13.0968 4.05664 13.195C4.05664 13.2931 4.07598 13.3904 4.11356 13.4811C4.15114 13.5718 4.20622 13.6543 4.27566 13.7237C4.34509 13.7931 4.42753 13.8482 4.51825 13.8858C4.60897 13.9234 4.70621 13.9427 4.80441 13.9427C4.9026 13.9427 4.99984 13.9234 5.09056 13.8858C5.18129 13.8482 5.26372 13.7931 5.33316 13.7237L9.00066 10.0562L12.6682 13.7237C12.7376 13.7931 12.82 13.8482 12.9107 13.8858C13.0015 13.9234 13.0987 13.9427 13.1969 13.9427C13.2951 13.9427 13.3923 13.9234 13.4831 13.8858C13.5738 13.8482 13.6562 13.7931 13.7257 13.7237C13.7951 13.6543 13.8502 13.5718 13.8878 13.4811C13.9253 13.3904 13.9447 13.2931 13.9447 13.195C13.9447 13.0968 13.9253 12.9995 13.8878 12.9088C13.8502 12.8181 13.7951 12.7356 13.7257 12.6662L10.0582 8.9987L13.7257 5.3312C14.0107 5.0462 14.0107 4.5662 13.7257 4.2812Z"
                                            fill="#333333" />
                                    </svg>
                                </button>
                            </li>
                        @endforeach

                    @endif

                        @if (count($selected_product_highlight_tags) > 0)
                            @foreach ($selected_product_highlight_tags as $selected_product_highlight_tag)
                                @php
                                    $selected_product_highlight = App\Models\HighlightTag::where('id', $selected_product_highlight_tag)
                                        ->where('is_published', true)
                                        ->first();
                                @endphp
                                <li
                                    class="flex items-center justify-start px-5 py-2 mb-2 mr-5 plst-list-item me-body18">
                                    {{ langbind($selected_product_highlight, 'name') }}
                                    <button class="plst-close-btn ml-3 custom-close"
                                        data-checkbox="product-highlight-tag-{{ $selected_product_highlight_tag }}"><svg
                                            width="18" height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.7257 4.2812C13.6563 4.21168 13.5739 4.15651 13.4831 4.11888C13.3924 4.08124 13.2951 4.06187 13.1969 4.06187C13.0987 4.06187 13.0014 4.08124 12.9107 4.11888C12.82 4.15651 12.7375 4.21168 12.6682 4.2812L9.00066 7.9412L5.33316 4.2737C5.26372 4.20427 5.18129 4.14919 5.09056 4.11161C4.99984 4.07403 4.9026 4.05469 4.80441 4.05469C4.70621 4.05469 4.60897 4.07403 4.51825 4.11161C4.42753 4.14919 4.34509 4.20427 4.27566 4.2737C4.20622 4.34314 4.15114 4.42557 4.11356 4.5163C4.07598 4.60702 4.05664 4.70426 4.05664 4.80245C4.05664 4.90065 4.07598 4.99789 4.11356 5.08861C4.15114 5.17933 4.20622 5.26177 4.27566 5.3312L7.94316 8.9987L4.27566 12.6662C4.20622 12.7356 4.15114 12.8181 4.11356 12.9088C4.07598 12.9995 4.05664 13.0968 4.05664 13.195C4.05664 13.2931 4.07598 13.3904 4.11356 13.4811C4.15114 13.5718 4.20622 13.6543 4.27566 13.7237C4.34509 13.7931 4.42753 13.8482 4.51825 13.8858C4.60897 13.9234 4.70621 13.9427 4.80441 13.9427C4.9026 13.9427 4.99984 13.9234 5.09056 13.8858C5.18129 13.8482 5.26372 13.7931 5.33316 13.7237L9.00066 10.0562L12.6682 13.7237C12.7376 13.7931 12.82 13.8482 12.9107 13.8858C13.0015 13.9234 13.0987 13.9427 13.1969 13.9427C13.2951 13.9427 13.3923 13.9234 13.4831 13.8858C13.5738 13.8482 13.6562 13.7931 13.7257 13.7237C13.7951 13.6543 13.8502 13.5718 13.8878 13.4811C13.9253 13.3904 13.9447 13.2931 13.9447 13.195C13.9447 13.0968 13.9253 12.9995 13.8878 12.9088C13.8502 12.8181 13.7951 12.7356 13.7257 12.6662L10.0582 8.9987L13.7257 5.3312C14.0107 5.0462 14.0107 4.5662 13.7257 4.2812Z"
                                                fill="#333333" />
                                        </svg>
                                    </button>
                                </li>
                            @endforeach

                        @endif

                    </ul>
                    @if (count($countFilters) > 0)
                        <button
                            class="clear-btn helvetica-normal me-body18 text-darkgray underline mx-5 my-2">@lang('labels.basic_info.clear')</button>
                    @endif
                </div>
            </div>
            <div id="grid-view"
            class="mt-10 views py-1 px-2 {{ Request::get('view') == 'list-view' ? 'hidden' : (array_key_exists('view', $_GET) ? '' : 'hidden') }} ">
            {{-- <div id="grid-view"
            class="mt-10 views py-1 px-2"> --}}
                <div class="product-cards ">
                    
                    {{-- @foreach ($products as $key => $product) --}}
                        {{-- @include('frontend.product_listings.product-list-view-card') --}}
                        {{-- @include('frontend.product-modal') --}}
                       
                    {{-- @endforeach --}}
                </div>
            </div>
            <div id="list-view" class="mt-10 views {{ Request::get('view') == 'grid-view' ? 'hidden' : '' }} " >
                {{-- <div id="list-view" class="mt-10 views" > --}}
                <div class="recommend grid-fix">
                    
                    {{-- @foreach ($products as $key => $product)
                        @include('frontend.product_listings.product-grid-view')
                    @endforeach --}}
                </div>
                <div class="popular grid-fix hidden">
                   
                    {{-- @foreach ($products as $key => $product)
                        @include('frontend.product_listings.product-grid-view')
                    @endforeach --}}
                </div>
                <div class="low-price grid-fix hidden">
                    
                    {{-- @foreach ($products as $key => $product)
                        @include('frontend.product_listings.product-grid-view')
                    @endforeach --}}
                </div>
            </div>
        </div>
        <div id="loading" class="h-screen mx-auto pt-[100px] hidden">
            <img id="loading-image" src="{{ asset('frontend/img/preloader.gif') }}" alt="Loading..." />
        </div>
        {!! $products->appends([])->links('frontend.pagination')->render() !!}
</section>

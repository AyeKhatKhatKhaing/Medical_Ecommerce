    <div component-name="product-listing-tab-mobile" class="product-listing-tab-mobile mt-5 xl:hidden block mb-2">
        <div class="mr-5 filter-icon hidden lg:flex items-center desktop-view">
            <img src="{{ asset('frontend/img/m-filter-icon.svg') }}" alt="filter-product-icon" class="mr-2" />
            <p class="font-normal me-body12 text-darkgray">Filter</p>
        </div>
        <div class="pltmobile-filter-section flex lg:hidden items-center justify-start mobile-view">
            <div class="result-panel" id="products_count">
                @if (app()->getLocale() == 'en')
                    <p class="helvetica results">
                        @if ($products->total() != 0)
                            <span id="p_total">{{ $products->total() }}</span>
                            {{ $products->total() <= 1 ? 'Product' : 'Products' }}
                            Found
                        @else
                            No product found
                        @endif

                    </p>
                @elseif (app()->getLocale() == 'zh-hk')
                    <p class="helvetica results">
                        @if ($products->total() != 0)
                            找到 <span id="p_total"> {{ $products->total() }} </span>
                            {{ $products->total() == 1 ? '產品' : '個產品' }}
                        @else
                            未找到相關產品
                        @endif
                    </p>
                @elseif (app()->getLocale() == 'zh-cn')
                    <p class="helvetica results">
                        @if ($products->total() != 0)
                            找到 <span id="p_total">{{ $products->total() }}</span>
                            {{ $products->total() == 1 ? '產品' : '个产品' }}
                        @else
                            未找到相关产品
                        @endif
                    </p>
                @endif
            </div>
            <div class="ml-auto flex items-center justify-center filter-right-icon">
                <div class="mr-5 last:mr-0 filter-icon flex flex-col justify-center items-center">
                    <img src="{{ asset('frontend/img/m-filter-icon.svg') }}" alt="filter-product-icon" />
                    <p class="font-normal me-body12 text-darkgray">@lang('labels.product.filter')</p>
                </div>
                <div class="mr-5 sort-btn last:mr-0 flex flex-col justify-center items-center">
                    <img src="{{ asset('frontend/img/m-sort-icon.svg') }}" alt="sort icon" />
                    <p class="font-normal me-body12 text-darkgray">@lang('labels.product.sort')</p>
                </div>
                <div class="mr-5 last:mr-0 flex flex-col justify-center items-center">
                    {{-- <div class="product-lists-view flex items-center justify-center">
                            <div data-id="#grid-view" data-value="list-view"
                                class="cursor-pointer m-view view-icon selected grid-icon">
                                <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2.33228 2.8C2.33228 2.63431 2.46659 2.5 2.63228 2.5H14.3656C14.5313 2.5 14.6656 2.63431 14.6656 2.8V3.86667C14.6656 4.03235 14.5313 4.16667 14.3656 4.16667H2.63227C2.46659 4.16667 2.33228 4.03235 2.33228 3.86667V2.8ZM2.33228 7.46667C2.33228 7.30098 2.46659 7.16667 2.63228 7.16667H14.3656C14.5313 7.16667 14.6656 7.30098 14.6656 7.46667V8.53333C14.6656 8.69902 14.5313 8.83333 14.3656 8.83333H2.63227C2.46659 8.83333 2.33228 8.69902 2.33228 8.53333V7.46667ZM2.33228 12.1333C2.33228 11.9676 2.46659 11.8333 2.63228 11.8333H14.3656C14.5313 11.8333 14.6656 11.9676 14.6656 12.1333V13.2C14.6656 13.3657 14.5313 13.5 14.3656 13.5H2.63227C2.46659 13.5 2.33228 13.3657 2.33228 13.2V12.1333Z"
                                        stroke="#333333" />
                                </svg>
                                <p class="font-normal me-body12 text-darkgray">List</p>
                            </div>
                            <div data-id="#list-view" data-value="grid-view"
                                class="cursor-pointer m-view view-icon list-icon">
                                <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
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
                        </div> --}}
                    <div class="product-lists-view flex items-center justify-center">
                        <div data-id="#list-view" data-value="list-view"
                            class="cursor-pointer view-icon grid-icon m-view {{ Request::get('view') == 'list-view' ? 'selected' : '' }}">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
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
                            <p class="font-normal me-body12 text-darkgray">@lang('labels.product.grid')</p>
                        </div>
                        <div data-id="#grid-view" data-value="grid-view"
                            class="cursor-pointer view-icon list-icon m-view {{ Request::get('view') == 'grid-view' ? 'selected' : (array_key_exists('view', $_GET) ? '' : 'selected') }}">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M2.33228 2.8C2.33228 2.63431 2.46659 2.5 2.63228 2.5H14.3656C14.5313 2.5 14.6656 2.63431 14.6656 2.8V3.86667C14.6656 4.03235 14.5313 4.16667 14.3656 4.16667H2.63227C2.46659 4.16667 2.33228 4.03235 2.33228 3.86667V2.8ZM2.33228 7.46667C2.33228 7.30098 2.46659 7.16667 2.63228 7.16667H14.3656C14.5313 7.16667 14.6656 7.30098 14.6656 7.46667V8.53333C14.6656 8.69902 14.5313 8.83333 14.3656 8.83333H2.63227C2.46659 8.83333 2.33228 8.69902 2.33228 8.53333V7.46667ZM2.33228 12.1333C2.33228 11.9676 2.46659 11.8333 2.63228 11.8333H14.3656C14.5313 11.8333 14.6656 11.9676 14.6656 12.1333V13.2C14.6656 13.3657 14.5313 13.5 14.3656 13.5H2.63227C2.46659 13.5 2.33228 13.3657 2.33228 13.2V12.1333Z"
                                    stroke="#333333" />
                            </svg>


                            <p class="font-normal me-body12 text-darkgray">@lang('labels.product.list')</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="side-bar-filter">
        <div class="product-sidebar-content xl:block hidden">
            <div class="mobile-product-sidebar-wrapper">
                <div class="mobile-inner-product-sidebar-wrapper">
                <div class="best-choices">
                    <h2 class="sr-only">Best choices</h2>
    
                    <ul class="">
                        @if (count($price_tags) > 0)
                            @foreach ($price_tags as $key => $price_tag)
                                    <li class="custom-checkbox-wrapper mb-3 last:mb-0">
                                        <label for="price-tag-{{ $price_tag->id }}"
                                            class="custom-checkbox-label flex items-center me-body18">
                                            <input type="checkbox" name="choices" id="price-tag-{{ $price_tag->id }}"
                                                class="price-tag-checkbox" value="{{ $price_tag->id }}"
                                                {{ in_array($price_tag->id, $selected_price_tags) ? 'checked' : '' }}>
                                            <span class="custom-checkbox-left"></span>
                                            <span class="ml-7 mr-1"><img
                                                    src="{{ isset($price_tag->img) ? $price_tag->img : asset('frontend/img/best-price.svg') }}"
                                                    alt=""></span>
                                            <div>
                                                {{ langbind($price_tag, 'name') }}@if($price_tag->item_count != 0) 
                                                <span class="me-body16 text-lightgray"
                                                    id="price_tag_search_result_{{ $price_tag->id }}">({{ $price_tag->item_count }})</span>@endif
                                            </div>
                                        </label>
                                    </li>
                            @endforeach
                        @endif
    
                       
                            @foreach ($time_slot_tags_side_bar as $key => $time_slot_tag)
                             
                                    <li class="custom-checkbox-wrapper mb-3 last:mb-0">
                                        <label for="time-slot-tag-{{ $time_slot_tag->id }}"
                                            class="custom-checkbox-label flex items-center me-body18">
                                            <input type="checkbox" name="choices"
                                                id="time-slot-tag-{{ $time_slot_tag->id }}" class="time-slot-checkbox"
                                                value="{{ $time_slot_tag->id }}"
                                                {{ in_array($time_slot_tag->id, $selected_time_slot_tags) ? 'checked' : '' }}>
                                            <span class="custom-checkbox-left"></span>
                                            <span class="ml-7 mr-1"><img
                                                    src="{{ isset($time_slot_tag->img) ? $time_slot_tag->img : asset('frontend/img/best-price.svg') }}"
                                                    alt=""></span>
                                            <div>{{ langbind($time_slot_tag, 'name') }}@if($time_slot_tag->item_count != 0) 
                                                <span class="text-lightgray me-body16"
                                                    id="time_slot_tag_search_result_{{ $time_slot_tag->id }}">({{ $time_slot_tag->item_count }})</span>@endif
                                            </div>
                                        </label>
                                    </li>
                               
                            @endforeach
                       
    
                    </ul>
    
                </div>
                <hr class="w-full my-5 border-mee4">

                <div class="key-item accordion-container active">
                    <div class="sidebar-sub-heading accordion-header flex items-center justify-between mb-5">
                        <h2 class="font-bold me-body23">@lang('labels.product.key_item')</h2>
                        <button role="button" class="accordion-collapse-btn">
                            <img src="{{ asset('frontend/img/up-arrow.png') }}" alt=""
                                class="w-auto h-auto align-middle" class="accordion-collapse-icon">
                        </button>
                    </div>
    
                    <div class="accordion-body overflow-y-hidden">
    
                        <ul class="capitalize">
                            @if (count($product_key_item_tags) > 0)
                                @foreach ($product_key_item_tags as $key => $key_item)
                                    @if ($key_item->item_count > 0)
                                        <li class="custom-checkbox-wrapper mb-3 last:mb-0">
                                            <label for="key-item-{{ $key_item->id }}"
                                                class="custom-checkbox-label flex items-center me-body18">
                                                <input type="checkbox" name="undefined"
                                                    id="key-item-{{ $key_item->id }}" class="key-item-checkbox"
                                                    value="{{ $key_item->id }}"
                                                    {{ in_array($key_item->id, $selected_key_items) ? 'checked' : '' }}>
                                                <span class="custom-checkbox-left"></span>
                                                <span class="ml-7 mr-1 block items-center">
                                                    {{ langbind($key_item, 'name') }}@if($key_item->item_count != 0)  <span
                                                        class="me-body16 text-lightgray ml-3"
                                                        id="key_item_tag_search_result_{{ $key_item->id }}">({{ $key_item->item_count }})</span>@endif
                                                </span>
    
                                            </label>
                                        </li>
                                    @endif
                                   
                                @endforeach
                            @endif
                        </ul>
    
    
                        <div class="see-section sidebar-seemore flex items-center justify-end mt-5 hidden">
                            <button role="button"
                                class="seeall-btn me-body16 underline hover:text-orangeMediq transition-colors">
                                @lang('labels.product.show_all')
                            </button>
                        </div>
                        <div class="see-section sidebar-seeless flex items-center justify-end mt-5 hidden">
                            <button role="button"
                                class="seeless-btn me-body16 underline hover:text-orangeMediq transition-colors">
                                @lang('labels.product.show_less')
                            </button>
                        </div>
                    </div>
    
                </div>
                <hr class="w-full my-5 border-mee4">
               
                <div class="key-item accordion-container active">
                    <div class="sidebar-sub-heading accordion-header flex items-center justify-between mb-5">
                        <h2 class="font-bold me-body23">@lang('labels.product.product_highlight')</h2>
                        <button role="button" class="accordion-collapse-btn">
                            <img src="{{ asset('frontend/img/up-arrow.png') }}" alt=""
                                class="w-auto h-auto align-middle" class="accordion-collapse-icon">
                        </button>
                    </div>
    
                    <div class="accordion-body overflow-y-hidden">
    
                        <ul class="capitalize">
                            {{-- @if (count($product_highlight_tags) > 0) --}}
                                @foreach ($product_highlight_tags as $key => $product_highlight_tag)
                                    @if ($product_highlight_tag->item_count > 0)
                                        <li class="custom-checkbox-wrapper mb-3 last:mb-0">
                                            <label for="product-highlight-tag-{{ $product_highlight_tag->id }}"
                                                class="custom-checkbox-label flex items-center me-body18">
                                                <input type="checkbox" name="undefined"
                                                    id="product-highlight-tag-{{ $product_highlight_tag->id }}"
                                                    class="product-highlight-tag-checkbox"
                                                    value="{{ $product_highlight_tag->id }}"
                                                    {{ in_array($product_highlight_tag->id, $selected_product_highlight_tags) ? 'checked' : '' }}>
                                                <span class="custom-checkbox-left"></span>
                                                <span class="ml-7 mr-1 block items-center">
                                                    {{ langbind($product_highlight_tag, 'name') }}
                                                    @if($product_highlight_tag->item_count != 0) 
                                                    <span class="me-body16 text-lightgray ml-3"
                                                        id="product_highlight_tag_search_result_{{ $product_highlight_tag->id }}">
                                                        ({{ $product_highlight_tag->item_count }})
                                                    </span>@endif
                                                </span>
    
                                            </label>
                                        </li>
                                    @endif
                                   
                                @endforeach
                               
                            {{-- @endif --}}
                        </ul>
    
    
                        <div class="see-section sidebar-seemore flex items-center justify-end mt-5 hidden">
                            <button role="button"
                                class="seeall-btn me-body16 underline hover:text-orangeMediq transition-colors">
                                @lang('labels.product.show_all')
                            </button>
                        </div>
                        <div class="see-section sidebar-seeless flex items-center justify-end mt-5 hidden">
                            <button role="button"
                                class="seeless-btn me-body16 underline hover:text-orangeMediq transition-colors">
                                @lang('labels.product.show_less')
                            </button>
                        </div>
                    </div>
    
                </div>
               
               </div>
            </div>
        </div>
    </div>

    <div class="product-sort-dropdown relative hidden">
        <div class="psd-inner-card absolute top-0 left-0 w-full bg-whitez blog-shadow">
            <ul class="flex justify-center items-center pltabs pltabs-m">
                <li class="pltabs-list  pltabs-list-m helvetica-normal me-body18 p-[10px] text-center rpl-m cursor-pointer {{ $selected_tab_filter == 'recommend' ? 'active' : '' }}"
                    data-id=".recommend" data-value="recommend">
                    @lang('labels.product.recommended')
                </li>
                <li class="pltabs-list pltabs-list-m  helvetica-normal me-body18 p-[10px] text-center rpl-m cursor-pointer {{ $selected_tab_filter == 'popular' ? 'active' : '' }}"
                    data-id=".popular" data-value="popular">
                    @lang('labels.product.most_popular')
                </li>
                <li class="pltabs-list pltabs-list-m  helvetica-normal me-body18 p-[10px] text-center rpl-m cursor-pointer {{ $selected_tab_filter == 'low-price' ? 'active' : '' }}"
                    data-id=".low-price" data-value="low-price">
                    @lang('labels.product.lowest_price')
                </li>
            </ul>
        </div>
    </div>

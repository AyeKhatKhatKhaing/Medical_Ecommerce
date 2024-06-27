{{-- <div component-name="me-product-detail-menu-tab" class="me-product-detail-menu-tab">
    <ul class="pd-menu-tab-container flex justify-start items-center bg-white">
        <li class="active"><button data-id="overview" class="pd-menu-tab--item py-[14px] px-[20px] helvetica-normal me-body18 text-darkgray">Overview</button></li>
        <li><button data-id="plan-option" class="pd-menu-tab--item py-[14px] px-[20px] helvetica-normal me-body18 text-darkgray">Plan Option</button></li>
        <li><button data-id="plan-detail" class="pd-menu-tab--item py-[14px] px-[20px] helvetica-normal me-body18 text-darkgray">Product Information</button></li>
        <li><button data-id="reviews" class="pd-menu-tab--item py-[14px] px-[20px] helvetica-normal me-body18 text-darkgray">Reviews</button></li>
        <li><button data-id="faq" class="pd-menu-tab--item py-[14px] px-[20px] helvetica-normal me-body18 text-darkgray">FAQ</button></li>
    </ul>
</div> --}}
<div component-name="me-product-detail-breadcrumb" class="me-product-detail-breadcrumb whole-container py-[28px]">
    <ul class="flex flex-wrap justify-start items-center mpd-breadcrumb">

        <li class="helvetica-normal font-normal me-body14 text-darkgray"><a href="#" id="homePage">@lang('labels.home')</a></li>

        <li class="helvetica-normal font-normal me-body14 text-darkgray"><a href="#" id="categoryPage">{{ langbind($selectedCategory,'name') }}</a></li>

        <li class="helvetica-normal font-normal me-body14 text-darkgray">@lang('labels.compare.comparison')</li>

    </ul>
 </div>
 <div class="procomparison-title">
    <div component-name="product-comparison-title" class="pct-container">
        <div class="pt-[18px] pb-5 flex items-center flex-end">
            <button class="ml-auto helvetica-normal text-darkgray rounded-full mr-[10px] last:mr-0 flex items-center justify-center me-share-btn hover:text-blueMediq cfc-share">@lang('labels.compare.share')
                <img src="{{asset('frontend/img/product-detail-share.svg')}}" alt="share icon" class="ml-1 share-icon"></button>
        </div>
        <div class="pb-[32px]">
            @if(count($productList) > 0)
            @if(isset($replyTitle))
            <p class="me-body16 text-center text-darkgray helvetica-normal pb-5">{{$replyTitle}}</p>
            @else
            <p class="me-body16 text-center text-darkgray helvetica-normal pb-5">@lang('labels.compare.detailed_comparison_of_1') {{count($productList)}} {{ count($productList)<=1? __('labels.compare.detailed_comparison_of_3') : __('labels.compare.detailed_comparison_of_2') }}</p>
            <p class="me-body23 text-center text-darkgray helvetica-normal">@lang('labels.compare.which_text1') <span class="font-bold">{{ langbind($selectedCategory,'name')}}</span> @lang('labels.compare.which_text2')</p>
            @endif
            @else
            <p class="me-body16 text-center text-darkgray helvetica-normal pb-5">{{$replyTitle}}</p>
            @endif
        </div>
        </div>
</div>
<div class="outer-div compare-list-section">
    <div class="inner-div">
        <div class="inside-div" id="inside-div">
            <section class="compare-card-section">
                <div component-name="me-compare-four-card" class="pb-[32px]">
                    <div class="flex items-center justify-end four-card-div">
                        @if(count($productList) > 0)
                        @foreach($productList as $productDetails)
                        <div component-name="me-compare-single-card"
                            class="ccs-card w-[270px] 3xl:w-[307px] flex relative">
                            <button class="card-delete-btn btn-remove-product absolute top-[10px] right-[10px] deleteBtn" data-id="{{$productDetails->id}}">
                                <img src="{{asset('frontend/img/ic_round-close.svg')}}" data-id="{{$productDetails->id}}" alt="close icon" class="w-[32px] h-[32px]">
                            </button>
                            <div class="css-card-inner w-[222px] 3xl:w-[267px]">
                                <div class="banner-image">
                                    @if(isset($productDetails->icon))
                                    <img src="{{ $productDetails->icon}}" alt="image"
                                    class="w-[267px] h-[126px] object-cover compare-company-image">
                                    @else
                                    <img src="{{ $productDetails->featured_img}}" alt="image"
                                        class="w-[267px] h-[126px] object-cover compare-company-image">
                                    @endif
                                   
                                </div>
                                <div class="company-content py-5">
                                    <div> @php $name = langbind($productDetails,'name') @endphp
                                        <p class="text-darkgray font-bold me-body18 helvetica-normal text-center cctitle">{{ (strlen($name) > 45) ? substr($name,0,45).'...' : $name }}</p>
                                    </div>
                                    <div class="flex items-baseline justify-center pt-[8px]">
                                        @if($productDetails->discount_price!=null)
                                        <p class="font-bold text-mered me-title26">${{$productDetails->discount_price}}</p>
                                        <p class="text-lightgray me-body14 pl-[10px]">
                                            <span class="linethrough">${{$productDetails->original_price}}</span>
                                        </p>
                                        @else
                                        <p class="font-bold text-mered me-title26">${{$productDetails->original_price}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="">
                                    <a href="{{route('product-detail',['slug'=>$productDetails->slug_en, 'category'=>$productDetails->category->name_en])}}"
                                        class="border-1 border-orangeMediq hover:bg-whitez hover:text-orangeMediq bg-orangeMediq rounded-[6px] w-full text-whitez helvetica-normal font-bold me-body18 flex items-center justify-center md:h-[50px] h-[40px]">
                                    @lang('labels.product_detail.plan_detail')
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        @if(count($productList) < 4)
                        <div component-name="me-compare-plus-card" class="compare-plus-card w-[307px] cursor-pointer flex items-center justify-center" style="height: 394px;">
                            <button class="w-[267px] flex items-center justify-center complus-btn" data-compare-id="add-compare-modal1" id="btn-compare-modal">
                                <img src="{{asset('frontend/img/me-plus.svg')}}" alt="plus icon" class="w-[50px] complus-icon">
                            </button>
                        </div>
                        @endif
                    </div>
                </div>
                <div component-name="product-compare-popup-with-title" class="sticky-compare-bar" >
                    <div class="outer-div">
                      <div class="inner-div">
                        <div class="inside-div">
                          <div class="flex justify-end items-center sticky-div" id="pcpw-container">
                            @if(count($productList) > 0)
                            @foreach($productList as $productDetails)
                            <div component-name="product-compare-single-title-card" class="company-content flex flex-wrap justify-center items-center py-5 sticky-card" style="width: 253.3px;">
                                <div class="w-full mb-[4px]">@php $name = langbind($productDetails,'name') @endphp
                                    <p class="pcstitle text-darkgray font-bold me-body18 helvetica-normal text-center">{{ (strlen($name) > 45) ? substr($name,0,45).'...' : $name }}</p>
                                </div>
                                <div class="price-container flex flex-wrap items-baseline justify-start pt-[8px]">
                                    @if($productDetails->discount_price!=null)
                                    <p class="font-bold text-mered me-title26 price-container--dis">${{$productDetails->discount_price}}</p>
                                    <p class="text-lightgray me-body14 w-full"><span class="linethrough">${{$productDetails->original_price}}</span></p>
                                    @else
                                    <p class="font-bold text-mered me-title26 price-container--dis">${{$productDetails->original_price}}</p>
                                    @endif
                                </div>
                                <div class="plan-detail-section">
                                    <a href="{{route('product-detail',['slug'=>$productDetails->slug_en, 'category'=>$productDetails->category->name_en])}}" class="compare-detail-btn border-1 border-orangeMediq hover:bg-whitez hover:text-orangeMediq bg-orangeMediq rounded-[6px] w-[143px] text-whitez helvetica-normal font-bold me-body18 flex items-center justify-center md:h-[50px] h-[40px]">@lang('labels.product_detail.plan_detail')</a>
                                </div>
                            </div>
                            @endforeach
                            @endif
                            @if(count($productList) < 4)
                            <div component-name="me-compare-plus-card" class="compare-plus-card w-[307px] cursor-pointer flex items-center justify-center" style="height: 226px;">
                                <button class="w-[267px] flex items-center justify-center complus-btn" data-compare-id="add-compare-modal1">
                                    <img src="{{asset('frontend/img/me-plus.svg')}}" alt="plus icon" class="w-[50px] complus-icon">
                                </button>
                            </div>
                            @endif
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </section>
            {{-- <div component-name="me-share-popup" id="me-share-modal"
                class="modal hidden fixed z-[1001] left-0 top-0 w-full h-full bg-black/[.75] flex items-center justify-center">
                <!-- Modal content -->
                <div
                    class="modal-content my-[15%] mx-auto max-w-[90%] xs:max-w-[460px] bg-[#ECF7FF] rounded-[15px] shadow-shadow02 font-primary">
                    <div class="relative rounded-[12px] bg-white">
                        <div class="flex ml-auto w-5 h-5 absolute right-[35px] top-[15px] 7xl:top-[29px] close-item">
                            <span data-id="me-share-modal"
                                class="pb-[4px] absolute left-1/2 top-1/2 -translate-y-1/2 -translate-x-1/2 flex items-center justify-center w-[32px] h-[32px] text-[32px] w-full cursor-pointer text-[#1A1818] focus:no-underline close-share">
                                <img src="./img/ic_round-close.svg" alt="close">
                            </span>
                        </div>
                        <div class="p-[40px]">
                            <h3 class="font-semibold text-center me-body20 text-darkgray pb-5 helvetica-normal">
                                Where would you like to share?
                            </h3>
                            <div class="share-icons flex justify-center flex-wrap items-center">
                                <a class="cursor-pointer">
                                    <img src="./img/ic_baseline-whatsapp.svg" alt="whatsapp">
                                </a>
                                <a class="cursor-pointer">
                                    <img src="./img/me-facebook.svg" alt="facebook">
                                </a>
                                <a class="cursor-pointer">
                                    <img src="./img/telegram.svg" alt="telegram">
                                </a>
                                <a class="cursor-pointer">
                                    <img src="./img/me-wechat.svg" alt="wechat">
                                </a>
                                <a class="cursor-pointer">
                                    <img src="./img/line.svg" alt="line">
                                </a>
                                <a class="cursor-pointer">
                                    <img src="./img/getlink.svg" alt="getlink">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div component-name="me-share-popup" id="me-share-modal" class="modal hidden fixed z-[1001] left-0 top-0 w-full h-full bg-black/[.75] flex items-center justify-center">
                <!-- Modal content -->
                <div class="modal-content my-[15%] mx-auto max-w-[90%] xs:max-w-[460px] bg-[#ECF7FF] rounded-[15px] shadow-shadow02 font-primary">
                    <div class="relative rounded-[12px] bg-white">
                        <div class="flex ml-auto w-5 h-5 absolute right-[35px] top-[15px] 7xl:top-[29px] close-item">
                            <span data-id="me-share-modal"
                                class="pb-[4px] absolute left-1/2 top-1/2 -translate-y-1/2 -translate-x-1/2 flex items-center justify-center w-[32px] h-[32px] text-[32px] w-full cursor-pointer text-[#1A1818] focus:no-underline close-share">
                                <img src="{{ asset('frontend/img/ic_round-close.svg') }}" alt="close" />
                            </span>
                        </div>
                        <div class="p-[40px]">
                            <h3 class="font-semibold text-center me-body20 text-darkgray pb-5 helvetica-normal">
                               @lang('labels.compare.to_share')
                            </h3>
                            @if(count($productList) > 0)
                                @php $i=1; $p1=""; $p2=""; $p3=""; $p4="";@endphp
                                @foreach($productList as $productDetails)
                                    @if($i==1)
                                        @php $p1 = $productDetails->id; @endphp
                                    @endif
                                    @if($i==2)
                                        @php $p2 = $productDetails->id; @endphp
                                    @endif
                                    @if($i==3)
                                        @php $p3 = $productDetails->id; @endphp
                                    @endif
                                    @if($i==4)
                                        @php $p4 = $productDetails->id; @endphp
                                    @endif
                                    @php $i++; @endphp
                                @endforeach
                                @php $url=url(lang()."/compare-product/?p1=".$p1."&p2=".$p2."&p3=".$p3."&p4=".$p4) @endphp
                            @else
                                @php $url=url(lang()."/compare-product/?p1=&p2=&p3=&p4="); @endphp
                            @endif
                            <div class="share-icons flex justify-center flex-wrap items-center">
                                <a href="https://wa.me/?text={{$url}}">
                                    <img src="{{ asset('frontend/img/ic_baseline-whatsapp.svg') }}" alt="whatsapp">
                                </a>
                                <a
                                    href="https://www.facebook.com/sharer/sharer.php?u={{ $url }}">
                                    <img src="{{ asset('frontend/img/me-facebook.svg') }}" alt="facebook">
                                </a>
                                <a
                                    href="https://t.me/share/url?url={{ $url }}&text=test">
                                    <img src="{{ asset('frontend/img/telegram.svg') }}" alt="telegram">
                                </a>
                                <a href="https://api.qrserver.com/v1/create-qr-code/?size=154x154&data={{$url}}">
                                    <img src="{{ asset('frontend/img/me-wechat.svg') }}" alt="wechat">
                                </a>
                                <a
                                    href="https://social-plugins.line.me/lineit/share?url={{ $url }}">
                                    <img src="{{ asset('frontend/img/line.svg') }}" alt="line">
                                </a>
                                <a href="#" onclick="copyUrl()">
                                    <img src="{{ asset('frontend/img/getlink.svg') }}" alt="getlink">
                                </a>
                                <input type="text" id="copytext" value="{{ $url }}" hidden>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div component-name="me-service-center-tabs" class="me-service-center-tabs">
                <div class="me-service-center-tabs-container">
                    <div class="horizontal-scroll-except-first-column">
                        <table class="w-full service-tabs">
                            <thead>
                                <tr>
                                    <th class="font-normal me-body18 text-darkgrey lg:px-5 px-1 py-5">
                                        <div class="flex items-center">
                                            <div class="hidden">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24"
                                                    viewBox="0 0 25 24" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12.5017 21.1884L13.2228 20.3758C14.0411 19.4386 14.7771 18.5495 15.432 17.7038L15.9725 16.9906C18.2297 13.9495 19.3588 11.5358 19.3588 9.75179C19.3588 5.94379 16.2891 2.85693 12.5017 2.85693C8.71425 2.85693 5.64453 5.94379 5.64453 9.75179C5.64453 11.5358 6.77367 13.9495 9.03082 16.9906L9.57139 17.7038C10.5056 18.9008 11.483 20.0623 12.5017 21.1884Z"
                                                        stroke="#333333" stroke-width="1.14286" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path
                                                        d="M12.5017 12.5712C14.0796 12.5712 15.3588 11.292 15.3588 9.71408C15.3588 8.13612 14.0796 6.85693 12.5017 6.85693C10.9237 6.85693 9.64453 8.13612 9.64453 9.71408C9.64453 11.292 10.9237 12.5712 12.5017 12.5712Z"
                                                        stroke="#333333" stroke-width="1.14286" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg>
                                            </div>
                                            <p class="me-body18 font-normal leading-[140%] ">@lang("labels.compare.servicec_centres")</p>
                                        </div>
                                    </th>
                                    @php $pcount = count($productIdList) @endphp
                                    @if($pcount <= 2)
                                    @for ($i = $pcount; $i < 3; $i++)
                                        <th class="font-normal me-body18 text-darkgrey lg:px-5 px-1 py-5"></th>
                                    @endfor
                                    @endif
                                    @if(count($productList) > 0)
                                    @foreach($productList as $productDetails)
                                    <th class="font-normal me-body18 text-darkgrey lg:px-5 px-1 py-5">
                                        <div class="flex items-center">
                                            <div class="">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24"
                                                    viewBox="0 0 25 24" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12.5017 21.1884L13.2228 20.3758C14.0411 19.4386 14.7771 18.5495 15.432 17.7038L15.9725 16.9906C18.2297 13.9495 19.3588 11.5358 19.3588 9.75179C19.3588 5.94379 16.2891 2.85693 12.5017 2.85693C8.71425 2.85693 5.64453 5.94379 5.64453 9.75179C5.64453 11.5358 6.77367 13.9495 9.03082 16.9906L9.57139 17.7038C10.5056 18.9008 11.483 20.0623 12.5017 21.1884Z"
                                                        stroke="#333333" stroke-width="1.14286" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path
                                                        d="M12.5017 12.5712C14.0796 12.5712 15.3588 11.292 15.3588 9.71408C15.3588 8.13612 14.0796 6.85693 12.5017 6.85693C10.9237 6.85693 9.64453 8.13612 9.64453 9.71408C9.64453 11.292 10.9237 12.5712 12.5017 12.5712Z"
                                                        stroke="#333333" stroke-width="1.14286" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg>
                                            </div>
                                            @php
                                                $merchant_name = explode(' ',$productDetails->merchant->name_en);
                                                if(lang()=='en') {
                                                    $merchant_name = count($merchant_name) > 1 ?  $merchant_name[0].' '.$merchant_name[1]: $merchant_name[0];
                                                }else{
                                                    $merchant_name = langbind($productDetails->merchant,'name');
                                                }
                                            @endphp
                                            <p class="me-body18 font-normal leading-[140%] has-reminder-alert-box" data-id="{{$productDetails->merchant_id}}">{{$merchant_name}}</p>
                                        </div>
                                    </th>
                                    @endforeach
                                    @endif
                                    @php $pcount = count($productIdList) @endphp
                                    @if($pcount <= 3)
                                        <th class="font-normal me-body18 text-darkgrey lg:px-5 px-1 py-5"></th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="font-normal me-body18 lg:px-5 px-1 py-5">@lang('labels.compare.no_of_items')</td>
                                    @php $pcount = count($productIdList) @endphp
                                    @if($pcount <= 2)
                                    @for ($i = $pcount; $i < 3; $i++)
                                        <td class="font-normal me-body18 lg:px-5 px-1 py-5"></td>
                                    @endfor
                                    @endif
                                    @if(count($productList) > 0)
                                    @foreach($productList as $productDetails)
                                    <td class="font-normal me-body18 lg:px-5 px-1 py-5">{{$productDetails->number_of_dose}} @lang('labels.compare.items')</td>
                                    @endforeach
                                    @endif
                                    @php $pcount = count($productIdList) @endphp
                                    @if($pcount <= 2)
                                        <td class="font-normal me-body18 lg:px-5 px-1 py-5"></td>
                                    @endif

                                </tr>
                                <tr>
                                    <td class="font-normal me-body18 lg:px-5 px-1 py-5">@lang('labels.compare.for')</td>
                                    @php $pcount = count($productIdList) @endphp
                                    @if($pcount <= 2)
                                    @for ($i = $pcount; $i < 3; $i++)
                                        <td class="font-normal me-body18 lg:px-5 px-1 py-5"></td>
                                    @endfor
                                    @endif
                                    @if(count($productList) > 0)
                                    @foreach($productList as $productDetails)
                                    <td class="font-normal me-body18 lg:px-5 px-1 py-5">
                                        <ul>
                                            @foreach($productDetails->recommendTags as $recommend)
                                            <li>{{langbind($recommend,'name')}}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    @endforeach
                                    @endif
                                    @php $pcount = count($productIdList) @endphp
                                    @if($pcount <= 3)
                                        <td class="font-normal me-body18 lg:px-5 px-1 py-5"></td>
                                    @endif
                                </tr>
                                <tr>
                                    <td class="font-normal me-body18 lg:px-5 px-1 py-5">@lang('labels.compare.key_items')</td>
                                    @php $pcount = count($productIdList) @endphp
                                    @if($pcount <= 2)
                                    @for ($i = $pcount; $i < 3; $i++)
                                        <td class="font-normal me-body18 lg:px-5 px-1 py-5"></td>
                                    @endfor
                                    @endif
                                    @if(count($productList) > 0)
                                    @foreach($productList as $productDetails)
                                    <td class="font-normal me-body18 lg:px-5 px-1 py-5">
                                        <ul>
                                        {{-- @php $keyItems = getCheckUpTableGroup($productDetails); @endphp --}}
                                        @php $keyItems = \App\Models\ProductKeyItemTag::select("key_item_tags.name_en","key_item_tags.name_tc","key_item_tags.name_sc")
                                                                                        ->join("key_item_tags","key_item_tags.id","product_key_item_tags.key_item_tag_id")
                                                                                        ->where("product_id",$productDetails->id)
                                                                                        ->get();
                                        @endphp
                                            @foreach($keyItems as $ki)
                                            <li>{{langbind($ki,'name')}}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    @endforeach
                                    @endif
                                    @php $pcount = count($productIdList) @endphp
                                    @if($pcount <= 2)
                                        <td class="font-normal me-body18 lg:px-5 px-1 py-5"></td>
                                    @endif
                                </tr>

                                <tr>
                                    <td class="font-normal me-body18 lg:px-5 px-1 py-5">@lang('labels.compare.product_highlight')</td>
                                    @php $pcount = count($productIdList) @endphp
                                    @if($pcount <= 2)
                                    @for ($i = $pcount; $i < 3; $i++)
                                        <td class="font-normal me-body18 lg:px-5 px-1 py-5"></td>
                                    @endfor
                                    @endif
                                    @if(count($productList) > 0)
                                    @foreach($productList as $productDetails)
                                    <td class="font-normal me-body18 lg:px-5 px-1 py-5">
                                        <ul>
                                            @foreach($productDetails->highlightTags as $highlight)
                                            <li>{{langbind($highlight,'name')}}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    @endforeach
                                    @endif
                                    @php $pcount = count($productIdList) @endphp
                                    @if($pcount <= 2)
                                        <td class="font-normal me-body18 lg:px-5 px-1 py-5"></td>
                                    @endif
                                </tr>

                                {{-- <tr>
                                    <td class="font-normal me-body18 lg:px-5 px-1 py-5">Discount</td>
                                    <td class="font-normal me-body18 lg:px-5 px-1 py-5"><button
                                            class="rounded-[4px] me-body16 font-normal border-2 border-lightpink text-lightpink sm:py-2 py-1 px-[2px] sm:px-[10px]">2
                                            To Enjoy</button></td>
                                </tr> --}}
                                <tr>
                                    <td class="font-normal me-body18 lg:px-5 px-1 py-5">@lang('labels.compare.coupon')</td>
                                    @php $pcount = count($productIdList) @endphp
                                    @if($pcount <= 2)
                                    @for ($i = $pcount; $i < 3; $i++)
                                        <td class="font-normal me-body18 lg:px-5 px-1 py-5"></td>
                                    @endfor
                                    @endif
                                    @if(count($productList) > 0)
                                    @foreach($productList as $productDetails)
                                    <td class="font-normal me-body18 lg:px-5 px-1 py-5">
                                        <div class="flex items-center justify-center">
                                            <div class="mr-2"><svg xmlns="http://www.w3.org/2000/svg" width="26"
                                                    height="20" viewBox="0 0 26 20" fill="none">
                                                    <path
                                                        d="M3 0C2.33696 0 1.70107 0.263392 1.23223 0.732233C0.763392 1.20107 0.5 1.83696 0.5 2.5V7.5C1.16304 7.5 1.79893 7.76339 2.26777 8.23223C2.73661 8.70107 3 9.33696 3 10C3 10.663 2.73661 11.2989 2.26777 11.7678C1.79893 12.2366 1.16304 12.5 0.5 12.5V17.5C0.5 18.163 0.763392 18.7989 1.23223 19.2678C1.70107 19.7366 2.33696 20 3 20H23C23.663 20 24.2989 19.7366 24.7678 19.2678C25.2366 18.7989 25.5 18.163 25.5 17.5V12.5C24.837 12.5 24.2011 12.2366 23.7322 11.7678C23.2634 11.2989 23 10.663 23 10C23 9.33696 23.2634 8.70107 23.7322 8.23223C24.2011 7.76339 24.837 7.5 25.5 7.5V2.5C25.5 1.83696 25.2366 1.20107 24.7678 0.732233C24.2989 0.263392 23.663 0 23 0H3ZM17.375 3.75L19.25 5.625L8.625 16.25L6.75 14.375L17.375 3.75ZM9.0125 3.8C10.2375 3.8 11.225 4.7875 11.225 6.0125C11.225 6.59929 10.9919 7.16205 10.577 7.57697C10.162 7.9919 9.59929 8.225 9.0125 8.225C7.7875 8.225 6.8 7.2375 6.8 6.0125C6.8 5.42571 7.0331 4.86295 7.44803 4.44803C7.86295 4.0331 8.42571 3.8 9.0125 3.8ZM16.9875 11.775C18.2125 11.775 19.2 12.7625 19.2 13.9875C19.2 14.5743 18.9669 15.1371 18.552 15.552C18.137 15.9669 17.5743 16.2 16.9875 16.2C15.7625 16.2 14.775 15.2125 14.775 13.9875C14.775 13.4007 15.0081 12.838 15.423 12.423C15.8379 12.0081 16.4007 11.775 16.9875 11.775Z"
                                                        fill="#FF8201"></path>
                                                </svg></div>
                                                @php 
                                                    $productCoupon = \App\Models\Coupon::select('coupons.*')
                                                                                        ->join("coupon_products","coupon_products.coupon_id","coupons.id")
                                                                                        ->where("coupon_products.product_id",$productDetails->id)
                                                                                        ->whereNull("coupons.coupon_type")
                                                                                        ->where("coupons.is_published",1)
                                                                                        ->whereDate("coupons.start_date","<=",date("Y-m-d"))
                                                                                        ->whereDate("coupons.end_date",">=",date("Y-m-d"))
                                                                                        ->get();
                                                @endphp
                                            <p>{{count($productCoupon)}} @if(count($productCoupon)>1)@lang('labels.coupon.coupons') @else @lang('labels.coupon.coupon')@endif</p>
                                        </div>
                                    </td>
                                    @endforeach
                                    @endif
                                    @php $pcount = count($productIdList) @endphp
                                    @if($pcount <= 2)
                                        <td class="font-normal me-body18 lg:px-5 px-1 py-5"></td>
                                    @endif
                                </tr>
                                {{-- <tr>
                                    <td class="font-normal me-body18 lg:px-5 px-1 py-5">Free Gift</td>
                                    <td class="font-normal me-body18 lg:px-5 px-1 py-5">
                                        <ul>
                                            <li>Free 30 mins Nutritionist Consultation</li>
                                        </ul>
                                    </td>
                                </tr> --}}
                            </tbody>
                        </table>
                         <!-- will be add pharse 2-->
                         <div class="sevice-center-mobile lg:hidden">
                            <div>
                                <div class="sticky-header">
                                    <div class="detail-section">
                                        <div class="top-title">
                                            <p class="text-center me-body18 font-normal leading-[140%] p-[10px]">
                                                @lang("labels.compare.servicec_centres")
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="flex">
                                        @if(count($productList) > 0)
                                        @foreach($productList as $productDetails)
                                        <div
                                            class="detail-item flex justify-center items-center w-[300px] bg-far border-r-1 border-r-mee4 last:border-r-0 p-[10px]">
                                            <div class="">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25"
                                                    height="24" viewBox="0 0 25 24" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12.5017 21.1884L13.2228 20.3758C14.0411 19.4386 14.7771 18.5495 15.432 17.7038L15.9725 16.9906C18.2297 13.9495 19.3588 11.5358 19.3588 9.75179C19.3588 5.94379 16.2891 2.85693 12.5017 2.85693C8.71425 2.85693 5.64453 5.94379 5.64453 9.75179C5.64453 11.5358 6.77367 13.9495 9.03082 16.9906L9.57139 17.7038C10.5056 18.9008 11.483 20.0623 12.5017 21.1884Z"
                                                        stroke="#333333" stroke-width="1.14286"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M12.5017 12.5712C14.0796 12.5712 15.3588 11.292 15.3588 9.71408C15.3588 8.13612 14.0796 6.85693 12.5017 6.85693C10.9237 6.85693 9.64453 8.13612 9.64453 9.71408C9.64453 11.292 10.9237 12.5712 12.5017 12.5712Z"
                                                        stroke="#333333" stroke-width="1.14286"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            @php
                                                $merchant_name = explode(' ',$productDetails->merchant->name_en);
                                                if(lang()=='en') {
                                                    $merchant_name = count($merchant_name) > 1 ?  $merchant_name[0].' '.$merchant_name[1]: $merchant_name[0];
                                                }else{
                                                    $merchant_name = langbind($productDetails->merchant,'name');
                                                }
                                            @endphp
                                            <p class="me-body18 font-normal leading-[140%] has-reminder-alert-box" data-id="{{$productDetails->merchant_id}}">{{$merchant_name}}</p>
                                        </div>
                                        @endforeach
                                        @endif
                                        <div
                                            class="detail-item flex justify-center items-center w-[300px] bg-far border-r-1 border-r-mee4 last:border-r-0 p-[10px]">
                                            <div class="hidden">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25"
                                                    height="24" viewBox="0 0 25 24" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12.5017 21.1884L13.2228 20.3758C14.0411 19.4386 14.7771 18.5495 15.432 17.7038L15.9725 16.9906C18.2297 13.9495 19.3588 11.5358 19.3588 9.75179C19.3588 5.94379 16.2891 2.85693 12.5017 2.85693C8.71425 2.85693 5.64453 5.94379 5.64453 9.75179C5.64453 11.5358 6.77367 13.9495 9.03082 16.9906L9.57139 17.7038C10.5056 18.9008 11.483 20.0623 12.5017 21.1884Z"
                                                        stroke="#333333" stroke-width="1.14286"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M12.5017 12.5712C14.0796 12.5712 15.3588 11.292 15.3588 9.71408C15.3588 8.13612 14.0796 6.85693 12.5017 6.85693C10.9237 6.85693 9.64453 8.13612 9.64453 9.71408C9.64453 11.292 10.9237 12.5712 12.5017 12.5712Z"
                                                        stroke="#333333" stroke-width="1.14286"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <p class="me-body18 font-normal leading-[140%] "></p>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="sticky-header">
                                    <div class="detail-section">
                                        <div class="top-title">
                                            <p
                                                class="text-center me-body18 font-normal leading-[140%] p-[10px]">
                                                @lang('labels.compare.no_of_items')</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="flex">
                                        @if(count($productList) > 0)
                                        @foreach($productList as $productDetails)
                                        <div
                                            class="detail-item flex justify-center items-center w-[300px] bg-far border-r-1 border-r-mee4 last:border-r-0 p-[10px]">
                                            <div class="hidden">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25"
                                                    height="24" viewBox="0 0 25 24" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12.5017 21.1884L13.2228 20.3758C14.0411 19.4386 14.7771 18.5495 15.432 17.7038L15.9725 16.9906C18.2297 13.9495 19.3588 11.5358 19.3588 9.75179C19.3588 5.94379 16.2891 2.85693 12.5017 2.85693C8.71425 2.85693 5.64453 5.94379 5.64453 9.75179C5.64453 11.5358 6.77367 13.9495 9.03082 16.9906L9.57139 17.7038C10.5056 18.9008 11.483 20.0623 12.5017 21.1884Z"
                                                        stroke="#333333" stroke-width="1.14286"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M12.5017 12.5712C14.0796 12.5712 15.3588 11.292 15.3588 9.71408C15.3588 8.13612 14.0796 6.85693 12.5017 6.85693C10.9237 6.85693 9.64453 8.13612 9.64453 9.71408C9.64453 11.292 10.9237 12.5712 12.5017 12.5712Z"
                                                        stroke="#333333" stroke-width="1.14286"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <p class="me-body18 font-normal leading-[140%] ">{{$productDetails->number_of_dose}} @lang('labels.compare.items')</p>
                                        </div>
                                        @endforeach
                                        @endif
                                        <div
                                            class="detail-item flex justify-center items-center w-[300px] bg-far border-r-1 border-r-mee4 last:border-r-0 p-[10px]">
                                            <div class="hidden">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25"
                                                    height="24" viewBox="0 0 25 24" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12.5017 21.1884L13.2228 20.3758C14.0411 19.4386 14.7771 18.5495 15.432 17.7038L15.9725 16.9906C18.2297 13.9495 19.3588 11.5358 19.3588 9.75179C19.3588 5.94379 16.2891 2.85693 12.5017 2.85693C8.71425 2.85693 5.64453 5.94379 5.64453 9.75179C5.64453 11.5358 6.77367 13.9495 9.03082 16.9906L9.57139 17.7038C10.5056 18.9008 11.483 20.0623 12.5017 21.1884Z"
                                                        stroke="#333333" stroke-width="1.14286"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M12.5017 12.5712C14.0796 12.5712 15.3588 11.292 15.3588 9.71408C15.3588 8.13612 14.0796 6.85693 12.5017 6.85693C10.9237 6.85693 9.64453 8.13612 9.64453 9.71408C9.64453 11.292 10.9237 12.5712 12.5017 12.5712Z"
                                                        stroke="#333333" stroke-width="1.14286"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <p class="me-body18 font-normal leading-[140%] "></p>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="sticky-header">
                                    <div class="detail-section">
                                        <div class="top-title">
                                            <p class="text-center me-body18 font-normal leading-[140%] p-[10px]">
                                            @lang('labels.compare.for')
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="flex">
                                        @if(count($productList) > 0)
                                        @foreach($productList as $productDetails)
                                        <div
                                            class="detail-item flex justify-center items-center w-[300px] bg-far border-r-1 border-r-mee4 last:border-r-0 p-[10px]">
                                            <div class="hidden">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25"
                                                    height="24" viewBox="0 0 25 24" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12.5017 21.1884L13.2228 20.3758C14.0411 19.4386 14.7771 18.5495 15.432 17.7038L15.9725 16.9906C18.2297 13.9495 19.3588 11.5358 19.3588 9.75179C19.3588 5.94379 16.2891 2.85693 12.5017 2.85693C8.71425 2.85693 5.64453 5.94379 5.64453 9.75179C5.64453 11.5358 6.77367 13.9495 9.03082 16.9906L9.57139 17.7038C10.5056 18.9008 11.483 20.0623 12.5017 21.1884Z"
                                                        stroke="#333333" stroke-width="1.14286"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M12.5017 12.5712C14.0796 12.5712 15.3588 11.292 15.3588 9.71408C15.3588 8.13612 14.0796 6.85693 12.5017 6.85693C10.9237 6.85693 9.64453 8.13612 9.64453 9.71408C9.64453 11.292 10.9237 12.5712 12.5017 12.5712Z"
                                                        stroke="#333333" stroke-width="1.14286"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <p class="me-body18 font-normal leading-[140%] ">
                                                <ul>
                                                    @foreach($productDetails->recommendTags as $recommend)
                                                    <li>{{langbind($recommend,'name')}}</li>
                                                    @endforeach
                                                </ul>
                                            </p>
                                        </div>
                                        @endforeach
                                        @endif
                                        <div
                                            class="detail-item flex justify-center items-center w-[300px] bg-far border-r-1 border-r-mee4 last:border-r-0 p-[10px]">
                                            <div class="hidden">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25"
                                                    height="24" viewBox="0 0 25 24" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12.5017 21.1884L13.2228 20.3758C14.0411 19.4386 14.7771 18.5495 15.432 17.7038L15.9725 16.9906C18.2297 13.9495 19.3588 11.5358 19.3588 9.75179C19.3588 5.94379 16.2891 2.85693 12.5017 2.85693C8.71425 2.85693 5.64453 5.94379 5.64453 9.75179C5.64453 11.5358 6.77367 13.9495 9.03082 16.9906L9.57139 17.7038C10.5056 18.9008 11.483 20.0623 12.5017 21.1884Z"
                                                        stroke="#333333" stroke-width="1.14286"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M12.5017 12.5712C14.0796 12.5712 15.3588 11.292 15.3588 9.71408C15.3588 8.13612 14.0796 6.85693 12.5017 6.85693C10.9237 6.85693 9.64453 8.13612 9.64453 9.71408C9.64453 11.292 10.9237 12.5712 12.5017 12.5712Z"
                                                        stroke="#333333" stroke-width="1.14286"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <p class="me-body18 font-normal leading-[140%] "></p>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="sticky-header">
                                    <div class="detail-section">
                                        <div class="top-title">
                                            <p class="text-center me-body18 font-normal leading-[140%] p-[10px]">
                                                @lang('labels.compare.key_items')</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="flex">
                                        @if(count($productList) > 0)
                                        @foreach($productList as $productDetails)
                                        <div
                                            class="detail-item flex justify-center items-center w-[300px] bg-far border-r-1 border-r-mee4 last:border-r-0 p-[10px]">
                                            <div class="hidden">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25"
                                                    height="24" viewBox="0 0 25 24" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12.5017 21.1884L13.2228 20.3758C14.0411 19.4386 14.7771 18.5495 15.432 17.7038L15.9725 16.9906C18.2297 13.9495 19.3588 11.5358 19.3588 9.75179C19.3588 5.94379 16.2891 2.85693 12.5017 2.85693C8.71425 2.85693 5.64453 5.94379 5.64453 9.75179C5.64453 11.5358 6.77367 13.9495 9.03082 16.9906L9.57139 17.7038C10.5056 18.9008 11.483 20.0623 12.5017 21.1884Z"
                                                        stroke="#333333" stroke-width="1.14286"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M12.5017 12.5712C14.0796 12.5712 15.3588 11.292 15.3588 9.71408C15.3588 8.13612 14.0796 6.85693 12.5017 6.85693C10.9237 6.85693 9.64453 8.13612 9.64453 9.71408C9.64453 11.292 10.9237 12.5712 12.5017 12.5712Z"
                                                        stroke="#333333" stroke-width="1.14286"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <p class="me-body18 font-normal leading-[140%] ">
                                                <ul>
                                                    @php $keyItems = \App\Models\ProductKeyItemTag::select("key_item_tags.name_en","key_item_tags.name_tc","key_item_tags.name_sc")
                                                                                                    ->join("key_item_tags","key_item_tags.id","product_key_item_tags.key_item_tag_id")
                                                                                                    ->where("product_id",$productDetails->id)
                                                                                                    ->get();
                                                    @endphp
                                                        @foreach($keyItems as $ki)
                                                        <li>{{langbind($ki,'name')}}</li>
                                                        @endforeach
                                                </ul>
                                            </p>
                                        </div>
                                        @endforeach
                                        @endif

                                        <div
                                            class="detail-item flex justify-center items-center w-[300px] bg-far border-r-1 border-r-mee4 last:border-r-0 p-[10px]">
                                            <div class="hidden">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25"
                                                    height="24" viewBox="0 0 25 24" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12.5017 21.1884L13.2228 20.3758C14.0411 19.4386 14.7771 18.5495 15.432 17.7038L15.9725 16.9906C18.2297 13.9495 19.3588 11.5358 19.3588 9.75179C19.3588 5.94379 16.2891 2.85693 12.5017 2.85693C8.71425 2.85693 5.64453 5.94379 5.64453 9.75179C5.64453 11.5358 6.77367 13.9495 9.03082 16.9906L9.57139 17.7038C10.5056 18.9008 11.483 20.0623 12.5017 21.1884Z"
                                                        stroke="#333333" stroke-width="1.14286"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M12.5017 12.5712C14.0796 12.5712 15.3588 11.292 15.3588 9.71408C15.3588 8.13612 14.0796 6.85693 12.5017 6.85693C10.9237 6.85693 9.64453 8.13612 9.64453 9.71408C9.64453 11.292 10.9237 12.5712 12.5017 12.5712Z"
                                                        stroke="#333333" stroke-width="1.14286"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <p class="me-body18 font-normal leading-[140%] "></p>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="sticky-header">
                                    <div class="detail-section">
                                        <div class="top-title">
                                            <p class="text-center me-body18 font-normal leading-[140%] p-[10px]">
                                                @lang('labels.compare.product_highlight')</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="flex">
                                        @if(count($productList) > 0)
                                        @foreach($productList as $productDetails)
                                        <div
                                            class="detail-item flex justify-center items-center w-[300px] bg-far border-r-1 border-r-mee4 last:border-r-0 p-[10px]">
                                            <div class="hidden">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25"
                                                    height="24" viewBox="0 0 25 24" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12.5017 21.1884L13.2228 20.3758C14.0411 19.4386 14.7771 18.5495 15.432 17.7038L15.9725 16.9906C18.2297 13.9495 19.3588 11.5358 19.3588 9.75179C19.3588 5.94379 16.2891 2.85693 12.5017 2.85693C8.71425 2.85693 5.64453 5.94379 5.64453 9.75179C5.64453 11.5358 6.77367 13.9495 9.03082 16.9906L9.57139 17.7038C10.5056 18.9008 11.483 20.0623 12.5017 21.1884Z"
                                                        stroke="#333333" stroke-width="1.14286"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M12.5017 12.5712C14.0796 12.5712 15.3588 11.292 15.3588 9.71408C15.3588 8.13612 14.0796 6.85693 12.5017 6.85693C10.9237 6.85693 9.64453 8.13612 9.64453 9.71408C9.64453 11.292 10.9237 12.5712 12.5017 12.5712Z"
                                                        stroke="#333333" stroke-width="1.14286"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <p class="me-body18 font-normal leading-[140%] ">
                                                <ul>
                                                    @foreach($productDetails->highlightTags as $highlight)
                                                    <li>{{langbind($highlight,'name')}}</li>
                                                    @endforeach
                                                </ul>
                                            </p>
                                        </div>
                                        @endforeach
                                        @endif

                                        <div
                                            class="detail-item flex justify-center items-center w-[300px] bg-far border-r-1 border-r-mee4 last:border-r-0 p-[10px]">
                                            <div class="hidden">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25"
                                                    height="24" viewBox="0 0 25 24" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12.5017 21.1884L13.2228 20.3758C14.0411 19.4386 14.7771 18.5495 15.432 17.7038L15.9725 16.9906C18.2297 13.9495 19.3588 11.5358 19.3588 9.75179C19.3588 5.94379 16.2891 2.85693 12.5017 2.85693C8.71425 2.85693 5.64453 5.94379 5.64453 9.75179C5.64453 11.5358 6.77367 13.9495 9.03082 16.9906L9.57139 17.7038C10.5056 18.9008 11.483 20.0623 12.5017 21.1884Z"
                                                        stroke="#333333" stroke-width="1.14286"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M12.5017 12.5712C14.0796 12.5712 15.3588 11.292 15.3588 9.71408C15.3588 8.13612 14.0796 6.85693 12.5017 6.85693C10.9237 6.85693 9.64453 8.13612 9.64453 9.71408C9.64453 11.292 10.9237 12.5712 12.5017 12.5712Z"
                                                        stroke="#333333" stroke-width="1.14286"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <p class="me-body18 font-normal leading-[140%] "></p>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="sticky-header">
                                    <div class="detail-section">
                                        <div class="top-title">
                                            <p class="text-center me-body18 font-normal leading-[140%] p-[10px]">
                                                @lang('labels.compare.coupon')</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="flex">
                                        @if(count($productList) > 0)
                                        @foreach($productList as $productDetails)
                                        <div
                                            class="detail-item flex justify-center items-center w-[300px] bg-far border-r-1 border-r-mee4 last:border-r-0 p-[10px]">
                                            <div class="hidden">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25"
                                                    height="24" viewBox="0 0 25 24" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12.5017 21.1884L13.2228 20.3758C14.0411 19.4386 14.7771 18.5495 15.432 17.7038L15.9725 16.9906C18.2297 13.9495 19.3588 11.5358 19.3588 9.75179C19.3588 5.94379 16.2891 2.85693 12.5017 2.85693C8.71425 2.85693 5.64453 5.94379 5.64453 9.75179C5.64453 11.5358 6.77367 13.9495 9.03082 16.9906L9.57139 17.7038C10.5056 18.9008 11.483 20.0623 12.5017 21.1884Z"
                                                        stroke="#333333" stroke-width="1.14286"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M12.5017 12.5712C14.0796 12.5712 15.3588 11.292 15.3588 9.71408C15.3588 8.13612 14.0796 6.85693 12.5017 6.85693C10.9237 6.85693 9.64453 8.13612 9.64453 9.71408C9.64453 11.292 10.9237 12.5712 12.5017 12.5712Z"
                                                        stroke="#333333" stroke-width="1.14286"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <p class="me-body18 font-normal leading-[140%] ">
                                            <div class="flex items-center justify-center">
                                                <div class="mr-2"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="26" height="20" viewBox="0 0 26 20"
                                                        fill="none">
                                                        <path
                                                            d="M3 0C2.33696 0 1.70107 0.263392 1.23223 0.732233C0.763392 1.20107 0.5 1.83696 0.5 2.5V7.5C1.16304 7.5 1.79893 7.76339 2.26777 8.23223C2.73661 8.70107 3 9.33696 3 10C3 10.663 2.73661 11.2989 2.26777 11.7678C1.79893 12.2366 1.16304 12.5 0.5 12.5V17.5C0.5 18.163 0.763392 18.7989 1.23223 19.2678C1.70107 19.7366 2.33696 20 3 20H23C23.663 20 24.2989 19.7366 24.7678 19.2678C25.2366 18.7989 25.5 18.163 25.5 17.5V12.5C24.837 12.5 24.2011 12.2366 23.7322 11.7678C23.2634 11.2989 23 10.663 23 10C23 9.33696 23.2634 8.70107 23.7322 8.23223C24.2011 7.76339 24.837 7.5 25.5 7.5V2.5C25.5 1.83696 25.2366 1.20107 24.7678 0.732233C24.2989 0.263392 23.663 0 23 0H3ZM17.375 3.75L19.25 5.625L8.625 16.25L6.75 14.375L17.375 3.75ZM9.0125 3.8C10.2375 3.8 11.225 4.7875 11.225 6.0125C11.225 6.59929 10.9919 7.16205 10.577 7.57697C10.162 7.9919 9.59929 8.225 9.0125 8.225C7.7875 8.225 6.8 7.2375 6.8 6.0125C6.8 5.42571 7.0331 4.86295 7.44803 4.44803C7.86295 4.0331 8.42571 3.8 9.0125 3.8ZM16.9875 11.775C18.2125 11.775 19.2 12.7625 19.2 13.9875C19.2 14.5743 18.9669 15.1371 18.552 15.552C18.137 15.9669 17.5743 16.2 16.9875 16.2C15.7625 16.2 14.775 15.2125 14.775 13.9875C14.775 13.4007 15.0081 12.838 15.423 12.423C15.8379 12.0081 16.4007 11.775 16.9875 11.775Z"
                                                            fill="#FF8201" />
                                                    </svg></div>
                                                    @php 
                                                    $productCoupon = \App\Models\Coupon::select('coupons.*')
                                                                                        ->join("coupon_products","coupon_products.coupon_id","coupons.id")
                                                                                        ->where("coupon_products.product_id",$productDetails->id)
                                                                                        ->whereNull("coupons.coupon_type")
                                                                                        ->where("coupons.is_published",1)
                                                                                        ->whereDate("coupons.start_date","<=",date("Y-m-d"))
                                                                                        ->whereDate("coupons.end_date",">=",date("Y-m-d"))
                                                                                        ->get();
                                                @endphp
                                                <p>{{count($productCoupon)}} @if(count($productCoupon)>1)@lang('labels.coupon.coupons') @else @lang('labels.coupon.coupon')@endif</p>
                                            </div>
                                            </p>
                                        </div>
                                        @endforeach
                                        @endif
                                        <div
                                            class="detail-item flex justify-center items-center w-[300px] bg-far border-r-1 border-r-mee4 last:border-r-0 p-[10px]">
                                            <div class="hidden">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25"
                                                    height="24" viewBox="0 0 25 24" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12.5017 21.1884L13.2228 20.3758C14.0411 19.4386 14.7771 18.5495 15.432 17.7038L15.9725 16.9906C18.2297 13.9495 19.3588 11.5358 19.3588 9.75179C19.3588 5.94379 16.2891 2.85693 12.5017 2.85693C8.71425 2.85693 5.64453 5.94379 5.64453 9.75179C5.64453 11.5358 6.77367 13.9495 9.03082 16.9906L9.57139 17.7038C10.5056 18.9008 11.483 20.0623 12.5017 21.1884Z"
                                                        stroke="#333333" stroke-width="1.14286"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path
                                                        d="M12.5017 12.5712C14.0796 12.5712 15.3588 11.292 15.3588 9.71408C15.3588 8.13612 14.0796 6.85693 12.5017 6.85693C10.9237 6.85693 9.64453 8.13612 9.64453 9.71408C9.64453 11.292 10.9237 12.5712 12.5017 12.5712Z"
                                                        stroke="#333333" stroke-width="1.14286"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <p class="me-body18 font-normal leading-[140%] "></p>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- end will be add pharse 2 -->
                        <dialog component-name="reminder-alert"
                            class="hidden justify-center items-center fixed inset-0 bg-black/[.75] z-[1001] w-full h-full pcreminder-popup">
                            <div class="bg-whitez rounded-[12px] ">
                                <div class="relative w-full sm:w-[471px] p-4 3xs:pt-[32px] 3xs:pb-[30px] 3xs:px-[30px]">
                                    <button class="absolute top-3 right-3 h-fit pcreminder-popup-close-box-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewBox="0 0 18 18" fill="none">
                                            <path
                                                d="M17.3998 0.613387C17.2765 0.489783 17.1299 0.391719 16.9686 0.324811C16.8073 0.257902 16.6344 0.223462 16.4598 0.223462C16.2852 0.223462 16.1123 0.257902 15.951 0.324811C15.7897 0.391719 15.6432 0.489783 15.5198 0.613387L8.99981 7.12005L2.47981 0.600054C2.35637 0.476611 2.20982 0.378691 2.04853 0.311885C1.88725 0.245078 1.71438 0.210693 1.53981 0.210693C1.36524 0.210693 1.19237 0.245078 1.03109 0.311885C0.8698 0.378691 0.723252 0.476611 0.59981 0.600054C0.476367 0.723496 0.378447 0.870044 0.31164 1.03133C0.244834 1.19261 0.210449 1.36548 0.210449 1.54005C0.210449 1.71463 0.244834 1.88749 0.31164 2.04878C0.378447 2.21006 0.476367 2.35661 0.59981 2.48005L7.11981 9.00005L0.59981 15.5201C0.476367 15.6435 0.378447 15.79 0.31164 15.9513C0.244834 16.1126 0.210449 16.2855 0.210449 16.4601C0.210449 16.6346 0.244834 16.8075 0.31164 16.9688C0.378447 17.1301 0.476367 17.2766 0.59981 17.4001C0.723252 17.5235 0.8698 17.6214 1.03109 17.6882C1.19237 17.755 1.36524 17.7894 1.53981 17.7894C1.71438 17.7894 1.88725 17.755 2.04853 17.6882C2.20982 17.6214 2.35637 17.5235 2.47981 17.4001L8.99981 10.8801L15.5198 17.4001C15.6433 17.5235 15.7898 17.6214 15.9511 17.6882C16.1124 17.755 16.2852 17.7894 16.4598 17.7894C16.6344 17.7894 16.8072 17.755 16.9685 17.6882C17.1298 17.6214 17.2764 17.5235 17.3998 17.4001C17.5233 17.2766 17.6212 17.1301 17.688 16.9688C17.7548 16.8075 17.7892 16.6346 17.7892 16.4601C17.7892 16.2855 17.7548 16.1126 17.688 15.9513C17.6212 15.79 17.5233 15.6435 17.3998 15.5201L10.8798 9.00005L17.3998 2.48005C17.9065 1.97339 17.9065 1.12005 17.3998 0.613387Z"
                                                fill="#333333"></path>
                                        </svg>
                                    </button>
                                    <h3 class="helvetica-normal font-bold me-body20 text-darkgray text-center"> @lang('labels.compare.reminder')
                                    </h3>
                                    <p class="helvetica-normal me-body16 text-darkgray text-center pt-[12px] pb-5">
                                        @lang('labels.compare.reminder_p')</p>
                                    <div class="flex items-center justify-center">
                                        <button
                                            class="helvetica-normal border border-orangeMediq bg-orangeMediq text-whitez me-body16 w-[100px] 3xs:w-[150px] h-[40px] flex items-center justify-center hover:bg-whitez hover:text-orangeMediq rounded-[6px] mr-[12px] yes-btn">@lang('labels.compare.yes')</button>
                                        <button
                                            class="helvetica-normal border border-darkgray bg-whitez text-darkgray me-body16 w-[100px] 3xs:w-[150px] h-[40px] flex items-center justify-center hover:text-orangeMediq hover:border-orangeMediq rounded-[6px] no-btn">@lang('labels.compare.no')</button>
                                    </div>
                                </div>

                            </div>

                        </dialog>
                    </div>
                </div>
            </div>
            <div component-name="me-custom-collpase" class="bg-whitez me-custom-collpase">
                <div class="me-custom-collpase-container">
                    <div class="hidden lg:flex items-start">
                        @if(count($productList) > 0)
                        <div class="w-full mr-3">
                            @php
                                $placeholders = implode(",", array_fill(0, count($productIdList), '?'));
                            @endphp
                            @php
                                $grouplist = \DB::select("SELECT check_up_table_types.check_up_type_id,
                                                                check_up_table_types.check_up_group_id,
                                                                check_up_groups.name_en,
                                                                check_up_groups.name_tc,
                                                                check_up_groups.name_sc
                                                            FROM `check_up_table_types`
                                                            JOIN `check_up_groups` ON check_up_groups.id=check_up_table_types.check_up_group_id
                                                            WHERE check_up_table_types.check_up_table_id in (
                                                                Select check_up_tables.id
                                                                from check_up_tables
                                                                join packages on packages.check_up_table_id = check_up_tables.id
                                                                join products on products.check_up_package_id = packages.id
                                                                where products.id in ($placeholders)
                                                                GROUP by check_up_tables.id
                                                            )
                                                            GROUP By check_up_table_types.check_up_type_id, check_up_table_types.check_up_group_id
                                                            ORDER BY `check_up_table_types`.`check_up_group_id` DESC",$productIdList);
                            @endphp
                            @foreach($grouplist as $data)
                            <div component-name="me-custom-collpase-content" class="me-custom-collpase-content mb-[2px]">
                                <div class="bg-blueMediq me-custom-collpase-title-bar relative cursor-pointer show-dropdown">
                                    @php
                                        $mergeParameters     = array_merge($productIdList,[$data->check_up_type_id,$data->check_up_group_id]);
                                        $itemlist = \DB::select("Select
                                                                DISTINCT check_table_items.check_up_item_id,
                                                                check_up_items.name_en,
                                                                check_up_items.name_sc,
                                                                check_up_items.name_tc
                                                                from  check_table_items
                                                                JOIN check_up_items ON check_up_items.id=check_table_items.check_up_item_id
                                                                JOIN check_up_table_types on check_up_table_types.id=check_table_items.check_up_table_type_id
                                                                WHERE check_up_table_types.check_up_table_id in (
                                                                    Select check_up_tables.id
                                                                    from check_up_tables
                                                                    join packages on packages.check_up_table_id = check_up_tables.id
                                                                    join products on products.check_up_package_id = packages.id
                                                                    where products.id in ($placeholders)
                                                                    GROUP by check_up_tables.id
                                                                )
                                                                and check_table_items.check_up_type_id=?
                                                                and check_table_items.check_up_group_id=?",
                                                                $mergeParameters);

                                    @endphp
                                    <p class="me-body23 font-bold text-whitez w-full text-center p-[10px] leading-[135%]">{{langbind($data,'name')}} ({{count($itemlist)}} {{ count($itemlist)== 1 ? __('labels.product_detail.item'): __('labels.product_detail.items') }} )</p>
                                </div>
                                <div class="me-custom-collpase-content-data">
                                    <div class="me-custom-collpase-info ">
                                        <table class="w-full me-custom-collpase-table">
                                            @php
                                            $check_count = 0;
                                            @endphp
                                            <tbody>
                                                <tr>
                                                    <td class="text-center py-5 lg:px-5 px-2 me-body18 font-normal"></td>
                                                    @php $pcount = count($productIdList) @endphp
                                                    @if($pcount <= 2)
                                                    @for ($i = $pcount; $i < 3; $i++)
                                                        <td class="text-center py-5 lg:px-5 px-2 me-body18 font-normal"></td>
                                                    @endfor
                                                    @endif
                                                    @foreach($productIdList as $pid)
                                                        @foreach($itemlist as $item)
                                                            @php
                                                            $checkProductItem = DB::select("
                                                            Select products.id
                                                            from products
                                                            Join packages on packages.id=products.check_up_package_id
                                                            Join check_up_tables on check_up_tables.id =packages.check_up_table_id
                                                            where check_up_tables.id in (
                                                                Select check_up_table_types.check_up_table_id
                                                                from  check_table_items
                                                                join check_up_table_types on check_up_table_types.id = check_table_items.check_up_table_type_id
                                                                where check_table_items.check_up_item_id =?
                                                                and check_table_items.check_up_type_id =?
                                                                and check_table_items.check_up_group_id =?
                                                                )
                                                            and products.id=?",
                                                            [$item->check_up_item_id,$data->check_up_type_id,$data->check_up_group_id,$pid]
                                                            );
                                                            if(count($checkProductItem) > 0) {
                                                                $check_count++;
                                                            }
                                                            @endphp
                                                        @endforeach
                                                    <td class="text-center py-5 lg:px-5 px-2 me-body18 font-normal">{{$check_count}} @lang('labels.product_detail.items')</td>
                                                    @php
                                                        $check_count = 0;
                                                    @endphp
                                                    @endforeach
                                                    @php $pcount = count($productIdList) @endphp
                                                    @if($pcount <= 3)
                                                        <td class="text-center py-5 lg:px-5 px-2 me-body18 font-normal"></td>
                                                    @endif
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="me-custom-collpase-detail-table collpase-content-hide">
                                        <table class="w-full me-custom-collpase-table">
                                            <tbody>
                                                @if($data->check_up_type_id == 2)
                                                <tr>
                                                    <td class="py-5 lg:px-5 px-2">
                                                        <div class="flex items-center">
                                                            <p class="mr-[6px] me-body18 font-normal">{{langbind($data,'name')}} </p>
                                                            <p class="mr-[6px] me-body18 font-normal">
                                                                @foreach($itemlist as $item)
                                                                {{langbind($item,'name')}}@if(!$loop->last),<br/>@endif
                                                                @endforeach
                                                            </p>
                                                        </div>
                                                    </td>
                                                    @php $pcount = count($productIdList) @endphp
                                                    @if($pcount <= 2)
                                                    @for ($i = $pcount; $i < 3; $i++)
                                                        <td class="py-5 lg:px-5 px-2"></td>
                                                    @endfor
                                                    @endif
                                                    @foreach($productIdList as $pid)
                                                    @php
                                                    $checkProductItem = DB::select("
                                                                            Select products.id
                                                                            from products
                                                                            Join packages on packages.id=products.check_up_package_id
                                                                            Join check_up_tables on check_up_tables.id =packages.check_up_table_id
                                                                            where check_up_tables.id in (
                                                                                Select check_up_table_types.check_up_table_id
                                                                                from  check_table_items
                                                                                join check_up_table_types on check_up_table_types.id = check_table_items.check_up_table_type_id
                                                                                where check_table_items.check_up_group_id =?
                                                                                )
                                                                            and products.id=?",
                                                                            [$data->check_up_group_id,$pid]
                                                                        );
                                                    @endphp
                                                    <td class="text-center py-5 lg:px-5 px-2 me-body18 font-normal tick">
                                                        <div class="">
                                                            @if(count($checkProductItem) > 0)
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="37" height="36" viewBox="0 0 37 36" fill="none">
                                                                <path d="M30.5 9L14 25.5L6.5 18" stroke="#2FA9B5" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg>
                                                            @else
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="31" height="30" viewBox="0 0 31 30" fill="none">
                                                                <path d="M23.3767 7.13754C23.2611 7.02166 23.1237 6.92972 22.9725 6.86699C22.8213 6.80427 22.6592 6.77198 22.4955 6.77198C22.3318 6.77198 22.1697 6.80427 22.0185 6.86699C21.8672 6.92972 21.7299 7.02166 21.6142 7.13754L15.5017 13.2375L9.38924 7.12504C9.27352 7.00931 9.13613 6.91751 8.98492 6.85488C8.83372 6.79225 8.67166 6.76001 8.50799 6.76001C8.34433 6.76001 8.18227 6.79225 8.03106 6.85488C7.87986 6.91751 7.74247 7.00931 7.62674 7.12504C7.51102 7.24076 7.41922 7.37815 7.35659 7.52936C7.29395 7.68056 7.26172 7.84262 7.26172 8.00629C7.26172 8.16995 7.29395 8.33201 7.35659 8.48321C7.41922 8.63442 7.51102 8.77181 7.62674 8.88754L13.7392 15L7.62674 21.1125C7.51102 21.2283 7.41922 21.3656 7.35659 21.5169C7.29395 21.6681 7.26172 21.8301 7.26172 21.9938C7.26172 22.1574 7.29395 22.3195 7.35659 22.4707C7.41922 22.6219 7.51102 22.7593 7.62674 22.875C7.74247 22.9908 7.87986 23.0826 8.03106 23.1452C8.18227 23.2078 8.34433 23.2401 8.50799 23.2401C8.67166 23.2401 8.83372 23.2078 8.98492 23.1452C9.13613 23.0826 9.27352 22.9908 9.38924 22.875L15.5017 16.7625L21.6142 22.875C21.73 22.9908 21.8674 23.0826 22.0186 23.1452C22.1698 23.2078 22.3318 23.2401 22.4955 23.2401C22.6592 23.2401 22.8212 23.2078 22.9724 23.1452C23.1236 23.0826 23.261 22.9908 23.3767 22.875C23.4925 22.7593 23.5843 22.6219 23.6469 22.4707C23.7095 22.3195 23.7418 22.1574 23.7418 21.9938C23.7418 21.8301 23.7095 21.6681 23.6469 21.5169C23.5843 21.3656 23.4925 21.2283 23.3767 21.1125L17.2642 15L23.3767 8.88754C23.8517 8.41254 23.8517 7.61254 23.3767 7.13754Z" fill="#A3A3A3"></path>
                                                            </svg>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    @endforeach
                                                    @php $pcount = count($productIdList) @endphp
                                                    @if($pcount <= 3)
                                                        <td class="py-5 lg:px-5 px-2"></td>

                                                    @endif
                                                </tr>
                                                @else
                                                @foreach($itemlist as $item)
                                                <tr>
                                                    <td class="py-5 lg:px-5 px-2">
                                                        <div class="flex items-center">
                                                            <p class="mr-[6px] me-body18 font-normal">
                                                                {{langbind($item,'name')}}
                                                            </p>
                                                        </div>
                                                    </td>
                                                    @php $pcount = count($productIdList) @endphp
                                                    @if($pcount <= 2)
                                                    @for ($i = $pcount; $i < 3; $i++)
                                                        <td class="py-5 lg:px-5 px-2"></td>
                                                    @endfor
                                                    @endif
                                                    @foreach($productIdList as $pid)
                                                    @php
                                                    $checkProductItem = DB::select("
                                                                            Select products.id
                                                                            from products
                                                                            Join packages on packages.id=products.check_up_package_id
                                                                            Join check_up_tables on check_up_tables.id =packages.check_up_table_id
                                                                            where check_up_tables.id in (
                                                                                Select check_up_table_types.check_up_table_id
                                                                                from  check_table_items
                                                                                join check_up_table_types on check_up_table_types.id = check_table_items.check_up_table_type_id
                                                                                where check_table_items.check_up_item_id =?
                                                                                and check_table_items.check_up_type_id =?
                                                                                and check_table_items.check_up_group_id =?
                                                                                )
                                                                            and products.id=?",
                                                                            [$item->check_up_item_id,$data->check_up_type_id,$data->check_up_group_id,$pid]
                                                                        );
                                                    @endphp
                                                    <td class="text-center py-5 lg:px-5 px-2 me-body18 font-normal tick">
                                                            <div class="">
                                                                @if(count($checkProductItem) > 0)
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="37" height="36" viewBox="0 0 37 36" fill="none">
                                                                    <path d="M30.5 9L14 25.5L6.5 18" stroke="#2FA9B5" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                </svg>
                                                                @else
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="31" height="30" viewBox="0 0 31 30" fill="none">
                                                                    <path d="M23.3767 7.13754C23.2611 7.02166 23.1237 6.92972 22.9725 6.86699C22.8213 6.80427 22.6592 6.77198 22.4955 6.77198C22.3318 6.77198 22.1697 6.80427 22.0185 6.86699C21.8672 6.92972 21.7299 7.02166 21.6142 7.13754L15.5017 13.2375L9.38924 7.12504C9.27352 7.00931 9.13613 6.91751 8.98492 6.85488C8.83372 6.79225 8.67166 6.76001 8.50799 6.76001C8.34433 6.76001 8.18227 6.79225 8.03106 6.85488C7.87986 6.91751 7.74247 7.00931 7.62674 7.12504C7.51102 7.24076 7.41922 7.37815 7.35659 7.52936C7.29395 7.68056 7.26172 7.84262 7.26172 8.00629C7.26172 8.16995 7.29395 8.33201 7.35659 8.48321C7.41922 8.63442 7.51102 8.77181 7.62674 8.88754L13.7392 15L7.62674 21.1125C7.51102 21.2283 7.41922 21.3656 7.35659 21.5169C7.29395 21.6681 7.26172 21.8301 7.26172 21.9938C7.26172 22.1574 7.29395 22.3195 7.35659 22.4707C7.41922 22.6219 7.51102 22.7593 7.62674 22.875C7.74247 22.9908 7.87986 23.0826 8.03106 23.1452C8.18227 23.2078 8.34433 23.2401 8.50799 23.2401C8.67166 23.2401 8.83372 23.2078 8.98492 23.1452C9.13613 23.0826 9.27352 22.9908 9.38924 22.875L15.5017 16.7625L21.6142 22.875C21.73 22.9908 21.8674 23.0826 22.0186 23.1452C22.1698 23.2078 22.3318 23.2401 22.4955 23.2401C22.6592 23.2401 22.8212 23.2078 22.9724 23.1452C23.1236 23.0826 23.261 22.9908 23.3767 22.875C23.4925 22.7593 23.5843 22.6219 23.6469 22.4707C23.7095 22.3195 23.7418 22.1574 23.7418 21.9938C23.7418 21.8301 23.7095 21.6681 23.6469 21.5169C23.5843 21.3656 23.4925 21.2283 23.3767 21.1125L17.2642 15L23.3767 8.88754C23.8517 8.41254 23.8517 7.61254 23.3767 7.13754Z" fill="#A3A3A3"></path>
                                                                </svg>
                                                                @endif
                                                            </div>
                                                    </td>
                                                    @endforeach
                                                    @php $pcount = count($productIdList) @endphp
                                                    @if($pcount <= 3)
                                                        <td class="py-5 lg:px-5 px-2"></td>
                                                    @endif
                                                </tr>
                                                @endforeach
                                                @endif

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="collpase-all-btn bg-whitez p-[7px] rounded-md cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36"
                                fill="none">
                                <path
                                    d="M30.9825 23.5012C30.6842 23.5012 30.398 23.6197 30.1871 23.8307C29.9761 24.0417 29.8575 24.3278 29.8575 24.6262V28.2599L21.5325 19.9349C21.3173 19.7506 21.0405 19.6543 20.7574 19.6653C20.4742 19.6762 20.2056 19.7936 20.0053 19.9939C19.8049 20.1943 19.6876 20.4629 19.6766 20.746C19.6657 21.0291 19.762 21.306 19.9463 21.5212L28.2713 29.8462H24.6263C24.3279 29.8462 24.0418 29.9647 23.8308 30.1757C23.6198 30.3867 23.5013 30.6728 23.5013 30.9712C23.5013 31.2696 23.6198 31.5557 23.8308 31.7667C24.0418 31.9777 24.3279 32.0962 24.6263 32.0962H30.9825C31.2507 32.0962 31.51 32.0005 31.7138 31.8262C31.7719 31.7755 31.8247 31.7189 31.8713 31.6574C32.0083 31.4827 32.0905 31.2713 32.1075 31.0499C32.1075 31.0499 32.1075 30.9937 32.1075 30.9599V24.6262C32.1075 24.3278 31.989 24.0417 31.778 23.8307C31.5671 23.6197 31.2809 23.5012 30.9825 23.5012Z"
                                    fill="#333333"></path>
                                <path
                                    d="M7.72734 6.14246H11.3611C11.6595 6.14246 11.9456 6.02393 12.1566 5.81295C12.3676 5.60197 12.4861 5.31582 12.4861 5.01746C12.4861 4.71909 12.3676 4.43294 12.1566 4.22196C11.9456 4.01098 11.6595 3.89246 11.3611 3.89246H5.01609C4.74796 3.89244 4.48863 3.98819 4.28484 4.16246C4.2267 4.21316 4.17392 4.2697 4.12734 4.33121C3.9944 4.50726 3.91616 4.71852 3.90234 4.93871C3.90234 4.93871 3.90234 4.99496 3.90234 5.02871V11.3737C3.90234 11.6721 4.02087 11.9582 4.23185 12.1692C4.44283 12.3802 4.72897 12.4987 5.02734 12.4987C5.32571 12.4987 5.61186 12.3802 5.82284 12.1692C6.03382 11.9582 6.15234 11.6721 6.15234 11.3737V7.72871L14.4773 16.0537C14.6926 16.238 14.9694 16.3343 15.2525 16.3234C15.5357 16.3124 15.8042 16.1951 16.0046 15.9947C16.205 15.7944 16.3223 15.5258 16.3333 15.2426C16.3442 14.9595 16.2479 14.6827 16.0636 14.4675L7.72734 6.14246Z"
                                    fill="#333333"></path>
                            </svg>
                        </div>
                        @endif
                    </div>
                    <div class="block lg:hidden my-div">
                        <div class="mobile-expand-all">
                            <button
                                class="mobile-expand-all-div mb-[8] text-right font-normal me-body-14 text-blueMediq underline underline-offset-2 cursor-pointer mobile-collpase-all-btn">Expand
                                All</button>
                        </div>

                        @if(count($productList) > 0)
                            @php
                            $placeholders = implode(",", array_fill(0, count($productIdList), '?'));
                            @endphp
                            @php
                                $grouplist = \DB::select("SELECT check_up_table_types.check_up_type_id,
                                                        check_up_table_types.check_up_group_id,
                                                        check_up_groups.name_en,
                                                        check_up_groups.name_tc,
                                                        check_up_groups.name_sc
                                                    FROM `check_up_table_types`
                                                    JOIN `check_up_groups` ON check_up_groups.id=check_up_table_types.check_up_group_id
                                                    WHERE check_up_table_types.check_up_table_id in (
                                                        Select check_up_tables.id
                                                        from check_up_tables
                                                        join packages on packages.check_up_table_id = check_up_tables.id
                                                        join products on products.check_up_package_id = packages.id
                                                        where products.id in ($placeholders)
                                                        GROUP by check_up_tables.id
                                                    )
                                                    GROUP By check_up_table_types.check_up_type_id, check_up_table_types.check_up_group_id
                                                    ORDER BY `check_up_table_types`.`check_up_group_id` DESC",$productIdList);
                            @endphp
                            @foreach($grouplist as $data)
                            <div class="sevice-center-mobile lg:hidden">
                                <div class="sticky-header">
                                    <div
                                        class="top-title bg-blueMediq me-custom-collpase-title-bar relative cursor-pointer show-dropdown">
                                        @php
                                        $mergeParameters     = array_merge($productIdList,[$data->check_up_type_id,$data->check_up_group_id]);
                                        $itemlist = \DB::select("Select
                                                                DISTINCT check_table_items.check_up_item_id,
                                                                check_up_items.name_en,
                                                                check_up_items.name_sc,
                                                                check_up_items.name_tc
                                                                from  check_table_items
                                                                JOIN check_up_items ON check_up_items.id=check_table_items.check_up_item_id
                                                                JOIN check_up_table_types on check_up_table_types.id=check_table_items.check_up_table_type_id
                                                                WHERE check_up_table_types.check_up_table_id in (
                                                                    Select check_up_tables.id
                                                                    from check_up_tables
                                                                    join packages on packages.check_up_table_id = check_up_tables.id
                                                                    join products on products.check_up_package_id = packages.id
                                                                    where products.id in ($placeholders)
                                                                    GROUP by check_up_tables.id
                                                                )
                                                                and check_table_items.check_up_type_id=?
                                                                and check_table_items.check_up_group_id=?",
                                                                $mergeParameters);

                                        @endphp
                                        <p
                                            class="me-body23 font-bold text-whitez w-full text-center p-[10px] leading-[135%]">
                                            {{langbind($data,'name')}} ({{count($itemlist)}} {{ count($itemlist)== 1 ? __('labels.product_detail.item'): __('labels.product_detail.items') }} )</p>
                                    </div>
                                </div>
                                <div class="detail-items">
                                    @php
                                    $check_count = 0;
                                    @endphp
                                     @foreach($productIdList as $pid)
                                     @foreach($itemlist as $item)
                                         @php
                                         $checkProductItem = DB::select("
                                         Select products.id
                                         from products
                                         Join packages on packages.id=products.check_up_package_id
                                         Join check_up_tables on check_up_tables.id =packages.check_up_table_id
                                         where check_up_tables.id in (
                                             Select check_up_table_types.check_up_table_id
                                             from  check_table_items
                                             join check_up_table_types on check_up_table_types.id = check_table_items.check_up_table_type_id
                                             where check_table_items.check_up_item_id =?
                                             and check_table_items.check_up_type_id =?
                                             and check_table_items.check_up_group_id =?
                                             )
                                         and products.id=?",
                                         [$item->check_up_item_id,$data->check_up_type_id,$data->check_up_group_id,$pid]
                                         );
                                         if(count($checkProductItem) > 0) {
                                             $check_count++;
                                         }
                                         @endphp
                                     @endforeach
                                        <div class="item py-5 lg:px-5 px-2 me-body18 font-normal border-r-1 border-r-mee4 last:border-r-0">{{$check_count}} @lang('labels.product_detail.items')</div>
                                    @php
                                        $check_count = 0;
                                    @endphp
                                    @endforeach
                                    <div
                                        class="item py-5 lg:px-5 px-2 me-body18 font-normal border-r-1 border-r-mee4 last:border-r-0">
                                    </div>
                                </div>
                                <div class="detail-show collpase-content-hide">
                                    @if($data->check_up_type_id == 2)
                                        <div class="cancermarker">
                                            <div class="sticky-header inner-cancermarker">
                                                <div class="top-title inner-cancermarker-title flex items-center">
                                                    <p class="mr-[6px] me-body18 font-normal da-title">{{langbind($data,'name')}}
                                                        @foreach($itemlist as $item)
                                                        {{langbind($item,'name')}}@if(!$loop->last),<br/>@endif
                                                        @endforeach</p>
                                                    <div class="hidden">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="26"
                                                            viewBox="0 0 16 26" fill="none">
                                                            <path
                                                                d="M9.00001 16.934C11.0191 16.6796 12.8653 15.6653 14.1628 14.0976C15.4604 12.53 16.1117 10.5267 15.9843 8.49572C15.8569 6.46471 14.9602 4.5586 13.4769 3.16542C11.9935 1.77223 10.035 0.996704 8.00001 0.996704C5.965 0.996704 4.00648 1.77223 2.52314 3.16542C1.0398 4.5586 0.143151 6.46471 0.0157134 8.49572C-0.111725 10.5267 0.539633 12.53 1.83719 14.0976C3.13475 15.6653 4.98096 16.6796 7.00001 16.934V19.0033H2.00001V21.0033H7.00001V25.0033H9.00001V21.0033H14V19.0033H9.00001V16.934ZM2.00001 9.00326C2.00001 7.81657 2.35191 6.65653 3.01119 5.66984C3.67048 4.68314 4.60755 3.91411 5.70391 3.45998C6.80027 3.00585 8.00667 2.88703 9.17055 3.11855C10.3344 3.35006 11.4035 3.9215 12.2427 4.76062C13.0818 5.59973 13.6532 6.66883 13.8847 7.83272C14.1162 8.9966 13.9974 10.203 13.5433 11.2994C13.0892 12.3957 12.3201 13.3328 11.3334 13.9921C10.3467 14.6514 9.1867 15.0033 8.00001 15.0033C6.40925 15.0015 4.88414 14.3688 3.7593 13.244C2.63446 12.1191 2.00176 10.594 2.00001 9.00326Z"
                                                                fill="#FF87B2"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- @foreach($productIdList as $pid)
                                            @php
                                            $checkProductItem = DB::select("
                                                                    Select products.id
                                                                    from products
                                                                    Join packages on packages.id=products.check_up_package_id
                                                                    Join check_up_tables on check_up_tables.id =packages.check_up_table_id
                                                                    where check_up_tables.id in (
                                                                        Select check_up_table_types.check_up_table_id
                                                                        from  check_table_items
                                                                        join check_up_table_types on check_up_table_types.id = check_table_items.check_up_table_type_id
                                                                        where check_table_items.check_up_group_id =?
                                                                        )
                                                                    and products.id=?",
                                                                    [$data->check_up_group_id,$pid]
                                                                );
                                            @endphp
                                            <td class="text-center py-5 lg:px-5 px-2 me-body18 font-normal tick">
                                                <div class="">
                                                    @if(count($checkProductItem) > 0)
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="37" height="36" viewBox="0 0 37 36" fill="none">
                                                        <path d="M30.5 9L14 25.5L6.5 18" stroke="#2FA9B5" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                    @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="31" height="30" viewBox="0 0 31 30" fill="none">
                                                        <path d="M23.3767 7.13754C23.2611 7.02166 23.1237 6.92972 22.9725 6.86699C22.8213 6.80427 22.6592 6.77198 22.4955 6.77198C22.3318 6.77198 22.1697 6.80427 22.0185 6.86699C21.8672 6.92972 21.7299 7.02166 21.6142 7.13754L15.5017 13.2375L9.38924 7.12504C9.27352 7.00931 9.13613 6.91751 8.98492 6.85488C8.83372 6.79225 8.67166 6.76001 8.50799 6.76001C8.34433 6.76001 8.18227 6.79225 8.03106 6.85488C7.87986 6.91751 7.74247 7.00931 7.62674 7.12504C7.51102 7.24076 7.41922 7.37815 7.35659 7.52936C7.29395 7.68056 7.26172 7.84262 7.26172 8.00629C7.26172 8.16995 7.29395 8.33201 7.35659 8.48321C7.41922 8.63442 7.51102 8.77181 7.62674 8.88754L13.7392 15L7.62674 21.1125C7.51102 21.2283 7.41922 21.3656 7.35659 21.5169C7.29395 21.6681 7.26172 21.8301 7.26172 21.9938C7.26172 22.1574 7.29395 22.3195 7.35659 22.4707C7.41922 22.6219 7.51102 22.7593 7.62674 22.875C7.74247 22.9908 7.87986 23.0826 8.03106 23.1452C8.18227 23.2078 8.34433 23.2401 8.50799 23.2401C8.67166 23.2401 8.83372 23.2078 8.98492 23.1452C9.13613 23.0826 9.27352 22.9908 9.38924 22.875L15.5017 16.7625L21.6142 22.875C21.73 22.9908 21.8674 23.0826 22.0186 23.1452C22.1698 23.2078 22.3318 23.2401 22.4955 23.2401C22.6592 23.2401 22.8212 23.2078 22.9724 23.1452C23.1236 23.0826 23.261 22.9908 23.3767 22.875C23.4925 22.7593 23.5843 22.6219 23.6469 22.4707C23.7095 22.3195 23.7418 22.1574 23.7418 21.9938C23.7418 21.8301 23.7095 21.6681 23.6469 21.5169C23.5843 21.3656 23.4925 21.2283 23.3767 21.1125L17.2642 15L23.3767 8.88754C23.8517 8.41254 23.8517 7.61254 23.3767 7.13754Z" fill="#A3A3A3"></path>
                                                    </svg>
                                                    @endif
                                                </div>
                                            </td>
                                            @endforeach --}}
                                           
                                            <div class="icon-section flex">
                                                @foreach($productIdList as $pid)
                                                @php
                                                $checkProductItem = DB::select("
                                                                        Select products.id
                                                                        from products
                                                                        Join packages on packages.id=products.check_up_package_id
                                                                        Join check_up_tables on check_up_tables.id =packages.check_up_table_id
                                                                        where check_up_tables.id in (
                                                                            Select check_up_table_types.check_up_table_id
                                                                            from  check_table_items
                                                                            join check_up_table_types on check_up_table_types.id = check_table_items.check_up_table_type_id
                                                                            where check_table_items.check_up_group_id =?
                                                                            )
                                                                        and products.id=?",
                                                                        [$data->check_up_group_id,$pid]
                                                                    );
                                                @endphp
                                              
                                                <div
                                                    class="detail-icon--item text-center py-5 lg:px-5 px-2 me-body18 font-normal border-r-1 border-r-mee4 last:border-r-0 tick">
                                                    @if(count($checkProductItem) > 0)
                                                    <div class=" ">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="37" height="36"
                                                            viewBox="0 0 37 36" fill="none">
                                                            <path d="M30.5 9L14 25.5L6.5 18" stroke="#2FA9B5"
                                                                stroke-width="4" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                        </svg>
                                                    </div>
                                                    @else
                                                    <div class="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="31" height="30"
                                                            viewBox="0 0 31 30" fill="none">
                                                            <path
                                                                d="M23.3767 7.13754C23.2611 7.02166 23.1237 6.92972 22.9725 6.86699C22.8213 6.80427 22.6592 6.77198 22.4955 6.77198C22.3318 6.77198 22.1697 6.80427 22.0185 6.86699C21.8672 6.92972 21.7299 7.02166 21.6142 7.13754L15.5017 13.2375L9.38924 7.12504C9.27352 7.00931 9.13613 6.91751 8.98492 6.85488C8.83372 6.79225 8.67166 6.76001 8.50799 6.76001C8.34433 6.76001 8.18227 6.79225 8.03106 6.85488C7.87986 6.91751 7.74247 7.00931 7.62674 7.12504C7.51102 7.24076 7.41922 7.37815 7.35659 7.52936C7.29395 7.68056 7.26172 7.84262 7.26172 8.00629C7.26172 8.16995 7.29395 8.33201 7.35659 8.48321C7.41922 8.63442 7.51102 8.77181 7.62674 8.88754L13.7392 15L7.62674 21.1125C7.51102 21.2283 7.41922 21.3656 7.35659 21.5169C7.29395 21.6681 7.26172 21.8301 7.26172 21.9938C7.26172 22.1574 7.29395 22.3195 7.35659 22.4707C7.41922 22.6219 7.51102 22.7593 7.62674 22.875C7.74247 22.9908 7.87986 23.0826 8.03106 23.1452C8.18227 23.2078 8.34433 23.2401 8.50799 23.2401C8.67166 23.2401 8.83372 23.2078 8.98492 23.1452C9.13613 23.0826 9.27352 22.9908 9.38924 22.875L15.5017 16.7625L21.6142 22.875C21.73 22.9908 21.8674 23.0826 22.0186 23.1452C22.1698 23.2078 22.3318 23.2401 22.4955 23.2401C22.6592 23.2401 22.8212 23.2078 22.9724 23.1452C23.1236 23.0826 23.261 22.9908 23.3767 22.875C23.4925 22.7593 23.5843 22.6219 23.6469 22.4707C23.7095 22.3195 23.7418 22.1574 23.7418 21.9938C23.7418 21.8301 23.7095 21.6681 23.6469 21.5169C23.5843 21.3656 23.4925 21.2283 23.3767 21.1125L17.2642 15L23.3767 8.88754C23.8517 8.41254 23.8517 7.61254 23.3767 7.13754Z"
                                                                fill="#A3A3A3"></path>
                                                        </svg>
                                                    </div>
                                                    @endif
                                                </div>
                                                @endforeach
                                                <div class="detail-icon--item text-center py-5 lg:px-5 px-2 me-body18 font-normal border-r-1 border-r-mee4 last:border-r-0 close">
                                                </div>
                                            </div>
                                           
                                        </div>
                                    @else
                                        @foreach($itemlist as $item)
                                        <div class="cancermarker">
                                            <div class="sticky-header inner-cancermarker">
                                                <div class="top-title inner-cancermarker-title flex items-center">
                                                    <p class="mr-[6px] me-body18 font-normal da-title">{{langbind($item,'name')}}</p>
                                                    <div class="hidden">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="26"
                                                            viewBox="0 0 16 26" fill="none">
                                                            <path
                                                                d="M9.00001 16.934C11.0191 16.6796 12.8653 15.6653 14.1628 14.0976C15.4604 12.53 16.1117 10.5267 15.9843 8.49572C15.8569 6.46471 14.9602 4.5586 13.4769 3.16542C11.9935 1.77223 10.035 0.996704 8.00001 0.996704C5.965 0.996704 4.00648 1.77223 2.52314 3.16542C1.0398 4.5586 0.143151 6.46471 0.0157134 8.49572C-0.111725 10.5267 0.539633 12.53 1.83719 14.0976C3.13475 15.6653 4.98096 16.6796 7.00001 16.934V19.0033H2.00001V21.0033H7.00001V25.0033H9.00001V21.0033H14V19.0033H9.00001V16.934ZM2.00001 9.00326C2.00001 7.81657 2.35191 6.65653 3.01119 5.66984C3.67048 4.68314 4.60755 3.91411 5.70391 3.45998C6.80027 3.00585 8.00667 2.88703 9.17055 3.11855C10.3344 3.35006 11.4035 3.9215 12.2427 4.76062C13.0818 5.59973 13.6532 6.66883 13.8847 7.83272C14.1162 8.9966 13.9974 10.203 13.5433 11.2994C13.0892 12.3957 12.3201 13.3328 11.3334 13.9921C10.3467 14.6514 9.1867 15.0033 8.00001 15.0033C6.40925 15.0015 4.88414 14.3688 3.7593 13.244C2.63446 12.1191 2.00176 10.594 2.00001 9.00326Z"
                                                                fill="#FF87B2"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="icon-section flex">
                                                @foreach($productIdList as $pid)
                                                @php
                                                $checkProductItem = DB::select("
                                                                        Select products.id
                                                                        from products
                                                                        Join packages on packages.id=products.check_up_package_id
                                                                        Join check_up_tables on check_up_tables.id =packages.check_up_table_id
                                                                        where check_up_tables.id in (
                                                                            Select check_up_table_types.check_up_table_id
                                                                            from  check_table_items
                                                                            join check_up_table_types on check_up_table_types.id = check_table_items.check_up_table_type_id
                                                                            where check_table_items.check_up_item_id =?
                                                                            and check_table_items.check_up_type_id =?
                                                                            and check_table_items.check_up_group_id =?
                                                                            )
                                                                        and products.id=?",
                                                                        [$item->check_up_item_id,$data->check_up_type_id,$data->check_up_group_id,$pid]
                                                                    );
                                                @endphp
                                                <div
                                                    class="detail-icon--item text-center py-5 lg:px-5 px-2 me-body18 font-normal border-r-1 border-r-mee4 last:border-r-0 tick">
                                                    @if(count($checkProductItem) > 0)
                                                    <div class=" ">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="37" height="36"
                                                            viewBox="0 0 37 36" fill="none">
                                                            <path d="M30.5 9L14 25.5L6.5 18" stroke="#2FA9B5"
                                                                stroke-width="4" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                        </svg>
                                                    </div>
                                                    @else
                                                    <div class="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="31" height="30"
                                                            viewBox="0 0 31 30" fill="none">
                                                            <path
                                                                d="M23.3767 7.13754C23.2611 7.02166 23.1237 6.92972 22.9725 6.86699C22.8213 6.80427 22.6592 6.77198 22.4955 6.77198C22.3318 6.77198 22.1697 6.80427 22.0185 6.86699C21.8672 6.92972 21.7299 7.02166 21.6142 7.13754L15.5017 13.2375L9.38924 7.12504C9.27352 7.00931 9.13613 6.91751 8.98492 6.85488C8.83372 6.79225 8.67166 6.76001 8.50799 6.76001C8.34433 6.76001 8.18227 6.79225 8.03106 6.85488C7.87986 6.91751 7.74247 7.00931 7.62674 7.12504C7.51102 7.24076 7.41922 7.37815 7.35659 7.52936C7.29395 7.68056 7.26172 7.84262 7.26172 8.00629C7.26172 8.16995 7.29395 8.33201 7.35659 8.48321C7.41922 8.63442 7.51102 8.77181 7.62674 8.88754L13.7392 15L7.62674 21.1125C7.51102 21.2283 7.41922 21.3656 7.35659 21.5169C7.29395 21.6681 7.26172 21.8301 7.26172 21.9938C7.26172 22.1574 7.29395 22.3195 7.35659 22.4707C7.41922 22.6219 7.51102 22.7593 7.62674 22.875C7.74247 22.9908 7.87986 23.0826 8.03106 23.1452C8.18227 23.2078 8.34433 23.2401 8.50799 23.2401C8.67166 23.2401 8.83372 23.2078 8.98492 23.1452C9.13613 23.0826 9.27352 22.9908 9.38924 22.875L15.5017 16.7625L21.6142 22.875C21.73 22.9908 21.8674 23.0826 22.0186 23.1452C22.1698 23.2078 22.3318 23.2401 22.4955 23.2401C22.6592 23.2401 22.8212 23.2078 22.9724 23.1452C23.1236 23.0826 23.261 22.9908 23.3767 22.875C23.4925 22.7593 23.5843 22.6219 23.6469 22.4707C23.7095 22.3195 23.7418 22.1574 23.7418 21.9938C23.7418 21.8301 23.7095 21.6681 23.6469 21.5169C23.5843 21.3656 23.4925 21.2283 23.3767 21.1125L17.2642 15L23.3767 8.88754C23.8517 8.41254 23.8517 7.61254 23.3767 7.13754Z"
                                                                fill="#A3A3A3"></path>
                                                        </svg>
                                                    </div>
                                                    @endif
                                                </div>
                                                @endforeach
                                                <div class="detail-icon--item text-center py-5 lg:px-5 px-2 me-body18 font-normal border-r-1 border-r-mee4 last:border-r-0 close">
                                                </div>
                                            </div>
                                           
                                        </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<input type="hidden" value="{{ json_encode($productIdList) }}" id="productIdsHidden" />

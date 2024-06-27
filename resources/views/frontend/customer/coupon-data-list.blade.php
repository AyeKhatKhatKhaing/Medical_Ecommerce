        <div component-name="me-user-dashboard">
            <div component-name="me-dashboard-title">
                <p class="helvetica-normal text-darkgray me-body32 font-bold">@lang('labels.coupon.coupon') </p>
            </div>
            <div class="coupon-redem">
                <div class="flex items-center justify-center pt-10 redeem-coupon-layer">
                    <div class="relative">
                        <input type="text" id="txt_redeem" autocomplete="off"
                            class="w-[350px] mr-[8px] rounded-[4px] border border-lightgray helvetica-normal text-darkgray px-[10px] h-[48px] focus:outline-none me-body16"
                            placeholder="@lang('labels.coupon_list.enter_coupon_code')">
                        <div class="absolute top-[25%] left-[12px] bg-whitez flex items-center error-icon hidden">
                            <p class="mr-4 text-[#EE220C] font-normal me-body16 helvetica-normal"></p>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path
                                    d="M12.5908 10.6904C12.5641 10.5429 12.4831 10.4107 12.3638 10.3199C12.2445 10.2291 12.0955 10.1862 11.9462 10.1998C11.7969 10.2133 11.658 10.2823 11.557 10.3931C11.456 10.5039 11.4001 10.6485 11.4004 10.7984V16.2008L11.41 16.3088C11.4367 16.4564 11.5177 16.5886 11.637 16.6794C11.7563 16.7702 11.9053 16.813 12.0546 16.7995C12.2039 16.7859 12.3428 16.717 12.4438 16.6062C12.5448 16.4954 12.6007 16.3508 12.6004 16.2008V10.7984L12.5908 10.6904ZM12.9592 8.09844C12.9592 7.85974 12.8644 7.63082 12.6956 7.46204C12.5268 7.29326 12.2979 7.19844 12.0592 7.19844C11.8205 7.19844 11.5916 7.29326 11.4228 7.46204C11.254 7.63082 11.1592 7.85974 11.1592 8.09844C11.1592 8.33713 11.254 8.56605 11.4228 8.73483C11.5916 8.90362 11.8205 8.99844 12.0592 8.99844C12.2979 8.99844 12.5268 8.90362 12.6956 8.73483C12.8644 8.56605 12.9592 8.33713 12.9592 8.09844ZM21.6004 11.9984C21.6004 9.45236 20.589 7.01056 18.7886 5.21021C16.9883 3.40986 14.5465 2.39844 12.0004 2.39844C9.45431 2.39844 7.01251 3.40986 5.21217 5.21021C3.41182 7.01056 2.40039 9.45236 2.40039 11.9984C2.40039 14.5445 3.41182 16.9863 5.21217 18.7867C7.01251 20.587 9.45431 21.5984 12.0004 21.5984C14.5465 21.5984 16.9883 20.587 18.7886 18.7867C20.589 16.9863 21.6004 14.5445 21.6004 11.9984ZM3.60039 11.9984C3.60039 10.8953 3.81766 9.80303 4.2398 8.7839C4.66194 7.76476 5.28068 6.83875 6.06069 6.05874C6.8407 5.27873 7.76671 4.65999 8.78585 4.23785C9.80498 3.81571 10.8973 3.59844 12.0004 3.59844C13.1035 3.59844 14.1958 3.81571 15.2149 4.23785C16.2341 4.65999 17.1601 5.27873 17.9401 6.05874C18.7201 6.83875 19.3388 7.76476 19.761 8.7839C20.1831 9.80303 20.4004 10.8953 20.4004 11.9984C20.4004 14.2263 19.5154 16.3628 17.9401 17.9381C16.3648 19.5134 14.2282 20.3984 12.0004 20.3984C9.77257 20.3984 7.636 19.5134 6.06069 17.9381C4.48539 16.3628 3.60039 14.2263 3.60039 11.9984Z"
                                    fill="#EE220C"></path>
                            </svg>
                        </div>
                    </div>
                    <button id="btn_redeem"
                        class="w-[141px] border-1 border-orangeMediq hover:bg-whitez hover:text-orangeMediq bg-orangeMediq rounded-[6px] text-whitez helvetica-normal me-body16 flex items-center justify-center h-[48px]">@lang('labels.coupon_list.redeem')</button>

                </div>
            </div>
            <div component-name="me-dashboard-wishlist-tabs" class="wishlist-tabs">
                <div class="dc-container flex items-center justify-between pt-[36px]">
                    <ul class="flex justify-start items-center">
                        <li class="list-item cursor-pointer px-[10px] mr-[20px] lg:mr-[32px] me-body20 helvetica-normal font-bold text-darkgray {{ $mainTag == 'available' ? 'active' : '' }}"
                            data-id="#dash-available"><span class="pb-[2px]">@lang('labels.coupon_list.available')<span
                                    class=""> ({{ $totalCouponCount }})</span></span></li>
                        <li class="list-item cursor-pointer px-[10px] mr-[20px] lg:mr-[32px] me-body20 helvetica-normal font-bold text-darkgray {{ $mainTag != 'available' ? 'active' : '' }}"
                            data-id="#dash-used-expired"><span class="pb-[2px]">@lang('labels.coupon_list.used_expired')</span></li>
                    </ul>
                   <a href="{{route('coupon.list')}}" class="underline text-darkgray me-body20 helvetica-normal ">@lang('labels.coupon_list.coupon_zone')</a> 
                </div>
            </div>
        </div>

        <div class="me-dashboard-content mt-[32px]">
            <div id="dash-available" component-name="dashboard-available-tab-layout"
                class="available-div dat-tab {{ $mainTag == 'available' ? '' : 'hidden' }}">
                <ul class="flex items-center justify-start">

                    <li class="label-item flex items-center justify-center cursor-pointer py-[10px] px-5 bg-whitez text-darkgray me-body16 border border-meA3 rounded-[50px] {{ $selectedCategory == 'all' ? 'active' : '' }}"
                        data-id=".all-coupon">@lang('labels.coupon_list.all_coupon')</li>

                    <li class="label-item flex items-center justify-center cursor-pointer py-[10px] px-5 bg-whitez text-darkgray me-body16 border border-meA3 rounded-[50px] {{ $selectedCategory == 'Body Check' ? 'active' : '' }}"
                        data-id=".body-check">@lang('labels.coupon.body_check')</li>

                    <li class="label-item flex items-center justify-center cursor-pointer py-[10px] px-5 bg-whitez text-darkgray me-body16 border border-meA3 rounded-[50px] {{ $selectedCategory == 'Vaccine' ? 'active' : '' }}"
                        data-id=".vaccine">@lang('labels.coupon.vaccine')</li>

                    <li class="label-item flex items-center justify-center cursor-pointer py-[10px] px-5 bg-whitez text-darkgray me-body16 border border-meA3 rounded-[50px] {{ $selectedCategory == 'DNA Test' ? 'active' : '' }}"
                        data-id=".dna-test">@lang('labels.coupon.dna_test')</li>
                </ul>
                <div class="me-dashboard-innercontent" data-id="dash-available">
                    <div class="mdinner-view all-coupon {{ $selectedCategory == 'all' ? '' : 'hidden' }}">
                        <div component-name="dashboard-available-layout">
                            <div component-name="dashboard-innerview" class="flex flex-wrap dashinnerview">
                               
                                @if ($mainTag == 'available' && $selectedCategory == 'all')
                                    <div class="grid lg:grid-cols-2 grid-cols-1 lg:gap-x-10 lg:gap-y-5 dashboard-coupons-list w-full">
                                    @forelse ($couponList as $key => $coupondetails)
                                        <div component-name="dashboard-coupon-card" class="simple-coupon-card">
                                            <div class="w-full small-coupon--container">
                                                <div class="relative">
                                                    <div class="custom-voucher-shape gccard rounded-[20px]">
                                                        <div class="gccard-content text-center">
                                                            <div data-id="#collect-detail-modal{{ $coupondetails->id }}"
                                                                class="cclogo-container cursor-pointer show-detail-popup">
                                                                <div class="rounded-full">
                                                                    @if($coupondetails->owner_type==0)
                                                                    <img class="cclogo w-[80px] h-[80px]"
                                                                    src="{{$coupondetails->icon}}">
                                                                    @else
                                                                    <img class="cclogo w-[80px] h-[80px]"
                                                                        src="{{isset($coupondetails->merchant) ? $coupondetails->merchant->icon :''}}">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="gccard-content-body show-detail-popup">
                                                                <div data-id="#collect-detail-modal{{ $coupondetails->id }}"
                                                                    class="cursor-pointer coupon-see-detail">
                                                                    <p
                                                                        class="company-name text-darkgray helvetica-normal cursor-pointer font-bold">
                                                                        {{ langbind($coupondetails, 'name') }}</p>
                                                                    <p
                                                                        class="ctitle me-body16 helvetica-normal text-darkgray">
                                                                        {{ langbind($coupondetails, 'sub_title') }}</p>
                                                                    <div
                                                                        class="flex justify-start items-center flex-wrap me-body15 helvetica-normal py-5">
                                                                        <p
                                                                            class="ccategory text-lightgray new-ccategory">
                                                                            <svg width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M12.492 11.41C12.4697 11.2871 12.4023 11.1769 12.3028 11.1012C12.2034 11.0255 12.0793 10.9898 11.9548 11.0011C11.8304 11.0124 11.7147 11.0699 11.6305 11.1622C11.5463 11.2545 11.4998 11.3751 11.5 11.5V16.002L11.508 16.092C11.5303 16.2149 11.5977 16.3251 11.6972 16.4008C11.7966 16.4765 11.9207 16.5122 12.0452 16.5009C12.1696 16.4896 12.2853 16.4321 12.3695 16.3398C12.4537 16.2475 12.5002 16.1269 12.5 16.002V11.5L12.492 11.41ZM12.799 9.25C12.799 9.05109 12.72 8.86032 12.5793 8.71967C12.4387 8.57902 12.2479 8.5 12.049 8.5C11.8501 8.5 11.6593 8.57902 11.5187 8.71967C11.378 8.86032 11.299 9.05109 11.299 9.25C11.299 9.44891 11.378 9.63968 11.5187 9.78033C11.6593 9.92098 11.8501 10 12.049 10C12.2479 10 12.4387 9.92098 12.5793 9.78033C12.72 9.63968 12.799 9.44891 12.799 9.25ZM20 12.5C20 10.3783 19.1571 8.34344 17.6569 6.84315C16.1566 5.34285 14.1217 4.5 12 4.5C9.87827 4.5 7.84344 5.34285 6.34315 6.84315C4.84285 8.34344 4 10.3783 4 12.5C4 14.6217 4.84285 16.6566 6.34315 18.1569C7.84344 19.6571 9.87827 20.5 12 20.5C14.1217 20.5 16.1566 19.6571 17.6569 18.1569C19.1571 16.6566 20 14.6217 20 12.5ZM5 12.5C5 11.5807 5.18106 10.6705 5.53284 9.82122C5.88463 8.97194 6.40024 8.20026 7.05025 7.55025C7.70026 6.90024 8.47194 6.38463 9.32122 6.03284C10.1705 5.68106 11.0807 5.5 12 5.5C12.9193 5.5 13.8295 5.68106 14.6788 6.03284C15.5281 6.38463 16.2997 6.90024 16.9497 7.55025C17.5998 8.20026 18.1154 8.97194 18.4672 9.82122C18.8189 10.6705 19 11.5807 19 12.5C19 14.3565 18.2625 16.137 16.9497 17.4497C15.637 18.7625 13.8565 19.5 12 19.5C10.1435 19.5 8.36301 18.7625 7.05025 17.4497C5.7375 16.137 5 14.3565 5 12.5Z"
                                                                                    fill="#7C7C7C"></path>
                                                                            </svg>
                                                                            @if($coupondetails->coupon_type ===null)
                                                                                @lang('labels.my_coupon.valid_from') {{lang() == "en"?date('d M Y', strtotime($coupondetails->start_date)):date('Y年m月d日', strtotime($coupondetails->start_date))}} @lang('labels.my_coupon.to') {{lang() == "en"?date('d M Y', strtotime($coupondetails->end_date)):date('Y年m月d日', strtotime($coupondetails->end_date))}}
                                                                                {{-- @if ($coupondetails->usage_time)
                                                                                    Once collected, valid for
                                                                                    {{ $coupondetails->usage_time }} days
                                                                                @else
                                                                                @lang('labels.coupon.offer_expires')
                                                                                    {{ date('d M Y', strtotime($coupondetails->end_date)) }}
                                                                                @endif --}}
                                                                            @else
                                                                            @php
                                                                                // check welcome coupon
                                                                                if($coupondetails->coupon_type === 1) {
                                                                                    $from_date = date('Y-m-d', strtotime($coupondetails->created_at));
                                                                                    $to_date = date('Y-m-d', strtotime($coupondetails->created_at. ' +30 days'));
                                                                                }

                                                                                // check birthday coupon
                                                                                if($coupondetails->coupon_type === 0) {
                                                                                    $birthdayMonth = date('F', strtotime(Auth::guard('customer')->user()->dob));
                                                                                    $birthdayCurrentYear = "$birthdayMonth,".date('Y');
                                                                                    $from_date = date('Y-m-01', strtotime("$birthdayCurrentYear"));
                                                                                    $to_date =  date('Y-m-t', strtotime("$birthdayCurrentYear"));
                                                                                }
                                                                            @endphp
                                                                            @lang('labels.coupon.offer_expires')
                                                                            {{$to_date}}
                                                                            @endif
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @php $startCheck = false; @endphp
                                                                @if(count($coupondetails->couponProducts)>0) @php $startCheck=true; @endphp @endif
                                                                @if(count($coupondetails->coupon_sub_categories_products)>0) @php $startCheck=true; @endphp @endif
                                                                @if(count($coupondetails->coupon_categories_products)>0) @php $startCheck=true; @endphp @endif
                                                                <button
                                                                    data-related="#drc-popup{{ $coupondetails->id }}"
                                                                    class="{{$startCheck==false?'click-disable':''}} flex items-center justify-between px-[16px] py-[8px] rounded-[6px] bg-far me-body16 helvetica-normal text-darkgray h-[35px] related-products">
                                                                    @lang('labels.coupon_list.related_products')
                                                                    <svg width="16" height="17"
                                                                        viewBox="0 0 16 17" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M5 14.5L11 8.5L5 2.5" stroke="#333333"
                                                                            stroke-width="2.4" stroke-linecap="round"
                                                                            stroke-linejoin="round"></path>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                            <div class="gccard-content-bottom">
                                                                <button
                                                                    class="text-blueMediq flex justify-center mx-auto me-body20 helvetica-normal font-bold detail-btn"
                                                                    data-id="#collect-detail-modal{{ $coupondetails->id }}">@lang('labels.my_coupon.received')</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <dialog id="drc-popup{{$coupondetails->id}}" component-name="dashboard-related-card"
                                            class="dash-rc-popup items-center justify-center fixed z-[1001] left-0 top-0 w-full h-full bg-black/[.75] overflow-hidden">
                                            <div
                                                class="modal-content w-full max-w-[90%] 4xs:max-w-[80%] lg:max-w-[578px] shadow-shadow02 my-[15%] mx-auto">
                                                <div class="relative rounded-[12px] bg-white">
                                                    <div class="flex ml-auto mr-6 w-5 h-5 absolute right-0 top-4">
                                                        <span data-id="drc-popup{{$coupondetails->id}}" class="pb-[4px] absolute left-1/2 top-1/2 -translate-y-1/2 -translate-x-1/2 close-add-compare-modal  flex items-center justify-center text-[32px] w-full cursor-pointer text-[#1A1818] focus:no-underline related-product-btn">×</span>
                                                    </div>
                                                    <div class="modal-content-plan">
                                                        <div class="preview-bgradient p-10 rounded-t-[12px]">
                                                            <h2 class="font-secondary font-bold text-darkgray me-body23">@lang('labels.coupon_list.related_products')</h2>
                                                        </div>

                                                        <div class="bg-white p-10 pt-5 pr-[24px] rounded-b-[12px]">
                                                            <div class="flex flex-col compare-box-container">
                                                                {{-- @php var_dump($coupondetails->couponSubCategories);
                                                                    var_dump($coupondetails->couponCategories);
                                                                die; @endphp --}}

                                                                @php $startCheck = false; @endphp
                                                                @if(count($coupondetails->couponProducts)>0) @php $startCheck=true; @endphp @endif
                                                                @foreach ($coupondetails->couponProducts as $data)
                                                                    @php $productdetails = \App\Models\Product::find($data->product_id); @endphp
                                                                    @if($productdetails->is_published==1)
                                                                    <div
                                                                        class="relative flex items-center py-5 compare-img-container">
                                                                        <div class="mr-[12px]">
                                                                            <img src="{{ $productdetails->featured_img }}"
                                                                                alt="image"
                                                                                class="w-[80px] h-[80px] rounded-[12px]">
                                                                        </div>
                                                                        <div>
                                                                            <a href="{{route("product-detail",['slug'=>$productdetails->slug_en,'category'=>$productdetails->category->name_en])}}">
                                                                            <p
                                                                                class="w-[307px] leading-tight helvetica-normal text-darkgray font-bold me-body18 title">
                                                                                {{ langbind($productdetails, 'name') }}
                                                                            </p>
                                                                            </a>
                                                                            <div class="flex items-center">
                                                                                <p
                                                                                    class="font-bold text-mered me-body20">
                                                                                    @if($productdetails->promotion_price!=null)
                                                                                    ${{ $productdetails->promotion_price }}
                                                                                     @else
                                                                                    @if($productdetails->discount_price!=null)
                                                                                    ${{ $productdetails->discount_price }}
                                                                                    @endif
                                                                                    @endif
                                                                                    @if($productdetails->promotion_price==null&& $productdetails->discount_price==null)
                                                                                    ${{ $productdetails->original_price }}
                                                                                    @endif
                                                                                </p>
                                                                                @if($productdetails->promotion_price!=null || $productdetails->discount_price!=null)
                                                                                <p
                                                                                    class="font-bold text-lightgray me-body14 pl-[10px]">
                                                                                    $
                                                                                    <span class="linethrough">{{ $productdetails->original_price }}</span>
                                                                                </p>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                @endforeach

                                                                @php $subCategoriesArray = []; @endphp
                                                                @if($startCheck == false)
                                                                @if(count($coupondetails->coupon_sub_categories_products)>0) @php $startCheck=true; @endphp @endif
                                                                @foreach ($coupondetails->couponSubCategories as $data)
                                                                    @php array_push($subCategoriesArray,$data->sub_category_id); @endphp
                                                                @endforeach
                                                                @php
                                                                $productList = \App\Models\Product::whereIn("sub_category_id",$subCategoriesArray)->get();
                                                                @endphp
                                                                @foreach($productList as $productdetails)
                                                                {{-- @php $productdetails = \App\Models\Product::find($pdata); @endphp --}}
                                                                @if($productdetails->is_published==1)
                                                                <div
                                                                    class="relative flex items-center py-5 compare-img-container">
                                                                        <div class="mr-[12px]">
                                                                        <img src="{{ $productdetails->featured_img }}"
                                                                            alt="image"
                                                                            class="w-[80px] h-[80px] rounded-[12px]">
                                                                        </div>
                                                                        <div>
                                                                            <a href="{{route("product-detail",['slug'=>$productdetails->slug_en,'category'=>$productdetails->category->name_en])}}">   
                                                                            <p
                                                                                class="w-[307px] leading-tight helvetica-normal text-darkgray font-bold me-body18 title">
                                                                                {{ langbind($productdetails, 'name') }}
                                                                            </p>
                                                                            </a>
                                                                            <div class="flex items-center">
                                                                                <p
                                                                                    class="font-bold text-mered me-body20">
                                                                                    @if($productdetails->promotion_price!=null)
                                                                                    ${{ $productdetails->promotion_price }}
                                                                                    @else
                                                                                    @if($productdetails->discount_price!=null)
                                                                                    ${{ $productdetails->discount_price }}
                                                                                    @endif
                                                                                    @endif
                                                                                    @if($productdetails->promotion_price==null&& $productdetails->discount_price==null)
                                                                                    ${{ $productdetails->original_price }}
                                                                                    @endif
                                                                                </p>
                                                                                @if($productdetails->promotion_price!=null || $productdetails->discount_price!=null)
                                                                                <p
                                                                                    class="font-bold text-lightgray me-body14 pl-[10px]">
                                                                                    $
                                                                                    <span class="linethrough">{{ $productdetails->original_price }}</span>
                                                                                </p>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                @endif
                                                                @endforeach
                                                                @endif

                                                                @php $categoriesArray = []; @endphp
                                                                @if($startCheck == false)
                                                                @if(count($coupondetails->coupon_categories_products)>0) @php $startCheck=true; @endphp @endif
                                                                @foreach ($coupondetails->couponCategories as $data)
                                                                    @php array_push($categoriesArray,$data->category_id); @endphp
                                                                @endforeach
                                                                @php
                                                                $productList = \App\Models\Product::whereIn("category_id",$categoriesArray)->get();
                                                                @endphp
                                                                @foreach($productList as $productdetails)
                                                                {{-- @php $productdetails = \App\Models\Product::find($pdata); @endphp --}}
                                                                @if($productdetails->is_published==1)
                                                                <div
                                                                    class="relative flex items-center py-5 compare-img-container">
                                                                        <div class="mr-[12px]">
                                                                        <img src="{{ $productdetails->featured_img }}"
                                                                            alt="image"
                                                                            class="w-[80px] h-[80px] rounded-[12px]">
                                                                        </div>
                                                                        <div>
                                                                            <a href="{{route("product-detail",['slug'=>$productdetails->slug_en,'category'=>$productdetails->category->name_en])}}">
                                                                            <p
                                                                                class="w-[307px] leading-tight helvetica-normal text-darkgray font-bold me-body18 title">
                                                                                {{ langbind($productdetails, 'name') }}
                                                                            </p>
                                                                            </a>
                                                                            <div class="flex items-center">
                                                                                <p class="font-bold text-mered me-body20">
                                                                                    @if($productdetails->promotion_price!=null)
                                                                                    ${{ $productdetails->promotion_price }}
                                                                                     @else
                                                                                    @if($productdetails->discount_price!=null)
                                                                                    ${{ $productdetails->discount_price }}
                                                                                    @endif
                                                                                    @endif
                                                                                    @if($productdetails->promotion_price==null&& $productdetails->discount_price==null)
                                                                                    ${{ $productdetails->original_price }}
                                                                                    @endif
                                                                                </p>
                                                                                @if($productdetails->promotion_price!=null || $productdetails->discount_price!=null)
                                                                                <p
                                                                                    class="font-bold text-lightgray me-body14 pl-[10px]">
                                                                                    $
                                                                                    <span class="linethrough">{{ $productdetails->original_price }}</span>
                                                                                </p>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                @endif
                                                                @endforeach
                                                                @endif


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </dialog>
                                        <div component-name="me-coupon-collect-detail" class="collect-detail-modal"
                                            id="collect-detail-modal{{ $coupondetails->id }}">
                                            <div class="rounded-[20px] view-bundle-modal--container">
                                                <div class="bg-image w-full p-[40px] pb-[20px] relative">
                                                    <button
                                                        class="cdmodal-close absolute top-[25px] right-[45px] cursor-pointer"><img
                                                            src="{{ asset('frontend/img/white-close.svg') }}"
                                                            alt="close image"></button>
                                                    {{-- <div class="">
                                                        <h6 class="coupon-detail-title">@lang('labels.coupon.coupon_details')</h6>
                                                    </div> --}}
                                                    <div
                                                        class="flex flex-wrap sm:flex-nowrap items-center justify-between py-[10px] qucollectd">
                                                        <div class="relative bg-title flex justify-start items-center">
                                                            <div class="quantity-logo-container mr-[12px] relative">
                                                                @if($coupondetails->owner_type==0)
                                                                <img class="quantity-logo w-[100px] h-[100px]"
                                                                src="{{$coupondetails->icon}}">
                                                                @else
                                                                <img class="quantity-logo w-[100px] h-[100px]"
                                                                    src="{{isset($coupondetails->merchant) ? $coupondetails->merchant->icon :'' }}">
                                                                @endif
                                                                {{-- <img src="{{ $coupondetails->banner_img }}"
                                                                    alt="logo"
                                                                    class="quantity-logo w-[100px] h-[100px]"> --}}
                                                                @if($coupondetails->is_new_or_limited != null)
                                                                @foreach (config('mediq.coupon_status') as $key => $type)
                                                                @if ($key == $coupondetails->is_new_or_limited)
                                                                <div class="label-tag absolute top-0 left-0 {{$coupondetails->is_new_or_limited=="new"?'new':'new-limit'}} px-[10px] py-[4px] rounded-[4px]">
                                                                         {{ $type }}
                                                                </div>
                                                                @endif
                                                                @endforeach
                                                                @endif
                                                            </div>
                                                            <div>
                                                                @if (isset($coupondetails->merchant_id))
                                                                    <p class="text-center quatitle underline">
                                                                        {{ langbind($coupondetails->merchant, 'name') }}
                                                                    </p>
                                                                @endif
                                                                <p data-id="collect-detail-modal`+i+`"
                                                                    class="company-name text-darkgray cursor-pointer">
                                                                    {{ langbind($coupondetails, 'name') }}</p>
                                                                {{-- <p class="ctitle text-darkgray">
                                                                    {{ langbind($coupondetails, 'sub_title') }}</p>
                                                                <div class="flex justify-start items-center flex-wrap">
                                                                    <p class="ccategory text-lightgray new-ccategory">
                                                                        <svg width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M12.492 11.41C12.4697 11.2871 12.4023 11.1769 12.3028 11.1012C12.2034 11.0255 12.0793 10.9898 11.9548 11.0011C11.8304 11.0124 11.7147 11.0699 11.6305 11.1622C11.5463 11.2545 11.4998 11.3751 11.5 11.5V16.002L11.508 16.092C11.5303 16.2149 11.5977 16.3251 11.6972 16.4008C11.7966 16.4765 11.9207 16.5122 12.0452 16.5009C12.1696 16.4896 12.2853 16.4321 12.3695 16.3398C12.4537 16.2475 12.5002 16.1269 12.5 16.002V11.5L12.492 11.41ZM12.799 9.25C12.799 9.05109 12.72 8.86032 12.5793 8.71967C12.4387 8.57902 12.2479 8.5 12.049 8.5C11.8501 8.5 11.6593 8.57902 11.5187 8.71967C11.378 8.86032 11.299 9.05109 11.299 9.25C11.299 9.44891 11.378 9.63968 11.5187 9.78033C11.6593 9.92098 11.8501 10 12.049 10C12.2479 10 12.4387 9.92098 12.5793 9.78033C12.72 9.63968 12.799 9.44891 12.799 9.25ZM20 12.5C20 10.3783 19.1571 8.34344 17.6569 6.84315C16.1566 5.34285 14.1217 4.5 12 4.5C9.87827 4.5 7.84344 5.34285 6.34315 6.84315C4.84285 8.34344 4 10.3783 4 12.5C4 14.6217 4.84285 16.6566 6.34315 18.1569C7.84344 19.6571 9.87827 20.5 12 20.5C14.1217 20.5 16.1566 19.6571 17.6569 18.1569C19.1571 16.6566 20 14.6217 20 12.5ZM5 12.5C5 11.5807 5.18106 10.6705 5.53284 9.82122C5.88463 8.97194 6.40024 8.20026 7.05025 7.55025C7.70026 6.90024 8.47194 6.38463 9.32122 6.03284C10.1705 5.68106 11.0807 5.5 12 5.5C12.9193 5.5 13.8295 5.68106 14.6788 6.03284C15.5281 6.38463 16.2997 6.90024 16.9497 7.55025C17.5998 8.20026 18.1154 8.97194 18.4672 9.82122C18.8189 10.6705 19 11.5807 19 12.5C19 14.3565 18.2625 16.137 16.9497 17.4497C15.637 18.7625 13.8565 19.5 12 19.5C10.1435 19.5 8.36301 18.7625 7.05025 17.4497C5.7375 16.137 5 14.3565 5 12.5Z"
                                                                                fill="#7C7C7C"></path>
                                                                        </svg>
                                                                        @if($coupondetails->coupon_type ===null)
                                                                            @lang('labels.my_coupon.valid_from')
                                                                            @if(lang() == "en")
                                                                            {{ date('d M Y', strtotime($coupondetails->start_date)) }} 
                                                                            @else 
                                                                                {{ date('Y年m月d日', strtotime($coupondetails->start_date)) }}
                                                                            @endif
                                                                            @lang('labels.my_coupon.to')
                                                                            @if(lang() == "en")
                                                                            {{ date('d M Y', strtotime($coupondetails->end_date)) }}
                                                                            @else 
                                                                                {{ date('Y年m月d日', strtotime($coupondetails->end_date)) }}
                                                                            @endif
                                                                        @else
                                                                        @php
                                                                                // check welcome coupon
                                                                                if($coupondetails->coupon_type === 1) {
                                                                                    $from_date = date('Y-m-d', strtotime($coupondetails->created_at));
                                                                                    $to_date = date('Y-m-d', strtotime($coupondetails->created_at. ' +30 days'));
                                                                                }

                                                                                // check birthday coupon
                                                                                if($coupondetails->coupon_type === 0) {
                                                                                    $birthdayMonth = date('F', strtotime(Auth::guard('customer')->user()->dob));
                                                                                    $birthdayCurrentYear = "$birthdayMonth,".date('Y');
                                                                                    $from_date = date('Y-m-01', strtotime("$birthdayCurrentYear"));
                                                                                    $to_date =  date('Y-m-t', strtotime("$birthdayCurrentYear"));
                                                                                }
                                                                        @endphp
                                                                        @lang('labels.coupon.offer_expires')
                                                                        {{$to_date}}
                                                                        @endif
                                                                    </p>
                                                                </div>
                                                                 --}}
                                                            </div>
                                                        </div>
                                                        @php $startCheck = false; @endphp
                                                        @if(count($coupondetails->couponProducts)>0) @php $startCheck=true; @endphp @endif
                                                        @if(count($coupondetails->coupon_sub_categories_products)>0) @php $startCheck=true; @endphp @endif
                                                        @if(count($coupondetails->coupon_categories_products)>0) @php $startCheck=true; @endphp @endif
                                                        <button data-related="#drc-popup{{ $coupondetails->id }}"
                                                            class="{{$startCheck==false?'click-disable':''}} qua-collect-btn-content w-[131px] font-secondary font-bold me-body16 inline-block py-[10px] px-5 border border-darkgray text-center hover:bg-blueMediq hover:border-blueMediq hover:text-whitez rounded-full related-products">@lang('labels.coupon_list.related_products')</button>
                                                    </div>
                                                </div>
                                                <div class="custom-divider">
                                                </div>
                                                <div class="cscard-container">

                                                    <div class="mb-[27px] last:mb-0">
                                                        <h6 class="text-darkgray contitle mb-[10px]">@lang('labels.promotion_period')</h6>
                                                        @php
                                                            // check welcome coupon
                                                            if($coupondetails->coupon_type === 1) {
                                                                $from_date = date('Y-m-d', strtotime($coupondetails->created_at));
                                                                $to_date = date('Y-m-d', strtotime($coupondetails->created_at. ' +30 days'));
                                                            }

                                                            // check birthday coupon
                                                            if($coupondetails->coupon_type === 0) {
                                                                $birthdayMonth = date('F', strtotime(Auth::guard('customer')->user()->dob));
                                                                $birthdayCurrentYear = "$birthdayMonth,".date('Y');
                                                                $from_date = date('Y-m-01', strtotime("$birthdayCurrentYear"));
                                                                $to_date =  date('Y-m-t', strtotime("$birthdayCurrentYear"));
                                                            }
                                                        @endphp
                                                        <div class="condes text-darkgray">
                                                            @if($coupondetails->coupon_type===null)
                                                            @php
                                                                $customer_id = Auth::guard('customer')->user() != null ? Auth::guard('customer')->user()->id : '';
                                                                $item = App\Models\CouponCollect::where('coupon_id', $coupondetails->id)
                                                                    ->where('customer_id', $customer_id)
                                                                    ->first();
                                                                $end_date = "";
                                                                if($item!=null) {
                                                                    if($coupondetails->usage_time!=null) {
                                                                        if(lang() == "en")
                                                                        {
                                                                            $end_date = \Carbon\Carbon::parse($item->created_at)->addDays($coupondetails->usage_time)->format('d M Y');
                                                                        }else{
                                                                            $end_date = \Carbon\Carbon::parse($item->created_at)->addDays($coupondetails->usage_time)->format('Y年m月d日');
                                                                        }
                                                                    }
                                                                }
                                                            @endphp
                                                           @if(lang() == "en"){{ date('d M Y', strtotime($coupondetails->start_date)) }}@else {{ date('Y年m月d日', strtotime($coupondetails->start_date))}} @endif - @if(lang() == "en"){{ $end_date!=""?$end_date:date('d M Y', strtotime($coupondetails->end_date)) }}@else {{ $end_date!=""?$end_date:date('Y年m月d日', strtotime($coupondetails->end_date))}}@endif
                                                            @else
                                                            {{$from_date}}
                                                            to
                                                            {{$to_date}}
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="mb-[27px] last:mb-0">
                                                        {{-- <h6 class="text-darkgray contitle mb-[10px]">@lang('labels.coupon.terms_and_conditions')</h6> --}}
                                                        <div class="condes text-darkgray">{!! langbind($coupondetails, 'content') !!}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                        @include('frontend.customer.empty-coupon')
                                    @endforelse
                                    </div>
                                @endif
                               
                            </div>
                        </div>
                    </div>
                    <div class="mdinner-view body-check {{ $selectedCategory == 'Body Check' ? '' : 'hidden' }}">
                        <div component-name="dashboard-available-layout">
                            <div component-name="dashboard-innerview" class="flex flex-wrap dashinnerview">
                                @if ($mainTag == 'available' && $selectedCategory == 'Body Check')
                                <div class="grid lg:grid-cols-2 grid-cols-1 lg:gap-x-10 lg:gap-y-5 dashboard-coupons-list w-full">
                                    @forelse ($couponList as $key => $coupondetails)
                                        <div component-name="dashboard-coupon-card" class="simple-coupon-card">
                                            <div class="w-full small-coupon--container">
                                                <div class="relative">
                                                    <div class="custom-voucher-shape gccard rounded-[20px]">
                                                        <div class="gccard-content text-center">
                                                            <div data-id="#collect-detail-modal{{ $coupondetails->id }}"
                                                                class="cclogo-container cursor-pointer show-detail-popup">
                                                                <div class="rounded-full">
                                                                    @if($coupondetails->owner_type==0)
                                                                    <img class="cclogo w-[80px] h-[80px]"
                                                                    src="{{$coupondetails->icon}}">
                                                                    @else
                                                                    <img class="cclogo w-[80px] h-[80px]"
                                                                        src="{{isset($coupondetails->merchant) ? $coupondetails->merchant->icon :'' }}">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="gccard-content-body show-detail-popup">
                                                                <div data-id="#collect-detail-modal{{ $coupondetails->id }}"
                                                                    class="cursor-pointer coupon-see-detail">
                                                                    <p class="company-name text-darkgray helvetica-normal cursor-pointer font-bold">{{ langbind($coupondetails, 'name') }}</p>
                                                                    <p class="ctitle me-body16 helvetica-normal text-darkgray">{{ langbind($coupondetails, 'sub_title') }}</p>
                                                                    <div
                                                                        class="flex justify-start items-center flex-wrap me-body15 helvetica-normal py-5">
                                                                        <p
                                                                            class="ccategory text-lightgray new-ccategory">
                                                                            <svg width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M12.492 11.41C12.4697 11.2871 12.4023 11.1769 12.3028 11.1012C12.2034 11.0255 12.0793 10.9898 11.9548 11.0011C11.8304 11.0124 11.7147 11.0699 11.6305 11.1622C11.5463 11.2545 11.4998 11.3751 11.5 11.5V16.002L11.508 16.092C11.5303 16.2149 11.5977 16.3251 11.6972 16.4008C11.7966 16.4765 11.9207 16.5122 12.0452 16.5009C12.1696 16.4896 12.2853 16.4321 12.3695 16.3398C12.4537 16.2475 12.5002 16.1269 12.5 16.002V11.5L12.492 11.41ZM12.799 9.25C12.799 9.05109 12.72 8.86032 12.5793 8.71967C12.4387 8.57902 12.2479 8.5 12.049 8.5C11.8501 8.5 11.6593 8.57902 11.5187 8.71967C11.378 8.86032 11.299 9.05109 11.299 9.25C11.299 9.44891 11.378 9.63968 11.5187 9.78033C11.6593 9.92098 11.8501 10 12.049 10C12.2479 10 12.4387 9.92098 12.5793 9.78033C12.72 9.63968 12.799 9.44891 12.799 9.25ZM20 12.5C20 10.3783 19.1571 8.34344 17.6569 6.84315C16.1566 5.34285 14.1217 4.5 12 4.5C9.87827 4.5 7.84344 5.34285 6.34315 6.84315C4.84285 8.34344 4 10.3783 4 12.5C4 14.6217 4.84285 16.6566 6.34315 18.1569C7.84344 19.6571 9.87827 20.5 12 20.5C14.1217 20.5 16.1566 19.6571 17.6569 18.1569C19.1571 16.6566 20 14.6217 20 12.5ZM5 12.5C5 11.5807 5.18106 10.6705 5.53284 9.82122C5.88463 8.97194 6.40024 8.20026 7.05025 7.55025C7.70026 6.90024 8.47194 6.38463 9.32122 6.03284C10.1705 5.68106 11.0807 5.5 12 5.5C12.9193 5.5 13.8295 5.68106 14.6788 6.03284C15.5281 6.38463 16.2997 6.90024 16.9497 7.55025C17.5998 8.20026 18.1154 8.97194 18.4672 9.82122C18.8189 10.6705 19 11.5807 19 12.5C19 14.3565 18.2625 16.137 16.9497 17.4497C15.637 18.7625 13.8565 19.5 12 19.5C10.1435 19.5 8.36301 18.7625 7.05025 17.4497C5.7375 16.137 5 14.3565 5 12.5Z"
                                                                                    fill="#7C7C7C"></path>
                                                                            </svg>
                                                                            @if($coupondetails->coupon_type ===null)
                                                                            @lang('labels.my_coupon.valid_from')
                                                                                @if(lang() == "en")
                                                                                {{ date('d M Y', strtotime($coupondetails->start_date)) }} 
                                                                                @else 
                                                                                    {{ date('Y年m月d日', strtotime($coupondetails->start_date)) }}
                                                                                @endif
                                                                                @lang('labels.my_coupon.to')
                                                                                @if(lang() == "en")
                                                                                {{ date('d M Y', strtotime($coupondetails->end_date)) }}
                                                                                @else 
                                                                                    {{ date('Y年m月d日', strtotime($coupondetails->end_date)) }}
                                                                                @endif
                                                                                {{-- @if ($coupondetails->usage_time)
                                                                                    Once collected, valid for
                                                                                    {{ $coupondetails->usage_time }} days
                                                                                @else
                                                                                @lang('labels.coupon.offer_expires')
                                                                                    {{ date('d M Y', strtotime($coupondetails->end_date)) }}
                                                                                @endif --}}
                                                                            @else
                                                                            @php
                                                                                    // check welcome coupon
                                                                                    if($coupondetails->coupon_type === 1) {
                                                                                        $from_date = date('Y-m-d', strtotime($coupondetails->created_at));
                                                                                        $to_date = date('Y-m-d', strtotime($coupondetails->created_at. ' +30 days'));
                                                                                    }

                                                                                    // check birthday coupon
                                                                                    if($coupondetails->coupon_type === 0) {
                                                                                        $birthdayMonth = date('F', strtotime(Auth::guard('customer')->user()->dob));
                                                                                        $birthdayCurrentYear = "$birthdayMonth,".date('Y');
                                                                                        $from_date = date('Y-m-01', strtotime("$birthdayCurrentYear"));
                                                                                        $to_date =  date('Y-m-t', strtotime("$birthdayCurrentYear"));
                                                                                    }
                                                                            @endphp
                                                                            @lang('labels.coupon.offer_expires')
                                                                            {{$to_date}}
                                                                            @endif
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @php $startCheck = false; @endphp
                                                                @if(count($coupondetails->couponProducts)>0) @php $startCheck=true; @endphp @endif
                                                                @if(count($coupondetails->coupon_sub_categories_products)>0) @php $startCheck=true; @endphp @endif
                                                                @if(count($coupondetails->coupon_categories_products)>0) @php $startCheck=true; @endphp @endif
                                                                <button
                                                                    data-related="#drc-popup{{ $coupondetails->id }}"
                                                                    class="{{$startCheck==false?'click-disable':''}} flex items-center justify-between px-[16px] py-[8px] rounded-[6px] bg-far me-body16 helvetica-normal text-darkgray h-[35px] related-products">
                                                                    @lang('labels.coupon_list.related_products')
                                                                    <svg width="16" height="17"
                                                                        viewBox="0 0 16 17" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M5 14.5L11 8.5L5 2.5"
                                                                            stroke="#333333" stroke-width="2.4"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round"></path>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                            <div class="gccard-content-bottom">
                                                                <button
                                                                    class="text-blueMediq flex justify-center mx-auto me-body20 helvetica-normal font-bold detail-btn"
                                                                    data-id="#collect-detail-modal{{ $coupondetails->id }}">@lang('labels.my_coupon.received')</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <dialog id="drc-popup{{$coupondetails->id}}" component-name="dashboard-related-card"
                                            class="dash-rc-popup items-center justify-center fixed z-[1001] left-0 top-0 w-full h-full bg-black/[.75] overflow-hidden">
                                            <div
                                                class="modal-content w-full max-w-[90%] 4xs:max-w-[80%] lg:max-w-[578px] shadow-shadow02 my-[15%] mx-auto">
                                                <div class="relative rounded-[12px] bg-white">
                                                    <div class="flex ml-auto mr-6 w-5 h-5 absolute right-0 top-4">
                                                        <span data-id="drc-popup{{$coupondetails->id}}" class="pb-[4px] absolute left-1/2 top-1/2 -translate-y-1/2 -translate-x-1/2 close-add-compare-modal  flex items-center justify-center text-[32px] w-full cursor-pointer text-[#1A1818] focus:no-underline related-product-btn">×</span>
                                                    </div>
                                                    <div class="modal-content-plan">
                                                        <div class="preview-bgradient p-10 rounded-t-[12px]">
                                                            <h2 class="font-secondary font-bold text-darkgray me-body23">@lang('labels.coupon_list.related_products')</h2>
                                                        </div>
                                                        <div class="bg-white p-10 pt-5 pr-[24px] rounded-b-[12px]">
                                                            <div class="flex flex-col compare-box-container">
                                                                @php $startCheck = false; @endphp
                                                                @if(count($coupondetails->couponProducts)>0) @php $startCheck=true; @endphp @endif
                                                                @foreach ($coupondetails->couponProducts as $data)
                                                                    @php $productdetails = \App\Models\Product::find($data->product_id); @endphp
                                                                    @if($productdetails->is_published == 1)
                                                                    <div
                                                                        class="relative flex items-center py-5 compare-img-container">
                                                                        <div class="mr-[12px]">
                                                                            <img src="{{ $productdetails->featured_img }}"
                                                                                alt="image"
                                                                                class="w-[80px] h-[80px] rounded-[12px]">
                                                                        </div>
                                                                        <div>
                                                                            <a href="{{route("product-detail",['slug'=>$productdetails->slug_en,'category'=>$productdetails->category->name_en])}}">
                                                                            <p
                                                                                class="w-[307px] leading-tight helvetica-normal text-darkgray font-bold me-body18 title">
                                                                                {{ langbind($productdetails, 'name') }}
                                                                            </p>
                                                                            </a>
                                                                            <div class="flex items-center">
                                                                                <p class="font-bold text-mered me-body20">
                                                                                   @if($productdetails->promotion_price!=null)
                                                                                    ${{ $productdetails->promotion_price }}
                                                                                     @else
                                                                                    @if($productdetails->discount_price!=null)
                                                                                    ${{ $productdetails->discount_price }}
                                                                                    @endif
                                                                                    @endif
                                                                                    @if($productdetails->promotion_price==null&& $productdetails->discount_price==null)
                                                                                    ${{ $productdetails->original_price }}
                                                                                    @endif
                                                                                </p>
                                                                                @if($productdetails->promotion_price!=null || $productdetails->discount_price!=null)
                                                                                <p
                                                                                    class="font-bold text-lightgray me-body14 pl-[10px]">
                                                                                    $
                                                                                    <span class="linethrough">{{ $productdetails->original_price }}</span>
                                                                                </p>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                @endforeach

                                                                @php $subCategoriesArray = []; @endphp
                                                                @if($startCheck == false)
                                                                @if(count($coupondetails->coupon_sub_categories_products)>0) @php $startCheck=true; @endphp @endif
                                                                @foreach ($coupondetails->couponSubCategories as $data)
                                                                    @php array_push($subCategoriesArray,$data->sub_category_id); @endphp
                                                                @endforeach
                                                                @php
                                                                $productList = \App\Models\Product::whereIn("sub_category_id",$subCategoriesArray)->get();
                                                                @endphp
                                                                @foreach($productList as $productdetails)
                                                                {{-- @php $productdetails = \App\Models\Product::find($pdata); @endphp --}}
                                                                @if($productdetails->is_published == 1)
                                                                <div
                                                                    class="relative flex items-center py-5 compare-img-container">
                                                                        <div class="mr-[12px]">
                                                                        <img src="{{ $productdetails->featured_img }}"
                                                                            alt="image"
                                                                            class="w-[80px] h-[80px] rounded-[12px]">
                                                                        </div>
                                                                        <div>
                                                                            <a href="{{route("product-detail",['slug'=>$productdetails->slug_en,'category'=>$productdetails->category->name_en])}}">
                                                                            <p
                                                                                class="w-[307px] leading-tight helvetica-normal text-darkgray font-bold me-body18 title">
                                                                                {{ langbind($productdetails, 'name') }}
                                                                            </p>
                                                                            </a>
                                                                            <div class="flex items-center">
                                                                                <p class="font-bold text-mered me-body20">
                                                                                   @if($productdetails->promotion_price!=null)
                                                                                    ${{ $productdetails->promotion_price }}
                                                                                     @else
                                                                                    @if($productdetails->discount_price!=null)
                                                                                    ${{ $productdetails->discount_price }}
                                                                                    @endif
                                                                                    @endif
                                                                                    @if($productdetails->promotion_price==null&& $productdetails->discount_price==null)
                                                                                    ${{ $productdetails->original_price }}
                                                                                    @endif
                                                                                </p>
                                                                                @if($productdetails->promotion_price!=null || $productdetails->discount_price!=null)
                                                                                <p
                                                                                    class="font-bold text-lightgray me-body14 pl-[10px]">
                                                                                    $
                                                                                    <span class="linethrough">{{ $productdetails->original_price }}</span>
                                                                                </p>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                @endif
                                                                @endforeach
                                                                @endif

                                                                @php $categoriesArray = []; @endphp
                                                                @if($startCheck == false)
                                                                @if(count($coupondetails->coupon_categories_products)>0) @php $startCheck=true; @endphp @endif
                                                                @foreach ($coupondetails->couponCategories as $data)
                                                                    @php array_push($categoriesArray,$data->category_id); @endphp
                                                                @endforeach
                                                                @php
                                                                $productList = \App\Models\Product::whereIn("category_id",$categoriesArray)->get();
                                                                @endphp
                                                                @foreach($productList as $productdetails)
                                                                {{-- @php $productdetails = \App\Models\Product::find($pdata); @endphp --}}
                                                                @if($productdetails->is_published == 1)
                                                                <div
                                                                    class="relative flex items-center py-5 compare-img-container">
                                                                        <div class="mr-[12px]">
                                                                        <img src="{{ $productdetails->featured_img }}"
                                                                            alt="image"
                                                                            class="w-[80px] h-[80px] rounded-[12px]">
                                                                        </div>
                                                                        <div>
                                                                            <a href="{{route("product-detail",['slug'=>$productdetails->slug_en,'category'=>$productdetails->category->name_en])}}">
                                                                            <p
                                                                                class="w-[307px] leading-tight helvetica-normal text-darkgray font-bold me-body18 title">
                                                                                {{ langbind($productdetails, 'name') }}
                                                                            </p>
                                                                            </a>
                                                                            <div class="flex items-center">
                                                                                <p class="font-bold text-mered me-body20">
                                                                                   @if($productdetails->promotion_price!=null)
                                                                                    ${{ $productdetails->promotion_price }}
                                                                                     @else
                                                                                    @if($productdetails->discount_price!=null)
                                                                                    ${{ $productdetails->discount_price }}
                                                                                    @endif
                                                                                    @endif
                                                                                    @if($productdetails->promotion_price==null&& $productdetails->discount_price==null)
                                                                                    ${{ $productdetails->original_price }}
                                                                                    @endif
                                                                                </p>
                                                                                @if($productdetails->promotion_price!=null || $productdetails->discount_price!=null)
                                                                                <p
                                                                                    class="font-bold text-lightgray me-body14 pl-[10px]">
                                                                                    $
                                                                                    <span class="linethrough">{{ $productdetails->original_price }}</span>
                                                                                </p>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                @endif
                                                                @endforeach
                                                                @endif

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </dialog>
                                        <div component-name="me-coupon-collect-detail" class="collect-detail-modal"
                                            id="collect-detail-modal{{ $coupondetails->id }}">
                                            <div class="rounded-[20px] view-bundle-modal--container">
                                                <div class="bg-image w-full p-[40px] pb-[20px] relative">
                                                    <button
                                                        class="cdmodal-close absolute top-[25px] right-[45px] cursor-pointer"><img
                                                            src="{{ asset('frontend/img/white-close.svg') }}"
                                                            alt="close image"></button>
                                                    {{-- <div class="">
                                                        <h6 class="coupon-detail-title">@lang('labels.coupon.coupon_details')</h6>
                                                    </div> --}}
                                                    <div
                                                        class="flex flex-wrap sm:flex-nowrap items-center justify-between py-[10px] qucollectd">
                                                        <div class="relative bg-title flex justify-start items-center">
                                                            <div class="quantity-logo-container mr-[12px] relative">
                                                                @if($coupondetails->owner_type==0)
                                                                <img class="quantity-logo w-[100px] h-[100px]" src="{{$coupondetails->icon}}">
                                                                @else
                                                                <img class="quantity-logo w-[100px] h-[100px]" src="{{isset($coupondetails->merchant) ? $coupondetails->merchant->icon :'' }}">
                                                                @endif
                                                                @if($coupondetails->is_new_or_limited != null)
                                                                @foreach (config('mediq.coupon_status') as $key => $type)
                                                                @if ($key == $coupondetails->is_new_or_limited)
                                                                <div class="label-tag absolute top-0 left-0 {{$coupondetails->is_new_or_limited=="new"?'new':'new-limit'}} px-[10px] py-[4px] rounded-[4px]">
                                                                         {{ $type }}
                                                                </div>
                                                                @endif
                                                                @endforeach
                                                                @endif
                                                                {{-- <div
                                                                    class="label-tag absolute top-0 left-0 {{$coupondetails->is_new_or_limited=="new"?'new':'new-limit'}} px-[10px] py-[4px] rounded-[4px] 2">
                                                                    @foreach (config('mediq.coupon_status') as $key => $type)
                                                                        @if ($key == $coupondetails->is_new_or_limited)
                                                                            2
                                                                        @endif
                                                                    @endforeach
                                                                </div> --}}
                                                            </div>
                                                            <div>
                                                                @if (isset($coupondetails->merchant_id))
                                                                    <p class="text-center quatitle underline">
                                                                        {{ langbind($coupondetails->merchant, 'name') }}
                                                                    </p>
                                                                @endif
                                                                <p data-id="collect-detail-modal`+i+`"
                                                                    class="company-name text-darkgray cursor-pointer">
                                                                    {{ langbind($coupondetails, 'name') }}</p>
                                                                {{-- <p class="ctitle text-darkgray">
                                                                    {{ langbind($coupondetails, 'sub_title') }}</p>
                                                                <div class="flex justify-start items-center flex-wrap">
                                                                    <p class="ccategory text-lightgray new-ccategory">
                                                                        <svg width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M12.492 11.41C12.4697 11.2871 12.4023 11.1769 12.3028 11.1012C12.2034 11.0255 12.0793 10.9898 11.9548 11.0011C11.8304 11.0124 11.7147 11.0699 11.6305 11.1622C11.5463 11.2545 11.4998 11.3751 11.5 11.5V16.002L11.508 16.092C11.5303 16.2149 11.5977 16.3251 11.6972 16.4008C11.7966 16.4765 11.9207 16.5122 12.0452 16.5009C12.1696 16.4896 12.2853 16.4321 12.3695 16.3398C12.4537 16.2475 12.5002 16.1269 12.5 16.002V11.5L12.492 11.41ZM12.799 9.25C12.799 9.05109 12.72 8.86032 12.5793 8.71967C12.4387 8.57902 12.2479 8.5 12.049 8.5C11.8501 8.5 11.6593 8.57902 11.5187 8.71967C11.378 8.86032 11.299 9.05109 11.299 9.25C11.299 9.44891 11.378 9.63968 11.5187 9.78033C11.6593 9.92098 11.8501 10 12.049 10C12.2479 10 12.4387 9.92098 12.5793 9.78033C12.72 9.63968 12.799 9.44891 12.799 9.25ZM20 12.5C20 10.3783 19.1571 8.34344 17.6569 6.84315C16.1566 5.34285 14.1217 4.5 12 4.5C9.87827 4.5 7.84344 5.34285 6.34315 6.84315C4.84285 8.34344 4 10.3783 4 12.5C4 14.6217 4.84285 16.6566 6.34315 18.1569C7.84344 19.6571 9.87827 20.5 12 20.5C14.1217 20.5 16.1566 19.6571 17.6569 18.1569C19.1571 16.6566 20 14.6217 20 12.5ZM5 12.5C5 11.5807 5.18106 10.6705 5.53284 9.82122C5.88463 8.97194 6.40024 8.20026 7.05025 7.55025C7.70026 6.90024 8.47194 6.38463 9.32122 6.03284C10.1705 5.68106 11.0807 5.5 12 5.5C12.9193 5.5 13.8295 5.68106 14.6788 6.03284C15.5281 6.38463 16.2997 6.90024 16.9497 7.55025C17.5998 8.20026 18.1154 8.97194 18.4672 9.82122C18.8189 10.6705 19 11.5807 19 12.5C19 14.3565 18.2625 16.137 16.9497 17.4497C15.637 18.7625 13.8565 19.5 12 19.5C10.1435 19.5 8.36301 18.7625 7.05025 17.4497C5.7375 16.137 5 14.3565 5 12.5Z"
                                                                                fill="#7C7C7C"></path>
                                                                        </svg>
                                                                        @if($coupondetails->coupon_type ===null)
                                                                            @lang('labels.my_coupon.valid_from')
                                                                            @if(lang() == "en")
                                                                            {{ date('d M Y', strtotime($coupondetails->start_date)) }} 
                                                                            @else 
                                                                                {{ date('Y年m月d日', strtotime($coupondetails->start_date)) }}
                                                                            @endif
                                                                            @lang('labels.my_coupon.to')
                                                                            @if(lang() == "en")
                                                                            {{ date('d M Y', strtotime($coupondetails->end_date)) }}
                                                                            @else 
                                                                                {{ date('Y年m月d日', strtotime($coupondetails->end_date)) }}
                                                                            @endif
                                                                        @else
                                                                            @php
                                                                                    // check welcome coupon
                                                                                    if($coupondetails->coupon_type === 1) {
                                                                                        $from_date = date('Y-m-d', strtotime($coupondetails->created_at));
                                                                                        $to_date = date('Y-m-d', strtotime($coupondetails->created_at. ' +30 days'));
                                                                                    }

                                                                                    // check birthday coupon
                                                                                    if($coupondetails->coupon_type === 0) {
                                                                                        $birthdayMonth = date('F', strtotime(Auth::guard('customer')->user()->dob));
                                                                                        $birthdayCurrentYear = "$birthdayMonth,".date('Y');
                                                                                        $from_date = date('Y-m-01', strtotime("$birthdayCurrentYear"));
                                                                                        $to_date =  date('Y-m-t', strtotime("$birthdayCurrentYear"));
                                                                                    }
                                                                            @endphp
                                                                            @lang('labels.coupon.offer_expires')
                                                                            {{$to_date}}
                                                                        @endif
                                                                    </p>
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                        @php $startCheck = false; @endphp
                                                        @if(count($coupondetails->couponProducts)>0) @php $startCheck=true; @endphp @endif
                                                        @if(count($coupondetails->coupon_sub_categories_products)>0) @php $startCheck=true; @endphp @endif
                                                        @if(count($coupondetails->coupon_categories_products)>0) @php $startCheck=true; @endphp @endif
                                                        <button data-related="#drc-popup{{ $coupondetails->id }}"
                                                            class="{{$startCheck==false?'click-disable':''}} qua-collect-btn-content w-[131px] font-secondary font-bold me-body16 inline-block py-[10px] px-5 border border-darkgray text-center hover:bg-blueMediq hover:border-blueMediq hover:text-whitez rounded-full related-products">@lang('labels.coupon_list.related_products')</button>
                                                    </div>
                                                </div>
                                                <div class="custom-divider">
                                                </div>
                                                <div class="cscard-container">

                                                    <div class="mb-[27px] last:mb-0">
                                                        <h6 class="text-darkgray contitle mb-[10px]">@lang('labels.promotion_period')</h6>
                                                        @php
                                                            // check welcome coupon
                                                            if($coupondetails->coupon_type === 1) {
                                                                $from_date = date('Y-m-d', strtotime($coupondetails->created_at));
                                                                $to_date = date('Y-m-d', strtotime($coupondetails->created_at. ' +30 days'));
                                                            }

                                                            // check birthday coupon
                                                            if($coupondetails->coupon_type === 0) {
                                                                $birthdayMonth = date('F', strtotime(Auth::guard('customer')->user()->dob));
                                                                $birthdayCurrentYear = "$birthdayMonth,".date('Y');
                                                                $from_date = date('Y-m-01', strtotime("$birthdayCurrentYear"));
                                                                $to_date =  date('Y-m-t', strtotime("$birthdayCurrentYear"));
                                                            }
                                                        @endphp
                                                        <div class="condes text-darkgray">
                                                            @if($coupondetails->coupon_type===null)
                                                            @php
                                                                $customer_id = Auth::guard('customer')->user() != null ? Auth::guard('customer')->user()->id : '';
                                                                $item = App\Models\CouponCollect::where('coupon_id', $coupondetails->id)
                                                                    ->where('customer_id', $customer_id)
                                                                    ->first();
                                                                $end_date = "";
                                                                if($item!=null) {
                                                                    if($coupondetails->usage_time!=null) {
                                                                        if(lang() == "en")
                                                                        {
                                                                            $end_date = \Carbon\Carbon::parse($item->created_at)->addDays($coupondetails->usage_time)->format('d M Y');
                                                                        }else{
                                                                            $end_date = \Carbon\Carbon::parse($item->created_at)->addDays($coupondetails->usage_time)->format('Y年m月d日');
                                                                        }
                                                                    }
                                                                }
                                                            @endphp
                                                           @if(lang() == "en"){{ date('d M Y', strtotime($coupondetails->start_date)) }}@else {{ date('Y年m月d日', strtotime($coupondetails->start_date))}} @endif - @if(lang() == "en"){{ $end_date!=""?$end_date:date('d M Y', strtotime($coupondetails->end_date)) }}@else {{ $end_date!=""?$end_date:date('Y年m月d日', strtotime($coupondetails->end_date))}}@endif
                                                            @else
                                                            {{$from_date}}
                                                            to
                                                            {{$to_date}}
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="mb-[27px] last:mb-0">
                                                        {{-- <h6 class="text-darkgray contitle mb-[10px]">@lang('labels.coupon.terms_and_conditions')</h6> --}}
                                                        <div class="condes text-darkgray">{!! langbind($coupondetails, 'content') !!}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                        @include('frontend.customer.empty-coupon')
                                    @endforelse
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="mdinner-view vaccine {{ $selectedCategory == 'Vaccine' ? '' : 'hidden' }}">
                        <div component-name="dashboard-available-layout">
                            <div component-name="dashboard-innerview" class="flex flex-wrap dashinnerview">
                                @if ($mainTag == 'available' && $selectedCategory == 'Vaccine')
                                <div class="grid lg:grid-cols-2 grid-cols-1 lg:gap-x-10 lg:gap-y-5 dashboard-coupons-list w-full">
                                    @forelse ($couponList as $key => $coupondetails)
                                        <div component-name="dashboard-coupon-card" class="simple-coupon-card">
                                            <div class="w-full small-coupon--container">
                                                <div class="relative">
                                                    <div class="custom-voucher-shape gccard rounded-[20px]">
                                                        <div class="gccard-content text-center">
                                                            <div data-id="#collect-detail-modal{{ $coupondetails->id }}"
                                                                class="cclogo-container cursor-pointer show-detail-popup">
                                                                <div class="rounded-full">
                                                                    @if($coupondetails->owner_type==0)
                                                                    <img class="cclogo w-[80px] h-[80px]" src="{{$coupondetails->icon}}">
                                                                    @else
                                                                    <img class="cclogo w-[80px] h-[80px]" src="{{isset($coupondetails->merchant) ? $coupondetails->merchant->icon :'' }}">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="gccard-content-body show-detail-popup">
                                                                <div data-id="#collect-detail-modal{{ $coupondetails->id }}"
                                                                    class="cursor-pointer coupon-see-detail">
                                                                    <p
                                                                        class="company-name text-darkgray helvetica-normal cursor-pointer font-bold">
                                                                        {{ langbind($coupondetails, 'name') }}</p>
                                                                    <p
                                                                        class="ctitle me-body16 helvetica-normal text-darkgray">
                                                                        {{ langbind($coupondetails, 'sub_title') }}</p>
                                                                    <div
                                                                        class="flex justify-start items-center flex-wrap me-body15 helvetica-normal py-5">
                                                                        <p
                                                                            class="ccategory text-lightgray new-ccategory">
                                                                            <svg width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M12.492 11.41C12.4697 11.2871 12.4023 11.1769 12.3028 11.1012C12.2034 11.0255 12.0793 10.9898 11.9548 11.0011C11.8304 11.0124 11.7147 11.0699 11.6305 11.1622C11.5463 11.2545 11.4998 11.3751 11.5 11.5V16.002L11.508 16.092C11.5303 16.2149 11.5977 16.3251 11.6972 16.4008C11.7966 16.4765 11.9207 16.5122 12.0452 16.5009C12.1696 16.4896 12.2853 16.4321 12.3695 16.3398C12.4537 16.2475 12.5002 16.1269 12.5 16.002V11.5L12.492 11.41ZM12.799 9.25C12.799 9.05109 12.72 8.86032 12.5793 8.71967C12.4387 8.57902 12.2479 8.5 12.049 8.5C11.8501 8.5 11.6593 8.57902 11.5187 8.71967C11.378 8.86032 11.299 9.05109 11.299 9.25C11.299 9.44891 11.378 9.63968 11.5187 9.78033C11.6593 9.92098 11.8501 10 12.049 10C12.2479 10 12.4387 9.92098 12.5793 9.78033C12.72 9.63968 12.799 9.44891 12.799 9.25ZM20 12.5C20 10.3783 19.1571 8.34344 17.6569 6.84315C16.1566 5.34285 14.1217 4.5 12 4.5C9.87827 4.5 7.84344 5.34285 6.34315 6.84315C4.84285 8.34344 4 10.3783 4 12.5C4 14.6217 4.84285 16.6566 6.34315 18.1569C7.84344 19.6571 9.87827 20.5 12 20.5C14.1217 20.5 16.1566 19.6571 17.6569 18.1569C19.1571 16.6566 20 14.6217 20 12.5ZM5 12.5C5 11.5807 5.18106 10.6705 5.53284 9.82122C5.88463 8.97194 6.40024 8.20026 7.05025 7.55025C7.70026 6.90024 8.47194 6.38463 9.32122 6.03284C10.1705 5.68106 11.0807 5.5 12 5.5C12.9193 5.5 13.8295 5.68106 14.6788 6.03284C15.5281 6.38463 16.2997 6.90024 16.9497 7.55025C17.5998 8.20026 18.1154 8.97194 18.4672 9.82122C18.8189 10.6705 19 11.5807 19 12.5C19 14.3565 18.2625 16.137 16.9497 17.4497C15.637 18.7625 13.8565 19.5 12 19.5C10.1435 19.5 8.36301 18.7625 7.05025 17.4497C5.7375 16.137 5 14.3565 5 12.5Z"
                                                                                    fill="#7C7C7C"></path>
                                                                            </svg>
                                                                            @if($coupondetails->coupon_type ===null)
                                                                            @lang('labels.my_coupon.valid_from')
                                                                            @if(lang() == "en")
                                                                            {{ date('d M Y', strtotime($coupondetails->start_date)) }} 
                                                                            @else 
                                                                                {{ date('Y年m月d日', strtotime($coupondetails->start_date)) }}
                                                                            @endif
                                                                            @lang('labels.my_coupon.to')
                                                                            @if(lang() == "en")
                                                                            {{ date('d M Y', strtotime($coupondetails->end_date)) }}
                                                                            @else 
                                                                                {{ date('Y年m月d日', strtotime($coupondetails->end_date)) }}
                                                                            @endif
                                                                                {{-- @if ($coupondetails->usage_time)
                                                                                    Once collected, valid for
                                                                                    {{ $coupondetails->usage_time }} days
                                                                                @else
                                                                                @lang('labels.coupon.offer_expires')
                                                                                    {{ date('d M Y', strtotime($coupondetails->end_date)) }}
                                                                                @endif --}}
                                                                            @else
                                                                            @php
                                                                                    // check welcome coupon
                                                                                    if($coupondetails->coupon_type === 1) {
                                                                                        $from_date = date('Y-m-d', strtotime($coupondetails->created_at));
                                                                                        $to_date = date('Y-m-d', strtotime($coupondetails->created_at. ' +30 days'));
                                                                                    }

                                                                                    // check birthday coupon
                                                                                    if($coupondetails->coupon_type === 0) {
                                                                                        $birthdayMonth = date('F', strtotime(Auth::guard('customer')->user()->dob));
                                                                                        $birthdayCurrentYear = "$birthdayMonth,".date('Y');
                                                                                        $from_date = date('Y-m-01', strtotime("$birthdayCurrentYear"));
                                                                                        $to_date =  date('Y-m-t', strtotime("$birthdayCurrentYear"));
                                                                                    }
                                                                            @endphp
                                                                            @lang('labels.coupon.offer_expires')
                                                                            {{$to_date}}
                                                                            @endif
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @php $startCheck = false; @endphp
                                                                @if(count($coupondetails->couponProducts)>0) @php $startCheck=true; @endphp @endif
                                                                @if(count($coupondetails->coupon_sub_categories_products)>0) @php $startCheck=true; @endphp @endif
                                                                @if(count($coupondetails->coupon_categories_products)>0) @php $startCheck=true; @endphp @endif
                                                                <button
                                                                    data-related="#drc-popup{{ $coupondetails->id }}"
                                                                    class="{{$startCheck==false?'click-disable':''}} flex items-center justify-between px-[16px] py-[8px] rounded-[6px] bg-far me-body16 helvetica-normal text-darkgray h-[35px] related-products">
                                                                    @lang('labels.coupon_list.related_products')
                                                                    <svg width="16" height="17"
                                                                        viewBox="0 0 16 17" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M5 14.5L11 8.5L5 2.5"
                                                                            stroke="#333333" stroke-width="2.4"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round"></path>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                            <div class="gccard-content-bottom">
                                                                <button
                                                                    class="text-blueMediq flex justify-center mx-auto me-body20 helvetica-normal font-bold detail-btn"
                                                                    data-id="#collect-detail-modal{{ $coupondetails->id }}">@lang('labels.my_coupon.received')</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <dialog id="drc-popup{{$coupondetails->id}}" component-name="dashboard-related-card"
                                            class="dash-rc-popup items-center justify-center fixed z-[1001] left-0 top-0 w-full h-full bg-black/[.75] overflow-hidden">
                                            <div
                                                class="modal-content w-full max-w-[90%] 4xs:max-w-[80%] lg:max-w-[578px] shadow-shadow02 my-[15%] mx-auto">
                                                <div class="relative rounded-[12px] bg-white">
                                                    <div class="flex ml-auto mr-6 w-5 h-5 absolute right-0 top-4">
                                                        <span data-id="drc-popup{{$coupondetails->id}}" class="pb-[4px] absolute left-1/2 top-1/2 -translate-y-1/2 -translate-x-1/2 close-add-compare-modal  flex items-center justify-center text-[32px] w-full cursor-pointer text-[#1A1818] focus:no-underline related-product-btn">×</span>
                                                    </div>
                                                    <div class="modal-content-plan">
                                                        <div class="preview-bgradient p-10 rounded-t-[12px]">
                                                            <h2 class="font-secondary font-bold text-darkgray me-body23">@lang('labels.coupon_list.related_products')</h2>
                                                        </div>

                                                        <div class="bg-white p-10 pt-5 pr-[24px] rounded-b-[12px]">
                                                            <div class="flex flex-col compare-box-container">
                                                                @php $startCheck = false; @endphp
                                                                @if(count($coupondetails->couponProducts)>0) @php $startCheck=true; @endphp @endif
                                                                @foreach ($coupondetails->couponProducts as $data)
                                                                    @php $productdetails = \App\Models\Product::find($data->product_id); @endphp
                                                                    @if($productdetails->is_published == 1)
                                                                    <div
                                                                        class="relative flex items-center py-5 compare-img-container">
                                                                        <div class="mr-[12px]">
                                                                            <img src="{{ $productdetails->featured_img }}"
                                                                                alt="image"
                                                                                class="w-[80px] h-[80px] rounded-[12px]">
                                                                        </div>
                                                                        <div>
                                                                            <a href="{{route("product-detail",['slug'=>$productdetails->slug_en,'category'=>$productdetails->category->name_en])}}">
                                                                            <p
                                                                                class="w-[307px] leading-tight helvetica-normal text-darkgray font-bold me-body18 title">
                                                                                {{ langbind($productdetails, 'name') }}
                                                                            </p>
                                                                            </a>
                                                                            <div class="flex items-center">
                                                                                <p class="font-bold text-mered me-body20">
                                                                                   @if($productdetails->promotion_price!=null)
                                                                                    ${{ $productdetails->promotion_price }}
                                                                                     @else
                                                                                    @if($productdetails->discount_price!=null)
                                                                                    ${{ $productdetails->discount_price }}
                                                                                    @endif
                                                                                    @endif
                                                                                    @if($productdetails->promotion_price==null&& $productdetails->discount_price==null)
                                                                                    ${{ $productdetails->original_price }}
                                                                                    @endif
                                                                                </p>
                                                                                @if($productdetails->promotion_price!=null || $productdetails->discount_price!=null)
                                                                                <p
                                                                                    class="font-bold text-lightgray me-body14 pl-[10px]">
                                                                                    $
                                                                                    <span class="linethrough">{{ $productdetails->original_price }}</span>
                                                                                </p>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                @endforeach

                                                                @php $subCategoriesArray = []; @endphp
                                                                @if($startCheck == false)
                                                                @if(count($coupondetails->coupon_sub_categories_products)>0) @php $startCheck=true; @endphp @endif
                                                                @foreach ($coupondetails->couponSubCategories as $data)
                                                                    @php array_push($subCategoriesArray,$data->sub_category_id); @endphp
                                                                @endforeach
                                                                @php
                                                                $productList = \App\Models\Product::whereIn("sub_category_id",$subCategoriesArray)->get();
                                                                @endphp
                                                                @foreach($productList as $productdetails)
                                                                {{-- @php $productdetails = \App\Models\Product::find($pdata); @endphp --}}
                                                                @if($productdetails->is_published == 1)
                                                                <div
                                                                    class="relative flex items-center py-5 compare-img-container">
                                                                        <div class="mr-[12px]">
                                                                        <img src="{{ $productdetails->featured_img }}"
                                                                            alt="image"
                                                                            class="w-[80px] h-[80px] rounded-[12px]">
                                                                        </div>
                                                                        <div>
                                                                            <a href="{{route("product-detail",['slug'=>$productdetails->slug_en,'category'=>$productdetails->category->name_en])}}">
                                                                            <p
                                                                                class="w-[307px] leading-tight helvetica-normal text-darkgray font-bold me-body18 title">
                                                                                {{ langbind($productdetails, 'name') }}
                                                                            </p>
                                                                            </a>
                                                                            <div class="flex items-center">
                                                                                <p class="font-bold text-mered me-body20">
                                                                                   @if($productdetails->promotion_price!=null)
                                                                                    ${{ $productdetails->promotion_price }}
                                                                                     @else
                                                                                    @if($productdetails->discount_price!=null)
                                                                                    ${{ $productdetails->discount_price }}
                                                                                    @endif
                                                                                    @endif
                                                                                    @if($productdetails->promotion_price==null&& $productdetails->discount_price==null)
                                                                                    ${{ $productdetails->original_price }}
                                                                                    @endif
                                                                                </p>
                                                                                @if($productdetails->promotion_price!=null || $productdetails->discount_price!=null)
                                                                                <p
                                                                                    class="font-bold text-lightgray me-body14 pl-[10px]">
                                                                                    $
                                                                                    <span class="linethrough">{{ $productdetails->original_price }}</span>
                                                                                </p>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                @endif
                                                                @endforeach
                                                                @endif

                                                                @php $categoriesArray = []; @endphp
                                                                @if($startCheck == false)
                                                                @if(count($coupondetails->coupon_categories_products)>0) @php $startCheck=true; @endphp @endif
                                                                @foreach ($coupondetails->couponCategories as $data)
                                                                    @php array_push($categoriesArray,$data->category_id); @endphp
                                                                @endforeach
                                                                @php
                                                                $productList = \App\Models\Product::whereIn("category_id",$categoriesArray)->get();
                                                                @endphp
                                                                @foreach($productList as $productdetails)
                                                                {{-- @php $productdetails = \App\Models\Product::find($pdata); @endphp --}}
                                                                @if($productdetails->is_published == 1)
                                                                <div
                                                                    class="relative flex items-center py-5 compare-img-container">
                                                                        <div class="mr-[12px]">
                                                                        <img src="{{ $productdetails->featured_img }}"
                                                                            alt="image"
                                                                            class="w-[80px] h-[80px] rounded-[12px]">
                                                                        </div>
                                                                        <div>
                                                                            <a href="{{route("product-detail",['slug'=>$productdetails->slug_en,'category'=>$productdetails->category->name_en])}}">
                                                                            <p
                                                                                class="w-[307px] leading-tight helvetica-normal text-darkgray font-bold me-body18 title">
                                                                                {{ langbind($productdetails, 'name') }}
                                                                            </p>
                                                                            </a>
                                                                            <div class="flex items-center">
                                                                                <p class="font-bold text-mered me-body20">
                                                                                   @if($productdetails->promotion_price!=null)
                                                                                    ${{ $productdetails->promotion_price }}
                                                                                     @else
                                                                                    @if($productdetails->discount_price!=null)
                                                                                    ${{ $productdetails->discount_price }}
                                                                                    @endif
                                                                                    @endif
                                                                                    @if($productdetails->promotion_price==null&& $productdetails->discount_price==null)
                                                                                    ${{ $productdetails->original_price }}
                                                                                    @endif
                                                                                </p>
                                                                                @if($productdetails->promotion_price!=null || $productdetails->discount_price!=null)
                                                                                <p
                                                                                    class="font-bold text-lightgray me-body14 pl-[10px]">
                                                                                    $
                                                                                    <span class="linethrough">{{ $productdetails->original_price }}</span>
                                                                                </p>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                @endif
                                                                @endforeach
                                                                @endif

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </dialog>
                                        <div component-name="me-coupon-collect-detail" class="collect-detail-modal"
                                            id="collect-detail-modal{{ $coupondetails->id }}">
                                            <div class="rounded-[20px] view-bundle-modal--container">
                                                <div class="bg-image w-full p-[40px] pb-[20px] relative">
                                                    <button
                                                        class="cdmodal-close absolute top-[25px] right-[45px] cursor-pointer"><img
                                                            src="{{ asset('frontend/img/white-close.svg') }}"
                                                            alt="close image"></button>
                                                    {{-- <div class="">
                                                        <h6 class="coupon-detail-title">@lang('labels.coupon.coupon_details')</h6>
                                                    </div> --}}
                                                    <div
                                                        class="flex flex-wrap sm:flex-nowrap items-center justify-between py-[10px] qucollectd">
                                                        <div class="relative bg-title flex justify-start items-center">
                                                            <div class="quantity-logo-container mr-[12px] relative">
                                                                @if($coupondetails->owner_type==0)
                                                                <img class="quantity-logo w-[100px] h-[100px]]" src="{{$coupondetails->icon}}">
                                                                @else
                                                                <img class="quantity-logo w-[100px] h-[100px]]" src="{{isset($coupondetails->merchant) ? $coupondetails->merchant->icon :'' }}">
                                                                @endif
                                                                @if($coupondetails->is_new_or_limited != null)
                                                                    @foreach (config('mediq.coupon_status') as $key => $type)
                                                                        @if ($key == $coupondetails->is_new_or_limited)
                                                                            <div class="label-tag absolute top-0 left-0 {{$coupondetails->is_new_or_limited=="new"?'new':'new-limit'}} px-[10px] py-[4px] rounded-[4px]">
                                                                                    {{ $type }}
                                                                            </div>
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                                {{-- <div
                                                                    class="label-tag absolute top-0 left-0 {{$coupondetails->is_new_or_limited=="new"?'new':'new-limit'}} px-[10px] py-[4px] rounded-[4px] 3">
                                                                    @foreach (config('mediq.coupon_status') as $key => $type)
                                                                        @if ($key == $coupondetails->is_new_or_limited)
                                                                            {{ $type }}3
                                                                        @endif
                                                                    @endforeach
                                                                </div> --}}
                                                            </div>
                                                            <div>
                                                                @if (isset($coupondetails->merchant_id))
                                                                    <p class="text-center quatitle underline">
                                                                        {{ langbind($coupondetails->merchant, 'name') }}
                                                                    </p>
                                                                @endif
                                                                <p data-id="collect-detail-modal`+i+`"
                                                                    class="company-name text-darkgray cursor-pointer">
                                                                    {{ langbind($coupondetails, 'name') }}</p>
                                                                {{-- <p class="ctitle text-darkgray">
                                                                    {{ langbind($coupondetails, 'sub_title') }}</p>
                                                                <div class="flex justify-start items-center flex-wrap">
                                                                    <p class="ccategory text-lightgray new-ccategory">
                                                                        <svg width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M12.492 11.41C12.4697 11.2871 12.4023 11.1769 12.3028 11.1012C12.2034 11.0255 12.0793 10.9898 11.9548 11.0011C11.8304 11.0124 11.7147 11.0699 11.6305 11.1622C11.5463 11.2545 11.4998 11.3751 11.5 11.5V16.002L11.508 16.092C11.5303 16.2149 11.5977 16.3251 11.6972 16.4008C11.7966 16.4765 11.9207 16.5122 12.0452 16.5009C12.1696 16.4896 12.2853 16.4321 12.3695 16.3398C12.4537 16.2475 12.5002 16.1269 12.5 16.002V11.5L12.492 11.41ZM12.799 9.25C12.799 9.05109 12.72 8.86032 12.5793 8.71967C12.4387 8.57902 12.2479 8.5 12.049 8.5C11.8501 8.5 11.6593 8.57902 11.5187 8.71967C11.378 8.86032 11.299 9.05109 11.299 9.25C11.299 9.44891 11.378 9.63968 11.5187 9.78033C11.6593 9.92098 11.8501 10 12.049 10C12.2479 10 12.4387 9.92098 12.5793 9.78033C12.72 9.63968 12.799 9.44891 12.799 9.25ZM20 12.5C20 10.3783 19.1571 8.34344 17.6569 6.84315C16.1566 5.34285 14.1217 4.5 12 4.5C9.87827 4.5 7.84344 5.34285 6.34315 6.84315C4.84285 8.34344 4 10.3783 4 12.5C4 14.6217 4.84285 16.6566 6.34315 18.1569C7.84344 19.6571 9.87827 20.5 12 20.5C14.1217 20.5 16.1566 19.6571 17.6569 18.1569C19.1571 16.6566 20 14.6217 20 12.5ZM5 12.5C5 11.5807 5.18106 10.6705 5.53284 9.82122C5.88463 8.97194 6.40024 8.20026 7.05025 7.55025C7.70026 6.90024 8.47194 6.38463 9.32122 6.03284C10.1705 5.68106 11.0807 5.5 12 5.5C12.9193 5.5 13.8295 5.68106 14.6788 6.03284C15.5281 6.38463 16.2997 6.90024 16.9497 7.55025C17.5998 8.20026 18.1154 8.97194 18.4672 9.82122C18.8189 10.6705 19 11.5807 19 12.5C19 14.3565 18.2625 16.137 16.9497 17.4497C15.637 18.7625 13.8565 19.5 12 19.5C10.1435 19.5 8.36301 18.7625 7.05025 17.4497C5.7375 16.137 5 14.3565 5 12.5Z"
                                                                                fill="#7C7C7C"></path>
                                                                        </svg>
                                                                        @if($coupondetails->coupon_type ===null)
                                                                            @lang('labels.my_coupon.valid_from')
                                                                            @if(lang() == "en")
                                                                            {{ date('d M Y', strtotime($coupondetails->start_date)) }} 
                                                                            @else 
                                                                                {{ date('Y年m月d日', strtotime($coupondetails->start_date)) }}
                                                                            @endif
                                                                            @lang('labels.my_coupon.to')
                                                                            @if(lang() == "en")
                                                                            {{ date('d M Y', strtotime($coupondetails->end_date)) }}
                                                                            @else 
                                                                                {{ date('Y年m月d日', strtotime($coupondetails->end_date)) }}
                                                                            @endif
                                                                        @else
                                                                        @php
                                                                                // check welcome coupon
                                                                                if($coupondetails->coupon_type === 1) {
                                                                                    $from_date = date('Y-m-d', strtotime($coupondetails->created_at));
                                                                                    $to_date = date('Y-m-d', strtotime($coupondetails->created_at. ' +30 days'));
                                                                                }

                                                                                // check birthday coupon
                                                                                if($coupondetails->coupon_type === 0) {
                                                                                    $birthdayMonth = date('F', strtotime(Auth::guard('customer')->user()->dob));
                                                                                    $birthdayCurrentYear = "$birthdayMonth,".date('Y');
                                                                                    $from_date = date('Y-m-01', strtotime("$birthdayCurrentYear"));
                                                                                    $to_date =  date('Y-m-t', strtotime("$birthdayCurrentYear"));
                                                                                }
                                                                        @endphp
                                                                        @lang('labels.coupon.offer_expires')
                                                                        {{$to_date}}
                                                                        @endif
                                                                    </p>
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                        @php $startCheck = false; @endphp
                                                        @if(count($coupondetails->couponProducts)>0) @php $startCheck=true; @endphp @endif
                                                        @if(count($coupondetails->coupon_sub_categories_products)>0) @php $startCheck=true; @endphp @endif
                                                        @if(count($coupondetails->coupon_categories_products)>0) @php $startCheck=true; @endphp @endif
                                                        <button data-related="#drc-popup{{ $coupondetails->id }}"
                                                            class="{{$startCheck==false?'click-disable':''}} qua-collect-btn-content w-[131px] font-secondary font-bold me-body16 inline-block py-[10px] px-5 border border-darkgray text-center hover:bg-blueMediq hover:border-blueMediq hover:text-whitez rounded-full related-products">@lang('labels.coupon_list.related_products')</button>
                                                    </div>
                                                </div>
                                                <div class="custom-divider">
                                                </div>
                                                <div class="cscard-container">

                                                    <div class="mb-[27px] last:mb-0">
                                                        <h6 class="text-darkgray contitle mb-[10px]">@lang('labels.promotion_period')</h6>
                                                        @php
                                                            // check welcome coupon
                                                            if($coupondetails->coupon_type === 1) {
                                                                $from_date = date('Y-m-d', strtotime($coupondetails->created_at));
                                                                $to_date = date('Y-m-d', strtotime($coupondetails->created_at. ' +30 days'));
                                                            }

                                                            // check birthday coupon
                                                            if($coupondetails->coupon_type === 0) {
                                                                $birthdayMonth = date('F', strtotime(Auth::guard('customer')->user()->dob));
                                                                $birthdayCurrentYear = "$birthdayMonth,".date('Y');
                                                                $from_date = date('Y-m-01', strtotime("$birthdayCurrentYear"));
                                                                $to_date =  date('Y-m-t', strtotime("$birthdayCurrentYear"));
                                                            }
                                                        @endphp
                                                        <div class="condes text-darkgray">
                                                            @if($coupondetails->coupon_type===null)
                                                            @php
                                                                $customer_id = Auth::guard('customer')->user() != null ? Auth::guard('customer')->user()->id : '';
                                                                $item = App\Models\CouponCollect::where('coupon_id', $coupondetails->id)
                                                                    ->where('customer_id', $customer_id)
                                                                    ->first();
                                                                $end_date = "";
                                                                if($item!=null) {
                                                                    if($coupondetails->usage_time!=null) {
                                                                        if(lang() == "en")
                                                                        {
                                                                            $end_date = \Carbon\Carbon::parse($item->created_at)->addDays($coupondetails->usage_time)->format('d M Y');
                                                                        }else{
                                                                            $end_date = \Carbon\Carbon::parse($item->created_at)->addDays($coupondetails->usage_time)->format('Y年m月d日');
                                                                        }
                                                                    }
                                                                }
                                                            @endphp
                                                           @if(lang() == "en"){{ date('d M Y', strtotime($coupondetails->start_date)) }}@else {{ date('Y年m月d日', strtotime($coupondetails->start_date))}} @endif - @if(lang() == "en"){{ $end_date!=""?$end_date:date('d M Y', strtotime($coupondetails->end_date)) }}@else {{ $end_date!=""?$end_date:date('Y年m月d日', strtotime($coupondetails->end_date))}}@endif
                                                            @else
                                                            {{$from_date}}
                                                            to
                                                            {{$to_date}}
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="mb-[27px] last:mb-0">
                                                        {{-- <h6 class="text-darkgray contitle mb-[10px]">@lang('labels.coupon.terms_and_conditions')</h6> --}}
                                                        <div class="condes text-darkgray">{!! langbind($coupondetails, 'content') !!}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                        @include('frontend.customer.empty-coupon')
                                    @endforelse
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="mdinner-view dna-test {{ $selectedCategory == 'DNA Test' ? '' : 'hidden' }}">
                        <div component-name="dashboard-available-layout">
                            <div component-name="dashboard-innerview" class="flex flex-wrap dashinnerview">
                                @if ($mainTag == 'available' && $selectedCategory == 'DNA Test')
                                <div class="grid lg:grid-cols-2 grid-cols-1 lg:gap-x-10 lg:gap-y-5 dashboard-coupons-list w-full">
                                    @forelse ($couponList as $key => $coupondetails)
                                        <div component-name="dashboard-coupon-card" class="simple-coupon-card">
                                            <div class="w-full small-coupon--container">
                                                <div class="relative">
                                                    <div class="custom-voucher-shape gccard rounded-[20px]">
                                                        <div class="gccard-content text-center">
                                                            <div data-id="#collect-detail-modal{{ $coupondetails->id }}"
                                                                class="cclogo-container cursor-pointer show-detail-popup">
                                                                <div class="rounded-full">
                                                                    @if($coupondetails->owner_type==0)
                                                                    <img class="cclogo w-[80px] h-[80px]" src="{{$coupondetails->icon}}">
                                                                    @else
                                                                    <img class="cclogo w-[80px] h-[80px]" src="{{isset($coupondetails->merchant) ? $coupondetails->merchant->icon :'' }}">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="gccard-content-body show-detail-popup">
                                                                <div data-id="#collect-detail-modal{{ $coupondetails->id }}"
                                                                    class="cursor-pointer coupon-see-detail">
                                                                    <p
                                                                        class="company-name text-darkgray helvetica-normal cursor-pointer font-bold">
                                                                        {{ langbind($coupondetails, 'name') }}</p>
                                                                    <p
                                                                        class="ctitle me-body16 helvetica-normal text-darkgray">
                                                                        {{ langbind($coupondetails, 'sub_title') }}</p>
                                                                    <div
                                                                        class="flex justify-start items-center flex-wrap me-body15 helvetica-normal py-5">
                                                                        <p
                                                                            class="ccategory text-lightgray new-ccategory">
                                                                            <svg width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M12.492 11.41C12.4697 11.2871 12.4023 11.1769 12.3028 11.1012C12.2034 11.0255 12.0793 10.9898 11.9548 11.0011C11.8304 11.0124 11.7147 11.0699 11.6305 11.1622C11.5463 11.2545 11.4998 11.3751 11.5 11.5V16.002L11.508 16.092C11.5303 16.2149 11.5977 16.3251 11.6972 16.4008C11.7966 16.4765 11.9207 16.5122 12.0452 16.5009C12.1696 16.4896 12.2853 16.4321 12.3695 16.3398C12.4537 16.2475 12.5002 16.1269 12.5 16.002V11.5L12.492 11.41ZM12.799 9.25C12.799 9.05109 12.72 8.86032 12.5793 8.71967C12.4387 8.57902 12.2479 8.5 12.049 8.5C11.8501 8.5 11.6593 8.57902 11.5187 8.71967C11.378 8.86032 11.299 9.05109 11.299 9.25C11.299 9.44891 11.378 9.63968 11.5187 9.78033C11.6593 9.92098 11.8501 10 12.049 10C12.2479 10 12.4387 9.92098 12.5793 9.78033C12.72 9.63968 12.799 9.44891 12.799 9.25ZM20 12.5C20 10.3783 19.1571 8.34344 17.6569 6.84315C16.1566 5.34285 14.1217 4.5 12 4.5C9.87827 4.5 7.84344 5.34285 6.34315 6.84315C4.84285 8.34344 4 10.3783 4 12.5C4 14.6217 4.84285 16.6566 6.34315 18.1569C7.84344 19.6571 9.87827 20.5 12 20.5C14.1217 20.5 16.1566 19.6571 17.6569 18.1569C19.1571 16.6566 20 14.6217 20 12.5ZM5 12.5C5 11.5807 5.18106 10.6705 5.53284 9.82122C5.88463 8.97194 6.40024 8.20026 7.05025 7.55025C7.70026 6.90024 8.47194 6.38463 9.32122 6.03284C10.1705 5.68106 11.0807 5.5 12 5.5C12.9193 5.5 13.8295 5.68106 14.6788 6.03284C15.5281 6.38463 16.2997 6.90024 16.9497 7.55025C17.5998 8.20026 18.1154 8.97194 18.4672 9.82122C18.8189 10.6705 19 11.5807 19 12.5C19 14.3565 18.2625 16.137 16.9497 17.4497C15.637 18.7625 13.8565 19.5 12 19.5C10.1435 19.5 8.36301 18.7625 7.05025 17.4497C5.7375 16.137 5 14.3565 5 12.5Z"
                                                                                    fill="#7C7C7C"></path>
                                                                            </svg>
                                                                            @if($coupondetails->coupon_type ===null)
                                                                                @lang('labels.my_coupon.valid_from')
                                                                                @if(lang() == "en")
                                                                                {{ date('d M Y', strtotime($coupondetails->start_date)) }} 
                                                                                @else 
                                                                                    {{ date('Y年m月d日', strtotime($coupondetails->start_date)) }}
                                                                                @endif
                                                                                @lang('labels.my_coupon.to')
                                                                                @if(lang() == "en")
                                                                                {{ date('d M Y', strtotime($coupondetails->end_date)) }}
                                                                                @else 
                                                                                    {{ date('Y年m月d日', strtotime($coupondetails->end_date)) }}
                                                                                @endif
                                                                                {{-- @if ($coupondetails->usage_time)
                                                                                    Once collected, valid for
                                                                                    {{ $coupondetails->usage_time }} days
                                                                                @else
                                                                                @lang('labels.coupon.offer_expires')
                                                                                    {{ date('d M Y', strtotime($coupondetails->end_date)) }}
                                                                                @endif --}}
                                                                            @else
                                                                            @php
                                                                                    // check welcome coupon
                                                                                    if($coupondetails->coupon_type === 1) {
                                                                                        $from_date = date('Y-m-d', strtotime($coupondetails->created_at));
                                                                                        $to_date = date('Y-m-d', strtotime($coupondetails->created_at. ' +30 days'));
                                                                                    }

                                                                                    // check birthday coupon
                                                                                    if($coupondetails->coupon_type === 0) {
                                                                                        $birthdayMonth = date('F', strtotime(Auth::guard('customer')->user()->dob));
                                                                                        $birthdayCurrentYear = "$birthdayMonth,".date('Y');
                                                                                        $from_date = date('Y-m-01', strtotime("$birthdayCurrentYear"));
                                                                                        $to_date =  date('Y-m-t', strtotime("$birthdayCurrentYear"));
                                                                                    }
                                                                            @endphp
                                                                            @lang('labels.coupon.offer_expires')
                                                                            {{$to_date}}
                                                                            @endif
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                @php $startCheck = false; @endphp
                                                                @if(count($coupondetails->couponProducts)>0) @php $startCheck=true; @endphp @endif
                                                                @if(count($coupondetails->coupon_sub_categories_products)>0) @php $startCheck=true; @endphp @endif
                                                                @if(count($coupondetails->coupon_categories_products)>0) @php $startCheck=true; @endphp @endif
                                                                <button
                                                                    data-related="#drc-popup{{ $coupondetails->id }}"
                                                                    class="{{$startCheck==false?'click-disable':''}} flex items-center justify-between px-[16px] py-[8px] rounded-[6px] bg-far me-body16 helvetica-normal text-darkgray h-[35px] related-products">
                                                                    @lang('labels.coupon_list.related_products')
                                                                    <svg width="16" height="17"
                                                                        viewBox="0 0 16 17" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M5 14.5L11 8.5L5 2.5"
                                                                            stroke="#333333" stroke-width="2.4"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round"></path>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                            <div class="gccard-content-bottom">
                                                                <button
                                                                    class="text-blueMediq flex justify-center mx-auto me-body20 helvetica-normal font-bold detail-btn"
                                                                    data-id="#collect-detail-modal{{ $coupondetails->id }}">@lang('labels.my_coupon.received')</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <dialog id="drc-popup{{$coupondetails->id}}" component-name="dashboard-related-card"
                                            class="dash-rc-popup items-center justify-center fixed z-[1001] left-0 top-0 w-full h-full bg-black/[.75] overflow-hidden">
                                            <div
                                                class="modal-content w-full max-w-[90%] 4xs:max-w-[80%] lg:max-w-[578px] shadow-shadow02 my-[15%] mx-auto">
                                                <div class="relative rounded-[12px] bg-white">
                                                    <div class="flex ml-auto mr-6 w-5 h-5 absolute right-0 top-4">
                                                        <span data-id="drc-popup{{$coupondetails->id}}" class="pb-[4px] absolute left-1/2 top-1/2 -translate-y-1/2 -translate-x-1/2 close-add-compare-modal  flex items-center justify-center text-[32px] w-full cursor-pointer text-[#1A1818] focus:no-underline related-product-btn related-product-btn">×</span>
                                                    </div>
                                                    <div class="modal-content-plan">
                                                        <div class="preview-bgradient p-10 rounded-t-[12px]">
                                                            <h2 class="font-secondary font-bold text-darkgray me-body23">@lang('labels.coupon_list.related_products')</h2>
                                                        </div>

                                                        <div class="bg-white p-10 pt-5 pr-[24px] rounded-b-[12px]">
                                                            <div class="flex flex-col compare-box-container">
                                                                @php $startCheck = false; @endphp
                                                                @if(count($coupondetails->couponProducts)>0) @php $startCheck=true; @endphp @endif
                                                                @foreach ($coupondetails->couponProducts as $data)
                                                                    @php $productdetails = \App\Models\Product::find($data->product_id); @endphp
                                                                    @if($productdetails->is_published == 1)
                                                                    <div
                                                                        class="relative flex items-center py-5 compare-img-container">
                                                                        <div class="mr-[12px]">
                                                                            <img src="{{ $productdetails->featured_img }}"
                                                                                alt="image"
                                                                                class="w-[80px] h-[80px] rounded-[12px]">
                                                                        </div>
                                                                        <div>
                                                                            <a href="{{route("product-detail",['slug'=>$productdetails->slug_en,'category'=>$productdetails->category->name_en])}}">
                                                                            <p
                                                                                class="w-[307px] leading-tight helvetica-normal text-darkgray font-bold me-body18 title">
                                                                                {{ langbind($productdetails, 'name') }}
                                                                            </p>
                                                                            </a>
                                                                            <div class="flex items-center">
                                                                                <p class="font-bold text-mered me-body20">
                                                                                   @if($productdetails->promotion_price!=null)
                                                                                    ${{ $productdetails->promotion_price }}
                                                                                     @else
                                                                                    @if($productdetails->discount_price!=null)
                                                                                    ${{ $productdetails->discount_price }}
                                                                                    @endif
                                                                                    @endif
                                                                                    @if($productdetails->promotion_price==null&& $productdetails->discount_price==null)
                                                                                    ${{ $productdetails->original_price }}
                                                                                    @endif
                                                                                </p>
                                                                                @if($productdetails->promotion_price!=null || $productdetails->discount_price!=null)
                                                                                <p
                                                                                    class="font-bold text-lightgray me-body14 pl-[10px]">
                                                                                    $
                                                                                    <span class="linethrough">{{ $productdetails->original_price }}</span>
                                                                                </p>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                @endforeach

                                                                @php $subCategoriesArray = []; @endphp
                                                                @if($startCheck == false)
                                                                @if(count($coupondetails->coupon_sub_categories_products)>0) @php $startCheck=true; @endphp @endif
                                                                @foreach ($coupondetails->couponSubCategories as $data)
                                                                    @php array_push($subCategoriesArray,$data->sub_category_id); @endphp
                                                                @endforeach
                                                                @php
                                                                $productList = \App\Models\Product::whereIn("sub_category_id",$subCategoriesArray)->get();
                                                                @endphp
                                                                @foreach($productList as $productdetails)
                                                                {{-- @php $productdetails = \App\Models\Product::find($pdata); @endphp --}}
                                                                @if($productdetails->is_published == 1)
                                                                <div
                                                                    class="relative flex items-center py-5 compare-img-container">
                                                                        <div class="mr-[12px]">
                                                                        <img src="{{ $productdetails->featured_img }}"
                                                                            alt="image"
                                                                            class="w-[80px] h-[80px] rounded-[12px]">
                                                                        </div>
                                                                        <div>
                                                                            <a href="{{route("product-detail",['slug'=>$productdetails->slug_en,'category'=>$productdetails->category->name_en])}}">
                                                                            <p
                                                                                class="w-[307px] leading-tight helvetica-normal text-darkgray font-bold me-body18 title">
                                                                                {{ langbind($productdetails, 'name') }}
                                                                            </p>
                                                                            </a>
                                                                            <div class="flex items-center">
                                                                                <p class="font-bold text-mered me-body20">
                                                                                   @if($productdetails->promotion_price!=null)
                                                                                    ${{ $productdetails->promotion_price }}
                                                                                     @else
                                                                                    @if($productdetails->discount_price!=null)
                                                                                    ${{ $productdetails->discount_price }}
                                                                                    @endif
                                                                                    @endif
                                                                                    @if($productdetails->promotion_price==null&& $productdetails->discount_price==null)
                                                                                    ${{ $productdetails->original_price }}
                                                                                    @endif
                                                                                </p>
                                                                                @if($productdetails->promotion_price!=null || $productdetails->discount_price!=null)
                                                                                <p
                                                                                    class="font-bold text-lightgray me-body14 pl-[10px]">
                                                                                    $
                                                                                    <span class="linethrough">{{ $productdetails->original_price }}</span>
                                                                                </p>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                @endif
                                                                @endforeach
                                                                @endif

                                                                @php $categoriesArray = []; @endphp
                                                                @if($startCheck == false)
                                                                @if(count($coupondetails->coupon_categories_products)>0) @php $startCheck=true; @endphp @endif
                                                                @foreach ($coupondetails->couponCategories as $data)
                                                                    @php array_push($categoriesArray,$data->category_id); @endphp
                                                                @endforeach
                                                                @php
                                                                $productList = \App\Models\Product::whereIn("category_id",$categoriesArray)->get();
                                                                @endphp
                                                                @foreach($productList as $productdetails)
                                                                {{-- @php $productdetails = \App\Models\Product::find($pdata); @endphp --}}
                                                                @if($productdetails->is_published == 1)
                                                                <div
                                                                    class="relative flex items-center py-5 compare-img-container">
                                                                        <div class="mr-[12px]">
                                                                        <img src="{{ $productdetails->featured_img }}"
                                                                            alt="image"
                                                                            class="w-[80px] h-[80px] rounded-[12px]">
                                                                        </div>
                                                                        <div>
                                                                            <a href="{{route("product-detail",['slug'=>$productdetails->slug_en,'category'=>$productdetails->category->name_en])}}">
                                                                            <p
                                                                                class="w-[307px] leading-tight helvetica-normal text-darkgray font-bold me-body18 title">
                                                                                {{ langbind($productdetails, 'name') }}
                                                                            </p>
                                                                            </a>
                                                                            <div class="flex items-center">
                                                                                <p class="font-bold text-mered me-body20">
                                                                                   @if($productdetails->promotion_price!=null)
                                                                                    ${{ $productdetails->promotion_price }}
                                                                                     @else
                                                                                    @if($productdetails->discount_price!=null)
                                                                                    ${{ $productdetails->discount_price }}
                                                                                    @endif
                                                                                    @endif
                                                                                    @if($productdetails->promotion_price==null&& $productdetails->discount_price==null)
                                                                                    ${{ $productdetails->original_price }}
                                                                                    @endif
                                                                                </p>
                                                                                @if($productdetails->promotion_price!=null || $productdetails->discount_price!=null)
                                                                                <p
                                                                                    class="font-bold text-lightgray me-body14 pl-[10px]">
                                                                                    $
                                                                                    <span class="linethrough">{{ $productdetails->original_price }}</span>
                                                                                </p>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                @endif
                                                                @endforeach
                                                                @endif

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </dialog>
                                        <div component-name="me-coupon-collect-detail" class="collect-detail-modal"
                                            id="collect-detail-modal{{ $coupondetails->id }}">
                                            <div class="rounded-[20px] view-bundle-modal--container">
                                                <div class="bg-image w-full p-[40px] pb-[20px] relative">
                                                    <button
                                                        class="cdmodal-close absolute top-[25px] right-[45px] cursor-pointer"><img
                                                            src="{{ asset('frontend/img/white-close.svg') }}"
                                                            alt="close image"></button>
                                                    {{-- <div class="">
                                                        <h6 class="coupon-detail-title">@lang('labels.coupon.coupon_details')</h6>
                                                    </div> --}}
                                                    <div
                                                        class="flex flex-wrap sm:flex-nowrap items-center justify-between py-[10px] qucollectd">
                                                        <div class="relative bg-title flex justify-start items-center">
                                                            <div class="quantity-logo-container mr-[12px] relative">
                                                                @if($coupondetails->owner_type==0)
                                                                <img class="quantity-logo w-[100px] h-[100px]" src="{{$coupondetails->icon}}">
                                                                @else
                                                                <img class="quantity-logo w-[100px] h-[100px]" src="{{isset($coupondetails->merchant) ? $coupondetails->merchant->icon :'' }}">
                                                                @endif
                                                                @if($coupondetails->is_new_or_limited != null)
                                                                @foreach (config('mediq.coupon_status') as $key => $type)
                                                                    @if ($key == $coupondetails->is_new_or_limited)
                                                                        <div class="label-tag absolute top-0 left-0 {{$coupondetails->is_new_or_limited=="new"?'new':'new-limit'}} px-[10px] py-[4px] rounded-[4px]">
                                                                                {{ $type }}
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                                @endif
                                                            </div>
                                                            <div>
                                                                @if (isset($coupondetails->merchant_id))
                                                                    <p class="text-center quatitle underline">
                                                                        {{ langbind($coupondetails->merchant, 'name') }}
                                                                    </p>
                                                                @endif
                                                                <p data-id="collect-detail-modal`+i+`"
                                                                    class="company-name text-darkgray cursor-pointer">
                                                                    {{ langbind($coupondetails, 'name') }}</p>
                                                                {{-- <p class="ctitle text-darkgray">
                                                                    {{ langbind($coupondetails, 'sub_title') }}</p>
                                                                <div class="flex justify-start items-center flex-wrap">
                                                                    <p class="ccategory text-lightgray new-ccategory">
                                                                        <svg width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M12.492 11.41C12.4697 11.2871 12.4023 11.1769 12.3028 11.1012C12.2034 11.0255 12.0793 10.9898 11.9548 11.0011C11.8304 11.0124 11.7147 11.0699 11.6305 11.1622C11.5463 11.2545 11.4998 11.3751 11.5 11.5V16.002L11.508 16.092C11.5303 16.2149 11.5977 16.3251 11.6972 16.4008C11.7966 16.4765 11.9207 16.5122 12.0452 16.5009C12.1696 16.4896 12.2853 16.4321 12.3695 16.3398C12.4537 16.2475 12.5002 16.1269 12.5 16.002V11.5L12.492 11.41ZM12.799 9.25C12.799 9.05109 12.72 8.86032 12.5793 8.71967C12.4387 8.57902 12.2479 8.5 12.049 8.5C11.8501 8.5 11.6593 8.57902 11.5187 8.71967C11.378 8.86032 11.299 9.05109 11.299 9.25C11.299 9.44891 11.378 9.63968 11.5187 9.78033C11.6593 9.92098 11.8501 10 12.049 10C12.2479 10 12.4387 9.92098 12.5793 9.78033C12.72 9.63968 12.799 9.44891 12.799 9.25ZM20 12.5C20 10.3783 19.1571 8.34344 17.6569 6.84315C16.1566 5.34285 14.1217 4.5 12 4.5C9.87827 4.5 7.84344 5.34285 6.34315 6.84315C4.84285 8.34344 4 10.3783 4 12.5C4 14.6217 4.84285 16.6566 6.34315 18.1569C7.84344 19.6571 9.87827 20.5 12 20.5C14.1217 20.5 16.1566 19.6571 17.6569 18.1569C19.1571 16.6566 20 14.6217 20 12.5ZM5 12.5C5 11.5807 5.18106 10.6705 5.53284 9.82122C5.88463 8.97194 6.40024 8.20026 7.05025 7.55025C7.70026 6.90024 8.47194 6.38463 9.32122 6.03284C10.1705 5.68106 11.0807 5.5 12 5.5C12.9193 5.5 13.8295 5.68106 14.6788 6.03284C15.5281 6.38463 16.2997 6.90024 16.9497 7.55025C17.5998 8.20026 18.1154 8.97194 18.4672 9.82122C18.8189 10.6705 19 11.5807 19 12.5C19 14.3565 18.2625 16.137 16.9497 17.4497C15.637 18.7625 13.8565 19.5 12 19.5C10.1435 19.5 8.36301 18.7625 7.05025 17.4497C5.7375 16.137 5 14.3565 5 12.5Z"
                                                                                fill="#7C7C7C"></path>
                                                                        </svg>
                                                                        @if($coupondetails->coupon_type ===null)
                                                                        @lang('labels.my_coupon.valid_from')
                                                                        @if(lang() == "en")
                                                                        {{ date('d M Y', strtotime($coupondetails->start_date)) }} 
                                                                        @else 
                                                                            {{ date('Y年m月d日', strtotime($coupondetails->start_date)) }}
                                                                        @endif
                                                                        @lang('labels.my_coupon.to')
                                                                        @if(lang() == "en")
                                                                        {{ date('d M Y', strtotime($coupondetails->end_date)) }}
                                                                        @else 
                                                                            {{ date('Y年m月d日', strtotime($coupondetails->end_date)) }}
                                                                        @endif
                                                                        @else
                                                                        @php
                                                                                // check welcome coupon
                                                                                if($coupondetails->coupon_type === 1) {
                                                                                    $from_date = date('Y-m-d', strtotime($coupondetails->created_at));
                                                                                    $to_date = date('Y-m-d', strtotime($coupondetails->created_at. ' +30 days'));
                                                                                }

                                                                                // check birthday coupon
                                                                                if($coupondetails->coupon_type === 0) {
                                                                                    $birthdayMonth = date('F', strtotime(Auth::guard('customer')->user()->dob));
                                                                                    $birthdayCurrentYear = "$birthdayMonth,".date('Y');
                                                                                    $from_date = date('Y-m-01', strtotime("$birthdayCurrentYear"));
                                                                                    $to_date =  date('Y-m-t', strtotime("$birthdayCurrentYear"));
                                                                                }
                                                                        @endphp
                                                                        @lang('labels.coupon.offer_expires')
                                                                        {{$to_date}}
                                                                        @endif
                                                                    </p>
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                        @php $startCheck = false; @endphp
                                                        @if(count($coupondetails->couponProducts)>0) @php $startCheck=true; @endphp @endif
                                                        @if(count($coupondetails->coupon_sub_categories_products)>0) @php $startCheck=true; @endphp @endif
                                                        @if(count($coupondetails->coupon_categories_products)>0) @php $startCheck=true; @endphp @endif
                                                        <button data-related="#drc-popup{{ $coupondetails->id }}"
                                                            class="{{$startCheck==false?'click-disable':''}} qua-collect-btn-content w-[131px] font-secondary font-bold me-body16 inline-block py-[10px] px-5 border border-darkgray text-center hover:bg-blueMediq hover:border-blueMediq hover:text-whitez rounded-full related-products">@lang('labels.coupon_list.related_products')</button>
                                                    </div>
                                                </div>
                                                <div class="custom-divider">
                                                </div>
                                                <div class="cscard-container">

                                                    <div class="mb-[27px] last:mb-0">
                                                        <h6 class="text-darkgray contitle mb-[10px]">@lang('labels.promotion_period')</h6>
                                                        @php
                                                            // check welcome coupon
                                                            if($coupondetails->coupon_type === 1) {
                                                                $from_date = date('Y-m-d', strtotime($coupondetails->created_at));
                                                                $to_date = date('Y-m-d', strtotime($coupondetails->created_at. ' +30 days'));
                                                            }

                                                            // check birthday coupon
                                                            if($coupondetails->coupon_type === 0) {
                                                                $birthdayMonth = date('F', strtotime(Auth::guard('customer')->user()->dob));
                                                                $birthdayCurrentYear = "$birthdayMonth,".date('Y');
                                                                $from_date = date('Y-m-01', strtotime("$birthdayCurrentYear"));
                                                                $to_date =  date('Y-m-t', strtotime("$birthdayCurrentYear"));
                                                            }
                                                        @endphp
                                                        <div class="condes text-darkgray">
                                                            @if($coupondetails->coupon_type===null) 
                                                            @php
                                                                $customer_id = Auth::guard('customer')->user() != null ? Auth::guard('customer')->user()->id : '';
                                                                $item = App\Models\CouponCollect::where('coupon_id', $coupondetails->id)
                                                                    ->where('customer_id', $customer_id)
                                                                    ->first();
                                                                $end_date = "";
                                                                if($item!=null) {
                                                                    if($coupondetails->usage_time!=null) {
                                                                        if(lang() == "en")
                                                                        {
                                                                            $end_date = \Carbon\Carbon::parse($item->created_at)->addDays($coupondetails->usage_time)->format('d M Y');
                                                                        }else{
                                                                            $end_date = \Carbon\Carbon::parse($item->created_at)->addDays($coupondetails->usage_time)->format('Y年m月d日');
                                                                        }
                                                                    }
                                                                }
                                                            @endphp
                                                            @if(lang() == "en"){{ date('d M Y', strtotime($coupondetails->start_date)) }}@else {{ date('Y年m月d日', strtotime($coupondetails->start_date))}} @endif - @if(lang() == "en"){{ $end_date!=""?$end_date:date('d M Y', strtotime($coupondetails->end_date)) }}@else {{ $end_date!=""?$end_date:date('Y年m月d日', strtotime($coupondetails->end_date))}}@endif
                                                            @else
                                                            {{$from_date}}
                                                            to
                                                            {{$to_date}}
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="mb-[27px] last:mb-0">
                                                        {{-- <h6 class="text-darkgray contitle mb-[10px]">@lang('labels.coupon.terms_and_conditions')</h6> --}}
                                                        <div class="condes text-darkgray">{!! langbind($coupondetails, 'content') !!}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                        @include('frontend.customer.empty-coupon')
                                    @endforelse
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="dash-used-expired" component-name="dashboard-available-tab-layout"
                class="available-div dat-tab  {{ $mainTag != 'available' ? '' : 'hidden' }}">
                <ul class="flex items-center justify-start">

                    <li class="label-item flex items-center justify-center cursor-pointer py-[10px] px-5 bg-whitez text-darkgray me-body16 border border-meA3 rounded-[50px] {{ $selectedCategory == 'all' ? 'active' : '' }}"
                        data-id=".all-coupon">@lang('labels.coupon_list.all_coupon')</li>

                    <li class="label-item flex items-center justify-center cursor-pointer py-[10px] px-5 bg-whitez text-darkgray me-body16 border border-meA3 rounded-[50px] {{ $selectedCategory == 'Body Check' ? 'active' : '' }}"
                        data-id=".body-check">@lang('labels.coupon.body_check')</li>

                    <li class="label-item flex items-center justify-center cursor-pointer py-[10px] px-5 bg-whitez text-darkgray me-body16 border border-meA3 rounded-[50px] {{ $selectedCategory == 'Vaccine' ? 'active' : '' }}"
                        data-id=".vaccine">@lang('labels.coupon.vaccine')</li>

                    <li class="label-item flex items-center justify-center cursor-pointer py-[10px] px-5 bg-whitez text-darkgray me-body16 border border-meA3 rounded-[50px] {{ $selectedCategory == 'DNA Test' ? 'active' : '' }}"
                        data-id=".dna-test">@lang('labels.coupon.dna_test')</li>

                </ul>
                <div class="me-dashboard-innercontent" data-id="dash-used-expired">

                    <div class="mdinner-view all-coupon {{ $selectedCategory == 'all' ? '' : 'hidden' }}">
                        <div component-name="dashboard-available-layout">
                            <div component-name="dashboard-innerview" class="flex flex-wrap dashinnerview">
                                @if ($mainTag == 'hide' && $selectedCategory == 'all')
                                <div class="grid lg:grid-cols-2 grid-cols-1 lg:gap-x-10 lg:gap-y-5 dashboard-coupons-list w-full">
                                    @forelse ($couponList as $key => $coupondetails)
                                        <div component-name="dashboard-coupon-card" class="simple-coupon-card">
                                            <div class="w-full small-coupon--container">
                                                <div class="relative">
                                                    <div class="custom-voucher-shape gccard rounded-[20px]">
                                                        <div class="gccard-content text-center">
                                                            <div data-id="#collect-detail-modal{{ $coupondetails->id }}"
                                                                class="cclogo-container cursor-pointer show-detail-popup">
                                                                <div class="rounded-full">
                                                                    @if($coupondetails->owner_type==0)
                                                                    <img class="cclogo w-[80px] h-[80px]" src="{{$coupondetails->icon}}">
                                                                    @else
                                                                    <img class="cclogo w-[80px] h-[80px]" src="{{isset($coupondetails->merchant) ? $coupondetails->merchant->icon :'' }}">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="gccard-content-body show-detail-popup">
                                                                <div data-id="#collect-detail-modal{{ $coupondetails->id }}"
                                                                    class="cursor-pointer coupon-see-detail">
                                                                    <p
                                                                        class="company-name text-darkgray helvetica-normal cursor-pointer font-bold">
                                                                        {{ langbind($coupondetails, 'name') }}</p>
                                                                    <p
                                                                        class="ctitle me-body16 helvetica-normal text-darkgray">
                                                                        {{ langbind($coupondetails, 'sub_title') }}
                                                                    </p>
                                                                    <div
                                                                        class="flex justify-start items-center flex-wrap me-body15 helvetica-normal py-5">
                                                                        <p
                                                                            class="ccategory text-lightgray new-ccategory">
                                                                            <svg width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M12.492 11.41C12.4697 11.2871 12.4023 11.1769 12.3028 11.1012C12.2034 11.0255 12.0793 10.9898 11.9548 11.0011C11.8304 11.0124 11.7147 11.0699 11.6305 11.1622C11.5463 11.2545 11.4998 11.3751 11.5 11.5V16.002L11.508 16.092C11.5303 16.2149 11.5977 16.3251 11.6972 16.4008C11.7966 16.4765 11.9207 16.5122 12.0452 16.5009C12.1696 16.4896 12.2853 16.4321 12.3695 16.3398C12.4537 16.2475 12.5002 16.1269 12.5 16.002V11.5L12.492 11.41ZM12.799 9.25C12.799 9.05109 12.72 8.86032 12.5793 8.71967C12.4387 8.57902 12.2479 8.5 12.049 8.5C11.8501 8.5 11.6593 8.57902 11.5187 8.71967C11.378 8.86032 11.299 9.05109 11.299 9.25C11.299 9.44891 11.378 9.63968 11.5187 9.78033C11.6593 9.92098 11.8501 10 12.049 10C12.2479 10 12.4387 9.92098 12.5793 9.78033C12.72 9.63968 12.799 9.44891 12.799 9.25ZM20 12.5C20 10.3783 19.1571 8.34344 17.6569 6.84315C16.1566 5.34285 14.1217 4.5 12 4.5C9.87827 4.5 7.84344 5.34285 6.34315 6.84315C4.84285 8.34344 4 10.3783 4 12.5C4 14.6217 4.84285 16.6566 6.34315 18.1569C7.84344 19.6571 9.87827 20.5 12 20.5C14.1217 20.5 16.1566 19.6571 17.6569 18.1569C19.1571 16.6566 20 14.6217 20 12.5ZM5 12.5C5 11.5807 5.18106 10.6705 5.53284 9.82122C5.88463 8.97194 6.40024 8.20026 7.05025 7.55025C7.70026 6.90024 8.47194 6.38463 9.32122 6.03284C10.1705 5.68106 11.0807 5.5 12 5.5C12.9193 5.5 13.8295 5.68106 14.6788 6.03284C15.5281 6.38463 16.2997 6.90024 16.9497 7.55025C17.5998 8.20026 18.1154 8.97194 18.4672 9.82122C18.8189 10.6705 19 11.5807 19 12.5C19 14.3565 18.2625 16.137 16.9497 17.4497C15.637 18.7625 13.8565 19.5 12 19.5C10.1435 19.5 8.36301 18.7625 7.05025 17.4497C5.7375 16.137 5 14.3565 5 12.5Z"
                                                                                    fill="#7C7C7C"></path>
                                                                            </svg>
                                                                            @if($coupondetails->coupon_type ===null)
                                                                            @lang('labels.my_coupon.valid_from')
                                                                            @if(lang() == "en")
                                                                            {{ date('d M Y', strtotime($coupondetails->start_date)) }} 
                                                                            @else 
                                                                                {{ date('Y年m月d日', strtotime($coupondetails->start_date)) }}
                                                                            @endif
                                                                            @lang('labels.my_coupon.to')
                                                                            @if(lang() == "en")
                                                                            {{ date('d M Y', strtotime($coupondetails->end_date)) }}
                                                                            @else 
                                                                                {{ date('Y年m月d日', strtotime($coupondetails->end_date)) }}
                                                                            @endif
                                                                                {{-- @if ($coupondetails->usage_time)
                                                                                    Once collected, valid for
                                                                                    {{ $coupondetails->usage_time }} days
                                                                                @else
                                                                                @lang('labels.coupon.offer_expires')
                                                                                    {{ date('d M Y', strtotime($coupondetails->end_date)) }}
                                                                                @endif --}}
                                                                            @else
                                                                            @php
                                                                                    // check welcome coupon
                                                                                    if($coupondetails->coupon_type === 1) {
                                                                                        $from_date = date('Y-m-d', strtotime($coupondetails->created_at));
                                                                                        $to_date = date('Y-m-d', strtotime($coupondetails->created_at. ' +30 days'));
                                                                                    }

                                                                                    // check birthday coupon
                                                                                    if($coupondetails->coupon_type === 0) {
                                                                                        $birthdayMonth = date('F', strtotime(Auth::guard('customer')->user()->dob));
                                                                                        $birthdayCurrentYear = "$birthdayMonth,".date('Y');
                                                                                        $from_date = date('Y-m-01', strtotime("$birthdayCurrentYear"));
                                                                                        $to_date =  date('Y-m-t', strtotime("$birthdayCurrentYear"));
                                                                                    }
                                                                            @endphp
                                                                            @lang('labels.coupon.offer_expires')
                                                                            {{ $to_date }}
                                                                            @endif
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <button
                                                                    data-related="#drc-popup{{ $coupondetails->id }}"
                                                                    class="flex items-center justify-between px-[16px] py-[8px] rounded-[6px] bg-far me-body16 helvetica-normal text-darkgray h-[35px] related-products">
                                                                    @lang('labels.coupon_list.related_products')
                                                                    <svg width="16" height="17"
                                                                        viewBox="0 0 16 17" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M5 14.5L11 8.5L5 2.5"
                                                                            stroke="#333333" stroke-width="2.4"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round"></path>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                            <div class="gccard-content-bottom">
                                                                <button
                                                                    class="text-blueMediq flex justify-center mx-auto me-body20 helvetica-normal font-bold detail-btn"
                                                                    data-id="#collect-detail-modal{{ $coupondetails->id }}">@lang('labels.my_coupon.received')</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <dialog id="drc-popup{{ $coupondetails->id }}"
                                            component-name="dashboard-related-card"
                                            class="items-center justify-center fixed z-[1001] left-0 top-0 w-full h-full bg-black/[.75] overflow-hidden">
                                            <div
                                                class="modal-content w-full max-w-[90%] 4xs:max-w-[80%] lg:max-w-[578px] shadow-shadow02 my-[15%] mx-auto">
                                                <div class="relative rounded-[12px] bg-white">
                                                    <div class="flex ml-auto mr-6 w-5 h-5 absolute right-0 top-4">
                                                        <span data-id="drc-popup{{ $coupondetails->id }}"
                                                            class="pb-[4px] absolute left-1/2 top-1/2 -translate-y-1/2 -translate-x-1/2 close-add-compare-modal  flex items-center justify-center text-[32px] w-full cursor-pointer text-[#1A1818] focus:no-underline">×</span>
                                                    </div>
                                                    <div class="modal-content-plan">
                                                        <div class="preview-bgradient p-10 rounded-t-[12px]">
                                                            <h2
                                                                class="font-secondary font-bold text-darkgray me-body23">
                                                                @lang('labels.coupon_list.related_products')</h2>
                                                        </div>

                                                        <div class="bg-white p-10 pt-5 pr-[24px] rounded-b-[12px]">
                                                            <div class="flex flex-col compare-box-container">
                                                                @foreach ($coupondetails->couponProducts as $data)
                                                                    @php $productdetails = \App\Models\Product::find($data->product_id); @endphp
                                                                    <div
                                                                        class="relative flex items-center py-5 compare-img-container">
                                                                        <div class="mr-[12px]">
                                                                            <img src="{{ $productdetails->featured_img }}"
                                                                                alt="image"
                                                                                class="w-[80px] h-[80px] rounded-[12px]">
                                                                        </div>
                                                                        <div>
                                                                            <a href="{{route("product-detail",['slug'=>$productdetails->slug_en,'category'=>$productdetails->category->name_en])}}">
                                                                            <p
                                                                                class="w-[307px] leading-tight helvetica-normal text-darkgray font-bold me-body18 title">
                                                                                {{ langbind($productdetails, 'name') }}
                                                                            </p>
                                                                            </a>
                                                                            <div class="flex items-center">
                                                                                <p
                                                                                    class="font-bold text-mered me-body20">
                                                                                    @if(isset($productdetails->discount_price))${{ $productdetails->discount_price }}@endif
                                                                                </p>
                                                                                <p
                                                                                    class="font-bold text-lightgray me-body14 pl-[10px]">
                                                                                    $
                                                                                    <span class="linethrough">{{ $productdetails->original_price }}</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </dialog>
                                        <div component-name="me-coupon-collect-detail" class="collect-detail-modal"
                                            id="collect-detail-modal{{ $coupondetails->id }}">
                                            <div class="rounded-[20px] view-bundle-modal--container">
                                                <div class="bg-image w-full p-[40px] pb-[20px] relative">
                                                    <button
                                                        class="cdmodal-close absolute top-[25px] right-[45px] cursor-pointer"><img
                                                            src="{{ asset('frontend/img/white-close.svg') }}"
                                                            alt="close image"></button>
                                                    {{-- <div class="">
                                                        <h6 class="coupon-detail-title">@lang('labels.coupon.coupon_details')</h6>
                                                    </div> --}}
                                                    <div
                                                        class="flex flex-wrap sm:flex-nowrap items-center justify-between py-[10px] qucollectd">
                                                        <div class="relative bg-title flex justify-start items-center">
                                                            <div class="quantity-logo-container mr-[12px] relative">
                                                                <img src="{{ $coupondetails->banner_img }}"
                                                                    alt="logo"
                                                                    class="quantity-logo w-[100px] h-[100px]">
                                                                    @if($coupondetails->is_new_or_limited != null)
                                                                    @foreach (config('mediq.coupon_status') as $key => $type)
                                                                        @if ($key == $coupondetails->is_new_or_limited)
                                                                            <div class="label-tag absolute top-0 left-0 {{$coupondetails->is_new_or_limited=="new"?'new':'new-limit'}} px-[10px] py-[4px] rounded-[4px]">
                                                                                    {{ $type }}
                                                                            </div>
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                            <div>
                                                                @if (isset($coupondetails->merchant_id))
                                                                    <p class="text-center quatitle underline">
                                                                        {{ langbind($coupondetails->merchant, 'name') }}
                                                                    </p>
                                                                @endif
                                                                <p data-id="collect-detail-modal`+i+`"
                                                                    class="company-name text-darkgray cursor-pointer">
                                                                    {{ langbind($coupondetails, 'name') }}</p>
                                                                {{-- <p class="ctitle text-darkgray">
                                                                    {{ langbind($coupondetails, 'sub_title') }}</p>
                                                                <div class="flex justify-start items-center flex-wrap">
                                                                    <p class="ccategory text-lightgray new-ccategory">
                                                                        <svg width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M12.492 11.41C12.4697 11.2871 12.4023 11.1769 12.3028 11.1012C12.2034 11.0255 12.0793 10.9898 11.9548 11.0011C11.8304 11.0124 11.7147 11.0699 11.6305 11.1622C11.5463 11.2545 11.4998 11.3751 11.5 11.5V16.002L11.508 16.092C11.5303 16.2149 11.5977 16.3251 11.6972 16.4008C11.7966 16.4765 11.9207 16.5122 12.0452 16.5009C12.1696 16.4896 12.2853 16.4321 12.3695 16.3398C12.4537 16.2475 12.5002 16.1269 12.5 16.002V11.5L12.492 11.41ZM12.799 9.25C12.799 9.05109 12.72 8.86032 12.5793 8.71967C12.4387 8.57902 12.2479 8.5 12.049 8.5C11.8501 8.5 11.6593 8.57902 11.5187 8.71967C11.378 8.86032 11.299 9.05109 11.299 9.25C11.299 9.44891 11.378 9.63968 11.5187 9.78033C11.6593 9.92098 11.8501 10 12.049 10C12.2479 10 12.4387 9.92098 12.5793 9.78033C12.72 9.63968 12.799 9.44891 12.799 9.25ZM20 12.5C20 10.3783 19.1571 8.34344 17.6569 6.84315C16.1566 5.34285 14.1217 4.5 12 4.5C9.87827 4.5 7.84344 5.34285 6.34315 6.84315C4.84285 8.34344 4 10.3783 4 12.5C4 14.6217 4.84285 16.6566 6.34315 18.1569C7.84344 19.6571 9.87827 20.5 12 20.5C14.1217 20.5 16.1566 19.6571 17.6569 18.1569C19.1571 16.6566 20 14.6217 20 12.5ZM5 12.5C5 11.5807 5.18106 10.6705 5.53284 9.82122C5.88463 8.97194 6.40024 8.20026 7.05025 7.55025C7.70026 6.90024 8.47194 6.38463 9.32122 6.03284C10.1705 5.68106 11.0807 5.5 12 5.5C12.9193 5.5 13.8295 5.68106 14.6788 6.03284C15.5281 6.38463 16.2997 6.90024 16.9497 7.55025C17.5998 8.20026 18.1154 8.97194 18.4672 9.82122C18.8189 10.6705 19 11.5807 19 12.5C19 14.3565 18.2625 16.137 16.9497 17.4497C15.637 18.7625 13.8565 19.5 12 19.5C10.1435 19.5 8.36301 18.7625 7.05025 17.4497C5.7375 16.137 5 14.3565 5 12.5Z"
                                                                                fill="#7C7C7C"></path>
                                                                        </svg>
                                                                            @if($coupondetails->coupon_type ===null)
                                                                            @lang('labels.my_coupon.valid_from')
                                                                            @if(lang() == "en")
                                                                            {{ date('d M Y', strtotime($coupondetails->start_date)) }} 
                                                                            @else 
                                                                                {{ date('Y年m月d日', strtotime($coupondetails->start_date)) }}
                                                                            @endif
                                                                            @lang('labels.my_coupon.to')
                                                                            @if(lang() == "en")
                                                                            {{ date('d M Y', strtotime($coupondetails->end_date)) }}
                                                                            @else 
                                                                                {{ date('Y年m月d日', strtotime($coupondetails->end_date)) }}
                                                                            @endif
                                                                            @else
                                                                            @php
                                                                                    // check welcome coupon
                                                                                    if($coupondetails->coupon_type === 1) {
                                                                                        $from_date = date('Y-m-d', strtotime($coupondetails->created_at));
                                                                                        $to_date = date('Y-m-d', strtotime($coupondetails->created_at. ' +30 days'));
                                                                                    }

                                                                                    // check birthday coupon
                                                                                    if($coupondetails->coupon_type === 0) {
                                                                                        $birthdayMonth = date('F', strtotime(Auth::guard('customer')->user()->dob));
                                                                                        $birthdayCurrentYear = "$birthdayMonth,".date('Y');
                                                                                        $from_date = date('Y-m-01', strtotime("$birthdayCurrentYear"));
                                                                                        $to_date =  date('Y-m-t', strtotime("$birthdayCurrentYear"));
                                                                                    }
                                                                            @endphp
                                                                            @lang('labels.coupon.offer_expires')
                                                                            {{ $to_date }}
                                                                            @endif
                                                                    </p>
                                                                </div> --}}
                                                            </div>
                                                            <button data-related="#drc-popup{{$coupondetails->id}}"
                                                                class="flex items-center justify-between px-[16px] py-[8px] rounded-[6px] bg-far me-body16 helvetica-normal text-darkgray h-[35px] related-products">
                                                                @lang('labels.coupon_list.related_products')
                                                                <svg width="16" height="17"
                                                                    viewBox="0 0 16 17" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M5 14.5L11 8.5L5 2.5"
                                                                        stroke="#333333" stroke-width="2.4"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round"></path>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                        <div class="gccard-content-bottom">
                                                            <button
                                                                class="text-blueMediq flex justify-center mx-auto me-body20 helvetica-normal font-bold detail-btn"
                                                                data-id="#collect-detail-modal{{$coupondetails->id}}">@lang('labels.my_coupon.received')</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        @include('frontend.customer.empty-coupon')
                                    @endforelse
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="mdinner-view body-check {{ $selectedCategory == 'Body Check' ? '' : 'hidden' }}">
                        <div component-name="dashboard-available-layout">
                            <div component-name="dashboard-innerview" class="flex flex-wrap dashinnerview">
                                @if ($mainTag == 'hide' && $selectedCategory == 'Body Check')
                                    <div class="grid lg:grid-cols-2 grid-cols-1 lg:gap-x-10 lg:gap-y-5 dashboard-coupons-list w-full">
                                    @forelse ($couponList as $key => $coupondetails)
                                        <div component-name="dashboard-coupon-card" class="simple-coupon-card">
                                            <div class="w-full small-coupon--container">
                                                <div class="relative">
                                                    <div class="custom-voucher-shape gccard rounded-[20px]">
                                                        <div class="gccard-content text-center">
                                                            <div data-id="#collect-detail-modal{{ $coupondetails->id }}"
                                                                class="cclogo-container cursor-pointer show-detail-popup">
                                                                <div class="rounded-full">
                                                                    @if($coupondetails->owner_type==0)
                                                                    <img class="cclogo w-[80px] h-[80px]" src="{{$coupondetails->icon}}">
                                                                    @else
                                                                    <img class="cclogo w-[80px] h-[80px]" src="{{isset($coupondetails->merchant) ? $coupondetails->merchant->icon :'' }}">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="gccard-content-body show-detail-popup">
                                                                <div data-id="#collect-detail-modal{{ $coupondetails->id }}"
                                                                    class="cursor-pointer coupon-see-detail">
                                                                    
                                                                    <p
                                                                        class="company-name text-darkgray helvetica-normal cursor-pointer font-bold">
                                                                        {{ langbind($coupondetails, 'name') }}</p>
                                                                    <p
                                                                        class="ctitle me-body16 helvetica-normal text-darkgray">
                                                                        {{ langbind($coupondetails, 'sub_title') }}
                                                                    </p>
                                                                    <div
                                                                        class="flex justify-start items-center flex-wrap me-body15 helvetica-normal py-5">
                                                                        <p
                                                                            class="ccategory text-lightgray new-ccategory">
                                                                            <svg width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M12.492 11.41C12.4697 11.2871 12.4023 11.1769 12.3028 11.1012C12.2034 11.0255 12.0793 10.9898 11.9548 11.0011C11.8304 11.0124 11.7147 11.0699 11.6305 11.1622C11.5463 11.2545 11.4998 11.3751 11.5 11.5V16.002L11.508 16.092C11.5303 16.2149 11.5977 16.3251 11.6972 16.4008C11.7966 16.4765 11.9207 16.5122 12.0452 16.5009C12.1696 16.4896 12.2853 16.4321 12.3695 16.3398C12.4537 16.2475 12.5002 16.1269 12.5 16.002V11.5L12.492 11.41ZM12.799 9.25C12.799 9.05109 12.72 8.86032 12.5793 8.71967C12.4387 8.57902 12.2479 8.5 12.049 8.5C11.8501 8.5 11.6593 8.57902 11.5187 8.71967C11.378 8.86032 11.299 9.05109 11.299 9.25C11.299 9.44891 11.378 9.63968 11.5187 9.78033C11.6593 9.92098 11.8501 10 12.049 10C12.2479 10 12.4387 9.92098 12.5793 9.78033C12.72 9.63968 12.799 9.44891 12.799 9.25ZM20 12.5C20 10.3783 19.1571 8.34344 17.6569 6.84315C16.1566 5.34285 14.1217 4.5 12 4.5C9.87827 4.5 7.84344 5.34285 6.34315 6.84315C4.84285 8.34344 4 10.3783 4 12.5C4 14.6217 4.84285 16.6566 6.34315 18.1569C7.84344 19.6571 9.87827 20.5 12 20.5C14.1217 20.5 16.1566 19.6571 17.6569 18.1569C19.1571 16.6566 20 14.6217 20 12.5ZM5 12.5C5 11.5807 5.18106 10.6705 5.53284 9.82122C5.88463 8.97194 6.40024 8.20026 7.05025 7.55025C7.70026 6.90024 8.47194 6.38463 9.32122 6.03284C10.1705 5.68106 11.0807 5.5 12 5.5C12.9193 5.5 13.8295 5.68106 14.6788 6.03284C15.5281 6.38463 16.2997 6.90024 16.9497 7.55025C17.5998 8.20026 18.1154 8.97194 18.4672 9.82122C18.8189 10.6705 19 11.5807 19 12.5C19 14.3565 18.2625 16.137 16.9497 17.4497C15.637 18.7625 13.8565 19.5 12 19.5C10.1435 19.5 8.36301 18.7625 7.05025 17.4497C5.7375 16.137 5 14.3565 5 12.5Z"
                                                                                    fill="#7C7C7C"></path>
                                                                            </svg>
                                                                            @if($coupondetails->coupon_type ===null)
                                                                            @lang('labels.my_coupon.valid_from')
                                                                            @if(lang() == "en")
                                                                            {{ date('d M Y', strtotime($coupondetails->start_date)) }} 
                                                                            @else 
                                                                                {{ date('Y年m月d日', strtotime($coupondetails->start_date)) }}
                                                                            @endif
                                                                            @lang('labels.my_coupon.to')
                                                                            @if(lang() == "en")
                                                                            {{ date('d M Y', strtotime($coupondetails->end_date)) }}
                                                                            @else 
                                                                                {{ date('Y年m月d日', strtotime($coupondetails->end_date)) }}
                                                                            @endif
                                                                                {{-- @if ($coupondetails->usage_time)
                                                                                    Once collected, valid for
                                                                                    {{ $coupondetails->usage_time }} days
                                                                                @else
                                                                                @lang('labels.coupon.offer_expires')
                                                                                    {{ date('d M Y', strtotime($coupondetails->end_date)) }}
                                                                                @endif --}}
                                                                            @else
                                                                            @php
                                                                                    // check welcome coupon
                                                                                    if($coupondetails->coupon_type === 1) {
                                                                                        $from_date = date('Y-m-d', strtotime($coupondetails->created_at));
                                                                                        $to_date = date('Y-m-d', strtotime($coupondetails->created_at. ' +30 days'));
                                                                                    }

                                                                                    // check birthday coupon
                                                                                    if($coupondetails->coupon_type === 0) {
                                                                                        $birthdayMonth = date('F', strtotime(Auth::guard('customer')->user()->dob));
                                                                                        $birthdayCurrentYear = "$birthdayMonth,".date('Y');
                                                                                        $from_date = date('Y-m-01', strtotime("$birthdayCurrentYear"));
                                                                                        $to_date =  date('Y-m-t', strtotime("$birthdayCurrentYear"));
                                                                                    }
                                                                            @endphp
                                                                           
                                                                                @lang('labels.coupon.offer_expires')
                                                                                {{ $to_date }}
                                                                          
                                                                            @endif
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <button
                                                                    data-related="#drc-popup{{ $coupondetails->id }}"
                                                                    class="flex items-center justify-between px-[16px] py-[8px] rounded-[6px] bg-far me-body16 helvetica-normal text-darkgray h-[35px] related-products">
                                                                    @lang('labels.coupon_list.related_products')
                                                                    <svg width="16" height="17"
                                                                        viewBox="0 0 16 17" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M5 14.5L11 8.5L5 2.5"
                                                                            stroke="#333333" stroke-width="2.4"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round"></path>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                            <div class="gccard-content-bottom">
                                                                <button
                                                                    class="text-blueMediq flex justify-center mx-auto me-body20 helvetica-normal font-bold detail-btn"
                                                                    data-id="#collect-detail-modal{{ $coupondetails->id }}">@lang('labels.my_coupon.received')</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <dialog id="drc-popup{{ $coupondetails->id }}"
                                            component-name="dashboard-related-card"
                                            class="items-center justify-center fixed z-[1001] left-0 top-0 w-full h-full bg-black/[.75] overflow-hidden">
                                            <div
                                                class="modal-content w-full max-w-[90%] 4xs:max-w-[80%] lg:max-w-[578px] shadow-shadow02 my-[15%] mx-auto">
                                                <div class="relative rounded-[12px] bg-white">
                                                    <div class="flex ml-auto mr-6 w-5 h-5 absolute right-0 top-4">
                                                        <span data-id="drc-popup{{ $coupondetails->id }}"
                                                            class="pb-[4px] absolute left-1/2 top-1/2 -translate-y-1/2 -translate-x-1/2 close-add-compare-modal  flex items-center justify-center text-[32px] w-full cursor-pointer text-[#1A1818] focus:no-underline">×</span>
                                                    </div>
                                                    <div class="modal-content-plan">
                                                        <div class="preview-bgradient p-10 rounded-t-[12px]">
                                                            <h2
                                                                class="font-secondary font-bold text-darkgray me-body23">
                                                                @lang('labels.coupon_list.related_products')</h2>
                                                        </div>

                                                        <div class="bg-white p-10 pt-5 pr-[24px] rounded-b-[12px]">
                                                            <div class="flex flex-col compare-box-container">
                                                                @foreach ($coupondetails->couponProducts as $data)
                                                                    @php $productdetails = \App\Models\Product::find($data->product_id); @endphp
                                                                    <div
                                                                        class="relative flex items-center py-5 compare-img-container">
                                                                        <div class="mr-[12px]">
                                                                            <img src="{{ $productdetails->featured_img }}"
                                                                                alt="image"
                                                                                class="w-[80px] h-[80px] rounded-[12px]">
                                                                        </div>
                                                                        <div>
                                                                            <a href="{{route("product-detail",['slug'=>$productdetails->slug_en,'category'=>$productdetails->category->name_en])}}">
                                                                            <p
                                                                                class="w-[307px] leading-tight helvetica-normal text-darkgray font-bold me-body18 title">
                                                                                {{ langbind($productdetails, 'name') }}
                                                                            </p>
                                                                            </a>
                                                                            <div class="flex items-center">
                                                                                <p
                                                                                    class="font-bold text-mered me-body20">
                                                                                    @if(isset($productdetails->discount_price))${{ $productdetails->discount_price }}@endif
                                                                                </p>
                                                                                <p
                                                                                    class="font-bold text-lightgray me-body14 pl-[10px]">
                                                                                    $
                                                                                    <span class="linethrough">{{ $productdetails->original_price }}</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </dialog>
                                        <div component-name="me-coupon-collect-detail" class="collect-detail-modal"
                                            id="collect-detail-modal{{ $coupondetails->id }}">
                                            <div class="rounded-[20px] view-bundle-modal--container">
                                                <div class="bg-image w-full p-[40px] pb-[20px] relative">
                                                    <button
                                                        class="cdmodal-close absolute top-[25px] right-[45px] cursor-pointer"><img
                                                            src="{{ asset('frontend/img/white-close.svg') }}"
                                                            alt="close image"></button>
                                                    {{-- <div class="">
                                                        <h6 class="coupon-detail-title">@lang('labels.coupon.coupon_details')</h6>
                                                    </div> --}}
                                                    <div
                                                        class="flex flex-wrap sm:flex-nowrap items-center justify-between py-[10px] qucollectd">
                                                        <div class="relative bg-title flex justify-start items-center">
                                                            <div class="quantity-logo-container mr-[12px] relative">
                                                                <img src="{{ $coupondetails->banner_img }}"
                                                                    alt="logo"
                                                                    class="quantity-logo w-[100px] h-[100px]">
                                                                    @if($coupondetails->is_new_or_limited != null)
                                                                    @foreach (config('mediq.coupon_status') as $key => $type)
                                                                        @if ($key == $coupondetails->is_new_or_limited)
                                                                            <div class="label-tag absolute top-0 left-0 {{$coupondetails->is_new_or_limited=="new"?'new':'new-limit'}} px-[10px] py-[4px] rounded-[4px]">
                                                                                    {{ $type }}
                                                                            </div>
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                            <div>
                                                                @if (isset($coupondetails->merchant_id))
                                                                    <p class="text-center quatitle underline">
                                                                        {{ langbind($coupondetails->merchant, 'name') }}
                                                                    </p>
                                                                @endif
                                                                <p data-id="collect-detail-modal`+i+`"
                                                                    class="company-name text-darkgray cursor-pointer">
                                                                    {{ langbind($coupondetails, 'name') }}</p>
                                                                {{-- <p class="ctitle text-darkgray">
                                                                    {{ langbind($coupondetails, 'sub_title') }}</p>
                                                                <div class="flex justify-start items-center flex-wrap">
                                                                    <p class="ccategory text-lightgray new-ccategory">
                                                                        <svg width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M12.492 11.41C12.4697 11.2871 12.4023 11.1769 12.3028 11.1012C12.2034 11.0255 12.0793 10.9898 11.9548 11.0011C11.8304 11.0124 11.7147 11.0699 11.6305 11.1622C11.5463 11.2545 11.4998 11.3751 11.5 11.5V16.002L11.508 16.092C11.5303 16.2149 11.5977 16.3251 11.6972 16.4008C11.7966 16.4765 11.9207 16.5122 12.0452 16.5009C12.1696 16.4896 12.2853 16.4321 12.3695 16.3398C12.4537 16.2475 12.5002 16.1269 12.5 16.002V11.5L12.492 11.41ZM12.799 9.25C12.799 9.05109 12.72 8.86032 12.5793 8.71967C12.4387 8.57902 12.2479 8.5 12.049 8.5C11.8501 8.5 11.6593 8.57902 11.5187 8.71967C11.378 8.86032 11.299 9.05109 11.299 9.25C11.299 9.44891 11.378 9.63968 11.5187 9.78033C11.6593 9.92098 11.8501 10 12.049 10C12.2479 10 12.4387 9.92098 12.5793 9.78033C12.72 9.63968 12.799 9.44891 12.799 9.25ZM20 12.5C20 10.3783 19.1571 8.34344 17.6569 6.84315C16.1566 5.34285 14.1217 4.5 12 4.5C9.87827 4.5 7.84344 5.34285 6.34315 6.84315C4.84285 8.34344 4 10.3783 4 12.5C4 14.6217 4.84285 16.6566 6.34315 18.1569C7.84344 19.6571 9.87827 20.5 12 20.5C14.1217 20.5 16.1566 19.6571 17.6569 18.1569C19.1571 16.6566 20 14.6217 20 12.5ZM5 12.5C5 11.5807 5.18106 10.6705 5.53284 9.82122C5.88463 8.97194 6.40024 8.20026 7.05025 7.55025C7.70026 6.90024 8.47194 6.38463 9.32122 6.03284C10.1705 5.68106 11.0807 5.5 12 5.5C12.9193 5.5 13.8295 5.68106 14.6788 6.03284C15.5281 6.38463 16.2997 6.90024 16.9497 7.55025C17.5998 8.20026 18.1154 8.97194 18.4672 9.82122C18.8189 10.6705 19 11.5807 19 12.5C19 14.3565 18.2625 16.137 16.9497 17.4497C15.637 18.7625 13.8565 19.5 12 19.5C10.1435 19.5 8.36301 18.7625 7.05025 17.4497C5.7375 16.137 5 14.3565 5 12.5Z"
                                                                                fill="#7C7C7C"></path>
                                                                        </svg>
                                                                            @if($coupondetails->coupon_type ===null)
                                                                            @lang('labels.my_coupon.valid_from')
                                                                            @if(lang() == "en")
                                                                            {{ date('d M Y', strtotime($coupondetails->start_date)) }} 
                                                                            @else 
                                                                                {{ date('Y年m月d日', strtotime($coupondetails->start_date)) }}
                                                                            @endif
                                                                            @lang('labels.my_coupon.to')
                                                                            @if(lang() == "en")
                                                                            {{ date('d M Y', strtotime($coupondetails->end_date)) }}
                                                                            @else 
                                                                                {{ date('Y年m月d日', strtotime($coupondetails->end_date)) }}
                                                                            @endif
                                                                            @else
                                                                            @php
                                                                                    // check welcome coupon
                                                                                    if($coupondetails->coupon_type === 1) {
                                                                                        $from_date = date('Y-m-d', strtotime($coupondetails->created_at));
                                                                                        $to_date = date('Y-m-d', strtotime($coupondetails->created_at. ' +30 days'));
                                                                                    }

                                                                                    // check birthday coupon
                                                                                    if($coupondetails->coupon_type === 0) {
                                                                                        $birthdayMonth = date('F', strtotime(Auth::guard('customer')->user()->dob));
                                                                                        $birthdayCurrentYear = "$birthdayMonth,".date('Y');
                                                                                        $from_date = date('Y-m-01', strtotime("$birthdayCurrentYear"));
                                                                                        $to_date =  date('Y-m-t', strtotime("$birthdayCurrentYear"));
                                                                                    }
                                                                            @endphp
                                                                            @lang('labels.coupon.offer_expires')
                                                                            {{$to_date}}
                                                                            @endif
                                                                    </p>
                                                                </div> --}}
                                                            </div>
                                                            <button data-related="#drc-popup{{$coupondetails->id}}"
                                                                class="flex items-center justify-between px-[16px] py-[8px] rounded-[6px] bg-far me-body16 helvetica-normal text-darkgray h-[35px] related-products">
                                                                @lang('labels.coupon_list.related_products')
                                                                <svg width="16" height="17"
                                                                    viewBox="0 0 16 17" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M5 14.5L11 8.5L5 2.5"
                                                                        stroke="#333333" stroke-width="2.4"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round"></path>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                        <div class="gccard-content-bottom">
                                                            <button
                                                                class="text-blueMediq flex justify-center mx-auto me-body20 helvetica-normal font-bold detail-btn"
                                                                data-id="#collect-detail-modal{{$coupondetails->id}}">@lang('labels.my_coupon.received')</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                        @include('frontend.customer.empty-coupon')
                                    @endforelse
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="mdinner-view vaccine {{ $selectedCategory == 'Vaccine' ? '' : 'hidden' }}">
                        <div component-name="dashboard-available-layout">
                            <div component-name="dashboard-innerview" class="flex flex-wrap dashinnerview">
                                @if ($mainTag == 'hide' && $selectedCategory == 'Vaccine')
                                <div class="grid lg:grid-cols-2 grid-cols-1 lg:gap-x-10 lg:gap-y-5 dashboard-coupons-list w-full">
                                    @forelse ($couponList as $key => $coupondetails)
                                        <div component-name="dashboard-coupon-card" class="simple-coupon-card">
                                            <div class="w-full small-coupon--container">
                                                <div class="relative">
                                                    <div class="custom-voucher-shape gccard rounded-[20px]">
                                                        <div class="gccard-content text-center">
                                                            <div data-id="#collect-detail-modal{{ $coupondetails->id }}"
                                                                class="cclogo-container cursor-pointer show-detail-popup">
                                                                <div class="rounded-full">
                                                                    @if($coupondetails->owner_type==0)
                                                                    <img class="cclogo w-[80px] h-[80px]" src="{{$coupondetails->icon}}">
                                                                    @else
                                                                    <img class="cclogo w-[80px] h-[80px]" src="{{isset($coupondetails->merchant) ? $coupondetails->merchant->icon :'' }}">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="gccard-content-body show-detail-popup">
                                                                <div data-id="#collect-detail-modal{{ $coupondetails->id }}"
                                                                    class="cursor-pointer coupon-see-detail">
                                                                    <p
                                                                        class="company-name text-darkgray helvetica-normal cursor-pointer font-bold">
                                                                        {{ langbind($coupondetails, 'name') }}</p>
                                                                    <p
                                                                        class="ctitle me-body16 helvetica-normal text-darkgray">
                                                                        {{ langbind($coupondetails, 'sub_title') }}
                                                                    </p>
                                                                    <div
                                                                        class="flex justify-start items-center flex-wrap me-body15 helvetica-normal py-5">
                                                                        <p
                                                                            class="ccategory text-lightgray new-ccategory">
                                                                            <svg width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M12.492 11.41C12.4697 11.2871 12.4023 11.1769 12.3028 11.1012C12.2034 11.0255 12.0793 10.9898 11.9548 11.0011C11.8304 11.0124 11.7147 11.0699 11.6305 11.1622C11.5463 11.2545 11.4998 11.3751 11.5 11.5V16.002L11.508 16.092C11.5303 16.2149 11.5977 16.3251 11.6972 16.4008C11.7966 16.4765 11.9207 16.5122 12.0452 16.5009C12.1696 16.4896 12.2853 16.4321 12.3695 16.3398C12.4537 16.2475 12.5002 16.1269 12.5 16.002V11.5L12.492 11.41ZM12.799 9.25C12.799 9.05109 12.72 8.86032 12.5793 8.71967C12.4387 8.57902 12.2479 8.5 12.049 8.5C11.8501 8.5 11.6593 8.57902 11.5187 8.71967C11.378 8.86032 11.299 9.05109 11.299 9.25C11.299 9.44891 11.378 9.63968 11.5187 9.78033C11.6593 9.92098 11.8501 10 12.049 10C12.2479 10 12.4387 9.92098 12.5793 9.78033C12.72 9.63968 12.799 9.44891 12.799 9.25ZM20 12.5C20 10.3783 19.1571 8.34344 17.6569 6.84315C16.1566 5.34285 14.1217 4.5 12 4.5C9.87827 4.5 7.84344 5.34285 6.34315 6.84315C4.84285 8.34344 4 10.3783 4 12.5C4 14.6217 4.84285 16.6566 6.34315 18.1569C7.84344 19.6571 9.87827 20.5 12 20.5C14.1217 20.5 16.1566 19.6571 17.6569 18.1569C19.1571 16.6566 20 14.6217 20 12.5ZM5 12.5C5 11.5807 5.18106 10.6705 5.53284 9.82122C5.88463 8.97194 6.40024 8.20026 7.05025 7.55025C7.70026 6.90024 8.47194 6.38463 9.32122 6.03284C10.1705 5.68106 11.0807 5.5 12 5.5C12.9193 5.5 13.8295 5.68106 14.6788 6.03284C15.5281 6.38463 16.2997 6.90024 16.9497 7.55025C17.5998 8.20026 18.1154 8.97194 18.4672 9.82122C18.8189 10.6705 19 11.5807 19 12.5C19 14.3565 18.2625 16.137 16.9497 17.4497C15.637 18.7625 13.8565 19.5 12 19.5C10.1435 19.5 8.36301 18.7625 7.05025 17.4497C5.7375 16.137 5 14.3565 5 12.5Z"
                                                                                    fill="#7C7C7C"></path>
                                                                            </svg>
                                                                            @if($coupondetails->coupon_type ===null)
                                                                            @lang('labels.my_coupon.valid_from')
                                                                            @if(lang() == "en")
                                                                            {{ date('d M Y', strtotime($coupondetails->start_date)) }} 
                                                                            @else 
                                                                                {{ date('Y年m月d日', strtotime($coupondetails->start_date)) }}
                                                                            @endif
                                                                            @lang('labels.my_coupon.to')
                                                                            @if(lang() == "en")
                                                                            {{ date('d M Y', strtotime($coupondetails->end_date)) }}
                                                                            @else 
                                                                                {{ date('Y年m月d日', strtotime($coupondetails->end_date)) }}
                                                                            @endif
                                                                                {{-- @if ($coupondetails->usage_time)
                                                                                    Once collected, valid for
                                                                                    {{ $coupondetails->usage_time }} days
                                                                                @else
                                                                                @lang('labels.coupon.offer_expires')
                                                                                    {{ date('d M Y', strtotime($coupondetails->end_date)) }}
                                                                                @endif --}}
                                                                            @else
                                                                            @php
                                                                                    // check welcome coupon
                                                                                    if($coupondetails->coupon_type === 1) {
                                                                                        $from_date = date('Y-m-d', strtotime($coupondetails->created_at));
                                                                                        $to_date = date('Y-m-d', strtotime($coupondetails->created_at. ' +30 days'));
                                                                                    }

                                                                                    // check birthday coupon
                                                                                    if($coupondetails->coupon_type === 0) {
                                                                                        $birthdayMonth = date('F', strtotime(Auth::guard('customer')->user()->dob));
                                                                                        $birthdayCurrentYear = "$birthdayMonth,".date('Y');
                                                                                        $from_date = date('Y-m-01', strtotime("$birthdayCurrentYear"));
                                                                                        $to_date =  date('Y-m-t', strtotime("$birthdayCurrentYear"));
                                                                                    }
                                                                            @endphp
                                                                            @lang('labels.coupon.offer_expires')
                                                                            {{$to_date}}
                                                                            @endif
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <button
                                                                    data-related="#drc-popup{{ $coupondetails->id }}"
                                                                    class="flex items-center justify-between px-[16px] py-[8px] rounded-[6px] bg-far me-body16 helvetica-normal text-darkgray h-[35px] related-products">
                                                                    @lang('labels.coupon_list.related_products')
                                                                    <svg width="16" height="17"
                                                                        viewBox="0 0 16 17" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M5 14.5L11 8.5L5 2.5"
                                                                            stroke="#333333" stroke-width="2.4"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round"></path>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                            <div class="gccard-content-bottom">
                                                                <button
                                                                    class="text-blueMediq flex justify-center mx-auto me-body20 helvetica-normal font-bold detail-btn"
                                                                    data-id="#collect-detail-modal{{ $coupondetails->id }}">@lang('labels.my_coupon.received')</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <dialog id="drc-popup{{ $coupondetails->id }}"
                                            component-name="dashboard-related-card"
                                            class="items-center justify-center fixed z-[1001] left-0 top-0 w-full h-full bg-black/[.75] overflow-hidden">
                                            <div
                                                class="modal-content w-full max-w-[90%] 4xs:max-w-[80%] lg:max-w-[578px] shadow-shadow02 my-[15%] mx-auto">
                                                <div class="relative rounded-[12px] bg-white">
                                                    <div class="flex ml-auto mr-6 w-5 h-5 absolute right-0 top-4">
                                                        <span data-id="drc-popup{{ $coupondetails->id }}"
                                                            class="pb-[4px] absolute left-1/2 top-1/2 -translate-y-1/2 -translate-x-1/2 close-add-compare-modal  flex items-center justify-center text-[32px] w-full cursor-pointer text-[#1A1818] focus:no-underline">×</span>
                                                    </div>
                                                    <div class="modal-content-plan">
                                                        <div class="preview-bgradient p-10 rounded-t-[12px]">
                                                            <h2
                                                                class="font-secondary font-bold text-darkgray me-body23">
                                                                @lang('labels.coupon_list.related_products')</h2>
                                                        </div>

                                                        <div class="bg-white p-10 pt-5 pr-[24px] rounded-b-[12px]">
                                                            <div class="flex flex-col compare-box-container">
                                                                @foreach ($coupondetails->couponProducts as $data)
                                                                    @php $productdetails = \App\Models\Product::find($data->product_id); @endphp
                                                                    <div
                                                                        class="relative flex items-center py-5 compare-img-container">
                                                                        <div class="mr-[12px]">
                                                                            <img src="{{ $productdetails->featured_img }}"
                                                                                alt="image"
                                                                                class="w-[80px] h-[80px] rounded-[12px]">
                                                                        </div>
                                                                        <div>
                                                                            <a href="{{route("product-detail",['slug'=>$productdetails->slug_en,'category'=>$productdetails->category->name_en])}}">
                                                                            <p
                                                                                class="w-[307px] leading-tight helvetica-normal text-darkgray font-bold me-body18 title">
                                                                                {{ langbind($productdetails, 'name') }}
                                                                            </p>
                                                                            </a>
                                                                            <div class="flex items-center">
                                                                                <p
                                                                                    class="font-bold text-mered me-body20">
                                                                                    @if(isset($productdetails->discount_price))${{ $productdetails->discount_price }}@endif
                                                                                </p>
                                                                                <p
                                                                                    class="font-bold text-lightgray me-body14 pl-[10px]">
                                                                                    $
                                                                                    <span class="linethrough">{{ $productdetails->original_price }}</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </dialog>
                                        <div component-name="me-coupon-collect-detail" class="collect-detail-modal"
                                            id="collect-detail-modal{{ $coupondetails->id }}">
                                            <div class="rounded-[20px] view-bundle-modal--container">
                                                <div class="bg-image w-full p-[40px] pb-[20px] relative">
                                                    <button
                                                        class="cdmodal-close absolute top-[25px] right-[45px] cursor-pointer"><img
                                                            src="{{ asset('frontend/img/white-close.svg') }}"
                                                            alt="close image"></button>
                                                    {{-- <div class="">
                                                        <h6 class="coupon-detail-title">@lang('labels.coupon.coupon_details')</h6>
                                                    </div> --}}
                                                    <div
                                                        class="flex flex-wrap sm:flex-nowrap items-center justify-between py-[10px] qucollectd">
                                                        <div class="relative bg-title flex justify-start items-center">
                                                            <div class="quantity-logo-container mr-[12px] relative">
                                                                <img src="{{ $coupondetails->banner_img }}"
                                                                    alt="logo"
                                                                    class="quantity-logo w-[100px] h-[100px]">
                                                                    @if($coupondetails->is_new_or_limited != null)
                                                                    @foreach (config('mediq.coupon_status') as $key => $type)
                                                                        @if ($key == $coupondetails->is_new_or_limited)
                                                                            <div class="label-tag absolute top-0 left-0 {{$coupondetails->is_new_or_limited=="new"?'new':'new-limit'}} px-[10px] py-[4px] rounded-[4px]">
                                                                                    {{ $type }}
                                                                            </div>
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                            <div>
                                                                @if (isset($coupondetails->merchant_id))
                                                                    <p class="text-center quatitle underline">
                                                                        {{ langbind($coupondetails->merchant, 'name') }}
                                                                    </p>
                                                                @endif
                                                                <p data-id="collect-detail-modal`+i+`"
                                                                    class="company-name text-darkgray cursor-pointer">
                                                                    {{ langbind($coupondetails, 'name') }}</p>
                                                                {{-- <p class="ctitle text-darkgray">
                                                                    {{ langbind($coupondetails, 'sub_title') }}</p>
                                                                <div class="flex justify-start items-center flex-wrap">
                                                                    <p class="ccategory text-lightgray new-ccategory">
                                                                        <svg width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M12.492 11.41C12.4697 11.2871 12.4023 11.1769 12.3028 11.1012C12.2034 11.0255 12.0793 10.9898 11.9548 11.0011C11.8304 11.0124 11.7147 11.0699 11.6305 11.1622C11.5463 11.2545 11.4998 11.3751 11.5 11.5V16.002L11.508 16.092C11.5303 16.2149 11.5977 16.3251 11.6972 16.4008C11.7966 16.4765 11.9207 16.5122 12.0452 16.5009C12.1696 16.4896 12.2853 16.4321 12.3695 16.3398C12.4537 16.2475 12.5002 16.1269 12.5 16.002V11.5L12.492 11.41ZM12.799 9.25C12.799 9.05109 12.72 8.86032 12.5793 8.71967C12.4387 8.57902 12.2479 8.5 12.049 8.5C11.8501 8.5 11.6593 8.57902 11.5187 8.71967C11.378 8.86032 11.299 9.05109 11.299 9.25C11.299 9.44891 11.378 9.63968 11.5187 9.78033C11.6593 9.92098 11.8501 10 12.049 10C12.2479 10 12.4387 9.92098 12.5793 9.78033C12.72 9.63968 12.799 9.44891 12.799 9.25ZM20 12.5C20 10.3783 19.1571 8.34344 17.6569 6.84315C16.1566 5.34285 14.1217 4.5 12 4.5C9.87827 4.5 7.84344 5.34285 6.34315 6.84315C4.84285 8.34344 4 10.3783 4 12.5C4 14.6217 4.84285 16.6566 6.34315 18.1569C7.84344 19.6571 9.87827 20.5 12 20.5C14.1217 20.5 16.1566 19.6571 17.6569 18.1569C19.1571 16.6566 20 14.6217 20 12.5ZM5 12.5C5 11.5807 5.18106 10.6705 5.53284 9.82122C5.88463 8.97194 6.40024 8.20026 7.05025 7.55025C7.70026 6.90024 8.47194 6.38463 9.32122 6.03284C10.1705 5.68106 11.0807 5.5 12 5.5C12.9193 5.5 13.8295 5.68106 14.6788 6.03284C15.5281 6.38463 16.2997 6.90024 16.9497 7.55025C17.5998 8.20026 18.1154 8.97194 18.4672 9.82122C18.8189 10.6705 19 11.5807 19 12.5C19 14.3565 18.2625 16.137 16.9497 17.4497C15.637 18.7625 13.8565 19.5 12 19.5C10.1435 19.5 8.36301 18.7625 7.05025 17.4497C5.7375 16.137 5 14.3565 5 12.5Z"
                                                                                fill="#7C7C7C"></path>
                                                                        </svg>
                                                                            @if($coupondetails->coupon_type ===null)
                                                                            @lang('labels.my_coupon.valid_from')
                                                                            @if(lang() == "en")
                                                                            {{ date('d M Y', strtotime($coupondetails->start_date)) }} 
                                                                            @else 
                                                                                {{ date('Y年m月d日', strtotime($coupondetails->start_date)) }}
                                                                            @endif
                                                                            @lang('labels.my_coupon.to')
                                                                            @if(lang() == "en")
                                                                            {{ date('d M Y', strtotime($coupondetails->end_date)) }}
                                                                            @else 
                                                                                {{ date('Y年m月d日', strtotime($coupondetails->end_date)) }}
                                                                            @endif
                                                                            @else
                                                                            @php
                                                                                    // check welcome coupon
                                                                                    if($coupondetails->coupon_type === 1) {
                                                                                        $from_date = date('Y-m-d', strtotime($coupondetails->created_at));
                                                                                        $to_date = date('Y-m-d', strtotime($coupondetails->created_at. ' +30 days'));
                                                                                    }

                                                                                    // check birthday coupon
                                                                                    if($coupondetails->coupon_type === 0) {
                                                                                        $birthdayMonth = date('F', strtotime(Auth::guard('customer')->user()->dob));
                                                                                        $birthdayCurrentYear = "$birthdayMonth,".date('Y');
                                                                                        $from_date = date('Y-m-01', strtotime("$birthdayCurrentYear"));
                                                                                        $to_date =  date('Y-m-t', strtotime("$birthdayCurrentYear"));
                                                                                    }
                                                                            @endphp
                                                                            @lang('labels.coupon.offer_expires')
                                                                            {{$to_date}}
                                                                            @endif
                                                                    </p>
                                                                </div> --}}
                                                            </div>
                                                            <button data-related="#drc-popup{{$coupondetails->id}}"
                                                                class="flex items-center justify-between px-[16px] py-[8px] rounded-[6px] bg-far me-body16 helvetica-normal text-darkgray h-[35px] related-products">
                                                                @lang('labels.coupon_list.related_products')
                                                                <svg width="16" height="17"
                                                                    viewBox="0 0 16 17" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M5 14.5L11 8.5L5 2.5"
                                                                        stroke="#333333" stroke-width="2.4"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round"></path>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                        <div class="gccard-content-bottom">
                                                            <button
                                                                class="text-blueMediq flex justify-center mx-auto me-body20 helvetica-normal font-bold detail-btn"
                                                                data-id="#collect-detail-modal{{$coupondetails->id}}">@lang('labels.my_coupon.received')</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        @include('frontend.customer.empty-coupon')
                                    @endforelse
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="mdinner-view dna-test {{ $selectedCategory == 'DNA Test' ? '' : 'hidden' }}">
                        <div component-name="dashboard-available-layout">
                            <div component-name="dashboard-innerview" class="flex flex-wrap dashinnerview">
                                @if ($mainTag == 'hide' && $selectedCategory == 'DNA Test')
                                <div class="grid lg:grid-cols-2 grid-cols-1 lg:gap-x-10 lg:gap-y-5 dashboard-coupons-list w-full">
                                    @forelse ($couponList as $key => $coupondetails)
                                        <div component-name="dashboard-coupon-card" class="simple-coupon-card">
                                            <div class="w-full small-coupon--container">
                                                <div class="relative">
                                                    <div class="custom-voucher-shape gccard rounded-[20px]">
                                                        <div class="gccard-content text-center">
                                                            <div data-id="#collect-detail-modal{{ $coupondetails->id }}"
                                                                class="cclogo-container cursor-pointer show-detail-popup">
                                                                <div class="rounded-full">
                                                                    @if($coupondetails->owner_type==0)
                                                                    <img class="cclogo w-[80px] h-[80px]" src="{{$coupondetails->icon}}">
                                                                    @else
                                                                    <img class="cclogo w-[80px] h-[80px]" src="{{isset($coupondetails->merchant) ? $coupondetails->merchant->icon :'' }}">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="gccard-content-body show-detail-popup">
                                                                <div data-id="#collect-detail-modal{{ $coupondetails->id }}"
                                                                    class="cursor-pointer coupon-see-detail">
                                                                    <p
                                                                        class="company-name text-darkgray helvetica-normal cursor-pointer font-bold">
                                                                        {{ langbind($coupondetails, 'name') }}</p>
                                                                    <p
                                                                        class="ctitle me-body16 helvetica-normal text-darkgray">
                                                                        {{ langbind($coupondetails, 'sub_title') }}
                                                                    </p>
                                                                    <div
                                                                        class="flex justify-start items-center flex-wrap me-body15 helvetica-normal py-5">
                                                                        <p
                                                                            class="ccategory text-lightgray new-ccategory">
                                                                            <svg width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M12.492 11.41C12.4697 11.2871 12.4023 11.1769 12.3028 11.1012C12.2034 11.0255 12.0793 10.9898 11.9548 11.0011C11.8304 11.0124 11.7147 11.0699 11.6305 11.1622C11.5463 11.2545 11.4998 11.3751 11.5 11.5V16.002L11.508 16.092C11.5303 16.2149 11.5977 16.3251 11.6972 16.4008C11.7966 16.4765 11.9207 16.5122 12.0452 16.5009C12.1696 16.4896 12.2853 16.4321 12.3695 16.3398C12.4537 16.2475 12.5002 16.1269 12.5 16.002V11.5L12.492 11.41ZM12.799 9.25C12.799 9.05109 12.72 8.86032 12.5793 8.71967C12.4387 8.57902 12.2479 8.5 12.049 8.5C11.8501 8.5 11.6593 8.57902 11.5187 8.71967C11.378 8.86032 11.299 9.05109 11.299 9.25C11.299 9.44891 11.378 9.63968 11.5187 9.78033C11.6593 9.92098 11.8501 10 12.049 10C12.2479 10 12.4387 9.92098 12.5793 9.78033C12.72 9.63968 12.799 9.44891 12.799 9.25ZM20 12.5C20 10.3783 19.1571 8.34344 17.6569 6.84315C16.1566 5.34285 14.1217 4.5 12 4.5C9.87827 4.5 7.84344 5.34285 6.34315 6.84315C4.84285 8.34344 4 10.3783 4 12.5C4 14.6217 4.84285 16.6566 6.34315 18.1569C7.84344 19.6571 9.87827 20.5 12 20.5C14.1217 20.5 16.1566 19.6571 17.6569 18.1569C19.1571 16.6566 20 14.6217 20 12.5ZM5 12.5C5 11.5807 5.18106 10.6705 5.53284 9.82122C5.88463 8.97194 6.40024 8.20026 7.05025 7.55025C7.70026 6.90024 8.47194 6.38463 9.32122 6.03284C10.1705 5.68106 11.0807 5.5 12 5.5C12.9193 5.5 13.8295 5.68106 14.6788 6.03284C15.5281 6.38463 16.2997 6.90024 16.9497 7.55025C17.5998 8.20026 18.1154 8.97194 18.4672 9.82122C18.8189 10.6705 19 11.5807 19 12.5C19 14.3565 18.2625 16.137 16.9497 17.4497C15.637 18.7625 13.8565 19.5 12 19.5C10.1435 19.5 8.36301 18.7625 7.05025 17.4497C5.7375 16.137 5 14.3565 5 12.5Z"
                                                                                    fill="#7C7C7C"></path>
                                                                            </svg>
                                                                            @if($coupondetails->coupon_type ===null)
                                                                            @lang('labels.my_coupon.valid_from')
                                                                            @if(lang() == "en")
                                                                            {{ date('d M Y', strtotime($coupondetails->start_date)) }} 
                                                                            @else 
                                                                                {{ date('Y年m月d日', strtotime($coupondetails->start_date)) }}
                                                                            @endif
                                                                            @lang('labels.my_coupon.to')
                                                                            @if(lang() == "en")
                                                                            {{ date('d M Y', strtotime($coupondetails->end_date)) }}
                                                                            @else 
                                                                                {{ date('Y年m月d日', strtotime($coupondetails->end_date)) }}
                                                                            @endif
                                                                                {{-- @if ($coupondetails->usage_time)
                                                                                    Once collected, valid for
                                                                                    {{ $coupondetails->usage_time }} days
                                                                                @else
                                                                                @lang('labels.coupon.offer_expires')
                                                                                    {{ date('d M Y', strtotime($coupondetails->end_date)) }}
                                                                                @endif --}}
                                                                            @else
                                                                            @php
                                                                                    // check welcome coupon
                                                                                    if($coupondetails->coupon_type === 1) {
                                                                                        $from_date = date('Y-m-d', strtotime($coupondetails->created_at));
                                                                                        $to_date = date('Y-m-d', strtotime($coupondetails->created_at. ' +30 days'));
                                                                                    }

                                                                                    // check birthday coupon
                                                                                    if($coupondetails->coupon_type === 0) {
                                                                                        $birthdayMonth = date('F', strtotime(Auth::guard('customer')->user()->dob));
                                                                                        $birthdayCurrentYear = "$birthdayMonth,".date('Y');
                                                                                        $from_date = date('Y-m-01', strtotime("$birthdayCurrentYear"));
                                                                                        $to_date =  date('Y-m-t', strtotime("$birthdayCurrentYear"));
                                                                                    }
                                                                            @endphp
                                                                            @lang('labels.coupon.offer_expires')
                                                                            {{$to_date}}
                                                                            @endif
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <button
                                                                    data-related="#drc-popup{{ $coupondetails->id }}"
                                                                    class="flex items-center justify-between px-[16px] py-[8px] rounded-[6px] bg-far me-body16 helvetica-normal text-darkgray h-[35px] related-products">
                                                                    @lang('labels.coupon_list.related_products')
                                                                    <svg width="16" height="17"
                                                                        viewBox="0 0 16 17" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M5 14.5L11 8.5L5 2.5"
                                                                            stroke="#333333" stroke-width="2.4"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round"></path>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                            <div class="gccard-content-bottom">
                                                                <button
                                                                    class="text-blueMediq flex justify-center mx-auto me-body20 helvetica-normal font-bold detail-btn"
                                                                    data-id="#collect-detail-modal{{ $coupondetails->id }}">@lang('labels.my_coupon.received')</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <dialog id="drc-popup{{ $coupondetails->id }}"
                                            component-name="dashboard-related-card"
                                            class="items-center justify-center fixed z-[1001] left-0 top-0 w-full h-full bg-black/[.75] overflow-hidden">
                                            <div
                                                class="modal-content w-full max-w-[90%] 4xs:max-w-[80%] lg:max-w-[578px] shadow-shadow02 my-[15%] mx-auto">
                                                <div class="relative rounded-[12px] bg-white">
                                                    <div class="flex ml-auto mr-6 w-5 h-5 absolute right-0 top-4">
                                                        <span data-id="drc-popup{{ $coupondetails->id }}"
                                                            class="pb-[4px] absolute left-1/2 top-1/2 -translate-y-1/2 -translate-x-1/2 close-add-compare-modal  flex items-center justify-center text-[32px] w-full cursor-pointer text-[#1A1818] focus:no-underline">×</span>
                                                    </div>
                                                    <div class="modal-content-plan">
                                                        <div class="preview-bgradient p-10 rounded-t-[12px]">
                                                            <h2
                                                                class="font-secondary font-bold text-darkgray me-body23">
                                                                @lang('labels.coupon_list.related_products')</h2>
                                                        </div>

                                                        <div class="bg-white p-10 pt-5 pr-[24px] rounded-b-[12px]">
                                                            <div class="flex flex-col compare-box-container">
                                                                @foreach ($coupondetails->couponProducts as $data)
                                                                    @php $productdetails = \App\Models\Product::find($data->product_id); @endphp
                                                                    <div
                                                                        class="relative flex items-center py-5 compare-img-container">
                                                                        <div class="mr-[12px]">
                                                                            <img src="{{ $productdetails->featured_img }}"
                                                                                alt="image"
                                                                                class="w-[80px] h-[80px] rounded-[12px]">
                                                                        </div>
                                                                        <div>
                                                                            <a href="{{route("product-detail",['slug'=>$productdetails->slug_en,'category'=>$productdetails->category->name_en])}}">
                                                                            <p
                                                                                class="w-[307px] leading-tight helvetica-normal text-darkgray font-bold me-body18 title">
                                                                                {{ langbind($productdetails, 'name') }}
                                                                            </p>
                                                                            </a>
                                                                            <div class="flex items-center">
                                                                                <p
                                                                                    class="font-bold text-mered me-body20">
                                                                                    @if(isset($productdetails->discount_price))${{ $productdetails->discount_price }}@endif
                                                                                </p>
                                                                                <p
                                                                                    class="font-bold text-lightgray me-body14 pl-[10px]">
                                                                                    $
                                                                                    <span class="linethrough">{{ $productdetails->original_price }}</span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </dialog>
                                        <div component-name="me-coupon-collect-detail" class="collect-detail-modal"
                                            id="collect-detail-modal{{ $coupondetails->id }}">
                                            <div class="rounded-[20px] view-bundle-modal--container">
                                                <div class="bg-image w-full p-[40px] pb-[20px] relative">
                                                    <button
                                                        class="cdmodal-close absolute top-[25px] right-[45px] cursor-pointer"><img
                                                            src="{{ asset('frontend/img/white-close.svg') }}"
                                                            alt="close image"></button>
                                                    {{-- <div class="">
                                                        <h6 class="coupon-detail-title">@lang('labels.coupon.coupon_details')</h6>
                                                    </div> --}}
                                                    <div
                                                        class="flex flex-wrap sm:flex-nowrap items-center justify-between py-[10px] qucollectd">
                                                        <div class="relative bg-title flex justify-start items-center">
                                                            <div class="quantity-logo-container mr-[12px] relative">
                                                                <img src="{{ $coupondetails->banner_img }}"
                                                                    alt="logo"
                                                                    class="quantity-logo w-[100px] h-[100px]">
                                                                    @if($coupondetails->is_new_or_limited != null)
                                                                    @foreach (config('mediq.coupon_status') as $key => $type)
                                                                        @if ($key == $coupondetails->is_new_or_limited)
                                                                            <div class="label-tag absolute top-0 left-0 {{$coupondetails->is_new_or_limited=="new"?'new':'new-limit'}} px-[10px] py-[4px] rounded-[4px]">
                                                                                    {{ $type }}
                                                                            </div>
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                            <div>
                                                                @if (isset($coupondetails->merchant_id))
                                                                    <p class="text-center quatitle underline">
                                                                        {{ langbind($coupondetails->merchant, 'name') }}
                                                                    </p>
                                                                @endif
                                                                <p data-id="collect-detail-modal`+i+`"
                                                                    class="company-name text-darkgray cursor-pointer">
                                                                    {{ langbind($coupondetails, 'name') }}</p>
                                                                {{-- <p class="ctitle text-darkgray">
                                                                    {{ langbind($coupondetails, 'sub_title') }}</p>
                                                                <div class="flex justify-start items-center flex-wrap">
                                                                    <p class="ccategory text-lightgray new-ccategory">
                                                                        <svg width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M12.492 11.41C12.4697 11.2871 12.4023 11.1769 12.3028 11.1012C12.2034 11.0255 12.0793 10.9898 11.9548 11.0011C11.8304 11.0124 11.7147 11.0699 11.6305 11.1622C11.5463 11.2545 11.4998 11.3751 11.5 11.5V16.002L11.508 16.092C11.5303 16.2149 11.5977 16.3251 11.6972 16.4008C11.7966 16.4765 11.9207 16.5122 12.0452 16.5009C12.1696 16.4896 12.2853 16.4321 12.3695 16.3398C12.4537 16.2475 12.5002 16.1269 12.5 16.002V11.5L12.492 11.41ZM12.799 9.25C12.799 9.05109 12.72 8.86032 12.5793 8.71967C12.4387 8.57902 12.2479 8.5 12.049 8.5C11.8501 8.5 11.6593 8.57902 11.5187 8.71967C11.378 8.86032 11.299 9.05109 11.299 9.25C11.299 9.44891 11.378 9.63968 11.5187 9.78033C11.6593 9.92098 11.8501 10 12.049 10C12.2479 10 12.4387 9.92098 12.5793 9.78033C12.72 9.63968 12.799 9.44891 12.799 9.25ZM20 12.5C20 10.3783 19.1571 8.34344 17.6569 6.84315C16.1566 5.34285 14.1217 4.5 12 4.5C9.87827 4.5 7.84344 5.34285 6.34315 6.84315C4.84285 8.34344 4 10.3783 4 12.5C4 14.6217 4.84285 16.6566 6.34315 18.1569C7.84344 19.6571 9.87827 20.5 12 20.5C14.1217 20.5 16.1566 19.6571 17.6569 18.1569C19.1571 16.6566 20 14.6217 20 12.5ZM5 12.5C5 11.5807 5.18106 10.6705 5.53284 9.82122C5.88463 8.97194 6.40024 8.20026 7.05025 7.55025C7.70026 6.90024 8.47194 6.38463 9.32122 6.03284C10.1705 5.68106 11.0807 5.5 12 5.5C12.9193 5.5 13.8295 5.68106 14.6788 6.03284C15.5281 6.38463 16.2997 6.90024 16.9497 7.55025C17.5998 8.20026 18.1154 8.97194 18.4672 9.82122C18.8189 10.6705 19 11.5807 19 12.5C19 14.3565 18.2625 16.137 16.9497 17.4497C15.637 18.7625 13.8565 19.5 12 19.5C10.1435 19.5 8.36301 18.7625 7.05025 17.4497C5.7375 16.137 5 14.3565 5 12.5Z"
                                                                                fill="#7C7C7C"></path>
                                                                        </svg>
                                                                        @if($coupondetails->coupon_type ===null)
                                                                        @lang('labels.my_coupon.valid_from')
                                                                        @if(lang() == "en")
                                                                        {{ date('d M Y', strtotime($coupondetails->start_date)) }} 
                                                                        @else 
                                                                            {{ date('Y年m月d日', strtotime($coupondetails->start_date)) }}
                                                                        @endif
                                                                        @lang('labels.my_coupon.to')
                                                                        @if(lang() == "en")
                                                                        {{ date('d M Y', strtotime($coupondetails->end_date)) }}
                                                                        @else 
                                                                            {{ date('Y年m月d日', strtotime($coupondetails->end_date)) }}
                                                                        @endif
                                                                        @else
                                                                        @php
                                                                                // check welcome coupon
                                                                                if($coupondetails->coupon_type === 1) {
                                                                                    $from_date = date('Y-m-d', strtotime($coupondetails->created_at));
                                                                                    $to_date = date('Y-m-d', strtotime($coupondetails->created_at. ' +30 days'));
                                                                                }

                                                                                // check birthday coupon
                                                                                if($coupondetails->coupon_type === 0) {
                                                                                    $birthdayMonth = date('F', strtotime(Auth::guard('customer')->user()->dob));
                                                                                    $birthdayCurrentYear = "$birthdayMonth,".date('Y');
                                                                                    $from_date = date('Y-m-01', strtotime("$birthdayCurrentYear"));
                                                                                    $to_date =  date('Y-m-t', strtotime("$birthdayCurrentYear"));
                                                                                }
                                                                        @endphp
                                                                        @lang('labels.coupon.offer_expires')
                                                                        {{$to_date}}
                                                                        @endif
                                                                    </p>
                                                                </div> --}}
                                                            </div>
                                                            <button data-related="#drc-popup{{$coupondetails->id}}"
                                                                class="flex items-center justify-between px-[16px] py-[8px] rounded-[6px] bg-far me-body16 helvetica-normal text-darkgray h-[35px] related-products">
                                                                @lang('labels.coupon_list.related_products')
                                                                <svg width="16" height="17"
                                                                    viewBox="0 0 16 17" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M5 14.5L11 8.5L5 2.5"
                                                                        stroke="#333333" stroke-width="2.4"
                                                                        stroke-linecap="round"
                                                                        stroke-linejoin="round"></path>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                        <div class="gccard-content-bottom">
                                                            <button
                                                                class="text-blueMediq flex justify-center mx-auto me-body20 helvetica-normal font-bold detail-btn"
                                                                data-id="#collect-detail-modal{{$coupondetails->id}}">@lang('labels.my_coupon.received')</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        @include('frontend.customer.empty-coupon')
                                    @endforelse
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
        .qua-collect-btn-content {
                background-color: #ff8201;
                color: #fff;
                border: 1px solid #ff8201;
                line-height: 22.4px;
        }
        </style>
        {!! $couponList->appends([])->links('frontend.pagination')->render() !!}

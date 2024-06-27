<div component-name="me-product-detail-gallery" class="me-product-detail-gallery">
    <div class="relative py-5 md:py-[40px] pb-5 md:pb-[40px] pt-[6px] max-w-[1140px]">
        <div class="item-container">

            <div class="item">
                @if(isset($product->merchant))
                    <img data-id="0" src="{{ isset($product->merchant->icon) ? $product->merchant->icon : asset('frontend/img/quality-healthcare.png') }}"
                        alt="quality healthcare" class="head-thumbnail w-full h-full">
                    @else
                    <img data-id="0" src="{{ isset($product->featured_img) ? $product->featured_img : asset('frontend/img/quality-healthcare.png') }}"
                         alt="quality healthcare" class="head-thumbnail w-full h-full">
                @endif
                {{-- <img src="{{ $product->featured_img ?? asset('frontend/img/MM_1.jpeg') }}" data-id="0" class="head-thumbnail w-full h-full"> --}}
            </div>
            {{-- {{ count($product_allImages) }} --}}
            @if (count($product_allImages) > 0)
                @foreach ($product_allImages->take(4) as $img)
                    <div class="item"><img src="{{ isset($img) ? $img : asset('frontend/img/MM_2.jpeg') }}"
                            data-id="1" class="head-thumbnail w-full h-full">
                    </div>
                @endforeach
                @else
                @foreach ($allImages->take(4) as $img)
                    <div class="item"><img src="{{ isset($img) ? $img : asset('frontend/img/MM_2.jpeg') }}"
                            data-id="1" class="head-thumbnail w-full h-full">
                    </div>
                @endforeach
            @endif

        </div>
        <button
            class="see-all-btn absolute bottom-[30px] xs:bottom-[50px] right-[10px] rounded-[4px] helvetica-normal me-body14">
            <img src="{{ asset('frontend/img/album.sv') }}g" alt="album icon" class="mr-2" />

            @if (count($product_allImages) > 0)
                @if (app()->getLocale() == 'en')
                    {{ $product_countImgs != null ? 'See All ' . $product_countImgs . ' Photos ' : '' }}
                @elseif (app()->getLocale() == 'zh-hk')
                    {{ $product_countImgs != null ? '查看' . $product_countImgs . '  張照片 ' : '' }}
                @elseif (app()->getLocale() == 'zh-cn')
                    {{ $product_countImgs != null ? '查看' . $product_countImgs . '  张照片 ' : '' }}
                @endif
            @else
                @if (app()->getLocale() == 'en')
                    {{ $countImgs != null ? 'See All ' . $countImgs . ' Photos ' : '' }}
                @elseif (app()->getLocale() == 'zh-hk')
                    {{ $countImgs != null ? '查看' . $countImgs . '  張照片 ' : '' }}
                @elseif (app()->getLocale() == 'zh-cn')
                    {{ $countImgs != null ? '查看' . $countImgs . '  张照片 ' : '' }}
                @endif
            @endif


        </button>
    </div>
</div>
<div component-name="me-gallery-with-filter" id="gallery-tab-popup"
    class="modal hidden fixed z-[1001] left-0 top-0 w-full h-full bg-black/[.5] flex items-center justify-center gallery-with-filter ">
    <div class="modal-content w-full max-w-[90%] 7xl:max-w-[1260px] shadow-shadow02 my-[15%] mx-auto">
        <div class="bg-white rounded-[12px] px-[24px]">
            <div class="relative pt-[20px]">
                <ul
                    class="flex items-center justify-start border border-b-[#E4E4E4] border-t-0 border-l-0 border-r-0 main-tab">
                    <li data-id="#overview-gallery" class="mr-[50px] pb-[10px] active cursor-pointer">
                        @lang('labels.product_detail.overview1') 
                    </li>
                    <!-- <li data-id="#user-upload" class="mr-[50px] pb-[10px] cursor-pointer">User Uploads</li> -->
                </ul>
                <div class="flex ml-auto w-5 h-5 absolute right-0 top-[15px] 7xl:top-[25px] close-item">
                    <span data-id="gallery-tab-popup"
                        class="pb-[4px] absolute left-1/2 top-1/2 -translate-y-1/2 -translate-x-1/2 close-modal flex items-center justify-center text-[36px] w-full cursor-pointer text-[#1A1818] focus:no-underline">&times;</span>
                </div>
            </div>
            <div class="gallery-content">
                <div class="">

                    <div id="overview-gallery" class="">
                        <div class="flex justify-between ">
                            <div class="ogallery-div w-full h-full overflow-y-auto max-h-[450px] 7xl:max-h-[728px] my-[20px]"
                                id="main-div">
                                @if (count($product_galleries) > 0 && $product_galleries[0]['feature_images'] != null)
                                <div class="ogallery-content" id="num6">
                                    <div class="helvetica-normal me-body20 font-bold text-darkgray mb-[8px]">
                                        @lang('labels.product_detail.feature_images')
                                    </div>
                                    <div class="flex flex-wrap">
                                        {{-- @if (count($product_allImages) > 0) --}}
                                            @if (count($product_galleries) > 0 && $product_galleries[0]['feature_images'] != null)
                                                @foreach ($product_galleries[0]['feature_images'] as $img)
                                                    <div
                                                        class="rounded-[8px] mr-3 mt-3 thumbnail-div w-[92%] xs:w-[45%] htzxs:w-[46%] lg-custom:w-[31.2%] xl:w-[31.6%]">
                                                        <img src="{{ $img }}" data-id="0"
                                                            class="thumbnail rounded-[8px] ">
                                                        <div class="videos relative hidden cursor-pointer" data-id="0">
                                                            <img src="{{ $img }}" data-id="0"
                                                                class="thumbnail rounded-[8px]">
                                                        </div>
                                                    </div>
                                                @endforeach
                                              @endif
                                            {{-- @else
                                                 @if (count($galleries) > 0 && $galleries[0]['feature_images'] != null)
                                                    @foreach ($galleries[0]['feature_images'] as $img)
                                                        <div
                                                            class="rounded-[8px] mr-3 mt-3 thumbnail-div w-[92%] xs:w-[45%] htzxs:w-[46%] lg-custom:w-[31.2%] xl:w-[31.6%]">
                                                            <img src="{{ $img }}" data-id="0"
                                                                class="thumbnail rounded-[8px] ">
                                                            <div class="videos relative hidden cursor-pointer" data-id="0">
                                                                <img src="{{ $img }}" data-id="0"
                                                                    class="thumbnail rounded-[8px]">
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                        @endif --}}

                                    </div>
                                </div>
                                @endif
                                <div class="ogallery-content" id="num1">
                                    <div class="helvetica-normal me-body20 font-bold text-darkgray mb-[8px]">
                                        @lang('labels.product_detail.common_area')
                                    </div>
                                    <div class="flex flex-wrap">
                                        @if (count($product_allImages) > 0)
                                            @if (count($product_galleries) > 0 && $product_galleries[0]['common_area'] != null)
                                                @foreach ($product_galleries[0]['common_area'] as $img)
                                                    <div
                                                        class="rounded-[8px] mr-3 mt-3 thumbnail-div w-[92%] xs:w-[45%] htzxs:w-[46%] lg-custom:w-[31.2%] xl:w-[31.6%]">
                                                        <img src="{{ $img }}" data-id="0"
                                                            class="thumbnail rounded-[8px] ">
                                                        <div class="videos relative hidden cursor-pointer" data-id="0">
                                                            <img src="{{ $img }}" data-id="0"
                                                                class="thumbnail rounded-[8px]">
                                                        </div>
                                                    </div>
                                                @endforeach
                                              @endif
                                            @else
                                                 @if (count($galleries) > 0 && $galleries[0]['common_area'] != null)
                                                    @foreach ($galleries[0]['common_area'] as $img)
                                                        <div
                                                            class="rounded-[8px] mr-3 mt-3 thumbnail-div w-[92%] xs:w-[45%] htzxs:w-[46%] lg-custom:w-[31.2%] xl:w-[31.6%]">
                                                            <img src="{{ $img }}" data-id="0"
                                                                class="thumbnail rounded-[8px] ">
                                                            <div class="videos relative hidden cursor-pointer" data-id="0">
                                                                <img src="{{ $img }}" data-id="0"
                                                                    class="thumbnail rounded-[8px]">
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                        @endif

                                    </div>
                                </div>

                                @if (count($product_allImages) > 0)
                                    @if (count($product_galleries) > 0 && $product_galleries[0]['video'] != null)
                                        <div class="ogallery-content" id="num2">
                                            <div class="helvetica-normal me-body20 font-bold text-darkgray mb-[8px]">@lang('labels.product_detail.video')
                                            </div>
                                            <div class="flex flex-wrap">

                                                @foreach ($galleries[0]['video'] as $img)
                                                    <div
                                                        class="rounded-[8px] mr-3 mt-3 thumbnail-div w-[92%] xs:w-[45%] htzxs:w-[46%] lg-custom:w-[31.2%] xl:w-[31.6%]">
                                                        {{-- <video src="{{ $img }}" data-id="14"
                                                            class="thumbnail rounded-[8px] hidden"> --}}
                                                            <video>
                                                                <source src="{{ $img }}" type="video/mp4">
                                                            </video>
                                                        <div class="videos relative  cursor-pointer" data-id="14">
                                                            <video src="{{ $img }}" data-id="14"
                                                                class="thumbnail rounded-[8px]">
                                                            <img src="{{ asset('frontend/img/me-play.svg') }}"
                                                                alt="play icon"
                                                                class="me-play-icon absolute top-1/2 left-1/2 thumbnail"
                                                                data-id="14" />
                                                        </div>
                                                    </div>
                                                @endforeach


                                            </div>
                                        </div>
                                       @endif
                                
                                    @elseif (count($galleries) > 0 && $galleries[0]['video'] != null)
                                    <div class="ogallery-content" id="num2">
                                        <div class="helvetica-normal me-body20 font-bold text-darkgray mb-[8px]">@lang('labels.product_detail.video')
                                        </div>
                                        <div class="flex flex-wrap">

                                            @foreach ($galleries[0]['video'] as $img)
                                                <div
                                                    class="rounded-[8px] mr-3 mt-3 thumbnail-div w-[92%] xs:w-[45%] htzxs:w-[46%] lg-custom:w-[31.2%] xl:w-[31.6%]">
                                                    <video src="{{ $img }}" type="video/mp4" controls>
                                                        {{-- <video>
                                                            <source src="{{ $img }}" type="video/mp4">
                                                        </video> --}}
                                                    <div class="videos relative  cursor-pointer" data-id="14">
                                                        <video src="{{ $img }}" data-id="14"
                                                            class="thumbnail rounded-[8px]">
                                                        <img src="{{ asset('frontend/img/me-play.svg') }}"
                                                            alt="play icon"
                                                            class="me-play-icon absolute top-1/2 left-1/2 thumbnail"
                                                            data-id="14" />
                                                    </div>
                                                </div>
                                            @endforeach


                                        </div>
                                    </div>
                                @endif


                                @if (count($product_allImages) > 0)
                                    @if (count($product_galleries) > 0 && $product_galleries[0]['services_facilities'] != null)
                                        <div class="ogallery-content" id="num3">
                                            <div class="helvetica-normal me-body20 font-bold text-darkgray mb-[8px]">
                                                @lang('labels.product_detail.service')
                                            </div>
                                            <div class="flex flex-wrap">

                                                @foreach ($product_galleries[0]['services_facilities'] as $key => $img)
                                                    <div
                                                        class="rounded-[8px] mr-3 mt-3 thumbnail-div w-[92%] xs:w-[45%] htzxs:w-[46%] lg-custom:w-[31.2%] xl:w-[31.6%]">
                                                        <img src="{{ $img }}" data-id="{{ $key }}"
                                                            class="thumbnail rounded-[8px] hidden">
                                                        <div class="videos relative  cursor-pointer"
                                                            data-id="{{ $key }}">
                                                            <img src="{{ $img }}" data-id="{{ $key }}"
                                                                class="thumbnail rounded-[8px]">
                                                        </div>
                                                    </div>
                                                @endforeach


                                            </div>
                                        </div>
                                    @endif
                                    @elseif (count($galleries) > 0 && $galleries[0]['services_facilities'] != null)
                                        <div class="ogallery-content" id="num3">
                                            <div class="helvetica-normal me-body20 font-bold text-darkgray mb-[8px]">
                                                @lang('labels.product_detail.service')
                                            </div>
                                            <div class="flex flex-wrap">

                                                @foreach ($galleries[0]['services_facilities'] as $key => $img)
                                                    <div
                                                        class="rounded-[8px] mr-3 mt-3 thumbnail-div w-[92%] xs:w-[45%] htzxs:w-[46%] lg-custom:w-[31.2%] xl:w-[31.6%]">
                                                        <img src="{{ $img }}" data-id="{{ $key }}"
                                                            class="thumbnail rounded-[8px] hidden">
                                                        <div class="videos relative  cursor-pointer"
                                                            data-id="{{ $key }}">
                                                            <img src="{{ $img }}" data-id="{{ $key }}"
                                                                class="thumbnail rounded-[8px]">
                                                        </div>
                                                    </div>
                                                @endforeach


                                            </div>
                                        </div>
                                @endif

                                @if (count($product_allImages) > 0)
                                    @if (count($product_galleries) > 0 && $product_galleries[0]['other'] != null)
                                        <div class="ogallery-content" id="num4">
                                            <div class="helvetica-normal me-body20 font-bold text-darkgray mb-[8px]">
                                                @lang('labels.product_detail.other')
                                            </div>
                                            <div class="flex flex-wrap">

                                                @foreach ($product_galleries[0]['other'] as $key => $img)
                                                    <div
                                                        class="rounded-[8px] mr-3 mt-3 thumbnail-div w-[92%] xs:w-[45%] htzxs:w-[46%] lg-custom:w-[31.2%] xl:w-[31.6%]">
                                                        <img src="{{ $img }}" data-id="{{ $key }}"
                                                            class="thumbnail rounded-[8px] hidden">
                                                        <div class="videos relative  cursor-pointer"
                                                            data-id="{{ $key }}">
                                                            <img src="{{ $img }}" data-id="{{ $key }}"
                                                                class="thumbnail rounded-[8px]">
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                        @endif
                                @elseif (count($galleries) > 0 && $galleries[0]['other'] != null)
                                        <div class="ogallery-content" id="num4">
                                            <div class="helvetica-normal me-body20 font-bold text-darkgray mb-[8px]">
                                                @lang('labels.product_detail.other')
                                            </div>
                                            <div class="flex flex-wrap">

                                                @foreach ($galleries[0]['other'] as $key => $img)
                                                    <div
                                                        class="rounded-[8px] mr-3 mt-3 thumbnail-div w-[92%] xs:w-[45%] htzxs:w-[46%] lg-custom:w-[31.2%] xl:w-[31.6%]">
                                                        <img src="{{ $img }}" data-id="{{ $key }}"
                                                            class="thumbnail rounded-[8px] hidden">
                                                        <div class="videos relative  cursor-pointer"
                                                            data-id="{{ $key }}">
                                                            <img src="{{ $img }}" data-id="{{ $key }}"
                                                                class="thumbnail rounded-[8px]">
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                @endif


                            </div>
                            <ul class="filter-tag mt-[25px] pl-3 xs:pl-[24px] w-full max-w-[198px]">


                                {{-- @if (count($product_allImages) > 0) --}}
                                @if (count($product_galleries) > 0 && $product_galleries[0]['feature_images'] != null)
                                    <li data-id="num6"
                                        class="w-fit text-darkgray cursor-pointer rounded-[4px] py-[4px] px-[10px] mb-[10px] me-body14 text-darkgray helvetica-normal active">
                                        @lang('labels.product_detail.feature_images')
                                        {{ count($product_galleries) > 0 && $product_galleries[0]['feature_images'] != null
                                            ? '(' . count($product_galleries[0]['feature_images']) . ')'
                                            : '' }}
                                    </li>
                                @endif
                            {{-- @elseif (count($galleries) > 0 && $galleries[0]['feature_images'] != null)
                                    <li data-id="num6"
                                        class="w-fit text-darkgray cursor-pointer rounded-[4px] py-[4px] px-[10px] mb-[10px] me-body14 text-darkgray helvetica-normal active">
                                        feature
                                        {{ count($galleries) > 0 && $galleries[0]['feature_images'] != null
                                            ? '(' . count($galleries[0]['feature_images']) . ')'
                                            : '' }}
                                    </li>
                            @endif --}}

                                @if (count($product_allImages) > 0)
                                    @if (count($product_galleries) > 0 && $product_galleries[0]['common_area'] != null)
                                        <li data-id="num1"
                                            class="w-fit text-darkgray cursor-pointer rounded-[4px] py-[4px] px-[10px] mb-[10px] me-body14 text-darkgray helvetica-normal">
                                            @lang('labels.product_detail.common_area')
                                            {{ count($product_galleries) > 0 && $product_galleries[0]['common_area'] != null
                                                ? '(' . count($product_galleries[0]['common_area']) . ')'
                                                : '' }}
                                        </li>
                                    @endif
                                @elseif (count($galleries) > 0 && $galleries[0]['common_area'] != null)
                                        <li data-id="num1"
                                            class="w-fit text-darkgray cursor-pointer rounded-[4px] py-[4px] px-[10px] mb-[10px] me-body14 text-darkgray helvetica-normal">
                                            @lang('labels.product_detail.common_area')
                                            {{ count($galleries) > 0 && $galleries[0]['common_area'] != null
                                                ? '(' . count($galleries[0]['common_area']) . ')'
                                                : '' }}
                                        </li>
                                @endif

                                @if (count($product_allImages) > 0)
                                    @if (count($product_galleries) > 0 && $product_galleries[0]['video'] != null)
                                        <li data-id="num2"
                                            class="w-fit text-darkgray cursor-pointer rounded-[4px] py-[4px] px-[10px] mb-[10px] me-body14 text-darkgray helvetica-normal ">
                                            @lang('labels.product_detail.video')
                                            {{ count($product_galleries) > 0 && $product_galleries[0]['video'] != null ? '(' . count($product_galleries[0]['video']) . ')' : '' }}
                                        </li>
                                    @endif
                                @elseif (count($galleries) > 0 && $galleries[0]['video'] != null)
                                        <li data-id="num2"
                                            class="w-fit text-darkgray cursor-pointer rounded-[4px] py-[4px] px-[10px] mb-[10px] me-body14 text-darkgray helvetica-normal ">
                                            @lang('labels.product_detail.video')
                                            {{ count($galleries) > 0 && $galleries[0]['video'] != null ? '(' . count($galleries[0]['video']) . ')' : '' }}
                                        </li>
                                @endif

                                @if (count($product_allImages) > 0)
                                    @if (count($product_galleries) > 0 && $product_galleries[0]['services_facilities'] != null)
                                        <li data-id="num3"
                                            class="w-fit text-darkgray cursor-pointer rounded-[4px] py-[4px] px-[10px] mb-[10px] me-body14 text-darkgray helvetica-normal ">
                                            @lang('labels.product_detail.service')
                                            {{ count($product_galleries) > 0 && $product_galleries[0]['services_facilities'] != null
                                                ? '(' . count($product_galleries[0]['services_facilities']) . ')'
                                                : '' }}
                                        </li>
                                    @endif
                                @elseif (count($galleries) > 0 && $galleries[0]['services_facilities'] != null)
                                <li data-id="num3"
                                    class="w-fit text-darkgray cursor-pointer rounded-[4px] py-[4px] px-[10px] mb-[10px] me-body14 text-darkgray helvetica-normal ">
                                    @lang('labels.product_detail.service')
                                    {{ count($galleries) > 0 && $galleries[0]['services_facilities'] != null
                                        ? '(' . count($galleries[0]['services_facilities']) . ')'
                                        : '' }}
                                </li>
                                @endif

                                @if (count($product_allImages) > 0)
                                    @if (count($product_galleries) > 0 && $product_galleries[0]['other'] != null)
                                        <li data-id="num4"
                                            class="w-fit text-darkgray cursor-pointer rounded-[4px] py-[4px] px-[10px] mb-[10px] me-body14 text-darkgray helvetica-normal ">
                                            @lang('labels.product_detail.other')
                                            {{ count($product_galleries) > 0 && $product_galleries[0]['other'] != null ? '(' . count($product_galleries[0]['other']) . ')' : '' }}
                                        </li>
                                    @endif
                                @elseif (count($galleries) > 0 && $galleries[0]['other'] != null)
                                    <li data-id="num4"
                                        class="w-fit text-darkgray cursor-pointer rounded-[4px] py-[4px] px-[10px] mb-[10px] me-body14 text-darkgray helvetica-normal ">
                                        @lang('labels.product_detail.other')
                                        {{ count($galleries) > 0 && $galleries[0]['other'] != null ? '(' . count($galleries[0]['other']) . ')' : '' }}
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div component-name="me-slider-syncing"
    class="fixed hidden left-0 top-0 w-full h-full bg-black/[.75] flex items-center justify-center"
    id="photo-enlarge-popup">
    <div class="modal-content w-full max-w-[80%] xlg:max-w-[900px] 7xl:max-w-[1260px] shadow-shadow02 my-[15%] mx-auto">
        <div class="zoom-slider-container bg-white rounded-[12px] p-[24px]">
            <div class="zoom-slider-top flex items-center justify-between mb-[20px] relative">
                <button
                    class="back-album-btn me-body16 text-darkgray helvetica-normal flex items-center justify-between">
                    <img src="{{ asset('frontend/img/back-arrow.svg') }}" class="mr-[12px]" />
                    @lang('labels.product_detail.Back_to_album')</button>
                <div class="flex ml-auto w-5 h-5 absolute right-0 top-0 close-syncing-btn">
                    <span data-id="photo-enlarge-popup"
                        class="pb-[4px] absolute left-1/2 top-1/2 -translate-y-1/2 -translate-x-1/2 close-modal flex items-center justify-center text-[24px] w-full cursor-pointer text-[#1A1818] focus:no-underline">&times;</span>
                </div>
            </div>
            <div class="zoom-slider-middle slider one-slider">
                
                    @if (count($product_allImages) > 0)
                        @foreach ($product_allImages as $img)
                            <div>
                                <div class="mySlides rounded-[4px]">
                                    <div class="blur-div">
                                        <div class="numbertext pagingInfo helvetica-normal me-body14 font-bold text-white">
                                        </div>
                                        <img src="{{ $img }}"
                                            class="w-auto h-full max-h-[640px]  rounded-[4px]" />
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @elseif (count($allImages) > 0)
                        @foreach ($allImages as $img)
                            <div>
                                <div class="mySlides rounded-[4px]">
                                    <div class="blur-div">
                                        <div class="numbertext pagingInfo helvetica-normal me-body14 font-bold text-white">
                                        </div>
                                        <img src="{{ $img }}"
                                            class="w-auto h-full max-h-[640px]  rounded-[4px]" />
                                        <!-- <video controls class="w-full h-full max-h-[640px] rounded-[8px] hidden">
                                <source src="./img/videoplayback.mp4" type="video/mp4">
                                </video> -->
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif


            </div>
            <div class="album-section mt-[38px] flex items-end relative">
                {{-- <div class="backImg w-[72px] absolute top-[12px] left-0 bg-white cursor-pointer">
                    <img class="m-lazyImg__img w-[64px] h-[64px] object-cover object-center"
                        src="{{ asset('frontend/img/gray-image.png') }}">
                    <div
                        class="thumbNailTotalNum absolute top-0 left-0 w-[64px] h-[64px] rounded-[4px] text-white flex flex-col items-center justify-center">
                        <img src="{{ asset('frontend/img/album.svg') }}" alt="album icon" />
                        <p class="helvetica-normal me-body14"> @lang('labels.product_detail.see_all')</button>
                        </p>
                    </div>
                </div> --}}
                <div class="picture-album overflow-x-auto flex items-baseline">
                    {{-- <img src="./img/MM_1.jpeg" class="w-[64px] h-[64px] rounded-[4px] mr-[8px] object-cover"> --}}
                    @if (count($product_allImages) > 0)
                        @foreach ($product_allImages as $key => $img)
                            <img src="{{ $img }}"
                                class="w-[64px] h-[64px] rounded-[4px] mr-[8px] object-cover pic-btn"
                                data-id="{{ $key }}">
                        @endforeach
                    @elseif (count($allImages) > 0)
                        @foreach ($allImages as $key => $img)
                            <img src="{{ $img }}"
                                class="w-[64px] h-[64px] rounded-[4px] mr-[8px] object-cover pic-btn"
                                data-id="{{ $key }}">
                        @endforeach
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>

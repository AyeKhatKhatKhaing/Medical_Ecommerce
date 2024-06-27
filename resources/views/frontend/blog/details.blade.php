@extends('frontend.layouts.master')
@include('frontend.seo', ['seo' => isset($seo) ? $seo : ''])
@section('content')
<main>
    <div class="blog-gallery-container boc-container py-[30px] lg:pt-[60px] lg:pb-[90px]">
        <div class="flex flex-wrap lg-custom:flex-nowrap justify-between mt-[12px]">
            <div class="blog-left">
                <div class="main-section">
                    <div component-name="me-blog-detail-top" class="me-blog-detail-top-container">
                        <div class="mbdt--title--container mb-5">
                            <div class="flex items-baseline justify-start">
                                <p class="mbdt--title--feature helvetica-normal text-whitez me-body16 px-[20px] rounded-[50px] flex items-center justify-center bg-blueMediq w-fit">{{ langbind($blogDetails->blogCategory, 'name') }}</p>
                                <button id="mobile-summary" class="helvetica-normal text-orangeMediq me-body18 border border-whitez bg-white py-[4px] px-[10px] items-center justify-center ml-auto active" style="top: 0px;">@lang('labels.check_out.summary')</button>
                            </div>
                            
                            <h1 class="mbdt--title--name helvetica-normal text-blueMediq me-title48 font-bold leading-[57.6px] my-[20px]">{{ langbind($blogDetails, 'title') }}</h1>
                            <p class="mbdt--title--author helvetica-normal text-darkgray me-body16 font-bold ">
                                {{ langbind($blogDetails->blogAuthor, 'name') }}
                            </p>
                            <p class="mbdt--title--date helvetica-normal me-body16 text-lightgray">
                                @lang('labels.last_updated')    
                                @if(lang() == "en")
                                {{ date('d F Y', strtotime($blogDetails->updated_at)) }}
                                @else 
                                {{ date('Y年m月d日', strtotime($blogDetails->updated_at)) }}
                                @endif
                            </p>
                        </div>
                        <div class="mbdt--des--container mb-10 text-darkgray me-body26 leading-[41.6px]">
                        <p>{!! langbind($blogDetails, 'desc') !!}</p> 
                        </div>
                        <div class="mbdt--img-container rounded-[20px] mb-10" alt="{{ $blogDetails->main_image_alt_text }}" style="background-image:url('{{ $blogDetails->main_image_url }}');background-size: cover;background-repeat:no-repeat;">
                            <div class="bg-lightgray opacity-30 h-[400px] rounded-[20px]"></div>
                        </div>
                    </div>
                </div>
                @if(isset($sections))
                    @foreach ($sections as $key=>$section)
                        <div class="no{{ $key+1 }}-section" id="no{{ $key+1 }}">
                            <div component-name="me-blog-only-title" class="mbotitle mt-5 mb-[32px]">
                                <h3 class="mbo-title helvetica-normal me-body36 font-bold text-darkgray leading-[43.2px]"> {{ $key+1 }}. {{ @langbind($section, 'section_name') }}</h3>
                            </div>
                            @php
                                $features = App\Models\BlogSectionFeature::where('blog_id', $blogDetails->id)->where('section_id', $section->id)->orderBy('sort_no')->get();
                            @endphp
                            @if(isset($features))
                                @foreach ($features as $feature_key=>$data)
                                    @if($data->type == 'video')
                                        <div component-name="me-blog-detail-video" class="mbvt-container mt-5">
                                            <div class="mbvt-iframe">
                                                <iframe class="w-full rounded-[20px] half-aspect" src="{{ isset($data->video_url) ? $data->video_url : '' }}" title="Digital Agency - Visible One" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen=""></iframe>
                                            </div>
                                            {{-- <div class="mbvt-video">video src</div> --}}
                                            <a href="{{ isset($data->video_url) ? $data->video_url : '' }}" class="mbvt-video-link flex items-center justify-start helvetica-normal text-darkgray me-body18 font-bold my-4">
                                                <img src="{{ asset('frontend/img/main-triangle.svg') }}" alt="blue triangle icon" class="blue-triangle-icon">
                                                {!! langbind($data, 'desc') !!}
                                            </a>
                                        </div>
                                    @endif
                                    @if($data->type == 'description')
                                        <div component-name="me-blog-detail-description" class="me-blog-detail-description mt-5">
                                            <div class="mbdt--des--container text-darkgray me-body23 leading-[36.8px]">
                                                {!! langbind($data, 'desc') !!}
                                            </div>
                                        </div>
                                    @endif
                                    @if($data->type == 'image')
                                        <div component-name="me-blog-detail-image-gallery" class="me-blog-detail-image-gallery mt-5">
                                            @if(isset($data->image_gallery_path))
                                                @php
                                                    $img_count = count(json_decode($data->image_gallery_path));
                                                @endphp
                                                <div class="relative">
                                                    @if($img_count > 3)
                                                        <button class="detail-see-all-btn flex items-center justify-center leading-[2] px-[10px] py-[6px] text-whitez absolute bottom-[30px] xs:bottom-[20px] right-[10px] rounded-[4px] helvetica-normal me-body14">
                                                            <img src="{{ asset('frontend/img/album.svg') }}" alt="album icon" class="mr-2"> See All {{$img_count}} Photos                
                                                        </button>
                                                    @endif
                                                    @if($img_count == 1)
                                                    <div class="flex items-center justify-between gap-5 h-[400px] mbtic-items-container mbtic-one-item">
                                                        @for($i=0;$i < 1;$i++)
                                                        @php
                                                            $image = json_decode($data->image_gallery_path)[$i];
                                                        @endphp
                                                            <div class="item basis-[100%] h-[400px]">
                                                                <img src="{{$image}}" data-id="{{$i}}" alt="{{ array_key_exists($loop->index,json_decode($data->image_gallery_alt_text)) ? json_decode($data->image_gallery_alt_text)[$i] : '' }}" class="blog-thumnail cursor-pointer w-full h-full object-cover rounded-[12px]"/>
                                                            </div>
                                                        @endfor
                                                    </div>
                                                    @elseif($img_count == 2)
                                                    <div class="flex items-center justify-between gap-5 h-[400px] mbtic-items-container mbtic-two-items">
                                                        @for($i=0;$i < 2;$i++)
                                                        @php
                                                            $image = json_decode($data->image_gallery_path)[$i];
                                                        @endphp
                                                            <div class="item basis-[100%] h-[400px]">
                                                                <img src="{{$image}}" data-id="{{$i}}" alt="{{ array_key_exists($loop->index,json_decode($data->image_gallery_alt_text)) ? json_decode($data->image_gallery_alt_text)[$i] : '' }}" class="blog-thumnail cursor-pointer w-full h-full object-cover rounded-[12px]"/>
                                                            </div>
                                                        @endfor
                                                    </div>
                                                    @elseif($img_count >= 3)
                                                    <div class="flex items-center justify-between gap-5 h-[400px] mbtic-items-container mbtic-three-items">
                                                        <div class="item main-item-0 first-item self-stretch w-1/2 rounded-[12px] h-full">
                                                            <img src="{{ isset(json_decode($data->image_gallery_path)[0]) ? json_decode($data->image_gallery_path)[0] : '' }}" alt="{{ array_key_exists(0,json_decode($data->image_gallery_alt_text)) ? json_decode($data->image_gallery_alt_text)[0] : '' }}" data-id="0" alt="kjsc" class="blog-thumnail cursor-pointer w-full h-full object-cover rounded-[12px]">
                                                        </div>                                                      
                                                        <div class="second-item flex flex-wrap gap-5 h-full items-center justify-center w-1/2 rounded-[12px]">
                                                            <div class="item main-item-1">
                                                                <img src="{{ isset(json_decode($data->image_gallery_path)[1]) ? json_decode($data->image_gallery_path)[1] : '' }}" alt="{{ array_key_exists(1,json_decode($data->image_gallery_alt_text)) ? json_decode($data->image_gallery_alt_text)[1] : '' }}" data-id="1" alt="jsn" class="blog-thumnail cursor-pointer w-full h-full object-cover rounded-[12px]">
                                                            </div>
                                                            <div class="item main-item-2">
                                                                <img src="{{ isset(json_decode($data->image_gallery_path)[2]) ? json_decode($data->image_gallery_path)[2] : '' }}" alt="{{ array_key_exists(2,json_decode($data->image_gallery_alt_text)) ? json_decode($data->image_gallery_alt_text)[2] : '' }}" data-id="2" alt="jksr" class="blog-thumnail cursor-pointer w-full h-full object-cover rounded-[12px]">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    <dialog component-name="me-blog-image-zoom-popup" class="mbizoom-container fixed z-[1001] left-0 top-0 w-full h-full overflow-hidden bg-linear-black items-center justify-center hidden">
                                                        <div class="w-full max-w-[1150px] shadow-shadow02 my-[15%] rounded-[12px] text-darkgray relative mx-auto">
                                                            <div class="flex items-center justify-between md:mb-10 mb-6">
                                                            <button class="lr-popup-close absolute z-[1001] top-[56px] right-[90px]">
                                                                <img src="{{ asset('frontend/img/lr_round-close.svg') }}" alt="close icon" class="mbizoom-close">
                                                                </button>
                                                            </div>
                                                            <div class="mbizoom-slider w-full">
                                                                @foreach (json_decode($data->image_gallery_path) as $image)
                                                                <div class="showimage px-[70px] mx-auto w-full max-w-[1150px] h-[640px] rounded-[12px] ">
                                                                    <img src="{{$image}}" class="w-full h-full rounded-[12px] object-cover desktop-img">
                                                                    <img src="{{$image}}" class="w-full h-full rounded-[12px] object-cover mobile-img">
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </dialog>
                                                </div>
                                                <a href="{{ isset($data->image_url) ? $data->image_url : '' }}" class="mbvt-video-link flex items-center justify-start helvetica-normal text-darkgray me-body18 font-bold my-4">
                                                    <img src="{{ asset('frontend/img/main-triangle.svg') }}" alt="blue triangle icon" class="blue-triangle-icon">
                                                    {!! langbind($data, 'desc') !!}
                                                </a>
                                            @endif
                                        </div>
                                    @endif
                                    @if($data->type == 'memo')
                                        <div component-name="me-blog-detail-quote" class="me-blog-detail-quote mt-5">
                                            <div class="quote-section px-[60px] py-[10px]">
                                                <div class="quote-inner-section border-[4px] me-body23 helvetica-normal text-darkgray border-r-0 border-t-0 border-b-0 pl-5 border-blueMediq">
                                                    {!! langbind($data, 'desc') !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if($data->type == 'button')
                                        <div component-name="me-blog-detail-health-check-btn" class="me-blog-detail-health-check-btn-section mb-[32px]">
                                            <a href="{{ langbind($data,'button_url') }}" target="_blank"><button class="rounded-[50px] px-[20px] py-[10px] border border-darkgray bg-whitez flex items-center justify-center me-body16 text-darkgray helvetica-normal font-bold mt-5 hover:text-whitez hover:bg-blueMediq hover:border-blueMediq">{{ langbind($data,'button_title') }}</button></a>
                                        </div>
                                    @endif
                                    @if($data->type == 'further')
                                        <div component-name="me-blog-detail-further" class="me-blog-detail-further-section mt-5 bg-far px-5 rounded-[12px]">
                                            <p class="helvetica-normal me-body18 text-darkgray leading-[25.2px] font-bold">Further Reading:
                                                @if(isset($data->further_name_en) && isset($data->further_name_sc) && isset($data->further_name_tc))
                                                    @foreach (json_decode($data->further_name_en) as $fur_key => $name_en)
                                                            @php
                                                                if (lang() == 'zh-hk') {
                                                                    $name = isset(json_decode($data->further_name_tc)[$fur_key]) ? json_decode($data->further_name_tc)[$fur_key] : '';
                                                                } else if(lang() == 'zh-cn') {
                                                                    $name = isset(json_decode($data->further_name_sc)[$fur_key]) ? json_decode($data->further_name_sc)[$fur_key] : '';
                                                                } else {
                                                                    $name = isset($name_en) ? $name_en : '';
                                                                }

                                                                $url = isset(json_decode($data->further_url)[$fur_key]) ? json_decode($data->further_url)[$fur_key] : '';
                                                            @endphp
                                                        <a href="{{$url}}" class="font-normal hover:underline text-blueMediq">{{$name}}</a>@if(!$loop->last)<span class="font-normal text-blueMediq">,</span>@else<span class="font-normal text-blueMediq">.</span>@endif
                                                    @endforeach
                                                @endif
                                            </p>
                                        </div>
                                    @endif
                                    @if($data->type == 'table' || $data->type == 'header-table')
                                        <div component-name="me-blog-no-background-header-table" class="mbnbh-table mt-5">
                                            {!! langbind($data, 'desc') !!}
                                        </div>
                                    @endif
                                    @if($data->type == 'product-comparison')
                                        <div component-name="me-blog-comparison-table" class="mbc-table mt-5">
                                            @if(isset($data->product_ids))
                                                <div class="mbc-container">
                                                    <div class="mbc-container--outer">
                                                        <div class="mbc-container--inner">
                                                            @php
                                                                $compareProducts = App\Models\Product::whereIn('id', json_decode($data->product_ids))->get();
                                                            @endphp
                                                            <table id="blog-table-compare" class="border-collapse border-spacing-0 overflow-hidden border bg-mee4 rounded-[12px] border-mee4 me-body20 helvetica-normal text-left font-normal text-darkgray leading-[24px] table-rounded-header-bg-style">
                                                                <thead>
                                                                    <tr class="">
                                                                        <th class="py-5 px-[32px] font-normal"></th>
                                                                        @foreach ($compareProducts as $pdata)
                                                                            <th class="py-5 px-[32px] font-normal">
                                                                                {{ @langbind($pdata, 'name') }}
                                                                            </th>
                                                                        @endforeach
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr component-name="me-blog-no-background-header-table-body" class="">
                                                                        <td component-name="me-blog-no-background-header-td" class="py-5 px-[32px] align-top" attr-headers=""></td>
                                                                        @foreach ($compareProducts as $pdata)
                                                                            <td component-name="me-blog-no-background-header-td" class="py-5 px-[32px] align-top" attr-headers="">
                                                                                <img src="{{ $pdata->featured_img }}">
                                                                            </td>
                                                                        @endforeach
                                                                    </tr>
                                                                    <tr component-name="me-blog-no-background-header-table-body" class="">
                                                                        <td component-name="me-blog-no-background-header-td" class="py-5 px-[32px] align-top" attr-headers="">
                                                                            @lang('labels.compare.servicec_centres')
                                                                        </td>
                                                                        @foreach ($compareProducts as $pdata)
                                                                            @php
                                                                                if (lang() == 'en') {
                                                                                    $merchant_name = $pdata->merchant->name_en;
                                                                                } else {
                                                                                    $merchant_name = langbind($pdata->merchant, 'name');
                                                                                }
                                                                            @endphp
                                                                            <td component-name="me-blog-no-background-header-td" class="py-5 px-[32px] align-top" attr-headers="{{ $merchant_name }}">{{ $merchant_name }}</td>
                                                                        @endforeach
                                                                    </tr>
                                                                    <tr component-name="me-blog-no-background-header-table-body" class="">
                                                                        <td component-name="me-blog-no-background-header-td" class="py-5 px-[32px] align-top" attr-headers="">
                                                                            @lang('labels.compare.no_of_items')
                                                                        </td>
                                                                        @foreach ($compareProducts as $pdata)
                                                                            <td component-name="me-blog-no-background-header-td" class="py-5 px-[32px] align-top" attr-headers="">
                                                                                {{ $pdata->number_of_dose }}
                                                                            </td>
                                                                        @endforeach
                                                                    </tr>
                                                                    <tr component-name="me-blog-no-background-header-table-body" class="">
                                                                        <td component-name="me-blog-no-background-header-td" class="py-5 px-[32px] align-top" attr-headers="">
                                                                            @lang('labels.compare.for')
                                                                        </td>
                                                                        @foreach ($compareProducts as $pdata)
                                                                            <td component-name="me-blog-no-background-header-td" class="py-5 px-[32px] align-top" attr-headers="">
                                                                                <ul>
                                                                                    @foreach ($pdata->recommendTags as $recommend)
                                                                                        <li>{{ langbind($recommend, 'name') }}</li>
                                                                                    @endforeach
                                                                                </ul>
                                                                            </td>
                                                                        @endforeach
                                                                    </tr>
                                                                    <tr component-name="me-blog-no-background-header-table-body" class="">
                                                                        <td component-name="me-blog-no-background-header-td" class="py-5 px-[32px] align-top" attr-headers="">
                                                                            @lang('labels.compare.key_items')
                                                                        </td>
                                                                        @foreach ($compareProducts as $pdata)
                                                                            <td component-name="me-blog-no-background-header-td" class="py-5 px-[32px] align-top" attr-headers="">
                                                                                <ul>
                                                                                    @php 
                                                                                        $keyItems = \App\Models\ProductKeyItemTag::select('key_item_tags.name_en', 'key_item_tags.name_tc', 'key_item_tags.name_sc')
                                                                                            ->join('key_item_tags', 'key_item_tags.id', 'product_key_item_tags.key_item_tag_id')
                                                                                            ->where('product_id', $pdata->id)
                                                                                            ->get();
                                                                                    @endphp
                                                                                    @foreach ($keyItems as $ki)
                                                                                        <li>{{ langbind($ki, 'name') }}</li>
                                                                                    @endforeach
                                                                                </ul>
                                                                            </td>
                                                                        @endforeach
                                                                    </tr>
                                                                    <tr component-name="me-blog-no-background-header-table-body" class="">
                                                                        <td component-name="me-blog-no-background-header-td" class="py-5 px-[32px] align-top" attr-headers="">
                                                                            @lang('labels.blog.price')
                                                                        </td>
                                                                        @foreach ($compareProducts as $pdata)
                                                                            @if(isset($pdata->discount_price))
                                                                            <td component-name="me-blog-no-background-header-td" class="py-5 px-[32px] align-top" attr-headers="">
                                                                                <div class="compare-price-s flex items-center justify-center">
                                                                                    <span class="text-mered me-body26 mr-1 sm:mr-2 font-bold" style="line-height: 1;">
                                                                                        ${{ number_format($pdata->discount_price,2) }}
                                                                                    </span>
                                                                                    <span class="text-lightgray line-through font-normal" style="line-height: 1;">${{ number_format($pdata->original_price,2) }}</span>
                                                                                </div>
                                                                                <p class="hidden text-center text-orangeMediq me-body26">${{ number_format($pdata->original_price,2) }}</p>
                                                                            </td>
                                                                            @else
                                                                            <td component-name="me-blog-no-background-header-td" class="py-5 px-[32px] align-top" attr-headers="">
                                                                                <p class="text-center text-orangeMediq me-body26"> ${{ number_format($pdata->original_price,2) }}</p>
                                                                            </td>
                                                                            @endif
                                                                        @endforeach
                                                                    </tr>
                                                                    <tr component-name="me-blog-no-background-header-table-body" class="">
                                                                        <td component-name="me-blog-no-background-header-td" class="py-5 px-[32px] align-top" attr-headers="">
                                                                            {{-- @lang('labels.read_more_click') --}}
                                                                        </td>
                                                                        @foreach ($compareProducts as $pdata)
                                                                            <td component-name="me-blog-no-background-header-td" class="py-5 px-[32px] align-top" attr-headers="">
                                                                                <a href="{{ route('product-detail', ['category' => $pdata->category->name_en, 'slug' => $pdata->slug_en]) }}" class="mx-auto border border-orangeMediq text-whitez rounded-[50px] flex items-center justify-center h-[42px] bg-orangeMediq w-[136px] me-body16 hover:bg-blueMediq hover:text-whitez hover:border-blueMediq">
                                                                                    @lang('labels.blog.more_detail')
                                                                                </a>
                                                                            </td>
                                                                        @endforeach
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    @endif
                                    @if($data->type == 'download')
                                        <div component-name="me-blog-download-document" class="mbdd-container mt-5">
                                            <ul class="mbdd-dowload-section flex items-center jusitfy-start flex-wrap gap-[5px] lg:gap-[16px]">
                                                @if(isset($data->download_name_en) && isset($data->download_name_sc) && isset($data->download_name_tc))
                                                    @foreach (json_decode($data->download_name_en) as $download_key => $download_name_en)
                                                        @php
                                                            if (lang() == 'zh-hk') {
                                                                $download_name = isset(json_decode($data->download_name_tc)[$download_key]) ? json_decode($data->download_name_tc)[$download_key] : '';
                                                            } else if(lang() == 'zh-cn') {
                                                                $download_name = isset(json_decode($data->download_name_sc)[$download_key]) ? json_decode($data->download_name_sc)[$download_key] : '';
                                                            } else {
                                                                $download_name = isset($download_name_en) ? $download_name_en : '';
                                                            }

                                                            $file = isset(json_decode($data->sample_download_file)[$download_key]) ? json_decode($data->sample_download_file)[$download_key] : '';
                                                        @endphp
                                                        <li class="mb-4">
                                                            <a href="{{$file}}" download="download_form" class="w-fit px-5 py-[10px] rounded-[12px] bg-orangeLight flex items-center justify-center text-orangeMediq hover:text-whitez hover:bg-orangeMediq me-body20 helvetica-normal download-blog-link">
                                                                <img src="{{ asset('frontend/img/download-icon.svg') }}" alt="download icon" class="download-icon mr-[11px] w-[20px] h-[20px]">{{ $download_name }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                    @endif
                                    @if($data->type == 'form-submission')
                                        <div component-name="me-blog-form-submission" class="mbfs-container mt-5">
                                            <div class="want-to-learn-container rounded-[12px] bg-far p-[40px]">
                                                {!! langbind($data, 'desc') !!}
                                                <div class="helvetica-normal text-darkgray">
                                                    <form id="captcha99Form">
                                                        <input name="blog_details_id" type="hidden" value="{{ $blogDetails->id }}">
                                                        <div>
                                                            <div
                                                                class="blog-submission-title mb-5 flex flex-wrap sm:flex-nowrap items-baseline justify-between">
                                                                <div class="name-text-section w-full">
                                                                    <p class="mb-[10px] me-body16 text-darkgray helvetica-normal">
                                                                        Title</p>
                                                                    <div class="flex items-center justify-start">
                                                                        <div
                                                                            class="selector-item h-[40px] w-full max-w-[107px] mr-4">
                                                                            <input type="radio" id="miss" name="title"
                                                                                class="selector-item_radio" value="Miss / Mrs">
                                                                            <label for="miss" class="selector-item_label">Miss
                                                                                / Mrs</label>
                                                                        </div>
                                                                        <div class="selector-item h-[40px] w-full max-w-[107px]">
                                                                            <input type="radio" id="mr" name="title"
                                                                                class="selector-item_radio" value="Mr.">
                                                                            <label for="mr"
                                                                                class="selector-item_label">Mr.</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="flex flex-wrap sm:flex-nowrap items-center justify-between">
                                                                <div class="name-text-section half-section">
                                                                    <label class="block me-body16">@lang('labels.check_out.last_name')</label>
                                                                    <input type="text" id=""
                                                                        placeholder="@lang('labels.check_out.last_name')" name="last_name"
                                                                        class="w-full me-body18 placeholder-text-lightgray mb-5 rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-blueMediq">
                                                                    <p class="text-mered me-body16 helvetica-normal mt-[1px] hidden"
                                                                        id="last_name_error"></p>
                                                                </div>
                                                                <div class="name-text-section half-section">
                                                                    <label class="block me-body16">@lang('labels.check_out.first_name')</label>
                                                                    <input type="text" id=""
                                                                        placeholder="@lang('labels.check_out.first_name')" name="first_name"
                                                                        class="w-full me-body18 placeholder-text-lightgray mb-5 rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-blueMediq">
                                                                    <p class="text-mered me-body16 helvetica-normal mt-[1px] hidden"
                                                                        id="first_name_error"></p>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="name-text-section w-full">
                                                                    <label class="block me-body16">@lang('labels.log_in_register.email')</label>
                                                                    <input type="text" placeholder="youremailaddress@email.com"
                                                                        name="email"
                                                                        class="w-full me-body18 placeholder-text-lightgray mb-5 rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-blueMediq">
                                                                    <p class="text-mered me-body16 helvetica-normal mt-[1px] hidden"
                                                                        id="email_error"></p>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="blog-submission-phone flex flex-wrap sm:flex-nowrap items-baseline justify-between mb-[10px]">
                                                                <div class="name-text-section w-full">
                                                                    <p class="me-body16">@lang('labels.log_in_register.phone')</p>
                                                                    <div class="minfo-phone-section w-full">
                                                                        <div class="mbps-flex flex items-baseline justify-start">
                                                                            <div class="name-selector-option">
                                                                                <input type="hidden" name="phone_code"
                                                                                    value="+852" id="phone_code">
                                                                                <button type="button"
                                                                                    class="nso-name-btn flex items-center"><span
                                                                                        class="w-full">+852</span><img
                                                                                        src="{{ asset('frontend/img/dropdown-icon.svg') }}"
                                                                                        alt="drop icon"></button>
                                                                                <div
                                                                                    class="name-selector-option--dropdown-list relative">
                                                                                    <ul class="nso-dropdown-lists absolute top-0 ">
                                                                                        <li class="nso-dropdown-items"
                                                                                            data-value="+852">+852</li>
                                                                                        <li class="nso-dropdown-items"
                                                                                            data-value="+86">+86</li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                            <div class="minfo-phone-number-section">
                                                                                <input type="text" name="phone_no"
                                                                                    id="phone_no"
                                                                                    class="me-body18 placeholder-text-lightgray rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] mb-2 focus:border-blueMediq block"
                                                                                    placeholder="Phone Number" value="">
                                                                                <p class="text-mered me-body16 helvetica-normal mt-[1px] hidden"
                                                                                    id="phone_error"></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="flex flex-wrap sm:flex-nowrap items-center justify-between">
                                                                <div class="name-text-section half-section">
                                                                    <label class="block me-body16">@lang('labels.blog.contact_person_name')</label>
                                                                    <input type="text" id="" placeholder="Eg. mediQ"
                                                                        name="contact_person_name"
                                                                        class="w-full me-body18 placeholder-text-lightgray mb-5 rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-blueMediq">
                                                                </div>
                                                                <div class="name-text-section half-section">
                                                                    <label class="block me-body16">@lang('labels.blog.position')</label>
                                                                    <input type="text" id=""
                                                                        placeholder="Eg. Project Manager"
                                                                        name="contact_person_position"
                                                                        class="w-full me-body18 placeholder-text-lightgray mb-5 rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-blueMediq">
                                                                </div>
                                                            </div>
                                                            <div class="mb-5">
                                                                <p class="me-body16 text-darkgray helvetica-normal">
                                                                    @lang('labels.blog.to_learn_more_about'):</p>
                                                                <ul>
                                                                    <li>
                                                                        <label for="learn-check1"
                                                                            class="custom-checkbox-label cursor-pointer flex items-center mr-1 last:mr-0 lg:mr-2 lg:last:mr-0">
                                                                            <div class="relative">
                                                                                <input type="checkbox"
                                                                                    name="to_learn_more_options[]"
                                                                                    id="learn-check1"
                                                                                    value="Health Check-ip Plan for SMEs"
                                                                                    class="">
                                                                                <span
                                                                                    class="custom-checkbox-orange top-1/2 -translate-y-1/2"></span>
                                                                            </div>
                                                                            <span
                                                                                class="ml-5 4xl:ml-[30px] flex items-center me-body18 flex-wrap helvetica-normal">
                                                                                @lang('labels.blog.health_check_ip_plan_for_smes')
                                                                            </span>
                                                                        </label>
                                                                    </li>
                                                                    <li>
                                                                        <label for="learn-check2"
                                                                            class="custom-checkbox-label cursor-pointer flex items-center mr-1 last:mr-0 lg:mr-2 lg:last:mr-0">
                                                                            <div class="relative">
                                                                                <input type="checkbox"
                                                                                    name="to_learn_more_options[]"
                                                                                    id="learn-check2" value="Medical Plan"
                                                                                    class="">
                                                                                <span
                                                                                    class="custom-checkbox-orange top-1/2 -translate-y-1/2"></span>
                                                                            </div>
                                                                            <span
                                                                                class="ml-5 4xl:ml-[30px] flex items-center me-body18 flex-wrap helvetica-normal">
                                                                                @lang('labels.blog.medical_plan')
                                                                            </span>
                                                                        </label>
                                                                    </li>
                                                                    <li>
                                                                        <label for="learn-check3"
                                                                            class="custom-checkbox-label cursor-pointer flex items-center mr-1 last:mr-0 lg:mr-2 lg:last:mr-0">
                                                                            <div class="relative">
                                                                                <input type="checkbox"
                                                                                    name="to_learn_more_options[]"
                                                                                    id="learn-check3" value="Others"
                                                                                    class="">
                                                                                <span
                                                                                    class="custom-checkbox-orange top-1/2 -translate-y-1/2"></span>
                                                                            </div>
                                                                            <span
                                                                                class="ml-5 4xl:ml-[30px] flex items-center me-body18 flex-wrap helvetica-normal">
                                                                                @lang('labels.blog.others')
                                                                            </span>
                                                                        </label>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="blog-submission-message mb-5">
                                                                <p class="mb-[10px] me-body16 text-darkgray helvetica-normal">
                                                                    Message</p>
                                                                <textarea name="message" id="" cols="30" rows="10"
                                                                    class="w-full px-5 py-[19px] border border-meA3 rounded-[4px] text-darkgray helvetica-normal me-body18 focus:border-blueMediq focus-visible:border-blueMediq placeholder-text-lightgray"
                                                                    placeholder="Please enter your message here"></textarea>
                                                            </div>
                                                            <div class="pb-[40px]">
                                                                <label for="inquiry"
                                                                    class="custom-checkbox-label cursor-pointer flex items-baseline mr-1 last:mr-0 lg:mr-2 lg:last:mr-0">
                                                                    <div class="form-inquiry-checkbox relative">
                                                                        <input type="checkbox" name="submit-check" id="inquiry"
                                                                            class="">
                                                                        <span
                                                                            class="custom-checkbox-orange top-1/2 -translate-y-1/2"></span>
                                                                    </div>
                                                                    <span
                                                                        class="ml-5 4xl:ml-[30px] flex items-center me-body18 flex-wrap helvetica-normal">
                                                                        @lang('labels.blog.submit_label1')
                                                                        @lang('labels.blog.submit_label2')
                                                                    </span>
                                                                </label>
                                                            </div>
                                                            <button type="button" id="captcha99"
                                                                class="btnSubmit g-recaptcha border rounded-[50px] border-darkgray text-darkgray w-full max-w-[200px] bg-whitez me-body16 font-bold helvetica-normal flex items-center justify-center px-[20px] py-[10px] hover:bg-blueMediq hover:text-whitez hover:border-blueMediq">@lang('labels.log_in_register.submit')</button>
                                                            <p class="text-mered me-body16 helvetica-normal mt-[1px] hidden"
                                                                id="g_recaptcha_error"></p>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if($data->type == 'product-listing')
                                        @if(isset($data->product_ids))
                                            <div class="grid-fix">
                                                @php
                                                $productList = App\Models\Product::whereIn('id', json_decode($data->product_ids))->get();
                                                @endphp
                                                @foreach ($productList as $key => $product)
                                                    @include('frontend.blog.product-grid-view')
                                                @endforeach
                                            </div>
                                        @endif
                                    @endif
                                    @if($data->type == 'coupon')
                                        @if(isset($data->coupon_ids))
                                            <div class="coupon-section">
                                                <div>
                                                    <div class="mediq-card-section w-full max-w-[600px] mt-5">
                                                        @php
                                                            $couponList = App\Models\Coupon::whereIn('id', json_decode($data->coupon_ids))->get();
                                                        @endphp
                                                        @foreach ($couponList as $key => $coupondetails)
                                                            @php
                                                                $customer_id = Auth::guard('customer')->user() != null ? Auth::guard('customer')->user()->id : '';
                                                                $item = App\Models\CouponCollect::where('coupon_id', $coupondetails->id)
                                                                    ->where('customer_id', $customer_id)
                                                                    ->orderBy('id', 'DESC')
                                                                    ->first();
                                                                $collectId = isset($item->coupon_id) ? 'collected' : '';
                                                                $checkUsedExpired = false;
                                                                if ($item != null) {
                                                                    $checkUsedExpired = checkUsedExpiredCoupon($item);
                                                                } else {
                                                                    $checkUsedExpired = checkCouponStartAndEndDateExpired($coupondetails);
                                                                }
                                                            @endphp
                                                            <div component-name="me-coupon-new-small-card" class="small-coupon new-small-coupon" id="new-small-coupon{{$key}}">
                                                                <div class="w-full small-coupon--container">
                                                                    <div class="w-full small-coupon--container">
                                                                        <div class="relative collect">
                                                                            <div class="custom-voucher-shape gccard rounded-[20px] collect">
                                                                                <div class="gccard-top bg-no-repeat h-[100px] relative bg-cover gccard-home">
                                                                                    @foreach (config('mediq.coupon_status') as $key => $type)
                                                                                        @if ($key == $coupondetails->is_new_or_limited)
                                                                                            <div class="label-tag rounded-[4px] absolute top-0 left-0 new">
                                                                                                {{ $type }}
                                                                                            </div>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </div>
                                                                                <div class="gccard-top bg-no-repeat h-[100px] relative bg-cover gccard-detail hidden">
                                                                                    <div class="detail-coupon absolute top-[8px] left-[10px] rounded-[4px] py-[5px] px-[10px] bg-[#F0F9F0] me-green-color new">
                                                                                        New
                                                                                    </div>
                                                                                </div>
                                                                                <div class="gccard-content text-center">
                                                                                    <div data-mainid="{{$key++}}" data-id="collect-detail-modal-back{{$key}}" class="cclogo-container show-detail-popup">
                                                                                        <div class="rounded-full">
                                                                                            <img class="cclogo border-mee4 rounded-full w-[72px] h-[72px]" src="{{ isset($coupondetails->merchant) ? $coupondetails->merchant->icon : '' }}">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div data-mainid="{{$key++}}" data-id="collect-detail-modal-back{{$key}}" class="gccard-content-body show-detail-popup">
                                                                                        <p data-mainid="{{$key++}}" data-id="collect-detail-modal-back{{$key}}" class="company-name text-darkgray cursor-pointer">{{ langbind($coupondetails, 'name') }}</p>
                                                                                        <p class="ctitle text-darkgray">{{ langbind($coupondetails, 'sub_title') }}</p>
                                                                                        <div class="flex justify-start items-center flex-wrap">
                                                                                            <p class="ccategory text-lightgray new-ccategory">
                                                                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                                    <path d="M12.492 11.41C12.4697 11.2871 12.4023 11.1769 12.3028 11.1012C12.2034 11.0255 12.0793 10.9898 11.9548 11.0011C11.8304 11.0124 11.7147 11.0699 11.6305 11.1622C11.5463 11.2545 11.4998 11.3751 11.5 11.5V16.002L11.508 16.092C11.5303 16.2149 11.5977 16.3251 11.6972 16.4008C11.7966 16.4765 11.9207 16.5122 12.0452 16.5009C12.1696 16.4896 12.2853 16.4321 12.3695 16.3398C12.4537 16.2475 12.5002 16.1269 12.5 16.002V11.5L12.492 11.41ZM12.799 9.25C12.799 9.05109 12.72 8.86032 12.5793 8.71967C12.4387 8.57902 12.2479 8.5 12.049 8.5C11.8501 8.5 11.6593 8.57902 11.5187 8.71967C11.378 8.86032 11.299 9.05109 11.299 9.25C11.299 9.44891 11.378 9.63968 11.5187 9.78033C11.6593 9.92098 11.8501 10 12.049 10C12.2479 10 12.4387 9.92098 12.5793 9.78033C12.72 9.63968 12.799 9.44891 12.799 9.25ZM20 12.5C20 10.3783 19.1571 8.34344 17.6569 6.84315C16.1566 5.34285 14.1217 4.5 12 4.5C9.87827 4.5 7.84344 5.34285 6.34315 6.84315C4.84285 8.34344 4 10.3783 4 12.5C4 14.6217 4.84285 16.6566 6.34315 18.1569C7.84344 19.6571 9.87827 20.5 12 20.5C14.1217 20.5 16.1566 19.6571 17.6569 18.1569C19.1571 16.6566 20 14.6217 20 12.5ZM5 12.5C5 11.5807 5.18106 10.6705 5.53284 9.82122C5.88463 8.97194 6.40024 8.20026 7.05025 7.55025C7.70026 6.90024 8.47194 6.38463 9.32122 6.03284C10.1705 5.68106 11.0807 5.5 12 5.5C12.9193 5.5 13.8295 5.68106 14.6788 6.03284C15.5281 6.38463 16.2997 6.90024 16.9497 7.55025C17.5998 8.20026 18.1154 8.97194 18.4672 9.82122C18.8189 10.6705 19 11.5807 19 12.5C19 14.3565 18.2625 16.137 16.9497 17.4497C15.637 18.7625 13.8565 19.5 12 19.5C10.1435 19.5 8.36301 18.7625 7.05025 17.4497C5.7375 16.137 5 14.3565 5 12.5Z" fill="#7C7C7C" />
                                                                                                </svg>
                                                                                                @if ($coupondetails->usage_time)
                                                                                                    Once collected, valid for
                                                                                                    {{ $coupondetails->usage_time }} days
                                                                                                @else
                                                                                                    @lang('labels.coupon.offer_expires')
                                                                                                    {{ date('M d Y', strtotime($coupondetails->end_date)) }}
                                                                                                @endif
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>                 
                                                                                    @if (auth()->guard('customer')->check())
                                                                                        <div data-mainid="{{$key++}}" data-id="collect-detail-modal-back{{$key}}" class="gccard-content-bottom show-detail-popup">
                                                                                            <div class="gccard-content-bottom-content relative h-[90%] w-full">
                                                                                                <button id="popup_coupon{{ $coupondetails->id }}" onclick="collect({{ $coupondetails->id }})" data-id={{ $coupondetails->id }} class="{{ $checkUsedExpired == true ? 'text-d1' : '' }} collect-view-btn text-blueMediq flex justify-center ml-auto mr-auto collect-login {{ $collectId != null ? 'text-d1 pointer-events-none' : '' }}">
                                                                                                    @if ($collectId != null)
                                                                                                        @lang('labels.coupon.collected')
                                                                                                    @else
                                                                                                        @lang('labels.coupon.collect')
                                                                                                    @endif
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    @else
                                                                                        <div class="gccard-content-bottom-content login">
                                                                                            <button class="collect-view-btn text-blueMediq flex justify-center ml-auto mr-auto collect-login">@lang('labels.coupon.collect')</button>
                                                                                        </div>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {{-- <div class="relative collect">
                                                                        <div class="custom-voucher-shape gccard rounded-[20px] collect">
                                                                            <div class="gccard-top bg-no-repeat h-[100px] relative bg-cover gccard-home">
                                                                                @foreach (config('mediq.coupon_status') as $key => $type)
                                                                                    @if ($key == $coupondetails->is_new_or_limited)
                                                                                        <div class="label-tag rounded-[4px] absolute top-0 left-0 new">
                                                                                            {{ $type }}
                                                                                        </div>
                                                                                    @endif
                                                                                @endforeach
                                                                            </div>
                                                                            <div class="gccard-top bg-no-repeat h-[100px] relative bg-cover gccard-detail hidden">
                                                                                <div class="detail-coupon absolute top-[8px] left-[10px] rounded-[4px] py-[5px] px-[10px] bg-[#F0F9F0] me-green-color new">
                                                                                    New
                                                                                </div>
                                                                            </div>
                                                                            <div class="gccard-content text-center">
                                                                                <div data-mainid="{{$key++}}" data-id="collect-detail-modal-back{{$key}}" class="cclogo-container show-detail-popup">
                                                                                    <div class="rounded-full">
                                                                                        <img class="cclogo border-mee4 rounded-full w-[72px] h-[72px]" src="{{ isset($coupondetails->merchant) ? $coupondetails->merchant->icon : '' }}">
                                                                                    </div>
                                                                                </div>
                                                                                <div data-mainid="{{$key++}}" data-id="collect-detail-modal-back{{$key}}" class="gccard-content-body show-detail-popup">
                                                                                    <p data-mainid="{{$key++}}" data-id="collect-detail-modal-back{{$key}}" class="company-name text-darkgray cursor-pointer">{{ langbind($coupondetails, 'name') }}</p>
                                                                                    <p class="ctitle text-darkgray">{{ langbind($coupondetails, 'sub_title') }}</p>
                                                                                    <div class="flex justify-start items-center flex-wrap">
                                                                                        <p class="ccategory text-lightgray new-ccategory">
                                                                                            <span class="info-icon block border-1 border-lightgray text-lightgray rounded-full w-[16px] h-[16px] text-[11px] text-center leading-[115%]">i</span>
                                                                                            @if ($coupondetails->usage_time)
                                                                                                Once collected, valid for
                                                                                                {{ $coupondetails->usage_time }} days
                                                                                            @else
                                                                                                @lang('labels.coupon.offer_expires')
                                                                                                {{ date('M d Y', strtotime($coupondetails->end_date)) }}
                                                                                            @endif
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                                <div data-mainid="{{$key++}}" data-id="collect-detail-modal-back{{$key}}" class="gccard-content-bottom show-detail-popup login notshow">
                                                                                    <div class="gccard-content-bottom-content relative h-[90%] w-full">
                                                                                        @if (Auth::guard('customer')->check())
                                                                                            <button id="popup_coupon{{ $coupondetails->id }}"
                                                                                                onclick="collect({{ $coupondetails->id }})"
                                                                                                data-id={{ $coupondetails->id }}
                                                                                                class="{{ $checkUsedExpired == true ? 'text-d1' : '' }} clt-button absolute top-1/2 w-full text-center -translate-y-1/2 collect-view-btn text-blueMediq flex justify-center ml-auto mr-auto collect {{ $collectId != null ? 'text-d1 pointer-events-none' : '' }}">
                                                                                                @if ($collectId != null)
                                                                                                    @lang('labels.coupon.collected')
                                                                                                @else
                                                                                                    @lang('labels.coupon.collect')
                                                                                                @endif
                                                                                            </button>
                                                                                        @else
                                                                                        <button class="clt-button absolute top-1/2 w-full text-center -translate-y-1/2 collect-view-btn text-d1 flex justify-center ml-auto mr-auto collected">@lang('labels.coupon.collect')</button>
                                                                                            <button class="register-btn clt-button absolute top-1/2 w-full text-center -translate-y-1/2 collect-view-btn text-blueMediq flex justify-center ml-auto mr-auto collect">@lang('labels.coupon.collect')</button>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                                <div class="gccard-content-bottom login login_not_collect">
                                                                                    @if (Auth::guard('customer')->check())
                                                                                        <button
                                                                                            id="popup_coupon{{ $coupondetails->id }}"
                                                                                            onclick="collect({{ $coupondetails->id }})"
                                                                                            data-id={{ $coupondetails->id }}
                                                                                            class="{{ $checkUsedExpired == true ? 'text-d1' : '' }} collect-view-btn text-blueMediq flex justify-center ml-auto mr-auto collect-login {{ $collectId != null ? 'text-d1 pointer-events-none' : '' }}">
                                                                                            @if ($collectId != null)
                                                                                                @lang('labels.coupon.collected')
                                                                                            @else
                                                                                                @lang('labels.coupon.collect')
                                                                                            @endif
                                                                                        </button>
                                                                                    @else
                                                                                        <button class="collect-view-btn text-blueMediq flex justify-center ml-auto mr-auto collect-login">@lang('labels.coupon.collect')</button>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div> --}}
                                                                </div>
                                                            </div>
                                                        @endforeach    
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                    @if($data->type == 'banner')
                                        <div class="blog-only-image rounded-[20px] mt-5">
                                            <div component-name="me-only-image" class="me-only-image mt-5">
                                                @if(isset($data->merchant_banner_img))
                                                    <img src="{{ asset($data->merchant_banner_img) }}"
                                                    alt="blog-adv-banner-img" class="object-cover w-full h-full">
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                    @if($data->type == 'product-filter')
                                        <div class="product-should-section">
                                            <div>
                                                <div component-name="me-blog-product-should" class="blog-product-should mt-5">
                                                    <div class="flex items-center justify-between">
                                                        <div class="flex items-center justify-start">
                                                            <img src="{{ $data->blogSubCategory->img }}" alt="" class="" width="40">
                                                            <p class="ml-[10px] helvetica-normal me-body20 text-darkgray leading-[24px]">
                                                                {{ langbind($data->blogSubCategory, 'name') }}</p>
                                                        </div>
                                                        <div>
                                                            <button type="button" class="rounded-[50px] bg-whitez border border-darkgray me-body16 helvetica-normal flex items-center justify-center px-[20px] py-[10px] font-bold hover:bg-blueMediq hover:text-whitez hover:border-blueMediq" id="btn_product_list">
                                                                @lang('labels.read_more')
                                                            </button>
                                                        </div>
                                                        <input type="hidden" id="blog_details_sub_category_id" value="{{$data->sub_category_id}}">
                                                    </div>
                                                    <ul class="mt-[12px] flex-wrap flex items-center justify-start">
                                                        @if(isset($data->key_item_ids))
                                                            @php
                                                                $product_key_item_tags = \DB::table('key_item_tags')
                                                                ->whereNull('key_item_tags.deleted_at')
                                                                ->where('key_item_tags.is_published', 1)
                                                                ->whereIn("key_item_tags.id",json_decode($data->key_item_ids))
                                                                ->select(
                                                                    'key_item_tags.id',
                                                                    'key_item_tags.name_en',
                                                                    'key_item_tags.name_tc',
                                                                    'key_item_tags.name_sc'
                                                                )
                                                                ->get();
                                                            @endphp
                                                            @foreach ($product_key_item_tags as $kdata)
                                                                <li class="mr-4 mb-4">
                                                                    <p class="helvetica-normal me-body16 text-darkgray rounded-[50px] bg-far px-5 py-[8px] border border-far hover:border-blueMediq hover:text-blueMediq cursor-pointer">
                                                                        {{ @langbind($kdata, 'name') }}
                                                                    </p>
                                                                </li>
                                                            @endforeach
                                                        @endif
                                                        @if(isset($data->highlight_tag_ids))
                                                            @php
                                                                $product_highlight_tags = \DB::table('highlight_tags')
                                                                ->whereNull('highlight_tags.deleted_at')
                                                                ->where('highlight_tags.is_published', 1)
                                                                ->whereIn("highlight_tags.id",json_decode($data->highlight_tag_ids))
                                                                ->select(
                                                                    'highlight_tags.id',
                                                                    'highlight_tags.name_en',
                                                                    'highlight_tags.name_tc',
                                                                    'highlight_tags.name_sc'
                                                                )
                                                                ->get();
                                                            @endphp
                                                            @foreach ($product_highlight_tags as $htdata)
                                                                <li class="mr-4 mb-4">
                                                                    <p class="helvetica-normal me-body16 text-darkgray rounded-[50px] bg-far px-5 py-[8px] border border-far hover:border-blueMediq hover:text-blueMediq cursor-pointer">
                                                                        {{ @langbind($htdata, 'name') }}
                                                                    </p>
                                                                </li>
                                                            @endforeach
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if($data->type == 'faq')
                                        <div class="question-section">
                                            <div component-name="me-popular-questions" class="me-popular-questions-container mt-5">
                                                @if(isset($data->faq_question_en) && isset($data->faq_question_sc) && isset($data->faq_question_tc) && isset($data->faq_answer_en) && isset($data->faq_answer_sc) && isset($data->faq_answer_tc))
                                                    <div class="me-popular-questions-content">
                                                        @foreach(json_decode($data->faq_question_en) as $question_key => $question_en)
                                                        @php
                                                            if (lang() == 'zh-hk') {
                                                                $question = isset(json_decode($data->faq_question_tc)[$question_key]) ? json_decode($data->faq_question_tc)[$question_key] : '';
                                                                $answer = isset(json_decode($data->faq_answer_tc)[$question_key]) ? json_decode($data->faq_answer_tc)[$question_key] : '';
                                                            } else if(lang() == 'zh-cn') {
                                                                $question = isset(json_decode($data->faq_question_sc)[$question_key]) ? json_decode($data->faq_question_sc)[$question_key] : '';
                                                                $answer = isset(json_decode($data->faq_answer_sc)[$question_key]) ? json_decode($data->faq_answer_sc)[$question_key] : '';
                                                            } else {
                                                                $question = isset($question_en) ? $question_en : '';
                                                                $answer = isset(json_decode($data->faq_answer_en)[$question_key]) ? json_decode($data->faq_answer_en)[$question_key] : '';
                                                            }
                                                        @endphp
                                                        <div class="faq-div-content">
                                                            <div class="lg:px-5 px-3 2xl:py-10 py-5 flex justify-between faq-title-bar cursor-pointer">
                                                                <h3 class="font-bold me-body26 text-darkgray">{{ $question }}</h3>
                                                                <img src="{{asset('frontend/img/faq-down.svg')}}" alt="faq-down" />
                                                            </div>
                                                            <div class="px-10 faq-answers-content 2xl:mt-[30px] mt-4">
                                                                {!! $answer !!}
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    @endforeach
                @endif
                <div class="last-section">
                    <div component-name="me-blog-detail-last-section" class="me-blog-detail-last-section mt-5">
                    <div class="group-divider cus-w-full first"></div>
                    <div class="flex flex-wrap jusitfy-start items-center">
                        @php
                        $recommendedBlog = App\Models\Blog::whereIn('id', explode(',', $blogDetails->recommended_blog_id))->get();
                        @endphp
                        @foreach ($recommendedBlog as $rbdata)
                            <a href="#"
                                class="mb-4 text-blueMediq bg-paleblue rounded-[50px] pl-5 py-[4px] pr-[4px] flex items-center justify-start group group-link">
                                <span
                                    class="helvetica-normal me-body20 leading-[24px] group-text">{{ @langbind($rbdata, 'title') }}</span>
                                <span
                                    class="bg-blueMediq rounded-full flex items-center justify-center w-[52px] h-[52px] group-arrow group-hover:rotate-[-15deg]">
                                    <svg width="32" height="32" viewBox="0 0 32 32"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M15.0654 25.7337C14.8209 25.4893 14.6929 25.1782 14.6814 24.8004C14.6698 24.4226 14.7867 24.1115 15.032 23.8671L21.5654 17.3337H6.66537C6.28759 17.3337 5.9707 17.2057 5.7147 16.9497C5.4587 16.6937 5.33115 16.3773 5.33204 16.0004C5.33204 15.6226 5.46004 15.3057 5.71604 15.0497C5.97204 14.7937 6.28848 14.6662 6.66537 14.6671H21.5654L15.032 8.13372C14.7876 7.88928 14.6707 7.57817 14.6814 7.20039C14.692 6.82261 14.82 6.5115 15.0654 6.26706C15.3098 6.02261 15.6209 5.90039 15.9987 5.90039C16.3765 5.90039 16.6876 6.02261 16.932 6.26706L25.732 15.0671C25.8654 15.1782 25.96 15.3173 26.016 15.4844C26.072 15.6515 26.0996 15.8235 26.0987 16.0004C26.0987 16.1782 26.0712 16.3448 26.016 16.5004C25.9609 16.6559 25.8663 16.8004 25.732 16.9337L16.932 25.7337C16.6876 25.9782 16.3765 26.1004 15.9987 26.1004C15.6209 26.1004 15.3098 25.9782 15.0654 25.7337Z"
                                            fill="white"></path>
                                    </svg>
                                </span>
                            </a>
                        @endforeach
                    </div>
                    <div class="group-divider cus-w-full second"></div>
                    <div class="source-div mb-[32px]">
                        <p class="me-body18 helvetica-normal text-darkgray">@lang('labels.blog.source_of_information'):
                            @if(isset($blogDetails->source_title_en) && isset($blogDetails->source_title_tc) && isset($blogDetails->source_title_sc))
                                @foreach(json_decode($blogDetails->source_title_en) as $source_key => $source_title_en)
                                    @php
                                        if (lang() == 'zh-hk') {
                                            $sourcename = isset(json_decode($blogDetails->source_title_tc)[$source_key]) ? json_decode($blogDetails->source_title_tc)[$source_key] : '';
                                        } else if(lang() == 'zh-cn') {
                                            $sourcename = isset(json_decode($blogDetails->source_title_sc)[$source_key]) ? json_decode($blogDetails->source_title_sc)[$source_key] : '';
                                        } else {
                                            $sourcename = isset($source_title_en) ? $source_title_en : '';
                                        }

                                        $sourceurl = isset(json_decode($blogDetails->source_title_link)[$source_key]) ? json_decode($blogDetails->source_title_link)[$source_key] : '';
                                    @endphp
                                    <a href="{{ $sourceurl }}" class="text-blueMediq">
                                        {{ $sourcename }}@if(!$loop->last),@else.@endif
                                    </a>
                                @endforeach
                            @endif
                        </p>
                    </div>
                    <ul class="mt-[12px] flex flex-wrap items-center justify-start">
                        @foreach (explode(',', $blogDetails->related_keywords) as $rkdata)
                            <li class="mr-4 mb-4">
                                <p
                                    class="helvetica-normal me-body16 text-whitez rounded-[50px] bg-blueMediq px-5 py-[8px] border border-blueMediq hover:text-blueMediq hover:bg-whitez cursor-pointer">
                                    {{ $rkdata }}
                                </p>
                            </li>
                        @endforeach
                    </ul>
                        <div class="text-center pt-[50px]">
                            @php
                                $likeCount = App\Models\BlogDetailsLikeDislike::where('blog_id', $blogDetails->id)
                                    ->where('like', 1)
                                    ->get()
                                    ->count();
                                $dislikeCount = App\Models\BlogDetailsLikeDislike::where('blog_id', $blogDetails->id)
                                    ->where('dislike', 1)
                                    ->get()
                                    ->count();
                                $cutomerLike = false;
                                $customerDislike = false;
                                if (Auth::guard('customer')->check()) {
                                    $customerLikeData = App\Models\BlogDetailsLikeDislike::where('blog_id', $blogDetails->id)
                                        ->where('like', 1)
                                        ->where(
                                            'customer_id',
                                            auth()
                                                ->guard('customer')
                                                ->user()->id,
                                        )
                                        ->first();
                                    if ($customerLikeData) {
                                        $cutomerLike = true;
                                    }

                                    $customerDisLikeData = App\Models\BlogDetailsLikeDislike::where('blog_id', $blogDetails->id)
                                        ->where('dislike', 1)
                                        ->where(
                                            'customer_id',
                                            auth()
                                                ->guard('customer')
                                                ->user()->id,
                                        )
                                        ->first();
                                    if ($customerDisLikeData) {
                                        $customerDislike = true;
                                    }
                                }
                            @endphp
                            <p class="helvetica-normal text-darkgray me-body23 mb-[12px]">@lang('labels.blog.is_this_article_helpful_to_you')</p>
                            <div class="flex items-center justify-center">
                                <div class="flex items-center mr-5">
                                    <input type="hidden" value="{{ $likeCount }}" name="like-number"
                                        class="like-num">
                                    <button
                                        class="{{ $cutomerLike == true ? 'active' : '' }} {{ !Auth::guard('customer')->check() ? 'register-btn like_dislike_disalbed' : 'like-btn' }}"
                                        data-id="like">
                                        <svg width="32" height="32" viewBox="0 0 32 32"
                                            fill="none" xmlns="http://www.w3.org/2000/svg"
                                            class="none-img">
                                            <path
                                                d="M29.0613 10.18C28.8032 9.88773 28.486 9.65366 28.1306 9.49333C27.7753 9.33299 27.3899 9.25005 27 9.25H19.75V7C19.75 5.74022 19.2496 4.53204 18.3588 3.64124C17.468 2.75044 16.2598 2.25 15 2.25C14.8606 2.24996 14.7239 2.28877 14.6054 2.36207C14.4868 2.43538 14.391 2.54028 14.3287 2.665L9.53625 12.25H4C3.53587 12.25 3.09075 12.4344 2.76256 12.7626C2.43437 13.0908 2.25 13.5359 2.25 14V25C2.25 25.4641 2.43437 25.9092 2.76256 26.2374C3.09075 26.5656 3.53587 26.75 4 26.75H25.5C26.1702 26.75 26.8174 26.5052 27.3199 26.0617C27.8224 25.6181 28.1456 25.0063 28.2288 24.3412L29.7288 12.3413C29.7771 11.9543 29.7426 11.5614 29.6275 11.1888C29.5124 10.8162 29.3194 10.4723 29.0613 10.18ZM3.75 25V14C3.75 13.9337 3.77634 13.8701 3.82322 13.8232C3.87011 13.7763 3.9337 13.75 4 13.75H9.25V25.25H4C3.9337 25.25 3.87011 25.2237 3.82322 25.1768C3.77634 25.1299 3.75 25.0663 3.75 25ZM28.24 12.155L26.74 24.155C26.7022 24.4573 26.5554 24.7353 26.327 24.937C26.0987 25.1386 25.8046 25.2499 25.5 25.25H10.75V13.1775L15.4475 3.78125C16.2244 3.88925 16.936 4.27459 17.4511 4.86616C17.9662 5.45773 18.2499 6.21562 18.25 7V10C18.25 10.1989 18.329 10.3897 18.4697 10.5303C18.6103 10.671 18.8011 10.75 19 10.75H27C27.1772 10.75 27.3524 10.7878 27.5139 10.8607C27.6754 10.9336 27.8196 11.04 27.9368 11.1729C28.0541 11.3057 28.1418 11.462 28.194 11.6313C28.2463 11.8007 28.262 11.9792 28.24 12.155Z"
                                                fill="#333333"></path>
                                        </svg>
                                        <img src="{{ asset('frontend/img/faq-thumb-up-active.svg') }}"
                                            alt="faq-thumb" class="w-[32px] h-[32px] thumb-up-active {{ !Auth::guard('customer')->check() ?'hidden':''}}">
                                    </button>
                                    <p class="ml-2"> (<span
                                            class="like-number">{{ $likeCount }}</span>)</p>
                                </div>
                                <div class="flex items-center">
                                    <input type="hidden" value="{{ $dislikeCount }}"
                                        name="unlike-number" class="like-num">
                                    <button
                                        class=" {{ $customerDislike == true ? 'active' : '' }} {{ !Auth::guard('customer')->check() ? 'register-btn like_dislike_disalbed' : 'unlike-btn' }}"
                                        data-id="dislike">
                                        <svg class="none-img" width="32" height="32"
                                            viewBox="0 0 32 32" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M29.0613 21.82C28.8032 22.1123 28.486 22.3463 28.1306 22.5067C27.7753 22.667 27.3899 22.75 27 22.75L19.75 22.75V25C19.75 26.2598 19.2496 27.468 18.3588 28.3588C17.468 29.2496 16.2598 29.75 15 29.75C14.8606 29.75 14.7239 29.7112 14.6054 29.6379C14.4868 29.5646 14.391 29.4597 14.3287 29.335L9.53625 19.75H4C3.53587 19.75 3.09075 19.5656 2.76256 19.2374C2.43437 18.9092 2.25 18.4641 2.25 18L2.25 7C2.25 6.53587 2.43437 6.09075 2.76256 5.76256C3.09075 5.43438 3.53587 5.25 4 5.25L25.5 5.25C26.1702 5.25 26.8174 5.49478 27.3199 5.93833C27.8224 6.38189 28.1456 6.99368 28.2288 7.65875L29.7288 19.6587C29.7771 20.0457 29.7426 20.4386 29.6275 20.8112C29.5124 21.1838 29.3194 21.5277 29.0613 21.82ZM3.75 7L3.75 18C3.75 18.0663 3.77634 18.1299 3.82322 18.1768C3.87011 18.2237 3.9337 18.25 4 18.25H9.25L9.25 6.75H4C3.9337 6.75 3.87011 6.77634 3.82322 6.82322C3.77634 6.87011 3.75 6.9337 3.75 7ZM28.24 19.845L26.74 7.845C26.7022 7.54273 26.5554 7.26467 26.327 7.06303C26.0987 6.8614 25.8046 6.75009 25.5 6.75L10.75 6.75L10.75 18.8225L15.4475 28.2188C16.2244 28.1107 16.936 27.7254 17.4511 27.1338C17.9662 26.5423 18.2499 25.7844 18.25 25V22C18.25 21.8011 18.329 21.6103 18.4697 21.4697C18.6103 21.329 18.8011 21.25 19 21.25L27 21.25C27.1772 21.25 27.3524 21.2122 27.5139 21.1393C27.6754 21.0664 27.8196 20.96 27.9368 20.8271C28.0541 20.6943 28.1418 20.538 28.194 20.3687C28.2463 20.1993 28.262 20.0208 28.24 19.845Z"
                                                fill="#333333"></path>
                                        </svg>
                                        <img src="{{ asset('frontend/img/faq-thumb-down-active.svg') }}"
                                            alt="faq-thumb" class="w-[32px] h-[32px] thumb-down-active {{ !Auth::guard('customer')->check() ?'hidden':''}}">
                                    </button>
                                    <p class="ml-2"> (<span
                                            class="like-number">{{ $dislikeCount }}</span>)</p>
                                </div>
                            </div>
                        </div>
                    <div class="group-divider cus-w-full third"></div>
                    <div class="flex items-center ">
                        <div class="one-by-one-ratio apicon w-[60px] h-[60px] rounded-full mr-[10px]">
                            @if ($blogDetails->blogAuthor->profile_img != null)
                                <img src="{{ $blogDetails->blogAuthor->profile_img }}"
                                    alt="author icon" class="w-full h-full object-cover rounded-full">
                            @else
                                <img src="{{ asset('frontend/img/author-product.svg') }}"
                                    alt="author icon" class="w-full h-full object-cover rounded-full">
                            @endif
                        </div>
                        <div class="w-fit">
                            <p class="helvetica-normal text-lightgray me-body16">Author</p>
                            <p class="helvetica-normal text-darkgray me-body18 font-bold">
                                {{ @langbind($blogDetails->blogAuthor, 'name') }},
                                {{ @langbind($blogDetails->blogAuthor, 'position') }}</p>
                            <p
                                class="helvetica-normal text-darkgray me-body16 leading-[20.8px] py-[12px]">
                                {!! @langbind($blogDetails->blogAuthor, 'desc') !!}
                            </p>
                            <div class="flex items-center justify-start">
                                <a href="#"><img
                                        src="{{ asset('frontend/img/facebook-product.svg') }}"
                                        alt="facebook icon"></a>
                                <a href="#"><img
                                        src="{{ asset('frontend/img/twitter-product.svg') }}"
                                        alt="twitter icon"></a>
                                <a href="#"><img
                                        src="{{ asset('frontend/img/linkein-product.svg') }}"
                                        alt="linkin icon"></a>
                            </div>
                        </div>
                    </div>
                    <div class="group-divider cus-w-full fourth"></div>
                    <p class="helvetica-normal text-lightgray me-body16 leading-[19.2px]">
                        {!! @langbind($blogDetails, 't_and_c_content') !!}
                    </p>
                    <div class="group-divider cus-w-full last "></div>
                    </div>
                </div>
            </div>
            <div class="blog-right md:pl-[25px] xl:pl-[45px]">
                @if(count($popularArticles) > 0)
                    <div component-name="me-popular-card" class="py-[32px] rounded-[20px] shadow-blog">
                        <div class="px-[32px]">
                            <h6 class="text-darkgray font-bold me-body26 helvetica-normal">@lang('labels.popular_articles')</h6>
                        </div>
                        <div class="pt-[16px]">
                            @foreach ($popularArticles as $data)
                                <a href="{{ route('blog.details', ['category_name' => $data->blogCategory->name_en, 'slug' => $data->slug_en]) }}"
                                    class="flex items-center px-[32px] py-[10px] group hover:bg-far hover:text-darkgray popular-link">
                                    <div class="w-[120px] h-[50px] xl:h-[67px] rounded-[4px] mr-[20px] bg-cover bg-no-repeat popular-link--img"
                                        style="background-image: url('{{ $data->main_image_url }}');">
                                    </div>
                                    <p
                                        class="text-lightgray helvetica-normal me-body18 leading-[21.6px] group-hover:text-darkgray popular-link--title">
                                        {{ @langbind($data, 'title') }}
                                    </p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif               
                <div class="full-page-gray"></div>
                <div component-name="me-summary-card" class="summary-card-container bg-whitez rounded-[20px] shadow-blog p-[32px] mt-[32px] z-[1]">
                    <div class="sum-mobile-layout">
                        <div class="summary-card-title mb-4">
                            <h6 class="text-darkgray me-body26 helvetica-normal font-bold">@lang('labels.blog.summary')</h6>
                        </div>
                        <div class="summary-links-container pr-2 sm:pr-5">
                            @if(isset($sections))
                                @foreach ($sections as $key=>$data)
                                    <a href="#no{{ $key+1 }}" class="summary-links-item flex items-center justify-start helvetica-normal me-body18 text-darkgray py-[5px] w-full group hover:text-blueMediq">
                                        <img src="{{ asset('frontend/img/summary-arrow.svg') }}" alt="summary arrow icon" class="summary-arrow-icon mr-[10px]" />
                                        <span>{{ @langbind($data, 'section_name') }}</span>
                                    </a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="shopping-feature-section" id="related-articles">
        <div component-name="blog-feature-section" class="bfs-container sf-box py-[30px] lg:py-[60px]">
            <div class="flex flex-wrap htzxs:flex-nowrap items-center justify-between pb-8 bfs-title-container">
                <h6 class="w-full htzxs:w-fit helvetica-normal text-darkgray me-body32 font-bold">@lang('labels.blog.related_articles')
                </h6>
                <a href="{{ route('blog.list') }}"
                    class="helvetica-normal text-darkgray me-body16 font-bold px-5 py-[0.45rem] border border-darkgray rounded-[50px] hover:text-whitez hover:bg-blueMediq hover:border-blueMediq">@lang('labels.read_more')</a>
            </div>
            <div class="bfs-cardlist flex flex-wrap lg:flex-nowrap items-center">
                @php
                    $relatedArticles = App\Models\Blog::whereIsPublished(true)
                        ->where('category_id', $blogDetails->category_id)
                        ->where('id', '<>', $blogDetails->id)
                        ->limit(3)
                        ->get();
                @endphp
                @foreach ($relatedArticles as $radata)
                    <div component-name="me-blog-card" class="blog-single-card three-bc">
                        <a href="{{ route('blog.details', ['category_name' => $radata->blogCategory->name_en, 'slug' => $radata->slug_en]) }}"
                            class="bc-link-card block bg-whitez rounded-[20px] hover:shadow-meblog mb-[10px] lg:mb-0 h-full 6xl:h-auto">
                            <div
                                class="rounded-[20px] bg-whitez mb-[10px] lg:mb-0 h-full 6xl:h-auto bc-link-card--container">
                                <img src="{{ $radata->main_image_url }}" alt="blog"
                                    class="w-full object-cover rounded-t-[20px] h-[280px] bc-link-card--container--img">
                                <div class="bc-container py-5 px-6 lghtz:px-10 bc-link-card--container--des">
                                    <span
                                        class="bc-category text-whitez bg-blueMediq px-5 py-[4px] rounded-[50px] me-body14 mb-3.5 helvetica-normal">{{ @langbind($radata->blogCategory, 'name') }}</span>
                                    <h3 class="font-bold pb-2.5 text-blueMediq me-title26 helvetica-normal bc-title">
                                        {{ @langbind($radata, 'title') }}</h3>
                                    <p
                                        class="font-normal pb-2.5 me-body14 text-meA3 flex items-center justify-start helvetica-normal bc-date">
                                        {{ date('d-m-Y', strtotime($radata->created_at)) }}<img
                                            src="{{ asset('frontend/img/gray-dot.svg') }}"
                                            class="gray-dot mx-[5px]">{{ @langbind($radata->blogAuthor, 'name') }}</p>
                                    <div class="font-normal me-body16 text-lightgray helvetica-normal bc-des">
                                        {!! @langbind($data, 'desc') !!}</div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <section class="interested-slider">
        <div component-name="me-you-may-also-like" class="me-you-may-also-like me-container180px py-[24px]">
            <div class="you-may-also-like-section flex items-center justify-between mt-[24px] mb-[32px]">
                <h3 class="helvetica-normal text-darkgray font-bold me-body28">@lang('labels.blog.you_may_be_interested_in')</h3>
                <button
                    class="rounded-[50px] bg-whitez border border-darkgray me-body16 helvetica-normal flex items-center justify-center px-[20px] py-[10px] font-bold hover:bg-blueMediq hover:text-whitez hover:border-blueMediq">
                    @lang('labels.blog.shop_now')
                </button>
            </div>
            <div component-name="mediq-quality-healthcare">
                <div class="me-healthcare flex flex-wrap">
                    @if (count($relatedProducts) > 0)
                        @foreach ($relatedProducts as $key => $product)
                            @include('frontend.product-vertical-card')
                        @endforeach
                    @endif
                </div>
            </div>
            @if (count($relatedProducts) > 0)
                @foreach ($relatedProducts as $key => $product)
                    {{-- @include('frontend.product-modal') --}}
                    <div class="custom-product-modal"></div>
                    {{-- @include('frontend.include.product-compare') --}}
                @endforeach
            @endif
        </div>
    </section>
    @php
        $url = url()->full();
    @endphp
    <div component-name="me-blog-social-icons"
        class="mbsocial-card fixed top-[39vh] left-[1.25%] xl:left-[2%] 6xl:left-[3%] z-[3]">
        <div class="social-container">
            <ul>
                <li class="w-[36px] h-[36px]  mb-[10px] mbsi-card">
                    <a href="https://wa.me/?text={{ $url }}"
                        class="rounded-[50%] bg-paleblue flex items-center justify-center w-full h-full transition hover:translate-x-[5px] social-icon-item"><img
                            src="{{ asset('frontend/img/blog-whatsapp.svg') }}"></a>
                </li>
                <li class="w-[36px] h-[36px]  mb-[10px] mbsi-card">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ $url }}"
                        class="rounded-[50%] bg-paleblue flex items-center justify-center w-full h-full transition hover:translate-x-[5px] social-icon-item"><img
                            src="{{ asset('frontend/img/blog-facebook.svg') }}"></a>
                </li>
                <li class="w-[36px] h-[36px]  mb-[10px] mbsi-card hidden">
                    <a href="https://t.me/share/url?url={{ $url }}&text=test"
                        class="rounded-[50%] bg-paleblue flex items-center justify-center w-full h-full transition hover:translate-x-[5px] social-icon-item"><img
                            src="{{ asset('frontend/img/blog-telegram.svg') }}"></a>
                </li>
                <li class="w-[36px] h-[36px]  mb-[10px] mbsi-card hidden">
                    <a href="https://api.qrserver.com/v1/create-qr-code/?size=154x154&data={{ $url }}"
                        class="rounded-[50%] bg-paleblue flex items-center justify-center w-full h-full transition hover:translate-x-[5px] social-icon-item"><img
                            src="{{ asset('frontend/img/blog-wechat.svg') }}"></a>
                </li>
                <li class="w-[36px] h-[36px]  mb-[10px] mbsi-card hidden">
                    <a href="https://social-plugins.line.me/lineit/share?url={{ $url }}"
                        class="rounded-[50%] bg-paleblue flex items-center justify-center w-full h-full transition hover:translate-x-[5px] social-icon-item"><img
                            src="{{ asset('frontend/img/blog-line.svg') }}"></a>
                </li>
                <li class="w-[36px] h-[36px]  mb-[10px] mbsi-card hidden">
                    <a href="#" onclick="copyUrl()"
                        class="rounded-[50%] bg-paleblue flex items-center justify-center w-full h-full transition hover:translate-x-[5px] social-icon-item"><img
                            src="{{ asset('frontend/img/blog-share-link.svg') }}"></a>
                    <input type="text" id="copytext" value="{{ $url }}" hidden>
                </li>
                <li class="w-[36px] h-[15px] mb-[10px]">
                    <button class="flex items-center justify-center w-full h-full transition social-collapse-icon"><img src="{{ asset('frontend/img/social-collapse-icon.svg') }}" class="rotate-180"></button>
                </li>
            </ul>
        </div>
    </div>

    @include('frontend.include.product-compare-box')
    <dialog id="successfully-saved-message" component-name="me-compare-status-popup"
        class="hidden csp-container hidden flex items-center justify-center fixed z-[1001] left-0 top-0 w-full h-full bg-transparent overflow-hidden">
        <div class="bg-darkgray rounded-[4px] p-4">
            <p class="me-body16 helvetica-normal text-white">@lang('labels.basic_info.success_save')</p>
        </div>
    </dialog>
</main>
<style>
    .like_dislike_disalbed{
        cursor: not-allowed;
        pointer-events: all !important;
    }
</style>
@endsection
@push('scripts')
<script>
    function copyUrl() {
        var copyText = document.getElementById("copytext");
        copyText.select();
        copyText.setSelectionRange(0, 99999); // For mobile devices
        navigator.clipboard.writeText(copyText.value);
        toastr.success(copied);
    }
    $(document).ready(function() {
        $("body").on("click", ".keyword-search-btn", function() {
            window.location.href = "../../../blog/list/search/" + $("#keyword").val();
        });
        $(document).on("click", ".btnSubmit", function(e) {
            e.preventDefault();
            var to_learn_more_options = []
            $('input.to_learn_more_options').each(function() {
                to_learn_more_options.push($(this).val());
            });
            let data = JSON.stringify({
                'title': $("input[name=title]").val(),
                'first_name': $("input[name=first_name]").val(),
                'last_name': $("input[name=last_name]").val(),
                'email': $("input[name=email]").val(),
                'phone': ($("#phone_no").val() != "" ? $("#phone_code").val() + $("#phone_no")
                    .val() : ''),
                'phone_code': $("input[name=phone_code]").val(),
                'g-recaptcha-response': $("#captcha99Form").find(".g-recaptcha-response").val(),
                'contact_person_name': $("input[name=contact_person_name]").val(),
                'contact_person_position': $("input[name=contact_person_position]").val(),
                'to_learn_more_options': to_learn_more_options,
                'blog_details_id': parseInt($("input[name=blog_details_id]").val()),
                'is_accepted': $("input[name=submit-check]").val() == 'on' ? 0 : 1,
                'message': $("input[name=message]").val()
            });
            $(".text-mered").addClass("hidden");
            $(".text-mered").html("");
            $.ajax({
                type: 'POST',
                url: "{{ route('blog.details.form.submissions') }}",
                data: data,
                dataType: "json",
                contentType: "application/json",
                success: (response) => {
                    if (response.status == 'success') {
                        //console.log(response.data)
                        $("#successfully-saved-message").removeClass("hidden");
                        compareStatusAutoClose();
                        $("#captcha99Form").trigger("reset");
                        setTimeout(() => {
                            document.location.reload();
                        }, 4000);
                    }
                },
                error: function(data) {
                    $.each(data.responseJSON.errors, function(k, v) {
                        if (k == "first_name") {
                            let errorTxt = v[0];
                            $("#first_name_error").html(errorTxt);
                            $("#first_name_error").removeClass("hidden");
                        }
                        if (k == "last_name") {
                            let errorTxt = v[0];
                            $("#last_name_error").html(errorTxt);
                            $("#last_name_error").removeClass("hidden");
                        }
                        if (k == "email") {
                            let errorTxt = v[0];
                            $("#email_error").html(errorTxt);
                            $("#email_error").removeClass("hidden");
                        }
                        if (k == "phone") {
                            let errorTxt = v[0];
                            $("#phone_error").html(errorTxt);
                            $("#phone_error").removeClass("hidden");
                        }
                        console.log(k)
                        if (k == "g-recaptcha-response") {
                            alert()
                            let errorTxt = v[0];
                            $("#g_recaptcha_error").html(errorTxt);
                            $("#g_recaptcha_error").removeClass("hidden");
                        }
                    });
                }
            });
        });

        $(".like-btn,.unlike-btn").click(function() {
            let btnType = $(this).data("id");
            $.ajax({
                type: 'POST',
                url: "{{ route('blog.details.like.dislike') }}",
                data: JSON.stringify({
                    blog_id: {{ $blogDetails->id }},
                    // yes_count : $("#yes_count").val(),
                    // no_count : $("#no_count").val(),
                    btn_type: btnType
                }),
                dataType: "json",
                contentType: "application/json",
                processData: false,
                success: (response) => {
                    if (response.status == 'success') {
                        //console.log(response.data)
                        $("#successfully-saved-message").removeClass("hidden");
                        compareStatusAutoClose();
                        //setTimeout(() => { document.location.reload(); }, 4000);
                    }
                },
                error: function(data) {
                    $.each(data.responseJSON.errors, function(k, v) {
                        if (k == "file") {
                            let errorTxt = v[0];
                            $("#file_error").html(errorTxt);
                            $("#file_error").removeClass("hidden");
                        }
                    });
                }
            });
        });
        let product_key_item_tags = <?php echo isset($product_key_item_tags) ? json_encode($product_key_item_tags->pluck("id")->toArray()) : ''; ?>;
        let product_highlight_tags = <?php echo isset($product_highlight_tags) ? json_encode($product_highlight_tags->pluck("id")->toArray()): ''; ?>;
        let pcId = $("#blog_details_sub_category_id").val();
        $("#btn_product_list").on("click",function(){
            var langParamemter = document.location.pathname.split("/").slice(1, 2).toString();
            if(langParamemter=='zh-hk' || langParamemter=='zh-cn' || langParamemter=='en'){
                // alert(langParamemter)
                window.location.href = "../../products/?ss=1&pc1=" + pcId + "&tf=recommend&view=grid-view&page=1&ht=" + product_highlight_tags.join("%2C") + "&ki=" + product_key_item_tags.join("%2C");
            }else{
                window.location = "../products/?ss=1&pc1=" + pcId + "&tf=recommend&view=grid-view&page=1&ht=" + product_highlight_tags.join("%2C") + "&ki=" + product_key_item_tags.join("%2C");
            }
        });

    });
</script>
<script src="{{ asset('frontend/custom/product-compare.js') }}"></script>
@endpush

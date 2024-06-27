@extends('frontend.layouts.master')
@include('frontend.seo', ['seo' => isset($seo) ? $seo : ''])
@section('content')
    <main>
        <section class="dash-banner-section">
            <div component-name="me-blog-banner" class="blog-banner-container">
                <div class="blog-banner-container-item relative h-[190px] w-full flex flex-col items-center justify-center"
                    style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.10) 0%, rgba(0, 0, 0, 0.10) 100%), url('../../../frontend/img/blog-banner.png'), lightgray 0px -649.078px / 100% 673.684% no-repeat;">
                    <div class="blog-floating-container w-full h-full">
                        <h1 class="me-body32 text-whitez helvetica-normal font-bold text-center blog-main-title">
                            <span class="blog-main-title-main">Blog @lang('labels.home')</span>
                            <span class="result-text text-blueMediq hidden"> </span>
                        </h1>
                        <div class="blog-menu-search mt-[40px]">
                            <div class="blog-header-search relative hidden">
                                <input type="text"
                                    class="rounded-[4px] w-full h-[50px] py-[5px] pl-[40px] pr-[80px] helvetica-normal me-body16 text-darkgray placeholder:text-meA3"
                                    placeholder="@lang('labels.blog.what_article_looking_for')" id="keyword">
                                <button class="absolute top-1/2 right-[44px] translate-y-[-50%] keyword-search-btn">
                                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M20.0004 20.5004L15.9504 16.4504M15.9504 16.4504C16.6004 15.8003 17.116 15.0286 17.4678 14.1793C17.8196 13.33 18.0007 12.4197 18.0007 11.5004C18.0007 10.5811 17.8196 9.67076 17.4678 8.82144C17.116 7.97211 16.6004 7.2004 15.9504 6.55036C15.3003 5.90031 14.5286 5.38467 13.6793 5.03287C12.83 4.68107 11.9197 4.5 11.0004 4.5C10.0811 4.5 9.17076 4.68107 8.32144 5.03287C7.47211 5.38467 6.7004 5.90031 6.05036 6.55036C4.73754 7.86318 4 9.64375 4 11.5004C4 13.357 4.73754 15.1375 6.05036 16.4504C7.36318 17.7632 9.14375 18.5007 11.0004 18.5007C12.857 18.5007 14.6375 17.7632 15.9504 16.4504Z"
                                            stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                            <div class="blog-menu-tab flex items-center justify-center">
                                <a href="{{route('blog.list')}}">
                                <button
                                    class="blog-menu-item helvetica-normal me-body16 font-bold text-darkgray border border-darkgray bg-whitez rounded-[50px] py-[10px] px-[20px] mr-[20px] hover:text-blueMediq hover:border-blueMediq transition active:bg-blueMediq active:text-whitez active:border-blueMediq active"
                                    aria-labelledby="bh" data-value="Blog Home">Blog @lang('labels.home')</button>
                                </a>
                                @foreach($blogCategory as $data)
                                <a href="{{route('blog.list.category',['category_name'=>$data->name_en])}}">
                                <button
                                    class="blog-menu-item helvetica-normal me-body16 font-bold text-darkgray border border-darkgray bg-whitez rounded-[50px] py-[10px] px-[20px] mr-[20px] hover:text-blueMediq hover:border-blueMediq transition active:bg-blueMediq active:text-whitez active:border-blueMediq"
                                    aria-labelledby="feature" data-value="">{{@langbind($data,'name')}}
                                </button>
                                </a>
                                @endforeach
                                <button class="search-icon-btn" data-value="@lang('labels.blog.search')">
                                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M20.0004 20.5004L15.9504 16.4504M15.9504 16.4504C16.6004 15.8003 17.116 15.0286 17.4678 14.1793C17.8196 13.33 18.0007 12.4197 18.0007 11.5004C18.0007 10.5811 17.8196 9.67076 17.4678 8.82144C17.116 7.97211 16.6004 7.2004 15.9504 6.55036C15.3003 5.90031 14.5286 5.38467 13.6793 5.03287C12.83 4.68107 11.9197 4.5 11.0004 4.5C10.0811 4.5 9.17076 4.68107 8.32144 5.03287C7.47211 5.38467 6.7004 5.90031 6.05036 6.55036C4.73754 7.86318 4 9.64375 4 11.5004C4 13.357 4.73754 15.1375 6.05036 16.4504C7.36318 17.7632 9.14375 18.5007 11.0004 18.5007C12.857 18.5007 14.6375 17.7632 15.9504 16.4504Z"
                                            stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--**************************************************************************************************-->
        <div id="bh" class="bb-item hidden">
            <section class="blog-gallery-section">
                <div class="blog-gallery-container">
                    @php
                        $homeFeaturedBlog = App\Models\Blog::whereIsPublished(true)->limit(3)->get();
                    @endphp
                    <div component-name="me-blog-gallery" class="blog-gallery-grid py-[30px] lg:py-[60px]">
                        <div class="flex flex-wrap smd:flex-nowrap items-start flex-start">
                            <div
                                class="first-col-flex w-full smd:w-[63%] h-[280px] smd:h-[585px] mb-[25px] smd:mb-0 smd:pr-[12.5px]">
                                @if(isset($homeFeaturedBlog[0]))
                                <a href="{{route('blog.details',['category_name'=>$homeFeaturedBlog[0]->blogCategory->name_en,'slug'=>$homeFeaturedBlog[0]->slug_en])}}">
                                    <div class="first-col-flex--item w-full h-full relative">
                                        <img src="{{$homeFeaturedBlog[0]->main_image_url}}" data-id="0"
                                            class="head-thumbnail w-full h-full rounded-[20px] object-cover first-col-flex--item--img">
                                        <div
                                            class="absolute bottom-0 left-0 w-full z-[1] p-[16px] first-col-flex--item--des">
                                            <span class="bg-whitez text-blueMediq px-5 py-[4px] rounded-[50px] me-body14 helvetica-normal">
                                            {{@langbind($homeFeaturedBlog[0]->blogCategory,'name')}}
                                            </span>
                                            <p
                                                class="helvetica-normal text-whitez me-body26 font-bold leading-tight mt-[8px]">
                                                {{@langbind($homeFeaturedBlog[0],'title')}}</p>
                                        </div>
                                    </div>
                                </a>
                                @endif
                            </div>
                            <div class="second-col-flex flex flex-col w-full smd:w-[37%] smd:pl-[12.5px]">
                                @if(isset($homeFeaturedBlog[1]))
                                <a href="{{route('blog.details',['category_name'=>$homeFeaturedBlog[1]->blogCategory->name_en,'slug'=>$homeFeaturedBlog[1]->slug_en])}}">
                                    <div class="second-col-flex--item h-[280px] mb-[25px] relative">
                                        <img src="{{$homeFeaturedBlog[1]->main_image_url}}" data-id="0"
                                            class="head-thumbnail w-full h-full rounded-[20px] object-cover second-col-flex--item--img">
                                        <div
                                            class="absolute bottom-0 left-0 w-full z-[1] p-[16px] second-col-flex--item--des">
                                            <span
                                                class="bg-whitez text-blueMediq px-5 py-[4px] rounded-[50px] me-body14 helvetica-normal">
                                                {{@langbind($homeFeaturedBlog[1]->blogCategory,'name')}}
                                            </span>
                                            <p
                                                class="helvetica-normal text-whitez me-body26 font-bold leading-tight mt-[8px]">
                                                {{@langbind($homeFeaturedBlog[1],'title')}}</p>
                                        </div>
                                    </div>
                                </a>
                                @endif
                                @if(isset($homeFeaturedBlog[2]))
                                <a href="{{route('blog.details',['category_name'=>$homeFeaturedBlog[2]->blogCategory->name_en,'slug'=>$homeFeaturedBlog[2]->slug_en])}}">
                                    <div class="second-col-flex--item h-[280px] relative">
                                        <img src="{{$homeFeaturedBlog[2]->main_image_url}}" data-id="0"
                                            class="head-thumbnail w-full h-full rounded-[20px] object-cover second-col-flex--item--img">
                                        <div
                                            class="absolute bottom-0 left-0 w-full z-[1] p-[16px] second-col-flex--item--des">
                                            <span
                                                class="bg-whitez text-blueMediq px-5 py-[4px] rounded-[50px] me-body14 helvetica-normal">
                                                {{@langbind($homeFeaturedBlog[2]->blogCategory,'name')}}
                                            </span>
                                            <p
                                                class="helvetica-normal text-whitez me-body26 font-bold leading-tight mt-[8px]">
                                                {{@langbind($homeFeaturedBlog[2],'title')}}</p>
                                        </div>
                                    </div>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @php
                $threeBlogCategories  = App\Models\BlogCategory::whereIsPublished(true)->limit(3)->get();
            @endphp
            @php
                $firstCategoryBlog = null;
                if(isset($threeBlogCategories[0])) {
                    $firstCategoryBlog = App\Models\Blog::whereIsPublished(true)->where("category_id",$threeBlogCategories[0]->id)->limit(3)->get();
                }
            @endphp
            @if($firstCategoryBlog!=null && count($firstCategoryBlog) >= 1)
            <section class="blog-feature-section">
                <div component-name="blog-feature-section" class="bfs-container bfs-box py-[30px] lg:py-[60px]">
                    <div class="flex flex-wrap htzxs:flex-nowrap items-center justify-between pb-8 bfs-title-container">
                        <h6 class="w-full htzxs:w-fit helvetica-normal text-darkgray me-body32 font-bold">{{isset($threeBlogCategories[0])?@langbind($threeBlogCategories[0],'name'):''}}</h6>
                        <a href="{{route('blog.list.category',['category_name'=>$threeBlogCategories[0]->name_en])}}"
                            class="helvetica-normal text-darkgray me-body16 font-bold px-5 py-[0.45rem] border border-darkgray rounded-[50px] hover:text-whitez hover:bg-blueMediq hover:border-blueMediq">
                            @lang('labels.read_more')
                        </a>
                    </div>
                    <div class="bfs-cardlist flex flex-wrap lg:flex-nowrap items-center">
                        @foreach($firstCategoryBlog as $data)
                        <div component-name="me-blog-card" class="blog-single-card">
                            <a href="{{route('blog.details',['category_name'=>$data->blogCategory->name_en,'slug'=>$data->slug_en])}}"
                                class="bc-link-card block bg-whitez rounded-[20px] hover:shadow-meblog mb-[10px] lg:mb-0 h-full 6xl:h-auto">
                                <div
                                    class="rounded-[20px] bg-whitez mb-[10px] lg:mb-0 h-full 6xl:h-auto bc-link-card--container">
                                    <img src="{{$data->main_image_url}}" alt="blog"
                                        class="w-full object-cover rounded-t-[20px] h-[280px] bc-link-card--container--img">
                                    <div class="bc-container py-5 px-6 lghtz:px-10 bc-link-card--container--des">
                                        <span
                                            class="bc-category text-whitez bg-blueMediq px-5 py-[4px] rounded-[50px] me-body14 mb-3.5 helvetica-normal">
                                            {{@langbind($data->blogCategory,'name')}}
                                        </span>
                                        <h3 class="font-bold pb-2.5 text-blueMediq me-title26 helvetica-normal bc-title">
                                            {{@langbind($data,'title')}}</h3>
                                        <p
                                            class="font-normal pb-2.5 me-body14 text-meA3 flex items-center justify-start helvetica-normal bc-date">
                                            {{ date('d-m-Y', strtotime($data->created_at)) }}<img src="{{asset('frontend/img/gray-dot.svg')}}" class="gray-dot mx-[5px]">{{@langbind($data->blogAuthor,'name')}}</p>
                                        <div class="font-normal me-body16 text-lightgray helvetica-normal bc-des">{!!@langbind($data,"desc")!!}</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
            @endif
            <section class="adv-section">
                <div component-name="me-only-image" class="me-only-image">
                    <img src="{{ isset($cmsdata->banner_image_1) ? asset($cmsdata->banner_image_1) : asset('frontend/img/blog-adv-Banner1.png')}}" alt="blog-adv-banner-img" class="object-cover w-full h-full">
                </div>
            </section>
            @php
            $secondCategoryBlog = null;
            if(isset($threeBlogCategories[1])) {
                $secondCategoryBlog = App\Models\Blog::whereIsPublished(true)->where("category_id",$threeBlogCategories[1]->id)->limit(3)->get();
            }
            @endphp
            @if($secondCategoryBlog!=null && count($secondCategoryBlog) >= 1)
            <section class="shopping-feature-section">
                <div component-name="blog-feature-section" class="bfs-container sf-box py-[30px] lg:py-[60px]">
                    <div class="flex flex-wrap htzxs:flex-nowrap items-center justify-between pb-8 bfs-title-container">
                        <h6 class="w-full htzxs:w-fit helvetica-normal text-darkgray me-body32 font-bold">{{isset($threeBlogCategories[1])?@langbind($threeBlogCategories[1],'name'):''}}
                        </h6>
                        <a href="{{route('blog.list.category',['category_name'=>$threeBlogCategories[1]->name_en])}}"
                            class="helvetica-normal text-darkgray me-body16 font-bold px-5 py-[0.45rem] border border-darkgray rounded-[50px] hover:text-whitez hover:bg-blueMediq hover:border-blueMediq">@lang('labels.read_more')</a>
                    </div>
                    <div class="bfs-cardlist flex flex-wrap lg:flex-nowrap items-center">
                        @foreach($secondCategoryBlog as $data)
                        <div component-name="me-blog-card" class="blog-single-card">
                            <a href="{{route('blog.details',['category_name'=>$data->blogCategory->name_en,'slug'=>$data->slug_en])}}"
                                class="bc-link-card block bg-whitez rounded-[20px] hover:shadow-meblog mb-[10px] lg:mb-0 h-full 6xl:h-auto">
                                <div
                                    class="rounded-[20px] bg-whitez mb-[10px] lg:mb-0 h-full 6xl:h-auto bc-link-card--container">
                                    <img src="{{$data->main_image_url}}" alt="blog"
                                        class="w-full object-cover rounded-t-[20px] h-[280px] bc-link-card--container--img">
                                    <div class="bc-container py-5 px-6 lghtz:px-10 bc-link-card--container--des">
                                        <span
                                            class="bc-category text-whitez bg-blueMediq px-5 py-[4px] rounded-[50px] me-body14 mb-3.5 helvetica-normal">
                                            {{@langbind($data->blogCategory,'name')}}
                                        </span>
                                        <h3 class="font-bold pb-2.5 text-blueMediq me-title26 helvetica-normal bc-title">
                                            {{@langbind($data,'title')}}</h3>
                                        <p
                                            class="font-normal pb-2.5 me-body14 text-meA3 flex items-center justify-start helvetica-normal bc-date">
                                            {{ date('d-m-Y', strtotime($data->created_at)) }}<img src="{{asset('frontend/img/gray-dot.svg')}}" class="gray-dot mx-[5px]"> {{@langbind($data->blogAuthor,'name')}}</p>
                                        <div class="font-normal me-body16 text-lightgray helvetica-normal bc-des">{!!@langbind($data,"desc")!!}</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
            @endif
            @php
            $thirdCategoryBlog = null;
            if(isset($threeBlogCategories[2])) {
                $thirdCategoryBlog = App\Models\Blog::whereIsPublished(true)->where("category_id",$threeBlogCategories[2]->id)->limit(3)->get();
            }
            @endphp
            @if($thirdCategoryBlog!=null && count($thirdCategoryBlog) >=1)
            <section class="health-section">
                <div component-name="blog-feature-section" class="bfs-container health-box py-[30px] lg:py-[60px]">
                    <div class="flex flex-wrap htzxs:flex-nowrap items-center justify-between pb-8 bfs-title-container">
                        <h6 class="w-full htzxs:w-fit helvetica-normal text-darkgray me-body32 font-bold">{{isset($threeBlogCategories[2])?@langbind($threeBlogCategories[2],'name'):''}}</h6>
                        <a href="{{route('blog.list.category',['category_name'=>$threeBlogCategories[2]->name_en])}}"
                            class="helvetica-normal text-darkgray me-body16 font-bold px-5 py-[0.45rem] border border-darkgray rounded-[50px] hover:text-whitez hover:bg-blueMediq hover:border-blueMediq">@lang('labels.read_more')</a>
                    </div>
                    <div class="bfs-cardlist flex flex-wrap lg:flex-nowrap items-center">

                        
                        @foreach($thirdCategoryBlog as $data)
                        <div component-name="me-blog-card" class="blog-single-card">
                            <a href="{{route('blog.details',['category_name'=>$data->blogCategory->name_en,'slug'=>$data->slug_en])}}"
                                class="bc-link-card block bg-whitez rounded-[20px] hover:shadow-meblog mb-[10px] lg:mb-0 h-full 6xl:h-auto">
                                <div
                                    class="rounded-[20px] bg-whitez mb-[10px] lg:mb-0 h-full 6xl:h-auto bc-link-card--container">
                                    <img src="{{$data->main_image_url}}" alt="blog"
                                        class="w-full object-cover rounded-t-[20px] h-[280px] bc-link-card--container--img">
                                    <div class="bc-container py-5 px-6 lghtz:px-10 bc-link-card--container--des">
                                        <span
                                            class="bc-category text-whitez bg-blueMediq px-5 py-[4px] rounded-[50px] me-body14 mb-3.5 helvetica-normal">
                                            {{@langbind($data->blogCategory,'name')}}
                                        </span>
                                        <h3 class="font-bold pb-2.5 text-blueMediq me-title26 helvetica-normal bc-title">
                                            {{@langbind($data,'title')}}</h3>
                                        <p
                                            class="font-normal pb-2.5 me-body14 text-meA3 flex items-center justify-start helvetica-normal bc-date">
                                            {{ date('d-m-Y', strtotime($data->created_at)) }}<img src="{{asset('frontend/img/gray-dot.svg')}}" class="gray-dot mx-[5px]"> {{@langbind($data->blogAuthor,'name')}}</p>
                                        <div class="font-normal me-body16 text-lightgray helvetica-normal bc-des">{!!@langbind($data,"desc")!!}</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach

                    </div>
                </div>
            </section>
            @endif
            <section class="adv-section">
                <div component-name="me-only-image" class="me-only-image">
                    <img src="{{ isset($cmsdata->banner_image_2) ? asset($cmsdata->banner_image_2) : asset('frontend/img/blog-adv-Banner2.png')}}" alt="blog-adv-banner-img" class="object-cover w-full h-full">
                </div>
            </section>
        </div>
        <!--**************************************************************************************************-->
        {{-- <div id="feature" class="bb-item hidden">
            <div component-name="me-blog-other-card"
                class="blog-gallery-container boc-container py-[30px] lg:pt-[60px] lg:pb-[90px]">

                <div component-name="me-subtitle-and-label-tag" class="slt-container">
                    <h3 class="helvetica-normal me-body32 text-darkgray font-bold">Subtopic</h3>
                    <ul class="mt-[20px] mslt-ul flex flex-wrap items-center justify-start">

                        <li
                            class="me-body18 helvetica-normal text-blueMediq bg-paleblue border border-blueMediq mr-[20px] mslt-item mb-[20px] rounded-[50px] px-[20px] py-[8px] leading-[21.6px] cursor-pointer hover:text-whitez hover:bg-blueMediq searched">
                            feature</li>

                    </ul>
                </div>


                <div class="flex flex-wrap md:flex-nowrap justify-between mt-[12px]">
                    <div class="blog-left basis-full md:basis-3/5">
                        <div class="pb-[30px]">
                            <div class="blog-single-card blog-big-image pb-[20px]">
                                <a href="#"
                                    class="bc-link-card block bg-whitez rounded-[20px] hover:shadow-meblog mb-[10px] lg:mb-0 h-full 6xl:h-auto">
                                    <div
                                        class="rounded-[20px] bg-whitez mb-[10px] lg:mb-0 h-full 6xl:h-auto bc-link-card--container">
                                        <img src="./img/big-image.png" alt="blog"
                                            class="w-full object-cover rounded-t-[20px] h-[580px] bc-link-card--container--img">
                                        <div class="bc-container py-5 px-6 lghtz:px-10 bc-link-card--container--des">
                                            <span
                                                class="bc-category text-whitez bg-blueMediq px-5 py-[4px] rounded-[50px] me-body14 mb-3.5 helvetica-normal">Featured</span>
                                            <h3
                                                class="font-bold pb-2.5 text-blueMediq me-title26 helvetica-normal bc-title">
                                                Porem ipsum dolor sit amet, consectetur adipiscing elit</h3>
                                            <p
                                                class="font-normal pb-2.5 me-body14 text-meA3 flex items-center justify-start helvetica-normal bc-date">
                                                June, 2020<img src="./img/gray-dot.svg" class="gray-dot mx-[5px]">Ryan J
                                            </p>
                                            <p class="font-normal me-body16 text-lightgray helvetica-normal bc-des">Jorem
                                                ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et
                                                velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad
                                                litora torquent per conubia nostra, per inceptos himenaeos.</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="flex flex-wrap items-center justify-between mboc-container">

                                <div component-name="me-blog-card" class="blog-single-card">
                                    <a href="#"
                                        class="bc-link-card block bg-whitez rounded-[20px] hover:shadow-meblog mb-[10px] lg:mb-0 h-full 6xl:h-auto">
                                        <div
                                            class="rounded-[20px] bg-whitez mb-[10px] lg:mb-0 h-full 6xl:h-auto bc-link-card--container">
                                            <img src="./img/big-image.png" alt="blog"
                                                class="w-full object-cover rounded-t-[20px] h-[280px] bc-link-card--container--img">
                                            <div class="bc-container py-5 px-6 lghtz:px-10 bc-link-card--container--des">
                                                <span
                                                    class="bc-category text-whitez bg-blueMediq px-5 py-[4px] rounded-[50px] me-body14 mb-3.5 helvetica-normal">Featured</span>
                                                <h3
                                                    class="font-bold pb-2.5 text-blueMediq me-title26 helvetica-normal bc-title">
                                                    Porem ipsum dolor sit amet, consectetur adipiscing elit</h3>
                                                <p
                                                    class="font-normal pb-2.5 me-body14 text-meA3 flex items-center justify-start helvetica-normal bc-date">
                                                    June, 2020<img src="./img/gray-dot.svg" class="gray-dot mx-[5px]">Ryan
                                                    J</p>
                                                <p class="font-normal me-body16 text-lightgray helvetica-normal bc-des">
                                                    Jorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate
                                                    libero et velit interdum, ac aliquet odio mattis. Class aptent taciti
                                                    sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div component-name="me-blog-card" class="blog-single-card">
                                    <a href="#"
                                        class="bc-link-card block bg-whitez rounded-[20px] hover:shadow-meblog mb-[10px] lg:mb-0 h-full 6xl:h-auto">
                                        <div
                                            class="rounded-[20px] bg-whitez mb-[10px] lg:mb-0 h-full 6xl:h-auto bc-link-card--container">
                                            <img src="./img/big-image.png" alt="blog"
                                                class="w-full object-cover rounded-t-[20px] h-[280px] bc-link-card--container--img">
                                            <div class="bc-container py-5 px-6 lghtz:px-10 bc-link-card--container--des">
                                                <span
                                                    class="bc-category text-whitez bg-blueMediq px-5 py-[4px] rounded-[50px] me-body14 mb-3.5 helvetica-normal">Featured</span>
                                                <h3
                                                    class="font-bold pb-2.5 text-blueMediq me-title26 helvetica-normal bc-title">
                                                    Porem ipsum dolor sit amet, consectetur adipiscing elit</h3>
                                                <p
                                                    class="font-normal pb-2.5 me-body14 text-meA3 flex items-center justify-start helvetica-normal bc-date">
                                                    June, 2020<img src="./img/gray-dot.svg" class="gray-dot mx-[5px]">Ryan
                                                    J</p>
                                                <p class="font-normal me-body16 text-lightgray helvetica-normal bc-des">
                                                    Jorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate
                                                    libero et velit interdum, ac aliquet odio mattis. Class aptent taciti
                                                    sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div component-name="me-blog-card" class="blog-single-card">
                                    <a href="#"
                                        class="bc-link-card block bg-whitez rounded-[20px] hover:shadow-meblog mb-[10px] lg:mb-0 h-full 6xl:h-auto">
                                        <div
                                            class="rounded-[20px] bg-whitez mb-[10px] lg:mb-0 h-full 6xl:h-auto bc-link-card--container">
                                            <img src="./img/big-image.png" alt="blog"
                                                class="w-full object-cover rounded-t-[20px] h-[280px] bc-link-card--container--img">
                                            <div class="bc-container py-5 px-6 lghtz:px-10 bc-link-card--container--des">
                                                <span
                                                    class="bc-category text-whitez bg-blueMediq px-5 py-[4px] rounded-[50px] me-body14 mb-3.5 helvetica-normal">Featured</span>
                                                <h3
                                                    class="font-bold pb-2.5 text-blueMediq me-title26 helvetica-normal bc-title">
                                                    Porem ipsum dolor sit amet, consectetur adipiscing elit</h3>
                                                <p
                                                    class="font-normal pb-2.5 me-body14 text-meA3 flex items-center justify-start helvetica-normal bc-date">
                                                    June, 2020<img src="./img/gray-dot.svg" class="gray-dot mx-[5px]">Ryan
                                                    J</p>
                                                <p class="font-normal me-body16 text-lightgray helvetica-normal bc-des">
                                                    Jorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate
                                                    libero et velit interdum, ac aliquet odio mattis. Class aptent taciti
                                                    sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div component-name="me-blog-card" class="blog-single-card">
                                    <a href="#"
                                        class="bc-link-card block bg-whitez rounded-[20px] hover:shadow-meblog mb-[10px] lg:mb-0 h-full 6xl:h-auto">
                                        <div
                                            class="rounded-[20px] bg-whitez mb-[10px] lg:mb-0 h-full 6xl:h-auto bc-link-card--container">
                                            <img src="./img/big-image.png" alt="blog"
                                                class="w-full object-cover rounded-t-[20px] h-[280px] bc-link-card--container--img">
                                            <div class="bc-container py-5 px-6 lghtz:px-10 bc-link-card--container--des">
                                                <span
                                                    class="bc-category text-whitez bg-blueMediq px-5 py-[4px] rounded-[50px] me-body14 mb-3.5 helvetica-normal">Featured</span>
                                                <h3
                                                    class="font-bold pb-2.5 text-blueMediq me-title26 helvetica-normal bc-title">
                                                    Porem ipsum dolor sit amet, consectetur adipiscing elit</h3>
                                                <p
                                                    class="font-normal pb-2.5 me-body14 text-meA3 flex items-center justify-start helvetica-normal bc-date">
                                                    June, 2020<img src="./img/gray-dot.svg" class="gray-dot mx-[5px]">Ryan
                                                    J</p>
                                                <p class="font-normal me-body16 text-lightgray helvetica-normal bc-des">
                                                    Jorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate
                                                    libero et velit interdum, ac aliquet odio mattis. Class aptent taciti
                                                    sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div component-name="me-blog-card" class="blog-single-card">
                                    <a href="#"
                                        class="bc-link-card block bg-whitez rounded-[20px] hover:shadow-meblog mb-[10px] lg:mb-0 h-full 6xl:h-auto">
                                        <div
                                            class="rounded-[20px] bg-whitez mb-[10px] lg:mb-0 h-full 6xl:h-auto bc-link-card--container">
                                            <img src="./img/big-image.png" alt="blog"
                                                class="w-full object-cover rounded-t-[20px] h-[280px] bc-link-card--container--img">
                                            <div class="bc-container py-5 px-6 lghtz:px-10 bc-link-card--container--des">
                                                <span
                                                    class="bc-category text-whitez bg-blueMediq px-5 py-[4px] rounded-[50px] me-body14 mb-3.5 helvetica-normal">Featured</span>
                                                <h3
                                                    class="font-bold pb-2.5 text-blueMediq me-title26 helvetica-normal bc-title">
                                                    Porem ipsum dolor sit amet, consectetur adipiscing elit</h3>
                                                <p
                                                    class="font-normal pb-2.5 me-body14 text-meA3 flex items-center justify-start helvetica-normal bc-date">
                                                    June, 2020<img src="./img/gray-dot.svg" class="gray-dot mx-[5px]">Ryan
                                                    J</p>
                                                <p class="font-normal me-body16 text-lightgray helvetica-normal bc-des">
                                                    Jorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate
                                                    libero et velit interdum, ac aliquet odio mattis. Class aptent taciti
                                                    sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div component-name="me-blog-card" class="blog-single-card">
                                    <a href="#"
                                        class="bc-link-card block bg-whitez rounded-[20px] hover:shadow-meblog mb-[10px] lg:mb-0 h-full 6xl:h-auto">
                                        <div
                                            class="rounded-[20px] bg-whitez mb-[10px] lg:mb-0 h-full 6xl:h-auto bc-link-card--container">
                                            <img src="./img/big-image.png" alt="blog"
                                                class="w-full object-cover rounded-t-[20px] h-[280px] bc-link-card--container--img">
                                            <div class="bc-container py-5 px-6 lghtz:px-10 bc-link-card--container--des">
                                                <span
                                                    class="bc-category text-whitez bg-blueMediq px-5 py-[4px] rounded-[50px] me-body14 mb-3.5 helvetica-normal">Featured</span>
                                                <h3
                                                    class="font-bold pb-2.5 text-blueMediq me-title26 helvetica-normal bc-title">
                                                    Porem ipsum dolor sit amet, consectetur adipiscing elit</h3>
                                                <p
                                                    class="font-normal pb-2.5 me-body14 text-meA3 flex items-center justify-start helvetica-normal bc-date">
                                                    June, 2020<img src="./img/gray-dot.svg" class="gray-dot mx-[5px]">Ryan
                                                    J</p>
                                                <p class="font-normal me-body16 text-lightgray helvetica-normal bc-des">
                                                    Jorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate
                                                    libero et velit interdum, ac aliquet odio mattis. Class aptent taciti
                                                    sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>
                        <div component-name="product-pagination"
                            class="product-list-pagination w-full flex flex-row items-center justify-center py-[30px]">
                            <a class="flex flex-row items-center text-darkgray me-body15 leading-[26px] opacity-60 helvetica-normal arrow"
                                href="#" id="prev">
                                <span class="rotate-180">
                                    <svg width="16" height="17" viewBox="0 0 16 17" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.89792 8.18177C9.89792 8.27066 9.88125 8.35688 9.84792 8.44044C9.81458 8.52399 9.77014 8.59333 9.71458 8.64844L6.64792 11.7151C6.52569 11.8373 6.37014 11.8984 6.18125 11.8984C5.99236 11.8984 5.83681 11.8373 5.71458 11.7151C5.59236 11.5929 5.53125 11.4373 5.53125 11.2484C5.53125 11.0595 5.59236 10.904 5.71458 10.7818L8.31458 8.18177L5.71458 5.58177C5.59236 5.45955 5.53125 5.30399 5.53125 5.1151C5.53125 4.92622 5.59236 4.77066 5.71458 4.64844C5.83681 4.52622 5.99236 4.4651 6.18125 4.4651C6.37014 4.4651 6.52569 4.52622 6.64792 4.64844L9.71458 7.7151C9.78125 7.78177 9.82858 7.85399 9.85658 7.93177C9.88458 8.00955 9.89836 8.09288 9.89792 8.18177Z"
                                            fill="#333333"></path>
                                    </svg>

                                </span>
                            </a>

                            <div class="flex flex-row flex-wrap items-center mx-2 2xs:mx-[29px] products-pagination">
                                <a class="w-[28px] 2xs:w-[35px] flex justify-center items-center helvetica-normal me-body15 text-lightgray bg-none rounded-md mr-[7px] last:mr-0 py-[2px] 2xs:py-[5px] px-[6px] 2xs:px-[15px] hover:text-darkgray pag active"
                                    data-id="1" id="pag-1" href="#">1</a>
                                <a class="w-[28px] 2xs:w-[35px] flex justify-center items-center helvetica-normal me-body15 text-lightgray bg-none rounded-md mr-[7px] last:mr-0 py-[2px] 2xs:py-[5px] px-[6px] 2xs:px-[15px] hover:text-darkgray pag"
                                    data-id="2" id="pag-2" href="#">2</a>
                                <a class="w-[28px] 2xs:w-[35px] flex justify-center items-center helvetica-normal me-body15 text-lightgray bg-none rounded-md mr-[7px] last:mr-0 py-[2px] 2xs:py-[5px] px-[6px] 2xs:px-[15px] hover:text-darkgray pag"
                                    data-id="3" id="pag-3" href="#">3</a>
                                <a class="w-[28px] 2xs:w-[35px] flex justify-center items-center helvetica-normal me-body15 text-lightgray bg-none rounded-md mr-[7px] last:mr-0 py-[2px] 2xs:py-[5px] px-[6px] 2xs:px-[15px] hover:text-darkgray pag"
                                    data-id="4" id="pag-4" href="#">4</a>
                                <a class="w-[28px] 2xs:w-[35px] flex justify-center items-center helvetica-normal me-body15 text-lightgray bg-none rounded-md mr-[7px] last:mr-0 py-[2px] 2xs:py-[5px] px-[6px] 2xs:px-[15px] hover:text-darkgray pag"
                                    data-id="5" id="pag-5" href="#">5</a>
                                <span class="pag-dot cursor-pointer px-[6px] 2xs:px-[15px] mr-[7px] last:mr-0">...</span>
                                <a class="w-[28px] 2xs:w-[35px] flex justify-center items-center helvetica-normal me-body15 text-lightgray bg-none rounded-md mr-[7px] last:mr-0 py-[2px] 2xs:py-[5px] px-[6px] 2xs:px-[15px] hover:text-darkgray pag"
                                    data-id="10" id="pag-10" href="#">10</a>
                            </div>

                            <a class="flex flex-row items-center text-darkgray me-body15 leading-[26px] helvetica-normal arrow"
                                href="#" id="next">
                                <span class="">
                                    <svg width="16" height="17" viewBox="0 0 16 17" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.89792 8.18177C9.89792 8.27066 9.88125 8.35688 9.84792 8.44044C9.81458 8.52399 9.77014 8.59333 9.71458 8.64844L6.64792 11.7151C6.52569 11.8373 6.37014 11.8984 6.18125 11.8984C5.99236 11.8984 5.83681 11.8373 5.71458 11.7151C5.59236 11.5929 5.53125 11.4373 5.53125 11.2484C5.53125 11.0595 5.59236 10.904 5.71458 10.7818L8.31458 8.18177L5.71458 5.58177C5.59236 5.45955 5.53125 5.30399 5.53125 5.1151C5.53125 4.92622 5.59236 4.77066 5.71458 4.64844C5.83681 4.52622 5.99236 4.4651 6.18125 4.4651C6.37014 4.4651 6.52569 4.52622 6.64792 4.64844L9.71458 7.7151C9.78125 7.78177 9.82858 7.85399 9.85658 7.93177C9.88458 8.00955 9.89836 8.09288 9.89792 8.18177Z"
                                            fill="#333333"></path>
                                    </svg>

                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="blog-right md:pl-[25px] xl:pl-[45px] basis-full md:basis-2/5">
                        <div component-name="me-popular-card" class="py-[32px] rounded-[20px] shadow-blog">
                            <div class="px-[32px]">
                                <h6 class="text-darkgray font-bold me-body26 helvetica-normal">Popular Articles</h6>
                            </div>
                            <div class="pt-[16px]">

                                <a href="#"
                                    class="flex items-center px-[32px] py-[10px] group hover:bg-far hover:text-darkgray popular-link">
                                    <div class="w-[120px] h-[50px] xl:h-[67px] rounded-[4px] mr-[20px] bg-cover bg-no-repeat popular-link--img"
                                        style="background-image: url('./img/big-image.png');">
                                    </div>
                                    <p
                                        class="text-lightgray helvetica-normal me-body18 leading-[21.6px] group-hover:text-darkgray popular-link--title">
                                        Forem ipsum dolor sit amet, consectur adipiscing elit
                                    </p>
                                </a>

                                <a href="#"
                                    class="flex items-center px-[32px] py-[10px] group hover:bg-far hover:text-darkgray popular-link">
                                    <div class="w-[120px] h-[50px] xl:h-[67px] rounded-[4px] mr-[20px] bg-cover bg-no-repeat popular-link--img"
                                        style="background-image: url('./img/big-image.png');">
                                    </div>
                                    <p
                                        class="text-lightgray helvetica-normal me-body18 leading-[21.6px] group-hover:text-darkgray popular-link--title">
                                        Forem ipsum dolor sit amet, consectur adipiscing elit
                                    </p>
                                </a>

                                <a href="#"
                                    class="flex items-center px-[32px] py-[10px] group hover:bg-far hover:text-darkgray popular-link">
                                    <div class="w-[120px] h-[50px] xl:h-[67px] rounded-[4px] mr-[20px] bg-cover bg-no-repeat popular-link--img"
                                        style="background-image: url('./img/big-image.png');">
                                    </div>
                                    <p
                                        class="text-lightgray helvetica-normal me-body18 leading-[21.6px] group-hover:text-darkgray popular-link--title">
                                        Forem ipsum dolor sit amet, consectur adipiscing elit
                                    </p>
                                </a>

                                <a href="#"
                                    class="flex items-center px-[32px] py-[10px] group hover:bg-far hover:text-darkgray popular-link">
                                    <div class="w-[120px] h-[50px] xl:h-[67px] rounded-[4px] mr-[20px] bg-cover bg-no-repeat popular-link--img"
                                        style="background-image: url('./img/big-image.png');">
                                    </div>
                                    <p
                                        class="text-lightgray helvetica-normal me-body18 leading-[21.6px] group-hover:text-darkgray popular-link--title">
                                        Forem ipsum dolor sit amet, consectur adipiscing elit
                                    </p>
                                </a>

                                <a href="#"
                                    class="flex items-center px-[32px] py-[10px] group hover:bg-far hover:text-darkgray popular-link">
                                    <div class="w-[120px] h-[50px] xl:h-[67px] rounded-[4px] mr-[20px] bg-cover bg-no-repeat popular-link--img"
                                        style="background-image: url('./img/big-image.png');">
                                    </div>
                                    <p
                                        class="text-lightgray helvetica-normal me-body18 leading-[21.6px] group-hover:text-darkgray popular-link--title">
                                        Forem ipsum dolor sit amet, consectur adipiscing elit
                                    </p>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!--**************************************************************************************************-->
        {{-- <div id="search-result" class="bb-item">
            <div component-name="me-blog-other-card"
                class="blog-gallery-container boc-container py-[30px] lg:pt-[60px] lg:pb-[90px]">

                <div component-name="me-subtitle-and-label-tag" class="slt-container">
                    <h3 class="helvetica-normal me-body32 text-darkgray font-bold">Related Keyword</h3>
                    <ul class="mt-[20px] mslt-ul flex flex-wrap items-center justify-start">

                        <li
                            class="me-body18 helvetica-normal text-blueMediq bg-paleblue border border-blueMediq mr-[20px] mslt-item mb-[20px] rounded-[50px] px-[20px] py-[8px] leading-[21.6px] cursor-pointer hover:text-whitez hover:bg-blueMediq searched">
                            body</li>

                    </ul>
                </div>


                <div class="flex flex-wrap md:flex-nowrap justify-between mt-[12px]">
                    <div class="blog-left basis-full md:basis-3/5">
                        <div class="pb-[30px]">
                            <div class="blog-single-card blog-big-image pb-[20px]">
                                <a href="#"
                                    class="bc-link-card block bg-whitez rounded-[20px] hover:shadow-meblog mb-[10px] lg:mb-0 h-full 6xl:h-auto">
                                    <div
                                        class="rounded-[20px] bg-whitez mb-[10px] lg:mb-0 h-full 6xl:h-auto bc-link-card--container">
                                        <img src="./img/big-image.png" alt="blog"
                                            class="w-full object-cover rounded-t-[20px] h-[580px] bc-link-card--container--img">
                                        <div class="bc-container py-5 px-6 lghtz:px-10 bc-link-card--container--des">
                                            <span
                                                class="bc-category text-whitez bg-blueMediq px-5 py-[4px] rounded-[50px] me-body14 mb-3.5 helvetica-normal">Featured</span>
                                            <h3
                                                class="font-bold pb-2.5 text-blueMediq me-title26 helvetica-normal bc-title">
                                                Porem ipsum dolor sit amet, consectetur adipiscing elit</h3>
                                            <p
                                                class="font-normal pb-2.5 me-body14 text-meA3 flex items-center justify-start helvetica-normal bc-date">
                                                June, 2020<img src="./img/gray-dot.svg" class="gray-dot mx-[5px]">Ryan J
                                            </p>
                                            <p class="font-normal me-body16 text-lightgray helvetica-normal bc-des">Jorem
                                                ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et
                                                velit interdum, ac aliquet odio mattis. Class aptent taciti sociosqu ad
                                                litora torquent per conubia nostra, per inceptos himenaeos.</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="flex flex-wrap items-center justify-between mboc-container">

                                <div component-name="me-blog-card" class="blog-single-card">
                                    <a href="#"
                                        class="bc-link-card block bg-whitez rounded-[20px] hover:shadow-meblog mb-[10px] lg:mb-0 h-full 6xl:h-auto">
                                        <div
                                            class="rounded-[20px] bg-whitez mb-[10px] lg:mb-0 h-full 6xl:h-auto bc-link-card--container">
                                            <img src="./img/big-image.png" alt="blog"
                                                class="w-full object-cover rounded-t-[20px] h-[280px] bc-link-card--container--img">
                                            <div class="bc-container py-5 px-6 lghtz:px-10 bc-link-card--container--des">
                                                <span
                                                    class="bc-category text-whitez bg-blueMediq px-5 py-[4px] rounded-[50px] me-body14 mb-3.5 helvetica-normal">Featured</span>
                                                <h3
                                                    class="font-bold pb-2.5 text-blueMediq me-title26 helvetica-normal bc-title">
                                                    Porem ipsum dolor sit amet, consectetur adipiscing elit</h3>
                                                <p
                                                    class="font-normal pb-2.5 me-body14 text-meA3 flex items-center justify-start helvetica-normal bc-date">
                                                    June, 2020<img src="./img/gray-dot.svg" class="gray-dot mx-[5px]">Ryan
                                                    J</p>
                                                <p class="font-normal me-body16 text-lightgray helvetica-normal bc-des">
                                                    Jorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate
                                                    libero et velit interdum, ac aliquet odio mattis. Class aptent taciti
                                                    sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div component-name="me-blog-card" class="blog-single-card">
                                    <a href="#"
                                        class="bc-link-card block bg-whitez rounded-[20px] hover:shadow-meblog mb-[10px] lg:mb-0 h-full 6xl:h-auto">
                                        <div
                                            class="rounded-[20px] bg-whitez mb-[10px] lg:mb-0 h-full 6xl:h-auto bc-link-card--container">
                                            <img src="./img/big-image.png" alt="blog"
                                                class="w-full object-cover rounded-t-[20px] h-[280px] bc-link-card--container--img">
                                            <div class="bc-container py-5 px-6 lghtz:px-10 bc-link-card--container--des">
                                                <span
                                                    class="bc-category text-whitez bg-blueMediq px-5 py-[4px] rounded-[50px] me-body14 mb-3.5 helvetica-normal">Featured</span>
                                                <h3
                                                    class="font-bold pb-2.5 text-blueMediq me-title26 helvetica-normal bc-title">
                                                    Porem ipsum dolor sit amet, consectetur adipiscing elit</h3>
                                                <p
                                                    class="font-normal pb-2.5 me-body14 text-meA3 flex items-center justify-start helvetica-normal bc-date">
                                                    June, 2020<img src="./img/gray-dot.svg" class="gray-dot mx-[5px]">Ryan
                                                    J</p>
                                                <p class="font-normal me-body16 text-lightgray helvetica-normal bc-des">
                                                    Jorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate
                                                    libero et velit interdum, ac aliquet odio mattis. Class aptent taciti
                                                    sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div component-name="me-blog-card" class="blog-single-card">
                                    <a href="#"
                                        class="bc-link-card block bg-whitez rounded-[20px] hover:shadow-meblog mb-[10px] lg:mb-0 h-full 6xl:h-auto">
                                        <div
                                            class="rounded-[20px] bg-whitez mb-[10px] lg:mb-0 h-full 6xl:h-auto bc-link-card--container">
                                            <img src="./img/big-image.png" alt="blog"
                                                class="w-full object-cover rounded-t-[20px] h-[280px] bc-link-card--container--img">
                                            <div class="bc-container py-5 px-6 lghtz:px-10 bc-link-card--container--des">
                                                <span
                                                    class="bc-category text-whitez bg-blueMediq px-5 py-[4px] rounded-[50px] me-body14 mb-3.5 helvetica-normal">Featured</span>
                                                <h3
                                                    class="font-bold pb-2.5 text-blueMediq me-title26 helvetica-normal bc-title">
                                                    Porem ipsum dolor sit amet, consectetur adipiscing elit</h3>
                                                <p
                                                    class="font-normal pb-2.5 me-body14 text-meA3 flex items-center justify-start helvetica-normal bc-date">
                                                    June, 2020<img src="./img/gray-dot.svg" class="gray-dot mx-[5px]">Ryan
                                                    J</p>
                                                <p class="font-normal me-body16 text-lightgray helvetica-normal bc-des">
                                                    Jorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate
                                                    libero et velit interdum, ac aliquet odio mattis. Class aptent taciti
                                                    sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div component-name="me-blog-card" class="blog-single-card">
                                    <a href="#"
                                        class="bc-link-card block bg-whitez rounded-[20px] hover:shadow-meblog mb-[10px] lg:mb-0 h-full 6xl:h-auto">
                                        <div
                                            class="rounded-[20px] bg-whitez mb-[10px] lg:mb-0 h-full 6xl:h-auto bc-link-card--container">
                                            <img src="./img/big-image.png" alt="blog"
                                                class="w-full object-cover rounded-t-[20px] h-[280px] bc-link-card--container--img">
                                            <div class="bc-container py-5 px-6 lghtz:px-10 bc-link-card--container--des">
                                                <span
                                                    class="bc-category text-whitez bg-blueMediq px-5 py-[4px] rounded-[50px] me-body14 mb-3.5 helvetica-normal">Featured</span>
                                                <h3
                                                    class="font-bold pb-2.5 text-blueMediq me-title26 helvetica-normal bc-title">
                                                    Porem ipsum dolor sit amet, consectetur adipiscing elit</h3>
                                                <p
                                                    class="font-normal pb-2.5 me-body14 text-meA3 flex items-center justify-start helvetica-normal bc-date">
                                                    June, 2020<img src="./img/gray-dot.svg" class="gray-dot mx-[5px]">Ryan
                                                    J</p>
                                                <p class="font-normal me-body16 text-lightgray helvetica-normal bc-des">
                                                    Jorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate
                                                    libero et velit interdum, ac aliquet odio mattis. Class aptent taciti
                                                    sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div component-name="me-blog-card" class="blog-single-card">
                                    <a href="#"
                                        class="bc-link-card block bg-whitez rounded-[20px] hover:shadow-meblog mb-[10px] lg:mb-0 h-full 6xl:h-auto">
                                        <div
                                            class="rounded-[20px] bg-whitez mb-[10px] lg:mb-0 h-full 6xl:h-auto bc-link-card--container">
                                            <img src="./img/big-image.png" alt="blog"
                                                class="w-full object-cover rounded-t-[20px] h-[280px] bc-link-card--container--img">
                                            <div class="bc-container py-5 px-6 lghtz:px-10 bc-link-card--container--des">
                                                <span
                                                    class="bc-category text-whitez bg-blueMediq px-5 py-[4px] rounded-[50px] me-body14 mb-3.5 helvetica-normal">Featured</span>
                                                <h3
                                                    class="font-bold pb-2.5 text-blueMediq me-title26 helvetica-normal bc-title">
                                                    Porem ipsum dolor sit amet, consectetur adipiscing elit</h3>
                                                <p
                                                    class="font-normal pb-2.5 me-body14 text-meA3 flex items-center justify-start helvetica-normal bc-date">
                                                    June, 2020<img src="./img/gray-dot.svg" class="gray-dot mx-[5px]">Ryan
                                                    J</p>
                                                <p class="font-normal me-body16 text-lightgray helvetica-normal bc-des">
                                                    Jorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate
                                                    libero et velit interdum, ac aliquet odio mattis. Class aptent taciti
                                                    sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div component-name="me-blog-card" class="blog-single-card">
                                    <a href="#"
                                        class="bc-link-card block bg-whitez rounded-[20px] hover:shadow-meblog mb-[10px] lg:mb-0 h-full 6xl:h-auto">
                                        <div
                                            class="rounded-[20px] bg-whitez mb-[10px] lg:mb-0 h-full 6xl:h-auto bc-link-card--container">
                                            <img src="./img/big-image.png" alt="blog"
                                                class="w-full object-cover rounded-t-[20px] h-[280px] bc-link-card--container--img">
                                            <div class="bc-container py-5 px-6 lghtz:px-10 bc-link-card--container--des">
                                                <span
                                                    class="bc-category text-whitez bg-blueMediq px-5 py-[4px] rounded-[50px] me-body14 mb-3.5 helvetica-normal">Featured</span>
                                                <h3
                                                    class="font-bold pb-2.5 text-blueMediq me-title26 helvetica-normal bc-title">
                                                    Porem ipsum dolor sit amet, consectetur adipiscing elit</h3>
                                                <p
                                                    class="font-normal pb-2.5 me-body14 text-meA3 flex items-center justify-start helvetica-normal bc-date">
                                                    June, 2020<img src="./img/gray-dot.svg" class="gray-dot mx-[5px]">Ryan
                                                    J</p>
                                                <p class="font-normal me-body16 text-lightgray helvetica-normal bc-des">
                                                    Jorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate
                                                    libero et velit interdum, ac aliquet odio mattis. Class aptent taciti
                                                    sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>
                        <div component-name="product-pagination"
                            class="product-list-pagination w-full flex flex-row items-center justify-center py-[30px]">
                            <a class="flex flex-row items-center text-darkgray me-body15 leading-[26px] opacity-60 helvetica-normal arrow"
                                href="#" id="prev">
                                <span class="rotate-180">
                                    <svg width="16" height="17" viewBox="0 0 16 17" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.89792 8.18177C9.89792 8.27066 9.88125 8.35688 9.84792 8.44044C9.81458 8.52399 9.77014 8.59333 9.71458 8.64844L6.64792 11.7151C6.52569 11.8373 6.37014 11.8984 6.18125 11.8984C5.99236 11.8984 5.83681 11.8373 5.71458 11.7151C5.59236 11.5929 5.53125 11.4373 5.53125 11.2484C5.53125 11.0595 5.59236 10.904 5.71458 10.7818L8.31458 8.18177L5.71458 5.58177C5.59236 5.45955 5.53125 5.30399 5.53125 5.1151C5.53125 4.92622 5.59236 4.77066 5.71458 4.64844C5.83681 4.52622 5.99236 4.4651 6.18125 4.4651C6.37014 4.4651 6.52569 4.52622 6.64792 4.64844L9.71458 7.7151C9.78125 7.78177 9.82858 7.85399 9.85658 7.93177C9.88458 8.00955 9.89836 8.09288 9.89792 8.18177Z"
                                            fill="#333333"></path>
                                    </svg>

                                </span>
                            </a>

                            <div class="flex flex-row flex-wrap items-center mx-2 2xs:mx-[29px] products-pagination">
                                <a class="w-[28px] 2xs:w-[35px] flex justify-center items-center helvetica-normal me-body15 text-lightgray bg-none rounded-md mr-[7px] last:mr-0 py-[2px] 2xs:py-[5px] px-[6px] 2xs:px-[15px] hover:text-darkgray pag active"
                                    data-id="1" id="pag-1" href="#">1</a>
                                <a class="w-[28px] 2xs:w-[35px] flex justify-center items-center helvetica-normal me-body15 text-lightgray bg-none rounded-md mr-[7px] last:mr-0 py-[2px] 2xs:py-[5px] px-[6px] 2xs:px-[15px] hover:text-darkgray pag"
                                    data-id="2" id="pag-2" href="#">2</a>
                                <a class="w-[28px] 2xs:w-[35px] flex justify-center items-center helvetica-normal me-body15 text-lightgray bg-none rounded-md mr-[7px] last:mr-0 py-[2px] 2xs:py-[5px] px-[6px] 2xs:px-[15px] hover:text-darkgray pag"
                                    data-id="3" id="pag-3" href="#">3</a>
                                <a class="w-[28px] 2xs:w-[35px] flex justify-center items-center helvetica-normal me-body15 text-lightgray bg-none rounded-md mr-[7px] last:mr-0 py-[2px] 2xs:py-[5px] px-[6px] 2xs:px-[15px] hover:text-darkgray pag"
                                    data-id="4" id="pag-4" href="#">4</a>
                                <a class="w-[28px] 2xs:w-[35px] flex justify-center items-center helvetica-normal me-body15 text-lightgray bg-none rounded-md mr-[7px] last:mr-0 py-[2px] 2xs:py-[5px] px-[6px] 2xs:px-[15px] hover:text-darkgray pag"
                                    data-id="5" id="pag-5" href="#">5</a>
                                <span class="pag-dot cursor-pointer px-[6px] 2xs:px-[15px] mr-[7px] last:mr-0">...</span>
                                <a class="w-[28px] 2xs:w-[35px] flex justify-center items-center helvetica-normal me-body15 text-lightgray bg-none rounded-md mr-[7px] last:mr-0 py-[2px] 2xs:py-[5px] px-[6px] 2xs:px-[15px] hover:text-darkgray pag"
                                    data-id="10" id="pag-10" href="#">10</a>
                            </div>

                            <a class="flex flex-row items-center text-darkgray me-body15 leading-[26px] helvetica-normal arrow"
                                href="#" id="next">
                                <span class="">
                                    <svg width="16" height="17" viewBox="0 0 16 17" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.89792 8.18177C9.89792 8.27066 9.88125 8.35688 9.84792 8.44044C9.81458 8.52399 9.77014 8.59333 9.71458 8.64844L6.64792 11.7151C6.52569 11.8373 6.37014 11.8984 6.18125 11.8984C5.99236 11.8984 5.83681 11.8373 5.71458 11.7151C5.59236 11.5929 5.53125 11.4373 5.53125 11.2484C5.53125 11.0595 5.59236 10.904 5.71458 10.7818L8.31458 8.18177L5.71458 5.58177C5.59236 5.45955 5.53125 5.30399 5.53125 5.1151C5.53125 4.92622 5.59236 4.77066 5.71458 4.64844C5.83681 4.52622 5.99236 4.4651 6.18125 4.4651C6.37014 4.4651 6.52569 4.52622 6.64792 4.64844L9.71458 7.7151C9.78125 7.78177 9.82858 7.85399 9.85658 7.93177C9.88458 8.00955 9.89836 8.09288 9.89792 8.18177Z"
                                            fill="#333333"></path>
                                    </svg>

                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="blog-right md:pl-[25px] xl:pl-[45px] basis-full md:basis-2/5">
                        <div component-name="me-popular-card" class="py-[32px] rounded-[20px] shadow-blog">
                            <div class="px-[32px]">
                                <h6 class="text-darkgray font-bold me-body26 helvetica-normal">Popular Articles</h6>
                            </div>
                            <div class="pt-[16px]">

                                <a href="#"
                                    class="flex items-center px-[32px] py-[10px] group hover:bg-far hover:text-darkgray popular-link">
                                    <div class="w-[120px] h-[50px] xl:h-[67px] rounded-[4px] mr-[20px] bg-cover bg-no-repeat popular-link--img"
                                        style="background-image: url('./img/big-image.png');">
                                    </div>
                                    <p
                                        class="text-lightgray helvetica-normal me-body18 leading-[21.6px] group-hover:text-darkgray popular-link--title">
                                        Forem ipsum dolor sit amet, consectur adipiscing elit
                                    </p>
                                </a>

                                <a href="#"
                                    class="flex items-center px-[32px] py-[10px] group hover:bg-far hover:text-darkgray popular-link">
                                    <div class="w-[120px] h-[50px] xl:h-[67px] rounded-[4px] mr-[20px] bg-cover bg-no-repeat popular-link--img"
                                        style="background-image: url('./img/big-image.png');">
                                    </div>
                                    <p
                                        class="text-lightgray helvetica-normal me-body18 leading-[21.6px] group-hover:text-darkgray popular-link--title">
                                        Forem ipsum dolor sit amet, consectur adipiscing elit
                                    </p>
                                </a>

                                <a href="#"
                                    class="flex items-center px-[32px] py-[10px] group hover:bg-far hover:text-darkgray popular-link">
                                    <div class="w-[120px] h-[50px] xl:h-[67px] rounded-[4px] mr-[20px] bg-cover bg-no-repeat popular-link--img"
                                        style="background-image: url('./img/big-image.png');">
                                    </div>
                                    <p
                                        class="text-lightgray helvetica-normal me-body18 leading-[21.6px] group-hover:text-darkgray popular-link--title">
                                        Forem ipsum dolor sit amet, consectur adipiscing elit
                                    </p>
                                </a>

                                <a href="#"
                                    class="flex items-center px-[32px] py-[10px] group hover:bg-far hover:text-darkgray popular-link">
                                    <div class="w-[120px] h-[50px] xl:h-[67px] rounded-[4px] mr-[20px] bg-cover bg-no-repeat popular-link--img"
                                        style="background-image: url('./img/big-image.png');">
                                    </div>
                                    <p
                                        class="text-lightgray helvetica-normal me-body18 leading-[21.6px] group-hover:text-darkgray popular-link--title">
                                        Forem ipsum dolor sit amet, consectur adipiscing elit
                                    </p>
                                </a>

                                <a href="#"
                                    class="flex items-center px-[32px] py-[10px] group hover:bg-far hover:text-darkgray popular-link">
                                    <div class="w-[120px] h-[50px] xl:h-[67px] rounded-[4px] mr-[20px] bg-cover bg-no-repeat popular-link--img"
                                        style="background-image: url('./img/big-image.png');">
                                    </div>
                                    <p
                                        class="text-lightgray helvetica-normal me-body18 leading-[21.6px] group-hover:text-darkgray popular-link--title">
                                        Forem ipsum dolor sit amet, consectur adipiscing elit
                                    </p>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div id="blogSubscribe" component-name="me-blog-subscribe-popup" class="fixed bottom-0 left-0 right-0 w-full z-[1001] pointer-events-none mbsp-container">
            <div class="blog-subscribe-container bg-blueMediq rounded-[20px] h-[130px] pointer-events-auto">
                <div class="relative text-whitez helvetica-normal pl-[40px] pr-[32px] h-full flex items-center justify-between mbsp-main-box" style="background-image: url({{isset($cmsdata->subscribe_image) ? asset($cmsdata->subscribe_image) : asset('frontend/img/blog-img.png') }});">
                    <div class="des-container w-full max-w-[560px]">
                        {!! @langbind($cmsdata,'desc') !!}
                    </div>
                    <div class="flex items-stretch justify-start subscribe-container w-full max-w-[400px] xlhtz:max-w-[430px] 2xl:max-w-[480px] 4xl:max-w-[500px] 5xl:max-w-[578px]">
                        <input type="text" id="subscriber_email" class="text-darkgray placeholder:text-lightgray helvetica-normal me-body18 rounded-l-[4px] h-[50px] w-full max-w-[459px] px-[20px] rounded-s-[4px]" placeholder="@lang('labels.blog.your_email_address')">
                        <button id="mail_subscriber" class="text-whitez helvetica-normal me-body18 font-bold bg-orangeMediq hover:bg-brightOrangeMediq px-[20px] rounded-r-[8px]">@lang('labels.blog.subscribe')</button>
                    </div>
                    {{-- <p class='text-mered me-body14'>Error !</p> --}}
                    <img src="{{asset('frontend/img/lr_round-close.svg')}}" alt="close icon" class="absolute top-[5px] right-[10px] cursor-pointer mbsp-close-btn cus-invert-white">
                </div>
            </div>
          
        </div>
        @include('frontend.include.product-compare-box')
    </main>
@endsection
@push('scripts')
    <script>
        $("#keyword").keyup(function(event) {
            if (event.keyCode === 13) {
                $(".keyword-search-btn").click();
            }
        });

        $(document).ready(function() {
            let lng = "{{ Request::segment(1) }}";
            $("body").on("click",".keyword-search-btn",function(){
                if(lng!=""){
                    if(lng!="blog") {
                    window.location.href = "../../"+lng+"/blog/search/"+$("#keyword").val();
                    }
                    window.location.href = "../../blog/search/"+$("#keyword").val();
                }else{
                    window.location.href = "../../blog/search/"+$("#keyword").val();
                }
            });
        });
    </script>
    <script src="{{ asset('frontend/custom/product-compare.js') }}"></script>
@endpush

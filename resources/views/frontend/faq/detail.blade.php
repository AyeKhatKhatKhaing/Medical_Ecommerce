@extends('frontend.layouts.master')
@section('content')
    @include('frontend.faq.nav')
    <div class="mt-[30px] lg:mt-[60px] faq-content-container faqinner">
        <div component-name="faq-header-section" class="faq-header-section-container">
            <div class="faq-header-section-content flex md:flex-nowrap flex-wrap-reverse">
                <div class="md:max-w-[450px] max-w-full md:w-auto w-full lg:mr-10 md:mr-5 md:my-0 my-1">
                    <div class="flex flex-wrap 2xl:w-[410px] lg:w-[320px] md:w-[230px] w-full">
                        <div class="flex w-full">
                            <div class="border-1 border-meA3 lg:px-5 px-2 py-2 rounded-tl-lg rounded-bl-lg w-full">
                                <input type="text" placeholder="@lang('labels.faq.search2')" id="searchKeyword" autocomplete="off"
                                    class="placeholder:text-lightgray text-darkgray me-body18 font-normal w-full focus:outline-none border-0 focus-visible:outline-none" />
                                <input type="hidden" value="{{ $faq->category_id }}" id="category_id">
                            </div>
                            <div class="bg-blueMediq rounded-tr-lg rounded-br-lg w-[56px] flex justify-center items-center">
                                <button class="h-full lg:px-5 px-3 search">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 18 18" fill="none">
                                        <path
                                            d="M17.0004 17.0004L12.9504 12.9504M12.9504 12.9504C13.6004 12.3003 14.116 11.5286 14.4678 10.6793C14.8196 9.82995 15.0007 8.91966 15.0007 8.00036C15.0007 7.08106 14.8196 6.17076 14.4678 5.32144C14.116 4.47211 13.6004 3.7004 12.9504 3.05036C12.3003 2.40031 11.5286 1.88467 10.6793 1.53287C9.82995 1.18107 8.91966 1 8.00036 1C7.08106 1 6.17076 1.18107 5.32144 1.53287C4.47211 1.88467 3.7004 2.40031 3.05036 3.05036C1.73754 4.36318 1 6.14375 1 8.00036C1 9.85697 1.73754 11.6375 3.05036 12.9504C4.36318 14.2632 6.14375 15.0007 8.00036 15.0007C9.85697 15.0007 11.6375 14.2632 12.9504 12.9504Z"
                                            stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap items-center md:my-0 my-1">

                    <p class="font-normal me-body16 text-darkgray mr-[10px] faq-header-link ">
                        <a href="{{ route('faq') }}">
                            @lang('labels.header.help')
                        </a>
                    </p>
                    <div class="mr-[10px] ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17"
                            fill="none">
                            <path
                                d="M6.51612 12.4718C6.36455 12.4015 6.2958 12.2249 6.35987 12.0671C6.37705 12.0249 6.86924 11.5249 8.14424 10.2561L9.90674 8.50145L8.14424 6.74833C6.86768 5.47645 6.37705 4.97801 6.35987 4.93583C6.34737 4.90301 6.33643 4.84833 6.33643 4.81395C6.33643 4.58895 6.56455 4.43739 6.76612 4.53114C6.85518 4.57333 10.5802 8.28114 10.6192 8.36864C10.6567 8.44833 10.6567 8.55458 10.6192 8.63426C10.5802 8.72176 6.85518 12.4296 6.76612 12.4718C6.68643 12.5093 6.5958 12.5093 6.51612 12.4718Z"
                                fill="#333333" />
                        </svg>
                    </div>

                    <p class="font-normal me-body16 text-darkgray mr-[10px] faq-header-link ">
                        <a href="{{ langlink('helpcenter-category?category=' . $faq->category_id) }}">
                            {{ langbind($faq->category, 'name') }}
                        </a>
                    </p>

                    <div class="mr-[10px] ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17"
                            fill="none">
                            <path
                                d="M6.51612 12.4718C6.36455 12.4015 6.2958 12.2249 6.35987 12.0671C6.37705 12.0249 6.86924 11.5249 8.14424 10.2561L9.90674 8.50145L8.14424 6.74833C6.86768 5.47645 6.37705 4.97801 6.35987 4.93583C6.34737 4.90301 6.33643 4.84833 6.33643 4.81395C6.33643 4.58895 6.56455 4.43739 6.76612 4.53114C6.85518 4.57333 10.5802 8.28114 10.6192 8.36864C10.6567 8.44833 10.6567 8.55458 10.6192 8.63426C10.5802 8.72176 6.85518 12.4296 6.76612 12.4718C6.68643 12.5093 6.5958 12.5093 6.51612 12.4718Z"
                                fill="#333333" />
                        </svg>
                    </div>
                    <p class="font-normal me-body16 text-darkgray mr-[10px] faq-header-link ">
                        <a href="{{ langlink('helpcenter-category?subCategory=' . $faq->sub_category_id) }}">
                            {{ langbind($faq->subCategory, 'sub_name') }}
                        </a>
                    </p>
                    <div class="mr-[10px] ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17"
                            fill="none">
                            <path
                                d="M6.51612 12.4718C6.36455 12.4015 6.2958 12.2249 6.35987 12.0671C6.37705 12.0249 6.86924 11.5249 8.14424 10.2561L9.90674 8.50145L8.14424 6.74833C6.86768 5.47645 6.37705 4.97801 6.35987 4.93583C6.34737 4.90301 6.33643 4.84833 6.33643 4.81395C6.33643 4.58895 6.56455 4.43739 6.76612 4.53114C6.85518 4.57333 10.5802 8.28114 10.6192 8.36864C10.6567 8.44833 10.6567 8.55458 10.6192 8.63426C10.5802 8.72176 6.85518 12.4296 6.76612 12.4718C6.68643 12.5093 6.5958 12.5093 6.51612 12.4718Z"
                                fill="#333333" />
                        </svg>
                    </div>

                    <p class="font-normal me-body16 text-darkgray mr-[10px] faq-header-link active">
                        {{ langbind($faq, 'name') }}
                    </p>
                    <div class="mr-[10px] hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17"
                            fill="none">
                            <path
                                d="M6.51612 12.4718C6.36455 12.4015 6.2958 12.2249 6.35987 12.0671C6.37705 12.0249 6.86924 11.5249 8.14424 10.2561L9.90674 8.50145L8.14424 6.74833C6.86768 5.47645 6.37705 4.97801 6.35987 4.93583C6.34737 4.90301 6.33643 4.84833 6.33643 4.81395C6.33643 4.58895 6.56455 4.43739 6.76612 4.53114C6.85518 4.57333 10.5802 8.28114 10.6192 8.36864C10.6567 8.44833 10.6567 8.55458 10.6192 8.63426C10.5802 8.72176 6.85518 12.4296 6.76612 12.4718C6.68643 12.5093 6.5958 12.5093 6.51612 12.4718Z"
                                fill="#333333" />
                        </svg>
                    </div>

                </div>
            </div>
        </div>
        <div class="flex md:flex-row flex-col">
            <div component-name="me-faq-category-sidebar"
                class="me-faq-category-sidebar-container md:max-w-[450px] max-w-full lg:mr-10 mr-5">
                <div class="me-faq-category-sidebar-content 2xl:w-[410px] lg:w-[320px] md:w-[230px] w-full">
                    <div class="mt-8">
                        @if (count($categories) > 0)
                            @foreach ($categories as $key => $category)
                                @include('frontend.faq.sidebar')
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
            <div component-name="me-faq-category-content" id="list"
                class="hidden me-faq-category-content-container w-full lg:mt-0 md:mt-5 md:mb-10">
                <div>
                    <div class="mt-8">
                        <h1 class="font-bold me-body29 text-darkgray">{{ langbind($catego, 'name') }}</h1>
                        <div>

                            <div component-name="me-faq-category-list"
                                class="me-faq-category-list-container mt-5 search_faq_list">

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div id = "detail_section">
                <div component-name="me-popular-questions" class="me-popular-questions-container mt-8 md:mb-[120px] mb-20">
                    <div class="me-popular-questions-content">
                        <h3 class="font-bold me-body32 text-darkgray"></h3>
                        <div class="">
                            <div class="lg:px-5 px-3 2xl:py-10 py-5 flex justify-between cursor-pointer">
                                <h3 class="font-bold me-body26 text-darkgray">
                                    {{ langbind($faq, 'name') }}
                                </h3>
                            </div>
                            <div class="px-10 2xl:mt-[30px] mt-4 popular-question-content">
                                {!! langbind($faq, 'content') !!}
                                <p class="text-lightgray">@lang('labels.faq.helpful')</p>
                                @php
                                    $like_count = App\Models\FaqLike::where('faq_id', $faq->id)
                                        ->where('like_status', 1)
                                        ->count();
                                    $unlike_count = App\Models\FaqLike::where('faq_id', $faq->id)
                                        ->where('like_status', 2)
                                        ->count();
                                @endphp
                                @if (Auth::guard('customer')->check())
                                    @php
                                        $faq_like = App\Models\FaqLike::where('faq_id', $faq->id)
                                            ->where('customer_id', Auth::guard('customer')->user()->id)
                                            ->where('like_status', 1)
                                            ->count();
                                        $faq_unlike = App\Models\FaqLike::where('faq_id', $faq->id)
                                            ->where('customer_id', Auth::guard('customer')->user()->id)
                                            ->where('like_status', 2)
                                            ->count();
                                    @endphp

                                    <div class="flex items-center like_section">
                                        <div class="flex items-center mr-5 information-useful-button cursor-pointer @if ($faq_like) active @endif"
                                            data-like-status="1" data-id="{{ $faq->id }}">
                                            <img src="{{ asset('frontend/img/faq-thumb-up.svg') }}" alt="faq-thumb"
                                                class="mr-[10px] thumb-up" />
                                            <img src="{{ asset('frontend/img/faq-thumb-up-active.svg') }}" alt="faq-thumb"
                                                class="mr-[10px] thumb-up-active hidden" />
                                            <span class="block me-body16 text-darkgray font-normal">@lang('labels.faq.yes')
                                                <span
                                                    class="like_count{{ $faq->id }} @if ($like_count == 0) hidden @endif">({{ $like_count }})</span>
                                            </span>
                                        </div>
                                        <div class="flex items-center information-useful-button cursor-pointer @if ($faq_unlike) active @endif"
                                            data-like-status="2" data-id="{{ $faq->id }}">
                                            <img src="{{ asset('frontend/img/faq-thumb-down.svg') }}" alt="faq-thumb"
                                                class="mr-[10px] thumb-down" />
                                            <img src="{{ asset('frontend/img/faq-thumb-down-active.svg') }}"
                                                alt="faq-thumb" class="mr-[10px] thumb-down-active hidden" />
                                            <span class="block me-body16 text-darkgray font-normal">@lang('labels.faq.no')
                                                <span
                                                    class="unlike_count{{ $faq->id }} @if ($unlike_count == 0) hidden @endif">({{ $unlike_count }})
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                @else
                                    <div class="flex items-center like_section">
                                        <div class="flex items-center mr-5 register-btn cursor-pointer"
                                            data-like-status="1" data-id="{{ $faq->id }}">
                                            <img src="{{ asset('frontend/img/faq-thumb-up.svg') }}" alt="faq-thumb"
                                                class="mr-[10px] thumb-up" />
                                            <img src="{{ asset('frontend/img/faq-thumb-up-active.svg') }}"
                                                alt="faq-thumb" class="mr-[10px] thumb-up-active hidden" />
                                            <span class="block me-body16 text-darkgray font-normal">@lang('labels.faq.yes')
                                                <span
                                                    class="like_count{{ $faq->id }} @if ($like_count == 0) hidden @endif">({{ $like_count }})</span>
                                            </span>
                                        </div>
                                        <div class="flex items-center register-btn cursor-pointer" data-like-status="2"
                                            data-id="{{ $faq->id }}">
                                            <img src="{{ asset('frontend/img/faq-thumb-down.svg') }}" alt="faq-thumb"
                                                class="mr-[10px] thumb-down" />
                                            <img src="{{ asset('frontend/img/faq-thumb-down-active.svg') }}"
                                                alt="faq-thumb" class="mr-[10px] thumb-down-active hidden" />
                                            <span class="block me-body16 text-darkgray font-normal">@lang('labels.faq.no')
                                                <span
                                                    class="unlike_count{{ $faq->id }} @if ($unlike_count == 0) hidden @endif">({{ $unlike_count }})</span>
                                            </span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
                <div component-name="me-popular-questions"
                    class="me-popular-questions-container xl:mt-[60px] mt-8 md:mb-[120px] mb-20" id="other_related">
                    <div class="me-popular-questions-content">
                        <h3 class="font-bold me-body32 text-darkgray">@lang('labels.faq.related_faq')</h3>
                        @if (count($related_faq_sub_category) > 0)
                            @foreach ($related_faq_sub_category as $key => $faq)
                                <div class="">
                                    <div
                                        class="lg:px-5 px-3 2xl:py-10 py-5 flex justify-between faq-title-bar cursor-pointer ">
                                        <h3 class="font-bold me-body26 text-darkgray">
                                            {{ langbind($faq, 'name') }} 
                                        </h3>
                                        <img src="{{ asset('frontend/img/faq-down.svg') }}" alt="faq-down" />
                                    </div>
                                    <div class="px-10 faq-answers-content 2xl:mt-[30px] mt-4">
                                        {!! langbind($faq, 'content') !!}
                                        <p class="text-lightgray" >@lang('labels.faq.helpful')</p>
                                        @php
                                            $like_count = App\Models\FaqLike::where('faq_id', $faq->id)
                                                ->where('like_status', 1)
                                                ->count();
                                            $unlike_count = App\Models\FaqLike::where('faq_id', $faq->id)
                                                ->where('like_status', 2)
                                                ->count();
                                        @endphp
                                        @if (Auth::guard('customer')->check())
                                            @php
                                                $faq_like = App\Models\FaqLike::where('faq_id', $faq->id)
                                                    ->where('customer_id', Auth::guard('customer')->user()->id)
                                                    ->where('like_status', 1)
                                                    ->count();
                                                $faq_unlike = App\Models\FaqLike::where('faq_id', $faq->id)
                                                    ->where('customer_id', Auth::guard('customer')->user()->id)
                                                    ->where('like_status', 2)
                                                    ->count();
                                            @endphp

                                            <div class="flex items-center like_section">
                                                <div class="flex items-center mr-5 information-useful-button cursor-pointer @if ($faq_like) active @endif"
                                                    data-like-status="1" data-id="{{ $faq->id }}">
                                                    <img src="{{ asset('frontend/img/faq-thumb-up.svg') }}"
                                                        alt="faq-thumb" class="mr-[10px] thumb-up" />
                                                    <img src="{{ asset('frontend/img/faq-thumb-up-active.svg') }}"
                                                        alt="faq-thumb" class="mr-[10px] thumb-up-active hidden" />
                                                    <span class="block me-body16 text-darkgray font-normal">@lang('labels.faq.yes')
                                                        <span
                                                            class="like_count{{ $faq->id }} @if ($like_count == 0) hidden @endif">({{ $like_count }})</span>
                                                    </span>
                                                </div>
                                                <div class="flex items-center information-useful-button cursor-pointer @if ($faq_unlike) active @endif"
                                                    data-like-status="2" data-id="{{ $faq->id }}">
                                                    <img src="{{ asset('frontend/img/faq-thumb-down.svg') }}"
                                                        alt="faq-thumb" class="mr-[10px] thumb-down" />
                                                    <img src="{{ asset('frontend/img/faq-thumb-down-active.svg') }}"
                                                        alt="faq-thumb" class="mr-[10px] thumb-down-active hidden" />
                                                    <span class="block me-body16 text-darkgray font-normal">@lang('labels.faq.no')
                                                        <span
                                                            class="unlike_count{{ $faq->id }} @if ($unlike_count == 0) hidden @endif">({{ $unlike_count }})
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        @else
                                            <div class="flex items-center like_section">
                                                <div class="flex items-center mr-5 register-btn cursor-pointer"
                                                    data-like-status="1" data-id="{{ $faq->id }}">
                                                    <img src="{{ asset('frontend/img/faq-thumb-up.svg') }}"
                                                        alt="faq-thumb" class="mr-[10px] thumb-up" />
                                                    <img src="{{ asset('frontend/img/faq-thumb-up-active.svg') }}"
                                                        alt="faq-thumb" class="mr-[10px] thumb-up-active hidden" />
                                                    <span class="block me-body16 text-darkgray font-normal">@lang('labels.faq.yes')
                                                        <span
                                                            class="like_count{{ $faq->id }} @if ($like_count == 0) hidden @endif">({{ $like_count }})</span>
                                                    </span>
                                                </div>
                                                <div class="flex items-center register-btn cursor-pointer"
                                                    data-like-status="2" data-id="{{ $faq->id }}">
                                                    <img src="{{ asset('frontend/img/faq-thumb-down.svg') }}"
                                                        alt="faq-thumb" class="mr-[10px] thumb-down" />
                                                    <img src="{{ asset('frontend/img/faq-thumb-down-active.svg') }}"
                                                        alt="faq-thumb" class="mr-[10px] thumb-down-active hidden" />
                                                    <span class="block me-body16 text-darkgray font-normal">@lang('labels.faq.no')
                                                        <span
                                                            class="unlike_count{{ $faq->id }} @if ($unlike_count == 0) hidden @endif">({{ $unlike_count }})</span>
                                                    </span>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @elseif(count($related_faq_category) > 0)
                            @foreach ($related_faq_category as $key => $faq)
                                <div class="">
                                    <div
                                        class="lg:px-5 px-3 2xl:py-10 py-5 flex justify-between faq-title-bar cursor-pointer ">
                                        <h3 class="font-bold me-body26 text-darkgray">
                                            {{ langbind($faq, 'name') }}
                                        </h3>
                                        <img src="{{ asset('frontend/img/faq-down.svg') }}" alt="faq-down" />
                                    </div>
                                    <div class="px-10 faq-answers-content 2xl:mt-[30px] mt-4">
                                        {!! langbind($faq, 'content') !!}
                                        <p class="text-lightgray">@lang('labels.faq.helpful')</p>
                                        @php
                                            $like_count = App\Models\FaqLike::where('faq_id', $faq->id)
                                                ->where('like_status', 1)
                                                ->count();
                                            $unlike_count = App\Models\FaqLike::where('faq_id', $faq->id)
                                                ->where('like_status', 2)
                                                ->count();
                                        @endphp
                                        @if (Auth::guard('customer')->check())
                                            @php
                                                $faq_like = App\Models\FaqLike::where('faq_id', $faq->id)
                                                    ->where('customer_id', Auth::guard('customer')->user()->id)
                                                    ->where('like_status', 1)
                                                    ->count();
                                                $faq_unlike = App\Models\FaqLike::where('faq_id', $faq->id)
                                                    ->where('customer_id', Auth::guard('customer')->user()->id)
                                                    ->where('like_status', 2)
                                                    ->count();
                                            @endphp

                                            <div class="flex items-center like_section">
                                                <div class="flex items-center mr-5 information-useful-button cursor-pointer @if ($faq_like) active @endif"
                                                    data-like-status="1" data-id="{{ $faq->id }}">
                                                    <img src="{{ asset('frontend/img/faq-thumb-up.svg') }}"
                                                        alt="faq-thumb" class="mr-[10px] thumb-up" />
                                                    <img src="{{ asset('frontend/img/faq-thumb-up-active.svg') }}"
                                                        alt="faq-thumb" class="mr-[10px] thumb-up-active hidden" />
                                                    <span class="block me-body16 text-darkgray font-normal">@lang('labels.faq.yes')
                                                        <span
                                                            class="like_count{{ $faq->id }} @if ($like_count == 0) hidden @endif">({{ $like_count }})</span>
                                                    </span>
                                                </div>
                                                <div class="flex items-center information-useful-button cursor-pointer @if ($faq_unlike) active @endif"
                                                    data-like-status="2" data-id="{{ $faq->id }}">
                                                    <img src="{{ asset('frontend/img/faq-thumb-down.svg') }}"
                                                        alt="faq-thumb" class="mr-[10px] thumb-down" />
                                                    <img src="{{ asset('frontend/img/faq-thumb-down-active.svg') }}"
                                                        alt="faq-thumb" class="mr-[10px] thumb-down-active hidden" />
                                                    <span class="block me-body16 text-darkgray font-normal">@lang('labels.faq.no')
                                                        <span
                                                            class="unlike_count{{ $faq->id }} @if ($unlike_count == 0) hidden @endif">({{ $unlike_count }})
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        @else
                                            <div class="flex items-center like_section">
                                                <div class="flex items-center mr-5 register-btn cursor-pointer"
                                                    data-like-status="1" data-id="{{ $faq->id }}">
                                                    <img src="{{ asset('frontend/img/faq-thumb-up.svg') }}"
                                                        alt="faq-thumb" class="mr-[10px] thumb-up" />
                                                    <img src="{{ asset('frontend/img/faq-thumb-up-active.svg') }}"
                                                        alt="faq-thumb" class="mr-[10px] thumb-up-active hidden" />
                                                    <span class="block me-body16 text-darkgray font-normal">@lang('labels.faq.yes')
                                                        <span
                                                            class="like_count{{ $faq->id }} @if ($like_count == 0) hidden @endif">({{ $like_count }})</span>
                                                    </span>
                                                </div>
                                                <div class="flex items-center register-btn cursor-pointer"
                                                    data-like-status="2" data-id="{{ $faq->id }}">
                                                    <img src="{{ asset('frontend/img/faq-thumb-down.svg') }}"
                                                        alt="faq-thumb" class="mr-[10px] thumb-down" />
                                                    <img src="{{ asset('frontend/img/faq-thumb-down-active.svg') }}"
                                                        alt="faq-thumb" class="mr-[10px] thumb-down-active hidden" />
                                                    <span class="block me-body16 text-darkgray font-normal">@lang('labels.faq.no')
                                                        <span
                                                            class="unlike_count{{ $faq->id }} @if ($unlike_count == 0) hidden @endif">({{ $unlike_count }})</span>
                                                    </span>
                                                </div>
                                            </div>
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
@endsection
@push('scripts')
    <script>
        // $('.search').on('click', function() {
        //     var search = $('#searchKeyword').val();
        //     var category_id = $('#category_id').val();
        //     $.post('{{ route('keyword.search') }}', {
        //         search: search,
        //         category_id: category_id,
        //     }, function(data) {
        //         $(".search_faq_list").html(data);
        //         $("#detail_section").addClass('hidden');
        //         $("#list").removeClass('hidden');

        //     });
        // })

        $(document).on('click', '.faqinner .search', function() {
                console.log("clicking.....")
                search()
            })

            $('.faqinner').on('keypress', '#searchKeyword', function(e) {
                if (e.key === 'Enter') {
                    console.log("enter.....")
                    e.preventDefault();
                    search()
                }
            })

            function search() {
                var search = $('#searchKeyword').val();
                var search_link = "{{route('faq.category')}}"+"?"+"search="+search;
                    window.location = search_link;
            }



        $('.information-useful-button').on('click', function() {
            var likeStatus = $(this).data('like-status');
            var id = $(this).data('id');
            $.post('{{ route('faq.change.status') }}', {
                id: id,
                likeStatus: likeStatus,
            }, function(data) {
                if (data.data.like_count == 0) {
                    $(".like_count" + data.data.id).addClass('hidden');
                } else {
                    $(".like_count" + data.data.id).removeClass('hidden');
                }
                if (data.data.unlike_count == 0) {
                    $(".unlike_count" + data.data.id).addClass('hidden');
                } else {
                    $(".unlike_count" + data.data.id).removeClass('hidden');
                }
                $(".like_count" + data.data.id).html("(" + data.data.like_count + ")");
                $(".unlike_count" + data.data.id).html("(" + data.data.unlike_count + ")");
            });
        });
    </script>
@endpush

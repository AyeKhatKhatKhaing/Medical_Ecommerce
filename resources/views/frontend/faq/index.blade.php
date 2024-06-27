@extends('frontend.layouts.master')
@include('frontend.seo', ['seo' => isset($faq_page) ? $faq_page : ''])
@section('content')
    @include('frontend.faq.nav')
    <div component-name="me-three-buttons-banner" class="me-three-buttons-banner-container">
        <div class="me-three-buttons-banner-content w-full relative">
            <img src="{{ isset($faq_page) && $faq_page->banner_img ? asset($faq_page->banner_img) : '' }}" alt="faq banner"
                class="w-full object-cover lg:min-h-[400px] min-h-[300px]" />
            <div class="absolute top-1/2 -translate-y-1/2 w-full">
                <div class="me-three-buttons-content-div">
                    <h1 class="font-bold me-body32 text-white">{{ langbind($faq_page, 'banner_title') }}</h1>
                    <div
                        class="grid md:grid-cols-3 htzxs:grid-cols-2 grid-cols-1 xl:gap-8 md:gap-4 items-center md:mt-8 mt-4">
                        <div class="hover:-translate-y-3 relative button-transition-all">
                            <a  @if (Auth::guard('customer')->check()) href="{{ route('dashboard.booking') }}" @endif
                                class="flex justify-between faq-banner-button md:mr-0 md:mb-0 mr-4 mb-4
                                @if (!Auth::guard('customer')->check()) register-btn cursor-pointer @endif
                                ">
                                <div class="flex items-center py-[10px]">
                                    <img src="{{ isset($faq_page) && $faq_page->button1_img ? asset($faq_page->button1_img) : '' }}"
                                        alt="status" class="lg:mr-5 mr-2 xl:max-w-[60px] lg:max-w-[40px] max-w-[28px]" />
                                    <span
                                        class="block font-bold me-body23 text-darkgray">{{ langbind($faq_page, 'button1_title') }}</span>
                                </div>
                                <img src="{{ asset('frontend/img/faq-next-icon.svg') }}" alt="next icon"
                                    class="object-contain" />
                            </a>
                        </div>
                        <div class="hover:-translate-y-3 relative button-transition-all">
                            <a @if (Auth::guard('customer')->check()) href="{{ route('dashboard.booking') }}" @endif class="flex justify-between faq-banner-button md:mr-0 md:mb-0 mr-4 mb-4  @if (!Auth::guard('customer')->check()) register-btn cursor-pointer @endif">
                                <div class="flex items-center py-[10px]">
                                    <img src="{{ isset($faq_page) && $faq_page->button2_img ? asset($faq_page->button2_img) : '' }}"
                                        alt="change booking"
                                        class="lg:mr-5 mr-2 xl:max-w-[60px] lg:max-w-[40px] max-w-[28px]" />
                                    <span
                                        class="block font-bold me-body23 text-darkgray">{{ langbind($faq_page, 'button2_title') }}</span>
                                </div>
                                <img src="{{ asset('frontend/img/faq-next-icon.svg') }}" alt="next icon"
                                    class="object-contain" />
                            </a>
                        </div>
                        <div class="hover:-translate-y-3 relative button-transition-all">
                            <a @if (Auth::guard('customer')->check()) href="{{ route('dashboard.booking') }}" @endif class="flex justify-between faq-banner-button md:mr-0 md:mb-0 mr-4 mb-4  @if (!Auth::guard('customer')->check()) register-btn cursor-pointer @endif">
                                <div class="flex items-center py-[10px]">
                                    <img src="{{ isset($faq_page) && $faq_page->button3_img ? asset($faq_page->button3_img) : '' }}"
                                        alt="cancel booking"
                                        class="lg:mr-5 mr-2 xl:max-w-[60px] lg:max-w-[40px] max-w-[28px]" />
                                    <span
                                        class="block font-bold me-body23 text-darkgray">{{ langbind($faq_page, 'button3_title') }}</span>
                                </div>
                                <img src="{{ asset('frontend/img/faq-next-icon.svg') }}" alt="next icon"
                                    class="object-contain" />
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div component-name="me-faq-search-box" class="me-faq-search-box-container mt-20 mb-10">
        <div class="me-faq-search-box-content relative">
            <div class="relative 8xl:max-w-full max-w-[1180px] me-faq-max-container">
                {{-- <form> --}}
                <div class="faq-search-box flex">
                    <div
                        class="hover:border-1 hover:border-blueMediq border-1 border-lightgray flex items-center rounded-tl-lg rounded-bl-lg w-full">
                        <form>
                        <input type="text" placeholder="@lang('labels.faq.search1')" autocomplete="off" id="search_category"
                            class="search_category px-5 py-3 rounded-tl-lg rounded-bl-lg w-full font-normal me-body18 text-lightgray focus:outline-none focus-visible:outline-none focus-within:outline-none" />
                        </form>
                    </div>
                    <button
                        class="bg-blueMediq px-5 md:min-w-[150px] min-w-0 text-center flex justify-center items-center  rounded-tr-lg rounded-br-lg search">
                        <img src="{{ asset('frontend/img/majesticons_search-line.svg') }}" alt="majesticons_search-line"
                            class="mx-auto" />
                    </button>
                </div>
                {{-- </form> --}}
                 {{-- search data --}}
                {{-- <div class="faq-search-dropdown hidden absolute top-full w-full z-[2] ">
                    <div class="px-5 py-2 search_categroy_list">
                       
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="flex lg:flex-row flex-col-reverse me-faq-main-container">
        <div class=" 8xl:max-w-full max-w-[1180px] 2xl:mr-10 lg:mr-5">
            <div component-name="me-browse-by-category" class="me-browse-by-category-container mt-10">
                <div class="me-browse-by-category-content">
                    <h1 class="font-bold me-body32 text-darkgray text-left md:mb-[60px] mb-10">
                        {{ langbind($faq_page, 'title1') }}
                    </h1>
                    <div class="grid lg:grid-cols-5 sm:grid-cols-3 2xs:grid-cols-2 grid-cols-1 7xl:gap-12 gap:4">
                        @if (count($categories) > 0)
                            @foreach ($categories as $category)
                                {{-- <div class="2xl:p-5 p-2 mb-4 faq-category-icon-content">
                                    <a class="block text-center" href="{{ route('faq.category', $category->id) }}">
                                        <div class="mx-auto xl:max-w-max max-w-[50px] h-[61px] category-svg-container">
                                            <img src="{{ asset($category->img) }}" alt="">
                                        </div>
                                        <span
                                            class="block mt-5 font-normal me-body20 text-darkgray">{{ langbind($category, 'name') }}</span>
                                    </a>
                                </div> --}}
                                <div class="2xl:p-5 p-2 mb-4 faq-category-icon-content">
                                    <a class="block text-center" href="{{ langlink('helpcenter-category?category=' . $category->id) }}">
                                        <div class="mx-auto xl:max-w-max max-w-[50px] h-[61px] category-svg-container">
                                            <img src="{{ asset($category->img) }}" alt="first-time-booking"
                                                class="category-icon" /><img src="{{ asset($category->img_hover) }}"
                                                alt="first-time-booking-active" class="hidden category-icon-hover" />
                                        </div>
                                        <span
                                            class="block mt-5 font-normal me-body20 text-darkgray">{{ langbind($category, 'name') }}</span>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div component-name="me-popular-questions" class="me-popular-questions-container mt-8 md:mb-[120px] mb-20">
                <div class="me-popular-questions-content">
                    <h3 class="font-bold me-body32 text-darkgray">
                        {{ langbind($faq_page, 'title2') }}
                    </h3>
                    @if (count($popular_questions) > 0)
                        @foreach ($popular_questions as $key => $popular)
                            <div class="">
                                <div
                                    class="lg:px-5 px-3 2xl:py-10 py-5 flex justify-between faq-title-bar cursor-pointer @if ($key == 0) active @endif">
                                    <h3 class="font-bold me-body26 text-darkgray">
                                        {{ langbind($popular, 'name') }}
                                    </h3>
                                    <img src="{{ asset('frontend/img/faq-down.svg') }}" alt="faq-down" />
                                </div>
                                <div class="px-10 faq-answers-content 2xl:mt-[30px] mt-4">
                                    {!! langbind($popular, 'content') !!}
                                    <p class="text-lightgray">@lang('labels.faq.helpful')</p>
                                    @php
                                        $like_count = App\Models\FaqLike::where('faq_id', $popular->id)
                                            ->where('like_status', 1)
                                            ->count();
                                        $unlike_count = App\Models\FaqLike::where('faq_id', $popular->id)
                                            ->where('like_status', 2)
                                            ->count();
                                    @endphp
                                    @if (Auth::guard('customer')->check())
                                        @php
                                           
                                            $faq_like = App\Models\FaqLike::where('faq_id', $popular->id)
                                                ->where('customer_id', Auth::guard('customer')->user()->id)
                                                ->where('like_status', 1)
                                                ->count();
                                            $faq_unlike = App\Models\FaqLike::where('faq_id', $popular->id)
                                                ->where('customer_id', Auth::guard('customer')->user()->id)
                                                ->where('like_status', 2)
                                                ->count();
                                        @endphp

                                        <div class="flex items-center like_section">
                                            <div class="flex items-center mr-5 information-useful-button cursor-pointer @if ($faq_like) active @endif"
                                                data-like-status="1" data-id="{{ $popular->id }}">
                                                <img src="{{ asset('frontend/img/faq-thumb-up.svg') }}" alt="faq-thumb"
                                                    class="mr-[10px] thumb-up" />
                                                <img src="{{ asset('frontend/img/faq-thumb-up-active.svg') }}"
                                                    alt="faq-thumb" class="mr-[10px] thumb-up-active hidden" />
                                                <span class="block me-body16 text-darkgray font-normal">@lang('labels.faq.yes')
                                                    <span
                                                        class="like_count{{ $popular->id }} @if ($like_count == 0) hidden @endif">({{ $like_count }})</span>
                                                </span>
                                            </div>
                                            <div class="flex items-center information-useful-button cursor-pointer @if ($faq_unlike) active @endif"
                                                data-like-status="2" data-id="{{ $popular->id }}">
                                                <img src="{{ asset('frontend/img/faq-thumb-down.svg') }}" alt="faq-thumb"
                                                    class="mr-[10px] thumb-down" />
                                                <img src="{{ asset('frontend/img/faq-thumb-down-active.svg') }}"
                                                    alt="faq-thumb" class="mr-[10px] thumb-down-active hidden" />
                                                <span class="block me-body16 text-darkgray font-normal">@lang('labels.faq.no')
                                                    <span
                                                        class="unlike_count{{ $popular->id }} @if ($unlike_count == 0) hidden @endif">({{ $unlike_count }})
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    @else
                                        <div class="flex items-center like_section">
                                            <div class="flex items-center mr-5 register-btn cursor-pointer"
                                                data-like-status="1" data-id="{{ $popular->id }}">
                                                <img src="{{ asset('frontend/img/faq-thumb-up.svg') }}" alt="faq-thumb"
                                                    class="mr-[10px] thumb-up" />
                                                <img src="{{ asset('frontend/img/faq-thumb-up-active.svg') }}"
                                                    alt="faq-thumb" class="mr-[10px] thumb-up-active hidden" />
                                                <span class="block me-body16 text-darkgray font-normal">@lang('labels.faq.yes')
                                                    <span
                                                        class="like_count{{ $popular->id }} @if ($like_count == 0) hidden @endif">({{ $like_count }})</span>
                                                </span>
                                            </div>
                                            <div class="flex items-center register-btn cursor-pointer"
                                                data-like-status="2" data-id="{{ $popular->id }}">
                                                <img src="{{ asset('frontend/img/faq-thumb-down.svg') }}" alt="faq-thumb"
                                                    class="mr-[10px] thumb-down" />
                                                <img src="{{ asset('frontend/img/faq-thumb-down-active.svg') }}"
                                                    alt="faq-thumb" class="mr-[10px] thumb-down-active hidden" />
                                                <span class="block me-body16 text-darkgray font-normal">@lang('labels.faq.no')
                                                    <span
                                                        class="unlike_count{{ $popular->id }} @if ($unlike_count == 0) hidden @endif">({{ $unlike_count }})</span>
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
        <div>
            <div component-name="me-faq-contact-sticky"
                class="me-faq-contact-sticky-container 2xl:w-[340px] sm:w-[300px] w-full sticky top-[200px] left-0 lg:mt-[-90px] mt-5">
                <div class="me-faq-contact-sticky-content py-5">
                    <h1 class="font-bold me-body24 text-darkgray text-center px-5">@lang('labels.contact_us')</h1>
                    <div class="border-b border-b-mee4 px-5">
                        <div class="faq-contact-title-collpase flex justify-between mt-5 pb-[11px]">
                            <p class="font-normal me-body16 text-darkgray flex justify-between faq-contact-time active">
                                {{ langbind($faq_page, 'contact1') }}</p>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M18.6876 9.0398C18.5822 8.81246 18.3173 8.70933 18.0806 8.80543C18.0173 8.83121 17.2673 9.56949 15.3642 11.482L12.7322 14.1257L10.1025 11.482C8.19466 9.56714 7.447 8.83121 7.38372 8.80543C7.3345 8.78668 7.25247 8.77027 7.20091 8.77027C6.86341 8.77027 6.63606 9.11246 6.77669 9.4148C6.83997 9.54839 12.4017 15.1359 12.5329 15.1945C12.6525 15.2507 12.8118 15.2507 12.9314 15.1945C13.0626 15.1359 18.6243 9.54839 18.6876 9.4148C18.7439 9.29527 18.7439 9.15933 18.6876 9.0398Z"
                                        fill="#333333" />
                                </svg>
                            </div>
                        </div>
                        <div class="faq-contact-title-collpase-content">
                            <p class="font-normal me-body16 text-darkgray pb-[11px]">{{ langbind($faq_page, 'contact2') }}
                            </p>
                            <p class="font-normal me-body16 text-darkgray pb-[11px]">{{ langbind($faq_page, 'contact3') }}
                            </p>
                        </div>
                    </div>
                    <div class="mt-5 px-5">
                        <div component-name="me-title-icon-flex" class="me-title-icon-flex-container">
                            <div class="me-title-icon-flex-content">
                                <div class="flex mt-8">
                                    <div class="w-[64px] mr-[17px]">
                                        <img src="{{ isset($contact) && $contact->email_logo ? $contact->email_logo : '' }}"
                                            alt="email" class="max-w-[50px] mx-auto object-contain" />
                                    </div>
                                    <div>
                                        <p class="font-bold text-blueMediq me-body20">{{ langbind($contact, 'email_title') }}</p>
                                        <a href="mailto:{{ isset($contact) ? $contact->email : 'enquiry@mediq.com.hk' }}"
                                            class="block underline underline-offset-2 text-darkgray me-body18">{{ isset($contact) ? $contact->email : '' }}</a>
                                    </div>
                                </div>

                                <div class="flex mt-8">
                                    <div class="w-[64px] mr-[17px]">
                                        <img src="{{ isset($contact) && $contact->hotline_logo ? $contact->hotline_logo : '' }}"
                                            alt="hotline" class="max-w-[50px] mx-auto object-contain" />
                                    </div>
                                    <div>
                                        <p class="font-bold text-blueMediq me-body20"> {{ langbind($contact, 'hotline_title') }}</p>
                                        <a href="tel:{{ isset($contact) ? $contact->hotline : '-' }}"
                                            class="block underline underline-offset-2 text-darkgray me-body18">
                                            {{ isset($contact) ? $contact->hotline : '-' }}
                                        </a>
                                    </div>
                                </div>

                                <div class="flex mt-8">
                                    <div class="w-[64px] mr-[17px]">
                                        <img src="{{ isset($contact) && $contact->whats_up_logo ? $contact->whats_up_logo : '' }}"
                                            alt="whatsapp" class="max-w-[50px] mx-auto object-contain" />
                                    </div>
                                    <div>
                                        <p class="font-bold text-blueMediq me-body20"> {{ langbind($contact, 'whats_up_title') }}</p>
                                        <a href="https://api.whatsapp.com/send?phone={{ isset($contact) ? $contact->whats_up : '85298124646' }}"
                                            class="block underline underline-offset-2 text-darkgray me-body18">
                                            @php
                                            $phoneNumber = isset($contact) ? $contact->whats_up : '85298124646' ; // Replace this with your actual phone number variable
                                            $formattedPhoneNumber = '(' . substr($phoneNumber, 0, 3) . ') ' . substr($phoneNumber, 3, 4) . ' ' . substr($phoneNumber, 7);
                                            @endphp
                                            {{ $formattedPhoneNumber }}
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $("input").attr("autocomplete", "off");
            // $('.search_category').on('keyup', function() {
            //     search();
            // });

            // $('.search_category').on('focus', function() {
            //     search();
            // });
            $('.search').on('click', function(e) {
            search()
            console.log("okk")
            })
            document.getElementById('search_category').addEventListener('keypress', function (e) {
            if (e.key === 'Enter') {
                e.preventDefault();
              search()
            }
            })

            function search() {
                var searchKey = $('.search_category').val();
                var search_link = "{{route('faq.category')}}"+"?"+"search="+searchKey;
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
        })
    </script>
@endpush

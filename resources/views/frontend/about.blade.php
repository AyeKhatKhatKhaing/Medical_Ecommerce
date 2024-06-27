@extends('frontend.layouts.master')
@include('frontend.seo', ['seo' => isset($about) ? $about : ''])
@section('content')
    @include('frontend.faq.nav')
    <main>
        {{-- <section class="about-us-banner object-cover object-center text-darkgray relative">
            <img src="{{ isset($about) && $about->banner_img ? asset($about->banner_img) : asset('frontend/img/about-us-banner.png') }}"
                alt="" class="w-full h-auto min-h-[400px] align-middle object-cover object-center">

            <div class="about-us-banner-container absolute top-0 right-0 bottom-0 left-0">
                <div
                    class="about-us-banner-card bg-light @@customBackground pt-5 pr-5 pb-8 pl-5 xs:pl-8 xl:pt-[30px] xl:pr-[30px] xl:pb-14 xl:pl-14 max-w-md xl:max-w-[38.75rem] rounded-xl rounded-bl-[50px] xl:rounded-[20px] xl:rounded-bl-[100px] absolute top-6 5xs:top-12 2xs:top-20 sm:top-[100px] lg:top-[58px] right-0">
                    <h1 class="text-blueMediq me-head32 font-bold px-5">{{ langbind($about, 'banner_title') }}</h1>
                    <p class="me-body-20 mt-1 xl:mt-2 px-5 about-us-banner-title">
                        {!! langbind($about, 'banner_description') !!}
                        <a class="inline-block leading-[140%] ml-1 underline about-us-banner-more-btn">More</a>
                    </p>
                </div>
            </div>
        </section> --}}
        <section class="about-us-banner object-cover object-center text-darkgray relative">
            <img src="{{ isset($about) && $about->banner_img ? asset($about->banner_img) : asset('frontend/img/about-us-banner.png') }}" alt="" class="w-full h-auto min-h-[400px] align-middle object-cover object-center">
          
            <div class="about-us-banner-container absolute top-0 right-0 bottom-0 left-0">
              <div class="about-us-banner-card bg-light @@customBackground pt-5 pr-5 pb-8 pl-5 xs:pl-8 xl:pt-[30px] xl:pr-[30px] xl:pb-14 xl:pl-14 max-w-md xl:max-w-[38.75rem] rounded-xl rounded-bl-[50px] xl:rounded-[20px] xl:rounded-bl-[100px] absolute top-6 5xs:top-12 2xs:top-20 sm:top-[100px] lg:top-[58px] right-0">
                <h1 class="text-blueMediq me-head32 font-bold px-5">{{ langbind($about, 'banner_title') }}</h1>
                <div class="me-body-20 mt-1 xl:mt-2 px-5 about-us-banner-title">
                     {!! langbind($about, 'banner_description') !!}
                     <a class="inline-block leading-[140%] ml-1 underline about-us-banner-more-btn">@lang('labels.about.more')</a>
                </div>      
              </div>
            </div>
        </section>

        <section class="contact-items text-darkgray">
            <div class="contact-us-container text-center py-10 xl:py-20 6xl:py-[7.5rem] contact-item-four-colsV2">
                <div class="contact-items-row mx-auto">
                    <div class="contact-items-header">
                        <h2 class="font-bold me-body32 text-darkcustom text-center lg:max-w-[513px] px-5 mx-auto">
                            {{ langbind($empower, 'empower_title') }}
                        </h2>
                    </div>


                    <div
                        class="contact-items-body flex flex-col sm:flex-row items-center sm:items-baseline justify-center xl:justify-between sm:flex-wrap lg:flex-nowrap mt-8 6xl:mt-12">

                        <div
                            class="mx-4 contact-items-col max-w-[300px] h-auto text-center mt-8 first:mt-0 sm:[&:nth-child(2)]:mt-0 lg:mt-0">
                            <div class="contact-items-icon">
                                <img src="{{ isset($empower) && $empower->empower_logo1 ? asset($empower->empower_logo1) : asset('frontend/img/care.svg') }}"
                                    alt="care" class="mx-auto w-auto h-auto align-middle object-cover object-center">
                            </div>
                            <h3 class="contact-items-caption text-blueMediq me-body23 font-bold mt-4 xl:mt-8 6xl:mt-10">
                                {{ langbind($empower, 'empower_sub_title1') }}
                            </h3>

                            <p class="me-body18 inline-block mt-2">
                                {!! langbind($empower, 'empower_text1') !!}
                            </p>
                        </div>

                        <div
                            class="mx-4 contact-items-col max-w-[300px] h-auto text-center mt-8 first:mt-0 sm:[&:nth-child(2)]:mt-0 lg:mt-0">
                            <div class="contact-items-icon">
                                <img src="{{ isset($empower) && $empower->empower_logo2 ? asset($empower->empower_logo2) : asset('frontend/img/confidence.svg') }}"
                                    alt="confidence" class="mx-auto w-auto h-auto align-middle object-cover object-center">
                            </div>
                            <h3 class="contact-items-caption text-blueMediq me-body23 font-bold mt-4 xl:mt-8 6xl:mt-10">
                                {{ langbind($empower, 'empower_sub_title2') }}
                            </h3>

                            <p class="me-body18 inline-block mt-2">
                                {!! langbind($empower, 'empower_text2') !!}
                            </p>
                        </div>

                        <div
                            class="mx-4 contact-items-col max-w-[300px] h-auto text-center mt-8 first:mt-0 sm:[&:nth-child(2)]:mt-0 lg:mt-0">
                            <div class="contact-items-icon">
                                <img src="{{ isset($empower) && $empower->empower_logo3 ? asset($empower->empower_logo3) : asset('frontend/img/convenience.svg') }}"
                                    alt="convenience" class="mx-auto w-auto h-auto align-middle object-cover object-center">
                            </div>
                            <h3 class="contact-items-caption text-blueMediq me-body23 font-bold mt-4 xl:mt-8 6xl:mt-10">
                                {{ langbind($empower, 'empower_sub_title3') }}
                            </h3>

                            <p class="me-body18 inline-block mt-2">
                                {!! langbind($empower, 'empower_text3') !!}

                            </p>
                        </div>

                        <div
                            class="mx-4 contact-items-col max-w-[300px] h-auto text-center mt-8 first:mt-0 sm:[&:nth-child(2)]:mt-0 lg:mt-0">
                            <div class="contact-items-icon">
                                <img src="{{ isset($empower) && $empower->empower_logo4 ? asset($empower->empower_logo4) : asset('frontend/img/concentrate.svg') }}"
                                    alt="concentrate" class="mx-auto w-auto h-auto align-middle object-cover object-center">
                            </div>
                            <h3 class="contact-items-caption text-blueMediq me-body23 font-bold mt-4 xl:mt-8 6xl:mt-10">
                                {{ langbind($empower, 'empower_sub_title4') }}
                            </h3>

                            <p class="me-body18 inline-block mt-2">
                                {!! langbind($empower, 'empower_text4') !!}
                            </p>
                        </div>

                    </div>

                </div>
            </div>
        </section>

        <div component-name="me-image-text-cardbox" class="me-image-text-cardbox-container 2xl:my-0 my-5 mb-0">
            <div class="me-image-text-cardbox-content">
                <div class="flex flex md:flex-row flex-col items-stretch">
                    <div class="md:w-1/2">
                        <img src="{{ isset($about) && $about->cooperation_img ? asset($about->cooperation_img) : asset('frontend/img/partner1.png') }}"
                            alt="partner1" class="rounded-[20px] w-full h-full object-cover" />
                    </div>
                    <div class="6xl:ml-[98px] md:ml-5 md:mt-0 mt-5 md:w-1/2 flex items-center">
                        <div class="md:max-w-[538px] max-w-full mx-auto">
                            <p class="me-body29 font-bold text-darkgray">
                                {{ langbind($about, 'cooperation_title') }}
                            </p>
                            <h3 class="me-body16 font-normal text-darkgray my-5">
                                {!! langbind($about, 'cooperation_description') !!}
                            </h3>
                            <div class="flex flex-wrap">
                                <a href="{{ route('partnership') }}"
                                    class="my-1 hover:bg-searchlight block rounded-[200px] font-bold me-body16 text-whitez bg-blueMediq px-4 py-2 mr-5">
                                    <span class="block relative top-[-1px] py-20">
                                    {{ langbind($about, 'cooperation_link_text1') }}
                                    </span>
                                </a>
                                {{-- <a href="/"
                                    class="my-1  hover:bg-searchlight block rounded-[200px] font-bold me-body16 text-whitez bg-blueMediq px-4 py-2">
                                    {{ langbind($about, 'cooperation_link_text2') }}
                                </a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div component-name="me-image-text-cardbox" class="me-image-text-cardbox-container 2xl:my-0 my-5 mb-[60px]">
            <div class="me-image-text-cardbox-content">
                <div class="flex flex md:flex-row-reverse flex-col items-stretch">
                    <div class="md:w-1/2">
                        <img src="{{ isset($about) && $about->group_img ? asset($about->group_img) : asset('frontend/img/partner2.png') }}"
                            alt="partner2" class="rounded-[20px] w-full h-full object-cover" />
                    </div>
                    <div class="6xl:mr-[98px] md:mr-5 md:mb-0 mb-5 md:w-1/2 flex items-center">
                        <div class="md:max-w-[538px] max-w-full mx-auto">
                            <p class="me-body29 font-bold text-darkgray">
                                {{ langbind($about, 'group_title') }}
                            </p>
                            <h3 class="me-body16 font-normal text-darkgray my-5">
                                {!! langbind($about, 'group_description') !!}
                            </h3>
                            {{-- <div class="flex flex-wrap">
                                <a href="/"
                                    class="my-1 hover:bg-searchlight block rounded-[200px] font-bold me-body16 text-whitez bg-blueMediq px-4 py-2 mr-5">
                                    <span class="block relative top-[-1px] py-20">
                                    {{ langbind($about, 'group_link_text1') }}
                                    </span>
                                </a>
                                <a href="/"
                                    class="my-1 hidden hover:bg-searchlight block rounded-[200px] font-bold me-body16 text-whitez bg-blueMediq px-4 py-2">Other
                                </a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- error --}}
        <div component-name="me-milestone" class="me-milestone-container mt-[60px] mb-[62px]">
            <div class="me-milestone-content">
                <div class=" 4xl:px-[100px]">
                    <h3 class="font-bold me-body32 text-darkgray text-center">@lang('labels.about.milestone')</h3>
                    <div class="mt-12">
                        <div class="flex sm:flex-row flex-col milestone-list items-start">

                            <div class="milestone-point sm:pt-[303px] left-side sm:mr-[30px] sm:w-[48%]">
                                <div>
                                    @foreach ($years as $key => $value)
                                        @if ($loop->even)
                                            <div class="mistone-inner-content @if ($loop->last) last-milestone @endif">
                                                <div class="sm:pt-[68px] pt-6">
                                                    <p class="font-bold me-body29 text-darkgray milestone-point-reached">
                                                        {{ $value->year }}
                                                    </p>
                                                    <div class="milestone-card">
                                                        <img src="{{ asset($value->img) }}" alt="milestone1"
                                                            class="mb-2" />
                                                        <div class="2xl:py-10 2xl:px-7 py-5 px-5">
                                                            @if (isset($value->milestoneDetail))
                                                                @if ($value->milestoneDetail->count() > 0)
                                                                    @foreach ($value->milestoneDetail as $details)
                                                                        <div class="mt-8">
                                                                            <p
                                                                                class="py-2 px-[10px] font-normal text-blueMediq me-body20 bg-paleblue rounded inline-block">
                                                                                {{ config('mediq.month_' . app()->getLocale())[$details->month_en] }}
                                                                            </p>
                                                                            <p
                                                                                class="mt-3 me-body23 text-darkgray font-bold">
                                                                                {!! langbind($details, 'title') !!}
                                                                            </p>
                                                                            <p
                                                                                class="mt-2 me-body18 font-normal text-darkgray">
                                                                                {!! langbind($details, 'description') !!}
                                                                            </p>
                                                                        </div>
                                                                    @endforeach
                                                                @endif
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach

                                </div>
                            </div>
                            <div id="right-side" class="milestone-point right-side sm:w-[52%]">
                                <div>
                                    @foreach ($years as $key => $value)
                                        @if ($loop->odd)
                                            <div class="mistone-inner-content @if ($loop->last) last-milestone @endif">
                                                <div class="@if ($key != 0) sm:pt-[68px] pt-6 @endif ">
                                                    <p class="font-bold me-body29 text-darkgray milestone-point-reached">
                                                        {{ $value->year }}</p>
                                                    <div class="milestone-card">
                                                        <img src="{{ asset($value->img) }}" alt="milestone1" />
                                                        <div class="2xl:py-10 2xl:px-7 py-5 px-5">
                                                            @if (isset($value->milestoneDetail))
                                                                @if ($value->milestoneDetail->count() > 0)
                                                                    @foreach ($value->milestoneDetail as $details)
                                                                        <div class="">
                                                                            <p
                                                                                class="py-2 px-[10px] font-normal text-blueMediq me-body20 bg-paleblue rounded inline-block">
                                                                                {{ config('mediq.month_' . app()->getLocale())[$details->month_en] }}
                                                                            </p>
                                                                            <p
                                                                                class="mt-3 me-body23 text-darkgray font-bold">
                                                                                {!! langbind($details, 'title') !!}
                                                                            </p>
                                                                            <p
                                                                                class="mt-2 me-body18 font-normal text-darkgray">
                                                                                {!! langbind($details, 'description') !!}

                                                                            </p>
                                                                        </div>
                                                                    @endforeach
                                                                @endif
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div id="right-side-mobile"
                            class="mobile-milestone milestone-point sm:pt-[303px] right-side sm:mr-[30px] sm:w-[48%]">
                            <div>
                                @foreach ($years as $key => $value)
                                    <div
                                        class="mistone-inner-content @if ($loop->last) last-milestone @endif">
                                        <div class=" sm:pt-0 pt-6">
                                            <p class="font-bold me-body29 text-darkgray milestone-point-reached">
                                                {{ $value->year }}</p>
                                            <div class="milestone-card">
                                                <img src="{{ asset($value->img) }}" alt="milestone1" />
                                                <div class="2xl:py-10 2xl:px-7 py-5 px-5">
                                                    @if (isset($value->milestoneDetail))
                                                        @if ($value->milestoneDetail->count() > 0)
                                                            @foreach ($value->milestoneDetail as $key=>$details)
                                                                <div class="@if($key != 0) mt-8 @endif">
                                                                    <p
                                                                        class="py-2 px-[10px] font-normal text-blueMediq me-body20 bg-paleblue rounded inline-block">
                                                                        {{ config('mediq.month_' . app()->getLocale())[$details->month_en] }}
                                                                    </p>
                                                                    <p class="mt-3 me-body23 text-darkgray font-bold">
                                                                        {!! langbind($details, 'title') !!}
                                                                    </p>
                                                                    <p class="mt-2 me-body18 font-normal text-darkgray">
                                                                        {!! langbind($details, 'description') !!}
                                                                    </p>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div component-name="me-awards-icon-slider"
            class="me-awards-icon-slider-container mt-8 mb-[60px] overflow-x-hidden">
            <div class="me-awards-icon-slider-content">
                <div class=" 4xl:px-[100px]">
                    <h3 class="font-bold me-body32 text-darkgray text-center px-5 lg:mb-[58px] mb-7">
                        {{ langbind($about, 'rewards_title') }}
                    </h3>
                    <div class="me-icon-slider">
                        @if (isset($about) && isset($about->rewords_img))
                            @foreach ($about->rewords_img as $img)
                                <div>
                                    <img src="{{ asset($img) }}" alt="award1"
                                        class="object-contain 4xl:mx-8 w-[146px]" />
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div> --}}
        <div component-name="me-image-link-card" class="me-image-link-card-container mt-[60px] lg:pt-[60px] mb-[120px]">
            <div class="me-image-link-card-content">
                <div class="grid sm:grid-cols-3 gap-5 justify-center items-center 4xl:px-[100px]">

                    <div class="relative">
                        <img src="{{ isset($about) && $about->footer_img1 ? asset($about->footer_img1) : asset('frontend/img/contact-us-card-img.png') }}"
                            alt="contact us card image"
                            class="rounded-tr-[20px] rounded-tl-[20px] rounded-bl-[20px] rounded-br-[100px]" />
                        <a href="{{ route('contact') }}"
                            class="hover:border-blueMediq bg-blueMediq hover:text-whitez absolute left-5 bottom-5 rounded-[50px] inline-block text-darkgray me-body16 font-normal border-1 border-darkgray px-5 py-[8px] card-link-text">
                            @lang('labels.about.contact_us')
                        </a>
                    </div>

                    <div class="relative">
                        <img src="{{ isset($about) && $about->footer_img2 ? asset($about->footer_img2) : asset('frontend/img/contact-us-card-img.png') }}"
                            alt="contact us card image"
                            class="rounded-tr-[20px] rounded-tl-[20px] rounded-bl-[20px] rounded-br-[100px]" />
                        <a href="{{ route('faq') }}"
                            class="hover:border-blueMediq bg-blueMediq hover:text-whitez absolute left-5 bottom-5 rounded-[50px] inline-block text-darkgray me-body16 font-normal border-1 border-darkgray px-5 py-[8px] card-link-text">
                            @lang('labels.product_detail.help_center')
                        </a>
                    </div>

                    <div class="relative">
                        <img src="{{ isset($about) && $about->footer_img3 ? asset($about->footer_img3) : asset('frontend/img/continue-shopping-card-img.png') }}"
                            alt="shopping card image"
                            class="rounded-tr-[20px] rounded-tl-[20px] rounded-bl-[20px] rounded-br-[100px]" />
                        <a href="{{ route('mediq') }}"
                            class="hover:border-blueMediq bg-blueMediq hover:text-whitez absolute left-5 bottom-5 rounded-[50px] inline-block text-darkgray me-body16 font-normal border-1 border-darkgray px-5 py-[8px] card-link-text">
                            @lang('labels.contact.continue_shopping')
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection
@push('scripts')
@endpush

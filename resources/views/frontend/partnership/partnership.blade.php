@extends('frontend.layouts.master')
@include('frontend.seo', ['seo' => isset($partnership) ? $partnership : ''])
@section('content')
    @include('frontend.faq.nav')
    <main>
        <section class="about-us-banner object-cover object-center text-darkgray relative">
            <img src="{{ isset($partnership) && isset($partnership->banner_img) ? $partnership->banner_img : '' }}"
                alt="" class="w-full h-auto min-h-[400px] align-middle object-cover object-center">

            <div class="about-us-banner-container absolute top-0 right-0 bottom-0 left-0">
                <div
                    class="about-us-banner-card bg-light about-us-banner-text-transparent pt-5 pr-5 pb-8 pl-5 xs:pl-8 xl:pt-[30px] xl:pr-[30px] xl:pb-14 xl:pl-14 max-w-md xl:max-w-[38.75rem] rounded-xl rounded-bl-[50px] xl:rounded-[20px] xl:rounded-bl-[100px] absolute top-6 5xs:top-12 2xs:top-20 sm:top-[100px] lg:top-[58px] right-0">
                    <h1 class="text-blueMediq me-head32 font-bold">
                        {{ langbind($partnership, 'banner_title') }}
                    </h1>
                    <div class="me-body-20 mt-1 xl:mt-2 about-us-banner-title">
                        {!! langbind($partnership, 'banner_description') !!}
                    </div>
                </div>
            </div>
        </section>
        <div component-name="me-three-icons" class="me-three-icons-container my-[60px]">
            <div class="me-three-icons-content">
                <h2 class="font-bold me-body32 text-darkgray text-center px-5">
                    {{ langbind($partnership, 'benefit_title') }}
                </h2>
                <div class="grid md:grid-cols-3 md:gap-4 items-center mt-10">

                    <div class="max-w-[400px] mx-auto md:mb-0 mb-8 last:mb-0">
                        <img src="{{ isset($partnership) && isset($partnership->benefit1_img) ? $partnership->benefit1_img : '' }}"
                            alt="benifit-@@i" class="mx-auto" />
                        <p class="mt-4 font-bold me-body23 text-blueMediq text-center">
                            {{ langbind($partnership, 'benefit_text1') }}</p>
                    </div>

                    <div class="max-w-[400px] mx-auto md:mb-0 mb-8 last:mb-0">
                        <img src="{{ isset($partnership) && isset($partnership->benefit2_img) ? $partnership->benefit2_img : '' }}"
                            alt="benifit-@@i" class="mx-auto" />
                        <p class="mt-4 font-bold me-body23 text-blueMediq text-center">
                            {{ langbind($partnership, 'benefit_text2') }}</p>
                    </div>

                    <div class="max-w-[400px] mx-auto md:mb-0 mb-8 last:mb-0">
                        <img src="{{ isset($partnership) && isset($partnership->benefit3_img) ? $partnership->benefit3_img : '' }}"
                            alt="benifit-@@i" class="mx-auto" />
                        <p class="mt-4 font-bold me-body23 text-blueMediq text-center">
                            {{ langbind($partnership, 'benefit_text3') }}</p>
                    </div>

                </div>
            </div>
        </div>
        <div component-name="me-mediq-help-you" class="me-mediq-help-you-container bg-far py-20 mb-[60px]">
            <div class="me-mediq-help-you-content">
                <h3 class="font-bold me-body32 text-darkgray text-center">
                    {{ langbind($partnership, 'help_title') }}
                </h3>
                <div class="flex lg:flex-row flex-col mt-10 items-center">
                    <div class="lg:w-1/2 w-full">
                        <div component-name="me-donut-chart" class="me-donut-chart-container">
                            <div class="me-donut-chart-content 2xl:mr-0 lg:mr-10 mr-0">
                                <input class="hidden cancer-chart-value"
                                    value="{{ isset($partnership) && isset($partnership->percent) ? $partnership->percent : '' }}" />
                                <div class="relative">
                                    <div id="cancerChart"
                                        class="mx-auto 2xl:max-w-[535px] xl:max-w-[480px] htzxs:max-w-[350px] max-w-[300px]">
                                    </div>
                                    <div
                                        class="absolute text-center w-full top-[58%] -translate-y-1/2 left-1/2 -translate-x-1/2 2xl:max-w-[535px] xl:max-w-[480px] htzxs:max-w-[350px] max-w-[300px]">
                                        <p class="text-darkgray font-bold me-body128 text-center px-4 leading-[1]">
                                            {{ isset($partnership) && isset($partnership->percent) ? $partnership->percent : '' }}%
                                        </p>
                                        <p class="font-bold me-body24 text-darkgray mt-4 px-4 max-w-[218px] mx-auto">
                                            {{ langbind($partnership, 'percent_text') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="lg:w-1/2 w-full">
                        <div component-name="me-mediq-help-you-collpase" class="me-mediq-help-you-collpase-container pr-3">
                            <div class="me-mediq-help-you-collpase-content">
                                <div>
                                    @if (isset($partnership_help) && count($partnership_help) > 0)
                                        @foreach ($partnership_help as $key => $help)
                                            <div class="border-b border-b-mee4 pb-10">
                                                <h4
                                                    class="pt-10 font-bold me-body26 text-darkgray cursor-pointer me-help-collapse-title {{ $key == 0 ? 'active' : '' }} flex justify-between items-center">
                                                    {{ langbind($help, 'help_subtitle') }}
                                                </h4>
                                                <div class="me-help-collpase-content">
                                                    <p class="font-normal me-body18 text-darkgray">
                                                        {!! langbind($help, 'help_description') !!}
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif

                                    {{-- <div class="border-b border-b-mee4 pb-10">
                                        <h4
                                            class="pt-10 font-bold me-body26 text-darkgray cursor-pointer me-help-collapse-title  flex justify-between items-center">
                                            Support Team</h4>
                                        <div class="me-help-collpase-content">
                                            <p class="font-normal me-body18 text-darkgray">Want to learn about current
                                                trends and potential
                                                opportunities in the wellness market? Our data can provide the latest market
                                                insights and
                                                information. This allows you to better understand market trends and identify
                                                new potential
                                                opportunities in order to develop effective product and marketing
                                                strategies.</p>
                                        </div>
                                    </div>

                                    <div class="border-b border-b-mee4 pb-10">
                                        <h4
                                            class="pt-10 font-bold me-body26 text-darkgray cursor-pointer me-help-collapse-title  flex justify-between items-center">
                                            Exclusive Page</h4>
                                        <div class="me-help-collpase-content">
                                            <p class="font-normal me-body18 text-darkgray">Want to learn about current
                                                trends and potential
                                                opportunities in the wellness market? Our data can provide the latest market
                                                insights and
                                                information. This allows you to better understand market trends and identify
                                                new potential
                                                opportunities in order to develop effective product and marketing
                                                strategies.</p>
                                        </div>
                                    </div>

                                    <div class="border-b border-b-mee4 pb-10">
                                        <h4
                                            class="pt-10 font-bold me-body26 text-darkgray cursor-pointer me-help-collapse-title  flex justify-between items-center">
                                            Distribution Network</h4>
                                        <div class="me-help-collpase-content">
                                            <p class="font-normal me-body18 text-darkgray">Want to learn about current
                                                trends and potential
                                                opportunities in the wellness market? Our data can provide the latest market
                                                insights and
                                                information. This allows you to better understand market trends and identify
                                                new potential
                                                opportunities in order to develop effective product and marketing
                                                strategies.</p>
                                        </div>
                                    </div>

                                    <div class="border-b border-b-mee4 pb-10">
                                        <h4
                                            class="pt-10 font-bold me-body26 text-darkgray cursor-pointer me-help-collapse-title  flex justify-between items-center">
                                            Write an Article</h4>
                                        <div class="me-help-collpase-content">
                                            <p class="font-normal me-body18 text-darkgray">Want to learn about current
                                                trends and potential
                                                opportunities in the wellness market? Our data can provide the latest market
                                                insights and
                                                information. This allows you to better understand market trends and identify
                                                new potential
                                                opportunities in order to develop effective product and marketing
                                                strategies.</p>
                                        </div>
                                    </div> --}}


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (isset($partnership_detail) && count($partnership_detail) > 0)
            @foreach ($partnership_detail as $key => $detail)
                <div component-name="me-image-text-cardbox" class="me-image-text-cardbox-container my-0">
                    <div class="me-image-text-cardbox-content">
                        <div
                            class="flex {{ $key % 2 == 0 ? 'md:flex-row' : 'md:flex-row-reverse' }} flex-col items-stretch">
                            <div class="md:w-1/2">
                                <img src="{{ isset($detail) && isset($detail->image) ? $detail->image : '' }}"
                                    alt="@@alt" class="rounded-[20px] w-full object-cover" />
                            </div>
                            <div
                                class="6xl:px-[80px] lg:px-10 px-5 6xl:py-[100px] py-10 mt-0 bg-far {{ $key % 2 == 0 ? 'rounded-tr-[20px] rounded-br-[20px]' : 'rounded-tl-[20px] rounded-bl-[20px]' }}  md:w-1/2 flex items-center">
                                <div class="md:max-w-[600px] max-w-full">

                                    <p class="me-body29 font-bold text-darkgray">
                                        <span class="text-blueMediq mr-1">{{ langbind($detail, 'title') }}</span>
                                        {{ langbind($detail, 'title1') }}
                                    </p>
                                    <h3 class="me-body16 font-normal text-darkgray my-5">
                                        {!! langbind($detail, 'description') !!}
                                    </h3>
                                    <div class="flex flex-wrap">
                                        <a href="{{ langbind($detail, 'link') }}"
                                            class="my-1 hover:bg-searchlight block rounded-[200px] font-bold me-body16 text-whitez bg-blueMediq px-4 py-2 mr-5 partner-contact-form-btn">
                                            {{ langbind($detail, 'link_text') }}
                                        </a>
                                        <a href="/"
                                            class="my-1 hidden hover:bg-searchlight block rounded-[200px] font-bold me-body16 text-whitez bg-blueMediq px-4 py-2 partner-contact-form-btn">Other
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        <div component-name="me-3steps-icon-text" class="me-3steps-icon-text-container bg-far py-20 2xl:mt-[120px] mt-20">
            <div class="me-3steps-icon-text-content">
                <div>
                    <h4 class="font-bold me-body32 text-darkgray text-center px-5">
                        {{ langbind($partnership, 'three_step_title') }}
                    </h4>
                    <p class="font-normal me-body18 text-lightgray mt-5 text-center px-5">
                        {{ langbind($partnership, 'three_step_text') }}
                    </p>
                </div>
                <div class="me-3steps-card-content mt-10">
                    <div class="grid md:grid-cols-3 grid-cols-1 lg:gap-12 gap-8">

                        <div class="me-3steps-card">
                            <div>
                                <img src="{{ isset($partnership) && isset($partnership->step1_img) ? asset($partnership->step1_img) : '' }}"
                                    alt="partnership-contact-us"
                                    class="mx-auto xl:max-w-[200px] max-w-[150px] rounded-full" />
                                <div class="mt-10">
                                    <div class="flex max-w-[300px] mx-auto">
                                        <h4 class="font-bold text-darkgray me-body48 mr-5">1</h4>
                                        <div>
                                            <p class="font-bold me-body23 text-darkgray">
                                                {{ langbind($partnership, 'step1_title') }}
                                            </p>
                                            <p class="mt-2 font-normal me-body18 text-darkgray">
                                                {{ langbind($partnership, 'step1_description') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="me-3steps-card">
                            <div>
                                <img src="{{ isset($partnership) && isset($partnership->step2_img) ? asset($partnership->step2_img) : '' }}"
                                    alt="partnership-company-info"
                                    class="mx-auto xl:max-w-[200px] max-w-[150px] rounded-full" />
                                <div class="mt-10">
                                    <div class="flex max-w-[300px] mx-auto">
                                        <h4 class="font-bold text-darkgray me-body48 mr-5">2</h4>
                                        <div>
                                            <p class="font-bold me-body23 text-darkgray">
                                                {{ langbind($partnership, 'step2_title') }}
                                            </p>
                                            <p class="mt-2 font-normal me-body18 text-darkgray">
                                                {{ langbind($partnership, 'step2_description') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="me-3steps-card">
                            <div>
                                <img src="{{ isset($partnership) && isset($partnership->step3_img) ? asset($partnership->step3_img) : '' }}"
                                    alt="partnership-mediq" class="mx-auto xl:max-w-[200px] max-w-[150px] rounded-full" />
                                <div class="mt-10">
                                    <div class="flex max-w-[300px] mx-auto">
                                        <h4 class="font-bold text-darkgray me-body48 mr-5">3</h4>
                                        <div>
                                            <p class="font-bold me-body23 text-darkgray">
                                                {{ langbind($partnership, 'step3_title') }}
                                            </p>
                                            <p class="mt-2 font-normal me-body18 text-darkgray">
                                                {{ langbind($partnership, 'step3_description') }}

                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div component-name="me-contact-us-form" class="me-contact-us-form-container" id="me-contact-us-form">
            <div class="me-contact-us-form-content py-20">
                <h5 class="font-bold me-body32 text-darkgray text-center px-5 leading-[normal]">@lang('labels.contact_us')</h5>
                <div class="mt-10">
                    <div class="flex lg:flex-row flex-col">
                        <div class="lg:mr-8">
                            <img src="{{ isset($partnership) && isset($partnership->contact_us_img) ? $partnership->contact_us_img : '' }}"
                                alt="pexels-anna-shvets-4225880 2" />
                        </div>
                        <div class="lg:w-[70%] w-full lg:mt-0 mt-8">
                            <p class="me-body18 font-normal text-darkgray">
                                {{ langbind($partnership, 'contact_us_text1') }}
                            </p>
                            <form id="captcha66Form">
                                {{-- <div class="mt-8 grid sm:grid-cols-2 lg:gap-5 gap-3">
                                    <div>
                                        <label class="font-normal me-body16 text-darkgray mb-2">@lang('labels.check_out.title') <span
                                                class="text-mered ml-2">*</span></label>
                                        <div class="flex checkout-info-gender mt-2">
                                            <div class="mr-4">
                                                <label for="checkout-male-rdo"
                                                    class=" flex relative min-w-[107px] cursor-pointer">
                                                    <input type="radio" id="checkout-male-rdo"
                                                        name="checkout-gender"
                                                        class="opacity-0 absolute w-full h-full cursor-pointer checkout-male-rdo"
                                                        value="Mr">
                                                    <p
                                                        class="min-w-[107px] text-center font-normal me-body-18 text-darkgray p-[5px] rounded-[4px]">
                                                        @lang('labels.check_out.mr')</p>
                                                </label>
                                            </div>
                                            <div>
                                                <label for="checkout-female-rdo"
                                                    class=" flex relative min-w-[107px] cursor-pointer">
                                                    <input type="radio" id="checkout-female-rdo"
                                                        name="checkout-gender"
                                                        class="opacity-0 absolute w-full h-full cursor-pointer checkout-female-rdo"
                                                        value="Mrs">
                                                    <p
                                                        class="min-w-[107px] text-center font-normal me-body-18 text-darkgray p-[5px] rounded-[4px]">
                                                        @lang('labels.check_out.ms')
                                                    </p>
                                                </label>
                                            </div>
                                        </div>
                                        <span class="text-mered me-body14 block hidden" id="f_name_error">
                                            @lang('labels.check_out.title_validate_message')
                                        </span>
                                    </div>
                                    <div>
                                        <label class="font-normal me-body16 text-darkgray mb-2">@lang('labels.partnership.last_name')<span
                                                class="text-mered ml-2">*</span></label>
                                        <input type="text" id="last_name"
                                            class="w-full font-normal me-body18 text-darkgray placeholder-meA3 py-2 lg:px-5 px-3 focus-within:outline-none focus:outline-none focus-visible:outline-none bg-whitez border-1 border-meA3 rounded-[4px]"
                                            placeholder="@lang('labels.partnership.last_name')" />
                                        <span class="text-mered me-body14 block hidden" id="l_name_error">
                                            @lang('labels.partnership.last_name_required')
                                        </span>
                                    </div>
                                </div> --}}
                                <div class="contact-us-form-first mt-8 grid sm:grid-cols-3 lg:gap-5 gap-3">
                                    <div class="title-name-div">
                                        <label class="font-normal me-body16 text-darkgray mb-2">@lang('labels.check_out.title') <span
                                            class="text-mered ml-2">*</span></label>
                                    <div class="flex checkout-info-gender mt-2">
                                        <div class="mr-4">
                                            <label for="checkout-male-rdo"
                                                class=" flex relative min-w-[107px] cursor-pointer">
                                                <input type="radio" id="checkout-male-rdo"
                                                    name="checkout-gender"
                                                    class="opacity-0 absolute w-full h-full cursor-pointer checkout-male-rdo"
                                                    value="Mr">
                                                <p
                                                    class="min-w-[107px] text-center font-normal me-body-18 text-darkgray p-[5px] rounded-[4px]">
                                                    @lang('labels.check_out.mr')</p>
                                            </label>
                                        </div>
                                        <div>
                                            <label for="checkout-female-rdo"
                                                class=" flex relative min-w-[107px] cursor-pointer">
                                                <input type="radio" id="checkout-female-rdo"
                                                    name="checkout-gender"
                                                    class="opacity-0 absolute w-full h-full cursor-pointer checkout-female-rdo"
                                                    value="Mrs">
                                                <p
                                                    class="min-w-[107px] text-center font-normal me-body-18 text-darkgray p-[5px] rounded-[4px]">
                                                    @lang('labels.check_out.ms')
                                                </p>
                                            </label>
                                        </div>
                                    </div>
                                    <span class="text-mered me-body14 block hidden" id="title_error">
                                        @lang('labels.check_out.title_validate_message')
                                    </span>
                                    </div>
                                    <div class="last-name-div">
                                        <div>
                                            <label class="font-normal me-body16 text-darkgray mb-2">@lang('labels.partnership.last_name')<span
                                                    class="text-mered ml-2">*</span></label>
                                            <input type="text" id="last_name"
                                                class="w-full font-normal me-body18 text-darkgray placeholder-meA3 py-2 lg:px-5 px-3 focus-within:outline-none focus:outline-none focus-visible:outline-none bg-whitez border-1 border-meA3 rounded-[4px]"
                                                placeholder="@lang('labels.partnership.last_name')" />
                                            <span class="text-mered me-body14 block hidden" id="l_name_error">
                                                @lang('labels.partnership.last_name_required')
                                            </span>
                                        </div>
                                    </div>
                                    <div class="first-name-div">
                                        <div>
                                            <label class="font-normal me-body16 text-darkgray mb-2">@lang('labels.partnership.first_name')<span
                                                    class="text-mered ml-2">*</span></label>
                                            <input type="text" id="first_name"
                                                class="w-full font-normal me-body18 text-darkgray placeholder-meA3 py-2 lg:px-5 px-3 focus-within:outline-none focus:outline-none focus-visible:outline-none bg-whitez border-1 border-meA3 rounded-[4px]"
                                                placeholder="@lang('labels.partnership.first_name')" />
                                            <span class="text-mered me-body14 block hidden" id="f_name_error">
                                                @lang('labels.partnership.first_name_required')
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-8 grid sm:grid-cols-2 lg:gap-5 gap-3">
                                    <div class="min-w-[153px] rounded-[4px]">
                                        <label class="font-normal me-body16 text-darkgray mb-2">@lang('labels.partnership.phone')<span
                                                class="text-mered ml-2">*</span></label>
                                        <div class="flex">
                                            <div class="relative mr-2">
                                                <div
                                                    class="4xl:px-5 px-3 flex items-center dropdown-div cursor-pointer border-1 border-meA3 py-2 rounded-[4px] 4xl:min-w-[153px] min-w-[80px]">
                                                    <input class="hidden selected-country-id" id="phone_code" />
                                                    <p class="font-normal me-body18 text-darkgray">+852</p>
                                                    <img src="{{ asset('frontend/img/ic_round-navigate-next.svg') }}"
                                                        alt="ic_round-navigate-next" />
                                                </div>
                                                <ul class="hidden absolute top-full bg-whitez w-full z-[1] dropdownlist">
                                                    <li data-value="+852"
                                                        class="font-normal me-body18 text-darkgray cursor-pointer">+852
                                                    </li>
                                                    <li data-value="+86"
                                                    class="font-normal me-body18 text-darkgray cursor-pointer">+86
                                                    </li>
                                                </ul>

                                            </div>

                                            <input type="text"
                                                class="w-full font-normal me-body18 text-darkgray placeholder-meA3 py-2 lg:px-5 px-3 focus-within:outline-none focus:outline-none focus-visible:outline-none bg-whitez border-1 border-meA3 rounded-[4px]"
                                                placeholder="@lang('labels.partnership.phone')" id="phone" />

                                        </div>
                                        <span class="text-mered me-body14 block hidden" id="phone_number_error">
                                            @lang('labels.partnership.phone_required')
                                        </span>

                                    </div>
                                    <div>
                                        <label class="font-normal me-body16 text-darkgray mb-2">@lang('labels.partnership.business_email')<span
                                                class="text-mered ml-2">*</span></label>
                                        <input type="text" id="business_email"
                                            class="w-full font-normal me-body18 text-darkgray placeholder-meA3 py-2 lg:px-5 px-3 focus-within:outline-none focus:outline-none focus-visible:outline-none bg-whitez border-1 border-meA3 rounded-[4px]"
                                            placeholder="@lang('labels.partnership.business_email')" />
                                        <span class="text-mered me-body14 block hidden" id="business_email_error">
                                            @lang('labels.partnership.business_email_required')
                                        </span>

                                    </div>
                                </div>
                                <div class="mt-8 flex sm:flex-row flex-col">
                                    <div class="sm:w-2/5 w-full sm:pr-5 sm:pb-0 pb-3">
                                        <div class="w-full">
                                            <label class="font-normal me-body16 text-darkgray mb-2">
                                                @lang('labels.partnership.company_name')
                                                <span class="text-mered ml-2">*</span></label>
                                            <input type="text" id="company_name"
                                                class="w-full font-normal me-body18 text-darkgray placeholder-meA3 py-2 lg:px-5 px-3 focus-within:outline-none focus:outline-none focus-visible:outline-none bg-whitez border-1 border-meA3 rounded-[4px]"
                                                placeholder="@lang('labels.partnership.company_name')" />
                                            <span class="text-mered me-body14 block hidden"
                                                id="company_name_error">@lang('labels.partnership.company_name_required')</span>
                                        </div>
                                    </div>
                                    <div class="sm:w-3/5 w-full">
                                        <label class="font-normal me-body16 text-darkgray mb-2">@lang('labels.partnership.company_size')
                                            {{-- <span class="text-mered ml-2">*</span> --}}
                                        </label>
                                        <div class="relative">
                                            <div
                                                class="lg:px-5 px-3 flex items-center dropdown-div cursor-pointer border-1 border-meA3 py-2 rounded-[4px] min-w-[153px]">
                                                <input class="hidden selected-companysize" id="company_size" />
                                                <p
                                                    class="font-normal me-body18 text-meA3 w-[85%] whitespace-nowrap overflow-hidden text-ellipsis">
                                                    @lang('labels.partnership.select_company_size')
                                                </p>
                                                <img src="{{ asset('frontend/img/ic_round-navigate-next.svg') }}"
                                                    alt="ic_round-navigate-next" />
                                            </div>
                                            <ul class="hidden absolute top-full bg-whitez w-full z-[1] dropdownlist">
                                                <li data-value="10"
                                                    class="font-normal me-body18 text-darkgray cursor-pointer">10
                                                </li>
                                                <li data-value="40"
                                                    class="font-normal me-body18 text-darkgray cursor-pointer">40
                                                </li>
                                                <li data-value="70"
                                                    class="font-normal me-body18 text-darkgray cursor-pointer">70
                                                </li>
                                            </ul>
                                        </div>
                                        <span class="text-mered me-body14 block hidden" id="company_size_error">
                                            @lang('labels.partnership.company_size_required')
                                        </span>
                                    </div>
                                </div>
                                <div class="mt-8">
                                    <div>
                                        <label class="font-normal me-body16 text-darkgray mb-2 block">
                                           @lang('labels.partnership.service_option')
                                        <span class="text-mered ml-2">*</span></label>
                                        <div class="mt-2 flex flex-wrap service-options-list">
                                            @foreach (config('mediq.service_option_' . app()->getLocale()) as $k => $value)
                                                <div class="mr-2 mb-2 relative">
                                                    <input type="checkbox"
                                                        class="w-full h-full absolute opacity-0 serviceOption"
                                                        name="serviceOption[]" value="{{ $k }}" />
                                                    <span
                                                        class="me-body16 text-darkgray font-normal border-1 border-meA3 rounded-[4px] inline-block cursor-pointer px-5 py-2">
                                                        {{ $value }}</span>
                                                </div>
                                            @endforeach
                                            {{-- <div class="mr-2 mb-2 relative">
                                                <input type="checkbox" class="w-full h-full opacity-0 absolute serviceOption"
                                                    name="serviceOption[]" value="2" />
                                                <span
                                                    class="me-body16 text-darkgray font-normal border-1 border-meA3 rounded-[4px] inline-block cursor-pointer px-5 py-2">Corporate
                                                    Offer</span>
                                            </div>
                                            <div class="mr-2 mb-2 relative">
                                                <input type="checkbox" class="w-full h-full opacity-0 absolute serviceOption"
                                                    name="serviceOption[]" value="3" />
                                                <span
                                                    class="me-body16 text-darkgray font-normal border-1 border-meA3 rounded-[4px] inline-block cursor-pointer px-5 py-2">Corporate
                                                    Offer</span>
                                            </div>
                                            <div class="mr-2 mb-2 relative">
                                                <input type="checkbox" class="w-full h-full opacity-0 absolute serviceOption"
                                                    name="serviceOption[]" value="4" />
                                                <span
                                                    class="me-body16 text-darkgray font-normal border-1 border-meA3 rounded-[4px] inline-block cursor-pointer px-5 py-2">Corporate
                                                    Offer</span>
                                            </div>
                                            <div class="mr-2 mb-2 relative">
                                                <input type="checkbox" class="w-full h-full opacity-0 absolute serviceOption"
                                                    name="serviceOption[]" value="5" />
                                                <span
                                                    class="me-body16 text-darkgray font-normal border-1 border-meA3 rounded-[4px] inline-block cursor-pointer px-5 py-2">Other</span>
                                            </div> --}}
                                        </div>
                                        <span class="text-mered me-body14 block hidden" id="serviceOption_error">
                                            @lang('labels.partnership.service_option_required')
                                        </span>
                                    </div>
                                </div>
                                <div class="mt-8">
                                    <div class="w-full">
                                        <label class="font-normal me-body16 text-darkgray mb-2 block">
                                           @lang('labels.partnership.budget')
                                        </label>
                                        <div class="relative">
                                            <div
                                                class="lg:px-5 px-3 flex items-center dropdown-div cursor-pointer border-1 border-meA3 py-2 rounded-[4px] min-w-[153px]">
                                                <input class="hidden selected-budget budget" id="budget" />
                                                <p
                                                    class="font-normal me-body18 text-meA3 w-[85%] whitespace-nowrap overflow-hidden text-ellipsis">
                                                   @lang('labels.partnership.select_budget')
                                                </p>
                                                <img src="{{ asset('frontend/img/ic_round-navigate-next.svg') }}"
                                                    alt="ic_round-navigate-next" />
                                            </div>
                                            <ul class="hidden absolute top-full bg-whitez w-full z-[1] dropdownlist">
                                                <li data-id="Below $1000" data-value = "@lang('labels.partnership.below') $1000"
                                                    class="font-normal me-body18 text-darkgray cursor-pointer">@lang('labels.partnership.below') $1000
                                                </li>
                                                <li data-id="$1000 - $3000" data-value="$1000 - $3000"
                                                    class="font-normal me-body18 text-darkgray cursor-pointer">
                                                    $1000 - $3000
                                                </li>
                                                <li data-id="$3000 - $5000" data-value="$3000 - $5000"
                                                    class="font-normal me-body18 text-darkgray cursor-pointer">
                                                    $3000 - $5000
                                                </li>
                                                <li data-id="Above $5000" data-value="@lang('labels.partnership.above') $5000"
                                                    class="font-normal me-body18 text-darkgray cursor-pointer">@lang('labels.partnership.above') $5000
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-8">
                                    <label class="font-normal me-body16 text-darkgray mb-2 block">
                                        @lang('labels.partnership.message')
                                    </label>
                                    <textarea rows="3" id="message"
                                        class="resize-none w-full font-normal me-body18 text-darkgray placeholder-meA3 py-2 lg:px-5 px-3 focus-within:outline-none focus:outline-none focus-visible:outline-none bg-whitez border-1 border-meA3 rounded-[4px]"
                                        placeholder="@lang('labels.partnership.message_p')"></textarea>
                                </div>
                                <div class="mt-8">
                                    <label for="custom-checkbox-agreement" class="relative">
                                        <input type="checkbox" id="custom-checkbox-agreement"
                                            class="opacity-0 w-6 h-6 mr-3 absolute left-0 top-[-2px]" />
                                        <span
                                            class="top-[-2px] custom-checkbox-agreement w-6 h-6 absolute left-0 border-1 border-meA3 rounded-[4px]"></span>
                                        <span class="ml-9">
                                            {{ langbind($partnership, 'contact_us_text2') }}

                                            <span class="text-mered ml-2">*</span></span>
                                    </label>
                                </div>
                                <span class="text-mered me-body14 hidden" id="agreement_error">@lang('labels.partnership.agree')</span>
                                <div class="mt-8">
                                    <button id="captcha66" type="button"
                                        class="g-recaptcha submit_partner min-w-[192px] bg-darkBlueMediQ rounded-md hover:bg-blueMediq px-5 text-whitez me-body18 font-bold py-2">
                                        @lang('labels.log_in_register.submit')
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    {{-- @if (session('success'))
        <dialog component-name="me-compare-status-popup"
            class="csp-container flex items-center justify-center fixed z-[1001] left-0 top-0 w-full h-full bg-transparent overflow-hidden">
            <div class="bg-darkgray rounded-[4px] p-4">
                <p class="me-body16 helvetica-normal text-white">Successfully send!</p>
            </div>
        </dialog>
    @endif --}}
@endsection

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/4.10.0/d3.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/4.10.0/d3.min.js"></script>
@push('scripts')
    <script>
        $(".submit_partner").on("click", function(e) {
            // alert("okk");
            // $(".text-mered").addClass("hidden")
            // $(".text-mered").html("")
            var agreement = document.getElementById("custom-checkbox-agreement").checked;
            console.log(agreement);
            g = ($("#captcha66Form .g-recaptcha-response").val());
            if(agreement == true){
                if ($("#captcha66Form .g-recaptcha-response").val()) {
                value = ($("#captcha66Form .g-recaptcha-response").val());      
                $.ajax({
                    url: "{{ route('partnership.save') }}",
                    type: "POST",
                    data: JSON.stringify({
                        title: $("input[name='checkout-gender']:checked").val(),
                        name: $("#last_name").val(),
                        first_name: $("#first_name").val(),
                        phone_number: $("#phone").val() != "" ? $("#phone_code").val() + $("#phone")
                            .val() : '',
                        business_email: $("#business_email").val(),
                        company_name: $("#company_name").val(),
                        company_size: $("#company_size").val(),
                        serviceOption: $('.serviceOption:checked').map(function() {
                            return $(this).val();
                        }).get(),
                        budget: $("#budget").val(),
                        message: $("#message").val(),
                        agreement: $('#custom-checkbox-agreement').is('checked'),
                    }),
                    dataType: "json",
                    contentType: "application/json",
                    success: function(status) {
                        toastr.success(status.message);
                        setTimeout(() => {
                            document.location.reload();
                        }, 4000);
                    },
                    error: function(data) {
                       
                        $.each(data.responseJSON.errors, function(k, v) {
                            if (k == "title") {
                                let errorTxt = v[0];
                                $("#title_error").html(errorTxt);
                                $("#title_error").removeClass("hidden");
                            }
                            if (k == "first_name") {
                                let errorTxt = v[0];
                                $("#f_name_error").html(errorTxt);
                                $("#f_name_error").removeClass("hidden");
                            }
                            if (k == "name") {
                                let errorTxt = v[0];
                                $("#l_name_error").html(errorTxt);
                                $("#l_name_error").removeClass("hidden");
                            }
                            if (k == "phone_number") {
                                let errorTxt = v[0];
                                $("#phone_number_error").html(errorTxt);
                                $("#phone_number_error").removeClass("hidden");
                            }
                            if (k == "business_email") {
                                let errorTxt = v[0];
                                $("#business_email_error").html(errorTxt);
                                $("#business_email_error").removeClass("hidden");
                            }
                            if (k == "company_name") {
                                let errorTxt = v[0];
                                $("#company_name_error").html(errorTxt);
                                $("#company_name_error").removeClass("hidden");
                            }
                            if (k == "company_size") {
                                let errorTxt = v[0];
                                $("#company_size_error").html(errorTxt);
                                $("#company_size_error").removeClass("hidden");
                            }
                            if (k == "serviceOption") {
                                let errorTxt = v[0];
                                $("#serviceOption_error").html(errorTxt); agreement_error
                                $("#serviceOption_error").removeClass("hidden");
                            }
                        });
                    }
                });
            }
            }
            else {
                $("#agreement_error").removeClass("hidden");
                return;
            }
        });
    </script>
@endpush

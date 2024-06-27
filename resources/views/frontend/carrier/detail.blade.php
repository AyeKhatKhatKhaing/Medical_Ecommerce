@extends('frontend.layouts.master')
@include('frontend.seo', ['seo' => isset($carrier_page) ? $carrier_page : ''])
@section('content')
    <div component="me-careers-banner" class="me-careers-banner-container">
        <div class="me-careers-banner-content relative">
            <img src="{{ isset($carrier_page) ? asset($carrier_page->img) : asset('frontend/img/flat-lay-pills-stethoscope-arrangement.png') }}"
                alt="flat-lay-pills-stethoscope-arrangement" class=" min-h-[150px] object-cover w-full" />
            <p class="font-bold me-body32 text-far absolute custom-padding-left left-0 top-1/2 -translate-y-1/2">
                {{ langbind($carrier_page, 'title') }}</p>
        </div>
    </div>
    <div component-name="me-career-inner-contents" class="me-career-inner-contents-container lg:mb-[120px] mb-20">
        <div class="me-career-inner-contents-content">
            <div component-name="me-careers-breadcrumb" class="me-careers-breadcrumb-container my-10">
                <div class="flex flex-wrap items-center">
                    <p class="font-normal me-body16 text-darkgray sm:mr-[10px] mr-3"> {{ langbind($carrier_page, 'sub_title') }}</p>
                    <span class="inline-block sm:mr-[10px] mr-3"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                            height="17" viewBox="0 0 16 17" fill="none">
                            <path
                                d="M6.51612 12.4727C6.36455 12.4024 6.2958 12.2259 6.35987 12.0681C6.37705 12.0259 6.86924 11.5259 8.14424 10.2571L9.90674 8.50243L8.14424 6.7493C6.86768 5.47743 6.37705 4.97899 6.35987 4.9368C6.34737 4.90399 6.33643 4.8493 6.33643 4.81493C6.33643 4.58993 6.56455 4.43837 6.76612 4.53212C6.85518 4.5743 10.5802 8.28212 10.6192 8.36962C10.6567 8.4493 10.6567 8.55555 10.6192 8.63524C10.5802 8.72274 6.85518 12.4306 6.76612 12.4727C6.68643 12.5102 6.5958 12.5102 6.51612 12.4727Z"
                                fill="#333333" />
                        </svg></span>
                    <p class="font-normal me-body16 text-blueMediq">{{ langbind($carrier, 'name') }}</p>
                </div>
            </div>
            <div class="flex md:flex-row flex-col-reverse">
                <div component-name="me-careers-inner-content"
                    class="me-careers-inner-content-container max-w-[1017px] md:mr-10">
                    <div class="me-careers-inner-content">
                        <div>
                            <h1 class="font-bold me-body26 text-blueMediq">{{ langbind($carrier, 'name') }}</h1>
                            <div class="flex items-center">
                                <span class="font-normal me-body16 text-darkgray mr-4">
                                    @if($carrier->department)
                                    {{langbind($carrier->department,'name')}}
                                    @endif
                                </span>
                                <span class="font-normal me-body16 text-darkgray mr-4">{{langbind($carrier->area,'name')}}@if( langbind($carrier->area, 'name') ), @endif @lang('labels.check_out_complete.hk')</span>
                            </div>
                        </div>
                        <hr class="lg:my-10 my-6 bg-mee4" />
                        {{-- <div>
                            <h2 class="font-bold me-body23 text-darkgray">Role Summary</h2>
                            <p class="font-normal me-body18 text-darkgray">
                                Worem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit
                                interdum, ac
                                aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
                                inceptos
                                himenaeos. Curabitur tempus urna at turpis condimentum lobortis. Ut commodo efficitur neque.
                                <br /><br />
                                Worem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit
                                interdum, ac
                                aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
                                inceptos
                                himenaeos. Curabitur tempus urna at turpis condimentum lobortis. Ut commodo efficitur neque.
                            </p>
                        </div>
                        <div class="mt-10">
                            <h2 class="font-bold me-body23 text-darkgray">About the Role</h2>
                            <p class="font-normal me-body18 text-darkgray">
                                Worem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit
                                interdum, ac
                                aliquet odio mattis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
                                inceptos
                                himenaeos. Curabitur tempus urna at turpis condimentum lobortis. Ut commodo efficitur neque.
                            </p>
                        </div>
                        <div class="mt-10">
                            <h2 class="font-bold me-body23 text-darkgray">Responsibilities</h2>
                            <ul class="list-disc pl-4">
                                <li class="font-normal me-body18 text-darkgray">Qorem ipsum dolor sit amet, consectetur
                                    adipiscing
                                    elit.</li>
                                <li class="font-normal me-body18 text-darkgray">Qorem ipsum dolor sit amet, consectetur
                                    adipiscing
                                    elit.</li>
                                <li class="font-normal me-body18 text-darkgray">Qorem ipsum dolor sit amet, consectetur
                                    adipiscing
                                    elit.</li>
                                <li class="font-normal me-body18 text-darkgray">Qorem ipsum dolor sit amet, consectetur
                                    adipiscing
                                    elit.</li>
                                <li class="font-normal me-body18 text-darkgray">Qorem ipsum dolor sit amet, consectetur
                                    adipiscing
                                    elit.</li>
                                <li class="font-normal me-body18 text-darkgray">Qorem ipsum dolor sit amet, consectetur
                                    adipiscing
                                    elit.</li>
                            </ul>
                        </div> --}}
                        {!! langbind($carrier, 'content') !!}
                    </div>
                </div>
                <div component-name="me-apply-jop-sticky-box" class="me-apply-jop-sticky-box-container md:mb-0 mb-8">
                    <div
                        class="me-apply-jop-sticky-box-content sticky top-40 7xl:w-[502px] 2xl:w-[400px] w-[300px] bg-whitez lg:p-10 p-4">
                        <a href="mailto:'enquiry@mediq.com.hk'"
                            class="block bg-blueMediq hover:bg-searchlight text-center w-full px-[14px] py-3 rounded-[30px] text-whitez me-body16 font-bold">
                           @lang('labels.career.apply')
                        </a>
                        <div class="mt-5">
                            <p class="font-normal me-body16 text-darkgray">@lang('labels.career.share')</p>
                            <div class="flex items-center mt-1">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ url('/career/' . $carrier->id) }}" class="block mr-[10px]">
                                    <img src="{{ asset('frontend/img/career-fb-update.svg') }}" alt="fb" />
                                </a>
                                <a href="https://wa.me/?text={{ url('/career/' . $carrier->id) }}" class="block mr-[10px]">
                                    <img src="{{ asset('frontend/img/career-whatsapp.svg') }}" alt="whatsapp" class="max-w-[32px]" />
                                </a>
                                <a href="https://api.qrserver.com/v1/create-qr-code/?size=154x154&data={{ url('/career/' . $carrier->id) }}" class="block mr-[10px]">
                                    <img src="{{ asset('frontend/img/career-wechat.svg') }}" alt="wechat" class="max-w-[32px]" />
                                </a>
                            </div>
                            <div class="mt-5">
                                <div>
                                    <p class="font-normal me-body16 text-lightgray">@lang('labels.product_detail.location')</p>
                                    <p class="font-normal me-body18 text-darkgray">
                                        {{-- {{langbind($carrier->area,'name')}} @if( langbind($carrier->area,'name')),@endif @lang('labels.check_out_complete.hk') --}}
                                        {{langbind($carrier->area,'name')}}@if( langbind($carrier->area, 'name') ), @endif @lang('labels.check_out_complete.hk')
                                    </p>
                                </div>
                                <div class="mt-5">
                                    <p class="font-normal me-body16 text-lightgray">@lang('labels.career.department')</p>
                                    <p class="font-normal me-body18 text-darkgray">
                                        @if($carrier->department)
                                        {{langbind($carrier->department,'name')}}
                                        @endif
                                    </p>
                                </div>
                                <div class="mt-5">
                                    <p class="font-normal me-body16 text-lightgray">@lang('labels.career.employment_type')</p>
                                    <p class="font-normal me-body18 text-darkgray">
                                        @if($carrier->employment_type)
                                        {{config("mediq.employment_types_".app()->getLocale())[$carrier->employment_type]}}
                                        @endif
                                    </p>
                                </div>
                                <div class="mt-5">
                                    <p class="font-normal me-body16 text-lightgray">@lang('labels.career.min_experience')</p>
                                    <p class="font-normal me-body18 text-darkgray">{{config("mediq.exp_level_".app()->getLocale())[$carrier->exp_level]}}</p>
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
@endpush

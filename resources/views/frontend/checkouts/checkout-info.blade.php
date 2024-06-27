@extends('frontend.checkouts.layouts.master')
@include('frontend.seo', ['seo' => isset($seo) ? $seo : ''])
@section('content')
@include('frontend.checkouts.page_url',['offlinePaymentStatus'=>isset($summaryData->offlinePayment)?$summaryData->offlinePayment:true])
@php $isOfflinePayment = isset($summaryData->offlinePayment)?$summaryData->offlinePayment:true ; @endphp
<div component-name="me-checkout-enter-info-card" class="me-checkout-enter-info-card">
    <div class="me-checkout-enter-info-card-container flex lg:flex-row flex-col">
        <div class="me-checkout-enter-info-card-left-container 2xl:mr-10 mr-4">
            <div component-name="me-checkout-contact-info" class="me-checkout-contact-info-container my-10">
                <div class="lg:px-10 sm:px-5 px-4 py-5 bg-whitez rounded-[12px] me-checkout-contact-info">
                    <h1 class="font-bold me-body-23 text-darkgray text-left">@lang('labels.check_out.contact_information')</h1>
                   {{-- <p class="text-left font-normal me-body-16 text-darkgray">@lang('labels.check_out.will_contact')</p> --}}
                    <hr class="my-5 bg-mee4" />
                    <div class="flex flex-justify-between w-full checkout-info-data">
                        <div class="flex flex-wrap w-full">
                            <div class="7xl:mr-[100px] 3xl:mr-[80px] xl:mr-[30px] mr-5 my-2">
                                <p class="font-normal me-body-16 text-darkgray leading-[140%]">@lang('labels.check_out.name')</p>
                                <div class="flex items-center mt-1">
                                    <p class="font-bold me-body-18 text-darkgray leading-[120%] mr-[6px]">{{isset($customer->title_full_name) ? $customer->title_full_name.'.' : ''}}
                                        {{$customer->last_name.' '.$customer->first_name}}</p>
                                    <div class="hidden">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20" fill="none">
                                            <path
                                                d="M13.4563 7.79375C13.544 7.88164 13.5933 8.00078 13.5933 8.125C13.5933 8.24922 13.544 8.36836 13.4563 8.45625L9.08125 12.8313C8.99336 12.919 8.87422 12.9683 8.75 12.9683C8.62578 12.9683 8.50664 12.919 8.41875 12.8313L6.54375 10.9563C6.46095 10.8674 6.41588 10.7499 6.41802 10.6284C6.42016 10.507 6.46936 10.3911 6.55524 10.3052C6.64112 10.2194 6.75699 10.1702 6.87843 10.168C6.99987 10.1659 7.11739 10.2109 7.20625 10.2937L8.75 11.8367L12.7938 7.79375C12.8816 7.70597 13.0008 7.65666 13.125 7.65666C13.2492 7.65666 13.3684 7.70597 13.4563 7.79375ZM17.9688 10C17.9688 11.5761 17.5014 13.1167 16.6258 14.4272C15.7502 15.7377 14.5056 16.759 13.0495 17.3622C11.5934 17.9653 9.99116 18.1231 8.44538 17.8156C6.89959 17.5082 5.4797 16.7492 4.36525 15.6348C3.2508 14.5203 2.49185 13.1004 2.18437 11.5546C1.87689 10.0088 2.0347 8.40659 2.63784 6.95049C3.24097 5.49439 4.26235 4.24984 5.5728 3.37423C6.88326 2.49861 8.42393 2.03125 10 2.03125C12.1127 2.03373 14.1381 2.87409 15.632 4.36798C17.1259 5.86188 17.9663 7.88732 17.9688 10ZM17.0313 10C17.0313 8.60935 16.6189 7.24993 15.8463 6.09365C15.0737 4.93736 13.9755 4.03615 12.6907 3.50397C11.406 2.97179 9.9922 2.83255 8.62827 3.10385C7.26435 3.37516 6.0115 4.04482 5.02816 5.02816C4.04482 6.01149 3.37516 7.26434 3.10386 8.62827C2.83255 9.9922 2.9718 11.406 3.50398 12.6907C4.03615 13.9755 4.93737 15.0737 6.09365 15.8463C7.24993 16.6189 8.60935 17.0312 10 17.0312C11.8642 17.0292 13.6514 16.2877 14.9696 14.9696C16.2877 13.6514 17.0292 11.8642 17.0313 10Z"
                                                fill="#63C355" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div class="7xl:mr-[100px] 3xl:mr-[80px] xl:mr-[30px] mr-5 my-2">
                                <p class="font-normal me-body-16 text-darkgray leading-[140%]">@lang('labels.check_out.phone_number')</p>
                                <div class="flex items-center mt-1">
                                    <p class="font-bold me-body-18 text-darkgray leading-[120%] mr-[6px]">

                                        {{$customer->phone}}</p>
                                    @isset($customer->phone)
                                    <div class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20" fill="none">
                                            <path
                                                d="M13.4563 7.79375C13.544 7.88164 13.5933 8.00078 13.5933 8.125C13.5933 8.24922 13.544 8.36836 13.4563 8.45625L9.08125 12.8313C8.99336 12.919 8.87422 12.9683 8.75 12.9683C8.62578 12.9683 8.50664 12.919 8.41875 12.8313L6.54375 10.9563C6.46095 10.8674 6.41588 10.7499 6.41802 10.6284C6.42016 10.507 6.46936 10.3911 6.55524 10.3052C6.64112 10.2194 6.75699 10.1702 6.87843 10.168C6.99987 10.1659 7.11739 10.2109 7.20625 10.2937L8.75 11.8367L12.7938 7.79375C12.8816 7.70597 13.0008 7.65666 13.125 7.65666C13.2492 7.65666 13.3684 7.70597 13.4563 7.79375ZM17.9688 10C17.9688 11.5761 17.5014 13.1167 16.6258 14.4272C15.7502 15.7377 14.5056 16.759 13.0495 17.3622C11.5934 17.9653 9.99116 18.1231 8.44538 17.8156C6.89959 17.5082 5.4797 16.7492 4.36525 15.6348C3.2508 14.5203 2.49185 13.1004 2.18437 11.5546C1.87689 10.0088 2.0347 8.40659 2.63784 6.95049C3.24097 5.49439 4.26235 4.24984 5.5728 3.37423C6.88326 2.49861 8.42393 2.03125 10 2.03125C12.1127 2.03373 14.1381 2.87409 15.632 4.36798C17.1259 5.86188 17.9663 7.88732 17.9688 10ZM17.0313 10C17.0313 8.60935 16.6189 7.24993 15.8463 6.09365C15.0737 4.93736 13.9755 4.03615 12.6907 3.50397C11.406 2.97179 9.9922 2.83255 8.62827 3.10385C7.26435 3.37516 6.0115 4.04482 5.02816 5.02816C4.04482 6.01149 3.37516 7.26434 3.10386 8.62827C2.83255 9.9922 2.9718 11.406 3.50398 12.6907C4.03615 13.9755 4.93737 15.0737 6.09365 15.8463C7.24993 16.6189 8.60935 17.0312 10 17.0312C11.8642 17.0292 13.6514 16.2877 14.9696 14.9696C16.2877 13.6514 17.0292 11.8642 17.0313 10Z"
                                                fill="#63C355" />
                                        </svg>
                                    </div>
                                    @endisset
                                </div>
                            </div>

                            <div class="7xl:mr-[100px] 3xl:mr-[80px] xl:mr-[30px] mr-5 my-2">
                                <p class="font-normal me-body-16 text-darkgray leading-[140%]">@lang('labels.check_out.email')</p>
                                <div class="flex items-center mt-1">
                                    <p class="font-bold me-body-18 text-darkgray leading-[120%] mr-[6px]">
                                        {{$customer->email}}</p>
                                    <div class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20" fill="none">
                                            <path
                                                d="M13.4563 7.79375C13.544 7.88164 13.5933 8.00078 13.5933 8.125C13.5933 8.24922 13.544 8.36836 13.4563 8.45625L9.08125 12.8313C8.99336 12.919 8.87422 12.9683 8.75 12.9683C8.62578 12.9683 8.50664 12.919 8.41875 12.8313L6.54375 10.9563C6.46095 10.8674 6.41588 10.7499 6.41802 10.6284C6.42016 10.507 6.46936 10.3911 6.55524 10.3052C6.64112 10.2194 6.75699 10.1702 6.87843 10.168C6.99987 10.1659 7.11739 10.2109 7.20625 10.2937L8.75 11.8367L12.7938 7.79375C12.8816 7.70597 13.0008 7.65666 13.125 7.65666C13.2492 7.65666 13.3684 7.70597 13.4563 7.79375ZM17.9688 10C17.9688 11.5761 17.5014 13.1167 16.6258 14.4272C15.7502 15.7377 14.5056 16.759 13.0495 17.3622C11.5934 17.9653 9.99116 18.1231 8.44538 17.8156C6.89959 17.5082 5.4797 16.7492 4.36525 15.6348C3.2508 14.5203 2.49185 13.1004 2.18437 11.5546C1.87689 10.0088 2.0347 8.40659 2.63784 6.95049C3.24097 5.49439 4.26235 4.24984 5.5728 3.37423C6.88326 2.49861 8.42393 2.03125 10 2.03125C12.1127 2.03373 14.1381 2.87409 15.632 4.36798C17.1259 5.86188 17.9663 7.88732 17.9688 10ZM17.0313 10C17.0313 8.60935 16.6189 7.24993 15.8463 6.09365C15.0737 4.93736 13.9755 4.03615 12.6907 3.50397C11.406 2.97179 9.9922 2.83255 8.62827 3.10385C7.26435 3.37516 6.0115 4.04482 5.02816 5.02816C4.04482 6.01149 3.37516 7.26434 3.10386 8.62827C2.83255 9.9922 2.9718 11.406 3.50398 12.6907C4.03615 13.9755 4.93737 15.0737 6.09365 15.8463C7.24993 16.6189 8.60935 17.0312 10 17.0312C11.8642 17.0292 13.6514 16.2877 14.9696 14.9696C16.2877 13.6514 17.0292 11.8642 17.0313 10Z"
                                                fill="#63C355" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div>
                            <p
                                class="contact-info-edit cursor-pointer font-normal me-body-16 text-darkgray underline hover:text-orangeMediq">
                                @lang('labels.check_out.edit')</p>
                        </div>
                    </div>
                    <div class="hidden me-checkout-contact-info-edit-card">
                        <div data-id="contact-info-1" component-name="me-checkout-contact-info-edit"
                            class="me-checkout-contact-info-edit-container me-checkout-contact-info-edit-form">
                            <div class="rounded-[12px] me-checkout-contact-info-edit">
                                <div class="">
                                    <div>
                                        <p class="font-normal me-body-16 text-darkgray">@lang('labels.check_out.title')<span class="hidden ml-2 text-mered me-body-16 font-normal contact-title-required-message">{{__('labels.check_out.title_validate_message')}}</span></p>
                                        <div class="flex checkout-info-gender mt-2">
                                            <div class="mr-4">
                                                <label for="checkout-male-rdo-contact-info-1"
                                                    class=" flex relative min-w-[107px] cursor-pointer">
                                                    <input type="radio" id="checkout-male-rdo-contact-info-1"
                                                        name="checkout-gender-contact-info-1" value="Mr"
                                                        class="opacity-0 absolute w-full h-full cursor-pointer checkout-male-rdo"
                                                        {{$customer->title_full_name == "Mr" ? 'checked' : ''}} />
                                                    <p
                                                        class="min-w-[107px] text-center font-normal me-body-18 text-darkgray p-[5px] rounded-[4px]">
                                                        @lang('labels.check_out.mr')</p>
                                                </label>
                                            </div>
                                            <div>
                                                <label for="checkout-female-rdo-contact-info-1"
                                                    class=" flex relative min-w-[107px] cursor-pointer">
                                                    <input type="radio" id="checkout-female-rdo-contact-info-1"
                                                        name="checkout-gender-contact-info-1" value="Mrs"
                                                        class="opacity-0 absolute w-full h-full cursor-pointer checkout-male-rdo"
                                                        {{$customer->title_full_name == "Mrs" ? 'checked' : ''}} />
                                                    <p
                                                        class="min-w-[107px] text-center font-normal me-body-18 text-darkgray p-[5px] rounded-[4px]">
                                                        @lang('labels.check_out.ms')</p>
                                                </label>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="flex xl:justify-between xl:flex-row flex-col">
                                        <div class="xl:w-[48.5%] w-full xl:mr-[30px] mt-5">
                                            <p class="font-normal me-body-16 text-darkgray">@lang('labels.check_out.last_name')
                                                <span class="text-mered me-body-16 font-normal contact-edit-lastname-validate-msg hidden ml-2">{{__('labels.check_out.last_name_validate')}}</span>
                                                <span class="text-mered me-body-16 font-normal contact-edit-lastname-required-msg hidden ml-2">{{__('labels.partnership.last_name_required')}}</span>
                                            </p>
                                            <div
                                                class="w-full border-1 text-darkgray border-meA3 me-body-18 font-normal bg-meBg rounded-[4px] lg:px-5 px-3 py-2 flex items-center">
                                                <input value="{{$customer->last_name}}" type="text"
                                                    placeholder="@lang('labels.check_out.en_last_name')"
                                                    class="contact-info-lastname-contact-info-1 text-darkgray bg-transparent font-normal me-body-18 w-full focus:outline-none focus-visible:outline-none" />
                                                <div class="hidden">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <path
                                                            d="M12.5908 10.6914C12.5641 10.5439 12.4831 10.4117 12.3638 10.3209C12.2445 10.2301 12.0955 10.1872 11.9462 10.2008C11.7969 10.2143 11.658 10.2833 11.557 10.3941C11.456 10.5049 11.4001 10.6495 11.4004 10.7994V16.2018L11.41 16.3098C11.4367 16.4573 11.5177 16.5895 11.637 16.6803C11.7563 16.7712 11.9053 16.814 12.0546 16.8005C12.2039 16.7869 12.3428 16.718 12.4438 16.6072C12.5448 16.4964 12.6007 16.3517 12.6004 16.2018V10.7994L12.5908 10.6914ZM12.9592 8.09941C12.9592 7.86072 12.8644 7.6318 12.6956 7.46302C12.5268 7.29423 12.2979 7.19941 12.0592 7.19941C11.8205 7.19941 11.5916 7.29423 11.4228 7.46302C11.254 7.6318 11.1592 7.86072 11.1592 8.09941C11.1592 8.33811 11.254 8.56703 11.4228 8.73581C11.5916 8.90459 11.8205 8.99941 12.0592 8.99941C12.2979 8.99941 12.5268 8.90459 12.6956 8.73581C12.8644 8.56703 12.9592 8.33811 12.9592 8.09941ZM21.6004 11.9994C21.6004 9.45333 20.589 7.01154 18.7886 5.21119C16.9883 3.41084 14.5465 2.39941 12.0004 2.39941C9.45431 2.39941 7.01251 3.41084 5.21217 5.21119C3.41182 7.01154 2.40039 9.45333 2.40039 11.9994C2.40039 14.5455 3.41182 16.9873 5.21217 18.7876C7.01251 20.588 9.45431 21.5994 12.0004 21.5994C14.5465 21.5994 16.9883 20.588 18.7886 18.7876C20.589 16.9873 21.6004 14.5455 21.6004 11.9994ZM3.60039 11.9994C3.60039 10.8963 3.81766 9.80401 4.2398 8.78487C4.66194 7.76574 5.28068 6.83973 6.06069 6.05972C6.8407 5.2797 7.76671 4.66096 8.78585 4.23883C9.80498 3.81669 10.8973 3.59941 12.0004 3.59941C13.1035 3.59941 14.1958 3.81669 15.2149 4.23883C16.2341 4.66096 17.1601 5.2797 17.9401 6.05972C18.7201 6.83973 19.3388 7.76574 19.761 8.78487C20.1831 9.80401 20.4004 10.8963 20.4004 11.9994C20.4004 14.2272 19.5154 16.3638 17.9401 17.9391C16.3648 19.5144 14.2282 20.3994 12.0004 20.3994C9.77257 20.3994 7.636 19.5144 6.06069 17.9391C4.48539 16.3638 3.60039 14.2272 3.60039 11.9994Z"
                                                            fill="#FE4C26" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="xl:w-[48.5%] w-full mt-5">
                                            <p class="font-normal me-body-16 text-darkgray">@lang('labels.check_out.first_name')
                                                <span class="text-mered me-body-16 font-normal contact-edit-firstname-validate-msg hidden ml-2">{{__('labels.check_out.first_name_validate')}}</span>
                                                <span class="text-mered me-body-16 font-normal contact-edit-firstname-required-msg hidden ml-2">{{__('labels.partnership.first_name_required')}}</span>
                                            </p>
                                            <div
                                                class="w-full border-1 text-darkgray border-meA3 me-body-18 font-normal bg-meBg rounded-[4px] lg:px-5 px-3 py-2 flex items-center">
                                                <input value="{{$customer->first_name}}" type="text"
                                                    placeholder="@lang('labels.check_out.en_first_name')"
                                                    class="contact-info-firstname-contact-info-1 text-darkgray bg-transparent font-normal me-body-18 w-full focus:outline-none focus-visible:outline-none" />
                                                <div class="hidden">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <path
                                                            d="M12.5908 10.6914C12.5641 10.5439 12.4831 10.4117 12.3638 10.3209C12.2445 10.2301 12.0955 10.1872 11.9462 10.2008C11.7969 10.2143 11.658 10.2833 11.557 10.3941C11.456 10.5049 11.4001 10.6495 11.4004 10.7994V16.2018L11.41 16.3098C11.4367 16.4573 11.5177 16.5895 11.637 16.6803C11.7563 16.7712 11.9053 16.814 12.0546 16.8005C12.2039 16.7869 12.3428 16.718 12.4438 16.6072C12.5448 16.4964 12.6007 16.3517 12.6004 16.2018V10.7994L12.5908 10.6914ZM12.9592 8.09941C12.9592 7.86072 12.8644 7.6318 12.6956 7.46302C12.5268 7.29423 12.2979 7.19941 12.0592 7.19941C11.8205 7.19941 11.5916 7.29423 11.4228 7.46302C11.254 7.6318 11.1592 7.86072 11.1592 8.09941C11.1592 8.33811 11.254 8.56703 11.4228 8.73581C11.5916 8.90459 11.8205 8.99941 12.0592 8.99941C12.2979 8.99941 12.5268 8.90459 12.6956 8.73581C12.8644 8.56703 12.9592 8.33811 12.9592 8.09941ZM21.6004 11.9994C21.6004 9.45333 20.589 7.01154 18.7886 5.21119C16.9883 3.41084 14.5465 2.39941 12.0004 2.39941C9.45431 2.39941 7.01251 3.41084 5.21217 5.21119C3.41182 7.01154 2.40039 9.45333 2.40039 11.9994C2.40039 14.5455 3.41182 16.9873 5.21217 18.7876C7.01251 20.588 9.45431 21.5994 12.0004 21.5994C14.5465 21.5994 16.9883 20.588 18.7886 18.7876C20.589 16.9873 21.6004 14.5455 21.6004 11.9994ZM3.60039 11.9994C3.60039 10.8963 3.81766 9.80401 4.2398 8.78487C4.66194 7.76574 5.28068 6.83973 6.06069 6.05972C6.8407 5.2797 7.76671 4.66096 8.78585 4.23883C9.80498 3.81669 10.8973 3.59941 12.0004 3.59941C13.1035 3.59941 14.1958 3.81669 15.2149 4.23883C16.2341 4.66096 17.1601 5.2797 17.9401 6.05972C18.7201 6.83973 19.3388 7.76574 19.761 8.78487C20.1831 9.80401 20.4004 10.8963 20.4004 11.9994C20.4004 14.2272 19.5154 16.3638 17.9401 17.9391C16.3648 19.5144 14.2282 20.3994 12.0004 20.3994C9.77257 20.3994 7.636 19.5144 6.06069 17.9391C4.48539 16.3638 3.60039 14.2272 3.60039 11.9994Z"
                                                            fill="#FE4C26" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex xl:justify-between xl:flex-row flex-col">
                                        <div class="xl:w-[48.5%] w-full xl:mr-[30px] mt-5">
                                            <p class="font-normal me-body-16 text-darkgray">{{__('labels.check_out.phone_number')}}
                                                <span class="text-mered me-body-16 font-normal contact-number-empty-required-msg hidden ml-2">{{__('labels.partnership.phone_required')}}</span>
                                                <span class="text-mered me-body-16 font-normal contact-edit-phno-required-msg hidden ml-2">{{__('labels.check_out.ph_no_must_8digit')}}</span>
                                                <span class="text-mered me-body-16 font-normal contact-edit-invalid-phno-required-msg hidden ml-2">{{__('labels.log_in_register.invalid_number')}}</span>
                                                <a href="{{route('dashboard.myacc.basicinfo')}}" class="phno-verify-msg hidden">
                                                    <span class="text-mered me-body-16 font-normal ml-2">{{__('labels.phone_verify_sms')}}</span>
                                                </a>
                                                <span class="text-mered me-body-16 font-normal phno-required-msg hidden ml-2"></span>
                                            </p>
                                            @php
                                                $checkCode = isset($customer->phone) ? str_split($customer->phone , 3) : '+852';
                                                if($checkCode[0] == "+86"){
                                                    $digit = 3;
                                                }else{
                                                    $digit = 4;
                                                }
                                                $code = isset($customer->phone) ? str_split($customer->phone , $digit) : '+852';
                                                $phone = isset($customer->phone) ? substr($customer->phone , $digit) : null;
                                                if($code[0] == '+'){
                                                    $pcode = '+852';
                                                }else{
                                                    $pcode = $code[0];
                                                }
                                            @endphp
                                            <input value="{{$pcode}}" class="hidden country-code-item mr-2 selected-text contact-info-countrycode-contact-info-1 c_code" />
                                            <div class="flex items-stretch">
                                                <div class="mr-3">
                                                    <div class="relative h-full">
                                                        <div
                                                            class=" h-full country-code-item flex items-center country-code-text cursor-pointer py-[0.35rem] px-3 border-1 border-meA3 rounded-[4px] font-normal me-body-18 text-darkgray" >
                                                            <p
                                                                data-id="contact-info-1" class="country-code-item mr-2 selected-text contact-info-countrycode-contact-info-1">
                                                                {{isset($customer->phone) ? $pcode : '+852'}}
                                                            </p>
                                                            <div class="country-code-item">
                                                                <svg class="country-code-item"
                                                                    xmlns="http://www.w3.org/2000/svg" width="12"
                                                                    height="8" viewBox="0 0 12 8" fill="none">
                                                                    <path
                                                                        d="M11.9533 1.03687C11.8478 0.809527 11.5829 0.706402 11.3462 0.802496C11.2829 0.828277 10.5329 1.56656 8.62982 3.47906L5.99778 6.12281L3.3681 3.47906C1.46028 1.56421 0.712627 0.828277 0.649346 0.802496C0.600127 0.783746 0.518096 0.76734 0.466533 0.76734C0.129033 0.76734 -0.0983104 1.10953 0.0423146 1.41187C0.105596 1.54546 5.66731 7.13297 5.79856 7.19156C5.9181 7.24781 6.07747 7.24781 6.197 7.19156C6.32825 7.13297 11.89 1.54546 11.9533 1.41187C12.0095 1.29234 12.0095 1.1564 11.9533 1.03687Z"
                                                                        fill="#7C7C7C" />
                                                                </svg>
                                                            </div>
                                                        </div>
                                                        <ul
                                                            class="country-code-list hidden absolute top-full bg-whitez w-full country-code-item z-[1]">
                                                            <li
                                                                class="px-3 py-1 font-normal me-body-18 text-darkgray cursor-pointer country-code-item">
                                                                +852</li>
                                                            <li
                                                                class="px-3 py-1 font-normal me-body-18 text-darkgray cursor-pointer country-code-item">
                                                                +86</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div
                                                    class="w-full border-1 border-meA3 rounded-[4px] lg:px-5 px-3 py-2 flex items-center disabled-field">
                                                    <input value="{{$phone != null || $phone != '' ? chunk_split($phone, 4, ' ') : null}}" min="0" type="pattern" pattern="[\d]{4} [\d]{4}" placeholder="@lang('labels.check_out.phone_number')"
                                                        class="ph_number me-body-18 contact-info-phno-contact-info-1 text-darkgray bg-transparent w-full focus:outline-none focus-visible:outline-none"/>
                                                    @if(isset($customer->phone) && $customer->is_verified == true)
                                                    <div class="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none">
                                                            <g clip-path="url(#clip0_5371_59957)">
                                                                <path
                                                                    d="M11.2492 15.7501C11.1505 15.7507 11.0526 15.7318 10.9612 15.6945C10.8699 15.6571 10.7867 15.6021 10.7167 15.5326L7.71666 12.5326C7.57543 12.3914 7.49609 12.1999 7.49609 12.0001C7.49609 11.8004 7.57543 11.6089 7.71666 11.4676C7.85789 11.3264 8.04944 11.2471 8.24916 11.2471C8.44889 11.2471 8.64043 11.3264 8.78166 11.4676L11.2492 13.9426L15.9667 9.21764C16.1079 9.07641 16.2994 8.99707 16.4992 8.99707C16.6989 8.99707 16.8904 9.07641 17.0317 9.21764C17.1729 9.35887 17.2522 9.55041 17.2522 9.75014C17.2522 9.94986 17.1729 10.1414 17.0317 10.2826L11.7817 15.5326C11.7116 15.6021 11.6285 15.6571 11.5371 15.6945C11.4457 15.7318 11.3479 15.7507 11.2492 15.7501Z"
                                                                    fill="#60D669" />
                                                                <path
                                                                    d="M12 21.75C10.0716 21.75 8.18657 21.1782 6.58319 20.1068C4.97982 19.0355 3.73013 17.5127 2.99218 15.7312C2.25422 13.9496 2.06114 11.9892 2.43735 10.0979C2.81355 8.20656 3.74215 6.46928 5.10571 5.10571C6.46928 3.74215 8.20656 2.81355 10.0979 2.43735C11.9892 2.06114 13.9496 2.25422 15.7312 2.99218C17.5127 3.73013 19.0355 4.97982 20.1068 6.58319C21.1782 8.18657 21.75 10.0716 21.75 12C21.75 14.5859 20.7228 17.0658 18.8943 18.8943C17.0658 20.7228 14.5859 21.75 12 21.75ZM12 3.75C10.3683 3.75 8.77326 4.23386 7.41655 5.14038C6.05984 6.0469 5.00242 7.33538 4.378 8.84287C3.75358 10.3504 3.5902 12.0092 3.90853 13.6095C4.22685 15.2098 5.01259 16.6799 6.16637 17.8336C7.32016 18.9874 8.79017 19.7732 10.3905 20.0915C11.9909 20.4098 13.6497 20.2464 15.1571 19.622C16.6646 18.9976 17.9531 17.9402 18.8596 16.5835C19.7661 15.2268 20.25 13.6317 20.25 12C20.25 9.81197 19.3808 7.71355 17.8336 6.16637C16.2865 4.6192 14.188 3.75 12 3.75Z"
                                                                    fill="#60D669" />
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0_5371_59957">
                                                                    <rect width="24" height="24" fill="white" />
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="xl:w-[48.5%] w-full mt-5 ">
                                            <p class="font-normal me-body-16 text-darkgray">@lang('labels.check_out.email')<a class="email-verify-text hidden ml-2 underline" href="{{route('dashboard.myacc.basicinfo')}}">@lang('labels.verify_email')</a></p>
                                            <div
                                                class="w-full border-1 border-meA3 bg-meBg rounded-[4px] lg:px-5 px-3 py-2 flex items-center bg-meBg disabled-email">
                                                <input readonly placeholder="Please verify your email." type="email"
                                                    value="{{$customer->email}}"
                                                    class="is_email me-body-18 contact-info-email-contact-info-1 bg-transparent w-full focus:outline-none focus-visible:outline-none" />
                                                <div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <g clip-path="url(#clip0_5371_59957)">
                                                            <path
                                                                d="M11.2492 15.7501C11.1505 15.7507 11.0526 15.7318 10.9612 15.6945C10.8699 15.6571 10.7867 15.6021 10.7167 15.5326L7.71666 12.5326C7.57543 12.3914 7.49609 12.1999 7.49609 12.0001C7.49609 11.8004 7.57543 11.6089 7.71666 11.4676C7.85789 11.3264 8.04944 11.2471 8.24916 11.2471C8.44889 11.2471 8.64043 11.3264 8.78166 11.4676L11.2492 13.9426L15.9667 9.21764C16.1079 9.07641 16.2994 8.99707 16.4992 8.99707C16.6989 8.99707 16.8904 9.07641 17.0317 9.21764C17.1729 9.35887 17.2522 9.55041 17.2522 9.75014C17.2522 9.94986 17.1729 10.1414 17.0317 10.2826L11.7817 15.5326C11.7116 15.6021 11.6285 15.6571 11.5371 15.6945C11.4457 15.7318 11.3479 15.7507 11.2492 15.7501Z"
                                                                fill="#60D669" />
                                                            <path
                                                                d="M12 21.75C10.0716 21.75 8.18657 21.1782 6.58319 20.1068C4.97982 19.0355 3.73013 17.5127 2.99218 15.7312C2.25422 13.9496 2.06114 11.9892 2.43735 10.0979C2.81355 8.20656 3.74215 6.46928 5.10571 5.10571C6.46928 3.74215 8.20656 2.81355 10.0979 2.43735C11.9892 2.06114 13.9496 2.25422 15.7312 2.99218C17.5127 3.73013 19.0355 4.97982 20.1068 6.58319C21.1782 8.18657 21.75 10.0716 21.75 12C21.75 14.5859 20.7228 17.0658 18.8943 18.8943C17.0658 20.7228 14.5859 21.75 12 21.75ZM12 3.75C10.3683 3.75 8.77326 4.23386 7.41655 5.14038C6.05984 6.0469 5.00242 7.33538 4.378 8.84287C3.75358 10.3504 3.5902 12.0092 3.90853 13.6095C4.22685 15.2098 5.01259 16.6799 6.16637 17.8336C7.32016 18.9874 8.79017 19.7732 10.3905 20.0915C11.9909 20.4098 13.6497 20.2464 15.1571 19.622C16.6646 18.9976 17.9531 17.9402 18.8596 16.5835C19.7661 15.2268 20.25 13.6317 20.25 12C20.25 9.81197 19.3808 7.71355 17.8336 6.16637C16.2865 4.6192 14.188 3.75 12 3.75Z"
                                                                fill="#60D669" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_5371_59957">
                                                                <rect width="24" height="24" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if(count($recipients) > 0)
            @foreach($recipients as $recipient)
            @php
            $product_merchant = $recipient->product->merchant()
            ->with(['merchantLocations','merchantLocations.area','merchantLocations.weekDays','merchantLocations.events'])->first();
            if($recipient->variable_id != null){
                $exist_product_price = isset($recipient->variable_product->promotion_price) ? $recipient->variable_product->promotion_price : (isset($recipient->variable_product->discount_price) ?
                $recipient->variable_product->discount_price : '');
                $productPrice = $recipient->variable_product->original_price;
            }else{
                $exist_product_price = isset($recipient->product->promotion_price) ? $recipient->product->promotion_price : (isset($recipient->product->discount_price) ?
                $recipient->product->discount_price : '');
                $productPrice = $recipient->product->original_price;
            }
            @endphp
            <div>
                <div class="flex justify-between ">
                    <div class="flex items-center">
                        <img src="{{asset($recipient->product->merchant->icon)}}" alt="logo"
                            class="rounded-full max-w-[40x] max-h-[40px] object-cover mr-3 checkout_product_image_small" />
                        <p class="font-normal me-body-20 text-darkgray">
                            {{langbind($recipient->product->merchant,'name') ?? ''}}</p>
                    </div>
                </div>
                <div class="hidden">
                    <div class="flex justify-between">
                        <p class="font-bold me-body-26 text-darkgray">Expired</p>
                    </div>
                </div>
                <div class="hidden">
                    <div class="flex justify-between">
                        <p class="font-bold me-body-26 text-darkgray">Unavailable</p>
                        <div class="flex flex-wrap">
                            <p class="italic me-body-16 font-normal text-mered mr-8">undefined</p>
                        </div>
                    </div>
                </div>
            </div>

            <div component="me-checkout-enter-info-card-content"
                class="me-checkout-enter-info-card-content relative my-5 lg:px-10 sm:px-5 px-4 py-5">
                <div>

                    <div class="flex sm:flex-row flex-col available-card">
                        <div class="w-[80px] h-[80px] 7xl:w-[100px] 7xl:h-[100px] rounded-[50%] mr-5 border border-mee4 checkout-card-logo-img">
                            <img src="{{asset($recipient->product->merchant->icon)}}" alt="logo"
                                class="mr-5 w-full h-full object-cover rounded-[50%]" />
                        </div>
                        <div class="checkout-card-text-section">
                            <div class="checkout-card-pdiv">
                                <a href="{{ route('product-detail',['category' => isset($recipient->product->category) ? str_replace(' ','-',$recipient->product->category->name_en) : '', 'slug' => isset($recipient->product->slug_en) ? $recipient->product->slug_en : '']) }}">
                                <p class="font-bold me-body-26 text-darkgray">{{langbind($recipient->product,'name')}}</p></a>
                                <div class="flex justify-between mt-1">
                                    <p class="font-normal me-body-18 text-darkgray">
                                        @if(isset($recipient->product->number_of_dose))
                                        {{$recipient->product->number_of_dose}}
                                        {{$recipient->product->number_of_dose == 1 ? __('labels.product_detail.item') : __('labels.product_detail.items')}}
                                        @endif
                                    </p>
                                    <p class="font-bold me-body-20 text-darkgray">
                                        ${{number_format($recipient->each_recipient_amount + $recipient->add_on_prices,2)}}
                                    </p>
                                </div>
                            </div>
                            <div component-name="me-checkout-enter-info-card-recipient-data" class="">
                                <div class="me-checkout-enter-info-card-recipient-data-container">

                                    <div class="mt-7 recipient-card-parent-1">
                                        <p class="hidden font-bold me-body-20 text-white px-5 py-[10px] bg-blueMediq">
                                        </p>
                                        <div class="mt-4">
                                            <div component-name="me-checkout-merchant-recipient-preferredTime-detail"
                                                class="mt-1">

                                                <div class="flex">
                                                    <div
                                                        class="flex w-full justify-between preferredTime-detailreceipientData111 flex">
                                                        <div class="flex items-center">
                                                            <div class="mr-2 max-w-[24px] w-[24px]">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                    height="21" viewBox="0 0 20 21" fill="none">
                                                                    <path
                                                                        d="M14.1667 12.1667C14.3877 12.1667 14.5996 12.0789 14.7559 11.9226C14.9122 11.7663 15 11.5543 15 11.3333C15 11.1123 14.9122 10.9004 14.7559 10.7441C14.5996 10.5878 14.3877 10.5 14.1667 10.5C13.9457 10.5 13.7337 10.5878 13.5774 10.7441C13.4211 10.9004 13.3333 11.1123 13.3333 11.3333C13.3333 11.5543 13.4211 11.7663 13.5774 11.9226C13.7337 12.0789 13.9457 12.1667 14.1667 12.1667ZM14.1667 15.5C14.3877 15.5 14.5996 15.4122 14.7559 15.2559C14.9122 15.0996 15 14.8877 15 14.6667C15 14.4457 14.9122 14.2337 14.7559 14.0774C14.5996 13.9211 14.3877 13.8333 14.1667 13.8333C13.9457 13.8333 13.7337 13.9211 13.5774 14.0774C13.4211 14.2337 13.3333 14.4457 13.3333 14.6667C13.3333 14.8877 13.4211 15.0996 13.5774 15.2559C13.7337 15.4122 13.9457 15.5 14.1667 15.5ZM10.8333 11.3333C10.8333 11.5543 10.7455 11.7663 10.5893 11.9226C10.433 12.0789 10.221 12.1667 10 12.1667C9.77899 12.1667 9.56702 12.0789 9.41074 11.9226C9.25446 11.7663 9.16667 11.5543 9.16667 11.3333C9.16667 11.1123 9.25446 10.9004 9.41074 10.7441C9.56702 10.5878 9.77899 10.5 10 10.5C10.221 10.5 10.433 10.5878 10.5893 10.7441C10.7455 10.9004 10.8333 11.1123 10.8333 11.3333ZM10.8333 14.6667C10.8333 14.8877 10.7455 15.0996 10.5893 15.2559C10.433 15.4122 10.221 15.5 10 15.5C9.77899 15.5 9.56702 15.4122 9.41074 15.2559C9.25446 15.0996 9.16667 14.8877 9.16667 14.6667C9.16667 14.4457 9.25446 14.2337 9.41074 14.0774C9.56702 13.9211 9.77899 13.8333 10 13.8333C10.221 13.8333 10.433 13.9211 10.5893 14.0774C10.7455 14.2337 10.8333 14.4457 10.8333 14.6667ZM5.83333 12.1667C6.05435 12.1667 6.26631 12.0789 6.42259 11.9226C6.57887 11.7663 6.66667 11.5543 6.66667 11.3333C6.66667 11.1123 6.57887 10.9004 6.42259 10.7441C6.26631 10.5878 6.05435 10.5 5.83333 10.5C5.61232 10.5 5.40036 10.5878 5.24408 10.7441C5.0878 10.9004 5 11.1123 5 11.3333C5 11.5543 5.0878 11.7663 5.24408 11.9226C5.40036 12.0789 5.61232 12.1667 5.83333 12.1667ZM5.83333 15.5C6.05435 15.5 6.26631 15.4122 6.42259 15.2559C6.57887 15.0996 6.66667 14.8877 6.66667 14.6667C6.66667 14.4457 6.57887 14.2337 6.42259 14.0774C6.26631 13.9211 6.05435 13.8333 5.83333 13.8333C5.61232 13.8333 5.40036 13.9211 5.24408 14.0774C5.0878 14.2337 5 14.4457 5 14.6667C5 14.8877 5.0878 15.0996 5.24408 15.2559C5.40036 15.4122 5.61232 15.5 5.83333 15.5Z"
                                                                        fill="#333333" />
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M5.83268 1.95801C5.99844 1.95801 6.15741 2.02386 6.27462 2.14107C6.39183 2.25828 6.45768 2.41725 6.45768 2.58301V3.21884C7.00935 3.20801 7.61685 3.20801 8.28518 3.20801H11.7127C12.3818 3.20801 12.9893 3.20801 13.541 3.21884V2.58301C13.541 2.41725 13.6069 2.25828 13.7241 2.14107C13.8413 2.02386 14.0003 1.95801 14.166 1.95801C14.3318 1.95801 14.4907 2.02386 14.608 2.14107C14.7252 2.25828 14.791 2.41725 14.791 2.58301V3.27217C15.0077 3.28884 15.2127 3.30967 15.4068 3.33551C16.3835 3.46717 17.1743 3.74384 17.7985 4.36717C18.4218 4.99134 18.6985 5.78217 18.8302 6.75884C18.9577 7.70884 18.9577 8.92134 18.9577 10.453V12.213C18.9577 13.7447 18.9577 14.958 18.8302 15.9072C18.6985 16.8838 18.4218 17.6747 17.7985 18.2988C17.1743 18.9222 16.3835 19.1988 15.4068 19.3305C14.4568 19.458 13.2443 19.458 11.7127 19.458H8.28601C6.75435 19.458 5.54102 19.458 4.59185 19.3305C3.61518 19.1988 2.82435 18.9222 2.20018 18.2988C1.57685 17.6747 1.30018 16.8838 1.16852 15.9072C1.04102 14.9572 1.04102 13.7447 1.04102 12.213V10.453C1.04102 8.92134 1.04102 7.70801 1.16852 6.75884C1.30018 5.78217 1.57685 4.99134 2.20018 4.36717C2.82435 3.74384 3.61518 3.46717 4.59185 3.33551C4.78602 3.30967 4.99185 3.28884 5.20768 3.27217V2.58301C5.20768 2.41725 5.27353 2.25828 5.39074 2.14107C5.50795 2.02386 5.66692 1.95801 5.83268 1.95801ZM4.75768 4.57467C3.92018 4.68717 3.43685 4.89884 3.08435 5.25134C2.73185 5.60384 2.52018 6.08717 2.40768 6.92551C2.38852 7.06717 2.37268 7.21717 2.35935 7.37467H17.6393C17.626 7.21634 17.6102 7.06717 17.591 6.92467C17.4785 6.08717 17.2668 5.60384 16.9143 5.25134C16.5618 4.89884 16.0785 4.68717 15.2402 4.57467C14.3843 4.45967 13.2552 4.45801 11.666 4.45801H8.33268C6.74351 4.45801 5.61518 4.45967 4.75768 4.57467ZM2.29102 10.4997C2.29102 9.78801 2.29102 9.16884 2.30185 8.62467H17.6968C17.7077 9.16884 17.7077 9.78801 17.7077 10.4997V12.1663C17.7077 13.7555 17.706 14.8847 17.591 15.7413C17.4785 16.5788 17.2668 17.0622 16.9143 17.4147C16.5618 17.7672 16.0785 17.9788 15.2402 18.0913C14.3843 18.2063 13.2552 18.208 11.666 18.208H8.33268C6.74351 18.208 5.61518 18.2063 4.75768 18.0913C3.92018 17.9788 3.43685 17.7672 3.08435 17.4147C2.73185 17.0622 2.52018 16.5788 2.40768 15.7405C2.29268 14.8847 2.29102 13.7555 2.29102 12.1663V10.4997Z"
                                                                        fill="#333333" />
                                                                </svg>
                                                            </div>
                                                            @if($recipient->is_prefer_time_decide_later != true)
                                                            <p
                                                                class="font-normal me-body-18 text-darkgray flex items-center preferredTime">
                                                                <span
                                                                    class="preferred-name-receipientData111">{{isset($recipient->area) ? langbind($recipient->area,'name') : ''}}</span>
                                                                @php 
                                                                $preferDate = '';
                                                                if(isset($recipient->date)){
                                                                    if(lang() == 'en'){
                                                                        $preferDate = date('Y F d', strtotime($recipient->date));
                                                                    }else{
                                                                        $preferDate = date('Y', strtotime($recipient->date)).'年'.date('m', strtotime($recipient->date)).'月'.date('d', strtotime($recipient->date)).'日';
                                                                    }
                                                                }
                                                                @endphp
                                                                <span
                                                                    class="preferred-date-receipientData111">{{$preferDate}}</span>
                                                                @if(lang() == "en" && $recipient->time  == 'AM')
                                                                <span  class="preferred-timeDesc-receipientData111">AM</span>
                                                                @elseif($recipient->time  == 'AM' &&  lang() == "zh-hk" || lang() == "zh-cn" )
                                                                <span  class="preferred-timeDesc-receipientData111">上午</span>
                                                                @elseif(lang() == "en" && $recipient->time  == 'PM')
                                                                <span  class="preferred-timeDesc-receipientData111">PM</span>
                                                                @elseif($recipient->time  == 'PM' &&  lang() == "zh-hk" || lang() == "zh-cn")
                                                                <span  class="preferred-timeDesc-receipientData111">下午</span>
                                                                @else
                                                                <span  class="preferred-timeDesc-receipientData111">{{$recipient->time ?? ''}}</span>
                                                                @endif
                                                            </p>
                                                            @else
                                                            <p
                                                                class="cursor-pointer font-normal me-body-18 text-darkgray">
                                                                {{__('labels.check_out.loction_and_time_decide_later')}}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            @if($recipient->variable_id != null)
                                            <div component-name="me-checkout-merchant-recipient-packages-detail" class="mt-1">
                                                <div>
                                                    <div
                                                        class="flex packages-placeholder-receipientData{{$recipient->id}} items=center">
                                                        <div class="mr-2 max-w-[24px] w-[24px]">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                                height="19" viewBox="0 0 18 19" fill="none">
                                                                <path
                                                                    d="M17.4375 4.85446H15.5498C16.5814 4.03898 16.8103 2.71267 16.0138 1.67951C15.4423 0.940876 14.463 0.5 13.3942 0.5C12.8087 0.5 12.2372 0.635761 11.7416 0.893015C10.6515 1.45631 9.48544 3.60822 9.00056 4.5811C8.51512 3.60822 7.3485 1.45585 6.2595 0.893475C5.76281 0.63622 5.19187 0.50046 4.60631 0.50046C3.53756 0.50046 2.55769 0.941336 1.98619 1.68043C1.19138 2.71129 1.41975 4.03668 2.44913 4.85446H0.5625C0.252 4.85446 0 5.06017 0 5.31467V9.22043C0 9.47492 0.252 9.68063 0.5625 9.68063H0.872438V18.0398C0.872438 18.2943 1.12388 18.5 1.43494 18.5H6.94125H11.0588H16.5651C16.8761 18.5 17.1276 18.2943 17.1276 18.0398V9.68063H17.4375C17.7486 9.68063 18 9.47492 18 9.22043V5.31467C18 5.06017 17.7486 4.85446 17.4375 4.85446ZM16.875 8.76022H16.5651H11.6213V5.77487H16.875V8.76022ZM10.4963 5.77487V8.76022H7.50375V5.77487H10.4963ZM12.3424 1.6703C12.6585 1.50693 13.0219 1.42041 13.3937 1.42041C14.0749 1.42041 14.6987 1.70114 15.0626 2.17146C15.6431 2.92482 15.3686 3.92301 14.4495 4.39748C14.256 4.4978 13.5658 4.73159 11.3439 4.73159C10.9007 4.73159 10.4856 4.72192 10.1526 4.71042C10.7657 3.52401 11.7068 1.99889 12.3424 1.6703ZM2.93625 2.17146C3.30019 1.70114 3.92456 1.42041 4.60575 1.42041C4.97756 1.42041 5.3415 1.50693 5.65763 1.67122C6.29269 1.99889 7.23375 3.52447 7.84744 4.71042C7.51163 4.72192 7.09369 4.73205 6.64537 4.73205C4.43081 4.73205 3.74231 4.49964 3.54994 4.40024C2.63138 3.92347 2.35631 2.9239 2.93625 2.17146ZM1.125 5.77487H6.37875V8.76022H1.43494H1.125V5.77487ZM1.99744 9.68063H6.37875V17.5796H1.99744V9.68063ZM7.50375 17.5796V9.68063H10.4963V17.5796H7.50375ZM16.0026 17.5796H11.6213V9.68063H16.0026V17.5796Z"
                                                                    fill="#1A171B" />
                                                            </svg>
                                                        </div>
                                                        <p data-id="receipientData{{$recipient->id}}"
                                                            class="custom-packages-remark-title cursor-pointer flex font-normal me-body-18 text-darkgray underline">
                                                            {{__('labels.select_packages')}}</p>
                                                    </div>
                                                    <div
                                                        class="flex w-full justify-between hidden packages-show-detail-receipientData{{$recipient->id}}">
                                                        <div class="flex items-center w-full">
                                                            <div class="mr-2 max-w-[24px] w-[24px]">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="25" viewBox="0 0 24 25" fill="none">
                                                                    <path
                                                                        d="M12.5 21C17.1944 21 21 17.1944 21 12.5C21 7.80558 17.1944 4 12.5 4C7.80558 4 4 7.80558 4 12.5C4 17.1944 7.80558 21 12.5 21Z"
                                                                        stroke="#333333" stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                    <path
                                                                        d="M12.4992 8.57715V16.4233M8.57617 12.5002H16.4223"
                                                                        stroke="#333333" stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                </svg>
                                                            </div>
                                                            <p
                                                                class="mr-2 font-normal me-body-18 text-darkgray underline">
                                                                {{__('labels.package')}}</p>
                                                            <div class="showDropdown-btn active">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                    height="7" viewBox="0 0 12 7" fill="none">
                                                                    <path
                                                                        d="M0.042841 6.46313C0.14831 6.69047 0.413154 6.7936 0.649873 6.6975C0.713154 6.67172 1.46315 5.93344 3.36628 4.02094L5.99831 1.37719L8.628 4.02094C10.5358 5.93579 11.2835 6.67172 11.3467 6.6975C11.396 6.71625 11.478 6.73266 11.5296 6.73266C11.8671 6.73266 12.0944 6.39047 11.9538 6.08813C11.8905 5.95454 6.32878 0.367034 6.19753 0.308441C6.078 0.252191 5.91862 0.252191 5.79909 0.308441C5.66784 0.367034 0.106123 5.95453 0.042841 6.08813C-0.0134086 6.20766 -0.0134086 6.3436 0.042841 6.46313Z"
                                                                        fill="#333333" />
                                                                </svg>
                                                            </div>
                                                        </div>
                                                        {{-- <div data-id="receipientData{{$recipient->id}}"
                                                            class="packages-edit-btn">
                                                            <p
                                                                class="cursor-pointer flex font-normal me-body-16 text-darkgray underline hover:text-orangeMediq">
                                                                Edit</p>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                                <div class="packages-detail-list-receipientData{{$recipient->id}}">
                                                    <div component-name="me-checkout-merchant-recipient-packages-item"
                                                        class="pl-8 mt-1">
                                                        <ul
                                                            class="custom-list-style bg-far px-5 py-[10px] rounded-[12px] packages-detail-receipientData{{$recipient->id}}">
                                                            <li data-text="{{$recipient->variable_product->sku}}"
                                                                data-price="{{$exist_product_price != null ? $exist_product_price : $recipient->variable_product->original_price}}"
                                                                class="flex items-center justify-between">
                                                                <span
                                                                    class="mr-4 font-normal me-body-18 text-darkgray"></span>
                                                                <span
                                                                    class="font-normal me-body-18 text-darkgray"></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            @include('frontend.checkouts.init-popup.package-popup')
                                            @endif

                                            
                                            @if(count($recipient->group_data) > 0)
                                            @foreach($recipient->group_data as $group)
                                            @php
                                            $checkUpTable = $recipient->product->package->checkupTable;
                                            $tablePriIds =
                                            App\Models\CheckUpTableType::where('check_up_type_id',2)->where('check_up_table_id',$checkUpTable->id)->pluck('id')->toArray();
                                            $optionGroupIds=
                                            App\Models\CheckTableItem::where('check_up_group_id',$group->id)->whereIn('check_up_table_type_id',$tablePriIds)->distinct()->pluck('check_up_item_id')->toArray();
                                            $countEquivalentNumber = App\Models\CheckUpItem::whereIn('id',$optionGroupIds)->sum('equivalent_number');
                                            @endphp
                                            <div component-name="me-checkout-merchant-recipient-cancerMarker-detail"
                                                class="mt-1">
                                                <div class="flex sm:flex-row flex-col">

                                                    <div
                                                        class="flex w-full justify-between cancer-markers-detail-data1-receipientData111">
                                                        <div class="flex items-center w-full">
                                                            <div class="mr-2 max-w-[24px] w-[24px]">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="25" viewBox="0 0 24 25" fill="none">
                                                                    <path
                                                                        d="M9.4979 3.00898C8.94263 3.08328 8.22312 3.3531 7.73824 3.66984C7.3824 3.90446 6.83104 4.44409 6.60815 4.77647C6.38525 5.10885 6.15845 5.58982 6.02941 6.01605C5.93165 6.34452 5.92383 6.41882 5.91992 7.0914C5.91992 7.72097 5.92774 7.83437 5.99422 7.96341C6.20929 8.39746 6.8193 8.40919 7.03046 7.98296C7.09694 7.8461 7.10085 7.7718 7.08521 7.28692C7.05784 6.66126 7.11258 6.36407 7.32765 5.89092C7.49189 5.53508 7.65221 5.30046 7.91812 5.03846C8.81359 4.13908 10.1431 3.91228 11.2849 4.45582C12.0475 4.81948 12.6497 5.55072 12.8647 6.38363C12.9273 6.61043 12.9429 6.78639 12.939 7.1305C12.9234 7.90476 12.9273 7.91649 13.0055 8.02207C13.2088 8.29188 13.4786 8.36227 13.7563 8.21758C13.9909 8.09636 14.0652 7.93995 14.1082 7.47853C14.1786 6.72774 14.0457 6.00823 13.7015 5.31219C13.4552 4.80775 13.2049 4.46755 12.8178 4.10389C12.0748 3.40002 11.1794 3.03245 10.1431 3.00507C9.86548 2.99725 9.5722 3.00116 9.4979 3.00898Z"
                                                                        fill="#333333" />
                                                                    <path
                                                                        d="M9.54314 5.43202C9.05825 5.56106 8.62029 5.93645 8.39349 6.41352L8.26836 6.67942L8.25663 11.3992C8.25272 14.07 8.23316 16.1229 8.21361 16.1229C8.19406 16.1229 8.03374 15.9626 7.85386 15.7632C7.2282 15.0789 6.84499 14.8873 6.14503 14.9186C5.81656 14.9303 5.73053 14.9498 5.49982 15.0632C4.48704 15.552 4.17812 16.862 4.87807 17.7184C4.97583 17.8435 5.97689 18.9189 7.09525 20.1115C9.18338 22.3326 9.35544 22.4968 9.85988 22.7315C10.4191 22.9934 10.2978 22.9817 13.3284 22.9974C15.6237 23.0052 16.1321 22.9974 16.3863 22.9504C16.9885 22.837 17.4577 22.5868 17.9113 22.1449C18.4157 21.6483 18.6895 21.0656 18.7716 20.3188C18.7951 20.0685 18.8068 18.8328 18.799 16.7877L18.7833 13.6399L18.6973 13.4052C18.5096 12.9047 18.1303 12.5176 17.6415 12.326C17.3404 12.2087 16.7734 12.1969 16.4645 12.3064C16.2572 12.3768 16.2494 12.3768 16.2025 12.3064C15.9209 11.8998 15.6785 11.6925 15.2914 11.54C14.9942 11.4266 14.4233 11.4188 14.1183 11.5244C13.911 11.5947 13.9032 11.5947 13.8563 11.5244C13.5747 11.1177 13.3284 10.9104 12.9451 10.7618C12.7105 10.668 12.1983 10.6406 11.9167 10.6993L11.7681 10.7306V8.87313C11.7681 7.67265 11.7525 6.94142 11.7251 6.80846C11.5179 5.81132 10.5051 5.17393 9.54314 5.43202ZM10.3135 6.64814C10.3682 6.69115 10.4503 6.77327 10.4934 6.83193C10.5755 6.93751 10.5755 6.97661 10.595 10.668C10.6146 14.3633 10.6146 14.3985 10.6967 14.508C10.8727 14.7504 11.2246 14.8247 11.4553 14.6644C11.7486 14.4649 11.7447 14.4806 11.7681 13.2684C11.7877 12.2439 11.7916 12.1735 11.8698 12.0679C12.124 11.7238 12.6206 11.759 12.8435 12.1383C12.9139 12.2595 12.9217 12.3612 12.9412 13.3349C12.9608 14.332 12.9647 14.4024 13.0429 14.508C13.2971 14.8521 13.7937 14.8169 14.0166 14.4376C14.0831 14.3242 14.0987 14.2108 14.1143 13.632C14.13 13.0338 14.1417 12.9477 14.216 12.85C14.4702 12.5059 14.9668 12.5411 15.1897 12.9204C15.2562 13.0338 15.2718 13.1472 15.2875 13.7259C15.3031 14.3242 15.3148 14.4102 15.3891 14.508C15.5103 14.6722 15.7059 14.7621 15.9092 14.7426C16.2416 14.7074 16.4136 14.4845 16.4567 14.0309C16.4762 13.8315 16.5075 13.7024 16.5622 13.632C16.8164 13.2879 17.313 13.3231 17.5359 13.7024C17.6141 13.8315 17.6141 13.9058 17.6141 17.1005C17.6141 20.1975 17.6102 20.3774 17.5398 20.5808C17.3248 21.2103 16.8281 21.6639 16.2103 21.793C16.0695 21.8203 15.1662 21.8321 13.3479 21.8242C10.6928 21.8125 10.6928 21.8125 10.4738 21.7226C10.3526 21.6757 10.1727 21.5779 10.0749 21.5075C9.8325 21.3355 5.7931 17.038 5.72271 16.8776C5.60931 16.6156 5.69143 16.3419 5.9456 16.1542C6.059 16.0682 6.32882 16.0486 6.49305 16.1151C6.5478 16.1386 7.00531 16.5844 7.50584 17.1084C8.01027 17.6284 8.46388 18.0899 8.51862 18.125C8.65939 18.2228 8.97613 18.2189 9.13646 18.1172C9.20684 18.0781 9.29287 17.9843 9.33198 17.9139C9.39845 17.7927 9.40236 17.4877 9.42191 12.3416C9.44147 6.91404 9.44147 6.8984 9.52358 6.78891C9.70346 6.54256 10.0828 6.47608 10.3135 6.64814Z"
                                                                        fill="#333333" />
                                                                </svg>
                                                            </div>
                                                            @if(lang() == "en")
                                                            <p
                                                                class="mr-2 font-normal me-body-18 text-darkgray cancer-markers-label-1-receipientData{{$group->id}}{{$recipient->id}} ">
                                                                {{langbind($group,'name')}} (Selected<span
                                                                    class="selected-cancermarkers-count-1-receipientData111"> {{$group->itemDatas($group->id,$recipient->id,$recipient->product->id)->sum('equivalent_number')}}</span>
                                                                    {{__('labels.product_detail.items')}})</p>
                                                            @else 
                                                            <p class="mr-2 font-normal me-body-18 text-darkgray cancer-markers-label-1-receipientData{{$group->id}}{{$recipient->id}} ">
                                                                {{langbind($group,'name')}} ({{__('labels.check_out.selected')}}<span class="selected-cancermarkers-count-1-receipientData111">{{$group->itemDatas($group->id,$recipient->id,$recipient->product->id)->sum('equivalent_number')}}</span>{{__('labels.product_detail.items')}})</p>
                                                            @endif
                                                            @if($group->itemDatas($group->id,$recipient->id,$recipient->product->id)->sum('equivalent_number') != 0)
                                                            <div class="showDropdown-btn active">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                    height="7" viewBox="0 0 12 7" fill="none">
                                                                    <path
                                                                        d="M0.042841 6.46313C0.14831 6.69047 0.413154 6.7936 0.649873 6.6975C0.713154 6.67172 1.46315 5.93344 3.36628 4.02094L5.99831 1.37719L8.628 4.02094C10.5358 5.93579 11.2835 6.67172 11.3467 6.6975C11.396 6.71625 11.478 6.73266 11.5296 6.73266C11.8671 6.73266 12.0944 6.39047 11.9538 6.08813C11.8905 5.95454 6.32878 0.367034 6.19753 0.308441C6.078 0.252191 5.91862 0.252191 5.79909 0.308441C5.66784 0.367034 0.106123 5.95453 0.042841 6.08813C-0.0134086 6.20766 -0.0134086 6.3436 0.042841 6.46313Z"
                                                                        fill="#333333" />
                                                                </svg>
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="detail-data-list1-receipientData111">
                                                                
                                                    <div component-name="me-checkout-merchant-recipient-cancerMarkers-detail-list" class="pl-8 mt-1">
                                                        <ul class="custom-list-style bg-far px-5 py-[10px] rounded-[12px] cancerMarkers-detail-data1-receipientData111">
                                                            @if(count($group->itemDatas($group->id,$recipient->id,$recipient->product->id)) > 0)
                                                                @foreach($group->itemDatas($group->id,$recipient->id,$recipient->product->id) as $item)
                                                                <li class="flex items-center mt-2">
                                                                    <span class="mr-4 font-normal me-body-18 text-darkgray">{{langbind($item,'name')}}</span>
                                                                </li>
                                                                @endforeach
                                                            {{-- @else 
                                                                <li class="flex items-center mt-2">
                                                                    <span class="mr-4 font-normal me-body-18 text-darkgray">{{__('labels.check_out.optional_decide_later')}}</span>
                                                                </li> --}}
                                                            @endif

                                                        </ul>
                                                    </div>
                                                        
                                                </div>

                                            </div>
                                            @endforeach
                                            @endif

                                            @if(count($recipient->add_on_data) > 0)
                                            <div component-name="me-checkout-merchant-recipient-preferredTime-detail"
                                                class="mt-1">
                                                <div>
                                                    <div class="flex w-full justify-between addson-show-detail-receipientData111"
                                                        style="display:block">
                                                        <div class="flex items-center w-full">
                                                            <div class="mr-2 max-w-[24px] w-[24px]">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="25" viewBox="0 0 24 25" fill="none">
                                                                    <path
                                                                        d="M12.5 21C17.1944 21 21 17.1944 21 12.5C21 7.80558 17.1944 4 12.5 4C7.80558 4 4 7.80558 4 12.5C4 17.1944 7.80558 21 12.5 21Z"
                                                                        stroke="#333333" stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                    <path
                                                                        d="M12.4992 8.57715V16.4233M8.57617 12.5002H16.4223"
                                                                        stroke="#333333" stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                </svg>
                                                            </div>
                                                            <p data-id="receipientData111"
                                                                class="mr-2 font-normal me-body-18 text-darkgray underline">
                                                                @lang('labels.check_out.add_on') ({{count($recipient->add_on_data)}})</p>
                                                            <div class="showDropdown-btn active">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                    height="7" viewBox="0 0 12 7" fill="none">
                                                                    <path
                                                                        d="M0.042841 6.46313C0.14831 6.69047 0.413154 6.7936 0.649873 6.6975C0.713154 6.67172 1.46315 5.93344 3.36628 4.02094L5.99831 1.37719L8.628 4.02094C10.5358 5.93579 11.2835 6.67172 11.3467 6.6975C11.396 6.71625 11.478 6.73266 11.5296 6.73266C11.8671 6.73266 12.0944 6.39047 11.9538 6.08813C11.8905 5.95454 6.32878 0.367034 6.19753 0.308441C6.078 0.252191 5.91862 0.252191 5.79909 0.308441C5.66784 0.367034 0.106123 5.95453 0.042841 6.08813C-0.0134086 6.20766 -0.0134086 6.3436 0.042841 6.46313Z"
                                                                        fill="#333333" />
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class=" addson-detail-list-receipientData111">
                                                    <div component-name="me-checkout-merchant-recipient-addonItems-detail-list"
                                                        class="pl-8 mt-1">
                                                        <ul
                                                            class="custom-list-style bg-far px-5 py-[10px] rounded-[12px] adds-on-checklist-detailreceipientData111">
                                                            @if($recipient->is_optional_decide_later != true)
                                                                @foreach($recipient->add_on_data as $item)
                                                                <li data-text="Upper Abdomen Ultrasound"
                                                                    data-price="{{$item->discount_price ? $item->discount_price :$item->original_price}}"
                                                                    class="flex items-center mt-2">
                                                                    <span
                                                                        class="mr-4 font-normal me-body-18 text-darkgray">{{langbind($item,'name')}}</span>
                                                                    <span
                                                                        class="font-normal me-body-18 text-darkgray">${{$item->discount_price ? $item->discount_price :$item->original_price}}</span>
                                                                </li>
                                                                @endforeach
                                                            @else 
                                                            <p
                                                                class="cursor-pointer font-normal me-body-18 text-darkgray">
                                                                {{__('labels.check_out.no_additional_item')}}</p>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>


                                                <div class="hidden">
                                                    <input data-id="receipientData111" value="" type="hidden"
                                                        class="addson-checklist addson-checklist-undefined addson-checklist-receipientData111" />
                                                </div>
                                            </div>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="">
                                        <div data-id="receipientData{{$recipient->id}}"
                                            component-name="me-checkout-enter-info-card-edit"
                                            class="me-checkout-enter-info-card-edit mt-4">
                                            <div>
                                                <p data-id="receipientData{{$recipient->id}}" data-placeholder="{{__('labels.check_out.please_enter_your_requests')}}"
                                                    class="cursor-pointer request-more-btnreceipientData{{$recipient->id}} request-more-btn font-normal me-body-18 text-darkgray underline" data-text="">
                                                    @lang('labels.check_out.click')
                                                </p>
                                                @if(count($customer->familyMembers)>0)
                                                <div class="flex justify-end">
                                                    <div class="relative flex flex-wrap items-center">
                                                        <label
                                                            for="checkout-make-booking-receipientData{{$recipient->id}}"
                                                            class="mt-2 flex-wrap custom-checkbox-label flex items-start mr-1 last:mr-0 lg:mr-2 lg:last:mr-0">
                                                            <input type="checkbox" data-id="receipientData{{$recipient->id}}"
                                                                name="checkout-make-booking" value=""
                                                                id="checkout-make-booking-receipientData{{$recipient->id}}"
                                                                class="mt-[2px] checkout-make-booking">
                                                            <span class="custom-checkbox-orange mt-[2px]"></span>
                                                            <span
                                                                class="font-normal me-body-18 text-darkgray text-left ml-6 4xl:ml-[30px] mr-2 leading-[normal]">
                                                                @lang('labels.check_out.make_booking')
                                                            </span>
                                                        </label>
                                                        <div class="mt-2 relative">
                                                            <div
                                                                class="flex items-center same-with-text same-with-content-item pointer-events-none">
                                                                <p
                                                                    class="same-with-content-item selected-text font-normal me-body-18 text-darkgray underline cursor-pointer">
                                                                    @lang('labels.check_out.same_with')</p>
                                                                @if(count($customer->familyMembers) > 1)
                                                                <div class="same-with-content-item">
                                                                    <svg class="same-with-content-item"
                                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="25" viewBox="0 0 24 25" fill="none">
                                                                        <path
                                                                            d="M18.9533 11.7039C18.8478 11.4765 18.5829 11.3734 18.3462 11.4695C18.2829 11.4953 17.5329 12.2336 15.6298 14.1461L12.9978 16.7898L10.3681 14.1461C8.46028 12.2312 7.71263 11.4953 7.64935 11.4695C7.60013 11.4507 7.5181 11.4343 7.46653 11.4343C7.12903 11.4343 6.90169 11.7765 7.04231 12.0789C7.1056 12.2125 12.6673 17.8 12.7986 17.8586C12.9181 17.9148 13.0775 17.9148 13.197 17.8586C13.3283 17.8 18.89 12.2125 18.9533 12.0789C19.0095 11.9593 19.0095 11.8234 18.9533 11.7039Z"
                                                                            fill="#7C7C7C" />
                                                                    </svg>
                                                                </div>
                                                                @endif
                                                            </div>
                                                            <div
                                                                class="min-w-[200px] same-with-content hidden absolute top-full bg-whitez w-full 2xs:right-0 right-[unset] 2xs:left-[unset] left-0 z-[1]">
                                                                <ul class="list-none same-with-content-item">
                                                                    @foreach($customer->familyMembers as $key => $member)
                                                                    @php
                                                                        $checkCode = isset($member->phone) ? str_split($member->phone , 3) : '+852';
                                                                        if($checkCode[0] == "+86"){
                                                                            $digit = 3;
                                                                        }else{
                                                                            $digit = 4;
                                                                        }
                                                                        $code = isset($member->phone) ? str_split($member->phone , $digit) : '+852';
                                                                        $phone = isset($member->phone) ? substr($member->phone , $digit) : null;
                                                                        if($code[0] == '+'){
                                                                            $pcode = '+852';
                                                                        }else{
                                                                            $pcode = $code[0];
                                                                        }
                                                                    @endphp
                                                                    <li data-contactperson="{{$key == 0 ? 'true' : 'false'}}" data-id="receipientData{{$recipient->id}}" data-uniqueID="{{$member->id}}"
                                                                        data-gender="{{$member->title == 'false' ? 2 : 1}}" data-lastname="{{isset($member->last_name) ? $member->last_name : 'Person'}}"
                                                                        data-firstname="{{isset($member->first_name) ? $member->first_name : 'Contact'}}"
                                                                        data-countrycode="{{$pcode}}" data-phone="{{ isset($member->phone) ? $phone : '' }}"
                                                                        class="font-normal me-body-16 text-darkgray px-5 py-[10px] cursor-pointer same-with-content-item {{$key == 0 ? 'active' : ''}}">
                                                                        @if($key == 0)
                                                                        {{__('labels.check_out.contact_person')}}
                                                                        @else
                                                                        {{ $member->last_name.' '.$member->first_name }}
                                                                        @endif
                                                                    </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="mt-4 card-edit-info bg-far p-5">
                                                <div data-id="{{$recipient->id}}"
                                                    component-name="me-checkout-contact-info-edit"
                                                    class="me-checkout-contact-info-edit-container">
                                                    <div class="rounded-[12px] me-checkout-contact-info-edit">
                                                        <div class="">
                                                            <div>
                                                                <p class="font-normal me-body-16 text-darkgray">
                                                                    @lang('labels.check_out.title')<span class="text-mered me-body-16 font-normal title-required-message-receipientData{{$recipient->id}} ml-2 hidden">{{__('labels.check_out.title_validate_message')}}</span></p>
                                                                <div class="flex checkout-info-gender mt-2">
                                                                    <div class="mr-4">
                                                                        <label
                                                                            for="checkout-male-rdo-receipientData{{$recipient->id}}"
                                                                            class=" flex relative min-w-[107px] cursor-pointer">
                                                                            <input type="radio"
                                                                                id="checkout-male-rdo-receipientData{{$recipient->id}}"
                                                                                name="checkout-gender-receipientData{{$recipient->id}}"
                                                                                class="opacity-0 absolute w-full h-full cursor-pointer checkout-male-rdo"
                                                                                value="2" checked="checked" />
                                                                            <p
                                                                                class="min-w-[107px] text-center font-normal me-body-18 text-darkgray p-[5px] rounded-[4px]">
                                                                                @lang('labels.check_out.mr')
                                                                            </p>
                                                                        </label>
                                                                    </div>
                                                                    <div>
                                                                        <label
                                                                            for="checkout-female-rdo-receipientData{{$recipient->id}}"
                                                                            class=" flex relative min-w-[107px] cursor-pointer">
                                                                            <input type="radio"
                                                                                id="checkout-female-rdo-receipientData{{$recipient->id}}"
                                                                                name="checkout-gender-receipientData{{$recipient->id}}"
                                                                                class="opacity-0 absolute w-full h-full cursor-pointer checkout-female-rdo"
                                                                                value="1" />
                                                                            <p
                                                                                class="min-w-[107px] text-center font-normal me-body-18 text-darkgray p-[5px] rounded-[4px]">
                                                                                @lang('labels.check_out.ms')
                                                                            </p>
                                                                        </label>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="flex xl:justify-between xl:flex-row flex-col">
                                                                <div class="xl:w-[48.5%] w-full xl:mr-[30px] mt-5">
                                                                    <p class="font-normal me-body-16 text-darkgray">
                                                                        @lang('labels.check_out.last_name')<span class="hidden ml-2 text-mered me-body-16 font-normal contact-info-lastname-required-message-receipientData{{$recipient->id}}">{{__('labels.partnership.last_name_required')}}</span></p>
                                                                    <div
                                                                        class="w-full border-1 text-darkgray border-meA3 me-body-18 font-normal bg-meBg rounded-[4px] lg:px-5 px-3 py-2 flex items-center">
                                                                        <input name="last_name"
                                                                            data-id="receipientData{{$recipient->id}}"
                                                                            value="" type="text"
                                                                            placeholder="@lang('labels.check_out.last_name_same_as_id')"
                                                                            class="placeholder:text-lightgray contact-info-lastname-receipientData{{$recipient->id}} text-darkgray bg-transparent font-normal me-body-18 w-full focus:outline-none focus-visible:outline-none" />
                                                                        <div class="hidden">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none">
                                                                                <path
                                                                                    d="M12.5908 10.6914C12.5641 10.5439 12.4831 10.4117 12.3638 10.3209C12.2445 10.2301 12.0955 10.1872 11.9462 10.2008C11.7969 10.2143 11.658 10.2833 11.557 10.3941C11.456 10.5049 11.4001 10.6495 11.4004 10.7994V16.2018L11.41 16.3098C11.4367 16.4573 11.5177 16.5895 11.637 16.6803C11.7563 16.7712 11.9053 16.814 12.0546 16.8005C12.2039 16.7869 12.3428 16.718 12.4438 16.6072C12.5448 16.4964 12.6007 16.3517 12.6004 16.2018V10.7994L12.5908 10.6914ZM12.9592 8.09941C12.9592 7.86072 12.8644 7.6318 12.6956 7.46302C12.5268 7.29423 12.2979 7.19941 12.0592 7.19941C11.8205 7.19941 11.5916 7.29423 11.4228 7.46302C11.254 7.6318 11.1592 7.86072 11.1592 8.09941C11.1592 8.33811 11.254 8.56703 11.4228 8.73581C11.5916 8.90459 11.8205 8.99941 12.0592 8.99941C12.2979 8.99941 12.5268 8.90459 12.6956 8.73581C12.8644 8.56703 12.9592 8.33811 12.9592 8.09941ZM21.6004 11.9994C21.6004 9.45333 20.589 7.01154 18.7886 5.21119C16.9883 3.41084 14.5465 2.39941 12.0004 2.39941C9.45431 2.39941 7.01251 3.41084 5.21217 5.21119C3.41182 7.01154 2.40039 9.45333 2.40039 11.9994C2.40039 14.5455 3.41182 16.9873 5.21217 18.7876C7.01251 20.588 9.45431 21.5994 12.0004 21.5994C14.5465 21.5994 16.9883 20.588 18.7886 18.7876C20.589 16.9873 21.6004 14.5455 21.6004 11.9994ZM3.60039 11.9994C3.60039 10.8963 3.81766 9.80401 4.2398 8.78487C4.66194 7.76574 5.28068 6.83973 6.06069 6.05972C6.8407 5.2797 7.76671 4.66096 8.78585 4.23883C9.80498 3.81669 10.8973 3.59941 12.0004 3.59941C13.1035 3.59941 14.1958 3.81669 15.2149 4.23883C16.2341 4.66096 17.1601 5.2797 17.9401 6.05972C18.7201 6.83973 19.3388 7.76574 19.761 8.78487C20.1831 9.80401 20.4004 10.8963 20.4004 11.9994C20.4004 14.2272 19.5154 16.3638 17.9401 17.9391C16.3648 19.5144 14.2282 20.3994 12.0004 20.3994C9.77257 20.3994 7.636 19.5144 6.06069 17.9391C4.48539 16.3638 3.60039 14.2272 3.60039 11.9994Z"
                                                                                    fill="#FE4C26" />
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="xl:w-[48.5%] w-full mt-5">
                                                                    <p class="font-normal me-body-16 text-darkgray">
                                                                        @lang('labels.check_out.first_name')<span class="hidden ml-2 text-mered me-body-16 font-normal contact-info-firstname-required-message-receipientData{{$recipient->id}}">{{__('labels.partnership.first_name_required')}}</span></p>
                                                                    <div
                                                                        class=" noerror-first-box-receipientData{{$recipient->id}} w-full border-1 text-darkgray border-meA3 me-body-18 font-normal bg-meBg rounded-[4px] lg:px-5 px-3 py-2 flex items-center">
                                                                        <input
                                                                            data-id="receipientData{{$recipient->id}}"
                                                                            name="First Name" value="" type="text"
                                                                            placeholder="@lang('labels.check_out.first_name_same_as_id')"
                                                                            class="placeholder:text-lightgray contact-info-firstname-receipientData{{$recipient->id}} text-darkgray bg-transparent font-normal me-body-18 w-full focus:outline-none focus-visible:outline-none" />
                                                                    </div>
                                                                    <div data-id="receipientData{{$recipient->id}}"
                                                                        name="First Name"
                                                                        class="hidden error-first-box w-full border-1 text-darkgray border-meA3 me-body-18 font-normal bg-meBg rounded-[4px] lg:px-5 px-3 py-2 flex items-center">
                                                                        <input
                                                                            data-id="receipientData{{$recipient->id}}"
                                                                            value="" type="text"
                                                                            placeholder="@lang('labels.check_out.en_first_name')"
                                                                            class="focus:placeholder:text-lightgray placeholder:text-orangeMediq contact-info-firstname-receipientData{{$recipient->id}} text-darkgray bg-transparent font-normal me-body-18 w-full focus:outline-none focus-visible:outline-none" />
                                                                        <div class="error-first-box-icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none">
                                                                                <path
                                                                                    d="M12.5908 10.6914C12.5641 10.5439 12.4831 10.4117 12.3638 10.3209C12.2445 10.2301 12.0955 10.1872 11.9462 10.2008C11.7969 10.2143 11.658 10.2833 11.557 10.3941C11.456 10.5049 11.4001 10.6495 11.4004 10.7994V16.2018L11.41 16.3098C11.4367 16.4573 11.5177 16.5895 11.637 16.6803C11.7563 16.7712 11.9053 16.814 12.0546 16.8005C12.2039 16.7869 12.3428 16.718 12.4438 16.6072C12.5448 16.4964 12.6007 16.3517 12.6004 16.2018V10.7994L12.5908 10.6914ZM12.9592 8.09941C12.9592 7.86072 12.8644 7.6318 12.6956 7.46302C12.5268 7.29423 12.2979 7.19941 12.0592 7.19941C11.8205 7.19941 11.5916 7.29423 11.4228 7.46302C11.254 7.6318 11.1592 7.86072 11.1592 8.09941C11.1592 8.33811 11.254 8.56703 11.4228 8.73581C11.5916 8.90459 11.8205 8.99941 12.0592 8.99941C12.2979 8.99941 12.5268 8.90459 12.6956 8.73581C12.8644 8.56703 12.9592 8.33811 12.9592 8.09941ZM21.6004 11.9994C21.6004 9.45333 20.589 7.01154 18.7886 5.21119C16.9883 3.41084 14.5465 2.39941 12.0004 2.39941C9.45431 2.39941 7.01251 3.41084 5.21217 5.21119C3.41182 7.01154 2.40039 9.45333 2.40039 11.9994C2.40039 14.5455 3.41182 16.9873 5.21217 18.7876C7.01251 20.588 9.45431 21.5994 12.0004 21.5994C14.5465 21.5994 16.9883 20.588 18.7886 18.7876C20.589 16.9873 21.6004 14.5455 21.6004 11.9994ZM3.60039 11.9994C3.60039 10.8963 3.81766 9.80401 4.2398 8.78487C4.66194 7.76574 5.28068 6.83973 6.06069 6.05972C6.8407 5.2797 7.76671 4.66096 8.78585 4.23883C9.80498 3.81669 10.8973 3.59941 12.0004 3.59941C13.1035 3.59941 14.1958 3.81669 15.2149 4.23883C16.2341 4.66096 17.1601 5.2797 17.9401 6.05972C18.7201 6.83973 19.3388 7.76574 19.761 8.78487C20.1831 9.80401 20.4004 10.8963 20.4004 11.9994C20.4004 14.2272 19.5154 16.3638 17.9401 17.9391C16.3648 19.5144 14.2282 20.3994 12.0004 20.3994C9.77257 20.3994 7.636 19.5144 6.06069 17.9391C4.48539 16.3638 3.60039 14.2272 3.60039 11.9994Z"
                                                                                    fill="#FE4C26" />
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="flex xl:justify-between xl:flex-row flex-col">
                                                                <div class="xl:w-[48.5%] w-full xl:mr-[30px] mt-5">
                                                                    <p class="font-normal me-body-16 text-darkgray">@lang('labels.check_out.phone_optional')
                                                                        <span class="text-mered me-body-16 font-normal contact-edit-phno-required-msg-receipientData{{$recipient->id}} hidden ml-2">{{__('labels.check_out.ph_no_must_8digit')}}</span>
                                                                        <span class="text-mered me-body-16 font-normal phone-valid-required-message-receipientData{{$recipient->id}} hidden ml-2">{{__('labels.log_in_register.invalid_number')}}</span>
                                                                    </p>

                                                                    <input name="code" value="+852" 
                                                                        class="hidden country-code-item mr-2 selected-text contact-info-countrycode-receipientData{{$recipient->id}}" />
                                                                    <div class="flex items-stretch">
                                                                        <div class="mr-3">
                                                                            <div class="relative h-full">
                                                                                <div
                                                                                    class=" h-full country-code-item flex items-center country-code-text cursor-pointer py-[0.35rem] px-3 border-1 border-meA3 rounded-[4px] font-normal me-body-18 text-darkgray">
                                                                                    <p data-id="receipientData{{$recipient->id}}"
                                                                                        class="country-code-item mr-2 selected-text contact-info-countrycode-receipientData{{$recipient->id}}">
                                                                                        +852
                                                                                    </p>
                                                                                    <div class="country-code-item">
                                                                                        <svg class="country-code-item"
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            width="12" height="8"
                                                                                            viewBox="0 0 12 8"
                                                                                            fill="none">
                                                                                            <path
                                                                                                d="M11.9533 1.03687C11.8478 0.809527 11.5829 0.706402 11.3462 0.802496C11.2829 0.828277 10.5329 1.56656 8.62982 3.47906L5.99778 6.12281L3.3681 3.47906C1.46028 1.56421 0.712627 0.828277 0.649346 0.802496C0.600127 0.783746 0.518096 0.76734 0.466533 0.76734C0.129033 0.76734 -0.0983104 1.10953 0.0423146 1.41187C0.105596 1.54546 5.66731 7.13297 5.79856 7.19156C5.9181 7.24781 6.07747 7.24781 6.197 7.19156C6.32825 7.13297 11.89 1.54546 11.9533 1.41187C12.0095 1.29234 12.0095 1.1564 11.9533 1.03687Z"
                                                                                                fill="#7C7C7C" />
                                                                                        </svg>
                                                                                    </div>
                                                                                </div>
                                                                                <ul
                                                                                    class="country-code-list hidden absolute top-full bg-whitez w-full country-code-item z-[1]">
                                                                                    <li
                                                                                        class="px-3 py-1 font-normal me-body-18 text-darkgray cursor-pointer country-code-item active">
                                                                                        +852</li>
                                                                                    <li
                                                                                        class="px-3 py-1 font-normal me-body-18 text-darkgray cursor-pointer country-code-item">
                                                                                        +86</li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="w-full border-1 border-meA3 rounded-[4px] lg:px-5 px-3 py-2 flex items-center">
                                                                            <input name="phone"
                                                                                data-id="receipientData{{$recipient->id}}" placeholder="{{__('labels.check_out.phone_number')}}"
                                                                                value="@@phno" type="pattern" pattern="[\d]{4} [\d]{4}"
                                                                                class="placeholder:text-lightgray me-body-18 contact-info-phno-receipientData{{$recipient->id}} text-darkgray bg-transparent w-full focus:outline-none focus-visible:outline-none checkout_ph_format"/>
                                                                            <div class="hidden">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none">
                                                                                    <g
                                                                                        clip-path="url(#clip0_5371_59957)">
                                                                                        <path
                                                                                            d="M11.2492 15.7501C11.1505 15.7507 11.0526 15.7318 10.9612 15.6945C10.8699 15.6571 10.7867 15.6021 10.7167 15.5326L7.71666 12.5326C7.57543 12.3914 7.49609 12.1999 7.49609 12.0001C7.49609 11.8004 7.57543 11.6089 7.71666 11.4676C7.85789 11.3264 8.04944 11.2471 8.24916 11.2471C8.44889 11.2471 8.64043 11.3264 8.78166 11.4676L11.2492 13.9426L15.9667 9.21764C16.1079 9.07641 16.2994 8.99707 16.4992 8.99707C16.6989 8.99707 16.8904 9.07641 17.0317 9.21764C17.1729 9.35887 17.2522 9.55041 17.2522 9.75014C17.2522 9.94986 17.1729 10.1414 17.0317 10.2826L11.7817 15.5326C11.7116 15.6021 11.6285 15.6571 11.5371 15.6945C11.4457 15.7318 11.3479 15.7507 11.2492 15.7501Z"
                                                                                            fill="#60D669" />
                                                                                        <path
                                                                                            d="M12 21.75C10.0716 21.75 8.18657 21.1782 6.58319 20.1068C4.97982 19.0355 3.73013 17.5127 2.99218 15.7312C2.25422 13.9496 2.06114 11.9892 2.43735 10.0979C2.81355 8.20656 3.74215 6.46928 5.10571 5.10571C6.46928 3.74215 8.20656 2.81355 10.0979 2.43735C11.9892 2.06114 13.9496 2.25422 15.7312 2.99218C17.5127 3.73013 19.0355 4.97982 20.1068 6.58319C21.1782 8.18657 21.75 10.0716 21.75 12C21.75 14.5859 20.7228 17.0658 18.8943 18.8943C17.0658 20.7228 14.5859 21.75 12 21.75ZM12 3.75C10.3683 3.75 8.77326 4.23386 7.41655 5.14038C6.05984 6.0469 5.00242 7.33538 4.378 8.84287C3.75358 10.3504 3.5902 12.0092 3.90853 13.6095C4.22685 15.2098 5.01259 16.6799 6.16637 17.8336C7.32016 18.9874 8.79017 19.7732 10.3905 20.0915C11.9909 20.4098 13.6497 20.2464 15.1571 19.622C16.6646 18.9976 17.9531 17.9402 18.8596 16.5835C19.7661 15.2268 20.25 13.6317 20.25 12C20.25 9.81197 19.3808 7.71355 17.8336 6.16637C16.2865 4.6192 14.188 3.75 12 3.75Z"
                                                                                            fill="#60D669" />
                                                                                    </g>
                                                                                    <defs>
                                                                                        <clipPath id="clip0_5371_59957">
                                                                                            <rect width="24" height="24"
                                                                                                fill="white" />
                                                                                        </clipPath>
                                                                                    </defs>
                                                                                </svg>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="xl:w-[48.5%] w-full mt-5 hidden">
                                                                    <p class="font-normal me-body-16 text-darkgray">
                                                                        @lang('labels.check_out.email')</p>
                                                                    <div
                                                                        class="w-full border-1 border-meA3 bg-meBg rounded-[4px] lg:px-5 px-3 py-2 flex items-center hidden bg-meBg">
                                                                        <input disabled name="email"
                                                                            placeholder=""
                                                                            type="email"
                                                                            class=" me-body-18 contact-info-email-receipientData{{$recipient->id}} bg-transparent w-full focus:outline-none focus-visible:outline-none" />
                                                                        <div>
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none">
                                                                                <g clip-path="url(#clip0_5371_59957)">
                                                                                    <path
                                                                                        d="M11.2492 15.7501C11.1505 15.7507 11.0526 15.7318 10.9612 15.6945C10.8699 15.6571 10.7867 15.6021 10.7167 15.5326L7.71666 12.5326C7.57543 12.3914 7.49609 12.1999 7.49609 12.0001C7.49609 11.8004 7.57543 11.6089 7.71666 11.4676C7.85789 11.3264 8.04944 11.2471 8.24916 11.2471C8.44889 11.2471 8.64043 11.3264 8.78166 11.4676L11.2492 13.9426L15.9667 9.21764C16.1079 9.07641 16.2994 8.99707 16.4992 8.99707C16.6989 8.99707 16.8904 9.07641 17.0317 9.21764C17.1729 9.35887 17.2522 9.55041 17.2522 9.75014C17.2522 9.94986 17.1729 10.1414 17.0317 10.2826L11.7817 15.5326C11.7116 15.6021 11.6285 15.6571 11.5371 15.6945C11.4457 15.7318 11.3479 15.7507 11.2492 15.7501Z"
                                                                                        fill="#60D669" />
                                                                                    <path
                                                                                        d="M12 21.75C10.0716 21.75 8.18657 21.1782 6.58319 20.1068C4.97982 19.0355 3.73013 17.5127 2.99218 15.7312C2.25422 13.9496 2.06114 11.9892 2.43735 10.0979C2.81355 8.20656 3.74215 6.46928 5.10571 5.10571C6.46928 3.74215 8.20656 2.81355 10.0979 2.43735C11.9892 2.06114 13.9496 2.25422 15.7312 2.99218C17.5127 3.73013 19.0355 4.97982 20.1068 6.58319C21.1782 8.18657 21.75 10.0716 21.75 12C21.75 14.5859 20.7228 17.0658 18.8943 18.8943C17.0658 20.7228 14.5859 21.75 12 21.75ZM12 3.75C10.3683 3.75 8.77326 4.23386 7.41655 5.14038C6.05984 6.0469 5.00242 7.33538 4.378 8.84287C3.75358 10.3504 3.5902 12.0092 3.90853 13.6095C4.22685 15.2098 5.01259 16.6799 6.16637 17.8336C7.32016 18.9874 8.79017 19.7732 10.3905 20.0915C11.9909 20.4098 13.6497 20.2464 15.1571 19.622C16.6646 18.9976 17.9531 17.9402 18.8596 16.5835C19.7661 15.2268 20.25 13.6317 20.25 12C20.25 9.81197 19.3808 7.71355 17.8336 6.16637C16.2865 4.6192 14.188 3.75 12 3.75Z"
                                                                                        fill="#60D669" />
                                                                                </g>
                                                                                <defs>
                                                                                    <clipPath id="clip0_5371_59957">
                                                                                        <rect width="24" height="24"
                                                                                            fill="white" />
                                                                                    </clipPath>
                                                                                </defs>
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="save-credit-card-container mt-5 inline-block">
                                                                <label
                                                                    for="save-credit-card-receipientData{{$recipient->id}}"
                                                                    class="mt-2 flex-wrap custom-checkbox-label items-start mr-1 last:mr-0 lg:mr-2 lg:last:mr-0 ">
                                                                    <input data-id="receipientData{{$recipient->id}}"
                                                                        type="checkbox"
                                                                        name="save-credit-card-receipientData{{$recipient->id}}"
                                                                        value=""
                                                                        id="save-credit-card-receipientData{{$recipient->id}}"
                                                                        class="mt-[2px] save-credit-card">
                                                                    <span
                                                                        class="custom-checkbox-orange mt-[2px]"></span>
                                                                    <span
                                                                        class="font-normal me-body-18 text-darkgray text-left ml-6 4xl:ml-[30px] mr-2 leading-[normal]">
                                                                        @lang('labels.check_out.save_recipient_detail')
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" class="current-selected-request-id" />
                                        </div>
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            @endforeach
            @endif

            @if(count($isTwoRecipients) > 0)
            @foreach($isTwoRecipients->split($isTwoRecipients->count()/2) as $key => $row)
            @if(count($row) == 2)
            @php
                if($key == 0){
                    $keyVal = $row[0];
                }else{
                    $keyVal = $row[1];
                }
            @endphp
            <div>
                <div class="flex justify-between ">
                    <div class="flex items-center">
                        <img src="{{asset($keyVal->product->merchant->icon)}}" alt="logo"
                            class="rounded-full max-w-[40x] max-h-[40px] object-cover mr-3 checkout_product_image_small" />
                        <p class="font-normal me-body-20 text-darkgray">
                            {{langbind($keyVal->product->merchant,'name') ?? ''}}</p>
                    </div>
                </div>
                <div class="hidden">
                    <div class="flex justify-between">
                        <p class="font-bold me-body-26 text-darkgray">Expired</p>
                    </div>
                </div>
                <div class="hidden">
                    <div class="flex justify-between">
                        <p class="font-bold me-body-26 text-darkgray">Unavailable</p>
                        <div class="flex flex-wrap">
                            <p class="italic me-body-16 font-normal text-mered mr-8">undefined</p>
                        </div>
                    </div>
                </div>
            </div>

            <div component="me-checkout-enter-info-card-content"
                class="me-checkout-enter-info-card-content relative my-5 lg:px-10 sm:px-5 px-4 py-5">
                <div>

                    <div class="flex sm:flex-row flex-col available-card">
                        <div class="w-[80px] h-[80px] 7xl:w-[100px] 7xl:h-[100px] rounded-[50%] mr-5 border border-mee4 checkout-card-logo-img">
                            <img src="{{$keyVal->product->merchant->icon}}" alt="logo"
                                class="mr-5 w-full h-full object-cover rounded-[50%]" />
                        </div>
                        <div class="checkout-card-text-section">
                            <div class="checkout-card-pdiv">
                                <a href="{{ route('product-detail',['category' => isset($keyVal->product->category) ? str_replace(' ','-',$keyVal->product->category->name_en) : '', 'slug' => isset($keyVal->product->slug_en) ? $keyVal->product->slug_en : '']) }}">

                                    <p class="font-bold me-body-26 text-darkgray">{{langbind($keyVal->product,'name')}}</p>
                                </a>
                                <div class="flex justify-between mt-1">
                                    <p class="font-normal me-body-18 text-darkgray">
                                        @if(isset($keyVal->product->number_of_dose))
                                        {{$keyVal->product->number_of_dose}}
                                        {{$keyVal->product->number_of_dose == 1 ? __('labels.product_detail.item') : __('labels.product_detail.items')}}
                                        @endif
                                    </p>
                                    @php
                                    $pprice = ($keyVal->each_recipient_amount + $keyVal->add_on_prices) + $row[1]->add_on_prices;
                                    $reciId = App\Models\Recipient::where('id',$keyVal->id)->first();
                                    @endphp
                                    <p class="font-bold me-body-20 text-darkgray">${{number_format($pprice, 2)}}</p>
                                </div>
                            </div>
                            <div component-name="me-checkout-enter-info-card-recipient-data" class="">
                                <div class="me-checkout-enter-info-card-recipient-data-container">
                                    @if(count($row) > 0)
                                    @foreach($row as $rrkey => $recipient)
                                    @php
                                    $product = App\Models\Product::where('id',$recipient->product_id)
                                    ->first();
                                    $product_merchant = $product->merchant()
                                    ->with(['merchantLocations','merchantLocations.area','merchantLocations.weekDays','merchantLocations.events'])->first()
                                    @endphp
                                    <div class="mt-7 recipient-card-parent-2">
                                        <p class=" font-bold me-body-20 text-white px-5 py-[10px] bg-blueMediq">
                                            @lang('labels.product_detail.recipient') {{$rrkey+1}}</p>
                                        <div class="mt-4">
                                            <div component-name="me-checkout-merchant-recipient-preferredTime-detail"
                                                class="mt-1">
                                                <div class="flex">
                                                    <div
                                                        class="flex w-full justify-between preferredTime-detailreceipientData111 flex">
                                                        <div class="flex items-center">
                                                            <div class="mr-2 max-w-[24px] w-[24px]">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                    height="21" viewBox="0 0 20 21" fill="none">
                                                                    <path
                                                                        d="M14.1667 12.1667C14.3877 12.1667 14.5996 12.0789 14.7559 11.9226C14.9122 11.7663 15 11.5543 15 11.3333C15 11.1123 14.9122 10.9004 14.7559 10.7441C14.5996 10.5878 14.3877 10.5 14.1667 10.5C13.9457 10.5 13.7337 10.5878 13.5774 10.7441C13.4211 10.9004 13.3333 11.1123 13.3333 11.3333C13.3333 11.5543 13.4211 11.7663 13.5774 11.9226C13.7337 12.0789 13.9457 12.1667 14.1667 12.1667ZM14.1667 15.5C14.3877 15.5 14.5996 15.4122 14.7559 15.2559C14.9122 15.0996 15 14.8877 15 14.6667C15 14.4457 14.9122 14.2337 14.7559 14.0774C14.5996 13.9211 14.3877 13.8333 14.1667 13.8333C13.9457 13.8333 13.7337 13.9211 13.5774 14.0774C13.4211 14.2337 13.3333 14.4457 13.3333 14.6667C13.3333 14.8877 13.4211 15.0996 13.5774 15.2559C13.7337 15.4122 13.9457 15.5 14.1667 15.5ZM10.8333 11.3333C10.8333 11.5543 10.7455 11.7663 10.5893 11.9226C10.433 12.0789 10.221 12.1667 10 12.1667C9.77899 12.1667 9.56702 12.0789 9.41074 11.9226C9.25446 11.7663 9.16667 11.5543 9.16667 11.3333C9.16667 11.1123 9.25446 10.9004 9.41074 10.7441C9.56702 10.5878 9.77899 10.5 10 10.5C10.221 10.5 10.433 10.5878 10.5893 10.7441C10.7455 10.9004 10.8333 11.1123 10.8333 11.3333ZM10.8333 14.6667C10.8333 14.8877 10.7455 15.0996 10.5893 15.2559C10.433 15.4122 10.221 15.5 10 15.5C9.77899 15.5 9.56702 15.4122 9.41074 15.2559C9.25446 15.0996 9.16667 14.8877 9.16667 14.6667C9.16667 14.4457 9.25446 14.2337 9.41074 14.0774C9.56702 13.9211 9.77899 13.8333 10 13.8333C10.221 13.8333 10.433 13.9211 10.5893 14.0774C10.7455 14.2337 10.8333 14.4457 10.8333 14.6667ZM5.83333 12.1667C6.05435 12.1667 6.26631 12.0789 6.42259 11.9226C6.57887 11.7663 6.66667 11.5543 6.66667 11.3333C6.66667 11.1123 6.57887 10.9004 6.42259 10.7441C6.26631 10.5878 6.05435 10.5 5.83333 10.5C5.61232 10.5 5.40036 10.5878 5.24408 10.7441C5.0878 10.9004 5 11.1123 5 11.3333C5 11.5543 5.0878 11.7663 5.24408 11.9226C5.40036 12.0789 5.61232 12.1667 5.83333 12.1667ZM5.83333 15.5C6.05435 15.5 6.26631 15.4122 6.42259 15.2559C6.57887 15.0996 6.66667 14.8877 6.66667 14.6667C6.66667 14.4457 6.57887 14.2337 6.42259 14.0774C6.26631 13.9211 6.05435 13.8333 5.83333 13.8333C5.61232 13.8333 5.40036 13.9211 5.24408 14.0774C5.0878 14.2337 5 14.4457 5 14.6667C5 14.8877 5.0878 15.0996 5.24408 15.2559C5.40036 15.4122 5.61232 15.5 5.83333 15.5Z"
                                                                        fill="#333333" />
                                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                                        d="M5.83268 1.95801C5.99844 1.95801 6.15741 2.02386 6.27462 2.14107C6.39183 2.25828 6.45768 2.41725 6.45768 2.58301V3.21884C7.00935 3.20801 7.61685 3.20801 8.28518 3.20801H11.7127C12.3818 3.20801 12.9893 3.20801 13.541 3.21884V2.58301C13.541 2.41725 13.6069 2.25828 13.7241 2.14107C13.8413 2.02386 14.0003 1.95801 14.166 1.95801C14.3318 1.95801 14.4907 2.02386 14.608 2.14107C14.7252 2.25828 14.791 2.41725 14.791 2.58301V3.27217C15.0077 3.28884 15.2127 3.30967 15.4068 3.33551C16.3835 3.46717 17.1743 3.74384 17.7985 4.36717C18.4218 4.99134 18.6985 5.78217 18.8302 6.75884C18.9577 7.70884 18.9577 8.92134 18.9577 10.453V12.213C18.9577 13.7447 18.9577 14.958 18.8302 15.9072C18.6985 16.8838 18.4218 17.6747 17.7985 18.2988C17.1743 18.9222 16.3835 19.1988 15.4068 19.3305C14.4568 19.458 13.2443 19.458 11.7127 19.458H8.28601C6.75435 19.458 5.54102 19.458 4.59185 19.3305C3.61518 19.1988 2.82435 18.9222 2.20018 18.2988C1.57685 17.6747 1.30018 16.8838 1.16852 15.9072C1.04102 14.9572 1.04102 13.7447 1.04102 12.213V10.453C1.04102 8.92134 1.04102 7.70801 1.16852 6.75884C1.30018 5.78217 1.57685 4.99134 2.20018 4.36717C2.82435 3.74384 3.61518 3.46717 4.59185 3.33551C4.78602 3.30967 4.99185 3.28884 5.20768 3.27217V2.58301C5.20768 2.41725 5.27353 2.25828 5.39074 2.14107C5.50795 2.02386 5.66692 1.95801 5.83268 1.95801ZM4.75768 4.57467C3.92018 4.68717 3.43685 4.89884 3.08435 5.25134C2.73185 5.60384 2.52018 6.08717 2.40768 6.92551C2.38852 7.06717 2.37268 7.21717 2.35935 7.37467H17.6393C17.626 7.21634 17.6102 7.06717 17.591 6.92467C17.4785 6.08717 17.2668 5.60384 16.9143 5.25134C16.5618 4.89884 16.0785 4.68717 15.2402 4.57467C14.3843 4.45967 13.2552 4.45801 11.666 4.45801H8.33268C6.74351 4.45801 5.61518 4.45967 4.75768 4.57467ZM2.29102 10.4997C2.29102 9.78801 2.29102 9.16884 2.30185 8.62467H17.6968C17.7077 9.16884 17.7077 9.78801 17.7077 10.4997V12.1663C17.7077 13.7555 17.706 14.8847 17.591 15.7413C17.4785 16.5788 17.2668 17.0622 16.9143 17.4147C16.5618 17.7672 16.0785 17.9788 15.2402 18.0913C14.3843 18.2063 13.2552 18.208 11.666 18.208H8.33268C6.74351 18.208 5.61518 18.2063 4.75768 18.0913C3.92018 17.9788 3.43685 17.7672 3.08435 17.4147C2.73185 17.0622 2.52018 16.5788 2.40768 15.7405C2.29268 14.8847 2.29102 13.7555 2.29102 12.1663V10.4997Z"
                                                                        fill="#333333" />
                                                                </svg>
                                                            </div>
                                                            @if($recipient->is_prefer_time_decide_later != true)
                                                            <p
                                                                class="font-normal me-body-18 text-darkgray flex items-center preferredTime">
                                                                <span
                                                                    class="preferred-name-receipientData111">{{isset($recipient->area) ? langbind($recipient->area,'name') : ''}}</span>
                                                                @php 
                                                                $preferDate = '';
                                                                if(isset($recipient->date)){
                                                                    if(lang() == 'en'){
                                                                        $preferDate = date('Y F d', strtotime($recipient->date));
                                                                    }else{
                                                                        $preferDate = date('Y', strtotime($recipient->date)).'年'.date('M', strtotime($recipient->date)).'月'.date('d', strtotime($recipient->date)).'日';
                                                                    }
                                                                }
                                                                @endphp
                                                                <span
                                                                    class="preferred-date-receipientData111">{{$preferDate}}</span>
                                                                @if(lang() == "en" && $recipient->time  == 'AM')
                                                                <span  class="preferred-timeDesc-receipientData111">AM</span>
                                                                @elseif($recipient->time  == 'AM' &&  lang() == "zh-hk" || lang() == "zh-cn" )
                                                                <span  class="preferred-timeDesc-receipientData111">上午</span>
                                                                @elseif(lang() == "en" && $recipient->time  == 'PM')
                                                                <span  class="preferred-timeDesc-receipientData111">PM</span>
                                                                @elseif($recipient->time  == 'PM' &&  lang() == "zh-hk" || lang() == "zh-cn")
                                                                <span  class="preferred-timeDesc-receipientData111">下午</span>
                                                                @else
                                                                <span  class="preferred-timeDesc-receipientData111">{{$recipient->time ?? ''}}</span>
                                                                @endif
                                                            </p>
                                                            @else
                                                            <p
                                                                class="cursor-pointer font-normal me-body-18 text-darkgray">
                                                                {{__('labels.check_out.loction_and_time_decide_later')}}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            @if(count($recipient->group_data) > 0)
                                            @foreach($recipient->group_data as $group)
                                            @php
                                            $checkUpTable = $recipient->product->package->checkupTable;
                                            $tablePriIds =
                                            App\Models\CheckUpTableType::where('check_up_type_id',2)->where('check_up_table_id',$checkUpTable->id)->pluck('id')->toArray();
                                            $optionGroupIds=
                                            App\Models\CheckTableItem::where('check_up_group_id',$group->id)->whereIn('check_up_table_type_id',$tablePriIds)->distinct()->pluck('check_up_item_id')->toArray();
                                            $countEquivalentNumber = App\Models\CheckUpItem::whereIn('id',$optionGroupIds)->sum('equivalent_number');
                                            @endphp
                                            <div component-name="me-checkout-merchant-recipient-cancerMarker-detail"
                                                class="mt-1">
                                                <div class="flex sm:flex-row flex-col">

                                                    <div
                                                        class="flex w-full justify-between cancer-markers-detail-data1-receipientData111">
                                                        <div class="flex items-center w-full">
                                                            <div class="mr-2 max-w-[24px] w-[24px]">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="25" viewBox="0 0 24 25" fill="none">
                                                                    <path
                                                                        d="M9.4979 3.00898C8.94263 3.08328 8.22312 3.3531 7.73824 3.66984C7.3824 3.90446 6.83104 4.44409 6.60815 4.77647C6.38525 5.10885 6.15845 5.58982 6.02941 6.01605C5.93165 6.34452 5.92383 6.41882 5.91992 7.0914C5.91992 7.72097 5.92774 7.83437 5.99422 7.96341C6.20929 8.39746 6.8193 8.40919 7.03046 7.98296C7.09694 7.8461 7.10085 7.7718 7.08521 7.28692C7.05784 6.66126 7.11258 6.36407 7.32765 5.89092C7.49189 5.53508 7.65221 5.30046 7.91812 5.03846C8.81359 4.13908 10.1431 3.91228 11.2849 4.45582C12.0475 4.81948 12.6497 5.55072 12.8647 6.38363C12.9273 6.61043 12.9429 6.78639 12.939 7.1305C12.9234 7.90476 12.9273 7.91649 13.0055 8.02207C13.2088 8.29188 13.4786 8.36227 13.7563 8.21758C13.9909 8.09636 14.0652 7.93995 14.1082 7.47853C14.1786 6.72774 14.0457 6.00823 13.7015 5.31219C13.4552 4.80775 13.2049 4.46755 12.8178 4.10389C12.0748 3.40002 11.1794 3.03245 10.1431 3.00507C9.86548 2.99725 9.5722 3.00116 9.4979 3.00898Z"
                                                                        fill="#333333" />
                                                                    <path
                                                                        d="M9.54314 5.43202C9.05825 5.56106 8.62029 5.93645 8.39349 6.41352L8.26836 6.67942L8.25663 11.3992C8.25272 14.07 8.23316 16.1229 8.21361 16.1229C8.19406 16.1229 8.03374 15.9626 7.85386 15.7632C7.2282 15.0789 6.84499 14.8873 6.14503 14.9186C5.81656 14.9303 5.73053 14.9498 5.49982 15.0632C4.48704 15.552 4.17812 16.862 4.87807 17.7184C4.97583 17.8435 5.97689 18.9189 7.09525 20.1115C9.18338 22.3326 9.35544 22.4968 9.85988 22.7315C10.4191 22.9934 10.2978 22.9817 13.3284 22.9974C15.6237 23.0052 16.1321 22.9974 16.3863 22.9504C16.9885 22.837 17.4577 22.5868 17.9113 22.1449C18.4157 21.6483 18.6895 21.0656 18.7716 20.3188C18.7951 20.0685 18.8068 18.8328 18.799 16.7877L18.7833 13.6399L18.6973 13.4052C18.5096 12.9047 18.1303 12.5176 17.6415 12.326C17.3404 12.2087 16.7734 12.1969 16.4645 12.3064C16.2572 12.3768 16.2494 12.3768 16.2025 12.3064C15.9209 11.8998 15.6785 11.6925 15.2914 11.54C14.9942 11.4266 14.4233 11.4188 14.1183 11.5244C13.911 11.5947 13.9032 11.5947 13.8563 11.5244C13.5747 11.1177 13.3284 10.9104 12.9451 10.7618C12.7105 10.668 12.1983 10.6406 11.9167 10.6993L11.7681 10.7306V8.87313C11.7681 7.67265 11.7525 6.94142 11.7251 6.80846C11.5179 5.81132 10.5051 5.17393 9.54314 5.43202ZM10.3135 6.64814C10.3682 6.69115 10.4503 6.77327 10.4934 6.83193C10.5755 6.93751 10.5755 6.97661 10.595 10.668C10.6146 14.3633 10.6146 14.3985 10.6967 14.508C10.8727 14.7504 11.2246 14.8247 11.4553 14.6644C11.7486 14.4649 11.7447 14.4806 11.7681 13.2684C11.7877 12.2439 11.7916 12.1735 11.8698 12.0679C12.124 11.7238 12.6206 11.759 12.8435 12.1383C12.9139 12.2595 12.9217 12.3612 12.9412 13.3349C12.9608 14.332 12.9647 14.4024 13.0429 14.508C13.2971 14.8521 13.7937 14.8169 14.0166 14.4376C14.0831 14.3242 14.0987 14.2108 14.1143 13.632C14.13 13.0338 14.1417 12.9477 14.216 12.85C14.4702 12.5059 14.9668 12.5411 15.1897 12.9204C15.2562 13.0338 15.2718 13.1472 15.2875 13.7259C15.3031 14.3242 15.3148 14.4102 15.3891 14.508C15.5103 14.6722 15.7059 14.7621 15.9092 14.7426C16.2416 14.7074 16.4136 14.4845 16.4567 14.0309C16.4762 13.8315 16.5075 13.7024 16.5622 13.632C16.8164 13.2879 17.313 13.3231 17.5359 13.7024C17.6141 13.8315 17.6141 13.9058 17.6141 17.1005C17.6141 20.1975 17.6102 20.3774 17.5398 20.5808C17.3248 21.2103 16.8281 21.6639 16.2103 21.793C16.0695 21.8203 15.1662 21.8321 13.3479 21.8242C10.6928 21.8125 10.6928 21.8125 10.4738 21.7226C10.3526 21.6757 10.1727 21.5779 10.0749 21.5075C9.8325 21.3355 5.7931 17.038 5.72271 16.8776C5.60931 16.6156 5.69143 16.3419 5.9456 16.1542C6.059 16.0682 6.32882 16.0486 6.49305 16.1151C6.5478 16.1386 7.00531 16.5844 7.50584 17.1084C8.01027 17.6284 8.46388 18.0899 8.51862 18.125C8.65939 18.2228 8.97613 18.2189 9.13646 18.1172C9.20684 18.0781 9.29287 17.9843 9.33198 17.9139C9.39845 17.7927 9.40236 17.4877 9.42191 12.3416C9.44147 6.91404 9.44147 6.8984 9.52358 6.78891C9.70346 6.54256 10.0828 6.47608 10.3135 6.64814Z"
                                                                        fill="#333333" />
                                                                </svg>
                                                            </div>
                                                            @if(lang() == 'en')
                                                            <p
                                                                class="mr-2 font-normal me-body-18 text-darkgray cancer-markers-label-1-receipientData{{$group->id}}{{$recipient->id}} ">
                                                                {{langbind($group,'name')}} (Selcted<span
                                                                    class="selected-cancermarkers-counet-1-receipientData111"> {{$group->itemDatas($group->id,$recipient->id,$recipient->product->id)->sum('equivalent_number')}}</span>
                                                                    {{__('labels.product_detail.items')}})</p>
                                                            @else 
                                                            <p class="mr-2 font-normal me-body-18 text-darkgray cancer-markers-label-1-receipientData{{$group->id}}{{$recipient->id}} ">
                                                                {{langbind($group,'name')}} ({{__('labels.check_out.selected')}}<span class="selected-cancermarkers-count-1-receipientData111">{{$group->itemDatas($group->id,$recipient->id,$recipient->product->id)->sum('equivalent_number')}}</span>{{__('labels.product_detail.items')}})</p>
                                                            @endif
                                                            <div class="showDropdown-btn active">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                    height="7" viewBox="0 0 12 7" fill="none">
                                                                    <path
                                                                        d="M0.042841 6.46313C0.14831 6.69047 0.413154 6.7936 0.649873 6.6975C0.713154 6.67172 1.46315 5.93344 3.36628 4.02094L5.99831 1.37719L8.628 4.02094C10.5358 5.93579 11.2835 6.67172 11.3467 6.6975C11.396 6.71625 11.478 6.73266 11.5296 6.73266C11.8671 6.73266 12.0944 6.39047 11.9538 6.08813C11.8905 5.95454 6.32878 0.367034 6.19753 0.308441C6.078 0.252191 5.91862 0.252191 5.79909 0.308441C5.66784 0.367034 0.106123 5.95453 0.042841 6.08813C-0.0134086 6.20766 -0.0134086 6.3436 0.042841 6.46313Z"
                                                                        fill="#333333" />
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="detail-data-list1-receipientData111">
                                                        <div component-name="me-checkout-merchant-recipient-cancerMarkers-detail-list" class="pl-8 mt-1">
                                                            <ul class="custom-list-style bg-far px-5 py-[10px] rounded-[12px] cancerMarkers-detail-data1-receipientData111">

                                                                @if(count($group->itemDatas($group->id,$recipient->id,$recipient->product->id)) > 0)
                                                                    @foreach($group->itemDatas($group->id,$recipient->id,$recipient->product->id) as $item)
                                                                    <li class="flex items-center mt-2">
                                                                        <span class="mr-4 font-normal me-body-18 text-darkgray">{{langbind($item,'name')}}</span>
                                                                    </li>
                                                                    @endforeach
                                                                @else 
                                                                    <li class="flex items-center mt-2">
                                                                        <span class="mr-4 font-normal me-body-18 text-darkgray">{{__('labels.check_out.optional_decide_later')}}</span>
                                                                    </li>
                                                                @endif

                                                            </ul>
                                                        </div>
                                                </div>

                                            </div>


                                            @endforeach
                                            @endif

                                            @if(count($recipient->add_on_data) > 0)
                                            <div component-name="me-checkout-merchant-recipient-preferredTime-detail"
                                                class="mt-1">
                                                <div>
                                                    <div class="flex w-full justify-between addson-show-detail-receipientData111"
                                                        style="display:block">
                                                        <div class="flex items-center w-full">
                                                            <div class="mr-2 max-w-[24px] w-[24px]">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="25" viewBox="0 0 24 25" fill="none">
                                                                    <path
                                                                        d="M12.5 21C17.1944 21 21 17.1944 21 12.5C21 7.80558 17.1944 4 12.5 4C7.80558 4 4 7.80558 4 12.5C4 17.1944 7.80558 21 12.5 21Z"
                                                                        stroke="#333333" stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                    <path
                                                                        d="M12.4992 8.57715V16.4233M8.57617 12.5002H16.4223"
                                                                        stroke="#333333" stroke-linecap="round"
                                                                        stroke-linejoin="round" />
                                                                </svg>
                                                            </div>
                                                            <p data-id="receipientData111"
                                                                class="mr-2 font-normal me-body-18 text-darkgray underline">
                                                                @lang('labels.check_out.add_on')</p>
                                                            <div class="showDropdown-btn active">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                    height="7" viewBox="0 0 12 7" fill="none">
                                                                    <path
                                                                        d="M0.042841 6.46313C0.14831 6.69047 0.413154 6.7936 0.649873 6.6975C0.713154 6.67172 1.46315 5.93344 3.36628 4.02094L5.99831 1.37719L8.628 4.02094C10.5358 5.93579 11.2835 6.67172 11.3467 6.6975C11.396 6.71625 11.478 6.73266 11.5296 6.73266C11.8671 6.73266 12.0944 6.39047 11.9538 6.08813C11.8905 5.95454 6.32878 0.367034 6.19753 0.308441C6.078 0.252191 5.91862 0.252191 5.79909 0.308441C5.66784 0.367034 0.106123 5.95453 0.042841 6.08813C-0.0134086 6.20766 -0.0134086 6.3436 0.042841 6.46313Z"
                                                                        fill="#333333" />
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class=" addson-detail-list-receipientData111">
                                                    <div component-name="me-checkout-merchant-recipient-addonItems-detail-list"
                                                        class="pl-8 mt-1">
                                                        <ul
                                                            class="custom-list-style bg-far px-5 py-[10px] rounded-[12px] adds-on-checklist-detailreceipientData111">
                                                            @if($recipient->is_optional_decide_later != true)
                                                            @foreach($recipient->add_on_data as $item)
                                                            <li data-text="Upper Abdomen Ultrasound"
                                                                data-price="{{$item->discount_price ? $item->discount_price :$item->original_price}}"
                                                                class="flex items-center mt-2">
                                                                <span
                                                                    class="mr-4 font-normal me-body-18 text-darkgray">{{langbind($item,'name')}}</span>
                                                                <span
                                                                    class="font-normal me-body-18 text-darkgray">${{$item->discount_price ? $item->discount_price :$item->original_price}}</span>
                                                            </li>
                                                            @endforeach
                                                            @else 
                                                            <p
                                                                class="cursor-pointer font-normal me-body-18 text-darkgray">
                                                                {{__('labels.check_out.no_additional_item')}}</p>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="hidden">
                                                    <input data-id="receipientData111" value="" type="hidden"
                                                        class="addson-checklist addson-checklist-undefined addson-checklist-receipientData111" />
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="">
                                        <div data-id="receipientData{{$recipient->id}}"
                                            component-name="me-checkout-enter-info-card-edit"
                                            class="me-checkout-enter-info-card-edit mt-4">
                                            <div>
                                                <p data-id="receipientData{{$recipient->id}}" data-placeholder="{{__('labels.check_out.please_enter_your_requests')}}"
                                                    class="cursor-pointer request-more-btnreceipientData{{$recipient->id}} request-more-btn font-normal me-body-18 text-darkgray underline" data-text="">
                                                    @lang('labels.check_out.click')
                                                </p>
                                                <div class="flex justify-end">
                                                    <div class="relative flex flex-wrap items-center">
                                                        <label
                                                            for="checkout-make-booking-receipientData{{$recipient->id}}"
                                                            class="mt-2 flex-wrap custom-checkbox-label flex items-start mr-1 last:mr-0 lg:mr-2 lg:last:mr-0">
                                                            <input type="checkbox" data-id="receipientData{{$recipient->id}}"
                                                                name="checkout-make-booking" value=""
                                                                id="checkout-make-booking-receipientData{{$recipient->id}}"
                                                                class="mt-[2px] checkout-make-booking">
                                                            <span class="custom-checkbox-orange mt-[2px]"></span>
                                                            <span
                                                                class="font-normal me-body-18 text-darkgray text-left ml-6 4xl:ml-[30px] mr-2 leading-[normal]">
                                                                @lang('labels.check_out.make_booking')
                                                            </span>
                                                        </label>
                                                        @if(count($customer->familyMembers)>0)
                                                        <div class="mt-2 relative">
                                                            <div
                                                                class="flex items-center same-with-text same-with-content-item pointer-events-none">
                                                                <p
                                                                    class="same-with-content-item selected-text font-normal me-body-18 text-darkgray underline cursor-pointer">
                                                                    @lang('labels.check_out.same_with')</p>
                                                                @if(count($customer->familyMembers) > 1)
                                                                <div class="same-with-content-item">
                                                                    <svg class="same-with-content-item"
                                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="25" viewBox="0 0 24 25" fill="none">
                                                                        <path
                                                                            d="M18.9533 11.7039C18.8478 11.4765 18.5829 11.3734 18.3462 11.4695C18.2829 11.4953 17.5329 12.2336 15.6298 14.1461L12.9978 16.7898L10.3681 14.1461C8.46028 12.2312 7.71263 11.4953 7.64935 11.4695C7.60013 11.4507 7.5181 11.4343 7.46653 11.4343C7.12903 11.4343 6.90169 11.7765 7.04231 12.0789C7.1056 12.2125 12.6673 17.8 12.7986 17.8586C12.9181 17.9148 13.0775 17.9148 13.197 17.8586C13.3283 17.8 18.89 12.2125 18.9533 12.0789C19.0095 11.9593 19.0095 11.8234 18.9533 11.7039Z"
                                                                            fill="#7C7C7C" />
                                                                    </svg>
                                                                </div>
                                                                @endif
                                                            </div>
                                                            <div
                                                                class="min-w-[200px] same-with-content hidden absolute top-full bg-whitez w-full 2xs:right-0 right-[unset] 2xs:left-[unset] left-0 z-[1]">
                                                                <ul class="list-none same-with-content-item">
                                                                    @foreach($customer->familyMembers as $key => $member)
                                                                    @php
                                                                        $checkCode = isset($member->phone) ? str_split($member->phone , 3) : '+852';
                                                                        if($checkCode[0] == "+86"){
                                                                            $digit = 3;
                                                                        }else{
                                                                            $digit = 4;
                                                                        }
                                                                        $code = isset($member->phone) ? str_split($member->phone , $digit) : '+852';
                                                                        $phone = isset($member->phone) ? substr($member->phone , $digit) : null;
                                                                        if($code[0] == '+'){
                                                                            $pcode = '+852';
                                                                        }else{
                                                                            $pcode = $code[0];
                                                                        }
                                                                    @endphp
                                                                    <li data-contactperson="{{$key == 0 ? 'true' : 'false'}}" data-id="receipientData{{$recipient->id}}" data-uniqueID="{{$member->id}}"
                                                                        data-gender="{{$member->title == 'false' ? 2 : 1}}" data-lastname="{{isset($member->last_name) ? $member->last_name : 'Person'}}"
                                                                        data-firstname="{{isset($member->first_name) ? $member->first_name : 'Contact'}}"
                                                                        data-countrycode="{{$pcode}}" data-phone="{{ isset($member->phone) ? $phone : '' }}"
                                                                        class="font-normal me-body-16 text-darkgray px-5 py-[10px] cursor-pointer same-with-content-item {{$key == 0 ? 'active' : ''}}">
                                                                        @if($key == 0)
                                                                        {{__('labels.check_out.contact_person')}}
                                                                        @else
                                                                        {{ $member->last_name.' '.$member->first_name }}
                                                                        @endif
                                                                    </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 card-edit-info bg-far p-5">
                                                <div data-id="{{$recipient->id}}"
                                                    component-name="me-checkout-contact-info-edit"
                                                    class="me-checkout-contact-info-edit-container">
                                                    <div class="rounded-[12px] me-checkout-contact-info-edit">
                                                        <div class="">
                                                            <div>
                                                                <p class="font-normal me-body-16 text-darkgray">
                                                                    @lang('labels.check_out.title')<span class="text-mered me-body-16 font-normal title-required-message-receipientData{{$recipient->id}} ml-2 hidden">{{__('labels.check_out.title_validate_message')}}</span></p>
                                                                <div class="flex checkout-info-gender mt-2">
                                                                    <div class="mr-4">
                                                                        <label
                                                                            for="checkout-male-rdo-receipientData{{$recipient->id}}"
                                                                            class=" flex relative min-w-[107px] cursor-pointer">
                                                                            <input type="radio"
                                                                                id="checkout-male-rdo-receipientData{{$recipient->id}}"
                                                                                name="checkout-gender-receipientData{{$recipient->id}}"
                                                                                class="opacity-0 absolute w-full h-full cursor-pointer checkout-male-rdo"
                                                                                value="2" checked="checked" />
                                                                            <p
                                                                                class="min-w-[107px] text-center font-normal me-body-18 text-darkgray p-[5px] rounded-[4px]">
                                                                                @lang('labels.check_out.mr')
                                                                            </p>
                                                                        </label>
                                                                    </div>
                                                                    <div>
                                                                        <label
                                                                            for="checkout-female-rdo-receipientData{{$recipient->id}}"
                                                                            class=" flex relative min-w-[107px] cursor-pointer">
                                                                            <input type="radio"
                                                                                id="checkout-female-rdo-receipientData{{$recipient->id}}"
                                                                                name="checkout-gender-receipientData{{$recipient->id}}"
                                                                                class="opacity-0 absolute w-full h-full cursor-pointer checkout-female-rdo"
                                                                                value="1" />
                                                                            <p
                                                                                class="min-w-[107px] text-center font-normal me-body-18 text-darkgray p-[5px] rounded-[4px]">
                                                                                @lang('labels.check_out.ms')
                                                                            </p>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="flex xl:justify-between xl:flex-row flex-col">
                                                                <div class="xl:w-[48.5%] w-full xl:mr-[30px] mt-5">
                                                                    <p class="font-normal me-body-16 text-darkgray">
                                                                        @lang('labels.check_out.last_name')</p>
                                                                    <div
                                                                        class="w-full border-1 text-darkgray border-meA3 me-body-18 font-normal bg-meBg rounded-[4px] lg:px-5 px-3 py-2 flex items-center">
                                                                        <input name="last_name"
                                                                            data-id="receipientData{{$recipient->id}}"
                                                                            value="" type="text"
                                                                            placeholder="@lang('labels.check_out.last_name_same_as_id')"
                                                                            class="placeholder:text-lightgray contact-info-lastname-receipientData{{$recipient->id}} text-darkgray bg-transparent font-normal me-body-18 w-full focus:outline-none focus-visible:outline-none" />
                                                                        <div class="hidden error-first-box-ico">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none">
                                                                                <path
                                                                                    d="M12.5908 10.6914C12.5641 10.5439 12.4831 10.4117 12.3638 10.3209C12.2445 10.2301 12.0955 10.1872 11.9462 10.2008C11.7969 10.2143 11.658 10.2833 11.557 10.3941C11.456 10.5049 11.4001 10.6495 11.4004 10.7994V16.2018L11.41 16.3098C11.4367 16.4573 11.5177 16.5895 11.637 16.6803C11.7563 16.7712 11.9053 16.814 12.0546 16.8005C12.2039 16.7869 12.3428 16.718 12.4438 16.6072C12.5448 16.4964 12.6007 16.3517 12.6004 16.2018V10.7994L12.5908 10.6914ZM12.9592 8.09941C12.9592 7.86072 12.8644 7.6318 12.6956 7.46302C12.5268 7.29423 12.2979 7.19941 12.0592 7.19941C11.8205 7.19941 11.5916 7.29423 11.4228 7.46302C11.254 7.6318 11.1592 7.86072 11.1592 8.09941C11.1592 8.33811 11.254 8.56703 11.4228 8.73581C11.5916 8.90459 11.8205 8.99941 12.0592 8.99941C12.2979 8.99941 12.5268 8.90459 12.6956 8.73581C12.8644 8.56703 12.9592 8.33811 12.9592 8.09941ZM21.6004 11.9994C21.6004 9.45333 20.589 7.01154 18.7886 5.21119C16.9883 3.41084 14.5465 2.39941 12.0004 2.39941C9.45431 2.39941 7.01251 3.41084 5.21217 5.21119C3.41182 7.01154 2.40039 9.45333 2.40039 11.9994C2.40039 14.5455 3.41182 16.9873 5.21217 18.7876C7.01251 20.588 9.45431 21.5994 12.0004 21.5994C14.5465 21.5994 16.9883 20.588 18.7886 18.7876C20.589 16.9873 21.6004 14.5455 21.6004 11.9994ZM3.60039 11.9994C3.60039 10.8963 3.81766 9.80401 4.2398 8.78487C4.66194 7.76574 5.28068 6.83973 6.06069 6.05972C6.8407 5.2797 7.76671 4.66096 8.78585 4.23883C9.80498 3.81669 10.8973 3.59941 12.0004 3.59941C13.1035 3.59941 14.1958 3.81669 15.2149 4.23883C16.2341 4.66096 17.1601 5.2797 17.9401 6.05972C18.7201 6.83973 19.3388 7.76574 19.761 8.78487C20.1831 9.80401 20.4004 10.8963 20.4004 11.9994C20.4004 14.2272 19.5154 16.3638 17.9401 17.9391C16.3648 19.5144 14.2282 20.3994 12.0004 20.3994C9.77257 20.3994 7.636 19.5144 6.06069 17.9391C4.48539 16.3638 3.60039 14.2272 3.60039 11.9994Z"
                                                                                    fill="#FE4C26" />
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="xl:w-[48.5%] w-full mt-5">
                                                                    <p class="font-normal me-body-16 text-darkgray">
                                                                        @lang('labels.check_out.first_name')</p>
                                                                    <div
                                                                        class=" noerror-first-box-receipientData{{$recipient->id}} w-full border-1 text-darkgray border-meA3 me-body-18 font-normal bg-meBg rounded-[4px] lg:px-5 px-3 py-2 flex items-center">
                                                                        <input
                                                                            data-id="receipientData{{$recipient->id}}"
                                                                            name="First Name" value="" type="text"
                                                                            placeholder="@lang('labels.check_out.first_name_same_as_id')"
                                                                            class="placeholder:text-lightgray contact-info-firstname-receipientData{{$recipient->id}} text-darkgray bg-transparent font-normal me-body-18 w-full focus:outline-none focus-visible:outline-none" />
                                                                    </div>
                                                                    <div data-id="receipientData{{$recipient->id}}"
                                                                        name="First Name"
                                                                        class="hidden error-first-box w-full border-1 text-darkgray border-meA3 me-body-18 font-normal bg-meBg rounded-[4px] lg:px-5 px-3 py-2 flex items-center">
                                                                        <input
                                                                            data-id="receipientData{{$recipient->id}}"
                                                                            value="" type="text"
                                                                            placeholder="@lang('labels.check_out.en_first_name')"
                                                                            class="focus:placeholder:text-lightgray placeholder:text-orangeMediq contact-info-firstname-receipientData{{$recipient->id}} text-darkgray bg-transparent font-normal me-body-18 w-full focus:outline-none focus-visible:outline-none" />
                                                                        <div class="hidden error-first-box-icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none">
                                                                                <path
                                                                                    d="M12.5908 10.6914C12.5641 10.5439 12.4831 10.4117 12.3638 10.3209C12.2445 10.2301 12.0955 10.1872 11.9462 10.2008C11.7969 10.2143 11.658 10.2833 11.557 10.3941C11.456 10.5049 11.4001 10.6495 11.4004 10.7994V16.2018L11.41 16.3098C11.4367 16.4573 11.5177 16.5895 11.637 16.6803C11.7563 16.7712 11.9053 16.814 12.0546 16.8005C12.2039 16.7869 12.3428 16.718 12.4438 16.6072C12.5448 16.4964 12.6007 16.3517 12.6004 16.2018V10.7994L12.5908 10.6914ZM12.9592 8.09941C12.9592 7.86072 12.8644 7.6318 12.6956 7.46302C12.5268 7.29423 12.2979 7.19941 12.0592 7.19941C11.8205 7.19941 11.5916 7.29423 11.4228 7.46302C11.254 7.6318 11.1592 7.86072 11.1592 8.09941C11.1592 8.33811 11.254 8.56703 11.4228 8.73581C11.5916 8.90459 11.8205 8.99941 12.0592 8.99941C12.2979 8.99941 12.5268 8.90459 12.6956 8.73581C12.8644 8.56703 12.9592 8.33811 12.9592 8.09941ZM21.6004 11.9994C21.6004 9.45333 20.589 7.01154 18.7886 5.21119C16.9883 3.41084 14.5465 2.39941 12.0004 2.39941C9.45431 2.39941 7.01251 3.41084 5.21217 5.21119C3.41182 7.01154 2.40039 9.45333 2.40039 11.9994C2.40039 14.5455 3.41182 16.9873 5.21217 18.7876C7.01251 20.588 9.45431 21.5994 12.0004 21.5994C14.5465 21.5994 16.9883 20.588 18.7886 18.7876C20.589 16.9873 21.6004 14.5455 21.6004 11.9994ZM3.60039 11.9994C3.60039 10.8963 3.81766 9.80401 4.2398 8.78487C4.66194 7.76574 5.28068 6.83973 6.06069 6.05972C6.8407 5.2797 7.76671 4.66096 8.78585 4.23883C9.80498 3.81669 10.8973 3.59941 12.0004 3.59941C13.1035 3.59941 14.1958 3.81669 15.2149 4.23883C16.2341 4.66096 17.1601 5.2797 17.9401 6.05972C18.7201 6.83973 19.3388 7.76574 19.761 8.78487C20.1831 9.80401 20.4004 10.8963 20.4004 11.9994C20.4004 14.2272 19.5154 16.3638 17.9401 17.9391C16.3648 19.5144 14.2282 20.3994 12.0004 20.3994C9.77257 20.3994 7.636 19.5144 6.06069 17.9391C4.48539 16.3638 3.60039 14.2272 3.60039 11.9994Z"
                                                                                    fill="#FE4C26" />
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="flex xl:justify-between xl:flex-row flex-col">
                                                                <div class="xl:w-[48.5%] w-full xl:mr-[30px] mt-5">
                                                                    <p class="font-normal me-body-16 text-darkgray flex flex-wrap">
                                                                    @lang('labels.check_out.phone_optional')
                                                                    <span class="text-mered me-body-16 font-normal contact-edit-phno-required-msg-receipientData{{$recipient->id}} hidden ml-2">{{__('labels.check_out.ph_no_must_8digit')}}</span>
                                                                        <span class="text-mered me-body-16 font-normal phone-valid-required-message-receipientData{{$recipient->id}} hidden ml-2">{{__('labels.log_in_register.invalid_number')}}</span>
                                                                    <input name="code" value="+852"
                                                                        class="hidden country-code-item mr-2 selected-text contact-info-countrycode-receipientData{{$recipient->id}}" />
                                                                    <div class="flex items-stretch">
                                                                        <div class="mr-3">
                                                                            <div class="relative h-full">
                                                                                <div
                                                                                    class=" h-full country-code-item flex items-center country-code-text cursor-pointer py-[0.35rem] px-3 border-1 border-meA3 rounded-[4px] font-normal me-body-18 text-darkgray">
                                                                                    <p data-id="receipientData{{$recipient->id}}"
                                                                                        class="country-code-item mr-2 selected-text contact-info-countrycode-receipientData{{$recipient->id}}">
                                                                                        +852
                                                                                    </p>
                                                                                    <div class="country-code-item">
                                                                                        <svg class="country-code-item"
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            width="12" height="8"
                                                                                            viewBox="0 0 12 8"
                                                                                            fill="none">
                                                                                            <path
                                                                                                d="M11.9533 1.03687C11.8478 0.809527 11.5829 0.706402 11.3462 0.802496C11.2829 0.828277 10.5329 1.56656 8.62982 3.47906L5.99778 6.12281L3.3681 3.47906C1.46028 1.56421 0.712627 0.828277 0.649346 0.802496C0.600127 0.783746 0.518096 0.76734 0.466533 0.76734C0.129033 0.76734 -0.0983104 1.10953 0.0423146 1.41187C0.105596 1.54546 5.66731 7.13297 5.79856 7.19156C5.9181 7.24781 6.07747 7.24781 6.197 7.19156C6.32825 7.13297 11.89 1.54546 11.9533 1.41187C12.0095 1.29234 12.0095 1.1564 11.9533 1.03687Z"
                                                                                                fill="#7C7C7C" />
                                                                                        </svg>
                                                                                    </div>
                                                                                </div>
                                                                                <ul
                                                                                    class="country-code-list hidden absolute top-full bg-whitez w-full country-code-item z-[1]">
                                                                                    <li
                                                                                        class="px-3 py-1 font-normal me-body-18 text-darkgray cursor-pointer country-code-item active">
                                                                                        +852</li>
                                                                                    <li
                                                                                        class="px-3 py-1 font-normal me-body-18 text-darkgray cursor-pointer country-code-item">
                                                                                        +86</li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="w-full border-1 border-meA3 rounded-[4px] lg:px-5 px-3 py-2 flex items-center">
                                                                            <input name="phone"
                                                                                data-id="receipientData{{$recipient->id}}" 
                                                                                value="@@phno" type="pattern" pattern="[\d]{4} [\d]{4}" placeholder="{{__('labels.check_out.phone_number')}}"
                                                                                class="placeholder:text-lightgray me-body-18 contact-info-phno-receipientData{{$recipient->id}} text-darkgray bg-transparent w-full focus:outline-none focus-visible:outline-none checkout_ph_format"/>
                                                                            <div class="hidden">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none">
                                                                                    <g
                                                                                        clip-path="url(#clip0_5371_59957)">
                                                                                        <path
                                                                                            d="M11.2492 15.7501C11.1505 15.7507 11.0526 15.7318 10.9612 15.6945C10.8699 15.6571 10.7867 15.6021 10.7167 15.5326L7.71666 12.5326C7.57543 12.3914 7.49609 12.1999 7.49609 12.0001C7.49609 11.8004 7.57543 11.6089 7.71666 11.4676C7.85789 11.3264 8.04944 11.2471 8.24916 11.2471C8.44889 11.2471 8.64043 11.3264 8.78166 11.4676L11.2492 13.9426L15.9667 9.21764C16.1079 9.07641 16.2994 8.99707 16.4992 8.99707C16.6989 8.99707 16.8904 9.07641 17.0317 9.21764C17.1729 9.35887 17.2522 9.55041 17.2522 9.75014C17.2522 9.94986 17.1729 10.1414 17.0317 10.2826L11.7817 15.5326C11.7116 15.6021 11.6285 15.6571 11.5371 15.6945C11.4457 15.7318 11.3479 15.7507 11.2492 15.7501Z"
                                                                                            fill="#60D669" />
                                                                                        <path
                                                                                            d="M12 21.75C10.0716 21.75 8.18657 21.1782 6.58319 20.1068C4.97982 19.0355 3.73013 17.5127 2.99218 15.7312C2.25422 13.9496 2.06114 11.9892 2.43735 10.0979C2.81355 8.20656 3.74215 6.46928 5.10571 5.10571C6.46928 3.74215 8.20656 2.81355 10.0979 2.43735C11.9892 2.06114 13.9496 2.25422 15.7312 2.99218C17.5127 3.73013 19.0355 4.97982 20.1068 6.58319C21.1782 8.18657 21.75 10.0716 21.75 12C21.75 14.5859 20.7228 17.0658 18.8943 18.8943C17.0658 20.7228 14.5859 21.75 12 21.75ZM12 3.75C10.3683 3.75 8.77326 4.23386 7.41655 5.14038C6.05984 6.0469 5.00242 7.33538 4.378 8.84287C3.75358 10.3504 3.5902 12.0092 3.90853 13.6095C4.22685 15.2098 5.01259 16.6799 6.16637 17.8336C7.32016 18.9874 8.79017 19.7732 10.3905 20.0915C11.9909 20.4098 13.6497 20.2464 15.1571 19.622C16.6646 18.9976 17.9531 17.9402 18.8596 16.5835C19.7661 15.2268 20.25 13.6317 20.25 12C20.25 9.81197 19.3808 7.71355 17.8336 6.16637C16.2865 4.6192 14.188 3.75 12 3.75Z"
                                                                                            fill="#60D669" />
                                                                                    </g>
                                                                                    <defs>
                                                                                        <clipPath id="clip0_5371_59957">
                                                                                            <rect width="24" height="24"
                                                                                                fill="white" />
                                                                                        </clipPath>
                                                                                    </defs>
                                                                                </svg>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="xl:w-[48.5%] w-full mt-5 hidden">
                                                                    <p class="font-normal me-body-16 text-darkgray">
                                                                        @lang('labels.check_out.email')</p>
                                                                    <div
                                                                        class="w-full border-1 border-meA3 bg-meBg rounded-[4px] lg:px-5 px-3 py-2 flex items-center hidden bg-meBg">
                                                                        <input name="email"
                                                                            placeholder=""
                                                                            type="email"
                                                                            class=" me-body-18 contact-info-email-receipientData{{$recipient->id}} bg-transparent w-full focus:outline-none focus-visible:outline-none" />
                                                                        <div>
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                width="24" height="24"
                                                                                viewBox="0 0 24 24" fill="none">
                                                                                <g clip-path="url(#clip0_5371_59957)">
                                                                                    <path
                                                                                        d="M11.2492 15.7501C11.1505 15.7507 11.0526 15.7318 10.9612 15.6945C10.8699 15.6571 10.7867 15.6021 10.7167 15.5326L7.71666 12.5326C7.57543 12.3914 7.49609 12.1999 7.49609 12.0001C7.49609 11.8004 7.57543 11.6089 7.71666 11.4676C7.85789 11.3264 8.04944 11.2471 8.24916 11.2471C8.44889 11.2471 8.64043 11.3264 8.78166 11.4676L11.2492 13.9426L15.9667 9.21764C16.1079 9.07641 16.2994 8.99707 16.4992 8.99707C16.6989 8.99707 16.8904 9.07641 17.0317 9.21764C17.1729 9.35887 17.2522 9.55041 17.2522 9.75014C17.2522 9.94986 17.1729 10.1414 17.0317 10.2826L11.7817 15.5326C11.7116 15.6021 11.6285 15.6571 11.5371 15.6945C11.4457 15.7318 11.3479 15.7507 11.2492 15.7501Z"
                                                                                        fill="#60D669" />
                                                                                    <path
                                                                                        d="M12 21.75C10.0716 21.75 8.18657 21.1782 6.58319 20.1068C4.97982 19.0355 3.73013 17.5127 2.99218 15.7312C2.25422 13.9496 2.06114 11.9892 2.43735 10.0979C2.81355 8.20656 3.74215 6.46928 5.10571 5.10571C6.46928 3.74215 8.20656 2.81355 10.0979 2.43735C11.9892 2.06114 13.9496 2.25422 15.7312 2.99218C17.5127 3.73013 19.0355 4.97982 20.1068 6.58319C21.1782 8.18657 21.75 10.0716 21.75 12C21.75 14.5859 20.7228 17.0658 18.8943 18.8943C17.0658 20.7228 14.5859 21.75 12 21.75ZM12 3.75C10.3683 3.75 8.77326 4.23386 7.41655 5.14038C6.05984 6.0469 5.00242 7.33538 4.378 8.84287C3.75358 10.3504 3.5902 12.0092 3.90853 13.6095C4.22685 15.2098 5.01259 16.6799 6.16637 17.8336C7.32016 18.9874 8.79017 19.7732 10.3905 20.0915C11.9909 20.4098 13.6497 20.2464 15.1571 19.622C16.6646 18.9976 17.9531 17.9402 18.8596 16.5835C19.7661 15.2268 20.25 13.6317 20.25 12C20.25 9.81197 19.3808 7.71355 17.8336 6.16637C16.2865 4.6192 14.188 3.75 12 3.75Z"
                                                                                        fill="#60D669" />
                                                                                </g>
                                                                                <defs>
                                                                                    <clipPath id="clip0_5371_59957">
                                                                                        <rect width="24" height="24"
                                                                                            fill="white" />
                                                                                    </clipPath>
                                                                                </defs>
                                                                            </svg>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="save-credit-card-container mt-5 inline-block">
                                                                <label
                                                                    for="save-credit-card-receipientData{{$recipient->id}}"
                                                                    class="mt-2 flex-wrap custom-checkbox-label items-start mr-1 last:mr-0 lg:mr-2 lg:last:mr-0 ">
                                                                    <input data-id="receipientData{{$recipient->id}}"
                                                                        type="checkbox"
                                                                        name="save-credit-card-receipientData{{$recipient->id}}"
                                                                        value=""
                                                                        id="save-credit-card-receipientData{{$recipient->id}}"
                                                                        class="mt-[2px] save-credit-card">
                                                                    <span
                                                                        class="custom-checkbox-orange mt-[2px]"></span>
                                                                    <span
                                                                        class="font-normal me-body-18 text-darkgray text-left ml-6 4xl:ml-[30px] mr-2 leading-[normal]">
                                                                        @lang('labels.check_out.save_recipient_detail')
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" class="current-selected-request-id" />
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
            <div id="me-checkout-special-request-popup" class="hidden relative me-checkout-special-request-popup">
                <div
                    class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 p-10 me-checkout-special-request-popup-content text-center text-darkgray rounded-xl xs:max-w-[468px]  xl:max-w-[1036px] xl:min-w-[1036px] bg-whitez shadow-[0px_4px_15px_2px_rgba(0,0,0,0.1)]">
                    <div class="w-full relative">
                        <button
                            class="absolute top-[-1rem] right-[-1rem] focus-visible:outline-none focus:outline-none p-1"
                            id="me-checkout-me-checkout-special-request-popup-close"><img
                                class=" w-auto h-auto align-middle" src="{{asset('frontend/img/close-btn.png')}}"
                                alt=""></button>
                        <div class="relative">
                            <div class="me-body18">
                                <div>
                                    <h3 class="font-bold me-body-23 text-darkgray text-left">@lang('labels.check_out.special_requests')</h3>
                                    <p class="my-5 font-normal me-body-16 text-darkgray text-left">@lang('labels.check_out.subject_availability')</p>
                                    <textarea rows="3" placeholder="{{__('labels.check_out.please_enter_your_requests')}}"
                                        class="remark-receipientData{{$recipient->id}} focus:outline-none focus-visible:outline-none border-1 border-meA3 rounded-[4px] resize-none w-full p-5 font-normal me-body-18 text-darkgray placeholder:lightgray"></textarea>
                                </div>
                                <div class="flex justify-end mt-5">
                                    <button type="button" role="button"
                                        class="xs:mt-0 mt-2 special-request-confirm-btn text-light bg-orangeMediq rounded-md font-bold py-2 px-10 sm:py-[10px] max-w-[300px] xl:px-0 xl:w-[300px] hover:bg-brightOrangeMediq transition-colors duration-300">
                                        @lang('labels.log_in_register.confirm')
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            @endif

            <div component-name="me-checkout-enter-info-card-bottom-area"
                class="me-checkout-enter-info-card-bottom-area xl:mt-10 mt-5 lg:mb-[60px] sm:mb-10 mb-5">
                <div class="flex justify-between 6xl:items-center bottom-area-content px-5 py-4 6xl:flex-row flex-col">

                    <div class="my-1 6xl:w-auto w-full flex justify-end 6xl:ml-4">
                        <input class="checkout-info-card-data hidden">
                        <button onclick="getCheckoutInfoCardData()"
                            class="checkout-enterInfo-nextbtn rounded-md px-5 py-[9px] me-body-20 font-bold bg-orangeMediq text-whitez hover:bg-brightOrangeMediq xl:min-w-400px min-w-[250px] sm:w-auto w-full">@lang('labels.log_in_register.next_step')</button>
                    </div>
                </div>
                <div class="xl:mt-10 mt-5 lg:block hidden">
                    <p class="me-body-16 font-normal text-lightgray flex flex-wrap">@lang('labels.check_out.protected')<a  href="{{route('best')}}" target="_blank" class="me-body-16 font-normal text-lightgray underline ml-1">
                        @lang('labels.check_out.awesome_booking')
                    </a></p>
                    <div class="flex items-center sm:mt-5 mt-2">
                        <div class="back_to_home_page">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                <path
                                    d="M12.7961 19.4533C13.0235 19.3478 13.1266 19.0829 13.0305 18.8462C13.0047 18.7829 12.2664 18.0329 10.3539 16.1298L7.7102 13.4978L10.3539 10.8681C12.2688 8.96028 13.0047 8.21263 13.0305 8.14935C13.0493 8.10013 13.0657 8.0181 13.0657 7.96653C13.0657 7.62903 12.7235 7.40169 12.4211 7.54231C12.2875 7.6056 6.70004 13.1673 6.64145 13.2986C6.5852 13.4181 6.5852 13.5775 6.64145 13.697C6.70004 13.8283 12.2875 19.39 12.4211 19.4533C12.5407 19.5095 12.6766 19.5095 12.7961 19.4533Z"
                                    fill="#333333" />
                            </svg>
                        </div>
                        <a href="{{ $isOfflinePayment==true ? route('checkout.init') : 'javascript:void(0)' }}" class="me-body-18 font-normal text-darkgray">@lang('labels.check_out.previous_step')
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div component-name="me-checkout-order-summary"
                class=" lg:fixed lg:mb-0 mb-7 me-checkout-order-summary-container">
                <div class="">
                    <div class="checkout-page3-selected-list hidden">
                        <div>
                            <div class="flex justify-between items-center selected-list-collpase active py-5 px-5">
                                <p class="font-bold me-body-23 text-darkgray">Selected Items (2)</p>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <path
                                            d="M5.04675 12.7961C5.15222 13.0235 5.41706 13.1266 5.65378 13.0305C5.71706 13.0047 6.46706 12.2664 8.37019 10.3539L11.0022 7.7102L13.6319 10.3539C15.5397 12.2688 16.2874 13.0047 16.3507 13.0305C16.3999 13.0493 16.4819 13.0657 16.5335 13.0657C16.871 13.0657 17.0983 12.7235 16.9577 12.4211C16.8944 12.2875 11.3327 6.70004 11.2014 6.64145C11.0819 6.5852 10.9225 6.5852 10.803 6.64145C10.6717 6.70004 5.11003 12.2875 5.04675 12.4211C4.9905 12.5407 4.9905 12.6766 5.04675 12.7961Z"
                                            fill="#333333" />
                                    </svg>
                                </div>
                            </div>
                            <div class="selected-list-collpase-content">
                                <div component-name="me-checkout-selected-items"
                                    class="w-[360px] max-h-[300px] overflow-y-auto px-5 pb-5 me-checkout-selected-items-container lg:fixed lg:mb-10 mb-7">
                                    <div class="me-checkout-selected-items">

                                        <div class="border-b-1 border-mee4 pb-5 mb-5 last:mb-0 last:border-b-0">
                                            <div class="flex">
                                                <img src="./img/logo1-small.png" class=" mr-3 max-w-[40px] max-h-[40px]"
                                                    alt="logo-0" />
                                                <p class="font-bold me-body-16 text-darkgray">Medtimes Premier
                                                    Health Check Care</p>
                                            </div>
                                            <div class="mt-2">
                                                <p class="font-bold me-body-16 text-darkgray text-right">
                                                    $9,600.00</p>
                                            </div>
                                        </div>

                                        <div class="border-b-1 border-mee4 pb-5 mb-5 last:mb-0 last:border-b-0">
                                            <div class="flex">
                                                <img src="./img/logo2-small.png" class=" mr-3 max-w-[40px] max-h-[40px]"
                                                    alt="logo-1" />
                                                <p class="font-bold me-body-16 text-darkgray">Mobile Medical 2
                                                    Person Plan Annual Female Health Check (Excel Plan)</p>
                                            </div>
                                            <div class="mt-2">
                                                <p class="font-bold me-body-16 text-darkgray text-right">
                                                    $14,000.00</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                    $totalRecipient = count($recipients) + (count($isTwoRecipients)/2);
                    @endphp
                    <div class="p-5 me-checkout-order-summary mt-10">
                        <h1 class="font-bold me-body-23 text-darkgray">@lang('labels.check_out.order')</h1>
                        <div class="mt-3">
                            <div class="">
                                <div class="flex justify-between">
                                    <div class="flex items-center checkout-summary-collpase cursor-pointer">
                                        <h3 class="font-bold text-darkgray me-body-18">@lang('labels.check_out.sub_total') ({{$totalRecipient}})
                                        </h3>
                                        {{-- <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 20 20" fill="none">
                                                <path
                                                    d="M15.5743 12.472C15.4864 12.6615 15.2657 12.7474 15.0685 12.6674C15.0157 12.6459 14.3907 12.0306 12.8048 10.4369L10.6114 8.23376L8.42003 10.4369C6.83018 12.0326 6.20714 12.6459 6.1544 12.6674C6.11339 12.683 6.04503 12.6967 6.00206 12.6967C5.72081 12.6967 5.53136 12.4115 5.64854 12.1595C5.70128 12.0482 10.336 7.39196 10.4454 7.34313C10.545 7.29626 10.6778 7.29626 10.7774 7.34313C10.8868 7.39196 15.5216 12.0482 15.5743 12.1595C15.6212 12.2592 15.6212 12.3724 15.5743 12.472Z"
                                                    fill="#333333" />
                                            </svg>
                                        </div> --}}
                                    </div>
                                    <h3 class="font-bold text-darkgray me-body-18">
                                        ${{number_format($total_amounts,2)}}
                                    </h3>
                                </div>
                               {{-- <div class="mt-2 flex justify-between checkout-summary-collpase-content">
                                    <p class="font-normal text-darkgray me-body-16">@lang('labels.check_out.item_total')</p>
                                    <p class="font-normal text-darkgray me-body-16">
                                        HK${{number_format($total_amounts,2)}}
                                    </p>
                                </div> --}}
                                <!-- <div class="mt-2 hidden justify-between">
                                    <p class="font-normal text-darkgray me-body-16">On Sale Offer</p>
                                    <p class="font-normal text-darkgray me-body-16">- $1,010.00</p>
                                </div> -->
                            </div>
                            <div class="summary-item-total hidden">
                                <div class="mt-2 flex justify-between">
                                    <p class="font-bold text-darkgray me-body-16">@lang('labels.check_out.item_total')</p>
                                    <p class="font-bold text-darkgray me-body-16"></p>
                                </div>
                                <div class="mt-2 flex justify-between">
                                    <p class="font-bold text-darkgray me-body-16">Order Discount</p>
                                    <p class="font-bold text-darkgray me-body-16"></p>
                                </div>
                            </div>
                            <hr class="bg-mee4 my-5" />
                            <div>
                                <div class="flex items-center justify-between is_hidden_dis">
                                    <p class="font-bold text-darkgray me-body-18">@lang('labels.check_out.my_discount')</p>
                                    <p class="font-bold me-body-16 text-darkgray discount_price my_discount"></p>
                                </div>
                                <div class="mt-3">
                                    <div class="mt-2 hidden bg-far p-[10px] rounded-[4px]">
                                        <div class="flex justify-between">
                                            <p class="font-normal me-body-14 text-darkgray">@lang('labels.check_out.my_discount')</p>
                                            <p class="font-normal me-body-14 text-darkgray"></p>
                                        </div>
                                    </div>
                                    <div>
                                        <div
                                            class="bg-far py-3 px-[10px] flex justify-between before-choose-coupon hidden">
                                            <input
                                                class="promo-code bg-transparent focus:outline-none focus-visible:outline-none w-[90%] font-normal text-meA3 placeholder:text-meA3 me-body-16"
                                                placeholder="@lang('labels.check_out.enter_promo')" />
                                            <span
                                                class="font-normal text-orangeMediq me-body-16 cursor-pointer use-promo-code-btn hidden">@lang('labels.check_out.use')</span>
                                            <span
                                                class="font-normal text-orangeMediq me-body-16 cursor-pointer use-promo-code-btn-input-text">@lang('labels.check_out.use')</span>
                                        </div>
                                        <div class="mt-2 before-choose-coupon hidden">
                                            <p
                                                class="select-coupon-btn underline font-normal text-darkgray me-body-16 cursor-pointer">
                                                @lang('labels.check_out.select_coupon') ({{count($availableCoupons)}})</p>
                                        </div>
                                        <div class="promo-code-error hidden">
                                            <div class="promo-code-error-msg flex items-center bg-far py-3 px-[10px]">
                                                <p class="mr-4 text-[#EE220C] font-normal me-body-14 text-">
                                                    {{__('labels.check_out.promo_validate')}}
                                                </p>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M12.5908 10.6904C12.5641 10.5429 12.4831 10.4107 12.3638 10.3199C12.2445 10.2291 12.0955 10.1862 11.9462 10.1998C11.7969 10.2133 11.658 10.2823 11.557 10.3931C11.456 10.5039 11.4001 10.6485 11.4004 10.7984V16.2008L11.41 16.3088C11.4367 16.4564 11.5177 16.5886 11.637 16.6794C11.7563 16.7702 11.9053 16.813 12.0546 16.7995C12.2039 16.7859 12.3428 16.717 12.4438 16.6062C12.5448 16.4954 12.6007 16.3508 12.6004 16.2008V10.7984L12.5908 10.6904ZM12.9592 8.09844C12.9592 7.85974 12.8644 7.63082 12.6956 7.46204C12.5268 7.29326 12.2979 7.19844 12.0592 7.19844C11.8205 7.19844 11.5916 7.29326 11.4228 7.46204C11.254 7.63082 11.1592 7.85974 11.1592 8.09844C11.1592 8.33713 11.254 8.56605 11.4228 8.73483C11.5916 8.90362 11.8205 8.99844 12.0592 8.99844C12.2979 8.99844 12.5268 8.90362 12.6956 8.73483C12.8644 8.56605 12.9592 8.33713 12.9592 8.09844ZM21.6004 11.9984C21.6004 9.45236 20.589 7.01056 18.7886 5.21021C16.9883 3.40986 14.5465 2.39844 12.0004 2.39844C9.45431 2.39844 7.01251 3.40986 5.21217 5.21021C3.41182 7.01056 2.40039 9.45236 2.40039 11.9984C2.40039 14.5445 3.41182 16.9863 5.21217 18.7867C7.01251 20.587 9.45431 21.5984 12.0004 21.5984C14.5465 21.5984 16.9883 20.587 18.7886 18.7867C20.589 16.9863 21.6004 14.5445 21.6004 11.9984ZM3.60039 11.9984C3.60039 10.8953 3.81766 9.80303 4.2398 8.7839C4.66194 7.76476 5.28068 6.83875 6.06069 6.05874C6.8407 5.27873 7.76671 4.65999 8.78585 4.23785C9.80498 3.81571 10.8973 3.59844 12.0004 3.59844C13.1035 3.59844 14.1958 3.81571 15.2149 4.23785C16.2341 4.65999 17.1601 5.27873 17.9401 6.05874C18.7201 6.83875 19.3388 7.76476 19.761 8.7839C20.1831 9.80303 20.4004 10.8953 20.4004 11.9984C20.4004 14.2263 19.5154 16.3628 17.9401 17.9381C16.3648 19.5134 14.2282 20.3984 12.0004 20.3984C9.77257 20.3984 7.636 19.5134 6.06069 17.9381C4.48539 16.3628 3.60039 14.2263 3.60039 11.9984Z"
                                                        fill="#EE220C" />
                                                </svg>
                                            </div>
                                            <div class="mt-2">
                                                <p
                                                    class="select-coupon-btn underline font-normal text-darkgray me-body-16 cursor-pointer">
                                                    @lang('labels.check_out.select_coupon') ({{count($availableCoupons)}})</p>
                                            </div>
                                        </div>
                                        <div class="added-promo-code after-choose-coupon">
                                            <div class="flex items-center">
                                                <p class="mr-[10px] font-normal me-body-16 text-darkgray coupon-promo-code"></p>
                                                <div class="relative inline-block promo_background">
                                                    <!-- <div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="110" height="28"
                                                            viewBox="0 0 110 28" fill="none">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M0 2C0 0.895431 0.89543 0 2 0H108C109.105 0 110 0.895431 110 2V7C106.134 7 103 10.134 103 14C103 17.866 106.134 21 110 21V26C110 27.1046 109.105 28 108 28H2C0.895429 28 0 27.1046 0 26V21C3.86599 21 7 17.866 7 14C7 10.134 3.86599 7 0 7V2Z"
                                                                fill="#FFF2E5" />
                                                        </svg>
                                                    </div> -->
                                                    <p
                                                        class="promo-code-text whitespace-nowrap text-ellipsis max-w-[62px] overflow-hidden font-normal me-body-14 text-darkgray absolute left-3 top-1/2 -translate-y-1/2">
                                                        </p>
                                                    <div
                                                        class="cursor-pointer remove-promo-code absolute right-3 top-1/2 -translate-y-1/2" onclick="remove_promo_code()">
                                                        <div>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="17" viewBox="0 0 16 17" fill="none">
                                                                <path
                                                                    d="M12.2001 4.30682C12.1385 4.24501 12.0652 4.19598 11.9846 4.16253C11.9039 4.12907 11.8175 4.11185 11.7301 4.11185C11.6428 4.11185 11.5564 4.12907 11.4757 4.16253C11.3951 4.19598 11.3218 4.24501 11.2601 4.30682L8.00015 7.56015L4.74015 4.30015C4.67843 4.23843 4.60515 4.18947 4.52451 4.15606C4.44387 4.12266 4.35744 4.10547 4.27015 4.10547C4.18286 4.10547 4.09643 4.12266 4.01579 4.15606C3.93514 4.18947 3.86187 4.23843 3.80015 4.30015C3.73843 4.36187 3.68947 4.43514 3.65606 4.51579C3.62266 4.59643 3.60547 4.68286 3.60547 4.77015C3.60547 4.85744 3.62266 4.94387 3.65606 5.02451C3.68947 5.10515 3.73843 5.17843 3.80015 5.24015L7.06015 8.50015L3.80015 11.7601C3.73843 11.8219 3.68947 11.8951 3.65606 11.9758C3.62266 12.0564 3.60547 12.1429 3.60547 12.2301C3.60547 12.3174 3.62266 12.4039 3.65606 12.4845C3.68947 12.5652 3.73843 12.6384 3.80015 12.7001C3.86187 12.7619 3.93514 12.8108 4.01579 12.8442C4.09643 12.8776 4.18286 12.8948 4.27015 12.8948C4.35744 12.8948 4.44387 12.8776 4.52451 12.8442C4.60515 12.8108 4.67843 12.7619 4.74015 12.7001L8.00015 9.44015L11.2601 12.7001C11.3219 12.7619 11.3951 12.8108 11.4758 12.8442C11.5564 12.8776 11.6429 12.8948 11.7301 12.8948C11.8174 12.8948 11.9039 12.8776 11.9845 12.8442C12.0652 12.8108 12.1384 12.7619 12.2001 12.7001C12.2619 12.6384 12.3108 12.5652 12.3442 12.4845C12.3776 12.4039 12.3948 12.3174 12.3948 12.2301C12.3948 12.1429 12.3776 12.0564 12.3442 11.9758C12.3108 11.8951 12.2619 11.8219 12.2001 11.7601L8.94015 8.50015L12.2001 5.24015C12.4535 4.98682 12.4535 4.56015 12.2001 4.30682Z"
                                                                    fill="#333333" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="bg-mee4 my-5" />
                            <div class="hidden">
                                <input type="number" class="summary-card-total-price" value="{{$total_amounts}}">
                                <input type="number" class="summarytotal" value="{{$total_amounts}}">
                                <input type="number" class="item_totals" value="{{$total_amounts}}">
                                <input type="number" class="total_amounts" value="{{$total_amounts}}">
                                <input type="number" class="code_price"
                                    value="{{$selected_coupon != null ? $selected_coupon->coupon_amount : ($selected_promocode != null ? $selected_promocode->amount : 0)}}">
                                <input type="hidden" class="code_id"
                                    value="{{$selected_coupon != null ? $selected_coupon->id : ($selected_promocode != null ? $selected_promocode->id : '')}}">
                                <input type="hidden" name="code_type" class="code_type"
                                    value="{{$selected_coupon != null ? 'coupon_code' : ($selected_promocode != null ? 'promo_code' : '')}}">
                                <input type="hidden" name="discount_type" class="discount_type"
                                    value="{{$selected_coupon != null ? $selected_coupon->discount_type : ''}}">
                            </div>
                            <div>
                                <div class="mt-1 flex justify-between">
                                    <p class="font-bold text-darkgray me-body-18">@lang('labels.check_out.total')</p>
                                    <p class="font-bold text-darkgray me-body-18 summary-last-total">
                                        HK${{number_format($total_amounts,2)}}</p>
                                </div>
                            </div>
                            <div class="mt-5">
                                <button onclick="getCheckoutInfoCardData()"
                                    class=" rounded-md px-5 py-[9px] me-body-20 font-bold bg-orangeMediq text-whitez hover:bg-brightOrangeMediq w-full">@lang('labels.log_in_register.next_step')</button>
                            </div>
                        </div>
                    </div>
                    <div class="my-1">
                        @if(lang() == "en")
                        <div class="font-normal me-body-16 flex flex-wrap text-darkgray">
                            @lang('labels.check_out.by_processing')
                            <span class="ml-1">
                                <a href="{{route('termofuse')}}" class="me-body-16 font-normal text-darkgray underline">
                                    @lang('labels.footer.terms')
                                </a>
                            </span>
                            <span class="mx-1">
                                @lang('labels.check_out.and')
                            </span>
                            <span><a href="#" class="me-body-16 font-normal text-darkgray underline">
                            @lang('labels.check_out.cancel')
                                </a></span>
                        </div>
                        @else 
                        <div class="font-normal me-body-16 flex flex-wrap text-darkgray">
                            @lang('labels.check_out.by_processing')
                            <a href="{{route('termofuse')}}" class="me-body-16 font-normal text-darkgray underline"> @lang('labels.footer.terms')</a>@lang('labels.check_out.and')<a href="#" class="me-body-16 font-normal text-darkgray underline">@lang('labels.check_out.cancel')</a>。
                        </div>
                        @endif
                        {{-- <p class="font-normal me-body-16 text-darkgray">
                            @lang('labels.check_out.booking_will_submit')
                        </p> --}}
                    </div>
                    <div class="xl:mb-10 mb-5 lg:hidden block mt-3">
                        <p class="me-body-16 font-normal text-lightgray flex flex-wrap">@lang('labels.check_out.protected')<a  href="{{route('best')}}" target="_blank" class="me-body-16 font-normal text-lightgray underline ml-1">
                            @lang('labels.check_out.awesome_booking')
                        </a></p>
                        <div class="flex items-center sm:mt-5 mt-2">
                            <div class="back_to_home_page">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                    <path
                                        d="M12.7961 19.4533C13.0235 19.3478 13.1266 19.0829 13.0305 18.8462C13.0047 18.7829 12.2664 18.0329 10.3539 16.1298L7.7102 13.4978L10.3539 10.8681C12.2688 8.96028 13.0047 8.21263 13.0305 8.14935C13.0493 8.10013 13.0657 8.0181 13.0657 7.96653C13.0657 7.62903 12.7235 7.40169 12.4211 7.54231C12.2875 7.6056 6.70004 13.1673 6.64145 13.2986C6.5852 13.4181 6.5852 13.5775 6.64145 13.697C6.70004 13.8283 12.2875 19.39 12.4211 19.4533C12.5407 19.5095 12.6766 19.5095 12.7961 19.4533Z"
                                        fill="#333333" />
                                </svg>
                            </div>
                            <a href="{{ $isOfflinePayment==true ? route('checkout.init') : 'javascript:void(0)' }}" class="me-body-18 font-normal text-darkgray">@lang('labels.check_out.previous_step')
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="me-checkout-special-request-popup" class="hidden relative me-checkout-special-request-popup">
    <div
        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 p-10 me-checkout-special-request-popup-content text-center text-darkgray rounded-xl xs:max-w-[468px]  xl:max-w-[1036px] xl:min-w-[1036px] bg-whitez shadow-[0px_4px_15px_2px_rgba(0,0,0,0.1)]">
        <div class="w-full relative">
            <button
                class="absolute top-[-1rem] right-[-1rem] focus-visible:outline-none focus:outline-none p-1"
                id="me-checkout-me-checkout-special-request-popup-close"><img
                    class=" w-auto h-auto align-middle" src="{{asset('frontend/img/close-btn.png')}}" alt=""></button>
            <div class="relative">
                <div class="me-body18">
                    <div>
                        <h3 class="font-bold me-body-23 text-darkgray text-left">@lang('labels.check_out.special_requests')</h3>
                        <p class="my-5 font-normal me-body-16 text-darkgray text-left">@lang('labels.check_out.subject_availability')</p>
                        <textarea name="remark" rows="3" data-placeholder="{{__('labels.check_out.please_enter_your_requests')}}" placeholder="{{__('labels.check_out.please_enter_your_requests')}}"
                            class="focus:outline-none focus-visible:outline-none border-1 border-meA3 rounded-[4px] resize-none w-full p-5 font-normal me-body-18 text-darkgray placeholder:lightgray"></textarea>
                    </div>
                    <div class="flex justify-end mt-5">
                        <button type="button" role="button"
                            class="xs:mt-0 mt-2 special-request-confirm-btn text-light bg-orangeMediq rounded-md font-bold py-2 px-10 sm:py-[10px] max-w-[300px] xl:px-0 xl:w-[300px] hover:bg-brightOrangeMediq transition-colors duration-300">
                            @lang('labels.log_in_register.confirm')
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('frontend.checkouts.init-popup.coupon-popup')
@if (count($availableCoupons) > 0)
        @foreach ($availableCoupons as $key => $coupon)
            @include('frontend.home.coupon_model', ['coupon_type' => 'single_coupon'])
        @endforeach
@endif
@if (count($notAvailableCoupons) > 0)
        @foreach ($notAvailableCoupons as $key => $coupon)
            @include('frontend.home.coupon_model', ['coupon_type' => 'single_coupon'])
        @endforeach
@endif
@endsection
@push('scripts')
@include('frontend.checkouts.coupon_js')
<script>
      window.translations = {
            checkoutClick: '@lang('labels.check_out.click')',
         };
    let checkoutClick = `${window.translations.checkoutClick}`;
    let ph_number = $('.ph_number').val();
$(function() {
    let is_email = $('.is_email').val();
    if(is_email != ''){
        $('.email-verify-text').addClass('hidden')
        $('.is_email').removeClass('error-input')
    }else{
        $('.is_email').addClass('error-input')
        $('.email-verify-text').removeClass('hidden')
    }
    // if(ph_number == '' || ph_number == null || ph_number == " "){
    //     $('.ph_number').attr('readonly',false)
    // }else{
    //     let is_verified = <?= json_encode($customer->is_verified)?>;
    //     console.log('is_verified',is_verified)
    //     if(is_verified == true){
    //         $('.ph_number').attr('readonly',true)
    //     }
    // }


    let coupon = <?= json_encode($selected_coupon)?>;
    let promocode = <?= json_encode($selected_promocode)?>;
    if (coupon != null) {
        console.log('coupon', coupon)
        let percent = '';
        if(coupon.discount_type == 'percent'){
            var totalPrice =  (parseInt($('.item_totals').val()) / 100)* parseInt(coupon.coupon_amount);
            var int_total =  parseInt($('.item_totals').val()) - totalPrice 
            var total =  Math.round(int_total)
            percent = '%';
        }else{
            var total = parseInt($('.item_totals').val()) - parseInt(coupon.coupon_amount);
        }
        $('.discount_price').html('- ' + floatToCurrency(coupon.coupon_amount) + percent)
        console.log('prices', total, parseInt(coupon.coupon_amount))
        $('.summary-last-total').text('HK'+floatToCurrency(total))
        // $('.total_amounts').val(total)
        $('.is_hidden_dis').removeClass('hidden')
        $('.promo-code-text').html(coupon.name_en)
        $('.after-choose-coupon').removeClass('hidden')
        $('.before-choose-coupon').addClass('hidden')
        $('.coupon-promo-code').html(couponCodeTxt)
    } else if (promocode == null) {
        $('.summary-last-total').text('HK'+floatToCurrency(parseInt($('.item_totals').val())))
        $('.is_hidden_dis').addClass('hidden')
        $('.after-choose-coupon').addClass('hidden')
        $('.before-choose-coupon').removeClass('hidden')
    }
    if (promocode != null) {
        console.log('promocode', promocode)
        let total = parseInt($('.item_totals').val()) - parseInt(promocode.amount);
        $('.discount_price').html('$' + promocode.amount)
        $('.summary-last-total').html('HK'+floatToCurrency(total))
        $('.is_hidden_dis').removeClass('hidden')
        $('.promo-code-text').html(promocode.code)
        $('.after-choose-coupon').removeClass('hidden')
        $('.before-choose-coupon').addClass('hidden')
        $('.coupon-promo-code').html(promoCodeTxt)
    } else if (coupon == null) {
        $('.summary-last-total').text('HK'+floatToCurrency(parseInt($('.item_totals').val())))
        $('.is_hidden_dis').addClass('hidden')
        $('.after-choose-coupon').addClass('hidden')
        $('.before-choose-coupon').removeClass('hidden')
    }
})
if(ph_number == '' || ph_number == null || ph_number == " "){
    $('.ph_number').keyup(function(){
        let ph_number = $('.ph_number').val().replace(/\s/g,'');
        let c_code = $('.c_code').val();
        let number = c_code+ph_number;
        
        console.log(number,ph_number)
        let aldy_exist = "@lang('labels.check_out.already_exist')"
        if(ph_number.length == 8){
            $.ajax({
                type: 'POST',
                url: "{{route('checkout.checkPhoneNo')}}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {'number':number},
                async: false, // open new tab
                success: function(res) {
                    console.log(res.status)
                    if(res.status == 200){
                        $('.phno-required-msg').removeClass('hidden')
                        $('.contact-edit-phno-required-msg').addClass('hidden')
                        $('.phno-required-msg').html(aldy_exist +' ('+res.number+')')
                        $('.ph_number').val("");
                    }else{
    
                        $('.phno-required-msg').addClass('hidden')
                    }
                }
            })
        }else{
    
            $('.phno-required-msg').addClass('hidden')
        }
    })
}

function getCheckoutInfoCardData() {

    $('.phno-required-msg').addClass('hidden')

    var errorID=0;
    
    var contactTitleRequired = false;

    var firstNameRequired=false;
    
    var titleRequired=false;

    var lastNameRequired=false;

    var emailRequired=false;

    var invalidLastnameFormat=false;

    var invalidfirstnameFormat=false;

    var invalidPhnoFormat=false;

    var invalidPhno=false;

    var invalidRecipientPhno=false;

    var invalidRecipientPhno8=false;

    // var phoneVerify = "{{$customer->is_verified}}";

    var contactFormData = {

    contactInfo: {},

    cardData: [],

    summaryData: [],

    };

    var contactID = $('.me-checkout-contact-info-edit-form').data('id');
    console.log('contactID',contactID)

    var contact_title = $('input[name="checkout-gender-' + contactID + '"]:checked').val();

    var contact_lastName = $('.contact-info-lastname-' + contactID).val();

    var contact_firstName = $('.contact-info-firstname-' + contactID).val();

    var contact_countrycode = $('.contact-info-countrycode-' + contactID).val();

    var contact_phone = $('.contact-info-phno-' + contactID).val().replace(/\s/g,'');

    var contact_email=$('.contact-info-email-'+contactID).val();


    contactFormData.contactInfo = {

    id: contactID,

    title: contact_title,

    lastName: contact_lastName,

    firstName: contact_firstName,

    countrycode: contact_countrycode,

    phone: contact_phone,

    email:contact_email,

    };
    if (contact_title == "" || contact_title == undefined) {
        contactTitleRequired = true;
        $('.contact-title-required-message').removeClass('hidden');
        $('html, body').animate({
            scrollTop: $(".me-checkout-contact-info-container").offset().top
        }, 500);
    } else {
        $('.contact-title-required-message').addClass('hidden');
    }

    // if(phoneVerify == 0){
    //     $('.contact-edit-invalid-phno-required-msg').addClass('hidden');
    //     $('.contact-edit-phno-required-msg').addClass('hidden');
    //     $('.phno-verify-msg').removeClass('hidden');
    // }else{
    //     $('.phno-verify-msg').addClass('hidden');
    // }
    if(englishTextChecker(contact_firstName)==false){
        console.log('englishTextChecker(contact_firstName)',contact_firstName == '',englishTextChecker(contact_firstName))
        invalidfirstnameFormat=true;
        $('.contact-info-lastname-' + contactID).addClass('error-input');        
        $('.contact-info-firstname-' + contactID).addClass('error-input');        
        if(contact_firstName == ''|| contact_firstName == null){
            $('.contact-edit-firstname-required-msg').removeClass('hidden');
            $('.contact-edit-firstname-validate-msg').addClass('hidden');
        }else{
            $('.contact-edit-firstname-validate-msg').removeClass('hidden');
            $('.contact-edit-firstname-required-msg').addClass('hidden');
        }
        $('.me-checkout-contact-info-edit-card').removeClass('hidden');
        $('.checkout-info-data').addClass('hidden');
        $('html, body').animate({
            scrollTop: $(".me-checkout-contact-info-container").offset().top
        }, 500);
    }else{
        invalidfirstnameFormat=false;
        $('.contact-info-lastname-' + contactID).parent().css('border','');
        $('.contact-info-firstname-' + contactID).removeClass('error-input');
        $('.contact-edit-firstname-validate-msg').addClass('hidden');
        $('.contact-edit-firstname-required-msg').addClass('hidden');
        $('.checkout-info-data').removeClass('hidden');
    }
    if(englishTextChecker(contact_lastName)==false){
        invalidLastnameFormat=true;        
        $('.contact-info-lastname-' + contactID).addClass('error-input');
        if(contact_lastName == ''|| contact_lastName == null){
            $('.contact-edit-lastname-required-msg').removeClass('hidden');
            $('.contact-edit-lastname-validate-msg').addClass('hidden');
        }else{
            $('.contact-edit-lastname-validate-msg').removeClass('hidden');
            $('.contact-edit-lastname-required-msg').addClass('hidden');
        }
        $('.me-checkout-contact-info-edit-card').removeClass('hidden');
        $('.checkout-info-data').addClass('hidden');
        $('html, body').animate({
            scrollTop: $(".me-checkout-contact-info-container").offset().top
        }, 500);
    }else{
        invalidLastnameFormat=false;
        $('.contact-info-lastname-' + contactID).parent().css('border','');
        $('.contact-info-lastname-' + contactID).removeClass('error-input');
        $('.contact-edit-lastname-validate-msg').addClass('hidden');
        $('.contact-edit-lastname-required-msg').addClass('hidden');
        $('.checkout-info-data').removeClass('hidden');
    }

    if(contact_phone == '' || contact_phone == null){
        invalidPhnoFormat=true;
        $('.contact-number-empty-required-msg').removeClass('hidden');
        $('.contact-edit-phno-required-msg').addClass('hidden');
        $('.me-checkout-contact-info-edit-card').addClass('hidden');
        $('.checkout-info-data').addClass('hidden');
        $('.contact-edit-invalid-phno-required-msg').addClass('hidden');
    }else{
        $('.contact-number-empty-required-msg').addClass('hidden');
        if(contact_phone.toString().length!=8){
            invalidPhnoFormat=true;
            $('.contact-edit-invalid-phno-required-msg').addClass('hidden'); //hidden validate number
            $('.phno-verify-msg').addClass('hidden');
    
            $('.contact-info-phno-' + contactID).addClass('error-input');        
            $('.contact-edit-phno-required-msg').removeClass('hidden');
            $('.me-checkout-contact-info-edit-card').removeClass('hidden');
            $('.checkout-info-data').addClass('hidden');
            $('html, body').animate({
                scrollTop: $(".me-checkout-contact-info-container").offset().top
            }, 500);
        }else{
            invalidPhnoFormat=false;
            $('.contact-info-phno-' + contactID).parent().css('border','');
            $('.contact-info-phno-' + contactID).removeClass('error-input');
            $('.contact-edit-phno-required-msg').addClass('hidden');
            $('.checkout-info-data').removeClass('hidden');
        }
        
        if(checkValidDigit(contact_countrycode,contact_phone) == false){
            invalidPhno=true;
            $('.contact-edit-phno-required-msg').addClass('hidden'); // hidden required 8 digits
            $('.phno-verify-msg').addClass('hidden');
    
            $('.contact-info-phno-' + contactID).addClass('error-input');        
            $('.contact-edit-invalid-phno-required-msg').removeClass('hidden');
            $('.me-checkout-contact-info-edit-card').removeClass('hidden');
            $('.checkout-info-data').addClass('hidden');
            $('html, body').animate({
                scrollTop: $(".me-checkout-contact-info-container").offset().top
            }, 500);
        }else{
            invalidPhno=false;
            $('.contact-info-phno-' + contactID).parent().css('border','');
            $('.contact-info-phno-' + contactID).removeClass('error-input');
            $('.contact-edit-invalid-phno-required-msg').addClass('hidden');
            $('.checkout-info-data').removeClass('hidden');
        }
    }

    $('.me-checkout-enter-info-card-edit').each(function () {
        
    //if(!$(this).find('.card-edit-info').hasClass('disabled')){
            
    var id = $(this).data('id');

    var title = $('input[name="checkout-gender-' + id + '"]:checked').val();

    var lastName = $('.contact-info-lastname-' + id).val();

    var firstName = $('.contact-info-firstname-' + id).val();

    var specialRequest=$('.request-more-btn' + id).text().trim().replace(/[\n\r]+/g, ' ').replace(/^\s+|\s+$/g, '').replace(/ +/g, " ");



        var specialRequestPlaceholder=$('.request-more-btn' + id).attr('data-placeholder');
        if(specialRequestPlaceholder==specialRequest){
        specialRequest="";

    }
    if(specialRequest==checkoutClick) {
        specialRequest="";
    }
    if(title=="" || title==undefined){
        titleRequired=true;
        errorID=id;
        $('.title-required-message-' + id).removeClass('hidden');
    }else{
        $('.title-required-message-' + id).addClass('hidden');
    }
    if(firstName==""){

    firstNameRequired=true;
    errorID=id;
    $('.contact-info-firstname-' + id).addClass('error-input');

    }else{

    //firstNameRequired=false;

    $('.contact-info-firstname-' + id).removeClass('error-input');
    $('.contact-info-firstname-' + id).parent().css('border','');

    }

    if(lastName==""){
    errorID=id;
    lastNameRequired=true;

    $('.contact-info-lastname-' + id).addClass('error-input');
    $('.contact-info-lastname-' + id).parent().css('border','');

    }else{

    //lastNameRequired=false;

    $('.contact-info-lastname-' + id).removeClass('error-input');

    }

    var eachcountrycode = $('.contact-info-countrycode-' + id).val();
    console.log('code',$('.contact-info-countrycode-' + id).val())
    
    var phone = $('.contact-info-phno-' + id).val().replace(/\s/g,'');

    if(phone){
        if(phone.toString().length!=8){
            invalidRecipientPhno8=true;
            $('.contact-edit-invalid-phno-required-msg').addClass('hidden'); //hidden validate number

            $('.contact-info-phno-' + id).addClass('error-input');        
            $('.contact-edit-phno-required-msg-' + id).removeClass('hidden');
            $('.me-checkout-contact-info-edit-card').removeClass('hidden');
            $('.checkout-info-data').addClass('hidden');
            $('html, body').animate({
                scrollTop: $(".me-checkout-contact-info-container").offset().top
            }, 500);
        }else{
            // invalidRecipientPhno8=false;
            $('.contact-info-phno-' + id).parent().css('border','');
            $('.contact-info-phno-' + id).removeClass('error-input');
            $('.contact-edit-phno-required-msg-' + id).addClass('hidden');
            $('.checkout-info-data').removeClass('hidden');
        }
        
        console.log('checkValidDigit',id,phone,checkValidDigit(eachcountrycode,phone))
        console.log('countrycode',eachcountrycode)
    
        if(checkValidDigit(eachcountrycode,phone) == false){
            invalidRecipientPhno=true;
            $('.contact-edit-phno-required-msg-' + id).addClass('hidden'); // hidden required 8 digits
    
            $('.contact-info-phno-' + id).addClass('error-input');        
            $('.phone-valid-required-message-'+id).removeClass('hidden');
            $('.me-checkout-contact-info-edit-card').removeClass('hidden');
            $('.checkout-info-data').addClass('hidden');
            $('html, body').animate({
                scrollTop: $(".me-checkout-contact-info-container").offset().top
            }, 500);
        }else{
            // invalidRecipientPhno = false;
            $('.contact-info-phno-' + id).parent().css('border','');
            $('.contact-info-phno-' + id).removeClass('error-input');
            $('.phone-valid-required-message-'+id).addClass('hidden');
            $('.checkout-info-data').removeClass('hidden');
        }
    }


    var isSave = $('input[name="save-credit-card-' + id + '"]').prop('checked');

    var remark = $("p[data-id="+id+"]").attr("data-text")=="-"?'':$("p[data-id="+id+"]").attr("data-text");

    var cardInfo = {

    id: id,

    title: title,

    lastName: lastName,

    firstName: firstName,

    eachcountrycode: eachcountrycode,

    phone: phone,

    specialRequest:specialRequest,

    isSave: isSave,

    userId:$('.same-with-content-item li[data-id="'+id+'"].active').attr('data-uniqueID')

    };
    var code_type = $('.code_type').val();

    var codeId = $('.code_id').val();

    var codePrice = $('.code_price').val();

    var discount_type = $('.discount_type').val();

    var totalAmount = $('.total_amounts').val();


    contactFormData.summaryData = {

        codeType: code_type,

        codeId: codeId,

        codePrice: codePrice,

        discount_type: discount_type,

        totalAmount: totalAmount,
        offlinePayment : true

    };
    contactFormData.cardData.push(cardInfo);

    // }

    });
    if(lastNameRequired==true || firstNameRequired==true || titleRequired==true){
        $('html, body').animate({
            scrollTop: $('.contact-info-lastname-' + errorID).parent().parent().parent()?.offset()?.top-300
        }, 500);
    }
    $('.checkout-info-card-data').val(JSON.stringify(contactFormData));

    if(contact_email=="" || contact_email==null){

    emailRequired=true;

    $('.me-checkout-contact-info-edit-card').removeClass('hidden');

    $('.checkout-info-data').addClass('hidden');

    $('.contact-info-email-'+contactID).addClass('error-input');

    $('.email-verify-text').removeClass('hidden');

    $('.contact-info-email-'+contactID).removeAttr('disabled');

    $('html, body').animate({

    scrollTop: $(".me-checkout-contact-info").offset().top

    }, 500);

    }else{

    $('.contact-info-email-'+contactID).removeClass('error-input');

    $('.email-verify-text').addClass('hidden');

    $('.contact-info-email-'+contactID).attr('disabled',true)

    }

    console.log('test', JSON.parse($('.checkout-info-card-data').val()), contactFormData)
console.log('invalidRecipientPhno',invalidRecipientPhno,invalidRecipientPhno8)
    if (lastNameRequired == false && firstNameRequired == false && emailRequired == false &&  titleRequired == false && 
    invalidPhnoFormat == false && invalidLastnameFormat == false && invalidfirstnameFormat == false && contactTitleRequired == false && invalidPhno == false && invalidRecipientPhno == false && invalidRecipientPhno8 == false) {
        $.ajax({
            type: 'POST',
            url: "{{route('checkout.updateRecipientInfo')}}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: contactFormData,
            async: false, // open new tab
            success: function(res) {
                console.log(res)
                if (res.status == 200) {
                    {!! session()->put('is_payment',uniqid()) !!}
                    let getCode = {!! json_encode(session()->get('is_payment'))!!}
                    window.location.href = "{{langlink('checkout/order-checkout?is_payment=')}}"+getCode;
                }
                if(res.status == 404){
                    console.log(res.id)
                    $('.recipient_title-'+res.id).removeClass('hidden')
                }else{
                    $('.recipient_title-'+res.id).addClass('hidden')
                }
            }
        })
    }

}


function checkValidDigit(phoneCode,number){
    var one = String(number).charAt(0);
    console.log('check number',phoneCode,number)
    if(phoneCode == "+852"){
        if(one == '5' || one == '6' || one == '9'){
            return true;
        }else{
            return false;

        }
    }

    if(phoneCode == "+86"){
        if(one == '1'){
            return true;
        }else{
            return false;
        }
    }
    // return true;
}
</script>
@endpush
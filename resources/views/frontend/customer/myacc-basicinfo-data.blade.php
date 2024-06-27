<div component-name="dashboard-basics-health-title" class="flex items-center justify-start">
    <p class="helvetica-normal text-darkgray me-body32 font-bold">@lang('labels.basic_info.basic_info')
    </p>
    <button class="eye-close-btn ml-4 hidden">
        <img src="{{asset('frontend/img/eye.svg')}}" alt="eye open icon">
    </button>
    <button class="eye-open-btn ml-4 ">
        <img src="{{asset('frontend/img/eye-lash.svg')}}" alt="eye close icon">
    </button>
</div>
<section class="personal-detail-section">
    <div component-name="dashboard-personal-card"
        class="dsp-container border border-mee4 rounded-xl py-5 px-8 text-darkgray mt-10" id="dashboard-personal-card">
        <div class="main-container flex justify-between">
            <div class="main-title-section">
                <div class="me-body23 helvetica-normal font-bold dsp-title">
                    @lang('labels.basic_info.person_detail')
                </div>
                <p>
                    {{-- @lang('labels.basic_info.personalise') --}}
                </p>
            </div>
            <button class="flex items-center justify-center basic-edit-btn" data-id="dashboard-personal-card">
                <svg class="mr-[10px]" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg')}}">
                    <path
                        d="M19.5244 2.05265C19.2391 2.11127 18.9226 2.25196 18.6959 2.42391C18.5709 2.51379 18.2074 2.85769 17.8831 3.18205L17.2969 3.77215L18.7741 5.24545L20.2474 6.72266L20.8727 6.09738C21.2205 5.75348 21.5644 5.37441 21.6464 5.25717C22.2014 4.42087 22.0958 3.34618 21.3846 2.63494C20.8883 2.13863 20.1927 1.91978 19.5244 2.05265Z"
                        fill="#333333"></path>
                    <path
                        d="M13.066 8.0033C10.3891 10.6842 9.73254 11.3641 9.70127 11.4736C9.68173 11.5478 9.53714 12.2591 9.38082 13.0563C9.18933 14.0176 9.10336 14.5374 9.11899 14.6117C9.15416 14.7484 9.2714 14.8657 9.40818 14.9008C9.55668 14.936 12.5384 14.342 12.6909 14.2482C12.7495 14.2091 14.2775 12.7007 16.083 10.8913L19.3656 7.60469L17.9002 6.13921C17.0951 5.33417 16.4269 4.67373 16.4151 4.67373C16.4034 4.67373 14.8989 6.17438 13.066 8.0033Z"
                        fill="#333333"></path>
                    <path
                        d="M4.0408 5.39511C3.29047 5.53189 2.59485 6.06337 2.25486 6.76289C1.98131 7.32564 1.99303 6.93093 2.00475 13.8167L2.01648 20.0109L2.10245 20.2649C2.23141 20.64 2.45417 20.9918 2.73945 21.2809C3.03255 21.574 3.32173 21.7538 3.70471 21.8867L3.97045 21.9844H10.3092H16.6479L16.9527 21.8867C17.7382 21.6405 18.3556 20.9839 18.594 20.1437C18.6605 19.9093 18.6644 19.6552 18.6644 16.2553V12.617L18.5471 12.4294C18.3752 12.152 18.086 12.0035 17.7733 12.0308C17.4998 12.0543 17.2849 12.1832 17.1324 12.4177L17.023 12.5818L17.0035 16.1772C16.9839 19.4677 16.98 19.7881 16.9175 19.8975C16.8237 20.0695 16.601 20.2532 16.429 20.304C16.3235 20.3352 14.5141 20.343 10.2388 20.3352L4.19712 20.3235L4.04471 20.218C3.96264 20.1594 3.84931 20.046 3.7946 19.964L3.6969 19.8194L3.68517 13.7308C3.67736 7.79459 3.67736 7.63827 3.75161 7.49368C3.7946 7.41552 3.87666 7.30219 3.93919 7.24357C4.18539 7.00518 4.01344 7.01691 7.80416 7.01691C10.4342 7.01691 11.3096 7.00518 11.4307 6.97001C11.6535 6.90358 11.8958 6.64956 11.9583 6.41899C12.0638 6.04774 11.9075 5.65694 11.5792 5.46545L11.3956 5.35603L7.85887 5.34821C5.07641 5.3443 4.26355 5.35212 4.0408 5.39511Z"
                        fill="#333333"></path>
                </svg>
               @lang('labels.check_out.edit')
            </button>
        </div>

        <div class="custom-divider my-5"></div>
        <div>
            <div class="flex items-baseline justify-start flex-wrap helvetica-normal text-darkgray">
                <div class="person-detail-card name-section mb-5">
                    <p class="me-body16 mb-[10px]">@lang('labels.check_out.name')</p>
                    <div class="text-section  hidden">
                        <p class="me-body18 font-bold" id='full_name_content'>
                            <span>
                                @if($personalInfo->first_name==NULL && $personalInfo->last_name==NULL)
                                -
                                @else
                                    @if($personalInfo->title_full_name=="")
                                        @lang("labels.check_out.mr")
                                    @else
                                        @if($personalInfo->title_full_name=='Mrs')
                                            @lang("labels.check_out.ms")
                                        @else
                                            @lang("labels.check_out.mr")
                                        @endif
                                    @endif {{ucfirst($personalInfo->last_name)}} {{ucfirst($personalInfo->first_name)}}
                                @endif
                            </span>
                        </p>
                    </div>
                    <div class="text-hide-section show">
                        <p class="me-body18 font-bold">
                            @if($personalInfo->first_name==NULL && $personalInfo->last_name==NULL)
                            <span>-</span>
                            @else
                            <span>@if($personalInfo->title_full_name=="")@lang("labels.check_out.mr")@else @if($personalInfo->title_full_name=='Mrs')@lang("labels.check_out.ms")@else @lang("labels.check_out.mr")@endif @endif {{ucfirst($personalInfo->last_name)}} {{ucfirst($personalInfo->first_name)}}</span>
                            @endif
                        </p>
                    </div>
                    <div class="input-section">
                        <div class="flex items-center justify-start">
                            <div class="name-selector-option">
                                <input type="hidden" name="nso-name" value="{{$personalInfo->title_full_name}}" id="txt_title_full_name">
                                <button type="button" class="nso-name-btn flex items-center">
                                    <span class="max-w-[32px] w-full" id='title_full_name'>
                                        @if($personalInfo->title_full_name=="")
                                            @lang("labels.check_out.mr")
                                        @else
                                            @if($personalInfo->title_full_name=='Mrs')
                                                @lang("labels.check_out.ms")
                                            @else
                                                @lang("labels.check_out.mr")
                                            @endif
                                        @endif
                                    </span>
                                    <img src="{{asset('frontend/img/dropdown-icon.svg')}}" alt="drop icon">
                                </button>
                                <div class="name-selector-option--dropdown-list relative">
                                    <ul class="nso-dropdown-lists absolute top-0">
                                        <li class="nso-dropdown-items" data-value="Mr">@lang("labels.check_out.mr")</li>
                                        <li class="nso-dropdown-items" data-value="Mrs">@lang("labels.check_out.ms") </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="w-full 7xl:max-w-[56%]">
                                <div>
                                    <input type="text" placeholder="@lang("labels.basic_info.last_name_suggestion")" id="last_name"
                                        class="w-full ml-[4px] me-body18 placeholder-text-lightgray rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-orangeMediq block capitalize"
                                        value="{{$personalInfo->last_name}}">
                                    <p class="text-mered me-body16 helvetica-normal mt-[12px] hidden pw-error">invalid name</p>
                                </div>
                               
                            </div>
                        </div>
                        <div class="last-name-section mt-2 flex items-center justify-start">
                            <div class="empty-title w-[110px] name-selector-option"></div>
                            <div class="name-label w-full 7xl:max-w-[56%]">
                                <div>
                                    <input type="text" placeholder="@lang("labels.basic_info.first_name_suggestion")" id="first_name"
                                        class="w-full ml-[4px] me-body18 placeholder-text-lightgray rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-orangeMediq block capitalize"
                                        value="{{$personalInfo->first_name}}">
                                    <p class="text-mered me-body16 helvetica-normal mt-[12px] hidden pw-error">invalid name</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="person-detail-card phone-section mb-5">
                    <p class="me-body16 mb-[10px]">@lang('labels.basic_info.phone_number')</p>
                    <div class="text-section phone-sector hidden">
                        <form id="captcha11Form">
                        <p class="me-body18 font-bold">
                            <span id="phone_no" class="me-body18 font-bold">{{session()->has('phone')?session()->get('phone'):($personalInfo->phone==null?'-':$personalInfo->phone)}}</span>
                            <button id="captcha11"
                                class="g-recaptcha ml-[4px] font-normal me-body16 text-orangeMediq underline verify-phone-btn-content {{session()->has('phone')?(session()->get('phone')=='-'?'hidden':''):($personalInfo->phone==null || $personalInfo->is_verified==1?'hidden':'')}}">@lang('labels.basic_info.click_to_verify')</button>
                            <svg class="{{session()->has('phone')?'hidden':($personalInfo->is_verified==1?'':'hidden')}} phone-verify-icon ml-[4px]" width="20" height="21" viewBox="0 0 20 21"
                                fill="none" xmlns="http://www.w3.org/2000/svg')}}">
                                <path
                                    d="M13.4563 8.29375C13.544 8.38164 13.5933 8.50078 13.5933 8.625C13.5933 8.74922 13.544 8.86836 13.4563 8.95625L9.08125 13.3313C8.99336 13.419 8.87422 13.4683 8.75 13.4683C8.62578 13.4683 8.50664 13.419 8.41875 13.3313L6.54375 11.4563C6.46095 11.3674 6.41588 11.2499 6.41802 11.1284C6.42016 11.007 6.46936 10.8911 6.55524 10.8052C6.64112 10.7194 6.75699 10.6702 6.87843 10.668C6.99987 10.6659 7.11739 10.7109 7.20625 10.7937L8.75 12.3367L12.7938 8.29375C12.8816 8.20597 13.0008 8.15666 13.125 8.15666C13.2492 8.15666 13.3684 8.20597 13.4563 8.29375ZM17.9688 10.5C17.9688 12.0761 17.5014 13.6167 16.6258 14.9272C15.7502 16.2377 14.5056 17.259 13.0495 17.8622C11.5934 18.4653 9.99116 18.6231 8.44538 18.3156C6.89959 18.0082 5.4797 17.2492 4.36525 16.1348C3.2508 15.0203 2.49185 13.6004 2.18437 12.0546C1.87689 10.5088 2.0347 8.90659 2.63784 7.45049C3.24097 5.99439 4.26235 4.74984 5.5728 3.87423C6.88326 2.99861 8.42393 2.53125 10 2.53125C12.1127 2.53373 14.1381 3.37409 15.632 4.86798C17.1259 6.36188 17.9663 8.38732 17.9688 10.5ZM17.0313 10.5C17.0313 9.10935 16.6189 7.74993 15.8463 6.59365C15.0737 5.43736 13.9755 4.53615 12.6907 4.00397C11.406 3.47179 9.9922 3.33255 8.62827 3.60385C7.26435 3.87516 6.0115 4.54482 5.02816 5.52816C4.04482 6.51149 3.37516 7.76434 3.10386 9.12827C2.83255 10.4922 2.9718 11.906 3.50398 13.1907C4.03615 14.4755 4.93737 15.5737 6.09365 16.3463C7.24993 17.1189 8.60935 17.5312 10 17.5312C11.8642 17.5292 13.6514 16.7877 14.9696 15.4696C16.2877 14.1514 17.0292 12.3642 17.0313 10.5Z"
                                    fill="#32A923"></path>
                            </svg>
                        </p>
                        <span class="text-mered me-body16 helvetica-normal mt-[12px] hidden phone_error"></span>
                        </form>
                    </div>
                    <div class="text-hide-section phone-sector show" id="phone-hide-section">
                        <p class="me-body18 font-bold">
                            <form id="captcha22Form">
                            <span id="phone_no2" class="me-body18 font-bold">{{session()->has('phone')?session()->get('phone'):($personalInfo->phone==null?'-':$personalInfo->phone)}}</span>
                            <button id="captcha22"
                                class="g-recaptcha ml-[4px] font-normal me-body16 text-orangeMediq underline verify-phone-btn-content {{session()->has('phone')?(session()->get('phone')=='-'?'hidden':''):($personalInfo->phone==null || $personalInfo->is_verified==1?'hidden':'')}}">@lang('labels.basic_info.click_to_verify')</button>
                            <svg class="{{session()->has('phone')?'hidden':($personalInfo->is_verified==1?'':'hidden')}} verify-icon  ml-[4px]" width="20" height="21" viewBox="0 0 20 21"
                                fill="none" xmlns="http://www.w3.org/2000/svg')}}">
                                <path
                                    d="M13.4563 8.29375C13.544 8.38164 13.5933 8.50078 13.5933 8.625C13.5933 8.74922 13.544 8.86836 13.4563 8.95625L9.08125 13.3313C8.99336 13.419 8.87422 13.4683 8.75 13.4683C8.62578 13.4683 8.50664 13.419 8.41875 13.3313L6.54375 11.4563C6.46095 11.3674 6.41588 11.2499 6.41802 11.1284C6.42016 11.007 6.46936 10.8911 6.55524 10.8052C6.64112 10.7194 6.75699 10.6702 6.87843 10.668C6.99987 10.6659 7.11739 10.7109 7.20625 10.7937L8.75 12.3367L12.7938 8.29375C12.8816 8.20597 13.0008 8.15666 13.125 8.15666C13.2492 8.15666 13.3684 8.20597 13.4563 8.29375ZM17.9688 10.5C17.9688 12.0761 17.5014 13.6167 16.6258 14.9272C15.7502 16.2377 14.5056 17.259 13.0495 17.8622C11.5934 18.4653 9.99116 18.6231 8.44538 18.3156C6.89959 18.0082 5.4797 17.2492 4.36525 16.1348C3.2508 15.0203 2.49185 13.6004 2.18437 12.0546C1.87689 10.5088 2.0347 8.90659 2.63784 7.45049C3.24097 5.99439 4.26235 4.74984 5.5728 3.87423C6.88326 2.99861 8.42393 2.53125 10 2.53125C12.1127 2.53373 14.1381 3.37409 15.632 4.86798C17.1259 6.36188 17.9663 8.38732 17.9688 10.5ZM17.0313 10.5C17.0313 9.10935 16.6189 7.74993 15.8463 6.59365C15.0737 5.43736 13.9755 4.53615 12.6907 4.00397C11.406 3.47179 9.9922 3.33255 8.62827 3.60385C7.26435 3.87516 6.0115 4.54482 5.02816 5.52816C4.04482 6.51149 3.37516 7.76434 3.10386 9.12827C2.83255 10.4922 2.9718 11.906 3.50398 13.1907C4.03615 14.4755 4.93737 15.5737 6.09365 16.3463C7.24993 17.1189 8.60935 17.5312 10 17.5312C11.8642 17.5292 13.6514 16.7877 14.9696 15.4696C16.2877 14.1514 17.0292 12.3642 17.0313 10.5Z"
                                    fill="#32A923"></path>
                            </svg>
                            </form>
                        </p>
                        <span class="text-mered me-body16 helvetica-normal mt-[12px] hidden phone_error"></span>
                    </div>
                    <div class="input-section">
                        <div class="flex items-start justify-start">
                            <div class="name-selector-option phone-select">
                                <input type="hidden" name="nso-name" value="{{session()->has('phone')?substr(session()->get('phone'), 0, 4):($personalInfo->phone!=null?substr($personalInfo->phone, 0, 4):'+852')}}" id="phone_code1">
                                <button type="button" class="nso-name-btn flex items-center"><span class="w-full" id="phone_content1">{{session()->has('phone')?substr(session()->get('phone'), 0, 4):($personalInfo->phone!=null?substr($personalInfo->phone, 0, 4):'+852')}}</span><img src="{{asset('frontend/img/dropdown-icon.svg')}}" alt="drop icon"></button>
                                <div class="name-selector-option--dropdown-list relative">
                                    <ul class="nso-dropdown-lists absolute top-0">
                                        @if(session()->has('phone'))
                                            <li class="nso-dropdown-items {{session()->get('phone')=='-'?'active':(substr(session()->get('phone'), 0, 4)=='+852'?'active':'')}}" data-value="+852">+852</li>
                                            <li class="nso-dropdown-items {{session()->get('phone')=='-'?'':(substr(session()->get('phone'), 0, 3)=='+86'?'active':'')}}" data-value="+86">+86</li>
                                        @else
                                            @if($personalInfo->phone==null)
                                            <li class="nso-dropdown-items active" data-value="+852">+852</li>
                                            <li class="nso-dropdown-items" data-value="+86">+86</li>
                                            @else
                                            <li class="nso-dropdown-items {{substr($personalInfo->phone, 0, 4)=='+852'?'active':''}}" data-value="+852">+852</li>
                                            <li class="nso-dropdown-items {{substr($personalInfo->phone, 0, 3)=='+86'?'active':''}}" data-value="+86">+86</li>
                                            @endif
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="phone-input w-full max-w-[60%] 7xl:max-w-[66%]">
                                <div>
                                    <input type="text" id="phone123" class="hidden-phone-number hidden" value="{{session()->has('phone')?(session()->get('phone')=='-'?'':(strlen(session()->get('phone'))==12?substr(session()->get('phone'),4):substr(session()->get('phone'),3))):(strlen($personalInfo->phone)==12?substr($personalInfo->phone,4):substr($personalInfo->phone,3))}}"/>
                                    <input type="text" id="phone1" placeholder="@lang('labels.basic_info.phone_number')" class="w-full ml-[4px] me-body18 placeholder-text-lightgray rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-orangeMediq block phinput" value="{{ session()->has('phone')?(strlen(session()->get('phone'))==12?substr(session()->get('phone'),4):substr(session()->get('phone'),3)):(strlen($personalInfo->phone)==12?substr($personalInfo->phone,4):substr($personalInfo->phone,3))}}">
                                    <p class="text-mered me-body16 helvetica-normal mt-[12px] hidden pw-error">@lang('labels.basic_info.invalid_number')</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- <div class="person-detail-card mb-5">
                    <p class="me-body16 mb-[10px]">Email (for booking confirmation)</p>
                    <div class="text-section email-sector">
                        <p class="flex items-center justify-start me-body18 font-bold">
                            <span>{{$personalInfo->email}}</span>
                            <button
                                class="hidden ml-[4px] font-normal me-body16 text-orangeMediq underline verify-email-btn">@lang('labels.basic_info.click_to_verify')</button>
                            <svg class="verify-icon ml-[4px]" width="20" height="21" viewBox="0 0 20 21"
                                fill="none" xmlns="http://www.w3.org/2000/svg')}}">
                                <path
                                    d="M13.4563 8.29375C13.544 8.38164 13.5933 8.50078 13.5933 8.625C13.5933 8.74922 13.544 8.86836 13.4563 8.95625L9.08125 13.3313C8.99336 13.419 8.87422 13.4683 8.75 13.4683C8.62578 13.4683 8.50664 13.419 8.41875 13.3313L6.54375 11.4563C6.46095 11.3674 6.41588 11.2499 6.41802 11.1284C6.42016 11.007 6.46936 10.8911 6.55524 10.8052C6.64112 10.7194 6.75699 10.6702 6.87843 10.668C6.99987 10.6659 7.11739 10.7109 7.20625 10.7937L8.75 12.3367L12.7938 8.29375C12.8816 8.20597 13.0008 8.15666 13.125 8.15666C13.2492 8.15666 13.3684 8.20597 13.4563 8.29375ZM17.9688 10.5C17.9688 12.0761 17.5014 13.6167 16.6258 14.9272C15.7502 16.2377 14.5056 17.259 13.0495 17.8622C11.5934 18.4653 9.99116 18.6231 8.44538 18.3156C6.89959 18.0082 5.4797 17.2492 4.36525 16.1348C3.2508 15.0203 2.49185 13.6004 2.18437 12.0546C1.87689 10.5088 2.0347 8.90659 2.63784 7.45049C3.24097 5.99439 4.26235 4.74984 5.5728 3.87423C6.88326 2.99861 8.42393 2.53125 10 2.53125C12.1127 2.53373 14.1381 3.37409 15.632 4.86798C17.1259 6.36188 17.9663 8.38732 17.9688 10.5ZM17.0313 10.5C17.0313 9.10935 16.6189 7.74993 15.8463 6.59365C15.0737 5.43736 13.9755 4.53615 12.6907 4.00397C11.406 3.47179 9.9922 3.33255 8.62827 3.60385C7.26435 3.87516 6.0115 4.54482 5.02816 5.52816C4.04482 6.51149 3.37516 7.76434 3.10386 9.12827C2.83255 10.4922 2.9718 11.906 3.50398 13.1907C4.03615 14.4755 4.93737 15.5737 6.09365 16.3463C7.24993 17.1189 8.60935 17.5312 10 17.5312C11.8642 17.5292 13.6514 16.7877 14.9696 15.4696C16.2877 14.1514 17.0292 12.3642 17.0313 10.5Z"
                                    fill="#32A923"></path>
                            </svg>
                        </p>
                    </div>
                    <div class="text-hide-section email-sector">
                        <p class="flex items-center justify-start me-body18 font-bold">
                            <span>{{$personalInfo->email}}</span>
                            <button
                                class="hidden ml-[4px] font-normal me-body16 text-orangeMediq underline verify-email-btn">@lang('labels.basic_info.click_to_verify')</button>
                            <svg class="verify-icon ml-[4px]" width="20" height="21" viewBox="0 0 20 21"
                                fill="none" xmlns="http://www.w3.org/2000/svg')}}">
                                <path
                                    d="M13.4563 8.29375C13.544 8.38164 13.5933 8.50078 13.5933 8.625C13.5933 8.74922 13.544 8.86836 13.4563 8.95625L9.08125 13.3313C8.99336 13.419 8.87422 13.4683 8.75 13.4683C8.62578 13.4683 8.50664 13.419 8.41875 13.3313L6.54375 11.4563C6.46095 11.3674 6.41588 11.2499 6.41802 11.1284C6.42016 11.007 6.46936 10.8911 6.55524 10.8052C6.64112 10.7194 6.75699 10.6702 6.87843 10.668C6.99987 10.6659 7.11739 10.7109 7.20625 10.7937L8.75 12.3367L12.7938 8.29375C12.8816 8.20597 13.0008 8.15666 13.125 8.15666C13.2492 8.15666 13.3684 8.20597 13.4563 8.29375ZM17.9688 10.5C17.9688 12.0761 17.5014 13.6167 16.6258 14.9272C15.7502 16.2377 14.5056 17.259 13.0495 17.8622C11.5934 18.4653 9.99116 18.6231 8.44538 18.3156C6.89959 18.0082 5.4797 17.2492 4.36525 16.1348C3.2508 15.0203 2.49185 13.6004 2.18437 12.0546C1.87689 10.5088 2.0347 8.90659 2.63784 7.45049C3.24097 5.99439 4.26235 4.74984 5.5728 3.87423C6.88326 2.99861 8.42393 2.53125 10 2.53125C12.1127 2.53373 14.1381 3.37409 15.632 4.86798C17.1259 6.36188 17.9663 8.38732 17.9688 10.5ZM17.0313 10.5C17.0313 9.10935 16.6189 7.74993 15.8463 6.59365C15.0737 5.43736 13.9755 4.53615 12.6907 4.00397C11.406 3.47179 9.9922 3.33255 8.62827 3.60385C7.26435 3.87516 6.0115 4.54482 5.02816 5.52816C4.04482 6.51149 3.37516 7.76434 3.10386 9.12827C2.83255 10.4922 2.9718 11.906 3.50398 13.1907C4.03615 14.4755 4.93737 15.5737 6.09365 16.3463C7.24993 17.1189 8.60935 17.5312 10 17.5312C11.8642 17.5292 13.6514 16.7877 14.9696 15.4696C16.2877 14.1514 17.0292 12.3642 17.0313 10.5Z"
                                    fill="#32A923"></path>
                            </svg>
                        </p>
                    </div>
                </div> --}}
                <div class="person-detail-card mb-5">
                    <p class="me-body16 mb-[10px]">@lang('labels.check_out.email')</p>
                    <div class="text-section email-sector hidden {{$personalInfo->email_is_verified==1?'verified':''}}">
                        <form id="captcha33Form">
                        <p class="flex items-center justify-start me-body18 font-bold">
                            <span id="email_content">{{$personalInfo->email==null?'-':$personalInfo->email}}</span>
                            <button id="captcha33" class="g-recaptcha ml-[4px] font-normal me-body16 text-orangeMediq underline verify-email-btn-content {{$personalInfo->email==null || $personalInfo->email_is_verified==1?'hidden':''}}">@lang('labels.basic_info.click_to_verify')</button>
                            <svg class="{{$personalInfo->email_is_verified==0?'hidden':''}} verify-icon ml-[4px]" width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.4563 8.29375C13.544 8.38164 13.5933 8.50078 13.5933 8.625C13.5933 8.74922 13.544 8.86836 13.4563 8.95625L9.08125 13.3313C8.99336 13.419 8.87422 13.4683 8.75 13.4683C8.62578 13.4683 8.50664 13.419 8.41875 13.3313L6.54375 11.4563C6.46095 11.3674 6.41588 11.2499 6.41802 11.1284C6.42016 11.007 6.46936 10.8911 6.55524 10.8052C6.64112 10.7194 6.75699 10.6702 6.87843 10.668C6.99987 10.6659 7.11739 10.7109 7.20625 10.7937L8.75 12.3367L12.7938 8.29375C12.8816 8.20597 13.0008 8.15666 13.125 8.15666C13.2492 8.15666 13.3684 8.20597 13.4563 8.29375ZM17.9688 10.5C17.9688 12.0761 17.5014 13.6167 16.6258 14.9272C15.7502 16.2377 14.5056 17.259 13.0495 17.8622C11.5934 18.4653 9.99116 18.6231 8.44538 18.3156C6.89959 18.0082 5.4797 17.2492 4.36525 16.1348C3.2508 15.0203 2.49185 13.6004 2.18437 12.0546C1.87689 10.5088 2.0347 8.90659 2.63784 7.45049C3.24097 5.99439 4.26235 4.74984 5.5728 3.87423C6.88326 2.99861 8.42393 2.53125 10 2.53125C12.1127 2.53373 14.1381 3.37409 15.632 4.86798C17.1259 6.36188 17.9663 8.38732 17.9688 10.5ZM17.0313 10.5C17.0313 9.10935 16.6189 7.74993 15.8463 6.59365C15.0737 5.43736 13.9755 4.53615 12.6907 4.00397C11.406 3.47179 9.9922 3.33255 8.62827 3.60385C7.26435 3.87516 6.0115 4.54482 5.02816 5.52816C4.04482 6.51149 3.37516 7.76434 3.10386 9.12827C2.83255 10.4922 2.9718 11.906 3.50398 13.1907C4.03615 14.4755 4.93737 15.5737 6.09365 16.3463C7.24993 17.1189 8.60935 17.5312 10 17.5312C11.8642 17.5292 13.6514 16.7877 14.9696 15.4696C16.2877 14.1514 17.0292 12.3642 17.0313 10.5Z" fill="#32A923"/>
                            </svg>
                        </p>
                        <span class="text-mered me-body16 helvetica-normal mt-[12px] hidden email_error"></span>
                        </form>
                    </div>
                    <div class="text-hide-section email-sector show {{$personalInfo->email_is_verified==1?'verified':''}}">
                        <form id="captcha44Form">
                        <p class="flex items-center justify-start me-body18 font-bold">
                            <span id="email_content2">{{$personalInfo->email==null?'-':$personalInfo->email}}</span>
                            <button id="captcha44" class="g-recaptcha ml-[4px] font-normal me-body16 text-orangeMediq underline verify-email-btn-content {{$personalInfo->email==null || $personalInfo->email_is_verified==1?'hidden':''}}">@lang('labels.basic_info.click_to_verify')</button>
                            <svg class="{{$personalInfo->email_is_verified==0?'hidden':''}} verify-icon ml-[4px]" width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.4563 8.29375C13.544 8.38164 13.5933 8.50078 13.5933 8.625C13.5933 8.74922 13.544 8.86836 13.4563 8.95625L9.08125 13.3313C8.99336 13.419 8.87422 13.4683 8.75 13.4683C8.62578 13.4683 8.50664 13.419 8.41875 13.3313L6.54375 11.4563C6.46095 11.3674 6.41588 11.2499 6.41802 11.1284C6.42016 11.007 6.46936 10.8911 6.55524 10.8052C6.64112 10.7194 6.75699 10.6702 6.87843 10.668C6.99987 10.6659 7.11739 10.7109 7.20625 10.7937L8.75 12.3367L12.7938 8.29375C12.8816 8.20597 13.0008 8.15666 13.125 8.15666C13.2492 8.15666 13.3684 8.20597 13.4563 8.29375ZM17.9688 10.5C17.9688 12.0761 17.5014 13.6167 16.6258 14.9272C15.7502 16.2377 14.5056 17.259 13.0495 17.8622C11.5934 18.4653 9.99116 18.6231 8.44538 18.3156C6.89959 18.0082 5.4797 17.2492 4.36525 16.1348C3.2508 15.0203 2.49185 13.6004 2.18437 12.0546C1.87689 10.5088 2.0347 8.90659 2.63784 7.45049C3.24097 5.99439 4.26235 4.74984 5.5728 3.87423C6.88326 2.99861 8.42393 2.53125 10 2.53125C12.1127 2.53373 14.1381 3.37409 15.632 4.86798C17.1259 6.36188 17.9663 8.38732 17.9688 10.5ZM17.0313 10.5C17.0313 9.10935 16.6189 7.74993 15.8463 6.59365C15.0737 5.43736 13.9755 4.53615 12.6907 4.00397C11.406 3.47179 9.9922 3.33255 8.62827 3.60385C7.26435 3.87516 6.0115 4.54482 5.02816 5.52816C4.04482 6.51149 3.37516 7.76434 3.10386 9.12827C2.83255 10.4922 2.9718 11.906 3.50398 13.1907C4.03615 14.4755 4.93737 15.5737 6.09365 16.3463C7.24993 17.1189 8.60935 17.5312 10 17.5312C11.8642 17.5292 13.6514 16.7877 14.9696 15.4696C16.2877 14.1514 17.0292 12.3642 17.0313 10.5Z" fill="#32A923"/>
                            </svg>
                        </p>
                        <span class="text-mered me-body16 helvetica-normal mt-[12px] hidden email_error"></span>
                        </form>
                    </div>
                    <div class="input-section email-input pr-[1.7rem] xlg:pr-0 3xl:pr-5">
                        <input type="email" {{$personalInfo->email_is_verified==1?'disabled':''}} id="email_1" placeholder="@lang('labels.log_in_register.enter_email')" value="{{$personalInfo->email}}" class="max-w-[373px] lg:max-w-[295px] xl:max-w-[357px] 2xl:max-w-[375px] 3xl:max-w-full w-full me-body18 placeholder-text-lightgray rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] mb-2 focus:border-orangeMediq block">
                        <p class="text-mered me-body16 helvetica-normal mt-[12px] hidden pw-error">invalid email</p>
                    </div>
                </div>
                <div class="person-detail-card dob-section mb-5">
                    <p class="me-body16 mb-[10px]">@lang('labels.basic_info.date_of_birth')</p>
                  
                    @if($personalInfo->dob!==NULL)
                    <div class="text-section phone-sector hidden">
                        <p class="me-body18 font-bold"><span id="dob_content">
                            {{date("d/m/Y",strtotime($personalInfo->dob))}}</span>
                            <button class="me-body16 text-orangeMediq underline dob-update-btn hidden"
                                data-id="dashboard-personal-card">@lang('labels.basic_info.click_to_update')</button></p>
                    </div>
                    <div class="text-hide-section phone-sector show">
                        <p class="me-body18 font-bold">
                            <span id="dob_date" style="word-wrap: break-word;">{{date("d/m/Y",strtotime($personalInfo->dob))}}</span>
                        </p>
                    </div>
                   
                    @else
                    <div class="dob-empty-section">
                        <p class="me-body18 font-bold">
                            <span id="dob_content">@lang("labels.basic_info.fill_your_birthday")<br/>
                                <span class="me-body14">@lang("labels.basic_info.can_only_be_filled")</span>
                            </span>
                        </p>
                    </div>
                    @endif
                    <div class="bod-input input-section relative max-w-[260px]">
                        <input type="text" id="bod-datepicker" placeholder="DD/MM/YYYY" value="{{$personalInfo->dob!=null?date("d/m/Y",strtotime($personalInfo->dob)):''}}"
                            class="datepicker-class max-w-[260px] w-full me-body18 placeholder-text-lightgray mb-5 rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-orangeMediq" {{$personalInfo->dob!=null?'disabled':''}}>
                        {{-- <svg class="absolute top-[38%] right-0 bod-arrow cursor-pointer" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg')}}">
                            <path
                                d="M17.9533 9.26636C17.8478 9.03902 17.5829 8.93589 17.3462 9.03199C17.2829 9.05777 16.5329 9.79605 14.6298 11.7086L11.9978 14.3523L9.3681 11.7086C7.46028 9.79371 6.71263 9.05777 6.64935 9.03199C6.60013 9.01324 6.5181 8.99683 6.46653 8.99683C6.12903 8.99683 5.90169 9.33902 6.04231 9.64136C6.1056 9.77496 11.6673 15.3625 11.7986 15.4211C11.9181 15.4773 12.0775 15.4773 12.197 15.4211C12.3283 15.3625 17.89 9.77496 17.9533 9.64136C18.0095 9.52183 18.0095 9.38589 17.9533 9.26636Z"
                                fill="#7C7C7C"></path>
                        </svg> --}}
                        <img src="{{asset('frontend/img/relation-icon.svg')}}" class="absolute top-[35%] right-0 {{$personalInfo->dob!=null?'bod-arrow-local':'bod-arrow'}} cursor-pointer relation-icon"/>
                    </div>
                </div>
                @php $district_id = $personalInfo->district_id; @endphp
                <div class="person-detail-card address-card mb-5">
                    <p class="me-body16 mb-[10px]">@lang('labels.basic_info.address')</p>
                    <div class="text-section hidden">
                        <p class="me-body18 font-bold" id='address_content'>
                            @if($personalInfo->address==null && $personalInfo->district_id==null && $personalInfo->area_id==null)
                            <span>-</span>
                            @else
                            <span>{{$personalInfo->address!=null?$personalInfo->address.',':''}} @if($personalInfo->district_id!==null){{@langbind($personalInfo->district,"name")}},@endif @if($personalInfo->area_id!=null) {{@langbind($personalInfo->area,"name")}},@endif @lang("labels.basic_info.hong_kong")</span>
                            @endif
                        </p>
                    </div>
                    <div class="text-hide-section show">
                        <p class="me-body18 font-bold">
                            @if($personalInfo->address==null && $personalInfo->district_id==null && $personalInfo->area_id==null)
                            <span>-</span>
                            @else
                            <span>{{$personalInfo->address!=null?$personalInfo->address.',':''}} @if($personalInfo->district_id!==null){{@langbind($personalInfo->district,"name")}},@endif @if($personalInfo->area_id!=null) {{@langbind($personalInfo->area,"name")}},@endif @lang("labels.basic_info.hong_kong")</span>
                            @endif
                        </p>
                    </div>
                    <div class="input-section address-input pr-[1.7rem] xlg:pr-0">
                        <div class="dahong-card flex flex-wrap">                   
                            <input class="mailing-address-country-input xl:max-w-[163px] lg:max-w-[140px] sm:max-w-[163px] max-w-full sm:w-auto w-full mt-1 bg-far border-1 border-meA3 focus:outline-none focus-within:outline-none lg:px-5 py-[0.6rem] px-3 font-normal me-body-18 text-d1 placeholder:text-lightgray rounded-[4px] mr-3" value="@lang('labels.basic_info.hong_kong')" placeholder="@lang('labels.basic_info.hong_kong')" name="country" id="country"/>   
                            <div class="dahong-card--item mr-3 relative xl:min-w-[163px] lg:min-w-[140px] min-w-[163px] sm:mt-1 mt-3">
                                <div class="area-item flex justify-between items-center area-text cursor-pointer py-[0.6rem] 2xl:px-[30px] px-4 border-1 border-meA3 rounded-[4px] font-normal me-body-18 text-darkgray">
                                    <input type="hidden" class="selected-area" id="area_id" value="{{$personalInfo->area_id}}"/>
                                    <p class="area-item mr-2 selected-text area" data-text="Area">@if($personalInfo->area_id==null) @lang("labels.check_out_complete.area") @else {{@langbind($personalInfo->area,"name")}} @endif</p>
                                    <div class="area-item">
                                        <svg class="area-item" xmlns="http://www.w3.org/2000/svg" width="12" height="8" viewBox="0 0 12 8" fill="none">
                                            <path d="M11.9533 1.03687C11.8478 0.809527 11.5829 0.706402 11.3462 0.802496C11.2829 0.828277 10.5329 1.56656 8.62982 3.47906L5.99778 6.12281L3.3681 3.47906C1.46028 1.56421 0.712627 0.828277 0.649346 0.802496C0.600127 0.783746 0.518096 0.76734 0.466533 0.76734C0.129033 0.76734 -0.0983104 1.10953 0.0423146 1.41187C0.105596 1.54546 5.66731 7.13297 5.79856 7.19156C5.9181 7.24781 6.07747 7.24781 6.197 7.19156C6.32825 7.13297 11.89 1.54546 11.9533 1.41187C12.0095 1.29234 12.0095 1.1564 11.9533 1.03687Z" fill="#7C7C7C"/>
                                            </svg>
                                    </div>
                                </div>
                                <ul class="area-list hidden absolute top-full bg-whitez w-full area-item z-[1]"  style="border-radius: 4px;
                                background: #fff;
                                box-shadow: 0 4px 15px 2px rgba(0,0,0,.1);
                                width: 165px;
                                z-index: 1001;
                                height: 120px;
                                overflow-y: scroll;
                                border: 1px solid #a3a3a3;
                                padding: 0;
                                border-top: 0;
                                border-top-left-radius: 0;
                                border-top-right-radius:">
                                    @foreach($areaList as $data)
                                    <li data-id="{{$data->id}}" class="hover:text-orangeMediq px-3 py-1 font-normal me-body-18 text-darkgray cursor-pointer area-item area-item-list {{$personalInfo->area_id!=null && $personalInfo->area_id==$data->id? 'active':''}}">{{@langbind($data,"name")}}</li>
                                    @endforeach
                                </ul>
                            </div>  
                            <div class="dahong-card--item mr-3 relative xl:min-w-[163px] lg:min-w-[140px] min-w-[163px] sm:mt-1 mt-3">
                                <div class="district-item flex justify-between items-center district-text cursor-pointer py-[0.6rem] 2xl:px-[30px] px-4 border-1 border-meA3 rounded-[4px] font-normal me-body-18 text-darkgray">
                                    <input type="hidden" class="selected-district" id="district_id" value="{{$district_id}}" data-id="{{$district_id}}"/>
                                    <p class="district-item mr-2 selected-text district district-txt-val" data-text="District">@if($personalInfo->district_id==null) @lang("labels.check_out_complete.district") @else {{@langbind($personalInfo->district,"name")}} @endif</p>
                                    <div class="district-item">
                                        <svg class="district-item" xmlns="http://www.w3.org/2000/svg" width="12" height="8" viewBox="0 0 12 8" fill="none">
                                            <path d="M11.9533 1.03687C11.8478 0.809527 11.5829 0.706402 11.3462 0.802496C11.2829 0.828277 10.5329 1.56656 8.62982 3.47906L5.99778 6.12281L3.3681 3.47906C1.46028 1.56421 0.712627 0.828277 0.649346 0.802496C0.600127 0.783746 0.518096 0.76734 0.466533 0.76734C0.129033 0.76734 -0.0983104 1.10953 0.0423146 1.41187C0.105596 1.54546 5.66731 7.13297 5.79856 7.19156C5.9181 7.24781 6.07747 7.24781 6.197 7.19156C6.32825 7.13297 11.89 1.54546 11.9533 1.41187C12.0095 1.29234 12.0095 1.1564 11.9533 1.03687Z" fill="#7C7C7C"/>
                                            </svg>
                                    </div>
                                </div>
                                <ul class="district-list hidden absolute top-full bg-whitez w-full district-item z-[1]" style="border-radius: 4px;
                                background: #fff;
                                box-shadow: 0 4px 15px 2px rgba(0,0,0,.1);
                                width: 165px;
                                z-index: 1001;
                                height: 120px;
                                overflow-y: scroll;
                                border: 1px solid #a3a3a3;
                                padding: 0;
                                border-top: 0;
                                border-top-left-radius: 0;
                                border-top-right-radius:">
                                    @foreach($districtList as $data)
                                    <li data-id="{{$data->id}}" class="district_name{{$data->id}} hover:text-orangeMediq px-3 py-1 font-normal me-body-18 text-darkgray cursor-pointer district-item {{$personalInfo->district_id!=null && $personalInfo->district_id==$data->id? 'active':''}}">{{@langbind($data,"name")}}</li>
                                    @endforeach
                                </ul>
                            </div>           
                        </div>
                        <input type="text" id="address" placeholder="@lang('labels.basic_info.address')"
                            class="mt-3 max-w-full w-full me-body18 placeholder-text-lightgray rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] mb-2 focus:border-orangeMediq block address-input"
                            value="{{$personalInfo->address}}">
                    </div>

                </div>
            </div>
            <div class="input-section">
                <div class="custom-divider my-5"></div>
                <button id="btn-personal-info"
                    class="ml-auto max-w-[135px] w-full border border-orangeMediq hover:bg-brightOrangeMediq bg-orangeMediq rounded-[6px] w-full text-whitez helvetica-normal font-bold me-body16 flex items-center justify-center md:h-[50px] h-[40px] personal-detail-save-btn"
                    data-id="dashboard-personal-card">@lang('labels.basic_info.save')</button>
            </div>
        </div>
    </div>
    <dialog component-name="dashboard-ph-verification-code"
        class="hidden lr-popup fixed z-[1001] left-0 top-0 w-full h-full overflow-hidden bg-linear-black items-center justify-center ph-verification-code-popup-content">
        <div class="bg-whitez w-full max-w-[408px] md:p-10 p-5 rounded-[12px] text-darkgray relative mx-auto">
            <div class="">
                <button class="lr-successful-popup-close absolute top-[24px] right-[24px]">
                    <img src="{{asset('frontend/img/lr_round-close.svg')}}" alt="close icon">
                </button>

                <div class="helvetica-normal">
                    <h1 class="helvetica-normal me-body26 text-darkgray font-bold">@lang('labels.basic_info.verify_phone')</h1>
                    <p class="me-body18 text-darkgray pb-5">@lang('labels.log_in_register.send_code_to') {{session()->has('phone')?session()->get('phone'):$personalInfo->phone}}</p>
                    <div class="">

                        <div class="otp-container flex justify-center">
                            <input type="text" id="first" oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                                id="first" maxlength="1"
                                class="bg-whitez border border-mee4 2xs:w-[48px] 2xs:h-[48px] 5xs:w-[38px] 5xs:h-[38px] w-[34px] h-[34px] rounded-[8px] mr-2 focus:outline-0 text-center me-body18 text-darkgray font-bold">
                            <input type="text" id="sec" oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                                id="sec" maxlength="1"
                                class="bg-whitez border border-mee4 2xs:w-[48px] 2xs:h-[48px] 5xs:w-[38px] 5xs:h-[38px] w-[34px] h-[34px] rounded-[8px] mr-2 focus:outline-0 text-center me-body18 text-darkgray font-bold">
                            <input type="text" id="third" oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                                id="third" maxlength="1"
                                class="bg-whitez border border-mee4 2xs:w-[48px] 2xs:h-[48px] 5xs:w-[38px] 5xs:h-[38px] w-[34px] h-[34px] rounded-[8px] mr-2 focus:outline-0 text-center me-body18 text-darkgray font-bold">
                            <input type="text" id="fourth" oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                                id="fourth" maxlength="1"
                                class="bg-whitez border border-mee4 2xs:w-[48px] 2xs:h-[48px] 5xs:w-[38px] 5xs:h-[38px] w-[34px] h-[34px] rounded-[8px] mr-2 focus:outline-0 text-center me-body18 text-darkgray font-bold">
                            <input type="text" id="fifth" oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                                id="fifth" maxlength="1"
                                class="bg-whitez border border-mee4 2xs:w-[48px] 2xs:h-[48px] 5xs:w-[38px] 5xs:h-[38px] w-[34px] h-[34px] rounded-[8px] mr-2 focus:outline-0 text-center me-body18 text-darkgray font-bold">
                            <input type="text" id="sixth" oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                                id="sixth" maxlength="1"
                                class="bg-whitez border border-mee4 2xs:w-[48px] 2xs:h-[48px] 5xs:w-[38px] 5xs:h-[38px] w-[34px] h-[34px] rounded-[8px] focus:outline-0 text-center me-body18 text-darkgray font-bold">
                        </div>
                        <p class="text-mered me-body16 helvetica-normal mt-[12px] hidden">Wrong code. Please verify
                            your code again. </p>
                        <div class="mt-[12px]">
                            <form id="captcha55Form">
                            <p class="">@lang('labels.log_in_register.resend_code_text1')
                                <span id="countdown"
                                    class="countdown inline-block w-[4.5ch] helvetica-normal me-body16 text-darkgray hidden">00:60</span>@lang('labels.log_in_register.resend_code_text2')
                            </p>

                            <button type="button" id="captcha55"
                                class="g-recaptcha cursor-pointer text-darkgray helvetica-normal hidden underline cus-resend-btn stop-clock resend-code-phone">
                                @lang('labels.log_in_register.resend_code')</button>
                            </form>
                        </div>
                        <div class="w-full">
                            <button data-id="phone"
                                class="submit-btn bg-orangeMediq border-1 rounded-[6px] w-full text-whitez helvetica-normal font-bold me-body18 flex items-center justify-center sm:h-[50px] h-[40px] my-[16px] hover:bg-brightOrangeMediq"
                                disabled="">@lang('labels.basic_info.verify')</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </dialog>
    <dialog component-name="dashboard-ph-verification-code"
        class="hidden lr-popup fixed z-[1001] left-0 top-0 w-full h-full overflow-hidden bg-linear-black items-center justify-center email-verification-code-popup-content">
        <div class="bg-whitez w-full max-w-[408px] md:p-10 p-5 rounded-[12px] text-darkgray relative mx-auto">
            <div class="">
                <button class="lr-successful-popup-close absolute top-[24px] right-[24px]">
                    <img src="{{asset('frontend/img/lr_round-close.svg')}}" alt="close icon">
                </button>

                <div class="helvetica-normal">
                    <h1 class="helvetica-normal me-body26 text-darkgray font-bold">@lang('labels.verify_email')</h1>
                    <p class="me-body18 text-darkgray pb-5">@lang('labels.log_in_register.send_code_to')
                        {{$personalInfo->email}} </p>
                    <div class="">

                        <div class="otp-email-container flex justify-center">
                            <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                                id="email-first" maxlength="1"
                                class="bg-whitez border border-mee4 2xs:w-[48px] 2xs:h-[48px] 5xs:w-[38px] 5xs:h-[38px] w-[34px] h-[34px] rounded-[8px] mr-2 focus:outline-0 text-center me-body18 text-darkgray font-bold">
                            <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                                id="email-sec" maxlength="1"
                                class="bg-whitez border border-mee4 2xs:w-[48px] 2xs:h-[48px] 5xs:w-[38px] 5xs:h-[38px] w-[34px] h-[34px] rounded-[8px] mr-2 focus:outline-0 text-center me-body18 text-darkgray font-bold">
                            <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                                id="email-third" maxlength="1"
                                class="bg-whitez border border-mee4 2xs:w-[48px] 2xs:h-[48px] 5xs:w-[38px] 5xs:h-[38px] w-[34px] h-[34px] rounded-[8px] mr-2 focus:outline-0 text-center me-body18 text-darkgray font-bold">
                            <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                                id="email-fourth" maxlength="1"
                                class="bg-whitez border border-mee4 2xs:w-[48px] 2xs:h-[48px] 5xs:w-[38px] 5xs:h-[38px] w-[34px] h-[34px] rounded-[8px] mr-2 focus:outline-0 text-center me-body18 text-darkgray font-bold">
                            <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                                id="email-fifth" maxlength="1"
                                class="bg-whitez border border-mee4 2xs:w-[48px] 2xs:h-[48px] 5xs:w-[38px] 5xs:h-[38px] w-[34px] h-[34px] rounded-[8px] mr-2 focus:outline-0 text-center me-body18 text-darkgray font-bold">
                            <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'');"
                                id="email-sixth" maxlength="1"
                                class="bg-whitez border border-mee4 2xs:w-[48px] 2xs:h-[48px] 5xs:w-[38px] 5xs:h-[38px] w-[34px] h-[34px] rounded-[8px] focus:outline-0 text-center me-body18 text-darkgray font-bold">
                        </div>
                        <p class="text-mered me-body16 helvetica-normal mt-[12px] hidden">Wrong code. Please verify
                            your code again. </p>
                        <div class="mt-[12px]">
                            <form id="captcha66Form">
                            <p class="">@lang('labels.log_in_register.resend_code_text1')
                                <span id="countdown"
                                    class="countdown inline-block w-[4.5ch] helvetica-normal me-body16 text-darkgray hidden">00:60</span>@lang('labels.log_in_register.resend_code_text2')
                            </p>
                            <button type="button" id="captcha66"
                                class="g-recaptcha cursor-pointer text-darkgray helvetica-normal hidden underline cus-resend-btn stop-clock resend-code-email">
                                @lang('labels.log_in_register.resend_code')</button>
                            </form>
                        </div>
                        <div class="w-full">
                            <button data-id="email"
                                class="submit-btn bg-orangeMediq border-1 rounded-[6px] w-full text-whitez helvetica-normal font-bold me-body18 flex items-center justify-center sm:h-[50px] h-[40px] my-[16px] hover:bg-brightOrangeMediq"
                                disabled="">@lang('labels.basic_info.verify')</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </dialog>
</section>
<section class="member-information-section hidden">
    <div component-name="dashboard-personal-profile-card"
        class="dsp-container personal-profile-container border border-mee4 rounded-xl py-5 px-8 text-darkgray mt-10"
        id="dashboard-personal-profile-card">
        <div class="main-container flex justify-between">
            <div class="main-title-section">
                <div class="me-body23 helvetica-normal font-bold dsp-title">
                    @lang('labels.basic_info.user_profile')
                </div>
                <p> @lang('labels.basic_info.profile_published')</p>
            </div>
            <button class="flex items-center justify-center basic-edit-btn" data-id="dashboard-personal-profile-card">
                <svg class="mr-[10px]" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg')}}">
                    <path
                        d="M19.5244 2.05265C19.2391 2.11127 18.9226 2.25196 18.6959 2.42391C18.5709 2.51379 18.2074 2.85769 17.8831 3.18205L17.2969 3.77215L18.7741 5.24545L20.2474 6.72266L20.8727 6.09738C21.2205 5.75348 21.5644 5.37441 21.6464 5.25717C22.2014 4.42087 22.0958 3.34618 21.3846 2.63494C20.8883 2.13863 20.1927 1.91978 19.5244 2.05265Z"
                        fill="#333333"></path>
                    <path
                        d="M13.066 8.0033C10.3891 10.6842 9.73254 11.3641 9.70127 11.4736C9.68173 11.5478 9.53714 12.2591 9.38082 13.0563C9.18933 14.0176 9.10336 14.5374 9.11899 14.6117C9.15416 14.7484 9.2714 14.8657 9.40818 14.9008C9.55668 14.936 12.5384 14.342 12.6909 14.2482C12.7495 14.2091 14.2775 12.7007 16.083 10.8913L19.3656 7.60469L17.9002 6.13921C17.0951 5.33417 16.4269 4.67373 16.4151 4.67373C16.4034 4.67373 14.8989 6.17438 13.066 8.0033Z"
                        fill="#333333"></path>
                    <path
                        d="M4.0408 5.39511C3.29047 5.53189 2.59485 6.06337 2.25486 6.76289C1.98131 7.32564 1.99303 6.93093 2.00475 13.8167L2.01648 20.0109L2.10245 20.2649C2.23141 20.64 2.45417 20.9918 2.73945 21.2809C3.03255 21.574 3.32173 21.7538 3.70471 21.8867L3.97045 21.9844H10.3092H16.6479L16.9527 21.8867C17.7382 21.6405 18.3556 20.9839 18.594 20.1437C18.6605 19.9093 18.6644 19.6552 18.6644 16.2553V12.617L18.5471 12.4294C18.3752 12.152 18.086 12.0035 17.7733 12.0308C17.4998 12.0543 17.2849 12.1832 17.1324 12.4177L17.023 12.5818L17.0035 16.1772C16.9839 19.4677 16.98 19.7881 16.9175 19.8975C16.8237 20.0695 16.601 20.2532 16.429 20.304C16.3235 20.3352 14.5141 20.343 10.2388 20.3352L4.19712 20.3235L4.04471 20.218C3.96264 20.1594 3.84931 20.046 3.7946 19.964L3.6969 19.8194L3.68517 13.7308C3.67736 7.79459 3.67736 7.63827 3.75161 7.49368C3.7946 7.41552 3.87666 7.30219 3.93919 7.24357C4.18539 7.00518 4.01344 7.01691 7.80416 7.01691C10.4342 7.01691 11.3096 7.00518 11.4307 6.97001C11.6535 6.90358 11.8958 6.64956 11.9583 6.41899C12.0638 6.04774 11.9075 5.65694 11.5792 5.46545L11.3956 5.35603L7.85887 5.34821C5.07641 5.3443 4.26355 5.35212 4.0408 5.39511Z"
                        fill="#333333"></path>
                </svg>
               @lang('labels.check_out.edit')
            </button>
        </div>

        <div class="custom-divider my-5"></div>
        <div>
        <form action="{{ route('dashboard.myacc.basicinfo.fileupload') }}" method="POST" id="file-upload" enctype="multipart/form-data">
            <div class="flex items-baseline justify-start flex-wrap helvetica-normal text-darkgray">
                    <div class="person-detail-card mb-5">
                        <p class="me-body16 mb-[10px]">@lang('labels.basic_info.profile_picture')</p>
                        <div class="text-section">
                            <p class="me-body18 font-bold"><img src="{{$personalInfo->profile_img!=null?asset('storage/customer/'.$personalInfo->profile_img):asset('frontend/img/me-profile-img.svg')}}" alt="profile pic"
                                    class="w-[80px] h-[80px] rounded-full objec-cover preview-img">  <span class="text-mered me-body16 helvetica-normal mt-[12px] hidden" id="file_error"></span></p>
                        </div>
                        <div class="input-section">
                            <div class="profile-update-section relative w-[80px] h-[80px] rounded-full objec-cover">
                                <input class="profile-upload" type="file" accept="image/*" name="file">

                                <img src="{{asset('frontend/img/Profile-pic.png')}}" alt="profile pic"
                                    class="w-[80px] h-[80px] rounded-full objec-cover opacity-75 profile-pic">
                                <button type="button"
                                    class="upload-button absolute top-1/2 left-1/2 translate-x-[-50%] translate-y-[-50%]">
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                        xmlns="http://www.w3.org/2000/svg')}}">
                                        <path
                                            d="M32.5 8.75H28.1688L26.0391 5.55625C25.925 5.38524 25.7704 5.245 25.5892 5.14798C25.408 5.05095 25.2056 5.00012 25 5H15C14.7944 5.00012 14.592 5.05095 14.4108 5.14798C14.2296 5.245 14.075 5.38524 13.9609 5.55625L11.8297 8.75H7.5C6.50544 8.75 5.55161 9.14509 4.84835 9.84835C4.14509 10.5516 3.75 11.5054 3.75 12.5V30C3.75 30.9946 4.14509 31.9484 4.84835 32.6517C5.55161 33.3549 6.50544 33.75 7.5 33.75H32.5C33.4946 33.75 34.4484 33.3549 35.1517 32.6517C35.8549 31.9484 36.25 30.9946 36.25 30V12.5C36.25 11.5054 35.8549 10.5516 35.1517 9.84835C34.4484 9.14509 33.4946 8.75 32.5 8.75ZM33.75 30C33.75 30.3315 33.6183 30.6495 33.3839 30.8839C33.1495 31.1183 32.8315 31.25 32.5 31.25H7.5C7.16848 31.25 6.85054 31.1183 6.61612 30.8839C6.3817 30.6495 6.25 30.3315 6.25 30V12.5C6.25 12.1685 6.3817 11.8505 6.61612 11.6161C6.85054 11.3817 7.16848 11.25 7.5 11.25H12.5C12.7058 11.2501 12.9085 11.1994 13.0901 11.1024C13.2716 11.0054 13.4264 10.865 13.5406 10.6938L15.6687 7.5H24.3297L26.4594 10.6938C26.5736 10.865 26.7284 11.0054 26.9099 11.1024C27.0915 11.1994 27.2942 11.2501 27.5 11.25H32.5C32.8315 11.25 33.1495 11.3817 33.3839 11.6161C33.6183 11.8505 33.75 12.1685 33.75 12.5V30ZM20 13.75C18.6403 13.75 17.311 14.1532 16.1805 14.9086C15.0499 15.6641 14.1687 16.7378 13.6483 17.9941C13.128 19.2503 12.9918 20.6326 13.2571 21.9662C13.5224 23.2999 14.1772 24.5249 15.1386 25.4864C16.1001 26.4478 17.3251 27.1026 18.6588 27.3679C19.9924 27.6332 21.3747 27.497 22.6309 26.9767C23.8872 26.4563 24.9609 25.5751 25.7164 24.4445C26.4718 23.314 26.875 21.9847 26.875 20.625C26.8729 18.8023 26.1479 17.0548 24.8591 15.7659C23.5702 14.4771 21.8227 13.7521 20 13.75ZM20 25C19.1347 25 18.2888 24.7434 17.5694 24.2627C16.8499 23.7819 16.2892 23.0987 15.958 22.2992C15.6269 21.4998 15.5403 20.6201 15.7091 19.7715C15.8779 18.9228 16.2946 18.1433 16.9064 17.5314C17.5183 16.9196 18.2978 16.5029 19.1465 16.3341C19.9951 16.1653 20.8748 16.2519 21.6742 16.583C22.4737 16.9142 23.1569 17.4749 23.6377 18.1944C24.1184 18.9138 24.375 19.7597 24.375 20.625C24.375 21.7853 23.9141 22.8981 23.0936 23.7186C22.2731 24.5391 21.1603 25 20 25Z"
                                            fill="white"></path>
                                    </svg>
                                </button>
                            </div>

                        </div>
                    </div>
                    <div class="person-detail-card">
                        <p class="me-body16 mb-[10px]">@lang('labels.basic_info.username')</p>
                        <div class="text-section">
                            <p class="me-body18 font-bold user_name_content">{{$personalInfo->first_name}}</p>
                        </div>
                        <div class="input-section">
                            <input type="text" id="f_name_1" name="f_name_1"
                                class="max-w-[350px] w-full me-body18 placeholder-text-lightgray rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] mb-2 focus:border-orangeMediq block address-input"
                                value="{{$personalInfo->first_name}}">
                        </div>
                    </div>
            </div>
            <div class="input-section">
                <div class="custom-divider my-5"></div>
                <button type="button" id="btn-img-upload"
                    class="ml-auto max-w-[135px] w-full border border-orangeMediq hover:bg-brightOrangeMediq bg-orangeMediq rounded-[6px] w-full text-whitez helvetica-normal font-bold me-body16 flex items-center justify-center md:h-[50px] h-[40px] personal-detail-save-btn"
                    data-id="dashboard-personal-profile-card">@lang('labels.basic_info.save')</button>

            </div>
         </form>
        </div>
    </div>
</section>
<section class="linked-account-section">
    <div component-name="dashboard-personal-linked-card"
        class="dsp-container border border-mee4 rounded-xl py-5 px-8 text-darkgray mt-10">
        <div class="flex justify-between">
            <div>
                <div class="me-body23 helvetica-normal font-bold dsp-title">
                    @lang('labels.basic_info.linked_account')
                </div>
            </div>
        </div>

        <div class="custom-divider my-5"></div>
        <div>
            <div class="flex items-baseline justify-start flex-wrap helvetica-normal text-darkgray">
                @if($personalInfo->facebook_id != null)
                <div
                    class="flex items-center bg-far rounded-[6px] px-3 htzxs:px-[24px] mb-4 htzxs:mb-0 py-[16px] w-full htzxs:w-1/2">
                    <img src="{{asset('frontend/img/lr-facebook.svg')}}" alt="facebook icon" class="">
                    <div class="helvetica-normal text-darkgray ml-[32px]">
                        <h6 class="me-body18 font-bold">Facebook</h6>
                        <p class="me-body18">{{$personalInfo->first_name}}</p>
                    </div>
                    <p class="flex items-center justify-center w-[24px] h-[24px] rounded-full bg-blueMediq ml-auto">
                        <img src="{{asset('frontend/img/linked-icon.svg')}}" alt="link-icon" class="">
                    </p>
                </div>
                @endif
                @if($personalInfo->google_id != null)
                <div class="flex items-center bg-far rounded-[6px] px-3 htzxs:px-[24px] py-[16px] w-full htzxs:w-1/2">
                    <img src="{{asset('frontend/img/lr-google.svg')}}" alt="google icon" class="">
                    <div class="helvetica-normal text-darkgray ml-[32px]">
                        <h6 class="me-body18 font-bold">Google</h6>
                        <p class="me-body18">{{$personalInfo->first_name}}</p>
                    </div>
                    <p class="flex items-center justify-center w-[24px] h-[24px] rounded-full bg-blueMediq ml-auto">
                        <img src="{{asset('frontend/img/linked-icon.svg')}}" alt="link-icon" class="">
                    </p>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
<section class="member-information-section">
    <div component-name="dashboard-add-member-card"
        class="dsp-container add-member-container border border-mee4 rounded-xl py-5 text-darkgray mt-10">
        <div class="top-member-title main-container flex justify-between px-8">
            <div class="main-title-section">
                <div class="me-body23 helvetica-normal font-bold dsp-title">
                    @lang('labels.basic_info.member_information')
                </div>
                <p>@lang('labels.basic_info.faster_booking')</p>
            </div>
            <button class="flex items-center justify-center edit-member-btn">
                <svg class="mr-[10px]" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg')}}">
                    <path
                        d="M19.5244 2.05265C19.2391 2.11127 18.9226 2.25196 18.6959 2.42391C18.5709 2.51379 18.2074 2.85769 17.8831 3.18205L17.2969 3.77215L18.7741 5.24545L20.2474 6.72266L20.8727 6.09738C21.2205 5.75348 21.5644 5.37441 21.6464 5.25717C22.2014 4.42087 22.0958 3.34618 21.3846 2.63494C20.8883 2.13863 20.1927 1.91978 19.5244 2.05265Z"
                        fill="#333333"></path>
                    <path
                        d="M13.066 8.0033C10.3891 10.6842 9.73254 11.3641 9.70127 11.4736C9.68173 11.5478 9.53714 12.2591 9.38082 13.0563C9.18933 14.0176 9.10336 14.5374 9.11899 14.6117C9.15416 14.7484 9.2714 14.8657 9.40818 14.9008C9.55668 14.936 12.5384 14.342 12.6909 14.2482C12.7495 14.2091 14.2775 12.7007 16.083 10.8913L19.3656 7.60469L17.9002 6.13921C17.0951 5.33417 16.4269 4.67373 16.4151 4.67373C16.4034 4.67373 14.8989 6.17438 13.066 8.0033Z"
                        fill="#333333"></path>
                    <path
                        d="M4.0408 5.39511C3.29047 5.53189 2.59485 6.06337 2.25486 6.76289C1.98131 7.32564 1.99303 6.93093 2.00475 13.8167L2.01648 20.0109L2.10245 20.2649C2.23141 20.64 2.45417 20.9918 2.73945 21.2809C3.03255 21.574 3.32173 21.7538 3.70471 21.8867L3.97045 21.9844H10.3092H16.6479L16.9527 21.8867C17.7382 21.6405 18.3556 20.9839 18.594 20.1437C18.6605 19.9093 18.6644 19.6552 18.6644 16.2553V12.617L18.5471 12.4294C18.3752 12.152 18.086 12.0035 17.7733 12.0308C17.4998 12.0543 17.2849 12.1832 17.1324 12.4177L17.023 12.5818L17.0035 16.1772C16.9839 19.4677 16.98 19.7881 16.9175 19.8975C16.8237 20.0695 16.601 20.2532 16.429 20.304C16.3235 20.3352 14.5141 20.343 10.2388 20.3352L4.19712 20.3235L4.04471 20.218C3.96264 20.1594 3.84931 20.046 3.7946 19.964L3.6969 19.8194L3.68517 13.7308C3.67736 7.79459 3.67736 7.63827 3.75161 7.49368C3.7946 7.41552 3.87666 7.30219 3.93919 7.24357C4.18539 7.00518 4.01344 7.01691 7.80416 7.01691C10.4342 7.01691 11.3096 7.00518 11.4307 6.97001C11.6535 6.90358 11.8958 6.64956 11.9583 6.41899C12.0638 6.04774 11.9075 5.65694 11.5792 5.46545L11.3956 5.35603L7.85887 5.34821C5.07641 5.3443 4.26355 5.35212 4.0408 5.39511Z"
                        fill="#333333"></path>
                </svg>
               @lang('labels.check_out.edit')
            </button>
            <button class="cancel-edit-btn me-body14 helvetica-normal text-darkgray">@lang('labels.order_details.cancel')</button>
        </div>
        <div class="custom-divider add-member-divider mt-5"></div>
        <div class="flex items-start">
            <!-- <div class="member-outside-div max-w-[58.2rem] w-full h-auto overflow-auto py-5"> -->
            <div class="member-outside-div">
                <div class="member-inner-div py-5 w-full h-auto overflow-auto">
                    <!-- <div class="flex items-center justify-start member-card-flex mr-5 w-full max-w-[886px]"></div> -->
                    <div class="flex items-center justify-start member-card-flex mr-5 w-full max-w-[1920px] px-8" id="member-content">
                        @foreach($familyMembers as $data)
                        <div class="cursor-pointer member-card-flex-item w-[282px] p-5 flex flex-col items-center justify-center cusBox rounded-[12px] mr-5 relative"
                            id="member{{$data->id}}" data-id="{{$data->id}}">
                            <button class="edit-customer-profile-btn-content absolute top-[20px] right-[5px] 2xs:right-[20px] mr-[4px]" type="button" data-id="{{$data->id}}">
                                <img src="{{asset('frontend/img/ph_dots-three-bold.svg')}}" alt="three dot icon">
                            </button>
                            <button data-id="member{{$data->id}}" data-relationship-type-id="{{$data->relationship_type_id}}"
                                class="delete-member-card-btn absolute top-[20px] right-[9px] 2xs:right-[5px]">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg')}}">
                                    <path
                                        d="M10.1984 4.80078H13.7984C13.7984 4.32339 13.6088 3.86555 13.2712 3.52799C12.9337 3.19042 12.4758 3.00078 11.9984 3.00078C11.521 3.00078 11.0632 3.19042 10.7256 3.52799C10.3881 3.86555 10.1984 4.32339 10.1984 4.80078ZM8.99844 4.80078C8.99844 4.00513 9.31451 3.24207 9.87712 2.67946C10.4397 2.11685 11.2028 1.80078 11.9984 1.80078C12.7941 1.80078 13.5571 2.11685 14.1198 2.67946C14.6824 3.24207 14.9984 4.00513 14.9984 4.80078H20.9984C21.1576 4.80078 21.3102 4.864 21.4227 4.97652C21.5352 5.08904 21.5984 5.24165 21.5984 5.40078C21.5984 5.55991 21.5352 5.71252 21.4227 5.82505C21.3102 5.93757 21.1576 6.00078 20.9984 6.00078H19.7336L18.3008 18.4136C18.1996 19.291 17.7792 20.1006 17.1199 20.6883C16.4605 21.2759 15.6081 21.6007 14.7248 21.6008H9.27204C8.38878 21.6007 7.53637 21.2759 6.877 20.6883C6.21763 20.1006 5.79732 19.291 5.69604 18.4136L4.26324 6.00078H2.99844C2.83931 6.00078 2.6867 5.93757 2.57417 5.82505C2.46165 5.71252 2.39844 5.55991 2.39844 5.40078C2.39844 5.24165 2.46165 5.08904 2.57417 4.97652C2.6867 4.864 2.83931 4.80078 2.99844 4.80078H8.99844ZM6.88764 18.2768C6.95535 18.8617 7.23569 19.4012 7.67534 19.7929C8.11499 20.1845 8.68326 20.4009 9.27204 20.4008H14.7248C15.3136 20.4009 15.8819 20.1845 16.3215 19.7929C16.7612 19.4012 17.0415 18.8617 17.1092 18.2768L18.5252 6.00078H5.47164L6.88764 18.2768ZM10.1984 9.00078C10.3576 9.00078 10.5102 9.06399 10.6227 9.17652C10.7352 9.28904 10.7984 9.44165 10.7984 9.60078V16.8008C10.7984 16.9599 10.7352 17.1125 10.6227 17.225C10.5102 17.3376 10.3576 17.4008 10.1984 17.4008C10.0393 17.4008 9.88669 17.3376 9.77417 17.225C9.66165 17.1125 9.59844 16.9599 9.59844 16.8008V9.60078C9.59844 9.44165 9.66165 9.28904 9.77417 9.17652C9.88669 9.06399 10.0393 9.00078 10.1984 9.00078ZM14.3984 9.60078C14.3984 9.44165 14.3352 9.28904 14.2227 9.17652C14.1102 9.06399 13.9576 9.00078 13.7984 9.00078C13.6393 9.00078 13.4867 9.06399 13.3742 9.17652C13.2617 9.28904 13.1984 9.44165 13.1984 9.60078V16.8008C13.1984 16.9599 13.2617 17.1125 13.3742 17.225C13.4867 17.3376 13.6393 17.4008 13.7984 17.4008C13.9576 17.4008 14.1102 17.3376 14.2227 17.225C14.3352 17.1125 14.3984 16.9599 14.3984 16.8008V9.60078Z"
                                        fill="#333333"></path>
                                </svg>
                            </button>
                            <p
                                class="bg-mee4 flex items-center justify-center rounded-[50px] py-[4px] px-[12px] me-body14 text-darkgray mr-[10px] self-baseline">
                                {{isset($data->relationship)?@langbind($data->relationship,'name'):''}}</p>
                                <div class="text-section member-name-sector hidden">
                                    <p class="helvetica-normal me-body18 text-darkgray font-bold my-[12px]">
                                        <span>{{$data->first_name}} {{$data->last_name}}</span>
                                    </p>
                                </div>
                                <div class="text-hide-section member-name-sector show">
                                    <p class="helvetica-normal me-body18 text-darkgray font-bold my-[12px]">
                                        <span>{{$data->first_name}} {{$data->last_name}}</span>
                                    </p>
                                </div>
                            <div class="flex items-center justify-center mb-5">
                                <button data-action="record" data-id={{$data->id}}
                                    class="record-action-btn flex items-center justify-center w-[48px] h-[48px] {{isset($data->health_record)?'active':''}}"><img
                                        src="{{asset('frontend/img/medical-record 2.svg')}}" class="w-[32px]"></button>
                                <button data-action="vaccine" data-id={{$data->id}}
                                    class="record-action-btn flex items-center justify-center w-[48px] h-[48px] {{isset($data->vaccination_record)?'active':''}}"><img
                                        src="{{asset('frontend/img/vaccine-gray.svg')}}" class="w-[32px]"></button>
                            </div>
                            <dialog component-name="dashboard-delete-member-popup"
                                class="hidden fixed z-[1001] left-0 top-0 w-full h-full overflow-hidden bg-linear-black items-center justify-center delete-member-popup"
                                id="del-member{{$data->id}}">
                                <div
                                    class="bg-whitez w-full max-w-[620px] md:p-10 p-5 rounded-[12px] text-darkgray relative mx-auto">
                                    <div class="flex items-center justify-center mb-5">
                                        <h3 class="me-body26 helvetica-normal font-bold text-darkgray">@lang("labels.basic_info.delete_member_information")</h3>
                                        <button class="lr-popup-close absolute top-[24px] right-[24px]">
                                            <img src="{{asset('frontend/img/lr_round-close.svg')}}" alt="close icon">
                                        </button>
                                    </div>
                                    <div>
                                        <p class="helvetica-normal text-center justify-center me-body18 text-darkgray">
                                            @lang("labels.basic_info.health_record_delete_confirm")</p>
                                    </div>
                                    <div class="bottom-section mt-[32px]">
                                        <div class="button-section flex items-center justify-center">
                                            <button
                                                class="me-body16 flex items-center justify-center text-darkgray font-bold helvetica-normal border border-darkgray max-w-[135px] w-full h-[50px] rounded-[6px] bg-whitez hover:border-orangeMediq hover:text-orangeMediq mr-[4px] custom-cancel-btn"
                                                data-id="del-member{{$data->id}}">@lang('labels.order_details.cancel')</button>
                                            <button
                                                class="me-body16 flex items-center justify-center text-whitez font-bold helvetica-normal border border-d1 max-w-[135px] w-full h-[50px] rounded-[6px] bg-orangeMediq hover:bg-brightOrangeMediq del-member-confirm-btn-custom"
                                                data-remove="member{{$data->id}}">@lang('labels.log_in_register.confirm')</button>
                                        </div>
                                    </div>
                                </div>
                            </dialog>
                        </div>
                        @endforeach
                        <div class="member-card-flex-item--empty p-[0.02px]">
                        </div>
                    </div>
                </div>
            </div>
            <div class="member-add-section">
                <button
                    class="add-member-btn ml-auto max-w-[282px] h-[190px] w-full my-5 p-5 flex flex-col items-center justify-center rounded-[12px]">
                    <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
                        xmlns="http://www.w3.org/2000/svg')}}">
                        <g clip-path="url(#clip0_10145_53188)">
                            <path opacity="0.5"
                                d="M25.9 21.6V22.1H26.4H35.5V25.9H26.4H25.9V26.4V35.5H22.1V26.4V25.9H21.6H12.5V22.1H21.6H22.1V21.6V12.5H25.9V21.6ZM24 47.5C17.7674 47.5 11.7901 45.0241 7.38299 40.617C2.97589 36.2099 0.5 30.2326 0.5 24C0.5 17.7674 2.97589 11.7901 7.38299 7.38299C11.7901 2.97589 17.7674 0.5 24 0.5C30.2326 0.5 36.2099 2.97589 40.617 7.38299C45.0241 11.7901 47.5 17.7674 47.5 24C47.5 30.2326 45.0241 36.2099 40.617 40.617C36.2099 45.0241 30.2326 47.5 24 47.5ZM24 43.7C29.2248 43.7 34.2355 41.6245 37.93 37.93C41.6245 34.2355 43.7 29.2248 43.7 24C43.7 18.7752 41.6245 13.7645 37.93 10.07C34.2355 6.37553 29.2248 4.3 24 4.3C18.7752 4.3 13.7645 6.37553 10.07 10.07C6.37553 13.7645 4.3 18.7752 4.3 24C4.3 29.2248 6.37553 34.2355 10.07 37.93C13.7645 41.6245 18.7752 43.7 24 43.7Z"
                                fill="#333333" stroke="white"></path>
                        </g>
                        <defs>
                            <clipPath id="clip0_10145_53188">
                                <rect width="48" height="48" fill="white"></rect>
                            </clipPath>
                        </defs>
                    </svg>
                    <p class="mt-[12px]">@lang('labels.basic_info.add_member')</p>
                </button>
            </div>
        </div>
        <dialog component-name="add-member-popup"
            class="hidden fixed z-[1001] left-0 top-0 w-full h-full overflow-hidden bg-linear-black items-center justify-center add-member-popup">
            <div class="bg-whitez w-full max-w-[650px] md:p-10 p-5 rounded-[12px] text-darkgray relative mx-auto">
                <div class="flex items-center justify-between mb-5">
                    <h3
                        class="pr-8 xs:pr-5 htzxs:pr-0 me-body26 leading-normal helvetica-normal font-bold text-darkgray">
                        @lang('labels.basic_info.health_profile')</h3>
                    <button class="lr-popup-close absolute top-[10px] htzxs:top-[24px] right-[24px]">
                        <img src="{{asset('frontend/img/lr_round-close.svg')}}" alt="close icon">
                    </button>
                </div>
                <div class="custom-divider my-5 cus-w-full"></div>
                <div
                    class="dashboard-popup-body helvetica-normal text-darkgray max-h-[400px] pb-[32px] overflow-y-auto">
                    <div class="flex items-center justify-start flex-col">
                        <div
                            class="me-cus-input me-body18 flex items-baseline justify-start flex-col mr-auto htzxs:px-5 family-member-list">
                            @foreach($familyMembers as $data)
                            <label for="mymember{{$data->id}}" class="custom-radio-container mr-[60px] mb-[10px]">
                                <input type="radio" name="my-member[]" class="decide-later" id="mymember{{$data->id}}"
                                    value="{{$data->id}}">
                                <span class="custom-radio-orange"></span>
                                <span
                                    class="ml-10 5xl:ml-[40px] text-darkgray font-bold flex items-center justify-center"><span
                                        class="me-body14 font-normal bg-mee4 rounded-[50px] px-[12px] py-[4px] flex items-center justify-center mr-[10px]">{{isset($data->relationship)?@langbind($data->relationship,'name'):''}}</span>{{$data->first_name}} {{$data->last_name}}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="border border-meA3 p-5 rounded-[4px] new-member-section">
                    <div class="me-cus-input me-body18 flex items-center justify-start">
                        <label for="mymember" class="custom-radio-container md:mr-[60px]">
                            <input type="radio" name="my-member[]" class="decide-later" id="mymember"
                                value="0">
                            <span class="custom-radio-orange"></span>
                            <span
                                class="ml-10 5xl:ml-[40px] text-darkgray flex items-center justify-start flex-col w-full">
                                <span class="font-bold mb-[10px] mr-auto">@lang('labels.basic_info.add_new_member')</span>
                                <span class="me-body16">@lang('labels.basic_info.by_selecting')</span>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="bottom-section">
                    <div class="custom-divider my-5 cus-w-full"></div>
                    <div class="flex flex-wrap htzxs:flex-nowarp items-center justify-center htzxs:justify-end">
                        <p
                            class="w-full htzxs:w-fit mb-2 htzxs:mb-0 me-body16 helvetica-normal text-darkgray mr-auto text-center htzxs:text-left">
                            @lang('labels.basic_info.added_members') ({{count($familyMembers)}}/20)</p>
                        <button
                            class="me-body16 flex items-center justify-center text-darkgray font-bold helvetica-normal border border-darkgray mb-2.5 5xs:mb-0 5xs:max-w-[135px] w-full h-[50px] rounded-[6px] bg-whitez hover:border-orangeMediq hover:text-orangeMediq mr-[4px] member-cancel-btn">@lang('labels.order_details.cancel')</button>
                        <button
                            class="me-body16 flex items-center justify-center text-whitez font-bold helvetica-normal border border-d1 5xs:max-w-[135px] w-full h-[50px] rounded-[6px] bg-orangeMediq hover:bg-brightOrangeMediq"
                            id="member-confirm-btn" disabled>@lang('labels.log_in_register.confirm')</button>
                    </div>
                </div>
            </div>
        </dialog>
        <dialog component-name="member-info-popup"
            class="hidden fixed z-[1001] left-0 top-0 w-full h-full overflow-hidden bg-linear-black items-center justify-center member-info-popup">
            <div class="bg-whitez w-full max-w-[650px] md:p-10 p-5 rounded-[12px] text-darkgray relative mx-auto">
                <div class="flex items-center justify-between mb-5">
                    <h3 class="me-body26 helvetica-normal font-bold text-darkgray" id="member_title">@lang('labels.basic_info.add_a_member')</h3>
                    <button class="lr-popup-close absolute top-[24px] right-[24px]">
                        <img src="{{asset('frontend/img/lr_round-close.svg')}}" alt="close icon">
                    </button>
                </div>
                <p class="me-body20 text-darkgray helvetica-normal mb-[10px] font-bold">@lang('labels.basic_info.relationship')<span class="text-mered-content ml-2">*</span></p>
                <div class="me-check-input flex items-center jusitfy-start flex-wrap">
                    @foreach($relationship as $data)
                    <label for="relationship{{$data->id}}"
                        class="custom-checkbox-container mr-1 last:mr-0 lg:mr-2 lg:last:mr-0 mb-1 lg:mb-2 6xl:mb-[10px]">
                        <input type="radio" name="check-relationship" id="relationship{{$data->id}}" value="{{$data->id}}"
                            class="select-plan select-relationship">
                        <span
                            class="custom-checkbox-btn rounded py-[7px] px-4 outlined-btn-hover flex items-center justify-center">
                            <span class="">{{@langbind($data,'name')}}</span>
                        </span>
                    </label>
                    @endforeach
                </div>
                <div class="text-mered me-body16 helvetica-normal mt-[12px] hidden" id="relationship_type_id_error"></div>
                <div class="custom-divider my-5 cus-w-full"></div>
                <div class="dashboard-popup-body helvetica-normal text-darkgray max-h-[300px] overflow-y-auto">
                    <div>
                        <p class="me-body20 text-darkgray helvetica-normal mb-[10px] font-bold">@lang('labels.basic_info.basic_info')</p>
                        <div class="flex flex-wrap sm:flex-nowrap items-baseline justify-between">
                            <div class="name-text-section w-full sm:w-[49%]">
                                <label class="block me-body16 mb-[10px]">@lang('labels.check_out.first_name')<span class="text-mered-content ml-2">*</span></label>
                                <input type="text" placeholder="@lang('labels.check_out.first_name')" id="f_name"
                                    class="datepicker-class w-full me-body18 placeholder-text-lightgray mb-5 rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-orangeMediq">
                                    <span class="text-mered me-body16 helvetica-normal mt-[6px] hidden" id="f_name_error"></span>
                            </div>
                            <div class="name-text-section w-full sm:w-[49%]">
                                <label class="block me-body16 mb-[10px]">@lang('labels.check_out.last_name')<span class="text-mered-content ml-2">*</span></label>
                                <input type="text" placeholder="@lang('labels.check_out.last_name')" id="l_name"
                                    class="datepicker-class w-full me-body18 placeholder-text-lightgray mb-5 rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-orangeMediq">
                                    <span class="text-mered me-body16 helvetica-normal mt-[6px] hidden" id="l_name_error"></span>
                            </div>
                        </div>

                        <div class="flex flex-wrap sm:flex-nowrap items-baseline justify-between">
                            <div class="name-text-section w-full sm:w-[49%]">
                                <p class="mb-[10px] me-body16 text-darkgray helvetica-normal">@lang('labels.basic_info.gender')</p>
                                <div class="flex items-center justify-between">
                                    <div class="selector-item h-[48px] w-[48%]">
                                        <input type="radio" id="male" name="gender" value="0"
                                            class="selector-item_radio">
                                        <label for="male" class="selector-item_label">@lang('labels.basic_info.male')</label>
                                    </div>
                                    <div class="selector-item h-[48px] w-[48%]">
                                        <input type="radio" id="female" name="gender" value="1"
                                            class="selector-item_radio">
                                        <label for="female" class="selector-item_label">@lang('labels.basic_info.female')</label>
                                    </div>
                                </div>
                            </div>
                            <div class="name-text-section w-full sm:w-[49%] mt-5 sm:mt-0">
                                <label class="block me-body16 mb-[10px]">@lang('labels.basic_info.date_of_birth')</label>
                                <div class="relative">
                                    <input type="text" id="relationship-dob" placeholder="DD/MM/YYYY" class="w-full me-body18 placeholder-text-lightgray mb-5 rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-orangeMediq relationship-dob">
                                    {{-- <input type="text" id="relationship-dob" placeholder="DD/MM/YYYY"
                                        class="datepicker-class w-full me-body18 placeholder-text-lightgray mb-5 rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-orangeMediq"> --}}
                                    {{-- <svg class="relationship-dob-icon absolute top-[38%] right-0 cursor-pointer translate-y-[-50%] translate-x-[-50%]"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg')}}">
                                        <path
                                            d="M19.5 3.375H16.875V2.25C16.875 2.15054 16.8355 2.05516 16.7652 1.98484C16.6948 1.91451 16.5995 1.875 16.5 1.875C16.4005 1.875 16.3052 1.91451 16.2348 1.98484C16.1645 2.05516 16.125 2.15054 16.125 2.25V3.375H7.875V2.25C7.875 2.15054 7.83549 2.05516 7.76517 1.98484C7.69484 1.91451 7.59946 1.875 7.5 1.875C7.40054 1.875 7.30516 1.91451 7.23483 1.98484C7.16451 2.05516 7.125 2.15054 7.125 2.25V3.375H4.5C4.20163 3.375 3.91548 3.49353 3.7045 3.7045C3.49353 3.91548 3.375 4.20163 3.375 4.5V19.5C3.375 19.7984 3.49353 20.0845 3.7045 20.2955C3.91548 20.5065 4.20163 20.625 4.5 20.625H19.5C19.7984 20.625 20.0845 20.5065 20.2955 20.2955C20.5065 20.0845 20.625 19.7984 20.625 19.5V4.5C20.625 4.20163 20.5065 3.91548 20.2955 3.7045C20.0845 3.49353 19.7984 3.375 19.5 3.375ZM4.5 4.125H7.125V5.25C7.125 5.34946 7.16451 5.44484 7.23483 5.51516C7.30516 5.58549 7.40054 5.625 7.5 5.625C7.59946 5.625 7.69484 5.58549 7.76517 5.51516C7.83549 5.44484 7.875 5.34946 7.875 5.25V4.125H16.125V5.25C16.125 5.34946 16.1645 5.44484 16.2348 5.51516C16.3052 5.58549 16.4005 5.625 16.5 5.625C16.5995 5.625 16.6948 5.58549 16.7652 5.51516C16.8355 5.44484 16.875 5.34946 16.875 5.25V4.125H19.5C19.5995 4.125 19.6948 4.16451 19.7652 4.23484C19.8355 4.30516 19.875 4.40054 19.875 4.5V7.875H4.125V4.5C4.125 4.40054 4.16451 4.30516 4.23484 4.23484C4.30516 4.16451 4.40054 4.125 4.5 4.125ZM19.5 19.875H4.5C4.40054 19.875 4.30516 19.8355 4.23484 19.7652C4.16451 19.6948 4.125 19.5995 4.125 19.5V8.625H19.875V19.5C19.875 19.5995 19.8355 19.6948 19.7652 19.7652C19.6948 19.8355 19.5995 19.875 19.5 19.875Z"
                                            fill="#7C7C7C"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M17.0984 3.14844H19.4984C19.8565 3.14844 20.1999 3.29067 20.453 3.54384C20.7062 3.79702 20.8484 4.14039 20.8484 4.49844V19.4984C20.8484 19.8565 20.7062 20.1999 20.453 20.453C20.1999 20.7062 19.8565 20.8484 19.4984 20.8484H4.49844C4.14039 20.8484 3.79702 20.7062 3.54384 20.453C3.29067 20.1999 3.14844 19.8565 3.14844 19.4984V4.49844C3.14844 4.1404 3.29067 3.79702 3.54384 3.54384C3.79702 3.29067 4.1404 3.14844 4.49844 3.14844H6.89844V2.24844C6.89844 2.08931 6.96165 1.9367 7.07417 1.82417C7.1867 1.71165 7.33931 1.64844 7.49844 1.64844C7.65757 1.64844 7.81018 1.71165 7.9227 1.82417C8.03522 1.9367 8.09844 2.08931 8.09844 2.24844V3.14844H15.8984V2.24844C15.8984 2.08931 15.9617 1.9367 16.0742 1.82417C16.1867 1.71165 16.3393 1.64844 16.4984 1.64844C16.6576 1.64844 16.8102 1.71165 16.9227 1.82417C17.0352 1.9367 17.0984 2.08931 17.0984 2.24844V3.14844ZM6.89844 4.34844H4.49844C4.45866 4.34844 4.4205 4.36424 4.39237 4.39237C4.36424 4.4205 4.34844 4.45866 4.34844 4.49844V7.64844H19.6484V4.49844C19.6484 4.45865 19.6326 4.4205 19.6045 4.39237C19.5764 4.36424 19.5382 4.34844 19.4984 4.34844H17.0984V5.24844C17.0984 5.40757 17.0352 5.56018 16.9227 5.6727C16.8102 5.78522 16.6576 5.84844 16.4984 5.84844C16.3393 5.84844 16.1867 5.78522 16.0742 5.6727C15.9617 5.56018 15.8984 5.40757 15.8984 5.24844V4.34844H8.09844V5.24844C8.09844 5.40757 8.03522 5.56018 7.9227 5.6727C7.81018 5.78522 7.65757 5.84844 7.49844 5.84844C7.33931 5.84844 7.1867 5.78522 7.07417 5.6727C6.96165 5.56018 6.89844 5.40757 6.89844 5.24844V4.34844ZM4.49844 19.6484H19.4984C19.5382 19.6484 19.5764 19.6326 19.6045 19.6045C19.6326 19.5764 19.6484 19.5382 19.6484 19.4984V8.84844H4.34844V19.4984C4.34844 19.5382 4.36424 19.5764 4.39237 19.6045C4.4205 19.6326 4.45865 19.6484 4.49844 19.6484ZM19.4984 3.37344C19.7968 3.37344 20.083 3.49196 20.2939 3.70294C20.5049 3.91392 20.6234 4.20007 20.6234 4.49844V19.4984C20.6234 19.7968 20.5049 20.083 20.2939 20.2939C20.083 20.5049 19.7968 20.6234 19.4984 20.6234H4.49844C4.20007 20.6234 3.91392 20.5049 3.70294 20.2939C3.49196 20.083 3.37344 19.7968 3.37344 19.4984V4.49844C3.37344 4.20007 3.49196 3.91392 3.70294 3.70294C3.91392 3.49196 4.20007 3.37344 4.49844 3.37344H7.12344V2.24844C7.12344 2.14898 7.16295 2.0536 7.23327 1.98327C7.3036 1.91295 7.39898 1.87344 7.49844 1.87344C7.59789 1.87344 7.69328 1.91295 7.7636 1.98327C7.83393 2.0536 7.87344 2.14898 7.87344 2.24844V3.37344H16.1234V2.24844C16.1234 2.14898 16.1629 2.0536 16.2333 1.98327C16.3036 1.91295 16.399 1.87344 16.4984 1.87344C16.5979 1.87344 16.6933 1.91295 16.7636 1.98327C16.8339 2.0536 16.8734 2.14898 16.8734 2.24844V3.37344H19.4984ZM4.49844 4.12344C4.39898 4.12344 4.3036 4.16295 4.23327 4.23327C4.16295 4.3036 4.12344 4.39898 4.12344 4.49844V7.87344H19.8734V4.49844C19.8734 4.39898 19.8339 4.3036 19.7636 4.23327C19.6933 4.16295 19.5979 4.12344 19.4984 4.12344H16.8734V5.24844C16.8734 5.34789 16.8339 5.44328 16.7636 5.5136C16.6933 5.58393 16.5979 5.62344 16.4984 5.62344C16.399 5.62344 16.3036 5.58393 16.2333 5.5136C16.1629 5.44328 16.1234 5.34789 16.1234 5.24844V4.12344H7.87344V5.24844C7.87344 5.34789 7.83393 5.44328 7.7636 5.5136C7.69328 5.58393 7.59789 5.62344 7.49844 5.62344C7.39898 5.62344 7.3036 5.58393 7.23327 5.5136C7.16295 5.44328 7.12344 5.34789 7.12344 5.24844V4.12344H4.49844ZM4.49844 19.8734H19.4984C19.5979 19.8734 19.6933 19.8339 19.7636 19.7636C19.8339 19.6933 19.8734 19.5979 19.8734 19.4984V8.62344H4.12344V19.4984C4.12344 19.5979 4.16295 19.6933 4.23327 19.7636C4.3036 19.8339 4.39898 19.8734 4.49844 19.8734Z"
                                            fill="#7C7C7C"></path>
                                    </svg> --}}
                                </div>
                            </div>
                        </div>

                    </div>
                    <div>
                        <p class="me-body20 text-darkgray helvetica-normal mb-[10px] font-bold">@lang('labels.basic_info.id_info')</p>
                        <div class="flex flex-wrap sm:flex-nowrap items-center justify-between">
                            <div class="name-text-section w-full sm:w-[49%]">
                                <div>
                                    <p class="mb-[10px] text-darkgray helvetica-normal me-body16">@lang('labels.basic_info.id_type')</p>
                                    <div class="name-selector-option type-vaccine mb-5">
                                        <input type="hidden" name="nso-name" value="Hong Kong Identity Card" id="vaccine-select1">
                                        <button type="button" class="nso-name-btn flex items-center"><span
                                                class="w-full" id="id_type">@lang('labels.basic_info.hk_card')</span><img src="{{asset('frontend/img/dropdown-icon.svg')}}"
                                                alt="drop icon"></button>
                                        <div class="name-selector-option--dropdown-list relative">
                                            <ul class="nso-dropdown-lists absolute top-0 ">
                                                <li class="nso-dropdown-items" data-value="Hong Kong Identity Card">
                                                    @lang('labels.basic_info.hk_card')
                                                </li>
                                                <li class="nso-dropdown-items"
                                                    data-value="China Resident Identity Card">
                                                    @lang('labels.basic_info.cr_card')
                                                </li>
                                                <li class="nso-dropdown-items" data-value="Passport">@lang('labels.basic_info.passport')</li>
                                                <li class="nso-dropdown-items" data-value="Other">@lang('labels.basic_info.id_type')</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="name-text-section w-full sm:w-[49%]">
                                <label class="block mb-[10px] me-body16">@lang('labels.basic_info.id_number')</label>
                                <input type="text" id="id_number" placeholder="@lang('labels.basic_info.id_number')"
                                    class="w-full me-body18 placeholder-text-lightgray mb-5 rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-orangeMediq">
                                <p class="text-mered me-body16 helvetica-normal mt-[12px] hidden pw-error">invalid name
                                </p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="me-body20 text-darkgray helvetica-normal mb-[10px] font-bold">@lang('labels.basic_info.contact_info')</p>
                        <div class="flex flex-wrap sm:flex-nowrap items-baseline justify-between">
                            <div class="name-text-section w-full sm:w-[49%]">
                                <p class="mb-[10px] me-body16">@lang('labels.log_in_register.phone')</p>
                                <div class="minfo-phone-section w-full">
                                    <div class="flex items-baseline justify-start">
                                        <div class="name-selector-option">
                                            <input type="hidden" name="nso-name" value="+852" id="phone_code">
                                            <button type="button" class="nso-name-btn flex items-center" id="phone_code_btn"><span
                                                    class="w-full">+852</span><img src="{{asset('frontend/img/dropdown-icon.svg')}}"
                                                    alt="drop icon"></button>
                                            <div class="name-selector-option--dropdown-list relative">
                                                <ul class="nso-dropdown-lists absolute top-0 ">
                                                    <li class="nso-dropdown-items active" data-value="+852">+852</li>
                                                    <li class="nso-dropdown-items" data-value="+86">+86</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="minfo-phone-number-section">
                                            <input type="text" id="phone"
                                                class="ml-[4px] me-body18 placeholder-text-lightgray rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] mb-2 focus:border-orangeMediq block"
                                                placeholder="@lang('labels.log_in_register.phone')" value="">
                                            <p class="text-mered me-body16 helvetica-normal mt-[12px] hidden pw-error">
                                                invalid name</p>
                                            <span class="text-mered me-body16 helvetica-normal mt-[6px] hidden" id="phone2_error"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="name-text-section w-full sm:w-[49%]">
                                <label class="block mb-[10px] me-body16">@lang('labels.log_in_register.email')</label>
                                <input type="text" placeholder="@lang('labels.log_in_register.email')" id="email"
                                    class="w-full me-body18 placeholder-text-lightgray mb-5 rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-orangeMediq">
                                <span class="text-mered me-body16 helvetica-normal mt-[6px] hidden" id="email2_error"></span>
                                <p class="text-mered me-body16 helvetica-normal mt-[12px] hidden pw-error">invalid name
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bottom-section">
                    <div class="custom-divider my-5 cus-w-full"></div>
                    <div class="flex items-center justify-end">
                        <button
                            class="me-body16 flex items-center justify-center text-darkgray font-bold helvetica-normal border border-darkgray max-w-[135px] w-full h-[50px] rounded-[6px] bg-whitez hover:border-orangeMediq hover:text-orangeMediq mr-[4px] relationship-cancel-btn">@lang('labels.order_details.cancel')</button>
                        <button
                            class="me-body16 flex items-center justify-center text-whitez font-bold helvetica-normal border border-d1 max-w-[135px] w-full h-[50px] rounded-[6px] border-orangeMediq hover:bg-brightOrangeMediq bg-orangeMediq text-whitez"
                            id="relationship-confirm-btn" data-id="0">@lang('labels.basic_info.add')</button>
                    </div>
                </div>
            </div>
        </dialog>
    </div>
    <dialog component-name="dashboard-health-record-popup"
        class="hidden fixed z-[1001] left-0 top-0 w-full h-full overflow-hidden bg-linear-black items-center justify-center health-record-popup"
        id="hrp-popup">
        <div class="bg-whitez w-full max-w-[650px] md:p-10 p-5 rounded-[12px] text-darkgray relative mx-auto">
            <div class="flex items-center justify-between mb-5">
                <h3 class="me-body26 helvetica-normal font-bold text-darkgray">@lang('labels.basic_info.health_record')</h3>
                <button class="lr-popup-close absolute top-[10px] htzxs:top-[24px] right-[24px]">
                    <img src="{{asset('frontend/img/lr_round-close.svg')}}" alt="close icon">
                </button>
            </div>
            <div class="dashboard-popup-body helvetica-normal text-darkgray max-h-[400px] overflow-y-auto">
                <div class="pb-5">
                    <p class="me-body16 mb-[10px]">@lang('labels.basic_info.blood_type')</p>
                    <div class="name-selector-option select-cus-w-full">
                        <input type="hidden" name="nso-name" value="" id="blood_type">
                        <button type="button" class="nso-name-btn flex items-center"><span
                                class="max-w-[32px] w-full" id="blood_type_text">@lang('labels.basic_info.please_select')</span><img src="{{asset('frontend/img/dropdown-icon.svg')}}"
                                alt="drop icon"></button>
                        <div class="name-selector-option--dropdown-list relative">
                            <ul class="nso-dropdown-lists absolute top-0">
                                @foreach($bloodType as $data)
                                <li class="nso-dropdown-items" data-value="{{@langbind($data,'name')}}" data-id="{{$data->id}}" >{{@langbind($data,"name")}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="pb-5">
                    <p class="me-body16 mb-[10px]">@lang('labels.basic_info.maritals_status')</p>
                    <div class="name-selector-option select-cus-w-full">
                        <input type="hidden" name="nso-name" value="" id="maritial_status">
                        <button type="button" class="nso-name-btn flex items-center"><span
                                class="max-w-[32px] w-full" id="maritial_status_text">@lang('labels.basic_info.please_select')</span><img src="{{asset('frontend/img/dropdown-icon.svg')}}"
                                alt="drop icon"></button>
                        <div class="name-selector-option--dropdown-list relative">
                            <ul class="nso-dropdown-lists absolute top-0 ">
                                @foreach($maritalStatus as $data)
                                <li class="nso-dropdown-items" data-value="{{@langbind($data,'name')}}" data-id="{{$data->id}}" >{{@langbind($data,"name")}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="pb-5 flex items-center justify-between">
                    <div class="health-height-input w-[49%]">
                        <label class="me-body16 mb-[10px]">@lang('labels.basic_info.height_cm')</label>
                        <input type="text" id="height" placeholder="@lang('labels.basic_info.height')"
                            class="w-full me-body18 placeholder-text-lightgray mb-5 rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-orangeMediq">
                    </div>
                    <div class="health-weight-input w-[49%]">
                        <label class="me-body16 mb-[10px]">@lang('labels.basic_info.weight_kg')</label>
                        <input type="text" id="weight" placeholder="@lang('labels.basic_info.weight')"
                            class="w-full me-body18 placeholder-text-lightgray mb-5 rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-orangeMediq">
                    </div>
                </div>
                <div class="drinking-section pb-5">
                    <p class="me-body16 mb-[10px]">@lang('labels.basic_info.drinking')</p>
                    <div class="flex items-center justify-start">
                        <div class="me-cus-input me-body18 flex items-center justify-start">
                            <label for="drinkNo" class="custom-radio-container w-[89px] mr-[20px] 5xs:mr-[60px]">
                                <input type="radio" name="drink-check" class="drinking-option" id="drinkNo"
                                    value="0">
                                <span class="custom-radio-orange"></span>
                                <span class="ml-10 4xl:ml-[30px]">@lang('labels.check_out.no')</span>
                            </label>
                            <label for="drinkYes" class="custom-radio-container w-[89px] mr-[20px] 5xs:mr-[60px]">
                                <input type="radio" name="drink-check" class="drinking-option" id="drinkYes"
                                    value="1">
                                <span class="custom-radio-orange"></span>
                                <span class="ml-10 4xl:ml-[30px]">@lang('labels.check_out.yes')</span>
                            </label>
                        </div>
                    </div>
                    <div class="drinkYes hidden mt-[32px] px-5">
                        <div class="main-alcohol">
                            <p class="me-body14 text-darkgray helvetica-normal mb-[10px]">@lang('labels.basic_info.type_of_alcohol')</p>
                            <div class="me-check-input flex items-center jusitfy-start flex-wrap">
                                @foreach($mainTypeOfAlcohol as $data)
                                <label for="{{@langbind($data,"name")}}" class="custom-checkbox-container mr-1 last:mr-0 lg:mr-2 lg:last:mr-0 mb-1 lg:mb-2 6xl:mb-[10px]">
                                    <input type="radio" name="select-drink" id="{{@langbind($data,"name")}}" value="{{$data->id}}" class="select-drink select-plan">
                                    <span class="custom-checkbox-btn rounded py-[7px] px-4 outlined-btn-hover flex items-center">
                                        <span class="mr-1 lg:mr-2">{{@langbind($data,"name")}}</span>
                                    </span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="amount-alcohol">
                            <p class="me-body14 text-darkgray helvetica-normal mb-[10px]">@lang('labels.basic_info.alcohol_drinking')
                            </p>
                            <div class="me-check-input flex items-center jusitfy-start flex-wrap">
                                @foreach($amountOfAlcoholDrinking as $data)
                                <label for="{{@langbind($data,"name")}}" class="custom-checkbox-container mr-1 last:mr-0 lg:mr-2 lg:last:mr-0 mb-1 lg:mb-2 6xl:mb-[10px]">
                                    <input type="radio" name="select-amount" id="{{@langbind($data,"name")}}" value="{{$data->id}}" class="select-amount select-plan">
                                    <span class="custom-checkbox-btn rounded py-[7px] px-4 outlined-btn-hover flex items-center">
                                        <span class="mr-1 lg:mr-2">{{@langbind($data,"name")}}</span>
                                    </span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="drink-age">
                            <p class="me-body14 text-darkgray helvetica-normal mb-[10px]">@lang('labels.basic_info.drinking_age')</p>
                            <input type="number" id="drinking_age" placeholder="@lang('labels.basic_info.please_drinking_age')"
                                class="w-full me-body16 placeholder-text-lightgray rounded-[4px] border border-meA3 border-t-0 border-l-0 border-r-0 focus:border-orangeMediq">
                        </div>
                    </div>
                </div>
                <div class="smoking-section pb-5">
                    <p class="me-body16 mb-[10px]">@lang('labels.basic_info.smoking')</p>
                    <div class="flex items-center justify-start">
                        <div class="me-cus-input me-body18 flex items-center justify-start">
                            <label for="smokeNo" class="custom-radio-container w-[89px] mr-[20px] 5xs:mr-[60px]">
                                <input type="radio" name="smoke-check" class="smoking-option" id="smokeNo"
                                    value="0">
                                <span class="custom-radio-orange"></span>
                                <span class="ml-10 4xl:ml-[30px]">@lang('labels.check_out.no')</span>
                            </label>
                            <label for="smokeYes" class="custom-radio-container w-[89px] mr-[20px] 5xs:mr-[60px]">
                                <input type="radio" name="smoke-check" class="smoking-option" id="smokeYes"
                                    value="1">
                                <span class="custom-radio-orange"></span>
                                <span class="ml-10 4xl:ml-[30px]">@lang('labels.check_out.yes')</span>
                            </label>
                        </div>
                    </div>
                    <div class="smokeYes hidden mt-[32px] px-5">
                        <div class="smoking-age">
                            <p class="me-body14 text-darkgray helvetica-normal mb-[10px]">@lang('labels.basic_info.smoking_age_year')</p>
                            <input type="number" id="smoking_age" placeholder="@lang('labels.basic_info.please_enter_your_drinking_age_year')"
                                class="w-full me-body16 placeholder-text-lightgray mb-5 rounded-[4px] border border-meA3 border-t-0 border-l-0 border-r-0 focus:border-orangeMediq">
                        </div>
                        <div class="smoking-age">
                            <p class="me-body14 text-darkgray helvetica-normal mb-[10px]">@lang('labels.basic_info.number_of_cigarettes_smoked_per_day_stick')</p>
                            <input type="number" id="no_of_cigarettes_smoked_per_day" placeholder="@lang('labels.basic_info.please_enter_a_number')"
                                class="w-full me-body16 placeholder-text-lightgray mb-5 rounded-[4px] border border-meA3 border-t-0 border-l-0 border-r-0 focus:border-orangeMediq">
                        </div>
                    </div>
                </div>
                <div class="liver-section pb-5">
                    <p class="me-body16 mb-[10px]">@lang('labels.basic_info.liver_function')</p>
                    <div class="flex items-center justify-start">
                        <div class="me-cus-input me-body18 flex items-center justify-start">
                            <label for="liverok" class="custom-radio-container w-[89px] mr-[20px] 5xs:mr-[60px]">
                                <input type="radio" name="liver-check" class="liver-function-option" id="liverok"
                                    value="0">
                                <span class="custom-radio-orange"></span>
                                <span class="ml-10 4xl:ml-[30px]">@lang('labels.basic_info.normal')</span>
                            </label>
                            <label for="livernot" class="custom-radio-container w-[89px] mr-[20px] 5xs:mr-[60px]">
                                <input type="radio" name="liver-check" class="liver-function-option" id="livernot"
                                    value="1">
                                <span class="custom-radio-orange"></span>
                                <span class="ml-10 4xl:ml-[30px]">@lang('labels.basic_info.abnormal')</span>
                            </label>
                        </div>
                    </div>
                    <div class="livernot hidden mt-[32px] px-5">
                        <div class="liver-age">
                            <p class="me-body14 text-darkgray helvetica-normal mb-[10px]">@lang('labels.basic_info.please_input_abnormal_liver_function_index')</p>
                            <input type="number" id="input_abnormal_liver_function_index" placeholder="@lang('labels.basic_info.please_enter_a_number')"
                                class="w-full me-body16 placeholder-text-lightgray rounded-[4px] border border-meA3 border-t-0 border-l-0 border-r-0 focus:border-orangeMediq">
                        </div>
                    </div>
                </div>
                <div class="renal-section pb-5">
                    <p class="me-body16 mb-[10px]">@lang('labels.basic_info.renal_function')</p>
                    <div class="flex items-center justify-start">
                        <div class="me-cus-input me-body18 flex items-center justify-start">
                            <label for="renalok" class="custom-radio-container w-[89px] mr-[20px] 5xs:mr-[60px]">
                                <input type="radio" name="renal-check" class="renal-function-option" id="renalok"
                                    value="0">
                                <span class="custom-radio-orange"></span>
                                <span class="ml-10 4xl:ml-[30px]">@lang('labels.basic_info.normal')</span>
                            </label>
                            <label for="renalnot" class="custom-radio-container w-[89px] mr-[20px] 5xs:mr-[60px]">
                                <input type="radio" name="renal-check" class="renal-function-option" id="renalnot"
                                    value="1">
                                <span class="custom-radio-orange"></span>
                                <span class="ml-10 4xl:ml-[30px]">@lang('labels.basic_info.abnormal')</span>
                            </label>
                        </div>
                    </div>
                    <div class="renalnot hidden mt-[32px] px-5">
                        <div class="renal-age">
                            <p class="me-body14 text-darkgray helvetica-normal mb-[10px]">@lang('labels.basic_info.please_input_abnormal_renal_function_index')</p>
                            <input type="number"  id="input_abnormal_renal_function_index" placeholder="@lang('labels.basic_info.please_enter_a_number')"
                                class="w-full me-body16 placeholder-text-lightgray rounded-[4px] border border-meA3 border-t-0 border-l-0 border-r-0 focus:border-orangeMediq">
                        </div>
                    </div>
                </div>
                <div class="personal-medical-section pb-5">
                    <p class="me-body16 mb-[10px]">@lang('labels.basic_info.personal_medical')</p>
                    <div class="flex items-center justify-start">
                        <div class="me-cus-input me-body18 flex items-center justify-start">
                            <label for="personal-medical-no"
                                class="custom-radio-container w-[89px] mr-[20px] 5xs:mr-[60px]">
                                <input type="radio" name="personal-history-check" class="personal-medical-history-option"
                                    id="personal-medical-no" value="0">
                                <span class="custom-radio-orange"></span>
                                <span class="ml-10 4xl:ml-[30px]">@lang('labels.check_out.no')</span>
                            </label>
                            <label for="personal-medical-yes"
                                class="custom-radio-container w-[89px] mr-[20px] 5xs:mr-[60px]">
                                <input type="radio" name="personal-history-check" class="personal-medical-history-option"
                                    id="personal-medical-yes" value="1">
                                <span class="custom-radio-orange"></span>
                                <span class="ml-10 4xl:ml-[30px]">@lang('labels.check_out.yes')</span>
                            </label>
                        </div>
                    </div>
                    <div class="personal-medical-yes hidden mt-[32px] px-5">
                        <div class="main-history">
                            <div class="me-check-input flex items-center jusitfy-start flex-wrap">
                                @foreach($disease as $data)
                                <label for="personal-history{{$data->id}}"
                                    class="custom-checkbox-container mr-1 last:mr-0 lg:mr-2 lg:last:mr-0 mb-1 lg:mb-2 6xl:mb-[10px]">
                                    <input type="checkbox" name="select-history" id="personal-history{{$data->id}}"
                                        value="{{$data->id}}"  class="select-plan">
                                    <span
                                        class="custom-checkbox-btn rounded py-[7px] px-4 outlined-btn-hover flex items-center justify-center">
                                        <span class="">{{@langbind($data,"name")}}</span>
                                    </span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="personal-history-other hidden">
                            <p class="me-body14 text-darkgray helvetica-normal mb-[10px]">Please enter the name of the
                                disease</p>
                            <input type="text" placeholder="Name of the disease"
                                class="w-full me-body16 placeholder-text-lightgray rounded-[4px] border border-meA3 border-t-0 border-l-0 border-r-0 focus:border-orangeMediq">
                        </div>
                    </div>
                </div>
                <div class="family-medical-section pb-5">
                    <p class="me-body16 mb-[10px]">@lang('labels.basic_info.family_medical')</p>
                    <div class="flex items-center justify-start">
                        <div class="me-cus-input me-body18 flex items-center justify-start">
                            <label for="family-medical-no"
                                class="custom-radio-container w-[89px] mr-[20px] 5xs:mr-[60px]">
                                <input type="radio" name="family-history-check" class="family-medical-history-option"
                                    id="family-medical-no" value="0">
                                <span class="custom-radio-orange"></span>
                                <span class="ml-10 4xl:ml-[30px]">@lang('labels.check_out.no')</span>
                            </label>
                            <label for="family-medical-yes"
                                class="custom-radio-container w-[89px] mr-[20px] 5xs:mr-[60px]">
                                <input type="radio" name="family-history-check" class="family-medical-history-option"
                                    id="family-medical-yes" value="1">
                                <span class="custom-radio-orange"></span>
                                <span class="ml-10 4xl:ml-[30px]">@lang('labels.check_out.yes')</span>
                            </label>
                        </div>
                    </div>
                    <div class="family-medical-yes hidden mt-[32px] px-5">
                        <div class="main-history">
                            <div class="me-check-input flex items-center jusitfy-start flex-wrap">
                                @foreach($disease as $data)
                                <label for="family-history{{$data->id}}"
                                    class="custom-checkbox-container mr-1 last:mr-0 lg:mr-2 lg:last:mr-0 mb-1 lg:mb-2 6xl:mb-[10px]">
                                    <input type="checkbox" name="select-family-history" id="family-history{{$data->id}}"
                                        value="{{$data->id}}" class="select-plan">
                                    <span
                                        class="custom-checkbox-btn rounded py-[7px] px-4 outlined-btn-hover flex items-center justify-center">
                                        <span class="">{{@langbind($data,"name")}}</span>
                                    </span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="personal-history-other hidden">
                            <p class="me-body14 text-darkgray helvetica-normal mb-[10px]">Please enter the name of the
                                disease</p>
                            <input type="text" placeholder="Name of the disease"
                                class="w-full me-body16 placeholder-text-lightgray rounded-[4px] border border-meA3 border-t-0 border-l-0 border-r-0 focus:border-orangeMediq">
                        </div>
                    </div>
                </div>
                <div class="allergies-section">
                    <p class="me-body16 mb-[10px]">@lang('labels.basic_info.allergies')</p>
                    <div class="flex items-center justify-start">
                        <div class="me-cus-input me-body18 flex items-center justify-start">
                            <label for="allergy-no" class="custom-radio-container w-[89px] mr-[20px] 5xs:mr-[60px]">
                                <input type="radio" name="allergy-check" class="allergic-option" id="allergy-no"
                                    value="0">
                                <span class="custom-radio-orange"></span>
                                <span class="ml-10 4xl:ml-[30px]">@lang('labels.check_out.no')</span>
                            </label>
                            <label for="allergy-yes"
                                class="custom-radio-container w-[89px] mr-[20px] 5xs:mr-[60px]">
                                <input type="radio" name="allergy-check" class="allergic-option" id="allergy-yes"
                                    value="1">
                                <span class="custom-radio-orange"></span>
                                <span class="ml-10 4xl:ml-[30px]">@lang('labels.check_out.yes')</span>
                            </label>
                        </div>
                    </div>
                    <div class="allergy-yes hidden mt-[32px] px-5">
                        <div class="main-history">
                            <div class="me-check-input flex items-center jusitfy-start flex-wrap">
                                @foreach($allergicDisease as $data)
                                <label for="allergy{{$data->id}}"
                                    class="custom-checkbox-container mr-1 last:mr-0 lg:mr-2 lg:last:mr-0 mb-1 lg:mb-2 6xl:mb-[10px]">
                                    <input type="checkbox" name="select-allergy" id="allergy{{$data->id}}" value="{{$data->id}}"
                                        class="select-plan">
                                    <span
                                        class="custom-checkbox-btn rounded py-[7px] px-4 outlined-btn-hover flex items-center justify-center">
                                        <span class="">{{@langbind($data,'name')}}</span>
                                    </span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="allergy-history-other hidden">
                            <p class="me-body14 text-darkgray helvetica-normal mb-[10px]">Please enter the name of the
                                allergen</p>
                            <input type="text" placeholder="Name of the Allergen"
                                class="w-full me-body16 placeholder-text-lightgray rounded-[4px] border border-meA3 border-t-0 border-l-0 border-r-0 focus:border-orangeMediq">
                        </div>
                    </div>
                </div>
                <button data-id="0" id="delete-record"
                    class="mx-auto mt-[20px] mb-[10px] border border-darkgray rounded-[50px] flex items-center justify-center w-[131px] h-[42px] me-body16 helvetica-normal font-bold hover:bg-blueMediq hover:border-blueMediq hover:text-whitez">@lang('labels.basic_info.delete_rec')</button>
            </div>
            <div class="bottom-section">
                <div class="custom-divider my-5 cus-w-full"></div>
                <div class="flex flex-wrap htzxs:flex-nowarp items-center justify-center htzxs:justify-end">
                    <button
                        class="me-body16 flex items-center justify-center text-darkgray font-bold helvetica-normal border border-darkgray mb-2.5 5xs:mb-0 5xs:max-w-[135px] w-full h-[50px] rounded-[6px] bg-whitez hover:border-orangeMediq hover:text-orangeMediq mr-[4px] health-cancel-btn"
                        data-parent="hrp-popup">@lang('labels.order_details.cancel')</button>
                    <button
                        class="me-body16 flex items-center justify-center text-whitez font-bold helvetica-normal border border-d1 5xs:max-w-[135px] w-full h-[50px] rounded-[6px] border-orangeMediq hover:bg-brightOrangeMediq bg-orangeMediq"
                        id="health-record-add-btn">@lang('labels.basic_info.add')</button>
                </div>
            </div>
        </div>
    </dialog>
    <dialog component-name="dashboard-vacci-record-popup"
        class="hidden fixed z-[1001] left-0 top-0 w-full h-full overflow-hidden bg-linear-black items-center justify-center vacci-record-popup">
        <div class="bg-whitez w-full max-w-[1096px] lg-custom:p-10 p-6 rounded-[12px] text-darkgray relative mx-auto">
            <div class="flex items-center justify-between">
                <p class="helvetica-normal text-darkgray me-body23 font-bold">@lang('labels.basic_info.vaccination_record')</p>
                <div class="new-member-btn-section">
                    <button class="flex items-center justify-center add-new-record-btn" id="vaccination-new-record" data-id="0">
                        <img src="{{asset('frontend/img/zondicons_add-outline.svg')}}" alt="zondicons_add-outline icon"
                            class="mr-[10px]">
                        <span class="underline text-darkgray me-body18">@lang('labels.basic_info.vaccination_record')</span>
                    </button>
                </div>
            </div>
            <div class="custom-divider cus-w-full mt-5 mb-2.5"></div>
            <div class="vacci-outer-table overflow-x-auto">
                <div class="vacci-inner-table">
                    <table id="vaccination-record-table" class="w-full">
                        <thead>
                            <tr>
                                <th class="w-[20%] xl:w-[200px] pr-[80px] text-left">@lang('labels.basic_info.vaccine_date')</th>
                                <th class="w-[30%] xl:w-[350px] pr-[80px] text-left">@lang('labels.basic_info.vaccine')</th>
                                <th class="w-[25%] xl:w-[150px] pr-[80px] text-left">@lang('labels.basic_info.age')</th>
                                <th class="w-[20%] xl:w-[240px] xl:w-[280px] pr-[80px] text-left">@lang('labels.basic_info.remarks')</th>
                                <th class="w-[5%] xl:w-[35px]"></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </dialog>

    <dialog component-name="add-new-vacci-record-popup"
        class="hidden fixed z-[1001] left-0 top-0 w-full h-full overflow-hidden bg-linear-black items-center justify-center new-vacci-record-popup">
        <div class="bg-whitez w-full max-w-[650px] md:p-10 p-5 rounded-[12px] text-darkgray relative mx-auto">
            <div class="flex items-center justify-between mb-5">
                <h3 class="me-body26 helvetica-normal font-bold text-darkgray" id="vaccine_title">@lang('labels.basic_info.add_new_record')</h3>
                <button class="lr-popup-close absolute top-[10px] htzxs:top-[24px] right-[24px]">
                    <img src="{{asset('frontend/img/lr_round-close.svg')}}" alt="close icon">
                </button>
            </div>
            <div class="custom-divider cus-w-full my-5"></div>
            <div id="new-vaccine-form">
                <div>
                    <p class="text-darkgray helvetica-normal me-body16 mb-[10px]">@lang('labels.basic_info.vaccine_date')</p>
                    <div class="relative">
                        <input type="text" id="vacci-date" placeholder="@lang('labels.basic_info.please_select')"
                            class="datepicker-class w-full me-body18 placeholder-text-darkgray mb-5 rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-orangeMediq">
                        <svg class="absolute top-[38%] right-0 bod-arrow cursor-pointer" width="24"
                            height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg')}}">
                            <path
                                d="M17.9533 9.26636C17.8478 9.03902 17.5829 8.93589 17.3462 9.03199C17.2829 9.05777 16.5329 9.79605 14.6298 11.7086L11.9978 14.3523L9.3681 11.7086C7.46028 9.79371 6.71263 9.05777 6.64935 9.03199C6.60013 9.01324 6.5181 8.99683 6.46653 8.99683C6.12903 8.99683 5.90169 9.33902 6.04231 9.64136C6.1056 9.77496 11.6673 15.3625 11.7986 15.4211C11.9181 15.4773 12.0775 15.4773 12.197 15.4211C12.3283 15.3625 17.89 9.77496 17.9533 9.64136C18.0095 9.52183 18.0095 9.38589 17.9533 9.26636Z"
                                fill="#7C7C7C"></path>
                        </svg>
                    </div>
                </div>
                <div>
                    <p class="text-darkgray helvetica-normal me-body16 mb-[10px]">@lang('labels.basic_info.type_of_vaccine')</p>
                    <div class="name-selector-option type-vaccine mb-5">
                        <input type="hidden" name="nso-name" value="" id="vaccine-select11">
                        <button type="button" class="nso-name-btn flex items-center">
                            <span class="w-full" id="vaccination_type">
                                @lang('labels.basic_info.please_select')
                            </span>
                            <img src="{{asset('frontend/img/dropdown-icon.svg')}}" alt="drop icon"></button>
                        <div class="name-selector-option--dropdown-list relative">
                            <ul class="nso-dropdown-lists absolute top-0 ">
                                @foreach($vaccinationList as $data)
                                <li class="nso-dropdown-items" data-value="{{langbind($data,"name")}}"  data-id="{{$data->id}}">
                                    {{@langbind($data,"name")}}
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div>
                    <p class="text-darkgray helvetica-normal me-body16 mb-[10px]">@lang('labels.basic_info.age')</p>
                    <div class="name-selector-option type-vaccine mb-5">
                        <input type="hidden" name="nso-name" value="" id="vaccine-select2">
                        <button type="button" class="nso-name-btn flex items-center"><span class="w-full" id="age_group_type">@lang('labels.basic_info.please_select')</span><img src="{{asset('frontend/img/dropdown-icon.svg')}}" alt="drop icon"></button>
                        <div class="name-selector-option--dropdown-list relative">
                            <ul class="nso-dropdown-lists absolute top-0 ">
                                @foreach($ageGroupList as $data)
                                <li class="nso-dropdown-items" data-value="{{langbind($data,"name")}}"  data-id="{{$data->id}}">
                                    {{@langbind($data,"name")}}
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div>
                    <p class="text-darkgray helvetica-normal me-body16 mb-[10px]">@lang('labels.basic_info.remarks')</p>
                    <input type="text" placeholder="@lang('labels.basic_info.remarks')" id="remarks"
                        class="w-full me-body18 placeholder-text-lightgray mb-5 rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-orangeMediq">
                </div>
            </div>
            <div class="bottom-section">
                <div class="custom-divider my-5 cus-w-full"></div>
                <div class="flex flex-wrap htzxs:flex-nowarp items-center justify-center htzxs:justify-end">
                    <button
                        class="vacci-cancel-btn me-body16 flex items-center justify-center text-darkgray font-bold helvetica-normal border border-darkgray mb-2.5 5xs:mb-0 5xs:max-w-[135px] w-full h-[50px] rounded-[6px] bg-whitez hover:border-orangeMediq hover:text-orangeMediq mr-[4px]">@lang('labels.order_details.cancel')</button>
                    <button
                        class="me-body16 flex items-center justify-center text-whitez font-bold helvetica-normal border border-d1 5xs:max-w-[135px] w-full h-[50px] rounded-[6px] border-orangeMediq hover:bg-brightOrangeMediq bg-orangeMediq"
                        id="vacci-add-btn">@lang('labels.basic_info.add')</button>
                </div>
            </div>
        </div>
    </dialog>
</section>

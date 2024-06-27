<section class="record-title">
    <div component-name="dashboard-record-title" class="flex items-center justify-between mb-[31px]">
        <p class="helvetica-normal text-darkgray me-body32 font-bold">@lang('labels.lefrmenu.health_profile')</p>
        <div class="new-member-btn-section">
            <button class="add-record-member-btn flex items-center justify-center">
                <img src="{{asset('frontend/img/zondicons_add-outline.svg')}}" alt="zondicons_add-outline icon" class="mr-[10px]">
                <span class="hidden sm:inline-block underline text-darkgray me-body20">@lang('labels.basic_info.add_new_member')</span>
            </button>
        </div>
    </div>
    <dialog component-name="add-member-popup"
        class="hidden fixed z-[1001] left-0 top-0 w-full h-full overflow-hidden bg-linear-black items-center justify-center add-member-popup">
        <div class="bg-whitez w-full max-w-[650px] md:p-10 p-5 rounded-[12px] text-darkgray relative mx-auto">
            <div class="flex items-center justify-between mb-5">
                <h3 class="pr-8 xs:pr-5 htzxs:pr-0 me-body26 leading-normal helvetica-normal font-bold text-darkgray">
                    @lang('labels.basic_info.health_profile')</h3>
                <button class="lr-popup-close absolute top-[10px] htzxs:top-[24px] right-[24px]">
                    <img src="{{asset('frontend/img/lr_round-close.svg')}}" alt="close icon">
                </button>
            </div>
            <div class="custom-divider my-5 cus-w-full"></div>
            <div class="dashboard-popup-body helvetica-normal text-darkgray max-h-[400px] pb-[32px] overflow-y-auto">
                <div class="flex items-center justify-start flex-col">
                    <div class="me-cus-input me-body18 flex items-baseline justify-start flex-col mr-auto htzxs:px-5 family-member-list">
                        @foreach($familyMembers as $data)
                        <label for="mymember{{$data->id}}" class="custom-radio-container mr-[60px] mb-[10px]">
                            <input type="radio" name="my-member[]" class="decide-later" id="mymember{{$data->id}}"
                                value="{{$data->id}}">
                            <span class="custom-radio-orange"></span>
                            <span
                                class="ml-10 5xl:ml-[40px] text-darkgray font-bold flex items-center justify-center"><span
                                    class="me-body14 font-normal bg-mee4 rounded-[50px] px-[12px] py-[4px] flex items-center justify-center mr-[10px]">{{isset($data->relationship)?langbind($data->relationship,'name'):''}}</span>{{$data->first_name}} {{$data->last_name}}</span>
                        </label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="border border-meA3 p-5 rounded-[4px] new-member-section">
                <div class="me-cus-input me-body18 flex items-center justify-start">
                    <label for="mymember" class="custom-radio-container md:mr-[60px]">
                        <input type="radio" name="my-member[]" class="decide-later" id="mymember" value="0">
                        <span class="custom-radio-orange"></span>
                        <span class="ml-10 5xl:ml-[40px] text-darkgray flex items-center justify-start flex-col w-full">
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
                <div class="text-mered me-body16 helvetica-normal mt-[12px] hidden" id="relationship_type_error"></div>
                <div class="custom-divider my-5 cus-w-full"></div>
                <div class="dashboard-popup-body helvetica-normal text-darkgray max-h-[300px] overflow-y-auto">
                    <div>
                        <p class="me-body20 text-darkgray helvetica-normal mb-[10px] font-bold">@lang('labels.basic_info.basic_info')</p>
                        <div class="flex flex-wrap sm:flex-nowrap items-baseline justify-between">
                            <div class="name-text-section w-full sm:w-[49%]">
                                <label class="block me-body16 mb-[10px]">@lang('labels.check_out.first_name')<span class="text-mered-content ml-2">*</span></label>
                                <input type="text" placeholder="@lang('labels.check_out.first_name')" id="f_name"
                                    class="datepicker-class w-full me-body18 placeholder-text-lightgray mb-5 rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-orangeMediq">
                                <p class="text-mered me-body16 helvetica-normal mt-[6px] hidden" id="f_name_error"></p>
                            </div>
                            <div class="name-text-section w-full sm:w-[49%]">
                                <label class="block me-body16 mb-[10px]">@lang('labels.check_out.last_name')<span class="text-mered-content ml-2">*</span></label>
                                <input type="text" placeholder="@lang('labels.check_out.last_name')" id="l_name"
                                    class="datepicker-class w-full me-body18 placeholder-text-lightgray mb-5 rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-orangeMediq">
                                    <p class="text-mered me-body16 helvetica-normal mt-[6px] hidden" id="l_name_error"></p>
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
                        <div class="flex flex-wrap sm:flex-nowrap items-baseline justify-between">
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
                                                    <li class="nso-dropdown-items" data-value="+852">+852</li>
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
                                            <p class="text-mered me-body16 helvetica-normal mt-[6px] hidden" id="phone2_error"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="name-text-section w-full sm:w-[49%]">
                                <label class="block mb-[10px] me-body16">@lang('labels.log_in_register.email')</label>
                                <input type="text" placeholder="@lang('labels.log_in_register.email')" id="email"
                                    class="w-full me-body18 placeholder-text-lightgray mb-5 rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-orangeMediq">
                                <p class="text-mered me-body16 helvetica-normal mt-[6px] hidden" id="email2_error"></p>
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
</section>
<section class="record-section">
    <div component-name="dashboard-members-tab">
        <ul class="flex items-center justify-start members-label-ul w-full overflow-x-auto">
            @foreach($familyMembers as $data)
            <li data-id="{{$data->id}}"
                class="members-label-item cursor-pointer flex items-center justify-center text-darkgray helvetica-normal px-[32px] py-5 {{(isset($data->relationship) && $data->relationship->id==1)?'active':''}}">
                <span
                    class="span-category bg-mee4 flex items-center justify-center rounded-[50px] py-[4px] px-[12px] me-body14 text-darkgray mr-[10px]">{{isset($data->relationship)?langbind($data->relationship,'name'):''}}</span>
                <p class="user-name me-body20 font-bold mr-[10px]">{{$data->first_name}} {{$data->last_name}}</p>
                <button class="edit-customer-profile-btn-content" type="button" data-id={{$data->id}}>
                    <img src="{{asset('frontend/img/ph_dots-three-bold.svg')}}" alt="three dot icon">
                </button>
                {{-- <dialog component-name="member-info-popup"
                    class="fixed z-[1001] left-0 top-0 w-full h-full overflow-hidden bg-linear-black items-center justify-center member-info-popup">
                    <form id="frmEditMember{{$data->id}}" method="post" action="">
                    <div
                        class="bg-whitez w-full max-w-[650px] md:p-10 p-5 rounded-[12px] text-darkgray relative mx-auto">
                        <div class="flex items-center justify-between mb-5">
                            <h3 class="me-body26 helvetica-normal font-bold text-darkgray">Edit a Member</h3>
                            <button class="lr-popup-close absolute top-[24px] right-[24px] relationship-cancel-btn" type="button">
                                <img src="{{asset('frontend/img/lr_round-close.svg')}}" alt="close icon">
                            </button>
                        </div>
                        <p class="me-body20 text-darkgray helvetica-normal mb-[10px] font-bold">@lang('labels.basic_info.relationship')</p>
                        <div class="me-check-input flex items-center jusitfy-start flex-wrap">
                            @foreach($relationship as $rdata)
                            <label for="relationship{{$rdata->id}}"
                                class="custom-checkbox-container mr-1 last:mr-0 lg:mr-2 lg:last:mr-0 mb-1 lg:mb-2 6xl:mb-[10px]">
                                <input type="radio" name="relationship_type_id" id="relationship_type_id" value="{{$rdata->id}}"
                                    class="select-plan select-relationship" {{$rdata->id==$data->relationship_type_id?'checked':''}}>
                                <span
                                    class="custom-checkbox-btn rounded py-[7px] px-4 outlined-btn-hover flex items-center justify-center">
                                    <span class="">{{$rdata->name}}</span>
                                </span>
                            </label>
                            @endforeach
                        </div>
                        <div class="custom-divider my-5 cus-w-full"></div>
                        <div class="dashboard-popup-body helvetica-normal text-darkgray max-h-[300px] overflow-y-auto">
                            <div>
                                <p class="me-body20 text-darkgray helvetica-normal mb-[10px] font-bold">@lang('labels.basic_info.basic_info')</p>
                                <div class="flex flex-wrap sm:flex-nowrap items-center justify-between">
                                    <div class="name-text-section w-full sm:w-[49%]">
                                        <label class="block me-body16 mb-[10px]">@lang('labels.check_out.first_name')</label>
                                        <input type="text" id="" name="first_name" placeholder="@lang('labels.check_out.first_name')" value="{{$data->first_name}}"
                                            class="w-full me-body18 placeholder-text-lightgray mb-5 rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-orangeMediq">
                                    </div>
                                    <div class="name-text-section w-full sm:w-[49%]">
                                        <label class="block me-body16 mb-[10px]">@lang('labels.check_out.last_name')</label>
                                        <input type="text" id="" name="last_name" placeholder="@lang('labels.check_out.last_name')" value="{{$data->last_name}}"
                                            class="w-full me-body18 placeholder-text-lightgray mb-5 rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-orangeMediq">
                                    </div>
                                </div>

                                <div class="flex flex-wrap sm:flex-nowrap items-baseline justify-between">
                                    <div class="name-text-section w-full sm:w-[49%]">
                                        <p class="mb-[10px] me-body16 text-darkgray helvetica-normal">@lang('labels.basic_info.gender')</p>
                                        <div class="flex items-center justify-between">
                                            <div class="selector-item h-[48px] w-[48%]">
                                                <input type="radio" id="male" name="gender" value="0" class="selector-item_radio" {{$data->gender==0?'checked':''}}>
                                                <label for="male" class="selector-item_label">@lang('labels.basic_info.male')</label>
                                            </div>
                                            <div class="selector-item h-[48px] w-[48%]">
                                                <input type="radio" id="female" name="gender" value="1" class="selector-item_radio" {{$data->gender==1?'checked':''}}>
                                                <label for="female" class="selector-item_label">@lang('labels.basic_info.female')</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="name-text-section w-full sm:w-[49%] mt-5 sm:mt-0">
                                        <label class="block me-body16 mb-[10px]">@lang('labels.basic_info.date_of_birth')</label>
                                        <div class="relative">
                                            <input type="text" name="dob" placeholder="DD/MM/YYYY" 
                                                class="w-full me-body18 placeholder-text-lightgray mb-5 rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-orangeMediq relationship-dob">
                                                <button type="button" class="ui-datepicker-trigger">...</button>
                                            <svg class="relationship-dob-icon absolute top-[38%] right-0 cursor-pointer translate-y-[-50%] translate-x-[-50%]"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M19.5 3.375H16.875V2.25C16.875 2.15054 16.8355 2.05516 16.7652 1.98484C16.6948 1.91451 16.5995 1.875 16.5 1.875C16.4005 1.875 16.3052 1.91451 16.2348 1.98484C16.1645 2.05516 16.125 2.15054 16.125 2.25V3.375H7.875V2.25C7.875 2.15054 7.83549 2.05516 7.76517 1.98484C7.69484 1.91451 7.59946 1.875 7.5 1.875C7.40054 1.875 7.30516 1.91451 7.23483 1.98484C7.16451 2.05516 7.125 2.15054 7.125 2.25V3.375H4.5C4.20163 3.375 3.91548 3.49353 3.7045 3.7045C3.49353 3.91548 3.375 4.20163 3.375 4.5V19.5C3.375 19.7984 3.49353 20.0845 3.7045 20.2955C3.91548 20.5065 4.20163 20.625 4.5 20.625H19.5C19.7984 20.625 20.0845 20.5065 20.2955 20.2955C20.5065 20.0845 20.625 19.7984 20.625 19.5V4.5C20.625 4.20163 20.5065 3.91548 20.2955 3.7045C20.0845 3.49353 19.7984 3.375 19.5 3.375ZM4.5 4.125H7.125V5.25C7.125 5.34946 7.16451 5.44484 7.23483 5.51516C7.30516 5.58549 7.40054 5.625 7.5 5.625C7.59946 5.625 7.69484 5.58549 7.76517 5.51516C7.83549 5.44484 7.875 5.34946 7.875 5.25V4.125H16.125V5.25C16.125 5.34946 16.1645 5.44484 16.2348 5.51516C16.3052 5.58549 16.4005 5.625 16.5 5.625C16.5995 5.625 16.6948 5.58549 16.7652 5.51516C16.8355 5.44484 16.875 5.34946 16.875 5.25V4.125H19.5C19.5995 4.125 19.6948 4.16451 19.7652 4.23484C19.8355 4.30516 19.875 4.40054 19.875 4.5V7.875H4.125V4.5C4.125 4.40054 4.16451 4.30516 4.23484 4.23484C4.30516 4.16451 4.40054 4.125 4.5 4.125ZM19.5 19.875H4.5C4.40054 19.875 4.30516 19.8355 4.23484 19.7652C4.16451 19.6948 4.125 19.5995 4.125 19.5V8.625H19.875V19.5C19.875 19.5995 19.8355 19.6948 19.7652 19.7652C19.6948 19.8355 19.5995 19.875 19.5 19.875Z"
                                                    fill="#7C7C7C"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M17.0984 3.14844H19.4984C19.8565 3.14844 20.1999 3.29067 20.453 3.54384C20.7062 3.79702 20.8484 4.14039 20.8484 4.49844V19.4984C20.8484 19.8565 20.7062 20.1999 20.453 20.453C20.1999 20.7062 19.8565 20.8484 19.4984 20.8484H4.49844C4.14039 20.8484 3.79702 20.7062 3.54384 20.453C3.29067 20.1999 3.14844 19.8565 3.14844 19.4984V4.49844C3.14844 4.1404 3.29067 3.79702 3.54384 3.54384C3.79702 3.29067 4.1404 3.14844 4.49844 3.14844H6.89844V2.24844C6.89844 2.08931 6.96165 1.9367 7.07417 1.82417C7.1867 1.71165 7.33931 1.64844 7.49844 1.64844C7.65757 1.64844 7.81018 1.71165 7.9227 1.82417C8.03522 1.9367 8.09844 2.08931 8.09844 2.24844V3.14844H15.8984V2.24844C15.8984 2.08931 15.9617 1.9367 16.0742 1.82417C16.1867 1.71165 16.3393 1.64844 16.4984 1.64844C16.6576 1.64844 16.8102 1.71165 16.9227 1.82417C17.0352 1.9367 17.0984 2.08931 17.0984 2.24844V3.14844ZM6.89844 4.34844H4.49844C4.45866 4.34844 4.4205 4.36424 4.39237 4.39237C4.36424 4.4205 4.34844 4.45866 4.34844 4.49844V7.64844H19.6484V4.49844C19.6484 4.45865 19.6326 4.4205 19.6045 4.39237C19.5764 4.36424 19.5382 4.34844 19.4984 4.34844H17.0984V5.24844C17.0984 5.40757 17.0352 5.56018 16.9227 5.6727C16.8102 5.78522 16.6576 5.84844 16.4984 5.84844C16.3393 5.84844 16.1867 5.78522 16.0742 5.6727C15.9617 5.56018 15.8984 5.40757 15.8984 5.24844V4.34844H8.09844V5.24844C8.09844 5.40757 8.03522 5.56018 7.9227 5.6727C7.81018 5.78522 7.65757 5.84844 7.49844 5.84844C7.33931 5.84844 7.1867 5.78522 7.07417 5.6727C6.96165 5.56018 6.89844 5.40757 6.89844 5.24844V4.34844ZM4.49844 19.6484H19.4984C19.5382 19.6484 19.5764 19.6326 19.6045 19.6045C19.6326 19.5764 19.6484 19.5382 19.6484 19.4984V8.84844H4.34844V19.4984C4.34844 19.5382 4.36424 19.5764 4.39237 19.6045C4.4205 19.6326 4.45865 19.6484 4.49844 19.6484ZM19.4984 3.37344C19.7968 3.37344 20.083 3.49196 20.2939 3.70294C20.5049 3.91392 20.6234 4.20007 20.6234 4.49844V19.4984C20.6234 19.7968 20.5049 20.083 20.2939 20.2939C20.083 20.5049 19.7968 20.6234 19.4984 20.6234H4.49844C4.20007 20.6234 3.91392 20.5049 3.70294 20.2939C3.49196 20.083 3.37344 19.7968 3.37344 19.4984V4.49844C3.37344 4.20007 3.49196 3.91392 3.70294 3.70294C3.91392 3.49196 4.20007 3.37344 4.49844 3.37344H7.12344V2.24844C7.12344 2.14898 7.16295 2.0536 7.23327 1.98327C7.3036 1.91295 7.39898 1.87344 7.49844 1.87344C7.59789 1.87344 7.69328 1.91295 7.7636 1.98327C7.83393 2.0536 7.87344 2.14898 7.87344 2.24844V3.37344H16.1234V2.24844C16.1234 2.14898 16.1629 2.0536 16.2333 1.98327C16.3036 1.91295 16.399 1.87344 16.4984 1.87344C16.5979 1.87344 16.6933 1.91295 16.7636 1.98327C16.8339 2.0536 16.8734 2.14898 16.8734 2.24844V3.37344H19.4984ZM4.49844 4.12344C4.39898 4.12344 4.3036 4.16295 4.23327 4.23327C4.16295 4.3036 4.12344 4.39898 4.12344 4.49844V7.87344H19.8734V4.49844C19.8734 4.39898 19.8339 4.3036 19.7636 4.23327C19.6933 4.16295 19.5979 4.12344 19.4984 4.12344H16.8734V5.24844C16.8734 5.34789 16.8339 5.44328 16.7636 5.5136C16.6933 5.58393 16.5979 5.62344 16.4984 5.62344C16.399 5.62344 16.3036 5.58393 16.2333 5.5136C16.1629 5.44328 16.1234 5.34789 16.1234 5.24844V4.12344H7.87344V5.24844C7.87344 5.34789 7.83393 5.44328 7.7636 5.5136C7.69328 5.58393 7.59789 5.62344 7.49844 5.62344C7.39898 5.62344 7.3036 5.58393 7.23327 5.5136C7.16295 5.44328 7.12344 5.34789 7.12344 5.24844V4.12344H4.49844ZM4.49844 19.8734H19.4984C19.5979 19.8734 19.6933 19.8339 19.7636 19.7636C19.8339 19.6933 19.8734 19.5979 19.8734 19.4984V8.62344H4.12344V19.4984C4.12344 19.5979 4.16295 19.6933 4.23327 19.7636C4.3036 19.8339 4.39898 19.8734 4.49844 19.8734Z"
                                                    fill="#7C7C7C"></path>
                                            </svg>
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
                                                <input type="hidden" name="id_type" value="{{$data->id_type}}" id="vaccine-select1">
                                                <button type="button" class="nso-name-btn flex items-center"><span
                                                        class="w-full">@lang('labels.basic_info.hk_card')</span><img
                                                        src="{{asset('frontend/img/dropdown-icon.svg')}}" alt="drop icon"></button>
                                                <div class="name-selector-option--dropdown-list relative">
                                                    <ul class="nso-dropdown-lists absolute top-0 ">
                                                        <li class="nso-dropdown-items" data-value="@lang('labels.basic_info.hk_card')">
                                                            @lang('labels.basic_info.hk_card')
                                                        </li>
                                                        <li class="nso-dropdown-items" data-value="@lang('labels.basic_info.cr_card')">
                                                            @lang('labels.basic_info.cr_card')
                                                        </li>
                                                        <li class="nso-dropdown-items" data-value="@lang('labels.basic_info.passport')">@lang('labels.basic_info.passport')</li>
                                                        <li class="nso-dropdown-items" data-value="@lang('labels.basic_info.id_type')">@lang('labels.basic_info.id_type')</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="name-text-section w-full sm:w-[49%]">
                                        <label class="block mb-[10px] me-body16">@lang('labels.basic_info.id_number')</label>
                                        <input type="text" name="id_number" placeholder="@lang('labels.basic_info.id_number')" value="{{$data->id_number}}"
                                            class="w-full me-body18 placeholder-text-lightgray mb-5 rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-orangeMediq">
                                        <p class="text-mered me-body16 helvetica-normal mt-[12px] hidden pw-error">
                                            invalid name</p>
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
                                                    <input type="hidden" name="phone_code" value="">
                                                    <button type="button" class="nso-name-btn flex items-center"><span
                                                            class="w-full">{{substr($data->phone,0,4)}}</span><img src="{{asset('frontend/img/dropdown-icon.svg')}}"
                                                            alt="drop icon"></button>
                                                    <div class="name-selector-option--dropdown-list relative">
                                                        <ul class="nso-dropdown-lists absolute top-0 ">
                                                            <li class="nso-dropdown-items" data-value="+852">+852</li>
                                                            <li class="nso-dropdown-items" data-value="+522">+522</li>
                                                            <li class="nso-dropdown-items" data-value="+362">+362</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="minfo-phone-number-section">
                                                    <input type="text" name="phone"
                                                        class="ml-[4px] me-body18 placeholder-text-lightgray rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] mb-2 focus:border-orangeMediq block"
                                                        placeholder="@lang('labels.log_in_register.phone')" value="{{substr($data->phone,4)}}">
                                                    <p
                                                        class="text-mered me-body16 helvetica-normal mt-[12px] hidden pw-error">
                                                        invalid name</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="name-text-section w-full sm:w-[49%]">
                                        <label class="block mb-[10px] me-body16">@lang('labels.log_in_register.email')</label>
                                        <input type="text" placeholder="@lang('labels.log_in_register.email')" value="{{$data->email}}" name="email"
                                            class="w-full me-body18 placeholder-text-lightgray mb-5 rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-orangeMediq">
                                        <p class="text-mered me-body16 helvetica-normal mt-[12px] hidden pw-error">
                                            invalid name</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bottom-section">
                            <div class="custom-divider my-5 cus-w-full"></div>
                            <div class="flex items-center justify-end">
                                <input type="hidden" name="id" value="{{$data->id}}">
                                <button type="button"
                                    class="me-body16 flex items-center justify-center text-darkgray font-bold helvetica-normal border border-darkgray max-w-[135px] w-full h-[50px] rounded-[6px] bg-whitez hover:border-orangeMediq hover:text-orangeMediq mr-[4px] relationship-cancel-btn">@lang('labels.order_details.cancel')</button>
                                <button data-id="{{$data->id}}" type="button"
                                    class="relationship-confirm-btn me-body16 flex items-center justify-center text-whitez font-bold helvetica-normal border border-d1 max-w-[135px] w-full h-[50px] rounded-[6px] border-orangeMediq hover:bg-brightOrangeMediq bg-orangeMediq text-whitez"
                                    id="" >@lang('labels.basic_info.add')</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </dialog> --}}
            </li>
            @endforeach

        </ul>
    </div>
    <div component-name="dashboard-members-tab-content" class="members-tab-content">

        <div class="py-5 px-[32px] members-content " id="record1">
            <div component-name="dashboard-subtitle" class="mb-5">
                <h4 class="helvetica-normal font-bold text-darkgray me-body23">@lang('labels.basic_info.record')</h4>
            </div>
            <div class="record-flex flex flex-wrap htzxs:flex-nowrap items-center justify-start">
                @php
                    $checkHealthRecord = false;
                    $checkVaccinationRecord = false;
                    foreach($vaccinationRecordList as $data) {
                        if($data->relationship_type_id==1) {
                            $checkVaccinationRecord = true;
                            break;
                        }
                    }
                    foreach($healthRecordList as $data) {
                        if($data->relationship_type_id==1) {
                            $checkHealthRecord = true;
                            break;
                        }
                    }
                    
                @endphp
                <div component-name="dashobard-record-card" data-action="record"
                    class="{{$checkHealthRecord==true?'active':''}} record-action-btn-content p-5 mr-5 last:mr-0 w-[267px] h-[190px] flex flex-col items-center justify-center record-card text-darkgray helvetica-normal cursor-pointer healthRe"
                    onclick="filterFunc('healthRe')">
                    <img src="{{asset('frontend/img/medical-record 2.svg')}}" class="mb-5">
                    <h6 class="me-body18 font-bold text-center">@lang('labels.basic_info.health_record')</h6>
                </div>

                <div component-name="dashobard-record-card" data-action="vaccine"
                    class="{{$checkVaccinationRecord==true?'active':''}} record-action-btn-content p-5 mr-5 last:mr-0 w-[267px] h-[190px] flex flex-col items-center justify-center record-card text-darkgray helvetica-normal cursor-pointer vacciRe"
                    onclick="filterFunc('vacciRe')">
                    <img src="{{asset('frontend/img/vaccine-gray.svg')}}" class="mb-5">
                    <h6 class="me-body18 font-bold text-center">@lang('labels.basic_info.vaccination_record')</h6>
                </div>

            </div>
            <div class="custom-divider my-5 health-divider"></div>
            <div class="record-pdf-section">
                <div component-name="me-dashboard-wishlist-tabs" class="wishlist-tabs">
                    <div class="dc-container flex items-center justify-between pt-[36px]">
                        <ul class="flex justify-start items-center">

                            <li class="record-list list-item cursor-pointer px-[10px] mr-[20px] lg:mr-[32px] me-body20 helvetica-normal text-darkgray active"
                                data-id="#bcRecord"><span class="pb-[2px]">@lang('labels.basic_info.body_check_record')</span></li>

                            <li class="record-list list-item cursor-pointer px-[10px] mr-[20px] lg:mr-[32px] me-body20 helvetica-normal text-darkgray "
                                data-id="#medicalRecord"><span class="pb-[2px]">@lang('labels.basic_info.medical_record')</span></li>

                        </ul>
                        <a href="" class="dc-link underline text-darkgray me-body20 helvetica-normal hidden"></a>
                    </div>
                </div>
                <div class="me-dashboard-content mt-[32px]">
                    <div id="bcRecord" class="record-small-card">
                        @foreach($recordList as $data)
                        @if($data->relationship_type_id==1 && $data->report_type==1)
                        <div component-name="dashboard-pdf-card" class="p-[20px] htzxs:py-[25px] htzxs:px-[30px] cursor-pointer record-pdf">
                            <div class="flex items-start justify-start relative">
                                <button data-modal-id="bc-edit-record" id="{{$data->id}}" class="edit-report-btn-content absolute top-[-10px] right-[-10px] htzxs:top-0 htzxs:right-0 rotate-90 htzxs:rotate-0">
                                    <img src="{{asset('frontend/img/ph_dots-three-bold.svg')}}" alt="three dot icon">
                                </button>
                                <div class="pdf-image w-[48px]">
                                    <img src="{{asset('frontend/img/bxs_file-pdf.svg')}}" alt="pdf icon">
                                </div>
                                <div class="pl-3 helvetica-normal text-darkgray pdf-description">
                                    <h6 class="me-body20 font-bold">{{$data->report_name}}</h6>
                                    <p class="me-body14 text-meA3 mb-5">@lang('labels.basic_info.date_of_report') : {{$data->report_date}}</p>
                                    <p class="me-body16">{{$data->remarks}}</p>
                                </div>
                            </div>
                        </div><br/>
                        @endif
                        @endforeach
                        <button
                            class="mt-5 max-w-full htzxs:max-w-[179px] w-full border border-orangeMediq hover:bg-whitez hover:text-orangeMediq bg-orangeMediq rounded-[6px] w-full text-whitez helvetica-normal font-bold me-body16 flex items-center justify-center md:h-[50px] h-[40px] add-new-report-btn"
                            data-id="bcRecord" data-family-member-id="">@lang('labels.basic_info.add_new_report')
                        </button>
                            <dialog component-name="dashboard-pdf-edit-upload"
                            class="fixed z-[1001] left-0 top-0 w-full h-full overflow-hidden bg-linear-black items-center justify-center pdf-edit-upload-popup"
                            id="bc-edit-record">
                            <div
                                class="bg-whitez w-full max-w-[650px] md:p-10 p-5 rounded-[12px] text-darkgray relative mx-auto">
                                <form action="{{ route('dashboard.myacc.healthprofile.fileupload') }}" method="POST" id="bc-edit-record-form" enctype="multipart/form-data">
                                <div class="flex items-center justify-between mb-5">
                                    <h3
                                        class="me-body23 helvetica-normal font-bold text-darkgray flex items-center justify-start">
                                        @lang('labels.basic_info.edit_report_information')
                                        <div
                                            class="ml-2 plan-tooltip-wrapper flex items-center me-body18 mr-4 xl:mr-5 report-tooltip">
                                            <img src="{{asset('frontend/img/i-icon.svg')}}" alt="i icon">
                                            <div class="plan-tooltip me-body16 text-darkgray">
                                                <p class="">
                                                    @lang('labels.basic_info.pdf_file_size')
                                                </p>
                                            </div>
                                        </div>
                                    </h3>
                                    <button type="button" class="lr-popup-close absolute top-[24px] right-[24px]">
                                        <img src="{{asset('frontend/img/lr_round-close.svg')}}" alt="close icon">
                                    </button>
                                </div>
                                <div>
                                    <input type="hidden" name="edit-report-id" value="1">
                                    <div class="">
                                        <label class="mb-2.5 helvetica-normal me-body16 text-darkgray">@lang('labels.basic_info.report_name')<span class="text-mered-content ml-2">*</span></label>
                                        <input type="text" name="report_name" placeholder="@lang('labels.basic_info.report_name')"
                                            class="w-full me-body18 placeholder-text-lightgray mb-5 rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-orangeMediq">
                                    </div>
                                    <div class="relative">
                                        <label class="mb-2.5 helvetica-normal me-body16 text-darkgray">@lang('labels.basic_info.report_date')</label>
                                        <input type="text" placeholder="DD/MM/YYYY" name="report_date"
                                            class="w-full me-body18 placeholder-text-lightgray mb-5 rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-orangeMediq edit-pdf-datepicker "
                                            id="dp1695629697796">
                                        <svg class="absolute top-[52%] right-0 rd-arrow cursor-pointer" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M17.9533 9.26636C17.8478 9.03902 17.5829 8.93589 17.3462 9.03199C17.2829 9.05777 16.5329 9.79605 14.6298 11.7086L11.9978 14.3523L9.3681 11.7086C7.46028 9.79371 6.71263 9.05777 6.64935 9.03199C6.60013 9.01324 6.5181 8.99683 6.46653 8.99683C6.12903 8.99683 5.90169 9.33902 6.04231 9.64136C6.1056 9.77496 11.6673 15.3625 11.7986 15.4211C11.9181 15.4773 12.0775 15.4773 12.197 15.4211C12.3283 15.3625 17.89 9.77496 17.9533 9.64136C18.0095 9.52183 18.0095 9.38589 17.9533 9.26636Z"
                                                fill="#7C7C7C"></path>
                                        </svg>
                                    </div>
                                    <div class="">
                                        <label class="mb-2.5 helvetica-normal me-body16 text-darkgray">@lang('labels.basic_info.remarks')</label>
                                        <textarea name="remarks" id="remarks" cols="5" rows="3"
                                            class="me-body18 helvetica-normal w-full border border-meA3 rounded-[4px] text-meA3 p-5"
                                            placeholder="@lang('labels.basic_info.add') @lang('labels.basic_info.remarks')"></textarea>
                                    </div>
                                    <div class="uploaded-file-section mb-5">
                                        <div
                                            class="flex items-center justify-start border border-meA3 rounded-[6px] mb-5 px-[30px] py-[25px]">
                                            <div class="pdf-image w-[48px]">
                                                <img src="{{asset('frontend/img/bxs_file-pdf.svg')}}" alt="pdf icon">
                                            </div>
                                            <div class="pl-3 helvetica-normal text-darkgray pdf-description">
                                                <h6 class="me-body20 font-bold" id="report_name">2021 Body Check Report</h6>
                                            </div>
                                        </div>
                                        <button data-id="" type="button"
                                            class="delete-record-btn-content max-w-[131px] w-full h-[42px] rounded-[50px] bg-whitez border border-darkgray text-darkgray me-body16 helvetica-normal flex items-center justify-center  hover:bg-blueMediq hover:border-blueMediq hover:text-whitez">
                                            @lang('labels.basic_info.delete_record')
                                        </button>
                                    </div>
                                    <div class="flex items-center justify-end">
                                        <input type="hidden" name="record_id" value="0">
                                        <input type="hidden" name="family_member_id" value="">
                                        <input type="hidden" name="report_type" value="">
                                        <button type="button"
                                            class="mr-[10px] text-darkgray border border-darkgray rounded-[6px] bg-whitez flex items-center justify-center h-[50px] max-w-[135px] w-full me-body16 font-bold helvetica-normal cursor-pointer hover:border-orangeMediq hover:text-orangeMediq report-cancel-btn transition">@lang('labels.order_details.cancel')</button>
                                        <button type="button" id="btnUpload" data-form-id="bc-edit-record-form"
                                            class="border border-meA3 rounded-[6px] bg-meA3 flex items-center justify-center h-[50px] max-w-[135px] w-full me-body16 font-bold helvetica-normal text-whitez cursor-pointer hover:bg-orangeMediq hover:border-orangeMediq transition">@lang('labels.product_detail.save')</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </dialog>

                        <dialog component-name="me-comfirm-popup"
                            class="mcpopup-container fixed z-[1001] left-0 top-0 w-full h-full overflow-hidden bg-linear-black items-center justify-center">
                            <div
                                class="bg-whitez w-full max-w-[620px] md:p-10 p-5 rounded-[12px] text-darkgray relative mx-auto">
                                <input type="hidden" name="remove-pdf-id" class="remove-pdf-id">
                                <div class="flex items-center justify-between mb-5">
                                    <button class="lr-popup-close absolute top-[24px] right-[24px]">
                                        <img src="{{asset('frontend/img/lr_round-close.svg')}}" alt="close icon">
                                    </button>
                                </div>
                                <div>
                                    <h3
                                        class="helvetica-normal font-bold me-body20 text-center text-darkgray mb-[20px]">
                                        @lang('labels.basic_info.delete_health_record')
                                    </h3>
                                    <p class="helvetica-normal me-body18 text-center text-darkgray ">
                                        @lang('labels.basic_info.health_record_delete_confirm')
                                    </p>
                                    <div class="flex items-center justify-center mt-[32px]">
                                        <button
                                            class="mr-[10px] text-darkgray border border-darkgray rounded-[6px] bg-whitez flex items-center justify-center h-[50px] max-w-[135px] w-full me-body16 font-bold helvetica-normal cursor-pointer hover:border-orangeMediq hover:text-orangeMediq record-cancel-btn transition">@lang('labels.order_details.cancel')</button>
                                        <button type="button"
                                            class="border border-orangeMediq rounded-[6px] bg-orangeMediq flex items-center justify-center h-[50px] max-w-[135px] w-full me-body16 font-bold helvetica-normal text-whitez cursor-pointer hover:bg-brightOrangeMediq transition record-delete-confirm-btn">@lang('labels.log_in_register.confirm')</button>
                                    </div>
                                </div>
                            </div>
                        </dialog>
                    </div>
                    <div id="medicalRecord" class="record-small-card hidden">
                        <button class="mt-5 max-w-full htzxs:max-w-[179px] w-full border border-orangeMediq hover:bg-whitez hover:text-orangeMediq bg-orangeMediq rounded-[6px] w-full text-whitez helvetica-normal font-bold me-body16 flex items-center justify-center md:h-[50px] h-[40px] add-new-report-btn"
                            data-id="medicalRecord" data-family-member-id="">@lang('labels.basic_info.add_new_report')
                        </button>
                        <dialog component-name="dashboard-pdf-edit-upload"
                            class="fixed z-[1001] left-0 top-0 w-full h-full overflow-hidden bg-linear-black items-center justify-center pdf-edit-upload-popup"
                            id="medical-edit-record">
                            <div
                                class="bg-whitez w-full max-w-[650px] md:p-10 p-5 rounded-[12px] text-darkgray relative mx-auto">
                                <form action="{{ route('dashboard.myacc.healthprofile.fileupload') }}" method="POST" id="medical-edit-record-form" enctype="multipart/form-data">
                                <div class="flex items-center justify-between mb-5">
                                    <h3
                                        class="me-body23 helvetica-normal font-bold text-darkgray flex items-center justify-start">
                                        @lang('labels.basic_info.edit_report_information')
                                        <div
                                            class="ml-2 plan-tooltip-wrapper flex items-center me-body18 mr-4 xl:mr-5 report-tooltip">
                                            <img src="{{asset('frontend/img/i-icon.svg')}}" alt="i icon">
                                            <div class="plan-tooltip me-body16 text-darkgray">
                                                <p class="">
                                                    @lang('labels.basic_info.pdf_file_size')
                                                </p>
                                            </div>
                                        </div>
                                    </h3>
                                    <button class="lr-popup-close absolute top-[24px] right-[24px]">
                                        <img src="{{asset('frontend/img/lr_round-close.svg')}}" alt="close icon">
                                    </button>
                                </div>
                                <div>
                                    <input type="hidden" name="edit-report-id" value="1">
                                    <div class="">
                                        <label class="mb-2.5 helvetica-normal me-body16 text-darkgray">@lang('labels.basic_info.report_name')<span class="text-mered-content ml-2">*</span></label>
                                        <input type="text" name="report_name" placeholder="@lang('labels.basic_info.report_name')"
                                            class="w-full me-body18 placeholder-text-lightgray mb-5 rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-orangeMediq">
                                    </div>
                                    <div class="relative">
                                        <label class="mb-2.5 helvetica-normal me-body16 text-darkgray">@lang('labels.basic_info.report_date')</label>
                                        <input type="text" placeholder="DD/MM/YYYY" name="report_date"
                                            class="w-full me-body18 placeholder-text-lightgray mb-5 rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-orangeMediq edit-pdf-datepicker "
                                            id="dp1695629697797">
                                        <svg class="absolute top-[52%] right-0 rd-arrow cursor-pointer" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M17.9533 9.26636C17.8478 9.03902 17.5829 8.93589 17.3462 9.03199C17.2829 9.05777 16.5329 9.79605 14.6298 11.7086L11.9978 14.3523L9.3681 11.7086C7.46028 9.79371 6.71263 9.05777 6.64935 9.03199C6.60013 9.01324 6.5181 8.99683 6.46653 8.99683C6.12903 8.99683 5.90169 9.33902 6.04231 9.64136C6.1056 9.77496 11.6673 15.3625 11.7986 15.4211C11.9181 15.4773 12.0775 15.4773 12.197 15.4211C12.3283 15.3625 17.89 9.77496 17.9533 9.64136C18.0095 9.52183 18.0095 9.38589 17.9533 9.26636Z"
                                                fill="#7C7C7C"></path>
                                        </svg>
                                    </div>
                                    <div class="">
                                        <label class="mb-2.5 helvetica-normal me-body16 text-darkgray">@lang('labels.basic_info.remarks')</label>
                                        <textarea name="remarks" id="remarks" cols="5" rows="3"
                                            class="me-body18 helvetica-normal w-full border border-meA3 rounded-[4px] text-meA3 p-5"
                                            placeholder="@lang('labels.basic_info.add') @lang('labels.basic_info.remarks')"></textarea>
                                    </div>
                                    <div class="uploaded-file-section mb-5">
                                        <div
                                            class="flex items-center justify-start border border-meA3 rounded-[6px] mb-5 px-[30px] py-[25px]">
                                            <div class="pdf-image w-[48px]">
                                                <img src="{{asset('frontend/img/bxs_file-pdf.svg')}}" alt="pdf icon">
                                            </div>
                                            <div class="pl-3 helvetica-normal text-darkgray pdf-description">
                                                <h6 class="me-body20 font-bold" id="report_name"></h6>
                                            </div>
                                        </div>
                                        <button data-id="" type="button"
                                            class="delete-record-btn-content max-w-[131px] w-full h-[42px] rounded-[50px] bg-whitez border border-darkgray text-darkgray me-body16 helvetica-normal flex items-center justify-center hover:bg-blueMediq hover:border-blueMediq hover:text-whitez">
                                            @lang('labels.basic_info.delete_record')
                                        </button>
                                    </div>
                                    <div class="flex items-center justify-end">
                                        <input type="hidden" name="record_id" value="0">
                                        <input type="hidden" name="family_member_id" value="">
                                        <input type="hidden" name="report_type" value="">
                                        <button type="button"
                                            class="mr-[10px] text-darkgray border border-darkgray rounded-[6px] bg-whitez flex items-center justify-center h-[50px] max-w-[135px] w-full me-body16 font-bold helvetica-normal cursor-pointer hover:border-orangeMediq hover:text-orangeMediq report-cancel-btn transition">@lang('labels.order_details.cancel')</button>
                                        <button type="button" id="btnUpload" data-form-id="medical-edit-record-form"
                                            class="border border-meA3 rounded-[6px] bg-meA3 flex items-center justify-center h-[50px] max-w-[135px] w-full me-body16 font-bold helvetica-normal text-whitez cursor-pointer hover:bg-orangeMediq hover:border-orangeMediq transition">@lang('labels.product_detail.save')</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </dialog>

                        <dialog component-name="me-comfirm-popup"
                            class="mcpopup-container fixed z-[1001] left-0 top-0 w-full h-full overflow-hidden bg-linear-black items-center justify-center">
                            <div
                                class="bg-whitez w-full max-w-[620px] md:p-10 p-5 rounded-[12px] text-darkgray relative mx-auto">
                                <input type="hidden" name="remove-pdf-id" class="remove-pdf-id">
                                <div class="flex items-center justify-between mb-5">
                                    <button class="lr-popup-close absolute top-[24px] right-[24px]">
                                        <img src="{{asset('frontend/img/lr_round-close.svg')}}" alt="close icon">
                                    </button>
                                </div>
                                <div>
                                    <h3
                                        class="helvetica-normal font-bold me-body20 text-center text-darkgray mb-[20px]">
                                        @lang("labels.basic_info.delete_health_record")
                                        </h3>
                                    <p class="helvetica-normal me-body18 text-center text-darkgray ">
                                        @lang("labels.basic_info.health_record_delete_confirm")
                                    </p>
                                    <div class="flex items-center justify-center mt-[32px]">
                                        <button
                                            class="mr-[10px] text-darkgray border border-darkgray rounded-[6px] bg-whitez flex items-center justify-center h-[50px] max-w-[135px] w-full me-body16 font-bold helvetica-normal cursor-pointer hover:border-orangeMediq hover:text-orangeMediq record-cancel-btn transition">@lang("labels.order_details.cancel")</button>
                                        <button type="button"
                                            class="border border-orangeMediq rounded-[6px] bg-orangeMediq flex items-center justify-center h-[50px] max-w-[135px] w-full me-body16 font-bold helvetica-normal text-whitez cursor-pointer hover:bg-brightOrangeMediq transition record-delete-confirm-btn">@lang("labels.log_in_register.confirm")</button>
                                    </div>
                                </div>
                            </div>
                        </dialog>
                    </div>
                </div>
                <dialog component-name="dashboard-pdf-upload"
                    class="fixed z-[1001] left-0 top-0 w-full h-full overflow-hidden bg-linear-black items-center justify-center pdf-upload-popup">
                    <div class="bg-whitez w-full max-w-[650px] md:p-10 p-5 rounded-[12px] text-darkgray relative mx-auto">
                        <form action="{{ route('dashboard.myacc.healthprofile.fileupload') }}" method="POST" id="file-upload" enctype="multipart/form-data">
                        <div class="flex items-center justify-between mb-5">
                            <h3
                                class="me-body23 helvetica-normal font-bold text-darkgray flex items-center justify-start">
                                @lang('labels.basic_info.add_new_report')
                                <div
                                    class="ml-2 plan-tooltip-wrapper flex items-center me-body18 mr-4 xl:mr-5 report-tooltip">
                                    <img src="{{asset('frontend/img/i-icon.svg')}}" alt="i icon">
                                    <div class="plan-tooltip me-body16 text-darkgray">
                                        <p class="">
                                            @lang('labels.basic_info.pdf_file_size')
                                        </p>
                                    </div>
                                </div>
                            </h3>
                            <button type="button" class="lr-popup-close absolute top-[5px] sm:top-[24px] right-[24px]">
                                <img src="{{asset('frontend/img/lr_round-close.svg')}}" alt="close icon">
                            </button>
                        </div>
                        <div>
                            <input type="hidden" name="report-id" value="">
                            <div class="">
                                <label class="mb-2.5 helvetica-normal me-body16 text-darkgray">@lang('labels.basic_info.report_name')<span class="text-mered-content ml-2">*</span></label>
                                <input type="text" name="report_name" placeholder="@lang('labels.basic_info.report_name')"
                                    class="w-full me-body18 placeholder-text-lightgray mb-5 rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-orangeMediq">
                                    <p class="text-mered me-body16 helvetica-normal mt-[12px] hidden" id="report_name_error"></p>
                            </div>
                            <div class="relative">
                                <label class="mb-2.5 helvetica-normal me-body16 text-darkgray">@lang('labels.basic_info.report_date')</label>
                                <input type="text" id="datepicker" placeholder="DD/MM/YYYY" name="report_date"
                                    class="w-full me-body18 placeholder-text-lightgray mb-5 rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-orangeMediq">
                                <svg class="absolute top-[52%] right-0 rd-arrow cursor-pointer" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17.9533 9.26636C17.8478 9.03902 17.5829 8.93589 17.3462 9.03199C17.2829 9.05777 16.5329 9.79605 14.6298 11.7086L11.9978 14.3523L9.3681 11.7086C7.46028 9.79371 6.71263 9.05777 6.64935 9.03199C6.60013 9.01324 6.5181 8.99683 6.46653 8.99683C6.12903 8.99683 5.90169 9.33902 6.04231 9.64136C6.1056 9.77496 11.6673 15.3625 11.7986 15.4211C11.9181 15.4773 12.0775 15.4773 12.197 15.4211C12.3283 15.3625 17.89 9.77496 17.9533 9.64136C18.0095 9.52183 18.0095 9.38589 17.9533 9.26636Z"
                                        fill="#7C7C7C"></path>
                                </svg>
                            </div>
                            <div class="">
                                <label class="mb-2.5 helvetica-normal me-body16 text-darkgray">@lang('labels.basic_info.remarks')</label>
                                <textarea name="remarks" id="remarks" cols="5" rows="3"
                                    class="me-body18 helvetica-normal w-full border border-meA3 rounded-[4px] placeholder-text-lightgray text-darkgray p-5"
                                    placeholder="@lang('labels.basic_info.add') @lang('labels.basic_info.remarks')"></textarea>
                            </div>

                            <div class="drop-zone my-5">
                                <input type="file" name="file" class="drop-zone__input"  accept=".pdf">
                                <span class="drop-zone__prompt flex items-center"> <svg class="mr-[8px]" width="30"
                                        height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M20.7375 11.25H18.75V5C18.75 4.3125 18.1875 3.75 17.5 3.75H12.5C11.8125 3.75 11.25 4.3125 11.25 5V11.25H9.2625C8.15 11.25 7.5875 12.6 8.375 13.3875L14.1125 19.125C14.6 19.6125 15.3875 19.6125 15.875 19.125L21.6125 13.3875C22.4 12.6 21.85 11.25 20.7375 11.25ZM6.25 23.75C6.25 24.4375 6.8125 25 7.5 25H22.5C23.1875 25 23.75 24.4375 23.75 23.75C23.75 23.0625 23.1875 22.5 22.5 22.5H7.5C6.8125 22.5 6.25 23.0625 6.25 23.75Z"
                                            fill="#7C7C7C"></path>
                                    </svg>@lang('labels.basic_info.browser_files')</span>
                                <button type="button"
                                    class="browse-btn ml-auto max-w-[100px] xs:max-w-[125px] sm:max-w-[179px] border border-orangeMediq hover:bg-whitez hover:text-orangeMediq bg-orangeMediq rounded-[6px] w-full text-whitez helvetica-normal font-bold me-body16 flex items-center justify-center md:h-[50px] h-[40px]">
                                    @lang('labels.basic_info.drag_your_file_here')
                                </button>
                            </div>
                            <div class="text-mered me-body16 helvetica-normal mt-[12px] hidden" id="file_error"></div>
                            <div class="flex items-center justify-end">
                                <input type="hidden" name="record_id" value="0">
                                <input type="hidden" name="family_member_id" value="">
                                <input type="hidden" name="report_type" value="">
                                <button type="button"
                                    class="mr-[10px] text-darkgray border border-darkgray rounded-[6px] bg-whitez flex items-center justify-center h-[50px] max-w-[135px] w-full me-body16 font-bold helvetica-normal cursor-pointer hover:border-orangeMediq hover:text-orangeMediq report-cancel-btn transition">
                                    @lang('labels.order_details.cancel')
                                </button>
                                <button type="button" id="btnUpload" data-form-id="file-upload"
                                    class="border border-meA3 rounded-[6px] bg-meA3 flex items-center justify-center h-[50px] max-w-[135px] w-full me-body16 font-bold helvetica-normal text-whitez cursor-pointer hover:bg-orangeMediq hover:border-orangeMediq transition">
                                    @lang('labels.order_details.upload')
                                </button>
                            </div>
                        </div>
                        </form>
                    </div>
                </dialog>
            </div>
        </div>

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
                            <ul class="nso-dropdown-lists absolute top-0 ">
                                @foreach($bloodType as $data)
                                <li class="nso-dropdown-items" data-value="{{@langbind($data,'name')}}" data-id="{{$data->id}}">{{@langbind($data,'name')}}</li>
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
                                <li class="nso-dropdown-items" data-value="{{@langbind($data,'name')}}" data-id="{{$data->id}}">{{@langbind($data,'name')}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="pb-5 flex items-center justify-between">
                    <div class="health-height-input w-[49%]">
                        <label class="me-body16 mb-[10px]">@lang('labels.basic_info.height')</label>
                        <input type="text"  id="height" placeholder="@lang('labels.basic_info.height')"
                            class="w-full me-body18 placeholder-text-lightgray mb-5 rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-orangeMediq">
                    </div>
                    <div class="health-weight-input w-[49%]">
                        <label class="me-body16 mb-[10px]">@lang('labels.basic_info.weight')</label>
                        <input type="text" id="weight" placeholder="@lang('labels.basic_info.weight')"
                            class="w-full me-body18 placeholder-text-lightgray mb-5 rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-orangeMediq">
                    </div>
                </div>
                <div class="drinking-section pb-5">
                    <p class="me-body16 mb-[10px]">@lang('labels.basic_info.drinking')</p>
                    <div class="flex items-center justify-start">
                        <div class="me-cus-input me-body18 flex items-center justify-start">
                            <label for="drinkNo" class="custom-radio-container w-[89px] mr-[20px] 5xs:mr-[60px]">
                                <input type="radio" name="drink-check" class="drinking-option" id="drinkNo" value="0">
                                <span class="custom-radio-orange"></span>
                                <span class="ml-10 4xl:ml-[30px]">@lang('labels.check_out.no')</span>
                            </label>
                            <label for="drinkYes" class="custom-radio-container w-[89px] mr-[20px] 5xs:mr-[60px]">
                                <input type="radio" name="drink-check" class="drinking-option" id="drinkYes" value="1">
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
                                <label for="{{langbind($data,"name")}}" class="custom-checkbox-container mr-1 last:mr-0 lg:mr-2 lg:last:mr-0 mb-1 lg:mb-2 6xl:mb-[10px]">
                                    <input type="radio" name="select-drink" id="{{langbind($data,"name")}}" value="{{$data->id}}" class="select-drink select-plan">
                                    <span class="custom-checkbox-btn rounded py-[7px] px-4 outlined-btn-hover flex items-center">
                                        <span class="mr-1 lg:mr-2">{{langbind($data,"name")}}</span>
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
                                <label for="{{langbind($data,"name")}}" class="custom-checkbox-container mr-1 last:mr-0 lg:mr-2 lg:last:mr-0 mb-1 lg:mb-2 6xl:mb-[10px]">
                                    <input type="radio" name="select-amount" id="{{langbind($data,"name")}}" value="{{$data->id}}" class="select-amount select-plan">
                                    <span class="custom-checkbox-btn rounded py-[7px] px-4 outlined-btn-hover flex items-center">
                                        <span class="mr-1 lg:mr-2">{{langbind($data,"name")}}</span>
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
                                        <span class="">{{ langbind($data,'name') }}</span>
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
                                        <span class="">{{ langbind($data,'name') }}</span>
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
                                        <span class="">{{ langbind($data,'name') }}</span>
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
            <table id="vaccination-record-table">
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
                                <li class="nso-dropdown-items" data-value="{{langbind($data,'name')}}"  data-id="{{$data->id}}">
                                    {{ langbind($data,'name') }}
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
                                <li class="nso-dropdown-items" data-value="{{langbind($data,'name')}}"  data-id="{{$data->id}}">
                                    {{langbind($data,'name')}}
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div>
                    <p class="text-darkgray helvetica-normal me-body16 mb-[10px]">@lang('labels.basic_info.remarks')</p>
                    <input type="text" placeholder="@lang('labels.basic_info.remarks')" id="remarks1"
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
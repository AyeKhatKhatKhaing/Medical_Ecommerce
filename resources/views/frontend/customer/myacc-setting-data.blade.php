<div component-name="me-user-dashboard">
    <div component-name="me-dashboard-title">
        <p class="helvetica-normal text-darkgray me-body32 font-bold">@lang('labels.lefrmenu.setting')</p>
    </div>
    <div class=" coupon-redem hidden">
        <div class="flex items-center justify-center pt-10 redeem-coupon-layer">
            <div class="relative">
                <input type="text"
                    class="w-[350px] mr-[8px] rounded-[4px] border border-lightgray helvetica-normal text-darkgray px-[10px] h-[48px] focus:outline-none me-body16"
                    placeholder="Enter redeem coupon code">
                <div class="absolute top-[25%] left-[12px] bg-whitez flex items-center error-icon hidden">
                    <p class="mr-4 text-[#EE220C] font-normal me-body16 helvetica-normal">Please Enter Valid Redeem Code
                    </p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <path
                            d="M12.5908 10.6904C12.5641 10.5429 12.4831 10.4107 12.3638 10.3199C12.2445 10.2291 12.0955 10.1862 11.9462 10.1998C11.7969 10.2133 11.658 10.2823 11.557 10.3931C11.456 10.5039 11.4001 10.6485 11.4004 10.7984V16.2008L11.41 16.3088C11.4367 16.4564 11.5177 16.5886 11.637 16.6794C11.7563 16.7702 11.9053 16.813 12.0546 16.7995C12.2039 16.7859 12.3428 16.717 12.4438 16.6062C12.5448 16.4954 12.6007 16.3508 12.6004 16.2008V10.7984L12.5908 10.6904ZM12.9592 8.09844C12.9592 7.85974 12.8644 7.63082 12.6956 7.46204C12.5268 7.29326 12.2979 7.19844 12.0592 7.19844C11.8205 7.19844 11.5916 7.29326 11.4228 7.46204C11.254 7.63082 11.1592 7.85974 11.1592 8.09844C11.1592 8.33713 11.254 8.56605 11.4228 8.73483C11.5916 8.90362 11.8205 8.99844 12.0592 8.99844C12.2979 8.99844 12.5268 8.90362 12.6956 8.73483C12.8644 8.56605 12.9592 8.33713 12.9592 8.09844ZM21.6004 11.9984C21.6004 9.45236 20.589 7.01056 18.7886 5.21021C16.9883 3.40986 14.5465 2.39844 12.0004 2.39844C9.45431 2.39844 7.01251 3.40986 5.21217 5.21021C3.41182 7.01056 2.40039 9.45236 2.40039 11.9984C2.40039 14.5445 3.41182 16.9863 5.21217 18.7867C7.01251 20.587 9.45431 21.5984 12.0004 21.5984C14.5465 21.5984 16.9883 20.587 18.7886 18.7867C20.589 16.9863 21.6004 14.5445 21.6004 11.9984ZM3.60039 11.9984C3.60039 10.8953 3.81766 9.80303 4.2398 8.7839C4.66194 7.76476 5.28068 6.83875 6.06069 6.05874C6.8407 5.27873 7.76671 4.65999 8.78585 4.23785C9.80498 3.81571 10.8973 3.59844 12.0004 3.59844C13.1035 3.59844 14.1958 3.81571 15.2149 4.23785C16.2341 4.65999 17.1601 5.27873 17.9401 6.05874C18.7201 6.83875 19.3388 7.76476 19.761 8.7839C20.1831 9.80303 20.4004 10.8953 20.4004 11.9984C20.4004 14.2263 19.5154 16.3628 17.9401 17.9381C16.3648 19.5134 14.2282 20.3984 12.0004 20.3984C9.77257 20.3984 7.636 19.5134 6.06069 17.9381C4.48539 16.3628 3.60039 14.2263 3.60039 11.9984Z"
                            fill="#EE220C"></path>
                    </svg>

                </div>
            </div>
            <button
                class="w-[141px] border-1 border-orangeMediq hover:bg-whitez hover:text-orangeMediq bg-orangeMediq rounded-[6px] text-whitez helvetica-normal me-body16 flex items-center justify-center h-[48px]"
                onclick="changePlaceholder()">Redeem</button>
        </div>
    </div>
</div>
<section class="change-password-section">
    <div component-name="dashboard-setting-password"
        class="dsp-container border border-mee4 rounded-xl py-5 px-8 text-darkgray mt-10">
        <div class="me-body23 helvetica-normal font-bold dsp-title">
            @lang('labels.setting.change_password')
        </div>
        <div class="custom-divider my-5"></div>
        <div>
            <div class="login-with-password-section">
                <div class="relative mb-[20px]">
                    <label class="helvetica-normal me-body16 text-darkgray mb-2">@lang('labels.setting.current_password')</label>
                    <input type="password" placeholder="@lang('labels.setting.enter_current_password')" id="txt_current_password"
                        class="max-w-[593px] w-full me-body18 placeholder-text-lightgray rounded-[8px] py-[19px] px-5 border border-meA3 h-[48px] mb-2 focus:border-orangeMediq block">
                    <p
                        class="text-mered me-body16 helvetica-normal mt-[12px] hidden pw-error txt_current_password_error">
                        @lang('labels.log_in_register.pwd_at_least_number')</p>
                </div>
                <div class="relative mb-[20px]">
                    <label class="helvetica-normal me-body16 text-darkgray mb-2">@lang('labels.setting.new_password')</label>
                    <input type="password" placeholder="@lang('labels.setting.enter_new_password')" id="txt_new_password"
                        class="max-w-[593px] w-full me-body18 placeholder-text-lightgray rounded-[8px] py-[19px] px-5 border border-meA3 h-[48px] mb-2 focus:border-orangeMediq block">
                    <p class="text-mered me-body16 helvetica-normal mt-[12px] hidden pw-error txt_new_password_error">
                        @lang('labels.log_in_register.pwd_at_least_number')</p>
                    <input type="password" placeholder="@lang('labels.setting.confirm_password')" id="txt_new_password_confirmation"
                        class="max-w-[593px] w-full me-body18 placeholder-text-lightgray rounded-[8px] py-[19px] px-5 border border-meA3 h-[48px] mb-2 focus:border-orangeMediq block">
                    <p
                        class="text-mered me-body16 helvetica-normal mt-[12px] hidden pw-error txt_new_password_confirmation_error">
                        @lang('labels.log_in_register.pwd_at_least_number')</p>
                </div>
            </div>
            <div>
                <button id="btn_change_password"
                    class="max-w-[179px] w-full border border-orangeMediq hover:bg-brightOrangeMediq bg-orangeMediq rounded-[6px] w-full text-whitez helvetica-normal font-bold me-body16 flex items-center justify-center md:h-[50px] h-[40px]">@lang('labels.setting.change_password')</button>
            </div>
        </div>
    </div>
</section>
<section class="setting-notification-section">
    <div component-name="dashboard-setting-notification"
        class="dsp-container border border-mee4 rounded-xl py-5 px-8 text-darkgray mt-10">
        <div class="me-body23 helvetica-normal font-bold dsp-title">
            @lang('labels.setting.notification')
        </div>
        <div class="custom-divider my-5"></div>
        <div class="setting-notification-condition">
            @foreach ($customNoti as $data)
                <div class="flex items-center justify-start mb-5 flex-wrap sm:flex-nowrap">
                    <div class="notification-top">
                        <h6 class="font-bold me-body18 helvetica-normal mb-2">
                            {{ @langbind($data, 'title') }}
                        </h6>
                        <p class="helvetica-normal me-body16">{{ strip_tags(@langbind($data, 'description')) }}</p>
                    </div>
                    <div class="flex items-center justify-end">
                        @if ($loop->index == 3)
                            @foreach ($notiType as $ntdata)
                                @if ($loop->index >= 2 && $loop->index < 5)
                                <div class="me-cus-input me-body18 flex items-center justify-start">
                                    @php
                                    $checkSelect = \App\Models\CustomerNotification::where(
                                            'customer_id',
                                            auth()
                                                ->guard('customer')
                                                ->user()->id,
                                        )
                                            ->where('custom_notification_id', $data->id)
                                            ->where('notification_type_id', $ntdata->id)
                                            ->first();
                                    @endphp
                                    <div class="mr-4 xl:mr-5">
                                        <label for="lang{{ $data->id }}{{ $ntdata->id }}" class="custom-radio-container">
                                          <input type="radio" name="redemption-offers-1[]" id="lang{{ $data->id }}{{ $ntdata->id }}" class="decide-later" value="{{ $ntdata->id }}"
                                            {{ $checkSelect != null ? 'checked' : '' }}
                                            data-customer-id="{{ auth()->guard('customer')->user()->id }}"
                                            data-custom-noti-id="{{ $data->id }}"
                                            data-noti-type-id="{{ $ntdata->id }}">
                                          <span class="custom-radio-orange"></span>
                                          <span class="ml-5 4xl:ml-[30px] flex items-center flex-wrap me-body16">{{ @langbind($ntdata,'name') }}</span>
                                        </label>
                                      </div>
              
                                    {{-- <div
                                        class="plan-tooltip-wrapper flex items-center me-body18 mr-4 xl:mr-5 {{ $data->enable_selection == 0 ? 'has-tooltips' : 'no-tooltips' }}">
                                        <label for="email-sms-{{ $data->id }}{{ $ntdata->id }}"
                                            class="custom-radio-container">
                                            @php
                                                $checkSelect = \App\Models\CustomerNotification::where(
                                                    'customer_id',
                                                    auth()
                                                        ->guard('customer')
                                                        ->user()->id,
                                                )
                                                    ->where('custom_notification_id', $data->id)
                                                    ->where('notification_type_id', $ntdata->id)
                                                    ->first();
                                            @endphp
                                            <input type="radio" name="redemption-offers-1[]"
                                                id="email-sms-{{ $data->id }}{{ $ntdata->id }}"
                                                {{ $data->enable_selection == 0 ? 'checked' : ($checkSelect != null ? 'checked' : '') }}
                                                class="add_on" {{ $data->enable_selection == 0 ? 'disabled' : '' }}
                                                data-customer-id="{{ auth()->guard('customer')->user()->id }}"
                                                data-custom-noti-id="{{ $data->id }}"
                                                data-noti-type-id="{{ $ntdata->id }}" class="decide-later">
                                            <span class="custom-checkbox-orange"></span>
                                            <span class="ml-5 4xl:ml-[30px] flex items-center flex-wrap me-body16">
                                                {{ $ntdata->name }}
                                            </span>
                                        </label>
                                    </div> --}}
                                </div>
                                @endif
                            @endforeach
                        @else
                            @foreach ($notiType as $ntdata)
                                @if ($loop->index < 2)
                                    <div
                                        class="plan-tooltip-wrapper flex items-center me-body18 mr-4 xl:mr-5 {{ $data->enable_selection == 0 ? 'has-tooltips' : 'no-tooltips' }}">
                                        <label for="email-sms-{{ $data->id }}{{ $ntdata->id }}"
                                            class="custom-checkbox-label flex items-center mr-5 last:mr-0 lg:mr-10 {{ $data->enable_selection == 0 ? 'permission' : '' }}">
                                            @php
                                                $checkSelect = \App\Models\CustomerNotification::where(
                                                    'customer_id',
                                                    auth()
                                                        ->guard('customer')
                                                        ->user()->id,
                                                )
                                                    ->where('custom_notification_id', $data->id)
                                                    ->where('notification_type_id', $ntdata->id)
                                                    ->first();
                                            @endphp
                                            <input type="checkbox" name="redemption-offers-1[]"
                                                id="email-sms-{{ $data->id }}{{ $ntdata->id }}"
                                                {{ $data->enable_selection == 0 ? 'checked' : ($checkSelect != null ? 'checked' : '') }}
                                                class="add_on" {{ $data->enable_selection == 0 ? 'disabled' : '' }}
                                                data-customer-id="{{ auth()->guard('customer')->user()->id }}"
                                                data-custom-noti-id="{{ $data->id }}"
                                                data-noti-type-id="{{ $ntdata->id }}">
                                            <span class="custom-checkbox-orange"></span>
                                            <span class="ml-5 4xl:ml-[30px] flex items-center flex-wrap me-body16">
                                                {{ @langbind($ntdata,'name') }}
                                            </span>
                                            <div class="plan-tooltip me-body16 text-darkgray">
                                                @if ($data->enable_selection == 0)
                                                    <p class="">
                                                        @lang('labels.setting.requested_mediQ')
                                                    </p>
                                                @else
                                                    <p class="">
                                                    </p>
                                                @endif
                                            </div>
                                        </label>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

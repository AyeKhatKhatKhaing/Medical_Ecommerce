@extends('admin.layouts.master')
@section('title', 'Contact Customer')
@section('breadcrumb', 'Contact Customer')
@section('breadcrumb-info', 'Contact Customer ')

@push('style')
@endpush

@section('content')
    <div class="row p-7">
        <div class="row mb-5">
            <div class="col-md-8">
                <h3 class="card-title">
                    {{-- / Contact information detail --}}
                </h3>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="float-end">
                        <a href="{{ url('/admin/customer-list') }}" title="Back"><button type="button"
                                class="btn btn-secondary btn-sm cancel"><i class="bi bi-backspace-fill"
                                    aria-hidden="true"></i>
                                Back</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="justify-content: center;">
        <div class="col-5">
            <div class="card card-flush py-4 flex-row-fluid">
                <!--begin::Card header-->
                <div class="card-header">
                    <div class="card-title">
                        <h2>Customer Details</h2>
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                            <!--begin::Table body-->
                            <tbody class="fw-bold text-gray-600">
                                <!--begin::Customer name-->
                                <tr>
                                    <td class="text-muted">
                                        <div class="d-flex align-items-center">
                                            <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                            <span class="svg-icon svg-icon-2 me-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3"
                                                        d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->Name
                                        </div>
                                    </td>
                                    <td class="fw-bolder text-end">
                                        <div class="d-flex align-items-center justify-content-end">
                                            <!--begin:: Avatar -->

                                            <!--end::Avatar-->
                                            <!--begin::Name-->
                                            <span class="text-gray-600">
                                                @if (isset($customer))
                                                    {{ $customer->title }} {{ $customer->name }}
                                                @endif
                                            </span>
                                            <!--end::Name-->
                                        </div>
                                    </td>
                                </tr>
                                <!--end::Customer name-->
                                <!--begin::Customer email-->
                                <tr>
                                    <td class="text-muted">
                                        <div class="d-flex align-items-center">
                                            <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                            <span class="svg-icon svg-icon-2 me-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3"
                                                        d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->Email
                                        </div>
                                    </td>
                                    <td class="fw-bolder text-end">
                                        <span class="text-gray-600">
                                            @if (isset($customer) && isset($customer->business_email))
                                                {{ $customer->business_email }}
                                            @endif
                                        </span>
                                    </td>
                                </tr>
                                <!--end::Payment method-->
                                <!--begin::Date-->
                                <tr>
                                    <td class="text-muted">
                                        <div class="d-flex align-items-center">
                                            <!--begin::Svg Icon | path: icons/duotune/electronics/elc003.svg-->
                                            <span class="svg-icon svg-icon-2 me-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M5 20H19V21C19 21.6 18.6 22 18 22H6C5.4 22 5 21.6 5 21V20ZM19 3C19 2.4 18.6 2 18 2H6C5.4 2 5 2.4 5 3V4H19V3Z"
                                                        fill="currentColor" />
                                                    <path opacity="0.3" d="M19 4H5V20H19V4Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->Phone
                                        </div>
                                    </td>
                                    <td class="fw-bolder text-end">
                                        @if (isset($customer) && isset($customer->phone_number))
                                            {{ $customer->phone_number }}
                                        @endif
                                    </td>
                                </tr>



                                <tr>
                                    <td class="text-muted">
                                        <div class="d-flex align-items-center">
                                            <!--begin::Svg Icon | path: icons/duotune/electronics/elc003.svg-->
                                            <span class="svg-icon svg-icon-2 me-2">
                                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path opacity="0.4"
                                                            d="M2 12.97V6.99C2 4.23 4.24 2 7 2H17C19.76 2 22 4.23 22 6.99V13.97C22 16.72 19.76 18.95 17 18.95H15.5C15.19 18.95 14.89 19.1 14.7 19.35L13.2 21.34C12.54 22.22 11.46 22.22 10.8 21.34L9.3 19.35C9.14 19.13 8.78 18.95 8.5 18.95H7C4.24 18.95 2 16.72 2 13.97V12.97Z"
                                                            fill="currentColor"></path>
                                                        <path
                                                            d="M12 12C11.44 12 11 11.55 11 11C11 10.45 11.45 10 12 10C12.55 10 13 10.45 13 11C13 11.55 12.56 12 12 12Z"
                                                            fill="currentColor"></path>
                                                        <path
                                                            d="M16 12C15.44 12 15 11.55 15 11C15 10.45 15.45 10 16 10C16.55 10 17 10.45 17 11C17 11.55 16.56 12 16 12Z"
                                                            fill="#292D32"></path>
                                                        <path
                                                            d="M8 12C7.44 12 7 11.55 7 11C7 10.45 7.45 10 8 10C8.55 10 9 10.45 9 11C9 11.55 8.56 12 8 12Z"
                                                            fill="#292D32"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->Messages
                                        </div>
                                    </td>
                                    <td class="fw-bolder text-end">
                                        @if (isset($customer) && isset($customer->message))
                                            {{ $customer->message }}
                                        @endif
                                    </td>
                                </tr>
                                <!--end::Date-->
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                </div>
                <!--end::Card body-->
            </div>
        </div>
        <div class="col-5">
            <div class="card card-flush py-4 flex-row-fluid">
                <!--begin::Card header-->
                <div class="card-header">
                    <div class="card-title">
                        <h2>Company Details</h2>
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                            <!--begin::Table body-->
                            <tbody class="fw-bold text-gray-600">
                                <tr>
                                    <td class="text-muted">
                                        <div class="d-flex align-items-center">
                                            <!--begin::Svg Icon | path: icons/duotune/electronics/elc003.svg-->
                                            <span class="svg-icon svg-icon-2 me-2">
                                                <svg viewBox="0 0 1024 1024" class="icon" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path
                                                            d="M845.228598 582.198602v205.721087c0 23.063017-14.826883 38.987505-37.8899 38.987505H220.287904c-23.063017 0-44.679284-15.925512-44.679284-38.987505V582.198602h259.042987v79.924488c0 3.774041 5.501336 4.034108 9.275377 4.034108h139.774681c3.774041 0 3.508855-0.261091 3.508855-4.034108v-79.924488h258.018078z"
                                                            fill="#E0E0E0"></path>
                                                        <path
                                                            d="M863.24898 225.886509h-169.55541v-66.950838c0-19.26645-13.851121-37.485466-33.117571-37.485465h-18.076695V110.01443c0-19.26645-11.577071-36.686835-30.844545-36.686835H415.971843c-19.26645 0-37.633929 17.420385-37.633929 36.686835v11.435776h-11.286288c-19.26645 0-38.884093 18.217992-38.884093 37.485465v66.950838H164.377622c-53.950566 0-101.397411 46.827395-101.397412 100.777961v517.164477c0 53.950566 47.446846 95.705633 101.397412 95.705633h698.871358c53.950566 0 94.607004-41.755067 94.607004-95.705633v-517.164477c0-53.950566-40.656438-100.777961-94.607004-100.777961z m-246.346809-61.25394a6.989041 6.989041 0 0 1-6.989041 6.989041H412.970835a6.989041 6.989041 0 0 1-6.989041-6.989041V106.937655a6.989041 6.989041 0 0 1 6.989041-6.989041h196.943319a6.989041 6.989041 0 0 1 6.989041 6.989041v57.694914z m312.285024 679.197402c0 38.533924-27.405315 68.060729-65.938215 68.060729H164.377622c-38.533924 0-74.776393-29.526805-74.776393-68.060729V596.532996h316.380565v65.590094c0 19.288976 18.655191 32.702897 37.944166 32.702897h139.774682c19.288976 0 31.153759-13.414946 31.153758-32.702897v-65.590094h314.332795v247.296975z m-341.977698-199.174364v17.467483c0 3.774041 0.265186 4.034108-3.508855 4.034108H443.92596c-3.774041 0-9.275377-0.261091-9.275377-4.034108v-17.467483h152.558914z m-152.558914-26.621019v-67.731038c0-3.774041 5.501336-10.084247 9.275377-10.084247h139.774682c3.774041 0 3.508855 6.310205 3.508855 10.084247v67.731038h-152.558914z m494.536612-49.146495h-314.332795v-18.584543c0-19.288976-11.864783-36.705265-31.153758-36.705265H443.92596c-19.288976 0-37.944166 17.416289-37.944166 36.705265v18.584543h-316.380565V326.66447c0-38.533924 36.243493-71.085286 74.776393-71.085287h241.604172v-29.692674h-49.146496v-66.950838c0-3.787352 6.426928-10.864447 10.215304-10.864447h11.286288v17.852465c0 19.26645 18.367479 32.317916 37.633929 32.317916h195.68394c19.26645 0 30.844545-13.050442 30.844545-32.317916v-17.852465h18.076695c3.787352 0 3.424896 7.076071 3.424897 10.864447v66.950838h-153.582799v29.692674h352.830883c38.533924 0 65.938215 32.551362 65.938215 71.085287v242.223623z"
                                                            fill="currentColor"></path>
                                                        <path
                                                            d="M202.228614 483.905611h-26.621018v-87.353801c0-30.828163 27.829203-58.037916 58.657366-58.037916h86.73435v26.621019h-86.73435c-15.417665 0-32.036348 15.999232-32.036348 31.416897v87.353801zM405.981794 338.513894h104.436303v26.621019h-104.436303z"
                                                            fill="currentColor"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->Company Name
                                        </div>
                                    </td>
                                    <td class="fw-bolder text-end">
                                        @if (isset($customer) && isset($customer->company_name))
                                            {{ $customer->company_name }}
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-muted">
                                        <div class="d-flex align-items-center">
                                            <!--begin::Svg Icon | path: icons/duotune/electronics/elc003.svg-->
                                            <span class="svg-icon svg-icon-2 me-2">
                                                <svg viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path opacity="0.5"
                                                            d="M20.9129 5.88881C21.25 6.39325 21.25 7.09549 21.25 8.49995V21.2499H21.75C22.1642 21.2499 22.5 21.5857 22.5 21.9999C22.5 22.4142 22.1642 22.7499 21.75 22.7499H1.75C1.33579 22.7499 1 22.4142 1 21.9999C1 21.5857 1.33579 21.2499 1.75 21.2499H2.25V8.49995C2.25 7.09549 2.25 6.39325 2.58706 5.88881C2.73298 5.67043 2.92048 5.48293 3.13886 5.33701C3.58008 5.04219 5.67561 5.00524 6.75702 5.00061C6.75291 5.292 6.75294 5.59649 6.75298 5.91045L6.75299 5.99995V7.24995H4.25C3.83579 7.24995 3.5 7.58573 3.5 7.99995C3.5 8.41416 3.83579 8.74995 4.25 8.74995H6.75299V10.2499H4.25C3.83579 10.2499 3.5 10.5857 3.5 10.9999C3.5 11.4142 3.83579 11.7499 4.25 11.7499H6.75299V13.2499H4.25C3.83579 13.2499 3.5 13.5857 3.5 13.9999C3.5 14.4142 3.83579 14.7499 4.25 14.7499H6.75299V21.2499H16.7529V14.7499H19.25C19.6642 14.7499 20 14.4142 20 13.9999C20 13.5857 19.6642 13.2499 19.25 13.2499H16.7529V11.7499H19.25C19.6642 11.7499 20 11.4142 20 10.9999C20 10.5857 19.6642 10.2499 19.25 10.2499H16.7529V8.74995H19.25C19.6642 8.74995 20 8.41416 20 7.99995C20 7.58573 19.6642 7.24995 19.25 7.24995H16.7529V5.99995L16.7529 5.91046V5.91043C16.753 5.59648 16.753 5.292 16.7489 5.00061C17.8303 5.00524 19.9199 5.04219 20.3611 5.33701C20.5795 5.48293 20.767 5.67043 20.9129 5.88881Z"
                                                            fill="currentColor"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M10.75 2H12.75C14.6356 2 15.5784 2 16.1642 2.58579C16.75 3.17157 16.75 4.11438 16.75 6V21.25H18.25H21.25H21.75C22.1642 21.25 22.5 21.5858 22.5 22C22.5 22.4142 22.1642 22.75 21.75 22.75H1.75C1.33579 22.75 1 22.4142 1 22C1 21.5858 1.33579 21.25 1.75 21.25H2.25H5.25H6.75V6C6.75 4.11438 6.75 3.17157 7.33579 2.58579C7.92157 2 8.86438 2 10.75 2ZM11.75 18.25C12.1642 18.25 12.5 18.5858 12.5 19V21.25H11V19C11 18.5858 11.3358 18.25 11.75 18.25ZM9.75 14C9.33579 14 9 14.3358 9 14.75C9 15.1642 9.33579 15.5 9.75 15.5H13.75C14.1642 15.5 14.5 15.1642 14.5 14.75C14.5 14.3358 14.1642 14 13.75 14H9.75ZM9 11.75C9 11.3358 9.33579 11 9.75 11H13.75C14.1642 11 14.5 11.3358 14.5 11.75C14.5 12.1642 14.1642 12.5 13.75 12.5H9.75C9.33579 12.5 9 12.1642 9 11.75ZM9.75 8.5C9.33579 8.5 9 8.83579 9 9.25C9 9.66421 9.33579 10 9.75 10H13.75C14.1642 10 14.5 9.66421 14.5 9.25C14.5 8.83579 14.1642 8.5 13.75 8.5H9.75ZM9 6.25C9 5.83579 9.33579 5.5 9.75 5.5H13.75C14.1642 5.5 14.5 5.83579 14.5 6.25C14.5 6.66421 14.1642 7 13.75 7H9.75C9.33579 7 9 6.66421 9 6.25Z"
                                                            fill="currentColor"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->Company Size
                                        </div>
                                    </td>
                                    <td class="fw-bolder text-end">
                                        @if (isset($customer) && isset($customer->company_size))
                                            {{ $customer->company_size }}
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-muted">
                                        <div class="d-flex align-items-center">
                                            <!--begin::Svg Icon | path: icons/duotune/electronics/elc003.svg-->
                                            <span class="svg-icon svg-icon-2 me-2">
                                                <svg viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path opacity="0.4"
                                                            d="M12 5.29994V21.3299C11.83 21.3299 11.65 21.2999 11.51 21.2199L11.47 21.1999C9.55 20.1499 6.2 19.0499 4.03 18.7599L3.74 18.7199C2.78 18.5999 2 17.6999 2 16.7399V4.65994C2 3.46994 2.97 2.56994 4.16 2.66994C6.26 2.83994 9.44 3.89994 11.22 5.00994L11.47 5.15994C11.62 5.24994 11.81 5.29994 12 5.29994Z"
                                                            fill="currentColor"></path>
                                                        <path
                                                            d="M22 4.67003V16.74C22 17.7 21.22 18.6 20.26 18.72L19.93 18.76C17.75 19.05 14.39 20.16 12.47 21.22C12.34 21.3 12.18 21.33 12 21.33V5.30003C12.19 5.30003 12.38 5.25003 12.53 5.16003L12.7 5.05003C14.48 3.93003 17.67 2.86003 19.77 2.68003H19.83C21.02 2.58003 22 3.47003 22 4.67003Z"
                                                            fill="currentColor"></path>
                                                        <path
                                                            d="M7.75 9.23999H5.5C5.09 9.23999 4.75 8.89999 4.75 8.48999C4.75 8.07999 5.09 7.73999 5.5 7.73999H7.75C8.16 7.73999 8.5 8.07999 8.5 8.48999C8.5 8.89999 8.16 9.23999 7.75 9.23999Z"
                                                            fill="currentColor"></path>
                                                        <path
                                                            d="M8.5 12.24H5.5C5.09 12.24 4.75 11.9 4.75 11.49C4.75 11.08 5.09 10.74 5.5 10.74H8.5C8.91 10.74 9.25 11.08 9.25 11.49C9.25 11.9 8.91 12.24 8.5 12.24Z"
                                                            fill="currentColor"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->Service Options
                                        </div>
                                    </td>
                                    <td class="fw-bolder text-end">
                                        {{-- @php
                                        if((isset($customer) && isset($customer->serviceOption))){
                                            $serviceOption = json_decode($customer->serviceOption)
                                        } 
                                        @endphp --}}
                                        @if (isset($customer) && isset($customer->serviceOption))
                                            @foreach (json_decode($customer->serviceOption) as $index => $option)
                                                @foreach (config('mediq.service_option_en') as $key => $optionStatus)
                                                    @if ($option == $key)
                                                        {{ $optionStatus }}
                                                        @if ($index !== count(json_decode($customer->serviceOption)) - 1)
                                                            ,
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-muted">
                                        <div class="d-flex align-items-center">
                                            <!--begin::Svg Icon | path: icons/duotune/electronics/elc003.svg-->
                                            <span class="svg-icon svg-icon-2 me-2">
                                                <svg viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path opacity="0.4"
                                                            d="M16.19 2H7.81C4.17 2 2 4.17 2 7.81V16.18C2 19.83 4.17 22 7.81 22H16.18C19.82 22 21.99 19.83 21.99 16.19V7.81C22 4.17 19.83 2 16.19 2Z"
                                                            fill="currentColor"></path>
                                                        <path
                                                            d="M14.2602 12L12.7502 11.47V8.08H13.1102C13.9202 8.08 14.5802 8.79 14.5802 9.66C14.5802 10.07 14.9202 10.41 15.3302 10.41C15.7402 10.41 16.0802 10.07 16.0802 9.66C16.0802 7.96 14.7502 6.58 13.1102 6.58H12.7502V6C12.7502 5.59 12.4102 5.25 12.0002 5.25C11.5902 5.25 11.2502 5.59 11.2502 6V6.58H10.6002C9.12016 6.58 7.91016 7.83 7.91016 9.36C7.91016 11.15 8.95016 11.72 9.74016 12L11.2502 12.53V15.91H10.8902C10.0802 15.91 9.42016 15.2 9.42016 14.33C9.42016 13.92 9.08016 13.58 8.67016 13.58C8.26016 13.58 7.92016 13.92 7.92016 14.33C7.92016 16.03 9.25016 17.41 10.8902 17.41H11.2502V18C11.2502 18.41 11.5902 18.75 12.0002 18.75C12.4102 18.75 12.7502 18.41 12.7502 18V17.42H13.4002C14.8802 17.42 16.0902 16.17 16.0902 14.64C16.0802 12.84 15.0402 12.27 14.2602 12ZM10.2402 10.59C9.73016 10.41 9.42016 10.24 9.42016 9.37C9.42016 8.66 9.95016 8.09 10.6102 8.09H11.2602V10.95L10.2402 10.59ZM13.4002 15.92H12.7502V13.06L13.7602 13.41C14.2702 13.59 14.5802 13.76 14.5802 14.63C14.5802 15.34 14.0502 15.92 13.4002 15.92Z"
                                                            fill="currentColor"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->Budget
                                        </div>
                                    </td>
                                    <td class="fw-bolder text-end">
                                        @if (isset($customer) && isset($customer->budget))
                                            {{ $customer->budget }}
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                </div>
                <!--end::Card body-->
            </div>
        </div>
    </div>

@endsection

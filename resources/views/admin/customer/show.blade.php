@extends('admin.layouts.master')
@section('title', 'Customer Detail')
@section('breadcrumb', 'Customer')
@section('breadcrumb-info', 'Customer Detail')
@section('content')
    <style>
        .accordion-button:not(.collapsed) {
            color: black !important;
            background-color: white !important;
        }

        .nav-tabs .nav-link.active,
        .nav-tabs .nav-item.show .nav-link {
            color: black !important;
            border-bottom: 2px solid black !important;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-9">
                        <h3 class="card-title">
                            Customer Detail
                        </h3>
                    </div>
                    <div class="col-md-3 text-end">
                        <a href="{{ url('/admin/customer') }}" title="Back"><button class="btn btn-secondary btn-sm"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    </div>
                </div>
                <div class="post d-flex flex-column-fluid mt-5" id="kt_post">
                    <!--begin::Container-->
                    <div id="kt_content_container" class="container-xxl bg-white">
                        <!--begin::Layout-->
                        <div class="d-flex flex-column flex-xl-row mt-5">
                            <!--begin::Sidebar-->
                            <div class="flex-column flex-lg-row-auto w-100 w-xl-325px mb-10">
                                <!--begin::Card-->
                                <div class="card mb-5 mb-xl-8">
                                    <!--begin::Card body-->
                                    <div class="card-body pt-15">
                                        <!--begin::Summary-->
                                        <div class="d-flex flex-center flex-column mb-5">
                                            <!--begin::Avatar-->
                                            {{-- @if ($customer->profile_image)
                                            <div class="symbol symbol-200px symbol-circle mb-7">
                                                <img src="{{ asset($customer->profile_image) }}" alt="image" />
                                            </div>
                                            @else
                                            <div class="symbol symbol-200px symbol-circle mb-7">
                                                --
                                              
                                            </div>
                                            @endif --}}
                                            <div class='symbol symbol-200px symbol-circle overflow-hidden me-3 mb-7'>
                                                <div class="symbol-label">
                                                    @if ($customer->profile_image)
                                                        <img src="{{ asset($customer->profile_image) }}" alt="no photo"
                                                            class="w-100 h-100" />
                                                    @else
                                                        <div class="symbol-label fs-3hx fw-semibold text-secondary">
                                                            {{ substr($customer->first_name, 0, 1) }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Name-->
                                            <p class="fs-3 text-gray-800 fw-bolder mb-1">
                                                @if (isset($customer))
                                                    @if ($customer->title_full_name == 'Mrs' && $customer->title_full_name)
                                                        Miss/Mrs.
                                                    @elseif($customer->title_full_name == 'Mr' && $customer->title_full_name)
                                                        Mr.
                                                    @endif
                                                    {{ $customer->last_name }}
                                                    {{ $customer->first_name }}
                                                @endif
                                            </p>
                                            @if ($subscriber)
                                                <div class="badge badge-light-primary">
                                                    Subscriber
                                                </div>
                                            @endif
                                            <!--end::Name-->
                                        </div>
                                        <!--end::Summary-->
                                        <!--begin::Details toggle-->
                                        <div class="d-flex flex-stack fs-4 py-3">
                                            <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse"
                                                href="#kt_customer_view_details" role="button" aria-expanded="false"
                                                aria-controls="kt_customer_view_details">Basic Information
                                                <span class="ms-2 rotate-180">
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                    <span class="svg-icon svg-icon-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                            <path
                                                                d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </span>
                                            </div>
                                            @if(auth()->user()->hasRole('admin'))
                                                <span data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                    title="Edit customer details">
                                                    <a href="#" class="" data-bs-toggle="modal"
                                                        data-bs-target="#kt_modal_stacked_1">
                                                        <span class="svg-icon svg-icon-3">
                                                            <svg viewBox="0 -0.02 20.109 20.109"
                                                                xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                    stroke-linejoin="round"></g>
                                                                <g id="SVGRepo_iconCarrier">
                                                                    <g id="edit-user-3" transform="translate(-2 -2)">
                                                                        <circle id="secondary" fill="currentColor"
                                                                            cx="5" cy="5" r="5"
                                                                            transform="translate(6 3)">
                                                                        </circle>
                                                                        <path id="primary"
                                                                            d="M9,21c-4.45-.37-6-2-6-2V18a5,5,0,0,1,5-5h3"
                                                                            fill="none" stroke="#000000"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            stroke-width="2"></path>
                                                                        <path id="primary-2" data-name="primary"
                                                                            d="M20.71,16.09,15.8,21H13V18.2l4.91-4.91a1,1,0,0,1,1.4,0l1.4,1.4A1,1,0,0,1,20.71,16.09ZM11,3a5,5,0,1,0,5,5A5,5,0,0,0,11,3Z"
                                                                            fill="none" stroke="#000000"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            stroke-width="2"></path>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                    {{-- <a href="#" class="btn btn-sm btn-light-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#kt_modal_update_customer">Edit</a> --}}
                                                </span>
                                            @endif
                                        </div>

                                        <div class="modal fade" tabindex="-1" id="kt_modal_stacked_1">
                                            <div class="modal-dialog modal-dialog-centered mw-700px">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title">Update Customer Information -
                                                            Q8{{ str_pad($customer->id, 7, '0', STR_PAD_LEFT) }} </h3>

                                                        <!--begin::Close-->
                                                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                                                            data-bs-dismiss="modal" aria-label="Close">
                                                            <i class="ki-duotone ki-cross fs-1"><span
                                                                    class="path1"></span><span class="path2"></span></i>
                                                        </div>
                                                        <!--end::Close-->
                                                    </div>
                                                    {{-- form start --}}
                                                    <form id="customerInfoForm" method="POST"
                                                        action="{{ url('/admin/customer/update') }}" accept-charset="UTF-8"
                                                        class="form-horizontal" enctype="multipart/form-data">
                                                        {{ csrf_field() }}
                                                        <div class="modal-body py-10 px-lg-17">
                                                            <!--begin::Scroll-->
                                                            <div>
                                                                <!--begin::Notice-->

                                                                <!--end::Notice-->
                                                                <!--begin::User toggle-->

                                                                <!--end::User toggle-->
                                                                <!--begin::User form-->
                                                                <div id="kt_modal_update_customer_user_info"
                                                                    class="collapse show">
                                                                    <div class="row">
                                                                        <input type="hidden" name="id"
                                                                            value="{{ $customer->id }}">
                                                                        <div class="col-md-3">
                                                                            <!--begin::Input group-->
                                                                            <div class="fv-row mb-7">
                                                                                <!--begin::Label-->
                                                                                <label
                                                                                    class="fs-6 fw-bold mb-2">Title</label>
                                                                                <!--end::Label-->

                                                                                <select
                                                                                    class="form-select form-select-solid"
                                                                                    data-control="select2"
                                                                                    name = "title_full_name"
                                                                                    data-dropdown-parent="#kt_modal_1"
                                                                                    data-placeholder="M..."
                                                                                    data-allow-clear="true">
                                                                                    {{-- <option value="">
                                                                                        Select title
                                                                                    </option> --}}
                                                                                    <option value="Mrs"
                                                                                        {{ $customer->title_full_name == 'Miss / Mrs' ? 'selected' : '' }}>
                                                                                        Miss / Mrs
                                                                                    </option>
                                                                                    <option value="Mr"
                                                                                        {{ $customer->title_full_name == 'Mr.' ? 'selected' : '' }}>
                                                                                        Mr.</option>
                                                                                </select>

                                                                            </div>
                                                                            <!--end::Input group-->
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <!--begin::Input group-->
                                                                            <div class="fv-row mb-7">
                                                                                <!--begin::Label-->
                                                                                <label class="fs-6 fw-bold mb-2">First
                                                                                    Name</label>
                                                                                <!--end::Label-->

                                                                                <input type="text"
                                                                                    class="form-control form-control-solid col-md-6"
                                                                                    placeholder="" name="first_name"
                                                                                    value="{{ $customer->first_name }}" />

                                                                            </div>
                                                                            <!--end::Input group-->
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            <!--begin::Input group-->
                                                                            <div class="fv-row mb-7">
                                                                                <!--begin::Label-->
                                                                                <label class="fs-6 fw-bold mb-2">Last
                                                                                    Name</label>
                                                                                <!--end::Label-->
                                                                                <!--begin::Input-->
                                                                                <input type="text"
                                                                                    class="form-control form-control-solid"
                                                                                    placeholder="" name="last_name"
                                                                                    value="{{ $customer->last_name }}" />
                                                                                <!--end::Input-->
                                                                            </div>
                                                                            <!--end::Input group-->
                                                                        </div>

                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <!--begin::Input group-->
                                                                            <div class="fv-row mb-7">
                                                                                <!--begin::Input group-->
                                                                                <div class="fv-row mb-7">
                                                                                    <!--begin::Label-->
                                                                                    <label class="fs-6 fw-bold mb-2">
                                                                                        <span>Email</span>
                                                                                    </label>
                                                                                    <!--end::Label-->
                                                                                    <input type="text"
                                                                                        class="form-control form-control-solid"
                                                                                        placeholder="" name="email"
                                                                                        value="{{ $customer->email }}" />
                                                                                    <div id="errorMessages_email"
                                                                                        class="text-danger">
                                                                                    </div>
                                                                                </div>
                                                                                <!--end::Input group-->

                                                                            </div>
                                                                            <!--end::Input group-->

                                                                        </div>
                                                                    </div>


                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <!--begin::Input group-->
                                                                            <div class="fv-row mb-7">
                                                                                <!--begin::Label-->
                                                                                <label class="fs-6 fw-bold mb-2">
                                                                                    <span>Phone no.</span>

                                                                                </label>
                                                                                <!--end::Label-->
                                                                                <!--begin::Input-->
                                                                                @php
                                                                                    $code = null;
                                                                                    $phoneNo = null;
                                                                                    if ($customer->phone !== null) {
                                                                                        $ph = $customer->phone;
                                                                                        $phoneNo = substr($ph, -8);
                                                                                        $code = substr($ph, 0, -8);
                                                                                    }
                                                                                @endphp
                                                                                <div class="row">
                                                                                    <div class="col-md-5">
                                                                                        <select
                                                                                            class="form-select form-select-solid"
                                                                                            data-control="select2"
                                                                                            data-dropdown-parent="#kt_modal_1"
                                                                                            data-placeholder="M..."
                                                                                            name="code"
                                                                                            data-allow-clear="true">
                                                                                            <option value="+852"
                                                                                                {{ $code == '+852' ? 'selected' : '' }}>
                                                                                                +852</option>
                                                                                            <option value="+86"
                                                                                                {{ $code == '+86' ? 'selected' : '' }}>
                                                                                                +86</option>
                                                                                        </select>
                                                                                    </div>

                                                                                    <div class="col-md-7">
                                                                                        <input type="phone"
                                                                                            class="form-control form-control-solid col-md-6"
                                                                                            placeholder="" name="phone"
                                                                                            value="{{ $phoneNo }}" />
                                                                                    </div>
                                                                                </div>
                                                                                <div id="errorMessages"
                                                                                    class="text-danger">
                                                                                </div>
                                                                                <!--end::Input-->
                                                                            </div>
                                                                            <!--end::Input group-->
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <!--begin::Input group-->
                                                                            <div class="fv-row mb-7">
                                                                                <!--begin::Label-->
                                                                                <label class="fs-6 fw-bold mb-2">Date of
                                                                                    birth</label>
                                                                                <!--end::Label-->
                                                                                <!--begin::Input-->
                                                                              
                                                                                <input type="date"
                                                                                    class="form-control form-control-solid"
                                                                                    placeholder="" name="dob"
                                                                                    value="{{ isset($customer->dob) ? date('d/m/Y', strtotime($customer->dob)) : '' }}" />

                                                                                <!--end::Input-->
                                                                            </div>
                                                                            <!--end::Input group-->
                                                                        </div>

                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <!--begin::Input group-->
                                                                            <div class="fv-row mb-7">
                                                                                <!--begin::Input group-->
                                                                                <div class="fv-row mb-7">
                                                                                    <!--begin::Label-->
                                                                                    <label class="fs-6 fw-bold mb-2">
                                                                                        <span>District</span>

                                                                                    </label>
                                                                                    <!--end::Label-->
                                                                                    <select
                                                                                        class="form-select form-select-solid"
                                                                                        data-control="select2"
                                                                                        data-dropdown-parent="#kt_modal_1"
                                                                                        data-placeholder="Select an option"
                                                                                        name="district_id"
                                                                                        data-allow-clear="true">
                                                                                        <option>District</option>
                                                                                        @foreach ($districtList as $list)
                                                                                            <option
                                                                                                value="{{ $list->id }}"
                                                                                                {{ $list->id == $customer->district_id ? 'selected' : '' }}>
                                                                                                {{ $list->name_en }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                                <!--end::Input group-->
                                                                            </div>
                                                                            <!--end::Input group-->
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <!--begin::Input group-->
                                                                            <div class="fv-row mb-7">
                                                                                <!--begin::Input group-->
                                                                                <div class="fv-row mb-7">
                                                                                    <!--begin::Label-->
                                                                                    <label class="fs-6 fw-bold mb-2">
                                                                                        <span>Area</span>
                                                                                    </label>
                                                                                    <!--end::Label-->
                                                                                    <select name="area_id"
                                                                                        class="form-select form-select-solid"
                                                                                        data-control="select2"
                                                                                        data-dropdown-parent="#kt_modal_1"
                                                                                        data-placeholder="Select an option"
                                                                                        data-allow-clear="true">
                                                                                        <option>Area</option>
                                                                                        @foreach ($areaList as $list)
                                                                                            <option
                                                                                                value="{{ $list->id }}"
                                                                                                {{ $list->id == $customer->area_id ? 'selected' : '' }}>
                                                                                                {{ $list->name_en }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                                <!--end::Input group-->
                                                                            </div>
                                                                            <!--end::Input group-->
                                                                        </div>
                                                                    </div>


                                                                    <div class="row">
                                                                        {{-- <div class="col-md-6">
                                                                        <!--begin::Input group-->
                                                                        <div class="fv-row mb-15">
                                                                            <!--begin::Input group-->
                                                                            <div class="fv-row mb-7">
                                                                                <!--begin::Label-->
                                                                                <label class="fs-6 fw-bold mb-2">
                                                                                    <span>Country</span>
                                                                                </label>
                                                                                <!--end::Label-->
                                                                                <input type="text"
                                                                                    class="form-control form-control-solid"
                                                                                    placeholder="" name="country"
                                                                                    value="Hong Kong" readonly />
                                                                            </div>
                                                                            <!--end::Input group-->
                                                                        </div>
                                                                        <!--end::Input group-->
                                                                    </div> --}}
                                                                        <div class="col-md-12">
                                                                            <!--begin::Input group-->
                                                                            <div class="fv-row mb-7">
                                                                                <!--begin::Input group-->
                                                                                <div class="fv-row mb-7">
                                                                                    <!--begin::Label-->
                                                                                    <label class="fs-6 fw-bold mb-2">
                                                                                        <span>Address</span>
                                                                                    </label>
                                                                                    <!--end::Label-->
                                                                                    <input type="text"
                                                                                        class="form-control form-control-solid"
                                                                                        placeholder="" name="address"
                                                                                        value="{{ $customer->address }}" />
                                                                                </div>
                                                                                <!--end::Input group-->
                                                                            </div>
                                                                            <!--end::Input group-->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--end::User form-->
                                                            </div>
                                                            <!--end::Scroll-->
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                    </form>
                                                    {{-- form end --}}

                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Details toggle-->
                                        <div class="separator separator-dashed my-3"></div>
                                        <!--begin::Details content-->
                                        <div id="kt_customer_view_details" class="collapse show">
                                            <div class="fs-6">
                                                <!--begin::Details item-->
                                                <div class="fw-bolder mt-5">Account ID</div>
                                                <div class="text-gray-600">
                                                    Q8{{ str_pad($customer->id, 7, '0', STR_PAD_LEFT) }}</div>
                                                <!--begin::Details item-->
                                                <!--begin::Details item-->
                                                <div class="fw-bolder mt-5">Email
                                                    @if ($customer->email)
                                                        @if ($customer->email_is_verified == 1)
                                                            <span class="svg-icon svg-icon-2 svg-icon-success">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <rect opacity="0.3" x="2" y="2" width="20"
                                                                        height="20" rx="10"
                                                                        fill="currentColor" />
                                                                    <path
                                                                        d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                        fill="currentColor" />
                                                                </svg>
                                                            </span>
                                                        @else
                                                            <span class="badge badge-danger">need to verify</span>
                                                        @endif



                                                    @endif
                                                </div>
                                                <div class="text-gray-600">
                                                    @if (isset($customer) && isset($customer->email))
                                                        @if ($customer->admin_verified_email == 1)
                                                            <span class="fs-8 text-primary text-bold">(Updated by
                                                                admin)</span>
                                                        @endif
                                                        {{ $customer->email }}
                                                    @endif
                                                </div>
                                                <!--begin::Details item-->
                                                <!--begin::Details item-->
                                                <div class="fw-bolder mt-5">Phone
                                                    @if ($customer->phone)
                                                        @php
                                                            $code = null;
                                                            $phoneNo = null;
                                                            if ($customer->phone !== null) {
                                                                $ph = $customer->phone;
                                                                $phoneNo = substr($ph, -8);
                                                                $code = substr($ph, 0, -8);
                                                            }
                                                        @endphp
                                                        @if ($customer->is_verified == 1)
                                                            <span class="svg-icon svg-icon-2 svg-icon-success">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <rect opacity="0.3" x="2" y="2" width="20"
                                                                        height="20" rx="10"
                                                                        fill="currentColor" />
                                                                    <path
                                                                        d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                        fill="currentColor" />
                                                                </svg>
                                                            </span>
                                                        @else
                                                            <span class="badge badge-danger">need to verify</span>
                                                        @endif
                                                    @endif
                                                </div>
                                                <div class="text-gray-600">
                                                    @if ($customer->admin_verified_phone == 1)
                                                        <span class="fs-8 text-primary text-bold">(Updated by admin)</span>
                                                    @endif
                                                    {{-- @if (isset($customer) && isset($customer->phone)) --}}
                                                    {{ $code . ' ' . substr($phoneNo, 0, 4) . ' ' . substr($phoneNo, 4, 4) }}

                                                    {{-- @endif --}}
                                                </div>

                                                <div class="fw-bolder mt-5">Date of Birth</div>
                                                <div class="text-gray-600">
                                                    @if (isset($customer) && isset($customer->dob))
                                                        {{ $customer->dob }}
                                                    @endif
                                                </div>
                                                <!--begin::Details item-->
                                                <!--begin::Details item-->
                                                <div class="fw-bolder mt-5">Address</div>
                                                <div class="text-gray-600">
                                                    {{ $customer->address }}
                                                    <br>
                                                    @if ($customer->district_id != null)
                                                        {{ $customer->district->name_en }},
                                                        @endif @if ($customer->area_id != null)
                                                            {{ $customer->area->name_en }}
                                                        @endif {{ $customer->country }}
                                                </div>
                                                <!--begin::Details item-->
                                            </div>
                                        </div>
                                        <!--end::Details content-->

                                        <div class="d-flex flex-stack fs-4 py-3">
                                            <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse"
                                                href="#kt_customer_view_coupon" role="button" aria-expanded="false"
                                                aria-controls="kt_customer_view_coupon">Coupons
                                                <span class="ms-2 rotate-180">
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                    <span class="svg-icon svg-icon-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                            <path
                                                                d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </span>
                                            </div>
                                        </div>

                                        <!--end::Details toggle-->
                                        <div class="separator separator-dashed my-3"></div>
                                        <!--begin::Details content-->
                                        <div id="kt_customer_view_coupon" class="collapse show">

                                            <div class="card-header-stretch">
                                                <h3 class="card-title"></h3>
                                                <div class="card-toolbar" style="display: flex; justify-content:center;">
                                                    <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" data-bs-toggle="tab"
                                                                href="#kt_tab_pane_a">Available</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-bs-toggle="tab"
                                                                href="#kt_tab_pane_u">Used/Expired</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="separator separator-dashed"></div>


                                            <div class="tab-content mt-5" id="myTabContent">
                                                <div class="tab-pane fade show active" id="kt_tab_pane_a"
                                                    role="tabpanel">
                                                    <div class="card card-flush h-xl-100">

                                                        <!--begin::Body-->
                                                        <div class="card-body" style="padding:0 !important">

                                                            <!--begin::Scroll-->
                                                            <div class="hover-scroll-overlay-y pe-6 me-n6"
                                                                style="height: 350px">
                                                                <!--begin::Item-->
                                                                @forelse ($available as $list)
                                                                    <div
                                                                        class="rounded border-gray-300 border-1 border-gray-300 border-dashed px-7 py-3 mb-6">
                                                                        <!--begin::Info-->
                                                                        <div class="d-flex flex-stack">

                                                                            <!--begin::Icon-->
                                                                            {{-- <img src="{{ asset($list->merchant->icon) }}"
                                                                            class="w-100"
                                                                            alt="" /> --}}
                                                                            <table>
                                                                                <tr>
                                                                                    <td class="min-w-55px">
                                                                                        <div class="symbol symbol-50px">
                                                                                            @if($list->owner_type==0)
                                                                                            <div class="symbol-label"
                                                                                                style="background-image:url('{{ asset($list->icon) }}')">
                                                                                            </div>
                                                                                            @else
                                                                                            <div class="symbol-label"
                                                                                            style="background-image:url('{{isset($list->merchantIcon) ? $list->merchantIcon :''}}')">
                                                                                            </div>
                                                                                            @endif
                                                                                        </div>
                                                                                    </td> 
                                                                                    <td>
                                                                                        <span
                                                                                            class="text-gray-400 fw-bolder">{{ $list->name_en }}
                                                                                        </span>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                        <!--end::Info-->
                                                                        <!--begin::Customer-->
                                                                        {{-- <div class="d-flex flex-stack">
                                                                    <!--begin::Name-->
                                                                    <span class="text-gray-400 fw-bolder">{{ $list->name_en }}
                                                                    </span>
                                                                    <!--end::Name-->
                                                                   
                                                                </div> --}}
                                                                        <!--end::Customer-->
                                                                    </div>
                                                                @empty
                                                                    <div class="py-0"
                                                                        data-kt-customer-payment-method="row">
                                                                        <div
                                                                            class="py-3 ms-lg-2  d-flex flex-stack flex-wrap">
                                                                            {{-- <p class="text-gray-800">no data found</p> --}}
                                                                            <div class="text-gray-800 fw-bolder">
                                                                                No data found...
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforelse
                                                                <!--end::Item-->
                                                            </div>
                                                            <!--end::Scroll-->
                                                        </div>
                                                        <!--end::Body-->
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="kt_tab_pane_u" role="tabpanel">
                                                    <div class="card card-flush h-xl-100">

                                                        <!--begin::Body-->
                                                        <div class="card-body" style="padding:0 !important">

                                                            <!--begin::Scroll-->
                                                            <div class="hover-scroll-overlay-y pe-6 me-n6"
                                                                style="height: 350px">
                                                                <!--begin::Item-->
                                                                @forelse ($used as $list)
                                                                    <div
                                                                        class="rounded border-gray-300 border-1 border-gray-300 border-dashed px-7 py-3 mb-6">
                                                                        <!--begin::Info-->
                                                                        <div class="d-flex flex-stack">

                                                                            <!--begin::Icon-->
                                                                            {{-- <img src="{{ asset($list->merchant->icon) }}"
                                                                            class="w-100"
                                                                            alt="" /> --}}
                                                                            <table>
                                                                                <tr>
                                                                                    <td class="min-w-55px">
                                                                                        <div class="symbol symbol-50px">
                                                                                            {{-- <div class="symbol-label"
                                                                                                style="background-image:url('{{ asset($list->icon) }}')">
                                                                                            </div> --}}
                                                                                             @if($list->owner_type==0)
                                                                                            <div class="symbol-label"
                                                                                                style="background-image:url('{{ asset($list->icon) }}')">
                                                                                            </div>
                                                                                            @else
                                                                                            <div class="symbol-label"
                                                                                            style="background-image:url('{{isset($list->merchantIcon) ? $list->merchantIcon :''}}')">
                                                                                            </div>
                                                                                            @endif
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <span
                                                                                            class="text-gray-400 fw-bolder">{{ $list->name_en }}
                                                                                        </span>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                        <!--end::Info-->
                                                                        <!--begin::Customer-->
                                                                        {{-- <div class="d-flex flex-stack">
                                                                    <!--begin::Name-->
                                                                    <span class="text-gray-400 fw-bolder">{{ $list->name_en }}
                                                                    </span>
                                                                    <!--end::Name-->
                                                                   
                                                                </div> --}}
                                                                        <!--end::Customer-->
                                                                    </div>
                                                                @empty
                                                                    <div class="py-0"
                                                                        data-kt-customer-payment-method="row">
                                                                        <div
                                                                            class="py-3 ms-lg-2  d-flex flex-stack flex-wrap">
                                                                            {{-- <p class="text-gray-800">no data found</p> --}}
                                                                            <div class="text-gray-800 fw-bolder">
                                                                                No data found...
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforelse
                                                                <!--end::Item-->
                                                            </div>
                                                            <!--end::Scroll-->
                                                        </div>
                                                        <!--end::Body-->
                                                    </div>

                                                </div>


                                            </div>
                                        </div>
                                        <!--end::Details content-->
                                    </div>
                                </div>


                            </div>

                            <div class="flex-lg-row-fluid ms-lg-15">

                                <!--begin::related partner-->
                                <div class="card pt-4 mb-6 mb-xl-9">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <h2 class="fw-bolder mb-0">Health Profile</h2>
                                        </div>
                                        <!--end::Card title-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div id="kt_customer_view_payment_method" class="card-body pt-0">


                                        <!--begin::Health Record-->
                                        <div class="py-0" data-kt-customer-payment-method="row">
                                            <!--begin::Header-->
                                            <div class="py-3 d-flex flex-stack flex-wrap">
                                                <!--begin::Toggle-->
                                                <div class="d-flex align-items-center collapsible rotate"
                                                    data-bs-toggle="collapse" href="#kt_customer_view_payment_method_h"
                                                    role="button" aria-expanded="false"
                                                    aria-controls="kt_customer_view_payment_method_h">
                                                    <!--begin::Arrow-->
                                                    <div class="me-3 rotate-90">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
                                                        <span class="svg-icon svg-icon-3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <path
                                                                    d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z"
                                                                    fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </div>
                                                    <!--end::Arrow-->
                                                    <!--begin::Summary-->
                                                    <div class="me-3">
                                                        <div class="d-flex align-items-center">
                                                            <div class="text-gray-800 fw-bolder">
                                                                Health Record
                                                            </div>
                                                        </div>
                                                        <div class="text-muted">Blood Type :
                                                            {{ isset($health_record) ? $health_record->blood_type_name : '-' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Toggle-->

                                            </div>
                                            <!--end::Header-->
                                            <!--begin::Body-->
                                            <div id="kt_customer_view_payment_method_h" class="collapse show fs-6 ps-10"
                                                data-bs-parent="#kt_customer_view_payment_method">
                                                <!--begin::Details-->
                                                <div class="d-flex flex-wrap py-5">
                                                    <!--begin::Col-->
                                                    <div class="flex-equal me-5">
                                                        <table class="table table-flush fw-bold gy-1">
                                                            <tr>
                                                                <td class="text-muted min-w-125px w-125px">
                                                                    Height</td>
                                                                <td class="text-gray-800">
                                                                    {{ isset($health_record) ? $health_record->height : '-' }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted min-w-125px w-125px">
                                                                    Weight
                                                                </td>
                                                                <td class="text-gray-800">
                                                                    {{ isset($health_record) ? $health_record->weight : '-' }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted min-w-125px w-125px">
                                                                    Renal Function
                                                                </td>
                                                                <td class="text-gray-800">

                                                                    @if (isset($health_record) && isset($health_record->renal_function))
                                                                        @if ($health_record->renal_function == 0)
                                                                            Normal
                                                                        @else
                                                                            Abnormal
                                                                        @endif
                                                                    @else
                                                                        -
                                                                    @endif
                                                                </td>
                                                            </tr>

                                                        </table>
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="flex-equal">
                                                        <table class="table table-flush fw-bold gy-1">
                                                            <tr>
                                                                <td class="text-muted min-w-125px w-125px">
                                                                    Drinking</td>
                                                                <td class="text-gray-800">
                                                                    @if (isset($health_record) && isset($health_record->drinking))
                                                                        @if ($health_record->drinking == 1)
                                                                            Yes
                                                                        @else
                                                                            No
                                                                        @endif
                                                                    @else
                                                                        -
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted min-w-125px w-125px">
                                                                    Smoking</td>
                                                                <td class="text-gray-800">
                                                                    @if (isset($health_record) && isset($health_record->smoking))
                                                                        @if ($health_record->smoking == 1)
                                                                            Yes
                                                                        @else
                                                                            No
                                                                        @endif
                                                                    @else
                                                                        -
                                                                    @endif
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="text-muted min-w-125px w-125px">
                                                                    Liver Function</td>
                                                                <td class="text-gray-800">
                                                                    @if (isset($health_record) && isset($health_record->liver_function))
                                                                        @if ($health_record->liver_function == 0)
                                                                            Normal
                                                                        @else
                                                                            Abnormal
                                                                        @endif
                                                                    @else
                                                                        -
                                                                    @endif
                                                                </td>
                                                            </tr>

                                                        </table>
                                                    </div>
                                                    <!--end::Col-->
                                                    <table class="table table-flush fw-bold gy-1"
                                                        style="margin-top:-11px !important">
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-200px">
                                                                Personal Medical History
                                                            </td>
                                                            <td class="text-gray-800">
                                                                @if (isset($health_record) && isset($health_record->personal_medicial_history))
                                                                    @if ($health_record->personal_medicial_history == 1)
                                                                        Yes
                                                                    @else
                                                                        No
                                                                    @endif
                                                                @else
                                                                    -
                                                                @endif

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-200px">
                                                                Family Medical History
                                                            </td>
                                                            <td class="text-gray-800">
                                                                @if (isset($health_record) && isset($health_record->family_medicial_history))
                                                                    @if ($health_record->family_medicial_history == 1)
                                                                        Yes
                                                                    @else
                                                                        No
                                                                    @endif
                                                                @else
                                                                    -
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted min-w-125px w-200px">
                                                                Allergies
                                                            </td>
                                                            <td class="text-gray-800">
                                                                @if (isset($health_record) && isset($health_record->allergic_history))
                                                                    @if ($health_record->allergic_history == 1)
                                                                        Yes
                                                                    @else
                                                                        No
                                                                    @endif
                                                                @else
                                                                    -
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Health Record-->
                                        <div class="separator separator-dashed"></div>

                                        <!--begin::Health Record-->
                                        <div class="py-0" data-kt-customer-payment-method="row">
                                            <!--begin::Header-->
                                            <div class="py-3 d-flex flex-stack flex-wrap">
                                                <!--begin::Toggle-->
                                                <div class="d-flex align-items-center collapsible rotate"
                                                    data-bs-toggle="collapse" href="#kt_customer_view_payment_method_v"
                                                    role="button" aria-expanded="false"
                                                    aria-controls="kt_customer_view_payment_method_v">
                                                    <!--begin::Arrow-->
                                                    <div class="me-3 rotate-90">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
                                                        <span class="svg-icon svg-icon-3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <path
                                                                    d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z"
                                                                    fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </div>
                                                    <!--end::Arrow-->
                                                    <!--begin::Summary-->
                                                    <div class="me-3">
                                                        <div class="d-flex align-items-center">
                                                            <div class="text-gray-800 fw-bolder">
                                                                Vaccination Record
                                                            </div>
                                                        </div>
                                                        {{-- <div class="text-muted">Blood Type - A
                                                        </div> --}}
                                                    </div>
                                                </div>
                                                <!--end::Toggle-->

                                            </div>
                                            <!--end::Header-->
                                            <!--begin::Body-->
                                            <div id="kt_customer_view_payment_method_v" class="collapse fs-6 ps-10"
                                                data-bs-parent="#kt_customer_view_payment_method">
                                                <!--begin::Details-->
                                                <div class="d-flex flex-wrap py-5">
                                                    <!--begin::Col-->
                                                    <div class="flex-equal me-5">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped gy-7 gs-7">
                                                                <thead>
                                                                    <tr
                                                                        class="fw-semibold fs-6 text-gray-800 border-bottom border-gray-200">
                                                                        <th>Vaccination Date</th>
                                                                        <th>Vaccine</th>
                                                                        <th>Age</th>
                                                                        <th>Remarks</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @forelse ($vaccination_record as $vacci)
                                                                        <tr>
                                                                            <td>{{ $vacci->vaccination_date }}</td>
                                                                            <td>{{ $vacci->vaccine_name }}</td>
                                                                            <td>{{ $vacci->age_group_name }}</td>
                                                                            <td>{{ $vacci->remarks }}</td>

                                                                        </tr>
                                                                    @empty
                                                                        <div class="text-gray-800 fw-bolder">
                                                                            No data found...
                                                                        </div>
                                                                    @endforelse

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <!--end::Col-->

                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Health Record-->

                                        <div class="separator separator-dashed"></div>


                                        <!--begin::Body Check Record-->
                                        <div class="py-0" data-kt-customer-payment-method="row">
                                            <!--begin::Header-->
                                            <div class="py-3 d-flex flex-stack flex-wrap">
                                                <!--begin::Toggle-->
                                                <div class="d-flex align-items-center collapsible rotate"
                                                    data-bs-toggle="collapse" href="#kt_customer_view_payment_method_b"
                                                    role="button" aria-expanded="false"
                                                    aria-controls="kt_customer_view_payment_method_b">
                                                    <!--begin::Arrow-->
                                                    <div class="me-3 rotate-90">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
                                                        <span class="svg-icon svg-icon-3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <path
                                                                    d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z"
                                                                    fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </div>
                                                    <!--end::Arrow-->
                                                    <!--begin::Summary-->
                                                    <div class="me-3">
                                                        <div class="d-flex align-items-center">
                                                            <div class="text-gray-800 fw-bolder">
                                                                Body Check Record
                                                            </div>
                                                        </div>
                                                        {{-- <div class="text-muted">Blood Type - A
                                                        </div> --}}
                                                    </div>
                                                </div>
                                                <!--end::Toggle-->

                                            </div>
                                            <!--end::Header-->
                                            <!--begin::Body-->
                                            <div id="kt_customer_view_payment_method_b" class="collapse fs-6 ps-10"
                                                data-bs-parent="#kt_customer_view_payment_method">
                                                <!--begin::Files-->
                                                <div class="d-flex flex-column mb-9 mt-5">
                                                    @forelse ($bodyCheck_record as $record)
                                                        <!--begin::File-->
                                                        <div class="d-flex align-items-center mb-5 mt-3">
                                                            <!--begin::Icon-->
                                                            <div class="symbol symbol-30px me-5">
                                                                <svg height="30px" width="30px" version="1.1"
                                                                    id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                    viewBox="0 0 309.537 309.537" xml:space="preserve"
                                                                    fill="#000000">
                                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                        stroke-linejoin="round"></g>
                                                                    <g id="SVGRepo_iconCarrier">
                                                                        <g>
                                                                            <path style="fill:#E2574C;"
                                                                                d="M270.744,0.271V0c0,0-156.827,0.193-212.573,0.251c-10.931,0-19.378,8.215-19.378,19.378v289.899 h212.621c10.67,0,19.329-8.659,19.329-19.329V19.59h19.329V0.261C290.073,0.261,270.744,0.271,270.744,0.271z">
                                                                            </path>
                                                                            <path style="fill:#B53629;"
                                                                                d="M232.086,290.208c0-10.67,8.659-19.329,19.329-19.329H19.464c-10.67,0-19.329,8.659-19.329,19.329 s8.659,19.329,19.329,19.329h231.95C240.745,309.538,232.086,300.878,232.086,290.208z">
                                                                            </path>
                                                                            <path style="fill:#B53629;"
                                                                                d="M290.073,0.271c-10.67,0-19.329,8.659-19.329,19.329v19.329h19.329 c10.67,0,19.329-8.659,19.329-19.329C309.402,8.92,300.743,0.271,290.073,0.271z">
                                                                            </path>
                                                                            <path style="fill:#FFFFFF;"
                                                                                d="M217.569,137.15c3.247,0,4.832-2.832,4.832-5.567c0-2.832-1.662-5.567-4.832-5.567h-18.44 c-3.586,0-5.605,2.986-5.605,6.282v45.317c0,4.04,2.3,6.282,5.402,6.282c3.102,0,5.403-2.242,5.403-6.282v-12.438h11.153 c3.47,0,5.19-2.832,5.19-5.644c0-2.754-1.72-5.49-5.19-5.49h-11.153V137.15H217.569z M155.242,126.017H141.75 c-3.663,0-6.263,2.513-6.263,6.243v45.395c0,4.629,3.74,6.079,6.437,6.079h14.139c16.758,0,27.824-11.027,27.824-28.047 C183.879,137.701,173.479,126.017,155.242,126.017z M155.9,172.542h-8.234v-35.334h7.422c11.211,0,16.101,7.529,16.101,17.918 C171.189,164.839,166.395,172.542,155.9,172.542z M106.465,126.017H93.099c-3.779,0-5.866,2.493-5.866,6.282v45.317 c0,4.04,2.397,6.282,5.644,6.282s5.683-2.242,5.683-6.282v-13.221h8.36c10.341,0,18.875-7.326,18.875-19.107 C125.794,133.758,117.56,126.017,106.465,126.017z M106.243,153.764H98.56v-17.106h7.683c4.755,0,7.78,3.702,7.78,8.553 C114.013,150.043,110.998,153.764,106.243,153.764z">
                                                                            </path>
                                                                        </g>
                                                                    </g>
                                                                </svg>
                                                            </div>
                                                            <!--end::Icon-->
                                                            <!--begin::Details-->
                                                            <div class="fw-bold">
                                                                <a class="fs-6 fw-bolder text-dark text-hover-primary"
                                                                    href="{{ asset('storage/healthrecord/' . $record->file) }}"
                                                                    target="_blank">{{ $record->report_name }}</a>
                                                                <div class="text-gray-400">{{ $record->report_date }}
                                                                    <span class="text-dark">{{ $record->remarks }}</span>
                                                                </div>
                                                            </div>
                                                            <!--end::Details-->
                                                        </div>
                                                        <!--end::File-->
                                                        <div class="separator separator-dashed"></div>
                                                    @empty
                                                        <div class="text-gray-800 fw-bolder">
                                                            No data found...
                                                        </div>
                                                    @endforelse


                                                </div>
                                                <!--end::Files-->

                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Body Check Record-->
                                        <div class="separator separator-dashed"></div>

                                        <!--begin::Body Check Record-->
                                        <div class="py-0" data-kt-customer-payment-method="row">
                                            <!--begin::Header-->
                                            <div class="py-3 d-flex flex-stack flex-wrap">
                                                <!--begin::Toggle-->
                                                <div class="d-flex align-items-center collapsible rotate"
                                                    data-bs-toggle="collapse" href="#kt_customer_view_payment_method_m"
                                                    role="button" aria-expanded="false"
                                                    aria-controls="kt_customer_view_payment_method_m">
                                                    <!--begin::Arrow-->
                                                    <div class="me-3 rotate-90">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
                                                        <span class="svg-icon svg-icon-3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <path
                                                                    d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z"
                                                                    fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </div>
                                                    <!--end::Arrow-->
                                                    <!--begin::Summary-->
                                                    <div class="me-3">
                                                        <div class="d-flex align-items-center">
                                                            <div class="text-gray-800 fw-bolder">
                                                                Medical Record
                                                            </div>
                                                        </div>
                                                        {{-- <div class="text-muted">Blood Type - A
                                                        </div> --}}
                                                    </div>
                                                </div>
                                                <!--end::Toggle-->

                                            </div>
                                            <!--end::Header-->
                                            <!--begin::Body-->
                                            <div id="kt_customer_view_payment_method_m" class="collapse fs-6 ps-10"
                                                data-bs-parent="#kt_customer_view_payment_method">
                                                <div class="d-flex flex-column mb-9 mt-5">
                                                    @forelse ($medicalCheck_record as $record)
                                                        <!--begin::File-->
                                                        <div class="d-flex align-items-center mb-5 mt-3">
                                                            <!--begin::Icon-->
                                                            <div class="symbol symbol-30px me-5">
                                                                <svg height="30px" width="30px" version="1.1"
                                                                    id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                    viewBox="0 0 309.537 309.537" xml:space="preserve"
                                                                    fill="#000000">
                                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                        stroke-linejoin="round"></g>
                                                                    <g id="SVGRepo_iconCarrier">
                                                                        <g>
                                                                            <path style="fill:#E2574C;"
                                                                                d="M270.744,0.271V0c0,0-156.827,0.193-212.573,0.251c-10.931,0-19.378,8.215-19.378,19.378v289.899 h212.621c10.67,0,19.329-8.659,19.329-19.329V19.59h19.329V0.261C290.073,0.261,270.744,0.271,270.744,0.271z">
                                                                            </path>
                                                                            <path style="fill:#B53629;"
                                                                                d="M232.086,290.208c0-10.67,8.659-19.329,19.329-19.329H19.464c-10.67,0-19.329,8.659-19.329,19.329 s8.659,19.329,19.329,19.329h231.95C240.745,309.538,232.086,300.878,232.086,290.208z">
                                                                            </path>
                                                                            <path style="fill:#B53629;"
                                                                                d="M290.073,0.271c-10.67,0-19.329,8.659-19.329,19.329v19.329h19.329 c10.67,0,19.329-8.659,19.329-19.329C309.402,8.92,300.743,0.271,290.073,0.271z">
                                                                            </path>
                                                                            <path style="fill:#FFFFFF;"
                                                                                d="M217.569,137.15c3.247,0,4.832-2.832,4.832-5.567c0-2.832-1.662-5.567-4.832-5.567h-18.44 c-3.586,0-5.605,2.986-5.605,6.282v45.317c0,4.04,2.3,6.282,5.402,6.282c3.102,0,5.403-2.242,5.403-6.282v-12.438h11.153 c3.47,0,5.19-2.832,5.19-5.644c0-2.754-1.72-5.49-5.19-5.49h-11.153V137.15H217.569z M155.242,126.017H141.75 c-3.663,0-6.263,2.513-6.263,6.243v45.395c0,4.629,3.74,6.079,6.437,6.079h14.139c16.758,0,27.824-11.027,27.824-28.047 C183.879,137.701,173.479,126.017,155.242,126.017z M155.9,172.542h-8.234v-35.334h7.422c11.211,0,16.101,7.529,16.101,17.918 C171.189,164.839,166.395,172.542,155.9,172.542z M106.465,126.017H93.099c-3.779,0-5.866,2.493-5.866,6.282v45.317 c0,4.04,2.397,6.282,5.644,6.282s5.683-2.242,5.683-6.282v-13.221h8.36c10.341,0,18.875-7.326,18.875-19.107 C125.794,133.758,117.56,126.017,106.465,126.017z M106.243,153.764H98.56v-17.106h7.683c4.755,0,7.78,3.702,7.78,8.553 C114.013,150.043,110.998,153.764,106.243,153.764z">
                                                                            </path>
                                                                        </g>
                                                                    </g>
                                                                </svg>
                                                            </div>
                                                            <!--end::Icon-->
                                                            <!--begin::Details-->
                                                            <div class="fw-bold">
                                                                <a class="fs-6 fw-bolder text-dark text-hover-primary"
                                                                    href="{{ asset('storage/healthrecord/' . $record->file) }}"
                                                                    target="_blank">{{ $record->report_name }}</a>
                                                                <div class="text-gray-400">{{ $record->report_date }}
                                                                    <span class="text-dark">{{ $record->remarks }}</span>
                                                                </div>
                                                            </div>
                                                            <!--end::Details-->
                                                        </div>
                                                        <!--end::File-->
                                                        <div class="separator separator-dashed"></div>
                                                    @empty
                                                        <div class="text-gray-800 fw-bolder">
                                                            No data found...
                                                        </div>
                                                    @endforelse


                                                </div>

                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Body Check Record-->


                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::related partner-->
                                <!--begin::related partner-->
                                <div class="card pt-4 mb-6 mb-xl-9">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <h2 class="fw-bolder mb-0">Related Partner</h2>
                                        </div>
                                        <!--end::Card title-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div id="kt_customer_view_payment_method" class="card-body pt-0">

                                        @if (isset($familyMemeber) && count($familyMemeber) > 0)
                                            @foreach ($familyMemeber as $key => $member)
                                                <!--begin::Option-->
                                                <div class="py-0" data-kt-customer-payment-method="row">
                                                    <!--begin::Header-->
                                                    <div class="py-3 d-flex flex-stack flex-wrap">
                                                        <!--begin::Toggle-->
                                                        <div class="d-flex align-items-center collapsible rotate"
                                                            data-bs-toggle="collapse"
                                                            href="#kt_customer_view_payment_method_{{ $member->id }}"
                                                            role="button" aria-expanded="false"
                                                            aria-controls="kt_customer_view_payment_method_{{ $member->id }}">
                                                            <!--begin::Arrow-->
                                                            <div class="me-3 rotate-90">
                                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
                                                                <span class="svg-icon svg-icon-3">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24"
                                                                        fill="none">
                                                                        <path
                                                                            d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z"
                                                                            fill="currentColor" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </div>
                                                            <!--end::Arrow-->
                                                            <!--begin::Summary-->
                                                            <div class="me-3">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="text-gray-800 fw-bolder">
                                                                        {{ $member->first_name }}{{ $member->last_name }}
                                                                    </div>
                                                                    <div class="badge badge-light-primary ms-5">
                                                                        {{ isset($member->relationship) ? $member->relationship->name_en : '' }}
                                                                    </div>
                                                                </div>
                                                                <div class="text-muted">Date of birth -
                                                                    {{ $member->dob }}
                                                                </div>
                                                            </div>
                                                            <!--end::Summary-->
                                                        </div>
                                                        <!--end::Toggle-->
                                                        <!--begin::Toolbar-->
                                                        <div class="d-flex my-3 ms-9">

                                                            <!--begin::Menu-->
                                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold w-150px py-3"
                                                                data-kt-menu="true">
                                                                <!--begin::Menu item-->
                                                                <div class="menu-item px-3">
                                                                    <a href="#" class="menu-link px-3"
                                                                        data-kt-payment-mehtod-action="set_as_primary">Set
                                                                        as Primary</a>
                                                                </div>
                                                                <!--end::Menu item-->
                                                            </div>
                                                            <!--end::Menu-->
                                                            <!--end::More-->
                                                        </div>
                                                        <!--end::Toolbar-->
                                                    </div>
                                                    <!--end::Header-->
                                                    <!--begin::Body-->
                                                    <div id="kt_customer_view_payment_method_{{ $member->id }}"
                                                        class="collapse @if ($key == 0) show @endif fs-6 ps-10"
                                                        data-bs-parent="#kt_customer_view_payment_method">
                                                        <!--begin::Details-->
                                                        <div class="d-flex flex-wrap py-5">
                                                            <!--begin::Col-->
                                                            <div class="flex-equal me-5">
                                                                <table class="table table-flush fw-bold gy-1">
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-125px">
                                                                            Name
                                                                        </td>
                                                                        <td class="text-gray-800">
                                                                            {{ $member->first_name }}{{ $member->last_name }}
                                                                        </td>
                                                                    </tr>


                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-125px">
                                                                            ID type</td>
                                                                        <td class="text-gray-800">
                                                                            {{ $member->id_type }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-125px">
                                                                            ID Number</td>
                                                                        <td class="text-gray-800">
                                                                            {{ $member->id_number }}
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            <!--end::Col-->
                                                            <!--begin::Col-->
                                                            <div class="flex-equal">
                                                                <table class="table table-flush fw-bold gy-1">
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-125px">
                                                                            Phone</td>
                                                                        <td class="text-gray-800">
                                                                            {{-- {{ $member->phone }} --}}
                                                                            {{ substr($member->phone, 0, 4) . ' ' . substr($member->phone, 4, 4) . ' ' . substr($member->phone, 8) }}

                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-125px">
                                                                            Email</td>
                                                                        <td class="text-gray-800">
                                                                            {{ $member->email }}
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td class="text-muted min-w-125px w-125px">
                                                                            Relationship</td>
                                                                        <td class="text-gray-800">
                                                                            {{ isset($member->relationship) ? $member->relationship->name_en : '' }}
                                                                        </td>
                                                                    </tr>

                                                                </table>
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Details-->
                                                    </div>
                                                    <!--end::Body-->
                                                </div>
                                                <!--end::Option-->
                                                <div class="separator separator-dashed"></div>
                                            @endforeach
                                        @else
                                            <div class="py-0" data-kt-customer-payment-method="row">
                                                <div class="py-3 ms-lg-2  d-flex flex-stack flex-wrap">
                                                    {{-- <p class="text-gray-800">no data found</p> --}}
                                                    <div class="text-gray-800 fw-bolder">
                                                        No data found...
                                                    </div>
                                                </div>
                                            </div>
                                        @endif


                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::related partner-->

                                <!--begin::booking information-->


                                {{-- <div class="card pt-4 mb-6 mb-xl-9 shadow-sm">
                                    <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse" data-bs-target="#kt_docs_card_collapsible">
                                        <h3 class="card-title">Title</h3>
                                        <div class="card-toolbar rotate-180">
                                            <i class="ki-duotone ki-down fs-1"></i>
                                        </div>
                                    </div>
                                    <div id="kt_docs_card_collapsible" class="collapse show">
                                        <div class="card-body">
                                            Lorem Ipsum is simply dummy text...
                                        </div>
                                        <div class="card-footer">
                                            Footer
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- <div class="row"> --}}
                                <div class="d-flex flex-column flex-xl-row">
                                    <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
                                        <div class="card mb-6 mb-xl-9">
                                            <div class="">
                                                <div class="accordion-item">
                                                    <p class="accordion-header " id="kt_accordion_1_header_1">
                                                        <button class="accordion-button fs-4 fw-semibold collapsed"
                                                            type="button" data-bs-toggle="collapse"
                                                            data-bs-target="#kt_accordion_1_body_1" aria-expanded="false"
                                                            aria-controls="kt_accordion_1_body_1">
                                                            <h2 class="fw-bolder mb-0">Booking Information</h2>
                                                        </button>
                                                    </p>
                                                    <div id="kt_accordion_1_body_1" class="accordion-collapse collapse"
                                                        aria-labelledby="kt_accordion_1_header_1"
                                                        data-bs-parent="#kt_accordion_1">
                                                        <div class="accordion-body">


                                                            <div class="card-header-stretch">
                                                                <h3 class="card-title"></h3>
                                                                <div class="card-toolbar"
                                                                    style="display: flex; justify-content:center;">
                                                                    <ul
                                                                        class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0">
                                                                        <li class="nav-item">
                                                                            <a class="nav-link active"
                                                                                data-bs-toggle="tab"
                                                                                href="#kt_tab_pane_7">In Progress</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link" data-bs-toggle="tab"
                                                                                href="#kt_tab_pane_8">Completed</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link" data-bs-toggle="tab"
                                                                                href="#kt_tab_pane_9">Cancelled</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="separator separator-dashed"></div>


                                                            <div class="tab-content mt-5" id="myTabContent">
                                                                <div class="tab-pane fade show active" id="kt_tab_pane_7"
                                                                    role="tabpanel">
                                                                    @forelse ($pending_booking as $pending)
                                                                        <div class="d-flex flex-stack fs-6 py-3">
                                                                            <div class="me-3">
                                                                                <div class="d-flex align-items-center">
                                                                                    <div class="text-gray-800 fw-bolder">
                                                                                        Order ID -
                                                                                        {{ $pending->invoice_no }}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="text-muted">
                                                                                    Order date -
                                                                                    {{ date('d F Y', strtotime($pending->created_at)) }}
                                                                                </div>
                                                                            </div>

                                                                            <span data-bs-toggle="tooltip"
                                                                                data-bs-trigger="hover"
                                                                                title="View booking details">
                                                                                <a
                                                                                    href="{{ route('orders.show', [$pending->orders_id]) }}">
                                                                                    {{-- <span class="svg-icon svg-icon-3"> --}}
                                                                                    <svg width="25px" height="25px"
                                                                                        viewBox="0 0 24 24" fill="none"
                                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                                        <g id="SVGRepo_bgCarrier"
                                                                                            stroke-width="0"></g>
                                                                                        <g id="SVGRepo_tracerCarrier"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round"></g>
                                                                                        <g id="SVGRepo_iconCarrier">
                                                                                            <path
                                                                                                d="M20.188 10.9343C20.5762 11.4056 20.7703 11.6412 20.7703 12C20.7703 12.3588 20.5762 12.5944 20.188 13.0657C18.7679 14.7899 15.6357 18 12 18C8.36427 18 5.23206 14.7899 3.81197 13.0657C3.42381 12.5944 3.22973 12.3588 3.22973 12C3.22973 11.6412 3.42381 11.4056 3.81197 10.9343C5.23206 9.21014 8.36427 6 12 6C15.6357 6 18.7679 9.21014 20.188 10.9343Z"
                                                                                                fill="#2A4157"
                                                                                                fill-opacity="0.24"></path>
                                                                                            <circle cx="12"
                                                                                                cy="12" r="3"
                                                                                                fill="#222222"></circle>
                                                                                        </g>
                                                                                    </svg>
                                                                                    {{-- </span> --}}
                                                                                </a>

                                                                            </span>

                                                                        </div>
                                                                        <div class="separator separator-dashed"></div>
                                                                    @empty
                                                                        <div class="d-flex flex-stack fs-6 py-3">
                                                                            <div class="text-gray-800 fw-bolder">
                                                                                No data found...
                                                                            </div>
                                                                        </div>
                                                                    @endforelse


                                                                </div>

                                                                <div class="tab-pane fade" id="kt_tab_pane_8"
                                                                    role="tabpanel">
                                                                    @forelse ($completed_booking as $completed)
                                                                        <div class="d-flex flex-stack fs-6 py-3">
                                                                            <div class="me-3">
                                                                                <div class="d-flex align-items-center">
                                                                                    <div class="text-gray-800 fw-bolder">
                                                                                        Order ID -
                                                                                        {{ $completed->invoice_no }}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="text-muted">
                                                                                    Order date -
                                                                                    {{ date('d F Y', strtotime($completed->created_at)) }}
                                                                                </div>
                                                                            </div>

                                                                            <span data-bs-toggle="tooltip"
                                                                                data-bs-trigger="hover"
                                                                                title="View booking details">
                                                                                <a
                                                                                    href="{{ route('orders.show', [$completed->orders_id]) }}">
                                                                                    {{-- <span class="svg-icon svg-icon-3"> --}}
                                                                                    <svg width="25px" height="25px"
                                                                                        viewBox="0 0 24 24" fill="none"
                                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                                        <g id="SVGRepo_bgCarrier"
                                                                                            stroke-width="0"></g>
                                                                                        <g id="SVGRepo_tracerCarrier"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round"></g>
                                                                                        <g id="SVGRepo_iconCarrier">
                                                                                            <path
                                                                                                d="M20.188 10.9343C20.5762 11.4056 20.7703 11.6412 20.7703 12C20.7703 12.3588 20.5762 12.5944 20.188 13.0657C18.7679 14.7899 15.6357 18 12 18C8.36427 18 5.23206 14.7899 3.81197 13.0657C3.42381 12.5944 3.22973 12.3588 3.22973 12C3.22973 11.6412 3.42381 11.4056 3.81197 10.9343C5.23206 9.21014 8.36427 6 12 6C15.6357 6 18.7679 9.21014 20.188 10.9343Z"
                                                                                                fill="#2A4157"
                                                                                                fill-opacity="0.24"></path>
                                                                                            <circle cx="12"
                                                                                                cy="12" r="3"
                                                                                                fill="#222222"></circle>
                                                                                        </g>
                                                                                    </svg>
                                                                                    {{-- </span> --}}
                                                                                </a>

                                                                            </span>

                                                                        </div>
                                                                        <div class="separator separator-dashed"></div>
                                                                    @empty
                                                                        <div class="d-flex flex-stack fs-6 py-3">
                                                                            <div class="text-gray-800 fw-bolder">
                                                                                No data found...
                                                                            </div>
                                                                        </div>
                                                                    @endforelse

                                                                </div>

                                                                <div class="tab-pane fade" id="kt_tab_pane_9"
                                                                    role="tabpanel">
                                                                    @forelse ($cancelled_booking as $cancelled)
                                                                        <div class="d-flex flex-stack fs-6 py-3">
                                                                            <div class="me-3">
                                                                                <div class="d-flex align-items-center">
                                                                                    <div class="text-gray-800 fw-bolder">
                                                                                        Order ID -
                                                                                        {{ $cancelled->invoice_no }}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="text-muted">
                                                                                    Order date -
                                                                                    {{ date('d F Y', strtotime($cancelled->created_at)) }}
                                                                                </div>
                                                                            </div>

                                                                            <span data-bs-toggle="tooltip"
                                                                                data-bs-trigger="hover"
                                                                                title="View booking details">
                                                                                <a
                                                                                    href="{{ route('orders.show', [$cancelled->orders_id]) }}">
                                                                                    {{-- <span class="svg-icon svg-icon-3"> --}}
                                                                                    <svg width="25px" height="25px"
                                                                                        viewBox="0 0 24 24" fill="none"
                                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                                        <g id="SVGRepo_bgCarrier"
                                                                                            stroke-width="0"></g>
                                                                                        <g id="SVGRepo_tracerCarrier"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round"></g>
                                                                                        <g id="SVGRepo_iconCarrier">
                                                                                            <path
                                                                                                d="M20.188 10.9343C20.5762 11.4056 20.7703 11.6412 20.7703 12C20.7703 12.3588 20.5762 12.5944 20.188 13.0657C18.7679 14.7899 15.6357 18 12 18C8.36427 18 5.23206 14.7899 3.81197 13.0657C3.42381 12.5944 3.22973 12.3588 3.22973 12C3.22973 11.6412 3.42381 11.4056 3.81197 10.9343C5.23206 9.21014 8.36427 6 12 6C15.6357 6 18.7679 9.21014 20.188 10.9343Z"
                                                                                                fill="#2A4157"
                                                                                                fill-opacity="0.24"></path>
                                                                                            <circle cx="12"
                                                                                                cy="12" r="3"
                                                                                                fill="#222222"></circle>
                                                                                        </g>
                                                                                    </svg>
                                                                                    {{-- </span> --}}
                                                                                </a>

                                                                            </span>

                                                                        </div>
                                                                        <div class="separator separator-dashed"></div>
                                                                    @empty
                                                                        <div class="d-flex flex-stack fs-6 py-3">
                                                                            <div class="text-gray-800 fw-bolder">
                                                                                No data found...
                                                                            </div>
                                                                        </div>
                                                                    @endforelse

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10 ms-lg-15">
                                        <div class="card mb-6 mb-xl-9">
                                            <div class="">
                                                <div class="accordion-item">
                                                    <p class="accordion-header " id="kt_accordion_1_header_2">
                                                        <button class="accordion-button fs-4 fw-semibold collapsed"
                                                            type="button" data-bs-toggle="collapse"
                                                            data-bs-target="#kt_accordion_1_body_2" aria-expanded="false"
                                                            aria-controls="kt_accordion_1_body_2">
                                                            <h2 class="fw-bolder mb-0">Wishlist</h2>
                                                        </button>
                                                    </p>
                                                    <div id="kt_accordion_1_body_2" class="accordion-collapse collapse"
                                                        aria-labelledby="kt_accordion_1_header_2"
                                                        data-bs-parent="#kt_accordion_1">
                                                        <div class="accordion-body">

                                                            <div class="card card-flush h-xl-100">

                                                                <!--begin::Body-->
                                                                <div class="card-body">

                                                                    <!--begin::Scroll-->
                                                                    <div class="hover-scroll-overlay-y pe-6 me-n6"
                                                                        style="height: 350px">
                                                                        <!--begin::Item-->
                                                                        @forelse ($wishlist as $list)
                                                                            <div
                                                                                class="rounded border-gray-300 border-1 border-gray-300 border-dashed px-7 py-3 mb-6">
                                                                                <!--begin::Info-->
                                                                                <div class="d-flex flex-stack">

                                                                                    <!--begin::Icon-->
                                                                                    {{-- <img src="{{ asset($list->merchant->icon) }}"
                                                                                    class="w-100"
                                                                                    alt="" /> --}}
                                                                                    <table>
                                                                                        <tr>
                                                                                            <td class="min-w-55px">
                                                                                                <div
                                                                                                    class="symbol symbol-50px">
                                                                                                    <div class="symbol-label"
                                                                                                        style="background-image:url('{{ asset($list->merchant->icon) }}')">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td>
                                                                                                <span
                                                                                                    class="text-gray-400 fw-bolder">{{ $list->name_en }}
                                                                                                </span>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>




                                                                                    <!--end::Icon-->


                                                                                </div>
                                                                                <!--end::Info-->
                                                                                <!--begin::Customer-->
                                                                                {{-- <div class="d-flex flex-stack">
                                                                            <!--begin::Name-->
                                                                            <span class="text-gray-400 fw-bolder">{{ $list->name_en }}
                                                                            </span>
                                                                            <!--end::Name-->
                                                                           
                                                                        </div> --}}
                                                                                <!--end::Customer-->
                                                                            </div>
                                                                        @empty
                                                                            <div class="py-0"
                                                                                data-kt-customer-payment-method="row">
                                                                                <div
                                                                                    class="py-3 ms-lg-2  d-flex flex-stack flex-wrap">
                                                                                    {{-- <p class="text-gray-800">no data found</p> --}}
                                                                                    <div class="text-gray-800 fw-bolder">
                                                                                        No data found...
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforelse
                                                                        <!--end::Item-->
                                                                    </div>
                                                                    <!--end::Scroll-->
                                                                </div>
                                                                <!--end::Body-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                {{-- </div> --}}
                                <!--end::booking information-->



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
            $('#customerInfoForm').on('submit', function(e) {
                e.preventDefault();
                $(".text-mered").addClass("hidden")
                $(".text-mered").html("")
                let data =JSON.stringify({
                        'code' :$("select[name=code]").val(),
                        'phone' :$("input[name=phone]").val()!=""?$("select[name=code]").val()+$("input[name=phone]").val():"",
                        'email' :  $("input[name=email]").val(),
                        'title_full_name' : $("input[name=title_full_name]").val(),
                        'first_name' : $("input[name=first_name]").val(),
                        'last_name' : $("input[name=last_name]").val(),
                        'dob' : $("input[name=dob]").val(),
                        'district_id' : $("input[name=district_id]").val(),
                        'area_id' : $("input[name=area_id]").val(),
                        'address' : $("input[name=address]").val(),
                        "_token": "{{ csrf_token() }}",
                        'id' : $("input[name=id]").val(),
                    });
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: data,
                    dataType: "json",
                    contentType: "application/json",
                    success: function(data) {
                        console.log(data)
                        toastr.success("Updated");
                        setTimeout(() => {
                            document.location.reload();
                        }, 4000);
                        // Check if the response has errors
                        // console.log(data);
                        // if (data.errors) {
                        //     let errorMessages = '';
                        //     for (const key in data.errors) {
                        //         errorMessages += data.errors[key][0] + '<br>';
                        //     }
                        //     $('#errorMessages').html(errorMessages);
                        // } else {

                        // }
                    },
                    // error: function(xhr, status, error, data) {
                    //     console.log(data);
                    // }
                    error: function(response) {
                        console.log(response);
                        $.each(response.responseJSON.errors, function(k, v) {
                            if (k == "email") {
                                let errorTxt = v[0];
                                if(errorTxt =='此電郵地址已註冊' || errorTxt=='此電郵地址已註冊') {
                                    errorTxt="This email address is already registered.";
                                }
                                if(errorTxt =='请输入有效的电邮地址' || errorTxt=='请输入有效的电邮地址') {
                                    errorTxt="Email must be a valid email address.";
                                }
                                if(errorTxt =='電子郵件為必填項' || errorTxt=='电子邮件为必填项') {
                                    errorTxt="Email is required.";
                                }
                               
                                
                                $("#errorMessages_email").html(errorTxt);
                            }
                            if (k == "phone") {
                                let errorTxt = v[0];
                                if(errorTxt =='最少8個字符' || errorTxt=='至少8个字元') {
                                    errorTxt="Phone number must be 8 digits";
                                }
                                if(errorTxt =='手機號碼已被取用。' || errorTxt=='手机号码已被取用了。') {
                                    errorTxt="The phone number has already been taken.";
                                }
                                if(errorTxt =='请输入有效的手机号码' || errorTxt=='請輸入有效的手機號碼') {
                                    errorTxt="Invalid phone number.";
                                }
                                $("#errorMessages").html(errorTxt);
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush

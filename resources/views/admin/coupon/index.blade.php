@php $coupon_type = Request::get('coupon_type') == 'birthday' ? 'Birthday Coupons' : (Request::get('coupon_type') == 'welcome' ? 'Welcome Coupons' : 'Coupons'); @endphp
@extends('admin.layouts.master')
@section('title', $coupon_type)
@section('breadcrumb', $coupon_type)
@section('breadcrumb-info', $coupon_type)
@push('style')
@endpush
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title filter-style">
                        <div class="d-flex align-items-center position-relative my-1 mb-2 mb-md-0 me-3">
                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                                    <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"></path>
                                </svg>
                            </span>
                            <input type="text" id="search" class="form-control form-control-solid w-200px ps-15" aria-label="Sizing example input" name="search" placeholder="Search...." aria-describedby="inputGroup-sizing-sm" value="{{ Request::get('search') }}">
                        </div>

                        @if(Request::get('coupon_type') === null)
                        <!-- start:by_merchant -->
                        <div class="filter-section">
                            <label for="" style="font-size: 14px">Merchant</label>
                            <div class="card-toolbar mx-4">
                                <div class="d-flex justify-content-center" data-kt-customer-table-toolbar="base">
                                    <div class="w-200px me-3">
                                        <select class="form-select form-select-solid" name="merchant" id="merchant" data-control="select2" data-hide-search="true" data-placeholder="Merchant" data-kt-ecommerce-order-filter="merchant">
                                            <option value="all">All</option>
                                            @foreach($merchants as $merchant)
                                            <option value="{{ $merchant->id }}">{{ $merchant->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end:by_merchant -->
                        @endif

                        <!-- start:by_coupon-category -->
                        {{-- <div class="filter-section">
                            <label for="" style="font-size: 14px">Coupon Category</label>
                            <div class="card-toolbar mx-4">
                                <div class="d-flex justify-content-center" data-kt-customer-table-toolbar="base">
                                    <div class="w-200px me-3">
                                        <select class="form-select form-select-solid" name="coupon_category" id="coupon_category" data-control="select2" data-hide-search="true" data-placeholder="Coupone Category" data-kt-ecommerce-order-filter="Coupon Category">
                                            <option value="all">All</option>
                                            @foreach($coupon_categories as $coupon_category)
                                            <option value="{{ $coupon_category->id }}">{{ $coupon_category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <!-- end:by_coupon-category -->

                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                            <a href="{{ url('/admin/coupon/create?coupon_type='.Request::get('coupon_type')) }}"><button type="button" class="btn btn-primary btn-sm"><i class="bi bi-plus" aria-hidden="true"></i>Add New</button></a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 requestDelete" id="couponTable">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th>ID</th>
                                <th>Coupon Code</th>
                                <th>Coupon Name</th>
                                <th>Amount</th>
                                <th>Coupon Category</th>
                                <th>Status</th>
                                <!-- <th>Usage per member</th> -->
                                <th>Used Count</th>
                                @if(Request::get('coupon_type') === null)
                                <th>Merchant Name</th>
                                <th>Start date</th>
                                <th>End date</th>
                                @endif
                                <th>Last Updated</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="fw-bold text-gray-600" id="coupon">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        let type = "{{Request::get('coupon_type')}}";
        let me = this;
        let DisplayTable;
        if(type=="") {
            DisplayTable=[
                {
                    data: 'id',
                    name: 'id',
                    class: 'me-2'
                },
                {
                    data: 'coupon_code',
                    name: 'coupon_code'
                },
                {
                    data: 'coupon_name',
                    name: 'coupon_name'
                },
                {
                    data: 'amount',
                    name: 'amount'
                },
                {
                    data: 'coupon_category_name',
                    name: 'coupon_category_name'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                // {
                //     data: 'usage_per_member',
                //     name: 'usage_per_member'
                // },
                {
                    data: 'usage_per_coupon',
                    name: 'usage_per_coupon'
                },
                {
                    data: 'merchant_name',
                    name: 'merchant_name'
                },
                
                {
                    data: 'start_date',
                    name: 'start_date'
                },
                {
                    data: 'end_date',
                    name: 'end_date'
                },
                {
                    data: 'updated_at',
                    name: 'updated_at'
                },
                {
                    data: 'action',
                    name: 'action'
                }
            ];
            
        }else{
        DisplayTable=[
                {
                    data: 'id',
                    name: 'id',
                    class: 'me-2'
                },
                {
                    data: 'coupon_code',
                    name: 'coupon_code'
                },
                {
                    data: 'coupon_name',
                    name: 'coupon_name'
                },
                {
                    data: 'amount',
                    name: 'amount'
                },
                {
                    data: 'coupon_category_name',
                    name: 'coupon_category_name'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                // {
                //     data: 'usage_per_member',
                //     name: 'usage_per_member'
                // },
                {
                    data: 'usage_per_coupon',
                    name: 'usage_per_coupon'
                },
                
                {
                    data: 'updated_at',
                    name: 'updated_at'
                },
                {
                    data: 'action',
                    name: 'action'
                }
            ];
        }
        me.table = $("#couponTable").DataTable({
            searchDelay: 500,
            processing: true,
            serverSide: true,
            ajax: {
                url: "/admin/coupon/getData?coupon_type="+type,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: function(f) {
                    f.status = $('select[name=status]').val();
                    f.merchant_id = $('select[name=merchant]').val();
                    f.coupon_category_id = $('select[name=coupon_category]').val();
                    f.search = $('#search').val();
                }
            },
            columns: DisplayTable,
        });

        $('#search').on('input', function(e) {
            var value = $(this).val();
            me.table.draw();
            e.preventDefault();
        });

        $('#merchant').on('change', function(e) {
            me.table.draw();
            e.preventDefault();
        });

        $('#coupon_category').on('change', function(e) {
            me.table.draw();
            e.preventDefault();
        });
    });
</script>
@endpush

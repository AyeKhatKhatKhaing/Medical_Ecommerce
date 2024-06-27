@extends('admin.layouts.master')
@section('title', 'Recipient')
@section('breadcrumb', 'Recipient')
@section('breadcrumb-info', 'Recipient Lists')
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                            rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor">
                                        </rect>
                                        <path
                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </span>
                                <input type="text" id="search" class="form-control form-control-solid w-250px ps-15"
                                    aria-label="Sizing example input" name="search" placeholder="Search...."
                                    aria-describedby="inputGroup-sizing-sm" value="{{ Request::get('search') }}">
                            </div>
                            {{-- <div class="filter-section">
                                <label for="" style="font-size: 14px">Status</label>
                                <div class="card-toolbar mx-4">
                                    <div class="d-flex justify-content-center" data-kt-customer-table-toolbar="base">
                                        <div class="w-150px me-3">
                                            <select class="form-select form-select-solid" name="status" id="status"
                                                data-control="select2" data-hide-search="true" data-placeholder="Status"
                                                data-kt-ecommerce-order-filter="status">
                                                <option></option>
                                                <option value="all">All</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        {{-- <div class="card-toolbar">
                            <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                                <a href="{{ url('/admin/payment-type/create') }}"><button type="button"
                                        class="btn btn-primary btn-sm"><i class="bi bi-plus" aria-hidden="true"></i>Add
                                        New</button></a>
                            </div>
                        </div> --}}
                    </div>
                    <div class="card-body pt-0">
                        <table class="table align-middle table-row-dashed fs-6 gy-5 requestDelete" id="recipientTable">
                            <thead>
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Product</th>
                                    <th>Date</th>
                                    {{-- <th>Total price</th>
                                    <th>Total Recipient</th> --}}
                                    <th>Location</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="fw-bold text-gray-600" id="add-on-item">

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
            let me = this;
            me.table = $("#recipientTable").DataTable({
                searchDelay: 500,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "/admin/recipient/getData",
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: function(f) {
                        f.search = $('#search').val();
                    }
                },
                columns: [{
                        data: 'id',
                        name: 'id',
                        class: 'me-2'
                    },
                    {
                        data: 'first_name',
                        name: 'first_name'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'product_id',
                        name: 'product_id'
                    },
                    {
                        data: 'date',
                        name: 'date'
                    },
                    // {
                    //     data: 'each_recipient_amount',
                    //     name: 'each_recipient_amount'
                    // },
                    // {
                    //     data: 'add_on_prices',
                    //     name: 'add_on_prices'
                    // },
                    {
                        data: 'location',
                        name: 'location'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ],
            });

            $('#search').on('input', function(e) {
                var value = $(this).val();
                me.table.draw();
                e.preventDefault();
            });

            // $('#status').on('change', function(e) {
            //     me.table.draw();
            //     e.preventDefault();
            // });
        });
    </script>
@endpush
{{-- @extends('admin.layouts.master')
@section('title', 'Recipient')
@section('breadcrumb', 'Recipient')
@section('breadcrumb-info', 'Recipient Lists')
@push('style')
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-9">
                        <h3 class="card-title">
                            Recipient
                        </h3>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="recipientTable">
                                <thead class="table-light text-black">
                                    <tr>
                                        <th style="padding-left: 10px;">ID</th>
                                        <th>Product Name</th>
                                        <th>Location</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Is Optional Decide Later</th>
                                        <th>Is Add On Decide Later</th>
                                        <th>Register At</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function(){
        let me   = this;
        me.table = $("#recipientTable").DataTable({
            dom: '<"top"fl>rt<"bottom"ip><"clear">',
            "language": {
            search: '<i class="fa fa-search datatable-search"></i>',
            searchPlaceholder: 'search records'
            },
            "searching": true,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            ajax: {
                url: "/admin/recipient/getData",
                type: 'POST',
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: function(f) {
                        // f.search = $('input[type=search]').val();
                    }
            },
            
            columns: [
                    {data: 'id', name: 'id', class: 'me-2'},
                    {data: 'product_name', name: 'product_name'},
                    {data: 'location', name: 'location'},
                    {data: 'date', name: 'date'},
                    {data: 'time', name: 'time'},
                    {data: 'is_optional_decide_later', name: 'is_optional_decide_later'},
                    {data: 'is_add_on_decide_later', name: 'is_add_on_decide_later'},
                    {data: 'created', name: 'created'},
                    {data: 'action', name: 'action'},
                ],
        });

        $('input[type=search]').keyup(function(e) {
            var value = $(this).val();
            if(value.length > 3){
                
                me.table.draw();
                e.preventDefault();
            }                
        });        
    });
    </script>
@endpush --}}

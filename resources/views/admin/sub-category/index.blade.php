@extends('admin.layouts.master')
@section('title', 'Sub-category')
@section('breadcrumb', 'Sub-category')
@section('breadcrumb-info', 'Sub-category Lists')
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
                            <input type="text" id="search" class="form-control form-control-solid w-250px ps-15" aria-label="Sizing example input" name="search" placeholder="Search...." aria-describedby="inputGroup-sizing-sm" value="{{ Request::get('search') }}">
                        </div>
                        <div class="filter-section">
                            <label for="" style="font-size: 14px">Status</label>
                            <div class="card-toolbar mx-4">
                                <div class="d-flex justify-content-center" data-kt-customer-table-toolbar="base">
                                    <div class="w-150px me-3">
                                        <select class="form-select form-select-solid" name="status" id="status" data-control="select2" data-hide-search="true" data-placeholder="Status" data-kt-ecommerce-order-filter="status">
                                            <option value="all">All</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                            <a href="{{ url('/admin/sub-category/create') }}"><button type="button" class="btn btn-primary btn-sm"><i class="bi bi-plus" aria-hidden="true"></i>Add New</button></a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 requestDelete" id="categoryTable">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Last Updated</th>
                                <th>Sort By</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="fw-bold text-gray-600" id="category">

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
        me.table = $("#categoryTable").DataTable({
            searchDelay: 500,
            processing: true,
            serverSide: true,
            ajax: {
                url: "/admin/sub-category/getData",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: function(f) {
                    f.status = $('select[name=status]').val();
                    f.search = $('#search').val();
                }
            },
            columns: [{
                    data: 'id',
                    name: 'id',
                    class: 'me-2'
                },
                {
                    data: 'image',
                    name: 'image'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'updated_at',
                    name: 'updated_at'
                },
                {
                    data: 'sort_by',
                    name: 'sort_by'
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

        $('#status').on('change', function(e) {
            me.table.draw();
            e.preventDefault();
        });
        
    });
    function sortByKeyUp(sub_cate_id,url){
        var inputVal = $('#sub_cate_id'+sub_cate_id).val();
        $.ajax({
                url: url,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: sub_cate_id,
                    value: inputVal,
                },
                success: function(response) {
                    // window.location.reload();
                    if(response.success == true){
                        // toastr.success('You have successfully changed.');
                    }

                },
            });
    }
</script>
@endpush
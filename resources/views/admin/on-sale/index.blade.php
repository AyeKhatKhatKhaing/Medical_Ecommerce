@extends('admin.layouts.master')
@section('title', 'OnSale')
@section('breadcrumb', 'OnSale')
@section('breadcrumb-info', 'OnSale Lists')
@push('style')
@endpush
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <h1>On Sale</h1>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                            <a href="{{ url('/admin/on-sale/create') }}"><button type="button" class="btn btn-primary btn-sm"><i class="bi bi-plus" aria-hidden="true"></i>Add New</button></a>
                        </div>                           
                    </div>
                </div>
                
                <div class="card-body pt-0">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 requestDelete" id="doseTagTable">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Last Updated </th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="fw-bold text-gray-600" id="permissions">
                            
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
        let me   = this;
        me.table = $("#doseTagTable").DataTable({
            searchDelay: 500,
            processing: true,
            serverSide: true,
            ajax: {
                url: "/admin/on-sale/getData",
                type: 'POST',
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: function(f) {
                    
                }
            },
            columns: [
                {data: 'id', name: 'id', class: 'me-2'},
                {data: 'name', name: 'name'},
                {data: 'updated_at', name: 'updated_at'},
                {data: 'action', name: 'action'},
            ],
        });
    });
</script>
@endpush

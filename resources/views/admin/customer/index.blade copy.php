@extends('admin.layouts.master')
@section('title', 'Customer')
@section('breadcrumb', 'Customer')
@section('breadcrumb-info', 'Customer Lists')

@push('style')
@endpush

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-9">
                    <h3 class="card-title">
                        Customer
                    </h3>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="customerTable">
                            <thead class="table-light text-black">
                                <tr>
                                    <th style="padding-left: 10px;">ID</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Enabled</th>
                                    <th>Is Verified</th>
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
    $(document).ready(function() {
        let me = this;
        me.table = $("#customerTable").DataTable({
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
                url: "/admin/customer/getData",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: function(f) {
                    // f.search = $('input[type=search]').val();
                }
            },

            columns: [{
                    data: 'id',
                    name: 'id',
                    class: 'me-2'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'phone',
                    name: 'phone'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'enabled',
                    name: 'enabled'
                },
                {
                    data: 'is_verified',
                    name: 'is_verified'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'action',
                    name: 'action'
                },
            ],
        });

        $('input[type=search]').keyup(function(e) {
            var value = $(this).val();
            if (value.length > 3) {

                me.table.draw();
                e.preventDefault();
            }
        });
    });
</script>
@endpush
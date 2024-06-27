@extends('admin.layouts.master')
@section('title', 'About')
@section('breadcrumb', 'About')
@section('breadcrumb-info', 'About Lists')
@push('style')
@endpush
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-9">
                    <h3 class="card-title">
                        About Lists
                    </h3>
                </div>
                <div class="col-md-3 text-end">
                    <a href="{{ url('/admin/about/create') }}" class="btn btn-primary btn-sm pull-right" title="Add New Tag">
                        <i class="bi bi-plus" aria-hidden="true"></i> Add New
                    </a>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table table-bordered requestDelete" id="aboutTable">
                            <thead class="table-light text-black">
                                <tr>
                                    <th style="padding-left: 10px;">ID</th>
                                    <th>Banner photo</th>
                                    <th>Banner title</th>
                                    <th>Cooperation photo</th>
                                    <th>Cooperation title</th>
                                    <th>Group photo</th>
                                    <th>Group title</th>
                                    <th>Last updated</th>
                                    <th class="text-enter">Actions</th>
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

        var table = $("#aboutTable").DataTable({
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
                url: "/admin/about/getData",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: function(f) {
                    f.search = $('input[type=search]').val();
                }
            },

            columns: [{
                    data: 'id',
                    name: 'id',
                    class: 'me-2'
                },
                {
                    data: 'banner_photo',
                    name: 'banner_photo'
                },
                {
                    data: 'banner_title',
                    name: 'banner_title'
                },
                {
                    data: 'cooperation_photo',
                    name: 'cooperation_photo'
                },
                {
                    data: 'cooperation_title',
                    name: 'cooperation_title'
                },
                {
                    data: 'group_photo',
                    name: 'group_photo'
                },
                {
                    data: 'group_title',
                    name: 'group_title'
                },
                {
                    data: 'updated_at',
                    name: 'updated_at'
                },
                {
                    data: 'action',
                    name: 'action'
                },
            ],

        });

        $('input.search').keyup(function(e) {
            var value = $(this).val();
            if (value.length > 3) {

                me.table.draw();
                e.preventDefault();
            }

        });

    });
</script>
@endpush
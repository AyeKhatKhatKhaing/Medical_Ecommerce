@extends('admin.layouts.master')
@section('title', 'Header')
@section('breadcrumb', 'Header')
@section('breadcrumb-info', 'Header Lists')
@push('style')
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-9">
                        <h3 class="card-title">
                            Header Lists
                        </h3>
                    </div>
                    <div class="col-md-3 text-end">
                        <a href="{{ url('/admin/headers/create') }}" class="btn btn-primary btn-sm pull-right" title="Add New Tag">
                            <i class="bi bi-plus" aria-hidden="true"></i> Add New
                        </a>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table table-bordered requestDelete" id="headers_table">
                                <thead class="table-light text-black">
                                <tr>
                                <tr>
                                    <th style="padding-left: 10px;">ID</th>
                                    <th>Content</th>
                                    <th>Actions</th>
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

            var table = $("#headers_table").DataTable({
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
                    url: "/admin/header/getData",
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: function(f) {
                        f.search = $('input[type=search]').val();
                    }
                },

                columns: [
                    {data: 'id', name: 'id', class: 'me-2'},
                    {data: 'content', name: 'content'},
                    {data: 'action', name: 'action'},
                ],

            });

            $('input.search').keyup(function(e) {
                var value = $(this).val();
                if(value.length > 3){

                    me.table.draw();
                    e.preventDefault();
                }

            });

        });

    </script>
@endpush







@extends('admin.layouts.master')
@section('title', 'Customer')
@section('breadcrumb', 'Customer')
@section('breadcrumb-info', 'Customer Lists')

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
                    </div>
                </div>
                <div class="card-body pt-0">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 requestDelete" id="customer_lists">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                {{-- <th>Is Activated</th> --}}
                                {{-- @if(auth()->user()->hasRole('admin')) --}}
                                <th>Is Activated</th>
                                {{-- @endif --}}
                                <th>Register At</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="fw-bold text-gray-600">

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
        me.table = $("#customer_lists").DataTable({
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
                    f.search = $('#search').val();
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
                // {
                //     data: 'enabled',
                //     name: 'enabled'
                // },
                {
                    data: 'email_is_verified',
                    name: 'email_is_verified'
                },
                {
                    data: 'registered_at',
                    name: 'registered_at'
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
    });
</script>
@endpush
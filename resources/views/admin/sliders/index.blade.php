@extends('admin.layouts.master')
@section('title', 'Slider')
@section('breadcrumb', 'Slider')
@section('breadcrumb-info', 'Slider Lists')
@push('style')
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-9">
                        <h3 class="card-title">
                            Slider Lists
                        </h3>
                    </div>
                    
                    <div class="col-md-3 text-end">
                            <button type="button" class="btn btn-secondary btn-sm pull-right" data-bs-toggle="modal" data-bs-target="#kt_modal_stacked_1">
                                <i class="bi bi-alarm"></i> Duration
                            </button>
                                
                                
                                
                        <a href="{{ url('/admin/sliders/create') }}" class="btn btn-primary btn-sm pull-right" title="Add New Tag">
                            <i class="bi bi-plus" aria-hidden="true"></i> Add New
                        </a>
                    </div>
                </div>
                <form action="{{ route('changeDuration') }}" method="POST">
                    @csrf
                <div class="modal fade" tabindex="-1" id="kt_modal_stacked_1">
                    <div class="modal-dialog modal-dialog-centered">
                        
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title">Duration</h3>
                        
                                    <!--begin::Close-->
                                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                    </div>
                                    <!--end::Close-->
                                </div>
                        
                                <div class="modal-body">
                                    <div class="mb-1">
                                        <label for="exampleFormControlInput1" class="form-label">Duration</label>
                                        <input type="number" name="duration" class="form-control form-control-solid" placeholder="Enter sliders duration"/>
                                    </div>
                                </div>
                        
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        
                    </div>
                </div>
            </form>
                <div class="card mt-4">
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table table-bordered requestDelete" id="sliderTable">
                                <thead class="table-light text-black">
                                <tr>
                                <tr>
                                    <th style="padding-left: 10px;">ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Type</th>
                                    <th>Page</th>
                                    <th>Link</th>
                                    <th>status</th>
                                    <th>Enable</th>
                                    <th>Updated at</th>
                                    <th>Actions</th>
                                </tr>
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
        $(function() {
            let me   = this;
            me.table = $('#sliderTable').DataTable({
                dom: '<"border-0 pt-6 "<"filter-style d-flex align-items-stretch justify-content-between flex-lg-grow-1" "<"header-menu align-items-stretch" "<"menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch" "<"d-flex align-items-center position-relative my-1 me-3"f> <"status filter-section">>> <"form-group"l>>> <"1col"><"1category"><"2category">rt<"bottom"ip>',
                "language": {
                    search: '<i class="bi bi-search blog-datatable-search" aria-hidden="true"></i>',
                    searchPlaceholder: 'Search....'
                },
                "searching": true,
                searchDelay: 500,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "/admin/slider/getData",
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: function(f) {
                        f.search = $('input[type=search]').val();
                        f.slider_status = $('select[name=status]').val();
                    }
                },

                columns: [
                    {data: 'id', name: 'id', class: 'me-2'},
                    {data: 'name', name: 'name'},
                    {data: 'image', name: 'image'},
                    {data: 'type', name: 'type'},
                    {data: 'page', name: 'page'},
                    {data: 'link', name: 'link'},
                    {data: 'status', name: 'status'},
                    {data: 'is_published', name: 'is_published'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'action', name: 'action'},
                ],
            });
            $('div.col').html('<div class="form-group">');
            $('div.1col').html('</div>');

            $('div.status').html(
                '<label> Status </label><div class="card-toolbar mx-4"><div class="d-flex justify-content-center"><select id="statusFilter" name="status" class="filters form-select form-select-sm"><option value="all">Show All</option><option value="1">Active</option><option value="0">Inactive</option></select></div></div>'
            );

            var table = $('table').DataTable();
            $("table.dataTables_filter").append($("#statusFilter"));
            var statusIndex = 0;
            $("table th").each(function(i) {

                if ($($(this)).html() == "Status") {
                    statusIndex = i;
                    return false;
                }
            });
            $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                    var selectedStatus = $('#statusFilter').val()
                    var status = data[statusIndex];
                    if (selectedStatus === "" || status.includes(selectedStatus)) {
                        return true;
                    }
                    return false;
                }
            );
            $("#statusFilter").change(function(e) {
                table.draw();
            });
            table.draw();
        });
    </script>

@endpush

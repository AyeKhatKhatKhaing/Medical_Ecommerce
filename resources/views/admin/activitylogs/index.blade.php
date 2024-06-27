@extends('admin.layouts.master')
@section('title', 'ActivityLogs')
@section('breadcrumb', 'ActivityLogs')
@section('breadcrumb-info', 'ActivityLogs')
@section('content')
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col-md-9">
                    <h3 class="card-title">
                        ActivityLogs
                    </h3>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table table-bordered requestDelete" id="acivity_log_table">
                            <thead class="table-light text-black">
                                <tr>
                                    <th>ID</th>
                                    <th>Activity</th>
                                    <th>Properties</th>
                                    <th>Actor</th>
                                    <th>Date</th>
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
@endsection
@push('scripts')
    <script>
        $(document).ready(function(){
            let me   = this;
		    me.table = $("#acivity_log_table").DataTable({
                dom: '<"top"fl>rt<"bottom"ip><"clear">',
                "language": {
                search: '<i class="fa fa-search activity-datatable-search"></i>',
                searchPlaceholder: 'search records'
                },
                "searching": true,
                searchDelay: 500,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "/admin/activitylogs/getData",
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
                    {data: 'activity', name: 'activity'},
                    {data: 'properties', name: 'properties'},
                    {data: 'actor', name: 'actor'},
                    {data: 'date', name: 'date'},
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
@endpush
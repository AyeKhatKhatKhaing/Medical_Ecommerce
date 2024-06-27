@extends('admin.layouts.master')
@section('title', 'ProductImage')
@section('breadcrumb', 'ProductImage')
@section('breadcrumb-info', 'ProductImage Lists')
@push('style')
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                <div class="col-md-9">
                    <h3 class="card-title">
                        'ProductImage'
                    </h3>
                </div>
                <div class="col-md-3">
                    <a href="{{ url('/admin/product-image/create') }}" class="btn btn-primary btn-sm pull-right" title="Add New Tag">
                        <i class="bi bi-plus" aria-hidden="true"></i> Add New
                    </a>
                </div>
                </div>
                <div class="card">
                    
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tagTable">
                                <thead class="table-light text-black">
                                    <tr>
                                        <th style="padding-left: 10px;">ID</th>
                                        <th>Name</th>
                                        <th>Last Updated</th>
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
           
            let me = this;
           
	me.table = $("table").DataTable({
            searchDelay: 500,
            processing: true,
            serverSide: true,
            ajax: {
                url: "/admin/tags/getData",
				type: 'POST',
				headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				data: function(f) {
						f.search = $('#search').val();
                    }
            },
            
            columns: [
            {data: 'id', name: 'id'},
			{data: 'name', name: 'name'},
            {data: 'updated_by', name: 'updated_by'},
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

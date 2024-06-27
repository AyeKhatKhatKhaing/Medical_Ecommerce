@extends('admin.layouts.master')
@section('title', 'Product')
@section('breadcrumb', 'Product')
@section('breadcrumb-info', 'Product Lists')
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
                            @if(Request::get('home_featured') !== null)
                            <div class="filter-section">
                                <label for="" style="font-size: 14px">Sub Category</label>
                                <div class="card-toolbar mx-4">
                                    <div class="d-flex justify-content-center" data-kt-customer-table-toolbar="base">
                                        <div class="w-150px me-3">
                                            <select class="form-select form-select-solid" name="sub_category" id="sub_category"
                                                data-control="select2" data-hide-search="true" data-placeholder="sub_category"
                                                data-kt-ecommerce-order-filter="sub_category">
                                                <option value="all">All</option>
                                                @foreach ($sub_categories as $cate)
                                                    <option value="{{ $cate->id }}">{{ $cate->name_en }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="filter-section">
                                <label for="" style="font-size: 14px">Merchant</label>
                                <div class="card-toolbar mx-4">
                                    <div class="d-flex justify-content-center" data-kt-customer-table-toolbar="base">
                                        <div class="w-150px me-3">
                                            <select class="form-select form-select-solid" name="merchant" id="merchant"
                                                data-control="select2" data-hide-search="true" data-placeholder="merchant"
                                                data-kt-ecommerce-order-filter="merchant">
                                                <option value="all">All</option>
                                                @foreach ($merchants as $merchant)
                                                    <option value="{{ $merchant->id }}">{{ $merchant->name_en }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="filter-section">
                                <label for="" style="font-size: 14px">Category</label>
                                <div class="card-toolbar mx-4">
                                    <div class="d-flex justify-content-center" data-kt-customer-table-toolbar="base">
                                        <div class="w-150px me-3">
                                            <select class="form-select form-select-solid" name="category" id="category"
                                                data-control="select2" data-hide-search="true" data-placeholder="category"
                                                data-kt-ecommerce-order-filter="category">
                                                <option value="all">All</option>
                                                @foreach ($categories as $cate)
                                                    <option value="{{ $cate->id }}">{{ $cate->name_en }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="filter-section">
                                <label for="" style="font-size: 14px">Sub Category</label>
                                <div class="card-toolbar mx-4">
                                    <div class="d-flex justify-content-center" data-kt-customer-table-toolbar="base">
                                        <div class="w-150px me-3">
                                            <select class="form-select form-select-solid" name="sub_category_id" id="sub_category_id"
                                                data-control="select2" data-hide-search="true" data-placeholder="sub_category_id"
                                                data-kt-ecommerce-order-filter="sub_category_id">
                                                <option value="all">All</option>
                                                @foreach ($sub_cates as $cate)
                                                    <option id="cate{{$cate->id}}" value="{{ $cate->id }}">{{ $cate->name_en }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="card-toolbar">
                            <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                                <a href="{{ url('/admin/products/create') }}"><button type="button"
                                        class="btn btn-primary btn-sm"><i class="bi bi-plus" aria-hidden="true"></i>Add
                                        New</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <table class="table align-middle table-row-dashed fs-6 gy-5 requestDelete" id="product_table">
                            <thead>
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th>ID</th>
                                    <!-- <th>Image</th> -->
                                    <th>Status</th>
                                    <th>Name</th>
                                    <th>Stock</th>
                                    <th>Merchant Name</th>
                                    @if(Request::get('home_featured') == null)
                                    <th>Category</th>
                                    @endif
                                    <th>Sub Category</th>
                                    <th>Code</th>
                                    @if(Request::get('home_featured') == null && Request::get('recommend') == null)
                                    <th>Show Home</th>
                                    <th>Recommend</th>
                                    <th>Show Book Count</th>
                                    <th>Last Updated</th>
                                    @elseif(Request::get('recommend') != null)
                                    <th>Recommend</th>
                                    <th>Recommend Sort</th>
                                    @else
                                    <th>Show Home</th>
                                    <th>Sort By</th>
                                    @endif
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="fw-bold text-gray-600" id="territories">

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
        let type = "{{Request::get('home_featured')}}";
        let recommend = "{{Request::get('recommend')}}";
        console.log("type",recommend,recommend== '')
        var rurl = "";
        if(recommend != null && recommend != ''){
            rurl =  "/admin/products/getData?recommend="+recommend
           
        }else if(type != null && type != ''){
            console.log(type != null)
            rurl = "/admin/products/getData?home_featured="+type
        }else{
            rurl =  "/admin/products/getData?home_featured="+type
        }
        console.log(rurl);
        $(document).ready(function() {
            let me = this;
            if(recommend == 2){
                DisplayTable=[
                    {
                        data: 'id',
                        name: 'id',
                        class: 'me-2'
                    },
                    {
                        data: 'is_published',
                        name: 'is_published'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'stock',
                        name: 'stock'
                    },
                    {
                        data: 'merchant_name',
                        name: 'merchant_name'
                    },
                    {
                        data: 'category_name',
                        name: 'category_name'
                    },
                    {
                        data: 'sub_category_name',
                        name: 'sub_category_name'
                    },
                    {
                        data: 'product_code',
                        name: 'product_code'
                    },
                    {
                        data: 'recommend',
                        name: 'recommend'
                    },
                    {
                        data: 'sort_for_recommend',
                        name: 'sort_for_recommend'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ];
                
            }else if(type == 1){
                DisplayTable=[
                    {
                        data: 'id',
                        name: 'id',
                        class: 'me-2'
                    },
                    {
                        data: 'is_published',
                        name: 'is_published'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'stock',
                        name: 'stock'
                    },
                    {
                        data: 'merchant_name',
                        name: 'merchant_name'
                    },
                    {
                        data: 'sub_category_name',
                        name: 'sub_category_name'
                    },
                    {
                        data: 'product_code',
                        name: 'product_code'
                    },
                    {
                        data: 'is_show_home',
                        name: 'is_show_home'
                    },
                    {
                        data: 'sort_by',
                        name: 'sort_by'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ];
            }else{
                DisplayTable=[
                    {
                        data: 'id',
                        name: 'id',
                        class: 'me-2'
                    },
                    {
                        data: 'is_published',
                        name: 'is_published'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'stock',
                        name: 'stock'
                    },
                    {
                        data: 'merchant_name',
                        name: 'merchant_name'
                    },
                    {
                        data: 'category_name',
                        name: 'category_name'
                    },
                    {
                        data: 'sub_category_name',
                        name: 'sub_category_name'
                    },
                    {
                        data: 'product_code',
                        name: 'product_code'
                    },
                    {
                        data: 'is_show_home',
                        name: 'is_show_home'
                    },
                    
                    {
                        data: 'recommend',
                        name: 'recommend'
                    },
                    {
                        data: 'is_book_count',
                        name: 'is_book_count'
                    },
                    {
                        data: 'updated_by',
                        name: 'updated_at'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ];
            }
            me.table = $("#product_table").DataTable({
                searchDelay: 500,
                processing: true,
                serverSide: true,
                ajax: {
                    url: rurl,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: function(f) {
                        f.search = $('#search').val();
                        f.merchant = $('select[name=merchant]').val();
                        f.category = $('select[name=category]').val();
                        f.sub_category = $('select[name=sub_category]').val();
                        f.sub_category_id = $('select[name=sub_category_id]').val();
                    }
                },
                columns:  DisplayTable,
            });

            $('#search').on('input', function(e) {
                var value = $(this).val();
                me.table.draw();
                e.preventDefault();
            });

            if(type == ""){
                $('#merchant').on('change', function(e) {
                    me.table.draw();
                    e.preventDefault();
                });
            }
            
            $('#category').on('change', function(e) {
                $('#sub_category_id').prop('selected', false);
                var cval = $(this).val();
                var subCategories = <?= json_encode($sub_cates) ?>;
                subCategories.forEach(function(item, key) {
                    if (cval == item.category_id) {
                        $('#cate' + item.id).show();
                    } else {
                        $('#cate' + item.id).hide();
                    }
                })
                me.table.draw();
                e.preventDefault();
            });

            $('#sub_category').on('change', function(e) {
                me.table.draw();
                e.preventDefault();
            });
            $('#sub_category_id').on('change', function(e) {
                me.table.draw();
                e.preventDefault();
            });

        });

        function sortByKeyUp(product_id,url){
            var inputVal = $('#proudctIds'+product_id).val();
            $.ajax({
                    url: url,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id: product_id,
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

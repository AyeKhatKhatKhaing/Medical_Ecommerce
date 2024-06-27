@extends('admin.layouts.master')
@section('title', 'Edit CheckUpTable')
@section('breadcrumb', 'CheckUpTable')
@section('breadcrumb-info', 'Edit CheckUpTable')
@section('content')
    <div class="container" id="wholePage">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <x-errors :errors="$errors" />
                @endif
                {!! Form::model($checkuptable, [
                    'method' => 'PATCH',
                    'url' => ['/admin/check-up-table', $checkuptable->id],
                    'class' => 'form-horizontal',
                ]) !!}

                @include ('admin.check-up-table.form', ['formMode' => 'edit'])

                {!! Form::close() !!}

                <div class="card mt-4">
                    <div class="card-body">
                        <div class="py-5">
                            <div class="d-flex flex-column flex-md-row rounded border p-10">
                                <ul class="nav nav-tabs nav-pills flex-row border-0 flex-md-column me-5 mb-3 mb-md-0 fs-6">
                                    <input type="text" name="check_up_type_id" id="check-up-type-id" value="1"
                                        hidden>
                                    @foreach ($checkuptype as $key => $type)
                                        <li class="nav-item me-0 mb-md-2">
                                            <a class="check-up-type min-w-200px nav-link btn btn-flex btn-active-light-primary {{ request()->get('type_id') == $type->id ? 'active' : '' }}"
                                                href="{{ isset($checkuptable) ? url('admin/check-up-table/' . $checkuptable->id . '/edit?type_id=' . $type->id) : '' }}"
                                                style="color: #009ef7 !important">
                                                <span class="svg-icon svg-icon-2 svg-icon-primary me-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <path
                                                            d="M11 2.375L2 9.575V20.575C2 21.175 2.4 21.575 3 21.575H9C9.6 21.575 10 21.175 10 20.575V14.575C10 13.975 10.4 13.575 11 13.575H13C13.6 13.575 14 13.975 14 14.575V20.575C14 21.175 14.4 21.575 15 21.575H21C21.6 21.575 22 21.175 22 20.575V9.575L13 2.375C12.4 1.875 11.6 1.875 11 2.375Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <span class="d-flex flex-column align-items-start">
                                                    <span class="fs-4 fw-bolder">{{ $type->name_en }}</span>
                                                </span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="tab-content w-100" id="myTabContent">
                                    @foreach ($checkuptype as $ckey => $ctype)
                                        <div class="tab-pane fade {{ request()->get('type_id') == $ctype->id ? 'active show' : '' }}"
                                            id="check_up_type{{ $ckey }}" role="tabpanel">
                                            <div class="card">
                                                <div class="card-header border-0">
                                                    <div class="card-title">
                                                        <h1>{{ $ctype->name_en }}</h1>
                                                    </div>
                                                    <div class="card-toolbar">
                                                        <div class="d-flex justify-content-end"
                                                            data-kt-customer-table-toolbar="base">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#ModalCreate{{ $ctype->id }}"
                                                                class="btn btn-primary btn-sm"
                                                                title="Add New {{ $ctype->name_en }}">
                                                                Add New
                                                            </a>
                                                        </div>
                                                    </div>
                                                    @include('admin.check-up-table.modal.create')
                                                </div>
                                                <div class="card-body pt-0">
                                                    <table
                                                        class="table align-middle table-row-dashed fs-6 gy-5 requestDelete"
                                                        id="checkUpTable">
                                                        <thead>
                                                            <tr
                                                                class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                                <th>Check Up Group</th>
                                                                <th>Check Up Item</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        @php
                                                            $rel_checkuptables = $checkuptable
                                                                ->checkUpTypeTables()
                                                                ->where('check_up_type_id', request()->get('type_id'))
                                                                ->whereNotNull("check_up_group_id")
                                                                ->get();
                                                        @endphp
                                                        <tbody class="fw-bold text-gray-600" id="check-up-type">
                                                            @foreach ($rel_checkuptables as $vkey => $data)
                                                                @if ($data->check_up_type_id == $ctype->id)
                                                                    <tr>
                                                                        @php
                                                                            $item_arr = [];
                                                                            $group_arr = [];
                                                                            $check_groups = App\Models\CheckUpGroup::where('id', $data->check_up_group_id)->pluck('name_en');
                                                                            
                                                                            foreach ($check_groups as $group) {
                                                                                array_push($group_arr, $group);
                                                                            }
                                                                            
                                                                            foreach ($data->checkTableItems as $tb_item) {
                                                                                $check_items = App\Models\CheckUpItem::where('id', $tb_item->check_up_item_id)->pluck('name_en');
                                                                            
                                                                                foreach ($check_items as $item) {
                                                                                    array_push($item_arr, $item);
                                                                                }
                                                                            }
                                                                        @endphp
                                                                        <td>
                                                                            @foreach ($group_arr as $group)
                                                                                {{ $group }}
                                                                            @endforeach
                                                                        </td>
                                                                        <td>
                                                                            @foreach ($item_arr as $item_value)
                                                                                @if (!$loop->last)
                                                                                    {{ $item_value }} ,
                                                                                @else
                                                                                    {{ $item_value }}
                                                                                @endif
                                                                            @endforeach
                                                                        </td>
                                                                        <td style="width: 10%">
                                                                            <a href="#" data-bs-toggle="modal"
                                                                                data-bs-target="#ModalEdit{{ $data->check_up_type_id }}-{{ $data->check_up_group_id }}">
                                                                                <button
                                                                                    class="btn btn-icon btn-active-light-warning btn btn-warning w-30px h-30px"><i
                                                                                        class="bi bi-pencil-square"
                                                                                        aria-hidden="true"></i></button></a>
                                                                            {{-- <a
                                                                                href="{{ url('admin/destory-gp-item?type_id=' . $data->check_up_type_id . '&table_id=' . $data->check_up_table_id . '&group_id=' . $data->check_up_group_id) }}"> --}}
                                                                            <a href="?id={{ $data->check_up_table_id }}"
                                                                                class="show_confirm_delete"
                                                                                data-id="{{ $data->check_up_group_id }}"
                                                                                id="{{ $data->check_up_type_id }}">

                                                                                <button type="submit"
                                                                                    class="btn btn-icon btn-active-light-danger btn btn-danger w-30px h-30px "
                                                                                    title='Delete'>
                                                                                    <i class="bi bi-trash"
                                                                                        aria-hidden="true"></i>
                                                                                </button>
                                                                            </a>

                                                                            {{-- <form method="POST" action="{{url('destory-gp-item?type_id='.$data->check_up_type_id.'&table_id='.$data->check_up_table_id.'&group_id='.$data->check_up_group_id)}}" class="deleteForm" style="display: inline;">                
                                                                                <input name="_method" type="hidden" value="DELETE">
                                                                                <input name="_token" type="hidden" value="{{ csrf_token() }}">                    
                                                                                <button type="submit" class="btn btn-icon btn-active-light-danger btn btn-danger w-30px h-30px show_confirm_delete" title='Delete'><i class="bi bi-trash" aria-hidden="true"></i></button>              
                                                                            </form> --}}
                                                                        </td>
                                                                    </tr>
                                                                    @include('admin.check-up-table.modal.edit')
                                                                @endif
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        @if (session()->has('flash_message'))
            toastr.success("{{ session()->get('flash_message') }}")
        @endif
        $(document).on('change', '#auto_translate', function() {

            let val = $(this).prop('checked') ? '1' : '0';
            let simplified_name = $('#name_sc');
            if (val == 1) {
                let name = $('#name_tc').val();
                $.ajax({
                    url: "{{ url('/admin/checkup-table-translate') }}",
                    data: {
                        'val': val,
                        'name': name
                    },
                    type: 'get',
                    success: function(response) {
                        response['name'] !== '' ? simplified_name.val(response['name']) : alert(
                            'Name field must be less than 5000 characters')
                    }
                });
            } else {
                simplified_name.val('')
            }

        });
    </script>
    <script>
        $(document).on('click', '.show_confirm_delete', function(e) {
            e.preventDefault();
            var group_id = $(this).data('id');
            var type_id = $(this).attr("id");
            var url = new URL(this.href);
            var table_id = url.searchParams.get("id");
            Swal.fire({
                html: `Are you sure you want to delete?`,
                icon: "warning",
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: "Delete",
                cancelButtonText: 'Cancel',
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: 'btn btn-danger'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        method: "GET",
                        url: "{{ url('/admin/destory-gp-item') }}",
                        data: {
                            'group_id': group_id,
                            'type_id': type_id,
                            'table_id': table_id
                        },

                        datatype: "json",
                        success: function(data) {
                            // $("#myTabContent").load(window.location.href + " #myTabContent>*");
                            // $("#modal_data").load(window.location.href + " #modal_data>*");
                            //toastr.success("Check Up Group deleted!");
                            window.location.reload();
                            //  toastr.success("Check Up Group deleted!");
                        }
                    })
                }
            })
        });
    </script>
    <script>
        $(document).ready(function() {
           $(".btn-submit").on("click",function(){
                $("#check_up_group_id_error"+$(this).attr("data-id")).css("display","none");
                $("#check_up_item_id_error"+$(this).attr("data-id")).css("display","none");
                let errorStatus = false;
                if($("#check_up_group_id"+$(this).attr("data-id")).val().length==0) {
                    $("#check_up_group_id_error"+$(this).attr("data-id")).css("display","block");
                    errorStatus = true;
                }
                if($("#check_up_item_id"+$(this).attr("data-id")).val().length==0) {
                    $("#check_up_item_id_error"+$(this).attr("data-id")).css("display","block");
                    errorStatus = true;
                }
                if(errorStatus==false){
                $("#checkup-modal-form"+$(this).attr("data-id")).submit();
                }
           });
        });
    </script>
@endpush

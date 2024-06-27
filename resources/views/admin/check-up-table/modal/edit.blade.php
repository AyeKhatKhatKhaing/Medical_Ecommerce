<!--begin::Modal-->
<div class="modal fade text-left" tabindex="-1" id="ModalEdit{{ $data->check_up_type_id }}-{{ $data->check_up_group_id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit {{ $ctype->name_en }}</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon fs-2x"></span>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            {!! Form::model($data, [
                'method' => 'PATCH',
                'url' => ['/admin/check-up-table/edit-check-up-table-data', $data->check_up_group_id],
                'class' => 'form-horizontal',
                'id'=> 'checkup-modal-edit-form'.$data->check_up_type_id ."-".$data->check_up_group_id
            ]) !!}
            @php 
            $group_id = $checkupgroup->pluck('id');
            $all_g_ids = $group_id->put(count($group_id),$data->check_up_group_id);
            $check_up_groups = App\Models\CheckUpGroup::whereIn('id', $all_g_ids)->get(['id', 'name_en']);
            @endphp
            <input type="text" name="table_id" value="{{ $checkuptable->id }}" hidden>
                <input type="text" name="check_up_type_id" value="{{ $ctype->id }}" hidden>
                <input type="text" name="check_up_table_type_id" value="{{ $data->id }}" hidden>
                <input type="text" name="typeId" value="{{ request()->get('type_id') }}" hidden>
                <div class="mb-3">
                    <select name="check_up_group_id" id="check_up_group_id{{ $data->check_up_type_id }}-{{ $data->check_up_group_id }}" class="form-select check-group_new" data-control="select2" data-dropdown-parent="#ModalEdit{{ $data->check_up_type_id }}-{{ $data->check_up_group_id }}" data-placeholder="Select Check Up Group" data-allow-clear="true">
                        <option></option>
                        @foreach($check_up_groups as $gkey => $group)
                            <option value="{{ $group->id }}" @if($group->id == $data->check_up_group_id) selected @endif>{{ $group->name_en }}</option>
                        @endforeach
                    </select>
                    <span id="check_up_group_id_error{{ $data->check_up_type_id }}-{{ $data->check_up_group_id }}" class="text-danger" style="display: none">Checkup Group need to choose.</span>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <select name="check_up_item_id[]" id="check_up_item_id{{ $data->check_up_type_id }}-{{ $data->check_up_group_id }}"  class="form-select check-item" data-control="select2" data-placeholder="Select Check Up Items" multiple>
                            <option></option>
                                                    @foreach($checkupitem as $ikey => $item)
                                                        @php 
                                                        $check_group_ids      = App\Models\CheckUpGroup::where('id', $data->check_up_group_id)->pluck('id');

                                                        @endphp
                                                        <option value="{{ $item->id }}" {{  in_array($item->id, $data->checkTableItems()->where('check_up_group_id',$check_group_ids)->pluck('check_up_item_id')->toArray()) ? 'selected' : '' }}>{{ $item->name_en }}</option>
                                                    @endforeach
                        </select>
                        <span id="check_up_item_id_error{{ $data->check_up_type_id }}-{{ $data->check_up_group_id }}" class="text-danger" style="display: none">Checkup Item need to choose.</span>
                    </div>
                </div>
                <div class="col-auto mt-4">
                    <button type="button" class="btn btn-primary btn-sm btn-edit-submit" data-id="{{ $data->check_up_type_id }}-{{ $data->check_up_group_id }}"><i class="bi bi-save"></i>
                        Save
                    </button>
                    <button class="btn btn-secondary btn-sm cancel" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times" aria-hidden="true"></i> Cancel
                    </button>
                </div>
            </div>

            {{-- <div class="modal-footer"> --}}
               

            {!! Form::close() !!}
            {{-- </div> --}}
        </div>
    </div>
</div>
<!--end::Modal-->

{{-- <div class="modal fade text-left" id="ModalEdit{{ $data->check_up_type_id }}-{{ $data->check_up_group_id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit {{ $ctype->name_en }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>                    
            </div>
            <div class="modal-body py-0">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    @if ($errors->any())
                                        <ul class="alert alert-danger">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
            
                                    {!! Form::model($data, [
                                        'method' => 'PATCH',
                                        'url' => ['/admin/check-up-table/edit-check-up-table-data', $data->check_up_group_id],
                                        'class' => 'form-horizontal'
                                    ]) !!}
                                    @php 
                                    $group_id = $checkupgroup->pluck('id');
                                    $all_g_ids = $group_id->put(count($group_id),$data->check_up_group_id);
                                    $check_up_groups = App\Models\CheckUpGroup::whereIn('id', $all_g_ids)->get(['id', 'name_en']);
                                    @endphp
                                    <input type="text" name="table_id" value="{{ $checkuptable->id }}" hidden>
                                        <input type="text" name="check_up_type_id" value="{{ $ctype->id }}" hidden>
                                        <input type="text" name="check_up_table_type_id" value="{{ $data->id }}" hidden>
                                        <input type="text" name="typeId" value="{{ request()->get('type_id') }}" hidden>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="col-md-12">
                                                    <select name="check_up_group_id" class="form-select check-group" data-placeholder="Select Check Up Group" data-hide-search="true">
                                                        <option></option>
                                                        @foreach($check_up_groups as $gkey => $group)
                                                            <option value="{{ $group->id }}" @if($group->id == $data->check_up_group_id) selected @endif>{{ $group->name_en }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-md-12">
                                                <select name="check_up_item_id[]" class="form-select check-item" data-placeholder="Select Check Up Items" multiple>
                                                    <option></option>
                                                    @foreach($checkupitem as $ikey => $item)
                                                        @php 
                                                        $check_group_ids      = App\Models\CheckUpGroup::where('id', $data->check_up_group_id)->pluck('id');

                                                        @endphp
                                                        <option value="{{ $item->id }}" {{  in_array($item->id, $data->checkTableItems()->where('check_up_group_id',$check_group_ids)->pluck('check_up_item_id')->toArray()) ? 'selected' : '' }}>{{ $item->name_en }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-auto mt-4">
                                            <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-save"></i>
                                                Save
                                            </button>
                                            <button class="btn btn-secondary btn-sm cancel" type="button" data-bs-dismiss="modal" aria-label="Close">
                                                <i class="fa fa-times" aria-hidden="true"></i> Cancel
                                            </button>
                                        </div>
            
                                    {!! Form::close() !!}
            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@push('scripts')
<script>
    $(document).ready(function() {
       $(".btn-edit-submit").on("click",function(){
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
            $("#checkup-modal-edit-form"+$(this).attr("data-id")).submit();
            }
       });
    });
</script>
@endpush
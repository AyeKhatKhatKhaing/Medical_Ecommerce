
<!--begin::Modal-->
<div class="modal fade text-left" tabindex="-1" id="ModalCreate{{ $ctype->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New {{ $ctype->name_en }}</h5>

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
                {!! Form::model($checkuptable, [
                    'method' => 'POST',
                    'url' => ['/admin/check-up-table/save-check-up-table-data', $checkuptable->id],
                    'class' => 'form-horizontal',
                    'id' => 'checkup-modal-form'.$ctype->id
                ]) !!}
                    
                    <input type="text" name="check_up_type_id" value="{{ $ctype->id }}" hidden>
                    <input type="text" name="typeId" value="{{ request()->get('type_id') }}" hidden>
                <div class="mb-3">
                    <select name="check_up_group_id"  id="check_up_group_id{{$ctype->id}}" class="form-select check-group_new" data-control="select2" data-dropdown-parent="#ModalCreate{{ $ctype->id }}" data-placeholder="Select Check Up Group" data-allow-clear="true">
                        <option></option>
                        @foreach($checkupgroup as $gkey => $group)
                            <option value="{{ $group->id }}">{{ $group->name_en }}</option>
                        @endforeach
                    </select>
                    <span id="check_up_group_id_error{{$ctype->id}}" class="text-danger" style="display: none">Checkup Item need to choose.</span>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <select name="check_up_item_id[]" id="check_up_item_id{{$ctype->id}}" class="form-select check-item " data-control="select2" data-placeholder="Select Check Up Items" multiple>
                            <option></option>
                            @foreach($checkupitem as $ikey => $item)
                                <option value="{{ $item->id }}">{{ $item->name_en }}</option>
                            @endforeach
                        </select>
                        <span id="check_up_item_id_error{{$ctype->id}}" class="text-danger" style="display: none">Checkup Item need to choose.</span>
                    </div>
                </div>
                <div class="col-auto mt-4">
                    <button type="button" class="btn btn-primary btn-sm btn-submit" data-id="{{$ctype->id}}"><i class="bi bi-save"></i>
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
{{-- <div class="modal fade text-left" id="ModalCreate{{ $ctype->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create New {{ $ctype->name_en }}</h4>
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
            
                                    {!! Form::model($checkuptable, [
                                        'method' => 'POST',
                                        'url' => ['/admin/check-up-table/save-check-up-table-data', $checkuptable->id],
                                        'class' => 'form-horizontal'
                                    ]) !!}
                                        
                                        <input type="text" name="check_up_type_id" value="{{ $ctype->id }}" hidden>
                                        <input type="text" name="typeId" value="{{ request()->get('type_id') }}" hidden>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="col-md-12">
                                                    <select name="check_up_group_id" class="form-select check-group" data-placeholder="Select Check Up Group" data-hide-search="true">
                                                        <option></option>
                                                        @foreach($checkupgroup as $gkey => $group)
                                                            <option value="{{ $group->id }}">{{ $group->name_en }}</option>
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
                                                        <option value="{{ $item->id }}">{{ $item->name_en }}</option>
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

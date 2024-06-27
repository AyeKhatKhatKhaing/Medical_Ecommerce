<div class="row">
    <div class="row mb-5">
        <div class="col-md-8">
            <h3 class="card-title">
            @if($formMode == "edit") Edit Check Up Table @else Add New Check Up Table @endif 
            </h3>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="float-end">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card"></i> Save</button>
                    <a href="{{ url('admin/check-up-table') }}" title="Back"><button type="button" class="btn btn-secondary btn-sm cancel"><i class="bi bi-x" aria-hidden="true"></i> Cancel</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div style="border-bottom: 1px solid #E5EAEE;">
                <ul class="nav nav-tabs bg-white">
                    @foreach (config('lng.lng') as $lngcode => $lng)
                        <li class="nav-item">
                            <a onclick="showHideDescription('{{ strtolower($lngcode) }}')" class="nav-link {{ $lngcode == 'EN' ? 'active' : '' }} nav_link" data-bs-toggle="tab" href="#{{ strtolower($lngcode) }}-tab">
                                <span class="d-sm-none">{{ $lng }}</span>
                                <span class="d-sm-block d-none">{{ $lng }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="card-body">
                <div class="card-body content-body">
                    <div class="tab-content">   
                        @foreach (config('lng.attr') as $lngcode => $attr)
                        <div class="tab-pane fade {{ $attr == 'en' ? 'active show' : '' }}"  id="{{ strtolower($lngcode) }}-tab">
                            <div class="form-group mb-5{{ $errors->has('name_'.$attr) ? 'has-error' : ''}}">
                                {!! Form::label('name_'.$attr, 'Name' . ' (' . $lngcode . ')', ['class' => 'form-label required mb-3']) !!}
                                {!! Form::text('name_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                {!! $errors->first('name_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                            @if($attr == 'tc')
                                <div class="form-check mb-5 mt-5 d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" {{isset($checkuptable->is_translate)&&$checkuptable->is_translate==1?'checked':''}} name="auto_translate" id="auto_translate" value="1">
                                    <label class="form-check-label ms-2" for="auto_translate">
                                        Auto translate to chinese
                                    </label>
                                </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        {{-- @if($formMode === 'edit')
            <div class="card mt-4">
                <div class="card-body">
                    <div class="py-5">
                        <div class="d-flex flex-column flex-md-row rounded border p-10">
                            <ul class="nav nav-tabs nav-pills flex-row border-0 flex-md-column me-5 mb-3 mb-md-0 fs-6">
                                <input type="text" name="check_up_type_id" id="check-up-type-id" value="1" hidden>
                                @foreach ($checkuptype as $key => $type)
                                    <li class="nav-item me-0 mb-md-2">
                                        <a class="check-up-type min-w-200px nav-link btn btn-flex btn-active-light-primary {{ $key == 'EN' ? 'active' : '' }}" data-bs-toggle="tab" data-id={{ $type->id }} href="#check_up_type{{ $key }}" style="color: #009ef7 !important">
                                            <span class="svg-icon svg-icon-2 svg-icon-primary me-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M11 2.375L2 9.575V20.575C2 21.175 2.4 21.575 3 21.575H9C9.6 21.575 10 21.175 10 20.575V14.575C10 13.975 10.4 13.575 11 13.575H13C13.6 13.575 14 13.975 14 14.575V20.575C14 21.175 14.4 21.575 15 21.575H21C21.6 21.575 22 21.175 22 20.575V9.575L13 2.375C12.4 1.875 11.6 1.875 11 2.375Z" fill="currentColor"></path>
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
                                    <div class="tab-pane fade {{ $ckey == 0 ? 'active show' : '' }}" id="check_up_type{{ $ckey }}" role="tabpanel">
                                        <div class="card">
                                            <div class="card-header border-0">
                                                <div class="card-title">
                                                    <h1>{{ $ctype->name_en }}</h1>
                                                </div>
                                                <div class="card-toolbar">
                                                    <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#ModalCreate{{ $ctype->id }}"
                                                            class="btn btn-primary btn-sm" title="Add New {{ $ctype->name_en }}">
                                                            Add New
                                                        </a>
                                                    </div>                           
                                                </div>
                                                @include('admin.check-up-table.modal.create')
                                            </div>
                                            <div class="card-body pt-0">
                                                <table class="table align-middle table-row-dashed fs-6 gy-5 requestDelete" id="checkUpTable">
                                                    <thead>
                                                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                            <th>Check Up Group</th>
                                                            <th>Check Up Item</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                        <tbody class="fw-bold text-gray-600" id="check-up-type">
                                                            
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
        @endif --}}
    </div>
</div>
@push('scripts')
<script type="text/javascript">
    $(document).on('click', '.check-up-type', function(){
        let id  = $(this).data('id');

        $('#check-up-type-id').val(id);
    })

    $(document).ready(function() {
        $('.check-item').select2();
        $('.check-group_new').select2();
    });

</script>

@endpush                
           


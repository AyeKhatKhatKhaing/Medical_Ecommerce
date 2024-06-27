<div class="row">
    <div class="row mb-5">
        <div class="col-md-8">
            <h3 class="card-title">
                @if($formMode == "edit") Edit Check Up Type @else Add New Check Up Type @endif
            </h3>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="float-end">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card"></i> Save</button>
                    <a href="{{ url('admin/check-up-type') }}" title="Back"><button type="button" class="btn btn-secondary btn-sm cancel"><i class="bi bi-x" aria-hidden="true"></i> Cancel</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
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
                        <div class="tab-pane fade {{ $attr == 'en' ? 'active show' : '' }}" id="{{ strtolower($lngcode) }}-tab">
                            <div class="form-group mb-5{{ $errors->has('name_'.$attr) ? 'has-error' : ''}}">
                                {!! Form::label('name_'.$attr, 'Name' . ' (' . $lngcode . ')', ['class' => 'form-label required mb-3']) !!}
                                {!! Form::text('name_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                {!! $errors->first('name_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                            @if($attr == 'tc')
                            <div class="form-check mb-5 mt-5 d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" {{isset($checkuptype->is_translate)&&$checkuptype->is_translate==1?'checked':''}} name="auto_translate" id="auto_translate" value="1">
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
    </div>
    <div class="col-md-4 d-none">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    {!! Form::label('check_up_group_id', 'Check Up Group', ['class' => 'control-label']) !!}
                </div>
            </div>
            <div class="card-body">
                <div class="form-group mb-5{{ $errors->has('check_groups') ? 'has-error' : ''}}">
                    <div class="form-check mb-4 mt-1">
                        <input class="form-check-input" type="checkbox" id="select-all">
                        <label class="form-check-label" for="selectall">All</label>
                    </div>
                    @foreach($checkupgroup as $key => $data)
                    <div class="form-check mb-4">
                        @if($formMode === 'edit')
                        <input class="form-check-input check" type="checkbox" name="check_groups[]" value="{{ $key }}" >
                        @else
                        <input class="form-check-input check" type="checkbox" name="check_groups[]" value="{{ $key }}">
                        @endif
                        <label class="form-check-label" for="checkUpGroup">
                            {{ $data }}
                        </label>
                    </div>
                    @endforeach
                    {!! $errors->first('check_groups', '<p class="help-block text-danger">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-header">
                <div class="card-title">
                    {!! Form::label('order_by', 'Order By', ['class' => 'control-label']) !!}
                </div>
            </div>
            <div class="card-body">
                <div class="form-group mb-5{{ $errors->has('order_by') ? 'has-error' : ''}}">
                    {!! Form::number('order_by', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                    {!! $errors->first('order_by', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="row mb-5">
        <div class="col-md-8">
            <h3 class="card-title">
            @if($formMode == "edit") Edit Check Up Item @else Add New Check Up Item @endif
            </h3>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="float-end">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card"></i> Save</button>
                    <a href="{{ url('admin/check-up-item') }}" title="Back"><button type="button" class="btn btn-secondary btn-sm cancel"><i class="bi bi-x" aria-hidden="true"></i> Cancel</button></a>
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
                        <div class="form-group mb-5{{ $errors->has('gender') ? 'has-error' : ''}}">
                            {!! Form::label('gender', 'Gender', ['class' => 'form-label required mb-3']) !!}
                            {{-- <div class="mb-3">
                                {{ Form::radio('gender', 0, '@if(!isset($checkupitem) || $checkupitem->gender == '0') true @endif', ['class'=>'form-check-input me-2', 'id' => 'male']) }}
                                {{ Form::label('male', 'Male', ['class' => 'form-check-label me-3']) }}

                                {{ Form::radio('gender', 1, '@if(!isset($checkupitem) || $checkupitem->gender == '1') true @endif', ['class'=>'form-check-input me-2', 'id' => 'female']) }}
                                {{ Form::label('female', 'Female', ['class' => 'form-check-label me-3']) }}

                                {{ Form::radio('gender', 2, '@if(!isset($checkupitem) || $checkupitem->gender == '2') true @endif', ['class'=>'form-check-input me-2', 'id' => 'other']) }}
                                {{ Form::label('other', 'NIL', ['class' => 'form-check-label me-3']) }}
                            </div> --}}
                            <div class="mb-3">
                                {{ Form::radio('gender', 2, !isset($checkupitem) || $checkupitem->gender == '2', ['class' => 'form-check-input me-2', 'id' => 'other']) }}
                                {{ Form::label('other', 'NIL', ['class' => 'form-check-label me-3']) }}
                                
                                {{ Form::radio('gender', 0, isset($checkupitem) && $checkupitem->gender == '0', ['class' => 'form-check-input me-2', 'id' => 'male']) }}
                                {{ Form::label('male', 'Male', ['class' => 'form-check-label me-3']) }}
                            
                                {{ Form::radio('gender', 1, isset($checkupitem) && $checkupitem->gender == '1', ['class' => 'form-check-input me-2', 'id' => 'female']) }}
                                {{ Form::label('female', 'Female', ['class' => 'form-check-label me-3']) }}
                            
                               
                            </div>
                            
                        </div>
                        @foreach (config('lng.attr') as $lngcode => $attr)
                        <div class="tab-pane fade {{ $attr == 'en' ? 'active show' : '' }}"  id="{{ strtolower($lngcode) }}-tab">
                            <div class="form-group mb-5{{ $errors->has('name_'.$attr) ? 'has-error' : ''}}">
                                {!! Form::label('name_'.$attr, 'Name' . ' (' . $lngcode . ')', ['class' => 'form-label required mb-3']) !!}
                                {!! Form::text('name_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                {!! $errors->first('name_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                            <div class="form-group mb-5{{ $errors->has('content_'.$attr) ? 'has-error' : ''}}">
                                {!! Form::label('content_'.$attr, 'Content' . ' (' . $lngcode . ')', ['class' => 'form-label mb-3']) !!}
                                {!! Form::textarea('content_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                {!! $errors->first('content_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                            @if($attr == 'tc')
                                <div class="form-check mb-5 mt-5 d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" {{isset($optionalitem->is_translate)&&$optionalitem->is_translate==1?'checked':''}} name="auto_translate" id="auto_translate" value="1">
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
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    {!! Form::label('equivalent_number', 'Equivalent Number of Items', ['class' => 'control-label']) !!}
                </div>
            </div>
            <div class="card-body">
                <div class="form-group mb-5{{ $errors->has('equivalent_number') ? 'has-error' : ''}}">
                    <input type="number" name="equivalent_number" min="1" class="form-control" value="{{isset($checkupitem) ? $checkupitem->equivalent_number : 1}}" required>
                </div>
            </div>
        </div>
        {{-- <div class="card mt-4">
            <div class="card-body">
                 <div class="d-flex justify-content-between nopadding">
                    <label for="" style="font-size: 13px;">IS PUBLISHED?</label>
                    <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="is_published" id="is_published" @if(isset($checkupitem) && $checkupitem->is_published == '1') checked @endif>
                    </div>
                </div> 
                <div class="d-flex justify-content-between nopadding">
                    <label for="" style="font-size: 13px;">IS PUBLISHED?</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="is_published" id="is_published" @if(!isset($checkupitem) || $checkupitem->is_published == '1') checked @endif>
                    </div>
                </div>
                
            </div>
        </div> --}}
    </div>
</div>




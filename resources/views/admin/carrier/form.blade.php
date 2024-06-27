<div class="row">
    <div class="row mb-5">
        <div class="col-md-8">
            <h3 class="card-title">
            @if($formMode == "edit") Edit Career @else Add New Career @endif 
            </h3>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="float-end">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card"></i> Save</button>
                    <a href="{{ url('admin/carrier') }}" title="Back"><button type="button" class="btn btn-secondary btn-sm cancel"><i class="bi bi-x" aria-hidden="true"></i> Cancel</button></a>
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
                        <div class="tab-pane fade {{ $attr == 'en' ? 'active show' : '' }}"  id="{{ strtolower($lngcode) }}-tab">
                            <div class="form-group mb-5{{ $errors->has('name_'.$attr) ? 'has-error' : ''}}">
                                {!! Form::label('name_'.$attr, 'Name' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                {!! Form::text('name_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                {!! $errors->first('name_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                            <div class="form-group mb-5{{ $errors->has('content_'.$attr) ? 'has-error' : ''}}">
                                {!! Form::label('content_'.$attr, 'Content' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                {!! Form::textarea('content_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                {!! $errors->first('content_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                            
                            <div class="form-group mb-5{{ $errors->has('minimum_experience_'.$attr) ? 'has-error' : ''}}">
                                {!! Form::label('minimum_experience_'.$attr, 'Minium Experience' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                {!! Form::text('minimum_experience_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                {!! $errors->first('minimum_experience_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                            
                            @if($attr == 'tc')
                                <div class="form-check mb-5 mt-5 d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" {{isset($carrier->is_translate)&&$carrier->is_translate==1?'checked':''}} name="auto_translate" id="auto_translate" value="1">
                                    <label class="form-check-label ms-2" for="auto_translate">
                                        Auto translate to chinese
                                    </label>
                                </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                    <div class="card mb-5">
                        <div class="card-header">
                            <h3 class="card-title required">Locations</h3>
                        </div>

                        <div class="card-body">
                            
                            <div class="form-group mb-5{{ $errors->has('location') ? 'has-error' : ''}}">
                                <select class="form-select form-select-solid" name="location" data-placeholder="Select location">
                                    <option value="">Select Location</option>
                                    @if (count($area) > 0)
                                        @foreach ($area as $item)
                                            <option class="package{{ $item->id }}" value="{{ $item->id }}"
                                                {{ isset($carrier) && $item->id == $carrier->location ? 'selected' : '' }}>
                                                {{ $item->name_en }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                {!! $errors->first('location', '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                        </div>

                        {{-- <div class="card-body">
                            <div class="form-group mb-5{{ $errors->has('minium_experience') ? 'has-error' : ''}}">
                                {!! Form::label('minium_experience', 'Minium Experience', ['class' => 'form-label required mb-3']) !!}
                                {!! Form::text('minium_experience', null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                {!! $errors->first('minium_experience', '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        {{-- <div class="card">
            <div class="card-header">
                <h3 class="card-title">Image</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Image Size( 1000 x 535 )px</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                       <div id="holder-img">
                            @if(!empty($carrier->img))
                                <div class='lfmimage-container imglfmc0'>
                                    <img src="{{ asset($carrier->img) }}" class='lfmimage w-100' style="height: 20rem;">
                                    <div>
                                        <button type="button" onclick="removeImage('img',0)" class='btn btn-sm btn-danger w-100'>Remove</button>
                                    </div>
                                </div>
                            @else
                                <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                            @endif
                       </div>
                       <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="lfm-img" data-input="img" data-preview="holder-img" class="btn btn-primary text-white lfm-img">
                                    <i class="bi bi-image-fill me-2"></i>Select File
                                </a>
                            </span>
                            <input id="img" class="form-control" type="text" name="img" value="{{isset($carrier) ? $carrier->img : ''}}">
                       </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    {!! Form::label('department_id', 'Department', ['class' => 'control-label mb-3']) !!}
                </div>
            </div>
            <div class="card-body">
                <div class="form-group mb-5{{ $errors->has('department_id') ? 'has-error' : ''}}">
                    {!! Form::select('department_id', $carrierdepartments, null , ['class' => 'form-select form-select-solid', 'data-control' => 'select2', 'data-hide-search' => "true", 'data-placeholder' => "Select Department", 'placeholder' => "Select Department", "data-kt-ecommerce-product-filter" => "department_id"]) !!}
                    {!! $errors->first('department_id', '<p class="help-block text-danger">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-header">
                <div class="card-title">
                    {!! Form::label('employment_type', 'Employment Type', ['class' => 'control-label mb-3']) !!}
                </div>
            </div>
            <div class="card-body">
                <div class="form-group mb-5{{ $errors->has('employment_type') ? 'has-error' : ''}}">
                    {!! Form::select('employment_type', $employment_types, null , ['class' => 'form-select form-select-solid', 'data-control' => 'select2', 'data-hide-search' => "true", 'data-placeholder' => "Select Employee Type", 'placeholder' => "Select Employee Type", "data-kt-ecommerce-product-filter" => "employment_type"]) !!}
                    {!! $errors->first('employment_type', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-header">
                <div class="card-title">
                    {!! Form::label('Minimum Experience', 'Experience Level', ['class' => 'control-label mb-3']) !!}
                </div>
            </div>
            <div class="card-body">
                <div class="form-group mb-5{{ $errors->has('exp_level') ? 'has-error' : ''}}">
                    {!! Form::select('exp_level', $minimum_experience, null , ['class' => 'form-select form-select-solid', 'data-control' => 'select2', 'data-hide-search' => "true", 'data-placeholder' => "Select Experience Level", 'placeholder' => "Select Experience Level", "data-kt-ecommerce-product-filter" => "minimum_experience"]) !!}
                    {!! $errors->first('exp_level', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-header">
                <div class="card-title">
                    {!! Form::label('Sort By', 'Sort By', ['class' => 'control-label mb-3']) !!}
                </div>
            </div>
            <div class="card-body">
                <div class="form-group mb-5{{ $errors->has('sort_by') ? 'has-error' : ''}}">
                    {!! Form::number('sort_by', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                    {!! $errors->first('sort_by', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
    </div>
</div>
                
           


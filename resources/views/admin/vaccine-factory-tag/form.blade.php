<div class="row">
    <div class="row mb-5">
        <div class="col-md-8">
            <h3 class="card-title">
                @if($formMode == "edit") Edit Vaccine Factory Tag @else Add New Vaccine Factory Tag @endif
            </h3>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="float-end">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card"></i> Save</button>
                    <a href="{{ url('admin/vaccine-factory-tag') }}" title="Back"><button type="button" class="btn btn-secondary btn-sm cancel"><i class="bi bi-x" aria-hidden="true"></i> Cancel</button></a>
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
                                    {!! Form::label('name_'.$attr, 'Name' . ' (' . $lngcode . ')', ['class' => 'form-label required']) !!}
                                    {!! Form::text('name_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                    {!! $errors->first('name_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                </div>

                                <div class="form-group mb-5{{ $errors->has('content_'.$attr) ? 'has-error' : ''}}">

                                    {!! Form::label('content_'.$attr, 'Content' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                    {!! Form::textarea('content_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                    {!! $errors->first('content_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                </div>

                                @if($attr == 'tc')
                                    <div class="form-check mb-5 mt-5 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" {{isset($vaccine_factory_tag->is_translate)&&$vaccine_factory_tag->is_translate==1?'checked':''}} name="is_translate" id="auto_translate" value="1">
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
                            @if(!empty($vaccine_factory_tag->img))
                                <div class='lfmimage-container imglfmc0'>
                                    <img src="{{ asset($vaccine_factory_tag->img) }}" class='lfmimage w-100' style="height: 20rem;">
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
                                <a data-input="img" data-preview="holder-img" class="btn btn-primary text-white lfm-img">
                                    <i class="bi bi-image-fill me-2"></i>Select File
                                </a>
                            </span>
                            <input id="img" class="form-control" type="text" name="img" value="{{isset($vaccine_factory_tag) ? $vaccine_factory_tag->img : ''}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>







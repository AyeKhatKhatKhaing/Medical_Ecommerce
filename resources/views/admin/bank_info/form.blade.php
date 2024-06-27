<div class="row">
    <div class="row mb-5">
        <div class="col-md-8">
            <h3 class="card-title">
                @if($formMode == "edit") Edit Bank Information @else Add New Bank Information @endif
            </h3>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="float-end">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card"></i> Save</button>
                    <a href="{{ url('admin/bank-info') }}" title="Back"><button type="button" class="btn btn-secondary btn-sm cancel"><i class="bi bi-x" aria-hidden="true"></i> Cancel</button></a>
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
                                <div class="accordion" id="accordionExample">
            
                                    <div class="accordion-item mb-5">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                               HSBC Bank Information
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                {{-- <div class="form-group mb-5{{ $errors->has('bank1_name_'.$attr) ? 'has-error' : ''}}">
                                                    {!! Form::label('bank1_name_'.$attr, 'HSBC Bank Name' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                    {!! Form::text('bank1_name_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                                    {!! $errors->first('bank1_name_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                </div> --}}
                                                <div class="form-group mb-5{{ $errors->has('bank1_info_'.$attr) ? 'has-error' : ''}}">
                                                    {!! Form::label('bank1_info_'.$attr, 'HSBC Bank Information' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                    {!! Form::textarea('bank1_info_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                                    {!! $errors->first('bank1_info_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item mb-5">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                FPS Bank Information
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                {{-- <div class="form-group mb-5{{ $errors->has('bank2_name_'.$attr) ? 'has-error' : ''}}">
                                                    {!! Form::label('bank2_name_'.$attr, 'FPS Bank Name' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                    {!! Form::text('bank2_name_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                                    {!! $errors->first('bank2_name_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                </div> --}}
                                                <div class="form-group mb-5{{ $errors->has('bank2_info_'.$attr) ? 'has-error' : ''}}">
                                                    {!! Form::label('bank2_info_'.$attr, 'FPS Bank Information' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                    {!! Form::textarea('bank2_info_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                                    {!! $errors->first('bank2_info_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item mb-5">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                                Payme Information
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                {{-- <div class="form-group mb-5{{ $errors->has('bank3_name_'.$attr) ? 'has-error' : ''}}">
                                                    {!! Form::label('bank3_name_'.$attr, 'Payme Name' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                    {!! Form::text('bank3_name_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                                    {!! $errors->first('bank3_name_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                </div> --}}
                                                <div class="form-group mb-5{{ $errors->has('bank3_info_'.$attr) ? 'has-error' : ''}}">
                                                    {!! Form::label('bank3_info_'.$attr, 'Payme Information' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                    {!! Form::textarea('bank3_info_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                                    {!! $errors->first('bank3_info_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item mb-5">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                                Wechat Pay Information
                                            </button>
                                        </h2>
                                        <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                {{-- <div class="form-group mb-5{{ $errors->has('bank4_name_'.$attr) ? 'has-error' : ''}}">
                                                    {!! Form::label('bank4_name_'.$attr, 'Wechat Pay Name' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                    {!! Form::text('bank4_name_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                                    {!! $errors->first('bank4_name_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                </div> --}}
                                                <div class="form-group mb-5{{ $errors->has('bank4_info_'.$attr) ? 'has-error' : ''}}">
                                                    {!! Form::label('bank4_info_'.$attr, 'Wechat Pay Information' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                    {!! Form::textarea('bank4_info_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                                    {!! $errors->first('bank4_info_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="separator separator-content border-dark my-15"><span class="w-250px fw-bold">Checkout information</span></div>

                                        <div class="form-group mb-5{{ $errors->has('checkout_3_title_'.$attr) ? 'has-error' : ''}}">
                                            {!! Form::label('checkout_3_title_'.$attr, 'Title' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                            {!! Form::text('checkout_3_title_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control limit'] : ['class' => 'form-control limit']) !!}
                                            {!! $errors->first('checkout_3_title_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                        </div>
                                        <div class="form-group mb-5{{ $errors->has('checkout_3_desc_'.$attr) ? 'has-error' : ''}}">
                                            {!! Form::label('checkout_3_desc_'.$attr, 'Description' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                            {!! Form::textarea('checkout_3_desc_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control limit editor'] : ['class' => 'form-control limit editor']) !!}
                                            {!! $errors->first('checkout_3_desc_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                        </div>
                                    </div>
                                    
                                </div>

                                @if($attr == 'tc')
                                    <div class="form-check mb-5 mt-5 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" {{isset($bank_info->is_translate)&&$bank_info->is_translate==1?'checked':''}} name="is_translate" id="auto_translate" value="1">
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
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Logo (HSBC Bank Logo)</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Size( 60 x 60 )px</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                        <div id="holder-icon1-img">
                            @if(!empty($bank_info->bank1_logo))
                                <div class='lfmimage-container icon1-imglfmc0'>
                                    <img src="{{ asset($bank_info->bank1_logo) }}" class='lfmimage w-100' style="height: 20rem;">
                                    <div>
                                        <button type="button" onclick="removeImage('icon1-img',0)" class='btn btn-sm btn-danger w-100'>Remove</button>
                                    </div>
                                </div>
                            @else
                                <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                            @endif
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="lfm-icon1-img" data-input="icon1-img" data-preview="holder-icon1-img" class="btn btn-primary text-white lfm-img">
                                    <i class="bi bi-image-fill me-2"></i>Select File
                                </a>
                            </span>
                            <input id="icon1-img" class="form-control" type="text" name="bank1_logo" value="{{isset($bank_info) ? $bank_info->bank1_logo : ''}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Logo (FPS Logo)</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Size( 60 x 60 )px</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                        <div id="holder-icon2-img">
                            @if(!empty($bank_info->bank2_logo))
                                <div class='lfmimage-container icon2-imglfmc0'>
                                    <img src="{{ asset($bank_info->bank2_logo) }}" class='lfmimage w-100' style="height: 20rem;">
                                    <div>
                                        <button type="button" onclick="removeImage('icon2-img',0)" class='btn btn-sm btn-danger w-100'>Remove</button>
                                    </div>
                                </div>
                            @else
                                <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                            @endif
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="icon2-lfm-img" data-input="icon2-img" data-preview="holder-icon2-img" class="btn btn-primary text-white lfm-img">
                                    <i class="bi bi-image-fill me-2"></i>Select File
                                </a>
                            </span>
                            <input id="icon2-img" class="form-control" type="text" name="bank2_logo" value="{{isset($bank_info) ? $bank_info->bank2_logo : ''}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Logo (Payme Logo)</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Size( 60 x 60 )px</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                        <div id="holder-icon3-img">
                            @if(!empty($bank_info->bank3_logo))
                                <div class='lfmimage-container icon3-imglfmc0'>
                                    <img src="{{ asset($bank_info->bank3_logo) }}" class='lfmimage w-100' style="height: 20rem;">
                                    <div>
                                        <button type="button" onclick="removeImage('icon3-img',0)" class='btn btn-sm btn-danger w-100'>Remove</button>
                                    </div>
                                </div>
                            @else
                                <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                            @endif
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="icon3-lfm-img" data-input="icon3-img" data-preview="holder-icon3-img" class="btn btn-primary text-white lfm-img">
                                    <i class="bi bi-image-fill me-2"></i>Select File
                                </a>
                            </span>
                            <input id="icon3-img" class="form-control" type="text" name="bank3_logo" value="{{isset($bank_info) ? $bank_info->bank3_logo : ''}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Logo (Wechat Pay Logo)</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Size( 60 x 60 )px</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                        <div id="holder-icon4-img">
                            @if(!empty($bank_info->bank4_logo))
                                <div class='lfmimage-container icon4-imglfmc0'>
                                    <img src="{{ asset($bank_info->bank4_logo) }}" class='lfmimage w-100' style="height: 20rem;">
                                    <div>
                                        <button type="button" onclick="removeImage('icon4-img',0)" class='btn btn-sm btn-danger w-100'>Remove</button>
                                    </div>
                                </div>
                            @else
                                <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                            @endif
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="icon4-lfm-img" data-input="icon4-img" data-preview="holder-icon4-img" class="btn btn-primary text-white lfm-img">
                                    <i class="bi bi-image-fill me-2"></i>Select File
                                </a>
                            </span>
                            <input id="icon4-img" class="form-control" type="text" name="bank4_logo" value="{{isset($bank_info) ? $bank_info->bank4_logo : ''}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="row mb-5">
        <div class="col-md-8">
            <h3 class="card-title">
                @if($formMode == "edit") Edit Choose MediQ @else Add New Choose MediQ @endif
            </h3>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="float-end">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card"></i> Save</button>
                    <a href="{{ url('admin/choose-mediq') }}" title="Back"><button type="button" class="btn btn-secondary btn-sm cancel"><i class="bi bi-x" aria-hidden="true"></i> Cancel</button></a>
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
                                <div class="form-group mb-5{{ $errors->has('main_title_'.$attr) ? 'has-error' : ''}}">
                                    {!! Form::label('main_title_'.$attr, 'Main Title' . ' (' . $lngcode . ')', ['class' => 'form-label required']) !!}
                                    {!! Form::text('main_title_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                    {!! $errors->first('main_title_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                </div>
                                <div class="form-group mb-5{{ $errors->has('main_content_'.$attr) ? 'has-error' : ''}}">
                                    {!! Form::label('main_content_'.$attr, 'Main Description' . ' (' . $lngcode . ')', ['class' => 'form-label required']) !!}
                                    {!! Form::textarea('main_content_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                    {!! $errors->first('main_content_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                </div>
                                <hr>
                                <div class="form-group mb-5{{ $errors->has('shopping_guide_title_'.$attr) ? 'has-error' : ''}}">
                                    {!! Form::label('shopping_guide_title_'.$attr, 'Shopping guide title' . ' (' . $lngcode . ')', ['class' => 'required form-label']) !!}
                                    {!! Form::text('shopping_guide_title_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                    {!! $errors->first('shopping_guide_title_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                </div>
                                <div class="form-group mb-5{{ $errors->has('quick_start_guide_title_'.$attr) ? 'has-error' : ''}}">
                                    {!! Form::label('quick_start_guide_title_'.$attr, 'Quick Start Guide Ttitle' . ' (' . $lngcode . ')', ['class' => 'required form-label']) !!}
                                    {!! Form::text('quick_start_guide_title_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                    {!! $errors->first('quick_start_guide_title_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                </div>
                                <hr>
                                <div class="form-group mb-5{{ $errors->has('quick_start_guide_content_'.$attr) ? 'has-error' : ''}}">
                                    {!! Form::label('quick_start_guide_content_'.$attr, 'Quick Start Guide Content' . ' (' . $lngcode . ')', ['class' => 'required form-label']) !!}
                                    {!! Form::textarea('quick_start_guide_content_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                    {!! $errors->first('quick_start_guide_content_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                </div>
                                <div class="form-group mb-5{{ $errors->has('booking_title_'.$attr) ? 'has-error' : ''}}">
                                    {!! Form::label('booking_title_'.$attr, 'Booking Title' . ' (' . $lngcode . ')', ['class' => 'required form-label']) !!}
                                    {!! Form::text('booking_title_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                    {!! $errors->first('booking_title_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                </div>
                                <div class="form-group mb-5{{ $errors->has('booking_content_'.$attr) ? 'has-error' : ''}}">
                                    {!! Form::label('booking_content_'.$attr, 'Booking Content' . ' (' . $lngcode . ')', ['class' => 'required form-label']) !!}
                                    {!! Form::textarea('booking_content_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                    {!! $errors->first('booking_content_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                </div>
                                <hr>

                                <div class="form-group mb-5{{ $errors->has('main_link_'.$attr) ? 'has-error' : ''}}">
                                    {!! Form::label('main_link_'.$attr, 'Main Link' . ' (' . $lngcode . ')', ['class' => 'required form-label']) !!}
                                    {!! Form::text('main_link_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                    {!! $errors->first('main_link_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                </div>
                                <div class="form-group mb-5{{ $errors->has('quick_start_guide_link_'.$attr) ? 'has-error' : ''}}">
                                    {!! Form::label('quick_start_guide_link_'.$attr, 'Quick Start Guide Link' . ' (' . $lngcode . ')', ['class' => 'required form-label']) !!}
                                    {!! Form::text('quick_start_guide_link_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                    {!! $errors->first('quick_start_guide_link_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                </div>
                                <div class="form-group mb-5{{ $errors->has('booking_link_'.$attr) ? 'has-error' : ''}}">
                                    {!! Form::label('booking_link_'.$attr, 'Booking Link' . ' (' . $lngcode . ')', ['class' => 'required form-label']) !!}
                                    {!! Form::text('booking_link_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                    {!! $errors->first('booking_link_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                </div>
                                {{-- <div class="form-group mb-5{{ $errors->has('main_link') ? 'has-error' : ''}}">
                                    {!! Form::label('main_link', 'Main Link' , ['class' => 'form-label']) !!}
                                    {!! Form::text('main_link', null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                    {!! $errors->first('main_link', '<p class="help-block text-danger">:message</p>') !!}
                                </div>
                                <div class="form-group mb-5{{ $errors->has('quick_start_guide_link') ? 'has-error' : ''}}">
                                    {!! Form::label('quick_start_guide_link', 'Quick Start Guide Link' , ['class' => 'form-label']) !!}
                                    {!! Form::text('quick_start_guide_link', null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                    {!! $errors->first('quick_start_guide_link', '<p class="help-block text-danger">:message</p>') !!}
                                </div>
                                <div class="form-group mb-5{{ $errors->has('booking_link') ? 'has-error' : ''}}">
                                    {!! Form::label('booking_link', 'Booking Link' , ['class' => 'form-label']) !!}
                                    {!! Form::text('booking_link', null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                    {!! $errors->first('booking_link', '<p class="help-block text-danger">:message</p>') !!}
                                </div> --}}
                                
                                @if($attr == 'tc')
                                    <div class="form-check mb-5 mt-5 d-flex align-items-center mb-5">
                                        <input class="form-check-input" type="checkbox" {{isset($choosemediq->is_translate)&&$choosemediq->is_translate==1?'checked':''}} name="is_translate" id="auto_translate" value="1">
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
                <h3 class="card-title">Main Photo</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Image Size( 1000 x 535 )px</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                        <div id="holder-main-image">
                            @if(!empty($choosemediq->shopping_guide_img))
                                <div class='lfmimage-container main_imglfmc0'>
                                    <img src="{{ asset($choosemediq->main_img) }}" class='lfmimage w-100' style="height: 20rem;">
                                    <div>
                                        <button type="button" onclick="removeImage('main_img',0)" class='btn btn-sm btn-danger w-100'>Remove</button>
                                    </div>
                                </div>
                            @else
                                <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                            @endif
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="lfm-main_img" data-input="main_img" data-preview="holder-main-image" class="btn btn-primary text-white lfm-img">
                                    <i class="bi bi-image-fill me-2"></i>Select File
                                </a>
                            </span>
                            <input id="main_img" class="form-control" type="text" name="main_img" value="{{isset($choosemediq) ? $choosemediq->main_img : ''}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Shopping Guide Icon</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Image Size( 1000 x 535 )px</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                        <div id="holder-shopping-guide-icon-image">
                            @if(!empty($choosemediq->shopping_guide_img))
                                <div class='lfmimage-container shopping_guide_imglfmc0'>
                                    <img src="{{ asset($choosemediq->shopping_guide_img) }}" class='lfmimage w-100' style="height: 20rem;">
                                    <div>
                                        <button type="button" onclick="removeImage('shopping_guide_img',0)" class='btn btn-sm btn-danger w-100'>Remove</button>
                                    </div>
                                </div>
                            @else
                                <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                            @endif
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="lfm-shopping_guide_img" data-input="shopping_guide_img" data-preview="holder-shopping-guide-icon-image" class="btn btn-primary text-white lfm-img">
                                    <i class="bi bi-image-fill me-2"></i>Select File
                                </a>
                            </span>
                            <input id="shopping_guide_img" class="form-control" type="text" name="shopping_guide_img" value="{{isset($choosemediq) ? $choosemediq->shopping_guide_img : ''}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Quick Start Guide Icon</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Image Size( 1000 x 535 )px</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                        <div id="holder-quick-start-guide-icon-image">
                            @if(!empty($choosemediq->quick_start_guide_icon))
                                <div class='lfmimage-container quick_start_guide_iconlfmc0'>
                                    <img src="{{ asset($choosemediq->quick_start_guide_icon) }}" class='lfmimage w-100' style="height: 20rem;">
                                    <div>
                                        <button type="button" onclick="removeImage('quick_start_guide_icon',0)" class='btn btn-sm btn-danger w-100'>Remove</button>
                                    </div>
                                </div>
                            @else
                                <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                            @endif
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="lfm-quick_start_guide_icon" data-input="quick_start_guide_icon" data-preview="holder-quick-start-guide-icon-image" class="btn btn-primary text-white lfm-img">
                                    <i class="bi bi-image-fill me-2"></i>Select File
                                </a>
                            </span>
                            <input id="quick_start_guide_icon" class="form-control" type="text" name="quick_start_guide_icon" value="{{isset($choosemediq) ? $choosemediq->quick_start_guide_icon : ''}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Booking Icon</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Image Size( 1000 x 535 )px</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                        <div id="holder-booking-icon-image">
                            @if(!empty($choosemediq->booking_icon))
                                <div class='lfmimage-container booking_iconlfmc0'>
                                    <img src="{{ asset($choosemediq->booking_icon) }}" class='lfmimage w-100' style="height: 20rem;">
                                    <div>
                                        <button type="button" onclick="removeImage('booking_icon',0)" class='btn btn-sm btn-danger w-100'>Remove</button>
                                    </div>
                                </div>
                            @else
                                <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                            @endif
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="lfm-booking_icon" data-input="booking_icon" data-preview="holder-booking-icon-image" class="btn btn-primary text-white lfm-img">
                                    <i class="bi bi-image-fill me-2"></i>Select File
                                </a>
                            </span>
                            <input id="booking_icon" class="form-control" type="text" name="booking_icon" value="{{isset($choosemediq) ? $choosemediq->booking_icon : ''}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




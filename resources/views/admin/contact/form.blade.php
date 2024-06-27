<div class="row">
    <div class="row mb-5">
        <div class="col-md-8">
            <h3 class="card-title">
                @if($formMode == "edit") Edit Contact @else Add New Contact @endif
            </h3>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="float-end">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card"></i> Save</button>
                    <a href="{{ url('admin/contact') }}" title="Back"><button type="button" class="btn btn-secondary btn-sm cancel"><i class="bi bi-x" aria-hidden="true"></i> Cancel</button></a>
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
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseContact" aria-expanded="true" aria-controls="collapseContact">
                                               Contact Us Section
                                            </button>
                                        </h2>
                                        <div id="collapseContact" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="form-group mb-5{{ $errors->has('contact_title_'.$attr) ? 'has-error' : ''}}">
                                                    {!! Form::label('contact_title_'.$attr, 'Title' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                    {!! Form::text('contact_title_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                                    {!! $errors->first('contact_title_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                </div>
                                                <div class="form-group mb-5{{ $errors->has('contact_description_'.$attr) ? 'has-error' : ''}}">
                                                    {!! Form::label('contact_description_'.$attr, 'Description' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                    {!! Form::textarea('contact_description_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                                    {!! $errors->first('contact_description_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="accordion-item mb-5">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Help Section One
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="form-group mb-5{{ $errors->has('help1_name_'.$attr) ? 'has-error' : ''}}">
                                                    {!! Form::label('help1_name_'.$attr, 'Name' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                    {!! Form::text('help1_name_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                                    {!! $errors->first('help1_name_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                </div>
                                                <div class="form-group mb-5{{ $errors->has('help1_description_'.$attr) ? 'has-error' : ''}}">
                                                    {!! Form::label('help1_description_'.$attr, 'Description' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                    {!! Form::textarea('help1_description_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                                    {!! $errors->first('help1_description_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                </div>
                                                <div class="form-group mb-5{{ $errors->has('help1_link') ? 'has-error' : ''}}">
                                                    {!! Form::label('help1_link', 'Link', ['class' => 'form-label']) !!}
                                                    {!! Form::text('help1_link', null, ('required' == 'required') ? ['class' => 'form-control link1'] : ['class' => 'form-control link1']) !!}
                                                    {!! $errors->first('help1_link', '<p class="help-block text-danger">:message</p>') !!}
                                                </div>
                                                <div class="form-group mb-5{{ $errors->has('help1_link_text') ? 'has-error' : ''}}">
                                                    {!! Form::label('help1_link_text', 'Link Text', ['class' => 'form-label']) !!}
                                                    {!! Form::text('help1_link_text', null, ('required' == 'required') ? ['class' => 'form-control link1_text'] : ['class' => 'form-control link1_text']) !!}
                                                    {!! $errors->first('help1_link_text', '<p class="help-block text-danger">:message</p>') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item mb-5">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                Help Section Two
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="form-group mb-5{{ $errors->has('help2_name_'.$attr) ? 'has-error' : ''}}">
                                                    {!! Form::label('help2_name_'.$attr, 'Name' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                    {!! Form::text('help2_name_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                                    {!! $errors->first('help2_name_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                </div>
                                                <div class="form-group mb-5{{ $errors->has('help2_description_'.$attr) ? 'has-error' : ''}}">
                                                    {!! Form::label('help2_description_'.$attr, 'Description' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                    {!! Form::textarea('help2_description_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                                    {!! $errors->first('help2_description_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                </div>
                                                <div class="form-group mb-5{{ $errors->has('help2_link') ? 'has-error' : ''}}">
                                                    {!! Form::label('help2_link', 'Link', ['class' => 'form-label']) !!}
                                                    {!! Form::text('help2_link', null, ('required' == 'required') ? ['class' => 'form-control link2'] : ['class' => 'form-control link2']) !!}
                                                    {!! $errors->first('help2_link', '<p class="help-block text-danger">:message</p>') !!}
                                                </div>
                                                <div class="form-group mb-5{{ $errors->has('help2_link_text') ? 'has-error' : ''}}">
                                                    {!! Form::label('help2_link_text', 'Link Text', ['class' => 'form-label']) !!}
                                                    {!! Form::text('help2_link_text', null, ('required' == 'required') ? ['class' => 'form-control link2_text'] : ['class' => 'form-control link2_text']) !!}
                                                    {!! $errors->first('help2_link_text', '<p class="help-block text-danger">:message</p>') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item mb-5">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                                Help Section Three
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="form-group mb-5{{ $errors->has('help3_name_'.$attr) ? 'has-error' : ''}}">
                                                    {!! Form::label('help3_name_'.$attr, 'Name' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                    {!! Form::text('help3_name_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                                    {!! $errors->first('help3_name_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                </div>
                                                <div class="form-group mb-5{{ $errors->has('help3_description_'.$attr) ? 'has-error' : ''}}">
                                                    {!! Form::label('help3_description_'.$attr, 'Description' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                    {!! Form::textarea('help3_description_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                                    {!! $errors->first('help3_description_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                </div>
                                                <div class="form-group mb-5{{ $errors->has('help3_link') ? 'has-error' : ''}}">
                                                    {!! Form::label('help3_link', 'Link', ['class' => 'form-label']) !!}
                                                    {!! Form::text('help3_link', null, ('required' == 'required') ? ['class' => 'form-control link3'] : ['class' => 'form-control link3']) !!}
                                                    {!! $errors->first('help3_link', '<p class="help-block text-danger">:message</p>') !!}
                                                </div>
                                                <div class="form-group mb-5{{ $errors->has('help3_link_text') ? 'has-error' : ''}}">
                                                    {!! Form::label('help3_link_text', 'Link Text', ['class' => 'form-label']) !!}
                                                    {!! Form::text('help3_link_text', null, ('required' == 'required') ? ['class' => 'form-control link3_text'] : ['class' => 'form-control link3_text']) !!}
                                                    {!! $errors->first('help3_link_text', '<p class="help-block text-danger">:message</p>') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item mb-5">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                                Payment Method Section One
                                            </button>
                                        </h2>
                                        <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="form-group mb-5{{ $errors->has('payment_method1_name_'.$attr) ? 'has-error' : ''}}">
                                                    {!! Form::label('payment_method1_name_'.$attr, 'Payment Name' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                    {!! Form::text('payment_method1_name_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                                    {!! $errors->first('payment_method1_name_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                </div>
                                                <div class="form-group mb-5{{ $errors->has('payment_method1_description_'.$attr) ? 'has-error' : ''}}">
                                                    {!! Form::label('payment_method1_description_'.$attr, 'Payment Description' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                    {!! Form::textarea('payment_method1_description_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                                    {!! $errors->first('payment_method1_description_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item mb-5">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                                Payment Method Section Two
                                            </button>
                                        </h2>
                                        <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="form-group mb-5{{ $errors->has('payment_method2_name_'.$attr) ? 'has-error' : ''}}">
                                                    {!! Form::label('payment_method2_name_'.$attr, 'Payment Name' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                    {!! Form::text('payment_method2_name_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                                    {!! $errors->first('payment_method2_name_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                </div>
                                                <div class="form-group mb-5{{ $errors->has('payment_method2_description_'.$attr) ? 'has-error' : ''}}">
                                                    {!! Form::label('payment_method2_description_'.$attr, 'Payment Description' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                    {!! Form::textarea('payment_method2_description_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                                    {!! $errors->first('payment_method2_description_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                @if($attr == 'tc')
                                    <div class="form-check mb-5 mt-5 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" {{isset($contact->is_translate)&&$contact->is_translate==1?'checked':''}} name="is_translate" id="auto_translate" value="1">
                                        <label class="form-check-label ms-2" for="auto_translate">
                                            Auto translate to chinese
                                        </label>
                                    </div>
                                @endif
                            </div>
                        @endforeach


                        {{-- <div class="form-group mb-5{{ $errors->has('online_payment') ? 'has-error' : ''}}">
                            {!! Form::label('online_payment', 'Online Payment Methods', ['class' => 'form-label']) !!}
                            {!! Form::textarea('online_payment', null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                            {!! $errors->first('online_payment', '<p class="help-block text-danger">:message</p>') !!}
                        </div> --}}

                         <!-- start:common-area | holder4-->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Online payment image</h3>
                            </div>
                            <div class="card-body">
                                <div class="list-title mb-3">
                                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                                        <span style="color: #B5B5C3">Size (1000px x 535px)</span>
                                    </label>
                                </div>
                                <div class="panel-block">
                                    <div class="form-group">
                                        <ul class="dragGroup" id="holder4">
                                            @if (isset($contact->online_payment_img))
                                                @foreach ($contact->online_payment_img as $key => $img)
                                                    <li class="draggable w-100 draggableItem0 thumbnail4lfmc0" draggable="true">
                                                        <input type="hidden" name="holder4[]'" value="{{ $img }}"
                                                            id="galleryImage0">
                                                        <img src="{{ $img }}" class="lfmimage w-100">
                                                        <div>
                                                            <button type="button" onclick="removeGImage(this)"
                                                                class="btn btn-sm btn-danger w-100"
                                                                style="border-radius: 1px 1px 8px 8px;">Remove</button>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @else
                                                <img src="{{ asset('backend/media/blank-image.svg') }}"
                                                    class="img-thumbnail feature-img">
                                            @endif
                                        </ul>
                                        <div class="input-group mt-3">
                                            <span class="input-group-btn">
                                                <a id="lfm-pro" data-input="thumbnail4" data-ptype="g" data-preview="holder4"
                                                    class="lfm-pro lfm-img btn btn-primary text-white">
                                                    <i class="fa fa-picture-o"></i> Choose
                                                </a>
                                            </span>
                                            <input id="thumbnail4" class="form-control" type="text" name="online_payment_img[]"
                                                multiple="" readonly="">
                                        </div>
                                    </div>
                                    <span>*Can upload multiple image</span>
                                </div>
                            </div>
                        </div>


                        <div class="card mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Offline payment image</h3>
                            </div>
                            <div class="card-body">
                                <div class="list-title mb-3">
                                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                                        <span style="color: #B5B5C3">Size (1000px x 535px)</span>
                                    </label>
                                </div>
                                <div class="panel-block">
                                    <div class="form-group">
                                        <ul class="dragGroup" id="holder5">
                                            @if (isset($contact->offline_payment_img))
                                                @foreach ($contact->offline_payment_img as $key => $img)
                                                    <li class="draggable w-100 draggableItem0 thumbnail5lfmc0" draggable="true">
                                                        <input type="hidden" name="holder5[]'" value="{{ $img }}"
                                                            id="galleryImage0">
                                                        <img src="{{ $img }}" class="lfmimage w-100">
                                                        <div>
                                                            <button type="button" onclick="removeGImage(this)"
                                                                class="btn btn-sm btn-danger w-100"
                                                                style="border-radius: 1px 1px 8px 8px;">Remove</button>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @else
                                                <img src="{{ asset('backend/media/blank-image.svg') }}"
                                                    class="img-thumbnail feature-img">
                                            @endif
                                        </ul>
                                        <div class="input-group mt-3">
                                            <span class="input-group-btn">
                                                <a id="lfm-pro" data-input="thumbnail5" data-ptype="g" data-preview="holder5"
                                                    class="lfm-pro lfm-img btn btn-primary text-white">
                                                    <i class="fa fa-picture-o"></i> Choose
                                                </a>
                                            </span>
                                            <input id="thumbnail5" class="form-control" type="text" name="offline_payment_img[]"
                                                multiple="" readonly="">
                                        </div>
                                    </div>
                                    <span>*Can upload multiple image</span>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Header Image (For contact us)</h3>
                            </div>
                            <div class="card-body">
                                <div class="list-title mb-3">
                                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                                        {{-- <span style="color: #B5B5C3">Icon Size( 60 x 60 )px</span> --}}
                                    </label>
                                </div>
                                <div class="panel-block">
                                    <div class="form-group">
                                        <div id="holder-image1-img">
                                            @if(!empty($contact->contact_us_header_img))
                                                <div class='lfmimage-container image1-imglfmc0'>
                                                    <img src="{{ asset($contact->contact_us_header_img) }}" class='lfmimage w-100' style="height: 20rem;">
                                                    <div>
                                                        <button type="button" onclick="removeImage('image1-img',0)" class='btn btn-sm btn-danger w-100'>Remove</button>
                                                    </div>
                                                </div>
                                            @else
                                                <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                                            @endif
                                        </div>
                                        <div class="input-group mt-3">
                                            <span class="input-group-btn">
                                                <a id="lfm-image1-img" data-input="image1-img" data-preview="holder-image1-img" class="btn btn-primary text-white lfm-img">
                                                    <i class="bi bi-image-fill me-2"></i>Select File
                                                </a>
                                            </span>
                                            <input id="image1-img" class="form-control" type="text" name="contact_us_header_img" value="{{isset($contact) ? $contact->contact_us_header_img : ''}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Footer Image 1 (For contact us)</h3>
                            </div>
                            <div class="card-body">
                                <div class="list-title mb-3">
                                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                                        {{-- <span style="color: #B5B5C3">Icon Size( 60 x 60 )px</span> --}}
                                    </label>
                                </div>
                                <div class="panel-block">
                                    <div class="form-group">
                                        <div id="holder-image2-img">
                                            @if(!empty($contact->contact_us_footer_img1))
                                                <div class='lfmimage-container image2-imglfmc0'>
                                                    <img src="{{ asset($contact->contact_us_footer_img1) }}" class='lfmimage w-100' style="height: 20rem;">
                                                    <div>
                                                        <button type="button" onclick="removeImage('image2-img',0)" class='btn btn-sm btn-danger w-100'>Remove</button>
                                                    </div>
                                                </div>
                                            @else
                                                <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                                            @endif
                                        </div>
                                        <div class="input-group mt-3">
                                            <span class="input-group-btn">
                                                <a id="lfm-image2-img" data-input="image2-img" data-preview="holder-image2-img" class="btn btn-primary text-white lfm-img">
                                                    <i class="bi bi-image-fill me-2"></i>Select File
                                                </a>
                                            </span>
                                            <input id="image2-img" class="form-control" type="text" name="contact_us_footer_img1" value="{{isset($contact) ? $contact->contact_us_footer_img1 : ''}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Footer Image 2 (For contact us)</h3>
                            </div>
                            <div class="card-body">
                                <div class="list-title mb-3">
                                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                                        {{-- <span style="color: #B5B5C3">Icon Size( 60 x 60 )px</span> --}}
                                    </label>
                                </div>
                                <div class="panel-block">
                                    <div class="form-group">
                                        <div id="holder-image3-img">
                                            @if(!empty($contact->contact_us_footer_img2))
                                                <div class='lfmimage-container image3-imglfmc0'>
                                                    <img src="{{ asset($contact->contact_us_footer_img2) }}" class='lfmimage w-100' style="height: 20rem;">
                                                    <div>
                                                        <button type="button" onclick="removeImage('image3-img',0)" class='btn btn-sm btn-danger w-100'>Remove</button>
                                                    </div>
                                                </div>
                                            @else
                                                <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                                            @endif
                                        </div>
                                        <div class="input-group mt-3">
                                            <span class="input-group-btn">
                                                <a id="lfm-image3-img" data-input="image3-img" data-preview="holder-image3-img" class="btn btn-primary text-white lfm-img">
                                                    <i class="bi bi-image-fill me-2"></i>Select File
                                                </a>
                                            </span>
                                            <input id="image3-img" class="form-control" type="text" name="contact_us_footer_img2" value="{{isset($contact) ? $contact->contact_us_footer_img2 : ''}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Footer Image 3 (For contact us)</h3>
                            </div>
                            <div class="card-body">
                                <div class="list-title mb-3">
                                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                                        {{-- <span style="color: #B5B5C3">Icon Size( 60 x 60 )px</span> --}}
                                    </label>
                                </div>
                                <div class="panel-block">
                                    <div class="form-group">
                                        <div id="holder-image4-img">
                                            @if(!empty($contact->contact_us_footer_img3))
                                                <div class='lfmimage-container image4-imglfmc0'>
                                                    <img src="{{ asset($contact->contact_us_footer_img3) }}" class='lfmimage w-100' style="height: 20rem;">
                                                    <div>
                                                        <button type="button" onclick="removeImage('image4-img',0)" class='btn btn-sm btn-danger w-100'>Remove</button>
                                                    </div>
                                                </div>
                                            @else
                                                <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                                            @endif
                                        </div>
                                        <div class="input-group mt-3">
                                            <span class="input-group-btn">
                                                <a id="lfm-image4-img" data-input="image4-img" data-preview="holder-image4-img" class="btn btn-primary text-white lfm-img">
                                                    <i class="bi bi-image-fill me-2"></i>Select File
                                                </a>
                                            </span>
                                            <input id="image4-img" class="form-control" type="text" name="contact_us_footer_img3" value="{{isset($contact) ? $contact->contact_us_footer_img3 : ''}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                            {{-- <div class="card-title">Online Payment (Can select multiple)</div> --}}
                            {{-- <div class="card-body mb-5 pt-0 ps-0">
                                <div class="list-title mb-3">
                                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                                        <span style="color: #B5B5C3">Image Size(1200 x 630)px</span>
                                    </label>
                                </div>
                                <div class="panel-block">
                                    <div class="form-group">

                                        @php $arr=isset($contact)?explode(',',$contact->online_payment):'' @endphp
                                        @if(isset($contact) && !empty($contact->online_payment))
                                            @foreach($arr as $key => $op)
                                                @if($op!=='')
                                                <div id="holder-meta-image{{$key}}"  style="width: 75%">
                                                    <div class='lfmimage-container meta-image{{$key}}lfmc0'>
                                                        <img src="{{ asset($op) }}" class='lfmimage w-100' style="height: 20rem;">
                                                        <button type="button" onclick="removeImage('meta-image{{$key}}',0)" class='btn btn-sm btn-danger w-100'>Remove</button>
                                                    </div>
                                                </div>
                                                <div class="input-group my-3" style="width: 75%">
                                                    <span class="input-group-btn">
                                                        <a id="lfm-meta-image{{$key}}" data-input="meta-image{{$key}}" data-preview="holder-meta-image{{$key}}" class="btn btn-primary btn-sm text-white lfm-img payment_file">
                                                            <i class="bi bi-image-fill me-2"></i>Select File
                                                        </a>
                                                    </span>
                                                    <input id="meta-image{{$key}}" class="form-control payment_url" type="text" name="online_payment[]" value="{{isset($contact)?$op:''}}">
                                                </div>
                                                @endif
                                            @endforeach
                                        @else
                                            <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                                            <div class="input-group mt-3">
                                                    <span class="input-group-btn">
                                                        <a id="lfm-meta-image" data-input="meta-image" data-preview="holder-meta-image" class="btn btn-primary btn-sm text-white lfm-img">
                                                            <i class="bi bi-image-fill me-2"></i>Select File
                                                        </a>
                                                    </span>
                                                <input id="meta-image" class="form-control" type="text" name="online_payment[]">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div> --}}

                            {{-- <div class="card-title">Office Photo (Can select multiple)</div>
                            <div class="card-body pt-0 ps-0">
                                <div class="list-title mb-3">
                                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                                        <span style="color: #B5B5C3">Image Size(1200 x 630)px</span>
                                    </label>
                                </div>
                                <div class="panel-block">
                                    <div class="form-group">
                                        @php $arr=isset($contact)?explode(',',$contact->office_photo):'' @endphp
                                        <div class="form-group">
                                            <div id="holder-icon1-img">
                                                @if(!empty($contact->help1_icon))
                                                    <div class='lfmimage-container icon1-imglfmc0'>
                                                        <img src="{{ asset($contact->help1_icon) }}" class='lfmimage w-75 office-img' style="height: 20rem;">
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
                                                <input id="icon1-img" class="form-control" type="text" name="help1_icon" value="{{isset($contact) ? $contact->help1_icon : ''}}">
                                            </div>
                                        </div>
                                        @if(isset($contact) && !empty($contact->office_photo))
                                            @foreach($arr as $key => $op)
                                                @if($op!=='')
                                                <div id="holder-office-image{{$key}}" style="width: 75%" class="mb-3">
                                                    <div class='lfmimage-container office-image{{$key}}lfmc0'>
                                                        <img src="{{ asset($op) }}" class='lfmimage w-100' style="height: 20rem;">
                                                        <div>
                                                            <button type="button" onclick="removeImage('office-image{{$key}}',0)" class='btn btn-sm btn-danger w-100'>Remove</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="input-group my-3" style="width: 75%">
                                                    <span class="input-group-btn">
                                                        <a id="lfm-office-image{{$key}}" data-input="office-image{{$key}}" data-preview="holder-office-image{{$key}}" class="btn btn-primary btn-sm text-white lfm-img">
                                                            <i class="bi bi-image-fill me-2"></i>Select File
                                                        </a>
                                                    </span>
                                                    <input id="office-image{{$key}}" class="form-control office_url" type="text" name="office_photo[]" value="{{isset($contact)?$op:''}}">
                                                </div>
                                                @endif
                                            @endforeach
                                        @else
                                            <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                                            <div class="input-group mt-3">
                                                    <span class="input-group-btn">
                                                        <a id="lfm-office-image" data-input="office-image" data-preview="holder-office-image" class="btn btn-primary btn-sm text-white lfm-img">
                                                            <i class="bi bi-image-fill me-2"></i>Select File
                                                        </a>
                                                    </span>
                                                <input id="office-image" class="form-control" type="text" name="office_photo[]">
                                            </div>
                                        @endif 

                                         <div id="holder-icon1-img">
                                            @if(!empty($contact->help1_icon))
                                                <div class='lfmimage-container icon1-imglfmc0'>
                                                    <img src="{{ asset($contact->help1_icon) }}" class='lfmimage w-100' style="height: 20rem;">
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
                                            <input id="icon1-img" class="form-control" type="text" name="help1_icon" value="{{isset($contact) ? $contact->help1_icon : ''}}">
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Icon (Help Section One)</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Icon Size( 60 x 60 )px</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                        <div id="holder-icon1-img">
                            @if(!empty($contact->help1_icon))
                                <div class='lfmimage-container icon1-imglfmc0'>
                                    <img src="{{ asset($contact->help1_icon) }}" class='lfmimage w-100' style="height: 20rem;">
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
                            <input id="icon1-img" class="form-control" type="text" name="help1_icon" value="{{isset($contact) ? $contact->help1_icon : ''}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Icon (Help Section Two)</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Icon Size( 60 x 60 )px</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                        <div id="holder-icon2-img">
                            @if(!empty($contact->help2_icon))
                                <div class='lfmimage-container icon2-imglfmc0'>
                                    <img src="{{ asset($contact->help2_icon) }}" class='lfmimage w-100' style="height: 20rem;">
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
                            <input id="icon2-img" class="form-control" type="text" name="help2_icon" value="{{isset($contact) ? $contact->help2_icon : ''}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Icon (Help Section Three)</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Icon Size( 60 x 60 )px</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                        <div id="holder-icon3-img">
                            @if(!empty($contact->help3_icon))
                                <div class='lfmimage-container icon3-imglfmc0'>
                                    <img src="{{ asset($contact->help3_icon) }}" class='lfmimage w-100' style="height: 20rem;">
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
                            <input id="icon3-img" class="form-control" type="text" name="help3_icon" value="{{isset($contact) ? $contact->help3_icon : ''}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Icon (Payment Method Section One)</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Icon Size( 60 x 60 )px</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                        <div id="holder-icon4-img">
                            @if(!empty($contact->payment_method1_icon))
                                <div class='lfmimage-container icon4-imglfmc0'>
                                    <img src="{{ asset($contact->payment_method1_icon) }}" class='lfmimage w-100' style="height: 20rem;">
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
                                <a id="icon4-lfm-img" data-input="icon4-img" data-preview="holder-icon4-img" class="btn btn-primary text-white lfm-img">
                                    <i class="bi bi-image-fill me-2"></i>Select File
                                </a>
                            </span>
                            <input id="icon4-img" class="form-control" type="text" name="payment_method1_icon" value="{{isset($contact) ? $contact->payment_method1_icon : ''}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Icon (Payment Method Section Two)</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Icon Size( 60 x 60 )px</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                        <div id="holder-icon5-img">
                            @if(!empty($contact->payment_method2_icon))
                                <div class='lfmimage-container icon5-imglfmc0'>
                                    <img src="{{ asset($contact->payment_method2_icon) }}" class='lfmimage w-100' style="height: 20rem;">
                                    <div>
                                        <button type="button" onclick="removeImage('icon5-img',0)" class='btn btn-sm btn-danger w-100'>Remove</button>
                                    </div>
                                </div>
                            @else
                                <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                            @endif
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="icon5-lfm-img" data-input="icon5-img" data-preview="holder-icon5-img" class="btn btn-primary text-white lfm-img">
                                    <i class="bi bi-image-fill me-2"></i>Select File
                                </a>
                            </span>
                            <input id="icon5-img" class="form-control" type="text" name="payment_method2_icon" value="{{isset($contact) ? $contact->payment_method2_icon : ''}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




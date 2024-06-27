<div class="row">
    <div class="row mb-5">
        <div class="col-md-8">
            <h3 class="card-title">
                @if ($formMode == 'edit')
                    Edit Contact Us
                @else
                    Add New Contact Us
                @endif
            </h3>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="float-end">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card"></i> Save</button>
                    <a href="{{ url('admin/contact') }}" title="Back"><button type="button"
                            class="btn btn-secondary btn-sm cancel"><i class="bi bi-x" aria-hidden="true"></i>
                            Cancel</button></a>
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
                                <div class="form-group mb-5{{ $errors->has('time_'.$attr) ? 'has-error' : ''}}">
                                    {!! Form::label('time_'.$attr, 'Open time and close time' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                    {!! Form::textarea('time_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                    {!! $errors->first('time_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                </div>


                                <div class="accordion-item mb-5">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseSeo" aria-expanded="true" aria-controls="collapseSeo">
                                            Search Engine Optimization
                                        </button>
                                    </h2>
                                    <div id="collapseSeo" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row mt-4">
                                                <div class="col-md-12">
                                                    {{-- <h5>Search Engin Optimization (SEO)</h5> --}}
                                                    <div class="card-header">
                                                        <h3 class="card-title">Search Engin Optimization (SEO)</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-5">
                                                <div class="@if ($attr == 'en') col-md-6 @else col-md-12 @endif">
                                                    <div class="form-group mb-5{{ $errors->has('meta_title_'.$attr) ? 'has-error' : ''}}">
                                                        {!! Form::label('meta_title_'.$attr, 'Meta Title' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                        {!! Form::text('meta_title_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                                        {!! $errors->first('meta_title_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                    </div>
                                                    <div class="form-group mb-5{{ $errors->has('meta_description_'.$attr) ? 'has-error' : ''}}">
                                                        {!! Form::label('meta_description_'.$attr, 'Meta Description' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                        {!! Form::textarea('meta_description_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                                        {!! $errors->first('meta_description_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                    </div>
                                                </div>
                                                @if($attr == 'en')
                                                    <div class="col-md-6">
                                                        <div class="card-body pt-0">
                                                            <div class="list-title mb-3">
                                                                <label for="kt_ecommerce_add_product_store_template" class="form-label">
                                                                    <span style="color: #B5B5C3">Image Size(1200 x 630)px</span>
                                                                </label>
                                                            </div>
                                                            <div class="panel-block">
                                                                <div class="form-group">
                                                                    <div id="holder-meta-image">
                                                                        @if(!empty($contact->meta_img))
                                                                            <div class='lfmimage-container meta-imagelfmc0'>
                                                                                <img src="{{ asset($contact->meta_img) }}" class='lfmimage w-100' style="height: 20rem;">
                                                                                <div>
                                                                                    <button type="button" onclick="removeImage('meta-image',0)" class='btn btn-sm btn-danger w-100'>Remove</button>
                                                                                </div>
                                                                            </div>
                                                                        @else
                                                                            <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                                                                        @endif
                                                                    </div>
                                                                    <div class="input-group mt-3">
                                                                    <span class="input-group-btn">
                                                                        <a id="lfm-meta-image" data-input="meta-image" data-preview="holder-meta-image" class="btn btn-primary btn-sm text-white lfm-img">
                                                                            <i class="bi bi-image-fill me-2"></i>Select File
                                                                        </a>
                                                                    </span>
                                                                        <input id="meta-image" class="form-control" type="text" name="meta_img" value="{{isset($contact) ? $contact->meta_img : ''}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                    
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                        @endforeach      
                    </div>
                    <div class="">
                       
                        <div class="accordion-item mb-5">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Email
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row mb-5">
                                        <div class="col-4">
                                            <div
                                                class="form-group mt-4{{ $errors->has('email_title_en') ? ' has-error' : '' }}">
                                                <div class="list-title mb-3">
                                                    {!! Form::label('name', 'Email Title (EN): ', ['class' => 'control-label required']) !!}
                                                </div>
                                                {!! Form::text('email_title_en', null, ['class' => 'form-control', 'tabindex' => 1]) !!}
                                                {!! $errors->first('email_title_en', '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div
                                                class="form-group mt-4{{ $errors->has('email_title_tc') ? ' has-error' : '' }}">
                                                <div class="list-title mb-3">
                                                    {!! Form::label('name', 'Email Title (TC): ', ['class' => 'control-label required']) !!}
                                                </div>
                                                {!! Form::text('email_title_tc', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('email_title_tc', '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div
                                                class="form-group mt-4{{ $errors->has('email_title_sc') ? ' has-error' : '' }}">
                                                <div class="list-title mb-3">
                                                    {!! Form::label('name', 'Email Title (SC): ', ['class' => 'control-label required']) !!}
                                                </div>
                                                {!! Form::text('email_title_sc', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('email_title_sc', '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                        </div>

                                       
                                    </div>
                                    <div class="form-group mb-5{{ $errors->has('email') ? 'has-error' : '' }}">
                                        {!! Form::label('email', 'Email', ['class' => 'form-label required']) !!}
                                        {!! Form::text(
                                            'email',
                                            null,
                                            'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                        ) !!}
                                        {!! $errors->first('email', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>
                                    <div class="card mb-4">
                                        {{-- <div class="card-header"> --}}
                                            <p class="card-title">Logo (Email Logo)</p>
                                        {{-- </div> --}}
                                        <div class="card-body">
                                            <div class="list-title mb-3">
                                                <label for="kt_ecommerce_add_product_store_template" class="form-label">
                                                    <span style="color: #B5B5C3">Logo Size( 60 x 60 )px</span>
                                                </label>
                                            </div>
                                            <div class="panel-block">
                                                <div class="form-group">
                                                    <div id="holder-icon1-img">
                                                        @if (!empty($contact->email_logo))
                                                            <div class='lfmimage-container icon1-imglfmc0 col-md-3'>
                                                                <img src="{{ asset($contact->email_logo) }}"
                                                                    class='lfmimage w-100' style="height: 20rem;">
                                                                <div>
                                                                    <button type="button"
                                                                        onclick="removeImage('icon1-img',0)"
                                                                        class='btn btn-sm btn-danger w-100'>Remove</button>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <img src="{{ asset('backend/media/blank-image.svg') }}"
                                                                class="img-thumbnail" style="width:60px; height:60px;">
                                                        @endif
                                                    </div>
                                                    <div class="input-group mt-3">
                                                        <span class="input-group-btn col-md-3">
                                                            <a id="lfm-icon1-img" data-input="icon1-img"
                                                                data-preview="holder-icon1-img "
                                                                class="btn btn-primary text-white lfm-img">
                                                                <i class="bi bi-image-fill me-2"></i>Select File
                                                            </a>
                                                        </span>
                                                        <input id="icon1-img" class="form-control" type="text"
                                                            name="email_logo"
                                                            value="{{ isset($contact) ? $contact->email_logo : '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item mb-5">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                    Hotline
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row mb-5">
                                        <div class="col-4">
                                            <div
                                                class="form-group mt-4{{ $errors->has('hotline_title_en') ? ' has-error' : '' }}">
                                                <div class="list-title mb-3">
                                                    {!! Form::label('name', 'Hotline Title (EN): ', ['class' => 'control-label required']) !!}
                                                </div>
                                                {!! Form::text('hotline_title_en', null, ['class' => 'form-control', 'tabindex' => 1]) !!}
                                                {!! $errors->first('hotline_title_en', '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div
                                                class="form-group mt-4{{ $errors->has('hotline_title_tc') ? ' has-error' : '' }}">
                                                <div class="list-title mb-3">
                                                    {!! Form::label('name', 'Hotline Title (TC): ', ['class' => 'control-label required']) !!}
                                                </div>
                                                {!! Form::text('hotline_title_tc', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('hotline_title_tc', '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div
                                                class="form-group mt-4{{ $errors->has('hotline_title_sc') ? ' has-error' : '' }}">
                                                <div class="list-title mb-3">
                                                    {!! Form::label('name', 'Hotline Title (SC): ', ['class' => 'control-label required']) !!}
                                                </div>
                                                {!! Form::text('hotline_title_sc', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('hotline_title_sc', '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                        </div>

                                      
                                    </div>
                                    <div class="form-group mb-5{{ $errors->has('hotline') ? 'has-error' : '' }}">
                                        {!! Form::label('hotline', 'Hotline', ['class' => 'form-label required']) !!}
                                        {!! Form::text(
                                            'hotline',
                                            null,
                                            'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                        ) !!}
                                        {!! $errors->first('hotline', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>
                                    <div class="card mb-4">
                                        {{-- <div class="card-header"> --}}
                                            <p class="card-title fs-6">Logo (Hotline)</p>
                                        {{-- </div> --}}
                                        <div class="card-body">
                                            <div class="list-title mb-3">
                                                <label for="kt_ecommerce_add_product_store_template" class="form-label">
                                                    <span style="color: #B5B5C3">Icon Size( 60 x 60 )px</span>
                                                </label>
                                            </div>
                                            <div class="panel-block">
                                                <div class="form-group">
                                                    <div id="holder-icon2-img">
                                                        @if(!empty($contact->hotline_logo))
                                                            <div class='lfmimage-container icon2-imglfmc0  col-md-3' >
                                                                <img src="{{ asset($contact->hotline_logo) }}" class='lfmimage w-100' style="height: 20rem;">
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
                                                        <input id="icon2-img" class="form-control" type="text" name="hotline_logo" value="{{isset($contact) ? $contact->hotline_logo : ''}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item mb-5">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                    WhatsApp
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row mb-5">
                                        <div class="col-4">
                                            <div
                                                class="form-group mt-4{{ $errors->has('whats_up_title_en') ? ' has-error' : '' }}">
                                                <div class="list-title mb-3">
                                                    {!! Form::label('name', 'WhatsApp Title (EN): ', ['class' => 'control-label required']) !!}
                                                </div>
                                                {!! Form::text('whats_up_title_en', null, ['class' => 'form-control', 'tabindex' => 1]) !!}
                                                {!! $errors->first('whats_up_title_en', '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div
                                                class="form-group mt-4{{ $errors->has('whats_up_title_tc') ? ' has-error' : '' }}">
                                                <div class="list-title mb-3">
                                                    {!! Form::label('name', 'WhatsApp Title (TC): ', ['class' => 'control-label required']) !!}
                                                </div>
                                                {!! Form::text('whats_up_title_tc', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('whats_up_title_tc', '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div
                                                class="form-group mt-4{{ $errors->has('whats_up_title_sc') ? ' has-error' : '' }}">
                                                <div class="list-title mb-3">
                                                    {!! Form::label('name', 'WhatsApp Title (SC): ', ['class' => 'control-label required']) !!}
                                                </div>
                                                {!! Form::text('whats_up_title_sc', null, ['class' => 'form-control']) !!}
                                                {!! $errors->first('whats_up_title_sc', '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                        </div>

                                   
                                    </div>
                                    <div class="form-group mb-5{{ $errors->has('whats_up') ? 'has-error' : '' }}">
                                        {!! Form::label('whats_up', 'WhatsApp', ['class' => 'form-label required']) !!}
                                        {!! Form::text(
                                            'whats_up',
                                            null,
                                            'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                        ) !!}
                                        {!! $errors->first('whats_up', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>
                                    <div class="card mb-4">
                                        {{-- <div class="card-header"> --}}
                                            <p class="card-title fs-6">Logo (WhatsApp)</p>
                                        {{-- </div> --}}
                                        <div class="card-body">
                                            <div class="list-title mb-3">
                                                <label for="kt_ecommerce_add_product_store_template" class="form-label">
                                                    <span style="color: #B5B5C3">Icon Size( 60 x 60 )px</span>
                                                </label>
                                            </div>
                                            <div class="panel-block">
                                                <div class="form-group">
                                                    <div id="holder-icon3-img">
                                                        @if(!empty($contact->whats_up_logo))
                                                            <div class='lfmimage-container col-md-3 icon3-imglfmc0'>
                                                                <img src="{{ asset($contact->whats_up_logo) }}" class='lfmimage w-20' style="height: 20rem;">
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
                                                        <input id="icon3-img" class="form-control" type="text" name="whats_up_logo" value="{{isset($contact) ? $contact->whats_up_logo : ''}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

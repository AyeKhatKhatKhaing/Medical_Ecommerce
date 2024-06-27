<div class="row">
    <div class="row mb-5">
        <div class="col-md-8">
            <h3 class="card-title">
                @if ($formMode == 'edit')
                    Faq Page Information
                @else
                    Faq Page Information
                @endif
            </h3>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="float-end">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card"></i> Save</button>
                    <a href="{{ url('admin/faq-page') }}" title="Back"><button type="button"
                            class="btn btn-secondary btn-sm cancel"><i class="bi bi-x" aria-hidden="true"></i>
                            Cancel</button></a>
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
                            <a onclick="showHideDescription('{{ strtolower($lngcode) }}')"
                                class="nav-link {{ $lngcode == 'EN' ? 'active' : '' }} nav_link" data-bs-toggle="tab"
                                href="#{{ strtolower($lngcode) }}-tab">
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
                            <div class="tab-pane fade {{ $attr == 'en' ? 'active show' : '' }}"
                                id="{{ strtolower($lngcode) }}-tab">
                                <div class="accordion-item mb-5">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#banner_section" aria-expanded="true"
                                            aria-controls="banner_section">
                                            Banner
                                        </button>
                                    </h2>
                                    <div id="banner_section" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div
                                                class="form-group mb-5{{ $errors->has('banner_title_' . $attr) ? 'has-error' : '' }}">
                                                {!! Form::label('banner_title_' . $attr, 'Banner title' . ' (' . $lngcode . ')', [
                                                    'class' => 'form-label required',
                                                ]) !!}
                                                {!! Form::text(
                                                    'banner_title_' . $attr,
                                                    null,
                                                    'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                ) !!}
                                                {!! $errors->first('banner_title_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item mb-5">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#cooperation_section" aria-expanded="true"
                                            aria-controls="cooperation_section">
                                            Titles
                                        </button>
                                    </h2>
                                    <div id="cooperation_section" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div
                                                class="form-group mb-5{{ $errors->has('title1_' . $attr) ? 'has-error' : '' }}">
                                                {!! Form::label('title1_' . $attr, 'Title One ' . ' (' . $lngcode . ')', [
                                                    'class' => 'form-label required',
                                                ]) !!}
                                                {!! Form::text(
                                                    'title1_' . $attr,
                                                    null,
                                                    'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                ) !!}
                                                {!! $errors->first('title1_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div>

                                            <div
                                                class="form-group mb-5{{ $errors->has('title2_' . $attr) ? 'has-error' : '' }}">
                                                {!! Form::label('title2_' . $attr, 'Title Two' . ' (' . $lngcode . ')', [
                                                    'class' => 'form-label',
                                                ]) !!}
                                                {!! Form::text(
                                                    'title2_' . $attr,
                                                    null,
                                                    'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                ) !!}
                                                {!! $errors->first('title2_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item mb-5">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#steps_section" aria-expanded="true"
                                            aria-controls="steps_section">
                                            Bunner links
                                        </button>
                                    </h2>
                                    <div id="steps_section" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div
                                                class="form-group mb-5{{ $errors->has('button1_title_' . $attr) ? 'has-error' : '' }}">
                                                {!! Form::label('button1_title_' . $attr, 'Link one' . ' (' . $lngcode . ')', [
                                                    'class' => 'form-label required',
                                                ]) !!}
                                                {!! Form::text(
                                                    'button1_title_' . $attr,
                                                    null,
                                                    'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                ) !!}
                                                {!! $errors->first('button1_title_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                            <div
                                                class="form-group mb-5{{ $errors->has('button2_title_' . $attr) ? 'has-error' : '' }}">
                                                {!! Form::label('button2_title_' . $attr, 'Link two' . ' (' . $lngcode . ')', [
                                                    'class' => 'form-label required',
                                                ]) !!}
                                                {!! Form::text(
                                                    'button2_title_' . $attr,
                                                    null,
                                                    'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                ) !!}
                                                {!! $errors->first('button2_title_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                            <div
                                                class="form-group mb-5{{ $errors->has('button3_title_' . $attr) ? 'has-error' : '' }}">
                                                {!! Form::label('button3_title_' . $attr, 'Link three' . ' (' . $lngcode . ')', [
                                                    'class' => 'form-label required',
                                                ]) !!}
                                                {!! Form::text(
                                                    'button3_title_' . $attr,
                                                    null,
                                                    'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                ) !!}
                                                {!! $errors->first('button3_title_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item mb-5">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#contact_section" aria-expanded="true"
                                            aria-controls="contact_section">
                                            Contact
                                        </button>
                                    </h2>
                                    <div id="contact_section" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div
                                                class="form-group mb-5{{ $errors->has('contact1_' . $attr) ? 'has-error' : '' }}">
                                                {!! Form::label('contact1_' . $attr, 'Contact one' . ' (' . $lngcode . ')', [
                                                    'class' => 'form-label required',
                                                ]) !!}
                                                {!! Form::text(
                                                    'contact1_' . $attr,
                                                    null,
                                                    'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                ) !!}
                                                {!! $errors->first('contact1_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                            <div
                                                class="form-group mb-5{{ $errors->has('contact2_' . $attr) ? 'has-error' : '' }}">
                                                {!! Form::label('contact2_' . $attr, 'Contact two' . ' (' . $lngcode . ')', [
                                                    'class' => 'form-label required',
                                                ]) !!}
                                                {!! Form::text(
                                                    'contact2_' . $attr,
                                                    null,
                                                    'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                ) !!}
                                                {!! $errors->first('contact2_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                            <div
                                                class="form-group mb-5{{ $errors->has('contact3_' . $attr) ? 'has-error' : '' }}">
                                                {!! Form::label('contact3_' . $attr, 'Contact three' . ' (' . $lngcode . ')', [
                                                    'class' => 'form-label required',
                                                ]) !!}
                                                {!! Form::text(
                                                    'contact3_' . $attr,
                                                    null,
                                                    'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                ) !!}
                                                {!! $errors->first('contact3_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <div class="card-header">
                                            <h3 class="card-title">Search Engin Optimization (SEO)</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="@if ($attr == 'en') col-md-6 @else col-md-12 @endif">
                                        <div
                                            class="form-group mb-5{{ $errors->has('meta_title_' . $attr) ? 'has-error' : '' }}">
                                            {!! Form::label('meta_title_' . $attr, 'Meta Title' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                            {!! Form::text(
                                                'meta_title_' . $attr,
                                                null,
                                                'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                            ) !!}
                                            {!! $errors->first('meta_title_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                        </div>
                                        <div
                                            class="form-group mb-5{{ $errors->has('meta_description_' . $attr) ? 'has-error' : '' }}">
                                            {!! Form::label('meta_description_' . $attr, 'Meta Description' . ' (' . $lngcode . ')', [
                                                'class' => 'form-label',
                                            ]) !!}
                                            {!! Form::textarea(
                                                'meta_description_' . $attr,
                                                null,
                                                'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                            ) !!}
                                            {!! $errors->first('meta_description_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                        </div>
                                    </div>
                                    @if ($attr == 'en')
                                        <div class="col-md-6">
                                            <div class="card-body pt-0">
                                                <div class="list-title mb-3">
                                                    <label for="kt_ecommerce_add_product_store_template"
                                                        class="form-label">
                                                        <span style="color: #B5B5C3">Image Size(1200 x
                                                            630)px</span>
                                                    </label>
                                                </div>
                                                <div class="panel-block">
                                                    <div class="form-group">
                                                        <div id="holder-meta-image">
                                                            @if (!empty($faqpage->meta_img))
                                                                <div class='lfmimage-container meta-imagelfmc0'>
                                                                    <img src="{{ asset($faqpage->meta_img) }}"
                                                                        class='lfmimage w-100' style="height: 20rem;">
                                                                    <div>
                                                                        <button type="button"
                                                                            onclick="removeImage('meta-image',0)"
                                                                            class='btn btn-sm btn-danger w-100'>Remove</button>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <img src="{{ asset('backend/media/blank-image.svg') }}"
                                                                    class="img-thumbnail">
                                                            @endif
                                                        </div>
                                                        <div class="input-group mt-3">
                                                            <span class="input-group-btn">
                                                                <a id="lfm-meta-image" data-input="meta-image"
                                                                    data-preview="holder-meta-image"
                                                                    class="btn btn-primary btn-sm text-white lfm-img">
                                                                    <i class="bi bi-image-fill me-2"></i>Select
                                                                    File
                                                                </a>
                                                            </span>
                                                            <input id="meta-image" class="form-control"
                                                                type="text" name="meta_img"
                                                                value="{{ isset($faqpage) ? $faqpage->meta_img : '' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
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
                <h3 class="card-title">Banner Photo</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Image Size( 1000 x 535 )px</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                        <div id="holder-banner_img">
                            @if (!empty($faqpage->banner_img))
                                <div class='lfmimage-container banner_imglfmc0'>
                                    <img src="{{ asset($faqpage->banner_img) }}" class='lfmimage w-100'
                                        style="height: 20rem;">
                                    <div>
                                        <button type="button" onclick="removeImage('banner_img',0)"
                                            class='btn btn-sm btn-danger w-100'>Remove</button>
                                    </div>
                                </div>
                            @else
                                <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                            @endif
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="lfm-banner_img" data-input="banner_img" data-preview="holder-banner_img"
                                    class="btn btn-primary text-white lfm-img">
                                    <i class="bi bi-image-fill me-2"></i>Select File
                                </a>
                            </span>
                            <input id="banner_img" class="form-control" type="text" name="banner_img"
                                value="{{ isset($faqpage) ? $faqpage->banner_img : '' }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Link one image</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Image Size( 1000 x 535 )px</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                        <div id="holder-button1_img">
                            @if (!empty($faqpage->button1_img))
                                <div class='lfmimage-container button1_imglfmc0'>
                                    <img src="{{ asset($faqpage->button1_img) }}" class='lfmimage w-100'
                                        style="height: 20rem;">
                                    <div>
                                        <button type="button" onclick="removeImage('button1_img',0)"
                                            class='btn btn-sm btn-danger w-100'>Remove</button>
                                    </div>
                                </div>
                            @else
                                <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                            @endif
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="lfm-button1_img" data-input="button1_img" data-preview="holder-button1_img"
                                    class="btn btn-primary text-white lfm-img">
                                    <i class="bi bi-image-fill me-2"></i>Select File
                                </a>
                            </span>
                            <input id="button1_img" class="form-control" type="text" name="button1_img"
                                value="{{ isset($faqpage) ? $faqpage->button1_img : '' }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Link two image</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Image Size( 1000 x 535 )px</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                        <div id="holder-button2_img">
                            @if (!empty($faqpage->button2_img))
                                <div class='lfmimage-container button2_imglfmc0'>
                                    <img src="{{ asset($faqpage->button2_img) }}" class='lfmimage w-100'
                                        style="height: 20rem;">
                                    <div>
                                        <button type="button" onclick="removeImage('button2_img',0)"
                                            class='btn btn-sm btn-danger w-100'>Remove</button>
                                    </div>
                                </div>
                            @else
                                <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                            @endif
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="lfm-button2_img" data-input="button2_img" data-preview="holder-button2_img"
                                    class="btn btn-primary text-white lfm-img">
                                    <i class="bi bi-image-fill me-2"></i>Select File
                                </a>
                            </span>
                            <input id="button2_img" class="form-control" type="text" name="button2_img"
                                value="{{ isset($faqpage) ? $faqpage->button2_img : '' }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Link three image</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Image Size( 1000 x 535 )px</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                        <div id="holder-button3_img">
                            @if (!empty($faqpage->button3_img))
                                <div class='lfmimage-container button3_imglfmc0'>
                                    <img src="{{ asset($faqpage->button3_img) }}" class='lfmimage w-100'
                                        style="height: 20rem;">
                                    <div>
                                        <button type="button" onclick="removeImage('button3_img',0)"
                                            class='btn btn-sm btn-danger w-100'>Remove</button>
                                    </div>
                                </div>
                            @else
                                <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                            @endif
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="lfm-button3_img" data-input="button3_img" data-preview="holder-button3_img"
                                    class="btn btn-primary text-white lfm-img">
                                    <i class="bi bi-image-fill me-2"></i>Select File
                                </a>
                            </span>
                            <input id="button3_img" class="form-control" type="text" name="button3_img"
                                value="{{ isset($faqpage) ? $faqpage->button3_img : '' }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>


  
    </div>
</div>

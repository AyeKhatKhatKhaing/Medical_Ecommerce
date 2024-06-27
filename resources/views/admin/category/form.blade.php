<div class="row">
    <div class="row mb-5">
        <div class="col-md-8">
            <h3 class="card-title">
            @if($formMode == "edit") Edit Category @else Add New Category @endif
            </h3>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="float-end">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card"></i> Save</button>
                    <a href="{{ url('admin/category') }}" title="Back"><button type="button" class="btn btn-secondary btn-sm cancel"><i class="bi bi-x" aria-hidden="true"></i> Cancel</button></a>
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
                                        <div class="row">
                                                <div class="col-md-6">
                                            <div class="form-group mb-5{{ $errors->has('name_'.$attr) ? 'has-error' : ''}}">
                                                {!! Form::label('name_'.$attr, 'Name' . ' (' . $lngcode . ')', ['class' => 'form-label required']) !!}
                                                {!! Form::text('name_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                                {!! $errors->first('name_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                            <div class="form-group mb-5{{ $errors->has('content_'.$attr) ? 'has-error' : ''}}">
                                                {!! Form::label('content_'.$attr, 'Content' . ' (' . $lngcode . ')', ['class' => 'form-label required']) !!}
                                                {!! Form::textarea('content_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                                {!! $errors->first('content_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                            @if($attr == 'tc')
                                                <div class="form-check mb-5 mt-5 d-flex align-items-center">
                                                    <input class="form-check-input" type="checkbox" {{isset($category->is_translate)&&$category->is_translate==1?'checked':''}}  name="is_translate" id="auto_translate" value="1">
                                                    <label class="form-check-label ms-2" for="auto_translate">
                                                        Auto translate to chinese
                                                    </label>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <div class="accordion-item mb-5">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#group_section-12" aria-expanded="true"
                                                        aria-controls="group_section-12">
                                                        Images
                                                    </button>
                                                </h2>
                                                <div id="group_section-12" class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionExample">
            
                                                    <div class="accordion-body">
                                                        <div class="col-md-12 text-end" style="margin-left:-4%">
                                                            <button data-attr="{{ $attr }}"
                                                                data-lngcode="{{ $lngcode }}" type="button"
                                                                class="addNewDetails btn btn-success mb-3"
                                                                style="width:30px;height:30px; padding-top: 5px; padding-left: 10px;">+
                                                            </button>
                                                        </div>
                                                        @if (isset($category_images) && $category_images->count() > 0)
                                                            @foreach ($category_images as $key => $detail)
                                                                <div
                                                                    class="card mt-4 border new-details-input{{ $key }}">
                                                                    <div class="card-body" style="background-color: #f5f8fa;">
                                                                        <div class="row">
            
                                                                            <div class="col-md-12 text-end">
                                                                                <button data-attr="{{ $attr }}"
                                                                                    type="button"
                                                                                    class="removeDetails{{ $key }} btn btn-danger"
                                                                                    style="width:30px;height:30px; padding-top: 5px; padding-left: 10px;">-</button>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div
                                                                                    class="form-group mt-4 mb-5{{ $errors->has('title_' . $attr) ? 'has-error' : '' }}">
                                                                                    {!! Form::label('title_' . $attr, 'Title' . ' (' . $lngcode . ')', [
                                                                                        'class' => 'form-label required',
                                                                                    ]) !!}
                                                                                    @if ($attr == 'en')
                                                                                        {!! Form::text(
                                                                                            'title_en[]',
                                                                                            $detail->title_en,
                                                                                            'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                                                        ) !!}
                                                                                        <input type="text"
                                                                                            name="details_ids_en[]"
                                                                                            value="{{ $detail->id }}" hidden>
                                                                                    @elseif($attr == 'sc')
                                                                                        {!! Form::text(
                                                                                            'title_sc[]',
                                                                                            $detail->title_sc,
                                                                                            'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                                                        ) !!}
                                                                                    @elseif($attr == 'tc')
                                                                                        {!! Form::text(
                                                                                            'title_tc[]',
                                                                                            $detail->title_tc,
                                                                                            'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                                                        ) !!}
                                                                                    @endif
                                                                                    {!! $errors->first('title_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                                                </div>            
                                                                            </div> 
                                                                            </div>
                                                                            @if ($attr == 'en')
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <div class="card-body pt-0">
                                                                                            {{-- {!! Form::label('images','Images for desktop', ['class' => 'form-label']) !!} --}}
                                                                                        
                                                                                            <div class="list-title mb-3">
                                                                                                <label
                                                                                                    for="kt_ecommerce_add_product_store_template"
                                                                                                    class="form-label">
                                                                                                    <span style="color: #B5B5C3">Image
                                                                                                        for desktop(1200 x
                                                                                                        630)px</span>
                                                                                                </label>
                                                                                            </div>
                                                                                            <div class="panel-block">
                                                                                                <div class="form-group">
                                                                                                    <div
                                                                                                        id="holder-image-{{ $detail->id }}">
                                                                                                        @if (!empty($detail->image))
                                                                                                            <div
                                                                                                                class='lfmimage-container imagelfmc0'>
                                                                                                                <img src="{{ asset($detail->image) }}"
                                                                                                                    class='lfmimage w-100'
                                                                                                                    style="height: 20rem;">
                                                                                                                <div>
                                                                                                                    <button
                                                                                                                        type="button"
                                                                                                                        onclick="removeImage('image-{{ $detail->id }}',0)"
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
                                                                                                            <a id="lfm-image-{{ $detail->id }}"
                                                                                                                data-input="image-{{ $detail->id }}"
                                                                                                                data-preview="holder-image-{{ $detail->id }}"
                                                                                                                class="btn btn-primary btn-sm text-white lfm-img">
                                                                                                                <i
                                                                                                                    class="bi bi-image-fill me-2"></i>Select
                                                                                                                File
                                                                                                            </a>
                                                                                                        </span>
                                                                                                        <input
                                                                                                            id="image-{{ $detail->id }}"
                                                                                                            class="form-control"
                                                                                                            type="text"
                                                                                                            name="image[]"
                                                                                                            value="{{ isset($detail) ? $detail->image : '' }}">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-md-6">
                                                                                        <div class="card-body pt-0">
                                                                                            <div class="list-title mb-3">
                                                                                                 {{-- {!! Form::label('images','Images for mobile', ['class' => 'form-label']) !!} --}}
                                                                                                <label
                                                                                                    for="kt_ecommerce_add_product_store_template"
                                                                                                    class="form-label">
                                                                                                    <span style="color: #B5B5C3">Image for mobile (138 x 72)px</span>
                                                                                                </label>
                                                                                            </div>
                                                                                            <div class="panel-block">
                                                                                                <div class="form-group">
                                                                                                    <div
                                                                                                        id="holder-image-m-{{ $detail->id }}">
                                                                                                        @if (!empty($detail->imageM))
                                                                                                            <div
                                                                                                                class='lfmimage-container imagelfmc0'>
                                                                                                                <img src="{{ asset($detail->imageM) }}"
                                                                                                                    class='lfmimage w-100'
                                                                                                                    style="height: 20rem;">
                                                                                                                <div>
                                                                                                                    <button
                                                                                                                        type="button"
                                                                                                                        onclick="removeImage('image-m-{{ $detail->id }}',0)"
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
                                                                                                            <a id="lfm-image-m-{{ $detail->id }}"
                                                                                                                data-input="image-m-{{ $detail->id }}"
                                                                                                                data-preview="holder-image-m-{{ $detail->id }}"
                                                                                                                class="btn btn-primary btn-sm text-white lfm-img">
                                                                                                                <i
                                                                                                                    class="bi bi-image-fill me-2"></i>Select
                                                                                                                File
                                                                                                            </a>
                                                                                                        </span>
                                                                                                        <input
                                                                                                            id="image-m-{{ $detail->id }}"
                                                                                                            class="form-control"
                                                                                                            type="text"
                                                                                                            name="imageM[]"
                                                                                                            value="{{ isset($detail) ? $detail->imageM : '' }}">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                            @endif
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @else
                                                            <div class="card mt-5">
                                                                <div class="col-md-12">
                                                                    <div
                                                                        class="form-group mb-5{{ $errors->has('title_' . $attr) ? 'has-error' : '' }}">
                                                                        {!! Form::label('title_' . $attr, 'Title' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                                        {!! Form::text(
                                                                            'title_' . $attr . '[]',
                                                                            null,
                                                                            'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                                        ) !!}
                                                                        {!! $errors->first('title_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                                    </div>
                                                                    
                                                                </div>
                                                                @if ($attr == 'en')
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="card-body pt-0">
                                                                                {{-- {!! Form::label('images','Images for desktop', ['class' => 'form-label']) !!} --}}
                                                                                <div class="list-title mb-3">
                                                                                    <label
                                                                                        for="kt_ecommerce_add_product_store_template"
                                                                                        class="form-label">
                                                                                        <span style="color: #B5B5C3">Image for desktop(1200 x
                                                                                            630)px</span>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="panel-block">
                                                                                    <div class="form-group">
                                                                                        <div id="holder-image">
                                                                                            <img src="{{ asset('backend/media/blank-image.svg') }}"
                                                                                                class="img-thumbnail">
                                                                                        </div>
                                                                                        <div class="input-group mt-3">
                                                                                            <span class="input-group-btn">
                                                                                                <a id="lfm-image" data-input="image"
                                                                                                    data-preview="holder-image"
                                                                                                    class="btn btn-primary btn-sm text-white lfm-img">
                                                                                                    <i
                                                                                                        class="bi bi-image-fill me-2"></i>Select
                                                                                                    File
                                                                                                </a>
                                                                                            </span>
                                                                                            <input id="image" class="form-control"
                                                                                                type="text" name="image[]">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <div class="card-body pt-0">
                                                                                <div class="list-title mb-3">
                                                                                     {{-- {!! Form::label('images','Images for mobile', ['class' => 'form-label']) !!} --}}
                                                                                    <label
                                                                                        for="kt_ecommerce_add_product_store_template"
                                                                                        class="form-label">
                                                                                        <span style="color: #B5B5C3">Image for mobile (138 x 72)px</span>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="panel-block">
                                                                                    <div class="form-group">
                                                                                        <div id="holder-image-m">
                                                                                            <img src="{{ asset('backend/media/blank-image.svg') }}"
                                                                                                class="img-thumbnail">
                                                                                        </div>
                                                                                        <div class="input-group mt-3">
                                                                                            <span class="input-group-btn">
                                                                                                <a id="lfm-image-m"
                                                                                                    data-input="image-m"
                                                                                                    data-preview="holder-image-m"
                                                                                                    class="btn btn-primary btn-sm text-white lfm-img">
                                                                                                    <i
                                                                                                        class="bi bi-image-fill me-2"></i>Select
                                                                                                    File
                                                                                                </a>
                                                                                            </span>
                                                                                            <input
                                                                                                id="image-m"
                                                                                                class="form-control"
                                                                                                type="text"
                                                                                                name="imageM[]"
                                                                                            >
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
    
                                                                        {{-- <div class="col-md-6">
                                                                            <div class="card-body pt-0">
                                                                                
                                                                                <div class="list-title mb-3">
                                                                                    <label
                                                                                        for="kt_ecommerce_add_product_store_template"
                                                                                        class="form-label">
                                                                                        <span style="color: #B5B5C3">Image for mobile (1200 x
                                                                                            630)px</span>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="panel-block">
                                                                                    <div class="form-group">
                                                                                        <div id="holder-image-m">
                                                                                            <img src="{{ asset('backend/media/blank-image.svg') }}"
                                                                                                class="img-thumbnail">
                                                                                        </div>
                                                                                        <div class="input-group mt-3">
                                                                                            <span class="input-group-btn">
                                                                                                <a id="lfm-image-m" data-input="image-m"
                                                                                                    data-preview="holder-image-m"
                                                                                                    class="btn btn-primary btn-sm text-white lfm-img">
                                                                                                    <i
                                                                                                        class="bi bi-image-fill me-2"></i>Select
                                                                                                    File
                                                                                                </a>
                                                                                            </span>
                                                                                            <input id="imageM" class="form-control"
                                                                                                type="text" name="imageM[]">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div> --}}
                                                                    </div>
                                                                    
                                                                @endif
                                                            </div>
                                                        @endif
                                                        <input type="hidden" name="details">
                                                        <div id="{{ $attr }}_get-new-details"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="accordion-item mb-5">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#group_section-1" aria-expanded="true"
                                                        aria-controls="group_section-1">
                                                        Images for mobile
                                                    </button>
                                                </h2>
                                                <div id="group_section-1" class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionExample">
            
                                                    <div class="accordion-body">
                                                        <div class="col-md-12 text-end" style="margin-left:-4%">
                                                            <button data-attr="{{ $attr }}"
                                                                data-lngcode="{{ $lngcode }}" type="button"
                                                                class="addNewDetailsM btn btn-success mb-3"
                                                                style="width:30px;height:30px; padding-top: 5px; padding-left: 10px;">+
                                                            </button>
                                                        </div>
                                                        @if (isset($category_images_m) && $category_images_m->count() > 0)
                                                            @foreach ($category_images_m as $key => $detail)
                                                                <div
                                                                    class="card mt-4 border new-details-input_m{{ $key }}">
                                                                    <div class="card-body" style="background-color: #f5f8fa;">
                                                                        <div class="row">
            
                                                                            <div class="col-md-12 text-end">
                                                                                <button data-attr="{{ $attr }}"
                                                                                    type="button"
                                                                                    class="removeDetailsM{{ $key }} btn btn-danger"
                                                                                    style="width:30px;height:30px; padding-top: 5px; padding-left: 10px;">-</button>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div
                                                                                    class="form-group mt-4 mb-5{{ $errors->has('title_m_' . $attr) ? 'has-error' : '' }}">
                                                                                    {!! Form::label('title_m_' . $attr, 'Title' . ' (' . $lngcode . ')', [
                                                                                        'class' => 'form-label required',
                                                                                    ]) !!}
                                                                                    @if ($attr == 'en')
                                                                                        {!! Form::text(
                                                                                            'title_m_en[]',
                                                                                            $detail->title_m_en,
                                                                                            'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                                                        ) !!}
                                                                                        <input type="text"
                                                                                            name="details_ids_m_en[]"
                                                                                            value="{{ $detail->id }}" hidden>
                                                                                    @elseif($attr == 'sc')
                                                                                        {!! Form::text(
                                                                                            'title_m_sc[]',
                                                                                            $detail->title_m_sc,
                                                                                            'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                                                        ) !!}
                                                                                    @elseif($attr == 'tc')
                                                                                        {!! Form::text(
                                                                                            'title_m_tc[]',
                                                                                            $detail->title_m_tc,
                                                                                            'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                                                        ) !!}
                                                                                    @endif
                                                                                    {!! $errors->first('title_m_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                                                </div>            
                                                                            </div> 
                                                                            </div>
                                                                            @if ($attr == 'en')
                                                                                <div class="col-md-12">
                                                                                    <div class="card-header">
                                                                                        <h3 class="card-title">Images</h3>
                                                                                    </div>
                                                                                    <div class="card-body pt-0">
                                                                                        <div class="list-title mb-3">
                                                                                            <label
                                                                                                for="kt_ecommerce_add_product_store_template"
                                                                                                class="form-label">
                                                                                                <span style="color: #B5B5C3">Image
                                                                                                    Size(1200 x
                                                                                                    630)px</span>
                                                                                            </label>
                                                                                        </div>
                                                                                        <div class="panel-block">
                                                                                            <div class="form-group">
                                                                                                <div
                                                                                                    id="holder-image-m-{{ $detail->id }}">
                                                                                                    @if (!empty($detail->image_m))
                                                                                                        <div
                                                                                                            class='lfmimage-container imagelfmc0'>
                                                                                                            <img src="{{ asset($detail->image_m) }}"
                                                                                                                class='lfmimage w-100'
                                                                                                                style="height: 20rem;">
                                                                                                            <div>
                                                                                                                <button
                                                                                                                    type="button"
                                                                                                                    onclick="removeImage('image-m-{{ $detail->id }}',0)"
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
                                                                                                        <a id="lfm-image-m-{{ $detail->id }}"
                                                                                                            data-input="image-m-{{ $detail->id }}"
                                                                                                            data-preview="holder-image-m-{{ $detail->id }}"
                                                                                                            class="btn btn-primary btn-sm text-white lfm-img">
                                                                                                            <i
                                                                                                                class="bi bi-image-fill me-2"></i>Select
                                                                                                            File
                                                                                                        </a>
                                                                                                    </span>
                                                                                                    <input
                                                                                                        id="image-{{ $detail->id }}"
                                                                                                        class="form-control"
                                                                                                        type="text"
                                                                                                        name="imageM[]"
                                                                                                        value="{{ isset($detail) ? $detail->image_m : '' }}">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @endif
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @else
                                                            <div class="card mt-5">
                                                                <div class="col-md-12">
                                                                    <div
                                                                        class="form-group mb-5{{ $errors->has('title_m_' . $attr) ? 'has-error' : '' }}">
                                                                        {!! Form::label('title_m_' . $attr, 'Title for mobile' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                                        {!! Form::text(
                                                                            'title_m_' . $attr . '[]',
                                                                            null,
                                                                            'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                                        ) !!}
                                                                        {!! $errors->first('title_m_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                @if ($attr == 'en')
                                                                    <div class="col-md-12">
                                                                        <div class="card-body pt-0">
                                                                            <div class="list-title mb-3">
                                                                                <label
                                                                                    for="kt_ecommerce_add_product_store_template"
                                                                                    class="form-label">
                                                                                    <span style="color: #B5B5C3">Image Size(1200 x
                                                                                        630)px</span>
                                                                                </label>
                                                                            </div>
                                                                            <div class="panel-block">
                                                                                <div class="form-group">
                                                                                    <div id="holder-image-m">
                                                                                        <img src="{{ asset('backend/media/blank-image.svg') }}"
                                                                                            class="img-thumbnail">
                                                                                    </div>
                                                                                    <div class="input-group mt-3">
                                                                                        <span class="input-group-btn">
                                                                                            <a id="lfm-image" data-input="image-m"
                                                                                                data-preview="holder-image-m"
                                                                                                class="btn btn-primary btn-sm text-white lfm-img">
                                                                                                <i
                                                                                                    class="bi bi-image-fill me-2"></i>Select
                                                                                                File
                                                                                            </a>
                                                                                        </span>
                                                                                        <input id="imageM" class="form-control"
                                                                                            type="text" name="imageM[]">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                        
                                                        @endif
                                                        <input type="hidden" name="detailsM">
                                                        <div id="{{ $attr }}_get-new-details-m"></div>
            
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                                
                            
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="col-md-5"> --}}
        {{-- <div class="card">
            <div class="card-header">
                <h3 class="card-title">Image</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Image Size</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                       <div id="holder-img">
                            @if(!empty($category->img))
                                <div class='lfmimage-container imglfmc0'>
                                    <img src="{{ asset($category->img) }}" class='lfmimage w-100' style="height: 20rem;">
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
                            <input id="img" class="form-control" type="text" name="img" value="{{isset($category) ? $category->img : ''}}">
                       </div>
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- <div class="card">
            <div class="card-header">
                <h3 class="card-title">Images</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Size (1000px x 535px)</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group{{ $errors->has('img') ? 'has-error' : ''}}">
                        <ul class="dragGroup" id="holder3">
                              @if(isset($category->img))
                                @if( $category->img != null )
                                    @foreach ($category->img as $key => $img)
                                    <li class="draggable lfmimage-container w-100 thumbnail3lfmc{{$key}} draggableItem{{$key}}" draggable="true" class='lfmimage-container lfmcfeatureimage'>
                                        <input type="hidden" name="holder3[]" value="{{$img}}" id="img{{$key}}">
                                        <img src="{{ asset($img) }}" class='lfmimage w-100'>
                                        <div>
                                            <button type="button" onclick="removeGImage(this)" class='btn btn-sm btn-danger w-100'>Remove</button>
                                        </div>
                                    </li>
                                    @endforeach
                                @else
                                     <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail feature-img">
                                @endif
                            @else
                            <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail feature-img">
                            @endif
                        </ul>
                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="lfm-pro" data-input="thumbnail3" data-ptype="g" data-preview="holder3" class="lfm-pro lfm-img btn btn-primary text-white">
                                    <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                            <input id="thumbnail3" class="form-control" type="text" name="img[]" multiple>
                        </div>
                        {!! $errors->first('img', '<p class="help-block">:message</p>') !!}
                    </div>
                    <span>*Can upload multiple image</span>
                </div>
            </div>
        </div> --}}
        
    {{-- </div> --}}

</div>
@push('scripts')
<script>
    $(document).ready(() => {
        localStorage.removeItem('details');
        $('.addNewDetails').on('click', function() {
            var details = localStorage.getItem('details');

            details++;

            $('input[name="details"]').val(details);

            localStorage.setItem('details', details);
            var attr = $(this).data('attr');
            var lngcode = $(this).data('lngcode');
            $.ajax({
                type: "POST",
                url: "{{ route('admin.category.images') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    details: details,
                    attr: attr,
                    lngcode: lngcode,
                },
                datatype: 'json',
                success: function(json) {
                    console.log(json);
                    $('#en_get-new-details').append(json[0]);
                    $('#tc_get-new-details').append(json[1]);
                    $('#sc_get-new-details').append(json[2]);
                    tinymce.init(editor_config)
                }
            });
        })
    });

    var row = $('input[name="details"]').val();
    for (let i = 1; i < 100; i++) {
        $(document).on('click', `.removeDetails${i}`, function() {
            $(`.new-details-input${i}`).remove();
        });
    }
</script>

<script>
    $(document).ready(() => {
        localStorage.removeItem('details');
        $('.addNewDetailsM').on('click', function() {
            var details = localStorage.getItem('detailsM');

            details++;

            $('input[name="detailsM"]').val(details);

            localStorage.setItem('detailsM', details);
            var attr = $(this).data('attr');
            var lngcode = $(this).data('lngcode');
            $.ajax({
                type: "POST",
                url: "{{ route('admin.category.images.mobile') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    details: details,
                    attr: attr,
                    lngcode: lngcode,
                },
                datatype: 'json',
                success: function(json) {
                    console.log(json);
                    $('#en_get-new-details-m').append(json[0]);
                    $('#tc_get-new-details-m').append(json[1]);
                    $('#sc_get-new-details-m').append(json[2]);
                    tinymce.init(editor_config)
                }
            });
        })
    });

    var row = $('input[name="detailsM"]').val();
    for (let i = 1; i < 100; i++) {
        $(document).on('click', `.removeDetailsM${i}`, function() {
            $(`.new-details-input-m${i}`).remove();
        });
    }
</script>
@endpush




<div class="row">
    <div class="row mb-5">
        <div class="col-md-8">
            <h3 class="card-title">
                @if ($formMode == 'edit')
                    Edit About
                @else
                    Add New About
                @endif
            </h3>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="float-end">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card"></i> Save</button>
                    <a href="{{ url('admin/about-us') }}" title="Back"><button type="button"
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
                                            {{-- <div
                                                class="form-group mb-5{{ $errors->has('banner_description_' . $attr) ? 'has-error' : '' }}">
                                                {!! Form::label('banner_description_' . $attr, 'Banner description' . ' (' . $lngcode . ')', [
                                                    'class' => 'form-label',
                                                ]) !!}
                                                {!! Form::textarea(
                                                    'banner_description_' . $attr,
                                                    null,
                                                    'required' == 'required' ? ['class' => 'form-control editor'] : ['class' => 'form-control editor'],
                                                ) !!}
                                                {!! $errors->first('banner_description_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item mb-5">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#cooperation_section" aria-expanded="true"
                                            aria-controls="cooperation_section">
                                            Service Support
                                        </button>
                                    </h2>
                                    <div id="cooperation_section" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div
                                                class="form-group mb-5{{ $errors->has('service_title_' . $attr) ? 'has-error' : '' }}">
                                                {!! Form::label('service_title_' . $attr, 'Service support title' . ' (' . $lngcode . ')', [
                                                    'class' => 'form-label',
                                                ]) !!}
                                                {!! Form::text(
                                                    'service_title_' . $attr,
                                                    null,
                                                    'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                ) !!}
                                                {!! $errors->first('service_title_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                            <div class="row">
                                                <div class="">
                                                    <div
                                                        class="form-group mb-5{{ $errors->has('service_subtitle_' . $attr) ? 'has-error' : '' }}">
                                                        {!! Form::label('service_subtitle_' . $attr, 'Service support subtitle' . ' (' . $lngcode . ')', [
                                                            'class' => 'form-label',
                                                        ]) !!}
                                                        {!! Form::text(
                                                            'service_subtitle_' . $attr,
                                                            null,
                                                            'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                        ) !!}
                                                        {!! $errors->first('service_subtitle_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="">
                                                    <div
                                                        class="form-group mb-5{{ $errors->has('service_link_text_' . $attr) ? 'has-error' : '' }}">
                                                        {!! Form::label('service_link_text_' . $attr, 'Service support text' . ' (' . $lngcode . ')', [
                                                            'class' => 'form-label',
                                                        ]) !!}
                                                        {!! Form::text(
                                                            'service_link_text_' . $attr,
                                                            null,
                                                            'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                        ) !!}
                                                        {!! $errors->first('service_link_text_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                    </div>
                                                </div>

                                            </div>

                                            <div
                                                class="form-group mb-5{{ $errors->has('service_description_' . $attr) ? 'has-error' : '' }}">
                                                {!! Form::label('service_description_' . $attr, 'Service support description' . ' (' . $lngcode . ')', [
                                                    'class' => 'form-label',
                                                ]) !!}
                                                {!! Form::textarea(
                                                    'service_description_' . $attr,
                                                    null,
                                                    'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                ) !!}
                                                {!! $errors->first('service_description_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="row mt-4">
                                    <div class="col-md-12">
                                        <div class="card-header">
                                            <h3 class="card-title">Awesome booking</h3>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="row mt-5">
                                    <div>
                                        <div
                                            class="form-group mb-5{{ $errors->has('awesome_booking_title_' . $attr) ? 'has-error' : '' }}">
                                            {!! Form::label('awesome_booking_title_' . $attr, 'Awesome booking title' . ' (' . $lngcode . ')', [
                                                'class' => 'form-label',
                                            ]) !!}
                                            {!! Form::text(
                                                'awesome_booking_title_' . $attr,
                                                null,
                                                'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                            ) !!}
                                            {!! $errors->first('awesome_booking_title_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                        </div>

                                    </div>
                                </div>

                                <div class="accordion-item mb-5">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#group_section" aria-expanded="true"
                                            aria-controls="group_section">
                                            Awesome booking section
                                        </button>
                                    </h2>
                                    <div id="group_section" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">

                                        <div class="accordion-body">
                                            <div class="col-md-12 text-end" style="margin-left:-4%">
                                                <button data-attr="{{ $attr }}"
                                                    data-lngcode="{{ $lngcode }}" type="button"
                                                    class="addNewAwesomeBooking btn btn-success mb-3"
                                                    style="width:30px;height:30px; padding-top: 5px; padding-left: 10px;">+
                                                </button>
                                            </div>
                                            @if (isset($best_price_detail) && $best_price_detail->count() > 0)
                                                @foreach ($best_price_detail as $key => $detail)
                                                    
                                                    <div
                                                        class="card mt-4 border new-awesome_booking-input{{ $key }}">
                                                        <div class="card-body" style="background-color: #f5f8fa;">
                                                            <div class="row">

                                                                <div class="col-md-12 text-end">
                                                                    <button data-attr="{{ $attr }}"
                                                                        type="button"
                                                                        class="removeAwesomeBooking{{ $key }} btn btn-danger"
                                                                        style="width:30px;height:30px; padding-top: 5px; padding-left: 10px;">-</button>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div
                                                                        class="form-group mt-4 mb-5{{ $errors->has('best_price_title_' . $attr) ? 'has-error' : '' }}">
                                                                        {!! Form::label('best_price_title_' . $attr, 'Title' . ' (' . $lngcode . ')', [
                                                                            'class' => 'form-label required',
                                                                        ]) !!}
                                                                        @if ($attr == 'en')
                                                                            {!! Form::text(
                                                                                'best_price_title_en[]',
                                                                                $detail->best_price_title_en,
                                                                                'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                                            ) !!}
                                                                            <input type="text"
                                                                                name="best_price_ids_en[]"
                                                                                value="{{ $detail->id }}" hidden>
                                                                        @elseif($attr == 'sc')
                                                                            {!! Form::text(
                                                                                'best_price_title_sc[]',
                                                                                $detail->best_price_title_sc,
                                                                                'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                                            ) !!}
                                                                        @elseif($attr == 'tc')
                                                                            {!! Form::text(
                                                                                'best_price_title_tc[]',
                                                                                $detail->best_price_title_tc,
                                                                                'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                                            ) !!}
                                                                        @endif
                                                                        {!! $errors->first('best_price_title_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                                    </div>


                                                                    <div
                                                                    class="form-group mt-4 mb-5{{ $errors->has('best_price_text_' . $attr) ? 'has-error' : '' }}">
                                                                    {!! Form::label('best_price_text_' . $attr, 'Text' . ' (' . $lngcode . ')', [
                                                                        'class' => 'form-label required',
                                                                    ]) !!}
                                                                    @if ($attr == 'en')
                                                                        {!! Form::textarea(
                                                                            'best_price_text_en[]',
                                                                            $detail->best_price_text_en,
                                                                            'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                                        ) !!}
                                                                    @elseif($attr == 'sc')
                                                                        {!! Form::textarea(
                                                                            'best_price_text_sc[]',
                                                                            $detail->best_price_text_sc,
                                                                            'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                                        ) !!}
                                                                    @elseif($attr == 'tc')
                                                                        {!! Form::textarea(
                                                                            'best_price_text_tc[]',
                                                                            $detail->best_price_text_tc,
                                                                            'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                                        ) !!}
                                                                    @endif
                                                                    {!! $errors->first('best_price_text_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
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
                                                                                <div id="holder-best_price_img-{{ $detail->id }}">
                                                                                    @if (!empty($detail->best_price_img))
                                                                                        <div class='lfmimage-container best_price_imglfmc0'>
                                                                                            <img src="{{ asset($detail->best_price_img) }}"
                                                                                                class='lfmimage w-100' style="height: 20rem;">
                                                                                            <div>
                                                                                                <button type="button"
                                                                                                    onclick="removeImage('best_price_img-{{ $detail->id }}',0)"
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
                                                                                        <a id="lfm-best_price_img-{{ $detail->id }}" data-input="best_price_img-{{ $detail->id }}"
                                                                                            data-preview="holder-best_price_img-{{ $detail->id }}"
                                                                                            class="btn btn-primary btn-sm text-white lfm-img">
                                                                                            <i class="bi bi-image-fill me-2"></i>Select
                                                                                            File
                                                                                        </a>
                                                                                    </span>
                                                                                    <input id="best_price_img-{{ $detail->id }}" class="form-control"
                                                                                        type="text" name="best_price_img[]"
                                                                                        value="{{ isset($detail) ? $detail->best_price_img : '' }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            </div>

                                                            <div
                                                                class="form-group mt-4 mb-5{{ $errors->has('best_price_description' . $attr) ? 'has-error' : '' }}">
                                                                {!! Form::label('best_price_description_' . $attr, 'Description' . ' (' . $lngcode . ')', [
                                                                    'class' => 'form-label required',
                                                                ]) !!}
                                                                @if ($attr == 'en')
                                                                    {!! Form::textarea(
                                                                        'best_price_description_en[]',
                                                                        $detail->best_price_description_en,
                                                                        'required' == 'required' ? ['class' => 'form-control editor'] : ['class' => 'form-control editor'],
                                                                    ) !!}
                                                                @elseif($attr == 'sc')
                                                                    {!! Form::textarea(
                                                                        'best_price_description_sc[]',
                                                                        $detail->best_price_description_sc,
                                                                        'required' == 'required' ? ['class' => 'form-control editor'] : ['class' => 'form-control editor'],
                                                                    ) !!}
                                                                @elseif($attr == 'tc')
                                                                    {!! Form::textarea(
                                                                        'best_price_description_tc[]',
                                                                        $detail->best_price_description_tc,
                                                                        'required' == 'required' ? ['class' => 'form-control editor'] : ['class' => 'form-control editor'],
                                                                    ) !!}
                                                                @endif
                                                                {!! $errors->first('best_price_description' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="row mt-5">
                                                    <div
                                                        class="col-md-6">
                                                        <div
                                                            class="form-group mb-5{{ $errors->has('best_price_title_' . $attr) ? 'has-error' : '' }}">
                                                            {!! Form::label('best_price_title_' . $attr, 'Title' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                            {!! Form::text(
                                                                'best_price_title_' . $attr . '[]',
                                                                null,
                                                                'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                            ) !!}
                                                            {!! $errors->first('best_price_title_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                        </div>
                                                        <div
                                                            class="form-group mb-5{{ $errors->has('best_price_text_' . $attr) ? 'has-error' : '' }}">
                                                            {!! Form::label('best_price_text_' . $attr, 'Text' . ' (' . $lngcode . ')', [
                                                                'class' => 'form-label',
                                                            ]) !!}
                                                            {!! Form::textarea(
                                                                'best_price_text_' . $attr . '[]',
                                                                null,
                                                                'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                            ) !!}
                                                            {!! $errors->first('best_price_text_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                        </div>
                                                    </div>
                                                    {{-- @if ($attr == 'en') --}}
                                                        <div class="col-md-6">
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
                                                                        <div id="holder-best_price_img">
                                                                                <img src="{{ asset('backend/media/blank-image.svg') }}"
                                                                                    class="img-thumbnail">
                                                                        </div>
                                                                        <div class="input-group mt-3">
                                                                            <span class="input-group-btn">
                                                                                <a id="lfm-best_price_img"
                                                                                    data-input="best_price_img"
                                                                                    data-preview="holder-best_price_img"
                                                                                    class="btn btn-primary btn-sm text-white lfm-img">
                                                                                    <i
                                                                                        class="bi bi-image-fill me-2"></i>Select
                                                                                    File
                                                                                </a>
                                                                            </span>
                                                                            <input id="best_price_img"
                                                                                class="form-control" type="text"
                                                                                name="best_price_img[]">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    {{-- @endif --}}
                                                    <div
                                                        class="form-group mb-5{{ $errors->has('best_price_description_' . $attr) ? 'has-error' : '' }}">
                                                        {!! Form::label('best_price_description_' . $attr, 'Description' . ' (' . $lngcode . ')', [
                                                            'class' => 'form-label',
                                                        ]) !!}
                                                        {!! Form::textarea(
                                                            'best_price_description_' . $attr . '[]',
                                                            null,
                                                            'required' == 'required' ? ['class' => 'form-control editor'] : ['class' => 'form-control editor'],
                                                        ) !!}
                                                        {!! $errors->first('best_price_description_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                    </div>
                                                </div>
                                            @endif
                                            <div id="{{ $attr }}_get-new-awesome_booking"></div>

                                        </div>
                                    </div>
                                </div>
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
                                                            @if (!empty($about->meta_img))
                                                                <div class='lfmimage-container meta-imagelfmc0'>
                                                                    <img src="{{ asset($about->meta_img) }}"
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
                                                                value="{{ isset($about) ? $about->meta_img : '' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                @if ($attr == 'tc')
                                    <div class="form-check mb-5 mt-5 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox"
                                            {{ isset($about->is_translate) && $about->is_translate == 1 ? 'checked' : '' }}
                                            name="is_translate" id="auto_translate" value="1">
                                        <label class="form-check-label ms-2" for="auto_translate">
                                            Auto translate to chinese
                                        </label>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                        <input type="hidden" name="awesome_booking_row">
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
                        <div id="holder-banner-image">
                            @if (!empty($best_price->banner_img))
                                <div class='lfmimage-container banner_imglfmc0'>
                                    <img src="{{ asset($best_price->banner_img) }}" class='lfmimage w-100'
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
                                <a id="lfm-banner_img" data-input="banner_img" data-preview="holder-banner-image"
                                    class="btn btn-primary text-white lfm-img">
                                    <i class="bi bi-image-fill me-2"></i>Select File
                                </a>
                            </span>
                            <input id="banner_img" class="form-control" type="text" name="banner_img"
                                value="{{ isset($best_price) ? $best_price->banner_img : '' }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Service support image</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Image Size( 1000 x 535 )px</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                        <div id="holder-service-image">
                            @if (!empty($best_price->service_img))
                                <div class='lfmimage-container service_imglfmc0'>
                                    <img src="{{ asset($best_price->service_img) }}" class='lfmimage w-100'
                                        style="height: 20rem;">
                                    <div>
                                        <button type="button" onclick="removeImage('service_img',0)"
                                            class='btn btn-sm btn-danger w-100'>Remove</button>
                                    </div>
                                </div>
                            @else
                                <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                            @endif
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="lfm-service_img" data-input="service_img" data-preview="holder-service-image"
                                    class="btn btn-primary text-white lfm-img">
                                    <i class="bi bi-image-fill me-2"></i>Select File
                                </a>
                            </span>
                            <input id="service_img" class="form-control" type="text" name="service_img"
                                value="{{ isset($best_price) ? $best_price->service_img : '' }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(document).ready(() => {
            localStorage.removeItem('awesome_booking_row');
            $('.addNewAwesomeBooking').on('click', function() {
                var awesome_booking_row = localStorage.getItem('awesome_booking_row');

                awesome_booking_row++;

                $('input[name="awesome_booking_row"]').val(awesome_booking_row);

                localStorage.setItem('awesome_booking_row', awesome_booking_row);
                var attr = $(this).data('attr');
                var lngcode = $(this).data('lngcode');
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.best-price-detail') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        awesome_booking_row: awesome_booking_row,
                        attr: attr,
                        lngcode: lngcode,
                    },
                    datatype: 'json',
                    success: function(json) {
                        console.log(json);
                        $('#en_get-new-awesome_booking').append(json[0]);
                        $('#tc_get-new-awesome_booking').append(json[1]);
                        $('#sc_get-new-awesome_booking').append(json[2]);
                        tinymce.init(editor_config)
                    }
                });
            })
        });

        var row = $('input[name="awesome_booking_row"]').val();
        for (let i = 1; i < 100; i++) {
            $(document).on('click', `.removeAwesomeBooking${i}`, function() {
                $(`.new-awesome_booking-input${i}`).remove();
            });
        }
    </script>
@endpush

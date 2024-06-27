<div class="row">
    <div class="row mb-5">
        <div class="col-md-8">
            <h3 class="card-title">
                @if ($formMode == 'edit')
                    Edit Partnership
                @else
                    Add New Partnership
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
                                            <div
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
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item mb-5">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#cooperation_section" aria-expanded="true"
                                            aria-controls="cooperation_section">
                                            Benefit
                                        </button>
                                    </h2>
                                    <div id="cooperation_section" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div
                                                class="form-group mb-5{{ $errors->has('benefit_title_' . $attr) ? 'has-error' : '' }}">
                                                {!! Form::label('benefit_title_' . $attr, 'Benefit title' . ' (' . $lngcode . ')', [
                                                    'class' => 'form-label required',
                                                ]) !!}
                                                {!! Form::text(
                                                    'benefit_title_' . $attr,
                                                    null,
                                                    'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                ) !!}
                                                {!! $errors->first('benefit_title_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div>

                                            <div
                                                class="form-group mb-5{{ $errors->has('benefit_text1_' . $attr) ? 'has-error' : '' }}">
                                                {!! Form::label('benefit_text1_' . $attr, 'Benefit One' . ' (' . $lngcode . ')', [
                                                    'class' => 'form-label',
                                                ]) !!}
                                                {!! Form::text(
                                                    'benefit_text1_' . $attr,
                                                    null,
                                                    'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                ) !!}
                                                {!! $errors->first('benefit_text1_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div>

                                            <div class="row">
                                                <div class="">
                                                    <div
                                                        class="form-group mb-5{{ $errors->has('benefit_text2_' . $attr) ? 'has-error' : '' }}">
                                                        {!! Form::label('benefit_text2_' . $attr, 'Benefit Two' . ' (' . $lngcode . ')', [
                                                            'class' => 'form-label',
                                                        ]) !!}
                                                        {!! Form::text(
                                                            'benefit_text2_' . $attr,
                                                            null,
                                                            'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                        ) !!}
                                                        {!! $errors->first('benefit_text2_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="">
                                                    <div
                                                        class="form-group mb-5{{ $errors->has('benefit_text3_' . $attr) ? 'has-error' : '' }}">
                                                        {!! Form::label('benefit_text3_' . $attr, 'Benefit Three' . ' (' . $lngcode . ')', [
                                                            'class' => 'form-label',
                                                        ]) !!}
                                                        {!! Form::text(
                                                            'benefit_text3_' . $attr,
                                                            null,
                                                            'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                        ) !!}
                                                        {!! $errors->first('benefit_text3_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item mb-5">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#group_section" aria-expanded="true"
                                            aria-controls="group_section">
                                            Mediq Help
                                        </button>
                                    </h2>
                                    <div id="group_section" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">

                                        <div class="accordion-body">


                                            <div class="row mt-5">
                                                <div
                                                    class="@if ($attr == 'en') col-md-6 @else col-md-12 @endif">
                                                    <div
                                                        class="form-group mb-5{{ $errors->has('help_title_' . $attr) ? 'has-error' : '' }}">
                                                        {!! Form::label('help_title_' . $attr, 'Help title' . ' (' . $lngcode . ')', [
                                                            'class' => 'form-label',
                                                        ]) !!}
                                                        {!! Form::text(
                                                            'help_title_' . $attr,
                                                            null,
                                                            'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                        ) !!}
                                                        {!! $errors->first('help_title_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                    </div>
                                                </div>
                                                @if ($attr == 'en')
                                                    <div class="col-md-6">
                                                        <div
                                                            class="form-group mb-5{{ $errors->has('percent') ? 'has-error' : '' }}">
                                                            {!! Form::label('percent', 'Percent', [
                                                                'class' => 'form-label',
                                                            ]) !!}
                                                            {!! Form::text(
                                                                'percent',
                                                                null,
                                                                'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                            ) !!}
                                                            {!! $errors->first('percent', '<p class="help-block text-danger">:message</p>') !!}
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>

                                            <div
                                                class="form-group mb-5{{ $errors->has('percent_text_' . $attr) ? 'has-error' : '' }}">
                                                {!! Form::label('percent_text_' . $attr, 'Percent text' . ' (' . $lngcode . ')', [
                                                    'class' => 'form-label',
                                                ]) !!}
                                                {!! Form::text(
                                                    'percent_text_' . $attr,
                                                    null,
                                                    'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                ) !!}
                                                {!! $errors->first('percent_text_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div>

                                            <div class="col-md-12 text-end" style="margin-left:-4%">
                                                <button data-attr="{{ $attr }}"
                                                    data-lngcode="{{ $lngcode }}" type="button"
                                                    class="addNewAwesomeBooking btn btn-success mb-3"
                                                    style="width:30px;height:30px; padding-top: 5px; padding-left: 10px;">+
                                                </button>
                                            </div>
                                            @if (isset($partnership_help) && $partnership_help->count() > 0)
                                                @foreach ($partnership_help as $key => $help)
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
                                                                <div class="col-md-12">
                                                                    <div
                                                                        class="form-group mt-4 mb-5{{ $errors->has('help_subtitle_' . $attr) ? 'has-error' : '' }}">
                                                                        {!! Form::label('help_subtitle_' . $attr, 'Title' . ' (' . $lngcode . ')', [
                                                                            'class' => 'form-label required',
                                                                        ]) !!}
                                                                        @if ($attr == 'en')
                                                                            {!! Form::text(
                                                                                'help_subtitle_en[]',
                                                                                $help->help_subtitle_en,
                                                                                'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                                            ) !!}
                                                                            <input type="text" name="help_ids_en[]"
                                                                                value="{{ $help->id }}" hidden>
                                                                        @elseif($attr == 'sc')
                                                                            {!! Form::text(
                                                                                'help_subtitle_sc[]',
                                                                                $help->help_subtitle_sc,
                                                                                'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                                            ) !!}
                                                                        @elseif($attr == 'tc')
                                                                            {!! Form::text(
                                                                                'help_subtitle_tc[]',
                                                                                $help->help_subtitle_tc,
                                                                                'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                                            ) !!}
                                                                        @endif
                                                                        {!! $errors->first('help_subtitle_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                                    </div>

                                                                </div>

                                                            </div>

                                                            <div
                                                                class="form-group mt-4 mb-5{{ $errors->has('help_description' . $attr) ? 'has-error' : '' }}">
                                                                {!! Form::label('help_description_' . $attr, 'Description' . ' (' . $lngcode . ')', [
                                                                    'class' => 'form-label required',
                                                                ]) !!}
                                                                @if ($attr == 'en')
                                                                    {!! Form::textarea(
                                                                        'help_description_en[]',
                                                                        $help->help_description_en,
                                                                        'required' == 'required' ? ['class' => 'form-control editor'] : ['class' => 'form-control editor'],
                                                                    ) !!}
                                                                @elseif($attr == 'sc')
                                                                    {!! Form::textarea(
                                                                        'help_description_sc[]',
                                                                        $help->help_description_sc,
                                                                        'required' == 'required' ? ['class' => 'form-control editor'] : ['class' => 'form-control editor'],
                                                                    ) !!}
                                                                @elseif($attr == 'tc')
                                                                    {!! Form::textarea(
                                                                        'help_description_tc[]',
                                                                        $help->help_description_tc,
                                                                        'required' == 'required' ? ['class' => 'form-control editor'] : ['class' => 'form-control editor'],
                                                                    ) !!}
                                                                @endif
                                                                {!! $errors->first('help_description' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="row mt-5">
                                                    <div class="col-md-12">
                                                        <div
                                                            class="form-group mb-5{{ $errors->has('help_subtitle_' . $attr) ? 'has-error' : '' }}">
                                                            {!! Form::label('help_subtitle_' . $attr, 'Title' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                            {!! Form::text(
                                                                'help_subtitle_' . $attr . '[]',
                                                                null,
                                                                'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                            ) !!}
                                                            {!! $errors->first('help_subtitle_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                        </div>

                                                    </div>

                                                    <div
                                                        class="form-group mb-5{{ $errors->has('help_description_' . $attr) ? 'has-error' : '' }}">
                                                        {!! Form::label('help_description_' . $attr, 'Description' . ' (' . $lngcode . ')', [
                                                            'class' => 'form-label',
                                                        ]) !!}
                                                        {!! Form::textarea(
                                                            'help_description_' . $attr . '[]',
                                                            null,
                                                            'required' == 'required' ? ['class' => 'form-control editor'] : ['class' => 'form-control editor'],
                                                        ) !!}
                                                        {!! $errors->first('help_description_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                    </div>
                                                </div>
                                            @endif
                                            <div id="{{ $attr }}_get-new-awesome_booking"></div>

                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item mb-5">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#group_section-12" aria-expanded="true"
                                            aria-controls="group_section-12">
                                            Details
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
                                            @if (isset($partnership_detail) && $partnership_detail->count() > 0)
                                                @foreach ($partnership_detail as $key => $detail)
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
                                                                <div class="col-md-6">
                                                                    <div
                                                                        class="form-group mt-4 mb-5{{ $errors->has('title_' . $attr) ? 'has-error' : '' }}">
                                                                        {!! Form::label('title_' . $attr, 'Title with color' . ' (' . $lngcode . ')', [
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


                                                                    <div
                                                                        class="form-group mt-4 mb-5{{ $errors->has('title1_' . $attr) ? 'has-error' : '' }}">
                                                                        {!! Form::label('title1_' . $attr, 'Title without color' . ' (' . $lngcode . ')', [
                                                                            'class' => 'form-label required',
                                                                        ]) !!}
                                                                        @if ($attr == 'en')
                                                                            {!! Form::text(
                                                                                'title1_en[]',
                                                                                $detail->title1_en,
                                                                                'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                                            ) !!}
                                                                        @elseif($attr == 'sc')
                                                                            {!! Form::text(
                                                                                'title1_sc[]',
                                                                                $detail->title1_sc,
                                                                                'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                                            ) !!}
                                                                        @elseif($attr == 'tc')
                                                                            {!! Form::text(
                                                                                'title1_tc[]',
                                                                                $detail->title1_tc,
                                                                                'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                                            ) !!}
                                                                        @endif
                                                                        {!! $errors->first('title1_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                                    </div>

                                                                    <div
                                                                        class="form-group mt-4 mb-5{{ $errors->has('link_text_' . $attr) ? 'has-error' : '' }}">
                                                                        {!! Form::label('link_text_' . $attr, 'Text' . ' (' . $lngcode . ')', [
                                                                            'class' => 'form-label required',
                                                                        ]) !!}
                                                                        @if ($attr == 'en')
                                                                            {!! Form::text(
                                                                                'link_text_en[]',
                                                                                $detail->link_text_en,
                                                                                'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                                            ) !!}
                                                                        @elseif($attr == 'sc')
                                                                            {!! Form::text(
                                                                                'link_text_sc[]',
                                                                                $detail->link_text_sc,
                                                                                'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                                            ) !!}
                                                                        @elseif($attr == 'tc')
                                                                            {!! Form::text(
                                                                                'link_text_tc[]',
                                                                                $detail->link_text_tc,
                                                                                'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                                            ) !!}
                                                                        @endif
                                                                        {!! $errors->first('link_text_' . $attr, '<p class="help-block text-danger">:message</p>') !!}

                                                                    </div>

                                                                    <div
                                                                        class="form-group mt-4 mb-5{{ $errors->has('link_' . $attr) ? 'has-error' : '' }}">
                                                                        {!! Form::label('link_' . $attr, 'Link' . ' (' . $lngcode . ')', [
                                                                            'class' => 'form-label required',
                                                                        ]) !!}
                                                                        @if ($attr == 'en')
                                                                            {!! Form::text(
                                                                                'link_en[]',
                                                                                $detail->link_en,
                                                                                'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                                            ) !!}
                                                                        @elseif($attr == 'sc')
                                                                            {!! Form::text(
                                                                                'link_sc[]',
                                                                                $detail->link_sc,
                                                                                'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                                            ) !!}
                                                                        @elseif($attr == 'tc')
                                                                            {!! Form::text(
                                                                                'link_tc[]',
                                                                                $detail->link_tc,
                                                                                'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                                            ) !!}
                                                                        @endif
                                                                        {!! $errors->first('link_' . $attr, '<p class="help-block text-danger">:message</p>') !!}

                                                                    </div>


                                                                </div>
                                                                @if ($attr == 'en')
                                                                    <div class="col-md-6">
                                                                        <div class="card-header">
                                                                            <h3 class="card-title">Detail Photo</h3>
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
                                                                @endif
                                                            </div>

                                                            <div
                                                                class="form-group mt-4 mb-5{{ $errors->has('description' . $attr) ? 'has-error' : '' }}">
                                                                {!! Form::label('description_' . $attr, 'Description' . ' (' . $lngcode . ')', [
                                                                    'class' => 'form-label required',
                                                                ]) !!}
                                                                @if ($attr == 'en')
                                                                    {!! Form::textarea(
                                                                        'description_en[]',
                                                                        $detail->description_en,
                                                                        'required' == 'required' ? ['class' => 'form-control editor'] : ['class' => 'form-control editor'],
                                                                    ) !!}
                                                                @elseif($attr == 'sc')
                                                                    {!! Form::textarea(
                                                                        'description_sc[]',
                                                                        $detail->description_sc,
                                                                        'required' == 'required' ? ['class' => 'form-control editor'] : ['class' => 'form-control editor'],
                                                                    ) !!}
                                                                @elseif($attr == 'tc')
                                                                    {!! Form::textarea(
                                                                        'description_tc[]',
                                                                        $detail->description_tc,
                                                                        'required' == 'required' ? ['class' => 'form-control editor'] : ['class' => 'form-control editor'],
                                                                    ) !!}
                                                                @endif
                                                                {!! $errors->first('description' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="row mt-5">
                                                    <div class="col-md-6">
                                                        <div
                                                            class="form-group mb-5{{ $errors->has('title_' . $attr) ? 'has-error' : '' }}">
                                                            {!! Form::label('title_' . $attr, 'Title (with color)' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                            {!! Form::text(
                                                                'title_' . $attr . '[]',
                                                                null,
                                                                'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                            ) !!}
                                                            {!! $errors->first('title_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                        </div>

                                                        <div
                                                            class="form-group mb-5{{ $errors->has('title1_' . $attr) ? 'has-error' : '' }}">
                                                            {!! Form::label('title1_' . $attr, 'Title (without color)' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                            {!! Form::text(
                                                                'title1_' . $attr . '[]',
                                                                null,
                                                                'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                            ) !!}
                                                            {!! $errors->first('title1_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                        </div>


                                                        <div
                                                            class="form-group mb-5{{ $errors->has('link_text_' . $attr) ? 'has-error' : '' }}">
                                                            {!! Form::label('link_text_' . $attr, 'Link text' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                            {!! Form::text(
                                                                'link_text_' . $attr . '[]',
                                                                null,
                                                                'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                            ) !!}
                                                            {!! $errors->first('link_text_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                        </div>

                                                        <div
                                                            class="form-group mb-5{{ $errors->has('link_' . $attr) ? 'has-error' : '' }}">
                                                            {!! Form::label('link_' . $attr, 'Link' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                            {!! Form::text(
                                                                'link_' . $attr . '[]',
                                                                null,
                                                                'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                            ) !!}
                                                            {!! $errors->first('link_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                        </div>

                                                    </div>
                                                    @if ($attr == 'en')
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
                                                    @endif
                                                    <div
                                                        class="form-group mb-5{{ $errors->has('description_' . $attr) ? 'has-error' : '' }}">
                                                        {!! Form::label('description_' . $attr, 'Description' . ' (' . $lngcode . ')', [
                                                            'class' => 'form-label',
                                                        ]) !!}
                                                        {!! Form::textarea(
                                                            'description_' . $attr . '[]',
                                                            null,
                                                            'required' == 'required' ? ['class' => 'form-control editor'] : ['class' => 'form-control editor'],
                                                        ) !!}
                                                        {!! $errors->first('description_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                    </div>
                                                </div>
                                            @endif
                                            <div id="{{ $attr }}_get-new-details"></div>

                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item mb-5">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#steps_section" aria-expanded="true"
                                            aria-controls="steps_section">
                                            Three Steps
                                        </button>
                                    </h2>
                                    <div id="steps_section" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div
                                                class="form-group mb-5{{ $errors->has('three_step_title_' . $attr) ? 'has-error' : '' }}">
                                                {!! Form::label('three_step_title_' . $attr, 'Three steps title' . ' (' . $lngcode . ')', [
                                                    'class' => 'form-label required',
                                                ]) !!}
                                                {!! Form::text(
                                                    'three_step_title_' . $attr,
                                                    null,
                                                    'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                ) !!}
                                                {!! $errors->first('three_step_title_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                            <div
                                                class="form-group mb-5{{ $errors->has('three_step_text_' . $attr) ? 'has-error' : '' }}">
                                                {!! Form::label('three_step_text_' . $attr, 'Three steps text' . ' (' . $lngcode . ')', [
                                                    'class' => 'form-label required',
                                                ]) !!}
                                                {!! Form::text(
                                                    'three_step_text_' . $attr,
                                                    null,
                                                    'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                ) !!}
                                                {!! $errors->first('three_step_text_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div>

                                            <div
                                                class="separator  separator-dotted separator-content border-dark my-15">
                                                <span class="w-175px fw-bold">Step One</span>
                                            </div>
                                            <div class="row mt-5">
                                                <div
                                                    class="@if ($attr == 'en') col-md-6 @else col-md-12 @endif">
                                                    <div
                                                        class="form-group mb-5{{ $errors->has('step1_title_' . $attr) ? 'has-error' : '' }}">
                                                        {!! Form::label('step1_title_' . $attr, 'Step one title' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                        {!! Form::text(
                                                            'step1_title_' . $attr,
                                                            null,
                                                            'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                        ) !!}
                                                        {!! $errors->first('step1_title_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                    </div>
                                                    <div
                                                        class="form-group mb-5{{ $errors->has('step1_description_' . $attr) ? 'has-error' : '' }}">
                                                        {!! Form::label('step1_description_' . $attr, 'Step one description' . ' (' . $lngcode . ')', [
                                                            'class' => 'form-label',
                                                        ]) !!}
                                                        {!! Form::textarea(
                                                            'step1_description_' . $attr,
                                                            null,
                                                            'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                        ) !!}
                                                        {!! $errors->first('step1_description_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                    </div>
                                                </div>
                                                @if ($attr == 'en')
                                                    <div class="col-md-6">
                                                        {{-- <div class="card-body pt-0">
                                                            <div class="list-title mb-3">
                                                                <label for="kt_ecommerce_add_product_store_template"
                                                                    class="form-label">
                                                                    <span style="color: #B5B5C3">Image Size(1000 x
                                                                        535)px</span>
                                                                </label>
                                                            </div>
                                                            <div class="panel-block">
                                                                <div class="form-group">
                                                                    <div id="holder-step1_img">
                                                                        @if (!empty($partnership->step1_img))
                                                                            <div
                                                                                class='lfmimage-container step1_imglfmc0'>
                                                                                <img src="{{ asset($partnership->step1_img) }}"
                                                                                    class='lfmimage w-100'
                                                                                    style="height: 20rem;">
                                                                                <div>
                                                                                    <button type="button"
                                                                                        onclick="removeImage('step1_img',0)"
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
                                                                            <a id="lfm-step1_img"
                                                                                data-input="step1_img"
                                                                                data-preview="holder-step1_img"
                                                                                class="btn btn-primary btn-sm text-white lfm-img">
                                                                                <i
                                                                                    class="bi bi-image-fill me-2"></i>Select
                                                                                File
                                                                            </a>
                                                                        </span>
                                                                        <input id="step1_img" class="form-control"
                                                                            type="text" name="step1_img"
                                                                            value="{{ isset($partnership) ? $partnership->step1_img : '' }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}
                                                        <div class="card mb-4">
                                                            <div class="card-header">
                                                                <h3 class="card-title">Step one image</h3>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="list-title mb-3">
                                                                    <label
                                                                        for="kt_ecommerce_add_product_store_template"
                                                                        class="form-label">
                                                                        <span style="color: #B5B5C3">Image Size( 1000 x
                                                                            535 )px</span>
                                                                    </label>
                                                                </div>
                                                                <div class="panel-block">
                                                                    <div class="form-group">
                                                                        <div id="holder-step1_img">
                                                                            @if (!empty($partnership->step1_img))
                                                                                <div
                                                                                    class='lfmimage-container step1_imglfmc0'>
                                                                                    <img src="{{ asset($partnership->step1_img) }}"
                                                                                        class='lfmimage w-100'
                                                                                        style="height: 20rem;">
                                                                                    <div>
                                                                                        <button type="button"
                                                                                            onclick="removeImage('step1_img',0)"
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
                                                                                <a id="lfm-step1_img"
                                                                                    data-input="step1_img"
                                                                                    data-preview="holder-step1_img"
                                                                                    class="btn btn-primary text-white lfm-img">
                                                                                    <i
                                                                                        class="bi bi-image-fill me-2"></i>Select
                                                                                    File
                                                                                </a>
                                                                            </span>
                                                                            <input id="step1_img" class="form-control"
                                                                                type="text" name="step1_img"
                                                                                value="{{ isset($partnership) ? $partnership->step1_img : '' }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>


                                            <div
                                                class="separator  separator-dotted separator-content border-dark my-15">
                                                <span class="w-175px fw-bold">Step Two</span>
                                            </div>
                                            <div class="row mt-5">
                                                <div
                                                    class="@if ($attr == 'en') col-md-6 @else col-md-12 @endif">
                                                    <div
                                                        class="form-group mb-5{{ $errors->has('step2_title_' . $attr) ? 'has-error' : '' }}">
                                                        {!! Form::label('step2_title_' . $attr, 'Step two title' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                        {!! Form::text(
                                                            'step2_title_' . $attr,
                                                            null,
                                                            'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                        ) !!}
                                                        {!! $errors->first('step2_title_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                    </div>
                                                    <div
                                                        class="form-group mb-5{{ $errors->has('step2_description_' . $attr) ? 'has-error' : '' }}">
                                                        {!! Form::label('step2_description_' . $attr, 'Step two description' . ' (' . $lngcode . ')', [
                                                            'class' => 'form-label',
                                                        ]) !!}
                                                        {!! Form::textarea(
                                                            'step2_description_' . $attr,
                                                            null,
                                                            'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                        ) !!}
                                                        {!! $errors->first('step2_description_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                    </div>
                                                </div>
                                                @if ($attr == 'en')
                                                    <div class="col-md-6">
                                                        <div class="card-body pt-0">
                                                            <div class="list-title mb-3">
                                                                <label for="kt_ecommerce_add_product_store_template"
                                                                    class="form-label">
                                                                    <span style="color: #B5B5C3">Image Size(1000 x
                                                                        535)px</span>
                                                                </label>
                                                            </div>
                                                            <div class="panel-block">
                                                                <div class="form-group">
                                                                    <div id="holder-step2_img">
                                                                        @if (!empty($partnership->step2_img))
                                                                            <div
                                                                                class='lfmimage-container step2_imglfmc0'>
                                                                                <img src="{{ asset($partnership->step2_img) }}"
                                                                                    class='lfmimage w-100'
                                                                                    style="height: 20rem;">
                                                                                <div>
                                                                                    <button type="button"
                                                                                        onclick="removeImage('step2_img',0)"
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
                                                                            <a id="lfm-step2_img"
                                                                                data-input="step2_img"
                                                                                data-preview="holder-step2_img"
                                                                                class="btn btn-primary btn-sm text-white lfm-img">
                                                                                <i
                                                                                    class="bi bi-image-fill me-2"></i>Select
                                                                                File
                                                                            </a>
                                                                        </span>
                                                                        <input id="step2_img" class="form-control"
                                                                            type="text" name="step2_img"
                                                                            value="{{ isset($partnership) ? $partnership->step2_img : '' }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>

                                            <div
                                                class="separator  separator-dotted separator-content border-dark my-15">
                                                <span class="w-175px fw-bold">Step Three</span>
                                            </div>
                                            <div class="row mt-5">
                                                <div
                                                    class="@if ($attr == 'en') col-md-6 @else col-md-12 @endif">
                                                    <div
                                                        class="form-group mb-5{{ $errors->has('step3_title_' . $attr) ? 'has-error' : '' }}">
                                                        {!! Form::label('step3_title_' . $attr, 'Step three title' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                        {!! Form::text(
                                                            'step3_title_' . $attr,
                                                            null,
                                                            'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                        ) !!}
                                                        {!! $errors->first('step3_title_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                    </div>
                                                    <div
                                                        class="form-group mb-5{{ $errors->has('step3_description_' . $attr) ? 'has-error' : '' }}">
                                                        {!! Form::label('step3_description_' . $attr, 'Step three description' . ' (' . $lngcode . ')', [
                                                            'class' => 'form-label',
                                                        ]) !!}
                                                        {!! Form::textarea(
                                                            'step3_description_' . $attr,
                                                            null,
                                                            'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                        ) !!}
                                                        {!! $errors->first('step3_description_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                    </div>
                                                </div>
                                                @if ($attr == 'en')
                                                    <div class="col-md-6">
                                                        <div class="card-body pt-0">
                                                            <div class="list-title mb-3">
                                                                <label for="kt_ecommerce_add_product_store_template"
                                                                    class="form-label">
                                                                    <span style="color: #B5B5C3">Image Size(1000 x
                                                                        535)px</span>
                                                                </label>
                                                            </div>
                                                            <div class="panel-block">
                                                                <div class="form-group">
                                                                    <div id="holder-step3_img">
                                                                        @if (!empty($partnership->step3_img))
                                                                            <div
                                                                                class='lfmimage-container step3_imglfmc0'>
                                                                                <img src="{{ asset($partnership->step3_img) }}"
                                                                                    class='lfmimage w-100'
                                                                                    style="height: 20rem;">
                                                                                <div>
                                                                                    <button type="button"
                                                                                        onclick="removeImage('step3_img',0)"
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
                                                                            <a id="lfm-step3_img"
                                                                                data-input="step3_img"
                                                                                data-preview="holder-step3_img"
                                                                                class="btn btn-primary btn-sm text-white lfm-img">
                                                                                <i
                                                                                    class="bi bi-image-fill me-2"></i>Select
                                                                                File
                                                                            </a>
                                                                        </span>
                                                                        <input id="step3_img" class="form-control"
                                                                            type="text" name="step3_img"
                                                                            value="{{ isset($partnership) ? $partnership->step3_img : '' }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="separator my-10"></div>

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
                                                class="form-group mb-5{{ $errors->has('contact_us_text1_' . $attr) ? 'has-error' : '' }}">
                                                {!! Form::label('contact_us_text1_' . $attr, 'Contact us title' . ' (' . $lngcode . ')', [
                                                    'class' => 'form-label required',
                                                ]) !!}
                                                {!! Form::text(
                                                    'contact_us_text1_' . $attr,
                                                    null,
                                                    'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                ) !!}
                                                {!! $errors->first('contact_us_text2_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                            <div
                                                class="form-group mb-5{{ $errors->has('contact_us_text2_' . $attr) ? 'has-error' : '' }}">
                                                {!! Form::label('contact_us_text2_' . $attr, 'Contact us text' . ' (' . $lngcode . ')', [
                                                    'class' => 'form-label required',
                                                ]) !!}
                                                {!! Form::text(
                                                    'contact_us_text2_' . $attr,
                                                    null,
                                                    'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                ) !!}
                                                {!! $errors->first('contact_us_text2_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
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
                            </div>
                        @endforeach
                        <input type="hidden" name="details">
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
                        <div id="holder-banner_img">
                            @if (!empty($partnership->banner_img))
                                <div class='lfmimage-container banner_imglfmc0'>
                                    <img src="{{ asset($partnership->banner_img) }}" class='lfmimage w-100'
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
                                value="{{ isset($partnership) ? $partnership->banner_img : '' }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Benefit one image</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Image Size( 1000 x 535 )px</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                        <div id="holder-benefit1_img">
                            @if (!empty($partnership->benefit1_img))
                                <div class='lfmimage-container benefit1_imglfmc0'>
                                    <img src="{{ asset($partnership->benefit1_img) }}" class='lfmimage w-100'
                                        style="height: 20rem;">
                                    <div>
                                        <button type="button" onclick="removeImage('benefit1_img',0)"
                                            class='btn btn-sm btn-danger w-100'>Remove</button>
                                    </div>
                                </div>
                            @else
                                <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                            @endif
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="lfm-benefit1_img" data-input="benefit1_img" data-preview="holder-benefit1_img"
                                    class="btn btn-primary text-white lfm-img">
                                    <i class="bi bi-image-fill me-2"></i>Select File
                                </a>
                            </span>
                            <input id="benefit1_img" class="form-control" type="text" name="benefit1_img"
                                value="{{ isset($partnership) ? $partnership->benefit1_img : '' }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Benefit two image</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Image Size( 1000 x 535 )px</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                        <div id="holder-benefit2_img">
                            @if (!empty($partnership->benefit2_img))
                                <div class='lfmimage-container benefit2_imglfmc0'>
                                    <img src="{{ asset($partnership->benefit2_img) }}" class='lfmimage w-100'
                                        style="height: 20rem;">
                                    <div>
                                        <button type="button" onclick="removeImage('benefit2_img',0)"
                                            class='btn btn-sm btn-danger w-100'>Remove</button>
                                    </div>
                                </div>
                            @else
                                <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                            @endif
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="lfm-benefit2_img" data-input="benefit2_img" data-preview="holder-benefit2_img"
                                    class="btn btn-primary text-white lfm-img">
                                    <i class="bi bi-image-fill me-2"></i>Select File
                                </a>
                            </span>
                            <input id="benefit2_img" class="form-control" type="text" name="benefit2_img"
                                value="{{ isset($partnership) ? $partnership->benefit2_img : '' }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Benefit three image</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Image Size( 1000 x 535 )px</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                        <div id="holder-benefit3_img">
                            @if (!empty($partnership->benefit3_img))
                                <div class='lfmimage-container benefit3_imglfmc0'>
                                    <img src="{{ asset($partnership->benefit3_img) }}" class='lfmimage w-100'
                                        style="height: 20rem;">
                                    <div>
                                        <button type="button" onclick="removeImage('benefit3_img',0)"
                                            class='btn btn-sm btn-danger w-100'>Remove</button>
                                    </div>
                                </div>
                            @else
                                <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                            @endif
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="lfm-benefit3_img" data-input="benefit3_img" data-preview="holder-benefit3_img"
                                    class="btn btn-primary text-white lfm-img">
                                    <i class="bi bi-image-fill me-2"></i>Select File
                                </a>
                            </span>
                            <input id="benefit3_img" class="form-control" type="text" name="benefit3_img"
                                value="{{ isset($partnership) ? $partnership->benefit3_img : '' }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Contact us image</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Image Size( 1000 x 535 )px</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                        <div id="holder-contact_us_img">
                            @if (!empty($partnership->contact_us_img))
                                <div class='lfmimage-container contact_us_imglfmc0'>
                                    <img src="{{ asset($partnership->contact_us_img) }}" class='lfmimage w-100'
                                        style="height: 20rem;">
                                    <div>
                                        <button type="button" onclick="removeImage('contact_us_img',0)"
                                            class='btn btn-sm btn-danger w-100'>Remove</button>
                                    </div>
                                </div>
                            @else
                                <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                            @endif
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="lfm-contact_us_img" data-input="contact_us_img"
                                    data-preview="holder-contact_us_img" class="btn btn-primary text-white lfm-img">
                                    <i class="bi bi-image-fill me-2"></i>Select File
                                </a>
                            </span>
                            <input id="contact_us_img" class="form-control" type="text" name="contact_us_img"
                                value="{{ isset($partnership) ? $partnership->contact_us_img : '' }}">
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
                    url: "{{ route('admin.partnership-help') }}",
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
                    url: "{{ route('admin.partnership-detail') }}",
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
@endpush

<div class="row">
    <div class="row mb-5">
        <div class="col-md-8">
            <h3 class="card-title">
                @if($formMode == "edit") Edit About @else Add New About @endif
            </h3>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="float-end">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card"></i> Save</button>
                    <a href="{{ url('admin/about') }}" title="Back"><button type="button" class="btn btn-secondary btn-sm cancel"><i class="bi bi-x" aria-hidden="true"></i> Cancel</button></a>
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
                                <div class="accordion-item mb-5">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#banner_section" aria-expanded="true" aria-controls="banner_section">
                                            Banner 
                                        </button>
                                    </h2>
                                    <div id="banner_section" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="form-group mb-5{{ $errors->has('banner_title_'.$attr) ? 'has-error' : ''}}">
                                                {!! Form::label('banner_title_'.$attr, 'Banner title' . ' (' . $lngcode . ')', ['class' => 'form-label required']) !!}
                                                {!! Form::text('banner_title_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                                {!! $errors->first('banner_title_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                            <div class="form-group mb-5{{ $errors->has('banner_description_'.$attr) ? 'has-error' : ''}}">
                                                {!! Form::label('banner_description_'.$attr, 'Banner description' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                {!! Form::textarea('banner_description_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                                {!! $errors->first('banner_description_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item mb-5">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#cooperation_section" aria-expanded="true" aria-controls="cooperation_section">
                                            Cooperation 
                                        </button>
                                    </h2>
                                    <div id="cooperation_section" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="form-group mb-5{{ $errors->has('cooperation_title_'.$attr) ? 'has-error' : ''}}">
                                                {!! Form::label('cooperation_title_'.$attr, 'Cooperation title' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                {!! Form::text('cooperation_title_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                                {!! $errors->first('cooperation_title_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                            <div class="row">
                                                <div class=" @if($attr == 'en') col-md-6 @endif ">
                                                    <div class="form-group mb-5{{ $errors->has('cooperation_link_text1_'.$attr) ? 'has-error' : ''}}">
                                                        {!! Form::label('cooperation_link_text1_'.$attr, 'Link text one' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                        {!! Form::text('cooperation_link_text1_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                                        {!! $errors->first('cooperation_link_text1_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                    </div>
                                                </div>
                                                @if($attr == 'en')
                                                <div class="col-md-6">
                                                    <div class="form-group mb-5{{ $errors->has('cooperation_link1') ? 'has-error' : ''}}">
                                                        {!! Form::label('cooperation_link1', 'Link one', ['class' => 'form-label']) !!}
                                                        {!! Form::text('cooperation_link1', null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                                        {!! $errors->first('cooperation_link1', '<p class="help-block text-danger">:message</p>') !!}
                                                    </div>
                                                </div>
                                                @endif
                                            </div>

                                            {{-- <div class="row">
                                                <div class=" @if($attr == 'en') col-md-6 @endif ">
                                                    <div class="form-group mb-5{{ $errors->has('cooperation_link_text2_'.$attr) ? 'has-error' : ''}}">
                                                        {!! Form::label('cooperation_link_text2_'.$attr, 'Link text two' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                        {!! Form::text('cooperation_link_text2_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                                        {!! $errors->first('cooperation_link_text2_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                    </div>
                                                </div>
                                                @if($attr == 'en')
                                                <div class="col-md-6">
                                                    <div class="form-group mb-5{{ $errors->has('cooperation_link2') ? 'has-error' : ''}}">
                                                        {!! Form::label('cooperation_link2', 'Link two', ['class' => 'form-label']) !!}
                                                        {!! Form::text('cooperation_link2', null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                                        {!! $errors->first('cooperation_link2', '<p class="help-block text-danger">:message</p>') !!}
                                                    </div>
                                                </div>
                                                @endif
                                            </div> --}}
                                           
                                            <div class="form-group mb-5{{ $errors->has('cooperation_description_'.$attr) ? 'has-error' : ''}}">
                                                {!! Form::label('cooperation_description_'.$attr, 'Cooperation description' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                {!! Form::textarea('cooperation_description_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                                {!! $errors->first('cooperation_description_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item mb-5">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#group_section" aria-expanded="true" aria-controls="group_section">
                                            Group 
                                        </button>
                                    </h2>
                                    <div id="group_section" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="form-group mb-5{{ $errors->has('group_title_'.$attr) ? 'has-error' : ''}}">
                                                {!! Form::label('group_title_'.$attr, 'Group title' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                {!! Form::text('group_title_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                                {!! $errors->first('group_title_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                            <div class="row">
                                                <div class=" @if($attr == 'en') col-md-6 @endif ">
                                                    <div class="form-group mb-5{{ $errors->has('group_link_text1_'.$attr) ? 'has-error' : ''}}">
                                                        {!! Form::label('group_link_text1_'.$attr, 'Link text two' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                        {!! Form::text('group_link_text1_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                                        {!! $errors->first('group_link_text1_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                    </div>
                                                </div>
                                                @if($attr == 'en')
                                                <div class="col-md-6">
                                                    <div class="form-group mb-5{{ $errors->has('group_link1') ? 'has-error' : ''}}">
                                                        {!! Form::label('group_link1', 'Link two', ['class' => 'form-label']) !!}
                                                        {!! Form::text('group_link1', null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                                        {!! $errors->first('group_link1', '<p class="help-block text-danger">:message</p>') !!}
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="form-group mb-5{{ $errors->has('group_description_'.$attr) ? 'has-error' : ''}}">
                                                {!! Form::label('group_description_'.$attr, 'Group description' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                {!! Form::textarea('group_description_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                                {!! $errors->first('group_description_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                               
                                
                                {{-- <div class="form-group mb-5{{ $errors->has('mission_and_vision_description_'.$attr) ? 'has-error' : ''}}">
                                    {!! Form::label('mission_and_vision_description_'.$attr, 'Mission and vision description' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                    {!! Form::textarea('mission_and_vision_description_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                    {!! $errors->first('mission_and_vision_description_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                </div> --}}
                                {{-- <div class="row mt-4">
                                    <div class="col-md-12">
                                     
                                        <div class="card-header">
                                            <h3 class="card-title">Healthy life style</h3>
                                        </div>
                                    </div>
                                </div> --}}
                                @if(isset($empower))
                                <div class="form-group mb-5{{ $errors->has('empower_title_'.$attr) ? 'has-error' : ''}}">
                                    {!! Form::label('empower_title_'.$attr, 'Healthy life style title' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                    {{-- {!! Form::text('empower_title_'.$attr,  $empower->empower_title_en, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!} --}}
                                    @if ($attr == 'en')
                                    {!! Form::text(
                                        'empower_title_en',
                                        $empower->empower_title_en,
                                        'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                    ) !!}
                                @elseif($attr == 'sc')
                                    {!! Form::text(
                                        'empower_title_sc',
                                        $empower->empower_title_sc,
                                        'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                    ) !!}
                                @elseif($attr == 'tc')
                                    {!! Form::text(
                                        'empower_title_tc',
                                        $empower->empower_title_tc,
                                        'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                    ) !!}
                                @endif
                                    {!! $errors->first('empower_title_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                </div>
                                @else
                                <div class="form-group mb-5{{ $errors->has('empower_title_'.$attr) ? 'has-error' : ''}}">
                                    {!! Form::label('empower_title_'.$attr, 'Healthy life style title' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                    {!! Form::text('empower_title_'.$attr,  null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                    {!! $errors->first('empower_title_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                </div>
                                @endif
                                
                                <div class="accordion-item mb-5">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Healthy lifestyle one  
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            {{-- <div class="form-group mb-5{{ $errors->has('empower_sub_title1_'.$attr) ? 'has-error' : ''}}">
                                                {!! Form::label('empower_sub_title1_'.$attr, 'Healthy lifestyle One Title' . ' (' . $lngcode . ')', ['class' => 'form-label required']) !!}
                                                {!! Form::text('empower_sub_title1_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                                {!! $errors->first('empower_sub_title1_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div> --}}
                                            @if(isset($empower))
                                            <div class="form-group mb-5{{ $errors->has('empower_sub_title1_'.$attr) ? 'has-error' : ''}}">
                                                {!! Form::label('empower_sub_title1_'.$attr, 'Healthy life style title' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                {{-- {!! Form::text('empower_sub_title1_'.$attr,  $empower->empower_sub_title1_en, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!} --}}
                                                @if ($attr == 'en')
                                                {!! Form::text(
                                                    'empower_sub_title1_en',
                                                    $empower->empower_sub_title1_en,
                                                    'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                ) !!}
                                            @elseif($attr == 'sc')
                                                {!! Form::text(
                                                    'empower_sub_title1_sc',
                                                    $empower->empower_sub_title1_sc,
                                                    'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                ) !!}
                                            @elseif($attr == 'tc')
                                                {!! Form::text(
                                                    'empower_sub_title1_tc',
                                                    $empower->empower_sub_title1_tc,
                                                    'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                ) !!}
                                            @endif
                                                {!! $errors->first('empower_sub_title1_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                            @else
                                            <div class="form-group mb-5{{ $errors->has('empower_sub_title1_'.$attr) ? 'has-error' : ''}}">
                                                {!! Form::label('empower_sub_title1_'.$attr, 'Healthy life style title' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                {!! Form::text('empower_sub_title1_'.$attr,  null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                                {!! $errors->first('empower_sub_title1_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                            @endif
                                            {{-- <div class="form-group mb-5{{ $errors->has('empower_text1_'.$attr) ? 'has-error' : ''}}">
                                                {!! Form::label('empower_text1_'.$attr, 'Healthy lifestyle One description' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                {!! Form::textarea('empower_text1_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                                {!! $errors->first('empower_text1_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div> --}}
                                            @if(isset($empower))
                                            <div class="form-group mb-5{{ $errors->has('empower_text1_'.$attr) ? 'has-error' : ''}}">
                                                {!! Form::label('empower_text1_'.$attr, 'Healthy life style description' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                @if ($attr == 'en')
                                                {!! Form::text(
                                                    'empower_text1_en',
                                                    $empower->empower_text1_en,
                                                    'required' == 'required' ? ['class' => 'form-control editor'] : ['class' => 'form-control editor'],
                                                ) !!}
                                            @elseif($attr == 'sc')
                                                {!! Form::text(
                                                    'empower_text1_sc',
                                                    $empower->empower_text1_sc,
                                                    'required' == 'required' ? ['class' => 'form-control editor'] : ['class' => 'form-control editor'],
                                                ) !!}
                                            @elseif($attr == 'tc')
                                                {!! Form::text(
                                                    'empower_text1_tc',
                                                    $empower->empower_text1_tc,
                                                    'required' == 'required' ? ['class' => 'form-control editor'] : ['class' => 'form-control editor'],
                                                ) !!}
                                            @endif
                                                {!! $errors->first('empower_text1_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                            @else
                                            <div class="form-group mb-5{{ $errors->has('empower_text1_'.$attr) ? 'has-error' : ''}}">
                                                {!! Form::label('empower_text1_'.$attr, 'Healthy life style title' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                {!! Form::text('empower_text1_'.$attr,  null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                                {!! $errors->first('empower_text1_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                            @endif
                                            <div class="card">
                                                @if($attr == 'en')
                                                <div class="col-md-6">
                                                    <p class="form-label"> Healthy lifestyle Photo</p>
                                               
                                                    <div class="card-body pt-0">
                                                        <div class="list-title mb-3">
                                                            <label for="kt_ecommerce_add_product_store_template" class="form-label">
                                                                <span style="color: #B5B5C3">Image Size(1200 x 630)px</span>
                                                            </label>
                                                        </div>
                                                        <div class="panel-block">
                                                            <div class="form-group">
                                                                <div id="holder-empower_logo1">
                                                                    @if(!empty($empower->empower_logo1))
                                                                        <div class='lfmimage-container empower_logo1lfmc0'>
                                                                            <img src="{{ asset($empower->empower_logo1) }}" class='lfmimage w-100' style="height: 20rem;">
                                                                            <div>
                                                                                <button type="button" onclick="removeImage('empower_logo1',0)" class='btn btn-sm btn-danger w-100'>Remove</button>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                        <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                                                                    @endif
                                                                </div>
                                                                <div class="input-group mt-3">
                                                                <span class="input-group-btn">
                                                                    <a id="lfm-empower_logo1" data-input="empower_logo1" data-preview="holder-empower_logo1" class="btn btn-primary btn-sm text-white lfm-img">
                                                                        <i class="bi bi-image-fill me-2"></i>Select File
                                                                    </a>
                                                                </span>
                                                                    <input id="empower_logo1" class="form-control" type="text" name="empower_logo1" value="{{isset($empower) ? $empower->empower_logo1 : ''}}">
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
        
                                <div class="accordion-item mb-5">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                            Healthy lifestyle two 
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            {{-- <div class="form-group mb-5{{ $errors->has('empower_sub_title2_'.$attr) ? 'has-error' : ''}}">
                                                {!! Form::label('empower_sub_title2_'.$attr, 'Healthy lifestyle two Title' . ' (' . $lngcode . ')', ['class' => 'form-label required']) !!}
                                                {!! Form::text('empower_sub_title2_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                                {!! $errors->first('empower_sub_title2_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div> --}}
                                            @if(isset($empower))
                                            <div class="form-group mb-5{{ $errors->has('empower_sub_title2_'.$attr) ? 'has-error' : ''}}">
                                                {!! Form::label('empower_sub_title2_'.$attr, 'Healthy life style title' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                {{-- {!! Form::text('empower_sub_title2_'.$attr,  $empower->empower_sub_title2_en, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!} --}}
                                                @if ($attr == 'en')
                                                {!! Form::text(
                                                    'empower_sub_title2_en',
                                                    $empower->empower_sub_title2_en,
                                                    'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                ) !!}
                                            @elseif($attr == 'sc')
                                                {!! Form::text(
                                                    'empower_sub_title2_sc',
                                                    $empower->empower_sub_title2_sc,
                                                    'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                ) !!}
                                            @elseif($attr == 'tc')
                                                {!! Form::text(
                                                    'empower_sub_title2_tc',
                                                    $empower->empower_sub_title2_tc,
                                                    'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                ) !!}
                                            @endif
                                                {!! $errors->first('empower_sub_title2_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                            @else
                                            <div class="form-group mb-5{{ $errors->has('empower_sub_title2_'.$attr) ? 'has-error' : ''}}">
                                                {!! Form::label('empower_sub_title2_'.$attr, 'Healthy life style title' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                {!! Form::text('empower_sub_title2_'.$attr,  null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                                {!! $errors->first('empower_sub_title2_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                            @endif

                                            @if(isset($empower))
                                            <div class="form-group mb-5{{ $errors->has('empower_text2_'.$attr) ? 'has-error' : ''}}">
                                                {!! Form::label('empower_text2_'.$attr, 'Healthy life style description' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                @if ($attr == 'en')
                                                {!! Form::text(
                                                    'empower_text2_en',
                                                    $empower->empower_text2_en,
                                                    'required' == 'required' ? ['class' => 'form-control editor'] : ['class' => 'form-control editor'],
                                                ) !!}
                                            @elseif($attr == 'sc')
                                                {!! Form::text(
                                                    'empower_text2_sc',
                                                    $empower->empower_text2_sc,
                                                    'required' == 'required' ? ['class' => 'form-control editor'] : ['class' => 'form-control editor'],
                                                ) !!}
                                            @elseif($attr == 'tc')
                                                {!! Form::text(
                                                    'empower_text2_tc',
                                                    $empower->empower_text2_tc,
                                                    'required' == 'required' ? ['class' => 'form-control editor'] : ['class' => 'form-control editor'],
                                                ) !!}
                                            @endif
                                                {!! $errors->first('empower_text2_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                            @else
                                            <div class="form-group mb-5{{ $errors->has('empower_text2_'.$attr) ? 'has-error' : ''}}">
                                                {!! Form::label('empower_text2_'.$attr, 'Healthy life style title' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                {!! Form::text('empower_text2_'.$attr,  null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                                {!! $errors->first('empower_text2_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                            @endif
                                            <div class="card">
                                                @if($attr == 'en')
                                                <div class="col-md-6">
                                                    <p class="form-label"> Healthy lifestyle two photo</p>
                                               
                                                    <div class="card-body pt-0">
                                                        <div class="list-title mb-3">
                                                            <label for="kt_ecommerce_add_product_store_template" class="form-label">
                                                                <span style="color: #B5B5C3">Image Size(1200 x 630)px</span>
                                                            </label>
                                                        </div>
                                                        <div class="panel-block">
                                                            <div class="form-group">
                                                                <div id="holder-empower_logo2">
                                                                    @if(!empty($empower->empower_logo2))
                                                                        <div class='lfmimage-container empower_logo2lfmc0'>
                                                                            <img src="{{ asset($empower->empower_logo2) }}" class='lfmimage w-100' style="height: 20rem;">
                                                                            <div>
                                                                                <button type="button" onclick="removeImage('empower_logo2',0)" class='btn btn-sm btn-danger w-100'>Remove</button>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                        <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                                                                    @endif
                                                                </div>
                                                                <div class="input-group mt-3">
                                                                <span class="input-group-btn">
                                                                    <a id="lfm-empower_logo2" data-input="empower_logo2" data-preview="holder-empower_logo2" class="btn btn-primary btn-sm text-white lfm-img">
                                                                        <i class="bi bi-image-fill me-2"></i>Select File
                                                                    </a>
                                                                </span>
                                                                    <input id="empower_logo2" class="form-control" type="text" name="empower_logo2" value="{{isset($empower) ? $empower->empower_logo2 : ''}}">
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
        
                                <div class="accordion-item mb-5">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                            Healthy lifestyle three 
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            {{-- <div class="form-group mb-5{{ $errors->has('empower_sub_title3_'.$attr) ? 'has-error' : ''}}">
                                                {!! Form::label('empower_sub_title3_'.$attr, 'Healthy lifestyle three Title' . ' (' . $lngcode . ')', ['class' => 'form-label required']) !!}
                                                {!! Form::text('empower_sub_title3_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                                {!! $errors->first('empower_sub_title3_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div> --}}
                                            @if(isset($empower))
                                            <div class="form-group mb-5{{ $errors->has('empower_sub_title3_'.$attr) ? 'has-error' : ''}}">
                                                {!! Form::label('empower_sub_title3_'.$attr, 'Healthy life style title' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                {{-- {!! Form::text('empower_sub_title3_'.$attr,  $empower->empower_sub_title3_en, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!} --}}
                                                @if ($attr == 'en')
                                                {!! Form::text(
                                                    'empower_sub_title3_en',
                                                    $empower->empower_sub_title3_en,
                                                    'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                ) !!}
                                            @elseif($attr == 'sc')
                                                {!! Form::text(
                                                    'empower_sub_title3_sc',
                                                    $empower->empower_sub_title3_sc,
                                                    'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                ) !!}
                                            @elseif($attr == 'tc')
                                                {!! Form::text(
                                                    'empower_sub_title3_tc',
                                                    $empower->empower_sub_title3_tc,
                                                    'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                ) !!}
                                            @endif
                                                {!! $errors->first('empower_sub_title3_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                            @else
                                            <div class="form-group mb-5{{ $errors->has('empower_sub_title3_'.$attr) ? 'has-error' : ''}}">
                                                {!! Form::label('empower_sub_title3_'.$attr, 'Healthy life style title' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                {!! Form::text('empower_sub_title3_'.$attr,  null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                                {!! $errors->first('empower_sub_title3_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                            @endif

                                            @if(isset($empower))
                                            <div class="form-group mb-5{{ $errors->has('empower_text3_'.$attr) ? 'has-error' : ''}}">
                                                {!! Form::label('empower_text3_'.$attr, 'Healthy life style description' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                @if ($attr == 'en')
                                                {!! Form::text(
                                                    'empower_text3_en',
                                                    $empower->empower_text3_en,
                                                    'required' == 'required' ? ['class' => 'form-control editor'] : ['class' => 'form-control editor'],
                                                ) !!}
                                            @elseif($attr == 'sc')
                                                {!! Form::text(
                                                    'empower_text3_sc',
                                                    $empower->empower_text3_sc,
                                                    'required' == 'required' ? ['class' => 'form-control editor'] : ['class' => 'form-control editor'],
                                                ) !!}
                                            @elseif($attr == 'tc')
                                                {!! Form::text(
                                                    'empower_text3_tc',
                                                    $empower->empower_text3_tc,
                                                    'required' == 'required' ? ['class' => 'form-control editor'] : ['class' => 'form-control editor'],
                                                ) !!}
                                            @endif
                                                {!! $errors->first('empower_text3_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                            @else
                                            <div class="form-group mb-5{{ $errors->has('empower_text3_'.$attr) ? 'has-error' : ''}}">
                                                {!! Form::label('empower_text3_'.$attr, 'Healthy life style title' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                {!! Form::text('empower_text3_'.$attr,  null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                                {!! $errors->first('empower_text3_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                            @endif
                                            {{-- <div class="form-group mb-5{{ $errors->has('empower_text3_'.$attr) ? 'has-error' : ''}}">
                                                {!! Form::label('empower_text3_'.$attr, 'Healthy lifestyle three description' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                {!! Form::textarea('empower_text3_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                                {!! $errors->first('empower_text3_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div> --}}
                                            <div class="card">
                                                @if($attr == 'en')
                                                <div class="col-md-6">
                                                    <p class="form-label"> Healthy lifestyle three photo</p>
                                               
                                                    <div class="card-body pt-0">
                                                        <div class="list-title mb-3">
                                                            <label for="kt_ecommerce_add_product_store_template" class="form-label">
                                                                <span style="color: #B5B5C3">Image Size(1200 x 630)px</span>
                                                            </label>
                                                        </div>
                                                        <div class="panel-block">
                                                            <div class="form-group">
                                                                <div id="holder-empower_logo_3">
                                                                    @if(!empty($empower->empower_logo3))
                                                                        <div class='lfmimage-container empower_logo_3lfmc0'>
                                                                            <img src="{{ asset($empower->empower_logo3) }}" class='lfmimage w-100' style="height: 20rem;">
                                                                            <div>
                                                                                <button type="button" onclick="removeImage('empower_logo_3',0)" class='btn btn-sm btn-danger w-100'>Remove</button>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                        <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                                                                    @endif
                                                                </div>
                                                                <div class="input-group mt-3">
                                                                <span class="input-group-btn">
                                                                    <a id="lfm-empower_logo_3" data-input="empower_logo_3" data-preview="holder-empower_logo_3" class="btn btn-primary btn-sm text-white lfm-img">
                                                                        <i class="bi bi-image-fill me-2"></i>Select File
                                                                    </a>
                                                                </span>
                                                                    <input id="empower_logo_3" class="form-control" type="text" name="empower_logo3" value="{{isset($empower) ? $empower->empower_logo3 : ''}}">
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

                                <div class="accordion-item mb-5">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                            Healthy lifestyle four 
                                        </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                          
                                            @if(isset($empower))
                                            <div class="form-group mb-5{{ $errors->has('empower_sub_title4_'.$attr) ? 'has-error' : ''}}">
                                                {!! Form::label('empower_sub_title4_'.$attr, 'Healthy life style title' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                {{-- {!! Form::text('empower_sub_title4_'.$attr,  $empower->empower_sub_title4_en, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!} --}}
                                                @if ($attr == 'en')
                                                {!! Form::text(
                                                    'empower_sub_title4_en',
                                                    $empower->empower_sub_title4_en,
                                                    'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                ) !!}
                                            @elseif($attr == 'sc')
                                                {!! Form::text(
                                                    'empower_sub_title4_sc',
                                                    $empower->empower_sub_title4_sc,
                                                    'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                ) !!}
                                            @elseif($attr == 'tc')
                                                {!! Form::text(
                                                    'empower_sub_title4_tc',
                                                    $empower->empower_sub_title4_tc,
                                                    'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                ) !!}
                                            @endif
                                                {!! $errors->first('empower_sub_title4_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                            @else
                                            <div class="form-group mb-5{{ $errors->has('empower_sub_title4_'.$attr) ? 'has-error' : ''}}">
                                                {!! Form::label('empower_sub_title4_'.$attr, 'Healthy life style title' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                {!! Form::text('empower_sub_title4_'.$attr,  null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                                {!! $errors->first('empower_sub_title4_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                            @endif
                                            {{-- <div class="form-group mb-5{{ $errors->has('empower_text4_'.$attr) ? 'has-error' : ''}}">
                                                {!! Form::label('empower_text4_'.$attr, 'Healthy lifestyle three description' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                {!! Form::textarea('empower_text4_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                                {!! $errors->first('empower_text4_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div> --}}
                                            @if(isset($empower))
                                            <div class="form-group mb-5{{ $errors->has('empower_text4_'.$attr) ? 'has-error' : ''}}">
                                                {!! Form::label('empower_text4_'.$attr, 'Healthy life style description' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                @if ($attr == 'en')
                                                {!! Form::text(
                                                    'empower_text4_en',
                                                    $empower->empower_text4_en,
                                                    'required' == 'required' ? ['class' => 'form-control editor'] : ['class' => 'form-control editor'],
                                                ) !!}
                                            @elseif($attr == 'sc')
                                                {!! Form::text(
                                                    'empower_text4_sc',
                                                    $empower->empower_text4_sc,
                                                    'required' == 'required' ? ['class' => 'form-control editor'] : ['class' => 'form-control editor'],
                                                ) !!}
                                            @elseif($attr == 'tc')
                                                {!! Form::text(
                                                    'empower_text4_tc',
                                                    $empower->empower_text4_tc,
                                                    'required' == 'required' ? ['class' => 'form-control editor'] : ['class' => 'form-control editor'],
                                                ) !!}
                                            @endif
                                                {!! $errors->first('empower_text4_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                            @else
                                            <div class="form-group mb-5{{ $errors->has('empower_text4_'.$attr) ? 'has-error' : ''}}">
                                                {!! Form::label('empower_text4_'.$attr, 'Healthy life style title' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                                {!! Form::text('empower_text4_'.$attr,  null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                                {!! $errors->first('empower_text4_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                            @endif
                                            <div class="card">
                                                @if($attr == 'en')
                                                <div class="col-md-6">
                                                    <p class="form-label"> Healthy lifestyle four photo</p>
                                               
                                                    <div class="card-body pt-0">
                                                        <div class="list-title mb-3">
                                                            <label for="kt_ecommerce_add_product_store_template" class="form-label">
                                                                <span style="color: #B5B5C3">Image Size(1200 x 630)px</span>
                                                            </label>
                                                        </div>
                                                        <div class="panel-block">
                                                            <div class="form-group">
                                                                <div id="holder-empower_logo_4">
                                                                    @if(!empty($empower->empower_logo4))
                                                                        <div class='lfmimage-container empower_logo_4lfmc0'>
                                                                            <img src="{{ asset($empower->empower_logo4) }}" class='lfmimage w-100' style="height: 20rem;">
                                                                            <div>
                                                                                <button type="button" onclick="removeImage('empower_logo_4',0)" class='btn btn-sm btn-danger w-100'>Remove</button>
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                        <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                                                                    @endif
                                                                </div>
                                                                <div class="input-group mt-3">
                                                                <span class="input-group-btn">
                                                                    <a id="lfm-empower_logo_4" data-input="empower_logo_4" data-preview="holder-empower_logo_4" class="btn btn-primary btn-sm text-white lfm-img">
                                                                        <i class="bi bi-image-fill me-2"></i>Select File
                                                                    </a>
                                                                </span>
                                                                    <input id="empower_logo_4" class="form-control" type="text" name="empower_logo4" value="{{isset($empower) ? $empower->empower_logo4 : ''}}">
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
                                                        <span style="color: #B5B5C3">Image Size(200 x 200)px</span>
                                                    </label>
                                                </div>
                                                <div class="panel-block">
                                                    <div class="form-group">
                                                        <div id="holder-meta-image">
                                                            @if(!empty($about->meta_img))
                                                                <div class='lfmimage-container meta-imagelfmc0'>
                                                                    <img src="{{ asset($about->meta_img) }}" class='lfmimage w-100' style="height: 20rem;">
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
                                                            <input id="meta-image" class="form-control" type="text" name="meta_img" value="{{isset($about) ? $about->meta_img : ''}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group mb-5{{ $errors->has('rewards_title_'.$attr) ? 'has-error' : ''}}">
                                    {!! Form::label('rewards_title_'.$attr, 'Awards and Recognition Title' . ' (' . $lngcode . ')', ['class' => 'form-label required']) !!}
                                    {!! Form::text('rewards_title_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                    {!! $errors->first('rewards_title_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                </div>
                                @if($attr == 'tc')
                                    <div class="form-check mb-5 mt-5 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" {{isset($about->is_translate)&&$about->is_translate==1?'checked':''}} name="is_translate" id="auto_translate" value="1">
                                        <label class="form-check-label ms-2" for="auto_translate">
                                            Auto translate to chinese
                                        </label>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                        <div class="card mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Awards and Recognition Images</h3>
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
                                            @if (isset($about->rewords_img))
                                                @foreach ($about->rewords_img as $key => $img)
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
                                            <input id="thumbnail4" class="form-control" type="text" name="rewords_img[]"
                                                multiple="" readonly="">
                                        </div>
                                    </div>
                                    <span>Can upload multiple image</span>
                                </div>
                            </div>
                        </div>
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
                            @if(!empty($about->banner_img))
                                <div class='lfmimage-container banner_imglfmc0'>
                                    <img src="{{ asset($about->banner_img) }}" class='lfmimage w-100' style="height: 20rem;">
                                    <div>
                                        <button type="button" onclick="removeImage('banner_img',0)" class='btn btn-sm btn-danger w-100'>Remove</button>
                                    </div>
                                </div>
                            @else
                                <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                            @endif
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="lfm-banner_img" data-input="banner_img" data-preview="holder-banner-image" class="btn btn-primary text-white lfm-img">
                                    <i class="bi bi-image-fill me-2"></i>Select File
                                </a>
                            </span>
                            <input id="banner_img" class="form-control" type="text" name="banner_img" value="{{isset($about) ? $about->banner_img : ''}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Cooperation Photo</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Image Size( 1000 x 535 )px</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                        <div id="holder-cooperation-image">
                            @if(!empty($about->cooperation_img))
                                <div class='lfmimage-container cooperation_imglfmc0'>
                                    <img src="{{ asset($about->cooperation_img) }}" class='lfmimage w-100' style="height: 20rem;">
                                    <div>
                                        <button type="button" onclick="removeImage('cooperation_img',0)" class='btn btn-sm btn-danger w-100'>Remove</button>
                                    </div>
                                </div>
                            @else
                                <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                            @endif
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="lfm-cooperation_img" data-input="cooperation_img" data-preview="holder-cooperation-image" class="btn btn-primary text-white lfm-img">
                                    <i class="bi bi-image-fill me-2"></i>Select File
                                </a>
                            </span>
                            <input id="cooperation_img" class="form-control" type="text" name="cooperation_img" value="{{isset($about) ? $about->cooperation_img : ''}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Group Photo</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Image Size( 1000 x 535 )px</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                        <div id="holder-group-image">
                            @if(!empty($about->group_img))
                                <div class='lfmimage-container group_imglfmc0'>
                                    <img src="{{ asset($about->group_img) }}" class='lfmimage w-100' style="height: 20rem;">
                                    <div>
                                        <button type="button" onclick="removeImage('group_img',0)" class='btn btn-sm btn-danger w-100'>Remove</button>
                                    </div>
                                </div>
                            @else
                                <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                            @endif
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="lfm-group_img" data-input="group_img" data-preview="holder-group-image" class="btn btn-primary text-white lfm-img">
                                    <i class="bi bi-image-fill me-2"></i>Select File
                                </a>
                            </span>
                            <input id="group_img" class="form-control" type="text" name="group_img" value="{{isset($about) ? $about->group_img : ''}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Footer image one</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Image Size( 1000 x 535 )px</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                        <div id="holder-group-image">
                            @if(!empty($about->footer_img1))
                                <div class='lfmimage-container footer_img1lfmc0'>
                                    <img src="{{ asset($about->footer_img1) }}" class='lfmimage w-100' style="height: 20rem;">
                                    <div>
                                        <button type="button" onclick="removeImage('footer_img1',0)" class='btn btn-sm btn-danger w-100'>Remove</button>
                                    </div>
                                </div>
                            @else
                                <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                            @endif
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="lfm-footer_img1" data-input="footer_img1" data-preview="holder-group-image" class="btn btn-primary text-white lfm-img">
                                    <i class="bi bi-image-fill me-2"></i>Select File
                                </a>
                            </span>
                            <input id="footer_img1" class="form-control" type="text" name="footer_img1" value="{{isset($about) ? $about->footer_img1 : ''}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Footer image two</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Image Size( 1000 x 535 )px</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                        <div id="holder-group-image">
                            @if(!empty($about->footer_img2))
                                <div class='lfmimage-container footer_img2lfmc0'>
                                    <img src="{{ asset($about->footer_img2) }}" class='lfmimage w-100' style="height: 20rem;">
                                    <div>
                                        <button type="button" onclick="removeImage('footer_img2',0)" class='btn btn-sm btn-danger w-100'>Remove</button>
                                    </div>
                                </div>
                            @else
                                <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                            @endif
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="lfm-footer_img2" data-input="footer_img2" data-preview="holder-group-image" class="btn btn-primary text-white lfm-img">
                                    <i class="bi bi-image-fill me-2"></i>Select File
                                </a>
                            </span>
                            <input id="footer_img2" class="form-control" type="text" name="footer_img2" value="{{isset($about) ? $about->footer_img2 : ''}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Footer image three</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Image Size( 1000 x 535 )px</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                        <div id="holder-group-image">
                            @if(!empty($about->footer_img3))
                                <div class='lfmimage-container footer_img2lfmc0'>
                                    <img src="{{ asset($about->footer_img3) }}" class='lfmimage w-100' style="height: 20rem;">
                                    <div>
                                        <button type="button" onclick="removeImage('footer_img3',0)" class='btn btn-sm btn-danger w-100'>Remove</button>
                                    </div>
                                </div>
                            @else
                                <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                            @endif
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="lfm-footer_img3" data-input="footer_img3" data-preview="holder-group-image" class="btn btn-primary text-white lfm-img">
                                    <i class="bi bi-image-fill me-2"></i>Select File
                                </a>
                            </span>
                            <input id="footer_img3" class="form-control" type="text" name="footer_img3" value="{{isset($about) ? $about->footer_img3 : ''}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>




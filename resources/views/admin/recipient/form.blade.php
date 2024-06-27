<div class="row">
    <div class="row mb-5">
        <div class="col-md-8">
            <h3 class="card-title">
            @if($formMode == "edit") Edit Recipient @else Add New Recipient @endif 
            </h3>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="float-end">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card"></i> Save</button>
                    <a href="{{ url('/admin/recipient') }}" title="Back"><button class="btn btn-secondary btn-sm cancel"><i class="bi bi-x" aria-hidden="true"></i> Cancel</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
        
                <ul class="nav nav-tabs bg-white">
                @foreach (config('lng.lng') as $lngcode => $lng)
                    <li class="nav-item">
                        <a onclick="showHideDescription('{{ strtolower($lngcode) }}')"
                            href="#{{ strtolower($lngcode) }}-tab" data-toggle="tab"
                            class="nav-link {{ $lngcode == 'EN' ? 'active' : '' }} nav_link">
                            <span class="d-sm-none">{{ $lng }}</span>
                            <span class="d-sm-block d-none">{{ $lng }}</span>
                        </a>
                    </li>
                @endforeach
                </ul>
                <div class="card-body content-body">
                    <div class="tab-content">   
                        @foreach (config('lng.attr') as $lngcode => $attr)
                        <div class="tab-pane fade {{ $attr == 'en' ? 'active show' : '' }}"  id="{{ strtolower($lngcode) }}-tab">
                            <div class="mb-10"></div>        
                            <div class="form-group mb-5{{ $errors->has('location') ? 'has-error' : ''}}">
                            {!! Form::label('location', 'Location', ['class' => 'control-label']) !!}
                            {!! Form::text('location', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                            {!! $errors->first('location', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group mb-5{{ $errors->has('date') ? 'has-error' : ''}}">
                            {!! Form::label('date', 'Date', ['class' => 'control-label']) !!}
                            {!! Form::date('date', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                            {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group mb-5{{ $errors->has('time') ? 'has-error' : ''}}">
                            {!! Form::label('time', 'Time', ['class' => 'control-label']) !!}
                            {!! Form::input('time', 'time', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                            {!! $errors->first('time', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group mb-5{{ $errors->has('product_id') ? 'has-error' : ''}}">
                            {!! Form::label('product_id', 'Product Id', ['class' => 'control-label']) !!}
                            {!! Form::number('product_id', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                            {!! $errors->first('product_id', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group mb-5{{ $errors->has('is_tumor_decide_later') ? 'has-error' : ''}}">
                            {!! Form::label('is_tumor_decide_later', 'Is Tumor Decide Later', ['class' => 'control-label']) !!}
                            {!! Form::text('is_tumor_decide_later', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                            {!! $errors->first('is_tumor_decide_later', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group mb-5{{ $errors->has('is_ultrasound_decide_later') ? 'has-error' : ''}}">
                            {!! Form::label('is_ultrasound_decide_later', 'Is Ultrasound Decide Later', ['class' => 'control-label']) !!}
                            {!! Form::text('is_ultrasound_decide_later', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                            {!! $errors->first('is_ultrasound_decide_later', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group mb-5{{ $errors->has('is_add_on_decide_later') ? 'has-error' : ''}}">
                            {!! Form::label('is_add_on_decide_later', 'Is Add On Decide Later', ['class' => 'control-label']) !!}
                            {!! Form::text('is_add_on_decide_later', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                            {!! $errors->first('is_add_on_decide_later', '<p class="help-block">:message</p>') !!}
                        </div>

                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <!--begin::Description-->
                    <label for="kt_ecommerce_add_product_store_template" class="form-label" style="color: #8F939B;"> Category Image (410px*450px)</label>
                    <!--end::Description-->
                    <!--begin::Image input-->
                    <div class="card">
                        <div class="image-input image-input-empty image-input-outline mb-3">
                            <!--begin::Preview existing avatar-->
                            <div id="holder-category-image" class="image-input-wrapper" style="width: 100%; height: 200px;">
                                @if(isset($recipient->image))
                                    <img src="{{ asset($recipient->image) }}" class="image-input-wrapper"
                                                    style="width: 100%;" alt="">
                                @endif
                            </div>
                            <!--end::Preview existing avatar-->
                        </div>
                    </div>
                    <!--end::Image input-->
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="cat-image" data-input="category-image" data-preview="holder-category-image" class="btn btn-primary text-white">
                                Select File
                            </a>
                        </span>
                        <input id="category-image" value="{{ isset($recipient->image)?$recipient->image:'' }}" class="form-control" type="text" name="image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                
           


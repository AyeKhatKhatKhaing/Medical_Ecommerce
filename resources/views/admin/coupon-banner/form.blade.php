<div class="row">
    <div class="row mb-5">
        <div class="col-md-8">
            <h3 class="card-title">
                @if($formMode == "edit") Edit Coupon Banner @else Add New Coupon Banner @endif
            </h3>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="float-end">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card"></i> Save</button>
                    <a href="{{ url('/admin/coupon-banner') }}" title="Back"><button type="button" class="btn btn-secondary btn-sm cancel"><i class="bi bi-x" aria-hidden="true"></i> Cancel</button></a>
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
                        <div class="tab-pane fade {{ $attr == 'en' ? 'active show' : '' }}" id="{{ strtolower($lngcode) }}-tab">
                            <div class="form-group mb-5{{ $errors->has('name_'.$attr) ? 'has-error' : ''}}">
                                {!! Form::label('name_'.$attr, 'Name' . ' (' . $lngcode . ')', ['class' => 'form-label required']) !!}
                                {!! Form::text('name_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                {!! $errors->first('name_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                            <div class="form-group mb-5{{ $errors->has('description_'.$attr) ? 'has-error' : ''}}">
                                {!! Form::label('description_'.$attr, 'Description' . ' (' . $lngcode . ')', ['class' => 'form-label required']) !!}
                                {!! Form::textarea('description_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                {!! $errors->first('description_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <h5>Search Engin Optimization (SEO)</h5>
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
                                                   <div id="holder-meta-img">
                                                        @if(!empty($couponBanner->meta_img))
                                                            <div class='lfmimage-container meta-imglfmc0'>
                                                                <img src="{{ asset($couponBanner->meta_img) }}" class='lfmimage w-100' style="height: 20rem;">
                                                                <div>
                                                                    <button type="button" onclick="removeImage('meta-img',0)" class='btn btn-sm btn-danger w-100'>Remove</button>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                                                        @endif
                                                   </div>
                                                   <div class="input-group mt-3">
                                                        <span class="input-group-btn">
                                                            <a id="lfm-meta-img" data-input="meta-img" data-preview="holder-meta-img" class="btn btn-primary text-white lfm-img">
                                                                <i class="bi bi-image-fill me-2"></i>Select File
                                                            </a>
                                                        </span>
                                                        <input id="meta-img" class="form-control" type="text" name="meta-img" value="{{isset($couponBanner) ? $couponBanner->meta_img : ''}}">
                                                   </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            @if($attr == 'tc')
                            <div class="form-check mb-5 mt-5 d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" name="is_translate" id="auto_translate" value="1" {{isset($couponBanner->is_translate)&&$couponBanner->is_translate==1?'checked':''}}>
                                <label class="form-check-label ms-2" for="auto_translate">
                                    Auto translate to chinese
                                </label>
                            </div>
                            @endif
                        </div>

                        @endforeach
                        {{-- <div class="form-group mb-5">
                            <label for="merchant">Merchant</label>
                            <select class="form-select mb-5 merchant" name="merchant" data-control="select2" data-placeholder="Select an option">
                                <option>--select--</option>
                                @if(count($merchants) > 0)
                                    @foreach($merchants as $item)
                                    <option value="{{$item->id}}" {{isset($couponBanner) && $item->id == $couponBanner->merchant ? 'selected' : ''}}>{{$item->name_en}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group mb-5{{ $errors->has('gender') ? 'has-error' : ''}}">
                            {!! Form::label('gender', 'Gender', ['class' => 'form-label required mb-3']) !!}
                            <div class="mb-3">
                                {{ Form::radio('gender', 0, true, ['class'=>'form-check-input me-2', 'id' => 'male']) }}
                                {{ Form::label('male', 'Male', ['class' => 'form-check-label me-3']) }}

                                {{ Form::radio('gender', 1, '', ['class'=>'form-check-input me-2', 'id' => 'female']) }}
                                {{ Form::label('female', 'Female', ['class' => 'form-check-label me-3']) }}

                                {{ Form::radio('gender', 2, '', ['class'=>'form-check-input me-2', 'id' => 'other']) }}
                                {{ Form::label('other', 'Other', ['class' => 'form-check-label me-3']) }}
                            </div>
                        </div>
                        <div class="form-group mb-5{{ $errors->has('original_price') ? 'has-error' : ''}}">
                            {!! Form::label('original_price', 'Original Price', ['class' => 'control-label mb-3']) !!}
                            {!! Form::number('original_price', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                            {!! $errors->first('original_price', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group mb-5{{ $errors->has('discount_price') ? 'has-error' : ''}}">
                            {!! Form::label('discount_price', 'Discount Price', ['class' => 'control-label mb-3']) !!}
                            {!! Form::number('discount_price', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                            {!! $errors->first('discount_price', '<p class="help-block">:message</p>') !!}
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Image</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Image Size( 1000 x 535 )px</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                        <div id="holder-img">
                            @if(!empty($couponBanner->img))
                            <div class='lfmimage-container imglfmc0'>
                                <img src="{{ asset($couponBanner->img) }}" class='lfmimage w-100' style="height: 20rem;">
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
                            <input id="img" class="form-control" type="text" name="img" value="{{isset($couponBanner) ? $couponBanner->img : ''}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="card mt-4">
            <div class="card-header">
                <div class="card-title">
                    Recommand Product
                </div>
            </div>
            <div class="card-body">
                <div class="form-group mb-5{{ $errors->has('recommend_item') ? 'has-error' : ''}}">
                    <div class="mb-3">
                        {{ Form::radio('recommend_item', 0, true, ['class'=>'form-check-input me-2', 'id' => 'most-popular']) }}
                        {{ Form::label('most popular', 'Most Popular', ['class' => 'form-check-label me-3']) }}

                        {{ Form::radio('recommend_item', 1, '', ['class'=>'form-check-input me-2', 'id' => 'hot']) }}
                        {{ Form::label('hot', 'Hot', ['class' => 'form-check-label me-3']) }}
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Mobile Image</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Image Size( 500 x 250 )px</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                        <div id="holder-mobile-img">
                            @if(!empty($couponBanner->mobile_img))
                            <div class='lfmimage-container mobile-imglfmc0'>
                                <img src="{{ asset($couponBanner->mobile_img) }}" class='lfmimage w-100' style="height: 20rem;">
                                <div>
                                    <button type="button" onclick="removeImage('mobile-img',0)" class='btn btn-sm btn-danger w-100'>Remove</button>
                                </div>
                            </div>
                            @else
                            <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                            @endif
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="lfm-mobile-img" data-input="mobile-img" data-preview="holder-mobile-img" class="btn btn-primary text-white lfm-img">
                                    <i class="bi bi-image-fill me-2"></i>Select File
                                </a>
                            </span>
                            <input id="mobile-img" class="form-control" type="text" name="mobile-img" value="{{isset($couponBanner) ? $couponBanner->mobile_img : ''}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $('#lfm-img').filemanager('file');
    $('#lfm-meta-img').filemanager('file');
    $('#lfm-mobile-img').filemanager('file');
</script>
@endpush
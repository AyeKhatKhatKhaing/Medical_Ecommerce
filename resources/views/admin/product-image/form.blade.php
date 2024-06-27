<div class="row">
    <div class="row mb-5">
        <div class="col-md-8">
            <h3 class="card-title">
            @if($formMode == "edit") Edit Product Image @else Add New Product Image @endif 
            </h3>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="float-end">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card"></i> Save</button>
                    <a href="{{ url('/admin/product-image') }}" title="Back"><button class="btn btn-secondary btn-sm cancel"><i class="bi bi-x" aria-hidden="true"></i> Cancel</button></a>
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
                            <div class="form-group mb-5{{ $errors->has('product_id') ? 'has-error' : ''}}">
                                {!! Form::label('product_id', 'Product Id', ['class' => 'control-label']) !!}
                                {!! Form::text('product_id', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                {!! $errors->first('product_id', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group mb-5{{ $errors->has('creator_type') ? 'has-error' : ''}}">
                                {!! Form::label('creator_type', 'Creator Type', ['class' => 'control-label']) !!}
                                {!! Form::text('creator_type', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                {!! $errors->first('creator_type', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group mb-5{{ $errors->has('img') ? 'has-error' : ''}}">
                                {!! Form::label('img', 'Img', ['class' => 'control-label']) !!}
                                {!! Form::text('img', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                {!! $errors->first('img', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="form-group mb-5{{ $errors->has('updated_by') ? 'has-error' : ''}}">
                                {!! Form::label('updated_by', 'Updated By', ['class' => 'control-label']) !!}
                                {!! Form::text('updated_by', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                {!! $errors->first('updated_by', '<p class="help-block">:message</p>') !!}
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
                                @if(isset($productimage->img))
                                    <img src="{{ asset($productimage->img) }}" class="image-input-wrapper"
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
                        <input id="category-image" value="{{ isset($productimage->img)?$productimage->img:'' }}" class="form-control" type="text" name="image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                
           


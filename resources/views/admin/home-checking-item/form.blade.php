<div class="row">
    <div class="row mb-5">
        <div class="col-md-8">
            <h3 class="card-title">
            @if($formMode == "edit") Edit '%%modelName%%' @else Add New '%%modelName%%' @endif 
            </h3>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="float-end">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card"></i> Save</button>
                    <a href="{{ url('/%%routeGroup%%%%viewName%%/') }}" title="Back"><button class="btn btn-secondary btn-sm cancel"><i class="bi bi-x" aria-hidden="true"></i> Cancel</button></a>
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
                            <div class="form-group mb-5{{ $errors->has('service_solution_id') ? 'has-error' : ''}}">
    {!! Form::label('service_solution_id', 'Service Solution Id', ['class' => 'control-label']) !!}
    {!! Form::number('service_solution_id', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('service_solution_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-5{{ $errors->has('tags') ? 'has-error' : ''}}">
    {!! Form::label('tags', 'Tags', ['class' => 'control-label']) !!}
    {!! Form::textarea('tags', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('tags', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-5{{ $errors->has('content_en') ? 'has-error' : ''}}">
    {!! Form::label('content_en', 'Content En', ['class' => 'control-label']) !!}
    {!! Form::textarea('content_en', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('content_en', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-5{{ $errors->has('content_tc') ? 'has-error' : ''}}">
    {!! Form::label('content_tc', 'Content Tc', ['class' => 'control-label']) !!}
    {!! Form::textarea('content_tc', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('content_tc', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-5{{ $errors->has('content_sc') ? 'has-error' : ''}}">
    {!! Form::label('content_sc', 'Content Sc', ['class' => 'control-label']) !!}
    {!! Form::textarea('content_sc', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('content_sc', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group mb-5{{ $errors->has('url') ? 'has-error' : ''}}">
    {!! Form::label('url', 'Url', ['class' => 'control-label']) !!}
    {!! Form::text('url', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('url', '<p class="help-block">:message</p>') !!}
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
                                @if(isset($%%crudNameSingular%%->image))
                                    <img src="{{ asset($$%%crudNameSingular%%->image) }}" class="image-input-wrapper"
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
                        <input id="category-image" value="{{ isset($$%%crudNameSingular%%->image)?$$%%crudNameSingular%%->image:'' }}" class="form-control" type="text" name="image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                
           


<div class="row">
    <div class="row mb-5">
        <div class="col-md-8">
            <h3 class="card-title">
                @if($formMode == "edit") Edit Slider @else Add New Slider @endif
            </h3>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="float-end">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card"></i> Save</button>
                    <a href="{{ url('admin/sliders') }}" title="Back"><button type="button" class="btn btn-secondary btn-sm cancel"><i class="bi bi-x" aria-hidden="true"></i> Cancel</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-body content-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="" class="mt-5">Page type</label>
                            <select class="form-select mb-5" aria-label="Default select example" name="page_type">
                                <option selected>Page Type</option>
                                @foreach($pages as $i => $p)
                                    <option value="{{$p->id}}" {{(isset($slider)&&$slider->page_type==$p->id) ? 'selected' : ''}}>{{$p->name_en}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="mt-5">Slider type</label>
                            <select class="form-select mb-5" aria-label="Default select example" name="slider_type" id="slider_type">
                                <option value="0" {{isset($slider)&&$slider->slider_type=='Image' ? 'selected' : ''}}>Image</option>
                                <option value="1" {{isset($slider)&&$slider->slider_type=='Video' ? 'selected' : ''}}>Video</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-5{{ $errors->has('name') ? 'has-error' : ''}}">
                                {!! Form::label('name', 'Name', ['class' => 'form-label']) !!}
                                {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                {!! $errors->first('name', '<p class="help-block text-danger">:message</p>') !!}
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-5{{ $errors->has('link') ? 'has-error' : ''}}">
                                {!! Form::label('link', 'Link', ['class' => 'form-label']) !!}
                                {!! Form::text('link', null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                {!! $errors->first('link', '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            {{-- <div class="form-group mb-5{{ $errors->has('time_setup') ? 'has-error' : ''}}">
                                {!! Form::label('time_setup', 'Duration', ['class' => 'form-label']) !!}
                                {!! Form::number('time_setup', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                {!! $errors->first('time_setup', '<p class="help-block">:message</p>') !!}
                            </div> --}}
                            <div class="form-group mb-5{{ $errors->has('sort_order') ? 'has-error' : ''}}">
                                {!! Form::label('sort_order', 'Sort By', ['class' => 'form-label']) !!}
                                {!! Form::number('sort_order', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                {!! $errors->first('sort_order', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card" id="image">
                                <div class="card-header">
                                    <h3 class="card-title">Image (for desktop)</h3>
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
                                                @if(!empty($slider->img))
                                                    <div class='lfmimage-container imglfmc0'>
                                                        <img src="{{ asset($slider->img) }}" class='lfmimage w-100' style="height: 20rem;">
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
                                                    <a data-input="img" data-preview="holder-img" class="btn btn-primary text-white lfm-img">
                                                        <i class="bi bi-image-fill me-2"></i>Select File
                                                    </a>
                                                </span>
                                                <input id="img" class="form-control" type="text" name="img" value="{{isset($slider) ? $slider->img : ''}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="card d-none" id="video">
                                <div class="card-header">
                                    <h3 class="card-title">Video</h3>
                                </div>
                                <div class="card-body">
                                    <div class="panel-block">
                                        <div class="form-group">
                                            <div id="holder-video">
                                                @if(!empty($slider->video))
                                                    <div class='lfmimage-container videoInputlfmc0'>
                                                        <video width="100%" height="20rem" class='lfmimage w-100'>
                                                            <source src="{{ asset($slider->video) }}" type="video/mp4">
                                                        </video>
                                                        <div>
                                                            <button type="button" onclick="removeImage('videoInput',0)" class='btn btn-sm btn-danger w-100'>Remove</button>
                                                        </div>
                                                    </div>
                                                @else
                                                    <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                                                @endif
                                            </div>
                                            <div class="input-group mt-3">
                                                <span class="input-group-btn">
                                                    <a  data-input="videoInput" data-preview="holder-video" class="btn btn-primary text-white lfm-img">
                                                        <i class="bi bi-image-fill me-2"></i>Select File
                                                    </a>
                                                </span>
                                                <input id="videoInput" class="form-control" type="text" name="video" value="{{isset($slider) ? $slider->video : ''}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card" id="image">
                                <div class="card-header">
                                    <h3 class="card-title">Image (for moible)</h3>
                                </div>
                                <div class="card-body">
                                    <div class="list-title mb-3">
                                        <label for="kt_ecommerce_add_product_store_template" class="form-label">
                                            <span style="color: #B5B5C3">Image Size( 1000 x 535 )px</span>
                                        </label>
                                    </div>
                                    <div class="panel-block">
                                        <div class="form-group">
                                            <div id="holder-mobile_img">
                                                @if(!empty($slider->mobile_img))
                                                    <div class='lfmimage-container imglfmc0'>
                                                        <img src="{{ asset($slider->mobile_img) }}" class='lfmimage w-100' style="height: 20rem;">
                                                        <div>
                                                            <button type="button" onclick="removeImage('mobile_img',0)" class='btn btn-sm btn-danger w-100'>Remove</button>
                                                        </div>
                                                    </div>
                                                @else
                                                    <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                                                @endif
                    
                                            </div>
                                            <div class="input-group mt-3">
                                                <span class="input-group-btn">
                                                    <a data-input="mobile_img" data-preview="holder-mobile_img" class="btn btn-primary text-white lfm-img">
                                                        <i class="bi bi-image-fill me-2"></i>Select File
                                                    </a>
                                                </span>
                                                <input id="mobile_img" class="form-control" type="text" name="mobile_img" value="{{isset($slider) ? $slider->mobile_img : ''}}">
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
    {{-- <div class="col-md-4">

        <div class="card" id="image">
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
                            @if(!empty($slider->img))
                                <div class='lfmimage-container imglfmc0'>
                                    <img src="{{ asset($slider->img) }}" class='lfmimage w-100' style="height: 20rem;">
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
                                <a data-input="img" data-preview="holder-img" class="btn btn-primary text-white lfm-img">
                                    <i class="bi bi-image-fill me-2"></i>Select File
                                </a>
                            </span>
                            <input id="img" class="form-control" type="text" name="img" value="{{isset($slider) ? $slider->img : ''}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card d-none" id="video">
            <div class="card-header">
                <h3 class="card-title">Video</h3>
            </div>
            <div class="card-body">
                <div class="panel-block">
                    <div class="form-group">
                        <div id="holder-video">
                            @if(!empty($slider->video))
                                <div class='lfmimage-container videoInputlfmc0'>
                                    <video width="100%" height="20rem" class='lfmimage w-100'>
                                        <source src="{{ asset($slider->video) }}" type="video/mp4">
                                    </video>
                                    <div>
                                        <button type="button" onclick="removeImage('videoInput',0)" class='btn btn-sm btn-danger w-100'>Remove</button>
                                    </div>
                                </div>
                            @else
                                <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                            @endif
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a  data-input="videoInput" data-preview="holder-video" class="btn btn-primary text-white lfm-img">
                                    <i class="bi bi-image-fill me-2"></i>Select File
                                </a>
                            </span>
                            <input id="videoInput" class="form-control" type="text" name="video" value="{{isset($slider) ? $slider->video : ''}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <div class="card-title">
                    {!! Form::label('time_setup', 'Duration', ['class' => 'control-label']) !!}
                </div>
            </div>
            <div class="card-body">
                <div class="form-group mb-5{{ $errors->has('time_setup') ? 'has-error' : ''}}">
                    {!! Form::number('time_setup', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                    {!! $errors->first('time_setup', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-header">
                <div class="card-title">
                    {!! Form::label('sort_order', 'Sort By', ['class' => 'control-label']) !!}
                </div>
            </div>
            <div class="card-body">
                <div class="form-group mb-5{{ $errors->has('sort_order') ? 'has-error' : ''}}">
                    {!! Form::number('sort_order', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                    {!! $errors->first('sort_order', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
    </div> --}}


</div>




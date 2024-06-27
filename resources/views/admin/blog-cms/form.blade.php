<div class="row">
    <div class="row mb-5">
        <div class="col-md-8">
            <h3 class="card-title">
                Edit Blog CMS
            </h3>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="float-end">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card"></i> Save</button>
                    <a href="{{ url('/admin/blog-cms') }}" title="Back"><button type="button" class="btn btn-secondary btn-sm cancel"><i class="bi bi-x" aria-hidden="true"></i> Cancel</button></a>
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
                            @php
                                $desc = 'desc_'.$attr;
                            @endphp
                            <div class="tab-pane fade {{ $attr == 'en' ? 'active show' : '' }}"  id="{{ strtolower($lngcode) }}-tab">
                                <div class="form-group mb-5{{ $errors->has('desc_' . $attr) ? 'has-error' : '' }}">
                                    <label for="desc_{{ $attr }}" class="form-label">Subscriber Description ({{ $lngcode }})</label>
                                    <textarea class="form-control editor" id="desc_{{ $attr }}" name="desc_{{ $attr }}" cols="50" rows="10" aria-hidden="true">{{ isset($data->$desc) ? $data->$desc : '' }}</textarea>
                                    {!! $errors->first('desc_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-header">
                <h3 class="card-title">Subscribe Image</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="subscribe_image" class="form-label">
                        <span style="color: #B5B5C3">Image Size(421 x 130)px</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                       <div id="holder-sub-img">
                            @if(isset($data->subscribe_image))
                                <div class='lfmimage-container imglfmc0'>
                                    <img src="{{ asset($data->subscribe_image) }}" class='lfmimage w-100' style="height: 20rem;">
                                    <div>
                                        <button type="button" onclick="removeImage('sub-img',0)" class='btn btn-sm btn-danger w-100'>Remove</button>
                                    </div>
                                </div>
                            @else
                                <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                            @endif
                       </div>
                       <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="lfm-img" data-input="sub-img" data-preview="holder-sub-img" class="btn btn-primary text-white lfm-img">
                                    <i class="bi bi-image-fill me-2"></i>Select File
                                </a>
                            </span>
                            <input id="sub-img" class="form-control" type="text" name="subscribe_image" value="{{isset($data) ? $data->subscribe_image : ''}}">
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Banner Image 1</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="banner_image_1" class="form-label">
                        <span style="color: #B5B5C3">Image Size(1920 x 190)px</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                       <div id="holder-img">
                            @if(isset($data->banner_image_1))
                                <div class='lfmimage-container imglfmc0'>
                                    <img src="{{ asset($data->banner_image_1) }}" class='lfmimage w-100' style="height: 20rem;">
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
                            <input id="img" class="form-control" type="text" name="banner_image_1" value="{{isset($data) ? $data->banner_image_1 : ''}}">
                       </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-header">
                <h3 class="card-title">Banner Image 2</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="banner_image_2" class="form-label">
                        <span style="color: #B5B5C3">Image Size(1920 x 190)px</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                       <div id="holder-meta-img">
                            @if(isset($data->banner_image_2))
                                <div class='lfmimage-container imglfmc0'>
                                    <img src="{{ asset($data->banner_image_2) }}" class='lfmimage w-100' style="height: 20rem;">
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
                                <a id="lfm-img" data-input="meta-img" data-preview="holder-meta-img" class="btn btn-primary text-white lfm-img">
                                    <i class="bi bi-image-fill me-2"></i>Select File
                                </a>
                            </span>
                            <input id="meta-img" class="form-control" type="text" name="banner_image_2" value="{{isset($data) ? $data->banner_image_2 : ''}}">
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




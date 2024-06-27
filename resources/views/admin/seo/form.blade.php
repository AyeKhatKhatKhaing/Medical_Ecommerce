<div class="row">
    <div class="row mb-5">
        <div class="col-md-8">
            <h3 class="card-title">
                @if ($formMode == 'edit')
                    Edit Search Engine Optimization
                @else
                    Add New Search Engine Optimization
                @endif
            </h3>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="float-end">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card"></i> Save</button>
                    <a href="{{ url('/admin/seo-page') }}" title="Back"><button type="button"
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
                                <div class="form-group mb-5{{ $errors->has('meta_title_' . $attr) ? 'has-error' : '' }}">
                                    {!! Form::label('meta_title_' . $attr, 'Meta Title' . ' (' . $lngcode . ')', ['class' => 'form-label required']) !!}
                                    {!! Form::text(
                                        'meta_title_' . $attr,
                                        null,
                                        'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                    ) !!}
                                    {!! $errors->first('meta_title_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                </div>
                                <div class="form-group mb-5{{ $errors->has('url_' . $attr) ? 'has-error' : '' }}">
                                    {!! Form::label('url_' . $attr, 'URL' . ' (' . $lngcode . ')', ['class' => 'form-label required']) !!}
                                    {!! Form::text(
                                        'url_' . $attr,
                                        null,
                                        'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                    ) !!}
                                    {!! $errors->first('url_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                </div>
                                <div
                                    class="form-group mb-5{{ $errors->has('meta_description_' . $attr) ? 'has-error' : '' }}">
                                    {!! Form::label('meta_description_' . $attr, 'Meta Description' . ' (' . $lngcode . ')', [
                                        'class' => 'form-label required',
                                    ]) !!}
                                    {!! Form::textarea(
                                        'meta_description_' . $attr,
                                        null,
                                        'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                    ) !!}
                                    {!! $errors->first('meta_description_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                </div>
                                {{-- @if ($attr == 'tc')
                                    <div class="form-check mb-5 mt-5 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" name="is_translate"
                                            id="auto_translate" value="1">
                                        <label class="form-check-label ms-2" for="auto_translate">
                                            Auto translate to chinese
                                        </label>
                                    </div>
                                @endif --}}
                            </div>
                        @endforeach
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title required">Page Title</h3>
            </div>
            <div class="card-body">  
                    <select class="form-select" name="title" data-control="select2"
                        data-placeholder="Select an option" required>
                        <option value="">Select page title</option>
                        @if (count(config('mediq.page_title')) > 0)
                        @foreach (config('mediq.page_title') as $key => $item)
                        <option value="{{ $key }}"
                            {{ isset($seo) && $seo->title == $key ? 'selected' : '' }}>
                            {{ $item }}</option>
                        @endforeach
                        @endif
                    </select>     
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Images</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Image Size(200 x 200)px</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                        <div id="holder-icon5-img">
                            @if(!empty($seo->meta_image))
                                <div class='lfmimage-container icon5-imglfmc0'>
                                    <img src="{{ asset($seo->meta_image) }}" class='lfmimage w-100' style="height: 20rem;">
                                    <div>
                                        <button type="button" onclick="removeImage('icon5-img',0)" class='btn btn-sm btn-danger w-100'>Remove</button>
                                    </div>
                                </div>
                            @else
                                <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                            @endif
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="icon5-lfm-img" data-input="icon5-img" data-preview="holder-icon5-img" class="btn btn-primary text-white lfm-img">
                                    <i class="bi bi-image-fill me-2"></i>Select File
                                </a>
                            </span>
                            <input id="icon5-img" class="form-control" type="text" name="meta_image" value="{{isset($seo) ? $seo->meta_image : ''}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $('#lfm-img').filemanager('gallery');
    </script>
@endpush

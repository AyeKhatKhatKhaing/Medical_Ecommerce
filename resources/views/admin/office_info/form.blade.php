<div class="row">
    <div class="row mb-5">
        <div class="col-md-8">
            <h3 class="card-title">
                @if($formMode == "edit") Edit Page @else Add New Page @endif
            </h3>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="float-end">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card"></i> Save</button>
                    <a href="{{ url('admin/office-info') }}" title="Back"><button type="button" class="btn btn-secondary btn-sm cancel"><i class="bi bi-x" aria-hidden="true"></i> Cancel</button></a>
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
                                <div class="form-group mb-5{{ $errors->has('office_name_'.$attr) ? 'has-error' : ''}}">
                                    {!! Form::label('office_name_'.$attr, 'Name' . ' (' . $lngcode . ')', ['class' => 'form-label required']) !!}
                                    {!! Form::text('office_name_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                    {!! $errors->first('office_name_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                </div>

                                <div class="form-group mb-5{{ $errors->has('address_'.$attr) ? 'has-error' : ''}}">

                                    {!! Form::label('address_'.$attr, 'Address' . ' (' . $lngcode . ')', ['class' => 'form-label required']) !!}
                                    {!! Form::textarea('address_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                    {!! $errors->first('address_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                </div>

                               

                            @if($attr == 'tc')
                                    <div class="form-check mb-5 mt-5 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" {{isset($page->is_translate)&&$page->is_translate==1?'checked':''}} name="is_translate" id="auto_translate" value="1">
                                        <label class="form-check-label ms-2" for="auto_translate">
                                            Auto translate to chinese
                                        </label>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                        <div class="form-group mt-4{{ $errors->has('location') ? ' has-error' : '' }}">
                            <div class="list-title mb-3">
                                {!! Form::label('location', 'Google Map Location: ', ['class' => 'control-label required']) !!}
                            </div>
                            {!! Form::textarea('location', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('location', '<p class="help-block text-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group mt-4{{ $errors->has('image') ? ' has-error' : '' }}">
            <div class="card mb-4">
                <div class="card-header">
                    <p class="card-title fs-6">Office Images</p>
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
                                @if (isset($office_info->image))
                                    @foreach ($office_info->image as $key => $img)
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
                                <input id="thumbnail4" class="form-control" type="text" name="image[]"
                                    multiple="" readonly="">
                            </div>
                        </div>
                        <span>*Can upload multiple image</span>
    
                        {!! $errors->first('image', '<p class="help-block text-danger">:message</p>') !!}
    
                    </div>
                </div>
            </div>
    </div>

</div>
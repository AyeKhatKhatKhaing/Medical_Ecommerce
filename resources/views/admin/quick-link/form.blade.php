<div class="row">
    <div class="row mb-5">
        <div class="col-md-8">
            <h3 class="card-title">
                @if($formMode == "edit") Edit Quick Link @else Add New Quick Link @endif
            </h3>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="float-end">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card"></i> Save</button>
                    <a href="{{ url('admin/quick-link') }}" title="Back"><button type="button" class="btn btn-secondary btn-sm cancel"><i class="bi bi-x" aria-hidden="true"></i> Cancel</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="card-body content-body">
                    <div class="form-group mt-5 mb-5{{ $errors->has('link') ? 'has-error' : ''}}">
                        {!! Form::label('link', 'Link', ['class' => 'form-label mt-5 required']) !!}
                        {!! Form::text('link', null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                        {!! $errors->first('link', '<p class="help-block text-danger">:message</p>') !!}
                    </div>

                    <div class="form-group mt-5 mb-5{{ $errors->has('link_text') ? 'has-error' : ''}}">
                        {!! Form::label('link_text', 'Link Text', ['class' => 'form-label mt-5 required']) !!}
                        {!! Form::text('link_text', null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                        {!! $errors->first('link_text', '<p class="help-block text-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">

        <div class="card" id="image">
            <div class="card-header">
                <h3 class="card-title required">Image</h3>
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
                            @if(!empty($quicklink->img))
                                <div class='lfmimage-container imglfmc0'>
                                    <img src="{{ asset($quicklink->img) }}" class='lfmimage w-100' style="height: 20rem;">
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
                            <input id="img" class="form-control" type="text" name="img" value="{{isset($quicklink) ? $quicklink->img : ''}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>




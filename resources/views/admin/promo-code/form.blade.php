<div class="row">
    <div class="row mb-5">
        <div class="col-md-8">
            <h3 class="card-title">
            @if($formMode == "edit") Edit Promo Code @else Add New Promo Code @endif
            </h3>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="float-end">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card"></i> Save</button>
                    <a href="{{ url('admin/promo-code') }}" title="Back"><button type="button" class="btn btn-secondary btn-sm cancel"><i class="bi bi-x" aria-hidden="true"></i> Cancel</button></a>
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
                    <div class="form-group mb-5{{ $errors->has('code') ? 'has-error' : ''}}">
                        {!! Form::label('code', 'Code', ['class' => 'control-label mb-3 required']) !!}
                        {!! Form::text('code', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required', 'id'=>'coupon_gen'] : ['class' => 'form-control', 'id'=>'coupon_gen']) !!}
                        {!! $errors->first('code', '<p class="help-block text-danger">:message</p>') !!}
                    </div>
                    <div class="form-group mb-5{{ $errors->has('product_category_id') ? 'has-error' : ''}}">
                        {!! Form::label('product_category_id', 'Product Category', ['class' => 'control-label mb-3 required']) !!}
                        <select class="form-select" aria-label="Default select example" name="product_category_id">
                            <option selected>Open this select menu</option>
                            @foreach ($categories as $c)
                                <option value="{{ $c->id }}" {{ isset($promocode)&&$c->id==$promocode->product_category_id?'selected':'' }}>{{ $c->name_en }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('product_category_id', '<p class="help-block text-danger">:message</p>') !!}
                    </div>
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
                    <div class="tab-content">
                        @foreach (config('lng.attr') as $lngcode => $attr)
                        <div class="tab-pane mt-5 fade {{ $attr == 'en' ? 'active show' : '' }}"  id="{{ strtolower($lngcode) }}-tab">
                            <div class="form-group mb-5{{ $errors->has('name_'.$attr) ? 'has-error' : ''}}">
                                {!! Form::label('name_'.$attr, 'Name' . ' (' . $lngcode . ')', ['class' => 'form-label required']) !!}
                                {!! Form::text('name_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                {!! $errors->first('name_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                            <div class="form-group mb-5{{ $errors->has('description_'.$attr) ? 'has-error' : ''}}">
                                {!! Form::label('description_'.$attr, 'Description' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                {!! Form::textarea('description_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                {!! $errors->first('description_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                            <div class="form-group mb-5{{ $errors->has('terms_'.$attr) ? 'has-error' : ''}}">
                                {!! Form::label('terms_'.$attr, 'Terms and Conditions' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                {!! Form::textarea('terms_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                {!! $errors->first('terms_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                            @if($attr == 'tc')
                                <div class="form-check mb-5 mt-5 d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" {{isset($promocode->is_translate)&&$promocode->is_translate==1?'checked':''}} name="is_translate" id="auto_translate" value="1">
                                    <label class="form-check-label ms-2" for="auto_translate">
                                        Auto translate to chinese
                                    </label>
                                </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                    <p>
                        <div class="card shadow-sm">
                            <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse" data-bs-target="#kt_docs_card_collapsible">
                                <h5 class="card-title">Discount type</h5>
                                <div class="card-toolbar rotate-180">
                                    <i class="bi bi-chevron-up"></i>
                                </div>
                            </div>
                            <div id="kt_docs_card_collapsible" class="collapse show">
                                <div class="card-body">
                                    <div class="form-group mb-5{{ $errors->has('amount') ? 'has-error' : ''}}">
                                        {!! Form::label('amount', 'Amount', ['class' => 'control-label required']) !!}
                                        {!! Form::number('amount', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                        {!! $errors->first('amount', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-5{{ $errors->has('start_date') ? 'has-error' : ''}}">
                                                {!! Form::label('start_date', 'Start Date', ['class' => 'control-label required']) !!}
                                                {!! Form::date('start_date', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                                {!! $errors->first('start_date', '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-5{{ $errors->has('end_date') ? 'has-error' : ''}}">
                                                {!! Form::label('end_date', 'End Date', ['class' => 'control-label required']) !!}
                                                {!! Form::date('end_date', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                                {!! $errors->first('end_date', '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </p>
                    <p>
                        <div class="card shadow-sm">
                            <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse" data-bs-target="#kt_docs_card_collapsible1">
                                <h5 class="card-title">User Tag & Limit</h5>
                                <div class="card-toolbar rotate-180">
                                    <i class="bi bi-chevron-up"></i>
                                </div>
                            </div>
                            <div id="kt_docs_card_collapsible1" class="collapse show">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-5{{ $errors->has('user_limit') ? 'has-error' : ''}}">
                                                {!! Form::label('user_limit', 'USAGE LIMIT PER USER', ['class' => 'control-label required']) !!}
                                                {!! Form::number('user_limit', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                                {!! $errors->first('user_limit', '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-5{{ $errors->has('use_limit') ? 'has-error' : ''}}">
                                                {!! Form::label('use_limit', 'USAGE LIMIT PER CODE', ['class' => 'control-label required']) !!}
                                                {!! Form::number('use_limit', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                                                {!! $errors->first('use_limit', '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card mb-5">
            <div class="card-header">
                <h3 class="card-title">Icon</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Image Size</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                       <div id="holder-img">
                            @if(!empty($promocode->icon))
                                <div class='lfmimage-container imglfmc0'>
                                    <img src="{{ asset($promocode->icon) }}" class='lfmimage w-100' style="height: 20rem;">
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
                            <input id="img" class="form-control" type="text" name="icon" value="{{isset($promocode) ? $promocode->icon : ''}}">
                       </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="card mb-5">
            <div class="card-header">
                <div class="card-title">
                    <label for="Image" class="form-label">Status</label>
                </div>
            </div>

            <div class="card-body">
                <div class="mb-5">
                    <div class="form-group{{ $errors->has('is_published') ? 'has-error' : ''}}">
                        <label for="Image" class="form-label">Publish Status</label>
                        <select class="form-select" data-control="select2" data-placeholder="Select an option" data-hide-search="true">
                            <option></option>
                            <option value="1"  @if (isset($promocode->is_published) == 1) selected @endif>Publish</option>
                            <option value="0"  @if (isset($promocode->is_published) == 0) selected @endif>Draft</option>
                        </select>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>




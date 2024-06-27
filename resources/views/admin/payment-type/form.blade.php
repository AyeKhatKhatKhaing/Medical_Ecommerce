<div class="row">
    <div class="row mb-5">
        <div class="col-md-8">
            <h3 class="card-title">
                @if ($formMode == 'edit')
                    Edit Payment Type
                @else
                    Add New Payment Type
                @endif
            </h3>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="float-end">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card"></i> Save</button>
                    <a href="{{ url('/admin/payment-type') }}" title="Back"><button type="button"
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
            <div class="card-body">
                <div class="card-body content-body">
                    <div class="tab-content">
                        <div class="form-group mb-5{{ $errors->has('name') ? 'has-error' : '' }}">
                            {!! Form::label('name', 'Name', ['class' => 'control-label mb-3 required']) !!}
                            {{-- {!! Form::text(
                                'name',
                                null,
                                '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
                            ) !!} --}}
                            {!! Form::text(
                                'name',
                                null,
                                'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                            ) !!}
                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group mb-5{{ $errors->has('publishable_key') ? 'has-error' : '' }}">
                            {!! Form::label('publishable_key', 'Publishable Key', ['class' => 'control-label mb-3 required']) !!}
                            {!! Form::text(
                                'publishable_key',
                                null,
                                '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
                            ) !!}
                            {!! $errors->first('publishable_key', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group mb-5{{ $errors->has('secret_key') ? 'has-error' : '' }}">
                            {!! Form::label('secret_key', 'Secret Key', ['class' => 'control-label mb-3 required']) !!}
                            {!! Form::text(
                                'secret_key',
                                null,
                                '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
                            ) !!}
                            {!! $errors->first('secret_key', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group mb-5{{ $errors->has('api_signature') ? 'has-error' : '' }}">
                            {!! Form::label('api_signature', 'API Signature', ['class' => 'control-label mb-3']) !!}
                            {!! Form::text(
                                'api_signature',
                                null,
                                '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
                            ) !!}
                            {!! $errors->first('api_signature', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group mb-5{{ $errors->has('weight') ? 'has-error' : '' }}">
                            {!! Form::label('weight', 'Weight', ['class' => 'control-label mb-3']) !!}
                            {!! Form::text(
                                'weight',
                                null,
                                '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
                            ) !!}
                            {!! $errors->first('weight', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group mb-5{{ $errors->has('description') ? 'has-error' : '' }}">
                            {!! Form::label('description', 'Description', ['class' => 'control-label mb-3']) !!}
                            {!! Form::textarea(
                                'description',
                                null,
                                '' == 'required' ? ['class' => 'form-control editor'] : ['class' => 'form-control editor'],
                            ) !!}
                        </div>

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
                            @if (!empty($payment_type->image))
                                <div class='lfmimage-container imglfmc0'>
                                    <img src="{{ asset($payment_type->image) }}" class='lfmimage w-100'
                                        style="height: 20rem;">
                                    <div>
                                        <button type="button" onclick="removeImage('img',0)"
                                            class='btn btn-sm btn-danger w-100'>Remove</button>
                                    </div>
                                </div>
                            @else
                                <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                            @endif
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="lfm-img" data-input="img" data-preview="holder-img"
                                    class="btn btn-primary text-white lfm-img">
                                    <i class="bi bi-image-fill me-2"></i>Select File
                                </a>
                            </span>
                            <input id="img" class="form-control" type="text" name="image"
                                value="{{ isset($payemnt_type) ? $payment_type->img : '' }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="card mt-4 mb-5">
            <div class="card-header">
                <div class="card-title">
                    Status
                </div>
            </div>
            <div class="card-body">
                <div class="form-group mb-5{{ $errors->has('status') ? 'has-error' : '' }}">
                    <div class="mb-3">
                        {{ Form::radio('status', 1, true, ['class' => 'form-check-input me-2', 'id' => 'active']) }}
                        {{ Form::label('active', 'Active', ['class' => 'form-check-label me-3']) }}

                        {{ Form::radio('status', 0, '', ['class' => 'form-check-input me-2', 'id' => 'inactive']) }}
                        {{ Form::label('inactive', 'Inactive', ['class' => 'form-check-label me-3']) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-5">
            <div class="card-body">
                <div class="d-flex justify-content-between nopadding">
                    <label for="" style="font-size: 13px;">Developer Mode?</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="developer_status" id="developer_status"
                            @if (isset($payment_type) && $payment_type->developer_status == 1) checked @endif>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-5">
            <div class="card-body">
                <div class="d-flex justify-content-between nopadding">
                    <label for="" style="font-size: 13px;">Test Mode?</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="test_mode" id="test_mode"
                            @if (isset($payment_type) && $payment_type->test_mode == 1) checked @endif>
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

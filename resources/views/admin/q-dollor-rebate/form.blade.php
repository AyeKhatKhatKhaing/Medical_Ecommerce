<div class="row">
    <div class="row mb-5">
        <div class="col-md-8">
            <h3 class="card-title">
                @if($formMode == "edit") Edit QDollor Rebate @else Add New QDollor Rebate @endif
            </h3>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="float-end">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card"></i> Save</button>
                    <a href="{{ url('admin/q-dollor-rebate') }}" title="Back"><button class="btn btn-secondary btn-sm cancel"><i class="bi bi-x" aria-hidden="true"></i> Cancel</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">

                <ul class="nav nav-tabs bg-white">
                    @foreach (config('lng.lng') as $lngcode => $lng)
                    <li class="nav-item">
                        <a onclick="showHideDescription('{{ strtolower($lngcode) }}')" href="#{{ strtolower($lngcode) }}-tab" data-toggle="tab" class="nav-link {{ $lngcode == 'EN' ? 'active' : '' }} nav_link">
                            <span class="d-sm-none">{{ $lng }}</span>
                            <span class="d-sm-block d-none">{{ $lng }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
                <div class="card-body content-body">
                    <div class="tab-content">
                        @foreach (config('lng.attr') as $lngcode => $attr)
                        <div class="tab-pane fade {{ $attr == 'en' ? 'active show' : '' }}" id="{{ strtolower($lngcode) }}-tab">
                            <div class="mb-10"></div>
                            <div class="form-group col-md-6 mb-5{{ $errors->has('name_'.$attr) ? 'has-error' : ''}}">
                                {!! Form::label('name_'.$attr, 'Name'. ' ('.$lngcode.')', ['class' => 'control-label']) !!}
                                {!! Form::text('name_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                {!! $errors->first('name_'.$attr, '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        @endforeach
                        <div class="form-group col-md-6 mb-5{{ $errors->has('price') ? 'has-error' : ''}}">
                            {!! Form::label('price', 'Price', ['class' => 'control-label']) !!}
                            {!! Form::number('price', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                            {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group col-md-6 mb-5{{ $errors->has('discount_type') ? 'has-error' : ''}}">
                            <label for="discount_type">Discount Type</label>
                            <select class="form-select" name="discount_type" data-control="select2" data-placeholder="Select an option">
                                <option></option>
                                @if(count(config('mediq.coupon_discount_types')) > 0)
                                @foreach(config('mediq.coupon_discount_types') as $key => $item)
                                <option value="{{ $key}}" {{isset($qdollorRebate) && $qdollorRebate->discount_type ==  $key ? 'selected' : ''}}> {{$item}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
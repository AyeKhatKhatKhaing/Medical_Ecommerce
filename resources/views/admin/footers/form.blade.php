<div class="row">
    <div class="row mb-5">
        <div class="col-md-8">
            <h3 class="card-title">
                @if($formMode == "edit") Edit Footer @else Add New Footer @endif
            </h3>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="float-end">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card"></i> Save</button>
                    <a href="{{ url('admin/footers') }}" title="Back"><button type="button" class="btn btn-secondary btn-sm cancel"><i class="bi bi-x" aria-hidden="true"></i> Cancel</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
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
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-5{{ $errors->has('about_content_'.$attr) ? 'has-error' : ''}}">
                                            {!! Form::label('about_content_'.$attr, 'About Desktop Content' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                            {!! Form::textarea('about_content_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                            {!! $errors->first('about_content_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-5{{ $errors->has('about_content_mobile_'.$attr) ? 'has-error' : ''}}">
                                            {!! Form::label('about_content_mobile_'.$attr, 'About Mobile Content' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                            {!! Form::textarea('about_content_mobile_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                            {!! $errors->first('about_content_mobile_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-5{{ $errors->has('service_content_'.$attr) ? 'has-error' : ''}}">
                                            {!! Form::label('service_content_'.$attr, 'Customer Service Desktop Content' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                            {!! Form::textarea('service_content_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                            {!! $errors->first('service_content_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-5{{ $errors->has('service_content_mobile_'.$attr) ? 'has-error' : ''}}">
                                            {!! Form::label('service_content_mobile_'.$attr, 'Customer Service Mobile Content' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                            {!! Form::textarea('service_content_mobile_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                            {!! $errors->first('service_content_mobile_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-5{{ $errors->has('membership_content_'.$attr) ? 'has-error' : ''}}">
                                            {!! Form::label('membership_content_'.$attr, 'Membership Desktop Content' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                            {!! Form::textarea('membership_content_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                            {!! $errors->first('membership_content_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-5{{ $errors->has('membership_content_mobile_'.$attr) ? 'has-error' : ''}}">
                                            {!! Form::label('membership_content_mobile_'.$attr, 'Membership Mobile Content' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                            {!! Form::textarea('membership_content_mobile_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                            {!! $errors->first('membership_content_mobile_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    {{-- <div class="col-md-6"> --}}
                                        <div class="form-group mb-5{{ $errors->has('payment_content_'.$attr) ? 'has-error' : ''}}">
                                            {!! Form::label('payment_content_'.$attr, 'Payment Channels Desktop' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                            {!! Form::textarea('payment_content_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                            {!! $errors->first('payment_content_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                        </div>
                                    {{-- </div> --}}
                                    {{-- <div class="col-md-6">
                                        <div class="form-group mb-5{{ $errors->has('payment_content_mobile_'.$attr) ? 'has-error' : ''}}">
                                            {!! Form::label('payment_content_mobile_'.$attr, 'Payment Channels Mobile' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                            {!! Form::textarea('payment_content_mobile_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                            {!! $errors->first('payment_content_mobile_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                        </div>
                                    </div> --}}
                                </div>
                                
                                <div class="form-group mb-5{{ $errors->has('transaction_content_'.$attr) ? 'has-error' : ''}}">
                                    {!! Form::label('transaction_content_'.$attr, 'Easy Transaction Content' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                    {!! Form::textarea('transaction_content_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                    {!! $errors->first('transaction_content_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                </div>
                                <div class="form-group mb-5{{ $errors->has('content_'.$attr) ? 'has-error' : ''}}">
                                    {!! Form::label('content_'.$attr, 'Content' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                    {!! Form::textarea('content_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                    {!! $errors->first('content_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                </div>


                                @if($attr == 'tc')
                                    <div class="form-check mb-5 mt-5 d-flex align-items-center">
                                        <input class="form-check-input"  type="checkbox" {{isset($footer->is_translate)&&$footer->is_translate==1?'checked':''}} name="is_translate" id="auto_translate" value="1">
                                        <label class="form-check-label ms-2" for="auto_translate">
                                            Auto translate to chinese
                                        </label>
                                    </div>
                                @endif
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>







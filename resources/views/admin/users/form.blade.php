<div class="row">
    <div class="row mb-5">
        <div class="col-md-8">
            <h3 class="card-title">
            @if($formMode == "edit") Edit {{ Str::upper($user_type) }} @else Add New {{ Str::upper($user_type) }} @endif
            </h3>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="float-end">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card"></i> Save</button>
                    <a href="{{ route('users.list',$user_type) }}" title="Back"><button type="button" class="btn btn-secondary btn-sm cancel"><i class="bi bi-x" aria-hidden="true"></i> Cancel</button></a>
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
                    <div class="form-group mt-4{{ $errors->has('name_en') ? ' has-error' : ''}}">
                        <div class="list-title mb-3">
                            {!! Form::label('name_en', 'Name: ', ['class' => 'control-label']) !!}
                        </div>
                        {!! Form::text('name_en', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('name_en', '<p class="help-block text-danger">:message</p>') !!}
                    </div>
                    <div class="form-group mt-4{{ $errors->has('email') ? ' has-error' : ''}}">
                        <div class="list-title mb-3">
                            {!! Form::label('email', 'Email: ', ['class' => 'control-label']) !!}
                        </div>
                        {!! Form::email('email', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('email', '<p class="help-block text-danger">:message</p>') !!}
                    </div>
                    <div class="form-group mt-4{{ $errors->has('phone') ? ' has-error' : ''}}">
                        <div class="list-title mb-3">
                            {!! Form::label('phone', 'Phone: ', ['class' => 'control-label']) !!}
                        </div>
                        {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('phone', '<p class="help-block text-danger">:message</p>') !!}
                    </div>
                    <div class="form-group mt-4{{ $errors->has('password') ? ' has-error' : ''}}">
                        <div class="list-title mb-3">
                            {!! Form::label('password', 'Password: ', ['class' => 'control-label']) !!}
                        </div>
                        @php
                            $passwordOptions = ['class' => 'form-control'];
                            if ($formMode === 'create') {
                                $passwordOptions = array_merge($passwordOptions, ['required' => 'required']);
                            }
                        @endphp
                        {!! Form::password('password', $passwordOptions) !!}
                        {!! $errors->first('password', '<p class="help-block text-danger">:message</p>') !!}
                    </div>
                    <input type="hidden" class="form-control"  value="{{ $user_type }}" name="user_type">
                    <input type="hidden" class="form-control" name="is_merchant">
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('roles') ? ' has-error' : ''}}">
                                <div class="list-title mb-3">
                                    {!! Form::label('role', 'Role: ', ['class' => 'control-label']) !!}
                                </div>
                                {!! Form::select('roles[]', $roles, isset($user_roles) ? $user_roles : [], ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                   
                    {{-- <div class="form-group mt-4{{ $errors->has('roles') ? ' has-error' : ''}}">
                        {!! Form::label('role', "Role :" , ['class' => 'control-label mb-3']) !!}<br>
                        {!! Form::text('role', $user_type, ['class' => 'form-control','disabled']) !!}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>


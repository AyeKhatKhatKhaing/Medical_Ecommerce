<div class="row">
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
            <div class="list-title mb-3">
                {!! Form::label('name', 'Name: ', ['class' => 'control-label']) !!}
            </div>
            {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('label') ? ' has-error' : ''}}">
            <div class="list-title mb-3">
                {!! Form::label('label', 'Label: ', ['class' => 'control-label']) !!}
            </div>
            {!! Form::text('label', null, ['class' => 'form-control']) !!}
            {!! $errors->first('label', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-12">
        <div class="form-group">
            <div class="form-group">
                <div class="float-left">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-save"></i>
                        Save</button>
                    <button type="button" class="btn btn-secondary btn-sm cancel" onclick="window.location='{{ url('/admin/permissions')}}'"><i class="bi bi-x"
                            aria-hidden="true"></i> Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="row mb-5">
        <div class="col-md-8">
            <h3 class="card-title">
                @if ($formMode == 'edit')
                    Edit Check Up Group
                @else
                    Add New Check Up Group
                @endif
            </h3>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="float-end">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card"></i> Save</button>
                    <a href="{{ url('admin/check-up-group') }}" title="Back"><button type="button"
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
                                <div class="form-group mb-5{{ $errors->has('name_' . $attr) ? 'has-error' : '' }}">
                                    {!! Form::label('name_' . $attr, 'Name' . ' (' . $lngcode . ')', ['class' => 'form-label required mb-3']) !!}
                                    {!! Form::text(
                                        'name_' . $attr,
                                        null,
                                        'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                    ) !!}
                                    {!! $errors->first('name_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                </div>
                                <div
                                    class="form-group mb-5{{ $errors->has('description_' . $attr) ? 'has-error' : '' }}">
                                    {!! Form::label('description_' . $attr, 'Description' . ' (' . $lngcode . ')', ['class' => 'form-label mb-3']) !!}
                                    {!! Form::textarea(
                                        'description_' . $attr,
                                        null,
                                        'required' == 'required' ? ['class' => 'form-control editor'] : ['class' => 'form-control editor'],
                                    ) !!}
                                    {!! $errors->first('description_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                </div>
                                @if ($attr == 'tc')
                                    <div class="form-check mb-5 mt-5 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox"
                                            {{ isset($checkupgroup->is_translate) && $checkupgroup->is_translate == 1 ? 'checked' : '' }}
                                            name="auto_translate" id="auto_translate" value="1">
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
    <div class="col-md-4">
        {{-- <div class="card">
            <div class="card-header">
                <div class="card-title">
                    {!! Form::label('check_up_item_id', 'Check Up Item', ['class' => 'control-label']) !!}
                </div>
            </div>
            <div class="card-body">
                <div class="form-group mb-5{{ $errors->has('check_items') ? 'has-error' : ''}}">
                    <div class="form-check mb-4 mt-1">
                        <input class="form-check-input" type="checkbox" id="select-all">
                        <label class="form-check-label" for="selectall">All</label>
                    </div>
                        @foreach ($checkupitem as $key => $data)
                            <div class="form-check mb-4">
                                @if ($formMode === 'edit')
                                    <input class="form-check-input check" type="checkbox" name="check_items[]" value="{{ $key }}" {{ in_array($data, $checkupgroup->checkUpItems->pluck('name_en')->toArray() ) ? 'checked' : '' }}>
                                @else
                                    <input class="form-check-input check" type="checkbox" name="check_items[]" value="{{ $key }}">
                                @endif
                                <label class="form-check-label" for="checkUpItem">
                                    {{ $data }}
                                </label>
                            </div>
                        @endforeach
                    {!! $errors->first('check_items', '<p class="help-block text-danger">:message</p>') !!}
                </div>
            </div>
        </div> --}}
        <div class="card mt-4">
            <div class="card-header">
                <div class="card-title">
                    {!! Form::label('minimum_item', 'Maximum Number of Optional Item', ['class' => 'control-label']) !!}
                </div>
            </div>
            <div class="card-body">
                <div class="form-group mb-5{{ $errors->has('minimum_item') ? 'has-error' : '' }}">
                    <input type="number" name="minimum_item" value="{{isset($checkupgroup) ? $checkupgroup->minimum_item : 0}}" required class="form-control">
                </div>
            </div>
        </div>
        {{-- @php 
        $is_checked = 'checked' ;
        if(isset($checkupgroup)){
            $is_checked = $checkupgroup->is_published == 1 ? 'checked' : '';
        }
        @endphp
        <div class="card mt-4">
            <div class="card-body">
                <div class="d-flex justify-content-between nopadding">
                    <label for="" style="font-size: 13px;">IS PUBLISHED?</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" value="{{isset($checkupgroup) ? $checkupgroup->is_published : 1 }}" name="is_published" id="is_published"
                        {{$is_checked}}>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>

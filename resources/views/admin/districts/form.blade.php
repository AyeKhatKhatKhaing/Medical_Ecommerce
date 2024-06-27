<div class="row">
    <div class="row mb-5">
        <div class="col-md-8">
            <h3 class="card-title">
                @if($formMode == "edit") Edit District @else Add New District @endif
            </h3>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="float-end">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card"></i> Save</button>
                    <a href="{{ url('admin/districts') }}" title="Back"><button type="button" class="btn btn-secondary btn-sm cancel"><i class="bi bi-x" aria-hidden="true"></i> Cancel</button></a>
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
                                <div class="form-group mb-5{{ $errors->has('name_'.$attr) ? 'has-error' : ''}}">
                                    {!! Form::label('name_'.$attr, 'Name' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                    {!! Form::text('name_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                    {!! $errors->first('name_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                </div>
                                {{-- @if($attr=='en')
                                    <label for="" class="">Territory</label>
                                    <select class="form-select mb-5" aria-label="Default select example" name="territory_id">

                                        <option selected>Select Territory</option>
                                        @foreach($territories as $i => $p)

                                            <option value="{{$p->id}}" {{(isset($district)&&$district->territory_id==$p->id) ? 'selected' : ''}}>{{$p->name_en}}</option>
                                        @endforeach
                                    </select>
                                @endif --}}
                                @if($attr == 'tc')
                                    <div class="form-check mb-5 mt-5 d-flex align-items-center">
                                        <input class="form-check-input" {{isset($district->is_translate)&&$district->is_translate==1?'checked':''}} type="checkbox" name="is_translate" id="auto_translate" value="1">
                                        <label class="form-check-label ms-2" for="auto_translate">
                                            Auto translate to chinese
                                        </label>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                        {!! Form::label('territory', 'Territory', ['class' => 'form-label']) !!}
                        {!! Form::select('territory_id', $territories, null , ['class' => 'form-select form-select-solid', 'data-control' => 'select2', 'data-hide-search' => "true", 'data-placeholder' => "Select Territory", 'placeholder' => "Select Territory", "data-kt-ecommerce-product-filter" => "territory_id"]) !!}
                        {!! $errors->first('territory_id', '<p class="help-block text-danger">:message</p>') !!}
                        {{-- <select class="form-select mb-5" aria-label="Default select example" name="territory_id">

                            <option selected>Select Territory</option>
                            @foreach($territories as $i => $p)

                                <option value="{{$p->id}}" {{(isset($district)&&$district->territory_id==$p->id) ? 'selected' : ''}}>{{$p->name_en}}</option>
                            @endforeach
                        </select> --}}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>







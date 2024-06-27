<div class="row">
    <div class="row mb-5">
        <div class="col-md-8">
            <h3 class="card-title">
                @if($formMode == "edit") Edit Package @else Add New Package @endif
            </h3>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="float-end">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card"></i> Save</button>
                    <a href="{{ url('admin/packages') }}" title="Back"><button type="button" class="btn btn-secondary btn-sm cancel"><i class="bi bi-x" aria-hidden="true"></i> Cancel</button></a>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
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
                            <div class="form-group mb-5{{ $errors->has('name_'.$attr) ? 'has-error' : ''}}">
                                {!! Form::label('name_'.$attr, 'Name' . ' (' . $lngcode . ')', ['class' => 'form-label required']) !!}
                                {!! Form::text('name_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                {!! $errors->first('name_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                            <div class="form-group mb-5{{ $errors->has('content_'.$attr) ? 'has-error' : ''}}">
                                {!! Form::label('content_'.$attr, 'Content' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                {!! Form::textarea('content_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                {!! $errors->first('content_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                            @if($attr == 'tc')
                            <div class="form-check mb-5 mt-5 d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" {{isset($package->is_translate)&&$package->is_translate==1?'checked':''}} name="is_translate" id="auto_translate" value="1">
                                <label class="form-check-label ms-2" for="auto_translate">
                                    Auto translate to chinese
                                </label>

                            </div>
                            @endif
                            @if($attr == 'en')
                            <h3>Is Table?</h3>
                            <div class="form-group">
                                <div class="form-check mb-5">
                                    <input type="radio" name="is_table" class="form-check-input t_radio " {{ isset($package->is_table) && $package->is_table == 0 ? 'checked':''}} {{  $formMode == 'create' ? 'checked' : '' }}
                                        style="margin-top: 0;"
                                            value="0" /> Table</div>
                                <div class="form-check mb-5">
                                    <input type="radio" name="is_table" class="form-check-input t_radio" {{ isset($package->is_table) && $package->is_table == 1 ? 'checked':'' }}
                                    style="margin-top: 0;"
                                        value="1" /> Card</div>

                            </div>
                            @endif
                            <div class="form-group mb-5{{ $errors->has('card_name_'.$attr) ? 'has-error' : ''}} card_name" hidden>
                                {!! Form::label('card_name_'.$attr, 'Card Name' . ' (' . $lngcode . ')', ['class' => 'form-label required']) !!}
                                {!! Form::text('card_name_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                {!! $errors->first('card_name_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                        </div>
                        @endforeach
                        <br>
                        <div id="plan_details">
                            <div id="tableHeader">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h3>Table Headers</h3>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="button" class="btn btn-primary float-md-end" @click="addHeader()"><i class="bi bi-plus" aria-hidden="true"></i></button>
                                    </div>
                                </div><br>
    
                                <div class="card shadow-sm mb-5" v-for="(header,pindex) in tableHeaders" :key="pindex">
                                    <div :id="'kt_docs_card_collapsible'+pindex" class="collapse show">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                </div>
                                                <div class="col-md-6">
                                                    <button v-if="pindex > 0" type="button" @click="removeHeader(pindex)" class="btn btn-sm-light btn-color-danger" style="float:right">X</button>
                                                </div>
                                            </div>
    
                                            <div class="row g-2">
                                                <div class="col-md-4 form-group mb-5">
                                                    <label for="header_en">Name (EN)</label>
                                                    <input type="text" v-model="header.header_en" v-bind:name="inputName(pindex, 'header_en')" class="form-control">
                                                </div>
                                                <div class="col-md-4 form-group mb-5">
                                                    <label for="header_tc">Name (TC)</label>
                                                    <input type="text" v-model="header.header_tc" v-bind:name="inputName(pindex, 'header_tc')" class="form-control">
                                                </div>
                                                <div class="col-md-4 form-group mb-5">
                                                    <label for="header_sc">Name (SC)</label>
                                                    <input type="text" v-model="header.header_sc" v-bind:name="inputName(pindex, 'header_sc')" class="form-control">
                                                </div>
                                            </div>
    
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tableTitle">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h3>Table Title</h3>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="button" class="btn btn-primary float-md-end" @click="addTitle()"><i class="bi bi-plus" aria-hidden="true"></i></button>
                                    </div>
                                </div><br>
    
                                <div class="card shadow-sm mb-5" v-for="(title,tindex) in tableTitles" :key="tindex">
                                    <div :id="'kt_docs_card_collapsible'+tindex" class="collapse show">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                </div>
                                                <div class="col-md-6">
                                                    <button v-if="tindex > 0" type="button" @click="removeTitle(tindex)" class="btn btn-sm-light btn-color-danger" style="float:right">X</button>
                                                </div>
                                            </div>
    
                                            <div class="row g-2">
                                                <div class="col-md-4 form-group mb-5">
                                                    <label for="title_en">Title (EN)</label>
                                                    <input type="text" v-model="title.title_en" v-bind:name="tinputName(tindex, 'title_en')" class="form-control">
                                                </div>
                                                <div class="col-md-4 form-group mb-5">
                                                    <label for="title_tc">Title (TC)</label>
                                                    <input type="text" v-model="title.title_tc" v-bind:name="tinputName(tindex, 'title_tc')" class="form-control">
                                                </div>
                                                <div class="col-md-4 form-group mb-5">
                                                    <label for="title_sc">Title (SC)</label>
                                                    <input type="text" v-model="title.title_sc" v-bind:name="tinputName(tindex, 'title_sc')" class="form-control">
                                                </div>
                                            </div><br>
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <h5>Add Columns</h5>
                                                </div>
                                                <div class="col-md-3">
                                                    <button type="button" class="btn btn-outline btn-outline-dashed btn-outline-dark btn-active-light-dark float-md-end" 
                                                    @click="addColumn(tindex)"><i class="bi bi-plus" aria-hidden="true"></i></button>
                                                </div>
                                            </div><br>
                                            <div v-for="(column,cindex) in title.tableColumns" :key="cindex">
                                                <div class="row">
                                                    <div class="col-md-4 form-group mb-5">
                                                        <label for="col_name_en">Column (EN)</label>
                                                        <input type="text" v-model="column.col_name_en" v-bind:name="cinputName( tindex, cindex, 'col_name_en' )" class="form-control">
                                                    </div>
                                                    <div class="col-md-4 form-group mb-5">
                                                        <label for="col_name_tc">Column (TC)</label>
                                                        <input type="text" v-model="column.col_name_tc" v-bind:name="cinputName( tindex, cindex, 'col_name_tc' )" class="form-control">
                                                    </div>
                                                    <div class="col-md-3 form-group mb-5">
                                                        <label for="col_name_sc">Column (SC)</label>
                                                        <input type="text" v-model="column.col_name_sc" v-bind:name="cinputName( tindex, cindex, 'col_name_sc' )" class="form-control">
                                                    </div>
                                                    <div class="col-md-1 form-group mb-5">
                                                        <button type="button" @click="removeColumn(cindex,tindex)" class="btn btn-sm-light btn-color-danger" style="float:right">X</button>
                                                    </div>
                                                </div>
                                            </div>
    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card mb-5 mt-4">
            <div class="card-header">
                <h3 class="card-title">Check Up Tables</h3>
            </div>
            <div class="card-body">
                <select class="form-select check_up_table" data-control="select2" data-placeholder="Select an option" name="check_up_table_id">

                    <option value="">Select</option> 
                    @if(count($checkUpTables) > 0)
                    @foreach($checkUpTables as $item)
                    
                    <option value="{{$item->id}}" {{isset($package) && $item->id == $package->check_up_table_id ? 'selected' : ''}}>{{$item->name_en}}</option>
                    @endforeach
                    @endif
                </select>
            </div>
        </div>
        <div class="card mb-5">
            <div class="card-header">
                <h3 class="card-title required">Merchant</h3>
            </div>
            <div class="card-body">
                {{-- <select class="form-select mb-5 merchant_id" name="merchant_id" onChange="merchant()" data-control="select2" data-placeholder="Select an option">
                    <option>Select</option>
                    @if(count($merchants) > 0)
                    @foreach($merchants as $item)
                    <option value="{{$item->id}}" {{isset($package) && $item->id == $package->merchant_id ? 'selected' : ''}}>{{$item->name_en}}</option>
                    @endforeach
                    @endif
                </select> --}}
                <select class="form-select merchant merchant_id" data-control="select2" data-placeholder="Select an option" name="merchant_id" >
                    {{-- <option>Select</option> --}}
                    @if(count($merchants) > 0)
                    @foreach($merchants as $item)
                    <option value="{{$item->id}}" {{isset($package) && $item->id == $package->merchant_id ? 'selected' : ''}}>{{$item->name_en}}</option>
                    @endforeach
                    @endif
                </select>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-header">
                <div class="card-title">
                    {!! Form::label('sku', 'SKU', ['class' => 'control-label']) !!}
                </div>
            </div>
            <div class="card-body">
                <div class="form-group mb-5{{ $errors->has('sku') ? 'has-error' : ''}}">
                    {{-- {!! Form::label('sku', 'SKU', ['class' => 'control-label']) !!} --}}
                    {!! Form::text('sku', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                    {!! $errors->first('sku', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-header">
                <div class="card-title">
                    {!! Form::label('number_of_item', 'Number Of Item', ['class' => 'control-label']) !!}
                </div>
            </div>
            <div class="card-body">
                <div class="form-group mb-5{{ $errors->has('number_of_item') ? 'has-error' : ''}}">
                    {!! Form::number('number_of_item', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                    {!! $errors->first('number_of_item', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>

        <!-- <div class="card mb-5 mt-4">
            <div class="card-body">
                <div class="row">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label" style="color: #8F939B;"> Image (410px*450px)</label>
                    <div class="card">
                        <div class="image-input image-input-empty image-input-outline mb-3">
                            <div id="holder-category-image" class="image-input-wrapper" style="width: 100%; height: 200px;">
                                @if(isset($package->img))
                                <img src="{{ asset($package->img) }}" class="image-input-wrapper" style="width: 100%;" alt="">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="cat-image" data-input="category-image" data-preview="holder-category-image" class="btn btn-primary text-white lfm-img">
                                Select File
                            </a>
                        </span>
                        <input id="category-image" value="{{ isset($package->img) ? $package->img : '' }}" class="form-control" type="text" name="img">
                    </div>
                </div>
            </div>
        </div> -->

        <div class="card mt-5">
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Image (410px*450px)</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                        <div id="holder-img">
                            @if(isset($package->img))
                            <div class='lfmimage-container featured_imglfmc0'>
                                <img src="{{ asset($package->img) }}" class="image-input-wrapper" style="width: 100%;" alt="">
                            </div>
                            @else
                            <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                            @endif
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="lfm-img" data-input="category-image" data-preview="holder-img" class="btn btn-primary text-white lfm-img">
                                    <i class="bi bi-image-fill me-2"></i>Select File
                                </a>
                            </span>
                            <input id="category-image" value="{{ isset($package->img) ? $package->img : '' }}" class="form-control" type="text" name="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="card mt-4">
            <div class="card-body">
                <div class="d-flex justify-content-between nopadding">
                    <label for="" style="font-size: 13px;">IS PUBLISHED?</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="is_published" id="is_published" @if(isset($package) && $package->is_published == '1') checked @endif>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>
@push('scripts')
<script>
    $('.t_radio').click(function(){
        let val =$('input[name="is_table"]:checked').val();
        if(val == 1){
            $('.card_name').prop('hidden',false)
            $('#tableHeader').prop('hidden',true)
        }else{
            $('.card_name').prop('hidden',true)
            $('#tableHeader').prop('hidden',false)
        }
    })

    $(document).ready(function() {
        $('.merchant').select2();
        $('.check_up_table').select2();
    });
</script>
@endpush
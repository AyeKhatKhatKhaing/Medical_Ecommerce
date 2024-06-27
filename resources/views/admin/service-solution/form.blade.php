<div class="row">
    <div class="row mb-5">
        <div class="col-md-8">
            <h3 class="card-title">
                @if($formMode == "edit") Edit Service Solution @else Add New Service Solution @endif
            </h3>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="float-end">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card"></i> Save</button>
                    <a href="{{ url('/admin/service-solution') }}" title="Back"><button type="button" class="btn btn-secondary btn-sm cancel"><i class="bi bi-x" aria-hidden="true"></i> Cancel</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-8">
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
                    <div class="tab-content getNewCheckingItem" id="getNewCheckingItem">

                        @foreach (config('lng.attr') as $lngcode => $attr)

                        <input type="hidden" name="attr" value="{{ $attr }}">
                            <div class="tab-pane fade {{ $attr == 'en' ? 'active show' : '' }}"  id="{{ strtolower($lngcode) }}-tab">
                                <div class="form-group mb-5{{ $errors->has('main_title_'.$attr) ? 'has-error' : ''}}">
                                    {!! Form::label('main_title_'.$attr, 'Main Title' . ' (' . $lngcode . ')', ['class' => 'form-label required']) !!}
                                    {!! Form::text('main_title_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control limit'] : ['class' => 'form-control limit']) !!}
                                    {!! $errors->first('main_title_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                </div>
                                <div class="form-group mb-5{{ $errors->has('main_sub_title_'.$attr) ? 'has-error' : ''}}">
                                    {!! Form::label('main_sub_title_'.$attr, 'Main Sub Title' . ' (' . $lngcode . ')', ['class' => 'form-label required']) !!}
                                    {!! Form::text('main_sub_title_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control limit'] : ['class' => 'form-control limit']) !!}
                                    {!! $errors->first('main_sub_title_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                </div>
                                <div class="form-group mb-5{{ $errors->has('title_'.$attr) ? 'has-error' : ''}}">
                                    {!! Form::label('title_'.$attr, 'Title' . ' (' . $lngcode . ')', ['class' => 'form-label required']) !!}
                                    {!! Form::text('title_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control limit'] : ['class' => 'form-control limit']) !!}
                                    {!! $errors->first('title_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                </div>
                                <div class="form-group mb-5{{ $errors->has('sub_title_'.$attr) ? 'has-error' : ''}}">
                                    {!! Form::label('sub_title_'.$attr, 'Sub Title' . ' (' . $lngcode . ')', ['class' => 'form-label required']) !!}
                                    {!! Form::text('sub_title_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control limit'] : ['class' => 'form-control limit']) !!}
                                    {!! $errors->first('sub_title_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                </div>
                                <div class="form-group mb-5{{ $errors->has('description_'.$attr) ? 'has-error' : ''}}">
                                    {!! Form::label('description_'.$attr, 'Description' . ' (' . $lngcode . ')', ['class' => 'form-label required']) !!}
                                    {!! Form::textarea('description_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control limit editor'] : ['class' => 'form-control limit editor']) !!}
                                    {!! $errors->first('description_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                </div>

                                
                                @if($attr == 'tc')
                                    <div class="form-check mb-5 mt-5 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" name="is_translate" id="auto_translate" value="1" {{isset($servicesolution->is_translate)&&$servicesolution->is_translate==1?'checked':''}}>
                                        <label class="form-check-label ms-2" for="auto_translate">
                                            Auto translate to chinese
                                        </label>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                        <div class="row mt-4">
                            <div class="col-md-8 mb-5">
                                <h3>Checking Items</h3>
                            </div>
                            <div class="col-md-4 text-end">
                                <button data-attr="{{ $attr }}" type="button" class="addNewCheckingItem btn btn-success" style="width:30px;height:30px; padding-top: 5px; padding-left: 10px;">+</button>
                            </div>
                        </div>
                        <input type="hidden" name="checking_item_row" id="checking_item-row">
                        @if($formMode=='edit')
                            @foreach($checkingitem as $key => $detail)
                                @php $index=$key @endphp
                                @include('admin.service-solution.checking_item_form')
                                
                            @endforeach
                        @else
                            @php $index=0 @endphp
                            
                            @include('admin.service-solution.checking_item_form')

                        @endif
                        <input type="hidden" name="index" id="index" value="{{ $index }}">

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
                            @if(!empty($servicesolution->img))
                                <div class='lfmimage-container imglfmc0'>
                                    <img src="{{ asset($servicesolution->img) }}" class='lfmimage w-100' style="height: 20rem;">
                                    <div>
                                        <button type="button" onclick="removeImage(title_,0)" class='btn btn-sm btn-danger w-100'>Remove</button>
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
                            <input id="img" class="form-control" type="text" name="img" value="{{isset($servicesolution) ? $servicesolution->img : ''}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-header">
                <h3 class="card-title">Title Image</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Image Size( 1000 x 535 )px</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                        <div id="holder-title_img">
                            @if(!empty($servicesolution->title_img))
                                <div class='lfmimage-container title_imglfmc0'>
                                    <img src="{{ asset($servicesolution->title_img) }}" class='lfmimage w-100' style="height: 20rem;">
                                    <div>
                                        <button type="button" onclick="removeImage('title_img',0)" class='btn btn-sm btn-danger w-100'>Remove</button>
                                    </div>
                                </div>
                            @else
                                <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                            @endif
                        </div>
                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="lfm-title_img" data-input="title_img" data-preview="holder-title_img" class="btn btn-primary text-white lfm-img">
                                    <i class="bi bi-image-fill me-2"></i>Select File
                                </a>
                            </span>
                            <input id="title_img" class="form-control" type="text" name="title_img" value="{{isset($servicesolution) ? $servicesolution->title_img : ''}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(document).ready(() => {
            $('.form-select-tag').select2()

            var index = parseInt($(".indices:last").data("id"));
            $('.addNewCheckingItem').on('click', function() {

                index += 1;
                $('#index').val(index);
                var attr  = $(this).data('attr');
                $.ajax({
                    type: "POST",
                    url: "{{ url('admin/get-checking-item-form') }}",
                    data: {"_token": "{{ csrf_token() }}",
                            attr:attr,
                            index:index
                    },
                    datatype: 'json',
                    success: function (json) {

                        $('#getNewCheckingItem').append(json[0]);

                        tinymce.init(editor_config)
                        $('.form-select-tag').select2()
                        
                    }
                });
    
            })

            //for checking_item selection
            for (let i=0;i<100;i++)
            {
                $(document).on('click',`.removeNewCheckingItemBtn${i}`,function (){
                    $(`.inputVariationsRow${i}`).remove()
                })
            }

        })
    </script>
@endpush

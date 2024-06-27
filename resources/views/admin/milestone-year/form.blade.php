<div class="row">
    <div class="row mb-5">
        <div class="col-md-8">
            <h3 class="card-title">
                @if($formMode == "edit") Edit Milestone Year @else Add New Milestone Year @endif
            </h3>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="float-end">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card"></i> Save</button>
                    <a href="{{ url('/admin/milestone-year') }}" title="Back"><button type="button" class="btn btn-secondary btn-sm cancel"><i class="bi bi-x" aria-hidden="true"></i> Cancel</button></a>
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
                    <div class="tab-content">
                        <div class="form-group mb-5{{ $errors->has('year') ? 'has-error' : ''}}">
                            {!! Form::label('year', 'Year', ['class' => 'form-label required']) !!}
                            {!! Form::text('year', null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                            {!! $errors->first('year', '<p class="help-block text-danger">:message</p>') !!}
                        </div>
                        @foreach (config('lng.attr') as $lngcode => $attr)
                        <input type="hidden" name="attr" value="{{ $attr }}">
                            <div class="tab-pane fade {{ $attr == 'en' ? 'active show' : '' }}"  id="{{ strtolower($lngcode) }}-tab">
                                <div class="row mt-4">
                                    <div class="col-md-8">
                                        <h3>Months</h3>
                                    </div>
                                    <div class="col-md-4 text-end">
                                        <button data-attr="{{ $attr }}" type="button" class="addNewMonth btn btn-success" style="width:30px;height:30px; padding-top: 5px; padding-left: 10px;">+</button>
                                    </div>
                                </div>
                                <input type="hidden" name="month_row" id="month-row">
                            @if($formMode=='edit')
                                    @foreach($milestonedetail as $key => $detail)
                                        @php $index=$key @endphp
                                        @include('admin.milestone-year.month_form')
                                    @endforeach
                                @else
                                    @php $index=0 @endphp
                                    @include('admin.milestone-year.month_form')
                                @endif
                                <div id="{{ $attr }}_getNewMonthRow" class="getNewMonthRow"></div>
                                @if($attr == 'tc')
                                    <div class="form-check mb-5 mt-5 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" name="is_translate" id="auto_translate" value="1" {{isset($milestoneyear->is_translate)&&$milestoneyear->is_translate==1?'checked':''}}>
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
                            @if(!empty($milestoneyear->img))
                                <div class='lfmimage-container imglfmc0'>
                                    <img src="{{ asset($milestoneyear->img) }}" class='lfmimage w-100' style="height: 20rem;">
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
                            <input id="img" class="form-control" type="text" name="img" value="{{isset($milestoneyear) ? $milestoneyear->img : ''}}">
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
            var index = parseInt($(".month:last").attr("data-index"));

            $('.addNewMonth').on('click', function() {
                index += 1;
                var row   = localStorage.getItem('monthsRow');
                    row++;

                localStorage.setItem('monthsRow', row);
                var attr  = $(this).data('attr');
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.get-month-form') }}",
                    data: {"_token": "{{ csrf_token() }}",
                            attr:attr,
                            index:index
                    },
                    datatype: 'json',
                    success: function (json) {
                        console.log(json)

                        $('#en_getNewMonthRow').append(json[0]);
                        $('#tc_getNewMonthRow').append(json[1]);
                        $('#sc_getNewMonthRow').append(json[2]);

                        tinymce.init(editor_config)

                    }
                });

            })

            //for month selection
            for (let i=0;i<100;i++)
            {
                $(document).on('change',`.month${i}`,function (){
                    var selected_month = $(this).find(":selected").val();
                    console.log(selected_month)
                    $(`.month${i} option[value=${selected_month}]`).attr('selected','selected');
                })

                $(document).on('click',`.removeNewMonthBtn${i}`,function (){
                    // $(this).closest('.inputVariationsRow').remove();
                    $(`.inputVariationsRow${i}`).remove()
                })
            }

        })
    </script>
@endpush






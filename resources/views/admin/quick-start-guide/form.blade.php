<div class="row">
    <div class="row mb-5">
        <div class="col-md-8">
            <h3 class="card-title">
                @if ($formMode == 'edit')
                    Edit Quick Start Guide
                @else
                    Add New Quick Start Guide
                @endif
            </h3>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="float-end">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card"></i> Save</button>
                    <a href="{{ url('admin/quick-start-guide') }}" title="Back"><button type="button"
                            class="btn btn-secondary btn-sm cancel"><i class="bi bi-x" aria-hidden="true"></i>
                            Cancel</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div style="border-bottom: 1px solid #E5EAEE;">
                    <ul class="nav nav-tabs bg-white">
                        @foreach (config('lng.lng') as $lngcode => $lng)
                            <li class="nav-item">
                                <a onclick="showHideDescription('{{ strtolower($lngcode) }}')"
                                    class="nav-link {{ $lngcode == 'EN' ? 'active' : '' }} nav_link"
                                    data-bs-toggle="tab" href="#{{ strtolower($lngcode) }}-tab">
                                    <span class="d-sm-none">{{ $lng }}</span>
                                    <span class="d-sm-block d-none">{{ $lng }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        @foreach (config('lng.attr') as $lngcode => $attr)
                            <div class="tab-pane fade {{ $attr == 'en' ? 'active show' : '' }}"
                                id="{{ strtolower($lngcode) }}-tab">
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        {{-- <h5>Search Engin Optimization (SEO)</h5> --}}
                                        <div class="card-header">
                                            <h3 class="card-title">Search Engin Optimization (SEO)</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="@if ($attr == 'en') col-md-6 @else col-md-12 @endif">
                                        <div
                                            class="form-group mb-5{{ $errors->has('meta_title_' . $attr) ? 'has-error' : '' }}">
                                            {!! Form::label('meta_title_' . $attr, 'Meta Title' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                            {!! Form::text(
                                                'meta_title_' . $attr,
                                                null,
                                                'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                            ) !!}
                                            {!! $errors->first('meta_title_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                        </div>
                                        <div
                                            class="form-group mb-5{{ $errors->has('meta_description_' . $attr) ? 'has-error' : '' }}">
                                            {!! Form::label('meta_description_' . $attr, 'Meta Description' . ' (' . $lngcode . ')', [
                                                'class' => 'form-label',
                                            ]) !!}
                                            {!! Form::textarea(
                                                'meta_description_' . $attr,
                                                null,
                                                'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                            ) !!}
                                            {!! $errors->first('meta_description_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                        </div>
                                    </div>
                                    @if ($attr == 'en')
                                        <div class="col-md-6">
                                            <div class="card-body pt-0">
                                                <div class="list-title mb-3">
                                                    <label for="kt_ecommerce_add_product_store_template"
                                                        class="form-label">
                                                        <span style="color: #B5B5C3">Image Size(1200 x
                                                            630)px</span>
                                                    </label>
                                                </div>
                                                <div class="panel-block">
                                                    <div class="form-group">
                                                        <div id="holder-meta-image">
                                                            @if (!empty($quick_guide_page->meta_img))
                                                                <div class='lfmimage-container meta-imagelfmc0'>
                                                                    <img src="{{ asset($quick_guide_page->meta_img) }}"
                                                                        class='lfmimage w-100' style="height: 20rem;">
                                                                    <div>
                                                                        <button type="button"
                                                                            onclick="removeImage('meta-image',0)"
                                                                            class='btn btn-sm btn-danger w-100'>Remove</button>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <img src="{{ asset('backend/media/blank-image.svg') }}"
                                                                    class="img-thumbnail">
                                                            @endif
                                                        </div>
                                                        <div class="input-group mt-3">
                                                            <span class="input-group-btn">
                                                                <a id="lfm-meta-image" data-input="meta-image"
                                                                    data-preview="holder-meta-image"
                                                                    class="btn btn-primary btn-sm text-white lfm-img">
                                                                    <i class="bi bi-image-fill me-2"></i>Select
                                                                    File
                                                                </a>
                                                            </span>
                                                            <input id="meta-image" class="form-control" type="text"
                                                                name="meta_img"
                                                                value="{{ isset($quick_guide_page) && isset($quick_guide_page->meta_img) ? $quick_guide_page->meta_img : '' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                {{-- @if ($attr == 'tc')
                                    <div class="form-check mb-5 mt-5 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox"
                                            {{ isset($about->is_translate) && $about->is_translate == 1 ? 'checked' : '' }}
                                            name="is_translate" id="auto_translate" value="1">
                                        <label class="form-check-label ms-2" for="auto_translate">
                                            Auto translate to chinese
                                        </label>
                                    </div>
                                @endif --}}
                            </div>
                        @endforeach
                    </div>

                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        {{-- <h5>Search Engin Optimization (SEO)</h5> --}}
                        <div class="card-header">
                            <h3 class="card-title">Images</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-end pt-3">
                    <button type="button" class="addNewAwesomeBooking btn btn-success mb-3"
                        style="width:30px;height:30px; padding-top: 5px; padding-left: 10px;">+
                    </button>
                </div>
                <div class="row">
                    @if (isset($quick_guide) && $quick_guide->count() > 0)
                        @php
                            $maxId = max(array_column($quick_guide->toArray(), 'id'));
                        @endphp
                        <input type="text" name="max_id" id="max_id" value="{{ $maxId }}" hidden>
                        @foreach ($quick_guide as $key => $guide)
                            <div class="col-md-6">
                                <div class="card mt-4 border new-awesome_booking-input{{ $key }}">
                                    <div class="card-body" style="background-color: #f5f8fa;">

                                        <div class="row">

                                            <div class="col-md-12 text-end">
                                                <button type="button"
                                                    class="removeAwesomeBooking{{ $key }} btn btn-danger"
                                                    style="width:30px;height:30px; padding-top: 5px; padding-left: 10px;">-</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <input type="text" name="ids_en[]" value="{{ $guide->id }}"
                                                hidden>
                                            <div class="col-md-10">
                                                <div class="card-body pt-0">
                                                    <div class="list-title mb-3">
                                                        <label for="kt_ecommerce_add_product_store_template"
                                                            class="form-label">
                                                            <span style="color: #B5B5C3">Image Size(1200 x
                                                                630)px</span>
                                                        </label>
                                                    </div>
                                                    <div class="panel-block">
                                                        <div class="form-group">
                                                            <div id="holder-img-{{ $guide->id }}">
                                                                @if (!empty($guide->img))
                                                                    <div class='lfmimage-container imglfmc0'>
                                                                        <img src="{{ asset($guide->img) }}"
                                                                            class='lfmimage w-100'
                                                                            style="height: 20rem;">
                                                                        <div>
                                                                            <button type="button"
                                                                                onclick="removeImage('img-{{ $guide->id }}',0)"
                                                                                class='btn btn-sm btn-danger w-100'>Remove</button>
                                                                        </div>
                                                                    </div>
                                                                @else
                                                                    <img src="{{ asset('backend/media/blank-image.svg') }}"
                                                                        class="img-thumbnail">
                                                                @endif
                                                            </div>
                                                            <div class="input-group mt-3">
                                                                <span class="input-group-btn">
                                                                    <a id="lfm-img-{{ $guide->id }}"
                                                                        data-input="img-{{ $guide->id }}"
                                                                        data-preview="holder-img-{{ $guide->id }}"
                                                                        class="btn btn-primary btn-sm text-white lfm-img">
                                                                        <i class="bi bi-image-fill me-2"></i>Select
                                                                        File
                                                                    </a>
                                                                </span>
                                                                <input id="img-{{ $guide->id }}"
                                                                    class="form-control" type="text"
                                                                    name="img[]"
                                                                    value="{{ isset($guide) ? $guide->img : '' }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="separator my-2"></div>
                                        <div class="row">
                                            <div class="col-md-10 px-11 ">
                                                <div
                                                    class="form-group mt-4 mb-5{{ $errors->has('sort') ? 'has-error' : '' }}">
                                                    {!! Form::label('sort', 'Sort', [
                                                        'class' => 'form-label',
                                                    ]) !!}

                                                    {!! Form::text(
                                                        'sort[]',
                                                        $guide->sort,
                                                        'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                    ) !!}
                                                    {!! $errors->first('sort', '<p class="help-block text-danger">:message</p>') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-md-6">
                            <div class="card mt-4 border">
                                <div class="card-body" style="background-color: #f5f8fa;">

                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="card-body pt-0">
                                                <div class="list-title mb-3">
                                                    <label for="kt_ecommerce_add_product_store_template"
                                                        class="form-label">
                                                        <span style="color: #B5B5C3">Image Size(1200 x
                                                            630)px</span>
                                                    </label>
                                                </div>
                                                <div class="panel-block">
                                                    <div class="form-group">
                                                        <div id="holder-img">
                                                            <img src="{{ asset('backend/media/blank-image.svg') }}"
                                                                class="img-thumbnail">
                                                        </div>
                                                        <div class="input-group mt-3">
                                                            <span class="input-group-btn">
                                                                <a id="lfm-img" data-input="img"
                                                                    data-preview="holder-img"
                                                                    class="btn btn-primary btn-sm text-white lfm-img">
                                                                    <i class="bi bi-image-fill me-2"></i>Select
                                                                    File
                                                                </a>
                                                            </span>
                                                            <input id="img" class="form-control" type="text"
                                                                name="img[]">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="separator my-2"></div>
                                    <div class="row">
                                        <div class="col-md-10 px-11 ">
                                            <div class="form-group mb-5{{ $errors->has('sort') ? 'has-error' : '' }}">
                                                <div class="list-title mb-3">
                                                    <label for="kt_ecommerce_add_product_store_template"
                                                        class="form-label">
                                                        <span style="color: #B5B5C3">Sort</span>
                                                    </label>
                                                </div>
                                                <div class="">
                                                    {!! Form::number(
                                                        'sort[]',
                                                        null,
                                                        'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                                    ) !!}
                                                    {!! $errors->first('sort', '<p class="help-block text-danger">:message</p>') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="row" id="get-new-awesome_booking"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(document).ready(() => {
            localStorage.removeItem('awesome_booking_row');
            var max_id = $('input[name="max_id"]').val();
            var awesome_booking_row;
            if (max_id) {
                awesome_booking_row = parseInt(max_id);
            } else {
                awesome_booking_row = 1;
            }
            $('input[name="awesome_booking_row"]').val(awesome_booking_row);
            localStorage.setItem('awesome_booking_row', awesome_booking_row);
            $('.addNewAwesomeBooking').on('click', function() {
                // var max_id = $('input[name="max_id"]').val();
                // console.log(max_id);
                // var awesome_booking_row = localStorage.getItem('awesome_booking_row');
                // awesome_booking_row++;
                // $('input[name="awesome_booking_row"]').val(awesome_booking_row);
                // localStorage.setItem('awesome_booking_row', awesome_booking_row);
                awesome_booking_row++;
                $('input[name="awesome_booking_row"]').val(awesome_booking_row);
                localStorage.setItem('awesome_booking_row', awesome_booking_row);
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.quick-start-guide') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        awesome_booking_row: awesome_booking_row,
                    },
                    datatype: 'json',
                    success: function(json) {
                        console.log(json);
                        $('#get-new-awesome_booking').append(json[0]);
                    }
                });
            })
        });

        var row = $('input[name="awesome_booking_row"]').val();
        for (let i = 0; i < 100; i++) {
            $(document).on('click', `.removeAwesomeBooking${i}`, function() {
                $(`.new-awesome_booking-input${i}`).remove();
            });
        }
    </script>
@endpush

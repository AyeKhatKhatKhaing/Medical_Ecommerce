<div class="row">
    <div class="row mb-5">
        <div class="col-md-8">
            <h3 class="card-title">
                @if ($formMode == 'edit')
                    Edit Header
                @else
                    Add New Header
                @endif
            </h3>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="float-end">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card"></i> Save</button>
                    <a href="{{ url('admin/headers') }}" title="Back"><button type="button"
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

                                <div class="row">
                                    <div class="col-md-8">
                                        {!! Form::label('slide_text_' . $attr, 'Slide Text' . ' (' . $lngcode . ')', ['class' => 'form-label required']) !!}
                                        {{-- {!! Form::label('slide_text_'.$attr, '' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!} --}}
                                    </div>
                                    <div class="col-md-4 text-end">
                                        <button data-attr="{{ $attr }}" data-lngcode="{{ $lngcode }}"
                                            type="button" class="addNewSlideText btn btn-success"
                                            style="width:30px;height:30px; padding-top: 5px; padding-left: 10px;">+</button>
                                    </div>
                                </div>
                                @php
                                    $slide_text = 'slide_text_' . $attr;
                                @endphp
                                @if (isset($header) && $header->$slide_text != null)
                                    @foreach ($header->$slide_text as $key => $text)
                                        @php
                                            $key++;
                                            $content = 'content_' . $attr;
                                        @endphp
                                        <div class="mt-4 slide-text-input{{ $key }}">

                                            <div class="row">
                                                <div
                                                    class="col-md-8 form-group mt-4 mb-5{{ $errors->has('slide_text_' . $attr) ? 'has-error' : '' }}">

                                                    {!! Form::textarea(
                                                        'slide_text_' . $attr . '[]',
                                                        $text,
                                                        'required' == 'required' ? ['class' => 'form-control editor change_height'] : ['class' => 'form-control editor'],
                                                    ) !!}

                                                    {!! $errors->first('slide_text_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                </div>
                                                <div class="col-md-4 mt-4 mb-5 text-end">
                                                    <button data-attr="{{ $attr }}" type="button"
                                                        class="removeSlideText{{ $key }} btn btn-danger"
                                                        style="width:30px;height:30px; padding-top: 5px; padding-left: 10px;">-</button>
                                                </div>
                                            </div>

                                        </div>
                                    @endforeach
                                @else
                                    <div
                                        class="form-group col-md-8 mt-4 mb-5{{ $errors->has('slide_text_' . $attr) ? 'has-error' : '' }}">
                                        {{-- {!! Form::label('slide_text_'.$attr, 'Slide Text' . ' (' . $lngcode . ')', ['class' => 'form-label required']) !!} --}}
                                        {{-- {!! Form::text(
                                            'slide_text_' . $attr . '[]',
                                            null,
                                            'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                        ) !!} --}}
                                        {!! Form::textarea(
                                            'slide_text_' . $attr . '[]',
                                            null,
                                            'required' == 'required' ? ['class' => 'form-control editor change_height'] : ['class' => 'form-control editor'],
                                        ) !!}
                                        {!! $errors->first('slide_text_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                    </div>
                                @endif
                                <div id="{{ $attr }}_get-new-slide-text"></div>

                                <div class="form-group mb-5{{ $errors->has('message_' . $attr) ? 'has-error' : '' }}">
                                    {!! Form::label('message_' . $attr, 'Message' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                    {!! Form::textarea(
                                        'message_' . $attr,
                                        null,
                                        'required' == 'required' ? ['class' => 'form-control editor'] : ['class' => 'form-control editor'],
                                    ) !!}
                                    {!! $errors->first('message_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                </div>
                                <div class="form-group mb-5{{ $errors->has('content_' . $attr) ? 'has-error' : '' }}">
                                    {!! Form::label('content_' . $attr, 'Content' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                    {!! Form::textarea(
                                        'content_' . $attr,
                                        null,
                                        'required' == 'required'
                                            ? ['class' => 'form-control editor', 'maxlength' => '20']
                                            : ['class' => 'form-control editor', 'maxlength' => '20'],
                                    ) !!}
                                    {!! $errors->first('content_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                </div>

                                <div class="row mb-5">
                                    <div class="col-md-6">
                                        <div
                                        class="form-group mb-5{{ $errors->has('quick_start_gudie_text_' . $attr) ? 'has-error' : '' }}">
                                        {!! Form::label('quick_start_gudie_text_' . $attr, 'Quick Start Guide Text' . ' (' . $lngcode . ')', [
                                            'class' => 'form-label required',
                                        ]) !!}
                                        {!! Form::text(
                                            'quick_start_gudie_text_' . $attr,
                                            null,
                                            'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                        ) !!}
                                        {!! $errors->first('quick_start_gudie_text_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div
                                        class="form-group mb-5{{ $errors->has('quick_start_gudie_link_' . $attr) ? 'has-error' : '' }}">
                                        {!! Form::label('quick_start_gudie_link_' . $attr, 'Quick Start Guide Link' . ' (' . $lngcode . ')', [
                                            'class' => 'form-label required',
                                        ]) !!}
                                        {!! Form::text(
                                            'quick_start_gudie_link_' . $attr,
                                            null,
                                            'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                        ) !!}
                                        {!! $errors->first('quick_start_gudie_link_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                    </div>
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-md-6">
                                        <div
                                        class="form-group mb-5{{ $errors->has('help_center_text_' . $attr) ? 'has-error' : '' }}">
                                        {!! Form::label('help_center_text_' . $attr, 'Help Center Text' . ' (' . $lngcode . ')', [
                                            'class' => 'form-label required',
                                        ]) !!}
                                        {!! Form::text(
                                            'help_center_text_' . $attr,
                                            null,
                                            'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                        ) !!}
                                        {!! $errors->first('help_center_text_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div
                                        class="form-group mb-5{{ $errors->has('help_center_link_' . $attr) ? 'has-error' : '' }}">
                                        {!! Form::label('help_center_link_' . $attr, 'Help Center Link' . ' (' . $lngcode . ')', [
                                            'class' => 'form-label required',
                                        ]) !!}
                                        {!! Form::text(
                                            'help_center_link_' . $attr,
                                            null,
                                            'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                        ) !!}
                                        {!! $errors->first('help_center_link_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                    </div>
                                    </div>
                                </div>

                                @if ($attr == 'tc')
                                    <div class="form-check mb-5 mt-5 d-flex align-items-center">
                                        <input class="form-check-input"
                                            {{ isset($header->is_translate) && $header->is_translate == 1 ? 'checked' : '' }}
                                            type="checkbox" name="is_translate" id="auto_translate" value="1">
                                        <label class="form-check-label ms-2" for="auto_translate">
                                            Auto translate to chinese
                                        </label>
                                    </div>
                                @endif


                            </div>
                            
                            
                        @endforeach
                        <input type="hidden" name="slide_text_row">
                        {{-- <textarea name="slide_text_row" id="" cols="30" rows="10" class="form-control editor"></textarea> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .tox-edit-area {
        height: 200px !important;
        /* Adjust the height as needed */
    }
</style>
@push('scripts')
    <script>
        tinymce.init({
            selector: '.change_height',
            height: "500px",
            background: "red" // Set the width to 500 pixels
            // Other configuration options can be added here as needed
        });
        $(document).ready(() => {
            localStorage.removeItem('slide_text_row');
            $('.addNewSlideText').on('click', function() {
                var slide_text_row = localStorage.getItem('slide_text_row');

                slide_text_row++;

                $('input[name="slide_text_row"]').val(slide_text_row);

                localStorage.setItem('slide_text_row', slide_text_row);
                var attr = $(this).data('attr');
                var lngcode = $(this).data('lngcode');
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.get-slide-process') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        slide_text_row: slide_text_row,
                        attr: attr,
                        lngcode: lngcode,
                    },
                    datatype: 'json',
                    success: function(json) {
                        console.log(json);
                        $('#en_get-new-slide-text').append(json[0]);
                        $('#tc_get-new-slide-text').append(json[1]);
                        $('#sc_get-new-slide-text').append(json[2]);
                        tinymce.init(editor_config)

                    }
                });
            })
        });

        var row = $('input[name="slide_text_row"]').val();
        for (let i = 1; i < 100; i++) {
            $(document).on('click', `.removeSlideText${i}`, function() {
                $(`.slide-text-input${i}`).remove();
            });
        }
        var row = $('input[name="new_slide_text_row"]').val();
        for (let i = 1; i < 100; i++) {
            $(document).on('click', `.removeSlideText_new${i}`, function() {
                $(`.new-slide-text-input${i}`).remove();
            });
        }
    </script>
@endpush

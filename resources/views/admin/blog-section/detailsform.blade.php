<div class="card mt-4">
    <div class="card-body">
        @if ($errors->any())
            {{ implode('', $errors->all('<div>:message</div>')) }}
        @endif
        <div class="py-5">
            <div class="d-flex flex-column flex-md-row rounded border p-10">
                <ul class="nav nav-tabs nav-pills flex-row border-0 flex-md-column me-5 mb-3 mb-md-0 fs-6">
                    <input type="text" name="check_up_type_id" id="check-up-type-id" value="1" hidden>
                    <li class="nav-item me-0 mb-md-2">
                        <a class="check-up-type min-w-200px nav-link btn btn-flex btn-active-light-primary {{ isset($type) && $type == "section" ? 'active' : '' }}" href="{{ url('/admin/blog/'.$blog_id.'/section/'.$section_id.'/edit') }}" style="color: #009ef7 !important">
                            <span class="svg-icon svg-icon-2 svg-icon-primary me-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M11 2.375L2 9.575V20.575C2 21.175 2.4 21.575 3 21.575H9C9.6 21.575 10 21.175 10 20.575V14.575C10 13.975 10.4 13.575 11 13.575H13C13.6 13.575 14 13.975 14 14.575V20.575C14 21.175 14.4 21.575 15 21.575H21C21.6 21.575 22 21.175 22 20.575V9.575L13 2.375C12.4 1.875 11.6 1.875 11 2.375Z"
                                        fill="currentColor"></path>
                                </svg>
                            </span>
                            <span class="d-flex flex-column align-items-start">
                                <span class="fs-4 fw-bolder" style="text-align: left">
                                    SECTION MANAGEMENT
                                </span>
                            </span>
                        </a>
                    </li>
                    @if(isset($section->feature_type))
                        @foreach (json_decode($section->feature_type) as $key=>$featuretype)
                            <li class="nav-item me-0 mb-md-2">
                                <a class="check-up-type min-w-200px nav-link btn btn-flex btn-active-light-primary {{ isset($arr_id) && $arr_id == $key+1 && $type == $featuretype ? 'active' : '' }}"
                                    href="{{ url('/admin/blog/'.$blog_id.'/section/'.$section_id.'/'.$key+1) }}"
                                    style="color: #009ef7 !important">
                                    <span class="svg-icon svg-icon-2 svg-icon-primary me-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M11 2.375L2 9.575V20.575C2 21.175 2.4 21.575 3 21.575H9C9.6 21.575 10 21.175 10 20.575V14.575C10 13.975 10.4 13.575 11 13.575H13C13.6 13.575 14 13.975 14 14.575V20.575C14 21.175 14.4 21.575 15 21.575H21C21.6 21.575 22 21.175 22 20.575V9.575L13 2.375C12.4 1.875 11.6 1.875 11 2.375Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <span class="d-flex flex-column align-items-start">
                                        <span class="fs-4 fw-bolder" style="text-align: left">
                                            @if ($featuretype == 'description')
                                                TEXT EDITOR
                                            @elseif($featuretype == 'product-comparison')
                                                TABLE (PRODUCT)
                                            @elseif($featuretype == 'table')
                                                TABLE
                                            @elseif($featuretype == 'header-table')
                                                TABLE (HEADER)
                                            @elseif($featuretype == 'download')
                                                DOWNLOAD DOCUMENT
                                            @elseif($featuretype == 'form-submission')
                                                FORM SUBMISSION
                                            @elseif($featuretype == 'product-listing')
                                                PRODUCT LISTING
                                            @elseif($featuretype == 'coupon')
                                                COUPON
                                            @elseif($featuretype == 'banner')
                                                BANNER
                                            @elseif($featuretype == 'further')
                                                FURTHER READING
                                            @elseif($featuretype == 'product-filter')
                                                PRODUCT FILTERING
                                            @elseif($featuretype == 'video')
                                                VIDEO
                                            @elseif($featuretype == 'image')
                                                IMAGE GALLARY
                                            @elseif($featuretype == 'button')
                                                BUTTON
                                            @elseif($featuretype == 'faq')
                                                FAQ
                                            @elseif($featuretype == 'memo')
                                                MEMO
                                            @endif
                                        </span>
                                    </span>
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
                <div class="tab-content w-100" id="myTabContent">
                    @if($type == "section")
                    <div class="tab-pane fade active show" role="tabpanel">
                        <form action="{{ url('/admin/blog/'.$blog_id.'/section/'.$section_id) }}" method="POST">
                            @csrf
                            <div class="card">
                                <div class="card-header border-0">
                                    <div class="card-title">
                                        <h2>
                                            SECTION MANAGEMENT
                                        </h2>
                                    </div>
                                    <div class="card-toolbar">
                                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="row mb-5">
                                            <div class="col-md-8">
                                                <h3 class="card-title"></h3>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="float-end">
                                                        <button type="submit" class="btn btn-primary btn-sm btn-blog-details"><i class="bi bi-sd-card"></i> Save</button>
                                                        <a href="{{ url('/admin/blog/'.$blog_id.'/edit') }}" title="Back"><button type="button" class="btn btn-secondary btn-sm cancel"><i class="bi bi-x" aria-hidden="true"></i>Cancel</button></a>
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
                                                        <div class="form-group mb-5">
                                                            <label for="sort_no" class="form-label">Sort Number</label>
                                                            <input class="form-control" title="sort_no" type="number" name="sort_no" value="{{ isset($section->sort_no) ? $section->sort_no : ''}}" min="1">
                                                        </div>
                                                        <div class="tab-content">
                                                            @foreach (config('lng.attr') as $lngcode => $attr)
                                                            @php
                                                                $section_name = 'section_name_' . $attr;
                                                            @endphp
                                                            <div class="tab-pane {{ $attr == 'en' ? 'active show' : '' }}"  id="{{ strtolower($lngcode) }}-tab">
                                                                <div class="form-group mb-5{{ $errors->has('section_name_'.$attr) ? 'has-error' : ''}}">
                                                                    {!! Form::label('section_name_'.$attr, 'Section Name' . ' (' . $lngcode . ')', ['class' => 'form-label required']) !!}
                                                                    <input type="text" name="section_name_{{$attr}}" class="form-control" value="{{ $section->$section_name }}">
                                                                    {!! $errors->first('section_name_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                        <div>
                                                            <div class="card-header mb-3">
                                                                <h4 class="card-title">Feature Types</h4>
                                                                <a class="btn btn-success mt-5" style="width:30px;height:30px; padding-top: 5px; padding-left: 10px;" onclick="addFeature()">+</a>
                                                            </div>
                                                            <div id="feature-panel">
                                                                @if(isset($section->feature_type))
                                                                    @foreach (json_decode($section->feature_type) as $key=>$feature)
                                                                    @php
                                                                        $ext = App\Models\BlogSectionFeature::where('section_id', $section_id)
                                                                                ->where('array_no', $key)
                                                                                ->first();
                                                                    @endphp
                                                                    <div class="row mb-3 panel-{{$key+100}}">
                                                                        <div class="col-10">
                                                                            <select class="form-select" name="feature_type[]" data-placeholder="Select an option" {{ isset($ext) ? 'disabled' : '' }}>
                                                                                <option value="description" {{ $feature == "description" ? 'selected' : '' }} >Text Editor</option>
                                                                                <option value="product-comparison" {{ $feature == "product-comparison" ? 'selected' : '' }}>Table (Product)</option>
                                                                                <option value="table" {{ $feature == "table" ? 'selected' : '' }}>Table</option>
                                                                                <option value="header-table" {{ $feature == "header-table" ? 'selected' : '' }}>Table (Header)</option>
                                                                                <option value="download" {{ $feature == "download" ? 'selected' : '' }}>Download Document</option>
                                                                                <option value="form-submission" {{ $feature == "form-submission" ? 'selected' : '' }}>Form Submission</option>
                                                                                <option value="product-listing" {{ $feature == "product-listing" ? 'selected' : '' }}>Product Listing</option>
                                                                                <option value="coupon" {{ $feature == "coupon" ? 'selected' : '' }}>Coupon</option>
                                                                                <option value="banner" {{ $feature == "banner" ? 'selected' : '' }}>Banner</option>
                                                                                <option value="further" {{ $feature == "further" ? 'selected' : '' }}>Further Reading</option>
                                                                                <option value="product-filter" {{ $feature == "product-filter" ? 'selected' : '' }}>Product Filtering</option>
                                                                                <option value="video" {{ $feature == "video" ? 'selected' : '' }}>Video</option>
                                                                                <option value="image" {{ $feature == "image" ? 'selected' : '' }}>Image</option>
                                                                                <option value="button" {{ $feature == "button" ? 'selected' : '' }}>Button</option>
                                                                                <option value="faq" {{ $feature == "faq" ? 'selected' : '' }}>FAQs</option>
                                                                                <option value="memo" {{ $feature == "memo" ? 'selected' : '' }}>Memo</option>
                                                                            </select>
                                                                            @if(isset($ext))
                                                                                <input type="hidden" name="feature_type[]" value="{{$feature}}"/>
                                                                            @endif
                                                                        </div>
                                                                        <div class="col-2">
                                                                            {{-- <button type="button" onclick="removeFeature({{$key+100}})" class="btn btn-sm btn-danger text-end">-</button> --}}
                                                                        </div>
                                                                    </div>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    @else
                    <div class="tab-pane fade active show" role="tabpanel">
                        <form action="{{ url('/admin/blog/'.$blog_id.'/section/'.$section_id.'/'.$arr_id) }}" method="POST" enctype="multipart/form-data" onkeydown="return event.key != 'Enter';">
                            @csrf
                            <div class="card">
                                <div class="card-header border-0">
                                    <div class="card-title">
                                        <h2>
                                            @if ($type == 'description')
                                                TEXT EDITOR
                                            @elseif($type == 'product-comparison')
                                                TABLE (PRODUCT)
                                            @elseif($type == 'table')
                                                TABLE
                                            @elseif($type == 'header-table')
                                                TABLE (HEADER)
                                            @elseif($type == 'download')
                                                DOWNLOAD DOCUMENT
                                            @elseif($type == 'form-submission')
                                                FORM SUBMISSION
                                            @elseif($type == 'product-listing')
                                                PRODUCT LISTING
                                            @elseif($type == 'coupon')
                                                COUPON
                                            @elseif($type == 'banner')
                                                BANNER
                                            @elseif($type == 'further')
                                                FURTHER READING
                                            @elseif($type == 'product-filter')
                                                PRODUCT FILTERING
                                            @elseif($type == 'video')
                                                VIDEO
                                            @elseif($type == 'image')
                                                IMAGE GALLARY
                                            @elseif($type == 'button')
                                                BUTTON
                                            @elseif($type == 'faq')
                                                FAQ
                                            @elseif($type == 'memo')
                                                MEMO
                                            @endif
                                        </h2>
                                    </div>
                                    <div class="card-toolbar">
                                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="row mb-5">
                                            <div class="col-md-8">
                                                <h3 class="card-title"></h3>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="float-end">
                                                        <input type="hidden" name="featuretype" value="{{ $type }}">
                                                        <input type="hidden" name="feature_id" value="{{ isset($extFeature) ? $extFeature->id : '' }}">
                                                        <button type="submit" class="btn btn-primary btn-sm btn-blog-details"><i class="bi bi-sd-card"></i> Save</button>
                                                        @if(isset($extFeature))
                                                        <a onclick="deleteFeature(event)" href="{{ url('/admin/blog/'.$blog_id.'/section/'.$section_id.'/'.$arr_id.'/'.$extFeature->id) }}" title="Back"><button type="button" class="btn btn-danger btn-sm cancel"><i class="bi bi-x" aria-hidden="true"></i>Delete</button></a>
                                                        @endif
                                                        <a href="{{ url('/admin/blog/'.$blog_id.'/edit') }}" title="Back"><button type="button" class="btn btn-secondary btn-sm cancel"><i class="bi bi-x" aria-hidden="true"></i>Cancel</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                @if ($type == "description" || $type == "table" || $type == "header-table" || $type == "form-submission" || $type == "video" || $type == "faq" || $type == "button" || $type == "memo" || $type == "image")
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
                                                @endif
                                                <div class="card-body">
                                                    <div class="card-body content-body">
                                                        <div class="tab-content">
                                                            <div class="form-group mb-5{{ $errors->has('sort_order_no') ? 'has-error' : '' }}">
                                                                <label for="sort_order_no" class="form-label required">Sort Order No</label>
                                                                <input class="form-control" title="sort_order_no" type="number" name="sort_order_no" value="{{ isset($extFeature->sort_no) ? $extFeature->sort_no : $arr_id }}">
                                                                <p class="help-block text-danger hidden" id="sort_order_no"></p>
                                                            </div>
                                                            @foreach (config('lng.attr') as $lngcode => $attr)
                                                                <div class="tab-pane fade {{ $lngcode == 'EN' ? 'active show' : '' }}" id="{{ strtolower($lngcode) }}-tab">
                                                                    @php
                                                                        $desc = 'desc_'.$attr;
                                                                        $button_title = 'button_title_'.$attr;
                                                                        $button_url = 'button_url_'.$attr;
                                                                    @endphp
                                                                    @if ($type == "description" || $type == "table" || $type == "header-table" || $type == "form-submission" || $type == "video" || $type == "memo" || $type == "image")
                                                                        <div class="form-group mb-5{{ $errors->has('desc_' . $attr) ? 'has-error' : '' }}">
                                                                            <label for="desc_{{ $attr }}" class="form-label">Description ({{ $lngcode }})</label>
                                                                            <textarea class="form-control editor" id="desc_{{ $attr }}" name="desc_{{ $attr }}" cols="50" rows="10" aria-hidden="true">{{ isset($extFeature->$desc) ? $extFeature->$desc : '' }}</textarea>
                                                                            {!! $errors->first('desc_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                                        </div>

                                                                        @if($attr == 'tc')
                                                                            <div class="form-check mb-5 mt-5 d-flex align-items-center">
                                                                                <input class="form-check-input" type="checkbox" id="auto_sc_translate" value="1">
                                                                                <label class="form-check-label ms-2" for="auto_translate">
                                                                                    Auto translate to chinese simplified
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check mb-5 mt-5 d-flex align-items-center">
                                                                                <input class="form-check-input" type="checkbox" id="auto_eng_translate" value="1">
                                                                                <label class="form-check-label ms-2" for="auto_translate">
                                                                                    Auto translate to english
                                                                                </label>
                                                                            </div>
                                                                        @endif
                                                                    @endif
                                                                    @if ($type == "button")
                                                                        <div class="form-group mb-5{{ $errors->has('button_title_' . $attr) ? 'has-error' : '' }}">
                                                                            <label for="button_title_{{ $attr }}" class="form-label">Button Title ({{ $lngcode }})</label>
                                                                            <input class="form-control" title="button_title_{{ $attr }}" type="text" name="button_title_{{ $attr }}" value="{{ isset($extFeature->$button_title) ? $extFeature->$button_title : '' }}">
                                                                            {!! $errors->first('button_title_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                                        </div>
                                                                        <div class="form-group mb-5{{ $errors->has('button_url_' . $attr) ? 'has-error' : '' }}">
                                                                            <label for="button_url_{{ $attr }}" class="form-label">Button URL ({{ $lngcode }})</label>
                                                                            <input class="form-control" title="button_url_{{ $attr }}" type="text" name="button_url_{{ $attr }}" value="{{ isset($extFeature->$button_url) ? $extFeature->$button_url : '' }}">
                                                                            {!! $errors->first('button_url_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                                        </div>
                                                                    @endif
                                                                    @if ($type == "faq")
                                                                        <button data-attr="{{ $attr }}" type="button" class="addNewFaq btn btn-success" style="width:30px;height:30px; padding-top: 5px; padding-left: 10px;">+</button>
                                                                        @php $index = 0; @endphp
                                                                        @if(isset($extFeature->faq_question_en))
                                                                            @foreach(json_decode($extFeature->faq_question_en) as $key => $question_en)
                                                                                @php $index=$key @endphp
                                                                                @include('admin.blog-section.blogfaqform')
                                                                            @endforeach
                                                                        @else
                                                                            @include('admin.blog-section.blogfaqform')
                                                                        @endif
                                                                        <div id="{{ $attr }}_getNewFaqRow" class="getNewFaqRow"></div>
                                                                    @endif
                                                                </div>
                                                            @endforeach
                                                            <div class="row mt-5">
                                                                <div class="col-md-12 col-md-12">
                                                                    @if ($type == "video")
                                                                        <div class="form-group mb-5{{ $errors->has('video_url') ? 'has-error' : '' }}">
                                                                            <label for="video_url" class="form-label">Video URL</label>
                                                                            <input class="form-control" title="video_url" type="text" id="video_url" name="video_url" value="{{ isset($extFeature->video_url) ? $extFeature->video_url : '' }}">
                                                                            {!! $errors->first('video_url', '<p class="help-block text-danger">:message</p>') !!}
                                                                        </div>
                                                                    @endif
                                                                    @if ($type == "image")
                                                                        <div class="form-group mb-5{{ $errors->has('image_url') ? 'has-error' : '' }}">
                                                                            <label for="image_url" class="form-label">Image URL</label>
                                                                            <input class="form-control" title="image_url" type="text" id="image_url" name="image_url" value="{{ isset($extFeature->image_url) ? $extFeature->image_url : '' }}">
                                                                            {!! $errors->first('image_url', '<p class="help-block text-danger">:message</p>') !!}
                                                                        </div>
                                                                        <div class="form-group mb-5{{ $errors->has('image_gallery_id') ? 'has-error' : '' }}">
                                                                            <label for="image_gallery_id" class="form-label">Image Gallery</label>
                                                                            <ul class="dragGroup" id="holder5">
                                                                                @if(isset($extFeature->image_gallery_path))
                                                                                    @foreach(json_decode($extFeature->image_gallery_path) as $key => $imgdata)
                                                                                        <li class="draggable w-100 draggableItem0 thumbnail4lfmc0" draggable="true">
                                                                                            <input type="hidden" name="holder5[]'" value="{{ $imgdata }}" id="galleryImage0">
                                                                                            <img src="{{ $imgdata }}" class="lfmimage w-100">
                                                                                            <div>
                                                                                                <button type="button" onclick="removeGImage(this)" class="btn btn-sm btn-danger w-100" style="border-radius: 1px 1px 8px 8px;">Remove</button>
                                                                                            </div>
                                                                                        </li>
                                                                                    @endforeach
                                                                                @else
                                                                                <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail feature-img">
                                                                                @endif
                                                                            </ul>
                                                                            <div class="input-group mt-3">
                                                                                <span class="input-group-btn">
                                                                                    <a id="lfm-pro" data-input="thumbnail5" data-preview="holder5" data-ptype="g" class="lfm-pro lfm-img btn btn-primary text-white">
                                                                                        <i class="fa fa-picture-o"></i>
                                                                                        Choose
                                                                                    </a>
                                                                                </span>
                                                                            </div>
                                                                            {!! $errors->first('image_gallery_id', '<p class="help-block text-danger">:message</p>') !!}
                                                                        </div>
                                                                        <div class="form-group mb-5">
                                                                            <label for="title_en" class="form-label">Image Gallery Alt Text</label><br />
                                                                            <input type="text" name="image_gallery_alt_text" placeholder="Type Image Gallery Alt Text" class="tm-input form-control tm-input-info" />
                                                                        </div>
                                                                    @endif
                                                                    @if ($type == "product-comparison" || $type == "product-listing")
                                                                        <div class="form-group mb-5{{ $errors->has('product_ids') ? 'has-error' : '' }}">
                                                                            <label for="product_ids" class="form-label">Product Ids</label><br />
                                                                            <select name="product_ids[]" class="form-select check-item product_ids" data-control="select2" data-placeholder="Select Product Ids" multiple>
                                                                                @foreach ($productList as $data)
                                                                                    <option value="{{ $data->id }}" {{ isset($extFeature->product_ids) && in_array($data->id, json_decode($extFeature->product_ids)) ? 'selected' : '' }}>
                                                                                        {{ $data->name_en }} ({{ $data->product_code }})
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                            {!! $errors->first('product_ids', '<p class="help-block text-danger">:message</p>') !!}
                                                                        </div>
                                                                    @endif
                                                                    @if ($type == "download")
                                                                    <div class="card mb-3">
                                                                        <div class="card-header">
                                                                            <h3 class="card-title">Downloads</h3>
                                                                            <a class="btn btn-success mt-5" style="width:30px;height:30px; padding-top: 5px; padding-left: 10px;" onclick="addDownloadSource()">+</a>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <div class="card-body content-body">
                                                                                <div id="download-panel">
                                                                                    @if(isset($extFeature->download_name_en))
                                                                                        @foreach (json_decode($extFeature->download_name_en) as $key=>$name_en)
                                                                                        @php
                                                                                            $name_tc = isset(json_decode($extFeature->download_name_tc)[$key]) ? json_decode($extFeature->download_name_tc)[$key] : '';
                                                                                            $name_sc = isset(json_decode($extFeature->download_name_sc)[$key]) ? json_decode($extFeature->download_name_sc)[$key] : '';
                                                                                            $file_path = isset(json_decode($extFeature->sample_download_file)[$key]) ? json_decode($extFeature->sample_download_file)[$key] : '';
                                                                                        @endphp
                                                                                        <div class="border border-outlin-dashed p-4 mb-3 row-{{ $key+100 }}">
                                                                                            <div class="row">
                                                                                                <div class="col-12 text-end">
                                                                                                    <button type="button" onclick="removeDownloadSource({{ $key+100 }})" class="btn btn-sm btn-danger text-end">-</button>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div class="form-group mb-5{{ $errors->has('download_name_en') ? 'has-error' : '' }}">
                                                                                                    <label for="download_name_en" class="form-label">Sample Download File Name(EN)</label>
                                                                                                    <input class="form-control" title="download_name_en" type="text" name="download_name_en[]" value="{{$name_en}}">
                                                                                                    {!! $errors->first('download_name_en' , '<p class="help-block text-danger">:message</p>') !!}
                                                                                                </div>
                                                                                                <div class="form-group mb-5{{ $errors->has('download_name_tc') ? 'has-error' : '' }}">
                                                                                                    <label for="download_name_tc" class="form-label">Sample Download File Name(TC)</label>
                                                                                                    <input class="form-control" title="download_name_tc" type="text" name="download_name_tc[]" value="{{$name_tc}}">
                                                                                                    {!! $errors->first('download_name_tc' , '<p class="help-block text-danger">:message</p>') !!}
                                                                                                </div>
                                                                                                <div class="form-group mb-5{{ $errors->has('download_name_sc') ? 'has-error' : '' }}">
                                                                                                    <label for="download_name_sc" class="form-label">Sample Download File Name(CN)</label>
                                                                                                    <input class="form-control" title="download_name_sc" type="text" name="download_name_sc[]" value="{{$name_sc}}">
                                                                                                    {!! $errors->first('download_name_sc' , '<p class="help-block text-danger">:message</p>') !!}
                                                                                                </div>
                                                                                                <div class="form-group mb-5{{ $errors->has('sample_download_file') ? 'has-error' : '' }}">
                                                                                                    <label for="sample_download_file" class="form-label">Sample Download File</label>
                                                                                                    <p> Existing File : {{$file_path}}</p>
                                                                                                    <input class="form-control" title="sample_download_file" type="file" name="sample_download_file[]" accept=".pdf">
                                                                                                    {!! $errors->first('sample_download_file', '<p class="help-block text-danger">:message</p>') !!}
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        @endforeach
                                                                                    @else
                                                                                    <div class="border border-outlin-dashed p-4 mb-3 row-1">
                                                                                        <div class="row">
                                                                                            <div class="col-12 text-end">
                                                                                                <button type="button" onclick="removeDownloadSource(1)" class="btn btn-sm btn-danger text-end">-</button>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="form-group mb-5{{ $errors->has('download_name_en') ? 'has-error' : '' }}">
                                                                                                <label for="download_name_en" class="form-label">Sample Download File Name(EN)</label>
                                                                                                <input class="form-control" title="download_name_en" type="text" name="download_name_en[]" value="">
                                                                                                {!! $errors->first('download_name_en' , '<p class="help-block text-danger">:message</p>') !!}
                                                                                            </div>
                                                                                            <div class="form-group mb-5{{ $errors->has('download_name_tc') ? 'has-error' : '' }}">
                                                                                                <label for="download_name_tc" class="form-label">Sample Download File Name(TC)</label>
                                                                                                <input class="form-control" title="download_name_tc" type="text" name="download_name_tc[]" value="">
                                                                                                {!! $errors->first('download_name_tc' , '<p class="help-block text-danger">:message</p>') !!}
                                                                                            </div>
                                                                                            <div class="form-group mb-5{{ $errors->has('download_name_sc') ? 'has-error' : '' }}">
                                                                                                <label for="download_name_sc" class="form-label">Sample Download File Name(CN)</label>
                                                                                                <input class="form-control" title="download_name_sc" type="text" name="download_name_sc[]" value="">
                                                                                                {!! $errors->first('download_name_sc' , '<p class="help-block text-danger">:message</p>') !!}
                                                                                            </div>
                                                                                            <div class="form-group mb-5{{ $errors->has('sample_download_file') ? 'has-error' : '' }}">
                                                                                                <label for="sample_download_file" class="form-label">Sample Download File</label>
                                                                                                <input class="form-control" title="sample_download_file" type="file" name="sample_download_file[]" accept=".pdf">
                                                                                                {!! $errors->first('sample_download_file', '<p class="help-block text-danger">:message</p>') !!}
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                    @if ($type == "further")
                                                                    <div class="card mb-3">
                                                                        <div class="card-header">
                                                                            <h3 class="card-title">Further Readings</h3>
                                                                            <a class="btn btn-success mt-5" style="width:30px;height:30px; padding-top: 5px; padding-left: 10px;" onclick="addFurther()">+</a>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <div class="card-body content-body">
                                                                                <div id="further-panel">
                                                                                    @if(isset($extFeature->further_name_en))
                                                                                        @foreach (json_decode($extFeature->further_name_en) as $key=>$furthername_en)
                                                                                            @php
                                                                                                $furthername_tc = isset(json_decode($extFeature->further_name_tc)[$key]) ? json_decode($extFeature->further_name_tc)[$key] : '';
                                                                                                $furthername_sc = isset(json_decode($extFeature->further_name_sc)[$key]) ? json_decode($extFeature->further_name_sc)[$key] : '';
                                                                                                $further_url = isset(json_decode($extFeature->further_url)[$key]) ? json_decode($extFeature->further_url)[$key] : '';
                                                                                            @endphp
                                                                                            <div class="border border-outlin-dashed p-4 mb-3 row-{{ $key+100 }}">
                                                                                                <div class="row">
                                                                                                    <div class="col-12 text-end">
                                                                                                        <button type="button" onclick="removeFurther({{ $key+100 }})" class="btn btn-sm btn-danger text-end">-</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="form-group mb-5{{ $errors->has('further_name_en') ? 'has-error' : '' }}">
                                                                                                        <label for="further_name_en" class="form-label">Further Reading Name(EN)</label>
                                                                                                        <input class="form-control" title="further_name_en" type="text" name="further_name_en[]" value="{{$furthername_en}}">
                                                                                                        {!! $errors->first('further_name_en' , '<p class="help-block text-danger">:message</p>') !!}
                                                                                                    </div>
                                                                                                    <div class="form-group mb-5{{ $errors->has('further_name_tc') ? 'has-error' : '' }}">
                                                                                                        <label for="further_name_tc" class="form-label">Further Reading Name(TC)</label>
                                                                                                        <input class="form-control" title="further_name_tc" type="text" name="further_name_tc[]" value="{{$furthername_tc}}">
                                                                                                        {!! $errors->first('further_name_tc' , '<p class="help-block text-danger">:message</p>') !!}
                                                                                                    </div>
                                                                                                    <div class="form-group mb-5{{ $errors->has('further_name_sc') ? 'has-error' : '' }}">
                                                                                                        <label for="further_name_sc" class="form-label">Further Reading Name(CN)</label>
                                                                                                        <input class="form-control" title="further_name_sc" type="text" name="further_name_sc[]" value="{{$furthername_sc}}">
                                                                                                        {!! $errors->first('further_name_sc' , '<p class="help-block text-danger">:message</p>') !!}
                                                                                                    </div>
                                                                                                    <div class="form-group mb-5{{ $errors->has('further_url') ? 'has-error' : '' }}">
                                                                                                        <label for="further_url" class="form-label">Further Reading URL</label>
                                                                                                        <input class="form-control" title="further_url" type="text" name="further_url[]" value="{{$further_url}}">
                                                                                                        {!! $errors->first('further_url' , '<p class="help-block text-danger">:message</p>') !!}
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        @endforeach
                                                                                    @else
                                                                                    <div class="border border-outlin-dashed p-4 mb-3 row-1">
                                                                                        <div class="row">
                                                                                            <div class="col-12 text-end">
                                                                                                <button type="button" onclick="removeFurther(1)" class="btn btn-sm btn-danger text-end">-</button>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="form-group mb-5{{ $errors->has('further_name_en') ? 'has-error' : '' }}">
                                                                                                <label for="further_name_en" class="form-label">Further Reading Name(EN)</label>
                                                                                                <input class="form-control" title="further_name_en" type="text" name="further_name_en[]" value="">
                                                                                                {!! $errors->first('further_name_en' , '<p class="help-block text-danger">:message</p>') !!}
                                                                                            </div>
                                                                                            <div class="form-group mb-5{{ $errors->has('further_name_tc') ? 'has-error' : '' }}">
                                                                                                <label for="further_name_tc" class="form-label">Further Reading Name(TC)</label>
                                                                                                <input class="form-control" title="further_name_tc" type="text" name="further_name_tc[]" value="">
                                                                                                {!! $errors->first('further_name_tc' , '<p class="help-block text-danger">:message</p>') !!}
                                                                                            </div>
                                                                                            <div class="form-group mb-5{{ $errors->has('further_name_sc') ? 'has-error' : '' }}">
                                                                                                <label for="further_name_sc" class="form-label">Further Reading Name(CN)</label>
                                                                                                <input class="form-control" title="further_name_sc" type="text" name="further_name_sc[]" value="">
                                                                                                {!! $errors->first('further_name_sc' , '<p class="help-block text-danger">:message</p>') !!}
                                                                                            </div>
                                                                                            <div class="form-group mb-5{{ $errors->has('further_url') ? 'has-error' : '' }}">
                                                                                                <label for="further_url" class="form-label">Further Reading URL</label>
                                                                                                <input class="form-control" title="further_url" type="text" name="further_url[]" value="">
                                                                                                {!! $errors->first('further_url' , '<p class="help-block text-danger">:message</p>') !!}
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                    @if ($type == "coupon")
                                                                        <div
                                                                            class="form-group mb-5{{ $errors->has('coupon_ids') ? 'has-error' : '' }}">
                                                                            <label for="coupon_ids" class="form-label">Coupon Ids</label><br />
                                                                            <select name="coupon_ids[]" class="form-select check-item coupon_ids" data-control="select2" data-placeholder="Select Coupon Ids" multiple>
                                                                                @foreach ($couponList as $data)
                                                                                    <option value="{{ $data->id }}" {{ isset($extFeature->coupon_ids) && in_array($data->id, json_decode($extFeature->coupon_ids)) ? 'selected' : '' }}>
                                                                                        {{ $data->name_en . "($data->coupon_code)" }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                            {!! $errors->first('coupon_ids', '<p class="help-block text-danger">:message</p>') !!}
                                                                        </div>
                                                                    @endif
                                                                    @if ($type == "banner")
                                                                        <div class="panel-block">
                                                                            <div class="form-group">
                                                                                <label for="merchant_banner_img" class="form-label">Banner Image</label><br />
                                                                                <div id="holder-img">
                                                                                        @if(!empty($extFeature->merchant_banner_img))
                                                                                            <div class='lfmimage-container imglfmc0'>
                                                                                                <img src="{{ asset($extFeature->merchant_banner_img) }}" class='lfmimage w-100' style="height: 20rem;">
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
                                                                                    <input id="img" class="form-control" type="text" name="merchant_banner_img" value="{{isset($extFeature) ? $extFeature->merchant_banner_img : ''}}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                    @if ($type == "product-filter")
                                                                        <div class="form-group mb-5{{ $errors->has('key_item_ids') ? 'has-error' : '' }}">
                                                                            <label for="key_item_ids" class="form-label">Key Item Ids</label><br />
                                                                            <select name="key_item_ids[]" class="form-select check-item key_item_ids" data-control="select2" data-placeholder="Select Key Item Ids" multiple>
                                                                                @foreach ($key_item_list as $data)
                                                                                    <option value="{{ $data->id }}" {{ isset($extFeature->key_item_ids) && in_array($data->id, json_decode($extFeature->key_item_ids)) ? 'selected' : '' }}>
                                                                                        {{ $data->name_en }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                            {!! $errors->first('key_item_ids', '<p class="help-block text-danger">:message</p>') !!}
                                                                        </div>
                                                                        <div class="form-group mb-5{{ $errors->has('highlight_tag_ids') ? 'has-error' : '' }}">
                                                                            <label for="highlight_tag_ids" class="form-label">HighLight Tag Ids</label><br />
                                                                            <select name="highlight_tag_ids[]" class="form-select check-item highlight_tag_ids" data-control="select2" data-placeholder="Select HighLight Tag Ids" multiple>
                                                                                @foreach ($highlight_tag_list as $data)
                                                                                    <option value="{{ $data->id }}" {{ isset($extFeature->highlight_tag_ids) && in_array($data->id, json_decode($extFeature->highlight_tag_ids)) ? 'selected' : '' }}>
                                                                                        {{ $data->name_en }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                            {!! $errors->first('highlight_tag_ids', '<p class="help-block text-danger">:message</p>') !!}
                                                                        </div>
                                                                        <div class="form-group mb-5{{ $errors->has('sub_category_id') ? 'has-error' : '' }}">
                                                                            <label for="sub_category_id" class="form-label">Sub Category Name</label><br />
                                                                            <select name="sub_category_id" class="form-select check-item sub_category_id" data-control="select2" data-placeholder="Select Sub Category Name">
                                                                                @foreach ($subCategoryList as $data)
                                                                                    <option value="{{ $data->id }}" {{ isset($extFeature->sub_category_id) && $data->id == $extFeature->sub_category_id ? 'selected' : '' }}>
                                                                                        {{ $data->name_en }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                            {!! $errors->first('sub_category_id', '<p class="help-block text-danger">:message</p>') !!}
                                                                        </div>
                                                                    @endif
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
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" type="text/css" href="{{ asset('backend/css/tagmanager.min.css') }}">
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/tagmanager.min.js') }}"></script>
    <script type="text/javascript">
        var feature = 0;

        function addFeature(section) {
            feature++;
            let featureelement = `<div class="row panel-${feature} mb-3">
                                    <div class="col-10">
                                        <select class="form-select" name="feature_type[]" data-placeholder="Select an option">
                                            <option value="description">Text Editor</option>
                                            <option value="product-comparison">Table (Product)</option>
                                            <option value="table">Table (Header)</option>
                                            <option value="header-table">Table</option>
                                            <option value="download">Download Document</option>
                                            <option value="form-submission">Form Submission</option>
                                            <option value="product-listing">Product Listing</option>
                                            <option value="coupon">Coupon</option>
                                            <option value="banner">Banner</option>
                                            <option value="further">Further Reading</option>
                                            <option value="product-filter">Product Filtering</option>
                                            <option value="video">Video</option>
                                            <option value="image">Image</option>
                                            <option value="button">Button</option>
                                            <option value="faq">FAQs</option>
                                            <option value="memo">Memo</option>
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <button type="button" onclick="removeFeature(${feature})" class="btn btn-sm btn-danger text-end">-</button>
                                    </div>
                                </div>`;
    
            $(`#feature-panel`).append(featureelement);
    
        };
    
        function removeFeature(feature) {
            $(`#feature-panel .panel-${feature}`).remove();
        }

        $(document).ready(function() {
            $(".product_ids").select2({
                placeholder: "Select Product",
                allowClear: true
            });
            $(".coupon_ids").select2({
                placeholder: "Select Coupon",
                allowClear: true
            });
            $(".key_item_ids").select2({
                placeholder: "Select Key Items",
                allowClear: true
            });
            $(".highlight_tag_ids").select2({
                placeholder: "Select Highlight Tag",
                allowClear: true
            });
            $(".sub_category_id").select2({
                placeholder: "Select Sub Category Name",
                allowClear: true
            });

            $(document).on('change','#auto_sc_translate',function() {
                let val = $(this).prop('checked') ? '1' : '0';
                let simplified_content=$('#desc_sc');

                if (val==1){
                    let content = tinymce.get("desc_tc").getContent({format : 'text'});

                    $.ajax({
                        url: "{{ url('/admin/feature-auto-translate') }}",
                        data: {'val': val, 'cont': content},
                        type: 'get',
                        success: function (response) {
                            response['content']!==''?tinymce.get("desc_sc").setContent(response['content']):tinymce.get("desc_sc").setContent('')
                        }
                    });
                }
                else {
                    tinymce.get("desc_sc").setContent('')
                }

            });

            $(document).on('change','#auto_eng_translate',function() {
                let val = $(this).prop('checked') ? '1' : '0';
                let eng_content=$('#desc_en');

                if (val==1){
                    let content = tinymce.get("desc_tc").getContent({format : 'text'});

                    $.ajax({
                        url: "{{ url('/admin/feature-eng-auto-translate') }}",
                        data: {'val': val, 'cont': content},
                        type: 'get',
                        success: function (response) {
                            response['content']!==''?tinymce.get("desc_en").setContent(response['content']):tinymce.get("desc_en").setContent('')
                        }
                    });
                }
                else {
                    tinymce.get("desc_en").setContent('')
                }

            });
        });

        function deleteFeature(e) {
            e.preventDefault();
            var urlToRedirect = e.currentTarget.getAttribute('href');
            Swal.fire({
                html: `Are you sure you want to delete?`,
                icon: "warning",
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: "Delete",
                cancelButtonText: 'Cancel',
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: 'btn btn-danger'
                }
            }).then((result) => {
                if(result.isConfirmed){
                    window.location = urlToRedirect;
                }
            })
        }
    </script>
    <script type="text/javascript">
        var count = 1;
        var further = 1;
        
        function addDownloadSource() {
            count++;
            let element = `<div class="border border-outlin-dashed p-4 mb-3 row-${count}">
            <div class="row">
                <div class="col-12 text-end">
                    <button type="button" onclick="removeDownloadSource(${count})" class="btn btn-sm btn-danger text-end">-</button>
                </div>
            </div>
            <div class="row">
                <div class="form-group mb-5">
                    <label for="download_name_en" class="form-label">Sample Download File Name(EN)</label>
                    <input class="form-control" title="download_name_en" type="text" name="download_name_en[]" value="">
                </div>
                <div class="form-group mb-5">
                    <label for="download_name_tc" class="form-label">Sample Download File Name(TC)</label>
                    <input class="form-control" title="download_name_tc" type="text" name="download_name_tc[]" value="">
                </div>
                <div class="form-group mb-5">
                    <label for="download_name_sc" class="form-label">Sample Download File Name(CN)</label>
                    <input class="form-control" title="download_name_sc" type="text" name="download_name_sc[]" value="">
                </div>
                <div class="form-group mb-5">
                    <label for="sample_download_file" class="form-label">Sample Download File</label>
                    <input class="form-control" title="sample_download_file" type="file" name="sample_download_file[]" accept=".pdf">
                </div>
            </div>
            </div>`;
    
            $('#download-panel').append(element);
    
        };

        function addFurther() {
            further++;
            let furtherelement = `<div class="border border-outlin-dashed p-4 mb-3 row-${further}">
            <div class="row">
                <div class="col-12 text-end">
                    <button type="button" onclick="removeFurther(${further})" class="btn btn-sm btn-danger text-end">-</button>
                </div>
            </div>
            <div class="row">
                <div class="form-group mb-5">
                    <label for="further_name_en" class="form-label">Further Reading Name(EN)</label>
                    <input class="form-control" title="further_name_en" type="text" name="further_name_en[]" value="">
                </div>
                <div class="form-group mb-5">
                    <label for="further_name_tc" class="form-label">Further Reading Name(TC)</label>
                    <input class="form-control" title="further_name_tc" type="text" name="further_name_tc[]" value="">
                </div>
                <div class="form-group mb-5">
                    <label for="further_name_sc" class="form-label">Further Reading Name(CN)</label>
                    <input class="form-control" title="further_name_sc" type="text" name="further_name_sc[]" value="">
                </div>
                <div class="form-group mb-5">
                    <label for="further_url" class="form-label">Further Reading URL</label>
                    <input class="form-control" title="further_url" type="text" name="further_url[]" value="">
                </div>
            </div>
            </div>`;
    
            $('#further-panel').append(furtherelement);
    
        };
    
        function removeDownloadSource(count) {
            $(`#download-panel .row-${count}`).remove();
        }

        function removeFurther(further) {
            $(`#further-panel .row-${further}`).remove();
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".tm-input").tagsManager({
                // prefilled: [],
                // typeaheadSource:[],
                // // hiddenTagListName: 'hiddenTagListA',
                // hiddenTagListName: 'hiddenTagListA',
                // hiddenTagListId: "{{ isset($blog) && $blog->related_keywords != null ? $blog->related_keywords : '' }}",
                // hiddenTagListId: "{{ isset($blog) && $blog->related_keywords != null ? $blog->related_keywords : '' }}"
            });
            
            @if(isset($extFeature->image_gallery_alt_text))
            let $oldImageGalleryAltText = <?php echo $extFeature->image_gallery_alt_text; ?>;

            $($oldImageGalleryAltText).each(function(index, value) {
                $(".tm-input").tagsManager('pushTag', value);
            });
            @endif
        });

        $(document).ready(function() {
        // $("body").on("click", ".btn-blog-details", function(e) {
        //     e.preventDefault();
        //     let formData = new FormData(document.getElementById('frm-blog-details' + $(this).attr(
        //         "data-id")));
        //     $(".text-danger").addClass("hidden")
        //     $(".text-danger").html("")
        //     if ($(this).attr("data-id") != 6 && $(this).attr("data-id") != 7 && $(this).attr(
        //             "data-id") != 9 && $(this).attr("data-id") != 10 && $(this).attr("data-id") != 11 &&
        //         $(this).attr("data-id") != 12 && $(this).attr("data-id") != 14) {
        //         formData.set('desc_en', tinymce.get('desc_en' + $(this).attr("data-id")).getContent(
        //             ""));
        //         formData.set('desc_sc', tinymce.get('desc_sc' + $(this).attr("data-id")).getContent(
        //             ""));
        //         formData.set('desc_tc', tinymce.get('desc_tc' + $(this).attr("data-id")).getContent(
        //             ""));
        //     }
        //     if($(this).attr("data-id") == 14) {
        //         for (let i = 0; i < 100; i++) {
        //             if( $('#answer_en_'+i).length )         // use this if you are using id to check
        //             {
        //                 formData.append('answer_en[]', tinymce.get('answer_en_'+i).getContent(""));
        //             }
        //             if( $('#answer_sc_'+i).length )         // use this if you are using id to check
        //             {
        //                 formData.append('answer_sc[]', tinymce.get('answer_sc_'+i).getContent(""));
        //             }
        //             if( $('#answer_tc_'+i).length )         // use this if you are using id to check
        //             {
        //                 formData.append('answer_tc[]', tinymce.get('answer_tc_'+i).getContent(""));
        //             }
        //         }
        //     }
        //     $.ajax({
        //         type: 'POST',
        //         url: "{{ route('saveBlogDetails') }}",
        //         data: formData,
        //         contentType: false,
        //         processData: false,
        //         success: (response) => {
        //             //console.log(response)
        //             if (response.status == 'success') {
        //                 window.location.href =
        //                     "{{ route('blogDetails', ['blog_id' => request()->route('blog_id'), 'title_id' => 1]) }}";
        //             }
        //         },
        //         error: function(data) {
        //             //console.log(data)
        //             $.each(data.responseJSON.errors, function(k, v) {
        //                 if (k == "title_no_en") {
        //                     let errorTxt = v[0];
        //                     $("p#title_no_en").html(errorTxt);
        //                     $("p#title_no_en").removeClass("hidden");
        //                 }
        //                 if (k == "title_no_sc") {
        //                     let errorTxt = v[0];
        //                     $("p#title_no_sc").html(errorTxt);
        //                     $("p#title_no_sc").removeClass("hidden");
        //                 }
        //                 if (k == "title_no_tc") {
        //                     let errorTxt = v[0];
        //                     $("p#title_no_tc").html(errorTxt);
        //                     $("p#title_no_tc").removeClass("hidden");
        //                 }
        //                 if (k == "title_en") {
        //                     let errorTxt = v[0];
        //                     $("p#title_en").html(errorTxt);
        //                     $("p#title_en").removeClass("hidden");
        //                 }
        //                 if (k == "title_sc") {
        //                     let errorTxt = v[0];
        //                     $("p#title_sc").html(errorTxt);
        //                     $("p#title_sc").removeClass("hidden");
        //                 }
        //                 if (k == "title_tc") {
        //                     let errorTxt = v[0];
        //                     $("p#title_tc").html(errorTxt);
        //                     $("p#title_tc").removeClass("hidden");
        //                 }
        //                 if (k == "sort_order_no") {
        //                     let errorTxt = v[0];
        //                     $("p#sort_order_no").html(errorTxt);
        //                     $("p#sort_order_no").removeClass("hidden");
        //                 }
        //             });
        //         }
        //     });
        // });

        var index = parseInt($(".faq:last").attr("data-index"));

        $('.addNewFaq').on('click', function() {
            index += 1;
            var row = localStorage.getItem('faqRow');
            row++;

            localStorage.setItem('faqRow', row);
            var attr = $(this).data('attr');
            $.ajax({
                type: "POST",
                url: "{{ route('admin.get-blog-faq-form') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    attr: attr,
                    index: index
                },
                datatype: 'json',
                success: function(json) {

                    $('#en_getNewFaqRow').append(json[0]);
                    $('#tc_getNewFaqRow').append(json[1]);
                    $('#sc_getNewFaqRow').append(json[2]);

                    tinymce.init(editor_config)

                }
            });

        })

            for (let i = 0; i < 100; i++) {
                $(document).on('click', `.removeNewFaqBtn${i}`, function() {
                    $(`.inputVariationsRow${i}`).remove()
                })
            }

        });
    </script>
@endpush

<div class="card mt-4">
    <div class="card-body">
        @if ($errors->any())
            {{ implode('', $errors->all('<div>:message</div>')) }}
        @endif
        <div class="py-5">
            <div class="d-flex flex-column flex-md-row rounded border p-10">
                <ul class="nav nav-tabs nav-pills flex-row border-0 flex-md-column me-5 mb-3 mb-md-0 fs-6">
                    <input type="text" name="check_up_type_id" id="check-up-type-id" value="1" hidden>
                    @for ($i = 1; $i <= 14; $i++)
                        <li class="nav-item me-0 mb-md-2">
                            <a class="check-up-type min-w-200px nav-link btn btn-flex btn-active-light-primary {{ request()->route('title_id') == $i ? 'active' : '' }}"
                                href="{{ url('admin/blog/details/' . request()->route('blog_id') . '/' . $i) }}"
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
                                        @if ($i == 1)
                                            Content 1
                                        @elseif($i == 2)
                                            Content 2
                                        @elseif($i == 3)
                                            Content 3
                                        @elseif($i == 4)
                                            TABLE <br />(without heading)
                                        @elseif($i == 5)
                                            TABLE <br />(with heading)
                                        @elseif($i == 6)
                                            TABLE <br />(Product Comparison)
                                        @elseif($i == 7)
                                            DOWNLOAD DOCUMENT
                                        @elseif($i == 8)
                                            FORM SUBMISSION
                                        @elseif($i == 9)
                                            Product Listing
                                        @elseif($i == 10)
                                            Coupon
                                        @elseif($i == 11)
                                            Banner
                                        @elseif($i == 12)
                                            FURTHER READING
                                        @elseif($i == 13)
                                            Video
                                        @elseif($i == 14)
                                            FAQ
                                        @endif
                                    </span>
                                </span>
                            </a>
                        </li>
                    @endfor
                </ul>
                <div class="tab-content w-100" id="myTabContent">
                    @for ($i = 1; $i <= 14; $i++)
                        <div class="tab-pane fade {{ request()->route('title_id') == $i ? 'active show' : '' }}"
                            id="" role="tabpanel">
                            <form action="#" method="POST" id="frm-blog-details{{ $i }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card">
                                    <div class="card-header border-0">
                                        <div class="card-title">
                                            <h2>
                                                @if ($i == 1)
                                                    Content 1
                                                @elseif($i == 2)
                                                    Content 2
                                                @elseif($i == 3)
                                                    Content 3
                                                @elseif($i == 4)
                                                    TABLE <br />(without heading)
                                                @elseif($i == 5)
                                                    TABLE <br />(with heading)
                                                @elseif($i == 6)
                                                    TABLE <br />(Product Comparison)
                                                @elseif($i == 7)
                                                    DOWNLOAD DOCUMENT
                                                @elseif($i == 8)
                                                    FORM SUBMISSION
                                                @elseif($i == 9)
                                                    Product Listing
                                                @elseif($i == 10)
                                                    Coupon
                                                @elseif($i == 11)
                                                    Banner
                                                @elseif($i == 12)
                                                    FURTHER READING
                                                @elseif($i == 13)
                                                    Video
                                                @elseif($i == 14)
                                                    FAQ
                                                @endif
                                            </h2>
                                        </div>
                                        <div class="card-toolbar">
                                            <div class="d-flex justify-content-end"
                                                data-kt-customer-table-toolbar="base">
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
                                                            <input type="hidden" name="id"
                                                                value="{{ $blogDetails != null ? $blogDetails->id : null }}">
                                                            <input type="hidden" name="blog_id"
                                                                value="{{ request()->route('blog_id') }}">
                                                            <input type="hidden" name="title_id"
                                                                value="{{ request()->route('title_id') }}">
                                                            <button type="button"
                                                                class="btn btn-primary btn-sm btn-blog-details"
                                                                data-id="{{ $i }}"><i
                                                                    class="bi bi-sd-card"></i> Save</button>
                                                            <a href="{{ url('admin/blog') }}" title="Back"><button
                                                                    type="button"
                                                                    class="btn btn-secondary btn-sm cancel"><i
                                                                        class="bi bi-x" aria-hidden="true"></i>
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
                                                                    <a onclick="showHideDescriptionContent('{{ strtolower($lngcode . $i) }}')"
                                                                        class="nav-link {{ $lngcode == 'EN' ? 'active' : '' }} nav_link"
                                                                        data-bs-toggle="tab"
                                                                        href="#{{ strtolower($lngcode . $i) }}-tab">
                                                                        <span
                                                                            class="d-sm-none">{{ $lng }}</span>
                                                                        <span
                                                                            class="d-sm-block d-none">{{ $lng }}</span>
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    @php
                                                        $checkOldBlog = App\Models\BlogDetails::select('blog_details.*')
                                                            ->where('blog_id', request()->route('blog_id'))
                                                            ->where('title_no_en', request()->route('title_id'))
                                                            ->limit(1)
                                                            ->get();
                                                    @endphp
                                                    <div class="card-body">
                                                        <div class="card-body content-body">
                                                            <div class="tab-content">
                                                                <div
                                                                    class="form-group mb-5{{ $errors->has('sort_order_no') ? 'has-error' : '' }}">
                                                                    <label for="sort_order_no"
                                                                        class="form-label required">Sort Order
                                                                        No</label>
                                                                    <input class="form-control" title="sort_order_no"
                                                                        type="number" name="sort_order_no"
                                                                        value="{{ count($checkOldBlog) > 0 && $checkOldBlog[0]->sort_order_no != null ? $checkOldBlog[0]->sort_order_no : $i }}">
                                                                    <p class="help-block text-danger hidden"
                                                                        id="sort_order_no"></p>
                                                                </div>
                                                                @foreach (config('lng.attr') as $lngcode => $attr)
                                                                    <div class="tab-pane fade {{ $attr == 'en' ? 'active show' : '' }}"
                                                                        id="{{ strtolower($lngcode . $i) }}-tab">
                                                                        <div class="form-group mb-5{{ $errors->has('title_no_' . $attr) ? 'has-error' : '' }}"
                                                                            style="display: none">
                                                                            <label
                                                                                for="title_no_{{ $attr }}"class="form-label required">Title
                                                                                No
                                                                                ({{ $lngcode }})
                                                                            </label>
                                                                            @php
                                                                                $title_no = '';
                                                                                $title_no_label = 'title_no_' . $attr;
                                                                                $title = '';
                                                                                $title_label = 'title_' . $attr;
                                                                                $desc = '';
                                                                                $desc_label = 'desc_' . $attr;
                                                                                if (count($checkOldBlog) > 0) {
                                                                                    $title_no =
                                                                                        $checkOldBlog[0]
                                                                                            ->{$title_no_label};
                                                                                    $title =
                                                                                        $checkOldBlog[0]
                                                                                            ->{$title_label};
                                                                                    $desc =
                                                                                        $checkOldBlog[0]->{$desc_label};
                                                                                }
                                                                            @endphp
                                                                            <input class="form-control"
                                                                                title="title_no_{{ $attr }}"
                                                                                type="text"
                                                                                name="title_no_{{ $attr }}"
                                                                                disabled value="{{ $i }}">
                                                                            {{-- {!! $errors->first('title_no_' . $attr, '<p class="help-block text-danger">:message</p>') !!} --}}
                                                                            <p class="help-block text-danger hidden"
                                                                                id="title_no_{{ $attr }}"></p>
                                                                        </div>
                                                                        {{-- <div class="form-group mb-5{{ $errors->has('sort_order_no') ? 'has-error' : '' }}">
                                                                            <label for="sort_order_no"
                                                                                class="form-label">Sort Order No</label>
                                                                            <input class="form-control"
                                                                                title="sort_order_no" type="number"
                                                                                name="sort_order_no"
                                                                                value="{{ count($checkOldBlog) > 0 && $checkOldBlog[0]->sort_order_no != null ? $checkOldBlog[0]->sort_order_no : $i }}">
                                                                            <p class="help-block text-danger hidden"
                                                                                id="sort_order_no"></p>
                                                                        </div> --}}
                                                                        <div
                                                                            class="form-group mb-5{{ $errors->has('title_' . $attr) ? 'has-error' : '' }}">
                                                                            <label for="title_{{ $attr }}"
                                                                                class="form-label required">Title
                                                                                ({{ $lngcode }})</label>
                                                                            <input class="form-control"
                                                                                title="title_{{ $attr }}"
                                                                                type="text"
                                                                                name="title_{{ $attr }}"
                                                                                value="{{ $title }}">
                                                                            <p class="help-block text-danger hidden"
                                                                                id="title_{{ $attr }}"></p>
                                                                        </div>
                                                                        @if ($i != 6 && $i != 7 && $i != 9 && $i != 10 && $i != 11 && $i != 12 && $i != 14)
                                                                            <div
                                                                                class="form-group mb-5{{ $errors->has('desc_' . $attr) ? 'has-error' : '' }}">
                                                                                <label for="desc_{{ $attr }}"
                                                                                    class="form-label">Description
                                                                                    ({{ $lngcode }})</label>
                                                                                <textarea class="form-control editor" name="desc_{{ $attr }}"
                                                                                    id="desc_{{ $attr }}{{ $i }}" cols="50" rows="10" aria-hidden="true">{{ $desc }}</textarea>
                                                                                {!! $errors->first('desc_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                                            </div>
                                                                        @endif
                                                                        @if ($i == 7)
                                                                            @php
                                                                                $download1_name = '';
                                                                                $download1_name_label =
                                                                                    'download1_name_' . $attr;
                                                                                $download2_name = '';
                                                                                $download2_name_label =
                                                                                    'download2_name_' . $attr;
                                                                                if (count($checkOldBlog) > 0) {
                                                                                    $download1_name =
                                                                                        $checkOldBlog[0]
                                                                                            ->{$download1_name_label};
                                                                                    $download2_name =
                                                                                        $checkOldBlog[0]
                                                                                            ->{$download2_name_label};
                                                                                }
                                                                            @endphp
                                                                            <div
                                                                                class="form-group mb-5{{ $errors->has('download1_name_' . $attr) ? 'has-error' : '' }}">
                                                                                <label
                                                                                    for="download1_name_{{ $attr }}"
                                                                                    class="form-label">Sample Download
                                                                                    File 1 Name
                                                                                    ({{ $lngcode }})</label>
                                                                                <input class="form-control"
                                                                                    title="download1_name_{{ $attr }}"
                                                                                    type="text"
                                                                                    name="download1_name_{{ $attr }}"
                                                                                    value="{{ $download1_name }}">
                                                                                {!! $errors->first('download1_name_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                                            </div>
                                                                            <div
                                                                                class="form-group mb-5{{ $errors->has('download2_name_' . $attr) ? 'has-error' : '' }}">
                                                                                <label
                                                                                    for="download2_name_{{ $attr }}"
                                                                                    class="form-label">Sample
                                                                                    Download File 2 Name
                                                                                    ({{ $lngcode }})</label>
                                                                                <input class="form-control"
                                                                                    title="download2_name_{{ $attr }}"
                                                                                    type="text"
                                                                                    name="download2_name_{{ $attr }}"
                                                                                    value="{{ $download2_name }}">
                                                                                {!! $errors->first('download2_name_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                                                                            </div>
                                                                        @endif

                                                                        @if ($i == 14)
                                                                            <button data-attr="{{ $attr }}" type="button" class="addNewFaq btn btn-success" style="width:30px;height:30px; padding-top: 5px; padding-left: 10px;">+</button>
                                                                            @php $index = 0; @endphp
                                                                            @if(count($blogDetailsFaq)>0)
                                                                                @foreach ($blogDetailsFaq as $key => $detail)
                                                                                    @php $index=$key @endphp
                                                                                    @include('admin.blog.blogfaqform')
                                                                                @endforeach
                                                                            @else
                                                                                @include('admin.blog.blogfaqform')
                                                                            @endif
                                                                            <div id="{{ $attr }}_getNewFaqRow"
                                                                                class="getNewFaqRow"></div>
                                                                        @endif
                                                                    </div>
                                                                @endforeach
                                                                <div class="row mt-5">
                                                                    <div class="col-md-12 col-md-12">

                                                                        @if ($i == 13)
                                                                            <div
                                                                                class="form-group mb-5{{ $errors->has('video_url') ? 'has-error' : '' }}">
                                                                                <label for="video_url"
                                                                                    class="form-label">Video
                                                                                    URL</label>
                                                                                <input class="form-control"
                                                                                    title="video_url" type="text"
                                                                                    id="video_url" name="video_url"
                                                                                    value="{{ count($checkOldBlog) > 0 ? $checkOldBlog[0]->video_url : '' }}">
                                                                                {!! $errors->first('video_url', '<p class="help-block text-danger">:message</p>') !!}
                                                                            </div>
                                                                        @endif
                                                                        @if ($i == 2)
                                                                            <div
                                                                                class="form-group mb-5{{ $errors->has('image_gallery_id') ? 'has-error' : '' }}">
                                                                                <label for="image_gallery_id"
                                                                                    class="form-label">Image
                                                                                    Gallery</label>
                                                                                <ul class="dragGroup" id="holder5">
                                                                                    @if ($blogImages !== null && count($blogImages) > 0)
                                                                                        @foreach ($blogImages as $key => $imgdata)
                                                                                            @if ($imgdata->blog_details_no == $i)
                                                                                                @if ($imgdata->img !== null)
                                                                                                    @foreach (json_decode($imgdata->img) as $img)
                                                                                                        <li class="draggable w-100 draggableItem0 thumbnail4lfmc0"
                                                                                                            draggable="true">
                                                                                                            <input
                                                                                                                type="hidden"
                                                                                                                name="holder5[]'"
                                                                                                                value="{{ $img }}"
                                                                                                                id="galleryImage0">
                                                                                                            <img src="{{ $img }}"
                                                                                                                class="lfmimage w-100">
                                                                                                            <div>
                                                                                                                <button
                                                                                                                    type="button"
                                                                                                                    onclick="removeGImage(this)"
                                                                                                                    class="btn btn-sm btn-danger w-100"
                                                                                                                    style="border-radius: 1px 1px 8px 8px;">Remove</button>
                                                                                                            </div>
                                                                                                        </li>
                                                                                                    @endforeach
                                                                                                @endif
                                                                                            @endif
                                                                                        @endforeach
                                                                                    @else
                                                                                        <img src="{{ asset('backend/media/blank-image.svg') }}"
                                                                                            class="img-thumbnail feature-img">
                                                                                    @endif
                                                                                </ul>
                                                                                <div class="input-group mt-3">
                                                                                    <span class="input-group-btn">
                                                                                        <a id="lfm-pro"
                                                                                            data-input="thumbnail5"
                                                                                            data-preview="holder5"
                                                                                            data-ptype="g"
                                                                                            class="lfm-pro lfm-img btn btn-primary text-white">
                                                                                            <i
                                                                                                class="fa fa-picture-o"></i>
                                                                                            Choose
                                                                                        </a>
                                                                                    </span>
                                                                                </div>

                                                                                {!! $errors->first('image_gallery_id', '<p class="help-block text-danger">:message</p>') !!}
                                                                            </div>
                                                                            <div class="form-group mb-5">
                                                                                <label for="title_en"
                                                                                    class="form-label">Image Gallery
                                                                                    Alt Text</label><br />
                                                                                @php
                                                                                    $oldImageGalleryAltText = [];
                                                                                    if (
                                                                                        isset($blogDetails) &&
                                                                                        $blogDetails->image_gallery_alt_text !=
                                                                                            null
                                                                                    ) {
                                                                                        $oldImageGalleryAltText = explode(
                                                                                            ',',
                                                                                            $blogDetails->image_gallery_alt_text,
                                                                                        );
                                                                                    }
                                                                                @endphp
                                                                                <input type="text"
                                                                                    name="image_gallery_alt_text"
                                                                                    placeholder="Type Image Gallery Alt Text"
                                                                                    class="tm-input form-control tm-input-info" />
                                                                            </div>
                                                                        @endif
                                                                        @if ($i == 3)
                                                                            <div
                                                                                class="form-group mb-5{{ $errors->has('image_gallery_id') ? 'has-error' : '' }}">
                                                                                <label for="image_gallery_id"
                                                                                    class="form-label">Image
                                                                                    Gallery</label>
                                                                                <ul class="dragGroup" id="holder6">
                                                                                    @if ($blogImages != null && count($blogImages) > 0)
                                                                                        @foreach ($blogImages as $key => $imgdata)
                                                                                            @if ($imgdata->blog_details_no == $i)
                                                                                                @if ($imgdata->img !== null)
                                                                                                    @foreach (json_decode($imgdata->img) as $img)
                                                                                                        <li class="draggable w-100 draggableItem0 thumbnail4lfmc0"
                                                                                                            draggable="true">
                                                                                                            <input
                                                                                                                type="hidden"
                                                                                                                name="holder6[]'"
                                                                                                                value="{{ $img }}"
                                                                                                                id="galleryImage0">
                                                                                                            <img src="{{ $img }}"
                                                                                                                class="lfmimage w-100">
                                                                                                            <div>
                                                                                                                <button
                                                                                                                    type="button"
                                                                                                                    onclick="removeGImage(this)"
                                                                                                                    class="btn btn-sm btn-danger w-100"
                                                                                                                    style="border-radius: 1px 1px 8px 8px;">Remove</button>
                                                                                                            </div>
                                                                                                        </li>
                                                                                                    @endforeach
                                                                                                @endif
                                                                                            @endif
                                                                                        @endforeach
                                                                                    @else
                                                                                        <img src="{{ asset('backend/media/blank-image.svg') }}"
                                                                                            class="img-thumbnail feature-img">
                                                                                    @endif
                                                                                </ul>
                                                                                <div class="input-group mt-3">
                                                                                    <span class="input-group-btn">
                                                                                        <a id="lfm-pro"
                                                                                            data-input="thumbnail6"
                                                                                            data-preview="holder6"
                                                                                            data-ptype="g"
                                                                                            class="lfm-pro lfm-img btn btn-primary text-white">
                                                                                            <i
                                                                                                class="fa fa-picture-o"></i>
                                                                                            Choose
                                                                                        </a>
                                                                                    </span>
                                                                                    {{-- <input id="thumbnail6" class="form-control" type="text" name="services_facilities[]"
                                                                                        multiple> --}}
                                                                                </div>
                                                                                {!! $errors->first('image_gallery_id', '<p class="help-block text-danger">:message</p>') !!}
                                                                            </div>
                                                                            <div class="form-group mb-5">
                                                                                <label for="title_en"
                                                                                    class="form-label">Image Gallery
                                                                                    Alt Text</label><br />
                                                                                @php
                                                                                    $oldImageGalleryAltText = [];
                                                                                    if (
                                                                                        isset($blogDetails) &&
                                                                                        $blogDetails->image_gallery_alt_text !=
                                                                                            null
                                                                                    ) {
                                                                                        $oldImageGalleryAltText = explode(
                                                                                            ',',
                                                                                            $blogDetails->image_gallery_alt_text,
                                                                                        );
                                                                                    }
                                                                                @endphp
                                                                                <input type="text"
                                                                                    name="image_gallery_alt_text"
                                                                                    placeholder="Type Image Gallery Alt Text"
                                                                                    class="tm-input form-control tm-input-info" />
                                                                            </div>
                                                                        @endif
                                                                        @if ($i == 7)
                                                                            <div
                                                                                class="form-group mb-5{{ $errors->has('sample_download_file_1') ? 'has-error' : '' }}">
                                                                                <label for="sample_download_file_1"
                                                                                    class="form-label">Sample
                                                                                    Download File 1</label>
                                                                                <input class="form-control"
                                                                                    title="sample_download_file_1"
                                                                                    type="file"
                                                                                    id="sample_download_file_1"
                                                                                    name="sample_download_file_1"
                                                                                    accept=".pdf">
                                                                                {!! $errors->first('sample_download_file_1', '<p class="help-block text-danger">:message</p>') !!}
                                                                            </div>
                                                                            <div
                                                                                class="form-group mb-5{{ $errors->has('sample_download_file_2') ? 'has-error' : '' }}">
                                                                                <label for="sample_download_file_1"
                                                                                    class="form-label">Sample
                                                                                    Download File 2</label>
                                                                                <input class="form-control"
                                                                                    title="sample_download_file_2"
                                                                                    type="file"
                                                                                    id="sample_download_file_2"
                                                                                    name="sample_download_file_2"
                                                                                    accept=".pdf">
                                                                                {!! $errors->first('sample_download_file_2', '<p class="help-block text-danger">:message</p>') !!}
                                                                            </div>
                                                                        @endif
                                                                        {{-- @if ($i == 7)
                                                                            <div
                                                                                class="form-group mb-5{{ $errors->has('sample_download_file_1') ? 'has-error' : '' }}">
                                                                                <label for="sample_download_file_1"
                                                                                    class="form-label">Sample
                                                                                    Download File 1</label>
                                                                                <input class="form-control"
                                                                                    title="sample_download_file_1"
                                                                                    type="file"
                                                                                    id="sample_download_file_1"
                                                                                    name="sample_download_file_1">
                                                                                {!! $errors->first('sample_download_file_1', '<p class="help-block text-danger">:message</p>') !!}
                                                                            </div>
                                                                            <div
                                                                                class="form-group mb-5{{ $errors->has('sample_download_file_2') ? 'has-error' : '' }}">
                                                                                <label for="sample_download_file_1"
                                                                                    class="form-label">Sample
                                                                                    Download File 2</label>
                                                                                <input class="form-control"
                                                                                    title="sample_download_file_2"
                                                                                    type="file"
                                                                                    id="sample_download_file_2"
                                                                                    name="sample_download_file_2">
                                                                                {!! $errors->first('sample_download_file_2', '<p class="help-block text-danger">:message</p>') !!}
                                                                            </div>
                                                                        @endif --}}
                                                                        @php
                                                                            $oldProductIds = [];
                                                                            $oldCouponIds = [];
                                                                            $oldKeyItemIds = [];
                                                                            $oldHighlightTagIds = [];
                                                                            $oldSubCategoryId = 0;
                                                                            if (count($checkOldBlog) > 0) {
                                                                                if (
                                                                                    $checkOldBlog[0]->product_ids !=
                                                                                    null
                                                                                ) {
                                                                                    $oldProductIds = explode(
                                                                                        ',',
                                                                                        $checkOldBlog[0]->product_ids,
                                                                                    );
                                                                                }
                                                                                if (
                                                                                    $checkOldBlog[0]->coupon_ids != null
                                                                                ) {
                                                                                    $oldCouponIds = explode(
                                                                                        ',',
                                                                                        $checkOldBlog[0]->coupon_ids,
                                                                                    );
                                                                                }
                                                                                if (
                                                                                    $checkOldBlog[0]->key_item_ids !=
                                                                                    null
                                                                                ) {
                                                                                    $oldKeyItemIds = explode(
                                                                                        ',',
                                                                                        $checkOldBlog[0]->key_item_ids,
                                                                                    );
                                                                                }
                                                                                if (
                                                                                    $checkOldBlog[0]
                                                                                        ->highlight_tag_ids != null
                                                                                ) {
                                                                                    $oldHighlightTagIds = explode(
                                                                                        ',',
                                                                                        $checkOldBlog[0]
                                                                                            ->highlight_tag_ids,
                                                                                    );
                                                                                }
                                                                                if (
                                                                                    $checkOldBlog[0]->sub_category_id !=
                                                                                    null
                                                                                ) {
                                                                                    $oldSubCategoryId =
                                                                                        $checkOldBlog[0]
                                                                                            ->sub_category_id;
                                                                                }
                                                                            }
                                                                        @endphp
                                                                        @if ($i == 6 || $i == 9)
                                                                            <div
                                                                                class="form-group mb-5{{ $errors->has('product_ids') ? 'has-error' : '' }}">
                                                                                <label for="product_ids"
                                                                                    class="form-label">Product
                                                                                    Ids</label><br />

                                                                                <select name="product_ids[]"
                                                                                    class="form-select check-item product_ids"
                                                                                    data-control="select2"
                                                                                    data-placeholder="Select Product Ids"
                                                                                    multiple>
                                                                                    @foreach ($productList as $data)
                                                                                        <option
                                                                                            value="{{ $data->id }}"
                                                                                            {{ in_array($data->id, $oldProductIds) ? 'selected' : '' }}>
                                                                                            {{ $data->name_en }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                                {!! $errors->first('product_ids', '<p class="help-block text-danger">:message</p>') !!}
                                                                            </div>
                                                                        @endif
                                                                        @if ($i == 10)
                                                                            <div
                                                                                class="form-group mb-5{{ $errors->has('coupon_ids') ? 'has-error' : '' }}">
                                                                                <label for="coupon_ids"
                                                                                    class="form-label">Coupon
                                                                                    Ids</label><br />
                                                                                <select name="coupon_ids[]"
                                                                                    class="form-select check-item coupon_ids"
                                                                                    data-control="select2"
                                                                                    data-placeholder="Select Coupon Ids"
                                                                                    multiple>
                                                                                    @foreach ($couponList as $data)
                                                                                        <option
                                                                                            value="{{ $data->id }}"
                                                                                            {{ in_array($data->id, $oldCouponIds) ? 'selected' : '' }}>
                                                                                            {{ $data->name_en . "($data->coupon_code)" }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                                {!! $errors->first('coupon_ids', '<p class="help-block text-danger">:message</p>') !!}
                                                                            </div>
                                                                        @endif
                                                                        @if ($i == 11)
                                                                            <div
                                                                                class="form-group mb-5{{ $errors->has('merchant_banner_img') ? 'has-error' : '' }}">
                                                                                <label for="merchant_banner_img"
                                                                                    class="form-label">Merchant
                                                                                    Banner Image</label>
                                                                                <input class="form-control"
                                                                                    title="merchant_banner_img"
                                                                                    type="file"
                                                                                    id="merchant_banner_img"
                                                                                    name="merchant_banner_img"
                                                                                    accept=".png,.jpg">
                                                                                {!! $errors->first('merchant_banner_img', '<p class="help-block text-danger">:message</p>') !!}
                                                                            </div>
                                                                        @endif
                                                                        @if ($i == 12)
                                                                            <div
                                                                                class="form-group mb-5{{ $errors->has('key_item_ids') ? 'has-error' : '' }}">
                                                                                <label for="key_item_ids"
                                                                                    class="form-label">Key Item
                                                                                    Ids</label><br />

                                                                                <select name="key_item_ids[]"
                                                                                    class="form-select check-item key_item_ids"
                                                                                    data-control="select2"
                                                                                    data-placeholder="Select Key Item Ids"
                                                                                    multiple>
                                                                                    @foreach ($key_item_list as $data)
                                                                                        <option
                                                                                            value="{{ $data->id }}"
                                                                                            {{ in_array($data->id, $oldKeyItemIds) ? 'selected' : '' }}>
                                                                                            {{ $data->name_en }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                                {!! $errors->first('key_item_ids', '<p class="help-block text-danger">:message</p>') !!}
                                                                            </div>
                                                                            <div
                                                                                class="form-group mb-5{{ $errors->has('highlight_tag_ids') ? 'has-error' : '' }}">
                                                                                <label for="highlight_tag_ids"
                                                                                    class="form-label">HighLight Tag
                                                                                    Ids</label><br />

                                                                                <select name="highlight_tag_ids[]"
                                                                                    class="form-select check-item highlight_tag_ids"
                                                                                    data-control="select2"
                                                                                    data-placeholder="Select HighLight Tag Ids"
                                                                                    multiple>
                                                                                    @foreach ($highlight_tag_list as $data)
                                                                                        <option
                                                                                            value="{{ $data->id }}"
                                                                                            {{ in_array($data->id, $oldHighlightTagIds) ? 'selected' : '' }}>
                                                                                            {{ $data->name_en }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                                {!! $errors->first('highlight_tag_ids', '<p class="help-block text-danger">:message</p>') !!}
                                                                            </div>
                                                                            <div
                                                                                class="form-group mb-5{{ $errors->has('sub_category_id') ? 'has-error' : '' }}">
                                                                                <label for="sub_category_id"
                                                                                    class="form-label">Sub Category
                                                                                    Name</label><br />

                                                                                <select name="sub_category_id"
                                                                                    class="form-select check-item sub_category_id"
                                                                                    data-control="select2"
                                                                                    data-placeholder="Select Sub Category Name">
                                                                                    @foreach ($subCategoryList as $data)
                                                                                        <option
                                                                                            value="{{ $data->id }}"
                                                                                            {{ $data->id == $oldSubCategoryId ? 'selected' : '' }}>
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
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" type="text/css" href="{{ asset('backend/css/tagmanager.min.css') }}">
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/tagmanager.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            let $oldImageGalleryAltText = <?php echo json_encode($oldImageGalleryAltText); ?>;
            $(".tm-input").tagsManager({
                // prefilled: [],
                // typeaheadSource:[],
                // // hiddenTagListName: 'hiddenTagListA',
                // hiddenTagListName: 'hiddenTagListA',
                // hiddenTagListId: "{{ isset($blog) && $blog->related_keywords != null ? $blog->related_keywords : '' }}",
                // hiddenTagListId: "{{ isset($blog) && $blog->related_keywords != null ? $blog->related_keywords : '' }}"
            });
            $($oldImageGalleryAltText).each(function(index, value) {
                $(".tm-input").tagsManager('pushTag', value);
            });
        });

        function showHideDescriptionContent(tab) {
            $('.nav-item a[href="#' + tab + '-tab"]').tab('show');
            $('#tc' + tab.substring(2) + '-tab').addClass('d-none')
            $('#cn' + tab.substring(2) + '-tab').addClass('d-none')
            if (tab.substring(0, 2) == 'en') {
                $('#en' + tab.substring(2) + '-tab').removeClass('d-none')
                $('#tc' + tab.substring(2) + '-tab').addClass('d-none')
                $('#cn' + tab.substring(2) + '-tab').addClass('d-none')
            } else if (tab.substring(0, 2) == 'tc') {
                $('#tc' + tab.substring(2) + '-tab').removeClass('d-none')
                $('#en' + tab.substring(2) + '-tab').addClass('d-none')
                $('#cn' + tab.substring(2) + '-tab').addClass('d-none')
            } else {
                $('#cn' + tab.substring(2) + '-tab').removeClass('d-none')
                $('#tc' + tab.substring(2) + '-tab').addClass('d-none')
                $('#en' + tab.substring(2) + '-tab').addClass('d-none')
            }
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
        // $(".blog_ids").select2({
        //     placeholder: "Select Blog",
        //     allowClear: true
        // });
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
        // $(".product_ids").select2({placeholder: "Select Supplementary",
        //     allowClear: true});
        // $(".coupon_ids").select2();

        $("body").on("click", ".btn-blog-details", function(e) {
            e.preventDefault();
            let formData = new FormData(document.getElementById('frm-blog-details' + $(this).attr(
                "data-id")));
            $(".text-danger").addClass("hidden")
            $(".text-danger").html("")
            if ($(this).attr("data-id") != 6 && $(this).attr("data-id") != 7 && $(this).attr(
                    "data-id") != 9 && $(this).attr("data-id") != 10 && $(this).attr("data-id") != 11 &&
                $(this).attr("data-id") != 12 && $(this).attr("data-id") != 14) {
                formData.set('desc_en', tinymce.get('desc_en' + $(this).attr("data-id")).getContent(
                    ""));
                formData.set('desc_sc', tinymce.get('desc_sc' + $(this).attr("data-id")).getContent(
                    ""));
                formData.set('desc_tc', tinymce.get('desc_tc' + $(this).attr("data-id")).getContent(
                    ""));
            }
            if($(this).attr("data-id") == 14) {
                for (let i = 0; i < 100; i++) {
                    if( $('#answer_en_'+i).length )         // use this if you are using id to check
                    {
                        formData.append('answer_en[]', tinymce.get('answer_en_'+i).getContent(""));
                    }
                    if( $('#answer_sc_'+i).length )         // use this if you are using id to check
                    {
                        formData.append('answer_sc[]', tinymce.get('answer_sc_'+i).getContent(""));
                    }
                    if( $('#answer_tc_'+i).length )         // use this if you are using id to check
                    {
                        formData.append('answer_tc[]', tinymce.get('answer_tc_'+i).getContent(""));
                    }
                }
            }
            $.ajax({
                type: 'POST',
                url: "{{ route('saveBlogDetails') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: (response) => {
                    //console.log(response)
                    if (response.status == 'success') {
                        window.location.href =
                            "{{ route('blogDetails', ['blog_id' => request()->route('blog_id'), 'title_id' => 1]) }}";
                    }
                },
                error: function(data) {
                    //console.log(data)
                    $.each(data.responseJSON.errors, function(k, v) {
                        if (k == "title_no_en") {
                            let errorTxt = v[0];
                            $("p#title_no_en").html(errorTxt);
                            $("p#title_no_en").removeClass("hidden");
                        }
                        if (k == "title_no_sc") {
                            let errorTxt = v[0];
                            $("p#title_no_sc").html(errorTxt);
                            $("p#title_no_sc").removeClass("hidden");
                        }
                        if (k == "title_no_tc") {
                            let errorTxt = v[0];
                            $("p#title_no_tc").html(errorTxt);
                            $("p#title_no_tc").removeClass("hidden");
                        }
                        if (k == "title_en") {
                            let errorTxt = v[0];
                            $("p#title_en").html(errorTxt);
                            $("p#title_en").removeClass("hidden");
                        }
                        if (k == "title_sc") {
                            let errorTxt = v[0];
                            $("p#title_sc").html(errorTxt);
                            $("p#title_sc").removeClass("hidden");
                        }
                        if (k == "title_tc") {
                            let errorTxt = v[0];
                            $("p#title_tc").html(errorTxt);
                            $("p#title_tc").removeClass("hidden");
                        }
                        if (k == "sort_order_no") {
                            let errorTxt = v[0];
                            $("p#sort_order_no").html(errorTxt);
                            $("p#sort_order_no").removeClass("hidden");
                        }
                    });
                }
            });
        });

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
                        console.log(json)

                        $('#en_getNewFaqRow').append(json[0]);
                        $('#tc_getNewFaqRow').append(json[1]);
                        $('#sc_getNewFaqRow').append(json[2]);

                        tinymce.init(editor_config)

                    }
                });

            })

            for (let i = 0; i < 100; i++) {
                //$(document).on('change', `.month${i}`, function() {
                //     var selected_month = $(this).find(":selected").val();
                //     console.log(selected_month)
                //     $(`.month${i} option[value=${selected_month}]`).attr('selected', 'selected');
                // })

                $(document).on('click', `.removeNewFaqBtn${i}`, function() {
                    // $(this).closest('.inputVariationsRow').remove();
                    $(`.inputVariationsRow${i}`).remove()
                })
            }

        });
    </script>
@endpush

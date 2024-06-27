<div class="row">
    <div class="row mb-5">
        <div class="col-md-8">
            <h3 class="card-title">
            @if($formMode == "edit") Edit Blog @else Add New Blog @endif
            </h3>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="float-end">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card"></i> Save</button>
                    <a href="{{ url('admin/blog') }}" title="Back"><button type="button" class="btn btn-secondary btn-sm cancel"><i class="bi bi-x" aria-hidden="true"></i> Cancel</button></a>
                    <input type="hidden" name="blog_id" value="{{isset($blog)?$blog->id:null}}">
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
                            <div class="form-group mb-5{{ $errors->has('slug_'.$attr) ? 'has-error' : ''}}">
                                {!! Form::label('slug_'.$attr, 'Slug' . ' (' . $lngcode . ')', ['class' => 'form-label required']) !!}
                                {!! Form::text('slug_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                {!! $errors->first('slug_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                            <div class="form-group mb-5{{ $errors->has('title_'.$attr) ? 'has-error' : ''}}">
                                {!! Form::label('title_'.$attr, 'Title' . ' (' . $lngcode . ')', ['class' => 'form-label required']) !!}
                                {!! Form::text('title_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                {!! $errors->first('title_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                            <div class="form-group mb-5{{ $errors->has('desc_'.$attr) ? 'has-error' : ''}}">
                                {!! Form::label('desc_'.$attr, 'Description' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                {!! Form::textarea('desc_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                {!! $errors->first('desc_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                            <div class="form-group mb-5{{ $errors->has('meta_title_'.$attr) ? 'has-error' : ''}}">
                                {!! Form::label('title_'.$attr, 'Meta Title' . ' (' . $lngcode . ')', ['class' => 'form-label required']) !!}
                                {!! Form::text('meta_title_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control', 'id' => 'meta_title_'.$attr] : ['class' => 'form-control', 'id' => 'meta_title_'.$attr]) !!}
                                {!! $errors->first('meta_title_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                            <div class="form-group mb-5{{ $errors->has('meta_description_'.$attr) ? 'has-error' : ''}}">
                                {!! Form::label('desc_'.$attr, 'Meta Description' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                {!! Form::textarea('meta_description_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control editor', 'id' => 'meta_description_'.$attr] : ['class' => 'form-control editor', 'id' => 'meta_description_'.$attr]) !!}
                                {!! $errors->first('meta_description_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                            <div class="form-group mb-5{{ $errors->has('t_and_c_content_'.$attr) ? 'has-error' : ''}}">
                                {!! Form::label('t_and_c_content_'.$attr, 'Terms & Conditions Content' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                {!! Form::textarea('t_and_c_content_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control editor', 'id' => 't_and_c_content_'.$attr] : ['class' => 'form-control editor', 'id' => 't_and_c_content_'.$attr]) !!}
                                {!! $errors->first('t_and_c_content_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                            {{-- <div class="form-group mb-5{{ $errors->has('source_title_'.$attr) ? 'has-error' : ''}}">
                                {!! Form::label('source_title_'.$attr, 'Source Title' . ' (' . $lngcode . ')', ['class' => 'form-label required']) !!}
                                {!! Form::text('source_title_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                {!! $errors->first('source_title_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                            </div> --}}
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
                        </div>
                        @endforeach
                        {{-- <div class="row mt-4">
                            <div class="col-md-6">
                                <h5 class="required">Source Title Link</h5>
                                <input class="form-control" name="source_title_link" type="text" id="source_title_link">
                                {!! $errors->first('source_title_link', '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                        </div> --}}
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <h5 class="required">Author Name</h5>
                                <select class="form-select" name="author_id" data-placeholder="Select an option">
                                    <option value="">select</option>
                                    @foreach($blogAuthor as $data)
                                    <option value="{{$data->id}}" {{isset($blog) && $blog->author_id==$data->id?'selected':''}}>{{$data->name_en}}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('author_id', '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <h5 class="required">Category Name</h5>
                                <select class="form-select" name="category_id" id="category_id" data-placeholder="Select an option" onchange="getSubCategory()">
                                    <option value="">select</option>
                                    @foreach($blogCategory as $data)
                                    <option value="{{$data->id}}" {{isset($blog) && $blog->category_id==$data->id?'selected':''}}>{{$data->name_en}}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('category_id', '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                            <div class="col-md-6">
                                <h5 class="required">Sub Category Name</h5>
                                <select class="form-select" name="tag_id" id="blogsubcategory" data-placeholder="Select an option">
                                    <option value="">select</option>
                                    @if($formMode == "edit")
                                        @foreach($blogTag as $data)
                                        <option value="{{$data->id}}" {{isset($blog) && $blog->tag_id==$data->id?'selected':''}}>{{$data->name_en}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                {!! $errors->first('tag_id', '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row mt-4">
                            {{-- <div class="col-md-6">
                                <h5 class="required">Should Lookat Product Category Name</h5>
                                <select class="form-select" name="should_lookat_product_category_id" data-placeholder="Select an option">
                                    <option value="">select</option>
                                    @foreach($productCategory as $data)
                                    <option value="{{$data->id}}" {{isset($blog) && $blog->should_lookat_product_category_id==$data->id?'selected':''}}>{{$data->name_en}}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('should_lookat_product_category_id', '<p class="help-block text-danger">:message</p>') !!}
                            </div> --}}
                            <div class="col-md-6">
                                <h5 class="required">Related Products Sub Category Name</h5>
                                <select class="form-select" name="related_products_sub_category_id" data-placeholder="Select an option">
                                    <option value="">select</option>
                                    @foreach($productSubCategory as $data)
                                    <option value="{{$data->id}}" {{isset($blog) && $blog->related_products_sub_category_id==$data->id?'selected':''}}>{{$data->name_en}}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('related_products_sub_category_id', '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="card-title">Source URLs</h4>
                <a class="btn btn-success mt-5" style="width:30px;height:30px; padding-top: 5px; padding-left: 10px;" onclick="addURL()">+</a>
            </div>
            <div class="card-body">
                <div class="card-body content-body">
                    <div id="url-panel">
                        @if($formMode == "edit" && isset($blog->source_title_en) && isset($blog->source_title_tc) && isset($blog->source_title_sc))
                            @foreach (json_decode($blog->source_title_en) as $key=>$title_en)
                            <div class="border border-outlin-dashed p-4 mb-3 row-{{$key+100}}">
                                <div class="row">
                                    <div class="col-12 text-end">
                                        <button type="button" onclick="removeURL({{$key+100}})" class="btn btn-sm btn-danger text-end">-</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group mb-5">
                                        <label for="source_title_en" class="form-label">Source Title (EN)</label>
                                        <input class="form-control" title="source_title_en" type="text" name="source_title_en[]" value="{{ isset(json_decode($blog->source_title_en)[$key]) ? json_decode($blog->source_title_en)[$key] : ''}}">
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="source_title_tc" class="form-label">Source Title (TC)</label>
                                        <input class="form-control" title="source_title_tc" type="text" name="source_title_tc[]" value="{{ isset(json_decode($blog->source_title_tc)[$key]) ? json_decode($blog->source_title_tc)[$key] : ''}}">
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="source_title_sc" class="form-label">Source Title (CN)</label>
                                        <input class="form-control" title="source_title_sc" type="text" name="source_title_sc[]" value="{{ isset(json_decode($blog->source_title_sc)[$key]) ? json_decode($blog->source_title_sc)[$key] : ''}}">
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="source_title_link" class="form-label">Source Link</label>
                                        <input class="form-control" title="source_title_link" type="text" name="source_title_link[]" value="{{ isset(json_decode($blog->source_title_link)[$key]) ? json_decode($blog->source_title_link)[$key] : ''}}">
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div class="border border-outlin-dashed p-4 mb-3 row-0">
                                <div class="row">
                                    <div class="col-12 text-end">
                                        <button type="button" onclick="removeURL(0)" class="btn btn-sm btn-danger text-end">-</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group mb-5{{ $errors->has('source_title_en') ? 'has-error' : ''}}">
                                        {!! Form::label('source_title_en', 'Source Title (EN)' , ['class' => 'form-label required']) !!}
                                        {!! Form::text('source_title_en[]', null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                        {!! $errors->first('source_title_en', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>
                                    <div class="form-group mb-5{{ $errors->has('source_title_tc') ? 'has-error' : ''}}">
                                        {!! Form::label('source_title_tc', 'Source Title (TC)' , ['class' => 'form-label required']) !!}
                                        {!! Form::text('source_title_tc[]', null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                        {!! $errors->first('source_title_tc', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>
                                    <div class="form-group mb-5{{ $errors->has('source_title_sc') ? 'has-error' : ''}}">
                                        {!! Form::label('source_title_sc', 'Source Title (CN)' , ['class' => 'form-label required']) !!}
                                        {!! Form::text('source_title_sc[]', null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                        {!! $errors->first('source_title_sc', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>
                                    <div class="form-group mb-5{{ $errors->has('source_title_link') ? 'has-error' : ''}}">
                                        {!! Form::label('source_title_link', 'Source Link' , ['class' => 'form-label required']) !!}
                                        {!! Form::text('source_title_link[]', null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                        {!! $errors->first('source_title_link', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Main Image</h3>
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
                            @if(!empty($blog->main_image_url))
                                <div class='lfmimage-container imglfmc0'>
                                    <img src="{{ asset($blog->main_image_url) }}" class='lfmimage w-100' style="height: 20rem;">
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
                            <input id="img" class="form-control" type="text" name="main_image_url" value="{{isset($blog) ? $blog->main_image_url : ''}}">
                       </div>
                    </div>
                </div>
                <div class="list-title mb-3 mt-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Main Image Alt Text</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                       <div id="holder-img">
                        <input class="form-control mt-2" name="main_image_alt_text" type="text" id="main_image_alt_text" value="{{(isset($blog)?$blog->main_image_alt_text:'')}}">
                       </div>
                    </div>
                </div>
               
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-header">
                <h3 class="card-title">Meta Image</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Image Size(200 x 200)px</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                       <div id="holder-meta-img">
                            @if(!empty($blog->meta_image))
                                <div class='lfmimage-container imglfmc0'>
                                    <img src="{{ asset($blog->meta_image) }}" class='lfmimage w-100' style="height: 20rem;">
                                    <div>
                                        <button type="button" onclick="removeImage('meta-img',0)" class='btn btn-sm btn-danger w-100'>Remove</button>
                                    </div>
                                </div>
                            @else
                                <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                            @endif
                       </div>
                       <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="lfm-img" data-input="meta-img" data-preview="holder-meta-img" class="btn btn-primary text-white lfm-img">
                                    <i class="bi bi-image-fill me-2"></i>Select File
                                </a>
                            </span>
                            <input id="meta-img" class="form-control" type="text" name="meta_image" value="{{isset($blog) ? $blog->meta_image : ''}}">
                       </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-body">
                <div class="d-flex justify-content-between nopadding">
                    <label for="" style="font-size: 13px;">IS PUBLISHED?</label>
                    <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="is_published" id="is_published" @if(isset($blog)) @if($blog->is_published == '1')checked @endif @else checked @endif>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-body">
                <div class="d-flex justify-content-between nopadding">
                    <label for="" style="font-size: 13px;">IS HOME?</label>
                    <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="is_home_featured" id="is_home_featured" @if(isset($blog) && $blog->is_home_featured == '1') checked @endif>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-body">
                <div class="d-flex justify-content-between nopadding">
                    <label for="" style="font-size: 13px;">IS POPULAR?</label>
                    <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="is_popular" id="is_popular" @if(isset($blog) && $blog->is_popular == '1') checked @endif>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-header">
                <div class="card-title">
                    {!! Form::label('recommended_blog_id', 'Recommended Blog Names', ['class' => 'control-label']) !!}
                </div>
            </div>
            <div class="card-body">
                <div class="form-group mb-5{{ $errors->has('recommended_blog_id') ? 'has-error' : ''}}">
                    @php
                    $oldBlogIds = [];
                    if(isset($blog) && $blog->recommended_blog_id!=null) {
                        $oldBlogIds = explode(',',$blog->recommended_blog_id);
                    }
                    @endphp
                    <select name="recommended_blog_id[]" class="form-select check-item" data-control="select2" data-placeholder="Select Blog Ids" multiple>
                        @foreach($recommendedBlog as $data)
                        <option value="{{$data->id}}" {{in_array($data->id,$oldBlogIds)?'selected':''}}>{{$data->title_en}}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('recommended_blog_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-header">
                <div class="card-title">
                    {!! Form::label('related_keywords', 'Related keywords', ['class' => 'control-label']) !!}
                </div>
            </div>
            <div class="card-body">
                @php
                $oldTags = [];
                if(isset($blog) && $blog->related_keywords!=null) {
                    $oldTags = explode(',',$blog->related_keywords);
                }
                $i= 1;
                @endphp
                {{-- @forelse($oldTags as $tag)
                <span class="tm-tag tm-tag-info" id="zmHlM_{{$i}}"><span>{{$tag}}</span>
                <a href="#" class="tm-tag-remove" id="zmHlM_Remover_{{$i}}" tagidtoremove="{{$i}}">x</a>
                </span>
                @php $i++; @endphp
                @empty
                @endforelse --}}
                <input type="text" name="related_keywords" placeholder="Type related keywords" class="tm-input form-control tm-input-info"/>
                {{-- <input type="hidden" value="{{isset($blog) && $blog->related_keywords!=null?$blog->related_keywords:''}}" name="hidden-related_keywords"> --}}
                {{-- <input type="hidden" value="{{isset($blog) && $blog->related_keywords!=null?$blog->related_keywords:''}}" name="hiddenTagListA"> --}}
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="card-title">Sections</h4>
                <a class="btn btn-success mt-5" style="width:30px;height:30px; padding-top: 5px; padding-left: 10px;" onclick="addSection()">+</a>
            </div>
            <div class="card-body">
                @if($formMode == "edit")
                    @foreach ($sections as $section)
                    <div class="row mb-2">
                        <div class="col-9">
                            <p>{{$section->section_name_en}}</p>
                        </div>
                        <div class="col-3">
                            <a class="btn btn-warning" style="width:30px;height:30px; padding-top: 5px; padding-left: 10px;" href="/admin/blog/{{$blog->id}}/section/{{$section->id}}/edit"><i class="bi bi-pencil" aria-hidden="true"></i></a>
                            <a class="btn btn-danger" style="width:30px;height:30px; padding-top: 5px; padding-left: 10px;" href="/admin/blog/{{$blog->id}}/section/{{$section->id}}/delete" onclick="deleteSection(event)">-</a>
                        </div>
                    </div>
                    @endforeach
                @endif
                <div class="card-body content-body">
                    <input type="hidden" name="section_count" id="section-count" value="0">
                    <div id="section-panel">
                    </div>
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
        $oldTags = <?php echo json_encode($oldTags); ?>;
        $(".tm-input").tagsManager({
            // prefilled: [],
            // typeaheadSource:[],
            // // hiddenTagListName: 'hiddenTagListA',
            // hiddenTagListName: 'hiddenTagListA',
            // hiddenTagListId: "{{isset($blog) && $blog->related_keywords!=null?$blog->related_keywords:''}}",
            // hiddenTagListId: "{{isset($blog) && $blog->related_keywords!=null?$blog->related_keywords:''}}"
        });
        $($oldTags).each(function(index,value) {
            $(".tm-input").tagsManager('pushTag',value);
        });
        $('.check-item').select2();
        // $('.check-group_new').select2();
    });

    function getSubCategory()
    {
        var category = document.getElementById("category_id").value;
        $.ajax({
            type: "POST",
            url: "/admin/blog/get-sub-category",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                category_id: category,
            },
            success: function (response) {
                if (response.success) {
                    $("#blogsubcategory").children().remove().end();
                    items = response.lists;
                    lists = [];
                    items.forEach((item) => {
                        element = `<option value="${item.id}">${item.name_en}</option>`;
                        lists.push(element);
                    })
                    $("#blogsubcategory").append(lists);
                }
            }
        })
    }

</script>

@endpush   
@extends('admin.layouts.master')
@section('title', 'Edit Blog')
@section('breadcrumb', 'Blog')
@section('breadcrumb-info', 'Edit Blog')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <x-errors :errors="$errors" />
                @endif

                {!! Form::model($blog, [
                    'method' => 'PATCH',
                    'url' => ['/admin/blog', $blog->id],
                    'class' => 'form-horizontal'
                    ]) !!}

                    @include ('admin.blog.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('#lfm-img').filemanager('file');
        $('#lfm-meta-image').filemanager('file');

        $(document).on('change','#auto_sc_translate',function() {

            let val = $(this).prop('checked') ? '1' : '0';
            let simplified_name=$('#title_sc');
            let simplified_slug=$('#slug_sc');
            let simplified_content=$('#desc_sc');
            let simplified_meta_title=$('#meta_title_sc');
            let simplified_meta_description=$('#meta_description_sc');
            let simplified_t_and_c=$('#t_and_c_content_sc');

            if (val==1){
                let name = $('#title_tc').val();
                let content = tinymce.get("desc_tc").getContent({format : 'text'});
                let slug = $('#slug_tc').val();
                let meta_title = $('#meta_title_tc').val();
                let meta_des = tinymce.get("meta_description_tc").getContent({format : 'text'});
                let tandc = tinymce.get("t_and_c_content_tc").getContent({format : 'text'});

                $.ajax({
                    url: "{{ url('/admin/blog-auto-translate') }}",
                    data: {'val': val, 'name': name, 'cont': content,'slug': slug,'meta_title': meta_title,'meta_des': meta_des,'tandc': tandc},
                    type: 'get',
                    success: function (response) {
                        response['name']!==''?simplified_name.val(response['name']):simplified_name.val('')
                        response['slug']!==''?simplified_slug.val(response['slug']):simplified_slug.val('')
                        response['meta_title']!==''?simplified_meta_title.val(response['meta_title']):simplified_meta_title.val('')
                        response['meta_des']!==''?tinymce.get("meta_description_sc").setContent(response['meta_des']):tinymce.get("meta_description_sc").setContent('')
                        response['content']!==''?tinymce.get("desc_sc").setContent(response['content']):tinymce.get("desc_sc").setContent('')
                        response['tandc']!==''?tinymce.get("t_and_c_content_sc").setContent(response['tandc']):tinymce.get("t_and_c_content_sc").setContent('')
                    }
                });
            }
            else {
                simplified_name.val('')
                simplified_slug.val('')
                simplified_meta_title.val('')
                tinymce.get("desc_sc").setContent('')
                tinymce.get("meta_description_sc").setContent('')
                tinymce.get("t_and_c_content_sc").setContent('')
            }

        });

        $(document).on('change','#auto_eng_translate',function() {

            let val = $(this).prop('checked') ? '1' : '0';
            let eng_name=$('#title_en');
            let eng_slug=$('#slug_en');
            let eng_content=$('#desc_en');
            let eng_meta_title=$('#meta_title_en');
            let eng_meta_description=$('#meta_description_en');
            let eng_t_and_c=$('#t_and_c_content_en');

            if (val==1){
                let name = $('#title_tc').val();
                let content = tinymce.get("desc_tc").getContent({format : 'text'});
                let slug = $('#slug_tc').val();
                let meta_title = $('#meta_title_tc').val();
                let meta_des =tinymce.get("meta_description_tc").getContent({format : 'text'});
                let tandc = tinymce.get("t_and_c_content_tc").getContent({format : 'text'});

                $.ajax({
                    url: "{{ url('/admin/blog-eng-auto-translate') }}",
                    data: {'val': val, 'name': name, 'cont': content,'slug': slug,'meta_title': meta_title,'meta_des': meta_des,'tandc': tandc},
                    type: 'get',
                    success: function (response) {
                            response['name']!==''?eng_name.val(response['name']):eng_name.val('')
                            response['slug']!==''?eng_slug.val(response['slug']):eng_slug.val('')
                            response['meta_title']!==''?eng_meta_title.val(response['meta_title']):eng_meta_title.val('')
                            response['meta_des']!==''?tinymce.get("meta_description_en").setContent(response['meta_des']):tinymce.get("meta_description_en").setContent('')
                            response['content']!==''?tinymce.get("desc_en").setContent(response['content']):tinymce.get("desc_en").setContent('')
                            response['tandc']!==''?tinymce.get("t_and_c_content_en").setContent(response['tandc']):tinymce.get("t_and_c_content_en").setContent('')
                    }
                });
            }
            else {
                eng_name.val('')
                eng_slug.val('')
                eng_meta_title.val('')
                tinymce.get("desc_en").setContent('')
                tinymce.get("meta_description_en").setContent('')
                tinymce.get("t_and_c_content_en").setContent('')
            }

        });

    </script>
    <script type="text/javascript">
        var section = 0;
        var feature = 0;
        var url = 0;
        
        function addSection() {
            section++;
            let element = `<div class="border border-outlin-dashed p-4 mb-3 row-${section}">
                            <input type="hidden" name="section_row[]" value="${section}">
                            <div class="row">
                                <div class="col-12 text-end">
                                    <button type="button" onclick="removeSection(${section})" class="btn btn-sm btn-danger text-end">-</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mb-5">
                                    <label for="sort_no" class="form-label">Sort Number</label>
                                    <input class="form-control" title="sort_no" type="number" name="sort_no[]" value="" min="1">
                                </div>
                                <div class="form-group mb-5">
                                    <label for="section_name_en" class="form-label">Section Name(EN)</label>
                                    <input class="form-control" title="section_name_en" type="text" name="section_name_en[]">
                                </div>
                                <div class="form-group mb-5">
                                    <label for="section_name_sc" class="form-label">Section Name(CN)</label>
                                    <input class="form-control" title="section_name_sc" type="text" name="section_name_sc[]">
                                </div>
                                <div class="form-group mb-5">
                                    <label for="section_name_tc" class="form-label">Section Name(TC)</label>
                                    <input class="form-control" title="section_name_tc" type="text" name="section_name_tc[]" value="">
                                </div>
                                <div class="col-12 text-end mb-5">
                                    <button type="button" onclick="addFeature(${section})" class="btn btn-sm btn-success text-end">+</button>
                                </div>
                                <div id="feature-type">
                                    <div id="feature-panel-${section}">
                                    </div>
                                </div>
                            </div>
                        </div>`;
    
            $('#section-panel').append(element);
            document.getElementById("section-count").value = section;
        };
    
        function removeSection(section) {
            $(`#section-panel .row-${section}`).remove();
            var sec_count = document.getElementById("section-count").value;
            var count = sec_count - 1;
            document.getElementById("section-count").value = count;
        }

        function addFeature(section) {
            feature++;
            let featureelement = `<div id="feature-${feature}">
                                    <div class="row mb-3">
                                        <div class="col-10">
                                            <select class="form-select" name="feature_section_${section}[]" data-placeholder="Select an option">
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
                                            <button type="button" onclick="removeFeature(${section},${feature})" class="btn btn-sm btn-danger text-end">-</button>
                                        </div>
                                    </div>
                                </div>`;
    
            $(`#feature-panel-${section}`).append(featureelement);
    
        };
    
        function removeFeature(section, feature) {
            $(`#section-panel .row-${section} #feature-${feature}`).remove();
        }

        function addURL() {
            url++;
            let urlelement = `<div class="border border-outlin-dashed p-4 mb-3 row-${url}">
                            <div class="row">
                                <div class="col-12 text-end">
                                    <button type="button" onclick="removeURL(${url})" class="btn btn-sm btn-danger text-end">-</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mb-5">
                                    <label for="source_title_en" class="form-label">Source Title (EN)</label>
                                    <input class="form-control" title="source_title_en" type="text" name="source_title_en[]">
                                </div>
                                <div class="form-group mb-5">
                                    <label for="source_title_tc" class="form-label">Source Title (TC)</label>
                                    <input class="form-control" title="source_title_tc" type="text" name="source_title_tc[]" value="">
                                </div>
                                <div class="form-group mb-5">
                                    <label for="source_title_sc" class="form-label">Source Title (CN)</label>
                                    <input class="form-control" title="source_title_sc" type="text" name="source_title_sc[]">
                                </div>
                                <div class="form-group mb-5">
                                    <label for="source_title_link" class="form-label">Source Link</label>
                                    <input class="form-control" title="source_title_link" type="text" name="source_title_link[]">
                                </div>
                            </div>
                        </div>`;
    
            $('#url-panel').append(urlelement);
        };
    
        function removeURL(url) {
            $(`#url-panel .row-${url}`).remove();
        }

        function deleteSection(e) {
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
@endpush

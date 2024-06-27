@extends('admin.layouts.master')
@section('title', 'Edit Blog Details')
@section('breadcrumb', 'Blog')
@section('breadcrumb-info', 'Edit Blog Details')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <x-errors :errors="$errors" />
                @endif

                @include ('admin.blog-section.detailsform', ['formMode' => 'create'])
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('#lfm-img').filemanager('file');
        $('#lfm-meta-image').filemanager('file');

        $(document).on('change','#auto_translate',function() {

            let val = $(this).prop('checked') ? '1' : '0';
            let simplified_name=$('#name_sc');
            let simplified_slug=$('#slug_sc');
            let simplified_content=$('#content_sc');
            let simplified_meta_title=$('#meta_title_sc');
            let simplified_meta_description=$('#meta_description_sc');

            if (val==1){
                let name = $('#name_tc').val();
                let content = tinymce.get("content_tc").getContent({format : 'text'});
                let slug = $('#slug_tc').val();
                // let meta_title = $('#meta_title_tc').val();
                // let meta_des = $('#meta_description_tc').val();
                $.ajax({
                    url: "{{ url('/admin/blog-auto-translate') }}",
                    data: {'val': val, 'name': name, 'cont': content,'slug': slug,'meta_title': meta_title,'meta_des': meta_des},
                    type: 'get',
                    success: function (response) {
                        response['name']!==''?simplified_name.val(response['name']):alert('Name field must be less than 5000 characters')
                        response['slug']!==''?simplified_slug.val(response['slug']):alert('Slug field must be less than 5000 characters')
                        response['meta_title']!==''?simplified_meta_title.val(response['meta_title']):alert('Meta title field must be less than 5000 characters')
                        response['meta_des']!==''?simplified_meta_description.val(response['meta_des']):alert('Meta description field must be less than 5000 characters')
                        response['content']!==''?tinymce.get("content_sc").setContent(response['content']):alert('Content field must be less than 5000 characters')
                    }
                });
            }
            else {
                simplified_name.val('')
                simplified_slug.val('')
                simplified_meta_title.val('')
                simplified_meta_description.val('')
                tinymce.get("content_sc").setContent('')
            }

        });

    </script>
@endpush


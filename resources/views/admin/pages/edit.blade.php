@extends('admin.layouts.master')
@section('title', 'Edit Page')
@section('breadcrumb', 'Page')
@section('breadcrumb-info', 'Edit Page')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <x-errors :errors="$errors" />
                @endif

                {!! Form::model($page, [
                    'method' => 'PATCH',
                    'url' => ['/admin/pages', $page->id],
                    'class' => 'form-horizontal'
                    ]) !!}

                @include ('admin.pages.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
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
            let simplified_name = $('#name_sc');

            if (val==1){
                let name = $('#name_tc').val();
                let content = tinymce.get("content_tc").getContent({format : 'text'});
              
              function updateField(field, fieldName) {
                    if (field.length > 5000) {
                        // alert(fieldName + ' field must be less than 5000 characters');
                        toastr.error(fieldName + ' field must be less than 5000 characters');
                        return false;
                    }
                    return true;
                }
                updateField(name, 'Name') ,updateField(content, 'Content')
              
                $.ajax({
                    url: "{{ url('/admin/auto-translate') }}",
                    data: {'val': val, 'name': name, 'cont': content},
                    type: 'get',
                    success: function (response) {
                        console.log(response)
                        
                        simplified_name.val(response['name']);
                        tinymce.get("content_sc").setContent(response['content']);
                        // response['name']!==''?simplified_name.val(response['name']):alert('Name field must be less than 5000 characters')
                        // response['content']!==''?tinymce.get("content_sc").setContent(response['content']):alert('Content field must be less than 5000 characters')
                    }
                });
               
               }
            else {
                simplified_name.val('')
                tinymce.get("content_sc").setContent('')
            }

        });

    </script>
@endpush

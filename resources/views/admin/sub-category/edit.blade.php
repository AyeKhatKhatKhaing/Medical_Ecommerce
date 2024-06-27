@extends('admin.layouts.master')
@section('title', 'Edit SubCategory')
@section('breadcrumb', 'SubCategory')
@section('breadcrumb-info', 'Edit SubCategory')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                {!! Form::model($subcategory, [
                    'method' => 'PATCH',
                    'url' => ['/admin/sub-category', $subcategory->id],
                    'class' => 'form-horizontal'
                    ]) !!}

                    @include ('admin.sub-category.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('#lfm-img').filemanager('file');
        // $(document).on('change','#auto_translate',function() {

        //     let val = $(this).prop('checked') ? '1' : '0';
        //     let simplified_name = $('#name_sc');

        //     if (val==1){
        //         let name = $('#name_tc').val();
        //         let content = tinymce.get("content_tc").getContent({format : 'text'});

        //         $.ajax({
        //             url: "{{ url('/admin/sub-category-auto-translate') }}",
        //             data: {'val': val, 'name': name, 'cont': content},
        //             type: 'get',
        //             success: function (response) {
        //                 console.log(response)
        //                 response['name']!==''?simplified_name.val(response['name']):alert('Name field must be less than 5000 characters')
        //                 response['content']!==''?tinymce.get("content_sc").setContent(response['content']):alert('Content field must be less than 5000 characters')
        //             }
        //         });
        //     }
        //     else {
        //         simplified_name.val('')
        //         tinymce.get("content_sc").setContent('')
        //     }

        // });
        $(document).on('keyup','#name_tc',function() {
            let value = $('#auto_translate').prop('checked') ? '1' : '0';
            if(value == 1){
                translate();
            }
        });
        $(document).on('change','#auto_translate',function() {
            translate();
        });
        function translate(){
            let val = $('#auto_translate').prop('checked') ? '1' : '0';
            let simplified_name=$('#name_sc');
            let name = $('#name_tc').val();
            let content = tinymce.get("content_tc").getContent({format : 'text'});
            function updateField(field, fieldName) {
                    if (field.length > 5000) {
                        toastr.error(fieldName + ' field must be less than 5000 characters');
                        return false;
                    }
                    return true;
                }
            updateField(name, 'Name')
            updateField(content, 'Content')
            if (val==1){
                let name = $('#name_tc').val();
                let content = tinymce.get("content_tc").getContent({format : 'text'});

                $.ajax({
                    url: "{{ url('/admin/sub-category-auto-translate') }}",
                    data: {'val': val, 'name': name, 'cont': content},
                    type: 'get',
                    success: function (response) {
                        console.log(response)
                        simplified_name.val(response['name']);
                        tinymce.get("content_sc").setContent(response['content']);

                        // response['name']!==''?simplified_name.val(response['name']):alert('Name field must be less than 5000 characters')
                    }
                });
            }
            else {
                simplified_name.val('')
            }
        }

    </script>
@endpush

@extends('admin.layouts.master')
@section('title', 'Edit Category')
@section('breadcrumb', 'Category')
@section('breadcrumb-info', 'Edit Category')
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
                {!! Form::model($category, [
                    'method' => 'PATCH',
                    'url' => ['/admin/category', $category->id],
                    'class' => 'form-horizontal'
                    ]) !!}

                    @include ('admin.category.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('body').on('click', '#select-all', function () {

        if ($(this).hasClass('allChecked')) {
            $('.check').prop('checked', false);
        } else {
            $('.check').prop('checked', true);
        }
        $(this).toggleClass('allChecked');
        })
    </script>
    <script>
        $('#lfm-img').filemanager('file');
       
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
                    url: "{{ url('/admin/category-auto-translate') }}",
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

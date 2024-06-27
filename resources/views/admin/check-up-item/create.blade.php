@extends('admin.layouts.master')
@section('title', 'Create Check Up Item')
@section('breadcrumb', 'Check Up Item')
@section('breadcrumb-info', 'Create Check Up Item')
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

                <form method="POST" action="{{ url('/admin/check-up-item') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    @include ('admin.check-up-item.form', ['formMode' => 'create'])

                </form>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('#lfm-img').filemanager('file');
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
                    url: "{{ url('/admin/category-auto-translate') }}",
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



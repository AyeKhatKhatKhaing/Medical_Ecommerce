@extends('admin.layouts.master')
@section('title', 'Edit Key Item Tag')
@section('breadcrumb', 'Key Item Tag')
@section('breadcrumb-info', 'Edit Key Item Tag')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <x-errors :errors="$errors" />
                @endif

                {!! Form::model($key_item_tag, [
                    'method' => 'PATCH',
                    'url' => ['/admin/key-item-tag', $key_item_tag->id],
                    'class' => 'form-horizontal'
                    ]) !!}

                @include ('admin.key-item-tag.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
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
                // let content = tinymce.get("content_tc").getContent({format : 'text'});
                function updateField(field, fieldName) {
                    if (field.length > 5000) {
                        // alert(fieldName + ' field must be less than 5000 characters');
                        toastr.error(fieldName + ' field must be less than 5000 characters');
                        return false;
                    }
                    return true;
                }
                updateField(name, 'Name') 

                $.ajax({
                    url: "{{ url('/admin/key-item-tag-auto-translate') }}",
                    data: {'val': val, 'name': name, 'cont': null},
                    type: 'get',
                    success: function (response) {
                        simplified_name.val(response['name']);
                    }
                });
            }
            else {
                simplified_name.val('')
                // tinymce.get("content_sc").setContent('')
            }

        });


    </script>
@endpush
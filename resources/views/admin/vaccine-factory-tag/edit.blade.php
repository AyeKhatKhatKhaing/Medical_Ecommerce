@extends('admin.layouts.master')
@section('title', 'Edit Vaccine Factory Tag')
@section('breadcrumb', 'Vaccine Factory Tag')
@section('breadcrumb-info', 'Edit Vaccine Factory Tag')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <x-errors :errors="$errors" />
                @endif

                {!! Form::model($vaccine_factory_tag, [
                    'method' => 'PATCH',
                    'url' => ['/admin/vaccine-factory-tag', $vaccine_factory_tag->id],
                    'class' => 'form-horizontal'
                    ]) !!}

                @include ('admin.vaccine-factory-tag.form', ['formMode' => 'edit'])

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
                let content = tinymce.get("content_tc").getContent({format : 'text'});


                $.ajax({
                    url: "{{ url('/admin/vaccine-factory-tag-auto-translate') }}",
                    data: {'val': val, 'name': name, 'cont': content},
                    type: 'get',
                    success: function (response) {
                        response['name']!==''?simplified_name.val(response['name']):alert('Name field must be less than 5000 characters')
                        response['content']!==''?tinymce.get("content_sc").setContent(response['content']):alert('Content field must be less than 5000 characters')
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

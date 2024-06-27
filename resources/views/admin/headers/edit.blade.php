@extends('admin.layouts.master')
@section('title', 'Edit Header')
@section('breadcrumb', 'Header')
@section('breadcrumb-info', 'Edit Header')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <x-errors :errors="$errors" />
                @endif

                {!! Form::model($header, [
                    'method' => 'POST',
                    'url' => ['/admin/header'],
                    'class' => 'form-horizontal',
                    'id'    => 'form',
                    'file' => true
                    ]) !!}

                @include ('admin.headers.form', ['formMode' => 'edit'])

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

            if (val==1){
                let content = tinymce.get("content_tc").getContent({format : 'text'});
                console.log(content)

                $.ajax({
                    url: "{{ url('/admin/header-auto-translate') }}",
                    data: {'val': val, 'cont': content},
                    type: 'get',
                    success: function (response) {
                        response['content']!==''?tinymce.get("content_sc").setContent(response['content']):alert('Content field must be less than 5000 characters')
                    }
                });
            }
            else {
                tinymce.get("content_sc").setContent('')
            }

        });

    </script>
@endpush

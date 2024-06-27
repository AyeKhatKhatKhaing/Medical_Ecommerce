
@extends('admin.layouts.master')
@section('title', 'Create Header')
@section('breadcrumb', 'Header')
@section('breadcrumb-info', 'Create Header')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <x-errors :errors="$errors" />
                @endif

                <form method="POST" action="{{ url('/admin/headers') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    @include ('admin.headers.form', ['formMode' => 'create'])
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>

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






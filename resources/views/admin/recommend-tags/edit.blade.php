@extends('admin.layouts.master')
@section('title', 'Edit RecommendTag')
@section('breadcrumb', 'RecommendTag')
@section('breadcrumb-info', 'Edit RecommendTag')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                <x-errors :errors="$errors" />
                @endif
                {!! Form::model($recommendtag, [
                    'method' => 'PATCH',
                    'url' => ['/admin/recommend-tags', $recommendtag->id],
                    'class' => 'form-horizontal'
                    ]) !!}

                    @include ('admin.recommend-tags.form', ['formMode' => 'edit'])

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
                    url: "{{ url('/admin/recommend-tag-auto-translate') }}",
                    data: {'val': val, 'name': name, 'cont': content},
                    type: 'get',
                    success: function (response) {
                        console.log(response)
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

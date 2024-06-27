@extends('admin.layouts.master')
@section('title', 'Create MainOptionalItem')
@section('breadcrumb', 'MainOptionalItem')
@section('breadcrumb-info', 'Create MainOptionalItem')
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

                <form method="POST" action="{{ url('/admin/main-optional-item') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    @include ('admin.main-optional-item.form', ['formMode' => 'create'])

                </form>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>

        $(document).on('change','#auto_translate',function() {

            let val = $(this).prop('checked') ? '1' : '0';
            let simplified_name = $('#name_sc');


            if (val==1){
                let name = $('#name_tc').val();
                let content = tinymce.get("content_tc").getContent({format : 'text'});
                let message = tinymce.get("remind_message_tc").getContent({format : 'text'});

                $.ajax({
                    url: "{{ url('/admin/main-optional-item-auto-translate') }}",
                    data: {'val': val, 'name': name, 'cont': content, 'message': message,},
                    type: 'get',
                    success: function (response) {
                        console.log(response)
                        response['name']!==''?simplified_name.val(response['name']):alert('Name field must be less than 5000 characters')
                        response['content']!==''?tinymce.get("content_sc").setContent(response['content']):alert('Content field must be less than 5000 characters')
                        response['message']!==''?tinymce.get("remind_message_sc").setContent(response['message']):alert('Remind Message field must be less than 5000 characters')
                    }
                });
            }
            else {
                simplified_name.val('')
                tinymce.get("content_sc").setContent('')
                tinymce.get("remind_message_sc").setContent('')
            }

        });

    </script>
@endpush



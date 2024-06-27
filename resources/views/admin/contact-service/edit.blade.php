@extends('admin.layouts.master')
@section('title', 'Edit ContactService')
@section('breadcrumb', 'ContactService')
@section('breadcrumb-info', 'Edit ContactService')
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
                {!! Form::model($contactservice, [
                    'method' => 'PATCH',
                    'url' => ['/admin/contact-service', $contactservice->id],
                    'class' => 'form-horizontal'
                    ]) !!}

                @include ('admin.contact-service.form', ['formMode' => 'edit'])

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
            let simplified_name=$('#name_sc');
            if (val==1){
                let name = $('#name_tc').val();
                $.ajax({
                    url: "{{ url('/admin/contact-service-auto-translate') }}",
                    data: {'val': val, 'name': name},
                    type: 'get',
                    success: function (response) {
                        response['name']!==''?simplified_name.val(response['name']):alert('Name field must be less than 5000 characters')
                    }
                });
            }
            else {
                simplified_name.val('')
            }

        });

    </script>
@endpush



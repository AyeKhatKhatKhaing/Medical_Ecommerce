@extends('admin.layouts.master')
@section('title', 'Create ContactService')
@section('breadcrumb', 'ContactService')
@section('breadcrumb-info', 'Create ContactService')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <x-errors :errors="$errors"/>
                @endif

                <form method="POST" action="{{ url('/admin/contact-service') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    @include ('admin.contact-service.form', ['formMode' => 'create'])

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


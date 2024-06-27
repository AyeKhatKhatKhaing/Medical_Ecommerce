@extends('admin.layouts.master')
@section('title', 'Create Faq Sub Category')
@section('breadcrumb', 'Faq Sub Category')
@section('breadcrumb-info', 'Create Faq Sub Category')
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

                <form method="POST" action="{{ url('/admin/faq-sub-category') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    @include ('admin.faq-sub-category.form', ['formMode' => 'create'])

                </form>

            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('#lfm-img').filemanager('file');
        $(document).on('change','#auto_translate',function() {
            alert("dd");
            let val = $(this).prop('checked') ? '1' : '0';
            let simplified_name = $('#sub_name_sc');

            if (val==1){
                let name = $('#sub_name_tc').val();
              
                $.ajax({
                    url: "{{ url('/admin/faq-sub-category-auto-translate') }}",
                    data: {'val': val, 'name': name},
                    type: 'get',
                    success: function (response) {
                        response['sub_name']!==''?simplified_name.val(response['name']):alert('Name field must be less than 5000 characters')
                    }
                });
            }
            else {
                simplified_name.val('')
            }

        });

    </script>
@endpush

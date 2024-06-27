@extends('admin.layouts.master')
@section('title', 'Edit Faq Sub Category')
@section('breadcrumb', 'Faq Sub Category')
@section('breadcrumb-info', 'Edit Faq Sub Category')
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
                {!! Form::model($subcategory, [
                    'method' => 'PATCH',
                    'url' => ['/admin/faq-sub-category', $subcategory->id],
                    'class' => 'form-horizontal'
                    ]) !!}

                    @include ('admin.faq-sub-category.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('#lfm-img').filemanager('file');

       $(document).on('keyup', '#sub_name_tc', function() {
            let value = $('#auto_translate').prop('checked') ? '1' : '0';
            if(value == 1){
                translate();
            }
        });

        $(document).on('change','#auto_translate',function() {
            translate();
        });
        
        function translate(){
            let val = $('#auto_translate').prop('checked') ? '1' : '0';
            let simplified_name = $('#sub_name_sc');
            let traditional_name = $('#sub_name_tc').val();

            function updateField(field, fieldName) {
                    if (field.length > 5000) {
                        toastr.error(fieldName + ' field must be less than 5000 characters');
                        return false;
                    }
                    return true;
                }
            updateField(traditional_name, 'Name')

            if (val==1){
                let name = $('#sub_name_tc').val();
                $.ajax({
                    url: "{{ url('/admin/faq-sub-category-auto-translate') }}",
                    data: {'val': val, 'sub_name': name},
                    type: 'get',
                    success: function (response) {
                        simplified_name.val(response['sub_name']);
                    }
                });
            }
            else {
                simplified_name.val('')
            }
        }

    </script>
@endpush

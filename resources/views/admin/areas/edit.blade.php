@extends('admin.layouts.master')
@section('title', 'Edit Location')
@section('breadcrumb', 'Location')
@section('breadcrumb-info', 'Edit Location')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <x-errors :errors="$errors" />
                @endif

                {!! Form::model($area, [
                    'method' => 'PATCH',
                    'url' => ['/admin/areas', $area->id],
                    'class' => 'form-horizontal'
                    ]) !!}

                @include ('admin.areas.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')


     
    <script>
        $(document).on('keyup','#name_tc',function() {
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
            let simplified_name=$('#name_sc');
            let name = $('#name_tc').val();

            function updateField(field, fieldName) {
                    if (field.length > 5000) {
                        toastr.error(fieldName + ' field must be less than 5000 characters');
                        return false;
                    }
                    return true;
                }
            updateField(name, 'Name')
            if (val==1){
                let name = $('#name_tc').val();
                $.ajax({
                    url: "{{ url('/admin/area-auto-translate') }}",
                    data: {'val': val, 'name': name},
                    type: 'get',
                    success: function (response) {
                        console.log(response)
                        simplified_name.val(response['name']);

                        // response['name']!==''?simplified_name.val(response['name']):alert('Name field must be less than 5000 characters')
                    }
                });
            }
            else {
                simplified_name.val('')
            }
        }
    </script>

@endpush

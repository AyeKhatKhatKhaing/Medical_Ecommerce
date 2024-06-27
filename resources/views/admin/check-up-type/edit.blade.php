@extends('admin.layouts.master')
@section('title', 'Edit CheckUpType')
@section('breadcrumb', 'CheckUpType')
@section('breadcrumb-info', 'Edit CheckUpType')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <x-errors :errors="$errors" />
                @endif
                {!! Form::model($checkuptype, [
                    'method' => 'PATCH',
                    'url' => ['/admin/check-up-type', $checkuptype->id],
                    'class' => 'form-horizontal'
                    ]) !!}
                    
                    @include ('admin.check-up-type.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('body').on('click', '#select-all', function () {

        if ($(this).hasClass('allChecked')) {
            $('.check').prop('checked', false);
        } else {
            $('.check').prop('checked', true);
        }
        $(this).toggleClass('allChecked');
        })
    </script>
        <script>

            $(document).on('change','#auto_translate',function() {
    
                let val = $(this).prop('checked') ? '1' : '0';
                let simplified_name=$('#name_sc');
                if (val==1){
                    let name = $('#name_tc').val();
                    $.ajax({
                        url: "{{ url('/admin/checkup-type-translate') }}",
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
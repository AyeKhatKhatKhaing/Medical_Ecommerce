@extends('admin.layouts.master')
@section('title', 'Edit OptionalItem')
@section('breadcrumb', 'OptionalItem')
@section('breadcrumb-info', 'Edit OptionalItem')
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
                {!! Form::model($optionalitem, [
                    'method' => 'PATCH',
                    'url' => ['/admin/optional-item', $optionalitem->id],
                    'class' => 'form-horizontal'
                    ]) !!}

                    @include ('admin.optional-item.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
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
                $.ajax({
                    url: "{{ url('/admin/optional-item-auto-translate') }}",
                    data: {'val': val, 'name': name},
                    type: 'get',
                    success: function (response) {
                        console.log(response)
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



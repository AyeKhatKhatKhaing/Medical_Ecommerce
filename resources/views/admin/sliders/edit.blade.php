@extends('admin.layouts.master')
@section('title', 'Edit Slider')
@section('breadcrumb', 'Slider')
@section('breadcrumb-info', 'Edit Slider')
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
                {!! Form::model($slider, [
                    'method' => 'PATCH',
                    'url' => ['/admin/sliders', $slider->id],
                    'class' => 'form-horizontal'
                    ]) !!}

                    @include ('admin.sliders.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('#lfm-img').filemanager('file');
        let val=$('#slider_type option:selected').val()
        if (val=='1')
        {
            $('#image').addClass('d-none')
            $('#video').removeClass('d-none')
        }
        else {
            $('#image').removeClass('d-none')
            $('#video').addClass('d-none')
        }
        $('#slider_type').on('change', function (e) {
            var type = $("option:selected", this).val();
            if(type==1)
            {
                $('#image').addClass('d-none')
                $('#video').removeClass('d-none')
            }
            else
            {
                $('#image').removeClass('d-none')
                $('#video').addClass('d-none')
            }
        });


    </script>
@endpush

@extends('admin.layouts.master')
@section('title', 'Create Slider')
@section('breadcrumb', 'Slider')
@section('breadcrumb-info', 'Create Slider')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <x-errors :errors="$errors" />
                @endif

                <form method="POST" action="{{ url('/admin/sliders') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    @include ('admin.sliders.form', ['formMode' => 'create'])
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('.lfm-img').filemanager('file');

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


@extends('admin.layouts.master')
@section('title', 'Quick start guide')
@section('breadcrumb', 'Quick start guide')
@section('breadcrumb-info', 'Edit Quick start guide')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <x-errors :errors="$errors" />
                @endif

                {!! Form::model($quick_guide_page, [
                    'method' => 'POST',
                    'url' => ['/admin/quick-start-guide',],
                    'class' => 'form-horizontal'
                    ]) !!}

                @include ('admin.quick-start-guide.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('#lfm-img').filemanager('file');
        $('#lfm-meta-image').filemanager('file');
    </script>
@endpush

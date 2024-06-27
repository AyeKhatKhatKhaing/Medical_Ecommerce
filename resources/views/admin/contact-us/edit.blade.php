@extends('admin.layouts.master')
@section('title', 'Edit Contact Us')
@section('breadcrumb', 'Contact Us')
@section('breadcrumb-info', 'Edit Contact Us')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <x-errors :errors="$errors" />
                @endif

                {!! Form::model($contact, [
                    'method' => 'POST',
                    'url' => ['/admin/contact-us',],
                    'class' => 'form-horizontal'
                    ]) !!}

                @include ('admin.contact-us.form', ['formMode' => 'edit'])

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

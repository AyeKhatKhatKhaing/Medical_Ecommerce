@extends('admin.layouts.master')
@section('title', 'Edit BlogCMS')
@section('breadcrumb', 'BlogCMS')
@section('breadcrumb-info', 'Edit BlogCMS')
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

                {!! Form::model($data, [
                    'method' => 'POST',
                    'url' => ['/admin/blog-cms'],
                    'class' => 'form-horizontal'
                    ]) !!}

                    @include ('admin.blog-cms.form')

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


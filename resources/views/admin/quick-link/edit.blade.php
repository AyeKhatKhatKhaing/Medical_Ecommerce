@extends('admin.layouts.master')
@section('title', 'Edit Quick Link')
@section('breadcrumb', 'Quick Link')
@section('breadcrumb-info', 'Edit Quick Link')
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
                {!! Form::model($quicklink, [
                    'method' => 'PATCH',
                    'url' => ['/admin/quick-link', $quicklink->id],
                    'class' => 'form-horizontal'
                    ]) !!}

                @include ('admin.quick-link.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('#lfm-img').filemanager('file');
    </script>
@endpush

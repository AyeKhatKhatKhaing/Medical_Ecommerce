@extends('admin.layouts.master')
@section('title', 'Career Page')
@section('breadcrumb', 'Career Page')
@section('breadcrumb-info', 'Edit Career Page')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if ($errors->any())
                <x-errors :errors="$errors" />
            @endif

            {!! Form::model($carrier, [
                'method' => 'POST',
                'url' => ['/admin/carrier-page'],
                'class' => 'form-horizontal'
                ]) !!}

            @include ('admin.carrier-page.form', ['formMode' => 'edit'])

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

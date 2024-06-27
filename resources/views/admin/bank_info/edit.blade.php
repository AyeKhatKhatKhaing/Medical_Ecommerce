@extends('admin.layouts.master')
@section('title', 'Bank Information')
@section('breadcrumb', 'Bank Information')
@section('breadcrumb-info', 'Edit Bank Information')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if ($errors->any())
                <x-errors :errors="$errors" />
            @endif

            {!! Form::model($bank_info, [
                'method' => 'POST',
                'url' => ['/admin/bank-info'],
                'class' => 'form-horizontal'
                ]) !!}

            @include ('admin.bank_info.form', ['formMode' => 'edit'])

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
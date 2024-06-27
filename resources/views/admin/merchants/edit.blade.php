{{-- @extends('admin.layouts.master')
@section('title', 'Edit Merchant')
@section('breadcrumb', 'Merchants')
@section('breadcrumb-info', 'Edit Merchant')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Edit Merchant
                        </h3>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($user, [
                            'method' => 'PATCH',
                            'url' => ['/admin/users', $user->id],
                            'class' => 'form-horizontal'
                            ]) !!}
        
                        @include ('admin.merchants.form', ['formMode' => 'edit'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('#lfm-img').filemanager('file');
    </script>
@endpush --}}
@extends('admin.layouts.master')
@section('title', 'Merchants')
@section('breadcrumb', 'Merchants')
@section('breadcrumb-info', 'Edit Merchant')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if ($errors->any())
                <x-errors :errors="$errors" />
            @endif

            {!! Form::model($user, [
                'method' => 'PATCH',
                'url' => ['/admin/users', $user->id],
                'class' => 'form-horizontal'
                ]) !!}

            @include ('admin.merchants.form', ['formMode' => 'edit'])

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

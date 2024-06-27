@extends('admin.layouts.master')
@section('title', 'Edit Marital Status')
@section('breadcrumb', 'Marital Status')
@section('breadcrumb-info', 'Edit Marital Status')
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
                {!! Form::model($maritalstatus, [
                    'method' => 'PATCH',
                    'url' => ['/admin/maritalstatus', $maritalstatus->id],
                    'class' => 'form-horizontal'
                    ]) !!}

                    @include ('admin.marital-status.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@endpush

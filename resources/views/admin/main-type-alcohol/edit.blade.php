@extends('admin.layouts.master')
@section('title', 'Edit Main Type Alcohol')
@section('breadcrumb', 'Main Type Alcohol')
@section('breadcrumb-info', 'Edit Main Type Alcohol')
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
                {!! Form::model($maintypealcohol, [
                    'method' => 'PATCH',
                    'url' => ['/admin/maintypealcohol', $maintypealcohol->id],
                    'class' => 'form-horizontal'
                    ]) !!}

                    @include ('admin.main-type-alcohol.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@endpush

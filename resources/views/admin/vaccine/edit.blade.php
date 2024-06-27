@extends('admin.layouts.master')
@section('title', 'Edit Vaccine Type')
@section('breadcrumb', 'Vaccine Type')
@section('breadcrumb-info', 'Edit Vaccine Type')
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
                {!! Form::model($vaccine, [
                    'method' => 'PATCH',
                    'url' => ['/admin/vaccine', $vaccine->id],
                    'class' => 'form-horizontal'
                    ]) !!}

                    @include ('admin.vaccine.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@endpush

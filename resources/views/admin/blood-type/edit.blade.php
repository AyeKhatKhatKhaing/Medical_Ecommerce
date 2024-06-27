@extends('admin.layouts.master')
@section('title', 'Edit Blood Type')
@section('breadcrumb', 'Blood Type')
@section('breadcrumb-info', 'Edit Blood Type')
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
                {!! Form::model($bloodtype, [
                    'method' => 'PATCH',
                    'url' => ['/admin/bloodtype', $bloodtype->id],
                    'class' => 'form-horizontal'
                    ]) !!}

                    @include ('admin.blood-type.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@endpush

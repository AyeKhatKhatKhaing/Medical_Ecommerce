@extends('admin.layouts.master')
@section('title', 'Edit Custom Notification')
@section('breadcrumb', 'Custom Notification')
@section('breadcrumb-info', 'Edit Custom Notification')
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
                {!! Form::model($customnotification, [
                    'method' => 'PATCH',
                    'url' => ['/admin/customnotification', $customnotification->id],
                    'class' => 'form-horizontal'
                    ]) !!}

                    @include ('admin.custom-notification.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@endpush

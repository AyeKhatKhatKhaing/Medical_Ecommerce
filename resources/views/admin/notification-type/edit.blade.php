@extends('admin.layouts.master')
@section('title', 'Edit Notification Type')
@section('breadcrumb', 'Notification Type')
@section('breadcrumb-info', 'Edit Notification Type')
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
                {!! Form::model($notificationtype, [
                    'method' => 'PATCH',
                    'url' => ['/admin/notificationtype', $notificationtype->id],
                    'class' => 'form-horizontal'
                    ]) !!}

                    @include ('admin.notification-type.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@endpush

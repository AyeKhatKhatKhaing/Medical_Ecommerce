@extends('admin.layouts.master')
@section('title', 'Edit Recipient')
@section('breadcrumb', 'Recipient')
@section('breadcrumb-info', 'Edit Recipient')
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
                {!! Form::model($recipient, [
                    'method' => 'PATCH',
                    'url' => ['/admin/recipient', $recipient->id],
                    'class' => 'form-horizontal'
                    ]) !!}
                    
                    @include ('admin.recipient.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

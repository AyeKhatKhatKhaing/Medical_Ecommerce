@extends('admin.layouts.master')
@section('title', 'Edit Free Gift')
@section('breadcrumb', 'Free Gift')
@section('breadcrumb-info', 'Edit Free Gift')
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
                {!! Form::model($freegift, [
                    'method' => 'PATCH',
                    'url' => ['/admin/free-gift', $freegift->id],
                    'class' => 'form-horizontal'
                    ]) !!}
                    
                    @include ('admin.free-gift.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

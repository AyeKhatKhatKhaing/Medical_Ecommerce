@extends('admin.layouts.master')
@section('title', 'Edit Career')
@section('breadcrumb', 'Career')
@section('breadcrumb-info', 'Edit Career')
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
                {!! Form::model($carrier, [
                    'method' => 'PATCH',
                    'url' => ['/admin/carrier', $carrier->id],
                    'class' => 'form-horizontal'
                    ]) !!}
                    
                    @include ('admin.carrier.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

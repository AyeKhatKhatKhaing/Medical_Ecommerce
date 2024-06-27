@extends('admin.layouts.master')
@section('title', 'Edit HomeCheckingItem')
@section('breadcrumb', 'HomeCheckingItem')
@section('breadcrumb-info', 'Edit HomeCheckingItem')
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
                {!! Form::model($homecheckingitem, [
                    'method' => 'PATCH',
                    'url' => ['/admin/home-checking-item', $homecheckingitem->id],
                    'class' => 'form-horizontal'
                    ]) !!}
                    
                    @include ('admin.home-checking-item.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

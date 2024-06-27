@extends('admin.layouts.master')
@section('title', 'Edit QDollor Rebate')
@section('breadcrumb', 'QDollor Rebate')
@section('breadcrumb-info', 'Edit QDollor Rebate')
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
                {!! Form::model($qdollorRebate, [
                    'method' => 'PATCH',
                    'url' => ['/admin/q-dollor-rebate', $qdollorRebate->id],
                    'class' => 'form-horizontal'
                    ]) !!}
                    
                    @include ('admin.q-dollor-rebate.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

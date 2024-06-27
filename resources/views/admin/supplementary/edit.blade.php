@extends('admin.layouts.master')
@section('title', 'Edit Supplementary')
@section('breadcrumb', 'Supplementary')
@section('breadcrumb-info', 'Edit Supplementary')
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
                {!! Form::model($supplementary, [
                    'method' => 'PATCH',
                    'url' => ['/admin/supplementary', $supplementary->id],
                    'class' => 'form-horizontal'
                    ]) !!}
                    
                    @include ('admin.supplementary.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

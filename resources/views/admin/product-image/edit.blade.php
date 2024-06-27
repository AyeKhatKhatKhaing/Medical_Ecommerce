@extends('admin.layouts.master')
@section('title', 'Edit ProductImage')
@section('breadcrumb', 'ProductImage')
@section('breadcrumb-info', 'Edit ProductImage')
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
                {!! Form::model($productimage, [
                    'method' => 'PATCH',
                    'url' => ['/admin/product-image', $productimage->id],
                    'class' => 'form-horizontal'
                    ]) !!}
                    
                    @include ('admin.product-image.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

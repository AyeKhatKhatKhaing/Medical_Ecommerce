@extends('admin.layouts.master')
@section('title', 'Edit MerchantCoupon')
@section('breadcrumb', 'MerchantCoupon')
@section('breadcrumb-info', 'Edit MerchantCoupon')
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
                {!! Form::model($merchantcoupon, [
                    'method' => 'PATCH',
                    'url' => ['/admin/merchant-coupon', $merchantcoupon->id],
                    'class' => 'form-horizontal'
                    ]) !!}
                    
                    @include ('admin.merchant-coupon.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@php $coupon_type = Request::get('coupon_type') == 'birthday' ? 'Birthday Coupons' : (Request::get('coupon_type') == 'welcome' ? 'Welcome Coupons' : 'Coupons'); @endphp
@extends('admin.layouts.master')
@section('title', 'Edit'. $coupon_type)
@section('breadcrumb', $coupon_type)
@section('breadcrumb-info', 'Edit'. $coupon_type)
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <x-errors :errors="$errors" />
                @endif

                {!! Form::model($coupon, [
                    'method' => 'PATCH',
                    'url' => ['/admin/coupon', $coupon->id],
                    'class' => 'form-horizontal'
                    ]) !!}

                @include ('admin.coupon.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@include('admin.coupon.usage_restraction_js')
<script>
    $('#lfm-img').filemanager('file');
    $('#lfm-icon').filemanager('file');
</script>
@endpush
@php $coupon_type = Request::get('coupon_type') == 'birthday' ? 'Birthday Coupons' : (Request::get('coupon_type') == 'welcome' ? 'Welcome Coupons' : 'Coupons'); @endphp
@extends('admin.layouts.master')
@section('title', 'Create '.$coupon_type)
@section('breadcrumb', $coupon_type)
@section('breadcrumb-info', 'Create '.$coupon_type)
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <x-errors :errors="$errors" />
                @endif

                <form method="POST" action="{{ url('/admin/coupon') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    @include ('admin.coupon.form', ['formMode' => 'create'])
                </form>
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

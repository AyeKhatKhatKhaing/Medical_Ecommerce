@extends('admin.layouts.master')
@section('title', 'Edit Coupon Images')
@section('breadcrumb', 'Coupon Images')
@section('breadcrumb-info', 'Edit Coupon Images')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if ($errors->any())
                <x-errors :errors="$errors" />
            @endif

            {!! Form::model($couponBanner, [
                'method' => 'POST',
                'url' => ['/admin/update-coupon-image'],
                'class' => 'form-horizontal'
                ]) !!}
                <div class="row">
                    <div class="row mb-5">
                        <div class="col-md-8">
                            <h3 class="card-title">
                            </h3>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="float-end">
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card"></i> Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-body pt-5">
                            <div class="list-title mb-3">
                                <label for="kt_ecommerce_add_product_store_template" class="form-label">
                                    <span style="color: #B5B5C3">Birthday Image</span>
                                </label>
                            </div>
                            <div class="panel-block">
                                <div class="form-group">
                                    <div id="holder-onsale-banner-image">
                                        @if (!empty($couponBanner->birthday_img))
                                            <div class='lfmimage-container onsale-banner-imagelfmc0'>
                                                <img src="{{ asset($couponBanner->birthday_img) }}" class='lfmimage w-100'
                                                    style="height: 20rem;">
                                                <div>
                                                    <button type="button" onclick="removeImage('onsale-banner-image',0)"
                                                        class='btn btn-sm btn-danger w-100'>Remove</button>
                                                </div>
                                            </div>
                                        @else
                                            <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                                        @endif
                                    </div>
                                    <div class="input-group mt-3">
                                        <span class="input-group-btn">
                                            <a id="lfm-onsale-banner-image" data-input="onsale-banner-image"
                                                data-preview="holder-onsale-banner-image" class="btn btn-primary text-white lfm-img">
                                                <i class="bi bi-image-fill me-2"></i>Select File
                                            </a>
                                        </span>
                                        <input id="onsale-banner-image" class="form-control" type="text" name="birthday_img"
                                            value="{{ isset($couponBanner) ? $couponBanner->birthday_img : '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-5">
                            <div class="list-title mb-3">
                                <label for="kt_ecommerce_add_product_store_template" class="form-label">
                                    <span style="color: #B5B5C3">Welcome Image</span>
                                </label>
                            </div>
                            <div class="panel-block">
                                <div class="form-group">
                                    <div id="holder-promation-image">
                                        @if (!empty($couponBanner->welcome_img))
                                            <div class='lfmimage-container promotion-imglfmc0'>
                                                <img src="{{ asset($couponBanner->welcome_img) }}" class='lfmimage w-100'
                                                    style="height: 20rem;">
                                                <div>
                                                    <button type="button" onclick="removeImage('promotion-img',0)"
                                                        class='btn btn-sm btn-danger w-100'>Remove</button>
                                                </div>
                                            </div>
                                        @else
                                            <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                                        @endif
                                    </div>
                                    <div class="input-group mt-3">
                                        <span class="input-group-btn">
                                            <a id="lfm-promotion-img" data-input="promotion-img" data-preview="holder-promation-image"
                                                class="btn btn-primary text-white lfm-img">
                                                <i class="bi bi-image-fill me-2"></i>Select File
                                            </a>
                                        </span>
                                        <input id="promotion-img" class="form-control" type="text" name="welcome_img"
                                            value="{{ isset($couponBanner) ? $couponBanner->welcome_img : '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $('#nsale-banner-image').filemanager('file');
    $('#lfm-promotion-img').filemanager('file');
</script>
@endpush

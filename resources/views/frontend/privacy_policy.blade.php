@extends('frontend.layouts.master')
@section('content')
@include('frontend.include.product-compare-box')
@endsection
@push('scripts')
<script src="{{ asset('frontend/custom/product-compare.js') }}"></script>
@endpush
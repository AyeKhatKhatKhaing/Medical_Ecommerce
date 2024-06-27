@extends('frontend.layouts.master')
@include('frontend.seo', ['seo' => isset($booking) ? $booking : ''])
@section('content')
    <main>
        <div class="booking-process-container">
            <div component-name="me-img-container" class="me-img-container">

                <img src="{{ isset($booking) ? asset($booking->img) : '' }}" alt="images-0" class="mx-auto" />

            </div>
        </div>
    </main>
@endsection
@push('scripts')
@endpush

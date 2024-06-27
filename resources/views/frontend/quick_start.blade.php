@extends('frontend.layouts.master')
@if (Route::currentRouteName() == 'booking.process')
    @include('frontend.seo', ['seo' => isset($booking_page) ? $booking_page : ''])
@elseif(Route::currentRouteName() == 'quick.start')
    @include('frontend.seo', ['seo' => isset($quick_start_page) ? $quick_start_page : ''])
@endif
@section('content')
    <main>
        @if (Route::currentRouteName() == 'booking.process')
            <div class="booking-process-container">
                <div component-name="me-img-container" class="me-img-container">
                    @if (isset($booking) && count($booking) > 0)
                        @foreach ($booking as $book)
                            <img src="{{ isset($book) && $book->img ? asset($book->img) : '' }}" alt="images-0"
                                class="mx-auto w-full" />
                        @endforeach
                    @endif
                </div>
            </div>
        @elseif(Route::currentRouteName() == 'quick.start')
            <div component-name="me-img-container" class="me-img-container">
                @if (isset($quick_start) && count($quick_start) > 0)
                    @foreach ($quick_start as $guide)
                        <img src="{{ isset($guide) && $guide->img ? asset($guide->img) : '' }}" alt="images-0"
                            class="mx-auto w-full" />
                    @endforeach
                @endif
            </div>
        @endif

    </main>
@endsection
@push('scripts')
@endpush

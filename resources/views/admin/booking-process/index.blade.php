@extends('admin.layouts.master')
@section('title', 'Booking process')
@section('breadcrumb', 'Booking process')
@section('breadcrumb-info', 'Edit Booking process')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <x-errors :errors="$errors" />
                @endif

                {!! Form::model($booking_process_page, [
                    'method' => 'POST',
                    'url' => ['/admin/booking-process',],
                    'class' => 'form-horizontal'
                    ]) !!}

                @include ('admin.booking-process.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('#lfm-img').filemanager('file');
        $('#lfm-meta-image').filemanager('file');
    </script>
@endpush

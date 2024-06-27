@extends('admin.layouts.master')
@section('title', 'Create Quick Link')
@section('breadcrumb', 'Quick Link')
@section('breadcrumb-info', 'Create Quick Link')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <x-errors :errors="$errors" />
                @endif

                <form method="POST" action="{{ url('/admin/quick-link') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    @include ('admin.quick-link.form', ['formMode' => 'create'])
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('.lfm-img').filemanager('file');
    </script>
@endpush


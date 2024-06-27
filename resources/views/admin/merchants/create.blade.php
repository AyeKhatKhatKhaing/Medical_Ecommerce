@extends('admin.layouts.master')
@section('title', 'Merchants')
@section('breadcrumb', 'Merchants')
@section('breadcrumb-info', 'Create Merchant')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- @if ($errors->any())
                <x-errors :errors="$errors" />
            @endif -->

            <form method="POST" action="{{ url('/admin/users') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}

                @include ('admin.merchants.form', ['formMode' => 'create'])
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        $('#lfm-img').filemanager('file');
    </script>
@endpush

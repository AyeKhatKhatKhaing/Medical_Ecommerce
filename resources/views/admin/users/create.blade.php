@extends('admin.layouts.master')
@section('title', 'Users')
@section('breadcrumb', 'Users')
@section('breadcrumb-info', 'Create User')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if ($errors->any())
                <x-errors :errors="$errors" />
            @endif

            <form method="POST" action="{{ url('/admin/users') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}

                @include ('admin.users.form', ['formMode' => 'create'])
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

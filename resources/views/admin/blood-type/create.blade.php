@extends('admin.layouts.master')
@section('title', 'Create Blood Type')
@section('breadcrumb', 'Blood Type')
@section('breadcrumb-info', 'Create Blood Type')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <form method="POST" action="{{ url('/admin/bloodtype') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    @include ('admin.blood-type.form', ['formMode' => 'create'])

                </form>

            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>

    </script>
@endpush

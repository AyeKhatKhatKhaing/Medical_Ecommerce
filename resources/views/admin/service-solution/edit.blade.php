@extends('admin.layouts.master')
@section('title', 'Edit Service Solution')
@section('breadcrumb', 'Service Solution')
@section('breadcrumb-info', 'Edit Service Solution')
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
                {!! Form::model($servicesolution, [
                    'method' => 'PATCH',
                    'url' => ['/admin/service-solution', $servicesolution->id],
                    'class' => 'form-horizontal'
                    ]) !!}

                    @include ('admin.service-solution.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('#lfm-milestone-img').filemanager('file');
        

    </script>
@endpush




@extends('admin.layouts.master')
@section('title', 'Edit VaccineStockTag')
@section('breadcrumb', 'VaccineStockTag')
@section('breadcrumb-info', 'Edit VaccineStockTag')
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
                {!! Form::model($vaccinestocktag, [
                    'method' => 'PATCH',
                    'url' => ['/admin/vaccine-stock-tag', $vaccinestocktag->id],
                    'class' => 'form-horizontal'
                    ]) !!}
                    
                    @include ('admin.vaccine-stock-tag.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('#lfm-img').filemanager('file');
    </script>
@endpush


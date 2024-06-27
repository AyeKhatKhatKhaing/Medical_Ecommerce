@extends('admin.layouts.master')
@section('title', 'Edit Allergic Disease')
@section('breadcrumb', 'Allergic Disease')
@section('breadcrumb-info', 'Edit Allergic Disease')
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
                {!! Form::model($disease, [
                    'method' => 'PATCH',
                    'url' => ['/admin/allergicdisease', $disease->id],
                    'class' => 'form-horizontal'
                    ]) !!}

                    @include ('admin.allergic-disease.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@endpush

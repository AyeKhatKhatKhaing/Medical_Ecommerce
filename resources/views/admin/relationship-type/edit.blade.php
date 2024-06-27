@extends('admin.layouts.master')
@section('title', 'Edit Relationship Type')
@section('breadcrumb', 'Relationship Type')
@section('breadcrumb-info', 'Edit Relationship Type')
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
                {!! Form::model($relationshiptype, [
                    'method' => 'PATCH',
                    'url' => ['/admin/relationshiptype', $relationshiptype->id],
                    'class' => 'form-horizontal'
                    ]) !!}

                    @include ('admin.relationship-type.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@endpush

@extends('admin.layouts.master')
@section('title', 'Edit Age Group')
@section('breadcrumb', 'Age Group')
@section('breadcrumb-info', 'Edit Age Group')
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
                {!! Form::model($agegroup, [
                    'method' => 'PATCH',
                    'url' => ['/admin/agegroup', $agegroup->id],
                    'class' => 'form-horizontal'
                    ]) !!}

                    @include ('admin.age-group.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@endpush

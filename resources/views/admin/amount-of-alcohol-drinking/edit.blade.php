@extends('admin.layouts.master')
@section('title', 'Edit Amount Of Alcohol Drinking')
@section('breadcrumb', 'Amount Of Alcohol Drinking')
@section('breadcrumb-info', 'Edit Amount Of Alcohol Drinking')
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
                {!! Form::model($amountofalcoholdrinking, [
                    'method' => 'PATCH',
                    'url' => ['/admin/amountofalcoholdrinking', $amountofalcoholdrinking->id],
                    'class' => 'form-horizontal'
                    ]) !!}

                    @include ('admin.amount-of-alcohol-drinking.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@endpush

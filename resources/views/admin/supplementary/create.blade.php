@extends('admin.layouts.master')
@section('title', 'Create Supplementary')
@section('breadcrumb', 'Supplementary')
@section('breadcrumb-info', 'Create Supplementary')
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

                <form method="POST" action="{{ url('/admin/supplementary') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    @include ('admin.supplementary.form', ['formMode' => 'create'])

                </form>

            </div>
        </div>
    </div>
@endsection


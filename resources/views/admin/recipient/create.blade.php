@extends('admin.layouts.master')
@section('title', 'Create Recipient')
@section('breadcrumb', 'Recipient')
@section('breadcrumb-info', 'Create Recipient')
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

                <form method="POST" action="{{ url('/admin/recipient') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    @include ('admin.recipient.form', ['formMode' => 'create'])

                </form>

            </div>
        </div>
    </div>
@endsection


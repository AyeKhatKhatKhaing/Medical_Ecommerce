@extends('admin.layouts.master')
@section('title', 'Create Free Gift')
@section('breadcrumb', 'Free Gift')
@section('breadcrumb-info', 'Create Free Gift')
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

                <form method="POST" action="{{ url('/admin/free-gift') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    @include ('admin.free-gift.form', ['formMode' => 'create'])

                </form>

            </div>
        </div>
    </div>
@endsection


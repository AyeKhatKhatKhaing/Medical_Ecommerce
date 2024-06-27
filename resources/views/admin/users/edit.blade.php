@extends('admin.layouts.master')
@section('title', 'Edit User')
@section('breadcrumb', 'Users')
@section('breadcrumb-info', 'Edit User')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Edit User
                        </h3>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($user, [
                            'method' => 'PATCH',
                            'url' => ['/admin/users', $user->id],
                            'class' => 'form-horizontal'
                            ]) !!}
        
                        @include ('admin.users.form', ['formMode' => 'edit'])

                        {!! Form::close() !!}

                        {{-- <form method="POST" action="{{ route('users.update-user',['id'=>$user->id,'user_type'=>'user']) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
            
                            @include ('admin.users.form', ['formMode' => 'edit'])
                        </form> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('#lfm-img').filemanager('file');
    </script>
@endpush
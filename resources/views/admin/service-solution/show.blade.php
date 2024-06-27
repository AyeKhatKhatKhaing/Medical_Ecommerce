@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">ServiceSolution {{ $servicesolution->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/service-solution') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/service-solution/' . $servicesolution->id . '/edit') }}" title="Edit ServiceSolution"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/servicesolution', $servicesolution->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete ServiceSolution',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $servicesolution->id }}</td>
                                    </tr>
                                    <tr><th> Main Title En </th><td> {{ $servicesolution->main_title_en }} </td></tr><tr><th> Main Title Tc </th><td> {{ $servicesolution->main_title_tc }} </td></tr><tr><th> Main Title Sc </th><td> {{ $servicesolution->main_title_sc }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

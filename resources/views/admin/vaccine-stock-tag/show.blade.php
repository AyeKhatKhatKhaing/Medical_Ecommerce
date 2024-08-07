@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">VaccineStockTag {{ $vaccinestocktag->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/vaccine-stock-tag') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/vaccine-stock-tag/' . $vaccinestocktag->id . '/edit') }}" title="Edit VaccineStockTag"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/vaccinestocktag', $vaccinestocktag->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete VaccineStockTag',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $vaccinestocktag->id }}</td>
                                    </tr>
                                    <tr><th> Name En </th><td> {{ $vaccinestocktag->name_en }} </td></tr><tr><th> Name Tc </th><td> {{ $vaccinestocktag->name_tc }} </td></tr><tr><th> Name Sc </th><td> {{ $vaccinestocktag->name_sc }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

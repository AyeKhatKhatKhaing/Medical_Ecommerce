@extends('admin.layouts.master')
@section('title', 'Recipient')
@section('breadcrumb', 'Recipient')
@section('breadcrumb-info', 'Recipient Details')
@section('content')
    <div class="container">
        <a href="{{ url('/admin/recipient') }}" title="Back"><button class="btn btn-light py-5 btn-sm"><i
            class="fa fa-arrow-left" aria-hidden="true"></i></button></a>
            @foreach($recipient as $rep)
            <div class="card shadow-sm mt-4">
                <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse" data-bs-target="#kt_docs_card_collapsible{{ $rep->id }}">
                    <h4 class="card-title"><i class="bi bi-person-fill fs-1"></i> &nbsp; 
                        {{ $rep->first_name }} {{$rep->last_name  }}  &nbsp;
                         <i class="bi bi-telephone-fill fs-3"></i> &nbsp;
                        {{ $rep->phone ?? '-' }}
                    </h4>
                    <div class="card-toolbar rotate-180">
                        <i class="bi bi-caret-up fs-1"></i>
                    </div>
                </div>
                <div id="kt_docs_card_collapsible{{ $rep->id }}" class="collapse show">
                    <div class="card-body">
                       
                        <table class="table align-middle">
                            <tr>
                                <td class="w-125px"> Add-on Items - </td> 
                                <td>@if(count($rep->add_on_data) > 0)
                                    @foreach($rep->add_on_data as $item)
                                    <ul>
                                        <li> {{ $item->name_en }} </li>
                                    </ul>
                                   
                                    @endforeach
                                    @endif
                                </td>
                            </tr>
                        </table>
                        
                    </div>
                    <div class="card-footer">
                        <i class="bi bi-geo-alt"></i> {{ $rep->area->name_en }}
                    </div>
                </div>
            </div>
            @endforeach
        {{-- <div class="row mt-5">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <p>Recipient</p>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/admin/recipient/' . $recipient->id . '/edit') }}" title="Edit Recipient"><button
                                class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                Edit</button></a>
                        {!! Form::open([
                            'method' => 'DELETE',
                            'url' => ['admin/recipient', $recipient->id],
                            'style' => 'display:inline',
                        ]) !!}
                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', [
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-sm',
                            'title' => 'Delete Recipient',
                            'onclick' => 'return confirm("Confirm delete?")',
                        ]) !!}
                        {!! Form::close() !!}
                        <br />
                        <br />

                        <div class="table-responsive">
                            <table class="table">
                                @foreach($recipient as $rep)
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $rep->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Location </th>
                                        <td> {{ $rep->area->name_en }} </td>
                                    </tr>
                                    <tr>
                                        <th> Date </th>
                                        <td> {{ $rep->date }} </td>
                                    </tr>
                                    <tr>
                                        <th> Time </th>
                                        <td> {{ $rep->time }} </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div> --}}
        
    </div>
@endsection

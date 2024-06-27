@extends('admin.layouts.master')
@section('title', 'Page')
@section('breadcrumb', 'Page Detail')
@section('breadcrumb-info', 'Page Detail')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="card-header">
                            <div class="card-title">
                                <h3>Page {{$page->id}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <a href="{{ url('/admin/pages') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/pages/' . $page->id . '/edit') }}" title="Edit Page"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/pages', $page->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete Page',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $page->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Name (English)</th><td>{{ $page->name_en }}</td>
                                    </tr>
                                    <tr>
                                        <th>Name (Traditional Chinese)</th><td>{{ $page->name_tc }}</td>
                                    </tr>
                                    <tr>
                                        <th>Name (Simplified Chinese)</th><td>{{ $page->name_sc }}</td>
                                    </tr>
                                    <tr>
                                        <th>Content (English)</th><td>{{ $page->content_en }}</td>
                                    </tr>
                                    <tr>
                                        <th>Content (Traditional Chinese)</th><td>{{ $page->content_tc }}</td>
                                    </tr>
                                    <tr>
                                        <th>Content (Simplified Chinese)</th><td>{{ $page->content_sc }}</td>
                                    </tr>
                                    <tr>
                                        <th>Updated_by</th><td>{{ $page->user_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Published</th><td>{{ $page->is_published }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

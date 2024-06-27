@extends('admin.layouts.master')
@section('title', 'Order')
@section('breadcrumb', 'Order')
@section('breadcrumb-info', 'Order Form Submission Detail')
@push('style')
@endpush
@section('content')
<div class="container">
    <a href="{{ url('/admin/blog/formsubmissions/list') }}" title="Back"><button class="btn btn-light py-5 btn-sm"><i
                class="fa fa-arrow-left" aria-hidden="true"></i></button></a>
    <div class="col-md-12">
        <div class="card card-dashed">
            <div class="card-header">
                <h3 class="card-title">Title. {{ $data->title }} &nbsp; <span class="text-gray-600 fs-6">
                  </span></h3>
                <h3 class="card-title">First Name. {{ $data->first_name }} &nbsp; <span class="text-gray-600 fs-6">
                </span></h3>
                <h3 class="card-title">Last Name. {{ $data->last_name }} &nbsp; <span class="text-gray-600 fs-6">
                </span></h3>
                <div class="card-toolbar">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 p-5">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h3 class="card-title">Contact Information</h3>
                        </div>
                        <div class="card-body">
                            <p>Email :     {{$data->email}}</p>
                            <p>Phone :     {{$data->phone_no1}}</p>
                            <p>Contact Person Name :     {{$data->contact_person_name}}</p>
                            <p>Contract Person Position : {{ $data->contact_person_position }}</p>
                           
                        </div>

                    </div>

                </div>
                <div class="col-md-6 p-5">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h3 class="card-title">Enquiry Information</h3>
                        </div>
                        <div class="card-body">
                            <p>To learn more options : {{$data->to_learn_more_options}}</p>
                            <p>Message : {{ $data->message }}</p>

                        </div>

                    </div>
                </div>

            </div>
        </div>
</div>
@endsection
@push('scripts')
<script>
</script>
@endpush
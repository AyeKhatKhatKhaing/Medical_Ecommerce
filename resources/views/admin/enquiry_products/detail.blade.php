@extends('admin.layouts.master')
@section('title', 'Enquiry Product Detail')
@section('breadcrumb', 'Enquiry Product')
@section('breadcrumb-info', 'Enquiry Product Detail')
@section('content')
    <div class="container">
        <div class="row">
            <div class="row mb-5">
                <div class="col-md-5">
                    
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                    <div class="float-end">
                <a href="{{ url('/admin/enquiry-product-list') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
            </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <!--begin::Accordion-->
                        <div class="card-header">
                            <h3>
                            Meet the Basic Qualifications of the Government  #{{ $enquiryProduct->enquiry_invoice_no }}
                            </h3>
                        </div>

                        <div class="accordion" id="kt_accordion_1">
                            @foreach($enquiryProduct->productEnquiryForm as $key => $item)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="kt_accordion_1_header_{{$key}}">
                                    <button class="accordion-button fs-4 fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_{{$key}}" aria-expanded="true" aria-controls="kt_accordion_1_body_{{$key}}">
                                        {{$item->booking_id}} 
                                    </button>
                                </h2>
                                <div id="kt_accordion_1_body_{{$key}}" class="accordion-collapse collapse {{$key == 0 ? 'show' : ''}}" aria-labelledby="kt_accordion_1_header_{{$key}}" data-bs-parent="#kt_accordion_1">
                                    <div class="accordion-body">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th>Are you between 50 and 75 years old?</th>
                                                    <td><b>Yes</b></td>
                                                </tr>
                                                <tr>
                                                    <th> Do you have a referral letter from a doctor?</th>
                                                    <td><b>yes</b></td>
                                                </tr>
                                                <tr>
                                                    <th>Do you hold a Hong Kong identity card?</th>
                                                    <td><b>Yes</b></td>
                                                </tr>
                                                <tr>
                                                    <th>Do you have a history of colorectal disease ?</th>
                                                    <td><b>Yes</b></td>
                                                </tr>
                                                <tr>
                                                    <th>Have you ever had a "fecal occult blood test" or participated in the "Colorectal Cancer Screening Program" in the last 2-3 years?</th>
                                                    <td><b>Yes</b></td>
                                                </tr>
                                                <tr>
                                                    <th>Have you ever had a colonoscopy in a public hospital in the past 10 years?</th>
                                                    <td><b>Yes</b></td>
                                                </tr>
                                                <tr>
                                                    <th>Medical Insurance</th>
                                                    <td><b>Yes</b></td>
                                                </tr>
                                                <tr>
                                                    <th>Is there any eHealth registered?</th>
                                                    <td><b>Yes</b></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <!--end::Accordion-->

                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection

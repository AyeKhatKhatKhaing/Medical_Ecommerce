<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="viewport" id="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>mediQ</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('fronend/img/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('fronend/img/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('fronend/img/favicon-16x16.png')}}">
    <link rel="shortcut icon" href="{{asset('fronend/img/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('fronend/img/favicon.ico')}}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {{-- <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> --}}
</head>

<body>
    <style>
        @font-face {
            font-family: "Helvetica-Normal";
            src: local("Helvetica-Normal"), url("./font/Helvetica-neue/Helvetica-Normal.ttf") format("TrueType");
        }

        @font-face {
            font-family: "Helvetica-Regular";
            src: local("Helvetica Regular"), url("./font/Helvetica/Helvetica Regular.woff") format("woff");
        }
        body {
            margin: 0;
            padding: 0;
            /* font-family: "Helvetica-Regular", Roboto, sans-serif; */
            font-family: "Helvetica-Regular", sans-serif;

        }

        body * {
            /* font-family: "Helvetica-Regular", Roboto, sans-serif; */
            font-family: "Helvetica-Regular", sans-serif;

        }
        .no-padding-table{
            border-radius: 12px;
        }
        table{
            max-width: 580px;
            width: 100%;
        }

        .me-email-body {
            width: 640px;
            background: linear-gradient(45deg, #2FA9B5, #2FA9B5);
            margin: 10px auto;
        }

        .me-email-body-logoImg {
            margin: 0px auto;
        }

        .me-email-first-body {
            background-color: #F1FAF9;
            padding: 36px;
            text-align: center;
        }

        .me-email-name {
            font-size: 16px;
            font-weight: normal;
        }

        .me-email-greeting-text {
            margin-top: 20px;
            font-size: 16px;
            font-weight: normal;
        }

        .me-email-footer {
            margin-bottom: 12px;
            padding: 48px 36px;
        }

        .me-email-footer-copyright {
            font-size: 16px;
            font-weight: normal;
            color: #fff;
            text-align: center;
            margin-top: 0;
            margin-bottom: 0;
        }

        .me-email-policy-div {
            margin-top: 8px;
            text-align: center;
        }

        .me-email-policy-div a {
            color: white;
            font-size: 1rem;
            font-weight: normal;
            margin: 0 8px;
            text-decoration: none;
            text-underline-offset: 1.1px;
            text-decoration-skip-ink: none;
        }

        .me-email-body-white-card {
            padding: 0 36px;

        }

        .me-email-white-card {
            border-radius: 12px;
            background-color: white;
            padding: 36px;
            margin-top: -150px;
        }

        .me-email-browse-product a {
            display: inline-block;
            border-radius: 50px;
            border: 1px solid #333;
            background: #fff;
            padding: 10px 20px;
            display: inline-block;
            text-decoration: none;
        }

        .me-email-browse-product a {
            text-decoration: none;
        }

        .me-email-description {
            font-size: 1rem;
            font-weight: normal;
            color: #7C7C7C;
            padding-top: 0;
            padding-bottom: 0;
            margin-top: 0;
            margin-bottom: 0;
        }

        .me-email-cheer-text {
            font-size: 1rem;
            font-weight: normal;
            color: #333;
        }

        .me-email-copy {}

        .me-email-browse-product:hover {}

        p {
            margin-bottom: 0;
            margin-top: 0;
        }
        .blue-div{
            margin-top: -1px !important;
        }
    </style>
    <style media="all and (max-width: 600px)">
        table{
            
            max-width: 510px;
        }
    </style>
    <style media="all and (max-width: 481px)">
        table{
            max-width: 420px;
        }
    </style>
    <style media="all and (max-width: 426px)">
        table{
            max-width: 366px;
        }
    </style>
    <style media="all and (max-width: 400px)">
        table{
            max-width: 340px;
        }
        table table td{
            padding-left: 12px !important;
            padding-right: 12px !important;
        }
        table td{
            padding-left: 16px !important;
            padding-right: 16px !important;
        }
        .no-padding-table td{
            padding-left: 0 !important;
            padding-right: 0 !important;
        }
        td img{
            width: 50px !important;
            height: 50px !important;
        }
        .me-email-policy-div a,
        .me-email-footer-copyright,
        .me-email-cheer-text,
        .me-email-description,
        .custom-text{
            font-size: 14px !important;
        }
        .custom-text-20{
            font-size: 16px !important;
        }
    </style>
  
    <div class="body-div"
        style="background: #2FA9B5;margin: 0 auto;margin-top: 2rem;max-width: 640px;padding-top: 2rem;">
        
        <table bgColor="white" align="center" valign="middle" border="0"
            style="margin: 0 30px;background-color: white !important;position: relative;border-radius: 12px;padding-top: 36px;margin-top: 20px;">

            <tr>
                <td style="padding-bottom: 20px;">
                    <table class="no-padding-table" bgColor="white" align="left" valign="middle" border="0">
                        <tr>
                            <td style="padding:0 36px;padding-top: 18px;">
                                <p class="custom-text" style="font-size: 16x;color: #363848;"><b>Order Information</b></p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 2px;">
                    <table class="no-padding-table" bgColor="white" align="left" valign="middle" border="0">
                        <tr>
                            <td style="padding:0 36px;">
                                <p class="custom-text" style="font-size: 16px; font-weight: 400; color: #363848;">
                                    Order Number: <b>{{$data['order']['invoice_no']}}</b>
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 2px;">
                    <table class="no-padding-table" bgColor="white" align="left" valign="middle" border="0">
                        <tr>
                            <td style="padding:0 36px;">
                                <p class="custom-text" style="font-size: 16px; margin: 0px; font-weight: 400; color: #363848;">
                                    Date: <b>{{date('d-m-Y', strtotime($data['order']['created_at']))}} </b>
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 2px;">
                    <table class="no-padding-table" bgColor="white" align="left" valign="middle" border="0">
                        <tr>
                            <td style="padding:0 36px;">
                                <p class="custom-text" style="font-size: 16px; margin: 0px; font-weight: 400; color: #363848;">
                                    Status: <b>Processing</b>
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table class="no-padding-table" bgColor="white" align="left" valign="middle" border="0" style="width: 100%;">
                        <tr>
                            <td style="padding:0 36px;">
                                <p class="custom-text" style="font-size: 16px; margin: 0px; font-weight: 400; color: #363848;">
                                    Payment Method: <b>{{$data['customerInfo']['card_type']}}</b>
                                </p>
                                <hr style="background-color: #E4E4E4;margin: 20px 0;" />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table class="no-padding-table" bgColor="white" align="left" valign="middle" border="0" style="width: 100%;">
                        <tr>
                            <td style="padding:0 36px;">
                                <p class="custom-text" style="font-size: 16px; margin: 0px; font-weight: 400; color: #363848;">
                                    Name on Receipt: <b>{{$data['order']->first_name.' '.$data['order']->last_name}}</b>
                                </p>                                
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table class="no-padding-table" bgColor="white" align="left" valign="middle" border="0" style="width: 100%;">
                        <tr>
                            <td style="padding:0 36px;">
                                <p class="custom-text" style="font-size: 16px; margin: 0px; font-weight: 400; color: #363848;">
                                    Date: <b>{{date('d M Y',strtotime($data['order']->created_at))}}</b>
                                </p>                                
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table class="no-padding-table" bgColor="white" align="left" valign="middle" border="0" style="width: 100%;">
                        <tr>
                            <td style="padding:0 36px;">
                                <p class="custom-text" style="font-size: 16px; margin: 0px; font-weight: 400; color: #363848;">
                                    Mailing Address: <b>{{isset($data['order']->billingInfo)?$data['order']->billingInfo->address:''}}, {{isset($data['order']->billingInfo->district)?$data['order']->billingInfo->district->name_en:''}} District, Hong Kong</b>
                                </p>                                
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table class="no-padding-table" bgColor="white" align="left" valign="middle" border="0" style="width: 100%;">
                        <tr>
                            <td style="padding:0 36px;">
                                <p class="custom-text" style="font-size: 16px; margin: 0px; font-weight: 400; color: #363848;">
                                    Special Request on the Receipt: <b>{!! $data['order']->billingInfo->special_request !!}</b>
                                </p>     
                                <hr style="background-color: #E4E4E4;margin: 20px 0;" />                           
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            @if(isset($data['sample']))
            @foreach($data['sample'] as $item)
            <tr>
                <td>
                    <table bgColor="white" align="left" valign="middle" border="0" style="width: 100%;">
                        <tr>
                            <td style="padding:0 36px;text-align: center;">
                                <img width="100" height="100" src="{{$item->product->featured_img}}" alt="product logo" />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding-top: 12px;">
                    <table class="no-padding-table" bgColor="white" align="left" valign="middle" border="0">
                        <tr>
                            <td style="padding:0 36px;vertical-align: top;">
                                <p class="custom-text" style="font-size: 16px;color: #333;margin-top: 0;margin-bottom: 0;"><b>{{langbind($item->product,'name')}}</b></p>
                            </td>
                            <td style="padding:0 36px;vertical-align: top;">
                                <p class="custom-text" style="font-size: 16px;color: #333;margin-top: 0;margin-bottom: 0;"><b>${{number_format($item->total)}}</b>
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding:12px 36px;margin-top: 20px;padding-bottom: 8px;">
                    <table bgColor="white" align="left" valign="middle" border="0"
                        style="width: 100%;background-color: #2FA9B5;">
                        <tr>
                            <td style="padding:8px 12px;">
                                <p style="font-size: 12px;color: #fff;margin: 0;"><b>Booking ID {{$item->booking_id}}</b></p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding:0px 36px;">
                    <table class="no-padding-table" bgColor="white" align="left" valign="middle" border="0" style="width: 100%;">
                        <tr>
                            <td>
                                <p class="custom-text" style="font-size: 16px;color: #363848;margin: 0;">Booking Name: <b>{{$item->recipient->first_name.' '.$item->recipient->last_name}}</b>
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding:0px 36px;">
                    <table class="no-padding-table" bgColor="white" align="left" valign="middle" border="0" style="width: 100%;">
                        <tr>
                            <td>
                                <p class="custom-text" style="font-size: 16px;color: #363848;margin: 0;">{{date('d M Y',strtotime($item->recipient->date))}},
                                {{$item->recipient->time}}</b></p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            {{-- <tr>
                <td style="padding:0px 36px;">
                    <table class="no-padding-table" bgColor="white" align="left" valign="middle" border="0" style="width: 100%;">
                        <tr>
                            <td>
                                <p class="custom-text" style="font-size: 16px;color: #363848;margin: 0;">Location: <b>
                                    @isset($item->area)
                                    {{langbind($item->area->merchantLocation,'full_address')}} {{langbind($item->area,'name')}}
                                    @endisset
                                </b></p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr> --}}
            <tr>
                <td style="padding:0px 36px;">
                    <table class="no-padding-table" bgColor="white" align="left" valign="middle" border="0" style="width: 100%;">
                        <tr>
                            <td>
                                <p class="custom-text" style="font-size: 16px;color: #363848;margin: 0;">Payment Method: <b>{{$data['order']['card_name']}}</b></p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding:0px 36px;">
                    <hr style="background-color: #E4E4E4;margin: 20px 0;" />
                </td>
            </tr>
            @endforeach
            @endif

            @if(isset($data['two_person_plan']))
            @foreach(collect($data['two_person_plan'])->split(collect($data['two_person_plan'])->count()/2) as $key => $row)
            @if(count($row) == 2)
            @php
                if($key == 0){
                    $keyVal = $row[0];
                }else{
                    $keyVal = $row[1];
                }
            @endphp
            <tr>
                <td>
                    <table bgColor="white" align="left" valign="middle" border="0" style="width: 100%;">
                        <tr>
                            <td style="padding:0 36px;text-align: center;">
                                <img width="100" height="100" src="{{$keyVal->product->featured_img}}" alt="" />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding-top: 12px;">
                    <table class="no-padding-table" bgColor="white" align="left" valign="middle" border="0">
                        <tr>
                            <td style="padding:0 36px;vertical-align: top;">
                                <p class="custom-text" style="font-size: 16px;color: #333;margin-top: 0;margin-bottom: 0;"><b>{{langbind($keyVal->product,'name')}}</b></p>
                            </td>
                            <td style="padding:0 36px;vertical-align: top;">
                                @php 
                                $total = $row[0]->total + $row[1]->total;
                                @endphp
                                <p class="custom-text" style="font-size: 16px;color: #333;margin-top: 0;margin-bottom: 0;"><b>${{number_format($total)}}</b>
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            @foreach($row as $rrkey => $item)
            <tr>
                <td style="padding:12px 36px;padding-bottom: 8px;">
                    <table bgColor="white" align="left" valign="middle" border="0"
                        style="width: 100%;background-color: #2FA9B5;">
                        <tr>
                            <td style="padding:8px 12px;">
                                <p style="font-size: 12px;color: #fff;margin: 0;"><b>Booking ID {{$keyVal->booking_id}}</b></p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding:0px 36px;">
                    <table class="no-padding-table" bgColor="white" align="left" valign="middle" border="0" style="width: 100%;">
                        <tr>
                            <td>
                                <p class="custom-text" style="font-size: 16px;color: #363848;margin: 0;">Booking Name: <b>{{$item->recipient->first_name.' '.$item->recipient->last_name}}</b>
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding:0px 36px;">
                    <table class="no-padding-table" bgColor="white" align="left" valign="middle" border="0" style="width: 100%;">
                        <tr>
                            <td>
                                <p class="custom-text" style="font-size: 16px;color: #363848;margin: 0;">Booking Date: <b>{{date('d M Y',strtotime($item->recipient->date))}},
                                {{$item->recipient->time}}</b></p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            {{-- <tr>
                <td style="padding:0px 36px;">
                    <table class="no-padding-table" bgColor="white" align="left" valign="middle" border="0" style="width: 100%;">
                        <tr>
                            <td>
                                <p class="custom-text" style="font-size: 16px;color: #363848;margin: 0;">Location: <b>
                                    @isset($item->area)
                                    {{langbind($item->area->merchantLocation,'full_address')}} {{langbind($item->area,'name')}}
                                    @endisset
                                </b></p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr> --}}
            <tr>
                <td style="padding:0px 36px;">
                    <table class="no-padding-table" bgColor="white" align="left" valign="middle" border="0" style="width: 100%;">
                        <tr>
                            <td>
                                <p class="custom-text" style="font-size: 16px;color: #363848;margin: 0;">Payment Method: <b>VISA</b></p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            @endforeach
            
            <tr>
                <td style="padding:0px 36px;">
                    <hr style="background-color: #E4E4E4;margin: 20px 0;" />
                </td>
            </tr>
            @endif
            @endforeach
            @endif
            
            <tr>
                <td style="padding:0px 36px;padding-bottom: 36px;">
                    <table class="no-padding-table" bgColor="white" align="left" valign="middle" border="0" style="width: 100%;">
                        <tr>
                            <td>
                                <p class="custom-text-20" style="font-size: 20px;color: #363848;margin: 0;"><b>Total</b></p>
                            </td>
                            <td>
                                <p class="custom-text-20" style="font-size: 20px;color: #363848;margin: 0;text-align: right;"><b>${{number_format($data['order']['grand_total'])}}</b>
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
    <div class="blue-div" style="background-color: #2FA9B5;max-width: 640px;margin: 0 auto;padding-top: 2px;">
        <div class="me-email-footer">
            <p class="me-email-footer-copyright">Copyright © {{date('Y')}} mediQ. All Rights Reserved.</p>
            <div class="me-email-policy-div">
                <a href="{{route('privacy.policy')}}">Terms of Use</a>
                <a href="{{route('termofuse')}}">Privacy Policy</a>
            </div>
            <div style="margin-top: 8px;text-align: center;">
                <a href="/"><img src="{{ public_path('frontend/img/me-email-fb.png') }}" alt="facebook" /></a>
                <a href="/"><img src="{{ public_path('frontend/img/me-email-ig.png') }}" alt="instagram" /></a>
                <a href="/"><img src="{{ public_path('frontend/img/me-email-youtube.png') }}" alt="youtube" /></a>
            </div>
        </div>
    </div>
</body>

</html>
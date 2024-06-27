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
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
    <style>
        @font-face {
            font-family: "Helvetica-Normal";
            src: local("Helvetica-Normal"), url("../font/Helvetica-neue/Helvetica-Normal.ttf") format("TrueType");
        }

        @font-face {
            font-family: "Helvetica-Regular";
            src: local("Helvetica Regular"), url("../font/Helvetica/Helvetica Regular.woff") format("woff");
        }

        html, body {
            margin: 0;
            padding: 0;
            font-family: "Helvetica-Regular", Roboto, sans-serif;
        }

        body * {
            font-family: "Helvetica-Regular", Roboto, sans-serif;
        }
        p{
            margin: 0;
        }
    </style>
        <div style="max-width: 640px;margin: 0 auto;">
            <div class="body-div"
            style="margin: 0 auto; margin-top: 2rem; padding-top: 30px;
            max-width: 640px;
            background: url('{{ asset('frontend/img/email-template-bg.png') }}'),#f3f7f7;">
            <div class="" style="padding-bottom: 24px;text-align: center;">
                <a href="{{ route('mediq') }}">
                <img src="{{asset('frontend/img/Logotype_Mediq-02.png')}}" alt=""
                    class="me-email-body-logoImg" />
                </a>
            </div>
             <div style="margin: 0 30px;">
            <table bgcolor="white" align="center" valign="middle" border="0"
                style="background-color: white !important;position: relative;border-radius: 12px;padding-top: 36px;margin-top: 20px; width:100%;">

                <tr>
                    <td style="padding-bottom: 20px;">
                        <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0" style="border-radius: 12px;">
                            <tr>
                                <td style="padding:0 15px;padding-top: 18px;">
                                    <p class="custom-text" style="font-size: 16x;color: #363848;"><b>
                                        @lang('labels.email.order_info')
                                    </b>
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-bottom: 2px;">
                        <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0">
                            <tr>
                                <td style="padding:0 15px;">
                                    <p class="custom-text" style="font-size: 16px; font-weight: 400; color: #363848;">
                                        @lang('labels.email.order_no') <b>{{$data['order']['invoice_no']}}</b>
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding-bottom: 2px;">
                        <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0">
                            <tr>
                                <td style="padding:0 15px;">
                                    <p class="custom-text"
                                        style="font-size: 16px; margin: 0px; font-weight: 400; color: #363848;">
                                        @lang('labels.email.order_date') <b>{{date('d-m-Y', strtotime($data['order']['created_at']))}} </b>
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                
                <tr>
                    <td style="padding-bottom: 2px;">
                        <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0">
                            <tr>
                                <td style="padding:0 15px;">
                                    <p class="custom-text"
                                        style="font-size: 16px; margin: 0px; font-weight: 400; color: #363848;">
                                       @lang('labels.email.payment_status') <b>{{$data['order']['payment_type'] == 'other_pay' ? 'Processing' : __('labels.email.paid')}}</b>
                                    </p>
                                       
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
              
                <tr>
                    <td>
                        <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0"
                            style="width: 100%;">
                            <tr>
                                <td style="padding:0 15px;">
                                    <p class="custom-text"
                                        style="font-size: 16px; margin: 0px; font-weight: 400; color: #363848;">
                                        @lang('labels.email.payment_method') <b>{{$data['customerInfo']['card_type']}}</b>
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr> 
                <tr>
                    <td>
                        <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0"
                            style="width: 100%;">
                            <tr>
                                <td style="padding:0 15px;">
                                    <p class="custom-text"
                                        style="font-size: 16px; margin: 0px; font-weight: 400; color: #363848;">
                                        @if(isset($data['order']->coupon_id))
                                            @lang('labels.email.coupon') <b>{{$data['order']->coupon->name_en}}</b>
                                        @endif

                                        @if(isset($data['order']->promoCode))
                                            @lang(@lang('labels.email.promo_code_amt')) <b>{{$data['order']->promoCode->code}}</b>
                                        @endif
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>   
                <tr>
                    <td>
                        <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0" style="width: 100%;">
                            <tr>
                                <td style="padding:0 15px;">
                                    <p class="custom-text" style="font-size: 16px; margin: 0px; font-weight: 400; color: #363848;">
                                        @lang('labels.email.name_on_recipient') <b>{{$data['order']->billingInfo->name}}</b>
                                    </p>                                
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0" style="width: 100%;">
                            <tr>
                                <td style="padding:0 15px;">
                                    <p class="custom-text" style="font-size: 16px; margin: 0px; font-weight: 400; color: #363848;">
                                       @lang('labels.email.date') <b>{{date('d M Y',strtotime($data['order']->created_at))}}</b>
                                    </p>                                
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0" style="width: 100%;">
                            <tr>
                                <td style="padding:0 15px;">
                                    <p class="custom-text" style="font-size: 16px; margin: 0px; font-weight: 400; color: #363848;">
                                        @lang('labels.email.mailing_address') <b>{{$data['order']->billingInfo->address ?? ''}}, {{$data['order']->billingInfo->district->name_en ?? ''}}</b>
                                    </p>                                
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0" style="width: 100%;">
                            <tr>
                                <td style="padding:0 15px;">
                                    <p class="custom-text" style="font-size: 16px; margin: 0px; font-weight: 400; color: #363848;">
                                        @lang('labels.email.special_requiest') <b>{!! $data['order']->billingInfo->special_request !!}</b>
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
                        <table bgcolor="white" align="left" valign="middle" border="0" style="width: 100%;">
                            <tr>
                                <td style="padding:0 0 0 15px;text-align: center;">
                                    <img width="80" height="80" src="{{asset($item->product->featured_img)}}"
                                        alt="product logo" />
                                </td>
                                <td style="padding:0 10px;vertical-align: center;">
                                    <p class="custom-text"
                                        style="font-size: 16px;color: #333;margin-top: 0;margin-bottom: 0;"><b>{{langbind($item->product,'name')}}</b></p>
                                </td>
                                <td style="padding:0 15px 0 0;vertical-align: center;text-align: right;">
                                    <p class="custom-text"
                                        style="font-size: 16px;color: #333;margin-top: 0;margin-bottom: 0;">
                                        <b>${{$item->total}}</b>
                                    </p>
                                </td>
                            </tr>
                        </table>
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
                    $total = $row[0]->total + $row[1]->total;
                @endphp    
                @foreach($row as $rrkey => $item)    
                @if($rrkey == 0) 
                <tr>
                    <td>
                        <table bgcolor="white" align="left" valign="middle" border="0" style="width: 100%;">
                            <tr>
                                <td style="padding:0 0 0 15px;text-align: center;">
                                    <img width="80" height="80" src="{{asset($item->product->featured_img)}}"
                                        alt="product logo" />
                                </td>
                                <td style="padding:0 10px;vertical-align: center;">
                                    <p class="custom-text"
                                        style="font-size: 16px;color: #333;margin-top: 0;margin-bottom: 0;"><b>{{langbind($item->product,'name')}}</b></p>
                                </td>
                                <td style="padding:0 15px 0 0;vertical-align: center;text-align: right;">
                                    <p class="custom-text"
                                        style="font-size: 16px;color: #333;margin-top: 0;margin-bottom: 0;">
                                        <b>${{number_format($total)}}</b>
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>  
                @endif           
                @endforeach   
                @endif           
                @endforeach
                @endif           
                <tr>
                    <td style="padding:0px 36px;">
                        <hr style="background-color: #E4E4E4;margin: 20px 0;" />
                    </td>
                </tr>
                @if( isset($data['order']->coupon_id) || isset($data['order']->promo_code_id) )
                <tr>
                    <td style="padding:0px 36px;padding-bottom: 7px;">
                        <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0"
                            style="width: 100%;">
                            <tr>
                                @if(isset($data['order']->coupon_id))
                                <td>
                                    <p class="custom-text-20" style="font-size: 20px;color: #363848;margin: 0;">
                                        <b>@lang('labels.email.coupon_amount')</b>
                                    </p>
                                </td>
                                <td>
                                    <p class="custom-text-20"
                                        style="font-size: 20px;color: #363848;margin: 0;text-align: right;">
                                        <b>-{{number_format($data['order']->coupon->coupon_amount)}}{{$data['order']->coupon->discount_type == "percent" ? '%' : ''}}</b>
                                    </p>
                                </td>
                                @else 
                                <td>
                                    <p class="custom-text-20" style="font-size: 20px;color: #363848;margin: 0;">
                                        <b>@lang('labels.email.promo_code')</b>
                                    </p>
                                </td>
                                <td>
                                    <p class="custom-text-20"
                                        style="font-size: 20px;color: #363848;margin: 0;text-align: right;">
                                        <b>- ${{number_format($data['order']->promoCode->amount)}}</b>
                                    </p>
                                </td>
                                @endif
                            </tr>
                        </table>
                    </td>
                </tr>
                @endif
                <tr>
                    <td style="padding:0px 36px;padding-bottom: 36px;">
                        <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0"
                            style="width: 100%;">
                            <tr>
                                <td>
                                    <p class="custom-text-20" style="font-size: 20px;color: #363848;margin: 0;">
                                        <b>@lang('labels.email.total')</b>
                                    </p>
                                </td>
                                <td>
                                    <p class="custom-text-20"
                                        style="font-size: 20px;color: #363848;margin: 0;text-align: right;">
                                        <b>${{number_format($data['order']['grand_total'])}}</b>
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table></div>
        </div>
        @include('email.footer')
    </div>
</body>

</html>
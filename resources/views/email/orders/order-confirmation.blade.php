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

        html , body {
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
        style="margin: 0 auto; margin-top:2rem; padding-top:30px;
        max-width: 640px;
        background: url('{{ asset('frontend/img/email-template-bg.png') }}'),#f3f7f7;">
        <div class="" style="padding-bottom: 24px;text-align: center;">
            <a href="{{ route('mediq') }}">
            <img src="{{asset('frontend/img/Logotype_Mediq-02.png')}}" alt=""
                class="me-email-body-logoImg" />
            </a>
        </div>
        {{-- @if(!isset($data['admin'])) --}}
             <div style="padding-left:15px;padding-right:15px;padding-bottom: 26px;background: linear-gradient(to bottom, #f3f7f7 21%, #2fa9b5 1%);">
                <table bgcolor="white" align="center" valign="middle" border="0"
                    style="background-color: white !important;position: relative;border-radius: 12px;padding-top: 26px; width:100%;">
                    <tr>
                        <td>
                            <table width="100%" class="no-padding-table" bgcolor="white" align="center" valign="middle"
                                border="0" style="width: 100%;">
                                <tr>
                                    <td style="padding: 0 15px;text-align: center;">
                                        <img width="100" height="100"
                                            src="{{asset('frontend/img/complete-checked.png')}}"
                                            alt="complete-checked" />
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
                                    <td style="padding: 0 15px; text-align: center; padding-bottom: 36px; padding-top:5px;">
                                        <p style="font-size: 18px;color: #333;">
                                            <b>
                                                @lang('labels.email.thanks')
                                            </b>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0">
                                <tr>
                                    <td style="padding: 0 15px;">
                                        <p class="custom-text"
                                            style="font-size: 16px; margin: 0px 0px 20px 0px; font-weight: 400; color: #333;">
                                            @lang('labels.email.hello') <span style="font-weight: 400;">{{$data['order']['first_name']}},</span>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 20px;">
                            <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0">
                                <tr>
                                    <td style="padding: 0 15px;">
                                        <p class="custom-text"
                                            style="font-size: 16px; margin: 0px; font-weight: 400; color: #333;">
                                            @if (app()->getLocale() == 'en')
                                            Thank you for ordering from mediQ! Once your appointment is confirmed, we will notify you via email for the appointment confirmation. You can use the button below to access more information about your order.
                                            @elseif (app()->getLocale() == 'zh-hk')
                                            感謝您在 mediQ 訂購商品！當預約確認後，我們將透過電郵通知進行預約確認。您可以使用以下按鈕查看更多訂單資訊。
                                            @else
                                            感谢您在 mediQ 订购商品！当预约确认后，我们将透过电邮通知进行预约确认。您可以使用以下按钮查看更多订单资讯。                                            @endif
                                            {{-- <br/><br/>
                                            @lang('labels.email.send_again') --}}
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 20px;">
                            <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0">
                                <tr>
                                    <td style="padding: 0 15px;">
                                        <div class="me-email-browse-product">
                                            <a href="{{route('dashboard.booking.details',$data['order']->id)}}" 
                                            style="font-size: 16px;font-weight: bold;color: #333;display: inline-block;
                                                border-radius: 50px;
                                                border: 1px solid #333;
                                                background: #fff;
                                                padding: 10px 20px;
                                                display: inline-block;
                                                text-decoration: none;
                                                line-height:1;">
                                                @lang('labels.email.view_order')
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 20px;">
                            <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0">
                                <tr>
                                    <td style="padding: 0 15px;">
                                        <p class="me-email-description" style="font-size: 16px;
                                            font-weight: normal;
                                            color: #333;
                                            padding-top: 0;
                                            padding-bottom: 0;
                                            margin-top: 0;
                                            margin-bottom: 0;">
                                            @if (app()->getLocale() == 'en')
                                            If you have any questions regarding your order, please contact our <a style="color:#333;font-size:16px; text-decoration: underline; margin-left: 2px;" href="{{route('contact')}}"> 
                                            Customer Service</a>.
                                            @elseif(app()->getLocale() == 'zh-hk')
                                            如果您對訂單有任何疑問，請聯絡我們的<a style="color:#333;font-size:16px; text-decoration: underline; margin-left: 2px;" href="{{route('contact')}}">客戶服務
                                            </a>。
                                            @else
                                            如果您对订单有任何疑问，请联络我们的<a style="color:#333;font-size:16px; text-decoration: underline; margin-left: 2px;" href="{{route('contact')}}">客戶服務
                                            </a>。
                                            @endif
                                        </p>
                                            
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 20px;padding-top: 20px;">
                            <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0" style="border-radius: 12px;">
                                <tr>
                                    <td style="padding: 0 15px;">
                                        <p class="me-email-cheer-text" style="margin-top: 8px; font-size: 16px;
                                            font-weight: normal;
                                            color: #333;">@lang('labels.email.mediq')
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
           {{-- @endif --}}
             <div style="padding: 26px 15px;background: #2fa9b5;">
            <table bgcolor="white" align="center" valign="middle" border="0"
                style="background-color: white !important;
                position: relative;
                border-radius: 12px;
                padding-top: 10px;
                width: 100%;">
                <tbody>
                                          
                    <tr>
                        <td style="padding-bottom: 20px;">
                            <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0">
                                <tr>
                                    <td style="padding: 0 15px;padding-top: 18px;">
                                        <p class="custom-text" style="font-size: 16px;color: #363848;margin-top: 0;margin-bottom: 0;">
                                            <b>@lang('labels.check_out.order_information')</b>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="">
                            <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0">
                                <tbody>
                                    <tr>
                                        <td style="padding: 0 15px;">
                                            <p class="custom-text" style="font-size: 16px; font-weight: 400; color: #363848;margin-top: 0;margin-bottom: 0;">
                                                @lang('labels.check_out.order_number'):
                                            </p>
                                        </td>
                                        <td style="padding: 0 15px;padding-left: 0;">
                                            <p class="custom-text" style="
                                                font-size: 16px;
                                                font-weight: 400;
                                                color: #363848;
                                                margin-top: 0;
                                                margin-bottom: 0;
                                            ">
                                            <b>{{$data['order']['invoice_no']}}</b>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 0 15px;">
                                            <p class="custom-text"
                                                style="font-size: 16px; margin: 0px; font-weight: 400; color: #363848;">
                                                @lang('labels.email.order_date') 
                                            </p>
                                        </td>
                                        <td style="padding: 0 15px;padding-left: 0;">
                                            <p class="custom-text" style="
                                                font-size: 16px;
                                                font-weight: 400;
                                                color: #363848;
                                                margin-top: 0;
                                                margin-bottom: 0;
                                            ">
                                        <b>{{date('d/m/Y', strtotime($data['order']['created_at']))}} </b>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 0 15px;">
                                            <p class="custom-text"
                                                style="font-size: 16px; margin: 0px; font-weight: 400; color: #363848;">
                                            @lang('labels.email.payment_status') 
                                            </p>
                                        </td>
                                        <td style="padding: 0 15px;padding-left: 0;">
                                                <p class="custom-text" style="
                                                    font-size: 16px;
                                                    font-weight: 400;
                                                    color: #363848;
                                                    margin-top: 0;
                                                    margin-bottom: 0;
                                                ">
                                                <b>{{$data['order']['payment_type'] == 'other_pay' ? 'Processing' : __('labels.email.paid')}}</b>
                                                </p>
                                            </td>
                                    </tr>
                                    @php 
                                    if(isset($data['order']->coupon_id) || isset($data['order']->promo_code_id)){
                                        $is_dis = true;
                                    }else{
                                        $is_dis = false;
                                    }
                                    @endphp
                                    <tr>
                                    <td style="padding: 0 15px;">
                                        <p class="custom-text"
                                            style="font-size: 16px; margin: 0px; font-weight: 400; color: #363848;">
                                            @lang('labels.email.payment_method') 
                                        </p>
                                    </td>
                                        <td style="padding: 0 15px;padding-left: 0;">
                                            <p class="custom-text" style="
                                                font-size: 16px;
                                                font-weight: 400;
                                                color: #363848;
                                                margin-top: 0;
                                                margin-bottom: 0;
                                            ">
                                        <b>{{$data['customerInfo']['card_type']}}</b>
                                            </p>
                                        </td>
                                    </tr>
                                </tbody>
                            
                            </table>
                        </td>
                    </tr>
                    @if( $is_dis == false )                                        
                        <tr>
                            <td style="padding: 0 15px;">
                                <hr style="background-color: #e4e4e4;
                                margin-bottom: 20px;
                                margin-top: 15px;
                                border: 0.5px solid #e4e4e4;" />
                            </td>
                        </tr>
                    @endif                
                    @php 
                    if(isset($data['order']->coupon_id) || isset($data['order']->promo_code_id)){
                        $is_dis = true;
                    }else{
                        $is_dis = false;
                    }
                    @endphp
                
                    {{-- @if( $is_dis == true )
                    <tr>
                        <td>
                            <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0"
                                style="width: 100%;">
                                <tr>
                                    <td style="padding: 0 15px;">
                                        <p class="custom-text"
                                            style="font-size: 16px; margin: 0px; font-weight: 400; color: #363848;">
                                        
                                            @if(isset($data['order']->coupon_id))
                                            @lang('labels.email.coupon') <b>{{$data['order']->coupon->name_en}}</b>
                                            @endif

                                            @if(isset($data['order']->promoCode))
                                            @lang('labels.email.promo_code') <b>{{$data['order']->promoCode->code}}</b>
                                            @endif
                                        </p>
                                        <hr style="background-color: #E4E4E4;margin: 20px 0;" />
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>   
                    @endif --}}

                    @if(isset($data['sample']))
                    @foreach($data['sample'] as $item)         
                    <tr>
                        <td>
                            <table bgcolor="white" align="left" valign="middle" border="0" style="width: 100%;">
                                <tr>
                                    <td style="width:80px;padding-left:15px; text-align: center">
                                        <img  style="width:100%;height:80px;object-fit: contain" src="{{asset($item->product->featured_img)}}"
                                            alt="product logo" />
                                    </td>
                                    <td style="padding:0 10px;vertical-align: center;">
                                        <p class="custom-text"
                                            style="font-size: 16px;color: #333;margin-top: 0;margin-bottom: 0;"><b>{{langbind($item->product,'name')}}</b></p>
                                    </td>
                                    <td style="padding-right: 15px;
                                            vertical-align: center;
                                            text-align: right;">
                                        <p class="custom-text"
                                            style="font-size: 16px;color: #333;margin-top: 0;margin-bottom: 0;">
                                            <b>${{number_format($item->total)}}</b>
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
                                    <td style="width:80px;padding-left:15px; text-align: center">
                                        <img width="80" height="80" src="{{asset($item->product->featured_img)}}"
                                            alt="product logo" style="object-fit: contain;"/>
                                    </td>
                                    <td style="padding:0 10px;vertical-align: center;">
                                        <p class="custom-text"
                                            style="font-size: 16px;color: #333;margin-top: 0;margin-bottom: 0;"><b>{{langbind($item->product,'name')}}</b></p>
                                    </td>
                                    <td style="padding-right: 15px;vertical-align: center;text-align: right;">
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
                        <td style="padding:0px 15px;">
                            <hr style="background-color: #e4e4e4;
                            margin-bottom: 20px;
                            margin-top: 15px;
                            border: 0.5px solid #e4e4e4;" />
                        </td>
                    </tr>
                    @if( $is_dis == true )
                    <tr>
                        <td style="padding:0px 15px;padding-bottom: 7px;">
                            <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0"
                                style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <td>
                                            <p class="custom-text-20" style="font-size: 20px;color: #363848;margin: 0;">
                                                <b>@lang('labels.check_out.my_discount')</b>
                                            </p>
                                        </td>
                                        @if(isset($data['order']->coupon_id))
                                        <td>
                                            <p class="custom-text-20"
                                                style="font-size: 20px;color: #363848;margin: 0;text-align: right;">
                                                <b>-{{number_format($data['order']->coupon->coupon_amount)}}{{$data['order']->coupon->discount_type == "percent" ? '%' : ''}}</b>
                                            </p>
                                        </td>
                                        @else 
                                        {{-- <td>
                                            <p class="custom-text-20" style="font-size: 20px;color: #363848;margin: 0;">
                                                <b>@lang('labels.email.promo_code_amt')</b>
                                            </p>
                                        </td> --}}
                                        <td>
                                            <p class="custom-text-20"
                                                style="font-size: 20px;color: #363848;margin: 0;text-align: right;">
                                                <b>- ${{number_format($data['order']->promoCode->amount)}}</b>
                                            </p>
                                        </td>
                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    @endif
                    <tr>
                        <td style="padding: 0px 15px;padding-bottom: 36px;">
                            <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0"
                                style="width: 100%;">
                                <tbody>
                                <tr>
                                    <td>
                                        <p class="custom-text-20" style="font-size: 20px;color: #363848;margin: 0;">
                                            <b>@lang('labels.order_details.total_amount')</b>
                                        </p>
                                    </td>
                                    <td>
                                        <p class="custom-text-20"
                                            style="font-size: 20px;color: #363848;margin: 0;text-align: right;">
                                            <b>HK${{number_format($data['order']['grand_total'])}}</b>
                                        </p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table></div>
        </div>
        @include('email.footer')
    </div>
</body>

</html>
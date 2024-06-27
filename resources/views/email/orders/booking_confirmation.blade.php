<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="viewport" id="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>mediQ</title>
    <link rel="apple-touch-icon" sizes="180x180" href="./img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./img/favicon-16x16.png">
    <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="./img/favicon.ico" type="image/x-icon">
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
        style="margin: 0 auto;margin-top: 2rem; padding-top: 30px;
        max-width: 640px;
        background: url('{{ asset('frontend/img/email-template-bg.png') }}'),#f3f7f7;">
        <div class="" style="padding-bottom: 24px;text-align: center;">
            <a href="{{ route('mediq') }}">
            <img src="{{asset('frontend/img/Logotype_Mediq-02.png')}}" alt=""
                class="me-email-body-logoImg" />
            </a>
        </div>
        <div style="padding: 0 15px 26px 15px;background: linear-gradient(to bottom, #f3f7f7 21%, #2fa9b5 1%);">
                <table bgcolor="white" align="center" valign="middle" border="0" width="100%"
                    style="background-color: white !important;position: relative;border-radius: 12px;padding-top: 26px;width:100%">
                    @if($data['order_status']==3)
                    <tr>
                        <td>
                            <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0" style="border-radius: 12px;">
                                <tr>
                                    <td style="padding:0 15px;">
                                        <p class="custom-text"
                                            style="font-size: 16px; margin: 0px 0px 20px 0px; font-weight: 400; color: #333;">
                                            @if($data['default_lang']=='en')
                                                @if(isset($data['name']))
                                                Hello <span style="font-weight: 400;">{{$data['name']}},</span>
                                                @else 
                                                <span>Hello,</span>
                                                @endif
                                            @elseif($data['default_lang']=='zh-hk')
                                                @if(isset($data['name']))
                                                <span style="font-weight: 400;">{{$data['name']}}</span> 您好,
                                                @else 
                                                <span>您好,</span>
                                                @endif
                                            @else
                                                @if(isset($data['name']))
                                                <span style="font-weight: 400;">{{$data['name']}}</span> 您好,
                                                @else 
                                                <span>您好,</span>
                                                @endif
                                            @endif
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
                                    <td style="padding:0 15px;">
                                        <p class="custom-text"
                                            style="font-size: 16px; margin: 0px; font-weight: 400; color: #333;">
                                                @if($data['default_lang']=='en')
                                                Your booking for <b>{{$data['orderItem']->product->name_en}} </b>  has been confirmed. Please view the details of your booking below. <br/><br/>
                                                @elseif($data['default_lang']=='zh-hk')
                                                您的 <b>{{$data['orderItem']->product->name_tc}}</b> 預約已確認。請查看以下預約的詳細資料。<br/><br/>          
                                                @else
                                                您的 <b>{{$data['orderItem']->product->name_sc}}</b> 预约已确认。请查看以下预约的详细资料。<br/><br/>
                                                @endif
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
                                    <td style="padding:0 15px;">
                                        <p class="custom-text" style="font-size: 16px;color: #363848;">
                                            @if($data['default_lang']=='en')
                                            <b>Booking Reference ID:</b>{{$data['orderItem']->booking_id}}
                                            @elseif($data['default_lang']=='zh-hk')
                                            <b>預約參考編號:</b>{{$data['orderItem']->booking_id}}
                                            @else
                                            <b>预约参考编号:</b>{{$data['orderItem']->booking_id}}
                                            @endif
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
                                    <td style="padding:0 15px;">
                                        <p class="custom-text" style="font-size: 16px;color: #363848;">
                                            @if($data['default_lang']=='en')
                                            <b>Booking Details</b>
                                            @elseif($data['default_lang']=='zh-hk')
                                            <b>預約詳情</b>
                                            @else
                                            <b>预约详情</b>
                                            @endif
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
                                            @if($data['default_lang']=='en')
                                            Name:
                                            @elseif($data['default_lang']=='zh-hk')
                                            姓名：
                                            @else
                                            姓名:
                                            @endif
                                            
                                        </p>
                                    </td>
                                    <td style="padding:0 15px;">
                                        <p class="custom-text" style="font-size: 16px; font-weight: 400; color: #363848;">
                                        <b>{{$data['name']}}</b>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:0 15px;">
                                        <p class="custom-text" style="font-size: 16px; font-weight: 400; color: #363848;">
                                            @if($data['default_lang']=='en')
                                            Date:
                                            @elseif($data['default_lang']=='zh-hk')
                                            日期：
                                            @else
                                            日期：
                                            @endif
                                        </p>
                                    </td>
                                    <td style="padding:0 15px;">
                                        <p class="custom-text" style="font-size: 16px; font-weight: 400; color: #363848;">
                                        <b>{{date('d M Y', strtotime($data['recipient']['confirm_booking_date']))}}</b>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:0 15px;">
                                        <p class="custom-text" style="font-size: 16px; font-weight: 400; color: #363848;">
                                            @if($data['default_lang']=='en')
                                            Time:
                                            @elseif($data['default_lang']=='zh-hk')
                                            時間：
                                            @else
                                            时间：
                                            @endif
                                        </p>
                                    </td>
                                    <td style="padding:0 15px;">
                                        <p class="custom-text" style="font-size: 16px; font-weight: 400; color: #363848;">
                                        <b>{{$data['recipient']['confirm_booking_time']}}</b>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:0 15px;">
                                        <p class="custom-text" style="font-size: 16px; font-weight: 400; color: #363848;">
                                            @if($data['default_lang']=='en')
                                            Location:
                                            @elseif($data['default_lang']=='zh-hk')
                                            地點：
                                            @else
                                            地点:
                                            @endif
                                        </p>
                                    </td>
                                    <td style="padding:0 15px;">
                                        <p class="custom-text" style="font-size: 16px; font-weight: 400; color: #363848;">
                                        <b>{{$data['location']}}</b>
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
                                    <td style="padding:0 15px;">
                                        <div class="me-email-browse-product">
                                            <a href="{{route('dashboard.booking')}}" style="font-size: 12px;font-weight: bold;color: #333;">
                                                @if($data['default_lang']=='en')
                                                View Booking
                                                @elseif($data['default_lang']=='zh-hk')
                                                查看預約
                                                @else
                                                查看预约
                                                @endif
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 20px;padding-top: 28px;">
                            <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0" style="border-radius: 12px;">
                                <tr>
                                    <td style="padding:0 15px;">
                                        <p class="me-email-cheer-text" style="margin-top: 8px;
                                            font-size: 16px;
                                            font-weight: normal;
                                            color: #333;">
                                            @if($data['default_lang']=='en')
                                            mediQ Team
                                            @elseif($data['default_lang']=='zh-hk')
                                            mediQ團隊
                                            @else
                                            mediQ团队
                                            @endif
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    @endif
                    @if($data['order_status']==6)
                    <tr>
                        <td style="padding-bottom: 20px;">
                            <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0">
                                <tr>
                                    <td style="padding:0 15px;">
                                        <p class="custom-text" style="font-size: 16px;color: #363848;">
                                            @if($data['default_lang']=='en')
                                            <b>The order has been cancelled!</b>
                                            @elseif($data['default_lang']=='zh-hk')
                                            <b>訂單已取消！</b>
                                            @else
                                            <b>订单已取消！</b>
                                            @endif
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
                                    <td style="padding:0 15px;">
                                        <p class="custom-text"
                                            style="font-size: 16px; margin: 0px 0px 20px 0px; font-weight: 400; color: #333;">
                                            @if($data['default_lang']=='en')
                                                @if(isset($data['name']))
                                                Hello <span style="font-weight: 700;">{{$data['name']}},</span>
                                                @else 
                                                <span>Hello,</span>
                                                @endif
                                            @elseif($data['default_lang']=='zh-hk')
                                                @if(isset($data['name']))
                                                <span style="font-weight: 700;">{{$data['name']}}</span> 您好,
                                                @else 
                                                <span>您好,</span>
                                                @endif
                                            @else
                                                @if(isset($data['name']))
                                                <span style="font-weight: 700;">{{$data['name']}}</span> 您好,
                                                @else 
                                                <span>您好,</span>
                                                @endif
                                            @endif
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
                                    <td style="padding:0 15px;">
                                        <p class="custom-text"
                                            style="font-size: 16px; margin: 0px; font-weight: 400; color: #333;">
                                                @if($data['default_lang']=='en')
                                                Your order <b>(Order Number #{{$data['orderItem']->booking_id}})</b> has been cancelled. The amount will be refunded to your credit card or the related payment account. The refund process can be completed within 14 business days.
                                                @elseif($data['default_lang']=='zh-hk')
                                                您的訂單 <b>(訂單編號 #{{$data['orderItem']->booking_id}})</b> 已取消。我們會將金額退還到您用作支付的信用卡或相關付款帳戶，一般退款流程可於14個工作天內完成。        
                                                @else
                                                您的订单 <b>(订单编号 #{{$data['orderItem']->booking_id}})</b> 已取消。我们会将金额退还到您用作支付的信用卡或相关付款帐户，一般退款流程可于14个工作天内完成。      
                                                @endif
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
                                    <td style="padding:0 15px;">
                                        <div class="me-email-browse-product">
                                            <a href="{{route('dashboard.booking')}}" style="font-size: 12px;font-weight: bold;color: #333;">
                                                @if($data['default_lang']=='en')
                                                View Order
                                                @elseif($data['default_lang']=='zh-hk')
                                                查看訂單
                                                @else
                                                查看订单
                                                @endif
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
                                    <td style="padding:0 15px;">
                                        <p class="custom-text"
                                            style="font-size: 16px; margin: 0px; font-weight: 400; color: #333;">
                                            @if($data['default_lang']=='en')
                                            If you have any questions, please contact our <a style="color:#333;text-decoration: underline; margin-left: 2px;" href="{{route('contact')}}"> 
                                            Customer Service
                                            Team</a>.
                                            @elseif($data['default_lang'] == 'zh-hk')
                                            如果您沒有提出此要求,<a style="color:#333;text-decoration: underline; margin-left: 2px;" href="{{route('contact')}}">請立即聯絡我們客服人員
                                            </a>。
                                            @else
                                            如果您没有提出此要求,<a style="color:#333;text-decoration: underline; margin-left: 2px;" href="{{route('contact')}}">请立即联络我们客服人员
                                            </a>。
                                            @endif
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 20px;padding-top: 28px;">
                            <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0">
                                <tr>
                                    <td style="padding:0 15px;">
                                        <p class="me-email-cheer-text" style="margin-top: 8px;
                                            font-size: 1rem;
                                            font-weight: normal;
                                            color: #333;">
                                            @if($data['default_lang']=='en')
                                            mediQ Team
                                            @elseif($data['default_lang']=='zh-hk')
                                            mediQ團隊
                                            @else
                                            mediQ团队
                                            @endif
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
                                    <td style="padding:0 15px;">
                                        <p class="custom-text" style="font-size: 16px;color: #363848;">
                                            @if($data['default_lang']=='en')
                                            <b>Refund Information</b>
                                            @elseif($data['default_lang']=='zh-hk')
                                            <b>退款資料</b>
                                            @else
                                            <b>退款资料</b>
                                            @endif
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
                                            @if($data['default_lang']=='en')
                                            Refund Status:
                                            @elseif($data['default_lang']=='zh-hk')
                                            退款狀態：
                                            @else
                                            退款状态:
                                            @endif
                                            
                                        </p>
                                    </td>
                                    <td style="padding:0 15px;">
                                        <p class="custom-text" style="font-size: 16px; font-weight: 400; color: #363848;">
                                        @if($data['default_lang']=='en')
                                        <b>Pending</b>
                                        @elseif($data['default_lang']=='zh-hk')
                                        <b>待處理</b>
                                        @else
                                        <b>待处理</b>
                                        @endif
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:0 15px;">
                                        <p class="custom-text" style="font-size: 16px; font-weight: 400; color: #363848;">
                                            @if($data['default_lang']=='en')
                                            Refund Method:
                                            @elseif($data['default_lang']=='zh-hk')
                                            退款方式：
                                            @else
                                            退款方式：
                                            @endif
                                        </p>
                                    </td>
                                    <td style="padding:0 15px;">
                                        <p class="custom-text" style="font-size: 16px; font-weight: 400; color: #363848;">
                                            @if($data['default_lang']=='en')
                                            <b>Online Payment</b>
                                            @elseif($data['default_lang']=='zh-hk')
                                            <b>線上付款</b>
                                            @else
                                            <b>线上付款</b>
                                            @endif
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:0 15px;">
                                        <p class="custom-text" style="font-size: 16px; font-weight: 400; color: #363848;">
                                            @if($data['default_lang']=='en')
                                            Refund Amount:
                                            @elseif($data['default_lang']=='zh-hk')
                                            退款金額：
                                            @else
                                            退款金额：
                                            @endif
                                        </p>
                                    </td>
                                    <td style="padding:0 15px;">
                                        <p class="custom-text" style="font-size: 16px; font-weight: 400; color: #363848;">
                                        <b>{{$data['orderItem']->total}}</b>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:0 15px;">
                                        <p class="custom-text" style="font-size: 16px; font-weight: 400; color: #363848;">
                                            @if($data['default_lang']=='en')
                                            Refund Total:
                                            @elseif($data['default_lang']=='zh-hk')
                                            退款總額：
                                            @else
                                            退款总额:
                                            @endif
                                        </p>
                                    </td>
                                    <td style="padding:0 15px;">
                                        <p class="custom-text" style="font-size: 16px; font-weight: 400; color: #363848;">
                                        <b>{{$data['orderItem']->total}}</b>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    @endif
                    @if($data['order_status']==7)
                    <tr>
                        <td>
                            <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0">
                                <tr>
                                    <td style="padding:0 15px;">
                                        <p class="custom-text"
                                            style="font-size: 16px; margin: 0px 0px 20px 0px; font-weight: 400; color: #333;">
                                            @if($data['default_lang']=='en')
                                                @if(isset($data['name']))
                                                Hello <span style="font-weight: 700;">{{$data['name']}},</span>
                                                @else 
                                                <span>Hello,</span>
                                                @endif
                                            @elseif($data['default_lang']=='zh-hk')
                                                @if(isset($data['name']))
                                                <span style="font-weight: 700;">{{$data['name']}}</span> 您好,
                                                @else 
                                                <span>您好,</span>
                                                @endif
                                            @else
                                                @if(isset($data['name']))
                                                <span style="font-weight: 700;">{{$data['name']}}</span> 您好,
                                                @else 
                                                <span>您好,</span>
                                                @endif
                                            @endif
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
                                    <td style="padding:0 15px;">
                                        <p class="custom-text"
                                            style="font-size: 16px; margin: 0px; font-weight: 400; color: #333;">
                                                @if($data['default_lang']=='en')
                                                Your order <b>(Order Number #{{$data['orderItem']->booking_id}})</b> has been refunded. The amount will be refunded to your credit card or the related payment account. The refund process can be completed within 14 business days.
                                                @elseif($data['default_lang']=='zh-hk')
                                                您的訂單 <b>(訂單編號 #{{$data['orderItem']->booking_id}})</b> 已退款。          
                                                @else
                                                您的订单 <b>(订单编号 #{{$data['orderItem']->booking_id}})</b> 已退款。      
                                                @endif
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
                                    <td style="padding:0 15px;">
                                        <div class="me-email-browse-product">
                                            <a href="{{route('dashboard.booking')}}" style="font-size: 12px;font-weight: bold;color: #333;">
                                                @if($data['default_lang']=='en')
                                                View Order
                                                @elseif($data['default_lang']=='zh-hk')
                                                查看訂單
                                                @else
                                                查看订单
                                                @endif
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 20px;padding-top: 28px;">
                            <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0">
                                <tr>
                                    <td style="padding:0 15px;">
                                        <p class="me-email-cheer-text" style="margin-top: 8px;
                                            font-size: 1rem;
                                            font-weight: normal;
                                            color: #333;">
                                            @if($data['default_lang']=='en')
                                            mediQ Team
                                            @elseif($data['default_lang']=='zh-hk')
                                            mediQ團隊
                                            @else
                                            mediQ团队
                                            @endif
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    @endif
                    @if($data['order_status']!=3 && $data['order_status']!=6 && $data['order_status']!=7)
                    <tr>
                        <td>
                            <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0">
                                <tr>
                                    <td style="padding:0 15px;">
                                        <p class="custom-text"
                                            style="font-size: 16px; margin: 0px 0px 20px 0px; font-weight: 400; color: #333;">
                                            @if($data['default_lang']=='en')
                                                @if(isset($data['name']))
                                                Hello <span style="font-weight: 700;">{{$data['name']}},</span>
                                                @else 
                                                <span>Hello,</span>
                                                @endif
                                            @elseif($data['default_lang']=='zh-hk')
                                                @if(isset($data['name']))
                                                <span style="font-weight: 700;">{{$data['name']}}</span> 您好,
                                                @else 
                                                <span>您好,</span>
                                                @endif
                                            @else
                                                @if(isset($data['name']))
                                                <span style="font-weight: 700;">{{$data['name']}}</span> 您好,
                                                @else 
                                                <span>您好,</span>
                                                @endif
                                            @endif
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
                                    <td style="padding:0 15px;">
                                        <p class="custom-text"
                                            style="font-size: 16px; margin: 0px; font-weight: 400; color: #333;">
                                                @if($data['default_lang']=='en')
                                                Your booking for <b>{{$data['orderItem']->product->name_en}} </b>  {{$data['orderItem']->statusText}}. Please view the details of your booking below. <br/><br/>
                                                @elseif($data['default_lang']=='zh-hk')
                                                您的 <b>{{$data['orderItem']->product->name_tc}}</b> {{$data['orderItem']->statusText}}。請查看以下預約的詳細資料。<br/><br/>          
                                                @else
                                                您的 <b>{{$data['orderItem']->product->name_sc}}</b> {{$data['orderItem']->statusText}}。请查看以下预约的详细资料。<br/><br/>
                                                @endif
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
                                    <td style="padding:0 15px;">
                                        <p class="custom-text" style="font-size: 16px;color: #363848;">
                                            @if($data['default_lang']=='en')
                                            <b>Booking Reference ID:</b>{{$data['orderItem']->booking_id}}
                                            @elseif($data['default_lang']=='zh-hk')
                                            <b>預約參考編號:</b>{{$data['orderItem']->booking_id}}
                                            @else
                                            <b>预约参考编号:</b>{{$data['orderItem']->booking_id}}
                                            @endif
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
                                    <td style="padding:0 15px;">
                                        <p class="custom-text" style="font-size: 16px;color: #363848;">
                                            @if($data['default_lang']=='en')
                                            <b>Booking Details</b>
                                            @elseif($data['default_lang']=='zh-hk')
                                            <b>預約詳情</b>
                                            @else
                                            <b>预约详情</b>
                                            @endif
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
                                            @if($data['default_lang']=='en')
                                            Name:
                                            @elseif($data['default_lang']=='zh-hk')
                                            姓名：
                                            @else
                                            姓名:
                                            @endif
                                            
                                        </p>
                                    </td>
                                    <td style="padding:0 15px;">
                                        <p class="custom-text" style="font-size: 16px; font-weight: 400; color: #363848;">
                                        <b>{{$data['name']}}</b>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:0 15px;">
                                        <p class="custom-text" style="font-size: 16px; font-weight: 400; color: #363848;">
                                            @if($data['default_lang']=='en')
                                            Date:
                                            @elseif($data['default_lang']=='zh-hk')
                                            日期：
                                            @else
                                            日期：
                                            @endif
                                        </p>
                                    </td>
                                    <td style="padding:0 15px;">
                                        <p class="custom-text" style="font-size: 16px; font-weight: 400; color: #363848;">
                                        <b>{{date('d M Y', strtotime($data['recipient']['confirm_booking_date']))}}</b>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:0 15px;">
                                        <p class="custom-text" style="font-size: 16px; font-weight: 400; color: #363848;">
                                            @if($data['default_lang']=='en')
                                            Time:
                                            @elseif($data['default_lang']=='zh-hk')
                                            時間：
                                            @else
                                            时间：
                                            @endif
                                        </p>
                                    </td>
                                    <td style="padding:0 15px;">
                                        <p class="custom-text" style="font-size: 16px; font-weight: 400; color: #363848;">
                                        <b>{{$data['recipient']['confirm_booking_time']}}</b>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:0 15px;">
                                        <p class="custom-text" style="font-size: 16px; font-weight: 400; color: #363848;">
                                            @if($data['default_lang']=='en')
                                            Location:
                                            @elseif($data['default_lang']=='zh-hk')
                                            地點：
                                            @else
                                            地点:
                                            @endif
                                        </p>
                                    </td>
                                    <td style="padding:0 15px;">
                                        <p class="custom-text" style="font-size: 16px; font-weight: 400; color: #363848;">
                                        <b>{{$data['location']}}</b>
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
                                    <td style="padding:0 15px;">
                                        <div class="me-email-browse-product">
                                            <a href="{{route('dashboard.booking')}}" style="font-size: 12px;font-weight: bold;color: #333;">
                                                @if($data['default_lang']=='en')
                                                View Booking
                                                @elseif($data['default_lang']=='zh-hk')
                                                查看預約
                                                @else
                                                查看预约
                                                @endif
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 20px;padding-top: 28px;">
                            <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0">
                                <tr>
                                    <td style="padding:0 15px;">
                                        <p class="me-email-cheer-text" style="margin-top: 8px;font-size: 16px;margin-bottom: 18px;
                                        font-weight: normal;
                                        color: #333;">
                                            @if($data['default_lang']=='en')
                                             mediQ Team
                                            @elseif($data['default_lang']=='zh-hk')
                                             mediQ團隊
                                            @else
                                             mediQ团队
                                            @endif
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    @endif
                    {{-- <tr>
                        <td style="padding-bottom: 20px;">
                            <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0">
                                <tr>
                                    <td style="padding:0 15px;">
                                        <p class="custom-text" style="font-size: 16x;color: #363848;">
                                            @if($data['order_status']==6 || $data['order_status']==7)
                                                @if($data['default_lang']=='en')
                                                <b>Cancelled Booking Information</b>
                                                @elseif($data['default_lang']=='zh-hk')
                                                <b>已取消的預約</b>
                                                @else
                                                <b>已取消的预约</b>
                                                @endif
                                            @else
                                                @if($data['default_lang']=='en')
                                                <b>Booking Information</b>
                                                @elseif($data['default_lang']=='zh-hk')
                                                <b>預約資訊</b>
                                                @else
                                                <b>预约资讯</b>
                                                @endif
                                            @endif
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
                                    <td style="padding:0 15px;">
                                        <p class="custom-text" style="font-size: 16x;color: #363848;">
                                            @if($data['default_lang']=='en')
                                            <b>Booking Reference Number:</b>
                                            @elseif($data['default_lang']=='zh-hk')
                                            <b>預約參考號:</b>
                                            @else
                                            <b>预约参考号:</b>
                                            @endif
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
                                            @if($data['default_lang']=='en')
                                            Name:
                                            @elseif($data['default_lang']=='zh-hk')
                                            姓名：
                                            @else
                                            姓名:
                                            @endif
                                            
                                        </p>
                                    </td>
                                    <td style="padding:0 15px;">
                                        <p class="custom-text" style="font-size: 16px; font-weight: 400; color: #363848;">
                                        <b>{{$data['name']}}</b>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:0 15px;">
                                        <p class="custom-text" style="font-size: 16px; font-weight: 400; color: #363848;">
                                            @if($data['default_lang']=='en')
                                            Date:
                                            @elseif($data['default_lang']=='zh-hk')
                                            日期：
                                            @else
                                            日期：
                                            @endif
                                        </p>
                                    </td>
                                    <td style="padding:0 15px;">
                                        <p class="custom-text" style="font-size: 16px; font-weight: 400; color: #363848;">
                                        <b>{{date('d M Y', strtotime($data['recipient']['confirm_booking_date']))}}</b>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:0 15px;">
                                        <p class="custom-text" style="font-size: 16px; font-weight: 400; color: #363848;">
                                            @if($data['default_lang']=='en')
                                            Time:
                                            @elseif($data['default_lang']=='zh-hk')
                                            時間：
                                            @else
                                            时间：
                                            @endif
                                        </p>
                                    </td>
                                    <td style="padding:0 15px;">
                                        <p class="custom-text" style="font-size: 16px; font-weight: 400; color: #363848;">
                                        <b>{{$data['recipient']['confirm_booking_time']}}</b>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:0 15px;">
                                        <p class="custom-text" style="font-size: 16px; font-weight: 400; color: #363848;">
                                            @if($data['default_lang']=='en')
                                            Location:
                                            @elseif($data['default_lang']=='zh-hk')
                                            地點：
                                            @else
                                            地点:
                                            @endif
                                        </p>
                                    </td>
                                    <td style="padding:0 15px;">
                                        <p class="custom-text" style="font-size: 16px; font-weight: 400; color: #363848;">
                                        <b>{{$data['location']}}</b>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 20px;padding-top: 28px;">
                            <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0">
                                <tr>
                                    <td style="padding:0 15px;">
                                        <p class="me-email-cheer-text" style="margin-top: 8px;
                                            font-size: 1rem;
                                            font-weight: normal;
                                            color: #333;">
                                            @if($data['default_lang']=='en')
                                            <b>mediQ Team</b>
                                            @elseif($data['default_lang']=='zh-hk')
                                            <b>mediQ團隊</b>
                                            @else
                                            <b>mediQ团队</b>
                                            @endif
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    @if($data['order_status']==6)
                    <tr>
                        <td style="padding-bottom: 2px;">
                            <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0">
                                <tr>
                                    <td style="padding:0 15px;">
                                        <p class="custom-text" style="font-size: 16px; font-weight: 400; color: #363848;">
                                            @if($data['default_lang']=='en')
                                            Paid Amount:
                                            @elseif($data['default_lang']=='zh-hk')
                                            已付金額：
                                            @else
                                            已付金额：
                                            @endif
                                            
                                        </p>
                                    </td>
                                    <td style="padding:0 15px;">
                                        <p class="custom-text" style="font-size: 16px; font-weight: 400; color: #363848;">
                                        <b>HK${{$data['orderItem']->total}}</b>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:0 15px;">
                                        <p class="custom-text" style="font-size: 16px; font-weight: 400; color: #363848;">
                                            @if($data['default_lang']=='en')
                                            Refund Amount:
                                            @elseif($data['default_lang']=='zh-hk')
                                            退回金額：
                                            @else
                                            退回金额：
                                            @endif
                                        </p>
                                    </td>
                                    <td style="padding:0 15px;">
                                        <p class="custom-text" style="font-size: 16px; font-weight: 400; color: #363848;">
                                            <b>HK${{$data['orderItem']->refund_amount}}</b>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    @endif
                
                    <tr>
                        <td style="padding-bottom: 20px;">
                            <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0">
                                <tr>
                                    <td style="padding:0 15px;">
                                        <div class="me-email-browse-product">
                                            <a href="{{route('dashboard.booking')}}" style="font-size: 12px;font-weight: bold;color: #333;">
                                                @if($data['default_lang']=='en')
                                                View Booking
                                                @elseif($data['default_lang']=='zh-hk')
                                                查看預訂
                                                @else
                                                查看预订
                                                @endif
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 2px;">
                            <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0">
                                <tr>
                                    {{-- <td style="padding:0 15px;">
                                        <p class="custom-text"
                                            style="font-size: 16px; margin: 0px; font-weight: 400; color: #333;">
                                            @if($data['default_lang']=='en')
                                            If you didn't request this, Please ignore this email.
                                            @elseif($data['default_lang']=='zh-hk')
                                            如果您沒有提出此要求，請立即聯絡我們客服人員。
                                            @else
                                            如果您没有提出此要求，请立即联络我们客服人员。
                                            @endif
                                        </p>
                                    </td> 
                                    <td style="padding:0 15px;">
                                        {{-- <p class="me-email-description" style="font-size: 1rem;
                                            font-weight: normal;
                                            color: #333;
                                            padding-top: 0;
                                            padding-bottom: 0;
                                            margin-top: 0;
                                            margin-bottom: 0;">
                                            @if (app()->getLocale() == 'en')
                                            If you did't request this, please contact <a style="color:#333;text-decoration: underline; margin-left: 2px;" href="{{route('contact')}}"> 
                                            Customer Service
                                            Team.</a>
                                            @elseif(app()->getLocale() == 'zh-hk')
                                            如果您沒有提出此要求，請立即聯絡我
                                            <a style="color:#333;text-decoration: underline; margin-left: 2px;" href="{{route('contact')}}"> 
                                            們客服人員
                                            </a>。
                                            @else
                                            如果您没有提出此要求，请立即联络我们
                                            <a style="color:#333;text-decoration: underline; margin-left: 2px;" href="{{route('contact')}}"> 
                                            客服人员
                                            </a>。
                                            @endif
                                        </p> 
                                        <p class="me-email-description" style="font-size: 1rem;
                                            font-weight: normal;
                                            color: #333;
                                            padding-top: 0;
                                            padding-bottom: 0;
                                            margin-top: 0;
                                            margin-bottom: 0;">
                                            @if($data['default_lang']=='en')
                                            If you have any questions, please contact our <a style="color:#333;text-decoration: underline; margin-left: 2px;" href="{{route('contact')}}"> 
                                            Customer Service
                                            Team.</a>
                                            @elseif($data['default_lang'] == 'zh-hk')
                                            如果您沒有提出此要求,
                                            <a style="color:#333;text-decoration: underline; margin-left: 2px;" href="{{route('contact')}}"> 
                                            請立即聯絡我們客服人員。
                                            </a>
                                            @else
                                            如果您没有提出此要求,
                                            <a style="color:#333;text-decoration: underline; margin-left: 2px;" href="{{route('contact')}}"> 
                                            请立即联络我们客服人员。
                                            </a>
                                            @endif
                                        </p>
                                            
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 20px;padding-top: 28px;">
                            <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0">
                                <tr>
                                    <td style="padding:0 15px;">
                                        <p class="me-email-cheer-text" style="margin-top: 8px;
                                            font-size: 1rem;
                                            font-weight: normal;
                                            color: #333;">
                                            @if($data['default_lang']=='en')
                                            <b>mediQ Team</b>
                                            @elseif($data['default_lang']=='zh-hk')
                                            <b>mediQ團隊</b>
                                            @else
                                            <b>mediQ团队</b>
                                            @endif
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr> --}}
                </table>
            </div>
        </div>
        @include('email.footer')
    </div>
</body>

</html>
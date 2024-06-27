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
            <div style="margin: 0 30px;">
                <table bgcolor="white" align="center" valign="middle" border="0" width="100%"
                    style="background-color: white !important;position: relative;border-radius: 12px;padding-top: 26px;width:100%">
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
                                            @if($data['payment_status']==4)
                                                @if($data['default_lang']=='en')
                                                Your order payment is rejected. 
                                                @elseif($data['default_lang']=='zh-hk')
                                                您的訂單收款被拒絕。          
                                                @else
                                                您的订单收款被拒绝。    
                                                @endif
                                            @elseif($data['payment_status']==5)
                                                @if($data['default_lang']=='en')
                                                Your order payment was successful. 
                                                @elseif($data['default_lang']=='zh-hk')
                                                您的訂單付款成功。          
                                                @else
                                                您的订单付款成功。
                                                @endif
                                            @elseif($data['payment_status']==6)
                                                @if($data['default_lang']=='en')
                                                Your order payment was cancelled. 
                                                @elseif($data['default_lang']=='zh-hk')
                                                您的訂單付取消。          
                                                @else
                                                您的订单付款取消。
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
                                            <b>Order Number:</b>{{$data['invoice_no']}}
                                            @elseif($data['default_lang']=='zh-hk')
                                            <b>訂單編號:</b>{{$data['invoice_no']}}
                                            @else
                                            <b>订单编号:</b>{{$data['invoice_no']}}
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
                        <td style="padding-bottom: 20px;">
                            <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0">
                                <tr>
                                    <td style="padding:0 15px;">
                                        <p class="custom-text"
                                            style="font-size: 16px; margin: 0px; font-weight: 400; color: #333;">
                                            @if($data['default_lang']=='en')
                                            If you have any questions, please contact our <a style="color:#333;text-decoration: underline; margin-left: 2px;" href="{{route('contact')}}"> 
                                            Customer Service</a> Team.
                                            @elseif($data['default_lang'] == 'zh-hk')
                                            如果您沒有提出此要求,<a style="color:#333;text-decoration: underline; margin-left: 2px;" href="{{route('contact')}}">請立即聯絡我們客服人員</a>。
                                            @else
                                            如果您没有提出此要求,<a style="color:#333;text-decoration: underline; margin-left: 2px;" href="{{route('contact')}}">请立即联络我们客服人员</a>。
                                            @endif
                                        </p>
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
                </table>
            </div>
        </div>
        @include('email.footer')
    </div>
</body>

</html>
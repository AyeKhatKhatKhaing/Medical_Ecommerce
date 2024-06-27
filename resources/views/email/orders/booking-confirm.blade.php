
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="viewport" id="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>MediQ</title>
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
                    style="background-color: white !important;position: relative;border-radius: 12px;padding-top: 26px;width: 100%;">
                    {{-- <tr>
                        <td style="padding: 0 15px; text-align: center">
                          <img width="100" height="100" src="{{asset('frontend/img/complete-checked.png')}}"
                            alt="complete-checked" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                          <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0">
                            <tr>
                              <td style="padding: 0 36px">
                                <p class="custom-text" style="
                                      font-size: 16px;
                                      margin: 0px 0px 20px 0px;
                                      font-weight: 400;
                                      color: #333;
                                    ">
                                 @if($data['default_lang']=='en')
                                 <b>Your Booking Confirmed!</b>
                                 @elseif($data['default_lang']=='zh-hk')
                                 <b>您的預約已確認！</b>
                                 @else
                                 <b>您的预约已确认！</b>
                                 @endif
                                </p>
                              </td>
                            </tr>
                          </table>
                        </td>
                    </tr> --}}
                    <tr>
                        <td>
                            <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0">
                                <tr>
                                    <td style="padding:0 15px;">
                                        <p class="custom-text"
                                            style="font-size: 16px; margin: 0px 0px 20px 0px; font-weight: 400; color: #333;">
                                            @if($data['default_lang']=='en')
                                            @if(isset($data['name']))
                                            Hello <span>{{$data['name']}},</span>
                                            @else 
                                            <span>Hello,</span>
                                            @endif
                                          @elseif($data['default_lang']=='zh-hk')
                                            @if(isset($data['name']))
                                            <span>{{$data['name']}}</span> 您好,
                                            @else 
                                            <span>您好,</span>
                                            @endif
                                          @else
                                            @if(isset($data['name']))
                                            <span>{{$data['name']}}</span> 您好,
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
                                            @php 
                                            $productUrl = env("APP_URL")."/".$data['default_lang']."/product/".$data['orderItem']->product->category->name_en.'/'.$data['orderItem']->product->slug_en;
                                            @endphp
                                            @if($data['default_lang']=='en')
                                            Your booking for <a href="{{$productUrl}}" style="color:#333;font-size:16px;margin:0 8px;text-decoration:none;"><b>{{$data['orderItem']->product->name_en}}</b></a>  has been confirmed. Please view the details of your booking below. <br/><br/>
                                            @elseif($data['default_lang']=='zh-hk')
                                            您的 <a href="{{$productUrl}}" style="color:#333;font-size:16px;margin:0 8px;text-decoration:none;"><b>{{$data['orderItem']->product->name_tc}}</b></a> 預約已確認。請查看以下預約的詳細資料。<br/><br/>          
                                            @else
                                            您的 <a href="{{$productUrl}}" style="color:#333;font-size:16px;margin:0 8px;text-decoration:none;"><b>{{$data['orderItem']->product->name_sc}}</b></a> 预约已确认。请查看以下预约的详细资料。<br/><br/>
                                            @endif
                                            {{-- Your booking for <a href="/" style="font-size: 16px; margin: 0px; font-weight: 400; color: #333;"><b>Mobile Medical</b></a> is confirmed.</br></br> --}}
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:12px 15px;padding-bottom: 8px;">
                            <table bgcolor="white" align="left" valign="middle" border="0"
                                style="width: 100%;background-color: #2FA9B5;">
                                <tr>
                                    <td style="padding:8px 12px;">
                                        <p style="font-size: 16px;color: #fff;margin: 0;">
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
                        <td>
                            <table bgcolor="white" align="left" valign="middle" border="0" style="width: 100%;">
                                <tr>
                                    <td style="padding:0 0 0 15px;text-align: center;">
                                        <img width="80" height="80" src="{{asset($data['orderItem']->product->featured_img)}}"
                                            alt="product logo" />
                                    </td>
                                    <td style="padding:0 10px;vertical-align: center;">
                                        <p class="custom-text"
                                            style="font-size: 20px;color: #333;margin-top: 0;margin-bottom: 0;">
                                            @if($data['default_lang']=='en')
                                            <b>{{$data['orderItem']->product->name_en}}
                                            @elseif($data['default_lang']=='zh-hk')
                                            <b>{{$data['orderItem']->product->name_tc}}
                                            @else
                                            <b>{{$data['orderItem']->product->name_sc}}
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
                                    <td style="padding:0 15px;padding-top: 18px;">
                                        <p class="custom-text" style="font-size: 20px;color: #363848;">
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
                                    <td style="padding:0 15px;padding-right:0;width: 140px;">
                                        <p class="custom-text"
                                            style="font-size: 16px; font-weight: 400; color: #363848;margin: 0;">
                                            @if($data['default_lang']=='en')
                                            Name:
                                            @elseif($data['default_lang']=='zh-hk')
                                            姓名：
                                            @else
                                            姓名:
                                            @endif
                                        </p>
                                    </td>
                                    <td style="padding:0 15px;padding-left: 0;">
                                        <p class="custom-text"
                                            style="font-size: 16px; font-weight: 400; color: #363848;margin: 0;">
                                            <b>
                                            @if($data['recipient']->title)
                                            @if($data['recipient']->title == 'true')
                                            Miss/Mrs.
                                            @else
                                            Mr.
                                            @endif
                                            @endif
                                            {{ $data['recipient']->last_name }} {{ $data['recipient']->first_name }}
                                            </b>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:0 15px;padding-right:0;">
                                        <p class="custom-text"
                                            style="font-size: 16px; font-weight: 400; color: #363848;margin: 0;">
                                            @if($data['default_lang']=='en')
                                            Date:
                                            @elseif($data['default_lang']=='zh-hk')
                                            日期：
                                            @else
                                            日期：
                                            @endif
                                        </p>
                                    </td>
                                    <td style="padding:0 15px;padding-left:0;">
                                        <p class="custom-text"
                                            style="font-size: 16px; font-weight: 400; color: #363848;margin: 0;">
                                            @php 
                                            $date =  date('d M Y', strtotime($data['recipient']['confirm_booking_date']));
                                            $day =  date('D', strtotime($data['recipient']['confirm_booking_date']));
                                            if($data['default_lang']=='en') {
                                                $date =  $date . " ($day)";
                                            }
                                            elseif($data['default_lang']=='zh-hk') {
                                                if($day =='Mon') {
                                                    $day = "周一";
                                                }elseif($day =='Tue'){
                                                    $day = "周二";
                                                }elseif($day =='Wed'){
                                                    $day = "周三";
                                                }elseif($day =='Thu'){
                                                    $day = "周四";
                                                }elseif($day =='Fri'){
                                                    $day = "周五";
                                                }elseif($day =='Sat'){
                                                    $day = "周六";
                                                }else{
                                                    $day = "周日";
                                                }
                                                $date =  $date . " ($day)";
                                            }
                                            else {
                                                if($day =='Mon') {
                                                    $day = "周一";
                                                }elseif($day =='Tue'){
                                                    $day = "周二";
                                                }elseif($day =='Wed'){
                                                    $day = "周三";
                                                }elseif($day =='Thu'){
                                                    $day = "周四";
                                                }elseif($day =='Fri'){
                                                    $day = "周五";
                                                }elseif($day =='Sat'){
                                                    $day = "周六";
                                                }else{
                                                    $day = "周日";
                                                }
                                                $date =  $date . " ($day)";
                                            }
                                            @endphp
                                            <b>{{$date}}</b>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:0 15px;padding-right:0;">
                                        <p class="custom-text"
                                            style="font-size: 16px; font-weight: 400; color: #363848;margin: 0;">
                                            @if($data['default_lang']=='en')
                                            Time:
                                            @elseif($data['default_lang']=='zh-hk')
                                            時間：
                                            @else
                                            时间：
                                            @endif
                                        </p>
                                    </td>
                                    <td style="padding:0 15px;padding-left:0;">
                                        <p class="custom-text"
                                            style="font-size: 16px; font-weight: 400; color: #363848;margin: 0;">
                                            <b>@php
                                            $time = $data['recipient']['confirm_booking_time'];
                                            $subTime = substr($time,0,2);
                                            \Log::debug($subTime);
                                            if((int)($subTime)>12) {
                                                $timeString = "PM";
                                            }else{
                                                $timeString = "AM";
                                            }
                                            $time = $time.' '.$timeString;
                                            @endphp
                                            {{$time}}
                                            </b>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:0 15px;padding-right:0;">
                                        <p class="custom-text"
                                            style="font-size: 16px; font-weight: 400; color: #363848;margin: 0;">
                                            @if($data['default_lang']=='en')
                                            Location:
                                            @elseif($data['default_lang']=='zh-hk')
                                            地點：
                                            @else
                                            地点:
                                            @endif
                                        </p>
                                    </td>
                                    <td style="padding:0 15px;padding-left:0;">
                                        <p class="custom-text"
                                            style="font-size: 16px; font-weight: 400; color: #363848;margin: 0;">
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
                                        @php 
                                            $bookingUrl = env("APP_URL")."/".$data['default_lang']."/mybooking";
                                        @endphp
                                        <a href="{{$bookingUrl}}" style="font-size: 16px;font-weight: bold;color: #333;display: inline-block;
                                        border-radius: 50px;
                                        border: 1px solid #333;
                                        background: #fff;
                                        padding: 10px 20px;
                                        display: inline-block;
                                        text-decoration: none;margin-top: 10px;">
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
                    {{-- <tr>
                        <td style="padding-bottom: 2px;">
                            <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0">
                                <tr>
                                    <td style="padding:0 15px;">
                                        <p class="custom-text"
                                            style="font-size: 16px; margin: 0px; font-weight: 400; color: #333;">
                                            If you didn't request this, Please ignore this email.
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr> --}}
                    <tr>
                        <td style="padding-bottom: 20px;padding-top: 28px;">
                            <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0" style="border-radius: 12px;">
                                <tr>
                                    <td style="padding:0 15px;">
                                        <p class="me-email-cheer-text" style="margin-top: 8px;font-size: 16px;
                                    font-weight: normal;
                                    color: #333;"> @if($data['default_lang']=='en')
                                        mediQ Team
                                        @elseif($data['default_lang']=='zh-hk')
                                        mediQ團隊
                                        @else
                                        mediQ团队
                                        @endif</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        @include('email.footer',['defaultLang'=>$data['default_lang']])
    </div>
</body>

</html>
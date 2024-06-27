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
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet">
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
                <table bgcolor="white" align="center" valign="middle" border="0" 
                style="background-color: white !important;position: relative;border-radius: 12px;padding-top: 36px; width:100%;">
                <tr>
                    <td>
                        <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0" style="border-radius: 12px;">
                            <tr>
                                <td style="padding:0 15px;">
                                    <p style="font-size: 16px; margin: 0px 0px 20px 0px; font-weight: 400; color: #333;">
                                        {{-- @if(isset($data['name']))
                                            @lang('labels.email.hello') <span style="font-weight: 400;">{{$data['name']}},</span>
                                        @else 
                                            @lang('labels.email.hello'),</span>
                                        @endif --}}
                                        @if(app()->getLocale()=='en')
                                        @if(isset($data['name']))
                                        Hello <span style="font-weight: 400;">{{$data['name']}},</span>
                                        @else 
                                        <span>Hello,</span>
                                        @endif
                                        @elseif(app()->getLocale()=='zh-hk')
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
                                    <p style="font-size: 16px; margin: 0px; font-weight: 400; color: #333;">
                                       {{-- @lang('labels.email.b_coupon_text') --}}
                                       @if (app()->getLocale() == 'en')
                                       {{-- Your membership account has been successfully created. Here's a special shopping welcome coupon (Total Value ${{$data['coupons']->sum('coupon_amount')}}) just for you. --}}
                                       Thanks for your support! Here's a coupon for your birthday purchase online (Total Value ${{$data['coupons']->sum('coupon_amount')}}) 🎁. Happy Birthday to you 🎂🎉!
                                       @elseif(app()->getLocale() == 'zh-hk')
                                       感謝您的支持！這是送給您的生日購物優惠券 (總值 ${{$data['coupons']->sum('coupon_amount')}}) 🎁 。祝您生日快樂 🎂🎉！
                                       @else
                                       感谢您的支持！这是送给您的生日购物优惠券 (总值 ${{$data['coupons']->sum('coupon_amount')}}) 🎁 。祝您生日快乐 🎂🎉！
                                       @endif
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                {{-- <tr>
                    <td style="padding-bottom: 20px;">
                        <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0">
                            <tr>
                                <td style="padding:0 15px;">
                                    <div>
                                        <a href="{{route('products.listings')}}" style="font-size: 12px;font-weight: bold;color: #333;display: inline-block;
                                    border-radius: 50px;
                                    border: 1px solid #333;
                                    background: #fff;
                                    padding: 10px 20px;
                                    display: inline-block;
                                    text-decoration: none;">
                                            @lang('labels.email.browse')
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr> --}}
                {{-- <tr>
                    <td>
                        <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0">
                            <tr>
                                <td style="padding:0 15px;">
                                    <p
                                        style="font-size: 16px; margin: 0px 0px 20px 0px; font-weight: 400; color: #333;">
                                        &#127873; @lang('labels.email.b_coupon') ( @lang('labels.email.total_value') ${{$data['coupons']->sum('coupon_amount')}})
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr> --}}
                <tr>
                    <td style="padding:0 15px;">
                        <div>
                            <img src="{{asset($data['birthday_img'])}}" alt="coupon"  style="max-width: 277px;" />
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="padding:12px 36px;">
                        <div>
                            <a href="{{route('dashboard.coupon')}}" style="font-size: 12px;font-weight: bold;color: #333;display: inline-block;
                                border-radius: 50px;
                                border: 1px solid #333;
                                background: #fff;
                                padding: 10px 20px;
                                display: inline-block;
                                text-decoration: none;">
                               @lang('labels.email.view_coupon')
                            </a>
                        </div>
                    </td>
                </tr>
                {{-- <tr>
                    <td style="padding-bottom: 20px;">
                        <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0">
                            <tr>
                                <td style="padding:0 15px;">
                               
                                        <p class="me-email-description">
                                            @if (app()->getLocale() == 'en')
                                            If you have any questions, please contact our <a style="color:#333;text-decoration: underline; margin-left: 2px;" href="{{route('contact')}}"> 
                                            Customer Service
                                            Team.</a>
                                            @elseif(app()->getLocale() == 'zh-hk')
                                            我們將在你的健康旅程中提供支持。如果您需要協助，我們
                                            <a style="color:#333;text-decoration: underline; margin-left: 2px;" href="{{route('contact')}}"> 
                                            的客戶服務團隊
                                            </a>
                                            隨時為你提供幫助。
                                            @else
                                            我们将在你的健康旅程中提供支持。如果您需要协助，我们
                                            <a style="color:#333;text-decoration: underline; margin-left: 2px;" href="{{route('contact')}}"> 
                                            的客户服务团队
                                            </a>
                                            随时为你提供帮助。
                                            @endif
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
                                    <p class="me-email-cheer-text" style="margin-top: 8px;font-size: 16px;margin-bottom: 18px;
                                                                          font-weight: normal;
                                                                          color: #333;">
                                    @lang('labels.email.mediq')</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            </div>
        </div>
        @php                                        
        $defaultLang = app()->getLocale();
        @endphp
        @include('email.footer')
    </div>
</body>

</html>
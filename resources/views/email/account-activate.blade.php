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
        <div style="padding: 0 15px 26px 15px;background: linear-gradient(to bottom, #f3f7f7 21%, #2fa9b5 1%);">
                <table bgColor="white" align="center" valign="middle" border="0"
                    style="background-color: white !important;position: relative;border-radius: 12px;padding-top: 36px;width: 100%;">
                    <tr>
                        <td>
                            <table class="no-padding-table" bgColor="white" align="left" valign="middle" border="0" style="border-radius: 12px;">
                                <tr>
                                    <td style="padding:0 15px;">
                                        <p
                                            style="font-size: 16px; margin: 0px 0px 20px 0px; font-weight: 400; color: #333;">
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
                            <table class="no-padding-table" bgColor="white" align="left" valign="middle" border="0">
                                <tr>
                                    <td style="padding:0 15px;">
                                        @if (app()->getLocale() == 'en')
                                        <p style="font-size: 16px; margin: 0px; font-weight: 400; color: #333;">
                                            You have successfully created a new account on <span>mediQ</span>. All you need to do is activate it.
                                        </p>
                                        @elseif(app()->getLocale() == 'zh-hk')
                                        <p style="font-size: 16px; margin: 0px; font-weight: 400; color: #333;">
                                            您已在 <span>mediQ</span> 成功建立新帳戶。請使用以下按鈕激活您的帳戶。

                                        </p>
                                        @else
                                         <p style="font-size: 16px; margin: 0px; font-weight: 400; color: #333;">
                                            您已在 <span> mediQ </span> 成功建立新帐户。请使用以下按钮激活您的帐户。
                                         </p>
                                        @endif
                                       
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-bottom: 20px;">
                            <table class="no-padding-table" bgColor="white" align="center" valign="middle" border="0">
                                <tr>
                                    <td style="padding:0 15px;">
                                        <div>
                                            <a href="{{url($data['activate_link'])}}" 
                                            style="
                                            font-size: 16px;font-weight: bold;color: #fff;display: inline-block;
                                            border-radius: 50px;
                                            border: 1px solid #FF8201;
                                            background: #fff;
                                            padding: 15px 25px;
                                            display: inline-block;
                                            background-color: #FF8201;
                                            text-decoration: none;
                                            line-height:1;
                                            ">
                                                @lang('labels.email.activate')
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    {{-- <tr>
                        <td style="padding-bottom: 20px;">
                            <table class="no-padding-table" bgColor="white" align="left" valign="middle" border="0">
                                <tr>
                                    <td style="padding:0 15px;">
                                        <p class="me-email-description" 
                                        style="font-size: 1rem;
                                        font-weight: normal;
                                        color: #333;
                                        padding-top: 0;
                                        padding-bottom: 0;
                                        margin-top: 0;
                                        margin-bottom: 0;
                                        ">
                                            @lang('labels.email.question')
                                            <a style="color: #333;font-size: 1rem;text-decoration: underline;" href="{{route('contact')}}">
                                            @lang('labels.email.let_us_know')
                                            </a>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr> --}}
                    <tr>
                        <td style="padding-bottom: 20px;padding-top: 28px;">
                            <table class="no-padding-table" bgColor="white" align="left" valign="middle" border="0" style="border-radius: 12px;">
                                <tr>
                                    <td style="padding:0 15px;">
                                        <p class="me-email-cheer-text" style="margin-top: 8px;font-size: 16px;margin-bottom: 18px;
                                        font-weight: normal;
                                       color: #333;">@lang('labels.email.mediq')</p>
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
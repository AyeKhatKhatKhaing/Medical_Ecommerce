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
</head>

<body>
    <style>
        @font-face {
            font-family: "Helvetica";
            src: local("Helvetica-Normal"), url("../font/Helvetica-neue/Helvetica-Normal.ttf") format("TrueType");
        }

        @font-face {
            font-family: "Helvetica";
            src: local("Helvetica Regular"), url("../font/Helvetica/Helvetica Regular.woff") format("woff");
        }

        html, body {
            margin: 0;
            padding: 0;
            font-family: "Helvetica", Roboto, sans-serif;
        }
        body * {
            font-family: "Helvetica", Roboto, sans-serif;
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
        <table bgcolor="white" align="center" valign="middle" border="0"
            style="background-color: white !important;position: relative;border-radius: 12px;width: 100%;">
            <tr>
                <td style="width:100%;">
                    <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0" style="border-radius: 12px;">
                        <tr>
                            <td style="padding: 0px 15px; width:100%;">
                                <p style="font-size: 16px; margin: 0px 0px 20px 0px; font-weight: 400; color: #333; padding-top: 36px;">
                                    {{-- @if(isset($data['name']))
                                    @lang('labels.email.hi') <span style="font-weight: 400;">{{$data['name']}},</span>
                                    @else 
                                    @lang('labels.email.hi'),</span>
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
                <td style="padding-bottom: 20px; width:100%;">
                    <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0">
                        <tr>
                            <td style="padding: 0 15px; width:100%;">
                                <p style="font-size: 16px; margin: 0px; font-weight: 400; color: #333;">
                                    {{-- Here's your verification code to reset your password: --}}
                                    @lang('labels.email.verification_code')
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px; width:100%;">
                    <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0" style="width: 100%;">
                        <tr>
                            <td style="padding: 0 15px;width:100%;">
                                <div style="text-align: center;" class="me-email-copy">
                                    <p style="display: inline-block;font-weight: bold;color: #2FA9B5;font-size: 28px;margin-top: 0;margin-bottom: 0;margin-right: 10px;">
                                    {{$data['code']}}</p>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px; width:100%;">
                    <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0">
                        <tr>
                            <td style="padding: 0 15px; width:100%;">
                                <p class="" style="font-size: 16px;font-weight: normal;color: #333;padding-top: 0;
                                padding-bottom: 0;margin-top: 0;margin-bottom: 0;">
                                @lang('labels.email.ignore_email')
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding-bottom: 20px;padding-top: 20px; width:100%;">
                    <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0" style="border-radius: 12px;">
                        <tr>
                            <td style="padding: 0 15px; width:100%;">
                                <p class="" style="margin-top: 8px;font-size: 16px;margin-bottom: 18px;
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
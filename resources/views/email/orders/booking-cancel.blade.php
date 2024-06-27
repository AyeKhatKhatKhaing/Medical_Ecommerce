
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
                    <tr>
                        <td style="padding: 0 15px; text-align: center">
                          <img width="100" height="100" src="{{asset('frontend/img/cancel-icon.png')}}"
                            alt="complete-checked" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                          <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0"
                            style="width: 100%">
                            <tr>
                              <td style="
                                    padding: 0 15px;
                                    padding-top: 5px;
                                    text-align: center;
                                    padding-bottom: 36px;
                                  ">
                                <p style="font-size: 18px; color: #333">
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
                    {{-- <tr>
                        <td>
                          <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0">
                            <tr>
                              <td style="padding: 0 15px">
                                <p class="custom-text" style="
                                      font-size: 16px;
                                      margin: 0px 0px 20px 0px;
                                      font-weight: 400;
                                      color: #333;
                                    ">
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
                                            @if($data['default_lang']=='en')
                                            Your order <b>(Order Number #{{$data["invoice_no"]}})</b> has been cancelled. The amount will be refunded to your credit card or the related payment account. The refund process can be completed within 14 business days.
                                            @elseif($data['default_lang']=='zh-hk')
                                            您的訂單 <b>(訂單編號 #{{$data["invoice_no"]}})</b> 已取消。我們會將金額退還到您用作支付的信用卡或相關付款帳戶，一般退款流程可於14個工作天內完成。          
                                            @else
                                            您的订单 <b>(订单编号 #{{$data["invoice_no"]}})</b> 已取消。我们会将金额退还到您用作支付的信用卡或相关付款帐户，一般退款流程可于14个工作天内完成。        
                                            @endif
                                            {{-- Your booking for <a href="/" style="font-size: 16px; margin: 0px; font-weight: 400; color: #333;"><b>Mobile Medical</b></a> is confirmed.</br></br> --}}
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
                                        <a href="{{$bookingUrl}}" style="line-height:1;font-size: 16px;font-weight: bold;color: #333;display: inline-block;
                                        border-radius: 50px;
                                        border: 1px solid #333;
                                        background: #fff;
                                        padding: 10px 20px;
                                        display: inline-block;
                                        text-decoration: none;">
                                                 @if($data['default_lang']=='en')
                                                 View Order
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
                        <td style="padding-bottom: 20px">
                          <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0">
                            <tr>
                              <td style="padding: 0 15px">
                                <p class="me-email-description" style="
                                      font-size: 16px;
                                      font-weight: normal;
                                      color: #333;
                                      padding-top: 0;
                                      padding-bottom: 0;
                                      margin-top: 0;
                                      margin-bottom: 0;
                                    ">
                                   @php 
                                        $contactUrl = env("APP_URL")."/".$data['default_lang']."/contact-us";
                                   @endphp
                                   @if($data['default_lang']=='en')
                                   If you have any questions regarding your order, please contact our <a style="
                                   font-size: 16px;
                                   font-weight: normal;
                                   text-decoration:underline;
                                   color: #333;" href="{{$contactUrl}}"> 
                                   Customer Service</a>.
                                   @elseif($data['default_lang'] == 'zh-hk')
                                   如果您對訂單有任何疑問，請聯絡我們的<a style="
                                   font-size: 16px;
                                   font-weight: normal;
                                   text-decoration:underline;
                                   color: #333;" href="{{$contactUrl}}">客戶服務</a>。
                                   @else
                                   如果您对订单有任何疑问，请联络我们的<a style="
                                   font-size: 16px;
                                   font-weight: normal;
                                   text-decoration:underline;
                                   color: #333;" href="{{$contactUrl}}">客户服务</a>。
                                   @endif
                                </p>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                      <tr>
                        <td style="padding-bottom:20px; padding-top:20px;">
                          <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0" style="border-radius: 12px;">
                            <tr>
                              <td style="padding: 0 15px">
                                <p class="me-email-cheer-text" style="
                                      margin-top: 8px;
                                      font-size: 16px;
                                      font-weight: normal;
                                      color: #333;
                                      margin-bottom:18px;
                                    ">
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
                    {{-- 
                    <tr>
                        <td style="padding-bottom: 20px;">
                            <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0">
                                <tr>
                                    <td style="padding:0 15px;padding-top: 18px;">
                                        <p class="custom-text" style="font-size: 20px;color: #363848;">
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
                        <td style="padding-bottom: 20px;padding-top: 20px">
                            <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0">
                                <tr>
                                    <td style="padding:0 15px;padding-right:0;width: 140px;">
                                        <p class="custom-text"
                                            style="font-size: 16px; font-weight: 400; color: #363848;margin: 0;">
                                            @if($data['default_lang']=='en')
                                            Refund Status:
                                            @elseif($data['default_lang']=='zh-hk')
                                            退款狀態：
                                            @else
                                            退款状态:
                                            @endif
                                        </p>
                                    </td>
                                    <td style="padding:0 15px;padding-left: 0;">
                                        <p class="custom-text"
                                            style="font-size: 16px; font-weight: 400; color: #363848;margin: 0;">
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
                                    <td style="padding:0 15px;padding-right:0;">
                                        <p class="custom-text"
                                            style="font-size: 16px; font-weight: 400; color: #363848;margin: 0;">
                                            @if($data['default_lang']=='en')
                                            Refund Method:
                                            @elseif($data['default_lang']=='zh-hk')
                                            退款方式：
                                            @else
                                            退款方式：
                                            @endif
                                        </p>
                                    </td>
                                    <td style="padding:0 15px;padding-left:0;">
                                        <p class="custom-text"
                                            style="font-size: 16px; font-weight: 400; color: #363848;margin: 0;">
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
                                    <td style="padding:0 15px;padding-right:0;">
                                        <p class="custom-text"
                                            style="font-size: 16px; font-weight: 400; color: #363848;margin: 0;">
                                            @if($data['default_lang']=='en')
                                            Refund Amount:
                                            @elseif($data['default_lang']=='zh-hk')
                                            退款金額：
                                            @else
                                            退款金额：
                                            @endif
                                        </p>
                                    </td>
                                    <td style="padding:0 15px;padding-left:0;">
                                        <p class="custom-text"
                                            style="font-size: 16px; font-weight: 400; color: #363848;margin: 0;">
                                            <b>{{$data['orderItem']->total}}</b>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:0 15px;padding-right:0;">
                                        <p class="custom-text"
                                            style="font-size: 16px; font-weight: 400; color: #363848;margin: 0;">
                                            @if($data['default_lang']=='en')
                                            Refund Total:
                                            @elseif($data['default_lang']=='zh-hk')
                                            退款總額：
                                            @else
                                            退款总额:
                                            @endif
                                        </p>
                                    </td>
                                    <td style="padding:0 15px;padding-left:0;">
                                        <p class="custom-text"
                                            style="font-size: 16px; font-weight: 400; color: #363848;margin: 0;">
                                            <b>{{$data['orderItem']->total}}</b>
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
                    <tr>
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
                    </tr> 
                    <tr>
                        <td style="padding-bottom: 20px;padding-top: 28px;">
                            <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0">
                                <tr>
                                    <td style="padding:0 15px;">
                                        <p class="me-email-cheer-text" style="margin-top: 8px;font-size: 1rem;
                                    font-weight: normal;
                                    color: #333;"> @if($data['default_lang']=='en')
                                        <b>mediQ Team</b>
                                        @elseif($data['default_lang']=='zh-hk')
                                        <b>mediQ團隊</b>
                                        @else
                                        <b>mediQ团队</b>
                                        @endif</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>--}}
                </table>
            </div>
            <div style="padding: 26px 15px;background: #2fa9b5;">
                <table bgcolor="white" align="center" valign="middle" border="0" style="
                      background-color: white !important;
                      position: relative;
                      border-radius: 12px;
                      padding-top: 10px;
                      width: 100%;
                    ">
                  <tbody>
                    <!--
                    <tr>
                      <td style="padding-bottom: 20px">
                        <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0">
                          <tbody>
                            <tr>
                              <td style="padding: 0 15px; padding-top: 18px">
                                <p class="custom-text" style="
                                      font-size: 16px;
                                      color: #363848;
                                      margin-top: 0;
                                      margin-bottom: 0;
                                    ">
                                    @if($data['default_lang']=='en')
                                    <b>Booking Reference ID:</b>{{$data["invoice_no"]}}
                                    @elseif($data['default_lang']=='zh-hk')
                                    <b>預約參考編號:</b>{{$data["invoice_no"]}}
                                    @else
                                    <b>预约参考编号:</b>{{$data["invoice_no"]}}
                                    @endif
                                </p>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    -->
                    <tr>
                      <td style="padding-bottom: 20px">
                        <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0">
                          <tbody>
                            <tr>
                              <td style="padding: 0 15px; padding-top: 18px">
                                <p class="custom-text" style="
                                      font-size: 16px;
                                      color: #363848;
                                      margin-top: 0;
                                      margin-bottom: 0;
                                    ">
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
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td style="padding-bottom: 36px">
                        <table class="no-padding-table" bgcolor="white" align="left" valign="middle" border="0"
                          style="width: 100%">
                          <tbody>
                            <tr>
                              <td style="padding: 0 15px;width: 140px;padding-right: 0;" class="order-title">
                                <p class="custom-text" style="
                                    font-size: 16px;
                                    font-weight: 400;
                                    color: #363848;
                                    margin-top: 0;
                                    margin-bottom: 0;
                                  ">
                                     @if($data['default_lang']=='en')
                                     Refund Status:
                                     @elseif($data['default_lang']=='zh-hk')
                                     退款狀態：
                                     @else
                                     退款状态:
                                     @endif
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
                              <td style="padding: 0 15px;padding-right: 0;" class="order-title">
                                <p class="custom-text" style="
                                    font-size: 16px;
                                    margin: 0px;
                                    font-weight: 400;
                                    color: #363848;
                                  ">
                                     @if($data['default_lang']=='en')
                                     Refund Method:
                                     @elseif($data['default_lang']=='zh-hk')
                                     退款方式：
                                     @else
                                     退款方式：
                                     @endif
                                </p>
                              </td>
                              <td style="padding: 0 15px;padding-left: 0;">
                                <p class="custom-text" style="
                                    font-size: 16px;
                                    margin: 0px;
                                    font-weight: 400;
                                    color: #363848;
                                  ">
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
                              <td style="padding: 0 15px;padding-right: 0;" class="order-title">
                                <p class="custom-text" style="
                                    font-size: 16px;
                                    margin: 0px;
                                    font-weight: 400;
                                    color: #363848;
                                  ">
                                   @if($data['default_lang']=='en')
                                   Refund Amount:
                                   @elseif($data['default_lang']=='zh-hk')
                                   退款金額：
                                   @else
                                   退款金额：
                                   @endif
                                </p>
                              </td>
                              <td style="padding: 0 15px;padding-left: 0;">
                                <p class="custom-text" style="
                                    font-size: 16px;
                                    margin: 0px;
                                    font-weight: 400;
                                    color: #363848;
                                  ">
                                 <b>HK${{$data['orderItem']->total}}</b>
                                </p>
                              </td>
                            </tr>
        
                            <tr>
                              <td style="padding: 0 15px;padding-right: 0;" class="order-title">
                                <p class="custom-text" style="
                                    font-size: 16px;
                                    margin: 0px;
                                    font-weight: 400;
                                    color: #363848;
                                  ">
                                    @if($data['default_lang']=='en')
                                    Refund Total:
                                    @elseif($data['default_lang']=='zh-hk')
                                    退款總額：
                                    @else
                                    退款总额:
                                    @endif
                                </p>
                              </td>
                              <td style="padding: 0 15px;padding-left: 0">
                                <p class="custom-text" style="
                                    font-size: 16px;
                                    margin: 0px;
                                    font-weight: 400;
                                    color: #363848;
                                  ">
                                   <b>HK${{$data['orderItem']->total}}</b>
                                </p>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
        </div>
        @include('email.footer',['defaultLang'=>$data['default_lang']])
    </div>
</body>

</html>
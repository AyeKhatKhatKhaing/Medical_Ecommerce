<!DOCTYPE html>
<html lang="zh">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>mediQ</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ public_path('fronend/img/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ public_path('fronend/img/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ public_path('fronend/img/favicon-16x16.png') }}">
    <link rel="shortcut icon" href="{{ public_path('fronend/img/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ public_path('fronend/img/favicon.ico') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {{-- <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet"> --}}
    {{-- <link
        href="https://fonts.googleapis.com/css2?family=Ma+Shan+Zheng&display=swap"
        rel="stylesheet"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+SC:wght@400;700&display=swap" rel="stylesheet">

</head>

<body style="height: 100vh;overflow: hidden;">
    <style>
        /* @font-face {
            font-family: "Helvetica-Normal";
            src: local("Helvetica-Normal"), url("font/Helvetica-neue/Helvetica-Normal.ttf") format("TrueType");
        } */

        /* @font-face {
            font-family: "Helvetica-Regular";
            src: local("Helvetica Regular"), url("font/Noto_Sans_SC/static/NotoSansSC-Regular.ttf") format("woff");
        } */

        @font-face {
            font-family: "Noto Sans SC Blod";
            src: local("Noto Sans SC Blod"), url("font/Noto_Sans_SC/static/NotoSansSC-Bold.ttf") format("TrueType");
        }

        body {
            margin: 0;
            padding: 0;
            font-family: "Noto Sans SC", Roboto, sans-serif;
        }

        /* b {
            font-family: "Noto Sans SC Blod", Roboto, sans-serif;
        } */

        .page-break {
            /* page-break-after: always; */
        }

        /* b {
            font-family: "Noto Sans SC","Ma Shan Zheng","Helvetica-Bold", Roboto, sans-serif !important;
        } */
        /* body {
            font-family: "Helvetica-Regular", Roboto, sans-serif;
        } */
        #custom-font{
            font-family: "Noto Sans SC";
        }
    </style>
    <div style="max-width: 100%;margin: 0 auto;height: 100%;overflow: hidden;background-color:white;">
        <div style="height: 100%;">
            <table style="width: 100%;height:99.8%;">
                <tr>
                    <td style="padding-bottom: 249px;vertical-align: top;">
                        <table
                            style="width: 100%;background: url('{{ public_path('frontend/img/Frame-bg-color.png') }}'); background-repeat: no-repeat;
                        background-position: 20% 80%; border-collapse: collapse;">
                            <tr>
                                <td style="width: 60%;vertical-align: top;">
                                    <div>
                                        <img src="{{ public_path('frontend/img/receipt-logo.png') }}"
                                            alt="receipt-logo" />
                                        <p
                                            style="font-family:Noto Sans SC;font-size: 10px;font-weight: 700;color: #333333;margin-top: 0;margin-bottom: 0;padding-top: 30px;text-transform: uppercase;">
                                            <b id="custom-font">{{ $data['customerInfo']['billing_customer_name'] }}</b>
                                        </p>
                                        <p
                                            style="font-size: 10px;font-weight: 700;color: #333333;margin-top: 0;margin-bottom: 0;padding-top: 10px;max-width: 217px;text-transform: uppercase;">
                                            <b id="custom-font">{!! $data['customerInfo']['billing_customer_address'] !!}</b>
                                        </p>
                                    </div>
                                </td>
                                <td style="width: 40%;">
                                    <div>
                                        <h1
                                            style="font-size: 19px;font-weight: 700;color: #333333;border: 2px solid #333333;display: inline-block;padding: 5px 10px;margin-top: 0;">
                                            RECEIPT 訂單收據</h1>
                                        <table style="width: 100%;margin-top: 20px;">
                                            <tr>
                                                <td
                                                    style="font-size: 10px;font-weight: 400;color: #66666A;margin-top: 0;margin-bottom: 0;white-space: nowrap;">
                                                    Order No. 訂單編號</td>
                                                <td
                                                    style="font-size: 10px;font-weight: 400;color: #333333;margin-top: 0;margin-bottom: 0;">
                                                    <b>{{ $data['customerInfo']['order_no'] }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px;font-weight: 400;color: #66666A;margin-top: 0;margin-bottom: 0;white-space: nowrap;">
                                                    Order Date 訂單日期</td>
                                                <td
                                                    style="font-size: 10px;font-weight: 400;color: #333333;margin-top: 0;margin-bottom: 0;">
                                                    <b>{{ date('d/m/Y', strtotime($data['customerInfo']['order_date'])) }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px;font-weight: 400;color: #66666A;margin-top: 0;margin-bottom: 0;white-space: nowrap;">
                                                    Total Amount 總金額</td>
                                                <td
                                                    style="font-size: 10px;font-weight: 400;color: #333333;margin-top: 0;margin-bottom: 0;">
                                                    <b>HK${{ number_format($data['customerInfo']['total_amount'], 2, '.', ',') }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px;font-weight: 400;color: #66666A;margin-top: 0;margin-bottom: 0;white-space: nowrap;">
                                                    Customer Name 顧客姓名</td>
                                                <td
                                                    style="font-size: 10px;font-weight: 400;color: #333333;margin-top: 0;margin-bottom: 0;">
                                                    <b>{{ strtoupper($data['customerInfo']['name']) }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 10px;font-weight: 400;color: #66666A;margin-top: 0;margin-bottom: 0;white-space: nowrap;">
                                                    Member ID 會員編號</td>
                                                <td
                                                    style="font-size: 10px;font-weight: 400;color: #333333;margin-top: 0;margin-bottom: 0;">
                                                    <b>Q8{{ str_pad($data['customerInfo']['customer_id'], 7, '0', STR_PAD_LEFT) }}</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 12px;font-weight: 700;color: #2FA9B5;margin-top: 0;margin-bottom: 0;padding-top: 16px;">
                                                    PAID 已付款</td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p
                                        style="height: 1px;width: 45px;background-color: #E4E4E4;margin-top: 16px;margin-bottom: 30px;">
                                    </p>
                                </td>
                                <td>
                                    <p
                                        style="height: 1px;width: 45px;background-color: #E4E4E4;margin-top: 16px;margin-bottom: 30px;">
                                    </p>
                                </td>
                            </tr>
                        </table>
                        <table style="width: 100%;border-collapse: collapse;">
                            <tr>
                                <th
                                    style="font-size: 10px;font-weight: 700;color: #333333;border-top: 0.5px solid #8F959A;border-bottom:0.5px solid #8F959A; text-align: left;padding:8px 10px">
                                    Item 項目</th>
                                <th
                                    style="font-size: 10px;font-weight: 700;color: #333333;text-align:center;border-top: 0.5px solid #8F959A;border-bottom:0.5px solid #8F959A;padding:8px 10px">
                                    Unit 數量</th>
                                <th
                                    style="font-size: 10px;font-weight: 700;color: #333333;text-align:center;border-top: 0.5px solid #8F959A;border-bottom:0.5px solid #8F959A;padding:8px 10px">
                                    Unit Price 單價</th>
                                <th
                                    style="font-size: 10px;font-weight: 700;color: #333333;text-align: right;border-top: 0.5px solid #8F959A;border-bottom:0.5px solid #8F959A;padding:8px 10px">
                                    Amount 金額 (HKD)</th>
                            </tr>
                            @php
                                $recipientsList = App\Models\Recipient::whereIn('id', $data['customerInfo']['recipientIds'])->get();
                            @endphp
                            @foreach ($recipientsList as $rdata)
                                <tr>
                                    <td
                                        style="padding:10px 10px 0 10px;font-size: 9px;font-weight: 700;color: #333333;">
                                        <b>{{ $rdata->product->name_en }}</b>
                                    </td>
                                    <td
                                        style="padding:10px 10px 0 10px;font-size: 9px;font-weight: 400;color: #333333;text-align:center;">
                                        1</td>
                                    <td
                                        style="padding:10px 10px 0 10px;font-size: 9px;font-weight: 400;color: #66666A;text-align:right;">
                                        ${{ number_format($rdata->each_recipient_amount, 2, '.', ',') }}</td>
                                    <td
                                        style="padding:10px 10px 0 10px;font-size: 9px;font-weight: 700;color: #333333;text-align: right;">
                                        <b>${{ number_format($rdata->each_recipient_amount, 2, '.', ',') }}</b>
                                    </td>
                                </tr>
                                @if ($rdata->variable_id != NULL)
                                @php $vairableProductName = \App\Models\ProductVariation::find($rdata->variable_id); @endphp
                        
                                    <tr>
                                        <td
                                            style="padding:6px 10px 0 20px;font-size: 9px;font-weight: 700;color: #333333;">
                                            <b>-
                                                {{ $vairableProductName->name_en }}</b>
                                        </td>
                                        <td
                                            style="padding:6px 10px 0 10px;font-size: 9px;font-weight: 400;color: #333333;text-align:center;">
                                            </td>
                                        <td
                                            style="padding:6px 10px 0 10px;font-size: 9px;font-weight: 400;color: #66666A;text-align:right;">
                                            {{-- ${{ $vairableProductName->discount_price != null ? number_format($vairableProductName->discount_price, 2, '.', ',') : number_format($vairableProductName->original_price, 2, '.', ',') }} --}}
                                        </td>
                                        <td
                                            style="padding:6px 10px 0 10px;font-size: 9px;font-weight: 700;color: #333333;text-align: right;">
                                            {{-- <b>${{ $vairableProductName->discount_price != null ? number_format($vairableProductName->discount_price, 2, '.', ',') : number_format($vairableProductName->original_price, 2, '.', ',') }}</b> --}}
                                        </td>
                                    </tr>
                                @endif
                                @if (count($rdata->recipient_add_on_items) > 0)
                                    @foreach ($rdata->recipient_add_on_items as $radata)
                                        @php
                                            $product = App\Models\Product::where('id', $radata->product_id)->first();
                                            $addOnItem = App\Models\AddOnItem::where('id', $radata->add_on_item_id)->first();

                                        @endphp
                                        <tr>
                                            <td
                                                style="padding:6px 10px 0 20px;font-size: 9px;font-weight: 700;color: #333333;">
                                                <b>-
                                                    {{ $addOnItem->name_en }}</b>
                                            </td>
                                            <td
                                                style="padding:6px 10px 0 10px;font-size: 9px;font-weight: 400;color: #333333;text-align:center;">
                                                1</td>
                                            <td
                                                style="padding:6px 10px 0 10px;font-size: 9px;font-weight: 400;color: #66666A;text-align:right;">
                                                ${{ $addOnItem->discount_price != null ? number_format($addOnItem->discount_price, 2, '.', ',') : number_format($addOnItem->original_price, 2, '.', ',') }}
                                            </td>
                                            <td
                                                style="padding:6px 10px 0 10px;font-size: 9px;font-weight: 700;color: #333333;text-align: right;">
                                                <b>${{ $addOnItem->discount_price != null ? number_format($addOnItem->discount_price, 2, '.', ',') : number_format($addOnItem->original_price, 2, '.', ',') }}</b>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            @endforeach

                            <tr>
                                <td colspan="3"
                                    style="padding:10px 10px 0 10px;font-size: 9px;font-weight: 400;color: #66666A;text-align:right;">
                                    Subtotal 小計</td>
                                <td
                                    style="padding:10px 10px 0 10px;font-size: 9px;font-weight: 700;color: #66666A;text-align: right;">
                                    ${{ number_format($data['customerInfo']['sub_total'], 2, '.', ',') }}</td>
                            </tr>
                            @if($data['customerInfo']['coupon_type']=='coupon')
                            <tr>
                                <td colspan="3"
                                    style="padding:6px 10px 0 10px;font-size: 9px;font-weight: 400;color: #66666A;text-align:right;">
                                    Coupon 優惠券</td>
                                <td
                                    style="padding:6px 10px 0 10px;font-size: 9px;font-weight: 700;color: #66666A;text-align: right;">
                                    @if ($data['customerInfo']['coupon_discount_type'] == 'percent')
                                        ({{ $data['customerInfo']['coupon_price'] }}%)
                                    @else
                                        (${{ number_format($data['customerInfo']['coupon_price'], 2, '.', ',') }})
                                    @endif
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td colspan="3"
                                    style="padding:6px 10px 0 10px;font-size: 9px;font-weight: 400;color: #66666A;text-align:right;">
                                    Promo Code 推廣碼</td>
                                <td
                                    style="padding:6px 10px 0 10px;font-size: 9px;font-weight: 700;color: #66666A;text-align: right;">
                                    @if ($data['customerInfo']['coupon_discount_type'] == 'percent')
                                        ({{ $data['customerInfo']['coupon_price'] }}%)
                                    @else
                                        (${{ number_format($data['customerInfo']['coupon_price'], 2, '.', ',') }})
                                    @endif
                                </td>
                            </tr>
                            @endif
                            <tr>
                                <td></td>
                                <td></td>
                                <td
                                    style="padding:6px 10px 10px 10px;font-size: 10px;font-weight: 700;color: #333333;text-align:right;border-bottom: 0.5px solid #8F959A;">
                                    Total Amount 總金額</td>
                                <td
                                    style="padding:6px 10px 10px 10px;font-size: 10px;font-weight: 700;color: #333333;text-align:right;border-bottom: 0.5px solid #8F959A;">
                                    <b>${{ number_format($data['customerInfo']['total_amount'], 2, '.', ',') }}</b>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td
                                    style="padding:10px 10px 10px 10px;font-size: 10px;font-weight: 700;color: #333333;text-align:right;border-bottom: 0.5px solid #8F959A;">
                                    Amount Paid 已付金額</td>
                                <td
                                    style="padding:10px 10px 10px 10px;font-size: 10px;font-weight: 700;color: #333333;text-align:right;border-bottom: 0.5px solid #8F959A;">
                                    <b>${{ number_format($data['customerInfo']['total_amount'], 2, '.', ',') }}</b>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3"
                                    style="padding:10px 10px 0px 5px;font-size: 9px;font-weight: 400;color: #66666A;text-align:right;">
                                    From 付款經由</td>
                                <td
                                    style="padding:10px 10px 0px 5px;font-size: 9px;font-weight: 400;color: #66666A;text-align:right;">
                                    @if($data['order']['payment_status']==1)
                                        @if($data['order']['card_name']!=null)
                                            {{$data['order']['card_name']}}
                                        @else
                                            @if($data['order']['payment_type']=='a_pay')
                                            Apple Pay
                                            @endif
                                        @endif
                                    @elseif($data['order']['payment_status']==5)
                                        {{$data['order']['payment_method']}}
                                    @else
                                        'Offline'
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3"
                                    style="padding:6px 10px;font-size: 9px;font-weight: 400;color: #66666A;text-align:right;">
                                    Payment Date 付款日期</td>
                                <td
                                    style="padding:6px 10px;font-size: 9px;font-weight: 400;color: #66666A;text-align:right;">
                                    {{ date('d/m/Y', strtotime($data['customerInfo']['order_date'])) }}</td>
                            </tr>
                            <tr>
                                <td colspan="4"
                                    style="text-align: center;font-weight:bold;font-size: 9px;padding: 30px 0;">
                                    This receipt is automatically generated 本收據由系統自動產生的
                                </td>
                            </tr>
                        </table>
                        {{-- <table
                            style="width: 100%;background-image: url('{{ public_path('frontend/img/ereceipt02.png') }}'); background-repeat: no-repeat;
                            background-position: 100% 80%; border-collapse: collapse;">
                            <tr>
                                <td colspan="3"
                                    style="font-size: 9px;font-weight: normal;color: #66666A;padding-bottom: 20px;">
                                    MediQ Health Service (Asia) Limited
                                    瑞安醫療網絡(亞洲)有限公司 </td>
                            </tr>
                            <tr>
                                <td style="font-size: 9px;font-weight: normal;color: #2FA9B5;">Kwun Tong Office</td>
                                <td style="font-size: 9px;font-weight: normal;color: #2FA9B5;">Central Office</td>
                                <td style="font-size: 9px;font-weight: normal;color: #66666A;">T: (852) 2111 2201</td>
                            </tr>
                            <tr>
                                <td style="width: 170px;">
                                    <p
                                        style="text-align:left;font-size: 9px;font-weight: normal;color: #66666A;width: 99px;vertical-align: top;margin-top: 0;margin-bottom: 0;">
                                        Unit 02, 16/F, Gravity,<br />
                                        29 Hing Yip Street,<br />
                                        Kwun Tong, Hong Kong</p>
                                </td>
                                <td style="width: 190px;">
                                    <p
                                        style="text-align:left;font-size: 9px;font-weight: normal;color: #66666A;width:145px;vertical-align: top;margin-top: 0;margin-bottom: 0;">
                                        Unit 02, 23/F, New World Tower 1,<br />
                                        18 Queen's Road Central,<br />
                                        Central,Hong Kong</p>
                                </td>
                                <td
                                    style="font-size: 9px;font-weight: normal;color: #66666A;width: 170px;vertical-align: top;margin-top: 0;margin-bottom: 0;">
                                    E: cs@mediq.com.hk</td>
                            </tr>
                        </table> --}}
                    </td>
                   
                </tr>
                <tr>
                    <td style="vertical-align: bottom;padding-bottom:0px;margin-bottom:0px;">
                        <table style="width: 100%;background-image: url('{{ public_path('frontend/img/Frame-1-bg-color.png') }}'); background-repeat: no-repeat;
                        background-position: 100% 80%; border-collapse: collapse;">
                            <tr>
                                <td colspan="3"
                                    style="font-size: 9px;font-weight: normal;color: #66666A;padding-bottom: 20px;">
                                    MediQ Health Service (Asia) Limited
                                    瑞安醫療網絡(亞洲)有限公司 </td>
                            </tr>
                            <tr>
                                <td style="font-size: 9px;font-weight: normal;color: #2FA9B5;">Kwun Tong Office</td>
                                <td style="font-size: 9px;font-weight: normal;color: #2FA9B5;">Central Office</td>
                                <td style="font-size: 9px;font-weight: normal;color: #66666A;">T: (852) 2111 2201</td>
                            </tr>
                            <tr>
                                <td style="width: 180px;">
                                    <p
                                        style="font-size: 9px;font-weight: normal;color: #66666A;width: 135px;vertical-align: top;margin-top: 0;margin-bottom: 0;">
                                        Unit 02, 16/F, Gravity,<br/>
                                        29 Hing Yip Street,<br/>
                                        Kwun Tong, Hong Kong</p>
                                </td>
                                <td
                                    style="font-size: 9px;font-weight: normal;color: #66666A;width: 180px;vertical-align: top;">
                                    <p
                                        style="font-size: 9px;font-weight: normal;color: #66666A;width: 135px;margin-top: 0;margin-bottom: 0;">
                                        Unit 02, 23/F, New World Tower 1,
                                        18 Queen's Road Central,
                                        Central, Hong Kong</p>
                                </td>
                                <td
                                    style="font-size: 9px;font-weight: normal;color: #66666A;width: 180px;vertical-align: top;margin-top: 0;margin-bottom: 0;">
                                    E: cs@mediq.com.hk</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    {{-- <div style="max-width: 100%;margin: 0 auto;padding: 76px;height: 100%;overflow: hidden;background-color: #FBFEFF;">
        <div style="height: 100%;">
            
            <table
                style="width: 100%;background-image: url('{{ public_path('frontend/img/Frame-34-jpg.jpg') }}'); background-repeat: no-repeat;
                background-position: 20% 80%; border-collapse: collapse;">
                <tr>
                    <td style="width: 60%;">
                        <div>
                            <img src='{{ public_path('frontend/img/receipt-logo.png') }}' alt="receipt-logo" />
                            <p
                                style="font-size: 10px;font-weight: 700;color: #333333;margin-top: 0;margin-bottom: 0;padding-top: 30px;">
                                <b>{{ $data['customerInfo']['billing_customer_name'] }}</b>
                            </p>
                            <p
                                style="font-size: 10px;font-weight: 700;color: #333333;margin-top: 0;margin-bottom: 0;padding-top: 10px;max-width: 217px;">
                                <b>{!! $data['customerInfo']['billing_customer_address'] !!}</b>
                            </p>
                        </div>
                    </td>
                    <td style="width: 40%;">
                        <div>
                            <h1
                                style="font-size: 19px;font-weight: 700;color: #333333;border: 2px solid #333333;display: inline-block;padding: 5px 10px;">
                                RECEIPT 訂單收據</h1>
                            <table style="width: 100%;margin-top: 20px;">
                                <tr>
                                    <td
                                        style="font-size: 10px;font-weight: 400;color: #66666A;margin-top: 0;margin-bottom: 0;white-space: nowrap;">
                                        Order No. 訂單編號</td>
                                    <td
                                        style="font-size: 10px;font-weight: 400;color: #333333;margin-top: 0;margin-bottom: 0;">
                                        <b>{{ $data['customerInfo']['order_no'] }}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="font-size: 10px;font-weight: 400;color: #66666A;margin-top: 0;margin-bottom: 0;white-space: nowrap;">
                                        Order Date 訂單日期</td>總⾦額
                                    <td
                                        style="font-size: 10px;font-weight: 400;color: #333333;margin-top: 0;margin-bottom: 0;">
                                        <b>{{ date('d/m/Y', strtotime($data['customerInfo']['order_date'])) }}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="font-size: 10px;font-weight: 400;color: #66666A;margin-top: 0;margin-bottom: 0;white-space: nowrap;">
                                        Total Amount 總金額</td>
                                    <td
                                        style="font-size: 10px;font-weight: 400;color: #333333;margin-top: 0;margin-bottom: 0;">
                                        <b>HK${{ number_format($data['customerInfo']['total_amount'], 2, '.', ',') }}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="font-size: 10px;font-weight: 400;color: #66666A;margin-top: 0;margin-bottom: 0;white-space: nowrap;">
                                        Customer Name 顧客姓名</td>
                                    <td
                                        style="font-size: 10px;font-weight: 400;color: #333333;margin-top: 0;margin-bottom: 0;">
                                        <b>{{ strtoupper($data['customerInfo']['name']) }}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="font-size: 10px;font-weight: 400;color: #66666A;margin-top: 0;margin-bottom: 0;white-space: nowrap;">
                                        Member ID 會員編號</td>
                                    <td
                                        style="font-size: 10px;font-weight: 400;color: #333333;margin-top: 0;margin-bottom: 0;">
                                        <b>Q8{{ str_pad($data['customerInfo']['customer_id'], 7, '0', STR_PAD_LEFT) }}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td
                                        style="font-size: 12px;font-weight: 700;color: #2FA9B5;margin-top: 0;margin-bottom: 0;padding-top: 16px;">
                                        PAID 已付款</td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p
                            style="height: 2px;width: 45px;background-color: #E4E4E4;margin-top: 16px;margin-bottom: 30px;">
                        </p>
                    </td>
                    <td>
                        <p
                            style="height: 2px;width: 45px;background-color: #E4E4E4;margin-top: 16px;margin-bottom: 30px;">
                        </p>
                    </td>
                </tr>
            </table>
            <table style="width: 100%;border-collapse: collapse;">
                <tr>
                    <th
                        style="font-size: 10px;font-weight: 700;color: #333333;border-top: 0.5px solid #8F959A;border-bottom:0.5px solid #8F959A; text-align: left;padding:8px 10px">
                        Item 項目</th>
                    <th
                        style="font-size: 10px;font-weight: 700;color: #333333;text-align:center;border-top: 0.5px solid #8F959A;border-bottom:0.5px solid #8F959A;padding:8px 10px">
                        Unit 數量</th>
                    <th
                        style="font-size: 10px;font-weight: 700;color: #333333;text-align:center;border-top: 0.5px solid #8F959A;border-bottom:0.5px solid #8F959A;padding:8px 10px">
                        Unit Price 單價</th>
                    <th
                        style="font-size: 10px;font-weight: 700;color: #333333;text-align: right;border-top: 0.5px solid #8F959A;border-bottom:0.5px solid #8F959A;padding:8px 10px">
                        Amount 金額 (HKD)</th>
                </tr>
                @php
                    $recipientsList = App\Models\Recipient::whereIn('id', $data['customerInfo']['recipientIds'])->get();
                @endphp
                @foreach ($recipientsList as $rdata)
                    <tr>
                        <td style="padding:10px 10px 0 10px;font-size: 9px;font-weight: 700;color: #333333;"><b>
                                {{ $rdata->product->name_en }}</b></td>
                        <td
                            style="padding:10px 10px 0 10px;font-size: 9px;font-weight: 400;color: #333333;text-align:center;">
                            1</td>
                        <td
                            style="padding:10px 10px 0 10px;font-size: 9px;font-weight: 400;color: #66666A;text-align:right;">
                            ${{ number_format($rdata->each_recipient_amount, 2, '.', ',') }}</td>
                        <td
                            style="padding:10px 10px 0 10px;font-size: 9px;font-weight: 700;color: #333333;text-align: right;">
                            <b>${{ number_format($rdata->each_recipient_amount, 2, '.', ',') }}</b>
                        </td>
                    </tr>
                    @if (count($rdata->recipient_add_on_items) > 0)
                        @foreach ($rdata->recipient_add_on_items as $radata)
                            @php
                                $product = App\Models\Product::where('id', $radata->product_id)->first();
                                $addOnItem = App\Models\AddOnItem::where('id', $radata->add_on_item_id)->first();

                            @endphp
                            <tr>
                                <td style="padding:6px 10px 0 20px;font-size: 9px;font-weight: 700;color: #333333;"><b>-
                                        {{ $addOnItem->name_en }}</b>
                                </td>
                                <td
                                    style="padding:6px 10px 0 10px;font-size: 9px;font-weight: 400;color: #333333;text-align:center;">
                                    1</td>
                                <td
                                    style="padding:6px 10px 0 10px;font-size: 9px;font-weight: 400;color: #66666A;text-align:right;">
                                    ${{ $addOnItem->discount_price != null ? number_format($addOnItem->discount_price, 2, '.', ',') : number_format($addOnItem->original_price, 2, '.', ',') }}
                                </td>
                                <td
                                    style="padding:6px 10px 0 10px;font-size: 9px;font-weight: 700;color: #333333;text-align: right;">
                                    <b>${{ $addOnItem->discount_price != null ? number_format($addOnItem->discount_price, 2, '.', ',') : number_format($addOnItem->original_price, 2, '.', ',') }}</b>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                @endforeach
                <tr>
                    <td colspan="3"
                        style="padding:10px 10px 0 10px;font-size: 9px;font-weight: 400;color: #66666A;text-align:right;">
                        Subtotal 小計</td>
                    <td
                        style="padding:10px 10px 0 10px;font-size: 9px;font-weight: 700;color: #66666A;text-align: right;">
                        ${{ number_format($data['customerInfo']['sub_total'], 2, '.', ',') }}</td>
                </tr>
                <tr>
                    <td colspan="3"
                        style="padding:6px 10px 0 10px;font-size: 9px;font-weight: 400;color: #66666A;text-align:right;">
                        Coupon 優惠券</td>
                    <td
                        style="padding:6px 10px 0 10px;font-size: 9px;font-weight: 700;color: #66666A;text-align: right;">
                        @if ($data['customerInfo']['coupon_discount_type'] == 'percent')
                        ({{$data['customerInfo']['coupon_price']}}%)
                        @else
                        (${{ number_format($data['customerInfo']['coupon_price'], 2, '.', ',') }})
                        @endif
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td
                        style="padding:6px 10px 10px 10px;font-size: 10px;font-weight: 700;color: #333333;text-align:right;border-bottom: 0.5px solid #8F959A;">
                        Total Amount 總金額</td>
                    <td
                        style="padding:6px 10px 10px 10px;font-size: 10px;font-weight: 700;color: #333333;text-align:right;border-bottom: 0.5px solid #8F959A;">
                        <b>${{ number_format($data['customerInfo']['total_amount'], 2, '.', ',') }}</b>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td
                        style="padding:10px 10px 10px 10px;font-size: 10px;font-weight: 700;color: #333333;text-align:right;border-bottom: 0.5px solid #8F959A;">
                        Amount Paid 已付金額</td>
                    <td
                        style="padding:10px 10px 10px 10px;font-size: 10px;font-weight: 700;color: #333333;text-align:right;border-bottom: 0.5px solid #8F959A;">
                        <b>${{ number_format($data['customerInfo']['total_amount'], 2, '.', ',') }}</b>
                    </td>
                </tr>
                <tr>
                    <td colspan="3"
                        style="padding:10px 10px 0px 5px;font-size: 9px;font-weight: 400;color: #66666A;text-align:right;">
                        From 付款經由</td>
                    <td
                        style="padding:10px 10px 0px 5px;font-size: 9px;font-weight: 400;color: #66666A;text-align:right;">
                        {{$data['customerInfo']['card_name']}}</td>
                </tr>
                <tr>
                    <td colspan="3"
                        style="padding:6px 10px;font-size: 9px;font-weight: 400;color: #66666A;text-align:right;">
                        Payment Date 付款日期</td>
                    <td style="padding:6px 10px;font-size: 9px;font-weight: 400;color: #66666A;text-align:right;">
                        {{ date('d/m/Y', strtotime($data['customerInfo']['order_date'])) }}</td>
                </tr>
                <tr>
                    <td colspan="4"
                        style="text-align: center;font-weight:bold;font-size: 9px;color: #66666A;padding: 30px 0;">
                        This receipt is automatically generated 本收據由系統自動產生的</td>
                </tr>
            </table>

            {{-- <div
                style="background-image: url('{{ public_path('frontend/img/Frame-35-bg-color.png') }}');background-repeat: no-repeat;
            background-position: right; background-size: 100px;">
                <table style="width: 100%;margin-top: 60px;border-collapse: collapse;">
                    <tr>
                        <td style="font-size: 9px;font-weight: normal;color: #66666A;">MediQ Health Service (Asia)
                            Limited
                            瑞安醫療網絡(亞洲)有限公司 </td>
                    </tr>
                </table>
                <table style="margin-top: 20px;">
                    <tr>
                        <td style="font-size: 9px;font-weight: normal;color: #2FA9B5;">Kwun Tong Office</td>
                        <td style="font-size: 9px;font-weight: normal;color: #2FA9B5;">Central Office</td>
                        <td style="font-size: 9px;font-weight: normal;color: #66666A;">T: (852) 2111 2201</td>
                    </tr>
                    <tr>
                        <td style="width: 180px;">
                            <p
                                style="font-size: 9px;font-weight: normal;color: #66666A;width: 94px;vertical-align: top;margin-top: 0;margin-bottom: 0;">
                                Unit 02, 16/F, Gravity,
                                29 Hing Yip Street,
                                Kwun Tong, Hong Kong</p>
                        </td>
                        <td style="font-size: 9px;font-weight: normal;color: #66666A;width: 180px;vertical-align: top;">
                            <p
                                style="font-size: 9px;font-weight: normal;color: #66666A;width: 135px;margin-top: 0;margin-bottom: 0;">
                                Unit 02, 23/F, New World Tower 1,
                                18 Queen’s Road Central,
                                Central, Hong Kong</p>
                        </td>
                        <td
                            style="font-size: 9px;font-weight: normal;color: #66666A;width: 180px;vertical-align: top;margin-top: 0;margin-bottom: 0;">
                            E: cs@mediq.com.hk</td>
                    </tr>
                </table>
            </div>
            <table style="width: 100%;background-image: url('{{ public_path('frontend/img/Frame-35-jpg.jpg') }}'); background-repeat: no-repeat;
            background-position: 100% 80%; border-collapse: collapse;">
                <tr>
                    <td colspan="3" style="font-size: 9px;font-weight: normal;color: #66666A;padding-bottom: 20px;">
                        MediQ Health Service (Asia) Limited
                        瑞安醫療網絡(亞洲)有限公司 </td>
                </tr>
                <tr>
                    <td style="font-size: 9px;font-weight: normal;color: #2FA9B5;">Kwun Tong Office</td>
                    <td style="font-size: 9px;font-weight: normal;color: #2FA9B5;">Central Office</td>
                    <td style="font-size: 9px;font-weight: normal;color: #66666A;">T: (852) 2111 2201</td>
                </tr>
                <tr>
                    <td style="font-size: 9px;font-weight: normal;color: #66666A;width: 165px;vertical-align: top;">
                        <p
                            style="font-size: 9px;font-weight: normal;color: #66666A;width: 135px;vertical-align: top;margin-top: 0;margin-bottom: 0;">
                            Unit 02, 16/F, Gravity,<br/>
                            29 Hing Yip Street,<br/>
                            Kwun Tong, Hong Kong</p>
                    </td>
                    <td style="font-size: 9px;font-weight: normal;color: #66666A;width: 165px;vertical-align: top;">
                        <p
                            style="font-size: 9px;font-weight: normal;color: #66666A;width: 150px;margin-top: 0;margin-bottom: 0;">
                            Unit 02, 23/F, New World Tower 1,
                            18 Queen’s Road Central,<br/>
                            Central, Hong Kong</p>
                    </td>
                    <td
                        style="font-size: 9px;font-weight: normal;color: #66666A;width: 165px;vertical-align: top;margin-top: 0;margin-bottom: 0;">
                        E: cs@mediq.com.hk</td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div> --}}
</body>

</html>

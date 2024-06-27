@extends('frontend.checkouts.layouts.master')
@include('frontend.seo', ['seo' => isset($seo) ? $seo : ''])
@section('content')
@include('frontend.checkouts.page_url',['offlinePaymentStatus'=>isset($summaryData->offlinePayment)?$summaryData->offlinePayment:true])
@php $isOfflinePayment = isset($summaryData->offlinePayment)?$summaryData->offlinePayment:true ; @endphp
<style>
    .example.example3 {
  background-color: #525f7f;
}

.example.example3 * {
  font-family: Quicksand, Open Sans, Segoe UI, sans-serif;
  font-size: 16px;
  font-weight: 600;
}

.example.example3 .fieldset {
  margin: 0 15px 30px;
  padding: 0;
  border-style: none;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-flow: row wrap;
  flex-flow: row wrap;
  -ms-flex-pack: justify;
  justify-content: space-between;
}

.example.example3 .field {
  padding: 10px 20px 11px;
  background-color: #7488aa;
  border-radius: 20px;
  width: 100%;
}

.example.example3 .field.half-width {
  width: calc(50% - (5px / 2));
}

.example.example3 .field.third-width {
  width: calc(33% - (5px / 3));
}

.example.example3 .field + .field {
  margin-top: 6px;
}

.example.example3 .field.focus,
.example.example3 .field:focus {
  color: #424770;
  background-color: #f6f9fc;
}

.example.example3 .field.invalid {
  background-color: #fa755a;
}

.example.example3 .field.invalid.focus {
  background-color: #f6f9fc;
}

.example.example3 .field.focus::-webkit-input-placeholder,
.example.example3 .field:focus::-webkit-input-placeholder {
  color: #cfd7df;
}

.example.example3 .field.focus::-moz-placeholder,
.example.example3 .field:focus::-moz-placeholder {
  color: #cfd7df;
}

.example.example3 .field.focus:-ms-input-placeholder,
.example.example3 .field:focus:-ms-input-placeholder {
  color: #cfd7df;
}

.example.example3 input, .example.example3 button {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  outline: none;
  border-style: none;
}

.example.example3 input {
  color: #fff;
}

.example.example3 input::-webkit-input-placeholder {
  color: #9bacc8;
}

.example.example3 input::-moz-placeholder {
  color: #9bacc8;
}

.example.example3 input:-ms-input-placeholder {
  color: #9bacc8;
}

.example.example3 button {
  display: block;
  width: calc(100% - 30px);
  height: 40px;
  margin: 0 15px;
  background-color: #fcd669;
  border-radius: 20px;
  color: #525f7f;
  font-weight: 600;
  text-transform: uppercase;
  cursor: pointer;
}

.example.example3 button:active {
  background-color: #f5be58;
}

.example.example3 .error svg .base {
  fill: #fa755a;
}

.example.example3 .error svg .glyph {
  fill: #fff;
}

.example.example3 .error .message {
  color: #fff;
}

.example.example3 .success .icon .border {
  stroke: #fcd669;
}

.example.example3 .success .icon .checkmark {
  stroke: #fff;
}

.example.example3 .success .title {
  color: #fff;
}

.example.example3 .success .message {
  color: #9cabc8;
}

.example.example3 .success .reset path {
  fill: #fff;
}
</style>
<form role="form" action="{{ route('checkout.orderCheckout') }}" method="post" id="mainForm">
    @csrf
    <div component-name="me-checkout-step3-card" class="me-checkout-step3-card mt-[60px]">
        <div class="me-checkout-step3-card-container flex lg:flex-row flex-col">
            <div class="me-checkout-step3-card-left-container 2xl:mr-10 mr-4">
                <div component-name="me-checkout-billing-info" class="me-checkout-billing-info-container">
                    <div class="lg:px-10 sm:px-5 px-4 py-5 bg-whitez rounded-[12px] me-checkout-billing-info-content">
                        <h1 class="font-bold me-body-23 text-darkgray text-left">@lang('labels.check_out.billing_info')</h1>
                        <hr class="my-5 bg-mee4" />
                        <!-- <p class="text-left font-bold me-body-20 text-darkgray">@lang('labels.check_out.printed_receipt')</p> -->
                        <div class="mt-5">
                            <div class="flex">
                                <div>
                                    <label for="no-printed-receipt"
                                        class="custom-radio-container inline-block relative font-normal me-body-18 mr-[60px]">
                                        <input value="no" name="printed_receipt" id="no-printed-receipt" type="radio"
                                            class="printed-receipt opacity-0 absolute left-0 top-1/2 -translate-y-1/2"
                                            checked />
                                        <span class="custom-radio-orange"></span>
                                        <span class="ml-[30px]">@lang('labels.check_out.e_receipt')</span>
                                    </label>
                                    <label for="yes-printed-receipt"
                                        class="custom-radio-container inline-block relative font-normal me-body-18">
                                        <input value="yes" name="printed_receipt" id="yes-printed-receipt" type="radio"
                                            class="printed-receipt opacity-0 absolute left-0 top-1/2 -translate-y-1/2" />
                                        <span class="custom-radio-orange"></span>
                                        <span class="ml-[30px]">@lang('labels.check_out.mail_receipt')</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 yes-receipt-content">
                            <div component-name="me-checkout-billing-info-edit"
                                class="me-checkout-billing-info-edit-container sm:px-[30px] px-5 py-5 bg-far rounded-xl">
                                <div class="me-checkout-billing-info-edit">
                                    <div>
                                        <p class="font-normal me-body-16 text-darkgray">@lang('labels.check_out_complete.recipient_name')</p>
                                        <input  name="name" value="{{ $customer->billingInfo() != null ? $customer->billingInfo()->name : $customer->last_name.' '.$customer->first_name}}" placeholder="{{__('labels.check_out_complete.recipient_name')}}" class="name-on-receipt-input mt-1 bg-whitez border-1 border-meA3 focus:outline-none focus-within:outline-none lg:px-5 py-[0.6rem] px-3 font-normal me-body-18 text-darkgray placeholder:text-lightgray rounded-[4px] xl:min-w-[515px] lg:min-w-full sm:min-w-[513px] min-w-full" />

                                    </div>
                                    <div class="sm:mt-5 mt-3">
                                        <p class="font-normal me-body-16 text-darkgray">@lang('labels.check_out_complete.mailing_address')</p>
                                        <div class="flex flex-wrap">
                                            <input type="text" name="country" value="@lang('labels.check_out_complete.hk')" readonly placeholder="@lang('labels.check_out_complete.hk')"
                                            class="mailing-address-country-input sm:mr-3 xl:max-w-[163px] lg:max-w-[140px] sm:max-w-[163px] max-w-full sm:w-auto w-full mt-1 bg-far border-1 border-meA3 focus:outline-none focus-within:outline-none lg:px-5 py-[0.6rem] px-3 font-normal me-body-18 text-d1 placeholder:text-lightgray rounded-[4px]" />
                                            <div
                                                class="mr-3 relative xl:min-w-[163px] lg:min-w-[140px] sm:min-w-[163px] min-w-full sm:mt-1 mt-3">
                                                <div
                                                    class="region-item flex justify-between items-center region-text cursor-pointer py-[0.6rem] 2xl:px-[30px] px-4 border-1 border-meA3 rounded-[4px] font-normal me-body-18 text-darkgray">
                                                    <input type="hidden" name="territory_id" class="selected-region" value="{{ $customer->billingInfo() != null ? $customer->billingInfo()->territory_id : ''}}" />
                                                    <p class="region-item mr-2 selected-text region"
                                                        data-text="Area">
                                                        {{__('labels.check_out_complete.area')}}</p>
                                                    <div class="region-item">
                                                        <svg class="region-item" xmlns="http://www.w3.org/2000/svg"
                                                            width="12" height="8" viewBox="0 0 12 8" fill="none">
                                                            <path
                                                                d="M11.9533 1.03687C11.8478 0.809527 11.5829 0.706402 11.3462 0.802496C11.2829 0.828277 10.5329 1.56656 8.62982 3.47906L5.99778 6.12281L3.3681 3.47906C1.46028 1.56421 0.712627 0.828277 0.649346 0.802496C0.600127 0.783746 0.518096 0.76734 0.466533 0.76734C0.129033 0.76734 -0.0983104 1.10953 0.0423146 1.41187C0.105596 1.54546 5.66731 7.13297 5.79856 7.19156C5.9181 7.24781 6.07747 7.24781 6.197 7.19156C6.32825 7.13297 11.89 1.54546 11.9533 1.41187C12.0095 1.29234 12.0095 1.1564 11.9533 1.03687Z"
                                                                fill="#7C7C7C" />
                                                        </svg>
                                                    </div>
                                                </div>
                                                <ul
                                                    class="region-list hidden absolute top-full bg-whitez w-full region-item z-[1]">
                                                    @if(count($territories) > 0)
                                                    @foreach($territories as $territory)
                                                    <li data-id="{{$territory->id}}" 
                                                        class="territory hover:text-orangeMediq px-3 py-1 font-normal me-body-18 text-darkgray cursor-pointer region-item {{ $customer->billingInfo() != null && $customer->billingInfo()->territory_id == $territory->id ? 'active' : ''}}">
                                                        {{ langbind($territory,'name')}}</li>
                                                    @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                            <div
                                                class="mr-3 relative xl:min-w-[163px] lg:min-w-[140px] sm:min-w-[163px] min-w-full sm:mt-1 mt-3">
                                                <div
                                                    class="district-item flex justify-between items-center district-text cursor-pointer py-[0.6rem] 2xl:px-[30px] px-4 border-1 border-meA3 rounded-[4px] font-normal me-body-18 text-darkgray">
                                                    <input type="hidden" name="district_id" class="selected-district" value=""/>
                                                    <p class="district-item mr-2 selected-text district-txt-val"
                                                        data-text="District">@lang('labels.check_out_complete.district')</p>
                                                    <div class="district-item">
                                                        <svg class="district-item" xmlns="http://www.w3.org/2000/svg"
                                                            width="12" height="8" viewBox="0 0 12 8" fill="none">
                                                            <path
                                                                d="M11.9533 1.03687C11.8478 0.809527 11.5829 0.706402 11.3462 0.802496C11.2829 0.828277 10.5329 1.56656 8.62982 3.47906L5.99778 6.12281L3.3681 3.47906C1.46028 1.56421 0.712627 0.828277 0.649346 0.802496C0.600127 0.783746 0.518096 0.76734 0.466533 0.76734C0.129033 0.76734 -0.0983104 1.10953 0.0423146 1.41187C0.105596 1.54546 5.66731 7.13297 5.79856 7.19156C5.9181 7.24781 6.07747 7.24781 6.197 7.19156C6.32825 7.13297 11.89 1.54546 11.9533 1.41187C12.0095 1.29234 12.0095 1.1564 11.9533 1.03687Z"
                                                                fill="#7C7C7C" />
                                                        </svg>
                                                    </div>
                                                </div>
                                                <ul
                                                    class="district-list hidden absolute top-full bg-whitez w-full district-item z-[1]">
                                                    @if(count($districts) > 0)
                                                    @foreach($districts as $district)
                                                    <li data-id="{{$district->id}}" 
                                                        class="district district_name{{$district->id}} hover:text-orangeMediq px-3 py-1 font-normal me-body-18 text-darkgray cursor-pointer district-item {{ $customer->billingInfo() != null && $customer->billingInfo()->district_id == $district->id ? 'active' : ''}}">
                                                        {{ langbind($district,'name')}}</li>
                                                    @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                            {{-- <div
                                                class="relative xl:min-w-[163px] lg:min-w-[140px] sm:min-w-[163px] min-w-full sm:mt-1 mt-3">
                                                <div
                                                    class="area-item flex justify-between items-center area-text cursor-pointer py-[0.6rem] 2xl:px-[30px] px-4 border-1 border-meA3 rounded-[4px] font-normal me-body-18 text-darkgray">
                                                    <input type="hidden" name="area_id" class="selected-area" />
                                                    <p class="area-item mr-2 selected-text area" data-text="Area">Area
                                                    </p>
                                                    <div class="area-item">
                                                        <svg class="area-item" xmlns="http://www.w3.org/2000/svg"
                                                            width="12" height="8" viewBox="0 0 12 8" fill="none">
                                                            <path
                                                                d="M11.9533 1.03687C11.8478 0.809527 11.5829 0.706402 11.3462 0.802496C11.2829 0.828277 10.5329 1.56656 8.62982 3.47906L5.99778 6.12281L3.3681 3.47906C1.46028 1.56421 0.712627 0.828277 0.649346 0.802496C0.600127 0.783746 0.518096 0.76734 0.466533 0.76734C0.129033 0.76734 -0.0983104 1.10953 0.0423146 1.41187C0.105596 1.54546 5.66731 7.13297 5.79856 7.19156C5.9181 7.24781 6.07747 7.24781 6.197 7.19156C6.32825 7.13297 11.89 1.54546 11.9533 1.41187C12.0095 1.29234 12.0095 1.1564 11.9533 1.03687Z"
                                                                fill="#7C7C7C" />
                                                        </svg>
                                                    </div>
                                                </div>
                                                <ul
                                                    class="area-list hidden absolute top-full bg-whitez w-full area-item z-[1]">
                                                    @if(count($areas) > 0)
                                                    @foreach($areas as $area)
                                                    <li data-id="{{$area->id}}"
                                                        class="area area_name hover:text-orangeMediq px-3 py-1 font-normal me-body-18 text-darkgray cursor-pointer area-item">
                                                        {{ langbind($area,'name')}}
                                                    </li>
                                                    @endforeach
                                                    @endif
                                                </ul>
                                            </div> --}}
                                        </div>
                                        <input type="text" name="address" value="{{ $customer->billingInfo() != null ? $customer->billingInfo()->address : ''}}"
                                            class="mailing-address-input w-full mt-3 bg-whitez border-1 border-meA3 focus:outline-none focus-within:outline-none lg:px-5 py-[0.6rem] px-3 font-normal me-body-18 text-darkgray placeholder:text-lightgray rounded-[4px]"
                                            placeholder="@lang('labels.basic_info.address')" />

                                    </div>
                                    <div class="mt-3">
                                        <label for="save-credit-address-card" class="mt-2 flex-wrap custom-checkbox-label items-start mr-1 last:mr-0 lg:mr-2 lg:last:mr-0 ">
                                            <input type="checkbox" name="save_info" id="save-credit-address-card" class="mt-[2px] save-credit-address-card">
                                            <span class="custom-checkbox-orange mt-[2px]"></span>
                                            <span class="font-normal me-body-18 text-darkgray text-left ml-6 4xl:ml-[30px] mr-2 leading-[normal]">
                                                @lang('labels.check_out.save_detail')
                                            </span>
                                        </label>
                                    </div>
                                    <div class="sm:mt-5 mt-3">
                                        <p class="font-normal me-body-16 text-darkgray text-left">@lang('labels.check_out_complete.special_request')</p>
                                        <textarea rows="3" name="special_request"
                                            class="me-body-18 font-normal focus-within:outline-none focus:outline-none border-1 border-meA3 rounded-[4px] resize-none mt-1 w-full px-5 py-3 text-darkgray placeholder:text-lightgray"
                                            placeholder="@lang('labels.check_out_complete.special_request_p')">{{ $customer->billingInfo() != null ? $customer->billingInfo()->special_request : ''}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="mt-5 no-receipt-content show">
                            <p class="font-normal me-body-16 text-darkgray">@lang('labels.check_out.booking_history')</p>
                        </div> --}}
                    </div>
                </div>

                <div component-name="me-checkout-payment-method" class="me-checkout-payment-method-container mt-10">
                    <div class="lg:px-10 sm:px-5 px-4 py-5 bg-whitez rounded-[12px] me-checkout-billing-info-content">
                        <h1 class="font-bold me-body-23 text-darkgray text-left">@lang('labels.check_out.payment_method') </h1>
                        <hr class="my-5 bg-mee4" />
                        <div>
                            <div
                                class="flex flex-wrap justify-between min-h-[80px] items-center payment-card first-card-payment">
                                <div>
                                    <label class="relative inline-block font-normal me-body-18">
                                        <input type="radio" name="cardType" value="credit_pay"
                                            class="opacity-0 absolute left-0 top-1/2 -translate-y-1/2" checked  onclick="pays()"/>
                                        <span class="custom-radio-orange"></span>
                                        <span class="ml-5 4xl:ml-[30px]">@lang('labels.check_out.credit_card')</span>
                                    </label>
                                </div>
                                <div component-name="me-checkout-payment-method-image-list"
                                    class="me-checkout-payment-method-image-list flex flex-wrap">

                                    <img src="{{asset('frontend/img/visa-payment-update.png')}}" class="object-contain"
                                        alt="images-0" />

                                    <img src="{{asset('frontend/img/master-payment.svg')}}" class="object-contain"
                                        alt="images-1" />

                                    <img src="{{asset('frontend/img/express-payment.svg')}}" class="object-contain"
                                        alt="images-2" />

                                    <img src="{{asset('frontend/img/jcb-payment-update.png')}}" class="object-contain"
                                        alt="images-3" />

                                    <img src="{{asset('frontend/img/unionpay-payment.svg')}}" class="object-contain"
                                        alt="images-4" />

                                </div>
                            </div>
                            @if(count($customer->stripeCustomers)>0)
                            <div component-name="me-checkout-payment-method-card-list"
                                class="show me-checkout-payment-method-card-list-container bg-far rounded-[8px] p-5">
                                <div class="me-checkout-payment-method-card-list-content">

                                    <input type="hidden" name="cus_str_id" class="cardId">
                                    @foreach($customer->stripeCustomers as $key => $card)
                                    <div data-id="{{$card->id}}" onclick="getCard({{$card->id}})"
                                        class="card-item sm:h-[74px] h-auto flex flex-wrap justify-between px-5 py-3 border-1 border-meA3 rounded-[4px] cursor-pointer hover:border-orangeMediq">
                                        @php
                                            if($card->card_type == 'Visa'){
                                                $img = 'visa-payment-update.png';
                                            }elseif($card->card_type == 'MasterCard'){
                                                $img = 'master-payment.svg';
                                            }elseif($card->card_type == "American Express"){
                                                $img = 'express-payment.svg';
                                            }elseif($card->card_type == 'UnionPay'){
                                                $img = 'unionpay-payment.svg';
                                            }else{
                                                $img = 'jcb-payment-update.png';
                                            }
                                        @endphp
                                        <div class="flex">
                                            <img src="{{asset('frontend/img/'.$img)}}" alt="master-payment"
                                                class="mr-2" />
                                            <div>
                                                <p class="font-bold me-body-18 text-darkgray">{{$card->card_type}}</p>
                                                {{-- <p class="font-normal me-body-14 text-lightgray">@lang('labels.checkout_out.expiry_date')
                                                    {{$card->expire_date}}</p> --}}
                                            </div>
                                        </div>
                                       {{-- <div>
                                            <p class="font-normal me-body-18 text-lightgray">Primary card</p>
                                        </div> --}}
                                    </div>
                                    @endforeach
                                    
                                    <!-- <div
                                        class="card-item sm:h-[74px] h-auto flex flex-wrap justify-between px-5 py-3 border-1 border-meA3 rounded-[4px] mt-5 cursor-pointer hover:border-orangeMediq">
                                        <div class="flex">
                                        <img src="{{asset('frontend/img/visa-payment-update.png')}}" alt="visa-payment" class="mr-2" />
                                        <div>
                                            <p class="font-bold me-body-18 text-darkgray">Visa *0232</p>
                                            <p class="font-normal me-body-14 text-lightgray">Expiry date: 06/24</p>
                                        </div>
                                        </div>
                                        <div>
                                        <p class="font-normal me-body-18 text-lightgray"></p>
                                        </div>
                                    </div> -->
                                    <div
                                        class="hidden sm:h-[74px] h-auto flex flex-wrap justify-between px-5 py-3 items-center border-1 border-meA3 rounded-[4px] mt-5 cursor-pointer hover:border-orangeMediq go-to-payment-cardform">
                                        <p class="font-bold me-body-18 text-darkgray">@lang('labels.check_out.use_different_card')</p>
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M9.27027 6.04186C9.04293 6.14733 8.9398 6.41218 9.03589 6.6489C9.06168 6.71218 9.79996 7.46218 11.7125 9.3653L14.3562 11.9973L11.7125 14.627C9.79761 16.5348 9.06168 17.2825 9.03589 17.3458C9.01714 17.395 9.00074 17.477 9.00074 17.5286C9.00074 17.8661 9.34293 18.0934 9.64527 17.9528C9.77886 17.8895 15.3664 12.3278 15.425 12.1966C15.4812 12.077 15.4812 11.9176 15.425 11.7981C15.3664 11.6669 9.77886 6.10515 9.64527 6.04186C9.52574 5.98561 9.3898 5.98561 9.27027 6.04186Z"
                                                    fill="#333333" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div component-name="me-checkout-payment-method-card-form"
                                class="me-checkout-payment-method-card-form bg-far rounded-lg p-5 show">
                                <div class="relative">
                                    <!-- <p class="font-normal me-body-18 text-darkgray">Qorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum.</p> -->
                                    {{-- <div class="form-row">
                                        <label for="card-element">
                                        Credit or debit card
                                        </label>
                                        <div id="card-element">
                                        <!-- A Stripe Element will be inserted here. -->
                                        </div>

                                        <!-- Used to display Element errors. -->
                                        <div id="card-errors" role="alert"></div>
                                    </div> --}}
                                    
                                   <div class="flex sm:flex-row flex-col">
                                        <div class="mt-5 sm:w-1/2 w-full sm:mr-3">
                                            <p class="font-normal me-body-16 text-darkgray">@lang('labels.check_out.card_number')</p>
                                            <div id="card-number" class="card-number billing-card-no placeholder:font-normal border-1 border-meA3 rounded-[4px] w-full font-normal me-body-18 text-darkgray focus-within:outline-none focus:outline-none py-2 px-5"></div>
                                            <!-- <input type="text" name="card_no" value=""
                                                class="card-number billing-card-no placeholder:font-normal border-1 border-meA3 rounded-[4px] w-full font-normal me-body-18 text-darkgray focus-within:outline-none focus:outline-none py-2 px-5"
                                                placeholder="@lang('labels.check_out.enter_card_number')"/> -->
                                        </div>
                                        <div class="mt-5 sm:w-1/2 w-full">
                                            <p class="font-normal me-body-16 text-darkgray">@lang('labels.check_out.expiry_date') </p>
                                            <div id="card-expiry" class="card-expiry billing-card-no placeholder:font-normal border-1 border-meA3 rounded-[4px] w-full font-normal me-body-18 text-darkgray focus-within:outline-none focus:outline-none py-2 px-5"></div>
                                            <!-- <input type="text" name="expire_date" value="" maxlength="5"
                                                class="billing-card-expired placeholder:font-normal border-1 border-meA3 rounded-[4px] w-full font-normal me-body-18 text-darkgray focus-within:outline-none focus:outline-none py-2 px-5"
                                                placeholder="@lang('labels.check_out.MM/YY')"/> -->
                                        </div>
                                    </div>
                                    <div class="mt-5 sm:w-1/2 w-full sm:mr-3">
                                        <div>
                                            <div class="flex items-center">
                                                <p
                                                    class=" mr-1 font-normal me-body-16 text-darkgray leading-[140%] mt-[2px]">
                                                    CVV </p>
                                                <div class="cvv-svg">
                                                    <div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none">
                                                            <path
                                                                d="M12.492 11.41C12.4697 11.2871 12.4023 11.1769 12.3028 11.1012C12.2034 11.0255 12.0793 10.9898 11.9548 11.0011C11.8304 11.0124 11.7147 11.0699 11.6305 11.1622C11.5463 11.2545 11.4998 11.3751 11.5 11.5V16.002L11.508 16.092C11.5303 16.2149 11.5977 16.3251 11.6972 16.4008C11.7966 16.4765 11.9207 16.5122 12.0452 16.5009C12.1696 16.4896 12.2853 16.4321 12.3695 16.3398C12.4537 16.2475 12.5002 16.1269 12.5 16.002V11.5L12.492 11.41ZM12.799 9.25C12.799 9.05109 12.72 8.86032 12.5793 8.71967C12.4387 8.57902 12.2479 8.5 12.049 8.5C11.8501 8.5 11.6593 8.57902 11.5187 8.71967C11.378 8.86032 11.299 9.05109 11.299 9.25C11.299 9.44891 11.378 9.63968 11.5187 9.78033C11.6593 9.92098 11.8501 10 12.049 10C12.2479 10 12.4387 9.92098 12.5793 9.78033C12.72 9.63968 12.799 9.44891 12.799 9.25ZM20 12.5C20 10.3783 19.1571 8.34344 17.6569 6.84315C16.1566 5.34285 14.1217 4.5 12 4.5C9.87827 4.5 7.84344 5.34285 6.34315 6.84315C4.84285 8.34344 4 10.3783 4 12.5C4 14.6217 4.84285 16.6566 6.34315 18.1569C7.84344 19.6571 9.87827 20.5 12 20.5C14.1217 20.5 16.1566 19.6571 17.6569 18.1569C19.1571 16.6566 20 14.6217 20 12.5ZM5 12.5C5 11.5807 5.18106 10.6705 5.53284 9.82122C5.88463 8.97194 6.40024 8.20026 7.05025 7.55025C7.70026 6.90024 8.47194 6.38463 9.32122 6.03284C10.1705 5.68106 11.0807 5.5 12 5.5C12.9193 5.5 13.8295 5.68106 14.6788 6.03284C15.5281 6.38463 16.2997 6.90024 16.9497 7.55025C17.5998 8.20026 18.1154 8.97194 18.4672 9.82122C18.8189 10.6705 19 11.5807 19 12.5C19 14.3565 18.2625 16.137 16.9497 17.4497C15.637 18.7625 13.8565 19.5 12 19.5C10.1435 19.5 8.36301 18.7625 7.05025 17.4497C5.7375 16.137 5 14.3565 5 12.5Z"
                                                                fill="#333333" />
                                                        </svg>
                                                    </div>
                                                    <div
                                                        class="hidden cvv-tooltip absolute w-full max-w-[350px] top-[36%] left-[7%] -translate-x-1/2 -translate-y-1/2">
                                                        <div class="cvv-tooltip-content px-3 py-2 bg-whitez">
                                                            <p class="font-normal me-body-16 text-darkgray">@lang('labels.check_out.CVV_latest')</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="card-cvc" class="card-cvc billing-card-cvv w-full placeholder:font-normal border-1 border-meA3 rounded-[4px] font-normal me-body-18 text-darkgray focus-within:outline-none focus:outline-none py-2 px-5"></div>

                                            <!-- <input type="text" name="cvv" value="" maxlength="4"
                                                class="card-cvc billing-card-cvv w-full placeholder:font-normal border-1 border-meA3 rounded-[4px] font-normal me-body-18 text-darkgray focus-within:outline-none focus:outline-none py-2 px-5"
                                                placeholder="@lang('labels.check_out.enter') CVV"/> -->
                                        </div>
                                    </div> 
                                    <div class="mt-5">
                                        <label class="font-normal me-body-18 text-darkgray relative flex items-center">
                                            <input type="checkbox" class="w-4 h-4 opacity-0" name="saveCard"/>
                                            <span
                                                class="custom-checkbox-orange w-4 h-4 absolute left-0 top-1/2 -translate-y-1/2 rounded-[4px] mr-5"></span>
                                            <span class="ml-[10px]">@lang('labels.check_out.save_credit_details')</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr class="bg-mee4 mt-8 mb-8"/>

                            <div
                                class="flex flex-wrap justify-between min-h-[80px] border-b border-b-mee4 last:border-b-0 items-center payment-card gpay hidden">
                                <div>
                                    <label class="relative inline-block font-normal me-body-18">
                                        <input type="radio" name="cardType" value="g_pay"
                                            class="opacity-0 absolute left-0 top-1/2 -translate-y-1/2" onclick="pays()"/>
                                        <span class="custom-radio-orange"></span>
                                        <span class="ml-5 4xl:ml-[30px]">Google Pay</span>
                                    </label>
                                </div>
                                <div component-name="me-checkout-payment-method-image-list"
                                    class="me-checkout-payment-method-image-list flex flex-wrap">

                                    <img src="{{asset('frontend/img/googlepay-payment.svg')}}" class="object-contain"
                                        alt="images-0" />

                                </div>
                            </div>

                            <div
                                class="flex flex-wrap justify-between min-h-[80px] border-b border-b-mee4 last:border-b-0 items-center payment-card apay hidden">
                                <div>
                                    <label class="relative inline-block font-normal me-body-18">
                                        <input type="radio" name="cardType" value="a_pay"
                                            class="opacity-0 absolute left-0 top-1/2 -translate-y-1/2"  onclick="pays()"/>
                                        <span class="custom-radio-orange"></span>
                                        <span class="ml-5 4xl:ml-[30px]">Apple Pay</span>
                                    </label>
                                </div>
                                <div component-name="me-checkout-payment-method-image-list"
                                    class="me-checkout-payment-method-image-list flex flex-wrap">

                                    <img src="{{asset('frontend/img/apple-payment.svg')}}" class="object-contain"
                                        alt="images-0" />

                                </div>
                            </div> 

                            {{-- <div
                            class="flex flex-wrap justify-between min-h-[80px] border-b border-b-mee4 last:border-b-0 items-center payment-card">
                            <div>
                            <label class="relative inline-block font-normal me-body-18">
                                <input type="radio" name="cardType" class="opacity-0 absolute left-0 top-1/2 -translate-y-1/2" />
                                <span class="custom-radio-orange"></span>
                                <span class="ml-5 4xl:ml-[30px]">Wechat Pay</span>
                            </label>
                            </div>
                            <div component-name="me-checkout-payment-method-image-list"
                            class="me-checkout-payment-method-image-list flex flex-wrap">

                            <img src="{{asset('frontend/img/wechat-payment.png')}}" class="object-contain"
                            alt="images-0" />

                        </div>
                    </div>

                    <div
                        class="flex flex-wrap justify-between min-h-[80px] border-b border-b-mee4 last:border-b-0 items-center payment-card">
                        <div>
                            <label class="relative inline-block font-normal me-body-18">
                                <input type="radio" name="cardType"
                                    class="opacity-0 absolute left-0 top-1/2 -translate-y-1/2" />
                                <span class="custom-radio-orange"></span>
                                <span class="ml-5 4xl:ml-[30px]">Alipay HK</span>
                            </label>
                        </div>
                        <div component-name="me-checkout-payment-method-image-list"
                            class="me-checkout-payment-method-image-list flex flex-wrap">

                            <img src="{{asset('frontend/img/alipay-payment.svg')}}" class="object-contain"
                                alt="images-0" />

                        </div>
                    </div> --}}
                    @if(isset($summaryData->offlinePayment))
                    @if($summaryData->offlinePayment==true)
                    <div
                        class="flex flex-wrap justify-between min-h-[80px] border-b border-b-mee4 last:border-b-0 items-center payment-card">
                        <div>
                            <label class="relative inline-block font-normal me-body-18">
                                <input type="radio" name="cardType" value="other_pay"
                                    class="opacity-0 absolute left-0 top-1/2 -translate-y-1/2" onclick="pays()"/>
                                <span class="custom-radio-orange"></span>
                                <span class="ml-5 4xl:ml-[30px]">{{langbind($paymentInfo,'checkout_3_title')}}</span>
                            </label>
                        </div>
                        <div component-name="me-checkout-payment-method-image-list"
                            class="me-checkout-payment-method-image-list flex flex-wrap">

                            <img src="{{asset('frontend/img/hsbc-payment.png')}}" class="object-contain hsbc-image"
                                alt="images-0" />

                            <img src="{{asset('frontend/img/fps-payment-update.png')}}" class="object-contain"
                                alt="images-1" />

                            <img src="{{asset('frontend/img/payme-payment.svg')}}" class="object-contain"
                                alt="images-2" />

                            <img src="{{asset('frontend/img/WeChat-Pay-footer-logo.svg')}}" class="object-contain hsbc-image"
                                alt="images-3" />

                        </div>
                    </div>
                    {!! langbind($paymentInfo,'checkout_3_desc') !!}
                    <input type="hidden" name="currentOrderId" value="0">
                    @else
                    <input type="hidden" name="currentOrderId" value="{{$summaryData->currentOrderId}}">
                    @endif
                    @endif
                </div>
            </div>
        </div>
        @php 
        if(isset($summaryData->discount_type) && $summaryData->discount_type == 'percent'){
            $amount = round((($summaryData->totalAmount) / 100) * $summaryData->codePrice, 0);
            $total = $summaryData->totalAmount - $amount;
        }else{
            if(isset($summaryData->codePrice) && $summaryData->codePrice > $summaryData->totalAmount){
                $total = 0;
            }else{
                $total = $summaryData->totalAmount - $summaryData->codePrice;
            }
        }
        @endphp
        <div class="xl:mt-10 mt-5 step-3-bottom-area p-5">
            <div class="flex sm:flex-row flex-col justify-between items-start">
                <p class="font-bold me-body-28 text-darkgray">HK${{number_format($total,2)}}</p>
            </div>
            <div class="flex justify-end">
                <button type="submit"
                    class="mt-2 book-now-btn rounded-md px-5 py-[9px] me-body-20 font-bold bg-orangeMediq text-whitez hover:bg-brightOrangeMediq xl:min-w-400px min-w-[250px] sm:w-auto w-full">
                    @lang('labels.check_out.pay_now')</button>
                <div id="payment-request-button" class="hidden">
                <!-- A Stripe Element will be inserted here if the browser supports this type of payment method. -->
                </div>
            </div>
        </div>
        <br>
        <div id="messages" role="alert" style="display: none;color: darkorange;"></div>

        <div class="xl:mt-10 mt-5 xl:mb-[120px] mb-[60px] lg:block hidden">
            <p class="me-body-16 font-normal text-lightgray flex flex-wrap">@lang('labels.check_out.protected') 
                <a  href="{{route('best')}}" target="_blank"
                class="me-body-16 font-normal text-lightgray underline ml-1">@lang('labels.check_out.awesome_booking')</a>
            </p>
            <div class="flex items-center sm:mt-5 mt-2">
                <div class="back_to_home_page">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                        <path
                            d="M12.7961 19.4533C13.0235 19.3478 13.1266 19.0829 13.0305 18.8462C13.0047 18.7829 12.2664 18.0329 10.3539 16.1298L7.7102 13.4978L10.3539 10.8681C12.2688 8.96028 13.0047 8.21263 13.0305 8.14935C13.0493 8.10013 13.0657 8.0181 13.0657 7.96653C13.0657 7.62903 12.7235 7.40169 12.4211 7.54231C12.2875 7.6056 6.70004 13.1673 6.64145 13.2986C6.5852 13.4181 6.5852 13.5775 6.64145 13.697C6.70004 13.8283 12.2875 19.39 12.4211 19.4533C12.5407 19.5095 12.6766 19.5095 12.7961 19.4533Z"
                            fill="#333333" />
                    </svg>
                </div>
                @if($isOfflinePayment==true)
                <a href="{{ Route::current()->getName() == 'checkout.info' ? 'javascript:void(0)' : langlink('checkout/enter-information?is_info='.session()->get('is_info')) }}" class="me-body-18 font-normal text-darkgray">@lang('labels.check_out.previous_step')
                </a>
                @else 
                <a href="javascript:void(0)" class="me-body-18 font-normal text-darkgray">@lang('labels.check_out.previous_step')
                </a>
                @endif
            </div>
        </div>
    </div>
    <div>
        <div component-name="me-checkout-order-summary"
            class=" lg:fixed lg:mb-0 mb-7 me-checkout-order-summary-container">
            <div class="">
                <div class="checkout-page3-selected-list ">
                    <div>
                        <div class="flex justify-between items-center selected-list-collpase active py-5 px-5">
                            @php
                                $sample= 0; $two_person_plan = 0; $sample_price = 0; $two_person_price = 0;
                                if(isset($datas['sample'])){
                                    $sample = count($datas['sample']);
                                    $sample_price = collect($datas['sample'])->sum('each_recipient_amount') + collect($datas['sample'])->sum('add_on_prices');

                                }
                                if(isset($datas['two_person_plan'])){
                                    $two_person_plan = count($datas['two_person_plan'])/2;
                                    $two_person_price = collect($datas['two_person_plan'])->sum('each_recipient_amount') + collect($datas['two_person_plan'])->sum('add_on_prices');
                                }
                                $subtotal = $sample_price + $two_person_price;
                                $selected_items = $sample + $two_person_plan;
                                
                            @endphp

                            <p class="font-bold me-body-23 text-darkgray">@lang('labels.check_out.product_list') ({{$selected_items}})</p>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path
                                        d="M5.04675 12.7961C5.15222 13.0235 5.41706 13.1266 5.65378 13.0305C5.71706 13.0047 6.46706 12.2664 8.37019 10.3539L11.0022 7.7102L13.6319 10.3539C15.5397 12.2688 16.2874 13.0047 16.3507 13.0305C16.3999 13.0493 16.4819 13.0657 16.5335 13.0657C16.871 13.0657 17.0983 12.7235 16.9577 12.4211C16.8944 12.2875 11.3327 6.70004 11.2014 6.64145C11.0819 6.5852 10.9225 6.5852 10.803 6.64145C10.6717 6.70004 5.11003 12.2875 5.04675 12.4211C4.9905 12.5407 4.9905 12.6766 5.04675 12.7961Z"
                                        fill="#333333" />
                                </svg>
                            </div>
                        </div>
                        <div class="selected-list-collpase-content">
                            <div component-name="me-checkout-selected-items"
                                class="max-h-[300px] overflow-y-auto pb-5 lg:fixed w-[360px] me-checkout-selected-items-container px-5 lg:mb-10 mb-7">
                                <div class="me-checkout-selected-items">
                                    @if(isset($datas['sample']))
                                    @foreach($datas['sample'] as $recipient)
                                    <div class="border-b-1 border-mee4 pb-5 mb-5 last:mb-0 last:border-b-0">
                                        <div class="flex">
                                            <img src="{{asset($recipient->product->merchant->icon)}}"
                                                class=" mr-3 max-w-[40px] max-h-[40px]" alt="logo-0" />
                                            <p class="font-bold me-body-16 text-darkgray">
                                                {{langbind($recipient->product,'name')}}</p>
                                        </div>
                                        <div class="mt-2">
                                            <p class="font-bold me-body-16 text-darkgray text-right">
                                                ${{number_format($recipient->each_recipient_amount + $recipient->add_on_prices,2)}}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                    @if(isset($datas['two_person_plan']))
                                    @foreach(collect($datas['two_person_plan'])->split(collect($datas['two_person_plan'])->count()/2) as $key => $row)
                                        @if(count($row) == 2)
                                        @php
                                            if($key == 0){
                                                $keyVal = $row[0];
                                            }
                                        @endphp
                                        <div class="border-b-1 border-mee4 pb-5 mb-5 last:mb-0 last:border-b-0">
                                            <div class="flex">
                                                <img src="{{asset( $keyVal->product->merchant->icon)}}"
                                                    class=" mr-3 max-w-[40px] max-h-[40px]" alt="logo-0" />
                                                <p class="font-bold me-body-16 text-darkgray">
                                                    {{langbind( $keyVal->product,'name')}}</p>
                                            </div>
                                            <div class="mt-2">
                                                <p class="font-bold me-body-16 text-darkgray text-right">
                                                    @php $eachTwoRecipientPrice = ($keyVal->each_recipient_amount + $keyVal->add_on_prices) + $row[1]->add_on_prices; @endphp
                                                    ${{ number_format($eachTwoRecipientPrice,2)}}</p>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-5 me-checkout-order-summary mt-10">
                    <h1 class="font-bold me-body-23 text-darkgray">@lang('labels.check_out.order')</h1>
                    <div class="mt-3">
                        <div class="hidden">
                            <div class="flex justify-between">
                                <div class="flex items-center checkout-summary-collpase cursor-pointer">
                                    <h3 class="font-bold text-darkgray me-body-18">@lang('labels.check_out.item_total') (2)</h3>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20" fill="none">
                                            <path
                                                d="M15.5743 12.472C15.4864 12.6615 15.2657 12.7474 15.0685 12.6674C15.0157 12.6459 14.3907 12.0306 12.8048 10.4369L10.6114 8.23376L8.42003 10.4369C6.83018 12.0326 6.20714 12.6459 6.1544 12.6674C6.11339 12.683 6.04503 12.6967 6.00206 12.6967C5.72081 12.6967 5.53136 12.4115 5.64854 12.1595C5.70128 12.0482 10.336 7.39196 10.4454 7.34313C10.545 7.29626 10.6778 7.29626 10.7774 7.34313C10.8868 7.39196 15.5216 12.0482 15.5743 12.1595C15.6212 12.2592 15.6212 12.3724 15.5743 12.472Z"
                                                fill="#333333" />
                                        </svg>
                                    </div>
                                </div>
                                <input class="hidden font-bold text-darkgray me-body-18 summary-card-total-price" />
                                <h3 class="font-bold text-darkgray me-body-18 summary-card-total-price">$19,289.00</h3>
                            </div>
                           
                            <div class="mt-2 flex justify-between checkout-summary-collpase-content">
                                <p class="font-normal text-darkgray me-body-16">@lang('labels.check_out.sub_total')</p>
                                <p class="font-normal text-darkgray me-body-16">${{number_format($subtotal,2)}}</p>
                            </div>
                            <!-- <div class="mt-2 hidden justify-between">
                            <p class="font-normal text-darkgray me-body-16">On Sale Offer</p>
                            <p class="font-normal text-darkgray me-body-16">- $1,010.00</p>
                        </div> -->
                        </div>
                        <div class="summary-item-total ">
                            <div class="mt-2 flex justify-between">
                                <p class="font-bold text-darkgray me-body-16">@lang('labels.check_out.sub_total')</p>
                                <p class="font-bold text-darkgray me-body-16">${{number_format($subtotal,2)}}</p>
                            </div>
                            <!-- <div class="mt-2 flex justify-between">
                            <p class="font-bold text-darkgray me-body-16">Order Discount</p>
                            <p class="font-bold text-darkgray me-body-16">- $1,140.00</p>
                        </div> -->
                        </div>
                        @if(isset($summaryData->codePrice) && $summaryData->codePrice !== "0")
                        <hr class="bg-mee4 my-5" />
                        <div>
                            <div class="flex items-center justify-between">
                                <p class="font-bold text-darkgray me-body-18">@lang('labels.check_out.my_discount')</p>
                                <p class="font-bold me-body-16 text-darkgray hidden">- $30.00</p>
                            </div>
                            <div class="mt-3">
                                
                                <div class="mt-2  bg-far p-[10px] rounded-[4px]">
                                    <div class="flex justify-between">
                                        <p class="font-normal me-body-14 text-darkgray">
                                           {{$summaryData->codeType == 'coupon_code' ? __('labels.menu.coupon') : ($summaryData->codeType == 'promo_code' ?  __('labels.check_out.promo_code') : __('labels.check_out.my_discount') )}} 
                                        </p>
                                        @if(isset($summaryData->discount_type) && $summaryData->discount_type == 'percent')
                                        <p class="font-normal me-body-14 text-darkgray">- {{$summaryData->codePrice}}%</p>
                                        @else
                                        <p class="font-normal me-body-14 text-darkgray">- ${{number_format($summaryData->codePrice,2)}}</p>
                                        @endif
                                    </div>
                                </div>
                                
                                <div>
                                    <div class="bg-far py-3 px-[10px] flex justify-between before-choose-coupon hidden">
                                        <input data-price=""
                                            class="promo-code bg-transparent focus:outline-none focus-visible:outline-none w-[90%] font-normal text-meA3 placeholder:text-meA3 me-body-16"
                                            placeholder="Enter promo code" />
                                        <span
                                            class="font-normal text-orangeMediq me-body-16 cursor-pointer use-promo-code-btn">Use</span>
                                    </div>
                                    <div class="mt-2 before-choose-coupon hidden">
                                        <p
                                            class="select-coupon-btn underline font-normal text-darkgray me-body-16 cursor-pointer">
                                            Select a coupon (4)</p>
                                    </div>
                                    <div class="promo-code-error hidden">
                                        <div class="promo-code-error-msg flex items-center bg-far py-3 px-[10px]">
                                            <p class="mr-4 text-[#EE220C] font-normal me-body-14 text-">Please Enter
                                                Valid
                                                Promo
                                                Code
                                            </p>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M12.5908 10.6904C12.5641 10.5429 12.4831 10.4107 12.3638 10.3199C12.2445 10.2291 12.0955 10.1862 11.9462 10.1998C11.7969 10.2133 11.658 10.2823 11.557 10.3931C11.456 10.5039 11.4001 10.6485 11.4004 10.7984V16.2008L11.41 16.3088C11.4367 16.4564 11.5177 16.5886 11.637 16.6794C11.7563 16.7702 11.9053 16.813 12.0546 16.7995C12.2039 16.7859 12.3428 16.717 12.4438 16.6062C12.5448 16.4954 12.6007 16.3508 12.6004 16.2008V10.7984L12.5908 10.6904ZM12.9592 8.09844C12.9592 7.85974 12.8644 7.63082 12.6956 7.46204C12.5268 7.29326 12.2979 7.19844 12.0592 7.19844C11.8205 7.19844 11.5916 7.29326 11.4228 7.46204C11.254 7.63082 11.1592 7.85974 11.1592 8.09844C11.1592 8.33713 11.254 8.56605 11.4228 8.73483C11.5916 8.90362 11.8205 8.99844 12.0592 8.99844C12.2979 8.99844 12.5268 8.90362 12.6956 8.73483C12.8644 8.56605 12.9592 8.33713 12.9592 8.09844ZM21.6004 11.9984C21.6004 9.45236 20.589 7.01056 18.7886 5.21021C16.9883 3.40986 14.5465 2.39844 12.0004 2.39844C9.45431 2.39844 7.01251 3.40986 5.21217 5.21021C3.41182 7.01056 2.40039 9.45236 2.40039 11.9984C2.40039 14.5445 3.41182 16.9863 5.21217 18.7867C7.01251 20.587 9.45431 21.5984 12.0004 21.5984C14.5465 21.5984 16.9883 20.587 18.7886 18.7867C20.589 16.9863 21.6004 14.5445 21.6004 11.9984ZM3.60039 11.9984C3.60039 10.8953 3.81766 9.80303 4.2398 8.7839C4.66194 7.76476 5.28068 6.83875 6.06069 6.05874C6.8407 5.27873 7.76671 4.65999 8.78585 4.23785C9.80498 3.81571 10.8973 3.59844 12.0004 3.59844C13.1035 3.59844 14.1958 3.81571 15.2149 4.23785C16.2341 4.65999 17.1601 5.27873 17.9401 6.05874C18.7201 6.83875 19.3388 7.76476 19.761 8.7839C20.1831 9.80303 20.4004 10.8953 20.4004 11.9984C20.4004 14.2263 19.5154 16.3628 17.9401 17.9381C16.3648 19.5134 14.2282 20.3984 12.0004 20.3984C9.77257 20.3984 7.636 19.5134 6.06069 17.9381C4.48539 16.3628 3.60039 14.2263 3.60039 11.9984Z"
                                                    fill="#EE220C" />
                                            </svg>
                                        </div>
                                        <div class="mt-2">
                                            <p
                                                class="select-coupon-btn underline font-normal text-darkgray me-body-16 cursor-pointer">
                                                Select a coupon (4)</p>
                                        </div>
                                    </div>
                                    <div class="added-promo-code after-choose-coupon hidden">
                                        <div class="flex items-center">
                                            <p class="mr-[10px] font-normal me-body-16 text-darkgray">Promo Code</p>
                                            <div class="relative inline-block">
                                                <div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="110" height="28"
                                                        viewBox="0 0 110 28" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M0 2C0 0.895431 0.89543 0 2 0H108C109.105 0 110 0.895431 110 2V7C106.134 7 103 10.134 103 14C103 17.866 106.134 21 110 21V26C110 27.1046 109.105 28 108 28H2C0.895429 28 0 27.1046 0 26V21C3.86599 21 7 17.866 7 14C7 10.134 3.86599 7 0 7V2Z"
                                                            fill="#FFF2E5" />
                                                    </svg>
                                                </div>
                                                <p
                                                    class="promo-code-text whitespace-nowrap text-ellipsis max-w-[62px] overflow-hidden font-normal me-body-14 text-darkgray absolute left-3 top-1/2 -translate-y-1/2">
                                                    ZB0CC30</p>
                                                <div
                                                    class="cursor-pointer remove-promo-code absolute right-3 top-1/2 -translate-y-1/2">
                                                    <div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17"
                                                            viewBox="0 0 16 17" fill="none">
                                                            <path
                                                                d="M12.2001 4.30682C12.1385 4.24501 12.0652 4.19598 11.9846 4.16253C11.9039 4.12907 11.8175 4.11185 11.7301 4.11185C11.6428 4.11185 11.5564 4.12907 11.4757 4.16253C11.3951 4.19598 11.3218 4.24501 11.2601 4.30682L8.00015 7.56015L4.74015 4.30015C4.67843 4.23843 4.60515 4.18947 4.52451 4.15606C4.44387 4.12266 4.35744 4.10547 4.27015 4.10547C4.18286 4.10547 4.09643 4.12266 4.01579 4.15606C3.93514 4.18947 3.86187 4.23843 3.80015 4.30015C3.73843 4.36187 3.68947 4.43514 3.65606 4.51579C3.62266 4.59643 3.60547 4.68286 3.60547 4.77015C3.60547 4.85744 3.62266 4.94387 3.65606 5.02451C3.68947 5.10515 3.73843 5.17843 3.80015 5.24015L7.06015 8.50015L3.80015 11.7601C3.73843 11.8219 3.68947 11.8951 3.65606 11.9758C3.62266 12.0564 3.60547 12.1429 3.60547 12.2301C3.60547 12.3174 3.62266 12.4039 3.65606 12.4845C3.68947 12.5652 3.73843 12.6384 3.80015 12.7001C3.86187 12.7619 3.93514 12.8108 4.01579 12.8442C4.09643 12.8776 4.18286 12.8948 4.27015 12.8948C4.35744 12.8948 4.44387 12.8776 4.52451 12.8442C4.60515 12.8108 4.67843 12.7619 4.74015 12.7001L8.00015 9.44015L11.2601 12.7001C11.3219 12.7619 11.3951 12.8108 11.4758 12.8442C11.5564 12.8776 11.6429 12.8948 11.7301 12.8948C11.8174 12.8948 11.9039 12.8776 11.9845 12.8442C12.0652 12.8108 12.1384 12.7619 12.2001 12.7001C12.2619 12.6384 12.3108 12.5652 12.3442 12.4845C12.3776 12.4039 12.3948 12.3174 12.3948 12.2301C12.3948 12.1429 12.3776 12.0564 12.3442 11.9758C12.3108 11.8951 12.2619 11.8219 12.2001 11.7601L8.94015 8.50015L12.2001 5.24015C12.4535 4.98682 12.4535 4.56015 12.2001 4.30682Z"
                                                                fill="#333333" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <hr class="bg-mee4 my-5" />
                        <div>
                            <div class="mt-1 flex justify-between">
                                <p class="font-bold text-darkgray me-body-18">@lang('labels.check_out.total')</p>
                                <p class="font-bold text-darkgray me-body-18">HK${{number_format($total,2)}}</p>
                            </div>
                        </div>
                        <div class="mt-5">
                            <button
                                class=" book-now-btn rounded-md px-5 py-[9px] me-body-20 font-bold bg-orangeMediq text-whitez hover:bg-brightOrangeMediq w-full">@lang('labels.check_out.pay_now')</button>
                        </div>
                    </div>
                </div>
                <div class="my-1">
                    <div
                        class="me-body-16 font-normal text-darkgray flex flex-wrap 3xl:max-w-[70%] sm:max-w-[65%] max-w-full">
                        @if(lang() == "en")
                        <span class="mr-1">@lang('labels.check_out.by_processing')</span>
                        <span class="mx-1"><a href="{{ route('termofuse') }}" class="me-body-16 font-normal text-lightgray underline">@lang('labels.footer.terms')</a></span>
                        <span class="mx-1">@lang('labels.check_out.and')</span>
                        <span><a href="#" class="me-body-16 font-normal text-lightgray underline">@lang('labels.check_out.cancel')</a>.</span>
                        @else 
                        <span class="">@lang('labels.check_out.by_processing')</span>
                        <span><a href="{{ route('termofuse') }}" class="me-body-16 font-normal text-lightgray underline">@lang('labels.footer.terms')</a></span>
                        <span>@lang('labels.check_out.and')</span>
                        <span><a href="#" class="me-body-16 font-normal text-lightgray underline">@lang('labels.check_out.cancel')</a>。</span>
                        @endif
                    </div>
                </div>
                <div class="xl:mb-10 mb-5 lg:hidden block mt-3">
                    <p class="me-body-16 font-normal text-lightgray flex flex-wrap">@lang('labels.check_out.protected') 
                        <a  href="{{route('best')}}" target="_blank"
                        class="me-body-16 font-normal text-lightgray underline ml-1">@lang('labels.check_out.awesome_booking')</a>
                    </p>
                    <div class="flex items-center sm:mt-5 mt-2">
                        <div class="back_to_home_page">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                <path
                                    d="M12.7961 19.4533C13.0235 19.3478 13.1266 19.0829 13.0305 18.8462C13.0047 18.7829 12.2664 18.0329 10.3539 16.1298L7.7102 13.4978L10.3539 10.8681C12.2688 8.96028 13.0047 8.21263 13.0305 8.14935C13.0493 8.10013 13.0657 8.0181 13.0657 7.96653C13.0657 7.62903 12.7235 7.40169 12.4211 7.54231C12.2875 7.6056 6.70004 13.1673 6.64145 13.2986C6.5852 13.4181 6.5852 13.5775 6.64145 13.697C6.70004 13.8283 12.2875 19.39 12.4211 19.4533C12.5407 19.5095 12.6766 19.5095 12.7961 19.4533Z"
                                    fill="#333333" />
                            </svg>
                        </div>
                        @if($isOfflinePayment==true)
                        <a href="{{ Route::current()->getName() == 'checkout.info' ? 'javascript:void(0)' : langlink('checkout/enter-information?is_info='.session()->get('is_info')) }}" class="me-body-18 font-normal text-darkgray">@lang('labels.check_out.previous_step')
                        </a>
                        @else 
                        <a href="javascript:void(0)" class="me-body-18 font-normal text-darkgray">@lang('labels.check_out.previous_step')
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    </div>
</form>
<div compnent-name="me-checkout-complete-loading" id="me-checkout-complete-loading"
    class="me-checkout-complete-loading-container">
    <div
        class="me-checkout-complete-loading-content p-10 py-5 rounded-[12px] sm:w-[300px] w-[250px] h-[140px] absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-whitez flex justify-center items-center">
        <div class="relative w-full">
            <div class="me-checkout-complete-loading">

            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript" src="https://js.stripe.com/v3/"></script>
<!-- <script src="{{ asset('frontend/js/stripe-v3.js') }}"></script> -->
<script>
// 1. Initialize Stripe
const stripe = Stripe('{{config('app.stripe_key')}}');
const elements = stripe.elements();

var cardNumberElement = elements.create('cardNumber');
cardNumberElement.mount('#card-number');

var cardExpiryElement = elements.create('cardExpiry');
cardExpiryElement.mount('#card-expiry');

var cardCvcElement = elements.create('cardCvc');
cardCvcElement.mount('#card-cvc');

// const cardElement  = elem.create('card');
// cardElement .mount('#card-element');

 document.getElementById("mainForm").addEventListener('submit', function(event) {
    event.preventDefault();
    var isRequired = checkBillingInfoInput();
    var cardId = $('.cardId').val()
    console.log('isRequired',isRequired)
    const pname = $('input[name="cardType"]:checked').val();
    console.log('pname',pname)
    if(pname == 'p_pay' || pname == 'a_pay'){
    }else if(cardId || pname == 'other_pay'){
        if(isRequired == true){
            $("#mainForm").submit();
            showLoading()
        }else{
            toastr.warning('Receipt informations are required');
        }
       
    }else if(isRequired == true){
        stripe.createToken(cardNumberElement).then(function(result) {
            if (result.error) {
            // Handle errors (e.g., display an error message to the user)
            console.error(result.error.message);
            toastr.warning('Invalid card! ' + result.error.message);
            } else {
            // Send the token to your server for further processing
            var token = result.token.id;
            // Now you can use the token to make a charge or save it for later use
            console.log('token',token);
            const forms = document.getElementById('mainForm');
            const hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token);
            forms.appendChild(hiddenInput);

            // Submit the form
            forms.submit();
            showLoading()
            }
        });
    }
});

$('.go-to-payment-cardform').click(function(){
    $('.cardId').val('');
})
function getCard(cid){
    // $('#cardId'+cid).val(cid)
    $('.cardId').val(cid)
}

$(function() {
    initializedDropdownData();

    let invalid_card = <?= json_encode(Session::has('invalid_card'))?>;
    let fill_phone = <?= json_encode(Session::has('fill_phone'))?>;
    let getMessage = <?= json_encode(Session::get('invalid_card'))?>;
    if (invalid_card) {
        toastr.warning('Invalid card! ' + getMessage);
    }
    if (fill_phone) {
        toastr.warning('{{__('labels.partnership.phone_required')}}');
    }

    let verified_phone = <?= json_encode(Session::has('verified_phone'))?>;
    let verifyMessage = <?= json_encode(Session::get('verified_phone'))?>;
    if (verified_phone) {
        console.log('verified_phone',verifyMessage)
        toastr.success(verifyMessage);
    }

})

$('.territory').click(function() {
    $('.selected-district').val('')
    $('.district').removeClass('active')
    let text = "@lang('labels.check_out_complete.district')";
    $('.district-txt-val').html(text)
    var t_val = $(this).data("id")
    var districts = <?= json_encode($districts)?>;
    districts.forEach(function(item) {
        if (item.territory_id != t_val) {
            $('.district_name' + item.id).addClass('hidden')
        } else {
            $('.district_name' + item.id).removeClass('hidden')
        }
    })
})

// $('.district').click(function() {
//     var d_val = $(this).data("id")
//     var areas = <?= json_encode($areas)?>;
//     areas.forEach(function(item) {
//         if (item.district_id != d_val) {
//             $('.area_name' + item.id).addClass('hidden')
//         } else {
//             $('.area_name' + item.id).removeClass('hidden')
//         }
//     })
// })
$(document).on('click', '.me-checkout-payment-method-card-list-content .card-item', function() {

    var cardno = $(this).data('cardno');
    $('.card-number').val(cardno)

    var expired_month = $(this).data('expired');
    $('.card-expiry-month').val(expired_month)

    var cvv = $(this).data('cvv');
    $('.card-cvc').val(cvv)

    console.log("data card ", cardno, expired_month, cvv)

})

function pays(){
    var cardName = $('input[name="cardType"]:checked').val();
    // if(cardName == "other_pay"){
    //     $('.me-checkout-billing-info-container').addClass('hidden');
    // }else{
    //     $('.me-checkout-billing-info-container').removeClass('hidden');
    // }
    // console.log('cardName',cardName);
    if(cardName == "credit_pay" || cardName == "other_pay"){
        $('.book-now-btn').removeClass('hidden');
        $('#payment-request-button').addClass('hidden');
    }else{
        $('.book-now-btn').addClass('hidden');
        $('#payment-request-button').removeClass('hidden');
    }

    // console.log(cardName)
}

document.addEventListener('DOMContentLoaded', async () => {

    // 2. Create a payment request object
    var paymentRequest = stripe.paymentRequest({
        country: 'HK',
        currency: 'hkd',
        total: {
            label: 'total',
            amount: <?= $intentAmount; ?>,
        },
        requestPayerName: true,
        requestPayerEmail: true,
    });

    // 3. Create a PaymentRequestButton element
    // const elements = stripe.elements();
    const prButton = elements.create('paymentRequestButton', {
        paymentRequest: paymentRequest,
    });
    console.log('elements', paymentRequest.canMakePayment())

    // Check the availability of the Payment Request API,
    // then mount the PaymentRequestButton
    paymentRequest.canMakePayment().then(function(result) {
        console.log('result', result)
        // if(result.link == true){
        //     $('.apay').removeClass('hidden')
        //     $('.hr_line').removeClass('hidden')
        // }
        if(result.googlePay == true){
            $('.gpay').removeClass('hidden')
            // $('.hr_line').removeClass('hidden')
        }
        if(result.applePay == true){
            $('.apay').removeClass('hidden')
            // $('.hr_line').removeClass('hidden')
        }
        if (result) {
            prButton.mount('#payment-request-button');
        } else {
            document.getElementById('payment-request-button').style.display = 'none';
            addMessage(
                'Google Pay support not found. Check the pre-requisites above and ensure you are testing in a supported browser.'
            );
        }
    });

    paymentRequest.on('paymentmethod', async (e) => {
        // Make a call to the server to create a new
        // payment intent and store its client_secret.
        addMessage(`Client secret returned.`);
        let formData = $("#mainForm").serialize();
        $.ajax({
        type:'POST',
        url:"{{route('checkout.paymentIntents')}}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: formData,
        success:function(res){
        //   const stripeData = res;
        //   var stripe = Stripe(stripeData.publicKey);
          
          let {error,paymentIntent} =  stripe.confirmCardPayment(res.clientSecret, {payment_method: e.paymentMethod.id,}, {
                    handleActions: false,
                }
            ).then(function({error, paymentIntent}) {
                if(paymentIntent.status === "succeeded"){
                    window.location.href = res.checkoutComplete;
                }

                console.log('paymentIntent',paymentIntent)
                if (error) {
                    addMessage(error.message);

                    // Report to the browser that the payment failed, prompting it to
                    // re-show the payment interface, or show an error message and close
                    // the payment interface.
                    e.complete('fail');
                    return;
                }

                // Report to the browser that the confirmation was successful, prompting
                // it to close the browser payment method collection interface.
                e.complete('success');

                // Check if the PaymentIntent requires any actions and if so let Stripe.js
                // handle the flow. If using an API version older than "2019-02-11" instead
                // instead check for: `paymentIntent.status === "requires_source_action"`.

                if (paymentIntent.status === 'requires_action') {
                    // Let Stripe.js handle the rest of the payment flow.
                    let {error,paymentIntent} =  stripe.confirmCardPayment(clientSecret);
                    if (error) {
                        // The payment failed -- ask your customer for a new payment method.
                        addMessage(error.message);
                        return;
                    }
                    addMessage(`Payment ${paymentIntent.status}: ${paymentIntent.id}`);
                }
                addMessage(`Payment ${paymentIntent.status}: ${paymentIntent.id}`);

            });

          
        }
      })
        
    });

});

const addMessage = (message) => {
  const messagesDiv = document.querySelector('#messages');
  messagesDiv.style.display = 'block';
  const messageWithLinks = addDashboardLinks(message);
  messagesDiv.innerHTML += ` ${messageWithLinks}<br>`;
  console.log(`Debug: ${message}`);
};

// Adds links for known Stripe objects to the Stripe dashboard.
const addDashboardLinks = (message) => {
  const piDashboardBase = 'https://dashboard.stripe.com/test/payments';
  return message.replace(
    /(pi_(\S*)\b)/g,
    `<a href="${piDashboardBase}/$1" target="_blank">$1</a>`
  );
};
</script>
@endpush

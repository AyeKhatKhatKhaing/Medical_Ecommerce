<div component-name="me-checkout-step" class="me-checkout-step-container xl:mt-[60px] mt-10 mx-auto">
    <div class="me-checkout-step-content max-w-[1360px] flex justify-between mx-auto">
        <div class="me-checkout-step-content-circle relative w-1/2 last:w-auto">
            <div class="3xs:min-w-[125px] min-w-[80px] mx-auto inline-block cursor-pointer">
                @if(isset($offlinePaymentStatus) && $offlinePaymentStatus==true)
                <a href="{{route('checkout.init')}}">
                    <div class="w-6 h-6 rounded-full step-circle mx-auto active">
                        <p
                            class="z-[1] font-normal me-body-14 text-white flex justify-center items-center h-full w-full text-center">
                            1</p>
                    </div>
                    <div class="mt-2">
                        <p class="font-normal me-body-16 text-center text-lightgray label">@lang('labels.check_out.select_items')</p>
                    </div>
                </a>
                @else
                <a href="javascript:void(0)">
                    <div class="w-6 h-6 rounded-full step-circle mx-auto active">
                        <p
                            class="z-[1] font-normal me-body-14 text-white flex justify-center items-center h-full w-full text-center">
                            1</p>
                    </div>
                    <div class="mt-2">
                        <p class="font-normal me-body-16 text-center text-lightgray label">@lang('labels.check_out.select_items')</p>
                    </div>
                </a>
                @endif
            </div>
        </div>

        <div class="me-checkout-step-content-circle relative w-1/2 last:w-auto">
            <div class="3xs:min-w-[125px] min-w-[80px] mx-auto inline-block cursor-pointer">
                @if(isset($offlinePaymentStatus) && $offlinePaymentStatus==true)
                <a
                    href="{{Route::current()->getName() == 'checkout.info' ? 'javascript:void(0)' : langlink('checkout/enter-information?is_info='.session()->get('is_info')) }}">
                    <div class="w-6 h-6 rounded-full step-circle mx-auto active">
                        <p
                            class="z-[1] font-normal me-body-14 text-white flex justify-center items-center h-full w-full text-center">
                            2</p>
                    </div>
                    <div class="mt-2">
                        <p class="font-normal me-body-16 text-center text-lightgray label">@lang('labels.check_out.enter_information')</p>
                    </div>
                </a>
                @else
                <a href="javascript:void(0)">
                    <div class="w-6 h-6 rounded-full step-circle mx-auto active">
                        <p
                            class="z-[1] font-normal me-body-14 text-white flex justify-center items-center h-full w-full text-center">
                            2</p>
                    </div>
                    <div class="mt-2">
                        <p class="font-normal me-body-16 text-center text-lightgray label">@lang('labels.check_out.enter_information')</p>
                    </div>
                </a>
                @endif
            </div>
        </div>

        <div class="me-checkout-step-content-circle relative w-1/2 last:w-auto">
            <div class="3xs:min-w-[125px] min-w-[80px] mx-auto inline-block cursor-pointer">
                <a href="javascript:void(0)">
                    <div class="w-6 h-6 rounded-full step-circle mx-auto {{Route::current()->getName() == 'checkout.payment' ? 'active' : '' }}">
                        <p
                            class="z-[1] font-normal me-body-14 text-white flex justify-center items-center h-full w-full text-center">
                            3</p>
                    </div>
                    <div class="mt-2">
                        <p class="font-normal me-body-16 text-center text-lightgray label">@lang('labels.header.checkout')</p>
                    </div>
                </a>
            </div>
        </div>

    </div>
</div>
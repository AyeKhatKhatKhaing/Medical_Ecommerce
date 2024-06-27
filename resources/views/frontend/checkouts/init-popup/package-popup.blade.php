<div id="me-checkout-packages-popup"
    class="hidden me-checkout-packages-popup me-checkout-packages-popup-receipientData{{$recipient->id}}">
    <div
        class="me-checkout-packages-popup-content px-5 lg:py-10 py-5 rounded-[12px] xl:min-w-[1060px] max-w-[1060px] min-w-[90%] max-h-[80%] overflow-y-auto">
        <div class="relative w-full">
            <button data-id="receipientData{{$recipient->id}}"
                class="z-[1] absolute top-0 right-0 focus-visible:outline-none focus:outline-none p-1"
                id="me-checkout-packages-popup-close-btn"><img
                    class=" w-auto h-auto align-middle"
                    src="{{asset('frontend/img/close-btn.png')}}" alt=""></button>
            <input type="hidden" class="packages-selected-id" />
            <div>
                <div class="flex flex-wrap items-center">
                    <h3
                        class="font-bold me-body-20 text-darkgray text-left">
                        {{__('labels.select_packages')}}</h3>
                    <!-- <span
                        class="me-body18 font-normal text-darkgray text-left">(0/7
                        selected)</span> -->
                </div>
                <div class="mr-6 flex items-center mt-4 ">
                    <p class="font-normal me-body-16 text-darkgray"> {{__('labels.how_to_choose_package')}} </p>  
                    <button type="button" role="button" class="plan-tooltip-btn">
                        <div class="w-auto h-auto align-middle">
                            <svg width="20" height="20" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.492 6.91C8.46974 6.78705 8.40225 6.6769 8.30283 6.60122C8.20341 6.52554 8.07926 6.48983 7.95482 6.50112C7.83039 6.51241 7.71469 6.56988 7.63051 6.66222C7.54633 6.75455 7.49977 6.87505 7.5 7V11.502L7.508 11.592C7.53026 11.7149 7.59775 11.8251 7.69717 11.9008C7.79659 11.9765 7.92074 12.0122 8.04518 12.0009C8.16961 11.9896 8.28531 11.9321 8.36949 11.8398C8.45367 11.7475 8.50023 11.6269 8.5 11.502V7L8.492 6.91ZM8.799 4.75C8.799 4.55109 8.71998 4.36032 8.57933 4.21967C8.43868 4.07902 8.24791 4 8.049 4C7.85009 4 7.65932 4.07902 7.51867 4.21967C7.37802 4.36032 7.299 4.55109 7.299 4.75C7.299 4.94891 7.37802 5.13968 7.51867 5.28033C7.65932 5.42098 7.85009 5.5 8.049 5.5C8.24791 5.5 8.43868 5.42098 8.57933 5.28033C8.71998 5.13968 8.799 4.94891 8.799 4.75ZM16 8C16 5.87827 15.1571 3.84344 13.6569 2.34315C12.1566 0.842855 10.1217 0 8 0C5.87827 0 3.84344 0.842855 2.34315 2.34315C0.842855 3.84344 0 5.87827 0 8C0 10.1217 0.842855 12.1566 2.34315 13.6569C3.84344 15.1571 5.87827 16 8 16C10.1217 16 12.1566 15.1571 13.6569 13.6569C15.1571 12.1566 16 10.1217 16 8ZM1 8C1 7.08075 1.18106 6.1705 1.53284 5.32122C1.88463 4.47194 2.40024 3.70026 3.05025 3.05025C3.70026 2.40024 4.47194 1.88463 5.32122 1.53284C6.1705 1.18106 7.08075 1 8 1C8.91925 1 9.8295 1.18106 10.6788 1.53284C11.5281 1.88463 12.2997 2.40024 12.9497 3.05025C13.5998 3.70026 14.1154 4.47194 14.4672 5.32122C14.8189 6.1705 15 7.08075 15 8C15 9.85652 14.2625 11.637 12.9497 12.9497C11.637 14.2625 9.85652 15 8 15C6.14348 15 4.36301 14.2625 3.05025 12.9497C1.7375 11.637 1 9.85652 1 8Z" fill="#333333"></path>
                            </svg>
                        </div>

                        <div class="plan-tooltip">
                        {!! langbind($recipient->product,'package_reminder') !!}

                        </div>
                    </button>
                </div>
                <div class="mt-3">
                    <ul class="flex flex-wrap">
                        @if(count($recipient->product->productsVariations) > 0)
                        @foreach($recipient->product->productsVariations as $item)
                        @php 
                        $disPrice = isset($item->promotion_price) ? $item->promotion_price : (isset($item->discount_price) ?
                        $item->discount_price : '');
                        @endphp
                        <li data-value="{{$item->id}}" data-text="packages{{$item->id}}"
                            class="me-body-16 flex items-center h-[36px] cursor-pointer mr-[10px] mb-[10px] me-body-16 font-normal text-darkgray">
                            <label
                                class="cursor-pointer relative inline-block h-[36px] "
                                for="package-id-1-receipientData{{$recipient->id}}">
                                <input data-discount="${{ $disPrice != "" || $disPrice != null ? number_format($disPrice) : ''}}"
                                    data-price="${{number_format($item->original_price)}}"
                                    data-text="{{ langbind($item,'name')}}" 
                                    type="radio"
                                    class="cursor-pointer absolute opacity-0 w-full h-full"
                                    name="package-id-receipientData{{$recipient->id}}"
                                    id="package-id-{{$item->id}}-receipientData{{$recipient->id}}"
                                    value="{{$item->id}}" {{$recipient->variable_id == $item->id ? 'checked' : ''}}/>
                                <span
                                    class="cursor-pointer h-[36px] flex items-center custom-package-radio w-full px-4 rounded-[4px] whitespace-nowrap text-ellipsis border-1 border-darkgray">{{langbind($item,'name')}}</span>
                            </label>
                        </li>
                        @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <div
                class="flex xs:flex-row flex-col justify-between xs:items-center mt-3 lg:mt-5">
                <div
                    class="form-group me-body18 text-left packages-decideLater-div">
                    <!-- <label for="packages-decideLater"
                        class="custom-radio-container inline-block relative">
                        <input type="radio" name="packages-decide-later"
                            id="packages-decideLater"
                            class="opacity-0 absolute">
                        <span class="custom-radio-orange"></span>
                        <span class="ml-[30px]">Decide later</span>
                    </label> -->
                </div>
                <form action="" id="updatePackageForm{{$recipient->id}}">
                    <div class="hidden">
                        <input data-id="receipientData{{$recipient->id}}" value="{{isset($recipient->variable_product) ? langbind($recipient->variable_product,'name') : ''}}"
                            type="hidden"
                            class="packages-items packages-items-receipientData{{$recipient->id}}" />
                        <input data-id="receipientData{{$recipient->id}}" value="{{$recipient->id}}" type="hidden"
                            class="packages-items-id packages-items-id-receipientData{{$recipient->id}}" />
                        <input type="hidden" name="recipient_id" value="{{$recipient->id}}">
                        <input type="hidden" name="variable_id" value="{{$recipient->variable_id}}">
                        <input data-id="receipientData{{$recipient->id}}" value="{{$exist_product_price != null ? number_format($exist_product_price) : number_format($recipient->variable_product->original_price)}}" type="hidden"
                            class="packages-items-price packages-items-price-receipientData{{$recipient->id}}" />
                        {{-- <input data-id="receipientData{{$recipient->id}}" value="{{$exist_product_price != null ? number_format($exist_product_price) : number_format($recipient->variable_product->original_price)}}" type="hidden"
                            class="packages-items-discountprice packages-items-discountprice-receipientData{{$recipient->id}}" /> --}}
                    </div> 
                    <button data-parentid="1" data-id="receipientData{{$recipient->id}}" onclick="submitPackage({{$recipient->id}})"
                        type="button" role="button"
                        class="me-body-18 xs:mt-0 mt-2 checkout-packages-confirm text-light bg-orangeMediq rounded-md font-bold py-2 px-10 sm:py-[10px] max-w-[300px] xl:px-0 xl:w-[300px] hover:bg-brightOrangeMediq transition-colors duration-300">
                        Confirm
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
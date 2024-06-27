<section class="location" id="location">
    <div component-name="me-location" class="me-location">
        <div class="plan-option-container text-darkgray py-6 md:flex justify-between">
            <div
                class="plan-option-content md:w-full md:max-w-[70%] md:mr-4 lg:max-w-[39.063rem] xl:max-w-[46.75rem] 2xl:max-w-[51.5rem] 3xl:max-w-[55.75rem] 4xl:max-w-[71.25rem]  4xl:mr-10">
                <div class="mb-[20px]">
                    <h3 class="helvetica-normal text-darkgray font-bold me-body28 mb-[32px]">@lang('labels.product_detail.location')</h3>
                    @if ((isset($product->merchant) && count($product->merchant->merchantLocations) != 1) || count($product->merchant->merchantLocations) != 0)
                    <p class="helvetica-normal text-darkgray font-normal me-body18">
                
                        {{-- {{ count($product->merchant->merchantLocations) }}
                        @if(count($product->merchant->merchantLocations) > 0)   @lang('labels.product_detail.s_locations') @else @lang('labels.product_detail.s_location_text2') @endif  @lang('labels.product_detail.of')
                        {{langbind($product->merchant,'name')}} --}}
                       
                        @if (app()->getLocale() == 'en')
                            {{ count($product->merchant->merchantLocations) }}  @if(count($product->merchant->merchantLocations) > 0)  locations @else locations @endif  of
                            {{langbind($product->merchant,'name')}} 

                        @elseif(app()->getLocale() == 'zh-cn')
                            {{ count($product->merchant->merchantLocations) }} 
                            {{langbind($product->merchant,'name')}}  地点
                        @else
                            {{ count($product->merchant->merchantLocations) }} 
                            {{langbind($product->merchant,'name')}}  地點
                        @endif

                    {{-- @endif --}}
                    </p>
                    @endif
                </div>
                @if (isset($product->merchant) && count($product->merchant->merchantLocations) > 0)
                    <div class="relative melo">
                        <div class="absolute top-0 left-0 w-full">
                            <div class="flex relative items-stretch">
                                <div class="h-full melo-container flex flex-col max-w-[280px] w-full md:mr-4 mr-2">
                                    <div class="bg-whitez melo-upper-container h-full">
                                        <ul class="melo-lists max-h-full overflow-y-auto">
                                            @foreach ($product->merchant->merchantLocations as $key => $location)
                                                <li class="helvetica-normal me-body18 font-bold text-darkgray p-[10px] xl:p-[20px] flex items-center justify-start melo-list-item cursor-pointer"
                                                    data-address="{{ langbind($location, 'full_address') }}"
                                                    data-image="{{ asset('frontend/img/me-medical-main.png') }}"
                                                    data-title="Mobile Medical and Health Check Centre Limited"
                                                    data-lat="{{ $location->latitude }}"
                                                    data-long="{{ $location->longitude }}" id="click_map{{ $key }}"
                                                    data-title2="{{ langbind($location, 'station_name') }}"
                                                    data-marker="{{ asset('frontend/img/code-icon.svg') }}">
                                                    {{ langbind($location->area, 'name') }} </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="melo-des mt-auto p-[20px] flex items-center justify-start">
                                        <div class="w-[24px]">
                                            <img src="{{ asset('frontend/img/me-hlocation-icon.svg') }}"
                                                alt="location icon" />
                                        </div>
                                        <p class="melo-address flex-1 helvetica-normal me-body14 text-darkgray">
                                            {{ langbind($product->merchant->merchantLocations[0], 'full_address') }}
                                        </p>
                                    </div>
                                    <div class="jordan-exit bg-whitez px-[20px] pb-[10px]">
                                        {{-- <p class="title2 helvetica-normal me-body16">
                                            <img src="{{asset('frontend/img/code-icon.svg')}}"
                                            alt="marker icon" class="w-[16px] inline-block mr-[8px]"><span
                                            class="text-[#9D2034]">{{ langbind($location->area, 'station_name') }}</span>
                                        </p> --}}
                                    </div>
                            </div>    
                                </div>
                                {{-- <div class="w-full h-[400px] relative">
                                    <div class="triangle flex justify-start items-center relative bg-whitez z-[1] w-[358px] rounded-[8px] absolute top-[11%] left-[6.8rem]" style="background: transparent">
                                        <img src="./img/me-medical-main.png" alt="image"
                                            class="sm:w-[80px] sm:h-[80px] w-[40px] h-[40px] name-image mr-[12px]" />
                                        <div class="name-section py-[10px]">
                                            <h6
                                                class="title w-full max-w-[258px] helvetica-normal me-body16 text-darkgray leading-tight">
                                                Mobile Medical and Health Check Centre Limited</h6>
                                            <p class="title2 helvetica-normal me-body16"><img src="./img/code-icon.svg"
                                                    alt="marker icon" class="w-[16px] inline-block mr-[8px]"><span
                                                    class="text-[#9D2034]">Jorden Exit B</span></p>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <div id="gmap" class="iframe-shadow" style="height:400px"></div>
                    </div>
                @endif
            </div>
            <aside
                class="plan-option-sidebar hidden md:block md:w-[44%] xl:w-[44.5%] 2xl:w-[42%] 3xl:w-[39.5%] 5xl:w-[40%] 7xl:w-[30%] mt-[86px] lg:mt-24 4xl:mt-[109px]">
            </aside>
        </div>

    </div>
</section>


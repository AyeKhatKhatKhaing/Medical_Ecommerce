<div id="planOptTabContainer"
    class="plan-option-tabs p-5 lg:py-10 4xl:px-10 rounded-xl border-solid border-mee4 shadow-[0px_4px_15px_2px_rgba(0,0,0,0.1)] mt-3">
    <div id="planOptTabs">
        @if ($product->is_two_recipient == false)
            <div class="plan-option-tab plan-option-active" id="recipient1">
                <input type="hidden" name="recipient-1" value="recipient" id="recipient-1" class="recipient-field">
                <article>
                    {!! langbind($product,'recipient_content') !!}
                </article>
                @if(count($product->productsVariations) > 0 && $product->productsVariations[0]->sku != null)
                @php 
                $vproduct = getLowestPrice($product);
                @endphp 
                
                <article class="mt-6">
                    <h3 class="font-bold me-body20">{{__('labels.package')}} <span class="font-normal me-body18"></span></h3>

                    <div class="flex items-center me-body16 my-3">
                        <div class="plan-tooltip-container relative flex items-center mr-5 lg:mr-6">
                        <span class="mr-[6px]">{{__('labels.how_to_choose_package')}}</span> 
                        <button type="button" role="button" class="plan-tooltip-btn" >
                            <div class="w-auto h-auto align-middle">
                            <img src="{{asset('/frontend/img/Vector-13.png')}}" alt="infomation" class="w-4 md:w-5 align-middle object-center object-cover" />
                            </div>
                            <div class="plan-tooltip select-text">
                                
                                <p class="me-body16">
                                    {!! langbind($product,'package_reminder') !!}
                                </p>
                                
                            </div>
                            
                            
                        </button>
                        </div>
                    </div>

                    <div class="form-group me-body16">
                        @foreach($product->productsVariations as $key => $package)
                        @php 
                            $prodDis = isset($package->promotion_price) ? $package->promotion_price : (isset($package->discount_price) ? $package->discount_price : '');
                        @endphp
                        <label for="y-chromosome-test{{$package->id}}" class="custom-radio-container mr-1 last:mr-0 lg:mr-2 lg:last:mr-0 mb-1 last:mb-0 lg:mb-2 lg:last:mb-0">
                        <input type="radio" name="product-package-1" id="y-chromosome-test{{$package->id}}" value="{{$package->id}}" data-discount="{{$prodDis != null ? $prodDis : 0}}" data-price="{{ $package->original_price }}" class="select-package"  
                        {{$vproduct->id == $package->id ? 'checked' : ''}}>
                        <span class="custom-radio-btn rounded py-[7px] px-4 outlined-btn-hover flex items-center">
                            <span class="mr-1 lg:mr-2">{{ langbind($package,'name') }}</span>
                        </span>
                        </label>
                        @endforeach
                    </div>
                </article>
                @endif
                <article>
                    <h3 class="font-bold me-body20">@lang('labels.product_detail.select_time')</h3>
                    <div class="flex items-center flex-wrap me-body16 mt-3">
                    @if (count($timeSlots) > 0)
                        @foreach ($timeSlots as $item)
                            <div
                                class="plan-tooltip-container relative flex items-center mr-5 lg:mr-6">
                                <span class="mr-[6px]">{{ langbind($item, 'name') }}</span>
                                <button type="button" class="plan-tooltip-btn">
                                <img src="{{asset('/frontend/img/Vector-13.png')}}" alt="infomation" class="w-4 md:w-5 align-middle object-center object-cover" />
                                    <div class="plan-tooltip select-text me-body16 text-darkgray">
                                        {!! langbind($item, 'remind_notice') !!}
                                    </div>

                                </button>
                            </div>
                        @endforeach
                    @endif
                    </div>
                    <div class="choose-time relative mt-3">
                        <button type="button" role="button" id="openChooseTime-1" data-id="1"
                            class="open-choose-time flex justify-center bg-orangeMediq text-light font-bold me-body18 py-3 px-5 rounded-md hover:bg-brightOrangeMediq"
                            onclick="openChooseTimeDialog(event, '1')">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
  <path d="M14.6667 11.6667C14.8877 11.6667 15.0996 11.5789 15.2559 11.4226C15.4122 11.2663 15.5 11.0543 15.5 10.8333C15.5 10.6123 15.4122 10.4004 15.2559 10.2441C15.0996 10.0878 14.8877 10 14.6667 10C14.4457 10 14.2337 10.0878 14.0774 10.2441C13.9211 10.4004 13.8333 10.6123 13.8333 10.8333C13.8333 11.0543 13.9211 11.2663 14.0774 11.4226C14.2337 11.5789 14.4457 11.6667 14.6667 11.6667ZM14.6667 15C14.8877 15 15.0996 14.9122 15.2559 14.7559C15.4122 14.5996 15.5 14.3877 15.5 14.1667C15.5 13.9457 15.4122 13.7337 15.2559 13.5774C15.0996 13.4211 14.8877 13.3333 14.6667 13.3333C14.4457 13.3333 14.2337 13.4211 14.0774 13.5774C13.9211 13.7337 13.8333 13.9457 13.8333 14.1667C13.8333 14.3877 13.9211 14.5996 14.0774 14.7559C14.2337 14.9122 14.4457 15 14.6667 15ZM11.3333 10.8333C11.3333 11.0543 11.2455 11.2663 11.0893 11.4226C10.933 11.5789 10.721 11.6667 10.5 11.6667C10.279 11.6667 10.067 11.5789 9.91074 11.4226C9.75446 11.2663 9.66667 11.0543 9.66667 10.8333C9.66667 10.6123 9.75446 10.4004 9.91074 10.2441C10.067 10.0878 10.279 10 10.5 10C10.721 10 10.933 10.0878 11.0893 10.2441C11.2455 10.4004 11.3333 10.6123 11.3333 10.8333ZM11.3333 14.1667C11.3333 14.3877 11.2455 14.5996 11.0893 14.7559C10.933 14.9122 10.721 15 10.5 15C10.279 15 10.067 14.9122 9.91074 14.7559C9.75446 14.5996 9.66667 14.3877 9.66667 14.1667C9.66667 13.9457 9.75446 13.7337 9.91074 13.5774C10.067 13.4211 10.279 13.3333 10.5 13.3333C10.721 13.3333 10.933 13.4211 11.0893 13.5774C11.2455 13.7337 11.3333 13.9457 11.3333 14.1667ZM6.33333 11.6667C6.55435 11.6667 6.76631 11.5789 6.92259 11.4226C7.07887 11.2663 7.16667 11.0543 7.16667 10.8333C7.16667 10.6123 7.07887 10.4004 6.92259 10.2441C6.76631 10.0878 6.55435 10 6.33333 10C6.11232 10 5.90036 10.0878 5.74408 10.2441C5.5878 10.4004 5.5 10.6123 5.5 10.8333C5.5 11.0543 5.5878 11.2663 5.74408 11.4226C5.90036 11.5789 6.11232 11.6667 6.33333 11.6667ZM6.33333 15C6.55435 15 6.76631 14.9122 6.92259 14.7559C7.07887 14.5996 7.16667 14.3877 7.16667 14.1667C7.16667 13.9457 7.07887 13.7337 6.92259 13.5774C6.76631 13.4211 6.55435 13.3333 6.33333 13.3333C6.11232 13.3333 5.90036 13.4211 5.74408 13.5774C5.5878 13.7337 5.5 13.9457 5.5 14.1667C5.5 14.3877 5.5878 14.5996 5.74408 14.7559C5.90036 14.9122 6.11232 15 6.33333 15Z" fill="white"/>
  <path fill-rule="evenodd" clip-rule="evenodd" d="M6.33464 1.45837C6.5004 1.45837 6.65937 1.52422 6.77658 1.64143C6.89379 1.75864 6.95964 1.91761 6.95964 2.08337V2.71921C7.5113 2.70837 8.1188 2.70837 8.78714 2.70837H12.2146C12.8838 2.70837 13.4913 2.70837 14.043 2.71921V2.08337C14.043 1.91761 14.1088 1.75864 14.226 1.64143C14.3432 1.52422 14.5022 1.45837 14.668 1.45837C14.8337 1.45837 14.9927 1.52422 15.1099 1.64143C15.2271 1.75864 15.293 1.91761 15.293 2.08337V2.77254C15.5096 2.78921 15.7146 2.81004 15.9088 2.83587C16.8855 2.96754 17.6763 3.24421 18.3005 3.86754C18.9238 4.49171 19.2005 5.28254 19.3321 6.25921C19.4596 7.20921 19.4596 8.42171 19.4596 9.95337V11.7134C19.4596 13.245 19.4596 14.4584 19.3321 15.4075C19.2005 16.3842 18.9238 17.175 18.3005 17.7992C17.6763 18.4225 16.8855 18.6992 15.9088 18.8309C14.9588 18.9584 13.7463 18.9584 12.2146 18.9584H8.78797C7.2563 18.9584 6.04297 18.9584 5.0938 18.8309C4.11714 18.6992 3.3263 18.4225 2.70214 17.7992C2.0788 17.175 1.80214 16.3842 1.67047 15.4075C1.54297 14.4575 1.54297 13.245 1.54297 11.7134V9.95337C1.54297 8.42171 1.54297 7.20837 1.67047 6.25921C1.80214 5.28254 2.0788 4.49171 2.70214 3.86754C3.3263 3.24421 4.11714 2.96754 5.0938 2.83587C5.28797 2.81004 5.4938 2.78921 5.70964 2.77254V2.08337C5.70964 1.91761 5.77548 1.75864 5.89269 1.64143C6.0099 1.52422 6.16888 1.45837 6.33464 1.45837ZM5.25964 4.07504C4.42214 4.18754 3.9388 4.39921 3.5863 4.75171C3.2338 5.10421 3.02214 5.58754 2.90964 6.42587C2.89047 6.56754 2.87464 6.71754 2.8613 6.87504H18.1413C18.128 6.71671 18.1121 6.56754 18.093 6.42504C17.9805 5.58754 17.7688 5.10421 17.4163 4.75171C17.0638 4.39921 16.5805 4.18754 15.7421 4.07504C14.8863 3.96004 13.7571 3.95837 12.168 3.95837H8.83464C7.24547 3.95837 6.11714 3.96004 5.25964 4.07504ZM2.79297 10C2.79297 9.28837 2.79297 8.66921 2.8038 8.12504H18.1988C18.2096 8.66921 18.2096 9.28837 18.2096 10V11.6667C18.2096 13.2559 18.208 14.385 18.093 15.2417C17.9805 16.0792 17.7688 16.5625 17.4163 16.915C17.0638 17.2675 16.5805 17.4792 15.7421 17.5917C14.8863 17.7067 13.7571 17.7084 12.168 17.7084H8.83464C7.24547 17.7084 6.11714 17.7067 5.25964 17.5917C4.42214 17.4792 3.9388 17.2675 3.5863 16.915C3.2338 16.5625 3.02214 16.0792 2.90964 15.2409C2.79464 14.385 2.79297 13.2559 2.79297 11.6667V10Z" fill="white"/>
</svg>
                            </span>
                            <span class="btn-text ml-1 lg:ml-2">@lang('labels.product_detail.choose_time')</span>
                        </button>
                        <input type="hidden" name="merchant-area-1" id="merchant-area-1" class="planopt-booking-feild" value="">
                        <input type="hidden" name="booking-date-1" id="booking-date-1" class="planopt-booking-feild" value="">
                        <input type="hidden" name="selected-bookingtime-1" id="selected-bookingtime-1" class="planopt-booking-feild" value="">
                        <div id="chooseTimeDialog-1"
                            class="choose-time-dialog hidden me-body18 absolute top-14 bg-light z-[3] md:border md:border-solid md:border-mee4 rounded-lg md:rounded-[20px] shadow-[0px_4px_15px_2px_rgba(0,0,0,0.1)] py-5 md:w-[43.75rem] lg:w-[52.5rem] xl:w-[66.25rem]">
                            <div class="choose-time-container sm:flex w-full sm:justify-between">
                                <div
                                    class="choose-time-loc custom-scrollbar-rounded-gray overflow-y-auto max-h-28 sm:max-h-60 md:w-40 lg:w-60 xl:w-80 lg:max-h-[260px]">
                                    <ul class="select-branch" id="select-branch-1">
                                    </ul>
                                </div>
                                <div
                                    class="choose-time-picker px-2 2xs:px-5 mt-4 sm:mt-0 max-w-[24.375rem] flex-1">
                                    <div id='calendar-1' class="h-full choose-time-calendar me-body16">
                                    </div>
                                </div>
                                <div
                                    class="choose-time-selected px-2 2xs:px-5 mt-4 sm:mt-0 sm:pl-0 lg:w-56 xl:w-72">
                                    <div id="displaySelectedDate-1" class="font-bold">
                                        {{__('labels.product_detail.pls_select_booking_date')}}
                                    </div>
                                    <input type="hidden" name="selectedDate-1" id="selectedDate-1"
                                        value="">
                                    <div class="form-group mt-4 sm:mt-5 max-h-80 overflow-y-auto custom-scrollbar-rounded-gray booking-time-container"
                                        id="booking-time-1">
                                    </div>
                                </div>
                            </div>
                            <div
                                class="choose-time-address flex px-2 2xs:px-5 items-center mt-4 max-w-xs me-body18">
                                <span><img src="{{ asset('frontend/img/uicons_location.png') }}"
                                        alt="" class="w-auto h-auto align-middle mr-1"></span>
                                <span id="branch-address-1">11/F., JD Mall, 233-239 Nathan Road,
                                    Jordan</span>
                            </div>
                            <div class="px-2 2xs:px-5">
                                <hr class="w-full my-5 border-mee4">
                            </div>
                            <div class="flex px-2 2xs:px-5 justify-between items-center">
                                <div class="form-group me-body18">
                                    <label for="decideLater-1" class="custom-checkbox-container">
                                        <input type="checkbox" name="preferred-time-decide-later-1"
                                            id="decideLater-1" class="decide-later-datetime" data-id="1">
                                        <span class="custom-checkbox-orange"></span>
                                        <span class="ml-5 xl:ml-6 4xl:ml-[30px]">@lang('labels.product_detail.decide_later')</span>
                                    </label>
                                </div>
                                <button id="date-confirm-1" data-id="1" type="button"
                                    role="button"
                                    class="date-confirm text-light bg-orangeMediq rounded-md font-bold py-2 px-10 sm:py-[10px] max-w-[300px] xl:px-0 xl:w-[300px] hover:bg-brightOrangeMediq transition-colors duration-300">
                                    @lang('labels.log_in_register.confirm')
                                </button>
                            </div>
                        </div>
                    </div>
                </article>
                
                    @if (count($optionGroups) > 0)
                        @foreach ($optionGroups as $gkey => $group)
                            
                            @php
                                $tablePriIds = App\Models\CheckUpTableType::where('check_up_type_id', 2)
                                    ->where('check_up_table_id', $checkuptable->id)
                                    ->pluck('id')
                                    ->toArray();
                                $optionGroupIds = App\Models\CheckTableItem::where('check_up_group_id', $group->id)
                                    ->whereIn('check_up_table_type_id', $tablePriIds)
                                    ->distinct()
                                    ->pluck('check_up_item_id')
                                    ->toArray();
                                $tableItems = App\Models\CheckUpItem::whereIn('id', $optionGroupIds)->get();
                            @endphp
                            @if (count($optionGroupIds) > 0)
                            <article class="mt-6">
                                @if(lang() == 'en')
                                <h3 class="font-bold me-body20">@lang('labels.check_out.select_free')
                                    {{ langbind($group, 'name') }} <span class="font-normal me-body18">(<span id="cancer-marker-qty{{ $group->id }}-1" data-qty="0" class="selected-plan-qty">0</span> @lang('labels.check_out.selected'))</span>
                                </h3>
                                @else
                                <h3 class="font-bold me-body20">@lang('labels.check_out.select_free')
                                    {{ langbind($group, 'name') }} <span class="font-normal me-body18">(@lang('labels.check_out.selected')<span id="cancer-marker-qty{{ $group->id }}-1" data-qty="0" class="selected-plan-qty">0</span>{{__('labels.product_detail.items')}})</span>
                                </h3>
                                @endif
                                
                                <div class="flex items-center me-body16 my-3">
                                    <div
                                        class="plan-tooltip-container relative mr-5 lg:mr-6">
                                            @lang('labels.check_out.how_to_choose') {{ langbind($group, 'name') }}?
                                        <button type="button" role="button" class="plan-tooltip-btn ml-[6px] align-middle inline-block">
                                            <img src="{{asset('/frontend/img/Vector-13.png')}}" alt="infomation" class="w-4 md:w-5 align-middle object-center object-cover" />

                                            <div class="plan-tooltip select-text">
                                                <p class="me-body16">
                                                    {{__('labels.basic_info.please_select')}} {{$group->minimum_item}} {{__('labels.check_out.items')}}
                                                </p>

                                            </div>


                                        </button>
                                    </div>
                                </div>
                                <div class="form-group plan-group me-body16" data-group="decide{{ $group->id }}-1">
                                    @foreach ($tableItems as $ikey => $tableItem)
                                        <label
                                            for="check_up_item{{ $group->id }}{{ $tableItem->id }}"
                                            class="custom-checkbox-container mr-1 last:mr-0 lg:mr-2 lg:last:mr-0 mb-1 lg:mb-2 6xl:mb-[10px]">
                                            <input type="checkbox" name="check_up_item-1[]"
                                                id="check_up_item{{ $group->id }}{{ $tableItem->id }}" data-qty="{{$tableItem->equivalent_number}}" data-max="{{$group->minimum_item}}"
                                                data-qtyelem="cancer-marker-qty{{ $group->id }}-1" value="{{ $group->id }},{{ $tableItem->id }}" class="select-plan select-opt-handler"/>
                                            <span
                                                class="custom-checkbox-btn rounded py-[7px] px-4 outlined-btn-hover !inline-block">
                                                <span
                                                    class="mr-1 lg:mr-2">{{ langbind($tableItem, 'name') }}</span>
                                                @if ($tableItem->gender == 0)
                                                    <img src="{{ asset('frontend/img/male-gen.svg') }}"
                                                        alt="male" class="gen-icon inline-block" />
                                                @elseif($tableItem->gender == 1)
                                                    <img src="{{ asset('frontend/img/female-gen.svg') }}"
                                                        alt="female" class="gen-icon inline-block" />
                                                @endif
                                            </span>
                                        </label>
                                    @endforeach
                                </div>
                                <input type="hidden" name="group_id-1[]" id="group_id{{$group->id}}-1"
                                    value="{{ $group->id }}">
                                <div class="form-group me-body18 mt-2 6xl:mt-[10px]">
                                    <label for="decide{{ $group->id }}-1"
                                        class="custom-checkbox-container">
                                        <input type="checkbox" name="decide{{ $group->id }}-1"
                                            id="decide{{ $group->id }}-1" class="decide-later select-opt-handler">
                                        <span class="custom-checkbox-orange"></span>
                                        <span class="ml-5 xl:ml-6 4xl:ml-[30px]">@lang('labels.product_detail.decide_later')</span>
                                    </label>
                                </div>
                            </article>
                            @endif
                        @endforeach
                    @endif

                @include('frontend.product_details.product_types.product_8')

                @if (count($product->add_on_item_data) > 0)
                <article class="mt-6">
                    <h3 class="font-bold me-body20">@lang('labels.product_detail.select_redem_option')</h3>
                    <p class="me-body16 my-3">
                        {!! langbind($product,'add_on_reminder')!!}
                    </p>
                    <div class="form-group me-body18 rounded-xl p-2 bg-far sm:p-5">
                        <ul>
                            @foreach ($product->add_on_item_data as $key => $item)
                                <li class="flex justify-between">
                                    <label for="{{ $item->name_en }}-1"
                                        class="custom-checkbox-label flex items-center mr-1 last:mr-0 lg:mr-2 lg:last:mr-0 mb-1 last:mb-0 lg:mb-2 lg:last:mb-0">
                                        <input type="checkbox" name="addd_on_items-1[]"
                                            data-discount-price="{{ isset($item->discount_price) ? $item->discount_price : $item->original_price }}"
                                            data-original-price="{{ isset($item->original_price) ? $item->original_price : 0  }}"
                                            id="{{ $item->name_en }}-1"
                                            value="{{ $item->id }}" class="add_on select-opt-handler" />
                                        <span class="custom-checkbox-orange "></span>
                                        @if($item->recommend_item == 1 || $item->recommend_item == 2)
                                        <span class="ml-5 4xl:ml-[30px] flex items-center flex-wrap font-bold">
                                            <!-- <span> -->
                                                {{ langbind($item, 'name') }}
                                                @if(langbind($item,'description') != null)
                                                <button type="button" class="plan-tooltip-btn ml-1">
                                                <img src="{{asset('/frontend/img/Vector-13.png')}}" alt="infomation" class="w-4 md:w-5 align-middle object-center object-cover" />
                                                <div class="plan-tooltip select-text me-body16 text-darkgray">
                                                    <p class="">
                                                    {!! langbind($item, 'description') !!}
                                                    </p>
                                                </div>
                                                </button>
                                                @endif
                                                
                                                @if($item->recommend_item == 1)
                                                <span class="me-body14 flex items-center ml-1"><span class="text-orangeMediq bg-orangeLight py-1 px-2 rounded mr-[2px]">
                                                    {{__('labels.product_detail.most_popular') }}
                                                </span>
                                                <img src="{{asset('frontend/img/mdi-light_thumb-up.svg')}}" alt="thumb up" class="w-[15px] mb-[5px] md:mb-0 md:w-auto object-center object-cover align-middle"></span>
                                                @elseif($item->recommend_item == 2)
                                                <span class="me-body14 flex items-center ml-1"><span class="text-orangeMediq bg-orangeLight py-1 px-2 rounded mr-[2px]">
                                                {{__('labels.product_detail.hot') }}
                                                </span>
                                                <img src="{{asset('frontend/img/ant-design_fire-filled.svg')}}" alt="thumb up" class="w-5 md:w-auto object-center object-cover align-middle">
                                                </span>
                                                @endif

                                                @isset($item->discount_price)
                                                <span class="add-on-original line-through ml-1">${{number_format($item->original_price)}}</span>
                                                @endisset

                                            <!-- </span> -->
                                        </span>
                                        @else
                                        <span
                                            class="ml-5 4xl:ml-[30px] flex items-center flex-wrap font-">
                                            {{ langbind($item, 'name') }}
                                            @if(langbind($item,'description') != null)
                                            <button type="button" class="plan-tooltip-btn ml-1">
                                            <img src="{{asset('/frontend/img/Vector-13.png')}}" alt="infomation" class="w-4 md:w-5 align-middle object-center object-cover" />
                                            <div class="plan-tooltip select-text me-body16 text-darkgray">
                                                <p class="">
                                                {!! langbind($item, 'description') !!}
                                                </p>
                                            </div>
                                            </button>
                                            @endif
                                            @isset($item->discount_price)
                                            <span class="add-on-original line-through ml-1">${{number_format($item->original_price)}}</span>
                                            @endisset
                                        </span>
                                        @endif
                                    </label>
                                    <span
                                        class="service-price text-orangeMediq font-bold me-body18">+${{ isset($item->discount_price) ? number_format($item->discount_price) : number_format($item->original_price) }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </article>
                @endif
            </div>
        @else
            <div class="plan-option-tab plan-option-active" id="recipient1">
            <input type="hidden" name="recipient-1" value="recipient" value="recipient" id="recipient-1" class="recipient-field">
                <article>
                    <h3 class="font-bold me-body20">@lang('labels.product_detail.select_time')</h3>
                    <div class="flex items-center flex-wrap me-body16 mt-3">
                    @if (count($timeSlots) > 0)
                        @foreach ($timeSlots as $item)
                            <div
                                class="plan-tooltip-container relative flex items-center mr-5 lg:mr-6">
                                <span class="mr-[6px]">{{ langbind($item, 'name') }}</span>
                                <button type="button" class="plan-tooltip-btn">
                                <img src="{{asset('/frontend/img/Vector-13.png')}}" alt="infomation" class="w-4 md:w-5 align-middle object-center object-cover" />
                                    <div class="plan-tooltip select-text me-body16 text-darkgray">
                                        {!! langbind($item, 'remind_notice') !!}
                                    </div>

                                </button>
                            </div>
                        @endforeach
                    @endif
                    </div>
                    <div class="choose-time relative mt-3">
                        <button type="button" role="button" id="openChooseTime-1" data-id="1"
                            class="open-choose-time flex justify-center bg-orangeMediq text-light font-bold me-body18 py-3 px-5 rounded-md hover:bg-brightOrangeMediq"
                            onclick="openChooseTimeDialog(event, '1')">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
  <path d="M14.6667 11.6667C14.8877 11.6667 15.0996 11.5789 15.2559 11.4226C15.4122 11.2663 15.5 11.0543 15.5 10.8333C15.5 10.6123 15.4122 10.4004 15.2559 10.2441C15.0996 10.0878 14.8877 10 14.6667 10C14.4457 10 14.2337 10.0878 14.0774 10.2441C13.9211 10.4004 13.8333 10.6123 13.8333 10.8333C13.8333 11.0543 13.9211 11.2663 14.0774 11.4226C14.2337 11.5789 14.4457 11.6667 14.6667 11.6667ZM14.6667 15C14.8877 15 15.0996 14.9122 15.2559 14.7559C15.4122 14.5996 15.5 14.3877 15.5 14.1667C15.5 13.9457 15.4122 13.7337 15.2559 13.5774C15.0996 13.4211 14.8877 13.3333 14.6667 13.3333C14.4457 13.3333 14.2337 13.4211 14.0774 13.5774C13.9211 13.7337 13.8333 13.9457 13.8333 14.1667C13.8333 14.3877 13.9211 14.5996 14.0774 14.7559C14.2337 14.9122 14.4457 15 14.6667 15ZM11.3333 10.8333C11.3333 11.0543 11.2455 11.2663 11.0893 11.4226C10.933 11.5789 10.721 11.6667 10.5 11.6667C10.279 11.6667 10.067 11.5789 9.91074 11.4226C9.75446 11.2663 9.66667 11.0543 9.66667 10.8333C9.66667 10.6123 9.75446 10.4004 9.91074 10.2441C10.067 10.0878 10.279 10 10.5 10C10.721 10 10.933 10.0878 11.0893 10.2441C11.2455 10.4004 11.3333 10.6123 11.3333 10.8333ZM11.3333 14.1667C11.3333 14.3877 11.2455 14.5996 11.0893 14.7559C10.933 14.9122 10.721 15 10.5 15C10.279 15 10.067 14.9122 9.91074 14.7559C9.75446 14.5996 9.66667 14.3877 9.66667 14.1667C9.66667 13.9457 9.75446 13.7337 9.91074 13.5774C10.067 13.4211 10.279 13.3333 10.5 13.3333C10.721 13.3333 10.933 13.4211 11.0893 13.5774C11.2455 13.7337 11.3333 13.9457 11.3333 14.1667ZM6.33333 11.6667C6.55435 11.6667 6.76631 11.5789 6.92259 11.4226C7.07887 11.2663 7.16667 11.0543 7.16667 10.8333C7.16667 10.6123 7.07887 10.4004 6.92259 10.2441C6.76631 10.0878 6.55435 10 6.33333 10C6.11232 10 5.90036 10.0878 5.74408 10.2441C5.5878 10.4004 5.5 10.6123 5.5 10.8333C5.5 11.0543 5.5878 11.2663 5.74408 11.4226C5.90036 11.5789 6.11232 11.6667 6.33333 11.6667ZM6.33333 15C6.55435 15 6.76631 14.9122 6.92259 14.7559C7.07887 14.5996 7.16667 14.3877 7.16667 14.1667C7.16667 13.9457 7.07887 13.7337 6.92259 13.5774C6.76631 13.4211 6.55435 13.3333 6.33333 13.3333C6.11232 13.3333 5.90036 13.4211 5.74408 13.5774C5.5878 13.7337 5.5 13.9457 5.5 14.1667C5.5 14.3877 5.5878 14.5996 5.74408 14.7559C5.90036 14.9122 6.11232 15 6.33333 15Z" fill="white"/>
  <path fill-rule="evenodd" clip-rule="evenodd" d="M6.33464 1.45837C6.5004 1.45837 6.65937 1.52422 6.77658 1.64143C6.89379 1.75864 6.95964 1.91761 6.95964 2.08337V2.71921C7.5113 2.70837 8.1188 2.70837 8.78714 2.70837H12.2146C12.8838 2.70837 13.4913 2.70837 14.043 2.71921V2.08337C14.043 1.91761 14.1088 1.75864 14.226 1.64143C14.3432 1.52422 14.5022 1.45837 14.668 1.45837C14.8337 1.45837 14.9927 1.52422 15.1099 1.64143C15.2271 1.75864 15.293 1.91761 15.293 2.08337V2.77254C15.5096 2.78921 15.7146 2.81004 15.9088 2.83587C16.8855 2.96754 17.6763 3.24421 18.3005 3.86754C18.9238 4.49171 19.2005 5.28254 19.3321 6.25921C19.4596 7.20921 19.4596 8.42171 19.4596 9.95337V11.7134C19.4596 13.245 19.4596 14.4584 19.3321 15.4075C19.2005 16.3842 18.9238 17.175 18.3005 17.7992C17.6763 18.4225 16.8855 18.6992 15.9088 18.8309C14.9588 18.9584 13.7463 18.9584 12.2146 18.9584H8.78797C7.2563 18.9584 6.04297 18.9584 5.0938 18.8309C4.11714 18.6992 3.3263 18.4225 2.70214 17.7992C2.0788 17.175 1.80214 16.3842 1.67047 15.4075C1.54297 14.4575 1.54297 13.245 1.54297 11.7134V9.95337C1.54297 8.42171 1.54297 7.20837 1.67047 6.25921C1.80214 5.28254 2.0788 4.49171 2.70214 3.86754C3.3263 3.24421 4.11714 2.96754 5.0938 2.83587C5.28797 2.81004 5.4938 2.78921 5.70964 2.77254V2.08337C5.70964 1.91761 5.77548 1.75864 5.89269 1.64143C6.0099 1.52422 6.16888 1.45837 6.33464 1.45837ZM5.25964 4.07504C4.42214 4.18754 3.9388 4.39921 3.5863 4.75171C3.2338 5.10421 3.02214 5.58754 2.90964 6.42587C2.89047 6.56754 2.87464 6.71754 2.8613 6.87504H18.1413C18.128 6.71671 18.1121 6.56754 18.093 6.42504C17.9805 5.58754 17.7688 5.10421 17.4163 4.75171C17.0638 4.39921 16.5805 4.18754 15.7421 4.07504C14.8863 3.96004 13.7571 3.95837 12.168 3.95837H8.83464C7.24547 3.95837 6.11714 3.96004 5.25964 4.07504ZM2.79297 10C2.79297 9.28837 2.79297 8.66921 2.8038 8.12504H18.1988C18.2096 8.66921 18.2096 9.28837 18.2096 10V11.6667C18.2096 13.2559 18.208 14.385 18.093 15.2417C17.9805 16.0792 17.7688 16.5625 17.4163 16.915C17.0638 17.2675 16.5805 17.4792 15.7421 17.5917C14.8863 17.7067 13.7571 17.7084 12.168 17.7084H8.83464C7.24547 17.7084 6.11714 17.7067 5.25964 17.5917C4.42214 17.4792 3.9388 17.2675 3.5863 16.915C3.2338 16.5625 3.02214 16.0792 2.90964 15.2409C2.79464 14.385 2.79297 13.2559 2.79297 11.6667V10Z" fill="white"/>
</svg>
                            </span>
                            <span class="btn-text ml-1 lg:ml-2">@lang('labels.product_detail.choose_time')</span>
                        </button>
                        <input type="hidden" name="merchant-area-1" id="merchant-area-1" class="planopt-booking-feild" value="">
                        <input type="hidden" name="booking-date-1" id="booking-date-1" class="planopt-booking-feild" value="">
                        <input type="hidden" name="selected-bookingtime-1" id="selected-bookingtime-1" class="planopt-booking-feild" value="">
                        <div id="chooseTimeDialog-1"
                            class="choose-time-dialog hidden me-body18 absolute top-14 bg-light z-[3] md:border md:border-solid md:border-mee4 rounded-lg md:rounded-[20px] shadow-[0px_4px_15px_2px_rgba(0,0,0,0.1)] py-5 md:w-[43.75rem] lg:w-[52.5rem] xl:w-[66.25rem]">
                            <div class="choose-time-container sm:flex w-full sm:justify-between">
                                <div
                                    class="choose-time-loc custom-scrollbar-rounded-gray overflow-y-auto max-h-28 sm:max-h-60 md:w-40 lg:w-60 xl:w-80 lg:max-h-[260px]">
                                    <ul class="select-branch" id="select-branch-1">
                                    </ul>
                                </div>
                                <div
                                    class="choose-time-picker px-2 2xs:px-5 mt-4 sm:mt-0 max-w-[24.375rem] flex-1">
                                    <div id='calendar-1'
                                        class="h-full choose-time-calendar me-body16"></div>
                                </div>
                                <div
                                    class="choose-time-selected px-2 2xs:px-5 mt-4 sm:mt-0 sm:pl-0 lg:w-56 xl:w-72">
                                    <div id="displaySelectedDate-1" class="font-bold">
                                        {{__('labels.product_detail.pls_select_booking_date')}}
                                    </div>
                                    <input type="hidden" name="selectedDate-1" id="selectedDate-1"
                                        value="">
                                    <div class="form-group mt-4 sm:mt-5 max-h-80 overflow-y-auto custom-scrollbar-rounded-gray booking-time-container"
                                        id="booking-time-1">
                                    </div>
                                </div>
                            </div>
                            <div
                                class="choose-time-address flex px-2 2xs:px-5 items-center mt-4 max-w-xs me-body18">
                                <span><img src="{{ asset('frontend/img/uicons_location.png') }}"
                                        alt="" class="w-auto h-auto align-middle mr-1"></span>
                                <span id="branch-address-1">11/F., JD Mall, 233-239 Nathan Road,
                                    Jordan</span>
                            </div>
                            <div class="px-2 2xs:px-5">
                                <hr class="w-full my-5 border-mee4">
                            </div>
                            <div class="flex px-2 2xs:px-5 justify-between items-center">
                                <div class="form-group me-body18">
                                    <label for="decideLater-1" class="custom-checkbox-container">
                                        <input type="checkbox" name="preferred-time-decide-later-1"
                                            id="decideLater-1" class="decide-later-datetime" data-id="1">
                                        <span class="custom-checkbox-orange"></span>
                                        <span class="ml-5 xl:ml-6 4xl:ml-[30px]">@lang('labels.product_detail.decide_later')</span>
                                    </label>
                                </div>
                                <button id="date-confirm-1" data-id="1" type="button"
                                    role="button"
                                    class="date-confirm text-light bg-orangeMediq rounded-md font-bold py-2 px-10 sm:py-[10px] max-w-[300px] xl:px-0 xl:w-[300px] hover:bg-brightOrangeMediq transition-colors duration-300">
                                    @lang('labels.log_in_register.confirm')
                                </button>
                            </div>
                        </div>
                    </div>
                </article>
                
                    @if (count($optionGroups) > 0)
                        @foreach ($optionGroups as $group)
                        
                            @php
                                $tablePriIds = App\Models\CheckUpTableType::where('check_up_type_id', 2)
                                    ->where('check_up_table_id', $checkuptable->id)
                                    ->pluck('id')
                                    ->toArray();
                                $optionGroupIds = App\Models\CheckTableItem::where('check_up_group_id', $group->id)
                                    ->whereIn('check_up_table_type_id', $tablePriIds)
                                    ->distinct()
                                    ->pluck('check_up_item_id')
                                    ->toArray();
                                $tableItems = App\Models\CheckUpItem::whereIn('id', $optionGroupIds)->get();
                            @endphp
                            @if (count($optionGroupIds) > 0)
                            <article class="mt-6">
                                <h3 class="font-bold me-body20">@lang('labels.check_out.select_free')
                                    {{ langbind($group, 'name') }} <span
                                        class="font-normal me-body18">(
                                        @if(lang() == 'en')
                                        {{ $group->minimum_item }}
                                        @lang('labels.check_out.selected')
                                        @else 
                                        @lang('labels.check_out.selected') {{ $group->minimum_item }} {{__('labels.product_detail.items')}}
                                        @endif
                                        )</span>
                                </h3>
                                {{-- <div class="flex items-center me-body16 my-3">
                                    <div
                                        class="plan-tooltip-container relative flex items-center mr-5 lg:mr-6">
                                        <span class="mr-[6px]">@lang('labels.check_out.how_to_choose') jjjj2
                                            {{ langbind($group, 'name') }}?</span>
                                        <button type="button" role="button"
                                            class="plan-tooltip-btn">
                                            <svg width="20" height="20" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M8.492 6.91C8.46974 6.78705 8.40225 6.6769 8.30283 6.60122C8.20341 6.52554 8.07926 6.48983 7.95482 6.50112C7.83039 6.51241 7.71469 6.56988 7.63051 6.66222C7.54633 6.75455 7.49977 6.87505 7.5 7V11.502L7.508 11.592C7.53026 11.7149 7.59775 11.8251 7.69717 11.9008C7.79659 11.9765 7.92074 12.0122 8.04518 12.0009C8.16961 11.9896 8.28531 11.9321 8.36949 11.8398C8.45367 11.7475 8.50023 11.6269 8.5 11.502V7L8.492 6.91ZM8.799 4.75C8.799 4.55109 8.71998 4.36032 8.57933 4.21967C8.43868 4.07902 8.24791 4 8.049 4C7.85009 4 7.65932 4.07902 7.51867 4.21967C7.37802 4.36032 7.299 4.55109 7.299 4.75C7.299 4.94891 7.37802 5.13968 7.51867 5.28033C7.65932 5.42098 7.85009 5.5 8.049 5.5C8.24791 5.5 8.43868 5.42098 8.57933 5.28033C8.71998 5.13968 8.799 4.94891 8.799 4.75ZM16 8C16 5.87827 15.1571 3.84344 13.6569 2.34315C12.1566 0.842855 10.1217 0 8 0C5.87827 0 3.84344 0.842855 2.34315 2.34315C0.842855 3.84344 0 5.87827 0 8C0 10.1217 0.842855 12.1566 2.34315 13.6569C3.84344 15.1571 5.87827 16 8 16C10.1217 16 12.1566 15.1571 13.6569 13.6569C15.1571 12.1566 16 10.1217 16 8ZM1 8C1 7.08075 1.18106 6.1705 1.53284 5.32122C1.88463 4.47194 2.40024 3.70026 3.05025 3.05025C3.70026 2.40024 4.47194 1.88463 5.32122 1.53284C6.1705 1.18106 7.08075 1 8 1C8.91925 1 9.8295 1.18106 10.6788 1.53284C11.5281 1.88463 12.2997 2.40024 12.9497 3.05025C13.5998 3.70026 14.1154 4.47194 14.4672 5.32122C14.8189 6.1705 15 7.08075 15 8C15 9.85652 14.2625 11.637 12.9497 12.9497C11.637 14.2625 9.85652 15 8 15C6.14348 15 4.36301 14.2625 3.05025 12.9497C1.7375 11.637 1 9.85652 1 8Z" fill="#333333"/>
</svg>
                                        </button>
                                        <div class="plan-tooltip me-body16 text-darkgray">
                                            <p class="">
                                                Book now and as soon as available within 7 days.
                                            </p>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="flex items-center me-body16 my-3">
                                    <div class="plan-tooltip-container relative mr-5 lg:mr-6">
                                        @lang('labels.check_out.how_to_choose') {{ langbind($group, 'name') }}?
                                        <button type="button" role="button" class="plan-tooltip-btn ml-[6px] align-middle inline-block">
                                        <img src="{{asset('/frontend/img/Vector-13.png')}}" alt="infomation" class="w-4 md:w-5 align-middle object-center object-cover" />
                                            <div class="plan-tooltip select-text">
                                                <p class="me-body16">
                                                {{__('labels.basic_info.please_select')}} {{$group->minimum_item}} items
                                                </p>

                                            </div>


                                        </button>
                                    </div>
                                </div>
                                <div class="form-group me-body16">
                                    @foreach ($tableItems as $ikey => $tableItem)
                                        <label
                                            for="check_up_item{{ $group->id }}{{ $tableItem->id }}"
                                            class="custom-checkbox-container mr-1 last:mr-0 lg:mr-2 lg:last:mr-0 mb-1 last:mb-0 lg:mb-2 lg:last:mb-0">
                                            <input type="checkbox" name="check_up_item-1[]"
                                            id="check_up_item{{ $group->id }}{{ $tableItem->id }}" data-qty="{{$tableItem->equivalent_number}}" data-max="{{$group->minimum_item}}"
                                                data-qtyelem="cancer-marker-qty{{ $group->id }}-1" value="{{ $group->id }},{{ $tableItem->id }}" class="select-plan select-opt-handler"/>
                                            <span class="custom-checkbox-btn rounded py-[7px] px-4 outlined-btn-hover !inline-block">
                                                <span
                                                    class="mr-1 lg:mr-2">{{ langbind($tableItem, 'name') }}</span>
                                                @if ($tableItem->gender == 0)
                                                    <img src="{{ asset('frontend/img/male-gen.svg') }}"
                                                        alt="male" class="gen-icon inline-block" />
                                                @elseif($tableItem->gender == 1)
                                                    <img src="{{ asset('frontend/img/female-gen.svg') }}"
                                                        alt="female" class="gen-icon inline-block" />
                                                @endif
                                            </span>
                                        </label>
                                    @endforeach
                                    <input type="hidden" name="group_id-1[]" id="group_id{{$group->id}}-1"
                                    value="{{ $group->id }}">
                                    <div class="form-group me-body18 mt-2 6xl:mt-[10px]">
                                        <label for="decide{{ $group->id }}-1"
                                            class="custom-checkbox-container">
                                            <input type="checkbox" name="decide-1-{{ $group->id }}"
                                                id="decide{{ $group->id }}-1" class="decide-later select-opt-handler">
                                            <span class="custom-checkbox-orange"></span>
                                            <span class="ml-5 xl:ml-6 4xl:ml-[30px]">@lang('labels.product_detail.decide_later')</span>
                                        </label>
                                    </div>
                                    {{-- <div class="form-group me-body18 mt-3 lg:mt-5">
                                        <label for="decide" class="custom-radio-container">
                                            <input type="radio" name="decide" id="decide"
                                                value="">
                                            <span class="custom-radio-orange"></span>
                                            <span class="ml-5 4xl:ml-[30px]">@lang('labels.product_detail.decide_later')</span>
                                        </label>
                                    </div> --}}
                                </div>
                            </article>
                            @endif
                        @endforeach
                    @endif

                @include('frontend.product_details.product_types.product_8')

                @if (count($product->add_on_item_data) > 0)
                <article class="mt-6">
                    <h3 class="font-bold me-body20">@lang('labels.product_detail.select_redem_option')</h3>
                    <p class="me-body16 my-3">
                        {!! langbind($product,'add_on_reminder')!!}
                    </p>
                    <div class="form-group me-body18 rounded-xl p-2 bg-far sm:p-5">
                        <ul>
                            @foreach ($product->add_on_item_data as $key => $item)
                                <li class="flex justify-between">
                                    <label for="{{ $item->name_en }}-1"
                                        class="custom-checkbox-label flex items-center mr-1 last:mr-0 lg:mr-2 lg:last:mr-0 mb-1 last:mb-0 lg:mb-2 lg:last:mb-0">
                                        <input type="checkbox" name="addd_on_items-1[]"
                                            data-discount-price="{{ isset($item->discount_price) ? $item->discount_price : $item->original_price }}"
                                            data-original-price="{{ isset($item->original_price) ? $item->original_price : 0  }}"
                                            id="{{ $item->name_en }}-1"
                                            value="{{ $item->id }}" class="add_on select-opt-handler" />
                                        <span class="custom-checkbox-orange "></span>
                                        @if($item->recommend_item == 1 || $item->recommend_item == 2 )
                                        <span class="ml-5 4xl:ml-[30px] flex items-center flex-wrap font-bold">
                                            <!-- <span> -->
                                                {{ langbind($item, 'name') }}
                                                @if(langbind($item,'description') != null)
                                                <button type="button" class="plan-tooltip-btn ml-1">
                                                <img src="{{asset('/frontend/img/Vector-13.png')}}" alt="infomation" class="w-4 md:w-5 align-middle object-center object-cover" />
                                                <div class="plan-tooltip select-text me-body16 text-darkgray">
                                                    <p class="">
                                                    {!! langbind($item, 'description') !!}
                                                    </p>
                                                </div>
                                                </button>
                                                @endif
                                                @if($item->recommend_item == 1)
                                                <span class="me-body14 flex items-center ml-1"><span class="text-orangeMediq bg-orangeLight py-1 px-2 rounded mr-[2px]">
                                                    {{__('labels.product_detail.most_popular') }}
                                                </span>
                                                <img src="{{asset('frontend/img/mdi-light_thumb-up.svg')}}" alt="thumb up" class="w-[15px] mb-[5px] md:mb-0 md:w-auto object-center object-cover align-middle"></span>
                                                @elseif($item->recommend_item == 2)
                                                <span class="me-body14 flex items-center ml-1"><span class="text-orangeMediq bg-orangeLight py-1 px-2 rounded mr-[2px]">
                                                {{__('labels.product_detail.hot') }}
                                                </span>
                                                <img src="{{asset('frontend/img/ant-design_fire-filled.svg')}}" alt="thumb up" class="w-5 md:w-auto object-center object-cover align-middle">
                                                </span>
                                                @endif
                                                @isset($item->discount_price)
                                                <span class="add-on-original line-through ml-1">${{number_format($item->original_price)}}</span>
                                                @endisset
                                            <!-- </span> -->
                                        </span>
                                        @else
                                        <span
                                            class="ml-5 4xl:ml-[30px] flex items-center flex-wrap font-">
                                            {{ langbind($item, 'name') }}
                                            @if(langbind($item,'description') != null)
                                            <button type="button" class="plan-tooltip-btn ml-1">
                                            <img src="{{asset('/frontend/img/Vector-13.png')}}" alt="infomation" class="w-4 md:w-5 align-middle object-center object-cover" />
                                            <div class="plan-tooltip select-text me-body16 text-darkgray">
                                                <p class="">
                                                {!! langbind($item, 'description') !!}
                                                </p>
                                            </div>
                                            </button>
                                            @endif
                                            @isset($item->discount_price)
                                            &nbsp;<span class="add-on-original line-through ml-1">${{number_format($item->original_price)}}</span>
                                            @endisset
                                        </span>
                                        @endif
                                    </label>
                                    <span
                                        class="service-price text-orangeMediq font-bold me-body18">+${{ isset($item->discount_price) ? number_format($item->discount_price) : number_format($item->original_price) }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </article>
                @endif

            </div>
            <div class="plan-option-tab " id="recipient2">
                <input type="hidden" name="recipient-2" value="recipient" id="recipient-2" class="recipient-field">
                <article>
                    <h3 class="font-bold me-body20">@lang('labels.product_detail.select_time')</h3>
                    <div class="flex items-center flex-wrap me-body16 mt-3">
                    @if (count($timeSlots) > 0)
                        @foreach ($timeSlots as $item)
                            <div
                                class="plan-tooltip-container relative flex items-center mr-5 lg:mr-6">
                                <span class="mr-[6px]">{{ langbind($item, 'name') }}</span>
                                <button type="button" class="plan-tooltip-btn">
                                <img src="{{asset('/frontend/img/Vector-13.png')}}" alt="infomation" class="w-4 md:w-5 align-middle object-center object-cover" />
                                    <div class="plan-tooltip select-text me-body16 text-darkgray">
                                        {!! langbind($item, 'remind_notice') !!}
                                    </div>

                                </button>
                            </div>
                        @endforeach
                    @endif
                    </div>
                    <div class="choose-time relative mt-3">
                        <button type="button" role="button" id="openChooseTime-2" data-id="2"
                            class="open-choose-time flex justify-center bg-orangeMediq text-light font-bold me-body18 py-3 px-5 rounded-md hover:bg-brightOrangeMediq"
                            onclick="openChooseTimeDialog(event, '2')">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
  <path d="M14.6667 11.6667C14.8877 11.6667 15.0996 11.5789 15.2559 11.4226C15.4122 11.2663 15.5 11.0543 15.5 10.8333C15.5 10.6123 15.4122 10.4004 15.2559 10.2441C15.0996 10.0878 14.8877 10 14.6667 10C14.4457 10 14.2337 10.0878 14.0774 10.2441C13.9211 10.4004 13.8333 10.6123 13.8333 10.8333C13.8333 11.0543 13.9211 11.2663 14.0774 11.4226C14.2337 11.5789 14.4457 11.6667 14.6667 11.6667ZM14.6667 15C14.8877 15 15.0996 14.9122 15.2559 14.7559C15.4122 14.5996 15.5 14.3877 15.5 14.1667C15.5 13.9457 15.4122 13.7337 15.2559 13.5774C15.0996 13.4211 14.8877 13.3333 14.6667 13.3333C14.4457 13.3333 14.2337 13.4211 14.0774 13.5774C13.9211 13.7337 13.8333 13.9457 13.8333 14.1667C13.8333 14.3877 13.9211 14.5996 14.0774 14.7559C14.2337 14.9122 14.4457 15 14.6667 15ZM11.3333 10.8333C11.3333 11.0543 11.2455 11.2663 11.0893 11.4226C10.933 11.5789 10.721 11.6667 10.5 11.6667C10.279 11.6667 10.067 11.5789 9.91074 11.4226C9.75446 11.2663 9.66667 11.0543 9.66667 10.8333C9.66667 10.6123 9.75446 10.4004 9.91074 10.2441C10.067 10.0878 10.279 10 10.5 10C10.721 10 10.933 10.0878 11.0893 10.2441C11.2455 10.4004 11.3333 10.6123 11.3333 10.8333ZM11.3333 14.1667C11.3333 14.3877 11.2455 14.5996 11.0893 14.7559C10.933 14.9122 10.721 15 10.5 15C10.279 15 10.067 14.9122 9.91074 14.7559C9.75446 14.5996 9.66667 14.3877 9.66667 14.1667C9.66667 13.9457 9.75446 13.7337 9.91074 13.5774C10.067 13.4211 10.279 13.3333 10.5 13.3333C10.721 13.3333 10.933 13.4211 11.0893 13.5774C11.2455 13.7337 11.3333 13.9457 11.3333 14.1667ZM6.33333 11.6667C6.55435 11.6667 6.76631 11.5789 6.92259 11.4226C7.07887 11.2663 7.16667 11.0543 7.16667 10.8333C7.16667 10.6123 7.07887 10.4004 6.92259 10.2441C6.76631 10.0878 6.55435 10 6.33333 10C6.11232 10 5.90036 10.0878 5.74408 10.2441C5.5878 10.4004 5.5 10.6123 5.5 10.8333C5.5 11.0543 5.5878 11.2663 5.74408 11.4226C5.90036 11.5789 6.11232 11.6667 6.33333 11.6667ZM6.33333 15C6.55435 15 6.76631 14.9122 6.92259 14.7559C7.07887 14.5996 7.16667 14.3877 7.16667 14.1667C7.16667 13.9457 7.07887 13.7337 6.92259 13.5774C6.76631 13.4211 6.55435 13.3333 6.33333 13.3333C6.11232 13.3333 5.90036 13.4211 5.74408 13.5774C5.5878 13.7337 5.5 13.9457 5.5 14.1667C5.5 14.3877 5.5878 14.5996 5.74408 14.7559C5.90036 14.9122 6.11232 15 6.33333 15Z" fill="white"/>
  <path fill-rule="evenodd" clip-rule="evenodd" d="M6.33464 1.45837C6.5004 1.45837 6.65937 1.52422 6.77658 1.64143C6.89379 1.75864 6.95964 1.91761 6.95964 2.08337V2.71921C7.5113 2.70837 8.1188 2.70837 8.78714 2.70837H12.2146C12.8838 2.70837 13.4913 2.70837 14.043 2.71921V2.08337C14.043 1.91761 14.1088 1.75864 14.226 1.64143C14.3432 1.52422 14.5022 1.45837 14.668 1.45837C14.8337 1.45837 14.9927 1.52422 15.1099 1.64143C15.2271 1.75864 15.293 1.91761 15.293 2.08337V2.77254C15.5096 2.78921 15.7146 2.81004 15.9088 2.83587C16.8855 2.96754 17.6763 3.24421 18.3005 3.86754C18.9238 4.49171 19.2005 5.28254 19.3321 6.25921C19.4596 7.20921 19.4596 8.42171 19.4596 9.95337V11.7134C19.4596 13.245 19.4596 14.4584 19.3321 15.4075C19.2005 16.3842 18.9238 17.175 18.3005 17.7992C17.6763 18.4225 16.8855 18.6992 15.9088 18.8309C14.9588 18.9584 13.7463 18.9584 12.2146 18.9584H8.78797C7.2563 18.9584 6.04297 18.9584 5.0938 18.8309C4.11714 18.6992 3.3263 18.4225 2.70214 17.7992C2.0788 17.175 1.80214 16.3842 1.67047 15.4075C1.54297 14.4575 1.54297 13.245 1.54297 11.7134V9.95337C1.54297 8.42171 1.54297 7.20837 1.67047 6.25921C1.80214 5.28254 2.0788 4.49171 2.70214 3.86754C3.3263 3.24421 4.11714 2.96754 5.0938 2.83587C5.28797 2.81004 5.4938 2.78921 5.70964 2.77254V2.08337C5.70964 1.91761 5.77548 1.75864 5.89269 1.64143C6.0099 1.52422 6.16888 1.45837 6.33464 1.45837ZM5.25964 4.07504C4.42214 4.18754 3.9388 4.39921 3.5863 4.75171C3.2338 5.10421 3.02214 5.58754 2.90964 6.42587C2.89047 6.56754 2.87464 6.71754 2.8613 6.87504H18.1413C18.128 6.71671 18.1121 6.56754 18.093 6.42504C17.9805 5.58754 17.7688 5.10421 17.4163 4.75171C17.0638 4.39921 16.5805 4.18754 15.7421 4.07504C14.8863 3.96004 13.7571 3.95837 12.168 3.95837H8.83464C7.24547 3.95837 6.11714 3.96004 5.25964 4.07504ZM2.79297 10C2.79297 9.28837 2.79297 8.66921 2.8038 8.12504H18.1988C18.2096 8.66921 18.2096 9.28837 18.2096 10V11.6667C18.2096 13.2559 18.208 14.385 18.093 15.2417C17.9805 16.0792 17.7688 16.5625 17.4163 16.915C17.0638 17.2675 16.5805 17.4792 15.7421 17.5917C14.8863 17.7067 13.7571 17.7084 12.168 17.7084H8.83464C7.24547 17.7084 6.11714 17.7067 5.25964 17.5917C4.42214 17.4792 3.9388 17.2675 3.5863 16.915C3.2338 16.5625 3.02214 16.0792 2.90964 15.2409C2.79464 14.385 2.79297 13.2559 2.79297 11.6667V10Z" fill="white"/>
</svg>
                            </span>
                            <span class="btn-text ml-1 lg:ml-2">@lang('labels.product_detail.choose_time')</span>
                        </button>
                        <input type="hidden" name="merchant-area-2" id="merchant-area-2" class="planopt-booking-feild" value="">
                        <input type="hidden" name="booking-date-2" id="booking-date-2" class="planopt-booking-feild" value="">
                        <input type="hidden" name="selected-bookingtime-2" id="selected-bookingtime-2" class="planopt-booking-feild" value="">
                        <div id="chooseTimeDialog-2"
                            class="choose-time-dialog hidden me-body18 absolute top-14 bg-light z-[3] border border-solid border-mee4 rounded-lg md:rounded-[20px] shadow-[0px_4px_15px_2px_rgba(0,0,0,0.1)] py-5 md:w-[43.75rem] lg:w-[52.5rem] xl:w-[66.25rem]">
                            <div class="choose-time-container sm:flex w-full sm:justify-between">
                                <div
                                    class="choose-time-loc custom-scrollbar-rounded-gray overflow-y-auto max-h-28 sm:max-h-60 md:w-40 lg:w-60 xl:w-80 lg:max-h-[260px]">
                                    <ul class="select-branch" id="select-branch-2">
                                    </ul>
                                </div>
                                <div
                                    class="choose-time-picker px-2 2xs:px-5 mt-4 sm:mt-0 max-w-[24.375rem] flex-1">
                                    <div id='calendar-2'
                                        class="h-full choose-time-calendar me-body16"></div>
                                </div>
                                <div
                                    class="choose-time-selected px-2 2xs:px-5 mt-4 sm:mt-0 sm:pl-0 lg:w-56 xl:w-72">
                                    <div id="displaySelectedDate-2" class="font-bold">
                                        {{__('labels.product_detail.pls_select_booking_date')}}
                                    </div>
                                    <input type="hidden" name="selectedDate-2" id="selectedDate-2"
                                        value="">
                                    <div class="form-group mt-4 sm:mt-5 max-h-80 overflow-y-auto custom-scrollbar-rounded-gray booking-time-container"
                                        id="booking-time-2">
                                    </div>
                                </div>
                            </div>
                            <div
                                class="choose-time-address flex px-2 2xs:px-5 items-center mt-4 max-w-xs me-body18">
                                <span><img src="{{ asset('frontend/img/uicons_location.png') }}"
                                        alt="" class="w-auto h-auto align-middle mr-1"></span>
                                <span id="branch-address-2">11/F., JD Mall, 233-239 Nathan Road,
                                    Jordan</span>
                            </div>
                            <div class="px-2 2xs:px-5">
                                <hr class="w-full my-5 border-mee4">
                            </div>
                            <div class="flex px-2 2xs:px-5 justify-between items-center">
                                <div class="form-group me-body18">
                                    <label for="decideLater-2" class="custom-checkbox-container">
                                        <input type="checkbox" name="preferred-time-decide-later-2"
                                            id="decideLater-2" class="decide-later-datetime" data-id="1">
                                        <span class="custom-checkbox-orange"></span>
                                        <span class="ml-5 xl:ml-6 4xl:ml-[30px]">@lang('labels.product_detail.decide_later')</span>
                                    </label>
                                </div>
                                <button id="date-confirm-2" data-id="2" type="button"
                                    role="button"
                                    class="date-confirm text-light bg-orangeMediq rounded-md font-bold py-2 px-10 sm:py-[10px] max-w-[300px] xl:px-0 xl:w-[300px] hover:bg-brightOrangeMediq transition-colors duration-300">
                                    @lang('labels.log_in_register.confirm')
                                </button>
                            </div>
                        </div>
                    </div>
                </article>
                
                
                    @if (count($optionGroups) > 0)
                        @foreach ($optionGroups as $group)
                        
                            @php
                                $tablePriIds = App\Models\CheckUpTableType::where('check_up_type_id', 2)
                                    ->where('check_up_table_id', $checkuptable->id)
                                    ->pluck('id')
                                    ->toArray();
                                $optionGroupIds = App\Models\CheckTableItem::where('check_up_group_id', $group->id)
                                    ->whereIn('check_up_table_type_id', $tablePriIds)
                                    ->distinct()
                                    ->pluck('check_up_item_id')
                                    ->toArray();
                                $tableItems = App\Models\CheckUpItem::whereIn('id', $optionGroupIds)->get();
                            @endphp
                            @if (count($optionGroupIds) > 0)
                            <article class="mt-6">
                                <h3 class="font-bold me-body20">@lang('labels.check_out.select_free')
                                    {{ langbind($group, 'name') }} <span
                                        class="font-normal me-body18">(
                                        @if(lang() == 'en')
                                        {{ $group->minimum_item }}
                                        @lang('labels.check_out.selected')
                                        @else 
                                        @lang('labels.check_out.selected'){{ $group->minimum_item }}{{__('labels.product_detail.items')}}
                                        @endif)</span>
                                </h3>
                                {{-- <div class="flex items-center me-body16 my-3">
                                    <div
                                        class="plan-tooltip-container relative flex items-center mr-5 lg:mr-6">
                                        <span class="mr-[6px]">@lang('labels.check_out.how_to_choose') jjjj1
                                            {{ langbind($group, 'name') }}?</span>
                                        <button type="button" role="button"
                                            class="plan-tooltip-btn">
                                            <svg width="20" height="20" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M8.492 6.91C8.46974 6.78705 8.40225 6.6769 8.30283 6.60122C8.20341 6.52554 8.07926 6.48983 7.95482 6.50112C7.83039 6.51241 7.71469 6.56988 7.63051 6.66222C7.54633 6.75455 7.49977 6.87505 7.5 7V11.502L7.508 11.592C7.53026 11.7149 7.59775 11.8251 7.69717 11.9008C7.79659 11.9765 7.92074 12.0122 8.04518 12.0009C8.16961 11.9896 8.28531 11.9321 8.36949 11.8398C8.45367 11.7475 8.50023 11.6269 8.5 11.502V7L8.492 6.91ZM8.799 4.75C8.799 4.55109 8.71998 4.36032 8.57933 4.21967C8.43868 4.07902 8.24791 4 8.049 4C7.85009 4 7.65932 4.07902 7.51867 4.21967C7.37802 4.36032 7.299 4.55109 7.299 4.75C7.299 4.94891 7.37802 5.13968 7.51867 5.28033C7.65932 5.42098 7.85009 5.5 8.049 5.5C8.24791 5.5 8.43868 5.42098 8.57933 5.28033C8.71998 5.13968 8.799 4.94891 8.799 4.75ZM16 8C16 5.87827 15.1571 3.84344 13.6569 2.34315C12.1566 0.842855 10.1217 0 8 0C5.87827 0 3.84344 0.842855 2.34315 2.34315C0.842855 3.84344 0 5.87827 0 8C0 10.1217 0.842855 12.1566 2.34315 13.6569C3.84344 15.1571 5.87827 16 8 16C10.1217 16 12.1566 15.1571 13.6569 13.6569C15.1571 12.1566 16 10.1217 16 8ZM1 8C1 7.08075 1.18106 6.1705 1.53284 5.32122C1.88463 4.47194 2.40024 3.70026 3.05025 3.05025C3.70026 2.40024 4.47194 1.88463 5.32122 1.53284C6.1705 1.18106 7.08075 1 8 1C8.91925 1 9.8295 1.18106 10.6788 1.53284C11.5281 1.88463 12.2997 2.40024 12.9497 3.05025C13.5998 3.70026 14.1154 4.47194 14.4672 5.32122C14.8189 6.1705 15 7.08075 15 8C15 9.85652 14.2625 11.637 12.9497 12.9497C11.637 14.2625 9.85652 15 8 15C6.14348 15 4.36301 14.2625 3.05025 12.9497C1.7375 11.637 1 9.85652 1 8Z" fill="#333333"/>
</svg>
                                        </button>
                                        <div class="plan-tooltip me-body16 text-darkgray">
                                            <p class="">
                                                Book now and as soon as available within 7 days.
                                            </p>
                                        </div>
                                    </div>

                                </div> --}}
                                <div class="flex items-center me-body16 my-3">
                                    <div
                                        class="plan-tooltip-container relative mr-5 lg:mr-6">
                                        @lang('labels.check_out.how_to_choose') {{ langbind($group, 'name') }}?
                                        <button type="button" role="button" class="plan-tooltip-btn ml-[6px] align-middle inline-block">
                                            <img src="{{asset('/frontend/img/Vector-13.png')}}" alt="infomation" class="w-4 md:w-5 align-middle object-center object-cover" />

                                            <div class="plan-tooltip select-text">
                                                <p class="me-body16">
                                                    {{__('labels.basic_info.please_select')}} {{$group->minimum_item}} items
                                                </p>

                                            </div>


                                        </button>
                                    </div>
                                </div>
                                <div class="form-group me-body16">
                                    @foreach ($tableItems as $ikey => $tableItem)
                                        <label
                                            for="check_up_item-2{{ $group->id }}{{ $tableItem->id }}"
                                            class="custom-checkbox-container mr-1 last:mr-0 lg:mr-2 lg:last:mr-0 mb-1 last:mb-0 lg:mb-2 lg:last:mb-0">
                                            <input type="checkbox" name="check_up_item-2[]"
                                                id="check_up_item-2{{ $group->id }}{{ $tableItem->id }}"
                                                value="{{ $group->id }},{{ $tableItem->id }}" class="select-plan select-opt-handler"/>
                                            <span class="custom-checkbox-btn rounded py-[7px] px-4 outlined-btn-hover !inline-block">
                                                <span
                                                    class="mr-1 lg:mr-2">{{ langbind($tableItem, 'name') }}</span>
                                                @if ($tableItem->gender == 0)
                                                    <img src="{{ asset('frontend/img/male-gen.svg') }}"
                                                        alt="male" class="gen-icon inline-block" />
                                                @elseif($tableItem->gender == 1)
                                                    <img src="{{ asset('frontend/img/female-gen.svg') }}"
                                                        alt="female" class="gen-icon inline-block" />
                                                @endif
                                            </span>
                                        </label>
                                    @endforeach
                                </div>
                                <input type="hidden" name="group_id-2[]" id="group_id{{$group->id}}-2"
                                value="{{ $group->id }}">
                                <div class="form-group me-body18 mt-2 6xl:mt-[10px]">
                                    <label for="decide{{ $group->id }}-2"
                                        class="custom-checkbox-container">
                                        <input type="checkbox" name="decide{{ $group->id }}-2"
                                            id="decide{{ $group->id }}-2" class="decide-later select-opt-handler">
                                        <span class="custom-checkbox-orange"></span>
                                        <span class="ml-5 xl:ml-6 4xl:ml-[30px]">@lang('labels.product_detail.decide_later')</span>
                                    </label>
                                </div>
                            </article>
                            @endif
                        @endforeach
                    @endif
                    {{-- <div class="form-group me-body18">
                        <label for="decide-2"
                            class="custom-checkbox-container">
                            <input type="checkbox" name="decide-2"
                                id="decide-2" class="decide-later">
                            <span class="custom-checkbox-orange"></span>
                            <span class="ml-5 4xl:ml-[30px]">@lang('labels.product_detail.decide_later')</span>
                        </label>
                    </div>
                        <div class="form-group me-body18 mt-3 lg:mt-5">
                        <label for="decide-2" class="custom-radio-container">
                            <input type="radio" name="decide-2" id="decide-2" value="">
                            <span class="custom-radio-orange"></span>
                            <span class="ml-5 4xl:ml-[30px]">@lang('labels.product_detail.decide_later')</span>
                        </label>
                    </div>
                     --}}
                @include('frontend.product_details.product_types.product_8')

                @if (count($product->add_on_item_data) > 0)
                <article class="mt-6">
                    <h3 class="font-bold me-body20">@lang('labels.product_detail.select_redem_option')</h3>
                    <p class="me-body16 my-3">
                        {!! langbind($product,'add_on_reminder')!!}
                    </p>
                    <div class="form-group me-body18 rounded-xl p-2 bg-far sm:p-5">
                        <ul>
                            @foreach ($product->add_on_item_data as $key => $item)
                                <li class="flex justify-between">
                                    <label for="{{ $item->name_en }}-2"
                                        class="custom-checkbox-label flex items-center mr-1 last:mr-0 lg:mr-2 lg:last:mr-0 mb-1 last:mb-0 lg:mb-2 lg:last:mb-0">
                                        <input type="checkbox" name="addd_on_items-2[]"
                                            data-discount-price="{{ isset($item->discount_price) ? $item->discount_price : $item->original_price }}"
                                            data-original-price="{{ isset($item->original_price) ? $item->original_price : 0  }}"
                                            id="{{ $item->name_en }}-2"
                                            value="{{ $item->id }}" class="add_on select-opt-handler" />
                                        <span class="custom-checkbox-orange "></span>
                                        @if($item->recommend_item == 1 || $item->recommend_item == 2)
                                        <span class="ml-5 4xl:ml-[30px] flex items-center flex-wrap font-bold">
                                            <!-- <span> -->
                                                {{ langbind($item, 'name') }}
                                                @if(langbind($item,'description') != null)
                                                <button type="button" class="plan-tooltip-btn ml-1">
                                                <img src="{{asset('/frontend/img/Vector-13.png')}}" alt="infomation" class="w-4 md:w-5 align-middle object-center object-cover" />
                                                <div class="plan-tooltip select-text me-body16 text-darkgray">
                                                    <p class="">
                                                    {!! langbind($item, 'description') !!}
                                                    </p>
                                                </div>
                                                </button>
                                                @endif
                                                @if($item->recommend_item == 1)
                                                <span class="me-body14 flex items-center ml-1"><span class="text-orangeMediq bg-orangeLight py-1 px-2 rounded mr-[2px]">
                                                    {{__('labels.product_detail.most_popular') }}
                                                </span>
                                                <img src="{{asset('frontend/img/mdi-light_thumb-up.svg')}}" alt="thumb up" class="w-[15px] mb-[5px] md:mb-0 md:w-auto object-center object-cover align-middle"></span>
                                                @elseif($item->recommend_item == 2)
                                                <span class="me-body14 flex items-center ml-1"><span class="text-orangeMediq bg-orangeLight py-1 px-2 rounded mr-[2px]">
                                                {{__('labels.product_detail.hot') }}
                                                </span>
                                                <img src="{{asset('frontend/img/ant-design_fire-filled.svg')}}" alt="thumb up" class="w-5 md:w-auto object-center object-cover align-middle">
                                                </span>
                                                @endif
                                                @isset($item->discount_price)
                                                <span class="add-on-original line-through ml-1">${{number_format($item->original_price)}}</span>
                                                @endisset
                                            </span>
                                        <!-- </span> -->
                                        @else
                                        <span
                                            class="ml-5 4xl:ml-[30px] flex items-center flex-wrap font-">
                                            {{ langbind($item, 'name') }}
                                            @if(langbind($item,'description') != null)
                                            <button type="button" class="plan-tooltip-btn ml-1">
                                            <img src="{{asset('/frontend/img/Vector-13.png')}}" alt="infomation" class="w-4 md:w-5 align-middle object-center object-cover" />
                                            <div class="plan-tooltip select-text me-body16 text-darkgray">
                                                <p class="">
                                                {!! langbind($item, 'description') !!}
                                                </p>
                                            </div>
                                            </button>
                                            @endif
                                            @isset($item->discount_price)
                                            <span class="add-on-original line-through ml-1">${{number_format($item->original_price)}}</span>
                                            @endisset
                                        </span>
                                        @endif
                                    </label>
                                    <span
                                        class="service-price text-orangeMediq font-bold me-body18">+${{ isset($item->discount_price) ? number_format($item->discount_price) : number_format($item->original_price) }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </article>
                @endif
            </div>
        @endif
    </div>
    <article>
        <div class="form-group me-body16 mt-3 lg:mt-5">
            <div class="sm:flex items-center justify-between">
                <div>
                    @if(count($product->price_tag_data_arr) > 0)
                    @foreach($product->price_tag_data_arr as $price)
                    <div class="flex items-center">
                        <div class="plan-tooltip-wrapper flex items-center me-body18 mr-4 xl:mr-5">
                            <span class="mr-2"><img src="{{ $price->img }}"
                                    alt="best price" class="w-auto h-auto"></span>
                            <span>{{langbind($price,'name')}}</span>
                            <div class="plan-tooltip select-text me-body16 text-darkgray">
                                {{-- <p class="">
                                    @lang('labels.product_detail.best_price_paragraph')
                                    <a href='#' class='underline'>
                                        @lang('labels.product_detail.more_detail')
                                    </a>
                                </p> --}}
                                {!! langbind($price,'content') !!}
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>

                <div class="flex justify-end items-center my-2 lg:my-3">
                    <div class="flex items-center">
                        <input type="hidden" name="each_recipient_amount"
                        value="{{ $prodDis != null ? $prodDis : $product->original_price }}">
                        <span id="averagePriceWrapper" class="hidden">
                        ({{__('labels.product_detail.average')}} $<span id="averagePrice"></span>)
                        </span>
                        <div
                            class="price-tooltip-wrapper font-bold me-body36 mx-2 border-b border-dashed border-darkgray">
                            <input type="hidden" id="total_amount" value="{{ $prodDis != null ? $prodDis : $product->original_price }}">
                            <input type="hidden" id="totalPrice" name="total-price" value="{{ $prodDis != null ? $prodDis : $product->original_price }}">
                            <span
                                class="total_amount">${{ $prodDis != null ?  number_format($prodDis) : number_format($product->original_price)}}</span>
                            <div class="price-tooltip me-body16 font-normal">
                                <div class="flex items-center justify-between">
                                    <span>{{__('labels.product_detail.item_total')}}</span>
                                    <span class="original-price">${{number_format($product->original_price) }}</span>
                                </div>
                                <div class="flex items-center justify-between my-3">
                                    <span class="flex-1 mr-2">@lang('labels.product_detail.discount')</span>
                                    <div class="flex items-center">
                                        <span id="specialOffer" class="specialOffer">{{$prodDis != null ? '- $'.number_format($product->original_price - $prodDis) : 0}}</span> 
                                    </div>
                                </div>
                                <div
                                    class="flex items-center justify-between bg-tagbg rounded p-[10px]">
                                    <span>@lang('labels.product_detail.total')</span>
                                    <span class="font-bold"><span
                                            class="total_amount">${{  $prodDis != null ? number_format($prodDis) : number_format($product->original_price) }}</span></span>
                                </div>
                            </div>
                        </div>
                        <input type="text" name="original-price" id="original-price" class="hidden" value="{{ $product->original_price }}">
                        <input type="hidden" id="originalPrice" name="original_price" value="{{ $product->original_price }}">
                        @if ($prodDis != null)
                            <span class="line-through original-price self-end">${{ number_format($product->original_price) }}</span>
                        @endif
                    </div>
                </div>


            </div>
            <!-- <div> -->
                <!-- <div class="plan-discount-tag to-enjoy mt-2 sm:mt-0 hidden xl:block mr-0 ml-auto">
                *2 To Enjoy -$6,100
                </div> -->
                @php
                $pro = null ;
                if(count($product->productsVariations) > 0 && $product->productsVariations[0]->sku != null){
                    $pro = $product ;
                    $product = getLowestPrice($product);
                    $prodDis = isset($product->promotion_price) ? $product->promotion_price : (isset($product->discount_price) ? $product->discount_price : '');
                }
                @endphp
                    
                
                <div class="flex justify-end items-center">
                    <!-- <span class="mr-3">Complete the booking to get</span>
                <span class="flex items-center">
                <img src="{{ asset('frontend/img/q-dollar.png') }}" alt="" class="w-auto h-auto align-middle mr-1">
                <span>88 Q-Dollar</span>
                </span> -->
                </div>
                @php 
                if($pro == null){
                    $product = $product;
                }else{
                    $product = $pro;
                }
                @endphp
                <input type="hidden" class="is_add_to_cart_btn" name="is_add_to_cart_btn" value="no">
                @if(Auth::guard('customer')->check())
                <div class="flex justify-end items-center font-bold me-body20 mt-5">
                    @if($product->product_type == 1)
                    <button type="button" role="button"
                        id="submitAddtocart"
                        class="add-to-cart--btn plan-opt-btn text-orangeMediq outlined-btn-hover bg-transparent border border-solid border-orangeMediq rounded-md w-auto flex-1 sm:max-w-[10rem] lg:max-w-[12rem] 4xl:max-w-[300px] py-2 4xl:py-3 mr-2">
                        @lang('labels.add_to_cart')
                    </button>
                    @endif
                    <button type="{{$product->product_type == 2 ? 'submit' : 'button'}}" role="button"
                        id="{{$product->product_type != 2 ? 'submitBookNow' : ''}}"
                        class="plan-opt-btn inStock-remainder-btn  text-light bg-orangeMediq border border-solid border-orangeMediq rounded-md w-auto flex-1 sm:max-w-[10rem] lg:max-w-[12rem] 4xl:max-w-[300px] py-2 4xl:py-3 hover:bg-brightOrangeMediq transition-colors duration-300">
                        @lang('labels.book_now')
                    </button>
                </div>
                @else
                <div class="register-btn flex justify-end items-center font-bold me-body20 mt-5">
                    @if($product->product_type == 1)
                    <button type="button" role="button"
                        class="text-orangeMediq outlined-btn-hover bg-transparent border border-solid border-orangeMediq rounded-md w-auto flex-1 sm:max-w-[10rem] lg:max-w-[12rem] 4xl:max-w-[300px] py-2 4xl:py-3 mr-2">
                        @lang('labels.add_to_cart')
                    </button>
                    @endif
                    <button type="button" role="button"
                        class="register-btn text-light bg-orangeMediq border border-solid border-orangeMediq rounded-md w-auto flex-1 sm:max-w-[10rem] lg:max-w-[12rem] 4xl:max-w-[300px] py-2 4xl:py-3 hover:bg-brightOrangeMediq transition-colors duration-300">
                        @lang('labels.book_now')
                    </button>
                </div>
                @endif

            <!-- </div> -->
        </div>
    </article>
</div>
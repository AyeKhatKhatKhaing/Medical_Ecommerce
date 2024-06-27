@php 
    $decideLater = App\Models\OptionDecideLater::where('recipient_id',$recipient->id)->where('group_id',$group->id)->first();
@endphp
<div id="me-checkout-cancer-markers-popup"
    class="hidden me-checkout-cancer-markers-popup me-checkout-cancer-markers-popup-receipientData{{$group->id}}{{$recipient->id}}">
    <div
        class="me-checkout-cancer-markers-popup-content px-5 lg:pb-10 pb-5 pt-5 rounded-[12px] xl:min-w-[1060px] max-w-[1060px] min-w-[90%] overflow-y-auto">
        <div class="relative w-full">
            <button class="z-[1] absolute top-0 right-0 focus-visible:outline-none focus:outline-none p-1"
                id="me-checkout-cancer-markers-popup-close-btn" data-items="{{$recItem}}" data-optional_decide_later="{{isset($decideLater) && $decideLater->is_decide_later == true ? 1 : 0}}"
                data-id="receipientData{{$group->id}}{{$recipient->id}}"><img class=" w-auto h-auto align-middle"
                    src="{{asset('frontend/img/custom-close.svg')}}" alt=""></button>
            <input type="hidden" class="cancer-markers-selected-id" />
            <div class="cancer-markers-option-content">
                <div class="flex flex-wrap items-center">
                    <h3 class="font-bold me-body-20 text-darkgray text-left">
                        @if(lang() == 'en'){{__('labels.check_out.select')}} {{langbind($group,'name')}}@else{{__('labels.check_out.select')}}{{langbind($group,'name')}}@endif</h3><span class="me-body18 font-normal text-darkgray text-left">
                            @if(lang() == 'en')
                            (<span class="cancer-markers-selected-value-receipientData{{$group->id}}{{$recipient->id}}"></span> @lang('labels.check_out.selected'))
                            @else
                            ({{__('labels.check_out.selected')}}<span class="cancer-markers-selected-value-receipientData{{$group->id}}{{$recipient->id}}"></span>{{__('labels.product_detail.items')}})
                            @endif
                        </span>
                </div>
                <div class="mr-6 flex items-center mt-4 ">
                    @if(lang() == 'en')
                    <p class="font-normal me-body-16 text-darkgray">@lang('labels.check_out.how_to_choose') {{langbind($group,'name')}}?</p>
                    @else 
                    <p class="font-normal me-body-16 text-darkgray">@lang('labels.check_out.how_to_choose'){{langbind($group,'name')}}?</p>
                    @endif
                        <button type="button" role="button"
                            class="plan-tooltip-btn">
                            <div class="w-auto h-auto align-middle">
                                <svg width="20" height="20" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.492 6.91C8.46974 6.78705 8.40225 6.6769 8.30283 6.60122C8.20341 6.52554 8.07926 6.48983 7.95482 6.50112C7.83039 6.51241 7.71469 6.56988 7.63051 6.66222C7.54633 6.75455 7.49977 6.87505 7.5 7V11.502L7.508 11.592C7.53026 11.7149 7.59775 11.8251 7.69717 11.9008C7.79659 11.9765 7.92074 12.0122 8.04518 12.0009C8.16961 11.9896 8.28531 11.9321 8.36949 11.8398C8.45367 11.7475 8.50023 11.6269 8.5 11.502V7L8.492 6.91ZM8.799 4.75C8.799 4.55109 8.71998 4.36032 8.57933 4.21967C8.43868 4.07902 8.24791 4 8.049 4C7.85009 4 7.65932 4.07902 7.51867 4.21967C7.37802 4.36032 7.299 4.55109 7.299 4.75C7.299 4.94891 7.37802 5.13968 7.51867 5.28033C7.65932 5.42098 7.85009 5.5 8.049 5.5C8.24791 5.5 8.43868 5.42098 8.57933 5.28033C8.71998 5.13968 8.799 4.94891 8.799 4.75ZM16 8C16 5.87827 15.1571 3.84344 13.6569 2.34315C12.1566 0.842855 10.1217 0 8 0C5.87827 0 3.84344 0.842855 2.34315 2.34315C0.842855 3.84344 0 5.87827 0 8C0 10.1217 0.842855 12.1566 2.34315 13.6569C3.84344 15.1571 5.87827 16 8 16C10.1217 16 12.1566 15.1571 13.6569 13.6569C15.1571 12.1566 16 10.1217 16 8ZM1 8C1 7.08075 1.18106 6.1705 1.53284 5.32122C1.88463 4.47194 2.40024 3.70026 3.05025 3.05025C3.70026 2.40024 4.47194 1.88463 5.32122 1.53284C6.1705 1.18106 7.08075 1 8 1C8.91925 1 9.8295 1.18106 10.6788 1.53284C11.5281 1.88463 12.2997 2.40024 12.9497 3.05025C13.5998 3.70026 14.1154 4.47194 14.4672 5.32122C14.8189 6.1705 15 7.08075 15 8C15 9.85652 14.2625 11.637 12.9497 12.9497C11.637 14.2625 9.85652 15 8 15C6.14348 15 4.36301 14.2625 3.05025 12.9497C1.7375 11.637 1 9.85652 1 8Z" fill="#333333"></path>
                                </svg>
                            </div>

                            <div class="plan-tooltip">
                                <p class="me-body16">
                                    {{__('labels.basic_info.please_select')}} {{$group->minimum_item}} {{__('labels.check_out.items')}}
                                </p>

                            </div>


                        </button>
                    {{-- <div class="card-tooltip">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="none">
                                <path
                                    d="M10.492 8.91C10.4697 8.78705 10.4023 8.6769 10.3028 8.60122C10.2034 8.52554 10.0793 8.48983 9.95482 8.50112C9.83039 8.51241 9.71469 8.56988 9.63051 8.66222C9.54633 8.75455 9.49977 8.87505 9.5 9V13.502L9.508 13.592C9.53026 13.7149 9.59775 13.8251 9.69717 13.9008C9.79659 13.9765 9.92074 14.0122 10.0452 14.0009C10.1696 13.9896 10.2853 13.9321 10.3695 13.8398C10.4537 13.7475 10.5002 13.6269 10.5 13.502V9L10.492 8.91ZM10.799 6.75C10.799 6.55109 10.72 6.36032 10.5793 6.21967C10.4387 6.07902 10.2479 6 10.049 6C9.85009 6 9.65932 6.07902 9.51867 6.21967C9.37802 6.36032 9.299 6.55109 9.299 6.75C9.299 6.94891 9.37802 7.13968 9.51867 7.28033C9.65932 7.42098 9.85009 7.5 10.049 7.5C10.2479 7.5 10.4387 7.42098 10.5793 7.28033C10.72 7.13968 10.799 6.94891 10.799 6.75ZM18 10C18 7.87827 17.1571 5.84344 15.6569 4.34315C14.1566 2.84285 12.1217 2 10 2C7.87827 2 5.84344 2.84285 4.34315 4.34315C2.84285 5.84344 2 7.87827 2 10C2 12.1217 2.84285 14.1566 4.34315 15.6569C5.84344 17.1571 7.87827 18 10 18C12.1217 18 14.1566 17.1571 15.6569 15.6569C17.1571 14.1566 18 12.1217 18 10ZM3 10C3 9.08075 3.18106 8.1705 3.53284 7.32122C3.88463 6.47194 4.40024 5.70026 5.05025 5.05025C5.70026 4.40024 6.47194 3.88463 7.32122 3.53284C8.1705 3.18106 9.08075 3 10 3C10.9193 3 11.8295 3.18106 12.6788 3.53284C13.5281 3.88463 14.2997 4.40024 14.9497 5.05025C15.5998 5.70026 16.1154 6.47194 16.4672 7.32122C16.8189 8.1705 17 9.08075 17 10C17 11.8565 16.2625 13.637 14.9497 14.9497C13.637 16.2625 11.8565 17 10 17C8.14348 17 6.36301 16.2625 5.05025 14.9497C3.7375 13.637 3 11.8565 3 10Z"
                                    fill="#333333" />
                            </svg>
                        </div>
                        <div class="px-3 py-2 max-w-[326px] absolute top-0 tooltip-box-shadow bg-whitez left-[-25px] top-[-40px]">
                            <div class="relative">
                                <p class="font-normal me-body-16 text-darkgray">Can select up to {{$group->minimum_item}} items</p>
                            </div>
                        </div>
                    </div> --}}
                </div>

                <div class="mt-3">
                    <input type="hidden" value="{{$group->minimum_item}}"
                        class="cancer-markers-min-selected-receipientData{{$group->id}}{{$recipient->id}}" />
                    <ul class="flex flex-wrap">
                        @if(count($optionGroupIds) > 0)
                        @foreach($optionGroupIds as $titem)
                        @php
                        $tableItem = App\Models\CheckUpItem::where('id',$titem)->first();
                        @endphp
                        <li data-total="{{$countEquivalentNumber}}"
                            data-count="{{$tableItem->equivalent_number == null ? 1 : $tableItem->equivalent_number }}"
                            data-text="{{langbind($tableItem,'name')}}" data-value="{{$tableItem->id}}"
                            class="me-body-16 flex items-center markers-tags cursor-pointer hover:border-orangeMediq hover:text-orangeMediq mr-[10px] mb-[10px] px-4 py-[10px] border-1 border-darkgray rounded-[4px] me-body-16 font-normal text-darkgray">
                            {{langbind($tableItem,'name')}}
                            <div class="ml-1">
                            @if ($tableItem->gender == 0)
                                <img src="{{ asset('frontend/img/male-gen.svg') }}"
                                    alt="male" class="gen-icon" />
                            @elseif($tableItem->gender == 1)
                                <img src="{{ asset('frontend/img/female-gen.svg') }}"
                                    alt="female" class="gen-icon" />
                            @endif
                            </div>
                        </li>
                        @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            
            <div class="flex xs:flex-row flex-col justify-between xs:items-center mt-3 lg:mt-5">
                <div class="form-group me-body18 text-left">
                    <label for="cancer-markers-decideLater-receipientData{{$group->id}}{{$recipient->id}}"
                        class="custom-radio-container inline-block relative">
                        <input type="checkbox" name="decide-laterreceipientData{{$group->id}}{{$recipient->id}}"
                            id="cancer-markers-decideLater-receipientData{{$group->id}}{{$recipient->id}}"
                            class="opacity-0 absolute" value="{{isset($decideLater) && $decideLater->is_decide_later == true ? true : false}}">
                        <span class="custom-radio-orange"></span>
                        <span class="ml-[30px]">@lang('labels.product_detail.decide_later')</span>
                    </label>
                </div>
                <form action="" id="updateCheckUpItemForm{{$group->id}}{{$recipient->id}}">
                    <div class="hidden">
                        <input type="hidden" name="recipient_id" value="{{$recipient->id}}">
                        <input type="hidden" name="group_id" value="{{$group->id}}">
                        <input type="hidden" name="product_id" value="{{$recipient->product_id}}">
                        <input name="check_up_items-{{$group->id}}{{$recipient->id}}"
                            data-id="receipientData{{$group->id}}{{$recipient->id}}" type="hidden"
                            value="{{ $recItem }}"
                            class="cancerMarkers-selected-tags-ids cancerMarkers-selected-tags-ids-receipientData{{$group->id}}{{$recipient->id}}" />
                        <input data-id="receipientData{{$group->id}}{{$recipient->id}}" type="hidden"
                            value="{{ $tableItems }}"
                            class="cancerMarkers-selected-tags cancerMarkers-selected-tagsreceipientData{{$group->id}}{{$recipient->id}}" />
                       {{-- <input type="checkbox" name="decide_laterreceipientData{{$group->id}}{{$recipient->id}}"
                            id="cancer-markers-decideLaterreceipientData{{$group->id}}{{$recipient->id}}"
                            class="opacity-0 absolute"> --}}
                            <input name="check_up_items_decide_later_{{$group->id}}{{$recipient->id}}" data-text="" data-id="receipientData{{$group->id}}{{$recipient->id}}" type="hidden" value="true"
                            class="cancerMarkers-decidelater cancerMarkers-decidelater-receipientData{{$group->id}}{{$recipient->id}}"/>
                    </div>
                    <button type="button" role="button" onclick="submitItem({{$group->id}},{{$recipient->id}})"
                        data-id="receipientData{{$group->id}}{{$recipient->id}}"
                        class="me-body-18 xs:mt-0 mt-2 checkout-cancer-markers-confirm text-light bg-orangeMediq rounded-md font-bold py-2 px-10 sm:py-[10px] max-w-[300px] xl:px-0 xl:w-[300px] hover:bg-brightOrangeMediq transition-colors duration-300">
                        @lang('labels.log_in_register.confirm')
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

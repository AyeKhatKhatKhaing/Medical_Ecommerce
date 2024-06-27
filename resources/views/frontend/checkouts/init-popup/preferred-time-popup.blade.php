<div id="preferred-time-popup"
    class="hidden preferred-time-popup preferred-time-popup-receipientData{{$recipient->id}}">
    <div
        class="preferred-time-popup-content overflow-visible px-5 rounded-[12px] xl:min-w-[1060px] max-w-[1060px] min-w-[90%] max-h-[80%]">
        <div class="w-full h-full overflow-y-auto pt-2 pb-5 lg:pb-10 lg:pt-4">
            <button data-id="receipientData{{$recipient->id}}" data-date="{{$recipient->date}}" data-decide_later="{{$recipient->is_prefer_time_decide_later}}"
                class="z-[1] absolute top-5 right-5 focus-visible:outline-none focus:outline-none p-1"
                id="checkout-time-popup"><img class=" w-auto h-auto align-middle"
                    src="{{asset('frontend/img/custom-close.svg')}}" alt=""></button>
            <div class="me-body18 custom-position">
                <div class="">
                    <div class="flex justify-between">
                        <h3 class="font-bold me-body-20 text-darkgray text-left">
                        @lang('labels.product_detail.select_time')</h3>
                    </div>
                    <div class="flex sm:flex-row flex-col">
                        @php $timeSlots = App\Models\TimeSlotTag::whereIn('id', $recipient->product->time_slot_tag_ids_arr)->get(); @endphp
                        @if(count($timeSlots) > 0)
                        @foreach ($timeSlots as $item)
                        <div class="mr-6 flex items-center">
                            <p class="font-normal me-body-16 text-darkgray mr-1">
                            {{ langbind($item, 'name') }}</p>
                            <div class="card-tooltip">
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                        fill="none">
                                        <path
                                            d="M10.492 8.91C10.4697 8.78705 10.4023 8.6769 10.3028 8.60122C10.2034 8.52554 10.0793 8.48983 9.95482 8.50112C9.83039 8.51241 9.71469 8.56988 9.63051 8.66222C9.54633 8.75455 9.49977 8.87505 9.5 9V13.502L9.508 13.592C9.53026 13.7149 9.59775 13.8251 9.69717 13.9008C9.79659 13.9765 9.92074 14.0122 10.0452 14.0009C10.1696 13.9896 10.2853 13.9321 10.3695 13.8398C10.4537 13.7475 10.5002 13.6269 10.5 13.502V9L10.492 8.91ZM10.799 6.75C10.799 6.55109 10.72 6.36032 10.5793 6.21967C10.4387 6.07902 10.2479 6 10.049 6C9.85009 6 9.65932 6.07902 9.51867 6.21967C9.37802 6.36032 9.299 6.55109 9.299 6.75C9.299 6.94891 9.37802 7.13968 9.51867 7.28033C9.65932 7.42098 9.85009 7.5 10.049 7.5C10.2479 7.5 10.4387 7.42098 10.5793 7.28033C10.72 7.13968 10.799 6.94891 10.799 6.75ZM18 10C18 7.87827 17.1571 5.84344 15.6569 4.34315C14.1566 2.84285 12.1217 2 10 2C7.87827 2 5.84344 2.84285 4.34315 4.34315C2.84285 5.84344 2 7.87827 2 10C2 12.1217 2.84285 14.1566 4.34315 15.6569C5.84344 17.1571 7.87827 18 10 18C12.1217 18 14.1566 17.1571 15.6569 15.6569C17.1571 14.1566 18 12.1217 18 10ZM3 10C3 9.08075 3.18106 8.1705 3.53284 7.32122C3.88463 6.47194 4.40024 5.70026 5.05025 5.05025C5.70026 4.40024 6.47194 3.88463 7.32122 3.53284C8.1705 3.18106 9.08075 3 10 3C10.9193 3 11.8295 3.18106 12.6788 3.53284C13.5281 3.88463 14.2997 4.40024 14.9497 5.05025C15.5998 5.70026 16.1154 6.47194 16.4672 7.32122C16.8189 8.1705 17 9.08075 17 10C17 11.8565 16.2625 13.637 14.9497 14.9497C13.637 16.2625 11.8565 17 10 17C8.14348 17 6.36301 16.2625 5.05025 14.9497C3.7375 13.637 3 11.8565 3 10Z"
                                            fill="#333333" />
                                    </svg>
                                </div>
                                <div
                                    class="px-3 py-2 xl:max-w-[326px] max-w-[250px] absolute tooltip-box-shadow tooltip-box-shadow1 bg-whitez lg:top-0 top-[13%] left-[18.5%] -translate-x-1/2">
                                    <div class="relative">
                                        <p class="font-normal me-body-16 text-darkgray">
                                        {!! langbind($item, 'remind_notice') !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
                <div class="choose-time-container sm:flex w-full sm:justify-between mt-4">
                    <div
                        class="choose-time-loc custom-scrollbar-rounded-gray overflow-y-auto max-h-28 sm:max-h-60 md:w-40 lg:w-60 xl:w-80 lg:max-h-[260px]">
                        <ul class="checkout-branches-receipientData{{$recipient->id}}"
                            id="checkout-branches-receipientData{{$recipient->id}}">
                        </ul>
                    </div>
                    <div class="choose-time-picker px-2 2xs:px-5 mt-4 sm:mt-0 max-w-[24.375rem] flex-1">
                        <div id='preferred-time-calendar-receipientData{{$recipient->id}}'
                            data-id="receipientData{{$recipient->id}}" class="h-full preferred-time-calendar me-body16">
                        </div>
                    </div>

                    <div class="choose-time-selected px-2 2xs:px-5 mt-4 sm:mt-0 sm:pl-0 lg:w-56 xl:w-72">
                        <div id="choosedDate-current-receipientData{{$recipient->id}}"
                            class="font-bold choosedDate-current-receipientData{{$recipient->id}}">Monday, Apr 24</div>
                        <input type="hidden" name="selectedDate-1" id="selectedDate-1" value="">
                        <div
                            class="form-group mt-4 sm:mt-5 max-h-80 overflow-y-auto custom-scrollbar-rounded-gray checkout-booking-time-container-receipientData{{$recipient->id}} checkout-booking-time-container">

                        </div>
                    </div>
                </div>

                <div class="choose-time-address flex px-2 2xs:px-5 items-center mt-4 max-w-xs me-body14">
                    <span><img src="{{asset('frontend/img/uicons_location.png')}}" alt=""
                            class="w-auto h-auto align-middle mr-1"></span>
                    <span id="checkout-branch-address-receipientData{{$recipient->id}}"
                        class="checkout-branch-address">11/F., JD Mall,
                        233-239 Nathan Road, Jordan</span>
                </div>

                <div class="px-2 2xs:px-5">
                    <hr class="w-full my-5 border-mee4">
                </div>

                <div class="flex flex-row justify-between xs:items-center mobile_sticky_button">
                    <div class="form-group me-body18 mt-3 lg:mt-5 text-left">
                        <label for="decideLater-{{$recipient->id}}"
                            class="custom-radio-container inline-block relative">
                            <input type="checkbox" name="decide-later-receipientData{{$recipient->id}}"
                                id="decideLater-{{$recipient->id}}" {{$recipient->is_prefer_time_decide_later == true ? 'checked' : ''}}>
                            <span class="custom-radio-orange"></span>
                            <span class="ml-[30px] me-body-18">
                                @lang('labels.product_detail.decide_later')</span>
                        </label>
                    </div>
                    <div class="hidden">
                        <input type="hidden" class="checkout-location" />
                        <input type="hidden" class="checkout-date" />
                        <input type="hidden" class="checkout-time" />
                    </div>
                    <form action="" id="updateCheckUpLocation{{$recipient->id}}">
                        <div class="hidden">
                            <input type="hidden" name="recipient_id" value="{{$recipient->id}}">
                            <input data-id="receipientData{{$recipient->id}}" type="hidden"
                                value="{{isset($recipient->area) ? langbind($recipient->area,'name') : ''}}"
                                class="checkout-data-location checkout-locationreceipientData{{$recipient->id}}" />
                            <input name="location_id" data-id="receipientData{{$recipient->id}}" type="hidden"
                                value="{{$recipient->location}}"
                                class="checkout-data-location-id checkout-location-idreceipientData{{$recipient->id}}" />
                            <input name="date" data-id="receipientData{{$recipient->id}}" type="hidden"
                                value="{{isset($recipient->date) ? date('d M Y', strtotime($recipient->date)) : ''}}"
                                class="checkout-data-location-date checkout-datereceipientData{{$recipient->id}}" />
                            <input name="time" data-id="receipientData{{$recipient->id}}" type="hidden"
                                value="{{$recipient->time}}"
                                class="checkout-data-location-time checkout-timereceipientData{{$recipient->id}}" />
                            <input name="decide-laterreceipientData{{$recipient->id}}"
                                data-id="receipientData{{$recipient->id}}" type="hidden"
                                value="{{$recipient->is_prefer_time_decide_later}}"
                                class="checkout-data-decidelater checkout-decidelaterreceipientData{{$recipient->id}}">
                        </div>
                        <input type="hidden" name="order_details_edit" value="{{isset($recipient->order_details_edit)?$recipient->order_details_edit:0}}">
                        <button data-id="receipientData{{$recipient->id}}" type="button"
                            onclick="submitLocation({{$recipient->id}})" role="button"
                            class="xs:mt-0 mt-2 checkout-date-confirm text-light bg-orangeMediq rounded-md font-bold py-2 px-10 sm:py-[10px] max-w-[300px] xl:px-0 xl:w-[300px] hover:bg-brightOrangeMediq transition-colors duration-300">
                            @lang('labels.log_in_register.confirm')
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

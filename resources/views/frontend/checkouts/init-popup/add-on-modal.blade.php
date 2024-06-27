<div id="me-checkout-addson-popup"
    class="hidden me-checkout-addson-popup me-checkout-addson-popup-receipientData{{$recipient->id}}">
    <div
        class="me-checkout-addson-popup-content px-5 lg:py-10 py-5 rounded-[12px] xl:min-w-[1060px] max-w-[1060px] min-w-[90%] max-h-[80%] overflow-y-auto">
        <div class="relative w-full">
            <button data-id="receipientData{{$recipient->id}}"
                class="z-[1] absolute top-0 right-0 focus-visible:outline-none focus:outline-none p-1"
                id="me-checkout-addson-popup-close-btn"><img class=" w-auto h-auto align-middle"
                    src="{{asset('frontend/img/custom-close.svg')}}" alt=""></button>
            <input type="hidden" class="addson-selected-id" />
            <div>
                <div class="flex items-center">
                    <h3 class="font-bold me-body-20 text-darkgray">@lang('labels.check_out.select_add_on_items')</h3>
                </div>

                @if($recipient->product)
                <div class="mr-6 flex items-center">
                    <p class="mt-4 font-normal me-body-16 text-darkgray text-left">
                        {!! langbind($recipient->product, 'add_on_reminder') !!}
                    </p>
                </div>
                @endif

                <div class="mt-3">
                    <ul class="px-5 py-5 bg-far">
                        <input class="hidden adds-on-total-count-receipientData{{$recipient->id}}"
                            value="{{count($recipient->product->add_on_item_data)}}">
                        @if(count($recipient->product->add_on_item_data) > 0)
                        @foreach($recipient->product->add_on_item_data as $key => $item)
                        <li data-value="{{ $item->id }}" data-price="{{ $item->original_price }}"
                            data-text="{{ langbind($item,'name') }}" data-discount="{{ $item->discount_price }}"
                            class="flex items-start justify-between mb-1 last:mb-0 lg:mb-2 lg:last:mb-0">
                            <div class="flex items-start">
                                <label for="addson-checklist-receipientData{{$item->id}}"
                                    class="flex-wrap custom-checkbox-label flex items-start mr-1 last:mr-0 lg:mr-2 lg:last:mr-0">
                                    <input type="checkbox" name="addson-checklist-receipientData{{$recipient->id}}"
                                        id="addson-checklist-receipientData{{$item->id}}" value="" class="mt-[2px]">
                                    <span class="custom-checkbox-orange mt-[2px]"></span>
                                    <span
                                        class="{{$item->recommend_item == 1 || $item->recommend_item == 2 ? 'font-bold' : 'font-normal'}} me-body-18 text-left ml-6 4xl:ml-[30px] flex items-center flex-wrap mr-2 leading-[normal]">
                                        {{ langbind($item,'name') }}
                                        @if(langbind($item,'description') != null)
                                        <button type="button" class="plan-tooltip-btn mx-2">
                                            <div class="w-auto h-auto align-middle">
                                                <svg width="20" height="20" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.492 6.91C8.46974 6.78705 8.40225 6.6769 8.30283 6.60122C8.20341 6.52554 8.07926 6.48983 7.95482 6.50112C7.83039 6.51241 7.71469 6.56988 7.63051 6.66222C7.54633 6.75455 7.49977 6.87505 7.5 7V11.502L7.508 11.592C7.53026 11.7149 7.59775 11.8251 7.69717 11.9008C7.79659 11.9765 7.92074 12.0122 8.04518 12.0009C8.16961 11.9896 8.28531 11.9321 8.36949 11.8398C8.45367 11.7475 8.50023 11.6269 8.5 11.502V7L8.492 6.91ZM8.799 4.75C8.799 4.55109 8.71998 4.36032 8.57933 4.21967C8.43868 4.07902 8.24791 4 8.049 4C7.85009 4 7.65932 4.07902 7.51867 4.21967C7.37802 4.36032 7.299 4.55109 7.299 4.75C7.299 4.94891 7.37802 5.13968 7.51867 5.28033C7.65932 5.42098 7.85009 5.5 8.049 5.5C8.24791 5.5 8.43868 5.42098 8.57933 5.28033C8.71998 5.13968 8.799 4.94891 8.799 4.75ZM16 8C16 5.87827 15.1571 3.84344 13.6569 2.34315C12.1566 0.842855 10.1217 0 8 0C5.87827 0 3.84344 0.842855 2.34315 2.34315C0.842855 3.84344 0 5.87827 0 8C0 10.1217 0.842855 12.1566 2.34315 13.6569C3.84344 15.1571 5.87827 16 8 16C10.1217 16 12.1566 15.1571 13.6569 13.6569C15.1571 12.1566 16 10.1217 16 8ZM1 8C1 7.08075 1.18106 6.1705 1.53284 5.32122C1.88463 4.47194 2.40024 3.70026 3.05025 3.05025C3.70026 2.40024 4.47194 1.88463 5.32122 1.53284C6.1705 1.18106 7.08075 1 8 1C8.91925 1 9.8295 1.18106 10.6788 1.53284C11.5281 1.88463 12.2997 2.40024 12.9497 3.05025C13.5998 3.70026 14.1154 4.47194 14.4672 5.32122C14.8189 6.1705 15 7.08075 15 8C15 9.85652 14.2625 11.637 12.9497 12.9497C11.637 14.2625 9.85652 15 8 15C6.14348 15 4.36301 14.2625 3.05025 12.9497C1.7375 11.637 1 9.85652 1 8Z" fill="#333333"></path>
                                                </svg>
                                            </div>
                                            <div class="plan-tooltip me-body16 text-darkgray">
                                                <p><span>{!! langbind($item, 'description') !!}</span></p>
                                            </div>
                                        </button>
                                        @endif
                                        @if($item->recommend_item == 1)
                                        <span class="me-body14 flex items-center"><span class="text-orangeMediq bg-orangeLight py-1 px-2 rounded mr-[2px]">
                                        {{__('labels.product_detail.most_popular') }}
                                        </span>
                                        <img src="{{asset('frontend/img/mdi-light_thumb-up.svg')}}" alt="thumb up">
                                        </span>
                                        @elseif($item->recommend_item == 2)
                                        <span class="me-body14 flex items-center"><span class="text-orangeMediq bg-orangeLight py-1 px-2 rounded mr-[2px]">
                                        {{__('labels.product_detail.hot') }}
                                        </span>
                                        <img src="{{asset('frontend/img/ant-design_fire-filled.svg')}}" alt="thumb up">
                                        </span>
                                        @endif
                                        
                                    </span>
                                    @if($item->discount_price != null)
                                    <span class="line-through mr-3 me-body-16">${{number_format($item->original_price) }}</span>
                                    @endif
                                    <span class="text-orangeMediq bg-orangeLight px-2 font-bold text-left"></span>
                                </label>
                                <div class="ml-1 hidden">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="19" viewBox="0 0 16 19"
                                        fill="none">
                                        <g clip-path="url(#clip0_5330_58533)">
                                            <path
                                                d="M-4 8.00016H-1C-0.734784 8.00016 -0.48043 8.10551 -0.292893 8.29305C-0.105357 8.48059 0 8.73494 0 9.00016V13.5002V18.0002C0 18.2654 -0.105357 18.5197 -0.292893 18.7073C-0.48043 18.8948 -0.734784 19.0002 -1 19.0002H-4C-4.26522 19.0002 -4.51957 18.8948 -4.70711 18.7073C-4.89464 18.5197 -5 18.2654 -5 18.0002V9.00016C-5 8.73494 -4.89464 8.48059 -4.70711 8.29305C-4.51957 8.10551 -4.26522 8.00016 -4 8.00016ZM-4 9.00016V18.0002H-1V9.00016H-4ZM11.72 17.0302L14.72 12.0302C14.9 11.7302 15 11.3702 15 11.0002V10.0002C15 9.46972 14.7893 8.96102 14.4142 8.58594C14.0391 8.21087 13.5304 8.00016 13 8.00016H7.39L8.85 2.56016V2.54016C8.89735 2.37157 8.89818 2.19332 8.8524 2.0243C8.80663 1.85528 8.71595 1.7018 8.59 1.58016L2.59 7.59016C2.22 7.95016 2 8.45016 2 9.00016V16.0002C2 16.5306 2.21071 17.0393 2.58579 17.4144C2.96086 17.7894 3.46957 18.0002 4 18.0002H10C10.73 18.0002 11.37 17.6102 11.72 17.0302ZM16 11.0002C16 11.5902 15.83 12.1502 15.53 12.6102L12.62 17.4502C12.11 18.3802 11.13 19.0002 10 19.0002H4C3.20435 19.0002 2.44129 18.6841 1.87868 18.1215C1.31607 17.5589 1 16.7958 1 16.0002V9.00016C1 8.17016 1.34 7.42016 1.88 6.88016L8.59 0.160156L9.3 0.870156C9.83 1.40016 10 2.16016 9.81 2.84016L8.69 7.00016H13C13.7956 7.00016 14.5587 7.31623 15.1213 7.87884C15.6839 8.44144 16 9.20451 16 10.0002V11.0002Z"
                                                fill="#FF8201" />
                                            <path
                                                d="M11.72 17.0302L14.72 12.0302C14.9 11.7302 15 11.3702 15 11.0002V10.0002C15 9.46972 14.7893 8.96102 14.4142 8.58594C14.0391 8.21087 13.5304 8.00016 13 8.00016H7.39L8.85 2.56016V2.54016C8.89735 2.37157 8.89818 2.19332 8.8524 2.0243C8.80663 1.85528 8.71595 1.7018 8.59 1.58016L2.59 7.59016C2.22 7.95016 2 8.45016 2 9.00016V16.0002C2 16.5306 2.21071 17.0393 2.58579 17.4144C2.96086 17.7894 3.46957 18.0002 4 18.0002H10C10.73 18.0002 11.37 17.6102 11.72 17.0302Z"
                                                fill="#FF8201" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_5330_58533">
                                                <rect width="16" height="19" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                            </div>
                            <span
                                class="service-price text-orangeMediq font-bold me-body-18">+${{$item->discount_price != null ? number_format($item->discount_price) : number_format($item->original_price) }}</span>
                        </li>
                        @endforeach
                        @endif

                    </ul>
                </div>
            </div>
            <div class="flex flex-row justify-between items-center mt-3 lg:mt-5  mobile_sticky_button">
                <div class="form-group me-body18 text-left">
                    <label for="addson-noaddition{{$recipient->id}}"
                        class="custom-radio-container inline-block relative">
                        <input type="checkbox" name="addson-noaddition-receipientData{{$recipient->id}}"
                            id="addson-noaddition{{$recipient->id}}" class="opacity-0 absolute">
                        <span class="custom-radio-orange"></span>
                        <span class="ml-[30px]">@lang('labels.check_out.no_addition')</span>
                    </label>
                </div>
                @php
                $reciAddOns = $recipient->recipient_add_on_items()->pluck('add_on_item_id')->toArray();
                $addOns =
                App\Models\AddOnItem::select('id','name_en','original_price','discount_price')->whereIn('id',$reciAddOns)->get();
                @endphp
                <form action="" id="updateAddOnForm{{$recipient->id}}">
                    <div class="hidden">
                        <input type="hidden" name="recipient_id" value="{{$recipient->id}}">
                        <input type="hidden" name="product_id" value="{{$recipient->product_id}}">
                        <input name="add_on_items" data-id="receipientData{{$recipient->id}}"
                            value='{{json_encode($addOns)}}' type="hidden"
                            class="addson-checklist addson-checklist-receipientData{{$recipient->id}}" />
                        <input name="addson-noaddition-receipientData{{$recipient->id}}" data-id="{{$recipient->id}}"
                            value="{{$recipient->is_add_on_decide_later}}" type="hidden"
                            class="addson-checklist-decideLater addson-checklist-decideLater-receipientData{{$recipient->id}}" />
                    </div>
                    <button data-id="receipientData{{$recipient->id}}" onclick="submitAddOn({{$recipient->id}})"
                        type="button" role="button"
                        class="me-body-18 xs:mt-0 mt-2 checkout-addson-confirm text-light bg-orangeMediq rounded-md font-bold py-2 px-10 sm:py-[10px] xs:max-w-[300px] max-w-full xl:px-0 xl:w-[300px] hover:bg-brightOrangeMediq transition-colors duration-300">
                        @lang('labels.log_in_register.confirm')
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .plan-option aside .custom-checkbox-container input[type=checkbox]:checked+.custom-checkbox-btn {
        background-color: transparent !important;
        border-color: black !important;
        color: black !important;

    }

    .plan-option aside .custom-checkbox-container .custom-checkbox-btn {
        cursor: default !important;
    }
</style>
<section id="plan-option" class="plan-option">
    <div class="plan-option-container text-darkgray py-8 md:flex justify-between relative">
        <div class="plan-option-content md:w-fit md:max-w-[70%] md:mr-4 xl:max-w-[71.25rem]  4xl:mr-10">
            <h2 class="plan-option-title font-bold me-body28 mb-4">@lang('labels.product_detail.plan_option')</h2>
            <form action="{{ route('bookNow') }}" method="post" id="submitAddBtn" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="product_type" value="{{ $product->product_type }}">
                <div
                    class="plan-option-tab-btns border-b-4 border-solid border-orangeMediq flex justify-between items-end">
                    @if ($product->is_two_recipient == false)
                        <ul id="tabBtnLists"
                            class="text-lightgray me-body20 font-bold flex items-center">
                            <li class="mr-1 xl:mr-2 4xl:mr-3">
                                <button type="button" role="button" id="recipientBtn1"
                                    class="tab-btn btn-active py-1 lg:py-2 4xl:py-3 px-3 lg:px-5 4xl:px-10 bg-meBg rounded-lg rounded-b-none text-16 xl:text-20"
                                    onclick="openPlanOptTab('1')"><span class="hidden xl:inline-block">@lang('labels.product_detail.recipient')</span> 1</button>
                            </li>
                        </ul>
                        <div id="addTabGroup" class="me-body20 flex items-center mb-1 xl:mb-0">
                            <button type="button" role="button" id="removePlanOptTab" class="add-tab-unavailable rounded-l-[4px]">
                            -
                            </button>
                            <div id="addTabList" class="flex items-center">
                            <button type="button" role="button" id="addTabNumber" class="add-tab-number">
                                1
                            </button>
                            </div>
                            <button type="button" role="button" data-component="option-2" id="addPlanOptTab" class="add-tab-available rounded-r-[4px] select-opt-handler">
                            +
                            </button>
                        </div>
                    @else
                        <ul class="
            text-lightgray me-body20 font-bold flex items-center
          ">
                            <li class="mr-2 4xl:mr-3">
                                <button type="button" role="button" id="recipientBtn1"
                                    class="tab-btn btn-active py-2 4xl:py-3 px-5 4xl:px-10 bg-meBg rounded-lg rounded-b-none"
                                    onclick="openPlanOptTab('1')">@lang('labels.product_detail.recipient') 1</button>
                            </li>
                            <li class="mr-2 4xl:mr-3">
                                <button type="button" role="button" id="recipientBtn2"
                                    class="tab-btn py-2 4xl:py-3 px-5 4xl:px-10 bg-meBg rounded-lg rounded-b-none"
                                    onclick="openPlanOptTab('2')">@lang('labels.product_detail.recipient') 2</button>
                            </li>
                        </ul>
                    @endif
                </div>
                @if($product->product_type == 3)
                @include('frontend.product_details.product_types.product_9')
                @else
                @include('frontend.product_details.product_types.common')
                @endif
               
            </form>
        </div>
        <aside
            class="plan-option-sidebar mt-5 w-full md:w-fit md:max-w-[30%] md:mt-[86px] xl:max-w-[23.75rem] lg:mt-24 4xl:mt-[109px] bg-white border border-solid border-mee4 shadow-[0px_4px_15px_2px_rgba(0,0,0,0.1)] rounded-xl py-5 h-fit overflow-y-auto scrollbar-hide z-[1]">
            <div class="sidebar-container px-3 xl:px-4 4xl:px-5 max-h-[352px] h-full overflow-y-auto scrollbar-hide">
                <div class="sidebar-header">
                    <h2 class="text-darkgray me-body20 font-bold flex items-center justify-between mb-3">
                        <span>@lang('labels.product_detail.plan_information')
                        </span>
                        <button id="open-plan-info-popup">
                            <img src="{{ asset('frontend/img/arrow-up-right.svg') }}" alt="open modal box"
                                class="w-auto h-auto align-middle">
                        </button>
                    </h2>
                    <div class="form-group me-body16 mb-5">
                        @if (count($supplementaries) > 0)
                            @foreach ($supplementaries->take(3) as $item)
                                <label for="non-refundable-popup" class="inline-block border-1 border-darkgray py-2 mr-1 last:mr-0 mb-1 last:mb-0 lg:mb-2 lg:last:mb-0 rounded-[50px] px-5">
                                    <span class="custom-checkbox-btn">{{ langbind($item, 'name') }}</span>
                                </label>
                            @endforeach
                        @endif
                    </div>
                    <hr class="border border-solid border-mee4 hrborder-true">
                </div>
                <div class="sidebar-body h-fit max-h-[35rem] overflow-y-auto scrollbar-hide ">
                    <div class="mt-2 xl:mt-4 popup-body-container active">
                        {{-- <div data-id="0"
                            class="popup-info-header flex items-center justify-between cursor-pointer bg-tagbg rounded-lg p-[10px] sm:px-5">
                            <h3 class="me-body20 font-bold">@lang('labels.product_detail.plan_information')</h3>
                            <img class="plan-info-accordion-icon" src="./img/accordion-open.svg" alt="">
                        </div> --}}
                        <div data-id="0"
                            class="popup-info-header flex items-center justify-between cursor-pointer bg-tagbg rounded-lg p-[10px] sm:px-5">
                            <h3 class="me-body20 font-bold">{{ langbind($planDescription, 'name') }}</h3>
                            <img class="plan-info-accordion-icon"
                                src="{{ asset('frontend/img/accordion-open.svg') }}" alt="">
                        </div>

                        <div id="planInfoAccordion0" class="popup-info-items me-body18">
                            <div class="pt-[10px] sm:pt-5 px-[10px] sm:px-5">
                                {!! langbind($planDescription, 'content') ?? '' !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <dialog data-info-modal="" id="plan-info-popup"
            class="plan-info-popup z-[999] rounded-xl p-0 text-darkgray lg:max-w-[56.25rem] max-h-[80%] 7xl:max-h-[756px] scrollbar-hide hidden">
            <div class="plan-info-popup-container">
                <div class="popup-header bg-paleblue p-5 sticky top-0 xl:p-10 z-[1]">
                    <div class="flex justify-between relative ">
                        <h2 class="me-body28 font-bold">
                            @lang('labels.product_detail.plan_information')
                        </h2>
                        {{-- <button class="p-1" id="close-plan-info-popup"><img class=" w-auto h-auto align-middle"
                                src="{{ asset('frontend/img/close-btn.png') }}" alt="">
                        </button> --}}
                        <button class="p-1 absolute -top-2 -right-2 xl:-top-4 xl:-right-4" id="close-plan-info-popup">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                              <path d="M17.3998 0.613387C17.2765 0.489783 17.1299 0.391719 16.9686 0.324811C16.8073 0.257902 16.6344 0.223462 16.4598 0.223462C16.2852 0.223462 16.1123 0.257902 15.951 0.324811C15.7897 0.391719 15.6432 0.489783 15.5198 0.613387L8.99981 7.12005L2.47981 0.600054C2.35637 0.476611 2.20982 0.378691 2.04853 0.311885C1.88725 0.245078 1.71438 0.210693 1.53981 0.210693C1.36524 0.210693 1.19237 0.245078 1.03109 0.311885C0.8698 0.378691 0.723252 0.476611 0.59981 0.600054C0.476367 0.723496 0.378447 0.870044 0.31164 1.03133C0.244834 1.19261 0.210449 1.36548 0.210449 1.54005C0.210449 1.71463 0.244834 1.88749 0.31164 2.04878C0.378447 2.21006 0.476367 2.35661 0.59981 2.48005L7.11981 9.00005L0.59981 15.5201C0.476367 15.6435 0.378447 15.79 0.31164 15.9513C0.244834 16.1126 0.210449 16.2855 0.210449 16.4601C0.210449 16.6346 0.244834 16.8075 0.31164 16.9688C0.378447 17.1301 0.476367 17.2766 0.59981 17.4001C0.723252 17.5235 0.8698 17.6214 1.03109 17.6882C1.19237 17.755 1.36524 17.7894 1.53981 17.7894C1.71438 17.7894 1.88725 17.755 2.04853 17.6882C2.20982 17.6214 2.35637 17.5235 2.47981 17.4001L8.99981 10.8801L15.5198 17.4001C15.6433 17.5235 15.7898 17.6214 15.9511 17.6882C16.1124 17.755 16.2852 17.7894 16.4598 17.7894C16.6344 17.7894 16.8072 17.755 16.9685 17.6882C17.1298 17.6214 17.2764 17.5235 17.3998 17.4001C17.5233 17.2766 17.6212 17.1301 17.688 16.9688C17.7548 16.8075 17.7892 16.6346 17.7892 16.4601C17.7892 16.2855 17.7548 16.1126 17.688 15.9513C17.6212 15.79 17.5233 15.6435 17.3998 15.5201L10.8798 9.00005L17.3998 2.48005C17.9065 1.97339 17.9065 1.12005 17.3998 0.613387Z" fill="#333333"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="form-group me-body16 mt-5">
                        @if (count($supplementaries) > 0)
                            @foreach ($supplementaries as $item)
                                <label for="non-refundable-popup" class="inline-block border-1 border-darkgray py-2 mr-1 last:mr-0 mb-1 last:mb-0 lg:mb-2 lg:last:mb-0 rounded-[50px] px-5">
                                    <span class="custom-checkbox-btn">{{ langbind($item, 'name') }}</span>
                                </label>
                            @endforeach
                        @endif
                        {{-- <label for="non-refundable-popup"
                            class="inline-block border-1 border-darkgray py-2 mr-1 last:mr-0 mb-1 last:mb-0 lg:mb-2 lg:last:mb-0 rounded-[50px]">
                            <!-- <input type="checkbox" name="non-refundable-popup" id="non-refundable-popup" value="" /> -->
                            <span class="custom-checkbox-btn rounded-[50px] py-2 px-5">@lang('labels.product_detail.none_refund')</span>
                        </label>
                        <label for="free-change-popup"
                            class="inline-block border-1 border-darkgray py-2 mr-1 last:mr-0 mb-1 last:mb-0 lg:mb-2 lg:last:mb-0 rounded-[50px]">
                            <!-- <input type="checkbox" name="free-change-popup" id="free-change-popup" value="" /> -->
                            <span class="custom-checkbox-btn rounded-[50px] py-2 px-5">@lang('labels.product_detail.free_change')</span>
                        </label>
                        <label for="validity-period-popup"
                            class="inline-block border-1 border-darkgray py-2 mr-1 last:mr-0 mb-1 last:mb-0 lg:mb-2 lg:last:mb-0 rounded-[50px]">
                            <!-- <input type="checkbox" name="validity-period-popup" id="validity-period-popup" value="" /> -->
                            <span class="custom-checkbox-btn rounded-[50px] py-2 px-5">@lang('labels.product_detail.use_within')</span>
                        </label> --}}
                    </div>
                </div>
                <div class="popup-body bg-light px-5 xl:px-10 py-2 xl:py-5">
                    <div class="my-2 xl:my-4 popup-body-container active">
                        <div data-id="0"
                            class="popup-info-header flex items-center justify-between cursor-pointer bg-tagbg rounded-lg p-[10px] sm:px-5">
                            {{-- <h3 class="me-body20 font-bold">{{ langbind($planDescription, 'name') ?? '' }}</h3> --}}
                            <h3 class="me-body20 font-bold">{{ langbind($planDescription, 'name') }}</h3>

                            <img class="plan-info-accordion-icon"
                                src="{{ asset('frontend/img/accordion-open.svg') }}" alt="">
                            {{-- <h3 class="me-body20 font-bold">@lang('labels.product_detail.plan_description')</h3>
                            <img class="plan-info-accordion-icon"
                                src="{{ asset('frontend/img/accordion-open.svg') }}" alt=""> --}}
                        </div>
                        <div id="popupInfoAccordion0" class="popup-info-items me-body18">
                            <div class="pt-[10px] sm:pt-5 px-[10px] sm:px-5">
                                {!! langbind($planDescription, 'content') ?? '' !!}
                            </div>
                        </div>
                    </div>
                    <div class="my-2 xl:my-4 popup-body-container active">
                        <div data-id="1"
                            class="popup-info-header flex items-center justify-between cursor-pointer bg-tagbg rounded-lg p-[10px] sm:px-5">
                            <h3 class="me-body20 font-bold">{{ langbind($planProcess, 'name') ?? '' }}</h3>
                            <img class="plan-info-accordion-icon"
                                src="{{ asset('frontend/img/accordion-open.svg') }}" alt="">
                            {{-- <h3 class="me-body20 font-bold">@lang('labels.product_detail.plan_process')</h3>
                            <img class="plan-info-accordion-icon"
                                src="{{ asset('frontend/img/accordion-open.svg') }}" alt=""> --}}
                        </div>
                        <div id="popupInfoAccordion1" class="popup-info-items me-body18">
                            <div class="pt-[10px] sm:pt-5 px-[10px] sm:px-5">
                                {!! langbind($planProcess, 'content') ?? '' !!}
                            </div>
                        </div>
                    </div>
                    {{-- <div class="my-2 xl:my-4 popup-body-container ">
                        <div data-id="2"
                            class="popup-info-header flex items-center justify-between cursor-pointer bg-tagbg rounded-lg p-[10px] sm:px-5">
                            <h3 class="me-body20 font-bold">@lang('labels.product_detail.notes')</h3>
                            <img class="plan-info-accordion-icon"
                                src="{{ asset('frontend/img/accordion-open.svg') }}" alt="">
                        </div>
                        <div id="popupInfoAccordion2" class="popup-info-items me-body18">
                            <div class="p-[10px] sm:px-5">
                                <article class="mt-5 first:mt-0">
                                    <h4 class="font-bold">@lang('labels.product_detail.report')</h4>
                                    {!! isset($product->merchant) ? langbind($product->merchant, 'announcement') : '' !!}
                                </article>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </dialog>
    </div>
    <div id="plan-opt-area-err-msg" class="validate-popup bg-darkgray text-light me-body16 font-bold fixed top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 rounded-lg w-fit py-2 px-5 hidden z-[4]">
            {{__('labels.product_detail.pls_select_location')}}
    </div>
            <div id="plan-opt-date-err-msg" class="validate-popup bg-darkgray text-light me-body16 font-bold fixed top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 rounded-lg w-fit py-2 px-5 hidden z-[4]">
            {{__('labels.product_detail.pls_select_date')}}
    </div>
            <div id="plan-opt-aval-booking-err-msg" class="validate-popup bg-darkgray text-light me-body16 font-bold fixed top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 rounded-lg w-fit py-2 px-5 hidden z-[4]">
    Sorry, booking time isn't available!
    </div>
            <div id="plan-opt-time-err-msg" class="validate-popup bg-darkgray text-light me-body16 font-bold fixed top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 rounded-lg w-fit py-2 px-5 hidden z-[4]">
            {{__('labels.product_detail.pls_select_time')}}
    </div>
</section>
<script>
    window.translations = {
        productDetailCommonArea: '@lang('labels.product_detail.recipient')',
        chooseYourTime: '@lang('labels.product_detail.select_time')'
    };
</script>

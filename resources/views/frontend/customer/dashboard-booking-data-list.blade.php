<div component-name="me-member-booking-content" class="me-member-booking-content">
    <div class="me-member-booking-content-container mb-8">
        <div>
            <div class="w-full max-w-full">
                <div>
                    <div class="flex lg:flex-row flex-col-reverse">
                        <div class="mt-9 w-full">
                            <h2 class="me-body-32 font-bold text-darkgray sm:text-left text-center">@lang('labels.coupon.my_booking')</h2>
                            <div component-name="me-member-booking-tabs"
                                class="me-member-booking-tabs-container mb-7 mt-9">
                                <div class="flex sm:justify-start justify-center">
                                    <div>
                                        <ul class="flex booking-tabs sm:justify-start justify-center">
                                            <li data-value="inprogress"
                                                class="active pb-2 font-normal me-body-20 text-darkgray lg:mr-8 mr-3 cursor-pointer border-b-[3px] border-b-whitez">
                                                 @lang('labels.booking.in_progress') ({{count($progressList)}})</li>
                                            <li data-value="completed"
                                                class="pb-2 font-normal me-body-20 text-darkgray lg:mr-8 mr-3 cursor-pointer border-b-[3px] border-b-whitez">
                                                @lang('labels.booking.completed')</li>
                                            <li data-value="cancelled"
                                                class="pb-2 font-normal me-body-20 text-darkgray lg:mr-8 mr-3 cursor-pointer border-b-[3px] border-b-whitez">
                                                @lang('labels.booking.cancelled')</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="inprogress">
                                <div component-name="me-member-booking-card" class="me-member-booking-card mt-9">
                                    @forelse($progressList as $data)
                                    <div class="xl:px-8 px-5 py-5 rounded-xl member-card-boxshadow bg-whitez mb-10">
                                        <div
                                            class="flex flex-wrap justify-between items-start pb-5 mb-5 border-b border-b-mee4">
                                            <div class="flex flex-wrap my-1">
                                                <div class="3xl:mr-20 mr-5">
                                                    <p class="font-normal me-body-16 text-darkgray my-1 min-w-[250px]">
                                                        @lang('labels.order_details.order') #{{$data->invoice_no}}</p>
                                                    <p class="font-normal me-body-16 text-darkgray my-1 min-w-[250px]">
                                                        @lang('labels.member_dashboard.booking_on') {{date("d F Y",strtotime($data->created_at))}}</p>
                                                </div>
                                                <div>
                                                    <p class="font-normal me-body-16 text-darkgray my-1 min-w-[250px]">
                                                        @lang('labels.order_details.total_amount')</p>
                                                    <div class="flex items-center my-1 min-w-[250px]">
                                                        @if($data->payment_status!=1 && $data->payment_status!=5)
                                                        <div class="flex items-center need-to-pay-div">
                                                            <p class="font-bold me-body-16 text-mered mr-2">HK$ {{$data->grand_total}}
                                                            </p>
                                                        </div>
                                                        @endif
                                                        @if($data->payment_status==1 || $data->payment_status==5)
                                                        <div class="flex items-center paided-div ">
                                                            <p class="font-normal me-body-16 text-darkgray mr-2">HK$
                                                                {{$data->grand_total}}</p>
                                                            <div class="mr-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg')}}" width="20"
                                                                    height="20" viewBox="0 0 20 20" fill="none">
                                                                    <path
                                                                        d="M13.4563 7.79375C13.544 7.88164 13.5933 8.00078 13.5933 8.125C13.5933 8.24922 13.544 8.36836 13.4563 8.45625L9.08125 12.8313C8.99336 12.919 8.87422 12.9683 8.75 12.9683C8.62578 12.9683 8.50664 12.919 8.41875 12.8313L6.54375 10.9563C6.46095 10.8674 6.41588 10.7499 6.41802 10.6284C6.42016 10.507 6.46936 10.3911 6.55524 10.3052C6.64112 10.2194 6.75699 10.1702 6.87843 10.168C6.99987 10.1659 7.11739 10.2109 7.20625 10.2937L8.75 11.8367L12.7938 7.79375C12.8816 7.70597 13.0008 7.65666 13.125 7.65666C13.2492 7.65666 13.3684 7.70597 13.4563 7.79375ZM17.9688 10C17.9688 11.5761 17.5014 13.1167 16.6258 14.4272C15.7502 15.7377 14.5056 16.759 13.0495 17.3622C11.5934 17.9653 9.99116 18.1231 8.44538 17.8156C6.89959 17.5082 5.4797 16.7492 4.36525 15.6348C3.2508 14.5203 2.49185 13.1004 2.18437 11.5546C1.87689 10.0088 2.0347 8.40659 2.63784 6.95049C3.24097 5.49439 4.26235 4.24984 5.5728 3.37423C6.88326 2.49861 8.42393 2.03125 10 2.03125C12.1127 2.03373 14.1381 2.87409 15.632 4.36798C17.1259 5.86188 17.9663 7.88732 17.9688 10ZM17.0313 10C17.0313 8.60935 16.6189 7.24993 15.8463 6.09365C15.0737 4.93736 13.9755 4.03615 12.6907 3.50397C11.406 2.97179 9.9922 2.83255 8.62827 3.10385C7.26435 3.37516 6.0115 4.04482 5.02816 5.02816C4.04482 6.01149 3.37516 7.26434 3.10386 8.62827C2.83255 9.9922 2.9718 11.406 3.50398 12.6907C4.03615 13.9755 4.93737 15.0737 6.09365 15.8463C7.24993 16.6189 8.60935 17.0312 10 17.0312C11.8642 17.0292 13.6514 16.2877 14.9696 14.9696C16.2877 13.6514 17.0292 11.8642 17.0313 10Z"
                                                                        fill="#32A923"></path>
                                                                </svg>
                                                            </div>
                                                            <p class="font-normal me-body-14 text-darkgray">@lang('labels.order_details.Paid')</p>
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex my-1">
                                                <a href="{{ route('dashboard.booking.details',['id'=>$data->orders_id]) }}"
                                                    class="text-center min-w-[135px] mr-2 font-bold me-body-16 text-darkgray px-5 py-[9px] rounded-md border-1 border-darkgray hover:border-orangeMediq hover:text-orangeMediq">
                                                    @lang('labels.order_details.order_details')
                                                </a>
                                                {{-- <a href="#"
                                                    class="text-center min-w-[135px] {{$data->payment_status==2?'':'hidden'}} font-bold me-body-16 text-whitez px-5 py-[9px] bg-orangeMediq rounded-md hover:bg-brightOrangeMediq">Pay Now</a> --}}
                                            </div>
                                        </div>
                                        @php
                                            $progressItemList =  App\Models\OrderItems::select("order_items.*","products.name_en","products.name_tc","products.name_sc",
                                            "products.is_two_recipient","products.featured_img","products.slug_en","recipients.location","products.id as product_id",
                                            "recipients.confirm_booking_date","recipients.confirm_booking_time","recipients.date","recipients.time","categories.name_en as category_name_en")
                                                                    ->where("orders_id",$data->orders_id)
                                                                    ->join("products","products.id","order_items.product_id")
                                                                    ->join("recipients","recipients.id","order_items.recipient_id")
                                                                    ->join("categories","categories.id","products.category_id")
                                                                    ->whereIn("order_status",[1,2,3])
                                                                    ->get();
                                            $twoPersonCouponHaveShowList = [];
                                        @endphp
                                        @php $i=1 @endphp
                                        @foreach($progressItemList as $itemDetails)
                                        @php //var_dump($itemDetails);die; @endphp
                                        @if($itemDetails->is_two_recipient ==1 && in_array($itemDetails->recipient_id,$twoPersonCouponHaveShowList)==false)
                                        @php
                                            $recipientsIds =[];
                                            $recipientsIds = App\Models\OrderItems::select("recipient_id")
                                                                                ->where("orders_id",$data->orders_id)
                                                                                ->where("product_id",$itemDetails->product_id)
                                                                                ->whereIn("order_status",[1,2,3,5,6,7])
                                                                                ->pluck("recipient_id")->toArray();
                                            $index = array_search($itemDetails->recipient_id, $recipientsIds);
                                            if (array_key_exists($index+1, $recipientsIds)) {
                                                $twopersondataId =  $recipientsIds[$index+1];
                                            }else{
                                                $twopersondataId =  $recipientsIds[$index-1];
                                            }
                                            $twopersondata=DB::select("
                                                select recipients.*,products.id as product_id,
                                                products.name_en,products.name_tc,products.name_sc,products.is_two_recipient,products.featured_img,
                                                order_items.booking_id,order_items.order_status,order_items.orders_id,order_items.id as order_items_id,
                                                order_items.created_at as order_create_date,categories.name_en as category_name_en
                                                from recipients
                                                join order_items on recipients.id=order_items.recipient_id
                                                join products on products.id=recipients.product_id
                                                join categories on categories.id=products.category_id
                                                where recipients.id=?
                                                limit 1
                                            ",[$twopersondataId]);
                                            array_push($twoPersonCouponHaveShowList,$twopersondataId);
                                        @endphp
                                        <div class="flex sm:flex-row flex-col {{$i%2==0?'my-5 py-5 border-t border-t-mee4':''}}">
                                            <div class="mr-[10px]">
                                                <img src="{{$itemDetails->featured_img}}" alt="booking-logo"
                                                    class="2xl:max-w-[96px] 2xl:max-h-[96px] sm:max-w-[50px] sm:max-h-[50px] max-w-[96px] max-h-[96px] object-cover rounded-xl sm:mx-0 mx-auto">
                                            </div>
                                            <div class="w-full">
                                                <p class="me-body-20 font-bold text-darkgray">
                                                    <a href="{{ route('product-detail', ['category'=>$itemDetails->category_name_en,'slug'=>isset($itemDetails->slug_en) ? $itemDetails->slug_en : '']) }}">
                                                    {{@langbind($itemDetails,"name")}}
                                                    </a>
                                                </p>
                                                <div component-name="me-member-booking-card-content"
                                                    class="me-member-booking-card-content">

                                                    <div>
                                                        <div class="mt-2 bg-blueMediq px-3 py-2">
                                                            <p class="font-bold me-body-16 text-whitez">@lang('labels.order_details.booking_id')  {{$itemDetails->booking_id}}</p>
                                                        </div>
                                                        <div class="mt-[10px]">
                                                            <div class="booking-confirmed-div ">
                                                                <div
                                                                    class="flex flex-wrap-reverse items-center justify-between">
                                                                    <div>
                                                                        <div class="flex items-center">
                                                                            <div class="mr-[10px]">
                                                                                @if($itemDetails->order_status == 4)
                                                                                <img src="{{asset('frontend/img/member-clapping.svg')}}"
                                                                                    alt="statusIcon">
                                                                                @elseif($itemDetails->order_status ==3)
                                                                                    <img src="{{asset('frontend/img/member-check-circle.svg')}}"
                                                                                    alt="statusIcon">
                                                                                @elseif($itemDetails->order_status ==6 or $itemDetails->order_status ==7)
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                                                                                        <path d="M9.10156 1.90966C7.59766 2.062 6.08203 2.65185 4.83594 3.57372C4.33203 3.94872 3.46484 4.812 3.09766 5.30419C1.39063 7.60888 0.91797 10.519 1.82031 13.23C2.82813 16.2651 5.42578 18.4604 8.65234 19.0034C9.25 19.1011 10.7813 19.1011 11.3477 18.9995C13.2148 18.6714 14.7891 17.8628 16.0742 16.5737C17.4883 15.1597 18.3398 13.3706 18.5586 11.3667C18.6211 10.7573 18.5859 9.64013 18.4805 9.03466C18.2344 7.64404 17.7031 6.41357 16.8516 5.28075C16.5664 4.90185 15.8633 4.16747 15.4609 3.83154C13.7383 2.39404 11.3789 1.6831 9.10156 1.90966ZM10.5859 3.27294C12.3086 3.42529 13.8711 4.14794 15.0742 5.35107C17.6719 7.94091 17.9492 11.9448 15.7266 14.894C15.4258 15.2964 14.7969 15.9253 14.3945 16.2261C12.8945 17.355 11.0664 17.8745 9.26172 17.687C6.73438 17.4214 4.55078 15.8901 3.46094 13.6245C2.50781 11.644 2.51172 9.3081 3.46875 7.32763C4.44141 5.31591 6.37109 3.82372 8.55469 3.39013C9.28906 3.2456 9.87891 3.21044 10.5859 3.27294Z" fill="#333333"></path>
                                                                                        <path d="M6.77734 6.94011C6.58984 7.02604 6.50781 7.11198 6.42578 7.30729C6.35156 7.48698 6.35156 7.65104 6.42578 7.83464C6.46875 7.92839 6.91406 8.40495 7.74609 9.23698L9.00391 10.4987L7.74609 11.7604C6.47656 13.03 6.36719 13.1628 6.36719 13.4245C6.36719 13.9167 6.93359 14.2487 7.375 14.0182C7.45312 13.9753 8.07422 13.3854 8.75 12.7096L9.98047 11.4753L11.2305 12.7214C11.918 13.405 12.5352 13.9948 12.6055 14.03C12.9961 14.2253 13.5117 13.9635 13.582 13.5339C13.6367 13.1823 13.6523 13.1979 12.2539 11.7995L10.9609 10.4987L12.2344 9.22136C13.5977 7.84636 13.6211 7.81511 13.582 7.46745C13.5469 7.15495 13.2266 6.86589 12.9102 6.86589C12.6562 6.86589 12.4883 7.00651 11.25 8.2487C10.5742 8.92839 10.0039 9.48308 9.98047 9.48308C9.95703 9.48308 9.38672 8.92839 8.71094 8.2487C7.26953 6.80339 7.19141 6.7487 6.77734 6.94011Z" fill="#333333"></path>
                                                                                    </svg>
                                                                                @else
                                                                                    <img src="{{asset('frontend/img/member-ast.svg')}}"
                                                                                    alt="statusIcon">
                                                                                @endif
                                                                            </div>
                                                                            @php
                                                                            $textColor = "";
                                                                            if($itemDetails->order_status == 3) {
                                                                                $textColor = "text-meGreen";
                                                                            }else if($itemDetails->order_status == 2) {
                                                                                $textColor = "text-darkgray";
                                                                            }else if($itemDetails->order_status == 1) {
                                                                                $textColor = "text-mered";
                                                                            }
                                                                            @endphp
                                                                            <p
                                                                                class="font-bold me-body-18 {{$textColor}}">
                                                                                {{config("mediq.booking_status_".app()->getLocale())[$itemDetails->order_status]}}</p>
                                                                        </div>
                                                                        <div class="flex items-center mt-[10px]">
                                                                            <div class="mr-[10px]">
                                                                                <img src="{{asset('frontend/img/member-user.svg')}}"
                                                                                    alt="member-user">
                                                                            </div>
                                                                            <p
                                                                                class="font-normal me-body-18 text-darkgray">
                                                                                {{$itemDetails->recipient->last_name}} {{$itemDetails->recipient->first_name}}</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="flex items-center my-1">
                                                                        <div class="flex items-center pr-3">
                                                                            <p
                                                                                class="font-bold me-body-45 text-darkgray leading-[normal] booking-selected-dayno">
                                                                                {{$itemDetails->confirm_booking_date!==null?date('j', strtotime($itemDetails->confirm_booking_date)):''}}</p>
                                                                            <p
                                                                                class="font-bold me-body-16 text-darkgray max-w-[30px] leading-[normal] booking-selected-month-day">
                                                                                {{$itemDetails->confirm_booking_date!==null?date('M', strtotime($itemDetails->confirm_booking_date)):''}}
                                                                                {{$itemDetails->confirm_booking_date!==null?date('D', strtotime($itemDetails->confirm_booking_date)):''}}</p>
                                                                        </div>
                                                                        <div class="border-l-1 border-l-mee4 pl-3">
                                                                            <p
                                                                                class="font-bold me-body-28 text-darkgray leading-[normal] booking-selected-time">
                                                                                {{$itemDetails->confirm_booking_time!==null?$itemDetails->confirm_booking_time:''}}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            @php
                                                                $product = App\Models\Product::find($itemDetails->product_id);
                                                                $location = App\Models\MerchantLocation::where("area_id", $itemDetails->location)
                                                                                                        ->where("merchant_id",$product->merchant->id)->first();
                                                               
                                                            @endphp

                                                            @if($itemDetails->confirm_booking_date!=null)
                                                            <div
                                                                class="mt-[5px] flex items-center @@refundCard">
                                                                <div class="mr-[10px]">
                                                                    <img src="{{asset('frontend/img/member-location.png')}}"
                                                                        alt="member-location" class="min-w-[20px]">
                                                                </div>
                                                                <p
                                                                    class="font-normal me-body-18 text-darkgray leading-[normal] @@classname">
                                                                    {{ @langbind($location,'full_address')}}</p>
                                                            </div>

                                                            <div
                                                                class="mt-[5px] flex items-center @@refundCard">
                                                                <div class="mr-[10px]">
                                                                    <img src="{{asset('frontend/img/member-other.svg')}}"
                                                                        alt="member-other" class="min-w-[20px]">
                                                                </div>
                                                                <p
                                                                    class="font-normal me-body-18 text-darkgray leading-[normal] @@classname">
                                                                    {{ @langbind($location,'station_name')}}</p>
                                                            </div>
                                                            @endif
                                                            @if($itemDetails->order_status==2)
                                                            <div class="confirmation-pending-note ">
                                                                <div class="mt-[10px] bg-far p-3 flex items-start">
                                                                    <div class="mr-[10px]">
                                                                        <svg xmlns="http://www.w3.org/2000/svg')}}" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M12 9V12.75M21 12C21 13.1819 20.7672 14.3522 20.3149 15.4442C19.8626 16.5361 19.1997 17.5282 18.364 18.364C17.5282 19.1997 16.5361 19.8626 15.4442 20.3149C14.3522 20.7672 13.1819 21 12 21C10.8181 21 9.64778 20.7672 8.55585 20.3149C7.46392 19.8626 6.47177 19.1997 5.63604 18.364C4.80031 17.5282 4.13738 16.5361 3.68508 15.4442C3.23279 14.3522 3 13.1819 3 12C3 9.61305 3.94821 7.32387 5.63604 5.63604C7.32387 3.94821 9.61305 3 12 3C14.3869 3 16.6761 3.94821 18.364 5.63604C20.0518 7.32387 21 9.61305 21 12ZM12 15.75H12.008V15.758H12V15.75Z" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <p class="font-normal me-body-16 text-darkgray">@lang('labels.order_details.2_working_days_text1') <a href="https://api.whatsapp.com/send?phone=85295194000" target="_blank" class="underline  underline-offset-2">@lang('labels.order_details.2_working_days_text2')</a></p>
                                                                </div>
                                                            </div>
                                                            @endif
                                                            @if($itemDetails->order_status==1)
                                                            <div class="payment-pending-note ">
                                                                <div class="mt-[10px] bg-orangeLight p-3 flex items-start">
                                                                    <div class="mr-[10px]">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M12 9V12.75M21 12C21 13.1819 20.7672 14.3522 20.3149 15.4442C19.8626 16.5361 19.1997 17.5282 18.364 18.364C17.5282 19.1997 16.5361 19.8626 15.4442 20.3149C14.3522 20.7672 13.1819 21 12 21C10.8181 21 9.64778 20.7672 8.55585 20.3149C7.46392 19.8626 6.47177 19.1997 5.63604 18.364C4.80031 17.5282 4.13738 16.5361 3.68508 15.4442C3.23279 14.3522 3 13.1819 3 12C3 9.61305 3.94821 7.32387 5.63604 5.63604C7.32387 3.94821 9.61305 3 12 3C14.3869 3 16.6761 3.94821 18.364 5.63604C20.0518 7.32387 21 9.61305 21 12ZM12 15.75H12.008V15.758H12V15.75Z" stroke="#FF8201" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                          </svg>
                                                                    </div>
                                                                    @if($itemDetails->confirm_booking_date!=null)
                                                                    <p class="font-normal me-body-16 text-orangeMediq" data-order-id={{$itemDetails->orders_id}}>@lang('labels.order_details.booking_comfirmed_text_1') {{\Carbon\Carbon::parse($itemDetails->created_at)->addDays(3)->format('d F Y')}} @lang('labels.order_details.booking_comfirmed_text_2')</p>
                                                                    @else
                                                                    <p class="font-normal me-body-16 text-orangeMediq">@lang('labels.order_details.please_click_text3') {{ \Carbon\Carbon::parse($itemDetails->created_at)->addDays(3)->format('d F Y')}} @lang('labels.order_details.please_click_text4')</p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <div class="mt-2 bg-blueMediq px-3 py-2">
                                                            <p class="font-bold me-body-16 text-whitez">@lang('labels.order_details.booking_id')
                                                                {{$twopersondata[0]->booking_id}}</p>
                                                        </div>
                                                        <div class="mt-[10px]">
                                                            <div class="payment-pending-div">
                                                                <div
                                                                    class="flex flex-wrap-reverse items-center justify-between">
                                                                    <div>
                                                                        <div class="flex items-start">
                                                                            <div class="mr-[10px] mt-[2px]">
                                                                                @if($twopersondata[0]->order_status == 4)
                                                                                    <img src="{{asset('frontend/img/member-clapping.svg')}}"
                                                                                        alt="statusIcon">
                                                                                @elseif($twopersondata[0]->order_status ==3)
                                                                                    <img src="{{asset('frontend/img/member-check-circle.svg')}}"
                                                                                    alt="statusIcon">
                                                                                @elseif($twopersondata[0]->order_status ==6 or $twopersondata[0]->order_status ==7)
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                                                                                        <path d="M9.10156 1.90966C7.59766 2.062 6.08203 2.65185 4.83594 3.57372C4.33203 3.94872 3.46484 4.812 3.09766 5.30419C1.39063 7.60888 0.91797 10.519 1.82031 13.23C2.82813 16.2651 5.42578 18.4604 8.65234 19.0034C9.25 19.1011 10.7813 19.1011 11.3477 18.9995C13.2148 18.6714 14.7891 17.8628 16.0742 16.5737C17.4883 15.1597 18.3398 13.3706 18.5586 11.3667C18.6211 10.7573 18.5859 9.64013 18.4805 9.03466C18.2344 7.64404 17.7031 6.41357 16.8516 5.28075C16.5664 4.90185 15.8633 4.16747 15.4609 3.83154C13.7383 2.39404 11.3789 1.6831 9.10156 1.90966ZM10.5859 3.27294C12.3086 3.42529 13.8711 4.14794 15.0742 5.35107C17.6719 7.94091 17.9492 11.9448 15.7266 14.894C15.4258 15.2964 14.7969 15.9253 14.3945 16.2261C12.8945 17.355 11.0664 17.8745 9.26172 17.687C6.73438 17.4214 4.55078 15.8901 3.46094 13.6245C2.50781 11.644 2.51172 9.3081 3.46875 7.32763C4.44141 5.31591 6.37109 3.82372 8.55469 3.39013C9.28906 3.2456 9.87891 3.21044 10.5859 3.27294Z" fill="#333333"></path>
                                                                                        <path d="M6.77734 6.94011C6.58984 7.02604 6.50781 7.11198 6.42578 7.30729C6.35156 7.48698 6.35156 7.65104 6.42578 7.83464C6.46875 7.92839 6.91406 8.40495 7.74609 9.23698L9.00391 10.4987L7.74609 11.7604C6.47656 13.03 6.36719 13.1628 6.36719 13.4245C6.36719 13.9167 6.93359 14.2487 7.375 14.0182C7.45312 13.9753 8.07422 13.3854 8.75 12.7096L9.98047 11.4753L11.2305 12.7214C11.918 13.405 12.5352 13.9948 12.6055 14.03C12.9961 14.2253 13.5117 13.9635 13.582 13.5339C13.6367 13.1823 13.6523 13.1979 12.2539 11.7995L10.9609 10.4987L12.2344 9.22136C13.5977 7.84636 13.6211 7.81511 13.582 7.46745C13.5469 7.15495 13.2266 6.86589 12.9102 6.86589C12.6562 6.86589 12.4883 7.00651 11.25 8.2487C10.5742 8.92839 10.0039 9.48308 9.98047 9.48308C9.95703 9.48308 9.38672 8.92839 8.71094 8.2487C7.26953 6.80339 7.19141 6.7487 6.77734 6.94011Z" fill="#333333"></path>
                                                                                    </svg>
                                                                                @else
                                                                                    <img src="{{asset('frontend/img/member-ast.svg')}}"
                                                                                    alt="statusIcon">
                                                                                @endif
                                                                            </div>
                                                                            @php
                                                                            $textColor = "";
                                                                            if($twopersondata[0]->order_status == 3) {
                                                                                $textColor = "text-meGreen";
                                                                            }else if($twopersondata[0]->order_status == 2) {
                                                                                $textColor = "text-darkgray";
                                                                            }else if($twopersondata[0]->order_status == 1) {
                                                                                $textColor = "text-mered";
                                                                            }
                                                                            @endphp
                                                                            <p class="font-bold me-body-18 {{$textColor}}">{{config("mediq.booking_status_".app()->getLocale())[$twopersondata[0]->order_status]}}</p>
                                                                        </div>
                                                                        <div class="flex items-center mt-[10px]">
                                                                            <div class="mr-[10px]">
                                                                                <img src="{{asset('frontend/img/member-user.svg')}}"
                                                                                    alt="member-user">
                                                                            </div>
                                                                            <p
                                                                                class="font-normal me-body-18 text-darkgray">
                                                                                {{$twopersondata[0]->last_name}} {{$twopersondata[0]->first_name}}</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="flex items-center my-1">
                                                                        <div class="flex items-center pr-3">
                                                                            <p
                                                                                class="font-bold me-body-45 text-darkgray leading-[normal] booking-selected-dayno">
                                                                                {{$twopersondata[0]->confirm_booking_date!==null?date('j', strtotime($twopersondata[0]->confirm_booking_date)):''}}</p>
                                                                            <p
                                                                                class="font-bold me-body-16 text-darkgray max-w-[30px] leading-[normal] booking-selected-month-day">
                                                                                {{$twopersondata[0]->confirm_booking_date!==null?date('M', strtotime($twopersondata[0]->confirm_booking_date)):''}}
                                                                                {{$twopersondata[0]->confirm_booking_date!==null?date('D', strtotime($twopersondata[0]->confirm_booking_date)):''}}</p>
                                                                        </div>
                                                                        <div class="border-l-1 border-l-mee4 pl-3">
                                                                            <p
                                                                                class="font-bold me-body-28 text-darkgray leading-[normal] booking-selected-time">
                                                                                {{$twopersondata[0]->confirm_booking_time!==null?$twopersondata[0]->confirm_booking_time:''}}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @if($twopersondata[0]->confirm_booking_date!=null)
                                                            <div
                                                                class="mt-[5px] flex items-center @@refundCard">
                                                                <div class="mr-[10px]">
                                                                    <img src="{{asset('frontend/img/member-location.png')}}"
                                                                        alt="member-location" class="min-w-[20px]">
                                                                </div>
                                                                @php
                                                                    $product = App\Models\Product::find($twopersondata[0]->product_id);
                                                                    $location = App\Models\MerchantLocation::where("area_id", $twopersondata[0]->location)
                                                                                                        ->where("merchant_id",$product->merchant->id)->first();
                                                                @endphp
                                                               
                                                                <p
                                                                    class="font-normal me-body-18 text-darkgray leading-[normal] @@classname">
                                                                    {{ @langbind($location,'full_address')}}</p>
                                                            </div>

                                                            <div
                                                                class="mt-[5px] flex items-center @@refundCard">
                                                                <div class="mr-[10px]">
                                                                    <img src="{{asset('frontend/img/member-other.svg')}}"
                                                                        alt="member-other" class="min-w-[20px]">
                                                                </div>
                                                                <p
                                                                    class="font-normal me-body-18 text-darkgray leading-[normal] @@classname">
                                                                    {{ @langbind($location,'station_name')}}</p>
                                                            </div>
                                                            @endif

                                                            @if($twopersondata[0]->order_status==2)
                                                            <div class="confirmation-pending-note ">
                                                                <div class="mt-[10px] bg-far p-3 flex items-start">
                                                                    <div class="mr-[10px]">
                                                                        <svg xmlns="http://www.w3.org/2000/svg')}}" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M12 9V12.75M21 12C21 13.1819 20.7672 14.3522 20.3149 15.4442C19.8626 16.5361 19.1997 17.5282 18.364 18.364C17.5282 19.1997 16.5361 19.8626 15.4442 20.3149C14.3522 20.7672 13.1819 21 12 21C10.8181 21 9.64778 20.7672 8.55585 20.3149C7.46392 19.8626 6.47177 19.1997 5.63604 18.364C4.80031 17.5282 4.13738 16.5361 3.68508 15.4442C3.23279 14.3522 3 13.1819 3 12C3 9.61305 3.94821 7.32387 5.63604 5.63604C7.32387 3.94821 9.61305 3 12 3C14.3869 3 16.6761 3.94821 18.364 5.63604C20.0518 7.32387 21 9.61305 21 12ZM12 15.75H12.008V15.758H12V15.75Z" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <p class="font-normal me-body-16 text-darkgray">@lang('labels.order_details.2_working_days_text1') <a href="https://api.whatsapp.com/send?phone=85295194000" target="_blank" class="underline  underline-offset-2">@lang('labels.order_details.2_working_days_text2')</a></p>
                                                                </div>
                                                            </div>
                                                            @endif
                                                            @if($twopersondata[0]->order_status==1)
                                                            <div class="payment-pending-note ">
                                                                <div class="mt-[10px] bg-orangeLight p-3 flex items-start">
                                                                    <div class="mr-[10px]">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                            <path d="M12 9V12.75M21 12C21 13.1819 20.7672 14.3522 20.3149 15.4442C19.8626 16.5361 19.1997 17.5282 18.364 18.364C17.5282 19.1997 16.5361 19.8626 15.4442 20.3149C14.3522 20.7672 13.1819 21 12 21C10.8181 21 9.64778 20.7672 8.55585 20.3149C7.46392 19.8626 6.47177 19.1997 5.63604 18.364C4.80031 17.5282 4.13738 16.5361 3.68508 15.4442C3.23279 14.3522 3 13.1819 3 12C3 9.61305 3.94821 7.32387 5.63604 5.63604C7.32387 3.94821 9.61305 3 12 3C14.3869 3 16.6761 3.94821 18.364 5.63604C20.0518 7.32387 21 9.61305 21 12ZM12 15.75H12.008V15.758H12V15.75Z" stroke="#FF8201" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                          </svg>
                                                                    </div>
                                                                      @if($twopersondata[0]->confirm_booking_date!=null)
                                                                      <p class="font-normal me-body-16 text-orangeMediq" data-order-id={{$twopersondata[0]->orders_id}}>@lang('labels.order_details.booking_comfirmed_text_1') {{\Carbon\Carbon::parse($twopersondata[0]->order_create_date)->addDays(3)->format('d F Y')}} @lang('labels.order_details.booking_comfirmed_text_2')</p>
                                                                      @else
                                                                      <p class="font-normal me-body-16 text-orangeMediq">@lang('labels.order_details.completed_transaction_text_1')  {{\Carbon\Carbon::parse($twopersondata[0]->order_create_date)->addDays(3)->format('d F Y')}} @lang('labels.order_details.completed_transaction_text_2') </p>
                                                                      @endif
                                                                </div>
                                                            </div>
                                                            @endif


                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        @else
                                            @if($itemDetails->is_two_recipient !=1)
                                            <div class="flex sm:flex-row flex-col {{$i%2==0?'my-5 py-5 border-t border-t-mee4':''}}">
                                                <div class="mr-[10px]">
                                                    <img src="{{$itemDetails->featured_img}}" alt="booking-logo"
                                                        class="2xl:max-w-[96px] 2xl:max-h-[96px] sm:max-w-[50px] sm:max-h-[50px] max-w-[96px] max-h-[96px] object-cover rounded-xl sm:mx-0 mx-auto">
                                                </div>
                                                <div class="w-full">
                                                    <p class="me-body-20 font-bold text-darkgray">
                                                        <a href="{{ route('product-detail', ['category'=>$itemDetails->category_name_en,'slug'=>isset($itemDetails->slug_en) ? $itemDetails->slug_en : '']) }}">
                                                        {{@langbind($itemDetails,"name")}}
                                                        </a>
                                                    </p>
                                                    <div component-name="me-member-booking-card-content"
                                                        class="me-member-booking-card-content">

                                                        <div>
                                                            <div class="mt-2 bg-blueMediq px-3 py-2">
                                                                <p class="font-bold me-body-16 text-whitez">@lang('labels.order_details.booking_id')  {{$itemDetails->booking_id}}</p>
                                                            </div>
                                                            <div class="mt-[10px]">
                                                                <div class="booking-confirmed-div">
                                                                    <div
                                                                        class="flex flex-wrap-reverse items-center justify-between">
                                                                        <div>
                                                                            <div class="flex items-center">
                                                                                <div class="mr-[10px]">
                                                                                    @if($itemDetails->order_status == 4)
                                                                                        <img src="{{asset('frontend/img/member-clapping.svg')}}"
                                                                                            alt="statusIcon">
                                                                                    @elseif($itemDetails->order_status ==3)
                                                                                        <img src="{{asset('frontend/img/member-check-circle.svg')}}"
                                                                                        alt="statusIcon">
                                                                                    @elseif($itemDetails->order_status ==6 or $itemDetails->order_status ==7)
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                                                                                            <path d="M9.10156 1.90966C7.59766 2.062 6.08203 2.65185 4.83594 3.57372C4.33203 3.94872 3.46484 4.812 3.09766 5.30419C1.39063 7.60888 0.91797 10.519 1.82031 13.23C2.82813 16.2651 5.42578 18.4604 8.65234 19.0034C9.25 19.1011 10.7813 19.1011 11.3477 18.9995C13.2148 18.6714 14.7891 17.8628 16.0742 16.5737C17.4883 15.1597 18.3398 13.3706 18.5586 11.3667C18.6211 10.7573 18.5859 9.64013 18.4805 9.03466C18.2344 7.64404 17.7031 6.41357 16.8516 5.28075C16.5664 4.90185 15.8633 4.16747 15.4609 3.83154C13.7383 2.39404 11.3789 1.6831 9.10156 1.90966ZM10.5859 3.27294C12.3086 3.42529 13.8711 4.14794 15.0742 5.35107C17.6719 7.94091 17.9492 11.9448 15.7266 14.894C15.4258 15.2964 14.7969 15.9253 14.3945 16.2261C12.8945 17.355 11.0664 17.8745 9.26172 17.687C6.73438 17.4214 4.55078 15.8901 3.46094 13.6245C2.50781 11.644 2.51172 9.3081 3.46875 7.32763C4.44141 5.31591 6.37109 3.82372 8.55469 3.39013C9.28906 3.2456 9.87891 3.21044 10.5859 3.27294Z" fill="#333333"></path>
                                                                                            <path d="M6.77734 6.94011C6.58984 7.02604 6.50781 7.11198 6.42578 7.30729C6.35156 7.48698 6.35156 7.65104 6.42578 7.83464C6.46875 7.92839 6.91406 8.40495 7.74609 9.23698L9.00391 10.4987L7.74609 11.7604C6.47656 13.03 6.36719 13.1628 6.36719 13.4245C6.36719 13.9167 6.93359 14.2487 7.375 14.0182C7.45312 13.9753 8.07422 13.3854 8.75 12.7096L9.98047 11.4753L11.2305 12.7214C11.918 13.405 12.5352 13.9948 12.6055 14.03C12.9961 14.2253 13.5117 13.9635 13.582 13.5339C13.6367 13.1823 13.6523 13.1979 12.2539 11.7995L10.9609 10.4987L12.2344 9.22136C13.5977 7.84636 13.6211 7.81511 13.582 7.46745C13.5469 7.15495 13.2266 6.86589 12.9102 6.86589C12.6562 6.86589 12.4883 7.00651 11.25 8.2487C10.5742 8.92839 10.0039 9.48308 9.98047 9.48308C9.95703 9.48308 9.38672 8.92839 8.71094 8.2487C7.26953 6.80339 7.19141 6.7487 6.77734 6.94011Z" fill="#333333"></path>
                                                                                        </svg>
                                                                                    @else
                                                                                        <img src="{{asset('frontend/img/member-ast.svg')}}"
                                                                                        alt="statusIcon">
                                                                                    @endif
                                                                                </div>
                                                                                @php
                                                                                $textColor = "";
                                                                                if($itemDetails->order_status == 3) {
                                                                                    $textColor = "text-meGreen";
                                                                                }else if($itemDetails->order_status == 2) {
                                                                                    $textColor = "text-darkgray";
                                                                                }else if($itemDetails->order_status == 1) {
                                                                                    $textColor = "text-mered";
                                                                                }
                                                                                @endphp
                                                                                <p
                                                                                    class="font-bold me-body-18 {{$textColor}}">
                                                                                    {{config("mediq.booking_status_".app()->getLocale())[$itemDetails->order_status]}}</p>
                                                                            </div>
                                                                            <div class="flex items-center mt-[10px]">
                                                                                <div class="mr-[10px]">
                                                                                    <img src="{{asset('frontend/img/member-user.svg')}}"
                                                                                        alt="member-user">
                                                                                </div>
                                                                                <p
                                                                                    class="font-normal me-body-18 text-darkgray">
                                                                                    {{$itemDetails->recipient->last_name}} {{$itemDetails->recipient->first_name}}</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="flex items-center my-1">
                                                                            <div class="flex items-center pr-3">
                                                                                <p
                                                                                    class="font-bold me-body-45 text-darkgray leading-[normal] booking-selected-dayno">
                                                                                    @php 
                                                                                    //\Log::debug($itemDetails);
                                                                                    @endphp
                                                                                    {{$itemDetails->confirm_booking_date!==null?date('j', strtotime($itemDetails->confirm_booking_date)):''}}</p>
                                                                                <p
                                                                                    class="font-bold me-body-16 text-darkgray max-w-[30px] leading-[normal] booking-selected-month-day">
                                                                                    {{$itemDetails->confirm_booking_date!==null?date('M', strtotime($itemDetails->confirm_booking_date)):''}}
                                                                                    {{$itemDetails->confirm_booking_date!==null?date('D', strtotime($itemDetails->confirm_booking_date)):''}}</p>
                                                                            </div>
                                                                            <div class="border-l-1 border-l-mee4 pl-3">
                                                                                <p
                                                                                    class="font-bold me-body-28 text-darkgray leading-[normal] booking-selected-time">
                                                                                    {{$itemDetails->confirm_booking_time!==null?$itemDetails->confirm_booking_time:''}}</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @php
                                                                    $product = App\Models\Product::find($itemDetails->product_id);
                                                                    $location = App\Models\MerchantLocation::where("area_id", $itemDetails->location)
                                                                                                        ->where("merchant_id",$product->merchant->id)->first();
                                                                   
                                                                @endphp
                                                                @if($itemDetails->confirm_booking_date!=null)
                                                                <div
                                                                    class="mt-[5px] flex items-center @@refundCard">
                                                                    <div class="mr-[10px]">
                                                                        <img src="{{asset('frontend/img/member-location.png')}}"
                                                                            alt="member-location" class="min-w-[20px]">
                                                                    </div>

                                                                    <p
                                                                        class="font-normal me-body-18 text-darkgray leading-[normal] @@classname">
                                                                        {{ @langbind($location,'full_address')}}</p>
                                                                </div>
                                                                <div
                                                                    class="mt-[5px] flex items-center @@refundCard">
                                                                    <div class="mr-[10px]">
                                                                        <img src="{{asset('frontend/img/member-other.svg')}}"
                                                                            alt="member-other" class="min-w-[20px]">
                                                                    </div>
                                                                    <p
                                                                        class="font-normal me-body-18 text-darkgray leading-[normal] @@classname">
                                                                        {{ @langbind($location,'station_name')}}</p>
                                                                </div>
                                                                @endif
                                                                @if($itemDetails->order_status==2)
                                                                <div class="confirmation-pending-note ">
                                                                    <div class="mt-[10px] bg-far p-3 flex items-start">
                                                                        <div class="mr-[10px]">
                                                                            <svg xmlns="http://www.w3.org/2000/svg')}}" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                <path d="M12 9V12.75M21 12C21 13.1819 20.7672 14.3522 20.3149 15.4442C19.8626 16.5361 19.1997 17.5282 18.364 18.364C17.5282 19.1997 16.5361 19.8626 15.4442 20.3149C14.3522 20.7672 13.1819 21 12 21C10.8181 21 9.64778 20.7672 8.55585 20.3149C7.46392 19.8626 6.47177 19.1997 5.63604 18.364C4.80031 17.5282 4.13738 16.5361 3.68508 15.4442C3.23279 14.3522 3 13.1819 3 12C3 9.61305 3.94821 7.32387 5.63604 5.63604C7.32387 3.94821 9.61305 3 12 3C14.3869 3 16.6761 3.94821 18.364 5.63604C20.0518 7.32387 21 9.61305 21 12ZM12 15.75H12.008V15.758H12V15.75Z" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            </svg>
                                                                        </div>
                                                                        <p class="font-normal me-body-16 text-darkgray">@lang('labels.order_details.2_working_days_text1') <a href="https://api.whatsapp.com/send?phone=85295194000" target="_blank" class="underline  underline-offset-2">@lang('labels.order_details.2_working_days_text2')</a></p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @if($itemDetails->order_status==1)
                                                                <div class="payment-pending-note ">
                                                                    <div class="mt-[10px] bg-orangeLight p-3 flex items-start">
                                                                        <div class="mr-[10px]">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                <path d="M12 9V12.75M21 12C21 13.1819 20.7672 14.3522 20.3149 15.4442C19.8626 16.5361 19.1997 17.5282 18.364 18.364C17.5282 19.1997 16.5361 19.8626 15.4442 20.3149C14.3522 20.7672 13.1819 21 12 21C10.8181 21 9.64778 20.7672 8.55585 20.3149C7.46392 19.8626 6.47177 19.1997 5.63604 18.364C4.80031 17.5282 4.13738 16.5361 3.68508 15.4442C3.23279 14.3522 3 13.1819 3 12C3 9.61305 3.94821 7.32387 5.63604 5.63604C7.32387 3.94821 9.61305 3 12 3C14.3869 3 16.6761 3.94821 18.364 5.63604C20.0518 7.32387 21 9.61305 21 12ZM12 15.75H12.008V15.758H12V15.75Z" stroke="#FF8201" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            </svg>
                                                                        </div>
                                                                        @if($itemDetails->confirm_booking_date!=null)
                                                                        <p class="font-normal me-body-16 text-orangeMediq" data-order-id={{$itemDetails->orders_id}}>@lang('labels.order_details.booking_comfirmed_text_1') {{\Carbon\Carbon::parse($itemDetails->created_at)->addDays(3)->format('d F Y')}} @lang('labels.order_details.booking_comfirmed_text_2')</p>
                                                                        @else
                                                                        <p class="font-normal me-body-16 text-orangeMediq">@lang('labels.order_details.completed_transaction_text_1')  {{\Carbon\Carbon::parse($itemDetails->created_at)->addDays(3)->format('d F Y')}} @lang('labels.order_details.completed_transaction_text_2') </p>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                @endif
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        @endif
                                        @php $i++ @endphp
                                        @endforeach
                                    </div>
                                    @empty
                                        @include("frontend.customer.empty-booking")
                                    @endforelse
                                </div>
                            </div>
                            <div class="completed hidden">
                                @forelse($completedList as $data)
                                <div class="xl:px-8 px-5 py-5 rounded-xl member-card-boxshadow bg-whitez mb-10">
                                    <div
                                        class="flex flex-wrap justify-between items-start pb-5 mb-5 border-b border-b-mee4">
                                        <div class="flex flex-wrap my-1">
                                            <div class="3xl:mr-20 mr-5">
                                                <p class="font-normal me-body-16 text-darkgray my-1 min-w-[250px]">
                                                    @lang('labels.order_details.order') #{{$data->invoice_no}}</p>
                                                <p class="font-normal me-body-16 text-darkgray my-1 min-w-[250px]">
                                                    @lang('labels.member_dashboard.booking_on') {{date("d F Y",strtotime($data->created_at))}}</p>
                                            </div>
                                            <div>
                                                <p class="font-normal me-body-16 text-darkgray my-1 min-w-[250px]">
                                                    @lang('labels.order_details.total_amount')</p>
                                                <div class="flex items-center my-1 min-w-[250px]">
                                                    @if($data->payment_status!=1 && $data->payment_status!=5)
                                                    <div class="flex items-center need-to-pay-div">
                                                        <p class="font-bold me-body-16 text-mered mr-2">HK$ {{$data->grand_total}}
                                                        </p>
                                                    </div>
                                                    @endif
                                                    @if($data->payment_status==1 || $data->payment_status==5)
                                                    <div class="flex items-center paided-div ">
                                                        <p class="font-normal me-body-16 text-darkgray mr-2">HK$
                                                            {{$data->grand_total}}</p>
                                                        <div class="mr-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg')}}" width="20"
                                                                height="20" viewBox="0 0 20 20" fill="none">
                                                                <path
                                                                    d="M13.4563 7.79375C13.544 7.88164 13.5933 8.00078 13.5933 8.125C13.5933 8.24922 13.544 8.36836 13.4563 8.45625L9.08125 12.8313C8.99336 12.919 8.87422 12.9683 8.75 12.9683C8.62578 12.9683 8.50664 12.919 8.41875 12.8313L6.54375 10.9563C6.46095 10.8674 6.41588 10.7499 6.41802 10.6284C6.42016 10.507 6.46936 10.3911 6.55524 10.3052C6.64112 10.2194 6.75699 10.1702 6.87843 10.168C6.99987 10.1659 7.11739 10.2109 7.20625 10.2937L8.75 11.8367L12.7938 7.79375C12.8816 7.70597 13.0008 7.65666 13.125 7.65666C13.2492 7.65666 13.3684 7.70597 13.4563 7.79375ZM17.9688 10C17.9688 11.5761 17.5014 13.1167 16.6258 14.4272C15.7502 15.7377 14.5056 16.759 13.0495 17.3622C11.5934 17.9653 9.99116 18.1231 8.44538 17.8156C6.89959 17.5082 5.4797 16.7492 4.36525 15.6348C3.2508 14.5203 2.49185 13.1004 2.18437 11.5546C1.87689 10.0088 2.0347 8.40659 2.63784 6.95049C3.24097 5.49439 4.26235 4.24984 5.5728 3.37423C6.88326 2.49861 8.42393 2.03125 10 2.03125C12.1127 2.03373 14.1381 2.87409 15.632 4.36798C17.1259 5.86188 17.9663 7.88732 17.9688 10ZM17.0313 10C17.0313 8.60935 16.6189 7.24993 15.8463 6.09365C15.0737 4.93736 13.9755 4.03615 12.6907 3.50397C11.406 2.97179 9.9922 2.83255 8.62827 3.10385C7.26435 3.37516 6.0115 4.04482 5.02816 5.02816C4.04482 6.01149 3.37516 7.26434 3.10386 8.62827C2.83255 9.9922 2.9718 11.406 3.50398 12.6907C4.03615 13.9755 4.93737 15.0737 6.09365 15.8463C7.24993 16.6189 8.60935 17.0312 10 17.0312C11.8642 17.0292 13.6514 16.2877 14.9696 14.9696C16.2877 13.6514 17.0292 11.8642 17.0313 10Z"
                                                                    fill="#32A923"></path>
                                                            </svg>
                                                        </div>
                                                        <p class="font-normal me-body-14 text-darkgray">@lang('labels.order_details.Paid')</p>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex my-1">
                                            <a href="{{ route('dashboard.booking.details',['id'=>$data->orders_id]) }}"
                                                class="text-center min-w-[135px] mr-2 font-bold me-body-16 text-darkgray px-5 py-[9px] rounded-md border-1 border-darkgray hover:border-orangeMediq hover:text-orangeMediq">
                                                @lang('labels.order_details.order_details')
                                            </a>
                                            {{-- <a href="#"
                                                class="text-center min-w-[135px] {{$data->payment_status==2?'':'hidden'}} font-bold me-body-16 text-whitez px-5 py-[9px] bg-orangeMediq rounded-md hover:bg-brightOrangeMediq">Pay Now</a> --}}
                                        </div>
                                    </div>
                                    @php
                                        $completedItemList =  App\Models\OrderItems::select("order_items.*","products.name_en","products.name_tc","products.name_sc",
                                        "products.is_two_recipient","products.featured_img","products.slug_en","recipients.location",
                                        "recipients.confirm_booking_date","recipients.confirm_booking_time","recipients.date","recipients.time","categories.name_en as category_name_en")
                                                                ->where("orders_id",$data->orders_id)
                                                                ->join("products","products.id","order_items.product_id")
                                                                ->join("recipients","recipients.id","order_items.recipient_id")
                                                                ->join("categories","categories.id","products.category_id")
                                                                ->whereIn("order_status",[4])
                                                                ->get();
                                    @endphp
                                    @php $i=1 @endphp
                                    @foreach($completedItemList as $itemDetails)
                                        <div class="flex sm:flex-row flex-col {{$i%2==0?'my-5 py-5 border-t border-t-mee4':''}}">
                                            <div class="mr-[10px]">
                                                <img src="{{$itemDetails->featured_img}}" alt="booking-logo"
                                                    class="2xl:max-w-[96px] 2xl:max-h-[96px] sm:max-w-[50px] sm:max-h-[50px] max-w-[96px] max-h-[96px] object-cover rounded-xl sm:mx-0 mx-auto">
                                            </div>
                                            <div class="w-full">
                                                <p class="me-body-20 font-bold text-darkgray">
                                                    <a href="{{ route('product-detail', ['category'=>$itemDetails->category_name_en,'slug'=>isset($itemDetails->slug_en) ? $itemDetails->slug_en : '']) }}">
                                                    {{@langbind($itemDetails,"name")}}
                                                    </a>
                                                </p>
                                                <div component-name="me-member-booking-card-content"
                                                    class="me-member-booking-card-content">

                                                    <div>
                                                        <div class="mt-2 bg-blueMediq px-3 py-2">
                                                            <p class="font-bold me-body-16 text-whitez">@lang('labels.order_details.booking_id')  {{$itemDetails->booking_id}}</p>
                                                        </div>
                                                        <div class="mt-[10px]">
                                                            <div class="booking-confirmed-div">
                                                                <div
                                                                    class="flex flex-wrap-reverse items-center justify-between">
                                                                    <div>
                                                                        <div class="flex items-center">
                                                                            <div class="mr-[10px]">
                                                                                @if($itemDetails->order_status == 4)
                                                                                    <img src="{{asset('frontend/img/member-clapping.svg')}}"
                                                                                        alt="statusIcon">
                                                                                @elseif($itemDetails->order_status ==3)
                                                                                    <img src="{{asset('frontend/img/member-check-circle.svg')}}"
                                                                                    alt="statusIcon">
                                                                                @elseif($itemDetails->order_status ==6 or $itemDetails->order_status ==7)
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                                                                                        <path d="M9.10156 1.90966C7.59766 2.062 6.08203 2.65185 4.83594 3.57372C4.33203 3.94872 3.46484 4.812 3.09766 5.30419C1.39063 7.60888 0.91797 10.519 1.82031 13.23C2.82813 16.2651 5.42578 18.4604 8.65234 19.0034C9.25 19.1011 10.7813 19.1011 11.3477 18.9995C13.2148 18.6714 14.7891 17.8628 16.0742 16.5737C17.4883 15.1597 18.3398 13.3706 18.5586 11.3667C18.6211 10.7573 18.5859 9.64013 18.4805 9.03466C18.2344 7.64404 17.7031 6.41357 16.8516 5.28075C16.5664 4.90185 15.8633 4.16747 15.4609 3.83154C13.7383 2.39404 11.3789 1.6831 9.10156 1.90966ZM10.5859 3.27294C12.3086 3.42529 13.8711 4.14794 15.0742 5.35107C17.6719 7.94091 17.9492 11.9448 15.7266 14.894C15.4258 15.2964 14.7969 15.9253 14.3945 16.2261C12.8945 17.355 11.0664 17.8745 9.26172 17.687C6.73438 17.4214 4.55078 15.8901 3.46094 13.6245C2.50781 11.644 2.51172 9.3081 3.46875 7.32763C4.44141 5.31591 6.37109 3.82372 8.55469 3.39013C9.28906 3.2456 9.87891 3.21044 10.5859 3.27294Z" fill="#333333"></path>
                                                                                        <path d="M6.77734 6.94011C6.58984 7.02604 6.50781 7.11198 6.42578 7.30729C6.35156 7.48698 6.35156 7.65104 6.42578 7.83464C6.46875 7.92839 6.91406 8.40495 7.74609 9.23698L9.00391 10.4987L7.74609 11.7604C6.47656 13.03 6.36719 13.1628 6.36719 13.4245C6.36719 13.9167 6.93359 14.2487 7.375 14.0182C7.45312 13.9753 8.07422 13.3854 8.75 12.7096L9.98047 11.4753L11.2305 12.7214C11.918 13.405 12.5352 13.9948 12.6055 14.03C12.9961 14.2253 13.5117 13.9635 13.582 13.5339C13.6367 13.1823 13.6523 13.1979 12.2539 11.7995L10.9609 10.4987L12.2344 9.22136C13.5977 7.84636 13.6211 7.81511 13.582 7.46745C13.5469 7.15495 13.2266 6.86589 12.9102 6.86589C12.6562 6.86589 12.4883 7.00651 11.25 8.2487C10.5742 8.92839 10.0039 9.48308 9.98047 9.48308C9.95703 9.48308 9.38672 8.92839 8.71094 8.2487C7.26953 6.80339 7.19141 6.7487 6.77734 6.94011Z" fill="#333333"></path>
                                                                                    </svg>
                                                                                @else
                                                                                    <img src="{{asset('frontend/img/member-ast.svg')}}"
                                                                                    alt="statusIcon">
                                                                                @endif
                                                                            </div>
                                                                            @php
                                                                            $textColor = "";
                                                                            if($itemDetails->order_status == 3) {
                                                                                $textColor = "text-meGreen";
                                                                            }else if($itemDetails->order_status == 2) {
                                                                                $textColor = "text-darkgray";
                                                                            }else if($itemDetails->order_status == 1) {
                                                                                $textColor = "text-mered";
                                                                            }
                                                                            @endphp
                                                                            <p
                                                                                class="font-bold me-body-18 {{$textColor}}">
                                                                                {{config("mediq.booking_status_".app()->getLocale())[$itemDetails->order_status]}}</p>
                                                                        </div>
                                                                        <div class="flex items-center mt-[10px]">
                                                                            <div class="mr-[10px]">
                                                                                <img src="{{asset('frontend/img/member-user.svg')}}"
                                                                                    alt="member-user">
                                                                            </div>
                                                                            <p
                                                                                class="font-normal me-body-18 text-darkgray">
                                                                                {{$itemDetails->recipient->last_name}} {{$itemDetails->recipient->first_name}}</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="flex items-center my-1">
                                                                        <div class="flex items-center pr-3">
                                                                            <p
                                                                                class="font-bold me-body-45 text-darkgray leading-[normal] booking-selected-dayno">
                                                                                {{$itemDetails->confirm_booking_date!==null?date('j', strtotime($itemDetails->confirm_booking_date)):''}}</p>
                                                                            <p
                                                                                class="font-bold me-body-16 text-darkgray max-w-[30px] leading-[normal] booking-selected-month-day">
                                                                                {{$itemDetails->confirm_booking_date!==null?date('M', strtotime($itemDetails->confirm_booking_date)):''}}
                                                                                {{$itemDetails->confirm_booking_date!==null?date('D', strtotime($itemDetails->confirm_booking_date)):''}}</p>
                                                                        </div>
                                                                        <div class="border-l-1 border-l-mee4 pl-3">
                                                                            <p
                                                                                class="font-bold me-body-28 text-darkgray leading-[normal] booking-selected-time">
                                                                                {{$itemDetails->confirm_booking_time!==null?$itemDetails->confirm_booking_time:''}}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @php
                                                                $product = App\Models\Product::find($itemDetails->product_id);
                                                                $location = App\Models\MerchantLocation::where("area_id", $itemDetails->location)
                                                                                                        ->where("merchant_id",$product->merchant->id)->first();
                                                            @endphp
                                                            @if($itemDetails->confirm_booking_date!=null)
                                                            <div
                                                                class="mt-[5px] flex items-center @@refundCard">
                                                                <div class="mr-[10px]">
                                                                    <img src="{{asset('frontend/img/member-location.png')}}"
                                                                        alt="member-location" class="min-w-[20px]">
                                                                </div>

                                                                <p
                                                                    class="font-normal me-body-18 text-darkgray leading-[normal] @@classname">
                                                                    {{ @langbind($location,'full_address')}}</p>
                                                            </div>
                                                            <div
                                                                class="mt-[5px] flex items-center @@refundCard">
                                                                <div class="mr-[10px]">
                                                                    <img src="{{asset('frontend/img/member-other.svg')}}"
                                                                        alt="member-other" class="min-w-[20px]">
                                                                </div>
                                                                <p
                                                                    class="font-normal me-body-18 text-darkgray leading-[normal] @@classname">
                                                                    {{ @langbind($location,'station_name')}}</p>
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @php $i++ @endphp
                                    @endforeach
                                </div>
                                @empty
                                @include("frontend.customer.empty-booking")
                                @endforelse
                            </div>
                            <div class="cancelled hidden">
                                @forelse($cancelledList as $data)
                                <div class="xl:px-8 px-5 py-5 rounded-xl member-card-boxshadow bg-whitez mb-10">
                                    <div
                                        class="flex flex-wrap justify-between items-start pb-5 mb-5 border-b border-b-mee4">
                                        <div class="flex flex-wrap my-1">
                                            <div class="3xl:mr-20 mr-5">
                                                <p class="font-normal me-body-16 text-darkgray my-1 min-w-[250px]">
                                                    @lang('labels.order_details.order') #{{$data->invoice_no}}</p>
                                                <p class="font-normal me-body-16 text-darkgray my-1 min-w-[250px]">
                                                    @lang('labels.member_dashboard.booking_on') {{date("d F Y",strtotime($data->created_at))}}</p>
                                            </div>
                                            <div>
                                                <p class="font-normal me-body-16 text-darkgray my-1 min-w-[250px]">
                                                    @lang('labels.order_details.total_amount')</p>
                                                <div class="flex items-center my-1 min-w-[250px]">
                                                    @if($data->payment_status!=1 && $data->payment_status!=5)
                                                    <div class="flex items-center need-to-pay-div">
                                                        <p class="font-bold me-body-16 text-mered mr-2">HK$ {{$data->grand_total}}
                                                        </p>
                                                    </div>
                                                    @endif
                                                    @if($data->payment_status==1 || $data->payment_status==5)
                                                    <div class="flex items-center paided-div ">
                                                        <p class="font-normal me-body-16 text-darkgray mr-2">HK$
                                                            {{$data->grand_total}}</p>
                                                        <div class="mr-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg')}}" width="20"
                                                                height="20" viewBox="0 0 20 20" fill="none">
                                                                <path
                                                                    d="M13.4563 7.79375C13.544 7.88164 13.5933 8.00078 13.5933 8.125C13.5933 8.24922 13.544 8.36836 13.4563 8.45625L9.08125 12.8313C8.99336 12.919 8.87422 12.9683 8.75 12.9683C8.62578 12.9683 8.50664 12.919 8.41875 12.8313L6.54375 10.9563C6.46095 10.8674 6.41588 10.7499 6.41802 10.6284C6.42016 10.507 6.46936 10.3911 6.55524 10.3052C6.64112 10.2194 6.75699 10.1702 6.87843 10.168C6.99987 10.1659 7.11739 10.2109 7.20625 10.2937L8.75 11.8367L12.7938 7.79375C12.8816 7.70597 13.0008 7.65666 13.125 7.65666C13.2492 7.65666 13.3684 7.70597 13.4563 7.79375ZM17.9688 10C17.9688 11.5761 17.5014 13.1167 16.6258 14.4272C15.7502 15.7377 14.5056 16.759 13.0495 17.3622C11.5934 17.9653 9.99116 18.1231 8.44538 17.8156C6.89959 17.5082 5.4797 16.7492 4.36525 15.6348C3.2508 14.5203 2.49185 13.1004 2.18437 11.5546C1.87689 10.0088 2.0347 8.40659 2.63784 6.95049C3.24097 5.49439 4.26235 4.24984 5.5728 3.37423C6.88326 2.49861 8.42393 2.03125 10 2.03125C12.1127 2.03373 14.1381 2.87409 15.632 4.36798C17.1259 5.86188 17.9663 7.88732 17.9688 10ZM17.0313 10C17.0313 8.60935 16.6189 7.24993 15.8463 6.09365C15.0737 4.93736 13.9755 4.03615 12.6907 3.50397C11.406 2.97179 9.9922 2.83255 8.62827 3.10385C7.26435 3.37516 6.0115 4.04482 5.02816 5.02816C4.04482 6.01149 3.37516 7.26434 3.10386 8.62827C2.83255 9.9922 2.9718 11.406 3.50398 12.6907C4.03615 13.9755 4.93737 15.0737 6.09365 15.8463C7.24993 16.6189 8.60935 17.0312 10 17.0312C11.8642 17.0292 13.6514 16.2877 14.9696 14.9696C16.2877 13.6514 17.0292 11.8642 17.0313 10Z"
                                                                    fill="#32A923"></path>
                                                            </svg>
                                                        </div>
                                                        <p class="font-normal me-body-14 text-darkgray">@lang('labels.order_details.Paid')</p>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex my-1">
                                            <a href="{{ route('dashboard.booking.details',['id'=>$data->orders_id]) }}"
                                                class="text-center min-w-[135px] mr-2 font-bold me-body-16 text-darkgray px-5 py-[9px] rounded-md border-1 border-darkgray hover:border-orangeMediq hover:text-orangeMediq">
                                                @lang('labels.order_details.order_details')
                                            </a>
                                            {{-- <a href="#"
                                                class="text-center min-w-[135px] {{$data->payment_status==2?'':'hidden'}} font-bold me-body-16 text-whitez px-5 py-[9px] bg-orangeMediq rounded-md hover:bg-brightOrangeMediq">Pay Now</a> --}}
                                        </div>
                                    </div>
                                    @php
                                        $cancelledItemList =  App\Models\OrderItems::select("order_items.*","products.name_en","products.name_tc","products.name_sc",
                                        "products.is_two_recipient","products.featured_img","products.slug_en","recipients.location",
                                        "recipients.confirm_booking_date","recipients.confirm_booking_time","recipients.date","recipients.time","categories.name_en as category_name_en")
                                                                ->where("orders_id",$data->orders_id)
                                                                ->join("products","products.id","order_items.product_id")
                                                                ->join("recipients","recipients.id","order_items.recipient_id")
                                                                ->join("categories","categories.id","products.category_id")
                                                                ->whereIn("order_status",[5,6,7])
                                                                ->get();
                                    @endphp
                                    @php $i=1 @endphp
                                    @foreach($cancelledItemList as $itemDetails)
                                        <div class="flex sm:flex-row flex-col {{$i%2==0?'my-5 py-5 border-t border-t-mee4':''}}">
                                            <div class="mr-[10px]">
                                                <img src="{{$itemDetails->featured_img}}" alt="booking-logo"
                                                    class="2xl:max-w-[96px] 2xl:max-h-[96px] sm:max-w-[50px] sm:max-h-[50px] max-w-[96px] max-h-[96px] object-cover rounded-xl sm:mx-0 mx-auto">
                                            </div>
                                            <div class="w-full">
                                                <p class="me-body-20 font-bold text-darkgray">
                                                    <a href="{{ route('product-detail', ['category'=>$itemDetails->category_name_en,'slug'=>isset($itemDetails->slug_en) ? $itemDetails->slug_en : '']) }}">
                                                    {{@langbind($itemDetails,"name")}}</a></p>
                                                <div component-name="me-member-booking-card-content"
                                                    class="me-member-booking-card-content">

                                                    <div>
                                                        <div class="mt-2 bg-blueMediq px-3 py-2">
                                                            <p class="font-bold me-body-16 text-whitez">@lang('labels.order_details.booking_id')  {{$itemDetails->booking_id}}</p>
                                                        </div>
                                                        <div class="mt-[10px]">
                                                            <div class="booking-confirmed-div">
                                                                <div
                                                                    class="flex flex-wrap-reverse items-center justify-between">
                                                                    <div>
                                                                        <div class="flex items-center">
                                                                            <div class="mr-[10px]">
                                                                                @if($itemDetails->order_status == 4)
                                                                                    <img src="{{asset('frontend/img/member-clapping.svg')}}"
                                                                                        alt="statusIcon">
                                                                                @elseif($itemDetails->order_status ==3)
                                                                                    <img src="{{asset('frontend/img/member-check-circle.svg')}}"
                                                                                    alt="statusIcon">
                                                                                @elseif($itemDetails->order_status ==6 or $itemDetails->order_status ==7)
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                                                                                        <path d="M9.10156 1.90966C7.59766 2.062 6.08203 2.65185 4.83594 3.57372C4.33203 3.94872 3.46484 4.812 3.09766 5.30419C1.39063 7.60888 0.91797 10.519 1.82031 13.23C2.82813 16.2651 5.42578 18.4604 8.65234 19.0034C9.25 19.1011 10.7813 19.1011 11.3477 18.9995C13.2148 18.6714 14.7891 17.8628 16.0742 16.5737C17.4883 15.1597 18.3398 13.3706 18.5586 11.3667C18.6211 10.7573 18.5859 9.64013 18.4805 9.03466C18.2344 7.64404 17.7031 6.41357 16.8516 5.28075C16.5664 4.90185 15.8633 4.16747 15.4609 3.83154C13.7383 2.39404 11.3789 1.6831 9.10156 1.90966ZM10.5859 3.27294C12.3086 3.42529 13.8711 4.14794 15.0742 5.35107C17.6719 7.94091 17.9492 11.9448 15.7266 14.894C15.4258 15.2964 14.7969 15.9253 14.3945 16.2261C12.8945 17.355 11.0664 17.8745 9.26172 17.687C6.73438 17.4214 4.55078 15.8901 3.46094 13.6245C2.50781 11.644 2.51172 9.3081 3.46875 7.32763C4.44141 5.31591 6.37109 3.82372 8.55469 3.39013C9.28906 3.2456 9.87891 3.21044 10.5859 3.27294Z" fill="#333333"></path>
                                                                                        <path d="M6.77734 6.94011C6.58984 7.02604 6.50781 7.11198 6.42578 7.30729C6.35156 7.48698 6.35156 7.65104 6.42578 7.83464C6.46875 7.92839 6.91406 8.40495 7.74609 9.23698L9.00391 10.4987L7.74609 11.7604C6.47656 13.03 6.36719 13.1628 6.36719 13.4245C6.36719 13.9167 6.93359 14.2487 7.375 14.0182C7.45312 13.9753 8.07422 13.3854 8.75 12.7096L9.98047 11.4753L11.2305 12.7214C11.918 13.405 12.5352 13.9948 12.6055 14.03C12.9961 14.2253 13.5117 13.9635 13.582 13.5339C13.6367 13.1823 13.6523 13.1979 12.2539 11.7995L10.9609 10.4987L12.2344 9.22136C13.5977 7.84636 13.6211 7.81511 13.582 7.46745C13.5469 7.15495 13.2266 6.86589 12.9102 6.86589C12.6562 6.86589 12.4883 7.00651 11.25 8.2487C10.5742 8.92839 10.0039 9.48308 9.98047 9.48308C9.95703 9.48308 9.38672 8.92839 8.71094 8.2487C7.26953 6.80339 7.19141 6.7487 6.77734 6.94011Z" fill="#333333"></path>
                                                                                    </svg>
                                                                                @else
                                                                                    <img src="{{asset('frontend/img/member-ast.svg')}}"
                                                                                    alt="statusIcon">
                                                                                @endif
                                                                            </div>
                                                                            @php
                                                                            $textColor = "";
                                                                            if($itemDetails->order_status == 3) {
                                                                                $textColor = "text-meGreen";
                                                                            }else if($itemDetails->order_status == 2) {
                                                                                $textColor = "text-darkgray";
                                                                            }else if($itemDetails->order_status == 1) {
                                                                                $textColor = "text-mered";
                                                                            }
                                                                            @endphp
                                                                            <p
                                                                                class="font-bold me-body-18 {{$textColor}}">
                                                                                {{config("mediq.booking_status_".app()->getLocale())[$itemDetails->order_status]}}</p>
                                                                        </div>
                                                                        <div class="flex items-center mt-[10px]">
                                                                            <div class="mr-[10px]">
                                                                                <img src="{{asset('frontend/img/member-user.svg')}}"
                                                                                    alt="member-user">
                                                                            </div>
                                                                            <p
                                                                                class="font-normal me-body-18 text-darkgray">
                                                                                {{$itemDetails->recipient->last_name}} {{$itemDetails->recipient->first_name}}</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="flex items-center my-1">
                                                                        <div class="flex items-center pr-3">
                                                                            <p
                                                                                class="font-bold me-body-45 text-darkgray leading-[normal] booking-selected-dayno">
                                                                                {{$itemDetails->confirm_booking_date!==null?date('j', strtotime($itemDetails->confirm_booking_date)):''}}</p>
                                                                            <p
                                                                                class="font-bold me-body-16 text-darkgray max-w-[30px] leading-[normal] booking-selected-month-day">
                                                                                {{$itemDetails->confirm_booking_date!==null?date('M', strtotime($itemDetails->confirm_booking_date)):''}}
                                                                                {{$itemDetails->confirm_booking_date!==null?date('D', strtotime($itemDetails->confirm_booking_date)):''}}</p>
                                                                        </div>
                                                                        <div class="border-l-1 border-l-mee4 pl-3">
                                                                            <p
                                                                                class="font-bold me-body-28 text-darkgray leading-[normal] booking-selected-time">
                                                                                {{$itemDetails->confirm_booking_time!==null?$itemDetails->confirm_booking_time:''}}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @php
                                                                $product = App\Models\Product::find($itemDetails->product_id);
                                                                $location = App\Models\MerchantLocation::where("area_id", $itemDetails->location)
                                                                                                        ->where("merchant_id",$product->merchant->id)->first();
                                                            @endphp
                                                            @if($itemDetails->confirm_booking_date!=null)
                                                            <div
                                                                class="mt-[5px] flex items-center @@refundCard">
                                                                <div class="mr-[10px]">
                                                                    <img src="{{asset('frontend/img/member-location.png')}}"
                                                                        alt="member-location" class="min-w-[20px]">
                                                                </div>
                                                                <p
                                                                    class="font-normal me-body-18 text-darkgray leading-[normal] @@classname">
                                                                    {{ @langbind($location,'full_address')}}</p>
                                                            </div>
                                                            <div
                                                                class="mt-[5px] flex items-center @@refundCard">
                                                                <div class="mr-[10px]">
                                                                    <img src="{{asset('frontend/img/member-other.svg')}}"
                                                                        alt="member-other" class="min-w-[20px]">
                                                                </div>
                                                                <p
                                                                    class="font-normal me-body-18 text-darkgray leading-[normal] @@classname">
                                                                    {{ @langbind($location,'station_name')}}</p>
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @php $i++ @endphp
                                    @endforeach
                                </div>
                                @empty
                                    @include("frontend.customer.empty-booking")
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div component-name="me-need-help-section"
                        class="me-need-help-section bg-paleblue sm:min-h-[152px] rounded-[20px] xl:px-12 sm:px-6 px-5 sm:py-9 py-3 mb-[30px]">
                        <div>
                            <div class="flex sm:items-center items-start my-1">
                                <img src="{{asset('frontend/img/mdi_customer-service.svg')}}" alt="customer-service"
                                    class="mr-6 sm:block hidden">
                                <img src="{{asset('frontend/img/mdi_customer-service-mb.svg')}}" alt="customer-service-mb"
                                    class="mr-6 sm:hidden block">
                                <div class="flex flex-wrap justify-between items-center w-full">
                                    <div class=" my-1">
                                        <h2 class="font-bold me-body-29 text-darkgray">@lang('labels.booking.need_help')</h2>
                                        <p class="font-normal me-body-18 text-darkgray">@lang('labels.booking.contact_mediQ')</p>
                                    </div>
                                    <div class=" my-1">
                                        <a href="{{route('contact')}}"
                                            class="rounded-[50px] bg-whitez hover:border-blueMediq hover:bg-blueMediq hover:text-whitez me-body-16 font-bold text-darkgray min-w-[138px] px-5 py-[10px] border-1 border-darkgray">@lang('labels.booking.contact_now')</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

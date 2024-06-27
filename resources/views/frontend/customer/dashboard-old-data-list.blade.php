<div component-name="me-member-dashboard-content" class="me-member-dashboard-content">
    <div class="me-member-dashboard-content-container">
        <div>
            <div>
                <div class="min-h-[60px] flex items-center border-b-1 border-b-mee4">
                    <div class="flex items-center">
                        <p class="me-body-23 font-normal text-darkgray mr-2">Hi <strong>{{auth()->guard("customer")->user()->first_name}}</strong>, welcome back</p>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg')}}" width="32" height="32" viewBox="0 0 32 32"
                                fill="none">
                                <g clip-path="url(#clip0_5796_58821)">
                                    <path
                                        d="M18.8144 1.13282C19.5544 0.387817 20.6831 0.0628174 21.7062 0.302192C22.7356 0.522192 23.6031 1.30719 23.9756 2.28469C24.6575 1.89219 25.485 1.76282 26.2525 1.94282C27.0913 2.12719 27.8244 2.68782 28.2694 3.41594C28.6694 4.06594 28.7981 4.86282 28.6675 5.61094C29.885 5.84532 30.9106 6.85157 31.1556 8.06844C31.365 9.04157 31.0769 10.1059 30.3931 10.8309C29.9444 11.2972 29.4775 11.7453 29.0219 12.2047C29.8594 12.5541 30.5356 13.2741 30.8062 14.1428C31.1125 15.0872 30.9363 16.1734 30.3337 16.9641C30.0656 17.3147 29.73 17.6053 29.4237 17.9203C26.6812 20.6578 23.9294 23.3866 21.1931 26.1303C20.5775 26.7416 19.9837 27.3797 19.305 27.9228C18.2231 28.7984 16.9862 29.4828 15.6675 29.9272C12.6806 30.9378 9.29062 30.7059 6.48438 29.2616C4.51625 28.2603 2.83938 26.6966 1.69687 24.8072C0.649375 23.0872 0.080625 21.0941 0 19.0853V18.4022C0.0475 16.9303 0.3475 15.4641 0.91625 14.1047C1.16437 13.4972 1.48875 12.9266 1.7775 12.3384C3.13188 9.61407 4.17438 6.73032 4.81437 3.75407C4.9925 2.84344 5.55062 2.01344 6.33687 1.51907C7.08 1.04282 8.01062 0.872192 8.87375 1.05782C9.79437 1.24782 10.6244 1.83719 11.1031 2.64719C11.5575 3.39907 11.7 4.32907 11.4969 5.18407C11.1537 6.61969 10.8019 8.05282 10.4569 9.48782C13.2444 6.70469 16.0262 3.91532 18.8144 1.13282ZM20.7806 2.16657C20.3431 2.23594 20.0662 2.60469 19.7681 2.89344C16.3306 6.33094 12.8931 9.76782 9.45562 13.2059C9.24 13.4272 8.93375 13.5866 8.6175 13.5428C8.07938 13.4841 7.64438 12.9116 7.78188 12.3772C8.385 9.87532 8.9925 7.37407 9.59875 4.87282C9.70687 4.49907 9.69125 4.08469 9.51188 3.73532C9.23625 3.15969 8.56375 2.81282 7.935 2.92282C7.3275 3.01469 6.81063 3.51219 6.70188 4.11844C5.965 7.55157 4.72563 10.8684 3.09812 13.9772C2.06 15.9172 1.6875 18.2053 2.06375 20.3741C2.35313 22.0959 3.11312 23.7353 4.24062 25.0684C5.52187 26.5972 7.2675 27.7353 9.1925 28.2641C10.9613 28.7534 12.8656 28.7478 14.6287 28.2378C16.2531 27.7766 17.7425 26.8747 18.9306 25.6784C22.1631 22.4334 25.4144 19.2078 28.6569 15.9734C28.95 15.6959 29.0938 15.2703 29.0144 14.8728C28.9356 14.4216 28.5731 14.0359 28.1275 13.9291C27.7131 13.8191 27.25 13.9553 26.9562 14.2666C25.2925 15.9159 23.6369 17.5722 21.9762 19.2241C21.7437 19.4647 21.3844 19.5791 21.0581 19.4972C20.7294 19.4272 20.4513 19.1659 20.3594 18.8428C20.2537 18.5022 20.3563 18.1084 20.6181 17.8659C23.3844 15.1103 26.15 12.3553 28.9156 9.59969C29.1819 9.35032 29.3319 8.98219 29.2987 8.61719C29.26 8.03907 28.7606 7.53157 28.1838 7.48219C27.8269 7.44344 27.4587 7.57782 27.2087 7.83407C24.7119 10.3178 22.2181 12.8047 19.7213 15.2884C19.3713 15.6541 18.7325 15.6666 18.3738 15.3078C17.9869 14.9553 17.9837 14.2841 18.3669 13.9278C21.0494 11.2553 23.7331 8.58344 26.4156 5.91032C26.7306 5.61782 26.8713 5.15407 26.7625 4.73657C26.6338 4.22407 26.155 3.80969 25.6219 3.78469C25.2819 3.76344 24.9381 3.89532 24.6994 4.13844C22.0212 6.81532 19.3444 9.49407 16.6663 12.1709C16.4344 12.4222 16.0675 12.5353 15.735 12.4528C15.4037 12.3809 15.1256 12.1141 15.0375 11.7872C14.9413 11.4584 15.0337 11.0816 15.28 10.8422C17.4869 8.63219 19.6981 6.42657 21.9037 4.21594C22.2975 3.82844 22.36 3.16282 22.0469 2.70782C21.7812 2.29719 21.2644 2.06219 20.7806 2.16657Z"
                                        fill="#333333" />
                                    <path
                                        d="M27.7767 22.6619C28.2955 22.5219 28.8655 22.9044 28.9398 23.4344C29.0148 23.7713 28.8317 24.08 28.6936 24.3725C27.7186 26.3619 25.9217 27.9375 23.8105 28.6163C23.4836 28.7175 23.1086 28.62 22.8686 28.3782C22.6236 28.1394 22.5186 27.7638 22.6211 27.4357C22.7061 27.1232 22.9611 26.8707 23.2686 26.775C24.8505 26.245 26.1986 25.0669 26.9448 23.5757C27.0542 23.3725 27.1192 23.1413 27.2723 22.9638C27.4055 22.8163 27.5823 22.7082 27.7767 22.6619Z"
                                        fill="#333333" />
                                    <path
                                        d="M30.1295 25.0638C30.2895 24.6188 30.7926 24.3344 31.2551 24.4494C31.667 24.5357 31.9726 24.9201 32.0001 25.3351V25.4919C31.9445 25.7607 31.812 26.0044 31.6963 26.2507C30.5282 28.6526 28.4432 30.5957 25.9582 31.5769C25.6932 31.6801 25.4163 31.8144 25.1245 31.7594C24.6476 31.6951 24.2701 31.2263 24.3163 30.7463C24.3401 30.3507 24.6301 29.9988 25.0076 29.8857C27.277 29.0644 29.1701 27.2763 30.1295 25.0638Z"
                                        fill="#333333" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_5796_58821">
                                        <rect width="32" height="32" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                    </div>
                </div>
               
                <div class="flex lg:flex-row flex-col-reverse">
                    <div class="mt-9 7xl:mr-[35px] lg:mr-6 w-full">
                      <h2 class="me-body-32 font-bold text-darkgray sm:text-left text-center">Recent Bookings</h2>
                      <div component-name="me-member-dashboard-booking-card" class="me-member-dashboard-booking-card mt-9 mb-[102px]">

                      
                        @foreach($booking_list as $data)
                        @if($data->is_two_recipient==1)
                        YESSS
                            @php 
                                $order_ids = explode(",",$data->order_ids_list);
                                $order_id_count = count($order_ids)/2;
                            @endphp
                            @for($i=0;$i<$order_id_count;$i++)
                            <p class="sm:mt-9 mt-5 me-body-16 font-normal text-lightgray">Booking on {{explode(",",$data->order_createtime_list)[$i]}}</p>
                            <div class="xl:px-8 px-5 py-5 rounded-xl member-card-boxshadow bg-whitez mt-3">
                                <div class="flex sm:flex-row flex-col">
                                  <div class="mr-[10px]">
                                    <img src="{{asset('frontend/img/booking-logo.png')}}" alt="booking-logo" class="2xl:max-w-[96px] 2xl:max-h-[96px] sm:max-w-[50px] sm:max-h-[50px] max-w-[96px] max-h-[96px] object-cover rounded-xl sm:mx-0 mx-auto">
                                  </div>
                                  <div class="w-full">
                                    <p class="me-body-20 font-bold text-darkgray">{{@langbind($data,"name")}}</p>
                                    <div component-name="me-member-dashboard-booking-card-content" class="me-member-dashboard-booking-card-content">
                                      @php 
                                            if($i==0){$innerIndex=0;}
                                            else {
                                                $innerIndex =$i*2; 
                                            }
                                      @endphp  
                                      @for($ii=0;$ii<2;$ii++)
                                      <div>
                                        <div class="mt-2 bg-blueMediq px-3 py-2">
                                          <p class="font-bold me-body-16 text-whitez">@lang('labels.order_details.booking_id') {{explode(",",$data->booking_id_list)[$ii+$innerIndex]}}</p>
                                        </div>
                                        <div class="mt-[10px]">
                                          <div class="booking-confirmed-div ">
                                            <div class="flex flex-wrap-reverse items-center justify-between">
                                              <div>
                                                <div class="flex items-start">
                                                  <div class="mr-[10px] mt-[2px]">
                                                    <img src="{{asset('frontend/img/member-check-circle.svg')}}" alt="statusIcon" class="min-w-[16px]">
                                                  </div>
                                                  <p class="font-bold me-body-18 text-meGreen">{{config('mediq.booking_status')[explode(",",$data->order_status_list)[$ii+$innerIndex]]}}</p>
                                                </div>
                                                <div class="flex items-center mt-[10px]">
                                                  <div class="mr-[10px]">
                                                    <img src="{{asset('frontend/img/member-user.svg')}}" alt="member-user">
                                                  </div>
                                                  <p class="font-normal me-body-18 text-darkgray">{{explode(",",$data->recipients_name_list)[$ii+$innerIndex]}}</p>
                                                </div>
                                              </div>
                                              <div class="flex items-center my-1">
                                                <div class="flex items-center pr-3">
                                                  <p class="font-bold me-body-45 text-darkgray leading-[normal] booking-selected-dayno">
                                                    {{date('j', strtotime(explode(",",$data->recipients_date_list)[$ii+$innerIndex]))}}</p>
                                                  <p class="font-bold me-body-16 text-darkgray max-w-[30px] leading-[normal] booking-selected-month-day">
                                                    {{date('M', strtotime(explode(",",$data->recipients_date_list)[$ii+$innerIndex]))}}
                                                    {{date('D', strtotime(explode(",",$data->recipients_date_list)[$ii+$innerIndex]))}}</p>
                                                </div>
                                                <div class="border-l-1 border-l-mee4 pl-3">
                                                  <p class="font-bold me-body-28 text-darkgray leading-[normal] booking-selected-time">
                                                    {{explode(",",$data->recipients_time_list)[$ii+$innerIndex]}}</p>
                                                </div>
                                              </div>
                                            
                                            </div>
                                          </div>
                                          <div class="mt-[5px] flex items-center @@refundCard">
                                            <div class="mr-[10px]">
                                              <img src="{{asset('frontend/img/member-location.png')}}" alt="member-location" class="min-w-[20px]">
                                            </div>
                                            @php $location = App\Models\MerchantLocation::where("id", explode(",",$data->location_list)[$ii+$innerIndex])->first();@endphp
                                            <p class="font-normal me-body-18 text-darkgray leading-[normal] @@classname">{{ @langbind($location,'full_address')}}</p>
                                          </div>
      
                                          <div class="mt-[5px] flex items-center @@refundCard">
                                            <div class="mr-[10px]">
                                              <img src="{{asset('frontend/img/member-other.svg')}}" alt="member-other" class="min-w-[20px]">
                                            </div>
                                            <p class="font-normal me-body-18 text-darkgray leading-[normal] @@classname">{{ @langbind($location,'station_name')}}</p>
                                          </div>
      
                                          <div class="confirmation-pending-note hidden">
                                            <div class="mt-[10px] bg-far p-3 flex items-start">
                                              <div class="mr-[10px]">
                                                <svg xmlns="http://www.w3.org/2000/svg')}}" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                  <path d="M12 9V12.75M21 12C21 13.1819 20.7672 14.3522 20.3149 15.4442C19.8626 16.5361 19.1997 17.5282 18.364 18.364C17.5282 19.1997 16.5361 19.8626 15.4442 20.3149C14.3522 20.7672 13.1819 21 12 21C10.8181 21 9.64778 20.7672 8.55585 20.3149C7.46392 19.8626 6.47177 19.1997 5.63604 18.364C4.80031 17.5282 4.13738 16.5361 3.68508 15.4442C3.23279 14.3522 3 13.1819 3 12C3 9.61305 3.94821 7.32387 5.63604 5.63604C7.32387 3.94821 9.61305 3 12 3C14.3869 3 16.6761 3.94821 18.364 5.63604C20.0518 7.32387 21 9.61305 21 12ZM12 15.75H12.008V15.758H12V15.75Z" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                              </div>
                                              <p class="font-normal me-body-16 text-darkgray"></p>
                                            </div>
                                          </div>
                                          <div class="payment-pending-note hidden">
                                            <div class="mt-[10px] bg-orangeLight p-3 flex items-start">
                                              <div class="mr-[10px]">
                                                <svg xmlns="http://www.w3.org/2000/svg')}}" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                  <path d="M12 9V12.75M21 12C21 13.1819 20.7672 14.3522 20.3149 15.4442C19.8626 16.5361 19.1997 17.5282 18.364 18.364C17.5282 19.1997 16.5361 19.8626 15.4442 20.3149C14.3522 20.7672 13.1819 21 12 21C10.8181 21 9.64778 20.7672 8.55585 20.3149C7.46392 19.8626 6.47177 19.1997 5.63604 18.364C4.80031 17.5282 4.13738 16.5361 3.68508 15.4442C3.23279 14.3522 3 13.1819 3 12C3 9.61305 3.94821 7.32387 5.63604 5.63604C7.32387 3.94821 9.61305 3 12 3C14.3869 3 16.6761 3.94821 18.364 5.63604C20.0518 7.32387 21 9.61305 21 12ZM12 15.75H12.008V15.758H12V15.75Z" stroke="#FF8201" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                              </div>
                                              <p class="font-normal me-body-16 text-orangeMediq"></p>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      @endfor
                                      <div class="flex sm:justify-end justify-center pt-5 mt-5 border-t-1 border-t-mee4">
                                        <button class="min-w-[135px] my-1 font-bold me-body-16 rounded-md text-darkgray py-[9px] px-5 border-1 border-darkgray hover:border-orangeMediq hover:text-orangeMediq mr-2 w-max">View
                                          Details</button>
                                        <button class="hidden min-w-[135px] my-1 font-bold me-body-16 rounded-md text-whitez py-[9px] px-5 border-1 border-orangeMediq bg-orangeMediq hover:bg-brightOrangeMediq hover:border-brightOrangeMediq w-max">Pay
                                          Now</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            @endfor
                        @else
                        NOOOO 
                         @php $i=0 @endphp
                         @foreach(explode(",",$data->order_ids_list) as $order_details_id)
                         {{-- <p class="sm:mt-9 mt-5 me-body-16 font-normal text-lightgray">Booking on 31 December 2023</p> --}}
                            <p class="sm:mt-9 mt-5 me-body-16 font-normal text-lightgray">Booking on {{explode(",",$data->order_createtime_list)[$i]}}</p>
                       
                            <div class="xl:px-8 px-5 py-5 rounded-xl member-card-boxshadow bg-whitez mt-3">
                                <div class="flex sm:flex-row flex-col">
                                <div class="mr-[10px]">
                                    <img src="{{$data->featured_img}}" alt="booking-logo" class="2xl:max-w-[96px] 2xl:max-h-[96px] sm:max-w-[50px] sm:max-h-[50px] max-w-[96px] max-h-[96px] object-cover rounded-xl sm:mx-0 mx-auto">
                                </div>
                                <div class="w-full">
                                    <p class="me-body-20 font-bold text-darkgray">{{@langbind($data,"name")}}</p>
                                    <div component-name="me-member-dashboard-booking-card-content" class="me-member-dashboard-booking-card-content">
    
                                    <div>
                                        <div class="mt-2 bg-blueMediq px-3 py-2">
                                        <p class="font-bold me-body-16 text-whitez">@lang('labels.order_details.booking_id') {{explode(",",$data->booking_id_list)[$i]}}</p>
                                        </div>
                                        <div class="mt-[10px]">
                                            <div class="booking-complete-div ">
                                                <div class="flex flex-wrap-reverse items-center justify-between">
                                                <div>
                                                    <div class="flex items-start">
                                                    <div class="mr-[10px] mt-[2px]">
                                                        <img src="{{asset('frontend/img/member-clapping.svg')}}" alt="statusIcon" class="min-w-[16px]">
                                                    </div>
                                                   
                                                    <p class="font-bold me-body-18 text-meGreen">{{config('mediq.booking_status')[explode(",",$data->order_status_list)[$i]]}}</p>
                                                    </div>
                                                    <div class="flex items-center mt-[10px]">
                                                    <div class="mr-[10px]">
                                                        <img src="{{asset('frontend/img/member-user.svg')}}" alt="member-user">
                                                    </div>
                                                    <p class="font-normal me-body-18 text-darkgray">{{explode(",",$data->recipients_name_list)[$i]}}</p>
                                                    </div>
                                                </div>
                                                <div class="flex items-center my-1">
                                                    <div class="flex items-center pr-3">
                                                    <p class="font-bold me-body-45 text-darkgray leading-[normal] booking-selected-dayno">
                                                        {{date('j', strtotime(explode(",",$data->recipients_date_list)[$i]))}}</p>
                                                    <p class="font-bold me-body-16 text-darkgray max-w-[30px] leading-[normal] booking-selected-month-day">
                                                        {{date('M', strtotime(explode(",",$data->recipients_date_list)[$i]))}}
                                                        {{date('d', strtotime(explode(",",$data->recipients_date_list)[$i]))}}</p>
                                                    </div>
                                                    <div class="border-l-1 border-l-mee4 pl-3">
                                                    <p class="font-bold me-body-28 text-darkgray leading-[normal] booking-selected-time">
                                                        {{explode(",",$data->recipients_time_list)[$i]}}</p>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="mt-[5px] flex items-center @@refundCard">
                                                <div class="mr-[10px]">
                                                  <img src="{{asset('frontend/img/member-location.png')}}" alt="member-location" class="min-w-[20px]">
                                                </div>
                                                @php $location = App\Models\MerchantLocation::where("id", explode(",",$data->location_list)[$i])->first();@endphp
                                                <p class="font-normal me-body-18 text-darkgray leading-[normal] @@classname">{{ @langbind($location,'full_address')}}</p>
                                              </div>
          
                                              <div class="mt-[5px] flex items-center @@refundCard">
                                                <div class="mr-[10px]">
                                                  <img src="{{asset('frontend/img/member-other.svg')}}" alt="member-other" class="min-w-[20px]">
                                                </div>
                                                <p class="font-normal me-body-18 text-darkgray leading-[normal] @@classname">{{ @langbind($location,'station_name')}}</p>
                                              </div>
                                            <div class="confirmation-pending-note hidden">
                                                <div class="mt-[10px] bg-far p-3 flex items-start">
                                                <div class="mr-[10px]">
                                                    <svg xmlns="http://www.w3.org/2000/svg')}}" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M12 9V12.75M21 12C21 13.1819 20.7672 14.3522 20.3149 15.4442C19.8626 16.5361 19.1997 17.5282 18.364 18.364C17.5282 19.1997 16.5361 19.8626 15.4442 20.3149C14.3522 20.7672 13.1819 21 12 21C10.8181 21 9.64778 20.7672 8.55585 20.3149C7.46392 19.8626 6.47177 19.1997 5.63604 18.364C4.80031 17.5282 4.13738 16.5361 3.68508 15.4442C3.23279 14.3522 3 13.1819 3 12C3 9.61305 3.94821 7.32387 5.63604 5.63604C7.32387 3.94821 9.61305 3 12 3C14.3869 3 16.6761 3.94821 18.364 5.63604C20.0518 7.32387 21 9.61305 21 12ZM12 15.75H12.008V15.758H12V15.75Z" stroke="#333333" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </div>
                                                <p class="font-normal me-body-16 text-darkgray"></p>
                                                </div>
                                            </div>
                                            <div class="payment-pending-note hidden">
                                                <div class="mt-[10px] bg-orangeLight p-3 flex items-start">
                                                <div class="mr-[10px]">
                                                    <svg xmlns="http://www.w3.org/2000/svg')}}" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M12 9V12.75M21 12C21 13.1819 20.7672 14.3522 20.3149 15.4442C19.8626 16.5361 19.1997 17.5282 18.364 18.364C17.5282 19.1997 16.5361 19.8626 15.4442 20.3149C14.3522 20.7672 13.1819 21 12 21C10.8181 21 9.64778 20.7672 8.55585 20.3149C7.46392 19.8626 6.47177 19.1997 5.63604 18.364C4.80031 17.5282 4.13738 16.5361 3.68508 15.4442C3.23279 14.3522 3 13.1819 3 12C3 9.61305 3.94821 7.32387 5.63604 5.63604C7.32387 3.94821 9.61305 3 12 3C14.3869 3 16.6761 3.94821 18.364 5.63604C20.0518 7.32387 21 9.61305 21 12ZM12 15.75H12.008V15.758H12V15.75Z" stroke="#FF8201" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </div>
                                                <p class="font-normal me-body-16 text-orangeMediq"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="flex sm:justify-end justify-center pt-5 mt-5 border-t-1 border-t-mee4">
                                        <button class="min-w-[135px] my-1 font-bold me-body-16 rounded-md text-darkgray py-[9px] px-5 border-1 border-darkgray hover:border-orangeMediq hover:text-orangeMediq mr-2 w-max">View
                                        Details</button>
                                        <button class="hidden min-w-[135px] my-1 font-bold me-body-16 rounded-md text-whitez py-[9px] px-5 border-1 border-orangeMediq bg-orangeMediq hover:bg-brightOrangeMediq hover:border-brightOrangeMediq w-max">Pay
                                        Now</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                         @php $i++; @endphp
                         @endforeach
                        @endif
                        @endforeach
                       

                      </div>
                    </div>
                    <div class="mt-9 block">
                      <div component-name="me-member-dashboard-right-slider" class="7xl:max-w-[438px] 2xl:max-w-[350px] xl:max-w-[300px] lg:max-w-[250px] md:max-w-[438px] sm:max-w-[380px] max-w-full min-h-[155px]">
                        <div class="me-member-dashboard-right-slider slick-initialized slick-slider slick-dotted">
                          <div class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 2450px; transform: translate3d(-350px, 0px, 0px);"><div style="background: linear-gradient(90deg, rgb(253, 238, 255) 0%, rgb(246, 191, 255) 100%); width: 350px;" class="slick-slide slick-cloned" data-slick-index="-1" id="" aria-hidden="true" tabindex="-1">
                            <div class="relative">
                              <div class="py-7 px-5 rounded-lg">
                                <h2 class="font-bold me-body-18 text-darkgray">Share joy &amp; get rewarded</h2>
                                <p class="font-normal me-body-14 text-darkgray mt-2">Get HK$30 for each successful
                                  referral!</p>
                                <div class="mt-3">
                                  <button class="p-[10px] font-bold me-body-14 text-darkgray border-[1.5px] border-darkgray rounded-md" tabindex="-1">See
                                    Details</button>
                                </div>
                              </div>
                              <div class="absolute right-2 top-[6px]">
                                <img src="{{asset('frontend/img/reward 1.png')}}" class="img-reward 7xl:max-w-max max-w-[100px]">
                              </div>
                            </div>
                          </div><div style="background: linear-gradient(90deg, rgb(238, 238, 255) 0%, rgb(210, 210, 255) 100%); width: 350px;" class="slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" tabindex="0" role="tabpanel" id="slick-slide00" aria-describedby="slick-slide-control00">
                            <div class="relative">
                              <div class="py-7 px-5 rounded-lg">
                                <h2 class="font-bold me-body-18 text-darkgray">Share joy &amp; get rewarded</h2>
                                <p class="font-normal me-body-14 text-darkgray mt-2">Get HK$30 for each successful
                                  referral!</p>
                                <div class="mt-3">
                                  <button class="p-[10px] font-bold me-body-14 text-darkgray border-[1.5px] border-darkgray rounded-md" tabindex="0">See
                                    Details</button>
                                </div>
                              </div>
                              <div class="absolute right-2 7xl:top-[6px] 7xl:bottom-[unset] bottom-[6px]">
                                <img src="{{asset('frontend/img/reward 1.png')}}" class="img-reward 7xl:max-w-max max-w-[100px]">
                              </div>
                            </div>
                          </div><div style="background: linear-gradient(90deg, rgb(238, 246, 255) 0%, rgb(182, 207, 255) 100%); width: 350px;" class="slick-slide" data-slick-index="1" aria-hidden="true" tabindex="-1" role="tabpanel" id="slick-slide01" aria-describedby="slick-slide-control01">
                            <div class="relative">
                              <div class="py-7 px-5 rounded-lg">
                                <h2 class="font-bold me-body-18 text-darkgray">Share joy &amp; get rewarded</h2>
                                <p class="font-normal me-body-14 text-darkgray mt-2">Get HK$30 for each successful
                                  referral!</p>
                                <div class="mt-3">
                                  <button class="p-[10px] font-bold me-body-14 text-darkgray border-[1.5px] border-darkgray rounded-md" tabindex="-1">See
                                    Details</button>
                                </div>
                              </div>
                              <div class="absolute right-2 top-[6px]">
                                <img src="{{asset('frontend/img/reward 1.png')}}" class="img-reward 7xl:max-w-max max-w-[100px]">
                              </div>
                            </div>
                          </div><div style="background: linear-gradient(90deg, rgb(253, 238, 255) 0%, rgb(246, 191, 255) 100%); width: 350px;" class="slick-slide" data-slick-index="2" aria-hidden="true" tabindex="-1" role="tabpanel" id="slick-slide02" aria-describedby="slick-slide-control02">
                            <div class="relative">
                              <div class="py-7 px-5 rounded-lg">
                                <h2 class="font-bold me-body-18 text-darkgray">Share joy &amp; get rewarded</h2>
                                <p class="font-normal me-body-14 text-darkgray mt-2">Get HK$30 for each successful
                                  referral!</p>
                                <div class="mt-3">
                                  <button class="p-[10px] font-bold me-body-14 text-darkgray border-[1.5px] border-darkgray rounded-md" tabindex="-1">See
                                    Details</button>
                                </div>
                              </div>
                              <div class="absolute right-2 top-[6px]">
                                <img src="{{asset('frontend/img/reward 1.png')}}" class="img-reward 7xl:max-w-max max-w-[100px]">
                              </div>
                            </div>
                          </div><div style="background: linear-gradient(90deg, rgb(238, 238, 255) 0%, rgb(210, 210, 255) 100%); width: 350px;" class="slick-slide slick-cloned" data-slick-index="3" id="" aria-hidden="true" tabindex="-1">
                            <div class="relative">
                              <div class="py-7 px-5 rounded-lg">
                                <h2 class="font-bold me-body-18 text-darkgray">Share joy &amp; get rewarded</h2>
                                <p class="font-normal me-body-14 text-darkgray mt-2">Get HK$30 for each successful
                                  referral!</p>
                                <div class="mt-3">
                                  <button class="p-[10px] font-bold me-body-14 text-darkgray border-[1.5px] border-darkgray rounded-md" tabindex="-1">See
                                    Details</button>
                                </div>
                              </div>
                              <div class="absolute right-2 7xl:top-[6px] 7xl:bottom-[unset] bottom-[6px]">
                                <img src="{{asset('frontend/img/reward 1.png')}}" class="img-reward 7xl:max-w-max max-w-[100px]">
                              </div>
                            </div>
                          </div><div style="background: linear-gradient(90deg, rgb(238, 246, 255) 0%, rgb(182, 207, 255) 100%); width: 350px;" class="slick-slide slick-cloned" data-slick-index="4" id="" aria-hidden="true" tabindex="-1">
                            <div class="relative">
                              <div class="py-7 px-5 rounded-lg">
                                <h2 class="font-bold me-body-18 text-darkgray">Share joy &amp; get rewarded</h2>
                                <p class="font-normal me-body-14 text-darkgray mt-2">Get HK$30 for each successful
                                  referral!</p>
                                <div class="mt-3">
                                  <button class="p-[10px] font-bold me-body-14 text-darkgray border-[1.5px] border-darkgray rounded-md" tabindex="-1">See
                                    Details</button>
                                </div>
                              </div>
                              <div class="absolute right-2 top-[6px]">
                                <img src="{{asset('frontend/img/reward 1.png')}}" class="img-reward 7xl:max-w-max max-w-[100px]">
                              </div>
                            </div>
                          </div><div style="background: linear-gradient(90deg, rgb(253, 238, 255) 0%, rgb(246, 191, 255) 100%); width: 350px;" class="slick-slide slick-cloned" data-slick-index="5" id="" aria-hidden="true" tabindex="-1">
                            <div class="relative">
                              <div class="py-7 px-5 rounded-lg">
                                <h2 class="font-bold me-body-18 text-darkgray">Share joy &amp; get rewarded</h2>
                                <p class="font-normal me-body-14 text-darkgray mt-2">Get HK$30 for each successful
                                  referral!</p>
                                <div class="mt-3">
                                  <button class="p-[10px] font-bold me-body-14 text-darkgray border-[1.5px] border-darkgray rounded-md" tabindex="-1">See
                                    Details</button>
                                </div>
                              </div>
                              <div class="absolute right-2 top-[6px]">
                                <img src="{{asset('frontend/img/reward 1.png')}}" class="img-reward 7xl:max-w-max max-w-[100px]">
                              </div>
                            </div>
                          </div></div></div>
                          
                          
                        <ul class="custom-member-slider-dots" style="" role="tablist"><li class="slick-active" role="presentation"><button type="button" role="tab" id="slick-slide-control00" aria-controls="slick-slide00" aria-label="1 of 3" tabindex="0" aria-selected="true">1</button></li><li role="presentation" class=""><button type="button" role="tab" id="slick-slide-control01" aria-controls="slick-slide01" aria-label="2 of 3" tabindex="-1">2</button></li><li role="presentation" class=""><button type="button" role="tab" id="slick-slide-control02" aria-controls="slick-slide02" aria-label="3 of 3" tabindex="-1">3</button></li></ul></div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

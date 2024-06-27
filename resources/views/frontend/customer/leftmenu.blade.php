<div class="udl-left mb-5">
    <div component-name="me-dashboard-top-card"
        class="bg-whitez rounded-[24px] border border-[#E4E4E4] flex flex-col items-center justify-center py-[36px] user-card relative">
        {{-- <div class="cusprofile-section w-[125px] h-[125px] relative z-[0]">
            @if(auth()->guard('customer')->user()->google_id !== null || auth()->guard('customer')->user()->facebook_id !== null) 
            @if(auth()->guard('customer')->user()->profile_img == null)
            <img src="{{ asset('frontend/img/me-profile-img.svg') }}"
            class="w-full h-full preview-img profile-pic customer-profile-img">
            @elseif(File::exists(public_path('storage/customer').'/'.auth()->guard('customer')->user()->profile_img))
            <img src="{{ asset('storage/customer/' .auth()->guard('customer')->user()->profile_img) }}"
            class="w-full h-full preview-img profile-pic customer-profile-img">
            @else
            <img src="{{ auth()->guard('customer')->user()->profile_img }}"
            class="w-full h-full preview-img profile-pic customer-profile-img">
            @endif
          @else
          <img src="{{ auth()->guard('customer')->user()->profile_img != null? asset('storage/customer/' .auth()->guard('customer')->user()->profile_img): asset('frontend/img/me-profile-img.svg') }}"
              class="w-full h-full profile-pic  customer-profile-img">
          @endif
        </div> --}}
        <div class="my-profile cursor-pointer mr-2 lg-non-standard:mr-0 lg-non-standard:mb-5 4xl:mb-[2.5rem] justify-center items-center rounded-[50%] z-[1]">
            <form action="" method="POST" id="file-upload-leftmenu" enctype="multipart/form-data">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <div class="profile-update-section relative w-20 h-auto lg-non-standard:w-[100px] 4xl:w-auto rounded-full object-cover">
                  <input class="profile-upload" type="file" accept="image/*" id="profile-upload" name="file"/>
                  @if(auth()->guard('customer')->user()->google_id !== null || auth()->guard('customer')->user()->facebook_id !== null) 
                    @if(auth()->guard('customer')->user()->profile_img == null)
                    <img src="{{ asset('frontend/img/me-profile-img.svg') }}"
                    class="w-full h-full rounded-full objec-cover opacity-75 preview-img profile-pic customer-profile-img">
                    @elseif(File::exists(public_path('storage/customer').'/'.auth()->guard('customer')->user()->profile_img))
                    <img src="{{ asset('storage/customer/' .auth()->guard('customer')->user()->profile_img) }}"
                    class="w-full h-full rounded-full objec-cover opacity-75 preview-img profile-pic customer-profile-img">
                    @else
                    <img src="{{ auth()->guard('customer')->user()->profile_img }}"
                    class="w-full h-full rounded-full objec-cover opacity-75 preview-img profile-pic customer-profile-img">
                    @endif
                  @else
                  <img src="{{ auth()->guard('customer')->user()->profile_img != null? asset('storage/customer/' .auth()->guard('customer')->user()->profile_img): asset('frontend/img/me-profile-img.svg') }}"
                      class="w-full h-full rounded-full objec-cover opacity-75 profile-pic  customer-profile-img">
                  @endif
                  <button class="upload-button absolute top-1/2 left-1/2 translate-x-[-50%] translate-y-[-50%]" type="button">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M32.5 8.75H28.1688L26.0391 5.55625C25.925 5.38524 25.7704 5.245 25.5892 5.14798C25.408 5.05095 25.2056 5.00012 25 5H15C14.7944 5.00012 14.592 5.05095 14.4108 5.14798C14.2296 5.245 14.075 5.38524 13.9609 5.55625L11.8297 8.75H7.5C6.50544 8.75 5.55161 9.14509 4.84835 9.84835C4.14509 10.5516 3.75 11.5054 3.75 12.5V30C3.75 30.9946 4.14509 31.9484 4.84835 32.6517C5.55161 33.3549 6.50544 33.75 7.5 33.75H32.5C33.4946 33.75 34.4484 33.3549 35.1517 32.6517C35.8549 31.9484 36.25 30.9946 36.25 30V12.5C36.25 11.5054 35.8549 10.5516 35.1517 9.84835C34.4484 9.14509 33.4946 8.75 32.5 8.75ZM33.75 30C33.75 30.3315 33.6183 30.6495 33.3839 30.8839C33.1495 31.1183 32.8315 31.25 32.5 31.25H7.5C7.16848 31.25 6.85054 31.1183 6.61612 30.8839C6.3817 30.6495 6.25 30.3315 6.25 30V12.5C6.25 12.1685 6.3817 11.8505 6.61612 11.6161C6.85054 11.3817 7.16848 11.25 7.5 11.25H12.5C12.7058 11.2501 12.9085 11.1994 13.0901 11.1024C13.2716 11.0054 13.4264 10.865 13.5406 10.6938L15.6687 7.5H24.3297L26.4594 10.6938C26.5736 10.865 26.7284 11.0054 26.9099 11.1024C27.0915 11.1994 27.2942 11.2501 27.5 11.25H32.5C32.8315 11.25 33.1495 11.3817 33.3839 11.6161C33.6183 11.8505 33.75 12.1685 33.75 12.5V30ZM20 13.75C18.6403 13.75 17.311 14.1532 16.1805 14.9086C15.0499 15.6641 14.1687 16.7378 13.6483 17.9941C13.128 19.2503 12.9918 20.6326 13.2571 21.9662C13.5224 23.2999 14.1772 24.5249 15.1386 25.4864C16.1001 26.4478 17.3251 27.1026 18.6588 27.3679C19.9924 27.6332 21.3747 27.497 22.6309 26.9767C23.8872 26.4563 24.9609 25.5751 25.7164 24.4445C26.4718 23.314 26.875 21.9847 26.875 20.625C26.8729 18.8023 26.1479 17.0548 24.8591 15.7659C23.5702 14.4771 21.8227 13.7521 20 13.75ZM20 25C19.1347 25 18.2888 24.7434 17.5694 24.2627C16.8499 23.7819 16.2892 23.0987 15.958 22.2992C15.6269 21.4998 15.5403 20.6201 15.7091 19.7715C15.8779 18.9228 16.2946 18.1433 16.9064 17.5314C17.5183 16.9196 18.2978 16.5029 19.1465 16.3341C19.9951 16.1653 20.8748 16.2519 21.6742 16.583C22.4737 16.9142 23.1569 17.4749 23.6377 18.1944C24.1184 18.9138 24.375 19.7597 24.375 20.625C24.375 21.7853 23.9141 22.8981 23.0936 23.7186C22.2731 24.5391 21.1603 25 20 25Z"
                        fill="white" />
                    </svg>
                  </button>
                  <span class="text-mered me-body16 helvetica-normal mt-[12px] hidden" id="file_error"></span>
                </div>
            </form>
        </div>
        <div class="info-section flex justify-center items-start lg:items-center flex-col">
            <p class="me-body24 helvetica-normal font-bold text-darkgray user-name user_name_content">{{auth()->guard("customer")->user()->first_name}}</p>
            <p class="me-body14 helvetica-normal text-lightgray pt-[4px] user-memberId">@lang('labels.wishlist.member_id')</p>
            <p class="me-body16 helvetica-normal font-bold text-darkgray flex items-center justify-center">Q8{{ str_pad(auth()->guard("customer")->user()->id, 7, '0', STR_PAD_LEFT) }}
                <button type="button" class="cursor-pointer ml-1 7xl:ml-2 btn-refcopy" id="btn-refcopy">
                    <img src="{{ asset('frontend/img/ep_copy-document.svg') }}" alt="copy document"
                        class="inline-block copy-icon">
                </button>
                <input type="text" id="copytext" value="Q8{{ str_pad(auth()->guard("customer")->user()->id, 7, '0', STR_PAD_LEFT) }}" hidden>
            </p>
        </div>
    </div>
    <div class="relative">
        <div class="border border-mee4 py-3 rounded-xl bg-whitez mobile-dashboard-menu lg:hidden flex mt-6">
    
        </div>
        <ul component-name="me-dashboard-menus" class="dashboard-menu-list">

            <li class="dashboard-menu-list-item helvetica-normal text-darkgray me-body20 {{ Route::current()->getName()=='dashboard.general' ? 'active' : '' }}">
                <a href="{{route('dashboard.general')}}" class="px-5 flex items-center justify-start  "><img
                    src="{{ asset('frontend/img/user-overview.svg') }}" class="mr-[12px]" />@lang('labels.coupon.overview')</a>
                <div class="px-5 dropdown relative overflow-hidden hidden">
                  <button class="flex items-center dropdown__btn h-[52px]" id="dropBtn1">
                    <img src="{{ asset('frontend/img/user-overview.svg') }}" class="mr-[12px]" />@lang('labels.coupon.overview')
                    <svg class="dropdown-arrow ml-3" width="10" height="6" viewBox="0 0 10 6" fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M5 0.500012C4.88042 0.500012 4.76442 0.519096 4.65202 0.557264C4.53961 0.595432 4.44634 0.646323 4.3722 0.709936L0.246636 4.22138C0.0822119 4.36133 0 4.53944 0 4.75573C0 4.97201 0.0822119 5.15013 0.246636 5.29008C0.411061 5.43003 0.620329 5.5 0.874439 5.5C1.12855 5.5 1.33782 5.43003 1.50224 5.29008L5 2.31298L8.49776 5.29008C8.66218 5.43003 8.87145 5.5 9.12556 5.5C9.37967 5.5 9.58894 5.43003 9.75336 5.29008C9.91779 5.15013 10 4.97201 10 4.75573C10 4.53944 9.91779 4.36133 9.75336 4.22138L5.6278 0.709936C5.53812 0.6336 5.44096 0.579401 5.33632 0.54734C5.23169 0.515279 5.11958 0.499503 5 0.500012Z"
                        fill="#2FA9B5" />
                    </svg>
                  </button>
                  <ul class="dropdown__list pl-[35px]">
                    <li class="block helvetica-normal text-darkgray me-body18"><a
                        class="flex items-center justify-start " href=""></a></li>
                    <li class="block helvetica-normal text-darkgray me-body18"><a
                        class="flex items-center justify-start " href=""></a></li>
                    <li class="block helvetica-normal text-darkgray me-body18"><a
                        class="flex items-center justify-start " href=""></a></li>
                  </ul>
                </div>
            </li>

            <li class="dashboard-menu-list-item helvetica-normal text-darkgray me-body20 {{ Route::current()->getName()=='dashboard.booking' ? 'active' : '' }}">
                <a href="{{route('dashboard.booking')}}" class="px-5 flex items-center justify-start  "><img
                    src="{{ asset('frontend/img/user-mybook.svg') }}" class="mr-[12px]" />@lang('labels.coupon.my_booking')</a>
                <div class="px-5 dropdown relative overflow-hidden hidden">
                  <button class="flex items-center dropdown__btn h-[52px]" id="dropBtn1">
                    <img src="{{ asset('frontend/img/user-mybook.svg') }}" class="mr-[12px]" />@lang('labels.coupon.my_booking')
                    <svg class="dropdown-arrow ml-3" width="10" height="6" viewBox="0 0 10 6" fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M5 0.500012C4.88042 0.500012 4.76442 0.519096 4.65202 0.557264C4.53961 0.595432 4.44634 0.646323 4.3722 0.709936L0.246636 4.22138C0.0822119 4.36133 0 4.53944 0 4.75573C0 4.97201 0.0822119 5.15013 0.246636 5.29008C0.411061 5.43003 0.620329 5.5 0.874439 5.5C1.12855 5.5 1.33782 5.43003 1.50224 5.29008L5 2.31298L8.49776 5.29008C8.66218 5.43003 8.87145 5.5 9.12556 5.5C9.37967 5.5 9.58894 5.43003 9.75336 5.29008C9.91779 5.15013 10 4.97201 10 4.75573C10 4.53944 9.91779 4.36133 9.75336 4.22138L5.6278 0.709936C5.53812 0.6336 5.44096 0.579401 5.33632 0.54734C5.23169 0.515279 5.11958 0.499503 5 0.500012Z"
                        fill="#2FA9B5" />
                    </svg>
                  </button>
                  <ul class="dropdown__list pl-[35px]">
                    <li class="block helvetica-normal text-darkgray me-body18"><a
                        class="flex items-center justify-start " href=""></a></li>
                    <li class="block helvetica-normal text-darkgray me-body18"><a
                        class="flex items-center justify-start " href=""></a></li>
                    <li class="block helvetica-normal text-darkgray me-body18"><a
                        class="flex items-center justify-start " href=""></a></li>
                  </ul>
                </div>
            </li>

            <li class="dashboard-menu-list-item helvetica-normal text-darkgray me-body20 {{ Route::current()->getName()=='dashboard.wishlist' ? 'active' : '' }}">
                <a href="{{route('dashboard.wishlist')}}" class="px-5 flex items-center justify-start  "><img
                    src="{{ asset('frontend/img/user-fav.svg') }}" class="mr-[12px]" />@lang('labels.coupon.wish_list')</a>
                <div class="px-5 dropdown relative overflow-hidden hidden">
                  <button class="flex items-center dropdown__btn h-[52px]" id="dropBtn1">
                    <img src="{{ asset('frontend/img/user-fav.svg') }}" class="mr-[12px]" />@lang('labels.coupon.wish_list')
                    <svg class="dropdown-arrow ml-3" width="10" height="6" viewBox="0 0 10 6" fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M5 0.500012C4.88042 0.500012 4.76442 0.519096 4.65202 0.557264C4.53961 0.595432 4.44634 0.646323 4.3722 0.709936L0.246636 4.22138C0.0822119 4.36133 0 4.53944 0 4.75573C0 4.97201 0.0822119 5.15013 0.246636 5.29008C0.411061 5.43003 0.620329 5.5 0.874439 5.5C1.12855 5.5 1.33782 5.43003 1.50224 5.29008L5 2.31298L8.49776 5.29008C8.66218 5.43003 8.87145 5.5 9.12556 5.5C9.37967 5.5 9.58894 5.43003 9.75336 5.29008C9.91779 5.15013 10 4.97201 10 4.75573C10 4.53944 9.91779 4.36133 9.75336 4.22138L5.6278 0.709936C5.53812 0.6336 5.44096 0.579401 5.33632 0.54734C5.23169 0.515279 5.11958 0.499503 5 0.500012Z"
                        fill="#2FA9B5" />
                    </svg>
                  </button>
                  <ul class="dropdown__list pl-[35px]">
                    <li class="block helvetica-normal text-darkgray me-body18"><a
                        class="flex items-center justify-start " href=""></a></li>
                    <li class="block helvetica-normal text-darkgray me-body18"><a
                        class="flex items-center justify-start " href=""></a></li>
                    <li class="block helvetica-normal text-darkgray me-body18"><a
                        class="flex items-center justify-start " href=""></a></li>
                  </ul>
                </div>
            </li>

            <li class="dashboard-menu-list-item helvetica-normal text-darkgray me-body20 {{ Route::current()->getName()=='dashboard.coupon' ? 'active' : '' }}">
                <a href="{{route('dashboard.coupon')}}" class="px-5 flex items-center justify-start  "><img
                    src="{{ asset('frontend/img/user-coupon.svg') }}" class="mr-[12px]" />@lang('labels.coupon.coupon')</a>
                <div class="px-5 dropdown relative overflow-hidden hidden">
                  <button class="flex items-center dropdown__btn h-[52px]" id="dropBtn1">
                    <img src="{{ asset('frontend/img/user-coupon.svg') }}" class="mr-[12px]" />@lang('labels.coupon.coupon')
                    <svg class="dropdown-arrow ml-3" width="10" height="6" viewBox="0 0 10 6" fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M5 0.500012C4.88042 0.500012 4.76442 0.519096 4.65202 0.557264C4.53961 0.595432 4.44634 0.646323 4.3722 0.709936L0.246636 4.22138C0.0822119 4.36133 0 4.53944 0 4.75573C0 4.97201 0.0822119 5.15013 0.246636 5.29008C0.411061 5.43003 0.620329 5.5 0.874439 5.5C1.12855 5.5 1.33782 5.43003 1.50224 5.29008L5 2.31298L8.49776 5.29008C8.66218 5.43003 8.87145 5.5 9.12556 5.5C9.37967 5.5 9.58894 5.43003 9.75336 5.29008C9.91779 5.15013 10 4.97201 10 4.75573C10 4.53944 9.91779 4.36133 9.75336 4.22138L5.6278 0.709936C5.53812 0.6336 5.44096 0.579401 5.33632 0.54734C5.23169 0.515279 5.11958 0.499503 5 0.500012Z"
                        fill="#2FA9B5" />
                    </svg>
                  </button>
                  <ul class="dropdown__list pl-[35px]">
                    <li class="block helvetica-normal text-darkgray me-body18"><a
                        class="flex items-center justify-start " href=""></a></li>
                    <li class="block helvetica-normal text-darkgray me-body18"><a
                        class="flex items-center justify-start " href=""></a></li>
                    <li class="block helvetica-normal text-darkgray me-body18"><a
                        class="flex items-center justify-start " href=""></a></li>
                  </ul>
                </div>
            </li>
            
            <li class="dashboard-menu-list-item helvetica-normal text-darkgray me-body20 {{ request()->is('*/account/*') || request()->is('account/*') ? 'active' : '' }}">
                <a href="#" class="px-5 flex items-center justify-start hidden "><img
                    src="{{ asset('frontend/img/user-icon.svg')}}" class="mr-[12px]" /> @lang('labels.member_dashboard.my_account')</a>
                <div class="px-5 dropdown relative overflow-hidden ">
                  <button class="flex items-center dropdown__btn h-[52px]" id="dropBtn1">
                    <img src="{{ asset('frontend/img/user-icon.svg')}}" class="mr-[12px]" /> @lang('labels.member_dashboard.my_account')
                    <svg class="dropdown-arrow ml-3" width="10" height="6" viewBox="0 0 10 6" fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M5 0.500012C4.88042 0.500012 4.76442 0.519096 4.65202 0.557264C4.53961 0.595432 4.44634 0.646323 4.3722 0.709936L0.246636 4.22138C0.0822119 4.36133 0 4.53944 0 4.75573C0 4.97201 0.0822119 5.15013 0.246636 5.29008C0.411061 5.43003 0.620329 5.5 0.874439 5.5C1.12855 5.5 1.33782 5.43003 1.50224 5.29008L5 2.31298L8.49776 5.29008C8.66218 5.43003 8.87145 5.5 9.12556 5.5C9.37967 5.5 9.58894 5.43003 9.75336 5.29008C9.91779 5.15013 10 4.97201 10 4.75573C10 4.53944 9.91779 4.36133 9.75336 4.22138L5.6278 0.709936C5.53812 0.6336 5.44096 0.579401 5.33632 0.54734C5.23169 0.515279 5.11958 0.499503 5 0.500012Z"
                        fill="#2FA9B5" />
                    </svg>
                  </button>
                  <ul class="dropdown__list pl-[35px]">
                    <li class="block helvetica-normal text-darkgray me-body18"><a
                        class="flex items-center justify-start {{ Route::current()->getName()=='dashboard.myacc.basicinfo'  ? 'active' : '' }}" href="{{route('dashboard.myacc.basicinfo')}}">@lang('labels.lefrmenu.basic_information')</a>
                    </li>
                    <li class="block helvetica-normal text-darkgray me-body18"><a
                        class="flex items-center justify-start {{ Route::current()->getName()=='dashboard.myacc.health.profile'  ? 'active' : '' }}" href="{{route('dashboard.myacc.health.profile')}}">@lang('labels.lefrmenu.health_profile')</a></li>
                    <li class="block helvetica-normal text-darkgray me-body18"><a
                        class="flex items-center justify-start {{ Route::current()->getName()=='dashboard.myacc.setting'  ? 'active' : '' }}" href="{{route('dashboard.myacc.setting')}}">@lang('labels.lefrmenu.setting')</a></li>
                  </ul>
                </div>
              </li>
    
        </ul>
    </div>
</div>
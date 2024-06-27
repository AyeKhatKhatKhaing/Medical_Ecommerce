@extends('frontend.layouts.master')
@section('content')
    <main>
        <div component-name="me-mobile-profile-card" class="mmp-card pb-[50px]">
            <div class="bg-whitez flex flex-col items-center justify-center py-[36px]">
                {{-- @if(auth()->guard('customer')->user()->google_id !== null || auth()->guard('customer')->user()->facebook_id !== null) 
                    @if(auth()->guard('customer')->user()->profile_img == null)
                        <img src="{{ asset('frontend/img/me-profile-img.svg') }}" alt="profile image"
                            class="customer-profile-img">
                    @elseif(File::exists(public_path('storage/customer').'/'.auth()->guard('customer')->user()->profile_img))
                        <img src="{{ asset('storage/customer/' .auth()->guard('customer')->user()->profile_img) }}"
                            alt="profile image" class="customer-profile-img">
                    @else
                        <img src="{{ auth()->guard('customer')->user()->profile_img }}" alt="profile image"
                            class="customer-profile-img">
                    @endif
                @endif --}}

                @if(auth()->guard('customer')->user()->google_id !== null || auth()->guard('customer')->user()->facebook_id !== null) 
                    @if(auth()->guard('customer')->user()->profile_img == null)
                    <img src="{{ asset('frontend/img/me-profile-img.svg') }}"
                    class="customer-profile-img">
                    @elseif(File::exists(public_path('storage/customer').'/'.auth()->guard('customer')->user()->profile_img))
                    <img src="{{ asset('storage/customer/' .auth()->guard('customer')->user()->profile_img) }}"
                    class="customer-profile-img">
                    @else
                    <img src="{{ auth()->guard('customer')->user()->profile_img }}"
                    class="customer-profile-img">
                    @endif
                @else
                <img src="{{ auth()->guard('customer')->user()->profile_img != null? asset('storage/customer/' .auth()->guard('customer')->user()->profile_img): asset('frontend/img/me-profile-img.svg') }}"
                    class="customer-profile-img">
                @endif

                <p class="me-body24 helvetica-normal font-bold text-darkgray user-name">
                    {{ Auth::guard('customer')->user()->last_name }} {{ Auth::guard('customer')->user()->first_name }}
                </p>
                <p class="me-body14 helvetica-normal text-lightgray pt-[4px] user-memberId">
                    Member ID
                </p>
                <p class="me-body16 helvetica-normal font-bold text-darkgray flex items-center justify-center">
                    Q8{{ str_pad(auth()->guard('customer')->user()->id,7,'0',STR_PAD_LEFT) }}
                    <button type="button" class="cursor-pointer ml-1 7xl:ml-2 btn-refcopy" id="btn-refcopy">
                        <img src="{{ asset('frontend/img/ep_copy-document.svg') }}" alt="copy document"
                            class="inline-block copy-icon">
                    </button>
                </p>
            </div>
            <ul component-name="me-dashboard-menus" class="mobile-dashboard dashboard-menu-list mt-5">

                <li class="dashboard-menu-list-item helvetica-normal text-darkgray me-body20 active">
                    <a href="{{ route('dashboard.general') }}" class="px-5 flex items-center justify-start  ">
                        <img src="{{ asset('frontend/img/user-overview.svg') }}" class="mr-[12px]">
                        @lang('labels.product_detail.overview')
                    </a>
                    <div class="px-5 dropdown relative overflow-hidden hidden">
                        <button class="flex items-center dropdown__btn h-[52px]" id="dropBtn1">
                            <img src="{{ asset('frontend/img/user-overview.svg') }}" class="mr-[12px]"> @lang('labels.product_detail.overview')
                            <svg class="dropdown-arrow ml-3" width="10" height="6" viewBox="0 0 10 6" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5 0.500012C4.88042 0.500012 4.76442 0.519096 4.65202 0.557264C4.53961 0.595432 4.44634 0.646323 4.3722 0.709936L0.246636 4.22138C0.0822119 4.36133 0 4.53944 0 4.75573C0 4.97201 0.0822119 5.15013 0.246636 5.29008C0.411061 5.43003 0.620329 5.5 0.874439 5.5C1.12855 5.5 1.33782 5.43003 1.50224 5.29008L5 2.31298L8.49776 5.29008C8.66218 5.43003 8.87145 5.5 9.12556 5.5C9.37967 5.5 9.58894 5.43003 9.75336 5.29008C9.91779 5.15013 10 4.97201 10 4.75573C10 4.53944 9.91779 4.36133 9.75336 4.22138L5.6278 0.709936C5.53812 0.6336 5.44096 0.579401 5.33632 0.54734C5.23169 0.515279 5.11958 0.499503 5 0.500012Z"
                                    fill="#2FA9B5"></path>
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

                <li class="dashboard-menu-list-item helvetica-normal text-darkgray me-body20 ">
                    <a href="{{ route('dashboard.booking') }}" class="px-5 flex items-center justify-start  "><img
                            src="{{ asset('frontend/img/user-mybook.svg') }}" class="mr-[12px]"> @lang('labels.coupon.my_booking')</a>
                    <div class="px-5 dropdown relative overflow-hidden hidden">
                        <button class="flex items-center dropdown__btn h-[52px]" id="dropBtn1">
                            <img src="{{ asset('frontend/img/user-mybook.svg') }}" class="mr-[12px]"> @lang('labels.coupon.my_booking')
                            <svg class="dropdown-arrow ml-3" width="10" height="6" viewBox="0 0 10 6" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5 0.500012C4.88042 0.500012 4.76442 0.519096 4.65202 0.557264C4.53961 0.595432 4.44634 0.646323 4.3722 0.709936L0.246636 4.22138C0.0822119 4.36133 0 4.53944 0 4.75573C0 4.97201 0.0822119 5.15013 0.246636 5.29008C0.411061 5.43003 0.620329 5.5 0.874439 5.5C1.12855 5.5 1.33782 5.43003 1.50224 5.29008L5 2.31298L8.49776 5.29008C8.66218 5.43003 8.87145 5.5 9.12556 5.5C9.37967 5.5 9.58894 5.43003 9.75336 5.29008C9.91779 5.15013 10 4.97201 10 4.75573C10 4.53944 9.91779 4.36133 9.75336 4.22138L5.6278 0.709936C5.53812 0.6336 5.44096 0.579401 5.33632 0.54734C5.23169 0.515279 5.11958 0.499503 5 0.500012Z"
                                    fill="#2FA9B5"></path>
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

                {{-- <li class="dashboard-menu-list-item helvetica-normal text-darkgray me-body20 ">
                <a href="./dashboard-inbox.html" class="px-5 flex items-center justify-start  "><img
                        src="{{ asset('frontend/img/user-inbox.svg') }}" class="mr-[12px]"> Inbox <span
                        class="ml-4 bg-orangeMediq text-whitez w-[20px] h-[20px] rounded-full flex items-center justify-center me-body14">3</span></a>
                <div class="px-5 dropdown relative overflow-hidden hidden">
                    <button class="flex items-center dropdown__btn h-[52px]" id="dropBtn1">
                        <img src="{{ asset('frontend/img/user-inbox.svg') }}" class="mr-[12px]"> Inbox <span
                            class="ml-4 bg-orangeMediq text-whitez w-[20px] h-[20px] rounded-full flex items-center justify-center me-body14">3</span>
                        <svg class="dropdown-arrow ml-3" width="10" height="6" viewBox="0 0 10 6" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5 0.500012C4.88042 0.500012 4.76442 0.519096 4.65202 0.557264C4.53961 0.595432 4.44634 0.646323 4.3722 0.709936L0.246636 4.22138C0.0822119 4.36133 0 4.53944 0 4.75573C0 4.97201 0.0822119 5.15013 0.246636 5.29008C0.411061 5.43003 0.620329 5.5 0.874439 5.5C1.12855 5.5 1.33782 5.43003 1.50224 5.29008L5 2.31298L8.49776 5.29008C8.66218 5.43003 8.87145 5.5 9.12556 5.5C9.37967 5.5 9.58894 5.43003 9.75336 5.29008C9.91779 5.15013 10 4.97201 10 4.75573C10 4.53944 9.91779 4.36133 9.75336 4.22138L5.6278 0.709936C5.53812 0.6336 5.44096 0.579401 5.33632 0.54734C5.23169 0.515279 5.11958 0.499503 5 0.500012Z"
                                fill="#2FA9B5"></path>
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
            </li> --}}

                <li class="dashboard-menu-list-item helvetica-normal text-darkgray me-body20 ">
                    <a href="{{ route('dashboard.wishlist') }}" class="px-5 flex items-center justify-start  "><img
                            src="{{ asset('frontend/img/user-fav.svg') }}" class="mr-[12px]"> @lang('labels.coupon.wish_list')</a>
                    <div class="px-5 dropdown relative overflow-hidden hidden">
                        <button class="flex items-center dropdown__btn h-[52px]" id="dropBtn1">
                            <img src="{{ asset('frontend/img/user-fav.svg') }}" class="mr-[12px]"> @lang('labels.coupon.wish_list')
                            <svg class="dropdown-arrow ml-3" width="10" height="6" viewBox="0 0 10 6" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5 0.500012C4.88042 0.500012 4.76442 0.519096 4.65202 0.557264C4.53961 0.595432 4.44634 0.646323 4.3722 0.709936L0.246636 4.22138C0.0822119 4.36133 0 4.53944 0 4.75573C0 4.97201 0.0822119 5.15013 0.246636 5.29008C0.411061 5.43003 0.620329 5.5 0.874439 5.5C1.12855 5.5 1.33782 5.43003 1.50224 5.29008L5 2.31298L8.49776 5.29008C8.66218 5.43003 8.87145 5.5 9.12556 5.5C9.37967 5.5 9.58894 5.43003 9.75336 5.29008C9.91779 5.15013 10 4.97201 10 4.75573C10 4.53944 9.91779 4.36133 9.75336 4.22138L5.6278 0.709936C5.53812 0.6336 5.44096 0.579401 5.33632 0.54734C5.23169 0.515279 5.11958 0.499503 5 0.500012Z"
                                    fill="#2FA9B5"></path>
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



                <li class="dashboard-menu-list-item helvetica-normal text-darkgray me-body20 ">
                    <a href="{{ route('dashboard.coupon') }}" class="px-5 flex items-center justify-start  "><img
                            src="{{ asset('frontend/img/user-coupon.svg') }}" class="mr-[12px]"> @lang('labels.coupon.coupon')</a>
                    <div class="px-5 dropdown relative overflow-hidden hidden">
                        <button class="flex items-center dropdown__btn h-[52px]" id="dropBtn1">
                            <img src="{{ asset('frontend/img/user-coupon.svg') }}" class="mr-[12px]"> @lang('labels.coupon.coupon')
                            <svg class="dropdown-arrow ml-3" width="10" height="6" viewBox="0 0 10 6"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5 0.500012C4.88042 0.500012 4.76442 0.519096 4.65202 0.557264C4.53961 0.595432 4.44634 0.646323 4.3722 0.709936L0.246636 4.22138C0.0822119 4.36133 0 4.53944 0 4.75573C0 4.97201 0.0822119 5.15013 0.246636 5.29008C0.411061 5.43003 0.620329 5.5 0.874439 5.5C1.12855 5.5 1.33782 5.43003 1.50224 5.29008L5 2.31298L8.49776 5.29008C8.66218 5.43003 8.87145 5.5 9.12556 5.5C9.37967 5.5 9.58894 5.43003 9.75336 5.29008C9.91779 5.15013 10 4.97201 10 4.75573C10 4.53944 9.91779 4.36133 9.75336 4.22138L5.6278 0.709936C5.53812 0.6336 5.44096 0.579401 5.33632 0.54734C5.23169 0.515279 5.11958 0.499503 5 0.500012Z"
                                    fill="#2FA9B5"></path>
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



                <li class="dashboard-menu-list-item helvetica-normal text-darkgray me-body20 my-account-btn">
                    <a href="./dashboard-account.html" class="px-5 flex items-center justify-start hidden "><img
                            src="{{ asset('frontend/img/user-icon.svg') }}" class="mr-[12px]"> @lang('labels.member_dashboard.my_account')</a>
                    <div class="px-5 dropdown relative overflow-hidden ">
                        <button class="flex items-center dropdown__btn h-[52px]" id="dropBtn1">
                            <img src="{{ asset('frontend/img/user-icon.svg') }}" class="mr-[12px]"> @lang('labels.member_dashboard.my_account')
                            <svg class="dropdown-arrow ml-3" width="10" height="6" viewBox="0 0 10 6"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5 0.500012C4.88042 0.500012 4.76442 0.519096 4.65202 0.557264C4.53961 0.595432 4.44634 0.646323 4.3722 0.709936L0.246636 4.22138C0.0822119 4.36133 0 4.53944 0 4.75573C0 4.97201 0.0822119 5.15013 0.246636 5.29008C0.411061 5.43003 0.620329 5.5 0.874439 5.5C1.12855 5.5 1.33782 5.43003 1.50224 5.29008L5 2.31298L8.49776 5.29008C8.66218 5.43003 8.87145 5.5 9.12556 5.5C9.37967 5.5 9.58894 5.43003 9.75336 5.29008C9.91779 5.15013 10 4.97201 10 4.75573C10 4.53944 9.91779 4.36133 9.75336 4.22138L5.6278 0.709936C5.53812 0.6336 5.44096 0.579401 5.33632 0.54734C5.23169 0.515279 5.11958 0.499503 5 0.500012Z"
                                    fill="#2FA9B5"></path>
                            </svg>
                        </button>
                        <ul class="dropdown__list pl-[35px]">
                            <li class="block helvetica-normal text-darkgray me-body18"><a
                                    class="flex items-center justify-start "
                                    href="{{ route('dashboard.myacc.basicinfo') }}">@lang('labels.lefrmenu.basic_information')</a></li>
                            <li class="block helvetica-normal text-darkgray me-body18"><a
                                    class="flex items-center justify-start "
                                    href="{{ route('dashboard.myacc.health.profile') }}">@lang('labels.lefrmenu.health_profile')</a></li>
                            <li class="block helvetica-normal text-darkgray me-body18"><a
                                    class="flex items-center justify-start "
                                    href="{{ route('dashboard.myacc.setting') }}">@lang('labels.lefrmenu.setting')</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
            <hr class="w-full my-[8px] border border-mee4 mx-auto mb-divider">
            
                <button
                    class="m-logout helvetica-normal text-darkgray me-body20 hover:text-blueMediq py-[12px] px-5 flex items-center justify-start sign-out" id="sign-out"><img
                        src="{{ asset('frontend/img/m-logout-icon.svg') }}" class="mr-[12px]"> @lang('labels.menu.sign-out') </button>
        </div>
    </main>
@endsection
@push('scripts')
@endpush

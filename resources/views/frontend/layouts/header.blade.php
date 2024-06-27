<!-- container mx-auto -->
@php
    $home = App\Models\Home::first();
    $header = App\Models\Header::first();
    $slides = langbind($header, 'slide_text');
    $main_categories = App\Models\Category::whereIsPublished(true)->get();
    $isCheckoutPage = false;
    if (Route::current() != null) {
        if (Route::current()->getName() == 'checkout.init' || Route::current()->getName() == 'checkout.info' || Route::current()->getName() == 'checkout.payment' || Route::current()->getName() == 'checkout.checkoutComplete') {
            $isCheckoutPage = true;
        }
    }

@endphp
{{-- @if (Config::get('app.url') == url()->current()) --}}
@if (Route::currentRouteName() != null && Route::currentRouteName() == 'mediq')
    <div component-name="me-header-top" class="bg-orangeLight">
        @php
        $closedCookie = \Illuminate\Support\Facades\Cookie::get('header_closed');
        @endphp
        @if (isset($header))
        @if($closedCookie != 'header_closed' && langbind($header, 'message') != null)
            <div class="me-top-orangebar border-b-1 border-b-orangeMediq">
                <div class="me-container inner-container relative">
                        <div class="orange-para text-darkgray">{!! langbind($header, 'message') !!}</div>            
                    <svg
                    class="ob-closebtn absolute top-[17px] right-[5%] 5xl:right-[9.4%] cursor-pointer cookie-closed"
                    width="12"
                    height="12"
                    viewBox="0 0 12 12"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    >
                    <path
                        d="M11.2502 0.758276C11.1731 0.681023 11.0815 0.619733 10.9807 0.577915C10.8799 0.536097 10.7718 0.514572 10.6627 0.514572C10.5535 0.514572 10.4455 0.536097 10.3447 0.577915C10.2439 0.619733 10.1523 0.681023 10.0752 0.758276L6.00019 4.82494L1.92519 0.749942C1.84804 0.67279 1.75644 0.61159 1.65564 0.569836C1.55484 0.528082 1.4468 0.506592 1.33769 0.506592C1.22858 0.506592 1.12054 0.528082 1.01973 0.569836C0.91893 0.61159 0.827338 0.67279 0.750186 0.749942C0.673035 0.827094 0.611835 0.918686 0.57008 1.01949C0.528326 1.12029 0.506836 1.22833 0.506836 1.33744C0.506836 1.44655 0.528326 1.55459 0.57008 1.6554C0.611835 1.7562 0.673035 1.84779 0.750186 1.92494L4.82519 5.99994L0.750186 10.0749C0.673035 10.1521 0.611835 10.2437 0.57008 10.3445C0.528326 10.4453 0.506836 10.5533 0.506836 10.6624C0.506836 10.7716 0.528326 10.8796 0.57008 10.9804C0.611835 11.0812 0.673035 11.1728 0.750186 11.2499C0.827338 11.3271 0.91893 11.3883 1.01973 11.43C1.12054 11.4718 1.22858 11.4933 1.33769 11.4933C1.4468 11.4933 1.55484 11.4718 1.65564 11.43C1.75644 11.3883 1.84804 11.3271 1.92519 11.2499L6.00019 7.17494L10.0752 11.2499C10.1523 11.3271 10.2439 11.3883 10.3447 11.43C10.4455 11.4718 10.5536 11.4933 10.6627 11.4933C10.7718 11.4933 10.8798 11.4718 10.9806 11.43C11.0814 11.3883 11.173 11.3271 11.2502 11.2499C11.3273 11.1728 11.3885 11.0812 11.4303 10.9804C11.472 10.8796 11.4935 10.7716 11.4935 10.6624C11.4935 10.5533 11.472 10.4453 11.4303 10.3445C11.3885 10.2437 11.3273 10.1521 11.2502 10.0749L7.17519 5.99994L11.2502 1.92494C11.5669 1.60828 11.5669 1.07494 11.2502 0.758276Z"
                        fill="#333333"
                    />
                </svg>
                </div>
            </div>
        @endif
        @endif
        <div class="top-message-banner flex justify-center items-center relative">
            @if (isset($home->banner_img_url))
                <a href="{{ $home->banner_img_url }}" target="_blank">
                    <img src="{{ asset(langbind($home, 'banner_img')) }}"
                        alt="top-message-banner" class="w-full h-full object-cover" />
                </a>
            @elseif(langbind($home, 'banner_img'))
                <img src="{{ asset(langbind($home, 'banner_img')) }}"
                    alt="top-message-banner_no_url" class="w-full h-full object-cover" />
            @endif
            @if(langbind($home, 'banner_img'))
            <svg class="tmb-closebtn absolute top-[10px] right-[5%] 5xl:right-[9.4%] cursor-pointer" width="20"
                height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_2415_1860)">
                    <circle cx="10" cy="10" r="10" fill="white" />
                    <path
                        d="M13.8228 6.18326C13.7667 6.12701 13.7 6.08238 13.6266 6.05193C13.5532 6.02148 13.4745 6.00581 13.395 6.00581C13.3155 6.00581 13.2369 6.02148 13.1634 6.05193C13.09 6.08238 13.0234 6.12701 12.9672 6.18326L10 9.14442L7.03278 6.1772C6.9766 6.12102 6.90991 6.07646 6.8365 6.04605C6.7631 6.01565 6.68443 6 6.60499 6C6.52554 6 6.44687 6.01565 6.37347 6.04605C6.30007 6.07646 6.23337 6.12102 6.1772 6.1772C6.12102 6.23337 6.07646 6.30007 6.04605 6.37347C6.01565 6.44687 6 6.52554 6 6.60499C6 6.68443 6.01565 6.7631 6.04605 6.8365C6.07646 6.90991 6.12102 6.9766 6.1772 7.03278L9.14442 10L6.1772 12.9672C6.12102 13.0234 6.07646 13.0901 6.04605 13.1635C6.01565 13.2369 6 13.3156 6 13.395C6 13.4745 6.01565 13.5531 6.04605 13.6265C6.07646 13.6999 6.12102 13.7666 6.1772 13.8228C6.23337 13.879 6.30007 13.9235 6.37347 13.9539C6.44687 13.9844 6.52554 14 6.60499 14C6.68443 14 6.7631 13.9844 6.8365 13.9539C6.90991 13.9235 6.9766 13.879 7.03278 13.8228L10 10.8556L12.9672 13.8228C13.0234 13.879 13.0901 13.9235 13.1635 13.9539C13.2369 13.9844 13.3156 14 13.395 14C13.4745 14 13.5531 13.9844 13.6265 13.9539C13.6999 13.9235 13.7666 13.879 13.8228 13.8228C13.879 13.7666 13.9235 13.6999 13.9539 13.6265C13.9844 13.5531 14 13.4745 14 13.395C14 13.3156 13.9844 13.2369 13.9539 13.1635C13.9235 13.0901 13.879 13.0234 13.8228 12.9672L10.8556 10L13.8228 7.03278C14.0534 6.80219 14.0534 6.41385 13.8228 6.18326Z"
                        fill="#66666A" />
                </g>
                <defs>
                    <clipPath id="clip0_2415_1860">
                        <rect width="20" height="20" fill="white" />
                    </clipPath>
                </defs>
            </svg>
            @endif
        </div>
    </div>
@endif
<div class="mobile-menu-bar w-full bg-whitez">
    <div component-name="me-menu" class="me-menu-container">
      <div class="flex justify-start relative h-[50px] max-w-[96%] mmb-header w-full mx-auto items-center" style="box-shadow: 0 4px 15px 2px rgba(0,0,0,.1);
      max-width: 100%;
      padding-left: 20px;
      padding-right: 20px;">
        <button class="mobile-menu2 my-auto">
          <img src="{{ asset('frontend/img/new-menu-search-icon.svg') }}" alt="mobile menu icon" />
        </button>
        <div class="mr-auto">
          <a href="{{ route('mediq') }}" class="w-[118px] h-[46px] block"><img src="{{ asset('frontend/img/Logotype_Mediq-updated.svg') }}" alt="logo"
              class="mr-[32px] object-contain scale-[0.75]"></a>
        </div>
        <div class="mr-[16px] items-center hidden">
          <div class="relative badge-container" id="me-fav">
            <span
              class="me-badge flex text-white bg-orangeMediq rounded-[50%] w-[15px] h-[15px] text-[10px]">---</span>
            <span class="me-badge-dot hidden text-white bg-[#FF6F6F] rounded-[50%] w-[12px] h-[12px]"></span>
            <img src="{{ asset('frontend/img/me-fav-icon.svg') }}" class="me-fav-icon w-[20px]">
          </div>
          <div class="message-dropdown pt-[20px] pl-[20px] pr-[10px] hidden" aria-labelledby="me-fav">
            <svg class="polygon-icon" width="18" height="11" viewBox="0 0 18 11" fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <path d="M9 0L17.6603 10.5H0.339746L9 0Z" fill="white"></path>
            </svg>

            <ul class="pr-[5px] message-dropdown-container">
              <li class="flex items-center justify-start message-dropdown-item pt-[10px] pb-[10px]">
                <img src="{{asset('frontend/img/fav-img-1.png')}}" alt="fav icon">
                <div class="ml-[13px] w-full">
                  <div class="flex justify-between items-baseline">
                    <div class="">
                      <p class="me-fav-title">Hepatitis B Vaccine Injection {{ $isCheckoutPage }}</p>
                      <p class="me-mes-time">$3,185</p>
                    </div>
                    <button class="fav-close-btn"><svg width="10" height="9" viewBox="0 0 10 9" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                          d="M9.1999 0.306816C9.13823 0.245013 9.06497 0.195982 8.98432 0.162527C8.90367 0.129073 8.81722 0.111853 8.7299 0.111853C8.64259 0.111853 8.55614 0.129073 8.47549 0.162527C8.39484 0.195982 8.32158 0.245013 8.2599 0.306816L4.99991 3.56015L1.73991 0.300149C1.67818 0.238428 1.60491 0.189468 1.52427 0.156064C1.44362 0.122661 1.35719 0.105469 1.26991 0.105469C1.18262 0.105469 1.09619 0.122661 1.01554 0.156064C0.9349 0.189468 0.861626 0.238428 0.799905 0.300149C0.738184 0.36187 0.689224 0.435144 0.65582 0.515787C0.622417 0.59643 0.605225 0.682862 0.605225 0.770149C0.605225 0.857436 0.622417 0.943869 0.65582 1.02451C0.689224 1.10515 0.738184 1.17843 0.799905 1.24015L4.05991 4.50015L0.799905 7.76015C0.738184 7.82187 0.689224 7.89514 0.65582 7.97579C0.622417 8.05643 0.605225 8.14286 0.605225 8.23015C0.605225 8.31744 0.622417 8.40387 0.65582 8.48451C0.689224 8.56515 0.738184 8.63843 0.799905 8.70015C0.861626 8.76187 0.9349 8.81083 1.01554 8.84423C1.09619 8.87764 1.18262 8.89483 1.26991 8.89483C1.35719 8.89483 1.44362 8.87764 1.52427 8.84423C1.60491 8.81083 1.67818 8.76187 1.73991 8.70015L4.99991 5.44015L8.2599 8.70015C8.32163 8.76187 8.3949 8.81083 8.47554 8.84423C8.55619 8.87764 8.64262 8.89483 8.7299 8.89483C8.81719 8.89483 8.90362 8.87764 8.98427 8.84423C9.06491 8.81083 9.13818 8.76187 9.1999 8.70015C9.26163 8.63843 9.31059 8.56515 9.34399 8.48451C9.37739 8.40387 9.39458 8.31744 9.39458 8.23015C9.39458 8.14286 9.37739 8.05643 9.34399 7.97579C9.31059 7.89514 9.26163 7.82187 9.1999 7.76015L5.9399 4.50015L9.1999 1.24015C9.45324 0.986816 9.45324 0.560149 9.1999 0.306816Z"
                          fill="#333333"></path>
                      </svg>
                    </button>
                  </div>
                </div>
              </li>
              <li class="flex items-center justify-start message-dropdown-item pt-[10px] pb-[10px]">
                <img src="{{asset('frontend/img/fav-img-2.png')}}" alt="fav icon">
                <div class="ml-[13px] w-full">
                  <div class="flex justify-between items-baseline">
                    <div class="">
                      <p class="me-fav-title">Hepatitis B Vaccine Injection</p>
                      <p class="me-mes-time">$3,185</p>
                    </div>
                    <button class="fav-close-btn"><svg width="10" height="9" viewBox="0 0 10 9" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                          d="M9.1999 0.306816C9.13823 0.245013 9.06497 0.195982 8.98432 0.162527C8.90367 0.129073 8.81722 0.111853 8.7299 0.111853C8.64259 0.111853 8.55614 0.129073 8.47549 0.162527C8.39484 0.195982 8.32158 0.245013 8.2599 0.306816L4.99991 3.56015L1.73991 0.300149C1.67818 0.238428 1.60491 0.189468 1.52427 0.156064C1.44362 0.122661 1.35719 0.105469 1.26991 0.105469C1.18262 0.105469 1.09619 0.122661 1.01554 0.156064C0.9349 0.189468 0.861626 0.238428 0.799905 0.300149C0.738184 0.36187 0.689224 0.435144 0.65582 0.515787C0.622417 0.59643 0.605225 0.682862 0.605225 0.770149C0.605225 0.857436 0.622417 0.943869 0.65582 1.02451C0.689224 1.10515 0.738184 1.17843 0.799905 1.24015L4.05991 4.50015L0.799905 7.76015C0.738184 7.82187 0.689224 7.89514 0.65582 7.97579C0.622417 8.05643 0.605225 8.14286 0.605225 8.23015C0.605225 8.31744 0.622417 8.40387 0.65582 8.48451C0.689224 8.56515 0.738184 8.63843 0.799905 8.70015C0.861626 8.76187 0.9349 8.81083 1.01554 8.84423C1.09619 8.87764 1.18262 8.89483 1.26991 8.89483C1.35719 8.89483 1.44362 8.87764 1.52427 8.84423C1.60491 8.81083 1.67818 8.76187 1.73991 8.70015L4.99991 5.44015L8.2599 8.70015C8.32163 8.76187 8.3949 8.81083 8.47554 8.84423C8.55619 8.87764 8.64262 8.89483 8.7299 8.89483C8.81719 8.89483 8.90362 8.87764 8.98427 8.84423C9.06491 8.81083 9.13818 8.76187 9.1999 8.70015C9.26163 8.63843 9.31059 8.56515 9.34399 8.48451C9.37739 8.40387 9.39458 8.31744 9.39458 8.23015C9.39458 8.14286 9.37739 8.05643 9.34399 7.97579C9.31059 7.89514 9.26163 7.82187 9.1999 7.76015L5.9399 4.50015L9.1999 1.24015C9.45324 0.986816 9.45324 0.560149 9.1999 0.306816Z"
                          fill="#333333"></path>
                      </svg>
                    </button>
                  </div>
                </div>
              </li>
              <li class="flex items-center justify-start message-dropdown-item pt-[10px] pb-[10px]">
                <img src="{{asset('frontend/img/fav-img-3.png')}}" alt="fav icon">
                <div class="ml-[13px] w-full">
                  <div class="flex justify-between items-baseline">
                    <div class="">
                      <p class="me-fav-title">Hepatitis B Vaccine Injection</p>
                      <p class="me-mes-time">$3,185</p>
                    </div>
                    <button class="fav-close-btn"><svg width="10" height="9" viewBox="0 0 10 9" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                          d="M9.1999 0.306816C9.13823 0.245013 9.06497 0.195982 8.98432 0.162527C8.90367 0.129073 8.81722 0.111853 8.7299 0.111853C8.64259 0.111853 8.55614 0.129073 8.47549 0.162527C8.39484 0.195982 8.32158 0.245013 8.2599 0.306816L4.99991 3.56015L1.73991 0.300149C1.67818 0.238428 1.60491 0.189468 1.52427 0.156064C1.44362 0.122661 1.35719 0.105469 1.26991 0.105469C1.18262 0.105469 1.09619 0.122661 1.01554 0.156064C0.9349 0.189468 0.861626 0.238428 0.799905 0.300149C0.738184 0.36187 0.689224 0.435144 0.65582 0.515787C0.622417 0.59643 0.605225 0.682862 0.605225 0.770149C0.605225 0.857436 0.622417 0.943869 0.65582 1.02451C0.689224 1.10515 0.738184 1.17843 0.799905 1.24015L4.05991 4.50015L0.799905 7.76015C0.738184 7.82187 0.689224 7.89514 0.65582 7.97579C0.622417 8.05643 0.605225 8.14286 0.605225 8.23015C0.605225 8.31744 0.622417 8.40387 0.65582 8.48451C0.689224 8.56515 0.738184 8.63843 0.799905 8.70015C0.861626 8.76187 0.9349 8.81083 1.01554 8.84423C1.09619 8.87764 1.18262 8.89483 1.26991 8.89483C1.35719 8.89483 1.44362 8.87764 1.52427 8.84423C1.60491 8.81083 1.67818 8.76187 1.73991 8.70015L4.99991 5.44015L8.2599 8.70015C8.32163 8.76187 8.3949 8.81083 8.47554 8.84423C8.55619 8.87764 8.64262 8.89483 8.7299 8.89483C8.81719 8.89483 8.90362 8.87764 8.98427 8.84423C9.06491 8.81083 9.13818 8.76187 9.1999 8.70015C9.26163 8.63843 9.31059 8.56515 9.34399 8.48451C9.37739 8.40387 9.39458 8.31744 9.39458 8.23015C9.39458 8.14286 9.37739 8.05643 9.34399 7.97579C9.31059 7.89514 9.26163 7.82187 9.1999 7.76015L5.9399 4.50015L9.1999 1.24015C9.45324 0.986816 9.45324 0.560149 9.1999 0.306816Z"
                          fill="#333333"></path>
                      </svg>
                    </button>
                  </div>
                </div>
              </li>
              <li class="flex items-center justify-start message-dropdown-item pt-[10px] pb-[10px]">
                <img src="{{asset('frontend/img/fav-img-1.png')}}" alt="fav icon">
                <div class="ml-[13px] w-full">
                  <div class="flex justify-between items-baseline">
                    <div class="">
                      <p class="me-fav-title">Hepatitis B Vaccine Injection</p>
                      <p class="me-mes-time">$3,185</p>
                    </div>
                    <button class="fav-close-btn"><svg width="10" height="9" viewBox="0 0 10 9" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                          d="M9.1999 0.306816C9.13823 0.245013 9.06497 0.195982 8.98432 0.162527C8.90367 0.129073 8.81722 0.111853 8.7299 0.111853C8.64259 0.111853 8.55614 0.129073 8.47549 0.162527C8.39484 0.195982 8.32158 0.245013 8.2599 0.306816L4.99991 3.56015L1.73991 0.300149C1.67818 0.238428 1.60491 0.189468 1.52427 0.156064C1.44362 0.122661 1.35719 0.105469 1.26991 0.105469C1.18262 0.105469 1.09619 0.122661 1.01554 0.156064C0.9349 0.189468 0.861626 0.238428 0.799905 0.300149C0.738184 0.36187 0.689224 0.435144 0.65582 0.515787C0.622417 0.59643 0.605225 0.682862 0.605225 0.770149C0.605225 0.857436 0.622417 0.943869 0.65582 1.02451C0.689224 1.10515 0.738184 1.17843 0.799905 1.24015L4.05991 4.50015L0.799905 7.76015C0.738184 7.82187 0.689224 7.89514 0.65582 7.97579C0.622417 8.05643 0.605225 8.14286 0.605225 8.23015C0.605225 8.31744 0.622417 8.40387 0.65582 8.48451C0.689224 8.56515 0.738184 8.63843 0.799905 8.70015C0.861626 8.76187 0.9349 8.81083 1.01554 8.84423C1.09619 8.87764 1.18262 8.89483 1.26991 8.89483C1.35719 8.89483 1.44362 8.87764 1.52427 8.84423C1.60491 8.81083 1.67818 8.76187 1.73991 8.70015L4.99991 5.44015L8.2599 8.70015C8.32163 8.76187 8.3949 8.81083 8.47554 8.84423C8.55619 8.87764 8.64262 8.89483 8.7299 8.89483C8.81719 8.89483 8.90362 8.87764 8.98427 8.84423C9.06491 8.81083 9.13818 8.76187 9.1999 8.70015C9.26163 8.63843 9.31059 8.56515 9.34399 8.48451C9.37739 8.40387 9.39458 8.31744 9.39458 8.23015C9.39458 8.14286 9.37739 8.05643 9.34399 7.97579C9.31059 7.89514 9.26163 7.82187 9.1999 7.76015L5.9399 4.50015L9.1999 1.24015C9.45324 0.986816 9.45324 0.560149 9.1999 0.306816Z"
                          fill="#333333"></path>
                      </svg>
                    </button>
                  </div>
                </div>
              </li>
              <li class="flex items-center justify-start message-dropdown-item pt-[10px] pb-[10px]">
                <img src="{{asset('frontend/img/fav-img-1.png')}}" alt="fav icon">
                <div class="ml-[13px] w-full">
                  <div class="flex justify-between items-baseline">
                    <div class="">
                      <p class="me-fav-title">Hepatitis B Vaccine Injection</p>
                      <p class="me-mes-time">$3,185</p>
                    </div>
                    <button class="fav-close-btn"><svg width="10" height="9" viewBox="0 0 10 9" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                          d="M9.1999 0.306816C9.13823 0.245013 9.06497 0.195982 8.98432 0.162527C8.90367 0.129073 8.81722 0.111853 8.7299 0.111853C8.64259 0.111853 8.55614 0.129073 8.47549 0.162527C8.39484 0.195982 8.32158 0.245013 8.2599 0.306816L4.99991 3.56015L1.73991 0.300149C1.67818 0.238428 1.60491 0.189468 1.52427 0.156064C1.44362 0.122661 1.35719 0.105469 1.26991 0.105469C1.18262 0.105469 1.09619 0.122661 1.01554 0.156064C0.9349 0.189468 0.861626 0.238428 0.799905 0.300149C0.738184 0.36187 0.689224 0.435144 0.65582 0.515787C0.622417 0.59643 0.605225 0.682862 0.605225 0.770149C0.605225 0.857436 0.622417 0.943869 0.65582 1.02451C0.689224 1.10515 0.738184 1.17843 0.799905 1.24015L4.05991 4.50015L0.799905 7.76015C0.738184 7.82187 0.689224 7.89514 0.65582 7.97579C0.622417 8.05643 0.605225 8.14286 0.605225 8.23015C0.605225 8.31744 0.622417 8.40387 0.65582 8.48451C0.689224 8.56515 0.738184 8.63843 0.799905 8.70015C0.861626 8.76187 0.9349 8.81083 1.01554 8.84423C1.09619 8.87764 1.18262 8.89483 1.26991 8.89483C1.35719 8.89483 1.44362 8.87764 1.52427 8.84423C1.60491 8.81083 1.67818 8.76187 1.73991 8.70015L4.99991 5.44015L8.2599 8.70015C8.32163 8.76187 8.3949 8.81083 8.47554 8.84423C8.55619 8.87764 8.64262 8.89483 8.7299 8.89483C8.81719 8.89483 8.90362 8.87764 8.98427 8.84423C9.06491 8.81083 9.13818 8.76187 9.1999 8.70015C9.26163 8.63843 9.31059 8.56515 9.34399 8.48451C9.37739 8.40387 9.39458 8.31744 9.39458 8.23015C9.39458 8.14286 9.37739 8.05643 9.34399 7.97579C9.31059 7.89514 9.26163 7.82187 9.1999 7.76015L5.9399 4.50015L9.1999 1.24015C9.45324 0.986816 9.45324 0.560149 9.1999 0.306816Z"
                          fill="#333333"></path>
                      </svg>
                    </button>
                  </div>
                </div>
              </li>
              <li class="flex items-center justify-start message-dropdown-item pt-[10px] pb-[10px]">
                <img src="{{asset('frontend/img/fav-img-1.png')}}" alt="fav icon">
                <div class="ml-[13px] w-full">
                  <div class="flex justify-between items-baseline">
                    <div class="">
                      <p class="me-fav-title">Hepatitis B Vaccine Injection</p>
                      <p class="me-mes-time">$3,185</p>
                    </div>
                    <button class="fav-close-btn"><svg width="10" height="9" viewBox="0 0 10 9" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                          d="M9.1999 0.306816C9.13823 0.245013 9.06497 0.195982 8.98432 0.162527C8.90367 0.129073 8.81722 0.111853 8.7299 0.111853C8.64259 0.111853 8.55614 0.129073 8.47549 0.162527C8.39484 0.195982 8.32158 0.245013 8.2599 0.306816L4.99991 3.56015L1.73991 0.300149C1.67818 0.238428 1.60491 0.189468 1.52427 0.156064C1.44362 0.122661 1.35719 0.105469 1.26991 0.105469C1.18262 0.105469 1.09619 0.122661 1.01554 0.156064C0.9349 0.189468 0.861626 0.238428 0.799905 0.300149C0.738184 0.36187 0.689224 0.435144 0.65582 0.515787C0.622417 0.59643 0.605225 0.682862 0.605225 0.770149C0.605225 0.857436 0.622417 0.943869 0.65582 1.02451C0.689224 1.10515 0.738184 1.17843 0.799905 1.24015L4.05991 4.50015L0.799905 7.76015C0.738184 7.82187 0.689224 7.89514 0.65582 7.97579C0.622417 8.05643 0.605225 8.14286 0.605225 8.23015C0.605225 8.31744 0.622417 8.40387 0.65582 8.48451C0.689224 8.56515 0.738184 8.63843 0.799905 8.70015C0.861626 8.76187 0.9349 8.81083 1.01554 8.84423C1.09619 8.87764 1.18262 8.89483 1.26991 8.89483C1.35719 8.89483 1.44362 8.87764 1.52427 8.84423C1.60491 8.81083 1.67818 8.76187 1.73991 8.70015L4.99991 5.44015L8.2599 8.70015C8.32163 8.76187 8.3949 8.81083 8.47554 8.84423C8.55619 8.87764 8.64262 8.89483 8.7299 8.89483C8.81719 8.89483 8.90362 8.87764 8.98427 8.84423C9.06491 8.81083 9.13818 8.76187 9.1999 8.70015C9.26163 8.63843 9.31059 8.56515 9.34399 8.48451C9.37739 8.40387 9.39458 8.31744 9.39458 8.23015C9.39458 8.14286 9.37739 8.05643 9.34399 7.97579C9.31059 7.89514 9.26163 7.82187 9.1999 7.76015L5.9399 4.50015L9.1999 1.24015C9.45324 0.986816 9.45324 0.560149 9.1999 0.306816Z"
                          fill="#333333"></path>
                      </svg>
                    </button>
                  </div>
                </div>
              </li>

            </ul>
            <div class="empty-section hidden flex items-center justify-center flex-col py-10 pr-5 n2">
              <img src="{{asset('frontend/img/empty-wishlist.svg')}}" alt="empty wishlist icon">
              <h6 class="me-body18 text-darkgray font-bold helvetica-normal my-[10px]">Your wishlist is empty</h6>
              <p class="me-body17 text-darkgray font-medium helvetica-normal text-center">Looks like you have not
                added anything to your wishlist. Go ahead and explore top categories.</p>
            </div>
            <div class="pb-[20px] pt-[10px]">
              <button
                class="mes-view-all-btn mx-auto rounded-[50px] w-[100px] flex items-center justify-center h-[42px] border border-darkgray">
                View All
              </button>
            </div>
          </div>
        </div>
        <div class="flex items-center">
          <div class="relative {{ $isCheckoutPage == false ? 'cart-badge-container' : '' }}" id="me-cart">
            <div class="mr-[16px]">
              <div class="relative badge-container">
                @php
                    if (Auth::guard('customer')->check() == true) {
                        $totalCartVal = App\Models\Cart::where('customer_id', Auth::guard('customer')->user()->id)->sum('qty');
                    } else {
                        $totalCartVal = 0;
                    }
                @endphp
                {{-- @if($totalCartVal > 0) --}}
                <span class="me-badge flex text-white bg-orangeMediq rounded-[50%] w-[25px] h-[25px]" id="add_cart_val_mobile">{{ $totalCartVal }}</span>
                <span class="me-badge-dot hidden text-white bg-[#FF6F6F] rounded-[50%] w-[12px] h-[12px]"></span>
                {{-- @endif --}}
                <img src="{{ asset('frontend/img/new-cart-m-icon.svg') }}" class="me-cart-icon">
              </div>
            </div>
          </div>
          @if ($isCheckoutPage == false)
          <div class="message-dropdown mobile pl-[20px] pr-[10px] hidden" aria-labelledby="me-cart" style="width:95%; margin:0 auto;">
            <div id="with_data_m">
                <svg class="polygon-icon" width="18" height="11" viewBox="0 0 18 11" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M9 0L17.6603 10.5H0.339746L9 0Z" fill="white"></path>
              </svg>
              <div class="flex justify-between items-center py-[10px] hidden">
                <p class="cart-total-no">Total 6 Items</p>
                <p class="cart-total mr-[5px]">$19,110</p>
              </div>
              <ul class="pr-[5px] message-dropdown-container" id ="cart_items_m">
              
              </ul>
              <div class="pb-[20px] pt-[10px]">
                <a
                href="{{ route('checkout.init') }}">
                <button
                  class="mes-checkout mx-auto w-full rounded-[6px] flex items-center justify-center h-[42px] border border-orangeMediq bg-orangeMediq text-white">
                  @lang('labels.header.checkout')
                </button>
                </a>
            </div>
            </div>

            <div id="no_data_m">
                <div class="empty-section flex items-center justify-center flex-col py-10 pr-5 n3">
                    <img src="{{ asset('frontend/img/empty-cart.svg') }}" alt="empty cart icon">
                    <h6 class="me-body18 text-darkgray font-bold helvetica-normal my-[10px]"> @lang('labels.compare.empty')</h6>
                    <p class="me-body17 text-darkgray font-medium helvetica-normal text-center">
                        @lang('labels.compare.add_your_card')
                    </p>
                  </div>
            </div>
            
          </div>
          @endif
        </div>
         @if (!Auth::guard('customer')->check())
        <a href = "#" class="my-auto profile-mobile-btn block register-btn">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M21.6488 19.875C20.2209 17.4066 18.0206 15.6366 15.4528 14.7975C16.723 14.0414 17.7098 12.8892 18.2618 11.5179C18.8137 10.1467 18.9003 8.63213 18.5082 7.2069C18.1161 5.78167 17.267 4.52456 16.0912 3.62862C14.9155 2.73268 13.4782 2.24745 12 2.24745C10.5218 2.24745 9.08451 2.73268 7.90878 3.62862C6.73306 4.52456 5.88394 5.78167 5.49183 7.2069C5.09971 8.63213 5.18629 10.1467 5.73825 11.5179C6.29021 12.8892 7.27704 14.0414 8.5472 14.7975C5.97938 15.6356 3.77907 17.4056 2.35126 19.875C2.2989 19.9604 2.26417 20.0554 2.24912 20.1544C2.23407 20.2534 2.239 20.3544 2.26363 20.4515C2.28825 20.5486 2.33207 20.6398 2.3925 20.7196C2.45293 20.7995 2.52874 20.8664 2.61547 20.9165C2.7022 20.9666 2.79808 20.9989 2.89745 21.0113C2.99683 21.0237 3.0977 21.0161 3.19409 20.989C3.29049 20.9618 3.38047 20.9156 3.45872 20.8531C3.53697 20.7906 3.6019 20.713 3.6497 20.625C5.41595 17.5725 8.53782 15.75 12 15.75C15.4622 15.75 18.5841 17.5725 20.3503 20.625C20.3981 20.713 20.4631 20.7906 20.5413 20.8531C20.6196 20.9156 20.7095 20.9618 20.8059 20.989C20.9023 21.0161 21.0032 21.0237 21.1026 21.0113C21.2019 20.9989 21.2978 20.9666 21.3845 20.9165C21.4713 20.8664 21.5471 20.7995 21.6075 20.7196C21.6679 20.6398 21.7118 20.5486 21.7364 20.4515C21.761 20.3544 21.766 20.2534 21.7509 20.1544C21.7358 20.0554 21.7011 19.9604 21.6488 19.875ZM6.75001 9C6.75001 7.96165 7.05792 6.94661 7.63479 6.08326C8.21167 5.2199 9.03161 4.54699 9.99092 4.14963C10.9502 3.75227 12.0058 3.6483 13.0242 3.85088C14.0426 4.05345 14.9781 4.55346 15.7123 5.28769C16.4465 6.02191 16.9466 6.95738 17.1491 7.97578C17.3517 8.99418 17.2477 10.0498 16.8504 11.0091C16.453 11.9684 15.7801 12.7883 14.9168 13.3652C14.0534 13.9421 13.0384 14.25 12 14.25C10.6081 14.2485 9.27359 13.6949 8.28934 12.7107C7.3051 11.7264 6.7515 10.3919 6.75001 9Z"
                fill="#333333" />
           </svg>
        </a>
        @else
          <a href="{{ route('mobile.profile') }}" class="my-auto profile-mobile-btn block">
            {{-- <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M21.6488 19.875C20.2209 17.4066 18.0206 15.6366 15.4528 14.7975C16.723 14.0414 17.7098 12.8892 18.2618 11.5179C18.8137 10.1467 18.9003 8.63213 18.5082 7.2069C18.1161 5.78167 17.267 4.52456 16.0912 3.62862C14.9155 2.73268 13.4782 2.24745 12 2.24745C10.5218 2.24745 9.08451 2.73268 7.90878 3.62862C6.73306 4.52456 5.88394 5.78167 5.49183 7.2069C5.09971 8.63213 5.18629 10.1467 5.73825 11.5179C6.29021 12.8892 7.27704 14.0414 8.5472 14.7975C5.97938 15.6356 3.77907 17.4056 2.35126 19.875C2.2989 19.9604 2.26417 20.0554 2.24912 20.1544C2.23407 20.2534 2.239 20.3544 2.26363 20.4515C2.28825 20.5486 2.33207 20.6398 2.3925 20.7196C2.45293 20.7995 2.52874 20.8664 2.61547 20.9165C2.7022 20.9666 2.79808 20.9989 2.89745 21.0113C2.99683 21.0237 3.0977 21.0161 3.19409 20.989C3.29049 20.9618 3.38047 20.9156 3.45872 20.8531C3.53697 20.7906 3.6019 20.713 3.6497 20.625C5.41595 17.5725 8.53782 15.75 12 15.75C15.4622 15.75 18.5841 17.5725 20.3503 20.625C20.3981 20.713 20.4631 20.7906 20.5413 20.8531C20.6196 20.9156 20.7095 20.9618 20.8059 20.989C20.9023 21.0161 21.0032 21.0237 21.1026 21.0113C21.2019 20.9989 21.2978 20.9666 21.3845 20.9165C21.4713 20.8664 21.5471 20.7995 21.6075 20.7196C21.6679 20.6398 21.7118 20.5486 21.7364 20.4515C21.761 20.3544 21.766 20.2534 21.7509 20.1544C21.7358 20.0554 21.7011 19.9604 21.6488 19.875ZM6.75001 9C6.75001 7.96165 7.05792 6.94661 7.63479 6.08326C8.21167 5.2199 9.03161 4.54699 9.99092 4.14963C10.9502 3.75227 12.0058 3.6483 13.0242 3.85088C14.0426 4.05345 14.9781 4.55346 15.7123 5.28769C16.4465 6.02191 16.9466 6.95738 17.1491 7.97578C17.3517 8.99418 17.2477 10.0498 16.8504 11.0091C16.453 11.9684 15.7801 12.7883 14.9168 13.3652C14.0534 13.9421 13.0384 14.25 12 14.25C10.6081 14.2485 9.27359 13.6949 8.28934 12.7107C7.3051 11.7264 6.7515 10.3919 6.75001 9Z"
                fill="#333333" />
            </svg> --}}
            {{-- <img src="./img/icard3.svg" class="w-[24px] h-[24px] rounded-[50%] object-cover logged-profile"> --}}


            @if(auth()->guard('customer')->user()->google_id !== null || auth()->guard('customer')->user()->facebook_id !== null) 
            @if(auth()->guard('customer')->user()->profile_img == null)
            <img src="{{ asset('frontend/img/me-profile-img.svg') }}"
            class="w-[24px] h-[24px] rounded-[50%] object-cover logged-profile">
            @elseif(File::exists(public_path('storage/customer').'/'.auth()->guard('customer')->user()->profile_img))
            <img src="{{ asset('storage/customer/' .auth()->guard('customer')->user()->profile_img) }}"
            class="w-[24px] h-[24px] rounded-[50%] object-cover logged-profile">
            @else
            <img src="{{ auth()->guard('customer')->user()->profile_img }}"
            class="w-[24px] h-[24px] rounded-[50%] object-cover logged-profile">
            @endif
            @else
            <img src="{{ auth()->guard('customer')->user()->profile_img != null? asset('storage/customer/' .auth()->guard('customer')->user()->profile_img): asset('frontend/img/me-profile-img.svg') }}"
                class="w-[24px] h-[24px] rounded-[50%] object-cover logged-profile">
            @endif

          </a>
        @endif
        
      </div>
      <div class="fixed overflow-hidden left-0 top-0 h-[100vh] w-full bg-white z-50 mobile-menu-content2">
        <div class="me-search-bar-container2 flex items-center justify-start">
          <div class="action-bar w-[20px] h-[20px] mr-[10px]">
            <button class="close-arrow-btn w-full h-full">
              <img src="{{ asset('frontend/img/bolder-close-icon.svg') }}" alt="close arrow svg" class="w-full h-full object-cover" />
            </button>
            <button class="cusror-back-arrow-btn w-full h-full hidden">
              <img src="{{ asset('frontend/img/bolder-back-icon.svg') }}" alt="back arrow svg" class="w-full h-full object-cover" />
            </button>
          </div>

          <form 
            class="mobile-search2-style flex items-center border border-[#E4E4E4] bg-[#F5F5F5] rounded-[100px] h-[48px] w-full relative">
            <input type="text" id="search-item2" placeholder="@lang('labels.header.search')"
              class="p-[20px] bg-transparent h-[48px] w-full m-search-input" autocomplete="off">
            <div class="divider bg-[#E4E4E4] w-[1px] h-1/2 hidden"></div>
            <div class="search-dropdown ml-[17px] relative w-[275px] hidden">
              <p class="search-selected md:w-full h-[48px] items-center justify-start hidden">
                <img src="https://p238.visibleone.io/frontend/img/me-hlocation-icon.svg" alt="location" class="mr-4">
                <span class="text-[#A3A3A3] advance-search">Advance Search</span>
                <input type="text" hidden="" id="search_selected_item" autocomplete="off">
              </p>
              <div class="search-dropdown-list ml-[17px] hidden">
                <button type="button"
                  class="text-please-12 text-titletext font-semibold pb-[3px] border-b border-b-wholebg w-full text-left hidden search_clear_all">
                  Clear All
                </button>
              </div>
            </div>
            <button
              class="delete-search-text-btn ml-auto mr-[0.5rem] w-[40px] h-[40px] hidden items-center justify-center absolute top-[3px] right-[-6px]">
              <img src="{{ asset('frontend/img/delete-search-icon.svg') }}" alt="delete icon" />
            </button>
          </form>
        </div>
        <div class="mobile-search-list mobile-search p-[20px] relative z-[1001] bg-white top-[10px] hidden">
            
            {{-- <div class="recent-search-hover hidden">
                <h6 class="mb-[4px] helvetica-normal me-body18 font-medium">Most Popular</h6>
                <div class="flex flex-wrap items-center justify-start recent-search-items">
                    <span
                        class="bg-far px-[20px] py-[8px] mr-[8px] rounded-[50px] helvetica-normal font-medium me-body18 text-darkgray mb-4 border border-far hover:border-blueMediq hover:text-blueMediq">vaccine
                    </span>
                    <span
                        class="bg-far px-[20px] py-[8px] mr-[8px] rounded-[50px] helvetica-normal font-medium me-body18 text-darkgray mb-4 border border-far hover:border-blueMediq hover:text-blueMediq">female
                    </span>
                    <span
                        class="bg-far px-[20px] py-[8px] mr-[8px] rounded-[50px] helvetica-normal font-medium me-body18 text-darkgray mb-4 border border-far hover:border-blueMediq hover:text-blueMediq">sick
                    </span>
                    <span
                        class="bg-far px-[20px] py-[8px] mr-[8px] rounded-[50px] helvetica-normal font-medium me-body18 text-darkgray mb-4 border border-far hover:border-blueMediq hover:text-blueMediq">health
                        plan </span>
                    <span
                        class="bg-far px-[20px] py-[8px] mr-[8px] rounded-[50px] helvetica-normal font-medium me-body18 text-darkgray mb-4 border border-far hover:border-blueMediq hover:text-blueMediq">travel
                        vaccine </span>
                </div>
                <div class="pt-[2.5rem] mt-[20px]">
                    <div class="flex flex-wrap items-center">
                        <div class="border border-[#E4E4E4] rounded-[20px] p-5 relative leaderboard-card--list font-secondary w-full md:w-[48%]"
                            style=" background-image: url(./img/me-plus.png);
                  background-repeat: no-repeat;">
                            <img src="./img/me-crown.svg" alt="crown" class="mx-auto absolute left-1/2 top-[-2.5rem]">
                            <h4 class="pb-4 border-b border-b-dashed font-bold text-blueMediq me-title23">Best-selling
                                Comprehensive
                                Body Check</h4>
                            <div class="pt-5 flex xl:gap-5">
                                <div class="relative">
                                    <p
                                        class="font-bold text-white me-body18 w-[30px] h-[30px] bg-blueMediq flex justify-center items-center absolute top-0 left-0 rounded-tl-[8px] rounded-br-[8px]">
                                        1</p>
                                    <img src="./img/leaderboard-item.png" alt="leaderboard item" class="rounded-[8px]">
                                </div>
                                <div class="font-secondary pl-5 xl:pl-0">
                                    <p class="font-medium text-darkgray me-body18">Annual Health Check Plan</p>
                                </div>
                            </div>
                        </div>
                        <div class="border border-[#E4E4E4] rounded-[20px] p-5 relative leaderboard-card--list font-secondary mt-[60px] md:mt-0 w-full md:w-[48%]"
                            style=" background-image: url(./img/me-plus.png);
                  background-repeat: no-repeat;">
                            <img src="./img/me-crown.svg" alt="crown" class="mx-auto absolute left-1/2 top-[-2.5rem]">
                            <h4 class="pb-4 border-b border-b-dashed font-bold text-blueMediq me-title23">Best-selling
                                Comprehensive
                                Body Check</h4>
                            <div class="pt-5 flex xl:gap-5">
                                <div class="relative">
                                    <p
                                        class="font-bold text-white me-body18 w-[30px] h-[30px] bg-blueMediq flex justify-center items-center absolute top-0 left-0 rounded-tl-[8px] rounded-br-[8px]">
                                        1</p>
                                    <img src="./img/leaderboard-item.png" alt="leaderboard item" class="rounded-[8px]">
                                </div>
                                <div class="font-secondary pl-5 xl:pl-0">
                                    <p class="font-medium text-darkgray me-body18">Annual Health Check Plan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="recent-search-type hidden">
                <div class="recent-search-container">
                    <h6 class="mb-[4px] helvetica-normal me-body18 font-medium text-lightgray">Recent Search</h6>
                    <div class="flex flex-wrap items-center justify-start recent-search-items">
                        <span
                            class="bg-far px-[20px] py-[8px] mr-[8px] rounded-[50px] helvetica-normal font-medium me-body18 text-darkgray mb-4 border border-far hover:border-blueMediq hover:text-blueMediq">vaccine
                            <span class="rsi-close">×</span></span>
                        <span
                            class="bg-far px-[20px] py-[8px] mr-[8px] rounded-[50px] helvetica-normal font-medium me-body18 text-darkgray mb-4 border border-far hover:border-blueMediq hover:text-blueMediq">female
                            <span class="rsi-close">×</span></span>
                        <span
                            class="bg-far px-[20px] py-[8px] mr-[8px] rounded-[50px] helvetica-normal font-medium me-body18 text-darkgray mb-4 border border-far hover:border-blueMediq hover:text-blueMediq">sick
                            <span class="rsi-close">×</span></span>
                        <span
                            class="bg-far px-[20px] py-[8px] mr-[8px] rounded-[50px] helvetica-normal font-medium me-body18 text-darkgray mb-4 border border-far hover:border-blueMediq hover:text-blueMediq">health
                            plan <span class="rsi-close">×</span></span>
                        <span
                            class="bg-far px-[20px] py-[8px] mr-[8px] rounded-[50px] helvetica-normal font-medium me-body18 text-darkgray mb-4 border border-far hover:border-blueMediq hover:text-blueMediq">travel
                            vaccine <span class="rsi-close">×</span></span>
                    </div>
                </div>
                <div class="recent-search-category mt-[12px]">
                    <h6 class="mb-[4px] helvetica-normal me-body18 font-medium text-lightgray">Category</h6>
                    <div class="flex flex-wrap items-center justify-start recent-search-items pl-[20px]">
                        <p
                            class="flex items-center justify-between w-full mb-[16px] helvetica-normal font-medium me-body18 text-darkgray">
                            Annual Body Health Check Plan <img src="./img/cross-arrow.svg" alt="cross-arrow img"
                                class="cross-arrow-img"></p>
                        <p
                            class="flex items-center justify-between w-full mb-[16px] helvetica-normal font-medium me-body18 text-darkgray">
                            Annual Body Health Check Plan <img src="./img/cross-arrow.svg" alt="cross-arrow img"
                                class="cross-arrow-img"></p>
                        <p
                            class="flex items-center justify-between w-full mb-[16px] helvetica-normal font-medium me-body18 text-darkgray">
                            Annual Body Health Check Plan <img src="./img/cross-arrow.svg" alt="cross-arrow img"
                                class="cross-arrow-img"></p>
                        <p
                            class="flex items-center justify-between w-full mb-[16px] helvetica-normal font-medium me-body18 text-darkgray">
                            Annual Body Health Check Plan <img src="./img/cross-arrow.svg" alt="cross-arrow img"
                                class="cross-arrow-img"></p>
                        <p
                            class="flex items-center justify-between w-full mb-[16px] helvetica-normal font-medium me-body18 text-darkgray">
                            Annual Body Health Check Plan <img src="./img/cross-arrow.svg" alt="cross-arrow img"
                                class="cross-arrow-img"></p>
                    </div>
                </div>
                <div class="recent-search-brand mt-[2px]">
                    <h6 class="mb-[4px] helvetica-normal me-body18 font-medium text-lightgray">Brand</h6>
                    <div class="flex flex-wrap items-center justify-start recent-search-items pl-[20px]">
                        <p
                            class="flex items-center justify-between w-full mb-[16px] helvetica-normal font-medium me-body18 text-darkgray">
                            Annual Body Health Check Plan <img src="./img/cross-arrow.svg" alt="cross-arrow img"
                                class="cross-arrow-img"></p>
                        <p
                            class="flex items-center justify-between w-full mb-[16px] helvetica-normal font-medium me-body18 text-darkgray">
                            Annual Body Health Check Plan <img src="./img/cross-arrow.svg" alt="cross-arrow img"
                                class="cross-arrow-img"></p>
                        <p
                            class="flex items-center justify-between w-full mb-[16px] helvetica-normal font-medium me-body18 text-darkgray">
                            Annual Body Health Check Plan <img src="./img/cross-arrow.svg" alt="cross-arrow img"
                                class="cross-arrow-img"></p>
                        <p
                            class="flex items-center justify-between w-full mb-[16px] helvetica-normal font-medium me-body18 text-darkgray">
                            Annual Body Health Check Plan <img src="./img/cross-arrow.svg" alt="cross-arrow img"
                                class="cross-arrow-img"></p>
                        <p
                            class="flex items-center justify-between w-full mb-[16px] helvetica-normal font-medium me-body18 text-darkgray">
                            Annual Body Health Check Plan <img src="./img/cross-arrow.svg" alt="cross-arrow img"
                                class="cross-arrow-img"></p>
                    </div>
                </div>
            </div> --}}
            <div class="recent-search-type_mobile h-screen">

            </div>
        </div>
        <div class="lang-quick-section bg-blueMediq px-[10px] flex items-center justify-between">
          <div>
            <div class="name-selector-option">
              <input type="hidden" name="nso-name" value="">
              <button type="button" class="nso-name-btn flex items-center"><span
                  class="w-full me-body14 text-whitez helvetica-normal">{{ langbind($header, 'quick_start_gudie_text') }}</span>
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M7.53334 9.53341L5.80001 7.80008C5.5889 7.58897 5.54179 7.34741 5.65867 7.07541C5.77556 6.80341 5.98379 6.66719 6.28334 6.66675H9.71667C10.0167 6.66675 10.2251 6.80297 10.342 7.07541C10.4589 7.34786 10.4116 7.58941 10.2 7.80008L8.46667 9.53341C8.40001 9.60008 8.32779 9.65008 8.25001 9.68341C8.17223 9.71675 8.0889 9.73342 8.00001 9.73342C7.91112 9.73342 7.82779 9.71675 7.75001 9.68341C7.67223 9.65008 7.60001 9.60008 7.53334 9.53341Z"
                    fill="white" />
                </svg>
              </button>
              <div class="name-selector-option--dropdown-list relative">
                <ul class="nso-dropdown-lists absolute top-0 ">
                  {{-- <li class="nso-dropdown-items me-body14" data-value="Leaderboard">Leaderboard</li> --}}
                {{-- <a href="{!! langbind($header, 'quick_start_gudie_link') !== null ? url(langbind($header, 'quick_start_gudie_link')) : '#' !!}"> --}}
                    <li class="nso-dropdown-items me-body14" data-value="{{ langbind($header, 'quick_start_gudie_text') }}">
                        <a href="{!! langbind($header, 'quick_start_gudie_link') !== null ? url(langbind($header, 'quick_start_gudie_link')) : '#' !!}">
                            {{ langbind($header, 'quick_start_gudie_text') }}
                        </a>
                    </li>
                {{-- </a> --}}
                {{-- <a href="{!! langbind($header, 'help_center_link') !== null ? url(langbind($header, 'help_center_link')) : '#' !!}"> --}}
                    <li class="nso-dropdown-items me-body14" data-value="{{ langbind($header, 'help_center_text') }}">
                        <a href="{!! langbind($header, 'help_center_link') !== null ? url(langbind($header, 'help_center_link')) : '#' !!}">
                        {{ langbind($header, 'help_center_text') }}
                        </a>
                    </li>
                {{-- </a> --}}
                </ul>
              </div>
            </div>
          </div>
          <div class="flangm flex items-center justify-start">
            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <div class="lang-item mr-[15px] last:mr-0 first:ml-2.5 py-[5px] text-d1 cursor-pointer {{ LaravelLocalization::getCurrentLocaleNative() == $properties['native'] ? 'selected' : '' }}" data-id="繁體">
                    <a href = "{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['native'] }}
                    </a>
                </div>
            @endforeach
          </div>
        </div>
        <div class="scolling-menu-layout">
          <div class="sml-left">
            <ul class="mobile-2style">
            @if (isset($main_categories) && count($main_categories) > 0)
                @foreach ($main_categories as $key=>$category)
                    <li class="sml-left-item px-[10px] py-[8px] @if($key == 0) selected @endif">
                        <a href="/#smlr-{{ $category->id }}" class="helvetical-normal me-body14 text-darkgray">{{ langbind($category, 'name') }}</a>
                    </li>
                @endforeach
            @endif
            </ul>
          </div>
          <div class="sml-right">
            <div class="detail-sub-menu">
                @if (isset($main_categories) && count($main_categories) > 0)
                @foreach ($main_categories as $key=>$category)
                @php
                $cate = [];
                foreach($category->subCategory as $skey => $subCate){
                    $zkey = $skey == 0 ? '?pc=' : '';
                    $cate[$skey] = $zkey.$subCate->id.'%2C';
                }
                @endphp
              <div id="smlr-{{ $category->id }}" class="smlr-class pb-[50px] pt-[10px] @if($key == 0) selected @endif">
                <div class="py-[0.5rem]">
                  <a href="{{langlink('products'.implode('',$cate))}}"
                    class="flex items-center justify-between pr-[10px] helvetica-normal me-body16 text-darkgray smlr-link">
                    <span>{{ langbind($category, 'name') }}</span>
                    <img src="{{ asset('frontend/img/bolder-back-icon.svg') }}" alt="cursor back icon" class="rotate-180" />
                  </a>
                </div>
                @if(count($category->images) > 0)
                <div class="promotion-area mt-[8px] mb-[18px]">
                  @foreach ($category->images as $key => $img)
                  {{-- {{ var_dump($category->images[0]->id) }} --}}
                  <div class="slide">
                    <img src="{{ asset($img->imageM) }}" alt="" class="mobile-second-slider-img">
                    <p class="helvetica-normal promo-title">{{ langbind($img,'title') }}</p>
                  </div>
                  @endforeach
                </div>
                @endif


                <div class="inner-submenu-item">
                  <ul class="flex items-stretch flex-wrap mobile-menu-style2">
                    @if(count($category->subCategory) > 0)
                    @foreach ($category->subCategory as $sub_category)
                        <li class="mobile-menu-style2-item mr-[10px] mb-[4px]"><a
                            href="{{ langlink('products?pc=' . $sub_category->id) }}" class="me-sub-menu-item">
                            <img src="{{ isset($sub_category->img) ? $sub_category->img : asset('frontend/img/category2.svg') }}">
                            <span>{{ langbind($sub_category, 'name') }}</span></a>
                        </li>
                    @endforeach
                    @endif
                  </ul>
                </div>
              </div>
              @endforeach
              @endif
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  @if (Route::currentRouteName() != null && Route::currentRouteName() != 'mobile.profile')
    <div component-name="me-recommendation-menu" class="bg-blueMediq">
        <div class="me-rec-container me-rec-menu ">
            <div class="flex justify-between text-white me-rec-container-item">
                <div id="text-slider" class="hidden sm:block w-full xlg:w-1/2 h-[34px] sm:h-[40px] relative">
                    <div class="slidem">

                        @if ($slides != null)

                            @foreach ($slides as $slide)
                                {!! $slide !!}
                            @endforeach

                        @endif

                    </div>
                </div>
            
                <div id="text-slider-mobile" class="block sm:hidden w-full xlg:w-1/2 h-[34px] sm:h-[40px] relative">
                    <div class="text-slider-quotes flex items-center justify-center flex-col h-[34px] overflow-hidden">
                    
                        {{-- <p class="quotes h-[34px]">Health Check Guide and Recommendation </p>
                    
                        <p class="quotes h-[34px]">Free Store Pickup </p>
                    
                        <p class="quotes h-[34px]">Free Delivery on $500 for VIP </p>
                    
                        <p class="quotes h-[34px]">Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p> --}}
                        @if ($slides != null)

                        @foreach ($slides as $slide)
                            <div class="quotes h-[34px]"> {!! $slide !!} </div>
                        @endforeach

                    @endif
                    
                    </div>
                </div>  

                <ul class="flex justify-end items-center language-section">
                    <li class="mr-6 last:mr-0">
                        <a href="{!! langbind($header, 'quick_start_gudie_link') !== null ? url(langbind($header, 'quick_start_gudie_link')) : '#' !!}" class="hover:underline"><span>{{ langbind($header, 'quick_start_gudie_text') }} <span></a>
                    </li>
                    <li class="mr-6 last:mr-0">
                        <a href="{!! langbind($header, 'help_center_link') !== null ? url(langbind($header, 'help_center_link')) : '#' !!}" class="hover:underline"><span>{{ langbind($header, 'help_center_text') }}</span></a>
                    </li>
                    {{-- <li class="mr-6 last:mr-0">
                        <a href="#" class="hover:underline"><span>@lang('labels.header.reward')</span></a>
                    </li> 
                     <li class="mr-6 last:mr-0">
                        <a href="#" class="hover:underline"><span>@lang('labels.header.help')</span></a>
                    </li> --}}

                    <li class="mr-6 last:mr-0 relative">
                        <button class="flex items-center justify-end me-lang-btn change-text">
                            <span class="change-text">{{ LaravelLocalization::getCurrentLocaleNative() }}</span>
                            <svg class="change-text ml-[11px]" width="6" height="4" viewBox="0 0 6 4"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path class="change-text"
                                    d="M2.53285 3.03329L0.79952 1.29996C0.588409 1.08885 0.541298 0.847293 0.658186 0.575293C0.775075 0.303293 0.983298 0.16707 1.28285 0.166626H4.71619C5.01619 0.166626 5.22463 0.302848 5.34152 0.575293C5.45841 0.847737 5.41108 1.08929 5.19952 1.29996L3.46619 3.03329C3.39952 3.09996 3.3273 3.14996 3.24952 3.18329C3.17174 3.21663 3.08841 3.23329 2.99952 3.23329C2.91063 3.23329 2.8273 3.21663 2.74952 3.18329C2.67174 3.14996 2.59952 3.09996 2.53285 3.03329Z"
                                    fill="white"></path>
                            </svg>
                        </button>
                        <div class="bg-whitez lang-container rounded-[20px]">
                            {{-- <div class="lang-item py-[5px] text-darkgray cursor-pointer selected" data-id="EN">EN</div>
                    <div class="lang-item py-[5px] text-darkgray cursor-pointer" data-id="繁體">繁體中文</div>
                    <div class="lang-item py-[5px] text-darkgray cursor-pointer" data-id="简体">简体中文</div> --}}
                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <div class="lang-item block py-[5px] text-darkgray cursor-pointer {{ LaravelLocalization::getCurrentLocaleNative() == $properties['native'] ? 'selected' : '' }}"
                                    data-id="EN">
                                    <a class="block" rel="alternate" hreflang="{{ $localeCode }}"
                                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['native'] }}</a>
                                </div>
                            @endforeach
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
  @endif


<div component-name="me-menu" class="me-menu-container">
    <div class="hidden lg:block">
        <div class="bg-white menu-with-searchbar">
            <div class="bg-white menu-with-searchbar-content">
                <div class="flex justify-between">
                    <div class="menu-with-searchbar-div flex flex-wrap md:flex-nowrap items-center">
                        <a href="{{ route('mediq') }}">
                            <img src="{{ asset('frontend/img/Logotype_Mediq-updated.svg') }}" alt="logo"
                                class="mr-[32px] 7xl:mr-[63px]">
                        </a>
                        <div class="me-search-bar-container relative">
                            <form
                                class="me-search-bar flex items-center border border-[#E4E4E4] bg-[#F5F5F5] rounded-[100px] h-[48px] relative">

                                <input type="text" id="search-item-desktop" placeholder="@lang('labels.header.search')"
                                    class="w-[351px] p-[20px] bg-transparent h-[48px] search-item-desktop"
                                    autocomplete="off">
                                <div class="divider bg-[#E4E4E4] w-[1px] h-1/2 hidden"></div>
                                <div class="search-dropdown ml-[17px] relative w-[275px]">
                                    <p
                                        class="search-selected inline-flex md:w-full h-[48px] items-center justify-start hidden">
                                        <img src="{{ asset('frontend/img/me-hlocation-icon.svg') }}" alt="location"
                                            class="mr-4">
                                        <span class="text-[#A3A3A3] advance-search">@lang('labels.header.advance_search')</span>
                                        <input type="text" hidden="" id="search_selected_item">
                                    </p>
                                    <div class="search-dropdown-list ml-[17px] hidden">
                                        <button type="button"
                                            class="text-please-12 text-titletext font-semibold pb-[3px] border-b border-b-wholebg w-full text-left hidden search_clear_all">
                                            Clear All
                                        </button>
                                    </div>
                                    <button type="button"
                                        class="ml-auto mr-[0.5rem] w-[40px] h-[40px] bg-[#2FA9B5] rounded-[50%] flex items-center justify-center">
                                        <img src="{{ asset('frontend/img/me-hsearch-icon.svg') }}" alt="search icon"
                                            id="btn-search" class="search-icon">
                                    </button>
                                </div>
                            </form>
                            <div class="search-lists desktop-search py-[20px] hidden">
                                <div class="recent-search-type">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="logged-container flex items-stretch justify-stretch">
                        <div class="flex justify-start relative">
                            <div class="mr-[30px] last:mr-0 flex items-center">
                                <!-- <div class="relative badge-container" id="me-message">
                                <span class="me-badge text-white bg-orangeMediq rounded-[50%] w-[25px] h-[25px]">99</span>
                                <span class="me-badge-dot text-white bg-[#FF6F6F] rounded-[50%] w-[12px] h-[12px]"></span>

                                <img src="{{ asset('frontend/img/me-message-icon.svg') }}"
                                    class="me-message-icon" />
                            </div> -->
                                <!-- <div class="message-dropdown pt-[20px] pl-[20px] pr-[10px] hidden"
                                aria-labelledby="me-message">
                                <svg class="polygon-icon" width="18" height="11" viewBox="0 0 18 11"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 0L17.6603 10.5H0.339746L9 0Z" fill="white" />
                                </svg>

                                <ul class="pr-[10px] message-dropdown-container">
                                    <li
                                        class="flex items-center justify-center message-dropdown-item pt-[10px] pb-[10px] first:pt-0">
                                        <img src="{{ asset('frontend/img/me-ellipse.png') }}"
                                            alt="ellipse icon" />
                                        <div class="ml-[13px]">
                                            <div class="flex justify-between items-center">
                                                <p class="me-mes-title">mediQ</p>
                                                <p class="me-mes-time">18:56</p>
                                            </div>
                                            <div class="flex justify-between items-center">
                                                <p class="me-mes-des">Dear customer, welcome to our website and
                                                    enjoy out limited time discount</p>
                                                <span class="message-badge">10</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li
                                        class="flex items-center justify-center message-dropdown-item pt-[10px] pb-[10px] first:pt-0">
                                        <img src="{{ asset('frontend/img/me-ellipse.png') }}"
                                            alt="ellipse icon" />
                                        <div class="ml-[13px]">
                                            <div class="flex justify-between items-center">
                                                <p class="me-mes-title">Medtimes</p>
                                                <p class="me-mes-time">18:56</p>
                                            </div>
                                            <div class="flex justify-between items-center">
                                                <p class="me-mes-des">Dear customer, welcome to our website and
                                                    enjoy out limited time discount</p>
                                                <span class="message-badge">3</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li
                                        class="flex items-center justify-center message-dropdown-item pt-[10px] pb-[10px] first:pt-0">
                                        <img src="{{ asset('frontend/img/me-ellipse.png') }}"
                                            alt="ellipse icon" />
                                        <div class="ml-[13px]">
                                            <div class="flex justify-between items-center">
                                                <p class="me-mes-title">Human Health</p>
                                                <p class="me-mes-time">18:56</p>
                                            </div>
                                            <div class="flex justify-between items-center">
                                                <p class="me-mes-des">Dear customer, welcome to our website and
                                                    enjoy out limited time discount</p>
                                                <span class="hidden"></span>
                                            </div>
                                        </div>
                                    </li>
                                    <li
                                        class="flex items-center justify-center message-dropdown-item pt-[10px] pb-[10px] first:pt-0">
                                        <img src="{{ asset('frontend/img/me-ellipse.png') }}"
                                            alt="ellipse icon" />
                                        <div class="ml-[13px]">
                                            <div class="flex justify-between items-center">
                                                <p class="me-mes-title">The Central Health Center</p>
                                                <p class="me-mes-time">18:56</p>
                                            </div>
                                            <div class="flex justify-between items-center">
                                                <p class="me-mes-des">Dear customer, welcome to our website and
                                                    enjoy out limited time discount</p>
                                                <span class="message-badge">1</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li
                                        class="flex items-center justify-center message-dropdown-item pt-[10px] pb-[10px] first:pt-0">
                                        <img src="{{ asset('frontend/img/me-ellipse.png') }}"
                                            alt="ellipse icon" />
                                        <div class="ml-[13px]">
                                            <div class="flex justify-between items-center">
                                                <p class="me-mes-title">CS Healthcare Medical</p>
                                                <p class="me-mes-time">18:56</p>
                                            </div>
                                            <div class="flex justify-between items-center">
                                                <p class="me-mes-des">Dear customer, welcome to our website and
                                                    enjoy out limited time discount</p>
                                                <span class="message-badge">27</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li
                                        class="flex items-center justify-center message-dropdown-item pt-[10px] pb-[10px] first:pt-0">
                                        <img src="{{ asset('frontend/img/me-ellipse.png') }}"
                                            alt="ellipse icon" />
                                        <div class="ml-[13px]">
                                            <div class="flex justify-between items-center">
                                                <p class="me-mes-title">mediQ</p>
                                                <p class="me-mes-time">18:56</p>
                                            </div>
                                            <div class="flex justify-between items-center">
                                                <p class="me-mes-des">Dear customer, welcome to our website and
                                                    enjoy out limited time discount</p>
                                                <span class="message-badge">10</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li
                                        class="flex items-center justify-center message-dropdown-item pt-[10px] pb-[10px] first:pt-0">
                                        <img src="{{ asset('frontend/img/me-ellipse.png') }}"
                                            alt="ellipse icon" />
                                        <div class="ml-[13px]">
                                            <div class="flex justify-between items-center">
                                                <p class="me-mes-title">Medtimes</p>
                                                <p class="me-mes-time">18:56</p>
                                            </div>
                                            <div class="flex justify-between items-center">
                                                <p class="me-mes-des">Dear customer, welcome to our website and
                                                    enjoy out limited time discount</p>
                                                <span class="message-badge">3</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li
                                        class="flex items-center justify-center message-dropdown-item pt-[10px] pb-[10px] first:pt-0">
                                        <img src="{{ asset('frontend/img/me-ellipse.png') }}"
                                            alt="ellipse icon" />
                                        <div class="ml-[13px]">
                                            <div class="flex justify-between items-center">
                                                <p class="me-mes-title">Human Health</p>
                                                <p class="me-mes-time">18:56</p>
                                            </div>
                                            <div class="flex justify-between items-center">
                                                <p class="me-mes-des">Dear customer, welcome to our website and
                                                    enjoy out limited time discount</p>
                                                <span class="hidden"></span>
                                            </div>
                                        </div>
                                    </li>

                                </ul>
                                <div class="pb-[20px] pt-[10px]">
                                    <button
                                        class="mes-view-all-btn mx-auto rounded-[50px] w-[100px] flex items-center justify-center h-[42px] border border-darkgray">
                                        View All
                                    </button>
                                </div>
                            </div> -->
                            </div>
                            <div class="mr-[30px] last:mr-0  flex items-center">
                                @php
                                    $favouriteList = [];
                                    if (Auth::guard('customer')->user() != null) {
                                        $data = \App\Models\ProductFavourite::where('customer_id', Auth::guard('customer')->user()->id)
                                            ->pluck('product_id')
                                            ->toArray();
                                        $favouriteList = \App\Models\Product::whereIn('id', $data)
                                            ->limit(10)
                                            ->get();
                                    }
                                @endphp
                                {{-- <div class="relative fav-badge-contianer {{ Auth::guard('customer')->user() == null ? 'click-disable' : '' }}"
                                    id="me-fav">
                                    <div class="">
                                        <div class="relative badge-container">
                                            <span
                                                class="me-badge hidden text-white bg-orangeMediq rounded-[50%] w-[25px] h-[25px]"
                                                id="totalfavcount">{{ count($favouriteList) }}</span>
                                            <span
                                                class="me-badge-dot text-white bg-[#FF6F6F] rounded-[50%] w-[12px] h-[12px]"></span>
                                            <img src="{{ asset('frontend/img/me-fav-icon.svg') }}"
                                                class="me-fav-icon" />
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="message-dropdown pt-[20px]  hidden" aria-labelledby="me-fav">
                                  <svg class="polygon-icon pl-[20px] pr-[10px]" width="18" height="11" viewBox="0 0 18 11"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 0L17.6603 10.5H0.339746L9 0Z" fill="white" />
                                  </svg>
                                  <div class="favList empty-section flex items-center justify-center flex-col p-10 n5  {{count($favouriteList) > 0?'hidden':''}}">
                                    <img src="{{asset('frontend/img/empty-wishlist.svg')}}" alt="empty wishlist icon">
                                    <h6 class="me-body18 text-darkgray font-bold helvetica-normal my-[10px]">Your wishlist is empty</h6>
                                    <p class="me-body17 text-darkgray font-medium text-center helvetica-normal">Looks like you have not added anything to your wishlist. Go ahead and explore top categories.</p>
                                  </div>
                                  @if(count($favouriteList) > 0)

                                  <ul class="pr-[5px] message-dropdown-container {{count($favouriteList) == 0?'hidden':''}}" id="favList">
                                    @foreach($favouriteList as $fp)
                                    <li
                                        class="pl-[20px] pr-[10px] hover:bg-mee4 flex items-center justify-start message-dropdown-item pt-[10px] pb-[10px]">
                                        <img src="{{$fp->featured_img}}" alt="fav icon" class="w-[60px] h-[60px]"/>
                                        <div class="ml-[13px] w-full">
                                            <div class="flex justify-between items-baseline">
                                                <div class="">
                                                    <p class="me-fav-title">{{langbind($fp,'name')}}</p>
                                                    <p class="me-mes-time">${{isset($fp->discount_price)?$fp->discount_price:$fp->original_price}}</p>
                                                </div>
                                                <button id="fav-close-btn-new" data-product-id={{$fp->id}}><svg width="10" height="9"
                                                        viewBox="0 0 10 9" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M9.1999 0.306816C9.13823 0.245013 9.06497 0.195982 8.98432 0.162527C8.90367 0.129073 8.81722 0.111853 8.7299 0.111853C8.64259 0.111853 8.55614 0.129073 8.47549 0.162527C8.39484 0.195982 8.32158 0.245013 8.2599 0.306816L4.99991 3.56015L1.73991 0.300149C1.67818 0.238428 1.60491 0.189468 1.52427 0.156064C1.44362 0.122661 1.35719 0.105469 1.26991 0.105469C1.18262 0.105469 1.09619 0.122661 1.01554 0.156064C0.9349 0.189468 0.861626 0.238428 0.799905 0.300149C0.738184 0.36187 0.689224 0.435144 0.65582 0.515787C0.622417 0.59643 0.605225 0.682862 0.605225 0.770149C0.605225 0.857436 0.622417 0.943869 0.65582 1.02451C0.689224 1.10515 0.738184 1.17843 0.799905 1.24015L4.05991 4.50015L0.799905 7.76015C0.738184 7.82187 0.689224 7.89514 0.65582 7.97579C0.622417 8.05643 0.605225 8.14286 0.605225 8.23015C0.605225 8.31744 0.622417 8.40387 0.65582 8.48451C0.689224 8.56515 0.738184 8.63843 0.799905 8.70015C0.861626 8.76187 0.9349 8.81083 1.01554 8.84423C1.09619 8.87764 1.18262 8.89483 1.26991 8.89483C1.35719 8.89483 1.44362 8.87764 1.52427 8.84423C1.60491 8.81083 1.67818 8.76187 1.73991 8.70015L4.99991 5.44015L8.2599 8.70015C8.32163 8.76187 8.3949 8.81083 8.47554 8.84423C8.55619 8.87764 8.64262 8.89483 8.7299 8.89483C8.81719 8.89483 8.90362 8.87764 8.98427 8.84423C9.06491 8.81083 9.13818 8.76187 9.1999 8.70015C9.26163 8.63843 9.31059 8.56515 9.34399 8.48451C9.37739 8.40387 9.39458 8.31744 9.39458 8.23015C9.39458 8.14286 9.37739 8.05643 9.34399 7.97579C9.31059 7.89514 9.26163 7.82187 9.1999 7.76015L5.9399 4.50015L9.1999 1.24015C9.45324 0.986816 9.45324 0.560149 9.1999 0.306816Z"
                                                            fill="#333333" />
                                                    </svg>
                                                </button>

                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                  </ul>
                                  <div class="pl-[20px] pr-[20px] pb-[20px] pt-[10px]">
                                    <a href="{{ route('dashboard.wishlist') }}">
                                        <button
                                            class="hover:bg-blueMediq hover:text-white hover:border-blueMediq mes-view-all-btn mx-auto rounded-[50px] w-[100px] flex items-center justify-center h-[42px] border border-darkgray">
                                            @lang('labels.product.view_all')
                                        </button>
                                    </a>
                                </div>
                                @endif

                                  {{-- @if(count($favouriteList) > 0)

                                   @endif --}}
                                </div>
                            </div>
                            <div class="mr-[30px] last:mr-0 flex items-center relative">
                                <div class="relative {{ $isCheckoutPage == false ? 'cart-badge-container' : '' }}"
                                    id="me-cart">
                                    @php
                                        if (Auth::guard('customer')->check() == true) {
                                            $totalCartVal = App\Models\Cart::where('customer_id', Auth::guard('customer')->user()->id)->sum('qty');
                                        } else {
                                            $totalCartVal = 0;
                                        }
                                    @endphp
                                    <div class="mr-[50px]">
                                        <a href="{{Auth::guard('customer')->check() == true ? route('checkout.init') : 'javascript:void(0)'}}">
                                            <div class="relative badge-container">
                                            
                                                    <span
                                                        class="me-badge text-white bg-orangeMediq rounded-[50%] w-[25px] h-[25px] flex"
                                                        id="add_cart_val">{{ $totalCartVal }}
                                                    </span>
                                               
                                                <!-- <span
                                                    class="me-badge-dot text-white bg-[#FF6F6F] rounded-[50%] w-[12px] h-[12px]"></span> -->
                                                <img src="{{ asset('frontend/img/me-cart-icon.svg') }}"
                                                    class="me-cart-icon" />
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                @if ($isCheckoutPage == false)
                                    <div class="message-dropdown hidden" aria-labelledby="me-cart">
                                        <div id="with_data">
                                            <svg class="polygon-icon pl-[20px] pr-[10px]" width="18"
                                                height="11" viewBox="0 0 18 11" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9 0L17.6603 10.5H0.339746L9 0Z" fill="white" />
                                            </svg>
                                            <div
                                                class="flex justify-between items-center py-[10px] pl-[20px] pr-[10px]">
                                                <p class="cart--no"> @lang('labels.product_detail.cart_total') <span
                                                        class="total_cart_no"></span>
                                                   <span class="cart_total_result">
                                                   </span> 
                                                   {{-- @lang('labels.product_detail.items') --}}
                                                </p>
                                                <p class="cart-total mr-[5px] total_cart_price"></p>
                                            </div>

                                            <ul class="pr-[5px] message-dropdown-container cart_items" id ="cart_items"></ul>
                                            <div class="pl-[20px] pr-[10px] pb-[20px] pt-[10px] checkout_btn"><a
                                                    href="{{ route('checkout.init') }}">
                                                    <button
                                                        class=" hover:bg-brightOrangeMediq mes-checkout mx-auto w-full rounded-[6px] flex items-center justify-center h-[42px] border border-orangeMediq bg-orangeMediq text-white">
                                                        @lang('labels.header.checkout')
                                                    </button></a>
                                            </div>
                                        </div>
                                        <div class="px-5 hidden" id="no_data">
                                            <div class="xl:py-10 py-6 px-6">
                                                <img src="{{ asset('frontend/img/empty-cart.svg') }}"
                                                    alt="card-empty-icon" class="mx-auto" />
                                                <p class="mt-[10px] font-bold me-body-20 text-darkgray text-center">
                                                    @lang('labels.compare.empty')</p>
                                                <p class="mt-[10px] font-normal me-body-14 text-darkgray text-center">
                                                    @lang('labels.compare.add_your_card')</p>
                                            </div>
                                        </div>

                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="sign-in-container">
                            @if (Auth::guard('customer')->check())
                                <div class=" flex h-full items-center login-container cursor-pointer relative">
                                    {{-- <div class="relative">
                                        <img src="{{ ()->guard("custoauthmer")->user()->profile_img!=null? asset('customer/'.auth()->guard("customer")->user()->profile_img) : asset('frontend/img/me-profile-img.svg') }}" class="w-[2.25rem] rounded-full object-cover login-profile-img preview-img">
                                        <span
                                            class="block w-[12px] h-[12px] rounded-full border border-white bg-[#FF6F6F] absolute top-0 right-0"></span>
                                    </div>
                                    <div class="after-login sign-in-name ml-[8px]">
                                        <span
                                            class="mediq-user">@lang('labels.header.hi') {{ Auth::guard('customer')->user()->first_name }}
                                            {{ Auth::guard('customer')->user()->last_name }} </span>
                                    </div>  --}}
                                    <div
                                        class="login-container-content flex items-center px-[20px] py-[10px] hover:bg-white hover:rounded-[100px]">
                                        <div class="relative">
                                            @if(auth()->guard('customer')->user()->google_id !== null || auth()->guard('customer')->user()->facebook_id !== null) 
                                                @if(auth()->guard('customer')->user()->profile_img == null)
                                                <img src="{{ asset('frontend/img/me-profile-img.svg') }}"
                                                class="w-[2.25rem] rounded-full object-cover login-profile-img preview-img profile-pic">
                                                @elseif(File::exists(public_path('storage/customer').'/'.auth()->guard('customer')->user()->profile_img))
                                                <img src="{{ asset('storage/customer/' .auth()->guard('customer')->user()->profile_img) }}"
                                                class="w-[2.25rem] rounded-full object-cover login-profile-img preview-img profile-pic">
                                                @else
                                                <img src="{{ auth()->guard('customer')->user()->profile_img }}"
                                                class="w-[2.25rem] rounded-full object-cover login-profile-img preview-img profile-pic">
                                                @endif
                                            @else
                                            <img src="{{ auth()->guard('customer')->user()->profile_img != null? asset('storage/customer/' .auth()->guard('customer')->user()->profile_img): asset('frontend/img/me-profile-img.svg') }}"
                                                class="w-[2.25rem] rounded-full object-cover login-profile-img preview-img profile-pic">
                                            @endif
                                            {{-- @if(auth()->guard('customer')->user()->google_id !== null || auth()->guard('customer')->user()->facebook_id !== null) 
                                            <img src="{{ auth()->guard('customer')->user()->profile_img != null? auth()->guard('customer')->user()->profile_img: asset('frontend/img/me-profile-img.svg') }}"
                                                class="w-[2.25rem] rounded-full object-cover login-profile-img preview-img">
                                            @else
                                            <img src="{{ auth()->guard('customer')->user()->profile_img != null? asset('storage/customer/' .auth()->guard('customer')->user()->profile_img): asset('frontend/img/me-profile-img.svg') }}"
                                                class="w-[2.25rem] rounded-full object-cover login-profile-img preview-img">
                                            @endif --}}
                                        </div>
                                        <div class="after-login sign-in-name ml-[8px]">
                                            <span class="mediq-user">@lang('labels.header.hi')
                                                {{ Auth::guard('customer')->user()->first_name }}
                                            </span>
                                                {{-- {{ Auth::guard('customer')->user()->last_name }} --}}
                                        </div>
                                    </div>
                                    <div class="login-dropdown desktop">
                                        <svg style="transform: translate(82px, -10px);" width="19" height="11"
                                            viewBox="0 0 19 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.5 0L18.1603 10.5H0.839746L9.5 0Z" fill="white" />
                                        </svg>
                                        <ul class="">
                                            <li class="login-dropdown-item flex items-center">
                                                <a href="" class="group hover:text-blueMediq">
                                                    <img src="{{ asset('frontend/img/book-icon.svg') }}"
                                                        alt="book icon" class="book-icon" />
                                                    @lang('labels.menu.booking')
                                                </a>
                                            </li>
                                            {{-- <li class="login-dropdown-item flex items-center">
                                                <a href="" class="group hover:text-blueMediq">
                                                    <img src="{{ asset('frontend/img/coupon.svg') }}"
                                                        alt="coupon icon" class="book-icon" />
                                                    @lang('labels.menu.coupon')
                                                </a>
                                            </li> --}}
                                            {{-- <li class="login-dropdown-item flex items-center">
                                            <a href="" class="group hover:text-blueMediq">
                                                <img src="{{ asset('frontend/img/dollar.svg') }}" alt="dollar icon"
                                                    class="book-icon" />
                                                 @lang('labels.menu.q_dollar')
                                            </a>
                                        </li>
                                        <li class="login-dropdown-item flex items-center">
                                            <a href="" class="group hover:text-blueMediq">
                                                <img src="{{ asset('frontend/img/review.svg') }}" alt="review icon"
                                                    class="book-icon" />
                                                 @lang('labels.menu.review')
                                            </a>
                                        </li>
                                        <li class="login-dropdown-item flex items-center">
                                            <a href="" class="group hover:text-blueMediq">
                                                <img src="{{ asset('frontend/img/referral.svg') }}"
                                                    alt="referral icon" class="book-icon" />
                                                 @lang('labels.menu.referral')
                                            </a>
                                        </li> --}}
                                            <li class="login-dropdown-item flex items-center">
                                                <a href="" class="group hover:text-blueMediq">
                                                    <img src="{{ asset('frontend/img/review-profile.svg') }}"
                                                        alt="profile icon" class="book-icon" />
                                                    @lang('labels.menu.profile')
                                                </a>
                                            </li>
                                            <li class="py-[20px] text-center border-t border-t-[#E4E4E4]">
                                                <button id="sign-out"
                                                    class="text-darkgray hover:text-orangeMediq sign-out">@lang('labels.menu.sign-out')</button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="login-dropdown desktop">
                                        <svg style="transform: translate(82px, -10px);" width="19" height="11"
                                            viewBox="0 0 19 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.5 0L18.1603 10.5H0.839746L9.5 0Z" fill="white" />
                                        </svg>
                                        <ul class="">
                                            <li class="login-dropdown-item flex items-center">
                                                <a href="{{ route('dashboard.general') }}"
                                                    class="group hover:text-blueMediq">
                                                    <div class="book-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M9.35962 3.4043H3.7793C3.57219 3.4043 3.4043 3.57219 3.4043 3.7793V9.35962C3.4043 9.56673 3.57219 9.73462 3.7793 9.73462H9.35962C9.56673 9.73462 9.73462 9.56673 9.73462 9.35962V3.7793C9.73462 3.57219 9.56673 3.4043 9.35962 3.4043ZM3.7793 2.2793C2.95087 2.2793 2.2793 2.95087 2.2793 3.7793V9.35962C2.2793 10.188 2.95087 10.8596 3.7793 10.8596H9.35962C10.188 10.8596 10.8596 10.188 10.8596 9.35962V3.7793C10.8596 2.95087 10.188 2.2793 9.35962 2.2793H3.7793Z"
                                                                fill="#333333" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M19.5002 3.4043H13.9199C13.7128 3.4043 13.5449 3.57219 13.5449 3.7793V9.35962C13.5449 9.56673 13.7128 9.73462 13.9199 9.73462H19.5002C19.7074 9.73462 19.8752 9.56673 19.8752 9.35962V3.7793C19.8752 3.57219 19.7074 3.4043 19.5002 3.4043ZM13.9199 2.2793C13.0915 2.2793 12.4199 2.95087 12.4199 3.7793V9.35962C12.4199 10.188 13.0915 10.8596 13.9199 10.8596H19.5002C20.3287 10.8596 21.0002 10.188 21.0002 9.35962V3.7793C21.0002 2.95087 20.3287 2.2793 19.5002 2.2793H13.9199Z"
                                                                fill="#333333" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M9.35962 13.5446H3.7793C3.57219 13.5446 3.4043 13.7124 3.4043 13.9196V19.4999C3.4043 19.707 3.57219 19.8749 3.7793 19.8749H9.35962C9.56673 19.8749 9.73462 19.707 9.73462 19.4999V13.9196C9.73462 13.7124 9.56673 13.5446 9.35962 13.5446ZM3.7793 12.4196C2.95087 12.4196 2.2793 13.0911 2.2793 13.9196V19.4999C2.2793 20.3283 2.95087 20.9999 3.7793 20.9999H9.35962C10.188 20.9999 10.8596 20.3283 10.8596 19.4999V13.9196C10.8596 13.0911 10.188 12.4196 9.35962 12.4196H3.7793Z"
                                                                fill="#333333" />
                                                            <g clip-path="url(#clip0_8476_16777)">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M14.8561 12.5975C15.3625 12.3877 15.9052 12.2798 16.4533 12.2798C17.0015 12.2798 17.5442 12.3877 18.0506 12.5975C18.557 12.8072 19.0171 13.1147 19.4047 13.5023C19.7922 13.8898 20.0997 14.35 20.3094 14.8563C20.5192 15.3627 20.6271 15.9055 20.6271 16.4536C20.6271 17.0017 20.5192 17.5444 20.3094 18.0508C20.1718 18.383 19.9922 18.6953 19.7755 18.9802L21.3651 20.5698C21.5848 20.7895 21.5848 21.1457 21.3651 21.3653C21.1454 21.585 20.7893 21.585 20.5696 21.3653L18.98 19.7757C18.2577 20.3251 17.3711 20.6274 16.4533 20.6274C15.3464 20.6274 14.2848 20.1876 13.502 19.4049C12.7193 18.6222 12.2795 17.5605 12.2795 16.4536C12.2795 15.3466 12.7193 14.285 13.502 13.5023C13.8896 13.1147 14.3497 12.8072 14.8561 12.5975ZM16.4533 13.4048C16.053 13.4048 15.6565 13.4836 15.2866 13.6369C14.9167 13.7901 14.5806 14.0147 14.2975 14.2978C13.7258 14.8695 13.4045 15.645 13.4045 16.4536C13.4045 17.2622 13.7258 18.0376 14.2975 18.6094C14.8693 19.1812 15.6447 19.5024 16.4533 19.5024C17.2619 19.5024 18.0374 19.1812 18.6092 18.6094C18.8923 18.3263 19.1168 17.9902 19.2701 17.6203C19.4233 17.2504 19.5021 16.854 19.5021 16.4536C19.5021 16.0532 19.4233 15.6568 19.2701 15.2869C19.1168 14.917 18.8923 14.5809 18.6092 14.2978C18.3261 14.0147 17.99 13.7901 17.6201 13.6369C17.2502 13.4836 16.8537 13.4048 16.4533 13.4048Z"
                                                                    fill="#333333" />
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0_8476_16777">
                                                                    <rect width="8.93784" height="8.93784"
                                                                        fill="white"
                                                                        transform="translate(12.0295 12.0298)" />
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                    </div>
                                                    @lang('labels.product_detail.overview')
                                                </a>
                                            </li>
                                            <li class="login-dropdown-item flex items-center">
                                                <a href="{{ route('dashboard.booking') }}"
                                                    class="group hover:text-blueMediq">
                                                    <div class="book-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                            <path
                                                                d="M19.5 3.375H16.875V2.25C16.875 2.15054 16.8355 2.05516 16.7652 1.98484C16.6948 1.91451 16.5995 1.875 16.5 1.875C16.4005 1.875 16.3052 1.91451 16.2348 1.98484C16.1645 2.05516 16.125 2.15054 16.125 2.25V3.375H7.875V2.25C7.875 2.15054 7.83549 2.05516 7.76517 1.98484C7.69484 1.91451 7.59946 1.875 7.5 1.875C7.40054 1.875 7.30516 1.91451 7.23483 1.98484C7.16451 2.05516 7.125 2.15054 7.125 2.25V3.375H4.5C4.20163 3.375 3.91548 3.49353 3.7045 3.7045C3.49353 3.91548 3.375 4.20163 3.375 4.5V19.5C3.375 19.7984 3.49353 20.0845 3.7045 20.2955C3.91548 20.5065 4.20163 20.625 4.5 20.625H19.5C19.7984 20.625 20.0845 20.5065 20.2955 20.2955C20.5065 20.0845 20.625 19.7984 20.625 19.5V4.5C20.625 4.20163 20.5065 3.91548 20.2955 3.7045C20.0845 3.49353 19.7984 3.375 19.5 3.375ZM4.5 4.125H7.125V5.25C7.125 5.34946 7.16451 5.44484 7.23483 5.51516C7.30516 5.58549 7.40054 5.625 7.5 5.625C7.59946 5.625 7.69484 5.58549 7.76517 5.51516C7.83549 5.44484 7.875 5.34946 7.875 5.25V4.125H16.125V5.25C16.125 5.34946 16.1645 5.44484 16.2348 5.51516C16.3052 5.58549 16.4005 5.625 16.5 5.625C16.5995 5.625 16.6948 5.58549 16.7652 5.51516C16.8355 5.44484 16.875 5.34946 16.875 5.25V4.125H19.5C19.5995 4.125 19.6948 4.16451 19.7652 4.23484C19.8355 4.30516 19.875 4.40054 19.875 4.5V7.875H4.125V4.5C4.125 4.40054 4.16451 4.30516 4.23484 4.23484C4.30516 4.16451 4.40054 4.125 4.5 4.125ZM19.5 19.875H4.5C4.40054 19.875 4.30516 19.8355 4.23484 19.7652C4.16451 19.6948 4.125 19.5995 4.125 19.5V8.625H19.875V19.5C19.875 19.5995 19.8355 19.6948 19.7652 19.7652C19.6948 19.8355 19.5995 19.875 19.5 19.875Z"
                                                                fill="#333333" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M17.0999 3.15002H19.4999C19.8579 3.15002 20.2013 3.29226 20.4545 3.54543C20.7077 3.7986 20.8499 4.14198 20.8499 4.50002V19.5C20.8499 19.8581 20.7077 20.2014 20.4545 20.4546C20.2013 20.7078 19.8579 20.85 19.4999 20.85H4.4999C4.14186 20.85 3.79848 20.7078 3.54531 20.4546C3.29213 20.2014 3.1499 19.8581 3.1499 19.5V4.50002C3.1499 4.14198 3.29213 3.7986 3.54531 3.54543C3.79848 3.29226 4.14186 3.15002 4.4999 3.15002H6.8999V2.25002C6.8999 2.09089 6.96312 1.93828 7.07564 1.82576C7.18816 1.71324 7.34077 1.65002 7.4999 1.65002C7.65903 1.65002 7.81165 1.71324 7.92417 1.82576C8.03669 1.93828 8.0999 2.09089 8.0999 2.25002V3.15002H15.8999V2.25002C15.8999 2.09089 15.9631 1.93828 16.0756 1.82576C16.1882 1.71324 16.3408 1.65002 16.4999 1.65002C16.659 1.65002 16.8116 1.71324 16.9242 1.82576C17.0367 1.93828 17.0999 2.09089 17.0999 2.25002V3.15002ZM6.8999 4.35002H4.4999C4.46012 4.35002 4.42197 4.36583 4.39384 4.39396C4.36571 4.42209 4.3499 4.46024 4.3499 4.50002V7.65002H19.6499V4.50002C19.6499 4.46024 19.6341 4.42209 19.606 4.39396C19.5778 4.36583 19.5397 4.35002 19.4999 4.35002H17.0999V5.25002C17.0999 5.40915 17.0367 5.56177 16.9242 5.67429C16.8116 5.78681 16.659 5.85002 16.4999 5.85002C16.3408 5.85002 16.1882 5.78681 16.0756 5.67429C15.9631 5.56177 15.8999 5.40915 15.8999 5.25002V4.35002H8.0999V5.25002C8.0999 5.40915 8.03669 5.56177 7.92417 5.67429C7.81165 5.78681 7.65903 5.85002 7.4999 5.85002C7.34077 5.85002 7.18816 5.78681 7.07564 5.67429C6.96312 5.56177 6.8999 5.40915 6.8999 5.25002V4.35002ZM4.4999 19.65H19.4999C19.5397 19.65 19.5778 19.6342 19.606 19.6061C19.6341 19.578 19.6499 19.5398 19.6499 19.5V8.85002H4.3499V19.5C4.3499 19.5398 4.36571 19.578 4.39384 19.6061C4.42197 19.6342 4.46012 19.65 4.4999 19.65ZM19.4999 3.37502C19.7983 3.37502 20.0844 3.49355 20.2954 3.70453C20.5064 3.91551 20.6249 4.20166 20.6249 4.50002V19.5C20.6249 19.7984 20.5064 20.0845 20.2954 20.2955C20.0844 20.5065 19.7983 20.625 19.4999 20.625H4.4999C4.20153 20.625 3.91539 20.5065 3.70441 20.2955C3.49343 20.0845 3.3749 19.7984 3.3749 19.5V4.50002C3.3749 4.20166 3.49343 3.91551 3.70441 3.70453C3.91539 3.49355 4.20153 3.37502 4.4999 3.37502H7.1249V2.25002C7.1249 2.15057 7.16441 2.05519 7.23474 1.98486C7.30506 1.91453 7.40045 1.87502 7.4999 1.87502C7.59936 1.87502 7.69474 1.91453 7.76507 1.98486C7.83539 2.05519 7.8749 2.15057 7.8749 2.25002V3.37502H16.1249V2.25002C16.1249 2.15057 16.1644 2.05519 16.2347 1.98486C16.3051 1.91453 16.4004 1.87502 16.4999 1.87502C16.5994 1.87502 16.6947 1.91453 16.7651 1.98486C16.8354 2.05519 16.8749 2.15057 16.8749 2.25002V3.37502H19.4999ZM4.4999 4.12502C4.40045 4.12502 4.30506 4.16453 4.23474 4.23486C4.16441 4.30519 4.1249 4.40057 4.1249 4.50002V7.87502H19.8749V4.50002C19.8749 4.40057 19.8354 4.30519 19.7651 4.23486C19.6947 4.16453 19.5994 4.12502 19.4999 4.12502H16.8749V5.25002C16.8749 5.34948 16.8354 5.44486 16.7651 5.51519C16.6947 5.58552 16.5994 5.62502 16.4999 5.62502C16.4004 5.62502 16.3051 5.58552 16.2347 5.51519C16.1644 5.44486 16.1249 5.34948 16.1249 5.25002V4.12502H7.8749V5.25002C7.8749 5.34948 7.83539 5.44486 7.76507 5.51519C7.69474 5.58552 7.59936 5.62502 7.4999 5.62502C7.40045 5.62502 7.30506 5.58552 7.23474 5.51519C7.16441 5.44486 7.1249 5.34948 7.1249 5.25002V4.12502H4.4999ZM4.4999 19.875H19.4999C19.5994 19.875 19.6947 19.8355 19.7651 19.7652C19.8354 19.6949 19.8749 19.5995 19.8749 19.5V8.62502H4.1249V19.5C4.1249 19.5995 4.16441 19.6949 4.23474 19.7652C4.30506 19.8355 4.40045 19.875 4.4999 19.875Z"
                                                                fill="#333333" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M15.2901 11.5888C15.5172 11.8008 15.5294 12.1567 15.3175 12.3838L11.38 16.6026C11.2759 16.7141 11.131 16.7785 10.9784 16.7812C10.8259 16.7838 10.6789 16.7244 10.571 16.6165L8.60225 14.6477C8.38258 14.4281 8.38258 14.0719 8.60225 13.8523C8.82192 13.6326 9.17808 13.6326 9.39775 13.8523L10.9548 15.4093L14.495 11.6162C14.707 11.3891 15.0629 11.3768 15.2901 11.5888Z"
                                                                fill="#333333" />
                                                        </svg>
                                                    </div>
                                                    {{-- My Booking --}}
                                                    @lang('labels.coupon.my_booking')
                                                </a>
                                            </li>
                                            {{-- <li class="login-dropdown-item flex items-center">
                                        <a href="" class="group hover:text-blueMediq">
                                          <div class="book-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                              <path fill-rule="evenodd" clip-rule="evenodd" d="M11.6667 1.875C11.4788 1.875 11.2986 1.94963 11.1658 2.08247C11.033 2.2153 10.9583 2.39547 10.9583 2.58333V9.08333C10.9583 9.27119 11.033 9.45136 11.1658 9.5842C11.2986 9.71704 11.4788 9.79167 11.6667 9.79167H19.25C19.3495 9.79167 19.4448 9.83117 19.5152 9.9015L22.125 12.5113V2.58333C22.125 2.39547 22.0504 2.2153 21.9175 2.08247C21.7847 1.94963 21.6045 1.875 21.4167 1.875H11.6667ZM10.6355 1.55214C10.909 1.27865 11.2799 1.125 11.6667 1.125H21.4167C21.8034 1.125 22.1744 1.27865 22.4479 1.55214C22.7214 1.82563 22.875 2.19656 22.875 2.58333V13.4167C22.875 13.5683 22.7836 13.7051 22.6435 13.7631C22.5034 13.8212 22.3421 13.7891 22.2348 13.6818L19.0947 10.5417H11.6667C11.2799 10.5417 10.909 10.388 10.6355 10.1145C10.362 9.84104 10.2083 9.47011 10.2083 9.08333V2.58333C10.2083 2.19656 10.362 1.82563 10.6355 1.55214ZM4.08333 9.45833C3.89547 9.45833 3.7153 9.53296 3.58247 9.6658C3.44963 9.79864 3.375 9.9788 3.375 10.1667V20.0947L5.98484 17.4848C6.05516 17.4145 6.15054 17.375 6.25 17.375H13.8333C14.0212 17.375 14.2014 17.3004 14.3342 17.1675C14.467 17.0347 14.5417 16.8545 14.5417 16.6667V14.5C14.5417 14.2929 14.7096 14.125 14.9167 14.125C15.1238 14.125 15.2917 14.2929 15.2917 14.5V16.6667C15.2917 17.0534 15.138 17.4244 14.8645 17.6979C14.591 17.9714 14.2201 18.125 13.8333 18.125H6.40533L3.26517 21.2652C3.15792 21.3724 2.99662 21.4045 2.85649 21.3465C2.71637 21.2884 2.625 21.1517 2.625 21V10.1667C2.625 9.77989 2.77865 9.40896 3.05214 9.13547C3.32563 8.86198 3.69656 8.70833 4.08333 8.70833H6.25C6.45711 8.70833 6.625 8.87623 6.625 9.08333C6.625 9.29044 6.45711 9.45833 6.25 9.45833H4.08333Z" fill="#333333"/>
                                              <path fill-rule="evenodd" clip-rule="evenodd" d="M10.4763 1.39306C10.792 1.07738 11.2201 0.900024 11.6666 0.900024H21.4166C21.863 0.900024 22.2912 1.07737 22.6069 1.39306C22.9226 1.70875 23.0999 2.13691 23.0999 2.58336V13.4167C23.0999 13.6594 22.9537 13.8781 22.7295 13.971C22.5053 14.0639 22.2472 14.0126 22.0756 13.841L19.0014 10.7667H11.6666C11.2201 10.7667 10.792 10.5893 10.4763 10.2737C10.1606 9.95797 9.98324 9.52981 9.98324 9.08336V2.58336C9.98324 2.13691 10.1606 1.70875 10.4763 1.39306ZM11.6666 1.35002C11.3395 1.35002 11.0258 1.47996 10.7945 1.71126C10.5632 1.94255 10.4332 2.25626 10.4332 2.58336V9.08336C10.4332 9.41046 10.5632 9.72416 10.7945 9.95546C11.0258 10.1868 11.3395 10.3167 11.6666 10.3167H19.0946C19.1542 10.3167 19.2115 10.3404 19.2537 10.3826L22.3938 13.5228C22.4367 13.5657 22.5013 13.5785 22.5573 13.5553C22.6134 13.5321 22.6499 13.4774 22.6499 13.4167V2.58336C22.6499 2.25626 22.52 1.94255 22.2887 1.71126C22.0574 1.47996 21.7437 1.35002 21.4166 1.35002H11.6666ZM11.6666 2.10002C11.5384 2.10002 11.4154 2.15095 11.3248 2.24159C11.2342 2.33223 11.1832 2.45517 11.1832 2.58336V9.08336C11.1832 9.21155 11.2342 9.33448 11.3248 9.42513C11.4154 9.51577 11.5384 9.56669 11.6666 9.56669H19.2499C19.409 9.56669 19.5616 9.62991 19.6742 9.74243L21.8999 11.9682V2.58336C21.8999 2.45517 21.849 2.33223 21.7583 2.24159C21.6677 2.15095 21.5448 2.10002 21.4166 2.10002H11.6666ZM11.0066 1.92339C11.1816 1.74836 11.419 1.65002 11.6666 1.65002H21.4166C21.6641 1.65002 21.9015 1.74836 22.0765 1.92339C22.2516 2.09842 22.3499 2.33582 22.3499 2.58336V12.5114C22.3499 12.6024 22.2951 12.6844 22.211 12.7192C22.1269 12.7541 22.0302 12.7348 21.9658 12.6705L19.356 10.0606C19.3278 10.0325 19.2897 10.0167 19.2499 10.0167H11.6666C11.419 10.0167 11.1816 9.91836 11.0066 9.74332C10.8316 9.56829 10.7332 9.33089 10.7332 9.08336V2.58336C10.7332 2.33582 10.8316 2.09843 11.0066 1.92339ZM2.89294 8.97639C3.20863 8.66071 3.63679 8.48336 4.08324 8.48336H6.2499C6.58127 8.48336 6.8499 8.75199 6.8499 9.08336C6.8499 9.41473 6.58127 9.68336 6.2499 9.68336H4.08324C3.95505 9.68336 3.83211 9.73428 3.74147 9.82492C3.65082 9.91557 3.5999 10.0385 3.5999 10.1667V19.5515L5.82564 17.3258L5.98474 17.4849L5.82564 17.3258C5.93816 17.2132 6.09077 17.15 6.2499 17.15H13.8332C13.9614 17.15 14.0844 17.0991 14.175 17.0085C14.2656 16.9178 14.3166 16.7949 14.3166 16.6667V14.5C14.3166 14.1687 14.5852 13.9 14.9166 13.9C15.2479 13.9 15.5166 14.1687 15.5166 14.5V16.6667C15.5166 17.1131 15.3392 17.5413 15.0235 17.857C14.7078 18.1727 14.2797 18.35 13.8332 18.35H6.49843L3.42417 21.4243L3.26507 21.2652L3.42417 21.4243C3.25257 21.5959 2.9945 21.6472 2.77029 21.5544C2.54609 21.4615 2.3999 21.2427 2.3999 21V10.1667C2.3999 9.72024 2.57725 9.29208 2.89294 8.97639ZM4.08324 8.93336C3.75614 8.93336 3.44243 9.0633 3.21114 9.29459C2.97984 9.52589 2.8499 9.83959 2.8499 10.1667V21C2.8499 21.0607 2.88645 21.1154 2.9425 21.1386C2.99855 21.1618 3.06307 21.149 3.10597 21.1061L6.24613 17.9659C6.28833 17.9237 6.34556 17.9 6.40523 17.9H13.8332C14.1603 17.9 14.474 17.7701 14.7053 17.5388C14.9366 17.3075 15.0666 16.9938 15.0666 16.6667V14.5C15.0666 14.4172 14.9994 14.35 14.9166 14.35C14.8337 14.35 14.7666 14.4172 14.7666 14.5V16.6667C14.7666 16.9142 14.6682 17.1516 14.4932 17.3267C14.3182 17.5017 14.0808 17.6 13.8332 17.6H6.2499C6.21012 17.6 6.17197 17.6158 6.14384 17.644L3.534 20.2538C3.46965 20.3181 3.37288 20.3374 3.2888 20.3026C3.20472 20.2677 3.1499 20.1857 3.1499 20.0947V10.1667C3.1499 9.91916 3.24824 9.68176 3.42327 9.50672C3.5983 9.33169 3.8357 9.23336 4.08324 9.23336H6.2499C6.33275 9.23336 6.3999 9.1662 6.3999 9.08336C6.3999 9.00051 6.33275 8.93336 6.2499 8.93336H4.08324Z" fill="#333333"/>
                                            </svg>
                                          </div>
                                          Inbox
                                          <p class="me-body-14 font-medium text-whitez w-[25px] h-[25px] bg-orangeMediq flex justify-center items-center text-center ml-3 rounded-full">2</p>
                                        </a>
                                      </li> --}}
                                            <li class="login-dropdown-item flex items-center">
                                                <a href="{{ route('dashboard.wishlist') }}"
                                                    class="group hover:text-blueMediq">
                                                    <div class="book-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                            <path
                                                                d="M12 20.4562C11.8518 20.4587 11.7047 20.4309 11.5676 20.3744C11.4306 20.318 11.3065 20.2342 11.2031 20.1281L3.41246 12.3375C2.90774 11.833 2.51116 11.231 2.24694 10.5681C1.98272 9.90524 1.8564 9.19547 1.8757 8.48214C1.895 7.76882 2.05952 7.06692 2.35921 6.41931C2.65889 5.77171 3.08745 5.19199 3.61871 4.71558C4.12786 4.26241 4.72328 3.91671 5.36927 3.69923C6.01527 3.48176 6.69853 3.39697 7.37808 3.44996C8.75882 3.53705 10.0597 4.12745 11.0343 5.10933L12 6.07496L13.1625 4.91246C13.6669 4.40774 14.2689 4.01116 14.9318 3.74694C15.5947 3.48272 16.3044 3.3564 17.0178 3.3757C17.7311 3.395 18.433 3.55952 19.0806 3.85921C19.7282 4.15889 20.3079 4.58745 20.7843 5.11871C21.2375 5.62786 21.5832 6.22328 21.8007 6.86927C22.0182 7.51527 22.1029 8.19853 22.05 8.87808C21.9629 10.2588 21.3725 11.5597 20.3906 12.5343L12.7968 20.1281C12.5841 20.3372 12.2982 20.4549 12 20.4562ZM7.03121 4.19058C5.9577 4.17668 4.91777 4.56456 4.11558 5.27808C3.66081 5.68617 3.29411 6.18278 3.03792 6.73751C2.78173 7.29223 2.64144 7.89341 2.62564 8.50423C2.60984 9.11506 2.71887 9.72268 2.94604 10.2899C3.17322 10.8571 3.51376 11.372 3.94683 11.8031L11.7375 19.6031C11.8076 19.6718 11.9018 19.7103 12 19.7103C12.0981 19.7103 12.1924 19.6718 12.2625 19.6031L19.8656 12C21.6375 10.2281 21.7968 7.36871 20.2218 5.61558C19.8137 5.16081 19.3171 4.79411 18.7624 4.53792C18.2077 4.28173 17.6065 4.14144 16.9957 4.12564C16.3849 4.10984 15.7772 4.21887 15.21 4.44604C14.6428 4.67322 14.1279 5.01376 13.6968 5.44683L12.2625 6.87183C12.2284 6.90699 12.1876 6.93494 12.1425 6.95402C12.0974 6.97311 12.0489 6.98295 12 6.98295C11.951 6.98295 11.9025 6.97311 11.8574 6.95402C11.8123 6.93494 11.7715 6.90699 11.7375 6.87183L10.5 5.63433C9.57953 4.7142 8.33267 4.19523 7.03121 4.19058Z"
                                                                fill="#333333" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M12.7968 20.1282C12.6846 20.2384 12.552 20.3233 12.408 20.3791C12.279 20.4291 12.1408 20.4557 11.9999 20.4563C11.8517 20.4588 11.7046 20.4309 11.5676 20.3745C11.4409 20.3223 11.3253 20.2467 11.2268 20.1518C11.2188 20.144 11.2108 20.1362 11.203 20.1282L3.41241 12.3375C2.90769 11.8331 2.51111 11.231 2.24689 10.5682C1.98267 9.90531 1.85635 9.19554 1.87565 8.48222C1.89495 7.76889 2.05947 7.06699 2.35916 6.41939C2.65884 5.77178 3.0874 5.19207 3.61866 4.71566C4.12781 4.26248 4.72323 3.91679 5.36923 3.69931C6.01522 3.48183 6.69848 3.39704 7.37803 3.45003C8.75877 3.53713 10.0596 4.12752 11.0343 5.10941L11.9999 6.07503L13.1624 4.91253C13.6669 4.40782 14.2689 4.01123 14.9318 3.74701C15.5946 3.48279 16.3044 3.35647 17.0177 3.37577C17.731 3.39508 18.4329 3.55959 19.0806 3.85928C19.7282 4.15896 20.3079 4.58752 20.7843 5.11878C21.2375 5.62793 21.5831 6.22335 21.8006 6.86935C22.0181 7.51534 22.1029 8.1986 22.0499 8.87816C21.9628 10.2589 21.3724 11.5598 20.3905 12.5344L18.5835 14.3414L14.4171 18.5079L12.7968 20.1282ZM20.6019 12.7473L13.0071 20.3421C12.7391 20.6056 12.3789 20.7542 12.0031 20.7563M10.9897 20.3391L3.20033 12.5497C2.66678 12.0164 2.24753 11.38 1.96821 10.6793C1.68889 9.97852 1.55536 9.22819 1.57576 8.4741C1.59617 7.72002 1.77009 6.97801 2.0869 6.2934C2.40371 5.60878 2.85675 4.99594 3.41837 4.49231C3.95769 4.01228 4.58923 3.64535 5.27351 3.41499C5.95708 3.18486 6.68004 3.09499 7.39914 3.15077C8.85214 3.24296 10.221 3.86444 11.2468 4.89767L11.9999 5.65077L12.9502 4.70045C13.4835 4.1669 14.1199 3.74766 14.8207 3.46833C15.5214 3.18901 16.2718 3.05548 17.0258 3.07588C17.7799 3.09629 18.5219 3.27021 19.2065 3.58702C19.8912 3.90383 20.504 4.35688 21.0076 4.91849C21.4877 5.45782 21.8546 6.08935 22.0849 6.77363C22.3151 7.45722 22.4049 8.18021 22.3492 8.89933C22.257 10.3523 21.6351 11.7215 20.6019 12.7473M7.03009 4.49065L7.02727 4.49064C6.02883 4.4777 5.0616 4.83838 4.31541 5.50187C3.89125 5.88262 3.54921 6.34589 3.31023 6.86336C3.07115 7.38103 2.94023 7.94204 2.92549 8.51206C2.91075 9.08208 3.01249 9.64911 3.22449 10.1784C3.43649 10.7078 3.75428 11.1883 4.15842 11.5905L11.9474 19.3889C11.9614 19.4022 11.9806 19.4104 11.9999 19.4104C12.0192 19.4104 12.0378 19.4029 12.0518 19.3895L19.6534 11.7879C21.324 10.1173 21.4565 7.43895 19.9986 5.81615C19.6178 5.39176 19.1542 5.04942 18.6366 4.81035C18.1189 4.57127 17.5579 4.44036 16.9879 4.42561C16.4179 4.41087 15.8508 4.51261 15.3215 4.72461C14.7922 4.93661 14.3117 5.2544 13.9094 5.65854L13.9082 5.65973L12.4756 7.08303C12.414 7.14595 12.3405 7.19603 12.2594 7.23037C12.1773 7.26512 12.089 7.28302 11.9999 7.28302C11.9108 7.28302 11.8225 7.26512 11.7404 7.23037C11.6592 7.19596 11.5855 7.14573 11.5239 7.08262L10.2878 5.84657C9.42338 4.98243 8.25236 4.49502 7.03009 4.49065ZM10.4999 5.63441L11.7374 6.87191C11.7715 6.90706 11.8123 6.93501 11.8574 6.9541C11.9025 6.97319 11.9509 6.98302 11.9999 6.98302C12.0489 6.98302 12.0973 6.97319 12.1424 6.9541C12.1875 6.93501 12.2283 6.90706 12.2624 6.87191L13.6968 5.44691C14.1278 5.01384 14.6427 4.67329 15.21 4.44612C15.7772 4.21894 16.3848 4.10992 16.9956 4.12571C17.6065 4.14151 18.2076 4.2818 18.7624 4.53799C19.3171 4.79418 19.8137 5.16088 20.2218 5.61566C21.7968 7.36878 21.6374 10.2282 19.8655 12L13.5436 18.3219L12.2624 19.6032C12.1923 19.6719 12.0981 19.7104 11.9999 19.7104C11.942 19.7104 11.8855 19.697 11.8344 19.6719C11.799 19.6544 11.7662 19.6313 11.7374 19.6032L3.94678 11.8032C3.51371 11.3721 3.17317 10.8572 2.946 10.29C2.71882 9.72275 2.60979 9.11513 2.62559 8.5043C2.64139 7.89348 2.78168 7.29231 3.03787 6.73758C3.29406 6.18285 3.66076 5.68625 4.11553 5.27816C4.91772 4.56463 5.95765 4.17675 7.03116 4.19066C8.33262 4.19531 9.57948 4.71427 10.4999 5.63441Z"
                                                                fill="#333333" />
                                                            <path
                                                                d="M13.5436 18.3219L11.8344 19.6719C11.8855 19.697 11.942 19.7104 11.9999 19.7104C12.0981 19.7104 12.1923 19.6719 12.2624 19.6032L13.5436 18.3219Z"
                                                                fill="#333333" />
                                                            <path
                                                                d="M18.5835 14.3414L14.4171 18.5079L20.6019 12.7473L18.5835 14.3414Z"
                                                                fill="#333333" />
                                                            <path
                                                                d="M12.408 20.3791C12.279 20.4291 12.1408 20.4557 11.9999 20.4563C11.8517 20.4588 11.7046 20.4309 11.5676 20.3745C11.4409 20.3223 11.3253 20.2467 11.2268 20.1518L10.9897 20.3391C11.1837 20.5009 11.658 20.811 12.0031 20.7563L12.408 20.3791Z"
                                                                fill="#333333" />
                                                        </svg>
                                                    </div>
                                                    @lang('labels.coupon.wish_list')

                                                </a>
                                            </li>
                                            @if(config('app.env') != 'production')
                                            <li class="login-dropdown-item flex items-center">
                                                <a href="{{ route('dashboard.coupon') }}"
                                                    class="group hover:text-blueMediq">
                                                    <div class="book-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M2.8 4.35C1.91634 4.35 1.2 5.15589 1.2 6.15V7.23631C3.04683 7.82393 4.40005 9.73418 4.40005 12C4.40005 14.2658 3.04683 16.1761 1.2 16.7637V17.85C1.2 18.8441 1.91634 19.65 2.8 19.65H21.2C22.0837 19.65 22.8 18.8441 22.8 17.85V16.7637C20.9532 16.176 19.6 14.2658 19.6 12C19.6 9.73422 20.9532 7.824 22.8 7.23634V6.15C22.8 5.15589 22.0837 4.35 21.2 4.35H2.8ZM24 8.4V6.15C24 4.4103 22.7464 3 21.2 3H2.8C1.2536 3 0 4.4103 0 6.15V8.4C1.76731 8.4 3.20005 10.0118 3.20005 12C3.20005 13.9882 1.76736 15.6 4.88281e-05 15.6L0 17.85C0 19.5897 1.2536 21 2.8 21H21.2C22.7464 21 24 19.5897 24 17.85V15.6C22.2327 15.6 20.8 13.9882 20.8 12C20.8 10.0118 22.2327 8.40003 24 8.4Z"
                                                                fill="#333333" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M7.87658 7.87658C8.1177 7.63546 8.44472 7.5 8.78571 7.5C9.12671 7.5 9.45373 7.63546 9.69485 7.87658C9.93597 8.1177 10.0714 8.44472 10.0714 8.78571C10.0714 9.12671 9.93597 9.45373 9.69485 9.69485C9.45373 9.93597 9.12671 10.0714 8.78571 10.0714C8.44472 10.0714 8.1177 9.93597 7.87658 9.69485C7.63546 9.45373 7.5 9.12671 7.5 8.78571C7.5 8.44472 7.63546 8.1177 7.87658 7.87658ZM16.3117 7.68829C16.5628 7.93934 16.5628 8.34637 16.3117 8.59743L8.59743 16.3117C8.34637 16.5628 7.93934 16.5628 7.68829 16.3117C7.43724 16.0607 7.43724 15.6536 7.68829 15.4026L15.4026 7.68829C15.6536 7.43724 16.0607 7.43724 16.3117 7.68829ZM14.3051 14.3051C14.5463 14.064 14.8733 13.9286 15.2143 13.9286C15.5553 13.9286 15.8823 14.064 16.1234 14.3051C16.3645 14.5463 16.5 14.8733 16.5 15.2143C16.5 15.5553 16.3645 15.8823 16.1234 16.1234C15.8823 16.3645 15.5553 16.5 15.2143 16.5C14.8733 16.5 14.5463 16.3645 14.3051 16.1234C14.064 15.8823 13.9286 15.5553 13.9286 15.2143C13.9286 14.8733 14.064 14.5463 14.3051 14.3051Z"
                                                                fill="#333333" />
                                                        </svg>
                                                    </div>
                                                    @lang('labels.menu.coupon')
                                                </a>
                                            </li>
                                            @endif
                                            <!-- <li class="login-dropdown-item flex items-center">
                                        <a href="" class="group hover:text-blueMediq">
                                          <div class="book-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                              <path d="M11.0531 1.52548C9.02355 1.72268 7.15011 2.47042 5.50674 3.73581C4.7056 4.35207 3.66617 5.51065 3.06634 6.45559C2.80751 6.86232 2.30217 7.89764 2.1214 8.39065C1.92009 8.94118 1.70234 9.78752 1.59552 10.4408C1.46816 11.2419 1.46816 12.762 1.59552 13.5632C1.7804 14.6971 2.0721 15.6091 2.56922 16.6239C3.11153 17.7291 3.67438 18.5138 4.57823 19.4218C5.4862 20.3256 6.2709 20.8885 7.37607 21.4308C8.39085 21.9279 9.30292 22.2196 10.4368 22.4045C11.238 22.5318 12.7581 22.5318 13.5592 22.4045C14.6932 22.2196 15.6052 21.9279 16.62 21.4308C17.7252 20.8885 18.5099 20.3256 19.4179 19.4218C20.3217 18.5138 20.8846 17.7291 21.4269 16.6239C21.7884 15.8885 21.9692 15.4078 22.1664 14.6683C22.4252 13.6823 22.4868 13.1441 22.4868 12.002C22.4868 10.8598 22.4252 10.3216 22.1664 9.33559C21.9692 8.59607 21.7884 8.11539 21.4269 7.37998C20.8846 6.27482 20.3217 5.49011 19.4179 4.58215C18.5099 3.67829 17.7252 3.11544 16.62 2.57313C15.6093 2.07601 14.6726 1.7802 13.5798 1.60765C12.9758 1.51316 11.6283 1.46796 11.0531 1.52548ZM13.3949 2.28554C17.3184 2.86072 20.5312 5.75715 21.509 9.59442C21.7309 10.4736 21.7925 10.9995 21.7925 12.002C21.7925 13.0044 21.7309 13.5303 21.509 14.4095C20.6216 17.8934 17.8895 20.6255 14.4056 21.513C13.5264 21.7348 13.0005 21.7964 11.998 21.7964C10.9956 21.7964 10.4697 21.7348 9.59051 21.513C6.10657 20.6255 3.37447 17.8934 2.48705 14.4095C2.26519 13.5303 2.20357 13.0044 2.20357 12.002C2.20357 11.3569 2.22411 10.9831 2.27752 10.6256C2.95952 6.10637 6.52973 2.69638 11.0736 2.22802C11.5954 2.1705 12.8362 2.20337 13.3949 2.28554Z" fill="#333333"/>
                                              <path d="M15.9472 17.4975L15.0164 16.4247C14.5642 16.7507 14.0646 17.0031 13.5177 17.1819C12.9708 17.3502 12.3976 17.4344 11.7981 17.4344C11.0198 17.4344 10.2888 17.2924 9.60514 17.0084C8.93202 16.7139 8.33777 16.309 7.82241 15.7936C7.30705 15.2677 6.90213 14.663 6.60764 13.9793C6.32366 13.2852 6.18167 12.5384 6.18167 11.7391C6.18167 10.9398 6.32366 10.1983 6.60764 9.51464C6.90213 8.82048 7.30705 8.21572 7.82241 7.70036C8.33777 7.17448 8.93202 6.76956 9.60514 6.48558C10.2888 6.19109 11.0198 6.04385 11.7981 6.04385C12.5764 6.04385 13.3021 6.19109 13.9752 6.48558C14.6588 6.76956 15.2583 7.17448 15.7737 7.70036C16.289 8.21572 16.6887 8.82048 16.9727 9.51464C17.2672 10.1983 17.4144 10.9398 17.4144 11.7391C17.4144 12.6015 17.2461 13.4009 16.9096 14.1371C16.573 14.8628 16.1155 15.4886 15.537 16.0145L16.736 17.3713L15.9472 17.4975ZM11.7981 16.756C12.3239 16.756 12.8183 16.6824 13.281 16.5351C13.7438 16.3773 14.1698 16.167 14.5589 15.9041L12.8235 13.9005L13.6123 13.7743L15.0795 15.4781C15.5739 15.0153 15.963 14.4632 16.247 13.8216C16.531 13.18 16.6729 12.4859 16.6729 11.7391C16.6729 11.0344 16.5467 10.3771 16.2943 9.76706C16.0524 9.15704 15.7106 8.62591 15.2688 8.17365C14.8271 7.7214 14.3065 7.36906 13.707 7.11664C13.118 6.8537 12.4817 6.72223 11.7981 6.72223C11.1144 6.72223 10.4728 6.8537 9.87334 7.11664C9.28435 7.36906 8.76899 7.7214 8.32726 8.17365C7.88552 8.62591 7.53844 9.15704 7.28602 9.76706C7.04411 10.3771 6.92316 11.0344 6.92316 11.7391C6.92316 12.4438 7.04411 13.1011 7.28602 13.7111C7.53844 14.3212 7.88552 14.8523 8.32726 15.3046C8.76899 15.7568 9.28435 16.1144 9.87334 16.3773C10.4728 16.6298 11.1144 16.756 11.7981 16.756Z" fill="#333333"/>
                                              <path fill-rule="evenodd" clip-rule="evenodd" d="M1.83984 8.2874C2.02731 7.77611 2.54179 6.72132 2.81325 6.29469C3.42982 5.32343 4.49211 4.13794 5.32381 3.49814C7.01084 2.19912 8.93743 1.42968 11.0242 1.22691C11.6272 1.16678 12.9995 1.21321 13.6263 1.31128C14.7489 1.48855 15.7149 1.79359 16.7525 2.30396C17.8881 2.86119 18.6994 3.44352 19.6296 4.36956C20.5557 5.29983 21.139 6.1121 21.6962 7.24765C22.066 7.99981 22.2538 8.49889 22.4564 9.25832C22.7227 10.2728 22.7869 10.8382 22.7869 12.002C22.7869 13.1658 22.723 13.73 22.4567 14.7445C22.2541 15.5039 22.066 16.0042 21.6962 16.7563C21.139 17.8919 20.5566 18.7032 19.6306 19.6334C18.7002 20.5596 17.8879 21.1429 16.7523 21.7001C15.711 22.2102 14.7705 22.511 13.6076 22.7006C12.7753 22.8329 11.2222 22.8331 10.3898 22.7008C9.22695 22.5112 8.28549 22.2103 7.24419 21.7002C6.10854 21.1429 5.29701 20.5605 4.36668 19.6344C3.44057 18.7041 2.85727 17.8918 2.29999 16.7561C1.78988 15.7148 1.48913 14.7744 1.29953 13.6115C1.16721 12.7791 1.16702 11.226 1.29934 10.3937C1.40887 9.72387 1.63137 8.85749 1.83984 8.2874ZM6.30909 4.3853C7.66623 3.37149 9.30662 2.71179 11.1045 2.52647L11.1066 2.52624C11.6001 2.47184 12.815 2.50349 13.3514 2.58237C17.1551 3.13998 20.2704 5.94851 21.2184 9.6683C21.4335 10.5208 21.4926 11.0218 21.4926 12.002C21.4926 12.9822 21.4335 13.4832 21.2184 14.3356C21.0729 14.9068 20.8762 15.4572 20.6335 15.9816C20.4988 16.2726 20.35 16.5556 20.1878 16.8297C18.9145 18.9825 16.821 20.5882 14.3317 21.2222C13.4793 21.4373 12.9783 21.4965 11.9981 21.4965C11.0179 21.4965 10.5169 21.4373 9.66447 21.2222C8.21865 20.8539 6.90634 20.1578 5.8107 19.2171C4.347 17.9605 3.26999 16.2673 2.77794 14.3358C2.56284 13.4832 2.50367 12.9822 2.50367 12.002C2.50367 11.3627 2.52413 11.006 2.57429 10.6702C2.96607 8.07446 4.3392 5.85686 6.30909 4.3853ZM15.6278 17.587L15.83 17.8201L17.3221 17.5813L17.1096 17.3409L15.9531 16.0322C16.4616 15.5231 16.8713 14.9329 17.1818 14.2634L17.1825 14.2619C17.3052 13.9935 17.4065 13.7176 17.4867 13.4341C17.6388 12.8958 17.7145 12.3304 17.7145 11.7391C17.7145 10.903 17.5605 10.1216 17.2494 9.3985C16.951 8.6701 16.5302 8.03277 15.9869 7.48928C15.4441 6.93567 14.8121 6.50875 14.093 6.20965C13.3804 5.89834 12.6144 5.74387 11.7982 5.74387C10.9813 5.74387 10.2101 5.89857 9.48759 6.20964C9.2888 6.29355 9.0965 6.38749 8.91072 6.49144C8.43372 6.75833 7.99971 7.09116 7.60931 7.48933C7.06627 8.03265 6.64036 8.66959 6.33155 9.3975L6.33069 9.39959C6.03039 10.1225 5.88177 10.9035 5.88177 11.7391C5.88177 12.5748 6.03035 13.3604 6.33002 14.093L6.33221 14.0981C6.64116 14.8153 7.06672 15.4511 7.60824 16.0036L7.61038 16.0058C8.15241 16.5478 8.77786 16.974 9.48497 17.2833L9.49016 17.2855C10.2121 17.5854 10.9824 17.7344 11.7982 17.7344C12.4261 17.7344 13.0292 17.6462 13.606 17.4687L13.611 17.4671C14.0968 17.3083 14.5485 17.0937 14.9652 16.8233L15.6278 17.587ZM15.0961 15.0374C15.4565 14.6515 15.7487 14.2063 15.9728 13.7002C16.142 13.3178 16.2579 12.9146 16.3199 12.4895C16.3553 12.2466 16.373 11.9965 16.373 11.7391C16.373 11.0711 16.2536 10.453 16.0172 9.88179L16.0155 9.87769C15.7877 9.30318 15.4672 8.80604 15.0543 8.3833C14.6414 7.96049 14.1544 7.63052 13.5907 7.39316L13.5848 7.39067C13.0365 7.14593 12.4422 7.02226 11.7982 7.02226C11.1612 7.02226 10.567 7.14316 10.0124 7.38334L9.99394 7.3914L9.99162 7.39242C9.4383 7.62955 8.95583 7.95959 8.54197 8.3833C8.12862 8.80649 7.80255 9.30435 7.56417 9.87976C7.33777 10.4515 7.22326 11.0703 7.22326 11.7391C7.22326 12.4079 7.33777 13.0268 7.56416 13.5985C7.80254 14.1739 8.12862 14.6718 8.54197 15.095C8.95599 15.5188 9.43888 15.8544 9.9928 16.1021C10.5527 16.3374 11.1536 16.456 11.7982 16.456C12.2946 16.456 12.757 16.3867 13.1872 16.2502C13.5126 16.1391 13.8177 16.0009 14.103 15.8358L12.2439 13.6894L13.7305 13.4516L15.0961 15.0374Z" fill="#333333"/>
                                            </svg>
                                          </div>
                                          Q-Dollar
                                           {{-- @lang('labels.menu.q_dollar') --}}
                                        </a>
                                      </li>
                                      <li class="login-dropdown-item flex items-center">
                                        <a href="" class="group hover:text-blueMediq">
                                          <div class="book-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                              <path fill-rule="evenodd" clip-rule="evenodd" d="M11.7597 2.35003L9.81995 6.06343C9.55551 6.56966 9.06931 6.9229 8.50614 7.01797L4.37506 7.71531L7.30729 10.7077C7.70703 11.1156 7.89274 11.6871 7.80912 12.2521L7.19576 16.3965L10.9478 14.5325C11.4593 14.2784 12.0602 14.2784 12.5717 14.5325L16.3237 16.3965L15.7103 12.2521C15.6267 11.6871 15.8124 11.1156 16.2122 10.7077L19.1444 7.71531L15.0133 7.01797C14.4502 6.9229 13.964 6.56966 13.6995 6.06343L11.7597 2.35003ZM12.2744 0.647877C12.0572 0.232121 11.4622 0.23212 11.2451 0.647877L8.71706 5.48731C8.63292 5.64838 8.47822 5.76077 8.29903 5.79102L2.91526 6.69982C2.45274 6.7779 2.26888 7.34378 2.59717 7.67881L6.41855 11.5785C6.54574 11.7083 6.60483 11.8902 6.57822 12.07L5.77887 17.4711C5.71019 17.9351 6.19156 18.2848 6.61164 18.0761L11.5014 15.6468C11.6641 15.566 11.8553 15.566 12.0181 15.6468L16.9078 18.0761C17.3279 18.2848 17.8093 17.9351 17.7406 17.4711L16.9412 12.07C16.9146 11.8902 16.9737 11.7083 17.1009 11.5785L20.9223 7.67881C21.2506 7.34378 21.0667 6.7779 20.6042 6.69982L15.2204 5.79102C15.0412 5.76077 14.8865 5.64838 14.8024 5.48731L12.2744 0.647877Z" fill="#333333"/>
                                              <path fill-rule="evenodd" clip-rule="evenodd" d="M12.3815 17.6221C12.7251 17.6221 13.0037 17.9006 13.0037 18.2442L13.0037 22.8896C13.0037 23.2332 12.7251 23.5118 12.3815 23.5118C12.0379 23.5118 11.7594 23.2332 11.7594 22.8896L11.7594 18.2442C11.7594 17.9006 12.0379 17.6221 12.3815 17.6221Z" fill="#333333"/>
                                              <path fill-rule="evenodd" clip-rule="evenodd" d="M5.37034 12.2639C5.54712 12.5585 5.45158 12.9407 5.15694 13.1175L1.17355 15.5075C0.878909 15.6843 0.496746 15.5887 0.319963 15.2941C0.143179 14.9995 0.23872 14.6173 0.533359 14.4405L4.51675 12.0505C4.81139 11.8737 5.19355 11.9692 5.37034 12.2639Z" fill="#333333"/>
                                              <path fill-rule="evenodd" clip-rule="evenodd" d="M6.8455 4.48093C6.60426 4.7256 6.21034 4.72838 5.96567 4.48714L2.75646 1.32292C2.51179 1.08167 2.50901 0.68776 2.75025 0.443085C2.9915 0.198411 3.38541 0.195631 3.63009 0.436875L6.83929 3.6011C7.08397 3.84234 7.08675 4.23625 6.8455 4.48093Z" fill="#333333"/>
                                              <path fill-rule="evenodd" clip-rule="evenodd" d="M16.7858 4.48093C17.0271 4.7256 17.421 4.72838 17.6657 4.48714L20.8749 1.32292C21.1196 1.08167 21.1223 0.68776 20.8811 0.443085C20.6399 0.198411 20.2459 0.195631 20.0013 0.436875L16.7921 3.6011C16.5474 3.84234 16.5446 4.23625 16.7858 4.48093Z" fill="#333333"/>
                                              <path fill-rule="evenodd" clip-rule="evenodd" d="M18.2615 12.2639C18.0847 12.5585 18.1803 12.9407 18.4749 13.1175L22.4583 15.5075C22.7529 15.6843 23.1351 15.5887 23.3119 15.2941C23.4887 14.9995 23.3931 14.6173 23.0985 14.4405L19.1151 12.0505C18.8204 11.8737 18.4383 11.9692 18.2615 12.2639Z" fill="#333333"/>
                                            </svg>
                                          </div>
                                          Review
                                           {{-- @lang('labels.menu.review') --}}
                                        </a>
                                      </li>
                                      <li class="login-dropdown-item flex items-center">
                                        <a href="" class="group hover:text-blueMediq">
                                          <div class="book-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"><path d="M10.65.352C10.2.45 2.461 3.22 2.086 3.412 1.396 3.764.792 4.548.581 5.345.46 5.804.478 6.487.62 6.96c.253.825 4.51 12.675 4.645 12.937.225.436.811.994 1.284 1.233a3.14 3.14 0 002.363.188l.36-.117.076.285c.14.493.389.91.802 1.318.412.412.73.61 1.289.782l.351.108h4.594c4.336 0 4.608-.004 4.875-.084.91-.281 1.542-.82 1.94-1.65.329-.68.31-.173.31-7.852 0-7.626.019-7.157-.286-7.818-.356-.779-.975-1.336-1.824-1.636l-.375-.132-3.065-.023-3.061-.023-.431-1.196c-.235-.656-.492-1.312-.567-1.453-.193-.351-.82-.97-1.172-1.158-.638-.333-1.463-.46-2.077-.318zm1.186.75c.15.042.38.13.51.201.32.169.784.633.938.938.099.196.825 2.17.825 2.24 0 .01-.464.019-1.026.019-.713 0-1.14.023-1.397.07-1.12.211-2.067 1.12-2.358 2.255-.089.352-.094.548-.094 6.98v6.623l-.267.094c-.614.22-.928.262-1.369.197-.675-.108-1.382-.596-1.682-1.163C5.77 19.28 1.355 6.928 1.27 6.558c-.21-.919.286-2.035 1.107-2.47.304-.16.36-.183 4.162-1.533 1.495-.535 3.014-1.074 3.37-1.2.357-.132.727-.253.82-.272.277-.066.812-.056 1.107.019zm9.206 4.218c.844.225 1.538.961 1.692 1.8.066.343.066 13.636 0 13.978-.117.629-.6 1.28-1.176 1.585-.549.295-.352.286-5.175.286-4.814 0-4.683.004-5.199-.272a2.381 2.381 0 01-1.2-1.744c-.06-.469-.06-13.219 0-13.687.09-.699.591-1.435 1.186-1.744.544-.281.3-.267 5.166-.267 3.717-.005 4.495.01 4.706.065z" fill="#333"/><path d="M14.002 10.547a2.194 2.194 0 00-1.402.83c-.525.693-.6 1.565-.197 2.367.094.192.54.665 1.936 2.067.994 1.003 1.86 1.842 1.917 1.866.08.028.155.023.263-.029.084-.042.947-.872 1.908-1.842 1.832-1.842 1.959-1.997 2.104-2.531.08-.314.066-.886-.042-1.219a2.177 2.177 0 00-2.372-1.504c-.558.08-.876.248-1.406.754l-.352.333-.403-.39c-.46-.44-.815-.627-1.317-.702-.356-.052-.328-.052-.637 0zm.923.834c.15.07.403.277.755.619.698.68.66.68 1.354.01.647-.629.844-.732 1.364-.737.32 0 .418.02.643.132.52.257.81.717.806 1.298 0 .614 0 .614-1.847 2.461l-1.64 1.64-1.594-1.593c-1.829-1.824-1.875-1.89-1.875-2.494 0-.366.065-.576.262-.862.145-.211.483-.455.74-.54.263-.088.75-.056 1.032.066z" fill="#333"/></svg>
                                          </div>
                                          Referral
                                            {{-- @lang('labels.menu.referral') --}}
                                        </a>
                                      </li> -->
                                            <li class="login-dropdown-item flex items-center">
                                                <a href="{{ route('dashboard.myacc.basicinfo') }}"
                                                    class="group hover:text-blueMediq">
                                                    <div class="book-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                            <path
                                                                d="M12 1.5C9.9233 1.5 7.89323 2.11581 6.16652 3.26957C4.4398 4.42332 3.09399 6.0632 2.29927 7.98182C1.50455 9.90045 1.29661 12.0116 1.70176 14.0484C2.1069 16.0852 3.10693 17.9562 4.57538 19.4246C6.04383 20.8931 7.91475 21.8931 9.95156 22.2982C11.9884 22.7034 14.0996 22.4955 16.0182 21.7007C17.9368 20.906 19.5767 19.5602 20.7304 17.8335C21.8842 16.1068 22.5 14.0767 22.5 12C22.4969 9.21616 21.3897 6.54722 19.4212 4.57875C17.4528 2.61029 14.7838 1.50306 12 1.5ZM5.79135 19.3941C6.41454 18.2968 7.31742 17.3842 8.40804 16.7493C9.49866 16.1145 10.7381 15.78 12 15.78C13.2619 15.78 14.5013 16.1145 15.592 16.7493C16.6826 17.3842 17.5855 18.2968 18.2087 19.3941C16.4708 20.8575 14.2719 21.66 12 21.66C9.72809 21.66 7.5292 20.8575 5.79135 19.3941ZM18.8429 18.8113C17.7995 17.0669 16.1267 15.7892 14.1693 15.2413C15.0794 14.7573 15.8015 13.9829 16.2207 13.0412C16.6399 12.0995 16.7321 11.0446 16.4827 10.0444C16.2333 9.04428 15.6566 8.15625 14.8443 7.52164C14.032 6.88704 13.0308 6.54231 12 6.54231C10.9692 6.54231 9.96802 6.88704 9.15572 7.52164C8.34343 8.15625 7.7667 9.04428 7.51728 10.0444C7.26787 11.0446 7.3601 12.0995 7.77931 13.0412C8.19851 13.9829 8.9206 14.7573 9.8307 15.2413C7.87328 15.7892 6.20055 17.0669 5.15715 18.8113C3.80963 17.459 2.89304 15.7377 2.5231 13.8648C2.15316 11.9919 2.34648 10.0513 3.07864 8.28822C3.81079 6.5251 5.04896 5.01845 6.63679 3.95852C8.22462 2.8986 10.0909 2.33292 12 2.33292C13.9091 2.33292 15.7754 2.8986 17.3632 3.95852C18.951 5.01845 20.1892 6.5251 20.9214 8.28822C21.6535 10.0513 21.8468 11.9919 21.4769 13.8648C21.107 15.7377 20.1904 17.459 18.8429 18.8113ZM12 14.94C11.2524 14.94 10.5216 14.7183 9.89995 14.303C9.27833 13.8876 8.79384 13.2972 8.50774 12.6065C8.22164 11.9158 8.14678 11.1558 8.29263 10.4226C8.43849 9.68931 8.7985 9.01578 9.32714 8.48713C9.85578 7.95849 10.5293 7.59848 11.2626 7.45263C11.9958 7.30678 12.7558 7.38163 13.4465 7.66773C14.1372 7.95383 14.7276 8.43833 15.143 9.05994C15.5583 9.68156 15.78 10.4124 15.78 11.16C15.78 12.1625 15.3818 13.124 14.6729 13.8329C13.964 14.5417 13.0025 14.94 12 14.94Z"
                                                                fill="#333333" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M12 1.19995H12.0003C14.8636 1.2031 17.6087 2.34192 19.6333 4.36657C21.658 6.39122 22.7968 9.13633 22.7999 11.9996V11.9999C22.7999 14.136 22.1665 16.2241 20.9798 18.0001C19.7931 19.7762 18.1064 21.1604 16.1329 21.9778C14.1595 22.7953 11.988 23.0091 9.89298 22.5924C7.79798 22.1757 5.87361 21.1471 4.3632 19.6367C2.8528 18.1263 1.8242 16.2019 1.40748 14.1069C0.990755 12.0119 1.20463 9.84041 2.02206 7.86697C2.83948 5.89353 4.22375 4.2068 5.9998 3.02008C7.77585 1.83336 9.86392 1.19995 12 1.19995ZM22.4999 11.9999C22.4999 14.0767 21.8841 16.1067 20.7304 17.8334C19.5766 19.5602 17.9368 20.906 16.0181 21.7007C14.0995 22.4954 11.9883 22.7033 9.95151 22.2982C7.91471 21.893 6.04379 20.893 4.57533 19.4246C3.10688 17.9561 2.10686 16.0852 1.70171 14.0484C1.29657 12.0116 1.5045 9.9004 2.29922 7.98177C3.09394 6.06315 4.43975 4.42327 6.16647 3.26952C7.89318 2.11577 9.92325 1.49995 12 1.49995C14.7838 1.50301 17.4527 2.61024 19.4212 4.57871C21.3897 6.54717 22.4969 9.21611 22.4999 11.9999ZM5.79131 19.394C7.52915 20.8574 9.72804 21.6599 12 21.6599C14.2719 21.6599 16.4708 20.8574 18.2086 19.394C17.5854 18.2967 16.6825 17.3841 15.5919 16.7493C14.5013 16.1144 13.2619 15.78 12 15.78C10.738 15.78 9.49862 16.1144 8.40799 16.7493C7.31737 17.3841 6.41449 18.2967 5.79131 19.394ZM17.8192 19.3253C17.2294 18.3705 16.4131 17.5744 15.441 17.0086C14.3962 16.4004 13.2089 16.08 12 16.08C10.791 16.08 9.60371 16.4004 8.55892 17.0086C7.58685 17.5744 6.77047 18.3705 6.18072 19.3253C7.83223 20.641 9.88339 21.3599 12 21.3599C14.1165 21.3599 16.1677 20.641 17.8192 19.3253ZM18.6794 18.5498C18.7355 18.6358 18.7899 18.7229 18.8428 18.8113C18.9159 18.7379 18.9878 18.6635 19.0583 18.5879C20.2882 17.2717 21.127 15.636 21.4769 13.8647C21.8468 11.9918 21.6535 10.0513 20.9213 8.28817C20.1892 6.52505 18.951 5.0184 17.3632 3.95848C15.7753 2.89855 13.909 2.33287 12 2.33287C10.0909 2.33287 8.22457 2.89855 6.63674 3.95848C5.04891 5.0184 3.81074 6.52505 3.07859 8.28817C2.34643 10.0513 2.15312 11.9918 2.52305 13.8647C2.87292 15.636 3.71173 17.2717 4.94159 18.5879C5.01215 18.6635 5.08399 18.7379 5.1571 18.8113C5.20996 18.7229 5.26442 18.6358 5.32046 18.5498C6.29589 17.054 7.74702 15.9314 9.43761 15.3624C9.56725 15.3187 9.6983 15.2783 9.83065 15.2413C9.70981 15.177 9.59228 15.1076 9.47834 15.0334C8.73414 14.5487 8.1428 13.8578 7.77926 13.0411C7.36005 12.0994 7.26782 11.0446 7.51724 10.0444C7.76665 9.04423 8.34338 8.1562 9.15567 7.52159C9.96797 6.88699 10.9692 6.54226 12 6.54226C13.0308 6.54226 14.0319 6.88699 14.8442 7.52159C15.6565 8.1562 16.2333 9.04423 16.4827 10.0444C16.7321 11.0446 16.6399 12.0994 16.2206 13.0411C15.8571 13.8578 15.2658 14.5487 14.5216 15.0334C14.4076 15.1076 14.2901 15.177 14.1693 15.2413C14.3016 15.2783 14.4327 15.3187 14.5623 15.3624C16.2529 15.9314 17.704 17.054 18.6794 18.5498ZM18.8916 18.3265C20.0546 17.061 20.8485 15.4976 21.1825 13.8066C21.541 11.9919 21.3537 10.1116 20.6443 8.40322C19.9348 6.69486 18.7351 5.235 17.1966 4.20799C15.6581 3.18098 13.8498 2.63287 12 2.63287C10.1501 2.63287 8.34181 3.18098 6.8033 4.20799C5.26478 5.235 4.06507 6.69486 3.35565 8.40322C2.64623 10.1116 2.45892 11.9919 2.81737 13.8066C3.15136 15.4976 3.94526 17.061 5.10832 18.3265C6.07751 16.8679 7.48538 15.7578 9.12457 15.1546C8.42128 14.6481 7.86086 13.9621 7.50519 13.1631C7.05876 12.1603 6.96054 11.0369 7.22615 9.97181C7.49176 8.90669 8.10594 7.961 8.97098 7.28519C9.83602 6.60937 10.9022 6.24226 12 6.24226C13.0977 6.24226 14.1639 6.60937 15.0289 7.28519C15.894 7.961 16.5081 8.90669 16.7738 9.97181C17.0394 11.0369 16.9411 12.1603 16.4947 13.1631C16.139 13.9621 15.5786 14.6481 14.8753 15.1546C16.5145 15.7578 17.9224 16.8679 18.8916 18.3265ZM10.0666 14.0535C10.6389 14.4358 11.3117 14.6399 12 14.6399C12.9229 14.6399 13.8081 14.2733 14.4607 13.6207C15.1133 12.9681 15.48 12.0829 15.48 11.1599C15.48 10.4717 15.2759 9.79885 14.8935 9.22656C14.5111 8.65428 13.9676 8.20824 13.3317 7.94485C12.6958 7.68146 11.9961 7.61254 11.321 7.74682C10.646 7.88109 10.0259 8.21253 9.53922 8.69922C9.05254 9.1859 8.7211 9.80598 8.58682 10.481C8.45255 11.1561 8.52146 11.8558 8.78485 12.4917C9.04825 13.1276 9.49429 13.6711 10.0666 14.0535ZM9.8999 14.3029C10.5215 14.7183 11.2523 14.9399 12 14.9399C13.0025 14.9399 13.9639 14.5417 14.6728 13.8328C15.3817 13.1239 15.78 12.1625 15.78 11.1599C15.78 10.4123 15.5583 9.68151 15.1429 9.05989C14.7276 8.43828 14.1372 7.95378 13.4465 7.66768C12.7558 7.38159 11.9958 7.30673 11.2625 7.45258C10.5293 7.59843 9.85573 7.95844 9.32709 8.48709C8.79845 9.01573 8.43844 9.68926 8.29259 10.4225C8.14673 11.1558 8.22159 11.9158 8.50769 12.6065C8.79379 13.2972 9.27828 13.8876 9.8999 14.3029Z"
                                                                fill="#333333" />
                                                        </svg>
                                                    </div>
                                                    @lang('labels.member_dashboard.my_account')
                                                    {{-- @lang('labels.menu.profile') --}}

                                                </a>
                                            </li>
                                            <li class="py-[20px] text-center border-t border-t-[#E4E4E4]">
                                                <button id="sign-out"
                                                    class="text-darkgray hover:text-orangeMediq sign-out">@lang('labels.menu.sign-out')</button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                {{-- @else
                                <div
                                    class="h-full register-btn before-login-container flex items-center cursor-pointer">
                                    <div class="flex items-center register-btn-content px-[20px] py-[10px]">
                                        <img src="{{ asset('frontend/img/me-sign-in.svg') }}" />
                                        <div class="before-login sign-in-name ml-[8px]">
                                            Hi! <button class="">Register/Sign-In</button>
                                            <br />
                                            Your Account
                                        </div>

                                    </div> --}}
                            @else
                                <div
                                    class="h-full register-btn before-login-container flex items-center cursor-pointer">
                                    <div class="flex items-center register-btn-content px-[20px] py-[10px]">
                                        <img src="{{ asset('frontend/img/me-sign-in.svg') }}" />
                                        <div class="before-login sign-in-name ml-[8px]">
                                            <button class=""> @lang('labels.menu.hi_register')
                                            </button>
                                            {{-- <br />
                                            @lang('labels.menu.your_account') --}}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="menu-only">
            <nav class="nav relative">
                <ul class="navigation">
                    @if (isset($main_categories) && count($main_categories) > 0)
                        @foreach ($main_categories as $category)
                            <li>
                                <a href="#" class="main-menu"
                                    id="{{ $category->id }}">{{ langbind($category, 'name') }}
                                    <img src="{{ asset('frontend/img/top-chervon.svg') }}" alt="chervon">
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
                <div class="relative mt-[-2px]">
                    <div class="dropdown-menu relative">
                        @if (isset($main_categories) && count($main_categories) > 0)
                            @foreach ($main_categories as $category)
                                <div class="me-sub-menu" aria-labelledby="{{ $category->id }}">

                                    @if (isset($category->subCategory) && count($category->subCategory) > 0)
                                        <div class="flex flex-col flex-wrap">
                                            @foreach ($category->subCategory as $sub_category)
                                                <a href="{{ langlink('products?pc=' . $sub_category->id) }}"
                                                    class="me-sub-menu-item"><img
                                                        src="{{ isset($sub_category->img) ? $sub_category->img : asset('frontend/img/category2.svg') }}" />{{ langbind($sub_category, 'name') }}</a>
                                            @endforeach
                                            @if (isset($category->img))
                                                @if ($category->img != null)
                                                    <div class="w-1/4 h-full ml-auto menu-slider">
                                                        @foreach ($category->img as $key => $img)
                                                            <div class="menu-slider-item">
                                                                <img src="{{ asset($img) }}"
                                                                    class="w-full h-full rounded-[12px] object-cover" />
                                                            </div>
                                                        @endforeach

                                                    </div>
                                                @endif
                                            @endif 
                                        </div>
                                    @endif

                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </nav>
        </div> --}}
        <div class="menu-only">
            <nav class="nav relative">
              <ul class="navigation">
                @if (isset($main_categories) && count($main_categories) > 0)
                @foreach ($main_categories as $category)
                @php
                $cate = [];
                foreach($category->subCategory as $key => $subCate){
                    $zkey = $key == 0 ? '?pc=' : '';
                    $cate[$key] = $zkey.$subCate->id.'%2C';
                }
                @endphp
                <li>
                  <a href="{{langlink('products'.implode('',$cate))}}" class="main-menu" id="{{ $category->id }}">{{ langbind($category, 'name') }}
                    <img src="{{ asset('frontend/img/top-chervon.svg') }}" alt="chervon">
                  </a>
                </li>
                @endforeach
                @endif
              </ul>
              <div class="relative mt-[-2px]">
                <div class="dropdown-menu relative">
                    @if (isset($main_categories) && count($main_categories) > 0)
                    @foreach ($main_categories as $category)
                        <div class="me-sub-menu" aria-labelledby="{{ $category->id }}">
                            <div class="flex justify-between">
                            <div class="flex flex-col flex-wrap flex-1">
                                @foreach ($category->subCategory as $sub_category)
                                    <a href="{{ langlink('products?pc=' . $sub_category->id) }}" class="me-sub-menu-item">
                                    <img src="{{ isset($sub_category->img) ? $sub_category->img : asset('frontend/img/category2.svg') }}" />
                                        {{ langbind($sub_category, 'name') }}
                                    </a>     
                                @endforeach   
                            </div>

                            @if(count($category->images) > 0)
        
                            <div class="hidden xl:block w-1/4 custom-menu-slide-div">
                                <div class="w-full h-full ml-auto menu-slider">
                                @foreach ($category->images as $key => $img)
                                <div class="menu-slider-item relative">
                                    <img src="{{ asset($img->image) }}" class="w-full h-full rounded-[12px] object-cover" />
                                    <p class="font-bold text-darkgray me-body-20 absolute bottom-[70px] px-[5px]">{{ langbind($img,'title') }}</p>               
                                </div>
                                @endforeach
                                </div>
                            </div>

                            @endif

                            </div>
                        </div>
                    @endforeach
                    @endif
                </div>
              </div>
            </nav>
          </div>
    </div>
    {{-- mobile menu --}}
    <div class="block lg:hidden">
        <div class="menu-with-searchbar">
            <div class="flex justify-between items-center menu-with-searchbar-content">
                <a href="{{ route('mediq') }}"><img src="{{ asset('frontend/img/me-logo.png') }}" alt="logo"
                        class="mr-[32px] 7xl:mr-[63px]"></a>
                <div class="search-icon-container flex justify-center items-center ml-auto">
                    <img src="{{ asset('frontend/img/me-hsearch-icon.svg') }}" alt="search icon"
                        class="search-icon invert w-[30px] mr-4">
                </div>
                <div class="">
                    <button class="outline-none mobile-menu-burger cursor-pointer"><img
                            src="{{ asset('frontend/img/me-burger.png') }}" alt="png"></button>
                </div>
            </div>
        </div>
    </div>
    <div
        class="fixed overflow-y-auto left-0 top-0 h-[100vh] w-full bg-white z-50 px-5 lg:hidden mobile-menu-list pb-[50px]">
        <div class="flex justify-between py-3 z-10">
            <a href="/p238"><img src="{{ asset('frontend/img/Logotype_Mediq-updated.svg') }}" alt="logo"
                    class="w-[80%]"></a>
            <img src="{{ asset('frontend/img/me-menu-close_icon.png') }}" alt="close icon"
                class="close-btn h-[30px] cursor-pointer">
        </div>
        <div class="border-t border-dashed pt-6 items-center flex lang_btn_mobile">
        </div>
        <nav>

            <ul class="pb-10 ele-menu-lists">
                @if (isset($main_categories) && count($main_categories) > 0)
                    @foreach ($main_categories as $category)
                        <li class="py-[6px]"><a href="javascript:void(0)"
                                class="text-titletext hover:text-primary text-please-sm main-menu">
                                {{ langbind($category, 'name') }}
                                <img src="{{ asset('frontend/img/top-chervon.svg') }}" alt="chervon">
                            </a>
                            @if (isset($category->subCategory) && count($category->subCategory) > 0)
                                <div class="mobile-dropdown-menu relative my-[10px]">
                                    <div class="me-sub-menu">
                                        <div class="flex flex-row flex-wrap">
                                            @foreach ($category->subCategory as $sub_category)
                                                <a href="{{ langlink('products?pc=' . $sub_category->id) }}"
                                                    class="me-sub-menu-item"><img
                                                        src="{{ isset($sub_category->img) ? $sub_category->img : asset('frontend/img/category2.svg') }}" />{{ langbind($sub_category, 'name') }}
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </li>
                    @endforeach
                @endif
            </ul>
        </nav>
        <div class="logged-container flex items-baseline justify-start">
            <div class="flex justify-start relative">
                <div class="mr-[30px] last:mr-0  flex items-center opacity-0">
                    <div class="relative badge-container" id="me-message">
                        <span class="me-badge text-white bg-[#FF6F6F] rounded-[50%] w-[12px] h-[12px]"></span>
                        <img src="{{ asset('frontend/img/me-message-icon.svg') }}" class="me-message-icon" />
                    </div>
                    <div class="message-dropdown pt-[20px] pl-[20px] pr-[10px] hidden" aria-labelledby="me-message">
                    </div>
                </div>
                {{-- <div class="mr-[30px] last:mr-0 flex items-center">
                    <div class="relative badge-container" id="me-fav">
                        <span class="me-badge text-white bg-[#FF6F6F] rounded-[50%] w-[12px] h-[12px]" id="totalfavcount_mobile">{{ count($favouriteList) }}</span>
                        <img src="{{ asset('frontend/img/me-fav-icon.svg') }}" class="me-fav-icon" />
                    </div>
                    <div class="message-dropdown pt-[20px] pl-[20px] pr-[10px] hidden" aria-labelledby="me-fav">
                        <svg class="polygon-icon" width="18" height="11" viewBox="0 0 18 11" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 0L17.6603 10.5H0.339746L9 0Z" fill="white" />
                        </svg>
                        <ul class="pr-[5px] message-dropdown-container {{count($favouriteList) == 0?'hidden':''}}" id="favList_mobile">
                            @if(count($favouriteList) > 0)
                            @foreach($favouriteList as $fp)
                            <li
                                class="flex items-center justify-start message-dropdown-item pt-[10px] pb-[10px] first:pt-0">
                                <img src="{{$fp->featured_img}}" alt="fav icon" class="w-[60px] h-[60px] object-cover rounded-lg"/>
                                <div class="ml-[13px] w-full">
                                    <div class="flex justify-between items-baseline">
                                        <div class="">
                                            <p class="me-fav-title">{{langbind($fp,'name')}}--</p>
                                            <p class="me-mes-time">${{isset($fp->discount_price)?$fp->discount_price:$fp->original_price}}</p>
                                        </div>
                                        <button id="fav-close-btn_new_mobile" data-product-id={{$fp->id}}><svg width="10" height="9"
                                                viewBox="0 0 10 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.1999 0.306816C9.13823 0.245013 9.06497 0.195982 8.98432 0.162527C8.90367 0.129073 8.81722 0.111853 8.7299 0.111853C8.64259 0.111853 8.55614 0.129073 8.47549 0.162527C8.39484 0.195982 8.32158 0.245013 8.2599 0.306816L4.99991 3.56015L1.73991 0.300149C1.67818 0.238428 1.60491 0.189468 1.52427 0.156064C1.44362 0.122661 1.35719 0.105469 1.26991 0.105469C1.18262 0.105469 1.09619 0.122661 1.01554 0.156064C0.9349 0.189468 0.861626 0.238428 0.799905 0.300149C0.738184 0.36187 0.689224 0.435144 0.65582 0.515787C0.622417 0.59643 0.605225 0.682862 0.605225 0.770149C0.605225 0.857436 0.622417 0.943869 0.65582 1.02451C0.689224 1.10515 0.738184 1.17843 0.799905 1.24015L4.05991 4.50015L0.799905 7.76015C0.738184 7.82187 0.689224 7.89514 0.65582 7.97579C0.622417 8.05643 0.605225 8.14286 0.605225 8.23015C0.605225 8.31744 0.622417 8.40387 0.65582 8.48451C0.689224 8.56515 0.738184 8.63843 0.799905 8.70015C0.861626 8.76187 0.9349 8.81083 1.01554 8.84423C1.09619 8.87764 1.18262 8.89483 1.26991 8.89483C1.35719 8.89483 1.44362 8.87764 1.52427 8.84423C1.60491 8.81083 1.67818 8.76187 1.73991 8.70015L4.99991 5.44015L8.2599 8.70015C8.32163 8.76187 8.3949 8.81083 8.47554 8.84423C8.55619 8.87764 8.64262 8.89483 8.7299 8.89483C8.81719 8.89483 8.90362 8.87764 8.98427 8.84423C9.06491 8.81083 9.13818 8.76187 9.1999 8.70015C9.26163 8.63843 9.31059 8.56515 9.34399 8.48451C9.37739 8.40387 9.39458 8.31744 9.39458 8.23015C9.39458 8.14286 9.37739 8.05643 9.34399 7.97579C9.31059 7.89514 9.26163 7.82187 9.1999 7.76015L5.9399 4.50015L9.1999 1.24015C9.45324 0.986816 9.45324 0.560149 9.1999 0.306816Z"
                                                    fill="#333333" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                            @endif
                        </ul>
                       

                        <div class="pb-[20px] pt-[10px] view_all {{count($favouriteList) == 0?'hidden':''}}" >
                            <button
                                class="mes-view-all-btn mx-auto rounded-[50px] w-[100px] flex items-center justify-center h-[42px] border border-darkgray">
                                @lang('labels.product.view_all')
                            </button>
                        </div>
                       

                        <div class="favList empty-section flex items-center justify-center flex-col py-10 pr-5 n2 {{count($favouriteList) > 0?'hidden':''}}">
                            <img src="{{ asset('frontend/img/empty-wishlist.svg') }}" alt="empty wishlist icon" />
                            <h6 class="me-body18 text-darkgray font-bold helvetica-normal my-[10px]">Your wishlist is empty </h6>
                            <p class="me-body17 text-darkgray font-medium helvetica-normal text-center">Looks like you
                                have not added anything to your wishlist. Go ahead and explore top categories.</p>
                        </div>

                    </div>
                </div> --}}
                <div class="mr-[30px] last:mr-0 flex items-center relative nn">
                    <div class="relative {{ $isCheckoutPage == false ? 'cart-badge-container' : '' }}"
                        id="me-cart">
                        @php
                            if (Auth::guard('customer')->check() == true) {
                                $totalCartVal = App\Models\Cart::where('customer_id', Auth::guard('customer')->user()->id)->sum('qty');
                            } else {
                                $totalCartVal = 0;
                            }
                        @endphp
                        <div class="mr-[30px]">
                                {{-- <div class="relative badge-container">
                                        <span class="me-badge text-white bg-[#FF6F6F] rounded-[50%] w-[12px] h-[12px]" id="add_cart_val_mobile">{{ $totalCartVal }}</span>
                                        <img src="{{ asset('frontend/img/me-cart-icon.svg') }}" class="me-cart-icon" />
                                </div> --}}
                                <a href="{{Auth::guard('customer')->check() == true ? route('checkout.init') : 'javascript:void(0)'}}">
                                    <div class="relative badge-container">
                                    
                                        <span class="me-badge flex text-white bg-orangeMediq rounded-[50%] w-[25px] h-[25px]" id="add_cart_val_mobile">{{ $totalCartVal }}</span>
                                        <span class="me-badge-dot hidden text-white bg-[#FF6F6F] rounded-[50%] w-[12px] h-[12px]"></span>
                                    
                                        <!-- <span class="me-badge text-white bg-[#FF6F6F] rounded-[50%] w-[12px] h-[12px]"></span> -->
                                        <img src="{{ asset('frontend/img/me-cart-icon.svg') }}" class="me-cart-icon" />
                                    </div>
                                </a>
                        </div>
                    </div>
                    @if ($isCheckoutPage == false)
                        <div class="message-dropdown pl-[20px] pr-[10px] hidden" aria-labelledby="me-cart">
                            <div id="with_data_m">
                                <svg class="polygon-icon pl-[20px] pr-[10px]" width="18"
                                    height="11" viewBox="0 0 18 11" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 0L17.6603 10.5H0.339746L9 0Z" fill="white" />
                                </svg>
                                <div
                                    class="flex justify-between items-center py-[10px]">
                                    <p class="cart--no"> @lang('labels.product_detail.cart_total') <span
                                            class="total_cart_no"></span>
                                        @lang('labels.product_detail.items') </p>
                                    <p class="cart-total mr-[5px] total_cart_price"></p>
                                </div>

                                <ul class="pr-[5px] message-dropdown-container" id ="cart_items_m"></ul>
                                <div class="pl-[20px] pr-[10px] pb-[20px] pt-[10px] checkout_btn"><a
                                        href="{{ route('checkout.init') }}">
                                        <button
                                            class=" hover:bg-brightOrangeMediq mes-checkout mx-auto w-full rounded-[6px] flex items-center justify-center h-[42px] border border-orangeMediq bg-orangeMediq text-white">
                                            @lang('labels.header.checkout')
                                        </button></a>
                                </div>
                            </div>
                            <div class="px-5 hidden" id="no_data_m">
                                <div class="xl:py-10 py-6 px-6">
                                    <img src="{{ asset('frontend/img/empty-cart.svg') }}"
                                        alt="card-empty-icon" class="mx-auto" />
                                    <p class="mt-[10px] font-bold me-body-18 text-darkgray text-center">
                                        Your cart is empty</p>
                                    <p class="mt-[10px] font-normal me-body-18 text-darkgray text-center">
                                        Looks like you have not added anything to your cart. Go ahead and
                                        explore top categories.</p>
                                </div>
                            </div>

                        </div>
                    @endif
                </div>
                {{-- <div class="mr-[30px] last:mr-0 flex items-center relative">
                    <div class="relative cart-badge-container" id="me-cart">
                        <div class="mr-[30px]">
                            <a href="{{Auth::guard('customer')->check() == true ? route('checkout.init') : 'javascript:void(0)'}}">
                                <div class="relative badge-container">
                                    <span class="me-badge text-white bg-[#FF6F6F] rounded-[50%] w-[12px] h-[12px]" id="add_cart_val_mobile">{{ $totalCartVal }}</span>
                                    <img src="{{ asset('frontend/img/me-cart-icon.svg') }}" class="me-cart-icon" />
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="message-dropdown pl-[20px] pr-[10px] hidden" aria-labelledby="me-cart">
                        <svg class="polygon-icon" width="18" height="11" viewBox="0 0 18 11" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 0L17.6603 10.5H0.339746L9 0Z" fill="white" />
                        </svg>
                        <div class="flex justify-between items-center py-[10px] hidden">
                            <p class="cart-total-no">@lang('labels.product_detail.cart_total') <span
                                class="total_cart_no"></span> @lang('labels.product_detail.items')</p>
                                <p class="cart-total mr-[5px] total_cart_price"></p>
                        </div>
                        <ul class="pr-[5px] message-dropdown-container cart_items">

                        </ul>
                        <div class="empty-section hidden flex items-center justify-center flex-col py-10 pr-5 n3">
                            <img src="./img/menu-empty-cart.svg" alt="empty cart icon" />
                            <h6 class="me-body18 text-darkgray font-bold helvetica-normal my-[10px]">@lang('labels.compare.empty')
                            </h6>
                            <p class="me-body17 text-darkgray font-medium helvetica-normal text-center">@lang('labels.compare.add_your_card')</p>
                        </div>
                        <div class="pb-[20px] pt-[10px]">
                            <button
                                class="mes-checkout mx-auto w-full rounded-[6px] flex items-center justify-center h-[42px] border border-orangeMediq bg-orangeMediq text-white">
                                @lang('labels.header.checkout')
                            </button>
                        </div>
                    </div>
                </div> --}}
            </div>

            <div class="sign-in-container">
                @if (Auth::guard('customer')->check())
                    <div class=" flex items-center login-container h-full cursor-pointer relative">
                        <div
                            class="flex items-center login-container-content hover:bg-white hover:rounded-[100px] px-[20px] py-[10px]">
                            <div class="relative">
                                <img src="{{ asset('frontend/img/me-profile-img.svg') }}"
                                    class="w-[2.25rem] rounded-full object-cover login-profile-img" />
                                <span
                                    class="block w-[12px] h-[12px] rounded-full border border-white bg-[#FF6F6F] absolute top-0 right-0"></span>
                            </div>
                            <div class="after-login sign-in-name ml-[8px]">
                                <span class="mediq-user">@lang('labels.header.hi')
                                    {{ Auth::guard('customer')->user()->first_name }}
                                </span>
                                    {{-- {{ Auth::guard('customer')->user()->last_name }} --}}
                            </div>
                        </div>
                    </div>

                    <div class="login-dropdown">
                        <svg style="transform: translate(82px, -10px);" width="19" height="11"
                            viewBox="0 0 19 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.5 0L18.1603 10.5H0.839746L9.5 0Z" fill="white" />
                        </svg>
                        <ul class="">
                            <li class="login-dropdown-item flex items-center">
                                <a href="{{ route('dashboard.general') }}" class="group hover:text-blueMediq">
                                    <div class="book-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M9.35962 3.4043H3.7793C3.57219 3.4043 3.4043 3.57219 3.4043 3.7793V9.35962C3.4043 9.56673 3.57219 9.73462 3.7793 9.73462H9.35962C9.56673 9.73462 9.73462 9.56673 9.73462 9.35962V3.7793C9.73462 3.57219 9.56673 3.4043 9.35962 3.4043ZM3.7793 2.2793C2.95087 2.2793 2.2793 2.95087 2.2793 3.7793V9.35962C2.2793 10.188 2.95087 10.8596 3.7793 10.8596H9.35962C10.188 10.8596 10.8596 10.188 10.8596 9.35962V3.7793C10.8596 2.95087 10.188 2.2793 9.35962 2.2793H3.7793Z"
                                                fill="#333333" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M19.5002 3.4043H13.9199C13.7128 3.4043 13.5449 3.57219 13.5449 3.7793V9.35962C13.5449 9.56673 13.7128 9.73462 13.9199 9.73462H19.5002C19.7074 9.73462 19.8752 9.56673 19.8752 9.35962V3.7793C19.8752 3.57219 19.7074 3.4043 19.5002 3.4043ZM13.9199 2.2793C13.0915 2.2793 12.4199 2.95087 12.4199 3.7793V9.35962C12.4199 10.188 13.0915 10.8596 13.9199 10.8596H19.5002C20.3287 10.8596 21.0002 10.188 21.0002 9.35962V3.7793C21.0002 2.95087 20.3287 2.2793 19.5002 2.2793H13.9199Z"
                                                fill="#333333" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M9.35962 13.5446H3.7793C3.57219 13.5446 3.4043 13.7124 3.4043 13.9196V19.4999C3.4043 19.707 3.57219 19.8749 3.7793 19.8749H9.35962C9.56673 19.8749 9.73462 19.707 9.73462 19.4999V13.9196C9.73462 13.7124 9.56673 13.5446 9.35962 13.5446ZM3.7793 12.4196C2.95087 12.4196 2.2793 13.0911 2.2793 13.9196V19.4999C2.2793 20.3283 2.95087 20.9999 3.7793 20.9999H9.35962C10.188 20.9999 10.8596 20.3283 10.8596 19.4999V13.9196C10.8596 13.0911 10.188 12.4196 9.35962 12.4196H3.7793Z"
                                                fill="#333333" />
                                            <g clip-path="url(#clip0_8476_16777)">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M14.8561 12.5975C15.3625 12.3877 15.9052 12.2798 16.4533 12.2798C17.0015 12.2798 17.5442 12.3877 18.0506 12.5975C18.557 12.8072 19.0171 13.1147 19.4047 13.5023C19.7922 13.8898 20.0997 14.35 20.3094 14.8563C20.5192 15.3627 20.6271 15.9055 20.6271 16.4536C20.6271 17.0017 20.5192 17.5444 20.3094 18.0508C20.1718 18.383 19.9922 18.6953 19.7755 18.9802L21.3651 20.5698C21.5848 20.7895 21.5848 21.1457 21.3651 21.3653C21.1454 21.585 20.7893 21.585 20.5696 21.3653L18.98 19.7757C18.2577 20.3251 17.3711 20.6274 16.4533 20.6274C15.3464 20.6274 14.2848 20.1876 13.502 19.4049C12.7193 18.6222 12.2795 17.5605 12.2795 16.4536C12.2795 15.3466 12.7193 14.285 13.502 13.5023C13.8896 13.1147 14.3497 12.8072 14.8561 12.5975ZM16.4533 13.4048C16.053 13.4048 15.6565 13.4836 15.2866 13.6369C14.9167 13.7901 14.5806 14.0147 14.2975 14.2978C13.7258 14.8695 13.4045 15.645 13.4045 16.4536C13.4045 17.2622 13.7258 18.0376 14.2975 18.6094C14.8693 19.1812 15.6447 19.5024 16.4533 19.5024C17.2619 19.5024 18.0374 19.1812 18.6092 18.6094C18.8923 18.3263 19.1168 17.9902 19.2701 17.6203C19.4233 17.2504 19.5021 16.854 19.5021 16.4536C19.5021 16.0532 19.4233 15.6568 19.2701 15.2869C19.1168 14.917 18.8923 14.5809 18.6092 14.2978C18.3261 14.0147 17.99 13.7901 17.6201 13.6369C17.2502 13.4836 16.8537 13.4048 16.4533 13.4048Z"
                                                    fill="#333333" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_8476_16777">
                                                    <rect width="8.93784" height="8.93784" fill="white"
                                                        transform="translate(12.0295 12.0298)" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    @lang('labels.product_detail.overview')
                                </a>
                            </li>
                            <li class="login-dropdown-item flex items-center">
                                <a href="{{ route('dashboard.booking') }}" class="group hover:text-blueMediq">
                                    <div class="book-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M19.5 3.375H16.875V2.25C16.875 2.15054 16.8355 2.05516 16.7652 1.98484C16.6948 1.91451 16.5995 1.875 16.5 1.875C16.4005 1.875 16.3052 1.91451 16.2348 1.98484C16.1645 2.05516 16.125 2.15054 16.125 2.25V3.375H7.875V2.25C7.875 2.15054 7.83549 2.05516 7.76517 1.98484C7.69484 1.91451 7.59946 1.875 7.5 1.875C7.40054 1.875 7.30516 1.91451 7.23483 1.98484C7.16451 2.05516 7.125 2.15054 7.125 2.25V3.375H4.5C4.20163 3.375 3.91548 3.49353 3.7045 3.7045C3.49353 3.91548 3.375 4.20163 3.375 4.5V19.5C3.375 19.7984 3.49353 20.0845 3.7045 20.2955C3.91548 20.5065 4.20163 20.625 4.5 20.625H19.5C19.7984 20.625 20.0845 20.5065 20.2955 20.2955C20.5065 20.0845 20.625 19.7984 20.625 19.5V4.5C20.625 4.20163 20.5065 3.91548 20.2955 3.7045C20.0845 3.49353 19.7984 3.375 19.5 3.375ZM4.5 4.125H7.125V5.25C7.125 5.34946 7.16451 5.44484 7.23483 5.51516C7.30516 5.58549 7.40054 5.625 7.5 5.625C7.59946 5.625 7.69484 5.58549 7.76517 5.51516C7.83549 5.44484 7.875 5.34946 7.875 5.25V4.125H16.125V5.25C16.125 5.34946 16.1645 5.44484 16.2348 5.51516C16.3052 5.58549 16.4005 5.625 16.5 5.625C16.5995 5.625 16.6948 5.58549 16.7652 5.51516C16.8355 5.44484 16.875 5.34946 16.875 5.25V4.125H19.5C19.5995 4.125 19.6948 4.16451 19.7652 4.23484C19.8355 4.30516 19.875 4.40054 19.875 4.5V7.875H4.125V4.5C4.125 4.40054 4.16451 4.30516 4.23484 4.23484C4.30516 4.16451 4.40054 4.125 4.5 4.125ZM19.5 19.875H4.5C4.40054 19.875 4.30516 19.8355 4.23484 19.7652C4.16451 19.6948 4.125 19.5995 4.125 19.5V8.625H19.875V19.5C19.875 19.5995 19.8355 19.6948 19.7652 19.7652C19.6948 19.8355 19.5995 19.875 19.5 19.875Z"
                                                fill="#333333" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M17.0999 3.15002H19.4999C19.8579 3.15002 20.2013 3.29226 20.4545 3.54543C20.7077 3.7986 20.8499 4.14198 20.8499 4.50002V19.5C20.8499 19.8581 20.7077 20.2014 20.4545 20.4546C20.2013 20.7078 19.8579 20.85 19.4999 20.85H4.4999C4.14186 20.85 3.79848 20.7078 3.54531 20.4546C3.29213 20.2014 3.1499 19.8581 3.1499 19.5V4.50002C3.1499 4.14198 3.29213 3.7986 3.54531 3.54543C3.79848 3.29226 4.14186 3.15002 4.4999 3.15002H6.8999V2.25002C6.8999 2.09089 6.96312 1.93828 7.07564 1.82576C7.18816 1.71324 7.34077 1.65002 7.4999 1.65002C7.65903 1.65002 7.81165 1.71324 7.92417 1.82576C8.03669 1.93828 8.0999 2.09089 8.0999 2.25002V3.15002H15.8999V2.25002C15.8999 2.09089 15.9631 1.93828 16.0756 1.82576C16.1882 1.71324 16.3408 1.65002 16.4999 1.65002C16.659 1.65002 16.8116 1.71324 16.9242 1.82576C17.0367 1.93828 17.0999 2.09089 17.0999 2.25002V3.15002ZM6.8999 4.35002H4.4999C4.46012 4.35002 4.42197 4.36583 4.39384 4.39396C4.36571 4.42209 4.3499 4.46024 4.3499 4.50002V7.65002H19.6499V4.50002C19.6499 4.46024 19.6341 4.42209 19.606 4.39396C19.5778 4.36583 19.5397 4.35002 19.4999 4.35002H17.0999V5.25002C17.0999 5.40915 17.0367 5.56177 16.9242 5.67429C16.8116 5.78681 16.659 5.85002 16.4999 5.85002C16.3408 5.85002 16.1882 5.78681 16.0756 5.67429C15.9631 5.56177 15.8999 5.40915 15.8999 5.25002V4.35002H8.0999V5.25002C8.0999 5.40915 8.03669 5.56177 7.92417 5.67429C7.81165 5.78681 7.65903 5.85002 7.4999 5.85002C7.34077 5.85002 7.18816 5.78681 7.07564 5.67429C6.96312 5.56177 6.8999 5.40915 6.8999 5.25002V4.35002ZM4.4999 19.65H19.4999C19.5397 19.65 19.5778 19.6342 19.606 19.6061C19.6341 19.578 19.6499 19.5398 19.6499 19.5V8.85002H4.3499V19.5C4.3499 19.5398 4.36571 19.578 4.39384 19.6061C4.42197 19.6342 4.46012 19.65 4.4999 19.65ZM19.4999 3.37502C19.7983 3.37502 20.0844 3.49355 20.2954 3.70453C20.5064 3.91551 20.6249 4.20166 20.6249 4.50002V19.5C20.6249 19.7984 20.5064 20.0845 20.2954 20.2955C20.0844 20.5065 19.7983 20.625 19.4999 20.625H4.4999C4.20153 20.625 3.91539 20.5065 3.70441 20.2955C3.49343 20.0845 3.3749 19.7984 3.3749 19.5V4.50002C3.3749 4.20166 3.49343 3.91551 3.70441 3.70453C3.91539 3.49355 4.20153 3.37502 4.4999 3.37502H7.1249V2.25002C7.1249 2.15057 7.16441 2.05519 7.23474 1.98486C7.30506 1.91453 7.40045 1.87502 7.4999 1.87502C7.59936 1.87502 7.69474 1.91453 7.76507 1.98486C7.83539 2.05519 7.8749 2.15057 7.8749 2.25002V3.37502H16.1249V2.25002C16.1249 2.15057 16.1644 2.05519 16.2347 1.98486C16.3051 1.91453 16.4004 1.87502 16.4999 1.87502C16.5994 1.87502 16.6947 1.91453 16.7651 1.98486C16.8354 2.05519 16.8749 2.15057 16.8749 2.25002V3.37502H19.4999ZM4.4999 4.12502C4.40045 4.12502 4.30506 4.16453 4.23474 4.23486C4.16441 4.30519 4.1249 4.40057 4.1249 4.50002V7.87502H19.8749V4.50002C19.8749 4.40057 19.8354 4.30519 19.7651 4.23486C19.6947 4.16453 19.5994 4.12502 19.4999 4.12502H16.8749V5.25002C16.8749 5.34948 16.8354 5.44486 16.7651 5.51519C16.6947 5.58552 16.5994 5.62502 16.4999 5.62502C16.4004 5.62502 16.3051 5.58552 16.2347 5.51519C16.1644 5.44486 16.1249 5.34948 16.1249 5.25002V4.12502H7.8749V5.25002C7.8749 5.34948 7.83539 5.44486 7.76507 5.51519C7.69474 5.58552 7.59936 5.62502 7.4999 5.62502C7.40045 5.62502 7.30506 5.58552 7.23474 5.51519C7.16441 5.44486 7.1249 5.34948 7.1249 5.25002V4.12502H4.4999ZM4.4999 19.875H19.4999C19.5994 19.875 19.6947 19.8355 19.7651 19.7652C19.8354 19.6949 19.8749 19.5995 19.8749 19.5V8.62502H4.1249V19.5C4.1249 19.5995 4.16441 19.6949 4.23474 19.7652C4.30506 19.8355 4.40045 19.875 4.4999 19.875Z"
                                                fill="#333333" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M15.2901 11.5888C15.5172 11.8008 15.5294 12.1567 15.3175 12.3838L11.38 16.6026C11.2759 16.7141 11.131 16.7785 10.9784 16.7812C10.8259 16.7838 10.6789 16.7244 10.571 16.6165L8.60225 14.6477C8.38258 14.4281 8.38258 14.0719 8.60225 13.8523C8.82192 13.6326 9.17808 13.6326 9.39775 13.8523L10.9548 15.4093L14.495 11.6162C14.707 11.3891 15.0629 11.3768 15.2901 11.5888Z"
                                                fill="#333333" />
                                        </svg>
                                    </div>
                                    {{-- My Booking --}}
                                    @lang('labels.coupon.my_booking')

                                </a>
                            </li>
                            <li class="login-dropdown-item flex items-center">
                                <a href="{{ route('dashboard.wishlist') }}" class="group hover:text-blueMediq">
                                    <div class="book-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M12 20.4562C11.8518 20.4587 11.7047 20.4309 11.5676 20.3744C11.4306 20.318 11.3065 20.2342 11.2031 20.1281L3.41246 12.3375C2.90774 11.833 2.51116 11.231 2.24694 10.5681C1.98272 9.90524 1.8564 9.19547 1.8757 8.48214C1.895 7.76882 2.05952 7.06692 2.35921 6.41931C2.65889 5.77171 3.08745 5.19199 3.61871 4.71558C4.12786 4.26241 4.72328 3.91671 5.36927 3.69923C6.01527 3.48176 6.69853 3.39697 7.37808 3.44996C8.75882 3.53705 10.0597 4.12745 11.0343 5.10933L12 6.07496L13.1625 4.91246C13.6669 4.40774 14.2689 4.01116 14.9318 3.74694C15.5947 3.48272 16.3044 3.3564 17.0178 3.3757C17.7311 3.395 18.433 3.55952 19.0806 3.85921C19.7282 4.15889 20.3079 4.58745 20.7843 5.11871C21.2375 5.62786 21.5832 6.22328 21.8007 6.86927C22.0182 7.51527 22.1029 8.19853 22.05 8.87808C21.9629 10.2588 21.3725 11.5597 20.3906 12.5343L12.7968 20.1281C12.5841 20.3372 12.2982 20.4549 12 20.4562ZM7.03121 4.19058C5.9577 4.17668 4.91777 4.56456 4.11558 5.27808C3.66081 5.68617 3.29411 6.18278 3.03792 6.73751C2.78173 7.29223 2.64144 7.89341 2.62564 8.50423C2.60984 9.11506 2.71887 9.72268 2.94604 10.2899C3.17322 10.8571 3.51376 11.372 3.94683 11.8031L11.7375 19.6031C11.8076 19.6718 11.9018 19.7103 12 19.7103C12.0981 19.7103 12.1924 19.6718 12.2625 19.6031L19.8656 12C21.6375 10.2281 21.7968 7.36871 20.2218 5.61558C19.8137 5.16081 19.3171 4.79411 18.7624 4.53792C18.2077 4.28173 17.6065 4.14144 16.9957 4.12564C16.3849 4.10984 15.7772 4.21887 15.21 4.44604C14.6428 4.67322 14.1279 5.01376 13.6968 5.44683L12.2625 6.87183C12.2284 6.90699 12.1876 6.93494 12.1425 6.95402C12.0974 6.97311 12.0489 6.98295 12 6.98295C11.951 6.98295 11.9025 6.97311 11.8574 6.95402C11.8123 6.93494 11.7715 6.90699 11.7375 6.87183L10.5 5.63433C9.57953 4.7142 8.33267 4.19523 7.03121 4.19058Z"
                                                fill="#333333" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12.7968 20.1282C12.6846 20.2384 12.552 20.3233 12.408 20.3791C12.279 20.4291 12.1408 20.4557 11.9999 20.4563C11.8517 20.4588 11.7046 20.4309 11.5676 20.3745C11.4409 20.3223 11.3253 20.2467 11.2268 20.1518C11.2188 20.144 11.2108 20.1362 11.203 20.1282L3.41241 12.3375C2.90769 11.8331 2.51111 11.231 2.24689 10.5682C1.98267 9.90531 1.85635 9.19554 1.87565 8.48222C1.89495 7.76889 2.05947 7.06699 2.35916 6.41939C2.65884 5.77178 3.0874 5.19207 3.61866 4.71566C4.12781 4.26248 4.72323 3.91679 5.36923 3.69931C6.01522 3.48183 6.69848 3.39704 7.37803 3.45003C8.75877 3.53713 10.0596 4.12752 11.0343 5.10941L11.9999 6.07503L13.1624 4.91253C13.6669 4.40782 14.2689 4.01123 14.9318 3.74701C15.5946 3.48279 16.3044 3.35647 17.0177 3.37577C17.731 3.39508 18.4329 3.55959 19.0806 3.85928C19.7282 4.15896 20.3079 4.58752 20.7843 5.11878C21.2375 5.62793 21.5831 6.22335 21.8006 6.86935C22.0181 7.51534 22.1029 8.1986 22.0499 8.87816C21.9628 10.2589 21.3724 11.5598 20.3905 12.5344L18.5835 14.3414L14.4171 18.5079L12.7968 20.1282ZM20.6019 12.7473L13.0071 20.3421C12.7391 20.6056 12.3789 20.7542 12.0031 20.7563M10.9897 20.3391L3.20033 12.5497C2.66678 12.0164 2.24753 11.38 1.96821 10.6793C1.68889 9.97852 1.55536 9.22819 1.57576 8.4741C1.59617 7.72002 1.77009 6.97801 2.0869 6.2934C2.40371 5.60878 2.85675 4.99594 3.41837 4.49231C3.95769 4.01228 4.58923 3.64535 5.27351 3.41499C5.95708 3.18486 6.68004 3.09499 7.39914 3.15077C8.85214 3.24296 10.221 3.86444 11.2468 4.89767L11.9999 5.65077L12.9502 4.70045C13.4835 4.1669 14.1199 3.74766 14.8207 3.46833C15.5214 3.18901 16.2718 3.05548 17.0258 3.07588C17.7799 3.09629 18.5219 3.27021 19.2065 3.58702C19.8912 3.90383 20.504 4.35688 21.0076 4.91849C21.4877 5.45782 21.8546 6.08935 22.0849 6.77363C22.3151 7.45722 22.4049 8.18021 22.3492 8.89933C22.257 10.3523 21.6351 11.7215 20.6019 12.7473M7.03009 4.49065L7.02727 4.49064C6.02883 4.4777 5.0616 4.83838 4.31541 5.50187C3.89125 5.88262 3.54921 6.34589 3.31023 6.86336C3.07115 7.38103 2.94023 7.94204 2.92549 8.51206C2.91075 9.08208 3.01249 9.64911 3.22449 10.1784C3.43649 10.7078 3.75428 11.1883 4.15842 11.5905L11.9474 19.3889C11.9614 19.4022 11.9806 19.4104 11.9999 19.4104C12.0192 19.4104 12.0378 19.4029 12.0518 19.3895L19.6534 11.7879C21.324 10.1173 21.4565 7.43895 19.9986 5.81615C19.6178 5.39176 19.1542 5.04942 18.6366 4.81035C18.1189 4.57127 17.5579 4.44036 16.9879 4.42561C16.4179 4.41087 15.8508 4.51261 15.3215 4.72461C14.7922 4.93661 14.3117 5.2544 13.9094 5.65854L13.9082 5.65973L12.4756 7.08303C12.414 7.14595 12.3405 7.19603 12.2594 7.23037C12.1773 7.26512 12.089 7.28302 11.9999 7.28302C11.9108 7.28302 11.8225 7.26512 11.7404 7.23037C11.6592 7.19596 11.5855 7.14573 11.5239 7.08262L10.2878 5.84657C9.42338 4.98243 8.25236 4.49502 7.03009 4.49065ZM10.4999 5.63441L11.7374 6.87191C11.7715 6.90706 11.8123 6.93501 11.8574 6.9541C11.9025 6.97319 11.9509 6.98302 11.9999 6.98302C12.0489 6.98302 12.0973 6.97319 12.1424 6.9541C12.1875 6.93501 12.2283 6.90706 12.2624 6.87191L13.6968 5.44691C14.1278 5.01384 14.6427 4.67329 15.21 4.44612C15.7772 4.21894 16.3848 4.10992 16.9956 4.12571C17.6065 4.14151 18.2076 4.2818 18.7624 4.53799C19.3171 4.79418 19.8137 5.16088 20.2218 5.61566C21.7968 7.36878 21.6374 10.2282 19.8655 12L13.5436 18.3219L12.2624 19.6032C12.1923 19.6719 12.0981 19.7104 11.9999 19.7104C11.942 19.7104 11.8855 19.697 11.8344 19.6719C11.799 19.6544 11.7662 19.6313 11.7374 19.6032L3.94678 11.8032C3.51371 11.3721 3.17317 10.8572 2.946 10.29C2.71882 9.72275 2.60979 9.11513 2.62559 8.5043C2.64139 7.89348 2.78168 7.29231 3.03787 6.73758C3.29406 6.18285 3.66076 5.68625 4.11553 5.27816C4.91772 4.56463 5.95765 4.17675 7.03116 4.19066C8.33262 4.19531 9.57948 4.71427 10.4999 5.63441Z"
                                                fill="#333333" />
                                            <path
                                                d="M13.5436 18.3219L11.8344 19.6719C11.8855 19.697 11.942 19.7104 11.9999 19.7104C12.0981 19.7104 12.1923 19.6719 12.2624 19.6032L13.5436 18.3219Z"
                                                fill="#333333" />
                                            <path d="M18.5835 14.3414L14.4171 18.5079L20.6019 12.7473L18.5835 14.3414Z"
                                                fill="#333333" />
                                            <path
                                                d="M12.408 20.3791C12.279 20.4291 12.1408 20.4557 11.9999 20.4563C11.8517 20.4588 11.7046 20.4309 11.5676 20.3745C11.4409 20.3223 11.3253 20.2467 11.2268 20.1518L10.9897 20.3391C11.1837 20.5009 11.658 20.811 12.0031 20.7563L12.408 20.3791Z"
                                                fill="#333333" />
                                        </svg>
                                    </div>
                                    @lang('labels.coupon.wish_list')
                                </a>
                            </li>
                            {{-- <li class="login-dropdown-item flex items-center">
                                <a href="{{ route('dashboard.coupon') }}" class="group hover:text-blueMediq">
                                    <div class="book-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M2.8 4.35C1.91634 4.35 1.2 5.15589 1.2 6.15V7.23631C3.04683 7.82393 4.40005 9.73418 4.40005 12C4.40005 14.2658 3.04683 16.1761 1.2 16.7637V17.85C1.2 18.8441 1.91634 19.65 2.8 19.65H21.2C22.0837 19.65 22.8 18.8441 22.8 17.85V16.7637C20.9532 16.176 19.6 14.2658 19.6 12C19.6 9.73422 20.9532 7.824 22.8 7.23634V6.15C22.8 5.15589 22.0837 4.35 21.2 4.35H2.8ZM24 8.4V6.15C24 4.4103 22.7464 3 21.2 3H2.8C1.2536 3 0 4.4103 0 6.15V8.4C1.76731 8.4 3.20005 10.0118 3.20005 12C3.20005 13.9882 1.76736 15.6 4.88281e-05 15.6L0 17.85C0 19.5897 1.2536 21 2.8 21H21.2C22.7464 21 24 19.5897 24 17.85V15.6C22.2327 15.6 20.8 13.9882 20.8 12C20.8 10.0118 22.2327 8.40003 24 8.4Z"
                                                fill="#333333" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M7.87658 7.87658C8.1177 7.63546 8.44472 7.5 8.78571 7.5C9.12671 7.5 9.45373 7.63546 9.69485 7.87658C9.93597 8.1177 10.0714 8.44472 10.0714 8.78571C10.0714 9.12671 9.93597 9.45373 9.69485 9.69485C9.45373 9.93597 9.12671 10.0714 8.78571 10.0714C8.44472 10.0714 8.1177 9.93597 7.87658 9.69485C7.63546 9.45373 7.5 9.12671 7.5 8.78571C7.5 8.44472 7.63546 8.1177 7.87658 7.87658ZM16.3117 7.68829C16.5628 7.93934 16.5628 8.34637 16.3117 8.59743L8.59743 16.3117C8.34637 16.5628 7.93934 16.5628 7.68829 16.3117C7.43724 16.0607 7.43724 15.6536 7.68829 15.4026L15.4026 7.68829C15.6536 7.43724 16.0607 7.43724 16.3117 7.68829ZM14.3051 14.3051C14.5463 14.064 14.8733 13.9286 15.2143 13.9286C15.5553 13.9286 15.8823 14.064 16.1234 14.3051C16.3645 14.5463 16.5 14.8733 16.5 15.2143C16.5 15.5553 16.3645 15.8823 16.1234 16.1234C15.8823 16.3645 15.5553 16.5 15.2143 16.5C14.8733 16.5 14.5463 16.3645 14.3051 16.1234C14.064 15.8823 13.9286 15.5553 13.9286 15.2143C13.9286 14.8733 14.064 14.5463 14.3051 14.3051Z"
                                                fill="#333333" />
                                        </svg>
                                    </div>
                                    @lang('labels.menu.coupon')

                                </a>
                            </li> --}}
                            <li class="login-dropdown-item flex items-center">
                                <a href="{{ route('dashboard.myacc.basicinfo') }}" class="group hover:text-blueMediq">
                                    <div class="book-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M12 1.5C9.9233 1.5 7.89323 2.11581 6.16652 3.26957C4.4398 4.42332 3.09399 6.0632 2.29927 7.98182C1.50455 9.90045 1.29661 12.0116 1.70176 14.0484C2.1069 16.0852 3.10693 17.9562 4.57538 19.4246C6.04383 20.8931 7.91475 21.8931 9.95156 22.2982C11.9884 22.7034 14.0996 22.4955 16.0182 21.7007C17.9368 20.906 19.5767 19.5602 20.7304 17.8335C21.8842 16.1068 22.5 14.0767 22.5 12C22.4969 9.21616 21.3897 6.54722 19.4212 4.57875C17.4528 2.61029 14.7838 1.50306 12 1.5ZM5.79135 19.3941C6.41454 18.2968 7.31742 17.3842 8.40804 16.7493C9.49866 16.1145 10.7381 15.78 12 15.78C13.2619 15.78 14.5013 16.1145 15.592 16.7493C16.6826 17.3842 17.5855 18.2968 18.2087 19.3941C16.4708 20.8575 14.2719 21.66 12 21.66C9.72809 21.66 7.5292 20.8575 5.79135 19.3941ZM18.8429 18.8113C17.7995 17.0669 16.1267 15.7892 14.1693 15.2413C15.0794 14.7573 15.8015 13.9829 16.2207 13.0412C16.6399 12.0995 16.7321 11.0446 16.4827 10.0444C16.2333 9.04428 15.6566 8.15625 14.8443 7.52164C14.032 6.88704 13.0308 6.54231 12 6.54231C10.9692 6.54231 9.96802 6.88704 9.15572 7.52164C8.34343 8.15625 7.7667 9.04428 7.51728 10.0444C7.26787 11.0446 7.3601 12.0995 7.77931 13.0412C8.19851 13.9829 8.9206 14.7573 9.8307 15.2413C7.87328 15.7892 6.20055 17.0669 5.15715 18.8113C3.80963 17.459 2.89304 15.7377 2.5231 13.8648C2.15316 11.9919 2.34648 10.0513 3.07864 8.28822C3.81079 6.5251 5.04896 5.01845 6.63679 3.95852C8.22462 2.8986 10.0909 2.33292 12 2.33292C13.9091 2.33292 15.7754 2.8986 17.3632 3.95852C18.951 5.01845 20.1892 6.5251 20.9214 8.28822C21.6535 10.0513 21.8468 11.9919 21.4769 13.8648C21.107 15.7377 20.1904 17.459 18.8429 18.8113ZM12 14.94C11.2524 14.94 10.5216 14.7183 9.89995 14.303C9.27833 13.8876 8.79384 13.2972 8.50774 12.6065C8.22164 11.9158 8.14678 11.1558 8.29263 10.4226C8.43849 9.68931 8.7985 9.01578 9.32714 8.48713C9.85578 7.95849 10.5293 7.59848 11.2626 7.45263C11.9958 7.30678 12.7558 7.38163 13.4465 7.66773C14.1372 7.95383 14.7276 8.43833 15.143 9.05994C15.5583 9.68156 15.78 10.4124 15.78 11.16C15.78 12.1625 15.3818 13.124 14.6729 13.8329C13.964 14.5417 13.0025 14.94 12 14.94Z"
                                                fill="#333333" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12 1.19995H12.0003C14.8636 1.2031 17.6087 2.34192 19.6333 4.36657C21.658 6.39122 22.7968 9.13633 22.7999 11.9996V11.9999C22.7999 14.136 22.1665 16.2241 20.9798 18.0001C19.7931 19.7762 18.1064 21.1604 16.1329 21.9778C14.1595 22.7953 11.988 23.0091 9.89298 22.5924C7.79798 22.1757 5.87361 21.1471 4.3632 19.6367C2.8528 18.1263 1.8242 16.2019 1.40748 14.1069C0.990755 12.0119 1.20463 9.84041 2.02206 7.86697C2.83948 5.89353 4.22375 4.2068 5.9998 3.02008C7.77585 1.83336 9.86392 1.19995 12 1.19995ZM22.4999 11.9999C22.4999 14.0767 21.8841 16.1067 20.7304 17.8334C19.5766 19.5602 17.9368 20.906 16.0181 21.7007C14.0995 22.4954 11.9883 22.7033 9.95151 22.2982C7.91471 21.893 6.04379 20.893 4.57533 19.4246C3.10688 17.9561 2.10686 16.0852 1.70171 14.0484C1.29657 12.0116 1.5045 9.9004 2.29922 7.98177C3.09394 6.06315 4.43975 4.42327 6.16647 3.26952C7.89318 2.11577 9.92325 1.49995 12 1.49995C14.7838 1.50301 17.4527 2.61024 19.4212 4.57871C21.3897 6.54717 22.4969 9.21611 22.4999 11.9999ZM5.79131 19.394C7.52915 20.8574 9.72804 21.6599 12 21.6599C14.2719 21.6599 16.4708 20.8574 18.2086 19.394C17.5854 18.2967 16.6825 17.3841 15.5919 16.7493C14.5013 16.1144 13.2619 15.78 12 15.78C10.738 15.78 9.49862 16.1144 8.40799 16.7493C7.31737 17.3841 6.41449 18.2967 5.79131 19.394ZM17.8192 19.3253C17.2294 18.3705 16.4131 17.5744 15.441 17.0086C14.3962 16.4004 13.2089 16.08 12 16.08C10.791 16.08 9.60371 16.4004 8.55892 17.0086C7.58685 17.5744 6.77047 18.3705 6.18072 19.3253C7.83223 20.641 9.88339 21.3599 12 21.3599C14.1165 21.3599 16.1677 20.641 17.8192 19.3253ZM18.6794 18.5498C18.7355 18.6358 18.7899 18.7229 18.8428 18.8113C18.9159 18.7379 18.9878 18.6635 19.0583 18.5879C20.2882 17.2717 21.127 15.636 21.4769 13.8647C21.8468 11.9918 21.6535 10.0513 20.9213 8.28817C20.1892 6.52505 18.951 5.0184 17.3632 3.95848C15.7753 2.89855 13.909 2.33287 12 2.33287C10.0909 2.33287 8.22457 2.89855 6.63674 3.95848C5.04891 5.0184 3.81074 6.52505 3.07859 8.28817C2.34643 10.0513 2.15312 11.9918 2.52305 13.8647C2.87292 15.636 3.71173 17.2717 4.94159 18.5879C5.01215 18.6635 5.08399 18.7379 5.1571 18.8113C5.20996 18.7229 5.26442 18.6358 5.32046 18.5498C6.29589 17.054 7.74702 15.9314 9.43761 15.3624C9.56725 15.3187 9.6983 15.2783 9.83065 15.2413C9.70981 15.177 9.59228 15.1076 9.47834 15.0334C8.73414 14.5487 8.1428 13.8578 7.77926 13.0411C7.36005 12.0994 7.26782 11.0446 7.51724 10.0444C7.76665 9.04423 8.34338 8.1562 9.15567 7.52159C9.96797 6.88699 10.9692 6.54226 12 6.54226C13.0308 6.54226 14.0319 6.88699 14.8442 7.52159C15.6565 8.1562 16.2333 9.04423 16.4827 10.0444C16.7321 11.0446 16.6399 12.0994 16.2206 13.0411C15.8571 13.8578 15.2658 14.5487 14.5216 15.0334C14.4076 15.1076 14.2901 15.177 14.1693 15.2413C14.3016 15.2783 14.4327 15.3187 14.5623 15.3624C16.2529 15.9314 17.704 17.054 18.6794 18.5498ZM18.8916 18.3265C20.0546 17.061 20.8485 15.4976 21.1825 13.8066C21.541 11.9919 21.3537 10.1116 20.6443 8.40322C19.9348 6.69486 18.7351 5.235 17.1966 4.20799C15.6581 3.18098 13.8498 2.63287 12 2.63287C10.1501 2.63287 8.34181 3.18098 6.8033 4.20799C5.26478 5.235 4.06507 6.69486 3.35565 8.40322C2.64623 10.1116 2.45892 11.9919 2.81737 13.8066C3.15136 15.4976 3.94526 17.061 5.10832 18.3265C6.07751 16.8679 7.48538 15.7578 9.12457 15.1546C8.42128 14.6481 7.86086 13.9621 7.50519 13.1631C7.05876 12.1603 6.96054 11.0369 7.22615 9.97181C7.49176 8.90669 8.10594 7.961 8.97098 7.28519C9.83602 6.60937 10.9022 6.24226 12 6.24226C13.0977 6.24226 14.1639 6.60937 15.0289 7.28519C15.894 7.961 16.5081 8.90669 16.7738 9.97181C17.0394 11.0369 16.9411 12.1603 16.4947 13.1631C16.139 13.9621 15.5786 14.6481 14.8753 15.1546C16.5145 15.7578 17.9224 16.8679 18.8916 18.3265ZM10.0666 14.0535C10.6389 14.4358 11.3117 14.6399 12 14.6399C12.9229 14.6399 13.8081 14.2733 14.4607 13.6207C15.1133 12.9681 15.48 12.0829 15.48 11.1599C15.48 10.4717 15.2759 9.79885 14.8935 9.22656C14.5111 8.65428 13.9676 8.20824 13.3317 7.94485C12.6958 7.68146 11.9961 7.61254 11.321 7.74682C10.646 7.88109 10.0259 8.21253 9.53922 8.69922C9.05254 9.1859 8.7211 9.80598 8.58682 10.481C8.45255 11.1561 8.52146 11.8558 8.78485 12.4917C9.04825 13.1276 9.49429 13.6711 10.0666 14.0535ZM9.8999 14.3029C10.5215 14.7183 11.2523 14.9399 12 14.9399C13.0025 14.9399 13.9639 14.5417 14.6728 13.8328C15.3817 13.1239 15.78 12.1625 15.78 11.1599C15.78 10.4123 15.5583 9.68151 15.1429 9.05989C14.7276 8.43828 14.1372 7.95378 13.4465 7.66768C12.7558 7.38159 11.9958 7.30673 11.2625 7.45258C10.5293 7.59843 9.85573 7.95844 9.32709 8.48709C8.79845 9.01573 8.43844 9.68926 8.29259 10.4225C8.14673 11.1558 8.22159 11.9158 8.50769 12.6065C8.79379 13.2972 9.27828 13.8876 9.8999 14.3029Z"
                                                fill="#333333" />
                                        </svg>
                                    </div>
                                    @lang('labels.member_dashboard.my_account')
                                </a>
                            </li>
                            <li class="py-[20px] text-center border-t border-t-[#E4E4E4]">
                                <button class="text-darkgray hover:text-orangeMediq sign-out" id="sign-out">
                                    @lang('labels.menu.sign-out')</button>
                            </li>
                        </ul>
                    </div>
            </div>
        @else
            <div
                class="h-full register-btn before-login-container flex items-center hover:bg-white hover:rounded-[100px] px-[20px] py-[10px] cursor-pointer">
                <img src="{{ asset('frontend/img/me-sign-in.svg') }}">
                <div class="before-login sign-in-name ml-[8px]">
                    <button class="whitespace-nowrap">@lang('labels.menu.hi_register')</button>
                    {{-- <br>
                    @lang('labels.menu.your_account') --}}
                </div>
            </div>
            @endif
        </div>
    </div>
    {{-- <div class="fixed overflow-y-auto left-0 top-0 h-[100vh] w-full bg-white z-[1001] p-5 lg:hidden pb-[50px] search-list-container hidden"
        id="search-list-container">
        <div class="me-search-bar-container flex items-center justify-start">
            <span class="back-arrow-btn">
                <img src="{{ asset('frontend/img/cross-arrow.svg') }}" alt="cross-arrow img"
                    class="cross-arrow-img">
            </span>
            <form
                class="me-search-bar flex items-center border border-[#E4E4E4] bg-[#F5F5F5] rounded-[100px] h-[48px]">
                <input type="text" id="search-item" placeholder="Search product, category or brand "
                    class="w-[351px] p-[20px] bg-transparent h-[48px] m-search-input">
                <div class="divider bg-[#E4E4E4] w-[1px] h-1/2 hidden"></div>
                <div class="search-dropdown ml-[17px] relative w-[275px]">
                    <p class="search-selected inline-flex md:w-full h-[48px] items-center justify-start hidden">
                        <img src="{{ asset('frontend/img/me-hlocation-icon.svg') }}" alt="location"
                            class="mr-4">
                        <span class="text-[#A3A3A3] advance-search">@lang('labels.header.advance_search')</span>
                        <input type="text" hidden="" id="search_selected_item">
                    </p>
                    <div class="search-dropdown-list ml-[17px] hidden">
                        <button type="button"
                            class="text-please-12 text-titletext font-semibold pb-[3px] border-b border-b-wholebg w-full text-left hidden search_clear_all">
                            Clear All
                        </button>
                    </div>
                    <a href=""
                        class="ml-auto mr-[0.5rem] w-[40px] h-[40px] bg-[#2FA9B5] rounded-[50%] flex items-center justify-center">
                        <img src="{{ asset('frontend/img/me-hsearch-icon.svg') }}" alt="search icon"
                            class="search-icon">
                    </a>

                </div>
            </form>
        </div>
        <div class="search-lists py-[20px]">
            <div class="recent-search-hover">
                <h6 class="mb-[4px] helvetica-normal me-body18 font-medium">Most Popular</h6>
                <div class="flex flex-wrap items-center justify-start recent-search-items">
                    <span
                        class="bg-far px-[20px] py-[8px] mr-[8px] rounded-[50px] helvetica-normal font-medium me-body18 text-darkgray mb-4 border border-far hover:border-blueMediq hover:text-blueMediq">vaccine
                    </span>
                    <span
                        class="bg-far px-[20px] py-[8px] mr-[8px] rounded-[50px] helvetica-normal font-medium me-body18 text-darkgray mb-4 border border-far hover:border-blueMediq hover:text-blueMediq">female
                    </span>
                    <span
                        class="bg-far px-[20px] py-[8px] mr-[8px] rounded-[50px] helvetica-normal font-medium me-body18 text-darkgray mb-4 border border-far hover:border-blueMediq hover:text-blueMediq">sick
                    </span>
                    <span
                        class="bg-far px-[20px] py-[8px] mr-[8px] rounded-[50px] helvetica-normal font-medium me-body18 text-darkgray mb-4 border border-far hover:border-blueMediq hover:text-blueMediq">health
                        plan </span>
                    <span
                        class="bg-far px-[20px] py-[8px] mr-[8px] rounded-[50px] helvetica-normal font-medium me-body18 text-darkgray mb-4 border border-far hover:border-blueMediq hover:text-blueMediq">travel
                        vaccine </span>
                </div>

            </div>
            <div class="recent-search-type hidden">
                <div class="recent-search-container">
                    <h6 class="mb-[4px] helvetica-normal me-body18 font-medium text-lightgray">Recent Search</h6>
                    <div class="flex flex-wrap items-center justify-start recent-search-items">
                        <span
                            class="bg-far px-[20px] py-[8px] mr-[8px] rounded-[50px] helvetica-normal font-medium me-body18 text-darkgray mb-4 border border-far hover:border-blueMediq hover:text-blueMediq">vaccine
                            <span class="rsi-close">×</span></span>
                    </div>
                </div>
                <div class="recent-search-category mt-[12px]">
                    <h6 class="mb-[4px] helvetica-normal me-body18 font-medium text-lightgray">Category</h6>
                    <div class="flex flex-wrap items-center justify-start recent-search-items pl-[20px]">
                        <p
                            class="flex items-center justify-between w-full mb-[16px] helvetica-normal font-medium me-body18 text-darkgray">
                            Annual Body Health Check Plan <img src="{{ asset('frontend/img/cross-arrow.svg') }}"
                                alt="cross-arrow img" class="cross-arrow-img"></p>
                    </div>
                </div>
                <div class="recent-search-brand mt-[2px]">
                    <h6 class="mb-[4px] helvetica-normal me-body18 font-medium text-lightgray">Brand</h6>
                    <div class="flex flex-wrap items-center justify-start recent-search-items pl-[20px]">
                        <p
                            class="flex items-center justify-between w-full mb-[16px] helvetica-normal font-medium me-body18 text-darkgray">
                            Annual Body Health Check Plan <img src="{{ asset('frontend/img/cross-arrow.svg') }}"
                                alt="cross-arrow img" class="cross-arrow-img"></p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

</div>
<div class="fixed overflow-y-auto left-0 top-0 h-[100vh] w-full bg-white z-[1001] p-5 lg:hidden pb-[50px] search-list-container hidden"
    id="search-list-container">
    <div class="me-search-bar-container flex items-center justify-start">
        <span class="back-arrow-btn">
            <img src="{{ asset('frontend/img/cross-arrow.svg') }}" alt="cross-arrow img" class="cross-arrow-img" />
        </span>
        <form class="me-search-bar flex items-center border border-[#E4E4E4] bg-[#F5F5F5] rounded-[100px] h-[48px]">
            <input type="text" id="search-item" placeholder="Search product, category or brand"
                class="w-[351px] p-[20px] bg-transparent h-[48px] m-search-input" />
            <div class="divider bg-[#E4E4E4] w-[1px] h-1/2 hidden"></div>
            <div class="search-dropdown ml-[17px] relative w-[275px]">
                <p class="search-selected inline-flex md:w-full h-[48px] items-center justify-start hidden">
                    <img src="{{ asset('frontend/img/me-hlocation-icon.svg') }}" alt="location" class="mr-4" />
                    <span class="text-[#A3A3A3] advance-search">Advance Search</span>
                    <input type="text" hidden="" id="search_selected_item" />
                </p>
                <div class="search-dropdown-list ml-[17px] hidden">
                    <button type="button"
                        class="text-please-12 text-titletext font-semibold pb-[3px] border-b border-b-wholebg w-full text-left hidden search_clear_all">
                        Clear All
                    </button>
                </div>
                <a href="#"
                    class="ml-auto mr-[0.5rem] w-[40px] h-[40px] bg-[#2FA9B5] rounded-[50%] flex items-center justify-center">
                    <img src="{{ asset('frontend/img/me-hsearch-icon.svg') }}" alt="search icon" class="search-icon" />
                </a>

            </div>
        </form>
    </div>
    <div class="search-lists py-[20px]">
        <div class="recent-search-hover">
            <!-- <h6 class="mb-[4px] helvetica-normal me-body18 font-medium">Most Popular</h6>
        <div class="flex flex-wrap items-center justify-start recent-search-items">
          <span
            class="bg-far px-[20px] py-[8px] mr-[8px] rounded-[50px] helvetica-normal font-medium me-body18 text-darkgray mb-4 border border-far hover:border-blueMediq hover:text-blueMediq">vaccine
          </span>
          <span
            class="bg-far px-[20px] py-[8px] mr-[8px] rounded-[50px] helvetica-normal font-medium me-body18 text-darkgray mb-4 border border-far hover:border-blueMediq hover:text-blueMediq">female
          </span>
          <span
            class="bg-far px-[20px] py-[8px] mr-[8px] rounded-[50px] helvetica-normal font-medium me-body18 text-darkgray mb-4 border border-far hover:border-blueMediq hover:text-blueMediq">sick
          </span>
          <span
            class="bg-far px-[20px] py-[8px] mr-[8px] rounded-[50px] helvetica-normal font-medium me-body18 text-darkgray mb-4 border border-far hover:border-blueMediq hover:text-blueMediq">health
            plan </span>
          <span
            class="bg-far px-[20px] py-[8px] mr-[8px] rounded-[50px] helvetica-normal font-medium me-body18 text-darkgray mb-4 border border-far hover:border-blueMediq hover:text-blueMediq">travel
            vaccine </span>
        </div> -->
            <!-- <div class="pt-[2.5rem] mt-[20px]">
          <div class="flex flex-wrap items-center">
            <div
              class="border border-[#E4E4E4] rounded-[20px] p-5 relative leaderboard-card--list font-secondary w-full md:w-[48%]"
              style=" background-image: url(./img/me-plus.png);
              background-repeat: no-repeat;">
              <img src="./img/me-crown.svg" alt="crown" class="mx-auto absolute left-1/2 top-[-2.5rem]">
              <h4 class="pb-4 border-b border-b-dashed font-bold text-blueMediq me-title23">Best-selling
                Comprehensive
                Body Check</h4>
              <div class="pt-5 flex xl:gap-5">
                <div class="relative">
                  <p
                    class="font-bold text-white me-body18 w-[30px] h-[30px] bg-blueMediq flex justify-center items-center absolute top-0 left-0 rounded-tl-[8px] rounded-br-[8px]">
                    1</p>
                  <img src="./img/leaderboard-item.png" alt="leaderboard item" class="rounded-[8px]">
                </div>
                <div class="font-secondary pl-5 xl:pl-0">
                  <p class="font-medium text-darkgray me-body18">Annual Health Check Plan</p>
                </div>
              </div>
            </div>
            <div
              class="border border-[#E4E4E4] rounded-[20px] p-5 relative leaderboard-card--list font-secondary mt-[60px] md:mt-0 w-full md:w-[48%]"
              style=" background-image: url(./img/me-plus.png);
              background-repeat: no-repeat;">
              <img src="./img/me-crown.svg" alt="crown" class="mx-auto absolute left-1/2 top-[-2.5rem]">
              <h4 class="pb-4 border-b border-b-dashed font-bold text-blueMediq me-title23">Best-selling
                Comprehensive
                Body Check</h4>
              <div class="pt-5 flex xl:gap-5">
                <div class="relative">
                  <p
                    class="font-bold text-white me-body18 w-[30px] h-[30px] bg-blueMediq flex justify-center items-center absolute top-0 left-0 rounded-tl-[8px] rounded-br-[8px]">
                    1</p>
                  <img src="./img/leaderboard-item.png" alt="leaderboard item" class="rounded-[8px]">
                </div>
                <div class="font-secondary pl-5 xl:pl-0">
                  <p class="font-medium text-darkgray me-body18">Annual Health Check Plan</p>
                </div>
              </div>
            </div>
          </div>
        </div> -->
        </div>
        <div class="recent-search-type hidden">
            {{-- <div class="recent-search-container">
                <h6 class="mb-[4px] helvetica-normal me-body18 font-medium text-lightgray">Recent Search</h6>
                <div class="flex flex-wrap items-center justify-start recent-search-items">
                    <span
                        class="bg-far px-[20px] py-[8px] mr-[8px] rounded-[50px] helvetica-normal font-medium me-body18 text-darkgray mb-4 border border-far hover:border-blueMediq hover:text-blueMediq">vaccine
                        <span class="rsi-close">&times;</span></span>
                    <span
                        class="bg-far px-[20px] py-[8px] mr-[8px] rounded-[50px] helvetica-normal font-medium me-body18 text-darkgray mb-4 border border-far hover:border-blueMediq hover:text-blueMediq">female
                        <span class="rsi-close">&times;</span></span>
                    <span
                        class="bg-far px-[20px] py-[8px] mr-[8px] rounded-[50px] helvetica-normal font-medium me-body18 text-darkgray mb-4 border border-far hover:border-blueMediq hover:text-blueMediq">sick
                        <span class="rsi-close">&times;</span></span>
                    <span
                        class="bg-far px-[20px] py-[8px] mr-[8px] rounded-[50px] helvetica-normal font-medium me-body18 text-darkgray mb-4 border border-far hover:border-blueMediq hover:text-blueMediq">health
                        plan <span class="rsi-close">&times;</span></span>
                    <span
                        class="bg-far px-[20px] py-[8px] mr-[8px] rounded-[50px] helvetica-normal font-medium me-body18 text-darkgray mb-4 border border-far hover:border-blueMediq hover:text-blueMediq">travel
                        vaccine <span class="rsi-close">&times;</span></span>
                </div>
            </div> --}}
            <div id="data">

            </div>

        </div>
    </div>
</div>
</div>
{{--  --}}

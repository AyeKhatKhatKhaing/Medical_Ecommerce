@extends('frontend.layouts.master')
@include('frontend.seo', ['seo' => isset($contact_us) ? $contact_us : ''])
@section('content')
    {{-- <nav component-name="about-us-menu" class="about-us-menu w-full z-[4] ">
        <ul class="about-us-menu-container flex justify-start items-center bg-blueMediq">
        
            
            <li class="about-us-menu--item">
                <a href="#" data-id="overview" class="about-us-menu--link text-light p-2 lg:py-[14px] lg:px-[20px] helvetica-normal me-body18 inline-block ">@lang('labels.contact.about_mediq')</a>
            </li>
            
            <li class="about-us-menu--item">
                <a href="{{ route('contact') }}" data-id="overview" class="about-us-menu--link text-light p-2 lg:py-[14px] lg:px-[20px] helvetica-normal me-body18 inline-block active">@lang('labels.contact_us')</a>
            </li>
            
            <li class="about-us-menu--item">
                <a href="#" data-id="overview" class="about-us-menu--link text-light p-2 lg:py-[14px] lg:px-[20px] helvetica-normal me-body18 inline-block ">@lang('labels.menu.review')</a>
            </li>
            
            <li class="about-us-menu--item">
                <a href="#" data-id="overview" class="about-us-menu--link text-light p-2 lg:py-[14px] lg:px-[20px] helvetica-normal me-body18 inline-block ">@lang('labels.product_detail.help_center')</a>
            </li>
            
        
        </ul>
    </nav> --}}
    @include('frontend.faq.nav')
    <main>
        <section class="about-us-banner object-cover object-center text-darkgray relative">
            <img src="{{ isset($contact) ? $contact->contact_us_header_img : asset('frontend/img/about-us-banner.png') }}" alt=""
                class="w-full h-auto min-h-[400px] align-middle object-cover object-center">

            <div class="about-us-banner-container absolute top-0 right-0 bottom-0 left-0">
                <div
                    class="about-us-banner-card bg-light pt-5 pr-5 pb-8 pl-8 xl:pt-[30px] xl:pr-[30px] xl:pb-14 xl:pl-14 max-w-md xl:max-w-[38.75rem] rounded-xl rounded-bl-[50px] xl:rounded-[20px] xl:rounded-bl-[100px] absolute top-20 sm:top-[100px] lg:top-[58px] right-0">
                    <h1 class="text-blueMediq me-head32 font-bold"> {{ langbind($contact, 'contact_title') }}</h1>
                    <div class="me-body-20 mt-1 xl:mt-2 about-us-banner-title">
                        {!! langbind($contact, 'contact_description') !!}
                        <a class="inline-block leading-[140%] ml-1 underline about-us-banner-more-btn">@lang('labels.about.more')</a>
                    </div>
                </div>
            </div>
            {{-- <div class="about-us-banner-container absolute top-0 right-0 bottom-0 left-0">
                <div class="about-us-banner-card bg-light @@customBackground pt-5 pr-5 pb-8 pl-5 xs:pl-8 xl:pt-[30px] xl:pr-[30px] xl:pb-14 xl:pl-14 max-w-md xl:max-w-[38.75rem] rounded-xl rounded-bl-[50px] xl:rounded-[20px] xl:rounded-bl-[100px] absolute top-6 5xs:top-12 2xs:top-20 sm:top-[100px] lg:top-[58px] right-0">
                  <h1 class="text-blueMediq me-head32 font-bold px-5">{{ langbind($contact, 'contact_title') }}</h1>
                  <p class="me-body-20 mt-1 xl:mt-2 px-5 about-us-banner-title">
                    We provide convenient consultation services and are always happy to assist you. If you have any inquiries regarding online shopping and account information, please feel free to contact us at any time. We provide convenient consultation services and are always happy to assist you. If you have any inquiries regarding online shopping and account information, please feel free to contact us at any time. We provide convenient consultation services and are always happy to assist you. If you have any inquiries regarding online shopping and account information, please feel free to contact us at any time. We provide convenient consultation services and are always happy to assist you. If you have any inquiries regarding online shopping and account information, please feel free to contact us at any time. 
                <a class="inline-block leading-[140%] ml-1 underline about-us-banner-more-btn">More</a></p>      
                </div>
            </div> --}}
        </section>

        <section class="contact-items text-darkgray">
            <div class="contact-us-container text-center py-10 xl:py-20 6xl:py-[7.5rem]">
                <div class="contact-items-row max-w-[67.75rem] mx-auto">
                    <div class="contact-items-header">
                        <h2 class="contact-items-title me-head32 font-bold">@lang('labels.contact_us')</h2>
                        <div class="contact-items-description me-body18 mt-2 lg:mt-4 xl:mt-5 6xl:mt-8">
                            {{-- <span class="block">Monday-Friday 10am - 6pm | Saturday 10am - 1pm</span>
                            <span class="block">Closed on Sun & Public Holiday</span> --}}
                            {{-- {!! $contact_us ? $contact_us->time : '-' !!} --}}
                            {!! langbind($contact_us, 'time') !!}
                        </div>
                    </div>


                    <div
                        class="contact-items-body flex flex-col sm:flex-row items-center sm:items-baseline justify-center xl:justify-between sm:flex-wrap lg:flex-nowrap mt-8 6xl:mt-12">

                        {{-- <div
                            class="contact-items-col w-[14.688rem] h-auto text-center mt-8 first:mt-0 sm:[&:nth-child(2)]:mt-0 lg:mt-0">
                            <div class="contact-items-icon">
                                <img src="./img/live-chat.svg" alt="live chat"
                                    class="mx-auto w-auto h-auto align-middle object-cover object-center">
                            </div>
                            <h3 class="contact-items-caption text-blueMediq me-body23 font-bold mt-4 xl:mt-8 6xl:mt-10">Live
                                Chat</h3>

                            <a href="#" class="me-body18 underline inline-block xl:mt-4 6xl:mt-5">Chat Now</a>
                        </div> --}}

                        <div
                            class="contact-items-col w-[14.688rem] h-auto text-center mt-8 first:mt-0 sm:[&:nth-child(2)]:mt-0 lg:mt-0">
                            <div class="contact-items-icon">
                                <img src="{{ isset($contact_us) && $contact_us->email_logo ? $contact_us->email_logo : asset('frontend/img/email-enquiry.svg') }}" alt="email enquiry"
                                    class="mx-auto w-auto h-auto align-middle object-cover object-center">
                            </div>
                            <h3 class="contact-items-caption text-blueMediq me-body23 font-bold mt-4 xl:mt-8 6xl:mt-10">
                                {{ langbind($contact_us, 'email_title') }}</h3>

                            <a href="mailto:{{ isset($contact_us) ? $contact_us->email : 'enquiry@mediq.com.hk' }}"
                                class="me-body18 underline inline-block xl:mt-4 6xl:mt-5">{{ isset($contact_us) ? $contact_us->email : 'enquiry@mediq.com.hk' }}</a>
                        </div>

                        <div
                        class="contact-items-col w-[14.688rem] h-auto text-center mt-8 first:mt-0 sm:[&:nth-child(2)]:mt-0 lg:mt-0">
                        <div class="contact-items-icon">
                            <img src="{{ isset($contact_us) ? $contact_us->whats_up_logo : asset('frontend/img/whatsapp-icon-contact-us.svg') }}" alt="whatsapp"
                                class="mx-auto w-auto h-auto align-middle object-cover object-center">
                        </div>
                        <h3 class="contact-items-caption text-blueMediq me-body23 font-bold mt-4 xl:mt-8 6xl:mt-10">
                            {{ langbind($contact_us, 'whats_up_title') }}</h3>

                        {{-- <a href="https://wa.me/ {{ isset($contact_us) ? $contact_us->whats_up : '-' }}" --}}
                        <a href="https://api.whatsapp.com/send?phone={{ isset($contact_us) ? $contact_us->whats_up : '85298124646' }}"
                            class="me-body18 underline inline-block xl:mt-4 6xl:mt-5">
                            {{-- {{ isset($contact_us) ? $contact_us->whats_up : '-' }} --}}
                            @php
                            $phoneNumber = isset($contact_us) ? $contact_us->whats_up : '85298124646' ; // Replace this with your actual phone number variable
                            $formattedPhoneNumber = substr($phoneNumber, 3, 4) . ' ' . substr($phoneNumber, 7);
                            @endphp
                            {{ $formattedPhoneNumber }}
                            {{-- ({{ substr(isset($contact_us) ? $contact_us->whats_up : '-' , 0, 3) }}) {{ substr(isset($contact_us) ? $contact_us->whats_up : '-' , 4, 3) }} {{ substr(isset($contact_us) ? $contact_us->whats_up : '-' , 5) }} --}}
                        </a>
                      </div>

                        <div
                            class="contact-items-col w-[14.688rem] h-auto text-center mt-8 first:mt-0 sm:[&:nth-child(2)]:mt-0 lg:mt-0">
                            <div class="contact-items-icon">
                                <img src="{{ isset($contact_us) && $contact_us->hotline_logo ? $contact_us->hotline_logo : asset('frontend/img/cs-hotline.svg') }}" alt="cs hotline"
                                    class="mx-auto w-auto h-auto align-middle object-cover object-center">
                            </div>
                            <h3 class="contact-items-caption text-blueMediq me-body23 font-bold mt-4 xl:mt-8 6xl:mt-10">
                                {{ langbind($contact_us, 'hotline_title') }}
                            </h3>

                            <a href="tel:{{ isset($contact_us) ? $contact_us->hotline : '-' }}"
                                class="me-body18 underline inline-block xl:mt-4 6xl:mt-5">
                                {{ isset($contact_us) ? $contact_us->hotline : '-' }}</a>
                        </div>



                    </div>

                </div>
            </div>
        </section>

        <section class="three-cols-help">
            <div class="contact-us-container text-center text-darkgray py-8 xl:py-10 6xl:py-[3.75rem]">
                <div class="three-cols-help-header">
                    <h2 class="three-cols-help-title me-head32 font-bold">
                        @lang('labels.header.help')
                    </h2>


                </div>


                <div
                    class="three-cols-help-items text-left md:flex flex-wrap justify-center max-w-[85rem] mx-auto 4xl:justify-between">


                    <div
                        class="three-cols-help-card shadow-[0px_4px_15px_2px_rgba(0,0,0,0.10)] py-8 px-4 md:py-10 md:px-5 rounded-xl xl:rounded-[20px] relative mt-[82px] max-w-[24.3125rem] mx-auto md:flex-auto md:mx-0 md:basis-[calc(50%-12px)] md:[&:nth-child(1)]:mr-3 md:[&:nth-child(2)]:ml-3 xl:basis-[calc(33.33%-24px)] xl:[&:nth-child(2)]:mr-3 xl:[&:nth-child(3)]:ml-3 4xl:max-w-[26.313rem] 4xl:pt-16 4xl:px-8 4xl:mx-0">
                        <div
                            class="three-cols-card-pic mx-auto align-middle object-contain object-center w-24 h-24 flex items-center justify-center rounded-full shadow-[0px_4px_15px_2px_rgba(0,0,0,0.10)] absolute -top-12 left-1/2 -translate-x-1/2 bg-light">
                            {{-- <img src="{{ isset($contact) ? $contact->help1_icon : asset('frontend/img/three-cols-item-online-self-service.svg') }}" alt="online self-service"
                                class="three-cols-card-img m-auto w-auto h-auto align-middle object-contain object-center"> --}}
                            <img src="{{  $contact->help1_icon }}" alt="online self-service"
                                class="three-cols-card-img m-auto w-auto h-auto align-middle object-contain object-center">
                        </div>

                        <div class="three-cols-card-body">
                            <h3 class="me-body23 text-blueMediq font-bold mt-9">{{ langbind($contact, 'help1_name') }}</h3>

                            {{-- <ul class="list-disc me-body18 ml-4 mt-3 4xl:mt-4"> --}}
                                {{-- <li>Book, amend and cancellation</li>
                                <li>Check Q-Dollar and membership privileges</li>
                                <li>Edit contact and medical records</li> --}}
                                <div class="three-cols-card-list me-body18">
                                {!! langbind($contact, 'help1_description') !!}
                                </div>
                            {{-- </ul> --}}
                            @if (!Auth::guard('customer')->check())
                                <a href="#"
                                    class="register-btn text-light font-bold bg-blueMediq py-2 xl:py-[10px] px-5 rounded-[20px] me-body16 inline-block mt-4 4xl:mt-8">
                                    @lang('labels.log_in_register.login')
                                </a>
                            @endif
                        </div>
                    </div>

                    {{-- <div
                        class="three-cols-help-card shadow-[0px_4px_15px_2px_rgba(0,0,0,0.10)] py-8 px-4 md:py-10 md:px-5 rounded-xl xl:rounded-[20px] relative mt-[82px] max-w-[24.3125rem] mx-auto md:flex-auto md:mx-0 md:basis-[calc(50%-12px)] md:[&:nth-child(1)]:mr-3 md:[&:nth-child(2)]:ml-3 xl:basis-[calc(33.33%-24px)] xl:[&:nth-child(2)]:mr-3 xl:[&:nth-child(3)]:ml-3 4xl:max-w-[26.313rem] 4xl:pt-16 4xl:px-8 4xl:mx-0">
                        <div
                            class="three-cols-card-pic mx-auto align-middle object-contain object-center w-24 h-24 flex items-center justify-center rounded-full shadow-[0px_4px_15px_2px_rgba(0,0,0,0.10)] absolute -top-12 left-1/2 -translate-x-1/2 bg-light">
                            <img src="{{ $contact->help2_icon }}" alt="online self-service"
                                class="three-cols-card-img m-auto w-auto h-auto align-middle object-contain object-center">
                        </div>

                        <div class="three-cols-card-body">
                            <h3 class="me-body23 text-blueMediq font-bold mt-9">{{ langbind($contact, 'help2_name') }}</h3>

                            <ul class="list-disc me-body18 ml-4 mt-3 4xl:mt-4">
                                {!! langbind($contact, 'help2_description') !!}
                               
                            </ul>

                            <a href="https://wa.me/95194000"
                                class="text-light font-bold bg-blueMediq py-2 xl:py-[10px] px-5 rounded-[20px] me-body16 inline-block mt-4 4xl:mt-8">Whatsapp</a>
                        </div>
                    </div> --}}

                    <div class="three-cols-help-card shadow-[0px_4px_15px_2px_rgba(0,0,0,0.10)] py-8 px-4 md:py-10 md:px-5 rounded-xl xl:rounded-[20px] relative mt-[82px] max-w-[24.3125rem] mx-auto md:flex-auto md:mx-0 md:basis-[calc(50%-12px)] md:[&:nth-child(1)]:mr-3 md:[&:nth-child(2)]:ml-3 xl:basis-[calc(33.33%-24px)] xl:[&:nth-child(2)]:mr-3 xl:[&:nth-child(3)]:ml-3 4xl:max-w-[26.313rem] 4xl:pt-16 4xl:px-8 4xl:mx-0">
                        <div class="three-cols-card-pic mx-auto align-middle object-contain object-center w-24 h-24 flex items-center justify-center rounded-full shadow-[0px_4px_15px_2px_rgba(0,0,0,0.10)] absolute -top-12 left-1/2 -translate-x-1/2 bg-light">
                          <img src="{{  $contact->help2_icon }}" alt="online self-service" class="three-cols-card-img m-auto w-auto h-auto align-middle object-contain object-center">
                        </div>
                        
                        <div class="three-cols-card-body flex flex-col items-start h-full">
                          <h3 class="me-body23 text-blueMediq font-bold mt-9">{{ langbind($contact, 'help2_name') }}</h3>
                          <div class="three-cols-card-list me-body18">
                          {!! langbind($contact, 'help2_description') !!}
                          </div>
                          {{-- <ul class="list-disc flex-1 me-body18 ml-4 mt-3 4xl:mt-4">
                              {!! langbind($contact, 'help2_description') !!}
                            <li>Explain product features</li><li>Assist with online booking and payment</li><li>Provide booking updates</li>
                          </ul> --}}
                
                          <a href="https://wa.me/85298124646" class="text-light font-bold bg-blueMediq py-2 xl:py-[10px] px-5 rounded-[20px] me-body16 inline-block mt-4 4xl:mt-8">WhatsApp</a>
                        </div>
                      </div>

                    <div
                        class="three-cols-help-card shadow-[0px_4px_15px_2px_rgba(0,0,0,0.10)] py-8 px-4 md:py-10 md:px-5 rounded-xl xl:rounded-[20px] relative mt-[82px] max-w-[24.3125rem] mx-auto md:flex-auto md:mx-0 md:basis-[calc(50%-12px)] md:[&:nth-child(1)]:mr-3 md:[&:nth-child(2)]:ml-3 xl:basis-[calc(33.33%-24px)] xl:[&:nth-child(2)]:mr-3 xl:[&:nth-child(3)]:ml-3 4xl:max-w-[26.313rem] 4xl:pt-16 4xl:px-8 4xl:mx-0">
                        <div
                            class="three-cols-card-pic mx-auto align-middle object-contain object-center w-24 h-24 flex items-center justify-center rounded-full shadow-[0px_4px_15px_2px_rgba(0,0,0,0.10)] absolute -top-12 left-1/2 -translate-x-1/2 bg-light">
                            <img src="{{  $contact->help3_icon }}" alt="online self-service"
                                class="three-cols-card-img m-auto w-auto h-auto align-middle object-contain object-center">
                        </div>

                        <div class="three-cols-card-body">
                            <h3 class="me-body23 text-blueMediq font-bold mt-9">{{ langbind($contact, 'help3_name') }}</h3>

                          
                                {{-- <li>Unable to log in to account and did not receive notifications</li>
                                <li>What to do if you need to modify or cancel your booking</li> --}}
                                <div class="three-cols-card-list me-body18">
                                {!! langbind($contact, 'help3_description') !!}
                                </div>

                            <a href="{{ route('faq') }}"
                                class="text-light font-bold bg-blueMediq py-2 xl:py-[10px] px-5 rounded-[20px] me-body16 inline-block mt-4 4xl:mt-8">@lang('labels.contact.faqs')</a>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <section class="two-cols-services">
            <div class="contact-us-container text-center text-darkgray py-8 xl:py-10 6xl:py-[3.75rem]">
                <div class="two-cols-services-row max-w-[67.75rem] mx-auto">
                    <div class="two-cols-services-header">
                        <h2 class="two-cols-services-title me-head32 font-bold">@lang('labels.contact.bank_transfer')</h2>


                    </div>


                    <div class="two-cols-services-items lg:flex justify-center">
                        <div
                            class="services-items-col w-full h-auto text-center mt-8 6xl:mt-12 max-w-[28.125rem] mx-auto px-4 lg:mx-0 lg:odd:mr-2 lg:even:ml-2 4xl:odd:mr-5 4xl:even:ml-5 6xl:odd:mr-10 6xl:even:ml-10">
                            <div class="services-items-icon">
                                <img src="{{ isset($contact) ? $contact->payment_method1_icon : asset('frontend/img/HSBC_logo.png') }}" alt="hsbc bank"
                                    class="mx-auto w-auto h-auto align-middle object-cover object-center">
                            </div>
                            <h3 class="services-items-title text-blueMediq me-body23 font-bold mt-4 4xl:mt-8">
                                {{ langbind($contact, 'payment_method1_name') }}
                            </h3>

                            <div class="me-body18 xl:mt-4 services-items-div">
                                {!! langbind($contact, 'payment_method1_description') !!}
                            </div>
                        </div>

                        <div
                            class="services-items-col w-full h-auto text-center mt-8 6xl:mt-12 max-w-[28.125rem] mx-auto px-4 lg:mx-0 lg:odd:mr-2 lg:even:ml-2 4xl:odd:mr-5 4xl:even:ml-5 6xl:odd:mr-10 6xl:even:ml-10">
                            <div class="services-items-icon">
                                <img src="{{ isset($contact) ? $contact->payment_method2_icon : asset('frontend/img/FPS_logo.png') }}" alt="fps"
                                    class="mx-auto w-auto h-auto align-middle object-cover object-center">
                            </div>
                            <h3 class="services-items-title text-blueMediq me-body23 font-bold mt-4 4xl:mt-8">
                                {{ langbind($contact, 'payment_method2_name') }}</h3>

                            <div class="me-body18 xl:mt-4 services-items-div">
                                {{-- <span class="block">
                                FPS ID: 3577632</span> --}}
                                {!! langbind($contact, 'payment_method2_description') !!}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="online-payment-items">
            <div class="contact-us-container text-center text-darkgray py-8 xl:py-10 6xl:py-[3.75rem]">
                <div class="online-payment-items-row max-w-[52.5rem] mx-auto">
                    <div class="online-payment-items-header">
                        <h2 class="online-payment-items-title me-head32 font-bold">@lang('labels.contact.payment')</h2>
                    </div>
                    <div class="payment-items flex justify-center flex-wrap">
                        @if($contact  && count($contact->online_payment_img) > 0)
                        @foreach ($contact->online_payment_img as $img)
                            <div
                                class="payment-item flex-auto basis-[calc(25%-16px)] mx-2 sm:basis-[calc(25%-32px)] sm:mx-4 md:basis-[calc(25%-40px)] md:mx-5 xl:basis-[calc(25%-64px)] xl:mx-8 4xl:basis-[calc(25%-80px)] 4xl:mx-10 max-w-[150px] mt-8 6xl:mt-12 flex items-center justify-center">
                                <img src="{{ $img }}" alt="visa card"
                                    class="w-auto h-auto object-contain object-center align-middle m-auto">
                            </div>
                        @endforeach
                        @endif
                    </div>

                </div>
            </div>
        </section>

        <section class="online-payment-items">
            <div class="contact-us-container text-center text-darkgray py-8 xl:py-10 6xl:py-[3.75rem]">
                <div class="online-payment-items-row max-w-[52.5rem] mx-auto">
                    <div class="online-payment-items-header">
                        <h2 class="online-payment-items-title me-head32 font-bold">@lang('labels.contact.offline_payment')</h2>
                    </div>
                    <div class="payment-items flex justify-center flex-wrap">
                        @if($contact && count($contact->offline_payment_img) > 0)
                        @foreach ($contact->offline_payment_img as $img)
                            <div
                                class="payment-item flex-auto basis-[calc(25%-16px)] mx-2 sm:basis-[calc(25%-32px)] sm:mx-4 md:basis-[calc(25%-40px)] md:mx-5 xl:basis-[calc(25%-64px)] xl:mx-8 4xl:basis-[calc(25%-80px)] 4xl:mx-10 max-w-[150px] mt-8 6xl:mt-12 flex items-center justify-center">
                                <img src="{{ $img }}" alt="visa card"
                                    class="w-auto h-auto object-contain object-center align-middle m-auto">
                            </div>
                        @endforeach
                        @endif
                    </div>

                </div>
            </div>
        </section>

        <section class="office">
            <div class="contact-us-container text-center text-darkgray py-8 xl:py-10 6xl:py-[3.75rem]">
                <div class="office-row max-w-[85rem] mx-auto">
                    <div class="office-header">
                        <h2 class="office-title me-head32 font-bold">@lang('labels.contact.main_office')
                        </h2>
                    </div>


                    <div class="office-body mt-4 4xl:mt-5">
                        <ul class="office-list flex items-center justify-center me-body23">
                            @foreach ($office_info as $office)
                                <li class="first:mr-3 last:ml-3">
                                    <button type="button" data-branchid="map-{{ $office->id }}"
                                        class="office-branch @if ($office->id == 1) active @endif alert">
                                        {{ langbind($office, 'office_name') }}
                                    </button>
                                </li>
                            @endforeach
                            {{-- <li class="first:mr-3 last:ml-3">
                                <button type="button" data-branchid="map-2" class="office-branch">Central
                                    Office</button>
                            </li> --}}

                        </ul>

                        <address class="office-direction not-italic mt-4 xl:mt-6">
                            @foreach ($office_info as $office)
                                <div id="map-{{ $office->id }}"
                                    class="office-address-tab @if ($office->id != 1) hidden @endif @if ($office->id == 1) false @endif">
                                    <p class="office-address me-body18">
                                        {!! langbind($office, 'address') !!}
                                    </p>

                                    <div
                                        class="office-map-info rounded-xl xl:rounded-[20px] overflow-hidden flex justify-center mt-4 xl:mt-5 4xl:mt-8">
                                        <iframe
                                        src=" {!! $office->location !!}"
                                        frameborder="0" allowfullscreen="" loading="lazy"
                                        class="office-map w-full h-auto flex-auto basis-1/2 max-w-[50%] xl:h-[600px] 6xl:h-[700px]">
                                       </iframe>
                                    {{-- <div class="office-map w-full h-auto flex-auto basis-1/2 max-w-[50%] xl:h-[600px] 6xl:h-[700px]">
                                        {!! $office->location !!}
                                    </div> --}}
                                       
                                      
                                        <div class="office-gallery flex-auto basis-1/2 max-w-[50%]">
                                            @if(isset($office->image))
                                            <div class="gallery-row gallery-first-row flex justify-center">
                                                <img src="{{ $office->image[0] }}" alt=""
                                                    class="w-full h-auto align-middle object-cover object-center aspect-[68/35] xl:object-cover xl:h-[300px] 6xl:h-[350px]">
                                            </div>
                                            <div class="gallery-row gallery-second-row flex justify-center">
                                                <img src="{{ $office->image[1] }}" alt=""
                                                    class="w-full h-auto align-middle object-cover object-center flex-auto basis-1/2 max-w-[50%] 6xl:max-w-fit aspect-[34/35] xl:object-cover xl:h-[300px] 6xl:h-[350px]">
                                                <img src="{{ isset($office->image[2]) ? $office->image[2] : asset('frontend/img/HSBC_logo.png') }} " alt=""
                                                    class="w-full h-auto align-middle object-cover object-center flex-auto basis-1/2 max-w-[50%] 6xl:max-w-fit aspect-[34/35] xl:object-cover xl:h-[300px] 6xl:h-[350px]">
                                            </div>
                                            @endif
                                        </div>
                                        
                                    </div>
                                </div>
                            @endforeach
                            {{-- <div id="map-2" class="office-address-tab hidden">
                                <p class="office-address me-body18">Nulla ex occaecat qui laborum nisi officia fugiat
                                    cillum officia in.</p>

                                <div
                                    class="office-map-info rounded-xl xl:rounded-[20px] overflow-hidden flex justify-center mt-4 xl:mt-5 4xl:mt-8">
                                    <iframe
                                        src="https://maps.google.com/maps?width=100%25&height=400&hl=en&q=Hong%20Kong,%20region,%20China+(Hong%20Kong)&t=&z=14&ie=UTF8&iwloc=B&output=embed"
                                        frameborder="0" allowfullscreen="" loading="lazy"
                                        class="office-map w-full h-auto flex-auto basis-1/2 max-w-[50%]"></iframe>

                                    <div class="office-gallery flex-auto basis-1/2 max-w-[50%]">
                                        <div class="gallery-row gallery-first-row flex justify-center">
                                            <img src="./img/office-img-1.png" alt=""
                                                class="w-auto h-auto align-middle object-contain object-center">
                                        </div>
                                        <div class="gallery-row gallery-second-row flex justify-center">
                                            <img src="./img/office-img-2.png" alt=""
                                                class="w-auto h-auto align-middle object-contain object-center flex-auto basis-1/2 max-w-[50%] 6xl:max-w-fit">
                                            <img src="./img/office-img-3.png" alt=""
                                                class="w-auto h-auto align-middle object-contain object-center flex-auto basis-1/2 max-w-[50%] 6xl:max-w-fit">
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                        </address>
                    </div>

                </div>
            </div>
        </section>
        <section class="contact-us-card">
            <div class="contact-us-container text-center text-darkgray py-8 xl:py-10 6xl:py-[3.75rem]">
                <div class="card-wrapper max-w-[85rem] mx-auto xsm:flex xsm:justify-center xsm:items-center">
                    <div
                        class="card relative overflow-hidden mx-auto max-w-xs xl:max-w-[26.688rem] rounded-xl rounded-br-[60px] mt-8 first:mt-0 xsm:mt-0 xsm:mr-2 xsm:last:mr-0 lg:mr-4 lg:last:mr-0 xl:mr-6 xl:last:mr-0 4xl:mr-10 4xl:last:mr-0 4xl:rounded-[20px] 4xl:rounded-br-[100px] pt-3 transition-all duration-300 hover:pt-0">
                        <img src="{{ isset($contact) ? $contact->contact_us_footer_img1 : asset('frontend/img/about-us-cta.png') }}" alt="about us"
                            class="w-auto h-auto align-middle object-contain object-center">
                        <a href="{{ route('about') }}"
                            class="text-darkgray font-bold bg-[#ffffff80] border border-solid border-darkgray absolute bottom-3 left-3 py-2 xl:py-[10px] px-5 rounded-[50px] me-body16 inline-block transition-colors hover:bg-blueMediq hover:text-light hover:border-blueMediq">
                            @lang('labels.contact.about_mediq')
                        </a>
                    </div>
                    <div
                        class="card relative overflow-hidden mx-auto max-w-xs xl:max-w-[26.688rem] rounded-xl rounded-br-[60px] mt-8 first:mt-0 xsm:mt-0 xsm:mr-2 xsm:last:mr-0 lg:mr-4 lg:last:mr-0 xl:mr-6 xl:last:mr-0 4xl:mr-10 4xl:last:mr-0 4xl:rounded-[20px] 4xl:rounded-br-[100px] pt-3 transition-all duration-300 hover:pt-0">
                        <img src="{{ isset($contact) ? $contact->contact_us_footer_img2 : asset('frontend/img/help-centre-cta.png') }}" alt="help centre"
                            class="w-auto h-auto align-middle object-contain object-center">
                        <a href="{{ route('faq') }}"
                            class="text-darkgray font-bold bg-[#ffffff80] border border-solid border-darkgray absolute bottom-3 left-3 py-2 xl:py-[10px] px-5 rounded-[50px] me-body16 inline-block transition-colors hover:bg-blueMediq hover:text-light hover:border-blueMediq">
                            @lang('labels.product_detail.help_center')
                        </a>
                    </div>
                    <div
                        class="card relative overflow-hidden mx-auto max-w-xs xl:max-w-[26.688rem] rounded-xl rounded-br-[60px] mt-8 first:mt-0 xsm:mt-0 xsm:mr-2 xsm:last:mr-0 lg:mr-4 lg:last:mr-0 xl:mr-6 xl:last:mr-0 4xl:mr-10 4xl:last:mr-0 4xl:rounded-[20px] 4xl:rounded-br-[100px] pt-3 transition-all duration-300 hover:pt-0">
                        <img src="{{ isset($contact) ? $contact->contact_us_footer_img3 : asset('frontend/img/continue-shopping-cta.png') }}" alt="continue shopping"
                            class="w-auto h-auto align-middle object-contain object-center">
                        <a href="{{ route('mediq') }}"
                            class="text-darkgray font-bold bg-[#ffffff80] border border-solid border-darkgray absolute bottom-3 left-3 py-2 xl:py-[10px] px-5 rounded-[50px] me-body16 inline-block transition-colors hover:bg-blueMediq hover:text-light hover:border-blueMediq">
                            {{-- Continue Shopping --}}
                            @lang('labels.contact.continue_shopping')
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@push('scripts')
@endpush

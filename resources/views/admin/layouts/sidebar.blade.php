<!--begin::Aside-->
<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <!--begin::Brand-->
    <div class="aside-logo flex-column-auto" id="kt_aside_logo">
        <!--begin::Logo-->
        <a href="{{ url('/admin') }}">
            <img alt="Logo" src="{{ asset('backend/media/mediq-logo.svg') }}" class="logo"
                style="height: 100% !important;" />
        </a>
        <!--end::Logo-->
        <!--begin::Aside toggler-->
        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="aside-minimize">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
            <span class="svg-icon svg-icon-1 rotate-180">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none">
                    <path opacity="0.5"
                        d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z"
                        fill="currentColor" />
                    <path
                        d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z"
                        fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Aside toggler-->
    </div>
    <!--end::Brand-->
    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid">
        <!--begin::Aside Menu-->
        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu"
            data-kt-scroll-offset="0">
            <!--begin::Menu-->
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Main</span>
                    </div>
                </div>
                <div class="menu-item">
                    <a class="menu-link {{ isset($page) && $page == 'Dashboard' ? 'active-show' : '' }}"
                        href="{{ url('/admin') }}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-grid-1x2" viewBox="0 0 16 16">
                                    <path
                                        d="M6 1H1v14h5V1zm9 0h-5v5h5V1zm0 9v5h-5v-5h5zM0 1a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm9 0a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1V1zm1 8a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1h-5z" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </div>
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('manager') || auth()->user()->hasRole('customer-support') || auth()->user()->hasRole('accounting'))

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Customers</span>
                    </div>
                </div>
                @endif
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('manager') || auth()->user()->hasRole('customer-support') || auth()->user()->hasRole('accounting')  )
                <div class="menu-item">
                    <a class="menu-link {{ isset($page) && $page == 'customer' ? 'active-show' : '' }} "
                        href="{{ url('admin/customer') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Customer List</span>
                    </a>
                </div>
                @endif
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('manager') || auth()->user()->hasRole('customer-support'))

                <div class="menu-item">
                    <a class="menu-link {{ isset($page) && $page == 'contact-us-customer' ? 'active-show' : '' }} "
                        href="{{ url('admin/customer-list') }}">
                        <span class="menu-icon">
                          
                            <span class="svg-icon svg-icon-2">
                                <svg fill="currentColor" height="200px" width="200px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 198.145 198.145" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M195.536,68.18c-1.895-2.079-4.578-3.265-7.392-3.265H10c-2.813,0-5.497,1.186-7.392,3.265s-2.826,4.861-2.565,7.662 l9.505,102.099c0.479,5.142,4.793,9.073,9.957,9.073h159.134c5.164,0,9.478-3.932,9.957-9.073l9.505-102.099 C198.362,73.041,197.431,70.259,195.536,68.18z M132.426,166.073c-0.007-0.001-0.013-0.001-0.02,0H65.739c-5.523,0-10-4.478-10-10 c0-13.58,11.048-24.628,24.628-24.628h7.177c-7.381-4.078-12.393-11.94-12.393-20.952c0-13.19,10.731-23.922,23.922-23.922 s23.922,10.731,23.922,23.922c0,9.012-5.012,16.874-12.393,20.952h7.177c13.303,0,24.176,10.603,24.614,23.802 c0.022,0.272,0.034,0.548,0.034,0.826C142.426,161.596,137.949,166.073,132.426,166.073z M178.906,46.298c0,4.143-3.358,7.5-7.5,7.5 H26.739c-4.142,0-7.5-3.357-7.5-7.5s3.358-7.5,7.5-7.5h144.667C175.548,38.798,178.906,42.155,178.906,46.298z M159.106,18.631 c0,4.143-3.358,7.5-7.5,7.5H46.539c-4.142,0-7.5-3.357-7.5-7.5s3.358-7.5,7.5-7.5h105.066 C155.748,11.131,159.106,14.488,159.106,18.631z"></path> </g></svg>
                            </span>
                        </span>
                        <span class="menu-title">Contact Customer List</span>
                    </a>
                </div>
                @endif
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('manager') || auth()->user()->hasRole('customer-support'))

                <div class="menu-item">
                    <a class="menu-link {{ isset($page) && $page == 'subscriber' ? 'active-show' : '' }} "
                        href="{{ url('admin/subscriber') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="currentColor"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M841.2 841.1H182.9V182.9h292.5v-73.2H109.7v804.6h804.6V621.7h-73.1z" fill="currentColor"></path><path d="M402.3 585.1h73.1c0-100.8 82-182.9 182.9-182.9s182.9 82 182.9 182.9h73.1c0-102.2-60.2-190.6-147-231.6 23.2-25.9 37.3-60.1 37.3-97.5 0-80.8-65.5-146.3-146.3-146.3-80.8 0-146.3 65.5-146.3 146.3 0 37.5 14.1 71.7 37.3 97.5-86.8 41.1-147 129.4-147 231.6z m256-402.2c40.3 0 73.1 32.8 73.1 73.1s-32.8 73.1-73.1 73.1-73.1-32.8-73.1-73.1 32.8-73.1 73.1-73.1zM219.4 256h219.4v73.1H219.4zM219.4 658.3h585.1v73.1H219.4zM219.4 402.3h146.3v73.1H219.4z" fill="currentColor"></path></g></svg>
                            </span>
                        </span>
                        <span class="menu-title">Subscriber List</span>
                    </a>
                </div>
                @endif
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('manager') || auth()->user()->hasRole('customer-support'))

                <div class="menu-item">
                    <a class="menu-link {{ isset($page) && $page == 'blog_subscriber' ? 'active-show' : '' }} "
                        href="{{ url('admin/blog/subscriber') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="currentColor"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M841.2 841.1H182.9V182.9h292.5v-73.2H109.7v804.6h804.6V621.7h-73.1z" fill="currentColor"></path><path d="M402.3 585.1h73.1c0-100.8 82-182.9 182.9-182.9s182.9 82 182.9 182.9h73.1c0-102.2-60.2-190.6-147-231.6 23.2-25.9 37.3-60.1 37.3-97.5 0-80.8-65.5-146.3-146.3-146.3-80.8 0-146.3 65.5-146.3 146.3 0 37.5 14.1 71.7 37.3 97.5-86.8 41.1-147 129.4-147 231.6z m256-402.2c40.3 0 73.1 32.8 73.1 73.1s-32.8 73.1-73.1 73.1-73.1-32.8-73.1-73.1 32.8-73.1 73.1-73.1zM219.4 256h219.4v73.1H219.4zM219.4 658.3h585.1v73.1H219.4zM219.4 402.3h146.3v73.1H219.4z" fill="currentColor"></path></g></svg>
                            </span>
                        </span>
                        <span class="menu-title">Blog Subscriber List</span>
                    </a>
                </div>
                @endif
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('manager') || auth()->user()->hasRole('marketing') )

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Media</span>
                    </div>
                </div>
                <div class="menu-item">
                    <a class="menu-link {{ isset($page) && $page == 'filemanager' ? 'active-show' : '' }}"
                        href="{{ url('/admin/filemanager') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                             
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-images" viewBox="0 0 16 16">
                                    <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                                    <path
                                        d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z" />
                                </svg>
                                
                            </span>
                        </span>
                        <span class="menu-title">Media Library</span>
                    </a>
                </div>

                @endif
                {{-- @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('manager') || auth()->user()->hasRole('customer-support') || auth()->user()->hasRole('accounting') )

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Orders</span>
                    </div>
                </div>
               @endif --}}
                {{-- <div class="menu-item">
                    <a class="menu-link {{ isset($page) && $page == 'recipient' ? 'active-show' : '' }}"
                        href="{{ url('/admin/recipient') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-receipt" viewBox="0 0 16 16">
                                    <path
                                        d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z" />
                                    <path
                                        d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Recipient Lists</span>
                    </a>
                </div> --}}
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('manager') || auth()->user()->hasRole('accounting')  || auth()->user()->hasRole('customer-support'))
                <div class="menu-item">
                    <a class="menu-link {{ isset($page) && $page == 'orders' ? 'active-show' : '' }}"
                        href="{{ url('/admin/orders') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-receipt" viewBox="0 0 16 16">
                                    <path
                                        d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z" />
                                    <path
                                        d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Order Lists</span>
                    </a>
                </div>
                @endif
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('manager') || auth()->user()->hasRole('marketing') || auth()->user()->hasRole('accounting'))

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Product</span>
                    </div>
                </div>
                @endif
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('manager') || auth()->user()->hasRole('marketing') || auth()->user()->hasRole('accounting')  || auth()->user()->hasRole('marketing') )

                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion
                    @isset($page)
                        @if (
                                $page == 'product' ||
                                $page == 'sub_category' ||
                                $page == 'category' ||
                                $page == 'feature_tag' ||
                                $page == 'key_item_tag' ||
                                $page == 'sub_key_item_tag' ||
                                $page == 'highlight_tag' ||
                                $page == 'vaccine_factory_tag' ||
                                $page == 'vaccine_stock_tag' ||
                                $page == 'time_slot_tag' ||
                                $page == 'price_tag' ||
                                $page == 'recommend_tag' ||
                                $page == 'dose_tag') hover show @endif
                    @endisset">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                                    <path
                                        d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Product</span>
                        <span class="menu-arrow"></span>
                    </span>
                    @endif
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('manager') || auth()->user()->hasRole('marketing') || auth()->user()->hasRole('accounting') )
                        @php 
                            $home_featured = Request::get('home_featured'); 
                            $recommend = Request::get('recommend'); 
                        @endphp
                        <div class="menu-item">
                            <a class="menu-link {{ isset($page) && $page == 'product' && $home_featured ==  null && $recommend == null ? 'active' : '' }}" href="{{ url('/admin/products') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Lists</span>
                            </a>
                        </div>
                        <div class="menu-item">
                           
                            <a class="menu-link {{ isset($page) && $page == 'product' && isset($home_featured) ? 'active' : '' }}" href="{{ url('/admin/products?home_featured=1') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Home Featured Products</span>
                            </a>
                        </div>
                        <div class="menu-item">
                           
                            <a class="menu-link {{ isset($page) && $page == 'product' && isset($recommend) ? 'active' : '' }}" href="{{ url('/admin/products?recommend=2') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Recommend Products</span>
                            </a>
                        </div>
                        @endif

                        @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('manager') )

                        
                        <div data-kt-menu-trigger="click"
                            class="menu-item menu-accordion
                            @isset($page)
                                @if ($page == 'category' || $page == 'sub_category') hover show @endif
                            @endisset">
                            <span class="menu-link">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Categories</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg" kt-hidden-height="78"
                                style="">
                                <div class="menu-item">
                                    <a class="menu-link @isset($page) @if ($page == 'category') active @endif @endisset"
                                        href="{{ url('/admin/category') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Categories</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link @isset($page) @if ($page == 'sub_category') active @endif @endisset"
                                        href="{{ url('/admin/sub-category') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Sub Categories</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('manager') )

                        <div data-kt-menu-trigger="click"
                            class="menu-item menu-accordion
                                @isset($page)
                                    @if (
                                        $page == 'feature_tag' ||
                                            $page == 'highlight_tag' ||
                                            $page == 'vaccine_factory_tag' ||
                                            $page == 'vaccine_stock_tag' ||
                                            $page == 'time_slot_tag' ||
                                            $page == 'price_tag' ||
                                            $page == 'recommend_tag' ||
                                            $page == 'key_item_tag' ||
                                            $page == 'dose_tag') hover show @endif
                                @endisset
                            ">
                            <span class="menu-link">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Tags</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg" kt-hidden-height="78">

                                <div class="menu-item">
                                    <a class="menu-link {{ isset($page) && $page == 'price_tag' ? 'active' : '' }} "
                                        href="{{ url('admin/price-tag') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Price</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link {{ isset($page) && $page == 'time_slot_tag' ? 'active' : '' }} "
                                        href="{{ url('admin/time-slot-tag') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Time Slot</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link {{ isset($page) && $page == 'highlight_tag' ? 'active' : '' }} "
                                        href="{{ url('admin/highlight-tag') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Highlight</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link {{ isset($page) && $page == 'feature_tag' ? 'active' : '' }} "
                                        href="{{ url('admin/feature-tag') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Feature</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link {{ isset($page) && $page == 'recommend_tag' ? 'active' : '' }} "
                                        href="{{ url('admin/recommend-tags') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Recommend</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link {{ isset($page) && $page == 'vaccine_factory_tag' ? 'active' : '' }} "
                                        href="{{ url('admin/vaccine-factory-tag') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Vaccine Factory Slot</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link {{ isset($page) && $page == 'vaccine_stock_tag' ? 'active' : '' }} "
                                        href="{{ url('admin/vaccine-stock-tag') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Vaccine Stock</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link {{ isset($page) && $page == 'key_item_tag' ? 'active' : '' }} "
                                        href="{{ url('admin/key-item-tag') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Key Item Tag</span>
                                    </a>
                                </div>
                                {{-- <div data-kt-menu-trigger="click" class="menu-item menu-accordion
                                        @isset($page)
                                            @if ($page == 'key_item_tag' || $page == 'sub_key_item_tag') hover show @endif
                                        @endisset
                                    ">
                                    <span class="menu-link">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Key Item Tag</span>
                                        <span class="menu-arrow"></span>
                                    </span>
                                    <div class="menu-sub menu-sub-accordion menu-active-bg" kt-hidden-height="78" style="">
                                        <div class="menu-item">
                                            <a class="menu-link @isset($page) @if ($page == 'key_item_tag') active @endif @endisset" href="{{ url('/admin/key-item-tag') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Key Item</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link @isset($page) @if ($page == 'sub_key_item_tag') active @endif @endisset" href="{{ url('/admin/sub-key-item-tag') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Sub Key Item</span>
                                </a>
                            </div>
                        </div>
                    </div> --}}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('manager') || auth()->user()->hasRole('marketing'))

                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion
                    @isset($page)
                        @if (
                            $page == 'main_optional_item' ||
                                $page == 'optional_item' ||
                                $page == 'check_up_table' ||
                                $page == 'check_up_type' ||
                                $page == 'check_up_group' ||
                                $page == 'package' ||
                                $page == 'check_up_item') hover show @endif
                    @endisset">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-diagram-3" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M6 3.5A1.5 1.5 0 0 1 7.5 2h1A1.5 1.5 0 0 1 10 3.5v1A1.5 1.5 0 0 1 8.5 6v1H14a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0v-1A.5.5 0 0 1 2 7h5.5V6A1.5 1.5 0 0 1 6 4.5v-1zM8.5 5a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1zM0 11.5A1.5 1.5 0 0 1 1.5 10h1A1.5 1.5 0 0 1 4 11.5v1A1.5 1.5 0 0 1 2.5 14h-1A1.5 1.5 0 0 1 0 12.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm4.5.5A1.5 1.5 0 0 1 7.5 10h1a1.5 1.5 0 0 1 1.5 1.5v1A1.5 1.5 0 0 1 8.5 14h-1A1.5 1.5 0 0 1 6 12.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm4.5.5a1.5 1.5 0 0 1 1.5-1.5h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Packages</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg" kt-hidden-height="78" style="">
                        <div class="menu-item">
                            <a class="menu-link @isset($page) @if ($page == 'package') active @endif @endisset"
                                href="{{ url('/admin/packages') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Lists</span>
                            </a>
                        </div>
                    </div>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div data-kt-menu-trigger="click"
                            class="menu-item menu-accordion
                                @isset($page)
                                    @if ($page == 'check_up_table' || $page == 'check_up_type' || $page == 'check_up_group' || $page == 'check_up_item') hover show @endif
                                @endisset
                            ">
                            <span class="menu-link">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Check Up</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg" kt-hidden-height="78"
                                style="">
                                <div class="menu-item">
                                    <a class="menu-link @isset($page) @if ($page == 'check_up_table') active @endif @endisset"
                                        href="{{ url('/admin/check-up-table') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Table</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link @isset($page) @if ($page == 'check_up_type') active @endif @endisset"
                                        href="{{ url('/admin/check-up-type') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Type</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link @isset($page) @if ($page == 'check_up_group') active @endif @endisset"
                                        href="{{ url('/admin/check-up-group') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Group</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link @isset($page) @if ($page == 'check_up_item') active @endif @endisset"
                                        href="{{ url('/admin/check-up-item') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Item</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('manager'))

                <div class="menu-item">
                    <a class="menu-link {{ isset($page) && $page == 'supplementary' ? 'active-show' : '' }}"
                        href="{{ url('/admin/supplementary') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Supplementary Information</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link {{ isset($page) && $page == 'add_on_item' ? 'active-show' : '' }}"
                        href="{{ url('/admin/add-on-item') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Add On Items</span>
                    </a>
                </div>
                @endif
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('marketing'))
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">CMS</span>
                    </div>
                </div>
                @endif
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('marketing'))
                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion
                    @isset($page)
                        @if ($page == 'blog' || $page == 'blog_cms' || $page == 'blog_category' || $page == 'blog_form' || $page == 'blog_author' || $page == 'blog_tag') hover show @endif
                    @endisset">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-layout-sidebar-inset" viewBox="0 0 16 16">
                                    <path
                                        d="M14 2a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h12zM2 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2z" />
                                    <path d="M3 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4z" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Blog</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link @isset($page) @if ($page == 'blog') active @endif @endisset"
                                href="{{ url('/admin/blog') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Blog Lists</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link @isset($page) @if ($page == 'blog_form') active @endif @endisset"
                                href="{{ url('/admin/blog/formsubmissions/list') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Blog Form Submission Lists</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link @isset($page) @if ($page == 'blog_category') active @endif @endisset"
                                href="{{ url('/admin/blog-category') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Blog Categories</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link @isset($page) @if ($page == 'blog_tag') active @endif @endisset"
                                href="{{ url('/admin/blog-tag') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Blog Sub Categories</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link @isset($page) @if ($page == 'blog_author') active @endif @endisset"
                                href="{{ url('/admin/blog-author') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Blog Author</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link @isset($page) @if ($page == 'blog_cms') active @endif @endisset"
                                href="{{ url('/admin/blog-cms') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Blog CMS</span>
                            </a>
                        </div>
                    </div>
                </div>
                @endif
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('marketing'))

                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion
                    @isset($page)
                        @if ($page == 'faq' || $page == 'faq_page' || $page == 'faq_category' || $page == 'faq_sub_category') hover show @endif
                    @endisset">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-list-check" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3.854 2.146a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 3.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 7.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Faq</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link @isset($page) @if ($page == 'faq_page') active @endif @endisset"
                                href="{{ url('/admin/faq-page') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Faq Page</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link @isset($page) @if ($page == 'faq') active @endif @endisset"
                                href="{{ url('/admin/faq') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Faq Lists</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link @isset($page) @if ($page == 'faq_category') active @endif @endisset"
                                href="{{ url('/admin/faq-category') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>

                                <span class="menu-title">Faq Categories</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link @isset($page) @if ($page == 'faq_sub_category') active @endif @endisset"
                                href="{{ url('/admin/faq-sub-category') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>

                                <span class="menu-title">Faq Sub Categories</span>
                            </a>
                        </div>
                    </div>
                </div>
                @endif
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('marketing'))

                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion 
                    @isset($p)
                    @if ($p == 'page') hover show @endif
                    @endisset
                    @isset($page)
                    @if ($page == 'best_price' || $page == 'seo-page' || $page == 'partnership' || $page == 'booking-process' || $page == 'quick-start-guide') hover show @endif
                    @endisset
                ">
                @endif
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('Marketing'))

                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-stickies" viewBox="0 0 16 16">
                                    <path
                                        d="M1.5 0A1.5 1.5 0 0 0 0 1.5V13a1 1 0 0 0 1 1V1.5a.5.5 0 0 1 .5-.5H14a1 1 0 0 0-1-1H1.5z" />
                                    <path
                                        d="M3.5 2A1.5 1.5 0 0 0 2 3.5v11A1.5 1.5 0 0 0 3.5 16h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 16 9.586V3.5A1.5 1.5 0 0 0 14.5 2h-11zM3 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 .5.5V9h-4.5A1.5 1.5 0 0 0 9 10.5V15H3.5a.5.5 0 0 1-.5-.5v-11zm7 11.293V10.5a.5.5 0 0 1 .5-.5h4.293L10 14.793z" />
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </span>
                        <span class="menu-title">Page</span>
                        <span class="menu-arrow"></span>
                    </span>
                    @endif
                    @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('marketing'))

                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                            <div class="menu-item">
                                <a class="menu-link @isset($p) @if ($p == 'page') active @endif @endisset"
                                    href="{{ url('/admin/pages') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Page Lists</span>
                                </a>
                            </div>
                        </div>
                    @endif
                    @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('marketing'))

                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link @isset($page) @if ($page == 'best_price') active @endif @endisset"
                                href="{{ url('/admin/best-price') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Best Price</span>
                            </a>
                        </div>
                    </div>
                    @endif
                    @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('marketing'))

                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link @isset($page) @if ($page == 'partnership') active @endif @endisset"
                                href="{{ url('/admin/partnership') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Partnership</span>
                            </a>
                        </div>
                    </div>
                    @endif
                    @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('marketing'))

                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link @isset($page) @if ($page == 'quick-start-guide') active @endif @endisset"
                                href="{{ url('/admin/quick-start-guide') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Quick start guide</span>
                            </a>
                        </div>
                    </div>

                    @endif
                    @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('marketing'))
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link @isset($page) @if ($page == 'booking-process') active @endif @endisset"
                                href="{{ url('/admin/booking-process') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Booking process</span>
                            </a>
                        </div>
                    </div>
                    @endif
                    @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('marketing'))
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link @isset($page) @if ($page == 'seo-page') active @endif @endisset"
                                href="{{ url('/admin/seo-page') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">SEO</span>
                            </a>
                        </div>
                    </div>
                    @endif
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('marketing'))

                </div>
                @endif
                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion
                    @isset($page)
                        @if ($page == 'about' || $page == 'milestone_year' || $page == 'milestone_detail') hover show @endif
                    @endisset">
                    @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('marketing'))
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-stickies" viewBox="0 0 16 16">
                                    <path
                                        d="M1.5 0A1.5 1.5 0 0 0 0 1.5V13a1 1 0 0 0 1 1V1.5a.5.5 0 0 1 .5-.5H14a1 1 0 0 0-1-1H1.5z" />
                                    <path
                                        d="M3.5 2A1.5 1.5 0 0 0 2 3.5v11A1.5 1.5 0 0 0 3.5 16h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 16 9.586V3.5A1.5 1.5 0 0 0 14.5 2h-11zM3 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 .5.5V9h-4.5A1.5 1.5 0 0 0 9 10.5V15H3.5a.5.5 0 0 1-.5-.5v-11zm7 11.293V10.5a.5.5 0 0 1 .5-.5h4.293L10 14.793z" />
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </span>
                        <span class="menu-title">About</span>
                        <span class="menu-arrow"></span>
                    </span>
                @endif
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('marketing'))
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link @isset($page) @if ($page == 'about') active @endif @endisset"
                                href="{{ url('/admin/about') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">About List</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link @isset($page) @if ($page == 'milestone_year') active @endif @endisset"
                                href="{{ url('/admin/milestone-year') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Milestone Year</span>
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('marketing'))

                <div class="menu-item">
                    <a class="menu-link {{ isset($page) && $page == 'choose_mediq' ? 'active-show' : '' }}"
                        href="{{ url('/admin/choose-mediq') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-receipt" viewBox="0 0 16 16">
                                    <path
                                        d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z" />
                                    <path
                                        d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Choose MediQ</span>
                    </a>
                </div>
                @endif
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('marketing'))

                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion
                    @isset($page)
                @if ($page == 'contact' || $page == 'contact_service' || $page == 'contact_us' || $page == 'office_information') hover show @endif
                @endisset">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-stickies" viewBox="0 0 16 16">
                                    <path
                                        d="M1.5 0A1.5 1.5 0 0 0 0 1.5V13a1 1 0 0 0 1 1V1.5a.5.5 0 0 1 .5-.5H14a1 1 0 0 0-1-1H1.5z" />
                                    <path
                                        d="M3.5 2A1.5 1.5 0 0 0 2 3.5v11A1.5 1.5 0 0 0 3.5 16h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 16 9.586V3.5A1.5 1.5 0 0 0 14.5 2h-11zM3 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 .5.5V9h-4.5A1.5 1.5 0 0 0 9 10.5V15H3.5a.5.5 0 0 1-.5-.5v-11zm7 11.293V10.5a.5.5 0 0 1 .5-.5h4.293L10 14.793z" />
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </span>
                        <span class="menu-title">Contact</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('marketing'))

                        <div class="menu-item">
                            <a class="menu-link @isset($page) @if ($page == 'contact') active @endif @endisset"
                                href="{{ url('/admin/contact') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Contact List</span>
                            </a>
                        </div>
                        {{-- <div class="menu-item">
                            <a class="menu-link @isset($page) @if ($page == 'contact_service') active @endif @endisset"
                                href="{{ url('/admin/contact-service') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Contact Service</span>
                            </a>
                        </div> --}}
                        @endif
                        @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('marketing'))

                        <div class="menu-item">
                            <a class="menu-link @isset($page) @if ($page == 'contact_us') active @endif @endisset"
                                href="{{ url('/admin/contact-us') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Contact Us</span>
                            </a>
                        </div>
                        @endif
                        @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('marketing'))

                        <div class="menu-item">
                            <a class="menu-link @isset($page) @if ($page == 'office_information') active @endif @endisset"
                                href="{{ url('/admin/office-info') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Office Info</span>
                            </a>
                        </div>
                        @endif
    
                    </div>
                </div>
                @endif
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('marketing'))

                <div class="menu-item">
                    <a class="menu-link {{ isset($page) && $page == 'quick_link' ? 'active-show' : '' }}"
                        href="{{ url('/admin/quick-link') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-receipt" viewBox="0 0 16 16">
                                    <path
                                        d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z" />
                                    <path
                                        d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Quick Link Lists</span>
                    </a>
                </div>
                @endif
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('marketing'))

                <div class="menu-item">
                    <a class="menu-link {{ isset($page) && $page == 'service_solution' ? 'active-show' : '' }}"
                        href="{{ url('/admin/service-solution') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-receipt" viewBox="0 0 16 16">
                                    <path
                                        d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z" />
                                    <path
                                        d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Service Solution</span>
                    </a>
                </div>
                
                <div class="menu-item">
                    <a class="menu-link @isset($page) @if ($page == 'bank_information') active-show @endif @endisset"
                        href="{{ url('/admin/bank-info') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                {{-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-receipt" viewBox="0 0 16 16">
                                    <path
                                        d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z" />
                                    <path
                                        d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                                </svg> --}}
                                <svg fill="currentColor" version="1.1" id="Layer_1" xmlns:x="&amp;ns_extend;" xmlns:i="&amp;ns_ai;" xmlns:graph="&amp;ns_graphs;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="148px" height="148px" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <metadata> <sfw xmlns="&amp;ns_sfw;"> <slices> </slices> <slicesourcebounds width="505" height="984" bottomleftorigin="true" x="0" y="-552"> </slicesourcebounds> </sfw> </metadata> <g> <g> <g> <path d="M12,24C5.4,24,0,18.6,0,12S5.4,0,12,0s12,5.4,12,12S18.6,24,12,24z M12,2C6.5,2,2,6.5,2,12s4.5,10,10,10s10-4.5,10-10 S17.5,2,12,2z"></path> </g> </g> <g> <g> <path d="M11,18c-0.4,0-0.7-0.2-1-0.5c-0.5-0.7-0.1-1.7,1-4.4c0.2-0.4,0.4-0.9,0.6-1.3c-0.4,0.3-1,0.3-1.4-0.1 c-0.4-0.4-0.4-1,0-1.4C10.4,10.2,11.6,9,13,9c0.4,0,0.7,0.2,1,0.5c0.5,0.7,0.1,1.7-1,4.4c-0.2,0.4-0.4,0.9-0.6,1.3 c0.4-0.3,1-0.3,1.4,0.1c0.4,0.4,0.4,1,0,1.4C13.6,16.8,12.4,18,11,18z"></path> </g> </g> <g> <g> <circle cx="13.5" cy="6.5" r="1.5"></circle> </g> <g> <path d="M13.5,8.5c-1.1,0-2-0.9-2-2s0.9-2,2-2s2,0.9,2,2S14.6,8.5,13.5,8.5z M13.5,5.5c-0.6,0-1,0.4-1,1s0.4,1,1,1s1-0.4,1-1 S14.1,5.5,13.5,5.5z"></path> </g> </g> </g> </g></svg>
                            </span>
                        </span>
                        <span class="menu-title">Bank info & Checkout</span>
                    </a>
                </div>
                
                @endif
                {{-- <div class="menu-item">
                    <a class="menu-link {{ isset($page) && $page == 'best_price' ? 'active-show' : '' }}"
                        href="{{ url('/admin/best-price') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-receipt" viewBox="0 0 16 16">
                                    <path
                                        d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z" />
                                    <path
                                        d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Best Price</span>
                    </a>
                </div> --}}

                {{-- <div class="menu-item">
                    <a class="menu-link {{ isset($page) && $page == 'partnership' ? 'active-show' : '' }}"
                        href="{{ url('/admin/partnership') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-receipt" viewBox="0 0 16 16">
                                    <path
                                        d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z" />
                                    <path
                                        d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Partnership</span>
                    </a>
                </div> --}}
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('marketing'))

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Special Offer</span>
                    </div>
                </div>
                @endif
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('marketing'))
                <div class="menu-item">
                    <a class="menu-link {{ isset($page) && $page == 'promo_code' ? 'active-show' : '' }}"
                        href="{{ url('/admin/promo-code') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-receipt" viewBox="0 0 16 16">
                                    <path
                                        d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z" />
                                    <path
                                        d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Promo Code</span>
                    </a>
                </div>
                @endif
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('marketing'))
                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion
                    @isset($page)
                        @if ($page == 'coupon' || $page == 'coupon-banner' || $page == 'coupon-image') hover show @endif
                    @endisset">
                    @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('marketing'))
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-stickies" viewBox="0 0 16 16">
                                    <path
                                        d="M1.5 0A1.5 1.5 0 0 0 0 1.5V13a1 1 0 0 0 1 1V1.5a.5.5 0 0 1 .5-.5H14a1 1 0 0 0-1-1H1.5z" />
                                    <path
                                        d="M3.5 2A1.5 1.5 0 0 0 2 3.5v11A1.5 1.5 0 0 0 3.5 16h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 16 9.586V3.5A1.5 1.5 0 0 0 14.5 2h-11zM3 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 .5.5V9h-4.5A1.5 1.5 0 0 0 9 10.5V15H3.5a.5.5 0 0 1-.5-.5v-11zm7 11.293V10.5a.5.5 0 0 1 .5-.5h4.293L10 14.793z" />
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </span>
                        <span class="menu-title">Coupon</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link @isset($page) @if ($page == 'coupon' && Request::get('coupon_type') == null) active  @endif @endisset"
                                href="{{ url('/admin/coupon') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Lists</span>
                            </a>
                            <a class="menu-link @if ( Request::get('coupon_type') != null && Request::get('coupon_type') == 'birthday') active @endif "
                                href="{{ url('/admin/coupon?coupon_type=birthday') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Birthday</span>
                            </a>
                            <a class="menu-link  @if ( Request::get('coupon_type') != null && Request::get('coupon_type') == 'welcome') active @endif"
                                href="{{ url('/admin/coupon?coupon_type=welcome') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Welcome</span>
                            </a>
                            <a class="menu-link  @isset($page) @if ($page == 'coupon-image') active  @endif @endisset"
                                href="{{ url('/admin/coupon-image') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Coupon Images</span>
                            </a>
                            <a class="menu-link  @isset($page) @if ($page == 'coupon-banner') active  @endif @endisset"
                            href="{{ url('/admin/coupon-banner') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Coupon Banner</span>
                        </a>
                        </div>
                    </div>
                    @endif
                </div>
                @endif
                {{-- <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion
                    @isset($page)
                        @if ($page == 'onSale' || $page == 'sale_category') hover show @endif
                    @endisset">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                    <path
                                        d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z" />
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </span>
                        <span class="menu-title">On Sale</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link @isset($page) @if ($page == 'onSale') active @endif @endisset"
                                href="{{ url('/admin/on-sale') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Lists</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link @isset($page) @if ($page == 'sale_category') active @endif @endisset"
                                href="{{ url('/admin/sale-category') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Sale Category</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion
                    @isset($page)
                        @if ($page == 'promotionCampaign' || $page == 'promotion_category') hover show @endif
                    @endisset">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-percent" viewBox="0 0 16 16">
                                    <path
                                        d="M13.442 2.558a.625.625 0 0 1 0 .884l-10 10a.625.625 0 1 1-.884-.884l10-10a.625.625 0 0 1 .884 0zM4.5 6a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 1a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zm7 6a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 1a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Promotion Campaign</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link @isset($page) @if ($page == 'promotionCampaign') active @endif @endisset"
                                href="{{ url('/admin/promotion-campaign') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Lists</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link @isset($page) @if ($page == 'promotion_category') active @endif @endisset"
                                href="{{ url('/admin/promotion-category') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Promotion Category</span>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="menu-item">
                    <a class="menu-link {{ isset($page) && $page == 'QDollarRebate' ? 'active-show' : '' }}"
                        href="{{ url('/admin/q-dollor-rebate') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">QDollar Rebate</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link {{ isset($page) && $page == 'freeGift' ? 'active-show' : '' }}"
                        href="{{ url('/admin/free-gift') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Free Gift</span>
                    </a>
                </div> --}}


                @if(auth()->user()->hasRole('admin'))

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Module Setting</span>
                    </div>
                </div>

                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion
                    @isset($page)
                        @if ($page == 'carrier' || $page == 'carrier-page' || $page == 'carrier_department') hover show @endif
                    @endisset">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">

                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
                                    <path
                                        d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1ZM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Z" />
                                    <path
                                        d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V1Zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3V1Z" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Career</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link @isset($page) @if ($page == 'carrier-page') active @endif @endisset"
                                href="{{ url('/admin/carrier-page') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Career Page</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link @isset($page) @if ($page == 'carrier') active @endif @endisset"
                                href="{{ url('/admin/carrier') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Career</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link @isset($page) @if ($page == 'carrier_department') active @endif @endisset"
                                href="{{ url('/admin/carrier-department') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Career Department</span>
                            </a>
                        </div>
                    </div>
                </div>
                @endif
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('manager') )
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">

                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Locations</span>
                    </div>
                </div>
                <div class="menu-item">
                    <a class="menu-link {{ isset($page) && $page == 'territory' ? 'active-show' : '' }} "
                        href="{{ url('admin/territories') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg width="23" height="20" viewBox="0 0 23 20" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.2796 9.68752L9.85561 10.1115C9.67162 10.2955 9.57562 10.5355 9.57562 10.7915C9.57562 11.0474 9.67962 11.2954 9.85561 11.4714L10.2796 11.8954C10.3098 11.9262 10.3459 11.9506 10.3858 11.9671C10.4256 11.9836 10.4684 11.9919 10.5116 11.9914H10.8556C11.0315 11.9914 11.1755 12.1354 11.1755 12.3114V14.0633C11.1755 14.2393 11.3195 14.3833 11.4955 14.3833H11.8395C11.8826 14.3837 11.9254 14.3755 11.9653 14.359C12.0052 14.3425 12.0413 14.3181 12.0715 14.2873L12.3995 13.9593C12.6395 13.7193 12.7755 13.3913 12.7755 13.0473V12.0554C12.7755 12.0074 12.7835 11.9594 12.8075 11.9114L13.5354 10.4475C13.5594 10.3995 13.5674 10.3515 13.5674 10.3035V9.90351C13.5674 9.72752 13.7114 9.58353 13.8874 9.58353H14.0394C14.2154 9.58353 14.3594 9.72752 14.3594 9.90351V10.0555C14.3594 10.2315 14.5034 10.3755 14.6794 10.3755H14.8313C15.0073 10.3755 15.1513 10.2315 15.1513 10.0555V9.90351C15.1513 9.72752 15.2953 9.58353 15.4713 9.58353H15.6233C15.7993 9.58353 15.9433 9.72752 15.9433 9.90351V10.0555C15.9433 10.2315 16.0873 10.3755 16.2633 10.3755H17.1592C17.2872 10.3755 17.4072 10.2955 17.4552 10.1755L18.1592 8.42359C18.1788 8.37506 18.1862 8.32247 18.1808 8.27041C18.1754 8.21835 18.1573 8.16842 18.128 8.12499C18.0988 8.08156 18.0594 8.04596 18.0132 8.02131C17.967 7.99666 17.9155 7.98372 17.8632 7.98361C17.6872 7.98361 17.5432 7.83962 17.5432 7.66363V6.71168C17.5432 6.53569 17.6872 6.39169 17.8632 6.39169H18.0152C18.1912 6.39169 18.3352 6.53569 18.3352 6.71168V6.79167C18.3352 7.01566 18.5112 7.19165 18.7351 7.19165C18.9591 7.19165 19.1351 7.01566 19.1351 6.79167V5.23976C19.1351 4.55179 18.5751 3.99982 17.8952 3.99982H17.8632C17.6872 3.99982 17.5432 4.14381 17.5432 4.3198V4.4718C17.5432 4.64779 17.3992 4.79178 17.2232 4.79178H16.2713C16.0953 4.79178 15.9513 4.64779 15.9513 4.4718C15.9513 4.20781 15.7353 3.99182 15.4713 3.99182H15.1513C14.7114 3.99182 14.3514 4.3518 14.3514 4.79178V4.81578C14.3514 4.90377 14.3114 4.99177 14.2474 5.05577L12.8475 6.3117C12.7915 6.3677 12.7115 6.39169 12.6315 6.39169H11.4795C11.3035 6.39169 11.1595 6.53569 11.1595 6.71168V6.86367C11.1595 7.03966 11.0155 7.18365 10.8396 7.18365H10.6876C10.5116 7.18365 10.3676 7.32765 10.3676 7.50364V8.45559C10.3676 8.63158 10.5116 8.77557 10.6876 8.77557H10.8396C11.0155 8.77557 11.1595 8.91956 11.1595 9.09555V9.24754C11.1595 9.42353 11.0155 9.56753 10.8396 9.56753H10.4956L10.4732 9.57713C10.4076 9.60673 10.3372 9.63712 10.2796 9.68752V9.68752ZM6.77577 15.1912C6.99976 15.1912 7.17575 15.0152 7.17575 14.7913V14.4313C7.17575 13.9113 7.46373 13.4473 7.92771 13.2153L8.41568 12.9673C8.63167 12.8554 8.77567 12.6314 8.77567 12.3914C8.77567 12.1434 8.63967 11.9194 8.41568 11.8154L7.47973 11.3514C7.27974 11.2474 7.05576 11.1994 6.83177 11.1994H6.47979C6.44716 11.1996 6.41482 11.1933 6.38462 11.181C6.35442 11.1686 6.32695 11.1504 6.3038 11.1274L4.84787 9.67152C4.82488 9.64837 4.80669 9.6209 4.79434 9.5907C4.78198 9.5605 4.77571 9.52816 4.77588 9.49553V9.04755C4.77588 8.91156 4.88787 8.79957 5.02386 8.79957H5.32785C5.46384 8.79957 5.57583 8.91156 5.57583 9.04755V9.19955C5.57583 9.42353 5.75183 9.59953 5.97581 9.59953C6.1998 9.59953 6.37579 9.42353 6.37579 9.19955V9.04755C6.37579 8.91156 6.48779 8.79957 6.62378 8.79957C6.97576 8.79957 7.31974 8.65558 7.56773 8.40759L7.79972 8.1756C7.89571 8.07961 7.89571 7.91961 7.79972 7.82362L7.24775 7.27165C7.22476 7.24849 7.20656 7.22103 7.19421 7.19083C7.18186 7.16063 7.17558 7.12829 7.17575 7.09566V6.79967C7.17575 6.57569 6.99976 6.39969 6.77577 6.39969C6.55178 6.39969 6.37579 6.57569 6.37579 6.79967C6.37579 7.02366 6.1998 7.19965 5.97581 7.19965C5.75183 7.19965 5.57583 7.02366 5.57583 6.79967V6.64768C5.57583 6.51169 5.68783 6.39969 5.82382 6.39969C5.96781 6.39969 6.07981 6.2797 6.07181 6.14371L6.05581 5.86372C6.04781 5.71973 6.1598 5.60774 6.3038 5.60774H6.92776C7.06376 5.60774 7.17575 5.49574 7.17575 5.35975V5.20776C7.17575 4.98377 7.35174 4.80778 7.57573 4.80778C7.79972 4.80778 7.97571 4.98377 7.97571 5.20776V6.80767C7.97571 7.03166 8.1517 7.20765 8.37569 7.20765C8.59967 7.20765 8.77567 7.03166 8.77567 6.80767V6.51169C8.77567 6.44769 8.79966 6.3837 8.84766 6.3357L9.17564 6.00772C9.43163 5.75173 9.57562 5.40775 9.57562 5.04777C9.57562 4.4718 9.11165 4.00782 8.53568 4.00782H7.25575C6.69577 4.00782 6.1598 4.23981 5.77582 4.64779L5.27985 5.18376C5.03186 5.45574 4.67988 5.60774 4.3119 5.60774H4.2319C4.09591 5.60774 3.98392 5.49574 3.98392 5.35975C3.98392 5.05577 3.73593 4.80778 3.43195 4.80778H2.93597C2.63199 4.80778 2.384 5.05577 2.384 5.35975V5.65573C2.384 6.13571 2.19201 6.59968 1.85603 6.93567L1.66404 7.12766C1.64105 7.15081 1.62286 7.17828 1.6105 7.20848C1.59815 7.23868 1.59188 7.27102 1.59204 7.30365V7.40764C1.59204 7.63163 1.85603 7.73562 2.01602 7.58363L3.02397 6.57569C3.12796 6.47169 3.27196 6.40769 3.42395 6.40769C3.58234 6.40769 3.51994 6.47329 3.42075 6.57969C3.32395 6.68208 3.19196 6.82207 3.19196 6.97566V8.86356C3.19196 9.19075 3.65194 9.50593 4.05111 9.78032C4.2391 9.90831 4.4127 10.0283 4.51989 10.1355L5.51984 11.1354C5.56783 11.1834 5.59183 11.2474 5.59183 11.3114V12.2074C5.59183 12.5914 5.74383 12.9673 6.01581 13.2393L6.31979 13.5433C6.36779 13.5913 6.39179 13.6553 6.39179 13.7193V14.8153C6.37579 15.0152 6.55978 15.1912 6.77577 15.1912V15.1912Z" />
                                    <path
                                        d="M16.2151 12.2873C16.0631 12.0953 15.9751 11.8553 15.9751 11.6073V11.4393C15.9751 11.3033 16.0871 11.1914 16.2231 11.1754H16.5271C16.6631 11.1754 16.7751 11.2873 16.7751 11.4233C16.7751 11.6553 17.055 11.7593 17.207 11.5913L17.503 11.2633C17.551 11.2154 17.615 11.1834 17.687 11.1834H18.375C18.8149 11.1834 19.1749 11.5433 19.1749 11.9833V12.6553C19.1749 12.8153 19.0309 12.9273 18.8789 12.8953L18.703 12.8553C18.6101 12.8346 18.5271 12.7829 18.4675 12.7088C18.4078 12.6346 18.3752 12.5424 18.375 12.4473C18.375 12.1993 18.159 12.0073 17.911 12.0313L17.791 12.0473C17.671 12.0633 17.575 12.1673 17.575 12.2953V12.5913C17.575 12.7033 17.495 12.8073 17.383 12.8313C17.015 12.9193 16.6231 12.7833 16.3831 12.4873L16.2151 12.2873ZM16.7751 14.7992C16.7751 15.0232 16.951 15.1991 17.175 15.1991H18.7749C18.9989 15.1991 19.1749 15.0232 19.1749 14.7992V14.0392C19.1749 13.9204 19.1277 13.8064 19.0437 13.7224C18.9597 13.6384 18.8458 13.5912 18.727 13.5912H17.439C17.071 13.5912 16.7751 13.8952 16.7751 14.2632V14.7992Z" />
                                    <path
                                        d="M0.415978 1.47192L5.57571 0L11.1834 1.59992L16.7751 0L21.9908 1.47192C22.2308 1.53592 22.3988 1.75191 22.3988 1.99989V19.455C22.3988 19.807 22.0628 20.0709 21.7189 19.9829L16.7831 18.4014L11.1834 19.9989L5.57571 18.391L0.679964 19.9829C0.599523 20.0031 0.515559 20.0046 0.434418 19.9876C0.353277 19.9705 0.27708 19.9352 0.211585 19.8843C0.14609 19.8335 0.0930101 19.7684 0.0563554 19.694C0.0197006 19.6196 0.000430211 19.5379 0 19.455V1.99989C0 1.75191 0.175991 1.53592 0.415978 1.47192V1.47192ZM11.1834 18.3918L16.7895 16.7999V16.8199L20.5029 17.9511C20.8549 18.047 21.1989 17.7831 21.1989 17.4231V3.19983C21.1989 2.95184 21.0309 2.73586 20.7909 2.67186L16.7751 1.61591V1.60632L11.1834 3.17903V3.18143L5.57571 1.60952V1.60632L1.56232 2.67186C1.44523 2.70223 1.34149 2.77049 1.26726 2.86599C1.19303 2.96149 1.15248 3.07887 1.15194 3.19983V17.4071C1.15194 17.7671 1.49752 18.031 1.8519 17.9351L5.57571 16.8071L11.1834 18.3942V18.3918V18.3918Z" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Area</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link {{ isset($page) && $page == 'district' ? 'active-show' : '' }} "
                        href="{{ url('admin/districts') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-buildings" viewBox="0 0 16 16">
                                    <path
                                        d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022ZM6 8.694 1 10.36V15h5V8.694ZM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15Z" />
                                    <path
                                        d="M2 11h1v1H2v-1Zm2 0h1v1H4v-1Zm-2 2h1v1H2v-1Zm2 0h1v1H4v-1Zm4-4h1v1H8V9Zm2 0h1v1h-1V9Zm-2 2h1v1H8v-1Zm2 0h1v1h-1v-1Zm2-2h1v1h-1V9Zm0 2h1v1h-1v-1ZM8 7h1v1H8V7Zm2 0h1v1h-1V7Zm2 0h1v1h-1V7ZM8 5h1v1H8V5Zm2 0h1v1h-1V5Zm2 0h1v1h-1V5Zm0-2h1v1h-1V3Z" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">District</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link {{ isset($page) && $page == 'area' ? 'active-show' : '' }} "
                        href="{{ url('admin/areas') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg width="21" height="20" viewBox="0 0 21 20" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20.3987 2.84466C20.3965 2.10329 20.1058 1.3919 19.5882 0.861138C19.0706 0.33038 18.3667 0.0219355 17.6256 0.00112547C16.8845 -0.0196846 16.1645 0.248774 15.6179 0.749649C15.0713 1.25052 14.7411 1.94448 14.6973 2.68455L5.8081 4.4621C5.60027 4.03013 5.2869 3.65752 4.89695 3.37871C4.507 3.0999 4.05306 2.92388 3.57709 2.86693C3.10111 2.80997 2.61846 2.87392 2.17374 3.05287C1.72902 3.23181 1.33659 3.51997 1.0327 3.89071C0.72882 4.26145 0.523296 4.70282 0.435127 5.17401C0.346958 5.6452 0.378989 6.13101 0.52826 6.58655C0.677531 7.04209 0.939224 7.45265 1.28915 7.78028C1.63908 8.10792 2.06596 8.34206 2.53032 8.46106V14.3819C2.04286 14.5071 1.59718 14.7589 1.23852 15.112C0.879866 15.465 0.620994 15.9067 0.488184 16.3921C0.355374 16.8775 0.353355 17.3895 0.482331 17.8759C0.611306 18.3624 0.866686 18.806 1.22255 19.1619C1.57841 19.5178 2.02209 19.7731 2.50854 19.9021C2.995 20.0311 3.50692 20.0291 3.99235 19.8963C4.47777 19.7635 4.91942 19.5046 5.27246 19.1459C5.62551 18.7873 5.87738 18.3416 6.00251 17.8541H11.9234C12.0422 18.3188 12.2763 18.746 12.6039 19.0963C12.9316 19.4465 13.3423 19.7085 13.798 19.8579C14.2538 20.0074 14.7398 20.0396 15.2113 19.9514C15.6827 19.8633 16.1243 19.6577 16.4953 19.3536C16.8662 19.0496 17.1545 18.6569 17.3335 18.2119C17.5124 17.767 17.5763 17.284 17.5192 16.8078C17.4621 16.3316 17.2858 15.8775 17.0067 15.4875C16.7276 15.0974 16.3547 14.7841 15.9223 14.5763L17.6999 5.68716C18.4276 5.64739 19.1125 5.33081 19.6143 4.80232C20.1161 4.27382 20.3967 3.57342 20.3987 2.84466ZM17.5398 1.41518C17.8225 1.41518 18.0989 1.49902 18.334 1.65609C18.569 1.81316 18.7523 2.03642 18.8605 2.29762C18.9687 2.55882 18.997 2.84624 18.9418 3.12353C18.8866 3.40082 18.7505 3.65553 18.5506 3.85545C18.3507 4.05536 18.096 4.19151 17.8187 4.24666C17.5414 4.30182 17.254 4.27351 16.9928 4.16532C16.7316 4.05712 16.5083 3.8739 16.3512 3.63883C16.1942 3.40375 16.1103 3.12738 16.1103 2.84466C16.1107 2.46565 16.2614 2.10228 16.5294 1.83428C16.7974 1.56629 17.1608 1.41556 17.5398 1.41518ZM1.81558 5.7036C1.81558 5.42088 1.89942 5.14451 2.05649 4.90943C2.21357 4.67435 2.43682 4.49113 2.69802 4.38294C2.95922 4.27475 3.24664 4.24644 3.52393 4.3016C3.80123 4.35675 4.05593 4.4929 4.25585 4.69281C4.45576 4.89273 4.59191 5.14744 4.64707 5.42473C4.70222 5.70202 4.67391 5.98944 4.56572 6.25064C4.45753 6.51184 4.27431 6.73509 4.03923 6.89217C3.80416 7.04924 3.52778 7.13308 3.24506 7.13308C2.86605 7.1327 2.50268 6.98197 2.23469 6.71398C1.96669 6.44598 1.81596 6.08261 1.81558 5.7036ZM3.24506 18.5689C2.96233 18.5689 2.68596 18.485 2.45088 18.328C2.21581 18.1709 2.03259 17.9476 1.9244 17.6864C1.8162 17.4252 1.78789 17.1378 1.84305 16.8605C1.89821 16.5832 2.03435 16.3285 2.23427 16.1286C2.43418 15.9287 2.68889 15.7925 2.96618 15.7374C3.24347 15.6822 3.53089 15.7105 3.79209 15.8187C4.0533 15.9269 4.27655 16.1101 4.43362 16.3452C4.59069 16.5803 4.67453 16.8567 4.67453 17.1394C4.67415 17.5184 4.52343 17.8818 4.25543 18.1498C3.98743 18.4178 3.62406 18.5685 3.24506 18.5689ZM11.9234 16.4247H6.00251C5.87448 15.9333 5.61769 15.4849 5.25862 15.1258C4.89955 14.7668 4.45119 14.51 3.95979 14.3819V8.46106C4.54377 8.30916 5.06445 7.97581 5.44684 7.50904C5.82923 7.04226 6.05358 6.46615 6.08757 5.8637L14.9768 4.08615C15.2569 4.66239 15.7222 5.12798 16.2983 5.40842L14.5207 14.2969C13.9183 14.3309 13.3422 14.5552 12.8754 14.9376C12.4086 15.32 12.0753 15.8407 11.9234 16.4247ZM14.6808 18.5689C14.3981 18.5689 14.1218 18.485 13.8867 18.328C13.6516 18.1709 13.4684 17.9476 13.3602 17.6864C13.252 17.4252 13.2237 17.1378 13.2788 16.8605C13.334 16.5832 13.4701 16.3285 13.6701 16.1286C13.87 15.9287 14.1247 15.7925 14.402 15.7374C14.6793 15.6822 14.9667 15.7105 15.2279 15.8187C15.4891 15.9269 15.7123 16.1101 15.8694 16.3452C16.0265 16.5803 16.1103 16.8567 16.1103 17.1394C16.1099 17.5184 15.9592 17.8818 15.6912 18.1498C15.4232 18.4178 15.0599 18.5685 14.6808 18.5689Z" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Location</span>
                    </a>
                </div>
                @endif
                @if(auth()->user()->hasRole('admin'))

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">General Setting</span>
                    </div>
                </div>
                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion
                    @isset($page)
                    @if ($page == 'users' || $page == 'roles' || $page == 'permissions') hover show @endif
                    @endisset">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-shield-lock" viewBox="0 0 16 16">
                                    <path
                                        d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z" />
                                    <path
                                        d="M9.5 6.5a1.5 1.5 0 0 1-1 1.415l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99a1.5 1.5 0 1 1 2-1.415z" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Backend Users</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link @isset($user_type) @if ($user_type == 'user') active @endif @endisset"
                                href="{{ route('users.list', 'user') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Users</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link @isset($user_type) @if ($user_type == 'merchant') active @endif @endisset"
                                href="{{ route('users.list', 'merchant') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Merchants</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link @isset($page) @if ($page == 'roles') active @endif @endisset"
                                href="{{ url('/admin/roles') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Roles</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link @isset($page) @if ($page == 'permissions') active @endif @endisset"
                                href="{{ url('/admin/permissions') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Permissions</span>
                            </a>
                        </div>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ isset($page) && $page == 'activitylog' ? 'active-show' : '' }}"
                            href="{{ url('/admin/activitylogs') }}">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-folder-symlink" viewBox="0 0 16 16">
                                        <path
                                            d="m11.798 8.271-3.182 1.97c-.27.166-.616-.036-.616-.372V9.1s-2.571-.3-4 2.4c.571-4.8 3.143-4.8 4-4.8v-.769c0-.336.346-.538.616-.371l3.182 1.969c.27.166.27.576 0 .742z" />
                                        <path
                                            d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14h10.348a2 2 0 0 0 1.991-1.819l.637-7A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2zm.694 2.09A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09l-.636 7a1 1 0 0 1-.996.91H2.826a1 1 0 0 1-.995-.91l-.637-7zM6.172 2a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672z" />
                                    </svg>
                                </span>
                            </span>
                            <span class="menu-title">Activity Logs</span>
                        </a>
                    </div>
                </div>
                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion
                    @isset($page)
                    @if ($page == 'users' || $page == 'roles' || $page == 'permissions') hover show @endif
                    @endisset">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-shield-lock" viewBox="0 0 16 16">
                                            <path
                                                d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z" />
                                            <path
                                                d="M9.5 6.5a1.5 1.5 0 0 1-1 1.415l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99a1.5 1.5 0 1 1 2-1.415z" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-title">Notification</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg">
                                <div class="menu-item">
                                    <a class="menu-link @isset($user_type) @if ($user_type == 'user') active @endif @endisset"
                                        href="{{ url('/admin/customnotification') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Custom Notification</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link @isset($user_type) @if ($user_type == 'merchant') active @endif @endisset"
                                        href="{{ url('/admin/notificationtype') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Notification Type</span>
                                    </a>
                                </div>
                            </div>
                </div>
                <div data-kt-menu-trigger="click"
                class="menu-item menu-accordion
                @isset($page)
                @if ($page == 'vaccine' || $page == 'relationshiptype' || $page == 'agegroup' || $page == 'disease' || $page == 'allergicdisease' 
                || $page == 'maintypealcohol' || $page == 'amountofalcoholdrinking' || $page == 'bloodtype' || $page == 'maritalstatus') hover show @endif
                @endisset">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-shield-lock" viewBox="0 0 16 16">
                                        <path
                                            d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z" />
                                        <path
                                            d="M9.5 6.5a1.5 1.5 0 0 1-1 1.415l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99a1.5 1.5 0 1 1 2-1.415z" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">Health Profile</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                            <div class="menu-item">
                                <a class="menu-link {{ isset($page) && $page == 'agegroup' ? 'active-show' : '' }}"
                                    href="{{ url('/admin/agegroup') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">AgeGroup</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ isset($page) && $page == 'relationshiptype' ? 'active-show' : '' }}"
                                    href="{{ url('/admin/relationshiptype') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Relationship Type</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ isset($page) && $page == 'vaccine' ? 'active-show' : '' }}"
                                    href="{{ url('/admin/vaccine') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Vaccine</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ isset($page) && $page == 'disease' ? 'active-show' : '' }}"
                                    href="{{ url('/admin/disease') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Disease</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ isset($page) && $page == 'allergicdisease' ? 'active-show' : '' }}"
                                    href="{{ url('/admin/allergicdisease') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Allergic Disease</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ isset($page) && $page == 'amountofalcoholdrinking' ? 'active-show' : '' }}"
                                    href="{{ url('/admin/amountofalcoholdrinking') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Amount Of Alcohol Drinking</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ isset($page) && $page == 'maintypealcohol' ? 'active-show' : '' }}"
                                    href="{{ url('/admin/maintypealcohol') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Main Type Alcohol</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ isset($page) && $page == 'bloodtype' ? 'active-show' : '' }}"
                                    href="{{ url('/admin/bloodtype') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Blood Type</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ isset($page) && $page == 'maritalstatus' ? 'active-show' : '' }}"
                                    href="{{ url('/admin/maritalstatus') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Marital Status</span>
                                </a>
                            </div>
                        </div>
            </div>
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Site Setting</span>
                    </div>
                </div>
                <div class="menu-item">
                    <a class="menu-link {{ isset($page) && $page == 'header' ? 'active-show' : '' }}"
                        href="{{ url('/admin/header') }}">
                        <span class="menu-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-border-top" viewBox="0 0 16 16">
                                <path
                                    d="M0 0v1h16V0H0zm1 2.844v-.938H0v.938h1zm6.5-.938v.938h1v-.938h-1zm7.5 0v.938h1v-.938h-1zM1 4.719V3.78H0v.938h1zm6.5-.938v.938h1V3.78h-1zm7.5 0v.938h1V3.78h-1zM1 6.594v-.938H0v.938h1zm6.5-.938v.938h1v-.938h-1zm7.5 0v.938h1v-.938h-1zM.5 8.5h.469v-.031H1V7.53H.969V7.5H.5v.031H0v.938h.5V8.5zm1.406 0h.938v-1h-.938v1zm1.875 0h.938v-1H3.78v1zm1.875 0h.938v-1h-.938v1zm2.813 0v-.031H8.5V7.53h-.031V7.5H7.53v.031H7.5v.938h.031V8.5h.938zm.937 0h.938v-1h-.938v1zm1.875 0h.938v-1h-.938v1zm1.875 0h.938v-1h-.938v1zm1.875 0h.469v-.031h.5V7.53h-.5V7.5h-.469v.031H15v.938h.031V8.5zM0 9.406v.938h1v-.938H0zm7.5 0v.938h1v-.938h-1zm8.5.938v-.938h-1v.938h1zm-16 .937v.938h1v-.938H0zm7.5 0v.938h1v-.938h-1zm8.5.938v-.938h-1v.938h1zm-16 .937v.938h1v-.938H0zm7.5 0v.938h1v-.938h-1zm8.5.938v-.938h-1v.938h1zM0 16h.969v-.5H1v-.469H.969V15H.5v.031H0V16zm1.906 0h.938v-1h-.938v1zm1.875 0h.938v-1H3.78v1zm1.875 0h.938v-1h-.938v1zm1.875-.5v.5h.938v-.5H8.5v-.469h-.031V15H7.53v.031H7.5v.469h.031zm1.875.5h.938v-1h-.938v1zm1.875 0h.938v-1h-.938v1zm1.875 0h.938v-1h-.938v1zm1.875-.5v.5H16v-.969h-.5V15h-.469v.031H15v.469h.031z" />
                            </svg>
                        </span>
                        <span class="menu-title">Header</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ isset($page) && $page == 'footer' ? 'active-show' : '' }}"
                        href="{{ url('/admin/footer') }}">
                        <span class="menu-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-border-bottom" viewBox="0 0 16 16">
                                <path
                                    d="M.969 0H0v.969h.5V1h.469V.969H1V.5H.969V0zm.937 1h.938V0h-.938v1zm1.875 0h.938V0H3.78v1zm1.875 0h.938V0h-.938v1zM7.531.969V1h.938V.969H8.5V.5h-.031V0H7.53v.5H7.5v.469h.031zM9.406 1h.938V0h-.938v1zm1.875 0h.938V0h-.938v1zm1.875 0h.938V0h-.938v1zm1.875 0h.469V.969h.5V0h-.969v.5H15v.469h.031V1zM1 2.844v-.938H0v.938h1zm6.5-.938v.938h1v-.938h-1zm7.5 0v.938h1v-.938h-1zM1 4.719V3.78H0v.938h1zm6.5-.938v.938h1V3.78h-1zm7.5 0v.938h1V3.78h-1zM1 6.594v-.938H0v.938h1zm6.5-.938v.938h1v-.938h-1zm7.5 0v.938h1v-.938h-1zM.5 8.5h.469v-.031H1V7.53H.969V7.5H.5v.031H0v.938h.5V8.5zm1.406 0h.938v-1h-.938v1zm1.875 0h.938v-1H3.78v1zm1.875 0h.938v-1h-.938v1zm2.813 0v-.031H8.5V7.53h-.031V7.5H7.53v.031H7.5v.938h.031V8.5h.938zm.937 0h.938v-1h-.938v1zm1.875 0h.938v-1h-.938v1zm1.875 0h.938v-1h-.938v1zm1.875 0h.469v-.031h.5V7.53h-.5V7.5h-.469v.031H15v.938h.031V8.5zM0 9.406v.938h1v-.938H0zm7.5 0v.938h1v-.938h-1zm8.5.938v-.938h-1v.938h1zm-16 .937v.938h1v-.938H0zm7.5 0v.938h1v-.938h-1zm8.5.938v-.938h-1v.938h1zm-16 .937v.938h1v-.938H0zm7.5 0v.938h1v-.938h-1zm8.5.938v-.938h-1v.938h1zM0 15h16v1H0v-1z" />
                            </svg>
                        </span>
                        <span class="menu-title">Footer</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link {{ isset($page) && $page == 'home' ? 'active-show' : '' }}"
                        href="{{ url('/admin/home') }}">
                        <span class="menu-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-border-top" viewBox="0 0 16 16">
                                <path
                                    d="M0 0v1h16V0H0zm1 2.844v-.938H0v.938h1zm6.5-.938v.938h1v-.938h-1zm7.5 0v.938h1v-.938h-1zM1 4.719V3.78H0v.938h1zm6.5-.938v.938h1V3.78h-1zm7.5 0v.938h1V3.78h-1zM1 6.594v-.938H0v.938h1zm6.5-.938v.938h1v-.938h-1zm7.5 0v.938h1v-.938h-1zM.5 8.5h.469v-.031H1V7.53H.969V7.5H.5v.031H0v.938h.5V8.5zm1.406 0h.938v-1h-.938v1zm1.875 0h.938v-1H3.78v1zm1.875 0h.938v-1h-.938v1zm2.813 0v-.031H8.5V7.53h-.031V7.5H7.53v.031H7.5v.938h.031V8.5h.938zm.937 0h.938v-1h-.938v1zm1.875 0h.938v-1h-.938v1zm1.875 0h.938v-1h-.938v1zm1.875 0h.469v-.031h.5V7.53h-.5V7.5h-.469v.031H15v.938h.031V8.5zM0 9.406v.938h1v-.938H0zm7.5 0v.938h1v-.938h-1zm8.5.938v-.938h-1v.938h1zm-16 .937v.938h1v-.938H0zm7.5 0v.938h1v-.938h-1zm8.5.938v-.938h-1v.938h1zm-16 .937v.938h1v-.938H0zm7.5 0v.938h1v-.938h-1zm8.5.938v-.938h-1v.938h1zM0 16h.969v-.5H1v-.469H.969V15H.5v.031H0V16zm1.906 0h.938v-1h-.938v1zm1.875 0h.938v-1H3.78v1zm1.875 0h.938v-1h-.938v1zm1.875-.5v.5h.938v-.5H8.5v-.469h-.031V15H7.53v.031H7.5v.469h.031zm1.875.5h.938v-1h-.938v1zm1.875 0h.938v-1h-.938v1zm1.875 0h.938v-1h-.938v1zm1.875-.5v.5H16v-.969h-.5V15h-.469v.031H15v.469h.031z" />
                            </svg>
                        </span>
                        <span class="menu-title">Home</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link {{ isset($page) && $page == 'slider' ? 'active-show' : '' }}"
                        href="{{ url('/admin/sliders') }}">
                        <span class="menu-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-sliders" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z" />
                            </svg>
                        </span>
                        <span class="menu-title">Slider</span>
                    </a>
                </div>

                {{-- <div class="menu-item">
                    <a class="menu-link {{ isset($page) && $page == 'dashboard-slider' ? 'active-show' : '' }}"
                        href="{{ url('/admin/dashboard-sliders') }}">
                        <span class="menu-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-sliders" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z" />
                            </svg>
                        </span>
                        <span class="menu-title">Dashboard Slider</span>
                    </a>
                </div> --}}

                <div class="menu-item">
                    <a class="menu-link {{ isset($page) && $page == 'payment_type' ? 'active-show' : '' }}"
                        href="{{ url('/admin/payment-type') }}">
                        <span class="menu-icon">
                            <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" width="20px"
                                height="16px;" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64"
                                enable-background="new 0 0 64 64" xml:space="preserve" fill="currentColor">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <g>
                                        <line fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-miterlimit="10" x1="32" y1="14.999" x2="46"
                                            y2="14.999"></line>
                                        <line fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-miterlimit="10" x1="18" y1="23.999" x2="46"
                                            y2="23.999"></line>
                                        <line fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-miterlimit="10" x1="18" y1="33.999" x2="46"
                                            y2="33.999"></line>
                                        <line fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-miterlimit="10" x1="18" y1="43.999" x2="46"
                                            y2="43.999"></line>
                                        <line fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-miterlimit="10" x1="18" y1="53.999" x2="46"
                                            y2="53.999"></line>
                                    </g>
                                    <g>
                                        <polygon fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-miterlimit="10"
                                            points="52,62.999 52,0.999 26,0.999 12,14.999 12,63 16,61 20,63 24,61 28,63 32,61 36,63 40,61 44,63 48,61 ">
                                        </polygon>
                                        <polyline fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-miterlimit="10" points="12,14.999 26,14.999 26,0.999 "></polyline>
                                    </g>
                                </g>
                            </svg>
                        </span>
                        <span class="menu-title">Payment Type</span>
                    </a>
                </div>
                @endif
                {{-- <div class="menu-item">
                    <a class="menu-link" href="#">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-file-code" viewBox="0 0 16 16">
                                    <path
                                        d="M6.646 5.646a.5.5 0 1 1 .708.708L5.707 8l1.647 1.646a.5.5 0 0 1-.708.708l-2-2a.5.5 0 0 1 0-.708l2-2zm2.708 0a.5.5 0 1 0-.708.708L10.293 8 8.646 9.646a.5.5 0 0 0 .708.708l2-2a.5.5 0 0 0 0-.708l-2-2z" />
                                    <path
                                        d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Custom Code</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link" href="#">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-bar-chart" viewBox="0 0 16 16">
                                <path
                                    d="M4 11H2v3h2v-3zm5-4H7v7h2V7zm5-5v12h-2V2h2zm-2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1h-2zM6 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm-5 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3z" />
                            </svg>
                            <!--end::Svg Icon-->
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Google Analytics</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link" href="#">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-code-slash" viewBox="0 0 16 16">
                                    <path
                                        d="M10.478 1.647a.5.5 0 1 0-.956-.294l-4 13a.5.5 0 0 0 .956.294l4-13zM4.854 4.146a.5.5 0 0 1 0 .708L1.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0zm6.292 0a.5.5 0 0 0 0 .708L14.293 8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5a.5.5 0 0 0-.708 0z" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Facebook Pixel</span>
                    </a>
                </div> --}}
                {{-- <div class="menu-item">
                    <div class="">
                        <div class="separator mx-1 my-4"></div>
                    </div>
                </div> --}}


                <div class="sticky-sidebar">
                    {{-- <div class="menu-item">
                        <a class="menu-link" href="#">
                            <span class="menu-icon">
                                
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-headset" viewBox="0 0 16 16">
                                        <path
                                            d="M8 1a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a6 6 0 1 1 12 0v6a2.5 2.5 0 0 1-2.5 2.5H9.366a1 1 0 0 1-.866.5h-1a1 1 0 1 1 0-2h1a1 1 0 0 1 .866.5H11.5A1.5 1.5 0 0 0 13 12h-1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h1V6a5 5 0 0 0-5-5z" />
                                    </svg>
                                </span>
                             
                            </span>
                            <span class="menu-title">Look For Support?</span>
                        </a>
                    </div> --}}
                    {{-- <div class="menu-item">
                        <a class="menu-link" href="{{ url('/admin') }}">
                            <span class="menu-icon">
                               
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-telephone-outbound" viewBox="0 0 16 16">
                                        <path
                                            d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zM11 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-4.146 4.147a.5.5 0 0 1-.708-.708L14.293 1H11.5a.5.5 0 0 1-.5-.5z" />
                                    </svg>
                                </span>
                               
                            </span>
                            <span class="menu-title">Contact Web Developer</span>
                        </a>
                    </div> --}}
                    <div class="menu-item">
                        <a class="menu-link" href="{{ url('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
                                        <path d="M7.5 1v7h1V1h-1z" />
                                        <path
                                            d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title sidebar-text">Logout</span>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </a>
                    </div>
                </div>
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Aside Menu-->
    </div>
    <!--end::Aside menu-->
    <!--begin::Footer-->
</div>
<!--end::Aside-->

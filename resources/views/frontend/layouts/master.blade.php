<!DOCTYPE html>
<html lang="{{lang()}}">

<head>
    @if(config('app.env') == 'production')
    <meta name="robots" content="noindex">
    <script>
    (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-MX4P5BP');
    </script>
    @endif
    <script>
          const isAuth = {!! json_encode(Auth::guard('customer')->check()) !!};
    </script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="viewport" id="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @yield('meta')
    <title>@yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- <link rel="stylesheet" href="https://cdn.tutorialjinni.com/intl-tel-input/17.0.8/css/intlTelInput.css" /> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/tutorialjinni.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style.css') }}" />
    <link rel="shortcut icon" href="{{asset('frontend/img/favicon.ico')}}" />
    {{-- <link rel="shortcut icon" href="{{ asset('backend/media/shortcut_logo.png') }}" /> --}}


    <link rel="shortcut icon" href="{{asset('frontend/img/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('frontend/img/favicon.ico')}}" type="image/x-icon">

    <!-- <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet"> -->

    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" /> -->

    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" /> -->

    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" /> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/toastr.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/venobox/2.0.4/venobox.min.css"
        integrity="sha512-HFaR9dTfvVVIkca85XvaYOlbZqtyRp5f7cyfb3ycnQU60RM1qjmJKq7qZPLDI+nudOkFDuY5giiwQqfbP7M36g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css"
        integrity="sha512-WEQNv9d3+sqyHjrqUZobDhFARZDko2wpWdfcpv44lsypsSuMO0kHGd3MQ8rrsBn/Qa39VojphdU6CMkpJUmDVw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.css" /> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/slick-theme.css') }}" />
    <link href="{{ asset('frontend/css/jquery-ui.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.scrollbar.min.css') }}"
        integrity="sha512-xlddSVZtsRE3eIgHezgaKXDhUrdkIZGMeAFrvlpkK0k5Udv19fTPmZFdQapBJnKZyAQtlr3WXEM3Lf4tsrHvSA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('frontend/css/fullcalendar.main.css') }}" />

    <style>
        .toast-success {
            --tw-bg-opacity: 1;
            background-color: rgba(51, 51, 51, var(--tw-bg-opacity)) !important;
        }
        .grecaptcha-badge {
            /* position: unset !important;
            margin-left: auto !important;
            position: fixed !important; */
            display: none !important;
            /* visibility: visible !important; */
        }
        .click-disable {
            pointer-events: none !important;
            cursor: default !important;
        }
        /* .preview-reminder-popup, .reminder-popup{
            opacity: 1 !important;
        } */
        /* .heart-feault-show,.healthcare-heart{
            display: block;
        } */
    </style>
</head>

<body>
    @if(Route::current() != null)
        @if (Route::current()->getName() == 'product-detail' ||
                Route::current()->getName() == 'products.listings' ||
                Route::current()->getName() == 'coupon.list' ||
                Route::current()->getName() == 'faq' ||
                Route::current()->getName() == 'faq.category' ||
                Route::current()->getName() == 'faq.detail' ||
                Route::current()->getName() == 'faq.sub.category' ||
                Route::current()->getName() == 'partnership' ||
                Route::current()->getName() == 'privacy.policy' ||
                Route::current()->getName() == 'termofuse' ||
                Route::current()->getName() == 'termofuse.coupon' ||
                Route::current()->getName() == 'best' ||
                Route::current()->getName() == 'carrier' ||
                Route::current()->getName() == 'carrier.detail' ||
                Route::current()->getName() == 'contact' ||
                Route::current()->getName() == 'about' ||
                Route::current()->getName() == 'booking.process' ||
                Route::current()->getName() == 'blog.details')
            <div class="bg-whitez">
        @elseif(Route::current()->getName() == 'checkout.init')
            <div class="bg-far">
        @else
            <div class="bg-meBg">
        @endif
    @else
    <div>
    @endif
    @include('frontend.layouts.header')

    @if(config('app.env') == 'production')
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MX4P5BP"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    @endif
    @yield('content')
    @include('frontend.layouts.footer')
    @include('frontend.auth_dialogs')
    {{-- preview-reminder-popup bg-darkgray text-light me-body16 font-bold fixed top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 rounded-lg w-fit py-2 px-5 fade-out hidden --}}
    <div class="preview-reminder-popup bg-darkgray text-light me-body16 font-bold fixed top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 rounded-lg w-fit py-2 px-5">
        {{-- Added to cart successfully --}}
        @lang('labels.wishlist.success_message')

    </div>
    </div>
    @if(Route::current() != null)
    @if (Route::current()->getName() == 'mediq')
        <div compnent-name="me-checkout-complete-loading" id="me-checkout-complete-loading"
        class="me-checkout-complete-loading-container">
        <div
            class="me-checkout-complete-loading-content p-10 py-5 rounded-[12px] sm:w-[300px] w-[250px] h-[140px] absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 flex justify-center items-center">
            <div class="relative w-full">
                <div class="me-checkout-complete-loading">

                </div>
            </div>
        </div>
        </div>
    @endif
    @endif

 

    <script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-ui.js') }}"></script>
         @if(Route::current() != null)
            @if (Route::current()->getName() == 'mediq')
                <script>
                    $(document).ready(function() {
                        showLoading()
                        console.log("loading....")
                        $(window).on('load', function() {
                            setTimeout(function () {
                                hideLoading()
                            }, 1000);
                        });
                    })
                </script>
            @endif
        @endif
    <script type="text/javascript" src="{{ asset('frontend/js/slick.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/jquery.modal.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.scrollbar.js') }}"></script>
    <script src="{{ asset('frontend/js/fullcalendar.main.js') }}"></script>
    <script src="{{ asset('frontend/js/fullcalendar.main.min.js') }}"></script>


   
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="{{ asset('frontend/js/scripts.js?v=' . time()) }}"></script>
    <script src="{{ asset('frontend/js/auth.js?v=' . time()) }}"></script>
    <script src="{{ asset('frontend/js/general.js?v=' . time()) }}"></script>
    <script src='https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit' async defer></script>

    <!-- JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>

 
    <script>

        window.translations = {
            comparing: '@lang('labels.compare.comparing')',
            remove_product: '@lang('labels.remove_product')',
            login: '@lang('labels.log_in_register.login')',
            login_to: '@lang('labels.log_in_register.to_login')',
            register: '@lang('labels.log_in_register.register')',
            to_register: '@lang('labels.log_in_register.to_register')',
            reset: '@lang('labels.log_in_register.reset_pwd')',
            reset_to: '@lang('labels.log_in_register.reset_pwd_to')',
            ph_no_must_8digit: '@lang('labels.check_out.ph_no_must_8digit')',
            invalid_number: '@lang('labels.log_in_register.invalid_number')',
            valid_email: '@lang('labels.log_in_register.valid_email')',
            valid_email: '@lang('labels.log_in_register.valid_email')',
        };
        // var login = "{{ Auth::guard('customer')->check() }}";
        // if(login){
        //     console.log("This is javascript session"+ login);

        //     $(".sign-in-container .before-login-container").addClass("hidden");
        //     $(".sign-in-container .login-container").removeClass("hidden");

        // }
        var copied = "{{__('labels.copied')}}"

        $(document).ready(function() {
            let reg_success_msg = {!! json_encode(Session::has('reg_success_msg'))!!}
            var is_auth = {!! json_encode(Auth::guard('customer')->check()) !!}
            var customer = {!! json_encode(Auth::guard('customer')->user()) !!}
            // accountInfos(is_auth,customer)
            if(reg_success_msg){
                $(".lr-reg-successful-popup").addClass("flex");
            }
            toastr.options = {
                positionClass: 'toast-top-center',
                timeOut : 1000,
            };
            var app_url = "{!! request()->getHttpHost() !!}"
            // var email_exist_msg = {!! json_encode(Session::get('email_exist_msg')) !!}
            // console.log(email_exist_msg);
            // if(email_exist_msg){
            //     toastr.success(email_exist_msg);
            // }
            
            $(document).on('click', '.coupon-copy-btn', function () {
                var copyText = $(this).prev().find('p').text().trim('');
                navigator.clipboard.writeText(copyText);
                toastr.success(copied);
            })

            $("#btn-refcopy").on("click",function(){
                var copyText = document.getElementById("copytext");
                copyText.select();
                copyText.setSelectionRange(0, 99999); // For mobile devices
                navigator.clipboard.writeText(copyText.value);
                toastr.success(copied);
            });
        });
        // $(".login-btn").on("click", function (e) {
        //     e.preventDefault();
        //     // clear error messages
        //     $("p.text-mered").addClass("hidden");
        //     // console.log("Login click ...");

        //     var login_mail = $(
        //         ".lr-login-with-email-popup #log-email-address input[name=email-address]"
        //     ).val();
        //     var login_pwd = $(
        //         ".lr-login-with-email-popup input[name=login-password]"
        //     ).val();

        //     var remember_me = $('input[name="remember_me"]:checked').each(function () {
        //         return this.value;
        //     });
        //     var segment1 = "{{request()->segment(1)}}"
        //     var segment2 = "{{request()->segment(2)}}"
        //     $.ajax({
        //         url: app_url + "/api/user/email-login",
        //         headers: {"X-App-Locale": lng},
        //         dataType: "json",
        //         type: "POST",
        //         data: {
        //             email: login_mail,
        //             password: login_pwd,
        //             remember_me: remember_me.length,
        //             "g-recaptcha-response": $(".g-recaptcha-response").val(),
        //         },
        //         success: function (resp) {
        //             // console.log("Register ...", resp);
        //             if (resp.success) {
        //                 $(".sign-in-container .before-login-container").addClass(
        //                     "hidden"
        //                 );
        //                 $(".sign-in-container .login-container").removeClass("hidden");
        //                 $(
        //                     ".sign-in-container .login-container .sign-in-name span.mediq-user"
        //                 ).text(
        //                     `${resp.data.user.first_name} ${resp.data.user.last_name}`
        //                 );
        //                 localStorage.setItem("token", resp.data.access_token);
        //                 localStorage.setItem("first_name", resp.data.user.first_name);
        //                 localStorage.setItem("last_name", resp.data.user.last_name);

        //                 $(".lr-register-popup").removeClass("flex");
        //                 $(".lr-login-with-email-popup").removeClass("flex");
        //                 $(".lr-reg-successful-popup").removeClass("flex");
        //                 if(segment1 == 'product-detail' || segment2 == 'product-detail'  ){
        //                     var is_auth = resp.data.is_auth;
        //                     var customer = resp.data.user
        //                     $("body").removeClass("overflow-hidden");
        //                     accountInfos(is_auth,customer)
        //                     addToCart()
        //                 }else{
        //                     location.reload();
        //                 }
                        
        //             }
        //         },
        //         error: function (xhr, error, resp) {
        //             // console.log(xhr.responseJSON.message);
        //             $("#log-email-address p.pw-err").removeClass("hidden");
        //             $("#log-email-address p.pw-err").text(xhr.responseJSON.message);
        //         },
        //     });
        // });
        function accountInfos(is_auth,customer){
            if(is_auth == true){
                $('.is_login').removeClass('hidden')
                $('.is_not_login').addClass('hidden')
                $('.login_collect').removeClass('notshow')
                $('.login_not_collect').addClass('notshow')
                console.log('customer',customer)
                if(customer){
                    var profile_image = "";
                    $('.customer_first_name').text(customer.first_name)
                    if(customer.google_id != null || customer.facebook_id != null ){
                        profile_image += `<img src="`+customer.profile_img+`" class="w-[2.25rem] rounded-full object-cover login-profile-img preview-img">`;
                    }else if(customer.profile_img){
                        var image = '/storage/customer/'+customer.profile_img;
                        profile_image += `<img src="`+image+`" class="w-[2.25rem] rounded-full object-cover login-profile-img preview-img">`;
                    }else{
                        profile_image += `<img src="{{asset('frontend/img/me-profile-img.svg')}}" class="w-[2.25rem] rounded-full object-cover login-profile-img preview-img">`;
                    }
                    $('.profile_image').html(profile_image)
                }
            }
        }
        $(document).ready(function() {
            $('.search-key').keyup(function() {
                // $('.searched').html('');
                // $('.searched').empty();

                var keyword = $(this).val();
                $.ajax({
                    url: '/search-keyword', // Replace with your Laravel route
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "keyword": keyword
                    },
                    success: function(response) {
                        // Handle the response from the backend
                        // console.log(response);
                    },
                    error: function(xhr) {
                        // Handle errors
                    }
                }).done(function(data) {

                    // console.log(data);
                    $('.searched').html(data);
                })
            });
        });
    </script>
    <script>
        window.brand_category_route = "{{ route('products.category.brands') }}";
    </script>
     <script>
        $(document).on('click', '.btn-quickview', function(e) {
            productId = $(this).attr("data-id");
                   var self = this;
                   $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                    $.post('{{ route('product.modal') }}', {
                        productId: productId
                    }, function(data) {
                        $(".custom-product-modal").html(data);
                        openQuickPreview(e);

                        if($(window).innerWidth > 767) {
                        $(document).on('click', '.me-medical-sub img', function () {
                        var selectImg = $(this).data('image');
                        var targetParent = $(this).parent().parent().children('.me-medical-main');
                        var original = targetParent.find('img').attr('src');
                        targetParent.find('img').attr('src', selectImg);
                        $(this).parent().addClass('active');
                        $(this).parent().siblings().removeClass('active');
                        })
                        } else {
                        const sliderImg = $('.me-medical-sub');
                        sliderImg.each(function(){
                        $(this).not('.slick-initialized').slick({
                        variableWidth: true,
                        arrows: false,
                        infinite: true,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        })
                        })

                        }
                        
                    });
        })
    </script>
    <script>
        
        let collectText = "{{app()->getLocale() == 'en'?'Collected':'领取咗'}}";

        $(document).ready(function() {
            $("input").attr("autocomplete", "off");
            $('.search-item-desktop').on('keyup', function() {
                search();
            });

            $('.search-item-desktop').on('focus', function() {
                search();
            });

            function search() {
                $(".desktop-search").css("width", "570px");
                var searchKey = $('.search-item-desktop').val();
                //console.log(searchKey)
                $.post('{{ route('search.ajax') }}', {
                    search: searchKey
                }, function(data) {
                    ///console.log(data)
                    $(".search-lists .recent-search-type").html(data);
                });

            }


            // $('#search-item2').on('focus', function() {
            //     searchMobile();
            // });
            // $('#search-item2').on('keydown', function() {
            //     searchMobile();
            // });
            // $('#search-item2').on('keyup', function() {
            //     searchMobile();
            // });
            var timeout;
            $('#search-item2').bind('input propertychange', function() {
                //console.log("property change");
                 clearTimeout(timeout);
                timeout = setTimeout(searchMobile(), 3000); 
                //searchMobile();
            });
            // $('#search-item2').on('click touchstart', function() {
            //     console.log('Click or touch event fired');
            //     searchMobile();
            // });

            $('#search-item2').on('paste', function(e) {
                setTimeout(function() {
                    searchMobile();
                }, 0);
            });

            document.getElementById('search-item2').addEventListener('keypress', function (e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    var searchKey = $('#search-item2').val();
                if (searchKey.length > 0) {
                    $.post('{{ route('search') }}', {
                        search: searchKey
                    }, function(data) {
                        if (data.status == "no") {
                            $(".mobile-search").toggleClass("hidden")
                            $(".mobile-search-list .recent-search-type_mobile").html(data.message);
                        }
                        window.location = "/"+lng+"/products?searchkeywords=" + searchKey;
                    });
                }
                }
            });
            $(".mobile-search-list").css("width", "100%");
            function searchMobile() {
                $(".mobile-search-list").css("width", "100%");
                var searchKey = $('#search-item2').val();
                console.log(searchKey)
                $.post('{{ route('search.ajax.mobile') }}', {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    search: searchKey
                }, function(data) {
                    console.log(data)
                    $(".mobile-search-list .recent-search-type_mobile").html(data);
                });
            }
            // table row with ajax
            let noResultText = "{{app()->getLocale() == 'en'?'No results found. Please try a different search.':'No Result'}}";

            function table_post_row(res) {
                dataLength = res.data.categories.length + res.data.product.length + res.data.merchants.length ;
                console.log(dataLength, res);
                let htmlView = '';
                if (dataLength <= 0) {
                    htmlView += noResultText;
                }
                if (res.data.categories.length > 0){
                    console.log(res.data.categories.length)
                    htmlView += ` <div class="recent-search-category mt-[12px]">
                                  <h6 class="mb-[4px] helvetica-normal me-body18 font-medium text-lightgray">Category</h6>`;
                    for(let i = 0; i < res.data.categories.length; i++){
                            var pcValue = res.data.categories[i].id;
                            console.log(pcValue);
                            var product_detail_link = "{{ route('products.listings', ['tf' => 'recommend', 'view' => 'list-view', 'page' => 1, 'pc' => ':pcValue']) }}";
                            product_detail_link = product_detail_link.replace(':pcValue', pcValue);
                            htmlView += `
                                    <a href = `+ product_detail_link +`>
                                    <div class="flex flex-wrap items-center justify-start recent-search-items pl-[20px]">
                                    <p
                                        class="flex items-center justify-between w-full mb-[16px] helvetica-normal font-medium me-body18 text-darkgray">
                                        `+res.data.categories[i].name_en+`
                                        <img src="{{ asset('frontend/img/cross-arrow.svg') }}" alt="cross-arrow img"
                                        class="cross-arrow-img" />
                                    </p>
                                    </div>
                                    </a>
                                </div>
                        `
                }
                }
                if (res.data.merchants.length > 0){
                    console.log(res.data.merchants.length)
                    htmlView += ` <div class="recent-search-category mt-[12px]">
                                  <h6 class="mb-[4px] helvetica-normal me-body18 font-medium text-lightgray">Brand</h6>`;
                    for(let i = 0; i < res.data.merchants.length; i++){
                            var pcValue = res.data.merchants[i].id;
                            var product_detail_link = "{{ route('products.listings', ['tf' => 'recommend', 'view' => 'list-view', 'page' => 1, 'pc' => ':pcValue']) }}";
                            product_detail_link = product_detail_link.replace(':pcValue', pcValue);
                            htmlView += `
                                    <div class="flex flex-wrap items-center justify-start recent-search-items pl-[20px]">
                                    <p
                                        class="flex items-center justify-between w-full mb-[16px] helvetica-normal font-medium me-body18 text-darkgray">
                                        `+res.data.merchants[i].name_en+`
                                        <img src="{{ asset('frontend/img/cross-arrow.svg') }}" alt="cross-arrow img"
                                        class="cross-arrow-img" />
                                    </p>
                                    </div>
                                </div>
                        `
                }
                }
                if (res.data.product.length > 0){
                    console.log(res.data.product.length)
                    htmlView += ` <div class="recent-search-category mt-[12px]">
                                  <h6 class="mb-[4px] helvetica-normal me-body18 font-medium text-lightgray">Product</h6>`;
                    for(let i = 0; i < res.data.product.length; i++){
                            var pcValue = res.data.product[i].id;
                            var product_detail_link = "{{ route('products.listings', ['tf' => 'recommend', 'view' => 'list-view', 'page' => 1, 'pc' => ':pcValue']) }}";
                            product_detail_link = product_detail_link.replace(':pcValue', pcValue);
                            htmlView += `
                                    <a href = `+ product_detail_link +`>
                                    <div class="flex flex-wrap items-center justify-start recent-search-items pl-[20px]">

                                    <p
                                        class="flex items-center justify-between w-full mb-[16px] helvetica-normal font-medium me-body18 text-darkgray">
                                        `+res.data.product[i].name_en+`
                                        <img src="{{ asset('frontend/img/cross-arrow.svg') }}" alt="cross-arrow img"
                                        class="cross-arrow-img" />
                                    </p>

                                    </div>
                                    </a>
                                </div>
                        `
                }
                }

                $('#data').html(htmlView);
            }

            $('body').on('click', '#btn-search',function() {
                var searchKey = $('.search-item-desktop').val();
                if (searchKey.length > 0) {
                    $.post('{{ route('search') }}', {
                        search: searchKey
                    }, function(data) {
                       // console.log(data.status)
                        if (data.status == "no") {
                            //$(".desktop-search").toggleClass("hidden")
                            $(".search-lists .recent-search-type").html(data.message);
                        }else{
                            window.location = "/"+lng+"/products?searchkeywords=" + searchKey;
                        }
                    });
                }
                return false;
            });
            let clickRemove = false;
            $("body").on("click", ".remove-search-keywords", function() {
                clickRemove = true;
                //$(".desktop-search").toggleClass("hidden");
                var searchKey = $(this).attr('data-value');
                if (searchKey.length > 0) {
                    $.post('{{ route('search.remove') }}', {
                        search: searchKey
                    }, function(data) {
                        //console.log(data)
                        $(".search-lists .recent-search-type").html("");
                        $('.search-item-desktop').keyup()
                    });
                }
                return false;
            });

            let clickRemoveMobile = false;
            $(document).on("click", ".remove-search-keywords-mobile", function(e) {
                e.preventDefault();
                clickRemoveMobile = true;
                //$(".mobile-search").toggleClass("hidden");
                var searchKey = $(this).attr('data-value');
                //console.log(searchKey)
                if (searchKey.length > 0) {
                    $.post('{{ route('search.remove') }}', {
                        search: searchKey
                    }, function(data) {
                        if (data == 'ok') {
                            // console.log(searchKey);
                            // searchMobile();
                            $(".mobile-search-list .recent-search-type_mobile").html("");
                            searchMobile();
                            //$('.search-item2').keyup()
                        }
                    });
                }
                return false;
            });

            $("body").on("click",".recent-search-keywords-mobile", function() {
                if(clickRemove==false) {
                    var searchKey = $('.search-item-desktop').val();
                    if (searchKey.length > 0) {
                        $.post('{{ route('search') }}', {
                            search: searchKey
                        }, function(data) {
                            console.log(data.status)
                            if (data.status == "no") {
                                $(".desktop-search").toggleClass("hidden")
                                $(".search-lists .recent-search-type").html(data.message);
                            }
                            window.location = "/"+lng+"/products?searchkeywords=" + searchKey;
                        });
                    }
                }
            });


            // $("body").on("click",".recent-search-items", function() {
            //     console.log(clickRemoveMobile, "click events")
            //     if(clickRemoveMobile==false) {
            //         var searchKey = $('#mobile-search-keywoard').val();
            //         if (searchKey.length > 0) {
            //             $.post('{{ route('search') }}', {
            //                 search: searchKey
            //             }, function(data) {
            //                 if (data.status == "no") {
            //                     $(".mobile-search").toggleClass("hidden")
            //                     $(".mobile-search-list .recent-search-type_mobile").html(data.message);
            //                 }
            //                 window.location = "/"+lng+"/products?searchkeywords=" + searchKey;
            //             });
            //         }
            //     }
            // });

            $(document).on("click", ".wishlist_icon,.healthcare-heart,.healthcare-heart-selected,#fav-close-btn-new,#fav-close-btn_new_mobile,.heart-hole-content,.heart-full-content", function(e) {
                let product_id = $(this).attr("data-product-id");
                if(lng=='zh-hk'){
                    lng='tc';
                }else if(lng=='zh-cn'){
                    lng='sc';
                }
                let productName = `name_${lng}`;
                
                if (product_id.length == 0) {
                    return false;
                }
                if($(this).attr("id")=="fav-close-btn-new") {
                    $(this).parent().parent().parent().remove();
                }
                if($(this).attr("id")=="fav-close-btn_new_mobile") {
                    $(this).parent().parent().parent().remove();
                }
                if ($(e.target).hasClass('healthcare-heart-selected')) {
                    $(this).closest('.me-season-card').attr('data-id', 0);
                    $(this).addClass("hidden")
                    $(this).siblings(".healthcare-heart").removeClass("hidden");
                    $(".heart-hole[data-product-id='"+product_id+"']").removeClass("hidden")
                    $(".heart-full[data-product-id='"+product_id+"']").addClass("hidden")
                }
                if($(e.target).hasClass('healthcare-heart'))
                {
                    if($(this).attr("data-register-id")==1) {
                       $(".healthcare-heart-selected[data-product-id='"+product_id+"']").addClass("hidden");
                        // $(".register-btn").click();
                        return false;
                    }
                    else{
                        $(this).addClass("hidden")
                        $(this).siblings(".healthcare-heart-selected").removeClass("hidden");
                    }
                    $(this).closest('.me-season-card').attr('data-id', 1);
                    
                    $(".heart-hole[data-product-id='"+product_id+"']").addClass("hidden")
                    $(".heart-full[data-product-id='"+product_id+"']").removeClass("hidden")
                }
                if($(this).find('svg.heart-hole.hidden').length !== 0)
                {
                    $(".healthcare-heart-selected[data-product-id='"+product_id+"']").addClass("hidden")
                    $(".healthcare-heart[data-product-id='"+product_id+"']").removeClass("hidden");
                }
                if($(this).find('svg.heart-full.hidden').length !== 0)
                {
                    $(".healthcare-heart-selected[data-product-id='"+product_id+"']").removeClass("hidden");
                    $(".healthcare-heart[data-product-id='"+product_id+"']").addClass("hidden")
                }
                if($(this).attr("data-register-id")==1) {
                    closeQuickPreviewModal(e);
                }
                $.ajax({
                    url: "{{ route('dashboard.wishlist.favourite.product') }}",
                    type: "POST",
                    data: JSON.stringify({
                        product_id: product_id,
                    }),
                    dataType: "json",
                    contentType: "application/json",
                    success: function(data) {
                        $("#totalfavcount").html(data.data.length);
                        $("#totalfavcount_mobile").html(data.data.length);
                        if(data.data.length==0){
                            $("#favList").addClass("hidden");
                            $("#favList_mobile").addClass("hidden");
                            $(".view_all").addClass("hidden");
                            $(".favList.empty-section").removeClass("hidden");
                        }else{
                            $("#favList").removeClass("hidden");
                            $("#favList_mobile").removeClass("hidden");
                            $(".view_all").removeClass("hidden");
                            $(".favList.empty-section").addClass("hidden");
                        }
                        $("#favList").html("");
                        $("#favList_mobile").html("");
                        let content = '';
                        let mobile_content = '';
                        data.data.forEach(function(item, key) {
                        // console.log(item)
                        content+=`<li class="pl-[20px] pr-[10px] hover:bg-mee4 flex items-center justify-start message-dropdown-item pt-[10px] pb-[10px]">
                                        <img src="`+item.featured_img+`" alt="fav icon" class="w-[60px] h-[60px]"/>
                                        <div class="ml-[13px] w-full">
                                            <div class="flex justify-between items-baseline">
                                                <div class="">
                                                    <p class="me-fav-title">`+item[`name_${lng}`]+`</p>
                                                    <p class="me-mes-time">$`+(item.promotion_price!=null?item.promotion_price:item.discount_price!=null?item.discount_price:item.original_price)+`</p>
                                                </div>
                                                <button id="fav-close-btn-new" data-product-id=`+item.id+`><svg width="10" height="9"
                                                        viewBox="0 0 10 9" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M9.1999 0.306816C9.13823 0.245013 9.06497 0.195982 8.98432 0.162527C8.90367 0.129073 8.81722 0.111853 8.7299 0.111853C8.64259 0.111853 8.55614 0.129073 8.47549 0.162527C8.39484 0.195982 8.32158 0.245013 8.2599 0.306816L4.99991 3.56015L1.73991 0.300149C1.67818 0.238428 1.60491 0.189468 1.52427 0.156064C1.44362 0.122661 1.35719 0.105469 1.26991 0.105469C1.18262 0.105469 1.09619 0.122661 1.01554 0.156064C0.9349 0.189468 0.861626 0.238428 0.799905 0.300149C0.738184 0.36187 0.689224 0.435144 0.65582 0.515787C0.622417 0.59643 0.605225 0.682862 0.605225 0.770149C0.605225 0.857436 0.622417 0.943869 0.65582 1.02451C0.689224 1.10515 0.738184 1.17843 0.799905 1.24015L4.05991 4.50015L0.799905 7.76015C0.738184 7.82187 0.689224 7.89514 0.65582 7.97579C0.622417 8.05643 0.605225 8.14286 0.605225 8.23015C0.605225 8.31744 0.622417 8.40387 0.65582 8.48451C0.689224 8.56515 0.738184 8.63843 0.799905 8.70015C0.861626 8.76187 0.9349 8.81083 1.01554 8.84423C1.09619 8.87764 1.18262 8.89483 1.26991 8.89483C1.35719 8.89483 1.44362 8.87764 1.52427 8.84423C1.60491 8.81083 1.67818 8.76187 1.73991 8.70015L4.99991 5.44015L8.2599 8.70015C8.32163 8.76187 8.3949 8.81083 8.47554 8.84423C8.55619 8.87764 8.64262 8.89483 8.7299 8.89483C8.81719 8.89483 8.90362 8.87764 8.98427 8.84423C9.06491 8.81083 9.13818 8.76187 9.1999 8.70015C9.26163 8.63843 9.31059 8.56515 9.34399 8.48451C9.37739 8.40387 9.39458 8.31744 9.39458 8.23015C9.39458 8.14286 9.37739 8.05643 9.34399 7.97579C9.31059 7.89514 9.26163 7.82187 9.1999 7.76015L5.9399 4.50015L9.1999 1.24015C9.45324 0.986816 9.45324 0.560149 9.1999 0.306816Z"
                                                            fill="#333333" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                </li>`;
                        });
                        data.data.forEach(function(item, key) {

                        mobile_content += `
                        <li
                                class="flex items-center justify-start message-dropdown-item pt-[10px] pb-[10px] first:pt-0">
                                <img src="`+item.featured_img+`" alt="fav icon" class="w-[60px] h-[60px] object-cover rounded-lg" />
                                <div class="ml-[13px] w-full">
                                    <div class="flex justify-between items-baseline">
                                        <div class="">
                                            <p class="me-fav-title">`+item[`name_${lng}`]+`</p>
                                            <p class="me-mes-time">$`+(item.promotion_price!=null?item.promotion_price:item.discount_price!=null?item.discount_price:item.original_price)+`</p>
                                        </div>
                                        <button id="fav-close-btn_new_mobile" data-product-id=`+item.id+`><svg width="10" height="9"
                                                viewBox="0 0 10 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.1999 0.306816C9.13823 0.245013 9.06497 0.195982 8.98432 0.162527C8.90367 0.129073 8.81722 0.111853 8.7299 0.111853C8.64259 0.111853 8.55614 0.129073 8.47549 0.162527C8.39484 0.195982 8.32158 0.245013 8.2599 0.306816L4.99991 3.56015L1.73991 0.300149C1.67818 0.238428 1.60491 0.189468 1.52427 0.156064C1.44362 0.122661 1.35719 0.105469 1.26991 0.105469C1.18262 0.105469 1.09619 0.122661 1.01554 0.156064C0.9349 0.189468 0.861626 0.238428 0.799905 0.300149C0.738184 0.36187 0.689224 0.435144 0.65582 0.515787C0.622417 0.59643 0.605225 0.682862 0.605225 0.770149C0.605225 0.857436 0.622417 0.943869 0.65582 1.02451C0.689224 1.10515 0.738184 1.17843 0.799905 1.24015L4.05991 4.50015L0.799905 7.76015C0.738184 7.82187 0.689224 7.89514 0.65582 7.97579C0.622417 8.05643 0.605225 8.14286 0.605225 8.23015C0.605225 8.31744 0.622417 8.40387 0.65582 8.48451C0.689224 8.56515 0.738184 8.63843 0.799905 8.70015C0.861626 8.76187 0.9349 8.81083 1.01554 8.84423C1.09619 8.87764 1.18262 8.89483 1.26991 8.89483C1.35719 8.89483 1.44362 8.87764 1.52427 8.84423C1.60491 8.81083 1.67818 8.76187 1.73991 8.70015L4.99991 5.44015L8.2599 8.70015C8.32163 8.76187 8.3949 8.81083 8.47554 8.84423C8.55619 8.87764 8.64262 8.89483 8.7299 8.89483C8.81719 8.89483 8.90362 8.87764 8.98427 8.84423C9.06491 8.81083 9.13818 8.76187 9.1999 8.70015C9.26163 8.63843 9.31059 8.56515 9.34399 8.48451C9.37739 8.40387 9.39458 8.31744 9.39458 8.23015C9.39458 8.14286 9.37739 8.05643 9.34399 7.97579C9.31059 7.89514 9.26163 7.82187 9.1999 7.76015L5.9399 4.50015L9.1999 1.24015C9.45324 0.986816 9.45324 0.560149 9.1999 0.306816Z"
                                                    fill="#333333" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </li>
                        `
                    });

                        //console.log(content)
                        $("#favList").html(content);
                        $("#favList_mobile").html(mobile_content);
                    }
                });
            });

            $('#profile-upload').on("change",function(e) {
                //alert()
                e.preventDefault();
                let formData = new FormData(document.getElementById('file-upload-leftmenu'));
                $(".text-mered").addClass("hidden")
                $(".text-mered").html("")

                $.ajax({
                    type: 'POST',
                    url: "{{ route('dashboard.myacc.basicinfo.fileupload') }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: (response) => {
                        if(response.status =='success') {
                            if(response.data.profile_img!=null) {
                                $(".preview-img").attr("src", "../../../storage/customer/" + response.data.profile_img);
                            }
                            $("#successfully-updated-message").removeClass("hidden");
                            compareStatusAutoClose();
                            setTimeout(() => { document.location.reload(); }, 4000);
                        }
                    },error:function(data){
                            $.each(data.responseJSON.errors,function(k,v){
                                if(k=="file")
                                {
                                    let errorTxt = v[0];
                                    $("#file_error").html(errorTxt);
                                    $("#file_error").removeClass("hidden");
                                }
                            });
                    }
                });
            });
        });

    </script>
    <script>

        function onloadCallback() {
            $(".g-recaptcha").each(function() {
                var object = $(this);
                grecaptcha.render(object.attr("id"), {
                    "sitekey" : "{{config('app.recaptcha')}}",
                    "callback" : function(token){
                        object.parents('form').find(".g-recaptcha-response").val(token);
                        object.click();
                    }
                });
            });
        }
    </script>
    <script>
        $("#modalButton").on("click",function(){
            var subscribe_url = "{{ route('subscribe') }}";
            $.post(subscribe_url, {
                    },
                    function(data) {
                        // console.log(data);
                        $("#coupon-popup").addClass("hidden");
                        // (document.body.style.overflowY = "hidden"),document.querySelector(".noti-on").showModal();
                    });
        })

        $("#mail_subscriber").on("click",function(){
            var subscribe_url = "{{ route('blog.subscribe') }}";
            var email = $('#subscriber_email').val();
            // alert(email);
            $.post(subscribe_url, {
                    email : email
                    },
                    function(data) {
                        // console.log(data);
                        if (data.error) {
                            toastr.error(data.error.email[0]);
                        } else {
                            toastr.success("Subscribed");
                            $('#subscriber_email').val("");
                        }
                    }).fail(function(xhr, status, error) {
                    var response = xhr.responseJSON; 
                    if (response && response.error && response.error.email) {
                        toastr.error(response.error.email[0], null, {
                            timeOut: 3000,
                            extendedTimeOut: 1000, 
                        });
                        $('#subscriber_email').val("");
                    } else {
                        toastr.error("An error occurred during the subscription process.");
                        $('#subscriber_email').val("");
                    }
                });
        })


        $(".cookie-closed").on("click",function(){
            var header_footer = $(this).data("cookie");
            var url = "{{ route('cookie') }}";
            $.post(url, {
                header_footer: header_footer
            },
            function(data) {
                // console.log(data);
            }
            )
        });

    </script>
    <script>
       
    </script>

    <!-- <script src='https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit' async defer></script> -->
    <!-- <script src="./js/libs/jquery.magnific-popup.js"></script> -->
    <!-- <script src="./js/slick.js"></script> -->
    @stack('scripts')
</body>

</html>

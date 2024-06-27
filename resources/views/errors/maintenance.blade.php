<!DOCTYPE html>
<html lang="{{lang()}}">

<head>
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


    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style.css') }}" />
    

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
        /* .heart-feault-show,.healthcare-heart{
            display: block;
        } */
    </style>
</head>

<body>

<main>
    <section class="custom-error">
        <div class="best-price-container py-16 lg:py-20">
            <div class="custom-error-container sm:flex sm:items-center sm:justify-center max-w-[64.125rem] mx-auto ">
            <div class="custom-error-img sm:mr-5 md:mr-8 lg:mr-10 xl:mr-16 6xl:mr-24">
                <img src="{{asset('frontend/img/maintenance-mediQ.png')}}" alt="We Are Under Maintenance"
                class="w-auto h-auto object-cover object-center align-middle mx-auto">
            </div>

            <div
                class="custom-error-content me-body16 text-center max-w-[25.813rem] mx-auto sm:mx-0 mt-8 sm:mt-0 sm:text-left">
                <h1 class="custom-error-title text-blueMediq me-head32 font-bold">We Are Under Maintenance</h1>

                <p class="text-darkgray mt-2 xl:mt-3">This site currently undergoing maintenance. We will be back soon!
                </p>

            </div>
            </div>
        </div>
    </section>
</main>
</body>

</html>
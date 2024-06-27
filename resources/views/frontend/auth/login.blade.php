<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('backend/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ route('mediq') }}">@lang('labels.home')</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">@lang('labels.about_us')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">@lang('labels.contact_us')</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            @if (Auth::guard('customer')->check())
                            <a href="{{ url('customer-logout') }}" class="btn btn-danger"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            
                            <span class="menu-title sidebar-text">Logout</span>
                            <form id="logout-form" action="{{ route('customer.logout') }}" method="POST">
                                @csrf
                            </form>
                        </a>
                            @else
                            <a class="nav-link" href="{{ route('customer.login') }}">Login/Register</a>
                            
                            @endif
                        </li>
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li class="nav-item">
                                @if($localeCode == 'en')
                                    <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                        class="@if(lang() != 'sc' && lang() != 'tc')text-primary @endif nav-link">EN</a>
                                @elseif ($localeCode == 'sc')
                                    <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                    class="{{ lang() == 'sc' ? 'text-primary' : '' }} nav-link">SC</a>
                                @else
                                    <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                    class="{{ lang() == 'tc' ? 'text-primary' : '' }} nav-link">TC</a>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </span>
            </div>
        </nav>
<main class="py-4">
<div class="container">
<ul class="nav nav-pills nav-justified mb-3">
    <li class="nav-item me-0 mb-md-2">
        <a class="nav-link active btn btn-flex btn-active-light-success" data-bs-toggle="tab" href="#login">
            <span class="svg-icon svg-icon-2"><svg>...</svg></span>
            <span class="d-flex flex-column align-items-start">
                <span class="fs-4 text-dark fw-bolder">Login</span>
            </span>
        </a>
    </li>
    <li class="nav-item me-0 mb-md-2">
        <a class="nav-link btn btn-flex btn-active-light-info" data-bs-toggle="tab" href="#register">
            <span class="svg-icon svg-icon-2"><svg>...</svg></span>
            <span class="d-flex flex-column align-items-start">
                <span class="fs-4 text-dark fw-bolder">Register</span>
            </span>
        </a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="login" role="tabpanel">
        <form method="POST" action="" id="login-form">
            @csrf
            @if(isset($error))
                <div class="row mb-3 d-flex justify-content-center">
                    <div class="col-md-6 alert alert-danger">
                        <strong>{{ $error['msg'] }}</strong>
                    </div>
                </div>
            @endif

@php
    $customer = Session::has('remember')?Session::get('remember')[0]:null;
@endphp
    <input type="hidden" name="has_status" id="has_status">
    <div class="row mb-3">

        <label for="email_or_phone" class="col-md-4 col-form-label text-md-end">{{ __('Login Type') }}</label>

        <div class="col-md-6">
            <select class="form-select login-type" aria-label="Default select example" name="type">
                <option selected disabled>Login Type</option>
                <option value="1" {{ Session::has('login-email')||Session::has('email')?'selected':(Session::has('remember')&& isset($customer->email)?'selected':'') }}>Email</option>
                <option value="2" {{ Session::has('login-phone')||Session::has('phone')?'selected':(Session::has('remember')&& isset($customer->phone)?'selected':'') }}>Phone</option>
            </select>
        </div>
    </div>
    <div class="row mb-3 d-none email">

        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

        <div class="col-md-6">
            <input id="email" value="{{ Session::has('login-email')?Session::get('login-email'):(Session::has('email')?Session::get('email'):((Session::has('remember')&&isset($customer->email)?$customer->email:''))) }}" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="row mb-3 d-none phone">

        <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>

        <div class="col-md-6">
            <input id="phone" value="{{ Session::has('login-phone')?Session::get('login-phone'):(Session::has('phone')?Session::get('phone'):((Session::has('remember')&&isset($customer->phone)?$customer->phone:''))) }}" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  autocomplete="phone" autofocus>

            @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('password') }}</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{     Session::has('login-password')?Session::get('login-password'):(Session::has('password')?Session::get('password'):((Session::has('remember')&&isset(Session::get('remember')[1])?Session::get('remember')[1]:''))) }}">

            @error('password')
            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
            @enderror
        </div>
    </div>
    @if(Session::has('status'))
    <input type="hidden" name="real_code" value="{{ Session::get('status') }}">
    <div class="row mb-3 code">

        <label for="code" class="col-md-4 col-form-label text-md-end">{{ __('Verification Code') }}</label>

        <div class="col-md-6">
            <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}"  autocomplete="code" autofocus>

            @error('code')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            @if(Session::has('message'))
            <span class="text-danger" role="alert">
                <strong>{{ Session::get('message') }}</strong>
            </span>
            @endif
        </div>
    </div>
    @endif
                <div class="row mb-3">
                    <div class="col-md-6 offset-md-4">
                        {!! NoCaptcha::renderJs() !!}
                        {!! NoCaptcha::display() !!}
                    </div>
                    @error('g-recaptcha-response')
                    <div class="alert alert-danger" role="alert">{{$message}}</div>
                    @enderror
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ Session::has('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                {{--                        <div class="row mb-3">--}}
                {{--                            <div class="col-md-6 offset-md-4">--}}
                {{--                                <a href="">forgot password?</a>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}

                <div class="row mb-0">
                    <div class="col-md-8 offset-md-4">
                        
                        @if(Session::has('login-status')|| Session::has('status'))
                        <button type="submit" class="btn btn-primary" id="login-btn">
                            {{ __('Login') }}
                        </button>
                        @else
                        <button type="submit" class="btn btn-primary" id='password-login'>
                            {{ __('Login with password') }}
                        </button>
                        <button type="submit" class="btn btn-primary" id="code-login">
                            {{ __('Login with code') }}
                        </button>
                        @endif
                        
                        <a href="{{ route('forget.password.get') }}">Reset Password</a>
                    </div>
                </div>
            </form>
            <div>
                <a href="{{ url('auth/google') }}" class="btn btn-primary">Login with google</a>
                <a href="{{ url('auth/facebook') }}" class="btn btn-primary">Login with Facebook</a>
            </div>
            <div>
                <p>Last used = {{ Session::has('last_used')?Session::get('last_used'):'normal' }}</p>
            </div>
        </div>
        <div class="tab-pane fade" id="register" role="tabpanel">
            @include('frontend.auth.register')
        </div>
            </div>
        </div>
    </main>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="{{ asset('backend/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('backend/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('backend/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
{{-- <script src="{{ asset('backend/plugins/custom/datatables/datatables.bundle.js') }}"></script> --}}
<script src="{{ asset('backend/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('backend/js/custom/widgets.js') }}"></script>
<script src="{{ asset('backend/js/custom/apps/customers/list/list.js') }}"></script>

<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{ asset('backend/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('backend/js/custom/widgets.js') }}"></script>
<script src="{{ asset('backend/js/custom/apps/chat/chat.js') }}"></script>
<script src="{{ asset('backend/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
<script src="{{ asset('backend/js/custom/utilities/modals/create-app.js') }}"></script>
<script src="{{ asset('backend/js/custom/utilities/modals/users-search.js') }}"></script>
<script src="{{ asset('backend/plugins/custom/vis-timeline/vis-timeline.bundle.js') }}"></script>
<script>
    $(document).ready(function(){
        let val=$('.type').find(":selected").val()
        if(val==1)
        {
            $('.phone').addClass('d-none')
            $('.email').removeClass('d-none')
        }
        else
        {
            $('.email').addClass('d-none')
            $('.phone').removeClass('d-none')
        }
    })

    $(document).ready(function(){
        let val=$('.login-type').find(":selected").val()
        if(val==1)
        {
            $('.phone').addClass('d-none')
            $('.email').removeClass('d-none')
        }
        else
        {
            $('.email').addClass('d-none')
            $('.phone').removeClass('d-none')
        }
    })
    $('.type').change(function(){
        let value=$(this).find(":selected").val()
        if(value==1)
        {
            $('.phone').addClass('d-none')
            $('.email').removeClass('d-none')
        }
        else
        {
            $('.email').addClass('d-none')
            $('.phone').removeClass('d-none')
        }
    })

    $('.login-type').change(function(){
        let value=$(this).find(":selected").val()
        if(value==1)
        {
            $('.phone').addClass('d-none')
            $('.email').removeClass('d-none')
        }
        else
        {
            $('.email').addClass('d-none')
            $('.phone').removeClass('d-none')
        }
    })

    $('#send_code').click(function(e){
        e.preventDefault();
        let val=$('.type').find(":selected").val()

        if(val == 1)
        {
            $('#register-form').attr('action', "{{ route('sendEmail') }}").submit();
        }
        else
        {
            $('#register-form').attr('action', "{{ route('sendSMS') }}").submit();
        }
    })

    $('#password-login').click(function(e){
        e.preventDefault();
        $('#login-form').attr('action', "{{ route('customer.login') }}").submit();
    })
    $('#code-login').click(function(e){
        e.preventDefault();
        let val=$('.login-type').find(":selected").val()

        if(val == 1)
        {
            $('#login-form').attr('action', "{{ route('sendLoginEmail') }}").submit();
        }
        else
        {
            $('#login-form').attr('action', "{{ route('sendSMS') }}").submit();
        }
    })

    $('#login-btn').click(function(e){
        e.preventDefault();
        $('#has_status').val('has');
        $('#login-form').attr('action', "{{ route('customer.login') }}").submit();

    })

    


</script>
</body>
</html>

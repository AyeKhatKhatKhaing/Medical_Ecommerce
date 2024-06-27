<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../../">
		<title>mediQ | Login</title>
		<meta charset="utf-8" />
		<link rel="shortcut icon" href="{{asset('frontend/img/favicon.ico')}}" type="image/x-icon">
        <link rel="icon" href="{{asset('frontend/img/favicon.ico')}}" type="image/x-icon">
		<!--begin::Fonts-->
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="mediQ" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{ asset('backend/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('backend/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
        <style>
            .grecaptcha-badge {
                position: unset !important;
                margin-left: auto !important;
				position: fixed !important;
                display: block !important;
            }
        </style>
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="bg-body">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<!--begin::Aside-->
				<div class="d-flex flex-column flex-lg-row-auto w-xl-600px positon-xl-relative" style="background-color: #FFFFFF">
					<!--begin::Wrapper-->
					<div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
						<img alt="Logo" src="{{ asset('backend/media/logos/Left.png') }}" style="height: 100vh"/>
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Aside-->
				<!--begin::Body-->
				<div class="d-flex flex-column flex-lg-row-fluid py-10" style="background-color: #F8F8F8;">
					<!--begin::Content-->
					<div class="d-flex flex-center flex-column flex-column-fluid">
						<!--begin::Wrapper-->

						<div class="w-lg-500px p-10 p-lg-15 mx-auto">
							<!--begin::Form-->
							<form class="form w-100" action="{{ route('login') }}" method="POST">
                                @csrf
								<!--begin::Heading-->
								<div class="mb-10">
									<!--begin::Title-->
									<h1 class="text-dark mb-3">Sign In</h1>
									<!--end::Title-->
								</div>
								<!--begin::Heading-->
								@if(isset($error))
									<div class="alert alert-danger">
										<strong>{{ $error['msg'] }}</strong>
									</div>
								@endif
								<!--begin::Input group-->
								<div class="fv-row mb-10">
									<!--begin::Label-->
									<label class="form-label fs-6 fw-bolder text-dark">Your Email</label>
									<!--end::Label-->
									<!--begin::Input-->
                                    <input id="email" type="email" class="form-control form-control-lg form-control-solid
									@error('email') is-invalid @enderror" style="background-color: #ffffff;" name="email" value="{{ old('email') }}"
									required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
									<!--end::Input-->
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="fv-row mb-10">
									<!--begin::Wrapper-->
									<div class="d-flex flex-stack mb-2">
										<!--begin::Label-->
										<label class="form-label fw-bolder text-dark fs-6 mb-0">Your Password</label>
										<!--end::Label-->
										<!--begin::Link-->
                                        @if (Route::has('password.request'))
                                            <a class="link-primary fs-6 fw-bolder" href="{{ route('password.request') }}">
                                                ForgetPassword？
                                            </a>
                                        @endif
										<!--end::Link-->
									</div>
									<!--end::Wrapper-->
									<!--begin::Input-->
                                    <input id="password" type="password" class="form-control form-control-lg form-control-solid
									@error('password') is-invalid @enderror" name="password" style="background-color: #ffffff;" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
									<!--end::Input-->
								</div>
								<!--end::Input group-->
								<div class="fv-row mb-10">
									<!--begin::Wrapper-->
									 <div class="d-flex flex-stack mb-2">
										{{-- {!! NoCaptcha::renderJs() !!}
										{!! NoCaptcha::display() !!} --}}


									</div>
									@error('g-recaptcha-response')
									<div class="alert alert-danger" role="alert">{{$message}}</div>
									@enderror
								</div>
								<!--begin::Actions-->
								<div class="">
									<!--begin::Submit button-->
									<button type="submit" id="captcha1" class="g-recaptcha btn btn-lg btn-primary mb-5" style="width: 30%;">
										<span class="indicator-label">Sign In</span>
									</button>
									<!--end::Submit button-->
								</div>
								<!--end::Actions-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Content-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Authentication - Sign-in-->
		</div>
		<!--end::Root-->
		<!--end::Main-->
		<!--begin::Javascript-->
        <script src='https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit' async defer></script>

		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{ asset('backend/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('backend/js/scripts.bundle.js') }}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="{{ asset('backend/js/custom/authentication/sign-in/general.js') }}"></script>

		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->
        <script>
            function onloadCallback() {
                $(".g-recaptcha").each(function() {
                    var object = $(this);
                    grecaptcha.render(object.attr("id"), {
                        "sitekey" : "{{config('app.recaptcha')}}",
                        "callback" : function(token) {
                            object.parents('form').find(".g-recaptcha-response").val(token);
                            object.parents('form').submit();
                        }
                    });
                });
            }
        </script>

	</body>
	<!--end::Body-->
</html>

@php
// if(isset($_COOKIE['login_email'])){
// $login_email=$_COOKIE['login_email'];
// } else{
// $login_email='';
// }

$login_email = Illuminate\Support\Facades\Cookie::get('login_email');
if (isset($login_email)) {
$login_email = $login_email;
} else {
$login_email = '';
}
@endphp
<style>
    .g-recaptcha {
        transform: scale(1) !important;
    }
</style>
<dialog component-name="me-login-register"
    class="hidden lr-popup fixed z-[1001] left-0 top-0 w-full h-full overflow-hidden bg-linear-black items-center justify-center lr-register-popup">
    <div class="bg-whitez w-full max-w-[500px] md:p-10 p-5 rounded-[12px] text-darkgray relative mx-auto">
        <div class="flex items-center justify-between md:mb-10 mb-6">
            <h3 class="me-body26 helvetica-normal font-bold text-darkgray">
                @lang('labels.log_in_register.login_register')</h3>
            <button class="lr-popup-close absolute top-[24px] right-[24px]">
                <img src="{{ asset('frontend/img/lr_round-close.svg') }}" alt="close icon" />
            </button>
        </div>
        <ul class="lr-tabs flex items-center justify-evenly ">

            <li data-id="#email-address" class="cursor-pointer first:active lr-tabs-item text-darkgray">
                <span
                    class="helvetica-normal me-body20 text-darkgray cursor-pointer">@lang('labels.log_in_register.email')</span>
            </li>

            <li data-id="#phone-number" class="cursor-pointer first:active lr-tabs-item text-darkgray">
                <span
                    class="helvetica-normal me-body20 text-darkgray cursor-pointer">@lang('labels.log_in_register.phone')</span>
            </li>

        </ul>
        <div class="lr-contents mt-8">

            <div id="email-address" class="hidden">
                <form id="captcha1Form">
                    <div class="relative ">
                        <input type="email" name="email-address" value="{{ $login_email }}"
                            placeholder="@lang('labels.log_in_register.email')"
                            class="w-full me-body18 placeholder-text-lightgray mb-5 rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-orangeMediq">
                        <img src="{{ asset('frontend/img/carbon_email.svg') }}"
                            class="absolute top-3 sm:right-6 right-2" />
                        <p class="text-mered me-body16 helvetica-normal hidden">error !</p>
                    </div>
                    <div class="d-flex flex-stack mb-5 recap-container hidden">
                        {{-- <script type="text/javascript" async="" src="https://www.gstatic.com/recaptcha/releases/khH7Ei3klcvfRI74FvDcfuOo/recaptcha__en.js" crossorigin="anonymous" integrity="sha384-Pc4kSqgt9HkBUSG4m5s1icZtXtGOiIpAoIevDwoWsE6LISnB5sKY6eY1g4lVKA/D"></script>
                                   <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                                   <div class="g-recaptcha" data-sitekey="6Ld2sf4SAAAAAKSgzs0Q13IZhY02Pyo31S2jgOB5">
                                        <div style="width: 304px; height: 78px;">
                                             <div><iframe title="reCAPTCHA" src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6Ld2sf4SAAAAAKSgzs0Q13IZhY02Pyo31S2jgOB5&amp;co=aHR0cHM6Ly9wYXRyaWNraGxhdWtlLmdpdGh1Yi5pbzo0NDM.&amp;hl=en&amp;v=khH7Ei3klcvfRI74FvDcfuOo&amp;size=normal&amp;cb=4dpqnnug5cwn" width="304" height="78" role="presentation" name="a-xo2rhal2xedf" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox"></iframe></div><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea>
                                        </div><iframe style="display: none;"></iframe>
                                   </div> --}}

                    </div>
                    <div class="flex items-center justify-between hidden">
                        <div class="sm:w-auto w-[40%] sm:mr-0 mr-[10px]">
                            <select id="phone__code" name="ph_code"
                                class="phone_code_1 md:px-5 px-2 w-full me-body18 mb-5 rounded-[4px] border border-meA3 h-[48px] focus:border-mered">
                                <option value="+852">+852</option>
                                <option value="+86">+86</option>

                                @if(config('app.env') != 'production')
                                <option value="+95">dev test</option>
                                @endif
                            </select>
                            <p class="text-mered me-body16 helvetica-normal mt-[12px] hidden">error !</p>
                        </div>
                        <div class="relative sm:w-auto w-[60%]">
                            <input onkeypress="return event.charCode >= 48" min="1" type="" name="" placeholder=""
                                class="w-full me-body18 placeholder-text-lightgray mb-5 rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-orangeMediq phone-number-input">
                            <img src="{{ asset('frontend/img/carbon_email.svg') }}" class="absolute top-3 right-6" />
                            <p class="text-mered me-body16 helvetica-normal mt-[12px] phone_number_error" id="phone_number_error">error !</p>
                        </div>
                    </div>
                    <div class="login-with-password-section hidden">
                        <div class="relative mb-[20px]">
                            <input id="reg-password" type="password" name="reg-password"
                                placeholder="@lang('labels.log_in_register.enter_pwd')"
                                class="w-full me-body18 placeholder-text-lightgray rounded-[8px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-orangeMediq">
                            <img src="{{asset('frontend/img/eye-lash.svg')}}"
                                alt="password"
                                class="cursor-pointer inline-block absolute right-5 top-3 lg:absolute lg:right-[0.75rem] lg:top-[0.75rem] lg:-ml-12"
                                id="reg-current-password"
                                data-imghide="{{asset('frontend/img/eye.svg')}}"
                                data-imgshow="{{asset('frontend/img/eye-lash.svg')}}">
                            <p class="text-mered me-body16 helvetica-normal mt-[12px] hidden">
                                @lang('labels.log_in_register.pwd_at_least_number')</p>
                        </div>
                        <div class="w-full">
                            <button
                                class="password-login-btn border-1 border-orangeMediq hover:bg-whitez hover:text-orangeMediq bg-orangeMediq rounded-[6px] w-full text-whitez helvetica-normal font-bold me-body18 flex items-center justify-center md:h-[50px] h-[40px]"
                                disabled>@lang('labels.log_in_register.login')</button>
                        </div>
                        <div class="flex items-center justify-between mt-[12px]">
                            <button
                                class="go-verification-btn helvetica-normal me-body16 text-darkgray">@lang('labels.log_in_register.use_code')</button>
                            <button data-id="phone-number-reset" data-parent="lr-register-popup"
                                class="forget-password-btn me-body16 helvetica-normal text-darkgray">@lang('labels.log_in_register.forget_password')</button>
                        </div>
                    </div>
                    <div class="login-with-phone">
                        <div class="w-full">
                            <button type="submit"  id="captcha1"
                                class="g-recaptcha next-step-btn border-1 border-orangeMediq hover:bg-whitez hover:text-orangeMediq bg-orangeMediq rounded-[6px] w-full text-whitez helvetica-normal font-bold me-body18 flex items-center justify-center md:h-[50px] h-[40px]">
                                @lang('labels.log_in_register.next_step')  <div class="loader"></div></button>
                        </div>
                        <div class="w-full mt-[12px] hidden">
                            <button class="go-login-btn helvetica-normal me-body16 text-darkgray"></button>
                        </div>
                    </div>
                </form>
            </div>

            <div id="phone-number" class="hidden">
                    <div class="relative hidden">
                        <input type="email" name="email-address" placeholder="@lang('labels.log_in_register.email')"
                            class="w-full me-body18 placeholder-text-lightgray mb-5 rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-orangeMediq">
                        <img src="{{ asset('frontend/img/carbon_phone.svg') }}" class="absolute top-3 sm:right-6 right-2" />
                        <p class="text-mered me-body16 helvetica-normal hidden">error !</p>
                    </div>
                    <div class="d-flex flex-stack mb-5 recap-container hidden">
                        <!-- <script type="text/javascript" async=""
                            src="https://www.gstatic.com/recaptcha/releases/khH7Ei3klcvfRI74FvDcfuOo/recaptcha__en.js" crossorigin="anonymous"
                            integrity="sha384-Pc4kSqgt9HkBUSG4m5s1icZtXtGOiIpAoIevDwoWsE6LISnB5sKY6eY1g4lVKA/D"></script>
                            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                            <div class="g-recaptcha" data-sitekey="6Ld2sf4SAAAAAKSgzs0Q13IZhY02Pyo31S2jgOB5">
                                <div style="width: 304px; height: 78px;">
                                    <div><iframe title="reCAPTCHA" src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6Ld2sf4SAAAAAKSgzs0Q13IZhY02Pyo31S2jgOB5&amp;co=aHR0cHM6Ly9wYXRyaWNraGxhdWtlLmdpdGh1Yi5pbzo0NDM.&amp;hl=en&amp;v=khH7Ei3klcvfRI74FvDcfuOo&amp;size=normal&amp;cb=4dpqnnug5cwn" width="304" height="78" role="presentation" name="a-xo2rhal2xedf" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox"></iframe></div><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response"
                                        style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea>
                                </div><iframe style="display: none;"></iframe>
                            </div> -->

                    </div>
                    <div class="flex items-baseline justify-between mb-5 ">
                        <div class="sm:w-auto w-[40%] sm:mr-0 mr-[10px]">
                            <select id="phone-code" name="ph_code"
                                class="phone-code-2 md:px-5 px-2 w-full me-body18 rounded-[4px] border border-meA3 h-[48px] focus:border-mered">
                                <option value="+852">+852</option>
                                <option value="+86">+86</option>

                                @if(config('app.env') != 'production')
                                <option value="+95">dev test</option>
                                @endif
                            </select>
                            <p class="text-mered me-body16 helvetica-normal mt-[12px] hidden">error !</p>
                        </div>
                        <div class="relative sm:w-auto w-[60%]">
                            <input onkeypress="return event.charCode >= 48" min="1" type="number" name="phone-number"
                                placeholder="@lang('labels.log_in_register.phone')"
                                class="w-full me-body18 placeholder-text-lightgray rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-orangeMediq phone-number-input">
                            <input type="hidden" class="get_phone_number">
                            <img src="{{ asset('frontend/img/carbon_phone.svg') }}" class="absolute top-3 right-6" />
                            <p class="text-mered me-body16 helvetica-normal mt-[12px] phone_number_error hidden"></p>
                            <p class="text-mered me-body16 helvetica-normal mt-[12px] invalid_number"></p>
                        </div>
                    </div>

                    <div class="login-with-password-section mt-5 hidden">
                        <div class="relative mb-[20px]">
                            <input id="reg-password" type="password" name="reg-password-phno"
                                placeholder="@lang('labels.log_in_register.enter_pwd')"
                                class="w-full me-body18 placeholder-text-lightgray rounded-[8px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-orangeMediq">
                            <img src="{{asset('frontend/img/eye-lash.svg')}}" alt="password"
                                class="cursor-pointer inline-block absolute right-5 top-3 lg:absolute lg:right-[0.75rem] lg:top-[0.75rem] lg:-ml-12"
                                id="reg-current-password"
                                data-imghide="{{asset('frontend/img/eye.svg')}}"
                                data-imgshow="{{asset('frontend/img/eye-lash.svg')}}">
                            <p class="text-mered me-body16 helvetica-normal mt-[12px] hidden">
                                @lang('labels.log_in_register.pwd_at_least_number')
                            </p>
                        </div>
                        <div class="w-full">
                            <button
                                class="password-login-btn border-1 border-orangeMediq hover:bg-whitez hover:text-orangeMediq bg-orangeMediq rounded-[6px] w-full text-whitez helvetica-normal font-bold me-body18 flex items-center justify-center md:h-[50px] h-[40px]"
                                disabled>
                                @lang('labels.log_in_register.login')
                            </button>
                        </div>
                        <div class="flex items-center justify-between mt-[12px]">
                            <button class="go-verification-btn helvetica-normal me-body16 text-darkgray">
                                @lang('labels.log_in_register.use_code')
                            </button>
                            <button data-id="phone-number-reset" data-parent="lr-register-popup"
                                class="forget-password-btn me-body16 helvetica-normal text-darkgray">
                                @lang('labels.log_in_register.forget_password')
                            </button>
                        </div>
                    </div>
                    <div class="login-with-phone">
                    <form id="captcha2Form">

                        <div class="w-full">
                            <button type="submit"  id="captcha2"
                                class="g-recaptcha border-1 border-orangeMediq hover:bg-whitez hover:text-orangeMediq bg-orangeMediq rounded-[6px] w-full text-whitez helvetica-normal font-bold me-body18 flex items-center justify-center md:h-[50px] h-[40px] remove-reset">
                                @lang('labels.log_in_register.send_code')  <div class="loader"></div></button>
                        </div>
                        <div class="w-full mt-[12px] ">
                            <button class="go-login-btn helvetica-normal me-body16 text-darkgray">
                                @lang('labels.log_in_register.login_with_pwd')
                            </button>
                        </div>
                    </form>

                    </div>
            </div>

        </div>
        <div class="bottom-section ">
            <hr class="w-full hr-text pb-8 lg:my-10 my-2" data-content="@lang('labels.log_in_register.login_with')">
            <div class="">
                <div class="flex justify-center items-center lg:mb-10 mb-2">
                    <div class="relative md:pr-[45px] pr-[30px] last:mr-0">
                        <a href="{{ url('auth/facebook') }}" class="btn  lr-facebook-btn"><img
                                src="{{ asset('frontend/img/lr-facebook.svg') }}"
                                class="md:max-w-full max-w-[40px] inline-block"></a>
                        {{-- <button class="md:mr-[45px] mr-[30px] last:mr-0 lr-facebook-btn"><img src="./img/lr-facebook.svg" class="md:max-w-full max-w-[40px]"></button> --}}
                        @if (Session::has('last_used') && Session::get('last_used') == 'facebook')
                        <div
                            class="compare-warning-box absolute top-[-75px] left-0 w-full px-3 py-2 rounded-md bg-whitez">
                            <span class="font-normal me-body16 text-darkgray text-left">@lang('labels.log_in_register.last_used')</span>
                        </div>
                        @endif
                    </div>
                    <div class="relative">
                        <a href="{{ url('auth/google') }}"
                            class="btn md:mr-[45px] mr-[30px] last:mr-0 lr-google-btn"><img
                                src="{{ asset('frontend/img/lr-google.svg') }}"
                                class="md:max-w-full max-w-[40px] inline-block"></a>
                        {{-- <button class="md:mr-[45px] mr-[30px] last:mr-0 lr-google-btn"><img src="./img/lr-google.svg" class="md:max-w-full max-w-[40px]"></button> --}}
                        @if (Session::has('last_used') && Session::get('last_used') == 'google')
                        <div
                            class="compare-warning-box absolute top-[-75px] left-0 w-full px-3 py-2 rounded-md bg-whitez">
                            <span class="font-normal me-body16 text-darkgray text-left">@lang('labels.log_in_register.last_used')</span>
                        </div>
                        @endif
                    </div>
                </div>
                <div>
                    <p class="me-body14 helvetica-normal text-meA3">
                        @if (app()->getLocale() == 'en')
                        By signing up or logging in, you acknowledge and
                        agree to mediQ’s <a href="{{ route('termofuse') }}" class="underline">General Terms of Use</a> and <a
                            href="{{ route('privacy.policy') }}" class="underline">Privacy Policy.
                        </a>
                        @elseif (app()->getLocale() == 'zh-hk')
                        註冊或登入即表示你同意mediQ之<a href="{{ route('termofuse') }}" class="underline">使用條款</a>和<a href="{{ route('privacy.policy') }}" class="underline">私隱政策</a>。
                        @else
                        注册或登入即表示你同意mediQ之<a href="{{ route('termofuse') }}" class="underline">使用条款</a>和<a href="{{ route('privacy.policy') }}" class="underline">私稳政策</a>。
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</dialog>

<dialog component-name="me-login-with-email"
    class="hidden lr-popup fixed z-[1001] left-0 top-0 w-full h-full overflow-hidden bg-linear-black items-center justify-center lr-login-with-email-popup">
    <div class="bg-whitez w-full max-w-[500px] md:p-10 p-5 rounded-[12px] text-darkgray relative mx-auto">
        <div class="flex items-center justify-between mb-4">
            {{-- <button class="lr-popup-back">
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="17" viewBox="0 0 10 17" fill="none">
                    <path
                        d="M8.94823 16.9188C9.25136 16.7782 9.38886 16.4251 9.26073 16.1094C9.22636 16.0251 8.24198 15.0251 5.69198 12.4876L2.16698 8.97818L5.69198 5.47193C8.24511 2.92818 9.22636 1.93131 9.26073 1.84693C9.28573 1.78131 9.30761 1.67193 9.30761 1.60318C9.30761 1.15318 8.85136 0.85006 8.44823 1.03756C8.27011 1.12193 0.820108 8.53756 0.741983 8.71256C0.666983 8.87193 0.666983 9.08444 0.741983 9.24381C0.820108 9.41881 8.27011 16.8344 8.44823 16.9188C8.60761 16.9938 8.78886 16.9938 8.94823 16.9188Z"
                        fill="#333333" />
                </svg>
            </button> --}}
            <button class="ml-[-10px] lr-popup-back">

                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                
                <path d="M21.2775 24.9021L21.2776 24.9025C21.4678 25.4077 21.2736 26.0018 20.7823 26.2488C20.5164 26.3837 20.2095 26.3837 19.9436 26.2488L19.9428 26.2484C19.9027 26.2279 19.8715 26.2016 19.8648 26.1961L19.864 26.1954C19.851 26.1845 19.8377 26.1727 19.8256 26.1615C19.801 26.1388 19.7706 26.1094 19.7359 26.0752C19.6661 26.0062 19.571 25.9094 19.4552 25.7901C19.2231 25.5509 18.9026 25.2151 18.5241 24.8153C17.7668 24.0156 16.7742 22.9565 15.7851 21.8947C14.796 20.8328 13.8099 19.7674 13.0656 18.9548C12.6936 18.5487 12.3813 18.2049 12.159 17.956C12.0481 17.8318 11.9583 17.7297 11.8943 17.6548C11.8626 17.6176 11.8352 17.5849 11.8142 17.5584C11.8039 17.5454 11.7929 17.5311 11.7829 17.517L11.7822 17.5161C11.7772 17.5091 11.7551 17.4784 11.7379 17.439C11.6207 17.1704 11.6207 16.8298 11.7379 16.5612C11.7551 16.5218 11.7772 16.4911 11.7822 16.4841L11.7829 16.4832C11.7929 16.4691 11.8039 16.4548 11.8142 16.4418C11.8352 16.4153 11.8626 16.3826 11.8943 16.3454C11.9583 16.2705 12.0481 16.1684 12.159 16.0442C12.3813 15.7953 12.6936 15.4515 13.0656 15.0454C13.8099 14.2328 14.796 13.1674 15.7851 12.1055C16.7742 11.0437 17.7668 9.98463 18.5241 9.18485C18.9026 8.78511 19.2231 8.44933 19.4552 8.21013C19.571 8.09074 19.6661 7.99404 19.7359 7.92503C19.7706 7.8908 19.801 7.86134 19.8257 7.83867C19.8377 7.82753 19.851 7.81567 19.864 7.80483C19.8642 7.80466 19.8645 7.80443 19.8648 7.80413C19.8714 7.79857 19.9027 7.77229 19.9428 7.7518L19.9428 7.75179L19.9451 7.75064C20.6497 7.39725 21.349 7.99284 21.349 8.70007C21.349 8.82123 21.318 8.98372 21.2801 9.09098L21.2801 9.09101L21.2775 9.0981C21.2577 9.15048 21.2266 9.19369 21.2172 9.20667C21.2168 9.20724 21.2164 9.20776 21.2161 9.20821C21.2004 9.23021 21.1815 9.25445 21.1612 9.27948C21.1204 9.3301 21.0635 9.39688 20.9912 9.47965C20.8459 9.64587 20.6291 9.88675 20.3319 10.2123C19.7371 10.8638 18.8138 11.8611 17.4814 13.2925L17.4812 13.2927L14.0245 17.0002L17.4813 20.711C17.4813 20.711 17.4813 20.7111 17.4813 20.7111C18.8121 22.139 19.7353 23.1354 20.3306 23.787C20.6281 24.1125 20.8451 24.3536 20.9907 24.52C21.0631 24.6029 21.1201 24.6698 21.1611 24.7205C21.1813 24.7456 21.2002 24.7698 21.216 24.7919L21.2171 24.7934C21.2265 24.8064 21.2576 24.8497 21.2775 24.9021Z" fill="#333333" stroke="#333333" stroke-width="0.7"/>
                
                </svg>
                
            </button>
            <button class="lr-popup-close ml-[-1rem]">
                <img src="{{ asset('frontend/img/lr_round-close.svg') }}" alt="close icon" />
            </button>
        </div>
        <div class="mb-5">
            <h3 class="me-body26 helvetica-normal font-bold text-darkgray"> @lang('labels.log_in_register.login')
            </h3>
        </div>
        <ul class="lr-login-tabs flex items-center justify-evenly ">
            <li data-id="#log-email-address" class="cursor-pointer first:active lr-tabs-item text-darkgray">
                <span class="helvetica-normal me-body20 text-darkgray cursor-pointer">
                    @lang('labels.log_in_register.email')
                </span>
            </li>
            <li data-id="#log-phone-number" class="cursor-pointer first:active lr-tabs-item text-darkgray">
                <span class="helvetica-normal me-body20 text-darkgray cursor-pointer">
                    @lang('labels.log_in_register.phone')
                </span>
            </li>

        </ul>
        <div class="lr-contents mt-8">
            <div id="log-email-address" class="hidden">

                <div class="relative ">
                    <input type="email" name="email-address" placeholder="@lang('labels.log_in_register.email')"
                        class="w-full me-body18 placeholder-text-lightgray mb-5 rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-orangeMedi old_email">
                    <img src="{{ asset('frontend/img/carbon_email.svg') }}" class="absolute top-3 right-6" />
                    <p class="text-mered me-body16 helvetica-normal hidden">error !</p>
                </div>
                <div class="relative mb-5 ">
                    <input id="login-password" type="password" name="login-password"
                        placeholder="@lang('labels.log_in_register.enter_pwd')"
                        class="w-full me-body18 placeholder-text-lightgray rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-orangeMediq">
                    <img src="{{asset('frontend/img/eye-lash.svg')}}" alt="password"
                        class="cursor-pointer inline-block absolute right-5 top-3 lg:absolute lg:right-[1.5rem] lg:top-[0.75rem] lg:-ml-12"
                        id="reg-current-password"
                        data-imghide="{{asset('frontend/img/eye.svg')}}"
                        data-imgshow="{{asset('frontend/img/eye-lash.svg')}}">
                    <p class="text-mered pw-err me-body16 helvetica-normal mt-[12px] hidden">
                        @lang('labels.log_in_register.pwd_at_least_number')
                    </p>
                </div>
                <div class="flex items-center justify-between hidden">
                    <div class="">
                        <select id="phone_code_login" name="phone_code_login"
                            class="px-5 w-full me-body18 mb-5 rounded-[4px] border border-meA3 h-[48px] focus:border-mered">
                            <option value="+852">+852</option>
                            <option value="+86">+86</option>
                            @if(config('app.env') != 'production')
                            <option value="+95">dev test</option>
                            @endif
                        </select>
                        <p class="text-mered me-body16 helvetica-normal mt-[12px] hidden">error !</p>
                    </div>
                    <div class="relative">
                        <input onkeypress="return event.charCode >= 48" min="1" type="password" name="login-password"
                            placeholder="@lang('labels.log_in_register.enter_pwd')"
                            class="w-full me-body18 placeholder-text-lightgray mb-5 rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-mered phone-number-input">
                        <img src="{{ asset('frontend/img/carbon_email.svg') }}" class="absolute top-3 right-6" />
                        <p class="text-mered me-body16 helvetica-normal mt-[12px] hidden">error !</p>
                    </div>
                </div>
                <div class="w-full">
                    <button
                        class="login-btn bg-orangeMediq rounded-[6px] w-full text-whitez helvetica-normal font-bold me-body18 flex items-center justify-center h-[50px] border border-orangeMediq hover:bg-whitez hover:text-orangeMediq">@lang('labels.log_in_register.login')</button>
                </div>
                <div class="w-full mt-[12px] hidden">
                    <button class="go-login-btn helvetica-normal me-body16 text-darkgray"></button>
                </div>
                <div class="w-full mt-[12px] flex items-center justify-between ">
                    <label for="remember_me"
                        class="custom-checkbox-label flex items-center mr-1 last:mr-0 lg:mr-2 lg:last:mr-0">
                        <div class="relative">
                            <input type="checkbox" name="remember_me" id="remember_me" class="">
                            <span class="custom-checkbox-orange top-1/2 -translate-y-1/2"></span>
                        </div>
                        <span class="ml-5 4xl:ml-[30px] flex items-center me-body16 flex-wrap helvetica-normal">
                            @lang('labels.log_in_register.remember_me')
                        </span>
                    </label>
                    <button data-id="email-reset" data-parent="lr-login-with-email-popup"
                        class="forget-password-btn me-body16 helvetica-normal text-darkgrey">@lang('labels.log_in_register.forget_password')</button>
                </div>
            </div>
            <div id="log-phone-number" class="hidden">

                <div class="relative hidden">
                    <input type="email" name="email-address" placeholder="@lang('labels.log_in_register.email')"
                        class="w-full me-body18 placeholder-text-lightgray mb-5 rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-orangeMediq">
                    <img src="{{ asset('frontend/img/carbon_phone.svg') }}" class="absolute top-3 right-6" />
                    <p class="text-mered me-body16 helvetica-normal hidden">error !</p>
                </div>
                <div class="relative mb-5 hidden">
                    <input id="login-password" type="password" name="phone-number" placeholder="@lang('labels.log_in_register.phone')"
                        class="w-full me-body18 placeholder-text-lightgray rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-orangeMediq">
                    <img src="{{asset('frontend/img/eye-lash.svg')}}" alt="password"
                        class="cursor-pointer inline-block absolute right-5 top-3 lg:absolute lg:right-[1.5rem] lg:top-[0.75rem] lg:-ml-12"
                        id="reg-current-password"
                        data-imghide="{{asset('frontend/img/eye.svg')}}"
                        data-imgshow="{{asset('frontend/img/eye-lash.svg')}}">
                    <p class="text-mered me-body16 helvetica-normal mt-[12px] hidden">
                        @lang('labels.log_in_register.pwd_at_least_number')
                    </p>
                </div>
                <div class="flex items-baseline justify-between mb-5">
                    <div class="sm:w-auto w-[40%] sm:mr-0 mr-[10px]">
                        <select id="phone-code" name="ph_code"
                            class="phone-code-3 px-5 w-full me-body18 mb-5 rounded-[4px] border border-meA3 h-[48px] focus:border-mered">
                            <option value="+852">+852</option>
                            <option value="+86">+86</option>
                            @if(config('app.env') != 'production')
                            <option value="+95">dev test</option>
                            @endif
                        </select>
                        <p class="text-mered me-body16 helvetica-normal mt-[12px] hidden">error !</p>
                    </div>
                    <div class="relative sm:w-auto w-[60%]">
                        <input onkeypress="return event.charCode >= 48" min="1" type="number" id="login-ph-number"
                            name="phone-number" placeholder="@lang('labels.log_in_register.phone')"
                            class="w-full me-body18 placeholder-text-lightgray rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-orangeMediq phone-number-input">
                        <img src="{{ asset('frontend/img/carbon_phone.svg') }}" class="absolute top-3 right-6" />
                        <p class="text-mered me-body16 helvetica-normal mt-[12px] hidden">error !</p>
                        <p class="text-mered me-body16 helvetica-normal mt-[12px] invalid_number"></p>
                    </div>
                </div>
                <div class="w-full">
                    <button style="cursor: pointer;"
                        class="svc-btn bg-orangeMediq rounded-[6px] w-full text-whitez helvetica-normal font-bold me-body18 flex items-center justify-center h-[50px] border border-orangeMediq hover:bg-whitez hover:text-orangeMediq login-phone">
                        @lang('labels.log_in_register.send_code') <div class="loader"></div></button>
                </div>
                <div class="w-full mt-[12px] ">
                    <button data-parent=".lr-login-with-email-popup" data-id="#phone-number"
                        class="go-login-password-btn helvetica-normal me-body16 text-darkgray">@lang('labels.log_in_register.login_with_pwd')</button>
                    {{-- <button class="go-login-btn helvetica-normal me-body16 text-darkgray">Log in with password</button> --}}
                </div>
                <div class="w-full mt-[12px] flex items-center justify-between hidden">
                    <label for="remember-password"
                        class="custom-checkbox-label flex items-center mr-1 last:mr-0 lg:mr-2 lg:last:mr-0">
                        <div class="relative">
                            <input type="checkbox" name="remember-password" id="remember-password" value="" class="">
                            <span class="custom-checkbox-orange top-1/2 -translate-y-1/2"></span>
                        </div>
                        <span class="ml-5 4xl:ml-[30px] flex items-center me-body16 flex-wrap helvetica-normal leading-[1] mt-[0.5px]">
                            @lang('labels.log_in_register.remember_me')
                        </span>
                    </label>
                    <button data-id="email-reset" data-parent="lr-login-with-email-popup"
                        class="forget-password-btn me-body16 helvetica-normal text-darkgrey">
                        @lang('labels.log_in_register.forget_password')
                    </button>
                </div>
            </div>

        </div>
        <div class="bottom-section ">
            <hr class="w-full hr-text pb-8 lg:my-10 my-2" data-content="@lang('labels.log_in_register.login_with')">
            <div class="">
                <div class="flex justify-center items-center lg:mb-10 mb-2">
                    <div class="relative md:pr-[45px] pr-[30px] last:mr-0">
                        <a href="{{ url('auth/facebook') }}" class="btn  lr-facebook-btn"><img
                                src="{{ asset('frontend/img/lr-facebook.svg') }}"
                                class="md:max-w-full max-w-[40px] inline-block"></a>
                        {{-- <button class="md:mr-[45px] mr-[30px] last:mr-0 lr-facebook-btn"><img src="./img/lr-facebook.svg" class="md:max-w-full max-w-[40px]"></button> --}}
                        @if (Session::has('last_used') && Session::get('last_used') == 'facebook')
                        <div
                            class="compare-warning-box absolute top-[-75px] left-0 w-full px-3 py-2 rounded-md bg-whitez">
                            <span class="font-normal me-body16 text-darkgray text-left">@lang('labels.log_in_register.last_used')</span>
                        </div>
                        @endif
                    </div>
                    <div class="relative">
                        <a href="{{ url('auth/google') }}"
                            class="btn md:mr-[45px] mr-[30px] last:mr-0 lr-google-btn"><img
                                src="{{ asset('frontend/img/lr-google.svg') }}"
                                class="md:max-w-full max-w-[40px] inline-block"></a>
                        {{-- <button class="md:mr-[45px] mr-[30px] last:mr-0 lr-google-btn"><img src="./img/lr-google.svg" class="md:max-w-full max-w-[40px]"></button> --}}
                        @if (Session::has('last_used') && Session::get('last_used') == 'google')
                        <div
                            class="compare-warning-box absolute top-[-75px] left-0 w-full px-3 py-2 rounded-md bg-whitez">
                            <span class="font-normal me-body16 text-darkgray text-left">@lang('labels.log_in_register.last_used')</span>
                        </div>
                        @endif
                    </div>
                </div>
                {{-- <div class="flex justify-center items-center mb-10">
                         <button class="mr-[45px] last:mr-0 lr-facebook-btn"><img src="{{ asset('frontend/img/lr-facebook.svg') }}"></button>
                <button class="mr-[45px] last:mr-0 lr-google-btn"><img
                        src="{{ asset('frontend/img/lr-google.svg') }}"></button>

            </div> --}}
            <div>
                <p class="me-body14 helvetica-normal text-meA3">
                    @if (app()->getLocale() == 'en')
                    By signing up or logging in, you acknowledge and
                    agree to mediQ’s <a href="{{ route('termofuse') }}" class="underline">General Terms of Use</a> and <a
                        href="{{ route('privacy.policy') }}" class="underline">Privacy Policy.
                    </a>
                    @elseif(app()->getLocale() == 'zh-hk')
                    註冊或登入即表示你同意mediQ之<a href="{{ route('termofuse') }}" class="underline">使用條款</a>和<a href="{{ route('privacy.policy') }}" class="underline">私隱政策</a>。
                    @else
                    注册或登入即表示你同意mediQ之<a href="{{ route('termofuse') }}" class="underline">使用条款</a>和<a href="{{ route('privacy.policy') }}" class="underline">私稳政策</a>。
                    @endif
                </p>
            </div>
        </div>

    </div>
    </div>
</dialog>

<dialog component-name="me-password-popup"
    class="hidden lr-popup fixed z-[1001] left-0 top-0 w-full h-full overflow-hidden bg-linear-black items-center justify-center lr-reg-password-popup">
    <div class="bg-whitez w-full max-w-[500px] md:p-10 p-5 rounded-[12px] text-darkgray relative mx-auto">
        <div class="flex items-center justify-between ">
            <h3 class="me-body26 helvetica-normal font-bold text-darkgray mb-[8px]">
                @lang('labels.log_in_register.register')</h3>
            <button class="lr-popup-close absolute top-[24px] right-[24px]">
                <img src="{{ asset('frontend/img/lr_round-close.svg') }}" alt="close icon" />
            </button>
        </div>
        <div>
            <p class="helvetica-normal text-darkgrey me-body18 mb-5">
                @lang('labels.log_in_register.pwd_at_least_number_letter') 
            </p>
        </div>
        <div class="relative hidden is_email">
            <input type="email" name="email-address" placeholder="@lang('labels.log_in_register.email')" id="check_old_email"
                class="email-address w-full me-body18 placeholder-text-lightgray mb-5 rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-orangeMediq">
            <img src="{{ asset('frontend/img/carbon_email.svg') }}" class="absolute top-3 right-6" />
            <!-- <p class="text-mered email_validate me-body16 helvetica-normal hidden">error !</p> -->
        </div>
        <div class="relative mb-[20px]">
            <input id="password" type="password" name="password"  placeholder="@lang('labels.log_in_register.enter_pwd')"
                class="w-full me-body18 placeholder-text-lightgray rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-orangeMediq">
            <img src="{{asset('frontend/img/eye-lash.svg')}}" alt="password"
                class="cursor-pointer inline-block absolute right-5 top-3 lg:absolute lg:right-[1.5rem] lg:top-[0.75rem] lg:-ml-12"
                id="current-password"
                data-imghide="{{asset('frontend/img/eye.svg')}}"
                data-imgshow="{{asset('frontend/img/eye-lash.svg')}}">
            <p class="text-mered pw_validate me-body16 helvetica-normal mt-[12px] hidden">
                @lang('labels.log_in_register.pwd_at_least_number')
            </p>
        </div>
        <div class="w-full">
            <button
                class="pass-confirm-btn bg-orangeMediq rounded-[6px] w-full text-whitez helvetica-normal font-bold me-body18 flex items-center justify-center h-[50px] border border-orangeMediq hover:bg-whitez hover:text-orangeMediq">@lang('labels.log_in_register.confirm')</button>
        </div>
    </div>
</dialog>

<dialog component-name="me-successful-popup"
    class="hidden lr-popup fixed z-[1001] left-0 top-0 w-full h-full overflow-hidden bg-linear-black items-center justify-center lr-reg-successful-popup">
    <div class="bg-whitez w-full max-w-[500px] md:p-10 p-5 rounded-[12px] text-darkgray relative mx-auto">
        <button class="lr-successful-popup-close absolute top-[24px] right-[24px] sign-up-success-close">
            <img src="{{ asset('frontend/img/lr_round-close.svg') }}" alt="close icon" />
        </button>
        <div class="">
            <img src="{{ asset('frontend/img/check-mark 1.svg') }}" alt="successful icon" class="block mx-auto">
        </div>
        <h3 class="me-body26 helvetica-normal font-bold text-darkgray mt-5 text-center">
            @lang('labels.log_in_register.successfull')</h3>
        <div class="w-full py-10 success-load">
            <button
                class="ok-btn border-1 hover:border-orangeMediq hover:bg-whitez hover:text-orangeMediq bg-orangeMediq rounded-[6px] w-full text-whitez helvetica-normal font-bold me-body18 flex items-center justify-center h-[50px]">OK</button>
        </div>
        <label for="subscribe" class="custom-checkbox-label flex items-center mr-1 last:mr-0 lg:mr-2 lg:last:mr-0">
            <input type="checkbox" name="subscribe" id="subscribe" value="" class="" checked="checked">
            <span class="custom-checkbox-orange "></span>
            <span class="ml-5 4xl:ml-[30px] flex items-center me-body14 flex-wrap helvetica-normal">
                @lang('labels.log_in_register.happy')
            </span>
        </label>
    </div>
</dialog>

<dialog component-name="me-login-same-email-popup"
    class="hidden lr-popup fixed z-[1001] left-0 top-0 w-full h-full overflow-hidden bg-linear-black items-center justify-center login-same-email-popup">
    <div class="bg-whitez w-full max-w-[500px] md:p-10 p-5 rounded-[12px] text-darkgray relative mx-auto">
        <button class="lr-successful-popup-close absolute top-[24px] right-[24px]">
            <img src="{{ asset('frontend/img/lr_round-close.svg') }}" alt="close icon" />
        </button>
        <div class="google-img">
            <img src="" alt="google-img"
                class="text-whitez w-[80px] h-[80px] rounded-full bg-[#D2B1C9] flex items-center justify-center me-body32 helvetica-normal mx-auto" />
            <!-- <p class="text-whitez w-[80px] h-[80px] rounded-full bg-[#D2B1C9] flex items-center justify-center me-body32 helvetica-normal mx-auto ">D</p> -->
        </div>
        <h3 class="me-body26 helvetica-normal font-bold text-darkgray mt-5 text-center">Diana</h3>
        <p class="me-body18 helvetica-normal text-center text-darkgray mt-[8px]">{{__('labels.log_in_register.google_mail_already_exist')}}</p>
        <div class="w-full py-10">
            <a href="{{ url('auth/google') }}"
                class="btn successful-login-btn rounded-[6px] w-full text-darkgray helvetica-normal font-bold me-body18 flex items-center justify-center h-[50px] border border-darkgray">
                <img src="{{ asset('frontend/img/lr-google.svg') }}" class="w-[24px] h-[24px] mr-10" />
                Google
            </a>
        </div>
    </div>
</dialog>
@if (Session::has('google-login'))
<dialog component-name="me-successful-login-popup"
    class="lr-popup fixed z-[1001] left-0 top-0 w-full h-full overflow-hidden bg-linear-black items-center justify-center successful-login-popup flex">
    <div class="bg-whitez w-full max-w-[500px] md:p-10 p-5 rounded-[12px] text-darkgray relative mx-auto">
        <button class="lr-successful-popup-close absolute top-[24px] right-[24px]">
            <img src="{{ asset('frontend/img/lr_round-close.svg') }}" alt="close icon" />
        </button>
        <div class="">
            <img src="{{ asset('frontend/img/check-mark 1.svg') }}" alt="successful icon"
                class="block mx-auto sucess-login-check-mark">
        </div>
        <h3 class="me-body26 helvetica-normal font-bold text-darkgray mt-5 text-center">
            @lang('labels.log_in_register.success_login')
        </h3>
        <p class="me-body18 helvetica-normal text-center text-darkgray mt-5">
            @lang('labels.log_in_register.success_login1')</p>
        <div class="w-full pt-5">
            <button
                class="ok-btn bg-orangeMediq border border-orangeMediq rounded-[6px] w-full text-whitez helvetica-normal font-bold me-body18 flex items-center justify-center h-[50px] hover:bg-whitez hover:text-orangeMediq">@lang('labels.log_in_register.ok')</button>
        </div>
    </div>
</dialog>
{{ Session::forget('google-login') }}
@endif
<dialog component-name="me-ph-verification-code"
    class="hidden lr-popup fixed z-[1001] left-0 top-0 w-full h-full overflow-hidden bg-linear-black items-center justify-center ph-verification-code-popup">
    <div class="bg-whitez w-full max-w-[408px] md:p-10 p-5 rounded-[12px] text-darkgray relative mx-auto">
        <button class="lr-successful-popup-close absolute top-[24px] right-[24px]">
            <img src="{{ asset('frontend/img/lr_round-close.svg') }}" alt="close icon" />
        </button>
        <div class="">
            <div class="helvetica-normal">
                <h1 class="helvetica-normal me-body26 text-darkgray font-bold" id="popup_header">
                </h1>
                <p class="me-body18 text-darkgray pb-5">
                    @lang('labels.log_in_register.send_code_text') 
                <span class="res_number">
                </span>
                   <span id="reset_login"></span>  {{-- reset your password. --}}
                </p>
                <div class="">

                    <div id="otp-input" class="otp-container flex justify-center">
                        <input type="number" step="1" min="0" max="9" autocomplete="off" pattern="\d*" id="first"
                            class="bg-whitez border border-mee4 2xs:w-[48px] 2xs:h-[48px] 5xs:w-[38px] 5xs:h-[38px] w-[34px] h-[34px] rounded-[8px] mr-2 focus:outline-0 text-center me-body18 text-darkgray font-bold">
                        <input type="number" step="1" min="0" max="9" autocomplete="off" pattern="\d*" id="sec" 
                            class="bg-whitez border border-mee4 2xs:w-[48px] 2xs:h-[48px] 5xs:w-[38px] 5xs:h-[38px] w-[34px] h-[34px] rounded-[8px] mr-2 focus:outline-0 text-center me-body18 text-darkgray font-bold">
                        <input type="number" step="1" min="0" max="9" autocomplete="off" pattern="\d*" id="third"
                            class="bg-whitez border border-mee4 2xs:w-[48px] 2xs:h-[48px] 5xs:w-[38px] 5xs:h-[38px] w-[34px] h-[34px] rounded-[8px] mr-2 focus:outline-0 text-center me-body18 text-darkgray font-bold">
                        <input type="number" step="1" min="0" max="9" autocomplete="off" pattern="\d*" id="fourth"
                            class="bg-whitez border border-mee4 2xs:w-[48px] 2xs:h-[48px] 5xs:w-[38px] 5xs:h-[38px] w-[34px] h-[34px] rounded-[8px] mr-2 focus:outline-0 text-center me-body18 text-darkgray font-bold">
                        <input type="number" step="1" min="0" max="9" autocomplete="off" pattern="\d*" id="fifth"
                            class="bg-whitez border border-mee4 2xs:w-[48px] 2xs:h-[48px] 5xs:w-[38px] 5xs:h-[38px] w-[34px] h-[34px] rounded-[8px] mr-2 focus:outline-0 text-center me-body18 text-darkgray font-bold">
                        <input type="number" step="1" min="0" max="9" autocomplete="off" pattern="\d*" id="sixth"
                            class="bg-whitez border border-mee4 2xs:w-[48px] 2xs:h-[48px] 5xs:w-[38px] 5xs:h-[38px] w-[34px] h-[34px] rounded-[8px] focus:outline-0 text-center me-body18 text-darkgray font-bold">
                    </div>
                    <p class="text-mered me-body16 helvetica-normal mt-[12px] hidden">
                        @lang('labels.log_in_register.wrong_code')</p>
                    <div class="mt-[12px]">
                        {{-- <p class="">Resend code in
                            <span id="countdown"
                                class="countdown inline-block w-[4.5ch] helvetica-normal me-body16 text-darkgray"></span>
                        </p> --}}
                        @if (app()->getLocale() == 'en')
                        <p class="">Resend code in
                            <span id="countdown"
                                class="countdown inline-block helvetica-normal me-body16 text-darkgray"></span>
                        </p>
                        @elseif (app()->getLocale() == 'zh-hk')
                        <p class="">在
                            <span id="countdown"
                                class="countdown inline-block helvetica-normal me-body16 text-darkgray"></span> 秒後重新發送驗證碼
                        </p>
                        @elseif (app()->getLocale() == 'zh-cn')
                        <p class=""> 在
                            <span id="countdown"
                                class="countdown inline-block helvetica-normal me-body16 text-darkgray"></span> 秒后重新发送验证码
                        </p>
                        @endif
                        <!-- <input type="hidden" class="resend_otp_code">
                                <input type="hidden" class="resend_otp_number"> -->
                        <input type="hidden" class="has_phone">
                        <button type="button"
                            class="svc-btn cursor-pointer text-darkgray helvetica-normal hidden underline cus-resend-btn">@lang('labels.log_in_register.resend_code')</button>
                    </div>
                    <div class="w-full">
                        <button
                            class="submit-btn bg-orangeMediq border-1 rounded-[6px] w-full text-whitez helvetica-normal font-bold me-body18 flex items-center justify-center sm:h-[50px] h-[40px] my-[16px] hover:bg-whitez hover:text-orangeMediq hover:border-orangeMediq"
                            disabled>@lang('labels.log_in_register.next_step')</button>
                    </div>
                    {{-- <div class="w-full">
                        <button data-parent=".ph-verification-code-popup" data-id="#phone-number" type="button"
                            class="ph-go-password-login-btn helvetica-normal me-body16 text-darkgray">@lang('labels.log_in_register.login_with_pwd')</button>
                    </div> --}}
                    <div class="mt-10">
                        <p class="me-body14 helvetica-normal text-meA3">
                            @if (app()->getLocale() == 'en')
                            By signing up or logging in, you acknowledge and
                            agree to mediQ’s <a href="{{ route('termofuse') }}" class="underline">General Terms of Use</a> and <a
                                href="{{ route('privacy.policy') }}" class="underline">Privacy Policy.
                            </a>
                            @elseif (app()->getLocale() == 'zh-hk')

                            註冊或登入即表示你同意mediQ之<a href="{{ route('termofuse') }}" class="underline">使用條款</a>和<a href="{{ route('privacy.policy') }}" class="underline">私隱政策</a>。
                            @else
                            注册或登入即表示你同意mediQ之<a href="{{ route('termofuse') }}" class="underline">使用条款</a>和<a href="{{ route('privacy.policy') }}" class="underline">私稳政策</a>。
                            @endif
                        </p>
                    </div>

                </div>
            </div>

        </div>
    </div>
</dialog>

<dialog component-name="me-reset-password"
    class="hidden lr-popup fixed z-[1001] left-0 top-0 w-full h-full overflow-hidden bg-linear-black items-center justify-center reset-password-popup">
    <div class="bg-whitez w-full max-w-[500px] md:p-10 p-5 rounded-[12px] text-darkgray relative mx-auto">
        <button class="lr-successful-popup-close absolute top-[24px] right-[24px]">
            <img src="{{ asset('frontend/img/lr_round-close.svg') }}" alt="close icon" />
        </button>
        <div class="">
            <div class="reset-view" id="email-reset">
                <div class="helvetica-normal">
                    <h1 class="helvetica-normal me-body26 text-darkgray font-bold">
                        @lang('labels.log_in_register.reset_pwd')</h1>
                    <p class="me-body18 text-darkgray pb-5">@lang('labels.log_in_register.email_verification')</p>
                    <div class="reset-password-by-email">

                        <div class="relative">
                            <input type="email" id="reset-email" name="reset-email"
                                placeholder="@lang('labels.log_in_register.email')"
                                class="w-full me-body18 placeholder-text-lightgray rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus-visible:outline-none focus-visible:border-orangeMediq focus:border-orangeMediq">
                            <p class="text-mered me-body16 helvetica-normal hidden mt-[12px]">error !</p>
                        </div>
                        <div class="w-full">
                            <button
                                class="get-verification-btn bg-orangeMediq border-1 rounded-[6px] w-full text-whitez helvetica-normal font-bold me-body18 flex items-center justify-center sm:h-[50px] h-[40px] my-[16px] hover:bg-whitez hover:text-orangeMediq hover:border-orangeMediq"
                                disabled style="cursor: pointer">@lang('labels.log_in_register.get_code')  <div class="loader"></div></button>
                        </div>

                    </div>
                </div>
                <div class="bottom-section">
                    <hr class="w-full hr-text pb-8 lg:my-10 my-2" data-content="@lang('labels.log_in_register.or')">
                    <div class="">
                        <div class="w-full">
                            <button
                                class="reset-via-phone-btn bg-whitez hover:text-orangeMediq hover:border-orangeMediq border border-darkgray rounded-[6px] w-full text-darkgray helvetica-normal font-bold me-body18 flex items-center justify-center sm:h-[50px] h-[40px] my-[16px]">
                                @lang('labels.log_in_register.reset_with_phno')</button>
                            {{-- <button class="reset-via-phone-btn bg-whitez border border-darkgray rounded-[6px] w-full text-darkgray helvetica-normal font-bold me-body18 flex items-center justify-center sm:h-[50px] h-[40px] my-[16px]">Reset with phone number</button> --}}
                        </div>
                        <div class="text-center">
                            <a href="{{ route('contact') }}" class="me-body16 helvetica-normal text-darkgray text-center">
                                @lang('labels.log_in_register.get_help')</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="reset-view" id="phone-number-reset">
                <div class="helvetica-normal">
                    <h1 class="helvetica-normal me-body26 text-darkgray font-bold">
                        @lang('labels.log_in_register.reset_pwd')</h1>
                    <p class="me-body18 text-darkgray pb-5">@lang('labels.log_in_register.phone_verification')</p>
                    <div class="reset-password-by-phone-number">

                        <div class="flex items-baseline justify-between `+ tabContents[i].hidden2 +`">
                            <div class="sm:w-auto w-[40%] sm:mr-0 mr-[10px]">
                                <select id="phone-code" name="ph_code"
                                    class="reset_phone_code md:px-5 px-2 w-full me-body18 rounded-[4px] border border-meA3 h-[48px] focus:border-mered">
                                    <option value="+852">+852</option>
                                    <option value="+86">+86</option>
                                    @if(config('app.env') != 'production')
                                    <option value="+95">dev test</option>
                                    @endif
                                </select>
                                {{-- <p class="text-mered me-body16 helvetica-normal mt-[12px] hidden">error !</p> --}}
                            </div>
                            <div class="relative sm:w-auto w-[60%]">
                                <input onkeypress="return event.charCode >= 48" min="1" type="number"
                                    id="reset-phone-number" name="reset-phone-number" placeholder="@lang('labels.log_in_register.phone')"
                                    class="w-full me-body18 placeholder-text-lightgray rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-orangeMediq phone-number-input">
                                <img src="{{ asset('frontend/img/carbon_phone.svg') }}"
                                    class="absolute top-3 right-6" />
                                <p class="text-mered me-body16 helvetica-normal mt-[12px] hidden phone_number_error">error !</p>
                            </div>
                        </div>
                        <!-- <p class="text-mered me-body16 helvetica-normal mt-[12px] hidden">error !</p> -->
                        <div class="w-full">
                            <button style="cursor: pointer;"
                                class="send-code-btn bg-orangeMediq border-1 rounded-[6px] w-full text-whitez helvetica-normal font-bold me-body18 flex items-center justify-center sm:h-[50px] h-[40px] my-[16px] hover:bg-whitez hover:text-orangeMediq hover:border-orangeMedi"
                                disabled>@lang('labels.log_in_register.send_code') <div class="loader"></div></button>
                        </div>

                    </div>
                </div>
                <div class="bottom-section">
                    <hr class="w-full hr-text pb-8 lg:my-[32px] my-2" data-content="@lang('labels.log_in_register.or')">
                    <div class="">
                        <div class="w-full">
                            <button
                                class="reset-via-email-btn bg-whitez hover:text-orangeMediq hover:border-orangeMediq border border-darkgray rounded-[6px] w-full text-darkgray helvetica-normal font-bold me-body18 flex items-center justify-center sm:h-[50px] h-[40px] my-[16px]">
                                @lang('labels.log_in_register.reset_with_email')</button>
                            {{-- <button class="reset-via-email-btn bg-whitez border border-darkgray rounded-[6px] w-full text-darkgray helvetica-normal font-bold me-body18 flex items-center justify-center sm:h-[50px] h-[40px] my-[16px]">Reset via email</button> --}}
                        </div>
                        <div class="text-center">
                            <a href="{{ route('contact') }}"
                                class="me-body16 helvetica-normal text-darkgray text-center">@lang('labels.log_in_register.get_help')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</dialog>

<dialog component-name="me-reset-password-popup"
    class="hidden lr-popup fixed z-[1001] left-0 top-0 w-full h-full overflow-hidden bg-linear-black items-center justify-center lr-reset-password-popup">
    <div class="bg-whitez w-full max-w-[500px] md:p-10 p-5 rounded-[12px] text-darkgray relative mx-auto">
        <div class="flex items-center justify-between ">
            <h3 class="me-body26 helvetica-normal font-bold text-darkgray mb-[8px]">
                @lang('labels.log_in_register.reset_pwd')</h3>
            <button class="lr-popup-close absolute top-[24px] right-[24px]">
                <img src="{{ asset('frontend/img/lr_round-close.svg') }}" alt="close icon" />
            </button>
        </div>
        <div>
            <p class="helvetica-normal text-darkgrey me-body18 mb-5">
                @lang('labels.log_in_register.reset_text')
                {{-- Please enter your new password. Password must be 8-20 characters with uppercase letter and number. --}}
            </p>
        </div>
        <div class="relative mb-[20px]">
            <input id="reset-password" type="password" name="password"  placeholder="@lang('labels.log_in_register.enter_pwd')"
                class="w-full me-body18 placeholder-text-lightgray rounded-[4px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-mered">
            <img src="{{asset('frontend/img/eye-lash.svg')}}" alt="password"
                class="cursor-pointer inline-block absolute right-5 top-3 lg:absolute lg:right-[1.5rem] lg:top-[0.75rem] lg:-ml-12"
                id="current-password"
                data-imghide="{{asset('frontend/img/eye.svg')}}"
                data-imgshow="{{asset('frontend/img/eye-lash.svg')}}">
            <p class="text-mered me-body16 helvetica-normal mt-[12px] hidden">
                @lang('labels.log_in_register.pwd_at_least_number')</p>
        </div>
        <div class="w-full">
            <button
                class="reset-pass-btn bg-orangeMediq rounded-[6px] w-full text-whitez helvetica-normal font-bold me-body18 flex items-center justify-center h-[50px] border border-orangeMediq hover:bg-whitez hover:text-orangeMediq">@lang('labels.log_in_register.confirm')</button>
        </div>
    </div>
</dialog>

<dialog component-name="me-reset-pass-successful-popup"
    class="hidden lr-popup fixed z-[1001] left-0 top-0 w-full h-full overflow-hidden bg-linear-black items-center justify-center lr-reset-pass-successful-popup">
    <div class="bg-whitez w-full max-w-[500px] md:p-10 p-5 rounded-[12px] text-darkgray relative mx-auto">
        <button class="lr-successful-popup-close absolute top-[24px] right-[24px]">
            <img src="{{ asset('frontend/img/lr_round-close.svg') }}" alt="close icon" />
        </button>
        <div class="">
            <img src="{{ asset('frontend/img/check-mark 1.svg') }}" alt="successful icon" class="block mx-auto">
        </div>
        <h3 class="me-body26 helvetica-normal font-bold text-darkgray mt-5 text-center">@lang('labels.log_in_register.reset_success')
        </h3>
        <div class="w-full py-5 success-load">
            <button
                class="ok-btn border-1 hover:border-orangeMediq hover:bg-whitez hover:text-orangeMediq bg-orangeMediq rounded-[6px] w-full text-whitez helvetica-normal font-bold me-body18 flex items-center justify-center h-[50px]">@lang('labels.log_in_register.ok')</button>
        </div>

    </div>
</dialog>
<dialog component-name="me-email-verification-code"
    class="hidden lr-popup fixed z-[1001] left-0 top-0 w-full h-full overflow-hidden bg-linear-black items-center justify-center email-verification-code-popup">
    <div class="bg-whitez w-full max-w-[408px] md:p-10 p-5 rounded-[12px] text-darkgray relative mx-auto">
        <button class="lr-successful-popup-close absolute top-[24px] right-[24px]">
            <img src="{{ asset('frontend/img/lr_round-close.svg') }}" alt="close icon" />
        </button>
        <div class="">
            <div class="helvetica-normal">
                <h1 class="helvetica-normal me-body26 text-darkgray font-bold">
                    @lang('labels.log_in_register.reset_pwd')
                </h1>
                <p class="me-body18 text-darkgray pb-5">
                    @lang('labels.log_in_register.send_code_text')
                    <span id = "mail_address"></span> <span id = "mail"></span>
                </p>
                <div class="">

                    <div id="otp-email-input" class="otp-email-container flex justify-center">
                        <input type="number" step="1" min="0" max="9" autocomplete="no" pattern="\d*" id="email-first"
                            class="bg-whitez border border-mee4 2xs:w-[48px] 2xs:h-[48px] 5xs:w-[38px] 5xs:h-[38px] w-[34px] h-[34px] rounded-[8px] mr-2 focus:outline-0 text-center me-body18 text-darkgray font-bold">
                        <input type="number" step="1" min="0" max="9" autocomplete="no" pattern="\d*" id="email-sec"
                            class="bg-whitez border border-mee4 2xs:w-[48px] 2xs:h-[48px] 5xs:w-[38px] 5xs:h-[38px] w-[34px] h-[34px] rounded-[8px] mr-2 focus:outline-0 text-center me-body18 text-darkgray font-bold">
                        <input type="number" step="1" min="0" max="9" autocomplete="no" pattern="\d*" id="email-third"
                            class="bg-whitez border border-mee4 2xs:w-[48px] 2xs:h-[48px] 5xs:w-[38px] 5xs:h-[38px] w-[34px] h-[34px] rounded-[8px] mr-2 focus:outline-0 text-center me-body18 text-darkgray font-bold">
                        <input type="number" step="1" min="0" max="9" autocomplete="no" pattern="\d*" id="email-fourth"
                            class="bg-whitez border border-mee4 2xs:w-[48px] 2xs:h-[48px] 5xs:w-[38px] 5xs:h-[38px] w-[34px] h-[34px] rounded-[8px] mr-2 focus:outline-0 text-center me-body18 text-darkgray font-bold">
                        <input type="number" step="1" min="0" max="9" autocomplete="no" pattern="\d*" id="email-fifth"
                            class="bg-whitez border border-mee4 2xs:w-[48px] 2xs:h-[48px] 5xs:w-[38px] 5xs:h-[38px] w-[34px] h-[34px] rounded-[8px] mr-2 focus:outline-0 text-center me-body18 text-darkgray font-bold">
                        <input type="number" step="1" min="0" max="9" autocomplete="no" pattern="\d*" id="email-sixth"
                            class="bg-whitez border border-mee4 2xs:w-[48px] 2xs:h-[48px] 5xs:w-[38px] 5xs:h-[38px] w-[34px] h-[34px] rounded-[8px] focus:outline-0 text-center me-body18 text-darkgray font-bold">
                    </div>
                    <p class="text-mered me-body16 helvetica-normal mt-[12px] hidden">
                        @lang('labels.log_in_register.wrong_code') </p>
                    <div class="mt-[12px]">
                         @if (app()->getLocale() == 'en')
                        <p class="">Resend code in
                            <span id="countdown"
                                class="countdown inline-block helvetica-normal me-body16 text-darkgray"></span>
                        </p>
                        @elseif (app()->getLocale() == 'zh-hk')
                        <p class="">在
                            <span id="countdown" class="countdown inline-block helvetica-normal me-body16 text-darkgray">
                            </span> 秒後重新發送驗證碼
                        </p>
                        @elseif (app()->getLocale() == 'zh-cn')
                        <p class=""> 在
                            <span id="countdown"
                                class="countdown inline-block  helvetica-normal me-body16 text-darkgray">
                            </span> 秒后重新发送验证码
                        </p>
                        @endif
                        {{-- <p class="">@lang('labels.log_in_register.resend_code_text1')
                            <span id="countdown"
                                class="countdown inline-block helvetica-normal me-body16 text-darkgray"></span>
                            <span class="">@lang('labels.log_in_register.resend_code_text2')</span>
                        </p> --}}
                        <input type="hidden" id="resend-email" name="reset-email">
                        <button type="button"
                            class="get-verification-btn cursor-pointer text-darkgray helvetica-normal hidden underline cus-resend-btn">@lang('labels.log_in_register.resend_code')</button>
                    </div>
                    <div class="w-full">
                        <button
                            class="submit-reset-mail-btn bg-orangeMediq border-1 rounded-[6px] w-full text-whitez helvetica-normal font-bold me-body18 flex items-center justify-center sm:h-[50px] h-[40px] my-[16px] hover:bg-whitez hover:text-orangeMediq hover:border-orangeMediq"
                            disabled>@lang('labels.log_in_register.next_step')</button>
                    </div>
                    <div class="w-full">
                        {{-- <button type="button" data-parent=".email-verification-code-popup" data-id="#log-email-address"
                            class="me-go-password-login-btn helvetica-normal me-body16 text-darkgray">@lang('labels.log_in_register.login_with_pwd')
                        </button> --}}

                        {{-- <button type="button" class="go-password-login-btn helvetica-normal me-body16 text-darkgray">Log in with password</button> --}}
                    </div>
                    <div class="mt-10">
                        <p class="me-body14 helvetica-normal text-meA3">
                            @if (app()->getLocale() == 'en')
                            By signing up or logging in, you acknowledge and
                            agree to mediQ’s <a href="{{ route('termofuse') }}" class="underline">General Terms of Use</a> and <a
                                href="{{ route('privacy.policy') }}" class="underline">Privacy Policy
                            </a>.
                            @elseif (app()->getLocale() == 'zh-hk')
                                註冊或登入即表示你同意mediQ之<a href="{{ route('termofuse') }}" class="underline">使用條款</a>和<a href="{{ route('privacy.policy') }}" class="underline">私隱政策</a>。
                            @else
                                注册或登入即表示你同意mediQ之<a href="{{ route('termofuse') }}" class="underline">使用条款</a>和<a href="{{ route('privacy.policy') }}" class="underline">私稳政策</a>。  
                            @endif
                        </p>
                    </div>

                </div>
            </div>

        </div>
    </div>
</dialog>
@if (Session::has('google-register'))
<dialog component-name="me-google-password-popup"
    class="lr-popup fixed z-[1001] left-0 top-0 w-full h-full overflow-hidden bg-linear-black items-center justify-center lr-reg-password-popup flex">
    <div class="bg-whitez w-full max-w-[500px] md:p-10 p-5 rounded-[12px] text-darkgray relative mx-auto">
        <div class="flex items-center justify-between ">
            <h3 class="me-body26 helvetica-normal font-bold text-darkgray mb-[8px]">
                @lang('labels.log_in_register.register')</h3>
            <button class="lr-popup-close absolute top-[24px] right-[24px] google-user-pass-close">
                <img src="{{ asset('frontend/img/lr_round-close.svg') }}" alt="close icon" />
            </button>
        </div>
        <div>
            <p class="helvetica-normal text-darkgrey me-body18 mb-5">
                @lang('labels.log_in_register.pwd_at_least_number_letter')</p>
        </div>
        <div class="relative mb-[20px]">
            <input class="hidden google-user-email" value="{{ Session::get('google-register') }}">
            <input type="password" name="password" placeholder=""
                class="w-full me-body18 placeholder-text-lightgray rounded-[8px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-mered google-user-pass">
            <img src="{{asset('frontend/img/eye-lash.svg')}}" alt="password"
                class="cursor-pointer inline-block absolute right-5 top-3 lg:absolute lg:right-[1.5rem] lg:top-[0.75rem] lg:-ml-12"
                id="current-password"
                data-imghide="{{asset('frontend/img/eye.svg')}}"
                data-imgshow="{{asset('frontend/img/eye-lash.svg')}}">
            <p class="text-mered me-body16 helvetica-normal mt-[12px] hidden">
                @lang('labels.log_in_register.pwd_at_least_number')</p>
        </div>
        <div class="w-full">
            <button
                class="google-pass-confirm-btn bg-orangeMediq rounded-[6px] w-full text-whitez helvetica-normal font-bold me-body18 flex items-center justify-center h-[50px] border border-orangeMediq hover:bg-whitez hover:text-orangeMediq">@lang('labels.log_in_register.confirm')</button>
        </div>
    </div>
</dialog>
{{ Session::forget('google-register') }}
@endif
@if (Session::has('facebook-register'))
<dialog component-name="me-password-popup"
    class="hidden lr-popup fixed z-[1001] left-0 top-0 w-full h-full overflow-hidden bg-linear-black items-center justify-center @@cls lr-reg-password-mail-popup flex">
    <div class="bg-whitez w-full max-w-[500px] md:p-10 p-5 rounded-[12px] text-darkgray relative mx-auto">
        <div class="flex items-center justify-between ">
            <h3 class="me-body26 helvetica-normal font-bold text-darkgray mb-[8px]">
                @lang('labels.log_in_register.register')</h3>
            <button class="lr-popup-close absolute top-[24px] right-[24px] facebook-user-pass-close">
                <img src="{{ asset('frontend/img/lr_round-close.svg') }}" alt="close icon" />
            </button>
        </div>
        <div>
            <p class="helvetica-normal text-darkgrey me-body18 mb-5">
                @lang('labels.log_in_register.pwd_at_least_number_letter')</p>
        </div>
        <div class="relative mb-[20px]">
            <input class="hidden facebook-user-id" value="{{ Session::get('facebook-register') }}">

            <input id="reg-password" type="password" name="reg-password"
                placeholder="@lang('labels.log_in_register.enter_pwd')"
                class="w-full me-body18 placeholder-text-lightgray rounded-[8px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-mered facebook-user-pass">
            <img src="{{asset('frontend/img/eye-lash.svg')}}" alt="password"
                class="cursor-pointer inline-block absolute right-5 top-3 lg:absolute lg:right-[0.75rem] lg:top-[0.75rem] lg:-ml-12"
                id="reg-current-password"
                data-imghide="{{asset('frontend/img/eye.svg')}}"
                data-imgshow="{{asset('frontend/img/eye-lash.svg')}}">
            {{-- <p class="text-mered me-body16 helvetica-normal mt-[12px] hidden pw-error">Password must have at least one number ‘0’-‘9’.</p> --}}
        </div>
        <div class="relative mb-[20px]">
            <input id="reg-email" type="text" name="@@name1" placeholder="@lang('labels.log_in_register.email')"
                class="w-full me-body18 placeholder-text-lightgray rounded-[8px] py-[19px] px-5 border border-meA3 h-[48px] focus:border-mered facebook-user-email">
            <p class="text-mered me-body16 helvetica-normal mt-[12px] hidden">invalid email</p>
        </div>
        <div class="w-full">
            <button
                class="reg-with-email-confirm-btn bg-orangeMediq rounded-[6px] w-full text-whitez helvetica-normal font-bold me-body18 flex items-center justify-center h-[50px]">@lang('labels.log_in_register.confirm')</button>
        </div>
    </div>
</dialog>
{{ Session::forget('facebook-register') }}
@endif
@if (Session::has('email_exist_msg'))
<dialog component-name="me-successful-login-popup"
    class="lr-popup fixed z-[1001] left-0 top-0 w-full h-full overflow-hidden bg-linear-black items-center justify-center successful-login-popup flex">
    <div class="bg-whitez w-full max-w-[500px] md:p-10 p-5 rounded-[12px] text-darkgray relative mx-auto">
        <button class="lr-successful-popup-close absolute top-[24px] right-[24px]">
            <img src="{{ asset('frontend/img/lr_round-close.svg') }}" alt="close icon" />
        </button>
        <div class="">
            <img src="{{ asset('frontend/img/check-mark 1.svg') }}" alt="successful icon"
                class="block mx-auto sucess-login-check-mark">
        </div>
        <h3 class="me-body26 helvetica-normal font-bold text-darkgray mt-5 text-center">{{__('labels.email_already_exist')}}</h3>
        {{-- <p class="me-body18 helvetica-normal text-center text-darkgray mt-5">Your account has been linked successfully!</p> --}}
        <div class="w-full pt-5">
            <button
                class="ok-btn bg-orangeMediq border border-orangeMediq rounded-[6px] w-full text-whitez helvetica-normal font-bold me-body18 flex items-center justify-center h-[50px] hover:bg-whitez hover:text-orangeMediq">OK</button>
        </div>
    </div>
</dialog>
{{ Session::forget('email_exist_msg') }}
@endif

<dialog component-name="me-successful-popup" class="hidden lr-popup fixed z-[1001] left-0 top-0 w-full h-full overflow-hidden bg-linear-black items-center justify-center activation-email-me-successful-popup">
    <div class="bg-whitez w-full max-w-[500px] md:p-10 p-5 rounded-[12px] text-darkgray relative mx-auto text-center">
        <button class="activation-successful-popup-close absolute top-[24px] right-[24px]">
            <img src="{{asset('frontend/img/lr_round-close.svg')}}" alt="close icon"/>
        </button>
        <div class="">
            <img src="{{asset('frontend/img/check-mark 1.svg')}}" alt="successful icon" class="block mx-auto">
        </div>
        <h3 class="me-body26 helvetica-normal font-bold text-darkgray mt-5 text-center">{{__('labels.log_in_register.activate_mail_sent')}}</h3>
        <p class="font-normal me-body18 text-darkgray mt-3">{{__('labels.log_in_register.pls_check_mail')}}</p>        
    </div>
</dialog>

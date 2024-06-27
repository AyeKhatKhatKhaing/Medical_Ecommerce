let token = localStorage.getItem("token");
let first_name = localStorage.getItem("first_name");
let last_name = localStorage.getItem("last_name");
var app_url = window.location.protocol;
var lng = $('html').attr('lang')
// login type
localStorage.setItem("loginType", "email");
document
    .querySelector("li[data-id='#email-address']")
    .addEventListener("click", function () {
        localStorage.setItem("loginType", "email");
    });
document
    .querySelector("li[data-id='#phone-number']")
    .addEventListener("click", function () {
        localStorage.setItem("loginType", "phone");
    });
document
    .querySelector("li[data-id='#log-email-address']")
    .addEventListener("click", function () {
        localStorage.setItem("loginType", "email");
    });
document
    .querySelector("li[data-id='#log-phone-number']")
    .addEventListener("click", function () {
        localStorage.setItem("loginType", "phone");
    });
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

// if (token) {
//     $(".before-login-container").addClass("hidden");
//     $(".login-container").removeClass("hidden");
//     $(".sign-in-container .login-container .sign-in-name span.mediq-user").text(
//         `${first_name} ${last_name}`
//     );
// }

$(".success-load .ok-btn").on("click", function (e) {
    location.reload();
});

// OK
$(".lr-reg-successful-popup .ok-btn").on("click", function (e) {
    e.preventDefault();
    // console.log("Ok click ...");
    $("input[type=text]").val("");
    $("input[type=password]").val("");
    $("input[type=email]").val("");
    $("input[type=number]").val("");
    location.reload();
});

// Logout
$(".sign-out").on("click", function (e) {
    e.preventDefault();
    localStorage.clear();
    $(".before-login-container").removeClass("hidden");
    $(".login-container").addClass("hidden");

    $("input[type=text]").val("");
    $("input[type=password]").val("");
    $("input[type=email]").val("");
    $("input[type=number]").val("");
    localStorage.setItem("loginType", "email");

    $("p.text-mered").addClass("hidden"); // clear error messages

    $.ajax({
        type: "POST",
        url: app_url + "/customer-logout",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            "X-App-Locale": lng
        },
        success: function (response) {
            if (window.location.pathname == "/coupon") {
                window.location.href = "/";
            } else {
                location.reload();
            }
        },
    });
});

var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

// facebook email
$("#reg-email").keyup(function (e) {
    if (!reg.test(e.target.value)) {
        var valid_email = `${window.translations.valid_email}`;
        $(".lr-reg-password-mail-popup p.text-mered").removeClass("hidden");
        $(".lr-reg-password-mail-popup p.text-mered").text(valid_email);
    } else {
        $(".lr-reg-password-mail-popup p.text-mered").addClass("hidden");
    }
});
// Email Validate
$(".lr-register-popup #email-address input[name=email-address]").keyup(
    function (e) {
        var valid_email = `${window.translations.valid_email}`;
        if (!reg.test(e.target.value)) {
            $("#email-address p.text-mered").removeClass("hidden");
            $("#email-address p.text-mered").text(valid_email);
        } else {
            $("#email-address p.text-mered").addClass("hidden");
        }
    }
);
//phone number validate 

var phonePattern = /^\d{8}$/;
$(".lr-register-popup #phone-number input[name=phone-number]").keyup(
    function (e) {
        $(".invalid_number").addClass("hidden");
        var phoneCode = $("#phone-code").val(); 
        var checkNumber = checkDigit(phoneCode,$("input[name=phone-number]").val());
        var invalid = `${window.translations.invalid_number}`;
        console.log('checkNumber',checkNumber,'invalid',invalid)
        if (phoneCode != '+95') {
            if (!phonePattern.test(e.target.value)) {
                var ph_no_must_8digit = `${window.translations.ph_no_must_8digit}`;
                $("#phone-number p.phone_number_error").removeClass("hidden");
                $("#phone-number p.phone_number_error").text(ph_no_must_8digit);
            } else if(checkNumber == false){
                $(".phone_number_error").addClass("hidden");
                $(".phone_number_error").removeClass("hidden");
                $(".phone_number_error").text(invalid);
            }else {
                $("#phone-number p.phone_number_error").addClass("hidden");
            }
            
            
        }
        else {
            $("#phone-number p.phone_number_error").addClass("hidden");
        }
    }
);

$(".lr-register-popup #phone-number-reset input[name=phone-number]").keyup(
    function (e) {
        $(".invalid_number").addClass("hidden");
        var phoneCode = $("#phone-code").val(); 
        var checkNumber = checkDigit(phoneCode,$("input[name=phone-number]").val());
        console.log('checkNumber',checkNumber)
        if (phoneCode != '+95') {
           
            if (!phonePattern.test(e.target.value)) {
                var ph_no_must_8digit = `${window.translations.ph_no_must_8digit}`;
                $("#phone-number p.phone_number_error").removeClass("hidden");
                $("#phone-number p.phone_number_error").text(ph_no_must_8digit);
            }else  if (checkNumber == false){
                var invalid = `${window.translations.invalid_number}`;
                $("#phone-number p.phone_number_error").removeClass("hidden");
                $("#phone-number p.phone_number_error").text(invalid);
            }
            else {
                $("#phone-number p.phone_number_error").addClass("hidden");
            }
            
        }
        else {
            $("#phone-number p.phone_number_error").addClass("hidden");
        }
    }
);

function checkDigit(phoneCode,number){
    var one = String(number).charAt(0);
    console.log('phoneCode',number,phoneCode,one != '1')
    if(phoneCode === "+852"){
        if(one == '5' || one == '6' || one == '9'){
            return true;
        }else{
            return false;

        }
    }

    // if(phoneCode === "+86"){
    //     if(one != '1'){
    //         return true;
    //     }else{
    //         return true;
    //     }
    // }
    return true;
}
// Next
$(".lr-register-popup .next-step-btn").on("click", function (e) {
    callLoading($(this));
    // console.log('next click');
    // alert(1)
    // _submitEvent = function() {
    // alert($(".g-recaptcha-response").val());
    // console.log($(".g-recaptcha-response").val())
    $("p.text-mered").addClass("hidden");  // clear error messages
    $('#check_old_email').val('')
    $('.old_email').val('')
    $('#reset-email').val('')
    $("input").attr("autocomplete", "off");
    var input_email = $("#email-address input[name=email-address]").val();
    if (!reg.test(input_email)) {
        stopLoading($(this))
        var valid_email = `${window.translations.valid_email}`;

        $("#email-address p.text-mered").removeClass("hidden");
        $("#email-address p.text-mered").text(valid_email);
        return;
    }
    if($("#captcha1Form .g-recaptcha-response").val()){
        checkMail($("#captcha1Form .g-recaptcha-response").val() , $(this));
    }else{
        return;
    }

// };
});

// Login
$(".login-btn").on("click", function (e) {
    e.preventDefault();
    // clear error messages
    $("p.text-mered").addClass("hidden");
    // console.log("Login click ...");

    var login_mail = $(
        ".lr-login-with-email-popup #log-email-address input[name=email-address]"
    ).val();
    var login_pwd = $(
        ".lr-login-with-email-popup input[name=login-password]"
    ).val();

    var remember_me = $('input[name="remember_me"]:checked').each(function () {
        return this.value;
    });

    $.ajax({
        url: app_url + "/api/user/email-login",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            "X-App-Locale": lng
        },
        dataType: "json",
        type: "POST",
        data: {
            email: login_mail,
            password: login_pwd,
            remember_me: remember_me.length,
            "g-recaptcha-response": $(".g-recaptcha-response").val(),
        },
        success: function (resp) {
            // console.log("Register ...", resp);
            if (resp.success) {
                $(".sign-in-container .before-login-container").addClass(
                    "hidden"
                );
                $(".sign-in-container .login-container").removeClass("hidden");
                $(
                    ".sign-in-container .login-container .sign-in-name span.mediq-user"
                ).text(
                    `${resp.data.user.first_name} ${resp.data.user.last_name}`
                );
                localStorage.setItem("token", resp.data.access_token);
                localStorage.setItem("first_name", resp.data.user.first_name);
                localStorage.setItem("last_name", resp.data.user.last_name);

                $(".lr-register-popup").removeClass("flex").addClass('hidden');
                // accountInfos();
                $(".lr-login-with-email-popup").removeClass("flex").addClass('hidden');
                $(".lr-reg-successful-popup").removeClass("flex").addClass('hidden');
                // $("body").removeClass("overflow-hidden");
                // $('.is_login').removeClass('hidden')
                // $('.is_not_login').addClass('hidden')
                
                location.reload();
            }
        },
        error: function (xhr, error, resp) {
            // console.log(xhr.responseJSON.message);
            $("#log-email-address p.pw-err").removeClass("hidden");
            $("#log-email-address p.pw-err").text(xhr.responseJSON.message);
        },
    });
});

// Confirm
$(".pass-confirm-btn").on("click", function (e) {
    e.preventDefault();
    // clear error messages
    $("p.text-mered").addClass("hidden");

    // console.log("Confirm click ...", localStorage.getItem("loginType"));
    if (localStorage.getItem("loginType") == "email") {
        var input_email = $("#email-address input[name=email-address]").val();
        var input_password = $("input[name=password]").val();
        auth(input_email, input_password);
    } else {
        var input_email = $(".email-address").val();
        if(localStorage.getItem("Loginpopup") == "phone"){
            var phone_code = $(".phone-code-3 option:selected").val();
        }else{
            var phone_code = $(".phone-code-2 option:selected").val();
        }
        var ph_number = $("#phone-number input[name=phone-number]").val()
        if(!ph_number){
            ph_number = $('.get_phone_number').val();
        }
        var input_phno = phone_code + ph_number;
            
        var input_password = $("input[name=password]").val();
        phoneAuth(input_phno, input_password,input_email);
    }
});

// checkmail api
function checkMail(token, thisVal= null) {
    // clear error messages
    $("p.text-mered").addClass("hidden");

    $.ajax({
        url: app_url + "/api/user/check-mail",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            "X-App-Locale": lng , 
        },
        dataType: "json",
        type: "POST",
        data: {
            email: $("#email-address input[name=email-address]").val(),
            "g-recaptcha-response":token
        },
        success: function (resp) {
            clearInterval(downloadTimer);
            stopLoading(thisVal)
            console.log($("#email-address input[name=email-address]").val(), resp);
            mail = $("#email-address input[name=email-address]").val();
            $("#mail_address").html(mail);
            var reset_to = `${window.translations.reset_to}`;
            $("#mail").html(reset_to);
            if (resp.success) {
                if (resp.data.page == "register") {
                    $(".lr-reg-password-popup").addClass("flex").removeClass('hidden');
                    $(".lr-register-popup").removeClass("flex").addClass('hidden');
                }

                if (resp.data.page == "login-same-email") {
                    $(".login-same-email-popup h3").text(resp.data.first_name);
                    $(".login-same-email-popup .google-img img").attr(
                        "src",
                        resp.data.profile_img
                    );
                    $(".login-same-email-popup").addClass("flex").removeClass('hidden');
                    $(".lr-register-popup").removeClass("flex").addClass('hidden');
                }

                if (resp.data.page == "login") {
                    $(".lr-login-with-email-popup").addClass("flex").removeClass('hidden');
                    $(".lr-reg-password-popup").removeClass("flex").addClass('hidden');
                    $(
                        ".lr-login-with-email-popup #log-email-address input[name=email-address]"
                    ).val($("#email-address input[name=email-address]").val());
                }
            }
            $("input").attr("autocomplete", "off");
        },
        error: function (e) {
            stopLoading(thisVal)
            $(".lr-register-popup").addClass("flex").removeClass('hidden');
            $(".lr-reg-password-popup").removeClass("flex").addClass('hidden');
        },
    });
}

// Login Api
function auth(input_email, input_password) {
    // clear error messages
    $("p.text-mered").addClass("hidden");

    $.ajax({
        url: app_url + "/api/user/register",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            "X-App-Locale": lng
        },
        dataType: "json",
        type: "POST",
        data: {
            email: input_email,
            password: input_password,
        },
        success: function (resp) {
            // console.log("Register ...", resp);
            if (resp.success) {
                // $(".sign-in-container .before-login-container").addClass(
                //     "hidden"
                // );
                // $(".sign-in-container .login-container").removeClass("hidden");
                // $(
                //     ".sign-in-container .login-container .sign-in-name span.mediq-user"
                // ).text(
                //     `${resp.data.user.first_name} ${resp.data.user.last_name}`
                // );
                // localStorage.setItem("token", resp.data.access_token);
                // localStorage.setItem("first_name", resp.data.user.first_name);
                // localStorage.setItem("last_name", resp.data.user.last_name);
                $(".lr-reg-password-popup").removeClass("flex").addClass('hidden');
                openActivateMail();
                // toastr.success('pls check your activate mail')
                // $(".lr-reg-successful-popup").addClass("flex");
            }
        },
        error: function (xhr, error, resp) {
            // console.log(xhr.responseJSON);
            $(".lr-reg-password-popup  p.text-mered").removeClass("hidden");
            $(".lr-reg-password-popup  p.text-mered").text(
                xhr.responseJSON.message
            );
        },
    });
}

$(".login-phone").on("click", function (e) {
    localStorage.setItem("Loginpopup","phone")
    if (localStorage.getItem("resetPass")) {
        localStorage.removeItem("resetPass");
    }
})
// Start: Phone Login with recapta
$("#captcha2Form .g-recaptcha").on("click", function (e) {
    // console.log("captcha")
    callLoading($(this));
    $("#check_old_email").val('')
    if (localStorage.getItem("resetPass")) {
        localStorage.removeItem("resetPass");
    }
    if (localStorage.getItem("Loginpopup")) {
        localStorage.removeItem("Loginpopup");
    }
    if($("#captcha2Form .g-recaptcha-response").val()){
        var response = $("#captcha2Form .g-recaptcha-response").val();
    }else{
        stopLoading($(this))
        return;
    }
    var input_phno = $("#phone-number input[name=phone-number]").val();
    if(!input_phno){
        input_phno = $(".get_phone_number").val();
    }
    var phone_code = $('.phone-code-2 option:selected').val();
    if (input_phno == "") {
        stopLoading($(this))
        return;
    }
    // console.log(input_phno,phone_code,response);
    checkPhone(input_phno,phone_code,response,$(this))

})

// SVC btn
var downloadTimer;
// $(".svc-btn").on("click", function (e) {
$(document).on("click", ".svc-btn", function (e) {
    e.preventDefault();
    // console.log("SVC click ...");
    // callLoading($(this));
    if ($(this).hasClass("login-phone")) {
        callLoading($(this));
    }
    $('.otp-container input[type="text"]').val("");
    $("p.text-mered").addClass("hidden"); // clear error messages

    if (localStorage.getItem("resetPass") == "resetPass") {
        var phone_code = $(".reset_phone_code option:selected").val();
        var input_phno = $("#reset-phone-number").val();

    }else if(localStorage.getItem("Loginpopup") == "phone"){
        var input_phno = $("#login-ph-number").val();
        if(!input_phno){
            input_phno = $(".get_phone_number").val();
        }
        var phone_code = $('.phone-code-3 option:selected').val();

    }else{
        var input_phno = $("#phone-number input[name=phone-number]").val();
        if(!input_phno){
            input_phno = $(".get_phone_number").val();
        }
        var phone_code = $(".phone-code-2 option:selected").val();
    }
    var response = 'response';
    console.log(input_phno,phone_code,response);
    // console.log(response);
    console.log('input_phno',input_phno,localStorage.getItem("resetPass"),localStorage.getItem("Loginpopup"))
    if (input_phno == "") {
        stopLoading($(this))
        return;
    }
    checkPhone(input_phno,phone_code,response,$(this))
    // $.ajax({
    //     url: app_url+"/api/user/check-phno",
    //     dataType: "json",
    //     type: "POST",
    //     data: {
    //         phno: input_phno,
    //         phone_code: phone_code,
    //         "g-recaptcha-response":response

    //     },
    //     success: function (resp) {
    //         if (resp.success) {
    //             if(localStorage.getItem("Loginpopup") == "phone"){
    //                 $(".lr-login-with-email-popup").removeClass("flex");
    //             }
    //             $(".ph-verification-code-popup").addClass("flex");
    //             $(".lr-reg-password-popup").removeClass("flex");
    //             $(".lr-register-popup").removeClass("flex");
    //             // const otp = resp.data.otp.split("");
    //             // $("input#first").val(otp[0]);
    //             // $("input#sec").val(otp[1]);
    //             // $("input#third").val(otp[2]);
    //             // $("input#fourth").val(otp[3]);
    //             // $("input#fifth").val(otp[4]);
    //             // $("input#sixth").val(otp[5]);
    //             console.log(resp.data.otp);
    //             $('.res_number').html(resp.data.phno)
    //             if(resp.data.has_phone){
    //                 $("input.has_phone").val(resp.data.has_phone);
    //             }
    //             $(".ph-verification-code-popup .submit-btn").removeAttr(
    //                 "disabled"
    //             );
    //             resendLink(60);
    //         }
    //     },
    //     error: function (e) {
    //         // $(".lr-register-popup").addClass("flex");
    //         // $(".lr-reg-password-popup").removeClass("flex");
    //     },
    // });
});

function checkPhone(input_phno, phone_code, response,thisVal = null) {
     console.log('lng',lng)
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            "X-App-Locale": lng
        },
        url: app_url + "/api/user/check-phno",
        dataType: "json",
        type: "POST",
        data: {
            phno: input_phno,
            phone_code: phone_code,
            "g-recaptcha-response":response
        },
        success: function (resp) {
            // $("input[name=reset-phone-number]").val('');
            stopLoading(thisVal)
            $("input[name=phone-number]").val('');
            $(".get_phone_number").val(input_phno);
            $("input").attr("autocomplete", "off");
            var login = `${window.translations.login}`;
            var login_to = `${window.translations.login_to}`;
            var register = `${window.translations.register}`;
            var register_to = `${window.translations.to_register}`;
            if (resp.data.email_is_verified == 1) {
                $("#popup_header").html(login);
                $("#reset_login").html(login_to);
            }
            else {
                $("#popup_header").html(register);
                $("#reset_login").html(register_to);
            }
            if (resp.success) {
                if (localStorage.getItem("Loginpopup") == "phone") {
                    $(".lr-login-with-email-popup").removeClass("flex").addClass('hidden');
                }
                $(".ph-verification-code-popup").addClass("flex").removeClass('hidden');
                $(".lr-reg-password-popup").removeClass("flex").addClass('hidden');
                $(".lr-register-popup").removeClass("flex").addClass('hidden');
                // const otp = resp.data.otp.split("");
                $("input#first").val('');
                $("input#sec").val('');
                $("input#third").val('');
                $("input#fourth").val('');
                $("input#fifth").val('');
                $("input#sixth").val('');
                // console.log(resp.data.otp);
                var phone = resp.data.phno;
                // var text = phone.replace(/(\d{3})(\d{4})(\d{4})/, '$1 $2 $3')
                // const countryCode = phone.slice(0, 4);
                // const firstPart = phone.slice(4, 8);
                const phoneNo = phone.slice(-8);
                const firstPart = phoneNo.slice(0,4);
                const secondPart = phoneNo.slice(4,8);
                const code = phone.slice(0,-8);
                // console.log(phone, secondPart, code , firstPart);
                var text = code + " " + firstPart + " " + secondPart
                
                $(".res_number").html(text);
                if (resp.data.has_phone) {
                    $("input.has_phone").val(resp.data.has_phone);
                }
                // $(".ph-verification-code-popup .submit-btn").removeAttr(
                //     "disabled"
                // );
                resetClock();
                clearInterval(downloadTimer);
                resendLink(120);

                // resendLink(60);
            }
        },
        error: function (xhr, error, resp) {
            stopLoading(thisVal)
            $("input[name=reset-phone-number]").val('');
            $("input[name=phone-number]").val('');
            $("input").attr("autocomplete", "off");
            $("input#first").val('');
            $("input#sec").val('');
            $("input#third").val('');
            $("input#fourth").val('');
            $("input#fifth").val('');
            $("input#sixth").val('');
            // $(".lr-register-popup").addClass("flex");
            // $(".lr-reg-password-popup").removeClass("flex");
            $("#phone-number p.phone_number_error").addClass("hidden");
            $(".phone_number_error").addClass('hidden')
            $(".invalid_number").removeClass('hidden')
            $(".invalid_number").text(xhr.responseJSON.message);
        },
    });
}
function resendLink(countS) {
    // console.log("here");

    var timeleft = countS;

    downloadTimer = setInterval(function () {
    if (timeleft <= 0) {
    clearInterval(downloadTimer);
    $(".countdown").html("00:" + countS);
    $(".countdown").addClass("hidden").removeClass("count-show");
    $(".countdown").parent().addClass("hidden");
    $(".cus-resend-btn").removeClass("hidden").addClass("stop-clock");
    } else {
    $(".countdown").removeClass("hidden").addClass("count-show");
    if (timeleft < 10) {
    $(".countdown").html("0" + timeleft + 's');
    } else {
    $(".countdown").html(timeleft + 's');
    }

    }
    timeleft -= 1;

    }, 1000);
    }
// OTP
$(".ph-verification-code-popup .submit-btn").on("click", function (e) {
    e.preventDefault();
    $("p.text-mered").addClass("hidden"); // clear error messages

    if (localStorage.getItem("resetPass") == "resetPass") {
        var input_phno = $("#reset-phone-number").val();
        if(!input_phno){
            input_phno = $('.get_phone_number').val();
        }
        var phone_code = $(".reset_phone_code option:selected").val();
    } else if (localStorage.getItem("Loginpopup") == "phone") {
        var input_phno = $("#login-ph-number").val();
        if(!input_phno){
            input_phno = $('.get_phone_number').val();
        }
        var phone_code = $(".phone-code-3 option:selected").val();
    } else {
        var input_phno = $("#phone-number input[name=phone-number]").val();
        if(!input_phno){
            input_phno = $('.get_phone_number').val();
        }
        var phone_code = $(".phone-code-2 option:selected").val();
    }
    var has_phone = $("input.has_phone").val();
    var otp =
        $("input#first").val() +
        $("input#sec").val() +
        $("input#third").val() +
        $("input#fourth").val() +
        $("input#fifth").val() +
        $("input#sixth").val();
    $.ajax({
        url: app_url + "/api/user/check-otp",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            "X-App-Locale": lng
        },
        dataType: "json",
        type: "POST",
        data: {
            phno: input_phno,
            phone_code: phone_code,
            otp: otp,
        },
        success: function (resp) {
            
            if (resp.success) {
                $(".ph-verification-code-popup").removeClass("flex").addClass('hidden');

                if (localStorage.getItem("resetPass") == "resetPass") {
                    $(".lr-reset-password-popup").addClass("flex").removeClass('hidden');
                    localStorage.removeItem("resetPass");
                } else {
                    if (has_phone == 0) {
                        $(".is_email").removeClass("hidden");
                        $(".lr-reg-password-popup").addClass("flex").removeClass('hidden');
                    } else {
                        if(resp.message == 'show_pop_up'){
                            $(".is_email").removeClass("hidden");
                            $(".lr-reg-password-popup").addClass("flex").removeClass('hidden');
                        }
                        // if (localStorage.getItem("Loginpopup") == "phone") {
                        //     localStorage.removeItem("Loginpopup");
                        // }

                        // $(
                        //     ".sign-in-container .before-login-container"
                        // ).addClass("hidden");
                        // $(".sign-in-container .login-container").removeClass(
                        //     "hidden"
                        // );

                        // $(
                        //     ".sign-in-container .login-container .sign-in-name span.mediq-user"
                        // ).text(`${resp.data.first_name} ${resp.data.last_name}`);
                        // localStorage.setItem("token", resp.data.access_token);
                        // localStorage.setItem("first_name", resp.data.first_name);
                        // localStorage.setItem("last_name", resp.data.last_name);
                        if(resp.message == 1){
                            location.reload();
                        }
                    }
                }
            }
        },
        error: function (xhr) {
            // console.log(xhr);
            $(".ph-verification-code-popup p.text-mered").removeClass("hidden");
            $(".ph-verification-code-popup p.text-mered").text(
                xhr.responseJSON.message
            );
            // console.log(xhr.responseJSON);
        },
    });
});

function phoneAuth(phno, password, email) {
    console.log('email',email)
    $.ajax({
        url: app_url + "/api/user/phno-register",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            "X-App-Locale": lng
        },
        dataType: "json",
        type: "POST",
        data: {
            phno: phno,
            password: password,
            email: email,
        },
        success: function (resp) {
            // console.log("Phone Auth ...", resp);
            if (resp.success) {
                // $(".sign-in-container .before-login-container").addClass(
                //     "hidden"
                // );
                // $(".sign-in-container .login-container").removeClass("hidden");
                // $(
                //     ".sign-in-container .login-container .sign-in-name span.mediq-user"
                // ).text(`${resp.data.first_name} ${resp.data.last_name}`);
                // localStorage.setItem("token", resp.data.access_token);
                // localStorage.setItem("first_name", resp.data.first_name);
                // localStorage.setItem("last_name", resp.data.last_name);
                $(".lr-reg-password-popup").removeClass("flex").addClass('hidden');
                // $(".lr-login-with-email-popup").removeClass("flex");
                // $(".lr-reg-successful-popup").addClass("flex");
                openActivateMail();
                // toastr.success('pls check your activate mail')
            }
        },
        error: function (xhr, error, resp) {
            $(".lr-reg-password-popup").addClass("flex").removeClass('hidden');
            $(".lr-reg-successful-popup").removeClass("flex").addClass('hidden');
            // console.log('email',xhr.responseJSON.message.email,'all',xhr.responseJSON.message);
            $(".lr-reg-password-popup p.text-mered").removeClass("hidden");
            $(".lr-reg-password-popup p.text-mered").text(
                xhr.responseJSON.message
            );
        },
    });
}

$(".password-login-btn ").on("click", function (e) {
    e.preventDefault();
    $("p.text-mered").addClass("hidden"); // clear error messages

    var phno = $("#phone-number input[name=phone-number]").val();
    if(!phno){
        phno = $(".get_phone_number").val();
    }
    var password = $("input[name=reg-password-phno]").val();
    // console.log("Otp login with password", phno, password);
    const phone_code = $(".phone-code-2 option:selected").val();
    $.ajax({
        url: app_url + "/api/user/phno-login",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            "X-App-Locale": lng
        },
        dataType: "json",
        type: "POST",
        data: {
            phno: phno,
            password: password,
            phone_code: phone_code,
        },
        success: function (resp) {
            // console.log("Phone Auth With Password ...", resp);
            console.log('resp',resp);
            if (resp.success) {

                if(resp.message == 'verified_email'){
                $(".lr-register-popup").removeClass("flex").addClass('hidden');
                $(".is_email").removeClass("hidden");
                $(".lr-reg-password-popup").addClass("flex").removeClass('hidden');
                }else{
                    location.reload();
                }

                // $(".sign-in-container .before-login-container").addClass(
                //     "hidden"
                // );
                // $(".sign-in-container .login-container").removeClass("hidden");
                // $(
                //     ".sign-in-container .login-container .sign-in-name span.mediq-user"
                // ).text(`${resp.data.first_name} ${resp.data.last_name}`);
                // localStorage.setItem("token", resp.data.access_token);
                // localStorage.setItem("first_name", resp.data.first_name);
                // localStorage.setItem("last_name", resp.data.last_name);

                // $(".lr-reg-password-popup").removeClass("flex");
                // $(".lr-register-popup").removeClass("flex");
                // $(".lr-reg-successful-popup").removeClass("flex");
                
            }
        },
        error: function (xhr, error, resp) {
            // console.log(xhr.responseJSON.message);
            $(".login-with-password-section p.text-mered").removeClass(
                "hidden"
            );
            $(".login-with-password-section p.text-mered").text(
                xhr.responseJSON.message
            );
        },
    });
});

$(".go-login-btn").on("click", function () {
    $("p.text-mered").addClass("hidden"); // clear error messages

    $(".login-with-password-section .password-login-btn").removeAttr(
        "disabled"
    );
    localStorage.setItem("loginType", "phone");
});

$(".go-verification-btn").on("click", function () {
    $("p.text-mered").addClass("hidden"); // clear error messages

    localStorage.setItem("loginType", "phone");
});

$(".reset-via-phone-btn").on("click", function () {
    $("p.text-mered").addClass("hidden"); // clear error messages

    localStorage.setItem("loginType", "phone");
    localStorage.setItem("resetPass", "resetPass");
});

$(".reset-via-email-btn").on("click", function () {
    $("p.text-mered").addClass("hidden"); // clear error messages

    localStorage.setItem("loginType", "email");
    localStorage.setItem("resetPass", "resetPass");
});

$(".before-login").on("click", function () {
    $("p.text-mered").addClass("hidden"); // clear error messages

    $(".login-with-password-section").addClass("hidden");
    $(".login-with-phone").removeClass("hidden");
});

$(".forget-password-btn ").on("click", function () {
    $("p.text-mered").addClass("hidden"); // clear error messages
    $('.reset-password-popup').removeClass('hidden').addClass('flex');
    $(".lr-register-popup").removeClass("flex").addClass("hidden");
});

//reset password

// send-code-btn
$(".send-code-btn").on("click", function (e) {
    var thisVal = $(this);
    e.preventDefault();
    callLoading($(this));
    $("p.text-mered").addClass("hidden"); // clear error messages
    
    // console.log("send-code-btn click ...");

    var phone_code = $(".reset_phone_code option:selected").val();
    var input_phno = $("#reset-phone-number").val();
    // console.log(phone_code);
    if (input_phno == "") {
        stopLoading($(this))
        return;
    }
    if (localStorage.getItem("Loginpopup")) {
        localStorage.removeItem("Loginpopup");
    }
    // else {
       
    // }
    $.ajax({
        url: app_url + "/api/user/check-reset-phno",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            "X-App-Locale": lng
        },
        dataType: "json",
        type: "POST",
        data: {
            phno: input_phno,
            phone_code: phone_code,
        },
        success: function (resp) {
            stopLoading(thisVal)
            $(".get_phone_number").val(input_phno);
            $("input[name=reset-phone-number]").val('');
            $("input[name=phone-number]").val('');
            $("input").attr("autocomplete", "off");
            $("input#first").val('');
            $("input#sec").val('');
            $("input#third").val('');
            $("input#fourth").val('');
            $("input#fifth").val('');
            $("input#sixth").val('');
            var reset = `${window.translations.reset}`;
            var reset_to = `${window.translations.reset_to}`;

            $("#popup_header").html(reset);
            $("#reset_login").html(reset_to);
            // console.log(resp.success);
            if (resp.success == true) {
                $(".reset-password-popup").removeClass("flex").addClass('hidden');
                $(".ph-verification-code-popup").addClass("flex").removeClass('hidden');
                $(".lr-register-popup").removeClass("flex").addClass('hidden');
                
                localStorage.setItem("resetPass", "resetPass");

                // const otp = resp.data.otp.split("");
                // $("input#first").val(otp[0]);
                // $("input#sec").val(otp[1]);
                // $("input#third").val(otp[2]);
                // $("input#fourth").val(otp[3]);
                // $("input#fifth").val(otp[4]);
                // $("input#sixth").val(otp[5]);
                var phone = resp.data.phno;
                // var text = phone.replace(/(\d{3})(\d{4})(\d{4})/, '$1 $2 $3')
                const phoneNo = phone.slice(-8);
                const firstPart = phoneNo.slice(0,4);
                const secondPart = phoneNo.slice(4,8);
                const code = phone.slice(0,-8);
                // console.log(phone, secondPart, code , firstPart);
                var text = code + " " + firstPart + " " + secondPart
                $(".res_number").html(text);

                // $(".ph-verification-code-popup .submit-btn").removeAttr(
                //     "disabled"
                // );
                resendLink(120);
            }
        },
        error: function (xhr, error, resp) {
            stopLoading(thisVal)
            $("input[name=reset-phone-number]").val('');
            $("input[name=phone-number]").val('');
            $("input").attr("autocomplete", "off");
            $("input#first").val('');
            $("input#sec").val('');
            $("input#third").val('');
            $("input#fourth").val('');
            $("input#fifth").val('');
            $("input#sixth").val('');
            // $(".lr-reset-password-popup").addClass("flex");
            // $(".lr-reg-successful-popup").removeClass("flex");
            // console.log(xhr.responseJSON.message);
            $(".reset-password-by-phone-number p.text-mered").removeClass(
                "hidden"
            );
            $(".reset-password-by-phone-number p.text-mered").text(
                xhr.responseJSON.message
            );
        },
    });
});
// Reset
$(".reset-pass-btn").on("click", function (e) {
    e.preventDefault();
    $("p.text-mered").addClass("hidden"); // clear error messages

    // console.log("Confirm click ...", localStorage.getItem("loginType"));
    if (localStorage.getItem("loginType") == "email") {
        var value = $("#reset-email").val();
        var input_password = $("#reset-password").val();
        ResetPass("email", value, input_password);
        // console.log("email reset");
    } else {
        var phone_code = $(".reset_phone_code option:selected").val();
        var value = phone_code + $("#reset-phone-number").val();
        var input_password = $("#reset-password").val();
        // console.log(input_password , input_phno);
        ResetPass("phone", value, input_password);
    }
});
function ResetPass(col, value, password) {
    $.ajax({
        url: app_url + "/api/user/reset-pass",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            "X-App-Locale": lng
        },
        dataType: "json",
        type: "POST",
        data: {
            col: col,
            value: value,
            password: password,
        },
        success: function (resp) {
            // console.log("Reset Password ...", resp);
            if (resp.success) {
                $(".sign-in-container .before-login-container").addClass(
                    "hidden"
                );
                $(".sign-in-container .login-container").removeClass("hidden");
                $(
                    ".sign-in-container .login-container .sign-in-name span.mediq-user"
                ).text(`${resp.data.first_name} ${resp.data.last_name}`);
                // localStorage.setItem("token", resp.data.access_token);
                localStorage.setItem("first_name", resp.data.first_name);
                localStorage.setItem("last_name", resp.data.last_name);
                $(".lr-reset-password-popup").removeClass("flex").addClass('hidden');;
                // $(".lr-login-with-email-popup").removeClass("flex");
                $(".lr-reset-pass-successful-popup").addClass("flex").removeClass('hidden');;
            }
        },
        error: function (xhr, error, resp) {
            $(".lr-reset-password-popup").addClass("flex").removeClass('hidden');;
            $(".lr-reg-successful-popup").removeClass("flex").addClass('hidden');;
            // console.log(xhr.responseJSON.message);
            $(".lr-reset-password-popup p.text-mered").removeClass("hidden");
            $(".lr-reset-password-popup p.text-mered").text(
                xhr.responseJSON.message
            );
        },
    });
}

// get-verification-btn
$(".get-verification-btn").on("click", function (e) {
    e.preventDefault();
    var thisVal = $(this);
    $("p.text-mered").addClass("hidden"); // clear error messages
    callLoading($(this));
    // console.log("get-verification-btn click ...");

    var input_email = $("#reset-email").val();
    // console.log(input_email);
    $("#resend-email").val(input_email);
    if (input_email == "") {
        stopLoading($(this))
        return;
    }

    $.ajax({
        url: app_url + "/api/user/check-reset-email",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            "X-App-Locale": lng
        },
        dataType: "json",
        type: "POST",
        data: {
            email: input_email,
        },
        success: function (resp) {
            stopLoading(thisVal)
            // console.log(resp.success);
            if (resp.success == true) {
                // console.log("success");
                $(".reset-password-popup").removeClass("flex").addClass('hidden');
                $(".email-verification-code-popup").addClass("flex").removeClass('hidden');
                $(".lr-register-popup").removeClass("flex").addClass('hidden');
                $('#mail_address').text(input_email)
                localStorage.setItem("resetPass", "resetPass");

                // const otp = resp.data.otp.split("");
                // $("input#email-first").val(otp[0]);
                // $("input#email-sec").val(otp[1]);
                // $("input#email-third").val(otp[2]);
                // $("input#email-fourth").val(otp[3]);
                // $("input#email-fifth").val(otp[4]);
                // $("input#email-sixth").val(otp[5]);

                $(".submit-reset-mail-btn").removeAttr("disabled");

                resendLink(120);
            }
        },
        error: function (xhr, error, resp) {
            stopLoading(thisVal)
            // $(".lr-reset-password-popup").addClass("flex");
            // $(".lr-reg-successful-popup").removeClass("flex");
            // console.log(xhr.responseJSON.message);
            $(".reset-password-by-email p.text-mered").removeClass("hidden");
            $(".reset-password-by-email p.text-mered").text(
                xhr.responseJSON.message
            );
        },
    });
});

// Mail OTP
$(".submit-reset-mail-btn").on("click", function (e) {
    e.preventDefault();
    $("p.text-mered").addClass("hidden"); // clear error messages

    var input_mail = $("#reset-email").val();
    var otp =
        $("input#email-first").val() +
        $("input#email-sec").val() +
        $("input#email-third").val() +
        $("input#email-fourth").val() +
        $("input#email-fifth").val() +
        $("input#email-sixth").val();

    $.ajax({
        url: app_url + "/api/user/check-mail-otp",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            "X-App-Locale": lng
        },
        dataType: "json",
        type: "POST",
        data: {
            mail: input_mail,
            otp: otp,
        },
        success: function (resp) {
            if (resp.success) {
                $(".email-verification-code-popup").removeClass("flex").addClass('hidden');
                if (localStorage.getItem("resetPass") == "resetPass") {
                    $(".lr-reset-password-popup").addClass("flex").removeClass('hidden');
                    localStorage.removeItem("resetPass");
                } else {
                    $(".lr-reg-password-popup").addClass("flex").removeClass('hidden');
                }
            }
        },
        error: function (xhr) {
            $(".email-verification-code-popup p.text-mered").removeClass(
                "hidden"
            );
            $(".email-verification-code-popup p.text-mered").text(
                xhr.responseJSON.message
            );
            // console.log(xhr.responseJSON);
        },
    });
});

// $(".lr-register-popup .lr-google-btn").on("click", function (e) {
//     e.preventDefault();
//     console.log("click google...");
//     $.ajax({
//         url: "auth/google",
//         dataType: "json",
//         type: "GET",
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         },
//         success: function (resp) {
//             console.log("google");
//         },
//         error: function (xhr) {

//         },
//     });
// });

$(".google-pass-confirm-btn").on("click", function (e) {
    e.preventDefault();
    // console.log("click register google...");
    var input_email = $(".google-user-email").val();
    var input_password = $(".google-user-pass").val();
    // console.log(input_email, input_password);
    $.ajax({
        url: app_url + "/api/user/google-register",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            "X-App-Locale": lng
        },
        dataType: "json",
        type: "POST",
        data: {
            email: input_email,
            password: input_password,
        },
        success: function (resp) {
            // console.log("Register Google...", resp);
            if (resp.success) {
                $(".sign-in-container .before-login-container").addClass(
                    "hidden"
                );
                $(".sign-in-container .login-container").removeClass("hidden");
                $(
                    ".sign-in-container .login-container .sign-in-name span.mediq-user"
                ).text(`${resp.data.first_name} ${resp.data.last_name}`);
                localStorage.setItem("token", resp.data.access_token);
                localStorage.setItem("first_name", resp.data.first_name);
                localStorage.setItem("last_name", resp.data.last_name);
                $(".lr-reg-password-popup").removeClass("flex").addClass('hidden');
                $(".lr-reg-successful-popup").addClass("flex").removeClass('hidden');
            }
        },
        error: function (xhr, error, resp) {
            // console.log(xhr.responseJSON);
            $(".lr-reg-password-popup  p.text-mered").removeClass("hidden");
            $(".lr-reg-password-popup  p.text-mered").text(
                xhr.responseJSON.message
            );
        },
    });
});

$(".google-user-pass-close").on("click", function (e) {
    e.preventDefault();
    $(".sign-in-container .before-login-container").addClass("hidden");
    $(".sign-in-container .login-container").removeClass("hidden");
    // $(
    //     ".sign-in-container .login-container .sign-in-name span.mediq-user"
    // ).text("Mediq User");

    // localStorage.setItem("first_name", "Mediq");
    // localStorage.setItem("last_name", "User");
    $(".lr-reg-password-mail-popup").removeClass("flex").addClass('hidden');
    $(".lr-reg-successful-popup").addClass("flex").removeClass('hidden');
});

$(".reg-with-email-confirm-btn").on("click", function (e) {
    e.preventDefault();
    // console.log("click register facebook...");
    var user_id = $(".facebook-user-id").val();
    var input_email = $(".facebook-user-email").val();
    var input_password = $(".facebook-user-pass").val();
    // console.log(user_id, input_email, input_password);
    $.ajax({
        url: app_url + "/api/user/facebook-register",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            "X-App-Locale": lng
        },
        dataType: "json",
        type: "POST",
        data: {
            email: input_email,
            password: input_password,
            user_id: user_id,
        },
        success: function (resp) {
            // console.log("Register Facebook...", resp);
            if (resp.success) {
                $(".sign-in-container .before-login-container").addClass(
                    "hidden"
                );
                $(".sign-in-container .login-container").removeClass("hidden");
                $(
                    ".sign-in-container .login-container .sign-in-name span.mediq-user"
                ).text(`${resp.data.first_name} ${resp.data.last_name}`);
                localStorage.setItem("token", resp.data.access_token);
                localStorage.setItem("first_name", resp.data.first_name);
                localStorage.setItem("last_name", resp.data.last_name);
                $(".lr-reg-password-mail-popup").removeClass("flex").addClass('hidden');
                $(".lr-reg-successful-popup").addClass("flex").removeClass('hidden');
            }
        },
        error: function (xhr, error, resp) {
            // console.log(xhr.responseJSON);
            $(".lr-reg-password-mail-popup  p.text-mered").removeClass(
                "hidden"
            );
            $(".lr-reg-password-mail-popup  p.text-mered").text(
                xhr.responseJSON.message
            );
        },
    });
});

$(".facebook-user-pass-close").on("click", function (e) {
    e.preventDefault();
    $(".sign-in-container .before-login-container").addClass("hidden");
    $(".sign-in-container .login-container").removeClass("hidden");
    $(".sign-in-container .login-container .sign-in-name span.mediq-user").text(
        "Mediq User"
    );

    localStorage.setItem("first_name", "Mediq");
    localStorage.setItem("last_name", "User");
    $(".lr-reg-password-mail-popup").removeClass("flex").addClass('hidden');
    $(".lr-reg-successful-popup").addClass("flex").removeClass('hidden');
});
$(".sign-up-success-close").on("click", function (e) {
    e.preventDefault();
    location.reload();
});

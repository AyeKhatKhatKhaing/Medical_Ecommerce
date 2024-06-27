@extends('frontend.layouts.master')
@include('frontend.seo', ['seo' => isset($seo) ? $seo : ''])
@section('content')
    <main>
        <section class="dash-banner-section">
            <div component-name="me-dashboard-banner">
                <div class="relative">
                    <img src="{{ asset('frontend/img/Rectangle 2645.png') }}" alt="background image" class="h-[180px]">
                    <h1
                        class="me-body32 text-whitez helvetica-normal font-bold text-center absolute top-1/2 left-1/2 dashboard-title">
                        @lang("labels.lefrmenu.setting")
                    </h1>
                </div>
            </div>
        </section>
        <section class="user-dashboard-section coupon-list">
            <div class="flex justify-between relative helvetica-normal user-dashboard-layer">
                @include('frontend.customer.leftmenu')
                <div class="udl-right">
                    @include('frontend.customer.myacc-setting-data')
                </div>
            </div>
        </section>
        @include('frontend.include.product-compare-box')
    </main>
    <dialog id="change-password-message" component-name="me-compare-status-popup"
    class="csp-container hidden flex items-center justify-center fixed z-[1001] left-0 top-0 w-full h-full bg-transparent overflow-hidden">
        <div class="bg-darkgray rounded-[4px] p-4">
            <p class="me-body16 helvetica-normal text-white">@lang("labels.basic_info.success_update")</p>
        </div>
    </dialog>
    <dialog id="update-notification-message" component-name="me-compare-status-popup"
    class="csp-container hidden flex items-center justify-center fixed z-[1001] left-0 top-0 w-full h-full bg-transparent overflow-hidden">
        <div class="bg-darkgray rounded-[4px] p-4">
            <p class="me-body16 helvetica-normal text-white">@lang("labels.setting.successfully_updated_notification")</p>
        </div>
    </dialog>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {

            $("body").on("click", "#btn_change_password", function() {
                $(".txt_current_password_error,.txt_new_password_error,.txt_new_password_confirmation_error").addClass("hidden"); 
                $.ajax({
                    url: "{{ route('dashboard.myacc.changepassword') }}",
                    type: "POST",
                    data: JSON.stringify({
                        currentPassword : $("#txt_current_password").val(),
                        newPassword : $("#txt_new_password").val(),
                        newPasswordConfirmation : $("#txt_new_password_confirmation").val(),
                    }),
                    dataType: "json",
                    contentType: "application/json",
                    success: function(data) {
                        $("#txt_current_password").val("");
                        $("#txt_new_password").val("");
                        $("#txt_new_password_confirmation").val("");
                        $("#change-password-message").removeClass("hidden");
                        compareStatusAutoClose();
                    },error:function(data){
                        $.each(data.responseJSON.errors,function(k,v){
                            if(k=="currentPassword")
                            {
                                let errorTxt = v[0];
                                $(".txt_current_password_error").html(errorTxt);
                                $(".txt_current_password_error").removeClass("hidden"); 
                            }
                            if(k=="newPassword")
                            {
                                let errorTxt = v[0];
                                $(".txt_new_password_error").html(errorTxt);
                                $(".txt_new_password_error").removeClass("hidden"); 
                            }
                            if(k=="newPasswordConfirmation")
                            {
                                let errorTxt = v[0];
                                $(".txt_new_password_confirmation_error").html(errorTxt);
                                $(".txt_new_password_confirmation_error").removeClass("hidden"); 
                            }
                        });
                    }
                });
            });

            $("body").on("click", ".add_on,.decide-later", function() {
                $.ajax({
                    url: "{{ route('dashboard.myacc.updatenotification') }}",
                    type: "POST",
                    data: JSON.stringify({
                        customerId : $(this).data('customer-id'),
                        customNotificationId : $(this).data('custom-noti-id'),
                        notificationTypeId : $(this).data('noti-type-id'),
                    }),
                    dataType: "json",
                    contentType: "application/json",
                    success: function(data) {
                        $("#update-notification-message").removeClass("hidden");
                        compareStatusAutoClose();
                        setTimeout(() => { document.location.reload(); }, 4000);
                    }
                });
            });
        });
    </script>
    <script src="{{ asset('frontend/custom/product-compare.js') }}"></script>
@endpush

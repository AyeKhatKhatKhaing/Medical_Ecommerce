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
                        @lang('labels.basic_info.basic_info')
                    </h1>
                </div>
            </div>
        </section>
        <section class="user-dashboard-section coupon-list">
            <div class="flex justify-between relative helvetica-normal user-dashboard-layer">
                @include('frontend.customer.leftmenu')
                <div class="udl-right">
                    @include('frontend.customer.myacc-basicinfo-data')
                </div>
            </div>
        </section>
        @include('frontend.include.product-compare-box')
    </main>
    <dialog id="successfully-saved-message" component-name="me-compare-status-popup"
    class="csp-container hidden flex items-center justify-center fixed z-[1001] left-0 top-0 w-full h-full bg-transparent overflow-hidden">
        <div class="bg-darkgray rounded-[4px] p-4">
            <p class="me-body16 helvetica-normal text-white">@lang('labels.basic_info.success_save')</p>
        </div>
    </dialog>

    <dialog id="successfully-deleted-message" component-name="me-compare-status-popup"
    class="csp-container hidden flex items-center justify-center fixed z-[1001] left-0 top-0 w-full h-full bg-transparent overflow-hidden">
        <div class="bg-darkgray rounded-[4px] p-4">
            <p class="me-body16 helvetica-normal text-white"></p>
        </div>
    </dialog>
    <dialog id="successfully-verifiedphoneno-message" component-name="me-compare-status-popup"
    class="csp-container hidden flex items-center justify-center fixed z-[1001] left-0 top-0 w-full h-full bg-transparent overflow-hidden">
        <div class="bg-darkgray rounded-[4px] p-4">
            <p class="me-body16 helvetica-normal text-white">@lang('labels.basic_info.successfully_verified_phone_no')</p>
        </div>
    </dialog>
    <dialog id="successfully-verifiedemail-message" component-name="me-compare-status-popup"
    class="csp-container hidden flex items-center justify-center fixed z-[1001] left-0 top-0 w-full h-full bg-transparent overflow-hidden">
        <div class="bg-darkgray rounded-[4px] p-4">
            <p class="me-body16 helvetica-normal text-white">Successfully verified email information</p>
        </div>
    </dialog>
    <style>
        .text-mered-content {
            --tw-text-opacity: 1;
            color: rgba(254,76,38,var(--tw-text-opacity));
        }
        .bod-arrow-local{transform:translate(-50%,-50%)}
    </style>
@endsection
@push('scripts')
    <script>
         window.translations = {
            please_select: '@lang('labels.basic_info.please_select')',
            add_new_record: '@lang('labels.basic_info.add_new_record')',
            add_a_member: '@lang('labels.basic_info.add_a_member')',
            edit_member: '@lang('labels.basic_info.edit_member')',
            fill_birthday: '@lang('labels.basic_info.fill_your_birthday')',
            mr: '@lang('labels.check_out.mr')',
            mrs: '@lang('labels.check_out.ms')',
         };
        let familyMembers = <?php echo json_encode($familyMembers); ?>;
        let family_member_id = "";
        let mr = `${window.translations.mr}`;
        let mrs = `${window.translations.mrs}`;
        const phoneElement = document.getElementById("phone-hide-section");
        if(lng=='zh-hk'){
            lng='tc';
        }else if(lng=='zh-cn'){
            lng='sc';
        }
        $("body").addClass("dashboard-account-section");
        $("input").attr("autocomplete", "off");
        let downloadTimerContent;
        let customerId = {{$personalInfo->id}};
        function resendLinkCurrent(countS) {
            var timeleft = countS;
            downloadTimerContent = setInterval(function(){
            if(timeleft <= 0){
                clearInterval(downloadTimerContent);
                $('.countdown').html("00:"+countS);
                $(".countdown").addClass('hidden').removeClass('count-show');
                $(".countdown").parent().addClass('hidden');
                $('.cus-resend-btn').removeClass('hidden').addClass('stop-clock');
            } else {
                $(".countdown").removeClass('hidden').addClass("count-show");
                if(timeleft < 10) {
                    $(".countdown").html( "0"+ timeleft);
                } else {
                    $(".countdown").html(timeleft);
                }

            }
            timeleft -= 1;
            }, 1000);
        }
        //if($("#dashboard-personal-card").length>0){var $email=$(".text-section.email-sector span"),$emailText=$email.text(),$phone=$(".text-section.phone-sector span"),$phoneText=$phone.text(),$phoneLength=$phoneText.length;$phoneLength>0&&phoneHideFun($phoneText,$phoneLength),$emailText.length>0&&emailHideFun($emailText)}
        // $(document).on("click",".basic-edit-btn",function(){
        //     if($(this).attr("data-id")=="dashboard-personal-card") {
        //         $(".email-input").addClass("show");
        //         $(".text-section.email-sector.verified").addClass("hide");
        //         return false;
        //     }
        // });

        $("body").on("click", "#btn-personal-info", function() {
            var fill_birthday = `${window.translations.fill_birthday}`;
            $(".text-mered").addClass("hidden")
            $(".text-mered").html("");
            $.ajax({
                url: "{{ route('dashboard.myacc.basicinfo.changepersonalinfo') }}",
                type: "POST",
                data: JSON.stringify({
                    title_full_name: $("#txt_title_full_name").val(),
                    first_name: $("#first_name").val(),
                    last_name: $("#last_name").val(),
                    address: $("#address").val(),
                    dob: $("#bod-datepicker").val(),
                    email : $("#email_1").val(),
                    phone : $("#phone1").val().length==0?"":($("#phone123").val()!=""?$("#phone_code1").val()+$("#phone123").val():""),
                    country : $("#country").val(),
                    area_id : $("#area_id").val()!=""?$("#area_id").val():null,
                    district_id : $("#district_id").val()!=""?$("#district_id").val():null
                }),
                dataType: "json",
                contentType: "application/json",
                success: function(data) {
                    if (data.status == "success") {
                        $("#successfully-updated-message").removeClass("hidden");
                        compareStatusAutoClose();
                        setTimeout(() => { document.location.reload(); }, 3000);
                        // $("#full_name_content").text((data.data.title_full_name=='Mr'?mr:mrs) + " " + data.data
                        //     .first_name + " " + data.data.last_name)
                        // $("#txt_title_full_name").val(data.data.title_full_name)
                        // $("#title_full_name").text(data.data.title_full_name=='Mr'?mr:mrs)
                        // $("#first_name").text(data.data.first_name)
                        // $("#last_name").text(data.data.last_name)
                        // $(".user_name_content").html(data.data.first_name)
                        // $("#user_name").text(data.data.first_name)
                        // $("#address_content").text(data.data.address)
                        // $("#address").val(data.data.address)
                        // $("#bod-datepicker").text(data.data.dob)
                        // if(data.data.dob==""){
                        //     $("#dob_content").text(fill_birthday)
                        // }else{
                        //     $("#dob_content").text(data.data.dob)
                        // }
                        // $("#dob_content").text(data.data.dob)
                        // $("#email_content").text(data.data.email)
                        // $("#email_content2").text(data.data.email)
                        // $("#email_1").val(data.data.email)
                        // $("#phone_content").text(data.data.phone!=null?data.data.phone.slice(0,4):'')
                        // $("#phone1").val(data.data.phone!=null?data.data.phone.slice(4):'')
                        // $("#phone_code1").val(data.data.phone!=null?data.data.phone.slice(0,4):'')
                        // $("#phone_no").text(data.data.phone!=null?data.data.phone.slice(0,4)+data.data.phone.slice(4):'')
                        // $("#phone_no2").text(data.data.phone!=null?data.data.phone.slice(0,4)+data.data.phone.slice(4):'')
                        // if(data.data.phone!=null && data.data.is_verified==0) {
                        //     $(".verify-phone-btn-content").removeClass("hidden");
                        // }
                        // if(data.data.email!=null && data.data.email_is_verified==0) {
                        //     $(".verify-email-btn-content").removeClass("hidden");
                        // }
                        // familyMembers = data.familyMembers;

                        // var $email = $('.text-hide-section.email-sector span'),
                        // $emailText = $email.text(),
                        // $phone = $('.text-hide-section.phone-sector span'),
                        // $phoneText = $phone.text(),
                        // $phoneLength = $phoneText.length;
                        // if($phoneLength > 0) {
                        //     //console.log($phoneLength)
                        //     phoneHideFun($phoneText,$phoneLength,$(phoneElement));
                        // }
                        // if($emailText.length > 0) {
                        //     emailHideFun($emailText);
                        // }
                      
                    }
                },error:function(data){
                        $.each(data.responseJSON.errors,function(k,v){
                            if(k=="email")
                            {
                                let errorTxt = v[0];
                                $(".email_error").html(errorTxt);
                                $(".email_error").removeClass("hidden");
                            }
                            if(k=="phone")
                            {
                                let errorTxt = v[0];
                                $(".phone_error").html(errorTxt);
                                $(".phone_error").removeClass("hidden");
                            }
                        });
                }
            });
        });

        $('#btn-img-upload').click(function(e) {
            e.preventDefault();
            let formData = new FormData(document.getElementById('file-upload'));
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
                        //console.log(response.data)
                        $("#full_name_content").text((response.data.title_full_name=='Mr'?mr:mrs) + " " + response.data
                            .first_name + " " + response.data.last_name)
                        $(".user_name_content").html(response.data.first_name)
                        $("#f_name_1").val(response.data.first_name)
                        $("#first_name").val(response.data.first_name)
                        if(response.data.profile_img!=null) {
                        $(".preview-img").attr("src", "../../../storage/customer/" + response.data.profile_img);
                        }
                        familyMembers = response.familyMembers;
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

        $("body").on("click", "#relationship-confirm-btn", function() {
            $(".text-mered").addClass("hidden")
            $(".text-mered").html("")
            $.ajax({
                url: "{{ route('dashboard.myacc.basicinfo.save.familymember.info') }}",
                type: "POST",
                data: JSON.stringify({
                    first_name: $("#f_name").val(),
                    last_name: $("#l_name").val(),
                    gender: $('.selector-item_radio:checked').val(),
                    dob: $("#relationship-dob").val(),
                    phone: $("#phone").val()!=""?$("#phone_code").val()+$("#phone").val():'',
                    email: $("#email").val(),
                    id_type: $("#id_type").text(),
                    id_number: $("#id_number").val(),
                    relationship_type_id: $('.select-relationship:checked').val(),
                    id: $(this).attr("data-id")
                }),
                dataType: "json",
                contentType: "application/json",
                success: function(data) {
                    if (data.status == "success") {
                        $(".lr-popup-close").click();
                        familyMembers = data.familyMembers;
                        if(data.data.relationship_type_id==1){
                            $("#address_content").text(data.data.address)
                            $("#address").val(data.data.address)
                            $("#dob_content").text(data.data.dob)
                            $("#bod-datepicker").text(data.data.dob)
                        }
                        if (data.process == 'create') {
                            let div =
                                `
                            <div class="cursor-pointer member-card-flex-item w-[282px] p-5 flex flex-col items-center justify-center cusBox rounded-[12px] mr-5 relative" id="member` +
                                data.data.id + `">
                                    <button data-id="member` + data.data.id + `" data-relationship-type-id="` + data.data.relationship_type_id + `" class="delete-member-card-btn absolute top-[20px] right-[5px] 2xs:right-[20px]">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg')}}">
                                            <path d="M10.1984 4.80078H13.7984C13.7984 4.32339 13.6088 3.86555 13.2712 3.52799C12.9337 3.19042 12.4758 3.00078 11.9984 3.00078C11.521 3.00078 11.0632 3.19042 10.7256 3.52799C10.3881 3.86555 10.1984 4.32339 10.1984 4.80078ZM8.99844 4.80078C8.99844 4.00513 9.31451 3.24207 9.87712 2.67946C10.4397 2.11685 11.2028 1.80078 11.9984 1.80078C12.7941 1.80078 13.5571 2.11685 14.1198 2.67946C14.6824 3.24207 14.9984 4.00513 14.9984 4.80078H20.9984C21.1576 4.80078 21.3102 4.864 21.4227 4.97652C21.5352 5.08904 21.5984 5.24165 21.5984 5.40078C21.5984 5.55991 21.5352 5.71252 21.4227 5.82505C21.3102 5.93757 21.1576 6.00078 20.9984 6.00078H19.7336L18.3008 18.4136C18.1996 19.291 17.7792 20.1006 17.1199 20.6883C16.4605 21.2759 15.6081 21.6007 14.7248 21.6008H9.27204C8.38878 21.6007 7.53637 21.2759 6.877 20.6883C6.21763 20.1006 5.79732 19.291 5.69604 18.4136L4.26324 6.00078H2.99844C2.83931 6.00078 2.6867 5.93757 2.57417 5.82505C2.46165 5.71252 2.39844 5.55991 2.39844 5.40078C2.39844 5.24165 2.46165 5.08904 2.57417 4.97652C2.6867 4.864 2.83931 4.80078 2.99844 4.80078H8.99844ZM6.88764 18.2768C6.95535 18.8617 7.23569 19.4012 7.67534 19.7929C8.11499 20.1845 8.68326 20.4009 9.27204 20.4008H14.7248C15.3136 20.4009 15.8819 20.1845 16.3215 19.7929C16.7612 19.4012 17.0415 18.8617 17.1092 18.2768L18.5252 6.00078H5.47164L6.88764 18.2768ZM10.1984 9.00078C10.3576 9.00078 10.5102 9.06399 10.6227 9.17652C10.7352 9.28904 10.7984 9.44165 10.7984 9.60078V16.8008C10.7984 16.9599 10.7352 17.1125 10.6227 17.225C10.5102 17.3376 10.3576 17.4008 10.1984 17.4008C10.0393 17.4008 9.88669 17.3376 9.77417 17.225C9.66165 17.1125 9.59844 16.9599 9.59844 16.8008V9.60078C9.59844 9.44165 9.66165 9.28904 9.77417 9.17652C9.88669 9.06399 10.0393 9.00078 10.1984 9.00078ZM14.3984 9.60078C14.3984 9.44165 14.3352 9.28904 14.2227 9.17652C14.1102 9.06399 13.9576 9.00078 13.7984 9.00078C13.6393 9.00078 13.4867 9.06399 13.3742 9.17652C13.2617 9.28904 13.1984 9.44165 13.1984 9.60078V16.8008C13.1984 16.9599 13.2617 17.1125 13.3742 17.225C13.4867 17.3376 13.6393 17.4008 13.7984 17.4008C13.9576 17.4008 14.1102 17.3376 14.2227 17.225C14.3352 17.1125 14.3984 16.9599 14.3984 16.8008V9.60078Z" fill="#333333"></path>
                                        </svg>
                                    </button>
                                    <p class="bg-mee4 flex items-center justify-center rounded-[50px] py-[4px] px-[12px] me-body14 text-darkgray mr-[10px] self-baseline">
                                        ` + data.relationship + `</p>
                                    <p class="helvetica-normal me-body18 text-darkgray font-bold my-[12px]">` + data
                                .data.first_name + ' ' + data.data.last_name +
                                `</p>
                                    <div class="flex items-center justify-center mb-5">
                                        <button data-action="record" class="record-action-btn flex items-center justify-center w-[48px] h-[48px]"><img src="../../frontend/img/medical-record 2.svg" class="w-[32px]"></button>
                                        <button data-action="vaccine" class="record-action-btn flex items-center justify-center w-[48px] h-[48px]"><img src="../../frontend/img/vaccine-gray.svg" class="w-[32px]"></button>
                                    </div>
                                    <dialog component-name="dashboard-delete-member-popup" class="hidden fixed z-[1001] left-0 top-0 w-full h-full overflow-hidden bg-linear-black items-center justify-center delete-member-popup" id="del-member` +
                                data.data.id +
                                `">
                                        <div class="bg-whitez w-full max-w-[620px] md:p-10 p-5 rounded-[12px] text-darkgray relative mx-auto">
                                            <div class="flex items-center justify-center mb-5">
                                                <h3 class="me-body26 helvetica-normal font-bold text-darkgray">Delete Member
                                                    Information</h3>
                                                <button class="lr-popup-close absolute top-[24px] right-[24px]">
                                                    <img src="../../frontend/img/lr_round-close.svg" alt="close icon">
                                                </button>
                                            </div>
                                            <div>
                                                <p class="helvetica-normal text-center justify-center me-body18 text-darkgray">
                                                    Are you sure you want to delete this? This action cannot be undone.</p>
                                            </div>
                                            <div class="bottom-section mt-[32px]">
                                                <div class="button-section flex items-center justify-center">
                                                    <button class="me-body16 flex items-center justify-center text-darkgray font-bold helvetica-normal border border-darkgray max-w-[135px] w-full h-[50px] rounded-[6px] bg-whitez hover:border-orangeMediq hover:text-orangeMediq mr-[4px] custom-cancel-btn" data-id="del-member` +
                                data.data.id +
                                `">Cancel</button>
                                                    <button class="me-body16 flex items-center justify-center text-whitez font-bold helvetica-normal border border-d1 max-w-[135px] w-full h-[50px] rounded-[6px] bg-orangeMediq hover:bg-brightOrangeMediq del-member-confirm-btn-custom" data-remove="member` +
                                data.data.id + `">Comfirm</button>
                                                </div>
                                            </div>
                                        </div>
                                    </dialog>
                            </div>`;
                            $("#member-content > div:last-child").before(div);

                            let div2 =
                                `<label for="mymember`+data.data.id+`" class="custom-radio-container mr-[60px] mb-[10px]">
                                <input type="radio" name="my-member[]" class="decide-later" id="mymember`+data.data.id+`"
                                    value="`+data.data.id+`">
                                <span class="custom-radio-orange"></span>
                                <span
                                    class="ml-10 5xl:ml-[40px] text-darkgray font-bold flex items-center justify-center"><span
                                        class="me-body14 font-normal bg-mee4 rounded-[50px] px-[12px] py-[4px] flex items-center justify-center mr-[10px]">`+data.relationship + `</span>`+data.data
                            .first_name+' '+data.data.last_name +`</span>
                            </label>`;
                            $(".family-member-list").append(div2)
                            $("#successfully-saved-message").removeClass("hidden");

                        }else{
                            $("#successfully-updated-message").removeClass("hidden");
                        }
                        compareStatusAutoClose();
                        setTimeout(() => { document.location.reload(); }, 4000);

                    }
                },error:function(data){
                        $.each(data.responseJSON.errors,function(k,v){
                            if(k=="first_name")
                            {
                                let errorTxt = v[0];
                                $("#f_name_error").html(errorTxt);
                                $("#f_name_error").removeClass("hidden");
                            }
                            if(k=="last_name")
                            {
                                let errorTxt = v[0];
                                $("#l_name_error").html(errorTxt);
                                $("#l_name_error").removeClass("hidden");
                            }
                            if(k=="relationship_type_id")
                            {
                                let errorTxt = v[0];
                                $("#relationship_type_id_error").html(errorTxt);
                                $("#relationship_type_id_error").removeClass("hidden");
                            }
                            if(k=="phone")
                            {
                                let errorTxt = v[0];
                                $("#phone2_error").html(errorTxt);
                                $("#phone2_error").removeClass("hidden");
                            }
                            if(k=="email")
                            {
                                let errorTxt = v[0];
                                $("#email2_error").html(errorTxt);
                                $("#email2_error").removeClass("hidden");
                            }
                        });
                }
            });
        });
        $("body").on("click", "#member-confirm-btn", function() {

            $('input[name=check-relationship]').attr("disabled",false);
            $("#f_name").attr("disabled",false);
            $("#l_name").attr("disabled",false);
            $('input:radio[name="check-relationship"][value="1"]').attr('disabled',true);
            $("#phone_code_btn").attr("disabled",false);
            $("#phone").attr("disabled",false);
            $("#email").attr("disabled",false);
            $("#phone_code_btn > span").text("+852");
            if ($('.decide-later:checked').val() != 0) {
                var edit_member = `${window.translations.edit_member}`;
                $("#member_title").text(edit_member)
                familyMembers.forEach(function(e) {
                    if ($('.decide-later:checked').val() == e.id) {
                        $("#f_name").val(e.first_name)
                        $("#l_name").val(e.last_name)
                        $("#relationship-dob").val(e.dob!=null?e.dob.split("-").reverse().join("/"):'')
                        $('#vaccine-select1').val(e.id_type)
                        $("#id_type").text(e.id_type)
                        $("#id_number").val(e.id_number)
                        $("#phone").val(e.phone!=null?e.phone.length==12?e.phone.slice(4):e.phone.length==11?e.phone.slice(3):'':'')
                        $("#phone_code").val(e.phone!=null?e.phone.length==12?e.phone.slice(0,4):e.phone.length==11?e.phone.slice(0,3):'':'+852')
                        $("#phone_code_btn > span").text(e.phone!=null?e.phone.length==12?e.phone.slice(0,4):e.phone.length==11?e.phone.slice(0,3):'':'+852')
                        $("#email").val(e.email)
                        $("#relationship-confirm-btn").attr("data-id", e.id)
                        $('input:radio[name="gender"][value="' + e.gender + '"]').attr('checked', true);
                        if(e.relationship_type_id==1)
                        {
                            $('input[name=check-relationship]').attr("disabled",true);
                            $("#f_name").attr("disabled",true);
                            $("#l_name").attr("disabled",true);
                            if(e.first_name=="" && e.last_name=="") {
                                $("#f_name").attr("disabled",false);
                                $("#l_name").attr("disabled",false);
                            }
                            $("#phone_code_btn").attr("disabled",true);
                            $("#phone").attr("disabled",true);
                            $("#email").attr("disabled",true);

                        }
                        $('input:radio[name="check-relationship"][value="' + e.relationship_type_id + '"]').attr('checked', true);
                    }
                });
            } else {
                    var add_a_member = `${window.translations.add_a_member}`;
                    $("#member_title").text(add_a_member)
                    $("#relationship-confirm-btn").attr("data-id", 0)
                    $("#f_name").val("")
                    $("#l_name").val("")
                    $("#relationship-dob").val("")
                    $("#id_type").val("")
                    $("#id_number").val("")
                    $("#phone_code").val("+852")
                    $("#phone").val("")
                    $("#email").val("")
                    $('input:radio[name="gender"]').attr('checked', false);
                    $('input:radio[name="check-relationship"]').attr('checked', false);
                    $('#vaccine-select1').val("")

            }
        });

        $("body").on("click", ".del-member-confirm-btn-custom", function() {
            let e = $(this).data("remove");
            let delete_id = parseInt($(this).attr("data-remove").split("member")[1]);
            $.ajax({
                url: "{{ route('dashboard.myacc.basicinfo.save.familymember.info') }}",
                type: "POST",
                data: JSON.stringify({
                    first_name:'aa',
                    last_name:'aa',
                    relationship_type_id:'0',
                    delete_id: delete_id
                }),
                dataType: "json",
                contentType: "application/json",
                success: function(data) {
                    if (data.status == "success") {
                        $("#" + e).remove()
                        familyMembers = data.familyMembers;
                        $('label[for="mymember'+delete_id+'"]').hide();
                        $("#successfully-deleted-message").removeClass("hidden");
                        compareStatusAutoClose();
                        setTimeout(() => { document.location.reload(); }, 4000);
                    }
                }
            });
        });

        $("body").on("click", ".record-action-btn", function() {
            family_member_id = parseInt($(this).attr("data-id"));
            if ($(this).attr("data-action") == "vaccine") {
                $.ajax({
                    url: "{{ route('dashboard.myacc.basicinfo.get.vaccine.info') }}",
                    type: "POST",
                    data: JSON.stringify({
                        family_member_id: family_member_id
                    }),
                    dataType: "json",
                    contentType: "application/json",
                    success: function(data) {
                        if (data.status == "success") {
                            $("#vaccination-new-record").attr("data-id", family_member_id);
                            let div = "";
                            data.data.forEach(function(value) {
                                div += `
                                    <tr>
                                    <td>` + value.vaccination_date + `</td>
                                    <td>` + value[`vaccine_name_${lng}`] + `</td>
                                    <td>` + value[`age_group_name_${lng}`] + `</td>
                                    <td>` + value.remarks + `</td>
                                    <td><button data-parent="vacci-record-popup" class="edit-vacci-record-btn" data-id="` +
                                    value.id + `">
                                        <img src="../../../frontend/img/ph_dots-three-bold.svg" alt="three dot icon"></button></td>
                                    </tr>
                                `;
                            });
                            $("#vaccination-record-table tbody").html(div);

                        }
                    }
                });
            } else {
                $(".personal-medical-yes").addClass("hidden")
                $(".family-medical-yes").addClass("hidden")
                $(".allergy-yes").addClass("hidden")
                $(".drinkYes").addClass("hidden")
                $(".smokeYes").addClass("hidden")
                $(".livernot").addClass("hidden")
                $(".renalnot").addClass("hidden")
                $.ajax({
                    url: "{{ route('dashboard.myacc.basicinfo.get.health.record.info') }}",
                    type: "POST",
                    data: JSON.stringify({
                        family_member_id: family_member_id
                    }),
                    dataType: "json",
                    contentType: "application/json",
                    success: function(data) {
                        if (data.status == "success") {
                            if (data.data != null) {
                                $("#health-record-add-btn").attr("data-id", data.data.id)
                                $("#delete-record").attr("data-id", data.data.id)
                                $("#blood_type").val(data.data[`blood_type_name_${lng}`])
                                $("#blood_type_text").text(data.data[`blood_type_name_${lng}`])
                                $("#maritial_status").val(data.data[`maritial_status_name_${lng}`])
                                $("#maritial_status_text").text(data.data[`maritial_status_name_${lng}`])
                                if (data.data.drinking == 1) {
                                    $(".drinkYes").removeClass("hidden")
                                }
                                $("input[name=select-drink][value=" + data.data
                                    .main_type_of_alcohol_id + "]").prop('checked', true);
                                $("input[name=select-amount][value=" + data.data
                                    .amount_of_alcohol_drinking_id + "]").prop('checked', true);
                                $("#height").val(data.data.height)
                                $("#weight").val(data.data.weight)
                                $("input[name=drink-check][value=" + data.data.drinking + "]").prop(
                                    'checked', true);
                                $("#drinking_age").val(data.data.drinking_age)
                                $("input[name=smoke-check][value=" + data.data.smoking + "]").prop(
                                    'checked', true);
                                if (data.data.smoking == 1) {
                                    $(".smokeYes").removeClass("hidden")
                                }

                                $("#smoking_age").val(data.data.smoking_age)
                                $("#no_of_cigarettes_smoked_per_day").val(data.data
                                    .no_of_cigarettes_per_day_stick)
                                $("input[name=liver-check][value=" + data.data.liver_function + "]")
                                    .prop('checked', true);
                                if (data.data.liver_function == 1) {
                                    $(".livernot").removeClass("hidden")
                                }

                                $("#input_abnormal_liver_function_index").val(data.data
                                    .input_abnormal_liver_function_index)
                                $("input[name=renal-check][value=" + data.data.renal_function + "]")
                                    .prop('checked', true);
                                if (data.data.renal_function == 1) {
                                    $(".renalnot").removeClass("hidden")
                                }
                                $("#input_abnormal_renal_function_index").val(data.data
                                    .input_abnormal_renal_function_index)
                                $("input[name=personal-history-check][value=" + data.data
                                    .personal_medicial_history + "]").prop('checked', true);
                                $("input[name=family-history-check][value=" + data.data
                                    .family_medicial_history + "]").prop('checked', true);
                                $("input[name= allergy-check][value=" + data.data.allergic_history +
                                    "]").prop('checked', true);

                                if (data.data.personal_medicial_history == 1) {
                                    $(".personal-medical-yes").removeClass("hidden")
                                }
                                if (data.data.family_medicial_history == 1) {
                                    $(".family-medical-yes").removeClass("hidden")
                                }
                                if (data.data.allergic_history == 1) {
                                    $(".allergy-yes").removeClass("hidden")
                                }
                                data.data.personal_medicial_history_list.forEach(function(id) {
                                    $("input[name=select-history][value=" + id + "]").prop(
                                        'checked', true);
                                })
                                data.data.family_medicial_history_list.forEach(function(id) {
                                    $("input[name=select-family-history][value=" + id + "]")
                                        .prop('checked', true);
                                })
                                data.data.allergic_history_list.forEach(function(id) {
                                    $("input[name=select-allergy][value=" + id + "]").prop(
                                        'checked', true);
                                })
                            } else {
                                $("#health-record-add-btn").attr("data-id", 0)
                                $("#delete-record").attr("data-id", 0)
                                $("#blood_type").val("")
                                $("#blood_type_text").text(please_select)
                                $("#maritial_status").val()
                                $("#maritial_status_text").text(please_select)
                                $("input[name=select-drink]").prop('checked', false);
                                $("input[name=select-amount]").prop('checked', false);
                                $("#height").val("")
                                $("#weight").val("")
                                $("input[name=drink-check]").prop('checked', false);
                                $("#drinking_age").val("")
                                $("input[name=smoke-check]").prop('checked', false);
                                $("#smoking_age").val("")
                                $("#no_of_cigarettes_smoked_per_day").val("")
                                $("input[name=liver-check]").prop('checked', false);
                                $("#input_abnormal_liver_function_index").val("")
                                $("input[name=renal-check]").prop('checked', false);
                                $("#input_abnormal_renal_function_index").val("")
                                $("input[name=personal-history-check]").prop('checked', false);
                                $("input[name=family-history-check]").prop('checked', false);
                                $("input[name= allergy-check]").prop('checked', false);
                                $("input[name=select-history]").prop('checked', false);
                                $("input[name=select-family-history]").prop('checked', false);
                                $("input[name=select-allergy]").prop('checked', false);
                            }

                        }
                    }
                });
            }
        })
        var please_select = `${window.translations.please_select}`;
        var add_new_record = `${window.translations.add_new_record}`;
        //console.log(please_select)
        $("#vaccination-new-record").on("click", function() {
            $("#vacci-add-btn").attr("data-id", 0);
            $("#vaccine_title").text(add_new_record);
            $("#vacci-date").val('')
            $('#vaccine-select11').val('')
            $('#vaccine-select2').val('')
            $('#vaccination_type').text(please_select)
            $('#age_group_type').text(please_select)
            $("#remarks").val('')
        })
        $("body").on("click", ".edit-vacci-record-btn", function() {
            $("#vaccine_title").text("Edit Record");
            $("#vacci-add-btn").attr("data-id", $(this).attr("data-id"));
            $.ajax({
                url: "{{ route('dashboard.myacc.basicinfo.get.vaccine.details.info') }}",
                type: "POST",
                data: JSON.stringify({
                    vaccination_record_id: $(this).attr("data-id")
                }),
                dataType: "json",
                contentType: "application/json",
                success: function(data) {
                    if (data.status == "success") {
                        $("#vacci-date").val(data.data.vaccination_date)
                        $('#vaccine-select11').val(data.data[`vaccine_name_${lng}`])
                        $('#vaccine-select2').val(data.data[`age_group_name_${lng}`])
                        $('#vaccination_type').text(data.data[`vaccine_name_${lng}`])
                        $('#age_group_type').text(data.data[`age_group_name_${lng}`])
                        $("#remarks").val(data.data.remarks)
                    }
                }
            });
        })
        $(document).on("click", "#vacci-add-btn", function() {
            $.ajax({
                url: "{{ route('dashboard.myacc.basicinfo.save.vaccine.info') }}",
                type: "POST",
                data: JSON.stringify({
                    vaccine_id: parseInt($(".nso-dropdown-items[data-value='" + $(
                        '#vaccine-select11').val() + "']").attr("data-id")),
                    age_group_id: parseInt($(".nso-dropdown-items[data-value='" + $(
                        '#vaccine-select2').val() + "']").attr("data-id")),
                    vaccination_date: $("#vacci-date").val(),
                    remarks: $("#remarks").val()==""?'-':$("#remarks").val(),
                    vaccination_record_id: parseInt($(this).attr("data-id")),
                    family_member_id: family_member_id
                }),
                dataType: "json",
                contentType: "application/json",
                success: function(data) {
                    if (data.status == "success") {
                        $(".lr-popup-close").click();
                        $(".record-action-btn[data-action='vaccine'][data-id='"+family_member_id+"']").addClass("active")
                        if(data.process=="create") {
                            $("#successfully-saved-message").removeClass("hidden");
                        } else {
                            $("#successfully-updated-message").removeClass("hidden");
                        }
                        compareStatusAutoClose();
                        setTimeout(() => { document.location.reload(); }, 4000);
                    }
                }
            });
        });
        $("body").on("click", "#health-record-add-btn", function() {
            let history_array = [];
            $("input:checkbox[name=select-history]:checked").each(function() {
                history_array.push(parseInt($(this).val()));
            });

            let family_history_array = [];
            $("input:checkbox[name=select-family-history]:checked").each(function() {
                family_history_array.push(parseInt($(this).val()));
            });

            let allergy_array = [];
            $("input:checkbox[name=select-allergy]:checked").each(function() {
                allergy_array.push(parseInt($(this).val()));
            });

            $.ajax({
                url: "{{ route('dashboard.myacc.basicinfo.save.health.record.info') }}",
                type: "POST",
                data: JSON.stringify({
                    blood_type_id: parseInt($(".nso-dropdown-items[data-value='" + $('#blood_type')
                        .val() + "']").attr("data-id")),
                    maritial_status_id: parseInt($(".nso-dropdown-items[data-value='" + $(
                        '#maritial_status').val() + "']").attr("data-id")),
                    weight: $("#weight").val(),
                    height: $("#height").val(),
                    drinking: $(".drinking-option:checked").val(),
                    main_type_of_alcohol_id: $(".select-drink:checked").val(),
                    amount_of_alcohol_drinking_id: $(".select-amount:checked").val(),
                    drinking_age: $("#drinking_age").val(),
                    smoking: $(".smoking-option:checked").val(),
                    smoking_age: $("#smoking_age").val(),
                    no_of_cigarettes_per_day_stick: $("#no_of_cigarettes_smoked_per_day").val(),
                    liver_function: $(".liver-function-option:checked").val(),
                    input_abnormal_liver_function_index: $("#input_abnormal_liver_function_index")
                        .val(),
                    renal_function: $(".renal-function-option:checked").val(),
                    input_abnormal_renal_function_index: $("#input_abnormal_renal_function_index")
                        .val(),
                    personal_medicial_history: $(".personal-medical-history-option:checked").val(),
                    personal_medicial_history_list: history_array,
                    family_medicial_history: $(".family-medical-history-option:checked").val(),
                    family_medicial_history_list: family_history_array,
                    allergic_history: $(".allergic-option:checked").val(),
                    allergic_history_list: allergy_array,
                    family_member_id: family_member_id,
                    health_record_id: parseInt($(this).attr("data-id"))
                }),
                dataType: "json",
                contentType: "application/json",
                success: function(data) {
                    //console.log(data)
                    if (data.status == "success") {
                       $(".lr-popup-close").click();
                       if(data.process=="create") {
                            $("#successfully-saved-message").removeClass("hidden");
                            $(".record-action-btn[data-action='record'][data-id='"+family_member_id+"']").addClass("active")
                       } else {
                            $("#successfully-updated-message").removeClass("hidden");
                       }
                       compareStatusAutoClose();
                       setTimeout(() => { document.location.reload(); }, 4000);
                    }
                }
            });
        });
        $("body").on("click", "#delete-record", function() {
            if (parseInt($(this).attr("data-id")) == 0) {
                return false;
            }
            $.ajax({
                url: "{{ route('dashboard.myacc.basicinfo.save.health.record.info') }}",
                type: "POST",
                data: JSON.stringify({
                    delete_id: parseInt($(this).attr("data-id"))
                }),
                dataType: "json",
                contentType: "application/json",
                success: function(data) {
                    if (data.status == "success") {
                        $(".record-action-btn[data-action='record'][data-id='"+family_member_id+"']").removeClass("active")
                        $("#successfully-deleted-message").removeClass("hidden");
                        compareStatusAutoClose();
                        setTimeout(() => { document.location.reload(); }, 4000);
                    }
                }
            });
        });
        $("body").on("click",'.edit-member-btn',function() {
            $(".delete-member-card-btn").addClass("show")
            $(this).addClass("hidden")
            $(".cancel-edit-btn").addClass("show")
            $(".delete-member-card-btn[data-relationship-type-id='1']").removeClass("show");
            return false;
        });
        $("body").on("click",".verify-phone-btn-content,.resend-code-phone",(function(e) {
            e.preventDefault();
            id = $(this).attr("id")
            let phoneNo = $("#phone_no").text();
            phoneNo = phoneNo.replaceAll(/\s/g,'');
            // console.log(phoneNo);
            // console.log(phoneNo.length);
            if(phoneNo.length==12)
            {
                phno = phoneNo.slice(4);
                phone_code = phoneNo.slice(0, 4);
            } 
            if(phoneNo.length==11){
                phno = phoneNo.slice(3);
                phone_code = phoneNo.slice(0, 3);
            }
            // console.log(phno);
            // console.log(phone_code);
            $.ajax({
                url: app_url+"/api/user/check-phone",
                dataType: "json",
                type: "POST",
                data: {
                    phno: phno,
                    phone_code: phone_code,
                    'g-recaptcha-response':$("#"+id+"Form").find(".g-recaptcha-response").val(),
                    customer_id :customerId
                },
                success: function (resp) {
                    if (resp.success) {
                        resendLinkCurrent(60)
                        $(".ph-verification-code-popup-content").removeClass('hidden').addClass('flex');
                        $('.ph-verification-code-popup-content > div').removeClass("hidden")
                        $("body").addClass("overflow-hidden");
                        return false;
                    }
                },
                error: function (e) {

                },
            });

        }));
        $("body").on("click",".submit-btn", function(e) {
                e.preventDefault();
                $("p.text-mered").addClass("hidden");  // clear error messages
                if($(this).attr("data-id")=="phone") {
                    var otp =
                        $("input#first").val() +
                        $("input#sec").val() +
                        $("input#third").val() +
                        $("input#fourth").val() +
                        $("input#fifth").val() +
                        $("input#sixth").val();
                        let phoneNo = $("#phone_no").text();
                        phoneNo = phoneNo.replaceAll(/\s/g,'');
                        // console.log(phoneNo);
                        // console.log(phoneNo.length);
                        if(phoneNo.length==12)
                        {
                            phno = phoneNo.slice(4);
                            phone_code = phoneNo.slice(0, 4);
                        } 
                        if(phoneNo.length==11){
                            phno = phoneNo.slice(3);
                            phone_code = phoneNo.slice(0, 3);
                        }
                        // console.log(phno);
                        // console.log(phone_code);
                        // if($("#phone_no").text().length==14)
                        // {
                        //     phno = $("#phone_no").text().slice(5);
                        //     phone_code = $("#phone_no").text().slice(0, 5);
                        // }else{
                        //     phno = $("#phone_no").text().slice(3);
                        //     phone_code = $("#phone_no").text().slice(0, 3);
                        // }
                    $.ajax({
                        url: app_url+"/api/user/check-phone-otp",
                        dataType: "json",
                        type: "POST",
                        data: {
                            phno: phno,
                            phone_code: phone_code,
                            otp: otp,
                            verified : true,
                            customer_id :customerId

                        },
                        success: function (resp) {
                            //console.log(resp)
                            if (resp.success) {
                                // $(".ph-verification-code-popup-content").removeClass('flex').addClass('hidden');
                                // $('body').removeClass('overflow-hidden');
                                $(".lr-popup-close").click();
                                $("#successfully-verifiedphoneno-message").removeClass("hidden");
                                compareStatusAutoClose();
                                setTimeout(() => { document.location.reload(); }, 4000);
                            }
                        },
                        error: function (xhr) {

                            $(".ph-verification-code-popup-content p.text-mered").removeClass("hidden");
                            $(".ph-verification-code-popup-content p.text-mered").text(
                                xhr.responseJSON.message
                            );
                            console.log(xhr.responseJSON);
                        },
                    });
                }else{
                    var otp =
                    $("input#email-first").val() +
                    $("input#email-sec").val() +
                    $("input#email-third").val() +
                    $("input#email-fourth").val() +
                    $("input#email-fifth").val() +
                    $("input#email-sixth").val();
                    $.ajax({
                        url: app_url+"/api/user/check-mail-otp",
                        dataType: "json",
                        type: "POST",
                        data: {
                            mail: $("#email_content").text(),
                            otp: otp,
                            verified : true
                        },
                        success: function (resp) {
                            if (resp.success) {
                                // $(".email-verification-code-popup-content").removeClass('flex').addClass('hidden');
                                // $('body').removeClass('overflow-hidden');
                                $(".lr-successful-popup-close").click();
                                $("#successfully-verifiedemail-message").removeClass("hidden");
                                compareStatusAutoClose();
                                setTimeout(() => { document.location.reload(); }, 4000);
                            }
                        },
                        error: function (xhr) {
                            // $(".email-verification-code-popup p.text-mered").removeClass("hidden");
                            // $(".email-verification-code-popup p.text-mered").text(
                            //     xhr.responseJSON.message
                            // );
                            // console.log(xhr.responseJSON);
                        },
                    });
                }

        });

        $(document).on("click",".verify-email-btn-content,resend-code-email",function(e) {
            e.preventDefault();
            id = $(this).attr("id")
            $.ajax({
                url: app_url+"/api/user/check-mail",
                dataType: "json",
                type: "POST",
                data: {
                    email: $("#email_content").text(),
                    'g-recaptcha-response':$("#"+id+"Form").find(".g-recaptcha-response").val()
                },
                success: function (resp) {
                    if (resp.success) {
                        resendLinkCurrent(60)
                        $(".email-verification-code-popup-content").addClass('flex').removeClass('hidden');
                        $('.email-verification-code-popup-content > div').removeClass("hidden")
                        $("body").addClass("overflow-hidden")
                        return false;
                    }
                },
                error: function (e) {

                },
            });
        });

        $("body").on("click",".custom-radio-container",function(){
            $("#member-confirm-btn").attr("disabled",false);
        });

        $("body").on("click",".edit-customer-profile-btn-content",function(){
            $(".decide-later[value=" + $(this).attr("data-id") + "]"). prop('checked', true);
            $("#member-confirm-btn").attr("disabled",false);
            $("#member-confirm-btn").click();
        });

        $("body").on("click", ".edit-member-btn", function () {
            $(".delete-member-card-btn").addClass("show"),
            $(this).addClass("hidden"),
            $(".cancel-edit-btn").addClass("show"),
            $(".edit-customer-profile-btn-content").addClass("hidden");
            return false;
        });
        $("body").on("click", ".cancel-edit-btn", function () {
            $(this).removeClass("show"),
            $(".delete-member-card-btn").removeClass("show"),
            $(".edit-member-btn").removeClass("hidden"),
            $(".edit-customer-profile-btn-content").removeClass("hidden");
            return false;
        });
        $("body").on("click", ".nso-dropdown-lists li", function () {
            $(this).addClass("active"),
                $(this).siblings().removeClass("active"),
                $(this).parent().parent().removeClass("show"),
                $(this)
                    .parent()
                    .parent()
                    .parent()
                    .find('input[type="hidden"]')
                    .attr("value", $(this).data("value"));
            var e = $(this).parent().parent().parent().find(".nso-name-btn");
            if($(this).data("value")=='Mr') {
                //console.log(mr)
                e.children("span").text(mr);
            }else if($(this).data("value")=='Mrs'){
                // console.log(mrs)
                e.children("span").text(mrs);
            }else{
                e.children("span").text($(this).data("value"));
            }
            e.children("img").removeClass("rotate-180");
            return false;
        });

        $("body").on("click",".lr-successful-popup-close",function () {
            $(this).parent().parent().parent().removeClass("flex").addClass("hidden"),
            $("body").removeClass("overflow-hidden");
            clearInterval(downloadTimerContent), resetClock()
            // $(".ph-verification-code-popup-content").removeClass('flex').addClass('hidden');
            // $(".email-verification-code-popup-content").removeClass('flex').addClass('hidden');
            // $('body').removeClass('overflow-hidden');
            return false;
        });
    
        $('.area-item-list').click(function() {
            $('.district').removeClass('active')
            let text = "@lang('labels.check_out_complete.district')";
            $(".selected-text.district").text(text),
            $(".selected-district").val("");
            t = $(".selected-text.area").data("text");
            $(".selected-area").val(""),
            $(".selected-text.area").text(t);
            var t_val = $(this).data("id")
            var districts = <?= json_encode($districtList)?>;
            districts.forEach(function(item) {
                if (item.territory_id != t_val) {
                    $('.district_name' + item.id).addClass('hidden')
                } else {
                    $('.district_name' + item.id).removeClass('hidden')
                }
            });
        });
    </script>

    <script src="{{ asset('frontend/custom/product-compare.js') }}"></script>
@endpush

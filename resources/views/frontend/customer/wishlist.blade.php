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
                        @lang('labels.coupon.wish_list')
                    </h1>
                </div>
            </div>
        </section>
        <section class="user-dashboard-section coupon-list">
            <div class="flex justify-between relative helvetica-normal user-dashboard-layer">
                @include('frontend.customer.leftmenu')
                <div class="udl-right">
                    @include('frontend.customer.wishlist-data-list')
                </div>
            </div>
        </section>
        <div class="reminder-popup bg-darkgray text-light me-body16 font-bold fixed top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 rounded-lg w-fit py-2 px-5 fade-out hidden">
            {{-- Added to cart successfully --}}
            @lang('labels.wishlist.success_message')
        </div>
        @include('frontend.include.product-compare-box')
    </main>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {

            let c_filter = null;
            let tag_filter = null;
            if(lng=='zh-hk'){
                lng='tc';
            }else if(lng=='zh-cn'){
                lng='sc';
            }
            function getUrl(page = null) {

                const urlParams = new URLSearchParams(window.location.search);
                if (!page)
                    page = urlParams.get('page');
                if (tag_filter != null)
                    urlParams.set('mainTag', tag_filter);
                else
                    urlParams.delete('mainTag');
                if (page)
                    urlParams.set('page', page)
                else
                    urlParams.delete('page')
                // let main_url = window.location.href;
                let main_url = window.location.href.split('?')[0];
                main_url += "?" + urlParams.toString();
                window.history.pushState('', '', main_url);
                return main_url;
            }

            function getProducts(url) {
                // $('.udl-right').html("");
                $.ajax({
                    url: url,
                    cache: false,
                }).done(function(data) {
                    // console.log(data)
                    $('.udl-right').html(data);
                    meMedicalMainSlider();
                }).fail(function() {
                    alert('Data could not be loaded.');
                });
            }

            // $("body").on("click", ".available-div .label-item", function() {
            //     $(".product-list-pagination").html("");
            //     if ($(this).attr("data-id") == ".body-check")
            //         c_filter = "Body Check";
            //     else if ($(this).attr("data-id") == ".vaccine")
            //         c_filter = "Vaccine";
            //     else if ($(this).attr("data-id") == ".dna-test")
            //         c_filter = "DNA Test";
            //     else
            //         c_filter = "all";
            //     url = getUrl(1);
            //     getProducts(url);
            // });

            $("body").on("click", ".cdmodal-close", function() {
                $(".collect-detail-modal").removeClass("show")
                $("body").removeAttr("style")
            });

            $("body").on("click", ".wishlist-tabs .list-item", function() {
                $(".product-list-pagination").html("");
                if ($(this).attr("data-id") == "#wish-fav")
                    tag_filter = "favourite";
                else if ($(this).attr("data-id") == "#wish-view")
                    tag_filter = "recently-viewed";
                else
                    tag_filter = "recently-compared";
                url = getUrl(1);
                getProducts(url);
            });

            $("body").on("click", ".product-list-pagination a", function(e) {
                e.preventDefault();
                let page_number = $(this).attr('href').split('page=')[1];
                tag_filter =  new URLSearchParams(window.location.search);
                tag_filter =  tag_filter.get('mainTag');
                let url = getUrl(page_number)
                getProducts(url);
            });

            $("body").on("click", ".wishlist_icon_current", function() {
                let product_id = $(this).attr("data-product-id");
                if (product_id.length == 0) {
                    return false;
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
                        if (data.status == "success") {
                            url = getUrl(1);
                            getProducts(url);

                            $("#totalfavcount").html(data.data.length);
                            if(data.data.length==0){
                                $("#favList").addClass("hidden");
                                $(".favList.empty-section").removeClass("hidden");
                            }else{
                                $("#favList").removeClass("hidden");
                                $(".favList.empty-section").addClass("hidden");
                            }
                            $("#favList").html("");
                            let content = '';
                            data.data.forEach(function(item, key) {
                            // console.log(item)
                            content+=`<li class="pl-[20px] pr-[10px] hover:bg-mee4 flex items-center justify-start message-dropdown-item pt-[10px] pb-[10px] first:pt-0">
                                            <img src="`+item.featured_img+`" alt="fav icon" class="w-[60px] h-[60px]"/>
                                            <div class="ml-[13px] w-full">
                                                <div class="flex justify-between items-baseline">
                                                    <div class="">
                                                        <p class="me-fav-title">`+item[`name_${lng}`]+`</p>
                                                        <p class="me-mes-time">$`+(item.discount_price!=null?item.discount_price:item.original_price)+`</p>
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

                        //console.log(content)
                        $("#favList").html(content);
                        } else {
                            errorMessage();
                        }
                    }
                });
            })

            function errorMessage() {
                //alert("ERROR!!!!!!!!!!")
                // selectedTextarea=$(".redeem-coupon-layer input")[0];
                // selectedTextarea.placeholder="";
                // $(".error-icon").removeClass("hidden");
            }
            $(document).on("click", ".wishlist_icon_current", (function() {
                $(this).children(".heart-full").hasClass("hidden") ?
                    ($(this).children(".heart-full").removeClass("hidden"), $(this).children(
                        ".heart-hole").addClass("hidden")) :
                    ($(this).children(".heart-full").addClass("hidden"), $(this).children(".heart-hole")
                        .removeClass("hidden"))
            }))

            $(document).on("click", ".complus-icon", function() {
                var compare = `${window.translations.comparing}`;
                // $(".modal-content").css("min-width", "528px");
                $(".recently-or-recommended-text-content").html("");
                $(".suggestion-product-list-content").html("");
                let cid = $(this).data("category-id");
                let idList = [];
                idList = $(this).data("id-list");
                // console.log(idList)
                let currentId = $(this).data("id");
                $.ajax({
                    url: "../compare-product/suggestion-product-ajax",
                    type: "POST",
                    data: JSON.stringify({
                        pids: [],
                        selectedCategory: cid
                    }),
                    dataType: "json",
                    contentType: "application/json",
                    success: function(data) {
                    //console.log(data.data.suggestionProducts)
                        $(".recently-or-recommended-text-content").html(data.data
                            .recentlyOrRecommended);
                        let content = "";

                        $.each(data.data.suggestionProducts, function($k, value) {
                            // check selected product include in suggestion list, does not show this product
                            let priceContent = "";
                            if(value.discount_price!=null){
                                priceContent+=`<p class="font-bold text-mered me-body20">$` + value.discount_price +
                                `</p>
                                        <p class="font-bold text-lightgray me-body14 pl-[10px]"><span class="linethrough">$` +
                                value.original_price + `</span></p>`
                            }else{
                                priceContent+=`<p class="font-bold text-mered me-body20">$` + value.original_price +
                                `</p>`;
                            }
                            if (!idList.includes(value.id)) {
                                content += `<div class="relative flex items-center py-5 compare-img-container">
                                            <div class="comp-img mr-[12px]">
                                                <img src="` + (value.icon!=null? value.icon : (value.featured_img!=null?value.featured_img:'frontend/img/quality-healthcare.png')) +
                                    `" alt="image" class="w-[80px] h-[80px] rounded-[12px]">
                                            </div>
                                            <div class="comp-title">
                                                <p class="w-[307px] leading-tight helvetica-normal text-darkgray font-bold me-body18 title">` +
                                    value[`name_${lng}`] + `</p>
                                                <div class="flex items-center">
                                                    `+priceContent+`
                                                </div>
                                            </div>
                                            <div class="comp-btn mx-auto">
                                                <button type="button" class="mx-auto border border-darkgray rounded-full text-darkgray bg-whitez font-bold font-secondary me-body16 hover:border-blueMediq hover:text-whitez w-[40px]
                                                h-[40px] flex justify-center items-center new-compare-btn-content"
                                                data-id="` + value.id +
                                    `" data-parent-id="` + currentId +
                                    `" data-featured_img="` + (value.icon!=null? value.icon : (value.featured_img!=null?value.featured_img:'frontend/img/quality-healthcare.png')) +
                                    `" data-name="` + value[`name_${lng}`] +
                                    `" data-category-id="` + value.category_id +
                                    `" data-category-name-en="` + value.category_name_en +
                                    `" data-original-price="` + value.original_price +
                                    `" data-discount-price="` + value.discount_price +
                                    `" data-slug="` + value.slug_en + `">
                                                <img src="../../../frontend/img/icon1.svg" alt="icon1" class="w-[24px]"></button>
                                                <p class="me-body14 text-blueMediq text-center comparing-text" >`+ compare +`</p>
                                            </div>
                                        </div>`;
                            }
                        });
                        $(".suggestion-product-list-content").html(content);
                    }
                });
            });

            $("body").on("click", ".new-compare-btn-content", function() {
                $(".new-compare-btn-content").prop('disabled', true);
                let id = $(this).data("parent-id");
                if ($(".inner-content1[data-id='" + id + "'] .wimg-container").length == 4) {
                    $("#compare-message3").removeClass("hidden");
                    compareStatusAutoClose();
                    $(".new-compare-btn-content").prop('disabled', false);
                    disableBtn(id);
                    return false;
                }


                $(this).parent().parent().addClass("selected");
                let priceContent = "";
                if($(this).data('discount-price')!=null){
                    priceContent+=`<p class="font-bold text-mered me-body20">$` + $(this).data(
                    'discount-price') + `</p>
                                            <p class="font-bold text-lightgray me-body14 pl-[10px]"><span
                                                    class="linethrough">` + $(this).data('original-price') + `</span></p>`;
                }else{
                    priceContent+=`<p class="font-bold text-mered me-body20">$` +$(this).data('original-price') +
                    `</p>`;
                }
                let content = `<div component-name="me-dashboard-wishlist-compare-card"
                                    class="relative flex items-center compare-img-container wimg-container">
                                    <div class="mr-[12px]">
                                        <img src="` + $(this).data('featured_img') + `" alt="image" class="w-[80px] h-[80px] rounded-[12px]">
                                    </div>
                                    <div>
                                        <a href="../../../product/`+$(this).data('category-name-en')+`/`+$(this).data('slug')+`">
                                        <p
                                            class="w-[307px] leading-tight helvetica-normal text-darkgray font-bold me-body18 title hover:underline">
                                            ` + $(this).data('name') + `</p>
                                        </a>
                                        <div class="flex items-center">
                                         `+priceContent+`
                                        </div>
                                    </div>
                                    <div class="absolute top-0 right-0">
                                        <button type="button" data-id=` + $(this).data('id') + ` data-parent-id=` + id + `
                                            class="mx-auto text-darkgray bg-whitez font-bold font-secondary me-body16 w-[24px] h-[24px] flex justify-center items-center wishlist-delete-btn">x</button>
                                    </div>
                                </div>`;
                $(".inner-content1[data-id='" + id + "'] > button").before(content);

                if ($(".inner-content1[data-id='" + id + "'] .wimg-container").length == 4) {
                    $(".complus-btn[data-id='" + id + "']").addClass("hidden");
                }

                $(".new-compare-btn-content").prop('disabled', false);
                $(this).prop('disabled', true);
                disableBtn(id);
                idList = [];
                idList = $(".complus-icon[data-id='"+id+"']").data("id-list");
                idList.push(parseInt($(this).data('id')));
            });

            function disableBtn(id) {
                $(".inner-content1[data-id='" + id + "'] .wimg-container button").each(function() {
                    let dataid = $(this).data("id");
                    $(".new-compare-btn-content").each(function() {
                        if ($(this).data("id") == dataid) {
                            $(this).prop('disabled', true);
                        }
                    })
                });
            }

            $("body").on("click", ".wishlist-delete-btn", function() {
                let id = $(this).data("parent-id");
                $(".complus-btn[data-id='" + id + "']").removeClass("hidden");
                idList = [];
                idList = $(".complus-icon[data-id='"+id+"']").data("id-list");
                const index = idList.indexOf($(this).data("id"));
                idList.splice(index, 1);
            })

            $("body").on("click", ".btn-compare-inner", function() {
                let id = $(this).data("id");
                let idList = [];
                $(".inner-content1[data-id='" + id + "'] .wimg-container button").each(function() {
                    idList.push($(this).data("id"));
                });

                let p1 = "",
                    p2 = "",
                    p3 = "",
                    p4 = "";
                if (idList[0] !== undefined) {
                    p1 = idList[0];
                }
                if (idList[1] !== undefined) {
                    p2 = idList[1];
                }
                if (idList[2] !== undefined) {
                    p3 = idList[2];
                }
                if (idList[3] !== undefined) {
                    p4 = idList[3];
                }

                window.location = "../compare-product/?p1=" + p1 + "&p2=" + p2 + "&p3=" + p3 + "&p4=" + p4 +
                    "&compare_page_redirect&compare_page_id="+id;

            })
            $("body").on("click", ".compare-remove-btn", function() {
                let id = $(this).data("id");
                $.ajax({
                    url: "{{ route('dashboard.wishlist.remove.recently.compared') }}",
                    type: "POST",
                    data: JSON.stringify({
                        id: id,
                    }),
                    dataType: "json",
                    contentType: "application/json",
                    success: function(data) {
                        if (data.status == "success") {
                            url = getUrl(1);
                            getProducts(url);
                        } else {
                            errorMessage();
                        }
                    }
                });
            });

            meMedicalMainSlider();

            function meMedicalMainSlider() {
            var e = $(".me-medical-main");
            e.slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: !1,
                arrows: !0,
                variableWidth: !0,
                variableHeight: !0,
                // prevArrow: '<button type="button" class="m2m-prev-arrow"><svg width="12" height="21" viewBox="0 0 12 21" fill="none" xmlns="http://www.w3.org/2000/svg" class="rotate-180"><path d="M1.28346 0.577913C0.904551 0.753695 0.732676 1.1951 0.892832 1.58963C0.935801 1.6951 2.16627 2.9451 5.35377 6.11698L9.76002 10.5037L5.35377 14.8865C2.16236 18.0662 0.935801 19.3123 0.892832 19.4178C0.861582 19.4998 0.834238 19.6365 0.834238 19.7224C0.834238 20.2849 1.40455 20.6639 1.90846 20.4295C2.13111 20.324 11.4436 11.0545 11.5413 10.8357C11.635 10.6365 11.635 10.3709 11.5413 10.1717C11.4436 9.95291 2.13111 0.683382 1.90846 0.577913C1.70924 0.484163 1.48268 0.484163 1.28346 0.577913Z" fill="#333333"/></svg></button>',
                // nextArrow: '<button class="m2m-next-arrow"><svg width="12" height="21" viewBox="0 0 12 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.28346 0.577913C0.904551 0.753695 0.732676 1.1951 0.892832 1.58963C0.935801 1.6951 2.16627 2.9451 5.35377 6.11698L9.76002 10.5037L5.35377 14.8865C2.16236 18.0662 0.935801 19.3123 0.892832 19.4178C0.861582 19.4998 0.834238 19.6365 0.834238 19.7224C0.834238 20.2849 1.40455 20.6639 1.90846 20.4295C2.13111 20.324 11.4436 11.0545 11.5413 10.8357C11.635 10.6365 11.635 10.3709 11.5413 10.1717C11.4436 9.95291 2.13111 0.683382 1.90846 0.577913C1.70924 0.484163 1.48268 0.484163 1.28346 0.577913Z" fill="#333333"/></svg></button>'
            }), e.on("afterChange", (function(e, t, i) {
                $(".me-medical-sub > img").removeClass("active_img"), $('.me-medical-sub > img[data-id="' + i + '"]').addClass("active_img")
            }))
}
        });
    </script>
    <script src="{{ asset('frontend/custom/product-compare.js') }}"></script>
@endpush

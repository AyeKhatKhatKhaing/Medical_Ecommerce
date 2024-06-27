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
                        @lang('labels.coupon.coupon')
                    </h1>
                </div>
            </div>
        </section>
        <section class="user-dashboard-section coupon-list">
            <div class="flex justify-between relative helvetica-normal user-dashboard-layer">
                @include('frontend.customer.leftmenu')
                <div class="udl-right">
                    @include('frontend.customer.coupon-data-list')
                </div>
            </div>
        </section>
        @include('frontend.include.product-compare-box')
    </main>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            // $(".modal-content").css("min-width", "528px");

            let c_filter = null;
            let tag_filter = null;

            function getUrl(page = null) {

                const urlParams = new URLSearchParams(window.location.search);
                if (!page)
                    page = urlParams.get('page');
                if (c_filter != null)
                    urlParams.set('selectedCategory', c_filter);
                else
                    urlParams.delete('selectedCategory');
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

            function getCoupons(url) {
                // $('.udl-right').html("");
                $.ajax({
                    url: url,
                    cache: false,
                }).done(function(data) {
                    $('.udl-right').html(data);
                }).fail(function() {
                    alert('Data could not be loaded.');
                });
            }

            $("body").on("click", ".available-div .label-item", function() {
                $(".product-list-pagination").html("");
                if ($(this).attr("data-id") == ".body-check")
                    c_filter = "Body Check";
                else if ($(this).attr("data-id") == ".vaccine")
                    c_filter = "Vaccine";
                else if ($(this).attr("data-id") == ".dna-test")
                    c_filter = "DNA Test";
                else
                    c_filter = "all";
                url = getUrl(1);
                getCoupons(url);
            });

            $("body").on("click", ".cdmodal-close", function() {
                $(".collect-detail-modal").removeClass("show")
                $("body").removeAttr("style")
            });

            $("body").on("click", ".wishlist-tabs .list-item", function() {
                $(".product-list-pagination").html("");
                if ($(this).attr("data-id") == "#dash-available")
                    tag_filter = "available";
                else
                    tag_filter = "hide";
                url = getUrl(1);
                getCoupons(url);
            });

            $("body").on("click", ".product-list-pagination a", function(e) {
                e.preventDefault();
                let page_number = $(this).attr('href').split('page=')[1];
                let url = getUrl(page_number)
                getCoupons(url);
            });

            $("body").on("click", "#btn_redeem", function() {
                let redeemCode = $("#txt_redeem").val();
                if(redeemCode.length == 0) {
                    return false;
                }
                $.ajax({
                    url: "{{route('dashboard.coupon.redeem')}}",
                    type: "POST",
                    data: JSON.stringify({
                        redeemCode: redeemCode,
                    }),
                    dataType: "json",
                    contentType: "application/json",
                    success: function (data) {
                        if(data.status=="success") {
                            url = getUrl(1);
                            getCoupons(url);
                        }else{
                            errorMessage(data.message);
                        }
                    }
                });
            })

            function errorMessage(message) {
                selectedTextarea=$(".redeem-coupon-layer input")[0];
                selectedTextarea.placeholder="";
                $(".error-icon p").text(message);
                $(".error-icon").removeClass("hidden");
            }


            $("body").on("click",".related-products",function() {
                // $(".modal-content").css("min-width", "528px");
                $($(this).data("related")).removeClass("hidden");
            });

            $("body").on("click",".detail-btn",function(){
                    var e = $(this).data("id");
                    $(e).addClass("show")
                    //$(".qua-collect-btn").click();
                    document.body.style.overflowY = "hidden";
                    return false;
            });

            $(".qua-collect-btn-content").on("click",function(){
                $(".collect-detail-modal").removeClass("show");
            })
        });
    </script>
    <script src="{{ asset('frontend/custom/product-compare.js') }}"></script>
@endpush

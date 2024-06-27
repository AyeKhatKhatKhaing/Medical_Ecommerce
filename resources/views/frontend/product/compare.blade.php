@extends('frontend.layouts.master')
@include('frontend.seo', ['seo' => isset($seo) ? $seo : ''])
@section('content')
    <div class="product-compare-content-list">
        @include('frontend.product.compare-list')
    </div>
    <div id="add-compare-modal1"
        class="modal flex hidden items-center justify-center fixed z-[1001]
        left-0 top-0 w-full h-full bg-black/[.75] overflow-hidden main-add-compare-container">
        <!-- Modal content -->
        <div class="modal-content w-full max-w-[80%] lg:max-w-[578px] shadow-shadow02 my-[15%] mx-auto">
            <div class="relative rounded-[12px] bg-white">
                <div class="flex ml-auto mr-6 w-5 h-5 absolute right-0 top-4">
                    <span data-id="add-compare-modal1"
                        class="pb-[4px] absolute left-1/2 top-1/2 -translate-y-1/2 -translate-x-1/2 close-add-compare-modal  flex items-center justify-center text-[32px] w-full cursor-pointer text-[#1A1818] focus:no-underline">×</span>
                </div>
                <div class="modal-content-plan">
                    <div class="preview-bgradient p-10 rounded-t-[12px]">
                        <h2 class="font-secondary font-bold text-darkgray me-body23">@lang('labels.wishlist.add_to_compare')</h2>
                    </div>

                    <div class="bg-white p-10 pt-5 pr-[24px] rounded-b-[12px]">
                        <p class="helvetica-normal text-darkgray me-body16 recently-or-recommended-text"></p>
                        <div class="flex flex-col compare-box-container suggestion-product-list">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include("frontend.include.product-compare-box")
    <style>
        .deleteBtn {
            right: 5px;
            top: 15px;
        }
    </style>
@endsection
@push('scripts')
    <script type="text/javascript">

        // function remove() {
        //     $.ajax({
        //         url: 'remove/comparepage/session',
        //         type: "GET",
        //         dataType: "json",
        //         contentType: "application/json",
        //         success: function(data) {}
        //     });
        // }
        // window.addEventListener("beforeunload", function(event) {
        //     remove();
        //     // event.returnValue = "csss..";
        // });

        let selectedCategory = {{ $selectedCategory->id }};
        let suggestionRouteUrl = "{{ route('suggestion.product.ajax') }}";
        let subCategories = {{ json_encode($subCategories) }};
        let replyTitle = "{{ isset($replyTitle)?$replyTitle:'' }}";
        let productIdList = {{ json_encode($productIdList) }};
    </script>
    <script src="{{ asset('frontend/custom/product-compare-page.js') }}"></script>
@endpush

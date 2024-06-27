<div id="compare-modal"
    class="w-full bg-orangeLight rounded-tl-[200px] pl-[100px] lg:pl-[80px] xl:pl-[100px] 5xl:pl-[180px] 7xl:pl-[280px] pr-[45px] p-5 fixed left-0 -bottom-12 z-[5] hidden compare-modal">
    <div class="flex justify-between items-center compare-two-col">
        <div class="flex gap-[24px] xl:gap-[35px] w-full max-w-[90%] xl:max-w-[65%] selected-items"
            data-id={{ $product->id }}>
            <div data-id="add-compare-modal" data-parent-modal-id="compare-modal"
                data-category-id="{{ $product->category_id }}" data-product-id="{{ $product->id }}"
                class="bg-[#0000001a] w-20 h-20 rounded-[10px] flex items-center justify-center me-plus-icon cursor-pointer">
                <img src="{{ asset('frontend/img/me-plus.svg') }}" alt="plus">
            </div>
        </div>

        <div class="w-fit flex justify-between xl:gap-[50px] compare-textbox">
            <div class="compare-text-section text-center">
                <button type="button" data-id="{{ $product->id }}"
                    class="1 btn-compare border border-darkgray py-[10px] px-5 rounded-full text-darkgray bg-whitez font-bold font-secondary me-body16 hover:border-blueMediq hover:bg-blueMediq hover:text-whitez">@lang('labels.footer.compare')</button>
                <p class="pt-1 font-bold font-secondary me-body15 text-darkgray">@lang('labels.footer.compare_products')</p>
            </div>

            <p data-id="compare-modal" class="text-darkgray text-24 close-compare cursor-pointer"><img
                    src="{{ asset('frontend/img/white-close.svg') }}" alt="close image" class="invert" /></p>
        </div>
    </div>
</div>

<div id="add-compare-modal"
    class="modal flex items-center justify-center fixed z-[1001] left-0 top-0 w-full h-full bg-black/[.75] overflow-hidden hidden">
    <!-- Modal content -->
    <div class="modal-content max-w-[80%] lg:max-w-[578px] shadow-shadow02 my-[15%] mx-auto">
        <div class="relative rounded-[12px] bg-white">
            <div class="flex ml-auto mr-6 w-5 h-5 absolute right-0 top-4">
                <span data-id="add-compare-modal"
                    class="pb-[4px] absolute left-1/2 top-1/2 -translate-y-1/2 -translate-x-1/2 close-add-compare-modal  flex items-center justify-center text-[32px] w-full cursor-pointer text-[#1A1818] focus:no-underline">×</span>
            </div>
            <div class="modal-content-plan">
                <div class="preview-bgradient p-10 rounded-t-[12px]">
                    <h2 class="font-secondary font-bold text-darkgray me-body23">@lang('labels.compare.add_compare')</h2>
                </div>

                <div class="bg-white p-10 pt-5 pr-[24px] rounded-b-[12px]">
                    <p class="helvetica-normal text-darkgray me-body16 recently-or-recommended-text">@lang('labels.product.recent_view')</p>
                    <div class="flex flex-col compare-box-container suggestion-product-list">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

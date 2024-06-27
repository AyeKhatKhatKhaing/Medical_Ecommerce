@php
    $home = App\Models\Home::first();
    $cookies_text = langbind($home, 'cookies_text');
@endphp
<div id="compare-modal"
    class="w-full bg-orangeLight rounded-tl-[200px] pl-[100px] lg:pl-[80px] xl:pl-[100px] 5xl:pl-[180px] 7xl:pl-[280px] pr-[45px] p-5 fixed left-0 -bottom-12 z-[5] hidden compare-modal">
    <div class="flex justify-between items-center compare-two-col">
        <div class="flex gap-[24px] xl:gap-[35px] w-full max-w-[90%] xl:max-w-[65%] selected-items">
            @if (Session::has('compareProductItems'))
                @foreach (Session::get('compareProductItems') as $id)
                    @php  $product = \App\Models\Product::find($id); @endphp
                    <div id="selected-item" class="selected-items-data flex items-start selected-items-box relative w-1/4"
                        data-item-id="{{ $product->id }}" data-item-cid="{{ $product->category_id }}">
                        <div class="flex items-center selected-items-box--top pr-[24px]">
                            <p class="selected-items-box--top--img">
                                {{-- <img src="{{ $product->featured_img }}"
                                    alt="" class="w-[80px] h-[80px] rounded-[12px]"> --}}
                                    @if(isset($product->merchant))
                                    <img src="{{ isset($product->merchant->icon) ? $product->merchant->icon : asset('frontend/img/quality-healthcare.png') }}"
                                        alt="quality healthcare" class="w-[80px] h-[80px] rounded-[12px]">
                                    @else
                                    <img src="{{ isset($product->featured_img) ? $product->featured_img : asset('frontend/img/quality-healthcare.png') }}"
                                         alt="quality healthcare" class="w-[80px] h-[80px] rounded-[12px]">
                                    @endif
                            </p>
                            <p class="font-secondary font-medium me-body16 pl-[10px] selected-items-box--top--title">
                                {{ langbind($product, 'name') }}</p>
                        </div>
                        <button
                            class="w-6 h-6 rounded-full bg-meA3 text-white flex items-center justify-center selected-items-box-delete compare-modal- absolute top-0 right-0">
                            <img src="{{ asset('frontend/img/white-close.svg') }}" alt="close image"
                                class="w-[10px] compare-modal-" /></button>
                    </div>
                @endforeach
            @endif
            <div data-id="add-compare-modal" data-parent-modal-id="compare-modal"
                class="bg-[#0000001a] w-20 h-20 rounded-[10px] flex items-center justify-center me-plus-icon cursor-pointer
                {{session()->has('compareProductItems') && count(session()->get('compareProductItems'))==4 ? 'hidden':''}}">
                <img src="{{ asset('frontend/img/me-plus.svg') }}" alt="plus">
            </div>
        </div>

        <div class="w-fit flex justify-between xl:gap-[50px] compare-textbox">
            <div class="compare-text-section text-center">
                <button type="button"
                    class="111 btn-compare border border-darkgray py-[10px] px-5 rounded-full text-darkgray bg-whitez font-bold font-secondary me-body16 hover:border-blueMediq hover:bg-blueMediq hover:text-whitez">@lang('labels.footer.compare')</button>
                <p class="pt-1 font-bold font-secondary me-body15 text-darkgray">@lang('labels.footer.compare_products')</p>
            </div>

            <p data-id="compare-modal" class="text-darkgray text-24 close-compare cursor-pointer"><img
                    src="{{ asset('frontend/img/white-close.svg') }}" alt="close image" class="invert" /></p>
        </div>
    </div>
</div>

<div id="add-compare-modal"
    class="modal flex items-center justify-center fixed z-[1001] left-0 top-0 w-full h-full bg-black/[.75] overflow-hidden hidden main-add-compare-container">
    <!-- Modal content -->
    <div class="modal-content w-full max-w-[80%] lg:max-w-[578px] shadow-shadow02 my-[15%] mx-auto">
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

<dialog id="compare-message2" component-name="me-compare-status-popup"
    class="csp-container hidden flex items-center justify-center fixed z-[1001] left-0 top-0 w-full h-full bg-transparent overflow-hidden">
    <div class="bg-darkgray rounded-[4px] p-4">
        <p class="me-body16 helvetica-normal text-white">
            {{-- You can only compare same category --}}
            @lang('labels.compare.same_category')
        </p>  
    </div>
</dialog>
<dialog id="compare-message3" component-name="me-compare-status-popup"
    class="csp-container hidden flex items-center justify-center fixed z-[1001] left-0 top-0 w-full h-full bg-transparent overflow-hidden">
    <div class="bg-darkgray rounded-[4px] p-4">
        <p class="me-body16 helvetica-normal text-white">
            {{-- You can compare up to 4 items --}}
            @lang('labels.compare.up_to_4')
        </p>
    </div>
</dialog>
<dialog id="compare-message4" component-name="me-compare-status-popup"
    class="csp-container hidden flex items-center justify-center fixed z-[1001] left-0 top-0 w-full h-full bg-transparent overflow-hidden">
    <div class="bg-darkgray rounded-[4px] p-4">
        <p class="me-body16 helvetica-normal text-white">You can't compare products now</p>
    </div>
</dialog>
@if (Route::currentRouteName() == 'mediq')
    @php
    $closedCookie = \Illuminate\Support\Facades\Cookie::get('footer_closed');
    @endphp
    @if($closedCookie != 'footer_closed')
    <div id="cookie-popup"
        class="bg-[#33333399] w-full py-[10px] me-footer-container flex justify-between items-start fixed bottom-0">
        {!! $cookies_text !!}
        <span data-cookie="footer-cookie" class="text-whitez cursor-pointer cookie-closed" id="cookie-close">&times;</span>
    </div>
    @endif
@endif

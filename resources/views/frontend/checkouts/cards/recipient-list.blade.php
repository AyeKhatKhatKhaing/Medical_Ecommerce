@if(count($recipients) > 0)
@foreach($recipients as $recipient)
@php
$product_merchant = $recipient->product->product_location_data;
$isunavailable = false;
if($recipient->product->category_id == 2 && $recipient->product->number_of_dose == 0){
    $isunavailable = true;
}
if($recipient->variable_id != null){
    $exist_product_price = isset($recipient->variable_product->promotion_price) ? $recipient->variable_product->promotion_price : (isset($recipient->variable_product->discount_price) ?
    $recipient->variable_product->discount_price : '');
    $productPrice = $recipient->variable_product->original_price;
}else{
    $exist_product_price = isset($recipient->product->promotion_price) ? $recipient->product->promotion_price : (isset($recipient->product->discount_price) ?
    $recipient->product->discount_price : '');
    $productPrice = $recipient->product->original_price;
}
@endphp
@if($isunavailable == false && $recipient->date == null || $recipient->date > date('Y-m-d'))
<input type="hidden" class="hidden location-json-data location-json-data-receipientData{{$recipient->id}}"
    value="{{ json_encode($product_merchant)}}">
<div>
    <div class="flex items-center justify-between ">
        <div class="flex items-center">
            <img src="{{asset($recipient->product->merchant->icon)}}" alt="logo"
                class="rounded-full max-w-[40x] max-h-[40px] object-cover mr-3 checkout_product_image_small" />
            <p class="font-normal me-body-20 text-darkgray">{{langbind($recipient->product->merchant,'name') ?? ''}}</p>
        </div>
        <div>
            <form action="" id="removeRecipient{{$recipient->id}}">
                <input type="hidden" name="recipientId" value="{{$recipient->id}}">
                <input type="hidden" name="productId" value="{{$recipient->product->id}}">
                <p data-id="{{$recipient->id}}" onclick="removeRecipient({{$recipient->id}})"
                    class="underline me-body-16 text-darkgray remove-btn remove-btn{{$recipient->id}} cursor-pointer">@lang('labels.wishlist.remove')
                </p>
            </form>
        </div>
    </div>
    <div class="hidden">
        <div class="flex justify-between">
            <p class="font-bold me-body-26 text-darkgray">Expired</p>
            <p data-id="1" class="underline me-body-16 text-darkgray remove-btn cursor-pointer">@lang('labels.wishlist.remove')
            </p>
        </div>
    </div>
    <div class="hidden">
        <div class="flex justify-between">
            <p class="font-bold me-body-26 text-darkgray mr-2">Unavailable</p>
            <div class="flex flex-wrap">
                <p class="italic me-body-16 font-normal text-mered mr-8">Your selected product is no longer available</p>
                <p data-id="5" class="underline me-body-16 text-darkgray remove-btn cursor-pointer">@lang('labels.wishlist.remove')</p>
            </div>
        </div>
    </div>
</div>


<div component-name="me-checkout-merchant-content-card"
    class="relative me-checkout-merchant-content-card-{{$recipient->id}} me-checkout-merchant-content-card lg:px-10 sm:px-5 px-4 py-5 rounded-[12px] bg-whitez me-checkout-merchant-content-card-boxshadow mt-5 mb-[48px] mb-10">
    <div class="me-checkout-merchant-content-card-container">

        <div class="flex sm:flex-row flex-col available-card">
            <div class="w-[80px] h-[80px] 7xl:w-[100px] 7xl:h-[100px] rounded-[50%] mr-5 border border-mee4 checkout-card-logo-img">
                <img src="{{$recipient->product->merchant->icon}}" alt="logo"
                    class="mr-5 w-full h-full object-cover rounded-[50%]" />
            </div>
            <div class="checkout-card-text-section">
                <div class="checkout-card-pdiv">
                    <a href="{{ route('product-detail',['category' => isset($recipient->product->category) ? str_replace(' ','-',$recipient->product->category->name_en) : '', 'slug' => isset($recipient->product->slug_en) ? $recipient->product->slug_en : '']) }}">
                        <p class="font-bold me-body-26 text-darkgray">{{langbind($recipient->product,'name')}}</p>
                    </a>
                    <div class="flex justify-between mt-1">

                        <p class="font-normal me-body-18 text-darkgray">
                            @if(isset($recipient->variable_id))
                            {{$recipient->variable_product->number_of_dose}}
                            {{$recipient->variable_product->number_of_dose == 1 ? __('labels.product_detail.item') : __('labels.product_detail.items')}}
                            @else
                            {{$recipient->product->number_of_dose}}
                            {{$recipient->product->number_of_dose == 1 ? __('labels.product_detail.item') : __('labels.product_detail.items')}}
                            @endif
                        </p>
                        <div class="flex items-center">
                            @if($exist_product_price != null)
                            <p class="font-normal me-body-14 text-lightgray line-through mr-2 item-data-orginal-price item-data-orginal-price-{{$recipient->id}}">{{isset($productPrice) ? '$'.number_format($productPrice) : ''}}</p>
                            @endif
                            <p data-price="{{$recipient->each_recipient_amount}}" data-orginalprice="{{$productPrice}}"
                                class="item-data-price item-data-price-{{$recipient->id}} font-bold me-body-18 text-darkgray">
                                ${{number_format($recipient->each_recipient_amount)}}</p>
                        </div>
                        <input type="hidden" data-price="{{$recipient->each_recipient_amount}}" value="{{$recipient->each_recipient_amount}}" data-orginalprice="{{$productPrice}}"
                            class="item-data-price item-data-price-{{$recipient->id}} font-bold me-body-18 text-darkgray">

                    </div>
                </div>
                <div component-name="me-checkout-merchant-recipient-data" class="">
                    <div class="me-checkout-merchant-content-card-container">

                        <div class="mt-7 data-card-items data-card-items-receipientData{{$recipient->id}}"
                            data-id="receipientData{{$recipient->id}}" data-parentid="{{$recipient->id}}">
                            <p class="hidden font-bold me-body-20 text-white px-5 py-[10px] bg-blueMediq">
                            </p>
                            <div class="mt-4">
                                <div component-name="me-checkout-merchant-recipient-preferredTime-detail" class="mt-1">

                                    <div class="flex">
                                        <div
                                            class="flex preferredTime-placeholderreceipientData{{$recipient->id}} w-full">
                                            <div class="mr-2 max-w-[24px] w-[24px]">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21"
                                                    viewBox="0 0 20 21" fill="none">
                                                    <path
                                                        d="M14.1667 12.1667C14.3877 12.1667 14.5996 12.0789 14.7559 11.9226C14.9122 11.7663 15 11.5543 15 11.3333C15 11.1123 14.9122 10.9004 14.7559 10.7441C14.5996 10.5878 14.3877 10.5 14.1667 10.5C13.9457 10.5 13.7337 10.5878 13.5774 10.7441C13.4211 10.9004 13.3333 11.1123 13.3333 11.3333C13.3333 11.5543 13.4211 11.7663 13.5774 11.9226C13.7337 12.0789 13.9457 12.1667 14.1667 12.1667ZM14.1667 15.5C14.3877 15.5 14.5996 15.4122 14.7559 15.2559C14.9122 15.0996 15 14.8877 15 14.6667C15 14.4457 14.9122 14.2337 14.7559 14.0774C14.5996 13.9211 14.3877 13.8333 14.1667 13.8333C13.9457 13.8333 13.7337 13.9211 13.5774 14.0774C13.4211 14.2337 13.3333 14.4457 13.3333 14.6667C13.3333 14.8877 13.4211 15.0996 13.5774 15.2559C13.7337 15.4122 13.9457 15.5 14.1667 15.5ZM10.8333 11.3333C10.8333 11.5543 10.7455 11.7663 10.5893 11.9226C10.433 12.0789 10.221 12.1667 10 12.1667C9.77899 12.1667 9.56702 12.0789 9.41074 11.9226C9.25446 11.7663 9.16667 11.5543 9.16667 11.3333C9.16667 11.1123 9.25446 10.9004 9.41074 10.7441C9.56702 10.5878 9.77899 10.5 10 10.5C10.221 10.5 10.433 10.5878 10.5893 10.7441C10.7455 10.9004 10.8333 11.1123 10.8333 11.3333ZM10.8333 14.6667C10.8333 14.8877 10.7455 15.0996 10.5893 15.2559C10.433 15.4122 10.221 15.5 10 15.5C9.77899 15.5 9.56702 15.4122 9.41074 15.2559C9.25446 15.0996 9.16667 14.8877 9.16667 14.6667C9.16667 14.4457 9.25446 14.2337 9.41074 14.0774C9.56702 13.9211 9.77899 13.8333 10 13.8333C10.221 13.8333 10.433 13.9211 10.5893 14.0774C10.7455 14.2337 10.8333 14.4457 10.8333 14.6667ZM5.83333 12.1667C6.05435 12.1667 6.26631 12.0789 6.42259 11.9226C6.57887 11.7663 6.66667 11.5543 6.66667 11.3333C6.66667 11.1123 6.57887 10.9004 6.42259 10.7441C6.26631 10.5878 6.05435 10.5 5.83333 10.5C5.61232 10.5 5.40036 10.5878 5.24408 10.7441C5.0878 10.9004 5 11.1123 5 11.3333C5 11.5543 5.0878 11.7663 5.24408 11.9226C5.40036 12.0789 5.61232 12.1667 5.83333 12.1667ZM5.83333 15.5C6.05435 15.5 6.26631 15.4122 6.42259 15.2559C6.57887 15.0996 6.66667 14.8877 6.66667 14.6667C6.66667 14.4457 6.57887 14.2337 6.42259 14.0774C6.26631 13.9211 6.05435 13.8333 5.83333 13.8333C5.61232 13.8333 5.40036 13.9211 5.24408 14.0774C5.0878 14.2337 5 14.4457 5 14.6667C5 14.8877 5.0878 15.0996 5.24408 15.2559C5.40036 15.4122 5.61232 15.5 5.83333 15.5Z"
                                                        fill="#333333" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M5.83268 1.95801C5.99844 1.95801 6.15741 2.02386 6.27462 2.14107C6.39183 2.25828 6.45768 2.41725 6.45768 2.58301V3.21884C7.00935 3.20801 7.61685 3.20801 8.28518 3.20801H11.7127C12.3818 3.20801 12.9893 3.20801 13.541 3.21884V2.58301C13.541 2.41725 13.6069 2.25828 13.7241 2.14107C13.8413 2.02386 14.0003 1.95801 14.166 1.95801C14.3318 1.95801 14.4907 2.02386 14.608 2.14107C14.7252 2.25828 14.791 2.41725 14.791 2.58301V3.27217C15.0077 3.28884 15.2127 3.30967 15.4068 3.33551C16.3835 3.46717 17.1743 3.74384 17.7985 4.36717C18.4218 4.99134 18.6985 5.78217 18.8302 6.75884C18.9577 7.70884 18.9577 8.92134 18.9577 10.453V12.213C18.9577 13.7447 18.9577 14.958 18.8302 15.9072C18.6985 16.8838 18.4218 17.6747 17.7985 18.2988C17.1743 18.9222 16.3835 19.1988 15.4068 19.3305C14.4568 19.458 13.2443 19.458 11.7127 19.458H8.28601C6.75435 19.458 5.54102 19.458 4.59185 19.3305C3.61518 19.1988 2.82435 18.9222 2.20018 18.2988C1.57685 17.6747 1.30018 16.8838 1.16852 15.9072C1.04102 14.9572 1.04102 13.7447 1.04102 12.213V10.453C1.04102 8.92134 1.04102 7.70801 1.16852 6.75884C1.30018 5.78217 1.57685 4.99134 2.20018 4.36717C2.82435 3.74384 3.61518 3.46717 4.59185 3.33551C4.78602 3.30967 4.99185 3.28884 5.20768 3.27217V2.58301C5.20768 2.41725 5.27353 2.25828 5.39074 2.14107C5.50795 2.02386 5.66692 1.95801 5.83268 1.95801ZM4.75768 4.57467C3.92018 4.68717 3.43685 4.89884 3.08435 5.25134C2.73185 5.60384 2.52018 6.08717 2.40768 6.92551C2.38852 7.06717 2.37268 7.21717 2.35935 7.37467H17.6393C17.626 7.21634 17.6102 7.06717 17.591 6.92467C17.4785 6.08717 17.2668 5.60384 16.9143 5.25134C16.5618 4.89884 16.0785 4.68717 15.2402 4.57467C14.3843 4.45967 13.2552 4.45801 11.666 4.45801H8.33268C6.74351 4.45801 5.61518 4.45967 4.75768 4.57467ZM2.29102 10.4997C2.29102 9.78801 2.29102 9.16884 2.30185 8.62467H17.6968C17.7077 9.16884 17.7077 9.78801 17.7077 10.4997V12.1663C17.7077 13.7555 17.706 14.8847 17.591 15.7413C17.4785 16.5788 17.2668 17.0622 16.9143 17.4147C16.5618 17.7672 16.0785 17.9788 15.2402 18.0913C14.3843 18.2063 13.2552 18.208 11.666 18.208H8.33268C6.74351 18.208 5.61518 18.2063 4.75768 18.0913C3.92018 17.9788 3.43685 17.7672 3.08435 17.4147C2.73185 17.0622 2.52018 16.5788 2.40768 15.7405C2.29268 14.8847 2.29102 13.7555 2.29102 12.1663V10.4997Z"
                                                        fill="#333333" />
                                                </svg>
                                            </div>
                                            <div class="flex justify-between w-full">
                                                <p data-id="receipientData{{$recipient->id}}"
                                                    class="flex custom-remark-title cursor-pointer font-normal me-body-18 text-darkgray underline"
                                                    data-recipient_area_id="{{$recipient->location}}" data-label="{{__('labels.check_out.loction_and_time_decide_later')}}" data-orglabel="{{__('labels.product_detail.select_time')}}">
                                                    {{$recipient->is_prefer_time_decide_later == true ? __('labels.product_detail.decide_later') :__('labels.product_detail.select_time')}}
                                                </p>
                                                <div data-id="receipientData{{$recipient->id}}" data-recipient_area_id="receipientData{{$recipient->id}}" class="edit-btn @@hideEdit">
                                                    <p class="cursor-pointer flex font-normal me-body-16 text-darkgray hover:text-orangeMediq">@lang('labels.check_out.edit')</p></p>
                                                </div>
                                            </div>
                                            <p data-text="@lang('labels.product_detail.pls_select_location')" class="location-required-message-receipientData{{$recipient->id}}"></p>

                                            <p data-text="@lang('labels.product_detail.pls_select_date')" class="location-date-required-message-receipientData{{$recipient->id}}"></p>

                                            <p data-text="@lang('labels.product_detail.pls_select_time')" class="location-time-required-message-receipientData{{$recipient->id}}"></p>
                                        </div>

                                        @include('frontend.checkouts.init-popup.preferred-time-popup')
                                        @include('frontend.checkouts.calendar_js')

                                        <div
                                            class="flex w-full justify-between preferredTime-detailreceipientData{{$recipient->id}} hidden">
                                            <div class="flex items-center">
                                                <div class="mr-2 max-w-[24px] w-[24px]">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21"
                                                        viewBox="0 0 20 21" fill="none">
                                                        <path
                                                            d="M14.1667 12.1667C14.3877 12.1667 14.5996 12.0789 14.7559 11.9226C14.9122 11.7663 15 11.5543 15 11.3333C15 11.1123 14.9122 10.9004 14.7559 10.7441C14.5996 10.5878 14.3877 10.5 14.1667 10.5C13.9457 10.5 13.7337 10.5878 13.5774 10.7441C13.4211 10.9004 13.3333 11.1123 13.3333 11.3333C13.3333 11.5543 13.4211 11.7663 13.5774 11.9226C13.7337 12.0789 13.9457 12.1667 14.1667 12.1667ZM14.1667 15.5C14.3877 15.5 14.5996 15.4122 14.7559 15.2559C14.9122 15.0996 15 14.8877 15 14.6667C15 14.4457 14.9122 14.2337 14.7559 14.0774C14.5996 13.9211 14.3877 13.8333 14.1667 13.8333C13.9457 13.8333 13.7337 13.9211 13.5774 14.0774C13.4211 14.2337 13.3333 14.4457 13.3333 14.6667C13.3333 14.8877 13.4211 15.0996 13.5774 15.2559C13.7337 15.4122 13.9457 15.5 14.1667 15.5ZM10.8333 11.3333C10.8333 11.5543 10.7455 11.7663 10.5893 11.9226C10.433 12.0789 10.221 12.1667 10 12.1667C9.77899 12.1667 9.56702 12.0789 9.41074 11.9226C9.25446 11.7663 9.16667 11.5543 9.16667 11.3333C9.16667 11.1123 9.25446 10.9004 9.41074 10.7441C9.56702 10.5878 9.77899 10.5 10 10.5C10.221 10.5 10.433 10.5878 10.5893 10.7441C10.7455 10.9004 10.8333 11.1123 10.8333 11.3333ZM10.8333 14.6667C10.8333 14.8877 10.7455 15.0996 10.5893 15.2559C10.433 15.4122 10.221 15.5 10 15.5C9.77899 15.5 9.56702 15.4122 9.41074 15.2559C9.25446 15.0996 9.16667 14.8877 9.16667 14.6667C9.16667 14.4457 9.25446 14.2337 9.41074 14.0774C9.56702 13.9211 9.77899 13.8333 10 13.8333C10.221 13.8333 10.433 13.9211 10.5893 14.0774C10.7455 14.2337 10.8333 14.4457 10.8333 14.6667ZM5.83333 12.1667C6.05435 12.1667 6.26631 12.0789 6.42259 11.9226C6.57887 11.7663 6.66667 11.5543 6.66667 11.3333C6.66667 11.1123 6.57887 10.9004 6.42259 10.7441C6.26631 10.5878 6.05435 10.5 5.83333 10.5C5.61232 10.5 5.40036 10.5878 5.24408 10.7441C5.0878 10.9004 5 11.1123 5 11.3333C5 11.5543 5.0878 11.7663 5.24408 11.9226C5.40036 12.0789 5.61232 12.1667 5.83333 12.1667ZM5.83333 15.5C6.05435 15.5 6.26631 15.4122 6.42259 15.2559C6.57887 15.0996 6.66667 14.8877 6.66667 14.6667C6.66667 14.4457 6.57887 14.2337 6.42259 14.0774C6.26631 13.9211 6.05435 13.8333 5.83333 13.8333C5.61232 13.8333 5.40036 13.9211 5.24408 14.0774C5.0878 14.2337 5 14.4457 5 14.6667C5 14.8877 5.0878 15.0996 5.24408 15.2559C5.40036 15.4122 5.61232 15.5 5.83333 15.5Z"
                                                            fill="#333333" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M5.83268 1.95801C5.99844 1.95801 6.15741 2.02386 6.27462 2.14107C6.39183 2.25828 6.45768 2.41725 6.45768 2.58301V3.21884C7.00935 3.20801 7.61685 3.20801 8.28518 3.20801H11.7127C12.3818 3.20801 12.9893 3.20801 13.541 3.21884V2.58301C13.541 2.41725 13.6069 2.25828 13.7241 2.14107C13.8413 2.02386 14.0003 1.95801 14.166 1.95801C14.3318 1.95801 14.4907 2.02386 14.608 2.14107C14.7252 2.25828 14.791 2.41725 14.791 2.58301V3.27217C15.0077 3.28884 15.2127 3.30967 15.4068 3.33551C16.3835 3.46717 17.1743 3.74384 17.7985 4.36717C18.4218 4.99134 18.6985 5.78217 18.8302 6.75884C18.9577 7.70884 18.9577 8.92134 18.9577 10.453V12.213C18.9577 13.7447 18.9577 14.958 18.8302 15.9072C18.6985 16.8838 18.4218 17.6747 17.7985 18.2988C17.1743 18.9222 16.3835 19.1988 15.4068 19.3305C14.4568 19.458 13.2443 19.458 11.7127 19.458H8.28601C6.75435 19.458 5.54102 19.458 4.59185 19.3305C3.61518 19.1988 2.82435 18.9222 2.20018 18.2988C1.57685 17.6747 1.30018 16.8838 1.16852 15.9072C1.04102 14.9572 1.04102 13.7447 1.04102 12.213V10.453C1.04102 8.92134 1.04102 7.70801 1.16852 6.75884C1.30018 5.78217 1.57685 4.99134 2.20018 4.36717C2.82435 3.74384 3.61518 3.46717 4.59185 3.33551C4.78602 3.30967 4.99185 3.28884 5.20768 3.27217V2.58301C5.20768 2.41725 5.27353 2.25828 5.39074 2.14107C5.50795 2.02386 5.66692 1.95801 5.83268 1.95801ZM4.75768 4.57467C3.92018 4.68717 3.43685 4.89884 3.08435 5.25134C2.73185 5.60384 2.52018 6.08717 2.40768 6.92551C2.38852 7.06717 2.37268 7.21717 2.35935 7.37467H17.6393C17.626 7.21634 17.6102 7.06717 17.591 6.92467C17.4785 6.08717 17.2668 5.60384 16.9143 5.25134C16.5618 4.89884 16.0785 4.68717 15.2402 4.57467C14.3843 4.45967 13.2552 4.45801 11.666 4.45801H8.33268C6.74351 4.45801 5.61518 4.45967 4.75768 4.57467ZM2.29102 10.4997C2.29102 9.78801 2.29102 9.16884 2.30185 8.62467H17.6968C17.7077 9.16884 17.7077 9.78801 17.7077 10.4997V12.1663C17.7077 13.7555 17.706 14.8847 17.591 15.7413C17.4785 16.5788 17.2668 17.0622 16.9143 17.4147C16.5618 17.7672 16.0785 17.9788 15.2402 18.0913C14.3843 18.2063 13.2552 18.208 11.666 18.208H8.33268C6.74351 18.208 5.61518 18.2063 4.75768 18.0913C3.92018 17.9788 3.43685 17.7672 3.08435 17.4147C2.73185 17.0622 2.52018 16.5788 2.40768 15.7405C2.29268 14.8847 2.29102 13.7555 2.29102 12.1663V10.4997Z"
                                                            fill="#333333" />
                                                    </svg>
                                                </div>
                                                <p
                                                    class="font-normal me-body-18 text-darkgray flex items-center preferredTime">
                                                    <span
                                                        class="preferred-name-receipientData{{$recipient->id}}"></span>
                                                    <span
                                                        class="preferred-date-receipientData{{$recipient->id}}"></span>
                                                    <span
                                                        class="preferred-timeDesc-receipientData{{$recipient->id}}"></span>
                                                </p>
                                            </div>
                                            <div data-id="receipientData{{$recipient->id}}" class="edit-btn  undefined"
                                                data-recipient_area_id="{{$recipient->location}}">
                                                <p
                                                    class="cursor-pointer flex font-normal me-body-16 text-darkgray underline hover:bgorangeMediq">
                                                   @lang('labels.check_out.edit')</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                @if($recipient->variable_id != null)
                                <div component-name="me-checkout-merchant-recipient-packages-detail" class="mt-1">
                                    <div>
                                        <div
                                            class="flex packages-placeholder-receipientData{{$recipient->id}} items=center">
                                            <div class="mr-2 max-w-[24px] w-[24px]">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                    height="19" viewBox="0 0 18 19" fill="none">
                                                    <path
                                                        d="M17.4375 4.85446H15.5498C16.5814 4.03898 16.8103 2.71267 16.0138 1.67951C15.4423 0.940876 14.463 0.5 13.3942 0.5C12.8087 0.5 12.2372 0.635761 11.7416 0.893015C10.6515 1.45631 9.48544 3.60822 9.00056 4.5811C8.51512 3.60822 7.3485 1.45585 6.2595 0.893475C5.76281 0.63622 5.19187 0.50046 4.60631 0.50046C3.53756 0.50046 2.55769 0.941336 1.98619 1.68043C1.19138 2.71129 1.41975 4.03668 2.44913 4.85446H0.5625C0.252 4.85446 0 5.06017 0 5.31467V9.22043C0 9.47492 0.252 9.68063 0.5625 9.68063H0.872438V18.0398C0.872438 18.2943 1.12388 18.5 1.43494 18.5H6.94125H11.0588H16.5651C16.8761 18.5 17.1276 18.2943 17.1276 18.0398V9.68063H17.4375C17.7486 9.68063 18 9.47492 18 9.22043V5.31467C18 5.06017 17.7486 4.85446 17.4375 4.85446ZM16.875 8.76022H16.5651H11.6213V5.77487H16.875V8.76022ZM10.4963 5.77487V8.76022H7.50375V5.77487H10.4963ZM12.3424 1.6703C12.6585 1.50693 13.0219 1.42041 13.3937 1.42041C14.0749 1.42041 14.6987 1.70114 15.0626 2.17146C15.6431 2.92482 15.3686 3.92301 14.4495 4.39748C14.256 4.4978 13.5658 4.73159 11.3439 4.73159C10.9007 4.73159 10.4856 4.72192 10.1526 4.71042C10.7657 3.52401 11.7068 1.99889 12.3424 1.6703ZM2.93625 2.17146C3.30019 1.70114 3.92456 1.42041 4.60575 1.42041C4.97756 1.42041 5.3415 1.50693 5.65763 1.67122C6.29269 1.99889 7.23375 3.52447 7.84744 4.71042C7.51163 4.72192 7.09369 4.73205 6.64537 4.73205C4.43081 4.73205 3.74231 4.49964 3.54994 4.40024C2.63138 3.92347 2.35631 2.9239 2.93625 2.17146ZM1.125 5.77487H6.37875V8.76022H1.43494H1.125V5.77487ZM1.99744 9.68063H6.37875V17.5796H1.99744V9.68063ZM7.50375 17.5796V9.68063H10.4963V17.5796H7.50375ZM16.0026 17.5796H11.6213V9.68063H16.0026V17.5796Z"
                                                        fill="#1A171B" />
                                                </svg>
                                            </div>
                                            <p data-id="receipientData{{$recipient->id}}"
                                                class="custom-packages-remark-title cursor-pointer flex font-normal me-body-18 text-darkgray underline">
                                                {{__('labels.select_packages')}}</p>
                                        </div>
                                        <div
                                            class="flex w-full justify-between hidden packages-show-detail-receipientData{{$recipient->id}}">
                                            <div class="flex items-center w-full">
                                                <div class="mr-2 max-w-[24px] w-[24px]">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="25" viewBox="0 0 24 25" fill="none">
                                                        <path
                                                            d="M12.5 21C17.1944 21 21 17.1944 21 12.5C21 7.80558 17.1944 4 12.5 4C7.80558 4 4 7.80558 4 12.5C4 17.1944 7.80558 21 12.5 21Z"
                                                            stroke="#333333" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path
                                                            d="M12.4992 8.57715V16.4233M8.57617 12.5002H16.4223"
                                                            stroke="#333333" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                                <p
                                                    class="mr-2 font-normal me-body-18 text-darkgray underline">
                                                    {{__('labels.package')}}</p>
                                                <div class="showDropdown-btn active">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                        height="7" viewBox="0 0 12 7" fill="none">
                                                        <path
                                                            d="M0.042841 6.46313C0.14831 6.69047 0.413154 6.7936 0.649873 6.6975C0.713154 6.67172 1.46315 5.93344 3.36628 4.02094L5.99831 1.37719L8.628 4.02094C10.5358 5.93579 11.2835 6.67172 11.3467 6.6975C11.396 6.71625 11.478 6.73266 11.5296 6.73266C11.8671 6.73266 12.0944 6.39047 11.9538 6.08813C11.8905 5.95454 6.32878 0.367034 6.19753 0.308441C6.078 0.252191 5.91862 0.252191 5.79909 0.308441C5.66784 0.367034 0.106123 5.95453 0.042841 6.08813C-0.0134086 6.20766 -0.0134086 6.3436 0.042841 6.46313Z"
                                                            fill="#333333" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <div data-id="receipientData{{$recipient->id}}"
                                                class="packages-edit-btn">
                                                <p
                                                    class="cursor-pointer flex font-normal me-body-16 text-darkgray underline hover:text-orangeMediq">
                                                    {{__('labels.check_out.edit')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="packages-detail-list-receipientData{{$recipient->id}}">
                                        <div component-name="me-checkout-merchant-recipient-packages-item"
                                            class="pl-8 mt-1">
                                            <ul
                                                class="custom-list-style bg-far px-5 py-[10px] rounded-[12px] packages-detail-receipientData{{$recipient->id}}">
                                                <li data-text="{{isset($recipient->variable_product) ? langbind($recipient->variable_product,'name') : ''}}"
                                                    data-price="{{$exist_product_price != null ? $exist_product_price : $recipient->variable_product->original_price}}"
                                                    class="flex items-center justify-between">
                                                    <span
                                                        class="mr-4 font-normal me-body-18 text-darkgray"></span>
                                                    <span
                                                        class="font-normal me-body-18 text-darkgray"></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    
                                </div>
                                @include('frontend.checkouts.init-popup.package-popup')
                                @endif

                                @php
                                $checkUpTable = $recipient->product->package->checkupTable;
                                $group_Ids = App\Models\CheckUpTableType::where('check_up_table_id',
                                $checkUpTable->id)->where('check_up_type_id',2)->pluck('check_up_group_id')->toArray();
                                $checkUpGroups = App\Models\CheckUpGroup::whereIn('id',$group_Ids)->get();
                                @endphp
                                @if(count($checkUpGroups) > 0)
                                @foreach($checkUpGroups as $group)
                                <div component-name="me-checkout-merchant-recipient-cancerMarker-detail" class="mt-1">
                                    <div class="flex sm:flex-row flex-col">


                                        {{-- <div class="hidden">
                                            <input type="hidden" name="recipient_id" value="{{$recipient->id}}">
                                        <input type="hidden" name="group_id" value="{{$group->id}}">
                                        <input type="hidden" name="product_id" value="{{$recipient->product_id}}">
                                        <input data-id="receipientData{{$group->id}}{{$recipient->id}}" type="hidden"
                                            value="{{ $recItem }}"
                                            class="cancerMarkers-selected-tags-ids cancerMarkers-selected-tags-ids-receipientData{{$group->id}}{{$recipient->id}}" />
                                    </div> --}}
                                    <div
                                        class="w-full flex cancer-markers-placeholderreceipientData{{$group->id}}{{$recipient->id}}">
                                        <div class="mr-2 max-w-[24px] w-[24px]">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25"
                                                viewBox="0 0 24 25" fill="none">
                                                <path
                                                    d="M9.4979 3.00898C8.94263 3.08328 8.22312 3.3531 7.73824 3.66984C7.3824 3.90446 6.83104 4.44409 6.60815 4.77647C6.38525 5.10885 6.15845 5.58982 6.02941 6.01605C5.93165 6.34452 5.92383 6.41882 5.91992 7.0914C5.91992 7.72097 5.92774 7.83437 5.99422 7.96341C6.20929 8.39746 6.8193 8.40919 7.03046 7.98296C7.09694 7.8461 7.10085 7.7718 7.08521 7.28692C7.05784 6.66126 7.11258 6.36407 7.32765 5.89092C7.49189 5.53508 7.65221 5.30046 7.91812 5.03846C8.81359 4.13908 10.1431 3.91228 11.2849 4.45582C12.0475 4.81948 12.6497 5.55072 12.8647 6.38363C12.9273 6.61043 12.9429 6.78639 12.939 7.1305C12.9234 7.90476 12.9273 7.91649 13.0055 8.02207C13.2088 8.29188 13.4786 8.36227 13.7563 8.21758C13.9909 8.09636 14.0652 7.93995 14.1082 7.47853C14.1786 6.72774 14.0457 6.00823 13.7015 5.31219C13.4552 4.80775 13.2049 4.46755 12.8178 4.10389C12.0748 3.40002 11.1794 3.03245 10.1431 3.00507C9.86548 2.99725 9.5722 3.00116 9.4979 3.00898Z"
                                                    fill="#333333" />
                                                <path
                                                    d="M9.54314 5.43202C9.05825 5.56106 8.62029 5.93645 8.39349 6.41352L8.26836 6.67942L8.25663 11.3992C8.25272 14.07 8.23316 16.1229 8.21361 16.1229C8.19406 16.1229 8.03374 15.9626 7.85386 15.7632C7.2282 15.0789 6.84499 14.8873 6.14503 14.9186C5.81656 14.9303 5.73053 14.9498 5.49982 15.0632C4.48704 15.552 4.17812 16.862 4.87807 17.7184C4.97583 17.8435 5.97689 18.9189 7.09525 20.1115C9.18338 22.3326 9.35544 22.4968 9.85988 22.7315C10.4191 22.9934 10.2978 22.9817 13.3284 22.9974C15.6237 23.0052 16.1321 22.9974 16.3863 22.9504C16.9885 22.837 17.4577 22.5868 17.9113 22.1449C18.4157 21.6483 18.6895 21.0656 18.7716 20.3188C18.7951 20.0685 18.8068 18.8328 18.799 16.7877L18.7833 13.6399L18.6973 13.4052C18.5096 12.9047 18.1303 12.5176 17.6415 12.326C17.3404 12.2087 16.7734 12.1969 16.4645 12.3064C16.2572 12.3768 16.2494 12.3768 16.2025 12.3064C15.9209 11.8998 15.6785 11.6925 15.2914 11.54C14.9942 11.4266 14.4233 11.4188 14.1183 11.5244C13.911 11.5947 13.9032 11.5947 13.8563 11.5244C13.5747 11.1177 13.3284 10.9104 12.9451 10.7618C12.7105 10.668 12.1983 10.6406 11.9167 10.6993L11.7681 10.7306V8.87313C11.7681 7.67265 11.7525 6.94142 11.7251 6.80846C11.5179 5.81132 10.5051 5.17393 9.54314 5.43202ZM10.3135 6.64814C10.3682 6.69115 10.4503 6.77327 10.4934 6.83193C10.5755 6.93751 10.5755 6.97661 10.595 10.668C10.6146 14.3633 10.6146 14.3985 10.6967 14.508C10.8727 14.7504 11.2246 14.8247 11.4553 14.6644C11.7486 14.4649 11.7447 14.4806 11.7681 13.2684C11.7877 12.2439 11.7916 12.1735 11.8698 12.0679C12.124 11.7238 12.6206 11.759 12.8435 12.1383C12.9139 12.2595 12.9217 12.3612 12.9412 13.3349C12.9608 14.332 12.9647 14.4024 13.0429 14.508C13.2971 14.8521 13.7937 14.8169 14.0166 14.4376C14.0831 14.3242 14.0987 14.2108 14.1143 13.632C14.13 13.0338 14.1417 12.9477 14.216 12.85C14.4702 12.5059 14.9668 12.5411 15.1897 12.9204C15.2562 13.0338 15.2718 13.1472 15.2875 13.7259C15.3031 14.3242 15.3148 14.4102 15.3891 14.508C15.5103 14.6722 15.7059 14.7621 15.9092 14.7426C16.2416 14.7074 16.4136 14.4845 16.4567 14.0309C16.4762 13.8315 16.5075 13.7024 16.5622 13.632C16.8164 13.2879 17.313 13.3231 17.5359 13.7024C17.6141 13.8315 17.6141 13.9058 17.6141 17.1005C17.6141 20.1975 17.6102 20.3774 17.5398 20.5808C17.3248 21.2103 16.8281 21.6639 16.2103 21.793C16.0695 21.8203 15.1662 21.8321 13.3479 21.8242C10.6928 21.8125 10.6928 21.8125 10.4738 21.7226C10.3526 21.6757 10.1727 21.5779 10.0749 21.5075C9.8325 21.3355 5.7931 17.038 5.72271 16.8776C5.60931 16.6156 5.69143 16.3419 5.9456 16.1542C6.059 16.0682 6.32882 16.0486 6.49305 16.1151C6.5478 16.1386 7.00531 16.5844 7.50584 17.1084C8.01027 17.6284 8.46388 18.0899 8.51862 18.125C8.65939 18.2228 8.97613 18.2189 9.13646 18.1172C9.20684 18.0781 9.29287 17.9843 9.33198 17.9139C9.39845 17.7927 9.40236 17.4877 9.42191 12.3416C9.44147 6.91404 9.44147 6.8984 9.52358 6.78891C9.70346 6.54256 10.0828 6.47608 10.3135 6.64814Z"
                                                    fill="#333333" />
                                            </svg>
                                        </div>
                                        
                                        <div class="flex justify-between w-full">
                                            @if(lang() == "en")
                                            <p data-id="receipientData{{$group->id}}{{$recipient->id}}" data-label="{{__('labels.check_out.optional_decide_later')}}"
                                                class="custom-cancer-markers-remark-title cursor-pointer flex flex-wrap font-normal me-body-18 text-darkgray underline">
                                                @lang('labels.check_out.select') {{langbind($group,'name')}} (<span
                                                    class="selected-cancermarkers-count-receipientData{{$group->id}}{{$recipient->id}}">0/7</span>@lang('labels.check_out.selected'))
                                            </p>
                                            @else 
                                            <p data-id="receipientData{{$group->id}}{{$recipient->id}}" data-label="{{__('labels.check_out.optional_decide_later')}}"
                                                class="custom-cancer-markers-remark-title cursor-pointer flex flex-wrap font-normal me-body-18 text-darkgray underline">
                                                @lang('labels.check_out.select') {{langbind($group,'name')}}({{__('labels.check_out.selected')}}<span
                                                    class="selected-cancermarkers-count-receipientData{{$group->id}}{{$recipient->id}}">0/7</span>{{__('labels.product_detail.items')}})
                                            </p>
                                            @endif
                                            <div data-parentid="receipientData{{$recipient->id}}" data-id="receipientData{{$group->id}}{{$recipient->id}}" class="cancer-markers-edit-btn receipientData{{$group->id}}{{$recipient->id}}showEditBtn">
                                                <p class="cursor-pointer font-normal me-body-16 text-darkgray underline hover:text-orangeMediq">@lang('labels.check_out.edit')</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="flex w-full justify-between hidden cancer-markers-detail-datareceipientData{{$group->id}}{{$recipient->id}}">
                                        <div class="flex items-center w-full">
                                            <div class="mr-2 max-w-[24px] w-[24px]">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25"
                                                    viewBox="0 0 24 25" fill="none">
                                                    <path
                                                        d="M9.4979 3.00898C8.94263 3.08328 8.22312 3.3531 7.73824 3.66984C7.3824 3.90446 6.83104 4.44409 6.60815 4.77647C6.38525 5.10885 6.15845 5.58982 6.02941 6.01605C5.93165 6.34452 5.92383 6.41882 5.91992 7.0914C5.91992 7.72097 5.92774 7.83437 5.99422 7.96341C6.20929 8.39746 6.8193 8.40919 7.03046 7.98296C7.09694 7.8461 7.10085 7.7718 7.08521 7.28692C7.05784 6.66126 7.11258 6.36407 7.32765 5.89092C7.49189 5.53508 7.65221 5.30046 7.91812 5.03846C8.81359 4.13908 10.1431 3.91228 11.2849 4.45582C12.0475 4.81948 12.6497 5.55072 12.8647 6.38363C12.9273 6.61043 12.9429 6.78639 12.939 7.1305C12.9234 7.90476 12.9273 7.91649 13.0055 8.02207C13.2088 8.29188 13.4786 8.36227 13.7563 8.21758C13.9909 8.09636 14.0652 7.93995 14.1082 7.47853C14.1786 6.72774 14.0457 6.00823 13.7015 5.31219C13.4552 4.80775 13.2049 4.46755 12.8178 4.10389C12.0748 3.40002 11.1794 3.03245 10.1431 3.00507C9.86548 2.99725 9.5722 3.00116 9.4979 3.00898Z"
                                                        fill="#333333" />
                                                    <path
                                                        d="M9.54314 5.43202C9.05825 5.56106 8.62029 5.93645 8.39349 6.41352L8.26836 6.67942L8.25663 11.3992C8.25272 14.07 8.23316 16.1229 8.21361 16.1229C8.19406 16.1229 8.03374 15.9626 7.85386 15.7632C7.2282 15.0789 6.84499 14.8873 6.14503 14.9186C5.81656 14.9303 5.73053 14.9498 5.49982 15.0632C4.48704 15.552 4.17812 16.862 4.87807 17.7184C4.97583 17.8435 5.97689 18.9189 7.09525 20.1115C9.18338 22.3326 9.35544 22.4968 9.85988 22.7315C10.4191 22.9934 10.2978 22.9817 13.3284 22.9974C15.6237 23.0052 16.1321 22.9974 16.3863 22.9504C16.9885 22.837 17.4577 22.5868 17.9113 22.1449C18.4157 21.6483 18.6895 21.0656 18.7716 20.3188C18.7951 20.0685 18.8068 18.8328 18.799 16.7877L18.7833 13.6399L18.6973 13.4052C18.5096 12.9047 18.1303 12.5176 17.6415 12.326C17.3404 12.2087 16.7734 12.1969 16.4645 12.3064C16.2572 12.3768 16.2494 12.3768 16.2025 12.3064C15.9209 11.8998 15.6785 11.6925 15.2914 11.54C14.9942 11.4266 14.4233 11.4188 14.1183 11.5244C13.911 11.5947 13.9032 11.5947 13.8563 11.5244C13.5747 11.1177 13.3284 10.9104 12.9451 10.7618C12.7105 10.668 12.1983 10.6406 11.9167 10.6993L11.7681 10.7306V8.87313C11.7681 7.67265 11.7525 6.94142 11.7251 6.80846C11.5179 5.81132 10.5051 5.17393 9.54314 5.43202ZM10.3135 6.64814C10.3682 6.69115 10.4503 6.77327 10.4934 6.83193C10.5755 6.93751 10.5755 6.97661 10.595 10.668C10.6146 14.3633 10.6146 14.3985 10.6967 14.508C10.8727 14.7504 11.2246 14.8247 11.4553 14.6644C11.7486 14.4649 11.7447 14.4806 11.7681 13.2684C11.7877 12.2439 11.7916 12.1735 11.8698 12.0679C12.124 11.7238 12.6206 11.759 12.8435 12.1383C12.9139 12.2595 12.9217 12.3612 12.9412 13.3349C12.9608 14.332 12.9647 14.4024 13.0429 14.508C13.2971 14.8521 13.7937 14.8169 14.0166 14.4376C14.0831 14.3242 14.0987 14.2108 14.1143 13.632C14.13 13.0338 14.1417 12.9477 14.216 12.85C14.4702 12.5059 14.9668 12.5411 15.1897 12.9204C15.2562 13.0338 15.2718 13.1472 15.2875 13.7259C15.3031 14.3242 15.3148 14.4102 15.3891 14.508C15.5103 14.6722 15.7059 14.7621 15.9092 14.7426C16.2416 14.7074 16.4136 14.4845 16.4567 14.0309C16.4762 13.8315 16.5075 13.7024 16.5622 13.632C16.8164 13.2879 17.313 13.3231 17.5359 13.7024C17.6141 13.8315 17.6141 13.9058 17.6141 17.1005C17.6141 20.1975 17.6102 20.3774 17.5398 20.5808C17.3248 21.2103 16.8281 21.6639 16.2103 21.793C16.0695 21.8203 15.1662 21.8321 13.3479 21.8242C10.6928 21.8125 10.6928 21.8125 10.4738 21.7226C10.3526 21.6757 10.1727 21.5779 10.0749 21.5075C9.8325 21.3355 5.7931 17.038 5.72271 16.8776C5.60931 16.6156 5.69143 16.3419 5.9456 16.1542C6.059 16.0682 6.32882 16.0486 6.49305 16.1151C6.5478 16.1386 7.00531 16.5844 7.50584 17.1084C8.01027 17.6284 8.46388 18.0899 8.51862 18.125C8.65939 18.2228 8.97613 18.2189 9.13646 18.1172C9.20684 18.0781 9.29287 17.9843 9.33198 17.9139C9.39845 17.7927 9.40236 17.4877 9.42191 12.3416C9.44147 6.91404 9.44147 6.8984 9.52358 6.78891C9.70346 6.54256 10.0828 6.47608 10.3135 6.64814Z"
                                                        fill="#333333" />
                                                </svg>
                                            </div>
                                            <p
                                                class="mr-2 font-normal me-body-18 text-darkgray cancer-markers-label-receipientData{{$group->id}}{{$recipient->id}}">
                                                {{langbind($group,'name')}} 
                                                @if(lang() == 'en')
                                                (<span class="selected-cancermarkers-count-receipientData{{$group->id}}{{$recipient->id}}">0/7</span>@lang('labels.check_out.selected'))
                                                @else 
                                                ({{__('labels.check_out.selected')}}<span class="selected-cancermarkers-count-receipientData{{$group->id}}{{$recipient->id}}"></span>{{__('labels.product_detail.items')}})
                                                @endif
                                            </p>
                                            <p data-text="{{__('labels.basic_info.please_select')}} {{langbind($group,'name')}}" class="cancer-markers-required-message-receipientData{{$group->id}}{{$recipient->id}}"></p>
                                            <div class="showDropdown-btn active">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="7"
                                                    viewBox="0 0 12 7" fill="none">
                                                    <path
                                                        d="M0.042841 6.46313C0.14831 6.69047 0.413154 6.7936 0.649873 6.6975C0.713154 6.67172 1.46315 5.93344 3.36628 4.02094L5.99831 1.37719L8.628 4.02094C10.5358 5.93579 11.2835 6.67172 11.3467 6.6975C11.396 6.71625 11.478 6.73266 11.5296 6.73266C11.8671 6.73266 12.0944 6.39047 11.9538 6.08813C11.8905 5.95454 6.32878 0.367034 6.19753 0.308441C6.078 0.252191 5.91862 0.252191 5.79909 0.308441C5.66784 0.367034 0.106123 5.95453 0.042841 6.08813C-0.0134086 6.20766 -0.0134086 6.3436 0.042841 6.46313Z"
                                                        fill="#333333" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div data-id="receipientData{{$group->id}}{{$recipient->id}}"
                                            class="cancer-markers-edit-btn">
                                            <p class="cursor-pointer font-normal lme-body-16 text-darkgray underline">
                                               @lang('labels.check_out.edit')</p>
                                        </div>
                                    </div>
                                    @php
                                    $tablePriIds =
                                    App\Models\CheckUpTableType::where('check_up_type_id',2)->where('check_up_table_id',$checkUpTable->id)->pluck('id')->toArray();
                                    $optionGroupIds=
                                    App\Models\CheckTableItem::where('check_up_group_id',$group->id)->whereIn('check_up_table_type_id',$tablePriIds)->distinct()->pluck('check_up_item_id')->toArray();
                                    $recItems = [];
                                    $tableItem = [];
                                    $tableItemIds = [];
                                    if(count($recipient->recipient_items) > 0 ){
                                    $titems = App\Models\CheckTableItem::where('check_up_group_id',$group->id)
                                    ->whereIn('check_up_table_type_id',$tablePriIds)->distinct()->pluck('check_up_item_id')->toArray();
                                    $recItems =
                                    $recipient->recipient_items()->whereIn('check_up_item_id',$titems)->pluck('check_up_item_id')->toArray();
                                    $tableItem = App\Models\CheckUpItem::whereIn('id',$recItems)->pluck('name_en')->toArray();
                                    $tableItemIds = App\Models\CheckUpItem::whereIn('id',$recItems)->pluck('id')->toArray();
                                    }
                                    $tableItems = implode(',',$tableItem);
                                    $recItem = implode(',',$tableItemIds);

                                    $countEquivalentNumber =
                                    App\Models\CheckUpItem::whereIn('id',$optionGroupIds)->sum('equivalent_number');
                                    @endphp

                                    @if(count($optionGroupIds) > 0)
                                    @include('frontend.checkouts.init-popup.check-up-item-modals')
                                    @endif

                                </div>

                                <div class="hidden detail-data-listreceipientData{{$group->id}}{{$recipient->id}}">
                                    <div component-name="me-checkout-merchant-recipient-cancerMarkers-detail-list"
                                        class="pl-8 mt-1">
                                        <ul
                                            class="custom-list-style bg-far px-5 py-[10px] rounded-[12px] cancerMarkers-detail-datareceipientData{{$group->id}}{{$recipient->id}}">

                                            <li class="flex items-center mt-2">
                                                <span
                                                    class="mr-4 font-normal me-body-18 text-darkgray">{{langbind($group,'name')}}</span>
                                                <!-- <span
                                                        class="font-normal me-body-18 text-darkgray">$600</span> -->
                                            </li>
                                        </ul>
                                    </div>
                                </div>


                            </div>
                            @endforeach
                            @endif
                            @if(count($recipient->product->add_on_item_data) > 0)
                            <div component-name="me-checkout-merchant-recipient-preferredTime-detail" class="mt-1">
                                <div>
                                    <div class="flex addson-placeholder-receipientData{{$recipient->id}}">
                                        <div class="mr-2 max-w-[24px] w-[24px]">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25"
                                                viewBox="0 0 24 25" fill="none">
                                                <path
                                                    d="M12.5 21C17.1944 21 21 17.1944 21 12.5C21 7.80558 17.1944 4 12.5 4C7.80558 4 4 7.80558 4 12.5C4 17.1944 7.80558 21 12.5 21Z"
                                                    stroke="#333333" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M12.4992 8.57715V16.4233M8.57617 12.5002H16.4223"
                                                    stroke="#333333" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <div class="flex justify-between w-full">
                                        <p data-id="receipientData{{$recipient->id}}"
                                            class="custom-addson-remark-title cursor-pointer flex font-normal me-body-18 text-darkgray remove-red-dot" data-label="{{__('labels.check_out.no_additional_item')}}">
                                            @lang('labels.check_out.select_add_on_items')</p>
                                            <div data-id="receipientData{{$recipient->id}}"
                                            class="noadditional_edit_button-receipientData{{$recipient->id}} addons-edit-btn {{$recipient->is_add_on_decide_later != 'true' ? 'hidden' : ''}}">
                                            <p class="cursor-pointer flex font-normal me-body-16 text-darkgray hover:text-orangeMediq">
                                                @lang('labels.check_out.edit')</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="flex w-full justify-between hidden addson-show-detail-receipientData{{$recipient->id}}">
                                        <div class="flex items-center w-full">
                                            <div class="mr-2 max-w-[24px] w-[24px]">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25"
                                                    viewBox="0 0 24 25" fill="none">
                                                    <path
                                                        d="M12.5 21C17.1944 21 21 17.1944 21 12.5C21 7.80558 17.1944 4 12.5 4C7.80558 4 4 7.80558 4 12.5C4 17.1944 7.80558 21 12.5 21Z"
                                                        stroke="#333333" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M12.4992 8.57715V16.4233M8.57617 12.5002H16.4223"
                                                        stroke="#333333" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <p class="mr-2 font-normal me-body-18 text-darkgray">
                                                @lang('labels.check_out.redemption_Offers') (<span
                                                    class="selected-addson-count-receipientData{{$recipient->id}}">1/4</span>)
                                            </p>
                                            <div class="showDropdown-btn active">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="7"
                                                    viewBox="0 0 12 7" fill="none">
                                                    <path
                                                        d="M0.042841 6.46313C0.14831 6.69047 0.413154 6.7936 0.649873 6.6975C0.713154 6.67172 1.46315 5.93344 3.36628 4.02094L5.99831 1.37719L8.628 4.02094C10.5358 5.93579 11.2835 6.67172 11.3467 6.6975C11.396 6.71625 11.478 6.73266 11.5296 6.73266C11.8671 6.73266 12.0944 6.39047 11.9538 6.08813C11.8905 5.95454 6.32878 0.367034 6.19753 0.308441C6.078 0.252191 5.91862 0.252191 5.79909 0.308441C5.66784 0.367034 0.106123 5.95453 0.042841 6.08813C-0.0134086 6.20766 -0.0134086 6.3436 0.042841 6.46313Z"
                                                        fill="#333333" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div data-id="receipientData{{$recipient->id}}"
                                            class="addons-edit-btn undefined">
                                            <p
                                                class="cursor-pointer flex font-normal me-body-16 text-darkgray underline hover:text-orangeMediq">
                                               @lang('labels.check_out.edit')</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="hidden addson-detail-list-receipientData{{$recipient->id}}">
                                    <div component-name="me-checkout-merchant-recipient-addonItems-detail-list"
                                        class="pl-8 mt-1">
                                        <ul
                                            class="custom-list-style bg-far px-5 py-[10px] rounded-[12px] adds-on-checklist-detailreceipientData{{$recipient->id}}">
                                            @foreach($recipient->add_on_data as $key => $item)
                                            <li data-text="{{ langbind($item,'name') }}"
                                                data-price="${{$item->discount_price != null ? $item->discount_price : $item->original_price }}"
                                                class="flex items-center mt-2">
                                                <span
                                                    class="mr-4 font-normal me-body-18 text-darkgray">{{ langbind($item,'name') }}</span>
                                                <span
                                                    class="font-normal me-body-18 text-darkgray">${{$item->discount_price != null ? number_format($item->discount_price) : number_format($item->original_price) }}</span>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                            </div>
                            @endif
                        @include('frontend.checkouts.init-popup.add-on-modal')

                    </div>



                </div>
                {{-- <div class="hidden">
                            <input data-id="receipientData{{$recipient->id}}" type="hidden"
                value="{{isset($recipient->area) ? $recipient->area->name_en : ''}}"
                class="checkout-data-location checkout-locationreceipientData{{$recipient->id}}" />
                <input data-id="receipientData{{$recipient->id}}" type="hidden" value="{{$recipient->area_id}}"
                    class="checkout-data-location-id checkout-location-idreceipientData{{$recipient->id}}" />
                <input data-id="receipientData{{$recipient->id}}" type="hidden"
                    value="{{date('d M Y', strtotime($recipient->date))}}"
                    class="checkout-data-location-date checkout-datereceipientData{{$recipient->id}}" />
                <input data-id="receipientData{{$recipient->id}}" type="hidden" value="{{$recipient->time}}"
                    class="checkout-data-location-time checkout-timereceipientData{{$recipient->id}}" />
            </div> --}}

        </div>

    </div>
</div>
</div>


<div class="flex justify-between pt-6 border-t border-t-mee4 items-center mt-4">
    <div class="flex sm:flex-row flex-col sm:items-center items-start">
        @foreach($recipient->product->price_tag_data_arr as $price)
        <div class="flex items-center mr-5 sm:mb-0 mb-1 relative">
            <div class="mr-[10px]">
                <img src="{{asset($price->img)}}" alt="best price" class="max-w-[20px] max-h-[20px] best-price-div"/>
            </div>
            <div>
                <p class="font-normal me-body-18 text-darkgray best-price-text">{{langbind($price,'name')}}</p>
                <div
                    class="hidden absolute lg:left-[-6%] left-[1%] -translate-1/2 bottom-[20%] best-price-text-tooltip">
                    <div class="bg-white py-5 px-3 rounded-[8px] custom-box-shadow-tooltip">

                        <ul class="list-disc pl-6 font-normal me-body-16 text-darkgray">
                            {!! langbind($price,'content') !!}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div>
                <p class="font-bold me-body-20 text-darkgray checkout-price-summary-{{$recipient->id}}">$14,000</p>
            </div>
</div>


</div>
</div>

@endif
@endforeach
@endif

@extends('admin.layouts.master')
@section('title', 'Order')
@section('breadcrumb', 'Order')
@section('breadcrumb-info', 'Order Lists')
@push('style')
@endpush
@section('content')
    <div class="container">
        <a href="{{ url('/admin/orders') }}" title="Back"><button class="btn btn-light py-5 btn-sm"><i
                    class="fa fa-arrow-left" aria-hidden="true"></i></button></a>
        <div class="col-md-12">
            <div class="card card-dashed">
                <div class="card-header">
                    <h3 class="card-title">Order No. {{ $order->invoice_no }} &nbsp; <span class="text-gray-600 fs-6">
                            {{ date('d M Y', strtotime($order->created_at)) }}</span></h3>
                    <div class="card-toolbar">
                        {{-- <button type="button" class="btn btn-sm btn-light">
                        @if ($order->status)
                        Inactive
                        @else
                        Active
                        @endif
                    </button> --}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 p-5">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h3 class="card-title">Payment Information</h3>
                            </div>
                            <div class="card-body">
                                <p> Payment ID : {{ $order->stripe_payment_id }}</p>
                                <p> Card Type : {{ ($order->card_name!=null?$order->card_name: ($order->payment_type=='a_pay'?'Apple Pay':''))}}</p>
                                @if ($order->promo_code_id)
                                    <p> Used Promo Code : {{ $order->promoCode->code }}</p>

                                    <p> Promo Code Amount : {{ $order->promo_code_amount }}</p>
                                @else
                                    <p> Used Coupon : {{ isset($order->coupon) ? $order->coupon->name_en : '' }}</p>
                                    <p> Coupon Amount :
                                        {{ $order->coupon_amount ?? '' }}{{ isset($order->coupon) && $order->coupon->discount_type == 'percent' ? '%' : '' }}
                                    </p>
                                @endif
                                <p> Total Amount : ${{ $order->grand_total }}</p>
                                <p> Current Payment Status : @php
                                    if ($order->payment_status == 1) {
                                        echo '<span class="badge bg-success" style="padding:5px 8px;">Success (online payment)</span>';
                                    } elseif ($order->payment_status == 2) {
                                        echo '<span class="badge bg-primary" style="padding:5px 8px;">Pending (other payment/ offline)</span>';
                                    } elseif ($order->payment_status == 3) {
                                        echo '<span class="badge bg-primary" style="padding:5px 8px;">Processing (other payment/ offline)</span>';
                                    } elseif ($order->payment_status == 4) {
                                        echo '<span class="badge bg-danger" style="padding:5px 8px;">Reject (other payment/ offline)</span>';
                                    } elseif ($order->payment_status == 6) {
                                        echo '<span class="badge bg-danger" style="padding:5px 8px;">Cancel</span>';
                                    } else {
                                        echo '<span class="badge bg-success" style="padding:5px 8px;">Success (other payment/ offline)</span>';
                                    }
                                @endphp
                                </p>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-6 p-5">
                        <div class="card">
                            <div class="card-header bg-light">
                                <h3 class="card-title">Contact Information</h3>
                            </div>
                            <div class="card-body">
                                <p> Name : {{ $order->customer->title_full_name == 'Mrs' ? 'Miss/Mrs' : 'Mr' }}
                                    {{ ucfirst($order->last_name) }} {{ ucfirst($order->first_name) }}</p>
                                @php
                                    $phone = $order->customer->phone;
                                    if (strlen($phone) == 12) {
                                        $phone = substr($phone, 0, 4) . ' ' . substr($phone, 4, 4) . ' ' . substr($phone, 8);
                                    }
                                    if (strlen($phone) == 11) {
                                        $phone = substr($phone, 0, 3) . ' ' . substr($phone, 3, 4) . ' ' . substr($phone, 7);
                                    }
                                @endphp
                                @php
                                 $phone = $order->phone;
                                 if (strlen($phone) == 12) {
                                     $order_phone = substr($phone, 0, 4) . ' ' . substr($phone, 4, 4) . ' ' . substr($phone, 8);
                                 }
                                 if (strlen($phone) == 11) {
                                     $order_phone = substr($phone, 0, 3) . ' ' . substr($phone, 3, 4) . ' ' . substr($phone, 7);
                                 }
                                @endphp
                                <p> Phone Number : {{ $order_phone }}</p>

                                <p> Email : {{ $order->customer->email }}</p>

                            </div>

                        </div>
                    </div>
                    @if (isset($order_items))
                        @foreach ($order_items as $order_item)
                            <div class="row">
                                <div class="col-md-12 p-5">
                                    <div class="">
                                        <div class="accordion-item">
                                            <p class="accordion-header "
                                                id="kt_accordion_1_header_{{ $order_item->recipient_id }}">
                                                <button class="bg-light accordion-button fs-4 fw-semibold collapsed"
                                                    type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#kt_accordion_1_body_{{ $order_item->recipient_id }}"
                                                    aria-expanded="false"
                                                    aria-controls="kt_accordion_1_body_{{ $order_item->recipient_id }}">
                                                    {{ $order_item->recipient->product->name_en }} /
                                                    {{ $order_item->recipient->product->name_tc }} /
                                                    {{ $order_item->recipient->product->product_code }}
                                                </button>
                                            </p>
                                            <div id="kt_accordion_1_body_{{ $order_item->recipient_id }}"
                                                class="accordion-collapse collapse"
                                                aria-labelledby="kt_accordion_1_header_{{ $order_item->recipient_id }}"
                                                data-bs-parent="#kt_accordion_1">
                                                <div class="accordion-body">
                                                    @php
                                                        $no = 1;
                                                    @endphp

                                                    @forelse ($order_item->recipients as $key => $recipients)
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h3 class="card-title">Recipient @if ($order_item->is_two_recipient == 1)
                                                                        {{ $no++ }}
                                                                    @endif
                                                                </h3>

                                                            </div>
                                                            <div class="card-body">
                                                                <div>
                                                                    <p> Booking Status :
                                                                        @php
                                                                            if ($order_item->order_status == 1) {
                                                                                echo '<span class="badge bg-warning" style="padding:5px 8px;">Pending (waiting for payment)</span>';
                                                                            } elseif ($order_item->order_status == 2) {
                                                                                echo '<span class="badge bg-warning" style="padding:5px 8px;">Pending (waiting for confirmation)</span>';
                                                                            } elseif ($order_item->order_status == 3) {
                                                                                echo '<span class="badge bg-primary" style="padding:5px 8px;">Booking Confirmed</span>';
                                                                            } elseif ($order_item->order_status == 4) {
                                                                                echo '<span class="badge bg-success" style="padding:5px 8px;">Completed</span>';
                                                                            } elseif ($order_item->order_status == 5) {
                                                                                echo '<span class="badge bg-danger" style="padding:5px 8px;">Expired</span>';
                                                                            } elseif ($order_item->order_status == 6) {
                                                                                echo '<span class="badge bg-danger" style="padding:5px 8px;">Cancel</span>';
                                                                            } else {
                                                                                echo '<span class="badge bg-info" style="padding:5px 8px;">Refunded</span>';
                                                                            }
                                                                        @endphp
                                                                    </p>
                                                                    <p
                                                                        class="fs-5 mr-4 font-normal me-body-18 text-darkgray">
                                                                        Booking ID : {{ $order_item->booking_id }}
                                                                    </p>
                                                                    <p
                                                                        class="fs-5 mr-4 font-normal me-body-18 text-darkgray">
                                                                        Product Name : {{ $order_item->product->name_tc }}
                                                                        {{ $order_item->product->product_code }}
                                                                    </p>
                                                                    @if ($recipients->variable_id != null)
                                                                        @php $vairableProductName = \App\Models\ProductVariation::find($recipients->variable_id); @endphp
                                                                        <p
                                                                            class="fs-5 mr-4 font-normal me-body-18 text-darkgray">
                                                                            Package Name :
                                                                            {{ $vairableProductName->name_en }}
                                                                        </p>
                                                                    @endif
                                                                    <p
                                                                        class="fs-5 mr-4 font-normal me-body-18 text-darkgray">
                                                                        Recipient Name :
                                                                        @if ($recipients->title)
                                                                            @if ($recipients->title == 'true')
                                                                                Miss/Mrs.
                                                                            @else
                                                                                Mr.
                                                                            @endif
                                                                        @endif
                                                                        {{ $recipients->last_name }}
                                                                        {{ $recipients->first_name }}
                                                                        @php
                                                                            $phone = $recipients->phone;
                                                                            if (strlen($phone) == 12) {
                                                                                $phone = substr($phone, 0, 4) . ' ' . substr($phone, 4, 4) . ' ' . substr($phone, 8);
                                                                            }
                                                                            if (strlen($phone) == 11) {
                                                                                $phone = substr($phone, 0, 3) . ' ' . substr($phone, 3, 4) . ' ' . substr($phone, 7);
                                                                            }
                                                                        @endphp
                                                                        ({{ $phone }})
                                                                    </p>
                                                                    <p
                                                                        class="fs-5 mr-4 font-normal me-body-18 text-darkgray">
                                                                        Confirm Booking Date :
                                                                        {{ $recipients->confirm_booking_date != null ? date('d M Y', strtotime($recipients->confirm_booking_date)) : '' }}
                                                                        {{ $recipients->confirm_booking_time != null ? ', ' . $recipients->confirm_booking_time : '' }}
                                                                    </p>
                                                                    <p
                                                                        class="fs-5 mr-4 font-normal me-body-18 text-darkgray">
                                                                        @php
                                                                            //$location = App\Models\MerchantLocation::where('area_id',$recipients->confirm_location)->where('merchant_id',$recipients->product->merchant->id)->first();
                                                                            $location = App\Models\MerchantLocation::select('areas.id', 'areas.name_en')
                                                                                ->join('areas', 'areas.id', 'merchant_locations.area_id')
                                                                                ->where('merchant_id', $recipients->product->merchant->id)
                                                                                ->where('areas.id', $recipients->confirm_location)
                                                                                ->first();
                                                                        @endphp
                                                                        Confirm Booking Location :
                                                                        {{ isset($location) ? $location->name_en : '-' }}
                                                                    </p>
                                                                </div>
                                                                <div class="mb-5">
                                                                    <p
                                                                        class="fs-5 mr-4 font-normal me-body-18 text-darkgray">
                                                                        Add-ons
                                                                    </p>
                                                                    <div id="kt_accordion_3_item_{{ $recipients->id }}"
                                                                        class="fs-6 collapse show ps-10"
                                                                        data-bs-parent="#kt_accordion_3">
                                                                        <ul
                                                                            class="custom-list-style bg-far px-5 py-[10px] rounded-[12px] adds-on-checklist-detailreceipientData{{ $recipients->id }}">
                                                                            @foreach ($recipients->add_on_data as $key => $item)
                                                                                <li data-text="{{ langbind($item, 'name') }}"
                                                                                    data-price="${{ $item->discount_price != null ? $item->discount_price : $item->original_price }}"
                                                                                    class="flex items-center mt-2">
                                                                                    <span
                                                                                        class="mr-4 font-normal me-body-18 text-darkgray">{{ langbind($item, 'name') }}</span>
                                                                                    <span
                                                                                        class="font-normal me-body-18 text-darkgray">${{ $item->discount_price != null ? $item->discount_price : $item->original_price }}</span> @isset($item->code) - <span>{{$item->code}}</span> @endisset
                                                                                    
                                                                                </li>

                                                                            @endforeach
                                                                        </ul>
                                                                    </div>

                                                                </div>
                                                                @if ($recipients->group_data->count() > 0)
                                                                    <div class="mb-5">

                                                                        <div class="accordion-header py-3 d-flex"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#kt_accordion_3_item_{{ $recipients->id }}"
                                                                            style="cursor: pointer;">
                                                                            <span class="accordion-icon">

                                                                                <i class="bi bi-plus-circle fs-2 accordion-icon-on"
                                                                                    style="color:#181c32;"></i>
                                                                            </span>
                                                                            <p class="fs-6 mb-0 ms-4 text-black">Selected
                                                                                Optional Items</p>
                                                                        </div>

                                                                        <div id="kt_accordion_3_item_{{ $recipients->id }}"
                                                                            class="fs-6 collapse show ps-10"
                                                                            data-bs-parent="#kt_accordion_3">
                                                                            <ul
                                                                                class="custom-list-style bg-far px-5 py-[10px] rounded-[12px] adds-on-checklist-detailreceipientData{{ $recipients->id }}">
                                                                                @foreach ($recipients->group_data as $group)
                                                                                    @php
                                                                                        $checkEditOption = [];
                                                                                        foreach ($recipients->group_data as $groupData) {
                                                                                            foreach ($groupData->itemDatas($groupData->id, $recipients->id, $recipients->product->id) as $item) {
                                                                                                $recipientItem = \App\Models\RecipientItem::where('product_id', $recipients->product->id)
                                                                                                    ->where('check_up_group_id', $groupData->id)
                                                                                                    ->where('check_up_item_id', $item->id)
                                                                                                    ->where('recipient_id', $recipients->id)
                                                                                                    ->first();
                                                                                                if(isset($recipientItem) && $recipientItem->edit_status !=null){
                                                                                                    $checkEditOption[] = $groupData->name_en;
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                    @endphp
                                                                                    <div
                                                                                        style="display: flex;
                                                                                            align-items: center;
                                                                                            width: 60%;
                                                                                            justify-content: space-between;
                                                                                            margin-top:10px;">
                                                                                        <h6
                                                                                            style="{{ in_array($group->name_en, $checkEditOption) ? 'color:red;' : '' }}">
                                                                                            {{ $group->name_en }}</h6>
                                                                                        <div
                                                                                            class="d-flex justify-content-center flex-shrink-0">
                                                                                            <a href="#"
                                                                                                data-bs-toggle="modal"
                                                                                                data-bs-target="#ModalEdit{{ $recipients->id }}-{{ $group->id }}"
                                                                                                class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"
                                                                                                data-kt-menu-trigger="click"
                                                                                                data-kt-menu-placement="bottom-end">
                                                                                                <span
                                                                                                    class="svg-icon svg-icon-3">
                                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                        width="24"
                                                                                                        height="24"
                                                                                                        viewBox="0 0 24 24"
                                                                                                        fill="none">
                                                                                                        <path opacity="0.3"
                                                                                                            d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                                                                            fill="currentColor">
                                                                                                        </path>
                                                                                                        <path
                                                                                                            d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                                                                            fill="currentColor">
                                                                                                        </path>
                                                                                                    </svg>
                                                                                                </span>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                    @php
                                                                                        $itemIds = [];
                                                                                    @endphp
                                                                                    @foreach ($group->itemDatas($group->id, $recipients->id, $recipients->product->id) as $item)
                                                                                        @php
                                                                                            array_push($itemIds, $item->id);
                                                                                        @endphp
                                                                                        <div component-name="me-checkout-merchant-recipient-cancerMarkers-detail-list"
                                                                                            class="pl-8 mt-1">
                                                                                            <ul
                                                                                                class="custom-list-style bg-far px-5 py-[10px] rounded-[12px] cancerMarkers-detail-data1-receipientData111">
                                                                                                <li
                                                                                                    class="flex items-center mt-2">
                                                                                                    <span
                                                                                                        class="mr-4 font-normal me-body-18 text-darkgray">{{ $item->name_en }}</span>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    @endforeach
                                                                                    <!--begin::Modal-->
                                                                                    <div class="modal fade text-left"
                                                                                        tabindex="-1"
                                                                                        id="ModalEdit{{ $recipients->id }}-{{ $group->id }}">
                                                                                        <div class="modal-dialog modal-lg">
                                                                                            <div class="modal-content">
                                                                                                <div class="modal-header">
                                                                                                    <h5
                                                                                                        class="modal-title">
                                                                                                        Edit
                                                                                                        {{ $group->name_en }}
                                                                                                        (Need to choose
                                                                                                        {{ $group->minimum_item == null ? 0 : $group->minimum_item }}
                                                                                                        Qty)
                                                                                                    </h5>

                                                                                                    <!--begin::Close-->
                                                                                                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                                                                                                        data-bs-dismiss="modal"
                                                                                                        aria-label="Close">
                                                                                                        <span
                                                                                                            class="svg-icon fs-2x"></span>
                                                                                                    </div>
                                                                                                    <!--end::Close-->
                                                                                                </div>

                                                                                                <div class="modal-body">
                                                                                                    <form method="post"
                                                                                                        id="checkup-modal-edit-form{{ $recipients->id }}-{{ $group->id }}"
                                                                                                        url="/admin/orders-change-optional-items"
                                                                                                        class="form-horizontal">
                                                                                                        <input
                                                                                                            type="hidden"
                                                                                                            name="recipient_id"
                                                                                                            value="{{ $recipients->id }}">
                                                                                                        <input
                                                                                                            type="hidden"
                                                                                                            name="group_id"
                                                                                                            value="{{ $group->id }}">
                                                                                                        <input
                                                                                                            type="hidden"
                                                                                                            name="product_id"
                                                                                                            value="{{ $recipients->product->id }}">
                                                                                                        <div
                                                                                                            class="row mt-2">
                                                                                                            <div
                                                                                                                class="col-md-12">
                                                                                                                @php
                                                                                                                    $checkUpTable = $recipients->product->package->checkupTable;
                                                                                                                    $checkup_Table_Type_Ids = App\Models\CheckUpTableType::where('check_up_table_id', $checkUpTable->id)
                                                                                                                        ->where('check_up_type_id', 2)
                                                                                                                        ->pluck('id')
                                                                                                                        ->toArray();
                                                                                                                    $checkup_Item_Ids = App\Models\CheckTableItem::whereIn('check_up_table_type_id', $checkup_Table_Type_Ids)
                                                                                                                        ->where('check_up_type_id', 2)
                                                                                                                        ->where('check_up_group_id', $group->id)
                                                                                                                        ->pluck('check_up_item_id')
                                                                                                                        ->toArray();
                                                                                                                    $checkup_Items = App\Models\CheckUpItem::whereIn('id', $checkup_Item_Ids)->get();
                                                                                                                @endphp
                                                                                                                <select
                                                                                                                    name="check_up_item_id[]"
                                                                                                                    id="check_up_item_id{{ $recipients->id }}-{{ $group->id }}"
                                                                                                                    class="form-select check-item"
                                                                                                                    data-control="select2"
                                                                                                                    data-placeholder="Select Check Up Items"
                                                                                                                    multiple>
                                                                                                                    <option>
                                                                                                                        @foreach ($checkup_Items as $ikey => $item)
                                                                                                                    <option
                                                                                                                        data-id="{{ $item->equivalent_number }}"
                                                                                                                        value="{{ $item->id }}"
                                                                                                                        {{ in_array($item->id, $itemIds) ? 'selected' : '' }}>
                                                                                                                        {{ $item->name_en }}
                                                                                                                    </option>
                                                                                @endforeach
                                                                                </select>
                                                                                <span
                                                                                    id="check_up_item_id_error{{ $recipients->id }}-{{ $group->id }}"
                                                                                    class="text-danger"
                                                                                    style="display: none"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-auto mt-4">
                                                                        <button type="button"
                                                                            class="btn btn-primary btn-sm btn-edit-submit"
                                                                            data-choose-quantity="{{ $group->minimum_item == null ? 0 : $group->minimum_item }}"
                                                                            data-id="{{ $recipients->id }}-{{ $group->id }}"><i
                                                                                class="bi bi-save"></i>
                                                                            Save
                                                                        </button>
                                                                        <button class="btn btn-secondary btn-sm cancel"
                                                                            type="button" data-bs-dismiss="modal"
                                                                            aria-label="Close">
                                                                            <i class="fa fa-times" aria-hidden="true"></i>
                                                                            Cancel
                                                                        </button>
                                                                    </div>
                                                            </div>

                                                            {{-- <div class="modal-footer"> --}}


                                                            </form>
                                                            {{-- </div> --}}
                                                        </div>
                                                </div>
                                            </div>
                        @endforeach

                        </ul>
                </div>

            </div>
            @endif
            <p class="fs-5 mr-4 font-normal me-body-18 text-darkgray">
                @if ($recipients->variable_id != null)
                    @php $vairableProductName = \App\Models\ProductVariation::find($recipients->variable_id); @endphp
                    @if ($vairableProductName->promotion_price != null)
                        Product Price :
                        ${{ number_format($vairableProductName->promotion_price, 2) }}
                    @elseif($vairableProductName->discount_price != null)
                        Product Price :
                        ${{ number_format($vairableProductName->discount_price, 2) }}
                    @else
                        Product Price :
                        ${{ number_format($vairableProductName->original_price, 2) }}
                    @endif
                @else
                    @if ($recipients->product->promotion_price != null)
                        Product Price :
                        ${{ number_format($recipients->product->promotion_price, 2) }}
                    @elseif($recipients->product->discount_price != null)
                        Product Price :
                        ${{ number_format($recipients->product->discount_price, 2) }}
                    @else
                        Product Price :
                        ${{ number_format($recipients->product->original_price, 2) }}
                    @endif
                @endif


            </p>
            <p class="fs-5 mr-4 font-normal me-body-18 text-darkgray">
                Add-On Price :
                ${{ number_format($recipients->add_on_prices, 2) }}
            </p>
            <p class="fs-5 mr-4 font-normal me-body-18 text-darkgray">
                Total : ${{ number_format($order_item->total, 2) }}
            </p>
            <p class="fs-5 mr-4 font-normal me-body-18 text-darkgray">
                Special Request : {{ $recipients->remark }}
            </p>
            @if ($order_item->order_status == 6 or $order_item->order_status == 7)
                <p class="fs-5 mr-4 font-normal me-body-18 text-darkgray">
                    Refund/Cancel Reason :
                    {{ $order_item->cancel_reason }}
                </p>
            @endif
            @php
                //$location = App\Models\MerchantLocation::where('area_id',$recipients->confirm_location)->where('merchant_id',$recipients->product->merchant->id)->first();
                $request_location = App\Models\MerchantLocation::select('areas.id', 'areas.name_en')
                    ->join('areas', 'areas.id', 'merchant_locations.area_id')
                    ->where('merchant_id', $recipients->product->merchant->id)
                    ->where('areas.id', $recipients->location)
                    ->first();
                //$location = App\Models\MerchantLocation::where('area_id',$recipients->confirm_location)->where('merchant_id',$recipients->product->merchant->id)->first();
                $confirm_location = App\Models\MerchantLocation::select('areas.id', 'areas.name_en')
                    ->join('areas', 'areas.id', 'merchant_locations.area_id')
                    ->where('merchant_id', $recipients->product->merchant->id)
                    ->where('areas.id', $recipients->confirm_location)
                    ->first();

            @endphp
            {{-- <p class="fs-5 mr-4 font-normal me-body-18 text-darkgray">
                                                                Request Booking Location :
                                                                {{ isset($request_location) ? $request_location->name_en : 'Decide Later' }}
                                                                </p> --}}
            {{-- {{dd($recipients->location,$recipients->product->merchant->merchantLocations->where('area_id',3)->first()->events)}} --}}
            <form action="" id="saveOrderItem{{ $recipients->id }}">
                <input type="hidden" name="recipient_id" value="{{ $recipients->id }}">
                <input type="hidden" name="order_item_id" value="{{ $order_item->id }}">
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Request Booking Date
                            :</label>
                        <label for="">
                            @if ($recipients->edit_date == 1)
                                <b style="color:red">{{ isset($recipients->date) ? $recipients->date : '-' }}</b>
                            @else
                                {{ isset($recipients->date) ? $recipients->date : '-' }}
                            @endif
                        </label>
                    </div>
                    <div class="col-md-4">
                        <label for="">Request Booking Time
                            :</label>
                        <label for="">
                            @if ($recipients->edit_time == 1)
                                <b style="color:red">{{ isset($recipients->time) ? $recipients->time : '-' }}</b>
                            @else
                                {{ isset($recipients->time) ? $recipients->time : '-' }}
                            @endif
                    </div>
                    <div class="col-md-4">
                        <label for="">Request Booking Location
                            :</label>
                        <label for="">
                            @if ($recipients->edit_location == 1)
                                <b
                                    style="color:red">{{ isset($request_location) ? $request_location->name_en : 'Decide Later' }}</b>
                            @else
                                {{ isset($request_location) ? $request_location->name_en : 'Decide Later' }}
                            @endif
                        </label>
                    </div>
                    <div class="col-md-4">
                        <label for="">Confirm Booking Date
                            :</label>
                        <label
                            for="">{{ isset($recipients->confirm_booking_date) ? $recipients->confirm_booking_date : '-' }}</label>
                    </div>
                    <div class="col-md-4">
                        <label for="">Confirm Booking Time
                            :</label>
                        @php
                            $timeString = '-';
                            if (isset($recipients->confirm_booking_time)) {
                                $time = $recipients->confirm_booking_time;
                                $subTime = substr($time, 0, 2);
                                if ((int) $subTime > 12) {
                                    $subTime = (int) $subTime - 12;
                                    $timeString = $subTime . ':' . substr($time, 3) . ' PM';
                                } else {
                                    $timeString = substr($time, 0, 2) . ':' . substr($time, 3) . ' AM';
                                }
                            }
                        @endphp
                        <label for="">{{ $timeString }}</label>
                    </div>
                    <div class="col-md-4">
                        <label for="">Confirm Booking Location
                            :</label>
                        <label for="">{{ isset($confirm_location) ? $confirm_location->name_en : '-' }}</label>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Booking Confirm Date</label>
                        <input type="date" class="form-control" name="date"
                            value="{{ isset($recipients->confirm_booking_date) ? $recipients->confirm_booking_date : '' }}">
                    </div>
                    <div class="col-md-6">
                        <label for="">Booking Confirm Time</label>
                        <input type="time" class="form-control" name="time"
                            value="{{ isset($recipients->confirm_booking_time) ? $recipients->confirm_booking_time : '' }}">
                    </div>
                </div><br>
                {{-- <input type="hidden" name="comfirm_date" value="{{$recipients->date}}"> --}}
                <div class="row">
                    <div class="col-md-6">

                        <label for="">Booking Status</label>
                        <select class="form-select form-select-lg mb-3" name="order_status"
                            aria-label="Default select order status" data-payment-status={{ $order->payment_status }}>
                            <option disabled selected>-- select an order
                                status --</option>
                            @foreach (config('mediq.booking_status_en') as $key => $orderStatus)
                                <option value="{{ $key }}"
                                    {{ $order_item->order_status == $key ? 'selected' : '' }}>
                                    {{ $orderStatus }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Location</label>
                        @php
                            $product = App\Models\Product::find($recipients->product_id);
                            $location = App\Models\MerchantLocation::select('areas.id', 'areas.name_en')
                                ->join('areas', 'areas.id', 'merchant_locations.area_id')
                                ->where('merchant_id', $product->merchant->id)
                                ->get();
                        @endphp
                        <select class="form-select form-select-lg mb-3" name="confirm_location"
                            aria-label="Default select order status">
                            <option disabled selected>-- select location
                                --</option>
                            @foreach ($location as $value)
                                <option value="{{ $value['id'] }}"
                                    {{ isset($recipients->confirm_location) ? ($value['id'] == $recipients->confirm_location ? 'selected' : '') : '' }}>
                                    {{ $value['name_en'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row refundAmount {{ $order_item->order_status == 7 ? '' : 'hidden' }}">
                    <div class="col-md-6">
                        <label for="">Refund Amount</label>
                        <input type="hidden" name="originalAmount" value="{{ $order_item->total }}">
                        <input type="number" name="refundAmount" class="form-control"
                            value="{{ $order_item->refund_amount == null ? 0 : $order_item->refund_amount }}"
                            {{ $order_item->order_status == 7 ? 'disabled' : '' }}>
                    </div>
                </div>
                <br />
                <button type="button" onclick="submitOrderStatus({{ $recipients->id }})"
                    class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@empty
    <p>No data...</p>
    @endforelse

    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    @endforeach
    @endif

    <div class="row">
        <div class="col-md-12 p-5">
            <div class="card">
                <div class="card-header bg-light">
                    <h3 class="card-title">Billing Information</h3>
                </div>
                <div class="card-body">
                    <p> Mail Receipt : @if ($billing)
                            Yes
                        @else
                            No
                        @endif
                    </p>

                    <p> Name on Receipt : {{ $billing->name ?? '' }} </p>

                    <p> Address : {{ $billing->address ?? '' }}</p>

                    <p> Speciali Request on Receipt : {{ $billing->special_request ?? '' }} </p>

                    <p>
                    <form action="" id="savePaymentStatus">
                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                        <div class="row">
                            @if ($order->payslip != null)
                                <a href="{{ asset('storage/orders/' . $order->payslip) }}" target="_blank"
                                    class="font-normal me-body-18 text-darkgray mt-2 underline">Check
                                    Payment Record / Payslip</a>
                            @endif
                        </div><br>
                        <div class="row">
                            <div class="col-md-6">
                                <select class="form-select form-select-lg mb-3" name="payment_status"
                                    aria-label="Default select payment status">
                                    <option disabled selected>-- select an payment status --</option>
                                    @foreach (config('mediq.payment_status_en') as $key => $orderStatus)
                                        <option value="{{ $key }}"
                                            {{ $order->payment_status == $key ? 'selected' : '' }}>
                                            {{ $orderStatus }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select class="form-select form-select-lg mb-3" name="payment_method"
                                    aria-label="Default select payment method">
                                        <option disabled selected value="">-- select payment method --</option>
                                        <option value="Payme" {{ $order->payment_method == "Payme" ? 'selected' : '' }}>Payme</option>
                                        <option value="FPS/轉數快" {{ $order->payment_method == "FPS/轉數快" ? 'selected' : '' }}>FPS/轉數快</option>
                                        <option value="Bank Transfer/銀行轉帳" {{ $order->payment_method == "Bank Transfer/銀行轉帳" ? 'selected' : '' }}>Bank Transfer/銀行轉帳</option>
                                        <option value="WeChat Pay/微信支付" {{ $order->payment_method == "WeChat Pay/微信支付" ? 'selected' : '' }}>WeChat Pay/微信支付</option>
                                        <option value="Other/其他" {{ $order->payment_method == "Other/其他" ? 'selected' : '' }}>Other/其他</option>
                                </select>
                            </div>
                        </div>

                        <button type="button" onclick="submitPaymentStatus({{ $order->id }})"
                            class="btn btn-primary">Update</button>
                        <a href="{{ route('order.details.download',['id'=>$order->id]) }}" download
                                class="btn btn-primary">Download e-Receipt</a>
                    </form>
                    </p>
                </div>

            </div>

        </div>
    </div>

    </div>
    </div>

    {{-- <div class="col-md-12">
        <div class="card mb-5">
            <div class="card-header mt-5">
                <h4>Order {{ $order->id }}</h4>
                <h4>Date {{ $order->created_at }}</h4>
            </div>
            <div class="card-body">
                <h3 class="card-title">Payment Info</h3>
                <div class="row mt-5">

                    <div class="col-md-12">

                        <p class="">Total Amount - HK$ {{ $order->grand_total }}</p>
                    </div>

                </div>
            </div>
        </div>
        @foreach ($order_items as $order_item)
            <div class="card shadow-sm mt-4">
                <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse"
                    data-bs-target="#kt_docs_card_collapsible{{ $order_item->id }}">
                    <h4 class="card-title">{{ isset($order_item->product) ? $order_item->product->name_en : '' }}</h4>
                    <div class="card-toolbar rotate-180">
                        <i class="bi bi-caret-up fs-1"></i>
                    </div>
                </div>
                <div id="kt_docs_card_collapsible{{ $order_item->id }}" class="collapse show">
                    <div class="card-body">
                        <p>Customer Name : {{ $order_item->recipient->first_name }}
                            {{ $order_item->recipient->last_name }}</p>
                        <p>Date : {{ $order_item->recipient->date }}</p>
                        <p>Time : {{ $order_item->recipient->first_name }} {{ $order_item->recipient->last_name }}</p>
                        
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="kt_accordion_1_header_1">
                                <button class="accordion-button fs-4 fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_1"
                                    aria-expanded="true" aria-controls="kt_accordion_1_body_1">
                                    Add-on Items
                                </button>
                            </h2>
                            <div id="kt_accordion_1_body_1" class="accordion-collapse collapse show"
                                aria-labelledby="kt_accordion_1_header_1" data-bs-parent="#kt_accordion_1">
                                <div class="accordion-body">
                                    @if (count($order_item->recipient->add_on_data) > 0)
                                        @foreach ($order_item->recipient->add_on_data as $item)
                                            <ul>
                                                <li> {{ $item->name_en }} </li>
                                            </ul>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <p>
                            Total : HK$ {{ $order_item->total }}
                        </p>
                        <p>{{ $order_item->district_id }}</p>
                    </div>
                    <div class="card-footer">
                        <i class="bi bi-geo-alt"></i> {{ $order_item->recipient->area->name_en }}
                    </div>
                </div>
            </div>
        @endforeach

    </div> --}}
    </div>
    <div compnent-name="me-checkout-complete-loading" id="me-checkout-complete-loading"
        class="me-checkout-complete-loading-container">
        <div
            class="me-checkout-complete-loading-content p-10 py-5 rounded-[12px] sm:w-[300px] w-[250px] h-[140px] absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-whitez flex justify-center items-center">
            <div class="relative w-full">
                <div class="me-checkout-complete-loading">

                </div>
            </div>
        </div>
    </div>
    <style>
        .me-checkout-complete-loading {
            width: 197px;
            height: 60px;
            position: relative;
            /* // background-image: url(../img/mediQLoading.svg);
                    // background-image: url(../img/loading1.svg); */
            background-repeat: no-repeat;
            //transition: all .3s;
            animation: changeImages 4s infinite 1s ease-in-out;
            animation: name duration timing-function delay iteration-count direction fill-mode;
            background-position: center;
            margin: 0 auto;
            background-size: cover;

            @media screen and (max-width:571px) {
                background-size: contain;
            }
        }

        @keyframes changeImages {
            0% {
                /* background-image: url(../../frontend/img/loading1.svg); */
            }

            15% {
                /* background-image: url(../../frontend/img/loading2.svg); */
            }

            30% {
                /* background-image: url(../../frontend/img/loading3.svg); */
            }

            45% {
                /* background-image: url(../../frontend/img/loading4.svg); */
            }

            60% {
                /* background-image: url(../../frontend/img/loading5.svg); */
            }

            75% {
                /* background-image: url(../../frontend/img/loading6.svg); */
            }

            90% {
                /* background-image: url(../../frontend/img/loading7.svg); */
            }

            100% {
                /* background-image: url(../../frontend/img/loading8.svg); */
            }
        }

        .me-checkout-complete-loading-container {
            opacity: 1;
            z-index: -1;
            position: absolute;
            overflow: hidden;

            .me-checkout-complete-loading-content {
                height: 0;
            }

            &.show {
                background: linear-gradient(0deg, rgba(0, 0, 0, .2), rgba(0, 0, 0, .2));
                background-repeat: no-repeat;
                z-index: 1001;
                position: fixed;
                left: 0;
                right: 0;
                top: 0;
                bottom: 0;
                height: 100%;

                .me-checkout-complete-loading-content {
                    height: 140px;
                    padding: 1.25rem 20px;

                    @media screen and (max-width:571px) {
                        height: 130px;
                    }
                }
            }
        }

        .highlight {
            background-color: 'yellow';
        }

        input[type="time"] {
            position: relative;
            padding: 10px;
        }

        input[type="time"]::-webkit-calendar-picker-indicator {
            color: transparent;
            background: none;
            z-index: 1;
        }

        input[type="time"]:before {
            background: none;
            display: block;
            content: '';
            width: 15px;
            height: 20px;
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            color: #999;
            background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMzIiIGhlaWdodD0iMzIiIHZpZXdCb3g9IjAgMCAzMiAzMiI+CjxwYXRoIGQ9Ik0gMTYgNCBDIDkuMzgyODEzIDQgNCA5LjM4MjgxMyA0IDE2IEMgNCAyMi42MTcxODggOS4zODI4MTMgMjggMTYgMjggQyAyMi42MTcxODggMjggMjggMjIuNjE3MTg4IDI4IDE2IEMgMjggOS4zODI4MTMgMjIuNjE3MTg4IDQgMTYgNCBaIE0gMTYgNiBDIDIxLjUzNTE1NiA2IDI2IDEwLjQ2NDg0NCAyNiAxNiBDIDI2IDIxLjUzNTE1NiAyMS41MzUxNTYgMjYgMTYgMjYgQyAxMC40NjQ4NDQgMjYgNiAyMS41MzUxNTYgNiAxNiBDIDYgMTAuNDY0ODQ0IDEwLjQ2NDg0NCA2IDE2IDYgWiBNIDE1IDggTCAxNSAxNyBMIDIyIDE3IEwgMjIgMTUgTCAxNyAxNSBMIDE3IDggWiI+PC9wYXRoPgo8L3N2Zz4=);
            background-size: 115%;
            background-position: right;
            background-repeat: no-repeat;
        }

        input[type="date"] {
            position: relative;
            padding: 10px;
        }

        input[type="date"]::-webkit-calendar-picker-indicator {
            color: transparent;
            background: none;
            z-index: 1;
        }

        input[type="date"]:before {
            color: transparent;
            background: none;
            display: block;
            content: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 24 24"><path fill="%23bbbbbb" d="M20 3h-1V1h-2v2H7V1H5v2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 18H4V8h16v13z"/></svg>');
            width: 15px;
            height: 20px;
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            color: #999;
        }
    </style>
@endsection
@push('scripts')
    <script>
        function submitOrderStatus(item_id) {
            let formData = $("#saveOrderItem" + item_id).serialize();
            let form = new FormData(document.getElementById("saveOrderItem" + item_id));
            let refundAmount = form.get("refundAmount");
            let originalAmount = form.get("originalAmount");
            if (refundAmount > Math.floor(originalAmount)) {
                alert('Refund amount does not exceed the price.')
                return false;
            }
            saveData("{{ route('order.saveOrderItemStatus') }}", formData);
        }

        function saveData(url, formData, action = null) {

            $.ajax({
                type: 'POST',
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: formData,
                // async: false, // open new tab 
                beforeSend: function() {
                    $(".me-checkout-complete-loading-container").toggleClass("show")
                    $("body").addClass("overflow-hidden");
                },
                success: function(response) {
                    if (response.status == 200) {
                        toastr.success('Successfully updated')
                        location.reload()
                    }
                },
                complete: function() {
                    $(".me-checkout-complete-loading-container").removeClass("show")
                    $("body").removeClass("overflow-hidden");
                }
            })
        }

        function submitPaymentStatus() {
            let formData = $("#savePaymentStatus").serialize();
            saveData("{{ route('order.savePaymentStatus') }}", formData);
        }

        $("select[name='order_status']").on("change", function() {
            let payment_status = $(this).attr("data-payment-status");
            if ($(this).val() == 7) {
                if (payment_status == 1) {
                    $(".refundAmount").removeClass("hidden")
                }
            } else {
                $(".refundAmount").addClass("hidden")
            }
        });

        $(document).ready(function() {
            $('.check-item').select2();
            $(".btn-edit-submit").on("click", function() {
                $("#check_up_item_id_error" + $(this).attr("data-id")).css("display", "none");
                let errorStatus = false;
                let totalQty = 0;

                let tempData = $("#check_up_item_id" + $(this).attr("data-id")).select2('data');
                tempData.forEach(function(e) {
                    // console.log(e.element.attributes[0].nodeValue);
                    totalQty += parseInt(e.element.attributes[0].nodeValue);
                })
                if (parseInt($(this).attr("data-choose-quantity")) != 0 && $("#check_up_item_id" + $(this)
                        .attr("data-id")).val().length == 0) {
                    $("#check_up_item_id_error" + $(this).attr("data-id")).html(
                        "Checkup Item need to choose.");
                    $("#check_up_item_id_error" + $(this).attr("data-id")).css("display", "block");
                    errorStatus = true;
                } else {
                    if (parseInt($(this).attr("data-choose-quantity")) != 0 && parseInt(totalQty) !=
                        parseInt($(this).attr("data-choose-quantity"))) {
                        $("#check_up_item_id_error" + $(this).attr("data-id")).html(
                            "Checkup items need to be chosen in " + $(this).attr(
                                "data-choose-quantity") + " Qty.");
                        $("#check_up_item_id_error" + $(this).attr("data-id")).css("display", "block");
                        errorStatus = true;
                    }
                }
                // console.log(typeof(totalQty))
                // console.log(totalQty)
                // console.log(typeof(parseInt($(this).attr("data-choose-quantity"))))
                // console.log(parseInt($(this).attr("data-choose-quantity")))
                if (errorStatus == false) {
                    let formData = $("#checkup-modal-edit-form" + $(this).attr("data-id")).serialize();
                    saveData("{{ route('order.changeOrderOptionalItems') }}", formData);
                }
            });
            $(".cancel").on("click", function() {
                $("#check_up_item_id_error" + $(this).attr("data-id")).html("");
                $("#check_up_item_id_error" + $(this).attr("data-id")).css("display", "none");
                //$("#check_up_item_id_error"+$(this).attr("data-id")).val(null).trigger('change');
            });
        });
    </script>
@endpush

<div class="row">
    <div class="row mb-5">
        <div class="col-md-8">
            <h3 class="card-title">
                @if ($formMode == 'edit')
                Edit Coupon
                @else
                Add New Coupon
                @endif
            </h3>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="float-end">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card"></i> Save</button>
                    <a href="{{ url('admin/coupon') }}" title="Back"><button type="button"
                            class="btn btn-secondary btn-sm cancel"><i class="bi bi-x" aria-hidden="true"></i>
                            Cancel</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div style="border-bottom: 1px solid #E5EAEE;">
                <ul class="nav nav-tabs bg-white">
                    @foreach (config('lng.lng') as $lngcode => $lng)
                    <li class="nav-item">
                        <a onclick="showHideDescription('{{ strtolower($lngcode) }}')"
                            href="#{{ strtolower($lngcode) }}-tab" data-toggle="tab"
                            class="nav-link {{ $lngcode == 'EN' ? 'active' : '' }} nav_link">
                            <span class="d-sm-none">{{ $lng }}</span>
                            <span class="d-sm-block d-none">{{ $lng }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="card-body">
                <div class="card-body content-body">
                    <div class="tab-content">
                        @foreach (config('lng.attr') as $lngcode => $attr)
                        <div class="tab-pane fade {{ $attr == 'en' ? 'active show' : '' }}"
                            id="{{ strtolower($lngcode) }}-tab">
                            @if($attr == 'en')
                            <div class="form-group mb-5 col-md-6">
                                {!! Form::label('coupon_code', 'Coupon Code', ['class' => 'form-label required']) !!}
                                {!! Form::text(
                                'coupon_code',
                                null,
                                'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                ) !!}
                                {!! $errors->first('coupon_code', '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                            @endif
                            <div class="form-group col-md-6 mb-5{{ $errors->has('name_' . $attr) ? 'has-error' : '' }}">
                                {!! Form::label('name_' . $attr, 'Name' . ' (' . $lngcode . ')', ['class' => 'form-label
                                required']) !!}
                                {!! Form::text(
                                'name_' . $attr,
                                null,
                                'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                ) !!}
                                {!! $errors->first('name_' . $attr, '<p class="help-block text-danger">:message</p>')
                                !!}
                            </div>
                            <div class="form-group col-md-6 mb-5{{ $errors->has('sub_title_' . $attr) ? 'has-error' : '' }}">
                                {!! Form::label('sub_title_' . $attr, 'Sub Title' . ' (' . $lngcode . ')', ['class' =>
                                'form-label']) !!}
                                {!! Form::text(
                                'sub_title_' . $attr,
                                null,
                                'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                ) !!}
                                {!! $errors->first('sub_title_' . $attr, '<p class="help-block text-danger">:message</p>
                                ') !!}
                            </div>
                            <div class="form-group col-md-6 mb-5{{ $errors->has('content_' . $attr) ? 'has-error' : '' }}">
                                {!! Form::label('content_' . $attr, 'Content' . ' (' . $lngcode . ')', ['class' =>
                                'form-label']) !!}
                                {!! Form::textarea(
                                'content_' . $attr,
                                null,
                                'required' == 'required' ? ['class' => 'form-control editor'] : ['class' =>
                                'form-control editor'],
                                ) !!}
                                {!! $errors->first('content_' . $attr, '<p class="help-block text-danger">:message</p>')
                                !!}
                            </div>
                        </div>
                        @endforeach
                        @if(Request::get('coupon_type') != null)
                        <input type="hidden" name="coupon_type" value="{{Request::get('coupon_type') == 'birthday' ? 0 : 1}}">
                        <input type="hidden" name="owner_type" value="0">
                        @else
                        <div class="form-group col-md-6 mb-5">
                            <label for="owner_type" class="mb-3 required">Coupon Type</label><br>
                            @foreach (config('mediq.owner_type') as $key => $owner)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input owner_type" type="radio" name="owner_type" value="{{ $key }}" id="inlineRadio{{ $key }}" onclick="ownerType({{ $key }})" 
                                {{isset($coupon) && $coupon->owner_type == $key ? 'checked' : ''}} required>
                                <label class="form-check-label" for="inlineRadio{{ $key }}">{{ $owner }}</label>
                            </div>
                            @endforeach
                        </div>

                        <div class="form-group col-md-6 mb-5 merchant">
                            <label for="merchant_id" class="required">Merchant</label>
                            <select class="form-select mb-5 merchant_id" name="merchant_id" data-control="select2"
                                onchange="merchantData()" data-placeholder="Select an option">
                                <option></option>
                                @if (count($merchants) > 0)
                                @foreach ($merchants as $item)
                                <option value="{{ $item->id }}"
                                    {{ isset($coupon) && $item->id == $coupon->merchant_id ? 'selected' : '' }}>
                                    {{ $item->name_en }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        @endif
                        <div class="form-group col-md-6 mb-5 {{Request::get('coupon_type') == null ? 'owner_logo' : ''}}">
                            <label for="icon">Coupon Logo</label>
                            <div id="holder-icon">
                                @if (!empty($coupon->icon))
                                <div class='lfmimage-container iconlfmc0'>
                                    <img src="{{ asset($coupon->icon) }}" class='lfmimage w-100' style="height: 20rem;">
                                    <div>
                                        <button type="button" onclick="removeImage('icon',0)"
                                            class='btn btn-sm btn-danger w-100'>Remove</button>
                                    </div>
                                </div>
                                @else
                                <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                                @endif
                            </div>
                            <div class="input-group mt-3">
                                <span class="input-group-btn">
                                    <a id="lfm-icon" data-input="icon" data-preview="holder-icon"
                                        class="btn btn-primary text-white lfm-img">
                                        <i class="bi bi-image-fill me-2"></i>Select File
                                    </a>
                                </span>
                                <input id="icon" class="form-control" type="text" name="icon"
                                    value="{{ isset($coupon) ? $coupon->icon : '' }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-header card-header-stretch">
                <h3 class="card-title">Coupon Data</h3>
                <div class="card-toolbar">
                    <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_1"> General</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_2">Usage Restrations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_3">Usage Limits</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <label for="discount_type">Discount Type</label>
                                <select class="form-select" name="discount_type" data-control="select2"
                                    data-placeholder="Select an option">
                                    <option></option>
                                    @if (count(config('mediq.coupon_discount_types')) > 0)
                                    @foreach (config('mediq.coupon_discount_types') as $key => $item)
                                    <option value="{{ $key }}"
                                        {{ isset($coupon) && $coupon->discount_type == $key ? 'selected' : '' }}>
                                        {{ $item }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="discount_type" class="required">Coupon Amount</label>
                                <input type="number" name="coupon_amount" class="form-control"
                                    value="{{ isset($coupon) ? $coupon->coupon_amount : '' }}">
                            </div>
                        </div>
                        <div class="row mb-5 is_required_date" hidden>
                            <div class="col-md-6">
                                <label for="start_date" class="required">Start Date</label>
                                <input type="datetime-local" name="start_date" class="form-control start_date"
                                    value="{{ isset($coupon) ? $coupon->start_date : '' }}">
                            </div>
                            <div class="col-md-6">
                                <label for="end_date" class="required">End Date</label>
                                <input type="datetime-local" name="end_date" class="form-control end_date"
                                    value="{{ isset($coupon) ? $coupon->end_date : '' }}">
                            </div>
                        </div>
                        {{-- <div class="row mb-5">
                            <div class="col-md-6">
                                 <label for="coupon_code">Coupon Code</label>
                                 <input type="text" name="coupon_code" class="form-control" value="{{isset($coupon) ? $coupon->coupon_code : ''}}">
                    </div>
                </div> --}}

            </div>

            <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
                <div class="row mb-5">
                    <label for="minimum_spend">Minimum Spend</label>
                    <input type="number" name="minimum_spend" class="form-control"
                        value="{{ isset($coupon) ? $coupon->minimum_spend : '' }}">
                    {{-- <div class="col-md-6">
                        <label for="maximum_spend">Maximum Spend</label>
                        <input type="number" name="maximum_spend" class="form-control"
                            value="{{ isset($coupon) ? $coupon->maximum_spend : '' }}">
                </div> --}}
            </div>
            <div class="row mb-5">
                <label for="product_categories" class="control-label required">Main Categories</label>
                <select name="product_categories[]" class="form-select form-select-lg product_cate"
                    onchange="mainCate()" data-placeholder="Select an option" data-allow-clear="true"
                    multiple="multiple">
                    <option></option>
                    @if (count($categories) > 0)
                    @foreach ($categories as $item)
                    <option value="{{ $item->id }}"
                        {{ isset($coupon) &&in_array($item->id,$coupon->couponCategories()->pluck('category_id')->toArray())? 'selected': '' }}>
                        {{ $item->name_en }}</option>
                    @endforeach
                    @endif
                </select>
            </div>
            <div class="row mb-5">
                <label for="product_sub_categories">Sub Categories</label>
                <select name="product_sub_categories[]" class="form-select form-select-lg proSubCate" id="inc_category"
                    onchange="subCate()" data-placeholder="Select an option" data-allow-clear="true"
                    multiple="multiple">
                    <option></option>
                    @if (count($subCategories) > 0)
                    @foreach ($subCategories as $item)
                    @if ($formMode == 'edit')
                    @php
                    $attrCate = $coupon
                    ->couponCategories()
                    ->pluck('category_id')
                    ->toArray();
                    $cates_id = App\Models\Category::whereIn('id', $attrCate)
                    ->pluck('id')
                    ->toArray();
                    @endphp
                    @if (count($cates_id) > 0 && in_array($item->category_id, $cates_id))
                    <option class="sub_cate{{ $item->category_id }}" value="{{ $item->id }}"
                        {{ in_array($item->id,$coupon->couponSubCategories()->pluck('sub_category_id')->toArray())? 'selected': '' }}>
                        {{ $item->name_en }}</option>
                    @elseif(count($cates_id) == 0)
                    <option class="sub_cate{{ $item->category_id }}" value="{{ $item->id }}"
                        {{ in_array($item->id,$coupon->couponSubCategories()->pluck('sub_category_id')->toArray())? 'selected': '' }}>
                        {{ $item->name_en }}</option>
                    @endif
                    @endif
                    @if ($formMode == 'create')
                    <option class="sub_cate{{ $item->category_id }}" value="{{ $item->id }}"> {{ $item->name_en }}
                    </option>
                    @endif
                    @endforeach
                    @endif
                </select>
            </div>
            <div class="row mb-5">
                <label for="exclude_sub_categories">Exclude Sub Categories</label>
                <select name="exclude_sub_categories[]" class="form-select form-select-lg" id="exc_category"
                    data-placeholder="Select an option" data-allow-clear="true" multiple="multiple">
                    <option></option>
                    @if (count($subCategories) > 0)
                    @foreach ($subCategories as $item)
                    @if ($formMode == 'edit')
                    @php
                    $attrCate = $coupon
                    ->couponCategories()
                    ->pluck('category_id')
                    ->toArray();
                    $cates_id = App\Models\Category::whereIn('id', $attrCate)
                    ->pluck('id')
                    ->toArray();
                    $selected = '';
                    $hidden = '';
                    if (
                    in_array(
                    $item->id,
                    $coupon
                    ->couponSubCategories()
                    ->pluck('sub_category_id')
                    ->toArray(),
                    )
                    ) {
                    $selected = 'selected';
                    }
                    if (
                    in_array(
                    $item->id,
                    $coupon
                    ->couponSubCategories()
                    ->pluck('sub_category_id')
                    ->toArray(),
                    )
                    ) {
                    $hidden = 'hidden';
                    }
                    @endphp

                    @if (count($cates_id) > 0 && in_array($item->category_id, $cates_id))
                    <option class="sub_cate{{ $item->category_id }}" value="{{ $item->id }}" {{ $selected }}
                        {{ $hidden }}> {{ $item->name_en }}</option>
                    @elseif(count($cates_id) == 0)
                    <option class="sub_cate{{ $item->category_id }}" value="{{ $item->id }}" {{ $selected }}
                        {{ $hidden }}> {{ $item->name_en }}</option>
                    @endif
                    @endif

                    @if ($formMode == 'create')
                    <option class="sub_cate{{ $item->category_id }}" value="{{ $item->id }}"> {{ $item->name_en }}
                    </option>
                    @endif
                    @endforeach
                    @endif
                </select>
            </div>
            <div class="row mb-5">
                <label for="product_ids">Products</label>
                <select name="product_ids[]" class="form-select form-select-lg product_ids" id="inc_product"
                    onchange="productData()" data-placeholder="Select an option" data-allow-clear="true"
                    multiple="multiple">
                    {{-- <option></option> --}}
                    @if (count($products) > 0)
                    @foreach ($products as $item)
                    @if ($formMode == 'edit')
                    @php
                    $selected = '';
                    if (
                    in_array(
                    $item->id,
                    $coupon
                    ->couponProducts()
                    ->pluck('product_id')
                    ->toArray(),
                    )
                    ) {
                    $selected = 'selected';
                    }
                    $cates = $coupon
                    ->couponCategories()
                    ->pluck('category_id')
                    ->toArray();

                    $arrAttrCate = isset($coupon)
                    ? $coupon
                    ->couponSubCategories()
                    ->pluck('sub_category_id')
                    ->toArray()
                    : [];

                    $is_sub_cat = App\Models\SubCategory::whereIn('id', $arrAttrCate)
                    ->pluck('id')
                    ->toArray();
                    @endphp
                    @if ($coupon->merchant_id == null && count($is_sub_cat) > 0 && in_array($item->sub_category_id,
                    $is_sub_cat))
                    <option class="product{{ $item->id }}" value="{{ $item->id }}" {{ $selected }}>
                        {{ $item->name_en }}</option>
                    @elseif(
                    $coupon->merchant_id != null &&
                    $item->merchant_id == $coupon->merchant_id &&
                    in_array($item->category_id, $cates) &&
                    count($is_sub_cat) > 0 &&
                    in_array($item->sub_category_id, $is_sub_cat))
                    <option class="product{{ $item->id }}" value="{{ $item->id }}" {{ $selected }}>
                        {{ $item->name_en }}</option>
                    @elseif(in_array($item->category_id, $cates) && count($is_sub_cat) == 0)
                    <option class="product{{ $item->id }}" value="{{ $item->id }}" {{ $selected }}>
                        {{ $item->name_en }}</option>
                    @endif
                    @endif

                    @if ($formMode == 'create')
                    <option class="product{{ $item->id }}" value="{{ $item->id }}">
                        {{ $item->name_en }}</option>
                    @endif
                    @endforeach
                    @endif
                </select>
            </div>
            <div class="row mb-5">
                <label for="exclude_products">Exclude Products</label>
                <select name="exclude_products[]" class="form-select form-select-lg" id="exc_product"
                    data-placeholder="Select an option" data-allow-clear="true" multiple="multiple">
                    {{-- <option></option> --}}
                    @if (count($products) > 0)
                    @foreach ($products as $item)
                    @if ($formMode == 'edit')
                    @php
                    $selected = '';
                    $hidden = '';
                    if ($coupon->is_checked_exproduct == 1) {
                    if (
                    in_array(
                    $item->id,
                    $coupon
                    ->couponProducts()
                    ->pluck('ex_product_id')
                    ->toArray(),
                    )
                    ) {
                    $selected = 'selected';
                    }
                    }
                    if (
                    in_array(
                    $item->id,
                    $coupon
                    ->couponProducts()
                    ->pluck('product_id')
                    ->toArray(),
                    )
                    ) {
                    $hidden = 'hidden';
                    }
                    $cates = $coupon
                    ->couponCategories()
                    ->pluck('category_id')
                    ->toArray();

                    $proArr = $coupon
                    ->couponSubCategories()
                    ->pluck('sub_category_id')
                    ->toArray();

                    $pro_sub_cate_ids = App\Models\Product::whereIn('sub_category_id', $proArr)
                    ->pluck('sub_category_id')
                    ->toArray();

                    @endphp

                    @if (
                    $coupon->merchant_id == null &&
                    count($pro_sub_cate_ids) > 0 &&
                    in_array($item->sub_category_id, $pro_sub_cate_ids) &&
                    in_array($item->id, $cates))
                    <option class="product{{ $item->id }}" value="{{ $item->id }}" {{ $selected }} {{ $hidden }}>
                        {{ $item->name_en }}</option>
                    @elseif(
                    $coupon->merchant_id != null &&
                    $item->merchant_id == $coupon->merchant_id &&
                    in_array($item->id, $cates) &&
                    count($pro_sub_cate_ids) > 0 &&
                    in_array($item->sub_category_id, $pro_sub_cate_ids))
                    <option class="product{{ $item->id }}" value="{{ $item->id }}" {{ $selected }} {{ $hidden }}>
                        {{ $item->name_en }}</option>
                    @elseif(in_array($item->category_id, $cates) && count($is_sub_cat) == 0)
                    <option class="product{{ $item->id }}" value="{{ $item->id }}" {{ $selected }} {{ $hidden }}>
                        {{ $item->name_en }}</option>
                    @endif
                    @endif

                    @if ($formMode == 'create')
                    <option class="product{{ $item->id }}" value="{{ $item->id }}">
                        {{ $item->name_en }}</option>
                    @endif
                    @endforeach
                    @endif
                </select>
            </div>
        </div>

        <div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel">
            <div class="row mb-5 usage_time">
                <div class="col-md-12">
                    <label for="usage_time">No. of Valid Days After Collected</label>
                    <input type="number" name="usage_time" class="form-control"
                        value="{{ isset($coupon) ? $coupon->usage_time : '' }}">
                </div>
                {{-- <div class="col-md-6">
                    <label for="pick_up_limit">Pick Up Limit</label>
                    <input type="number" name="pick_up_limit" class="form-control" 
                        value="{{ isset($coupon) ? $coupon->pick_up_limit : '' }}">
                </div> --}}
            </div>

            <div class="row mb-5">
                <div class="col-md-6">
                    <label for="usage_limit_per_coupon">Usage Limit Per Coupon</label>
                    <input type="number" name="usage_limit_per_coupon" class="form-control"
                        value="{{ isset($coupon) ? $coupon->usage_limit_per_coupon : '' }}">
                </div>
                <div class="col-md-6">
                    <label for="usage_limit_per_member">Usage Limit Per Member</label>
                    <input type="number" name="usage_limit_per_member" class="form-control"
                        value="{{ isset($coupon) ? $coupon->usage_limit_per_member : '' }}">
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-6">
                    <label for="product_limit_type">Product Limit Type</label>
                    <select class="form-select" name="product_limit_type" data-control="select2"
                        data-placeholder="Select an option">
                        <option disabled>--Select--</option>
                        @if (count(config('mediq.product_limit_types')) > 0)
                        @foreach (config('mediq.product_limit_types') as $key => $item)
                        <option value="{{ $key }}"
                            {{ isset($coupon) && $coupon->product_limit_type == $key ? 'selected' : '' }}>
                            {{ $item }}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="is_new_or_limited">Coupon Status</label>
                    <select class="form-select" name="is_new_or_limited" data-control="select2"
                        data-placeholder="Select an option">
                        <option value="">--Select--</option>
                        @if (count(config('mediq.coupon_status')) > 0)
                        @foreach (config('mediq.coupon_status') as $key => $item)
                        <option value="{{ $key }}"
                            {{ isset($coupon) && $coupon->is_new_or_limited == $key ? 'selected' : '' }}>
                            {{ $item }}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                {{-- <div class="col-md-6">
                        <label for="member_type">Member Type</label>
                        <select class="form-select" name="member_type" data-control="select2"
                            data-placeholder="Select an option">
                            <option></option>
                            @if (count(config('mediq.member_types')) > 0)
                            @foreach (config('mediq.member_types') as $key => $item)
                            <option value="{{ $key }}"
                {{ isset($coupon) && $coupon->member_type == $key ? 'selected' : '' }}>
                {{ $item }}</option>
                @endforeach
                @endif
                </select>
            </div> --}}
        </div>
    </div>
</div>
</div>
</div>
</div>
{{-- <div class="col-md-4">
    <div class="card mb-5">
        <div class="card-header">
            <h3 class="card-title">Banner Image</h3>
        </div>
        <div class="card-body">
            <div class="panel-block">
                <div class="form-group">
                    <div id="holder-img">
                        @if (!empty($coupon->banner_img))
                        <div class='lfmimage-container imglfmc0'>
                            <img src="{{ asset($coupon->banner_img) }}" class='lfmimage w-100' style="height: 20rem;">
                            <div>
                                <button type="button" onclick="removeImage('img',0)"
                                    class='btn btn-sm btn-danger w-100'>Remove</button>
                            </div>
                        </div>
                        @else
                        <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                        @endif
                    </div>
                    <div class="input-group mt-3">
                        <span class="input-group-btn">
                            <a id="lfm-img" data-input="img" data-preview="holder-img"
                                class="btn btn-primary text-white lfm-img">
                                <i class="bi bi-image-fill me-2"></i>Select File
                            </a>
                        </span>
                        <input id="img" class="form-control" type="text" name="banner_img"
                            value="{{ isset($coupon) ? $coupon->banner_img : '' }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-5">
        <div class="card-header">
            <h3 class="card-title">Icon</h3>
        </div>
        <div class="card-body">
            <div class="panel-block">
                <div class="form-group">
                    <div id="holder-icon">
                        @if (!empty($coupon->icon))
                        <div class='lfmimage-container iconlfmc0'>
                            <img src="{{ asset($coupon->icon) }}" class='lfmimage w-100' style="height: 20rem;">
                            <div>
                                <button type="button" onclick="removeImage('icon',0)"
                                    class='btn btn-sm btn-danger w-100'>Remove</button>
                            </div>
                        </div>
                        @else
                        <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                        @endif
                    </div>
                    <div class="input-group mt-3">
                        <span class="input-group-btn">
                            <a id="lfm-icon" data-input="icon" data-preview="holder-icon"
                                class="btn btn-primary text-white lfm-img">
                                <i class="bi bi-image-fill me-2"></i>Select File
                            </a>
                        </span>
                        <input id="icon" class="form-control" type="text" name="icon"
                            value="{{ isset($coupon) ? $coupon->icon : '' }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
</div>
<input id="coupon_id" class="form-control" type="hidden" name="coupon_id"
    value="{{ isset($coupon) ? $coupon->id : 0 }}">
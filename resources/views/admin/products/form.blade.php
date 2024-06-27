<style>
    .product_type {
        border: 1px solid #7c838973 !important;
    }
</style>
<div class="row">
    <div class="row mb-5">
        <div class="col-md-8">
            <h3 class="card-title">
                @if ($formMode == 'edit')
                    Edit Product
                @else
                    Add New Product
                @endif
            </h3>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="float-end">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card"></i> Save</button>
                    <a href="{{ url('admin/products') }}" title="Back"><button type="button"
                            class="btn btn-secondary btn-sm cancel"><i class="bi bi-x" aria-hidden="true"></i>
                            Cancel</button></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
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
                                <!-- <div class="mb-10"></div>         -->
                                <div class="form-group mb-5{{ $errors->has('name_' . $attr) ? 'has-error' : '' }}">
                                    {!! Form::label('name_' . $attr, 'Name' . ' (' . $lngcode . ')', ['class' => 'control-label required']) !!}
                                    {!! Form::text(
                                        'name_' . $attr,
                                        null,
                                        'required' == 'required'
                                            ? ['class' => 'form-control', 'tabindex' => 1]
                                            : ['class' => 'form-control', 'tabindex' => 1],
                                    ) !!}
                                </div>
                                <div class="form-group mb-5{{ $errors->has('slug_' . $attr) ? 'has-error' : '' }}">
                                    {!! Form::label('slug_' . $attr, 'Slug' . ' (' . $lngcode . ')', ['class' => 'control-label']) !!}
                                    {!! Form::text(
                                        'slug_' . $attr,
                                        null,
                                        '' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                    ) !!}
                                </div>
                                <div class="form-group mb-5{{ $errors->has('for_tag_' . $attr) ? 'has-error' : '' }}">
                                    {!! Form::label('for_tag_' . $attr, 'For Tag' . ' (' . $lngcode . ')', ['class' => 'control-label']) !!}
                                    {!! Form::textarea(
                                        'for_tag_' . $attr,
                                        null,
                                        '' == 'required' ? ['class' => 'form-control editor'] : ['class' => 'form-control editor'],
                                    ) !!}
                                </div>
                                <div class="form-group mb-5{{ $errors->has('add_on_reminder_' . $attr) ? 'has-error' : '' }}">
                                    {!! Form::label('add_on_reminder_' . $attr, 'Add-on Reminder' . ' (' . $lngcode . ')', ['class' => 'control-label']) !!}
                                    {!! Form::textarea(
                                        'add_on_reminder_' . $attr,
                                        null,
                                        '' == 'required' ? ['class' => 'form-control editor'] : ['class' => 'form-control editor'],
                                    ) !!}
                                </div>
                                <div class="form-group mb-5{{ $errors->has('recipient_content_' . $attr) ? 'has-error' : '' }}">
                                    {!! Form::label('recipient_content_' . $attr, 'Recipient Content' . ' (' . $lngcode . ')', ['class' => 'control-label']) !!}
                                    {!! Form::textarea(
                                        'recipient_content_' . $attr,
                                        null,
                                        '' == 'required' ? ['class' => 'form-control editor'] : ['class' => 'form-control editor'],
                                    ) !!}
                                </div>
                                <div class="form-group mb-5{{ $errors->has('package_reminder_' . $attr) ? 'has-error' : '' }}">
                                    {!! Form::label('package_reminder_' . $attr, 'Package Reminder' . ' (' . $lngcode . ')', ['class' => 'control-label']) !!}
                                    {!! Form::textarea(
                                        'package_reminder_' . $attr,
                                        null,
                                        '' == 'required' ? ['class' => 'form-control editor'] : ['class' => 'form-control editor','rows' => 3],
                                    ) !!}
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <h5>Search Engin Optimization (SEO)</h5>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="@if ($attr == 'en') col-md-6 @else col-md-12 @endif">
                                        <div
                                            class="form-group mb-5{{ $errors->has('meta_title_' . $attr) ? 'has-error' : '' }}">
                                            {!! Form::label('meta_title_' . $attr, 'Meta Title' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                            {!! Form::text(
                                                'meta_title_' . $attr,
                                                null,
                                                'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                            ) !!}
                                            {!! $errors->first('meta_title_' . $attr, '<p class="help-block  style=" color:red"text-danger">:message</p>') !!}
                                        </div>
                                        <div
                                            class="form-group mb-5{{ $errors->has('meta_description_' . $attr) ? 'has-error' : '' }}">
                                            {!! Form::label('meta_description_' . $attr, 'Meta Description' . ' (' . $lngcode . ')', [
                                                'class' => 'form-label',
                                            ]) !!}
                                            {!! Form::textarea(
                                                'meta_description_' . $attr,
                                                null,
                                                'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                                            ) !!}
                                            {!! $errors->first(
                                                'meta_description_' . $attr,
                                                '<p class="help-block  style=" color:red"text-danger">:message</p>',
                                            ) !!}
                                        </div>
                                    </div>
                                    @if ($attr == 'en')
                                        <div class="col-md-6">
                                            <div class="card-body pt-0">
                                                <div class="list-title mb-3">
                                                    <label for="kt_ecommerce_add_product_store_template"
                                                        class="form-label">
                                                        <span style="color: #B5B5C3">Image Size(200 x 200)px</span>
                                                    </label>
                                                </div>
                                                <div class="panel-block">
                                                    <div class="form-group">
                                                        <div id="holder-meta-image">
                                                            @if (!empty($product->meta_image))
                                                                <div class='lfmimage-container meta-imagelfmc0'>
                                                                    <img src="{{ asset($product->meta_image) }}"
                                                                        class='lfmimage w-100' style="height: 20rem;">
                                                                    <div>
                                                                        <button type="button"
                                                                            onclick="removeImage('meta-image',0)"
                                                                            class='btn btn-sm btn-danger w-100'>Remove</button>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <img src="{{ asset('backend/media/blank-image.svg') }}"
                                                                    class="img-thumbnail">
                                                            @endif
                                                        </div>
                                                        <div class="input-group mt-3">
                                                            <span class="input-group-btn">
                                                                <a id="lfm-meta-image" data-input="meta-image"
                                                                    data-preview="holder-meta-image"
                                                                    class="btn btn-primary text-white lfm-img">
                                                                    <i class="bi bi-image-fill me-2"></i>Select File
                                                                </a>
                                                            </span>
                                                            <input id="meta-image" class="form-control" type="text"
                                                                name="meta_image"
                                                                value="{{ isset($product) ? $product->meta_image : '' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                        <div class="form-group mb-5{{ $errors->has('product_code') ? 'has-error' : '' }}">
                            {!! Form::label('product_code', 'Product Code', ['class' => 'control-label required']) !!}
                            {!! Form::text(
                                'product_code',
                                null,
                                '' == 'required'
                                    ? ['class' => 'form-control', 'required' => 'required', 'tabindex' => 1]
                                    : ['class' => 'form-control', 'tabindex' => 1],
                            ) !!}
                            {!! $errors->first('product_code', '<p style="color:red">:message</p>') !!}
                        </div>

                        <div class="form-group mb-5{{ $errors->has('book_count') ? 'has-error' : '' }}">
                            {!! Form::label('book_count', 'Booking Count', ['class' => 'control-label']) !!}
                            {!! Form::text(
                                'book_count',
                                null,
                                '' == 'required'
                                    ? ['class' => 'form-control', 'required' => 'required', 'tabindex' => 1]
                                    : ['class' => 'form-control', 'tabindex' => 1],
                            ) !!}
                            {!! $errors->first('book_count', '<p style="color:red">:message</p>') !!}
                        </div>

                        <div class="card product_type">
                            <div class="card-header card-header-stretch">
                                <h3 class="card-title">Product Types</h3>
                                <div class="card-toolbar">
                                    <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_7">Simple
                                                Product</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_8">Variable
                                                Product</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="kt_tab_pane_7" role="tabpanel">
                                        <div class="row g-2">
                                            <div class="col-md-6">
                                                <div
                                                    class="form-group mb-5{{ $errors->has('product_code') ? 'has-error' : '' }}">
                                                    {!! Form::label('sku', 'Sku', ['class' => 'control-label']) !!}
                                                    {!! Form::text(
                                                        'sku',
                                                        null,
                                                        '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
                                                    ) !!}
                                                    {!! $errors->first('sku', '<p style="color:red">:message</p>') !!}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div
                                                    class="form-group mb-5{{ $errors->has('stock') ? 'has-error' : '' }}">
                                                    {!! Form::label('stock', 'Stock Quantity', ['class' => 'control-label']) !!}
                                                    {!! Form::number(
                                                        'stock',
                                                        null,
                                                        '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
                                                    ) !!}
                                                    {!! $errors->first('stock', '<p style="color:red">:message</p>') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-2">
                                            <div class="col-md-6">
                                                <div
                                                    class="form-group mb-5{{ $errors->has('product_code') ? 'has-error' : '' }}">
                                                    {!! Form::label('original_price', 'Original Price', ['class' => 'control-label']) !!}
                                                    {!! Form::number(
                                                        'original_price',
                                                        null,
                                                        '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
                                                    ) !!}
                                                    {!! $errors->first('original_price', '<p style="color:red">:message</p>') !!}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div
                                                    class="form-group mb-5{{ $errors->has('product_code') ? 'has-error' : '' }}">
                                                    {!! Form::label('discount_price', 'Discount Price', ['class' => 'control-label']) !!}
                                                    {!! Form::number(
                                                        'discount_price',
                                                        null,
                                                        '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
                                                    ) !!}
                                                    {!! $errors->first('discount_price', '<p style="color:red">:message</p>') !!}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row g-2">
                                            <div class="col-md-6">
                                                <div
                                                    class="form-group mb-5{{ $errors->has('product_code') ? 'has-error' : '' }}">
                                                    {!! Form::label('promotion_price', 'Promotion Price', ['class' => 'control-label']) !!}
                                                    {!! Form::number(
                                                        'promotion_price',
                                                        null,
                                                        '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
                                                    ) !!}
                                                    {!! $errors->first('promotion_price', '<p style="color:red">:message</p>') !!}
                                                </div>
                                            </div>
                                            <div class="col-md-6 number_of_dose">
                                                <div
                                                    class="form-group mb-5{{ $errors->has('number_of_dose') ? 'has-error' : '' }}">
                                                    {!! Form::label('number_of_dose', 'Number Of Item', ['class' => 'control-label-dose']) !!}
                                                    {!! Form::number(
                                                        'number_of_dose',
                                                        null,
                                                        '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
                                                    ) !!}
                                                    {!! $errors->first('number_of_dose', '<p style="color:red">:message</p>') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="kt_tab_pane_8" role="tabpanel">
                                        <div id="variableProduct">
                                            <div class="row">
                                                <div class="col-md-9">

                                                </div>
                                                <div class="col-md-3">
                                                    <button type="button" class="btn btn-primary float-md-end"
                                                        @click="addVariable()"><i class="bi bi-plus"
                                                            aria-hidden="true"></i></button>
                                                </div>
                                            </div><br>

                                            <div class="card shadow-sm mb-5" v-for="(variable,pindex) in variables"
                                                :key="pindex">

                                                <!-- <div v-if="pindex > 0" class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse" data-bs-target="#'kt_docs_card_collapsible'">
                                                    <h3 class="card-title"></h3>
                                                    <div class="card-toolbar rotate-180">
                                                    </div>
                                                </div> -->
                                                <div :id="'kt_docs_card_collapsible' + pindex" class="collapse show">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <button v-if="pindex > 0" type="button"
                                                                    @click="removeVariable(pindex)"
                                                                    class="btn btn-sm-light btn-color-danger"
                                                                    style="float:right">X</button>
                                                            </div>
                                                        </div>
                                                        @if ($formMode == 'edit')
                                                        <input type="hidden"  v-model="variable.id" v-bind:name="inputName(pindex, 'id')">
                                                        @endif
                                                        <div class="row g-2">
                                                            <div class="col-md-4 form-group mb-5">
                                                                <label for="name_en">Name(EN)</label>
                                                                <input type="text" v-model="variable.name_en"
                                                                    v-bind:name="inputName(pindex, 'name_en')"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="col-md-4 form-group mb-5">
                                                                <label for="name_tc">Name(TC)</label>
                                                                <input type="text" v-model="variable.name_tc"
                                                                    v-bind:name="inputName(pindex, 'name_tc')"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="col-md-4 form-group mb-5">
                                                                <label for="name_sc">Name(SC)</label>
                                                                <input type="text" v-model="variable.name_sc"
                                                                    v-bind:name="inputName(pindex, 'name_sc')"
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="row g-2">
                                                            <div class="col-md-6 form-group mb-5">
                                                                <label for="sku">Sku</label>
                                                                <input type="text" v-model="variable.sku"
                                                                    v-bind:name="inputName(pindex, 'sku')"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="col-md-6 form-group mb-5">
                                                                <label for="stock">Stock Quantity</label>
                                                                <input type="number" v-model="variable.stock"
                                                                    v-bind:name="inputName(pindex, 'stock')"
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="row g-2">
                                                            <div class="col-md-6 form-group mb-5">
                                                                <label for="original_price">Original Price</label>
                                                                <input type="number"
                                                                    v-model="variable.original_price"
                                                                    v-bind:name="inputName(pindex, 'original_price')"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="col-md-6 form-group mb-5">
                                                                <label for="discount_price">Discount price</label>
                                                                <input type="number"
                                                                    v-model="variable.discount_price"
                                                                    v-bind:name="inputName(pindex, 'discount_price')"
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="row g-2">
                                                            <div class="col-md-6 form-group mb-5">
                                                                <label for="promotion_price">Promotion Price</label>
                                                                <input type="number"
                                                                    v-model="variable.promotion_price"
                                                                    v-bind:name="inputName(pindex, 'promotion_price')"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="col-md-6 form-group mb-5">
                                                                <label for="number_of_dose"
                                                                    class="control-label-dose">Number of Item</label>
                                                                <input type="number"
                                                                    v-model="variable.number_of_dose"
                                                                    v-bind:name="inputName(pindex, 'number_of_dose')"
                                                                    class="form-control">
                                                            </div>
                                                            <!-- <div class="col-md-6 form-group mb-5">
                                                                <label for="avg_price">Avg Price</label>
                                                                <input type="number" v-model="variable.avg_price" v-bind:name="inputName(pindex, 'avg_price')" class="form-control">
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">

        <div class="card mb-5">
            <div class="card-header">
                <h3 class="card-title required">Mechants</h3>
            </div>
            <div class="card-body">
                <select class="form-select mb-5 merchant_id" name="merchant_id" onChange="merchant()"
                    data-control="select2" data-placeholder="Select an option">
                    <option value="">Select</option>
                    @if (count($merchants) > 0)
                        @foreach ($merchants as $item)
                            <option value="{{ $item->id }}"
                                {{ isset($product) && $item->id == $product->merchant_id ? 'selected' : '' }}>
                                {{ $item->name_en }}</option>
                        @endforeach
                    @endif
                </select>
                <h3 class="card-title plan" hidden>Plan Process</h3>
                @if (count($planProcess) > 0)
                    @foreach ($planProcess as $item)
                        <div class="form-check mb-5 plan_process{{ $item->merchant_id }}" hidden>
                            <input class="form-check-input" type="radio" name="plan_process_id"
                                value="{{ $item->id }}" id="plan_process_id"
                                {{ isset($product) && $product->plan_process_id == $item->id ? 'checked' : '' }}>
                            <label class="form-check-label" for="plan_process_id{{ $item->id }}">
                                {{ $item->name_en }}
                            </label>
                        </div>
                    @endforeach
                @endif
                <h3 class="card-title plan" hidden>Plan Description</h3>
                @if (count($planDescription) > 0)
                    @foreach ($planDescription as $item)
                        <div class="form-check mb-5 plan_description{{ $item->merchant_id }}" hidden>
                            <input class="form-check-input" type="radio" name="plan_description_id"
                                value="{{ $item->id }}" id="plan_description_id"
                                {{ isset($product) && $product->plan_description_id == $item->id ? 'checked' : '' }}>
                            <label class="form-check-label" for="plan_description_id{{ $item->id }}">
                                {{ $item->name_en }}
                            </label>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
        <div class="card mb-5">
            <div class="card-header">
                <h3 class="card-title required">Merchant Locations</h3>
            </div>
            <div class="card-body">
                    @if (count($merchantLocations) > 0)
                        @foreach ($merchantLocations as $item)
                            <div class="form-check mb-5 merchant_locations{{ $item->merchant_id }}" hidden>
                                <input class="form-check-input" type="checkbox" name="merchant_locations[]"
                                    value="{{ $item->area->id }}" id="merchant_locations{{ $item->id }}"
                                    {{ isset($product) && in_array($item->area->id, $product->product_location_ids_arr) ? 'checked' : '' }}>
                                <label class="form-check-label"
                                    for="merchant_locations{{ $item->id }}">
                                    {{ $item->area->name_en }}
                                </label>
                            </div>
                        @endforeach
                    @endif
                {{-- </select> --}}
            </div>
        </div>
        <div class="card mb-5">
            <div class="card-header">
                <h3 class="card-title required">Check Up Packages</h3>
            </div>
            <div class="card-body">
                <select class="form-control" name="check_up_package_id" data-placeholder="Select an option">
                    <option value="">select</option>
                    @if (count($packages) > 0)
                        @foreach ($packages as $item)
                            <option class="package{{ $item->merchant_id }}" value="{{ $item->id }}"
                                {{ isset($product) && $item->id == $product->check_up_package_id ? 'selected' : '' }}>
                                {{ $item->name_en }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
        <div class="accordion-item mb-5">
            <h2 class="accordion-header ">
                <button class="accordion-button fs-4 fw-semibold collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseCategory" aria-expanded="false" aria-controls="collapseCategory">
                    <span class="required">Categories</span>
                </button>
            </h2>
            <div id="collapseCategory" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    @if (count($categories) > 0)
                        @foreach ($categories as $item)
                            <div class="form-check mb-5">
                                <input class="form-check-input category_id" type="radio" name="category_id"
                                    value="{{ $item->id }}" id="category_id" onclick="category([])"
                                    {{ isset($product) && $product->category_id == $item->id ? 'checked' : '' }}>
                                <label class="form-check-label" for="category_id{{ $item->id }}">
                                    {{ $item->name_en }}
                                </label>
                            </div>
                            @if (count($item->subCategory) > 0)
                                @foreach ($item->subCategory as $sub_item)
                                    <div class="form-check mb-3 {{ $loop->last == true ? 'mb-5' : '' }}"
                                        style="margin-left: 18px;">
                                        <input class="form-check-input sub_category_id" type="radio"
                                            name="sub_category_id" value="{{ $sub_item->id }}"
                                            id="sub_category_id{{ $sub_item->id }}"
                                            {{ isset($product) && $product->sub_category_id == $sub_item->id ? 'checked' : '' }}
                                            disabled>
                                        <label class="form-check-label" for="sub_category_id{{ $sub_item->id }}">
                                            {{ $sub_item->name_en }}
                                        </label>
                                    </div>
                                @endforeach
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <!--begin::offers-->
        {{-- <div class="accordion mb-5">
            <div class="accordion-item">
                <h2 class="accordion-header" id="kt_accordion_1_header_offers">
                    <button class="accordion-button fs-4 fw-semibold collapsed" type="button"
                        data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_offer" aria-expanded="false"
                        aria-controls="kt_accordion_1_body_offer">
                        Special Offers
                    </button>
                </h2>
                <div id="kt_accordion_1_body_offer" class="accordion-collapse collapse"
                    aria-labelledby="kt_accordion_1_header_offers" data-bs-parent="#kt_accordion_offer">
                    <div class="accordion-body">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="kt_accordion_1_header_free_gift">
                                <button class="accordion-button fs-4 fw-semibold collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_free_gift"
                                    aria-expanded="false" aria-controls="kt_accordion_1_body_free_gift">
                                    Free Gift
                                </button>
                            </h2>
                            <div id="kt_accordion_1_body_free_gift" class="accordion-collapse collapse"
                                aria-labelledby="kt_accordion_1_header_free_gift"
                                data-bs-parent="#kt_accordion_offer">
                                <div class="accordion-body">
                                    @if (count($freeGifts) > 0)
                                        @foreach ($freeGifts as $item)
                                            <div class="form-check mb-5">
                                                <input class="form-check-input" type="radio" name="free_gift_id"
                                                    value="{{ $item->id }}" id="free_gift{{ $item->id }}"
                                                    {{ isset($product) && $product->free_gift_id == $item->id ? 'checked' : '' }}>
                                                <label class="form-check-label" for="free_gift{{ $item->id }}">
                                                    {{ $item->name_en }}
                                                </label>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="kt_accordion_1_header_qdollar">
                                <button class="accordion-button fs-4 fw-semibold collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_qdollar"
                                    aria-expanded="false" aria-controls="kt_accordion_1_body_qdollar">
                                    QDollar Rebate
                                </button>
                            </h2>
                            <div id="kt_accordion_1_body_qdollar" class="accordion-collapse collapse"
                                aria-labelledby="kt_accordion_1_header_qdollar" data-bs-parent="#kt_accordion_offer">
                                <div class="accordion-body">
                                    @if (count($qDollars) > 0)
                                        @foreach ($qDollars as $item)
                                            <div class="form-check mb-5">
                                                <input class="form-check-input" type="radio"
                                                    name="qdollar_rebate_id" value="{{ $item->id }}"
                                                    id="qdollar_rebate_id{{ $item->id }}"
                                                    {{ isset($product) && $product->qdollar_rebate_id == $item->id ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="qdollar_rebate_id{{ $item->id }}">
                                                    {{ $item->name_en }}
                                                </label>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div> --}}
        <!--end::offers-->
        <!--begin::add_on_items-->
        <div class="accordion-item mb-5">
            <h2 class="accordion-header">
                <button class="accordion-button fs-4 fw-semibold collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseAddOnItem" aria-expanded="false" aria-controls="collapseAddOnItem">
                    Add On Items
                </button>
            </h2>
            <div  id="collapseAddOnItem" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body add_on" hidden>
                    {{-- {{ $addOnItems->count() }} --}}
                    @if (count($addOnItems) > 0)
                        @foreach ($addOnItems as $item)
                            <div class="form-check mb-5 addon{{ $item->merchant }}">
                                <input class="form-check-input" type="checkbox" name="add_on_item_id[]"
                                    value="{{ $item->id }}" id="add_on_item_id"
                                    {{ isset($product) && in_array($item->id, $product->add_on_item_ids_arr) ? 'checked' : '' }}>
                                <label class="form-check-label" for="add_on_item_id{{ $item->id }}">
                                    {{ $item->name_en }}
                                </label>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <!--end::add_on_items-->
        <!--begin::add_on_items-->
        <div class="accordion-item mb-5">
            <h2 class="accordion-header">
                <button class="accordion-button fs-4 fw-semibold collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseSupplementary" aria-expanded="false"
                    aria-controls="collapseSupplementary">
                    Supplementary Info
                </button>
            </h2>
            <div id="collapseSupplementary" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    @if (count($supplymentaries) > 0)
                        @foreach ($supplymentaries as $item)
                            <div class="form-check mb-5">
                                <input class="form-check-input" type="checkbox" name="supplementary_id[]"
                                    value="{{ $item->id }}" id="supplementary_id"
                                    {{ isset($product) && in_array($item->id, $product->supplementary_ids_arr) ? 'checked' : '' }}>
                                <label class="form-check-label" for="supplementary_id{{ $item->id }}">
                                    {{ $item->name_en }}
                                </label>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <!--end::add_on_items-->

        <!--begin::tags-->
        <div class="accordion mb-5">
            <div class="accordion-item">
                <h2 class="accordion-header" id="kt_accordion_1_header_tags">
                    <button class="accordion-button fs-4 fw-semibold collapsed" type="button"
                        data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_tag" aria-expanded="false"
                        aria-controls="kt_accordion_1_body_tag">
                        Product Tags
                    </button>
                </h2>
                <div id="kt_accordion_1_body_tag" class="accordion-collapse collapse"
                    aria-labelledby="kt_accordion_1_header_tags" data-bs-parent="#kt_accordion_tag">
                    <div class="accordion-body">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="kt_accordion_1_key_tag">
                                <button class="accordion-button fs-4 fw-semibold collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_key_tag"
                                    aria-expanded="false" aria-controls="kt_accordion_1_body_key_tag">
                                    Key Items Tag
                                </button>
                            </h2>
                            <div id="kt_accordion_1_body_key_tag" class="accordion-collapse collapse"
                                aria-labelledby="kt_accordion_1_key_tag" data-bs-parent="#kt_accordion_tag">
                                <div class="accordion-body">
                                    {{-- @if (count($keyItemTags) > 0)
                                        @foreach ($keyItemTags as $item)
                                            <div class="form-check mb-5">
                                                <input class="form-check-input" type="checkbox" name="key_products[]"
                                                    value="{{ $item->id }}" id="key_products{{ $item->id }}"
                                                    {{ isset($product) && in_array($item->id, $product->key_item_tag_ids_arr) ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="key_products{{ $item->id }}">
                                                    {{ $item->name_en }}
                                                </label>
                                            </div>
                                        @endforeach
                                    @endif --}}
                                    @php
                                    $key_products = isset($product) ? $product->key_item_tag_ids_arr : [];
                                    @endphp
                                    @if (count($keyItemTags) > 0)
                                        @foreach ($keyItemTags as $item)
                                            <div class="form-check mb-5">
                                                <input class="form-check-input" type="checkbox" name="key_products[]"
                                                    value="{{ $item->id }}" id="key_products{{ $item->id }}"
                                                    {{ in_array($item->id, $key_products) ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="key_products{{ $item->id }}">
                                                    {{ $item->name_en }}
                                                </label>
                                            </div>
                                        @endforeach
                                    @endif  
                                </div>
                               
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="kt_accordion_1_header_price_tag">
                                <button class="accordion-button fs-4 fw-semibold collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_price_tag"
                                    aria-expanded="false" aria-controls="kt_accordion_1_body_price_tag">
                                    Price Tag
                                </button>
                            </h2>
                            <div id="kt_accordion_1_body_price_tag" class="accordion-collapse collapse"
                                aria-labelledby="kt_accordion_1_header_price_tag" data-bs-parent="#kt_accordion_tag">
                                <div class="accordion-body">
                                    @if (count($priceTags) > 0)
                                        @foreach ($priceTags as $item)
                                            <div class="form-check mb-5">
                                                <input class="form-check-input" type="checkbox" name="price_tag_id[]"
                                                    value="{{ $item->id }}" id="price_tag_id{{ $item->id }}"
                                                    {{ isset($product) && in_array($item->id, $product->price_tag_ids_arr) ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="price_tag_id{{ $item->id }}">
                                                    {{ $item->name_en }}
                                                </label>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="kt_accordion_1_header_time_slot_tag">
                                <button class="accordion-button fs-4 fw-semibold collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_time_slot_tag"
                                    aria-expanded="false" aria-controls="kt_accordion_1_body_time_slot_tag">
                                    Time Slot Tag
                                </button>
                            </h2>
                            <div id="kt_accordion_1_body_time_slot_tag" class="accordion-collapse collapse"
                                aria-labelledby="kt_accordion_1_header_time_slot_tag"
                                data-bs-parent="#kt_accordion_tag">
                                <div class="accordion-body">
                                    @if (count($timeSlotTags) > 0)
                                        @foreach ($timeSlotTags as $item)
                                            <div class="form-check mb-5">
                                                <input class="form-check-input" type="checkbox"
                                                    name="time_slot_tag_id[]" value="{{ $item->id }}"
                                                    id="time_slot_tag_id{{ $item->id }}"
                                                    {{ isset($product) && in_array($item->id, $product->time_slot_tag_ids_arr) ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="time_slot_tag_id{{ $item->id }}">
                                                    {{ $item->name_en }}
                                                </label>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="kt_accordion_1_header_highlightTags">
                                <button class="accordion-button fs-4 fw-semibold collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_highlightTags"
                                    aria-expanded="false" aria-controls="kt_accordion_1_body_highlightTags">
                                    Highlight Tag
                                </button>
                            </h2>
                            <div id="kt_accordion_1_body_highlightTags" class="accordion-collapse collapse"
                                aria-labelledby="kt_accordion_1_header_highlightTags"
                                data-bs-parent="#kt_accordion_tag">
                                <div class="accordion-body">
                                    @if (count($highlightTags) > 0)
                                        @foreach ($highlightTags as $item)
                                            <div class="form-check mb-5">
                                                <input class="form-check-input" type="checkbox"
                                                    name="highlight_tag_id[]" value="{{ $item->id }}"
                                                    id="highlight_tag_id{{ $item->id }}"
                                                    {{ isset($product) && in_array($item->id, $product->hightlight_tag_ids_arr) ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="highlight_tag_id{{ $item->id }}">
                                                    {{ $item->name_en }}
                                                </label>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="kt_accordion_1_header_featureTags">
                                <button class="accordion-button fs-4 fw-semibold collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_featureTags"
                                    aria-expanded="false" aria-controls="kt_accordion_1_body_featureTags">
                                    Feature Tag
                                </button>
                            </h2>
                            <div id="kt_accordion_1_body_featureTags" class="accordion-collapse collapse"
                                aria-labelledby="kt_accordion_1_header_featureTags"
                                data-bs-parent="#kt_accordion_tag">
                                <div class="accordion-body">
                                    @if (count($featureTags) > 0)
                                        @foreach ($featureTags as $item)
                                            <div class="form-check mb-5">
                                                <input class="form-check-input" type="checkbox"
                                                    name="feature_tag_id[]" value="{{ $item->id }}"
                                                    id="feature_tag_id{{ $item->id }}"
                                                    {{ isset($product) && in_array($item->id, $product->feature_tag_ids_arr) ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="feature_tag_id{{ $item->id }}">
                                                    {{ $item->name_en }}
                                                </label>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="kt_accordion_1_header_recommendTags">
                                <button class="accordion-button fs-4 fw-semibold collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_recommendTags"
                                    aria-expanded="false" aria-controls="kt_accordion_1_body_recommendTags">
                                    Recommend Tag
                                </button>
                            </h2>
                            <div id="kt_accordion_1_body_recommendTags" class="accordion-collapse collapse"
                                aria-labelledby="kt_accordion_1_header_recommendTags"
                                data-bs-parent="#kt_accordion_tag">
                                <div class="accordion-body">
                                    @if (count($recommendTags) > 0)
                                        @foreach ($recommendTags as $item)
                                            <div class="form-check mb-5">
                                                <input class="form-check-input" type="checkbox"
                                                    name="recommend_tag_id[]" value="{{ $item->id }}"
                                                    id="recommend_tag_id{{ $item->id }}"
                                                    {{ isset($product) && in_array($item->id, $product->recommend_tag_ids_arr) ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="recommend_tag_id{{ $item->id }}">
                                                    {{ $item->name_en }}
                                                </label>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item number_of_dose">
                            <h2 class="accordion-header" id="kt_accordion_1_header_vaccine_factory_tag">
                                <button class="accordion-button fs-4 fw-semibold collapsed" type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#kt_accordion_1_body_vaccine_factory_tag" aria-expanded="false"
                                    aria-controls="kt_accordion_1_body_vaccine_factory_tag">
                                    Vaccine Factory Tags
                                </button>
                            </h2>
                            <div id="kt_accordion_1_body_vaccine_factory_tag" class="accordion-collapse collapse"
                                aria-labelledby="kt_accordion_1_header_vaccine_factory_tag"
                                data-bs-parent="#kt_accordion_tag">
                                <div class="accordion-body">
                                    @if (count($vaccineFactoryTags) > 0)
                                        @foreach ($vaccineFactoryTags as $item)
                                            <div class="form-check mb-5">
                                                <input class="form-check-input" type="checkbox"
                                                    name="vaccine_factory_tag_id[]" value="{{ $item->id }}"
                                                    id="vaccine_factory_tag_id{{ $item->id }}"
                                                    {{ isset($product) && in_array($item->id, $product->vaccine_factory_tag_ids_arr) ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="vaccine_factory_tag_id{{ $item->id }}">
                                                    {{ $item->name_en }}
                                                </label>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item number_of_dose">
                            <h2 class="accordion-header" id="kt_accordion_1_header_vaccine_factory_tags">
                                <button class="accordion-button fs-4 fw-semibold collapsed" type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#kt_accordion_1_body_vaccine_factory_tags" aria-expanded="false"
                                    aria-controls="kt_accordion_1_body_vaccine_factory_tags">
                                    Vaccine Stock Tags
                                </button>
                            </h2>
                            <div id="kt_accordion_1_body_vaccine_factory_tags" class="accordion-collapse collapse"
                                aria-labelledby="kt_accordion_1_header_vaccine_factory_tags"
                                data-bs-parent="#kt_accordion_tag">
                                <div class="accordion-body">
                                    @if (count($vaccineStockTags) > 0)
                                        @foreach ($vaccineStockTags as $item)
                                            <div class="form-check mb-5">
                                                <input class="form-check-input" type="checkbox"
                                                    name="vaccine_stock_tag_id[]" value="{{ $item->id }}"
                                                    id="vaccine_stock_tag_id{{ $item->id }}"
                                                    {{ isset($product) && in_array($item->id, $product->vaccine_stock_tag_ids_arr) ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="vaccine_stock_tag_id{{ $item->id }}">
                                                    {{ $item->name_en }}
                                                </label>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::tags-->

        <div class="card mb-5">
            <div class="card-header">
                <h3 class="card-title">Product Type</h3>
            </div>
            <div class="card-body">
                <div class="panel-block">
                    <div class="form-group">
                        <label class="radio-inline">
                            <input id="product_type1" name="product_type" value="1" type="radio"
                                {{ isset($product) && $product->product_type == 1 ? 'checked' : ($formMode == 'create' ? 'checked' : '') }}>
                            Booking</label>
                        <label class="radio-inline">
                            <input id="product_type2" name="product_type" value="2" type="radio"
                                {{ isset($product) && $product->product_type == 2 ? 'checked' : '' }}>
                            Enquiry with price</label>
                        <label class="radio-inline">
                            <input id="product_type3" name="product_type" value="3" type="radio"
                                {{ isset($product) && $product->product_type == 3 ? 'checked' : '' }}>
                            Enquiry</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-5">
            <div class="card-body">
                <div class="d-flex justify-content-between nopadding">
                    <label for="" style="font-size: 13px;">Is Two Recipients Plan Option?</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="is_two_recipient"
                            id="is_two_recipient" @if (isset($product) && $product->is_two_recipient == true) checked @endif>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="card mb-5">
            <div class="card-header">
                <h3 class="card-title">Featured Image </h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template required" class="form-label">
                        <span style="color: #B5B5C3">Image Size( 1000 x 535 )px</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                        <div id="holder-img">
                            @if (!empty($product->featured_img))
                                <div class='lfmimage-container featured_imglfmc0'>
                                    <img src="{{ asset($product->featured_img) }}" class='lfmimage w-100'
                                        style="height: 20rem;">
                                    <!-- <div>
                                        <button type="button" onclick="removeImage('featured_img',0)" class='btn btn-sm btn-danger w-100'>Remove</button>
                                    </div> -->
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
                            <input id="img" class="form-control" type="text" name="featured_img" required
                                value="{{ isset($product) ? $product->featured_img : '' }}">
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <!-- start:service-facilities | holder5 -->
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Feature Images</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Size (1000px x 535px)</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group{{ $errors->has('feature_images') ? 'has-error' : '' }}">
                        <ul class="dragGroup" id="holder8">
                            @if (isset($productsImages->feature_images))
                                @foreach ($productsImages->feature_images as $key => $img)
                                    <li class="draggable w-100 draggableItem0 thumbnail4lfmc0" draggable="true">
                                        <input type="hidden" name="holder8[]'" value="{{ $img }}"
                                            id="galleryImage0">
                                        <img src="{{ $img }}" class="lfmimage w-100">
                                        <div>
                                            <button type="button" onclick="removeGImage(this)"
                                                class="btn btn-sm btn-danger w-100"
                                                style="border-radius: 1px 1px 8px 8px;">Remove</button>
                                        </div>
                                    </li>
                                @endforeach
                            @else
                                <img src="{{ asset('backend/media/blank-image.svg') }}"
                                    class="img-thumbnail feature-img">
                            @endif
                        </ul>
                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="lfm-pro" data-input="thumbnail8" data-preview="holder8" data-ptype="g"
                                    class="lfm-pro lfm-img btn btn-primary text-white">
                                    <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                            <input id="thumbnail8" class="form-control" type="text" name="feature_images[]"
                                multiple>
                        </div>
                        {!! $errors->first('feature_images', '<p class="help-block">:message</p>') !!}
                    </div>
                    <span>Can upload multiple image</span>
                </div>
            </div>
        </div>
        <!-- end:service-facilities -->

        <!-- start:common-area | holder4-->
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Common Area</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Size (1000px x 535px)</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group">
                        <ul class="dragGroup" id="holder4">
                            @if (isset($productsImages->common_area))
                                @foreach ($productsImages->common_area as $key => $img)
                                    <li class="draggable w-100 draggableItem0 thumbnail4lfmc0" draggable="true">
                                        <input type="hidden" name="holder4[]'" value="{{ $img }}"
                                            id="galleryImage0">
                                        <img src="{{ $img }}" class="lfmimage w-100">
                                        <div>
                                            <button type="button" onclick="removeGImage(this)"
                                                class="btn btn-sm btn-danger w-100"
                                                style="border-radius: 1px 1px 8px 8px;">Remove</button>
                                        </div>
                                    </li>
                                @endforeach
                            @else
                                <img src="{{ asset('backend/media/blank-image.svg') }}"
                                    class="img-thumbnail feature-img">
                            @endif
                        </ul>
                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="lfm-pro" data-input="thumbnail4" data-ptype="g" data-preview="holder4"
                                    class="lfm-pro lfm-img btn btn-primary text-white">
                                    <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                            <input id="thumbnail4" class="form-control" type="text" name="commom_area[]"
                                multiple="" readonly="">
                        </div>
                    </div>
                    <span class="required"> Can upload multiple image</span>
                </div>
            </div>
        </div>
        <!-- end:common-area -->

        <!-- start:service-facilities | holder5 -->
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Services Facilities</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Size (1000px x 535px)</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group{{ $errors->has('services_facilities') ? 'has-error' : '' }}">
                        <ul class="dragGroup" id="holder5">
                            @if (isset($productsImages->services_facilities))
                                @foreach ($productsImages->services_facilities as $key => $img)
                                    <li class="draggable w-100 draggableItem0 thumbnail4lfmc0" draggable="true">
                                        <input type="hidden" name="holder5[]'" value="{{ $img }}"
                                            id="galleryImage0">
                                        <img src="{{ $img }}" class="lfmimage w-100">
                                        <div>
                                            <button type="button" onclick="removeGImage(this)"
                                                class="btn btn-sm btn-danger w-100"
                                                style="border-radius: 1px 1px 8px 8px;">Remove</button>
                                        </div>
                                    </li>
                                @endforeach
                            @else
                                <img src="{{ asset('backend/media/blank-image.svg') }}"
                                    class="img-thumbnail feature-img">
                            @endif
                        </ul>
                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="lfm-pro" data-input="thumbnail5" data-preview="holder5" data-ptype="g"
                                    class="lfm-pro lfm-img btn btn-primary text-white">
                                    <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                            <input id="thumbnail5" class="form-control" type="text" name="services_facilities[]"
                                multiple>
                        </div>
                        {!! $errors->first('services_facilities', '<p class="help-block">:message</p>') !!}
                    </div>
                    <span>Can upload multiple image</span>
                </div>
            </div>
        </div>
        <!-- end:service-facilities -->

        <!-- start:other | holder6 -->
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Other</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Size (1000px x 535px)</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group{{ $errors->has('other') ? 'has-error' : '' }}">
                        <ul class="dragGroup" id="holder6">
                            @if (isset($productsImages->other))
                                @foreach ($productsImages->other as $key => $img)
                                    <li class="draggable w-100 draggableItem0 thumbnail4lfmc0" draggable="true">
                                        <input type="hidden" name="holder6[]'" value="{{ $img }}"
                                            id="galleryImage0">
                                        <img src="{{ $img }}" class="lfmimage w-100">
                                        <div>
                                            <button type="button" onclick="removeGImage(this)"
                                                class="btn btn-sm btn-danger w-100"
                                                style="border-radius: 1px 1px 8px 8px;">Remove</button>
                                        </div>
                                    </li>
                                @endforeach
                            @else
                                <img src="{{ asset('backend/media/blank-image.svg') }}"
                                    class="img-thumbnail feature-img">
                            @endif
                        </ul>

                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="lfm-pro" data-input="thumbnail6" data-preview="holder6" data-ptype="g"
                                    class="lfm-pro lfm-img btn btn-primary text-white">
                                    <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                            <input id="thumbnail6" class="form-control" type="text" name="other[]" multiple>
                        </div>
                        {!! $errors->first('other', '<p class="help-block">:message</p>') !!}
                    </div>
                    <span>Can upload multiple image</span>
                </div>
            </div>
        </div>
        <!-- end:other -->

        <!-- start:video |holder7 -->
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Video</h3>
            </div>
            <div class="card-body">
                <div class="list-title mb-3">
                    <label for="kt_ecommerce_add_product_store_template" class="form-label">
                        <span style="color: #B5B5C3">Size (1000px x 535px)</span>
                    </label>
                </div>
                <div class="panel-block">
                    <div class="form-group{{ $errors->has('video') ? 'has-error' : '' }}">
                        <ul class="dragGroup" id="holder7">
                            @if (isset($productsImages->video))
                                @foreach ($productsImages->video as $key => $img)
                                    <li class="draggable w-100 draggableItem0 thumbnail4lfmc0" draggable="true">
                                        <input type="hidden" name="holder7[]'" value="{{ $img }}"
                                            id="galleryImage0">
                                        <video src="{{ $img }}" class="lfmimage w-100">
                                        <div>
                                            <button type="button" onclick="removeGImage(this)"
                                                class="btn btn-sm btn-danger w-100"
                                                style="border-radius: 1px 1px 8px 8px;">Remove</button>
                                        </div>
                                    </li>
                                @endforeach
                            @else
                                <img src="{{ asset('backend/media/blank-image.svg') }}"
                                    class="img-thumbnail feature-img">
                            @endif
                        </ul>

                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="lfm-pro" data-input="thumbnail7" data-preview="holder7" data-ptype="g"
                                    class="lfm-pro lfm-img btn btn-primary text-white">
                                    <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                            <input id="thumbnail7" class="form-control" type="text" name="video[]" multiple>
                        </div>
                        {!! $errors->first('video', '<p class="help-block">:message</p>') !!}
                    </div>
                    <span>Can upload multiple image</span>
                </div>
            </div>
        </div>
        <!-- end:video -->
    </div>
</div>

<div class="row">
    <div class="row mb-5">
        <div class="col-md-8">
            <h3 class="card-title">
                @if($formMode == "edit") Edit On Sale @else Add New On Sale @endif
            </h3>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="float-end">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-sd-card"></i> Save</button>
                    <a href="{{ url('admin/on-sale') }}" title="Back"><button type="button" class="btn btn-secondary btn-sm cancel"><i class="bi bi-x" aria-hidden="true"></i> Cancel</button></a>
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
                        <div class="tab-pane fade {{ $attr == 'en' ? 'active show' : '' }}"  id="{{ strtolower($lngcode) }}-tab">        
                            <div class="form-group mb-5{{ $errors->has('name_'.$attr) ? 'has-error' : ''}}">
                                {!! Form::label('name_'.$attr, 'Name' . ' (' . $lngcode . ')', ['class' => 'form-label required']) !!}
                                {!! Form::text('name_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
                                {!! $errors->first('name_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                            <div class="form-group mb-5{{ $errors->has('content_'.$attr) ? 'has-error' : ''}}">
                                {!! Form::label('content_'.$attr, 'Content' . ' (' . $lngcode . ')', ['class' => 'form-label']) !!}
                                {!! Form::textarea('content_'.$attr, null, ('required' == 'required') ? ['class' => 'form-control editor'] : ['class' => 'form-control editor']) !!}
                                {!! $errors->first('content_' . $attr, '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                        </div>
                        @endforeach
                        <div class="form-group mb-5">
                            <label for="sale_category_id">On Sale Category</label>
                            <select class="form-select" name="sale_category_id" data-control="select2" data-placeholder="Select an option">
                                <option></option>
                                @if(count($saleCategories) > 0)
                                @foreach($saleCategories as $key => $item)
                                <option value="{{ $item->id}}" {{isset($onSale) && $onSale->sale_category_id ==  $key ? 'selected' : ''}}> {{$item->name_en}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-header card-header-stretch">
                <h3 class="card-title">On Sale Data</h3>
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
                                <select class="form-select" name="discount_type" data-control="select2" data-placeholder="Select an option">
                                     <option></option>
                                     @if(count(config('mediq.coupon_discount_types')) > 0)
                                     @foreach(config('mediq.coupon_discount_types') as $key => $item)
                                     <option value="{{ $key}}" {{isset($onSale) && $onSale->discount_type ==  $key ? 'selected' : ''}}> {{$item}}</option>
                                     @endforeach
                                     @endif
                                 </select>
                            </div>
                            <div class="col-md-6">
                                <label for="amount">Amount</label>
                                <input type="number" name="amount" class="form-control" value="{{isset($onSale) ? $onSale->amount : ''}}">
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <label for="start_date">Start Date</label>
                                <input type="datetime-local" name="start_date" class="form-control" value="{{isset($onSale) ? $onSale->start_date : ''}}">
                            </div>
                            <div class="col-md-6">
                                <label for="end_date">End Date</label>
                                <input type="datetime-local" name="end_date" class="form-control" value="{{isset($onSale) ? $onSale->end_date : ''}}">
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <label for="minimum_spend">Minimum Spend</label>
                                <input type="number" name="minimum_spend" class="form-control" value="{{isset($onSale) ? $onSale->minimum_spend : ''}}">
                            </div>
                            <div class="col-md-6">
                                <label for="maximum_spend">Miximun Spend</label>
                                <input type="number" name="maximum_spend" class="form-control" value="{{isset($onSale) ? $onSale->maximum_spend : ''}}">
                            </div>
                        </div>
                        <div class="row mb-5">
                            <label for="product_categories">Main Categories</label>
                            <select name="product_categories[]" class="form-select form-select-lg product_cate" onchange="mainCate()" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple">
                                <option></option>
                                @if(count($categories) > 0)
                                    @foreach($categories as $item)
                                    <option value="{{$item->id}}" {{isset($onSale) && $onSale->product_categories != null && in_array($item->id,json_decode($onSale->product_categories)) ? 'selected' : ''}}> {{$item->name_en}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        {{-- <div class="row mb-5">
                            <label for="exclude_products_categories">Exclude Product Main Categories</label>
                            <select name="exclude_products_categories[]" class="form-select form-select-lg" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple">
                                <option></option>
                                @if(count($categories) > 0)
                                    @foreach($categories as $item)
                                    <option value="{{$item->id}}" {{isset($onSale) && $onSale->exclude_products_categories != null && in_array($item->id,json_decode($onSale->exclude_products_categories)) ? 'selected' : ''}}> {{$item->name_en}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div> --}}
                        <div class="row mb-5">
                            <label for="product_sub_categories">Sub Categories</label>
                            <select name="product_sub_categories[]" class="form-select form-select-lg proSubCate" id="inc_category" onchange="subCate()" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple">
                                <option></option>
                                 @if(count($subCategories) > 0)
                                    @foreach($subCategories as $item)
                                    <option class="sub_cate{{$item->category_id}}" value="{{$item->id}}" {{isset($onSale) && $onSale->product_sub_categories != null && in_array($item->id,json_decode($onSale->product_sub_categories)) ? 'selected' : ''}}> {{$item->name_en}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                       
                        <div class="row mb-5">
                            <label for="exclude_sub_categories">Exclude Sub Categories</label>
                            <select name="exclude_sub_categories[]" class="form-select form-select-lg" id="exc_category" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple">
                                <option></option>
                                @if(count($subCategories) > 0)
                                    @foreach($subCategories as $item)
                                    <option class="sub_cate{{$item->category_id}} value="{{$item->id}}" {{isset($onSale) && $onSale->exclude_sub_categories != null && in_array($item->id,json_decode($onSale->exclude_sub_categories)) ? '' : ''}}> {{$item->name_en}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="row mb-5">
                            <label for="merchant_id">Merchant</label>
                            <select name="merchant_id[]" class="form-select form-select-lg merchant_id" id="inc_merchant" onchange="merchantData()" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple">
                                <option></option>
                                @if(count($merchants) > 0)
                                    @foreach($merchants as $item)
                                    <option class="merchant{{$item->id}}" value="{{$item->id}}" {{isset($onSale) && $onSale->merchant_id != null && in_array($item->id,json_decode($onSale->merchant_id)) ? 'selected' : ''}}> {{$item->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div> 
                        <div class="row mb-5">
                            <label for="exclude_merchant_id">Exclude Merchant</label>
                            <select name="exclude_merchant_id[]" class="form-select form-select-lg" id="exc_merchant" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple">
                                <option></option>
                                @if(count($merchants) > 0)
                                    @foreach($merchants as $item)
                                    <option class="merchant{{$item->id}}" value="{{$item->id}}" {{isset($onSale) && $onSale->exclude_merchant_id != null && in_array($item->id,json_decode($onSale->exclude_merchant_id)) ? 'selected' : ''}}> {{$item->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="row mb-5">
                            <label for="product_ids">Products</label>
                            <select name="product_ids[]" class="form-select form-select-lg product_ids" id="inc_product" onchange="productData()" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple">
                                <option></option>
                                @if(count($products) > 0)
                                    @foreach($products as $item)
                                    <option class="product{{$item->id}}" value="{{$item->id}}" {{isset($onSale) && $onSale->product_ids != null && in_array($item->id,json_decode($onSale->product_ids)) ? 'selected' : ''}}> {{$item->name_en}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div> 
                        <div class="row mb-5">
                            <label for="exclude_products">Exclude Products</label>
                            <select name="exclude_products[]" class="form-select form-select-lg" id="exc_product" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple">
                                <option></option>
                                @if(count($products) > 0)
                                    @foreach($products as $item)
                                    <option class="product{{$item->id}}" value="{{$item->id}}" {{isset($onSale) && $onSale->exclude_products != null && in_array($item->id,json_decode($onSale->exclude_products)) ? 'selected' : ''}}> {{$item->name_en}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="row mb-5">
                            <label for="recommend_products">Recommend Products</label>
                            <select name="recommend_products[]" class="form-select form-select-lg" id="recom_product" data-control="select2" data-placeholder="Select an option" data-allow-clear="true" multiple="multiple">
                                <option></option>
                                @if(count($products) > 0)
                                    @foreach($products as $item)
                                    <option class="product{{$item->id}}" value="{{$item->id}}" {{isset($onSale) && $onSale->recommend_products != null && in_array($item->id,json_decode($onSale->recommend_products)) ? 'selected' : ''}}> {{$item->name_en}}</option>
                                    @endforeach
                                @endif 
                            </select>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel">
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <label for="usage_time">Usage Time</label>
                                <input type="number" name="usage_time" class="form-control" value="{{isset($onSale) ? $onSale->usage_time : ''}}">
                            </div>
                            <div class="col-md-6">
                                <label for="usage_limit_per_member">Usage Limit Per Member</label>
                                <input type="number" name="usage_limit_per_member" class="form-control" value="{{isset($onSale) ? $onSale->usage_limit_per_member : ''}}">
                            </div>
                        </div>
                        
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <label for="product_limit_type">Product Limit Type</label>
                                <select class="form-select" name="product_limit_type" data-control="select2" data-placeholder="Select an option">
                                     <option></option>
                                     @if(count(config('mediq.product_limit_types')) > 0)
                                     @foreach(config('mediq.product_limit_types') as $key => $item)
                                     <option value="{{ $key}}" {{isset($onSale) && $onSale->product_limit_type ==  $key ? 'selected' : ''}}> {{$item}}</option>
                                     @endforeach
                                     @endif
                                 </select>
                            </div>
                            <div class="col-md-6">
                                <label for="member_type">Member Type</label>
                                <select class="form-select" name="member_type" data-control="select2" data-placeholder="Select an option">
                                     <option></option>
                                     @if(count(config('mediq.member_types')) > 0)
                                     @foreach(config('mediq.member_types') as $key => $item)
                                     <option value="{{ $key}}" {{isset($onSale) && $onSale->member_type ==  $key ? 'selected' : ''}}> {{$item}}</option>
                                     @endforeach
                                     @endif
                                 </select>
                            </div>
                        </div><br>
                        <div id="onSaleProducts">
                            <div class="row mb-3">
                                <div class="col-md-9">

                                </div>
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-primary float-md-end" @click="addSaleProduct()"><i class="bi bi-plus" aria-hidden="true"></i></button>
                                </div>
                            </div>
                            <div class="row mb-5" v-for="(saleProduct,pindex) in saleProducts" :key="pindex">
                                <div class="col-md-6">
                                    <label for="product_id">Products</label>
                                    <select  v-model="saleProduct.product_id" class="form-control" v-bind:name="inputName(pindex, 'product_id')" >
                                        <option disabled value=""> Select Product</option>
                                        <option v-for="(product,indexKey) in products" :key="indexKey" :value="product.id"> @{{product.name_en}}</option>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <label for="usage_limit_per_sale">Usage Limit Per Sale</label>
                                    <input type="number" v-model="saleProduct.usage_limit_per_sale" v-bind:name="inputName(pindex, 'usage_limit_per_sale')" class="form-control">
                                </div>
                                <div class="col" style="margin: auto 0;padding-top: 15px;">
                                    <button type="button" @click="removeSaleProduct(pindex)" class="btn btn-sm-light btn-color-danger">X</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@extends('admin.layouts.master')
@section('title', 'Edit OnSale')
@section('breadcrumb', 'OnSale')
@section('breadcrumb-info', 'Edit OnSale')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                {!! Form::model($onSale, [
                    'method' => 'PATCH',
                    'url' => ['/admin/on-sale', $onSale->id],
                    'class' => 'form-horizontal'
                    ]) !!}
                    
                    @include ('admin.on-sale.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@include('admin.offer_js.offer_edit_js')
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
<script>
$(function(){
    <?php
        $cate = json_decode($onSale->product_categories);

        $subCate = $onSale->product_sub_categories != null ? json_decode($onSale->product_sub_categories) : null;
        if($onSale->product_sub_categories != null){
            $subCate =  array_map(function($arr) {
                return intval($arr);
            }, $subCate);
        }
       
        $exSubCate = $onSale->exclude_sub_categories != null ? json_decode($onSale->exclude_sub_categories) : [];
        if($onSale->exclude_sub_categories != null){
            $exSubCate =  array_map(function($exarr) {
                return intval($exarr);
            }, $exSubCate);
        }

        $productIds = $onSale->product_ids != null ? json_decode($onSale->product_ids) : [];
        if($onSale->product_ids != null){
            $productIds =  array_map(function($exarr) {
                return intval($exarr);
            }, $productIds);
        }

        $exProductIds = $onSale->exclude_products != null ? json_decode($onSale->exclude_products) : [];
        if($onSale->exclude_products != null){
            $exProductIds =  array_map(function($exarr) {
                return intval($exarr);
            }, $exProductIds);
        }

        $merchantIds = $onSale->merchant_id != null ? json_decode($onSale->merchant_id) : [];
        if($onSale->merchant_id != null){
            $merchantIds =  array_map(function($exarr) {
                return intval($exarr);
            }, $merchantIds);
        }

        $exMerchantIds = $onSale->exclude_merchant_id != null ? json_decode($onSale->exclude_merchant_id) : [];
        if($onSale->exclude_merchant_id != null){
            $exMerchantIds =  array_map(function($exarr) {
                return intval($exarr);
            }, $exMerchantIds);
        }

    ?>

    var cates = {!! json_encode($cate)!!}
    var subCateEdit = {!! json_encode($subCate)!!}
    var exSubCateEdit = {!! json_encode($exSubCate)!!}
    var productIds = {!! json_encode($productIds)!!}
    var exProductIds = {!! json_encode($exProductIds)!!}
    var merchantIds = {!! json_encode($merchantIds)!!}
    var exMerchantIds = {!! json_encode($exMerchantIds)!!}
    mainCate(cates,subCateEdit,exSubCateEdit)
    subCate(cates,subCateEdit,productIds,exProductIds)
    merchantData(subCateEdit,merchantIds,exMerchantIds,productIds,exProductIds)
    productData(subCateEdit,productIds,exProductIds)
    
})


new Vue({
    el : '#onSaleProducts',
    data : {
        saleProduct:{
        product_id: "",
        usage_limit_per_sale: "",
      },
      products :{!! json_encode(old('products', $products)) !!},
      saleProducts :{!! json_encode(old('saleProducts', $onSale->saleProducts)) !!}
    },
    created(){
        // this.addSaleProduct();
    },
    methods :{
        addSaleProduct: function() {
        this.saleProducts.push(Object.assign({}, this.saleProduct));
      },
      removeSaleProduct: function(index){
        this.saleProducts.splice(index,1)
      },
      inputName: function(index, property) {
        return "saleProducts["+index+"]["+property+"]";

        },
    }
});
</script>
@endpush
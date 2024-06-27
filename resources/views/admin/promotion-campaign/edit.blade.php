@extends('admin.layouts.master')
@section('title', 'Edit Promotion Campaign')
@section('breadcrumb', 'Promotion Campaign')
@section('breadcrumb-info', 'Edit Promotion Campaign')
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
                {!! Form::model($promotioncampaign, [
                    'method' => 'PATCH',
                    'url' => ['/admin/promotion-campaign', $promotioncampaign->id],
                    'class' => 'form-horizontal'
                    ]) !!}
                    
                    @include ('admin.promotion-campaign.form', ['formMode' => 'edit'])

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
        $cate = json_decode($promotioncampaign->product_categories);

        $subCate = $promotioncampaign->product_sub_categories != null ? json_decode($promotioncampaign->product_sub_categories) : null;
        if($promotioncampaign->product_sub_categories != null){
            $subCate =  array_map(function($arr) {
                return intval($arr);
            }, $subCate);
        }
       
        $exSubCate = $promotioncampaign->exclude_sub_categories != null ? json_decode($promotioncampaign->exclude_sub_categories) : [];
        if($promotioncampaign->exclude_sub_categories != null){
            $exSubCate =  array_map(function($exarr) {
                return intval($exarr);
            }, $exSubCate);
        }

        $productIds = $promotioncampaign->product_ids != null ? json_decode($promotioncampaign->product_ids) : [];
        if($promotioncampaign->product_ids != null){
            $productIds =  array_map(function($exarr) {
                return intval($exarr);
            }, $productIds);
        }

        $exProductIds = $promotioncampaign->exclude_products != null ? json_decode($promotioncampaign->exclude_products) : [];
        if($promotioncampaign->exclude_products != null){
            $exProductIds =  array_map(function($exarr) {
                return intval($exarr);
            }, $exProductIds);
        }

        $merchantIds = $promotioncampaign->merchant_id != null ? json_decode($promotioncampaign->merchant_id) : [];
        if($promotioncampaign->merchant_id != null){
            $merchantIds =  array_map(function($exarr) {
                return intval($exarr);
            }, $merchantIds);
        }

        $exMerchantIds = $promotioncampaign->exclude_merchant_id != null ? json_decode($promotioncampaign->exclude_merchant_id) : [];
        if($promotioncampaign->exclude_merchant_id != null){
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
    el : '#PromotionProducts',
    data : {
        promotionProduct:{
        product_id: "",
        usage_limit_per_promotion: "",
      },
      products :{!! json_encode(old('products', $products)) !!},
      promotionProducts :{!! json_encode(old('promotionProducts', $promotioncampaign->promotionProducts)) !!}
    },
    created(){
        // this.addPromotionProduct();
    },
    methods :{
        addPromotionProduct: function() {
        this.promotionProducts.push(Object.assign({}, this.promotionProduct));
      },
      removePromotionProduct: function(index){
        this.promotionProducts.splice(index,1)
      },
      inputName: function(index, property) {
        return "promotionProducts["+index+"]["+property+"]";

        },
    }
});
</script>
@endpush
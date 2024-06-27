@extends('admin.layouts.master')
@section('title', 'Create Promotion Campaign')
@section('breadcrumb', 'Promotion Campaign')
@section('breadcrumb-info', 'Create Promotion Campaign')
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

                <form method="POST" action="{{ url('/admin/promotion-campaign') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    @include ('admin.promotion-campaign.form', ['formMode' => 'create'])

                </form>

            </div>
        </div>
    </div>
@endsection
@push('scripts')
@include('admin.offer_js.offer_create_js')
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
<script>
new Vue({
    el : '#PromotionProducts',
    data : {
        promotionProduct:{
        product_id: "",
        usage_limit_per_promotion: "",
      },
      products :{!! json_encode(old('products', $products)) !!},
      promotionProducts :[]
    },
    created(){
        this.addPromotionProduct();
    },
    methods :{
        addPromotionProduct: function() {
        this.promotionProducts.push(JSON.parse(JSON.stringify(this.promotionProduct)));
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


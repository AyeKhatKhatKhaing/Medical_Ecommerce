@extends('admin.layouts.master')
@section('title', 'Create OnSale')
@section('breadcrumb', 'OnSale')
@section('breadcrumb-info', 'Create OnSale')
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

                <form method="POST" action="{{ url('/admin/on-sale') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    @include ('admin.on-sale.form', ['formMode' => 'create'])

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
    el : '#onSaleProducts',
    data : {
        saleProduct:{
        product_id: "",
        usage_limit_per_sale: "",
      },
      products :{!! json_encode(old('products', $products)) !!},
      saleProducts :[]
    },
    created(){
        this.addSaleProduct();
    },
    methods :{
        addSaleProduct: function() {
        this.saleProducts.push(JSON.parse(JSON.stringify(this.saleProduct)));
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

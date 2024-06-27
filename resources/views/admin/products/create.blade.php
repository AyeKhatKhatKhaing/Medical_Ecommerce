@extends('admin.layouts.master')
@section('title', 'Create Product')
@section('breadcrumb', 'Product')
@section('breadcrumb-info', 'Create Product')
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

            <form method="POST" action="{{ url('/admin/products') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}

                @include ('admin.products.form', ['formMode' => 'create'])

            </form>

        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
<script>

    $(document).ready(function() {
        $('#lfm-img').filemanager('file');
        $('#lfm-meta-image').filemanager('file');
        $('#lfm-img-gallery').filemanager('file');
    })

    new Vue({
        el: '#variableProduct',
        data: {
            variable: {
                product_code: "",
                name_en: "",
                name_tc: "",
                name_sc: "",
                sku: "",
                original_price: "",
                discount_price: "",
                promotion_price: "",
                stock: "",
                number_of_dose: "",
            },
            variables: []
        },
        created() {
            this.addVariable();
        },
        methods: {
            addVariable: function() {
                this.variables.push(JSON.parse(JSON.stringify(this.variable)));
            },
            removeVariable: function(index) {
                this.variables.splice(index, 1)
            },
            inputName: function(index, property) {
                return "variables[" + index + "][" + property + "]";

            },
        }
    });
    $('.category_id').click(function() {
        var cval = $(this).val();
        if (cval == 2) {
            $('.control-label-dose').html('Number Of Dose');
            $('.number_of_dose').attr('hidden',false)
        } else {
            $('.control-label-dose').html('Number Of Item');
            $('.number_of_dose').attr('hidden',false)
        }
        $('.sub_category_id').prop('checked', false);
        var subCategories = <?= json_encode($subCategories) ?>;
        subCategories.forEach(function(item, key) {
            if (cval == item.category_id) {
                $('#sub_category_id' + item.id).removeAttr('disabled');
            } else {
                $('#sub_category_id' + item.id).prop("disabled", true);
            }
        })
    })

    function merchant() {
        let merchant_id = $('.merchant_id').val();
        var planProcess = <?= json_encode($planProcess) ?>;
        var planDescription = <?= json_encode($planDescription) ?>;
        var packages = <?= json_encode($packages) ?>;
        var addOnItems = <?= json_encode($addOnItems) ?>;
        var merchantLocations = <?= json_encode($merchantLocations) ?>;
        console.log(addOnItems);
        planProcess.forEach(function(item, key) {
            if (merchant_id == item.merchant_id) {
                $('.plan_process' + item.merchant_id).removeAttr('hidden');
            } else {
                $('.plan_process' + item.merchant_id).prop("hidden", true);
            }
        })
        planDescription.forEach(function(item, key) {
            if (merchant_id == item.merchant_id) {
                $('.plan_description' + item.merchant_id).removeAttr('hidden');
            } else {
                $('.plan_description' + item.merchant_id).prop("hidden", true);
            }
        })
        packages.forEach(function(item, key) {
            if (merchant_id == item.merchant_id) {
                $('.package' + item.merchant_id).removeAttr('hidden');
            } else {
                $('.package' + item.merchant_id).prop("hidden", true);
            }
        })
        addOnItems.forEach(function(item, key) {
            if (merchant_id == item.merchant) {
                $('.addon' + item.merchant).removeAttr('hidden');
            } else {
                $('.addon' + item.merchant).prop("hidden", true);
            }
        })

        merchantLocations.forEach(function(item, key) {
            $('.merchant_locations' + item.merchant_id + " #merchant_locations"+item.id).prop('checked',false);
            if (merchant_id == item.merchant_id) {
                $('.merchant_locations' + item.merchant_id).removeAttr('hidden');
            } else {
                $('.merchant_locations' + item.merchant_id).prop("hidden", true);
            }
        })
        $('.plan').removeAttr('hidden')
        $('.add_on').removeAttr('hidden')
    }

</script>

@endpush

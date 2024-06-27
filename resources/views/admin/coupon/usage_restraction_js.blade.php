<script>
$(function(){
    let owner_type = $('input[name="owner_type"]:checked').val();
    if(owner_type != null && owner_type == 0){
        $('.merchant').hide();
        $('.owner_logo').show();
    }else{
        $('.merchant').show();
        $('.owner_logo').hide();
    }

    let couponType = {!! json_encode(Request::get('coupon_type')) !!}
    if(couponType == null){
        $('.is_required_date').attr('hidden',false)
        $('.start_date').attr('required',true)
        $('.end_date').attr('required',true)
    }else{
        $('.usage_time').attr('hidden',true)
    }
    console.log(couponType);
})

function ownerType(key){
    if(key == 0){
        $('.merchant').hide();
        $('.owner_logo').show();
    }else{
        $('.merchant').show();
        $('.owner_logo').hide();
    }
}

function mainCate(){
    let category_id = $('.product_cate').val();
    var subCategories = {!! json_encode($subCategories)!!}
    let merchant_id = $('.merchant_id').val();
    $.ajax({
        type:'get',
        url:"{{route('product-categories')}}",
        data: {'category_id':category_id ,'merchant_id':merchant_id},
        success:function(res){
            var options='';
            if(res.categories.length > 0) {
                options+="<option></option>"
            }
            res.categories.forEach(function(item,key){
                options += `<option value="${item.id}"> ${item.name_en}</option>`
            })
            var p_options ='';
            res.products.forEach(function(item,key){
                p_options += `<option value="${item.id}"> ${item.name_en}</option>`
            })
            $('#inc_category').html(options);
            $('#exc_category').html(options);
            $('#inc_product').html(p_options);
            $('#exc_product').html(p_options);

            // $('#exc_category').show();
        }
    })
}
function subCate(){
    let product_cate = $('.proSubCate').val();
    var category_id = $(".product_cate").val();
    let merchant_id = $('.merchant_id').val();
    $.ajax({
        type:'get',
        url:"{{route('product-sub-categories')}}",
        data: {'product_cate':product_cate,'category_id':category_id ,'merchant_id':merchant_id},
        success:function(res){
            console.log(res.products)
            var poptions='';
            // if(res.products.length > 0) {
            //     poptions+="<option></option>"
            // }
            res.products.forEach(function(item,key){
                poptions += `<option value="${item.id}"> ${item.name_en}</option>`
            })
            $('#inc_product').html(poptions);
            $('#exc_product').html(poptions);
            // $('#recom_product').html(poptions);

            if(product_cate != null && product_cate.length > 0){
                var coptions='';
                if(res.categories.length > 0) {
                    coptions+="<option></option>"
                }
                res.categories.forEach(function(item,key){
                    coptions += `<option value="${item.id}"> ${item.name_en}</option>`
                })
                $('#exc_category').html(coptions);
            }
        }
    })
}
function merchantData(){
    let product_cate = $('.proSubCate').val();
    let category_id = $('.product_cate').val();
    let merchant_id = $('.merchant_id').val();

    $.ajax({
        type:'get',
        url:"{{route('merchant-data')}}",
        data: {'product_cate':product_cate,'category_id':category_id, 'merchant_id':merchant_id},
        success:function(res){
            var mpoptions='';
            // if(res.products.length > 0) {
            //     mpoptions+="<option></option>"
            // }
            res.products.forEach(function(item,key){
                mpoptions += `<option value="${item.id}"> ${item.name_en}</option>`
            })
            $('#inc_product').html(mpoptions);
            $('#exc_product').html(mpoptions);
            // $('#recom_product').html(mpoptions);

            // var moptions='';
            // res.exc_merchants.forEach(function(item,key){
            //     moptions += `<option value="${item.id}"> ${item.name_en}</option>`
            // })
            // $('#exc_merchant').html(moptions);
        }
    })
}
function productData(){
    let category_id = $('.product_cate').val();
    let product_cate = $('.proSubCate').val();
    let product_ids = $('.product_ids').val();
    let merchant_id = $('.merchant_id').val();
    $.ajax({
        type:'get',
        url:"{{route('product-data')}}",
        data: {'merchant_id':merchant_id,'category_id':category_id,'product_cate':product_cate,'product_ids':product_ids},
        success:function(res){
            var poptions='';
            // if(res.exProducts.length > 0) {
            //     poptions+="<option></option>"
            // }
            res.exProducts.forEach(function(item,key){
                poptions += `<option value="${item.id}"> ${item.name_en}</option>`
            })
            $('#exc_product').html(poptions);

            // var recomoptions= '';
            // res.recomProducts.forEach(function(item,key){
            //     recomoptions += `<option value="${item.id}"> ${item.name_en}</option>`
            // })
            // $('#recom_product').html(recomoptions);
        }
    })
}
</script>
<script>
    function mainCate(cate = null,subCateEdit = null,exSubCateEdit = null){
    console.log('sdfdsf',exSubCateEdit)
    var category_id = $('.product_cate').val();
    $.ajax({
        type:'get',
        url:"{{route('product-categories')}}",
        data: {'category_id':category_id,'subCateEdit':subCateEdit},
        success:function(res){
            var options='';
            res.categories.forEach(function(item,key){
                var is_selected = ''
                if(subCateEdit != null){
                    if($.inArray(item.id, subCateEdit) != -1){
                        var is_selected = 'selected'
                    }
                }
                options += `<option value="${item.id}" ${is_selected} > ${item.name_en}</option>`
            })
            $('#inc_category').html(options);

            var ex_options='';

            console.log('exSubCateEdit',exSubCateEdit,subCateEdit)
            res.excates.forEach(function(item,key){
                var is_ex_selected = ''
                if(exSubCateEdit != null){

                    if($.inArray(item.id, exSubCateEdit)  != -1){
                        var is_ex_selected = 'selected'
                    }
                    
                }
                ex_options += `<option value="${item.id}" ${is_ex_selected} > ${item.name_en}</option>`
            })
            $('#exc_category').html(ex_options);
        }
    })
}
function subCate(cate = null, subCateEdit = null,pro = null,exProductIds = null){
    var category_id = $(".product_cate").val();
    var product_cate = $(".proSubCate").val();
    $.ajax({
        type:'get',
        url:"{{route('product-sub-categories')}}",
        data: {'product_cate':product_cate,'category_id':category_id, 'pro':pro},
        success:function(res){
            var poptions='';
            res.products.forEach(function(item,key){
                var is_selected = ''
                if(pro != null){
                    if($.inArray(item.id, pro) != -1){
                        var is_selected = 'selected'
                    }
                }
                poptions += `<option value="${item.id}" ${is_selected}> ${item.name_en}</option>`
            })
            $('#inc_product').html(poptions);
            $('#recom_product').html(poptions);

            var expoptions='';
            res.exproducts.forEach(function(item,key){
                var is_selected = ''
                if(pro != null){
                    if($.inArray(item.id, pro) != -1){
                        var is_selected = 'selected'
                    }
                }
                expoptions += `<option value="${item.id}" ${is_selected}> ${item.name_en}</option>`
            })
            $('#exc_product').html(expoptions);

            if(subCateEdit == null){
                var coptions='';
                res.categories.forEach(function(item,key){
                    coptions += `<option value="${item.id}"> ${item.name_en}</option>`
                })
                $('#exc_category').html(coptions);
            }
        }
    })
}
function productData(subCateEdit = null, pro = null, exProductIds = null){
    let product_cate = $('.proSubCate').val();
    let product_ids = $('.product_ids').val();
    $.ajax({
        type:'get',
        url:"{{route('product-data')}}",
        data: {'product_cate':product_cate,'product_ids':product_ids},
        success:function(res){
            var poptions='';
            res.exProducts.forEach(function(item,key){
                var is_selected = ''
                if(exProductIds != null){
                    if($.inArray(item.id, exProductIds) != -1){
                        var is_selected = 'selected'
                    }
                }
                poptions += `<option value="${item.id}" ${is_selected}> ${item.name_en}</option>`
            })
            $('#exc_product').html(poptions);

            var recomoptions= '';
            res.recomProducts.forEach(function(item,key){
                recomoptions += `<option value="${item.id}"> ${item.name_en}</option>`
            })
            $('#recom_product').html(recomoptions);
        }
    })
}

function merchantData(subCate = null,merchantIds = null, exMerchantIds = null, productIds = null, exProductIds){
    let product_cate = $('.proSubCate').val();
    let merchant_id = $('.merchant_id').val();
    $.ajax({
        type:'get',
        url:"{{route('merchant-data')}}",
        data: {'product_cate':product_cate,'merchant_id':merchant_id, 'exMerchantIds':exMerchantIds, 'productIds':productIds,'merchantIds':merchantIds},
        success:function(res){
            var poptions='';

            res.products.forEach(function(item,key){
                var is_selected = ''
                if(productIds != null){
                    if($.inArray(item.id, productIds) != -1){
                        var is_selected = 'selected'
                    }
                }
                poptions += `<option value="${item.id}" ${is_selected}> ${item.name_en}</option>`
            })
            $('#inc_product').html(poptions);
            $('#recom_product').html(poptions);

            var expoptions='';
            res.ex_products.forEach(function(item,key){
                var is_selected = ''
                if(exProductIds != null){
                    if($.inArray(item.id, exProductIds) != -1){
                        var is_selected = 'selected'
                    }
                }
                expoptions += `<option value="${item.id}" ${is_selected}> ${item.name_en}</option>`
            })
            $('#exc_product').html(expoptions);

            var moptions='';
            res.exc_merchants.forEach(function(item,key){
                var is_selected = ''
                if(exMerchantIds != null){
                    if($.inArray(item.id, exMerchantIds) != -1){
                        var is_selected = 'selected'
                    }
                }
                moptions += `<option value="${item.id}" ${is_selected}> ${item.name_en}</option>`
            })
            $('#exc_merchant').html(moptions);
        }
    })
}
</script>
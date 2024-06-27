var app_url = window.location.protocol;
var productNam = '';
if(lng == 'zh-hk'){
    productName = 'name_tc';
}else if(lng == 'zh-cn'){
    productName = 'name_sc';
}else{
    productName = 'name_en';
}

$(function() {
    addToCart()
})

function collect(coupon_id, bundle_coupon_id = null, all_check = null) {
    // alert(coupon_id)
    $.ajax({
        url: app_url+"/collect-coupon",
        data: {
            'coupon_id': coupon_id,
            'merchant_id': bundle_coupon_id,
            'all_check': all_check
        },
        type: 'get',
        success: function(res) {
            if (res.collet_coupons.lenght > 0) {
                res.collet_coupons.forEach(function(item, key) {
                    $('.collect_coupon' + res.coupon_id).removeClass('collect')
                    $('.collect_coupon' + res.coupon_id).addClass('collected')
                    $('#popup_coupon' + res.coupon_id).addClass('pointer-events-none')
                    $('#popup_coupon' + res.coupon_id).empty()
                    $('#popup_coupon' + res.coupon_id).append(collectText)
                    $('.details-collect-coupon' + res.coupon_id).append(collectText)
                })
            } else {
                console.log($('#popup_coupon' + res.coupon_id))
                $('.collect_coupon' + res.coupon_id).removeClass('collect')
                $('.collect_coupon' + res.coupon_id).addClass('collected')
                $('#popup_coupon' + res.coupon_id).addClass('pointer-events-none')
                $('#popup_coupon' + res.coupon_id).empty()
                $('#popup_coupon' + res.coupon_id).html(collectText)
                $('#popup_coupon' + res.coupon_id).addClass('text-d1')
                $(".collect-view-btn[data-id='" + res.coupon_id + "']").html(collectText)
                $(".collect-view-btn[data-id='" + res.coupon_id + "']").addClass('text-d1')
                $('.details-collect-coupon' + res.coupon_id).html(collectText)
            }
        }
    });
}
function removeCart(product_id ,url){
    addToCart(product_id,url,'remove')
}
function addToCart(product = null, url = null, action = null) {
    if(url == null){
        var url = '/add-to-cart';
    }
    var productVal = null ;
    if(product != null){
        if(Number.isInteger(product) == true){ // for remove and addToCart function from dom
            productVal = product;
        }else{
            if(product && product.product_type == 3 && action != 'remove'){ // for addToCart function from blade
                var str = product.category.name_en;
                cate_str = str.replace(/\s+/g, "-");
                // debugger
                window.location.href = window.location.origin+'/'+lng+'/product/'+cate_str+'/'+product.slug_en;
            }
            productVal = product.id;
        }
        console.log('int', Number.isInteger(product))

    }
    // debugger

    
    console.log(url)
    
    $.ajax({
        url:app_url+url,
        data: {
            'product_id': productVal ? productVal : null
        },
        type: 'get',
        success: function(res) {
            addToCartRes(res,action);
        }
    });
}

function addToCartRes(res, action) {
    function formatNumber(input) {
        const numericValue = parseInt(input, 10);
        if (isNaN(numericValue)) {
          console.error('Invalid input');
          return null;
        }
        const formattedValue = numericValue.toLocaleString('en-US');
        return formattedValue;
    }
    if (res.cart == 0) {
        $('#add_cart_val').addClass('hidden');
    }
    else {
        $('#add_cart_val').removeClass('hidden');
    }
    if (res.cart == 0) {
        $('#add_cart_val_mobile').addClass('hidden');
    }
    else {
        $('#add_cart_val_mobile').removeClass('hidden');
    }
    $('#add_cart_val').html(res.cart)
    $('#add_cart_val_mobile').html(res.cart)
    $('.total_cart_price').html('$'+ formatNumber(res.total_price))
    $('.total_cart_no').html(res.all_carts.length)
    if (res.all_carts.length == 1 && lng == 'en') {
        $('.cart_total_result').html('item')  
    }
    else if (res.all_carts.length > 1 && lng == 'en') {
        $('.cart_total_result').html('items')
    }
    else if (lng == 'zh-hk'){
        $('.cart_total_result').html('項')  
    }
    else if (lng == 'zh-cn'){
        $('.cart_total_result').html('项')  
    }
   
    if(res.all_carts.length == 0){
        $('.checkout_btn').addClass('disabled opacity-50 pointer-events-none');
        $('#no_data').removeClass('hidden');
        $('#no_data_m').removeClass('hidden');
        $('#with_data').addClass('hidden');
        $('#with_data_m').addClass('hidden');
    }else{
        $('.checkout_btn').removeClass('disabled opacity-50 pointer-events-none');
        $('#no_data').addClass('hidden');
        $('#no_data_m').addClass('hidden');
        $('#with_data').removeClass('hidden');
        $('#with_data_m').removeClass('hidden');
    }
    var options = '';
    var options_mobile = '';
    res.all_carts.forEach(function(item, key) {
        console.log(item.product.merchant)
        // options += `<option value="${item.id}" ${is_selected} > ${item.name_en}</option>`;
        options += `<li
            class="hover:bg-mee4 pl-[20px] pr-[10px] flex items-center justify-start message-dropdown-item pt-[10px] pb-[10px] ">`;
        if(item.product.merchant){
            options +=    `<img src="${item.product.merchant.icon}" alt="fav icon" class="cartimage object-cover" style="width:50px;height:50px"/>`;
        }
        else{
            options +=    `<img src="${item.product.featured_img}" alt="fav icon" class="cartimage object-cover" style="width:50px;height:50px"/>`;
        }
        options +=   `
            <div class="ml-[13px] w-full">
                <div class="flex justify-between items-baseline">
                    <p class="me-fav-title">${item.product[productName]}</p>
                </div>
                <div class="flex justify-between items-baseline price-container">
                    <p class="invalid-text"></p>
                    <div class="flex justify-center items-center quantity-container">
                        <button class="minus-btn mr-[12px]" onclick="removeCart(${item.product.id},'/remove-cart')">-</button>
                        <input type="text" value="${item.qty}"
                            class="border border-[#E4E4E4] rounded-[4px] total-value w-[34px] h-[28px]" readonly>
                        <button class="plus-btn ml-[12px]" onclick="addToCart(${item.product.id},'/add-to-cart','add')">+</button>
                    </div>
                </div>
            </div>
        </div>
    </li>
    `;
        
    options_mobile += `<li
            class="flex items-center justify-start message-dropdown-item pt-[10px] pb-[10px]">`;
    
            if(item.product.merchant){
                options_mobile +=    `<img src="${item.product.merchant.icon}" alt="fav icon" class="cartimage object-cover" style="width:50px;height:50px"/>`;
            }
            else{
                options_mobile +=    `<img src="${item.product.featured_img}" alt="fav icon" class="cartimage object-cover" style="width:50px;height:50px"/>`;
            }
           
    options_mobile += `   <div class="ml-[13px] w-full">
                <div class="flex justify-between items-baseline">
                    <p class="me-fav-title">${item.product[productName]}</p>
                </div>
                <div class="flex justify-between items-baseline price-container">
                    <p class="invalid-text"></p>
                    <div class="flex justify-center items-center quantity-container">
                        <button class="minus-btn mr-[12px]" onclick="removeCart(${item.product.id},'/remove-cart')">-</button>
                        <input type="text" value="${item.qty}"
                            class="border border-[#E4E4E4] rounded-[4px] total-value w-[34px] h-[28px]" readonly>
                        <button class="plus-btn ml-[12px]" onclick="addToCart(${item.product.id},'/add-to-cart','add')">+</button>
                    </div>
                </div>
            </div>
        </div>
        </li>
        `;
    
    })
    $('.cart_items').html(options)
    $('#cart_items_m').html(options_mobile)
    var remove_product = `${window.translations.remove_product}`;
    if(action != null && action == 'remove'){
        toastr.success(remove_product);
    }
    if (res.all_carts.length > 0 && action != null && action == 'add') {
        // toastr.success("Added a product to cart!");
        const e = $(".preview-reminder-popup");
            e.removeClass("hidden fade-out"),
                e.addClass("fade-in"),
                setTimeout(() => {
                    e.addClass("fade-out"),
                        e.removeClass("fade-in"),
                        setTimeout(() => {
                            e.addClass("hidden");
                        }, 1e3);
                }, 3e3);
        console.log("show")
    }
}
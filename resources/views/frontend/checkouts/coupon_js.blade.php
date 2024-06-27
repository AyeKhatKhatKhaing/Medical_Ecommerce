<script>
let promoCodeTxt = "{{__('labels.check_out.promo_code')}}"
let couponCodeTxt = "{{__('labels.check_out.coupon_code')}}"
$(function() {
    $('.before-choose-coupon').removeClass('hidden')
})

function coupon_apply(coupon_id, price, discount_type,minimum_spend) {
    $('.code_price').val(price)
    $('.code_id').val(coupon_id)
    console.log('ids',discount_type,coupon_id)
    $('.discount_type').val(discount_type)
    $('.minimum_amount').val(minimum_spend)
}

$('.use-promo-code-btn').click(function() {
    let price = $('.code_price').val()
    let discount_type =  $('.discount_type').val()
    console.log('discount_type',discount_type);
    var str_total = $('.summary-card-total-price').val()
    if (str_total == '') {
        str_total = $('.summarytotal').val()
    }
    let t_item = changeCurrencyToInt(str_total)
    var percent = '';
    if(discount_type == 'percent'){
        var subtotal =  (parseInt(t_item) / 100)* parseInt(price);
        var totalPrice = parseInt(t_item) - subtotal;
        var alltotal =  Math.round(totalPrice)
        $('.my_discount').html('-'+parseInt(price)+'%');
    }else{
        if(parseInt(t_item) > parseInt(price)){
            var alltotal = parseInt(t_item) - parseInt(price);
        }else{
            var alltotal = 0
        }
        $('.my_discount').html('- '+floatToCurrency(parseInt(price)));
    }
    console.log('price', parseInt(price), price, t_item, str_total, $('.summary-card-total-price').val(),alltotal)
    $('.summary-last-total').text('HK'+floatToCurrency(alltotal))
    $('.my_discount').removeClass('hidden')
    $('.code_type').val('coupon_code')
    $('.coupon-promo-code').text(couponCodeTxt)
    $('.is_hidden_dis').removeClass('hidden');
})


// $('.remove-promo-code').click(function() {
    function remove_promo_code(){
        let price = $('.code_price').val()
        let total = $('.summary-card-total-price').val()
        if (total == '') {
            total = $('.summarytotal').val()
        }
        let t_item = changeCurrencyToInt(total)
        $('.summary-last-total').text('HK'+floatToCurrency(parseInt(t_item)))
        $('.my_discount').addClass('hidden')
        $('.is_hidden_dis').addClass('hidden');
        inputPromoCode();
        
    }
// })

$('.use-promo-code-btn-input-text').click(function() {
    let promo_code = $('.promo-code').val()
    console.log('promo_code',promo_code)
    $('.code_type').val('promo_code')
    $.ajax({
        type: 'POST',
        url: "{{route('checkout.checkPromoCode')}}",
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        data: {
            'code': promo_code
        },
        async: false, // open new tab 
        success: function(response) {
            console.log('response',response.promo_code)
            if (response.status == 200 && response.promo_code != null) {
                let promo_code = response.promo_code;
                $('.my_discount').removeClass('hidden')
                $('.my_discount').html('- ' + floatToCurrency(parseInt(promo_code.amount)))
                $('.code_price').val(promo_code.amount)
                var str_total = $('.summary-card-total-price').val()
                if (str_total == '') {
                    str_total = $('.summarytotal').val()
                }
                let t_item = changeCurrencyToInt(str_total)
                
                if(parseInt(t_item) > parseInt(promo_code.amount)){
                    var alltotal = parseInt(t_item) -  parseInt(promo_code.amount);
                }else{
                    var alltotal = 0
                }
                // console.log('price', parseInt(price), price, t_item, str_total, $('.summary-card-total-price').val())
                $('.summary-last-total').text('HK'+floatToCurrency(alltotal))
                $('.code_id').val(promo_code.id)
                $('.promo-code-text').text(promo_code.code);
                $('.after-choose-coupon').removeClass('hidden');
                $('.promo-code-error').addClass('hidden')
                $('.coupon-promo-code').html(promoCodeTxt)
                $('.is_hidden_dis').removeClass('hidden');
            } else {
                console.log('testt',response.promo_code)
                $('.promo-code-error').removeClass('hidden')
                $('.after-choose-coupon').addClass('hidden');
                $('.is_hidden_dis').addClass('hidden');
            }
            $('.before-choose-coupon').addClass('hidden')
        }
    })
})
</script>
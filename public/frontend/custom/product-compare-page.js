if(lng=='zh-hk'){
    lng='tc';
}else if(lng=='zh-cn'){
    lng='sc';
}
function getRemoveUrl(removeId = null) {
    const urlParams = new URLSearchParams(window.location.search);
    let p1 = "",
        p2 = "",
        p3 = "",
        p4 = "";
    if (urlParams.get('p1')) {
        p1 = urlParams.get('p1');
        if (removeId != null && removeId == p1) {
            p1 = "";
        }
    }
    if (urlParams.get('p2')) {
        p2 = urlParams.get('p2');
        if (removeId != null && removeId == p2) {
            p2 = "";
        }
    }
    if (urlParams.get('p3')) {
        p3 = urlParams.get('p3');
        if (removeId != null && removeId == p3) {
            p3 = "";
        }
    }
    if (urlParams.get('p4')) {
        p4 = urlParams.get('p4');
        if (removeId != null && removeId == p4) {
            p4 = "";
        }
    }
    urlParams.set('p1', p1);
    urlParams.set('p2', p2);
    urlParams.set('p3', p3);
    urlParams.set('p4', p4);

    let main_url = window.location.href.split('?')[0];
    main_url += "?" + urlParams.toString();
    window.history.pushState('', '', main_url);
    return main_url;
}
$("body").on("click", ".btn-remove-product", function () {
    var remove_product = `${window.translations.remove_product}`;
    let url = getRemoveUrl($(this).attr("data-id"));
    $(".btn-remove-product").prop("disabled",true);
    $.ajax({
        url: url,
        cache: false,
    }).done(function (data) {
        toastr.success(remove_product);
        $(".btn-remove-product").prop("disabled",false);
        $('.product-compare-content-list').html(data);
        $(".four-card-div .ccs-card").length==0? $(".four-card-div").css({"justify-content":"center"}):$(".four-card-div").removeAttr("style")
    }).fail(function () {
        alert('Data could not be loaded.');
    });
    // $(this).parent().remove();
});

$("body").on("click", ".complus-btn", function () {
    //$(".modal-content").css("min-width", "528px");
    let pids = $("#productIdsHidden").val();
    pids = JSON.parse(pids);
    if (pids.length == 0) {
        pids = [];
    }
    $.ajax({
        url: suggestionRouteUrl,
        type: "POST",
        data: JSON.stringify({
            pids: pids,
            selectedCategory: selectedCategory
        }),
        dataType: "json",
        contentType: "application/json",
        success: function (data) {
            // console.log(data)
            var compare = `${window.translations.comparing}`;
            $(".recently-or-recommended-text").html(data.data.recentlyOrRecommended)
            let content = "";
            $(".suggestion-product-list").html("");
            $.each(data.data.suggestionProducts, function ($k, value) {
                let priceContent = "";
                if(value.discount_price!=null){
                    priceContent+=`<p class="font-bold text-mered me-body20">$` + value.discount_price +
                    `</p>
                            <p class="font-bold text-lightgray me-body14 pl-[10px]"><span class="linethrough">$` +
                    value.original_price + `</span></p>`
                }else{
                    priceContent+=`<p class="font-bold text-mered me-body20">$` + value.original_price +
                    `</p>`;
                }
                content += `<div class="relative flex items-center py-5 compare-img-container">
                    <div class="comp-img mr-[12px]">
                        <img src="`+ (value.icon!=null? value.icon : (value.featured_img!=null?value.featured_img:'frontend/img/quality-healthcare.png')) +`" alt="image" class="w-[80px] h-[80px] rounded-[12px]">
                    </div>
                    <div  class="comp-title">
                        <p class="w-[307px] leading-tight helvetica-normal text-darkgray font-bold me-body18 title">` +
                        value[`name_${lng}`] + `</p>
                        <div class="flex items-center">
                          `+priceContent+`
                        </div>
                    </div>
                    <div class="comp-btn mx-auto">
                        <button type="button" class="mx-auto border border-darkgray rounded-full text-darkgray bg-whitez font-bold font-secondary me-body16 hover:border-blueMediq hover:text-whitez w-[40px] 
                        h-[40px] flex justify-center items-center new-compare-btn" data-id="` + value.id + `">
                        <img src="../../../frontend/img/icon1.svg" alt="icon1" class="w-[24px]"></button>
                        <p class="me-body14 text-blueMediq text-center comparing-text">`+ compare +`</p>
                    </div>
                </div>`;
            });
            $(".suggestion-product-list").html(content);
        }
    });
});

function getAddUrl(newCompareProductId) {

    const urlParams = new URLSearchParams(window.location.search);
    let checkOk = false;
    if (urlParams.get('p1').length == 0) {
        urlParams.set('p1', newCompareProductId);
        checkOk = true;
    }
    if (checkOk == false && urlParams.get('p2').length == 0) {
        urlParams.set('p2', newCompareProductId);
        checkOk = true;
    }
    if (checkOk == false && urlParams.get('p3').length == 0) {
        urlParams.set('p3', newCompareProductId);
        checkOk = true;
    }
    if (checkOk == false && urlParams.get('p4').length == 0) {
        urlParams.set('p4', newCompareProductId);
        checkOk = true;
    }

    let main_url = window.location.href.split('?')[0];
    main_url += "?" + urlParams.toString();
    window.history.pushState('', '', main_url);
    return main_url;
}

$("body").on("click", ".new-compare-btn", function (e) {
    e.preventDefault();
    pids = JSON.parse($("#productIdsHidden").val());
    if(pids.length == 4) { 
        $("#compare-message3").removeClass("hidden");
        compareStatusAutoClose();
        return false;
    }
    let newCompareProductId = $(this).attr("data-id");
    url = getAddUrl(newCompareProductId);
    $(".new-compare-btn").prop('disabled', true);
    let btn = this;
    pids.push(parseInt(newCompareProductId));
    $.ajax({
        url: url,
        cache: false,
    }).done(function (data) {
        $('.product-compare-content-list').html(data);
        $(btn).parent().parent().addClass("selected");
        $(".new-compare-btn").each(function () {
            let currentID = parseInt($(this).attr("data-id"));
            if(!pids.includes(currentID)){
                $(this).prop('disabled', false);
            }
        });

    }).fail(function () {
        alert('Data could not be loaded.');
    });
});

function copyUrl() {
    var copyText = document.getElementById("copytext");
    copyText.select();
    copyText.setSelectionRange(0, 99999); // For mobile devices
    navigator.clipboard.writeText(copyText.value);
    toastr.success(copied);
}

let merchant_id = 0;
$("body").on("click",".has-reminder-alert-box",function(){
    merchant_id = $(this).attr("data-id");
    $(".pcreminder-popup").addClass("flex");
    $("body").addClass("overflow-hidden");
});

$("body").on("click",".pcreminder-popup-close-box-btn",function(){
    $(this).parent().parent().parent().removeClass("flex");
    $("body").removeClass("overflow-hidden");
});

$("body").on("click",".yes-btn",function(){
    alert('yes');
})
$("body").on("click",".no-btn",function(){
    $(".pcreminder-popup").removeClass("flex");
    $("body").removeClass("overflow-hidden");
});

$("body").on("click","#homePage",function(){
    window.location ="/";
});
$("body").on("click","#categoryPage",function(){
   
    const urlParams = new URLSearchParams(window.location.search);

    urlParams.set('pc', subCategories);
    urlParams.set('page', 1)
    urlParams.delete('p1');
    urlParams.delete('p2');
    urlParams.delete('p3');
    urlParams.delete('p4');
    urlParams.delete('compare_page_redirect');
    
    // let main_url = window.location.href;
    let main_url = '/products';
    main_url += "?" + urlParams.toString();
    window.location =main_url;
    
});

if(replyTitle == 'Products cannot be compared, please choose another product.') {
    const urlParams = new URLSearchParams(window.location.search);
    let p1 = "", p2 = "", p3 = "", p4 = "";
    if (productIdList[0] !== undefined) {
        p1 = productIdList[0];
    }
    if (productIdList[1] !== undefined) {
        p2 = productIdList[1];
    }
    if (productIdList[2] !== undefined) {
        p3 = productIdList[2];
    }
    if (productIdList[3] !== undefined) {
        p4 = productIdList[3];
    }
    urlParams.set('p1', p1);
    urlParams.set('p2', p2);
    urlParams.set('p3', p3);
    urlParams.set('p4', p4);

    let main_url = window.location.href.split('?')[0];
    main_url += "?" + urlParams.toString();
    window.history.pushState('', '', main_url);
}






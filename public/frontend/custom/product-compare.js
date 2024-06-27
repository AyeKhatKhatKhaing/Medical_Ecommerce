let lng1 = "en";
if (lng == "zh-hk") {
    lng1 = "tc";
} else if (lng == "zh-cn") {
    lng1 = "sc";
}
$("body").on("click", ".compare_icon", function () {
    this.classList.contains("no-login") || this.classList.toggle("selected");
    let modalid = $(this).data("id");
    let id = $(this).attr("data-product-id");
    let cid = $(this).attr("data-product-category-id");
    let name = $(this).attr("data-product-name");
    let featured_img = $(this).attr("data-product-featured-img");

    if (document.querySelector("#quick-preview-modal" + id) !== null) {
        document.querySelector("#quick-preview-modal" + id).close();
        document.body.style.overflowY = "auto";
    }
    // alert message four products choose
    if ($("#" + modalid + " .selected-items").children().length > 4) {
        $("#compare-message3").removeClass("hidden");
        compareStatusAutoClose();
        return;
    }
    // only one puls sign button
    let data =
        `<div id="selected-item" class="selected-items-data flex items-start selected-items-box relative w-1/4" data-item-id="` +
        id +
        `" data-item-cid="` +
        cid +
        `">
                  <div class="flex items-center selected-items-box--top pr-[24px]">
                        <p class="selected-items-box--top--img"><img src="` +
        featured_img +
        `" alt="" class="w-[80px] h-[80px] rounded-[12px]"></p>
                        <p class="font-secondary font-medium me-body16 pl-[10px] selected-items-box--top--title">` +
        name +
        `</p>
                  </div>
                  <button class="w-6 h-6 rounded-full bg-meA3 text-white flex items-center justify-center selected-items-box-delete compare-modal- absolute top-0 right-0">
                  <img src="../../../../frontend/img/white-close.svg" alt="close image" class="w-[10px] compare-modal-"/></button>
               </div>`;
    if ($("#" + modalid + " .selected-items").children().length == 1) {
        $("#" + modalid + " .selected-items" + " > div:last-child").before(
            data
        );
        $.ajax({
            url: "../../../../product-details/add-remove-compare",
            type: "POST",
            data: JSON.stringify({ id: id, action: "add" }),
            dataType: "json",
            contentType: "application/json",
            success: function (data) {
                //console.log(data)
                $(".rcom-icon").addClass("active");
            },
        });
        return;
    }
    // less than four prouducts
    // check id exists , return nothing
    // check category type not same, return error message
    if (
        $("#" + modalid + " .selected-items").children().length != 1 &&
        $("#" + modalid + " .selected-items").children().length < 5
    ) {
        let idList = [],
            categoryList = [];
        let getChild = $("#" + modalid + " .selected-items").children();
        getChild.each(function (i, v) {
            idList.push($(v).data("item-id"));
            categoryList.push($(v).data("item-cid"));
        });
        idList = [...new Set(idList)];
        categoryList = [...new Set(categoryList)];
        idList = idList.filter(Number);
        categoryList = categoryList.filter(Number);
        if (idList.includes(parseInt(id))) {
            return;
        }
        if (!categoryList.includes(parseInt(cid))) {
            $("#compare-message2").removeClass("hidden");
            compareStatusAutoClose();
            return;
        }
        $("#" + modalid + " .selected-items" + " > div:last-child").before(
            data
        );
        $.ajax({
            url: "../../../../product-details/add-remove-compare",
            type: "POST",
            data: JSON.stringify({ id: id, action: "add" }),
            dataType: "json",
            contentType: "application/json",
            success: function (data) {
                //console.log($('#' + modalid + ' .selected-items').children().length)
                if (
                    $("#" + modalid + " .selected-items").children().length > 4
                ) {
                    $("div[data-id='add-compare-modal']").addClass("hidden");
                }
            },
        });
    }
    
});
$("body").on("click", ".first-icon", function () {
    $("#compare-modal").addClass("hidden");
    $("#compare-modal").animate({ bottom: "-3rem" }, "fast");
    $("#compare-modal").removeClass("hidden");
    $("#compare-modal").animate({ bottom: 0 }, "fast");
});
$("body").on("click", ".quick-preview-btn", function () {
    $(".compare-modal").addClass("hidden");
});
$("body").on("click", ".me-plus-icon", function () {
    // $(".modal-content").css("min-width", "528px");
    // $(".modal-content").css("width", "578px");
    if (lng == "tc") {
        lng = "zh-hk";
    } else if (lng == "sc") {
        lng = "zh-cn";
    }
    let pmid = $(this).data("parent-modal-id");
    let pid = 0;
    let cid = 1;
    //alert($('#' + pmid + ' .selected-items').find('div#selected-item').length);
    if (
        $("#" + pmid + " .selected-items").find("div#selected-item").length >= 4
    ) {
        $("#compare-message3").removeClass("hidden");
        compareStatusAutoClose();
        return false;
    }

    let idList = [];
    let getChild = $("#" + pmid + " .selected-items").children();
    getChild.each(function (i, v) {
        idList.push($(v).data("item-id"));
    });
    idList = [...new Set(idList)];
    idList = idList.filter(Number);

    if (
        $("#" + pmid + " .selected-items").find("div#selected-item").length > 0
    ) {
        getChild.each(function (i, v) {
            cid = $(v).data("item-cid");
            return false;
        });
    }
    // alert(lng)
    $(".suggestion-product-list").html("");
    $.ajax({
        url: app_url + "/" + lng + "/compare-product/suggestion-product-ajax",
        type: "POST",
        data: JSON.stringify({ pids: [], selectedCategory: cid }),
        dataType: "json",
        contentType: "application/json",
        success: function (data) {
            console.log(data);
            var compare = `${window.translations.comparing}`;
            $(".recently-or-recommended-text").html(
                data.data.recentlyOrRecommended
            );
            let content = "";

            $.each(data.data.suggestionProducts, function ($k, value) {
                let priceContent = "";
                if (value.discount_price != null) {
                    priceContent +=
                        `<p class="font-bold text-mered me-body20">$` +
                        value.discount_price +
                        `</p>
                        <p class="font-bold text-lightgray me-body14 pl-[10px]"><span class="linethrough">$` +
                        value.original_price +
                        `</span></p>`;
                } else {
                    priceContent +=
                        `<p class="font-bold text-mered me-body20">$` +
                        value.original_price +
                        `</p>`;
                }
                // check selected product include in suggestion list, does not show this product
                if (!idList.includes(value.id)) {
                    content +=
                        `<div class="relative flex items-center py-5 compare-img-container">
                             <div class="comp-img mr-[12px]">
                                 <img src="` +
                        (value.icon != null
                            ? value.icon
                            : value.featured_img != null
                            ? value.featured_img
                            : "frontend/img/quality-healthcare.png") +
                        `" alt="image" class="w-[80px] h-[80px] rounded-[12px]">
                             </div>
                             <div class="comp-title">
                                 <p class="w-[307px] leading-tight helvetica-normal text-darkgray font-bold me-body18 title">` +
                        value[`name_${lng1}`] +
                        `</p>
                                 <div class="flex items-center">
                                    ` +
                        priceContent +
                        `
                                 </div>
                             </div>
                             <div class="comp-btn mx-auto">
                                 <button type="button" class="mx-auto border border-darkgray rounded-full text-darkgray bg-whitez font-bold font-secondary me-body16 hover:border-blueMediq hover:text-whitez w-[40px] 
                                 h-[40px] flex justify-center items-center new-compare-btn" data-id="` +
                        value.id +
                        `" data-featured_img="` +
                        (value.icon != null
                            ? value.icon
                            : value.featured_img != null
                            ? value.featured_img
                            : "frontend/img/quality-healthcare.png") +
                        `" data-name="` +
                        value[`name_${lng1}`] +
                        `" data-parent-id="` +
                        pid +
                        `" data-parent-modal-id="` +
                        pmid +
                        `" data-category-id="` +
                        value.category_id +
                        `">
                                 <img src="../../../frontend/img/icon1.svg" alt="icon1" class="w-[24px]"></button>
                                 <p class="me-body14 text-blueMediq text-center comparing-text" > ` +
                        compare +
                        `</p>
                             </div>
                         </div>`;
                }
            });
            $(".suggestion-product-list").html(content);
            $(".modal-content").removeAttr("style");
        },
    });
});

$("body").on("click", ".new-compare-btn", function () {
    $(".new-compare-btn").prop("disabled", true);
    if (
        $("#" + $(this).data("parent-modal-id") + " .selected-items").children()
            .length > 4
    ) {
        $("#compare-message3").removeClass("hidden");
        compareStatusAutoClose();
        $(".new-compare-btn").prop("disabled", false);
        disableBtn();
        return false;
    }

    let id = $(this).data("id");
    let current = this;

    $.ajax({
        url: "../../../../product-details/add-remove-compare",
        type: "POST",
        data: JSON.stringify({ id: id, action: "add" }),
        dataType: "json",
        contentType: "application/json",
        success: function (data) {
            if (data.status == "ok") {
                $(current).parent().parent().addClass("selected");
                $(".new-compare-btn").prop("disabled", false);

                $(
                    "#" +
                        $(current).data("parent-modal-id") +
                        " .selected-items" +
                        " > div:last-child"
                ).before(
                    `<div id="selected-item" class="selected-items-data flex items-start selected-items-box relative w-1/4" data-item-id="` +
                        $(current).data("id") +
                        `" 
               data-item-cid="` +
                        $(current).data("category-id") +
                        `">
               <div class="flex items-center selected-items-box--top pr-[24px]">
                     <p class="selected-items-box--top--img"><img src="` +
                        $(current).data("featured_img") +
                        `" alt="" class="w-[80px] h-[80px] rounded-[12px]"></p>
                     <p class="font-secondary font-medium me-body16 pl-[10px] selected-items-box--top--title">` +
                        $(current).data("name") +
                        `</p>
               </div>
               <button class="w-6 h-6 rounded-full bg-meA3 text-white flex items-center justify-center selected-items-box-delete compare-modal- absolute top-0 right-0">
               <img src="../../../../frontend/img/white-close.svg" alt="close image" class="w-[10px] compare-modal-"/></button>
            </div>`
                );
                $(current).prop("disabled", true);

                disableBtn();
                if ($("#compare-modal .selected-items").children().length > 1) {
                    $(".rcom-icon").addClass("active");
                }
                if ($("#compare-modal .selected-items").children().length > 4) {
                    $("div[data-id='add-compare-modal']").addClass("hidden");
                }
            }
        },
    });
});

function disableBtn() {
    $(".selected-items-box-delete").each(function () {
        let dataid = $(this).parent().data("item-id");
        $(".new-compare-btn").each(function () {
            if ($(this).data("id") == dataid) {
                $(this).prop("disabled", true);
            }
        });
    });
}

$("body").on("click", ".btn-compare", function () {
    let idList = [];
    let getChild = $(".selected-items").children();
    getChild.each(function (i, v) {
        idList.push($(v).data("item-id"));
    });
    idList = [...new Set(idList)];
    idList = idList.filter(Number);

    if (
        idList[0] == undefined &&
        idList[1] == undefined &&
        idList[2] == undefined &&
        idList[3] == undefined
    ) {
        $("#compare-message4").removeClass("hidden");
        compareStatusAutoClose();
        return false;
    }
    let p1 = "",
        p2 = "",
        p3 = "",
        p4 = "";
    if (idList[0] !== undefined) {
        p1 = idList[0];
    }
    if (idList[1] !== undefined) {
        p2 = idList[1];
    }
    if (idList[2] !== undefined) {
        p3 = idList[2];
    }
    if (idList[3] !== undefined) {
        p4 = idList[3];
    }
    var langParamemter = document.location.pathname
        .split("/")
        .slice(1, 2)
        .toString();
    if (
        langParamemter == "zh-hk" ||
        langParamemter == "zh-cn" ||
        langParamemter == "en"
    ) {
        // alert(langParamemter)
        window.location.href =
            "../../compare-product/?p1=" +
            p1 +
            "&p2=" +
            p2 +
            "&p3=" +
            p3 +
            "&p4=" +
            p4 +
            "&compare_page_redirect";
    } else {
        window.location =
            "../compare-product/?p1=" +
            p1 +
            "&p2=" +
            p2 +
            "&p3=" +
            p3 +
            "&p4=" +
            p4 +
            "&compare_page_redirect";
    }
});

$("body").on("click", ".selected-items-box-delete", function () {
    //console.log($(this).parent().data("item-id"));
    removeId = $(this).parent().data("item-id");

    $.ajax({
        url: "../../../../product-details/add-remove-compare",
        type: "POST",
        data: JSON.stringify({ id: removeId, action: "remove" }),
        dataType: "json",
        contentType: "application/json",
        success: function (data) {
            //console.log(data)
            if ($("#compare-modal .selected-items").children().length == 1) {
                $(".rcom-icon").removeClass("active");
            }
            $("div[data-id='add-compare-modal']").removeClass("hidden");
        },
    });
});

// function closeDialogModal(e) {
//    e.preventDefault();
//    $("#compare-message3").addClass("hidden");
// }
